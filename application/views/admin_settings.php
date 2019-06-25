<div id="body">
  <h2 id="toggling_website_header" class="togglingHeader toggling toggling_hidden">Website</h2>
  <div id="toggling_website_settings_container" class="togglingContainer toggling_hidden">
    <p>
      Basic website configuration:
    </p>
    <form id="websiteSettingsForm" method=post action="/admin/website_settings_update">
  			<table>
    			<tr>
    				<td>Title:</td>
    				<td><input type="text" id="website_title" name="website_title" size="50"></td>
            <td><i>The title appears at the top of any page and also in the navigator tab title.</i></td>
    			</tr>
    			<tr>
    				<td>Subtitle:</td>
    				<td><input type="text" id="website_subtitle" name="website_subtitle" size="50"></td>
            <td><i>It will appear under the website title on any page.</i></td>
    			</tr>
          <tr>
    				<td>Keywords:</td>
    				<td><input type="text" id="website_keywords" name="website_keywords" size="50"></td>
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
    <p>
      Connections to administration panel logs configuration:
    </p>
    <form id="logsSettingsForm" method=post action="/admin/logs_settings_update">
			<table>
  			<tr>
          <td><input type="checkbox" id="website_title" name="website_title" size="50"></td>
  				<td>Save each time a user successfully connects to the administration panel</td>
  			</tr>
  			<tr>
          <td><input type="checkbox" id="website_title" name="website_title" size="50"></td>
  				<td>Save connections attempts to the administration panel</td>
  			</tr>
		  </table>
    <input type="submit" value="Save">
		</form>
</div>
</div>
