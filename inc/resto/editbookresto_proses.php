<?php 
error_reporting(0);

include "../../config.php";
$b=$_REQUEST['nama'];
$c=$_REQUEST['tanggal'];
$d=$_REQUEST['hp'];
$id=$_REQUEST['id'];

if($b!="")
{
		$s=mysql_query("update bookresto set nama='$b', tanggal='$c', hp='$d'' where id_bookresto='$id'")
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