<?php
    include 'config/koneksi.php';
?>
<section class="content-header">
    <div class="panel-heading">
        <label>Karyawan Control Panel</label>
        <ol class="breadcrumb">
            <li><a href="?psg=karyawan/karyawan"><i class="fa fa-dashboard"></i> Karyawan</a></li>
        </ol>
    </div>
</section>
<div class="panel-body">
    <div class="row">
        <div class="col-lg-6">
            <form role="form" method="POST" action="inc/karyawan/karyawan_proses.php">                   
                <div class="form-group">
                    <label>Nama Karyawan</label>
                    <input class="form-control fromstyle" name="nama">
                </div>
                <div class="form-group">
                    <label>Tempat Lahir</label>
                    <input class="form-control fromstyle" name="tempat">
                </div>
                <div class="form-group">
                    <label>Tanggal Lahir</label>
                    <input class="form-control daterange" name="tanggal">
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
                    <input class="form-control fromstyle" name="alamat">
                </div>
                <div class="form-group">
                    <label>No.Telp</label>
                    <input class="form-control fromstyle" name="telp" maxlength="12">
                </div>
               <div class="form-group">
                    <label>Username</label>
                    <input class="form-control fromstyle" name="username" maxlength="12">
                </div>
                 <div class="form-group">
                    <label>Password</label>
                    <input class="form-control fromstyle" name="password" maxlength="12">
                </div>
                
                <div class="form-group">
                    <button type="submit" class="btn btn-default">Simpan</button>  
                </div>
            </form>
           
        </div>
    </div>
</div>