@extends('layouts.default')

@section('main')
<section id='faq'>
	@foreach($faqs as $faq)
		<div class='faq'>
			<h4 class='question'>{{ $faq->question }}</h4>
			<div class='answer'>{{ $faq->answer }}</div>
		</div>
	@endforeach
</section>
@stop

@section('scripts')
	@parent

	{{ HTML::script('js/faq.js') }}
@stop
