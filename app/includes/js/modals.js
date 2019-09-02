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

	/**
	 * DASHBOARD: View Address on Map (.viewAddressOnMap)
	 */
	$('.viewAddressOnMap').click(function(event) {
		
		var mapAddress 		= $(this).data('map-address'),
			mapLat 			= $(this).data('map-lat'),
			mapLong 		= $(this).data('map-long'),
			gmapsEmbedLink 	= 'https://maps.google.com/maps?q=' + mapLat + ',' + mapLong + '&hl=es;z=20&amp;output=embed';

		$('.googleMapsContainer').html('<iframe frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="'+gmapsEmbedLink+'"></iframe>');

	});

});