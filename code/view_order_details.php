



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
 




    // Get menu code
     
    
    include_once 'menu.php';

 
    
?>
<!-- background image class to apply css -->
<h1> View Order Details</h1>





<div class="contentView">

 

<hr>


<table class="viewProductTable" style="width:100%">
  <tr>
    
    <th> PRODUCT Name </th>
    <th> PRICE</th>    
       
    
    
    <th> IMAGE</th>
    <th> QUANTITY</th>
    <th> TOTAL</th>
   
   
    
  </tr>
  <h2> Orders Id: <?php echo $_GET['order_ID'];?> </h2>
  <?php 

    $order_id=$_GET['order_ID'];
    $sql = " select * from order_details where order_id='$order_id'";
    $total_amount=0;
    if ($result = $link -> query($sql)) {
        while ($row = $result -> fetch_row()) {

            ?>
            <tr>
                    <td>  <?php echo $row[4]; ?>     </td>
                    <td> $ <?php echo $row[5];  ?>   </td>                 
                    
                
                    <td> <img class='viewProductImage' src="./upload/<?php echo $row[8];  ?>"  > </td>
                
                    
                    <td> <?php echo $row[6];?>
                    </td>
                    <td> $ <?php echo $row[7]*$row[6];    
                     $total_amount=     $total_amount+ ($row[7]*$row[6]); 
                     $_SESSION['total_amount']=$total_amount;
                     
                     ?>     </td>
                    
                
            </tr>
           
  <?php



        }
        $result -> free_result();
       
      }  
?>
           

        </table>
        <h1>
            Total Amount:  <?php echo $total_amount;// ?>
        </h1>


 

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
