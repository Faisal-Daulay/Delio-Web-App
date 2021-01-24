<?php
	include '../../../config/koneksi.php';

	$id=$_REQUEST['del'];
	$hapus=mysql_query("DELETE FROM kat_pengeluaran where id_k_pe='$id' ");

	if ($hapus == true) {
		echo "<script>alert('Data berhasil di hapus');document.location.href='../../../?psg=kategori/pengeluaran/t_kat_pengeluaran'</script>";
	} else {
		echo "<script>alert('Data gagal di di hapus');document.location.href='../../../?psg=kategori/pengeluaran/t_kat_pengeluaran'</script>";
	}
?>