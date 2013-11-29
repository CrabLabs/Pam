<?php

class OrderController extends BaseController {

	public function showIndex()
	{
		return View::make('products.orders', array(
			'products' => Product::all()
		));
	}

	public function getDetail()
	{
		$rules = array(
			'product_id' => 'numeric',
			// 'amount' 	 => 'numeric',
			// 'size' 		 => 'string',
		);
		$validator = Validator::make(Input::all(), $rules);

		if ($validator->passes() and Request::ajax())
		{
			$query = DB::table('products_details')->select(Input::get('select'));
			
			foreach(Input::except('_token', 'select') as $column => $value)
			{
				$query->where($column, '=', $value);
			}

			return Response::json($query->distinct()->get());
		}
	}

}
