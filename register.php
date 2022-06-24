
<!DOCTYPE html>
<html>
<head>
<title>Registeration</title>
<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="css/login.css">

<style>
	footer {
		position: fixed;
		width: 100%;
		left: 0;
		bottom: 0;
		background-color: brown;
		color: white;
		text-align: center;
	}
</style>
</head>
<body>

<div class="container">
<center><h2>Registeration Page for Food Ordering Portal:</h2></center>

<form action="rstatus.php" method="post">
  <div class="imgcontainer">
    <img src="imgs/userb.png" alt="Avatar"  width="80px" height="90px">
  </div>

  <div class="container">
	<label for="name"><b>Name</b></label>
    <input type="text" placeholder="Enter Name" name="name" required>
	
	<label for="mobile"><b>Mobile Num</b></label><br>
    <input id="mob" type="number" placeholder="Enter Mobile No." name="mobile" required><br><br>
	
    <label for="email"><b>Email</b></label>
    <input type="text" placeholder="Enter Email" name="email" required>

    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Set your Password" name="psw" required >
	
	<label for="state"><b>State</b></label>
    <input type="text" placeholder="Enter your State" name="state" required>
	
	<label for="city"><b>City</b></label>
    <input type="text" placeholder="Enter your City" name="city" required>
	
	<label for="street"><b>Street</b></label>
    <input type="text" placeholder="Enter your Street" name="street" required>
        
    <button type="submit" name="btn-register">Register</button>
    
  </div>

</form>
</div>
   
<footer>
	
	<p>Copyright &copy; 2021 . R.Balakrishnan 20BCE1035 - Food Ordering System</p>
</footer>
</body>
</html>


<?php
$user="root";
$password="root";
$con=mysqli_connect("localhost",$user,$password);
if(!$con)
{
echo "could not connect" ;
}
else
{
echo "<p>DB: connected</p>";
}

?>