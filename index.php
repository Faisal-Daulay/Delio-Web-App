<?php
    error_reporting(0);
    session_start();
        $username=$_SESSION['username'];
        $id_user=$_SESSION['id_user'];

        if(!isset($username)){
            header("location: login.php");
        }
?>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Delio</title>
  <!-- daterange picker -->
        <link href="css/daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css" />

        <!-- datepicker -->
        <link href="css/datepicker.css" rel="stylesheet">
    <!-- Core CSS - Include with every page -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">

    <!-- Page-Level Plugin CSS - Dashboard -->
    <link href="css/plugins/morris/morris-0.4.3.min.css" rel="stylesheet">
    <link href="css/plugins/timeline/timeline.css" rel="stylesheet">

    <!-- SB Admin CSS - Include with every page -->
    <link href="css/sb-admin.css" rel="stylesheet">
    <link rel="stylesheet" href="css/plugins/dataTables/dataTables.bootstrap.css">
    <link rel="stylesheet" href="css/custom_style.css">
     <script src="js/jquery-1.11.3.js"></script>
</head>

<body>

    <div id="wrapper">
        <nav class="navbar navbar-default navbar-fixed-top" role="navigation" style="margin-bottom: 0">
            <?php
                include 'inc/head.php';
                include "inc/menu.php";
            ?>
        </nav>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12"><br/>
                    <div class="panel panel-default content">
                        <?php
                            if (!isset($_GET['psg'])) {
                                include ('inc/content.php');
                            } else {
                                $page = $_GET['psg'];
                                include inc . '/' . $page . ".php";
                            }
                        ?>
                    </div>
                </div>
                <?php
                    include "inc/footer.php";
                ?>
            </div>
        </div>
        <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->

    <!-- Core Scripts - Include with every page -->

    <script src="js/bootstrap.min.js"></script>
    <script src="js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <!-- Page-Level Plugin Scripts - Dashboard
    <script src="js/plugins/morris/raphael-2.1.0.min.js"></script>
    <script src="js/plugins/morris/morris.js"></script>-->

    <!-- Page-Level Plugin Scripts - Tables -->
    <script src="js/plugins/dataTables/jquery.dataTables.min.js"></script>
    <script src="js/plugins/dataTables/dataTables.bootstrap.js"></script>
    <script src="js/elevatezoom.js"></script>
    <script>
        $(function() {
            $('#dataTables-example').dataTable();
            $('#dataTables-contoh').dataTable();
        });
    </script>

        <!--Search Data Produk-->
    <script>
      $(document).ready(function () {
        $(".tambah").click(function(){
            var nama=$(this).attr('data-name');
            $("#nama").val(nama);

            var harga=$(this).attr('data-harga');
            $("#harga").val(harga);
            $("#myModal").modal('hide');
        });
      });
    </script>
    <!--Search Data bonus-->
    <script>
      $(document).ready(function () {
        $(".tambah1").click(function(){
            var nama1=$(this).attr('data-name');
            $("#nama_bonus").val(nama1);

            var harga1=$(this).attr('data-harga');
            $("#harga_bonus").val(harga1);
            $("#myModalbonus").modal('hide');
        });
      });
    </script>

    <script src="js/PriceFormat.js"></script>
    <script>
      $(document).ready(function(){
        $(".rupiahformat").priceFormat({
          prefix: 'Rp ',
          centsLimit: '0',
          centsSeparator: '.',
          thousandsSeparator: '.'
        });

        $(".rupiahformat1").priceFormat({
          prefix: 'Rp ',
          centsLimit: '0',
          centsSeparator: '.',
          thousandsSeparator: ''
        });
      });
    </script>

    <!-- SB Admin Scripts - Include with every page -->
    <script src="js/sb-admin.js"></script>


    <!-- Page-Level Demo Scripts - Dashboard - Use for reference -->
    <script src="js/demo/dashboard-demo.js"></script>
    <script type="text/javascript">
        $('.tooltip-demo').tooltip({
            selector: "[data-toggle=tooltip]",
            container: "body"
        });
    </script>

    <script src="js/plugins/bootstrap-datepicker.min.js"></script>
    <script>
        $('.daterange').datepicker({
            format:'yyyy-mm-dd',
            autoclose:true,
            todayHighlight:true
        });
        $('#datepicker').datepicker();
    </script>
</body>

</html>
