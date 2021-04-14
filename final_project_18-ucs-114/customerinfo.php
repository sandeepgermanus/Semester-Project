<?php
$con= mysqli_connect("127.0.0.1","sandeepgermanus","sandeep2000");
if(!$con)
{
	die ('Could not connect: '. $connect->connect_error);
}
mysqli_select_db($con,"sacrus");
$sql_str0="SELECT * FROM customer";
$result = mysqli_query($con,$sql_str0) or die('SQL Error :: '.mysqli_error($con));
?>
<!DOCTYPE HTML>
<html>
<head>
<link rel="stylesheet" type="text/css" href="info.css">
<style>
#customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: separate;
  width: 100%;
}

#customers td, #customers th {
  border: 3px solid #ddd;
  padding: 8px;
}

#customers tr:hover {background-color: #ddd;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  padding-left: 0px;
  text-align: left;
  background:linear-gradient(to bottom, #ffcccc 0%, #006699 100%);
  color: white;
}
</style>
</head>
<body>
<?php require_once 'header.php';?>
<h3>Customer Information</h3>
<hr style="height:2px;border-width:0;color:white;background-color:white">
<div class="container">
<table id="customers">
 <tr>
    <th>Customer ID</th>
	<th>Customer Name</th>
    <th>Customer Contact</th>
    <th>Address</th>
  </tr>
  <?php
  if ($result->num_rows > 0) {
	  while($row = $result->fetch_assoc()) { ?>
   <tr>
    <td><?=$row["customer_id"]?></td>
    <td><?=$row["customer_name"]?></td>
    <td><?=$row["customer_contact"]?></td>
	<td><?=$row["address"]?></td>
	</tr>
	<?php
	  }
  }?>
 </div>
</body>
</html>
