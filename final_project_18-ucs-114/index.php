<?php
$con= mysqli_connect("127.0.0.1","sandeepgermanus","sandeep2000");
if(!$con)
{
	die ('Could not connect: '. $connect->connect_error);
}
mysqli_select_db($con,"sacrus");
$str= "SELECT COUNT(customer_id) AS count FROM customer";
$result = mysqli_query($con,$str) or die('SQL Error :: '.mysql_error($con));
$row = mysqli_fetch_assoc($result);
$count= $row['count'];
$str1= "SELECT COUNT(product_id) AS count1 FROM product";
$result1 = mysqli_query($con,$str1) or die('SQL Error :: '.mysql_error($con));
$row = mysqli_fetch_assoc($result1);
$count1= $row['count1'];
$str2= "SELECT COUNT(order_id) AS count2 FROM tblorder";
$result2 = mysqli_query($con,$str2) or die('SQL Error :: '.mysql_error($con));
$row = mysqli_fetch_assoc($result2);
$count2= $row['count2'];
?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {
  background:url(product_back2.jpeg) ; 
  background-size:1366px 768px;
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
<hr style="height:2px;border-width:0;color:white;background-color:black">
<div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <a href="products.php">Products</a>
  <a href="addorder.php">Add Order</a>
  <a href="manageorder.php">Manage Order</a>
  <a href="customerinfo.php">Customer Info</a>
  <a href="orderinfo.php">Order Infor</a>
  <a href="stockinfo.php">Stock Info</a>
  <a href="managestock.php">Manage Stock</a>
  <a href="stockalert.php">Stock Alert</a>
  <a href="logout.php">Logout</a>
</div>
<span style="font-size:30px;cursor:pointer;color:black;" onclick="openNav()">&#9776; Menu</span>
<hr style="height:2px;border-width:0;color:white;background-color:black">
<div class="main-content">
<h2>About The System</h2>
<p style="text-align:center;">Sacrus Handsculpts is a web application that is used for product </p>
<p>and order management in retail stores.It stores the information of the products in a </p>
<p> store and helps do business on them.The most significant operation is product  </p>
<p>management which ensures that a particular product is available for sale or not.  </p>
<p>This system allows the store’s owner to place the orders for the customer’s.</p>
<p>It also allows the store’s owner to manage all the order’s and stores the </p>
<p>information of the orders placed by a customer’s along with their details.</p>
<hr style="height:2px;border-width:0;color:black;background-color:black">
</div>
<script>
function openNav() {
  document.getElementById("mySidenav").style.width = "250px";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
}
</script>
   
</body>
</html> 
