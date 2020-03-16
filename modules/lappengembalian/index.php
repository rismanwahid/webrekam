<?php
  if(isset($_POST['cetak'])) {

    $mintgl  = $_POST['mintgl']." 00:00:00";
    $maxtgl  = $_POST['maxtgl']." 23:59:59";

    $query  = mysqli_query($db, "SELECT sewa.id_sewa,sewa.tgl_kembali,sewa.total,pelanggan.nama_lengkap,denda.keterlambatan,denda.kerusakan,pengembalian.status
  FROM sewa JOIN pengembalian ON pengembalian.id_sewa=sewa.id_sewa JOIN denda ON denda.id_sewa=sewa.id_sewa JOIN pelanggan ON sewa.id_pelanggan=pelanggan.id_pelanggan
  WHERE pengembalian.jam_pengembalian BETWEEN '$mintgl' AND '$maxtgl' AND pengembalian.status='barang telah dikembalikan'
  ORDER BY sewa.tgl_kembali ASC");

    $hitung = mysqli_num_rows($query);
        if ($hitung>0) {
          $_SESSION ['mintgl1'] = $_POST['mintgl']." 00:00:00";
          $_SESSION ['maxtgl1'] = $_POST['maxtgl']." 23:59:59";
          echo "<script>window.open('modules/lappengembalian/laporanpengembalian.php')</script>";
        }else{
        echo "<script>alert('Data Tidak Ditemukan')</script>";
        echo "<script>window.location='admin.php?page=lappengembalian'</script>";
      }
}
 ?>

  <section class="content-header">
    <h1>
      <i class="fa  fa-list-alt"></i> Laporan Pengembalian
    </h1>
    <ol class="breadcrumb">
      <li><a href="admin.php?page=dashboard"><i class="fa fa-dashboard"></i> Beranda</a></li>
      <li class="active">Laporan Pengembalian</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
  <div class="box box-default">
    <div class="box-header with-border">
      <h3 class="box-title"><i class="fa fa-pencil-square-o"></i> Pilih Periode</h3>
    </div>
    <!-- /.box-header -->

        <div class="box-body">
      <form method="post">
    <div class="row">

        <div class="col-md-6">
          <div class="form-group">
            <label>Dari Tanggal</label>
              <input type="date" class="form-control" name="mintgl">
          </div>
        </div>

        <div class="col-md-6">
          <div class="form-group">
            <label>Sampai Tanggal</label>
            <input type="date" class="form-control" name="maxtgl" required>
          </div>
          <div class="form-group">
            <button type="submit" name="cetak" class="btn btn-success" ><i class="fa fa-print"></i> Cetak</button>
            <a href="admin.php?page=dashboard" class="btn btn-danger btn-reset"><i class="fa fa-close"></i> Batal</a>
          </div>
        </div>

      </div>



    </form>

    </div>
    <!-- /.box-body -->
  </div>

  </section>
