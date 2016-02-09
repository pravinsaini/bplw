<?php
	include('../config.php');
	$bitsid = $_SESSION['bitsid'];
	date_default_timezone_set("Etc/UTC");
	$userinfo = mysql_fetch_array(mysql_query("select * from users where bitsid = '".$bitsid."'"));
	echo '<div class="commMenu"><input type="button" onclick="commMenu(this)" value="Back" class="commMenu_back"></div><br><br><div align="center" class="newConv"><select name="topic" id="topic" onchange="newConv(this)"><option>Select a Topic...</option><option value="breview" ';
	if(isset($_POST['cat']) && $_POST['cat']=="breview"){
		echo 'selected="selected" ';
	}
	echo '>I Just Read This Book!</option><option value="grieve" ';
	if(isset($_POST['cat']) && $_POST['cat']=="grieve"){
		echo 'selected="selected" ';
	}
	echo '>Not Happy with the Service</option><option value="ill" ';
	if(isset($_POST['cat']) && $_POST['cat']=="ill"){
		echo 'selected="selected" ';
	}
	echo '>Document Not Found on the Shelf</option><option value="ao" ';
	if(isset($_POST['cat']) && $_POST['cat']=="ao"){
		echo 'selected="selected" ';
	}
	echo '>Database Not Accessible!</option>';
	echo '<option value="breco" ';
	if(isset($_POST['cat']) && $_POST['cat']=="breco"){
		echo 'selected="selected" ';
	}
	echo '>Book Recommendation</option>';
	echo '<option value="feedback" ';
	if(isset($_POST['cat']) && $_POST['cat']=="feedback"){
		echo 'selected="selected" ';
	}
	echo '>Feedback Form</option>';
	echo '</select><br /><br />';
	if(isset($_POST['cat']) || isset($_POST['nature'])){
		$cat = $_POST['cat'];
		if($cat=="breview" && $userinfo["category"]!="Admin"){
			if(!isset($_POST['inputArray'])){
				echo '<div class="newConv"><table align="center" style="border: 1px solid #4a9ace;"><tr><td><table style="margin:20px; color:#211d70;" align="center"><tr><td valign="middle">Title:</td><td><input type="text" class="commMenu_text_box" name="title" term="Title of the Book" /></td></tr><tr><td valign="middle">Author:</td><td><input type="text" class="commMenu_text_box" name="author" term="Author of the Book" /></td></tr><tr><td valign="top">Your Review:<br/><span style="font-size:10px;">(Maximum 75 words)</span></td><td><textarea class="commMenu_textarea" name="review" term="Your Review" onkeyup="textarea(this,event)" /></td></tr><tr><td></td><td><input class="Stylish_button" type="submit" value="Submit" onclick="newConv(this)" /></td></tr></table></td></tr></table></div>';
			}
			else{
				if($userinfo['category']!="Admin"){
					$title = $_POST['inputArray'][1];
					$author = $_POST['inputArray'][2];
					$review = $_POST['inputArray'][3];
					$topic = "I Just Read This Book !";
					$comms = "Title: ".$title."<br />"."Author: ".$author."<br />"."Review: ".$review;
					$date = date("d/m/Y");
					$time=  date('h:i:s');
					$id = mysql_num_rows(mysql_query("select * from communications"));
					$id = $id + 1;
					$admins = "";
					$x = mysql_num_rows(mysql_query("select * from automessage  where type='".$cat."' and status='first'"));
					if($x>0){
						$auto = mysql_fetch_array(mysql_query("select * from automessage  where type='".$cat."' and status='first'"));
						$comm = $userinfo['name']."(Date-".$date.",Time-".$time.")| ".$comms." // From Library(Date-".$date.",Time-".$time.")| ".$auto['text']." //";
					}
					else{
						$comm = $userinfo['name']."(Date-".$date.",Time-".$time.")| ".$comms." //";
					}
					mysql_query("insert into communications (bitsid,topic,comms,status,admins,id,date,cat,time) values ('".$bitsid."','".$topic."','".$comm."','open','".$admins."','".$id."','".$date."','".$cat."','".$time."')");
				}
			}
		}
		else if($cat=="grieve"){
			if(!isset($_POST['inputArray'])){
				if(!isset($_POST['nature'])){
					echo '<div class="radio"><input type="radio" name="nature1" value="Photocopy Service" onchange="newConv(this)"><span>Photocopy Service</span></div><div class="radio"><input type="radio" name="nature1" value="Help Desk" onchange="newConv(this)"><span>Help Desk</span></div><div class="radio"><input type="radio" name="nature1" value="Text Book Counter" onchange="newConv(this)"><span>Text Book Counter</span></div><div class="radio"><input type="radio" name="nature1" value="Issue & Return" onchange="newConv(this)"><span>Issue & Return</span></div><div class="radio"><input type="radio" name="nature1" value="Reference Service" onchange="newConv(this)"><span>Reference Service</span></div><div class="radio"><input type="radio" name="nature1" value="Gate Keeping" onchange="newConv(this)"><span>Gate Keeping</span></div>';
				}
				else{
					$nature = $_POST['nature'];
					echo '<div class="radio"><input type="radio" ';
					if($nature=="Photocopy Service"){
						echo 'checked="checked"';
					}
					echo ' name="nature1" value="Photocopy Service" onchange="newConv(this)"><span>Photocopy Service</span></div><div class="radio"><input type="radio" ';
					if($nature=="Help Desk"){
						echo 'checked="checked"';
					}
					echo ' name="nature1" value="Help Desk" onchange="newConv(this)"><span>Help Desk</span></div><div class="radio"><input type="radio" ';
					if($nature=="Text Book Counter"){
						echo 'checked="checked"';
					}
					echo '  name="nature1" value="Text Book Counter" onchange="newConv(this)"><span>Text Book Counter</span></div><div class="radio"><input type="radio" ';
					if($nature=="Issue & Return"){
						echo 'checked="checked"';
					}
					echo '  name="nature1" value="Issue & Return" onchange="newConv(this)"><span>Issue & Return</span></div><div class="radio"><input type="radio" ';
					if($nature=="Reference Service"){
						echo 'checked="checked"';
					}
					echo '  name="nature1" value="Reference Service" onchange="newConv(this)"><span>Reference Service</span></div><div class="radio"><input id="last" type="radio" ';
					if($nature=="Gate Keeping"){
						echo 'checked="checked"';
					}
					echo '  name="nature1" value="Gate Keeping" onchange="newConv(this)"><span>Gate Keeping</span></div><br><br><div align="left">&nbsp;&nbsp;&nbsp;State your Grievance: <br>&nbsp;&nbsp;&nbsp;<textarea class="commMenu_textarea" name="review" term="State your Grievance" /><br><div algin="center" style="margin-left:10px;"><input class="Stylish_button" type="submit" value="Submit" onclick="newConv(this)" /></div></div>';
				}
			}
			else{
				if($userinfo['category']!="Admin"){
					$topic = "Not Happy with: ".$_POST['inputArray'][1];
					$comms = $_POST['inputArray'][2];
					$date = date("d/m/Y");
					$time=  date('h:i:s');
					$id = mysql_num_rows(mysql_query("select * from communications"));
					$id = $id + 1;
					$admins = "";
					$x = mysql_num_rows(mysql_query("select * from automessage  where type='".$cat."' and status='first'"));
					if($x>0){
						$auto = mysql_fetch_array(mysql_query("select * from automessage  where type='".$cat."' and status='first'"));
						$comm = $userinfo['name']."(Date-".$date.",Time-".$time.")| ".$comms." // From Library(Date-".$date.",Time-".$time.")| ".$auto['text']." //";
					}
					else{
						$comm = $userinfo['name']."(Date-".$date.",Time-".$time.")| ".$comms." //";
					}
					mysql_query("insert into communications (bitsid,topic,comms,status,admins,id,date,cat,time) values ('".$bitsid."','".$topic."','".$comm."','open','".$admins."','".$id."','".$date."','".$cat."','".$time."')");
				}
			}
		}
		else if($cat=="ill"){
			if(!isset($_POST['inputArray'])){
				if(!isset($_POST['nature'])){
					echo '<div class="radio"><input type="radio" name="nature" value="Books" onchange="newConv(this)"><span>Books</span></div><div class="radio"><input type="radio" name="nature" value="Articles" onchange="newConv(this)"><span>Journals</span></div>';
			  	}
				else{
					$nature = $_POST['nature'];
					if($nature=="Books"){
						echo '<div class="radio"><input type="radio" name="nature" checked="checked" value="Books" onchange="newConv(this)"><span>Books</span></div><div class="radio"><input type="radio" name="nature" value="Articles" onchange="newConv(this)"><span>Journals</span></div><br><br>
						<table align="center" style="border: 1px solid #4a9ace;"><tr><td><table style="margin:20px; color:#211d70;" align="center"><tr><td valign="middle">Title:</td><td><input type="text" class="commMenu_text_box" name="title" term="Title of the Book" /></td></tr><tr><td valign="middle">Author:</td><td><input type="text" class="commMenu_text_box" name="author" term="Author of the Book" /></td></tr><tr><td valign="middle">Accession No.:&nbsp;</td><td><input class="commMenu_text_box" type="text" name="pub" term="Accession No." /></td></tr><tr><td></td><td><input class="Stylish_button" type="submit" value="Submit" onclick="newConv(this)" /></td></tr></table></td></tr></table>';
					}
					else{
						echo '<div class="radio"><input type="radio" name="nature" value="Books" onchange="newConv(this)"><span>Books</span></div><div class="radio"><input type="radio" name="nature" checked="checked" value="Articles" onchange="newConv(this)"><span>Journals</span></div><br><br>						
						<table align="center" style="border: 1px solid #4a9ace;"><tr><td><table style="margin:20px; color:#211d70;" align="center"><tr><td valign="middle">Journal Name:</td><td><input type="text" class="commMenu_text_box" name="title" term="Journal/Magazine Name" /></td></tr><tr><td valign="middle">Month:</td><td><input type="text" class="commMenu_text_box" name="issue" term="Month" /></td></tr><tr><td valign="middle">Year:&nbsp;</td><td><input class="commMenu_text_box" type="text" name="year" term="Year" /></td></tr><tr><td></td><td><input class="Stylish_button" type="submit" value="Submit" onclick="newConv(this)" /></td></tr></table></td></tr></table>';
					}
				}
			}
			else{
				$nature = $_POST['inputArray'][1];
				if($userinfo['category']!="Admin"){
					if($nature=="Books"){
						$title = $_POST['inputArray'][2];
						$author = $_POST['inputArray'][3];
						$acc = $_POST['inputArray'][4];
						$topic = "Book Not Found on the Shelf";
						$comms = "Title: ".$title."<br />"."Author: ".$author."<br />"."Accession No.: ".$acc;
						$date = date("d/m/Y");
					    $time=  date('h:i:s');
						$id = mysql_num_rows(mysql_query("select * from communications"));
						$id = $id + 1;
						$admins = "";
						$x = mysql_num_rows(mysql_query("select * from automessage  where type='".$cat."' and status='first'"));
						if($x>0){
							$auto = mysql_fetch_array(mysql_query("select * from automessage  where type='".$cat."' and status='first'"));
							$comm = $userinfo['name']."(Date-".$date.",Time-".$time.")| ".$comms." // From Library(Date-".$date.",Time-".$time.")| ".$auto['text']." //";
						}
						else{
							$comm = $userinfo['name']."(Date-".$date.",Time-".$time.")| ".$comms." //";
						}
						mysql_query("insert into communications (bitsid,topic,comms,status,admins,id,date,cat,time) values ('".$bitsid."','".$topic."','".$comm."','open','".$admins."','".$id."','".$date."','".$cat."','".$time."')");
					}
					else{
						var_dump($_POST);
						$title = $_POST['inputArray'][2];
						$month = $_POST['inputArray'][3];
						$year = $_POST['inputArray'][4];
						$topic = "Journal Not Found on the Shelf";
						$comms = "Journal/Magazine Name: ".$title."<br />"."Month: ".$month."<br />"."Year.: ".$year;
						$date = date("d/m/Y");
					    $time=  date('h:i:s');
						$id = mysql_num_rows(mysql_query("select * from communications"));
						$id = $id + 1;
						$admins = "";
						$x = mysql_num_rows(mysql_query("select * from automessage  where type='".$cat."' and status='first'"));
						if($x>0){
							$auto = mysql_fetch_array(mysql_query("select * from automessage  where type='".$cat."' and status='first'"));
							$comm = $userinfo['name']."(Date-".$date.",Time-".$time.")| ".$comms." // From Library(Date-".$date.",Time-".$time.")| ".$auto['text']." //";
						}
						else{
							$comm = $userinfo['name']."(Date-".$date.",Time-".$time.")| ".$comms." //";
						}
					}
					mysql_query("insert into communications (bitsid,topic,comms,status,admins,id,date,cat,time) values ('".$bitsid."','".$topic."','".$comm."','open','".$admins."','".$id."','".$date."','".$cat."','".$time."')");
				}
			}
		}
		else if($cat=="breco"){
			if(!isset($_POST['inputArray'])){
				if(!isset($_POST['nature'])){
					echo '<select name="number" id="number" onchange="newConv(this)"><option selected="selected">No. of Books</option><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option></select>';
			  	}
				else{
					$number = intval($_POST['nature']);
					echo '<select name="number" id="number" onchange="newConv(this)"><option value="1" ';
						if($number==1){
							echo 'selected="selected" ';
						}
						echo '>1</option><option value="2" ';
						if($number==2){
							echo 'selected="selected" ';
						}
						echo '>2</option><option value="3" ';
						if($number==3){
							echo 'selected="selected" ';
						}
						echo '>3</option><option value="4" ';
						if($number==4){
							echo 'selected="selected" ';
						}
						echo '>4</option><option value="5" ';
						if($number==5){
							echo 'selected="selected" ';
						}
						echo '>5</option></select><br /><br /><table><tr><th>S. No.</th><th>Title</th><th>Author</th><th>Edition</th><th>Publisher</th><th>Year</th></tr>';
					for($i=0;$i<$number;$i++){
						echo '<tr><td>'.($i+1).'</td><td><input name="title-'.$i.'" term="Title No. '.($i+1).'" class="breco"/></td><td><input name="author-'.$i.'" term="Author No. '.($i+1).'" class="breco"/></td><td><input name="edition-'.$i.'" term="Edition No. '.($i+1).'" class="breco"/></td><td><input name="publisher-'.$i.'" term="Publisher No. '.($i+1).'" class="breco"/></td><td><input name="year-'.$i.'" term="Year No. '.($i+1).'" class="breco"/></td></tr>';
					}
					echo '</table><br><br><input type="submit" value="Submit"  onclick="newConv(this)" class="Stylish_button"/>';
				}
			}
			else{
				$number = intval($_POST['inputArray'][0]);
				if($userinfo['category']!="Admin"){
					$comms = "<table><tr><th>S. No.</th><th>Title</th><th>Author</th><th>Edition</th><th>Publisher</th><th>Year</th></tr>";
					for($i=0;$i<$number;$i++){
						$title[$i] = $_POST['inputArray'][5*$i + 1];
						$author[$i] = $_POST['inputArray'][5*$i + 2];
						$ed[$i] = $_POST['inputArray'][5*$i + 3];
						$pub[$i] = $_POST['inputArray'][5*$i + 4];
						$year[$i] = $_POST['inputArray'][5*($i+1)];
						$comms .= "<tr><td>".($i+1)."</td><td>".$title[$i]."</td><td>".$author[$i]."</td><td>".$ed[$i]."</td><td>".$pub[$i]."</td><td>".$year[$i]."</td></tr>";
					}
					$comms .= "</table>";
					$topic = "Recommended Books";
					$date = date("d/m/Y");
					$time=  date('h:i:s');
					$id = mysql_num_rows(mysql_query("select * from communications"));
					$id = $id + 1;
					$admins = "";
					$x = mysql_num_rows(mysql_query("select * from automessage  where type='".$cat."' and status='first'"));
					if($x>0){
						$auto = mysql_fetch_array(mysql_query("select * from automessage  where type='".$cat."' and status='first'"));
						$comm = $userinfo['name']."(Date-".$date.",Time-".$time.")| ".$comms." // From Library(Date-".$date.",Time-".$time.")| ".$auto['text']." //";
					}
					else{
						$comm = $userinfo['name']."(Date-".$date.",Time-".$time.")| ".$comms." //";
					}
					mysql_query("insert into communications (bitsid,topic,comms,status,admins,id,date,cat,time) values ('".$bitsid."','".$topic."','".$comm."','open','".$admins."','".$id."','".$date."','".$cat."','".$time."')");
				}
			}
		}
		else if($cat=="feedback"){
			if(!isset($_POST['inputArray'])){
				if(!isset($_POST['nature'])){
					echo '<div class="radio"><input type="radio" name="nature2" value="Suggestions" onchange="newConv(this)"><span>Suggestions</span></div><div class="radio"><input type="radio" name="nature2" value="Complaints" onchange="newConv(this)"><span>Complaints</span></div><div class="radio"><input type="radio" name="nature2" value="Compliments" onchange="newConv(this)"><span>Compliments</span></div>';
				}
				else{
					$nature = $_POST['nature'];
					echo '<div class="radio"><input type="radio" ';
					if($nature=="Suggestions"){
						echo 'checked="checked"';
					}
					echo ' name="nature2" value="Suggestions" onchange="newConv(this)"><span>Suggestions</span></div><div class="radio"><input type="radio" ';
					if($nature=="Complaints"){
						echo 'checked="checked"';
					}
					echo ' name="nature2" value="Complaints" onchange="newConv(this)"><span>Complaints</span></div><div class="radio"><input type="radio" ';
					if($nature=="Compliments"){
						echo 'checked="checked"';
					}
					echo '  name="nature2" value="Compliments" onchange="newConv(this)"><span>Compliments</span></div><br><br><div align="left">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<textarea class="commMenu_textarea" name="review" term="State your Grievance" /><br/><br/><div algin="center" style="margin-left:10px;"><input class="Stylish_button" type="submit" value="Submit" onclick="newConv(this)" /></div></div>';
				}
			}
			else{
				if($userinfo['category']!="Admin"){
					$topic = "".$_POST['inputArray'][1];
					$comms = $_POST['inputArray'][2];
					$date = date("d/m/Y");
					$time=  date('h:i:s');
					$id = mysql_num_rows(mysql_query("select * from communications"));
					$id = $id + 1;
					$admins = "";
					$x = mysql_num_rows(mysql_query("select * from automessage  where type='".$cat."' and status='first'"));
					if($x>0){
						$auto = mysql_fetch_array(mysql_query("select * from automessage  where type='".$cat."' and status='first'"));
						$comm = $userinfo['name']."(Date-".$date.",Time-".$time.")| ".$comms." // From Library(Date-".$date.",Time-".$time.")| ".$auto['text']." //";
					}
					else{
						$comm = $userinfo['name']."(Date-".$date.",Time-".$time.")| ".$comms." //";
					}
					mysql_query("insert into communications (bitsid,topic,comms,status,admins,id,date,cat,time) values ('".$bitsid."','".$topic."','".$comm."','open','".$admins."','".$id."','".$date."','".$cat."','".$time."')");
				}
			}
		}
		else{
			if(!isset($_POST['inputArray'])){
				echo '<table align="left" style="margin-left:20px; margin-bottom:20px; border: 1px solid #4a9ace;"><tr><td><table style="margin:20px; color:#211d70;" align="center"><tr><td valign="middle">Database Name:</td><td><input type="text" class="commMenu_text_box" name="title" term="Database Name" /></td></tr><tr><td valign="middle">Journal Title:</td><td><input type="text" class="commMenu_text_box" name="jour" term="Journal Title" /></td></tr><tr style="line-height:20px;"><td valign="top">Location:<br/><span style="font-size:10px;">(where Access is Denied)</span></td><td><input class="commMenu_text_box" type="text" name="loc" term="Location where Access is Denied" /></td></tr><tr><td></td><td><input class="Stylish_button" type="submit" value="Submit" onclick="newConv(this)" /></td></tr></table></td></tr></table>';
			}
			else{
				if($userinfo['category']!="Admin"){
					$dat = $_POST['inputArray'][1];
					$jour = $_POST['inputArray'][2];
					$loc = $_POST['inputArray'][3];
					$topic = "Database ".$dat." Not Accessible!";
					$comms = "Name of Database: ".$dat."<br />"."Title of Journal: ".$jour."<br />"."Location where access of denied: ".$loc;
					$date = date("d/m/Y");
					$time=  date('h:i:s');
					$id = mysql_num_rows(mysql_query("select * from communications"));
					$id = $id + 1;
					$admins = "";
					$x = mysql_num_rows(mysql_query("select * from automessage  where type='".$cat."' and status='first'"));
					if($x>0){
						$auto = mysql_fetch_array(mysql_query("select * from automessage  where type='".$cat."' and status='first'"));
						$comm = $userinfo['name']."(Date-".$date.",Time-".$time.")| ".$comms." // From Library(Date-".$date.",Time-".$time.")| ".$auto['text']." //";
					}
					else{
						$comm = $userinfo['name']."(Date-".$date.",Time-".$time.")| ".$comms." //";
					}
					mysql_query("insert into communications (bitsid,topic,comms,status,admins,id,date,cat,time) values ('".$bitsid."','".$topic."','".$comm."','open','".$admins."','".$id."','".$date."','".$cat."','".$time."')");
				}
			}
		}
		echo '</div><br><br>';
	}
?>