<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "food-project";

// Start the session
session_start();
  
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

if(isset($_POST['btn-buy1']))
{
	$qty = $_POST["qty"];
	$food = 101;
	$user=$_SESSION["Uid"];

$sql = "INSERT INTO orders (Date,Qty,Fid,Uid) Values(NOW(),$qty,$food,$user)";

if ($conn->query($sql) === TRUE) 
{
	echo "<center><h2><br>Order placed Successful. Thank You.<br><a href='main.php'>Continue Shopping - click here</a>
	</h2></center>";
} 
else 
{
	echo "<center><h2><br>Order placed Failed. Try Again later.<br><a href='main.php'>Visit Main Portal Page</a>
	</h2></center>";

	echo "Error: " . $sql . "<br>" . $conn->error;
}

}
if(isset($_POST['btn-buy2']))
{
	$qty = $_POST["qty"];
	$food = 102;
	$user=$_SESSION["Uid"];

$sql = "INSERT INTO orders (Date,Qty,Fid,Uid) Values(NOW(),$qty,$food,$user)";

if ($conn->query($sql) === TRUE) 
{
	echo "<center><h2><br>Order placed Successful. Thank You.<br><a href='main.php'>Continue Shopping - click here</a>
	</h2></center>";
} 
else 
{
	echo "<center><h2><br>Order placed Failed. Try Again later.<br><a href='main.php'>Visit Main Portal Page</a>
	</h2></center>";

	echo "Error: " . $sql . "<br>" . $conn->error;
}


}
if(isset($_POST['btn-buy3']))
{
	$qty = $_POST["qty"];
	$food = 103;
	$user=$_SESSION["Uid"];

$sql = "INSERT INTO orders (Date,Qty,Fid,Uid) Values(NOW(),$qty,$food,$user)";

if ($conn->query($sql) === TRUE) 
{
	echo "<center><h2><br>Order placed Successful. Thank You.<br><a href='main.php'>Continue Shopping - click here</a>
	</h2></center>";
} 
else 
{
	echo "<center><h2><br>Order placed Failed. Try Again later.<br><a href='main.php'>Visit Main Portal Page</a>
	</h2></center>";

	echo "Error: " . $sql . "<br>" . $conn->error;
}


}
if(isset($_POST['btn-buy4']))
{
	$qty = $_POST["qty"];
	$food = 104;
	$user=$_SESSION["Uid"];

$sql = "INSERT INTO orders (Date,Qty,Fid,Uid) Values(NOW(),$qty,$food,$user)";

if ($conn->query($sql) === TRUE) 
{
	echo "<center><h2><br>Order placed Successful. Thank You.<br><a href='main.php'>Continue Shopping - click here</a>
	</h2></center>";
} 
else 
{
	echo "<center><h2><br>Order placed Failed. Try Again later.<br><a href='main.php'>Visit Main Portal Page</a>
	</h2></center>";

	echo "Error: " . $sql . "<br>" . $conn->error;
}
	

}
if(isset($_POST['btn-buy5']))
{
	$qty = $_POST["qty"];
	$food = 105;
	$user=$_SESSION["Uid"];

$sql = "INSERT INTO orders (Date,Qty,Fid,Uid) Values(NOW(),$qty,$food,$user)";

if ($conn->query($sql) === TRUE) 
{
	echo "<center><h2><br>Order placed Successful. Thank You.<br><a href='main.php'>Continue Shopping - click here</a>
	</h2></center>";
} 
else 
{
	echo "<center><h2><br>Order placed Failed. Try Again later.<br><a href='main.php'>Visit Main Portal Page</a>
	</h2></center>";

	echo "Error: " . $sql . "<br>" . $conn->error;
}

}


$conn->close();

?>
