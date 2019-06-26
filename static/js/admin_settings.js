$(document).ready(function() {
	$('#websiteSettingsForm').on('submit', function(e) {
		e.preventDefault(); 	// avoiding normal redirect behaviour

		var $this = $(this); 	// form jQuery object

		// Retrieving variables
		var title = $('#website_title').val();
		var subtitle = $('#website_subtitle').val();
		var keywords = $('#website_keywords').val();
		// var homepage_id = $('#website_homepage').val();

		// emtying message
		$("#messageContainer").html("");

		// Check if variables are not empty before sending request
		if(title === '' || subtitle === '' || keywords === '') {
			$("#messageContainer").html("<font color='red'>Empty fields detected</font>");
		} else {
			// send HTTP request asynchronously
			$.ajax({
								url: 			$this.attr('action'), 	//
								type: 		$this.attr('method'), 	//
								data: 		$this.serialize(), 			//
								dataType: 'json', 								// JSON
								success: 	function(json) { 				//
									if(json.error === 0) { // no error
										$("#websiteSettingsForm").html(""); // deactivate form
										$("#messageContainer").html("<font color='green'>" + json.message + "</font>");

										// redirecting
										window.setTimeout(function() {
											window.location.href = '/admin/settings';
										}, 2000);
									} else {
										$("#messageContainer").html("<font color='red'>" + json.message + "</font>");
									}
								}
			});
		}
	});

	$('#logsSettingsForm').on('submit', function(e) {
		e.preventDefault(); 	// avoiding normal redirect behaviour

		var $this = $(this); 	// form jQuery object

		// Retrieving variables
		var log_success = $('#log_success').is(":checked");
		var log_failed 	= $('#log_failed').is(":checked");

		// emtying message
		$("#messageContainer").html("");

		// Check if variables are not empty before sending request
		if(log_success === '' || log_failed === '') {
			$("#messageContainer").html("<font color='red'>Empty post variables</font>");
		} else {
			// send HTTP request asynchronously
			$.ajax({
								url: 			$this.attr('action'), 	//
								type: 		$this.attr('method'), 	//
								data: 		$this.serialize(), 			//
								dataType: 'json', 								// JSON
								success: 	function(json) { 				//
									if(json.error === 0) { // no error
										$("#logsSettingsForm").html(""); // deactivate form
										$("#messageContainer").html("<font color='green'>" + json.message + "</font>");

										// redirecting
										window.setTimeout(function() {
											window.location.href = '/admin/settings';
										}, 2000);
									} else {
										$("#messageContainer").html("<font color='red'>" + json.message + "</font>");
									}
								}
			});
		}
	});
});
