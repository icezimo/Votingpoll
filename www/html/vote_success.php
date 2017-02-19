<?php
	include('dbconnect.php');
	session_start();
	
	$ch_id = $_POST['choice_id'];
	echo $_SESSION['pid'];
		if (isset($_POST['vote']))  
		{
			if(!empty($ch_id)){
		
				$sqlv= "INSERT INTO vote(poll_id,choice_id) VALUES('{$_SESSION['pid']}','$ch_id')";
				$query = mysqli_query($conn,$sqlv);
			} 
		else{
			echo "error";
			}
		}
   
	?>
	
<!DOCTYPE html>
<html>
<head>

<link rel="stylesheet" href="bootstrap/css/bootstrap.css">
</head>
<body align = "center" style="margin-top:100px;">
<div id="main">
<h1>Your vote have submitted !! </h1>
<h1> Thankyou </h1>

<br></br>
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