<?php
	include '../../../config/koneksi.php';

	$id=$_REQUEST['del'];
	$hapus=mysql_query("DELETE FROM kat_produk where id_k_pr='$id' ");

	if ($hapus == true) {
		echo "<script>alert('Data berhasil di hapus');document.location.href='../../../?psg=kategori/produk/t_kat_produk'</script>";
	} else {
		echo "<script>alert('Data gagal di di hapus');document.location.href='../../../?psg=kategori/produk/t_kat_produk'</script>";
	}
?>