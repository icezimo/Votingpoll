<?php
	include ('dbconnect.php');
	session_start();
	
	$sql = "SELECT vote_id FROM vote WHERE poll_id ='{$_SESSION['pid']}'";
	$querytotal = mysqli_query($conn,$sql);
	$totalvote = mysqli_num_rows($querytotal);
	
?>

<html>
	<head>
	<link rel="stylesheet" href="bootstrap/css/bootstrap.css">
	</head>
<body>
	<h1 align="center" style="background-color:#fff2cc;
			width:1400px; padding:15px">Votes result of "<?php echo $_SESSION['title']?> "</h1>
	
	<?php
		// select choice to display
		$sqlc = "SELECT * FROM choice WHERE poll_id='{$_SESSION['pid']}' ORDER BY choice_id";
		$queryc = mysqli_query($conn,$sqlc);
		$choice = mysqli_num_rows($queryc);
		
		if($choice > 0){
		
			while($ch = mysqli_fetch_array($queryc)){
			
			if($totalvote >0 )
			{ 
		?>
		<div class="col-sm-12 controls" style="text-align:center; font-size:16px; margin-top:10px; margin-bottom:10px;">
		<table class="table table-condensed">
		<label class="radio">
		<tr>
		  <td style="background-color: #ffe6ff"><?php echo $ch['choice_name'];?>
		</td>
		</tr>
		<?php
			$check_right_td=0;
			$sqlp = "SELECT COUNT(vote_id) as nvote FROM vote WHERE poll_id = '{$_SESSION['pid']}' AND choice_id=".$ch['choice_id']."";
			$queryp = mysqli_query($conn,$sqlp);
			while($result = mysqli_fetch_array($queryp))
			{
			?>	
		<tr>
		<td>		
		votes :<?php echo $result['nvote']; ?>
		</td>
		</tr>
		</label>
		</table>
		</div>
		<?php	
			#$check_right_td=1;
			#break;
			}
		#if($check_right_td==0)
		#{
		?>	
			
			<?php
		#}	
			}
			}			
	?>			
	
				
				<h3 align="center" >Total Votes: <?php echo $totalvote; ?></h3>
				
		
	<?php
		}
	?>
	<br></br>
	<div class="col-md-12 controls" style="text-align:center;">
	<a href="home.php"  name="home" class="btn btn-info btn active" role="button">Home</a> 
	</div>
</body>