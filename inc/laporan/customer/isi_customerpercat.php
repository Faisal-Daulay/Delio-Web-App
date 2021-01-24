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
$bank=$_REQUEST['bank'];

?>
<h1 align="right">PT.Delio Universal Eramedia</h1>
<h4 align="right">Jl. Setia Budi Gg Rambutan Komp. Prima Villa 1</h4>
<h4 align="right">(061) 8217284 </h4>
<h4 align="center">Laporan dari tanggal <?php echo $tgls; ?> sampai tanggal <?php echo $tgle; ?></h4>
<table border="1" class="table table-striped table-striped table-bordered" align="center">
<tr class='centertd'>
	<td>No.</td>
    <td>Invoice</td>
    <td>No.Hp</td>
    <td>Nama Customer</td>
    <td>Tanggal</td>
    <td>Kategori</td>
    <td>Provinsi</td>
    <td>Jumlah Barang</td>
    <td>Total Barang</td>
    <td>Ongkir</td>
    <td>Total Keseluruhan</td>
</tr>
<?php
if($pilih!="all" && $bank!="all")
{

$s=mysql_query("SELECT *
FROM penjualan pe, customer c, produk p, kat_produk k, orderan o, provinsi co
WHERE o.id_customer = c.id_customer
AND pe.id_produk = p.id_produk
AND p.id_k_pr = k.id_k_pr
AND pe.invoice = o.invoice and c.code_provinsi=co.code_provinsi
AND k.id_k_pr='$pilih' AND o.viabayar='$bank' and o.tgl_jual>='$start' and o.tgl_jual<='$end' group by o.invoice");
$no=1;
$jumlahSeluruh=0;
$n2=0;
$x2=0;
$m2=0;
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
        <td align="center"><?php echo $data['nama_katpr']; ?></td>
        <td align="center"><?php echo $data['nama_provinsi']; ?></td>
        <td align="right"><?php echo $data['jumlah'];?></td>                                    
        <td align="right" class="rupiahformat"><?php echo $data['masuk'];?></td>
        <td align="right" class="rupiahformat"><?php echo $data['ongkir_buy'];?></td>
        <td align="right" class="rupiahformat"><?php echo $data['total'];?></td>
	</tr>

<?php

    $jumlahSeluruh=$jumlahSeluruh+$data[jumlah];
    $n2=$n2+$data[masuk];
    $m2=$m2+$data[total];
    $x2=$x2+$data[ongkir_buy];
    $no++;

}

?>
<tr>
    <td colspan='7' align='left'>Total</td>
<td align=right ><?php echo $jumlahSeluruh; ?></td>
<td align=right  class="rupiahformat"><?php echo $n2; ?></td>
<td align=right  class="rupiahformat"><?php echo $x2; ?></td>
<td align=right  class="rupiahformat"><?php echo $m2; ?></td>

</tr>
</table>

<?php } 

