<?php
    include 'config/koneksi.php';
?>
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
            <form role="form" method="POST" action="inc/kategori/produk/k_produk.php">
                <div class="form-group">
                    <label>Kategori</label>
                    <input class="form-control fromstyle" name="kat">
                </div>
                
                <div class="form-group">
                    <button type="submit" class="btn btn-default">Simpan</button>
                    <button type="reset" class="btn btn-default">Reset</button>
                </div>
            </form>
            <script type="text/javascript" src="js/jquery.js"></script>
            
        </div>
    </div>
</div>