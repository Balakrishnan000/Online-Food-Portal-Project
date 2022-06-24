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
if(isset($_POST['btn-can']))
{
	$oid = $_POST["c-oid"];
	
	$sql = "DELETE FROM orders WHERE Oid=$oid";

	if ($conn->query($sql) === TRUE) {
	  echo "<center><h2><br>Your order : ".$oid." Cancelled Successfully.<br><a href='main.php'>Continue Shopping - click here</a>
	</h2></center>";
	} else {
	  echo "Error deleting order: ".$oid."    ". $conn->error;
	}
}

$conn->close();
?>