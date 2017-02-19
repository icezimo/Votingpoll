<html>
	<head>
		<link rel="stylesheet" href="bootstrap/css/bootstrap.css">
		<!--form name="pollform" method = "post" action = "create_success.php"-->
	</head>

		<h1 align="center" style="background-color:#fff2cc;
			width:1400px; padding:10px"> Create Your Poll </h1>

			<form class="form-horizontal" name="pollform" method = "post" action = "poll.php">
			
<div class="form-group" style="margin-top: 50px">
   <label for="inputTopic" class="col-sm-2 control-label">Topic:</label>
			<div class="col-sm-4">
	  		<input type="text" name="poll_name" class="form-control" placeholder="Text input" size="30" id="poll_name" />
				</div>
					</div>
	
	<div class="form-group">
		<label for="inputChoice" class="col-sm-2 control-label">Options:</label>
			<div class="col-sm-4">
	
		<label class="col-sm-2 control-label">1 </label>
		<input type="text" name="options[]" class="form-control" placeholder="Text input" size="30" id="options" />
	
	
		<label class="col-sm-2 control-label">2</label>
		<input type="text" name="options[]" class="form-control" placeholder="Text input" size="30" id="options" />
			
		 
		<label class="col-sm-2 control-label">3</label>
		<input type="text" name="options[]" class="form-control" placeholder="Text input" size="30" id="options" />
		
	
		
		<label class="col-sm-2 control-label">4</label>
		<input type="text" name="options[]" class="form-control" placeholder="Text input" size="30" id="options" />
	
		</div>
		</div>
		
		<br></br>
		<div class="col-sm-4" style= "margin-left:300px" >
	<input type="submit"name="Submit" value="Add Poll" class="btn btn-info btn-block">
	
	</form>
	<br></br>
	<input type="reset" name="Submit2" value="Reset" class="btn btn-info btn-block">
		
	</div>
		
	</body>