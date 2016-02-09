<?php
include("../config.php");
if(isset($_GET['bitsid']) && $_GET['bitsid']==0){
	unset($_SESSION['bitsid'],$_SESSION['name']);
	header("Location: index.php");
}
if(isset($_POST['bitsid'])&& $_POST['bitsid']!="")
{
	$info = mysql_fetch_array(mysql_query('select * from users where bitsid="'.$_POST['bitsid'].'"'));
	$_SESSION['bitsid']=$_POST['bitsid'];
	if($info['category']=="Admin")
		{
			header("location: administrator/admin.php");
		}
	else
		{
			header("location: account/dashboard.php");
		}	
}
?>
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta content="text/html; charset=utf-8" http-equiv="Content-Type">
		<title>Survey Form :: BITS Pilani Library - </title>
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
<?php
	if($userinfo['category']=="Admin")
	{
?>
<li><a href="../administrator/admin.php">Dashboard</a></li>
<?php
	}
	else
	{
?>
<li><a href="../account/dashboard.php">Dashboard</a></li>
<?php
	}
?>
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
<a href="book_finder.php">Book Finder</a>
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
			<div class="service_box">
				<div class="description">
					<!-- Start Content here-->  
							<div align="center">
                        	    <h2><span>Survey </span>Form</h2>
								<hr />
						<?php
							$message = "";
							$questions = "";						
							$answer = 'unchecked';								
							$qNum = 1;
							$status='active';
							$SQL = "SELECT * FROM tblquestions WHERE tblquestions.Status = '$status'";
							$n = mysql_num_rows(mysql_query($SQL));
							if($n>0){
									?>
									<form action="survey_process.php" METHOD ="POST" class="survey">
									<?php
								$SQL = "SELECT * FROM tblquestions WHERE tblquestions.ID = '$qNum' and tblquestions.Status = '$status'";
								$init = 0;
								for($i=0;$i<$n;$i++){
									$result = mysql_query($SQL);
									$db_field = mysql_fetch_assoc($result);
									$qid = $db_field['QID'];
									$options = $db_field['options'];
									$option = array();
									$pos = stripos($options,';');
									$init = 0;
									$j = 0;
									while($pos!=FALSE){
										$option[$j] = substr($options,$init,$pos-$init);
										$j++;
										$init = $pos + 1;
										$pos = stripos($options,';',$init);
									}
									$ques = $db_field['Question'];
								?>
                                <p class="question"><?php echo $ques; ?></p>
                                <br>
								<?php
									if($qid==1){
										$questions = $questions."1"."q".$qNum.";";
								?>
									<?php
										for($j=0;$j<count($option);$j++){
											if($option[$j]=="Other"){
									?>
                                    <div>
									<input type="radio" class="Pointer" name ='<?php echo "q".$qNum; ?>'  value='<?php echo $option[$j]; ?>'><?php echo $option[$j]; ?></div><input type="text" name="any_other" id="any_other" class="form-control"/>
									<?php
											}
											else if($j==0){
									?>
                                    <div style="margin-left:-6.5%;">
                                    <input type="radio" class="Pointer" name ='<?php echo "q".$qNum; ?>' value='<?php echo $option[$j]; ?>'>&nbsp;&nbsp;&nbsp;<?php echo $option[$j]; ?>
									</div>
                                    <?php
											}
											else{
									?>
                                    <div>
									<input type="radio" class="Pointer" name ='<?php echo "q".$qNum; ?>'  value='<?php echo $option[$j]; ?>'>&nbsp;&nbsp;&nbsp;<?php echo $option[$j]; ?>
									</div>
                                    <?php
											}
										}
									?>
									<hr width="95%"/>
								<?php
									}
									else if($qid==2){
										$questions = $questions."2"."q".$qNum."-".count($option).";";
								?>
								<table width="95%">
									<tr>
										<th>Description</th>
										<th>Excellent</th>
										<th>Good</th>
										<th>Fair</th>
										<th>Poor</th>
									</tr>
									<?php
										for($j=0;$j<count($option);$j++){
									?>
											<tr align="center">
												<td><?php echo $option[$j]; ?></td>
												<td><input type="radio" class="Pointer" name ='<?php echo "q".$qNum."o".$j; ?>'  value= 'Excellent'></td>
												<td><input type="radio" class="Pointer" name ='<?php echo "q".$qNum."o".$j; ?>'  value= 'Good'></td>
												<td><input type="radio" class="Pointer" name ='<?php echo "q".$qNum."o".$j; ?>'  value= 'Fair'></td>
												<td><input type="radio" class="Pointer" name ='<?php echo "q".$qNum."o".$j; ?>'  value= 'Poor'></td>
											</tr>
									<?php
										}
									?>
									</table>
                                    <hr width="95%"/>
								<?php
									}
									else{
										$questions = $questions."3"."q".$qNum.";";
								?>
									<textarea rows="4" cols="100" class="form-control resize" name ='<?php echo "q".$qNum; ?>' /></textarea>
									<hr width="95%"/>
								<?php
									}
									$qNum = $qNum + 1;
									$SQL = "SELECT * FROM tblquestions WHERE tblquestions.ID = '$qNum' and tblquestions.Status = '$status'";
								}
							?>		
                            	<input type="hidden" name="questions" value="<?php echo $questions; ?>">
								<input type="submit" name="submit" value="Submit"/>
                                </form>
						<?php
							}
							else{
								$message = "The feedback form hasn't been activated.";
							}
					?>
					<div><span class="error" ><?php echo $message;?></span></div>
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
<a href="../search/book_finder.php">Book Finder</a>
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