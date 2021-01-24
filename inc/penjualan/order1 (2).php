<?php session_start();
$total_bayar=$_SESSION['total_bayar']; $id=$_REQUEST['id'];?>
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
  s_url="inc/penjualan/get_bayar.php";
    s_param = "width=620,height=400,left=380,top=60,scrollbars=1,resizable=1";
    new_window = window.open(s_url,"guesthouse",s_param);
    new_window.focus();
}
function ambil_data(e)
{
  var kode= document.getElementById('nama').value;
  if (e.keyCode==9 || e.keyCode==32)
  {
    s_url="inc/penjualan/get_cari.php?kode="+kode;
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
  s_url="inc/penjualan/get_order.php";
  s_param = "width=620,height=500,left=380,top=40,scrollbars=1,resizable=1";
  new_window = window.open(s_url,"alkes",s_param);
  new_window.focus();
}

  function ongkir1() {
    var temp1 = new Array();
    var temp2 = new Array();
    var totalb = $("#totalb").val();
    var ongkir = $("#ongkir").val();
    temp1 = totalb.split(" ");
    temp2 = ongkir.split(" ");

    var hasil = parseInt(temp1[1]) + parseInt(temp2[1]);
    
    $("#total12").val(hasil);
  }
  function kembali() {
    var temp3 = new Array();
    var temp4 = new Array();
    var total121 = $('#total12').val();
    var bayar12 = $('#bayar').val();
    temp3 = total121.split(" ");
    temp4 = bayar12.split(" ");
    var totaal = parseInt(temp3[1]) - parseInt(temp4[1]);
    $('#kembalian').val(totaal);
  }
</script>

<section class="content-header">
    <div class="panel-heading">
        <label class="tambah1">Form Order</label>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Order</a></li>
        </ol>
    </div>
</section>
<div class="panel-body">
    <div class="row">
        <div class="col-lg-6">
            <!-- Modal Daftar Produk-->
            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Daftar Product</h4>
                  </div>
                  <div class="modal-body">
                    <!--<form method="get" action="get_cari.php">
                      <label>kode atau judul
                        <input type="text" class="form-control" name="search" />
                      </label>
                        <input type="submit" value="Cari" class="btn btn-default" />
                    </form>-->
                    <div id="table_buku">
                      <?php
                        
                      $hostname="localhost";
                      $username="root";
                      $pass="";

                      $config=mysql_connect($hostname,$username,$pass) or die ("mysql_error()");

                      mysql_select_db('delio');
                        
                        $file = "?psg=get_cari";
                        $page = "?psg=get_cari";
                        // Memanggil dan menginisiasi class
                        include "class_paging.php";
                        $p = new Paging;
                        
                        // Tentukan limit atau batas
                        $batas = 50;
                        
                        // Cek halaman dan posisi data
                        $posisi = $p->cariPosisi($batas);
                        
                        $warna1 = "#FFFFFF"; //baris ganjil
                        $warna2 = "#F5F5F5"; //baris genap
                        $warna = $warna1; //warna default
                        
                      ?>
                      <table cellpadding="4" class="table table-bordered table-hover" id="dataTables-contoh">
                        <thead>
                          <tr class="centertd">
                            <td>No</td>
                            <td>ID Product</td>
                            <td>Nama Product</td>
                            <td>Harga</td>
                            <td>Option</td>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                            $no=$posisi+1;
                            $search=$_REQUEST['search'];
                            
                            $query="SELECT * FROM produk";
                           
                            
                            if($search!='')
                            {
                              $sql = mysql_query("SELECT * FROM produk WHERE nama_produk LIKE '%$search%' ORDER BY nama_produk ASC LIMIT $posisi,$batas") or die (mysql_error());
                              $sql2 = mysql_query("SELECT * FROM produk WHERE nama_produk LIKE '%$search%' ORDER BY nama_produk ASC");
                            }
                            else
                            {
                              $sql = mysql_query("SELECT * FROM produk ORDER BY nama_produk ASC LIMIT $posisi,$batas") or die (mysql_error());
                              $sql2 = mysql_query("SELECT * FROM produk ORDER BY nama_produk ASC");
                            }
                            while($row=mysql_fetch_array($sql))
                            {
                              if($no%2==0)
                                $warna=$warna2;
                              else
                                $warna=$warna1;
                            
                              //mencari sisa
                              $id_produk=$row['id_produk'];
                              $nama=$row['nama_produk'];
                              $harga=$row['harga_saller'];
                              $harga1=$row['harga_resaller'];
                              
                              $nama=str_replace("'"," ", $nama);
                               $customer=mysql_query("SELECT * FROM customer where id_customer='$id'");
                               $xc=mysql_fetch_array($customer);
                               $statt=$xc["status_cust"];
                               
                              if($statt=="buyer")
                              {
                              ?>
                              <tr align="center" bgcolor="<?php echo $warna ?>">
                                <td><?php echo $no?></td>
                                <td><?php echo $id_produk ?></td>
                                <td><?php echo $nama ?></td>
                                <td class="rupiahformat"><?php echo $harga?></td>
                                <td>
                                  <button type="submit" data-harga="<?php echo $harga1; ?>" data-name="<?php echo $nama; ?>" class="btn btn-primary tambah">Tambah</button>
                                </td>
                              </tr>
                              <?php
                              }
                              elseif($statt=="reseller")
                              {
                                ?>
                                 <tr align="center" bgcolor="<?php echo $warna ?>">
                                  <td><?php echo $no?></td>
                                  <td><?php echo $id_produk ?></td>
                                  <td><?php echo $nama ?></td>
                                  <td class="rupiahformat"><?php echo $harga1;?></td>
                                  <td>
                                    <button type="submit" data-harga="<?php echo $harga; ?>" data-name="<?php echo $nama; ?>" class="btn btn-primary tambah">Tambah</button>
                                  </td>
                                </tr>
                                <?php
                              }
                              $no++;
                            }
                          ?>
                        </tbody>
                      </table>
                      <?php
                        /*// Dapatkan jumlah data keseluruhan
                        $jmldata = mysql_num_rows($sql2);
                        
                        // Dapatkan jumlah halaman
                        $jmlhalaman = $p->jumlahHalaman($jmldata, $batas);
                        
                        // Cetak link navigasi halaman
                        $linkHalaman = $p->navHalaman($_GET[halaman], $jmlhalaman, $page);
                        echo $linkHalaman;*/
                      ?> 
                    </div>
                  </div>
                </div>
              </div>
            </div>

            
            <form method="POST" action="inc/penjualan/order_penjualan.php">  
            <?php 
            include "config/koneksi.php";
            $id=$_REQUEST['id'];
            $s=mysql_query("SELECT * FROM customer LEFT JOIN 
            provinsi ON customer.code_provinsi = provinsi.code_provinsi 
            LEFT JOIN kabupaten ON customer.Id_Kabupaten = kabupaten.Id_Kabupaten 
            LEFT JOIN kecamatan ON customer.kode_kecamatan = kecamatan.kode_kecamatan where id_customer='$id'");
            $u=mysql_fetch_array($s); 

            $kecamatan1 = $u ['nama_kecamatan'];
            $kabkot = $u['nama_kabkot'];
            $provinsi1 = $u['nama_provinsi'];
            ?>       
             <div class="form-group">
                    <input type="hidden" name="id" value="<?php echo $id;?>">
                    <label>Nama Customer</label>
                    <input class="form-control fromstyle" name="nama_cust" value="<?php echo $u['nama']; ?>" readonly>
                </div>
                 <div class="form-group">
                    <label>No.Telp</label>
                    <input class="form-control fromstyle" name="no_tlpn" value="<?php echo $u['no_tlpn']; ?>"readonly>
                </div>
                <div class="form-group tooltip-demo">
                    <label>Nama Produk</label>
                     <input autocomplete="off" id="nama" placeholder="Nama Product" 
                     onkeydown="Javascript:ambil_data(event);" id="nama" name="nama" 
                     class="form-control fromstyle" type="text"  readonly>
                      <!--<a href="javascript:ambil_makanan()" id="cari">&nbsp;<img src="img/cari.png" title="Cari" width="25" height="25"></a>-->

                      <a data-toggle='tooltip' data-placement='right' title="Search">
                        <button type="button" data-toggle="modal" data-target="#myModal" class="btn btn-primary" style="margin-top: 5px;">
                          <i class="glyphicon glyphicon-search"></i>
                        </button>
                      </a>
                </div>

                <div class="form-group tooltip-demo">
                    <label>Bonus</label>
                     <input autocomplete="off" id="nama_bonus" placeholder="Bonus" 
                     onkeydown="Javascript:ambil_data(event);" id="nama1" name="namabon" 
                     class="form-control fromstyle" type="text"  readonly>
                      <!--<a href="javascript:ambil_makanan()" id="cari">&nbsp;<img src="img/cari.png" title="Cari" width="25" height="25"></a>-->

                      <a data-toggle='tooltip' data-placement='right' title="Search">
                        <button type="button" data-toggle="modal" data-target="#myModalbonus" class="btn btn-primary" style="margin-top: 5px;">
                          <i class="glyphicon glyphicon-search"></i>
                        </button>
                      </a>
                </div>
       
                <div class="form-group">
                    <label>Harga Bonus</label>
                     <input autocomplete="off" readonly type="text" placeholder="12.345" name="harga_bonus1" id="harga_bonus" class="form-control fromstyle" onkeyup="javascript:get_total()" />
                </div>
                 <div class="form-group">
                    <label>Jumlah Bonus</label>
                    <input type="text" readonly value="0" autocomplete="off"  placeholder="1" name="jumlah2" id="jumlah2" class="form-control fromstyle" onkeyup="javascript:get_total()" />
                </div>
                <div class="form-group">
                    <label>Harga Produk</label>
                     <input autocomplete="off" readonly type="text" placeholder="12.345" name="harga" id="harga" class="form-control fromstyle" onkeyup="javascript:get_total()" />
                </div>
                <div class="form-group">
                    <label>Jumlah Produk</label>
                    <input type="text" autocomplete="off"  placeholder="1" name="jumlah" id="jumlah" class="form-control fromstyle" onkeyup="javascript:get_total()" />
                </div>
                 <div class="form-group">
                    <label>Total</label>
                     <input type="text" autocomplete="off"  placeholder="12.345" name="total" id="total" class="form-control fromstyle" readonly />
                </div>
                
                <div class="form-group">
                   <button type="submit" class="btn btn-info pull-right">
                    Tambah
                  </button>
                </div>
            </form>
           
        </div>
    </div>
</div>

<div class="panel-body">
  <div class="row">
    <div class="col-lg-6">
      <table class="table table-condensed table-striped table-bordered table-hover no-margin tooltip-demo"
       width="800px">
        <thead>
          <tr class="centertd ">
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
            <td style="width:20%" class="hidden-phone ">
              Total
            </td>
            <td>
              Action
            </td>
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
                //$kode_barang=$barang['kode_barang'];
                $id_bonus=$barang['id_bonus'];
                $id_produk=$barang['id_produk'];
                $nama=$barang['nama'];
                $harga=$barang['harga'];
                $jumlah=$barang['jumlah'];
                $namabon1=$barang['namabon'];
                $hargabon=$barang['harga_bonus1'];
                $jumlah2=$barang['jumlah2'];
                $nilai1=$barang['total'];

                echo "
                  <tr align='center'>
                    <td>
                      $no
                    </td>
                    <td>
                      $nama
                    </td>
                    <td class='hidden-phone rupiahformat'>
                      $harga
                    </td>
                    <td class='hidden-phone'>
                      $jumlah
                    </td>
                    <td class='hidden-phone rupiahformat'>
                      $nilai1
                    </td>
                    <td>
                      <a data-toggle='tooltip' data-placement='top' title='Delete' href=\"inc/penjualan/del_orderan.php?del=$no\"><i class='glyphicon glyphicon-trash'></i> 
                    </td>
                  </tr>
                ";
              }
          ?>
        </tbody>
      </table>

      <table class="table table-condensed table-striped table-bordered table-hover no-margin"
       width="800px">
        <thead>
          <tr class="centertd">
            <td style="width:10%">
              No.
            </td>
           
            <td style="width:30%">
              Nama Bonus
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
            $nomor=0;
            if (is_array($_SESSION['bonus']))
            {
              foreach($_SESSION['bonus'] as $index=>$barang)
              {
                $nomor++;
                //$kode_barang=$barang['kode_barang'];
                $id_bonus=$barang['id_bonus'];
                $id_produk=$barang['id_produk'];
                $nama=$barang['nama'];
                $harga=$barang['harga'];
                $jumlah=$barang['jumlah'];
                $total=$barang['total'];
                $namabon1=$barang['namabon'];
                $jumlah2=$barang['jumlah2'];
                $hargabon=$barang['harga_bonus1'];

                echo "
                  <tr align='center'>
                    <td>
                      $nomor
                    </td>
                    <td>
                      $namabon1
                    </td>
                    <td class='hidden-phone rupiahformat'>
                      $hargabon
                    </td>
                    <td class='hidden-phone'>
                      $jumlah2
                    </td>
                    <td class='hidden-phone rupiahformat'>
                      $hargabon
                    </td>
                  </tr>
                ";
              }
              }
              echo "
              <tr class='success'>
                <td class='total' colspan='4'>
                  Total Belanja
                </td>
                <td class='hidden-phone rupiahformat' align='center'>
                  $total_bayar
                </td>
              </tr>
              ";
            }
          ?>
        </tbody>
      </table>
      <div class="form-actions no-margin">
        <a href="inc/penjualan/reset.php" class="btn btn-info" >Reset</a>
        <button type="button" data-toggle="modal" data-target="#myModal1" class="btn btn-info pull-right">Simpan</button>
        <div class="clearfix">
        </div>
      </div>
    </div> 
  </div>
