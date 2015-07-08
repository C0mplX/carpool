<?php
/**
*
*Class for controlling input to the request table
*
*/

class requestController {

	private $db;
	private $userID;
	private $type;
	private $scope;

	public function __construct( $database, $userID, $type ) {

		$this->db 		= $database;
		$this->type 	= $type;
		$this->userID 	= $userID;

		switch ( $this->type ) {
			case 'get':
				$this->scope = $this->get_data_request();
				break;
			default:
				# code...
				break;
		}
		
	}

	/**
	*
	* GET data
	*/
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
		$query = $this->db->prepare( "SELECT * FROM requests WHERE user_ID = ? OR ID = ?" );
		$query->bindValue( 1, $this->clean_data( $this->userID ) );
		$query->bindValue( 2, $this->clean_data( $this->userID ) );

		try {
			
			$query->execute();
			$result = $query->fetch();

			return $result;

		} catch (PDOexception $e) {
			die( $e->getMessage() );
		}
	}

	public function get_to_location() {
		$location = $this->clean_data( $this->scope['to_location'] );
		return $location;
	}

	public function get_from_location() {
		$location = $this->clean_data( $this->scope['from_location'] );
		return $location;
	}


	public function get_r_header() {
		$heading = $this->clean_data( $this->scope['r_header'] );
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

	public function get_user_id() {
		$id = $this->clean_data( $this->scope['user_ID'] );
		return $id;
	}

 
	
	/**
	*
	* Input data
	*/

	public function insert_new_request( $user_ID, $to_location, $from_location, $r_header,
										$r_body, $r_type, $create_date ) {

		$query = $this->db->prepare( "INSERT INTO 
			requests ( user_ID, to_location, from_location, r_header, r_body, r_type, create_date ) 
			VALUES ( ?,?,?,?,?,?,? )" );

		$query->bindValue(1, $user_ID );
		$query->bindValue(2, $to_location );
		$query->bindValue(3, $from_location );
		$query->bindValue(4, $r_header );
		$query->bindValue(5, $r_body );
		$query->bindValue(6, $r_type );
		$query->bindValue(7, $create_date );
		

		try {
			
			$query->execute();

		} catch (PDOexception $e) {
			die( $e->getMessage() );
		}
	}  



	/**
	*
	* escape data
	*/
	private function clean_data( $input ) {
		return $input = htmlspecialchars( $input );
	}
 

}
?>