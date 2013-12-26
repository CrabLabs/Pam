@extends('layouts.default')

@section('main')
<section class='upper'>
	<h3>Contact</h3>
	<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
</section>
<section id='contact' class='container whiteBackground'>
	<h3>Formulario de contacto</h3>
	<span class='subtitle'>Los datos con * son obligatorios.</span>
	{{ Form::open() }}
		<div>
			{{ Form::label('name', 'Nombre: *') }}
			{{ Form::text('name', null, array('required' => true)) }}
		</div>
		<div>
			{{ Form::label('company', 'Empresa:') }}
			{{ Form::text('company') }}
		</div>
		<div>
			{{ Form::label('email', 'Email: *') }}
			{{ Form::email('email', null, array('required' => true)) }}
		</div>
		<div>
			{{ Form::label('phone', 'Teléfono:') }}
			{{ Form::text('phone') }}
		</div>
		<div>
			{{ Form::label('subject', 'Razón de consulta:') }}
			{{ Form::select('subject', array(
				'Servicio de diseño gráfico'
			)) }}
		</div>
		<div>
			{{ Form::label('message', 'Mensage: *') }}
			{{ Form::textarea('message', null, array('required' => true)) }}
		</div>
		<div class='submit'>
			{{ Form::submit('Enviar mensaje') }}
		</div>
	{{ Form::close() }}
</section>
@stop
