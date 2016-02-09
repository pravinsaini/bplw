<?php
$q=$_GET['q'];
$my_data=mysql_real_escape_string($q);
require_once('../config.php');
$sql="SELECT DISTINCT Title FROM periodical_finder where Title LIKE '$my_data%' order by Title ASC";
$result = mysql_query($sql);
 if($result)
 {
  while($row=mysql_fetch_array($result))
  {
   echo $row['Title']."\n";
  }
 }
?>