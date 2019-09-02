/**
 * CRM.JS
 *
 * The CRM.JS file contains all the working JS snippets to run the CRM.
 * It serves the same purpose as the APP.JS file, however they differ as 
 * the APP.JS file contains all the Ajax calls while this file contains 
 * all system functionality.
 *
 * @package 	Just Another CRM Project
 * @author 		uziiuzair (https://www.uziiuzair.com/)
 * @since 		v1.0
 */


/**
 * MomentJS
 * @type {[type]}
 */
var datime = null, thetime = null;
var updateTime = function () {
    thetime = moment(new Date())
    datime.html(thetime.format('hh:mm:ss [<span>]A[</span>] [-] [<span class=date>]DD MMMM, YYYY[</span>]'));
};

$(document).ready(function(){
    datime = $('.header .time p');
    updateTime();
    setInterval(updateTime, 1000);
});


/**
 * Select2
 * c/o https://github.com/select2/select2/blob/master/LICENSE.md
 */
$(document).ready(function() {
	$('.selectbox').select2({
		width: '100%',
		// minimumResultsForSearch: -1
	});

	$('.selectbox').on('select2:open', function(ev) {
	    // Hide search box from sighted users
	    $('.select2-search--dropdown').css({
	        'position': 'absolute',
	        'left': '-10000px',
	        'top': 'auto',
	        'height': '1px',
	        'width': '1px',
	        'overflow': 'hidden'
	    });
	});

});


/**
 * Date Picker
 * c/o http://amsul.github.io/pickadate.js/
 *
 * The Date Picker uses the following snippet as an all-in-one solution for picking dates.
 * Instead of creating new instances, we're using a single snipper to call when the class ".datepicker"
 * is added to an input field.
 */
$('.datepicker').pickadate({
	today: 'Today',
	min: -15,
	clear: '',
	close: ''
});



/**
 * Notify JS
 *
 * c/o https://notifyjs.jpillora.com/
 */

$.notify.addStyle('crmLight', {
	html: 
		"<div>"+
			"<div class='crmNotificationsWrapper'>"+
				"<hr>" +
				"<div class='crmNotificationsInner'>"+
					"<span data-notify-text/>" +
				"</div>"+
			"</div>"+
		"</div>",
	classes: {
		base: {
			width: '250px',
			background: '#fff',
			color: '#8a8fa2',
			padding: '15px',
			'box-shadow': '0px 0px 8px rgba(138, 143, 162, 0.15)',
			'font-size': '14px'
		},
		success: {
			color: '#00afb2'
		},
		error: {
			color: '#f58989'
		}
	}
});




/**
 * Dark Mode
 */
$(document).ready(function($) {
	
	$("#doDarkMode").click(function(event) {

		event.preventDefault();

		var colordata = $('.changeStyle').attr('data-color');

		if ('light' === colordata) {
			$("#doDarkMode").html('Enable Light Side');
			$('.changeStyle').attr('href', '/app/includes/css/dark.css');
			$('.changeStyle').attr('data-color', 'dark');
		} else {
			$("#doDarkMode").html('Enable Dark Side');
			$('.changeStyle').attr('href', '/app/includes/css/light.css');
			$('.changeStyle').attr('data-color', 'light');
		}

	});

});


