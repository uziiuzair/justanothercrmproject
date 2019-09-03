$(document).ready(function() {

	// Project List
	var options = {
		valueNames: [ 'projectName', 'projectCompany'],
		page:6,
		pagination: true
	};

	var projectsList = new List('projectsList', options);


	$('#form-newTask').validate({
		// Override to submit the form via ajax
		errorPlacement: function(){
			return false;  // suppresses error message text
		},
		submitHandler: function(form) {

			var task = $('input[name="newTask"]').val(),
				taskPriority = $('select[name="newTaskPriority"]').val(),
				taskSubject = 'RE: None',
				taskDue = $('input[name="newTaskDeadline"]').val();

			$.ajax({
				type: 'post',
				url: '/action/task/create',
				data: $(form).serialize(),
				dataType: 'json',
				 beforeSend: function() {
					
				 },
				 success: function(data){
					console.log(data);

					// Show Success
					addTask(taskSubject, task, taskPriority, taskDue);
					$.notify(data.request.message, { position: 'right bottom', className: 'success', style: 'crmLight' });
					
				 },
				 error: function(XMLHttpRequest, textStatus, errorThrown){

					// Log Errors
					console.log(XMLHttpRequest);
					console.log(textStatus);
					console.log(errorThrown);

					// Seriously. Log an error in DB!


					// Show Errors
					$.notify('Unexpected Error Occured.', { position: 'right bottom', className: 'error', style: 'crmLight' });
					
					
				 },
				 complete: function() {

				 	$('input[name="newTask"]').val('');
					$('input[name="newTaskDeadline"]').val('');

				 }
			});

			return false; // required to block normal submit since you used ajax
		}
	});

});