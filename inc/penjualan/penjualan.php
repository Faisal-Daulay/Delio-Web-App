<div class="panel-heading">
    <label>Data Penjualan</label>
</div>
<!-- /.panel-heading -->
<div class="panel-body">
<div class="table-responsive">
    <?php
        include 'config/koneksi.php';

        $produk=mysql_query("SELECT *, pr.status as statpro FROM penjualan pe LEFT JOIN proff pr ON pe.invoice=pr.invoice INNER JOIN produk p 
        ON pe.id_produk = p.id_produk INNER JOIN kat_produk k ON p.id_k_pr = k.id_k_pr 
        INNER JOIN orderan o ON pe.invoice = o.invoice INNER JOIN customer c 
        ON o.id_customer = c.id_customer INNER JOIN karyawan ka ON o.id_karyawan=ka.id_karyawan 
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
                <td>Valid</td>
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
                <td><?php echo $data['statpro'];?></td> 
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