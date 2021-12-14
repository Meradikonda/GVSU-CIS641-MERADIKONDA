



<!DOCTYPE html>
<html>
<head>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet"
	href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script
	src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script
	src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

  <link rel="stylesheet" href="register.css">
 
</head>


<?php

            include_once 'config.php';
            
            // Initialize the session
            session_start();
            
            if(!isset($_SESSION['add2cart'])) {
              $_SESSION['add2cart']=array();
            // echo "set for first time";
            }
            else{
              // echo 'alreeady set';
            }


            // Check if the user is already logged in, if yes then redirect him to welcome page
            if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
              //header("location: /home.php");
              //echo 'this is home ';
              //exit;
              
            }
            else{
                header("location: ./login.php");
            }

 

?>
<body>


<?php 

// Orders and Add to Cart
 




    
    $stock_update_message='';
    $order_status_msg='';
    
    // Get menu code
    include_once 'menu.php';

 
    
?>
<!-- background image class to apply css -->





<div class="contentView">

<h3> <?php echo $order_status_msg; echo '<br>'.$stock_update_message;?> </h3>
<h2> Feedback </h2>
<hr>
<table class="viewProductTable" style="width:100%">
  <tr>
    
    <th> Feedback ID</th>
    <th>Subject</th>    
       
    
    
    <th> Product Name</th>
    <th> Description</th>
    <th> Timestamp</th>
     
   
    
  </tr>
    <?php

    $view_sql=" SELECT * FROM `feedback` order by timestamp DESC";
    if ($result = $link -> query($view_sql)) {
        while ($row = $result -> fetch_row()) {

            ?>
            <tr> 
                    <td>  <?php echo $row[0]; ?>     </td>
                    <td>  <?php echo $row[1];  ?>   </td>  
                    
                    <td>  <?php echo $row[2];  ?>   </td>  
                    <td>  <?php echo $row[3];  ?>   </td> 
                    <td>  <?php echo $row[4];  ?>   </td>

                     

            </tr>


    <?php

        }
    }

?>


</table>





</table>

</div>

<style>
            #DontDisplay{
            display:none;
            }
            .viewProductTable{
                width: 70%;
                text-align:center;
                margin: 10px;
            }
            .contentView{
                width: 100% ;
                padding: 25px;
            }
            table, th, td {
                border: 1px solid black;
                align-items: center;
                text-align: center;
                padding: 20px;
            
            }
            tr:nth-child(even) {
            background-color: #f1f1f1!important;
            }
            tr:nth-child(odd) {
            background-color:#e6eeff!important;
            }
            .viewProductImage{
                height: 50px;
            }
</style>











 

 


<?php   // Get menu code
    include_once 'footer.php'
?>
<br> 
</body>
</html>
