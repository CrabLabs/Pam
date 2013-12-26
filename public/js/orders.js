(function ($) {
	'use strict';

	var data, $self, html, next, budgetables, nextSelect;

	$(document).on('ready', function () {
		budgetables = $('input[name=budgetables').val().split(',');
		$('form select:first').trigger('change');
		$('.orders_step_2, .orders_step_3').hide();
		$('.orders_step_1').show();
	});

	$('.product_photo').on('click', function (event) {
		event.preventDefault();

		$('select[name=product_id]').val($(this).data('id')).trigger('change');
		$('.orders_step_1').hide();
		$('.orders_step_2').show();
		$('nav.steps .active').removeClass('active').next('li').addClass('active');
	});

	$('.next_step').on('click', function () {
		if (!($('select[name=product_id]').val() in budgetables)) {
			alert('Mensaje');
		} else {
			$('.orders_step_2').hide();
			$('.orders_step_3').show();
			$('nav.steps .active').removeClass('active').next('li').addClass('active');	
		}
		$('.details_list dl').html('<dt>Producto:</dt><dd>' + $('select[name=product_id] :selected').text() + '</dd>');
		$('.details .budgetable').each(function () {
			var html = '<dt>' + $(this).children('label').text() + '</dt>';
			html += '<dd>' + $(this).children('select').val() + '</dd>';
			$('.details_list dl').append(html);
		});
	});

	$('.modify').on('click', function (event) {
		event.preventDefault();

		$('.orders_step_3').hide();
		$('.orders_step_2').show();
		$('nav.steps .active').removeClass('active').prev('li').addClass('active');	
	});

	$('form').on('submit', function (event) {
		event.preventDefault();

		$(this).submit();
	});

	$('.details select').on('change', function () {
		if (!($('select[name=product_id]').val() in budgetables)) {
			$('.next_step').val('Presupuestar');
			$('.budgetable').hide();
			$('.no-budgetable').show();
			return false;
		} else {
			$('.next_step').val('Siguiente');
			$('.budgetable').show();
			$('.no-budgetable').hide();
		}
		
		data = $('.details').serialize();
		nextSelect = $(this).parent('div').next('div').children('select');
		
		if (nextSelect[0] === []) {
			data = data.split($(this).attr('name'))[0];
		} else {
			data = data.split(nextSelect.attr('name'))[0];
		}
		data+= '&select=' + (nextSelect.attr('name') || 'cost');
		
		$.getJSON('order/getDetail', data, function (res) {
			html = '';
			next = nextSelect.attr('name');
			if (res.cost !== undefined) {
				$('#cost').text(res.cost);
			} else {
				$.each(res, function (index, value) {
					html += '<option>' + value[next] + '</option>';
				});
				nextSelect.html('').append(html).trigger('change');
			}
		});
	});
}(jQuery));
