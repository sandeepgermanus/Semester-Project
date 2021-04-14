<?php
$con= mysqli_connect("127.0.0.1","sandeepgermanus","sandeep2000");
$message = null;
if(!$con)
{
	die ('Could not connect: '. $connect->connect_error);
}
mysqli_select_db($con,"sacrus");

if(isset($_POST['add_order'])){
$name = $_POST['customer_name'];
$item = $_POST['txt_holder'];
$adres = $_POST['address'];

$dat = $_POST['date'];
$quan = $_POST['quantity'];
$cont = $_POST['customer_contact'];
$tot = $_POST['tot_price'];
$sql = "INSERT INTO tblorder(cust_name, item_name, date,quantity,tot_price)VALUES('$name','$item','$dat','$quan','$tot')";
if (!mysqli_query($con,$sql))
{
	die ('Error: ' .mysqli_error($con));
}
$sql1= "INSERT INTO customer(customer_name,customer_contact,address)VALUES('$name','$cont','$adres')";
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

$sqlt = "SELECT product_price,product_name FROM product";
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
<h3> Add Order</h3>
<hr style="height:2px;border-width:0;color:white;background-color:white">
<div class="container">
  <form method="post" action="<?=$_SERVER['PHP_SELF'];?>">
<label for="customername">Customer Name</label>
    <input type="text" id="customer_name" name="customer_name" placeholder="Customer name.." required oninvalid="this.setCustomValidity('*Name is required.')" onchange="this.setCustomValidity('')">
<label for="contact">Customer Contact</label>
    <input type="text" id="customer_contact" name="customer_contact" pattern="[0-9]{10}" placeholder="Customer Contact.." required>
<label for="address">Address</label>
<br><textarea rows="3" cols="50"  name="address" required oninvalid="this.setCustomValidity('*Address is required.')" onchange="this.setCustomValidity('')"></textarea><br>
<label for="item">Item Name</label>
	<select id="item_name" name="item_name" onchange="getText(this)" required>
	<?php 
	if ($result->num_rows > 0) {
	  while($row = $result->fetch_assoc()) { ?>
      <option value="<?=$row["product_price"]?>"><?=$row["product_name"]?></option>
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
<label for="date">Date</label>
    <input type="date" id="date" name="date" required oninvalid="this.setCustomValidity('*Date is required.')" onchange="this.setCustomValidity('')">
<label for="quantity">Quantity</label>
    <input type="number" id="quantity" name="quantity" placeholder="Ouantity..." onchange="calculateAmount(this.value)" required>
<label for="price">Total Price</label>
    <input type="text" id="tot_price" name="tot_price" >
    <input type="submit" name= "add_order" value="Add Order">
  </form>
   <div class="message"><?php if($message!="") { echo $message; } ?></div> 
</div>

<script>
	function calculateAmount(val) {
		var tot_amount =document.getElementById('item_name').value * val ;
		var result = document.getElementById('tot_price');
		result.value = tot_amount;
	}
</script>
</body>
</html>
