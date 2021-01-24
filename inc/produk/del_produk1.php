<?php
	include '../../config/koneksi.php';

	$id=$_REQUEST['del'];
	$hapus=mysql_query("DELETE FROM produk where id_produk='$id' ");

	if ($hapus == true) {
		echo "<script>alert('Data berhasil di hapus');document.location.href='../../?psg=produk/t_produk'</script>";
	} else {
		echo "<script>alert('Data gagal di di hapus');document.location.href='../../?psg=produk/t_produk'</script>";
	}
?>