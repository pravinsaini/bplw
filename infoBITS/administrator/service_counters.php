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
<title>Service Counters</title>
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
<li>Service Counters</li>
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
			<tr><td align="left" style="padding:5px; border-bottom:1px solid #4a9ace;"><img src="../images/list_style_type_icon.png" style="width:12px; height:12px; vertical-align:middle;"/>&nbsp;<a href="counters.php" style="background-color: #FFFFFF; color: #06588f; font-weight: bold; font-size:12px;">Registered User Counter</a></td></tr>
			<tr><td align="left" style="padding:5px; border-bottom:1px solid #4a9ace;"><img src="../images/list_style_type_icon.png" style="width:12px; height:12px; vertical-align:middle;"/>&nbsp;<a href="" style="background-color: #FFFFFF; color: #06588f; font-weight: bold; font-size:12px;">Services Counter</a></td></tr>
			</table>
</div></td>
<td style="width:20px;">&nbsp;</td>
<td valign="top">
<table align="left" style="width: 120px;" cellpadding="0" cellspacing="0" >
<tr style="line-height: 27px">
			<td style="background-color: #06588f; color: #FFFFFF; font-weight: bold; font-size:13px; border-top-left-radius:4px; border-top-right-radius:4px;" align="center">Services Counter</td></tr></table>
			<br/>
<div class="hidden_box_right_panel">
<?php				
$x = mysql_fetch_array(mysql_query("SELECT * FROM hitcounter where service_name='OPAC'"));
$opac=$x['Total_Hits'];

$x = mysql_fetch_array(mysql_query("SELECT * FROM hitcounter where service_name='Online Database'"));
$online_database=$x['Total_Hits'];

$x = mysql_fetch_array(mysql_query("SELECT * FROM hitcounter where service_name='Institutional repository'"));
$institutional_repository=$x['Total_Hits'];

$x = mysql_fetch_array(mysql_query("SELECT * FROM hitcounter where service_name='eBooks'"));
$eBooks=$x['Total_Hits'];

$x = mysql_fetch_array(mysql_query("SELECT * FROM hitcounter where service_name='Question Papers'"));
$question_papers=$x['Total_Hits'];

$x = mysql_fetch_array(mysql_query("SELECT * FROM hitcounter where service_name='Book Finder'"));
$book_finder=$x['Total_Hits'];

$x = mysql_fetch_array(mysql_query("SELECT * FROM hitcounter where service_name='Periodical Finder'"));
$periodical_finder =$x['Total_Hits'];

$x = mysql_fetch_array(mysql_query("SELECT * FROM hitcounter where service_name='Daily News'"));
$daily_news=$x['Total_Hits'];

$x = mysql_fetch_array(mysql_query("SELECT * FROM hitcounter where service_name='Info BITS Bulletin'"));
$bulletin =$x['Total_Hits'];

$x = mysql_fetch_array(mysql_query("SELECT * FROM hitcounter where service_name='Inter Library Loan'"));
$ill=$x['Total_Hits'];

$x = mysql_fetch_array(mysql_query("SELECT * FROM hitcounter where service_name='Lost and Found'"));
$lfms=$x['Total_Hits'];

$x = mysql_fetch_array(mysql_query("SELECT * FROM hitcounter where service_name='Audio Visuals'"));
$av=$x['Total_Hits'];

$x = mysql_fetch_array(mysql_query("SELECT * FROM hitcounter where service_name='Book Finder Submit'"));
$book_finder_submit=$x['Total_Hits'];

$x = mysql_query("SELECT * FROM ill_article_request");
$ill_article_request= mysql_num_rows($x);

$x = mysql_query("SELECT * FROM ill_book_request");
$ill_book_request= mysql_num_rows($x);

$x = mysql_fetch_array(mysql_query("SELECT * FROM hitcounter where service_name='Poetry Club'"));
$poetry_club=$x['Total_Hits'];

$x = mysql_fetch_array(mysql_query("SELECT * FROM hitcounter where service_name='Matrix Club'"));
$matrix_club=$x['Total_Hits'];

$x = mysql_fetch_array(mysql_query("SELECT * FROM hitcounter where service_name='books_mydesk'"));
$books_mydesk=$x['Total_Hits'];

