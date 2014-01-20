(function ($) {
	'use strict';

	$(document).on('ready', function () {
		$('.empresarial_only, input[name=billing_address]').hide();
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

	$('.cancel').on('click', function () {
		document.location.href = '/';
	});

	$('#menu_nav_mobile').on('click', function (e) {
		e.preventDefault();
		$('.menu_nav').toggleClass('visible');
	});

}(jQuery));
