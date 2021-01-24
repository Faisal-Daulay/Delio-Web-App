<section class="content-header">
    <div class="panel-heading">
        <label>Customer Control Panel</label>
        <ol class="breadcrumb">
            <li><a href="?psg=customer/ubah_seller"><i class="fa fa-dashboard"></i>Ubah Status Customer</a></li>
        </ol>
    </div>
</section>
<div class="panel-body">
    <div class="row">
        <div class="col-lg-6">
            <?php 
                include 'config/koneksi.php';
                $id=$_REQUEST['id'];
                $show=mysql_query("SELECT * FROM customer LEFT JOIN provinsi ON customer.code_provinsi = provinsi.code_provinsi LEFT JOIN kabupaten ON customer.Id_Kabupaten = kabupaten.Id_Kabupaten LEFT JOIN kecamatan ON customer.kode_kecamatan = kecamatan.kode_kecamatan WHERE id_customer='$id' ORDER BY id_customer DESC");
                while ($ambil=mysql_fetch_array($show)) {
             ?>
            <form role="form" method="post" action="inc/customer/seller_proses.php">
                <input type="hidden" name="id" value="<?php echo $ambil['id_customer']; ?>">
                <div class="form-group">
                    <label>Nama</label>
                    <input class="form-control fromstyle" name="nama" readonly value="<?php echo $ambil['nama']; ?>">
                    <p class="help-block"></p>
                </div>
                <div class="form-group">
                    <label>Alamat</label>
                    <input class="form-control fromstyle" name="alamat" readonly value="<?php echo $ambil['alamat']; ?>">
                    <p class="help-block"></p>
                </div>
                <div class="form-group">
                    <label>Nomor Telepon</label>
                    <input class="form-control fromstyle" name="no_tlpn" maxlength="12" readonly value="<?php echo $ambil['no_tlpn']; ?>">
                    <p class="help-block"></p>
                </div>
                 <div class="form-group">
                    <label>Status Menjadi</label>
                    <input class="form-control fromstyle" name="reseller" maxlength="12" value="Reseller" readonly>
                    <p class="help-block"></p>
                </div>
                <div class="form-group">
                    <label>Bayar</label>
                    <p class="rupiah">Rp </p><input class="form-control fromstyle rupoh" name="bayar" maxlength="12" value="<?php echo "150000" ?>">
                    <p class="help-block"></p>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-default">Simpan Perubahan</button>
                    <input type="button" class="btn btn-default" value="Back" onclick=self.history.back()>
                </div>
            </form>
            <script type="text/javascript" src="js/jquery.js"></script>
            <script type="text/javascript" language="javascript">
                var htmlobjek;
                $(document).ready(function() {
                    $("#provin").change(function(event){
                        var provin = $("#provin").val();
                        $("#propinsi").load('inc/customer/ambilkota.php', {"provin":provin});
                    });
                });
                var htmlobjek;
                $(document).ready(function() {
                    $("#propinsi").change(function(event){
                        var propinsi = $("#propinsi").val();
                        $("#kota").load('inc/customer/ambilkecamatan.php', {"propinsi":propinsi});
                    });
                }); 

                <!--Combobox Negara-->
                var htmlobjek;
                $(document).ready(function() {
                    $("#negara").change(function(event){
                        var negara = $("#negara").val();
                        if (negara=='Indonesia') {
                            $("#provin").prop('disabled',false);
                            $("#propinsi").prop('disabled',false);
                            $("#kota").prop('disabled',false);
                            $("#provin").load('inc/customer/ambilnegara.php', {"negara":negara} );
                        } 
                        else {
                            $("#provin").prop('disabled',true);
                            $("#propinsi").prop('disabled',true);
                            $("#kota").prop('disabled',true);
                        }
                    });
                });
            </script>
            <?php } ?>
        </div>
    </div>
</div>