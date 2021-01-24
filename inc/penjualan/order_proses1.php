<?php
session_start();
  $id_user=$_SESSION['id_user'];
//echo $_SESSION['id_user'];
include "../../config/koneksi.php";

$id=$_REQUEST['id_cus'];
$invo=$_REQUEST['invo'];
$total=$_SESSION['total_bayar'];
$bayar=str_replace('Rp', ' ', $_SESSION['bayar']);
$alamat=$_REQUEST['alamat'];
$kembalian=$_SESSION['kembalian'];
$viabayar=$_REQUEST['viabayar'];
$closing=$_REQUEST['closing'];
$statusbayar=$_REQUEST['statusbayar'];
$idc=$_REQUEST['idc'];
$catatan=$_REQUEST['catatan'];

$ongkir=str_replace('Rp', ' ', $_REQUEST['ongkir']);
$kembalian=$_REQUEST['kembalian'];
$total12=str_replace('Rp', ' ', $_REQUEST['total12']);
$totalb=$_REQUEST['totalb'];
$bonus=$_REQUEST['namabon'];
$acak= rand(1,99);
$da=date("Y-m-d");
$inv = $da.$acak; 


		$del2=mysql_query("DELETE FROM order_bonus WHERE invoice='$invo' ");
		$del=mysql_query("DELETE FROM penjualan WHERE invoice='$invo' ");
		$del1=mysql_query("DELETE FROM orderan WHERE invoice='$invo' ");

if (is_array($_SESSION['item']))
{
	foreach($_SESSION['item'] as $index=>$barang)
	{
		
		$nama=$barang['nama'];
		$harga=$barang['harga'];
		$jumlah=$barang['jumlah'];
		$total=$barang['total'];
		$namabon1=$barang['namabon'];
        $hargabon=$barang['harga_bonus1'];
        $jumlah2=$barang['jumlah2'];

		$o=mysql_query("select * from produk where nama_produk='$nama' ");
		$u=mysql_fetch_array($o);
		$idp=$u['id_produk'];

		//echo "$nama	$harga $jumlah $total <br/>";
		/* PENJUALAN */

		$sql=mysql_query("INSERT INTO penjualan (invoice,id_produk,harga_jual,jumlah,masuk,keluar) VALUES (
			'$invo','$idp' ,'$harga', '$jumlah', '$total','0')");

	}
	foreach($_SESSION['item'] as $index=>$barang)
	{
		
		$nama=$barang['nama'];
		$harga=$barang['harga'];
		$jumlah=$barang['jumlah'];
		$total=$barang['total'];
		$namabon1=$barang['namabon'];
        $hargabon=$barang['harga_bonus1'];
        $jumlah2=$barang['jumlah2'];

		$o=mysql_query("select * from produk where nama_produk='$nama' ");
		$u=mysql_fetch_array($o);
		$idp=$u['id_produk'];

		//echo "$nama	$harga $jumlah $total <br/>";
		/* ORDER BONUS */

		$sql=mysql_query("INSERT INTO order_bonus (invoice,id_produk,harga_jual,jumlah,masuk,keluar) VALUES (
			'$invo','$idp' ,'$harga', '$jumlah', '$total','0')");
	}

	
	$qq=mysql_query("SELECT * FROM customer WHERE id_customer='$id'");
	$z=mysql_fetch_array($qq);
	$dep=$z['deposit'];
	$sisa=$dep+$kembalian;
	$namac=$z['nama'];
	$sql2=mysql_query("UPDATE customer SET deposit='$sisa' WHERE id_customer='$id'");

	/* TRANSAKSI */
	$jual="Penjualan atas nama ".$namac;
	$hh2=mysql_query("DELETE FROM transaksi WHERE invoice='$invo' ");

	$hh1=mysql_query("insert into transaksi(tgl_trans,namadata,masuk,keluar,bankterima,status) 
		values (sysdate() ,'$jual','$total12','0','$viabayar','pemasukan')");
	$sql3=mysql_query("INSERT INTO order_bonus (invoice,id_bonus,harga_jual,jumlah,masuk,keluar) VALUES (
		'$invo','$idb' ,'$hargabon', '$jumlah2', '$hargabon','0')");

	/* ORDERAN */
	$sql2=mysql_query("select * from karyawan k, user u where k.id_user=u.id_user and u.id_user='$id_user' ");
	$x1=mysql_fetch_array($sql2);
	$z1=$x1['komisi'];
	$z2=$x1['id_karyawan'];

	$sql1=mysql_query("INSERT INTO orderan (invoice,id_customer,tgl_jual,ongkir_buy,ongkir_sup,resi,total,viabayar,statusbayar,closing,catatan,id_karyawan,alamat_tujuan) VALUES (
			'$invo','$id',sysdate() ,'$ongkir', '', '','$total12','','','','$catatan','$z2','$alamat')");

	//if ($sql) {
	$_SESSION['jlh_item']=0;
		$_SESSION['item']=array();
		$_SESSION['bonus']=array();
		$_SESSION['total_bayar']=0;
		//header("location: ../../?psg=customer/t_customer");
		header("location:../../index.php?psg=penjualan/detail_penjualan&inv=$invo");
	//}
	
}
?>