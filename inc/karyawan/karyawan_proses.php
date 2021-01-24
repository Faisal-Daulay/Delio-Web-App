<?php
session_start();
include "../../config/koneksi.php";

date_default_timezone_get('Asia/Jakarta');
$nama_karyawan=$_REQUEST['nama'];
$tempat_lahir=$_REQUEST['tempat'];
$tanggal_lahir=date('Y-m-d', strtotime($_REQUEST['tanggal']));
$jabatan=$_REQUEST['jabatan'];
$alamat=$_REQUEST['alamat'];
$no_tel=$_REQUEST['telp'];
$username=$_REQUEST['username'];
$password=$_REQUEST['password'];

if($username!="")
{
	$pass=md5($password);
	$u=mysql_query("Insert into user(username,password,status) 
		values ('$username','$pass','$jabatan')");
	$x=mysql_insert_id();
	

	$sql=mysql_query("INSERT INTO karyawan (
			id_user,
			nama_karyawan, 
			tempat_lahir, 
			tanggal_lahir, 
			jabatan, 
			alamat,
			no_tel,komisi
		) VALUES (
			'$x',
			'$nama_karyawan', 
			'$tempat_lahir', 
			'$tanggal_lahir', 
			'$jabatan', 
			'$alamat',
			'$no_tel','0'
		)") or die (mysql_error());
		echo "<script>
				alert('Data berhasil di input');
				document.location.href='../../?psg=karyawan/karyawan'
			</script>";
	} else {
		echo "<script>alert('Data gagal di input');document.location.href='../../?psg=karyawan/t_karyawan'</script>";
	}
?>