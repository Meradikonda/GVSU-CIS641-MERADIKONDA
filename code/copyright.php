<!DOCTYPE html>
<html>
<head>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet"
	href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script
	src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script
	src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<!-- CSS Styles  -->
<style>
body, html {
  height: 100%;
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
}

* {
  box-sizing: border-box;
}

/* Position text in the middle of the page/image */
.bg-text {
  background-color: rgb(1,0,0); /* Fallback color */
  background-color: rgba(0,0,0, 0.1); /* Black w/opacity/see-through */
  color: red;
  font-weight: bold;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  z-index: 2;
  width: 80%;
  padding: 20px;
  text-align: center;
  animation: animate
                3s linear infinite;
}

.navbar {
	margin-bottom: 0;
	border-radius: 0;
}

h2 {
  text-transform: uppercase;

  font-size: 3rem;
  color: black;
  white-space: nowrap;
}
h4 {
  color:black;
  font-size: 2rem;

}

/* Set gray background color and 100% height */
.sidenav {
	padding-top: 20px;
	background-color: #f1f1f1;
	height: 100%;
}
.dropdown-submenu {
  position: relative;
}

.dropdown-submenu .dropdown-menu {
  top: 0;
  left: 100%;
  margin-top: -1px;
}

</style>
</head>
<body>
<?php 

    // Get menu code
    include_once 'menu.php'

     
?>


<!-- background text class to apply css -->
<div class="bg-text">
<div class="title">
<img src="copyright1.png" alt="copyright" style="width:15%" align="center">
  <h2 align="center">COPYRIGHTS</h2>
 <h4> All rights reserved. No part of this web application may be reproduced or used in any manner without written permission of the copyright owner.</h4>
</div>
</div>

<?php   // Get menu code
    include_once 'footer.php'
?>
</body>
</html>
