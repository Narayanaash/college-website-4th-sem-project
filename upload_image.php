<?php 
	include('functions.php');

if (isset($_POST['submit'])) {
		 include('upload_image_back.php');
	}
   

	if (!isLoggedIn()) {
		$_SESSION['msg'] = "You must log in first";
		header('location: login.php');
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
  <link rel="stylesheet" href="media_query_for_phone/login.css">
  <link rel="stylesheet" href="media_query_for_phone/upload_img.css">
</head>
<body>

<nav class="navbar navbar-default" style="background-color: #21364f; border: 0; border-bottom: 1px solid white; border-radius: 0;">
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

<div class="image">
    <img src="uploads/<?php echo $_SESSION['user']['username']; ?>.jpg" alt="">
</div>

	<div class="header">
		<h2>Upload Image</h2>
	</div>
	
	<form method="post" action="upload_image.php" enctype="multipart/form-data">


		<div class="input-group">
			<label>Select image to upload</label>
			<input type="file" name="fileToUpload" id="fileToUpload" required style="padding: 15px; width: 100%; padding-top:5px; padding-bottom: 30px;" >
		</div>
		
		<div class="input-group" style="margin:auto; margin-top: 20px;">
			<button type="submit" class="btn" name="submit">Submit</button><br>
			<br/>
			
		</div>
		
		<div class="input-group">
            <div style="width: 300px;"><?php echo display_error(); ?></div>
        </div>
		
	</form>
	
    <script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
</script>
	
</body>
</html>