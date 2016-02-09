<?php
include("../config.php");
if(isset($_SESSION['bitsid']))
{
	$info = mysql_fetch_array(mysql_query('select * from users where bitsid="'.$_SESSION['bitsid'].'"'));
	if($info['confirm']!=1){
        header("location: ../index.php");
    }
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type">
<title>Info BITS Bulletin</title>
<link type="image/png" rel="icon" href="../images/fav_32.png">
<link type="text/css" rel="stylesheet" href="../css/reset.css">
<link type="text/css" rel="stylesheet" href="../css/main.css">
<link type="text/css" rel="stylesheet" href="../css/module.css">
<link type="text/css" rel="stylesheet" href="../css/dashboard.css">
<script type="text/javascript" src="../js/jquery-1.4.1.min.js"></script>
<script type="text/javascript" src="../js/metadata.js"></script>
<script type="text/javascript" src="../js/main.js"></script>
<style type="text/css">
.book_type
{
background-color :#4a9ace;
color: #FFFFFF;
font-weight: bold;
width:70px;
border-radius: 3px; 
}
.Journal_type
{
background-color :#4a9ace;
color: #FFFFFF;
font-weight: bold;
width:90px;
border-radius: 3px; 
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
<li><a href="../account/account.php">Account</a></li>
<li><a class="logout" href="../index.php?bitsid=0">Logout</a></li>
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
if(isset($_SESSION['bitsid']))
{
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
}	
	else
	{
	?>
	<li class="home"><a href="../index.php">Home</a></li>
	<?php
	}
?>
<li>Info BITS Bulletin</li>
</ul>
</div>
</div>

<div id="hmenu"> 
<ul> 
  <li><a href="#" class="selected">CHEMICAL</a></li> 
  <li><a href="#">CIVIL</a></li> 
  <li><a href="#">EEE</a></li> 
  <li><a href="#">CS</a></li> 
  <li><a href="#">MECH</a></li> 
  <li><a href="#">PHARMA</a></li> 
  <li><a href="#">BIO</a></li> 
  <li><a href="#">CHEM</a></li>
  <li><a href="#">ECO</a></li>
  <li><a href="#">MATHS</a></li>
  <li><a href="#">PHY</a></li>
  <li><a href="#">HUM</a></li>
  <li><a href="#">MAN</a></li> 
</ul>   
</div> 
<div class="bannerCarouselWrapper1">
<div class="service_box">
<div class="description">
<?php
date_default_timezone_set("Etc/UTC");
$date1= date('m/d/Y');
$timestamp1 = strtotime('+1 month');
//$formattedDate1 = date('F', $timestamp1);
$formattedDate1 = 'January';

$date3= date('m/d/Y');
$timestamp3 = strtotime('+1 month');
//$formattedDate3 = date('Y', $timestamp3);
$formattedDate3 = 2016;

		$disp = "CHEMICAL";
		$result = mysql_fetch_array(mysql_query('select * from bulletin where code="'.$disp.'" and Month="'.$formattedDate1.'" and Year="'.$formattedDate3.'"'));
		?>
<div style="padding-bottom:2%; height:auto;">
<table><tr>
<td valign="top" style="width:14%; float:left;"><img src="../images/info.png"></td>
<td valign="top">
<table style="width:100%;">
<tr>
<td valign="top" align="left"><span  style="font-family:Constantia, 'Lucida Bright', 'DejaVu Serif', Georgia, serif; font-size:14px; color:#211D70; text-align: justify;"><b><?php echo 'Vol.&nbsp;'.$result["volume_number"].','?>&nbsp;<?php echo 'Issue No.&nbsp;'.$result["issue_number"].''?><b></span></td>
<td valign="top" align="Center"><span  style="font-family:Constantia, 'Lucida Bright', 'DejaVu Serif', Georgia, serif; font-size:25px; color:#211D70; text-align: justify;"><b>Info BITS Bulletin<b></span></td>
<td valign="top" align="Right"><span  style="font-family:Constantia, 'Lucida Bright', 'DejaVu Serif', Georgia, serif; font-size:14px; color:#211D70; text-align: justify;"><b><?php echo ''.$result["Month"].',&nbsp;'.$result["Year"].''?><b></span></td>
</tr>
</table>
<hr/>
<span style="font-family:Constantia, 'Lucida Bright', 'DejaVu Serif', Georgia, serif; font-size:19px; color:#211D70; text-align: justify; font-weight:normal">The BITS library brings out 13 infoBITS Bulletins every month covering all the subjects in which the courses are conducted at BITS Pilani with an objective of providing up-to- date information on new arrivals in the library, latest articles that are published in the national and international journals by providing their table of contents, News and Developments that are published in leading newspapers and also latest audio visual material added to our collection on a monthly basis.</span></h2>
<div align="center"><span  style="font-family:Constantia, 'Lucida Bright', 'DejaVu Serif', Georgia, serif; font-size:19.5px; color:#211D70; text-align: justify;"><b>InfoBITS Bulletins keep you Ahead!<b></span></div></td>
<td valign="top" style="width:15%; float:right;"><img src="../images/archive.png">
<p style="position:relative; top:5px; font-size:19px;">
<div align="left"><span  style="font-family:Constantia, \'Lucida Bright\', \'DejaVu Serif\', Georgia, serif; font-size:19px; color:red; text-align: justify; position:relative; top:-130px; left:15%;"><b>Chemical Engineering<b></span></div>
<?php
	if(isset($_GET['disp'])){
		$disp = $_GET['disp'];
		$result = mysql_fetch_array(mysql_query('select * from bulletin where code="'.$disp.'"'));
		echo '<b>'.$result['name'].'</b>';
		}
		?>
		</p>
</td>
</tr></table>
</div>
<div align="center" style="font-family:Constantia, 'Lucida Bright', 'DejaVu Serif', Georgia, serif; font-size:24px; color:#06F; font-weight:bold">New Books<br/><br/></div>
<?php
		echo '
<div align="center" style="position:relative; z-index: 9; width:100%;">
<a href='.$result['url1'].' target=_blank>
<img src="../uploads/bulletin/'.$disp.'/'.$result["pic1"].'" width="155" height="193" alt="Book1" /></a>
<a href='.$result['url2'].' target=_blank>
<img src="../uploads/bulletin/'.$disp.'/'.$result["pic2"].'" width="155" height="193" alt="Book2" style="margin-left:50px;"/></a>
<a href='.$result['url3'].' target=_blank>
<img src="../uploads/bulletin/'.$disp.'/'.$result["pic3"].'" width="155" height="193" alt="Book3" style="margin-left:50px;"/></a>
<a href='.$result['url4'].' target=_blank>
<img src="../uploads/bulletin/'.$disp.'/'.$result["pic4"].'" width="155" height="193" alt="Book4" style="margin-left:50px;"/></a>
</div>
<div align="center">		
<img src="../images/banner.jpg" alt="shelf" style="position:relative; margin-top:-212px; margin-bottom:10px; width:920px; height:220px;">
</div>	
<div align="center">	
<div id="t1" style="position:relative; width:18%; height:auto; vertical-align:top;">
<div align="center"><p class="book_type">'.$result['book_type_one'].'</p></div>
<a href='.$result['url1'].' target=_blank>
<p style="font-size:13px; color:#333;"><b style="color:#211D70">'.$result['title1'].'</b></p></a>
<p style="font-size:13px; color:#333;">By : <b style="color:#211D70">'.$result['auth1'].'</b></p><br>
</div>

<div id="t2" style="position:relative; height:auto; width:18%; vertical-align:top;">
<div align="center"><p class="book_type">'.$result['book_type_two'].'</p></div>
<a href='.$result['url2'].' target=_blank>
<p style="font-size:13px; color:#333;"><b style="color:#211D70">'.$result['title2'].'</b></p></a>
<p style="font-size:13px; color:#333;">By : <b style="color:#211D70">'.$result['auth2'].'</b></p><br>
</div>
	
<div id="t3" style="position:relative; height:auto; width:18%; vertical-align:top;">
<div align="center"><p class="book_type">'.$result['book_type_three'].'</p></div>
<a href='.$result['url3'].' target=_blank>
<p style="font-size:13px; color:#333;"><b style="color:#211D70">'.$result['title3'].'</b></p></a>
<p style="font-size:13px; color:#333;">By : <b style="color:#211D70">'.$result['auth3'].'</b></p><br>
</div>

<div id="t4" style="position:relative; height:auto; width:18%; vertical-align:top;">
<div align="center"><p class="book_type">'.$result['book_type_four'].'</p></div>
<a href='.$result['url4'].' target=_blank>
<p style="font-size:13px; color:#333;"><b style="color:#211D70">'.$result['title4'].'</b></p></a>
<p style="font-size:13px; color:#333;">By : <b style="color:#211D70">'.$result['auth4'].'</b></p><br>
</div>	
	</div>
	
<div align="center" >
<h1 style="font-family:Constantia, \'Lucida Bright\', \'DejaVu Serif\', Georgia, serif; font-size:24px; color:#06F; font-weight:bold"><b>Journals (Table of Contents)</b></h1>	
<table align="center" style="width:95%;">
<tr>
<td width="120px" align="center">
<div id="j1" style="position:relative; margin-top:20px; height:auto; width:175px; border:1px solid black; vertical-align:top;">
<a href='.$result['jurl1'].' target=_blank style="font-size:16px; vertical-align:top;"><br/>
<img src="../uploads/bulletin/'.$disp.'/'.$result["tc1"].'" height="160px" width="120px" style="border:1px solid black;"></a>
<br/><br/>
</div><br/>
<div align="center"><p class="Journal_type">'.$result['Journal_type_one'].'</p></div>
<a href='.$result['jurl1'].' target=_blank style="font-size:16px; vertical-align:top;"><b>'.$result["j1"].'</b></a></td>
<td>&nbsp;</td>
<td width="120px" align="center">
<div id="j2" style="position:relative; margin-top:20px; height:auto; width:175px; border:1px solid black; vertical-align:top;">
<a href='.$result['jurl2'].' target=_blank style="font-size:16px; vertical-align:top;"><br/>
<img src="../uploads/bulletin/'.$disp.'/'.$result["tc2"].'" height="160px" width="120px" style="border:1px solid black;"></a>
<br/><br/>
</div><br/>
<div align="center"><p class="Journal_type">'.$result['Journal_type_two'].'</p></div>
<a href='.$result['jurl2'].' target=_blank style="font-size:16px; vertical-align:top;"><b>'.$result["j2"].'</b></a></td>
<td>&nbsp;</td>
<td width="120px" align="center">
<div id="j3" style="position:relative; margin-top:20px; height:auto; width:175px; border:1px solid black; vertical-align:top;">
<a href='.$result['jurl3'].' target=_blank style="font-size:16px; vertical-align:top;"><br>
<img src="../uploads/bulletin/'.$disp.'/'.$result["tc3"].'" height="160px" width="120px" style="border:1px solid black;"></a>
<br/><br/>
</div><br/>
<div align="center"><p class="Journal_type">'.$result['Journal_type_three'].'</p></div>
<a href='.$result['jurl3'].' target=_blank style="font-size:16px; vertical-align:top;"><b>'.$result["j3"].'</b></a></td>
<td>&nbsp;</td>
<td width="120px" align="center">
<div id="j4" style="position:relative; margin-top:20px; height:auto; width:175px;  border:1px solid black; vertical-align:top;">
<a href='.$result['jurl4'].' target=_blank style="font-size:16px; vertical-align:top;"><br>
<img src="../uploads/bulletin/'.$disp.'/'.$result["tc4"].'" height="160px" width="120px" style="border:1px solid black;"></a>
<br/><br/>
</div><br/>
<div align="center"><p class="Journal_type">'.$result['Journal_type_four'].'</p></div>
<a href='.$result['jurl4'].' target=_blank style="font-size:16px; vertical-align:top;"><b>'.$result["j4"].'</b></a></td>
</tr>
</table>
</div>
<br /><br>';
?>
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
else
{
 header("location: ../index.php");
}
?>