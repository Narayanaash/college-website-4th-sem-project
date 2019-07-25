<?php

	include('conn.php');

    $username    =  $_SESSION['user']['username'];
	$userid      =  $_SESSION['user']['user_id'];
	$password  =  e($_POST['gpassword']);
	$gname  =  e($_POST['gname']);

    $query2 = "SELECT * FROM groups WHERE gname='$gname'";
    $results2 = mysqli_query($conn, $query2);

if (mysqli_num_rows($results2) != 1) {

if (isset($_POST['group_btn'])) {
    
            $password = md5($password);
			$query = "INSERT INTO groups (user_id, username, password, gname) 
					  VALUES('$userid', '$username', '$password', '$gname')";
			mysqli_query($conn, $query);
			
			header('location: index.php');
}
} else {
        array_push($errors, "Group with the same name already exists! , Try unique name :)"); 
}

?>
