<section class="content-header">
  <h1>
    <i class="fa fa-folder-o"></i> Manajemen User
  </h1>
  <ol class="breadcrumb">
    <li><a href="admin.php?page=dashboard"><i class="fa fa-dashboard"></i> Beranda</a></li>
    <li class="active">Manajemen User</li>
  </ol>
</section>

<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Data User</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <!-- <a href="admin.php?page=tambahpetugas" class="btn btn-info"><i class="fa fa-plus"></i> Tambah</a> <br> <br> -->
          <table id="example1" class="table table-bordered table-hover">
            <thead>
            <tr>
              <th>No</th>
              <th>UserName</th>
              <th>Level</th>
              <th>Status</th>
              <th>Aksi</th>
            </tr>
            </thead>
            <tbody>
              <?php
                $no     = 1;
                $query  = mysqli_query($db,"SELECT  *  FROM user");
                $hitung = mysqli_num_rows($query);
                if ($hitung>0) {
                  while ($pecah = mysqli_fetch_assoc($query)) {

               ?>
            <tr>
              <td><?php echo $no; ?></td>
              <td><?php echo $pecah ['username']; ?></td>
              <td><?php echo $pecah['level'] ?></td>
              <td><?php echo $pecah ['status']; ?></td>
              <td>
                <a class="btn btn-xs btn-info" href="admin.php?page=editpelanggan&id_pelanggan=<?php echo $pecah['id_pelanggan']; ?>"><i class="fa fa-edit"></i> Edit</a>
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
