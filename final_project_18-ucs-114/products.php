<!DOCTYPE HTML>
<html>
<head>
<style>
* {
  box-sizing: border-box;
}

.column {
  float: left;
  width: 33.33%;
  padding: 5px;
}

.row::after {
  content: "";
  clear: both;
  display: table;
}
img {
width: 300px;
height: 200px;
}
input[type=submit] {
  width:50%;
  background-color:#6a9299;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[type=submit]:hover {
  background-color: #6a9299;
}

</style>
</head>
<body>
<?php require_once 'header.php'?>
<h2 style="color: black;">PRODUCTS</h2>

<div class="row">
  <div class="column">
    <img src="img/1.jpeg" alt="PRODUCTS" >
	<br>
	<form  method="post" action="result.php">
	<input class="button" type="submit" value="Hexagon Tray" name="item">
	</form>
	</div>
  <div class="column">
    <img src="img/2.jpeg" alt="PRODUCTS" >
	<br>
	<form  method="post" action="result.php">
	<input class="button" type="submit" value="Mountain Table" name="item">
	</form>
  </div>
  <div class="column">
    <img src="img/3.jpeg" alt="PRODUCTS" >
	<form  method="post" action="result.php">
	<input class="button" type="submit" value="Cheese Board" name="item">
	</form>
  </div>
</div>


<div class="row">
  <div class="column">
    <img src="img/4.jpeg" alt="PRODUCTS" >
	<br>
    <form  method="post" action="result.php">
	<input class="button" type="submit" value="Coasters" name="item">
	</form>
	</div>
  <div class="column">
    <img src="img/5.jpeg" alt="PRODUCTS" >
	<br>
    <form  method="post" action="result.php">
	<input class="button" type="submit" value="Circular Board" name="item">
	</form>
  </div>
  <div class="column">
    <img src="img/6.jpeg" alt="PRODUCTS" >
	<br>
    <form  method="post" action="result.php">
	<input class="button" type="submit" value="Serving Tray" name="item">
	</form>
  </div>
</div>


<div class="row">
  <div class="column">
    <img src="img/7.jpeg" alt="PRODUCTS" >
	<br>
    <form  method="post" action="result.php">
	<input class="button" type="submit" value="Star Candle Holder" name="item">
	</form>
	</div>
  <div class="column">
    <img src="img/8.jpeg" alt="PRODUCTS" >
	<br>
    <form  method="post" action="result.php">
	<input class="button" type="submit" value="Tri Candle Holder" name="item">
	</form>
  </div>
  <div class="column">
    <img src="img/9.jpeg" alt="PRODUCTS" >
	<br>
    <form  method="post" action="result.php">
	<input class="button" type="submit" value="Cheese Tray" name="item">
	</form>
  </div>
</div>


<div class="row">
  <div class="column">
    <img src="img/10.jpeg" alt="PRODUCTS" >
	<br>
    <form  method="post" action="result.php">
	<input class="button" type="submit" value="Desk Organizer" name="item">
	</form>
	</div>
  <div class="column">
    <img src="img/11.jpeg" alt="PRODUCTS" >
	<br>
    <form  method="post" action="result.php">
	<input class="button" type="submit" value="Picture Frames" name="item">
	</form>
  </div>
  <div class="column">
    <img src="img/12.jpeg" alt="PRODUCTS" >
	<br>
    <form  method="post" action="result.php">
	<input class="button" type="submit" value="Plant Holder" name="item">
	</form>
  </div>
</div>


<div class="row">
  <div class="column">
    <img src="img/13.jpeg" alt="PRODUCTS" >
	<br>
    <form  method="post" action="result.php">
	<input class="button" type="submit" value="Cake Stand" name="item">
	</form>
	</div>
  <div class="column">
    <img src="img/14.jpeg" alt="PRODUCTS" >
	<br>
    <form  method="post" action="result.php">
	<input class="button" type="submit" value="Chevron CoffeeTable" name="item">
	</form>
  </div>
  <div class="column">
    <img src="img/15.jpeg" alt="PRODUCTS" >
	<br>
    <form  method="post" action="result.php">
	<input class="button" type="submit" value="Bottle Rack" name="item">
	</form>
  </div>
</div>

</body>
</html>