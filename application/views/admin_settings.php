<div id="body">

  <p id="messageContainer"></p>

  <h2 id="toggling_profile_header" class="togglingHeader toggling toggling_hidden toggling_visible">Administrator profile</h2>
  <div id="toggling_profile_container" class="togglingContainer">
    <form id="adminProfileForm" method=post action="/admin/admin_profile_update">
      <p>
        Update the administrator user profile:
      </p>
			<table>
  			<tr>
  				<td>Username:</td>
  				<td><input type="text" id="admin_username" name="admin_username" size="50" value="<?php echo $username; ?>"><font color="red" size="5"><b>*</b></font></td>
          <td><i>This is the administrator login username.</i></td>
  			</tr>
  			<tr>
  				<td>Current password:</td>
  				<td><input type="password" id="admin_current_password" name="admin_current_password" size="50" value=""><font color="red" size="5"><b>*</b></font></td>
          <td><i>Current administrator password. Required for all administrator profile modifications.</i></td>
  			</tr>
        <tr>
  				<td>New password:</td>
  				<td><input type="password" id="admin_new_password" name="admin_new_password" size="50" value=""></td>
          <td><i>Change password here, leave empty if password should not be changed.</i></td>
  			</tr>
        <tr>
  				<td>Repeat new password:</td>
  				<td><input type="password" id="admin_new_password_repeat" name="admin_new_password_repeat" size="50" value=""></td>
          <td><i>Check that the new passwords match.</i></td>
  			</tr>
        <tr>
  				<td>e-mail:</td>
  				<td><input type="text" id="admin_email" name="admin_email" size="50" value="<?php echo $email; ?>"></td>
          <td><i>The title appears at the top of any page and also in the navigator tab title.</i></td>
  			</tr>
		  </table>
      <input type="submit" value="Save">
		</form>
  </div>

  <h2 id="toggling_website_settings_header" class="togglingHeader toggling toggling_hidden">Website</h2>
  <div id="toggling_website_settings_container" class="togglingContainer toggling_hidden">
    <form id="websiteSettingsForm" method=post action="/admin/website_settings_update">
      <p>
        Basic website configuration:
      </p>
			<table>
  			<tr>
  				<td>Title:</td>
  				<td><input type="text" id="website_title" name="website_title" size="50" value="<?php echo $website_title; ?>"><font color="red" size="5"><b>*</b></font></td>
          <td><i>The title appears at the top of any page and also in the navigator tab title.</i></td>
  			</tr>
  			<tr>
  				<td>Subtitle:</td>
  				<td><input type="text" id="website_subtitle" name="website_subtitle" size="50" value="<?php echo $website_subtitle; ?>"></td>
          <td><i>It will appear under the website title on any page.</i></td>
  			</tr>
        <tr>
  				<td>Keywords:</td>
  				<td><input type="text" id="website_keywords" name="website_keywords" size="50" value="<?php echo $website_keywords; ?>"></td>
          <td><i>Keywords are visible by search engines robots.</i></td>
  			</tr>
        <tr>
  				<td>Homepage:</td>
  				<td>
            <select id="website_homepage" name="website_homepage">
              <option value="-1">default</option>
            </select>
          </td>
          <td><i>Choose the page you wish to use as your home page. "Default" option displays <b>pweb</b> default unpersonalized home page.</i></td>
  			</tr>
		  </table>
      <input type="submit" value="Save">
		</form>
  </div>

  <h2 id="toggling_logs_header" class="togglingHeader toggling toggling_hidden">Logs</h2>
  <div id="toggling_other_container" class="togglingContainer toggling_hidden">
    <form id="logsSettingsForm" method=post action="/admin/logs_settings_update">
      <p>
        Configure logs when attempting connection to administration panel:
      </p>
			<table>
  			<tr>
          <td><input type="checkbox" id="log_success" name="log_success" <?php echo $log_success; ?>>
  				<label for="log_success">Save each time a user successfully connects</label></td>
  			</tr>
  			<tr>
          <td><input type="checkbox" id="log_failed" name="log_failed" <?php echo $log_failed; ?>>
            <label for="log_failed">Save failed connection attempts</td>
  			</tr>
		  </table>
    <input type="submit" value="Save">
		</form>
  </div>
</div>
