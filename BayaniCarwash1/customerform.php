<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Customer Details Form</title>
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
$insert_customer = <<<EOD

  	<div class="container">
		<h1><u>Step 1:</u></h1>
		<div class='page-header'><h2 class='title'>Customer Info</h2></div>
		<div class="progress progress-striped active">
  		<div class="progress-bar progress-bar-info" style="width: 25%"></div>
	</div>
	<div class="well well-lg">
  	<form method="POST" action="insert_customer.php" role="form">
   
   	<div class="form-group">
   	<label>Customer Name:</label>
    <input type="text" class="form-control" id="firstName" name="firstName" placeholder="Enter First Name" required="required">
    <input type="text" class="form-control" id="lastName" name="lastName" placeholder="Enter Last Name" required="required">
    <input type="text" class="form-control" id="middleName" name="middleName" placeholder="Enter Middle Name" required="required">
    </div>
    
    <div class="form-group">
   	<label>Customer Contact Details</label>
	<input type="number" class="form-control" id="telephoneNum" name="telephoneNum" placeholder="Enter Telephone Number" 
    		required="required">

	<div class="row">
		<div class="col-sm-2"><select class="form-control" id="subscription" name="subscription">
				<optgroup label="GLOBE">
				<option value="0905">0905</option>
				<option value="0906">0906</option>
				<option value="0915">0915</option>
				<option value="0916">0916</option>
				<option value="0917">0917</option>
				<option value="0925">0925</option>
				<option value="0926">0926</option>
				<option value="0927">0927</option>
				<option value="0935">0935</option>
				<option value="0936">0936</option>
				<option value="0937">0937</option>
				<option value="0996">0996</option>
				<option value="0997">0997</option>
				</optgroup>
				<optgroup label="SUN CELLULAR">
				<option value="0922">0922</option>
				<option value="0923">0923</option>
				<option value="0932">0932</option>
				<option value="0933">0933</option>
				<option value="0942">0942</option>
				<option value="0943">0943</option>
				<optgroup label="SMART/TnT">
				<option value="0907">0907</option>
				<option value="0908">0908</option>
				<option value="0909">0909</option>
				<option value="0910">0910</option>
				<option value="0912">0912</option>
				<option value="0918">0918</option>
				<option value="0919">0919</option>
				<option value="0920">0920</option>
				<option value="0921">0921</option>
				<option value="0928">0928</option>
				<option value="0929">0929</option>
				<option value="0930">0930</option>
				<option value="0938">0938</option>
				<option value="0939">0939</option>
				<option value="0989">0989</option>
				<option value="0999">0999</option>
				<option value="0948">0948</option>
				<option value="0949">0949</option>
	      </select></div>
		
    <div class="col-sm-10"><input type="number" class="form-control" id="cellphoneNum" name="cellphoneNum" placeholder="Enter Cellphone Number"></div></div>
    <input type="email" class="form-control" id="email" name="email" placeholder="Enter Email Address">
    </div>
    <button type="submit" class="btn btn-default" id="customerEntry" name="customerEntry" >Next</button>
	<button type="submit" class="btn btn-default" id="resetCustomerForm" name="resetCustomerForm">Reset</button>
	</form>
	</div>
		
		
		<ul class="breadcrumb">
  		<li class="active">Customer</li>
  		<li><a href="carforms.php">Car</a></li>
		<li><a href="transaction.php">Payment</a></li>
		<li><a href="receipt.php">Finish</a></li>
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

	if(isset($_GET['msg'])){
		$msg=$_GET['msg'];
		if($msg!=''){
			echo "<div class='alert alert-danger'><strong>Danger!</strong> ".$msg."</div>";
	
		}
	}
	echo $insert_customer;
	
	echo "<div class='container'><footer><hr/><i>Powered by E-Team&copy;</i><footer></div>";
	
	?>
</body>
</html>