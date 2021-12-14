

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

    echo $_POST['category'];
     
    

?>


<?php 

    // Get menu code
    include_once 'menu.php'

     
?>
<!-- background image class to apply css -->
 
 
<!-- background text class to apply css -->
 

 
 
 <div class="formstyle">
  
 <form action=<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?> method="post">
			<h1 class="text-center">Add <?php echo $_POST['category']; ?> Products </h1>

            <label for="orgname"><b>Product Id</b></label>
			<input type="text" name="id" reuquired="required">

			<label for="orgname"><b>Name of the product</b></label>
			<input type="text" name="productname" reuquired="required">

			<label for="regnumber"><b>Price</b></label>
			<input type="text" name="price" required="required">


			<label for="userName"><b>Product Quantity</b></label>
			<input type="text" name="username" required="required">

			<label for="email"><b>Minimum Quantity Threshold</b></label>
			<input type="text" name="quantity" required="required">

			<label for="password"><b>Description</b></label>
			<input type="text"  name="threshold" required="required">
            
            <label for="password"><b>Category</b></label>
            <select id="catOption" name="category">
                <option value="1">Mobile</option>
                <option value="3">Tablets</option>
                <option value="2">Laptops</option>
                <option value="8">Desktops</option>
                <option value="4">Cameras</option>
                <option value="5">Printers</option>
                <option value="6">Vaccum</option>
                <option value="7">Washing Machine</option>
                
            </select>
            <button type="submit" class="btn">Add</button>
			 

 
</div>
 
<style>
    #catOption{
        width: 100%;
    height: 5% padding: 5px;
    margin: 4px 0 15px 0;
    border: oval;
    background: #f1f1f1;
    }
.formstyle {
    background-color: rgb(0, 0, 0);
    background-color: rgb(28 82 234 / 55%);
    font-weight: bold;
     
     
    bottom: auto;
     
    width: 30%;
    height: auto;
    max-height: 200%;
    padding: 20px;
    text-align: left;}
</style>

<?php   // Get menu code
    include_once 'footer.php'
?>
<br> 
</body>
</html>
