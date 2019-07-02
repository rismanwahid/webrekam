<?php
  if(isset($_POST['simpan'])) {
    $id_sewa2  = $_POST['id_sewa1'];
    $status  = $_POST['keterangan'];

    mysqli_query($db, "UPDATE sewa SET status='$status' WHERE id_sewa='$id_sewa2'");

    echo "<script>alert('Data Berhasil Tersimpan')</script>";
    echo "<script>window.location='admin.php?page=daftarsewa'</script>";


  }
 ?>
<section class="content">
<div class="box box-default">
  <div class="box-header with-border">
    <h3 class="box-title"><i class="fa fa-pencil-square-o"></i> Update Status</h3>
  </div>
  <!-- /.box-header -->
  <?php
    $id_sewa = $_GET['id_sewa'];

    $query  = mysqli_query($db,"SELECT * FROM sewa WHERE id_sewa='$id_sewa'");
    $hitung = mysqli_num_rows($query);
    if ($hitung>0) {
      while ($pecah = mysqli_fetch_assoc($query)) {

   ?>
      <div class="box-body">
    <form method="post">
  <div class="row">



      <div class="col-md-6">
        <div class="form-group">
          <label>ID Sewa</label>

            <input type="text" class="form-control" name="id_sewa1" value="<?php echo $pecah['id_sewa'] ; ?>"readonly>

        </div>
      </div>

      <div class="col-md-6">
        <div class="form-group">
          <label>Status</label>

            <select class="form-control" name="keterangan" required>
              <option name="keterangan" value="belum_lunas"  <?php if($pecah['keterangan'] == "belum_lunas"){echo "selected='true'";} ?>>Belum Lunas</option>
              <option  name="keterangan" value="dp"  <?php if($pecah['keterangan'] == "dp"){echo "selected='true'";} ?>>DP</option>
              <option name="keterangan" value="lunas"  <?php if($pecah['keterangan'] == "lunas"){echo "selected='true'";} ?>>Lunas</option>
              <option name="keterangan" value="barang_diambil"  <?php if($pecah ['keterangan'] == "barang_diambil"){echo "selected='true'";} ?>>Barang Diambil</option>
            </select>
            </div>
        </div>

        <div class="col-md-12">
          <div class="form-group">
            <button type="submit" name="simpan" class="btn btn-success" ><i class="fa fa-save"></i> Simpan</button>
            <a href="admin.php?page=daftarsewa" class="btn btn-danger btn-reset"><i class="fa fa-close"></i> Batal</a>
          </div>
        </div>

      </div>





  </form>

  </div>
<?php }} ?>
  <!-- /.box-body -->
</div>

</section>
