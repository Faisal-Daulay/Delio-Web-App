<section class="content-header">
    <div class="panel-heading">
        <label>Pemasukan Control Panel</label>
        <ol class="breadcrumb">
            <li><a href="?psg=pemasukan/pemasukan"><i class="fa fa-dashboard"></i> Pemasukan</a></li>
        </ol>
    </div>
</section>

<?php
  include 'config/koneksi.php';
  $id=$_REQUEST['edit'];

  $s=mysql_query("select * from pemasukan where id_pemasukan='$id'");

  while($u=mysql_fetch_array($s)) { 
?>
<!-- Main content -->
<div class="panel-body">
    <div class="row">
      <div class="col-lg-6">
        <form role="form" method="POST" action="inc/pemasukan/editpemasukan_proses.php">
              <input type="hidden" name="id" value="<?php echo $u['id_pemasukan']; ?>">
              <div class="form-group">
                <label>Tanggal</label>
                <input type="text" class="input-sm form-control daterange" name="tanggal" value="<?php echo $u['tanggal']; ?>" />
              </div>
              <div class="form-group">
                <label>Kategori</label>
                <select class="form-control fromstyle" name="kat">
                    <option>--Pilih Kategori--</option>
                    <?php
                        $provin=mysql_query("SELECT * FROM kat_pemasukan");
                        while ($pro=mysql_fetch_array($provin)) {
                            echo "<option value=\"$pro[id_k_pem]\">$pro[nama_katpem]</option>\n";
                        }
                    ?>
                </select>
              </div>
            <div class="form-group">
                <label>Nama Pemasukan</label>
                <input class="form-control fromstyle" name="nama" value="<?php echo $u['nama_pemasukan']; ?>">
            </div>
            <div class="form-group">
                <label>Nominal</label>
                <input class="form-control fromstyle" name="nominal" value="<?php echo $u['nominal']; ?>">
            </div>
            <div class="form-group">
                <label>Deskripsi</label>
                <textarea name="desk" class="form-control fromstyle"><?php echo $u['deskripsi']; ?></textarea>
            </div>            
            <div class="form-group">
                <button type="submit" class="btn btn-default">Simpan</button>
            </div>
        </form>
        <?php } ?>
      </div>
    </div>
</div>
