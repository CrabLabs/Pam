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
			{{ Form::open(array('method' => 'get', 'route' => 'budget')) }}
			{{ Form::select('product', $list) }}
			{{ Form::submit('Cotizar') }}
			{{ Form::close() }}
			<div class='index_slider'>
				<ul>
					@foreach($products as $product)
					<li>
						<div><a href='{{ URL::to('budget') }}?product={{ $product->id }}'>
							{{ HTML::image(URL::to('img/uploads/products/originals/'.$product->image)) }}
							<span>{{ $product->name }}</span>
						</a></div>
					</li>
					@endforeach
				</ul>
			</div>
		</div>
		<style type="text/css">
		.clientes{

			margin-right: 34px;
			margin-top: 15px;
			max-width: 120px;
			max-height: 80px;
			
		}
		</style>

		<div class='clients'>
			<div class='container'>
				<h3>Algunos de nuestro clientes</h3>
				<h4>Estos son algunos de los clientes que han confiado en nosotros.</h4>
				<img class="clientes" src='img/acberry.png'>
				<img class="clientes" src='img/agropic.png'>
				<img class="clientes" src='img/aguerrebere.png'>
				<img class="clientes" src='img/calister.png'>
				<img class="clientes" src='img/cardo-criado.png'>
				<img class="clientes" src='img/cascanueces.png'>	
				<img class="clientes" src='img/cativelli.png'>
				<img class="clientes" src='img/CNdeF.png'>
				<img class="clientes" src='img/distribuidora_tacuarembo.png'>
				<img class="clientes" src='img/eldorado.png'>
				<img class="clientes" src='img/ferreteria.png'>
				<img class="clientes" src='img/finacam.png'>	
				<img class="clientes" src='img/julius-bar.png'>
				<img class="clientes" src='img/lock_perfection.png'>
				<img class="clientes" src='img/muelle_oriental.png'>
				<img class="clientes" src='img/old_christians.png'>
				<img class="clientes" src='img/onmango.png'>
				<img class="clientes" src='img/oribe_remates.png'>	
				<img class="clientes" src='img/pasto_y_agua.png'>
				<img class="clientes" src='img/veterinaria-san-jacinto.png'>
				<img class="clientes" src='img/victoria-m-ortiz.png'>
				<img class="clientes" src='img/victorica_y_asociados.png'>
				<img class="clientes" src='img/VM.png'>
				<img class="clientes" src='img/ANTEL.png'>
				<img class="clientes" src='img/BANCO_COMERCIAL.png'>
				<img class="clientes" src='img/CONAPROLE.png'>
				<img class="clientes" src='img/ITAU.png'>
				<img class="clientes" src='img/NESTLE.png'>
				<img class="clientes" src='img/SANTANDER.png'>
			</div>
		</div>
		<div class='contact'>
			<div class='container'>
				<h3>Contactenos</h3>
				<h4>Contactate con nosotros para obtener más información acerca de nuestros servicios.</h4>
				<section>
					<div class='info home'>
						<span>Personalmente</span>
						<span>Pedernal 1865</span>
						<span>CP 12.200</span>
						<span>Montevideo, Uruguay</span>
					</div>
					<div class='info phone'>
						<span>Telefónicamente</span>
						<span>Tel: (598) 2 208 50 92</span>
						<!--<span><a href='#'>DESCARGAR VCARD</a></span>-->
					</div>
				</section>
				{{ Form::open() }}
				<div class='info digital'>
					<span>Digitalmente</span>
					<span>digital&#64;pam.com.uy</span>
				</div>
				<div>{{ Form::text('name', null, array('placeholder' => 'Nombre')) }}</div>
				<div>{{ Form::text('company', null, array('placeholder' => 'Empresa')) }}</div>
				<div>{{ Form::text('subject', null, array('placeholder' => 'Asunto')) }}</div>
				<div>{{ Form::text('phone', null, array('placeholder' => 'Teléfono')) }}</div>
				<div>{{ Form::email('email', null, array('placeholder' => 'Email')) }}</div>
				<div>{{ Form::textarea('message', null, array('placeholder' => 'Mensaje')) }}</div>
				{{ Form::submit('Enviar mensaje') }}
				{{ Form::close() }}
			</div>
		</div>
	</div>
</section>
@stop
