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
<title>Reports</title>
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
    <?php 
		define('DOC_ROOT', dirname(__FILE__));
		include (DOC_ROOT.'/config.php');
	?>
    <nav class="navbar navbar-inverse">
 		 <div class="container-fluid">
    		<div class="navbar-header">
      			<a class="navbar-brand" href="index.php">Bayani Carwash</a>
    		</div>
    		<ul class="nav navbar-nav">
      			<li><a href="index.php">Home</a></li>
    		</ul>
    		<ul class="nav navbar-nav navbar-right">
     			 <li><a href="login.php"><span class="glyphicon glyphicon-user"></span> Admin Login</a></li>
    		</ul>
  		</div>
	</nav>
	
	<div class="container">
	<div class='page-header'><h1 class='title'><span class="glyphicon glyphicon-stats"></span> Reports</h1></div>
		
		<div class ="well well-lg">
		<legend>Yearly</legend>
						<?php

									if (isset($_POST['year'])) {
										
										if($_POST['year']>0){

											$inputYear = $_POST['year'];
											$query = "SELECT * FROM transactions";
											$result1 = mysqli_query($connect, $query);
											$id = (mysqli_num_rows($result1));
											$query = "select * from transactions where id='$id'";
											$result = mysqli_query($connect, $query);
											$totalCust=0;
											$totalMoney=0;
											if($id > 0){
												$row = mysqli_fetch_assoc($result);
												
												while($row = mysqli_fetch_array($result1)){
													$date = explode("/",$row['date']);
													
													if($date[0] == $inputYear){
														$totalCust++;
														$totalMoney = $totalMoney+$row['total_amount'];
													}
												}
												echo "<h3><small>($inputYear)</small></h3>";
												echo "<h3>Frequency of Customers: <mark>$totalCust</mark></h3>";
												echo "<h3>Profit Earned: <mark>PhP $totalMoney</mark></h3>";
												mysqli_close($connect);
											}else {
							  					echo "<div class='alert alert-danger'>No records found!</div>";
							  					mysqli_close($connect);
							  				}
											
											
										}else{
											echo "<div class='alert alert-danger'>No year entered!</div>";
											mysqli_close($connect);
										}
										echo "<a href='yearly.php' class='btn btn-default'>Reset</a>";
									}else{
								?>
							<form method="POST" role="form">
								<div class="form-group">
								
									<label>Enter a Year: </label>
									<input type="number" class="form-control" id="year" name="year" placeholder="Year"/>
								</div>
		
								<button type="submit" class="btn btn-default" id="submitYear" name="submitYear"/>Submit</button>
								
							
							</form>
							<?php }?>
					</div>
					<ul class="breadcrumb">
  <li><a href="today.php">Today</a></li>
  <li><a href="monthly.php">Monthly</a></li>
  <li class="active">Yearly</li>
  <li><a href="date.php">Date</a></li>
</ul>
					

		<a href="adminPage.php" class="btn btn-default">Back</a>
			
			<div class='container'><footer><hr/><i>Powered by E-Team&copy;</i>
		</footer></div>
		</div>
		
	
    </body>
</html>