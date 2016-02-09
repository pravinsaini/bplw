<?php
	include("../config.php");
	$message = "";
	?>
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta content="text/html; charset=utf-8" http-equiv="Content-Type">
		<title>Survey Process</title>
		<link href="../images/fav_32.png" type="image/png" rel="icon">
		<link type="text/css" rel="stylesheet" href="../css/reset.css">
		<link type="text/css" rel="stylesheet" href="../css/main.css">
		<link type="text/css" rel="stylesheet" href="../css/dashboard.css">
		<link type="text/css" rel="stylesheet" href="../css/module.css">
		<script type="text/javascript" src="../js/jquery-1.4.1.min.js"></script>
		<script type="text/javascript" src="../js/metadata.js"></script>
		<script type="text/javascript" src="../js/main.js"></script>
	</head>
<body>
<div class="headerWrapper" style="background-position: right 0px;">
<div class="headerWrapperFix">
<div class="logoWrapper">
<a id="headercontrol_ancu" class="logo" href="../index.php">
<img id="headercontrol_imgu" usemap="#Map" alt="BITS Pilani logo" src="../images/logo.jpg">
</a>
</div>
<?php if(isset($_SESSION['bitsid'])){
	$userinfo = mysql_fetch_array(mysql_query('select * from users where bitsid="'.$_SESSION['bitsid'].'"'));
?>
<div class="loginWrapper" style="margin-right:20.5%;">
<div class="welcome">
<h2><span>Welcome</span>,<br><?php echo $userinfo['name']; ?></h2>
</div>
<div class="loginmenu">
<img src="../uploads/profilepics/<?php echo $userinfo['avatar']; ?>" width="50">
<div class="loginNav">
<ul>
<li><a href="../account/dashboard.php">Dashboard</a></li>
<li><a href="">Account</a></li>
<li><a href="../index.php?bitsid=0" class="logout">Logout</a></li>
</ul>
</div>
</div>
</div><?php 
} else {
?>
<div align="center" class="login">
<a style="color:#211d70;" href="../login.php">
<img src="../images/login_icon.png" height="70px" width="80px"><br/>
<span style="font-size:1.5em; font-weight:bold;">Log In</span></a>
</div>
<?php } ?>
<ul class="mainNav">
<li class=" ">
<a id="1" href="JavaScript:void(0);">About Library</a>
<div class="subNavWrapper">
<div class="subNavCont">
<ul>
<li>
<ul>
<li>
<p class="navLedg"></p>
</li>
<li>
<a href="../rules_and_regulations.php">Rules and Regulations</a>
</li>
<li>
<a href="">Library Staff</a>
</li>
</ul>
</li>
</ul>
</div>
</div>
</li>
<li>
<a id="3" href="JavaScript:void(0);">Search</a>
<div class="subNavWrapper">
<div class="subNavCont">
<ul>
<li>
<ul>
<li>
<a target="_blank" href="http://172.21.1.37/">Online Book Catalogue</a>
</li>
<li>
<a href="bookfinder4u.php">Book Finder</a>
</li>
<li>
<a href="periodical_finder.php">Periodical Finder</a>
</li>
</ul>
</li>
</ul>
</div>
</div>
</li>
<li>
<a id="3" href="JavaScript:void(0);">Services</a>
<div class="subNavWrapper">
<div class="subNavCont">
<ul>
<li>
<ul>
<li>
<a href="../services/circulation.php">Circulation</a>
</li>
<li>
<a href="../services/photocopy_service.php">Photocopying</a>
</li>
<li>
<a href="../services/references.php">References</a>
</li>
<li>
<a href="../services/inter_library_loan.php">Inter-Library Loan</a>
</li>
<li>
<a href="../services/info_BITS_bulletin.php">InfoBITS Bulletin</a>
</li>
<li>
<a href="../services/daily_news.php">Daily News</a>
</li>
<li>
<a href="../services/lf.php">Lost & Found</a>
</li>
<li>
<a href="../services/av.php">Audio & Visuals</a>
</li>
</ul>
</li>
</ul>
</div>
</div>
</li>
<li>
<a id="8" href="JavaScript:void(0);">Periodicals & Databases</a>
<div class="subNavWrapper">
<div class="subNavCont">
<ul>
<li>
<ul>
<li>
<a href="../search/periodical_finder.php">Print-Journals</a>
</li>
<li>
<a href="">E-Journals</a>
</li>
<li>
<a href="../services/databases.php">Online Databases</a>
</li>
</ul>
</li>
</ul>
</div>
</div>
</li>
<li>
<a id="9" href="JavaScript:void(0);">Research Support</a>
<div class="subNavWrapper">
<div class="subNavCont">
<ul>
<li>
<ul>
<li>
<a href="">Plagiarism</a>
</li>
<li>
<a target="_blank"  href="https://www.mendeley.com/">Mendeley Research Tool</a>
</li>
<li>
<a target=""  href="">Endnote</a>
</li>
<li>
<a target="_blank"  href="http://shodhganga.inflibnet.ac.in/">Shodhganga</a>
</li>
<li>
<a target=""  href="">Theses & Reports</a>
</li>
</ul>
</li>
</ul>
</div>
</div>
</li>
<li>
<a id="905" href="JavaScript:void(0);">Feedback & Suggestions</a>
<div class="subNavWrapper">
<div class="subNavCont">
<ul>
<li>
<ul>
<li>
<a href="../feedback/survey.php">Survey</a>
</li>
<li>
<a href="../feedback/feedback_form.php">Suggestion | Complaint | Compliments</a>
</li>
</ul>
</li>
</ul>
</div>
</div>
</li>
</ul>
</div>
</div>
		<div class="infoWrapper">
			<div class="breadCrumbWrapper">
				<p> You are here:</p>
				<ul class="breadCrumb">
					<li class="home">
						<a href="../index.php">Home</a>
					</li>
					<li>Feedback</li>
				</ul>
			</div>
		</div>
		<script type="text/javascript">
			function Validate(){
				var valid = true;
				var message = '';
				var comment = document.getElementById("comment");
				
				if ( ( radioForm.radio[0].checked == false ) && ( radioForm.radio[1].checked == false ) && ( radioForm.radio[2].checked == false ) ) 
				{ 
				valid = false;
				message = message + '*Please Select One from Suggestions/Complaints/Compliments' + '\n';
				}
				if(comment.value.trim() == ''){
					valid = false;
					message = message + '*Please Enter Your comments' + '\n';
				}
				if (valid == false){
					alert(message);
					return false;
				}
				
			}
		</script>
		<div class="bannerCarouselWrapper1">
			<div class="searchResults1">
				<div class="fontstyle">
					<form action="">
						<?PHP
							$message="";
							if ((isset($_SESSION['hasVoted']))) {
							    if ($_SESSION['hasVoted'] == 1) {
							        $message="You've already submitted!";
							    }
								else {
									$bitsid = $_SESSION['bitsid'];
									if(isset($_POST['submit']) && isset($_POST['questions'])){
										$n = mysql_num_rows(mysql_query("select * from answers_t"));
										$p = $n+1;
										mysql_query("INSERT INTO answers_t (bitsid, ID) VALUES ('$bitsid','$p')");
										$questions = $_POST['questions'];
										$question = array();
										$pos = stripos($questions,';');
										$init = 0;
										$j = 0;
										while($pos!=FALSE){
											$question[$j] = substr($questions,$init,$pos-$init);
											$j++;
											$init = $pos + 1;
											$pos = stripos($questions,';',$init);
										}
										for($i=0;$i<count($question);$i++){
											$qid = substr($question[$i],0,1);
											if($qid=="1"){
												$qNum = substr($question[$i],1);
												if(isset($_POST[$qNum])){
													$value = $_POST[$qNum];
													$SQL = "UPDATE answers_t SET ".$qNum."='$value' where bitsid='".$bitsid."'";
													if(mysql_query($SQL)){
													}
													else if(mysql_query("ALTER TABLE answers_t ADD ".$qNum." VARCHAR(255) NOT NULL")){
														 
														mysql_query($SQL);												
													}
													else{
														echo "Fail1";
													}
												}
												else {
													$message= $message."<br>Some fields are empty in survey form!";
												}
											}
											if($qid=="2"){
												$pos1 = stripos($question[$i],'-');
												$qNum = substr($question[$i],1,$pos1-1);
												$options = substr($question[$i],$pos1+1);
												for($j=0;$j<$options;$j++){
													$q = $qNum."o".$j;
													if(isset($_POST[$q])){
														$value = $_POST[$q];
														$SQL = "UPDATE answers_t SET $q='$value' where bitsid='".$bitsid."'";
														if(mysql_query($SQL)){
														}
														else if(mysql_query("ALTER TABLE answers_t ADD $q VARCHAR(255) NOT NULL")){
															mysql_query($SQL);
														}
														else{
															echo "Fail2";
														}
													}
													else {
														$message= $message."<br>Some fields are empty in survey form!";
													}
												}
											}
											if($qid=="3"){
												$qNum = substr($question[$i],1);
												if(isset($_POST[$qNum])){
													$value = $_POST[$qNum];
													$SQL = "UPDATE answers_t SET ".$qNum."='$value' where bitsid='".$bitsid."'";
													if(mysql_query($SQL)){
													}
													else if(mysql_query("ALTER TABLE answers_t ADD ".$qNum." TEXT NOT NULL")){
														mysql_query($SQL);
													}
													else{
														echo "Fail3";
													}
												}
												else {
													$message= $message."<br>Some fields are empty in survey form!";
												}
											}
										}
										$hasVoted = 1;
										mysql_query('UPDATE users SET hasVoted="'.$hasVoted.'" where bitsid="'.$bitsid.'"');
										$message= $message."<br>Thanks for feedback!";
									}	
								}
							}
							?>
					</form>
					<div align="center"><span class="error" ><?php echo $message;?></span></div>
					<!-- End Content here-->
				</div>
			</div>
		</div>
		</div>
		</div>
		</div>
