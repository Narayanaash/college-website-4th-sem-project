<?php
    session_start();
    
    $commentText="";

	include('../conn.php');

    $commentText = test_input($_POST['comment-box']);
    $getGid = $_SESSION['group']['id'];
    $userid1 = $_SESSION['user']['user_id'];
    $uname1 = $_SESSION['user']['username'];
    $gname1 = $_SESSION['group']['gname'];
    date_default_timezone_set("Asia/Calcutta");
    $time = date('Y-m-d H:i:s');

    function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
 }

if(!empty($commentText)) {
    $sql = "INSERT INTO chats (message, group_id, user_id, username, gname, Time) VALUES ('$commentText', '$getGid', '$userid1', '$uname1', '$gname1', '$time')";

    if ($conn->query($sql) === TRUE) {
        //$last_id = $conn->insert_id;
        //echo "New record created successfully";
        
    } else {
        //echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
    $conn->close();

?>