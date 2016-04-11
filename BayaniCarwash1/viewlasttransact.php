<?php 
	session_start(); // starts the session

	if(!$_SESSION['loginUser']){// checks if the session was registered
								// (security feature so that no one can access the admin page through the URL)
		header("location: login.php?msg=Unable to access! Please enter a Username and Password.");
		
	}else
		header( 'Content-Type: text/html; charset=utf-8' ); // else, the system will continue on the admin page
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=Cp1252">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>View Last Transaction</title>
<link rel="tab icon" href="images\tire.ico">
<link rel="stylesheet" href="https://bootswatch.com/readable/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<style>
  body {
 	 background-image: url("images/background3.jpg");
  }
  h1.title{
     text-align: left;
  }
  footer{
  bottom:0;
     position: absolute;
  }
  </style>
</head>
    <body>

	 <nav class="navbar navbar-inverse">
       <div class="container-fluid">
         <div class="navbar-header">
           <a class="navbar-brand" href="index.php">Bayani Carwash</a>
       </div>
      <ul class="nav navbar-nav">
       <li class="active"><a href="index.php">Home</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
       <li><a href="login.php"><span class="glyphicon glyphicon-user"></span> Admin Login</a></li>
      </ul>
     </div>
    </nav>
    
    <div class = "container">
    <div class='page-header'><h1 class='title'><span class="glyphicon glyphicon-th-list"></span> Last Transaction</h1></div>
		<div class ="well well-lg">
  			<legend>Service Number Legend:</legend>
  			<div align = "center">
  			<h3>
  			1<small><font color="#cc3300"> - Wash (PhP100)</font></small> 
  			2<small><font color="#cc3300"> - Wax (PhP140)</font></small> 
  			3<small><font color="#cc3300"> - Asphalt Removal (PhP80)</font></small> 
  			4<small><font color="#cc3300"> - Armor All (PhP80)</font></small>
  			</h3>
  			<h3>
  			5<small><font color="#cc3300"> - Vacuum (PhP80)</font></small> 
  			6<small><font color="#cc3300"> - Tire Black (PhP300)</font></small> 
  			7<small><font color="#cc3300"> - Interior Detailing (PhP3000)</font></small> 
  			8<small><font color="#cc3300"> - Exterior Detailing (PhP3500)</font></small>
  			</h3>
  			</div>
  			<hr/>
  			<?php 
  				define('DOC_ROOT', dirname(__FILE__));
				include (DOC_ROOT.'/config.php');
  				
  				$query = "select * from transactions";
  				$result1 = mysqli_query($connect, $query);
  				$lastId = (mysqli_num_rows($result1));
  				$query = "select * from transactions where id='$lastId'";
  				$result = mysqli_query($connect, $query);
  				if($lastId > 0) {
	  			  	$row = mysqli_fetch_assoc($result);
	  			  	
	  			  	$getCustID = "SELECT * FROM records WHERE id = '".$row['record_id']."'";
	  			  	$get = mysqli_query($connect, $getCustID);
	  			  	$ID = mysqli_fetch_assoc($get);
	  			  	
	  			  	$getFullName = "SELECT * FROM customers WHERE id = '".$ID['cust_id']."'";
	  			  	$get = mysqli_query($connect, $getFullName);
	  			  	$custName = mysqli_fetch_assoc($get);
	  			  	
	  			  	$getCar = "SELECT * FROM cars WHERE id = '".$ID['car_id']."'";
	  			  	$get = mysqli_query($connect, $getCar);
	  			  	$carName = mysqli_fetch_assoc($get);
					$car = $carName['color']." ".$carName['manufacturer']." ".$carName['model'];
	  			  	
					echo "<table class='table table-striped table-hover '>";
					echo "<thead><tr><th>#</th><th>Full Name</th><th>Car</th><th>Plate Num.</th><th>Services Availed</th><th>Total Amount</th><th>Payment</th><th>Change</th><th>Date</th></tr></thead>";
					echo "<tbody>";
					echo "<tr class='success'><td> ".$row['id']."</td><td>".$custName['fullname']."</td><td>$car</td><td>".$carName['plate_num']."</td><td>".$row['service_id']."</td><td>PhP".$row['total_amount']."</td><td>PhP".$row['payment']."</td><td>PhP".$row['change_']."</td><td>".$row['date']."</td></tr>";
  						echo "<tr class='warning'><td>Comments: </td><td>".$row['comment']."</td> <td></td><td></td><td></td><td></td><td></td><td></td><td></td> </tr>";
					echo "</tbody>";
					echo "</table>";
					
					mysqli_close($connect);
				}else {
  					echo "<div class='alert alert-danger'>No transactions!</div>";
  					mysqli_close($connect);
  				}
       			
			?>
			</div>
		 <a href="adminPage.php" class="btn btn-default">Back</a>
		 
	</div>
	
		
		 <div class='container'><footer><hr/><i>Powered by E-Team&copy;</i></footer></div>
		
    </body>
</html>