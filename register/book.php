<?php     	session_start();
if(isset($_POST['train_date'])) { //if i have this post
		
     // print it  
    	$_SESSION['train_date']=$_POST['train_date'];

      }
    if(isset($_SESSION['train_date'])){
    	//echo $_SESSION['train_date'];
    }
    else{
    	echo "nothing";
    }
    $username=$_SESSION['username'];
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

<form method="post" action="book_server.php">
	<h3>
		Book ticket for train number: <?php echo $_SESSION['var_train']; ?>
		and Date: <?php echo $_SESSION['train_date']  ?>
	</h3>	

		<div class="input-group">
			<label>Name</label>
			<input type="text" name="fullname">
		</div>
		<div class="input-group">
			<label>AGE</label>
			<input type="text" name="age">
		</div>
		<div class="input-group">
			Gender: <select name="gender">
    		<option value="male">Male</option>
    		<option value="female">Female</option>
  			</select>
		</div>
		<div class="input-group">
			<label>Nationality</label>
			<input type="text" name="nationality">
		</div>
		<div class="input-group">
			<label>PHONE</label>
			<input type="text" name="phone">
		</div>
		<div class="input-group">
			Berth Type: <select name="berth">
    		<option value="upper">Upper</option>
    		<option value="lower">Lower</option>
  			</select>
		</div>
		<div class="input-group">
			<button type="submit" class="btn btn-info btn-lg"
			  data-target="#myModal" name="done">done</button>
		</div>
		
		
	</form>
	
</body>
</html>