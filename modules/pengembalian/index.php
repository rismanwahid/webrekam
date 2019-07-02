<section class="content-header">
  <h1>
    <i class="fa fa-folder-o"></i> Pengembalian
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Beranda</a></li>
    <li class="active">Pengembalian</li>
  </ol>
</section>

<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Data Pengembalian</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <table id="example1" class="table table-bordered table-hover">
            <thead>
            <tr>
              <th>No</th>
              <th>ID Sewa</th>
              <th>Tanggal Pengembalian</th>
              <th>Aksi</th>
            </tr>
            </thead>
            <tbody>
              <?php
                $no     = 1;
                $query  = mysqli_query($db,"SELECT  *  FROM sewa WHERE keterangan='barang_diambil'");
                $hitung = mysqli_num_rows($query);
                if ($hitung>0) {
                  while ($pecah = mysqli_fetch_assoc($query)) {

               ?>
            <tr>
              <td><?php echo $no; ?></td>
              <td><?php echo $pecah ['id_sewa']; ?></td>
              <td><?php echo $pecah ['tgl_kembali']; ?></td>
              <td>
                <?php
                $query1  = mysqli_query($db,"SELECT * FROM pengembalian WHERE id_sewa='".$pecah['id_sewa']."'");
                $hitung1 = mysqli_num_rows($query1);
                if ($hitung1>0) {
                ?>

                <a class="btn btn-xs btn-success" href="admin.php?page=viewpengembalian&id_sewa=<?php echo $pecah['id_sewa']; ?>"><i class="fa fa-eye"></i> Lihat</a>
                <?php
                }else {

                 ?>
                <a class="btn btn-xs btn-info" href="admin.php?page=detailpengembalian&id_sewa=<?php echo $pecah['id_sewa']; ?>"><i class="fa fa-edit"></i> Pengembalian</a>
                <?php } ?>
                <a onclick="return confirm('Anda Yakin Ingin Menghapus?')" class="btn btn-xs btn-danger" href="admin.php?page=pelanggan&aksi=hapus&id_pelanggan=<?php echo $pecah['id_pelanggan']; ?>">
                  <i class="fa fa-trash"></i> Hapus</a>
              </td>
            </tr>
          <?php $no++; }} ?>
            </tbody>
          </table>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->


    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->
</section>
