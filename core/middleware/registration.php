<?php
require_once( '../init.php' );
/**
*
* Class for signup new user
*
*/

class signup extends userController {

	private $db;
	private $username;
	private $password;
	private $rep_password;
	private $email;
	private $phone;
	private $adress;
	private $zip;
	private $area;
	private $error;

	public function __construct( $database, $username, $password, $rep_password, $email, $phone,
								 $adress, $zip, $area ) {

		$this->db 			= $database;
		$this->username 	= $username;
		$this->password 	= $password;
		$this->rep_password = $rep_password;
		$this->email 		= $email;
		$this->phone 		= $phone;
		$this->adress 		= $adress;
		$this->zip 			= $zip;
		$this->area 		= $area;
		$this->error 		= true;

		parent::__construct( $this->db, '', 'insert' );

		$this->init();
	}

	private function init() {

		$this->check_field( $this->username );
		$this->check_field( $this->password );
		$this->check_field( $this->email);
		$this->check_field( $this->phone );
		$this->check_field( $this->adress );
		$this->check_field( $this->zip );
		$this->check_field( $this->area );

		$this->check_password( $this->password, $this->rep_password );

		if( !$this->error ) {
			echo 'Fill in all the fields';
			die();
		}else {
			$insert = $this->registration( $this->username, $this->password, $this->email,
								 $this->phone, $this->adress, $this->zip, $this->area );

			if( $insert ) {
				echo 'You are now signed up';
			}else {
				echo 'somthing went wrong, please try again';
				die();
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

	/**
	* check if the password matches the repate password
	*/
	private function check_password( $password, $rep_password ) {
		if( $password != $rep_password )
			$this->error = false;
	}


}
if( $_POST ) {
	new signup( $db, @$_POST['reg_username'], @$_POST['reg_password'], @$_POST['reg_repeate_password'], @$_POST['reg_email'], @$_POST['reg_phone'],
				@$_POST['reg_adress'], @$_POST['reg_zip'], @$_POST['reg_area'] );
}else {
	die();
}
?>