<?php
	session_start();
	if(isset($_POST['test'])) { //if i have this post
		
     // print it  
    $_SESSION["var_train"] = $_POST['test'];
    echo $_SESSION['var_train']+1;
    }

    
?>


