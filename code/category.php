

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
    header("location: ./login.php");
}
 
?>
<body>



<?php 

    // Get menu code
    include_once 'menu.php'

     
?>
<!-- background image class to apply css -->
<div class="bg-image"></div>

<!-- background text class to apply css -->
<div class="bg-text">

<div class="title">

<style>
<style>
button#catBTN {
background: none;
color: black;
border: none;
 
padding: 15px 15px;
}
</style>
<h2><?php echo $_POST['category']; ?> </h2>
<form action="addproduct.php"  method="GET">
        <h4> 
          <button type="submit" id="catBTN" name="category" value=<?php echo $_POST['category']?>> Add Products</button>  
        </h4>
</form>
<form action="viewproduct.php"  method="GET">
    <h4> 
              <button type="submit" id="catBTN" name="category" value=<?php echo $_POST['category']?>> View Products</button>  
    </h4>
</form>
    
   

 
</div>
</div>

<?php   // Get menu code
    include_once 'footer.php'
?>
</body>
</html>
