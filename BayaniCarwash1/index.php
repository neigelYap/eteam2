<?php
	setcookie('customer','', time()-3600);
	setcookie('fullName','', time()-3600);
	setcookie('car','', time()-3600);
	setcookie('plate','', time()-3600);
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Bayani Carwash</title>
<link rel="tab icon" href="images\tire.ico">
<link rel="stylesheet" href="https://bootswatch.com/readable/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<style>
  body {
 	 background-image: url("images/background3.jpg");
  }
  h1.title{
     text-align: center;
     font-family: serif;
  }
  footer{
     position: absolute;
  }
  </style>
</head>
   <body class="bg">
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
<div class ="well well-lg">
<div class="jumbotron">
  <h1>Welcome!</h1>
  <hr/>
  <blockquote>
  <p>The customer is always right.</p>
  <small>A friendly reminder from <cite title="Source Title">Mr. Boss</cite></small>
</blockquote>
	<ul>
		<li>Respect is a must</li>
		<li>Do not forget to smile!</li>
		<li>Check the money that is handed to you</li>
		<li>If an emergency happens, call the Manager immediately or call this number: <kbd>112</kbd></li>
	</ul>
	<br><h4>To make a transaction, please click the button below:</h4>
  <p><a class="btn btn-primary btn-lg" href="customerform.php">Transact</a></p>
</div>
</div>
</div>

<div class='container'><footer><hr/><i>Powered by E-Team&copy;</i></footer></div>
   </body>
</html>