elseif($pilih=="all" && $bank!="all")
{

$s=mysql_query("SELECT *
FROM penjualan pe, customer c, produk p, kat_produk k, orderan o, provinsi co
WHERE o.id_customer = c.id_customer
AND pe.id_produk = p.id_produk
AND p.id_k_pr = k.id_k_pr
AND pe.invoice = o.invoice and c.code_provinsi=co.code_provinsi
AND o.viabayar='$bank' and o.tgl_jual>='$start' and o.tgl_jual<='$end' group by o.invoice");
$no=1;
$jumlahSeluruh=0;
$n2=0;
$x2=0;
$m2=0;

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
        <td align="center"><?php echo $data['nama_katpr']; ?></td>
        <td align="center"><?php echo $data['nama_provinsi']; ?></td>
        <td align="right"><?php echo $data['jumlah'];?></td>                                    
        <td align="right" class="rupiahformat"><?php echo $data['masuk'];?></td>

        <td align="right" class="rupiahformat"><?php echo $data['ongkir_buy'];?></td>
        <td align="right" class="rupiahformat"><?php echo $data['total'];?></td>
    </tr>

    <?php

    $jumlahSeluruh=$jumlahSeluruh+$data[jumlah];
    $n2=$n2+$data[masuk];
    $m2=$m2+$data[total];
    $x2=$x2+$data[ongkir_buy];
    $no++;

}

?>
<tr>
    <td colspan='7' align='left'>Total</td>
<td align=right ><?php echo $jumlahSeluruh; ?></td>
<td align=right  class="rupiahformat"><?php echo $n2; ?></td>
<td align=right  class="rupiahformat"><?php echo $x2; ?></td>
<td align=right  class="rupiahformat"><?php echo $m2; ?></td>
</tr>
</table>
<?php }
elseif($pilih!="all" && $bank=="all")
{

$s=mysql_query("SELECT *
FROM penjualan pe, customer c, produk p, kat_produk k, orderan o, provinsi co
WHERE o.id_customer = c.id_customer
AND pe.id_produk = p.id_produk
AND p.id_k_pr = k.id_k_pr
AND pe.invoice = o.invoice and c.code_provinsi=co.code_provinsi
AND k.id_k_pr='$pilih' and o.tgl_jual>='$start' and o.tgl_jual<='$end' group by o.invoice");
$no=1;
$jumlahSeluruh=0;
$n2=0;
$x2=0;
$m2=0;

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
        <td align="center"><?php echo $data['nama_katpr']; ?></td>
        <td align="center"><?php echo $data['nama_provinsi']; ?></td>
        <td align="right"><?php echo $data['jumlah'];?></td>                                    
        <td align="right" class="rupiahformat"><?php echo $data['masuk'];?></td>
        <td align="right" class="rupiahformat"><?php echo $data['ongkir_buy'];?></td>
        <td align="right" class="rupiahformat"><?php echo $data['total'];?></td>
    </tr>

    <?php


    $jumlahSeluruh=$jumlahSeluruh+$data[jumlah];
    $n2=$n2+$data[masuk];
    $m2=$m2+$data[total];
    $x2=$x2+$data[ongkir_buy];
    $no++;

}

?>
<tr>
    <td colspan='7' align='left'>Total</td>
<td align=right ><?php echo $jumlahSeluruh; ?></td>
<td align=right  class="rupiahformat"><?php echo $n2; ?></td>
<td align=right  class="rupiahformat"><?php echo $x2; ?></td>
<td align=right  class="rupiahformat"><?php echo $m2; ?></td>
</tr>
</table>
<?php }
else {

$s=mysql_query("SELECT *
FROM penjualan pe, customer c, produk p, kat_produk k, orderan o, provinsi co
WHERE o.id_customer = c.id_customer
AND pe.id_produk = p.id_produk
AND p.id_k_pr = k.id_k_pr
AND pe.invoice = o.invoice and c.code_provinsi=co.code_provinsi
AND o.tgl_jual>='$start' and o.tgl_jual<='$end' group by o.invoice");
$no=1;
$jumlahSeluruh=0;
$n2=0;
$x2=0;
$m2=0;

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
        <td align="center"><?php echo $data['nama_katpr']; ?></td>
        <td align="center"><?php echo $data['nama_provinsi']; ?></td>
        <td align="right"><?php echo $data['jumlah'];?></td>
        <td align="right" class="rupiahformat"><?php echo $data['masuk'];?></td>
        <td align="right" class="rupiahformat"><?php echo $data['ongkir_buy'];?></td>
        <td align="right" class="rupiahformat"><?php echo $data['total'];?></td>
	</tr>
<?php

    $jumlahSeluruh=$jumlahSeluruh+$data[jumlah];
    $n2=$n2+$data[masuk];
    $m2=$m2+$data[total];
    $x2=$x2+$data[ongkir_buy];
	$no++;

}

?>
<tr>
	<td colspan='7' align='left'>Total</td>
    <td align=right ><?php echo $jumlahSeluruh; ?></td>
    <td align=right  class="rupiahformat"><?php echo $n2; ?></td>
    <td align=right  class="rupiahformat"><?php echo $x2; ?></td>
    <td align=right  class="rupiahformat"><?php echo $m2; ?></td>
</tr>
</table>
	<?php
}

?>
