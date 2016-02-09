<?php
$q=$_GET['q'];
$my_data=mysql_real_escape_string($q);
require_once('../config.php');
$sql="SELECT DISTINCT Keywords FROM bookfinder where Keywords LIKE '%$my_data%' order by Keywords";
$result = mysql_query($sql);
 if($result)
 {
  while($row=mysql_fetch_array($result))
  {
   echo $row['Keywords']."\n";
  }
 }
?>