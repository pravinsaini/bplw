<head>
<style type="text/css">
.book_type
{
background-color :#4a9ace;
color: #FFFFFF;
font-weight: bold;
width:70px;
border-radius: 3px; 
}
.Journal_type
{
background-color :#4a9ace;
color: #FFFFFF;
font-weight: bold;
width:90px;
border-radius: 3px; 
}
</style>
</head>
<?php
	include("../config.php");
	
	date_default_timezone_set("Etc/UTC");
$date1= date('m/d/Y');
$timestamp1 = strtotime('+1 month');
//$formattedDate1 = date('F', $timestamp1);
$formattedDate1 = 'January';

$date3= date('m/d/Y');
$timestamp3 = strtotime("$date3");
//$formattedDate3 = date('Y', $timestamp3);
$formattedDate3 = 2016;

	if(isset($_GET['disp'])){
		$disp = $_GET['disp'];
		$result = mysql_fetch_array(mysql_query('select * from bulletin where code="'.$disp.'" and Month="'.$formattedDate1.'" and Year="'.$formattedDate3.'"'));
		echo '<div class="description"><div style="padding-bottom:2%; height:auto;">
<table><tr>
<td valign="top" style="width:14%; float:left;"><img src="../images/info.png"></td>
<td valign="top">
<table style="width:100%;">
<tr>
<td valign="top" align="left"><span  style="font-family:Constantia, \'Lucida Bright\', \'DejaVu Serif\', Georgia, serif; font-size:14px; color:#211D70; text-align: justify;"><b>Vol.&nbsp;'.$result["volume_number"].',&nbsp;Issue No.&nbsp;'.$result["issue_number"].'<b></span></td>
<td valign="top" align="Center"><span  style="font-family:Constantia, \'Lucida Bright\', \'DejaVu Serif\', Georgia, serif; font-size:25px; color:#211D70; text-align: justify;"><b>Info BITS Bulletin<b></span></td>
<td valign="top" align="Right"><span  style="font-family:Constantia, \'Lucida Bright\', \'DejaVu Serif\', Georgia, serif; font-size:14px; color:#211D70; text-align: justify;"><b>'.$result["Month"].',&nbsp;'.$result["Year"].'<b></span></td>
</tr>
</table>
<hr/>
<span style="font-family:Constantia, \'Lucida Bright\', \'DejaVu Serif\', Georgia, serif; font-size:19px; color:#211D70; text-align: justify; font-weight:normal">The BITS library brings out 13 infoBITS Bulletins every month covering all the subjects in which the courses are conducted at BITS Pilani with an objective of providing up-to- date information on new arrivals in the library, latest articles that are published in the national and international journals by providing their table of contents, News and Developments that are published in leading newspapers and also latest audio visual material added to our collection on a monthly basis.</span></h2>
<div align="center"><span  style="font-family:Constantia, \'Lucida Bright\', \'DejaVu Serif\', Georgia, serif; font-size:19.5px; color:#211D70; text-align: justify;"><b>InfoBITS Bulletins keep you Ahead!<b></span></div></td>
<td valign="top" style="width:15%; float:right;"><img src="../images/archive.png">
<p style="position:relative; top:5px; font-size:19px;">
<div align="left"><span  style="font-family:Constantia, \'Lucida Bright\', \'DejaVu Serif\', Georgia, serif; font-size:19px; color:red; text-align: justify; position:relative; top:-130px; left:15%;"><b>'.$result['name'].' <b></span></div>
</p></td></tr></table>
</div>	
<div align="center" style="font-family:Constantia, \'Lucida Bright\', \'DejaVu Serif\', Georgia, serif; font-size:24px; color:#06F; font-weight:bold">New Books<br/><br/></div>
		
<div align="center" style="position:relative; z-index: 9; width:100%;">
<a href='.$result['url1'].' target=_blank>
<img src="../uploads/bulletin/'.$disp.'/'.$result["pic1"].'" width="155" height="193" alt="Book1" /></a>
<a href='.$result['url2'].' target=_blank>
<img src="../uploads/bulletin/'.$disp.'/'.$result["pic2"].'" width="155" height="193" alt="Book2" style="margin-left:50px;"/></a>
<a href='.$result['url3'].' target=_blank>
<img src="../uploads/bulletin/'.$disp.'/'.$result["pic3"].'" width="155" height="193" alt="Book3" style="margin-left:50px;"/></a>
<a href='.$result['url4'].' target=_blank>
<img src="../uploads/bulletin/'.$disp.'/'.$result["pic4"].'" width="155" height="193" alt="Book4" style="margin-left:50px;"/></a>
</div>
<div align="center">		
<img src="../images/banner.jpg" alt="shelf" style="position:relative; margin-top:-212px; margin-bottom:10px; width:920px; height:220px;">
</div>
<div align="center">		
<div id="t1" style="position:relative; width:18%; height:auto; vertical-align:top;">
<div align="center"><p class="book_type">'.$result['book_type_one'].'</p></div>
<a href='.$result['url1'].' target=_blank>
<p style="font-size:13px; color:#333;"><b style="color:#211D70">'.$result['title1'].'</b></p></a>
<p style="font-size:13px; color:#333;">By : <b style="color:#211D70">'.$result['auth1'].'</b></p><br>
</div>

<div id="t2" style="position:relative; height:auto; width:18%; vertical-align:top;">
<div align="center"><p class="book_type">'.$result['book_type_two'].'</p></div>
<a href='.$result['url2'].' target=_blank>
<p style="font-size:13px; color:#333;"><b style="color:#211D70">'.$result['title2'].'</b></p></a>
<p style="font-size:13px; color:#333;">By : <b style="color:#211D70">'.$result['auth2'].'</b></p><br>
</div>
	
<div id="t3" style="position:relative; height:auto; width:18%; vertical-align:top;">
<div align="center"><p class="book_type">'.$result['book_type_three'].'</p></div>
<a href='.$result['url3'].' target=_blank>
<p style="font-size:13px; color:#333;"><b style="color:#211D70">'.$result['title3'].'</b></p></a>
<p style="font-size:13px; color:#333;">By : <b style="color:#211D70">'.$result['auth3'].'</b></p><br>
</div>
<div id="t4" style="position:relative; height:auto; width:18%; vertical-align:top;">
<div align="center"><p class="book_type">'.$result['book_type_four'].'</p></div>
<a href='.$result['url4'].' target=_blank>
<p style="font-size:13px; color:#333;"><b style="color:#211D70">'.$result['title4'].'</b></p></a>
<p style="font-size:13px; color:#333;">By : <b style="color:#211D70">'.$result['auth4'].'</b></p><br>
</div>	
</div>		
<div align="center" >
<h1 style="font-family:Constantia, \'Lucida Bright\', \'DejaVu Serif\', Georgia, serif; font-size:24px; color:#06F; font-weight:bold"><b>Journals (Table of Contents)</b></h1>	
<table align="center" style="width:95%;">
<tr>
<td width="120px" align="center">
<div id="j1" style="position:relative; margin-top:20px; height:auto; width:175px; border:1px solid black; vertical-align:top;">
<a href='.$result['jurl1'].' target=_blank style="font-size:16px; vertical-align:top;"><br/>
<img src="../uploads/bulletin/'.$disp.'/'.$result["tc1"].'" height="160px" width="120px" style="border:1px solid black;"></a>
<br/><br/>
</div><br/>
<div align="center"><p class="Journal_type">'.$result['Journal_type_one'].'</p></div>
<a href='.$result['jurl1'].' target=_blank style="font-size:16px; vertical-align:top;"><b>'.$result["j1"].'</b></a></td>
<td>&nbsp;</td>
<td width="120px" align="center">
<div id="j2" style="position:relative; margin-top:20px; height:auto; width:175px; border:1px solid black; vertical-align:top;">
<a href='.$result['jurl2'].' target=_blank style="font-size:16px; vertical-align:top;"><br/>
<img src="../uploads/bulletin/'.$disp.'/'.$result["tc2"].'" height="160px" width="120px" style="border:1px solid black;"></a>
<br/><br/>
</div><br/>
<div align="center"><p class="Journal_type">'.$result['Journal_type_two'].'</p></div>
<a href='.$result['jurl2'].' target=_blank style="font-size:16px; vertical-align:top;"><b>'.$result["j2"].'</b></a></td>
<td>&nbsp;</td>
<td width="120px" align="center">
<div id="j3" style="position:relative; margin-top:20px; height:auto; width:175px; border:1px solid black; vertical-align:top;">
<a href='.$result['jurl3'].' target=_blank style="font-size:16px; vertical-align:top;"><br>
<img src="../uploads/bulletin/'.$disp.'/'.$result["tc3"].'" height="160px" width="120px" style="border:1px solid black;"></a>
<br/><br/>
</div><br/>
<div align="center"><p class="Journal_type">'.$result['Journal_type_three'].'</p></div>
<a href='.$result['jurl3'].' target=_blank style="font-size:16px; vertical-align:top;"><b>'.$result["j3"].'</b></a></td>
<td>&nbsp;</td>
<td width="120px" align="center">
<div id="j4" style="position:relative; margin-top:20px; height:auto; width:175px;  border:1px solid black; vertical-align:top;">
<a href='.$result['jurl4'].' target=_blank style="font-size:16px; vertical-align:top;"><br>
<img src="../uploads/bulletin/'.$disp.'/'.$result["tc4"].'" height="160px" width="120px" style="border:1px solid black;"></a>
<br/><br/>
</div><br/>
<div align="center"><p class="Journal_type">'.$result['Journal_type_four'].'</p></div>
<a href='.$result['jurl4'].' target=_blank style="font-size:16px; vertical-align:top;"><b>'.$result["j4"].'</b></a></td>
</tr>
</table>
</div>
<br /><br>';
}
?>