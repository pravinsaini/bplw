<?php
include("../config.php");
if(isset($_GET["opac"])){
$x = mysql_fetch_array(mysql_query("SELECT * FROM hitcounter where service_name='OPAC'"));
$count=$x['Total_Hits'];
$num=1;
$total=$num+$count;
$sql = "update hitcounter set Total_Hits='$total' where service_name='OPAC'";
$result = mysql_query($sql); 
header("Location: http://172.21.1.37");
exit;
}
else if(isset($_GET["databases"])){
$x = mysql_fetch_array(mysql_query("SELECT * FROM hitcounter where service_name='Online Database'"));
$count=$x['Total_Hits'];
$num=1;
$total=$num+$count;
$sql = "update hitcounter set Total_Hits='$total' where service_name='Online Database'";
$result = mysql_query($sql); 
header("Location: ../services/databases.php");
exit;
}
else if(isset($_GET["eprints"])){
$x = mysql_fetch_array(mysql_query("SELECT * FROM hitcounter where service_name='Institutional repository'"));
$count=$x['Total_Hits'];
$num=1;
$total=$num+$count;
$sql = "update hitcounter set Total_Hits='$total' where service_name='Institutional repository'";
$result = mysql_query($sql); 
header("Location: http://eprints.bits-pilani.ac.in/");
exit;
}
else if(isset($_GET["ebooks"])){
$x = mysql_fetch_array(mysql_query("SELECT * FROM hitcounter where service_name='eBooks'"));
$count=$x['Total_Hits'];
$num=1;
$total=$num+$count;
$sql = "update hitcounter set Total_Hits='$total' where service_name='eBooks'";
$result = mysql_query($sql); 
header("Location: ../services/e-books.php");
exit;
}
else if(isset($_GET["question_papers"])){
$x = mysql_fetch_array(mysql_query("SELECT * FROM hitcounter where service_name='Question Papers'"));
$count=$x['Total_Hits'];
$num=1;
$total=$num+$count;
$sql = "update hitcounter set Total_Hits='$total' where service_name='Question Papers'";
$result = mysql_query($sql); 
header("Location: http://172.21.1.12/Question1.html");
exit;
}
else if(isset($_GET["book_finder"])){
$x = mysql_fetch_array(mysql_query("SELECT * FROM hitcounter where service_name='Book Finder'"));
$count=$x['Total_Hits'];
$num=1;
$total=$num+$count;
$sql = "update hitcounter set Total_Hits='$total' where service_name='Book Finder'";
$result = mysql_query($sql); 
header("Location: ../search/book_finder.php");
exit;
}
else if(isset($_GET["periodical_finder"])){
$x = mysql_fetch_array(mysql_query("SELECT * FROM hitcounter where service_name='Periodical Finder'"));
$count=$x['Total_Hits'];
$num=1;
$total=$num+$count;
$sql = "update hitcounter set Total_Hits='$total' where service_name='Periodical Finder'";
$result = mysql_query($sql); 
header("Location: ../search/periodical_finder.php");
exit;
}
else if(isset($_GET["daily_news"])){
$x = mysql_fetch_array(mysql_query("SELECT * FROM hitcounter where service_name='Daily News'"));
$count=$x['Total_Hits'];
$num=1;
$total=$num+$count;
$sql = "update hitcounter set Total_Hits='$total' where service_name='Daily News'";
$result = mysql_query($sql); 
header("Location: ../services/daily_news.php");
exit;
}
else if(isset($_GET["bulletin"])){
$x = mysql_fetch_array(mysql_query("SELECT * FROM hitcounter where service_name='Info BITS Bulletin'"));
$count=$x['Total_Hits'];
$num=1;
$total=$num+$count;
$sql = "update hitcounter set Total_Hits='$total' where service_name='Info BITS Bulletin'";
$result = mysql_query($sql); 
header("Location: ../services/bulletin.php");
exit;
}
else if(isset($_GET["ill"])){
$x = mysql_fetch_array(mysql_query("SELECT * FROM hitcounter where service_name='Inter Library Loan'"));
$count=$x['Total_Hits'];
$num=1;
$total=$num+$count;
$sql = "update hitcounter set Total_Hits='$total' where service_name='Inter Library Loan'";
$result = mysql_query($sql); 
header("Location: ../services/ill.php");
exit;
}
else if(isset($_GET["lfms"])){
$x = mysql_fetch_array(mysql_query("SELECT * FROM hitcounter where service_name='Lost and Found'"));
$count=$x['Total_Hits'];
$num=1;
$total=$num+$count;
$sql = "update hitcounter set Total_Hits='$total' where service_name='Lost and Found'";
$result = mysql_query($sql); 
header("Location: ../services/lfms.php");
exit;
}
else if(isset($_GET["audio_visuals"])){
$x = mysql_fetch_array(mysql_query("SELECT * FROM hitcounter where service_name='Audio Visuals'"));
$count=$x['Total_Hits'];
$num=1;
$total=$num+$count;
$sql = "update hitcounter set Total_Hits='$total' where service_name='Audio Visuals'";
$result = mysql_query($sql); 
header("Location: ../pdf/emtv.pdf");
exit;
}
else if(isset($_GET["poetry_club"])){
$x = mysql_fetch_array(mysql_query("SELECT * FROM hitcounter where service_name='Poetry Club'"));
$count=$x['Total_Hits'];
$num=1;
$total=$num+$count;
$sql = "update hitcounter set Total_Hits='$total' where service_name='Poetry Club'";
$result = mysql_query($sql); 
header("Location: ../services/poetry_club_archive.php");
exit;
}
else if(isset($_GET["matrix_club"])){
$x = mysql_fetch_array(mysql_query("SELECT * FROM hitcounter where service_name='Matrix Club'"));
$count=$x['Total_Hits'];
$num=1;
$total=$num+$count;
$sql = "update hitcounter set Total_Hits='$total' where service_name='Matrix Club'";
$result = mysql_query($sql); 
header("Location: ../services/matrix_club_archive.php");
exit;
}
else if(isset($_GET["books_mydesk"])){
$x = mysql_fetch_array(mysql_query("SELECT * FROM hitcounter where service_name='books_mydesk'"));
$count=$x['Total_Hits'];
$num=1;
$total=$num+$count;
$sql = "update hitcounter set Total_Hits='$total' where service_name='books_mydesk'";
$result = mysql_query($sql); 
header("Location: ../services/books@mydesk.php");
exit;
}
else if(isset($_GET["SciFinder"])){
$x = mysql_fetch_array(mysql_query("SELECT * FROM hitcounter where service_name='SciFinder'"));
$count=$x['Total_Hits'];
$num=1;
$total=$num+$count;
$sql = "update hitcounter set Total_Hits='$total' where service_name='SciFinder'";
$result = mysql_query($sql); 
header("Location: ../services/SciFinder_registration.php");
exit;
}
else if(isset($_GET["bentham_science"])){
$x = mysql_fetch_array(mysql_query("SELECT * FROM hitcounter where service_name='Bentham Science'"));
$count=$x['Total_Hits'];
$num=1;
$total=$num+$count;
$sql = "update hitcounter set Total_Hits='$total' where service_name='Bentham Science'";
$result = mysql_query($sql); 
header("Location: http://www.eurekaselect.com/");
exit;
}
else if(isset($_GET["emerald"])){
$x = mysql_fetch_array(mysql_query("SELECT * FROM hitcounter where service_name='Emerald'"));
$count=$x['Total_Hits'];
$num=1;
$total=$num+$count;
$sql = "update hitcounter set Total_Hits='$total' where service_name='Emerald'";
$result = mysql_query($sql); 
header("Location: http://www.emeraldinsight.com/");
exit;
}
else if(isset($_GET["world_scientific"])){
$x = mysql_fetch_array(mysql_query("SELECT * FROM hitcounter where service_name='World Scientific'"));
$count=$x['Total_Hits'];
$num=1;
$total=$num+$count;
$sql = "update hitcounter set Total_Hits='$total' where service_name='World Scientific'";
$result = mysql_query($sql); 
header("Location: http://www.worldscientific.com/");
exit;
}
else if(isset($_GET["synfacts"])){
$x = mysql_fetch_array(mysql_query("SELECT * FROM hitcounter where service_name='Synfacts'"));
$count=$x['Total_Hits'];
$num=1;
$total=$num+$count;
$sql = "update hitcounter set Total_Hits='$total' where service_name='Synfacts'";
$result = mysql_query($sql); 
header("Location: https://www.thieme-connect.com/products/ejournals/journal/10.1055/s-00000131");
exit;
}
else if(isset($_GET["synthesis"])){
$x = mysql_fetch_array(mysql_query("SELECT * FROM hitcounter where service_name='Synthesis'"));
$count=$x['Total_Hits'];
$num=1;
$total=$num+$count;
$sql = "update hitcounter set Total_Hits='$total' where service_name='Synthesis'";
$result = mysql_query($sql); 
header("Location: https://www.thieme-connect.com/products/ejournals/issue/eFirst/10.1055/s-00000084");
exit;
}
else if(isset($_GET["rsc"])){
$x = mysql_fetch_array(mysql_query("SELECT * FROM hitcounter where service_name='RSC'"));
$count=$x['Total_Hits'];
$num=1;
$total=$num+$count;
$sql = "update hitcounter set Total_Hits='$total' where service_name='RSC'";
$result = mysql_query($sql); 
header("Location: ../pdf/RSC_trial.pdf");
exit;
}
else if(isset($_GET["library_tour"])){
$x = mysql_fetch_array(mysql_query("SELECT * FROM hitcounter where service_name='Library Tour'"));
$count=$x['Total_Hits'];
$num=1;
$total=$num+$count;
$sql = "update hitcounter set Total_Hits='$total' where service_name='Library Tour'";
$result = mysql_query($sql); 
header("Location: ../library_tour.php");
exit;
}
?>