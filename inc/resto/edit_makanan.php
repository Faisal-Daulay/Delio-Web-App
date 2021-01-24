<div class="row-fluid">
  <div class="span12">
    <div class="widget">
      <div class="widget-header">
        <div class="title">
          Data Makanan
          <span class="mini-title">
            Tambah Makanan 
          </span>
        </div>
        <span class="tools">
          <a class="fs1" aria-hidden="true" data-icon="&#xe090;"></a>
        </span>
      </div>
      <div class="widget-body">
        <?php 
$id=$_REQUEST['id'];
      $s=mysql_query("select * from makanan where id_makanan='$id'");
while($i=mysql_fetch_array($s))
{
      ?>
        
        <form class="form-horizontal no-margin" action="include/resto/editmakanan_proses.php">
          <div class="control-group">
            <label class="control-label" for="nama_barang">
              Nama Jenis
            </label><input type="hidden" name="id" value="<?php echo $i['id_makanan'] ?>">
            <div class="controls controls-row">
              <input value="<?php echo $i['nama'] ?>" autocomplete="off" placeholder="Nama Makanan/Minuman" id="nama_barang" name="nama" class="span3" type="text">
             <!-- <input placeholder="Kode Barang" name="kode_barang" class="span3 input-left-top-margins" type="text" > -->
            </div>
          </div>
          <div class="control-group">
            <label class="control-label" for="harga_barang">
              Harga
            </label>
            <div class="controls">
              <input autocomplete="off" value="<?php echo $i['harga'] ?>"  type="text" placeholder="12.345" name="harga" id="harga" class="span6" onkeyup="javascript:get_total()" />
            </div>
          </div>
         
        
            <button type="submit" class="btn btn-info pull-right">
              Edit
            </button>
            <?php } ?>
            <div class="clearfix">
            
          </div>
          
        </form>
        
      </div>
    </div>
  </div>
  
</div>