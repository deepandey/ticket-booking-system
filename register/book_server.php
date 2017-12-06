<?php 
	session_start();
	$fullname = "";
	$age    = "";
	$gender="";
	$nationality="";
	$berth="";
	$phone="";
	$pnr=mt_rand();
	$_SESSION['pnr']=$pnr;
	$train_id=$_SESSION['var_train'];
	$train_date=$_SESSION['train_date'];
	$username=$_SESSION['username'];

	// connect to database
	$db = mysqli_connect('localhost', 'root', '', 'registration');

	// REGISTER USER
	if (isset($_POST['done'])) {
		
		//$results = mysqli_query($db, $query2);
		// receive all input values from the form
		$fullname = mysqli_real_escape_string($db, $_POST['fullname']);
		$age = mysqli_real_escape_string($db, $_POST['age']);
		$gender = mysqli_real_escape_string($db, $_POST['gender']);
		$nationality = mysqli_real_escape_string($db, $_POST['nationality']);
		$berth = mysqli_real_escape_string($db, $_POST['berth']);
		$phone = mysqli_real_escape_string($db, $_POST['phone']);	

		echo $phone;	
		echo $username;

		$query = "INSERT INTO user_info (fullname, age, gender, nationality, berth, pnr, phone, train_number, journeydate, username) 
					  VALUES('$fullname', $age, '$gender', '$nationality', '$berth', $pnr, $phone, $train_id, '$train_date', '$username')";
			$result_sql=mysqli_query($db, $query);

			if ($result_sql==false) {
				echo "failed like always";
				# code...
			}

		if ($age<60) {
			$_SESSION['amount']=1000;
		}
		else{
			$_SESSION['amount']=800;
		}

			header('location: confirm.php');
		

	}
 ?>