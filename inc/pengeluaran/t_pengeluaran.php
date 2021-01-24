<?php
    include 'config/koneksi.php';
?>
<section class="content-header">
    <div class="panel-heading">
        <label>Pengeluaran Control Panel</label>
        <ol class="breadcrumb">
            <li><a href="?psg=pengeluaran/pengeluaran"><i class="fa fa-dashboard"></i> Pengeluaran</a></li>
        </ol>
    </div>
</section>

<div class="panel-body">
    <div class="row">
        <div class="col-lg-6">
            <form role="form" method="POST" action="inc/pengeluaran/pengeluaran_proses.php" enctype="multipart/form-data">
                <div class="form-group">
                    <label>Tanggal</label>
                    <input type="text" class="form-control daterange" name="tanggal" />
                </div>
                  <div class="form-group">
                    <label>Kategori</label>
                    <select class="form-control fromstyle" name="kat">
                        <option>--Pilih Kategori--</option>
                        <?php
                            $provin=mysql_query("SELECT * FROM kat_pengeluaran");
                            while ($pro=mysql_fetch_array($provin)) {
                                echo "<option value=\"$pro[id_k_pe]\">$pro[nama_katp]</option>\n";
                            }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label>Nama Pengeluaran</label>
                    <input class="form-control fromstyle" name="nama">
                </div>
                <div class="form-group">
                    <label>Nominal</label>
                    <input class="form-control fromstyle" name="nominal">
                </div>
                <div class="form-group">
                    <label>Bank</label>
                    <select class="form-control fromstyle" name="bank">
                        <option value="mandiri">Mandiri</option>
                        <option value="bca">BCA</option>
                        
                    </select>
                </div>
                <div class="form-group">
                    <label>Deskripsi</label>
                    <textarea name="desk" class="form-control fromstyle"></textarea>
                </div>
              <div class="form-group">
                    <label>Bukti Data</label>
                    <input name="fupload" type="file" class="btn btn-default">
                </div>
                
                <div class="form-group">
                    <button type="submit" class="btn btn-default">Simpan</button>
                   
                  
                </div>
            </form>
            <script type="text/javascript" src="js/jquery.js"></script>
           
        </div>
    </div>
</div>
<script src="js/bootstrap-datepicker.js"></script>
<script type="text/javascript">
     $(function() {
        $('.input-daterange').datepicker({
            format: "yyyy-mm-dd",
            language: "id",
            autoclose: true,
            todayHighlight: true
        });
     });
</script>