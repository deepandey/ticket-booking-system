<?php 
	

	// connect to database
	$db = mysqli_connect('localhost', 'root', '', 'registration');

	// REGISTER USER
	if (isset($_POST['done'])) {
		
		//$results = mysqli_query($db, $query2);
		// receive all input values from the form
		$train_id = mysqli_real_escape_string($db, $_POST['train_id']);
		$train_name = mysqli_real_escape_string($db, $_POST['train_name']);
		$train_source = mysqli_real_escape_string($db, $_POST['Train_source']);
		$train_destination = mysqli_real_escape_string($db, $_POST['Train_destination']);
		$train_departure = mysqli_real_escape_string($db, $_POST['train_departure']);
		$train_arrival = mysqli_real_escape_string($db, $_POST['train_arrival']);
		echo $train_id;	

		$query = "INSERT INTO train_details (train_id, train_name, train_source, train_destination, train_departure, train_arrival) 
					  VALUES($train_id, '$train_name', '$train_source', '$train_destination', '$train_departure', '$train_arrival')";
			$result_sql=mysqli_query($db, $query);

			if ($result_sql==false) {
				//echo "failed like always";
				# code...
			}


			header('location: confirm_input.php');
		

	}
 ?>