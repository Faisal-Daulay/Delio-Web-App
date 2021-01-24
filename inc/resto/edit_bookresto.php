<div class="row-fluid">
  <div class="span12">      
    <div class="widget">
      <div class="widget-header">
        <div class="title">
          Kamar
          <span class="mini-title">
          	Edit Kamar
          </span>
        </div>
        <span class="tools">
          <a class="fs1" aria-hidden="true" data-icon="&#xe090;"></a>
        </span>
      </div>
      <div class="widget-body">
	   <script language="javascript" src="js/cal2.js"></script>
		<script language="javascript" src="js/cal_conf2.js"></script>
		<form method="post" action="include/bookresto/editbookresto_proses.php">
      <?php 
$id=$_REQUEST['id'];
      $s=mysql_query("select * from bookresto where id_bookresto='$id'");
while($i=mysql_fetch_array($s))
{
      ?>
		<table border="0">
		<tr>
		<td>Nama Booking</td>
		<td><input type="text" name="kode" value="<?php echo $i['nama'] ?>"></td>
    <input type="hidden" name="id" value="<?php echo $i['id_bookresto'] ?>">
		</tr>
    
		<tr>
		<td>Tanggal</td>
		<td><input type="text" name="tanggal" value="<?php echo $i['tanggal'] ?>"><small><a href="javascript:showCal('Calendar1')">Select Date</a></small></td>
		</tr>
		<tr>
		<td>No. HP</td>
		<td><input type="text" name="hp" value="<?php echo $i['hp'] ?>"></td>
   
		</tr>
		<tr><td>
		<input type="submit" name="submit" value="Simpan">
		</td></tr>

		</table>
<?php } ?>
  </form>
	</div>
    </div>
  </div>
</div>