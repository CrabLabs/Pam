<?php

class ProductTest extends TestCase {

	public function testThatTrueIsTrue()
	{
		$this->assertTrue(true);
	}

	public function testThatProductExists()
	{
		$this->assertTrue(class_exists('Product'));
	}

	/*
	 * @depends testThatProductExists
	 */
	public function testThatProductHasAttributeTable()
	{
		$this->assertClassHasAttribute('table', 'Product');
	}

	public function testThatProductCanBeSaved()
	{
		$product = new Product();
		$product->name = str_random(10);
		$product->image = str_random(10);
		$product->save();

		$this->assertNotNull(Product::find($product->id));
	}

	public function testThatProductHasDetailsMethod()
	{
		$this->assertTrue(method_exists('Product', 'details'));
	}

	/*
	 * @depends testThatProductHasDetailsMethod
	 */
	public function testThatProductHasDetails()
	{
		/*Artisan::call('db:seed --class=ProductsTableSeeder');
		Artisan::call('db:seed --class=ProductsDetailsTableSeeder');
		
		$product = Product::first();
		$product->details();
		$this->assertEquals();*/
	}

}
