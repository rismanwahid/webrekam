<?php
  include 'database.php';

  date_default_timezone_set('Asia/Jakarta');

  function rupiah($angka){
    $hasil_rupiah="Rp.".number_format($angka,0,'.','.');
    return $hasil_rupiah;
  }

  if (isset($_GET ['aksi'])) {
    if ($_GET ['aksi'] == 'logout') {

      session_destroy();


      echo "<script>alert('Anda Telah Logout')</script>";
      echo "<script>window.location='index.php'</script>";
    }
  }


?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Rekam Indonesia | Photo & Video Equipment Rent</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
<!-- Less styles -->
   <!-- Other Less css file //different less files has different color scheam
	<link rel="stylesheet/less" type="text/css" href="themes/less/simplex.less">
	<link rel="stylesheet/less" type="text/css" href="themes/less/classified.less">
	<link rel="stylesheet/less" type="text/css" href="themes/less/amelia.less">  MOVE DOWN TO activate
	-->
	<!--<link rel="stylesheet/less" type="text/css" href="themes/less/bootshop.less">
	<script src="themes/js/less.js" type="text/javascript"></script> -->

<!-- Bootstrap style -->
    <link id="callCss" rel="stylesheet" href="asetuser/themes/bootshop/bootstrap.min.css" media="screen"/>
    <link href="asetuser/themes/css/base.css" rel="stylesheet" media="screen"/>
<!-- Bootstrap style responsive -->
	<link href="asetuser/themes/css/bootstrap-responsive.min.css" rel="stylesheet"/>
	<link href="asetuser/themes/css/font-awesome.css" rel="stylesheet" type="text/css">
<!-- Google-code-prettify -->
	<link href="asetuser/themes/js/google-code-prettify/prettify.css" rel="stylesheet"/>
<!-- fav and touch icons -->
    <link rel="shortcut icon" href="asetuser/themes/images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="asetuser/themes/images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="asetuser/themes/images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="asetuser/themes/images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="asetuser/themes/images/ico/apple-touch-icon-57-precomposed.png">
    <script src="asetuser/themes/js/jquery.js" type="text/javascript"></script>
	<style type="text/css" id="enject"></style>
  </head>

<body>
  <div id="header">
    <div class="container">
      <div id="welcomeLine" class="row">

      	<div class="span3">
          Welcome! <strong><?php if(empty($_SESSION['id_user_member'])){echo "";}else{echo $_SESSION['nama_lengkap'];} ?></strong>
        </div>

      </div>

<!-- Navbar ================================================== -->
  <div id="logoArea" class="navbar">
    <a id="smallScreen" data-target="#topMenu" data-toggle="collapse" class="btn btn-navbar">
    	<span class="icon-bar"></span>
    	<span class="icon-bar"></span>
    	<span class="icon-bar"></span>
    </a>

  <div class="navbar-inner">
    <a class="brand" href="index.php"><img src="images/lognew.png" alt="Bootsshop" style="width:197px;  height:47px;"/></a>



		<?php include 'templateuser/search.php' ?>


    <ul id="topMenu" class="nav pull-right">


      <?php

        if (empty($_SESSION['id_user_member']))
        {
          echo '<li class="">
          <a href="index.php?page=register">Register</a></li>
       	 <li class="">
       	 <a href="#login" role="button" data-toggle="modal" style="padding-right:0">
            <span class="btn btn-large btn-success">Login</span></a>';
        }
        else
        {
          echo '<li class=""><a href="index.php?page=riwayat_sewa">Riwayat Sewa</a></li>
       	 <li class="">
       	 <a href="index.php?aksi=logout" style="padding-right:0">
            <span class="btn btn-large btn-danger">Logout</span></a>';
        }
       ?>



	    <div id="login" class="modal hide fade in" tabindex="-1" role="dialog" aria-labelledby="login" aria-hidden="false" >

		  <div class="modal-header">
			     <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			        <center><h3>Login Pelanggan</h3></center>
		  </div>

		  <div class="modal-body" align="center" >
        <br>
			<form class="form-horizontal loginFrm" method="post">
			  <div class="control-group">
          Username : &emsp;
				<input type="text" id="inputEmail" name="username"  style="width:250px;" >
			  </div>
			  <div class="control-group">
          Password : &emsp;
				<input type="password" id="inputPassword" name="password"  style="width:250px;">
			  </div>
        <br>
			  <div class="control-group">
          <button type="submit" name="loginuser" class="btn btn-success">Login</button>
			  </div>


			</form>
      <?php
        if(isset($_POST['loginuser'])){
          $user  = $_POST['username'];
          $pass  = $_POST['password'];

          $cobalogin = mysqli_query($db, "SELECT * FROM user JOIN pelanggan ON user.id_user=pelanggan.id_pelanggan WHERE username ='$user' AND password = '$pass' ");

          $hitung = mysqli_num_rows($cobalogin);
          $pecah = mysqli_fetch_array($cobalogin);
          if ($hitung > 0 ) {
            $sql  = "SELECT max(id_sewa) AS terakhir FROM sewa";
            $hasil  = mysqli_query($db, $sql);
            $data   = mysqli_fetch_assoc($hasil);
            $lastid = $data['terakhir'];
            $lastnourut = (int)substr($lastid,3,4);
            $nexturut   = $lastnourut+1;
            $nextid     = "SW-".sprintf("%04s",$nexturut);

            $_SESSION['id_user_member'] = $pecah['id_user'];
            $_SESSION['username_member'] = $pecah['username'];
            $_SESSION['password_member'] = $pecah['password'];
            $_SESSION['level_member'] = $pecah['level'];
            $_SESSION['status_member'] = $pecah['status'];
            $_SESSION['nama_lengkap'] = $pecah['nama_lengkap'];
            $_SESSION['ss_sewa'] =  $nextid.date('dmYHis');
            $_SESSION['id_sewa'] =  $pecah['id_sewa'];

            echo "<script>window.location='index.php'</script>";
          }
          else{
            echo "<script>alert('Login Anda Gagal!')</script>";
            echo "<script>window.location='index.php'</script>";
          }
        }
       ?>
		  </div>
	   </div>
	  </li>
  </ul>
