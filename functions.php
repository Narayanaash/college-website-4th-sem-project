<?php 
	session_start();

	// connect to database
	include('conn.php');

	// variable declaration
	$username = "";
	$email    = "";
	$errors   = array();
    $success  = "";
    $success  = array();

	// call the register() function if register_btn is clicked
	if (isset($_POST['register_btn'])) {
		register();
	}

	// call the login() function if register_btn is clicked
	if (isset($_POST['login_btn'])) {
		login();
	}

if (isset($_POST['Glogin_btn'])) {
		Glogin();
	}

if (isset($_GET['receiver'])) {
    
		$_SESSION['receiver'] = $_GET['receiver'];
    
        $roomName = $_SESSION['user']['username'].$_SESSION['receiver'];
        $roomName2 = $_SESSION['receiver'].$_SESSION['user']['username'];

        $userid = $_SESSION["user"]["user_id"];
        $username = $_SESSION["user"]["username"];
    
        $queryP = "SELECT * FROM login_details WHERE room='$roomName' LIMIT 1";
        $resultsP = mysqli_query($conn, $queryP);
        
        if (mysqli_num_rows($resultsP) == 0){
        $queryP = "INSERT INTO login_details (user_id, username, room) VALUES('$userid', '$username', '$roomName')";
    
        mysqli_query($conn, $queryP);
}
	}

	if (isset($_GET['logout'])) {
        
        $user_id2 = $_SESSION["user"]["user_id"];
        $query9 = "UPDATE users SET online='offline' WHERE user_id='$user_id2' ";
        mysqli_query($conn, $query9);
        
		session_destroy();
		unset($_SESSION['user']);
        unset($_SESSION['group']);
		header("location: ../login.php");
	}

if (isset($_GET['logout-group'])) {
        unset($_SESSION['group']);
		//header("location: ../login.php");
	}

	// REGISTER USER
	function register(){
		global $conn, $errors, $success;

		// receive all input values from the form
		$username    =  e($_POST['username']);
		$email       =  e($_POST['email']);
		$password_1  =  e($_POST['password_1']);
		$password_2  =  e($_POST['password_2']);

		// form validation: ensure that the form is correctly filled
		if (empty($username)) { 
			array_push($errors, "Username is required"); 
		}
		if (empty($email)) { 
			array_push($errors, "Email is required"); 
		}
		if (empty($password_1)) { 
			array_push($errors, "Password is required"); 
		}
		if ($password_1 != $password_2) {
			array_push($errors, "The two passwords do not match");
		}

        $query1 = "SELECT * FROM users WHERE username='$username'";
		$results1 = mysqli_query($conn, $query1);
        $query2 = "SELECT * FROM users WHERE email='$email'";
		$results2 = mysqli_query($conn, $query2);

		if (mysqli_num_rows($results1) == 1) { // user found
         
            array_push($errors, "Username taken!");
            
        }
        
        if (mysqli_num_rows($results2) == 1) { // user found
         
            array_push($errors, "Email already registered!");
            
        }

        
		// register user if there are no errors in the form
		if (count($errors) == 0) {
			$password = md5($password_1);//encrypt the password before saving in the database
                
                $offline = "offline";
				$query = "INSERT INTO users (username, email, password, online) 
						  VALUES('$username', '$email', '$password', '$offline')";
				mysqli_query($conn, $query);

				array_push($success, "successfully registered!");

				$_SESSION['success']  = "You are now logged in";
				
		}

	}

	// return user array from their id
	function getUserById($id){
		global $conn;
		$query = "SELECT * FROM users WHERE id=" . $id;
		$result = mysqli_query($conn, $query);

		$user = mysqli_fetch_assoc($result);
		return $user;
	}

	// LOGIN USER
	function login(){
		global $conn, $username, $errors;

		// grap form values
		$username = e($_POST['username']);
		$password = e($_POST['password']);

		// make sure form is filled properly
		if (empty($username)) {
			array_push($errors, "Username is required");
		}
		if (empty($password)) {
			array_push($errors, "Password is required");
		}

		// attempt login if no errors on form
		if (count($errors) == 0) {
			$password = md5($password);

			$query = "SELECT * FROM users WHERE username='$username' AND password='$password' LIMIT 1";
			$results = mysqli_query($conn, $query);

			if (mysqli_num_rows($results) == 1) { // user found

                $logged_in_user = mysqli_fetch_assoc($results);

					$_SESSION['user'] = $logged_in_user;
					$_SESSION['success']  = "You are now logged in";
                
                    $user_id = $_SESSION["user"]["user_id"];
                    $query8 = "UPDATE users SET online='online' WHERE user_id='$user_id' ";
                    mysqli_query($conn, $query8);
                

					header('location: index.php');
			}else {
				array_push($errors, "Wrong username/password combination");
			}
		}
	}

	function isLoggedIn()
	{
		if (isset($_SESSION['user'])) {
			return true;
		}else{
			return false;
		}
	}


	// escape string
	function e($val){
		global $conn;
		return mysqli_real_escape_string($conn, trim($val));
	}

	function display_error() {
		global $errors;

		if (count($errors) > 0){
			echo '<div class="error">';
				foreach ($errors as $error){
					echo $error .'<br>';
				}
			echo '</div>';
		}
	}

function display_success() {
		global $success;

		if (count($success) > 0){
			echo '<div class="success">';
				foreach ($success as $success){
					echo $success .'<br>';
				}
			echo '</div>';
		}
	}

function isLoggedInGroup()
	{
		if (isset($_SESSION['group'])) {
			return true;
		}else{
			return false;
		}
	}

// LOGIN USER
	function Glogin(){
		global $conn, $username;

		// grap form values
		$groupname = e($_POST['groupname']);
		$gpassword = e($_POST['Gpassword']);
        $password = md5($gpassword);

			$queryg = "SELECT * FROM groups WHERE gname='$groupname' AND password='$password' LIMIT 1";
			$resultsg = mysqli_query($conn, $queryg);

			if (mysqli_num_rows($resultsg) == 1) { // group found
				$logged_in_group = mysqli_fetch_assoc($resultsg);
				
				$_SESSION['group'] = $logged_in_group;
                $groupid = $_SESSION["group"]["id"];
                $userid = $_SESSION["user"]["user_id"];
                $username = $_SESSION["user"]["username"];
                $groupname = $_SESSION["group"]["gname"];
                
                $queryl = "SELECT * FROM login_details WHERE user_id='$userid' AND gname='$groupname' LIMIT 1";
                $resultsl = mysqli_query($conn, $queryl);
                
                if (mysqli_num_rows($resultsl) == 0) {
                $query5 = "INSERT INTO login_details (group_id, user_id, username, gname) 
					  VALUES('$groupid','$userid', '$username', '$groupname')";
		    	mysqli_query($conn, $query5);
                    
                }
                    unset($_SESSION['r-g']);
					header('location: chats/chatBox.php');
				
			}else {
				echo "<script type='text/javascript'>alert('Wrong password!')</script>";
                    header('location: chats/login.php');
               // header( "Refresh:1; url=chats/chatBox.php", true, 303);

			}
		
	}


?>