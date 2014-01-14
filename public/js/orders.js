(function ($) {
	'use strict';

	var data, $self, html, next, budgetables, nextSelect, currentStep;

	$(document).on('ready', function () {
		budgetables = $('input[name=budgetables').val().split(',');
		$('form select:first').trigger('change');
		$('.orders_step').hide();
		$('.orders_step_1').show();

		currentStep = 1;
	});

	$('.product_photo').on('click', function (event) {
		event.preventDefault();

		$('select[name=product_id]').val($(this).data('id')).trigger('change');
		currentStep = 2;
		$('.orders_step').hide();
		$('.orders_step_' + currentStep).show();
		$('nav.steps .active').removeClass('active').next('li').addClass('active');
	});

	$('.next_step').on('click', function () {
		var selection = ($('select[name=product_id]').val() in budgetables) ? 'budgetable' : 'no-budgetable';

		currentStep += 1;
		$('.orders_step').hide();
		$('.orders_step_' + currentStep).show();
		
		if (currentStep < 4) {
			$('nav.steps .active').removeClass('active').next('li').addClass('active');
		}
		console.log(currentStep);
		if (currentStep === 4) {
			// PRODUCT SUMMARY
			$('#product_summary').html('<dt>Producto:</dt><dd>' + $('select[name=product_id] :selected').text() + '</dd>');
			$('.details .' + selection).each(function () {
				var html = '<dt>' + $(this).children('label').text() + '</dt>';
				html += '<dd>' + $(this).children('select, input, textarea').val() + '</dd>';
				$('#product_summary').append(html);
			});
			// SHIPPING SUMMARY
			$('.summary .address').text($('input[name=shiping_address]').val());
			$('.summary .time').text('De ' + $('select[name=shipping_time_from] :selected').text() + ' a ' + $('select[name=shipping_time_to] :selected').text());
			$('.summary .collect').text(($('#collect_personally_true').is(':checked')) ? 'Personalmente' : 'Enviar en 48hs');
			$('.payment_option').text($('input[name=payment_option]').val());
			// BILLING ADDRESS

			// USER SUMMARY
			$('#user_summary').html('');
			$('.orders_step_3 .details div').each(function () {
				var html = '<dt>' + $(this).children('label').text() + '</dt>';
				html += '<dd>' + $(this).children('input').val() + '</dd>';
				$('#user_summary').append(html);
			});
		}
	});

	$('.modify').on('click', function (event) {
		event.preventDefault();

		$('.orders_step_3').hide();
		$('.orders_step_2').show();
		$('nav.steps .active').removeClass('active').prev('li').addClass('active');	
	});

	$('.details select').on('change', function () {
		if ($.inArray($('select[name=product_id]').val(), budgetables) === -1) {
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
		data+= '&select=' + (nextSelect.attr('name') || 'price');
		
		$.getJSON('order/getDetail', data, function (res) {
			html = '';
			next = nextSelect.attr('name');
			if (res.price !== undefined) {
				$('#cost').text(res.price);
			} else {
				$.each(res, function (index, value) {
					html += '<option>' + value[next] + '</option>';
				});
				nextSelect.html('').append(html).trigger('change');
			}
		});
	});
}(jQuery));
