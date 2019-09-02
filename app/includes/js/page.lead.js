$(document).ready(function() {

	// /**
	//  * Implementing the Tasks
	//  */
	// var tasksContainer = $('.clientTasksContainer .list');

	// $('#form-newTask').validate({
	// 	// Override to submit the form via ajax
	// 	errorPlacement: function(){
	// 		return false;  // suppresses error message text
	// 	},
	// 	submitHandler: function(form) {

	// 		var task = $('input[name="newTask"]').val(),
	// 			taskPriority = $('select[name="newTaskPriority"]').val(),
	// 			taskSubject = 'RE: None',
	// 			taskDue = $('input[name="newTaskDeadline"]').val();

	// 		$.ajax({
	// 			type: 'post',
	// 			url: '/action/task/create',
	// 			data: $(form).serialize(),
	// 			dataType: 'json',
	// 			 beforeSend: function() {
					
	// 			 },
	// 			 success: function(data){
	// 				console.log(data);

	// 				// Show Success
	// 				addTask(taskSubject, task, taskPriority, taskDue);
	// 				$.notify(data.request.message, { position: 'right bottom', className: 'success', style: 'crmLight' });
					
	// 			 },
	// 			 error: function(XMLHttpRequest, textStatus, errorThrown){

	// 				// Log Errors
	// 				console.log(XMLHttpRequest);
	// 				console.log(textStatus);
	// 				console.log(errorThrown);

	// 				// Seriously. Log an error in DB!


	// 				// Show Errors
	// 				$.notify('Unexpected Error Occured.', { position: 'right bottom', className: 'error', style: 'crmLight' });
					
					
	// 			 },
	// 			 complete: function() {

	// 			 	$('input[name="newTask"]').val('');
	// 				$('input[name="newTaskDeadline"]').val('');

	// 			 }
	// 		});

	// 		return false; // required to block normal submit since you used ajax
	// 	}
	// });

	// function addTask(subject, content, priority, due) {

	// 	var theTaskHTML = '<li><div class="panel clientTask" data-task="1" data-project="1"><div class="inner"><div class="panelHeader"><h1>';
	// 	theTaskHTML += subject;
	// 	theTaskHTML += '</h1></div><div class="panelContent"><p>';
	// 	theTaskHTML += content;
	// 	theTaskHTML += '</p><form action="" data-task="1" data-project="1" id="form-tasksUpdate"><div class="row"><ul class="clearfix"><li><select name="newTaskPriority" id="">';
	// 	theTaskHTML += '<option value="-1">Set Priority</option>';

	// 	if (priority === 1) {
	// 		theTaskHTML += '<option value="1" selected>Low</option>';
	// 	} else if (priority === 2) {
	// 		theTaskHTML += '<option value="2" selected>Medium</option>';
	// 	} else if (priority === 3) {
	// 		theTaskHTML += '<option value="3" selected>High</option>';
	// 	} else if (priority === 4) {
	// 		theTaskHTML += '<option value="4" selected>Urgent</option>';
	// 	}
		
	// 	theTaskHTML += '<option value="1">Low</option>';
	// 	theTaskHTML += '<option value="2">Medium</option>';
	// 	theTaskHTML += '<option value="3">High</option>';
	// 	theTaskHTML += '<option value="4">Urgent</option>';
	// 	theTaskHTML += '</select></li><li>';
	// 	theTaskHTML += '<input class="datepicker" name="newTaskDeadline" placeholder="Set Deadline" value="';
	// 	theTaskHTML += due;
	// 	theTaskHTML += '"></li></ul></div></form></div></div></div></li>';
			
	// 	$(tasksContainer).prepend(theTaskHTML);

	// }



});