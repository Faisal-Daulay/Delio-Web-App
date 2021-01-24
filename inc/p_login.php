<?php

	error_reporting(0);
	session_start();
		include '../config/koneksi.php';
		
	$user=$_REQUEST['user'];
	$pass=md5($_REQUEST['pass']);

	if($user && $pass !=""){
		$admin=mysql_query("SELECT * FROM user WHERE username='$user' AND password='$pass' ") or die(mysql_error());
		$cek=mysql_num_rows($admin);
		
		if($cek > 0) {
			$data=mysql_fetch_array($admin);
			$username=$data['username'];
			$id_user=$data['id_user'];
			$status = $data['status'];
			session_start();
			$_SESSION['username']=$user;
			$_SESSION['id_user']=$id_user;
			$_SESSION['status']=$status;
			echo "<script>alert('Selamat bekerja $username');document.location.href='../cek.php'</script>";	
		} else {
			echo "<script>alert('Login gagal!');document.location.href='../login.php'</script>";
		}
	} 

?>
