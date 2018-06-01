<!-- Sidebar -->
<div id="navbar" class="w3-sidebar w3-light-grey w3-bar-block" style="width:15%">
	<h3 class="w3-bar-item">Menu</h3>

	<a id="tabnav_1" href="#" class="w3-bar-item w3-button"> 
		<span class="fa fa-home" style="font-size:24px"></span>  Home
	</a>

	<a id="tabnav_2" href="#" class="w3-bar-item w3-button"> 
		<span class="material-icons" style="font-size:24px">list</span>  Browse List
	</a>

	<?php 
		$authorized = $_SESSION['authorized'];

		if($authorized === "TRUE") {
			echo '<a id="tabnav_3" href="#" class="w3-bar-item w3-button">
			<span class="material-icons" style="font-size:24px">message</span>  Create Post</a>';
		}
	?>
	<a id="tabnav_4" href="#" class="w3-bar-item w3-button">
		<span class="material-icons" style="font-size:24px">info_outline</span>  About
	</a>
	
</div>