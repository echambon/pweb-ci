<div id="body">
	<p>Edit and create pages for your website. There are <b><?php echo $pages_number; ?></b> pages for this website.</p>

	<h2 id="toggling_profile_header" class="togglingHeader toggling toggling_hidden toggling_visible">Website pages</h2>
  <div id="toggling_profile_container" class="togglingContainer">
		<p>
			TODO: form here for personalized SQL query and number of pages to display (see logs).
		</p>

		<p>
			<center>
				<div id="pages_links">
					Pages: <?php echo $pages_links; ?>
				</div>
				<table id="table_content" border="1px" class="minimalistBlack">
					<thead>
						<tr>
							<th class="order" onclick="sortTable('id',<?php echo $current_page . ',' . $entries_to_display; ?>)">ID</th>
							<th class="order" onclick="sortTable('id',<?php echo $current_page . ',' . $entries_to_display; ?>)">Order</th>
							<th class="order" onclick="sortTable('name',<?php echo $current_page . ',' . $entries_to_display; ?>)">Name</th>
							<th class="order" onclick="sortTable('url',<?php echo $current_page . ',' . $entries_to_display; ?>)">URL</th>
							<th class="order" onclick="sortTable('title',<?php echo $current_page . ',' . $entries_to_display; ?>)">Title</th>
							<th class="order" onclick="sortTable('created_on',<?php echo $current_page . ',' . $entries_to_display; ?>)">Created on</th>
							<th class="order" onclick="sortTable('created_by',<?php echo $current_page . ',' . $entries_to_display; ?>)">Created by</th>
							<th class="order" onclick="sortTable('last_modified',<?php echo $current_page . ',' . $entries_to_display; ?>)">Last modified</th>
							<th class="order" onclick="sortTable('modified_by',<?php echo $current_page . ',' . $entries_to_display; ?>)">Modified by</th>
							<th>Actions</th>
						</tr>
					</thead>
					<tbody>
						<?php echo $table_content; ?>
					</tbody>
				</table>
			</center>
		</p>
  </div>

	<h2 id="toggling_profile_header" class="togglingHeader toggling toggling_hidden">Create page</h2>
  <div id="toggling_profile_container" class="togglingContainer toggling_hidden">
    TODO: Quill editor comes here!
  </div>
</div>
