<div class="panel-heading">
    <label>Table User</label>
</div>
<!-- /.panel-heading -->
<div class="panel-body">
<div class="table-responsive">
    <?php
        include 'config/koneksi.php';

        $produk=mysql_query("SELECT * FROM user");
        $no++;
    ?>
    <div class="panel-body">
        <a href="?psg=user/user"><button type="button" class="btn btn-primary tombol">Tambah User</button></a>
    </div>
    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
        <thead>
            <tr class="centertd">
                <td>No</td>
                <td>Username</td>
                <td>Password</td>
                <td>Status</td>
                <td>Action</td>
            </tr>
        </thead>
        <tbody>
            <?php
                while ($ambil=mysql_fetch_array($produk)) {
            ?>
            <tr align="center" class="tooltip-demo">
                <td><?php echo $no++; ?></td>
                <td><?php echo $ambil['username']; ?></td>
                <td><?php echo md5($ambil['password']); ?></td>
                <td><?php echo $ambil['status']; ?></td>
                <td>
                    <?php echo "<a data-toggle='tooltip' data-placement='top' title='Delete' href=\"inc/user/del_user.php?del=$ambil[id_user]\"><i class='glyphicon glyphicon-trash'></i> "?>
                    &nbsp;&nbsp;&nbsp;
                    <?php echo "<a data-toggle='tooltip' data-placement='top' title='Edit' href=\"?psg=user/e_user&edit=$ambil[id_user]\"><i class='glyphicon glyphicon-pencil'></i> "?>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
<!-- /.table-responsive -->