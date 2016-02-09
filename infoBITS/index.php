<?php
include("config.php");
if(isset($_GET['bitsid']) && $_GET['bitsid']==0){
	unset($_SESSION['bitsid'],$_SESSION['name']);
	header("Location: index.php");
}	
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type">
<title>BITS Pilani Library - infoBITS</title>
<link type="image/png" rel="icon" href="images/fav_32.png"  >
<link type="text/css" rel="stylesheet" href="css/reset.css">
<link type="text/css" rel="stylesheet" href="css/main.css">
<link type="text/css" rel="stylesheet" href="css/module.css">
<link type="text/css" rel="stylesheet" href="css/dashboard.css">
<script type="text/javascript" src="js/jquery-1.4.1.min.js"></script>
<script type="text/javascript" src="js/metadata.js"></script>
<script type="text/javascript" src="js/main.js"></script>
<style type="text/css">
.button5{
width:150px;
height:30px;
border:none;
outline:none;
box-shadow:-5px 5px 5px 0 #8aa7fb;
color:#fff;
font-size:14px;
text-shadow:0 1px rgba(0,0,0,0.4);
background-color:#5882FA;
border-radius:3px;
font-weight:700;
}
.button5:hover{
background-color:#2E64FE;
cursor:pointer;
}
.button5:active{
box-shadow:none;
}
.btn{
width:150px;
height:30px;
margin-left:10px;
}
</style>
</head>
<body>
<div class="headerWrapper" style="background-position: right 0px;">
<div class="headerWrapperFix">
<div class="logoWrapper">
<a id="headercontrol_ancu" class="logo" href="index.php">
<img id="headercontrol_imgu" usemap="#Map" alt="BITS Pilani logo" src="images/logo.jpg">
</a>
</div>
<?php if(isset($_SESSION['bitsid'])){
	$userinfo = mysql_fetch_array(mysql_query('select * from users where bitsid="'.$_SESSION['bitsid'].'"'));
?>
<div class="loginWrapper" style="margin-right:20.5%;">
<div class="welcome">
<h2><span>Welcome</span>,<br><?php echo $userinfo['name']; ?></h2>
&nbsp;&nbsp;
</div>
<div class="loginmenu">
<img src="uploads/profilepics/<?php echo $userinfo['avatar']; ?>" width="50">
<div class="loginNav">
<ul>
<?php
	if($userinfo['category']=="Admin")
	{
?>
<li><a href="administrator/admin.php">Dashboard</a></li>
<?php
	}
	else
	{
?>
<li><a href="account/dashboard.php">Dashboard</a></li>
<?php
	}
?>
<li><a href="account/account.php">Account</a></li>
<li><a class="logout" href="index.php?bitsid=0">Logout</a></li>
</ul>
</div>
</div>
</div><?php 
} else {
?>
<div align="center" class="login">
<a style="color:#211d70;" href="login.php">
<img src="images/login_icon.png" height="90px" width="100px"><br/>
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
<a href="rules_and_regulations.php">Rules and Regulations</a>
</li>
<li>
<a href="library_committee_members.php">Library Committee Members</a>
</li>
<li>
<a href="library_staff.php">Library Staff</a>
</li>
<li>
<a href="library_floor.php">Library Floor</a>
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
<a target="_blank" href="http://172.21.1.37/" >Online Book Catalogue</a>
</li>
<li>
<a href="search/bookfinder4u.php">Book Finder</a>
</li>
<li>
<a href="search/periodical_finder.php">Periodical Finder</a>
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
<a href="services/circulation.php">Circulation</a>
</li>
<li>
<a href="services/photocopy_service.php">Photocopying</a>
</li>
<li>
<a href="services/references.php">References</a>
</li>
<li>
<a href="services/inter_library_loan.php">Inter-Library Loan</a>
</li>
<li>
<a href="services/info_BITS_bulletin.php">InfoBITS Bulletin</a>
</li>
<li>
<a href="services/daily_news.php">Daily News</a>
</li>
<li>
<a href="services/lf.php">Lost & Found</a>
</li>
<li>
<a href="services/av.php">Audio & Visuals</a>
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
<a href="search/periodical_finder.php">Print-Journals</a>
</li>
<li>
<a href="search/e-journals.php">E-Journals</a>
</li>
<li>
<a href="services/databases.php">Online Databases</a>
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
<a href="plagiarism.php">Plagiarism</a>
</li>
<li>
<a target="_blank" href="https://www.mendeley.com/">Mendeley Research Tool</a>
</li>
<li>
<a target="_blank" href="http://endnote.com/">Endnote</a>
</li>
<li>
<a target="_blank"  href="http://shodhganga.inflibnet.ac.in/">Shodhganga</a>
</li>
<li>
<a  href="theses_and_reports.php">Theses & Reports</a>
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
<a href="feedback/survey.php">Survey</a>
</li>
<li>
<a href="feedback/feedback_form.php">Suggestion | Complaint | Compliments</a>
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
<?php 
if(isset($_SESSION['bitsid']))
{
	if($userinfo['category']=="Admin")
	{
?>
<li class="home"><a href="administrator/admin.php">Dashboard</a></li>
<?php
	}
	else if($userinfo['category']=="Student" || $userinfo['category']=="Research Scholar" || $userinfo['category']=="Faculty/Staff")
	{
?>
<li class="home"><a href="account/dashboard.php">Dashboard</a></li>
<?php
	}
}	
	else
	{
	?>
	<li class="home"><a href="index.php">Home</a></li>
	<?php
	}
?>
</ul>
</div>
</div>
<div class="bannerCarouselWrapper">
<div class="image_slider_news_box">
<table>
<tr>
<td>
<div class="carousel1">
<div class="msk">
<ul>
<?php
$active = "active";
$sql = 'select * from banner ORDER BY id DESC';
$result = mysql_query($sql);
while($image = mysql_fetch_array($result))
{
	if($image['status']=="active"){
		$width = 2.52 * strlen($image['text']);
		$y = $image['y'];
		$x = $image['x'];
		if($y=="Top"){ $y = 30; }else if($y=="Center"){ $y = 150; }else{ $y = 291; }
?>
<li>
<img src="uploads/banner/<?php echo $image['image']; ?>" width="586px" height="313px"/>
<span class="bannerText" style="top:<?php echo $y; ?>; text-align:<?php echo $x; ?>; font-size:<?php echo $image['fontsize']; ?>; color:<?php echo $image['fontcolor']; ?>; font-weight:<?php echo $image['fontweight']; ?>;"><?php echo $image['text']; ?></span>
</li>
<?php
	}
}
?>
</ul>
</div>
</div>
</td>
<td>
<div class="carousel">
<div class="msk">
<ul class="carouselLedg">
<li style="background-color:#FFFFFF; height:21%; cursor:text">
<?php
$result = mysql_fetch_array(mysql_query('SELECT * FROM `book_of_the_month_main` ORDER BY id DESC LIMIT 1'));
?>
<table>
<tr><td valign="top"><?php echo '<img src="uploads/book_of_the_month/'.$result["book_image_path"].'" width="155" height="193" alt="book_of_the_month" style="border:1px solid black;" />'; ?>
</td>
<td align="left" valign="top"><br/><img src="images/book_of_the_month.png" style="width:150px; height:100px;">
<br/>
<br/>
<div align="center"><a href="services/book_of_the_month.php">
<div class="btn">
<input class="button5" type="submit" name="submit" value="Reserve Now">
</div>
</a></div>
</td>
</tr></table>
</li>
<?php
$sql = 'select * from noticeboard where status="0" ORDER BY id DESC';
$result = mysql_query($sql);
while($notice = mysql_fetch_array($result))
{ 
if($notice['link']=="")
	{
	?>
	<li style="background-color:#FFFFFF;">
<img src="uploads/notices/images/<?php echo $notice['image']; ?>" style="width:350px; height:230px;">
</li>
<?php
	}
	else
	{
	?>
	<li style="background-color:#FFFFFF;">
<a target="_blank" href="<?php echo $notice['link'];?>">
<img src="uploads/notices/images/<?php echo $notice['image']; ?>" style="width:350px; height:230px;">
</a>
</li>
	<?php
	} 
}	
?>
<li style="background-color:#FFFFFF;">
<a href="services/daily_news.php">
<img src="images/daily_news_3_11_2015.png" style="vertical-align:top; width:340px;">
<br/>
<?php
$query = 'SELECT * FROM `newsfeed` ORDER BY id DESC LIMIT 3';
$query_run = mysql_query($query);

while($query_row = mysql_fetch_assoc($query_run))
{
	$title = $query_row['title'];
	$newspaper_name = $query_row['newspaper_name'];	
	$page = $query_row['page'];
	echo '<table><tr><td><img src="images/list_style_type_icon.png" style="width:12px; height:12px; vertical-align:middle;"/></td><td><span style="color:#211d70; text-align:justify; font-family:Gotham, \'Helvetica Neue\', Helvetica, Arial, sans-serif; font-size:1em;">'.$title.',&nbsp;<span style="font-size:13px; color:066; font-style: italic;">'.$newspaper_name.','.$page.'p.</span></span></td></tr></table><br>';
}
?>
</a>
</li>
</ul>
</div>
</div>
</td>
</tr>
</table>

</div>
</div>
<div class="bannerInsideWrapper">
        <div class="bannerInsideFix">
            <h1>
                Welcome to BITS Pilani Library
            </h1>
    </div>
	</div>
	<br/>
<div class="contentWrapper">
<div class="contentFix">
<div class="threeCol">
<div class="col1">
<h2><span>About</span> the Library</h2>
<br/>
<br/>
<br/>
<br/>
<p style="font-size:1.4em; text-align:justify; line-height:19px; color: #211D70;">The BITS Pilani library is housed in a state-of-the-art new building, covering about 65000 sq.ft area and is located close to all academic blocks of the Institute. With attractive palatial interiors and a seating capacity of 750, the library includes, well-lit reading halls, stacks, display areas, e-library zones, audio-visual library and study carrels. There are a couple of air-conditioned reading halls.<br/><br/>  The library is fully automated with a collection of over 2,38,650, books, manuscripts, a good collection of rare books with bound volumes of journals  since 1920s. Library subscribes to over 267 printed National and International journals. About 11045 full-text e-journals and as many as 31 databases have been made available on the campus network and can be accessed in the hostel rooms and staff residences.</p>
<div class="read_more_box">
                                <a href="about_us.php" class="read_more">show more</a>
</div>
<br>
</div>
<div class="col2">
<h2><span>Learn</span> more</h2>
<br/>
<br/>
<br/>
<br/>
<table style="width:100%;">
<tr>
<td>
<div style="font-size:20px; font-weight:bold;">
<a target="_blank" href="http://172.21.1.37/">
<div>
Web<span> OPAC</span>
</div>
<div>
<img src="images/readmoreArrow.png">
</div>
</a>
</div>
</td>
<td>
<div style="font-size:20px; font-weight:bold;">
<a href="account/count.php?library_tour=library_tour.php" name="library_tour" id="library_tour">
<div>
Library <span> Tour</span>
</div>
<div>
<img src="images/readmoreArrow.png">
</div>
</a>
</div>
</td>
</tr>
<tr>
<td>
<div style="font-size:20px; font-weight:bold;">
<a target="_blank" href="pdf/Know Your Library.pdf">
<div>
Know Your<span> Library</span>
</div>
<div>
<img src="images/readmoreArrow.png">
</div>
</a>
</div>
</td>
<td>
<div style="font-size:20px; font-weight:bold;">
<a href="contact_us.php">
<div>
Contact<span> Us</span>
</div>
<div>
<img src="images/readmoreArrow.png">
</div>
</a>
</div>
</td>
</tr>
</table>
<br/>
<div class="follow"><div>Follow Us on:</div>
<div class="siteInfo">
<ul>
<li>
<a target="_blank" href="http://www.facebook.com/pages/BITS-Pilani/194107694017505">
<img border="0" alt="Face Book" src="images/fb.png">
</a>
</li>
<li>
<a target="_blank" href="https://twitter.com/BITSPilaniindia">
<img border="0" alt="tweeter" src="images/twitter.png"></a></li>
<li><a target="_blank" href="http://www.youtube.com/user/BITSpilaniTechMedia/videos"><img border="0" alt="you tube" src="images/youtube.png">
</a>
</li>
</ul>
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
<a href="services/circulation.php">Circulation</a>
</li>
<li>
<a href="services/references.php">References</a>
</li>
<li>
<a href="services/photocopy_service.php">Photocopying</a>
</li>
<li>
<a href="services/info_BITS_bulletin.php">InfoBITS Bulletin</a>
</li>
<li>
<a href="services/daily_news.php">Daily News</a>
</li>
<li>
<a href="services/lf.php">Lost & Found</a>
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
<a href="search/bookfinder4u.php">Book Finder</a>
</li>
<li>
<a href="search/periodical_finder.php">Periodical Finder</a>
</li>
<li>
<a target="_blank"  href="http://172.21.1.37/">Web OPAC</a>
</li>
<li>
<a href="services/av.php">Audio Visuals</a>
</li>
<li>
<a href="services/databases.php">Online Databases</a>
</li>
<li>
<a href="search/e-journals.php">E-Journals</a>
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
               <a href="credits.php">[Credits]</a>
			   <div align="center" style="margin-top:-20px;">
<strong><h2>Since 07 August 2015<h2></strong>			
<img src='http://www.hit-counts.com/counter.php?t=MTM2ODkyMg==' border='0' alt='Visitor Counter'>
</div> 
</div>
</div>
</body>
</html>