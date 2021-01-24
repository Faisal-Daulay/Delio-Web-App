<?php include "../../config.php";
$id=$_REQUEST['id'];
	$nama=$_REQUEST['nama'];
	$harga=$_REQUEST['harga'];

	if($nama!="")
	{
		$s=mysql_query("update makanan set nama='$nama', harga='$harga' where id_makanan='$id'");

	}
	
	?>
<script language="javascript">
    window.location = "../../index.php?p=resto/data.php";
</script>

