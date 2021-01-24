<?php
	include 'config/koneksi.php';
    session_start();
    $username = $_SESSION['username'];
    $status = $_SESSION['status'];

	$isipes = $_REQUEST['isipes'];

	if ($status == "admin") {
		if ($isipes !="") {
			$sql1 = mysql_query("INSERT INTO pesan (username,isi_pesan,tanggal_kirim)
											VALUES ('$username','$isipes',NOW()) ");
			echo "<script>alert('Pesan berhasil di kirim');document.location.href='?psg=pesan/pesan'</script>";
		}
		else {
			echo "<script>alert('Pesan gagal di kirim');document.location.href='?psg=pesan/pesan'</script>";
		}
	}
	elseif ($status == "teamleader") {
		if ($isipes !="") {
			$sql = mysql_query("INSERT INTO pesan (username,isi_pesan,tanggal_kirim)
											VALUES ('$username','$isipes',NOW()) ");
			echo "<script>alert('Pesan berhasil di kirim');document.location.href='?psg=pesan/pesan'</script>";
		}
		else {
			echo "<script>alert('Pesan gagal di kirim');document.location.href='?psg=pesan/pesan'</script>";
		}
	}
?>