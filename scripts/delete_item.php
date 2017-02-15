<?php 
include_once("connect.php");
$mysqli = dbConnect();

//Get postData
$postdata = file_get_contents("php://input");
$request = json_decode($postdata);
$response = array('error' => null);

if(isset($request) && count($request) > 0){
	$id = $request->id;

	/* create a prepared query */
	$stmt =  $mysqli->stmt_init();
	if($stmt->prepare("DELETE FROM items WHERE id=?")){
		/* bind parameters for markers */
		$stmt->bind_param('d', $id);
		/* execute query */
	    if(!$stmt->execute()){
	    	$response['error'] = "Problem to insert item in database";
	    }
	}else{
		$response['error'] = "Problem with database";
	}
}else{
	$response['error'] = "No data sent";
}

print_r(json_encode($response));
?>