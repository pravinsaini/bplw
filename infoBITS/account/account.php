<?php
include("../config.php");
$message = "";
if(isset($_SESSION['bitsid'])){
	$userinfo = mysql_fetch_array(mysql_query('select * from users where bitsid="'.$_SESSION['bitsid'].'"'));
	$old_password = $userinfo['password'];
	 if($userinfo['confirm']!=1){
        header("location: ../index.php");
    }
	else
	{
	if(isset($_POST['update_mobile']))
	{
		$mobile = trim($_POST['mobile']);
		mysql_query('update users set mobile="'.$mobile.'" where bitsid="'.$_SESSION['bitsid'].'"');	
	}
	if(isset($_POST['update_password']))
	{
		$passwordvalue=trim(sha1($_POST['cur_pwd']));
        $password=trim(sha1($_POST['password']));
        $confirm_pwd=trim(sha1($_POST['confirm_pwd'])); 
		$select=mysql_query('select * from users where bitsid="'.$_SESSION['bitsid'].'"'); 
		 if ($select==false)
			{
				die(mysql_error());
			}
		 $fetch=mysql_fetch_array($select);
         $data_pwd=$fetch['password'];
		 
	if($password==$confirm_pwd && $data_pwd==$passwordvalue)
        {
			$insert=mysql_query('update users set password="'.$confirm_pwd.'" where bitsid="'.$_SESSION['bitsid'].'"'); 
			
			$msg="Congratulations you have successfully changed your password&nbsp;!";
        }
      else
        {
			$msg="your password do not match. please try again";
        }
	}
	$extension = "jpg";
	$message= '';
if(isset($_POST['submit']))
{	
	if(isset($_FILES["avatar"]["name"]) && $_FILES["avatar"]["name"]!='')
	{
	$id = $userinfo['id'];
		$allowedExts = array("gif", "jpeg", "jpg", "png");
		$temp = explode(".", $_FILES["avatar"]["name"]);
		$extension = end($temp);
		if(($_FILES["avatar"]["type"] == "image/gif")||($_FILES["avatar"]["type"] == "image/jpeg")|| ($_FILES["avatar"]["type"] == "image/jpg")||($_FILES["avatar"]["type"] == "image/pjpeg")||($_FILES["avatar"]["type"] == "image/x-png")||($_FILES["avatar"]["type"] == "image/png"))
		{
			if(($_FILES["avatar"]["size"] < 1048576) && in_array($extension, $allowedExts))
			{
				if ($_FILES["avatar"]["error"] > 0)
				{
					$message = $message + "Error: " . $_FILES["avatar"]["error"] . "<br>";
				}
				else
				{
							$_FILES["avatar"]["name"] = $id.".".$extension;
							
							if(move_uploaded_file($_FILES["avatar"]["tmp_name"], "../uploads/profilepics/" . $_FILES["avatar"]["name"]))
							{
								$form = false;
							}
							else
							{
								$message = "Image couldn't be uploaded";
							}	
				}
					$avatar = $id.".".$extension;
					mysql_query('update users set avatar="'.$avatar.'" where id="'.$id.'"');
					$message ="Your Profile Picture has been Uploaded Successfully!!!";
			}
			else
			{
				$message ="File size more than 1 MB is not allowed <br>";
			}
		}		
		else
		{							
			$message ="Invalid format profile picture file (Use .jpg/.png/.gif/.jpeg) <br>";
		}
	}
	else
	{
		$message ="No Image Uploaded";
	}
}
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type">
<title>Account Settings - <?php echo $userinfo['name']; ?></title>
<link href="../images/fav_32.png" type="image/png" rel="icon">
<link type="text/css" rel="stylesheet" href="../css/reset.css">
<link type="text/css" rel="stylesheet" href="../css/main.css">
<link type="text/css" rel="stylesheet" href="../css/module.css">
<script type="text/javascript" src="../js/jquery-1.4.1.min.js"></script>
<script type="text/javascript" src="../js/metadata.js"></script>
<script type="text/javascript" src="../js/main.js"></script>
<link type="text/css" rel="stylesheet" href="../css/dashboard.css">
<style>
			.head {  
				font-size:14px; 
				display:block;
				text-align:right;
				color: #211D70;
			}
			.content { 
				display:none;
			}

			#improved li {
				position:relative;
				overflow:hidden;
				border-top:1px solid #CCCCCC;
				padding:6px;
			}
.text_box
{
padding:4px;
	width:300;
    margin: 0;
    -webkit-border-radius:4px;
    -moz-border-radius:4px;
    border-radius:4px; 
	border:1px solid #b3c1ce;
    color:#888;
    outline:none;
    display: inline-block;
}
.upload_file_boarder
{
padding:2px;
	width:210px;
    margin: 0;
    -webkit-border-radius:4px;
    -moz-border-radius:4px;
    border-radius:4px; 
	border:1px solid #b3c1ce;
    color:#888;
    outline:none;
    display: inline-block;
}
.upload_picture_button
{
width:120px;
color:#FFFFFF;
border:2px solid #06588f;
background:#06588f;
cursor:pointer;
-webkit-border-radius:4px;
    -moz-border-radius:4px;
    border-radius:4px; 
}
.error
	{    
	float:center;
	color:#FF0000;
	font-weight:bold;
	font-size:12px;
	}
		</style>
		<script type="text/javascript">
function Validate(){
	var valid = true;
	var message = '';
	var cur_pwd = document.getElementById("cur_pwd");
	var password = document.getElementById("password");
	var confirm_pwd = document.getElementById("confirm_pwd");

	if(cur_pwd.value.trim() == ''){
		valid = false;
		message = message + '*Old Password is required' + '\n';
	}
	if(password.value.trim() == ''){
		valid = false;
		message = message + '*New Password is required' + '\n';
	}
	if(confirm_pwd.value.trim() == ''){
		valid = false;
		message = message + '*confirm Password is required' + '\n';
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
<li>General Account Settings</li>
</ul>
</div>
</div>
<div class="bannerCarouselWrapper1">
<div class="service_box">
<div class="heading">
<h2><span>General Account </span> Settings</h2>
</div>
<ul id='improved'>
<li>
<table cellpadding="0" cellspacing="0" style="width: 95%; color: #211D70;" align="center">
<tr>
<td style="width:150px;">Name</td>
<td align="left"><label name="name" ><?php echo $userinfo['name']; ?></label></td>
<td align="right">&nbsp;</td>
</tr>
</table>
</li>
<li>
<table cellpadding="0" cellspacing="0" style="width: 95%; color: #211D70;" align="center">
<tr>
<td style="width:150px;">Email</td>
<td align="left"><label name="email" ><?php echo $userinfo['email']; ?></label></td>
<td align="right">&nbsp;</td>
</tr>
</table>
</li>
<li>
<form action="account.php" method="post" enctype="multipart/form-data">
<table cellpadding="0" cellspacing="0" style="width: 95%;color: #211D70;" align="center">
<tr>
<td style="width:150px;">Mobile</td>
<td align="left"><input type="text" name="mobile" id="mobile" class="text_box" value="<?php echo $userinfo['mobile']; ?>"/></td>
<td align="right"><input type="submit" name="update_mobile" value="Update" class="Stylish_button"/></td>
</tr>
</table>
</form>
</li>				
<li>
<table cellpadding="0" cellspacing="0" style="width: 95%; color: #211D70;" align="center">
<tr><td>Change Password</td></tr>
<tr>
<td align="left">
<form action="account.php" method="post" enctype="multipart/form-data" onSubmit="return Validate();">
<table style="margin:10px 10px 10px 30px; color: #211D70;" cellpadding="0" cellspacing="0">
            <tr><td style="font-size: 14px;">
                <label for="pname">Old password&nbsp;</label></td>
                <td>
				<input type="password" name="cur_pwd" id="cur_pwd" class="text_box"/>
                  </td><td>&nbsp;</td></tr>
                        <tr style="line-height: 20px"><td colspan="2">&nbsp;</td></tr>
						<tr><td style="font-size: 14px;">
                <label for="bname">New password&nbsp;</label></td>
                <td>
				<input type="password" name="password"  id="password" class="text_box"/>
                  </td><td>&nbsp;</td></tr>
				  <tr style="line-height: 20px"><td colspan="2">&nbsp;</td></tr>
				  <tr><td style="font-size: 14px;">
                <label for="confirm_pwd">Confirm password&nbsp;</label></td>
                <td>
				<input type="password" name="confirm_pwd" id="confirm_pwd" class="text_box"/>
                  </td><td>&nbsp;</td></tr>
				  <tr style="line-height: 20px"><td colspan="2">&nbsp;</td></tr>
				  <tr><td>&nbsp;</td><td><input type="submit" name="update_password" value="Update" class="Stylish_button"/></td></tr>
</table>
</form>
</td>
</tr>
<tr><td>
<div align="center" height="30px">&nbsp;
				<span class="error"><?php echo $msg;?></span>
				</div>
</td></tr>
</table>
</li>
<li></li>
		</ul>
<form action="account.php" method="post" enctype="multipart/form-data">	
<?php 
$userimage = mysql_fetch_array(mysql_query('select * from users where bitsid="'.$_SESSION['bitsid'].'"'));
?>
<table cellpadding="0" cellspacing="0" style="width: 63%; color: #211D70;" align="center">
<tr><td colspan="2"><img src="../uploads/profilepics/<?php echo $userimage['avatar']; ?>" width="180"  Height="180" style="border:1px solid black;"></td></tr>
<tr style="line-height:10px;"><td colspan="2">&nbsp;</td></tr>
<tr>
<td colspan="2">
<input type="file" name="avatar" id="avatar" class="upload_file_boarder"/>
<input type="submit" value="Change Picture" name="submit" class="upload_picture_button"/>
<br/>
<div align="left" height="30px">&nbsp;
				<span class="error"><?php echo $message;?></span>
				</div>
<br/>
</td>
</tr>
</table>
</form>
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
}
else{
	header("Location: ../index.php");
}
?>