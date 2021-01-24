<?php
    session_start();
    $username=$_SESSION['username'];
    $id_user=$_SESSION['id_user'];
    $status = $_SESSION['status'];
    //echo $id_user;

    if ($status == "admin") { ?>
       <div class="navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav" id="side-menu">
           
            <li>
                <a href="index.php" class="active"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
            </li>
            <li>
                <a href=""><i class="fa fa-bar-chart-o fa-fw"></i> Data<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                     <li>
                        <a href="?psg=karyawan/karyawan">&raquo; Karyawan</a>
                    </li>
                    <li>
                        <a href="?psg=customer/t_customer">&raquo; Customer</a>
                    </li>
                    <li>
                        <a href="?psg=produk/t_produk">&raquo; Produk</a>
                    </li>
                     <li>
                        <a href="?psg=pemasukan/pemasukan">&raquo; Pemasukan</a>
                    </li>
                    <li>
                        <a href="?psg=pengeluaran/pengeluaran">&raquo; Pengeluaran</a>
                    </li>
                    <li>
                        <a href="?psg=penjualan/penjualan">&raquo; Penjualan</a>
                    </li>
                    <li>
                        <a href="?psg=export/export">&raquo; Export</a>
                    </li>
                    
                    <li>
                        <a href="?psg=user/t_user">&raquo; User</a>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>
            <li>
                <a href="#"><i class="fa fa-wrench fa-fw"></i> Kategori<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="?psg=kategori/pengeluaran/t_kat_pengeluaran">&raquo; Pengeluaran</a>
                    </li>
                    <li>
                       <a href="?psg=kategori/pemasukan/t_kat_pemasukan">&raquo; Pemasukan</a>
                    </li>
                    <li>
                        <a href="?psg=kategori/produk/t_kat_produk">&raquo; Produk</a>
                    </li>
<li>
                        <a href="?psg=bonus/t_bonus">&raquo; Bonus</a>
                    </li>
                </ul>
                <!-- /.nav-third-level -->
            </li>
            <li>
                <a href="#"><i class="fa fa-sitemap fa-fw"></i> Laporan<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    
                    <li>
                        <a href="?psg=laporan/pengeluaran/pengeluaran">&raquo;Pengeluaran</a>
                    </li>
                    <li>
                         <a href="?psg=laporan/pemasukan/pemasukan">&raquo;Pemasukan</a>
                    </li>
                    <li>
                         <a href="?psg=laporan/penjualan/penjualan">&raquo;Penjualan<span class="fa arrow"></span></a>
                         
                         <ul class="nav nav-third-level collapse">
                               <li>
                                <a href="?psg=laporan/customer/customer">&raquo;Customer</a>
                            </li>
                            <li>
                                <a href="?psg=laporan/customer/customerpercat">&raquo;Customer per Cat</a>
                            </li>
                               <li>
                                <a href="?psg=laporan/produk/produk">&raquo;Produk</a>
                            </li>
                               <li>
                                <a href="?psg=laporan/kota/kota">&raquo;Kota</a>
                            </li>
                                 </li>
                               <li>
                                <a href="?psg=laporan/cs/cs">&raquo;Customer Service</a>
                            </li>
                         </ul>

                    </li>
                    <li>
                        <a href="?psg=laporan/transaksi/transaksi">&raquo;Transaksi</a>
                    </li>
                </ul>
                <!-- /.nav-fourth-level -->
            </li>
        </ul>
        <!-- /#side-menu -->
    </div>
    <!-- /.sidebar-collapse -->
</div> <?php
    }
    elseif ($status == "teamleader") { ?>

        <div class="navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav" id="side-menu">
           
            <li>
                <a href="#" class="active"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
            </li>
            <li>
                <a href="?psg=t_customer"><i class="fa fa-bar-chart-o fa-fw"></i> Data<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                     <li>
                        <a href="?psg=karyawan/karyawan">&raquo; Karyawan</a>
                    </li>
                    <li>
                        <a href="?psg=customer/t_customer">&raquo; Customer</a>
                    </li>
                    <li>
                        <a href="?psg=produk/t_produk">&raquo; Produk</a>
                    </li>
                     <li>
                        <a href="?psg=pemasukan/pemasukan">&raquo; Pemasukan</a>
                    </li>
                    <li>
                        <a href="?psg=pengeluaran/pengeluaran">&raquo; Pengeluaran</a>
                    </li>
                    <li>
                        <a href="?psg=penjualan/penjualan">&raquo; Penjualan</a>
                    </li>
                    <li>
                        <a href="?psg=bonus/t_bonus">&raquo; Bonus</a>
                    </li>
                    <li>
                        <a href="?psg=user/t_user">&raquo; User</a>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>
            <li>
                <a href="#"><i class="fa fa-wrench fa-fw"></i> Kategori<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="?psg=kategori/pengeluaran/t_kat_pengeluaran">&raquo; Pengeluaran</a>
                    </li>
                    <li>
                       <a href="?psg=kategori/pemasukan/t_kat_pemasukan">&raquo; Pemasukan</a>
                    </li>
                    <li>
                        <a href="?psg=kategori/produk/t_kat_produk">&raquo; Produk</a>
                    </li>
                </ul>

                <!-- /.nav-third-level -->
            </li>
              <li>
                <a href="#"><i class="fa fa-sitemap fa-fw"></i> Laporan<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    
                    <li>
                        <a href="?psg=laporan/pengeluaran/pengeluaran">&raquo;Pengeluaran</a>
                    </li>
                    <li>
                         <a href="?psg=laporan/pemasukan/pemasukan">&raquo;Pemasukan</a>
                    </li>
                    <li>
                         <a href="?psg=laporan/penjualan/penjualan">&raquo;Penjualan<span class="fa arrow"></span></a>
                         
                         <ul class="nav nav-third-level collapse">
                               <li>
                                <a href="?psg=laporan/customer/isi_customer">&raquo;Customer</a>
                            </li>
                            <li>
                                <a href="?psg=laporan/customer/customerpercat">&raquo;Customer per Cat</a>
                            </li>
                               <li>
                                <a href="?psg=laporan/produk/produk">&raquo;Produk</a>
                            </li>
                               <li>
                                <a href="?psg=laporan/kota/kota">&raquo;Kota</a>
                            </li>
                                 </li>
                               <li>
                                <a href="?psg=laporan/cs/cs">&raquo;Customer Service</a>
                            </li>
                         </ul>

                    </li>
                    <li>
                        <a href="?psg=laporan/transaksi/transaksi">&raquo;Transaksi</a>
                    </li>
                </ul>
                <!-- /.nav-fourth-level -->
            </li>
           
        </ul>

        <!-- /#side-menu -->
    </div>
    <!-- /.sidebar-collapse -->
</div><?php
   
    }
    elseif ($status == "cs") { ?>

        <div class="navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav" id="side-menu">
           
            <li>
                <a href="#" class="active"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
            </li>
            <li>
                <a href="?psg=t_customer"><i class="fa fa-bar-chart-o fa-fw"></i> Data<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    
                    <li>
                        <a href="?psg=customer/t_customer">&raquo; Customer</a>
                    </li>                                     
                    <li>
                        <a href="?psg=penjualan/penjualan">&raquo; Penjualan</a>
                    </li>                 
                </ul>
                <!-- /.nav-second-level -->
            </li>
           
             <li>
                <a href="#"><i class="fa fa-sitemap fa-fw"></i> Laporan<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    
                  
                    <li>
                         <a href="?psg=laporan/penjualan/penjualan">&raquo;Penjualan<span class="fa arrow"></span></a>
                         
                         <ul class="nav nav-third-level collapse">
                               <li>
                                <a href="?psg=laporan/customer/isi_customer">&raquo;Customer</a>
                            </li>
                            <li>
                                <a href="?psg=laporan/customer/customerpercat">&raquo;Customer per Cat</a>
                            </li>
                               <li>
                                <a href="?psg=laporan/produk/produk">&raquo;Produk</a>
                            </li>
                               <li>
                                <a href="?psg=laporan/kota/kota">&raquo;Kota</a>
                            </li>
                                 </li>
                               <li>
                                <a href="?psg=laporan/cs/cs">&raquo;Customer Service</a>
                            </li>
                         </ul>

                    </li>
                   
                </ul>
                <!-- /.nav-fourth-level -->
            </li>
        </ul>


        <!-- /#side-menu -->
    </div>
    <!-- /.sidebar-collapse -->
</div><?php
    }
?>
