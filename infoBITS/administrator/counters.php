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
<title>Counters</title>
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
	input#excel{
    background:url(../images/excel.png);
    background-repeat: no-repeat;
    width:16px;
    height:16px;
	border:none;
	cursor:pointer;
}
	</style>
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
<li>Counters - Registered User Counters</li>
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
			<td style="background-color: #06588f; color: #FFFFFF; font-weight: bold; font-size:13px;" align="center">Counters Home</td></tr>
			<tr><td align="left" style="padding:5px; border-bottom:1px solid #4a9ace;"><img src="../images/list_style_type_icon.png" style="width:12px; height:12px; vertical-align:middle;"/>&nbsp;<a href="" style="background-color: #FFFFFF; color: #06588f; font-weight: bold; font-size:12px;">Registered User Counter</a></td></tr>
			<tr><td align="left" style="padding:5px; border-bottom:1px solid #4a9ace;"><img src="../images/list_style_type_icon.png" style="width:12px; height:12px; vertical-align:middle;"/>&nbsp;<a href="service_counters.php" style="background-color: #FFFFFF; color: #06588f; font-weight: bold; font-size:12px;">Services Counter</a></td></tr>
			</table>
</div></td>
<td style="width:20px;">&nbsp;</td>
<td valign="top">
<table align="left" style="width: 180px;" cellpadding="0" cellspacing="0" >
<tr style="line-height: 27px">
			<td style="background-color: #06588f; color: #FFFFFF; font-weight: bold; font-size:13px; border-top-left-radius:4px; border-top-right-radius:4px;" align="center">Registered User Counter</td></tr></table>
			<br/>
<div class="hidden_box_right_panel">
<?php				
$FDS_sql = "select * from users where bitsid LIKE 'F%' and category='Student'";
$FDS_result = mysql_query($FDS_sql);
$FDS_num_rows = mysql_num_rows($FDS_result);

$HDS_sql = "select * from users where bitsid LIKE 'H%' and category='Student'";
$HDS_result = mysql_query($HDS_sql);
$HDS_num_rows = mysql_num_rows($HDS_result);

$sql = "select * from users where category='Student'";
$result = mysql_query($sql);
$num_rows = mysql_num_rows($result);

$Research_Scholar_sql = "select * from users where category ='Research Scholar'";
$Research_Scholar_result = mysql_query($Research_Scholar_sql);
$Research_Scholar_num_rows = mysql_num_rows($Research_Scholar_result);

$FS_sql = "select * from users where category ='Faculty/Staff'";
$FS_result = mysql_query($FS_sql);
$FS_num_rows = mysql_num_rows($FS_result);

$admin_sql = "select * from users where category ='Admin'";
$admin_result = mysql_query($admin_sql);
$admin_num_rows = mysql_num_rows($admin_result);

$Male_sql = "select * from users where gender ='Male'";
$Male_result = mysql_query($Male_sql);
$Male_num_rows = mysql_num_rows($Male_result);

$Female_sql = "select * from users where gender ='Female'";
$Female_result = mysql_query($Female_sql);
$Female_num_rows = mysql_num_rows($Female_result);

$Total =$num_rows + $Research_Scholar_num_rows + $FS_num_rows + $admin_num_rows;
?>
<br/>
<br/>
<table class="counter_table" >							
<tr>
<th style="width:10%;">Category</th>
<th style="width:10%;">Total Number</th>
<th style="width:10%;">Export To Excel</th>
</tr>
								<tr >
								 <td>First Degree Students&nbsp;</td>
								 <td style="background-color:F5F5F5; font-weight:bold;"><?php echo $FDS_num_rows ?></td>
								 <td><form action="excel.php" method="post">
								 <input type="submit" name="FDS_excel" id="excel" value="" />
								 </form></td>
								 </tr>
								 <tr>
								 <td>Higher Degree Students&nbsp;</td>
								 <td style="background-color:F5F5F5; font-weight:bold;"><?php echo $HDS_num_rows ?></td>
								 <td><form action="excel.php" method="post">
								 <input type="submit" name="HDS_excel" id="excel" value="" />
								 </form></td>
								 </tr>
								 <tr>
								 <td>Research Scholar&nbsp;</td>
								 <td style="background-color:F5F5F5; font-weight:bold;"><?php echo $Research_Scholar_num_rows ?></td>
								 <td><form action="excel.php" method="post">
								 <input type="submit" name="Research_Scholar_excel" id="excel" value="" />
								 </form></td>
								 </tr>
								 <tr>
								 <td>Faculty / Staff Members&nbsp;</td>
								<td style="background-color:F5F5F5; font-weight:bold;"><?php echo $FS_num_rows ?></td>								 
								<td><form action="excel.php" method="post">
								 <input type="submit" name="FS_excel" id="excel" value="" />
								 </form></td>
								 </tr>
								 <tr>
								 <td>Admin&nbsp;</td>
								<td style="background-color:F5F5F5; font-weight:bold;"><?php echo $admin_num_rows ?></td>								 
								<td><form action="excel.php" method="post">
								 <input type="submit" name="admin_excel" id="excel" value="" />
								 </form></td>
								 </tr>
								 <tr>
								 <td>Male&nbsp;</td>
								<td><?php echo $Male_num_rows ?></td>	
								<td><form action="excel.php" method="post">
								 <input type="submit" name="male_excel" id="excel" value="" />
								 </form></td>								
								 </tr>
								 <tr>
								 <td>Female&nbsp;</td>
								<td><?php echo $Female_num_rows ?></td>
								<td><form action="excel.php" method="post">
								 <input type="submit" name="female_excel" id="excel" value="" />
								 </form></td>								
								 </tr>
								 <tr style="background-color:F5F5F5; font-weight:bold;">
								 <td>Total&nbsp;</td>
								<td><?php echo $Total ?></td>
								<td><form action="excel.php" method="post">
								 <input type="submit" name="total_excel" id="excel" value="" />
								 </form></td>								
								 </tr>
</table><br/>			
<br/>													 
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