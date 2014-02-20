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
			Con más de 25 años dedicados a la gráfica, estamos preparados para brindarle un excelente producto complementado con un gran servicio. 
			Le ofrecemos todo en cuanto a impresión offset y digital.
		</p>
		<h3>Impresión offset</h3>
		<p>
			Folletos y brochures, volantes, afiches, invitaciones, sobres especiales, cartas y comunicados. 
			Stationary (papelería comercial: hojas carta, sobres, carpetas, carpetines, tarjetas de presentación.
			Packaging, estuches, envases, stickers, etiquetas, autoadhesivos. Libros de texto, memorias y balances anuales. Programas, revistas, libros, libros de arte y catálogos. Terminaciones con laminado mate o brillo y barniz UV.
		</p>
		<h3>Impresión digital</h3>
		<p>
			Folletos, volantes, tarjetas personales, diplomas y menús. Banners y roll ups. Gigantografías: posters, banners, afiches y fotografías en grandes tamaños. Soportes rígidos. Autoadhesivos. Calidad fotográfica en papeles especiales. Asistencia especializada en diseño grafico a nuestros clientes.
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
	Tel: 2208 50 92 o por mail a <a href='mailto:digital@pam.com.uy'>digital&#64;pam.com.uy</a></p>
</section>
@stop