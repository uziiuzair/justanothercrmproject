$(document).ready(function() {

	var Font = Quill.import('formats/font');
	Font.whitelist = ['Roboto', 'Sofia'];
	Quill.register(Font, true);


	// var toolbarOptions = [
	//   	['bold', 'italic', 'underline', 'strike'],        // toggled buttons
	//   	['blockquote', 'code-block'],

	//   	[{ 'header': 1 }, { 'header': 2 }],               // custom button values
	//   	[{ 'list': 'ordered'}, { 'list': 'bullet' }],
	//   	[{ 'script': 'sub'}, { 'script': 'super' }],      // superscript/subscript
	//   	[{ 'indent': '-1'}, { 'indent': '+1' }],          // outdent/indent
	//   	[{ 'direction': 'rtl' }],                         // text direction

	//   	[{ 'size': ['small', false, 'large', 'huge'] }],  // custom dropdown
	//   	[{ 'header': [1, 2, 3, 4, 5, 6, false] }],

	//   	[{ 'color': [] }, { 'background': [] }],          // dropdown with defaults from theme
	//   	[{ 'font': ['Roboto', 'Sofia'] }],
	//   	[{ 'align': [] }],

	//   	['clean']                                         // remove formatting button
	// ];

	// Add fonts to whitelist
	var Font = Quill.import('formats/font');
	
	// We do not add Aref Ruqaa since it is the default
	Font.whitelist = ['mirza', 'roboto'];
	Quill.register(Font, true);

	var quill = new Quill('.theProposalEditor', {
		modules: {
			toolbar: '.theProposalToolbar'
		},
		placeholder: 'Compose an epic...',
	  theme: 'snow'
	});

	
	// Store accumulated changes
	var change = new Delta();
	quill.on('text-change', function(delta) {
	  change = change.compose(delta);
	});

	// Save periodically
	setInterval(function() {
	  if (change.length() > 0) {
	    console.log('Saving changes', change);
	    /* 
	    Send partial changes
	    $.post('/your-endpoint', { 
	      partial: JSON.stringify(change) 
	    });
	    
	    Send entire document
	    $.post('/your-endpoint', { 
	      doc: JSON.stringify(quill.getContents())
	    });
	    */
	    change = new Delta();
	  }
	}, 5*1000);

	// Check for unsaved data
	window.onbeforeunload = function() {
	  if (change.length() > 0) {
	    return 'There are unsaved changes. Are you sure you want to leave?';
	  }
	}
	
});