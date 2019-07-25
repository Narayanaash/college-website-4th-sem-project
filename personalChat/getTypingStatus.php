<?php
    session_start();
    
    include('../conn.php');
    
    $roomName = $_SESSION['receiver'].$_SESSION['user']['username'];
    if(isset($_POST['display'])){
     $query="SELECT * FROM login_details WHERE typing_status = 'yes' AND room = '$roomName' ORDER BY id DESC";
     $result=mysqli_query($conn,$query);
     while($row=mysqli_fetch_array($result)) {
         
         if($row['user_id'] != $_SESSION['user']['user_id']){
         
         echo "<em style='color: grey; margin-left: 30px; position: relative; float: left;'>".$row['username']." "." is typing...</em><br>"; 
         
    }
    }
    }
?>