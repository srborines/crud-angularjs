<?php 
include_once("connect.php");
$mysqli = dbConnect();

$query = "SELECT * FROM items";

$result = $mysqli->query($query);

$data = array();

while($row = $result->fetch_assoc()){
	array_push($data, $row);
}

echo json_encode($data);

 ?>