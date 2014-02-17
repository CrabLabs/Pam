<?php

return array(
	'title'  => 'Servicios',
	'single' => 'servicio',
	'model'  => 'Service',
	
	'columns' => array(
		'id',
		'name' => array(
			'title' => 'Nombre',
		),
		'image' => array(
			'title' => 'Imagen',
			'output' => HTML::image('img/uploads/services/thumbs/(:value)', '', array('height' => 100)),
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
			'location' => public_path().'/img/uploads/services/originals/',
			'sizes' => array(
				array(150, 150, 'crop', public_path().'/img/uploads/services/thumbs/', 100)
			),
		),
		'description' => array(
			'title' => 'Descripción',
			'type' => 'textarea',
		),
	),

);
