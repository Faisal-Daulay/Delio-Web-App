<?php
	include '../../config/koneksi.php';

$nama=$_REQUEST['nama'];
$alamat=$_REQUEST['alamat'];
$tlpn=$_REQUEST['no_tlpn'];
$negara=$_REQUEST['negara'];
$provin=$_REQUEST['provin'];
$prop=$_REQUEST['propinsi'];
$kota=$_REQUEST['kota'];
$kode=$_REQUEST['kode'];
$stat=$_REQUEST['stat'];

if ($nama && $alamat) {
	$customer=mysql_query("INSERT INTO customer(nama,alamat,no_tlpn,code_provinsi,Id_Kabupaten,kode_kecamatan,status_cust,negara,kode_pos,deposit)
		values('$nama','$alamat','$tlpn','$provin','$prop','$kota','$stat','$negara','$kode','0')");
	echo "<script>alert('Data berhasil di input');document.location.href='../../?psg=customer/t_customer'</script>";
} else {
	echo "<script>alert('Data gagal di input');document.location.href='../../?psg=customer/customer'</script>";
}

?>