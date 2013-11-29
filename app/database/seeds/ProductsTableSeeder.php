<?php

class ProductsTableSeeder extends Seeder {

	public function run()
	{
		DB::table('products')->insert(array(
			'id' 	=> 1,
			'name' 	=> 'Tarjetas Personales',
			'image' => 'lorem_ipsum'
		));

		DB::table('products')->insert(array(
			'id' 	=> 2,
			'name' 	=> 'Afiches',
			'image' => 'lorem_ipsum_2'
		));

		DB::table('products')->insert(array(
			'id' 	=> 3,
			'name' 	=> 'Otro producto',
			'image' => 'lorem_ipsum_3'
		));

		DB::table('products')->insert(array(
			'id' 	=> 4,
			'name' 	=> 'Otro producto ID4',
			'image' => 'lorem_ipsum_4'
		));

		DB::table('products')->insert(array(
			'id' 	=> 5,
			'name' 	=> 'Otro producto ID5',
			'image' => 'lorem_ipsum_5'
		));
	}

}