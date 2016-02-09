<?php
include("../config.php");
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type">
<title>On-line Databases</title>
<link type="image/png" rel="icon" href="../images/fav_32.png">
<link type="text/css" rel="stylesheet" href="../css/reset.css">
<link type="text/css" rel="stylesheet" href="../css/main.css">
<link type="text/css" rel="stylesheet" href="../css/module.css">
<link type="text/css" rel="stylesheet" href="../css/menu.css">
<link type="text/css" rel="stylesheet" href="../css/dashboard.css">
<script type="text/javascript" src="../js/jquery-1.4.1.min.js"></script>
<script type="text/javascript" src="../js/metadata.js"></script>
<script type="text/javascript" src="../js/main.js"></script>
<style type="text/css">
/*
==============================================
pulse
==============================================
*/

.pulse{
	animation-name: pulse;
	-webkit-animation-name: pulse;	

	animation-duration: 1.5s;	
	-webkit-animation-duration: 1.5s;

	animation-iteration-count: infinite;
	-webkit-animation-iteration-count: infinite;
}

@keyframes pulse {
	0% {
		transform: scale(0.9);
		opacity: 0.7;		
	}
	50% {
		transform: scale(1);
		opacity: 1;	
	}	
	100% {
		transform: scale(0.9);
		opacity: 0.7;	
	}			
}

