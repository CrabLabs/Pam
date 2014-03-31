@extends('layouts.default')

@section('main')
<section class='upper'>
	<h3>Preguntas frecuentes</h3>
	<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
</section>
<section id='faq' class='container whiteBackground'>
	@foreach($faqs as $faq)
		<div class='faq'>
			<h4 class='question'>{{ $faq->question }}</h4>
			<div class='answer'>{{ $faq->answer }}</div>
		</div>
	@endforeach
</section>
<section class='container greyBackground'>
	<h3>¿No encontraste una respuesta?</h3>
	<p>
		Puedes utilizar nuestra sección {{ HTML::link(URL::to('contact'), 'Contactos') }} para enviarnos tu consulta. También puede comunicarte telefónicamente con nosotros para que podamos ayudarte.<br><br> Tel: 2208 50 92 o por mail a <a href='mailto:info@pam.com.uy'>info&#64;pam.com.uy</a>
	</p>
</section>
@stop

@section('scripts')
	@parent

	{{ HTML::script('js/faq.js') }}
@stop
