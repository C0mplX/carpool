<?php
require_once( '../init.php' );
/*
*
* Class for login the user
*
*/
class login extends userController {

	private $db;
	private $username;
	private $password;
	private $error;

	public function __construct( $database, $username, $password ) {

		$this->db 		= $database;
		$this->username = $username;
		$this->password = $password;
		$this->error 	= true;

		parent::__construct( $this->db, '', 'insert' );	

		$this->init();
	}

	private function init() {

		//Check input and see if there are empty
		$this->check_field( $this->username );
		$this->check_field( $this->password );

		if( !$this->error ) {
			echo 'Fill in all the fields';
			die();
		}else {
			$login_user = $this->login( $this->username, $this->password );

			if( !$login_user ) {
				echo 'Username or password is wrong';
			}else {

				$id 	= $_SESSION['id'] = $login_user['id'];
				$role	= $login_user['role'];

				if( $role == 0 ) {
					//Normal login
					header( "Location: /carpool/main.php" );
				}
				else if( $role == 1 ) {
					//admin login
				}
			}
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
	
	new login( $db, $_POST['username'], $_POST['password'] );

}else {
	header( "Location: ../../index.php" );
}
?>