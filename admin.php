<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<title>Admin Page</title>
<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="css/login.css">

<style>
	footer {
		position: fixed;
		width: 100%;
		left: 0;
		bottom: 0;
		background-color:#6A1B4D;
		color: white;
		text-align: center;
		
	}
	header {
		position: fixed;
		width: 100%;
		left: 0;
		top: 0;
		background-color:#6A1B4D;
		color: white;
		text-align: center;
		
	}
	.hd{
		margin-bottom:25px;
	
	}
	button {
  background-color: #5A20CB;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
}
.bk{
	
	color:white;
}
</style>
</head>
<body>
<div class="hd">
<header >
<center><h2>Admin Page for Food Ordering Portal:</h2></center>
</header>
</div>

<div class="container">

<form action="report.php" method="post">
  <div class="imgcontainer">
    <img src="imgs/admin2.jpg" alt="Avatar" height="100px">
  </div>

  <div class="container">
    <label for="email"><b>Email</b></label>
    <input type="text" placeholder="Enter Email" name="email" required>

    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="psw" required>
        
    <button type="submit" name="btn-goin">Go In</button>
    
  </div>

</form>
</div>
   
<footer>
	
	<p>Copyright &copy; 2021 . R.Balakrishnan 20BCE1035. Mail me at :<a class="bk" href="mailto:balakrishnan_r@aol.com">balakrishnan_r@aol.com</a></p>
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
//seting session for uid
session_destroy();
$_SESSION["Uid"]=0;


}

?>