<?php

return array(
	'title'  => 'Usuarios',
	'single' => 'usuario',
	'model'  => 'User',
	
	'columns' => array(
		'id',
		'name' => array(
			'title'  => 'Nombre',
			'select' => 'CONCAT((:table).name, \' \', (:table).lastname)'
		),
		'role' => array(
			'title' => 'Rol',
		),
		'created_at' => array(
			'title' => 'Fecha de creación',
		),
	),

	'filters' => array(
		'id',
		'name' => array(
			'title' => 'Nombre',
		),
		'lastname' => array(
			'title' => 'Apellido',
		),
		'confirmed' => array(
			'title' => 'Confirmado',
			'type' => 'bool',
		),
		'created_at' => array(
			'title' => 'Fecha de creación',
			'type'  => 'date',
		),
	),

	'edit_fields' => array(
		'id',
		'name' => array(
			'title' => 'Nombre',
			'type'  => 'text',
		),
		'lastname' => array(
			'title' => 'Apellido',
			'type'  => 'text',
		),
		'confirmed' => array(
			'title' => 'Confirmado',
			'type' => 'bool',
		),
		
	),

);
