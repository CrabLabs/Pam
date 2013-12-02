<?php

class UserControllerTest extends TestCase {

	public function testIndex()
	{
		$response = $this->route('GET', 'user.index');
	
		$this->assertResponseOk();
	}

	public function testRegister()
	{
		$response = $this->route('GET', 'user.create');
	
		$this->assertResponseOk();
	}

	public function testEdit()
	{
		$this->seed();
		// Log as the first user
		// $this->be(User::first());
		
		// $response = $this->route('GET', 'user.edit', ['id' => Auth::user()->id]);
	}

}
