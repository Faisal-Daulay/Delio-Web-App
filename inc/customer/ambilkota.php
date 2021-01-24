<?php
include '../../config/koneksi.php';

$provin = $_REQUEST['provin'];
$kode_prov=substr($provin, 0, 2);

$kota = mysql_query("SELECT * FROM kabupaten WHERE LEFT(Id_Kabupaten,2)='$kode_prov' order by nama_kabkot");
echo "<option>-- Pilih Kota --</option>";
while($k = mysql_fetch_array($kota)){
    echo "<option value=\"".$k['Id_Kabupaten']."\">".$k['nama_kabkot']."</option>\n";
}
?>
