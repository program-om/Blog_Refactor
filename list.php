<hr>			
<script>
	// Lists all the files when a button is hit.
	function loadFileList() {
		var result = "<?php listAllMessages();?>";
		document.getElementById("calendar_list").innerHTML = result;
		return false;
	}

	// cancelReply(), bindToCancel(), and ReplyMsg all used by the REPLY button in the Browse list.
	function cancelReply(count,folder){
		var replyBoxID = "replyBox"+count;
		var str1 = '<p id="'+replyBoxID+'">';
		var cancelStr = str1 + 
			'<button type="button" class="w3-button w3-teal w3-round-large" ' +
			'onclick="replyMsg(\''+count+'\',\''+folder+'\')">Reply  <i class="fa fa-reply"></i></button></p>';
		
		document.getElementById(replyBoxID).innerHTML=cancelStr;
	}

	function bindToCancel() {
		document.getElementById("cancel_button").onclick = function(e) {
				e.preventDefault();

				var count = e.target.getAttribute('data-count');
				var folder = e.target.getAttribute('data-folder');

				cancelReply(count, folder);
				return false;
		}
	}

	function replyMsg(count,folder) {
		//id of object that called is replyBox<count>
		var replyStrNum = "replyBox" + count;
		var str = '<form action="reply-cgi.php" method="post">'+
			'<input type="hidden" name="folder" value="'+folder+'" />' +
			'<label>Username:</label>' +
			'<input type="text" class="form-control" style="width:40%" name="username" required autofocus /><br>' +
			'<label>REPLY:</label>' +
			'<textarea class="form-control" rows="4" cols="25" style="width:40%" name="reply" required autofocus></textarea><br>' +
			'<input type="submit" name="submit_button" value="Post Reply" class="w3-button w3-teal w3-round w3-tiny"/>'+
			'<input type="reset" value="Reset" class="w3-button w3-teal w3-round w3-tiny"/>'+
			'<button id="cancel_button" class="w3-button w3-teal w3-round w3-tiny" data-count="' +
			count + '" data-folder="' + folder + '">Cancel</button>' +
			'</form>'
			;
		document.getElementById(replyStrNum).innerHTML = str;
		bindToCancel();

	}
</script>

<!-- Attempt to call PHP function from javascript with a button -->
<div>
	<?php
		function listAllMessages()
		{
			$str="";
			$parent_count=0;
			chdir('Posts');
			foreach (glob("*folder") as $folder) 
			{
				//$str .= "FOLDERNAME: ".$folder;
				$count = 0;	
				$str2="";
				foreach (glob($folder."/*.txt") as $file) 
				{
					if($count==0) 
					{
						//$str2 .= '<div class="parent_topic">';
						$filename = substr($file, strlen($folder)+1);
						$str2 .= 'Topic:        ' .$filename.'<br>';
						//$str2 .= '</div>';
					} else {
						$filename = substr($file, strlen($folder)+1);
						$str2 .= '--- Reply (' . $count. '):      ' . $filename.'<br>';
					}
					$count++;
				}
				$str .= $str2;
				$str .= '<hr>';
				$parent_count++;
			} 
			echo $str;
		}
	?>
</div>

<div id="browseList">
	<h2>All Messages</h2>

	<?php
		$parent_count = 0;
		//chdir('Posts');
		foreach (glob("*folder") as $folder) {
			$count = 0;
			$count2 = 0;						
			foreach (glob($folder."/*.txt") as $file) {
				if($count==0) {
					$contentString = file_get_contents($file);
					$content = explode("\n", $contentString);

					echo '<div class="well" style="width:90%">';
					echo '<div>
							<h3>'.$content[1].' </h3>
							<div class="row">
								<div class="col-md-12 post-header-line">
									<span class="glyphicon glyphicon-user"></span>
									by <a>'.$content[0].'</a> | <span class="glyphicon glyphicon-calendar">
									</span>'.$content[2]. '
								</div>
							</div>
						</div>
						<hr>';
					echo '<div>';
					for( $i=4; $i < count($content); $i++){
						echo '<p>'. $content[$i] .'</p>';
					} 
					echo '</div>';
					//reply button
					if($content[3] == "on"){
						echo '<p id="replyBox'.$parent_count.'">';
						echo '<br><br>
							<button type="button" class="w3-button w3-teal w3-round-large" onclick="replyMsg(
							'.$parent_count.', \''.$folder.'\')">Reply <i class="fa fa-reply"></i></button>';
						echo '</p>';
					}else{
						echo '<br> <i class="fa fa-lock" style="font-size:15px"> Locked</i>
						<p></p>';
					}

					$parent_count++;
				} else {
					if($count2%2 == 0){
						$contentString2 = file_get_contents($file);
						$content2 = explode("\n", $contentString2);
						echo '<div class="reply_file">';
						for( $i=3; $i < count($content); $i++){
							echo '<p>'. $content2[$i] .'</p>';
						} 
						echo '<div class="row post-content"></div>
							<div class="row">
								<div class="col-md-12 post-header-line">
									<span class="glyphicon glyphicon-user"></span>
									by <a>'.$content2[0].'</a> | <span class="glyphicon glyphicon-calendar">
									</span>'.$content2[1]. '
								</div>
							</div>
							</div>
							<br>';
					}
					else{
						
						$contentString2 = file_get_contents($file);
						$content2 = explode("\n", $contentString2);
						echo '<div class="reply_file">';
						for( $i=3; $i < count($content); $i++){
							echo '<p>'. $content2[$i] .'</p>';
						}
						echo '<div class="row">
								<div class="col-md-12 post-header-line">
									<span class="glyphicon glyphicon-user"></span>
									by <a>'.$content2[0].'</a> | <span class="glyphicon glyphicon-calendar">
									</span>'.$content2[1]. '
								</div>
							</div>
							</div>
							<br>';
					}
					$count2++;
				}
				$count++;
			
			}
			echo '</div>';
		}
	?>
</div>