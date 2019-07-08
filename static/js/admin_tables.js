function sortTable(url,order_by,current_page,entries_to_display) {
	var desc = "asc";
	if($("#table_content").hasClass("desc")) {
		desc = "desc";
	}

	$.ajax({
		type: 		"post",
		url: 			url,
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

function displayPage(url,current_page,order_by,desc,entries_to_display) {
	$.ajax({
		type: 		"post",
		url: 			url,
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

function updateEntriesToDisplay(url,current_page,order_by,desc) {
	var select_list 				= document.getElementById("select_entries_display");
	var entries_to_display 	= select_list.options[select_list.selectedIndex].value;

	// reload current table page
	displayPage(url,current_page,order_by,desc,entries_to_display);
}
