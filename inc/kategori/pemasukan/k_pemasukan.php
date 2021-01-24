<?php
	include '../../../config/koneksi.php';

$kat=$_REQUEST['kat'];
$sa=$_REQUEST['sa'];
$re=$_REQUEST['re'];

if ($kat!="") {
	$produk=mysql_query("INSERT INTO kat_pemasukan(nama_katpem)	values('$kat')") or die (mysql_error());
	
	?>
		<script>
			alert('Data berhasil di input')
			window.location='../../../?psg=kategori/pemasukan/t_kat_pemasukan';
		</script>";
	<?php
} else {
	?>
		<script>
			alert('Data berhasil di input')
			window.location='../../../?psg=kategori/pemasukan/k_pemasukan';
		</script>";
	<?php
}

?>