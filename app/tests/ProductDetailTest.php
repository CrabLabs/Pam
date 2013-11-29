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
		$productDetail->product_id = 99;
		$productDetail->save();

		$this->assertCount(1, ProductDetail::where('product_id', '=', 99)->count());
	}

	/*
	 *	@depends testThatProductDetailCanBeSaved()
	 */
	public function testProductDetailSeeder()
	{
		$this->assertTrue(Schema::hasTable('products_details'));
		$this->assertGreaterThan(0, ProductDetail::all()->count());
	}

}
