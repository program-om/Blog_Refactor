<div>

	<h2>Post a message</h2>
	<!--Enable/disable replies-->
	

	<form action="new-post.php" method="post">
	<div>
		<label for="flip-1">Reply:</label>
		<select name="flip-1" id="flip-1" data-role="slider" class="selectpicker">
			<option value="on">On</option>
			<option value="off">Off</option>
		</select>
	</div> <br>
	
		<div style="width:70%">	
			<div>						
				<label>Name: </label>
				<input id="name" type="text" class="form-control" name="name" required autofocus/>	
			</div> <br>

			<div>
				<label>Topic: </label>
				<input id="topic" type="text" class="form-control" name="topic" required />		
			</div> <br>
	
			<div>
				<label>Message: </label>
				<textarea id="message" class="form-control" rows="10" cols="100" name="message" required ></textarea>					
			</div> <br>

			<input type ="submit" onclick="showMessage()" value ="Create message" class="w3-button w3-teal w3-round-large"/>
			<input type ="reset" value ="Reset form" class="w3-button w3-teal w3-round-large"/>
		</div>
	</form>
</div>

