<?php

use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function($table)
		{
			$table->increments('id');
			$table->string('name');
			$table->string('lastname');
			$table->string('email')->unique();
			$table->string('password');
			$table->boolean('confirmed')->default(false);
			$table->enum('role', array('Persona', 'Empresa', 'Admin'))->default('Persona');
			$table->string('phone')->nullable()->default(NULL);
			$table->string('company_name')->nullable()->default(NULL);
			$table->integer('rut')->unsigned()->nullable()->default(NULL);
			$table->string('shipping_address')->nullable();
			$table->integer('shipping_time_from')->default(0);
			$table->integer('shipping_time_to')->default(0);
			$table->string('billing_address')->nullable()->default(NULL);
			$table->timestamps();
			$table->softDeletes();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('users');
	}

}