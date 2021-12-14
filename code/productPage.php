

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
    include_once 'cmenu.php';

   
    
?>
<!-- background image class to apply css -->
<h1> View Products  
</h1>

<div>

<div>





<?php 
 $id= $_GET['pid'];
 // get the  maximum id from product to make id for image
 $msql=" SELECT * FROM product where id=$id; ";
 if ($result = $link -> query($msql)) {
     while ($row = $result -> fetch_row()) {
          $pid=$row[0];
         $pName= $row[1] ;
         $pPrice= $row[2];
         $pQuantity= $row[3];
         $pDescription= $row[4] ;
         $pThreshold= $row[5] ;
         $pCategory=$row[6] ;        
         $pImage= $row[7] ;            
         $pStatus= $row[8] ;
     }
     $result -> free_result();
 }else{
    echo "something wrong";
  }
  

  
   
   ?>


<h3> <?php echo $pName; ?> </h3>

<div class="contentView">
<table class="viewProductTable" style="width:100%">

  <tr>
      <td> Name</th>
      <td> <?php echo $pName; ?></td>
    
  </tr> 
  <tr>
      <td> Price  </td>
      <td> $ <?php echo $pPrice  ;?> </td>

  </tr>
  <tr>
      <td> Description  </td>
      <td> <?php echo $pDescription ;?> </td>

  </tr>
  <tr>
      <td> Id </td>
      <td> <?php echo $pid ;?> </td>

  </tr>
  <tr>
      <td> Image  </td>
      <td> <img src="./upload/<?php echo $pImage ; ?>" height=150px><br></td>

  </tr>
   
   

</table>
   

</div>
<style>
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
td:nth-child(even) {
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
