<div class="panel-heading">
    <label>Table Kategori Pengeluaran</label>
</div>
<!-- /.panel-heading -->
<div class="panel-body">
<div class="table-responsive">
    <?php
        include 'config/koneksi.php';

       
        
    ?>
    <div class="panel-body">
        <a href="?psg=kategori/pengeluaran/kategori_pengeluaran"><button type="button" class="btn btn-primary tombol">Tambah Data</button></a>
    </div>
    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
        <thead>
            <tr class="centertd">
                <td>No</td>
                <td>Nama Kategori</td>
                <td>Action</td>
            </tr>
        </thead>
        <tbody>
            <?php 
            $no=1;
             $d=mysql_query("SELECT * FROM kat_pengeluaran") or die (mysql_error());
                while($a=mysql_fetch_array($d)) {
            ?>
            <tr align="center" class="tooltip-demo">
                <td><?php echo $no; ?></td>
                <td><?php echo $a['nama_katp']; ?></td>
                <td>
                    <?php echo "<a data-toggle='tooltip' data-placement='top' title='Delete' href=\"inc/kategori/pengeluaran/delete_kat_pengeluaran.php?del=$a[id_k_pe]\"><i class='glyphicon glyphicon-trash'></i> "?>
                    &nbsp;&nbsp;&nbsp;
                    <?php echo "<a data-toggle='tooltip' data-placement='top' title='Edit' href=\"?psg=kategori/pengeluaran/editkat_pengeluaran&edit=$a[id_k_pe]\"><i class='glyphicon glyphicon-pencil'></i> "?>
                </td>
            </tr>
            <?php $no++; } ?>
        </tbody>
    </table>
</div>
<!-- /.table-responsive -->