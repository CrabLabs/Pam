<?php

return array(
	'title' => 'Configuración del sitio',


	/**
	 * The edit fields array
	 *
	 * @type array
	 */
	'edit_fields' => array(
		'contact_email' => array(
			'title' => 'Email de contacto',
			'type' => 'text',
		),
	),

	/**
	 * The validation rules for the form, based on the Laravel validation class
	 *
	 * @type array
	 */
	'rules' => array(
		'contact_email' => 'required|email',
	),

);
