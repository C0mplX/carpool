<?php
session_start();
/**
*
* Handles all the classes and includes everything
*
*/

//Get the db connector
require_once( 'connect/database.php' );
require_once( 'classes/general.php' );
require_once( 'classes/userController.php' );
require_once( 'classes/requestController.php' );

//Init the classes if nessesery
$general = new General();

?>