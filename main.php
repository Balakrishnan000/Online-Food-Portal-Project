<?php
// Start the session
session_start();

$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "food-project";

  

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}


if(isset($_SESSION["Uid"]))
{
if($_SESSION["Uid"]==0)
{
	header("location:index.php");
}
else
{
	
	$sql = "SELECT * FROM Food";
	$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
   while($row = $result->fetch_assoc()) {
	   
	$food[$row['Fid']] = [
		'Fid'=>$row['Fid'],
        'FName' => $row['FName'],
        'Price' => $row['Price'],
        'Description' => $row['Description'],
    ];

  }
  $_SESSION['food']=$food;
} 
else {
  echo "No Data in Food Table";
}

}
$conn->close();
	
}

else
{
	header("location:index.php");
}

//for log out
if(isset($_GET['command']) && ($_GET['command']=='out')){

	session_destroy();
 
	header('location:index.php');
}
//for feedback
if(isset($_GET['cmd']) && ($_GET['cmd']=='fdbk')){

	header('location:feedback.php');
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Main</title>
<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="css/login.css">
<link rel="stylesheet" media="screen" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.5/css/bootstrap.min.css">


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
	.usr{

		padding-left:700px;
	}
</style>

</head>
<body>

<!--nav bar start-->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#"><img src="imgs/logo.png" alt="logo" class=img-circle height="90" width="120"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav">
	<form action="orders.php" method="post">
      <li class="nav-item">
			<button type="submit" class="btn-link" name="btn-ord">My Orders</button>
      </li>
	  </form>
      <li class="nav-item">
        <a class="nav-link" href="?command=out">Log-out</a>
      </li>
	  <li class="nav-item">
        <a class="nav-link" href="?cmd=fdbk">FeedBack</a>
      </li>
	  <li class="nav-item usr">
         <a class="nav-link" href="#">Hello, <?php echo $_SESSION["Email"] ?></a>
      </li>
     
    </ul>
  </div>
</nav>
<!--nav bar end-->

<div class="container">

<center><h2> Food Ordering Portal:</h2></center>
<br><br>
<form action="oprocess.php" method="post">
<div class="container">
        <div class="row">
		
            <div class="col-lg-6 mb-lg-5">
			<form action="oprocess.php" method="post">
                <center><img src="imgs/idly.jpg" alt="idly" class=img-circle height="200" width="220">
                <h2><?php  print_r($_SESSION['food'][101]['FName']);?></h2>
				<h2><?php  print_r('Rs. '.$_SESSION['food'][101]['Price'].' /plate');?></h2>
                <p><?php  print_r($_SESSION['food'][101]['Description']);?></p>
				<input type="number" placeholder="Enter Qty (minimum 5)" name="qty" min=5 required>
				<button type="submit" class="btn-success" name="btn-buy1">Buy</button></center>
            </form>    
            </div>
			
			
			
            <div class="col-lg-6 mb-lg-5">
			<form action="oprocess.php" method="post">
                <center><img src="imgs/dosa.jpg" alt="dosa" class=img-circle height="200" width="220">
                <h2><?php  print_r($_SESSION['food'][102]['FName']);?></h2>
				<h2><?php  print_r('Rs. '.$_SESSION['food'][102]['Price'].' /plate');?></h2>
                <p><?php  print_r($_SESSION['food'][102]['Description']);?></p>
				<input type="number" placeholder="Enter Qty (minimum 5)" name="qty" min=5 required>
				<button type="submit" class="btn-success" name="btn-buy2">Buy</button></center>
            </form>    
            </div>
			
			
			
			<div class="col-lg-6 mb-lg-5">
			<form action="oprocess.php" method="post">
                <center><img src="imgs/pongal.jpg" alt="pongal" class=img-circle height="200" width="220">
                <h2><?php  print_r($_SESSION['food'][103]['FName']);?></h2>
				<h2><?php  print_r('Rs. '.$_SESSION['food'][103]['Price'].' /plate');?></h2>
                <p><?php  print_r($_SESSION['food'][103]['Description']);?></p>
				<input type="number" placeholder="Enter Qty (minimum 5)" name="qty" min=5 required>
				<button type="submit" class="btn-success" name="btn-buy3">Buy</button></center>
            </form>    
            </div>
			
			
			
			<div class="col-lg-6 mb-lg-5">
			<form action="oprocess.php" method="post">
                <center><img src="imgs/parotta.jpg" alt="parotta" class=img-circle height="200" width="220">
                <h2><?php  print_r($_SESSION['food'][104]['FName']);?></h2>
				<h2><?php  print_r('Rs. '.$_SESSION['food'][104]['Price'].' /plate');?></h2>
                <p><?php  print_r($_SESSION['food'][104]['Description']);?></p>
                <input type="number" placeholder="Enter Qty (minimum 5)" name="qty" min=5 required>
				<button type="submit" class="btn-success" name=" btn-buy4">Buy</button></center>
            </form>    
            </div>
			
			
			
			<div class="col-lg-6 mb-lg-5">
			<form action="oprocess.php" method="post">
                <center><img src="imgs/chappati.jpg" alt="chappati" class=img-circle height="200" width="220">
                <h2><?php  print_r($_SESSION['food'][105]['FName']);?></h2>
				<h2><?php  print_r('Rs. '.$_SESSION['food'][105]['Price'].' /plate');?></h2>
                <p><?php  print_r($_SESSION['food'][105]['Description']);?></p>
                <input type="number" placeholder="Enter Qty (minimum 5)" name="qty" min=5 required>
				<button type="submit" class="btn-success" name=" btn-buy5">Buy</button></center>
            </form>    
            </div>
			
         
        </div>
    </div>

</div>
   
<footer>
	
	<p>Copyright &copy; 2021 . R.Balakrishnan 20BCE1035 - Food Ordering System</p>
</footer>
</body>
</html>