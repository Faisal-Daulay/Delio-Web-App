<div class="panel-heading">
    <label>Form User</label>
</div>
<div class="panel-body">
    <div class="row">
        <div class="col-lg-6">
            <form role="form" method="post" action="inc/user/i_user.php">
                <div class="form-group">
                    <label>Username</label>
                    <input class="form-control fromstyle" name="user">
                    <p class="help-block"></p>
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" class="form-control fromstyle" name="pass">
                    <p class="help-block"></p>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-default">Simpan</button>
                    <button type="reset" class="btn btn-default">Hapus</button>
                    <input type="button" class="btn btn-default" value="Back" onclick=self.history.back()>
                </div>
            </form>
        </div>
    </div>
</div>