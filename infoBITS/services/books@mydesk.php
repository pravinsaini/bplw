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
<title>Books @ MyDesk</title>
<link type="image/png" rel="icon" href="../images/fav_32.png">
<link type="text/css" rel="stylesheet" href="../css/reset.css">
<link type="text/css" rel="stylesheet" href="../css/main.css">
<link type="text/css" rel="stylesheet" href="../css/module.css">
<link type="text/css" rel="stylesheet" href="../css/dashboard.css">
<script type="text/javascript" src="../js/jquery-1.4.1.min.js"></script>
<script type="text/javascript" src="../js/metadata.js"></script>
<script type="text/javascript" src="../js/main.js"></script>
<style type="text/css">
/* The CSS */
	.select_small_box
	{
    padding:3px;
	width:160px;
    margin: 0;
    -webkit-border-radius:4px;
    -moz-border-radius:4px;
    border-radius:4px; 
	border:1px solid #b3c1ce;
    color:#888;
    outline:none;
    display: inline-block;
    -webkit-appearance:none;
    -moz-appearance:none;
    appearance:none;
    cursor:pointer;
}
select {
    padding:3px;
	width:220px;
    margin: 0;
    -webkit-border-radius:4px;
    -moz-border-radius:4px;
    border-radius:4px; 
	border:1px solid #b3c1ce;
    color:#888;
    outline:none;
    display: inline-block;
    -webkit-appearance:none;
    -moz-appearance:none;
    appearance:none;
    cursor:pointer;
}

/* Targetting Webkit browsers only. FF will show the dropdown arrow with so much padding. */
@media screen and (-webkit-min-device-pixel-ratio:0) {
    select {padding-right:30px}
}

label {position:relative}
label:after {
    content:'<>';
    font:11px "Consolas", monospace;
    color:#aaa;
    -webkit-transform:rotate(90deg);
    -moz-transform:rotate(90deg);
    -ms-transform:rotate(90deg);
    transform:rotate(90deg);
    right:8px; top:1px; 
    border-bottom:1px solid #ddd;
    position:absolute;
    pointer-events:none;
}
label:before {
    content:'';
    right:6px; top:1px;
    width:20px; 
    background:#f8f8f8;
    position:absolute;
    pointer-events:none;
    display:block;
}
.small_text_box
{
padding:4px;
	width:100px;
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
	width:250px;
    margin: 0;
    -webkit-border-radius:4px;
    -moz-border-radius:4px;
    border-radius:4px; 
	border:1px solid #b3c1ce;
    color:#888;
    outline:none;
    display: inline-block;
}

