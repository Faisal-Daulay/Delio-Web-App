<?php
include '../../config/koneksi.php';

$propinsi = $_REQUEST['propinsi'];
$kode_kecam=substr($propinsi, 0, 6);

$kota = mysql_query("SELECT * FROM kecamatan WHERE LEFT(kode_kecamatan,6)='$kode_kecam' order by nama_kecamatan");
echo "<option>-- Pilih Kecamatan --</option>";
while($k = mysql_fetch_array($kota)){ 
    echo "<option value=\"".$k['kode_kecamatan']."\">".$k['nama_kecamatan']."</option>\n";
}
?>
