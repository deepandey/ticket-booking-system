 <!DOCTYPE html>  
 <html>  
      <head>  
           <title>Webslesson Tutorial | Autocomplete textbox using jQuery, PHP and MySQL</title>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
           <link rel="stylesheet" type="text/css" href="style.css">
           <style>  
           ul{  
                background-color:#eee;  
                cursor:pointer;  
           }  
           li{  
                padding:12px;  
           }  
           </style>  
      </head>  
      <body>  
        <nav class="navbar navbar-inverse">
          <div class="container-fluid">
            <div class="navbar-header">
              <a class="navbar-brand" href="#">WebSiteName</a>
            </div>
            <ul class="nav navbar-nav navbar-right">
              <li class="">
                <a href="#">
                  <span class="glyphicon glyphicon-off" aria-hidden="true"></span>&nbsp;logout
                </a>
              </li>
            </ul>
          </div>
        </nav>  

           <br /><br />  
           <form method="post" action="auto_complete.php">

            <!--for source city-->

             <div class="container" style="width:500px;">  
                <h3 align="center">Autocomplete textbox using jQuery, PHP and MySQL</h3><br />  
                <label>Enter Source</label>  
                <input type="text" name="Source" id="Source" class="form-control" placeholder="Enter Source Name" />  
                <div id="SourceList"></div>  
           </div> 
           <!--for destination city-->
           <div class="container" style="width:500px;">  
                <label>Enter Destination</label>  
                <input type="text" name="Destination" id="Destination" class="form-control" placeholder="Enter Destination Name" />  
                <div id="DestinationList"></div>  
           </div> 
           <div class="container" style="width:500px;">  
                <label>Enter Date</label>  
                <input type="date" name="Date" id="Date" class="form-control" placeholder="Enter Date" />  
           </div> 
           <div class="container" style="width:500px;">
            <button type="submit" class="btn" name="reg_user">Submit</button>
           </div>
           </form>
      </body>  
 </html>  
 <script>  
 $(document).ready(function(){  
      $('#Source').keyup(function(){  
           var query = $(this).val();  
           if(query != '')  
           {  
                $.ajax({  
                     url:"search.php",  
                     method:"POST",  
                     data:{query:query},  
                     success:function(data)  
                     {  
                          $('#SourceList').fadeIn();  
                          $('#SourceList').html(data);  
                     }  
                });  
           }  
      });  
      $(document).on('click', 'li', function(){  
           $('#Source').val($(this).text());  
           $('#SourceList').fadeOut();  
      });  
 });  
 </script>



 <script>  
 $(document).ready(function(){  
      $('#Destination').keyup(function(){  
           var query = $(this).val();  
           if(query != '')  
           {  
                $.ajax({  
                     url:"search.php",  
                     method:"POST",  
                     data:{query:query},  
                     success:function(data)  
                     {  
                          $('#DestinationList').fadeIn();  
                          $('#DestinationList').html(data);  
                     }  
                });  
           }  
      });  
      $(document).on('click', 'li', function(){  
           $('#Destination').val($(this).text());  
           $('#DestinationList').fadeOut();  
      });  
 });  
 </script>