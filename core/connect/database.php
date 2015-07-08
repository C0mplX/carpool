<?php
$config = array(
		'host'     => 'localhost',
		'username' => 'root',
		'password' => '',
		'dbname'   => 'carpool',
		'charset'  => 'UTF8'
);

$db = new PDO('mysql:host=' . $config['host'] . ';dbname=' . $config['dbname'] . ';charset='. $config['charset'], $config['username'], $config['password'], array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));

$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>