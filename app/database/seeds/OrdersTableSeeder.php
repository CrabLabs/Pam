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
				DB::table('orders')->insert(array(
					'user_id' => $user->id,
					'product_id' => ($i % $productsCount),
					'product_detail_id' => ($i % $productDetailCount),
					'status' => $status[array_rand($status)],
					'payment_option' => $paymentOption[array_rand($paymentOption)],
					'created_at' => new DateTime,
					'updated_at' => new DateTime,
				));
			}
		}
	}

}

// $table->integer('product_id')->unsigned()->nullable()->default(NULL);
// $table->integer('product_detail_id')->unsigned()->nullable()->default(NULL);
// $table->text('description')->nullable()->default(NULL);
// $table->string('file')->nullable()->default(NULL);
// $table->boolean('graphic_design')->default(false);
// $table->boolean('collect_personally')->default(false);
// $table->string('shipping_address')->nullable()->default(NULL);
// $table->integer('shipping_time_from')->nullable()->default(NULL);
// $table->integer('shipping_time_to')->nullable()->default(NULL);
// $table->enum('payment_option', array('En persona', 'Tarjeta de crédito'));
// $table->enum('status', array('Activo', 'Enviado', 'Rechazado'))->default('Activo');
