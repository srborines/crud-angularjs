<?php 
include_once("connect.php");
$mysqli = dbConnect();

//Get postData
$postdata = file_get_contents("php://input");
$request = json_decode($postdata);
$response = array('error' => null);

if(isset($request) && count($request) > 0){
	$id = $request->id;
	$var1 = $request->var1; 
	$var2 = $request->var2;
	$var3 = $request->var3;

	if($id == '?'){
		/* create a prepared query */
		$stmt =  $mysqli->stmt_init();
		if($stmt->prepare("INSERT INTO items (var1,var2,var3) VALUES (?,?,?)")){
			/* bind parameters for markers */
			$stmt->bind_param('sss', $var1,$var2,$var3);
			/* execute query */
		    if($stmt->execute()){
		    	$response['id'] = $mysqli->insert_id;
		    }else{
		    	print_r($stmt);
		    	$response['error'] = "Problem to insert item in database";
		    }
		}else{
			$response['error'] = "Problem with database";
		}
	}else{
		/* create a prepared query */
		$stmt =  $mysqli->stmt_init();
		if($stmt->prepare("UPDATE items SET var1=?,var2=?,var3=? WHERE id=?")){
			/* bind parameters for markers */
			$stmt->bind_param('sssd', $var1,$var2,$var3,$id);
			/* execute query */
		    if($stmt->execute()){
		    	//$response['id'] = $stmp->
		    }else{
		    	print_r($stmt);
		    	$response['error'] = "Problem to insert item in database";
		    }
		}else{
			$response['error'] = "Problem with database";
		}
	}
}else{
	$response['error'] = "No data sent";
}

print_r(json_encode($response));
?>