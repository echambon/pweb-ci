$(document).ready(function() {
	$('#loginForm').on('submit', function(e) {
		e.preventDefault(); 	// avoiding normal redirect behaviour

		var $this = $(this); 	// form jQuery object

		// Retrieving variables
		var username = $('#username').val();
		var password = $('#password').val();

		// emtying message
		$("#messageContainer").html("");

		// Check if variables are not empty before sending request
		if(username === '' || password === '') {
			$("#messageContainer").html("<font color='red'>Missing username or password</font>");
		} else {
			// send HTTP request asynchronously
			$.ajax({
                url: 			$this.attr('action'), 	//
                type: 		$this.attr('method'), 	//
                data: 		$this.serialize(), 			//
                dataType: 'json', 								// JSON
                success: 	function(json) { 				//
									if(json.error === 0) { // no error
										$("#loginForm").html(""); // deactivate form
										$("#messageContainer").html("<font color='green'>" + json.message + "</font>");

										// redirecting
										window.setTimeout(function() {
											window.location.href = '/admin';
										}, 1500);
									} else {
										$("#messageContainer").html("<font color='red'>" + json.message + "</font>");
									}
                }
			});
		}
	});
});
