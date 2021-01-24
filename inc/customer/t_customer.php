<div class="panel-heading">
    <label>Table Customer</label>
</div>
<!-- /.panel-heading -->
<div class="panel-body">
<div class="table-responsive">
    <?php
        include 'config/koneksi.php';
        $customer1=mysql_query("SELECT * FROM customer LEFT JOIN 
            provinsi ON customer.code_provinsi = provinsi.code_provinsi 
            LEFT JOIN kabupaten ON customer.Id_Kabupaten = kabupaten.Id_Kabupaten 
            LEFT JOIN kecamatan ON customer.kode_kecamatan = kecamatan.kode_kecamatan
            group by customer.id_customer");
        $no++;
    ?>
    <div class="panel-body">
        <a href="?psg=customer/customer"><button type="button" class="btn btn-primary tombol">Tambah Customer</button></a>
    </div>
    <table class="table table-bordered table-hover" id="dataTables-example">
        <thead>
            <tr class="centertd">
                <td>No</td>
                <td>Nama</td>
                <td>No Telepn</td>
                <td>Provinsi</td>
                <td>Kota</td>
                <td>Kecamatan</td>
                <td>Status</td>
                <td>Action</td>
            </tr>
        </thead>
        <tbody>
            <?php
                while ($ambil=mysql_fetch_array($customer1)) {
                $status_cust=$ambil['status_cust'];  
                if ($status_cust=='customer') {
                    $warna1="color1";
                }
                else if ($status_cust=='reseller') {
                    $warna1="color2";
                }
                else{
                    $warna1='';
                }
                            
            ?>
                <tr class="tooltip-demo <?php echo $warna1?>" align="center">
                    <td><?php echo $no++; ?></td>
                    <td><?php echo $ambil['nama'];?></td>
                    <td><?php echo $ambil['no_tlpn']; ?></td>
                    <td><?php echo $ambil['nama_provinsi']; ?></td>
                    <td><?php echo $ambil['nama_kabkot']; ?></td>
                    <td><?php echo $ambil['nama_kecamatan']; ?></td>
                    <td><?php echo $ambil['status_cust']; ?></td>
                    <td>
                      &nbsp;
                        <?php echo "<a data-toggle='tooltip' data-placement='top' title='Show' href=\"?psg=customer/penjualan&id=$ambil[id_customer]\"><i class='glyphicon glyphicon-file'></i> "?>
                    
                        <?php echo "<a data-toggle='tooltip' data-placement='top' title='Delete' href=\"inc/customer/del_customer.php?del=$ambil[id_customer]\"><i class='glyphicon glyphicon-trash'></i> "?>
                        &nbsp;
                        <?php echo "<a data-toggle='tooltip' data-placement='top' title='Edit' href=\"?psg=customer/e_customer&edit=$ambil[id_customer]\"><i class='glyphicon glyphicon-pencil'></i> "?>
                        &nbsp;
                        <?php echo "<a data-toggle='tooltip' data-placement='top' title='Order' href=\"?psg=penjualan/order&id=$ambil[id_customer]\"><i class='glyphicon glyphicon-file'></i> "?>
                    
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>

<!-- /.table-responsive -->