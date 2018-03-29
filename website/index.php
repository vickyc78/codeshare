<?php
include ('layout_manager.php');

?>
<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
</head>
<body>
	<div>
		<div><h1><a href="/website/website/signup.php">Login Page</a></h1></div>
		<div>
			<?php
			session_start();
			if (isset($_SESSION['username']))  
			{

			}else
			if (isset($_GET['status'])) {
				if ($_GET['status'] == 'reg_success') {
					echo "<h1 style='color: green;'>new user registered sucessefully!</h1>";
				}else
				if ($_GET['status'] == 'login_fail') {
					echo "<h1 style='color: red:'>Invalid Username and Password </h1>";
				}
				login();
			}
			?>
		</div>
		<div>
			<p>Welcome to the CODESHARING website<color></p>
	</div>
	<div>
		
	</div>
</div>
</body>
</html>