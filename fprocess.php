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

if(isset($_POST['btn-fdbk']))
{
	$msg = $_POST["subject"];
	$user=$_SESSION["Uid"];

$sql = "INSERT INTO feedback (Msg,Uid) Values('$msg',$user)";

if ($conn->query($sql) === TRUE) 
{
	echo "<center><h2><br>Your Feedback submitted Successfully. Thank You.<br><a href='main.php'>Continue Shopping - click here</a>
	</h2></center>";
} 
else 
{
	echo "<center><h2><br>Your Feedback Failed to submit. Try Again later.<br><a href='main.php'>Visit Main Portal Page</a>
	</h2></center>";

	echo "Error: " . $sql . "<br>" . $conn->error;
}

}

$conn->close();

?>