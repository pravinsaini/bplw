<?php
include("../config.php");
$message = "";
if(isset($_SESSION['bitsid'])){
	$userinfo = mysql_fetch_array(mysql_query('select * from users where bitsid="'.$_SESSION['bitsid'].'"'));
	if($userinfo['category']=="Admin"){
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type">
<title>Daily News - Add</title>
<link type="image/png" rel="icon" href="../images/fav_32.png">
<link type="text/css" rel="stylesheet" href="../css/reset.css">
<link type="text/css" rel="stylesheet" href="../css/main.css">
<link type="text/css" rel="stylesheet" href="../css/dashboard.css">
<link type="text/css" rel="stylesheet" href="../css/module.css">
<script type="text/javascript" src="../js/jquery-1.4.1.min.js"></script>
<script type="text/javascript" src="../js/metadata.js"></script>
<script type="text/javascript" src="../js/main.js"></script>
<style type="text/css">
.hidden_box
{
    width: 95%;
	margin: auto;
	overflow:hidden;
	float:center;
	height:auto;
	margin-bottom:1%;
}
.hidden_box .hidden_box_left_panel
{
    width: 100%;
	margin: auto;
	overflow:hidden;
	float:left;
	height:auto;
	margin-bottom:1%;
	border-radius:4px;
}
.hidden_box .hidden_box_right_panel
{
    width: 100%;
	overflow:hidden;
	float:right;
	height:auto;
	margin-bottom:1%;
	border:1px solid #4a9ace;
	text-align:center;
}
    .error
	{    
	float:center;
	color:#CC3300;
	font-weight:bold;
	font-size:14px;
	}
	/* The CSS */
select {
    padding:3px;
	width:170px;
    margin: 0;
    -webkit-border-radius:4px;
    -moz-border-radius:4px;
    border-radius:4px; 
	border:1px solid #b3c1ce;
    color:#888;
    outline:none;
    display: inline-block;
    -webkit-appearance:none;
    -moz-appearance:none;
    appearance:none;
    cursor:pointer;
}

/* Targetting Webkit browsers only. FF will show the dropdown arrow with so much padding. */
@media screen and (-webkit-min-device-pixel-ratio:0) {
    select {padding-right:30px}
}

label {position:relative}
label:after {
    content:'<>';
    font:11px "Consolas", monospace;
    color:#aaa;
    -webkit-transform:rotate(90deg);
    -moz-transform:rotate(90deg);
    -ms-transform:rotate(90deg);
    transform:rotate(90deg);
    right:8px; top:5px; 
    border-bottom:1px solid #ddd;
    position:absolute;
    pointer-events:none;
}
label:before {
    content:'';
    right:6px; top:6px;
    width:20px; 
    background:#f8f8f8;
    position:absolute;
    pointer-events:none;
    display:block;
}
fieldset.scheduler-border {
    border: 1px groove #ddd !important;
    padding: 0 0.1em 0.1em 0.9em !important;
    margin: 0 0 0 0 !important;
    -webkit-box-shadow:  0px 0px 0px 0px #000;
            box-shadow:  0px 0px 0px 0px #000;
}

legend.scheduler-border {
    width:inherit; /* Or auto */
   /* padding:0 5px;  To give a bit of padding on the left and right */
    border-bottom:none;
    margin-bottom:0;
    font-size: 1.0em !important;
    font-weight: bold !important;
    text-align: left !important;
    color:#211D70;
}

.text_box
{
padding:4px;
	width:400px;
    margin: 0;
    -webkit-border-radius:4px;
    -moz-border-radius:4px;
    border-radius:4px; 
	border:1px solid #b3c1ce;
    color:#888;
    outline:none;
    display: inline-block;
}
.page_text_box
{
padding:4px;
	width:100px;
    margin: 0;
    -webkit-border-radius:4px;
    -moz-border-radius:4px;
    border-radius:4px; 
	border:1px solid #b3c1ce;
    color:#888;
    outline:none;
    display: inline-block;
}
.daily_news_date
{
padding:2px;
	width:150px;
    margin: 0;
    -webkit-border-radius:4px;
    -moz-border-radius:4px;
    border-radius:4px; 
	border:1px solid #b3c1ce;
    color:#888;
    outline:none;
    display: inline-block;
}
.daily_news_upload
{
padding:2px;
	width:200px;
    margin: 0;
    -webkit-border-radius:4px;
    -moz-border-radius:4px;
    border-radius:4px; 
	border:1px solid #b3c1ce;
    color:#888;
    outline:none;
    display: inline-block;
}
	</style>
	<script type="text/javascript">
function Validate(){
	var valid = true;
	var message = '';
	var date = document.getElementById("date");
	var news_title = document.getElementById("news_title");
	var news_url = document.getElementById("news_url");
	var page = document.getElementById("page");
	var news_keywords = document.getElementById("news_keywords");
	if(date.value.trim() == ''){
		valid = false;
		message = message + '*Date is required' + '\n';
	}
	if(news_title.value.trim() == ''){
		valid = false;
		message = message + '*News Title is required' + '\n';
	}
	if(news_url.value == ''){
		valid = false;
		message = message + '*URL is required' + '\n';
	}
	if(page.value == ''){
		valid = false;
		message = message + '*page Number is required' + '\n';
	}
	if(news_keywords.value.trim() == ''){
		valid = false;
		message = message + '*keywords is required' + '\n';
	}
	
	if (valid == false){
		alert(message);
		return false;
	}
}
</script>
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
<li><a href="../administrator/admin.php">Dashboard</a></li>
<li><a href="../account/dashboard.php">View User Dashboard</a></li>
<li><a href="../account/account.php">Account</a></li>
<li><a class="logout" href="../index.php?bitsid=0">Logout</a></li>
</ul>
</div>
</div>
</div><?php 
} else {
?>
<div align="center" class="login">
<a style="color:#211d70;" href="login.php">
<img src="images/login_icon.png" height="70px" width="80px"><br/>
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
<a href="../library_staff.php">Library Staff</a>
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
<a href="../search/bookfinder4u.php">Book Finder</a>
</li>
<li>
<a href="../search/periodical_finder.php">Periodical Finder</a>
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
<a href="../search/e-journals.php">E-Journals</a>
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
<a href="../plagiarism.php">Plagiarism</a>
</li>
<li>
<a target="_blank"  href="https://www.mendeley.com/">Mendeley Research Tool</a>
</li>
<li>
<a target="_blank" href="http://endnote.com/">Endnote</a>
</li>
<li>
<a target="_blank"  href="http://shodhganga.inflibnet.ac.in/">Shodhganga</a>
</li>
<li>
<a href="theses_and_reports.php">Theses & Reports</a>
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
<p>You are here:</p>
<ul class="breadCrumb">
<?php
	if($userinfo['category']=="Admin")
	{
?>
<li class="home"><a href="../administrator/admin.php">Dashboard</a></li>
<?php
	}
	else if($userinfo['category']=="Student" || $userinfo['category']=="Research Scholar" || $userinfo['category']=="Faculty/Staff")
	{
?>
<li class="home"><a href="../account/dashboard.php">Dashboard</a></li>
<?php
	}
	else
	{
	?>
	<li class="home"><a href="../index.php">Home</a></li>
	<?php
	}
?>
<li>Daily News</li>
</ul>
</div>
</div>
<div style="background-color:#FFFFFF">
<div class="hidden_box">
<table width="100%">
<tr><td align="right" style="margin-right:20px; ">
<a href="admin.php"><img src="../images/Home.png" alt="Back to Home" style="width: 40px; height: 39px; border-radius:4px;" /></a>
</td></tr></table>
<table class="hidden_box">
<tr>
<td style="width: 17%;"><div class="hidden_box_left_panel">
<table align="left" style="width: 100%; background-color: #FFFFFF; color: #211D70; border: 1px solid #4a9ace;" cellpadding="0" cellspacing="0" >
<tr style="line-height: 27px">
			<td style="background-color: #06588f; color: #FFFFFF; font-weight: bold; font-size:13px;" align="center">Daily News Home</td></tr>
			<tr><td align="left" style="padding:5px; border-bottom:1px solid #4a9ace;"><img src="../images/list_style_type_icon.png" style="width:12px; height:12px; vertical-align:middle;"/>&nbsp;<a href="" style="background-color: #FFFFFF; color: #06588f; font-weight: bold; font-size:12px;">Add</a></td></tr>
			<tr><td align="left" style="padding:5px; border-bottom:1px solid #4a9ace;"><img src="../images/list_style_type_icon.png" style="width:12px; height:12px; vertical-align:middle;"/>&nbsp;<a href="" style="background-color: #FFFFFF; color: #06588f; font-weight: bold; font-size:12px;">Delete</a></td></tr>
			<tr><td align="left" style="padding:5px;"><img src="../images/list_style_type_icon.png" style="width:12px; height:12px; vertical-align:middle;"/>&nbsp;<a href="" style="background-color: #FFFFFF; color: #06588f; font-weight: bold; font-size:12px;">Update</a></td></tr>
			</table>
</div></td>
<td style="width:20px;">&nbsp;</td>
<td valign="top">
<table align="left" style="width: 100px; cellpadding="0" cellspacing="0" >
<tr style="line-height: 27px">
			<td style="background-color: #06588f; color: #FFFFFF; font-weight: bold; font-size:13px; border-top-left-radius:4px; border-top-right-radius:4px;" align="center">Add</td></tr></table>
			<br/>
<div class="hidden_box_right_panel">
<form action="add_daily_news.php" method="post" enctype="multipart/form-data" onSubmit="return Validate();">
						<?php				
$message="";
if(isset($_POST['submit']))
{
$date=$_POST["date"];
$newspaper_name=$_POST['newspaper_name'];
$news_type=$_POST['news_type'];
   		$title = trim($_POST['news_title']);
		$url = trim($_POST['news_url']);
		$keywords = trim($_POST['news_keywords']);
		$page = trim($_POST['page']);
					$filetmp = $_FILES["file_img"]["tmp_name"];
					$filename = $_FILES["file_img"]["name"];
					$filetype = $_FILES["file_img"]["type"];
					

	if($_FILES['file_img']['name'] == '' || $_FILES['file_img']['size'] == 0)
		{
				if($news_type=="General News")
					{
						$query = 'insert into newsfeed(news_type, title, url, date, added_by, newspaper_name, keywords, page, image_path) 
						values("nn", "'.$title.'", "'.$url.'", "'.$date.'", "'.$_SESSION['bitsid'].'", "'.$newspaper_name.'", "'.$keywords.'", "'.$page.'", "")'; 
						$result=mysql_query($query);
					}
				else
					{
						$query = 'insert into newsfeed(news_type, title, url, date, added_by, newspaper_name, keywords, page, image_path) 
						values("bn", "'.$title.'", "'.$url.'", "'.$date.'", "'.$_SESSION['bitsid'].'", "'.$newspaper_name.'", "'.$keywords.'", "'.$page.'" , "")'; 
						$result=mysql_query($query);
					}
				if ($result==false)
				{
					die(mysql_error());
				}
					$message ='News Details added Successfully!!!';
		}
		else
		{
					$filepath = "../uploads/dailynews/".$filename;
					move_uploaded_file($filetmp,$filepath);	
			if($news_type=="General News")
					{
						$query = 'insert into newsfeed(news_type, title, url, date, added_by, newspaper_name, keywords, page, image_path) 
						values("nn", "'.$title.'", "'.$url.'", "'.$date.'", "'.$_SESSION['bitsid'].'", "'.$newspaper_name.'", "'.$keywords.'", "'.$page.'", "'.$filepath.'")'; 
						$result=mysql_query($query);
					}
				else
					{
						$query = 'insert into newsfeed(news_type, title, url, date, added_by, newspaper_name, keywords, page, image_path) 
						values("bn", "'.$title.'", "'.$url.'", "'.$date.'", "'.$_SESSION['bitsid'].'", "'.$newspaper_name.'", "'.$keywords.'", "'.$page.'" , "'.$filepath.'")'; 
						$result=mysql_query($query);
					}
				if ($result==false)
				{
					die(mysql_error());
				}
					$message ='News Details added Successfully!!!';
		}
}
?>
<div align="center">&nbsp;<span class="error"><?php echo $message;?></span></div>
						<table align="center" style="width: 80%;" cellpadding="0" cellspacing="0" >							
								<tr>
								  <td align="right" style="color: #211D70;">Select News Type:&nbsp;&nbsp;&nbsp;</td>
								 <td>
								 <table>
								 <tr>							
								 <td align="left">
				<?php 
echo '<label><select name="news_type">';
    echo "<option>" . 'General News' ."</option>";
	echo "<option>" . 'BITS in News' ."</option>";
echo '</label></select>';
				?>
				</td>
				<td style="color: #211D70;">&nbsp;&nbsp;&nbsp;&nbsp;Date:&nbsp;&nbsp;&nbsp;&nbsp;</td><td><input type="date" name="date" id="date" class="daily_news_date"/></td>
				</tr>
				</table>
				</td>
				</tr>
					 <tr style="line-height: 20px"><td colspan="2">&nbsp;</td></tr>
								 <tr>
								 <td align="right" style="color: #211D70;">Title:&nbsp;&nbsp;&nbsp;</td>
								 <td><input type="text" name="news_title"  id="news_title" placeholder="&nbsp;" class="text_box"/></td>								 
								 </tr>
								 <tr style="line-height: 20px"><td colspan="2">&nbsp;</td></tr>
								 <tr>
								 <td align="right" style="color: #211D70;">URL:&nbsp;&nbsp;&nbsp;</td>
								 <td><input type="text" name="news_url"  id="news_url"placeholder="&nbsp;" class="text_box"/></td>													 
								 </tr>
								 <tr style="line-height: 20px"><td colspan="2">&nbsp;</td></tr>
								 <tr>
								  <td align="right" style="color: #211D70;">Select News Paper:&nbsp;&nbsp;&nbsp;</td>
								 <td>
								 <table>
								 <tr>						
								 <td align="left">			
				<?php 
echo '<label><select name="newspaper_name">';
    echo "<option>" . 'Business Line' ."</option>";
	echo "<option>" . 'Business Standard' ."</option>";
	echo "<option>" . 'Economic Times' ."</option>";
	echo "<option>" . 'Financial Express' ."</option>";
	echo "<option>" . 'Hindustan Times' ."</option>";
	echo "<option>" . 'Indian Express' ."</option>";
	echo "<option>" . 'The Hindu' ."</option>";
	echo "<option>" . 'Times of India' ."</option>";
	echo "<option>" . 'Dainik Bhaskar' ."</option>";
	echo "<option>" . 'Rajasthan Patrika' ."</option>";
	echo "<option>" . 'Dainik Udyog Aas Paas' ."</option>";
	echo "<option>" . 'Rastradoot' ."</option>";
	echo "<option>" . 'Dainik Navjyoti' ."</option>";
	echo "<option>" . 'Live Mint' ."</option>";
	 echo "<option>" . 'Others' ."</option>";
echo '</label></select>';
				?>
				</td>
				<td style="color: #211D70;">&nbsp;&nbsp;&nbsp;&nbsp;Page Number:</td><td><input type="text" name="page" id="page" placeholder="eg. 25" class="page_text_box"/></td>
				</tr>
				</table>
				</td>
				</tr>
				<tr style="line-height: 20px"><td colspan="2">&nbsp;</td></tr>
				<tr>
				<td align="right" style="color: #211D70;">Keywords:&nbsp;&nbsp;&nbsp;</td>
								 <td><input type="text" name="news_keywords"  id="news_keywords" placeholder="&nbsp;" class="text_box"/></td>								 
								 </tr>
								 <tr style="line-height: 20px"><td colspan="2">&nbsp;</td></tr>								
					    <tr>	
						<td align="right" style="color: #211D70;">Upload Image&nbsp;</td>
                        <td>
						<input type="file" name="file_img" class="daily_news_upload"/>
						</td>					
</tr>
<tr style="line-height: 20px"><td colspan="2">&nbsp;</td></tr>
								 <tr>
				<td>&nbsp;</td>
				<td align="left">
				
				<input type="submit" name="submit" value="Submit" class="Stylish_button" />
				&nbsp;&nbsp;&nbsp;&nbsp;<a href="add_daily_news.php" style="padding: 4px 15px 4px 15px; width:80px; background-color :#06588f; color: #FFFFFF; font-weight: bold; border-radius: 5px; font-size:14px;">Reset</a>
				
				</td>
			</tr>
			</table></form><br/>			
			<div align="left" style="width:98%; margin-left:1%; color:green; font-weight:bold; font-size:14px;">
			<span style="color:red; font-weight:bold; font-size:14px;">Note:</span>
			1. IF you do not have any data to fill in mandatory field then go to the particular field and press "Spacebar" to avoid mandatory.<br/>
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;2. a URL field should be empty for Image upload.</div><br/>													 
</div></td>
</tr>
</table>
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
<a href="../search/e-journals.php">E-Journals</a>
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
               <a href="../credits.php">[Credits]</a>
</div>
</div>
</body>
</html>
<?php
	}
	else{
		header("Location: ../account/dashboard.php");
	}
}
else{
	header("Location: ../index.php");
}
?>