

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

// get the  maximum id from product to make id for image
$msql=" SELECT MAX(id) FROM product; ";

if ($res = $link -> query($msql)) {
    while ($row1 = $res -> fetch_row()) {
    $id= $row1[0]+1;
    }
}  


if(isset($_POST["addProductSubmit"]) ){
 
        //$id=$_POST['pid'];
        $n= $_POST['productname'] ;
        $p=  $_POST['price'] ;
        $q= $_POST['quantity'] ;
        $d=$_POST['description']; 
        $t=$_POST['threshold'];
        $i= $_POST['catID'];

        $img_name = $_FILES['file']['name'];
        
        $target_dir = "upload/";
        $target_file = $target_dir . basename($_FILES["file"]["name"]);

        // Select file type
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

        // Valid file extensions
        $extensions_arr = array("jpg","jpeg","png","gif");
        $new_name=$_POST['pid'].'.'.$imageFileType;

        //echo $new_name;
        // Check extension
        if( in_array($imageFileType,$extensions_arr) ){
        
            // Insert record
            
        
            // Upload file
            move_uploaded_file($_FILES['file']['tmp_name'],$target_dir.$new_name);

        }
        $category_name='';
        if ($i==1){ $category_name="mobile";    }
        if ($i==2){ $category_name="tablets";    }
        if ($i==3){ $category_name="laptops";    }
        if ($i==4){ $category_name="desktops";    }
        if ($i==5){ $category_name="cameras";    }
        if ($i==6){ $category_name="printers";    }
        echo $t;
        echo '------';
        echo $category_name;
        


    
            $sql="INSERT INTO `product` ( `id`,`name`, `price`, `quantity`, `description`, `threshold`, 
            `category`,`image`,`status`,`category_name`) 
                    VALUES ('$id', '$n', '$p', '$q', '$d', '$t', '$i' ,'$new_name','1', '$category_name' ); " ;

            if (mysqli_query($link, $sql)) {
                $msg= "New record added successfully";
            }
            else {
                //echo "Error: " . $sql . "<br>" . mysqli_error($link);
                $msg="Product ID must be unique, please enter other product id";
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
			<h1 class="text-center">Add New Products </h1>
            <?php
                    if(isset($msg)){
                            echo '  <br> <h2>'.$msg.' </h2>  <br> ';
                    }
            ?>

            <label for="orgname"><b>Id</b></label>
			<input type="text"  reuquired="" placeholder="<?php echo $id;?>">

			<label for="orgname"><b>Name of the product</b></label>
			<input type="text" name="productname" reuquired="required">

			<label for="regnumber"><b>Price</b></label>
			<input type="text" name="price" required="required">


			<label for="userName"><b>Product Quantity</b></label>
			<input type="text" name="quantity" required="required">

			<label for="email"><b>Minimum Quantity Threshold</b></label>
			<input type="text" name="threshold" required="required">

			<label for="password"><b>Description</b></label>
			<input type="text"  name="description" required="required">
            
            <label for="password"><b>Category</b></label>
            <select id="catOption" name="catID">
                <option value="1">Mobile</option>
                <option value="2">Tablets</option>
                <option value="3">Laptops</option>
                <option value="4">Desktops</option>
                <option value="5">Cameras</option>
                <option value="6">Printers</option>
                 
                
            </select>
            <label for="password"><b>Please select an image</b></label>
             <input type='file' name='file' />
            <button type="submit" name="addProductSubmit" class="btn">Add</button>
			 

 
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
