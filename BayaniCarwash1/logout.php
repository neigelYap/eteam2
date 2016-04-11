<?php
	session_start(); // starts the session
	session_destroy();// ends the session and successfulyl logs out the user
	header("location: login.php?msg=You have logged out!");
?>