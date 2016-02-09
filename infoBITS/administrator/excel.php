<?php
include("../config.php");
if(isset($_POST['FDS_excel']))
	{
	$result=mysql_query("select * from users where bitsid LIKE 'F%'");
     function xlsBOF()
    {
    echo pack("ssssss", 0x809, 0x8, 0x0, 0x10, 0x0, 0x0);
    return;
    }
    function xlsEOF()
    {
    echo pack("ss", 0x0A, 0x00);
    return;
    }
    function xlsWriteNumber($Row, $Col, $Value)
    {
    echo pack("sssss", 0x203, 14, $Row, $Col, 0x0);
    echo pack("d", $Value);
    return;
    }
    function xlsWriteLabel($Row, $Col, $Value )
    {
    $L = strlen($Value);
    echo pack("ssssss", 0x204, 8 + $L, $Row, $Col, 0x0, $L);
    echo $Value;
    return;
    }
    header("Pragma: public");
    header("Expires: 0");
    header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
    header("Content-Type: application/force-download");
    header("Content-Type: application/octet-stream");
    header("Content-Type: application/download");;
    header("Content-Disposition: attachment;filename=first_degree_student_list.xls");
    header("Content-Transfer-Encoding: binary ");
    xlsBOF();
     
    xlsWriteLabel(0,0,"Name");
	xlsWriteLabel(0,1,"BITS ID/PSRN");
    xlsWriteLabel(0,2,"Email");
	xlsWriteLabel(0,3,"Gender");
	xlsWriteLabel(0,4,"SignUp Date");
	xlsWriteLabel(0,5,"Category");
	
    $xlsRow = 1;
    while($row=mysql_fetch_array($result))
    {
    xlsWriteLabel($xlsRow,0,$row['name']);
    xlsWriteLabel($xlsRow,1,$row['bitsid']);
	xlsWriteLabel($xlsRow,2,$row['email']);
	xlsWriteLabel($xlsRow,3,$row['gender']);
	xlsWriteLabel($xlsRow,4,$row['signup_date']);
	xlsWriteLabel($xlsRow,5,$row['category']);
    $xlsRow++;
    }
    xlsEOF();
	}
	else if(isset($_POST['HDS_excel']))
	{
	$result=mysql_query("select * from users where bitsid LIKE 'H%'");
     function xlsBOF()
    {
    echo pack("ssssss", 0x809, 0x8, 0x0, 0x10, 0x0, 0x0);
    return;
    }
    function xlsEOF()
    {
    echo pack("ss", 0x0A, 0x00);
    return;
    }
    function xlsWriteNumber($Row, $Col, $Value)
    {
    echo pack("sssss", 0x203, 14, $Row, $Col, 0x0);
    echo pack("d", $Value);
    return;
    }
    function xlsWriteLabel($Row, $Col, $Value )
    {
    $L = strlen($Value);
    echo pack("ssssss", 0x204, 8 + $L, $Row, $Col, 0x0, $L);
    echo $Value;
    return;
    }
    header("Pragma: public");
    header("Expires: 0");
    header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
    header("Content-Type: application/force-download");
    header("Content-Type: application/octet-stream");
    header("Content-Type: application/download");;
    header("Content-Disposition: attachment;filename=higher_degree_student_list.xls");
    header("Content-Transfer-Encoding: binary ");
    xlsBOF();
     
    xlsWriteLabel(0,0,"Name");
	xlsWriteLabel(0,1,"BITS ID/PSRN");
    xlsWriteLabel(0,2,"Email");
	xlsWriteLabel(0,3,"Gender");
	xlsWriteLabel(0,4,"SignUp Date");
	xlsWriteLabel(0,5,"Category");
    $xlsRow = 1;
    while($row=mysql_fetch_array($result))
    {
    xlsWriteLabel($xlsRow,0,$row['name']);
    xlsWriteLabel($xlsRow,1,$row['bitsid']);
	xlsWriteLabel($xlsRow,2,$row['email']);
	xlsWriteLabel($xlsRow,3,$row['gender']);
	xlsWriteLabel($xlsRow,4,$row['signup_date']);
	xlsWriteLabel($xlsRow,5,$row['category']);
    $xlsRow++;
    }
    xlsEOF();
	}
	else if(isset($_POST['Research_Scholar_excel']))
	{
	$result=mysql_query("select * from users where category ='Research Scholar'");
     function xlsBOF()
    {
    echo pack("ssssss", 0x809, 0x8, 0x0, 0x10, 0x0, 0x0);
    return;
    }
    function xlsEOF()
    {
    echo pack("ss", 0x0A, 0x00);
    return;
    }
    function xlsWriteNumber($Row, $Col, $Value)
    {
    echo pack("sssss", 0x203, 14, $Row, $Col, 0x0);
    echo pack("d", $Value);
    return;
    }
    function xlsWriteLabel($Row, $Col, $Value )
    {
    $L = strlen($Value);
    echo pack("ssssss", 0x204, 8 + $L, $Row, $Col, 0x0, $L);
    echo $Value;
    return;
    }
    header("Pragma: public");
    header("Expires: 0");
    header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
    header("Content-Type: application/force-download");
    header("Content-Type: application/octet-stream");
    header("Content-Type: application/download");;
    header("Content-Disposition: attachment;filename=research_scholar_list.xls");
    header("Content-Transfer-Encoding: binary ");
    xlsBOF();
     
    xlsWriteLabel(0,0,"Name");
	xlsWriteLabel(0,1,"BITS ID/PSRN");
    xlsWriteLabel(0,2,"Email");
	xlsWriteLabel(0,3,"Gender");
	xlsWriteLabel(0,4,"SignUp Date");
	xlsWriteLabel(0,5,"Category");
    $xlsRow = 1;
    while($row=mysql_fetch_array($result))
    {
    xlsWriteLabel($xlsRow,0,$row['name']);
    xlsWriteLabel($xlsRow,1,$row['bitsid']);
	xlsWriteLabel($xlsRow,2,$row['email']);
	xlsWriteLabel($xlsRow,3,$row['gender']);
	xlsWriteLabel($xlsRow,4,$row['signup_date']);
	xlsWriteLabel($xlsRow,5,$row['category']);
    $xlsRow++;
    }
    xlsEOF();
	}
	else if(isset($_POST['FS_excel']))
	{
	$result=mysql_query("select * from users where category ='Faculty/Staff'");
     function xlsBOF()
    {
    echo pack("ssssss", 0x809, 0x8, 0x0, 0x10, 0x0, 0x0);
    return;
    }
    function xlsEOF()
    {
    echo pack("ss", 0x0A, 0x00);
    return;
    }
    function xlsWriteNumber($Row, $Col, $Value)
    {
    echo pack("sssss", 0x203, 14, $Row, $Col, 0x0);
    echo pack("d", $Value);
    return;
    }
    function xlsWriteLabel($Row, $Col, $Value )
    {
    $L = strlen($Value);
    echo pack("ssssss", 0x204, 8 + $L, $Row, $Col, 0x0, $L);
    echo $Value;
    return;
    }
    header("Pragma: public");
    header("Expires: 0");
    header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
    header("Content-Type: application/force-download");
    header("Content-Type: application/octet-stream");
    header("Content-Type: application/download");;
    header("Content-Disposition: attachment;filename=faculty_staff_list.xls");
    header("Content-Transfer-Encoding: binary ");
    xlsBOF();
     
    xlsWriteLabel(0,0,"Name");
	xlsWriteLabel(0,1,"BITS ID/PSRN");
    xlsWriteLabel(0,2,"Email");
	xlsWriteLabel(0,3,"Gender");
	xlsWriteLabel(0,4,"SignUp Date");
	xlsWriteLabel(0,5,"Category");
    $xlsRow = 1;
    while($row=mysql_fetch_array($result))
    {
    xlsWriteLabel($xlsRow,0,$row['name']);
    xlsWriteLabel($xlsRow,1,$row['bitsid']);
	xlsWriteLabel($xlsRow,2,$row['email']);
	xlsWriteLabel($xlsRow,3,$row['gender']);
	xlsWriteLabel($xlsRow,4,$row['signup_date']);
	xlsWriteLabel($xlsRow,5,$row['category']);
    $xlsRow++;
    }
    xlsEOF();
	}
	else if(isset($_POST['admin_excel']))
	{
	$result=mysql_query("select * from users where category ='Admin'");
     function xlsBOF()
    {
    echo pack("ssssss", 0x809, 0x8, 0x0, 0x10, 0x0, 0x0);
    return;
    }
    function xlsEOF()
    {
    echo pack("ss", 0x0A, 0x00);
    return;
    }
    function xlsWriteNumber($Row, $Col, $Value)
    {
    echo pack("sssss", 0x203, 14, $Row, $Col, 0x0);
    echo pack("d", $Value);
    return;
    }
    function xlsWriteLabel($Row, $Col, $Value )
    {
    $L = strlen($Value);
    echo pack("ssssss", 0x204, 8 + $L, $Row, $Col, 0x0, $L);
    echo $Value;
    return;
    }
    header("Pragma: public");
    header("Expires: 0");
    header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
    header("Content-Type: application/force-download");
    header("Content-Type: application/octet-stream");
    header("Content-Type: application/download");;
    header("Content-Disposition: attachment;filename=admin_list.xls");
    header("Content-Transfer-Encoding: binary ");
    xlsBOF();
     
    xlsWriteLabel(0,0,"Name");
	xlsWriteLabel(0,1,"BITS ID/PSRN");
    xlsWriteLabel(0,2,"Email");
	xlsWriteLabel(0,3,"Gender");
	xlsWriteLabel(0,4,"SignUp Date");
	xlsWriteLabel(0,5,"Category");
    $xlsRow = 1;
    while($row=mysql_fetch_array($result))
    {
    xlsWriteLabel($xlsRow,0,$row['name']);
    xlsWriteLabel($xlsRow,1,$row['bitsid']);
	xlsWriteLabel($xlsRow,2,$row['email']);
	xlsWriteLabel($xlsRow,3,$row['gender']);
	xlsWriteLabel($xlsRow,4,$row['signup_date']);
	xlsWriteLabel($xlsRow,5,$row['category']);
    $xlsRow++;
    }
    xlsEOF();
	}
	else if(isset($_POST['male_excel']))
	{
	$result=mysql_query("select * from users where gender ='Male'");
     function xlsBOF()
    {
    echo pack("ssssss", 0x809, 0x8, 0x0, 0x10, 0x0, 0x0);
    return;
    }
    function xlsEOF()
    {
    echo pack("ss", 0x0A, 0x00);
    return;
    }
    function xlsWriteNumber($Row, $Col, $Value)
    {
    echo pack("sssss", 0x203, 14, $Row, $Col, 0x0);
    echo pack("d", $Value);
    return;
    }
    function xlsWriteLabel($Row, $Col, $Value )
    {
    $L = strlen($Value);
    echo pack("ssssss", 0x204, 8 + $L, $Row, $Col, 0x0, $L);
    echo $Value;
    return;
    }
    header("Pragma: public");
    header("Expires: 0");
    header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
    header("Content-Type: application/force-download");
    header("Content-Type: application/octet-stream");
    header("Content-Type: application/download");;
    header("Content-Disposition: attachment;filename=male_list.xls");
    header("Content-Transfer-Encoding: binary ");
    xlsBOF();
     
    xlsWriteLabel(0,0,"Name");
	xlsWriteLabel(0,1,"BITS ID/PSRN");
    xlsWriteLabel(0,2,"Email");
	xlsWriteLabel(0,3,"Gender");
	xlsWriteLabel(0,4,"Category");
	xlsWriteLabel(0,5,"SignUp Date");
    $xlsRow = 1;
    while($row=mysql_fetch_array($result))
    {
    xlsWriteLabel($xlsRow,0,$row['name']);
    xlsWriteLabel($xlsRow,1,$row['bitsid']);
	xlsWriteLabel($xlsRow,2,$row['email']);
	xlsWriteLabel($xlsRow,3,$row['gender']);
	xlsWriteLabel($xlsRow,4,$row['category']);
	xlsWriteLabel($xlsRow,5,$row['signup_date']);
    $xlsRow++;
    }
    xlsEOF();
	}
	else if(isset($_POST['female_excel']))
	{
	$result=mysql_query("select * from users where gender ='Female'");
     function xlsBOF()
    {
    echo pack("ssssss", 0x809, 0x8, 0x0, 0x10, 0x0, 0x0);
    return;
    }
    function xlsEOF()
    {
    echo pack("ss", 0x0A, 0x00);
    return;
    }
    function xlsWriteNumber($Row, $Col, $Value)
    {
    echo pack("sssss", 0x203, 14, $Row, $Col, 0x0);
    echo pack("d", $Value);
    return;
    }
    function xlsWriteLabel($Row, $Col, $Value )
    {
    $L = strlen($Value);
    echo pack("ssssss", 0x204, 8 + $L, $Row, $Col, 0x0, $L);
    echo $Value;
    return;
    }
    header("Pragma: public");
    header("Expires: 0");
    header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
    header("Content-Type: application/force-download");
    header("Content-Type: application/octet-stream");
    header("Content-Type: application/download");;
    header("Content-Disposition: attachment;filename=female_list.xls");
    header("Content-Transfer-Encoding: binary ");
    xlsBOF();
     
    xlsWriteLabel(0,0,"Name");
	xlsWriteLabel(0,1,"BITS ID/PSRN");
    xlsWriteLabel(0,2,"Email");
	xlsWriteLabel(0,3,"Gender");
	xlsWriteLabel(0,4,"Category");
	xlsWriteLabel(0,5,"SignUp Date");
    $xlsRow = 1;
    while($row=mysql_fetch_array($result))
    {
    xlsWriteLabel($xlsRow,0,$row['name']);
    xlsWriteLabel($xlsRow,1,$row['bitsid']);
	xlsWriteLabel($xlsRow,2,$row['email']);
	xlsWriteLabel($xlsRow,3,$row['gender']);
	xlsWriteLabel($xlsRow,4,$row['category']);
	xlsWriteLabel($xlsRow,5,$row['signup_date']);
    $xlsRow++;
    }
    xlsEOF();
	}
	else if(isset($_POST['total_excel']))
	{
	$result=mysql_query("select * from users");
     function xlsBOF()
    {
    echo pack("ssssss", 0x809, 0x8, 0x0, 0x10, 0x0, 0x0);
    return;
    }
    function xlsEOF()
    {
    echo pack("ss", 0x0A, 0x00);
    return;
    }
    function xlsWriteNumber($Row, $Col, $Value)
    {
    echo pack("sssss", 0x203, 14, $Row, $Col, 0x0);
    echo pack("d", $Value);
    return;
    }
    function xlsWriteLabel($Row, $Col, $Value )
    {
    $L = strlen($Value);
    echo pack("ssssss", 0x204, 8 + $L, $Row, $Col, 0x0, $L);
    echo $Value;
    return;
    }
    header("Pragma: public");
    header("Expires: 0");
    header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
    header("Content-Type: application/force-download");
    header("Content-Type: application/octet-stream");
    header("Content-Type: application/download");;
    header("Content-Disposition: attachment;filename=infoBITS_Users_list.xls");
    header("Content-Transfer-Encoding: binary ");
    xlsBOF();
     
    xlsWriteLabel(0,0,"Name");
	xlsWriteLabel(0,1,"BITS ID/PSRN");
    xlsWriteLabel(0,2,"Email");
	xlsWriteLabel(0,3,"Gender");
	xlsWriteLabel(0,4,"Category");
	xlsWriteLabel(0,5,"SignUp Date");	
    $xlsRow = 1;
    while($row=mysql_fetch_array($result))
    {
    xlsWriteLabel($xlsRow,0,$row['name']);
    xlsWriteLabel($xlsRow,1,$row['bitsid']);
	xlsWriteLabel($xlsRow,2,$row['email']);
	xlsWriteLabel($xlsRow,3,$row['gender']);
	xlsWriteLabel($xlsRow,4,$row['category']);
	xlsWriteLabel($xlsRow,5,$row['signup_date']);
    $xlsRow++;
    }
    xlsEOF();
	}
