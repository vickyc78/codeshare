<?php
session_start();
if($_SESSION["Username"]==true)
{
	echo "Welcome"." ".$_SESSION["Username"];
}
else
{
	header('location:indx1.php');
}

?>
<a href="logout.php">Logout</a>
<center>
<a href="post.php"><button>post topic</button></a>
</center>
