<!DOCTYPE html>
<html class='no-js'>
<head>
	<meta charset='utf-8'>
	<meta http-equiv='X-UA-Compatible' content='IE=edge'>
	<title>{{ $title }}</title>
	<meta name='description' content=''>
	<meta name='viewport' content='width=device-width, initial-scale=1 user-scalable=no'>

	<!-- Place favicon.ico and apple-touch-icon(s) in the root directory -->
	@section('styles')
	{{ HTML::style('css/normalize.css') }}
	{{ HTML::style('css/screen.css') }}
	@stop
	@yield('styles')
	{{ HTML::script('js/vendor/modernizr-2.7.0.js') }}
</head>
<body>
		<!--[if lt IE 8]>
		<p class='browsehappy'>You are using an <strong>outdated</strong> browser. Please <a href='http://browsehappy.com/'>upgrade your browser</a> to improve your experience.</p>
		<![endif]-->
<header>
	<nav>
		<div class='container'>
			<span class='phone_support'><strong>Atención al cliente:</strong> 2208 50 92</span>
			<div id='menu_nav_mobile'></div>
			<ul class='menu_nav'>
				<li class='home'><a href='{{ URL::to('/') }}'>HOME</a></li>
				{{ HTML::liActive('services', HTML::link('services', 'SERVICIOS')) }}
				{{ HTML::liActive('about-us', HTML::link('about-us', 'NOSOTROS')) }}
				{{ HTML::liActive('works', HTML::link('works', 'TRABAJOS')) }}
				{{ HTML::liActive('contact', HTML::link('contact', 'CONTACTO')) }}
				@if (Auth::user())
				<li class='user'>
					<a href='#' id='user-name'><img src='{{ Auth::user()->getImage() }}' width='25' height='25'>{{ Auth::user()->name.' '.Auth::user()->lastname }}</a>
					<div>
						<a href='edit' id='edit'>Mi cuenta</a>
					</div>
					<div>
						<a href='logout' id='logout'>Cerrar sesión</a>
					</div>
				</li>
				@else
				{{ HTML::liActive('login', HTML::link('login', 'Login / Registro')) }}
				@endif
			</ul>
		</div>
	</nav>
	<div class='header_wrapper'>
		<div class='container'>
			<div class='section logo'><a href='{{ URL::to('/') }}'></a></div>
			<div class='index_mobile'>
				<img src="img/main_img.jpg">
			</div>
			<div class='section print_now'>
				<a href='{{ URL::to('order') }}'>
					<span><strong style="font-size:13px;">Imprimir ahora</strong> <br/><b style="font-weight:normal">Adjunte el trabajo a imprimir</b></span>
				</a>
				<div class='section_arrow'></div>
			</div>
			<div class='section create_budget'>
				<a href='{{ URL::to('budget') }}'>
					<span><strong style="font-size:13px;">Armá tu presupuesto </strong> <br/><b style="font-weight:normal">Personalizá tu trabajo</span>
				</a>
				<div class='section_arrow'></div>
			</div>
			<div class='section faq'>
				<a href='{{ URL::to('faq') }}'>
					<span><strong style="font-size:13px;">Preguntas frecuentes </strong> <br/><b style="font-weight:normal">Respondemos todas tus dudas</span>
				</a>
				<div class='section_arrow'></div>
			</div>
		</div>
	</div>
</header>
<div id='main' role='main'>
	@yield('main')
</div>

<footer>
	<div class='container'>
		<ul>
			<li>{{ HTML::linkActive('/', 'Home') }}</li>
			<li>{{ HTML::linkActive('services', 'Servicios') }}</li>
			<li>{{ HTML::linkActive('about-us', 'Nosotros') }}</li>
			<li>{{ HTML::linkActive('works', 'Trabajos') }}</li>
			<li>{{ HTML::linkActive('contact', 'Contacto') }}</li>
			<li>{{ HTML::linkActive('login', 'Login / Registro') }}</a></li>
		</ul>
		<div class='footer-logo'><a href='{{ URL::to('/') }}'></a></div>
		<span>Imprenta pam &copy; 2013. digital&#64;pam.com.uy</span>
	</div>
</footer>

@section('scripts')
{{ HTML::script('//ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js') }}
{{ HTML::script('js/vendor/jquery-2.0.3.min.js') }}
@stop
@yield('scripts')
<script src='js/main.js'></script>
<script>
(function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
	function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
e=o.createElement(i);r=o.getElementsByTagName(i)[0];
e.src='//www.google-analytics.com/analytics.js';
r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
ga('create','UA-47842795-1');ga('send','pageview');

(function ($) {
	'use strict';

	$('header nav .user').on('click', function () {
		$(this).toggleClass('active');
	});
}(jQuery));
</script>
@if (App::Environment() == 'local')
<script src='http://localhost:35729/livereload.js'></script>
@endif
</body>
</html>
