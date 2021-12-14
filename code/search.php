

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
 




 
    include_once 'menu.php';

    $cat_ID=$_GET['category'];
     
    
?>
<!-- background image class to apply css -->
<h1> New Arrival
</h1>

<div>


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
            $count=0;
            $keyword=$_GET['keyword'];
        
            $sql = " select * from product where name like '%$keyword%' OR description like '%$keyword%' or category_name like '%$keyword%'  order by id DESC ";
          
            
            if ($result = $link -> query($sql)) {
                while ($row = $result -> fetch_row()) {
                    $count=$count+1;
                    if ($count<3 ){
                    
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
