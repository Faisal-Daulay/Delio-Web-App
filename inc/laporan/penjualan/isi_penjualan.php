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
?>
<h1 align="right">PT.Delio Universa Eramedia</h1>
<h4 align="right">Jl. Setia Budi Gg Rambutan Komp. Prima Villa 1</h4>
<h4 align="right">(061) 8217284 </h4>
<table border="1" class="table table-striped table-striped table-bordered" align=center">
<tr class='centertd'>
	   <td>No.</td>
                <td>Invoice</td>
                <td>Nama Customer</td>
                <td>Tanggal</td>
                <td>Ongkir</td>
                <td>Ongkir Supplier</td>
                <td>Total</td>
	
</tr>
<?php
$s=mysql_query("SELECT *
FROM penjualan pe, customer c, produk p, kat_produk k, orderan o
WHERE o.id_customer = c.id_customer
AND pe.id_produk = p.id_produk
AND p.id_k_pr = k.id_k_pr
AND pe.invoice = o.invoice and o.tgl_jual>='$start' and o.tgl_jual<='$end'
GROUP BY o.invoice ORDER BY o.tgl_jual DESC "); 
$no=1;

while($o=mysql_fetch_array($s))
{
		$tt=$o['tanggal'];
list($year, $month, $day) = split('-', $tt);

$tgl=$day."-".$month."-".$year;

	echo "
	<tr>
		 <td>$no</td>
                <td >$o[invoice]</td>
                <td>$o[nama]</td>
                <td>$o[tgl_jual]</td> 
                  <td align='right'  class='rupiahformat'>$o[ongkir_buy]</td> 
                    <td align='right'  class='rupiahformat'>$o[ongkir_sup]</td>                               
                <td class='rupiahformat' align='right'>$o[total]</td>
	
	</tr>
	";
	$no++;
}

?>
<tr>
	
	<?php $p=mysql_query("select sum(total) as total1 from orderan where tgl_jual>='$start' AND tgl_jual<='$end' "); 
$g=mysql_fetch_array($p);
$n=$g['total1'];

$tottal=$n;

?>
	<td colspan="4" align=center>Total Keseluruhan</td>
	<td align='right' colspan="3" class="rupiahformat" ><?php echo $tottal; ?></td>
</tr>


</table>
