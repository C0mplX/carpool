<?php
require_once( '/template/header.php' );
?>
<div class="col-md-12">

	<?php
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
		   	 <div class="col-md-6">
		   	 	<a href="request.php?id=<?php echo htmlspecialchars($request['ID']); ?>"><button class="btn btn-default panel-margin">Show</button></a>
		   	 	<a href="request-accept.php?id=<?php echo htmlspecialchars($request['ID']); ?>"><button class="btn btn-primary panel-margin">Send Request</button></a>
		   	 </div>
		  	</div>
		</div>
	<?php endforeach;?>
</div>
<?php
require_once( '/template/footer.php' );
?>