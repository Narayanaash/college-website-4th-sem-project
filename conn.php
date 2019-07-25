<?php

	$dbhost = "localhost";
	$dbuser = "root";
	$dbpass = "";
	$dbase 	= "chat_system";
    
    date_default_timezone_set('Asia/Kolkata');
	
	$conn = new mysqli ($dbhost,$dbuser,$dbpass,$dbase);

	

	if($conn->connect_error){
		//echo "Connection was failed";
	}
	
	else{
		
		//echo "Connection made";
		
	}

mysqli_set_charset($conn,"utf8mb4");

?>