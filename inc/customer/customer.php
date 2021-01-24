<?php
    include 'config/koneksi.php';
?>
<section class="content-header">
    <div class="panel-heading">
        <label>Customer Control Panel</label>
        <ol class="breadcrumb">
            <li><a href="?psg=customer/t_customer"><i class="fa fa-dashboard"></i> Customer</a></li>
        </ol>
    </div>
</section>
<div class="panel-body">
    <div class="row">
        <div class="col-lg-6">
            <form role="form" method="POST" action="inc/customer/i_customer.php">
                <div class="form-group">
                    <label>Nama</label>
                    <input class="form-control fromstyle" name="nama">
                </div>
                <div class="form-group">
                    <label>Alamat</label>
                    <input class="form-control fromstyle" name="alamat">
                </div>
                <div class="form-group">
                    <label>Nomor Telepon</label>
                    <input class="form-control fromstyle" maxlength="12" name="no_tlpn">
                </div>
                <div class="form-group">
                    <label>Negara</label>
                    <select class="form-control fromstyle" name="negara" id="negara">
                        <option>--Pilih Negara--</option>
                        <?php
                            $negara=mysql_query("SELECT * FROM countries ORDER BY country_name DESC");
                            while ($nega=mysql_fetch_array($negara)) {
                                echo "<option value=\"$nega[country_name]\">$nega[country_name]</option>\n";
                            }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label>Provinsi</label>
                    <select class="form-control fromstyle" name="provin" id="provin"></select>
                </div>
                <div class="form-group">
                    <label>Kota/Kabupaten</label>
                    <select class="form-control fromstyle" name="propinsi" id="propinsi"></select>
                </div>
                <div class="form-group">
                    <label>Kecamatan</label>
                    <select class="form-control fromstyle" name="kota" id="kota"></select>
                </div>
                <div class="form-group">
                    <label>Kode Pos</label>
                    <input class="form-control kodepos" name="kode">
                </div>
                <div class="form-group">
                    <label>Status</label>
                    <select class="form-control fromstyle" name="stat">
                        <option value="buyer">Buyer</option>
                        <option value="reseller">Reseller</option>
                    </select>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-default">Simpan</button>
                    <button type="reset" class="btn btn-default">Hapus</button>
                    <button type="button" class="btn btn-default" onclick=self.history.back()>Back</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script type="text/javascript" language="javascript">
    
    <!--Combobox Kota-->
    var htmlobjek;
    $(document).ready(function() {
        $("#provin").change(function(event){
            var provin = $("#provin").val();
            $("#propinsi").load('inc/customer/ambilkota.php', {"provin":provin});
        });
    }); 

    <!--Combobox Kecamatan-->
    var htmlobjek;
    $(document).ready(function() {
        $("#propinsi").change(function(event){
            var propinsi = $("#propinsi").val();
            $("#kota").load('inc/customer/ambilkecamatan.php', {"propinsi":propinsi});
        });
    }); 

    <!--Combobox provinsi-->
    var htmlobjek;
    $(document).ready(function() {
        $("#negara").change(function(event){
            var negara = $("#negara").val();
            if (negara=='Indonesia') {
                $("#provin").prop('disabled',false);
                $("#kota").prop('disabled',false);
                $("#propinsi").prop('disabled',false);
                $("#provin").load('inc/customer/ambilnegara.php', {"negara":negara} );
            }
            else {
                $("#provin").prop('disabled',true);
                $("#kota").prop('disabled',true);
                $("#propinsi").prop('disabled',true);
            }
        });
    });
</script>