<section class="content-header">
    <div class="panel-heading">
        <label>Kategori Control Panel</label>
        <ol class="breadcrumb">
            <li><a href="?psg=kategori/pengeluaran/t_kat_pengeluaran"><i class="fa fa-dashboard"></i> Kategori</a></li>
        </ol>
    </div>
</section>
<div class="panel-body">
    <div class="row">
        <div class="col-lg-6">
            <?php
                include 'config/koneksi.php';
                $id=$_REQUEST['edit'];
                $data=mysql_query("SELECT * FROM kat_pengeluaran WHERE id_k_pe='$id' ");

                while ($ambil=mysql_fetch_array($data)) {
            ?>
            <form role="form" method="POST" action="inc/kategori/pengeluaran/editkat_pengeluaran_proses.php">
                <input type="hidden" name="id" value="<?php echo $ambil['id_k_pe']; ?>">
                <div class="form-group">
                    <label>Kategori</label>
                    <input class="form-control fromstyle" name="kat" value="<?php echo $ambil['nama_katp']; ?>">
                </div>
                
                <div class="form-group">
                    <button type="submit" class="btn btn-default">Simpan</button>
                </div>
            </form>
            <?php } ?>
        </div>
    </div>
</div>
