<?php
	session_start();
	include('dbconnect.php');
	
?>
 
<html>
	<head> 
	<link rel="stylesheet" href="bootstrap/css/bootstrap.css">
	</head>
<body>
<form action="vote_success.php" method="post">

<?php
	
	$sql = "SELECT * FROM poll WHERE poll_id = '".$_GET["poll_id"]."'"; 
	$query = mysql_query($sql);
	$poll = mysql_fetch_array($query);
	$p_id = $poll['poll_id']; //set to use in session
	$title = $poll['poll_topic'];
	$_SESSION['title'] = $title;
	$_SESSION['pid'] = $p_id;
	#} else {
	#	$title = 'No Poll Yet';
	#}
	$sql = "SELECT * FROM choice WHERE poll_id = '".$_GET["poll_id"]."'"; 
	$query = mysql_query($sql);
	#$rows = mysql_num_rows($query);
	#echo $rows;
	
	?>
	<h1 style="background-color:rgb(202, 232, 211);
					text-align:center;
					padding:15px"> <?php echo $poll["poll_topic"];?> <h1>
		

<?php 
	
	while ($choice = mysql_fetch_array($query))
	{
		?>	
		<br></br>
		<div class="col-md-6">
	<table class="table table-striped">
	<div class="radio" style="text-align:center; font-size:20px;">
			
		<label>
			<input type="radio" name="choice_id" value="<?php echo $choice['choice_id']; ?>" >
			<?php echo $choice['choice_name']; ?>
		</label>
	</div>
	</table>
	</div>
	<!--tr>
	<td valign="top" style="padding: 0px 10px 0px 0px;"><input type="radio" name="choice_id" value="<?php echo $choice['choice_id']; ?>" /></td>
	<td valign="top" width="100%"></td>
	</tr-->

	<?php
	}
?>
	<div class="col-sm-12 controls" style="text-align:center; font-size:20px;">
		<input type="submit" name="vote" value="vote" ><a href="vote_success.php"></a>
		
		<!--a href="vote_success.php" type="submit" name="vote" class="btn btn-info btn active" value="vote" role="button"></a>  
		</div>
		

</form>	
	
</body>
	
	