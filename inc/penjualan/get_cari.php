<?php
	include "../../config/koneksi.php";

	
	$kode=$_REQUEST['kode'];
	
	$query=mysql_query("SELECT * FROM produk WHERE id_produk='$kode'") or die (mysql_error());
	
	$data=mysql_fetch_array($query);	
	$nama=$data['nama_produk'];
	$harga=$data['harga_saller'];
		
	if($data)
	{
		echo "
		<script language=\"javascript\">
		function jalan(){								
			opener.document.getElementById('id_produk').value='$kode';
			opener.document.getElementById('nama_produk').value='$nama';
			opener.document.getElementById('harga_saller').value='$harga';
			self.close();
		};
		</script>
		";
	}
	
?>

<html>
<head>
</head>
<body onLoad="jalan()">
</body>
</html>