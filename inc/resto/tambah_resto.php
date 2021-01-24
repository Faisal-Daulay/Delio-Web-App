<?php
session_start();

	$_SESSION['jlh_item']++;
	$urut=$_SESSION['jlh_item'];
	
	$kode_barang=$_REQUEST['kode_barang'];
	$nama=$_REQUEST['nama'];
	$harga=$_REQUEST['harga'];
	$jumlah=$_REQUEST['jumlah'];
	$total=$_REQUEST['total'];

	if($jumlah<=0 or $harga<=0)
	{
		header('location:../../index.php?p=resto/resto.php&error=input data dengan benar');
	}
	else
	{
		$_SESSION['item'][$urut]['kode_barang']=$kode_barang;
		$_SESSION['item'][$urut]['nama']=$nama;
		$_SESSION['item'][$urut]['harga']=$harga;
		$_SESSION['item'][$urut]['jumlah']=$jumlah;
		$_SESSION['item'][$urut]['total']=$total;
		
		$_SESSION['total_bayar']+=$total;
		header("location: ../../index.php?p=resto/resto.php&pesan=input $nama_barang berhasil");
	}
?>