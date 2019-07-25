<?php include('functions.php')?>

<?php
    
    if (isLoggedIn()) {
		header('location: index.php');
	}
    
    $name = "";
    if(isset($_POST["login_btn"])){
        $name = $_POST['username'];
    }
    
?>
    
<!DOCTYPE html>
<html>
<head>
	<title>Online Chat System</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" href="media_query_for_phone/login.css">
</head>
<body id="login-body">

	<div class="header">
		<h2>Login</h2>
	</div>
	
	<form method="post" action="login.php">

		<?php echo display_error(); ?>

		<div class="input-group">
			<label>Username</label>
			<input type="text" name="username" autocomplete="off" value="<?php echo $name; ?>" >
		</div>
		<div class="input-group">
			<label>Password</label>
			<input type="password" name="password">
		</div>
		<div class="input-group">
			<button type="submit" class="btn" name="login_btn">Login</button>
		</div>
		<p>
			Not yet a member? <a href="register.php">Sign up</a>
		</p>
	</form>


</body>
</html>