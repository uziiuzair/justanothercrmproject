$(document).ready(function() {

	var listOption = {
		valueNames: [ 'taskSubject'],
		page:4,
		pagination: true
	};

	var tasksList = new List('clientTasks', listOption);

		

	var revByClientChart = document.getElementById("revenueByClient");
	var revenueByClient = new Chart(revByClientChart, {
		type: 'line',
		data: {
			labels: [
				"Day 1", "Day 5", "Day 10", "Day 15", "Day 20", "Day 25", "Day 30"
			],
			datasets: [
				{
					label: "Last Month",
					backgroundColor: Chart.helpers.color('#D7D7D8').alpha(0).rgbString(), // Put the '#0dc8de' here as a fill color
					borderColor: Chart.helpers.color('#D7D7D8').alpha(1).rgbString(),

					pointBackgroundColor: Chart.helpers.color('#ffffff').alpha(0).rgbString(),
					pointBorderColor: Chart.helpers.color('#ffffff').alpha(0).rgbString(),
					pointHoverBackgroundColor: Chart.helpers.color('#D7D7D8').alpha(0.1).rgbString(),
					pointHoverBorderColor: Chart.helpers.color('#D7D7D8').alpha(0.4).rgbString(),

					fill: 'start',
					data: [
						20, 10, 28, 15, 26, 14, 9
					]
				},
				{
					label: "This Month",
					backgroundColor: Chart.helpers.color('#51F5C1').alpha(0).rgbString(), // Put the '#0dc8de' here as a fill color
					borderColor: Chart.helpers.color('#51F5C1').alpha(1).rgbString(),

					pointBackgroundColor: Chart.helpers.color('#ffffff').alpha(0).rgbString(),
					pointBorderColor: Chart.helpers.color('#ffffff').alpha(0).rgbString(),
					pointHoverBackgroundColor: Chart.helpers.color('#51F5C1').alpha(0.1).rgbString(),
					pointHoverBorderColor: Chart.helpers.color('#51F5C1').alpha(0.4).rgbString(),

					fill: 'start',
					data: [
						10, 12, 16, 14, 20, 22, 11
					]
				}
			]
		},
		options: {
			title: {
				display: false,
			},
			tooltips: {
				intersect: false,
				mode: 'nearest',
				xPadding: 10,
				yPadding: 10,
				caretPadding: 10
			},
			responsive: true,
			maintainAspectRatio: false,
			hover: {
				mode: 'index'
			},
			scales: {
				xAxes: [{
					display: false,
					gridLines: false,
					scaleLabel: {
						display: true,
						labelString: 'Month'
					}
				}],
				yAxes: [{
					display: false,
					gridLines: false,
					scaleLabel: {
						display: true,
						labelString: 'Value'
					},
					ticks: {
						beginAtZero: true
					}
				}]
			},
			elements: {
				line: {
					tension: 0.19
				},
				point: {
					radius: 4,
					borderWidth: 12
				}
			}
		}
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
	$('#form-clientLogo').validate({
		// Override to submit the form via ajax
		errorPlacement: function(){
			return false;  // suppresses error message text
		},
		submitHandler: function(form) {
			
			// Form Data
			var form = document.getElementById('form-clientLogo');
			var formData = new FormData(form);

			var fileUploadRequest = new XMLHttpRequest();
			
			fileUploadRequest.addEventListener("onprogress", updateProgress);
			fileUploadRequest.addEventListener("load", transferComplete);
			fileUploadRequest.addEventListener("error", transferFailed);
			fileUploadRequest.addEventListener("abort", transferCanceled);


			fileUploadRequest.open('POST', '/upload/client/logo', true);
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




	/**
	 * form-clientUpdate
	 */
	$('#form-clientUpdate').validate({
		// Override to submit the form via ajax
		errorPlacement: function(){
            return false;  // suppresses error message text
        },
        submitHandler: function(form) {
			$.ajax({
				 type: 'post',
				 url: '/action/client/update',
				 data: $(form).serialize(),
				 dataType: 'json',
				 beforeSend: function() {
					$('.submitting > .showProgress').fadeIn();
					$('.errorContainer').html('');
				 },
				 success: function(data){
					console.log(data);

					// Show Success
					$('.errorContainer').fadeIn();
					$('.errorContainer').html(data.request.message);

					$.notify(data.request.message, { position: 'right bottom', className: 'success', style: 'crmLight' });

					if (data.success === true) {
						window.location.reload();
					}
				 },
				 error: function(XMLHttpRequest, textStatus, errorThrown){

				 	// Log Errors
				 	console.log(XMLHttpRequest);
					console.log(textStatus);
					console.log(errorThrown);

					// Seriously. Log an error in DB!

					// Show Errors
					$('.errorContainer').fadeIn();
					$('.errorContainer').html('Uh oh! Something does not seem right. Request aborted!');

					$.notify('Unexpected Error Occured.', { position: 'right bottom', className: 'error', style: 'crmLight' });
					
				 },
				 complete: function() {
				 	$('.submitting > .showProgress').fadeOut();
				 	// $('.submitting > .initial').fadeIn();
				 }
			});
			return false; // required to block normal submit since you used ajax
		}
	});
	


});
























