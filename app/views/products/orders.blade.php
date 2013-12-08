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
			<?php
				$budgetables = [];
				foreach($products as $product) {
					if($product->budgetable)
						$budgetables[] = $product->id;
				}
				echo Form::hidden('budgetables', implode(',', $budgetables));
			?>
			<select name='product_id'>
				@foreach($products as $product)
					<option value='{{ $product->id }}'>{{ $product->name }}</option>
				@endforeach
			</select>
			
			<select name='amount' class='budgetable'></select>

			<select name='size' class='budgetable'></select>

			<select name='inks' class='budgetable'></select>
			
			<span id='cost' class='budgetable'></span>
		</section>
		{{ Form::submit() }}
	{{ Form::close() }}
</section>
@stop

@section('scripts')
	@parent

	{{ HTML::script('js/orders.js') }}
@stop