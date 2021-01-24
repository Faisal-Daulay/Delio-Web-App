<div class="panel-heading">
    <label>Data Pemasukan</label>
</div>
<!-- /.panel-heading -->
<div class="panel-body">
<div class="table-responsive">
    <?php
        include 'config/koneksi.php';

        $produk=mysql_query("SELECT * FROM pemasukan p, kat_pemasukan k where p.id_k_pem=k.id_k_pem ORDER BY id_pemasukan DESC");
        $no++;
    ?>
    <div class="panel-body">
        <a href="?psg=pemasukan/t_pemasukan"><button type="button" class="btn btn-primary tombol">Tambah Data</button></a>
    </div>
    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
        <thead>
            <tr class="centertd">
                <td>No</td>
                <td>Kategori</td>
                <td>Nama pemasukan</td>
                <td>Tanggal</td>                
                <td>Jumlah</td>
                <td>Bank</td>
                <td>Deskripsi</td>
                <td>Action</td>
            </tr>
        </thead>
        <tbody>
            <?php
                while ($ambil=mysql_fetch_array($produk)) {
                    
            ?>
            <tr align="center" class="tooltip-demo">
                <td><?php echo $no++; ?></td>
                <td><?php echo $ambil['nama_katpem']; ?></td>
                <td><?php echo  $ambil['nama_pemasukan']; ?></td>
                <td><?php echo  $ambil['tanggal']; ?></td>
                <td class="rupiahformat"><?php echo $ambil['nominal']; ?></td>
                <td><?php echo  $ambil['bank']; ?></td>
                <td><?php echo $ambil['deskripsi']; ?></td>
                <td>
                    <?php echo "<a data-toggle='tooltip' data-placement='top' title='Delete' href=\"inc/pemasukan/delete_pemasukan.php?del=$ambil[id_pemasukan]\"><i class='glyphicon glyphicon-trash'></i> "?>
                    &nbsp;&nbsp;&nbsp;
                    <?php echo "<a data-toggle='tooltip' data-placement='top' title='Edit' href=\"?psg=pemasukan/editpemasukan&edit=$ambil[id_pemasukan]\"><i class='glyphicon glyphicon-pencil'></i> "?>
                </td>    
            </tr>
        <?php } ?>
        </tbody>
    </table>
</div>
<!-- /.table-responsive -->