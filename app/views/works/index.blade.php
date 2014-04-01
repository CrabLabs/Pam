@extends('layouts.default')

@section('main')
<section class='upper'>
	<h3>Trabajos</h3>
	<p>Estas son algunas muestras de los trabajos realizados.</p>
</section>
<section id='services' class='container whiteBackground'>
	@foreach($works as $work)
		<div class='service'>
			<div>
				{{ HTML::image(URL::to('img/uploads/works/originals/'.$work->image), $work->name, array('height' => 140, 'width' => 220)) }}
			</div>
			<div class='text'>
				<h3>{{ $work->name }}</h3>
				<p>{{{ $work->description }}}</p>
				{{ HTML::link(URL::to('budget'), 'Presupuestar similar', array('class' => 'similar_link')) }}
			</div>
		</div>
	@endforeach
</section>
<section class='container greyBackground'>
	<h3>Esto es solo una parte de que lo PAM puede ofrecete, te invitamos a conocernos:</h3>
<p>Puede utilizar nuestra sección {{ HTML::link(URL::to('about-us'), 'nosotros') }} o {{ HTML::link(URL::to('services'), 'servicios') }} para conocer PAM un poco más. También puede comunicarte telefónicamente  con nosotros para que podamos ayudarte.<br><br>
	Tel: 2208 50 92 o por mail a <a href='mailto:digital@pam.com.uy'>digital&#64;pam.com.uy</a></p>
</section>
@stop
