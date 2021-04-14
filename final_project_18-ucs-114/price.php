<?php
$con= mysqli_connect("127.0.0.1","sandeepgermanus","sandeep2000");
$message = null;


if(!$con)
{
	die ('Could not connect: '. $connect->connect_error);
}
mysqli_select_db($con,"file");

if(isset($_POST['add_order'])){
$name = $_POST['customer_name'];
$item = $_POST['txt_holder'];
$adres = $_POST['address'];
$brnd = $_POST['brand'];
$dat = $_POST['date'];
$quan = $_POST['quantity'];
$cont = $_POST['customer_contact'];
$tot = $_POST['tot_price'];
$sql = "INSERT INTO tblorder(customer_name, item_name, date, brand, quantity,tot_price)VALUES('$name','$item','$dat','$brnd','$quan','$tot')";
if (!mysqli_query($con,$sql))
{
	die ('Error: ' .mysqli_error($con));
}
$sql1= "INSERT INTO customer(customer_name,contact,address)VALUES('$name','$cont','$adres')";
if (!mysqli_query($con,$sql1))
{
	die ('Error: ' .mysqli_error($con));
}
$sql2= "UPDATE product SET quantity = quantity - '$quan' WHERE product_name='$item'";
if (!mysqli_query($con,$sql2))
{
	die ('Error: ' .mysqli_error($con));
}
$message="Note: Order added successfilly.";
}

$sqlt = "SELECT price,product_name FROM product";
$result = mysqli_query($con,$sqlt) or die('SQL Error :: '.mysqli_error($con));
mysqli_close($con);

?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="style2.css">
</head>
<body>
<?php require_once 'header.php'; ?>
<h3>Order</h3>
<div class="container">
  <form method="post" action="<?=$_SERVER['PHP_SELF'];?>">
<label for="customername">Customer Name</label>
    <input type="text" id="customer_name" name="customer_name" placeholder="Customer name..">
<label for="contact">Customer Contact</label>
    <input type="text" id="customer_contact" name="customer_contact" placeholder="Customer Contact..">
<label for="address">Address</label>
<br><textarea rows="3" cols="50"  name="address"></textarea><br>
<label for="item">Item Name 1</label>
	<select id="item_name" name="item_name" onchange="getText(this)">
	<?php 
	if ($result->num_rows > 0) {
	  while($row = $result->fetch_assoc()) { ?>
      <option value="<?=$row["price"]?>"><?=$row["product_name"]?></option>
	<?php	
	  }
	}
	?>
	</select>
<script>
  function getText(element) {
  var textHolder = element.options[element.selectedIndex].text
  document.getElementById("txt_holder").value = textHolder;
  }
</script>
<input type="hidden" name="txt_holder" id="txt_holder">
<label for="item">Item Name 2</label>
	<select id="item_name" name="item_name" onchange="getText1(this)">
	<?php
	$conn1= mysqli_connect("127.0.0.1","fredrick141","04122000");
	if(!$conn1)
     {
	die ('Could not connect: '. $connect->connect_error);
     }
     mysqli_select_db($conn1,"file");
	 $sqlz = "SELECT price,product_name FROM product";
     $result = mysqli_query($conn1,$sqlz) or die('SQL Error :: '.mysqli_error($conn1));
	 if ($result->num_rows > 0) {
	  while($row = $result->fetch_assoc()) { ?>
      <option value="<?=$row["price"]?>"><?=$row["product_name"]?></option>
	<?php	
	  }
	}
	mysqli_close($conn1);
	?>
	</select>
<script>
  function getText1(element) {
  var textHolder1 = element.options[element.selectedIndex].text
  document.getElementById("txt_holder").value = textHolder1;
  }
</script>
<input type="hidden" name="txt_holder" id="txt_holder">
<label for="item">Item Name 3</label>
	<select id="item_name" name="item_name" onchange="getText2(this)">
	<?php
	$conn2= mysqli_connect("127.0.0.1","fredrick141","04122000");
	if(!$conn2)
     {
	die ('Could not connect: '. $connect->connect_error);
     }
     mysqli_select_db($conn2,"file");
	 $sqlz = "SELECT price,product_name FROM product";
     $result = mysqli_query($conn2,$sqlz) or die('SQL Error :: '.mysqli_error($conn2));
	 if ($result->num_rows > 0) {
	  while($row = $result->fetch_assoc()) { ?>
      <option value="<?=$row["price"]?>"><?=$row["product_name"]?></option>
	<?php	
	  }
	}
	mysqli_close($conn2);
	?>
	</select>
<script>
  function getText2(element) {
  var textHolder2 = element.options[element.selectedIndex].text
  document.getElementById("txt_holder").value = textHolder2;
  }
</script>
<input type="hidden" name="txt_holder" id="txt_holder">
	
    
	
<label for="date">Date</label>
    <input type="date" id="date" name="date">
	
<label for="brand">Brand</label>
    <select id="brand" name="brand">
      <option value="roopa">Roopa</option>
      <option value="kundan">Kundan</option>
      <option value="haiers">Haiers</option>
    </select>
	<label for="quantity">Quantity 1</label>
    <input type="text" id="quantity1" name="quantity1" placeholder="Ouantity..." >
	<label for="quantity">Quantity 2</label>
    <input type="text" id="quantity2" name="quantity2" placeholder="Ouantity..." >
<label for="quantity">Quantity 3</label>
    <input type="text" id="quantity3" name="quantity3" placeholder="Ouantity..." onchange="calculateAmount()" required>
<label for="price">Total Price</label>
    <input type="text" id="tot_price" name="tot_price" >
    <input type="submit" name= "add_order" value="Add Order">
  </form>
   <div class="message"><?php if($message!="") { echo $message; } ?></div> 
</div>

<script>
	function calculateAmount() {
		var price1 =document.getElementById('item_name').value * document.getElementById('quantity1').value ;
		var price2 =document.getElementById('item_name').value * document.getElementById('quantity2').value ;
		var price3 =document.getElementById('item_name').value * document.getElementById('quantity3').value ;
		var tot_amount = price1 + price2 + price3;
		var result = document.getElementById('tot_price');
		result.value = tot_amount;
	}
</script>
</body>
</html>
