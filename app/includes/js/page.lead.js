$(document).ready(function() {
	'use strict';

	/**
	 * Delete Lead
	 */
	$('a[data-ajax=deleteLead]').on('click', function(e){
		e.preventDefault();

		var deleteActive = $(this).attr('data-delete-active');
		
		if (deleteActive == 0) {

			$(this).css({ color: 'rgb(247, 67, 67)' }).html('Are you sure?').attr('data-delete-active', '1');

		} else if (deleteActive == 1) {

			$(this).html('<i class="fas fa-spinner fa-spin"></i> Deleting...');

		}
		
	});

	/**
	 * Mark Lead As Lost
	 */
	$('a[data-ajax=markLeadAsLost]').on('click', function(e){
		e.preventDefault();

		$.ajax({
			url: '/action/lead/lost',
			type: 'get',
			success: function(data, status) {
				console.log(data.request.message);
			},
			error: function(xhr, desc, err) {
				console.log(err);
			}
		}); 
	});

	/**
	 * Delete Lead
	 */
	$('a[data-ajax=markLeadAsJunk]').on('click', function(e){
		e.preventDefault();

		$.ajax({
			url: '/action/lead/junk',
			type: 'get',
			success: function(data, status) {
				console.log(data.request.message);
			},
			error: function(xhr, desc, err) {
				console.log(err);
			}
		}); 
	});


});