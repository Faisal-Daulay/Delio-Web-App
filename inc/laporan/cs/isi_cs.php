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

$pilih=$_REQUEST['pilih'];

if($pilih!="all")
{
?>
<h1 align="right">PT.Delio Universal Eramedia</h1>
<h4 align="right">Jl. Setia Budi Gg Rambutan Komp. Prima Villa 1</h4>
<h4 align="right">(061) 8217284 </h4>
<h4 align="center">Laporan dari tanggal <?php echo $tgls; ?> sampai tanggal <?php echo $tgle; ?></h4>
<table border="1" class="table table-striped table-striped table-bordered" align="center">
<tr class='centertd'>
	<td>No</td>
    <td>Nama CS</td>
    <td>Total Jumlah Item</td>
    <td>Total Pendapatan</td>
</tr>
<?php
$s=mysql_query("SELECT sum(jumlah) as jumlah1, nama_produk, sum(masuk) as total1
FROM penjualan pe, customer c, produk p, kat_produk k, orderan o, provinsi co, karyawan ka
WHERE o.id_customer = c.id_customer
AND pe.id_produk = p.id_produk
AND p.id_k_pr = k.id_k_pr
AND pe.invoice = o.invoice and c.code_provinsi=co.code_provinsi and o.id_karyawan=ka.id_karyawan
AND ka.id_karyawan='$pilih' and o.tgl_jual>='$start' and o.tgl_jual<='$end' group by ka.id_karyawan ");
$no=1;

$jumlahSeluruh=0;
$n2=0;
while($data=mysql_fetch_array($s))
{
	$tt=$data['tgl_jual'];
	list($year, $month, $day) = split('-', $tt);

	$tgl=$day."-".$month."-".$year;

	?>
	<tr>
		<td><?php echo $no; ?></td>
        <td align="center"><?php echo $data['nama_karyawan']; ?></td>
        <td align="center"><?php echo $data['jumlah1']; ?></td>
        <td align="center" class="rupiahformat"><?php echo $data['total1']; ?></td>
	</tr>

	<?php
	$jumlahSeluruh=$jumlahSeluruh+$o[jumlah1];
    $n2=$n2+$o[total1];
	$no++;
}

?>
	<tr>
		<td colspan=2 align=center>Total</td>
		<td align=right ><?php echo $jumlahSeluruh; ?></td>
		<td align=right  class="rupiahformat"><?php echo $n2; ?></td>
	</tr>
</table>
<?php } 

else {
	?>
	<h1 align="right">PT.Delio Universal Eramedia</h1>
<h4 align="right">Jl. Setia Budi Gg Rambutan Komp. Prima Villa 1 </h4>
<h4 align="right">(061) 8217284 </h4>
<h4 align="center">Laporan dari tanggal <?php echo $tgls; ?> sampai tanggal <?php echo $tgle; ?></h4>
<table border="1" class="table table-striped table-striped table-bordered" align="center">
<tr class='centertd'>
	<td>No</td>
    <td>Nama CS</td>
    <td>Total Jumlah Item</td>
    <td>Total Pendapatan</td>  
	
</tr>
<?php
$s=mysql_query("SELECT *, sum(jumlah) as jumlah1, nama_produk, sum(masuk) as total1
FROM penjualan pe, customer c, produk p, kat_produk k, orderan o, provinsi co, karyawan ka
WHERE o.id_customer = c.id_customer
AND pe.id_produk = p.id_produk
AND p.id_k_pr = k.id_k_pr
AND pe.invoice = o.invoice and c.code_provinsi=co.code_provinsi and o.id_karyawan=ka.id_karyawan
AND o.tgl_jual>='$start' and o.tgl_jual<='$end' group by ka.id_karyawan");
$no=1;
$jumlahSeluruh=0;
$n2=0;

while($data=mysql_fetch_array($s))
{
	$tt=$data['tgl_jual'];
	list($year, $month, $day) = split('-', $tt);

	$tgl=$day."-".$month."-".$year;

?>
	<tr>
		<td><?php echo $no; ?></td>
        <td align="center"><?php echo $data['nama_karyawan']; ?></td>
        <td align="center"><?php echo $data['jumlah1']; ?></td>
        <td align="center" class="rupiahformat"><?php echo $data['total1']; ?></td>
   	</tr>
<?php
$jumlahSeluruh=$jumlahSeluruh+$data[jumlah1];
    $n2=$n2+$data[total1];
	$no++;
}

?>
<tr>
	<td colspan=2 align=center>Total</td>
	<td align=center ><?php echo $jumlahSeluruh; ?></td>
	<td align=center class="rupiahformat"><?php echo $n2; ?></td>
</tr>
</table>
	<?php
}

?>
