<div class="panel-heading">
    <label>Table Produk</label>
</div>
<!-- /.panel-heading -->
<div class="panel-body">
<div class="table-responsive">
    <?php
        include 'config/koneksi.php';

        $produk=mysql_query("SELECT * FROM produk");
        $no++;
    ?>
    <div class="panel-body">
        <a href="?psg=produk/produk"><button type="button" class="btn btn-primary tombol">Tambah Produk</button></a>
    </div>
    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
        <thead>
            <tr align="center">
                <th>No</th>
                <th>Nama Produk</th>
                <th>Harga saller</th>
                <th>Harga Resaller</th>
                <th>Action 1</th>
                <th>Action 2</th>
            </tr>
        </thead>
        <tbody>
            <?php
                while ($ambil=mysql_fetch_array($produk)) {
                    $nilai1=$ambil['harga_saller'];
                    $nilai_n1=number_format($nilai1,0,',','.');

                    $nilai2=$ambil['harga_resaller'];
                    $nilai_n2=number_format($nilai2,0,',','.');
            ?>
            <tr align="center" class="tooltip-demo">
                <td><?php echo $no++; ?></td>
                <td><?php echo $ambil['nama_produk']; ?></td>
                <td><?php echo  "Rp.".$nilai_n1; ?></td>
                <td><?php echo "Rp.".$nilai_n2; ?></td>
                <td>
                    <?php echo "<a data-toggle='tooltip' data-placement='top' title='Delete' href=\"inc/produk/del_produk.php?del=$ambil[id_produk]\"><i class='glyphicon glyphicon-trash'></i> "?>
                </td>
                <td>
                    <?php echo "<a data-toggle='tooltip' data-placement='top' title='Edit' href=\"?psg=produk/e_produk&edit=$ambil[id_produk]\"><i class='glyphicon glyphicon-pencil'></i> "?>
                </td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</div>
<!-- /.table-responsive -->