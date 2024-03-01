<?php
  require_once("../Config/koneksi.php");
  require_once("../Config/akun.php");

  if (empty($_SESSION['userid'])) {
        ?>
        <script type="text/javascript">
            alert('Anda Belum Melakukan Login.');
            setTimeout("location.href='../index.php'", 1000);
        </script>
        <?php
  } else {
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>#</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="icon" type="image/png" href="../Assets/image/logo/smk1.png"/>
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="../Assets/bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../Assets/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="../Assets/dist/css/skins/_all-skins.min.css">
  <!-- Grafik Batang -->
  <script src="../Assets/js/chartjs/Chart.js"></script>
  <!-- Grafik Lingkaran -->
  <script src="../Assets/js/chartjs/highcharts.js"></script>

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="index.php?page=beranda&aksi=aktif" class="logo" class="brand-link">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><img src="../Assets/image/logo/smk1.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" height="40px" width="40px" style="opacity: .8"></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><img src="../Assets/image/logo/smk1.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" height="40px" width="40px" style="opacity: .8"><b> E - GALERI </b></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="../Assets/image/user/<?php echo $ft_akun;?>" class="user-image" alt="User Image">
              <span class="hidden-xs"><?php echo $dataakun['username'];?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="../Assets/image/user/<?php echo $ft_akun;?>" class="img-circle" alt="User Image">

                <p>
                  <?php echo $dataakun['namalengkap'];?>
                </p>
              </li>
              <!-- Menu Body -->
              <li class="user-body">
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-right">
                  <a href="../Config/logout.php?id=logout" class="btn btn-default btn-flat">Keluar</a>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="../Assets/image/user/<?php echo $ft_akun;?>" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo $dataakun['namalengkap'];?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MENU</li>
        <li>
          <a href="?page=komentar&aksi=tampil_komentar">
            <i class="fa fa-file-image-o"></i> <span>Data Status</span>
            <span class="pull-right-container">
            </span>
          </a>
        </li>
        <li>
          <a href="?page=album&aksi=tampil_album">
            <i class="fa fa-folder-open"></i> <span>Data Albumku</span>
            <span class="pull-right-container">
            </span>
          </a>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

        <!--//Tulis Script-->
        <?php
          $page = $_GET['page'];
          $aksi = $_GET['aksi'];

          switch ($page) {
            case 'beranda':
                              switch ($aksi) {
                                case 'aktif':
                                              include 'Beranda/index.php'; 
                                              break;
                                default:
                                          echo "<H1>Aksi yang dimaksud tidak ditemukan</H1>";
                                          break;
                              }
                              break;
            case 'album':
                              switch ($aksi) {
                                case 'tampil_album':
                                                      include 'Album/tampil_album.php';
                                                      break;
                                case 'tambah_album':
                                                      include 'Album/tambah_album.php';
                                                      break;
                                case 'edit_album':
                                                      include 'Album/edit_album.php';
                                                      break;             
                                case 'simpan_album':
                                                      include 'Album/proses/simpan_album.php';
                                                      break;
                                case 'update_album':
                                                      include 'Album/proses/update_album.php';
                                                      break;    
                                case 'hapus_album':
                                                      include 'Album/proses/hapus_album.php';
                                                      break;               
                                default:
                                          echo "<H1>Aksi yang dimaksud tidak ditemukan</H1>";
                                          break;
                              }
                              break;
            case 'foto':
                              switch ($aksi) {
                                case 'tampil_foto':
                                                      include 'Foto/tampil_foto.php';
                                                      break;
                                case 'tambah_foto':
                                                      include 'Foto/tambah_foto.php';
                                                      break;       
                                case 'simpan_foto':
                                                      include 'Foto/proses/simpan_foto.php';
                                                      break;
                                case 'like_foto':
                                                      include 'Foto/proses/like_foto.php';
                                                      break;
                                case 'like_ft':
                                                      include 'Foto/proses/like_foto2.php';
                                                      break;      
                                case 'hapus_foto':
                                                      include 'Foto/proses/hapus_foto.php';
                                                      break;
                                case 'tampil_komentar':
                                                      include 'Foto/tampil_komentar.php';
                                                      break;               
                                case 'simpan_komentar':
                                                      include 'Foto/proses/simpan_komentar.php';
                                                      break;
                                case 'hapus_komentar':
                                                      include 'Foto/proses/hapus_komentar.php';
                                                      break;
                                default:
                                          echo "<H1>Aksi yang dimaksud tidak ditemukan</H1>";
                                          break;
                              }
                              break;
            case 'komentar':
                              switch ($aksi) {
                                case 'tampil_komentar':
                                                      include 'Komentar/tampil_komentar.php';
                                                      break;       
                                case 'simpan_komentar':
                                                      include 'Komentar/proses/simpan_komentar.php';
                                                      break;
                                case 'like_foto':
                                                      include 'Komentar/proses/like_foto.php';
                                                      break;   
                                case 'hapus_komentar':
                                                      include 'Komentar/proses/hapus_komentar.php';
                                                      break;            
                                default:
                                          echo "<H1>Aksi yang dimaksud tidak ditemukan</H1>";
                                          break;
                              }
                              break;

            default:
                      echo "<H1>Page yang dimaksud tidak ditemukan</H1>";
                      break;
          }
        ?>
  </div>

  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 1.1.1.1
    </div>
    <strong>Copyright &copy; <?php echo date('Y');?> <a href="index.php?page=beranda&aksi=aktif">GALERI</a>.</strong> All rights
    reserved.
  </footer>

    </div>
  </aside>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 2.2.3 -->
<script src="../Assets/plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.6 -->
<script src="../Assets/bootstrap/js/bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="../Assets/dist/js/app.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="../Assets/dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../Assets/dist/js/demo.js"></script>
</body>
</html>

<?php
    }
?>
