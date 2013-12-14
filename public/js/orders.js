(function ($) {
	'use strict';

	var data, $self, html, next, currentStep, budgetables;

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

	$('form select').on('change', function () {
		if (!($('select[name=product_id]').val() in budgetables)) {
			$('.budgetable').hide();
			return false;
		} else {
			$('.budgetable').show();
		}
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
