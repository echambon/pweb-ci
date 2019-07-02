function sortTable(order_by,current_page,entries_to_display) {
	var desc = "asc";
	if($("#table_content").hasClass("desc")) {
		desc = "desc";
	}

	$.ajax({
		type: 		"post",
		url: 			"/admin/logs",
		data: 	 	{
								order_by 						: order_by,
								desc 								: desc,
								current_page 				: current_page,
								entries_to_display 	: entries_to_display
							},
		success: 	function(data) {
			var content = $(data).find("#table_content");
			var pages_id 	= $(data).find("#pages_links");
			$("#table_content").empty().html(content.html());
			$("#table_content").toggleClass("desc");
			$("#pages_links").empty().html(pages_id.html());
		}
	});
}

function displayPage(current_page,order_by,desc,entries_to_display) {
	$.ajax({
		type: 		"post",
		url: 			"/admin/logs",
		data: 	 	{
								current_page 				: current_page,
								order_by 						: order_by,
								desc 								: desc,
								entries_to_display 	: entries_to_display
							},
		success: 	function(data) {
			var content 	= $(data).find("#table_content");
			var pages_id 	= $(data).find("#pages_links");
			$("#table_content").empty().html(content.html());
			$("#pages_links").empty().html(pages_id.html());
		}
	});
}
