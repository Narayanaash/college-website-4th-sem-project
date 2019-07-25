<?php

    session_start();
    include('conn.php');

        echo '<div class="Table">
        <div class="Heading">
        <div class="Cell" style="border-right: 1px solid grey;">
            <p><i style="color: #232323; float: left;" class="fa fa-user"></i>MEMBER</p>
        </div>
        <div class="Cell" style="border-right: 1px solid grey;">
            <p>ACTIVE STATUS</p>
        </div>
        <div class="Cell">
            <p>CHAT</p>
        </div>
    </div>';
    
     $username = $_SESSION['user']['username'];
     if(isset($_POST['display'])){
     $query="SELECT * FROM users WHERE username != '$username'";
     $result=mysqli_query($conn,$query);
     while($row=mysqli_fetch_array($result)) {
         
         if($row['username'] != $_SESSION['user']['username']){
             
             if($row["online"] == 'online') {
                
                 echo '<div class="Row">
        <div class="Cell">
            <p id="tab-username">'.$row["username"].'</p>
        </div>
        <div class="Cell">
            <p style="border-radius: 10px; background: green; width: 50px; margin: auto; text-align: center; padding: 2px; font-weight: bold; color: white; font-size: 12px;">'.$row["online"].'</p>
        </div>
        <div class="Cell">
            <p><a href="personalChat/chatBox.php?receiver='.$row["username"].'"><i style="color: #0b9cc4; font-weight: bold; font-size: 20px; text-shadow: 2px 1px 1px black;" class="fa fa-comment"></i></a></p>
        </div>
    </div>';
        
         }
    }
    }
    }

if(isset($_POST['display'])){
     $query="SELECT * FROM users WHERE username != '$username'";
     $result=mysqli_query($conn,$query);
     while($row=mysqli_fetch_array($result)) {
         
         if($row['username'] != $_SESSION['user']['username']){
             
             if($row["online"] == 'offline') {
         
         echo '<div class="Row">
        <div class="Cell">
            <p id="tab-username">'.$row["username"].'</p>
        </div>
        <div class="Cell">
            <p style="border-radius: 10px; background: grey; width: 50px; margin: auto; text-align: center; padding: 2px; font-weight: bold; font-size: 12px; color: white;">'.$row["online"].'</p>
        </div>
        <div class="Cell">
            <p><a href="personalChat/chatBox.php?receiver='.$row["username"].'"><i style="color: #0b9cc4; font-weight: bold; font-size: 20px; text-shadow: 2px 1px 1px black;" class="fa fa-comment"></i></a></p>
        </div>
    </div>';
        
         }
    }
    }
    
    echo "</div></table>";
    
    }
?>