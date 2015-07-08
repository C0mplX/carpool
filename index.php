<?php
require_once( 'core/init.php' );
$general->logged_in_protect();
?>
<!doctype html>
<html lang="en">
<head>
  	<meta charset="utf-8">

  	<title>The HTML5 Herald</title>
  	<meta name="description" content="The HTML5 Herald">
  	<meta name="author" content="SitePoint">

  	<link rel="stylesheet" href="css/styles.css">

	<!--[if lt IE 9]>
	<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
</head>

<body>
	<h1>Login</h1>
	<form id="login_form" action="core/middleware/login.php" method="post">
		<label for="username">
			<b>Username</b>
			<input type="text" id="username" name="username" placeholder="Type username" />
		</label>
		<br>
		<label for="password">
			<b>Password</b>
			<input type="password" id="password" name="password" placeholder="Type password" />
		</label>
		<br>
		<button type="submit" name="submit_login">Login</button>
	</form>
	<h1>Registration</h1>
	<form id="registration_form" action="core/middleware/registration.php" method="post">
		<label for="reg_username">
			<b>Username</b>
			<input type="text" id="reg_username" name="reg_username" placeholder="Type username" />
		</label>
		<br>
		<label for="reg_password">
			<b>Password</b>
			<input type="password" id="reg_password" name="reg_password" placeholder="Type password" />
		</label>
		<br>
		<label for="reg_repeate_password">
			<b>Repeate password</b>
			<input type="password" id="reg_repeate_password" name="reg_repeate_password" placeholder="Repeate username" />
		</label>
		<br>
		<label for="reg_email">
			<b>Email</b>
			<input type="email" id="reg_email" name="reg_email" placeholder="Type email" />
		</label>
		<br>
		<label for="reg_phone">
			<b>Phone</b>
			<input type="number" id="reg_phone" name="reg_phone" placeholder="Type phone" />
		</label>
		<br>
		<label for="reg_adress">
			<b>Street</b>
			<input type="text" id="reg_adress" name="reg_adress" placeholder="Type street name" />
		</label>
		<br>
		<label for="reg_zip">
			<b>ZIP-code</b>
			<input type="number" id="reg_zip" name="reg_zip" placeholder="Type ZIP-code" />
		</label>
		<br>
		<label for="reg_area">
			<b>Area</b>
			<input type="text" id="reg_area" name="reg_area" placeholder="Type area" />
		</label>
		<br>
		<button type="submit" name="reg_submit">Sign up</button>
	</form>

</body>
</html>