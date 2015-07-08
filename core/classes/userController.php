<?php
require_once( 'PassHass.php' );
/**
*
* Class for handling user table
*
*/

class userController {

	private $db;
	private $id;
	private $scope;

	public function __construct( $database, $userID, $type ) {

		$this->db  		= $database;
		$this->id 		= $userID;
		$this->type 	= $type;

		switch ( $this->type ) {
			case 'get':
				$this->scope = $this->get_user_data();
				break;
			default:
				# code...
				break;
		}
	}

	/**
	*
	* Getting data from the user table
	*
	*/

	private function get_user_data() {
		$query = $this->db->prepare( "SELECT * FROM users WHERE ID = ?" );
		$query->bindValue( 1, $this->id );

		try {

			$query->execute();
			$row = $query->fetch();

			return $row;
			
		} catch (PDOexception $e) {
			die( $e->getMessage() );
		}
	}

	public function get_all() {
		$query = $this->db->prepare( "SELECT * FROM users ORDER BY create_date DESC" );
		
		try {
			
			$query->execute();
			$result = $query->fetchAll();

			return $result;

		} catch (PDOexception $e) {
			die( $e->getMessage() );
		}
	}

	public function username() {
		$username = $this->clean_data( $this->scope['username'] );
		return $username;
	}

	public function email() {
		$email = $this->clean_data( $this->scope['email'] );
		return $email;
	}

	public function phone() {
		$phone = $this->clean_data( $this->scope['phone'] );
		return $phone;
	}

	public function adress() {
		$adress = $this->clean_data( $this->scope['adress'] );
		$zip 	= $this->clean_data( $this->scope['phone'] );
		$area 	= $this->clean_data( $this->scope['area'] );

		return $adress .', ' . $zip .' ' . strtoupper($area);
	}

	public function create_date() {
		$date = $this->clean_data( $this->scope['create_date'] );
		return $date;
	}

	public function role() {
		$role = $this->clean_data( $this->scope['role'] );
		return $role;
	}


	/**
	*
	* Inserting data into the user table
	*
	*/

	#
	# Method for registration the user
	#
	public function registration( $username, $password, $email, $phone, $street, $zip, $area ) {

		$create_date = date( "Y-m-d g:i:s" );
		$role = 0;
		$newpassword = PassHash::hash($password);

		$query = $this->db->prepare( "INSERT INTO users ( username, password, email, phone, 
										adress, zip, area, create_date, role ) VALUES 
										( ?,?,?,?,?,?,?,?,? )");
		$query->bindValue( 1, $username  );
		$query->bindValue( 2, $newpassword );
		$query->bindValue( 3, $email );
		$query->bindValue( 4, $phone );
		$query->bindValue( 5, $street );
		$query->bindValue( 6, $zip );
		$query->bindValue( 7, $area );
		$query->bindValue( 8, $create_date );
		$query->bindValue( 9, $role );

		try {
			
			$query->execute();

			return true;

		} catch (PDOexception $e) {
			die( $e->getMessage() );
		}

	}

	public function email_exists( $email ) {
		$query = $this->db->prepare("SELECT count(email) FROM users WHERE email= ?");
			$query->bindValue(1,  $email );
			
			try{
					$query->execute();
					$rows = $query->fetchColumn();
					
					if($rows == 1){
						//User exissts / reject new signup
						return true;
						
					}else{
						//Allow signup. 
						return false;
					}
					
			}catch(PDOException $e){
				die($e->getMessage());
			}
	}

	#
	# Method for Login the user
	#
	public function login( $username, $password ) {
		$query = $this->db->prepare( "SELECT password, id, role FROM users WHERE username = ?" );
		$query->bindValue( 1, $username );

		try {
			
			$query->execute();
			$data 				= $query->fetch();
			$stored_password 	= $data['password'];
			$id 				= $data['id'];
			$role 				= $data['role'];

			if( PassHash::check_password( $stored_password, $password ) ) {

				$dataArray = array( 'id' => $id, 'role' => $role );

				return $dataArray;

			}else {
				return false;
			}

		} catch (PDOexception $e) {
			die( $e->getMessage() );
		}

	}

	private function clean_data( $input ) {
		return $input = htmlspecialchars( $input );
	}
}
?>