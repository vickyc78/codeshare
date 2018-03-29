
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
echo "<center><h1> Members </h1>" ;
$check = mysql_query("SELECT * FROM users");
$rows = mysql_num_rows($check);

while ($row = mysql_fetch_assoc($check)) {
	$id = $row['user_id'];
	echo "<a href='profile.php?id=$id'>". $row['username']."</a></br>";
}
echo "</center>";
?>



</html>