<div id="body">
	<p>Log in to access administration panel</p>

	<p id="messageContainer"></p>

	<p>
		<form id="loginForm" method=post action="/admin/login">
			<table>
			<tr>
				<td>Username:</td>
				<td><input type="text" id="username" name="username"></td>
			</tr>
			<tr>
				<td>Password:</td>
				<td><input type="password" id="password" name="password"></td>
			</tr>
		</table>
		<input type="submit" value="Log in">
		</form>
	</p>
</div>
