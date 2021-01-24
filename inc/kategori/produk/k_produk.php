<?php
	include '../../../config/koneksi.php';

$kat=$_REQUEST['kat'];
$sa=$_REQUEST['sa'];
$re=$_REQUEST['re'];

if ($kat!="") {
	$produk=mysql_query("INSERT INTO kat_produk(nama_katpr)	values('$kat')") or die (mysql_error());
	
	?>
		<script>
			alert('Data berhasil di input')
			window.location='../../../?psg=kategori/produk/t_kat_produk';
		</script>";
	<?php
} else {
	?>
		<script>
			alert('Data berhasil di input')
			window.location='../../../?psg=kategori/produk/k_produk';
		</script>";
	<?php
}

?>