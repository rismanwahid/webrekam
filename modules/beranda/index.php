  <section class="content-header">
    <h1>
      <i class="glyphicon glyphicon-home"> Beranda</i>
    </h1>



    <ol class="breadcrumb">
      <li><a href="admin.php"><i class="glyphicon glyphicon-home"></i> Beranda</a></li>
    </ol>
  </section>

  <section class="content">

    <div class="row">
      <div class="col-lg-12 col-xs-12">
        <div class="alert alert-info">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          <p style="font-size:14px">
            <i class="icon fa fa-user"></i> Selamat datang <?php if(empty($_SESSION['id_user'])){echo "";}else if($_SESSION['id_user']=='owner') {               echo "Owner"; }else{echo $_SESSION['nama_lengkap_petugas'];} ?> </strong>  <small>Sebagai
              <?php if(empty($_SESSION['id_user'])){echo "";}else{echo $_SESSION['level'];} ?> di Rekam Indonesia
          </p>
        </div>
      </div>
    </div>

    <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <?php

                $tgl=date('y.m.d');
                echo "$tgl";
                $query = mysqli_query($db, "SELECT COUNT(tgl_transaksi) AS jumlah FROM sewa where tgl_transaksi ='$tgl'");
                $hitung = mysqli_num_rows($query);
                if ($hitung>0) {
                  while ($pecah = mysqli_fetch_assoc($query)) {

               ?>
              <h3><?php echo $pecah['jumlah']; ?></h3>
            <?php }} ?>
              <p>Daftar Sewa</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <a href="admin.php?page=daftarsewa" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">          
          <div class="small-box bg-green">
            <div class="inner">
              <?php

                $tgl1=date('y.m.d');
                echo "$tgl1";
                $query1 = mysqli_query($db, "SELECT COUNT(jam_pengembalian) AS jumlah FROM det_sewa where jam_pengembalian ='$tgl1'");
                $hitung1 = mysqli_num_rows($query1);
                if ($hitung1>0) {
                  while ($pecah1 = mysqli_fetch_assoc($query1)) {

               ?>
              <h3><?php echo $pecah1['jumlah']; ?></h3>
            <?php }} ?>

              <p>Pengembalian</p>
            </div>
            <div class="icon">
              <i class="fa fa-sign-in"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3>44</h3>

              <p>Daftar User</p>
            </div>
            <div class="icon">
              <i class="ion ion-person"></i>
            </div>

            <a href="#" class="small-box-footer">Lihat <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3>650000000</h3>

              <p>Laporan Penyewaan</p>
            </div>
            <div class="icon">
              <i class="fa fa-area-chart"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>

  </section>
