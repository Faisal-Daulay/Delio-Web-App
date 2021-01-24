<?php
	include '../../../config/koneksi.php';

$id=$_REQUEST['id'];
$kat=$_REQUEST['kat'];
$sa=$_REQUEST['sa'];
$re=$_REQUEST['re'];

if ($kat!="") {
	$produk=mysql_query("UPDATE kat_pengeluaran SET nama_katp='$kat'
												WHERE id_k_pe='$id' ") or die (mysql_error());
	
	?>
		<script>
			alert('Data berhasil di Ubah')
			window.location='../../../?psg=kategori/pengeluaran/t_kat_pengeluaran';
		</script>";
	<?php
} else {
	?>
		<script>
			alert('Data berhasil di Ubah')
			window.location='../../../?psg=kategori/pengeluaran/k_pengeluaran';
		</script>";
	<?php
}

?>