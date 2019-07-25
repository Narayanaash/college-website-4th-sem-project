<?php
error_reporting(0);
session_start();

include('conn.php');

if(isset($_POST['delete'])){
$cid = ($_POST['delId']);
$query="SELECT username FROM status WHERE id = $cid";
$result=mysqli_query($conn,$query);
$row=mysqli_fetch_array($result);

if($row['username']==$_SESSION['user']['username']){
// sql to delete a record
$sql = "DELETE FROM status WHERE id= $cid";

if ($conn->query($sql) === TRUE) {
   //echo "Record deleted successfully";
} else {
    //echo "Error deleting record: " . $conn->error;
}
   }
    
}

$conn->close();
?>