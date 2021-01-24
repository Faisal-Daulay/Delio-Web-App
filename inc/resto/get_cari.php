<?php
	include "../../config.php";

	
	$kode=$_REQUEST['kode'];
	
	$query=mysql_query("SELECT * FROM makanan WHERE id_makanan=$kode",$koneksi);
	
	$data=mysql_fetch_array($query);
	
	$nama=$data['nama'];
	$harga=$data['harga'];
		
	if($data)
	{
		echo "
		<script language=\"javascript\">
		function jalan(){								
			opener.document.getElementById('id_makanan').value='$kode';
			opener.document.getElementById('nama').value='$nama';
			opener.document.getElementById('harga').value=harga;
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