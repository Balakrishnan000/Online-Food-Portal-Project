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
if(isset($_POST['btn-goin']))
{
	$email = $_POST["email"];
	$psw = $_POST["psw"];

	if(($email=="admin@admin.com") and($psw=="admin")){
		$sql = "SELECT * FROM orders o, food f,user u WHERE ((o.Uid= u.Uid) AND (o.Fid=f.Fid))";
		$result = $conn->query($sql);
		$i=0;
		if ($result->num_rows > 0) {
		  // output data of each row
		  while($row = $result->fetch_assoc()){
			   
		  $ords2[$i] = [
				'Oid'=>$row['Oid'],
				'Fid'=>$row['Fid'],
				'Fname' => $row['FName'],
				'Price' => $row['Price'],
				'Date' => $row['Date'],
				'Qty'=>$row['Qty'],
				'CName'=>$row['Name'],
				'CMob'=>$row['Mob_No'],
			];
			$i=$i+1;
		  }
		  $_SESSION['ords2']=$ords2;
		 
		} 
		else {
		  echo "<br><br><center><h3>No orders placed yet.</h3></center>";
		}
	}
	else{
	echo "<center><h2><br>Wrong Password. Kindly Login again<br><a href='admin.php'>Visit Admin Page</a>
</h2></center>";
	}

}
else{
	echo "<center><h2><br>NOT Permitted.
</h2></center>";
}

$conn->close();
if(isset($_GET['command']) && ($_GET['command']=='out2')){

	session_destroy();
 
	header('location:index.php');
}

?>


<!DOCTYPE html>
<html>
<head>
<title>FOS:Report</title>
<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="css/login.css">
<link rel="stylesheet" media="screen" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.5/css/bootstrap.min.css">


<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 80%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
.btn {
  background-color: #4CAF50;
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  width:25%;
  font-size: 16px;
}
</style>
</head>
<body>
<br><br>


<center><h3>Report:</h3></center>
<br>
<table align="center">
  <tr>
    <th>Order-id</th>
	<th>Date</th>
    <th>Food-id</th>
    <th>Food-Name</th>
	<th>Quantity</th>
	<th>Total Amount</th>
	<th>Cust-Name</th>
	<th>Cust-Mobile</th>
  </tr>
  
  }
  <?php 
  if(isset($_SESSION['ords2'])){
  $j=0;
  $data=$_SESSION['ords2'];
  while($j<sizeof($data))
  {
	?>
  <tr>
    <td><?php echo $data[$j]['Oid'];?></td>
	<td><?php echo $data[$j]['Date'];?></td>
	<td><?php echo $data[$j]['Fid'];?></td>
	<td><?php echo $data[$j]['Fname'];?></td>
	<td><?php echo $data[$j]['Qty'];?></td>
	<td><?php echo ($data[$j]['Price'])*($data[$j]['Qty']);?></td>
    <td><?php echo $data[$j]['CName'];?></td>
	<td><?php echo $data[$j]['CMob'];?></td>
  </tr>
  <?php
  $j=$j+1;
  }
  }
  ?>
 
</table>
<br>
<br>
<br>
<br>  
<center><button class="btn" onclick="window.print()">Click to Download/ Print</button></center>
<br>
<br>
<center><a class="nav-link" href="?command=out2">Log-out</a></center>
<br> 
<br> 
</body>
</html>