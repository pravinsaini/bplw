<?php
include("../config.php");
$message = "";
if(isset($_SESSION['bitsid'])){
	$userinfo = mysql_fetch_array(mysql_query('select * from users where bitsid="'.$_SESSION['bitsid'].'"'));
	 if($userinfo['confirm']!=1){
        header("location: ../index.php");
    }
	else
	{
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type">
<title>Dashboard - <?php echo $userinfo['name']; ?></title>
<link type="image/png" rel="icon" href="../images/fav_32.png">
<link type="text/css" rel="stylesheet" href="../css/reset.css">
<link type="text/css" rel="stylesheet" href="../css/main.css">
<link type="text/css" rel="stylesheet" href="../css/dashboard.css">
<link type="text/css" rel="stylesheet" href="../css/module.css">
<link type="text/css" rel="stylesheet" href="../css/menu.css">
<script type="text/javascript" src="../js/jquery-1.4.1.min.js"></script>
<script type="text/javascript" src="../js/metadata.js"></script>
<script type="text/javascript" src="../js/main.js"></script>
<script type="text/javascript" src="../js/jquery.idTabs.min.js"></script>
<script type="text/javascript" src="../js/jssor.slider.min.js"></script>
<style type="text/css">
.archive {
	width: 37%;
	display: block;
	text-align: right;
	position: absolute;
	font-family: Arial, Helvetica, sans-serif;	
	background:#000; 
	opacity:0.8; 
	height:auto;
	padding:4px;
	position:relative;
	margin-top:-25px;
	color:#FFFFFF;
	font-weight:bold;	
} 
.bannerCarouselWrapper1 .one_search_box{
	width:98%;
	position:relative;
	border: 1px solid #ABABAB;
	overflow:hidden;
	float:left;
	background:#fff;
	height:auto;
	margin-bottom:1%;
}
.bannerCarouselWrapper1 .notice_scrolling {
	width:98%;
	position:relative;
	border: 1px solid #ABABAB;
	overflow:hidden;
	float:right;
	background:#fff;
	height:auto;
	margin-bottom:1%;
}

.button5{
width:300px;
height:70px;
border:none;
outline:none;
box-shadow:-5px 5px 5px 0 #8aa7fb;
color:#fff;
font-size:30px;
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
width:300px;
height:70px;
margin-left:20px;
}
</style>
<script>
        jssor_1_slider_init = function() {
            
            var jssor_1_options = {
              $AutoPlay: false,
              $SlideWidth: 800,           
              $ArrowNavigatorOptions: {
                $Class: $JssorArrowNavigator$
              },
              $BulletNavigatorOptions: {
                $Class: $JssorBulletNavigator$
              }
            };
            
            var jssor_1_slider = new $JssorSlider$("jssor_1", jssor_1_options);
            
            //responsive code begin
            //you can remove responsive code if you don't want the slider scales while window resizing
            function ScaleSlider() {
                var refSize = jssor_1_slider.$Elmt.parentNode.clientWidth;
                if (refSize) {
                    refSize = Math.min(refSize, 800);
                    jssor_1_slider.$ScaleWidth(refSize);
                }
                else {
                    window.setTimeout(ScaleSlider, 30);
                }
            }
            ScaleSlider();
            $Jssor$.$AddEvent(window, "load", ScaleSlider);
            $Jssor$.$AddEvent(window, "resize", $Jssor$.$WindowResizeFilter(window, ScaleSlider));
            $Jssor$.$AddEvent(window, "orientationchange", ScaleSlider);
            //responsive code end
        };
    </script>

    <style>
        
        /* jssor slider bullet navigator skin 01 css */
        /*
        .jssorb01 div           (normal)
        .jssorb01 div:hover     (normal mouseover)
        .jssorb01 .av           (active)
        .jssorb01 .av:hover     (active mouseover)
        .jssorb01 .dn           (mousedown)
        */
        .jssorb01 {
            position: absolute;
        }
        .jssorb01 div, .jssorb01 div:hover, .jssorb01 .av {
            position: absolute;
            /* size of bullet elment */
            width: 12px;
            height: 12px;
            filter: alpha(opacity=70);
            opacity: .7;
            overflow: hidden;
            cursor: pointer;
            border: #000 1px solid;
        }
        .jssorb01 div { background-color: gray; }
        .jssorb01 div:hover, .jssorb01 .av:hover { background-color: #d3d3d3; }
        .jssorb01 .av { background-color: #fff; }
        .jssorb01 .dn, .jssorb01 .dn:hover { background-color: #555555; }

        /* jssor slider arrow navigator skin 13 css */
        /*
        .jssora13l                  (normal)
        .jssora13r                  (normal)
        .jssora13l:hover            (normal mouseover)
        .jssora13r:hover            (normal mouseover)
        .jssora13l.jssora13ldn      (mousedown)
        .jssora13r.jssora13rdn      (mousedown)
        */
        .jssora13l, .jssora13r {
            display: block;
            position: absolute;
            /* size of arrow element */
            width: 40px;
            height: 50px;
            cursor: pointer;
            background: url('../images/a13.png') no-repeat;
            overflow: hidden;
        }
        .jssora13l { background-position: -10px -35px; }
        .jssora13r { background-position: -70px -35px; }
        .jssora13l:hover { background-position: -130px -35px; }
        .jssora13r:hover { background-position: -190px -35px; }
        .jssora13l.jssora13ldn { background-position: -250px -35px; }
        .jssora13r.jssora13rdn { background-position: -310px -35px; }
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
<a href="../library_committee_members.php">Library Committee Members</a>
</li>
<li>
<a href="../library_staff.php">Library Staff</a>
</li>
<li>
<a href="../library_floor.php">Library Floor</a>
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
</ul>
</div>
</div>
<div class="bannerCarouselWrapper1">
<div class="dashboard_box">
<div class="dashboard_box_left_panel">
<div class="one_search_box">
<iframe src="http://imageserver.ebscohost.com/branding/testkm/bitspilani/bitspilanisearch_new.html" width="100%" height="300px"></iframe>
</div>
<div class="LibServices">
<table align="left" cellpadding="0" cellspacing="0" style="width:97%;"><tr><td align="left" style="width:310px;">
<div id='cssmenu1' align="left">                                                           
<ul>
<li>
<a href="library_services.php">
<img src="../images/Library Services.jpg" style="width: 125px; height:110px;"/></a>
<ul>
<li><a href="library_services.php"><img src="../images/library_services.png" style="width: 280px; height:160px; position:absolute; vertical-align:middle;"/></a></li>
</ul>
</li>
</ul>
</div>
</td>
<td align="right">
<div id='cssmenu2' align="right">                                                           
<ul>
<li>
<a href="library_resources.php">
<img src="../images/Library Resources.jpg" style="width: 120px; height:110px;"/></a>
<ul>
<li><a href="library_resources.php"><img src="../images/library_resources.png" style="width: 280px; height:160px; position:absolute; vertical-align:middle;"/></a></li>
</ul>
</li>
</ul>
</div>
</td></tr>
</table>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
</div>
<?php if(isset($_SESSION['bitsid'])){
    $userinfo = mysql_fetch_array(mysql_query('select * from users where bitsid="'.$_SESSION['bitsid'].'"'));
	if($userinfo['category']=="Admin" )
	{
?>
<div class="dcomms">
<div class="heading">
<h2><span>Communications</span> Panel</h2>
</div>
<div class="dshowCase">
<span align="center" style="font-size:14px; font-weight:bold;"><br/><br/><br/><br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Go to admin Dashboard to view your communication panel<br/><br/><br/><br/><br/><br/><br/></span>
</div>
</div>
<?php
	}
	else
	{
?>
<div class="dcomms">
<div class="heading">
<h2><span>Communications</span> Panel</h2>
</div>
<div class="dshowCase">
<script>
$(document).ready(function(e) {
    $.ajax({
		url:"../administrator/comms.php?start="+0,
		success: function(response){
			$(".dshowCase").html(response);
			noSim = 0;
		}
	})
});
</script>
</div>
</div>
<?php
	}
}
?>
<div class="faculty_publication_box">
<div class="heading">
<h2><span>Recent </span>Faculty Publications</h2>
</div>
<div class="faculty_publication">
<?php
$query = "SELECT * FROM `faculty_publication` ORDER BY id DESC LIMIT 2";
$query_run = mysql_query($query);

while($query_row = mysql_fetch_assoc($query_run))
{
	$heading = $query_row['heading'];
	$sub_heading = $query_row['sub_heading'];
	$url = $query_row['link'];

	echo '<a href='.$url.' target=_blank><table><tr><td><img src="../images/list_style_type_icon.png" style="width:12px; height:12px; vertical-align:middle;"/></td><td><h2 style="color:#211D70; font-family:Gotham, \'Helvetica Neue\', Helvetica, Arial, sans-serif; font-size:13px; font-weight:bold;">'.$heading. '</h2></td></tr></table></a><br>
<h2 style="color:#211D70; font-family:Gotham, \'Helvetica Neue\', Helvetica, Arial, sans-serif; font-size:1.2em; font-style: italic;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$sub_heading.'</h2><br><hr/>';
}
?>

<div class="read_more_box">
                                <a target="_blank" href="http://eprints.bits-pilani.ac.in/cgi/latest/" class="read_more">show more</a>
</div>
</div>
</div>
</div>
<div class="dashboard_box_right_panel">
<div class="notice_scrolling">
<?php
$result = mysql_fetch_array(mysql_query('SELECT * FROM `book_of_the_month_main` ORDER BY id DESC LIMIT 1'));
?>
<div id="jssor_1" style="position: relative; margin: 0 auto; top: 0px; left: 0px; width: 800px; height: 450px; overflow: hidden; visibility: hidden;">
        <!-- Loading Screen -->
        <div data-u="loading" style="position: absolute; top: 0px; left: 0px;">
            <div style="filter: alpha(opacity=70); opacity: 0.7; position: absolute; display: block; top: 0px; left: 0px; width: 100%; height: 100%;"></div>
            <div style="position:absolute;display:block;background:url('../images/loading.gif') no-repeat center center;top:0px;left:0px;width:100%;height:100%;"></div>
        </div>
        <div data-u="slides" style="cursor: default; position: relative; top: 0px; left: 0px; width: 800px; height: 450px; overflow: hidden;">
            <div data-p="112.50" style="display: none;">
                <table align="left">
<tr><td valign="top"><?php echo '<img src="../uploads/book_of_the_month/'.$result["book_image_path"].'" width="350" height="400" alt="book_of_the_month" style="border:1px solid black;" />'; ?>
</td>
<td align="center" valign="top"><br/><br/><br/>&nbsp;&nbsp;&nbsp;&nbsp;<img src="../images/book_of_the_month.png" style="width:250px; height:180px;">
<br/>
<br/>
<div align="center"><a href="../services/book_of_the_month.php">
<div class="btn">
<input class="button5" type="submit" name="submit" value="Reserve Now">
</div>
</a></div>
</td>
</tr></table>
            </div>
            <div data-p="112.50" style="display: none;">
                <a href="../services/daily_news.php">
<img src="../images/daily_news_3_11_2015.png" style="vertical-align:top; width:90%;">
<br/>
<?php
$query = 'SELECT * FROM `newsfeed` ORDER BY id DESC LIMIT 3';
$query_run = mysql_query($query);

while($query_row = mysql_fetch_assoc($query_run))
{
	$title = $query_row['title'];
	$newspaper_name = $query_row['newspaper_name'];	
	$page = $query_row['page'];
	echo '<table><tr><td><img src="../images/list_style_type_icon.png" style="width:24px; height:24px; vertical-align:top;"/></td><td><span style="color:#211d70; text-align:justify; font-family:Gotham, \'Helvetica Neue\', Helvetica, Arial, sans-serif; font-size:30px;">'.$title.',&nbsp;<span style="font-size:30px; color:066; font-style: italic;">'.$newspaper_name.','.$page.'p.</span></span></td></tr></table><br>';
}
?>
</a>
            </div>
<?php if(isset($_SESSION['bitsid'])){
    $userinfo = mysql_fetch_array(mysql_query('select * from users where bitsid="'.$_SESSION['bitsid'].'"'));
	if($userinfo['category']=="Student" || $userinfo['category']=="Research Scholar")
	{
?>			
<div data-p="112.50" style="display: none;">               
<img data-u="image" src="../uploads/notices/images/InfoBITS_bulletin.jpg" width="100%" height="100%"/>
</div>
<?php
	}
	else if($userinfo['category']=="Faculty/Staff")
	{
	?>
<div data-p="112.50" style="display: none;">        
<img data-u="image" src="../uploads/notices/images/Books@MyDesk.jpg" width="100%" height="100%"/>
</div>
<?php 
	}
	else
	{
	?>
<div data-p="112.50" style="display: none;">
<img data-u="image" src="../uploads/notices/images/InfoBITS_bulletin.jpg" width="100%" height="100%"/>
</div>
<div data-p="112.50" style="display: none;">
<img data-u="image" src="../uploads/notices/images/Books@MyDesk.jpg" width="100%" height="100%"/>
</div>
<?php 
	}
}	
?>
        </div>
        <!-- Bullet Navigator -->
        <div data-u="navigator" class="jssorb01" style="bottom:16px;right:16px;" data-autocenter="1">
            <div data-u="prototype" style="width:12px;height:12px;"></div>
        </div>
        <!-- Arrow Navigator -->
        <span data-u="arrowleft" class="jssora13l" style="top:0px;left:30px;width:40px;height:50px;" data-autocenter="2"></span>
        <span data-u="arrowright" class="jssora13r" style="top:0px;right:30px;width:40px;height:50px;" data-autocenter="2"></span>
    </div>
    <script>
        jssor_1_slider_init();
    </script>
</div>
<div class="bookreview" style="background-color:#D8D8D8; color:#000000">
<div class="book_review_innerbox" style="background-color:#D8D8D8; color:#000000">
<div class="heading" style="background-color:#D8D8D8; color:#000000; border:none;">
<h2 style="background-color:#D8D8D8; color:#000000"><span style="background-color:#D8D8D8; color:#000000"> I just </span>read this book!</h2>
</div>
<?php 
	$review = mysql_fetch_array(mysql_query('select * from bookreview ORDER BY id DESC'));
	if($review>0){
?>
<div class="cover_review_box" style="background-color:#D8D8D8; color:#000000">
<table style="background-color:#D8D8D8; color:#000000">
<tr>
<td colspan="2" valign="top"><b>Title: <?php echo $review['title']; ?><br/>
Author: <?php echo $review['author']; ?></b></td>
</tr>
<tr>
<td valign="top"><div class="review"><?php echo $review['review']; ?></div></td>
<td valign="top"><img src="../uploads/bookreview/<?php echo $review['cover']; ?>" width="120px" height="150px" /></td>
</tr>
<tr>
<td colspan="2">
<table><tr>
<td valign="top"><img src="../uploads/bookreview/<?php echo $review['avatar']; ?>" width="100px" height="100px"></td>
<td valign="top">
<table style="font-size:14px; font-weight:bold; background-color:#D8D8D8; color:#000000"><tr><td><br/>
<?php echo $review['name']; ?><br>
<?php echo $review['bitsid']; ?><br/>
<a style="color:#FFFFFF;" href="<?php echo $review['link']; ?>" target="_blank" class="read_more_box read_more">Would you like to Reserve ?<br/>Click Here & press "Place hold"</a>
</td>
<td></td>
</tr></table>
</td>
</tr></table>
</td>
</tr>
</table>
</div>
<?php
	}
?>
</div>
</div>
<div class="pegasus_matrix_box">
<div id="usual1" class="usual"> 
  <ul> 
    <li><a href="#tab1" class="selected">Poetry Club</a></li> 
    <li><a href="#tab2">Matrix Club</a></li> 
  </ul> 
  <div class="tab">
  <?php 
  $Pegasus_club = mysql_fetch_array(mysql_query("select * from creative_club where club_name='Pegasus' ORDER BY id DESC"));
  $Matrix_club = mysql_fetch_array(mysql_query("select * from creative_club where club_name='Matrix' ORDER BY id DESC")); 
?>
<div id="tab1">
<img src="../uploads/creativeclub/poetry_club/<?php echo $Pegasus_club['image']; ?>" width="100%" height="auto"/>
<div align="right">
<span class="archive"><a href="count.php?poetry_club=../services/poetry_club_archive.php" name="poetry_club" id="poetry_club" Style="color:#FFFFFF; font-weight:bold;">Poetry Club Archive</a></span>
</div>
</div> 
  <div id="tab2">
<img src="../uploads/creativeclub/matrix_club/<?php echo $Matrix_club['image']; ?>" width="100%" height="auto"/>
<div align="right">
<span class="archive"><a href="count.php?matrix_club=../services/matrix_club_archive.php" name="matrix_club" id="matrix_club" Style="color:#FFFFFF; font-weight:bold;">Matrix Club Archive</a></span>
</div>
  </div> 
  </div>
</div> 
<script type="text/javascript"> 
  $("#usual1 ul").idTabs(); 
</script>
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
}
else{
	header("Location: ../index.php");
}
?>