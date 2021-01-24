<?php
    include 'config/koneksi.php';
     session_start();
    $username=$_SESSION['username'];
    $id_user=$_SESSION['id_user'];
    $status = $_SESSION['status'];

$inv=$_REQUEST['inv'];
            
    $s=mysql_query("SELECT *
FROM penjualan pe, customer c, produk p, kat_produk k, orderan o
WHERE o.id_customer = c.id_customer
AND pe.id_produk = p.id_produk
AND p.id_k_pr = k.id_k_pr
AND pe.invoice = o.invoice and o.invoice='$inv'");

    $d=mysql_fetch_array($s);
    $g=$d['gambar'];
    $o=$d['ongkir_sup'];

?>
<section class="content-header">
    <div class="panel-heading">
        <label>Detail Order Control Panel</label>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Detail Order</a></li>
        </ol>
    </div>
</section>
<div class="panel-body">
    <div class="row">
        <div class="col-lg-6">
          <form role="form" method="POST" action="inc/penjualan/detail_proses.php" enctype="multipart/form-data">                   
              <div class="form-group">
                    <label>Nama Customer</label>
                    <input class="form-control fromstyle" name="nama" 
                    value="<?php echo $d['nama']; ?> " readonly>
                    <input type="hidden" class="form-control fromstyle" name="id" 
                    value="<?php echo $d['id_customer']; ?> " readonly>
                    <input type="hidden" name="inv" value="<?php echo $inv; ?>">
                </div>
                <div class="form-group">
                    <label>Alamat Customer</label>
                    <input class="form-control  fromstyle" name="nama" 
                    value="<?php echo $d['alamat']; ?> "readonly>
                </div>
                <div class="form-group">
                  <label>Status Bayar</label>
                  <select name="statusbayar" id="status2" data-status="status" class="form-control form1 fromstyle">
                    <option value="Sudah Bayar">Sudah Bayar</option>        
                    <option value="Belum Bayar">Belum Bayar</option>
                  </select>
                </div>
                <div class="form-group">
                  <label>Pembayaran Via</label>
                  <select id="via" data-via="pembayaran" name="viabayar" class="form-control form1 fromstyle">
                      <option value="Mandiri">Mandiri</option>      
                      <option value="BCA">BCA</option>
<option value="BRI">BRI</option>
<option value="BNI">BNI</option>
<option value="WU">WESTERN UNION</option>
                  </select>
                </div>
                <div class="form-group">
                  <label>Closing Via</label>
                  <select id="closing1" data-closing="via" name="closing" class="form-control form1 fromstyle">
                      <option value="BBM">BBM</option>
                      <option value="SMS">SMS</option>
<option value="WA">WA</option>
<option value="LINE">LINE</option>
<option value="LINE@">LINE@</option>
                  </select>
                </div>
 <div class="form-group">
                  <label>Kurir</label>
                  <select id="via" data-via="kurir" name="kurir" class="form-control form1 fromstyle">
                      <option value="JNE">JNE</option>      
                      <option value="TIKI">TIKI</option>
<option value="POS">POS</option>
<option value="COD">COD</option>
                  </select>
                </div>

                <?php
                
                 if($g!="")
                { 
                  if($status=="admin") {
                ?>
                <div class="form-group img-hover">
                  <label>Bukti Transfer</label><br>
                  <img id="zoom myModal" class="img-responsive img-rounded" src="images/penjualan/<?php echo $d['gambar']; ?>" data-toggle="modal" data-target="#myModal" >
                  <div class="form-actions no-margin">
                    <?php
                      $sdl = mysql_query("SELECT * FROM proff WHERE invoice ='$inv' ");
                      $mysq = mysql_fetch_array($sdl);
                      $sta = $mysq['status'];
                      $nn=$mysq['nama'];
                      if ($sta == "yes") {
                        echo "<br><input class='form-control fromstyle valid12' value='Valid oleh $nn' readonly>";
                      }
                      else {
                        echo "<a class='btn btn-info tbl_proff' style='margin-bottom: 10px; float: right;'>Validasi</a>"; 
                      }
                    ?>
                  </div>
                  <!-- Modal -->
                  <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog modal-lg" role="document">
                      <div class="modal-content">
                        <div class="modal-body">
                          <div class="modalimg">
                            <img src="images/penjualan/<?php echo $d['gambar']; ?>" style="width: 850px; height: 500px; margin-left: 5px;">
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                 <div class="form-group">
                    <label>Ongkir Supplier</label>
                    <input class="form-control fromstyle" name="ongkir"
                    value="<?php echo $d['ongkir_sup']; ?>" >
                </div>

                 <div class="form-group">
                    <label>Resi</label>
                    <input class="form-control fromstyle" name="resi"
                    value="<?php echo $d['resi']; ?>" >
                </div>
                 <?php } 
                 elseif($status=="teamleader") {
                ?>
                <div class="form-group img-hover">
                  <label>Bukti Transfer</label><br>
                  <img  id="zoom myModal" class="img-responsive img-rounded" src="images/penjualan/<?php echo $d['gambar']; ?>" data-toggle="modal" data-target="#myModal">
                  <div class="form-actions no-margin">
                    <?php
                      $sdl = mysql_query("SELECT * FROM proff WHERE invoice ='$inv' ");
                      $mysq = mysql_fetch_array($sdl);
                      $sta = $mysq['status'];
                      $nn = $mysq['nama'];
                      if ($sta == "yes") {
                        echo "<br><input class='form-control fromstyle' value='Valid oleh $nn' readonly>";
                      }
                      else {
                        echo "<a class='btn btn-info tbl_proff' style='margin-bottom: 10px; float: right;'>Validasi</a>"; 
                      }
                      //<a class="btn btn-info tbl_proff" style="margin-bottom: 10px; float: right;">Proof</a>
                    ?>
                  </div>
                  <!-- Modal -->
                  <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog modal-lg" role="document">
                      <div class="modal-content">
                        <div class="modal-body">
                          <div class="modalimg">
                            <img src="images/penjualan/<?php echo $d['gambar']; ?>" style="width: 850px; height: 500px; margin-left: 5px;">
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>  
                </div>
                 <div class="form-group">
                    <label>Ongkir Supplier</label>
                    <input class="form-control fromstyle" name="ongkir"
                    value="<?php echo $d['ongkir_sup']; ?>" >
                </div>

                 <div class="form-group">
                    <label>Resi</label>
                    <input class="form-control fromstyle" name="resi"
                    value="<?php echo $d['resi']; ?>" >
                </div>
                 <?php } 
                 elseif($status=="cs") {
                ?>
                <div class="form-group img-hover">
                    <label>Bukti Transfer</label><br>
                    <img id="zoom myModal" class="img-responsive img-rounded" src="images/penjualan/<?php echo $d['gambar']; ?>" data-toggle="modal" data-target="#myModal">
                    <div class="form-actions no-margin">
                      <?php
                        $sdl = mysql_query("SELECT * FROM proff WHERE invoice ='$inv' ");
                        $mysq = mysql_fetch_array($sdl);
                        $sta = $mysq['status'];
                        $nn = $mysq['nama'];
                        if ($sta == "yes") {
                          echo "<br><input class='form-control fromstyle' value='Valid oleh $nn' readonly>";
                        }
                        else {
                          echo "<a class='btn btn-info tbl_proff' style='margin-bottom: 10px; float: right;'>Velidasi</a>"; 
                        }
                        //<a class="btn btn-info tbl_proff" style="margin-bottom: 10px; float: right;">Proof</a>
                      ?>
                    </div>
                    <!-- Modal -->
                    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                      <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                          <div class="modal-body">
                            <div class="modalimg">
                              <img src="images/penjualan/<?php echo $d['gambar']; ?>" style="width: 850px; height: 500px; margin-left: 5px;">
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>                    
                </div>
                 <div class="form-group">
                    <label>Ongkir Supplier</label>
                    <input class="form-control fromstyle" name="ongkir"
                    value="<?php echo $d['ongkir_sup']; ?>" readonly >
                </div>

                 <div class="form-group">
                    <label>Resi</label>
                    <input class="form-control fromstyle" name="resi"
                    value="<?php echo $d['resi']; ?>" readonly >
                </div>
                 <?php } 
               }
                else
                {
                  if($status=="admin")
                  {

                  ?>
                <div class="form-group">
                    <label>Bukti Transfer</label>
                    <input name="fupload" type="file" class="btn btn-default">
                </div>
                 <div class="form-group">
                    <label>Ongkir Supplier</label>
                    <input class="form-control fromstyle" name="ongkir" >
                </div>

                 <div class="form-group">
                    <label>Resi</label>
                    <input class="form-control fromstyle" name="resi" >
                </div>
                 <?php  }
                  elseif($status=="teamleader")
                  {

                  ?>
                <div class="form-group">
                    <label>Bukti Transfer</label>
                    <input name="fupload" type="file" class="btn btn-default">
                </div>
                 <div class="form-group">
                    <label>Ongkir Supplier</label>
                    <input class="form-control fromstyle" name="ongkir" >
                </div>

                 <div class="form-group">
                    <label>Resi</label>
                    <input class="form-control fromstyle" name="resi" >
                </div>
                 <?php  }
                  elseif($status=="cs")
                  {

                  ?>
                <div class="form-group">
                    <label>Bukti Transfer</label>
                    <input name="fupload" type="file" class="btn btn-default">
                    <div class="form-actions no-margin">
                        <?php
                          $sdl = mysql_query("SELECT * FROM proff WHERE invoice ='$inv' ");
                          $mysq = mysql_fetch_array($sdl);
                          $sta = $mysq['status'];
                          $nn = $mysq['nama'];
                          if ($sta == "yes") {
                            echo "<br><input class='form-control fromstyle' value='Valid oleh $nn' readonly>";
                          }
                          else {
                            echo "<a class='btn btn-info tbl_proff' style='margin-bottom: 10px; float: right;'>Validasi</a>"; 
                          }
                          //<a class="btn btn-info tbl_proff" style="margin-bottom: 10px; float: right;">Proof</a>
                        ?>
                    </div>  
                </div>
                 <div class="form-group">
                    <label>Ongkir Supplier</label>
                    <input class="form-control fromstyle" name="ongkir" readonly >
                </div>

                 <div class="form-group">
                    <label>Resi</label>
                    <input class="form-control fromstyle" name="resi" readonly >
                </div>
                 <?php  }

                  } ?>
                  <div class="form-group">
                    <?php
                      $sdl = mysql_query("SELECT * FROM proff WHERE invoice ='$inv' ");
                      $mysq = mysql_fetch_array($sdl);
                      $sta = $mysq['status'];
                      if ($sta == "yes") {
                        echo "<button type='submit' disabled='true' class='btn btn-default simpan'>Simpan</button>";
                      }
                      else {
                        echo "<button type='submit' class='btn btn-default simpan'>Simpan</button>"; 
                      }
                    ?>
                </div>
              </form>

            <table class="table table-condensed table-striped table-bordered table-hover no-margin"
       width="800px">
        <thead>
          <tr class="centertd">
            <td style="width:10%">
              No.
            </td>
           
            <td style="width:30%">
              Nama Produk
            </td>
            <td style="width:20%" class="hidden-phone">
              Harga
            </td>
            <td style="width:20%" class="hidden-phone">
              Jumlah
            </td>
            <td style="width:20%" class="hidden-phone">
              Total
            </td>
          </tr>
        </thead>
        <tbody>
            <?php 
            $no=1;
            
            $s1=mysql_query("SELECT *
            FROM penjualan pe, customer c, produk p, kat_produk k, orderan o
            WHERE o.id_customer = c.id_customer
            AND pe.id_produk = p.id_produk
            AND p.id_k_pr = k.id_k_pr
            AND pe.invoice = o.invoice and o.invoice='$inv'");

            while($q1=mysql_fetch_array($s1))
            {
              $masuk=$q1['masuk'];
              $jumlah=$q1['jumlah'];
              $uu=0;
              $total_bayar+=$masuk;
              echo "
                <tr align='center'>
                  <td>
                    $no
                  </td>
                  
                  <td>
                    $q1[nama_produk]
                  </td>
                  <td class='hidden-phone rupiahformat'>
                    $q1[harga_jual]
                  </td>
                  <td class='hidden-phone'>
                    $jumlah
                  </td>
                  <td class='hidden-phone rupiahformat'>
                    $masuk
                  </td>
                </tr>
              "; 
                $no++;
            }
              echo "
                <tr class='success'>
                  <td class='total' colspan='4'>
                    Total
                  </td>
                  <td class='hidden-phone rupiahformat' align='center'>
                    $total_bayar
                  </td>
                </tr>
              "; ?>
            </tbody>
          </table>
        <div class="form-actions no-margin">
          <a href="?psg=penjualan/order1&tambah=<?php echo $inv; ?>" class="btn btn-info"  style="margin-bottom: 10px; float: right;">Tambah</a>
        </div>  
        </div>
    </div>
</div>

<script >
  $(document).ready(function () {
    $(".tbl_proff").click(function(){
      $(".tbl_proff").hide();
      var tbl = $(".tbl_proff").val();
      $(".tbl_proff").load('inc/penjualan/proff.php?tbl=<?php echo $inv; ?>'+tbl);
      $(".simpan").attr('disabled', true);
    });
  });
</script>