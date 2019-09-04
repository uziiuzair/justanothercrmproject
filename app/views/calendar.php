<?php 
/**
 * Calendar Page (calendar.php)
 *
 * @package 	Just Another CRM Project
 * @author 		uziiuzair [https://www.uziiuzair.com/]
 * @since 		v1.0
 */

use uziiuzair\crm;

?>
<!-- Bleh -->
<link rel="stylesheet" href="/app/includes/js/fullcalendar/core/main.min.css">
<link rel="stylesheet" href="/app/includes/js/fullcalendar/daygrid/main.min.css">
<script src="/app/includes/js/fullcalendar/core/main.min.js"></script>
<script src="/app/includes/js/fullcalendar/daygrid/main.min.js"></script>

<script>
	document.addEventListener('DOMContentLoaded', function() {
		var calendarEl = document.getElementById('calendar');

		var calendar = new FullCalendar.Calendar(calendarEl, {
			plugins: [ 'dayGrid' ],
			events: '/action/meetings/all'
		});

		calendar.render();
	});
</script>

<div class="container calendarPage">

	<div class="wrapper">

		<div class="row clearfix">
			
			<div class="span12 column">
				
				<div class="panel">
					<div class="inner">
						<div class="panelHeader">
							<h1>Calendar</h1>
						</div>
						<div class="panelContent">
							<div id='calendar'></div>
						</div>
					</div>
				</div>

			</div>

		</div>
		
	</div>

</div>