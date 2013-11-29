@extends('layouts.default')

@section('main')
	{{ Form::open() }}
		<select name='product_id'>
			@foreach($products as $product)
				<option value='{{ $product->id }}'>{{ $product->name }}</option>
			@endforeach
		</select>
		
		<select name='amount'></select>

		<select name='size'></select>

		<select name='inks'></select>
		
		<span id='cost'></span>
	{{ Form::close() }}
@stop

@section('scripts')
	@parent

	<script type='text/javascript'>
	(function ($) {
		'use strict';

		var data, $self, html, next;

		$(document).on('ready', function () {
			$('form select:first').trigger('change');
		});

		$('form select').on('change', function () {
			$self = $(this);
			data = $('form').serialize();
			data = data.split($(this).next('select').attr('name'))[0];
			data+= '&select=' + ($(this).next('select').attr('name') || 'cost');
			
			$.getJSON('order/getDetail', data, function (res) {
				html = '';
				next = $self.next('select').attr('name');
				if (res.cost !== undefined) {
					$('#cost').text(res.cost);
				} else {
					$.each(res, function (index, value) {
						html += '<option>' + value[next] + '</option>';
					});
					$self.next('select').html('').append(html).trigger('change');
				}
			});
		});
	}(jQuery));
	</script>
@stop