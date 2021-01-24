<section class="content-header">
    <div class="panel-heading">
        <label>Kategori Control Panel</label>
        <ol class="breadcrumb">
            <li><a href="?psg=kategori/produk/t_kat_produk"><i class="fa fa-dashboard"></i> Kategori</a></li>
        </ol>
    </div>
</section>
<div class="panel-body">
    <div class="row">
        <div class="col-lg-6">
            <?php
                include 'config/koneksi.php';
                $id=$_REQUEST['edit'];
                $data=mysql_query("SELECT * FROM kat_produk WHERE id_k_pr='$id' ");

                while ($ambil=mysql_fetch_array($data)) {
            ?>
            <form role="form" method="POST" action="inc/kategori/produk/editkat_produk_proses.php">
                <input type="hidden" name="id" value="<?php echo $ambil['id_k_pr']; ?>">
                <div class="form-group">
                    <label>Kategori</label>
                    <input class="form-control fromstyle" name="kat" value="<?php echo $ambil['nama_katpr']; ?>">
                </div>
                
                <div class="form-group">
                    <button type="submit" class="btn btn-default">Simpan</button>
                </div>
            </form>
            <?php } ?>
        </div>
    </div>
</div>
