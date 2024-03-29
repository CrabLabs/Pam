<?php

class UserController extends \BaseController {

	/**
	 * User dependency injection
	 *
	 * @return void
	 */
	public function __construct(User $user)
	{
		$this->user = $user;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return Response::json($this->user->all());
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('user.register');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$rules = array(
			'role' => 'required',
			'name' => 'required|min:2',
			'lastname' => 'required|min:3',
			'shipping_address' => 'required|min:2',
			'password' => 'required|confirmed|min:8',
			'email' => 'required|email|unique:users',
			'rut' => 'required_if:role,Empresa|numeric',
			'billing_address' => 'required_if:same_billing_address,false',
		);

		$validator = Validator::make(Input::all(), $rules);

		if ($validator->passes()) {
			$user = new User();
			$user->name = Input::get('name');
			$user->lastname = Input::get('lastname');
			$user->email = Input::get('email');
			$user->password = Hash::make(Input::get('password'));
			$user->confirmed = false;
			if (Input::get('image_name') != '')
				$user->image = Input::get('image_name');
			$user->role = Input::get('role');
			$user->phone = Input::get('phone');
			$user->company_name = Input::get('company_name');
			$user->rut = Input::get('rut');
			$user->shipping_address = Input::get('shipping_address');
			$user->shipping_time_from = Input::get('shipping_time_from');
			$user->shipping_time_to = Input::get('shipping_time_to');
			$user->billing_address = (Input::get('same_billing_address')) ? Input::get('shiping_address') : Input::get('billing_address');

			$user->save();

			$data = array(
				'name' => $user->name,
				'email' => $user->email,
				'phone' => $user->phone,
				'lastname' => $user->lastname
			);

			Mail::send('emails.newuser', $data, function ($mail) use ($user) {
				$mail->from('digital@pam.com.uy', 'Pam.com.uy');
				$mail->to($user->email);
				$mail->subject('Nuevo usuario en pam.com.uy');
			});

			Auth::login($user);
			return Redirect::to('/');
		}

		return View::make('user.register')->withErrors($validator);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		return Response::json($this->user->find($id));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		if (Auth::user()->id == $id or Auth::user()->role == 'admin')
			return View::make('user.edit')->with('user', $this->user->find($id));
		return Redirect::to('/');
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$rules = array(
			'role' => 'required',
			'name' => 'required|min:2',
			'lastname' => 'required|min:3',
			'shipping_address' => 'required|min:2',
			'email' => 'required|email|unique:users,email,'.$id,
			'rut' => 'required_if:role,Empresa|numeric',
			'billing_address' => 'required_if:same_billing_address,false',
		);

		if (Input::get('password') != '')
			$rules['password'] = 'required|confirmed|min:8';

		$validator = Validator::make(Input::all(), $rules);

		if (Auth::user()->id == $id and $validator->passes()) {
			$user = $this->user->find($id);
			$user->name = Input::get('name');
			$user->lastname = Input::get('lastname');
			$user->email = Input::get('email');
			if (Input::get('password') != '')
				$user->password = Hash::make(Input::get('password'));
			if (Input::get('image_name') != '')
				$user->image = Input::get('image_name');
			$user->role = Input::get('role');
			$user->phone = Input::get('phone');
			$user->company_name = Input::get('company_name');
			$user->rut = Input::get('rut');
			$user->shipping_address = Input::get('shipping_address');
			$user->shipping_time_from = Input::get('shipping_time_from');
			$user->shipping_time_to = Input::get('shipping_time_to');
			$user->billing_address = (Input::has('same_billing_address')) ? Input::get('shiping_address') : Input::get('billing_address');

			$user->save();
			return Redirect::to('edit');
		} else {
			return View::make('user.edit')->with('user', Auth::user())->withErrors($validator);
		}
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
