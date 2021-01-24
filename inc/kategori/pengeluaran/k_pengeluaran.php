<?php
	include '../../../config/koneksi.php';

$kat=$_REQUEST['kat'];
$sa=$_REQUEST['sa'];
$re=$_REQUEST['re'];

if ($kat!="") {
	$produk=mysql_query("INSERT INTO kat_pengeluaran(nama_katp)	values('$kat')") or die (mysql_error());
	
	?>
		<script>
			alert('Data berhasil di input')
			window.location='../../../?psg=kategori/pengeluaran/t_kat_pengeluaran';
		</script>";
	<?php
} else {
	?>
		<script>
			alert('Data berhasil di input')
			window.location='../../../?psg=kategori/pengeluaran/k_pengeluaran';
		</script>";
	<?php
}

?>