<?php
require_once( '../init.php' );
/**
*
* Class for creating a new carpool request 
*
*/

class new_request extends requestController {

	private $db;
	private $r_header;
	private $r_body;
	private $to_location;
	private $from_location;
	private $r_type;
	private $create_date;
	private $error;

	public function __construct( $database, $r_header, $r_body, $to_location, $from_location,
								 $r_type ) {

		$this->db 				= $database;
		$this->r_header 		= $r_header;
		$this->r_body 			= $r_body;
		$this->to_location 		= $to_location;
		$this->from_location 	= $from_location;
		$this->r_type 			= $r_type;
		$this->create_date 		= date( 'Y-m-d H:i:s' );
		$this->error 			= true;

		parent::__construct( $this->db, '', '' );

		$this->init();
	}

	private function init() {

		$this->check_field( $this->r_header );
		$this->check_field( $this->r_body );
		$this->check_field( $this->to_location );
		$this->check_field( $this->from_location );
		$this->check_field( $this->r_type );


		if( !$this->error ) {
			echo 'Fill in all the fields';
		}else {

			$this->insert_new_request( $_SESSION['id'], $this->to_location, $this->from_location, 
										$this->r_header, $this->r_body, $this->r_type, 
										$this->create_date );

			echo 'Your Request: '. $this->r_header . ' is submited';
			echo '<a href="../../main.php">Go back</a>';
		}
		

	}

	/**
	* Check if fields is filled
	*/
	private function check_field( $input ) {
		if( $input == "" )
			$this->error = false;
	}

}
if( $_POST ) {

	new new_request( $db, $_POST['r_header'], $_POST['r_body'], $_POST['to_location'], 
					 $_POST['from_location'], $_POST['r_type'] );

}else {

	header( "Location: /index.php" );

}
?>