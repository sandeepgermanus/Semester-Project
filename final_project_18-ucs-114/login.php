<?php
session_start();
$usernameErr = $passwordErr="";
$username = $password="";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["username"])) {
    $usernameErr = "Username is required";
  } else {
    $username = test_input($_POST["username"]);
  }
  
  if (empty($_POST["password"])) {
    $passwordErr = "Password is required";
  } else {
    $password = test_input($_POST["password"]);
  }
}
$localhost = "127.0.0.1";
$username = "sandeepgermanus";
$password = "sandeep2000";
$dbname = "sacrus";
$message="";
if(count($_POST)>0) {
	$conn = mysqli_connect($localhost, $username, $password, $dbname);
	$result = mysqli_query($conn,"SELECT * FROM admin WHERE admin_name='" . $_POST["username"] . "' and pwd = '". $_POST["password"]."'");
	$count  = mysqli_num_rows($result);
	if($count==0) {
    $message = "Invalid Username or Password!";
	} else {
		$_SESSION['username']=$username;
                 header("location:index.php");
	}
}
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>
<!DOCTYPE html>    
<html>    
<head>    
    <title>Login Form</title>    
    <link rel="stylesheet" type="text/css" href="login.css">    
</head>    
<body>  
      <div class="header">
  <h1>Sacrus Handsculpts</h1>
  </div>
  <h1>Admin Login</h1>
    <br>    
    <div class="login">    
    <form id="login" method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>" >  
        <label><b>User Name     
        </b>    
        </label>    
        <input type="text" name="username" id="username" placeholder="UserName..."> 

<span class="error">* <?php echo $usernameErr;?></span>		
        <br><br>    
        <label><b>Password     
        </b>    
        </label>    
        <input type="Password" name="password" id="password" placeholder="Password....">  

<span class="error">* <?php echo $passwordErr;?></span>		
        <br><br>    
        <input type="submit" name="logs" id="logs" value="Log In">       
        <br><br>      
    </form> 
<div class="message"><?php if($message!="") { echo $message; } ?></div>     
</div>    
</body>    
</html>     