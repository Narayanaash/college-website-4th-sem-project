<?php
    session_start();
    
    include('../conn.php');

    $gnameid = $_SESSION['group']['id'];
    
    if(isset($_POST['display'])){
     $query="SELECT * FROM chats WHERE group_id= ".$gnameid;
     $result=mysqli_query($conn,$query);
        
     $query2="SELECT id FROM chats WHERE group_id= $gnameid ORDER BY id DESC LIMIT 1";
     $result2=mysqli_query($conn,$query2);
     $row2=mysqli_fetch_array($result2);
     
        
     while($row=mysqli_fetch_array($result)) {
         
         if($_SESSION['key']['id'] < $row['id']) {
         
         $get_time = $row["time"];
         $time = date('h:i A', strtotime($get_time));
         
         if($row['user_id']==$_SESSION['user']['user_id']){
         
         echo "<div id='chat-image-div' style='border-color: #c2e599; margin-top: 10px; position: relative; z-index: 0; margin-left: 295px;'><img src='../uploads/".$row['username'].".jpg' alt='' ></div><div id='msg-container'><p id='message-div' style='background-color: #c2e599; padding: 2px; padding-left: 5px; border-radius: 5px; color: black; margin-top: -35px; margin-right: 25px; float: right; max-width: 200px; min-width: 60px; position: relative;'>".$row['message']."<span style='color: grey; font-size: 10px; padding-top: 10px; float: right; padding-right: 5px; padding-left: 5px;'><small> $time</small></span></p><div class='clear' style='clear: both;'> </div></div>"; 
         
         if(!empty($row['imageAdd'])) {
             echo "<a href='".$row['imageAdd']."' target='_blank'><div style='width: 200px; height: auto; max-height: 150px; min-height:100px; overflow: hidden; margin: 10px; margin-top: 5px; border:5px solid #c2e599; border-radius: 5px; margin-left: 110px; background-image: url(../images/v.jpg); background-size: cover;'><img src='".$row['imageAdd']."' alt= '' style='max-width:100%;'></div></a>";
         }
        
     } else {
             
             echo "<div id='chat-image-div' style='margin-left: -20px; margin-top: 10px; position: relative;'><img src='../uploads/".$row['username'].".jpg' alt='' ></div><div id='msg-container'><p id='message-div' style='border-radius: 5px; background-color: white; color: black; padding: 2px; padding-left: 5px; margin-left: 30px; margin-top: -35px; float: left; max-width: 200px; min-width: 60px;'>".$row['message']."<span style='color: grey; font-size: 10px; padding-top: 10px; float: right; padding-right: 5px; padding-left: 5px;'><small> $time</small></span></p><div class='clear' style='clear: both;'> </div></div>"; 
         
         if(!empty($row['imageAdd'])) {
             echo "<a href='".$row['imageAdd']."' target='_blank'><div style='width: 200px; height: auto; max-height: 150px; min-height: 100px; background-image: url(../images/v.jpg); background-size: cover; overflow: hidden; margin: 10px; margin-top: 5px; border:5px solid white; border-radius: 5px;'><img src='".$row['imageAdd']."' alt= '' style='max-width:100%;'></div></a>";
         }
        
             echo "<script>playtone();</script>";
             
         }
     }
     
     }                                      
        if($_SESSION['key']['id'] < $row2['id']) {
        $_SESSION['key'] = $row2;
        
            echo "<script>var \$t = $('.commentSpace');
                \$t.animate({'scrollTop': $('.commentSpace')[0].scrollHeight}, 'normal');</script>";
            
        }
    }

?>