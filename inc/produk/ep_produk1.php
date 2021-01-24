<?php
	include '../../config/koneksi.php';

$id=$_REQUEST['id'];
$namap=$_REQUEST['namap'];
$sa=$_REQUEST['sa'];
$re=$_REQUEST['re'];

if ($namap && $sa) {
	$produk=mysql_query("UPDATE produk SET nama_produk='$namap',
											harga_saller='$sa',
											harga_resaller='$re'
											WHERE id_produk='$id' ");
	echo "<script>alert('Data berhasil di ubah');document.location.href='../../?psg=produk/t_produk'</script>";
} else {
	echo "<script>alert('Data gagal di ubah');document.location.href='../../?psg=produk/t_produk'</script>";
}

?>