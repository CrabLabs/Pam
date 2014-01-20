(function ($) {
	'use strict';
	
	$('#menu_nav_mobile').on('click', function (e) {
		e.preventDefault();
		$('.menu_nav').toggleClass('visible');
	});

}(jQuery));
