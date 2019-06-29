<div id="body">
	<p>
		Navigate through connection logs:
	</p>

	<p>
		<form id="logsForm" method="post" action="/admin/logs_query">
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
		<center>
			Page: 1 2 3 4 5
			<table id="table_content" border="1px">
				<tr>
					<th class="order" onClick="sortTable('id')">ID</th>
					<th class="order" onClick="sortTable('login_date')">Date</th>
					<th class="order" onClick="sortTable('username')">Username</th>
					<th class="order" onClick="sortTable('ip_address')">Username</th>
					<th class="order" onClick="sortTable('error')">error</th>
				</tr>
				<?php echo $table_content; ?>
			</table>
		</center>
	</p>
</div>
