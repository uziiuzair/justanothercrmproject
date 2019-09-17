document.addEventListener('DOMContentLoaded', function() {
	var calendarEl = document.getElementById('calendar');

	var calendar = new FullCalendar.Calendar(calendarEl, {
		plugins: [ 'dayGrid', 'interaction' ],
		events: '/action/meetings/all',
		editable: true,
		eventStartEditable: true,			// Allow events’ start times to be editable through dragging.
		eventResizableFromStart: true,		// Whether the user can resize an event from its starting edge.
		eventDurationEditable: true, 		// Allow events’ durations to be editable through resizing.

	});

	calendar.render();
});