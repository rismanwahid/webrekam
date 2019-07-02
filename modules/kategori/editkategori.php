<?php
  if (isset($_POST['simpan'])) {
    $kd_kategori  = $_POST['kd_kategori'];
    $nama_kategori  = $_POST['nama_kategori'];

    mysqli_query($db, "UPDATE kategori SET nama_kategori='$nama_kategori' WHERE kd_kategori='$kd_kategori'");

    echo "<script>alert('Data Berhasil Diubah')</script>";
    echo "<script>window.location='admin.php?page=kategori'</script>";


  }
 ?>
<section class="content">
<div class="box box-default">
  <div class="box-header with-border">
    <h3 class="box-title">Edit Kategori</h3>

    <div class="box-tools pull-right">
      <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
      <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
    </div>
  </div>
  <!-- /.box-header -->
  <div class="box-body">
    <?php
    $kd_kat = $_GET['kd_kategori'];
    $query  = mysqli_query($db,"SELECT * FROM kategori WHERE kd_kategori='$kd_kat'");
    $hitung = mysqli_num_rows($query);
    if ($hitung>0) {
      while ($pecah = mysqli_fetch_assoc($query)) {

 ?>
    <form method="post">

    <div class="row">
      <div class="col-md-6">
        <div class="form-group">
          <label>Kode Kategori</label>
            <input type="text" class="form-control" name="kd_kategori" value="<?php echo $pecah ['kd_kategori']; ?>" readonly>
        </div>

        <!-- /.form-group -->
        <!-- /.form-group -->
      </div>
      <!-- /.col -->
      <div class="col-md-6">
        <div class="form-group">
          <label>Nama Kategori</label>
          <input type="text" class="form-control" name="nama_kategori" value="<?php echo $pecah ['nama_kategori']; ?>" required>
        </div>
        <div class="form-group">
          <button type="submit" name="simpan" class="btn btn-success" ><i class="fa fa-save"></i> Simpan</button>
            <a href="admin.php?page=kategori" class="btn btn-danger btn-reset"><i class="fa fa-close"></i> Batal</a>
        </div>
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </form>
    <?php }} ?>
  </div>
  <!-- /.box-body -->
</div>

</section>
