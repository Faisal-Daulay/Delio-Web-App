<?php
	include '../../config/koneksi.php';

$user=$_REQUEST['user'];
$pass=md5($_REQUEST['pass']);
$status=$_REQUEST['status'];

if ($user && $pass) {
	$produk=mysql_query("INSERT INTO user(username,password,status)
		values('$user','$pass','admin')");
	?>
		<script>
			alert('Data berhasil di input')
			window.location='../../?psg=user/t_user';
		</script>";
	<?php
} else {
	?>
		<script>
			alert('Data berhasil di input')
			window.location='../../?psg=user/t_user';
		</script>";
	<?php
}

?>