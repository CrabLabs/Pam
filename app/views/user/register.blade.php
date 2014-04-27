@extends('layouts.default')

@section('main')
<section class='container upper'>
	<h3>Registro de usuario</h3>
	<p>Registrandote pordás enviar pedidos de impresión y acceder a otros beneficios. Los datos marcados con * son obligatorios.</p>
</section>

<section id='register' class='container whiteBackground'>
	<h3 class='title'>Datos personales</h3>
	@if(count($errors->messages()) > 0)
		<h3>Hay errores en el formulario</h3>
		<ul class='register_errors'>
			@foreach($errors->messages()->all() as $message)
				<li>{{ $message }}</li>
			@endforeach
		</ul>
	@endif
	{{ Form::open(array('route' => 'user.store')) }}
		<div class='section'>
			<h3>Tipo de cuenta</h3>
			<div class='row account_type'>
				{{ Form::radio('role', 'Persona', true, array('id' => 'role_persona')) }}
				{{ Form::label('role_persona', 'Persona') }}
				{{ Form::radio('role', 'Empresa', false, array('id' => 'role_empresa')) }}
				{{ Form::label('role_empresa', 'Empresa') }}
			</div>
		</div>
		<div class='section'>
			<h3>Persona Responsable</h3>
			<div class='row'>
				<div>
					{{ Form::label('name', 'Nombre:') }}
					{{ Form::text('name') }}
				</div>
				<div>
					{{ Form::label('lastname', 'Apellido:') }}
					{{ Form::text('lastname') }}
				</div>
				<div>
					{{ Form::label('password', 'Contraseña:') }}
					{{ Form::password('password') }}
				</div>
				<div>
					{{ Form::label('password_confirmation', 'Repetir contraseña:') }}
					{{ Form::password('password_confirmation') }}
				</div>
			</div>
			<div class='row'>
				<div>
					{{ Form::label('email', 'Email:') }}
					{{ Form::email('email') }}
				</div>
				<div>
					{{ Form::label('phone', 'Phone:') }}
					{{ Form::text('phone') }}
				</div>
				<div class='empresarial_only'>
					{{ Form::label('company_name', 'Razón social:') }}
					{{ Form::text('company_name') }}
				</div>
				<div class='empresarial_only'>
					{{ Form::label('rut', 'RUT:') }}
					{{ Form::text('rut') }}
				</div>
			</div>
			<div class='row'>
				<div class='attach_file'>
					<p>Foto de perfil</p>
					{{ HTML::image(URL::to(User::$defaultImage), 'Foto de perfil', array('width' => '100', 'height' => '100')) }}
					<div class='uploader'>
						{{ Form::file('image') }}
						{{ Form::hidden('image_name', null, array('id' => 'image_name')) }}
						<div class='uploading' style='width: 100%; background: #DDD; height: 3px; padding: 0; margin: 4px 0;'>
							<div class='complete' style='width: 0; background: #0EF; height: 3px; padding: 0;'></div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class='section'>
			<div class='row-2'>
				<div>
					<h3>Dirección de envio</h3>
					{{ Form::label('shipping_address', 'Dirección:') }}
					{{ Form::text('shipping_address') }}
					{{ Form::label('shipping_time_from', 'Horario preferencial:') }}
					<br>
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
		</div>

		{{ Form::button('Cancelar', array('class' => 'btn grey cancel')) }}
		{{ Form::submit('Registrarme') }}
	{{ Form::close() }}
</section>
@stop

@section('scripts')
	@parent

	{{ HTML::script('js/fileupload.js') }}
	{{ HTML::script('js/register.js') }}
@stop
