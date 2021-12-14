<!-- BootStrap Navbar class to insert nav menu in header -->
<nav class="navbar navbar-inverse">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse"
					data-target="#myNavbar">
					<span class="icon-bar"></span> <span class="icon-bar"></span> <span
						class="icon-bar"></span>
				</button>
				<h3 class="navbar-text "><a class="logotitle"  href="index.php" >Electronic Warehouse Inventory </a></h3>
			</div>
<style>
button#menuBTN {
background: none;
color: black;
border: none;
width:100%;
 
display: block;
padding: 3px 20px;
clear: both;
font-weight: 400;
line-height: 1.42857143;
color: #333;
white-space: nowrap;
 
}

a.logotitle{
background: none;
color: white;
text-decoration: none;
}
a.logotitle:hover{
background: none;
color: white;
text-decoration: none;
}
li#liCAT {
    display: block;
    width: 100%;
    text-align: left;
}
a#menuBTN {
    display: block;
    width: 100%;
    color: black;
    padding: 10px;
}

</style>
            <form action="./category.php"  method="post">
                    <div class="collapse navbar-collapse " id="myNavbar">

                        <ul class="nav navbar-nav navbar-right">
                             
                                    <?php
                                            if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
                                                echo ' <li> <a href="viewFeedback.php"><span class="glyphicon form-control-feedback"></span> View Feedback  </a></li>';
                                                echo ' <li> <a href="#"><span class="glyphicon glyphicon-user"></span> Welcome '.$_SESSION["username"].'</a></li>';
                                                echo '<li> <a href="logout.php">  <span  class="glyphicon glyphicon-log-in"></span> Logout</a></li>' ;
                                            }
                                    ?>
                        </ul>
                    </div>
            </form>
</div>  
</nav>
<?php 
include_once 'config.php';
//----------------------------------------------------------------------------------

$oid=0;
$v=0;

if(isset($_GET['approveOrder'])){
    $oid= $_GET['order_ID'];
    $v= $_GET['approveOrder'];

}

if(isset($_GET['declineOrder'])){
    $oid= $_GET['order_ID'];
    $v= $_GET['declineOrder'];
}


if($v!=0 and $oid!=0){

    //echo $v.$oid;
    $u_sql= " 
             UPDATE `orders` SET `approve_status` = '$v' WHERE `orders`.`order_id` = '$oid'; 
    ";

    if (mysqli_query($link, $u_sql)) {
        $order_status_msg= 'Order status updated !';
    }else{
        $order_status_msg= 'Error updating status !';
    }

    if($v==1){
        //echo ' we need to update the stock';
        // double query 

        
        $sql_1=" 
        SELECT * FROM order_details where order_id='$oid';
        ";
        if ($result = $link -> query($sql_1)) {
            while ($row = $result -> fetch_row()) {
                
                
                $PID=$row[3];
                $QUAN=$row[6];
            
            
                $sql_2= " SELECT quantity FROM `product` WHERE id='$PID' ";
                if ($re_2 = $link -> query($sql_2)) {
                    while ($row_2 = $re_2 -> fetch_row()) {
                        
                        $Quantity=$row_2[0];
                        

                    } 
                    
                    $re_2 -> free_result();
                }
                
                $Q= $Quantity-$QUAN;
                //echo 'Product id:'.$row[3].':  quantity '.$row[6].'-'.$Quantity.'-'.$Q.' <br>'  ; 

                $sql_3= " UPDATE `product` SET `quantity` = '$Q' WHERE `product`.`id` = $row[3] ;
                ";

                if (mysqli_query($link, $sql_3)) {
                    $stock_update_message= 'STOCK UPDATED SUCCESSFULLY ';
                }else{
                    $stock_update_message= 'STOCK DID NOT UPDATE';
                }

                
            }
            $result -> free_result();
        }







        //--------------

    }
    
}


$orderCount=0;

$view_sql=" SELECT * FROM `orders` WHERE cart_status='1' and approve_status='0'  order by order_id DESC; ";
if ($result = $link -> query($view_sql)) {
    while ($row = $result -> fetch_row()) {
        $orderCount=$orderCount +1;
    }
}


























// ---------------------------------------------------------------------------------------

if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
 echo '
        <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <ul class="nav navbar-nav">
            <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Menu<span class="caret"></span></a>
                <ul class="dropdown-menu">

                <li class="dropdown-submenu">
                    <form action="./viewproduct.php"  method="get">  
                            <a class="test"  id="menuBTN" tabindex="-1" href="#">Product Categories <span class="caret"></span></a>
                                <ul class="nav navbar-nav navbar-right">
                                    <li id="liCAT"><button type="submit" id="menuBTN" name="category" value="1"> Mobiles</button> </li>                        
                                    <li id="liCAT"><button type="submit" id="menuBTN" name="category" value="2">Tablets </button> </li>
                                    <li id="liCAT"><button type="submit" id="menuBTN" name="category" value="3" > Laptops</button> </li>
                                    <li id="liCAT"><button type="submit" id="menuBTN" name="category" value="4"> Desktops</button> </li>
                                    <li id="liCAT"><button type="submit" id="menuBTN" name="category" value="5"> Cameras</button> </li>
                                    <li id="liCAT"><button type="submit" id="menuBTN" name="category" value="6"> Printers</button> </li>
                                    
                                </ul>
                    </form>
                </li>
                <li><a  id="menuBTN" href="addproduct.php">Add New Products</a></li>
                <li><a  id="menuBTN" href="orders.php">Orders</a></li>


                </ul><li > <a href="orders.php">  <span  class="glyphicon glyphicon glyphicon-bell"></span>
                '; if($orderCount>0){
                    echo ' Pending Orders: '.$orderCount.'';
                    }
                echo ' </a></li>
            </li>
            <li> 
            
             
            <form action="search.php"  method="GET">
                        <input type="text" name="keyword" placeholder="Search..">
                        <button type="submit" id="catBTN"   value="" >Search</button>  

                          
                    
            </form>
            
            
            
            </li>
            </ul>
        </div>
        </nav>
        ';
}
?>
<script>
$(document).ready(function(){
  $('.dropdown-submenu a.test').on("click", function(e){
    $(this).next('ul').toggle();
    e.stopPropagation();
    e.preventDefault();
  });
});
</script>
