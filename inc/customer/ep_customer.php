<?php
	include '../../config/koneksi.php';

$id=$_REQUEST['id'];
$nama=$_REQUEST['nama'];
$alamat=$_REQUEST['alamat'];
$tlpn=$_REQUEST['no_tlpn'];
$negara=$_REQUEST['negara'];
$provin=$_REQUEST['provin'];
$kota=$_REQUEST['propinsi'];
$kecam=$_REQUEST['kota'];
$kode=$_REQUEST['kode'];
$stat=$_REQUEST['stat'];

if ($nama && $alamat) {
	$customer=mysql_query("UPDATE customer SET nama='$nama',
												alamat='$alamat',
												no_tlpn='$tlpn',
												code_provinsi='$provin',
												Id_Kabupaten='$kota',
												kode_kecamatan='$kecam',
												status_cust='$stat',
												negara='$negara',
												kode_pos='$kode'
												WHERE id_customer='$id' ");
	echo "<script>alert('Data berhasil di ubah');document.location.href='../../?psg=customer/t_customer'</script>";
} else {
	echo "<script>alert('Data gagal di ubah');document.location.href='../../?psg=customer/customer'</script>";
}

?>