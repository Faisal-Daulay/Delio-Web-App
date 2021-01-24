<?php 
  	include "../../config/koneksi.php";

	$id=$_REQUEST['del'];
	$qry= mysql_query ("DELETE FROM karyawan where id_karyawan='$id'") or die (mysql_error());

	if ($qry==true) {
		header ("location:../../?psg=karyawan/karyawan");
	}
?>
