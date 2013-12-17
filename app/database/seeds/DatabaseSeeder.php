<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		$this->call('UsersTableSeeder');
		$this->call('ServicesTableSeeder');
		$this->call('WorksTableSeeder');
		$this->call('FAQTableSeeder');
		$this->call('ProductsTableSeeder');
		$this->call('ProductsDetailsTableSeeder');
		$this->call('OrdersTableSeeder');
	}

}
