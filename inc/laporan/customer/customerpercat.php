<?php
$start=$_REQUEST['start'];
$end=$_REQUEST['end'];
$disable="";
if (!isset($start) && !isset($end)) {
    $disable="disabled";
}
?>
<div class="panel-heading">
    <label>Laporan Customer Per Cat</label>
</div>
<!-- /.panel-heading -->
<div class="panel-body">
<div class="table-responsive">
     <form>
        <input type="hidden" name="psg" value="laporan/customer/customerpercat">
        <!-- date picker-->
        <div class="form-group">
            <label>Date range:</label>
            <div class="input-daterange input-group col-xs-4">
                <input type="text" class="input-small form-control daterange" name="start"/>
                <span class="input-group-addon">to</span>
                <input type="text" class="input-small form-control daterange" name="end"/>
            </div>
        </div><!-- /.form group -->

        <div class="form-group">
            <label>Pilih Kategori</label>
            <div class="input-group col-xs-4">
              <select name="pilih" class="form-control fromstyle">
                <option value="all">Keseluruhan</option>
                <?php include "config/koneksi.php";
                $s=mysql_query("select * from kat_produk"); 
                while($q=mysql_fetch_array($s))
                { ?>
                <option value="<?php echo $q['id_k_pr']; ?>"><?php echo $q['nama_katpr']; ?></option>
                <?php }

                ?>

              </select>
            </div>
        </div>
              <label>Pilih Bank</label>
            <div class="input-group col-xs-4">
              <select name="bank" class="form-control fromstyle">
                <option value="all">Keseluruhan</option>
                <option value="mandiri">Mandiri</option>
                <option value="bca">BCA</option>
               
              </select>
            </div>
        </div>
        
        <div class="form-group">
            <div class="input-group col-xs-4">
              <button type="submit" class="btn btn-default">Lihat</button>
            </div>
        </div>

    </form>
    <form action="inc/laporan/customer/print_customerpercat.php" target="_blank">
        <input type="hidden" name="start" value="<?php echo $start; ?>">
        <input type="hidden" name="end" value="<?php echo $end; ?>">
        <div class="form-group">
            <div class="input-group col-xs-4">
              <button type="submit" class="btn btn-default" <?php echo $disable;?>>Print</button>
            </div>
        </div>
    </form>
    <section>
    <?php include "inc/laporan/customer/isi_customerpercat.php"; ?>
</section>
</div>

<!-- /.table-responsive -->


