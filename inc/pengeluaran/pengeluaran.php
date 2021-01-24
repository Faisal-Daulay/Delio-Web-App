<div class="panel-heading">
    <label>Data Pengeluaran</label>
</div>
<!-- /.panel-heading -->
<div class="panel-body">
<div class="table-responsive">
    <?php
        include 'config/koneksi.php';

        $produk=mysql_query("SELECT * FROM pengeluaran p, kat_pengeluaran k where p.id_k_pe=k.id_k_pe");
        $no++;
    ?>
    <div class="panel-body">
        <a href="?psg=pengeluaran/t_pengeluaran"><button type="button" class="btn btn-primary tombol">Tambah Data</button></a>
    </div>
    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
        <thead>
            <tr class="centertd">
                <td>No</td>
                <td>Kategori</td>
                <td>Nama Pengeluaran</td>
                <td>Tanggal</td>                
                <td>Nominal</td>
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
                <td><?php echo $ambil['nama_katp']; ?></td>
                <td><?php echo  $ambil['nama_pengeluaran']; ?></td>
                <td><?php echo  date($ambil['tanggal'],dd-mm-yyyy); ?></td>
                <td class="rupiahformat"><?php echo $ambil['nominal']; ?></td>
                <td><?php echo $ambil['bank']; ?></td>
                <td><?php echo $ambil['deskripsi']; ?></td>
                <td>
                    <?php echo "<a data-toggle='tooltip' data-placement='top' title='Delete' href=\"inc/pengeluaran/delete_pengeluaran.php?del=$ambil[id_pengeluaran]\"><i class='glyphicon glyphicon-trash'></i> "?>
                    &nbsp;&nbsp;&nbsp;
                    <?php echo "<a data-toggle='tooltip' data-placement='top' title='Edit' href=\"?psg=pengeluaran/editpengeluaran&edit=$ambil[id_pengeluaran]\"><i class='glyphicon glyphicon-pencil'></i> "?>
                </td>    
            </tr>
        <?php } ?>
        </tbody>
    </table>
</div>
<!-- /.table-responsive -->