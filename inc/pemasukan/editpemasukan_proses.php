<?php
include "../../config/koneksi.php";
$id=$_REQUEST['id'];
$a=$_REQUEST['kat'];
$b=$_REQUEST['nama'];
$c=$_REQUEST['nominal'];
$d=$_REQUEST['desk'];
$tgl=date('Y-m-d',strtotime($_REQUEST['tanggal']));

if($b!="")
{
	$s=mysql_query("update pemasukan set id_k_pem='$a',nama_pemasukan='$b',nominal='$c',tanggal='$tgl' where id_pemasukan='$id'") or die(mysql_error());
	
	$jk=mysql_query("insert into transaksi(tgl_trans,namadata,masuk,keluar,status) values ('$tgl','$b','$c','0','pemasukan')");

	header("location:../../?psg=pemasukan/pemasukan");

	 ?>



	<?php
}
else
{
	?>
	<script language="javascript">
  	<!--
     	    alert('Isi No.Ktp anda')
			window.location = "../../?psg=pemasukan/pemasukan";
			
   	--></script>

	<?php
}

?>