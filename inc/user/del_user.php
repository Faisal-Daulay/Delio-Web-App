<?php
	include '../../config/koneksi.php';

	$id=$_REQUEST['del'];
	$hapus=mysql_query("DELETE FROM user where id_user='$id' ");

	if ($hapus == true) {
		echo "<script>alert('Data berhasil di hapus');document.location.href='../../?psg=user/t_user'</script>";
	} else {
		echo "<script>alert('Data gagal di di hapus');document.location.href='../../?psg=user/t_user'</script>";
	}
?>