<div class="panel-heading">
    <label>Form Pesan</label>
</div>
<div class="panel-body">
    <div class="row">
        <div class="col-lg-6">
            <form role="form" method="post" action="?psg=pesan/proses_pesan">
                <div class="form-group">
                    <label>Isi Pesan</label>
                    <textarea name="isipes" class="form-control fromstyle"></textarea>
                </div>
                <div class="form-group">
                    <input type="button" class="btn btn-default" value="Batal Kirim" onclick=self.history.back()>
                    <button type="submit" class="btn btn-default">Kirim</button>
                </div>
            </form>
        </div>
    </div>
</div>