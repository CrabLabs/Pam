(function ($) {
	'use strict';

	var data, $self, html, next, currentStep, budgetables, nextSelect;

	$(document).on('ready', function () {
		currentStep = 1;
		budgetables = $('input[name=budgetables').val().split(',');
		$('form select:first').trigger('change');
		$('.orders_step_2').hide();
		$('.orders_step_1').show();
	});

	$('.product_photo').on('click', function (event) {
		event.preventDefault();

		$('select[name=product_id]').val($(this).data('id')).trigger('change');
		$('.orders_step_1').hide();
		$('.orders_step_2').show();
		$('nav.steps .active').removeClass('active').next('li').addClass('active');
	});

	$('form').on('submit', function (event) {
		event.preventDefault();

		switch (currentStep) {
			case 1: $('.orders_step_1').hide(); $('.orders_step_2').show(); break;
			case 2: $(this).submit(); break;
		}
		currentStep += 1;
	});

	$('.details select').on('change', function () {
		if (!($('select[name=product_id]').val() in budgetables)) {
			$('.budgetable').hide();
			$('.no-budgetable').show();
			return false;
		} else {
			$('.budgetable').show();
			$('.no-budgetable').hide();
		}
		
		// $self = $(this);
		data = $('form').serialize();
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
