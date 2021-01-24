<section class="content-header">
    <div class="panel-heading">
        <label>Produk Control Panel</label>
        <ol class="breadcrumb">
            <li><a href="?psg=produk/t_produk"><i class="fa fa-dashboard"></i> Produk</a></li>
        </ol>
    </div>
</section>
<div class="panel-body">
    <div class="row">
        <div class="col-lg-6">
            <?php 
                include 'config/koneksi.php';
                $id=$_REQUEST['edit'];
                $show=mysql_query("SELECT * FROM produk WHERE id_produk='$id'  ORDER BY id_produk DESC");
                while ($ambil=mysql_fetch_array($show)) {
             ?>
            <form role="form" method="post" action="inc/produk/ep_produk.php">
                <input type="hidden" name="id" value="<?php echo $ambil['id_produk']; ?>">
                <div class="form-group">
                    <label>Nama Produk</label>
                    <input class="form-control" name="namap" value="<?php echo $ambil['nama_produk']; ?>">
                    <p class="help-block"></p>
                </div>
                <div class="form-group">
                    <label>Harga Saller</label>
                    <input class="form-control" name="sa" value="<?php echo "Rp.".$ambil['harga_saller']; ?>">
                    <p class="help-block"></p>
                </div>
                <div class="form-group">
                    <label>Harga Resaller</label>
                    <input class="form-control" name="re" value="<?php echo "Rp.".$ambil['harga_resaller']; ?>">
                    <p class="help-block"></p>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-default">Simpan Perubahan</button>
                    <input type="button" class="btn btn-default" value="Back" onclick=self.history.back()>
                </div>
            </form>
        <?php } ?>
        </div>
    </div>
</div>