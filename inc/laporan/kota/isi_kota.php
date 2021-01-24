<?php
$start=date('Y-m-d',strtotime($_REQUEST['start']));
$end=date('Y-m-d',strtotime($_REQUEST['end']));

list($years, $months, $days) = split('-', $start);
$tgls=$days."-".$months."-".$years;

list($yeare, $monthe, $daye) = split('-', $end);
$tgle=$daye."-".$monthe."-".$yeare;

if (isset($_REQUEST['psg']))
	include "config/koneksi.php";
else
{
	include "../../../config/koneksi.php";
	echo '<link href="../style_print.css" rel="stylesheet" type="text/css" />';
}



?>
<h1 align="right">PT.Delio Universal Eramedia</h1>
<h4 align="right">Jl. Setia Budi Gg Rambutan Komp. Prima Villa 1</h4>
<h4 align="right">(061) 8217284 </h4>
<h4 align="center">Laporan dari tanggal <?php echo $tgls; ?> sampai tanggal <?php echo $tgle; ?></h4>
<table border="1" class="table table-striped table-striped table-bordered" align="center">
<tr class='centertd'>
	<td>No</td>
	<td>Provinsi</td>
    <td>Total Item</td>
    <td>Total Pendapatan</td>                                
    
	
</tr>
<?php
$s=mysql_query("SELECT *,sum(jumlah) as jumlah1, nama_produk, sum(masuk) as total1
FROM penjualan pe
LEFT JOIN produk p ON p.id_produk = pe.id_produk
LEFT JOIN kat_produk k ON p.id_k_pr = k.id_k_pr 
LEFT JOIN orderan o ON pe.invoice=o.invoice LEFT JOIN customer c ON c.id_customer=o.id_customer 
LEFT JOIN provinsi pr ON c.code_provinsi=pr.code_provinsi
WHERE o.tgl_jual>='$start' and o.tgl_jual<='$end' group by pr.code_provinsi");
$no=1;

$jumlahSeluruh=0;
$n2=0;

while($o=mysql_fetch_array($s))
{
		$tt=$o['tgl_jual'];
list($year, $month, $day) = split('-', $tt);

$tgl=$day."-".$month."-".$year;

	echo "
	<tr>
		<td>$no</td>
		<td>$o[nama_provinsi]</td>
        <td align=right>$o[jumlah1]</td>
        <td align=right class='rupiahformat'> $o[total1]</td>	
	</tr>
	";
	 $jumlahSeluruh=$jumlahSeluruh+$o[jumlah1];
    $n2=$n2+$o[total1];
	$no++;
}

?>
<tr>
	<td colspan=2 align=center>Total</td>
?><td align=right ><?php echo $jumlahSeluruh; ?></td>
<td align=right  class="rupiahformat"><?php echo $n2; ?></td>
</tr>
</table>