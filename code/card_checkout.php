

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
    $message='';
    include_once 'cmenu.php';

    //$cat_ID=$_GET['category'];
     
    
?>
<!-- background image class to apply css -->
<h1> CREDIT/DEBIT CARD CHECKOUT
</h1>

<div>
<?php

 $actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
 //echo $actual_link;



  echo $message;




?>
<div>








<div class="contentView">
            <h3>
            Order Id: &nbsp;          <?php echo $order_id; ?> <br>
            Total Amount:   &nbsp;     $ <?php echo $_GET['total_amount']; ?> <br>
            Ship to user:    &nbsp;   <?php echo $username ?><br>
            Payment Method:   &nbsp;  <?php echo $_GET['paymentMethod'];?> <br>
            <img height='100px' class='viewProductImage' src="./images/card.png"  > 
            </h3>

            <form action="<?php echo $actual_link?>"  method="POST">
            <label >Shipping Address </label>
            <input id=" " name="address"  > <br>
            <label >Card Id</label>
            <input id=" " name="cardID"  > <br>
            <label >Card Name </label>
            <input id=" " name="cardName" >    <br>
            <label >Card CVC Code</label>
            <input id=" " name="cardCode" >    <br>
            <label >Expiry Date MMYY</label>
            <input id=" " name="cardDate" >    <br>
            <input id="DontDisplay" name="total_amount" value=" <?php echo $_GET['total_amount']; ?>">
            <button type="submit" id="catBTN" name="cardPayment" value=" " > Submit</button>  
              

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
