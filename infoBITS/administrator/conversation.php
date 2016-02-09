<?php
	include("../config.php");
	date_default_timezone_set("Etc/UTC");
	if(isset($_GET['conversation'])){
		$conversation = $_GET['conversation'];
		$start = 0;
		if(isset($_GET['start'])){
			$start = $_GET['start'];
			$start = intval($start);
		}
		$talk = mysql_fetch_array(mysql_query("select * from communications where id='".$conversation."'"));
		$admins = array();
		$na = substr_count($talk['admins'],";");
		$p = 0;
		for($i=1;$i<=$na;$i++){
			$pos = strpos($talk['admins'],";",$p);
			$admins[$i-1] = substr($talk['admins'],$p,$pos-$p);
			$p = $pos+1;
		}
		$bitsid = $talk['bitsid'];
		$bitsid1 = $_SESSION['bitsid'];
		$userinfo = mysql_fetch_array(mysql_query("select * from users where bitsid='".$bitsid."'"));
		$userinfo1 = mysql_fetch_array(mysql_query("select * from users where bitsid='".$bitsid1."'"));
		$text = $talk['comms'];
		$n = substr_count($text," //");
		$p = 0;
		$name = array();
		$string = array();
		$date = array();
		$time = array();
		for($i=1;$i<=$n;$i++){
			$pos = strpos($text,"|",$p);
			$pos1 = strpos($text," //",$p);
			$pos2 = strpos($text,"(Date-",$p);
			$pos3 = strpos($text,",Time-",$p);
			$date[$i-1] = substr($text,$pos2+6,$pos3-$pos2-6);
			$time[$i-1] = substr($text,$pos3+6,$pos-$pos3-7);
			$name[$i-1] = substr($text,$p,$pos2-$p);
			$string[$i-1] = substr($text,$pos+1,$pos1-$pos-1);
			$p = $pos1 + 4;
		}
		$conv = "";
		$p = 0;
		for($i=$n;$i>=1 && $p<4;$i--){
			if($i<=$n-$start){
				$x = 0;
				if($name[$i-1]=="From Library" && $userinfo1['category']=="Admin"){
					$x = 2;
				}
				for($j=0;$j<$na;$j++){
					if($name[$i-1]==$admins[$j]){
						$x = 1;
						$j = $na;
					}
				}
				if($x==0){
					$p++;
					$conv = $conv.'<li><div class="conversation1"><div class="image">'.$name[$i-1].'</div> | <div class="date"><span>Date</span>: '.$date[$i-1].'&ensp;<span>Time</span>: '.$time[$i-1].'</div><br /><br /><div class="info"><p>'.$string[$i-1].'</p></div></div></li><hr width="96%">';
				}
				else if($x==1){
					$p++;
					$conv = $conv.'<li><div class="conversation1"><div class="image">Administrator</div> | <div class="date"><span>Date</span>: '.$date[$i-1].'&ensp;<span>Time</span>: '.$time[$i-1].'</div><br /><br /><div class="info"><p>'.$string[$i-1].'</p></div></div></li><hr width="96%">';
				}
			}
		}
		$presetno = mysql_num_rows(mysql_query("select * from automessage "));
		$presetMess = array();
		$presetVal = array();
		$q = 0;
		for($i=1;$i<=$presetno;$i++){
			$preset = mysql_fetch_array(mysql_query("select * from automessage  where id='".$i."'"));
			if($preset['type']==$talk['cat'] && $preset['status']!="first"){
				$presetMess[$q] = $preset['text'];
				$q++;
			}
		}
		echo "<div class='commMenu'><input type='button' value='Back' onclick='commMenu(this)' class='commMenu_back'/><input type='button' value='Reply' onclick='commMenu(this)' class='commMenu_reply'/>";
		if($n<=$p+$start || (($n-1)<=$p+$start && $userinfo1['category']=="Admin")){
			if($start==0){
				echo "</div><div class='commMenu'><input type='button' class='commMenu_prev inactive' value='Previous' /><input type='button' class='commMenu_next inactive' value='Next' /></div><br /><ul class='talk' conv='".$conversation."' start='".$start."'>".$conv."</ul>";
			}
			else{
				echo "</div><div class='commMenu'><input type='button' class='commMenu_prev' value='Previous' onclick='npbutton(this)' /><input type='button' class='commMenu_next inactive' value='Next' /></div><br /><ul class='talk' conv='".$conversation."' start='".$start."'>".$conv."</ul>";
			}
		}
		else{
			if($start==0){
				echo "</div><div class='commMenu'><input type='button' class='commMenu_prev inactive' value='Previous' /><input type='button' class='commMenu_next' value='Next' onclick='npbutton(this)' /></div><br /><ul class='talk' conv='".$conversation."' start='".$start."'>".$conv."</ul>";
			}
			else{
				echo "</div><div class='commMenu'><input type='button' class='commMenu_prev' value='Previous' onclick='npbutton(this)' /><input type='button' class='commMenu_next' value='Next' onclick='npbutton(this)' /></div><br /><ul class='talk' conv='".$conversation."' start='".$start."'>".$conv."</ul>";
			}
		}
		if($userinfo1['category']=="Admin"){
			if($q>0){
				echo "<select func='replacer' id='replacer' onchange='inputSubmit(this,event)'><option value='0'>Select a preset message...</option>";
				for($i=0;$i<$q;$i++){
					echo "<option value=".($i+1).">".$presetMess[$i]."</option>";
				}
				echo "</select><br><br>";
			}
		}
		echo "<div><textarea id='comm'/></div><br />&nbsp;&nbsp;&nbsp;<input type='button' style='display:none;' class='commMenu_send_button' name='comm".$conversation."' value='Send' id='commSend' onclick='inputSubmit(this,event)' />";//<input type='file' id='commfile' onchange='fileSubmit(this)' style='display:none;' name='file".$conversation."' />";
	}
	if(isset($_POST['comm'],$_POST['name'])){
		if(isset($_POST['obj'])){
			var_dump($_FILES['commfile']);
		}
		$bitsid = $_SESSION['bitsid'];
		$name = $_POST['name'];
		$id = substr($name,4);
		$comms = $_POST['comm'];
		$comms = str_replace(array("\r\n", "\n", "\r"),"<br />",$comms);
		$comms = str_replace("(href=","<a href=",$comms);
		$comms = str_replace('")','">',$comms);
		$comms = str_replace('//','</a>',$comms);
		$userinfo = mysql_fetch_array(mysql_query("select * from users where bitsid='".$bitsid."'"));
		$conversation = mysql_fetch_array(mysql_query("select * from communications where id='".$id."'"));
		$admins = array();
		$na = substr_count($conversation['admins'],";");
		$p = 0;
		$x = 0;
		for($i=1;$i<=$na;$i++){
			$pos = strpos($conversation['admins'],";",$p);
			$admins[$i-1] = substr($conversation['admins'],$p,$pos-$p);
			if($admins[$i-1]==$userinfo['name']){
				$x=1;
				$i=$na;
			}
			$p = $pos+1;
		}
		if($x==1){
			$comm = $conversation['comms'];
			$date = date("d/m/Y");
			$time=  date('h:i:s');
			$comm = $comm." ".$userinfo['name']."(Date-".$date.",Time-".$time.")| ".$comms." //";
			mysql_query("UPDATE communications SET comms='".$comm."' WHERE id ='".$id."'");
		}
		else if($userinfo['category']=="Admin"){
			$comm = $conversation['comms'];
			$admin = $conversation['admins'].$userinfo['name'].";";
			$date = date("d/m/Y");
			$time=  date('h:i:s');
			$comm = $comm." ".$userinfo['name']."(Date-".$date.",Time-".$time.")| ".$comms." //";
			mysql_query("UPDATE communications SET admins='".$admin."' WHERE id ='".$id."'");
			mysql_query("UPDATE communications SET comms='".$comm."' WHERE id ='".$id."'");
		}
		else{
			$comm = $conversation['comms'];
			$date = date("d/m/Y");
			$time=  date('h:i:s');
			$comm = $comm." ".$userinfo['name']."(Date-".$date.",Time-".$time.")| ".$comms." //";
			mysql_query("UPDATE communications SET comms='".$comm."' WHERE id ='".$id."'");
		}
	}
?>