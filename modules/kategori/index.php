<?php



  if (isset($_GET ['aksi'])) {
    if ($_GET ['aksi'] == 'hapus') {
      $kd_kat = $_GET['kd_kat'];
      mysqli_query($db, "DELETE FROM kategori WHERE kd_kategori = '$kd_kat'");

      echo "<script>alert('Data Berhasil Dihapus')</script>";
      echo "<script>window.location='admin.php?page=kategori'</script>";
    }
  }
 ?>
<section class="content-header">
  <h1>
    <i class="fa fa-folder-o"></i> Kategori
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Beranda</a></li>
    <li class="active">Kategori</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <a href="admin.php?page=tambahkategori" class="btn btn-info"><i class="fa fa-plus"></i> Tambah</a> <br> <br>
        </div>
        <!-- /.box-header -->
        <div class="box-body">

          <table id="example1" class="table table-bordered table-hover">
            <thead>
            <tr>
              <th>No</th>
              <th>Kode Kategori</th>
              <th>Nama Kategori</th>
              <th>Aksi</th>
            </tr>
            </thead>
            <tbody>
              <?php
                $no     = 1;
                $query  = mysqli_query($db,"SELECT * FROM kategori");
                $hitung = mysqli_num_rows($query);
                if ($hitung>0) {
                  while ($pecah = mysqli_fetch_assoc($query)) {

               ?>
            <tr>
              <td><?php echo $no; ?></td>
              <td><?php echo $pecah ['kd_kategori']; ?></td>
              <td><?php echo $pecah ['nama_kategori']; ?></td>
              <td>
                <a class="btn btn-xs btn-info" href="admin.php?page=editkategori&kd_kategori=<?php echo $pecah ['kd_kategori']; ?>"><i class="fa fa-edit"></i> Edit</a>
                <a onclick="return confirm('Anda Yakin Ingin Menghapus?')" class="btn btn-xs btn-danger" href="admin.php?page=kategori&aksi=hapus&kd_kat=<?php echo $pecah ['kd_kategori']; ?>"><i class="fa fa-trash"></i> Hapus</a>
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
