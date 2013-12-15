@extends('layouts.default')

@section('main')
<section id='edit' class='container whiteBackground'>
	<h3 class='title'>Datos personales</h3>
	@if(isset($messages))
		<h3>Hay errores en el formulario</h3>
		<ul class='register_errors'>
			@foreach($messages->all() as $message)
				<li>{{ $message }}</li>
			@endforeach
		</ul>
	@endif
	{{ Form::open(array('route' => 'user.store')) }}
		<div class='section'>
			<h3>Tipo de cuenta</h3>
			<div class='row account_type'>
				{{ Form::radio('role', 'Persona', true, array('id' => 'role_persona')) }}
				{{ Form::label('role_persona', 'Personal') }}
				{{ Form::radio('role', 'Empresa', false, array('id' => 'role_empresa')) }}
				{{ Form::label('role_empresa', 'Empresarial') }}
			</div>
		</div>
		<div class='section'>
			<h3>Persona Responsable</h3>
			<div class='row'>
				<div>
					{{ Form::label('name', 'Nombre') }}
					{{ Form::text('name') }}
				</div>
				<div>
					{{ Form::label('lastname', 'Apellido') }}
					{{ Form::text('lastname') }}
				</div>
				<div>
					{{ Form::label('email', 'Email') }}
					{{ Form::email('email') }}
				</div>
			</div>
			<div class='row'>
				<div>
					{{ Form::label('phone', 'Phone') }}
					{{ Form::text('phone') }}
				</div>
				<div>
					{{ Form::label('company_name', 'Razón social') }}
					{{ Form::text('company_name') }}
				</div>
				<div>
					{{ Form::label('rut', 'RUT') }}
					{{ Form::text('rut') }}
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
		</div>
		<div class='section'>
			<div class='row-2'>
				<div>
					<h3>Dirección de envio</h3>
					{{ Form::label('shiping_address', 'Dirección') }}
					{{ Form::text('shiping_address') }}
					{{ Form::label('shipping_time_from', 'Horario preferencial') }}
					{{ Form::select('shipping_time_from', $times) }}
					<span>a</span>
					{{ Form::select('shipping_time_to', $times) }}
				</div>
				<div>
					<h3>Dirección de facturación</h3>
					{{ Form::checkbox('same_billing_address') }}
					{{ Form::label('same_billing_address', 'Igual que la dirección de envio') }}
					{{ Form::text('billing_address') }}
				</div>
			</div>
		</div>

		{{ Form::button('Cancelar') }}
		{{ Form::submit('Registrarme') }}
	{{ Form::close() }}
</section>
@stop
