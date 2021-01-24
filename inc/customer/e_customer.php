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
            <?php 
                include 'config/koneksi.php';
                $id=$_REQUEST['edit'];
                $show=mysql_query("SELECT * FROM customer LEFT JOIN provinsi ON customer.code_provinsi = provinsi.code_provinsi LEFT JOIN kabupaten ON customer.Id_Kabupaten = kabupaten.Id_Kabupaten LEFT JOIN kecamatan ON customer.kode_kecamatan = kecamatan.kode_kecamatan WHERE id_customer='$id' ORDER BY id_customer DESC");
                while ($ambil=mysql_fetch_array($show)) {
             ?>
            <form role="form" method="post" action="inc/customer/ep_customer.php">
                <input type="hidden" name="id" value="<?php echo $ambil['id_customer']; ?>">
                <div class="form-group">
                    <label>Nama</label>
                    <input class="form-control fromstyle" name="nama" value="<?php echo $ambil['nama']; ?>">
                    <p class="help-block"></p>
                </div>
                <div class="form-group">
                    <label>Alamat</label>
                    <input class="form-control fromstyle" name="alamat" value="<?php echo $ambil['alamat']; ?>">
                    <p class="help-block"></p>
                </div>
                <div class="form-group">
                    <label>Nomor Telepon</label>
                    <input class="form-control fromstyle" name="no_tlpn" maxlength="12" value="<?php echo $ambil['no_tlpn']; ?>">
                    <p class="help-block"></p>
                </div>
                <div class="form-group">
                    <label>Negara</label>
                    <select class="form-control fromstyle" name="negara" id="negara">
                        <option><?php echo $ambil['negara']; ?></option>
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
                    <select class="form-control fromstyle" name="provin" id="provin" >
                        <option><?php echo $ambil['nama_provinsi']; ?></option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Kota/Kabupaten</label>
                    <select class="form-control fromstyle" name="propinsi" id="propinsi">
                        <option><?php echo $ambil['nama_kabkot']; ?></option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Kecamatan</label>
                    <select class="form-control fromstyle" name="kota" id="kota">
                        <option><?php echo $ambil['nama_kecamatan']; ?></option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Kode Pos</label>
                    <input class="form-control kodepos" name="kode" value="<?php echo $ambil['kode_pos']; ?>">
                </div>
                <input type="hidden" name="stat" value="<?php echo $ambil['status_cust']; ?>">
                <?php 
                $statt=$ambil['status_cust'];
                
                if($statt=="buyer")
                { ?>
                <div class="panel-body">
                 <a href="?psg=customer/ubah_seller&id=<?php echo $ambil['id_customer']; ?>">
                <button type="button" class="btn btn-primary tombol">Ubah Status</button></a>
                </div>
                <?php }
                
                 elseif($statt=="reseller")
                { ?>
                <div class="form-group">
                    <label>Status</label>
                    <select class="form-control fromstyle" name="stat">
                        <option value="customer">Customer</option>
                        <option value="reseller">Reseller</option>
                    </select>
                </div>
                <?php }
                ?>
                  
                
                <div class="form-group">
                    <button type="submit" class="btn btn-default">Simpan Perubahan</button>
                    <input type="button" class="btn btn-default" value="Back" onclick=self.history.back()>
                </div>

            </form>
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