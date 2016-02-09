<?php
include("config.php");
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type">
<title>About Us&nbsp;&nbsp;::&nbsp;&nbsp;BITS Pilani Library</title>
<link type="image/png" rel="icon" href="images/fav_32.png"  >
<link type="text/css" rel="stylesheet" href="css/reset.css">
<link type="text/css" rel="stylesheet" href="css/main.css">
<link type="text/css" rel="stylesheet" href="css/module.css">
<link type="text/css" rel="stylesheet" href="css/dashboard.css">
<script type="text/javascript" src="js/jquery-1.4.1.min.js"></script>
<script type="text/javascript" src="js/metadata.js"></script>
<script type="text/javascript" src="js/main.js"></script>
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
<a href="library_staff.php">Library Staff</a>
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
<a href="http://172.21.1.37/" target="_blank">Online Book Catalogue</a>
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
<li>About Us</li>
</ul>
</div>
</div>
<div class="bannerCarouselWrapper1">
<div class="service_box">
<div class="heading">
<h2><span>About</span> Us</h2>
</div>
<div class="description">
The BITS Pilani library is housed in a state-of-the-art new building, covering about 65000 sq.ft area and is located close to all academic blocks of the Institute. With attractive palatial interiors and a seating capacity of 750, the library includes, well-lit reading halls, stacks, display areas, e-library zones, audio-visual library and study carrels. There are a couple of air-conditioned reading halls.  The <b>library is fully automated</b> with a collection of over 2,38,650, books, manuscripts, a good collection of rare books with bound volumes of journals  since 1920s. <br/><br/>
Library subscribes to over 267 printed National and International journals. About 11045 full-text e-journals and as many as 31 databases have been made available on the campus network and can be accessed in the hostel rooms and staff residences. These Databases include the journals of ACM, IEEE, ASCE, ASME, IIMCHe, Springer, Science Direct, Wiley, IOP, Project Muse,  ACS, PROQUEST, Emerald, JSTOR, OUP, CUP, etc. The library catalogue is completely computerized. There are 30 public access terminals in the library. The wireless internet in the library provides Internet connectivity even for the readers’ laptops. BITS Library is also a partner in the networking of university library programme of INFLIBNET. Over 25000 e-book online of Books 24 x 7 are made accessible for all the faculty in Pilani, Goa and Hyderabad campuses besides all off-campus students.<br/><br/>
Educational CDs, videos, theses, dissertations, old question papers and Practice School reports are available in the library. The Text Book section provides all text and reference books for study in the library and overnight issue. Photocopying facility is also available in the library premises.
BITS Library has signed up MoU with UGC-INFLIBNET to upload all the Ph.D Theses to <b>Shodhganga</b> – A platform for research students to deposit their Ph.D. theses and make it available to the entire scholarly community in open access ETD.<br/><br/>
The library has an arrangement with Central Electronics Engineering Research Institute (CEERI) library under which a student/faculty can become a member of the latter and borrow books. The Inter Library Loan System can be used to share resources with other Libraries.  A member of American Center Library and DELNET, BITS library also makes arrangements for getting rare books and photocopies of articles from foreign libraries such as British Library, UK, Australian National Library and DU Delft (Netherlands). It also operates satellite libraries at some Practice School stations.
The library remains open throughout the year (except on four national holidays) from 9 am to 11:00 p.m. on all working days. The opening hours of the library are extended till 12 midnight during semester-end (Comprehensive) examinations.<br/><br/>
BITS Library keeps organizing book displays to promote reading among the faculty and students. To name some of these events, Teachers Day on 5th September, National Unity Day on 31st October, World Book and Copyright day on 23rd April. On 24th February 2015, the library organized "Why do I Love Books?" an essay competition for the students.  The 1st prize winning essay was published in The Hindu newspaper.
Some of the initiatives like "Winter Reading Challenge", "Summer Reading Challenge", Thematic books displays are quite popular among students. A list of New Arrivals is sent to all students and faculty members through root mail every month.<br/><br/>
Through an interactive Library Portal, many new services such as Table of Contents for the select print journals, Reference Service, Daily News, Monthly infoBITS Bulletins, Book Finder, Periodical Finder, Lost and Found Items, Suggestions/Complaints, Book Reviews, Feedback, are made available. Preparatory materials and reference books added to the collection to support the students to prepare for competitive exams.
One can avail the <b>Issue and Return service</b> for books and overnight issue of Textbooks and reference books during the working hours of the library.
A new library management system called <b>KOHA</b> which is an Open Source Software has been implemented in the Library this year, which will provide latest features and also has more user friendly features. <br/><br/>

For more information,  you can contact: <br/><br/>
<b>Giridhar Kunkur</b> <br/>
Librarian and Chief, Publications and Media Relations, BITS Pilani<br/>
email: giridhar.kunkur@pilani.bits-pilani.ac.in
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
</div>
</div>
</body>
</html>