<?php
session_start();
include 'homepage.html';

mysql_connect("localhost","root","")or die("not connected");

mysql_select_db("codesharing")or die("no database found");

if(isset($_POST["submit"]))
{
	$user=$_POST["Username"];
	$pass=$_POST['password'];
	$query=mysql_query("SELECT * from users where username='$user' && password='$pass'");
	$rowcount=mysql_num_rows($query);
	if ($rowcount==true) {
		$_SESSION["Username"]=$user;
		header('location:welcome.php');
	}
	else
	{
		echo "your username and password is wrong";
	}

}
?>
<!DOCTYPE html>
<html>
<head>
	<title>ONLINE ATTANDANCE SYSTEM</title>
	<link rel="stylesheet" type="text/css" href="online.css">
</head>
<body>
	<div class="login">
		<img class="log" src="logo_2.png">
		<form method="POST">
	<h4>Username:</h4><input type="text" name="Username" id="Username"><br>
	<h4>Password:</h4><input type="password" name="password" id="password"><br>
	<input type="submit" name="submit" value="submit">
	<a href="forgetpassword.html"> Forget Password ??</a>
</form>
<a href="signup.php">please signup</a>
<center>
<a href="post.php"><button>post topic</button></a>
</center>
</div>

</body>
</html>