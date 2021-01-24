<?php
session_start();
include "../../config/koneksi.php";

  $lokasi_file = $_FILES['fupload']['tmp_name'];
  $nama_file   = $_FILES['fupload']['name'];
  $tipe_file   = $_FILES['fupload']['type'];
  $ukuran_file = $_FILES['fupload']['size'];

$b=$_REQUEST['nama'];
$c=$_REQUEST['nominal'];
$d=$_REQUEST['kat'];
$e=$_REQUEST['desk'];
$bank=$_REQUEST['bank'];
$tgl=date('Y-m-d',strtotime($_REQUEST['tanggal']));



	if(!empty($lokasi_file))
	{
		if ($tipe_file != "image/gif" AND 
	    $tipe_file != "image/jpeg" AND
	    $tipe_file != "image/jpg" AND 
	    $tipe_file != "image/png"){
  		echo "Upload Gagal !!! <br>
        Tipe file <b>$nama_file</b> : $tipe_file <br>
        Tipe file yang boleh di upload: gif, jpg dan png.";
		}
		else{
		  $direktori = "../../images/pemasukan/$nama_file";
		  $url       = "images";

		  move_uploaded_file($lokasi_file,"$direktori");
		move_uploaded_file($lokasi_file,"../../images/pemasukan/$nama_file");
		$s=mysql_query("insert into pemasukan(id_k_pem,nama_pemasukan,nominal,tanggal,bank,deskripsi,gambar) values 
			('$d','$b','$c','$tgl','$bank','$e','$nama_file')") or die(mysql_error());

		$hh=mysql_query("insert into transaksi(tgl_trans,namadata,masuk,keluar,bankterima,status) values ('$tgl','$b','$c','0','$bank','pemasukan')");
		echo "<script>alert('Data berhasil di input');document.location.href='../../?psg=pemasukan/pemasukan'</script>";
		} 
	}
	elseif(empty($lokasi_file)) {
		
		$s=mysql_query("insert into pemasukan(id_k_pem,nama_pemasukan,nominal,tanggal,bank,deskripsi) values 
			('$d','$b','$c','$tgl','$bank','$e')") or die(mysql_error());
		
		$hh=mysql_query("insert into transaksi(tgl_trans,namadata,masuk,keluar,bankterima,status) values ('$tgl','$b','$c','0','$bank','pemasukan')");
		echo "<script>alert('Data berhasil di input tanpa bukti');document.location.href='../../?psg=pemasukan/t_pemasukan'</script>";

	}
	 else {
		
		echo "<script>alert('Data gagal');document.location.href='../../?psg=pemasukan/t_pemasukan'</script>";

	}

?>