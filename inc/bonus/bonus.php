<div class="panel-heading">
    <label>Form Bonus Produk</label>
</div>
<div class="panel-body">
    <div class="row">
        <div class="col-lg-6">
            <form role="form" method="post" action="inc/bonus/i_bonus.php">
                <div class="form-group">
                    <label>Nama bonus</label>
                    <input class="form-control fromstyle" name="namap">
                    <p class="help-block"></p>
                </div>
                <div class="form-group">
                    <label>Harga</label>
                    <input class="form-control fromstyle" name="sa" value="0">
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