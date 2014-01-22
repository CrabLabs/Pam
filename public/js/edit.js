(function ($) {
	'use strict';

	$('.attach_file input').fileUpload({
		location: 'img/uploads/users/originals',
		onSuccess: function (res) {
			$('#image_name').val(res.file);
			$('.uploading .complete').css('width', '100%');
			var src = $('.attach_file img').attr('src').split('/')
			src[src.length - 1] = res.file;
			src = src.join('/');
			$('.attach_file img').attr('src', src);
		},
		onProgress: function (percent) {
			$('.uploading .complete').css('width', percent + '%');
		}
	});

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

	$('input[name=password]').on('change', function () {
		if ($.trim($(this).val()) === '') {
			$('input[name=password_confirmation]').attr('disabled', true)
		} else {
			$('input[name=password_confirmation]').attr('disabled', false)
		}
	})

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
