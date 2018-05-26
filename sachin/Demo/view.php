<?php  
$connect = mysqli_connect("localhost", "root", "", "disaster_managment");  
$query ="SELECT * FROM fuck_disaster";  
$result = mysqli_query($connect, $query);  
?>  
<!DOCTYPE html>  
<html>  
     <head>  
          <title>Webslesson Tutorial | How to load MySql Data in Jquery Bootgrid Plugin using PHP</title>  
          <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
          <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>                      
          <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-bootgrid/1.3.1/jquery.bootgrid.min.js"></script>            
          <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
          <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-bootgrid/1.3.1/jquery.bootgrid.css" />  
     </head>  
     <body>  
          <br /><br />  
          <div class="container">  
               <h3 align="center">How to load MySql Data in Jquery Bootgrid Plugin using PHP</h3>  
               <br />  
               <div class="table-responsive">  
                    <table id="employee_data" class="table table-striped table-bordered">  
                         <thead>  
                              <tr>  
                                   <th data-column-id="id" data-type="numeric">Student ID</th>  
                                   <th data-column-id="name">Student Name</th>  
                                   <th data-column-id="phone">Student Phone</th>  
                              </tr>  
                         </thead>  
                         <tbody>  
                         <?php  
                         while($row = mysqli_fetch_array($result))  
                         {  
                            echo '  
                            <tr>  
                                 <td>'.$row["id"].'</td>  
                                 <td>'.$row["Name"].'</td>  
                                 <td>'.$row["Details"].'</td>  
                            </tr>  
                            ';  
                         }  
                         ?>  
                         </tbody>  
                    </table>  
               </div>  
          </div>  
     </body>  
</html>  
<script>  
$("#employee_data").bootgrid();  
</script>  