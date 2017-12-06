<?php  
	session_start();
	$db = mysqli_connect('localhost', 'root', '', 'registration');
	$Source =$_SESSION['Source'];
	$Destination = $_SESSION['Destination'];
	$query = "SELECT * FROM train_details WHERE train_source='$Source' AND train_destination='$Destination'";
    $results = mysqli_query($db, $query);
    $train_no=$_SESSION["var_train"];
    if(isset($_POST['test2'])){
    	$var2=$_POST['var2'];
    }
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<title>Home</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<style>
	.header{
		width: 70%;
	}
	.content {
		width: 70%;
	}
	

</style>
<style>
table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

td, th {
    border: 1px solid #dddddd;
    text-align: center;
    padding: 8px;
}

tr:nth-child(even) {
    background-color: #dddddd;
}
</style>
<style>
#myDIV {
    width: 100%;
    padding: 50px 0;
    text-align: center;
    background-color: lightblue;
    margin-top:20px;
}
.hidden{
       display:none;
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
	<div class="header">
		<h2>Train details</h2>
	</div>
	
	<div class="content">
		
			
			<table>
        <tr>
            <th>Train no.</th>
            <th>Train name</th>
            <th>Train departure</th>
            <th>Train arrival</th>
            <th></th>

        </tr>
        
        <tbody>
        <!--Use a while loop to make a table row for every DB row-->
        	<?php while( $row = mysqli_fetch_array($results)) : ?>
        <tr>
            <!--Each table column is echoed in to a td cell-->
            <td><?php echo $row["train_id"]; ?></td>
            <td><?php echo $row["train_name"]; ?></a></td>
            <td><?php echo $row["train_departure"]; ?></td>
            <td><?php echo $row["train_arrival"]; ?></td>
            <td>
            	<button type="button" id="availability"  class=" open-AddBookDialog btn btn-info btn-lg" data-toggle="modal" data-id="<?php echo $row["train_id"]; ?>"
            	href="#addBookDialog">Check availability</button>
            </td>

        </tr>
        <?php endwhile ?>
        </tbody>
</table>	
		
		<!--modal-->
		<div class="modal fade" id="addBookDialog" role="dialog">
			<div class="modal-dialog" style="width: 1000px">
				<!-- Modal content-->
				<div class="modal-content">
					<div class="modal-header">
						<button onclick="myFunction()" type="button" class="close" data-dismiss="modal">&times;</button>
          				<h4 class="modal-title">Modal Header</h4>
					</div>
					<div class="modal-body">
					<p><?php 
					if(isset($var2)){
						echo $var2;
					}
					 ?></p>
					
					<div id="train">
					</div>
					<table style="width: 100%">
						<tr>
							<th>Date</th>
							<?php
							$query = "SELECT * FROM train_status WHERE train_id='$train_no'";
							$results = mysqli_query($db, $query);
							?>
							<?php while( $row = mysqli_fetch_array($results)) : ?>
							<th><?php echo $row["train_date"]; ?></th>
							<?php endwhile ?>		
						</tr>
						<tr>
							<th>availability</th>
							<?php
							$query = "SELECT * FROM train_status WHERE train_id='$train_no'";
							$results = mysqli_query($db, $query);
							?>
							<?php while( $row = mysqli_fetch_array($results)) : ?>
							<th><?php echo $row["availability"]; ?><br>
							<?php $_SESSION["var_date"]=$row["train_date"]  ?>
							<button type="button" class=" open-AddBookDialog2 btn btn-info btn-lg" name="login_user" data-id="<?php echo $row["train_date"]; ?>">book now</button>
							</th>
							<?php endwhile ?>
						</tr>

					</table>
					</div>
					<div class="modal-footer">
          				<button type="button" class="btn btn-default" onclick="myFunction()" data-dismiss="modal">Close</button>
          				<script>
						function myFunction() {
    					location.reload(true);

						}
						</script>
        			</div>
				</div>
			</div>
		</div>

		<script>
			$(document).on("click", ".open-AddBookDialog", function (e) {
     		var train_no = $(this).data('id');
     		$(".modal-body #bookId").val( train_no );
 			$.ajax({
    		type: 'post', // the method (could be GET btw)
    		url: 'helper.php', // The file where my php code is
    		data: {
        		'test': train_no // all variables i want to pass. In this case, only one.
    		},
    		success: function(data) { // in case of success get the output, i named data
        		//alert(data); // do something with the output, like an alert
    
    		}
			});    		
			});
			
		</script>	
		<script type="text/javascript">
			$(document).on("click", ".open-AddBookDialog2", function (f){
				var train_date=$(this).data('id');
				//alert(train_date);
				$.ajax({
    			type: 'post', // the method (could be GET btw)
    			url: 'book.php', // The file where my php code is
    			data: {
        			'train_date': train_date // all variables i want to pass. In this case, only one.
    			},
    			success: function(data) { // in case of success get the output, i named data
        			window.open("book.php"); // do something with the output, like an alert
    
    			}
    			
			}); 
			});
		</script>

			<p> <a href="login.php?logout='1'" style="color: red;">logout</a> </p>
			
		
	</div>
		
</body>
</html>