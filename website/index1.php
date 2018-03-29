
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

<html>
<head>
	<title></title>
</head>
<body>
	<center>
<?php 
echo '<table border="1px";>'; 
?>
	
	<tr>
		<td width="50px;" style="text-align: center;">
			<span>ID</span>
		</td>
		<td width="400px;" style="text-align: center;">Name
		</td>
		<td width="80px;" style="text-align: center;">Views
		</td>
		<td width="80px;" style="text-align: center;">Creator
		</td>
		<td width="100px;" style="text-align: center;">Date
		</td>
	</tr>
</center>
</body>
</html>
<!DOCTYPE html>
<html>
<head>
	<title>ONLINE ATTANDANCE SYSTEM</title>
	<link rel="stylesheet" type="text/css" href="online.css">
</head>
</html>
<?php
$check = mysql_query("SELECT * FROM topics2");
if (!@$_GET['date']) {
	
if(mysql_num_rows($check) != 0)
{
	while ($row = mysql_fetch_assoc($check)) {
		$id = $row['topic_id'];
		echo "<tr>";
		echo "<td>".$row['topic_id']."</td>";
		echo "<td style='text-align: center;'><a href='topic.php?id=$id'>".$row['topic_name']."</a></td>";
		echo "<td>".$row['views']."</td>";
		$check_u = mysql_query("SELECT * FROM users WHERE username='".$row['topic_creator']."'");
		while ($row_u = mysql_fetch_assoc($check_u)) {
			@$user_id = $row_u['id'];
			echo "$user_id";
		}
		echo "<td><a href='profile.php?id=$user_id'>".$row['topic_creator']."</a></td>";
		$get_date = $row['date'];
		echo "<td><a href='index1.php?date=$get_date'>".$row['date']."</td>";
		echo "</tr>";
	}
}else
{
	echo "No topics found";
}
}
if (@$_GET['date']) {
	$check_d = mysql_query("SELECT * FROM topics2 WHERE date='".$_GET['date']."'");
	while (@$row_d = mysql_fetch_assoc($check_d)) {
		$id = $row_d['topic_id'];
		echo "<tr>";
		echo "<td>".$row_d['topic_id']."</td>";
		echo "<td style='text-align: center;'><a href='topic.php?id=$id'>".$row_d['topic_name']."</a></td>";
		echo "<td>".$row_d['views']."</td>";
		$check_u = mysql_query("SELECT * FROM users WHERE username='".$row_d['topic_creator']."'");
		while ($row_u = mysql_fetch_assoc($check_u)) {
			@$user_id = $row_u['id'];
			echo "$user_id";
		}
		echo "<td><a href='profile.php?id=$user_id'>".$row_d['topic_creator']."</a></td>";
		$get_date = $row_d['date'];
		echo "<td><a href='index1.php?date=$get_date'>".$row_d['date']."</td>";
		echo "</tr>";
		
	}
}
echo "</table>";
?>