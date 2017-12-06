<?php  
  
  $db = mysqli_connect('localhost', 'root', '', 'registration');
  $query = "SELECT * FROM train_details ";
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
	<link rel="stylesheet" type="text/css" href="style.css">
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
	<div class="header" style="width:800px;">
		<h2>Train succesfully added
			 <br>
			
		</h2>
	</div>
	<div class="content" style="width:800px;">

 <table>
        <tr>
            <th>train_id</th>
            <th>train_name</th>
            <th>Train source</th>
            <th>train destination</th>
            <th>train departure</th>
            <th>train arrival</th>

        </tr>
        
        <tbody>
        <!--Use a while loop to make a table row for every DB row-->
          <?php while( $row = mysqli_fetch_array($results)) : ?>
        <tr>
            <!--Each table column is echoed in to a td cell-->
            <td><?php echo $row["train_id"]; ?></td>
            <td><?php echo $row["train_name"]; ?></a></td>
            <td><?php echo $row["train_source"]; ?></td>
            <td><?php echo $row["train_destination"]; ?></td>
            <td><?php echo $row["train_departure"]; ?></td>
            <td><?php echo $row["train_arrival"]; ?></td>
            <td>
              <button type="button" class=" open-AddBookDialog2 btn btn-info btn-lg" data-id="<?php echo $row["train_id"]; ?>">delete</button>
            </td>
        </tr>
        <?php endwhile ?>
        </tbody>
</table>  
</div>
<script type="text/javascript">
      $(document).on("click", ".open-AddBookDialog2", function (f){
        var train_id=$(this).data('id');
        //alert(train_date);
        $.ajax({
          type: 'post', // the method (could be GET btw)
          url: 'delete_train.php', // The file where my php code is
          data: {
              'test': train_id // all variables i want to pass. In this case, only one.
          },
          success: function(data) { // in case of success get the output, i named data
              alert("tarin deleted"); // do something with the output, like an alert
    		location.reload(true);
          }
          
      }); 
      });
    </script>
	
</body>
</html>