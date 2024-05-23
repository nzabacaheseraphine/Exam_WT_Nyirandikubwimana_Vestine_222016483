<?php
$servername="localhost";
$username="vestine222016483";
$password="222016483";
$databasename="virtual_estate_planning_workshop_platform";
$connection=new mysqli($servername,$username,$password,$databasename);
if ($connection->connect_error) {
	die("connection failed.".$connection->connect_error);
}

?>