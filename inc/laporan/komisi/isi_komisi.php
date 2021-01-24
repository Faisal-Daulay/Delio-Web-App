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
<h4 align="right">Jl. Cengkeh No.9 Pasar 2 Setia Budi Medan</h4>
<h4 align="right">(061) 8217284 </h4>
<table border="1" class="table table-striped table-striped table-bordered" align=center">
<tr class='centertd'>
	<td>No</td>
	<td>Tanggal</td>
    <td>Nama Karyawan</td>
    <td>No.Invoice</td>                                
    <td>Nominal</td>
	
</tr>
<?php
$s=mysql_query("SELECT *
FROM orderan o
LEFT JOIN komisi_karyawan kk ON kk.invoice = o.invoice
LEFT JOIN karyawan k ON kk.id_karyawan = k.id_karyawan WHERE k.id_karyawan='$pilih' and o.tgl_jual>='$start' and o.tgl_jual<='$end'");
$no=1;

while($o=mysql_fetch_array($s))
{
		$tt=$o['tgl_jual'];
list($year, $month, $day) = split('-', $tt);

$tgl=$day."-".$month."-".$year;

	echo "
	<tr>
		<td>$no</td>
		<td>$tgl</td>
        <td>$o[nama_karyawan]</td>
        <td>$o[invoice]</td>               
        <td align=right class='rupiahformat'> $o[nominal]</td>	
	</tr>
	";
	$no++;
}

?>
<tr>
	<td colspan=4 align=center>Total</td>
	<?php $p=mysql_query("select sum(nominal) as total from karyawan k, komisi_karyawan ko , orderan o
	 where k.id_karyawan=ko.id_karyawan and ko.invoice=o.invoice and ko.id_karyawan='$pilih' and o.tgl_jual>='$start' AND o.tgl_jual<='$end' "); 
$g=mysql_fetch_array($p);
$n=$g['total'];

?><td align=right colspan=2><?php echo $n; ?></td>
</tr>
</table>
<?php } 

else {
	?>
	<h1 align="right">PT.Delio Universal Eramedia</h1>
<h4 align="right">Jl. Cengkeh No.9 Pasar 2 Setia Budi Medan</h4>
<h4 align="right">(061) 8217284 </h4>
<table border="1" class="table table-striped table-striped table-bordered" align=center">
<tr class='centertd'>
	<td>No</td>
	<td>Tanggal</td>
    <td>Nama Karyawan</td>
    <td>No.Invoice</td>                                
    <td>Nominal</td>
	
</tr>
<?php
$s=mysql_query("SELECT *
FROM orderan o
LEFT JOIN komisi_karyawan kk ON kk.invoice = o.invoice
LEFT JOIN karyawan k ON kk.id_karyawan = k.id_karyawan WHERE o.tgl_jual>='$start' and o.tgl_jual<='$end'");
$no=1;

while($o=mysql_fetch_array($s))
{
		$tt=$o['tgl_jual'];
list($year, $month, $day) = split('-', $tt);

$tgl=$day."-".$month."-".$year;

	echo "
	<tr>
		 <td>$no</td>
		  <td>$tgl</td>
                <td> $o[nama_karyawan]</td>
                <td>  $o[invoice]</td>
               
                <td align=right> $o[nominal]</td>
                
	
	</tr>
	";
	$no++;
}

?>
<tr>
	<td colspan=4 align=center>Total</td>
	<?php $p=mysql_query("select sum(nominal) as total from komisi_karyawan ko , orderan o
	 where ko.invoice=o.invoice and o.tgl_jual>='$start' AND o.tgl_jual<='$end' "); 
$g=mysql_fetch_array($p);
$n=$g['total'];

?><td align=right colspan=2><?php echo $n; ?></td>
</tr>
</table>
	<?php
}

?>
