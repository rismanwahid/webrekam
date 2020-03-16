<?php

  if (isset($_GET ['aksi'])) {
    if ($_GET ['aksi'] == 'hapus') {
      $id_petugas = $_GET['id_petugas'];
      mysqli_query($db, "DELETE FROM petugas WHERE id_petugas = '$id_petugas'");

      echo "<script>alert('Data Berhasil Dihapus')</script>";
      echo "<script>window.location='admin.php?page=petugas'</script>";
    }
  }

 ?>
<section class="content-header">
  <h1>
    <i class="fa fa-folder-o"></i> Petugas
  </h1>
  <ol class="breadcrumb">
    <li><a href="admin.php?page=dashboard"><i class="fa fa-dashboard"></i> Beranda</a></li>
    <li class="active">Petugas</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Data Petugas</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <a href="admin.php?page=tambahpetugas" class="btn btn-info"><i class="fa fa-plus"></i> Tambah</a> <br> <br>
          <table id="example1" class="table table-bordered table-hover">
            <thead>
            <tr>
              <th>No</th>
              <th>ID Petugas</th>
              <th>Nama Lengkap</th>
              <th>Alamat</th>
              <th>Email</th>
              <th>No Telepon</th>
              <th>Aksi</th>
            </tr>
            </thead>
            <tbody>
              <?php
                $no     = 1;
                $query  = mysqli_query($db,"SELECT  *  FROM petugas");
                $hitung = mysqli_num_rows($query);
                if ($hitung>0) {
                  while ($pecah = mysqli_fetch_assoc($query)) {

               ?>
            <tr>
              <td><?php echo $no; ?></td>
              <td><?php echo $pecah ['id_petugas']; ?></td>
              <td><?php echo $pecah ['nama_lengkap']; ?></td>
              <td><?php echo $pecah ['alamat']; ?></td>
              <td><?php echo $pecah['email'] ?></td>
              <td><?php echo $pecah ['no_telp']; ?></td>
              <td>
                <a class="btn btn-xs btn-info" href="admin.php?page=editpetugas&id_petugas=<?php echo $pecah['id_petugas']; ?>"><i class="fa fa-edit"></i> Edit</a>
                <a onclick="return confirm('Anda Yakin Ingin Menghapus?')" class="btn btn-xs btn-danger" href="admin.php?page=petugas&aksi=hapus&id_petugas=<?php echo $pecah['id_petugas']; ?>">
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
