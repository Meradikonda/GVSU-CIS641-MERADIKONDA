<!-- BootStrap Navbar class to insert nav menu in header -->
<nav class="navbar navbar-inverse">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse"
					data-target="#myNavbar">
					<span class="icon-bar"></span> <span class="icon-bar"></span> <span
						class="icon-bar"></span>
				</button>
				<h3 class="navbar-text "><a class="logotitle"  href="home.php" >Electronic Warehouse Inventory </a></h3>
			</div>
<style>
button#menuBTN {
background: none;
color: white;
border: none;
position: relative;
display: block;
padding: 15px 15px;
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

</style>
            <form action="./category.php"  method="post">
                    <div class="collapse navbar-collapse " id="myNavbar">

                        <ul class="nav navbar-nav navbar-right">
                        <li><button type="submit" id="menuBTN" name="category" value="Mobile"> Mobiles</button> </li>                        
                        <li><button type="submit" id="menuBTN" name="category" value="Tablets">Tablets </button> </li>
                        <li><button type="submit" id="menuBTN" name="category" value="Laptop" > Laptops</button> </li>
                        <li><button type="submit" id="menuBTN" name="category" value="Desktops"> Desktops</button> </li>
                        <li><button type="submit" id="menuBTN" name="category" value="Cameras"> Cameras</button> </li>
                        <li><button type="submit" id="menuBTN" name="category" value="Printers"> printers</button> </li>
                        <li><button type="submit" id="menuBTN" name="category" value="Vaccum"> Vaccumm</button> </li>
                        <li><button type="submit" id="menuBTN" name="category" value="Washingmachine"> Washing Machine</button> </li>
                            <li><a href="#"><span class="glyphicon glyphicon-user"></span> <?php echo 'Welcome '.$_SESSION["username"]; ?></a></li>
                            <li><a href="logout.php"><span
                                    class="glyphicon glyphicon-log-in"></span> Logout</a></li>
                        </ul>
                    </div>
            </form>
</div>  
</nav>
