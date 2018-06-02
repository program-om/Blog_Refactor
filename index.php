<?php
	// Start the session
	session_start();
	// Store session Data
?>

<!DOCTYPE lang html>
<html>
	<head>
		<title>Keep In Touch</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta charset="UTF-8">
    	<meta name="viewport" content="width=device-width, initial-scale=1">

		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<!-- jQuery library -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<!-- Latest compiled JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="w3.css" />

		<script src="navigation.js"></script>
		<link rel="stylesheet" type="text/css" href="style.css">
	</head>
	<body>
		
		<?php include "_sidebar.html" ?>

		<!-- Page Content -->
		<div style="margin-left:15%">
			<div class="w3-container w3-teal">
				<h1>Keep In Touch<sup>TM</sup></h1>
			</div>

			<section id="tabpage_1">
				<script>showSection("tabpage_1", "home.php") </script> 
			</section>
			
			<section id="tabpage_2">	
				<script> showSection("tabpage_2", "list.php")</script>
			</section>

			<section id="tabpage_3">
				<script> showSection("tabpage_3", "createPost.php") </script>
			</section>

			<section id="tabpage_4">
				<script>showSection("tabpage_4", "about.html") </script>
			</section>

			<section id="tabpage_7">
			</section>	 
		</div>    
	</body>
	<!-- iframe needed to keep the reply form from redirecting the page -->
	<iframe name="hiddenFrame" width="0" height="0" style="display: none;"></iframe>
</html>
