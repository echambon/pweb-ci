$(document).ready(function() {
	$(function() {
	  // Set effect from select menu value
	  $(".togglingHeader").on("click", function() {
	    $(this).toggleClass("toggling_visible");
			$(this).nextAll(".togglingParagraph").first().toggle("blind");
	  });
	});
});
