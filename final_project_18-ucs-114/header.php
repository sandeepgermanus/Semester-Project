<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
 body{
   background:url(product_back2.jpeg) ; 
  background-repeat: no-repeat;
  background-attachment: fixed;
  background-size: cover;
  font-family: "Lato", sans-serif;
}
.header {
  width: 100%;
  height: 80px;    
  text-align: center;
  background: none;
  color: black;
  font-size: 20px;
}
.main-content{
	text-align: center;
 color: black;
 font-size: 20px;
}
.sidenav {
  height: 100%;
  width: 0;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  background-color: #579191;
  overflow-x: hidden;
  transition: 0.5s;
  padding-top: 0px;
}

.sidenav a {
  padding: 8px 8px 8px 32px;
  text-decoration: none;
  font-size: 25px;
  color: #6cc4c4;
  display: block;
  transition: 0.3s;
}

.sidenav a:hover {
  color: #f1f1f1;
}

.sidenav .closebtn {
  position: absolute;
  top: 0;
  right: 25px;
  font-size: 36px;
  margin-left: 50px;
}

@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}
</style>
</head>
<body>
<div class="header">
<h1>Sacrus Handsculpts</h1>
</div>
<div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <a href="products.php">Products</a>
  <a href="addorder.php">Add Order</a>
  <a href="manageorder.php">Manage Order</a>
  <a href="customerinfo.php">Customer Information</a>
  <a href="orderinfo.php">Order Information</a>
  <a href="stockinfo.php">Stock Information</a>
  <a href="managestock.php">Manage Stock</a>
  <a href="stockalert.php">Stock Alert</a>
  <a href="logout.php">Logout</a>
</div>
<span style="font-size:30px;cursor:pointer;color:black;" onclick="openNav()">&#9776; Menu</span>
<script>
function openNav() {
  document.getElementById("mySidenav").style.width = "250px";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
}
</script>

   

