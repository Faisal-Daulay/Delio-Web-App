<?php
include '../../config/koneksi.php';

$negara = $_REQUEST['negara'];

if ($negara==Indonesia) {
	$ambil = mysql_query("SELECT * FROM provinsi order by nama_provinsi");
	echo "<option>-- Pilih Provinsi --</option>";
	while($k = mysql_fetch_array($ambil)){
	    echo "<option value=\"".$k['code_provinsi']."\">".$k['nama_provinsi']."</option>\n";
	}
} else {
	echo "Data Kosong";
}

?>
