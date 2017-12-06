<?php

if(isset($_POST['test'])) { //if i have this post
    echo $_POST['test']; // print it
}
?>

<?php 
	

	// connect to database
	$db = mysqli_connect('localhost', 'root', '', 'registration');
	$train_id=$_POST['test'];
	// REGISTER USER
	
		$query = "DELETE FROM train_details WHERE train_id = $train_id ";
			$result_sql=mysqli_query($db, $query);

			if ($result_sql==false) {
				echo "failed like always";
				# code...
			}


			//header('location: confirm_input.php');
	
 ?>