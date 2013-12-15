<?php

class WorksTableSeeder extends Seeder {

	public function run()
	{
		$lorem = 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
				  tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
				  quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.';
		
		DB::table('works')->insert(array(
			'name' => 'Stan ploteado color para HP',
			'description' => $lorem,
			'image' => ''
		));
	
		DB::table('works')->insert(array(
			'name' => 'Grafica para evento deportivo Speed',
			'description' => $lorem,
			'image' => ''
		));

		DB::table('works')->insert(array(
			'name' => 'Tarjetas personales para Vasawani',
			'description' => $lorem,
			'image' => ''
		));

		DB::table('works')->insert(array(
			'name' => 'Carpa impresa y banderas para Mittval',
			'description' => $lorem,
			'image' => ''
		));
	}

}
