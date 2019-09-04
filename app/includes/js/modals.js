$(document).ready(function() {
	'use strict';

	/**
	 * Open Modal
	 */
	$('.ismodal').on('click', function(event) {
		event.preventDefault();
		
		var modal = $(this).data('modal');

		$('.this-' + modal).fadeIn();
		$('body').addClass('modal-active');
		//console.log('This:' + modal);

	});

	$('.cover').click(function(event) {

		$('.modal').fadeOut();
		$('body').removeClass('modal-active');

	});

	$('.close').click(function(event) {

		$('.modal').fadeOut();
		$('body').removeClass('modal-active');

	});

	document.onkeydown = function(event) {
		event = event || window.event;
	    var isEscape = false;
	    if ("key" in event) {
	        isEscape = (event.key === "Escape" || event.key === "Esc");
	    } else {
	        isEscape = (event.keyCode === 27);
	    }

	    if (isEscape) {
	    	$('.modal').fadeOut();
	    	$('body').removeClass('modal-active');
	    }

	}

	

});