</div>
</div>
</div>
</div>

<!-- Header End====================================================================== -->
  <?php
    include 'moduleuser/home.php';
   ?>
   <div id="mainBody">
	    <div class="container">
	       <div class="row">
<!-- Sidebar ================================================== -->
  	<?php

      include 'templateuser/sidebar.php';

     ?>
<!-- Sidebar end=============================================== -->

<!-- cek ketersediaan=============================================== -->











    <?php
        if (isset($_GET['page']))
      {

      if ($_GET['page'] == 'kategori')
      {
        include 'moduleuser/produk.php';
      }
        elseif ($_GET['page'] == 'pemesanan')
      {
        include 'moduleuser/pemesanan.php';
      }
        elseif ($_GET['page'] == 'listpemesanan')
      {
        include 'moduleuser/listpemesanan.php';
      }
        elseif ($_GET['page'] == 'bayar') {
        include 'moduleuser/bayar.php';
      }
      elseif ($_GET['page'] == 'riwayat_sewa') {
      include 'moduleuser/riwayat_sewa.php';
      }
      elseif ($_GET['page'] == 'register') {
      include 'moduleuser/register.php';
      }
      elseif ($_GET['page'] == 'aksicari') {
      include 'moduleuser/aksicari.php';
      }
      elseif ($_GET['page'] == 'details') {
      include 'moduleuser/detail_sewa.php';
      }

      }
      else
      {
      include 'moduleuser/beranda.php';
      }



     ?>





		</div>
	</div>
</div>


<!-- Footer ================================================================== -->
	<div  id="footerSection">
	<div class="container">
		<!-- <div class="row"> -->
			<!-- <div class="span3">
				<h5>ACCOUNT</h5>
				<a href="login.html">YOUR ACCOUNT</a>
				<a href="login.html">PERSONAL INFORMATION</a>
				<a href="login.html">ADDRESSES</a>
				<a href="login.html">DISCOUNT</a>
				<a href="login.html">ORDER HISTORY</a>
			 </div> -->
			<!-- <div class="span3">
				<h5>INFORMATION</h5>
				<a href="contact.html">CONTACT</a>
				<a href="register.html">REGISTRATION</a>
				<a href="legal_notice.html">LEGAL NOTICE</a>
				<a href="tac.html">TERMS AND CONDITIONS</a>
				<a href="faq.html">FAQ</a>
			 </div> -->
			<!-- <div class="span3">
				<h5>OUR OFFERS</h5>
				<a href="#">NEW PRODUCTS</a>
				<a href="#">TOP SELLERS</a>
				<a href="special_offer.html">SPECIAL OFFERS</a>
				<a href="#">MANUFACTURERS</a>
				<a href="#">SUPPLIERS</a>
			 </div> -->
			<!-- <div id="socialMedia" class="span3 pull-right">
				<h5>SOCIAL MEDIA </h5>
				<a href="#"><img width="60" height="60" src="asetuser/themes/images/facebook.png" title="facebook" alt="facebook"/></a>
				<a href="#"><img width="60" height="60" src="asetuser/themes/images/twitter.png" title="twitter" alt="twitter"/></a>
				<a href="#"><img width="60" height="60" src="asetuser/themes/images/youtube.png" title="youtube" alt="youtube"/></a>
			 </div> -->
		 <!-- </div> -->
		<p class="pull-right">&copy; Rekam Indonesia 2019</p>
	</div><!-- Container End -->
	</div>
