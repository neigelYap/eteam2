<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Finish</title>
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
<nav class='navbar navbar-inverse'>
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
	</nav>
	<?php 
			if(!isset($_COOKIE['fullName'])){
				echo "<div class='alert alert-danger'><strong>Warning!</strong>It seems you have jumped to this page without transacting.</div>";
				echo "<h2><center>Redirecting you to the customer details page...</center></h2>";
				header("Refresh:2; url=customerform.php");
				exit;
			}else if(!isset($_COOKIE['car']) && !isset($_COOKIE['plate'])){
				echo "<div class='alert alert-danger'><strong>Warning!</strong>It seems you have jumped to this page without transacting.</div>";
				echo "<h2><center>Redirecting you to the car details page...</center></h2>";
				header("Refresh:2; url=carforms.php");
				exit;
			}
			
			if(isset($_GET['msg'])){
				$msg=$_GET['msg'];
				if($msg!=''){
					echo "<div class='alert alert-danger'><strong>Danger!</strong> ".$msg."</div>";
			
				}
			}
		?>
<div class="container">
		<h1><u>Step 4:</u></h1>
		<div class='page-header'><h1 class='title'>Finish</h1></div>
		<div class="progress progress-striped active">
  		<div class="progress-bar progress-bar-success" style="width: 100%"></div>
	</div>
		<div class ="well well-lg">
  			<legend>Service Number Legend:</legend>
  			<div align = "center">
  			<h3>1<small> - Wash (PhP100)</small> 2<small> - Wax (PhP140)</small> 3<small> - Asphalt Removal (PhP80)</small> 4<small> - Armor All (PhP80)</small></h3>
  			<h3>5<small> - Vacuum (PhP80)</small> 6<small> - Tire Black (PhP300)</small> 7<small> - Interior Detailing (PhP3000)</small> 8<small> - Exterior Detailing (PhP3500)</small></h3>
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
					
					$getService = "SELECT service_id FROM transactions WHERE id='$lastId'";
					$get = mysqli_query($connect, $getService);
					$services = mysqli_fetch_assoc($get);
					
					$serviceSeparate = explode(",", $services['service_id']);
	  			  	
					echo "<h3><small>(".$row['date'].")</small></h3>";
					echo "<div class='row'>";
					echo "<div class='col-sm-4'><h3>Name: </h3></div>";
					echo "<div class='col-sm-8'><h3><mark>".$custName['fullname']."</mark></h3></div>";
					echo "</div>";
					echo "<div class='row'>";
					echo "<div class='col-sm-4'><h3>Contact No.: </h3></div>";
					echo "<div class='col-sm-8'><h3><mark>".$custName['tel_num']."</mark></h3></div>";
					echo "</div>";
					echo "<div class='row'>";
					echo "<div class='col-sm-4'><h3>Car: </h3></div>";
					echo "<div class='col-sm-8'><h3><mark>".$car."</mark></h3></div>";
					echo "</div>";
					echo "<div class='row'>";
					echo "<div class='col-sm-4'><h3>Plate Number.: </h3></div>";
					echo "<div class='col-sm-8'><h3><mark>".$carName['plate_num']."</mark></h3></div>";
					echo "</div>";
					echo "<div class='row'>";
					echo "<div class='col-sm-4'><h3>Services Availed: </h3></div>";
					echo "<div class='col-sm-8'><h3><mark>".$row['service_id']."</mark></h3></div>";
					echo "</div>";
					echo "<div class='row'>";
					echo "<div class='col-sm-4'><h3>Payment: </h3></div>";
					echo "<div class='col-sm-8'><h3><mark>".$row['payment']."</mark></h3></div>";
					echo "</div>";
					echo "<div class='row'>";
					echo "<div class='col-sm-4'><h3>Total Amount: </h3></div>";
					echo "<div class='col-sm-8'><h3><mark>PhP ".$row['total_amount']."</mark></h3></div>";
					echo "</div>";
					echo "<div class='row'>";
					echo "<div class='col-sm-4'><h3>Change: </h3></div>";
					echo "<div class='col-sm-4'><h3><mark>PhP ".$row['change_']."</mark></h3></div>";
					?>
					<div class="col-sm-4"><a href= "display-pdf.php" target="_blank"><button type="button" class="btn btn-primary btn btn-lg" id="viewPDF" name="viewPDF" >View Receipt</button></a></div>
					</div>
					<?php
	setcookie('customer','', time()-3600);
	setcookie('fullName','', time()-3600);
	setcookie('car','', time()-3600);
	setcookie('plate','', time()-3600);
