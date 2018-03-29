<?php

session_start();


$conn=mysql_connect("localhost","root","")or die("not connected");

$db=mysql_select_db("codesharing")or die("no database found");

$Username = $_POST("username");
$Password = $_POST("password");

$result = mysql_query( "SELECT username,password FROM users WHERE username ='".$Username."' AND password ='".$Password."' ");

if (mysql_num_rows($result) != 0) {
	$_SESSION['Username'] = $username;
	header("Location: ".$_SERVER['HTTP_REFERER']);
	}else
	 {
		header("Location: ".$_SERVER['HTTP_REFERER'] ."?status=login_fail");
	}
?>