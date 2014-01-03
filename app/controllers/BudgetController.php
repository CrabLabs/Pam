<?php

class BudgetController extends BaseController {

	/**
	 * Display orders form
	 *
	 * @return Response
	 */
	public function showIndex()
	{
		return View::make('products.budgets', array(
			'products' => Product::all()
		));
	}

	public function sendBudget()
	{
		$rules = array(
			'product_id' => 'required|numeric',
		);
		$validator = Validator::make(Input::all(), $rules);

		if ($validator->passes()) {
			$order = new Budget;
			$order->user_id = (Auth::user()) ? Auth::user()->id : 0;

			if (Product::find(Input::get('product_id'))->budgetable) {
				return 'Budgetable';
			} else {
				$order->description = Input::get('detail');
				$order->graphic_design = Input::has('graphic_design');
				$order->collect_personally = Input::get('collect_personally');
				$order->email = Input::get('email');
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
