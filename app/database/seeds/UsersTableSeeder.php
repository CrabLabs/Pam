<?php

class UsersTableSeeder extends Seeder {
	
	/**
	 * Run the project categories seeds.
	 *
	 * @return void
	 */
	public function run() {
		$names = array('James', 'Christopher', 'Ronald', 'Mary', 'Lisa', 'Michelle', 'John', 'Daniel', 'Anthony', 'Patricia', 'Nancy', 'Laura', 'Robert', 'Paul', 'Kevin', 'Linda', 'Karen', 'Sarah', 'Michael', 'Mark', 'Jason', 'Barbara', 'Betty', 'Kimberly', 'William', 'Donald', 'Jeff', 'Elizabeth', 'Helen', 'Deborah', 'David', 'George', 'Jennifer', 'Sandra', 'Richard', 'Kenneth', 'Maria', 'Donna', 'Charles', 'Steven', 'Susan', 'Carol', 'Joseph', 'Edward', 'Margaret', 'Ruth', 'Thomas', 'Brian', 'Dorothy', 'Sharon');
		$lastnames = array('Smith', 'Anderson', 'Clark', 'Wright', 'Mitchell', 'Johnson', 'Thomas', 'Rodriguez', 'Lopez', 'Perez', 'Williams', 'Jackson', 'Lewis', 'Hill', 'Roberts', 'Jones', 'White', 'Lee', 'Scott', 'Turner', 'Brown', 'Harris', 'Walker', 'Green', 'Phillips', 'Davis', 'Martin', 'Hall', 'Adams', 'Campbell', 'Miller', 'Thompson', 'Allen', 'Baker', 'Parker', 'Wilson', 'Garcia', 'Young', 'Gonzalez', 'Evans', 'Moore', 'Martinez', 'Hernandez', 'Nelson', 'Edwards', 'Taylor', 'Robinson', 'King', 'Carter', 'Collins');
		
		for($i=0; $i<101; $i++) {
			$name = $names[array_rand($names, 1)];
			$lastname = $lastnames[array_rand($lastnames, 1)];

			DB::table('users')->insert(array(
				'email'		=> strtolower(str_random(20).'@pam.com.uy'),
				'password' 	=> Hash::make($name),
				'name'		=> $name,
				'lastname'	=> $lastname,
				'role' 		=> ($i % 2 == 0) ? 'Personal' : 'Empresarial',
				'created_at'=> new DateTime,
				'updated_at'=> new DateTime
			));
		}
	}

}