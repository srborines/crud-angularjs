<?php 
function dbConnect(){
	$mysqli = new mysqli("localhost", "root", "pass", "database_name");

	/* check connection */
	if (mysqli_connect_errno()) {
	    printf("Connect failed: %s\n", mysqli_connect_error());
	    die("error mysql");
	}
	return $mysqli;
}
function dbClose(){
	return $mysqli->close();
}
 ?>
