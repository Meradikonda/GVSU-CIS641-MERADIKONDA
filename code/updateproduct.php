

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
//if(issset($_GET['pid'])){
    $id= $_GET['pid'];
    // get the  maximum id from product to make id for image
    $msql=" SELECT * FROM product where id=$id; ";
    if ($result = $link -> query($msql)) {
        while ($row = $result -> fetch_row()) {
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
    }
    

//} 




if(isset($_POST["updateProductSubmit"]) ){
 
        $id=$_POST['pid'];
        $n= $_POST['productname'] ;
        $p=  $_POST['price'] ;
        $q= $_POST['quantity'] ;
        $d=$_POST['description']; 
        $t=$_POST['threshold'];
        $i= $_POST['catID'];
        $stat=$_POST['status'];

        

        $img_name = $_FILES['file']['name'];
        
        $target_dir = "upload/";
        $target_file = $target_dir . basename($_FILES["file"]["name"]);

        // Select file type
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

        // Valid file extensions
        $extensions_arr = array("jpg","jpeg","png","gif");
        $new_name=strval($_POST['pid']).'.'.$imageFileType;
        echo "new name is: ".strval( $new_name);

        //echo $new_name;
        // Check extension
        if( in_array($imageFileType,$extensions_arr) ){
        
            // Insert record
            
        
            // Upload file
            move_uploaded_file($_FILES['file']['tmp_name'],$target_dir.$new_name);

        }
            // UPDATE `product` SET `name` = 'Google glasses', `price` = '99.25', `quantity` = '90' WHERE `product`.`id` = 10000;
            //echo $id, $n, $p, $q, $d, $t, $i ,$new_name ;
            if(!empty($img_name)){
                $sql="UPDATE `product` SET 
                `name` = '$n', 
                `price`= '$p', 
                `quantity`='$q', 
                `description`='$d', 
                `threshold`='$t', 
                `category`='$i',
                `image`='$new_name',
                `status`='$stat'
                
                 WHERE  `product`.`id`='$id' ; ";
            
            }
            else{

                $sql="UPDATE `product` SET 
                `name` = '$n', 
                `price`= '$p', 
                `quantity`='$q', 
                `description`='$d', 
                `threshold`='$t', 
                `category`='$i',
               
                `status`='$stat'
                
            WHERE  `product`.`id`='$id' ; ";
            }
           
                    

            if (mysqli_query($link, $sql)) {
                $msg= "RECORD UPDATED SUCCESSFULLY";
                    if ($i==1){  $ct= 'Mobile';    } 
                    if ($i==2){  $ct='Tablets';    }
                    if ($i==3){  $ct= 'Laptop';    }
                    if ($i==4){  $ct= 'Desktops';    }
                    if ($i==5){ $ct= 'Cameras';    }
                    if ($i==6){  $ct='Printers';    }
                header("location: ./viewproduct.php?category=$i&msg=$msg");
            }
            else {
                echo "Error: " . $sql . "<br>" . mysqli_error($link);
                $msg="Something went wrong";
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
			<h1 class="text-center">UPDATE Products </h1>
            <?php
                    if(isset($msg)){
                            echo '  <br> <h2>'.$msg.' </h2> Goto: <a href=" " >View Product Page</a> <br> ';
                    }
            ?>

            <label for="orgname"><b>Id</b></label>
			<input type="text" name="pid" reuquired="" placeholder="<?php echo $id;?>" value="<?php echo $id ; ?>">

			<label for="orgname"><b>Name of the product</b></label>
			<input type="text" name="productname" reuquired="required" value="<?php echo $pName ; ?>">

			<label for="regnumber"><b>Price</b></label>
			<input type="text" name="price" required="required" value="<?php echo  $pPrice; ?>">


			<label for="userName"><b>Product Quantity</b></label>
			<input type="text" name="quantity" required="required" value="<?php echo $pQuantity; ?>">

			<label for="email"><b>Minimum Quantity Threshold</b></label>
			<input type="text" name="threshold" required="required" value="<?php echo  $pThreshold ;?>">

			<label for=" "><b>Description</b></label>
			<input type="text"  name="description" required="required" value="<?php echo $pDescription ; ?>">
            
            
            <label for=" "><b>Status: 0 To Hide Product, 1 To Show Product</b></label>
			<input type="text"  name="status" required="required" value="<?php echo $pStatus ; ?>">

            
           
             
            
            <label for="password"><b>Current Category: </b></label>
            <?php
                    if ($pCategory==1){  echo 'Mobiles';    } 
                    if ($pCategory==2){  echo 'Laptops';    }
                    if ($pCategory==3){  echo 'Tablets';    }
                    if ($pCategory==4){  echo 'Cameras';    }
                    if ($pCategory==5){  echo 'Printers';    }
                    if ($pCategory==6){  echo 'Desktops';    }

                ?>
            <br>
            <label for="password"><b>Update Category: </b></label>
            <select id="catOption" name="catID" default="Tablets">
                <option value="1">Mobile</option>
                <option value="2">Tablets</option>
                <option value="3">Laptops</option>
                <option value="4">Desktops</option>
                <option value="5">Cameras</option>                
                <option value="6">Printers</option>
                
                 
                
            </select>
            Current Image:
            <img src="./upload/<?php echo $pImage ; ?>" height=50px><br>
            <label for=""><b>Please select an image</b></label>
             <input type='file' name='file' />


            <button type="submit" name="updateProductSubmit" class="btn">Update Product</button>
			 

 
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
    background-color:rgba(0, 0, 0, 0.4);
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
