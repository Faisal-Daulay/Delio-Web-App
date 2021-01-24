<?php
	session_start();
	$total_bayar=$_SESSION['total_bayar'];
	if (is_array($_SESSION['item']))
    {
      foreach($_SESSION['item'] as $index=>$barang) 
      	{
	        $id_bonus=$barang['id_bonus'];
	        $id_produk=$barang['id_produk'];
	        $nama=$barang['nama'];
	        $harga=$barang['harga'];
	        $jumlah=$barang['jumlah'];
	        $namabon1=$barang['namabon'];
	        $hargabon=$barang['harga_bonus1'];
	        $jumlah2=$barang['jumlah2'];
	        $nilai1=$barang['total'];
    	}
   	}
	$no = $_GET['del'];
	unset($_SESSION['item'][$no]);
	//$_SESSION['jlh_item']=0;
	//$_SESSION['bonus']=0;
	$_SESSION['item']=array_values($_SESSION['item']);
	//$_SESSION['bonus']=array();
	$_SESSION['total_bayar']=$nilai1;
	header("location:../../index.php?psg=penjualan/order&id=6&pesan=input  berhasil")
?>