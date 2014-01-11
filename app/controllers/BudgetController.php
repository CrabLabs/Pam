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
			$budget = new Budget;
			$budget->product_id = Input::get('product_id');
			$budget->user_id = (Auth::user()) ? Auth::user()->id : 0;
			$budget->graphic_design = Input::has('graphic_design');
			$budget->collect_personally = Input::get('collect_personally');
			if (Input::hasFile('file')) {
				$file = Input::file('file');
				$budget->file = Str::random($length, $type).'.'.$file->getClientOriginalExtension();
				$file->move($filePath.$budget->file);
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
				$budget->product_detail_id = $query->first()->id;
			} else {
				$budget->description = Input::get('detail');
				$budget->email = Input::get('email');
			}

			$budget->save();
			return Response::json($budget);
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
