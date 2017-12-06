 <?php  
 $connect = mysqli_connect("localhost", "root", "", "registration");  
 if(isset($_POST["query1"]))  
 {  
      $output = '';  
      $query1 = "SELECT * FROM tbl_country WHERE country_name LIKE '%".$_POST["query1"]."%'";  
      $result = mysqli_query($connect, $query1);  
      $output = '<ul class="list-unstyled">';  
      if(mysqli_num_rows($result) > 0)  
      {  
           while($row = mysqli_fetch_array($result))  
           {  
                $output .= '<li>'.$row["country_name"].'</li>';  
           }  
      }  
      else  
      {  
           $output .= '<li>Country Not Found</li>';  
      }  
      $output .= '</ul>';  
      echo $output;  
 }  
 ?>  