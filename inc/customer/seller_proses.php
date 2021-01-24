<?php
	include '../../config/koneksi.php';

$id=$_REQUEST['id'];
$bayar=$_REQUEST['bayar'];
$nama=$_REQUEST['nama'];

if ($id) {
	$customer=mysql_query("UPDATE customer SET status_cust='reseller' 
	WHERE id_customer='$id'");
	$t="Reseller atas nama ".$nama;
	$hh=mysql_query("insert into transaksi(tgl_trans,namadata,masuk,keluar,status) values 
		(sysdate(),'$t','$bayar','0','pemasukan')");
	echo "<script>alert('Data berhasil di input');document.location.href='../../?psg=customer/t_customer'</script>";
} else {
	echo "<script>alert('Data gagal di input');document.location.href='../../?psg=customer/customer'</script>";
}

?>