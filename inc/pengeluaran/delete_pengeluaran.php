<?php 
    include '../../config/koneksi.php';

	$id=$_REQUEST['del'];
	$qry= mysql_query ("DELETE FROM pengeluaran where id_pengeluaran='$id'") or die (mysql_error());

	if ($qry) {
		header ("location:../../?psg=pengeluaran/pengeluaran");
	}
?>
