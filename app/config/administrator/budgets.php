<?php

return array(
	'title'  => 'Presupuestos',
	'single' => 'presupuestp',
	'model'  => 'Budget',
	
	'columns' => array(
		'reference' => array(
			'title' => 'Número de referencia',
		),
		'status' => array(
			'title' => 'Estado',
			'type' => 'enum',
			'options' => array('Activo', 'Enviado', 'Rechazado'),
		),
		'email' => array(
			'title' => 'Email',
			'editable' => false
		),
		'cost' => array(
			'title' => 'Costo',
			'output' => '$(:value)',
		),
	),

	'filters' => array(
		'id',
		'status' => array(
			'title' => 'Estado',
			'type' => 'enum',
			'options' => array('Activo', 'Enviado', 'Rechazado'),
		),
		'reference' => array(
			'title' => 'Número de referencia',
		),
		'payment_option' => array(
			'title' => 'Modo de pago',
			'type' => 'enum',
			'options' => array('Efectivo', 'Cheque', 'Tarjeta de crédito'),
		),
		'graphic_design' => array(
			'title' => 'Diseño gráfico',
			'type' => 'bool',
		),
		'collect_personally' => array(
			'title' => 'Recoge personalmente',
			'type' => 'bool',
		),
	),

	'edit_fields' => array(
		'id',
		'status' => array(
			'title' => 'Estado',
			'type' => 'enum',
			'options' => array('Activo', 'Enviado', 'Rechazado'),
		),
		'description' => array(
			'title' => 'Descripción',
			'editable' => false
		),
		'cost' => array(
			'title' => 'Costo',
			'type' => 'number',
			'symbol' => '$',
		),
		'email' => array(
			'title' => 'Email',
			'editable' => false
		),
		'file' => array(
			'title' => 'Archivo',
			'editable' => false
		),
	),

);
