<?php
error_reporting(0);
session_start();
$total_bayar=$_SESSION['total_bayar'];
$bayar=$_SESSION['bayar'];
$kembalian=$_SESSION['kembalian'];
$_SESSION['meja']=$meja;
$_SESSION['kamar']=$kamar;


setlocale(LC_ALL,'IND');
date_default_timezone_set('Asia/Bangkok');
$tgl_cekin= strftime('%A, %d %B %Y', strtotime($tgl_cekin));
$tgl_cekout= strftime('%A, %d %B %Y', strtotime($tgl_cekout));

$nama_bulan=array('','Januari','Februari', 'Maret','April', 'Mei', 'Juni', 'Juli', 'Agustus','September','Oktober','November','Desember');

$tanggal=DATE("d");
$bulan=DATE("M");
$tahun=DATE("Y");

$jam=DATE("H");
$menit=DATE("i");

$tanggal_jam="$tanggal-$bulan-$tahun"."&nbsp;".$jam.":".$menit;

$biaya=$harga*$lama;

echo"
<div style='width:250px'>
<center>Guesthouse
Michael dan Agnes</center>
<center><prev>Jl. Sei kapuas no.74-76 Medan</prev></center>
<center>Telp.(061) 4523810 <br>  fax (061) 4571165 </center>
";

echo"
	<div style='text-align:right;font-size:10px'>$tanggal_jam</div>
";

echo "<table width='250'>";
echo $kamar;

foreach($_SESSION['item'] as $index=>$barang)
{
$no++;
$nama=$barang['nama'];
		$harga=$barang['harga'];
		$jumlah=$barang['jumlah'];
		$total=$barang['total'];
		$harga1=$jumlah*$harga;

$harga3=number_format($harga, 0 , ',' , '.' );
$harga2=number_format($harga1, 0 , ',' , '.' );
echo"
	<tr>
		<td colspan='2'>$nama</td>
	</tr>
	<tr>
		<td>$jumlah x @$harga</td>
		<td align='right'>Rp. $harga2</td>
	</tr>
";
}

$total_bayar="Rp. ".number_format($total_bayar, 0 , ',' , '.' );
$bayar="Rp. ".number_format($bayar, 0 , ',' , '.' );
$kembalian="Rp. ".number_format($kembalian, 0 , ',' , '.' );
echo "
	<tr>
		<td colspan='2' align='right'>Total: $total_bayar</td>
	</tr>
	<tr>
		<td colspan='2' align='right'>Bayar: $bayar</td>
	</tr>
	<tr>
		<td colspan='2' align='right'>Kembali: $kembalian</td>
	</tr>
";
echo "</table>";

?>
<script type="text/javascript">
window.print();
window.location = "reset.php";
window.onfocus=function(){ window.close();}
</script>