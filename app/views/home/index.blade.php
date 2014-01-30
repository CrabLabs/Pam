@extends('layouts.default')

@section('main')
<section id='index'>
	<div class='index_wrapper'>
		<div class='container-small'>
			<div class='index_highlight'>
				<img src='img/img_06.png'>
				<span>Cotizá tu trabajo online y solicita la impresión hoy mismo.</span>	
			</div>
			<div class='index_highlight'>
				<img src='img/img_07.png'>
				<span>Adjuntanos tu trabajo o solicitá nuestro servicio de diseño.</span>	
			</div>
			<div class='index_highlight'>
				<img src='img/img_08.png'>
				<span>Recibí tu trabajo impreso en la dirección y el horario que indíques.</span>	
			</div>
			<div id="index_slider_arrow"></div>
		</div>
	</div>
	<div class='container_fullwidth'>
		<div class='container'>
			<h3>Elíge tu producto, arma tu presupuesto y manda imprimir hoy mismo!</h3>	
			{{ Form::open(['method' => 'get', 'route' => 'budget']) }}
				{{ Form::select('product', $list) }}
				{{ Form::submit('Cotizar') }}
			{{ Form::close() }}
			<div class='index_slider'>
				<ul>
					@foreach($products as $product)
						<li>
							<div>
								{{ HTML::image(URL::to('img/uploads/products/originals/'.$product->image)) }}
								<span>{{ $product->name }}</span>
							</div>
						</li>
					@endforeach
				</ul>
			</div>
		</div>
		<div class='clients'>
			<div class='container'>
				<h3>Algunos de nuestro clientes</h3>
				<h4>Estos son algunos de los clientes que han confiado en nosotros.</h4>
				<img src='img/img_09.png'>
				<img src='img/img_10.png'>
				<img src='img/img_11.png'>
				<img src='img/img_12.png'>
				<img src='img/img_13.png'>
				<img src='img/img_14.png'>
			</div>
		</div>
		<div class='contact'>
			<div class='container'>
				<h3>Contactenos</h3>
				<h4>Contactate con nosotros para obtener más información acerca de nuestros servicios.</h4>
				<section>
					<div class='info home'>
						<span>Personalmente</span>
						<span>Imprenta Pam</span>
						<span>CP 12.200</span>
						<span>Montevideo, Uruguay</span>
					</div>
					<div class='info phone'>
						<span>Telefónicamente</span>
						<span>Tel: (598) 2 208 50 92</span>
						<span><a href='#'>DESCARGAR VCARD</a></span>
					</div>
				</section>
				{{ Form::open() }}
					<div class='info digital'>
						<span>Digitalmente</span>
						<span>info&#64;pam.com.uy</span>
					</div>
					<div>{{ Form::text('name', null, ['placeholder' => 'Nombre']) }}</div>
					<div>{{ Form::text('company', null, ['placeholder' => 'Empresa']) }}</div>
					<div>{{ Form::text('subject', null, ['placeholder' => 'Asunto']) }}</div>
					<div>{{ Form::text('phone', null, ['placeholder' => 'Teléfono']) }}</div>
					<div>{{ Form::email('email', null, ['placeholder' => 'Email']) }}</div>
					<div>{{ Form::textarea('message', null, ['placeholder' => 'Mensaje']) }}</div>
					{{ Form::submit('Enviar mensaje') }}
				{{ Form::close() }}
			</div>
		</div>
	</div>
</section>
@stop