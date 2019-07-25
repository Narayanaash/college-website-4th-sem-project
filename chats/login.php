<?php include('../functions.php') ?>

<?php
if (!isLoggedIn()) {
		$_SESSION['msg'] = "You must log in first";
		header('location: login.php');
	}

if (isset($_SESSION['group'])) {
			if (!(($_SESSION['group']['id'])== $_GET['id'])) {
        unset($_SESSION['group']);
		//header('location: login.php');
	
	} else {
    		header('location: chatBox.php');
}
		}

if (isset($_GET['name'])) {
		$_SESSION['r-g'] = $_GET["name"];
	}


?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="description" content="BCA project">
  <meta name="author" content="Aash Narayan Mahato">
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="icon" href="image/web_icon.png"/>
  <title>Online Chat System</title>
  <link type="text/css" rel="stylesheet" href="../style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
  <style>
      .input-group input {
          width: 300px;
      }
    </style>
  <link rel="stylesheet" href="../media_query_for_phone/login.css">
  <link rel="stylesheet" href="../media_query_for_phone/glogin.css">
  
</head>
<body>
    
    <nav class="navbar navbar-default" style="background-color: #21364f; border: 0; border-bottom: 1px solid white; border-radius: 0;">
    <div class="container-fluid">
		<div class="navbar-header">
			<a class="navbar-brand" href="https://www.facebook.com/narayanaash1994" style="color: white;">By Narayan and Raju || Online Chat System</a>
		</div>
		
		<ul class="nav navbar-nav">
			<li><a href="../index.php" style="color: white;"><span class="glyphicon glyphicon-home"></span> Home</a></li>
		</ul>
		
		<ul class="nav navbar-nav navbar-right">
			<li><a href="#account" data-toggle="modal" style="color: white;"><span class="glyphicon glyphicon-lock"></span><span id="tab-username"> <?php echo $_SESSION['user']['username']; ?></span></a></li>
			<li class="dropdown">
				<a class="dropdown-toggle" data-toggle="dropdown" href="#" style="color: white;"><span class="caret"></span></a>
                    <ul class="dropdown-menu">
						<li><a href="../upload_image.php" data-toggle="modal"><span class="glyphicon glyphicon-picture"></span> Update Photo</a></li>
						<li class="divider"></li>
                        <li><a href="../index.php?logout='1" data-toggle="modal" style="color: red;"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
                    </ul>
			</li>
		</ul> 
    </div>
</nav>


	<div class="header">
		<h3 style="margin:0; padding: 5px;">Join Group</h3>
	</div>
	
	<form method="post" action="../functions.php">

		<?php echo display_error(); ?>

		<div class="input-group">
			<label>Group Name</label>
			<input type="text" name="groupname" required readonly value="<?php echo $_SESSION['r-g']; ?>" style="background-color: #d3d3d3; outline: none; cursor: not-allowed; padding-left: 0; padding: 20px;">
		</div> 
		<div class="input-group">
			<label>Group Password</label>
			<input type="password" name="Gpassword" required style="padding: 20px;">
		</div>
		<div class="input-group">
			<button type="submit" class="btn" name="Glogin_btn">Join</button>
		</div>

	</form>


</body>
</html>