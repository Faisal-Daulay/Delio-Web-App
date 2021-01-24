<section class="content-header">
    <div class="panel-heading">
        <label>Kategori Control Panel</label>
        <ol class="breadcrumb">
            <li><a href="?psg=kategori/pemasukan/t_kat_pengeluaran"><i class="fa fa-dashboard"></i> Kategori</a></li>
        </ol>
    </div>
</section>
<div class="panel-body">
    <div class="row">
        <div class="col-lg-6">
            <?php
                include 'config/koneksi.php';
                $id=$_REQUEST['edit'];
                $data=mysql_query("SELECT * FROM kat_pemasukan WHERE id_k_pem='$id' ");
                while ($ambil = mysql_fetch_array($data)) {
                    $id_masukan = $ambil ['id_k_pem'];
                    $masukan = $ambil['nama_katpem'];
                }
            ?>
            <form role="form" method="POST" action="inc/kategori/pemasukan/editkat_pemasukan_proses.php">
                <input type="hidden" name="id" value="<?php echo $id_masukan; ?>">
                <div class="form-group">
                    <label>Kategori</label>
                    <input class="form-control fromstyle" name="kat" value="<?php echo $masukan; ?>">
                </div>
                
                <div class="form-group">
                    <button type="submit" class="btn btn-default">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
