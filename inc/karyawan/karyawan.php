<div class="panel-heading">
    <label>Data Karyawan</label>
</div>
<!-- /.panel-heading -->
<div class="panel-body">
<div class="table-responsive">
    <?php
        include 'config/koneksi.php';

        $produk=mysql_query("SELECT * FROM karyawan ORDER BY id_karyawan DESC");
        $no++;
    ?>
    <div class="panel-body">
        <a href="?psg=karyawan/t_karyawan"><button type="button" class="btn btn-primary tombol">Tambah Data</button></a>
    </div>
    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
        <thead>
            <tr class="centertd">
                <td>No.</td>
                <td>Nama Karyawan</td>
                <td>Tempat Lahir</td>
                <td> Tanggal Lahir</td>
                <td>Jabatan</td>
                <td>Alamat</td>
                <td>No.Telp/HP</td>
                <td>Action</td>
            </tr>
        </thead>
        <tbody>
            <?php
                while ($data=mysql_fetch_array($produk)) {
            ?>
            <tr align="center" class="tooltip-demo">
                <td><?php echo $no++; ?></td>
                <td><?php echo $data['nama_karyawan']; ?></td>
                                   
                <td><?php echo $data['tempat_lahir'];?></td>
                <td><?php echo $data['tanggal_lahir'];?></td>
                <td><?php echo $data['jabatan'];?></td>
                <td><?php echo $data['alamat'];?></td>                                    
                <td><?php echo $data['no_tel'];?></td>
                <td>
                    <?php echo "<a data-toggle='tooltip' data-placement='top' title='Delete' href=\"inc/karyawan/delete_karyawan.php?del=$data[id_karyawan]\"><i class='glyphicon glyphicon-trash'></i> "?>
                    &nbsp;&nbsp;&nbsp;
                    <?php echo "<a data-toggle='tooltip' data-placement='top' title='Edit' href=\"?psg=karyawan/editkaryawan&edit=$data[id_karyawan]\"><i class='glyphicon glyphicon-pencil'></i> "?>
                </td>      
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
<!-- /.table-responsive -->