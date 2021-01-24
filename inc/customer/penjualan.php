<div class="panel-heading">
    <label>Data Penjualan</label>
</div>
<!-- /.panel-heading -->
<div class="panel-body">
<div class="table-responsive">
    <?php
        include 'config/koneksi.php';
        $id=$_REQUEST['id'];

        $produk=mysql_query("SELECT *
        FROM penjualan pe, customer c, produk p, kat_produk k, orderan o, karyawan ka
        WHERE o.id_customer = c.id_customer
        AND pe.id_produk = p.id_produk
        AND p.id_k_pr = k.id_k_pr
        AND pe.invoice = o.invoice and o.id_karyawan=ka.id_karyawan and c.id_customer='$id' and o.statusbayar='Sudah Bayar'
        GROUP BY o.invoice ORDER BY o.tgl_jual DESC");
        $no++;
    ?>
   
    <table class="table table-bordered table-hover" id="dataTables-example">
        <thead>
            <tr class="centertd">
                <td>No.</td>
                <td>Invoice</td>
                <td>No.Hp</td>
                <td>Nama Customer</td>
                <td>Tanggal</td>
                <td>Jumlah Barang</td>
                <td>Total Keseluruhan</td>
                <td>Keterangan</td>
                <td>CS</td>
                <td>Action</td>
            </tr>
        </thead>
        <tbody>
            <?php
                while ($data=mysql_fetch_array($produk)) {
                $status=$data['statusbayar'];  
                if ($status=='Sudah Bayar') {
                    $warna="merah";
                    $sb = "Sudah Bayar";
                }
                else if ($status=='Belum Bayar') {
                    $warna="hijau";
                    $bb = "Belum Bayar";
                }
                else{
                    $warna='';
                }
            
            ?>

            <tr class="tooltip-demo <?php echo $warna?>" align="center">
                <td><?php echo $no++; ?></td>
                <td><?php echo $data['invoice']; ?></td>
                <td><?php echo $data['no_tlpn']; ?></td>
                <td><?php echo $data['nama']; ?></td>
                <td><?php echo $data['tgl_jual'];?></td>
                <td><?php echo $data['jumlah'];?></td>                                    
                <td class="rupiahformat"><?php echo $data['masuk'];?></td>
                <td><?php echo $data['statusbayar'];?></td>
                <td><?php echo $data['nama_karyawan'];?></td>  
                <td>
                    &nbsp;&nbsp;&nbsp;
                    <?php echo "<a data-toggle='tooltip' data-placement='top' title='Edit' href=\"?psg=penjualan/detail_penjualan&inv=$data[invoice]\"><i class='glyphicon glyphicon-pencil'></i> "?>
                </td>      
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
<!-- /.table-responsive -->