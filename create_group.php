<?php 
	include('functions.php');

	if (!isLoggedIn()) {
		$_SESSION['msg'] = "You must log in first";
		header('location: login.php');
	}

if (isLoggedInGroup()) {
		header('location: index.php');
	}

   if (isset($_POST['group_btn'])) {
		 include('create_group_back.php');
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
  <link type="text/css" rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style>
      .input-group input{
    width: 300px;
      padding: 20px;
      }
    </style>
  <link rel="stylesheet" href="media_query_for_phone/login.css">
  <link rel="stylesheet" href="media_query_for_phone/makeGroup.css">
</head>
<body>

<nav class="navbar navbar-default" style="background-color: #21364f;">
    <div class="container-fluid">
		<div class="navbar-header">
			<a class="navbar-brand" href="https://www.facebook.com/narayanaash1994" style="color: white;">By Narayan and Raju || Online Chat System</a>
		</div>
		
		<ul class="nav navbar-nav">
			<li><a href="index.php" style="color: white;"><span class="glyphicon glyphicon-home"></span> Home</a></li>
		</ul>
		
		<ul class="nav navbar-nav navbar-right">
			<li><a href="#account" data-toggle="modal" style="color: white;"><span class="glyphicon glyphicon-lock"></span><span id="tab-username"> <?php echo $_SESSION['user']['username']; ?></span></a></li>
			<li class="dropdown">
				<a class="dropdown-toggle" data-toggle="dropdown" href="#" style="color: white;"><span class="caret"></span></a>
                    <ul class="dropdown-menu">
						<li><a href="upload_image.php"><span class="glyphicon glyphicon-picture"></span> Update Photo</a></li>
						<li class="divider"></li>
                        <li><a href="index.php?logout='1" data-toggle="modal" style="color: red;"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
                    </ul>
			</li>
		</ul> 
    </div>
</nav>

<div class="header">
		<h2>Add Group</h2>
	</div>
	
	<form method="post" action="create_group.php">


		<div class="input-group">
			<label>Group Name</label>
			<input type="text" name="gname" required maxlength="10" autocomplete="off" placeholder="group name must be unique...">
		</div>
		<div class="input-group">
			<label>Group Password</label>
			<input type="password" name="gpassword" required>
		</div>

		<div class="input-group">
			<button type="submit" class="btn" name="group_btn">Submit</button>
		</div>
		
		<?php echo display_error(); ?>
	</form>

</body>
</html>