<?php

session_start();

include('../conn.php');

$is_type = $_POST["is_type"];
$user_id = $_SESSION["user"]["user_id"];
$roomName = $_SESSION['user']['username'].$_SESSION['receiver'];

$sql = "UPDATE login_details SET typing_status='$is_type' WHERE room='$roomName' ";

if ($conn->query($sql) === TRUE) {
    //echo "Record updated successfully";
} else {
    //echo "Error updating record: " . $conn->error;
}




?>