<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Transaction Window</title>
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
   <body class="bg">
<?php
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
		}else if(!isset($_COOKIE['car']) && !isset($_COOKIE['plate'])){
			echo "<div class='alert alert-danger'><strong>Warning!</strong> Missing Details</div>";
			echo "<h2><center>Redirecting you to the previous page...</center></h2>";
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
	<h1><u>Step 3:</u></h1>
		<div class='page-header'><h1 class='title'>Payment</h1></div>
		<div class="progress progress-striped active">
  		<div class="progress-bar progress-bar-info" style="width: 75%"></div>
	</div>
	<div class="well well-lg">
  	<label>Service Availed:</label>
    <form action="insert_transaction.php" method="post" role="form">
    <div class="row">
		
		<div id="services">
		
	<div class="col-sm-4">
		<div class="form-group">
        <input type="checkbox" name="Name[]" id="1" value="Asphalt Removal" onclick="attachCheckboxHandlers()"/> Asphalt Removal (P80.00)<br>
		<input type="checkbox" name="Name[]"  id="2" value="Vacuum" onclick="attachCheckboxHandlers()"/> Vacuum (P80.00)<br>
        <input type="checkbox" name="Name[]" value="Tire Black" onclick="attachCheckboxHandlers()"/> Tire Black (P30.00)
        </div>
	</div>
    <div class="col-sm-4">
                <div class="form-group">
                <input type="checkbox" name="Name[]" value="Wash" onclick="attachCheckboxHandlers()"/> Wash (P100.00)</br>
                <input type="checkbox" name="Name[]" value="Armor All" onclick="attachCheckboxHandlers()"/> Armor All (P80.00)</br>
                <input type="checkbox" name="Name[]" value="Interior Detailing" onclick="attachCheckboxHandlers()"/> Interior Detailing (P3000.00)

                </div>
    </div>
    <div class="col-sm-4">
    	<input type="checkbox" name="Name[]" value="Wax" onclick="attachCheckboxHandlers()"/> Wax (P140.00)</br>
        <input type="checkbox" name="Name[]" value="Exterior Detailing" onclick="attachCheckboxHandlers()"/> Exterior Detailing (P3500.00)
    </div>
		
		</div>

    </div>
		<label>Total:</label>
		
		<p>PhP <input type="text" name="total" class="num" size="6" value="0" readonly="readonly" /></p>
        <div class="form-group">
        <label>Payment:</label>
        <input type="number" name="payment" class="form-control" placeholder="Enter Payment" required="required"/>
        </div>
		<div class="form-group">
		  <label for="comment">Customer Feedback:</label>
		  <textarea class="form-control" rows="3" id="comment" name="comment" placeholder="What do you think of our service?"></textarea>
		</div>
           		
        <button type="button" class="btn btn-default" data-toggle="modal" data-target="#finish">Finish</button> 
		<button type="reset" class="btn btn-default">Reset</button>
		
			<div class="modal fade" id="finish" role="dialog">
		    <div class="modal-dialog">

		      <div class="modal-content">
		        <div class="modal-header">
		          <button type="button" class="close" data-dismiss="modal">&times;</button>
		          <h4 class="modal-title">Confirmation</h4>
		        </div>
		        <div class="modal-body">
		          <p>Do you wish to continue with the entered details?</p>
		        </div>
		        <div class="modal-footer">
			        <button type="submit" class="btn btn-default" id="transact" name="transact" data-target="insert_transaction.php">Yes</button>
					<button type="button" class="btn btn-default" data-dismiss="modal">No</button>
		        </div>
		      </div>
		      
		    </div>
		  </div>

	</form>
		
    </div>
		<ul class="breadcrumb">
  		<li><a href="customerform.php">Customer</a></li>
  		<li><a href="carforms.php">Car</a></li>
		<li class="active">Payment</li>
		<li><a href="receipt.php">Finish</a></li>
		</ul>
	</div>

	<script>
	function attachCheckboxHandlers() {
	
	    var el = document.getElementById('services');
	
	    var tops = el.getElementsByTagName('input');
	    
	    for (var i=0, len=tops.length; i<len; i++) {
	        if ( tops[i].type === 'checkbox' ) {
	            tops[i].onclick = updateTotal;
	        }
	    }
	}
	    
	function updateTotal(e) {

	    var form = this.form;
		var temp = this.value;
			if(this.value == "Asphalt Removal"){
				temp = 80;
			}else if(this.value == "Vacuum"){
				temp = 80;
			}else if(this.value == "Tire Black"){
				temp = 30;
			}else if(this.value == "Wash"){
				temp = 100;
			}else if(this.value == "Armor All"){
				temp = 80;
			}else if(this.value == "Interior Detailing"){
				temp = 3000;
			}else if(this.value == "Wax"){
				temp = 140;
			}else if(this.value == "Exterior Detailing"){
				temp = 3500;
			}
			
		var val = parseFloat( form.elements['total'].value );
	
	    if ( this.checked ) {
	        val += parseFloat(temp);
	    } else {
	        val -= parseFloat(temp);
	    }
	
	    form.elements['total'].value = val;
	}
	attachCheckboxHandlers();
	</script>
	<div class='container'><footer><hr/><i>Powered by E-Team&copy;</i></footer></div>
	
    </body>
</html>