<?php

return array(
	'title' => 'Preguntas frecuentes',
	'single' => 'pregunta frecuente',
	'model' => 'FAQ',

	'columns' => array(
		'id',
		'question' => array(
			'title' => 'Pregunta',
		),
		'answer' => array(
			'title' => 'Respuesta',
		),
	),

	'filters' => array(
		'id',
		'question' => array(
			'title' => 'Pregunta',
		),
		'answer' => array(
			'title' => 'Respuesta',
		),
	),

	'edit_fields' => array(
		'id',
		'question' => array(
			'title' => 'Pregunta',
		),
		'answer' => array(
			'title' => 'Respuesta',
			'type' => 'textarea',
		),
	),

);
