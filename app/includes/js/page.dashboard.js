$(document).ready(function() {

	// Chart Data
	var ChartOptions = {
		title: { display: false },
		legend: { display: false },
		tooltips: { enabled: false },
		responsive: true,
		maintainAspectRatio: false,
		hover: { mode: 'index' },
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
				tension: 0.3
			},
			point: {
				radius: 0,
				borderWidth: 12
			}
		}
	}

	// Total Invoices
	var projectsDue = $('#projectsDue');
	var projectsDueChart = new Chart(projectsDue, {
		type: 'line',
		data: {
			labels: ['Day 1', 'Day 2', 'Day 3', 'Day 4', 'Day 5', 'Day 6', 'Day 7'],
			datasets: [{
				data: [1, 10, 3, 5, 2, 4, 7],
				backgroundColor: [ 'rgba(0, 175, 178, 0)' ],
				borderColor: [ 'rgba(0, 175, 178, 1)' ],
				pointBackgroundColor: [ 'rgba(0, 175, 178, 0)' ],
				pointBorderColor: [ 'rgba(0, 175, 178, 0)' ],
				pointHoverBackgroundColor: [ 'rgba(0, 175, 178, 0)' ],
				borderWidth: 1
			}]
		},
		options: ChartOptions
	});

	// Unpaid Invoices
	var tasksDue = $('#tasksDue');
	var tasksDueChart = new Chart(tasksDue, {
		type: 'line',
		data: {
			labels: ['Day 1', 'Day 2', 'Day 3', 'Day 4', 'Day 5', 'Day 6', 'Day 7'],
			datasets: [{
				data: [1, 3, 7, 6, 3, 2, 1],
				backgroundColor: [ 'rgba(0, 175, 178, 0)' ],
				borderColor: [ 'rgba(0, 175, 178, 1)' ],
				pointBackgroundColor: [ 'rgba(0, 175, 178, 0)' ],
				pointBorderColor: [ 'rgba(0, 175, 178, 0)' ],
				pointHoverBackgroundColor: [ 'rgba(0, 175, 178, 0)' ],
				borderWidth: 1
			}]
		},
		options: ChartOptions
	});

	// Paid Invoices
	var openTasks = $('#openTasks');
	var openTasksChart = new Chart(openTasks, {
		type: 'line',
		data: {
			labels: ['Day 1', 'Day 2', 'Day 3', 'Day 4', 'Day 5', 'Day 6', 'Day 7'],
			datasets: [{
				data: [1, 8, 2, 5, 1, 2, 8],
				backgroundColor: [ 'rgba(0, 175, 178, 0)' ],
				borderColor: [ 'rgba(0, 175, 178, 1)' ],
				pointBackgroundColor: [ 'rgba(0, 175, 178, 0)' ],
				pointBorderColor: [ 'rgba(0, 175, 178, 0)' ],
				pointHoverBackgroundColor: [ 'rgba(0, 175, 178, 0)' ],
				borderWidth: 1
			}]
		},
		options: ChartOptions
	});

	// Overdue Invoices
	var activeClient = $('#activeClient');
	var activeClientChart = new Chart(activeClient, {
		type: 'line',
		data: {
			labels: ['Day 1', 'Day 2', 'Day 3', 'Day 4', 'Day 5', 'Day 6', 'Day 7'],
			datasets: [{
				data: [1, 2, 4, 5, 8, 1, 7],
				backgroundColor: [ 'rgba(0, 175, 178, 0)' ],
				borderColor: [ 'rgba(0, 175, 178, 1)' ],
				pointBackgroundColor: [ 'rgba(0, 175, 178, 0)' ],
				pointBorderColor: [ 'rgba(0, 175, 178, 0)' ],
				pointHoverBackgroundColor: [ 'rgba(0, 175, 178, 0)' ],
				borderWidth: 1
			}]
		},
		options: ChartOptions
	});

	// Overdue Invoices
	var unpaidInvoices = $('#unpaidInvoices');
	var unpaidInvoicesChart = new Chart(unpaidInvoices, {
		type: 'line',
		data: {
			labels: ['Day 1', 'Day 2', 'Day 3', 'Day 4', 'Day 5', 'Day 6', 'Day 7'],
			datasets: [{
				data: [1, 2, 4, 5, 8, 1, 7],
				backgroundColor: [ 'rgba(0, 175, 178, 0)' ],
				borderColor: [ 'rgba(0, 175, 178, 1)' ],
				pointBackgroundColor: [ 'rgba(0, 175, 178, 0)' ],
				pointBorderColor: [ 'rgba(0, 175, 178, 0)' ],
				pointHoverBackgroundColor: [ 'rgba(0, 175, 178, 0)' ],
				borderWidth: 1
			}]
		},
		options: ChartOptions
	});

	
		
});