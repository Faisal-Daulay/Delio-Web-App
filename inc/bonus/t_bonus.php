<div class="panel-heading">
    <label>Table Bonus</label>
</div>
<!-- /.panel-heading -->
<div class="panel-body">
<div class="table-responsive">
    <?php
        include 'config/koneksi.php';

        $bonus=mysql_query("SELECT * FROM bonus");
        $no++;
    ?>
    <div class="panel-body">
        <a href="?psg=bonus/bonus"><button type="button" class="btn btn-primary tombol">Tambah bonus</button></a>
    </div>
    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
        <thead>
            <tr class="centertd">
                <td>No</td>
                <td>Nama bonus</td>
                <td>Harga </td>
                <td>Action 1</td>
            </tr>
        </thead>
        <tbody>
            <?php
                while ($ambil=mysql_fetch_array($bonus)) {
            ?>
            <tr align="center" class="tooltip-demo">
                <td><?php echo $no++; ?></td>
                <td><?php echo $ambil['nama_bonus']; ?></td>
                <td class="rupiahformat"><?php echo $ambil['harga_bonus']; ?></td>
                <td>
                    <?php echo "<a data-toggle='tooltip' data-placement='top' title='Delete' href=\"inc/bonus/del_bonus.php?del=$ambil[id_bonus]\"><i class='glyphicon glyphicon-trash'></i> "?>
                    &nbsp;&nbsp;&nbsp;
                    <?php echo "<a data-toggle='tooltip' data-placement='top' title='Edit' href=\"?psg=bonus/e_bonus&edit=$ambil[id_bonus]\"><i class='glyphicon glyphicon-pencil'></i> "?>
                </td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</div>
<!-- /.table-responsive -->