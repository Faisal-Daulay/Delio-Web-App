<?php
session_start();
	$_SESSION['jlh_item']++;
	$urut=$_SESSION['jlh_item'];
	
	//$kode_barang=$_REQUEST['kode_barang'];
	$nama=$_REQUEST['nama'];
	$harga=$_REQUEST['harga'];
	$alamat=$_REQUEST['alamat'];
	$jumlah=$_REQUEST['jumlah'];
	$total=$_REQUEST['total'];

    	$namabon1=$_REQUEST['namabon'];
    	$hargabon=$_REQUEST['harga_bonus1'];
    	$jumlah2=$_REQUEST['jumlah2'];

	$id_produk=$_REQUEST['id_produk'];
	$id_bonus=$_REQUEST['id_bonus'];

	$id=$_REQUEST['id'];
	$nama_cust=$_REQUEST['nama_cust'];

	$satu=$nama;
	$dua=$namabon1;

	if($total<=0 and $namabon1!='')
	{
		header('location:../../index.php?psg=penjualan/order&id=$id&error=input data dengan benar');
	}

		//$_SESSION['item'][$urut]['kode_barang']=$kode_barang;
		if ($nama!='') {
			$_SESSION['item'][$urut]['id_produk']=$id_produk;
			$_SESSION['item'][$urut]['nama']=$nama;
			$_SESSION['item'][$urut]['harga']=$harga;
			$_SESSION['item'][$urut]['jumlah']=$jumlah;
			$_SESSION['item'][$urut]['total']=$total;
		} 

		if ($namabon1!='') {
			$_SESSION['bonus'][$urut]['namabon']=$namabon1;
			$_SESSION['bonus'][$urut]['harga_bonus1']=$hargabon;
			$_SESSION['bonus'][$urut]['jumlah2']=$jumlah2;
			$_SESSION['bonus'][$urut]['id_bonus']=$id_bonus;
		} 

		$_SESSION['total_bayar']+=$total+$hargabon;
		header("location: ../../index.php?psg=penjualan/order&id=$id&pesan=input $nama_barang berhasil");
?>