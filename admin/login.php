<?php
require_once('../classes/adminlogin.php');
    $adminLogin = new adminlogin();
if(isset($_POST['login'])){
	echo $_POST['login'];
	$admin = $_POST['adminUser'];
	$pass =($_POST['adminPass']);

	$login = $adminLogin->login_admin($admin, $pass);
	
}
?>
<!DOCTYPE html>
<head>
<meta charset="utf-8">
<title>Login</title>
    <link rel="stylesheet" type="text/css" href="css/stylelogin.css" media="screen" />
</head>
<body>
<div class="container">
	<section id="content">
		<form action="login.php" method="post">
			<h1>Admin Login</h1>
			<span><?php echo (isset($login)) ? $login : "" ?></span>
			<div>
				<input type="text" placeholder="Username" required="" name="adminUser"/>
			</div>
			<div>
				<input type="password" placeholder="Password" required="" name="adminPass"/>
			</div>
			<div>
				<input type="submit" name="login" value="Log in" />
			</div>
		</form><!-- form -->
	</section><!-- content -->
</div><!-- container -->
</body>
</html>