.add_text_box
{
padding:4px;
	width:170px;
    margin: 0;
    -webkit-border-radius:4px;
    -moz-border-radius:4px;
    border-radius:4px; 
	border:1px solid #b3c1ce;
    color:#888;
    outline:none;
    display: inline-block;
}
#limitMessage{
	color:red;
}
input[type="button"]{padding:5px; border:none; width:100px; cursor:pointer; border-radius: 4px; background-color:#09f; color:#fff;}
input[type="submit"]{padding:5px; border:none; width:100px; cursor:pointer; border-radius: 4px; background-color:#09f; color:#fff;}
.success{color:green;padding: 5px; font-weight:bold;}
	</style>
	<script type="text/javascript">
	var addmoreclick = 0
function Validate(){
	var valid = true;
	var message = '';
	var dep_name = document.getElementById("dep_name");
	var chamber = document.getElementById("chamber");
	var pre_time = document.getElementById("pre_time");
	
	if(chamber.value.trim() == ''){
		valid = false;
		message = message + '*Chamber number is required' + '\n';
	}
	if(dep_name.value.trim() == ''){
		valid = false;
		message = message + '*Department name is required' + '\n';
	}	
	if(pre_time.value.trim() == ''){
		valid = false;
		message = message + '*Please select preferred time of delivery.' + '\n';
	}
	console.log(1)
	$(".accession_no").each(function(){
		console.log($(this).attr("value"))
		if(message.indexOf("Accession") < 0 && $(this).attr("value") == ""){
			valid = false;
			message = message + '*Please fill all the Barcodes.' + '\n';
		}
	})
	if (valid == false){
		alert(message);
		return false;
	}
}
function addMore() {
	if(addmoreclick < 9){
		addmoreclick++;
		console.log(addmoreclick)
		$("<DIV>").load("input.php", function() {
				$("#product").append($(this).html());
		});
	}
	else{
		if ($("#limitMessage").css("display") == "none"){
			$("#limitMessage").css("display","inline-block")
			setTimeout(function(){$("#limitMessage").hide()},5000)
		}
	}	
}

function deleteRow() {
	$('DIV.product-item').each(function(index, item){
		jQuery(':checkbox', this).each(function () {
            if ($(this).is(':checked')) {
				$(item).remove();
            }
        });
	});
}
</script>
<script type="text/javascript">
function showTextBox()
	{
        if ($('#dep_name').val() == '1') 
		{
            $('#other_dep_text').css({'visibility':'visible'});
		}
		else
		{
			$('#other_dep_text').css({'visibility':'hidden'});
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
<li>Books @ MyDesk</li>
</ul>
</div>
</div>
<div class="bannerCarouselWrapper1">
<div class="service_box">
<div class="description">
<form action="books@mydesk.php" method="post" enctype="multipart/form-data" onsubmit="return Validate();">
<br/>
<?php
date_default_timezone_set("Etc/UTC");
$message="";
	if(!empty($_POST["save"])) {
		$bitsid=$info['bitsid'];
		$name=$info['name'];
		$email=$info['email'];
		$chamber=$_POST["chamber"];
		$dep_name=$_POST["dep_name"];
		$pre_time=$_POST["pre_time"];
		$other_dep=$_POST["other_dep"];
		$date = date("d/m/Y");
		$time=  date('h:i:s');
		$person_name=$_POST["person_name"];
		$itemCount = count($_POST["accession_number"]);
		$itemValues=0;
		$query = "INSERT INTO books_on_mydesk (book_title, author, edition, accession_number, name, bitsid, chamber_number, department_name, pre_time,  date, time, issued_by, received_by, delivered_by, issue_date, receive_date, delivery_date, person_name, email, status, action, other ) VALUES ";
		$queryValue = "";
		for($i=0;$i<$itemCount;$i++) {		
				$itemValues++;
				if($queryValue!="") {
					$queryValue .= ",";
				}
				$queryValue .= "('" . $_POST["book_title"][$i] . "', '" . $_POST["author"][$i] . "' , '" . $_POST["edition"][$i] . "', '" . $_POST["accession_number"][$i] . "', '" .$name. "', '" .$bitsid. "', '" .$chamber. "', '" .$dep_name. "', '" .$pre_time. "', '".$date."', '".$time."', '', '', '', '', '', '', '".$person_name."', '".$email."', '0', 'pending', '".$other_dep."')";
		}
		$sql = $query.$queryValue;
		if($itemValues!=0) {
			$result = mysql_query($sql);
			if(!empty($result))
			{			
			  $message="Thank you for using Books@MyDesk service!<br/>You will soon hear from the library.";
			}
?>
<div class="success" align="center"><?php echo $message; ?><br/><a href="../account/dashboard.php">Go to Dashboard</a></div>
<?php			
		}
	}
	else
	{
	if(isset($_SESSION['bitsid']))
	{
		$info1 = mysql_fetch_array(mysql_query('select * from users where bitsid="'.$_SESSION['bitsid'].'"'));
		$bitsid=$info1['bitsid'];
		$name=$info1['name'];
	}
?>
<div style="margin-left:30px; font-size:13px;">
<table style="color:#211D70; width:90%; font-size:13px;" ><tr>
<td valign="top">To,<br/><br/>
The Librarian,<br/>
BITS Library, Pilani<br/><br/>
Dear Sir,</td>
<td valign="top" align="center"><img src="../images/Books@MyDesk.png" width="150px" height="120px;"/></td>
</tr></table>
<b>Sub :  Requesting for Books@MyDesk</b><br/><br/>
I request you to please arrange to send the following books to my Desk in my office:
<br/><br/>
<table style="color:#211D70; font-size:13px;">
<tr><td colspan="6">
<b>Name of the Faculty Member:</b>&nbsp;<input type="text" name="name" id="name" style="color:#211D70; border-radius:10px; font-size:13px; border:none; font-weight:normal;" value="<?php echo $name; ?>" readonly="true"/>
<br/>
</td></tr>
<tr style="line-height: 10px"><td colspan="6">&nbsp;</td></tr>	
<tr>
<td><b>PSRN No.:</b></td><td align="left" ><input type="text" name="bitsid" id="bitsid" style="color:#211D70; border-radius:10px; font-size:13px; border:none; font-weight:normal; width:80px;" value="<?php echo $bitsid; ?>" readonly="true"/></td>
<td><b>My Chamber No.:</b></td><td style="width:150px;"><input type="text" name="chamber" id="chamber" class="small_text_box" placeholder="&nbsp;"/></td>
<td><b>Department:</b></td><td><?php 
echo '<label><select name="dep_name" id="dep_name" onchange="showTextBox()">';
	echo "<option>" . '' ."</option>";
    echo "<option>" . 'Biology' ."</option>";
	echo "<option>" . 'Chemistry' ."</option>";
	echo "<option>" . 'Chemical Engineering' ."</option>";
	echo "<option>" . 'Civil Engineering' ."</option>";
	echo "<option>" . 'Computer Science' ."</option>";
	echo "<option>" . 'Economics' ."</option>";
	echo "<option>" . 'Electrical and Electronics Engineering' ."</option>";
	echo "<option>" . 'Humanities' ."</option>";
	echo "<option>" . 'Management' ."</option>";
	echo "<option>" . 'Mathematics' ."</option>";
	echo "<option>" . 'Mechanical Engineering' ."</option>";
	echo "<option>" . 'Pharmacy' ."</option>";
	echo "<option>" . 'Physics' ."</option>";
	echo "<option value='1'>" . 'Others' ."</option>";
echo '</label></select>';
				?>				
				</td>
</tr>
<tr><td colspan="6" align="right">
<div id="other_dep_text" style="visibility: hidden; margin-right:100px;">
   <input type="text" id="other_dep" name="other_dep" class="add_text_box" placeholder="Enter Department Name"/>
 </div></td></tr>
<tr style="line-height: 10px"><td colspan="6">&nbsp;</td></tr>	
<tr><td colspan="6">
<b>Preferred time of Delivery:</b>
<?php 
echo '<label><select name="pre_time" id="pre_time" class="select_small_box">';
	echo "<option>" . '' ."</option>";
    echo "<option>" . '11.30 am and 1.00 pm ' ."</option>";
	echo "<option>" . '03.30 pm and 5.00 pm' ."</option>";
echo '</label></select>';
				?>
</td></tr>
<tr style="line-height: 10px"><td colspan="6">&nbsp;</td></tr>
<tr><td colspan="6"><b>In my absence, the books can be delivered to&nbsp;<input type="text" name="person_name" id="person_name" class="text_box" placeholder="&nbsp;"/>&nbsp;in my Department.</b></td></tr>
<tr style="line-height: 10px"><td colspan="6">&nbsp;</td></tr>
<tr><td colspan="6">
<table align="center" style="width: 100%; background-color: #FFFFFF; color: #211D70; border: 1px solid #4a9ace;" cellpadding="0" cellspacing="0">
				<thead>
					<tr style="color:#FFFFFF; background-color:#4a9ace; font-weight:bold; font-size:14px; line-height:27px; vertical-align:center;">					
						<th style="width:80px;">&nbsp;</th>
						<th align="left" style="width:270px;">Book Title</th>
						<th align="left" style="width:200px;">Author</th>
						<th align="left" style="width:140px;">Edition</th>
						<th align="left">Barcode<span class="error">*</span></th>
					</tr>
				</thead>
				<tr style="line-height: 10px"><td colspan="6">&nbsp;</td></tr>
				<tr style="line-height: 10px"><td colspan="6"><DIV id="product"><?php require_once("input.php") ?></DIV></td></tr>
				<tr style="line-height: 25px"><td colspan="6">&nbsp;</td></tr>
				<tr style="line-height: 10px"><td colspan="6" align="left">
				<table><tr>
				<td><div style="margin-left:25px;"><input type="button" name="add_item" value="Add More" onClick="addMore();" />&nbsp;&nbsp;&nbsp;<input type="button" name="del_item" value="Delete" onClick="deleteRow();" /></div></td>
				<td><span id="limitMessage" style="display:none">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;You can't add more than 10 books at a time.</span></td>
				</tr></table>
				</td></tr>
<tr style="line-height: 20px"><td colspan="6">&nbsp;</td></tr>				
<tr><td colspan="6" align="center"><input type="submit" name="save" value="Submit"/></td></tr>	
				<tr style="line-height: 10px"><td colspan="6">&nbsp;</td></tr>
				</table>
				<div align="left" class="error">* Mandatory</div>
</td></tr>
<tr style="line-height: 10px"><td colspan="6">&nbsp;</td></tr>
<tr><td colspan="6" style="font-size:13px; font-weight:bold;">
<b><span style="color:red; font-size:14;">Please note:</span></b><br/> 
•	Select your titles from the library catalogue and send us the list not exceeding 10 books at a time. <br/>
•	The selected  books will be delivered at your desk in your office within 24 hours - if not issued to other members.<br/> 
•	If the requested books are out in circulation, they  will be reserved in your name and once they are returned, will be sent to your Desk.<br/>
•	Your entitlement is 30 books for a period of 135 days from the date of issue.<br/>
•	You can return the books any time after your use.<br/>
</td>
</tr>
</table>			
</div>
<?php
}
?>
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