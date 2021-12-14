

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

<link rel="stylesheet" href="myhome.css">
 
</head>


<?php
 
// Initialize the session
session_start();
 
// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
  //header("location: /home.php");
  //echo 'this is home ';
  //exit;
}
else{
    header("location: ./clogin.php");
}
 
?>
<body>



<?php 

    // Get menu code
    include_once 'cmenu.php';
   
     
?>
<!-- background image class to apply css -->
<div class="bg-image"></div>

<!-- background text class to apply css -->
<div class="bg-text">

<div class="title">
  <h2>Welcome <?php echo $_SESSION['username'];?> To Electronic Warehouse Invertory System</h2>
  <br></br>
 <h4> Online  Electronic Warehouse Invertory System offers great flexibility to all the customers for easy ordering and buying of various electronic products.</h4>

 <h4>Our Website offer great convenience and access to a variety of electronic products</h4>
</div>
</div>

<?php   // Get menu code
    include_once 'footer.php'
?>
</body>
</html>
