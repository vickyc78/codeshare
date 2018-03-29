
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
<?php
echo "<center>";
if (@$_GET['id']) {
	$check = mysql_query("SELECT * FROM users WHERE user_id='".$_GET['id']."'");
	$rows = mysql_num_rows($check);

	if (mysql_num_rows($check) != 0) {
		while ($row = mysql_fetch_assoc($check)) {
			echo "<h1>". $row['username']."</h1><br />";
			echo "<b> Date registered: </b>".$row['date']."</br>";
			echo "<b> Email: </b>".$row['email'];
		}
	}else{
		echo "ID not found";
	}
}
else{
	header("Location: index1.php");
}
	echo "</center>";
?>
</html>