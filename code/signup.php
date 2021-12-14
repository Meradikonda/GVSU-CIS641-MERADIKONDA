

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



?>
<body>
<?php
 

if(isset($_POST["createprofile"]) ){
 //INSERT INTO `customer` (`id`, `organization`, `regNumber`, `username`, `email`, `password`, `address`, `phone`, `personName`, `personEmail`, `personPhone`) 
//VALUES ('1', 'UNH', '123', 'unh', 'un@unh.edu', 'pass', 'Boston Post road', '2032032222', 'Bibek', 'Bibek@gmail.com', '475655972');
        $o=$_POST['organization'];
        $r=$_POST['regNumber'];
        $u=$_POST['username'];
        $e=$_POST['email'];
        $password=$_POST['password'];
        $pwd = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash
        //echo $p;
        $a=$_POST['address'];
        $ph=$_POST['phone'];
        $pn=$_POST['personName'];
        $pe=$_POST['personEmail'];
        $pp=$_POST['personPhone'];

        


    
            $sql="INSERT INTO `customer` ( `organization`, `regNumber`, `username`, `email`, `password`, `address`, 
                                `phone`, `personName`, `personEmail`, `personPhone`) 
                     VALUES ( '$o', '$r', '$u', '$e', '$pwd', '$a','$ph', '$pn', '$pe', '$pp'); " ;

            if (mysqli_query($link, $sql)) {
                $msg= "New Profile created successfully";
				$flag = true;
            }
            else {
                echo "Error: " . $sql . "<br>" . mysqli_error($link);
                $msg= " Username already exists. Please try new username";
            }
             
}

?>


<?php 

    // Get menu code
    include_once 'menu.php'

     
?>
<!-- background image class to apply css -->
 
 
<!-- background text class to apply css -->
 

 
 
 <div class="formstyle">
  
 <form action=<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?> method="post" enctype='multipart/form-data'>
			<h1 class="text-center">Create Customer Profile </h1>
            <?php
                    if(isset($msg)){
                            echo '  <br> <h2> '.$msg.' </h2>  <br> ';
                    }
					if(isset($flag)){
						 echo '  <br> <h2> Click here to <a href="clogin.php " > Login</a> </h2>  <br> ';
					}
            ?>

            <label for="orgname"><b>Name of the organization</b></label>
			<input type="text" name="organization" reuquired="required">

			<label for="orgname"><b>Organization Registration Number</b></label>
			<input type="text" name="regNumber" reuquired="required">

			<label for=" "><b>  User Name </b></label>
			<input type="text" name="username" required="required">


			<label for=" "><b>  Email Id  </b></label>
			<input type="text" name="email" required="required">

			<label for=" "><b> Password </b></label>
			<input type="password" name="password" required="required">

			<label for=" "><b> Enter the address  </b></label>
			<input type="text"  name="address" required="required">
            
            <label for="password"><b>  Phone Number  </b></label>
			<input type="text"  name="phone" required="required">
             
            <label for="password"><b> Contact Person   </b></label>
			<input type="text"  name="personName" required="required">
                 
            <label for="password"><b> Contact Person Email   </b></label>
			<input type="text"  name="personEmail" required="required">
                
            <label for="password"><b> Contact person Phone Number   </b></label>
			<input type="text"  name="personPhone" required="required">   

            <button type="submit" name="createprofile" class="btn">Sign Up</button>
			        

 
</div>
<br><br><br>
 
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
    background-color: rgba(0, 0, 0, 0.4);
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
