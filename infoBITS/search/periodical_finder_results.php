<?php
include("../config.php");
$message = "";
$alphabet = "";
$txtsearch = "";
$subject = "";
if(isset($_POST['search_title'])){
	if($_POST['search_title']!==""){
		$txtsearch = $_POST['search_title'];
	}
	else{
		$message = "Please Enter Search Title!<br/><br/><a href='periodical_finder.php'>Back</a>";
	}
}
if(isset($_GET['subject'])){
	$subject = $_GET['subject'];
}
else if(isset($_GET['alphabet'])){
	$alphabet =	$_GET['alphabet'];
}
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type">
<title>Periodical Finder&nbsp;&nbsp;::&nbsp;&nbsp;BITS-PILANI Library</title>
<link href="../images/fav_32.png" type="image/png" rel="icon">
<link type="text/css" rel="stylesheet" href="../css/reset.css">
<link type="text/css" rel="stylesheet" href="../css/main.css">
<link type="text/css" rel="stylesheet" href="../css/module.css">
<link type="text/css" rel="stylesheet" href="../css/jquery.autocomplete.css" />
<link type="text/css" rel="stylesheet" href="../css/dashboard.css">
<script type="text/javascript" src="../js/jquery-1.4.1.min.js"></script>
<script type="text/javascript" src="../js/metadata.js"></script>
<script type="text/javascript" src="../js/main.js"></script>
<script type="text/javascript" src="../js/jquery.js"></script>
<script type="text/javascript" src="../js/jquery.autocomplete.js"></script>
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
</style>
<script>
$(document).ready(function(){
 $("#search_title").autocomplete("autocomplete1.php", {
		selectFirst: false
	});
});
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
<li><a href="periodical_finder.php">Periodical Finder</a></li>
<li>Search Results - <?php if($alphabet){echo "Alphabet - ".$alphabet;} else if($txtsearch){echo $txtsearch; } else{ echo "Subject -".$subject; } ?></li>
</ul>
</div>
</div>
<div class="bannerCarouselWrapper1">
<div class="service_box">
<div class="description">
<br/>
<table cellpadding="0" cellspacing="0" align="center" style="width: 100%">
<tr>
<td valign="top" style="width: 324px">
<a href="periodical_finder.php"><img src="../images/Go_Back.png" alt="" id="" style="width: 100px; height:50px; margin:0px 0px 0px 50px; position:relative;"></a>
</td></tr>
</table>
<div valign="top" align="center" style="color: #00008B; font-style: italic; font-size:35px; font-weight:bold;">
<span style="line-height:33px;">Periodical </span>Finder<br/>
<span align="center" style="color: red; font-size:20px; text-align:center">For Print & E-Journals</span>
</div>
	<table cellpadding="0" cellspacing="0" align="center" style="width:82%; border:1px solid #211D70">
<tr><td valign="top" align="center" style="font-size:16px; font-weight:bold; color: #FFFFFF; background-color:#211D70; width:100%; line-height:30px">
Search By Title
</td></tr>
<tr><td align="center" style="width:100%;">
<br/>
<form method="post" action="periodical_finder_results.php">
<table cellpadding="0" cellspacing="0" >
<tr>
<td valign="middle" style="width: 180px; font-size:19px; font-weight:bold; color: #211D70;">Enter Search Title</td>
<td valign="top"><input class="text_box" type="text" name="search_title" id="search_title" size="47" class="text_field_required" />
</td> 
<td align="left">
&nbsp;&nbsp;&nbsp;<input type="submit" id="submit" value="Search" name="submit" class="Stylish_button"/></td>
</tr>
</table>
</form>
<br/>
</td></tr>
<tr><td valign="top" align="center" style="font-size:16px; font-weight:bold; color: #FFFFFF; background-color:#211D70; width:100%; line-height:30px">
Browse By A - Z
</td></tr>
<tr> 
    <td height="11" align="center">
	<table cellpadding="5" >
        <tr> 
        <?php
			for($i=2;$i<28;$i++){
		?>
        <td><a href="periodical_finder_results.php?alphabet=<?php echo chr(077+$i); ?>" style="TEXT-DECORATION: underline; color: #211D70"><?php echo chr(077+$i); ?></a></td>
        <?php
			}
		?>    
        </tr>
		</table>
		</td>
		</tr>
        </table>
        <br>
        <br>
