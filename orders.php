<?php
// Start the session
session_start();

$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "food-project";

  
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

if(isset($_POST['btn-ord'])){
	$user = $_SESSION["Uid"];
	

$sql = "SELECT * FROM orders o, food f WHERE ((o.Uid= $user) AND (o.Fid=f.Fid))";
$result = $conn->query($sql);
$i=0;
if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()){
	   
  $ords[$i] = [
		'Oid'=>$row['Oid'],
		'Fid'=>$row['Fid'],
        'Fname' => $row['FName'],
        'Price' => $row['Price'],
        'Date' => $row['Date'],
		'Qty'=>$row['Qty'],
    ];
	$i=$i+1;
  }
  $_SESSION['ords']=$ords;
 
} 
else {
  echo "<br><br><center><h3>No orders placed yet.</h3></center>";
}

}

else{
	header('location:index.php');
}

if(isset($_GET['cmd']) && ($_GET['cmd']=='back')){
 
	header('location:main.php');
}

$conn->close();
?>


<!DOCTYPE html>
<html>
<head>
<title>FOS:MyOrders</title>
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
footer {
	position: fixed;
	width: 100%;
	left: 0;
	bottom: 0;
	background-color: brown;
	color: white;
	text-align: center;
}
.bk{
	padding-left:15px;
	float: left;
	color:white;
}
</style>
</head>
<body>
<br><br>
<center><h3>My Orders:</h3></center>
<br>
<table align="center">
  <tr>
    <th>Order-id</th>
	<th>Date</th>
    <th>Food-id</th>
    <th>Food-Name</th>
	<th>Quantity</th>
	<th>Total Amount</th>
	<th>Cancel Order</th>
  </tr>
  
  <?php 
  if(isset($_SESSION['ords'])){
  $j=0;
  $data=$_SESSION['ords'];
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
	<td><form action="ocancel.php" method="post">
	<input type="hidden" value="<?php echo $data[$j]['Oid']; ?>" name="c-oid">
    <button type="submit" name="btn-can" class="btn-danger btn-xs">cancel</button>
	</form>
	</td>
    
  </tr>
  <?php
  $j=$j+1;
  }
  }
  ?>
 
</table>

<footer>
	<p class="bk"><a class="bk" href="?cmd=back">Go Back</a></p>
	<p>Copyright &copy; 2021 . R.Balakrishnan 20BCE1035 - Food Ordering System</p>
</footer>
   

</body>
</html>