if(isset($_POST['name_wise_excel']))
	{
	$bitsid	=	$_GET['bitsid'];
	$result=mysql_query('select * from books_on_mydesk where bitsid="'.$bitsid.'"');
     function xlsBOF()
    {
    echo pack("ssssss", 0x809, 0x8, 0x0, 0x10, 0x0, 0x0);
    return;
    }
    function xlsEOF()
    {
    echo pack("ss", 0x0A, 0x00);
    return;
    }
    function xlsWriteNumber($Row, $Col, $Value)
    {
    echo pack("sssss", 0x203, 14, $Row, $Col, 0x0);
    echo pack("d", $Value);
    return;
    }
    function xlsWriteLabel($Row, $Col, $Value )
    {
    $L = strlen($Value);
    echo pack("ssssss", 0x204, 8 + $L, $Row, $Col, 0x0, $L);
    echo $Value;
    return;
    }
    header("Pragma: public");
    header("Expires: 0");
    header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
    header("Content-Type: application/force-download");
    header("Content-Type: application/octet-stream");
    header("Content-Type: application/download");;
    header("Content-Disposition: attachment;filename=Name_wise.xls");
    header("Content-Transfer-Encoding: binary ");
    xlsBOF();
     
    xlsWriteLabel(0,0,"Name");
	xlsWriteLabel(0,1,"PSRN");
    xlsWriteLabel(0,2,"Book Title");
	xlsWriteLabel(0,3,"Author");
	xlsWriteLabel(0,4,"Edition");
	xlsWriteLabel(0,5,"Barcode");
	xlsWriteLabel(0,6,"Date");
	xlsWriteLabel(0,7,"Due Date");	
    $xlsRow = 1;
    while($row=mysql_fetch_array($result))
    {
    xlsWriteLabel($xlsRow,0,$row['name']);
    xlsWriteLabel($xlsRow,1,$row['bitsid']);
	xlsWriteLabel($xlsRow,2,$row['book_title']);
	xlsWriteLabel($xlsRow,3,$row['author']);
	xlsWriteLabel($xlsRow,4,$row['edition']);
	xlsWriteLabel($xlsRow,5,$row['accession_number']);
	xlsWriteLabel($xlsRow,6,$row['date']);
	xlsWriteLabel($xlsRow,7,$row['due_date']);
    $xlsRow++;
    }
    xlsEOF();
	}
	?>