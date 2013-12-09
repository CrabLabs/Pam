<?php

return array(
	'title'  => 'Planilla de precios',
	'single' => 'precio',
	'model'  => 'ProductDetail',
	
	'columns' => array(
		'id',
		'product_id' => array(
			'title'  => 'Producto',
			'relationship' => 'Product',
			'select' => '(:table).name',
		),
		'amount' => array(
			'title' => 'Cantidad',
		),
		'size' => array(
			'title' => 'Tamaño',
		),
		'inks' => array(
			'title' => 'Tintas',
		),
		'paper' => array(
			'title' => 'Papel',
		),
		'weight' => array(
			'title' => 'Gramaje'
		),
		'laminate' => array(
			'title' => 'Laminado',
		),
		'cost' => array(
			'title'  => 'Costo',
			'output' => '$(:value)',
		),
	),

	'filters' => array(
		'id',
		'amount' => array(
			'title' => 'Cantidad',
		),
		'size' => array(
			'title' => 'Tamaño',
		),
		'inks' => array(
			'title' => 'Tintas',
		),
		'paper' => array(
			'title' => 'Papel',
		),
		'weight' => array(
			'title' => 'Gramaje'
		),
		'laminate' => array(
			'title' => 'Laminado',
		),
		'cost' => array(
			'title'  => 'Costo',
			'output' => '$(:value)',
		),
	),

	'edit_fields' => array(
		'id',
		'amount' => array(
			'title' => 'Cantidad',
			'type'  => 'number',
		),
		'size' => array(
			'title' => 'Tamaño',
		),
		'inks' => array(
			'title' => 'Tintas',
		),
		'paper' => array(
			'title' => 'Papel',
		),
		'weight' => array(
			'title' => 'Gramaje'
		),
		'laminate' => array(
			'title' => 'Laminado',
		),
		'cost' => array(
			'title'  => 'Costo',
			'type'   => 'number',
			'symbol' => '$',
		),
	),

);
