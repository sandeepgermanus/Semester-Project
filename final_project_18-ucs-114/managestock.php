<?php
$con= mysqli_connect("127.0.0.1","sandeepgermanus","sandeep2000");
$message=null;
$message1=null;
$message2=null;
if(!$con)
{
	die ('Could not connect: '. $connect->connect_error);
}
mysqli_select_db($con,"sacrus");
if((isset($_POST['addnew_product']))){
$prod = $_POST['product_name'];
$quant = $_POST['quantity'];
$price = $_POST['price'];
$sql_str2="INSERT INTO product(product_name,quantity,product_price) VALUES ('$prod','$quant','$price')";
if (!mysqli_query($con,$sql_str2))
{
	die ('Error: ' .mysqli_error($con));
}
$message="Note: Added Product Successfully!!!";
}
if((isset($_POST['update_product']))){
$prod1 = $_POST['product1_name'];
$quant1 = $_POST['quantity1'];
$price1 = $_POST['price1'];
$sql_str3="UPDATE product SET quantity= quantity +'$quant1' WHERE product_name='$prod1'";
if (!mysqli_query($con,$sql_str3))
{
	die ('Error: ' .mysqli_error($con));
}
$sql_str4="UPDATE product SET product_price='$price1' WHERE product_name='$prod1'";
if (!mysqli_query($con,$sql_str4))
{
	die ('Error: ' .mysqli_error($con));
}
$message1="Note: Updated Product Successfully!!!";
}
if((isset($_POST['delete_product']))){
$prod2 = $_POST['product2_name'];
$sql_str4="DELETE FROM product WHERE product_name='$prod2'";
if (!mysqli_query($con,$sql_str4))
{
	die ('Error: ' .mysqli_error($con));
}
$message2="Note: Deleted Product Successfully!!!";
}
$sql_str0 = "SELECT product_name FROM product";
$result = mysqli_query($con,$sql_str0) or die('SQL Error :: '.mysqli_error($con));
?>
<!DOCTYPE HTML>
<html>
<head>
<link rel="stylesheet" type="text/css" href="test6.css">
</head>
<body>
<?php require_once 'header.php';?>
<h3>Add New Product</h3>
<hr style="height:2px;border-width:0;color:white;background-color:white">
<div class="container">
<form method="post" action="<?=$_SERVER['PHP_SELF'];?>">
<label for="productname">Product Name</label>
    <input type="text" id="product_name" name="product_name" placeholder="Product name.." required oninvalid="this.setCustomValidity('*Product Name is required.')" onchange="this.setCustomValidity('')">
<label for="customername">Quantity</label>
    <input type="number" id="quantity" name="quantity" placeholder="Quantity.." required oninvalid="this.setCustomValidity('*Quantity is required.')" onchange="this.setCustomValidity('')">
<label for="customername">Price</label>
    <input type="number" id="price" name="price" placeholder="Price..">
<input type="submit" name= "addnew_product" value="Add New Product">
</form>
<div class="message"><?php if($message!="") { echo $message; } ?></div>
</div>
<h3>Update Product</h3>
<hr style="height:2px;border-width:0;color:white;background-color:white">
<div class="container">
<form method="post" action="<?=$_SERVER['PHP_SELF'];?>">
<label for="productname">Product Name</label>
     <select id="product1_name" name="product1_name" required oninvalid="this.setCustomValidity('*Product Name is required.')" onchange="this.setCustomValidity('')">
 	<?php 
	if ($result->num_rows > 0) {
	  while($row = $result->fetch_assoc()) { ?>
	  <option value="<?=$row["product_name"]?>"><?=$row["product_name"]?></option>
	  <?php	
	  }
	}
	?>
	</select>
<label for="customername">Quantity</label>
    <input type="number" id="quantity1" name="quantity1" placeholder="Quantity.." required oninvalid="this.setCustomValidity('*Quantity is required.')" onchange="this.setCustomValidity('')">
<label for="customername">Price</label>
    <input type="number" id="price1" name="price1" placeholder="Price..">
<input type="submit" name= "update_product" value="Update Product">
</form>
<div class="message1"><?php if($message1!="") { echo $message1; } ?></div>
</div>
<h3>Delete Product</h3>
<hr style="height:2px;border-width:0;color:white;background-color:white">
<div class="container">
<form method="post" action="<?=$_SERVER['PHP_SELF'];?>">
<label for="productname">Product Name</label>
    <select id="product2_name" name="product2_name" required oninvalid="this.setCustomValidity('*Product Name is required.')" onchange="this.setCustomValidity('')">
 	<?php
	$conn1= mysqli_connect("127.0.0.1","sandeepgermanus","sandeep2000");
	if(!$conn1)
    {
	die ('Could not connect: '. $connect->connect_error);
    }
	mysqli_select_db($conn1,"sacrus");
	 $sql_str1 = "SELECT product_name FROM product";
     $result = mysqli_query($conn1,$sql_str1) or die('SQL Error :: '.mysqli_error($conn1));
	 if ($result->num_rows > 0) {
	  while($row = $result->fetch_assoc()) {
	 ?>
	  <option value="<?=$row["product_name"]?>"><?=$row["product_name"]?></option>
	  <?php	
	  }
	}
	?>
	</select>
<input type="submit" name= "delete_product" value="Delete Product">
</form>
<div class="message2"><?php if($message2!="") { echo $message2; } ?></div>
</div>
</body>
</html>