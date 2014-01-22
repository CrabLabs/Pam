<?php

return array(
	'title'  => 'Trabajos',
	'single' => 'trabajo',
	'model'  => 'Work',
	
	'columns' => array(
		'id',
		'name' => array(
			'title' => 'Nombre',
		),
		'image' => array(
			'title' => 'Imagen',
			'output' => HTML::image('img/uploads/works/thumbs/(:value)', '', array('height' => 100)),
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
		'image' => array(
			'title'  => 'Imagen',
			'type' 	 => 'image',
			'naming' => 'random',
			'length' => 14,
			'location' => public_path().'/img/uploads/works/originals/',
			'sizes' => array(
				array(220, 140, 'crop', public_path().'/img/uploads/works/thumbs/', 100)
			),
		),
		'description' => array(
			'title' => 'Descripción',
			'type' => 'textarea',
		),
	),

);
