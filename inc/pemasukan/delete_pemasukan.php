<?php 
    include '../../config/koneksi.php';

	$id=$_REQUEST['del'];
	$qry= mysql_query ("DELETE FROM pemasukan where id_pemasukan='$id'") or die (mysql_error());

	if ($qry) {
		header ("location:../../?psg=pemasukan/pemasukan");
	}
?>
