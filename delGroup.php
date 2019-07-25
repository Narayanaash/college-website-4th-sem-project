<?php

session_start();

include('conn.php');

$gid = ($_GET['idd']);

$query="SELECT username FROM groups WHERE id = $gid";
$result=mysqli_query($conn,$query);
$row=mysqli_fetch_array($result);

if($row['username']==$_SESSION['user']['username']){
// sql to delete a record
$sql = "DELETE FROM groups WHERE id= $gid";
}

if ($conn->query($sql) === TRUE) {
    //echo "Record deleted successfully";
    unset($_SESSION['group']);
    header('location: index.php');
} else {
    //echo "Error deleting record: " . $conn->error;
    header('location: index.php');
}

$conn->close();
?>