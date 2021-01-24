<?php
	include '../../config/koneksi.php';

	$id=$_REQUEST['del'];
	$hapus=mysql_query("DELETE FROM customer where id_customer='$id' ");

	if ($hapus == true) {
		echo "<script>alert('Data berhasil di hapus');document.location.href='../../?psg=customer/t_customer'</script>";
	} else {
		echo "<script>alert('Data gagal di di hapus');document.location.href='../../?psg=customer/t_customer'</script>";
	}
?>