<?php
$start=date('Y-m-d',strtotime($_REQUEST['start']));
$end=date('Y-m-d',strtotime($_REQUEST['end']));

if (isset($_REQUEST['psg']))
	include "config/koneksi.php";
else
{
	include "../../../config/koneksi.php";
	echo '<link href="../style_print.css" rel="stylesheet" type="text/css" />';
}

$pilih=$_REQUEST['pilih'];

if($pilih!="all")
{
?>
<h1 align="right">PT.Delio Universal Eramedia</h1>
<h4 align="right">Jl. Setia Budi Gg Rambutan Komp. Prima Villa 1</h4>
<h4 align="right">(061) 8217284 </h4>
<table border="1" class="table table-striped table-striped table-bordered" align="center">
<tr class='centertd'>
	<td>No</td>
	<td>Nama Produk</td>
    <td>Total Jumlah Item</td>
    <td>Total Pendapatan</td>                                
    
	
</tr>
<?php
$s=mysql_query("SELECT sum(jumlah) as jumlah1, nama_produk, sum(masuk) as total1
FROM penjualan pe
LEFT JOIN produk p ON p.id_produk = pe.id_produk
LEFT JOIN kat_produk k ON p.id_k_pr = k.id_k_pr 
LEFT JOIN orderan o ON pe.invoice=o.invoice
WHERE k.id_k_pr='$pilih' and o.tgl_jual>='$start' and o.tgl_jual<='$end' group by p.id_produk");
$no=1;
$jumlahSeluruh=0;
$n2=0;
$x2=0;
$m2=0;

while($o=mysql_fetch_array($s))
{
		$tt=$o['tgl_jual'];
list($year, $month, $day) = split('-', $tt);

$tgl=$day."-".$month."-".$year;

	echo "
	<tr>
		<td>$no</td>
		<td>$o[nama_produk]</td>
        <td align=right>$o[jumlah1]</td>
        <td align=right class='rupiahformat'> $o[total1]</td>	
	</tr>
	";
	  $jumlahSeluruh=$jumlahSeluruh+$data[jumlah1];
    $n2=$n2+$data[masuk1];
	$no++;
}

?>
<tr>
	<td colspan=2 align=center>Total</td>
?><td align=right ><?php echo $jumlahSeluruh; ?></td>
<td align=right  class="rupiahformat"><?php echo $n2; ?></td>
</tr>
</table>
<?php } 

else {
	?>
	<h1 align="right">PT.Delio Universal Eramedia</h1>
<h4 align="right">Jl. Setia Budi Gg Rambutan Komp. Prima Villa 1</h4>
<h4 align="right">(061) 8217284 </h4>
<table border="1" class="table table-striped table-striped table-bordered" align="center">
<tr class='centertd'>
	<td>No</td>
	<td>Nama Produk</td>
    <td>Total Jumlah Item</td>
    <td>Total Pendapatan</td> 
	
</tr>
<?php
$s=mysql_query("SELECT sum(jumlah) as jumlah1, nama_produk, sum(masuk) as total1
FROM penjualan pe
LEFT JOIN produk p ON p.id_produk = pe.id_produk
LEFT JOIN kat_produk k ON p.id_k_pr = k.id_k_pr 
LEFT JOIN orderan o ON pe.invoice=o.invoice
WHERE o.tgl_jual>='$start' and o.tgl_jual<='$end' group by p.id_produk");
$no=1;
$jumlahSeluruh=0;
$n2=0;
$x2=0;
$m2=0;

while($o=mysql_fetch_array($s))
{
		$tt=$o['tgl_jual'];
list($year, $month, $day) = split('-', $tt);

$tgl=$day."-".$month."-".$year;

	echo "
	<tr>
		<td>$no</td>
		<td>$o[nama_produk]</td>
        <td align=right>$o[jumlah1]</td>
        <td align=right class='rupiahformat'> $o[total1]</td>
	</tr>
	";
	  $jumlahSeluruh=$jumlahSeluruh+$data[jumlah1];
    $n2=$n2+$data[masuk1];
	$no++;
}

?>
<tr>
	<td colspan=2 align=center>Total</td>
	<td align=right ><?php echo $jumlahSeluruh; ?></td>
	<td align=right  class="rupiahformat"><?php echo $n2; ?></td>
</tr>
</table>
	<?php
}

?>