?>
					
					<?php
						$service;
					
					session_start();
					$date=date("Y-m-d");
					$num = $row['id'];
					$timeStamp = $date." (".$num.")";
					define('SAMPLE', dirname(__FILE__));
					include (SAMPLE.'/fpdf181/fpdf.php');
					$pdf=new FPDF();
					$pdf->AddPage();
					
					$pdf->Image('images\tireVector.png',90,5,0,30,'png');
					$pdf->Cell(0,30,"",0,1,"C");
					$pdf->SetFont("Arial","",40);
					
					$pdf->Cell(0,5,"",0,1,"C");
					$pdf->Cell(0,5,"BAYANI CAR WASH",0,1,"C");
						$pdf->SetFont("Arial","",15);
					 	$pdf->Cell(0,5,"",0,1,"C");
					 	$pdf->Cell(0,5,"iACADEMY Plaza, H.V. Dela Costa, Makati, Metro Manila",0,1,"C");
					$pdf->SetFont("Arial","",30);
					$pdf->Cell(0,5,"___________________________________________________________________",0,1,"C");
					$pdf->Cell(0,5,"",0,1,"C");

					$pdf->SetFont("Arial","",20);
					
					$pdf->Cell(0,10,"Customer: ".$custName['fullname']."",0,2,"");
					$pdf->Cell(0,5,"",0,1,"C");
					
					$pdf->Cell(0,5,"Car: ".$car."",0,2,"");
					$pdf->Cell(0,5,"",0,1,"C");
					
					$pdf->Cell(0,5,"Plate Number: ".$carName['plate_num']."",0,2,"");
					$pdf->Cell(0,10,"",0,1,"C");
					
					$pdf->Cell(0,5,"Services Availed: ","",0,2,"");
					
					for($ctr=0;$ctr<sizeof($serviceSeparate);$ctr++){
					
						$serviceName = "SELECT * FROM services WHERE id = '$serviceSeparate[$ctr]'";
						$get = mysqli_query($connect, $serviceName);
						$fetch = mysqli_fetch_assoc($get);
						
						$pdf->Cell(0,10,"",0,1,"C");
						$pdf->Cell(0,0,"".$fetch['service_name']."","",0,2,"");
						$pdf->Cell(0,0," " . $fetch['price'] .".00",0,0,"R");
					}
					$pdf->Cell(0,5,"",0,1," ");
					$pdf->Cell(0,10," ",0,1,"C");
					$pdf->Cell(0,0,"Total:");
					$pdf->Cell(0,0,"".$row['total_amount'].".00",0,0,"R");
					$pdf->Cell(0,10,"",0,1,"C");
					
					$pdf->Cell(0,0,"Payment: ");
					$pdf->CELL(0,0," ".$row['payment'].".00",0,0,"R");
					$pdf->Cell(0,10,"",0,1,"C");
					
					$pdf->Cell(0,0,"Change Due: ");
					$pdf->Cell(0,0, " ".$row['change_'].".00",0,0,"R");
					$pdf->Cell(0,5,"",0,1,"C");
					
					$pdf->Cell(0,0,"___________________________________________________________________",0,1,"C");
					$pdf->Cell(0,10,"",0,1,"C");
					
					$dateSeparate = explode("/", $row['date']);
					$dateConnect = " ";
					for ($ctr=0;$ctr<sizeof($dateSeparate);$ctr++){
						$dateConnect = $dateConnect.$dateSeparate[$ctr];
					}
					
					$pdf->SetFont("Arial","",12);
					$pdf->Cell(0,5,"Telephone number: 09XXX-XXXXXX",0,2,"C");
					$pdf->Cell(0,1,"",0,1,"C");
					$pdf->Cell(0,5,"".$row['date']." ",0,1,"C");
					$pdf->Cell(0,1,"",0,1,"C");
					$pdf->Cell(0,5,"THIS SERVES AS OFFICIAL SALES INVOICE",0,2,"C");
					$pdf->Cell(0,1,"",0,1,"");
					$pdf->Cell(0,5,"Thank You! Please Come Again",0,2,"C");
					$pdf->Cell(0,5,"#".$lastId."BCW-".$dateConnect,0,2,"C");
					$pdf->Cell(0,1,"",0,1,"");
					

							
					$pdf->Output("F","receipts/$timeStamp.pdf");
					
					$_SESSION['pdf'] = "$timeStamp.pdf";
					
					mysqli_close($connect);
				}else {
  					echo "<div class='alert alert-danger'>No transactions!</div>";
  					mysqli_close($connect);
  				}

			?>
			</div>
			
	<ul class="breadcrumb">
  		<li><a href="customerform.php">Customer</a></li>
  		<li><a href="carforms.php">Car</a></li>
		<li><a href="transaction.php">Payment</a></li>
		<li class="active">Finish</li>
	</ul> 
	
	<div class='container'><footer><hr/><i>Powered by E-Team&copy;</i></footer></div>

	
</body>
</html>