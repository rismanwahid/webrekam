<?php
  if (isset($_POST['simpan'])) {
    $id_petugas    = $_POST['id_ptgs'];
    $nama_lengkap  = $_POST['nm_ptgs'];
    $alamat    = $_POST['alamat'];
    $email    = $_POST['email'];
    $no_telp    = $_POST['no_telp'];

    mysqli_query($db, "INSERT INTO petugas(id_petugas,nama_lengkap,alamat,email,no_telp) VALUES             ('$id_petugas','$nama_lengkap','$alamat','$email','$no_telp')");

    echo "<script>alert('Data Berhasil Tersimpan')</script>";
    echo "<script>window.location='admin.php?page=petugas'</script>";


  }
 ?>
 <section class="content">
 <div class="box box-default">
   <div class="box-header with-border">
     <h3 class="box-title"> <i class="fa fa-pencil-square-o"></i> Tambah Petugas</h3>
   </div>
   <!-- /.box-header -->
   <div class="box-body">
     <form method="post" enctype="multipart/form-data">

     <div class="row">
       <div class="col-sm-7">
         <div class="form-group">
           <label>ID Petugas</label>
           <?php
             $sql  = "SELECT max(id_petugas) AS terakhir FROM petugas";
             $hasil  = mysqli_query($db, $sql);
             $data   = mysqli_fetch_assoc($hasil);
             $lastid = $data['terakhir'];
             $lastnourut = (int)substr($lastid,5,4);
             $nexturut   = $lastnourut+1;
             $nextid     = "PTGS-".sprintf("%04s",$nexturut);


            ?>
             <input type="text" class="form-control" name="id_ptgs" value="<?php echo $nextid ; ?>"readonly>
         </div>
       </div>

       <div class="col-sm-7">
         <div class="form-group">
           <label>Nama Lengkap</label>
           <input type="text" class="form-control" name="nm_ptgs" required>
         </div>
       </div>

       <div class="col-sm-7">
         <div class="form-group">
           <label for="comment">Alamat</label>
           <textarea class="form-control" rows="5" name="alamat"></textarea>
         </div>
       </div>

       <div class="col-sm-7">
         <div class="form-group">
           <label>email</label>
           <input type="email" class="form-control" name="email" required>
         </div>
       </div>

       <div class="col-sm-7">
         <div class="form-group">
           <label>No Telepon</label>
           <input type="number" class="form-control" name="no_telp" required>
         </div>
       </div>

     </div>

     <div class="box-footer">
         <button type="submit" name="simpan" class="btn btn-success" ><i class="fa fa-save"></i> Simpan</button>
         <a href="admin.php?page=petugas" class="btn btn-danger btn-reset"><i class="fa fa-close"></i> Batal</a>
     </div>
     <!-- /.row -->
   </form>
   </div>


   <!-- /.box-body -->
 </div>

 </section>
