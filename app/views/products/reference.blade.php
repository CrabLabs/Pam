@extends('layouts.default')

@section('main')
<section class='upper'>
	<h3>Imprimir ahora</h3>
	<p>¡Gracias!</p>
</section>

<section class='container whiteBackground'>
	<h3>Su númer de referencia es <span>{{ $order->reference }}</span></h3>
</section>

<section class='container greyBackground'>
	<h3>Día</h3>
	<p>Contacto</p>
</section>
@stop