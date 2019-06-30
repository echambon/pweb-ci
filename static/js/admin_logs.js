// todo : retransmit current_page in POST
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

// todo: retransmit order_by and desc in POST
function displayPage(current_page) {
	$.ajax({
		type: 		"post",
		url: 			"/admin/logs",
		data: 	 	{current_page : current_page},
		success: 	function(data) {
			var content 	= $(data).find("#table_content");
			var pages_id 	= $(data).find("#pages_links");
			$("#table_content").empty().html(content.html());
			//$("#table_content").toggleClass("desc");
			$("#pages_links").empty().html(pages_id.html());
		}
	});
}
