<!-- BootStrap Navbar class to insert nav menu in header -->
<nav class="navbar navbar-inverse">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse"
					data-target="#myNavbar">
					<span class="icon-bar"></span> <span class="icon-bar"></span> <span
						class="icon-bar"></span>
				</button>
				<h3 class="navbar-text "><a class="logotitle"  href="index.php" >Electronic Warehouse Inventory </a></h3>
	    </div> 
        

            <form action="#"  method="post">
                    <div class="collapse navbar-collapse " id="myNavbar">

                        <ul class="nav navbar-nav navbar-right">
                             
                                    <?php
                                            if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
                                                echo ' <li> <a href="givefeedback.php"><span class="glyphicon form-control-feedback"></span> Feedback  </a></li>';
                                               
                                                echo ' <li> <a href="#"><span class="glyphicon glyphicon-user"></span> Welcome '.$_SESSION["username"].'</a></li>';
                                                echo '<li> <a href="logout.php">  <span  class="glyphicon glyphicon-log-in"></span> Logout</a></li>' ;
                                                
                                            }
                                            
                                    ?>
                                    
                                    
                        </ul>
                    </div>
            </form>
</div>  

</nav>
<style>
            button#menuBTN {
            background: none;
            color: black;
            border: none;
            width:100%;
            
            display: block;
            padding: 3px 20px;
            clear: both;
            font-weight: 400;
            line-height: 1.42857143;
            color: #333;
            white-space: nowrap;
            
            }

            a.logotitle{
            background: none;
            color: white;
            text-decoration: none;
            }
            a.logotitle:hover{
            background: none;
            color: white;
            text-decoration: none;
            }
            li#liCAT {
                display: block;
                width: 100%;
                text-align: left;
            }
            a#menuBTN {
                display: block;
                width: 100%;
                color: black;
                padding: 10px;
            }
             
            .navbar-inverse .navbar-nav>li>a {
                color: #ffffff;
            }

</style>
<?php 

/*$order_id=0;
$username=$_SESSION['username'] ;
$sql_cart="SELECT * FROM order_details WHERE cus_id='$username' and order_id='$order_id'; "; 
//$cartCount=0;
if ($result_2 = $link -> query($sql_cart)) {
    while ($row1 = $result_2 -> fetch_row()) {
    $cartCount= $cartCount+1;
    }
}
else{
    echo 'error';
}
//echo 'Total Items in Cart: '.$cartCount;
*/
//--------------------------------------------------------------------------------------

