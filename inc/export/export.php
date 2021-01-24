<?php
$start=$_REQUEST['start'];
$end=$_REQUEST['end'];
$disable="";
if (!isset($start) && !isset($end)) {
    $disable="disabled";
}
?>
<div class="panel-heading">
    <label>Export Data Penjualan</label>
</div>
<!-- /.panel-heading -->
<div class="panel-body">
    <div class="table-responsive">
        <form action="inc/export/proses_export.php" method="get">
            <input type="hidden" name="psg" value="export/export">
            <!-- date picker-->
            <div class="form-group">
                <label>Pilih Tanggal</label>
                <div class="input-daterange input-group col-xs-2">
                    <input type="text" class="input-small form-control daterange" name="start"/>
                </div>
            </div><!-- /.form group -->
            <div class="form-group">
                <div class="input-group col-xs-4">
                  <button type="submit" class="btn btn-default">Ambil Data</button>
                </div>
            </div>
        </form>
    </div>
</div>