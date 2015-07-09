<h1>Signup</h1>
<form id="registration_form" action="core/middleware/registration.php" method="post">
	<label for="reg_username" class="col-md-12">
		<b>Username</b>
		<input class="form-control" type="text" id="reg_username" name="reg_username" placeholder="Type username" />
	</label>
	<br>
	<label for="reg_password" class="col-md-12">
		<b>Password</b>
		<input class="form-control" type="password" id="reg_password" name="reg_password" placeholder="Type password" />
	</label>
	<br>
	<label for="reg_repeate_password" class="col-md-12">
		<b>Repeate password</b>
		<input class="form-control" type="password" id="reg_repeate_password" name="reg_repeate_password" placeholder="Repeate username" />
	</label>
	<br>
	<label for="reg_email" class="col-md-12">
		<b>Email</b>
		<input class="form-control" type="email" id="reg_email" name="reg_email" placeholder="Type email" />
	</label>
	<br>
	<label for="reg_phone" class="col-md-12">
		<b>Phone</b>
		<input class="form-control" type="number" id="reg_phone" name="reg_phone" placeholder="Type phone" />
	</label>
	<br>
	<label for="reg_adress" class="col-md-12">
		<b>Street</b>
		<input class="form-control" type="text" id="reg_adress" name="reg_adress" placeholder="Type street name" />
	</label>
	<br>
	<label for="reg_zip" class="col-md-12">
		<b>ZIP-code</b>
		<input class="form-control" type="number" id="reg_zip" name="reg_zip" placeholder="Type ZIP-code" />
	</label>
	<br>
	<label for="reg_area" class="col-md-12">
		<b>Area</b>
		<input class="form-control" type="text" id="reg_area" name="reg_area" placeholder="Type area" />
	</label>
	<br>
	<button class="btn btn-primary col-md-6 col-md-offset-3" type="submit" name="reg_submit">Sign up</button>
	<div class="col-md-12">
		<a href="#" id="new_login">Back</a>
	</div>
</form>