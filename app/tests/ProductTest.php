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
		$product = new Product(array(
			'name' => 'this_is_a_test',
			'image' => 'this_is_a_test'
		));
		$product->save();

		$this->assertCount(1, Product::where('name', '=', 'this_is_a_test')->count());
	}

	public function testThatProductRequiresAnImage()
	{
		$product = new Product(array(
			'name' => 'this_is_a_test'
		));
		$product->save();

		$this->assertNull(Product::where('name', '=', 'this_is_a_test')->first());
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
		$product = Product::first();

		$product->details();

		$this->assertEquals();
	}

}
