@extends('layouts.default')

@section('main')
<section class='upper'>
	<h3>Nosotros</h3>
	<p>Te invitamos a conocernos. Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
</section>
<section id='about-us' class='container whiteBackground'>
	<div id='left'>
		<h2>Acerca de nosotros</h2>
		<p>
			Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
			tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
			quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
			consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
			cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
			proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
		</p>
		<p>
			Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
			tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
			quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
			consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
			cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
			proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
		</p>
		<h3>Calidad</h3>
		<p>
			Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
			tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
			quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
			consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
			cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
			proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
		</p>
		<h3>Experiencia</h3>
		<p>
			Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
			tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
			quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
			consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
			cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
			proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
		</p>
	</div>
	<div id='right'>
		<img src="img/about-us_01.jpg">
		<img src="img/about-us_02.jpg">
	</div>
</section>
<section class='container greyBackground'>
	<h3>Esto es solo una parte de que lo PAM puede ofrecete, te invitamos a conocernos:</h3>
	<p>Puede utilizar nuestra sección {{ HTML::link(URL::to('about-us'), 'nosotros') }} o {{ HTML::link(URL::to('services'), 'servicios') }} para conocer PAM un poco más. También puede comunicarte telefónicamente con nosotros para que podamos ayudarte.<br><br>
	Tel: 2208 50 92 o por mail a <a href='mailto:info@pam.com.uy'>info&#64;pam.com.uy</a></p>
</section>
@stop