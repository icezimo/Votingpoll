<?php
 
include ('dbconnect.php');
 
 $poll_name = trim($_POST["poll_name"]);
 $options  = $_POST["options"];

 // insert new topic in db
	$sql = "INSERT INTO poll(poll_topic) VALUES('$poll_name')";
	$query= mysqli_query($conn,$sql); 
  
  $sqlpoll = "SELECT poll_id FROM poll WHERE poll_topic = '$poll_name'";
 
  // Perform Query
	$querypoll = mysqli_query($conn,$sqlpoll);
	

// Check result
// This shows the actual query sent to MySQL, and the error. Useful for debugging.
/*if (!$result) {
    $message  = 'Invalid query: ' . mysql_error() . "\n";
    $message .= 'Whole query: ' . $query;
    die($message);
}*/

// Use result

	$row = mysqli_fetch_array($querypoll,MYSQLI_ASSOC); 
   
	$pollid =$row['poll_id'];
	
	for($i= 0; $i < count($options); $i++){

	//insert new choice 
	
		$sqlop = "INSERT INTO choice(poll_id,choice_name) VALUES('$pollid','$options[$i]')"; 
		$second= mysqli_query($conn,$sqlop);
	 }	  

 if ($query and $second) {
    $errTyp = "success";
    $errMSG = "Successfully submit";
	echo "<script type='text/javascript'>document.location = \"create_success.php\";</script>";
    
    
       } else {
    $errTyp = "danger";
    $errMSG = "Something went wrong, try again later..."; 
   } 
 
 

  
?>

