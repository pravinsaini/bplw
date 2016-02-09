<?php
include("config.php");
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type">
<title>Rules and Regulations</title>
<link type="image/png" rel="icon" href="images/fav_32.png"  >
<link type="text/css" rel="stylesheet" href="css/reset.css">
<link type="text/css" rel="stylesheet" href="css/main.css">
<link type="text/css" rel="stylesheet" href="css/module.css">
<link type="text/css" rel="stylesheet" href="css/dashboard.css">
<script type="text/javascript" src="js/jquery-1.4.1.min.js"></script>
<script type="text/javascript" src="js/metadata.js"></script>
<script type="text/javascript" src="js/main.js"></script>
</head>
<body>
<div class="headerWrapper" style="background-position: right 0px;">
<div class="headerWrapperFix">
<div class="logoWrapper">
<a id="headercontrol_ancu" class="logo" href="index.php">
<img id="headercontrol_imgu" usemap="#Map" alt="BITS Pilani logo" src="images/logo.jpg">
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
<img src="uploads/profilepics/<?php echo $userinfo['avatar']; ?>" width="50">
<div class="loginNav">
<ul>
<?php
	if($userinfo['category']=="Admin")
	{
?>
<li><a href="administrator/admin.php">Dashboard</a></li>
<?php
	}
	else
	{
?>
<li><a href="account/dashboard.php">Dashboard</a></li>
<?php
	}
?>
<li><a href="account/account.php">Account</a></li>
<li><a class="logout" href="index.php?bitsid=0">Logout</a></li>
</ul>
</div>
</div>
</div><?php 
} else {
?>
<div align="center" class="login">
<a style="color:#211d70;" href="login.php">
<img src="images/login_icon.png" height="90px" width="100px"><br/>
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
<a href="rules_and_regulations.php">Rules and Regulations</a>
</li>
<li>
<a href="library_staff.php">Library Staff</a>
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
<a href="search/bookfinder4u.php">Book Finder</a>
</li>
<li>
<a href="search/periodical_finder.php">Periodical Finder</a>
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
<a href="services/circulation.php">Circulation</a>
</li>
<li>
<a href="services/photocopy_service.php">Photocopying</a>
</li>
<li>
<a href="services/references.php">References</a>
</li>
<li>
<a href="services/inter_library_loan.php">Inter-Library Loan</a>
</li>
<li>
<a href="services/info_BITS_bulletin.php">InfoBITS Bulletin</a>
</li>
<li>
<a href="services/daily_news.php">Daily News</a>
</li>
<li>
<a href="services/lf.php">Lost & Found</a>
</li>
<li>
<a href="services/av.php">Audio & Visuals</a>
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
<a href="search/periodical_finder.php">Print-Journals</a>
</li>
<li>
<a href="search/e-journals.php">E-Journals</a>
</li>
<li>
<a href="services/databases.php">Online Databases</a>
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
<a href="plagiarism.php">Plagiarism</a>
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
<a  href="theses_and_reports.php">Theses & Reports</a>
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
<a href="feedback/survey.php">Survey</a>
</li>
<li>
<a href="feedback/feedback_form.php">Suggestion | Complaint | Compliments</a>
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
<li class="home"><a href="administrator/admin.php">Dashboard</a></li>
<?php
	}
	else if($userinfo['category']=="Student" || $userinfo['category']=="Research Scholar" || $userinfo['category']=="Faculty/Staff")
	{
?>
<li class="home"><a href="account/dashboard.php">Dashboard</a></li>
<?php
	}
}	
	else
	{
	?>
	<li class="home"><a href="index.php">Home</a></li>
	<?php
	}
