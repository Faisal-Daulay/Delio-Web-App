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
<table border="1" class="table table-striped table-striped table-bordered" align="center">
<tr class='centertd'>
	<td>No.</td>
    <td>Invoice</td>
    <td>No.Hp</td>
    <td>Nama Customer</td>
    <td>Tanggal</td>
    <td>Produk</td>
    <td>Provinsi</td>
    <td>Jumlah Barang</td>
    <td>Total Keseluruhan</td>
</tr>
<?php
$s=mysql_query("SELECT *
FROM penjualan pe, customer c, produk p, kat_produk k, orderan o, provinsi co, karyawan ka
WHERE o.id_customer = c.id_customer
AND pe.id_produk = p.id_produk
AND p.id_k_pr = k.id_k_pr
AND pe.invoice = o.invoice and c.code_provinsi=co.code_provinsi and o.id_karyawan=ka.id_karyawan
AND ka.id_karyawan='$pilih' and o.tgl_jual>='$start' and o.tgl_jual<='$end' group by ka.id_karyawan ");
$no=1;

while($data=mysql_fetch_array($s))
{
		$tt=$data['tgl_jual'];
list($year, $month, $day) = split('-', $tt);

$tgl=$day."-".$month."-".$year;

	?>
	<tr>
		 <td><?php echo $no; ?></td>
                <td align="center"><?php echo $data['invoice']; ?></td>
                <td align="center"><?php echo $data['no_tlpn']; ?></td>
                <td align="center"><?php echo $data['nama']; ?></td>
                <td align="center"><?php echo $tgl;?></td>
                <td align="center"><?php echo $data['nama_produk']; ?></td>
                <td align="center"><?php echo $data['nama_provinsi']; ?></td>
                <td align="right"><?php echo $data['jumlah'];?></td>                                    
                <td align="right" class="rupiahformat"><?php echo $data['masuk'];?></td>
	</tr>

	<?php
	$no++;
}

?>
<tr>
	<td colspan=7 align=center>Total</td>
	<?php $p=mysql_query("SELECT *, sum(jumlah) as jumlah1, sum(masuk) as total1
FROM penjualan pe, customer c, produk p, kat_produk k, orderan o, provinsi co, karyawan ka
WHERE o.id_customer = c.id_customer
AND pe.id_produk = p.id_produk
AND p.id_k_pr = k.id_k_pr
AND pe.invoice = o.invoice and c.code_provinsi=co.code_provinsi and o.id_karyawan=ka.id_karyawan
AND ka.id_karyawan='$pilih' and o.tgl_jual>='$start' AND o.tgl_jual<='$end' GROUP BY ka.id_karyawan "); 

$g=mysql_fetch_array($p);
$jumlah1=$g['jumlah1'];
$n=$g['total1'];

?><td align=right ><?php echo $jumlah1; ?></td>
<td align=right  class="rupiahformat"><?php echo $n; ?></td>
</tr>
</table>
<?php } 

else {
	?>
	<h1 align="right">PT.Delio Universal Eramedia</h1>
<h4 align="right">Jl. Cengkeh No.9 Pasar 2 Setia Budi Medan</h4>
<h4 align="right">(061) 8217284 </h4>
<table border="1" class="table table-striped table-striped table-bordered" align="center">
<tr class='centertd'>
	<td>No.</td>
	<td>Invoice</td>
                <td>No.Hp</td>
                <td>Nama Customer</td>
                <td>Tanggal</td>
                <td>Produk</td>
                 <td>Provinsi</td>
                <td>Jumlah Barang</td>
                <td>Total Keseluruhan</td>      
	
</tr>
<?php
$s=mysql_query("SELECT *
FROM penjualan pe, customer c, produk p, kat_produk k, orderan o, provinsi co, karyawan ka
WHERE o.id_customer = c.id_customer
AND pe.id_produk = p.id_produk
AND p.id_k_pr = k.id_k_pr
AND pe.invoice = o.invoice and c.code_provinsi=co.code_provinsi and o.id_karyawan=ka.id_karyawan
AND o.tgl_jual>='$start' and o.tgl_jual<='$end'");
$no=1;

while($data=mysql_fetch_array($s))
{
		$tt=$data['tgl_jual'];
list($year, $month, $day) = split('-', $tt);

$tgl=$day."-".$month."-".$year;

?>
	<tr>
		 <td><?php echo $no; ?></td>
                <td align="center"><?php echo $data['invoice']; ?></td>
                <td align="center"><?php echo $data['no_tlpn']; ?></td>
                <td align="center"><?php echo $data['nama']; ?></td>
                <td align="center"><?php echo $tgl;?></td>
                <td align="center"><?php echo $data['nama_produk']; ?></td>
                <td align="center"><?php echo $data['nama_provinsi']; ?></td>
                <td align="right"><?php echo $data['jumlah'];?></td>                                    
                <td align="right" class="rupiahformat"><?php echo $data['masuk'];?></td>
                
	
	</tr>
<?php
	$no++;
}

?>
<tr>
	<td colspan=7 align=center>Total</td>
	<?php $p=mysql_query("SELECT *, sum(jumlah) as jumlah1, sum(masuk) as total1
FROM penjualan pe, customer c, produk p, kat_produk k, orderan o
WHERE o.id_customer = c.id_customer
AND pe.id_produk = p.id_produk
AND p.id_k_pr = k.id_k_pr
AND pe.invoice = o.invoice
and  o.tgl_jual>='$start' AND o.tgl_jual<='$end' GROUP BY p.id_k_pr "); 
$g=mysql_fetch_array($p);
$jumlah1=$g['jumlah1'];
$n=$g['total1'];

?><td align=right ><?php echo $jumlah1; ?></td>
<td align=right class="rupiahformat"><?php echo $n; ?></td>
</tr>
</table>
	<?php
}

?>
