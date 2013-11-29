<?php

use Illuminate\Database\Migrations\Migration;

class CreateProductsDetailsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('products_details', function ($table)
		{
			$table->increments('id');
			$table->integer('product_id')->unsigned();
			$table->integer('amount')->unsigned()->default(0);
			$table->string('size')->nullable();
			$table->string('inks')->nullable();
			$table->string('paper')->nullable();
			$table->string('weight')->nullable();
			$table->string('laminate')->nullable();
			$table->integer('cost')->unsigned()->default(0);
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
		Schema::drop('products_details');
	}

}