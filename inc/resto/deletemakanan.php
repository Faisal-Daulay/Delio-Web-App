<?php include "../../config.php"; 
$id=$_REQUEST['id'];
$qry= mysql_query ("delete from makanan where id_makanan='$id'") or die (mysql_error());

if ($qry)
header ("location:../../index.php?p=resto/data.php");

?>
