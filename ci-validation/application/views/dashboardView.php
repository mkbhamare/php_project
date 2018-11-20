<!DOCTYPE html>
<html>
<head>
	<title>Dashboard Page</title>
</head>
<body>
	<h3>Welcome To Dashboard</h3>
	<hr />
	<b>Welcome</b> <?=$_SESSION['user_name']?>
	&nbsp &nbsp &nbsp
	<a href="<?php echo site_url('Welcome/update') ?>">Update Profile</a>
	<a href="<?php echo site_url('Welcome/logout') ?>">Logout</a>
</body>
</html>