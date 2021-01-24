<?php include "../../config.php"; 
$id=$_REQUEST['id'];
$qry= mysql_query ("delete from bookresto where id_bookresto='$id'") or die (mysql_error());

if ($qry)
header ("location:../../index.php?p=resto/data.php");

?>
