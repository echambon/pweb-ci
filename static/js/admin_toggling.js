$(document).ready(function() {
	// initially hide all forms of class togglingForm
	//$(".togglingForm").hide();

	$(function() {
	  // Set effect from select menu value
	  $(".togglingHeader").on("click", function() {
	    $(this).toggleClass("toggling_visible");
			//$(this).nextAll(".togglingParagraph").first().toggle("blind");
			//$(this).nextAll(".togglingForm").first().toggle("blind");
			$(this).nextAll(".togglingContainer").first().toggle("fade");
	  });
	});
});
