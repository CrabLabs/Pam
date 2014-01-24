<?php

return array(
	'title'  => 'Ordenes',
	'single' => 'orden',
	'model'  => 'Order',
	
	'columns' => array(
		'reference' => array(
			'title' => 'Número de referencia',
		),
		'status' => array(
			'title' => 'Estado',
			'type' => 'enum',
			'options' => array('Activo', 'Enviado', 'Rechazado'),
		),
		'payment_option' => array(
			'title' => 'Modo de pago',
		),
		'graphic_design' => array(
			'title' => 'Diseño gráfico',
			'type' => 'bool',
		),
		'collect_personally' => array(
			'title' => 'Recoge personalmente',
			'type' => 'bool',
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
		'shipping_address' => array(
			'title' => 'Dirección',
			'editable' => false
		),
		'shipping_time_from' => array(
			'title' => 'Envío horario desde',
			'editable' => false
		),
		'shipping_time_to' => array(
			'title' => 'Envío horario hasta',
			'editable' => false
		),
		'payment_option' => array(
			'title' => 'Modo de pago',
			'editable' => false
		),
		'graphic_design' => array(
			'title' => 'Diseño gráfico',
			'type' => 'bool',
			'editable' => false
		),
		'collect_personally' => array(
			'title' => 'Recoge personalmente',
			'type' => 'bool',
			'editable' => false
		),
		'reference' => array(
			'title' => 'Número de referencia',
			'editable' => false
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
