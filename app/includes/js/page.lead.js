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

	$('.whatLogo').click(function(event) {

		if ($(this).attr('value') === 'upload') {
			$('#uploadTheLogo').slideDown();
		} else {
			$('#uploadTheLogo').slideUp();
		}

	});

	/**
	 * Upload Logo
	 */
	$('#form-leadLogo').validate({
		// Override to submit the form via ajax
		errorPlacement: function(){
			return false;  // suppresses error message text
		},
		submitHandler: function(form) {
			
			// Form Data
			var form = document.getElementById('form-leadLogo');
			var formData = new FormData(form);

			var fileUploadRequest = new XMLHttpRequest();
			
			fileUploadRequest.addEventListener("onprogress", updateProgress);
			fileUploadRequest.addEventListener("load", transferComplete);
			fileUploadRequest.addEventListener("error", transferFailed);
			fileUploadRequest.addEventListener("abort", transferCanceled);


			fileUploadRequest.open('POST', '/upload/lead/logo', true);
			fileUploadRequest.send(formData);

			function updateProgress (oEvent) {
				// if (oEvent.lengthComputable) {
					console.log(oEvent.loaded);
					console.log(oEvent.total);
					var percentComplete = oEvent.loaded / oEvent.total * 100;
				
					$('.uploadStatement').fadeOut();
					$('#submitting > .showProgress').fadeOut();

					$('.uploadProgressContainer').fadeIn();
					$('#submitting > .initial').fadeIn();
					$('.errorContainer').html('');

					$('.uploadProgressContainer .progress-inner').width(percentComplete);

				// } else {
				// 	console.log('um');
				//     // Unable to compute progress information since the total size is unknown
				// }
			}

			// The Transfer is Complete!
			function transferComplete(evt) {
			
				console.log("The transfer is complete.");
				// console.log(evt);

				$('.uploadProgressContainer').fadeOut();
				$('.uploadStatement').fadeIn();

				window.location.reload();

			}

			// An error occured 
			function transferFailed(evt) {
			
				console.log("An error occurred while transferring the file.");
				// console.log(evt);
			
				$('.uploadProgressContainer').fadeOut();
				$('.errorContainer').html('An error occurred while transferring the file.');
			
			}

			// Canceled by User
			function transferCanceled(evt) {
		
				console.log("The transfer has been canceled by the user.");
				// console.log(evt);

				$('.uploadProgressContainer').fadeOut();
				$('.errorContainer').html('The transfer has been canceled by the user.');
		
			}

			return false; // required to block normal submit since you used ajax
		}
	});


});