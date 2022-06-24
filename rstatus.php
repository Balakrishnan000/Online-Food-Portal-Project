<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "food-project";

// Start the session
session_start();
  

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
if(isset($_POST['btn-register']))
{
	$email = $_POST["email"];
	$psw = $_POST["psw"];
	$name = $_POST["name"];
	$mobile = $_POST["mobile"];
	$state = $_POST["state"];
	$city = $_POST["city"];
	$street = $_POST["street"];


$sql = "INSERT INTO User (name,email,mob_no,pass,state,city,street) Values('$name','$email',$mobile,'$psw','$state','$city','$street')";

if ($conn->query($sql) === TRUE) 
{
	echo "<center><h2><br>Registration Successful. Thank You.<br><a href='index.php'>Visit Login Page</a>
	</h2></center>";
} 
else 
{
	echo "<center><h2><br>Registration Failed. Try Again.<br><a href='register.php'>Visit Registration Page</a>
	</h2></center>";

	echo "Error: " . $sql . "<br>" . $conn->error;
}
}

$conn->close();

?>