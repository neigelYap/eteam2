<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Car Details Form</title>
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
     position: absolute;
  }
  .progress{
     height: 40px;;
  }
  </style>
</head>
<body class = "bg">
<?php
$insert_car = <<<EOD

  	<div class="container">
		<h1><u>Step 2:</u></h1>
		<div class='page-header'><h1 class='title'>Car Details</h1></div>
		<div class="progress progress-striped active">
  		<div class="progress-bar progress-bar-info" style="width: 50%"></div>
	</div>
	<div class="well well-lg">
  	<form method="POST" action="insert_car.php" role="form">
   
   	<div class="form-group">
   	<label>Car Details:</label>
    <input type="text" class="form-control" id="carManufacturer" name="carManufacturer"
    	placeholder="Enter Car's Manufacturer" required="required">
    <input type="text" class="form-control" id="carModel" name="carModel"
    	placeholder="Enter Car's Model Name" required="required">
    <input type="text" class="form-control" id="carColor" name="carColor"
    	placeholder="Enter Car's Color" >
    </div>
   
    <div class="form-group">
    <label>Car Plate Number:</label>
    <input type="text" class="form-control" id="carPlateNum" name="carPlateNum"
    	placeholder="Enter Car's Plate Number" required="required">
    </div>
    
    <button type="submit" class="btn btn-default" id="carEntry" name="carEntry">Next</button>
	<button type="reset" class="btn btn-default">Reset</button>
	</form>
		
	</div>
		<ul class="breadcrumb">
  		<li><a href="customerform.php">Customer</a></li>
  		<li class="active">Car</li>
		<li><a href="transaction.php">Payment</a></li>
		<li><a href="receipt.php">Receipt</a></li>
	</ul>
	</div>
	
EOD;

	
	echo "<nav class='navbar navbar-inverse'>
	  <div class='container-fluid'>
	    <div class='navbar-header'>
	      <a class='navbar-brand' href='index.php'>Bayani Carwash</a>
	    </div>
	    <ul class='nav navbar-nav'>
	     <li><a href='index.php'>Home</a></li>
	    </ul>
	    <ul class='nav navbar-nav navbar-right'>
	      <li><a href='login.php'><span class='glyphicon glyphicon-user'></span> Admin Login</a></li>
	    </ul>
    </div>
	</nav>";
	if(!isset($_COOKIE['fullName'])){
		echo "<div class='alert alert-danger'><strong>Warning!</strong> Missing Details</div>";
		echo "<h2><center>Redirecting you to the previous page...</center></h2>";
		header("Refresh:2; url=customerform.php");
		exit;
	}
	
	if(isset($_GET['msg'])){
		$msg=$_GET['msg'];
		if($msg!=''){
			echo "<div class='alert alert-danger'><strong>Danger!</strong> ".$msg."</div>";
	
		}
	}
	echo $insert_car;
	
	echo "<div class='container'><footer><hr/><i>Powered by E-Team&copy;</i></footer></div>";
?>
</body>
</html>