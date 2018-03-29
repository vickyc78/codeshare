<?php
   mysql_connect("localhost","root","");
   mysql_select_db('codesharing');
   $query = "SELECT * FROM categories";
   $select = mysql_query($query) or die(mysql_error());
   while($row=mysql_fetch_assoc($select)) 
  {
	   echo "<li>".$row['category_tittle']."</li>";
   } 

?>