<?php
	
	if(isset($_POST['customerEntry'])){
		
		define('DOC_ROOT', dirname(__FILE__));
		include (DOC_ROOT.'/config.php');
		
		$firstName = $_POST['firstName'];
		$lastName = $_POST['lastName'];
		$middleName = $_POST['middleName'];
			$fullName = $firstName." ".$lastName;
		
		$tel = $_POST['telephoneNum'];
		$cellType = $_POST['subscription'];
		$cellNum = $_POST['cellphoneNum'];
		$cell;
		if(isset($_POST['cellphoneNum'])){
			$cell=$cellType.$cellNum;
		}else{
			$cell="None";
		}
		
		$email = $_POST['email'];
		
		$firstName = mysql_real_escape_string($firstName); // removes quotes/un-quote marks on string
		$lastName = mysql_real_escape_string($lastName);
		$middleName = mysql_real_escape_string($middleName);
		
		$tel = mysql_real_escape_string($tel);
		$cell = mysql_real_escape_string($cell);
		$email = mysql_real_escape_string($email);
		
		if($tel < 1000000 || $tel > 9999999){
			$msg="Invalid Telephone Number.";
			header("location: customerform.php?msg=$msg");
		}else if($cell=="None"){
			if($cellNum < 1000000 || $cellNum > 9999999){
				$msg="Invalid Cellphone Number.";
				header("location: customerform.php?msg=$msg");
			}
		}else{
			
			$customerCheck = "SELECT * FROM customers WHERE fullname = '$fullName'";
			$result = mysqli_query($connect, $customerCheck);
			
			if(mysqli_num_rows($result) > 0){
				setcookie('fullName', $fullName);
			}else{
				$insert_cust = "INSERT INTO customers (lastname, firstname, middlename, tel_num, contact_num, email,fullname)
				VALUES('$lastName','$firstName','$middleName','$tel','$cell','$email','$fullName')";
				
	// 			session_start();
	// 			$_SESSION['customer'] = $insert_cust;
	// 			$_SESSION['fullName']=$fullName;
				setcookie('customer', $insert_cust);
				setcookie('fullName', $fullName);
			}
			header("location: carforms.php");
		}

		mysqli_close($connect);
	}else{
		header("location: customerform.php");
	}
?>