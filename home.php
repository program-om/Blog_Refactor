<div class="w3-container">

					
    <h2>Announcements</h2>
        
    <?php
    foreach (glob("announcements/*.txt") as $file) {

        $contentString = file_get_contents($file);
        $content = explode("\n", $contentString);
        echo '<div class="well" style="width:60%">
        <div>'
        .$content[1].
        '</div>
        <br>
        <div class="row">
        <div class="col-md-12 post-header-line">
            <span class="glyphicon glyphicon-calendar">'
            .$content[0].	
        '</div>
        </div>
        </div>';
    }
    ?>
    <?php 
        $authorized = $_SESSION['authorized'];
        $str = '<div class="create announcement" ';
            
        if($authorized === "FALSE") {
            $str .= 'hidden';
        }

        $str .= '>';
        echo $str;
    ?>

    <form action="annouce-cgi.php" method="post">
        <br><label>Announcement:</label>
        <textarea rows="5" cols="50" class="form-control" style="width:80%" tname="announcement" required ></textarea><br>
        <input type="submit" name="submit_button" value="Post Annoucement" class="w3-button w3-teal w3-round-large"/>
        <input type="reset" value="Reset" class="w3-button w3-teal w3-round-large"/>
    </form>

</div>
<br>
</div>