<?php
require_once( '../../core/init.php' );
$data = new requestController( $db, '', '' );
$requests = $data->get_data();
?>
<?php foreach ( $requests as $request ): ?>
	<?php
	$the_request = new requestController( $db, htmlspecialchars($request['ID']), 'get' );
	$user 		 = new userController( $db, $the_request->get_user_id(), 'get' );
	?>
	<div class="panel panel-default">
		<div class="panel-body">
			<div class="col-md-3">
				<h2><?php echo $user->username(); ?></h2>
				<h4><?php echo $the_request->get_r_header();?></h4>
			</div>
			<div class="col-md-3 panel-margin">
				<h4><b>To: </b> <?php echo $the_request->get_to_location(); ?> </h4>
				<h4><b>From: </b> <?php echo $the_request->get_from_location(); ?></h4>
			</div>
			<div class="col-md-3 panel-margin">
				<h4>
					<b>Request type: </b> <?php echo $the_request->get_r_type(); ?>
				</h4>
			</div>
			<div class="col-md-3">
				<a href="request.php?id=<?php echo htmlspecialchars($request['ID']); ?>"><button class="btn btn-default panel-margin">Show</button></a>
				<button id="send_request" class="btn btn-primary panel-margin" data-toggle="modal" data-target="#myModal" data-rname="<?= $user->username();?>"data-id="<?= htmlspecialchars($request['ID']); ?>">
					Send Request
				</button>
			</div>
		</div>
	</div>
<?php endforeach;?>