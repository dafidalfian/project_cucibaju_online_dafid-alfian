<?php
include "koneksi.php"; 
session_start();
  if(empty($_SESSION['username']))
  {
    header('location: login.php');
  }
  $name=$_SESSION['username'];

$timeout = 60; // Set timeout menit
$logout_redirect_url = "../fix/login.php"; // Set logout URL

$timeout = $timeout * 10; // Ubah menit ke detik
if (isset($_SESSION['start_time'])) {
    $elapsed_time = time() - $_SESSION['start_time'];
    if ($elapsed_time >= $timeout) {
        session_destroy();
        echo "<script>alert('Silahkan Login lagi!'); window.location = '$logout_redirect_url'</script>";
    }
}
$_SESSION['start_time'] = time();

$getit = mysql_query("SELECT * FROM tb_user WHERE username_user='$name'");
$row = mysql_fetch_array($getit);

//YOUR NEEDED VALUES
$id_user = $row['id_username'];
$nama = $row['nama_user'];
$alamat = $row['alamat_user'];
$ktp = $row['ktp_user'];
$foto = $row['profil_user'];
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laundry Online-LOL </title>

    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="../vendors/iCheck/skins/flat/green.css" rel="stylesheet">
  
    <!-- bootstrap-progressbar -->
    <link href="../vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
    <!-- JQVMap -->
    <link href="../vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet"/>
    <!-- bootstrap-daterangepicker -->
    <link href="../vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
    <!-- Datatables -->
    <link href="../vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">
    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
    <style type="text/css">
      .cupuh { padding-top: 55px; }
    </style>
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="user.php" class="site_title"><i class="glyphicon glyphicon-tint"></i><span> LOL</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="images/<?php echo $foto; ?>" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>SELAMAT DATANG,</span>
                <h2><?php echo $nama;?></h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>Menu</h3>
                <ul class="nav side-menu">
                  <li><a href="user.php"><i class="fa fa-home"></i> Beranda</a></li>
                  <li><a href="order.php"><i class="fa fa-shopping-cart"></i> Order</a></li>
                  <li><a href="history_order.php"><i class="fa fa-list-alt"></i> History Order</a></li>
                  <li><a href="edit_akun.php"><i class="fa fa-users"></i> Kelola Akun</a></li>
              </div>
            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
                <font color="white" align="center"><h5><i class="glyphicon glyphicon-tint"></i> Copyright A1 TI UMSIDA</h5></font>
            </div>
            <!-- /menu footer buttons -->
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <img src="images/<?php echo $foto; ?>" alt=""><?php echo $nama;?>
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <li><a href="user.php"> Profile</a></li>
                    <li><a href="logout.php"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                  </ul>
                </li>
              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->

        <!-- page content --><div class=cupuh1>
            <div class="right_col" role="main">
          <!-- top tiles -->
              <!-- peta -->
            <div class="row">
              
             <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>DATA CUCIAN </h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"></a>
                       
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <p class="text-muted font-13 m-b-30">
                    </p>
           
                    <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                      <thead>
                        <tr>
                          <th>NO</th>
                          <th>Jenis</th>
                          <th>Kategori</th>
                          <th>Berat</th>
                          <th>Total Harga</th>
                          <th>Status</th>

                        </tr>
                      </thead>
                       <tbody>
                       <?php
                              $no=1;
                              $akun=mysql_query("SELECT * FROM `tb_order` WHERE id_username=$id_user");
                              while ($row=mysql_fetch_array($akun)) {
                                $jenis = $row['id_jenis'];
                                $paket = $row['id_kategori'];
                                $pewangi=$row['id_pewangi'];
                                $total = $row['total_harga'];
                                $berat= $row['berat_cucian'];
                                $tanggal = $row['tanggal'];
                                $status = $row['status_cucian'];

                                $ambil1 = mysql_query("SELECT * FROM tb_jenis_cuci WHERE id_jenis='$jenis'");
                                $baris1 = mysql_fetch_array($ambil1);
                                $nama_jenis = $baris1['nama_jenis'];

                                $ambil2 = mysql_query("SELECT * FROM tb_kategori WHERE id_kategori='$paket'");
                                $baris2 = mysql_fetch_array($ambil2);
                                $nama_paket = $baris2['nama_kategori'];

                                $ambil3 = mysql_query("SELECT * FROM tb_pewangi WHERE id_pewangi='$pewangi'");
                                $baris3 = mysql_fetch_array($ambil3);
                                $nama_pewangi = $baris3['nama_pewangi'];
                            ?>
                        <tr>
                          <td><?php echo $no;?></td>
                          <td><?php echo $nama_jenis;?></td>
                          <td><?php echo $nama_paket;?></td>
                          <td><?php echo $berat;?></td>
                          <td><?php echo $total;?></td>
                          <td><?php echo $status;?></td>
                          
                        </tr>
                        <?php 
                        $no++;
                        }
                        ?>
                    </table>         
                  </div>
                </div>
           </div>
               <!-- /page content -->

      <!-- LAPORAN KEJADIAN -->

          </div>
      </div>
      </div>

                <!-- End to do list -->
                
                <!-- start of weather widget -->
                <!-- end of weather widget -->
              </div>
            </div>
          </div>
        </div>
    </div>
        <!-- /page content -->

        <!-- footer content -->
        <footer>
          <div class="pull-right">
            <i class="glyphicon glyphicon-tree-conifer"></i> LOL - Laundry Online
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>

    <!-- jQuery -->
    <script src="../vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="../vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="../vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="../vendors/nprogress/nprogress.js"></script>
    <!-- Chart.js -->
    <script src="../vendors/Chart.js/dist/Chart.min.js"></script>
    <!-- gauge.js -->
    <script src="../vendors/gauge.js/dist/gauge.min.js"></script>
    <!-- bootstrap-progressbar -->
    <script src="../vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <!-- iCheck -->
    <script src="../vendors/iCheck/icheck.min.js"></script>
    <!-- Skycons -->
    <script src="../vendors/skycons/skycons.js"></script>
    <!-- Flot -->
    <script src="../vendors/Flot/jquery.flot.js"></script>
    <script src="../vendors/Flot/jquery.flot.pie.js"></script>
    <script src="../vendors/Flot/jquery.flot.time.js"></script>
    <script src="../vendors/Flot/jquery.flot.stack.js"></script>
    <script src="../vendors/Flot/jquery.flot.resize.js"></script>
    <!-- Flot plugins -->
    <script src="../vendors/flot.orderbars/js/jquery.flot.orderBars.js"></script>
    <script src="../vendors/flot-spline/js/jquery.flot.spline.min.js"></script>
    <script src="../vendors/flot.curvedlines/curvedLines.js"></script>
    <!-- DateJS -->
    <script src="../vendors/DateJS/build/date.js"></script>
    <!-- JQVMap -->
    <script src="../vendors/jqvmap/dist/jquery.vmap.js"></script>
    <script src="../vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
    <script src="../vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="../vendors/moment/min/moment.min.js"></script>
    <script src="../vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
  <!-- data tables -->
      <script src="../vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="../vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="../vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="../vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
    <script src="../vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script src="../vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="../vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
    <script src="../vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
    <script src="../vendors/jszip/dist/jszip.min.js"></script>
    <script src="../vendors/pdfmake/build/pdfmake.min.js"></script>
    <script src="../vendors/pdfmake/build/vfs_fonts.js"></script>
    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>
  
  </body>
</html>
