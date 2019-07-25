<?php 
	include('functions.php');

	if (!isLoggedIn()) {
		$_SESSION['msg'] = "You must log in first";
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
  <link rel="apple-touch-icon" sizes="57x57" href="webicon/apple-icon-57x57.png">
<link rel="apple-touch-icon" sizes="60x60" href="webicon/apple-icon-60x60.png">
<link rel="apple-touch-icon" sizes="72x72" href="webicon/apple-icon-72x72.png">
<link rel="apple-touch-icon" sizes="76x76" href="webicon/apple-icon-76x76.png">
<link rel="apple-touch-icon" sizes="114x114" href="webicon//apple-icon-114x114.png">
<link rel="apple-touch-icon" sizes="120x120" href="webicon//apple-icon-120x120.png">
<link rel="apple-touch-icon" sizes="144x144" href="webicon//apple-icon-144x144.png">
<link rel="apple-touch-icon" sizes="152x152" href="webicon//apple-icon-152x152.png">
<link rel="apple-touch-icon" sizes="180x180" href="webicon//apple-icon-180x180.png">
<link rel="icon" type="image/png" sizes="192x192"  href="/android-icon-192x192.png">
<link rel="icon" type="image/png" sizes="32x32" href="webicon/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="96x96" href="webicon/favicon-96x96.png">
<link rel="icon" type="image/png" sizes="16x16" href="webicon/favicon-16x16.png">
<link rel="manifest" href="webicon//manifest.json">
<meta name="msapplication-TileColor" content="#ffffff">
<meta name="msapplication-TileImage" content="webicon//ms-icon-144x144.png">
<meta name="theme-color" content="#ffffff">
  <title>Online Chat System</title>
  <link type="text/css" rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
  <style>
      #status-div {
          font-size: 14px;
          margin-right: 30px; 
          font-family: sans-serif; 
          font-weight: bold; 
          color: white;
          margin-left: 40px; 
          text-align: justify; 
          padding-top: 10px;
          padding-bottom: 15px;
      }
      .Table
    {
        display: table;
        width: 100%;
    }
   
    .Heading
    {
        display: table-row;
        text-align: center;
        background-color: #0d4d99;
        color: white;
    }
    .Row
    {
        display: table-row;
    }
    .Cell
    {
        display: table-cell;
        border-bottom: 1px solid grey;
        padding-left: 10px;
        padding-right: 5px;
        padding-top: 5px;
        text-align: center;
    }
    </style>
  <link rel="stylesheet" href="media_query_for_phone/home.css">
  
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
                        <li><a href="index.php?logout='1'" data-toggle="modal" style="color: red;"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
                    </ul>
			</li>
		</ul> 
    </div>
