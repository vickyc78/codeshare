<!DOCTYPE html>
<html>
<head>
	<title>Signed up page</title>
	<link rel="stylesheet" type="text/css" href="signup.css">
</head>
<body>
	<div class="signup">
		<img class="sign" src="logo_2.png">
		<form action="signup.php" method="POST">
	<h4>Username:</h4><input type="text" name="Username" id="Username"><br>
	<h4>Password:</h4><input type="Password" name="Password" id="Password"><br>
	<h4>Email:</h4><input type="text" name="Email" id="Email"><br>
     <input type="submit" name="submit" value="submit">
	<button>Cancel</button>
	<a href="index1.php">login</a>

</body>
</html>


<?php

$conn=mysql_connect("localhost","root","")or die("not connected");

$db=mysql_select_db("codesharing")or die("no database found");
 
if (isset($_POST['submit'])) {

 	$newuser = $_POST['Username'];
 	$newpwd = $_POST['Password'];
 	$newemail = $_POST['Email'];
 	$date = date('y-m-d');
 	
 	
 	if ($newuser && $newpwd && $newemail) {
 		$query="insert into users(username,password,email,date) values('$newuser','$newpwd','$newemail','$date')";

 	if(mysql_query($query))
 	{
 		echo "<h3> Student data inserted successfully</h3>";
 	}
 	
	 	}else{
 		echo "Please fill all the fields";
 	}

 	
 }
 	?>

 
