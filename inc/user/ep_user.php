<?php
	include '../../config/koneksi.php';

$id=$_REQUEST['id'];
$user=$_REQUEST['user'];
$pass=md5($_REQUEST['pass']);
$status=$_REQUEST['status'];

if ($user && $pass) {
	$username = mysql_query("UPDATE user SET username='$user',
											password='$pass',
											status='admin'
											WHERE id_user='$id' ");
	echo "<script>alert('Data berhasil di ubah');document.location.href='../../?psg=user/t_user'</script>";
} else {
	echo "<script>alert('Data gagal di ubah');document.location.href='../../?psg=user/t_user'</script>";
}

?>