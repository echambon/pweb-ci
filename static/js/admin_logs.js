function sortTable(order_by) {
	var desc = "asc";
	if($("#table_content").hasClass("desc")) {
		desc = "desc";
	}

	$.ajax({
		type: 		"post",
		url: 			"/admin/logs",
		data: 	 	{order_by : order_by, desc: desc},
		success: 	function(data) {
			var content = $(data).find("#table_content");
			$("#table_content").empty().html(content.html());
			$("#table_content").toggleClass("desc");
		}
	});
}

function displayPage(test) {
	$("#messageContainer").html(test);
}
