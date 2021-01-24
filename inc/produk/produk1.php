<div class="panel-heading">
    <label>Form Produk</label>
</div>
<div class="panel-body">
    <div class="row">
        <div class="col-lg-6">
            <form role="form" method="post" action="inc/produk/i_produk.php">
                <div class="form-group">
                    <label>Nama Produk</label>
                    <input class="form-control" name="namap">
                    <p class="help-block"></p>
                </div>
                <div class="form-group">
                    <label>Harga Saller</label>
                    <input class="form-control" name="sa">
                    <p class="help-block"></p>
                </div>
                <div class="form-group">
                    <label>Harga Resaller</label>
                    <input class="form-control" name="re">
                    <p class="help-block"></p>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-default">Simpan</button>
                    <button type="reset" class="btn btn-default">Hapus</button>
                    <input type="button" class="btn btn-default" value="Back" onclick=self.history.back()>
                </div>
            </form>
        </div>
    </div>
</div>