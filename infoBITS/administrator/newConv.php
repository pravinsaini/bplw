<?php
	include('../config.php');
	$bitsid = $_SESSION['bitsid'];
	date_default_timezone_set("Etc/UTC");
	$userinfo = mysql_fetch_array(mysql_query("select * from users where bitsid = '".$bitsid."'"));
	if(isset($_POST['cat']) || isset($_POST['nature'])){
		$cat = $_POST['cat'];
		$N = mysql_num_rows(mysql_query("select * from communications where bitsid = '".$bitsid."' and cat = '".$cat."'"));
		if($N > 0){
			echo '<div class="commMenu"><input type="button" onclick="commMenu(this)" value="Back" class="commMenu_back" />';	
		}
		if($cat == "breco"){
			if($N <= 0){
				echo '<div class="commMenu">';
			}
			echo '<input type="button" class="Stylish_button" onclick="newConv(this)" value="Add Row" id="AddRow" name="number" /><input type="button" class="Stylish_button" onclick="newConv(this)" value="Delete Row" id="DeleteRow" name="number" />';	
		}
		if($N > 0 || $cat == "breco"){
			echo '</div>';
		}
		echo '<div class="newConv">';
		if($cat=="breview" && $userinfo["category"]!="Admin"){
			if(!isset($_POST['inputArray'])){
				echo '<table style="color:#211d70;" align="center"><tr><td valign="middle">Title:</td><td><input type="text" class="commMenu_text_box" name="title" term="Title of the Book" /></td></tr><tr><td valign="middle">Author:</td><td><input type="text" class="commMenu_text_box" name="author" term="Author of the Book" /></td></tr><tr><td valign="top">Your Review:<br/><span style="font-size:10px;">(Maximum 75 words)</span></td><td><textarea class="commMenu_textarea" name="review" term="Your Review" onkeyup="textarea(this,event)" /></td></tr><tr><td></td><td><input class="Stylish_button" type="submit" value="Submit" onclick="newConv(this)" /></td></tr></table>';
			}
			else{
				if($userinfo['category']!="Admin"){
					$title = $_POST['inputArray'][0];
					$author = $_POST['inputArray'][1];
					if(mysql_query("select id from bookreview where bitsid = '".$userinfo['bitsid']."' and title like '%".$title."%' and author like '%".$author."%'")){
						echo '<p class="error-message">Book Review has already been submitted.</p><table style="color:#211d70;" align="center"><tr><td valign="middle">Title:</td><td><input type="text" class="commMenu_text_box" value="'.$_POST['inputArray'][0].'" name="title" term="Title of the Book" /></td></tr><tr><td valign="middle">Author:</td><td><input type="text" class="commMenu_text_box" name="author" value="'.$_POST['inputArray'][1].'" term="Author of the Book" /></td></tr><tr><td valign="top">Your Review:<br/><span style="font-size:10px;">(Maximum 75 words)</span></td><td><textarea class="commMenu_textarea" name="review" term="Your Review" onkeyup="textarea(this,event)">'.$_POST['inputArray'][2].'</textarea></td></tr><tr><td></td><td><input class="Stylish_button" type="submit" value="Submit" onclick="newConv(this)" /></td></tr></table>';;
					}
					else{
						$review = $_POST['inputArray'][2];
						$topic = "I Just Read: ".$title;
						$comms = "Title: ".$title."<br />"."Author: ".$author."<br />"."Review: ".$review;
						$date = date("d/m/Y");
						$time=  date('h:i A');
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
		}
		else if($cat=="grieve"){
			if(!isset($_POST['inputArray'])){
				echo '<div class="radio"><input type="radio" name="nature1" value="Text Book Counter" checked="checked" /><span>Text Book Counter</span></div><div class="radio"><input type="radio" name="nature1" value="Help Desk" /><span>Help Desk</span></div><div class="radio"><input type="radio" name="nature1" value="Photocopy Service" /><span>Photocopy Service</span></div><div class="radio"><input type="radio" name="nature1" value="Issue & Return" /><span>Issue & Return</span></div><div class="radio"><input type="radio" name="nature1" value="Reference Service" /><span>Reference Service</span></div><div class="radio"><input type="radio" name="nature1" value="Gate Keeping" /><span>Gate Keeping</span></div><br /><br /><div align="left">&nbsp;&nbsp;&nbsp;State your Grievance: <br>&nbsp;&nbsp;&nbsp;<textarea class="commMenu_textarea" name="review" term="State your Grievance" /><br><div algin="center" style="margin-left:10px;"><input class="Stylish_button" type="submit" value="Submit" onclick="newConv(this)" /></div></div>';
			}
			else{
				if($userinfo['category']!="Admin"){
					$topic = "Not Happy with: ".$_POST['inputArray'][0];
					$comms = $_POST['inputArray'][1];
					$date = date("d/m/Y");
					$time=  date('h:i A');
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
				if(!isset($_POST['nature']) || $_POST['nature'] == "Books"){
					echo '<br/><div class="radio"><input type="radio" name="nature" checked="checked" value="Books" onchange="newConv(this)"><span>Books</span></div><div class="radio"><input type="radio" name="nature" value="Articles" onchange="newConv(this)"><span>Journals</span></div>
					<table style="color:#211d70;" align="center"><tr><td valign="middle">Title:</td><td><input type="text" class="commMenu_text_box" name="title" term="Title of the Book" /></td></tr><tr><td valign="middle">Author:</td><td><input type="text" class="commMenu_text_box" name="author" term="Author of the Book" /></td></tr><tr><td valign="middle">Accession No.:&nbsp;</td><td><input class="commMenu_text_box" type="text" name="pub" term="Accession No." /></td></tr><tr><td></td><td><input class="Stylish_button" type="submit" value="Submit" onclick="newConv(this)" /></td></tr></table>';
				}
				else{
					echo '<br/><div class="radio"><input type="radio" name="nature" value="Books" onchange="newConv(this)"><span>Books</span></div><div class="radio"><input type="radio" name="nature" checked="checked" value="Articles" onchange="newConv(this)"><span>Journals</span></div>
					<table style="color:#211d70;" align="center"><tr><td valign="middle">Journal Name:</td><td><input type="text" class="commMenu_text_box" name="title" term="Journal/Magazine Name" /></td></tr><tr><td valign="middle">Month:</td><td><input type="text" class="commMenu_text_box" name="issue" term="Month" /></td></tr><tr><td valign="middle">Year:&nbsp;</td><td><input class="commMenu_text_box" type="text" name="year" term="Year" /></td></tr><tr><td></td><td><input class="Stylish_button" type="submit" value="Submit" onclick="newConv(this)" /></td></tr></table>';
				}
			}
			else{
				$nature = $_POST['inputArray'][0];
				if($userinfo['category']!="Admin"){
					if($nature=="Books"){
						$title = $_POST['inputArray'][1];
						$author = $_POST['inputArray'][2];
						$acc = $_POST['inputArray'][3];
						$topic = "Book Not Found: ".$title;
						$comms = "Title: ".$title."<br />"."Author: ".$author."<br />"."Accession No.: ".$acc;
						$date = date("d/m/Y");
					    $time=  date('h:i A');
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
						$title = $_POST['inputArray'][1];
						$month = $_POST['inputArray'][2];
						$year = $_POST['inputArray'][3];
						$topic = "Journal Not Found: ".$title;
						$comms = "Journal/Magazine Name: ".$title."<br />"."Month: ".$month."<br />"."Year.: ".$year;
						$date = date("d/m/Y");
					    $time=  date('h:i A');
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
					echo '<table><tr><th>S. No.</th><th>Title</th><th>Author</th><th>Edition</th><th>Publisher</th><th>Year</th></tr><tr><td>1</td><td><input name="title-0" term="Title No. 1" class="breco"/></td><td><input name="author-0" term="Author No. 1" class="breco"/></td><td><input name="edition-0" term="Edition No. 1" class="breco"/></td><td><input name="publisher-0" term="Publisher No. 1" class="breco"/></td><td><input name="year-0" term="Year No. 1" class="breco"/></td></tr></table><input type="submit" value="Submit" onclick="newConv(this)" class="Stylish_button"/>';
				}
			}
			else{
				$number = count($_POST)/5;
				if($userinfo['category']!="Admin"){
					$comms = "<table><tr><th>S. No.</th><th>Title</th><th>Author</th><th>Edition</th><th>Publisher</th><th>Year</th></tr>";
					for($i=0;$i<$number;$i++){
						$title[$i] = $_POST['inputArray'][5*$i];
						$author[$i] = $_POST['inputArray'][5*$i + 1];
						$ed[$i] = $_POST['inputArray'][5*$i + 2];
						$pub[$i] = $_POST['inputArray'][5*$i + 3];
						$year[$i] = $_POST['inputArray'][5*$i + 4];
						$comms .= "<tr><td>".($i+1)."</td><td>".$title[$i]."</td><td>".$author[$i]."</td><td>".$ed[$i]."</td><td>".$pub[$i]."</td><td>".$year[$i]."</td></tr>";
					}
					$comms .= "</table>";
					$topic = "Books Recommended";
					$date = date("d/m/Y");
					$time=  date('h:i A');
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
				echo '<div class="radio"><input type="radio" name="nature2" value="Suggestions" checked="checked" /><span>Suggestions</span></div><div class="radio"><input type="radio" name="nature2" value="Complaints" /><span>Complaints</span></div><div class="radio"><input type="radio" name="nature2" value="Compliments" /><span>Compliments</span></div><br><br><div align="left">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<textarea class="commMenu_textarea" name="review" term="State your Grievance" /><br/><br/><div algin="center" style="margin-left:10px;"><input class="Stylish_button" type="submit" value="Submit" onclick="newConv(this)" /></div></div>';
			}
			else{
				if($userinfo['category']!="Admin"){
					$topic = "".$_POST['inputArray'][0];
					$comms = $_POST['inputArray'][1];
					$date = date("d/m/Y");
					$time=  date('h:i A');
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
				echo '<table style="color:#211d70;" align="center"><tr><td valign="middle">Database Name:</td><td><input type="text" class="commMenu_text_box" name="title" term="Database Name" /></td></tr><tr><td valign="middle">Journal Title:</td><td><input type="text" class="commMenu_text_box" name="jour" term="Journal Title" /></td></tr><tr style="line-height:20px;"><td valign="top">Location:<br/><span style="font-size:10px;">(where Access is Denied)</span></td><td><input class="commMenu_text_box" type="text" name="loc" term="Location where Access is Denied" /></td></tr><tr><td></td><td><input class="Stylish_button" type="submit" value="Submit" onclick="newConv(this)" /></td></tr></table>';
			}
			else{
				if($userinfo['category']!="Admin"){
					$dat = $_POST['inputArray'][0];
					$jour = $_POST['inputArray'][1];
					$loc = $_POST['inputArray'][2];
					$topic = "Database Not Accessible! : ".$dat;
					$comms = "Name of Database: ".$dat."<br />"."Title of Journal: ".$jour."<br />"."Location where access of denied: ".$loc;
					$date = date("d/m/Y");
					$time=  date('h:i A');
					$id = mysql_num_rows(mysql_query("select * from communications"));
					$id = $id + 1;
					$admins = "";
					$x = mysql_num_rows(mysql_query("select * from automessage where type='".$cat."' and status='first'"));
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
	echo '</div>';
?>