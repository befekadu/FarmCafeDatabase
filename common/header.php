<!--Base background for every page-->
<!DOCTYPE html>
<head>
	<meta charset="utf-8"> 
	<title>This project</title>
	<link rel="stylesheet" href="common/style.css" type="text/css"/>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
</head>

<body>
		<div id="header">
		<div id="page-wrap">
			<h1><a href="/"></a></h1>
			
				<div id="control">
				<p><a class="button" href="common/login.php">Log in</a>
				<a href="/logout.php" class="button">Log out</a> 
				<a href="/account.php" class="button">Your Account</a>  
				<a class="button" href="/signup.php">Sign up</a></p>
			</div>
			<div class="clear"></div>
		</div>
        </div>
		
        <nav>
			<div id="page">
			<ul>
  			<li><a class="button" href="">Manage Data</a>
			<ul>
				<li><a class="button" href="viewData.php"> View Data</a></li>
				<li><a class="button" href="addData.php"> Add Data</a></li>
				<li><a class="button" href="deleteData.php"> Delete Data</a></li>
				<li><a class="button" href="updateData.php"> Update Data</a></li>
			</ul>
   			</li>
			</ul>
			</div>
</nav>