</nav>

		<?php if (isset($_SESSION['success'])) : ?>

					<?php 
                        echo "<script type='text/javascript'>alert('". $_SESSION['success'] . " " .$_SESSION['user']['username'] ."!')</script>";
						//echo "alert('". $_SESSION['success'] . "')"; 
						unset($_SESSION['success']);
					?>

		<?php endif ?>
		
		<div class="groupBox left">
		    
		    <div class="header">
		        
		        <h4 style="text-align:left; margin-top:-10px;"><i class="fa fa-list"></i>  List of Chat Groups</h4>
		        
		        <table class="gtable">
		        <tr>
		            <th>GROUP NAME</th>
		            <th>CREATED ON</th>
		            <th>ADMIN</th>
		            <th>JOIN</th>
		            <th>DELETE</th>
		        </tr>
		        
                <?php
    
    include('conn.php');
	
	if($conn->connect_error){
		//echo "Connection was failed";
	}
	
	else{
		
		//echo "Connection made";
		
	}
    
     $query2="SELECT * FROM groups ORDER BY id DESC ";
     $result2=mysqli_query($conn,$query2);
     while($row2=mysqli_fetch_array($result2)) {
         
         $date = $row2['date'] ;
         $dateToPrint = date('j F, y', strtotime($date) ) ;
         $id = $row2["id"];
         
         if($row2['username']==$_SESSION['user']['username']){
             $id = $row2['id'];
         }
         
         echo "<tr><td>".$row2['gname']."</td><td>".$dateToPrint."</td><td>".$row2['username']."</td><td><span style='border-radius: 5px; border: 2px outset #a3a3a3; padding: 2px;'><a href='chats/login.php?id=".$row2['id']."&name=".$row2['gname']. "'style='color: black; text-decoration: none;'><span class='glyphicon glyphicon-comment' style='color: #0aa0a8;'></span>Join</span></a></td><td><a href='delGroup.php?idd=$id' class='del-btn' name='del_btn' style='padding: 5px; background: #95afd8; border-radius: 5px; border: 2px outset #a3a3a3;  margin: 0; padding-top: 2px; padding-bottom: 2px;'><span class='glyphicon glyphicon-trash' style='color: #994747;'></span></a></td></tr>";
     }
         
         ?>
		           <hr> 
		        
		        </table>
		        
		    </div>
		    
		</div>
		
		<div class="user-box">
		    
		</div>
		
        <div class="statusBox right">
		    
		    <div class="header">
                <h5 style="margin-top: -6px;">WELCOME</h5>
		    </div>
       
        <textarea id="status" name="comment" placeholder=" Type your status..." maxlength="500" cols="48" rows="3" style="margin-top: 12px; margin-left: 30px; padding-top: 20px; padding-left: 5px; height: 55px; border-radius: 5px; resize: none;"></textarea>
            <button style="font-size:15px; margin-top: 12px; margin-left: 5px;" id="comment-send-btn" onclick="myFunction()"><b>POST</b></button>
		    
            
		    <div class="user_msg" id="user_msg">
             <div id="status-print"></div>
		    </div>
		    
		</div>
		
		<div class="addGroupBox">
		    <p>Create Chat Groups</p>
		    <h3><a href="create_group.php?userid=<?php echo $_SESSION['user']['user_id']; ?>"><i class="glyphicon glyphicon-plus"></i><span>Add</span></a></h3>
		    
		</div>
<script type="text/javascript" src="chats/ajaxScript.js"></script>


<script>
    
function myFunction() {
       
        var status = $("#status").val();

        $.ajax({
            url: "status-back.php",
            type: "POST",
            async: false,
            data: {
                
                "status-box": status
            },
            success: function(data){
                displayComment();
                $("#status").val('');
            }
        })
   
    
    function displayComment(){
    
    $.ajax({
       
            url: "getStatus.php",
            type: "POST",
            async: false,
            data: {
                "display": 1
            },
            success: function(data2){

                $("#status-print").html(data2);
            }
    });
}
    
}
     setInterval(function(){status()}, 3000)
    function status(){
        $.ajax({
       
            url: "getStatus.php",
            type: "POST",
            async: false,
            data: {
                "display": 1
            },
            success: function(data2){

                $("#status-print").html(data2);
            }
    });
    }
    
     setInterval(function(){online()}, 3000)
     function online(){
        $.ajax({
       
            url: "get_online_status.php",
            type: "POST",
            async: false,
            data: {
                "display": 1
            },
            success: function(data7){

                $(".user-box").html(data7);
            }
    });
    }
    
    function status_delete(y) {
    
       
        var delId = y;

        $.ajax({
            url: "delStatus.php",
            type: "POST",
            async: false,
            data: {
                
                "delete": 1,
                "delId" : delId
            },
            success: function(){
            
            }
        })
        
    }
    
     function status_like(x) {
    
        var id =   x;

        $.ajax({
            url: "statusLike.php",
            type: "POST",
            async: false,
            data: {
                
                "like": 1,
                "likeId" : id
            },
            success: function(){
                
            }
        })
        
    }
    
    $(document).ready(function(){
      status();
      online();
    });
    
</script>

</body>
</html>