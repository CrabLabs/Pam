@extends('layouts.default')

@section('main')
<section id='index'>
	<div class='index_wrapper'>
		<div class='container'>
			<div class='index_highlight'>
				<img src=''>
				<span>Cotizá tu trabajo online y solicita la impresión hoy mismo.</span>	
			</div>
			<div class='index_highlight'>
				<img src=''>
				<span>Adjuntanos tu trabajo o solicitá nuestro servicio de diseño.</span>	
			</div>
			<div class='index_highlight'>
				<img src=''>
				<span>Recibí tu trabajo impreso en el horario que indíques.</span>	
			</div>
		</div>
	</div>
	<div class='container'>
		<h3>Elegí tu presupuesto y manda imprimir hoy mismo!</h3>	
		{{ Form::open() }}
			{{ Form::select('index_product', $list) }}
			{{ Form::submit() }}
		{{ Form::close() }}
		<div class='index_slider'>
			<ul>
				@foreach($products as $product)
					<li>
						<div>
							{{ HTML::image(URL::to($product->image)) }}
							<span>{{ $product->name }}</span>
						</div>
					</li>
				@endforeach
			</ul>
		</div>
	</div>
</section>
@stop