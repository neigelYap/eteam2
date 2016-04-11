<?php 
	session_start(); // starts the session

	if(!$_SESSION['loginUser']){// checks if the session was registered
								// (security feature so that no one can access the admin page through the URL)
		header("location: login.php?msg=Unable to access! Please enter a Username and Password.");
		
	}else
		header( 'Content-Type: text/html; charset=utf-8' ); // else, the system will continue on the admin page
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
<link href="styles.css" rel="stylesheet" />
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

  </style>
</head>
<body class = "bg">
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="index.php">Bayani Carwash</a>
    </div>
    <ul class="nav navbar-nav">
      <li><a href="index.php">Home</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li class='active'><a href="login.php"><span class="glyphicon glyphicon-user"></span> Admin</a></li>
    </ul>
  </div>
</nav>

    <div class="container">
    <div class="page-header">
    	<h1 class="title"><font color="black">Welcome, <?php echo $_SESSION['loginUser']?></font></h1></div>
    <div class ="well well-lg">
    
    	 <a href="viewlasttransact.php" class="btn btn-default btn-block addCar hvr-shrink" role="button">
    	 <font color="black" size="30"><span class="glyphicon glyphicon-th-list"></span> Last Transaction</font>
    	 </a>
    	 <br><br>
    	
    	 <a href="viewtransactions.php" class="btn btn-default btn-block addCar hvr-shrink" role="button">
    	 <font color="black" size="30"><span class="glyphicon glyphicon-list-alt"></span> All Transactions</font>
    	 </a>
    	 <br><br>
  
		 <a href="today.php" class="btn btn-default btn-block addCar hvr-shrink" role="button">
    	 <font color="black" size="30"><span class="glyphicon glyphicon-stats"></span> Reports</font>
    	 </a>
    	 <br><br>
    	 
    	 <form action="logout.php">
    	 	<button type="submit" class="btn btn-default btn-block addCar hvr-shrink">
    	 </form>
    	 <font color="black" size="30"><span class="glyphicon glyphicon-log-out"></span> Logout</font></button>
    </div>
    
    <hr/>
    
    <div class='container'><footer><hr/><i>Powered by E-Team&copy;</i></footer></div>
	</div>
    
    </body>
</html>