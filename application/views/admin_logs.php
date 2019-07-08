<div id="body">
	<p>
		Navigate through connection logs. There are <b><?php echo $logs_number; ?></b> logs to display.
	</p>

	<p>
		<form id="logsForm" method="post" action="/admin/logs_query">
			<table>
				<tr>
					<td>SQL query: <i>SELECT * FROM pw_logs WHERE </i></td>
					<td><input type="text" id="sql_logs_query" name="sql_logs_query" size="50"></td>
				</tr>
				<tr>
					<td>Entries to display per page:</td>
					<td>
						<select id="select_entries_display" name="select_entries_display" onchange="updateEntriesToDisplay('/admin/logs',<?php echo $current_page . ',\'' . $order_by . '\',\'' . $desc . '\''; ?>)">-->
							<option value="10">10</option>
					    <option value="50" selected="selected">50</option>
					    <option value="100">100</option>
					    <option value="9999">All</option>
						</select>
					</td>
				</tr>
			</table>
		</form>
	</p>

	<p>
		<center>
			<div id="pages_links">
				Pages: <?php echo $pages_links; ?>
			</div>
			<table id="table_content" border="1px" class="minimalistBlack">
				<thead>
					<tr>
						<th class="order" onclick="sortTable('/admin/logs','id',<?php echo $current_page . ',' . $entries_to_display; ?>)">ID</th>
						<th class="order" onclick="sortTable('/admin/logs','login_date',<?php echo $current_page . ',' . $entries_to_display; ?>)">Date</th>
						<th class="order" onclick="sortTable('/admin/logs','username',<?php echo $current_page . ',' . $entries_to_display; ?>)">Username</th>
						<th class="order" onclick="sortTable('/admin/logs','ip_address',<?php echo $current_page . ',' . $entries_to_display; ?>)">IP address</th>
						<th class="order" onclick="sortTable('/admin/logs','error',<?php echo $current_page . ',' . $entries_to_display; ?>)">Error</th>
					</tr>
				</thead>
				<tbody>
					<?php echo $table_content; ?>
				</tbody>
			</table>
		</center>
	</p>
</div>
