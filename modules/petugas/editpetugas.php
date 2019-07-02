<?php

if (isset($_POST['simpan'])) {
  $id_petugas    = $_POST['id_ptgs'];
  $nama_lengkap  = $_POST['nm_ptgs'];
  $alamat    = $_POST['alamat'];
  $email    = $_POST['email'];
  $no_telp    = $_POST['no_telp'];

    mysqli_query($db, "UPDATE petugas SET
                                            nama_lengkap = '$nama_lengkap',
                                            alamat = '$alamat',
                                            email = '$email',
                                            no_telp = '$no_telp' WHERE id_petugas = '$id_petugas'");

    echo "<script>alert('Data Berhasil Diubah')</script>";
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

     <?php
     $id_petugas = $_GET['id_petugas'];
     $query  = mysqli_query($db,"SELECT * FROM petugas WHERE id_petugas='$id_petugas'");
     $hitung = mysqli_num_rows($query);
     if ($hitung>0) {
       while ($pecah = mysqli_fetch_assoc($query)) {

  ?>

     <form method="post" enctype="multipart/form-data">

     <div class="row">
       <div class="col-sm-7">
         <div class="form-group">
           <label>ID Petugas</label>
             <input type="text" class="form-control" name="id_ptgs" value="<?php echo $pecah ['id_petugas']; ?>" readonly>
         </div>
       </div>

       <div class="col-sm-7">
         <div class="form-group">
           <label>Nama Lengkap</label>
           <input type="text" class="form-control" name="nm_ptgs" value="<?php echo $pecah ['nama_lengkap']; ?>" required>
         </div>
       </div>

       <div class="col-sm-7">
         <div class="form-group">
           <label for="comment">Alamat</label>
           <textarea class="form-control" rows="5" name="alamat"><?php echo $pecah ['alamat']; ?></textarea>
         </div>
       </div>

       <div class="col-sm-7">
         <div class="form-group">
           <label>email</label>
           <input type="email" class="form-control" name="email" value="<?php echo $pecah ['email']; ?>" required>
         </div>
       </div>

       <div class="col-sm-7">
         <div class="form-group">
           <label>No Telepon</label>
           <input type="number" class="form-control" name="no_telp" value="<?php echo $pecah ['no_telp']; ?>" required>
         </div>
       </div>

     </div>

     <div class="box-footer">
         <button type="submit" name="simpan" class="btn btn-success" ><i class="fa fa-save"></i> Simpan</button>
         <a href="admin.php?page=petugas" class="btn btn-danger btn-reset"><i class="fa fa-close"></i> Batal</a>
     </div>
     <!-- /.row -->
   </form>

   <?php }} ?>

   </div>


   <!-- /.box-body -->
 </div>

 </section>
