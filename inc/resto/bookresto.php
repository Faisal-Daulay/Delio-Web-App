<div class="row-fluid">
  <div class="span12">      
    <div class="widget">
      <div class="widget-header">
        <div class="title">
          Booking
          <span class="mini-title">
          	Tambah Booking
          </span>
        </div>
        <span class="tools">
          <a class="fs1" aria-hidden="true" data-icon="&#xe090;"></a>
        </span>
      </div>
      <div class="widget-body">
	  <script language="javascript" src="js/cal2.js"></script>
		<script language="javascript" src="js/cal_conf2.js"></script>
		<form method="post" action="include/resto/bookresto_proses.php" name="sampleform">
		<table border="0">
		<tr>
		<td>Nama</td>
		<td><input type="text" name="nama"></td>
		</tr>
		<tr>
		<td>Tanggal</td>
		<td><input type="text" name="tanggal"><small><a href="javascript:showCal('Calendar1')">Select Date</a></small></td>
		</tr>
		<tr>
		<td>No.Hp</td>
		<td><input type="text" name="hp"></td>
		</tr>
		<tr><td>
		<input type="submit" name="submit" value="Simpan">
		</td></tr>

		</table></form>
	</div>
    </div>
  </div>
</div>