<?php
	// Start the session
	session_start();
	// Store session Data
?>

<?php
	$username = $_SESSION['login_user'];
	$authorized = $_SESSION['authorized'];

	if(isset($_SESSION['login_user'])) {
		if($authorized === "TRUE")
			$str = '_teacher';
		else
			$str = '_student';
		echo '<div class="success_login'.$str.'"> Welcome '.$username.'</div>';
	} else {
		
		echo '<div class="fail_login"> Login Required </div>';
	}
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
		<style> 
			section{
				margin-left:20px;
			}

			a{
				text-decoration:
			}
		</style>
		<script>
			window.onload = function () {
				var nav = document.getElementById("navbar");
				//var ul = nav.getElementsByTagName("ul")[0];
				var tabs = nav.getElementsByTagName("a");
				
				// set current tab
				var navitem = tabs[0];
				var ident = navitem.id.split("_")[1];  // number
				// HTML5 data-* attributes are non-presentation
				// parent of tabs hold identity of the current tab
				nav.setAttribute("data-current", ident);
				
				navitem.setAttribute("style",
				"background-color: teal; color: white;");
				
				// hide all but first page
				var pages = document.getElementsByTagName("section");
				for (var i = 1; i < pages.length; i++) {
					pages[i].style.display = "none";
				}
				
				// connect click handler to each tab
				for (var i = 0; i < tabs.length; i++) {
					tabs[i].onclick = displayPage;
				}
			}

			function showSection(id, page){
				$(function(){
				$("#" + id).load(page); 
				});
			}
		</script>
	</head>
	<body>
		
		<?php include "_sidebar.php" ?>

		

		<!-- Page Content -->
		<div style="margin-left:15%">
			<div class="w3-container w3-teal">
				<h1>Keep In Touch<sup>TM</sup></h1>
			</div>

			<section id="tabpage_1">
				<script>showSection("tabpage_1", "home.php") </script> 
			</section>

			<section id="tabpage_3">	
				<script> showSection("tabpage_3", "list.php")</script>
			</section>

			<section id="tabpage_4">
				<script> showSection("tabpage_4", "createPost.php") </script>
			</section>

			<section id="tabpage_5">
				<script>showSection("tabpage_5", "about.html") </script>
			</section>

			<section id="tabpage_7">
			</section>	
     
		</div>    
	</body>
	<!-- iframe needed to keep the reply form from redirecting the page -->
	<iframe name="hiddenFrame" width="0" height="0" style="display: none;"></iframe>
</html>
