$(document).ready(function() {

	// Project List
	var options = {
		valueNames: [ 'projectName', 'projectCompany'],
		page:6,
		pagination: true
	};

	var projectsList = new List('projectsList', options);

});