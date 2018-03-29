<?php
function dispcategories()
{
	mysql_connect("localhost","root","")or die("not connected");

mysql_select_db("codesharing")or die("no database found");
$select = mysql_query("SELECT * FROM categories");

while ($row = mysql_fetch_assoc($select)) 
{
	echo "<table class='category-table'>";
	echo "<tr><td class='main-category' colspan='2'>".$row['category_tittle']."</td></tr>";
	dispcategories($row['cat_id']);
	echo "</table>";
}
}

function dispsubcategories($parent_id)
{
	mysql_connect("localhost","root","")or die("not connected");

mysql_select_db("codesharing")or die("no database found");
$select=mysql_query("SELECT cat_id, subcat_id, subcategory_title, subcategory_desc FROM  categories, subcategories WHERE ($parent_id = categories.cat_id) AND ($parent_id = subcategories.parent_id) ");

echo "<tr><th width='90%'>Categories</th><th wudth='10%'>Topics</th></tr>";
while ($row = mysql_fetch_assoc($select))
{
	echo "<tr><td class='category_title'><a href='/website/website/topic.php?cid=".$row['cat_id']."$scid=".$row['$subcat_id']."'> ".$row['subcategory_title']."<br />";
	echo $row['subcategory_desc']."</a></td>";
	echo "<td class='num_topics'>".getnumtopics($parent_id, $row['subcat_id'])."</td></tr>";
}
}

function getnumtopics($cat_id, $subcat_id)
{
mysql_connect("localhost","root","")or die("not connected");

mysql_select_db("codesharing")or die("no database found");

$select = mysql_query("SELECT category_id, subcategory_id FROM  topics WHERE ".$cat_id." = category_id AND ".$subcat_id." = subcategory_id");
return mysql_num_rows($select);
}

?>