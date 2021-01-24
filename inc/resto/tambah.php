<?php include "../../config.php";
	$nama=$_REQUEST['nama'];
	$harga=$_REQUEST['harga'];

	if($nama!="")
	{
		$s=mysql_query("insert into makanan(nama,harga) values ('$nama','$harga')");

	}
	
	?>
<script language="javascript">
    window.location = "../../index.php?p=resto/data.php";
</script>

