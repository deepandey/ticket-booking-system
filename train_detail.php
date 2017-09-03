<?php  
session_start();
$db = mysqli_connect('localhost', 'root', '', 'registration');
$Source =$_SESSION['Source'];
$Destination = $_SESSION['Destination'];
$query = "SELECT * FROM train_details WHERE train_source='$Source' AND train_destination='$Destination'";
      	$results = mysqli_query($db, $query);
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
            <td><button type="button" class=" open-AddBookDialog btn btn-info btn-lg" data-toggle="modal" data-id="<?php echo $row["train_id"]; ?>" data-target="#myModal">Check availability</button></td>

        </tr>
        <?php endwhile ?>
        </tbody>
</table>	
		
		<!--modal-->
		<div class="modal fade" id="myModal" role="dialog">
			<div class="modal-dialog">
				<!-- Modal content-->
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
          				<h4 class="modal-title">Modal Header</h4>
					</div>
					<div class="modal-body">
					<form name="form" action="" method="POST">
  					<input type="text" name="bookId" id="bookId" value="">
					</form>
					<?php echo isset($_POST['bookId']) ? $_POST['bookId'] : 'bv'; ?>
					<table style="width: 100%">
						<tr>
							<th>Date</th>
							<?php
							$query = "SELECT * FROM train_status WHERE 1";
							$results = mysqli_query($db, $query);
							?>
							<?php while( $row = mysqli_fetch_array($results)) : ?>
							<th><?php echo $row["train_date"]; ?></th>
							<?php echo isset($_POST['bookId']) ? $_POST['bookId'] : 'bcv'; ?>	
							<?php endwhile ?>
						</tr>
						<tr>
							<th>availability</th>
							<?php
							$query = "SELECT * FROM train_status WHERE 1";
							$results = mysqli_query($db, $query);
							?>
							<?php while( $row = mysqli_fetch_array($results)) : ?>
							<th><?php echo $row["availability"]; ?><br>
							<a href="login.php?logout='1'" style="color: blue;">book now</a></th>
							<?php endwhile ?>
						</tr>

					</table>
					</div>
					<div class="modal-footer">
          				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        			</div>
				</div>
			</div>
		</div>

		<script type="text/javascript">
			$(document).on("click", ".open-AddBookDialog", function () {
     		var myBookId = $(this).data('id');
     		$(".modal-body #bookId").val( myBookId );
			});
		</script>		

			<p> <a href="login.php?logout='1'" style="color: red;">logout</a> </p>
			<p><?php echo $variable = "<script>document.write(myBookId)</script>"; ?></p>
		
	</div>
		
</body>
</html>