$x = mysql_fetch_array(mysql_query("SELECT * FROM hitcounter where service_name='SciFinder'"));
$SciFinder=$x['Total_Hits'];
$x = mysql_fetch_array(mysql_query("SELECT * FROM hitcounter where service_name='Bentham Science'"));
$Bentham_Science=$x['Total_Hits'];
$x = mysql_fetch_array(mysql_query("SELECT * FROM hitcounter where service_name='Emerald'"));
$Emerald=$x['Total_Hits'];
$x = mysql_fetch_array(mysql_query("SELECT * FROM hitcounter where service_name='World Scientific'"));
$World_Scientific=$x['Total_Hits'];
$x = mysql_fetch_array(mysql_query("SELECT * FROM hitcounter where service_name='Synfacts'"));
$Synfacts=$x['Total_Hits'];
$x = mysql_fetch_array(mysql_query("SELECT * FROM hitcounter where service_name='Synthesis'"));
$Synthesis=$x['Total_Hits'];
$x = mysql_fetch_array(mysql_query("SELECT * FROM hitcounter where service_name='RSC'"));
$RSC=$x['Total_Hits'];
$x = mysql_fetch_array(mysql_query("SELECT * FROM hitcounter where service_name='Library Tour'"));
$library_tour=$x['Total_Hits'];
?>
<br/>
<br/>
<table class="counter_table" >
<tr>
<th colspan="2" style="width:20%;">Hit Counter Since 14 September 2015</th>
</tr>							
<tr>
<th style="width:10%;">Service Name</th>
<th style="width:10%;">Total Number</th>
</tr>
								<tr >
								 <td>Web OPAC&nbsp;</td>
								 <td style="background-color:F5F5F5; font-weight:bold;"><?php echo $opac ?></td>
								 </tr>
								 <tr>
								 <td>Online Database&nbsp;</td>
								 <td style="background-color:F5F5F5; font-weight:bold;"><?php echo $online_database ?></td>
								 </tr>
								 <tr>
								 <td>Institutional Repository&nbsp;</td>
								 <td style="background-color:F5F5F5; font-weight:bold;"><?php echo $institutional_repository ?></td>
								 </tr>
								 <tr>
								 <td>eBooks&nbsp;</td>
								<td style="background-color:F5F5F5; font-weight:bold;"><?php echo $eBooks ?></td>								 
								 </tr>
								 <tr>
								 <td>Question Papers&nbsp;</td>
								<td style="background-color:F5F5F5; font-weight:bold;"><?php echo $question_papers ?></td>								 
								 </tr>
								 <tr>
								 <td>Book Finder&nbsp;</td>
								<td style="background-color:F5F5F5; font-weight:bold;"><?php echo $book_finder ?></td>									
								 </tr>
								 <tr>
								 <td>Periodical Finder&nbsp;</td>
								<td style="background-color:F5F5F5; font-weight:bold;"><?php echo $periodical_finder ?></td>							
								 </tr>
								 <tr>
								 <td>Daily News&nbsp;</td>
								<td style="background-color:F5F5F5; font-weight:bold;"><?php echo $daily_news ?></td>							
								 </tr>
								 <tr>
								 <td>Info BITS Bulletin&nbsp;</td>
								<td style="background-color:F5F5F5; font-weight:bold;"><?php echo $bulletin ?></td>							
								 </tr>
								<tr>
								<td>Inter Library Loan&nbsp;</td>
								<td style="background-color:F5F5F5; font-weight:bold;"><?php echo $ill ?></td>							
								</tr>
								 <tr>
								 <td>Lost and Found&nbsp;</td>
								<td style="background-color:F5F5F5; font-weight:bold;"><?php echo $lfms ?></td>							
								 </tr>
								 <tr>
								 <td>Audio Visuals&nbsp;</td>
								<td style="background-color:F5F5F5; font-weight:bold;"><?php echo $av ?></td>							
								 </tr>
								 <tr>
