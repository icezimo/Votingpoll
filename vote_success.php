<?php
	include('dbconnect.php');
	session_start();
	
	$ch_id = $_POST['choice_id'];

		if (isset($_POST['vote']))  
		{
			if(!empty($ch_id)){
		
	   $sqlv= ("INSERT INTO vote(poll_id,choice_id) VALUES('{$_SESSION['pid']}','$ch_id')" );
	  $query = mysql_query($sqlv);
 } 
	else{
		echo "error";
		}
		}
   
	?>
	
<!DOCTYPE html>
<html>
<head>

<link href="style.css" rel="stylesheet" type="text/css">
</head>
<body>
<div id="main">
<h1>Your vote have submitted !! </h1>
<h1> Thankyou </h1>

<div class="form-group">
<button name = home><a href="home.php"> Back to Home </a></button>
<br>
</br>
<button name = result><a href="vote_result.php"> View vote result </a></button>

</div>
</form>
</div>
</div>
</body>
</html>