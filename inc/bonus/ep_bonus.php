<?php
	include '../../config/koneksi.php';

$id=$_REQUEST['id'];
$namap=$_REQUEST['namap'];
$sa=$_REQUEST['sa'];

if ($namap && $sa) {
	$bonus=mysql_query("UPDATE bonus SET nama_bonus='$namap',
											harga_bonus='$sa'
											WHERE id_bonus='$id' ");
	echo "<script>alert('Data berhasil di ubah');document.location.href='../../?psg=bonus/t_bonus'</script>";
} else {
	echo "<script>alert('Data gagal di ubah');document.location.href='../../?psg=bonus/t_bonus'</script>";
}

?>