

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
    $cart_msg='';
    $order_id=0;
    include_once 'cmenu.php';

    $cat_ID=$_GET['category'];
     
    
?>
<!-- background image class to apply css -->
<h1> CART
</h1>

<div>
<?php

 $actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
 //echo $actual_link;

if(isset($_GET['msg'])){
    echo $_GET['msg'];
}





?>
<div>

<h3>  <?php  
 

 
if ($cat_ID==1){  echo 'Mobiles';    } 
if ($cat_ID==2){  echo 'Tablets';    }
if ($cat_ID==3){  echo 'Laptops';    }
if ($cat_ID==4){  echo 'Desktops';    }
if ($cat_ID==5){  echo 'Cameras';    }
if ($cat_ID==6){  echo 'Printers';    }

 


 


?> </h3>







<div class="contentView">







<table class="viewProductTable" style="width:100%">
  <tr>
    
    <th> PRODUCT Name </th>
    <th> PRICE</th>    
       
    
    
    <th> IMAGE</th>
    <th> QUANTITY</th>
    <th> TOTAL</th>
    <th> ACTIONS</th>
   
    
  </tr>
  <?php 

  
    $sql = " select * from order_details where cus_id='$username' and order_id='$order_id'";
    $total_amount=0;
    if ($result = $link -> query($sql)) {
        while ($row = $result -> fetch_row()) {

            ?>
            <tr>
                    <td>  <?php echo $row[4]; ?>     </td>
                    <td> $ <?php echo $row[5];  ?>   </td>                 
                    
                
                    <td> <img class='viewProductImage' src="./upload/<?php echo $row[8];  ?>"  > </td>
                
                    
                    <td> 
                            <form action="<?php echo $actual_link?>"  method="GET">   
                                
                                <input id="DontDisplay" name="row_id" value="<?php echo $row[0];?>"  >   
                                <input id="DontDisplay" name="product_name" value="<?php echo $row[4];?>"  >   
                                
                                <input id="" name="p_quantity" value="<?php echo $row[6];?>"  >           
                                <button type="submit" id="catBTN" name="updateCARTitems" value='1' > UPDATE QUANTITY</button>  
                            </form>
                            <br>
                    </td>
                    <td> $ <?php echo $row[7]*$row[6];    
                     $total_amount=     $total_amount+ ($row[7]*$row[6]); 
                     $_SESSION['total_amount']=$total_amount;
                     
                     ?>     </td>
                    <td>
                            <form action="<?php echo $actual_link?>"  method="GET">  
                                <input id="DontDisplay" name="row_id" value="<?php echo $row[0];?>"  >    
                                <button type="submit" id="catBTN" name="deleteCARTitems" value=" <?php echo $row[0];?> " > DELETE ITEM</button>  
                            
                            </form>
                    </td>
                    
                
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
        <form action="card_checkout.php"  method="GET">  
            <input id="DontDisplay" name="total_amount" value="<?php echo $total_amount?>"  > 
            <input id="DontDisplay" name="paymentMethod" value="card"  >    
            <button type="submit" id="catBTN" name="deleteCARTitems" value=" <?php echo $row[0];?> " > Checkout Via Credit/Debit Card</button>  
                            
        </form>
        <form action="paypal_checkout.php"  method="GET">  
            <input id="DontDisplay" name="total_amount" value="<?php echo $total_amount?>"  > 
            <input id="DontDisplay" name="paymentMethod" value="PayPal"  >    
            <button type="submit" id="catBTN" name="deleteCARTitems" value=" <?php echo $row[0];?> " > Checkout Via PayPal</button>  
                            
        </form>
        
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





</div>





 

 


<?php   // Get menu code
    include_once 'footer.php'
?>
<br> 
</body>
</html>
