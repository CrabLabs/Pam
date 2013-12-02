<?php

class ServicesTableSeeder extends Seeder {

	public function run()
	{
		$lorem = 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
				  tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
				  quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.';
		
		DB::table('services')->insert(array(
			'name' => 'Diseño gráfico',
			'description' => $lorem,
			'image' => ''
		));
	
		DB::table('services')->insert(array(
			'name' => 'Impresiones ploteado',
			'description' => $lorem,
			'image' => ''
		));

		DB::table('services')->insert(array(
			'name' => 'Gigantografias',
			'description' => $lorem,
			'image' => ''
		));

		DB::table('services')->insert(array(
			'name' => 'Impresiones sobre tela',
			'description' => $lorem,
			'image' => ''
		));
	}

}
