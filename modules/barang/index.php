<?php

  if (isset($_GET ['aksi'])) {
    if ($_GET ['aksi'] == 'hapus') {
      $kd_brg = $_GET['kd_barang'];
      mysqli_query($db, "DELETE FROM barang WHERE kd_barang = '$kd_brg'");

      echo "<script>alert('Data Berhasil Dihapus')</script>";
      echo "<script>window.location='admin.php?page=barang'</script>";
    }
  }

 ?>
<section class="content-header">
  <h1>
    <i class="fa fa-folder-o"></i> Barang
  </h1>
  <ol class="breadcrumb">
    <li><a href="admin.php?page=dashboard"><i class="fa fa-dashboard"></i> Beranda</a></li>
    <li class="active">Barang</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Data Barang</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <a href="admin.php?page=tambahbarang" class="btn btn-info"><i class="fa fa-plus"></i> Tambah</a> <br> <br>
          <table id="example1" class="table table-bordered table-hover">
            <thead>
            <tr>
              <th>No</th>
              <th>Kode Barang</th>
              <th>Kategori</th>
              <th>Nama Barang</th>
              <th>Gambar</th>
              <th>Harga</th>
              <th>Stok</th>
              <th>Status</th>
              <th>Aksi</th>
            </tr>
            </thead>
            <tbody>
              <?php
                $no     = 1;
                $query  = mysqli_query($db,"SELECT barang.*, kategori.nama_kategori FROM kategori JOIN barang ON barang.kd_kategori=kategori.kd_kategori ");
                $hitung = mysqli_num_rows($query);
                if ($hitung>0) {
                  while ($pecah = mysqli_fetch_assoc($query)) {

               ?>
            <tr>
              <td><?php echo $no; ?></td>
              <td><?php echo $pecah ['kd_barang']; ?></td>
              <td><?php echo $pecah ['nama_kategori'];?></td>
              <td><?php echo $pecah ['nama_barang'];?></td>
              <td align="center">
                <img src="images/barang/<?php echo $pecah ['gambar']; ?> " width="70px"></td>
              <td><?php echo rupiah($pecah['harga']); ?></td>
              <td><?php echo $pecah ['stok']; ?></td>
              <td><?php echo $pecah ['status']; ?></td>
              <td>
                <a class="btn btn-xs btn-info" href="admin.php?page=editbarang&kd_barang=<?php echo $pecah['kd_barang']; ?>"><i class="fa fa-edit"></i> Edit</a>
                <a onclick="return confirm('Anda Yakin Ingin Menghapus?')" class="btn btn-xs btn-danger" href="admin.php?page=barang&aksi=hapus&kd_barang=<?php echo $pecah['kd_barang']; ?>">
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
<!-- /.content -->
