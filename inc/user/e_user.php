<div class="panel-heading">
    <label>Form Edit User</label>
</div>
<div class="panel-body">
    <div class="row">
        <div class="col-lg-6">
            <?php 
                include 'config/koneksi.php';
                $id=$_REQUEST['edit'];
                $show=mysql_query("SELECT * FROM user WHERE id_user='$id'  ORDER BY id_user DESC");
                while ($ambil=mysql_fetch_array($show)) {
             ?>
            <form role="form" method="post" action="inc/user/ep_user.php">
                <input type="hidden" name="id" value="<?php echo $ambil['id_user']; ?>">
                <div class="form-group">
                    <label>Username</label>
                    <input class="form-control fromstyle" name="user" value="<?php echo $ambil['username']; ?>">
                    <p class="help-block"></p>
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" class="form-control fromstyle" name="pass" value="<?php echo md5($ambil['password']); ?>">
                    <p class="help-block"></p>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-default">Simpan</button>
                    <input type="button" class="btn btn-default" value="Back" onclick=self.history.back()>
                </div>
            </form>
            <?php } ?>
        </div>
    </div>
</div>