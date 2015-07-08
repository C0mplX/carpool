<?php
require_once( '/template/header.php' );
?>
<div class="row">
	<div class="col-md-6">
		<h2>Add a new request</h2>
		<form action="core/middleware/add_new_request.php" method="post">
			<label for="r_header" class="col-md-12">
				Request title
				<input class="form-control" type="text" name="r_header" id="r_header" placeholder="Type title" required />
			</label>
			<label for="r_body" class="col-md-12">
				Request description
				<textarea class="form-control" id="r_body" name="r_body" placeholder="Type description" rows="10" ></textarea>
			</label>
			<label for="to_location" class="col-md-12">
				Where are you going to?
				<input class="form-control " type="text" name="to_location" id="to_location" placeholder="Type location" required />
			</label>
			<label for="from_location" class="col-md-12">
				Where are you going from?
				<input class="form-control" type="text" name="from_location" id="from_location" placeholder="Type location" required />
			</label>
			<label for="r_type" class="col-md-12">
				Where are you going from?
				<select class="form-control" id="r_type" name="r_type" required>
					<option value="driver">Driver</option>
					<option value="passenger">Passenger</option>
				</select>
			</label>
			<div class="col-md-12">
				<button class="btn btn-success col-md-12" name="submit_request" id="submit_request">Submit Request</button>
			</div>
		</form>
	</div>
</div>
<?php
require_once( '/template/footer.php' );
?>