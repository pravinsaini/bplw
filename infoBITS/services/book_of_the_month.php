<?php
include("../config.php");
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type">
<title>Book of the Month</title>
<link type="image/png" rel="icon" href="../images/fav_32.png"  >
<link type="text/css" rel="stylesheet" href="../css/reset.css">
<link type="text/css" rel="stylesheet" href="../css/main.css">
<link type="text/css" rel="stylesheet" href="../css/module.css">
<script type="text/javascript" src="../js/jquery-1.4.1.min.js"></script>
<script type="text/javascript" src="../js/metadata.js"></script>
<script type="text/javascript" src="../js/main.js"></script>
<style type="text/css">
.button5{
width:200px;
height:40px;
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
width:200px;
height:40px;
margin-left:10px;
}
.text_box
{
padding:4px;
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
.error
	{    
	float:center;
	color:#FF0000;
	font-weight:bold;
	font-size:13px;
	}
</style>
<script type="text/javascript">
function Validate(){
	var valid = true;
	var message = '';
	var username = document.getElementById("bitsid_psrn");
	var password = document.getElementById("password");

	if(username.value.trim() == ''){
		valid = false;
		message = message + '*Username is required' + '\n';
	}
	if(password.value.trim() == ''){
		valid = false;
		message = message + '*Password is required'+'\n';
	}
	if (valid == false){
		alert(message);
		return false;
	}
}
</script>
</head>
<body>
<?php
$message = "";
if(isset($_POST['submit']))
 {
 $username = stripslashes(strtoupper(trim($_POST['bitsid_psrn'])));
 $password = stripslashes(trim($_POST['password']));
		$query ="select * from users where bitsid='$username'";
		$result = mysql_query($query) or die ("Unable to verify user because " . mysql_error());
		if ($result==false)
		{
			die(mysql_error());
		}
		if($result && mysql_num_rows($result)>0)
		{
			$info = mysql_fetch_array(mysql_query("select * from users where bitsid='$username'"));
			if($info['password']==sha1($password))
			{
				if($info['confirm']==1)
				{
				$mb_result = mysql_fetch_array(mysql_query('SELECT * FROM `book_of_the_month_main` ORDER BY id DESC LIMIT 1'));
				$book_title=$mb_result["book_title"];
				$book_author=$mb_result["book_author"];	
				$name=$info['name'];
				$psrn=$info['bitsid'];
				$date = trim($_POST['date']);
				$time = trim($_POST['time']);
				
						$query = 'insert into book_of_the_month(name, bitsid, book_title, book_author, date, time) 
						values("'.$name.'", "'.$psrn.'", "'.$book_title.'", "'.$book_author.'",  "'.$date.'", "'.$time.'")'; 
						$result=mysql_query($query);
						if ($result==false)
						{
							die(mysql_error());
						}
							header('Location: message.php');											
				}
				else
				{	
					$message ="You have not registered on library portal or might be, you have not confirm your BITS Email on library portal.";							
				}
				unset($_POST['bitsid_psrn'],$_POST['password']);			
			}
			else
			{
				$message ='Invalid Credentials.';
			}
		}
		else
		{
			$message ='You have not registered on library portal.';
		}		
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
&nbsp;&nbsp;
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
<a href="http://172.21.1.37/" target="_blank">Online Book Catalogue</a>
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
<a target="_blank" href="https://www.mendeley.com/">Mendeley Research Tool</a>
</li>
<li>
<a target="_blank" href="http://endnote.com/">Endnote</a>
</li>
<li>
<a target="_blank"  href="http://shodhganga.inflibnet.ac.in/">Shodhganga</a>
</li>
<li>
<a  href="../theses_and_reports.php">Theses & Reports</a>
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
<p> You are here:</p>
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
<li>Book of the Month</li>
</ul>
</div>
</div>
<div class="bannerCarouselWrapper1">
<div class="service_box">
<div class="description">
<form action="book_of_the_month.php" method="post" enctype="multipart/form-data" onsubmit="return Validate();">
<input type="hidden" name="date" id="date" value="<?php date_default_timezone_set("Etc/UTC"); echo date('d/m/Y'); ?>" />
<input type="hidden" name="time" id="time" value="<?php date_default_timezone_set("Etc/UTC"); echo date('H:i:s'); ?>" />
<?php
$result = mysql_fetch_array(mysql_query('SELECT * FROM `book_of_the_month_main` ORDER BY id DESC LIMIT 1'));
?>
<div align="center" style="margin-top:5px;"><img src="../images/book_of_the_month.png"></div>
<div align="center">&nbsp;<span class="error"><?php echo $message;?></span></div>
<table align="left"><tr><td valign="top" style="color:#06588f; font-weight:bold;">Instructions:</td></tr>
<tr><td style="color:#211D70;">Please use the following BITS ID format to reserve this book:<br/>
First Degree Student - F2008468P, Higher Degree - H2009123P, Research Scholar - P2010123P and Faculty/Staff - PSRN Number (eg. 2705).<br/>
</td></tr>
</table>
<br/>
<table align="left">
<tr>
<td valign="top"><?php echo '<img src="../uploads/book_of_the_month/'.$result["book_image_path"].'" width="155" height="193" alt="book_of_the_month" style="border:1px solid black;" />'; ?></td>
<td valign="top">
<table style="color:#211d70;">
<tr>
<td style="width:100px;">Title</td><td>&nbsp;:&nbsp;<?php echo $result["book_title"]; ?></td>
</tr>
<tr style="line-height:10px;"><td colspan="2">&nbsp;</td></tr>
<tr>
<td>Author</td><td>&nbsp;:&nbsp;<?php echo $result["book_author"]; ?></td>
</tr>
<tr style="line-height:10px;"><td colspan="2">&nbsp;</td></tr>
<tr>
<td>User name</td><td>&nbsp;:&nbsp;<input class="text_box" name="bitsid_psrn" placeholder="BITS ID / PSRN Number" id="bitsid_psrn"></td>
</tr>
<tr style="line-height:10px;"><td colspan="2">&nbsp;</td></tr>
<tr>
<td>Password</td><td>&nbsp;:&nbsp;<input class="text_box" name="password" placeholder="Password" type="password" id="password"></td>
</tr>
<tr style="line-height:10px;"><td colspan="2">&nbsp;</td></tr>
<tr><td>&nbsp;</td><td><div class="btn">
<input class="button5" type="submit" name="submit" value="Confirm Reservation">
</div></td></tr>
<tr style="line-height:10px;"><td colspan="2">&nbsp;</td></tr>
</table>
</td>
</tr>
</table>
</form>
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