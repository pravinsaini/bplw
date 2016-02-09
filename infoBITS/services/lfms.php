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
<title>Lost & Found Management System</title>
<link type="image/png" rel="icon" href="../images/fav_32.png">
<link type="text/css" rel="stylesheet" href="../css/reset.css">
<link type="text/css" rel="stylesheet" href="../css/main.css">
<link type="text/css" rel="stylesheet" href="../css/module.css">
<link type="text/css" rel="stylesheet" href="../css/dashboard.css">
<script type="text/javascript" src="../js/jquery-1.4.1.min.js"></script>
<script type="text/javascript" src="../js/metadata.js"></script>
<script type="text/javascript" src="../js/main.js"></script>
<style type="text/css">
.Stylish_button
{
background-color :#4a9ace;
color: #FFFFFF;
font-weight: bold;
padding: 4px;
border:none;
width:70px;
cursor:pointer;
border-radius: 5px; 
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
<li>Lost & Found Management System</li>
</ul>
</div>
</div>
<div class="bannerCarouselWrapper1">
<div class="service_box">
<div class="description">
<br/>
               <p style="font-size:18px; color: #211D70;" align="center"><u>Lost and Found Items in the Library</u></p>
                   <br/>
					<table cellpadding="0" cellspacing="0" align="center">
              <tr>
              <td valign="top" style="font-size:15px; color: red; font-weight:bold; width:43px" align="left">Note:</td>
			  <td valign="top" style="font-size:15px; color: #211D70;" align="left">Before claiming the item please meet the librarian to verify and confirm your lost item.</td>
			  </tr></table>
              <table cellpadding="0" cellspacing="0" align="center" style="width:95%;">
              <tr>
              <td valign="top">
              <?php
			  $message="";
$sql = "select * from lfms where status='1' order by sno DESC";
$result = mysql_query($sql);
$num_rows = mysql_num_rows($result);
$counter = 0;
if($result && mysql_num_rows($result)>0)
{
?>
			<table cellpadding="0" cellspacing="0" style="width:100%; border: 1px solid #4a9ace;">
				<thead>
					<tr style="color:#FFFFFF; background-color:#4a9ace; font-weight:bold; font-size:14px;">
						<th>
						<table align="center"><tr><td align="center" style="color:#FFFFFF; background-color:#4a9ace; font-size:14px; font-weight:bold; line-height:35px; vertical-align:center;">S.No.</td></tr></table>	
							
						</th>
						<th>
						<table align="center"><tr><td align="center" style="color:#FFFFFF; background-color:#4a9ace; font-size:14px; font-weight:bold; line-height:35px; vertical-align:center;">Item Found</td></tr></table>							
						</th>
						<th>
						<table align="center"><tr><td align="center" style="color:#FFFFFF; background-color:#4a9ace; font-size:14px; font-weight:bold; line-height:35px; vertical-align:center;">Brand Name</td></tr></table>	
						</th>
						<th>
						<table align="center"><tr><td align="center" style="color:#FFFFFF; background-color:#4a9ace; font-size:14px; font-weight:bold; line-height:35px; vertical-align:center;">Found On</td></tr></table>	
						</th>
						
						<th>
							&nbsp;&nbsp;&nbsp;Claim if it <br/>Belongs to You
						</th>
					</tr>
				</thead>
<?php
while($row = mysql_fetch_array($result))
				{
				?>
				
						<tr align="center">
						<td style="border-right:1px solid #4a9ace; border-bottom:1px solid #4a9ace;">
								<?php echo ++$counter; ?>
							</td>
							
							<td style="border-right:1px solid #4a9ace; border-bottom:1px solid #4a9ace;">
								<?php echo $row["particulars"]; ?>
							</td>
							<td style="border-right:1px solid #4a9ace; border-bottom:1px solid #4a9ace;">
								<?php echo $row["Brand_Name"]; ?>
							</td>
							<td style="border-right:1px solid #4a9ace; border-bottom:1px solid #4a9ace;">
								<?php echo $row["date"]; ?>
							</td>
							<td style="border-bottom:1px solid #4a9ace;">
								<form method="post" action="lfms_process.php">
									<input type="hidden" name="ci" value="<?php echo $row["sno"]; ?>" />
									<input type="hidden" name="action" value="edit" />
									<input class="Stylish_button" type="submit" value="Claim"/>
								</form>
							</td>
							
						</tr>
				
				<?php
				}
				}
else
{
 $message="No Records Found!";
}
?>
<div align="center" height="30px">&nbsp;
				<span class="error" ><?php echo $message;?></span>
				</div>	
			</table>
              </td>
			  </tr></table>              
<br/>		  
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