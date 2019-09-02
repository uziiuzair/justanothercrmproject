$(document).ready(function() {

	if (window.location.hash.substr(1)) {
		var suggestedSection = window.location.hash.substr(1);
		console.log(suggestedSection);

		$('.current').removeClass('current')
		$('.settingOption').removeClass('active');
		$('#' + suggestedSection).addClass('current');
		$('.' + suggestedSection).addClass('active');

	}


	$('.settingOption').click(function(event) {
		
		event.preventDefault();

		var theSection = $(this).data('setting'),
			currentSection = $('.current');
		
		$('.settingOption').removeClass('active');
		$(this).addClass('active');
		$(currentSection).removeClass('current')
		$(theSection).addClass('current');

	});

	
});