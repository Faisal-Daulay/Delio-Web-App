<?php
	include '../../../config/koneksi.php';

$id=$_REQUEST['id'];
$kat=$_REQUEST['kat'];
$sa=$_REQUEST['sa'];
$re=$_REQUEST['re'];

if ($kat!="") {
	$produk=mysql_query("UPDATE kat_produk SET nama_katpr='$kat'
												WHERE id_k_pr='$id' ") or die (mysql_error());
	
	?>
		<script>
			alert('Data berhasil di Ubah')
			window.location='../../../?psg=kategori/produk/t_kat_produk';
		</script>";
	<?php
} else {
	?>
		<script>
			alert('Data berhasil di Ubah')
			window.location='../../../?psg=kategori/produk/k_produk';
		</script>";
	<?php
}

?>