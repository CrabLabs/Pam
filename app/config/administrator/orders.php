<?php

if (! function_exists('imageLink'))
{
	function imageLink($value)
	{
		$link = URL::to('img/uploads/orders/'.$value);
		$image = HTML::image('img/uploads/orders/originals/'.$value, '', array('height' => 100));

		return '<a href=\''.$link.'\'>'.$image.'</a>';
	}
}

return array(
	'title'  => 'Ordenes',
	'single' => 'orden',
	'model'  => 'Order',

	'columns' => array(
		'reference' => array(
			'title' => 'Número de referencia',
			'output' => '<strong>(:value)</strong>',
		),
		'product_id' => array(
			'title' => 'Producto',
			'relationship' => 'product',
			'select' => 'IF((:table).budgetable, (:table).name, CONCAT("<strong>", (:table).name, "</strong>"))',
		),
		'file' => array(
			'title' => 'Imagen',
			'output' => imageLink('(:value)'),
		),
		'status' => array(
			'title' => 'Estado',
			'type' => 'enum',
			'options' => array('En producción', 'En revisión', 'Enviado', 'Para retirar', 'Finalizado'),
		),
		'payment_option' => array(
			'title' => 'Modo de pago',
		),
		'graphic_design' => array(
			'title' => 'Diseño gráfico',
			'type' => 'bool',
			'select' => "IF((:table).graphic_design, 'Si', 'No')",
		),
		'collect_personally' => array(
			'title' => 'Recoge personalmente',
			'type' => 'bool',
			'select' => "IF((:table).collect_personally, 'Si', 'No')",
		),
		'cost' => array(
			'title' => 'Costo',
			'output' => '$(:value)',
		),
	),

	'filters' => array(
		'id',
		'reference' => array(
			'title' => 'Número de referencia',
		),
		'status' => array(
			'title' => 'Estado',
			'type' => 'enum',
			'options' => array('En producción', 'En revisión', 'Enviado', 'Para retirar', 'Finalizado'),
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
		'reference' => array(
			'title' => 'Número de referencia',
			'editable' => false
		),
		'status' => array(
			'title' => 'Estado',
			'type' => 'enum',
			'options' => array('En producción', 'En revisión', 'Enviado', 'Para retirar', 'Finalizado'),
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
			'editable' => true,
		),
		'collect_personally' => array(
			'title' => 'Recoge personalmente',
			'type' => 'bool',
			'editable' => true
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
