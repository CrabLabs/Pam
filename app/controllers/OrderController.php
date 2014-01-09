<?php

class OrderController extends BaseController {

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
			if (Product::find(Input::get('product_id'))->budgetable) {
				return 'Budgetable';
			} else {
				$order = new Order;
				$order->description = Input::get('detail');
				$order->graphic_design = Input::has('graphic_design');
				$order->collect_personally = Input::get('collect_personally');
				$order->email = Input::get('email');
				if (Input::hasFile('file')) {
					$file = Input::file('file');
					$order->file = Str::random($length, $type).'.'.$file->getClientOriginalExtension();
					$file->move($filePath.$order->file);
				}
				$order->save();

				return Response::json($order);
			}
		} else {
			return Response::json(Input::all());
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
			'product_id' => 'numeric',
			'amount' 	 => 'numeric',
			'size' 		 => 'string',
		);
		$validator = Validator::make(Input::all(), $rules);

		// $input = Input::only('product_id', 'amount', 'size', 'inks', 'cost');

		if ($validator->passes() and Request::ajax())
		{
			$query = DB::table('products_details')->select(Input::get('select'));
			
			foreach(Input::except('_token', 'select', 'budgetables', 'detail', 'email') as $column => $value)
			{
				$query->where($column, '=', $value);
			}

			return Response::json($query->distinct()->get());
		}
	}

}
