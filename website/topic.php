<?php
session_start();
include 'homepage.html';

mysql_connect("localhost","root","")or die("not connected");

mysql_select_db("codesharing")or die("no database found");
if (@$_SESSION["Username"]) 
?>
<html>
<body>
	<center>
<?php
if ($_GET["id"]) {
       $check = mysql_query("SELECT * FROM topics2 WHERE topic_id='".$_GET['id']."'");
       if (mysql_num_rows($check)) {
       	while ($row = mysql_fetch_assoc($check)) {
       		 $check_u = mysql_query("SELECT * FROM users WHERE username='".$row['topic_creator']."'");
       		 while ($row_u = mysql_fetch_assoc($check_u)) {
       		 	@$user_id = $row_u['id'];

       		 }
       		 echo "<h1>".$row['topic_name']."</h1>";
       		 echo "<h5>By<a href='profile.php?id=$user_id'> ".$row['topic_creator']."</a><br />Date: ".$row['date']."</h5>";
       		 echo "<br />".$row['topic_content'];
       	}
       	
       }else{
       	echo "Topic not found";
       }
}else{
     header("Location: index1.php");
}
?>
</center>
</body>
</html>
