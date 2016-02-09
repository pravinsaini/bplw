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
<title>Article Request</title>
<link type="image/png" rel="icon" href="../images/fav_32.png">
<link type="text/css" rel="stylesheet" href="../css/reset.css">
<link type="text/css" rel="stylesheet" href="../css/main.css">
<link type="text/css" rel="stylesheet" href="../css/module.css">
<link type="text/css" rel="stylesheet" href="../css/dashboard.css">
<script type="text/javascript" src="../js/jquery-1.4.1.min.js"></script>
<script type="text/javascript" src="../js/metadata.js"></script>
<script type="text/javascript" src="../js/main.js"></script>
<style type="text/css">
    .error
	{    
	float:center;
	color:#CC3300;
	font-weight:bold;
	font-size:14px;
	}
.text_box
{
padding:4px;
	width:400px;
    margin: 0;
    -webkit-border-radius:4px;
    -moz-border-radius:4px;
    border-radius:4px; 
	border:1px solid #b3c1ce;
    color:#888;
    outline:none;
    display: inline-block;
}
input[type=checkbox] { width: 14px; height: 14px }
	</style>
<script type="text/javascript">
function Validate(){
	var valid = true;
	var message = '';
	var author = document.getElementById("author");
	var title = document.getElementById("title");
	var journal_name = document.getElementById("journal_name");
	var volume_number = document.getElementById("volume_number");
	var issue_number = document.getElementById("issue_number");
	var issn = document.getElementById("issn");

	if(author.value.trim() == ''){
		valid = false;
		message = message + '*Author is required' + '\n';
	}
	if(title.value.trim() == ''){
		valid = false;
		message = message + '*Title is required' + '\n';
	}
	if(journal_name.value.trim() == ''){
		valid = false;
		message = message + '*Journal Name is required' + '\n';
	}
	if(volume_number.value.trim() == ''){
		valid = false;
		message = message + '*Volume Number is required' + '\n';
	}
	if(issue_number.value.trim() == ''){
		valid = false;
		message = message + '*Issue Number is required' + '\n';
	}
	if(issn.value.trim() == ''){
		valid = false;
		message = message + '*ISSN Number is required' + '\n';
	}
	if (valid == false){
		alert(message);
		return false;
	}
}
</script>
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
<li>Inter Library Loan - Article Request</li>
</ul>
</div>
</div>
<div class="bannerCarouselWrapper1">
<div class="service_box">
<div class="description">
<br/>
<div align="center" style="color: #211D70; font-size:18px; font-weight:bold; text-decoration:underline;">Article Request Form</div>
<form action="articlerequest.php" method="post" enctype="multipart/form-data" onSubmit="return Validate();">
<?php				
$message="";
if(isset($_POST['submit']))
{
$author=trim($_POST["author"]);
$title=trim($_POST["title"]);
$journal_name=trim($_POST["journal_name"]);
$volume_number=trim($_POST["volume_number"]);
$issue_number=trim($_POST["issue_number"]);
$issn=trim($_POST["issn"]);
$date = date("d-m-Y");
$bitsid=$info['bitsid'];
		$name=$info['name'];
		$email=$info['email'];
				$query = 'insert into ill_article_request(author, title, journal_name, volume_number, issue_number, issn, date, bitsid, name, email) 
					values("'.$author.'", "'.$title.'", "'.$journal_name.'", "'.$volume_number.'", "'.$issue_number.'", "'.$issn.'", "'.$date.'", "'.$bitsid.'", "'.$name.'", "'.$email.'")'; 
				$result=mysql_query($query);
				if ($result==false)
				{
					die(mysql_error());
				}
				$message ='Thank you for sending your request.We will get back to you soon.';
}
?>
<div align="center">&nbsp;<span class="error"><?php echo $message;?></span></div>
<table align="center" cellpadding="0" cellspacing="0" >							
								 <tr>
								 <td align="right" style="color: #211D70;">Author:&nbsp;&nbsp;&nbsp;</td>
								 <td><input type="text" name="author"  id="author" placeholder="&nbsp;" class="text_box"/></td>								 
								 </tr>
								 <tr style="line-height: 20px"><td colspan="2">&nbsp;</td></tr>
								 <tr>
								 <td align="right" style="color: #211D70;">Title:&nbsp;&nbsp;&nbsp;</td>
								 <td><input type="text" name="title"  id="title"placeholder="&nbsp;" class="text_box"/></td>													 
								 </tr>
								 <tr style="line-height: 20px"><td colspan="2">&nbsp;</td></tr>
								<tr>
								<td align="right" style="color: #211D70;">Journal Name:&nbsp;&nbsp;&nbsp;</td>
								<td><input type="text" name="journal_name"  id="journal_name" placeholder="&nbsp;" class="text_box"/></td>								 
								</tr>
								<tr style="line-height: 20px"><td colspan="2">&nbsp;</td></tr>								
					            <tr>	
								<td align="right" style="color: #211D70;">Volume Number:&nbsp;</td>
								<td><input type="text" name="volume_number"  id="volume_number" placeholder="&nbsp;" class="text_box"/></td>					
								</tr>
								<tr style="line-height: 20px"><td colspan="2">&nbsp;</td></tr>
								<tr>	
								<td align="right" style="color: #211D70;">Issue Number:&nbsp;</td>
								<td><input type="text" name="issue_number"  id="issue_number" placeholder="&nbsp;" class="text_box"/></td>					
								</tr>
								<tr style="line-height: 20px"><td colspan="2">&nbsp;</td></tr>
								<tr>	
								<td align="right" style="color: #211D70;">ISSN No.:&nbsp;</td>
								<td><input type="text" name="issn"  id="issn" placeholder="&nbsp;" class="text_box"/></td>					
								</tr>
								<tr style="line-height: 20px"><td colspan="2">&nbsp;</td></tr>
								<tr><td valign="top" align="right"><input type="checkbox" value="agree" name="agree" id="agree" required></td><td valign="top" align="left"><h2 style="font-size:14px; color: #211D70;">&nbsp;I agree to pay the cost of this ILL as stipulated by the library on receipt of the document.</h2></input></td></tr>
								<tr style="line-height: 20px"><td colspan="2">&nbsp;</td></tr>
								<tr>
				<td>&nbsp;</td>
				<td align="left">
				<input type="submit" name="submit" value="Submit" class="Stylish_button" />
&nbsp;&nbsp;&nbsp;&nbsp;<a href="articlerequest.php" style="padding: 4px 15px 4px 15px; width:80px; background-color :#06588f; color: #FFFFFF; font-weight: bold; border-radius: 5px; font-size:14px;">Reset</a>
</td>
</tr>
</table><br><br><br>
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
<?php
}
else
{
 header("location: ../index.php");
}
?>