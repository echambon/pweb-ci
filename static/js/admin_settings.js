$(document).ready(function() {
	$('#adminProfileForm').on('submit', function(e) {
		e.preventDefault(); 	// avoiding normal redirect behaviour

		var $this = $(this); 	// form jQuery object

		// Retrieving variables
		var username 						= $('#admin_username').val();
		var password 						= $('#admin_current_password').val();
		var new_password 				= $('#admin_new_password').val();
		var new_password_repeat = $('#admin_new_password_repeat').val();
		var email 							= $('#admin_email').val();

		// emtying message
		$("#messageContainer").html("");

		// Check if variables are not empty before sending request
		// allow new_password, new_password_repeat and email to be empty
		if(username === '' || password === '') {
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
										$("#adminProfileForm").html(""); // deactivate form
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
		// Allow subtitle and keywords to be empty
		if(title === '') {
			$("#messageContainer").html("<font color='red'>Empty required fields detected</font>");
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
