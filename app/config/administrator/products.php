<?php

return array(
	'title'  => 'Productos',
	'single' => 'producto',
	'model'  => 'Product',
	
	'columns' => array(
		'id',
		'name' => array(
			'title' => 'Nombre',
		),
		'budgetable' => array(
			'title'  => 'Presupuestable',
		),
		'image' => array(
			'title' => 'Imagen',
			'output' => HTML::image('img/uploads/products/thumbs/(:value)', '', array('height' => 100)),
		),
	),

	'filters' => array(
		'id',
		'name' => array(
			'title' => 'Nombre',
		),
	),

	'edit_fields' => array(
		'id',
		'name' => array(
			'title' => 'Nombre',
			'type'  => 'text',
		),
		'budgetable' => array(
			'title' => 'Presupuestable',
			'type'  => 'bool',
		),
		'image' => array(
			'title'  => 'Imagen',
			'type' 	 => 'image',
			'naming' => 'random',
			'length' => 14,
			'location' => public_path().'/img/uploads/products/originals/',
			'sizes' => array(
				array(170, 120, 'crop', public_path().'/img/uploads/products/thumbs/', 100)
			),
		),
	),

);
