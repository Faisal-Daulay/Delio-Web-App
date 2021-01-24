<div class="panel-heading">
    <label>Form Produk</label>
</div>
<div class="panel-body">
    <div class="row">
        <div class="col-lg-6">
            <form role="form" method="post" action="inc/produk/i_produk.php">
                <div class="form-group">
                    <label>Nama Produk</label>
                    <input class="form-control fromstyle" name="namap">
                    <p class="help-block"></p>
                </div>
                <div class="form-group">
                    <label>Kategori</label>
                    <select class="form-control fromstyle" name="kategori">
                        <option>--Pilih Kategori--</option>
                        <?php
                            include 'config/koneksi.php';
                            $provin=mysql_query("SELECT * FROM kat_produk");
                            while ($pro=mysql_fetch_array($provin)) {
                                echo "<option value=\"$pro[id_k_pr]\">$pro[nama_katpr]</option>\n";
                            }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label>Harga Modal</label>
                    <input class="form-control fromstyle" name="harga">
                    <p class="help-block"></p>
                </div>
                <div class="form-group">
                    <label>Harga Seller</label>
                    <input class="form-control fromstyle" name="sa">
                    <p class="help-block"></p>
                </div>
                <div class="form-group">
                    <label>Harga Reseller</label>
                    <input class="form-control fromstyle" name="re">
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