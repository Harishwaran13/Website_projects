<?php

$host = 'localhost';
$user = 'root';
$pass = '';
$dab_name = 'assets';   //Database Name

$conn = new MySQLi($host,$user,$pass,$dab_name);

if($conn->connect_error){

	die('database connection error:' .$conn->connect_error);
}

?>