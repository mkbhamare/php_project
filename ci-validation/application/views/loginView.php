<!DOCTYPE html>
<html>
<head>
	<title>Login Page</title>
</head>
<body>
	<h3>Login Here</h3>
	<hr />

	<form method="post">
		Email: <input type="text" name="txt_email">
		<br /><br />
		Password: <input type="password" name="txt_password">
		<br /><br />

		<input type="submit" name="btn_login" value="Login">
	</form>
	<b>Not Registered</b><a href="<?php echo site_url('Welcome/form') ?>">Register Here</a>
</body>
</html>