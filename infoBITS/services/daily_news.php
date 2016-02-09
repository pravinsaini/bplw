<?php
include("../config.php");
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type">
<title>Daily News Service</title>
<link type="image/png" rel="icon" href="../images/fav_32.png">
<link type="text/css" rel="stylesheet" href="../css/reset.css">
<link type="text/css" rel="stylesheet" href="../css/main.css">
<link type="text/css" rel="stylesheet" href="../css/module.css">
<link type="text/css" rel="stylesheet" href="../css/dashboard.css">
<script type="text/javascript" src="../js/jquery-1.4.1.min.js"></script>
<script type="text/javascript" src="../js/metadata.js"></script>
<script type="text/javascript" src="../js/main.js"></script>
<style type="text/css">
.daily_news_date
{
padding:2px;
	width:75%;
    margin: 0;
    -webkit-border-radius:4px;
    -moz-border-radius:4px;
    border-radius:4px; 
	border:1px solid #b3c1ce;
    color:#888;
    outline:none;
    display: inline-block;
}
.text_box
{
padding:4px;
	width:98%;
    margin: 0;
    -webkit-border-radius:4px;
    -moz-border-radius:4px;
    border-radius:4px; 
	border:1px solid #b3c1ce;
    color:#888;
    outline:none;
    display: inline-block;
}
.error {
	color:#FF0000;
	font-size:15px;
	font-weight:normal;
	margin-bottom:2%;
	}
	.searchcolourone {
	color:#FF0000;
	font-size:15px;
	
	}
	.searchcolourtwo {
	color:blue;
	font-size:15px;
	
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
<li><a href="../services/daily_news.php">Daily News</a></li>
</ul>
</div>
</div>
<div class="bannerCarouselWrapper1">
<div class="service_box">
<div class="description">
<table style="border:2px solid #39C; width:800px; height:160px; margin-top:10px;"><tr>
<td style="height:160px; width:180px;"><img src="../images/Daily News.png" style="height:160px; width:160px;"></td>
<td valign="top"><form action="daily_news.php" method="post">
<table style="font-size:16px; color: #211D70; width:100%; margin-top:1%;">
<tr><td>Search By Keywords:</td><td colspan="2" align="left"><input type="text" name="keywords" class="text_box"/></td></tr>
<tr style="line-height:10px;"><td colspan="3">&nbsp;</td></tr>
<tr><td>Search By Date: </td><td>From: <input type="date" name="from_date" class="daily_news_date"/></td><td>To:&nbsp;&nbsp;&nbsp;<input type="date" name="to_date" class="daily_news_date"/></td></tr>
<tr style="line-height:10px;"><td colspan="3">&nbsp;</td></tr>
<tr><td></td><td><input type="submit" name="submit" value="Search" class="Stylish_button"/></td></tr>
<tr style="line-height:10px;"><td colspan="3">&nbsp;</td></tr>
</table>   
</form></td>
</tr>
</table>
<?php
date_default_timezone_set("Etc/UTC");			
$message="";
$msg="";
if(isset($_POST['submit']))
	{
			if (!empty($_POST["keywords"]))
				{
					$keywords = trim($_POST['keywords']);
					$sql = "select * from newsfeed where keywords like '$keywords%'";
					$result = mysql_query($sql);
					$num_rows = mysql_num_rows($result);
					if($result && mysql_num_rows($result)>0)
						{
							// Display the results 
							$search="\"$keywords\"";
							$search = strtoupper($search);
							$Color = "Showing $num_rows Results for &nbsp;"; 
						?>
						<div align="center" height="20px">&nbsp;				
				<table style="width: 65%;">
				<tr>
				<td style="width: 100%;" align="left">
				<span class="searchcolourone"><?php echo $Color;?></span>
				<span class="searchcolourtwo"><?php echo $search;?></span>
				</td>		
				</tr>
				</table>
				</div>
						<?php
							while($news = mysql_fetch_array($result))
							{
								$nn = $bn = $sc = "";
								if($news['news_type']=="bn")
								{
									if($news['url']=="")
									{
									echo '<li><span style="font-size:17px; color:066; ">'.$news['title'].'</span><span style="font-size:13px; color:066; font-style: italic;">,&nbsp;'.$news['newspaper_name'].',&nbsp;'.$news['page'].'p.</span></li>';
									}
									else
									{
									echo '<li><a target="_blank" href="'.$news['url'].'" style="font-size:17px; color:066; ">'.$news['title'].'</a><span style="font-size:13px; color:066; font-style: italic;">,&nbsp;'.$news['newspaper_name'].',&nbsp;'.$news['page'].'p.</span></li>';
									}								
								}
								else
								{
									if($news['url']=="")
									{
									echo '<li><span style="font-size:17px; color:066; ">'.$news['title'].'</span><span style="font-size:13px; color:066; font-style: italic;">,&nbsp;'.$news['newspaper_name'].',&nbsp;'.$news['page'].'p.</span></li>';
									}
									else
									{
									echo '<li><a target="_blank" href="'.$news['url'].'" style="font-size:17px; color:066; ">'.$news['title'].'</a><span style="font-size:13px; color:066; font-style: italic;">,&nbsp;'.$news['newspaper_name'].',&nbsp;'.$news['page'].'p.</span></li>';
									}
								}
							}
						}
						else
						{
							$message="Sorry, we can not find an entry to match your keywords<br/><br/>";
						}
				}
				else if(!empty($_POST["from_date"]) and !empty($_POST["to_date"]))
				{
					$from_date = trim($_POST['from_date']);
					$to_date = trim($_POST['to_date']);
					$sql = "select * from newsfeed where date between '".$from_date."' and '".$to_date."'";
					$result = mysql_query($sql);
					$num_rows = mysql_num_rows($result);
					if($result && mysql_num_rows($result)>0)
						{
							$count = "Showing $num_rows Results&nbsp;"; 
						?>
						<div align="center" height="20px">&nbsp;				
				<table style="width: 65%;">
				<tr>
				<td style="width: 100%;" align="left">
				<span class="searchcolourone"><?php echo $count;?></span>
				</td>		
				</tr>
				</table>
				</div>
						<?php
							while($news = mysql_fetch_array($result))
							{
								$nn = $bn = $sc = "";
								if($news['news_type']=="bn")
								{
									if($news['url']=="")
									{
									echo '<li><span style="font-size:17px; color:066; ">'.$news['title'].'</span><span style="font-size:13px; color:066; font-style: italic;">,&nbsp;'.$news['newspaper_name'].',&nbsp;'.$news['page'].'p.</span></li>';
									}
									else
									{
									echo '<li><a target="_blank" href="'.$news['url'].'" style="font-size:17px; color:066; ">'.$news['title'].'</a><span style="font-size:13px; color:066; font-style: italic;">,&nbsp;'.$news['newspaper_name'].',&nbsp;'.$news['page'].'p.</span></li>';
									}								
								}
								else
								{
									if($news['url']=="")
									{
									echo '<li><span style="font-size:17px; color:066; ">'.$news['title'].'</span><span style="font-size:13px; color:066; font-style: italic;">,&nbsp;'.$news['newspaper_name'].',&nbsp;'.$news['page'].'p.</span></li>';
									}
									else
									{
									echo '<li><a target="_blank" href="'.$news['url'].'" style="font-size:17px; color:066; ">'.$news['title'].'</a><span style="font-size:13px; color:066; font-style: italic;">,&nbsp;'.$news['newspaper_name'].',&nbsp;'.$news['page'].'p.</span></li>';
									}
								}
							}
						}
						else
						{
							$message="Sorry, we can not find an entry to match your selected data<br/><br/>";
						}
				}
				else
				{
					$message="Please enter search keywords or select date.<br/><br/>";
				}					
	}		
	else
	{
	$date = date("d-m-Y");
	$date1 = date("Y-m-d");
?>
<br/>
<p style="font-size:18px; margin-left:1%; font-weight:bold; color:066;"><b><?php echo $date; ?></b></p>
<br/>
<?php
$msg="";
	$nn = $bn = $sc = "";
	$result = mysql_query('select * from newsfeed');
if($result && mysql_num_rows($result)>0)
{
	while($news = mysql_fetch_array($result))
		{
			if($news['date']==$date1)
				{	
					if($news['news_type']=="bn")
					{
									if($news['url']=="")
									{
										if($news['image_path']!="")
										{
										$bn = $bn.'<li><a target="_blank" href="'.$news['image_path'].'" style="font-size:17px; color:066; ">'.$news['title'].'</a><span style="font-size:13px; color:066; font-style: italic;">,&nbsp;'.$news['newspaper_name'].',&nbsp;'.$news['page'].'p.</span></li>';
										}
										else
										{
										$bn = $bn.'<li><span style="font-size:17px; color:066; ">'.$news['title'].'</span><span style="font-size:13px; color:066; font-style: italic;">,&nbsp;'.$news['newspaper_name'].',&nbsp;'.$news['page'].'p.</span></li>'; 
										}
									}
									else
									{
									$bn = $bn.'<li><a target="_blank" href="'.$news['url'].'" style="font-size:17px; color:066; ">'.$news['title'].'</a><span style="font-size:13px; color:066; font-style: italic;">,&nbsp;'.$news['newspaper_name'].',&nbsp;'.$news['page'].'p.</span></li>';
									}
					}
					else
					{
						if($news['url']=="")
									{
										if($news['image_path']!="")
										{
										$nn = $nn.'<li><a target="_blank" href="'.$news['image_path'].'" style="font-size:17px; color:066; ">'.$news['title'].'</a><span style="font-size:13px; color:066; font-style: italic;">,&nbsp;'.$news['newspaper_name'].',&nbsp;'.$news['page'].'p.</span></li>';
										}
										else
										{
										$nn = $nn.'<li><span style="font-size:17px; color:066; ">'.$news['title'].'</span><span style="font-size:13px; color:066; font-style: italic;">,&nbsp;'.$news['newspaper_name'].',&nbsp;'.$news['page'].'p.</span></li>'; 
										}
									}
									else
									{
									$nn = $nn.'<li><a target="_blank" href="'.$news['url'].'" style="font-size:17px; color:066; ">'.$news['title'].'</a><span style="font-size:13px; color:066; font-style: italic;">,&nbsp;'.$news['newspaper_name'].',&nbsp;'.$news['page'].'p.</span></li>';
									}
					}
				}			
		}
?>
<ul style="list-style-type:disc; position:relative; margin-left:3%; margin-bottom:1%; line-height:20px;"><?php echo $nn; ?>
</ul>

<ul style="list-style-type:disc; position:relative; margin-left:3%; margin-bottom:2.5%; line-height:20px;">
<?php 
if($bn!="")
{
$bnh="BITS In News";
echo '<span style="font-size:18px;  font-weight:bold; color:066;">'.$bnh.'</span>'.$bn.''; 
}
?>
</ul>
<?php
}
else
{
  //echo "News not uploaded.";
}
?>

<span><p style="font-size:18px; margin-left:1%; font-weight:bold; color:066; text-decoration:underline;"><b>Last One Week News</b></p></span>
<br/>
<?php
$prev_date = date('d-m-Y', strtotime($date .' -1 day'));
?>
<span><p style="font-size:18px; margin-left:1%; font-weight:bold; color:066;"><b><?php echo $prev_date; ?></b></p></span>				
	<br/>
	<?php
$prev_date1 = date('Y-m-d', strtotime($date .' -1 day'));
	$nn = $bn = $sc = "";
	$result = mysql_query('select * from newsfeed  where date = "'.$prev_date1.'"');
if($result && mysql_num_rows($result)>0)
{
	while($news = mysql_fetch_array($result))
			{
				if($news['news_type']=="bn")
					{
									if($news['url']=="")
									{
										if($news['image_path']!="")
										{
										$bn = $bn.'<li><a target="_blank" href="'.$news['image_path'].'" style="font-size:17px; color:066; ">'.$news['title'].'</a><span style="font-size:13px; color:066; font-style: italic;">,&nbsp;'.$news['newspaper_name'].',&nbsp;'.$news['page'].'p.</span></li>';
										}
										else
										{
										$bn = $bn.'<li><span style="font-size:17px; color:066; ">'.$news['title'].'</span><span style="font-size:13px; color:066; font-style: italic;">,&nbsp;'.$news['newspaper_name'].',&nbsp;'.$news['page'].'p.</span></li>'; 
										}
									}
									else
									{
									$bn = $bn.'<li><a target="_blank" href="'.$news['url'].'" style="font-size:17px; color:066; ">'.$news['title'].'</a><span style="font-size:13px; color:066; font-style: italic;">,&nbsp;'.$news['newspaper_name'].',&nbsp;'.$news['page'].'p.</span></li>';
									}
					}
					else
					{
						if($news['url']=="")
									{
										if($news['image_path']!="")
										{
										$nn = $nn.'<li><a target="_blank" href="'.$news['image_path'].'" style="font-size:17px; color:066; ">'.$news['title'].'</a><span style="font-size:13px; color:066; font-style: italic;">,&nbsp;'.$news['newspaper_name'].',&nbsp;'.$news['page'].'p.</span></li>';
										}
										else
										{
										$nn = $nn.'<li><span style="font-size:17px; color:066; ">'.$news['title'].'</span><span style="font-size:13px; color:066; font-style: italic;">,&nbsp;'.$news['newspaper_name'].',&nbsp;'.$news['page'].'p.</span></li>'; 
										}
									}
									else
									{
									$nn = $nn.'<li><a target="_blank" href="'.$news['url'].'" style="font-size:17px; color:066; ">'.$news['title'].'</a><span style="font-size:13px; color:066; font-style: italic;">,&nbsp;'.$news['newspaper_name'].',&nbsp;'.$news['page'].'p.</span></li>';
									}
					}
			}	
?>
<ul style="list-style-type:disc; position:relative; margin-left:3%; margin-bottom:1%; line-height:20px;"><?php echo $nn; ?>
</ul>
<ul style="list-style-type:disc; position:relative; margin-left:3%; margin-bottom:2.5%; line-height:20px;">
<?php 
if($bn!="")
{
$bnh="BITS In News";
echo '<span style="font-size:18px;  font-weight:bold; color:066;">'.$bnh.'</span>'.$bn.''; 
}
?>
</ul>
<?php
}
else
{
  //echo '<span style="font-size:15px; color:red; margin-left:1%;">News not uploaded.</span>';
}
?>
<?php
$prev_date_2 = date('d-m-Y', strtotime($date .' -2 day'));
?>
<span><p style="font-size:18px; margin-left:1%; font-weight:bold; color:066;"><b><?php echo $prev_date_2; ?></b></p></span>
<br/>
<?php
$prev_date_21 = date('Y-m-d', strtotime($date .' -2 day'));
	$nn = $bn = $sc = "";
	$result = mysql_query('select * from newsfeed  where date = "'.$prev_date_21.'"');
if($result && mysql_num_rows($result)>0)
{
	while($news = mysql_fetch_array($result))
			{
				if($news['news_type']=="bn")
					{
									if($news['url']=="")
									{
										if($news['image_path']!="")
										{
										$bn = $bn.'<li><a target="_blank" href="'.$news['image_path'].'" style="font-size:17px; color:066; ">'.$news['title'].'</a><span style="font-size:13px; color:066; font-style: italic;">,&nbsp;'.$news['newspaper_name'].',&nbsp;'.$news['page'].'p.</span></li>';
										}
										else
										{
										$bn = $bn.'<li><span style="font-size:17px; color:066; ">'.$news['title'].'</span><span style="font-size:13px; color:066; font-style: italic;">,&nbsp;'.$news['newspaper_name'].',&nbsp;'.$news['page'].'p.</span></li>'; 
										}
									}
									else
									{
									$bn = $bn.'<li><a target="_blank" href="'.$news['url'].'" style="font-size:17px; color:066; ">'.$news['title'].'</a><span style="font-size:13px; color:066; font-style: italic;">,&nbsp;'.$news['newspaper_name'].',&nbsp;'.$news['page'].'p.</span></li>';
									}
					}
					else
					{
						if($news['url']=="")
									{
										if($news['image_path']!="")
										{
										$nn = $nn.'<li><a target="_blank" href="'.$news['image_path'].'" style="font-size:17px; color:066; ">'.$news['title'].'</a><span style="font-size:13px; color:066; font-style: italic;">,&nbsp;'.$news['newspaper_name'].',&nbsp;'.$news['page'].'p.</span></li>';
										}
										else
										{
										$nn = $nn.'<li><span style="font-size:17px; color:066; ">'.$news['title'].'</span><span style="font-size:13px; color:066; font-style: italic;">,&nbsp;'.$news['newspaper_name'].',&nbsp;'.$news['page'].'p.</span></li>'; 
										}
									}
									else
									{
									$nn = $nn.'<li><a target="_blank" href="'.$news['url'].'" style="font-size:17px; color:066; ">'.$news['title'].'</a><span style="font-size:13px; color:066; font-style: italic;">,&nbsp;'.$news['newspaper_name'].',&nbsp;'.$news['page'].'p.</span></li>';
									}
					}
			}	
?>
<ul style="list-style-type:disc; position:relative; margin-left:3%; margin-bottom:1%; line-height:20px;"><?php echo $nn; ?>
</ul>
<ul style="list-style-type:disc; position:relative; margin-left:3%; margin-bottom:2.5%; line-height:20px;">
<?php 
if($bn!="")
{
$bnh="BITS In News";
echo '<span style="font-size:18px;  font-weight:bold; color:066;">'.$bnh.'</span>'.$bn.''; 
}
?>
</ul>
<?php
}
else
{
  //echo '<span style="font-size:15px; color:red; margin-left:1%;">News not uploaded.</span>';
}
?>


<?php
$prev_date_3 = date('d-m-Y', strtotime($date .' -3 day'));
?>
<span><p style="font-size:18px; margin-left:1%; font-weight:bold; color:066;"><b><?php echo $prev_date_3; ?></b></p></span>
	<br/>			
	<?php
	$prev_date_31 = date('Y-m-d', strtotime($date .' -3 day'));
	$nn = $bn = $sc = "";
	$result = mysql_query('select * from newsfeed  where date = "'.$prev_date_31.'"');
if($result && mysql_num_rows($result)>0)
{
	while($news = mysql_fetch_array($result))
			{
				if($news['news_type']=="bn")
					{
									if($news['url']=="")
									{
										if($news['image_path']!="")
										{
										$bn = $bn.'<li><a target="_blank" href="'.$news['image_path'].'" style="font-size:17px; color:066; ">'.$news['title'].'</a><span style="font-size:13px; color:066; font-style: italic;">,&nbsp;'.$news['newspaper_name'].',&nbsp;'.$news['page'].'p.</span></li>';
										}
										else
										{
										$bn = $bn.'<li><span style="font-size:17px; color:066; ">'.$news['title'].'</span><span style="font-size:13px; color:066; font-style: italic;">,&nbsp;'.$news['newspaper_name'].',&nbsp;'.$news['page'].'p.</span></li>'; 
										}
									}
									else
									{
									$bn = $bn.'<li><a target="_blank" href="'.$news['url'].'" style="font-size:17px; color:066; ">'.$news['title'].'</a><span style="font-size:13px; color:066; font-style: italic;">,&nbsp;'.$news['newspaper_name'].',&nbsp;'.$news['page'].'p.</span></li>';
									}
					}
					else
					{
						if($news['url']=="")
									{
										if($news['image_path']!="")
										{
										$nn = $nn.'<li><a target="_blank" href="'.$news['image_path'].'" style="font-size:17px; color:066; ">'.$news['title'].'</a><span style="font-size:13px; color:066; font-style: italic;">,&nbsp;'.$news['newspaper_name'].',&nbsp;'.$news['page'].'p.</span></li>';
										}
										else
										{
										$nn = $nn.'<li><span style="font-size:17px; color:066; ">'.$news['title'].'</span><span style="font-size:13px; color:066; font-style: italic;">,&nbsp;'.$news['newspaper_name'].',&nbsp;'.$news['page'].'p.</span></li>'; 
										}
									}
									else
									{
									$nn = $nn.'<li><a target="_blank" href="'.$news['url'].'" style="font-size:17px; color:066; ">'.$news['title'].'</a><span style="font-size:13px; color:066; font-style: italic;">,&nbsp;'.$news['newspaper_name'].',&nbsp;'.$news['page'].'p.</span></li>';
									}
					}
			}	
?>
<ul style="list-style-type:disc; position:relative; margin-left:3%; margin-bottom:1%; line-height:20px;"><?php echo $nn; ?>
</ul>
<ul style="list-style-type:disc; position:relative; margin-left:3%; margin-bottom:2.5%; line-height:20px;">
<?php 
if($bn!="")
{
$bnh="BITS In News";
echo '<span style="font-size:18px;  font-weight:bold; color:066;">'.$bnh.'</span>'.$bn.''; 
}
?>
</ul>
<?php
}
else
{
  //echo '<span style="font-size:15px; color:red; margin-left:1%;">News not uploaded.</span>';
}
?>

<?php
$prev_date_4 = date('d-m-Y', strtotime($date .' -4 day'));
?>
<span><p style="font-size:18px; margin-left:1%; font-weight:bold; color:066;"><b><?php echo $prev_date_4; ?></b></p></span>
	<br/>			
	<?php
	$prev_date_41 = date('Y-m-d', strtotime($date .' -4 day'));
	$nn = $bn = $sc = "";
	$result = mysql_query('select * from newsfeed  where date = "'.$prev_date_41.'"');
if($result && mysql_num_rows($result)>0)
{
	while($news = mysql_fetch_array($result))
			{
				if($news['news_type']=="bn")
					{
									if($news['url']=="")
									{
										if($news['image_path']!="")
										{
										$bn = $bn.'<li><a target="_blank" href="'.$news['image_path'].'" style="font-size:17px; color:066; ">'.$news['title'].'</a><span style="font-size:13px; color:066; font-style: italic;">,&nbsp;'.$news['newspaper_name'].',&nbsp;'.$news['page'].'p.</span></li>';
										}
										else
										{
										$bn = $bn.'<li><span style="font-size:17px; color:066; ">'.$news['title'].'</span><span style="font-size:13px; color:066; font-style: italic;">,&nbsp;'.$news['newspaper_name'].',&nbsp;'.$news['page'].'p.</span></li>'; 
										}
									}
									else
									{
									$bn = $bn.'<li><a target="_blank" href="'.$news['url'].'" style="font-size:17px; color:066; ">'.$news['title'].'</a><span style="font-size:13px; color:066; font-style: italic;">,&nbsp;'.$news['newspaper_name'].',&nbsp;'.$news['page'].'p.</span></li>';
									}
					}
					else
					{
						if($news['url']=="")
									{
										if($news['image_path']!="")
										{
										$nn = $nn.'<li><a target="_blank" href="'.$news['image_path'].'" style="font-size:17px; color:066; ">'.$news['title'].'</a><span style="font-size:13px; color:066; font-style: italic;">,&nbsp;'.$news['newspaper_name'].',&nbsp;'.$news['page'].'p.</span></li>';
										}
										else
										{
										$nn = $nn.'<li><span style="font-size:17px; color:066; ">'.$news['title'].'</span><span style="font-size:13px; color:066; font-style: italic;">,&nbsp;'.$news['newspaper_name'].',&nbsp;'.$news['page'].'p.</span></li>'; 
										}
									}
									else
									{
									$nn = $nn.'<li><a target="_blank" href="'.$news['url'].'" style="font-size:17px; color:066; ">'.$news['title'].'</a><span style="font-size:13px; color:066; font-style: italic;">,&nbsp;'.$news['newspaper_name'].',&nbsp;'.$news['page'].'p.</span></li>';
									}
					}
			}	
?>
<ul style="list-style-type:disc; position:relative; margin-left:3%; margin-bottom:1%; line-height:20px;"><?php echo $nn; ?>
</ul>
<ul style="list-style-type:disc; position:relative; margin-left:3%; margin-bottom:2.5%; line-height:20px;">
<?php 
if($bn!="")
{
$bnh="BITS In News";
echo '<span style="font-size:18px;  font-weight:bold; color:066;">'.$bnh.'</span>'.$bn.''; 
}
?>
</ul>
<?php
}
else
{
  //echo '<span style="font-size:15px; color:red; margin-left:1%;">News not uploaded.</span>';
}
?>

<?php
$prev_date_5 = date('d-m-Y', strtotime($date .' -5 day'));
?>
<span><p style="font-size:18px; margin-left:1%; font-weight:bold; color:066;"><b><?php echo $prev_date_5; ?></b></p></span>
	<br/>			
	<?php
$prev_date_51 = date('Y-m-d', strtotime($date .' -5 day'));
	$nn = $bn = $sc = "";
	$result = mysql_query('select * from newsfeed  where date = "'.$prev_date_51.'"');
if($result && mysql_num_rows($result)>0)
{
	while($news = mysql_fetch_array($result))
			{
				if($news['news_type']=="bn")
					{
									if($news['url']=="")
									{
										if($news['image_path']!="")
										{
										$bn = $bn.'<li><a target="_blank" href="'.$news['image_path'].'" style="font-size:17px; color:066; ">'.$news['title'].'</a><span style="font-size:13px; color:066; font-style: italic;">,&nbsp;'.$news['newspaper_name'].',&nbsp;'.$news['page'].'p.</span></li>';
										}
										else
										{
										$bn = $bn.'<li><span style="font-size:17px; color:066; ">'.$news['title'].'</span><span style="font-size:13px; color:066; font-style: italic;">,&nbsp;'.$news['newspaper_name'].',&nbsp;'.$news['page'].'p.</span></li>'; 
										}
									}
									else
									{
									$bn = $bn.'<li><a target="_blank" href="'.$news['url'].'" style="font-size:17px; color:066; ">'.$news['title'].'</a><span style="font-size:13px; color:066; font-style: italic;">,&nbsp;'.$news['newspaper_name'].',&nbsp;'.$news['page'].'p.</span></li>';
									}
					}
					else
					{
						if($news['url']=="")
									{
										if($news['image_path']!="")
										{
										$nn = $nn.'<li><a target="_blank" href="'.$news['image_path'].'" style="font-size:17px; color:066; ">'.$news['title'].'</a><span style="font-size:13px; color:066; font-style: italic;">,&nbsp;'.$news['newspaper_name'].',&nbsp;'.$news['page'].'p.</span></li>';
										}
										else
										{
										$nn = $nn.'<li><span style="font-size:17px; color:066; ">'.$news['title'].'</span><span style="font-size:13px; color:066; font-style: italic;">,&nbsp;'.$news['newspaper_name'].',&nbsp;'.$news['page'].'p.</span></li>'; 
										}
									}
									else
									{
									$nn = $nn.'<li><a target="_blank" href="'.$news['url'].'" style="font-size:17px; color:066; ">'.$news['title'].'</a><span style="font-size:13px; color:066; font-style: italic;">,&nbsp;'.$news['newspaper_name'].',&nbsp;'.$news['page'].'p.</span></li>';
									}
					}
			}	
?>
<ul style="list-style-type:disc; position:relative; margin-left:3%; margin-bottom:1%; line-height:20px;"><?php echo $nn; ?>
</ul>
<ul style="list-style-type:disc; position:relative; margin-left:3%; margin-bottom:2.5%; line-height:20px;">
<?php 
if($bn!="")
{
$bnh="BITS In News";
echo '<span style="font-size:18px;  font-weight:bold; color:066;">'.$bnh.'</span>'.$bn.''; 
}
?>
</ul>
<?php
}
else
{
  //echo '<span style="font-size:15px; color:red; margin-left:1%;">News not uploaded.</span>';
}
?>
<?php
$prev_date_6 = date('d-m-Y', strtotime($date .' -6 day'));
?>
<span><p style="font-size:18px; margin-left:1%; font-weight:bold; color:066;"><b><?php echo $prev_date_6; ?></b></p></span>
	<br/>			
	<?php
$prev_date_61 = date('Y-m-d', strtotime($date .' -6 day'));
	$nn = $bn = $sc = "";
	$result = mysql_query('select * from newsfeed  where date = "'.$prev_date_61.'"');
if($result && mysql_num_rows($result)>0)
{
	while($news = mysql_fetch_array($result))
			{
				if($news['news_type']=="bn")
					{
									if($news['url']=="")
									{
										if($news['image_path']!="")
										{
										$bn = $bn.'<li><a target="_blank" href="'.$news['image_path'].'" style="font-size:17px; color:066; ">'.$news['title'].'</a><span style="font-size:13px; color:066; font-style: italic;">,&nbsp;'.$news['newspaper_name'].',&nbsp;'.$news['page'].'p.</span></li>';
										}
										else
										{
										$bn = $bn.'<li><span style="font-size:17px; color:066; ">'.$news['title'].'</span><span style="font-size:13px; color:066; font-style: italic;">,&nbsp;'.$news['newspaper_name'].',&nbsp;'.$news['page'].'p.</span></li>'; 
										}
									}
									else
									{
									$bn = $bn.'<li><a target="_blank" href="'.$news['url'].'" style="font-size:17px; color:066; ">'.$news['title'].'</a><span style="font-size:13px; color:066; font-style: italic;">,&nbsp;'.$news['newspaper_name'].',&nbsp;'.$news['page'].'p.</span></li>';
									}
					}
					else
					{
						if($news['url']=="")
									{
										if($news['image_path']!="")
										{
										$nn = $nn.'<li><a target="_blank" href="'.$news['image_path'].'" style="font-size:17px; color:066; ">'.$news['title'].'</a><span style="font-size:13px; color:066; font-style: italic;">,&nbsp;'.$news['newspaper_name'].',&nbsp;'.$news['page'].'p.</span></li>';
										}
										else
										{
										$nn = $nn.'<li><span style="font-size:17px; color:066; ">'.$news['title'].'</span><span style="font-size:13px; color:066; font-style: italic;">,&nbsp;'.$news['newspaper_name'].',&nbsp;'.$news['page'].'p.</span></li>'; 
										}
									}
									else
									{
									$nn = $nn.'<li><a target="_blank" href="'.$news['url'].'" style="font-size:17px; color:066; ">'.$news['title'].'</a><span style="font-size:13px; color:066; font-style: italic;">,&nbsp;'.$news['newspaper_name'].',&nbsp;'.$news['page'].'p.</span></li>';
									}
					}
			}	
?>
<ul style="list-style-type:disc; position:relative; margin-left:3%; margin-bottom:1%; line-height:20px;"><?php echo $nn; ?>
</ul>
<ul style="list-style-type:disc; position:relative; margin-left:3%; margin-bottom:2.5%; line-height:20px;">
<?php 
if($bn!="")
{
$bnh="BITS In News";
echo '<span style="font-size:18px;  font-weight:bold; color:066;">'.$bnh.'</span>'.$bn.''; 
}
?>
</ul>
<?php
}
else
{
  //echo '<span style="font-size:15px; color:red; margin-left:1%;">News not uploaded.</span>';
}
?>

<?php
$prev_date_7 = date('d-m-Y', strtotime($date .' -7 day'));
?>
<span><p style="font-size:18px; margin-left:1%; font-weight:bold; color:066;"><b><?php echo $prev_date_7; ?></b></p></span>
	<br/>			
	<?php

	$prev_date_71 = date('Y-m-d', strtotime($date .' -7 day'));
	$nn = $bn = $sc = "";
	$result = mysql_query('select * from newsfeed  where date = "'.$prev_date_71.'"');
if($result && mysql_num_rows($result)>0)
{
	while($news = mysql_fetch_array($result))
			{
			if($news['news_type']=="bn")
					{
									if($news['url']=="")
									{
										if($news['image_path']!="")
										{
										$bn = $bn.'<li><a target="_blank" href="'.$news['image_path'].'" style="font-size:17px; color:066; ">'.$news['title'].'</a><span style="font-size:13px; color:066; font-style: italic;">,&nbsp;'.$news['newspaper_name'].',&nbsp;'.$news['page'].'p.</span></li>';
										}
										else
										{
										$bn = $bn.'<li><span style="font-size:17px; color:066; ">'.$news['title'].'</span><span style="font-size:13px; color:066; font-style: italic;">,&nbsp;'.$news['newspaper_name'].',&nbsp;'.$news['page'].'p.</span></li>'; 
										}
									}
									else
									{
									$bn = $bn.'<li><a target="_blank" href="'.$news['url'].'" style="font-size:17px; color:066; ">'.$news['title'].'</a><span style="font-size:13px; color:066; font-style: italic;">,&nbsp;'.$news['newspaper_name'].',&nbsp;'.$news['page'].'p.</span></li>';
									}
					}
					else
					{
						if($news['url']=="")
									{
										if($news['image_path']!="")
										{
										$nn = $nn.'<li><a target="_blank" href="'.$news['image_path'].'" style="font-size:17px; color:066; ">'.$news['title'].'</a><span style="font-size:13px; color:066; font-style: italic;">,&nbsp;'.$news['newspaper_name'].',&nbsp;'.$news['page'].'p.</span></li>';
										}
										else
										{
										$nn = $nn.'<li><span style="font-size:17px; color:066; ">'.$news['title'].'</span><span style="font-size:13px; color:066; font-style: italic;">,&nbsp;'.$news['newspaper_name'].',&nbsp;'.$news['page'].'p.</span></li>'; 
										}
									}
									else
									{
									$nn = $nn.'<li><a target="_blank" href="'.$news['url'].'" style="font-size:17px; color:066; ">'.$news['title'].'</a><span style="font-size:13px; color:066; font-style: italic;">,&nbsp;'.$news['newspaper_name'].',&nbsp;'.$news['page'].'p.</span></li>';
									}
					}
			}	
?>
<ul style="list-style-type:disc; position:relative; margin-left:3%; margin-bottom:1%; line-height:20px;"><?php echo $nn; ?>
</ul>
<ul style="list-style-type:disc; position:relative; margin-left:3%; margin-bottom:2.5%; line-height:20px;">
<?php 
if($bn!="")
{
$bnh="BITS In News";
echo '<span style="font-size:18px;  font-weight:bold; color:066;">'.$bnh.'</span>'.$bn.''; 
}
?>
</ul>
<?php
}
else
{
  //echo '<span style="font-size:15px; color:red; margin-left:1%;">News not uploaded.</span>';
}
?>
<?php
}
?>
<br/>
<table cellpadding="0" cellspacing="0" align="center" style="width:65%"><tr><td><span class="error"><?php echo $message;?></span></td></tr>
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