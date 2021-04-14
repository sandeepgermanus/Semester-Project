<?php
$con= mysqli_connect("127.0.0.1","sandeepgermanus","sandeep2000");
$message=null;
$message1=null;
if(!$con)
{
	die ('Could not connect: '. $connect->connect_error);
}
mysqli_select_db($con,"sacrus");
if(isset($_POST['update_order'])){
$ordid = $_POST['order_id'];
$ite = $_POST['txt_holder'];
$dat = $_POST['date'];

$qnt = $_POST['quantity'];
$tprice = $_POST['tot_price'];
$sql_str1="UPDATE tblorder SET item_name='$ite' WHERE order_id='$ordid'";
if (!mysqli_query($con,$sql_str1))
{
	die ('Error: ' .mysqli_error($con));
}
$sql_str2="UPDATE tblorder SET date='$dat' WHERE order_id='$ordid'";
if (!mysqli_query($con,$sql_str2))
{
	die ('Error: ' .mysqli_error($con));
}

$sql_str4="UPDATE tblorder SET quantity='$qnt' WHERE order_id='$ordid'";
if (!mysqli_query($con,$sql_str4))
{
	die ('Error: ' .mysqli_error($con));
}
$sql_str5="UPDATE tblorder SET tot_price='$tprice' WHERE order_id='$ordid'";
if (!mysqli_query($con,$sql_str5))
{
	die ('Error: ' .mysqli_error($con));
}
$sql_str6= "UPDATE product SET quantity = quantity - '$qnt' WHERE product_name='$ite'";
if (!mysqli_query($con,$sql_str6))
{
	die ('Error: ' .mysqli_error($con));
}
$message = "Note: Updated Order Successfully!!!";
}
if(isset($_POST['cancel_order'])){
	$ordid=$_POST['order_id'];
	$sql1="DELETE FROM tblorder WHERE order_id='$ordid'";
	if (!mysqli_query($con,$sql1))
{
	die ('Error: ' .mysqli_error($con));
}
$message1="Note: Order Cancelled Successfully!!!";
}

$sqlt = "SELECT order_id FROM tblorder";
$result = mysqli_query($con,$sqlt) or die('SQL Error :: '.mysqli_error($con));
mysqli_close($con);
?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="test5.css">
<head>
<body>
<?php require_once 'header.php'; ?>
<h3>Update Order</h3>
<hr style="height:2px;border-width:0;color:white;background-color:white">
<div class="container">
<form method="post" action="<?=$_SERVER['PHP_SELF'];?>">
<label for="order-id">Order ID</label>
 <select id="order_id" name="order_id">
 	<?php 
	if ($result->num_rows > 0) {
	  while($row = $result->fetch_assoc()) { ?>
	  <option value="<?=$row["order_id"]?>"><?=$row["order_id"]?></option>
	  <?php	
	  }
	}
	?>
	</select>
	<label for="item">Item Name</label>
	<select id="item_name" name="item_name" onchange="getText(this)">
	<?php 
	$conn= mysqli_connect("127.0.0.1","sandeepgermanus","sandeep2000");
	if(!$conn)
     {
	die ('Could not connect: '. $connect->connect_error);
     }
     mysqli_select_db($conn,"sacrus");
	 $sqlz = "SELECT product_price,product_name FROM product";
     $result = mysqli_query($conn,$sqlz) or die('SQL Error :: '.mysqli_error($conn));
	 if ($result->num_rows > 0) {
	  while($row = $result->fetch_assoc()) { ?>
      <option value="<?=$row["product_price"]?>"><?=$row["product_name"]?></option>
	<?php	
	  }
	}
	mysqli_close($conn);
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
    <input type="date" id="date" name="date">

<label for="quantity">Quantity</label>
    <input type="text" id="quantity" name="quantity" placeholder="Ouantity..." onchange="calculateAmount(this.value)" required>
<label for="price">Total Price</label>
    <input type="text" id="tot_price" name="tot_price" >
	<input type="submit" name= "update_order" value="Update Order">
	
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
<h3>Delete Order</h3>
<hr style="height:2px;border-width:0;color:white;background-color:white">
<div class="container">
<form method="post" action="<?=$_SERVER['PHP_SELF'];?>">
<label for="order-id">Order ID</label>
 <select id="order_id" name="order_id">
 	<?php 
	$conn1= mysqli_connect("127.0.0.1","sandeepgermanus","sandeep2000");
	if(!$conn1)
     {
	die ('Could not connect: '. $connect->connect_error);
     }
     mysqli_select_db($conn1,"sacrus");
	 $sqlx = "SELECT order_id FROM tblorder";
     $result = mysqli_query($conn1,$sqlx) or die('SQL Error :: '.mysqli_error($conn1));
	if ($result->num_rows > 0) {
	  while($row = $result->fetch_assoc()) { ?>
	  <option value="<?=$row["order_id"]?>"><?=$row["order_id"]?></option>
	  <?php	
	  }
	}
	mysqli_close($conn1);
	?>
	</select>
	<input type="submit" name= "cancel_order" value="Cancel Order">
	</form>
	<div class="message1"><?php if($message1!="") { echo $message1; } ?></div> 
	</div>
	  
 
</body>
</html>