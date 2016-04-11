<?php
	$dbhost = "localhost";
	$dbuser = "root";
	$dbpass = "";
	$dbName = "bayanicarwash";
	    
	$connect = mysqli_connect($dbhost,$dbuser,$dbpass,$dbName) or die("ERROR: Database connection failed");
	    
// 	if($connect == true){
// 	    print "MESSAGE: Database connection success";
// 	}
?>