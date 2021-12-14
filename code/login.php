<!-- Login page for customer, admin-->
<!DOCTYPE html>
<html lang="en">
<head>
<title>Registration Page</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- imported all the required bootstrap libraries -->
<link rel="stylesheet"
	href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script
	src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script
	src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

	

<!-- CSS Styles -->
<style>
			body, html {
			height: 100%;
			margin: 0;
			font-family: Arial, Helvetica, sans-serif;
			}


			* {
			box-sizing: border-box;
			}
			.text-center{
				size:10%;
				color: white;
				padding: 5px 20px;
				border: none;
				width: 100%;
				opacity: 0.9;
			}

			/* Full-width input fields */
			input[type=text], input[type=password] {
				width: 100%;
				padding: 10px;
				margin: 5px 0 22px 0;
				border: oval;
				background: #f1f1f1;
			}

			.bg-text {
			background-color: rgb(0,0,0); /* Fallback color */
			background-color: rgba(0,0,0, 0.4); /* Black w/opacity/see-through */
			font-weight: bold;
			position: absolute;
			top: 55%;
			left: 50%;
			transform: translate(-50%, -50%);
			width: 30%;
			height:80%;
			padding: 20px;
			text-align: left;
			}


			input[type=text]:focus, input[type=password]:focus {
				background-color: #ddd;
				outline: none;
			}

			/* Set a style for the submit button */
			.btn {
				background-color: #96CF6E;
				color: white;
				padding: 16px 20px;
				border: none;
				cursor: pointer;
				width: 100%;
				opacity: 0.9;
			}


			.navbar {
				margin-bottom: 0;
				border-radius: 0;
			}

			.btn:hover {
				opacity: 1;
			}

</style>
</head>





<?php
// Initialize the session


session_start();
 
// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
  header("location: ../home.php");
  exit;
}
 
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$username = $password = "";
$username_err = $password_err = "";


 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Check if username is empty
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter username.";
    } else{
        $username = trim($_POST["username"]);
    }
    
    // Check if password is empty
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter your password.";
    } else{
        $password = trim($_POST["password"]);
    }
    
	//echo $_POST["password"]; // remove after
    // Validate credentials
    if(empty($username_err) && empty($password_err)){
        // Prepare a select statement
        $sql = "SELECT id, username, password FROM admin WHERE username = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            // Set parameters
            $param_username = $username;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Store result
                mysqli_stmt_store_result($stmt);
                
                // Check if username exists, if yes then verify password
                if(mysqli_stmt_num_rows($stmt) == 1){                    
                    // Bind result variables
                    mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password);
                    if(mysqli_stmt_fetch($stmt)){
                        if(password_verify($password, $hashed_password)){
                            // Password is correct, so start a new session
                            session_start();
                            
                            // Store data in session variables
                            $_SESSION["loggedin"] = true;
                            //$_SESSION["id"] = $id;
                            $_SESSION["username"] = $username;    
							$_SESSION["usertype"]='admin';                        
                            
                            // Redirect user to welcome page
                            header("location:./home.php");
                        } else{
                            // Display an error message if password is not valid
                            $password_err = "The password you entered was not valid.";
                        }
                    }
                } else{
                    // Display an error message if username doesn't exist
                    $username_err = "No account found with that username.";
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
    
    // Close connection
    mysqli_close($link);
}
?>


<body>

<!-- BootStrap Navbar class to insert nav menu in header -->

<?php 

    // Get menu code
    include_once 'menu.php'
   
     
?>
<div class="bg-text">
	<!-- Upon submitting form by entering username and password, the login action will be performed	 -->
			<form action=<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>  method="post">

				<h1 class="text-center">Login</h1>

				<label for="username"><b>User Name</b></label> <input type="text"
					name="username" placeholder="Username" required="required">
					<span class="help-block"><?php echo $username_err; ?></span>

				<label for="password"><b>Password</b></label> <input type="password"
					name="password" placeholder="Password" required="required">
					<span class="help-block"><?php echo $password_err; ?></span>

	
				<br></br>

				<button type="submit" class="btn">Login</button>
				<br></br>
				<div class="bottom-action clearfix">
					<span style="color: white"></span>
				</div>
				<div>
				<span class="psw">If you forgot password please contact developers</span>
				</div>
				
				<div >
	<!-- If the user doesnot have an account , provide registration link >
					<p style="color: white" class="text-center">
						Don't have an account?
						<a href="#"> <span
								class="glyphicon glyphicon-log-in"></span> Register Here</a>
					</p>
				</div -->
			</form>
</div>
</div><br>
<?php   // Get footer code
    include_once 'footer.php'
?>

</body>
</html>
