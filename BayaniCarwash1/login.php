<?php
	session_start(); // starts the session

	if(isset($_SESSION['loginUser'])){// checks if the session was registered
								// (security feature so that no one can access the admin page through the URL)
		header("location: adminPage.php");
		
	}else
		header('Content-Type: text/html; charset=utf-8'); // else, the system will continue on the admin page
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Admin Login</title>
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
     bottom:0;
  }
  
  </style>
</head>
<body class = "bg">
<?php
	$login_form = <<<EOD
	
	
	<div class="container">
			<div class='page-header'><h1 class='title'><span class="glyphicon glyphicon-user"></span> Admin Login</h1></div>
	</div>
		<div class="container">
		<div class="well well-lg">
	<form method="POST" action="validation.php" role="form">
		<div class="form-group">
		<label>Username: </label>
		<input type="text" class="form-control" id="userName" name="userName" placeholder="Enter Username"/>
		</div>
		
		<div class="form-group">
		<label>Password: </label>
		<input type="password" class="form-control" id="pass" name="pass" placeholder="Enter Password"/>
		</div>
		
		<button type="submit" class="btn btn-default" id="login"/><span class="glyphicon glyphicon-log-in"></span> Login</button>
		
	</form>
		
	</div>
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
      <li class='active'><a href='login.php'><span class='glyphicon glyphicon-user'></span> Admin Login</a></li>
    </ul>
  </div>
</nav>";
		if(isset($_GET['msg'])){
			$msg=$_GET['msg'];
			if($msg!=''){
		
				if($msg == 'You have logged out!'){
					echo "<div class='alert alert-success'><strong>Success!</strong> ".$msg."</div>";
				}else{
					echo "<div class='alert alert-danger'><strong>Danger!</strong> ".$msg."</div>";
				}
			}
		}
		echo $login_form;
		
		
		echo "<div class='container'><footer><hr/><i>Powered by E-Team&copy;</i></footer></div>";
	
		?>
        
	</div>
</div>
</body>
</html>