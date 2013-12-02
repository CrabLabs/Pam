<?php

class ProductDetailTest extends TestCase {

	public function testThatProductDetailModelExists()
	{
		$this->assertTrue(class_exists('ProductDetail'));
	}

	/*
	 * @depends testThatProductDetailExists
	 */
	public function testThatProductDetailModelHasAttributeTable()
	{
		$this->assertClassHasAttribute('table', 'ProductDetail');
	}

	/*
	 * @depends testThatProductDetailExists
	 */
	public function testThatProductDetailCanBeSaved()
	{
		$productDetail = new ProductDetail();
		$productDetail->product_id = 1;
		$productDetail->save();

		$this->assertNotNull(ProductDetail::find($productDetail->id));
	}

	/*
	 *	@depends testThatProductDetailCanBeSaved()
	 */
	public function testProductDetailSeeder()
	{
		/*Artisan::call('db:seed --class=ProductsTableSeeder');
		Artisan::call('db:seed --class=ProductsDetailsTableSeeder');
		
		$this->seed();
		$this->assertTrue(Schema::hasTable('products_details'));
		$this->assertGreaterThan(0, ProductDetail::all()->count());*/
	}

}
