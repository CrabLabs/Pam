<?php

class BudgetController extends BaseController {

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

			if (Input::has('image_name') and Input::get('image_name') != '')
				$budget->file = Input::get('image_name');

			if (Product::find(Input::get('product_id'))->budgetable) {
				$specifications = [
					'product_id' => Input::get('product_id'),
					'amount' 		=> Input::get('amount'),
					'size' 			=> Input::get('size'),
					'inks' 			=> Input::get('inks'),
					'paper' 	 	=> Input::get('paper'),
					'weight' 		=> Input::get('weight'),
					'laminate' 	=> Input::get('laminate'),
				];

				$query = DB::table('products_details')->select('id, price');
				foreach($specifications as $column => $value) {
					$query->where($column, '=', $value);
				}
				if ($query->count() > 0) {
					$response = $query->first();
					$budget->product_detail_id = $response->id;
					$budget->cost = $response->price;
				} else {
					$budget->description = json_encode($specifications);
				}
			} else {
				$budget->description = Input::get('detail');
				$budget->email = Input::get('email');

				$data = array('budget' => $budget);

				Mail::send('emails.budget_to_pam', $data, function ($mail) use ($budget) {
					$mail->subject('Pedido de presupuesto');
					$mail->to('espinosacurbelo@gmail.com');
					$mail->from($budget->email);
				});
			}

			$budget->save();
			return (Auth::user()) ? Redirect::to('edit?view=orders') : Redirect::to('/');

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
			'product_id' => 'required|numeric',
			'amount' 	 => 'numeric',
		);
		$validator = Validator::make(Input::all(), $rules);

		if ($validator->passes() and Request::ajax())
		{
			$query = DB::table('products_details')->select(Input::get('select'));
			$inputs = Input::except('_token', 'select', 'budgetables', 'detail', 'email');
			foreach($inputs as $column => $value)
			{
				$query->where($column, '=', $value);
			}

			return (Input::get('select') == 'price') ? Response::json($query->first()) : Response::json($query->distinct()->get());
		}
	}

}
