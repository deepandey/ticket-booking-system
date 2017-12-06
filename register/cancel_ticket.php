<?php

 session_start();
 	$pnr=$_POST['test'];
	$db = mysqli_connect('localhost', 'root', '', 'registration');
	$train_id=$_SESSION['var_train'];//this is working fine
	$train_date=$_SESSION['train_date'];//this is also
	$query = "SELECT * FROM user_info WHERE pnr=$pnr ";
	$results = mysqli_query($db, $query);
	$row = mysqli_fetch_assoc($results);
	$train_date=$row["journeydate"];
	$train_id=$row["train_number"];

$query2 = "SELECT * FROM train_status WHERE train_date='$train_date' AND train_id=$train_id";
	    $results2 = mysqli_query($db, $query2);

	    $row2 = mysqli_fetch_assoc($results2);
	    $availability=$row2["availability"];
	    $availability=$availability+1;
	    $query3="UPDATE train_status SET availability=$availability WHERE train_date='$train_date' AND train_id=$train_id";
	    mysqli_query($db, $query3);
$query4 = "DELETE FROM user_info WHERE pnr=$pnr ";
	mysqli_query($db, $query4);


if(isset($_POST['test'])) { //if i have this post
    //echo $pnr; // print it
    echo $availability;
}
?>