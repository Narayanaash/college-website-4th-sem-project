<?php 
	include('../functions.php');

    if (isset($_POST['submit'])) {
		 include('../imageshare/back.php');
	}
   

	if (!isLoggedIn()) {
		$_SESSION['msg'] = "You must log in first";
		header('location: ../login.php');
	}

if (!isLoggedInGroup()) {
		$_SESSION['Gmsg'] = "You must join a group first";
		header('location: login.php');
	}
ini_set('upload_max_filesize', '4M');
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="description" content="BCA project">
  <meta name="author" content="Aash Narayan Mahato">
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  
  <link rel="apple-touch-icon" sizes="57x57" href="../webicon/apple-icon-57x57.png">
<link rel="apple-touch-icon" sizes="60x60" href="../webicon/apple-icon-60x60.png">
<link rel="apple-touch-icon" sizes="72x72" href="../webicon/apple-icon-72x72.png">
<link rel="apple-touch-icon" sizes="76x76" href="../webicon/apple-icon-76x76.png">
<link rel="apple-touch-icon" sizes="114x114" href="../webicon//apple-icon-114x114.png">
<link rel="apple-touch-icon" sizes="120x120" href="../webicon//apple-icon-120x120.png">
<link rel="apple-touch-icon" sizes="144x144" href="../webicon//apple-icon-144x144.png">
<link rel="apple-touch-icon" sizes="152x152" href="../webicon//apple-icon-152x152.png">
<link rel="apple-touch-icon" sizes="180x180" href="../webicon//apple-icon-180x180.png">
<link rel="icon" type="image/png" sizes="192x192"  href="../webicon/android-icon-192x192.png">
<link rel="icon" type="image/png" sizes="32x32" href="../webicon/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="96x96" href="../webicon/favicon-96x96.png">
<link rel="icon" type="image/png" sizes="16x16" href="../webicon/favicon-16x16.png">
<link rel="manifest" href="../webicon//manifest.json">
<meta name="msapplication-TileColor" content="#ffffff">
<meta name="msapplication-TileImage" content="../webicon//ms-icon-144x144.png">
<meta name="theme-color" content="#ffffff">
    <title>Online Chat System</title>
  <link type="text/css" rel="stylesheet" href="../style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="../imageshare/style.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script>
  <script type="text/javascript" src="ajaxScript.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/emojionearea/3.4.1/emojionearea.min.css" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/emojionearea/3.4.1/emojionearea.min.js"></script>
  
  <style>
    /* Track */
::-webkit-scrollbar-track {
  background: #041a3a; 
}
 
/* Handle */
::-webkit-scrollbar-thumb {
  background: #041f46; 
}