</div>


<!-- Modal Daftar Produk-->
<div class="modal fade" id="myModalbonus" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Daftar Bonus</h4>
      </div>
      <div class="modal-body">
        <!--<form method="get" action="get_cari.php">
          <label>kode atau judul
            <input type="text" class="form-control" name="search" />
          </label>
            <input type="submit" value="Cari" id="ordercari" class="btn btn-default"/>
        </form>-->

        <table class="table table-bordered table-hover" id="dataTables-example">
          <thead>
            <tr class="centertd">
              <td>No</td>
              <td>Nama Bonus</td>
              <td>Harga Bonus</td>
              <td>Option</td>
            </tr>
          </thead>
          <tbody>
            <?php
              $no=$posisi+1;
              $search=$_REQUEST['search'];
              
              $query="SELECT * FROM bonus";
             
              
              if($search!='')
              {
                $sql = mysql_query("SELECT * FROM bonus WHERE nama_bonus LIKE '%$search%' ORDER BY nama_bonus ASC LIMIT $posisi,$batas") or die (mysql_error());
                $sql2 = mysql_query("SELECT * FROM bonus WHERE nama_bonus LIKE '%$search%' ORDER BY nama_bonus ASC");
              }
              else
              {
                $sql = mysql_query("SELECT * FROM bonus ORDER BY nama_bonus ASC LIMIT $posisi,$batas") or die (mysql_error());
                $sql2 = mysql_query("SELECT * FROM bonus ORDER BY nama_bonus ASC");
              }
              while($row=mysql_fetch_array($sql))
              {
                if($no%2==0)
                  $warna=$warna2;
                else
                  $warna=$warna1;
              
                //mencari sisa
                $id_bonus=$row['id_bonus'];
                $nama1=$row['nama_bonus'];
                $harga2=$row['harga_bonus'];
                $nama1=str_replace("'"," ", $nama1);

                 $customer=mysql_query("SELECT * FROM customer where id_customer='$id'");
                 $xc=mysql_fetch_array($customer);
                 $statt=$xc["status_cust"];
                 
                if($statt=="reseller")
                {
                ?>
                <tr align="center">
                  <td><?php echo $id_bonus ?></td>
                  <td><?php echo $nama1 ?></td>
                  <td class="rupiahformat"><?php echo $harga2?></td>
                  <td>
                    <button type="submit" data-harga="<?php echo $harga2; ?>" data-name="<?php echo $nama1; ?>" class="btn btn-primary tambah1">Tambah</button>
                  </td>
                </tr>
                <?php
                }
                elseif($statt=="buyer")
                {
                  ?>
                   <tr align="center">
                    <td><?php echo $id_bonus ?></td>
                    <td><?php echo $nama1 ?></td>
                    <td class="rupiahformat"><?php echo $harga2?></td>
                    <td>
                      <button type="submit" data-harga="<?php echo $harga2; ?>" data-name="<?php echo $nama1; ?>" class="btn btn-primary tambah1">Tambah</button>
                    </td>
                  </tr>
                  <?php
                }
                $no++;
              }
            ?>
          </tbody>
        </table>
        <?php
          /*/ Dapatkan jumlah data keseluruhan
          $jmldata = mysql_num_rows($sql2);
          
          // Dapatkan jumlah halaman
          $jmlhalaman = $p->jumlahHalaman($jmldata, $batas);
          
          // Cetak link navigasi halaman
          $linkHalaman = $p->navHalaman($_GET[halaman], $jmlhalaman, $page);
          echo $linkHalaman;*/
        ?>
      </div>
    </div>
  </div>
