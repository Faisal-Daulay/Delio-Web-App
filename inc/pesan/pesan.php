<?php
    session_start();
    $username=$_SESSION['username'];
    $id_user=$_SESSION['id_user'];
    $status = $_SESSION['status'];
    //echo $id_user;
    if ($status == "admin") { ?>
        <div class="panel-heading">
            <label>Table Pesan</label>
        </div>
        <!-- /.panel-heading -->
        <div class="panel-body">
        <div class="table-responsive">
            <?php
                include 'config/koneksi.php';
                $pesan=mysql_query("SELECT * FROM pesan LEFT JOIN user ON
                pesan.username = user.username ORDER BY id_pesan DESC");
                $no12++;
            ?>
            <div class="panel-body">
                <a href="?psg=pesan/from_pesan"><button type="button" class="btn btn-primary tombol">Tulis Pesan</button></a>
            </div>
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr class="centertd">
                        <td>No</td>
                        <td>Nama Pengirim</td>
                        <td>Isi Pesan</td>
                        <td>Status</td>
                        <td>Tanggal Kirim</td>
                        <td>Action</td>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        while ($ambil=mysql_fetch_array($pesan)) {
                    ?>
                    <tr align="center" class="tooltip-demo">
                        <td><?php echo $no12++; ?></td>
                        <td><?php echo $ambil['username']; ?></td>
                        <td><?php echo $ambil['isi_pesan']; ?></td>
                        <td><?php echo $ambil['status']; ?></td>
                        <td><?php echo $ambil['tanggal_kirim']; ?></td>
                        <td>
                            <?php echo "<a data-toggle='tooltip' data-placement='top' title='Delete' href=\"inc/pesan/delete.php?del=$ambil[id_pesan]\"><i class='glyphicon glyphicon-trash'></i> "?>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
        <!-- /.table-responsive -->
     <?php
    }
    elseif ($status == "teamleader") { ?>
        <div class="panel-heading">
            <label>Table Pesan</label>
        </div>
        <!-- /.panel-heading -->
        <div class="panel-body">
        <div class="table-responsive">
            <?php
                include 'config/koneksi.php';
                $pesan=mysql_query("SELECT * FROM pesan LEFT JOIN user ON
                pesan.username = user.username ORDER BY id_pesan DESC");
                $nomor++;
            ?>
            <div class="panel-body">
                <a href="?psg=pesan/from_pesan"><button type="button" class="btn btn-primary tombol">Tulis Pesan</button></a>
            </div>
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr class="centertd">
                        <td>No</td>
                        <td>Nama Pengirim</td>
                        <td>Isi Pesan</td>
                        <td>Status</td>
                        <td>Tanggal Kirim</td>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        while ($ambil=mysql_fetch_array($pesan)) {
                    ?>
                    <tr align="center" class="tooltip-demo">
                        <td><?php echo $nomor++; ?></td>
                        <td><?php echo $ambil['username']; ?></td>
                        <td><?php echo $ambil['isi_pesan']; ?></td>
                        <td><?php echo $ambil['status']; ?></td>
                        <td><?php echo $ambil['tanggal_kirim']; ?></td>
                        <!--<td>
                            <?php echo "<a data-toggle='tooltip' data-placement='top' title='Delete' href=\"inc/pesan/delete.php?del=$ambil[id_pesan]\"><i class='glyphicon glyphicon-trash'></i> "?>
                        </td>-->
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    <?php
    }
?>

