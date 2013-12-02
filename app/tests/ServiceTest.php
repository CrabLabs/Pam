<?php

class ServiceTest extends TestCase {

	public function testThatTrueIsTrue()
	{
		$this->assertTrue(true);
	}

	public function testThatServicesExists()
	{
		$this->assertTrue(class_exists('Service'));
	}

	/*
	 * @depends testThatProductExists
	 */
	public function testThatServicesHasAttributeTable()
	{
		$this->assertClassHasAttribute('table', 'Service');
	}

	public function testThatServicesCanBeSaved()
	{
		$service = new Service;
		$service->name = str_random(10);
		$service->description = str_random(10);
		$service->image = str_random(10);
		$service->save();

		$this->assertNotNull(Service::find($service->id));
	}

}
