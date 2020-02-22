<?php
/*
// mysql_connect("database-host", "username", "password")
$conn = mysql_connect("localhost","root","root") 
			or die("cannot connected");

// mysql_select_db("database-name", "connection-link-identifier")
@mysql_select_db("test2",$conn);
*/


$databaseHost = 'rock31.db.7271532.82f.hostedresource.net';
$databaseName = 'rock31';
$databaseUsername = 'rock31';
$databasePassword = 'Bambucha1!';

$mysqli = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName); 
	
?>
