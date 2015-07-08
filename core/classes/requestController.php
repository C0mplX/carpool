<?php
/**
*
*Class for controlling input to the request table
*
*/

class requestController {

	private $db;
	private $userID;
	private $scope;

	public function __construct( $datebase, $userID ) {

		$this->db = $datebase;
		$this->userID = $userID;
		$this->scope = $this->get_data_request();
	}

	public function get_data() {

		$query = $this->db->prepare( "SELECT * FROM requests ORDER BY create_date DESC" );

		try {
			
			$query->execute();
			$result = $query->fetchAll();

			return $result;

		} catch (PDOexception $e) {
			die( $e->getMessage() );
		}
	}

	private function get_data_request() {
		$query = $this->db->prepare( "SELECT * FROM requests WHERE user_ID = ?" );
		$query->bindValue( 1, $this->clean_data( $this->userID ) );

		try {
			
			$query->execute();
			$result = $query->fetch();

			return $result;

		} catch (PDOexception $e) {
			die( $e->getMessage() );
		}
	}

	public function get_location() {
		$location = $this->clean_data( $this->scope['location'] );
		return $location;
	}

	public function get_r_header() {
		$heading = $this->clean_data( $this->scope['r_heading'] );
		return $heading;
	}	

	public function get_r_body() {
		$body = $this->clean_data( $this->scope['r_body'] );
		return $body;
	}

	public function get_create_date() {
		$date = $this->clean_data( $this->scope['create_date'] );
		return $date;
	}

 
	private function clean_data( $input ) {
		return $input = htmlspecialchars( $input );
	}

}
?>