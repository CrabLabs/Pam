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
		// $this->command->info('Users table seeded!');
		$this->call('ProductsTableSeeder');
		// $this->command->info('Products table seeded!');
		$this->call('ProductsDetailsTableSeeder');
		// $this->command->info('Products details table seeded!');
	}

}