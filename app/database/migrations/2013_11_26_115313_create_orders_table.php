<?php

use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('orders', function($table)
		{
			$table->increments('id');
			$table->integer('user_id')->unsigned();
			$table->integer('product_id')->unsigned()->nullable()->default(NULL);
			$table->integer('product_detail_id')->unsigned()->nullable()->default(NULL);
			$table->string('reference', 5)->unique();
			$table->text('description')->nullable()->default(NULL);
			$table->integer('cost')->unsigned();
			$table->string('email')->nullable()->default(NULL);
			$table->string('file')->nullable()->default(NULL);
			$table->boolean('graphic_design')->default(false);
			$table->boolean('collect_personally')->default(false);
			$table->string('shipping_address')->nullable()->default(NULL);
			$table->integer('shipping_time_from')->nullable()->default(NULL);
			$table->integer('shipping_time_to')->nullable()->default(NULL);
			$table->enum('payment_option', array('Efectivo', 'Cheque', 'Tarjeta de crédito'));
			$table->enum('status', array('En producción', 'En revisión', 'Enviado', 'Para retirar', 'Finalizado'))->default('En producción');
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
		Schema::drop('orders');
	}

}