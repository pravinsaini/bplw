<?php
	include("../config.php");
	if(isset($_GET['start'])){
		$start = $_GET['start'];
		$text = "";
		$menu = "<div class='commMenu'>";
		$id = $_SESSION['bitsid'];
		$userinfo = mysql_fetch_array(mysql_query("select * from users where bitsid='".$id."'"));
		$comms = "select * from communications where ";
		if(isset($_GET['cat'])){
			$cat = $_GET['cat'];
			$comms .= "cat='".$cat."' "; 
		}
		if($userinfo['category']!="Admin"){
			$ul = "dcommunications";
			$comms .= "and bitsid='".$id."' ";
			$isAdmin = 0;
		}
		else{
			$ul = "communications";
			$isAdmin = 1;
		}
		$comms .= "ORDER BY id DESC LIMIT ".$start.",5";
		$p = 0;
		$end = intval($start);
		$conversation = NULL;
		if($comm = mysql_query($comms)){
			$conversation = mysql_fetch_array($comm);
		}
		while($p < 5 && $conversation){
			if($conversation){
				if($p < 4){
					$text = $text.'<li conversation="'.$conversation['id'].'" onclick="converse(this)"><div class="conversation">';
					if($isAdmin==1){
						$bitsid = $conversation['bitsid'];
						$user = mysql_fetch_array(mysql_query("select * from users where bitsid='".$bitsid."'"));
						$text = $text.'<div class="image"><span class="category">'.$user['category'].'</span> '.$user['name'].'</div>';
					}
					$text = $text.'<div class="info"><span';
					if($isAdmin==1 && $conversation['admins']==""){
						$text = $text.' style="color:#f00;"';
					}
					$text = $text.'>'.$conversation['topic'].'</span><br />'.$conversation['date'].' | '.$conversation['time'].'<br /><span>'.$conversation['admins'].'</span></div></div></li><hr width="98%">';
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
			$conversation = mysql_fetch_array($comm);
		}
		if($text == ""){
			$text = "<p class='no-messages'>No conversations to display</p>";
		}
		if($p>0){
			if($start < 1){
				$menu = $menu."<input type='button' class='commMenu_prev inactive' value='Previous' />";
			}
			else{
				$menu = $menu."<input type='button' class='commMenu_prev' value='Previous' onclick='npbutton(this)' />";
			}
			if($p <= 4){
				$menu = $menu."<input type='button' class='commMenu_next inactive' value='Next' />";
			}
			else{
				$menu = $menu."<input type='button' class='commMenu_next' value='Next' onclick='npbutton(this)' />";
			}
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