<?php

class ContactControllerTest extends TestCase {

	public function testContactIndex()
	{
		$this->call('GET', 'contact');

		// $this->assertViewHas('contct');
	}

}
