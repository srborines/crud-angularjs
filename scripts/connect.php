<?php 
function dbConnect(){
	$mysqli = new mysqli("localhost", "root", "user", "pass");

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
