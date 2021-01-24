<div class="row-fluid">
  <div class="span12">      
    <div class="widget">
      <div class="widget-header">
        <div class="title">
          Booking
          <span class="mini-title">
          	Data Booking
          </span>
        </div>
        <span class="tools">
          <a class="fs1" aria-hidden="true" data-icon="&#xe090;"></a>
        </span>
      </div>
      <div class="widget-body">
      	<div class="wrapper">
      		<a href="index.php?p=resto/bookresto.php" class="btn btn-primary bottom-margin">Tambah </a>
      	</div>
      	<br/>
		<table border="1" width="650px" class="table table-condensed table-striped table-bordered table-hover no-margin">
		<thead>
			<tr>
				<th width="30">No.</th>
				<th>Nama Booking</th>
				<th>Tanggal</th>
					<th>No.HP</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
		<?php
		$s=mysql_query("select * from bookresto");
		$no=1;
    
		while($o=mysql_fetch_array($s))
		{
  
       $id=$o['id_kamar'];			?>
		<tr>
			<td><?php echo $no; ?></td>
			<td><?php echo $o['nama']; ?></td>
			<td><?php echo $o['tanggal']; ?></td>
			<td><?php echo $o['hp']; ?></td>
			<td align="center">
				<a href="index.php?p=resto/edit_bookresto.php&id=<?php echo $id; ?>" class="btn btn-primary btn-mini">Edit</a>&nbsp;&nbsp;&nbsp;
				<a href="include/resto/deletebookresto.php?id=<?php echo $id; ?>"class="btn btn-warning2 btn-mini">Delete</a></td>
		</tr>
			<?php
			$no++;
		}

		?>
		</tbody>
		</table>
		</div>
    </div>
  </div>
</div>