@-webkit-keyframes pulse {
	0% {
		-webkit-transform: scale(0.95);
		opacity: 0.7;		
	}
	50% {
		-webkit-transform: scale(1);
		opacity: 1;	
	}	
	100% {
		-webkit-transform: scale(0.95);
		opacity: 0.7;	
	}			
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
<li>Databases</li>
</ul>
</div>
</div>
<div class="bannerCarouselWrapper1">
<br/>
<br/>
<br/>
<p align="left" style="font-size:14px; font-weight:bold">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<u>Complete List of Onlne Databases  Subcribed by BITS Pilani Library 2015</u>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<u><a target="_blank" href="../pdf/Databases/Complete_List_of_Onlne_Databases.pdf" >Learn more about databases(PDF)</a></u></p>
<br/>
<br/>
<table align="left">
                        <tr>
                            <td> 
                                <div id='cssmenu'>                                                           
<ul>
<li>
<a target="_blank" href='http://portal.acm.org/dl.cfm'class="style2" style="border: thin solid #000000">
<span><strong><font size="5" style="">ACM - (Association for Computing Machinery)</font></strong></span></a>
<ul>
                <li><a target="_blank" href="../pdf/Databases/ACM.pdf"><strong><font size="5" style="text-transform: capitalize;">Full Text Journal List</font></strong></a></li>
                </ul>
</li>

<li>
<a target="_blank" href='http://pubs.acs.org/about.html'class="style2" style="border: thin solid #000000">
<span><strong><font size="5" style="text-transform: capitalize;">ACS - (American Chemical Society)</font></strong></span></a>
<ul>
                <li><a target="_blank" href="../pdf/Databases/ACS.pdf"><strong><font size="5" style="text-transform: capitalize;">Full Text Journal List</font></strong></a></li>
                </ul>
</li>

<li>
<a target="_blank" href='http://www.aip.org/'class="style2" style="border: thin solid #000000">
<span><strong><font size="5" style="text-transform: capitalize;">AIP - (American Institute of Physics)</font></strong></span></a>
<ul>
                <li><a target="_blank" href="../pdf/Databases/AIP.pdf"><strong><font size="5" style="text-transform: capitalize;">Full Text Journal List</font></strong></a></li>
                </ul>
</li>

<li>
<a target="_blank" href='http://www.aps.org/'class="style2" style="border: thin solid #000000">
<span><strong><font size="5" style="text-transform: capitalize;">APS - (American Physical Society)</font></strong></span></a>
<ul>
                <li><a target="_blank" href="../pdf/Databases/APS.pdf"><strong><font size="5" style="text-transform: capitalize;">Full Text Journal List</font></strong></a></li>
                </ul>
</li>

<li>
<a class="style2" style="border: thin solid #000000" target="_blank" href="http://ascelibrary.org/journals/all_journal_titles"><strong>
<font size="5" style="text-transform: capitalize;">ASCE - (American Society of Civil Engineers)</font></strong></a>
<ul>
                <li><a target="_blank" href="../pdf/Databases/ASCE.pdf"><strong><font size="5" style="text-transform: capitalize;">Full Text Journal List</font></strong></a></li>
                </ul>
</li>

<li>
<a class="style2" style="border: thin solid #000000" target="_blank" href="http://asmedigitalcollection.asme.org/journals.aspx"><strong>
<font size="5" style="text-transform: capitalize;">ASME - (American Society of Mechanical Engineers)</font></strong></a>
<ul>
                <li><a target="_blank" href="../pdf/Databases/ASME.pdf"><strong><font size="5" style="text-transform: capitalize;">Full Text Journal List</font></strong></a></li>
                </ul>
</li>

<li>
<a class="style2" style="border: thin solid #000000" target="_blank" href="http://arjournals.annualreviews.org/">
<font style="text-transform: capitalize;" size="5"><span><strong>Annual Reviews</strong></span></font></a>
<ul>
                <li><a target="_blank" href="../pdf/Databases/Annual%20Review.pdf"><strong><font size="5" style="text-transform: capitalize;">Full Text Journal List</font></strong></a></li>
                </ul>
</li>

<li>
<a class="style2" style="border: thin solid #000000" target="_blank" href="http://www.capitaline.com/user/framepage.asp?id=1"><strong>
<font size="5" style="text-transform: capitalize;">Capitaline Plus</font></strong></a></li>
<li>
<a target="_blank" href='http://www.journals.cambridge.org/'class="style2" style="border: thin solid #000000">
<font style="text-transform: capitalize;" size="5"><span><strong>CUP - (Cambridge University     Press) </strong></span></font></a>
<ul>
                <li><a target="_blank" href="../pdf/Databases/CUP.pdf"><strong><font size="5" style="text-transform: capitalize;">Full Text Journal List</font></strong></a></li>
                </ul>
</li>
<li>
<a class="style2" style="border: thin solid #000000" target="_blank" href="http://search.ebscohost.com/"><strong>
<font size="5" style="text-transform: capitalize;">EBSCO</font></strong></a></li>
<li>
<a target="_blank" href='http://www.emeraldinsight.com/'class="style2" style="border: thin solid #000000">
<font style="text-transform: capitalize;" size="5"><span><strong>Emerald</strong></span></font></a>
<ul>
                <li><a target="_blank" href="../pdf/Databases/Emerald.pdf"><strong><font size="5" style="text-transform: capitalize;">Full Text Journal List</font></strong></a></li>
                </ul>
</li>

<li>
<a target="_blank" href='http://hedbib.iau-aiu.net/'class="style2" style="border: thin solid #000000">
<font style="text-transform: capitalize;" size="5"><span><strong>HEDBIB - (International Bibliographic Database on Higher Education)</strong></span></font></a></li>
<li>
<a target="_blank" href='http://hstalks.com/main/index_category.php?c=252&'class="style2" style="border: thin solid #000000">
<font style="text-transform: capitalize;" size="5"><span><strong>Henry Stewart Talks <span style="text-color:red; font-weight:bold"><SUP>New<SUP></span></strong></span></font></a></li>
<li>
<a target="_blank" href='http://www.ieee.org/ieeexplore/'class="style2" style="border: thin solid #000000">
<font style="text-transform: capitalize;" size="5"><span><strong> IEEE - (Institute of Electrical and Electronics Engineers) </strong></span></font></a>
<ul>
                <li><a target="_blank" href="../pdf/Databases/IEEE.pdf"><strong><font size="5" style="text-transform: capitalize;">Full Text Journal List</font></strong></a></li>
                </ul>
</li>

<li><a href='ime.php' class="style2" style="border: thin solid #000000"><span>
<strong><font size="5" style="text-transform: capitalize;">IME - (Institution Of Mechanical Engineers)</font></strong></span></a>
<ul>
                <li><a target="_blank" href="../pdf/Databases/IME.pdf"><strong><font size="5" style="text-transform: capitalize;">Full Text Journal List</font></strong></a></li>
                </ul>
</li>

<li><a class="style2" style="border: thin solid #000000" target="_blank" href="http://111.93.33.222/login3.asp">
<strong><font size="5" style="text-transform: capitalize;">ISID - (The Institute for Studies in Industrial Development)</font></strong></a></li>
<li>
<a target="_blank" href='http://www.iop.org/EJ/'class="style2" style="border: thin solid #000000">
<span><strong><font size="5" style="text-transform: capitalize;">IOP - (Institute of Physics)</font></strong></span></a>
<ul>
                <li><a target="_blank" href="../pdf/Databases/IOP.pdf"><strong><font size="5" style="text-transform: capitalize;">Full Text Journal List</font></strong></a></li>
                </ul>
</li>

<li>
<a target="_blank" href='http://www.isiknowledge.com/'class="style2" style="border: thin solid #000000">
<span><strong><font size="5">ISI </font>
<font size="5" style="text-transform: capitalize">web of science</font></strong></span></a></li>
<li>
<a target="_blank" href='http://jgateplus.com/search/'class="style2" style="border: thin solid #000000">
<span><strong><font size="5" style="text-transform: capitalize;">J-Gate</font></strong></span></a></li>

<li>
<a target="_blank" href='http://www.jstor.org/'class="style2" style="border: thin solid #000000">
<span><strong><font size="5" style="text-transform: capitalize;">JSTOR</font></strong></span></a>
<ul>
                <li><a target="_blank" href="../pdf/Databases/JSTOR.pdf"><strong><font size="5" style="text-transform: capitalize;">Full Text Journal List</font></strong></a></li>
                </ul>

</li>


<li><a class="style2" style="border: thin solid #000000" target="_blank" href="http://www.ams.org/mathscinet/index.html" >
<strong><font size="5" style="text-transform: capitalize;">MathSciNet</font></strong></a></li>

<li>
<a class="style2" style="border: thin solid #000000" target="_blank" href="http://www.oxfordjournals.org/en/">
<strong><font size="5" style="text-transform: capitalize;">OUP - (Oxford University Press)</font></strong></a>
<ul>
                <li><a target="_blank" href="../pdf/Databases/OUP.pdf"><strong><font size="5" style="text-transform: capitalize;">OUP</font></strong></a></li>
                <li><a target="_blank" href="../pdf/Databases/OUP%20Archive.pdf"><strong><font size="5" style="text-transform: capitalize;">OUP Archive</font></strong></a></li>
                </ul>
</li>

<li>
<a target="_blank" href='http://www.portlandpress.com/'class="style2" style="border: thin solid #000000">
<font style="text-transform: capitalize;" size="5"><span><strong>portland press</strong></span></font></a>
<ul>
                <li><a target="_blank" href="../pdf/Databases/Portland%20Press.pdf"><strong><font size="5" style="text-transform: capitalize;">Full Text Journal List</font></strong></a></li>
                </ul>
</li>
<li>
<a target="_blank" href='http://projecteuclid.org/'class="style2" style="border: thin solid #000000">
<font style="text-transform: capitalize;" size="5"><span><strong>Project Euclid</strong></span></font></a>
<ul>
                <li><a target="_blank" href="../pdf/Databases/Project%20Euclid.pdf"><strong><font size="5" style="text-transform: capitalize;">Full Text Journal List</font></strong></a></li>
                </ul>
</li>
<li>
<a target="_blank" href='http://muse.jhu.edu/'class="style2" style="border: thin solid #000000">
<font style="text-transform: capitalize;" size="5"><span><strong>project muse</strong></span></font></a>
<ul>
                <li><a target="_blank" href="../pdf/Databases/Project_Muse.pdf"><strong><font size="5" style="text-transform: capitalize;">Full Text Journal List</font></strong></a></li>
                </ul>
</li>

<li>
<a target="_blank" href='http://search.proquest.com/?accountid=81487'class="style2" style="border: thin solid #000000">
<font style="text-transform: capitalize;" size="5"><span><strong>proquest online</strong></span></font></a>
<ul>
                <li><a target="_blank" href="../pdf/Databases/ProQuest.pdf"><strong><font size="5" style="text-transform: capitalize;">Full Text Journal List</font></strong></a></li>
                </ul>
</li>

<li>
<a target="_blank" href='http://www.rsc.org/is/journals/current/ejs.htm'class="style2" style="border: thin solid #000000">
<span><strong><font size="5" style="text-transform: capitalize;">RSC - (Royal Society of Chemistry)</font></strong></span></a>
<ul>
                <li><a target="_blank" href="../pdf/Databases/RSC.pdf"><strong><font size="5" style="text-transform: capitalize;">Full Text Journal List</font></strong></a></li>
                </ul>
</li>
<li>
<a target="_blank" href='http://www.springerlink.com/journals/'class="style2" style="border: thin solid #000000">
<span><strong><font size="5" style="text-transform: capitalize;">Springer</font></strong></span></a>
<ul>
                <li><a target="_blank" href="../pdf/Databases/Springer%20Link.pdf"><strong><font size="5" style="text-transform: capitalize;">Full Text Journal List</font></strong></a></li>
                </ul>
</li>
<li>
<a target="_blank" href='http://www.sciencedirect.com/'class="style2" style="border: thin solid #000000">
<font size="5"><span><strong>Science Direct (Elsiever Publication)</strong></span></font><span style="color:red; font-weight:bold; font-size:12px;" class="pulse">&nbsp;not supporting internet explorer 8 w.e.f. 01.01.2016</span></a>
<ul>
                <li><a target="_blank" href="../pdf/Databases/Science%20Direct%20Engineering.pdf"><strong><font size="5" style="text-transform: capitalize;">Engineering Section</font></strong></a></li>
                <li><a target="_blank" href="../pdf/Databases/SD(10Subjects).pdf"><strong><font size="5" style="text-transform: capitalize;">10 Subjects</font></strong></a></li>
                </ul>
                
</li>
<li>
<a target="_blank" href='../services/SciFinder_registration.php'class="style2" style="border: thin solid #000000">
<font size="5"><span><strong>SciFinder</strong></span></font><span style="color:red; font-weight:bold; font-size:12px;" class="pulse">&nbsp;New</span></a>               
</li>
<li>
<a target="_blank" href='http://epubs.siam.org/'class="style2" style="border: thin solid #000000">
<font style="text-transform: capitalize;" size="5"><span><strong>SIAM - (Society for Industrial and Applied Mathematics)</strong></span></font></a>
<ul>
                <li><a target="_blank" href="../pdf/Databases/SIAM.pdf"><strong><font size="5" style="text-transform: capitalize;">Full Text Journal List</font></strong></a></li>
                </ul>
</li>

<li>
<a target="_blank" href='http://www.tandfonline.com/'class="style2" style="border: thin solid #000000">
<font style="text-transform: capitalize;" size="5"><span><strong>taylor &amp; francis</strong></span></font></a>
<ul>
                <li><a target="_blank" href="../pdf/Databases/Taylor%20and%20Francis.pdf"><strong><font size="5" style="text-transform: capitalize;">Full Text Journal List</font></strong></a></li>
                </ul>
</li>

<li>
<a target="_blank" href='http://www3.interscience.wiley.com/cgi-bin/home'class="style2" style="border: thin solid #000000">
<font style="text-transform: capitalize;" size="5"><span><strong>wiley interscience</strong></span></font></a>
<ul>
                <li><a target="_blank" href="../pdf/Databases/Wiley%20Blackwell%20Publishing.pdf"><strong><font size="5" style="text-transform: capitalize;">Full Text Journal List</font></strong></a></li>
                </ul>
</li>
</ul>
<br />
<br />
<br />
</div>
</td></tr></table>
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