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

	<h2 id="toggling_profile_header" class="togglingHeader toggling toggling_hidden toggling_visible">Create/edit page</h2>
  <div id="toggling_profile_container" class="togglingContainer">
		<form id="pagesCreationEditionForm" method=post action="/admin/page_creation_edition">
      <p>
        Basic website configuration:
      </p>
			<table>
  			<tr>
  				<td>Name:</td>
  				<td><input type="text" id="page_name" name="page_name" size="50" value=""><font color="red" size="5"><b>*</b></font></td>
          <td><i>Page name will appear in the menu, choose a short name.</i></td>
  			</tr>
  			<tr>
  				<td>URL:</td>
  				<td><input type="text" id="page_url" name="page_url" size="50" value="" disabled><font color="red" size="5"><b>*</b></font></td>
          <td><i>This is the URL under which page will be accessible. Automatically built from name.</i></td>
  			</tr>
        <tr>
  				<td>Title:</td>
  				<td><input type="text" id="page_title" name="page_title" size="50" value=""><font color="red" size="5"><b>*</b></font></td>
          <td><i>Page title will appear emphasized at the top of the page.</i></td>
  			</tr>
        <tr>
  				<td>Order:</td>
  				<td>
            <select id="page_order" name="page_order">
              <option value="1">1</option>
            </select>
          </td>
          <td><i>The order in which pages appear in the menu.</i></td>
  			</tr>
		  </table>
			<p><div id="quillEditor"></div></p>
      <input type="submit" value="Save">
		</form>
  </div>
</div>

<!-- Quill integration -->
<script>
var toolbarOptions = [
	[{'header': [2,3,false	]}],
	['bold', 'italic', 'underline'],
	[{ 'list': 'bullet' }],
	[{ 'color': [] }, { 'background': [] }],
	[{ 'align': [] }],
	['code-block'],
	['link', 'image']
];
var quill = new Quill('#quillEditor', {
	theme: 'snow',
	modules: {
		toolbar: toolbarOptions
	}
});
</script>
