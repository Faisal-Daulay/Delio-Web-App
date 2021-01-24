<div class="panel-heading">
    <label>Table Produk</label>
</div>
<!-- /.panel-heading -->
<div class="panel-body">
<div class="table-responsive">
    <?php
        include 'config/koneksi.php';

        $produk=mysql_query("SELECT * FROM produk INNER JOIN kat_produk ON produk.id_k_pr = kat_produk.id_k_pr ");
        $no++;
    ?>
    <div class="panel-body">
        <a href="?psg=produk/produk"><button type="button" class="btn btn-primary tombol">Tambah Produk</button></a>
    </div>
    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
        <thead>
            <tr class="centertd">
                <td>No</td>
                <td>Nama Produk</td>
                <td>Kategori Produk</td>
                <td>Harga Modal</td>
                <td>Harga seller</td>
                <td>Harga Reseller</td>
                <td>Action</td>
            </tr>
        </thead>
        <tbody>
            <?php
                while ($ambil=mysql_fetch_array($produk)) {
            ?>
            <tr align="center" class="tooltip-demo">
                <td><?php echo $no++; ?></td>
                <td><?php echo $ambil['nama_produk']; ?></td>
                <td><?php echo $ambil['nama_katpr']; ?></td>
                <td class="rupiahformat"><?php echo $ambil['harga_modal']; ?></td>
                <td class="rupiahformat"><?php echo $ambil['harga_saller']; ?></td>
                <td class="rupiahformat"><?php echo $ambil['harga_resaller']; ?></td>
                <td>
                    <?php echo "<a data-toggle='tooltip' data-placement='top' title='Delete' href=\"inc/produk/del_produk.php?del=$ambil[id_produk]\"><i class='glyphicon glyphicon-trash'></i> "?>
                    &nbsp;&nbsp;&nbsp;
                    <?php echo "<a data-toggle='tooltip' data-placement='top' title='Edit' href=\"?psg=produk/e_produk&edit=$ambil[id_produk]\"><i class='glyphicon glyphicon-pencil'></i> "?>
                </td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</div>
<!-- /.table-responsive -->