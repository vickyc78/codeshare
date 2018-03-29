
<?php
session_start();

mysql_connect("localhost","root","")or die("not connected");

mysql_select_db("codesharing")or die("no database found");

?>


<form action="post.php" method="POST">
	<center>
		<br>
		Topic Name: <br><input type="text" name="topic"  style="width: 400px;"><br>
		<br>
		Content: <br>
		<textarea style="resize: none; width: 400px; height: 300px;" name='content' value="content"></textarea><br>
		<input type="submit" name="submit" value="post" style="width: 400px;">
	</center>
</form>
<?php
$topic_name=$_POST['topic'];
$content=$_POST['content'];
$date=date("y-m-d");

if (isset($_POST['submit'])) 
{
	if ($topic_name && $content) 
	{
		$query = "insert into topics2(topic_id,topic_name,topic_content,topic_creator,date) values ('','$topic_name','$content','$_SESSION[Username]','$date')";
		if (mysql_query("$query"))
		{
			echo "Success";
		}
		else
	   {
		echo "please fill in all the fields";
        } 
			
    }
		
}
?>