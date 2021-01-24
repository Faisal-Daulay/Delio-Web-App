<?php
	include '../../config/koneksi.php';

	$del =$_REQUEST['del'];
	$hapus = mysql_query("DELETE FROM pesan WHERE id_pesan ='$del' ");
	
	if ($hapus == true) {
		echo "<script>alert('Pesan berhasil di hapus');document.location.href='../../?psg=pesan/pesan'</script>";
	} else {
		echo "<script>alert('Pesan gagal di hapus');document.location.href='../../?psg=pesan/pesan'</script>";
	}
?>