<?php

class ContactController extends BaseController {

	/**
	 * Show the contact view
	 *
	 * @return Response
	 */
	public function showContact()
	{
		return View::make('contact.index');
	}

	/**
	 * Send the contact form
	 *
	 * @return Response
	 */
	public function sendContact()
	{
		$rules = array(
			'name' => 'required',
			// 'company' => '',
			'email' => 'required|email',
			// 'phone' => '',
			'subject' => 'required',
			'message' => 'required',	
		);
		$validator = Validator::make(Input::all(), $rules);

		if ($validator->passes()) {
			$msg = '';
			foreach (Input::all() as $data => $value) {
				$msg .= ucfirst($data).': '.trim($value);
			}

			Mail::send('emails.contact', array('msg' => $msg), function($message)
			{
				$message->from(Input::get('email'), Input::get('name'));
				$settings = json_decode(File::get(storage_path().'/administrator_settings/site.json'));
				$message->to($settings->contact_email);
			});
			return View::make('contact.thanks');
		} else {
			return View::make('contact.index')->withErrors($validator);
		}
	}

}
