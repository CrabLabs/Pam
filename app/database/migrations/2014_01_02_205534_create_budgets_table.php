<?php

use Illuminate\Database\Migrations\Migration;

class CreateBudgetsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('budgets', function($table){
			$table->increments('id');
			$table->integer('user_id')->unsigned();
			$table->integer('product_id')->unsigned()->nullable()->default(NULL);
			$table->integer('product_detail_id')->unsigned()->nullable()->default(NULL);
			$table->text('description')->nullable()->default(NULL);
			$table->integer('cost')->unsigned();
			$table->string('email')->nullable()->default(NULL);
			$table->string('file')->nullable()->default(NULL);
			$table->boolean('graphic_design')->default(false);
			$table->boolean('collect_personally')->default(false);
			$table->enum('status', array('Activo', 'Enviado', 'Rechazado'))->default('Activo');
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
		Schema::drop('budgets');
	}

}