<?php 
error_reporting(0);

include "../../config.php";
$b=$_REQUEST['nama'];
$c=$_REQUEST['tanggal'];
$d=$_REQUEST['hp'];

if($b!="")
{
		$s=mysql_query("insert into bookresto(nama,tanggal,hp) values ('$b','$c','$d')")
	or die (mysql_error());
?>
<script language="javascript">
  	<!--
     	    
			window.location = "../../index.php?p=resto/bookresto.php";
			
   	--></script>

<?php }
	else
	{

?><script language="javascript">
  	<!--
     	    
			window.location = "../../index.php?p=resto/bookresto.php";
			
   	--></script>
	<?php } ?>