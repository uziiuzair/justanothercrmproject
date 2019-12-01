$(document).ready(function() {

	if (window.location.hash.substr(1)) {
		var suggestedSection = window.location.hash.substr(1);
		console.log(suggestedSection);

		$('.current').removeClass('current')
		$('.settingOption').removeClass('active');
		$('#' + suggestedSection).addClass('current');
		$('.' + suggestedSection).addClass('active');

	}


	$('.settingOption').click(function(event) {
		
		event.preventDefault();

		var theSection = $(this).data('setting'),
			currentSection = $('.current');
		
		$('.settingOption').removeClass('active');
		$(this).addClass('active');
		$(currentSection).removeClass('current')
		$(theSection).addClass('current');

	});



	$('#editSystemLogo').click(function(event) {
		
		event.preventDefault();

		$('.companyLogoEdit').slideToggle('fast');

	});


	/**
	 * Upload Logo
	 */
	$('#form-companyLogo').validate({
		// Override to submit the form via ajax
		errorPlacement: function(){
			return false;  // suppresses error message text
		},
		submitHandler: function(form) {
			
			// Form Data
			var form = document.getElementById('form-companyLogo');
			var formData = new FormData(form);

			var fileUploadRequest = new XMLHttpRequest();
			
			fileUploadRequest.addEventListener("onprogress", updateProgress);
			fileUploadRequest.addEventListener("load", transferComplete);
			fileUploadRequest.addEventListener("error", transferFailed);
			fileUploadRequest.addEventListener("abort", transferCanceled);


			fileUploadRequest.open('POST', '/upload/system/logo', true);
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