<?php
	
		if($subject)
		{
			$SQL ="SELECT * FROM periodical_finder WHERE Subjects LIKE '".$subject."%' ORDER BY Title";
			$search="Subject \"$subject\"";
		}
		else if($alphabet){
			$SQL ="SELECT * FROM periodical_finder WHERE Title LIKE '".$alphabet."%' ORDER BY Subjects";
			$search="Alphabet \"$alphabet\"";
		}
		else if($txtsearch){
			$SQL = "SELECT * FROM periodical_finder WHERE Title LIKE '".$txtsearch."%' ORDER BY Title";
			$search="\"$txtsearch\"";
		}
		else
		{
			$message="Please Enter Search Title!<br/><br/><a href='periodical_finder.php'>Back</a>";
		}
			if($result = mysql_query($SQL)){
			$num_rows=mysql_num_rows($result);
			$counter = 0;
			if($result && mysql_num_rows($result)>0){
				// Display the results 	
				$search = strtoupper($search);
				$Color = "Showing $num_rows Results for &nbsp;";
			?>				
			<div style="width: 100%;" align="center">
				<span class="searchcolourone"><?php echo $Color;?></span><span class="searchcolourtwo"><?php echo $search;?></span>
			</div>
			<table  cellpadding="0" cellspacing="0" align="center"><tr><td valign="top" align="center" >
			<table class="table table-bordered" cellpadding="0" cellspacing="0">
			<thead>
			<tr style="font-size:18px; font-weight:normal; color:#000000; background-color:#92D050; height:30px; line-height:30px; text-align:center;"><th colspan="5" style="padding: 10px 10px 10px 10px;">All Periodicals/Journals are Located in Hall Number 5</th></tr>
				  	<tr style="color:#000000; background-color:#FFC000; font-size:14px;">
						<th style="font-size:1.1em; font-weight:bold">SNo.</th>					
				  		<th style="font-size:1.1em; font-weight:bold">Title</th>
						<th style="font-size:1.1em; font-weight:bold">Display Number</th>
				  		<th style="font-size:1.1em; font-weight:bold">View Online</th>
						
				  	</tr>	
				  </thead>
				  <?php
	while($row = mysql_fetch_array($result)){
				?>
				<tr>	
					<td style="font-size:16px; font-weight:normal; color:#ffffff; background-color:#0070C0;"><?php echo ++$counter; ?>	</td>				
		<?php
					$url=$row['Website'];
					if($url=="")
					{
					?>
					<td  style="font-size:16px; font-weight:normal; color:#ffffff; background-color:#0070C0;"><?php echo $row['Title']; ?></td>
					<?php
					}
					else
					{
					?>
					<td style="font-size:16px; font-weight:normal; color:#ffffff; background-color:#0070C0;"><a style="font-size:16px; font-weight:normal; color:#ffffff; background-color:#0070C0;" href="<?php echo $row['Website']; ?>" target="_blank"><?php echo $row['Title']; ?></a></td>
					<?php
					}
					?>       
                    <td style="font-size:16px; font-weight:normal; color:#ffffff; background-color:#0070C0;"><?php echo $row['Display_Number']; ?></td>
					<?php
					$access_type=$row['Access_Type'];
					if($access_type=="Not Available")
					{
					?>
					<td  style="font-size:16px; font-weight:normal; color:#ffffff; background-color:#0070C0;"><?php echo $row['Access_Type']; ?></td>
					<?php
					}
					else
					{
					?>
					<td style="font-size:16px; font-weight:normal; color:#ffffff; background-color:#0070C0;"><a style="font-size:16px; font-weight:normal; color:#ffffff; background-color:#0070C0;" href="<?php echo $row['Website']; ?>" target="_blank"><?php echo $row['Access_Type']; ?></a></td>
					<?php
					}
					?>
					</tr>
					<?php
	}
	?>
    </table></td></tr>
    </table>
    <?php
			}
			else
			{
			$message="Sorry, we can not find an entry to match your search title&nbsp;!<br/><br/>";
			}
		}
	?>
<div align="center"><span class="error" ><?php echo $message; ?></span></div>
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