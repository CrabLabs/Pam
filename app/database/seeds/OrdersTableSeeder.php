<?php

class OrdersTableSeeder extends Seeder {
	
	public function run()
	{
		$productsCount = Product::count();
		$productDetailCount = ProductDetail::count();
		foreach(User::all() as $user) {
			$status = ['Activo', 'Enviado', 'Rechazado'];
			$paymentOption = ['En persona', 'Tarjeta de crédito'];

			for($i=1; $i<11; $i++) {
				$order = new Order(array(
					'user_id' => $user->id,
					'product_id' => ($i % $productsCount),
					'product_detail_id' => ($i % $productDetailCount),
					'status' => $status[array_rand($status)],
					'payment_option' => $paymentOption[array_rand($paymentOption)],
					'created_at' => new DateTime,
					'updated_at' => new DateTime,
				));
				$order->save();
			}
		}
	}

}