<!-- Placed at the end of the document so the pages load faster ============================================= -->

	<script src="asetuser/themes/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="asetuser/themes/js/google-code-prettify/prettify.js"></script>

	<script src="asetuser/themes/js/bootshop.js"></script>
    <script src="asetuser/themes/js/jquery.lightbox-0.5.js"></script>

	<!-- Themes switcher section ============================================================================================= -->
<!-- <div id="secectionBox">
<link rel="stylesheet" href="asetuser/themes/switch/themeswitch.css" type="text/css" media="screen" />
<script src="asetuser/themes/switch/theamswitcher.js" type="text/javascript" charset="utf-8"></script>
	<div id="themeContainer">
	<div id="hideme" class="themeTitle">Style Selector</div>
	<div class="themeName">Oregional Skin</div>
	<div class="images style">
	<a href="asetuser/themes/css/#" name="bootshop"><img src="asetuser/themes/switch/images/clr/bootshop.png" alt="bootstrap business templates" class="active"></a>
	<a href="asetuser/themes/css/#" name="businessltd"><img src="asetuser/themes/switch/images/clr/businessltd.png" alt="bootstrap business templates" class="active"></a>
	</div>
	<div class="themeName">Bootswatch Skins (11)</div>
	<div class="images style">
		<a href="asetuser/themes/css/#" name="amelia" title="Amelia"><img src="asetuser/themes/switch/images/clr/amelia.png" alt="bootstrap business templates"></a>
		<a href="asetuser/themes/css/#" name="spruce" title="Spruce"><img src="asetuser/themes/switch/images/clr/spruce.png" alt="bootstrap business templates" ></a>
		<a href="asetuser/themes/css/#" name="superhero" title="Superhero"><img src="asetuser/themes/switch/images/clr/superhero.png" alt="bootstrap business templates"></a>
		<a href="asetuser/themes/css/#" name="cyborg"><img src="asetuser/themes/switch/images/clr/cyborg.png" alt="bootstrap business templates"></a>
		<a href="asetuser/themes/css/#" name="cerulean"><img src="asetuser/themes/switch/images/clr/cerulean.png" alt="bootstrap business templates"></a>
		<a href="asetuser/themes/css/#" name="journal"><img src="asetuser/themes/switch/images/clr/journal.png" alt="bootstrap business templates"></a>
		<a href="asetuser/themes/css/#" name="readable"><img src="asetuser/themes/switch/images/clr/readable.png" alt="bootstrap business templates"></a>
		<a href="asetuser/themes/css/#" name="simplex"><img src="asetuser/themes/switch/images/clr/simplex.png" alt="bootstrap business templates"></a>
		<a href="asetuser/themes/css/#" name="slate"><img src="asetuser/themes/switch/images/clr/slate.png" alt="bootstrap business templates"></a>
		<a href="asetuser/themes/css/#" name="spacelab"><img src="asetuser/themes/switch/images/clr/spacelab.png" alt="bootstrap business templates"></a>
		<a href="asetuser/themes/css/#" name="united"><img src="asetuser/themes/switch/images/clr/united.png" alt="bootstrap business templates"></a>
		<p style="margin:0;line-height:normal;margin-left:-10px;display:none;"><small>These are just examples and you can build your own color scheme in the backend.</small></p>
	</div>
	<div class="themeName">Background Patterns </div>
	<div class="images patterns">
		<a href="asetuser/themes/css/#" name="pattern1"><img src="asetuser/themes/switch/images/pattern/pattern1.png" alt="bootstrap business templates" class="active"></a>
		<a href="asetuser/themes/css/#" name="pattern2"><img src="asetuser/themes/switch/images/pattern/pattern2.png" alt="bootstrap business templates"></a>
		<a href="asetuser/themes/css/#" name="pattern3"><img src="asetuser/themes/switch/images/pattern/pattern3.png" alt="bootstrap business templates"></a>
		<a href="asetuser/themes/css/#" name="pattern4"><img src="asetuser/themes/switch/images/pattern/pattern4.png" alt="bootstrap business templates"></a>
		<a href="asetuser/themes/css/#" name="pattern5"><img src="asetuser/themes/switch/images/pattern/pattern5.png" alt="bootstrap business templates"></a>
		<a href="asetuser/themes/css/#" name="pattern6"><img src="asetuser/themes/switch/images/pattern/pattern6.png" alt="bootstrap business templates"></a>
		<a href="asetuser/themes/css/#" name="pattern7"><img src="asetuser/themes/switch/images/pattern/pattern7.png" alt="bootstrap business templates"></a>
		<a href="asetuser/themes/css/#" name="pattern8"><img src="asetuser/themes/switch/images/pattern/pattern8.png" alt="bootstrap business templates"></a>
		<a href="asetuser/themes/css/#" name="pattern9"><img src="asetuser/themes/switch/images/pattern/pattern9.png" alt="bootstrap business templates"></a>
		<a href="asetuser/themes/css/#" name="pattern10"><img src="asetuser/themes/switch/images/pattern/pattern10.png" alt="bootstrap business templates"></a>

		<a href="asetuser/themes/css/#" name="pattern11"><img src="asetuser/themes/switch/images/pattern/pattern11.png" alt="bootstrap business templates"></a>
		<a href="asetuser/themes/css/#" name="pattern12"><img src="asetuser/themes/switch/images/pattern/pattern12.png" alt="bootstrap business templates"></a>
		<a href="asetuser/themes/css/#" name="pattern13"><img src="asetuser/themes/switch/images/pattern/pattern13.png" alt="bootstrap business templates"></a>
		<a href="asetuser/themes/css/#" name="pattern14"><img src="asetuser/themes/switch/images/pattern/pattern14.png" alt="bootstrap business templates"></a>
		<a href="asetuser/themes/css/#" name="pattern15"><img src="asetuser/themes/switch/images/pattern/pattern15.png" alt="bootstrap business templates"></a>

		<a href="asetuser/themes/css/#" name="pattern16"><img src="asetuser/themes/switch/images/pattern/pattern16.png" alt="bootstrap business templates"></a>
		<a href="asetuser/themes/css/#" name="pattern17"><img src="asetuser/themes/switch/images/pattern/pattern17.png" alt="bootstrap business templates"></a>
		<a href="asetuser/themes/css/#" name="pattern18"><img src="asetuser/themes/switch/images/pattern/pattern18.png" alt="bootstrap business templates"></a>
		<a href="asetuser/themes/css/#" name="pattern19"><img src="asetuser/themes/switch/images/pattern/pattern19.png" alt="bootstrap business templates"></a>
		<a href="asetuser/themes/css/#" name="pattern20"><img src="asetuser/themes/switch/images/pattern/pattern20.png" alt="bootstrap business templates"></a>

	</div>
	</div>
