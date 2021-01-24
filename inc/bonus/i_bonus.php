<?php
	include '../../config/koneksi.php';

$namap=$_REQUEST['namap'];
$sa=$_REQUEST['sa'];

if ($namap) {
	$bonus=mysql_query("INSERT INTO bonus(nama_bonus,harga_bonus)
		values('$namap','$sa')");
	echo "<script>alert('Data berhasil di input');document.location.href='../../?psg=bonus/t_bonus'</script>";
} else {
	echo "<script>alert('Data gagal di input');document.location.href='../../?psg=bonus/bonus'</script>";
}

?>