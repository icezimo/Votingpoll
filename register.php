<?php

 session_start();
 if( isset($_SESSION['login_user'])!="" ){
  header("Location: home.php");
 }
 include'dbconnect.php';

 $error = false;

 if ( isset($_POST['btn-signup']) ) {

  // clean user inputs to prevent sql injections
  $name = trim($_POST['name']);
  $name = strip_tags($name);
  $name = htmlspecialchars($name);

  $pass = trim($_POST['pass']);
  $pass = strip_tags($pass);
  $pass = htmlspecialchars($pass);

  // basic name validation
  if (empty($name)) {
   $error = true;
   $nameError = "Please enter your username.";
  } else if (strlen($name) < 3) {
   $error = true;
   $nameError = "Username must have atleat 3 characters.";
  } else if (!preg_match("/^[a-zA-Z ]+$/",$name)) {
   $error = true;
   $nameError = "Username must contain alphabets and space.";
  }

    // password validation
  if (empty($pass)){
   $error = true;
   $passError = "Please enter password.";
  } else if(strlen($pass) < 6) {
   $error = true;
   $passError = "Password must have atleast 6 characters.";
  }

  // password encrypt using MD5();
  $password = hash('MD5', $pass);

  // if there's no error, continue to signup
  if( !$error ) {

   $query = "INSERT INTO user(username,password) VALUES('$name','$pass')";
   $res = mysql_query($query);

   if ($res) {
    $errTyp = "success";
    $errMSG = "Successfully registered, you may login now";
    unset($name);

    unset($pass);
   } else {
    $errTyp = "danger";
    $errMSG = "Something went wrong, try again later...";
   }

  }


 }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Welcome to Voting Web</title>
  <!--link href="style.css" rel="stylesheet" type="text/css"-->
  <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
  <!-- Custom styles for this template -->
  <link href="CSS/signin.css" rel="stylesheet">

</head>
<body>
	<h1 style="background-color:rgb(202, 232, 211);
					text-align:center;
					padding:15px"> Registeration Form <h1>
<div class="container">
        <div class="row centered-form">
        <div class="col-xs-12 col-sm-8 col-md-4 col-sm-offset-2 col-md-offset-4">
        	<div class="panel panel-default">
        		<div class="panel-heading">
			    		<h3 class="panel-title">Please sign up for Voting Website</h3>
			 			</div>
			 			<div class="panel-body">
			    		<form role="form" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete="off">
			    			<div class="row">
			    				<div class="col-md-10">
			    					<div class="form-group">
                      <div class="input-group">
                      <input type="text" name="name"id="first_name" class="form-control input-sm" placeholder="Enter Name" maxlength="50" value="<?php echo $name ?>" />
                      </div>
                      <span class="text-danger"><?php echo $nameError; ?></span>
			    					</div>

			    				</div>

			    			</div>


			    			<div class="row">
			    				<div class="col-md-10">
			    					<div class="form-group">
                      <div class="input-group">

                          <input type="password" name="pass" class="form-control input-sm" placeholder="Enter Password" maxlength="15" />
             		      </div>
                            <span class="text-danger"><?php echo $passError; ?></span>

			    					</div>
			    				</div>
			    			</div>

			    			<input type="submit" name="btn-signup" value="Register" class="btn btn-info btn-block">
							
			    		</form>
			    	</div>
					<p><span style="padding-left:10px;">
					<a href="index.php" class="btn btn-default btn active" role="button">Back to Signin</a>
					</span></p>
	    		</div>
    		</div>
    	</div>
    </div>
  </body>
  </html>
