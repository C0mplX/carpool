<h2>Login</h2>
<form id="login_form" action="core/middleware/login.php" method="post">
	<label for="username" class="col-md-12">
		<b>Username</b>
		<input class="form-control" type="text" id="username" name="username" placeholder="Type username" />
	</label>
	<br>
	<label for="password" class="col-md-12">
		<b>Password</b>
		<input class="form-control" type="password" id="password" name="password" placeholder="Type password" />
	</label>
	<button class="btn btn-primary col-md-6 col-md-offset-3"type="submit" name="submit_login">Login</button>
	<div class="col-md-12">
		<a href="#" id="new_account">Need account?</a>
	</div>
</form>