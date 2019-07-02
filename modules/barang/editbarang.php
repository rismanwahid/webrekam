<?php
  if (isset($_POST['simpan'])) {
    $kd_barang      = $_POST['kd_brg'];
    $kd_kategori    = $_POST['kd_kategori'];
    $nama_barang    = $_POST['nm_brg'];
    $harga_barang   = $_POST['hrg_brg'];
    $stok_barang    = $_POST['stok_brg'];
    $status         = $_POST['status'];

    if($_FILES["gmbr_brg"]["name"]==""){
      $update_gambar  = "";

    }else{
      $nama_file  = $_FILES["gmbr_brg"]["name"];
      $gambar_new    = date('dmYHis').$nama_file;
      $update_gambar = ",gambar='$gambar_new'";
      move_uploaded_file($_FILES['gmbr_brg']['tmp_name'],"images/barang/".$gambar_new);
    }



    mysqli_query($db, "UPDATE barang SET
                                kd_kategori ='$kd_kategori',
                                nama_barang ='$nama_barang',
                                harga       ='$harga_barang',
                                stok        ='$stok_barang',
                                status      ='$status' $update_gambar WHERE kd_barang='$kd_barang'");

    echo "<script>alert('Data Berhasil Diubah')</script>";
    echo "<script>window.location='admin.php?page=barang'</script>";


  }
 ?>
 <section class="content">
   <div class="box box-default">

  <div class="box-header with-border">
    <h3 class="box-title">Edit Barang</h3>
  </div>

  <!-- /.box-header -->

  <div class="box-body">
    <?php
    $kd_brg = $_GET['kd_barang'];
    $query  = mysqli_query($db,"SELECT * FROM barang WHERE kd_barang='$kd_brg'");
    $hitung = mysqli_num_rows($query);
    if ($hitung>0) {
      while ($pecah = mysqli_fetch_assoc($query)) {

 ?>
    <form method="post" enctype="multipart/form-data">

    <div class="row">

      <div class="col-sm-7">
        <div class="form-group">
          <label>Kode Barang</label>
            <input type="text" class="form-control" name="kd_brg" value="<?php echo $pecah ['kd_barang']; ?>" readonly>
        </div>
      </div>

      <div class="col-sm-7">
        <div class="form-group">
              <label>Kategori</label>
                <select class="form-control" name="kd_kategori" required>
                  <?php
                     $query = mysqli_query($db, "SELECT * FROM kategori");
                     if ($pecah[kd_kategori] == 0) {
                       echo "<option value=0 selected>- pilih kategori -</option>";
                     }
                     while ($row = mysqli_fetch_array($query)) {
                       if ($pecah[kd_kategori] == $row[kd_kategori]) {
                         echo "<option value=$row[kd_kategori] selected>$row[nama_kategori]</option>";
                       }
                       else {
                         echo "<option value=$row[kd_kategori]>$row[nama_kategori]</option>";
                       }
                     }
                   ?>

                </select>
              </div>
            </div>

      <div class="col-sm-7">
        <div class="form-group">
          <label>Nama Barang</label>
          <input type="text" class="form-control" name="nm_brg" value="<?php echo $pecah ['nama_barang']; ?>" required>
        </div>
        </div>

        <div class="col-sm-7">
          <div class="form-group">
            <label>Gambar Barang</label><br>
            <img src="images/barang/<?php echo $pecah ['gambar']; ?> " width="100px">
            <input type="file" class="form-control" name="gmbr_brg">
          </div>
        </div>

        <div class="col-sm-7">
          <div class="form-group">
            <label>Harga Barang</label>
            <input type="number" class="form-control" name="hrg_brg" value="<?php echo $pecah ['harga']; ?>"required>
          </div>
        </div>

        <div class="col-sm-7">
          <div class="form-group">
            <label>Stok Barang</label>
            <input type="number" class="form-control" name="stok_brg" value="<?php echo $pecah ['stok']; ?>" required>
          </div>
        </div>

        <div class="col-sm-7">
          <div class="form-group">
            <p><b>Status</b><p>
            <div class="radio">
              <label>
                <input type="radio" name="status" value="on" <?php if($pecah ['status'] == "on"){echo "checked='true'";} ?> >
                On
              </label>
              <label>
                <input type="radio" name="status" value="off" <?php if($pecah ['status'] == "off"){echo "checked='true'";} ?>>
                Off
              </label>
            </div>
          </div>
        </div>


      <!-- /.col -->
    </div>

    <div class="form-group">
      <button type="submit" name="simpan" class="btn btn-success" ><i class="fa fa-save"></i> Simpan</button>
        <a href="admin.php?page=barang" class="btn btn-danger btn-reset"><i class="fa fa-close"></i> Batal</a>
    </div>
    <!-- /.row -->
  </form>
    <?php }} ?>
  </div>
  <!-- /.box-body -->
</div>

</section>
