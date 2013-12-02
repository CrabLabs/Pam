@extends('layouts.default')

@section('main')
<section id='services'>
	@foreach($services as $service)
		<div class='service'>
			{{ HTML::image($service->image) }}
			{{ $service->name }}
			{{{ $service->description }}}
		</div>
	@endforeach

	<div class='well'>
		<h3>Esto es solo una parte de que lo PAM puede ofrecete, te invitamos a conocernos:</h3>
		<p>Puede utilizar nuestra sección {{ HTML::link(URL::to('us'), 'nosotros') }} o {{ HTML::link(URL::to('services'), 'servicios') }} para conocer PAM un poco más. También puede comunicarte telefónicamente con nosotros para que podamos ayudarte.<br><br>Tel: 2208 50 92</p>
	</div>
</section>
@stop