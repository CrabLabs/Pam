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
		'email' => array(
			'title' => 'Email',
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
		'phone' => array(
			'title' => 'Teléfono',
			'editable' => false,
		),
		'company_name' => array(
			'title' => 'Compañía',
			'editable' => false,
		),
		'rut' => array(
			'title' => 'RUT',
			'editable' => false,
		),
		'name' => array(
			'title' => 'Nombre',
		),
		'lastname' => array(
			'title' => 'Apellido',
		),
		'role' => array(
			'title' => 'Rol',
			'type' => 'enum',
			'options' => array('Persona', 'Empresa', 'Admin')
		),
		'confirmed' => array(
			'title' => 'Confirmado',
			'type' => 'bool',
		),
		'created_at' => array(
			'title' => 'Fecha de creación',
			'type'  => 'date',
		),
		'shipping_address' => array(
			'title' => 'Dirección',
		),
	),

	'edit_fields' => array(
		'id',
		'phone' => array(
			'title' => 'Teléfono',
		),
		'company_name' => array(
			'title' => 'Compañía',
		),
		'rut' => array(
			'title' => 'RUT',
		),
		'name' => array(
			'title' => 'Nombre',
			'type'  => 'text',
		),
		'lastname' => array(
			'title' => 'Apellido',
			'type'  => 'text',
		),
		'role' => array(
			'title' => 'Rol',
			'type' => 'enum',
			'options' => array('Persona', 'Empresa', 'Admin')
		),
		'confirmed' => array(
			'title' => 'Confirmado',
			'type' => 'bool',
		),
		'shipping_address' => array(
			'title' => 'Dirección',
		),
		'billing_address' => array(
			'title' => 'Dirección de facturación',
		),
	),

);