</div>

<!-- Modal Pembayaran -->
<div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Pembayaran</h4>
      </div>
      <div class="modal-body">
        
        <form method="post" action="inc/penjualan/order_proses.php">
          <input type="hidden" name="tgl_jual" id="tgl_jual" />
          <input type="hidden" name="idc" value="<?php echo $id; ?>">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                    <label>Alamat Tujuan</label>
                    <input class="form-control fromstyle" name="alamat" value="<?php echo $u['alamat']; ?>">
                </div>
                <div class="form-group">
                    <label>Nama Yang Di Tuju</label>
                    <input class="form-control fromstyle" name="namatujuan" value="<?php echo $u['nama']; ?>" >
                </div>
                <div class="form-group">
                  <label>Negara</label>
                  <input type="text" class="form-control" name="negara" value="<?php echo $u['negara']; ?>">
                  <!--<select class="form-control fromstyle" name="negara" id="negara" value="<?php echo $id; ?>">
                      <option>--Pilih Negara--</option>
                      <?php
                          $negara=mysql_query("SELECT * FROM countries ORDER BY country_name DESC");
                          while ($nega=mysql_fetch_array($negara)) {
                              echo "<option value=\"$nega[country_name]\">$nega[country_name]</option>\n";
                          }
                      ?>
                  </select>-->
                </div>
                <div class="form-group">
                    <label>Provinsi</label>
                    <input type="text" class="form-control" name="provin" value="<?php echo $provinsi1; ?>">
                    <!--<select class="form-control fromstyle" name="provin" id="provin"></select>-->
                </div>
                <div class="form-group">
                    <label>Kota/Kabupaten</label>
                    <input type="text" class="form-control" name="propinsi" value="<?php echo $kabkot; ?>">
                    <!--<select class="form-control fromstyle" name="propinsi" id="propinsi"></select>-->
                </div>
                <div class="form-group">
                    <label>Kecamatan</label>
                    <input type="text" class="form-control formstyle" name="kota" value="<?php echo $kecamatan1; ?>">
                    <!--<select class="form-control fromstyle" name="kota" id="kota"></select>-->
                </div>
                <div class="form-group">
                    <label>Kode Pos</label>
                    <input class="form-control kodepos" name="kode" >
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label>Total Belanja</label>
                  <input type="text" id="totalb" name="totalb" class="form-control form1 fromstyle rupiahformat1" value="<?php echo $total_bayar; ?>"/>
                </div>
                <div class="form-group">
                  <label>Ongkir</label>
                  <input type="text" id="ongkir" name="ongkir" onkeyup="ongkir1()" class="form-control form1 fromstyle rupiahformat1" autocomplete="off" />
                </div>
                <div class="form-group">
                  <label>Total Keseluruhan</label>
                  <input type="text" id="total12" name="total12" class="form-control form1 fromstyle rupiahformat1"/>
                </div>
                <div class="form-group">
                  <label>Bayar</label>
                  <input type="text" id="bayar" data-bayar="bayar" name="bayar" class="form-control form1 fromstyle rupiahformat1" onkeyup="kembali()" autocomplete="off"/>
                </div>
                <div class="form-group">
                  <label>Sisa</label>
                  <input id="kembalian" data-kembalian="kembalian" type="text" name="kembalian" class="form-control form1 fromstyle rupiahformat1" />
                </div>
                <div class="form-group">
                  <label>Catatan</label>
                  <textarea name="catatan" class="form-control fromstyle"></textarea>
                </div>
              </div>
            </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button id="okelah" type="submit" class="btn btn-primary">Ok</button>
          </div> 
        </form>
    </div>
  </div>
</div>

<script type="text/javascript" language="javascript">
    
    <!--Combobox Kota-->
    var htmlobjek;
    $(document).ready(function() {
        $("#provin").change(function(event){
            var provin = $("#provin").val();
            $("#propinsi").load('inc/customer/ambilkota.php', {"provin":provin});
        });
    }); 

    <!--Combobox Kecamatan-->
    var htmlobjek;
    $(document).ready(function() {
        $("#propinsi").change(function(event){
            var propinsi = $("#propinsi").val();
            $("#kota").load('inc/customer/ambilkecamatan.php', {"propinsi":propinsi});
        });
    }); 

    <!--Combobox provinsi-->
    var htmlobjek;
    $(document).ready(function() {
        $("#negara").change(function(event){
            var negara = $("#negara").val();
            if (negara=='Indonesia') {
                $("#provin").prop('disabled',false);
                $("#kota").prop('disabled',false);
                $("#propinsi").prop('disabled',false);
                $("#provin").load('inc/customer/ambilnegara.php', {"negara":negara} );
            }
            else {
                $("#provin").prop('disabled',true);
                $("#kota").prop('disabled',true);
                $("#propinsi").prop('disabled',true);
            }
        });
    });
</script>