/* Handle on hover */
::-webkit-scrollbar-thumb:hover {
  background: #555; 
}
      /* image send */
      
      .custom-file-input {
  color: transparent;
}
.custom-file-input::-webkit-file-upload-button {
  visibility: hidden;
}
.custom-file-input::before {
  content: '';
  color: black;
  display: inline-block;
  background: -webkit-linear-gradient(top, #f9f9f9, #e3e3e3);
  background-image: url('../images/Business_Office_circle_attach_attachment_file_download-512.png');
  background-size: contain;
  background-repeat: no-repeat;
  border: 0;
  border-radius: 3px;
  padding: 5px 8px;
  outline: none;
  white-space: nowrap;
  -webkit-user-select: none;
  cursor: pointer;
  text-shadow: 1px 1px #fff;
  font-weight: 700;
  font-size: 10pt;
  width: 30px;
  height: 30px;
}
.custom-file-input:hover::before {
  border-color: black;
}
.custom-file-input:active {
  outline: 0;
}
.custom-file-input:active::before {
  
}
      
      /* image send end */
    
      .emojionearea-scroll-area::-webkit-scrollbar-track {
  background: #e5e5e5; 
  border-radius: 5px;
}
 
/* Handle */
  .emojionearea-scroll-area::-webkit-scrollbar-thumb {
  background: white; 
}

      .emojionearea.emojionearea-standalone .emojionearea-editor{
          display: none;
      }
      
      .emojionearea.emojionearea-standalone .emojionearea-button>div {
    right: -54px;
    top: -21px;
      }
      
      .emojionearea .emojionearea-picker.emojionearea-picker-position-top {
    margin-top: -286px;
    right: -25px;
          width: 250px;
}
      .emojionearea .emojionearea-button.active+.emojionearea-picker-position-top {
    margin-top: -280px;
    margin-left: -50px;
}
      .emojionearea .emojionearea-picker .emojionearea-wrapper {
    position: relative;
    height: 276px;
    width: 250px;
}
    </style>
  
</head>
<body>


<nav class="navbar navbar-default" style="background-color: #21364f; border: 0; border-radius: 0; border-bottom: 1px solid white;">
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
                        <li><a href="../index.php?logout-group='1" data-toggle="modal" style="color: orange;"><span class="glyphicon glyphicon-log-out"></span> Leave Group</a></li>
                    </ul>
			</li>
		</ul> 
    </div>
</nav>




<div class="chat">
		<div class="chatHeader">Welcome to the chat room- <?php echo $_SESSION['group']['gname']; ?></div>
		<div id="Box">
     
       <div class="commentSpace" id="messages">  
       <div id="put_comments" style='width: 100%;'></div>
       <span style="float: left; position: relative; top: 20px; font-weight: bold;" id="typing"></span>
       </div>
       <textarea name="comment" id="comment-box" placeholder="your message..." maxlength="200" ></textarea>
    <button style="font-size:15px" id="comment-send-btn">send <i class="fa fa-fighter-jet"></i></button>
 </div>
        
        <form id="" name="myForm" method="post" action="chatBox.php" enctype="multipart/form-data" style="background-color: transparent; border: none; float: right;">

			<input type="file" name="fileToUpload" class="custom-file-input" id="fileToUpload" required style="position: absolute; outline: none; width: 30px; margin-top: -135px;" >
		
			<button type="submit" class="imagesharebtn" name="submit" style="position: absolute; outline: none; width: 30px; margin-top: -132px; margin-left: 30px; background-color: transparent; border: 0;"><span style="font-size: 25px; color: #296802;" class="glyphicon glyphicon-send
"></span></button>
    
      <div id="emoji"><textare id="comment-emoji"></textare></div>
		
	</form>
        
	</div>
	
	
<script>
    
     if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
    
    setInterval(function(){chat()}, 1000)
    function chat(){
        
    displayComment();

    }
    
    setInterval(function(){typingStatus()}, 1000)
    function typingStatus(){
        
    displayTypingStatus();    

    }
    
    function playtone() {
        document.getElementById("beepSound").play();
    }
    
    //typing
    
    $(document).on('focus', '#comment-box', function(){
  var is_type = 'yes';
  $.ajax({
   url:"typing_status.php",
   method:"POST",
   data:{is_type:is_type},
   success:function()
   {
       displayTypingStatus();
   }
  })
 });

 $(document).on('blur', '#comment-box', function(){
  var is_type = 'no';
  $.ajax({
   url:"typing_status.php",
   method:"POST",
   data:{is_type:is_type},
   success:function()
   {
    $("#typing").html('');
   }
  })
 });
    
    
     $('#comment-send-btn').click(function(){
        
  var is_type = 'no';
  $.ajax({
   url:"typing_status.php",
   method:"POST",
   data:{is_type:is_type},
   success:function()
   {
       
   }
  })
     });
    //typing end
    
 $(document).ready(function() {
  var a = $("#comment-emoji").emojioneArea({
    standalone: true,
    autocomplete: false,
    tones: true,
    pickerPosition: "top"
  });
  const emojionearea = a[0].emojioneArea
  emojionearea.setText('')
  emojionearea.on('picker.hide', function () {
    const emoji = emojionearea.getText()
		  emojionearea.setText('')  
		if (emoji) {
            var bvalue =  $("#comment-box").val()+ emoji;
			console.log(emoji) // HERE YOU HAVE YOUR EMOJI, OR '' IF NO ONE PICKER
            $("#comment-box").val(bvalue);
    }
  })
});

 window.onload = () => { let el = document.querySelector('[alt="www.000webhost.com"]').parentNode.parentNode; el.parentNode.removeChild(el); }
    
</script>

    <audio id="beepSound">
        <source src="../tone/plucky.mp3">
	<source src="../tone/plucky.ogg">
    </audio>

</body>
</html>