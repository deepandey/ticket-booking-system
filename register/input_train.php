<?php   

?>
<!DOCTYPE html>
<html>
<head>

	<link rel="stylesheet" type="text/css" href="style.css">
	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<style>
body  {
    background-image: url("rail.jpg");
    background-color: #cccccc;
    background-size: 100% auto;
    background-repeat: no-repeat;
}
</style>
</head>
<body>
	<nav class="navbar navbar-inverse">
          <div class="container-fluid">
            <div class="navbar-header">
              <a class="navbar-brand" href="login.php">DBMS PROJECT</a>
            </div>
            <ul class="nav navbar-nav navbar-right">
              <li class="">
                <a href="login.php">
                  <span class="glyphicon glyphicon-off" aria-hidden="true"></span>&nbsp;logout
                </a>
              </li>
            </ul>
            <ul class="nav navbar-nav navbar-left">
              <li class="active">
                <a href="auto_complete.php">
                  <span class="glyphicon glyphicon-home" aria-hidden="true"></span>&nbsp;Home
                </a>
              </li>
              <li><a href="booking_detail">Bookings</a></li>
            </ul>
          </div>
        </nav>

<form method="post" action="input_server.php">
	<h3>
		Add a train to the DataBase  	</h3>	

		<div class="input-group">
			<label>Train id</label>
			<input type="text" name="train_id">
		</div>
		<div class="input-group">
			<label>Train name</label>
			<input type="text" name="train_name">
		</div>
    <div class="input-group">
      <label>Train source</label>
      <input type="text" name="Train_source">
    </div>
    <div class="input-group">
      <label>Train destination</label>
      <input type="text" name="Train_destination">
    </div>
    <div style="width:200px;">  
      <label>train departure</label>  
      <input type="time" name="train_departure" id="train_departure" class="form-control" placeholder="Enter Date" />  
    </div> 
    <div style="width:200px;">  
      <label>train arrival</label>  
      <input type="time" name="train_arrival" id="train_arrival" class="form-control" placeholder="Enter Date" />  
    </div> 
		<div class="input-group">
			<button type="submit" class="btn btn-info btn-lg"
			  data-target="#myModal" name="done">done</button>
		</div>
		
		
	</form>
	
</body>
</html>