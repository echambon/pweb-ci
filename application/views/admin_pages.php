<div id="body">
	<p>Edit and create pages for your website. There are <b><?php echo $pages_number; ?></b> pages for this website.</p>

	<h2 id="toggling_profile_header" class="togglingHeader toggling toggling_hidden toggling_visible">Website pages</h2>
  <div id="toggling_profile_container" class="togglingContainer">
		<p>
			<form id="pagesForm" method="post" action="/admin/pages_query">
				<table>
					<tr>
						<td>SQL query: <i>SELECT * FROM pw_pages WHERE </i></td>
						<td><input type="text" id="sql_pages_query" name="sql_pages_query" size="50"></td>
					</tr>
					<tr>
						<td>Entries to display per page:</td>
						<td>
							<select id="select_entries_display" name="select_entries_display" onchange="updateEntriesToDisplay('/admin/pages',<?php echo $current_page . ',\'' . $order_by . '\',\'' . $desc . '\''; ?>)">-->
								<option value="10" selected="selected">10</option>
						    <option value="50">50</option>
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
							<th class="order" onclick="sortTable('/admin/pages','id',<?php echo $current_page . ',' . $entries_to_display; ?>)">ID</th>
							<th class="order" onclick="sortTable('/admin/pages','id',<?php echo $current_page . ',' . $entries_to_display; ?>)">Order</th>
							<th class="order" onclick="sortTable('/admin/pages','name',<?php echo $current_page . ',' . $entries_to_display; ?>)">Name</th>
							<th class="order" onclick="sortTable('/admin/pages','url',<?php echo $current_page . ',' . $entries_to_display; ?>)">URL</th>
							<th class="order" onclick="sortTable('/admin/pages','title',<?php echo $current_page . ',' . $entries_to_display; ?>)">Title</th>
							<th class="order" onclick="sortTable('/admin/pages','created_on',<?php echo $current_page . ',' . $entries_to_display; ?>)">Created on</th>
							<th class="order" onclick="sortTable('/admin/pages','created_by',<?php echo $current_page . ',' . $entries_to_display; ?>)">Created by</th>
							<th class="order" onclick="sortTable('/admin/pages','last_modified',<?php echo $current_page . ',' . $entries_to_display; ?>)">Last modified</th>
							<th class="order" onclick="sortTable('/admin/pages','modified_by',<?php echo $current_page . ',' . $entries_to_display; ?>)">Modified by</th>
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
  				<td><input type="text" id="page_name" name="page_name" size="50" value="<?php echo $form_name; ?>"><font color="red" size="5"><b>*</b></font></td>
          <td><i>Page name will appear in the menu, choose a short name.</i></td>
  			</tr>
  			<tr>
  				<td>URL:</td>
  				<td><input type="text" id="page_url" name="page_url" size="50" value="<?php echo $form_url; ?>" disabled><font color="red" size="5"><b>*</b></font></td>
          <td><i>This is the URL under which page will be accessible. Automatically built from name.</i></td>
  			</tr>
        <tr>
  				<td>Title:</td>
  				<td><input type="text" id="page_title" name="page_title" size="50" value="<?php echo $form_title; ?>"><font color="red" size="5"><b>*</b></font></td>
          <td><i>Page title will appear emphasized at the top of the page.</i></td>
  			</tr>
        <tr>
  				<td>Order:</td>
  				<td>
            <select id="page_order" name="page_order">
              <?php echo $form_order; ?>
            </select>
          </td>
          <td><i>The order in which pages appear in the menu. By default, added as last page.</i></td>
  			</tr>
		  </table>
			<p><div id="quillEditor"><?php echo $form_content; ?></div></p>
      <input type="submit" value="Save">	Cancel (TODO jQuery)
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
