@extends('layouts.default')

@section('main')
<section class='upper'>
  <h3>Recuperación de contraseña</h3>
  <p></p>
</section>
<section id='login' class='container whiteBackground'>
  <h3>Confirme su nueva contraseña</h3>
  @if (Session::has('error'))
    {{ trans(Session::get('reason')) }}
  @endif
  {{ Form::open(array('method' => 'POST')) }}
    <input type="hidden" name="token" value="{{ $token }}">
    {{ Form::label('email', 'Email: ') }}
    {{ Form::email('email') }}
    {{ Form::password('password') }}
    {{ Form::password('password_confirmation') }}
    {{ Form::submit() }}
  {{ Form::close() }}
</section>
@stop
