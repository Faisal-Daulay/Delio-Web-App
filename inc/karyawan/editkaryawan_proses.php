<?php
  include "../../config/koneksi.php";

$id=$_REQUEST['id'];
$nama_karyawan=$_REQUEST['nama'];
$tempat_lahir=$_REQUEST['tempat'];
$tanggal_lahir=date('Y-m-d', strtotime($_REQUEST['tanggal']));
$jabatan=$_REQUEST['jabatan'];
$alamat=$_REQUEST['alamat'];
$no_tel=$_REQUEST['telp'];

if($nama_karyawan!="")
{
	$s=mysql_query("update karyawan set nama_karyawan='$nama_karyawan',
										tempat_lahir='$tempat_lahir',
										tanggal_lahir='$tanggal_lahir',
										jabatan='$jabatan',
										alamat='$alamat',
										no_tel='$no_tel' 
										where id_karyawan='$id' ") or die(mysql_error());
	
	//$jk=mysql_query("insert into keuangan(tanggal,nama_keu,masuk,keluar,ket) values ('$n','$b','0','$c','$ket')");

	header("location:../../?psg=karyawan/karyawan");
}
else
{
	?>
	<script language="javascript">
  	<!--
     	    alert('Isi Tanggal Lahir Anda')
			window.location = "../../?psg=karyawan/karyawan";
			
   	</script>

	<?php
}

?>