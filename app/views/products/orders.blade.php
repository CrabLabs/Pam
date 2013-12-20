@extends('layouts.default')

@section('main')
<section class='upper'>
	<h3>Arma tu presupuesto</h3>
	<p>Personaliza tu trabajo, seleccioná las opciones en el formulario según tus requerimientos de impresión.</p>
</section>
<section id='orders' class='container whiteBackground'>
	<nav class='steps'>
		<ul>
			<li class='active'><span>1</span>Selecciona tu producto</li>
			<li><span>2</span>Caracteristicas del trabajo</li>
			<li><span>3</span>Costo aproximado</li>
		</ul>
	</nav>
	{{ Form::open() }}
		<section class='orders_step_1'>
			@foreach($products as $product)
				<a href='#' data-id='{{ $product->id }}' class='product_photo'>
					{{ HTML::image($product->getThumb()) }}
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
			<div class='graphic_design'>
				<div>
					<h3>Servicio de diseño gráfico</h3>
					{{ Form::checkbox('graphic_design', null, false, array('id' => 'graphic_design')) }}
					{{ Form::label('graphic_design', 'Deseo cotizar el gráfico de este material') }}
				</div>
				<div>
					<h3>Detalles del envio</h3>
					{{ Form::radio('collect_personally', 'false', true, array('id' => 'collect_personally_false')) }}
					{{ Form::label('collect_personally_false', 'Enviar en 48hs') }}
					{{ Form::radio('collect_personally', 'true', false, array('id' => 'collect_personally_true')) }}
					{{ Form::label('collect_personally_true', 'Lo retiro personalmente') }}
				</div>
			</div>
			<div class='attach_file'>
				<h3>Adjuntar archivo de tu trabajo</h3>
				<p>Para realizar un presupuesto más certero puedes adjuntar tu trabajo. Tamaño máximo XXXmb.</p>
				{{ Form::file('file') }}
			</div>
			<div class='details'>
				<h3>Detalles de la impresión</h3>
				<div>
					{{ Form::label('product_id', 'Producto:') }}
					<select name='product_id'>
						@foreach($products as $product)
							<option value='{{ $product->id }}'>{{ $product->name }}</option>
						@endforeach
					</select>
				</div>
				<div class='budgetable'>
					{{ Form::label('amount', 'Cantidad:') }}
					<select name='amount'></select>
				</div>
				<div class='budgetable'>
					{{ Form::label('size', 'Tamaño:') }}
					<select name='size'></select>
				</div>
				<div class='budgetable'>
					{{ Form::label('inks', 'Tintas:') }}
					<select name='inks'></select>
				</div>
				<div class='budgetable'>
					{{ Form::label('paper', 'Papel:') }}
					<select name='paper'></select>
				</div>
				<div class='budgetable'>
					{{ Form::label('weight', 'Gramaje:') }}
					<select name='weight'></select>
				</div>
				<div class='budgetable'>
					{{ Form::label('laminate', 'Laminado:') }}
					<select name='laminate'></select>
				</div>

				<div class='no-budgetable'>
					{{ Form::label('detail', 'Describa el trabajo:') }}
					{{ Form::textarea('detail') }}
				</div>
				<div class='no-budgetable'>
					{{ Form::label('email', 'Ingrese su mail donde le enviaremos su presupuesto:') }}
					{{ Form::email('email') }}
				</div>
			</div>
		</section>
		<section class='orders_step_3'>
			<!--<span id='cost' class='budgetable'></span>-->
		</section>
		{{ Form::submit() }}
	{{ Form::close() }}
</section>
@stop

@section('scripts')
	@parent

	{{ HTML::script('js/orders.js') }}
@stop