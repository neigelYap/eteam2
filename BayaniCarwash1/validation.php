<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=Cp1252">
</head>
	<body>
<?php 
	define('DOC_ROOT', dirname(__FILE__)); // needed to set connection 
	$user = $_POST['userName'];
	$pass = $_POST['pass'];
	
	if(isset($user, $pass)){
		ob_start(); // starts a new output buffer
		include (DOC_ROOT.'/config.php'); // sets database connection config.php
		// MySQL injection protection
		
		$username = stripslashes($user); // removes quotes/un-quote marks on string
		$password = stripslashes($pass);
		$safeUsername = mysqli_real_escape_string($connect, $username); // removes escape characters on input string
		$safePassword = mysqli_real_escape_string($connect, $password);

		$selectTable = "SELECT * FROM admin WHERE username='$safeUsername' and password_=SHA('$safePassword')"; // selects entry in admin table
		
		$result = mysqli_query($connect, $selectTable);
		$count = mysqli_num_rows($result);
		// if the index (id) selected in $result is equal to 1
		if($count == 1){
			// registers the admin account and redirects to the admin page
			session_start();
			$_SESSION['loginUser']=$safeUsername;
			header("location: adminPage.php");
		}else{
			// passes a message to the login screen and redirects it
			$msg = "Wrong Username or Password. Please try again.";
			header("location: login.php?msg=$msg");
		}

		ob_end_flush(); // ends the output buffer
	}else{
		header("location: login.php?msg=Please enter a Username and Password.");
	}
?>
</body>
</html>