<?php
	include '../../config/koneksi.php';

	$id=$_REQUEST['del'];
	$hapus=mysql_query("DELETE FROM bonus where id_bonus='$id' ");

	if ($hapus == true) {
		echo "<script>alert('Data berhasil di hapus');document.location.href='../../?psg=bonus/t_bonus'</script>";
	} else {
		echo "<script>alert('Data gagal di di hapus');document.location.href='../../?psg=bonus/t_bonus'</script>";
	}
?>