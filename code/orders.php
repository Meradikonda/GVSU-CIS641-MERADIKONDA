



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
<h1> View Orders</h1>





<div class="contentView">

<h3> <?php echo $order_status_msg; echo '<br>'.$stock_update_message;?> </h3>
<h2> Pending Orders </h2>
<hr>
<table class="viewProductTable" style="width:100%">
  <tr>
    
    <th> Order ID</th>
    <th> Customer Username</th>    
       
    
    
    <th> Amount</th>
    <th> Payment Status</th>
    <th> Payment Method</th>
    <th> Shipping Address</th>
    <th> Date </th>
    <th> Action </th>
   
    
  </tr>
    <?php

    $view_sql=" SELECT * FROM `orders` WHERE cart_status='1' and approve_status='0'  order by order_id DESC; ";
    if ($result = $link -> query($view_sql)) {
        while ($row = $result -> fetch_row()) {

            ?>
            <tr> 
                    <td>  <?php echo $row[0]; ?>     </td>
                    <td>  <?php echo $row[1];  ?>   </td>  
                    
                    <td> $ <?php echo $row[3];  ?>   </td>  
                    <td>  <?php echo $row[4];  ?>   </td> 
                    <td>  <?php echo $row[6];  ?>   </td>  
                    <td>  <?php echo $row[7];  ?>   </td>  
                    <td>  <?php echo $row[9];  ?>   </td> 
                    <td>

                            <form action="<?php echo $actual_link?>"  method="GET">  
                                <input id="DontDisplay" name="order_ID" value="<?php echo $row[0];?>"  >    
                                <button type="submit" id="catBTN" name="declineOrder" value="2" > DECLINE Order</button>  
                                <button type="submit" id="catBTN" name="approveOrder" value="1" > Approve Order</button>  
                            </form>

                            <form action="view_order_details.php"  method="GET">  
                                <input id="DontDisplay" name="order_ID" value="<?php echo $row[0];?>"  >    
                                <button type="submit" id="catBTN" name="viewOrderDetails" value="1"  > View Order Details</button>  

                                
                            
                            </form>
                             
                    </td> 

            </tr>


    <?php

        }
    }

?>


</table>


<h2> Approved Orders </h2>

<hr>

<table class="viewProductTable" style="width:100%">
  <tr>
    
    <th> Order ID</th>
    <th> Customer Username</th>    
       
    
    
    <th> Amount</th>
    <th> Payment Status</th>
    <th> Payment Method</th>
    <th> Shipping Address</th>
    <th> Date </th>
    <th> Action </th>
   
    
  </tr>
    <?php

    $view_sql=" SELECT * FROM `orders` WHERE cart_status='1' and approve_status='1'  order by order_id DESC; ";
    if ($result = $link -> query($view_sql)) {
        while ($row = $result -> fetch_row()) {

            ?>
            <tr> 
                    <td>  <?php echo $row[0]; ?>     </td>
                    <td>  <?php echo $row[1];  ?>   </td>  
                    
                    <td> $ <?php echo $row[3];  ?>   </td>  
                    <td>  <?php echo $row[4];  ?>   </td> 
                    <td>  <?php echo $row[6];  ?>   </td>  
                    <td>  <?php echo $row[7];  ?>   </td>  
                    <td>  <?php echo $row[9];  ?>   </td> 
                    <td>

                            

                            <form action="view_order_details.php"  method="GET">  
                                <input id="DontDisplay" name="order_ID" value="<?php echo $row[0];?>"  >    
                                <button type="submit" id="catBTN" name="viewOrderDetails" value="1"  > View Order Details</button>  

                                
                            
                            </form>
                             
                    </td> 

            </tr>


    <?php

        }
    }

?>


</table>



<h2> Declined Orders </h2>

<hr>

<table class="viewProductTable" style="width:100%">
  <tr>
    
    <th> Order ID</th>
    <th> Customer Username</th>    
       
    
    
    <th> Amount</th>
    <th> Payment Status</th>
    <th> Payment Method</th>
    <th> Shipping Address</th>
    <th> Date </th>
    <th> Action </th>
   
    
  </tr>
    <?php

    $view_sql=" SELECT * FROM `orders` WHERE cart_status='1' and approve_status='2'  order by order_id DESC; ";
    if ($result = $link -> query($view_sql)) {
        while ($row = $result -> fetch_row()) {

            ?>
            <tr> 
                    <td>  <?php echo $row[0]; ?>     </td>
                    <td>  <?php echo $row[1];  ?>   </td>  
                    
                    <td> $ <?php echo $row[3];  ?>   </td>  
                    <td>  <?php echo $row[4];  ?>   </td> 
                    <td>  <?php echo $row[6];  ?>   </td>  
                    <td>  <?php echo $row[7];  ?>   </td>  
                    <td>  <?php echo $row[9];  ?>   </td> 
                    <td>

                            

                            <form action="view_order_details.php"  method="GET">  
                                <input id="DontDisplay" name="order_ID" value="<?php echo $row[0];?>"  >    
                                <button type="submit" id="catBTN" name="viewOrderDetails" value="1"  > View Order Details</button>  

                                
                            
                            </form>
                             
                    </td> 

            </tr>


    <?php

        }
    }

?>


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
