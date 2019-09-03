var options = {
	valueNames: [ 'name', 'department', 'email', 'phone', 'member' ],
	page:6,
	pagination: true
};

var staffList = new List('staffList', options);


$(document).ready(function() {
	'use strict';

	/**
	 * Create new Staff
	 */
	$('#form-addStaff').validate({
		// Override to submit the form via ajax
		errorPlacement: function(){
            return false;  // suppresses error message text
        },
        submitHandler: function(form) {
			$.ajax({
				 type: 'post',
				 url: '/action/staff/create',
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
					
				 },
				 complete: function() {
				 	$('.submitting > .showProgress').fadeOut();
				 	location.reload();
				 	// $('.submitting > .initial').fadeIn();
				 }
			});
			return false; // required to block normal submit since you used ajax
		}
	});



	/**
	 * Create new Staff Department
	 */
	$('#form-staffDepartment').validate({
		// Override to submit the form via ajax
		errorPlacement: function(){
            return false;  // suppresses error message text
        },
        submitHandler: function(form) {
			$.ajax({
				 type: 'post',
				 url: '/action/department/create',
				 data: $(form).serialize(),
				 dataType: 'json',
				 beforeSend: function() {
				 	$('.errorContainer').fadeIn();
					$('.errorContainer').html('Working...');
				 },
				 success: function(data){
					console.log(data);

					// Show Success
					$('.errorContainer').fadeIn();
					$('.errorContainer').html(data.request.message);

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
					
				 },
				 complete: function() {
				 	$('.errorContainer').fadeOut();
				 	location.reload();
				 }
			});
			return false; // required to block normal submit since you used ajax
		}
	});


});