include_once 'config.php';
  //$proID=$_GET['pid'];

  // Check two things
  //1: if the cart is already made or not?
  $username= $_SESSION['username'];
  $order_id=0;
 
  $Date= date("Y-m-d");

  $o_sql=" SELECT * FROM `orders` WHERE cus_id='$username' and cart_status='0' ";
  try{
    if ($result = $link -> query($o_sql)) {
        
            while ($row = $result -> fetch_row()) {
                $order_id=$row[0];
                
                
            }
            $result -> free_result();
    }else{
        echo "  something wrong";
    }
  }catch (Exception $e) {
    echo 'Caught exception: ',  $e->getMessage(), "\n";
    }

  if(isset($_GET['addToCart']))
  {
        // if cart is not made, and if add to cart is clicked,  enter new order id
        if($order_id==0){
             

            $new_o_sql= "
            INSERT INTO `orders` (`order_id`, `cus_id`, `cart_status`, `amount`, `payment_status`,
                                    `payment_id`, `address`, `approve_status`, `date`)
            VALUES (NULL, '$username', '0', 0, 0, NULL, NULL, 0, ' $Date'); ";

            if (mysqli_query($link, $new_o_sql)) {
                  $msg= "New record added successfully";
            }
              else {
                  //echo "Error: " . $sql . "<br>" . mysqli_error($link);
                  $msg="Product ID must be unique, please enter other product id";
              }
         


        

                // now get the latest oorder id
                $o_sql=" SELECT * FROM `orders` WHERE cus_id='$username' and cart_status='0'";
                if ($result = $link -> query($o_sql)) {
                  
                      while ($row = $result -> fetch_row()) {
                          $order_id=$row[0];
                           
                          
                      }
                      $result -> free_result();
                }else{
                    echo "  something wrong";
                }

        }

        // now we have order id, we need to add the product to the oderdetails

        
        $maxID=0;
        $sql='';
        $msql=" SELECT MAX(id) FROM order_details; ";

        if ($res = $link -> query($msql)) {
            while ($row1 = $res -> fetch_row()) {
            $maxID= $row1[0]+1;
            }
        }
        
        $productID= $_GET['pid'];
        $productName=$_GET['pname'];
        $pprice= $_GET['pprice'];
        $pimage=$_GET['pimage'];
        $cate=$_GET['category'];

        $or_sql="
        
        INSERT INTO `order_details` (`id`, `cus_id`, `order_id`, `product_id`,`pname`, `price`,
                                     `quantity`, `total`, `image`, `category`)
        VALUES ('$maxID', '$username', '$order_id', '$productID ', '$productName','$pprice', '1', '$pprice', '$pimage', '$cate');
        
        ";

        if (mysqli_query($link, $or_sql)) {
          $cart_msg= "Added to cart Successfully";
        }
          else {
              //echo "Error: " . $or_sql . "<br>" . mysqli_error($link);
              $cart_msg="Product already added";
          }





  }
try{

        $sql_cart="SELECT * FROM order_details WHERE cus_id='$username' and order_id='$order_id'; "; 
        $cartCount=0;
        if ($result_2 = $link -> query($sql_cart)) {
        while ($row1 = $result_2 -> fetch_row()) {
        $cartCount= $cartCount+1;
        }
    }
}
catch (Exception $e) {
    echo 'Caught exception: ',  $e->getMessage(), "\n";
}

 
//echo 'Total Items in Cart: '.$cartCount;



if(isset($_GET['updateCARTitems'])){
    //echo 'Items updated';
    $quan=$_GET['p_quantity'];
    $rowID= $_GET['row_id'];
    //echo $_GET['product_name'];

    $update_sql="
    UPDATE `order_details` SET `quantity` = '$quan' 
    WHERE `order_details`.`cus_id` = '$username' 
    AND `order_details`.`order_id` = '$order_id'
    AND `order_details`.`id` = '$rowID';
    ";
    if (mysqli_query($link, $update_sql)) {
        $update_msg= "Cart Quantity Updated Successfully! ";
    }else{
        $update_msg= ' Cart did not update----';
    }
}
if(isset($_GET['deleteCARTitems'])){
    

    $rowID= $_GET['row_id'];
    $del_sql="
    
        DELETE FROM order_details where order_id='$order_id' and id='$rowID'; 
    " ;
    if (mysqli_query($link, $del_sql)) {
        $del_msg= "Cart Quantity Updated Successfully! ";
    }else{
        $del_msg= ' Cart did not update----';
    }

}

