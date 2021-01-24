<?php
session_start();
include "../../config.php";

$total=$_SESSION['total_bayar'];
$bayar=$_SESSION['bayar'];
$kembalian=$_SESSION['kembalian'];
$kamar=$_REQUEST['kamar'];
	$meja=$_REQUEST['meja'];

if (is_array($_SESSION['item']))
{
	foreach($_SESSION['item'] as $index=>$barang)
	{
		
		$nama=$barang['nama'];
		$harga=$barang['harga'];
		$jumlah=$barang['jumlah'];
		$total=$barang['total'];

		//echo "$nama	$harga $jumlah $total <br/>";
		$sql=mysql_query("INSERT INTO resto (tanggal_resto,nama_resto, harga_resto, jumlah_resto, masuk_resto,keluar_resto,kamar,meja) VALUES (sysdate(),'$nama', '$harga', '$jumlah', '$total','0','$kamar','$meja')");
		$sq=mysql_query("INSERT INTO transaksi(tanggal,jenisdata,masuk,keluar,status) VALUES (sysdate(),'$nama','$total','0','Resto')");
	}
	if ($sql) {
		//$_SESSION['jlh_item']=0;
		//$_SESSION['item']=array();
		//$_SESSION['total_bayar']=0;
		header("location: kwitansi.php");
		//header("location:../../index.php?p=resto/resto.php&pesan=data berhasil disimpan ke database");
	}
	
}
?>