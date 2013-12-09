(function ($) {
	'use strict';

	$(document).on('ready', function () {
		$('.faq .answer').hide();
	});

	$('.faq .question').on('click', function () {
		$(this).toggleClass('opened').next('.answer').toggle().toggleClass('opened');
	});

}(jQuery));
