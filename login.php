<!DOCTYPE html>
<?php
  include 'database.php';
  ?>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Rekam Indonesia | Login</title>
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
  <!-- iCheck -->
  <link rel="stylesheet" href="aset/plugins/iCheck/square/blue.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body class="hold-transition login-page">
  <div class="login-box">

  <!-- /.login-logo -->
  <div class="login-box-header">
    <a href="login.php">
      <img src="images/logo4.jpg" class="img-responsive" alt="" style="display: block; margin: auto;">
    </a>
  </div>

  <div class="login-box-body">

    <form method="post">
      <div class="form-group has-feedback">
        <input type="text" class="form-control" placeholder="Username" name="username">
        <span class="glyphicon glyphicon-user form-control-feedback" ></span>
      </div>

      <div class="form-group has-feedback">
        <input type="password" class="form-control" placeholder="Password" name="password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>

      <div class="row">
        <div class="col-xs-4">
          <button type="submit" name="login" class="btn btn-primary btn-block btn-flat">Login</button>
        </div>
      </div>
    </form>

  </div>

</div>


<!-- jQuery 3 -->
<script src="aset/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="aset/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="aset/plugins/iCheck/icheck.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' /* optional */
    });
  });
</script>
</body>
</html>

<?php
  if (isset($_POST['login'])) {
    $petugas =
    $user  = $_POST['username'];
    $pass  = $_POST['password'];

    if ($_POST['username'] == 'owner') {
      $cobalogin = mysqli_query($db, "SELECT * FROM user WHERE username ='$user' AND password = '$pass'");
    }else {
      $cobalogin = mysqli_query($db, "SELECT * FROM user JOIN petugas ON user.id_user=petugas.id_petugas WHERE username ='$user' AND password = '$pass'");
    }


    $hitung = mysqli_num_rows($cobalogin);
    $pecah = mysqli_fetch_array($cobalogin);
    if ($hitung > 0 ) {
      $_SESSION['id_user'] = $pecah['id_user'];
      $_SESSION['username'] = $pecah['username'];
      $_SESSION['level'] = $pecah['level'];
      $_SESSION['password'] = $pecah['password'];
      $_SESSION['status'] = $pecah['status'];
      $_SESSION['nama_lengkap_petugas'] = $pecah['nama_lengkap'];

      echo "<script>window.location='admin.php'</script>";
    }
    else {
      echo "<script>alert('Login Anda Gagal!')</script>";
      echo "<script>window.location='login.php'</script>";

    }


  }
 ?>
