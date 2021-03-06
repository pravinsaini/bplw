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
<title>Poetry Club Archive</title>
<link type="image/png" rel="icon" href="../images/fav_32.png">
<link type="text/css" rel="stylesheet" href="../css/reset.css">
<link type="text/css" rel="stylesheet" href="../css/main.css">
<link type="text/css" rel="stylesheet" href="../css/module.css">
<link type="text/css" rel="stylesheet" href="../css/dashboard.css">
<script type="text/javascript" src="../js/jquery-1.4.1.min.js"></script>
<script type="text/javascript" src="../js/metadata.js"></script>
<script type="text/javascript" src="../js/main.js"></script>
<script src="../js/jquery.colorbox.js" type="text/javascript"></script>
<link href="../css/colorbox.css" rel="stylesheet" type="text/css" />
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
<li>Poetry Club Archive</li>
</ul>
</div>
</div>
<div class="bannerCarouselWrapper1">
<div class="service_box">
<div style="width:100%; background-color:#211d70; font-size:20px; font-weight:bold; color:#FFFFFF; height:30px; line-height:30px; text-align:center;">Poetry Club Archive</div>
<div class="contentWrapper">
        <div class="contentFix">
            <div class="twoCol">
                <div class="col1">
                    <div class="gallery">
					<br/>
					<br/>
                        <table cellpadding="0" cellspacing="0" border="0" align="center">
						<tr>
                                <td>                                  
                                    <table cellspacing="0" cellpadding="0" align="center">
									<tr>
									<td>
                                    <a href="../uploads/creativeclub/poetry_club/Nirnay.jpg" class="galleryColBox" title="Poetry Club " rel="imgGallery9">
                                    <img height="100" alt='Poetry Club' style="border:1px solid #ABABAB" width="190" src='../uploads/creativeclub/poetry_club/Nirnay.jpg'/>                             
                                    </a>
                                    <div class="desc" style="width:190" align="center"><p class="title">Nirnay<br/><hr/></p></div>                                   
                                    </td>
									</tr>
									</table>									
                                </td>
								<td>                                  
                                    <table cellspacing="0" cellpadding="0" align="center">
									<tr>
									<td>
                                    <a href="../uploads/creativeclub/poetry_club/a night on the roof.jpg" class="galleryColBox" title="Poetry Club " rel="imgGallery10">
                                    <img height="100" alt='Poetry Club' style="border:1px solid #ABABAB" width="190" src='../uploads/creativeclub/poetry_club/a night on the roof.jpg'/>                             
                                    </a>
                                    <div class="desc" style="width:190" align="center"><p class="title">A Night on the Roof<br/><hr/></p></div>                          
                                    </td>
									</tr>
									</table>						
                                </td>
								<td>                                  
                                    <table cellspacing="0" cellpadding="0" align="center">
									<tr>
									<td>
                                    <a href="../uploads/creativeclub/poetry_club/Aaina.jpg" class="galleryColBox" title="Poetry Club " rel="imgGallery11">
                                    <img height="100" alt='Poetry Club' style="border:1px solid #ABABAB" width="190" src='../uploads/creativeclub/poetry_club/Aaina.jpg'/>                             
                                    </a>
                                    <div class="desc" style="width:190" align="center"><p class="title">Aaina<br/><hr/></p></div>                          
                                    </td>
									</tr>
									</table>						
                                </td>
								<td>                                  
                                    <table cellspacing="0" cellpadding="0" align="center">
									<tr>
									<td>
                                    <a href="../uploads/creativeclub/poetry_club/disappearing_horizons.jpg" class="galleryColBox" title="Poetry Club " rel="imgGallery12">
                                    <img height="100" alt='Poetry Club' style="border:1px solid #ABABAB" width="190" src='../uploads/creativeclub/poetry_club/disappearing_horizons.jpg'/>                             
                                    </a>
                                    <div class="desc" style="width:190" align="center"><p class="title">Disappearing Horizons<br/><hr/></p></div>                          
                                    </td>
									</tr>
									</table>						
                                </td>								
                            </tr>
							<tr>
                                <td>                                  
                                    <table cellspacing="0" cellpadding="0" align="center">
									<tr>
									<td>
                                    <a href="../uploads/creativeclub/poetry_club/Gardening.png" class="galleryColBox" title="Poetry Club " rel="imgGallery13">
                                    <img height="100" alt='Poetry Club' style="border:1px solid #ABABAB" width="190" src='../uploads/creativeclub/poetry_club/Gardening.png'/>                             
                                    </a>
                                    <div class="desc" style="width:190" align="center"><p class="title">Gardening<br/><hr/></p></div>                                   
                                    </td>
									</tr>
									</table>									
                                </td>
								<td>                                  
                                    <table cellspacing="0" cellpadding="0" align="center">
									<tr>
									<td>
                                    <a href="../uploads/creativeclub/poetry_club/Premushan.jpg" class="galleryColBox" title="Poetry Club " rel="imgGallery14">
                                    <img height="100" alt='Poetry Club' style="border:1px solid #ABABAB" width="190" src='../uploads/creativeclub/poetry_club/Premushan.jpg'/>                             
                                    </a>
                                    <div class="desc" style="width:190" align="center"><p class="title">Premushan<br/><hr/></p></div>                          
                                    </td>
									</tr>
									</table>						
                                </td>
								<td>                                  
                                    <table cellspacing="0" cellpadding="0" align="center">
									<tr>
									<td>
                                    <a href="../uploads/creativeclub/poetry_club/till_death_do_us_part.jpg" class="galleryColBox" title="Poetry Club " rel="imgGallery15">
                                    <img height="100" alt='Poetry Club' style="border:1px solid #ABABAB" width="190" src='../uploads/creativeclub/poetry_club/till_death_do_us_part.jpg'/>                             
                                    </a>
                                    <div class="desc" style="width:190" align="center"><p class="title">Till Death do us Part<br/><hr/></p></div>                          
                                    </td>
									</tr>
									</table>						
                                </td>
								<td>                                  
                                    <table cellspacing="0" cellpadding="0" align="center">
									<tr>
									<td>
                                    <a href="../uploads/creativeclub/poetry_club/Hidayaten.jpg" class="galleryColBox" title="Poetry Club " rel="imgGallery16">
                                    <img height="100" alt='Poetry Club' style="border:1px solid #ABABAB" width="190" src='../uploads/creativeclub/poetry_club/Hidayaten.jpg'/>                             
                                    </a>
                                    <div class="desc" style="width:190" align="center"><p class="title">Hidayaten<br/><hr/></p></div>                          
                                    </td>
									</tr>
									</table>						
                                </td>								
                            </tr>				
                            <tr>
                                <td>                                  
                                    <table cellspacing="0" cellpadding="0" align="center">
									<tr>
									<td>
                                    <a href="../uploads/creativeclub/poetry_club/Girl.jpg" class="galleryColBox" title="Poetry Club " rel="imgGallery1">
                                    <img height="100" alt='Poetry Club' style="border:1px solid #ABABAB" width="190" src='../uploads/creativeclub/poetry_club/Girl.jpg'/>                             
                                    </a>
                                    <div class="desc" style="width:190" align="center"><p class="title">Girl<br/><hr/></p></div>                                   
                                    </td>
									</tr>
									</table>									
                                </td>
								<td>                                  
                                    <table cellspacing="0" cellpadding="0" align="center">
									<tr>
									<td>
                                    <a href="../uploads/creativeclub/poetry_club/Ma.jpg" class="galleryColBox" title="Poetry Club " rel="imgGallery2">
                                    <img height="100" alt='Poetry Club' style="border:1px solid #ABABAB" width="190" src='../uploads/creativeclub/poetry_club/Ma.jpg'/>                             
                                    </a>
                                    <div class="desc" style="width:190" align="center"><p class="title">Ma<br/><hr/></p></div>                          
                                    </td>
									</tr>
									</table>						
                                </td>
								<td>                                  
                                    <table cellspacing="0" cellpadding="0" align="center">
									<tr>
									<td>
                                    <a href="../uploads/creativeclub/poetry_club/me.jpg" class="galleryColBox" title="Poetry Club " rel="imgGallery3">
                                    <img height="100" alt='Poetry Club' style="border:1px solid #ABABAB" width="190" src='../uploads/creativeclub/poetry_club/me.jpg'/>                             
                                    </a>
                                    <div class="desc" style="width:190" align="center"><p class="title">Me<br/><hr/></p></div>                          
                                    </td>
									</tr>
									</table>						
                                </td>
								<td>                                  
                                    <table cellspacing="0" cellpadding="0" align="center">
									<tr>
									<td>
                                    <a href="../uploads/creativeclub/poetry_club/not alone.jpg" class="galleryColBox" title="Poetry Club " rel="imgGallery4">
                                    <img height="100" alt='Poetry Club' style="border:1px solid #ABABAB" width="190" src='../uploads/creativeclub/poetry_club/not alone.jpg'/>                             
                                    </a>
                                    <div class="desc" style="width:190" align="center"><p class="title">Not Alone<br/><hr/></p></div>                          
                                    </td>
									</tr>
									</table>						
                                </td>								
                            </tr>
