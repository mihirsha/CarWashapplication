<?php

$host = "localhost";
$user = "root";
$password = "";
$db = "user";

$data=mysqli_connect($host,$user,$password,$db);
if($data === False){
	die("Connection Error");
}

if($_SERVER['REQUEST_METHOD'] == "POST")
{
	$username=$_POST['username'];
	$password=$_POST['password'];

	$sql = "select * from login where username = '".$username."' AND password = '".$password."'";

	$result = mysqli_query($data,$sql);
	$row=mysqli_fetch_array($result);

	if ($row["usertype"] == "user"){

		$_SESSION["username"] = $username;
		header("location:userhome.php");
	}
	elseif ($row["usertype"] == "admin") {
		header("location:adminhome.php");
	}
	else{
		echo "username incorrect";
	}

}

?>






<!DOCTYPE html>
<html>
<head>
	<title></title>
<head>
<body>
<center>
	<br><br>
	<h1>Car Washing Webapp</h1>
	<br><br>
	<h2> Login Form </h2>
	<br><br><br><br>
	<div style="background-color: grey; width: 700px;">
	<br><br>
	<form action="#" method="POST"> 
		<label> Username </label> 
		<input type="text" name="username" required>
	<div>
	<br><br>
		<label> Password </label>
		<input type="text" name="password" required>
	</div>
	<div>
	<br><br>
		<input type="submit" value="Login" required>
	</div>
	</form>
	<br><br>
	</div>
</center>
</body>
</head>



