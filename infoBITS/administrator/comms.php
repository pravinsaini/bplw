<?php
	include("../config.php");
	if(isset($_GET['start'])){
		$start = $_GET['start'];
		$text = "";
		$menu = "<div class='commMenu'>";
		$id = $_SESSION['bitsid'];
		$userinfo = mysql_fetch_array(mysql_query("select * from users where bitsid='".$id."'"));
		if($userinfo['category']!="Admin"){
			$ul = "dcommunications";
			$comms = "select * from communications where bitsid='".$id."' ORDER BY id DESC LIMIT ".$start.",1";
			$isAdmin = 0;
		}
		else{
			if(isset($_GET['cat'])){
				$cat = $_GET['cat'];
				$comms = "select * from communications where cat='".$cat."' ORDER BY id DESC LIMIT ".$start.",1";
				$ul = "communications";
				$isAdmin = 1;
			}
		}
		$p = 0;
		$end = intval($start);
		$conversation = mysql_fetch_array(mysql_query($comms));
		while($p < 5 && $conversation){
			if($conversation){
				if($p < 4){
					$text = $text.'<li conversation="'.$conversation['id'].'" onclick="converse(this)"><div class="conversation">';
					if($isAdmin==1){
						$bitsid = $conversation['bitsid'];
						$user = mysql_fetch_array(mysql_query("select * from users where bitsid='".$bitsid."'"));
						$text = $text.'<div class="image">'.$user['name'].'</div>';
					}
					$text = $text.'<div class="info"><span';
					if($isAdmin==1 && $conversation['admins']==""){
						$text = $text.' style="color:#f00;"';
					}
					$text = $text.'>'.$conversation['topic'].'</span>&ensp;'.$conversation['date'].'&ensp;'.$conversation['time'].'<br /><span>'.$conversation['admins'].'</span></div></div></li><hr width="98%">';
				}
				$p++;
			}
			$end = $end + 1;
			if($isAdmin == 1){
				$comms = "select * from communications where cat='".$cat."' ORDER BY id DESC LIMIT ".$end.",1";
			}
			else{
				$comms = "select * from communications where bitsid='".$id."' ORDER BY id DESC LIMIT ".$end.",1";
			}
			$conversation = mysql_fetch_array(mysql_query($comms));
		}
		if($isAdmin == 0){
			$menu = $menu."<input type='button' value='Start New Communication' onclick='commMenu(this)' class='commMenu_new_Conversation'/>";
		}
		if($start < 1){
			$menu = $menu."<input type='button' class='commMenu_prev' value='Previous' />";
		}
		else{
			$menu = $menu."<input type='button' class='commMenu_prev' value='Previous' onclick='npbutton(this)' />";
		}
		if($p <= 4){
			$menu = $menu."<input type='button' class='commMenu_next' value='Next' />";
		}
		else{
			$menu = $menu."<input type='button' class='commMenu_next' value='Next' onclick='npbutton(this)' />";
		}
		$menu = $menu."</div>";
		$text = $menu."<br /><ul class='".$ul."' start='".$start."'>".$text."</ul>";
		echo $text;
	}
	else if(isset($_GET['id'])){
		$comms = mysql_num_rows(mysql_query("select * from communications"));
		$id = $_GET['id'];
		$id = intval($id);
		echo $id;
		if(mysql_query("delete from communications where id='".$id."'")){
			for($i=1;$i<=$comms;$i++){
				if($i>$id){
					$j = $i - 1;
					mysql_query("update communications set id='".$j."' where id='".$i."'");
				}
			}
		}
	}
?>