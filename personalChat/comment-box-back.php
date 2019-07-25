<?php
    session_start();
    
    $commentText="";

	include('../conn.php');

    $commentText = test_input($_POST['comment-box']);
    $userid1 = $_SESSION['user']['user_id'];
    $receiver = $_SESSION['receiver'];
    $uname1 = $_SESSION['user']['username'];
    $gname1 = $_SESSION['user']['username'].$_SESSION['receiver'];
    date_default_timezone_set("Asia/Calcutta");
    $time = date('Y-m-d H:i:s');

    function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
 }

if(!empty($commentText)) {
    $sql = "INSERT INTO personalchat (message, user_id, sender, receiver, room, time, username) VALUES ('$commentText', '$userid1', '$uname1', '$receiver', '$gname1', '$time', '$uname1')";

    if ($conn->query($sql) === TRUE) {
        //$last_id = $conn->insert_id;
        //echo "New record created successfully";
        
    } else {
        //echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
    $conn->close();

?>