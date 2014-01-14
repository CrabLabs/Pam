(function ($) {
	'use strict';

	var data,
		html,
		$self,
		nextName,
		nextSelect,
		budgetables;

	/**
	 * EVENT: Trigger when document is ready.
	 *
	 * @return void
	 */
	$(document).on('ready', function () {
		budgetables = $('input[name=budgetables').val().split(',');
		$('.orders_step_2, .orders_step_3').hide();
		$('.orders_step_1').show();
	});

	/**
	 * EVENT: Trigger when clicks on .product_photo link.
	 *
	 * @return void
	 */
	$('.product_photo').on('click', function (event) {
		event.preventDefault();

		$('.orders_step_1').hide();
		$('.orders_step_2').show();
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
		var selection = ($.inArray($('select[name=product_id]').val(), budgetables) > -1) ? 'budgetable' : 'no-budgetable';

		$('.orders_step_2').hide();
		$('.orders_step_3').show();
		$('nav.steps .active').removeClass('active').next('li').addClass('active');

		$('.details_list dl').html('<dt>Producto:</dt><dd>' + $('select[name=product_id] :selected').text() + '</dd>');
		$('.details .' + selection).each(function () {
			var html = '<dt>' + $(this).children('label').text() + '</dt>';
			html += '<dd>' + $(this).children('select, input, textarea').val() + '</dd>';
			$('.details_list dl').append(html);
		});
		
		// Check if the selection is budgetable
		if (selection === 'budgetable') {
			// Serialize the form data
			data = $('form select').serialize() + '&select=price';
			console.log(data);
			// Request the price with AJAX
			$.getJSON('budget/getDetail', data, function (res) {
				$('#cost').text('$' + res['price']);
			});
		} else {
			console.log('No budgetable');
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
			// Show the text of the next_step button as non-budgetable
			$('.next_step').text('Siguiente');
			// Show the non-budgetable form
			$('.budgetable').hide();
			$('.no-budgetable').show();
			// Stop propagation
			return false;
		} else {
			// Show the text of the next_step button as budgetable
			$('.next_step').text('Presupuestar');
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
			$.getJSON('budget/getDetail', data, function (res) {
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
