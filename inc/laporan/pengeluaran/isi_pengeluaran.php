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
$bank=$_REQUEST['bank'];


if($bank!="all")
{
?>
<h1 align="right">PT.Delio Universal Eramedia</h1>
<h4 align="right">Jl. Setia Budi Gg Rambutan Komp. Prima Villa 1</h4>
<h4 align="right">(061) 8217284 </h4>
<table border="1" class="table table-striped table-striped table-bordered" align="center">
<tr class='centertd'>
	<td>No</td>
	<td>Tanggal</td>
    <td>Kategori</td>
    <td>Nama Pengeluaran</td>                                
    <td>Jumlah</td>
                
	
</tr>
<?php
$s=mysql_query("SELECT * FROM pengeluaran p, kat_pengeluaran k 
	where p.id_k_pe=k.id_k_pe and p.bank='$bank' and p.tanggal>='$start' and p.tanggal<='$end'");
$no=1;

while($o=mysql_fetch_array($s))
{
		$tt=$o['tanggal'];
list($year, $month, $day) = split('-', $tt);

$tgl=$day."-".$month."-".$year;

	echo "
	<tr>
		 <td>$no</td>
		  <td>$tgl</td>
                <td> $o[nama_katp]</td>
                <td>  $o[nama_pengeluaran]</td>
               
                <td align=right class='rupiahformat'> $o[nominal]</td>
               
	
	</tr>
	";
	$no++;
}

?>
<tr>
	<td colspan=4 align=center>Total</td>
	<?php $p=mysql_query("select sum(nominal) as total from pengeluaran where bank='$bank' and tanggal>='$start' AND tanggal<='$end' "); 
$g=mysql_fetch_array($p);
$n=$g['total'];

?><td align=right colspan=2 class='rupiahformat'><?php echo $n; ?></td>
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
	<td>Tanggal</td>
    <td>Kategori</td>
    <td>Nama Pengeluaran</td>                                
    <td>Jumlah</td>
                
	
</tr>
<?php
$s=mysql_query("SELECT * FROM pengeluaran p, kat_pengeluaran k 
	where p.id_k_pe=k.id_k_pe and p.tanggal>='$start' and p.tanggal<='$end'");
$no=1;

while($o=mysql_fetch_array($s))
{
		$tt=$o['tanggal'];
list($year, $month, $day) = split('-', $tt);

$tgl=$day."-".$month."-".$year;

	echo "
	<tr>
		 <td>$no</td>
		  <td>$tgl</td>
                <td> $o[nama_katp]</td>
                <td>  $o[nama_pengeluaran]</td>
               
                <td align=right class='rupiahformat'> $o[nominal]</td>
               
	
	</tr>
	";
	$no++;
}

?>
<tr>
	<td colspan=4 align=center>Total</td>
	<?php $p=mysql_query("select sum(nominal) as total from pengeluaran where tanggal>='$start' AND tanggal<='$end' "); 
$g=mysql_fetch_array($p);
$n=$g['total'];

?><td align=right colspan=2 class='rupiahformat'><?php echo $n; ?></td>
</tr>

</table>
	<?php } ?>