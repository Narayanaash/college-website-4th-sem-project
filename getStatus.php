<?php
    session_start();
    
    include('conn.php');
 
    if(isset($_POST['display'])){
     $query="SELECT * FROM status ORDER BY id DESC";
     $result=mysqli_query($conn,$query);
     while($row=mysqli_fetch_array($result)) {
         
         if($row['username'] == $_SESSION['user']['username']){
           $delete_icon = '<button id="status_delete" onclick="status_delete('.$row['id'].')"  style="color: grey; font-size: 14px; background-color: transparent; outline: none; border: 0; margin-left: 120px;"><span class="glyphicon glyphicon-trash red"></span></button>';
         } else {
             $delete_icon = '';
         }
         
          if($row['likes']==0){
             $like_numbers = "";
         } else{
              $like_numbers = $row["likes"];
          }
         
         $like_icon = '<button id="status_like" onclick="status_like('.$row['id'].')" style="color: #8c8c8c; margin-top: -10px; font-size: 22px; background-color: transparent; outline: none; border: 0; margin-left: 42px;"><span class="fa fa-thumbs-up like"></span></button> <span style="color: #d8ffe0; font-size: 12px;">'. $like_numbers.'</span>';
         
         $get_time = $row["date"];
         $time = date('j F, y - h:i A', strtotime($get_time));
                  
         echo "<div id='chat-image-div'><img src='uploads/".$row['username'].".jpg' alt='' ></div><div id='username-div'><p>".$row['username']."</p></div><div id='status-div'>".$row['status']."</div>$like_icon $delete_icon<span style='color: grey; font-size: 14px; float: right; margin-right: 30px; ;'><small> $time</small></span><div style='clear: both;'></div><hr id='status-hr'>";         
     }
    }

?>