<!DOCTYPE html>
<html class='no-js'>
	<head>
		<meta charset='utf-8'>
		<meta http-equiv='X-UA-Compatible' content='IE=edge'>
		<title>{{ $title }}</title>
		<meta name='description' content=''>
		<meta name='viewport' content='width=device-width, initial-scale=1'>

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
					<span class='phone_support'><strong>Atención al cliente:</strong> 02 702 545</span>
					<ul>
						<li class='home'></li>
						<li>Sevicios</li>
						<li>Nosotros</li>
						<li>Trabajos</li>
						<li>Contacto</li>
						<li class='login'>Login / Registro</li>
					</ul>
				</div>
			</nav>
			<div class='header_wrapper'>
				<div class='container'>
					<div class='section logo'>pam</div>
					<div class='section print_now'>Imprimir ahora</div>
					<div class='section create_budget'>Armá tu presupuesto</div>
					<div class='section faq'>Preguntas frecuentes</div>
				</div>
			</div>
		</header>
		
		<div id='main' role='main'>
			@yield('main')
		</div>
		
		<footer>
			<ul>
				<li>Home</li>
				<li>Servicios</li>
				<li>Nosotros</li>
				<li>Trabajos</li>
				<li>Contacto</li>
				<li>Login / Registro</li>
			</ul>
			<span>Imprenta pam 2013. info&#64;imprentapam.com.uy</span>
		</footer>

		@section('scripts')
			{{ HTML::script('//ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js') }}
			{{ HTML::script('js/vendor/jquery-2.0.3.min.js') }}
		@stop
		@yield('scripts')
		<!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
		<script>
			(function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
			function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
			e=o.createElement(i);r=o.getElementsByTagName(i)[0];
			e.src='//www.google-analytics.com/analytics.js';
			r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
			ga('create','UA-XXXXX-X');ga('send','pageview');
		</script>
	</body>
</html>
