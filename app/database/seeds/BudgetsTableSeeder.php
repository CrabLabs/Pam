<?php

class BudgetsTableSeeder extends Seeder {
	
	public function run()
	{
		$productsCount = Product::count();
		$productDetailCount = ProductDetail::count();
		foreach(User::all() as $user) {
			$status = ['Activo', 'Enviado', 'Rechazado'];

			for($i=1; $i<11; $i++) {
				$budget = new Budget(array(
					'user_id' => $user->id,
					'product_id' => ($i % $productsCount) + 1,
					'product_detail_id' => ($i % $productDetailCount),
					'status' => $status[array_rand($status)],
					'created_at' => new DateTime,
					'updated_at' => new DateTime,
				));
				$budget->save();
			}
		}
	}

}
