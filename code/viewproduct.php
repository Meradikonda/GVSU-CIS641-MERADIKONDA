

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

    // Get menu code
    include_once 'menu.php';

    $cat_ID=$_GET['category'];
    
    
?>
<!-- background image class to apply css -->
<h1> View Products  
</h1>

<div>
<?php

//DELETE FROM `product` WHERE `product`.`id` = 10003

if(isset($_GET['msg'])){
    echo "<div id='popup' > <b>".$_GET['msg']."</b></div > ";
}

if(isset($_GET['deleteProduct'])){

    
   
    $delID=$_GET['pid'];
    echo $delID;
    $sql = "DELETE FROM `product` WHERE `product`.`id` = $delID";
            if (mysqli_query($link, $sql)) {
                $delMsg='Deleted successfully';
                echo "<div id='popup' > <b>".$delMsg."</b></div > ";

            }
            else{
                $delMsg=" cannot delete the product";
                echo "<div id='popup' > <b>".$delMsg."</b></div > ";
            }

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


<h4> Stock in Low Quantity </h4>
<table class="viewProductTable" style="width:100%">
  <tr>
    <th>ID</th>
    <th>PRODUCT Name </th>
    <th>PRICE</th>
    <th> QUANTITY</th>
    <th>DESCRIPTION </th>
    <th>THRESHOLD </th>
    <th>CATEGORY </th>
    <th> Action</th>
    <th> IMAGE</th>
    
  </tr>
        </tr>
        <?php 

        
            $sql = " select * from product where category= '$cat_ID'";
            if ($result = $link -> query($sql)) {
                while ($row = $result -> fetch_row()) {
                    if ($row[5]>=$row[3] ){

                    
            ?>
            <tr>
            <td> <?php echo $row[0]; ?> </td>
            <td> <?php echo $row[1];  ?> </td>
            <td> $<?php echo $row[2];  ?>  </td>
            <td> <?php echo $row[3];  ?> </td>
            <td> <?php echo $row[4];  ?> </td>
            <td> <?php echo $row[5];  ?> </td>
            <td> <?php echo $row[6];  ?> </td>
            <td> 
                    <form action="updateproduct.php"  method="GET">
                    
                        <button type="submit" id="catBTN" name="pid" value=" <?php echo $row[0];?> " > Update</button>  

                          
                    
                    </form>
                    
                    
            </td>
            <td> <img class='viewProductImage' src="./upload/<?php echo $row[7];  ?>"  > </td>
        </tr>
        <?php     } 
               }
                $result -> free_result();            
            }  
        ?>






</table>



<br>





<h4> Total Stock </h4>
<table class="viewProductTable" style="width:100%">
  <tr>
    <th>ID</th>
    <th>PRODUCT Name </th>
    <th>PRICE</th>
    <th> QUANTITY</th>
    <th>DESCRIPTION </th>
    <th>THRESHOLD </th>
    <th>CATEGORY </th>
    <th> Action</th>
    <th> IMAGE</th>
    
  </tr>
  <?php 
$actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
  
    $sql = " select * from product where category= $cat_ID";
    if ($result = $link -> query($sql)) {
        while ($row = $result -> fetch_row()) {

       ?>
       <tr>
    <td> <?php echo $row[0]; ?> </td>
    <td> <?php echo $row[1];  ?> </td>
    <td> <?php echo $row[2];  ?>  </td>
    <td> <?php echo $row[3];  ?> </td>
    <td> <?php echo $row[4];  ?> </td>
    <td> <?php echo $row[5];  ?> </td>
    <td> <?php echo $row[6];  ?> </td>
    <td> 
            <form action="updateproduct.php"  method="GET">
              
                <button type="submit" id="catBTN" name="pid" value=" <?php echo $row[0];?> " > Update</button>  
               
            </form>
            <br>
            <form action="<?php echo $actual_link?>"  method="GET">   
            
                <input id="DontDisplay" name="category" value="<?php echo $cat_ID;?>"  >
                <input id="DontDisplay" name="pid" value="<?php echo $row[0];?>"  >          
                <button type="submit" id="catBTN" name="deleteProduct" value='1' > Delete</button>  
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
#popup{
    color: green;
    
    text-align: center;
    font-size: 20px;
}
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