$paymentMatch=0;
if(isset($_POST['cardPayment'])){ 
    $id= $_POST['cardID'];
    $name=$_POST['cardName'];
    $code=$_POST['cardCode'];
    $Date=$_POST['cardDate'];

    $p_sql=" SELECT * FROM creditcard where id='$id' ; ";
    if ($result = $link -> query($p_sql)) {
        while ($row = $result -> fetch_row()) {
            if ($row[1]==$name && $row[2]==$Date && $row[3]=$code){
                $paymentMatch=1;
               // echo "card details  matched";
            }

        }
    }
    
        $message=" Payment Details did not match";
    
    $method="Credit/Debit Card";
}
if(isset($_POST['paypalPayment'])){

    $payEmail= $_POST['paypalEmail'];
    $payPass=$_POST['paypalPassword'];
    $paypal_sql=" SELECT * FROM paypal where email='$payEmail' ; ";
    if ($result = $link -> query($paypal_sql)) {
        while ($row = $result -> fetch_row()) {
            if ($row[1]==$payEmail && $row[2]==$payPass){
                $paymentMatch=1;
               // echo " Paypal details  matched";
            }

        }
    }
    

        $message=" Payment Details did not match";
    
$method="Paypal";
}
if($paymentMatch==1){

    //echo ' payment is matched';
    $amount= $_POST['total_amount'];
    $address= $_POST['address'];
    $order_update_sql=" 
    UPDATE `orders` SET `amount` = '$amount',
    `cart_status` = '1', 
         `payment_status` = '1', 
         `payment_method` = '$method', 
         `address` = '$address' 
    WHERE `orders`.`order_id` = '$order_id' ; ";

    if (mysqli_query($link, $order_update_sql)) {
        $thank_you_msg= " >>>>>>>>>>>>>>>>> Cart Quantity Updated Successfully! <<<<<<<<<<<<<<<<<";
        $order_id=0;
        header("location: ./thankyou.php");
    }else{
        $thank_you_msg= ' Cart did not update----';
    }
    

}





$newArrival=0;
$newArrival=$newArrival+2;





if(isset($_POST['submitFeedback'])){
    $sub=$_POST['subject'];
    $proname=$_POST['productname'];
    $desc=$_POST['description'];

    $feedback_sql="
    
    INSERT INTO `feedback` (`id`, `subject`, `productname`, `description`)
     VALUES (NULL, '$sub', '$proname', '$desc');
    
    ";

    if (mysqli_query($link, $feedback_sql)){
        $feedback_msg=" Successfully submitted feedback";

    }else{
        $feedback_msg=" Could not submit feedback";
    }
   
}



//----------------------------------------------------------------------------------------



if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
 echo '
        <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <ul class="nav navbar-nav">
            <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Menu<span class="caret"></span></a>
                <ul class="dropdown-menu">

                <li class="dropdown-submenu">
                    <form action="./viewproduct_customer.php"  method="GET">  
                            <a class="test"  id="menuBTN" tabindex="-1" href="#">Product Categories <span class="caret"></span></a>
                                <ul class="nav navbar-nav navbar-right">
                                    <li id="liCAT"><button type="submit" id="menuBTN" name="category" value="1"> Mobiles</button> </li>                        
                                    <li id="liCAT"><button type="submit" id="menuBTN" name="category" value="2">Tablets </button> </li>
                                    <li id="liCAT"><button type="submit" id="menuBTN" name="category" value="3" > Laptops</button> </li>
                                    <li id="liCAT"><button type="submit" id="menuBTN" name="category" value="4"> Desktops</button> </li>
                                    <li id="liCAT"><button type="submit" id="menuBTN" name="category" value="5"> Cameras</button> </li>
                                    <li id="liCAT"><button type="submit" id="menuBTN" name="category" value="6"> Printers</button> </li>
                                    
                                </ul>
                    </form>
                </li>
                
                </ul>
            </li>
            <li>  
                    <form action="csearch.php"  method="GET">
                                <input type="text" name="keyword" placeholder="Search..">
                                <button type="submit" id="catBTN"   value="" >Search</button>  

                                
                            
                    </form>
                    
            
            </li>
            <li > <a href="notification.php">  <span  class="glyphicon glyphicon glyphicon-bell"></span>New Arrivals </a> </li>
            
            
            ';
            if(1){
            echo '<li> <a href="cart.php">  <span  class="glyphicon glyphicon-shopping-cart"></span> Cart.'.$cartCount.' </a></li>';
            }
            echo ' </ul>
        </div>
        </nav>
        ';
}











?>
<script>
$(document).ready(function(){
  $('.dropdown-submenu a.test').on("click", function(e){
    $(this).next('ul').toggle();
    e.stopPropagation();
    e.preventDefault();
  });
});
</script>
