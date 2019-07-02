<?php
  if (isset($_POST['simpan'])) {
    $kd_kategori  = $_POST['kd_kategori'];
    $nama_kategori  = $_POST['nama_kategori'];

    mysqli_query($db, "INSERT INTO kategori(kd_kategori,nama_kategori) VALUES ('$kd_kategori','$nama_kategori')");

    echo "<script>alert('Data Berhasil Tersimpan')</script>";
    echo "<script>window.location='admin.php?page=kategori'</script>";


  }
 ?>
<section class="content">
<div class="box box-default">
  <div class="box-header with-border">
    <h3 class="box-title"><i class="fa fa-pencil-square-o"></i> Tambah Kategori</h3>
  </div>
  <!-- /.box-header -->

      <div class="box-body">
    <form method="post">
  <div class="row">

      <div class="col-md-6">
        <div class="form-group">
          <label>Kode Kategori</label>
          <?php

            $sql  = "SELECT max(kd_kategori) AS terakhir FROM kategori";
            $hasil  = mysqli_query($db, $sql);
            $data   = mysqli_fetch_assoc($hasil);
            $lastid = $data['terakhir'];
            $lastnourut = (int)substr($lastid,5,4);
            $nexturut   = $lastnourut+1;
            $nextid     = "KTGR-".sprintf("%04s",$nexturut);

           ?>
            <input type="text" class="form-control" name="kd_kategori" value="<?php echo $nextid ; ?>"readonly>
        </div>
      </div>

      <div class="col-md-6">
        <div class="form-group">
          <label>Nama Kategori</label>
          <input type="text" class="form-control" name="nama_kategori" required>
        </div>
        <div class="form-group">
          <button type="submit" name="simpan" class="btn btn-success" ><i class="fa fa-save"></i> Simpan</button>
          <a href="admin.php?page=kategori" class="btn btn-danger btn-reset"><i class="fa fa-close"></i> Batal</a>
        </div>
      </div>

    </div>



  </form>

  </div>
  <!-- /.box-body -->
</div>

</section>
