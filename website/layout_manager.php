<?php
function login()
{
	echo "<form action='/website/website/validatelogin.php' method='POST'>
	<h4>Username:</h4><input type='text' name='Username' id='Username' />
	<h4>Password:</h4><input type='Password' name='Password' id='Password' />
     <input type='submit' name='submit' value='submit'>
	<button type='button' onclick='location.href=\"/website/website/online.html\";'>register</button>
	</form>";
}
?>