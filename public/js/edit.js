(function ($) {
	'use strict';

	$(document).on('ready', function () {
		$('.empresarial_only, input[name=billing_address]').hide();
		$('.edit-main:last').hide();
	});

	$('input[name=role]').on('change', function () {
		if ($(this).val() === 'Empresa') {
			$('.empresarial_only').fadeIn();
		} else {
			$('.empresarial_only').fadeOut();
		}
	});

	$('input[name=same_billing_address]').on('change', function () {
		if ($(this).is(':checked')) {
			$('input[name=billing_address]').fadeOut();
		} else {
			$('input[name=billing_address]').fadeIn();
		}
	});

	$('aside a').on('click', function (event) {
		event.preventDefault();
		$('.edit-main').hide().eq($(this).parent('li').index()).show();
		$('aside .active').removeClass('active');
		$(this).parent('li').addClass('active');
	});

	$('.cancel').on('click', function () {
		document.location.href = '/';
	});

}(jQuery));
