<?php
	include '../../../config/koneksi.php';

	$id=$_REQUEST['del'];
	$hapus=mysql_query("DELETE FROM kat_pemasukan where id_k_pem='$id' ");

	if ($hapus == true) {
		echo "<script>alert('Data berhasil di hapus');document.location.href='../../../?psg=kategori/pemasukan/t_kat_pemasukan'</script>";
	} else {
		echo "<script>alert('Data gagal di di hapus');document.location.href='../../../?psg=kategori/pemasukan/t_kat_pemasukan'</script>";
	}
?>