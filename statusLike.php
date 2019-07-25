<?php
error_reporting(0);
session_start();

include('conn.php');

if(isset($_POST['like'])){
$cid = ($_POST['likeId']);
    

// sql to update a record
$sql = "UPDATE status SET likes= likes + 1 WHERE id= $cid";

if ($conn->query($sql) === TRUE) {
   echo "Record deleted successfully";
} else {
    echo "Error deleting record: " . $conn->error;
}
   }

$conn->close();
?>