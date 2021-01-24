<?php session_start();
$total_bayar=$_SESSION['total_bayar']; ?>
<script type="text/javascript">
  function get_total()
  {
    var harga=document.getElementById('harga').value;
    var jumlah=parseFloat(document.getElementById('jumlah').value);
    var total=harga*jumlah;
    
    document.getElementById('total').value = parseFloat(total);

  }

function ambil_bayar()
{
  s_url="include/resto/get_bayar.php";
    s_param = "width=620,height=630,left=380,top=60,scrollbars=1,resizable=1";
    new_window = window.open(s_url,"guesthouse",s_param);
    new_window.focus();
}
function ambil_data(e)
{
  var kode= document.getElementById('nama').value;
  if (e.keyCode==9 || e.keyCode==32)
  {
    s_url="include/resto/get_cari.php?kode="+kode;
    s_param = "width=1,height=1,left=2000,top=2000,scrollbars=1,resizable=1";
    new_window = window.open(s_url,'_blank',s_param);
    window.focus();
  }
  else if(e.ctrlKey && e.keyCode==32)
  {
    ambil_bayar();
  }
  
}

function ambil_makanan()
{
  s_url="include/resto/get_resto.php";
    s_param = "width=620,height=630,left=380,top=60,scrollbars=1,resizable=1";
    new_window = window.open(s_url,"alkes",s_param);
    new_window.focus();
}
</script>
 
       
<div class="row-fluid">
  <div class="span12">
    <div class="widget">
      <div class="widget-header">
        <div class="title">
          Data Makanan
          <span class="mini-title">
            Tambah Makanan 
          </span>
        </div>
        <span class="tools">
          <a class="fs1" aria-hidden="true" data-icon="&#xe090;"></a>
        </span>
      </div>
      <div class="widget-body">
        
        <form class="form-horizontal no-margin" action="include/resto/tambah_resto.php">
          <div class="control-group">
            <label class="control-label" for="nama_barang">
              Nama Jenis
            </label>
            <div class="controls controls-row">
              <input autocomplete="off" id="nama" placeholder="Nama Makanan/Minuman" onkeydown="Javascript:ambil_data(event);" id="nama_barang" name="nama" class="span3" type="text"  readonly>
             <a href="javascript:ambil_makanan()" id="cari">&nbsp;<img src="img/cari.png" title="Cari" width="25" height="25"></a>
             <!-- <input placeholder="Kode Barang" name="kode_barang" class="span3 input-left-top-margins" type="text" > -->
            </div>
          </div>
          <div class="control-group">
            <label class="control-label" for="harga_barang"  readonly>
              Harga
            </label>
            <div class="controls">
              <input autocomplete="off"  type="text" placeholder="12.345" name="harga" id="harga" class="span6" onkeyup="javascript:get_total()" />
            </div>
          </div>
          <div class="control-group">
            <label class="control-label" for="jumlah_barang">
              Jumlah
            </label>
            <div class="controls">
              <input type="text" autocomplete="off"  placeholder="1" name="jumlah" id="jumlah" class="span6" onkeyup="javascript:get_total()" />
            </div>
          </div>
          <div class="control-group">
            <label class="control-label" for="total_harga">
              Total
            </label>
            <div class="controls">
              <input type="text" autocomplete="off"  placeholder="12.345" name="total" id="total" class="span6" readonly />
            </div>
          </div>
          <div class="form-actions no-margin">
            <button type="submit" class="btn btn-info pull-right">
              Tambah
            </button>
            <div class="clearfix">
            </div>
          </div>
          
        </form>
        
      </div>
    </div>
  </div>
  
</div>
<div class="row-fluid">
  <div class="span12">
    <div class="widget no-margin">
      <div class="widget-header">
        <div class="title">
          Invoice
        </div>
        <span class="tools">
          <a class="fs1" aria-hidden="true" data-icon="&#xe090;"></a>
        </span>
      </div>
      <div class="widget-body">
        <div class="invoice">
          <table class="table table-condensed table-striped table-bordered table-hover no-margin">
            <thead>
              <tr>
                <th style="width:10%">
                  No.
                </th>
                <th style="width:30%">
                  Nama Jenis
                </th>
                <th style="width:20%" class="hidden-phone">
                  Harga
                </th>
                <th style="width:20%" class="hidden-phone">
                  Jumlah
                </th>
                <th style="width:20%" class="hidden-phone">
                  Total
                </th>
              </tr>
            </thead>
            <tbody>
              <?php
                $no=0;
                $total_bayar=$_SESSION['total_bayar'];
                if (is_array($_SESSION['item']))
                {
                  foreach($_SESSION['item'] as $index=>$barang)
                  {
                    $no++;
                    $kode_barang=$barang['kode_barang'];
                    $nama=$barang['nama'];
                    $harga=$barang['harga'];
                    $jumlah=$barang['jumlah'];
                    $total=$barang['total'];

                    echo "
                      <tr>
                        <td>
                          $no
                        </td>
                        <td>
                          $nama
                        </td>
                        <td class='hidden-phone'>
                          $harga
                        </td>
                        <td class='hidden-phone'>
                          $jumlah
                        </td>
                        <td class='hidden-phone'>
                          $total
                        </td>
                      </tr>
                    ";
                  }
                  echo "
                  <tr class='success'>
                    <td class='total' colspan='4'>
                      Total
                    </td>
                    <td class='hidden-phone'>
                      $total_bayar
                    </td>
                  </tr>
                  ";
                }
              ?>
            </tbody>
          </table>
          <div class="form-actions no-margin">
            <a href="include/resto/reset.php" class="btn btn-info" >Reset</a>
            <button type="button" class="btn btn-info pull-right" onclick="javascript:ambil_bayar()">Simpan</button>
            <div class="clearfix">
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>