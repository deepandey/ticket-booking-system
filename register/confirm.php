<?php session_start();
	$db = mysqli_connect('localhost', 'root', '', 'registration');
	$train_id=$_SESSION['var_train'];//this is working fine
	$train_date=$_SESSION['train_date'];//this is also

$query2 = "SELECT * FROM train_status WHERE train_date='$train_date' AND train_id=$train_id";
	    $results = mysqli_query($db, $query2);

	    $row = mysqli_fetch_assoc($results);
	    $availability=$row["availability"];
	    $availability=$availability-1;
	    $query3="UPDATE train_status SET availability=$availability WHERE train_date='$train_date' AND train_id=$train_id";
	    mysqli_query($db, $query3);
	    $username=$_SESSION['username'];

?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div class="header">
		<h2>your ticket for train number: <?php echo $train_id; ?>
			and date: <?php echo $_SESSION['train_date'];?> is confirmed
			and your pnr is
			<?php echo $_SESSION['pnr'];
			 ?><br>
			 <br>
			<?php echo "Amount payable= Rs.".$_SESSION['amount'];?>
		</h2>
		<h2>
			<a href="booking_detail.php">Proceed </a>
		</h2>
	</div>
	
</body>
</html>