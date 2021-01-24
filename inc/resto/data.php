<div class="row-fluid">
  <div class="span12">      
    <div class="widget">
      <div class="widget-header">
        <div class="title">
          Makanan/Minuman
          <span class="mini-title">
            Data Makanan/Minuman
          </span>
        </div>
        <span class="tools">
          <a class="fs1" aria-hidden="true" data-icon="&#xe090;"></a>
        </span>
      </div>
      <div class="widget-body">
        <div class="wrapper">
          <a href="index.php?p=resto/input.php" class="btn btn-primary bottom-margin">Tambah</a>
        </div>
        <br/>
    <table border="1" width="650px" class="table table-condensed table-striped table-bordered table-hover no-margin">
    <thead>
      <tr>
        <th width="30">No.</th>
        <th>Nama Makanan/Minuman</th>
        <th>Harga</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
    <?php
    $s=mysql_query("select * from makanan ");
    $no=1;
    
    while($o=mysql_fetch_array($s))
    {
      //$o1=mysql_query("select * from kamar where status='kosong'");   if($o1!=0) {$o2="#DBDBDB"; }  else { $o2="#ffffff"; }  
       $id=$o['id_makanan'];     ?>
    <tr>
      <td><?php echo $no; ?></td>
      <td><?php echo $o['nama']; ?></td>
      <td><?php echo $o['harga']; ?></td>
      <td align="center">
        <a href="index.php?p=resto/edit_makanan.php&id=<?php echo $id; ?>" class="btn btn-primary btn-mini">Edit</a>&nbsp;&nbsp;&nbsp;
        <a href="include/resto/deletemakanan.php?id=<?php echo $id; ?>"class="btn btn-warning2 btn-mini">Delete</a></td>
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