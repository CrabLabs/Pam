@extends('layouts.default')

@section('main')
<section id='orders'>
	{{ Form::open() }}
		<section class='orders_step_1'>
			@foreach($products as $product)
				<a href='#' data-id='{{ $product->id }}' class='product_photo'>
					{{ HTML::image($product->image) }}
					<span>{{ $product->name }}</span>
				</a>
			@endforeach
		</section>
		<section class='orders_step_2'>
			<select name='product_id'>
				@foreach($products as $product)
					<option value='{{ $product->id }}'>{{ $product->name }}</option>
				@endforeach
			</select>
			
			<select name='amount'></select>

			<select name='size'></select>

			<select name='inks'></select>
			
			<span id='cost'></span>
		</section>
		{{ Form::submit() }}
	{{ Form::close() }}
</section>
@stop

@section('scripts')
	@parent

	{{ HTML::script('js/orders.js') }}
@stop