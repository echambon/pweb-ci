function sortTable(test) {
	$.ajax({
		type: 		"post",
		url: 			"/admin/logs",
		data: 	 	{order_by : test},
		success: 	function(data) {
			var content = $(data).find("#table_content").html();
			$("#table_content").empty().html(content);
		}
	});
}