<th colspan="2" style="width:20%;">Hit Counter Since 19th October 2015</th>
</tr>
								 <tr>
								 <td>Books@MyDesk&nbsp;</td>
								 <td style="background-color:F5F5F5; font-weight:bold;"><?php echo $books_mydesk ?></td>
								 </tr>
								 <tr>
<th colspan="2" style="width:20%;">Hit Counter Since 20th October 2015</th>
</tr>
								 <tr>
								 <td>SciFinder&nbsp;</td>
								 <td style="background-color:F5F5F5; font-weight:bold;"><?php echo $SciFinder ?></td>
								 </tr>
								 <tr>
								 <td>Bentham Science&nbsp;</td>
								 <td style="background-color:F5F5F5; font-weight:bold;"><?php echo $Bentham_Science ?></td>
								 </tr>
								 <tr>
								 <td>Emerald&nbsp;</td>
								 <td style="background-color:F5F5F5; font-weight:bold;"><?php echo $Emerald ?></td>
								 </tr>
								 <tr>
								 <td>World Scientific&nbsp;</td>
								 <td style="background-color:F5F5F5; font-weight:bold;"><?php echo $World_Scientific ?></td>
								 </tr>
								 <tr>
								 <td>Synfacts&nbsp;</td>
								 <td style="background-color:F5F5F5; font-weight:bold;"><?php echo $Synfacts ?></td>
								 </tr>
								 <tr>
								 <td>Synthesis&nbsp;</td>
								 <td style="background-color:F5F5F5; font-weight:bold;"><?php echo $Synthesis ?></td>
								 </tr>
								 <tr>
								 <td>Royal Society of Chemistry&nbsp;</td>
								 <td style="background-color:F5F5F5; font-weight:bold;"><?php echo $RSC ?></td>
								 </tr>
								 <tr>
<th colspan="2" style="width:20%;">Hit Counter Since 2nd October 2015</th>
</tr>
								 <tr>
								 <td>Poetry Club&nbsp;</td>
								 <td style="background-color:F5F5F5; font-weight:bold;"><?php echo $poetry_club ?></td>
								 </tr>
								 <tr>
								 <td>Matrix Club&nbsp;</td>
								 <td style="background-color:F5F5F5; font-weight:bold;"><?php echo $matrix_club ?></td>
								 </tr>
								 <tr>
								 <td>ILL Book Request&nbsp;</td>
								<td style="background-color:F5F5F5; font-weight:bold;"><?php echo $ill_book_request ?></td>									
								 </tr>
								 <tr>
								 <td>ILL Article Request&nbsp;</td>
								<td style="background-color:F5F5F5; font-weight:bold;"><?php echo $ill_article_request ?></td>									
								 </tr>
								 <tr>
<th colspan="2" style="width:20%;">Hit Counter Since 2nd January 2015</th>
</tr>
								 <tr>
								 <td>Book Finder Search&nbsp;</td>
								<td style="background-color:F5F5F5; font-weight:bold;"><?php echo $book_finder_submit ?></td>									
								 </tr>
								 <tr>
<th colspan="2" style="width:20%;">Hit Counter Since 2nd November 2015</th>
</tr>
								 <tr>
								 <td>WILP&nbsp;</td>
								<td style="background-color:F5F5F5; font-weight:bold;"><img src='http://www.hit-counts.com/counter.php?t=MTM3MDczNA==' border='0' alt='Web Counter'></td>									
								 </tr>
								 <tr>
								 <td>Library Tour</td>
								<td style="background-color:F5F5F5; font-weight:bold;"><?php echo $library_tour ?></td>									
								 </tr>
								 <tr>
<th colspan="2" style="width:20%;">Hit Counter Since 7th August 2015</th>
</tr>
								 <tr>
								 <td>Library Portal&nbsp;</td>
								<td style="background-color:F5F5F5; font-weight:bold;"><img src='http://www.hit-counts.com/counter.php?t=MTM2ODkyMg==' border='0' alt='Visitor Counter'></td>									
								 </tr>
								 <tr>
								 <td>Koha&nbsp;</td>
								<td style="background-color:F5F5F5; font-weight:bold;"><img src='http://www.hit-counts.com/counter.php?t=MTM2NjYyMw==' border='0' alt='Free Hit Counter'></td>									
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