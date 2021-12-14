

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
    $update_msg='';
    $del_msg='';
    $order_id=0;
    include_once 'cmenu.php';

    $cat_ID=$_GET['category'];
     
    
?>
<!-- background image class to apply css -->
<h1> View Products  
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
ORDER ID: <?php echo $order_id; echo '<br> '.$cart_msg; echo $update_msg; echo $del_msg; ?>






<div class="contentView">







<table class="viewProductTable" style="width:100%">
  <tr>
    <th>ID</th>
    <th>PRODUCT Name </th>
    <th>PRICE</th>
    
    <th>DESCRIPTION </th>
     
    <th> Action</th>
    <th> IMAGE</th>
    
  </tr>
  <?php 

  
    $sql = " select * from product where category= $cat_ID";
    if ($result = $link -> query($sql)) {
        while ($row = $result -> fetch_row()) {

       ?>
       <tr>
    <td> <?php echo $row[0]; ?> </td>
    <td> <?php echo $row[1];  ?> </td>
    <td> $ <?php echo $row[2];  ?>  </td>
 
    <td> <?php echo $row[4];  ?> </td>
     
    <td> 
            <form action="<?php echo $actual_link?>"  method="GET">   
                <input id="DontDisplay" name="category" value="<?php echo  $_GET['category'] ;?>"  > 
                <input id="DontDisplay" name="pid" value="<?php echo $row[0];?>"  >   
                <input id="DontDisplay" name="pname" value="<?php echo $row[1];?>"  >           
                <input id="DontDisplay" name="pprice" value="<?php echo $row[2];?>"  >           
                <input id="DontDisplay" name="pimage" value="<?php echo $row[7];?>"  >           
                <button type="submit" id="catBTN" name="addToCart" value='1' > Add to Cart</button>  
            </form>
            <br>
            <form action="productPage.php"  method="GET">   
                <button type="submit" id="catBTN" name="pid" value=" <?php echo $row[0];?> " > View Detail</button>  
               
            </form>
    </td>
    <td> <img class='viewProductImage' src="./upload/<?php echo $row[7];  ?>"  > </td>
  </tr>
  <?php



        }
        $result -> free_result();
       
      }  
?>

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

</table>






</div>





 

 


<?php   // Get menu code
    include_once 'footer.php'
?>
<br> 
</body>
</html>
