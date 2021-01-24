<?php
include "../../config/koneksi.php";
$id=$_REQUEST['id'];
$a=$_REQUEST['kat'];
$b=$_REQUEST['nama'];
$c=$_REQUEST['nominal'];
$tgl=date('Y-m-d',strtotime($_REQUEST['tanggal']));

if($b!="")
{
	$s=mysql_query("update pengeluaran set id_k_pe='$a',nama_pengeluaran='$b',nominal='$c',tanggal='$tgl' where id_pengeluaran='$id'") or die(mysql_error());
	
	$jk=mysql_query("insert into transaksi(tgl_trans,namadata,masuk,keluar,status) values ('$tgl','$b','0','$c','pengeluaran')");

	header("location:../../?psg=pengeluaran/pengeluaran");

	?>
	<?php
}
else
{
	?>
	<script language="javascript">
  	<!--
     	    alert('Isi No.Ktp anda')
			window.location = "../../?psg=pengeluaran/pengeluaran";
			
   	--></script>

	<?php
}

?>