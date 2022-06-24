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
if(isset($_POST['btn-login']))
{
	$email = $_POST["email"];
	$psw = $_POST["psw"];

$sql = "SELECT * FROM User WHERE Email= '$email'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  $row = $result->fetch_assoc();
  $db_pass=$row["Pass"];
  $Usr_id=$row["Uid"];
  if($db_pass==$psw)
  {	
	$_SESSION["Uid"]=$Usr_id;
	$_SESSION["Email"]=$email;
	header("location:main.php");
  }
  else
  {	
	echo "<center><h2><br>Wrong Password. Kindly Login again<br><a href='index.php'>Visit Login Page</a>
</h2></center>";
  }
} 
else {
  echo "0 results";
}

}
$conn->close();

?>


