(function ($) {
	'use strict';

	$(document).on('ready', function () {
		$('.empresarial_only').hide();
	});

	$('input[name=role]').on('change', function () {
		if ($(this).val() === 'Empresa') {
			$('.empresarial_only').fadeIn();
		} else {
			$('.empresarial_only').fadeOut();
		}
	});	

}(jQuery));
