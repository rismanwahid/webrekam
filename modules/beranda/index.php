  <section class="content-header">
    <h1>
      <i class="glyphicon glyphicon-home"> Beranda</i>
    </h1>
    <ol class="breadcrumb">
      <li><a href="admin.php?page=dashboard"><i class="glyphicon glyphicon-home"></i> Beranda</a></li>
    </ol>
  </section>

  <section class="content">
    <div class="row">
      <div class="col-lg-12 col-xs-12">
        <div class="alert alert-info">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          <p style="font-size:15px">
            <i class="icon fa fa-user"></i> Selamat datang <?php if(empty($_SESSION['id_user'])){echo "";}else if($_SESSION['id_user']=='owner') { echo "Owner"; }else{echo $_SESSION['nama_lengkap_petugas'];} ?> </strong>  <small>Sebagai
              <?php if(empty($_SESSION['id_user'])){echo "";}else{echo $_SESSION['level'];} ?> di Rekam Indonesia
          </p>
        </div>
      </div>

        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <?php

                $tgl=date('Y.m.d');
                $string = date('d-m-Y');
                ?><p>Transaksi Sewa: <?php echo $string; ?></p><?php
                $query = mysqli_query($db, "SELECT COUNT(tgl_transaksi) AS jumlah FROM sewa where tgl_transaksi ='$tgl'");
                $hitung = mysqli_num_rows($query);
                if ($hitung>0) {
                  while ($pecah = mysqli_fetch_assoc($query)) {

               ?>
              <h3><?php echo $pecah['jumlah']; ?></h3>
            <?php }} ?>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <a href="admin.php?page=daftarsewa" class="small-box-footer">Lihat Daftar Sewa <i class=" fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <div class="small-box bg-green">
            <div class="inner">
              <?php

                ?><p>Transaksi Pengembalian</p><?php
                $query1 = mysqli_query($db, "SELECT COUNT(*) AS jumlah FROM sewa WHERE keterangan='barang_diambil'");
                $hitung1 = mysqli_num_rows($query1);
                if ($hitung1>0) {
                  while ($pecah1 = mysqli_fetch_assoc($query1)) {

               ?>
              <h3><?php echo$pecah1['jumlah']; ?></h3>
            <?php }} ?>

            </div>
            <div class="icon">
              <i class="fa fa-sign-in"></i>
            </div>
            <a href="admin.php?page=pengembalian" class="small-box-footer">Lihat Data Pengembalian <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <?php
                ?><p>Daftar User</p> <?php
                $query2 = mysqli_query($db, "SELECT COUNT(*) AS jumlah FROM user");
                $hitung2 = mysqli_num_rows($query2);
                if ($hitung2>0) {
                  while ($pecah2 = mysqli_fetch_assoc($query2)) {
               ?>
              <h3><?php echo $pecah2['jumlah']; ?></h3>
            <?php }} ?>

            </div>
            <div class="icon">
              <i class="ion ion-person"></i>
            </div>

            <a href="admin.php?page=user" class="small-box-footer">Lihat Daftar User <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <?php
                $tgl2=date('Y.m.d');
                $tgl=date('Y.m.d');
                $string = date('d-m-Y');
                ?><p>Pendapatan: <?php echo $string; ?></p><?php
                $query1 =mysqli_query($db,"SELECT SUM(total) AS total FROM sewa WHERE sewa.tgl_transaksi='$tgl2'");
                $pecah3 = mysqli_fetch_assoc($query1);
               ?>
              <h3><?php echo rupiah($pecah3['total']); ?></h3>

            </div>
            <div class="icon">
              <i class="fa fa-area-chart"></i>
            </div>
            <a href="admin.php?page=laporan" class="small-box-footer">Cek Laporan Penyewaan <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>

  </section>
