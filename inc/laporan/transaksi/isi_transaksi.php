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


$bank=$_REQUEST['bank'];
if($bank!="all")
{

?>
<h1 align="right">PT.Delio Universal Eramedia</h1>
<h4 align="right">Jl. Setia Budi Gg Rambutan Komp. Prima Villa 1</h4>
<h4 align="right">(061) 8217284 </h4>
<h4 align="center">Laporan dari tanggal <?php echo $tgls; ?> sampai tanggal <?php echo $tgle; ?></h4>
<table border="1" class="table table-striped table-striped table-bordered" align="center" width="960">
<tr class="centertd">
	<td>No</td>
	<td>Tanggal</td>
	<td>Nama Transaksi</td>
	<td>Masuk</td>
	<td>Keluar</td>
	<td>Saldo</td>
</tr>
<?php
$s=mysql_query("SELECT * FROM transaksi 
	where tgl_trans>='$start' and tgl_trans<='$end'");
$no=1;

while($o=mysql_fetch_array($s))
{
	$tt=$o['tgl_trans'];
	list($year, $month, $day) = split('-', $tt);

	$tgl=$day."-".$month."-".$year;

	$kurang = $o['masuk'] - $o['keluar'];

	echo "
	<tr>
	 	<td>$no</td>
	  	<td>$tgl</td>
        <td> $o[namadata]</td>
        <td align=right class='rupiahformat'>  $o[masuk]</td>
        <td align=right class='rupiahformat'>  $o[keluar]</td>
        <td align=right class='rupiahformat'>$kurang</td>
	</tr>
	";
	$no++;
}

?>
<tr>
	<td colspan="3" align=center>Total</td>
	<?php $p=mysql_query("select sum(masuk) as masuk, sum(keluar) as keluar from transaksi where tgl_trans>='$start' AND tgl_trans<='$end' "); 
	$g=mysql_fetch_array($p);
	$n=$g['masuk'];
	$n1=$g['keluar'];

	$tottal=$n-$n1;

	?>
	<td align='right' class="rupiahformat" ><?php echo $n; ?></td>
	<td align='right' class="rupiahformat" ><?php echo $n1; ?></td>
</tr>
<tr>
	<td colspan="5" align="left">Total Keseluruhan</td>
	<td align='right' colspan="3" class="rupiahformat" ><?php echo $tottal; ?></td>
</tr>

</table>

<?php } 

else {


	?>
	<h1 align="right">PT.Delio Universal Eramedia</h1>
<h4 align="right">Jl. Setia Budi Gg Rambutan Komp. Prima Villa 1</h4>
<h4 align="right">(061) 8217284 </h4>
<h4 align="center">Laporan dari tanggal <?php echo $tgls; ?> sampai tanggal <?php echo $tgle; ?></h4>
<table border="1" class="table table-striped table-striped table-bordered" align="center" width="960">
<tr class="centertd">
	<td>No</td>
	<td>Tanggal</td>
	<td>Nama Transaksi</td>
	<td>Masuk</td>
	<td>Keluar</td>
	<td>Saldo</td>
</tr>
<?php
$s=mysql_query("SELECT * FROM transaksi 
	where bankterima='$bank' and tgl_trans>='$start' and tgl_trans<='$end'");
$no=1;

while($o=mysql_fetch_array($s))
{
		$tt=$o['tgl_trans'];
list($year, $month, $day) = split('-', $tt);

$tgl=$day."-".$month."-".$year;

$kurang = $o['masuk'] - $o['keluar'];

	echo "
	<tr>
	 	<td>$no</td>
	  	<td>$tgl</td>
        <td> $o[namadata]</td>
        <td align=right class='rupiahformat'>  $o[masuk]</td>
        <td align=right class='rupiahformat'>  $o[keluar]</td>
        <td align=right class='rupiahformat'>$kurang</td>
	</tr>
	";
	$no++;
}

?>
<tr>
	<td colspan="3" align=center>Total</td>
	<?php $p=mysql_query("select sum(masuk) as masuk, sum(keluar) as keluar from transaksi where tgl_trans>='$start' AND tgl_trans<='$end' "); 
$g=mysql_fetch_array($p);
$n=$g['masuk'];
$n1=$g['keluar'];

$tottal=$n-$n1;

?>
<td align='right' class="rupiahformat" ><?php echo $n; ?></td>
<td align='right' class="rupiahformat" ><?php echo $n1; ?></td>
</tr>
<tr>
	<td colspan="3" align=center>Total Keseluruhan</td>
	<td align='right' colspan="3" class="rupiahformat" ><?php echo $tottal; ?></td>
</tr>

</table>


	<?php
}

?>

