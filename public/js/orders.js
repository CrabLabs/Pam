(function ($) {
	'use strict';

	var data,
		html,
		$self,
		nextName,
		nextSelect,
		currentStep,
		budgetables;

	/**
	 * EVENT: Trigger when document is ready.
	 *
	 * @return void
	 */
	$(document).on('ready', function () {
		budgetables = $('input[name=budgetables').val().split(',');
		$('form select:first').trigger('change');
		$('.orders_step').hide();
		$('.orders_step_1').show();

		currentStep = 1;
	});

	/**
	 * EVENT: Trigger when clicks on .product_photo link.
	 *
	 * @return void
	 */
	$('.product_photo').on('click', function (event) {
		event.preventDefault();

		currentStep = 2;
		$('.orders_step').hide();
		$('.orders_step_' + currentStep).show();
		$('select[name=product_id]').val($(this).data('id')).trigger('change');
		$('nav.steps .active').removeClass('active').next('li').addClass('active');
	});

	/**
	 * EVENT: Trigger when clicks on .next_step link.
	 * Produce a JSON request with AJAX that returns the price of match selection.
	 * Also generates a summary with the specifications of the product.
	 *
	 * @return void
	 */
	$('.next_step').on('click', function () {
		var selection = ($('select[name=product_id]').val() in budgetables) ? 'budgetable' : 'no-budgetable';

		currentStep += 1;
		$('.orders_step').hide();
		$('.orders_step_' + currentStep).show();
		
		if (currentStep < 4) {
			$('nav.steps .active').removeClass('active').next('li').addClass('active');
		}

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

	/**
	 * EVENT: Trigger when clicks on .modify link.
	 *
	 * @return void
	 */
	$('.modify').on('click', function (event) {
		event.preventDefault();

		$('.orders_step_3').hide();
		$('.orders_step_2').show();
		$('nav.steps .active').removeClass('active').prev('li').addClass('active');	
	});

	/**
	 * EVENT: Trigger when change the value on .details select children.
	 * Produce a JSON request with AJAX and appends each the response in
	 * next select.
	 *
	 * @return void
	 */
	$('.details select').on('change', function () {
		// Check if the selected product_id is non-budgetable
		if ($.inArray($('select[name=product_id]').val(), budgetables) === -1) {
			// Show the non-budgetable form
			$('.budgetable').hide();
			$('.no-budgetable').show();
			// Stop propagation
			return false;
		} else {
			// Show the budgetable form
			$('.budgetable').show();
			$('.no-budgetable').hide();
		}
		
		// Serialize the form data
		data = $('form select').serialize();

		// Get the next select box
		nextSelect = $(this).parent('div').next('div').children('select');
		
		// Check if there is not a next select box
		if (nextSelect[0] !== undefined) {
			// Get the name attribute of the next select
			nextName = nextSelect.attr('name');
			
			// Disable next until the operation is ready
			nextSelect.attr('disabled', true);
			
			// Split the form and get the first until the next select box name
			data = data.split(nextName)[0];
			
			// Check if the data dosn't ends with '&' and append it
			if (data[data.length - 1] !== '&')
				data+= '&';

			// Append the required select name for the query, if it's the last
			// query the price
			data+= 'select=' + (nextName || 'price');
			
			// Request the json response with ajax of the matching data
			$.getJSON('order/getDetail', data, function (res) {
				html = '';
				// Create an HTML <option> for each result
				$.each(res, function (index, value) {
					html += '<option>' + value[nextName] + '</option>';
				});
				// Append the HTML to the next select box
				nextSelect.html('').append(html).attr('disabled', false).trigger('change');
			});
		}
	});

}(jQuery));
