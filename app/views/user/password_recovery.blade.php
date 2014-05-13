@extends('layouts.default')

@section('main')
<section class='upper'>
  <h3>Recuperación de contraseña</h3>
  <p>Se le enviará un email para recuperarla</p>
</section>
<section id='login' class='container whiteBackground'>
  <h3>Ingrese su email</h3>
  @if (Session::has('error'))
    {{ trans(Session::get('reason')) }}
  @elseif (Session::has('success'))
    Se ha enviado un email para recuperar la clave.
  @endif
  {{ Form::open(array('method' => 'POST')) }}
    {{ Form::label('email', 'Email: ') }}
    {{ Form::email('email') }}
    {{ Form::submit() }}
  {{ Form::close() }}
</section>
@stop
