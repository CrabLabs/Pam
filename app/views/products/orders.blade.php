@extends('layouts.default')

@section('main')
<section class='upper'>
	<h3>Imprimir ahora</h3>
	<p>Primero selecciona el producto que deseas enviar a imprimir.</p>
</section>
<section id='orders' class='container whiteBackground'>
	<nav class='steps'>
		<ul>
			<li class='active'><span>1</span>Selecciona tu producto</li>
			<li><span>2</span>Caracteristicas del trabajo</li>
			<li><span>3</span>Envío del trabajo</li>
		</ul>
	</nav>
	{{ Form::open() }}
		<section class='orders_step orders_step_1'>
			@foreach($products as $product)
				<a href='#' data-id='{{ $product->id }}' class='product_photo'>
					{{ HTML::image($product->getThumb()) }}
					<span>{{ $product->name }}</span>
				</a>
			@endforeach
		</section>
		<section class='orders_step orders_step_2'>
			<?php
				$budgetables = [];
				foreach($products as $product) {
					if($product->budgetable)
						$budgetables[] = $product->id;
				}
				echo Form::hidden('budgetables', implode(',', $budgetables));
			?>
			<div class='attach_file'>
				<h3>Adjuntar archivo de tu trabajo</h3>
				<p>Para realizar un presupuesto más certero puedes adjuntar tu trabajo. Tamaño máximo XXXmb.</p>
				{{ Form::file('file') }}
			</div>
			<div class='details'>
				<h3>Detalles de la impresión</h3>
				<div>
					{{ Form::label('product_id', 'Producto:') }}
					<select name='product_id'>
						@foreach($products as $product)
							<option value='{{ $product->id }}'>{{ $product->name }}</option>
						@endforeach
					</select>
				</div>
				<div class='budgetable'>
					{{ Form::label('amount', 'Cantidad:') }}
					<select name='amount'></select>
				</div>
				<div class='budgetable'>
					{{ Form::label('size', 'Tamaño:') }}
					<select name='size'></select>
				</div>
				<div class='budgetable'>
					{{ Form::label('inks', 'Tintas:') }}
					<select name='inks'></select>
				</div>
				<div class='budgetable'>
					{{ Form::label('paper', 'Papel:') }}
					<select name='paper'></select>
				</div>
				<div class='budgetable'>
					{{ Form::label('weight', 'Gramaje:') }}
					<select name='weight'></select>
				</div>
				<div class='budgetable'>
					{{ Form::label('laminate', 'Laminado:') }}
					<select name='laminate'></select>
				</div>

				<div class='no-budgetable'>
					{{ Form::label('detail', 'Describa el trabajo:') }}
					{{ Form::textarea('detail') }}
				</div>
				<div class='no-budgetable'>
					{{ Form::label('email', 'Ingrese su mail donde le enviaremos su presupuesto:') }}
					{{ Form::email('email', (Auth::user()) ? Auth::user()->email : '') }}
				</div>
			</div>
			<div>
				{{ Form::button('Siguiente', array('class' => 'btn green next_step')) }}
			</div>
		</section>
		<section class='orders_step orders_step_3'>
			<div class='payment_options'>
				<div>
					<h3>Detalles del envio</h3>
					{{ Form::radio('collect_personally', 'false', true, array('id' => 'collect_personally_false')) }}
					{{ Form::label('collect_personally_false', 'Enviar en 48hs') }}
					{{ Form::radio('collect_personally', 'true', false, array('id' => 'collect_personally_true')) }}
					{{ Form::label('collect_personally_true', 'Lo retiro personalmente') }}
				</div>
				<div>
					<h3>Forma de pago</h3>
					{{ Form::radio('payment_option', 'Efectivo', true, array('id' => 'payment_option_money')) }}
					{{ Form::label('payment_option_money', 'Efectivo')}}

					{{ Form::radio('payment_option', 'Cheque', false, array('id' => 'payment_option_check')) }}
					{{ Form::label('payment_option_check', 'Cheque')}}
					
					{{ Form::radio('payment_option', 'Tarjeta de crédito', false, array('id' => 'payment_option_credit_card')) }}
					{{ Form::label('payment_option_credit_card', 'Tarjeta de crédito')}}
				</div>
			</div>
			<div class='details'>
				<h3>Persona responsable</h3>
				<div>
					{{ Form::label('name', 'Nombre:') }}
					{{ Form::text('name', Auth::user()->name) }}
				</div>
				<div>
					{{ Form::label('lastname', 'Apellido:') }}
					{{ Form::text('lastname', Auth::user()->lastname) }}
				</div>
				<div>
					{{ Form::label('email', 'Email:') }}
					{{ Form::email('email', Auth::user()->email) }}
				</div>
				<div>
					{{ Form::label('phone', 'Teléfono:') }}
					{{ Form::text('phone', Auth::user()->phone) }}
				</div>
				<div>
					{{ Form::label('company_name', 'Razón social:') }}
					{{ Form::text('company_name', Auth::user()->company_name) }}
				</div>
				<div>
					{{ Form::label('rut', 'RUT:') }}
					{{ Form::text('rut', Auth::user()->rut) }}
				</div>
			</div>
			<div class='shipping'>
				<div>
					<h3>Dirección de envio</h3>
					{{ Form::label('shiping_address', 'Dirección:') }}
					{{ Form::text('shiping_address', Auth::user()->address) }}
					{{ Form::label('shipping_time_from', 'Horario preferencial:') }}
					{{ Form::select('shipping_time_from', $times) }}
					<span>a</span>
					{{ Form::select('shipping_time_to', $times) }}
				</div>
				<div>
					<h3>Dirección de facturación</h3>
					{{ Form::checkbox('same_billing_address', null, true) }}
					{{ Form::label('same_billing_address', 'Igual que la dirección de envio') }}
					{{ Form::text('billing_address', null, array('placeholder' => 'Dirección de facturación')) }}
				</div>
			</div>
			<div>
				{{ Form::button('Siguiente', array('class' => 'btn green next_step')) }}
			</div>
		</section>
		<section class='orders_step orders_step_4'>
			<div>
				<h4>Por favor verifica los datos antes de realizar el pedido:</h4>
			</div>
			<div class='summary'>
				<div>
					<h3>Producto</h3>
					<dl id='product_summary'></dl>
				</div>
				<div>
					<h3>Envio</h3>
					<dl>
						<dt>Dirección:</dt><dd class='address'></dd>
						<dt>Horario:</dt><dd class='time'></dd>
						<dt>Entrega:</dt><dd class='collect'></dd>
						<dt>Pago:</dt><dd class='payment_option'></dd>
					</dl>
					<h3>Facturación</h3>
					<dl>
						<dd class='billing_address'>Igual a la dirección de envío</dd>
					</dl>
				</div>
				<div>
					<h3>Persona responsable</h3>
					<dl id='user_summary'></dl>
				</div>
			</div>
			{{ Form::submit() }}
		</section>
	{{ Form::close() }}
</section>
@stop

@section('scripts')
	@parent

	{{ HTML::script('js/orders.js') }}
@stop