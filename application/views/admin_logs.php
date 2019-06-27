<div id="body">
	<p>
		Navigate through connection logs:
	</p>

	<p>
		<form id="logsForm" method=post action="/admin/logs_query">
			<table>
				<tr>
					<td>SQL query: <i>SELECT * FROM pw_logs WHERE </i></td>
					<td><input type="text" id="sql_logs_query" name="sql_logs_query" size="50"></td>
				</tr>
				<tr>
					<td>Logs to display per page:</td>
					<td>
						<select id="select_logs_display" name="select_logs_display">
							<option value="10">10</option>
					    <option value="50" selected="selected">50</option>
					    <option value="100">100</option>
					    <option value="all">All</option>
						</select>
					</td>
				</tr>
			</table>
		</form>
	</p>

	<p>
		<center><table border="1px">
			<tr>
				<th id="log_id" 				name="log_id">ID</th>
				<th id="log_date" 			name="log_date">Date</th>
				<th id="log_username" 	name="log_username">Username</th>
				<th id="log_ip" 				name="log_ip">IP</th>
				<th id="log_error" 			name="log_error">Error</th>
			</tr>
			<tr>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
			</tr>
		</table></center>
	</p>
</div>
