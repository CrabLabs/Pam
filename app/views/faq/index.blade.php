@extends('layouts.default')

@section('main')
<section class='upper'>
	<h3>Preguntas frecuentes</h3>
	<p>Estamos a tu disposición para responder todas tus dudas y consultas. </p>
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
	<p>Puede utilizar nuestra sección {{ HTML::link(URL::to('about-us'), 'nosotros') }} o {{ HTML::link(URL::to('services'), 'servicios') }} para conocer PAM un poco más. También puede comunicarte telefónicamente  con nosotros para que podamos ayudarte.<br><br>
	Tel: 2208 50 92 o por mail a <a href='mailto:digital@pam.com.uy'>digital&#64;pam.com.uy</a></p>
</section>
@stop

@section('scripts')
	@parent

	{{ HTML::script('js/faq.js') }}
@stop