<tr>
                                <td>                                  
                                    <table cellspacing="0" cellpadding="0" align="center">
									<tr>
									<td>
                                    <a href="../uploads/creativeclub/poetry_club/other day, other time.jpg" class="galleryColBox" title="Poetry Club " rel="imgGallery5">
                                    <img height="100" alt='Poetry Club' style="border:1px solid #ABABAB" width="190" src='../uploads/creativeclub/poetry_club/other day, other time.jpg'/>                             
                                    </a>
                                    <div class="desc" style="width:190" align="center"><p class="title">Other Day, Other Time<br/><hr/></p></div>                                   
                                    </td>
									</tr>
									</table>									
                                </td>
								<td>                                  
                                    <table cellspacing="0" cellpadding="0" align="center">
									<tr>
									<td>
                                    <a href="../uploads/creativeclub/poetry_club/poetry.jpg" class="galleryColBox" title="Poetry Club " rel="imgGallery6">
                                    <img height="100" alt='Poetry Club' style="border:1px solid #ABABAB" width="190" src='../uploads/creativeclub/poetry_club/poetry.jpg'/>                             
                                    </a>
                                    <div class="desc" style="width:190" align="center"><p class="title">Poetry<br/><hr/></p></div>                          
                                    </td>
									</tr>
									</table>						
                                </td>
								<td>                                  
                                    <table cellspacing="0" cellpadding="0" align="center">
									<tr>
									<td>
                                    <a href="../uploads/creativeclub/poetry_club/The Calling.jpg" class="galleryColBox" title="Poetry Club " rel="imgGallery7">
                                    <img height="100" alt='Poetry Club' style="border:1px solid #ABABAB" width="190" src='../uploads/creativeclub/poetry_club/The Calling.jpg'/>                             
                                    </a>
                                    <div class="desc" style="width:190" align="center"><p class="title">The Calling<br/><hr/></p></div>                          
                                    </td>
									</tr>
									</table>						
                                </td>
								<td>                                  
                                    <table cellspacing="0" cellpadding="0" align="center">
									<tr>
									<td>
                                    <a href="../uploads/creativeclub/poetry_club/Three_pale_Men.jpg" class="galleryColBox" title="Poetry Club " rel="imgGallery8">
                                    <img height="100" alt='Poetry Club' style="border:1px solid #ABABAB" width="190" src='../uploads/creativeclub/poetry_club/Three_pale_Men.jpg'/>                             
                                    </a>
                                    <div class="desc" style="width:190" align="center"><p class="title">Three pale Men<br/><hr/></p></div>                          
                                    </td>
									</tr>
									</table>						
                                </td>								
                            </tr>  							
                        </table>
                    </div>                  
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