$(document).ready(function() {

	/**
	 * Implementing the Tasks
	 */
	var tasksContainer = $('.projectTasksContainer .list');

	$('#form-newTask').submit(function(event) {
		
		event.preventDefault();

		var task = $('input[name="newTask"]').val(),
			taskPriority = $('select[name="newTaskPriority"]').val(),
			taskSubject = 'RE: None',
			taskDue = $('input[name="newTaskDeadline"]').val();


		addTask(taskSubject, task, taskPriority, taskDue);

	});


	/**
	 * Add Tasks
	 * @param {[type]} subject  [description]
	 * @param {[type]} content  [description]
	 * @param {[type]} priority [description]
	 * @param {[type]} due      [description]
	 */
	function addTask(subject, content, priority, due) {

		var theTaskHTML = '<li><div class="panel projectTask" data-task="1" data-project="1"><div class="inner"><div class="panelHeader"><h1>';
			theTaskHTML += subject;
			theTaskHTML += '</h1></div><div class="panelContent"><p>';
			theTaskHTML += content;
			theTaskHTML += '</p><form action="" data-task="1" data-project="1" id="form-tasksUpdate"><div class="row"><ul class="clearfix"><li><select name="newTaskPriority" id="">';
			theTaskHTML += '<option value="-1">Set Priority</option>';

		if (priority === 1) {
			theTaskHTML += '<option value="1" selected>Low</option>';
		} else if (priority === 2) {
			theTaskHTML += '<option value="2" selected>Medium</option>';
		} else if (priority === 3) {
			theTaskHTML += '<option value="3" selected>High</option>';
		} else if (priority === 4) {
			theTaskHTML += '<option value="4" selected>Urgent</option>';
		}
		
		theTaskHTML += '<option value="1">Low</option>';
		theTaskHTML += '<option value="2">Medium</option>';
		theTaskHTML += '<option value="3">High</option>';
		theTaskHTML += '<option value="4">Urgent</option>';
		theTaskHTML += '</select></li><li>';
		theTaskHTML += '<input class="datepicker" name="newTaskDeadline" placeholder="Set Deadline" value="';
		theTaskHTML += due;
		theTaskHTML += '"></li></ul></div></form></div></div></div></li>';
			
		$(tasksContainer).prepend(theTaskHTML);

		$.notify('New Task Added!', { position: 'right bottom', className: 'success', style: 'crmLight' });

	}



});