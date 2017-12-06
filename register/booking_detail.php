<?php  
  session_start();
  $username=$_SESSION['username'];
  $db = mysqli_connect('localhost', 'root', '', 'registration');
  $query = "SELECT * FROM user_info WHERE username='$username' ";
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

            </ul>
          </div>
        </nav>
  <div class="header">
    <h2>Booking details of 
      <?php echo $username ?></h2>
  </div>

  <div class="content">
    <table>
        <tr>
            <th>Name</th>
            <th>pnr</th>
            <th>Train number</th>
            <th>journey date</th>
            <th></th>

        </tr>
        
        <tbody>
        <!--Use a while loop to make a table row for every DB row-->
          <?php while( $row = mysqli_fetch_array($results)) : ?>
        <tr>
            <!--Each table column is echoed in to a td cell-->
            <td><?php echo $row["fullname"]; ?></td>
            <td><?php echo $row["pnr"]; ?></a></td>
            <td><?php echo $row["train_number"]; ?></td>
            <td><?php echo $row["journeydate"]; ?></td>
            <td>
              <button type="button" class=" open-AddBookDialog2 btn btn-info btn-lg" data-id="<?php echo $row["pnr"]; ?>">cancel</button>
            </td>
        </tr>
        <?php endwhile ?>
        </tbody>
</table>  
  <script type="text/javascript">
      $(document).on("click", ".open-AddBookDialog2", function (f){
        var train_pnr=$(this).data('id');
        //alert(train_date);
        $.ajax({
          type: 'post', // the method (could be GET btw)
          url: 'cancel_ticket.php', // The file where my php code is
          data: {
              'test': train_pnr // all variables i want to pass. In this case, only one.
          },
          success: function(data) { // in case of success get the output, i named data
              //alert(data); // do something with the output, like an alert
              location.reload(true);
    
          }

          
      }); 
      });
    </script>
  </div>
</body>
</html>