<div class="footerWrapper">
<div class="footerFix">
<h2>Quick Links
</h2>
<ul style="display: none;">
<li>
<a id="41" href="JavaScript:void(0);"></a>
<h3>
<a id="41" href="JavaScript:void(0);">Libraries</a>
</h3>
<ul>
<li>
<a target="_blank"  href="http://www.bits-goa.ac.in/Library/Index.aspx/">BITS Goa</a>
</li>
<li>
<a target="_blank" href="http://www.bits-pilani.ac.in/dubai/bitsLibrary">BITS Dubai</a>
</li>
<li>
<a target="_blank"  href="http://www.bits-pilani.ac.in/hyderabad/bitsLibrary">BITS Hyderabad</a>
</li>
<li>
<a target="_blank"  href="https://libraries.mit.edu/">MIT, USA</a>
</li>
<li>
<a target="_blank"  href="http://library.stanford.edu/">Stanford University</a>
</li>
<li>
<a target="_blank" href="http://library.harvard.edu/">Harvard University</a>
</li>
</ul>
</li>
<li>
<a id="42" href="JavaScript:void(0);"></a>
<h3>
<a id="42" href="JavaScript:void(0);">Important Services</a>
</h3>
<ul>
<li>
<a href="../services/circulation.php">Circulation</a>
</li>
<li>
<a href="../services/references.php">References</a>
</li>
<li>
<a href="../services/photocopy_service.php">Photocopying</a>
</li>
<li>
<a href="../services/info_BITS_bulletin.php">InfoBITS Bulletin</a>
</li>
<li>
<a href="../services/daily_news.php">Daily News</a>
</li>
<li>
<a href="../services/lf.php">Lost & Found</a>
</li>
</ul>
</li>
<li>
<a id="43" href="JavaScript:void(0);"></a>
<h3>
<a id="43" href="JavaScript:void(0);">Search & Subscription</a>
</h3>
<ul>
<li>
<a href="../search/bookfinder4u.php">Book Finder</a>
</li>
<li>
<a href="../search/periodical_finder.php">Periodical Finder</a>
</li>
<li>
<a target="_blank"  href="http://172.21.1.37/">Web OPAC</a>
</li>
<li>
<a href="../services/av.php">Audio Visuals</a>
</li>
<li>
<a href="../services/databases.php">Online Databases</a>
</li>
<li>
<a href="">E-Journals</a>
</li>
</ul>
</li>
</ul>
</li>
</ul>
</div>
</div>
<div class="cpInfoFixWrapper">
<div class="cpInfoFix">
<p class="info">
                An institution deemed to be a University estd. vide Sec.3 of the UGC Act,1956 under
                notification # F.12-23/63.U-2 of Jun 18,1964</p><br/>
                &copy; 2015 BITS-Library, BITS-Pilani, India.
               <a href="../Credits.php">[Credits]</a>
</div>
</div>
</body>
</html>