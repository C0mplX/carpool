<?php
require_once( '../init.php' );


class installDB {

	private $db;

	public function __construct( $database ) {

		$this->db = $database;

		//Install the tables
		$this->installUser();
		$this->installRequests();
	}

	private function installUser() {
		$table = 'USERS';

		try {
			
			$sql = "CREATE table IF NOT EXISTS $table(
				ID 			INT( 11 ) AUTO_INCREMENT PRIMARY KEY,
				username 	VARCHAR( 256 ) NOT NULL, 
				password 	VARCHAR( 256 ) NOT NULL,
				email 		VARCHAR( 256 ) NOT NULL,
				phone 		VARCHAR( 256 ) NOT NULL, 
				adress 		VARCHAR( 256 ) NOT NULL, 
				zip 		VARCHAR( 256 ) NOT NULL, 
				area 		VARCHAR( 256 ) NOT NULL,
				create_date DATETIME 	   NOT NULL,
				role 		INT ( 11 )     NOT NULL
			);";
	

		$this->db->exec( $sql );
		print('TABLE $table INSTALLED </br>');

		} catch (PDOexception $e) {
			die( $e->getMessage() );
		}

	}

	private function installRequests() {
		$table = 'REQUESTS';

		try {
			
			$sql = "CREATE table IF NOT EXISTS $table(
				ID 			INT( 11 ) AUTO_INCREMENT PRIMARY KEY, 
				user_ID		INT( 11 ) NOT NULL, 
				location 	VARCHAR ( 256 ) NOT NULL, 
				r_header 	VARCHAR( 100 ) NOT NULL, 
				r_body 		MEDIUMTEXT NOT NULL,
				r_type 		VARCHAR( 256 ) NOT NULL, 
				create_date DATETIME NOT NULL );";
		
		$this->db->exec( $sql );
		print('TABLE $table INSTALLED </br>');

		} catch (PDOexception $e) {
			die( $e->getMessage() );
		}

	}


}


if( $_POST ) {
	new installDB( $db );
}else {
	echo '<form method="post">
			<button type="submit" name="submit">Install DB</button>
	</form>';
}
?>
