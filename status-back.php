<?php
    
    session_start();
    include('conn.php');

    $status = test_input($_POST['status-box']);
    $statususer = $_SESSION['user']['username'];
    
    function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
 }

if(!empty($status)) {
    $sql = "INSERT INTO status (status, username) VALUES ('$status', '$statususer')";

    if ($conn->query($sql) === TRUE) {
        //$last_id = $conn->insert_id;
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
    $conn->close();

?>