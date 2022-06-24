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

if(isset($_SESSION["Uid"]))
{

if($_SESSION["Uid"]==0)
{
	header("location:index.php");
}
}
else{
	header("location:index.php");
}

if(isset($_GET['cmd']) && ($_GET['cmd']=='back')){
 
	header('location:main.php');
}
$conn->close();

?>


<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {font-family: Arial, Helvetica, sans-serif;}
* {box-sizing: border-box;}

input[type=text], select, textarea {
  width: 100%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
  margin-top: 6px;
  margin-bottom: 16px;
  resize: vertical;
}

button {
  background-color: #04AA6D;
  color: white;
  padding: 12px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

button:hover {
  background-color: #45a049;
}

.container {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
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

<h2>Feeback Page:</h2>

<h4>Your Feedback is the most important thing for us. We will get back to you in 24-48 hrs. You can also mail our Admin: <a href="mailto:balakrishnan_r@aol.com">balakrishnan_r@aol.com</a></h4>
<div class="container">
  <form action="fprocess.php" method="post">

    <label for="subject">Write your Feedback:</label>
    <textarea id="subject" name="subject" placeholder="Write whatever you feel... (max - 200characters)" style="height:200px" maxlength="200"></textarea>

   <button type="submit" name="btn-fdbk">Submit</button>
  </form>
</div>


<footer>
	<p class="bk"><a class="bk" href="?cmd=back">Go Back</a></p>
	<p>Copyright &copy; 2021 . R.Balakrishnan 20BCE1035 - Food Ordering System</p>
</footer>
</body>
</html>
