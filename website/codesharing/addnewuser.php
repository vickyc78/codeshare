<?php

$conn=mysql_connect("localhost","root","")or die("not connected");

$db=mysql_select_db("codesharing")or die("no database found");
 

 if (isset($_POST['submit'])) {
 	$newuser = $_POST['Username'];
 	$newpwd = $_POST['Password'];

 	

 	$query="insert into users(username,password) values('$newuser','$newpwd')";

 	if(mysql_query($query))
 	{
 		echo "<h3> Student data inserted successfully</h3>";
 	}
 }

 ?>