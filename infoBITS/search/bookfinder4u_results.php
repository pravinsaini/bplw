<?php
include("../config.php");
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type">
<title>BookFinder4u</title>
<link type="image/png" rel="icon" href="../images/fav_32.png">
<link type="text/css" rel="stylesheet" href="../css/reset.css">
<link type="text/css" rel="stylesheet" href="../css/main.css">
<link type="text/css" rel="stylesheet" href="../css/module.css">
<script type="text/javascript" src="../js/jquery-1.4.1.min.js"></script>
<script type="text/javascript" src="../js/metadata.js"></script>
<script type="text/javascript" src="../js/main.js"></script> 
<style type="text/css">
body{
	margin:0;
	padding:0;
	background:url(../images/bg.jpg) repeat;
	font-family:Arial Narrow, Arial, sans-serif;
}
</style>
</head>
<body>
<?php
$message="";
$records="";
$search="";
$Color="";
$Keywords = $_GET['Keywords'];
if($_GET['Keywords']=="")
{
	header('Location: bookfinder4u.php');
	exit();
}

$x = mysql_fetch_array(mysql_query("SELECT * FROM hitcounter where service_name='Book Finder Submit'"));
$count=$x['Total_Hits'];
$num=1;
$total=$num+$count;
$sql = "update hitcounter set Total_Hits='$total' where service_name='Book Finder Submit'";
$result = mysql_query($sql);
$query = "SELECT * FROM bookfinder where Keywords LIKE '%$Keywords%' ORDER BY Shelf_Side";
$result=mysql_query($query);
if ($result==false)
{
    die(mysql_error());
}
$num_rows=mysql_num_rows($result);
if($result && mysql_num_rows($result)>0)
{
// Display the results 
$search="\"$Keywords\"";
$search = strtoupper($search);
$Color = "Showing $num_rows Results for &nbsp;";
}
?>
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
<li><a href="bookfinder4u.php">Book Finder</a></li>
</ul>
</div>
</div>
<div class="bannerCarouselWrapper1">
<div class="service_box">
<div class="description">		
<div align="left">
<a href="bookfinder4u.php"><img src="../images/Go_Back.png" style="width: 100px; height:50px;"></a>
</div>
<div align="center">
<img src="../images/Book_Finder.jpg" alt="book finder logo" style="width: 312px; height:56px;">
</div>					
<div align="center" height="20px">&nbsp;				
				<table style="width: 100%"><tr><td style="width: 100%;" align="center"><span class="searchcolourone"><?php echo $Color;?></span><span class="searchcolourtwo"><?php echo $search;?></span></td>		
				</tr></table>
				</div>
<hr/>
<table align="center" cellpadding="0" cellspacing="0">
<?php
if($result && mysql_num_rows($result)>0)
{
?>
				<thead>
				<tr style="font-size:20px; font-weight:normal; color:#000000; background-color:#92D050; height:30px; line-height:30px; text-align:center;">					
				<th colspan="6" style="padding: 5px 10px 5px 10px;">Find Your Books in the Following Locations</th>
				</tr>
				<tr style="color:#000000; background-color:#FFC000; font-size:14px;">					
				  		<th style="font-size:16px; font-weight:bold; padding:4px;">Hall No.</th>
						<th style="font-size:16px; font-weight:bold; padding:4px;">Row No.</th>
						<th style="font-size:16px; font-weight:bold; padding:4px;">Shelf Side</th>
				  		<th style="font-size:16px; font-weight:bold; padding:4px;">Shelf No.</th>
						<th style="font-size:16px; font-weight:bold; padding:4px;">Class No.</th>
				</tr>
				</thead>
<?php
while($row = mysql_fetch_array($result))
				{
				?>
					<tr>					
					<td style="font-size:16px; font-weight:normal; color:#ffffff; background-color:#0070C0; padding:4px; border-bottom:1px solid #4a9ace; border-right:1px solid #4a9ace;" align="center"><?php echo $row['Hall_Number']; ?></td>                  
                    <td style="font-size:16px; font-weight:normal; color:#ffffff; background-color:#0070C0; padding:4px; border-bottom:1px solid #4a9ace; border-right:1px solid #4a9ace;" align="center"><?php echo $row['Row_Number']; ?></td>                           
                    <td style="font-size:16px; font-weight:normal; color:#ffffff; background-color:#0070C0; padding:4px; border-bottom:1px solid #4a9ace; border-right:1px solid #4a9ace;" align="center"><?php echo $row['Shelf_Side']; ?></td>					
					<td style="font-size:16px; font-weight:normal; color:#ffffff; background-color:#0070C0; padding:4px; border-bottom:1px solid #4a9ace; border-right:1px solid #4a9ace;" align="center"><?php echo $row['Shelf_Number']; ?></td>                           
					<td style="font-size:16px; font-weight:normal; color:#ffffff; background-color:#0070C0; padding:4px; border-bottom:1px solid #4a9ace; border-right:1px solid #4a9ace;" align="center"><?php echo $row['Call_Number']; ?></td>					
					</tr>
					<?php
				}			
				}
else
{
$message="Sorry, we can not find an entry to match your keywords<br/><br/>";
}
?>
</table>
<div align="center" class="error"><?php echo $message;?></div>				
<table cellpadding="0" cellspacing="0" align="right" style="width:100%">
<?php
$x = mysql_fetch_array(mysql_query("SELECT * FROM hitcounter where service_name='Book Finder Submit'"));
$counter=$x['Total_Hits'];
?>
<tr>
<td align="center">
<br/>
<span style="font-size:12px; font-weight:bold;">Hit Counter Since 02 January 2015</span><br/>
<span style="font-size:16px; font-weight:normal; color:#ffffff; background-color:#0070C0; padding:2px 8px 2px 8px; border-radius:5px;"><?php echo $counter; ?></span>
<br/>
<br/>
</td>  
</tr>
</table>
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