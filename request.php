<?php
require_once( 'template/header.php' );
$request_id = htmlspecialchars( $_GET['id'] );
$request 	= new requestController( $db, $request_id, 'get' );
$user 		 = new userController( $db, $request->get_user_id(), 'get' );
?>
<div class="col-md-12">
	<div class="page-header">
  		<h1> <?php echo $request->get_r_header(); ?> <small><?php echo $request->get_r_type();?></small></h1>
	</div>
	<div class="panel panel-default">
	  <div class="panel-body">
	  	<div class="col-md-8">
	  		<div class="row">
		  		<div class="col-md-4">
		  			<h3>From: </h3> <h4><?= $request->get_from_location();?></h4>
		  		</div>
			   	<div class="col-md-4">
				   	<h3>To: </h3> <h4><?= $request->get_to_location();?></h4>
			   	</div>
		   	</div>
		   	<div class="row">
		   		<div class="col-md-12">
		   			<p><?php echo $request->get_r_body(); ?></p>
		   		</div>
		   	</div>
	   	</div>
	   	<div class="col-md-4 text-right">
	   		<div class="col-md-12">
	   			<i>Created on: <?= $request->get_create_date(); ?></i>
	   		</div>
	   		<div class="col-md-12">
	   			<button id="send_request" class="btn btn-primary" data-rname="<?= $user->username();?>" data-toggle="modal" data-target="#myModal" data-id="<?= $request_id; ?>">Send request</button>
	   		</div>
	   	</div>
	  </div>

	</div>
</div>
<?php
require_once( 'template/footer.php' );
?>