</div> -->
<span id="themesBtn"></span>
</body>
</html>


<script type="text/javascript">

  $(document).on("click","#aksi_resi",function(){
    var idpen = $(this).data('id');

    $("#upload_resi #id_sewa").val(idpen);
  });

</script>

<script type="text/javascript">

  $(document).on("click","#aksi_detail",function(){
    var data_detail   = $(this).data('detail');
    var pinjam  = $(this).data('pinjam');
    var pelanggan  = $(this).data('pelanggan');
    var tgltrans  = $(this).data('tgltransaksi');
    var tglpinjam  = $(this).data('tgl_pinjam');
    var tglkembali  = $(this).data('tgl_kembali');
    var lama  = $(this).data('lama');
    var barang  = $(this).data('barang');
    var jumlah  = $(this).data('jumlah');
    var harga  = $(this).data('harga');
    var subtotal  = $(this).data('subtotal');

      $("#detail_sewa #id_sewa1").html(data_detail);
      $("#detail_sewa #tgl_pinjam1").html(pinjam);
      $("#detail_sewa #namapelanggan").html(pelanggan);
      $("#detail_sewa #tgl_transaksi1").html(tgltrans);
      $("#detail_sewa #tgl_pinjam1").html(tglpinjam);
      $("#detail_sewa #tgl_kembali1").html(tglkembali);
      $("#detail_sewa #lama1").html(lama);
      $("#detail_sewa #nama_brg").html(barang);
      $("#detail_sewa #jum_brg").html(jumlah);
      $("#detail_sewa #harga_barang").html(harga);
      $("#detail_sewa #subtotal1").html(subtotal);

      })  ;




    // $("#id_sewa1").find("td[name=id_sewa1]").val(data_detail);
    // $("#updatesewa").find("input[name=id_sewa1]").val(idpen);


</script>
