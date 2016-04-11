<?php
	
	if(isset($_POST['transact'])){
		
		define('DOC_ROOT', dirname(__FILE__));
		include (DOC_ROOT.'/config.php');
		
// 		session_start();
		$payment = $_POST['payment'];
		$servicesChosen = $_POST['Name'];
		$comment = $_POST['comment'];
		
		$comment = mysql_real_escape_string($comment);
		$payment = mysql_real_escape_string($payment);
		if($servicesChosen == 0){
			$msg="Please tick a service box.";
			header("location: transaction.php?msg=$msg");
		}else if($payment <= 0){
			$msg="Invalid Payment.";
			header("location: transaction.php?msg=$msg");
		}else{

			if(isset($_COOKIE['customer']) && isset($_COOKIE['car'])){
				
				// no existing record
		
				mysqli_select_db($dbName);
				$insertCust = mysqli_query($connect, $_COOKIE['customer']);
				$insertCar = mysqli_query($connect, $_COOKIE['car']);
				$fullName = $_COOKIE['fullName'];
				$temp = "INSERT INTO records (cust_id, car_id) SELECT customers.id, cars.id FROM customers 
				INNER JOIN cars ON customers.fullname = cars.fullname WHERE customers.fullname = '$fullName'";
				$mergeTables = mysqli_query($connect, $temp);
		
				$servicesChosen = $_POST['Name'];
				
				$services="";
				for($index = 0;$index < count($servicesChosen); $index++){
					$temp2 = "SELECT services.id FROM services WHERE services.service_name = '$servicesChosen[$index]'";
					$selection = mysqli_query($connect, $temp2);
					
					$output = mysqli_fetch_assoc($selection);
					if($services == ""){
						$services = $services.$output['id'];
					}else{
						$services = $services.", ".$output['id'];
					}
					
				}
				
				$select_customer_car = "SELECT customers.id, cars.id FROM customers INNER JOIN cars ON 
				customers.fullname = cars.fullname WHERE customers.fullname = '$fullName'";
				$sample2 = mysqli_query($connect, $select_customer_car);
				$temp3 = mysqli_fetch_assoc($sample2);
				$customerId = $temp3['id'];
				$carId = $temp3['id'];
				
				$select_record = "SELECT records.id FROM records WHERE records.cust_id = '$customerId' AND records.car_id = '$carId'";
				$select = mysqli_query($connect, $select_record);
				$records = mysqli_fetch_assoc($select);
				$recordId = $records['id'];
				
				
			}else if(!isset($_COOKIE['customer']) && isset($_COOKIE['car'])){
				
				// existing customer, not existing car
				
				mysqli_select_db($dbName);
				$plate = $_COOKIE['plate'];
					$insertCar = mysqli_query($connect, $_COOKIE['car']);
					$fullName = $_COOKIE['fullName'];
					$temp = "INSERT INTO records (cust_id, car_id) SELECT customers.id, cars.id FROM customers INNER JOIN 
					cars ON customers.fullname = cars.fullname WHERE customers.fullname = '$fullName' AND cars.plate_num='$plate'";
					$mergeTables = mysqli_query($connect, $temp);
					
					$servicesChosen = $_POST['Name'];
					
					$services="";
					for($index = 0;$index < count($servicesChosen); $index++){
						$temp2 = "SELECT services.id FROM services WHERE services.service_name = '$servicesChosen[$index]'";
						$selection = mysqli_query($connect, $temp2);
							
						$output = mysqli_fetch_assoc($selection);
						if($services == ""){
							$services = $services.$output['id'];
						}else{
							$services = $services.", ".$output['id'];
						}
							
					}
					
					$selectCust = "SELECT customers.id FROM customers WHERE fullname = '$fullName'";
					$cust = mysqli_query($connect, $selectCust);
					$fetch1 = mysqli_fetch_assoc($cust);
					$customerId = $fetch1['id'];
					
					$selectCar = "SELECT cars.id FROM cars WHERE plate_num = '$plate' AND fullname = '$fullName'";
					$car = mysqli_query($connect, $selectCar);
					$fetch2 = mysqli_fetch_assoc($car);
					$carId = $fetch2['id'];
					
					$select_record = "SELECT records.id FROM records WHERE records.cust_id = '$customerId' AND records.car_id = '$carId'";
					$select = mysqli_query($connect, $select_record);
					$records = mysqli_fetch_assoc($select);
					$recordId = $records['id'];
					
				
			}else{
				mysqli_select_db($dbName);
				
				$servicesChosen = $_POST['Name'];
				
				$services="";
				for($index = 0;$index < count($servicesChosen); $index++){
					$temp2 = "SELECT services.id FROM services WHERE services.service_name = '$servicesChosen[$index]'";
					$selection = mysqli_query($connect, $temp2);
						
					$output = mysqli_fetch_assoc($selection);
					if($services == ""){
						$services = $services.$output['id'];
					}else{
						$services = $services.", ".$output['id'];
					}
						
				}
			
				$fullName = $_COOKIE['fullName'];
				$plate = $_COOKIE['plate'];
				
				$selectCust = "SELECT customers.id FROM customers WHERE fullname = '$fullName'";
				$cust = mysqli_query($connect, $selectCust);
				$fetch1 = mysqli_fetch_assoc($cust);
				$customerId = $fetch1['id'];
				
				$selectCar = "SELECT cars.id FROM cars WHERE plate_num = '$plate' AND fullname = '$fullName'";
				$car = mysqli_query($connect, $selectCar);
				$fetch2 = mysqli_fetch_assoc($car);
				$carId = $fetch2['id'];
				
				$select_record = "SELECT records.id FROM records WHERE records.cust_id = '$customerId' AND records.car_id = '$carId'";
				$select = mysqli_query($connect, $select_record);
				$records = mysqli_fetch_assoc($select);
				$recordId = $records['id'];
				
				

			}
			$total=0;
			for($index = 0;$index < count($servicesChosen); $index++){
				$int = "SELECT services.price FROM services WHERE services.service_name = '$servicesChosen[$index]'";
				$selection2 = mysqli_query($connect, $int);
			
				$output2 = mysqli_fetch_assoc($selection2);
					
				$total = ($total + $output2['price']);
			
			}
			
			if($payment < $total){
				$msg="Invalid Payment.";
				header("location: transaction.php?msg=$msg");
			}
			else{
				$change = ($payment - $total);
				$date = date("Y/m/d");
					
				$insert_transaction="INSERT INTO transactions(service_id, record_id, total_amount, payment, change_, date, comment) 
				VALUES ('$services','$recordId','$total', '$payment','$change','$date','$comment')";
					
				mysqli_query($connect,  $insert_transaction);
				header("location: receipt.php");
					
				mysqli_close($connect);
			}
		}
	}else{
		header("location: transaction.php");
	}
?>