<?php
	include '../../config/koneksi.php';

$namap=$_REQUEST['namap'];
$sa=$_REQUEST['sa'];
$re=$_REQUEST['re'];

if ($namap && $sa) {
	$produk=mysql_query("INSERT INTO produk(nama_produk,harga_saller,harga_resaller)
		values('$namap','$sa','$re')");
	echo "<script>alert('Data berhasil di input');document.location.href='../../?psg=produk/t_produk'</script>";
} else {
	echo "<script>alert('Data gagal di input');document.location.href='../../?psg=produk/produk'</script>";
}

?>