?>
<li>Rules and Regulations</li>
</ul>
</div>
</div>
<div class="bannerCarouselWrapper1">
<div class="service_box">
<div class="heading">
<h2><span>Rules </span>and Regulations</h2>
</div>
<div class="description">
1. The Central Library of BITS Pilani is meant for the use by faculty, staff and students of  the institute. Only those students who are registered for the academic programmes of the institute are entitled to the library facilities.
<br /><br />
2. The books are issued for a period of 15 Days and the entitlements for members are as follows:
<br /><br />
<table class="circulation_table">
<tr>
<th style="width:10%;">Category
</th>
<th style="width:10%;">No. Of Books
</th>
</tr>
<tr>
<td>Faculty</td>
<td>30</td>
</tr>
<tr>
<td>Research Scholars</td>
<td>15</td>
</tr>
<tr>
<td>Students(UG/PG)</td>
<td>10</td>
</tr>
<tr>
<td>Non-Teaching</td>
<td>3</td>
</tr>
<tr>
<td>Temporary</td>
<td>2</td>
</tr>
</tr>
</table>
<br />
3. Books which are on loan may be renewed for a further period of 15 days or one month as the case may be provided no other reader has requisitioned the book in the
meantime. For renewal, either the book needs to be brought to the library and get the new due date stamped at the lending counter or simply send us an e-mail request at
<b>helpdesk.library@pilani.bits-pilani.ac.in</b><br/><br/>
4. If a book is returned after the due date, a late fee of 50 paise per day per book will be charged from the defaulter. Any conscious attempt to retain the book by paying the late fee is discouraged.<br/><br/>
5. A book can be returned through another member, and the overdue charges, if any, needs to be paid by the member who brings the book.<br/><br/>
6. The Librarian has the right to recall any book at any time.<br/><br/>
7. A book which is on loan can be reserved by filling in a reservation slip available at the lending counter or online on the library portal/website.<br/><br/>
8. The following categories of books/journals are generally not issued:<br/>
a) Rare books b) Current issues and bound volumes of periodicals c) PhD theses d) other materials as may be specified by the Librarian.<br/><br/>
9. The books can be borrowed by producing the Institute ID card issued by the SWD. The ID card is not transferable. The card needs to be kept in safe custody and the
member is responsible for any books issued against the ID card. In case the card is lost, the matter has to be reported immediately both at the SWD and the library so
that the misuse of the card can be prevented.<br/><br/>
10. The member should access his/her check out records on the library website from time to time and bring the discrepancies if any to the notice of library counter staff
immediately. Any delays in sorting out the discrepancies will complicate the matter.<br/><br/>
11. Before borrowing, the book should be checked by the member for missing pages and any damage is brought to the notice of the staff at the Issue Desk.<br/><br/>
12. Readers shall be responsible for any loss or damage to the library material, while under their use, and shall be required to replace or pay the current cost of such
materials as decided by the Librarian, plus a processing fee of Rs 20/- per each
lost/damaged item being replaced.<br/><br/>
13. The Librarian reserves the right to withdraw facilities from any member who violates the rules and regulations of the library.<br/><br/>
14. The janitor (Person at the Gate) is authorized to check the readers’ belongings at the Exit point.<br/><br/>
15. Please take care of your personal belongings. Library will not take any responsibility for the loss of personal belongings of readers.<br/><br/>
16. <b>Reference and Text Books</b><br/>Users can borrow Reference and Textbooks from the Textbook Counter (Hall No.1) for overnight half an hour before closing the library and are expected to return the same the next day morning before 9.15 am. An overdue charge of Rs. 25/- per day will be levied if the borrowed Reference / Textbook are not returned within the stipulated time.<br/><br/>
17. <b>Lost and Found items</b><br/> The lost and found items by the library staff are kept separately in the library. These items are included in the "Lost and Found" page of the Library Portal.<br/><br/>
Steps to be followed to claim your lost items found in the library:<br/>
a). Click the "Lost and Found" icon to get the list of found items.<br/>
b) If you notice your Lost item, press Claim button - you will get a pop-up message giving you an unique Identification No.<br/>
c) Meet the Librarian/ Library staff to claim your lost item by giving your unique Identification no.<br/>
d) Based on the description provided by you, the Librarian/ library staff will checkand verify to confirm that the found item belongs to you.<br/>
e) You will then acknowledge having received the item online<br/>
f) The Librarian/ Library staff will hand over the lost item to you after the verification.<br/><br/>
18. <b>Use of Databases</b><br/>
The library subscribes to 31 online databases consisting of over 11000 E-journals which are listed on BITS-LIBRARY Portal They can be accessed through campus wide network. You can also access them in the E-Library Zones on Ground and 1st Floor of the library.<br/><br/>
19. <b>Photocopy facilities</b><br/>
• Photocopying of complete book is a violation of copyright law and therefore it is forbidden. Only 10% of a book is allowed.<br/>
• For, photocopy work of more than 20 pages (i.e continuous pages from one book/journal/theses), a Photocopy Request Form has to be submitted. The Form is available with the operator.<br/>
• Reference and Text books should not be left for photocopying at the photocopier to be collected later. This inconveniences other readers who need the same book. In case there is a rush, please come again during lull period and submit the same book for photocopying.<br/>
• During peak hours, photocopies of less than 10 pages will be given priority.<br/><br/>
20. <b>Entry and Exit Rules </b><br/>
 The users are expected to enter their ID Nos in the computer kept at the main gate every time they enter or exit the library.<br/><br/>
21. <b>Library Working Hours:</b><br/>
Monday to Saturday: 9.00 am to 11.00 pm<br/>
Sunday and Holidays : 9.00 am to 5.00 pm.<br/><br/>
During comprehensive examination, library timings will be extended from 9.00 am to 12.00 midnight including holidays.<br/><br/>


For any further enquiries, please contact the Librarian at <br/><br/>
<b>Giridhar Kunkur</b> <br/>
Librarian and Chief, Publications and Media Relations, BITS Pilani<br/>
email: giridhar.kunkur@pilani.bits-pilani.ac.in
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
<a href="services/circulation.php">Circulation</a>
</li>
<li>
<a href="services/references.php">References</a>
</li>
<li>
<a href="services/photocopy_service.php">Photocopying</a>
</li>
<li>
<a href="services/info_BITS_bulletin.php">InfoBITS Bulletin</a>
</li>
<li>
<a href="services/daily_news.php">Daily News</a>
</li>
<li>
<a href="services/lf.php">Lost & Found</a>
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
<a href="search/bookfinder4u.php">Book Finder</a>
</li>
<li>
<a href="search/periodical_finder.php">Periodical Finder</a>
</li>
<li>
<a target="_blank"  href="http://172.21.1.37/">Web OPAC</a>
</li>
<li>
<a href="services/av.php">Audio Visuals</a>
</li>
<li>
<a href="services/databases.php">Online Databases</a>
</li>
<li>
<a href="search/e-journals.php">E-Journals</a>
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
               <a href="credits.php">[Credits]</a>
</div>
</div>
</body>
</html>