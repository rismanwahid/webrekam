<!DOCTYPE html>
<?php
  include 'database.php';

  date_default_timezone_set('Asia/Jakarta');

  if (empty($_SESSION['id_user'])) {
          echo "<script>alert('Silahkan Login Dulu')</script>";
          echo "<script>window.location='login.php'</script>";
  }
  if (isset($_GET ['aksi'])) {
    if ($_GET ['aksi'] == 'logout') {

      session_destroy();


      echo "<script>alert('Anda Telah Logout')</script>";
      echo "<script>window.location='login.php'</script>";
    }
  }

  $array_status_pesanan[0] = "Belum Lunas";
  $array_status_pesanan[1] = "Lunas";
  $array_status_pesanan[2] = "Barang Diambil";


  function rupiah($angka){
    $hasil_rupiah="Rp.".number_format($angka,0,'.','.');
    return $hasil_rupiah;
  }
 ?>


<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Rekam Indonesia | Rental Kamera</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="aset/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="aset/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="aset/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="aset/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="aset/dist/css/skins/_all-skins.min.css">
  <link rel="stylesheet" href="aset/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="admin.php" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b></b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Rekam Indonesia</b></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <span><i class="glyphicon glyphicon-user"></i></span>
              <strong><?php if(empty($_SESSION['id_user'])){echo "";}else if($_SESSION['id_user']=='owner') {
                echo "Owner"; }else{echo $_SESSION['nama_lengkap_petugas'];} ?></strong>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="images/userdef.png" class="img-circle" alt="">
                  <p>
                    <strong><?php if(empty($_SESSION['id_user'])){echo "";}else if($_SESSION['id_user']=='owner') {
                      echo "Owner"; }else{echo $_SESSION['nama_lengkap_petugas'];} ?> </strong></p><p> <small>Sebagai :&nbsp;
                      <?php if(empty($_SESSION['id_user'])){echo "";}else{echo $_SESSION['level'];} ?>
                    </small></p>


              </li>
              <!-- Menu Body -->

              <li class="user-body">
                <div class="row">

                </div>
                <!-- /.row -->
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="admin.php?aksi=logout" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
        </ul>
      </div>
    </nav>
  </header>

  <!-- =============================================== -->

  <!-- Left side column. contains the sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <?php
      include 'template/sidebar.php';
      include 'function/fungsirupiah.php';

     ?>
    <!-- /.sidebar -->
  </aside>

  <!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">



    <?php
      if (isset($_GET['page'])) {


        if ($_GET['page'] == 'kategori') {
          include 'modules/kategori/index.php';
        }
        else if ($_GET['page'] == 'tambahkategori') {
          include 'modules/kategori/tambahkategori.php';
        }
        else if ($_GET['page'] == 'editkategori') {
          include 'modules/kategori/editkategori.php';
        }
        else if ($_GET['page'] == 'barang') {
          include 'modules/barang/index.php';
        }
        else if ($_GET['page'] == 'tambahbarang') {
          include 'modules/barang/tambahbarang.php';
        }
        else if ($_GET['page'] == 'editbarang') {
          include 'modules/barang/editbarang.php';
        }
        else if ($_GET['page'] == 'pelanggan') {
          include 'modules/pelanggan/index.php';
        }
        else if ($_GET['page'] == 'tambahpelanggan') {
          include 'modules/pelanggan/tambahpelanggan.php';
        }
        else if ($_GET['page'] == 'editpelanggan') {
          include 'modules/pelanggan/editpelanggan.php';
        }
        else if ($_GET['page'] == 'petugas') {
          include 'modules/petugas/index.php';
        }
        else if ($_GET['page'] == 'tambahpetugas') {
          include 'modules/petugas/tambahpetugas.php';
        }
        else if ($_GET['page'] == 'editpetugas') {
          include 'modules/petugas/editpetugas.php';
        }
        else if ($_GET['page'] == 'daftarsewa') {
          include 'modules/daftarsewa/index.php';
        }
        else if ($_GET['page'] == 'detail') {
          include 'modules/daftarsewa/detail.php';
        }
        else if ($_GET['page'] == 'update') {
          include 'modules/daftarsewa/update.php';
        }
        else if ($_GET['page'] == 'pengembalian') {
          include 'modules/pengembalian/index.php';
        }
        else if ($_GET['page'] == 'detailpengembalian') {
          include 'modules/pengembalian/detail.php';
        }
        else if ($_GET['page'] == 'viewpengembalian') {
          include 'modules/pengembalian/view.php';
        }
        else if ($_GET['page'] == 'user') {
          include 'modules/user/index.php';
        }




        else if ($_GET['page'] == 'dashboard'){
          include 'modules/beranda/index.php';
        }
      }
      else {
        include 'modules/beranda/index.php';
      }


     ?>

  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer">
    <div class="pull-right hidden-xs">
    </div>
    <strong>Rekam Indonesia &copy; 2019
  </footer>

  <!-- Control Sidebar -->

  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->

</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="aset/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="aset/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="aset/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="aset/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="aset/dist/js/adminlte.min.js"></script>
<!-- DataTables -->
<script src="aset/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="aset/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script>
  $(document).ready(function () {
    $('.sidebar-menu').tree()
  })
</script>
<script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>

<script type="text/javascript">

  $(document).on("click","#ubahstatus",function(){
    var idpen   = $(this).data('id');
    var status  = $(this).data('status');

    // $("#updatesewa #id_sewa").val(idpen);
    $("#updatesewa").find("select[name=keterangan]").val(status);
    $("#updatesewa").find("input[name=id_sewa1]").val(idpen);
  });

</script>

<script type="text/javascript">

  $(document).on("click","#aksigambar",function(){
    var resi   = $(this).data('gambar');
    $("#gambarresi").html('<img src="images/resi-pembayaran/'+resi+'" style="width:100%;">');


  });

</script>

</body>
</html>
