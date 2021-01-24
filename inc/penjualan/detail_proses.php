<?php
session_start();
include "../../config/koneksi.php";
$id=$_REQUEST['id'];
$username=$_SESSION['username'];
$inv=$_REQUEST['inv'];
$kurir=$_REQUEST['kurir'];
$ceklist=$_REQUEST['ceklist'];
$ongkir=$_REQUEST['ongkir'];
$resi=$_REQUEST['resi'];
$viabayar=$_REQUEST['viabayar'];
$statusbayar=$_REQUEST['statusbayar'];
$closing=$_REQUEST['closing'];
$lokasi_file = $_FILES['fupload']['tmp_name'];
  $nama_file   = $_FILES['fupload']['name'];
  $tipe_file   = $_FILES['fupload']['type'];
  $ukuran_file = $_FILES['fupload']['size'];


if($inv!==""){
    $sql2=mysql_query("UPDATE orderan SET ongkir_sup='$ongkir', resi='$resi',kurir='$kurir', viabayar='$viabayar', statusbayar='$statusbayar', closing='$closing'
    where invoice='$inv'") or die (mysql_error());
}
  
  if ($tipe_file !== "image/gif" AND 
    $tipe_file !== "image/jpeg" AND
    $tipe_file !== "image/jpg" AND 
    $tipe_file !== "image/png")
  {
    echo "Upload Gagal !!!";
  }
  else {
    $direktori = "../../images/penjualan/$nama_file";
     $url       = "images";

    move_uploaded_file($lokasi_file,"$direktori");
    $sql=mysql_query("UPDATE orderan SET ongkir_sup='$ongkir', gambar='$nama_file', resi='$resi', viabayar='$viabayar', statusbayar='$statusbayar', closing='$closing' 
    where invoice='$inv'") or die (mysql_error());
    echo "<script>alert('Data berhasil di input');document.location.href='../../?psg=penjualan/penjualan'</script>";
  } 
?>