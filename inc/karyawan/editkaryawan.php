<section class="content-header">
    <div class="panel-heading">
        <label>Karyawan Control Panel</label>
        <ol class="breadcrumb">
            <li><a href="?psg=karyawan/karyawan"><i class="fa fa-dashboard"></i> Karyawan</a></li>
        </ol>
    </div>
</section>

<?php
  include "config/koneksi.php";
  $id=$_REQUEST['edit'];

  $s=mysql_query("select * from karyawan where id_karyawan='$id'");

  while($u=mysql_fetch_array($s)){ 
?>
<!-- Main content -->
<div class="panel-body">
    <div class="row">
      <div class="col-lg-6">
          <form role="form" method="POST" action="inc/karyawan/editkaryawan_proses.php">
              <input type="hidden" name="id" value="<?php echo $u['id_karyawan']; ?>">                   
              <div class="form-group">
                  <label>Nama Karyawan</label>
                  <input class="form-control fromstyle" name="nama" value="<?php echo $u['nama_karyawan']; ?>">
              </div>
              <div class="form-group">
                  <label>Tempat Lahir</label>
                  <input class="form-control fromstyle" name="tempat" value="<?php echo $u['tempat_lahir']; ?>">
              </div>
              <div class="form-group">
                  <label>Tanggal Lahir</label>
                  <input class="form-control daterange" name="tanggal" value="<?php echo $u['tanggal_lahir']; ?>">
              </div>
             <div class="form-group">
                    <label>Jabatan</label>
                    <select class="form-control fromstyle" name="jabatan">
                        <option value="admin">Admin</option>
                        <option value="teamleader">Team Leader</option>
                        <option value="cs">CS</option>
                    </select>
              </div>
              <div class="form-group">
                  <label>Alamat</label>
                  <input class="form-control fromstyle" name="alamat" value="<?php echo $u['alamat']; ?>">
              </div>
              <div class="form-group">
                  <label>No.Telp</label>
                  <input class="form-control fromstyle" name="telp" maxlength="12" value="<?php echo $u['no_tel']; ?>">
              </div>
              <div class="form-group">
                  <button type="submit" class="btn btn-default">Simpan</button> 
              </div>
          </form>
          <?php } ?>
      </div>
    </div>
</div>