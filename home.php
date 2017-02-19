<?php
 
 //session_start();
include('login.php');
include('dbconnect.php'); 
 // if session is not set this will redirect to login page
 if( !isset($_SESSION['login_user']) ) {
  header("Location: index.php");
  exit;
 }

 // if session is not set this will redirect to login page
   
$sql = "SELECT * FROM poll ORDER BY poll_id ";
$query = mysql_query($sql);

$row_poll = mysql_num_rows($query);


?>

<!DOCTYPE html>
<html>
<head>
<title>Welcome to Voting Web </title>
<link rel="stylesheet" href="bootstrap/css/bootstrap.css">
<!--link href="style.css" rel="stylesheet" type="text/css"-->

</head>
<body>
	<div id="main" align="center">
	<h1> Welcome to Voting Web </h1>
	<span style="color:blue"><h1><?php echo 'Hello' . ' '. $_SESSION['login_user']; ?></h1></span>

		<h1 style="background-color:rgb(202, 232, 211);
					text-align:center;
					padding:15px">Polls</h1>
	<br></br>
<div id="create">

	<a href="create_poll.php" type="create" name="create-poll" class="btn btn-primary btn-lg active" role="button"> Create New Poll</a>
	
	<a href="logout.php" type="create" name="create-poll" class="btn btn-primary btn-lg active" role="button"> Log out</a>

<br></br>
<ul class="pager" align="text-right">
  <li><a href="#">Previous</a></li>
  <li><a href="#">Next</a></li>
</ul>
<?php
		// check topic in db
		if(!$query)
			{
				echo 'The topics could not be displayed, please try again later.';
			}
        else
			{
				if(mysql_num_rows($query) == 0)
				{
                echo 'There are no topics yet.';
				}
			}
		?>	
	<div class=
	<table class="table table-bordered">
		<table width=1000 border="1" cellpadding="1" cellspacing="0" align="center" >
			<tr>
				<th style="width: 50px; background-color:#b3e6ff; padding:10px; font-size:20px;">NO</th>
				<th style="width: 50px;background-color:#99bbff; padding:10px; font-size:20px; ">Topic</th>
				<th style="width: 50px; background-color:#b3e6ff; padding:10px;font-size:20px;">Created at</th>
				<th style="width: 50px;background-color:#99bbff; padding:10px; font-size:20px;">Action</th>
			</tr>
			
	<?php
			while($row = mysql_fetch_assoc($query))
                {  
				?>
                    <tr>
					 <td class="leftpart" style="padding:10px; text-align:left;">
                       <h3 style="font-size:18px;"><?php echo $row['poll_id'];?> <h3>
                    </td>
					<td class="center" style="padding:10px; text-align:left;">
                        <h3 style="font-size:18px;"><?php echo $row['poll_topic'];?><h3>
                    </td>
                     <td class="rightpart" style="padding:10px; text-align:left;">
                        <h3 style="font-size:18px;"><?php echo date('d-m-Y', strtotime($row['created']))?></h3>
                     </td>
					<td align="center" style="padding:10px; text-align:left;">
                  	<a href="vote.php?poll_id= <?php echo $row["poll_id"];?>" class="btn btn-success btn-lg btn-block" role="button">vote </a>
                       </td>
                    </tr>
				
			<?php
				}
			?>
				</table>
				</table>
		</div>
</body>
</html>