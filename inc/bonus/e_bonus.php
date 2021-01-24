<section class="content-header">
    <div class="panel-heading">
        <label>Bonus Control Panel</label>
        <ol class="breadcrumb">
            <li><a href="?psg=bonus/t_bonus"><i class="fa fa-dashboard"></i> Bonus</a></li>
        </ol>
    </div>
</section>
<div class="panel-body">
    <div class="row">
        <div class="col-lg-6">
            <?php 
                include 'config/koneksi.php';
                $id=$_REQUEST['edit'];
                $show=mysql_query("SELECT * FROM bonus WHERE id_bonus='$id'  ORDER BY id_bonus DESC");
                while ($ambil=mysql_fetch_array($show)) {
             ?>
            <form role="form" method="post" action="inc/bonus/ep_bonus.php">
                <input type="hidden" name="id" value="<?php echo $ambil['id_bonus']; ?>">
                <div class="form-group">
                    <label>Nama bonus</label>
                    <input class="form-control fromstyle" name="namap" value="<?php echo $ambil['nama_bonus']; ?>">
                    <p class="help-block"></p>
                </div>
                <div class="form-group">
                    <label>Harga</label>
                    <input class="form-control fromstyle" name="sa" value="0">
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