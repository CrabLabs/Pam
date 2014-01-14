<?php

class OrderController extends BaseController {

	/**
	 * Requires to be authenticated
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->beforeFilter('auth');
	}

	/**
	 * Display orders form
	 *
	 * @return Response
	 */
	public function showIndex()
	{
		return View::make('products.orders', array(
			'products' => Product::all()
		));
	}

	/**
	 * Send an Order
	 *
	 * @return Response
	 */
	public function sendOrder()
	{
		$filePath = public_path() . '/img/uploads/orders/';
		$rules = array(
			'product_id' => 'required|numeric',
		);
		$validator = Validator::make(Input::all(), $rules);

		if ($validator->passes()) {
			$order = new Order;
			$order->product_id = Input::get('product_id');
			$order->graphic_design = Input::has('graphic_design');
			$order->user_id = (Auth::user()) ? Auth::user()->id : 0;
			$order->collect_personally = Input::get('collect_personally');
			$order->email = Input::get('email');
			$order->shipping_address = Input::get('shipping_address');
			$order->shipping_time_from = Input::get('shipping_time_from');
			$order->shipping_time_to = Input::get('shipping_time_to');
			$order->payment_option = Input::get('payment_option');
			if (Input::hasFile('file')) {
				$file = Input::file('file');
				$order->file = Str::random($length, $type).'.'.$file->getClientOriginalExtension();
				$file->move($filePath.$order->file);
			}

			if (Product::find(Input::get('product_id'))->budgetable) {
				$specifications = [
					'amount' 	=> Input::get('amount'),
					'size' 		=> Input::get('size'),
					'inks' 		=> Input::get('inks'),
					'paper' 	=> Input::get('paper'),
					'weight' 	=> Input::get('weight'),
					'laminate' 	=> Input::get('laminate'),
				];

				$query = DB::table('products_details')->select('id');
				foreach($specifications as $column => $value) {
					$query->where($column, '=', $value);
				}
				if ($query->count() > 0) {
					$order->product_detail_id = $query->first()->id;
				} else {
					$order->description = serialize($specifications);
				}
			} else {
				$order->description = Input::get('detail');
			}

			$order->save();
			
			return View::make('products.reference')->with('order', $order);
		} else {
			return View::make('products.order')->withErrors($validator);
		}
	}

	/**
	 * JSON response for product details
	 *
	 * @return Response
	 */
	public function getDetail()
	{
		$rules = array(
			'product_id' => 'required|numeric',
			'amount' 	 => 'numeric',
		);
		$validator = Validator::make(Input::all(), $rules);

		if ($validator->passes() and Request::ajax())
		{
			$query = DB::table('products_details')->select(Input::get('select'));
			$input = Input::except('_token', 'select', 'budgetables', 'detail', 'email',
				'shipping_time_from', 'shipping_time_to', 'shipping_address', 'billing_address');
			foreach($input as $column => $value)
			{
				$query->where($column, '=', $value);
			}

			return Response::json($query->distinct()->get());
		}
	}

}
