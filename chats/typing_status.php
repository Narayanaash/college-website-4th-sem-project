<?php

session_start();

include('../conn.php');

$is_type = $_POST["is_type"];
$user_id = $_SESSION["user"]["user_id"];
$gname = $_SESSION["group"]["gname"];

$sql = "UPDATE login_details SET typing_status='$is_type' WHERE user_id='$user_id' AND gname='$gname'";

if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $conn->error;
}




?>