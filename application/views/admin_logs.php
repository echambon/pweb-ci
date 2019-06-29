<div id="body">
	<p>
		Navigate through connection logs. There are <b><?php echo $logs_number; ?></b> logs to display.
	</p>

	<p id="messageContainer"></p>

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
							<option value="10" selected="selected">10</option>
					    <option value="50">50</option>
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
			Page: <?php echo $pages_links; ?>
			<table id="table_content" border="1px">
				<tr>
					<th class="order" onclick="sortTable('id')">ID</th>
					<th class="order" onclick="sortTable('login_date')">Date</th>
					<th class="order" onclick="sortTable('username')">Username</th>
					<th class="order" onclick="sortTable('ip_address')">IP address</th>
					<th class="order" onclick="sortTable('error')">error</th>
				</tr>
				<?php echo $table_content; ?>
			</table>
		</center>
	</p>
</div>
