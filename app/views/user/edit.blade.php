@extends('layouts.default')

@section('main')
<section class='container upper'>
	<h3>Mi cuenta</h3>
	<p>Recuerda tener tus datos actualizados para poder enviarte correctamente los trabajos.</p>
</section>

<section id='edit' class='container whiteBackground'>
	<div class='edit-main'>
		<h3 class='title'>Datos personales</h3>
		@if(count($errors) > 0)
			<h3>Hay errores en el formulario</h3>
			<ul class='register_errors'>
				@foreach($errors->messages()->all() as $error)
					<li>{{ $error }}</li>
				@endforeach
			</ul>
		@endif
		{{ Form::model($user, array('method' => 'PUT', 'route' => array('user.update', $user->id), 'files' => true)) }}
			<div class='section'>
				<h3>Tipo de cuenta</h3>
				<div class='row account_type'>
					{{ Form::radio('role', 'Persona', $user->role == 'Persona', array('id' => 'role_persona')) }}
					{{ Form::label('role_persona', 'Persona') }}
					{{ Form::radio('role', 'Empresa', $user->role == 'Empresa', array('id' => 'role_empresa')) }}
					{{ Form::label('role_empresa', 'Empresa') }}
				</div>
			</div>
			<div class='section'>
				<h3>Persona Responsable</h3>
				<div class='row'>
					<div>
						{{ Form::label('name', 'Nombre') }}
						{{ Form::text('name', $user->name) }}
					</div>
					<div>
						{{ Form::label('lastname', 'Apellido') }}
						{{ Form::text('lastname', $user->lastname) }}
					</div>
					<div>
						{{ Form::label('email', 'Email') }}
						{{ Form::email('email', $user->email) }}
					</div>
				</div>
				<div class='row'>
					<div>
						{{ Form::label('phone', 'Phone') }}
						{{ Form::text('phone', $user->phone) }}
					</div>
					<div class='empresarial_only'>
						{{ Form::label('company_name', 'Razón social') }}
						{{ Form::text('company_name', $user->company_name) }}
					</div>
					<div class='empresarial_only'>
						{{ Form::label('rut', 'RUT') }}
						{{ Form::text('rut', $user->rut) }}
					</div>
				</div>
				<div class='row'>
					<div>
						{{ Form::label('password', 'Contraseña') }}
						{{ Form::password('password') }}
					</div>
					<div>
						{{ Form::label('password_confirmation', 'Repetir contraseña') }}
						{{ Form::password('password_confirmation') }}
					</div>
				</div>
				<div class='row'>
					<div class='attach_file'>
						<p>Foto de perfil: </p>
						{{ HTML::image(URL::to($user->getImage()), 'Foto de perfil', array('width' => '100', 'height' => '100')) }}
						{{ Form::file('image') }}
						{{ Form::hidden('image_name', $user->image, array('id' => 'image_name')) }}
						<div class='uploading' style='width: 100%; background: #DDD; height: 3px; padding: 0; margin: 4px 0;'>
							<div class='complete' style='width: 0; background: #0EF; height: 3px; padding: 0;'></div>
						</div>
					</div>
				</div>
			</div>
			<div class='section'>
				<div class='row-2'>
					<div>
						<h3>Dirección de envio</h3>
						{{ Form::label('shipping_address', 'Dirección') }}
						{{ Form::text('shipping_address', $user->shipping_address) }}
						{{ Form::label('shipping_time_from', 'Horario preferencial') }}<br>
						{{ Form::select('shipping_time_from', $times) }}
						<!-- <span>a</span> -->
						{{ Form::select('shipping_time_to', $times) }}
					</div>
					<div>
						<h3>Dirección de facturación</h3>
						{{ Form::checkbox('same_billing_address', null, $user->billing_address == $user->shiping_address) }}
						{{ Form::label('same_billing_address', 'Igual que la dirección de envio') }}
						{{ Form::text('billing_address', $user->billing_address) }}
					</div>
				</div>
			</div>

			{{ Form::button('Cancelar', array('class' => 'btn grey cancel')) }}
			{{ Form::submit('Guardar') }}
		{{ Form::close() }}
	</div>
	<div class='edit-main'>
		<h3 class='title'>Mis pedidos</h3>
		<h4>Pedidos realizados</h4>
		<table>
			<thead>
				<tr>
					<td># REF</td>
					<td>Fecha</td>
					<td>Datos del trabajo</td>
					<td>Costo</td>
					<td>Estado</td>
				</tr>
			</thead>
			<tbody>
				@foreach($user->orders as $order)
				<tr>
					<td><strong>{{ $order->reference }}</strong></td>
					<td>{{ $order->created_at->format('d/m/y h:m') }} hs</td>
					<td>{{ Str::limit($order->getDescription(), 50) }}</td>
					<td><span class='grey'>$ {{ $order->getCost() }}</span></td>
					<?php $class = ($order->status == 'Activo') ? 'grey' : (($order->status == 'Rechazado') ? 'red' : 'green'); ?>
					<td><span class='{{ $class }}'>{{ $order->status }}</span></td>
				</tr>
				@endforeach
			</tbody>
		</table>
		<h4 style='margin-top: 20px;'>Presupuestos realizados</h4>
		<table>
			<thead>
				<tr>
					<td>Fecha</td>
					<td>Datos del trabajo</td>
					<td>Costo</td>
					<td>Estado</td>
				</tr>
			</thead>
			<tbody>
				@foreach($user->budgets as $budget)
				<tr>
					<td>{{ $budget->created_at->format('d/m/y h:m') }} hs</td>
					<td>{{ Str::limit($budget->getDescription(), 50) }}</td>
					<td><span class='grey'>$ {{ $budget->getCost() }}</span></td>
					<?php $class = ($budget->status == 'Activo') ? 'grey' : (($budget->status == 'Rechazado') ? 'red' : 'green'); ?>
					<td><span class='{{ $class }}'>{{ $budget->status }}</span></td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
	<aside>
		<ul>
			<li class='active'><a href='#'>Datos personales</a></li>
			<li><a href='#'>Mis pedidos</a></li>
		</ul>
	</aside>
</section>
<section class='container greyBackground'>
	<h3>¿Tienes preguntas?</h3>
	<p>Puede utilizar nuestra sección {{ HTML::link(URL::to('faq'), 'Preguntas Frecuentes') }} para informarte. También puede comunicarte telefónicamente con nosotros para que podamos ayudarte.<br><br>
	Tel: 2208 50 92 o por mail a <a href='mailto:info@pam.com.uy'>info&#64;pam.com.uy</a></p>
</section>
@stop

@section('scripts')
	@parent
	
	{{ HTML::script('js/fileupload.js') }}
	{{ HTML::script('js/edit.js') }}
	
	@if (Input::has('view') and Input::get('view') == 'orders')
	<script type='text/javascript'>
	(function ($) {
		'use strict';

		$(document).on('ready', function () {
			$('aside ul li:last a').trigger('click');
		});
	}(jQuery));
	</script>
	@endif
@stop
