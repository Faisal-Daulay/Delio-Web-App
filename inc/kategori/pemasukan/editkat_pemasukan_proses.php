<?php
	include '../../../config/koneksi.php';

$id=$_REQUEST['id'];
$kat=$_REQUEST['kat'];
$sa=$_REQUEST['sa'];
$re=$_REQUEST['re'];

if ($kat!="") {
	$produk=mysql_query("UPDATE kat_pemasukan SET nama_katpem='$kat'
												WHERE id_k_pem='$id' ") or die (mysql_error());
	?>
		<script>
			alert('Data berhasil di Ubah')
			window.location='../../../?psg=kategori/pemasukan/t_kat_pemasukan';
		</script>";
	<?php
} else {
	?>
		<script>
			alert('Data berhasil di Ubah')
			window.location='../../../?psg=kategori/pemasukan/k_pemasukan';
		</script>";
	<?php
}

?>