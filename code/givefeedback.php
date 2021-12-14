

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

// Orders and Add to Cart
 




    $feedback_msg='';
    include_once 'cmenu.php';

    //$cat_ID=$_GET['category'];
     
    
?>
<!-- background image class to apply css -->
<h1> 
</h1>

<div>
<form class='formstyle' action=<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?> method="post" enctype='multipart/form-data'>
			<h1 class="text-center">Send Feedback </h1>
             
             <?php echo $feedback_msg.'<br>'; ?>
             

            <label for="orgname"><b>Subject</b></label>
			<input type="text"  reuquired="required" placeholder="" name='subject'>

            <label for="orgname"><b>Product Name</b></label>
			<input type="text"  reuquired="required" placeholder="" name='productname'>

            <label for="orgname"><b>Description</b></label>
			<input type="text"  reuquired="required" placeholder="" name='description'>

            <button type="submit" name="submitFeedback" class="btn">Submit Feedback</button>

</form>

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
    background-color:rgba(0, 0, 0, 0.4);
    font-weight: bold;
     
     
    bottom: auto;
     
    width: 30%;
    height: auto;
    max-height: 200%;
    padding: 20px;
    text-align: left;}
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








 

 


<?php   // Get menu code
    include_once 'footer.php'
?>
<br> 
</body>
</html>
