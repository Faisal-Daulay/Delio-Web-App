<?php
session_start();
	include "../../config/koneksi.php";
	$proff=$_REQUEST['proff'];
	$tbl=$_REQUEST['tbl'];
	$username=$_SESSION['username'];

	if ($username!="") {
		$sql=mysql_query("INSERT INTO proff(invoice, nama, status) VALUES('$tbl','$username','yes') ");
    //echo "<script>alert('Data berhasil di proff');document.location.href='?psg=penjualan/detail_penjualan&inv=$proff'</script>";
	//header("location: index.php?psg=penjualan/detail_penjualan&inv=$proff");
	}
?>