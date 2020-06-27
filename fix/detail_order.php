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


//da


?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- s -->
              
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
                <h2><?php echo $name;?></h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>General</h3>
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
        <div class="top_nav navbar-fixed-top">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <img src="images/<?php echo $foto; ?>" alt=""><?php echo $name;?>
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

        <!-- page content --><div class=cupuh>
        <div class="right_col" role="main">
          <div class="">
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Form Pemesanan </h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
                    <form idata-parsley-validate class="form-horizontal form-label-left" enctype="multipart/form-data" method="post" action="proses_order.php">
                    <?php 
                    $jenis = $_POST['jenis'];
                    $paket = $_POST['paket'];
                    $pewangi=$_POST['pewangi'];
                    $berat=(int)$_POST['berat'];
                    $harga_jenis=(int)$_POST['harga_jenis'];
                    $harga_paket=(int)$_POST['harga_paket'];
                    $jasa=($harga_jenis+$harga_paket)*$berat;
                    $total=$jasa+5000;

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
                    <!--THE REAL VALUES HERE -->
                    <input type="hidden" name="username" value="<?php echo $id_user; ?>">
                    <input type="hidden" name="jenis" value="<?php echo $jenis; ?>">
                    <input type="hidden" name="paket" value="<?php echo $paket; ?>">
                    <input type="hidden" name="pewangi" value="<?php echo $pewangi; ?>">
                    <input type="hidden" name="berat" value="<?php echo $berat; ?>">
                    <input type="hidden" name="total" value="<?php echo $total;?>">
                    <!--THE REAL VALUES HERE -->

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Jenis Cucian  </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                        <label class="form-control col-md-3 col-sm-3 col-xs-12"><?php echo $nama_jenis;?> </label>
                        </div>
                      </div>
                     <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Paket Cucian </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                         <label class="form-control col-md-3 col-sm-3 col-xs-12" ><?php echo $nama_paket;?> </label>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Pewangi </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <label class="form-control col-md-3 col-sm-3 col-xs-12" ><?php echo $nama_pewangi;?> </label>
                        </div>
                      </div>
          
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Berat Cucian </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                        <label class="form-control col-md-3 col-sm-3 col-xs-12" ><?php echo $berat; ?> Kg</label>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Biaya Jasa</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                        <label class="form-control col-md-3 col-sm-3 col-xs-12" >Rp <?php echo $jasa;?></label>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Biaya Transport</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                        <label class="form-control col-md-3 col-sm-3 col-xs-12" >Rp 5000</label>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Total Biaya</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                        <label class="form-control col-md-3 col-sm-3 col-xs-12" >Rp <?php echo $total;?></label>
                        </div>
                      </div>
                     
                  <div class="ln_solid"></div>
                  <!--
              <input type="text" name="harga_jenis" id="harga_jenis" <?php if($jenis=="Basah") {echo 'value="3000"'; } elseif($jenis=="Kering") {echo 'value="4000"'; } elseif($jenis=="Setrika") {echo 'value="5000"'; } else{'value="0"';}?> />
              <input type="text" name="harga_paket" id="harga_paket" <?php if($paket=="Reguler") {echo 'value="0"'; } elseif($paket=="Express") {echo 'value="2000"'; } else{'value="0"';}?> />
              
              <script>
              function totalharga
              {
              var jenis = parseInt(document.getElementById("harga_jenis").value) + mod;
              var paket = parseInt(document.getElementById("harga_paket").value);
              var berat = parseInt(document.getElementById("berat").value);
              var hello = "hello";
              
                return (jenis+paket)*berat;
                
              document.getElementById('harga_total').value = hello;
              }
              </script>
              -->

                      <div class="form-group">
                        <div class="pull-right">
             <button type="submit" class="btn btn-success" value="tambah">Submit</button>
                          <a class='btn btn-danger' href="order.php" role='button'>Cancel</a>
    </form>
                         
                        </div>
                      </div>
                  </div>
                </div>
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
