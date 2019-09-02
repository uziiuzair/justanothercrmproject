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






	/**
	 * Dropzone for Logo Upload
	 */
	$("#form-clientLogo").dropzone({ 
		url: "/" 
	});




	

	


});
























