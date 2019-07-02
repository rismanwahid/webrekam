<?php

  if (isset($_POST['simpan'])) {
    $id_pelanggan    = $_POST['id_plg'];
    $nama_lengkap  = $_POST['nm_plg'];
    $jk    = $_POST['jk'];
    $alamat    = $_POST['alamat'];
    $no_telp    = $_POST['no_telp'];
    $pekerjaan    = $_POST['pekerjaan'];

    mysqli_query($db, "UPDATE pelanggan SET
                                            nama_lengkap = '$nama_lengkap',
                                            jk = '$jk',
                                            alamat = '$alamat',
                                            no_telp = '$no_telp',
                                            pekerjaan = '$pekerjaan' WHERE id_pelanggan = '$id_pelanggan'");

    echo "<script>alert('Data Berhasil Diubah')</script>";
    echo "<script>window.location='admin.php?page=pelanggan'</script>";


  }
 ?>
 <section class="content">
 <div class="box box-default">
   <div class="box-header with-border">
     <h3 class="box-title"> <i class="fa fa-pencil-square-o"></i> Edit Pelanggan</h3>
   </div>
   <!-- /.box-header -->
   <div class="box-body">
     <?php
     $id_pelanggan = $_GET['id_pelanggan'];
     $query  = mysqli_query($db,"SELECT * FROM pelanggan WHERE id_pelanggan='$id_pelanggan'");
     $hitung = mysqli_num_rows($query);
     if ($hitung>0) {
       while ($pecah = mysqli_fetch_assoc($query)) {

  ?>
     <form method="post">
     <div class="row">

      <div class="col-sm-7">
         <div class="form-group">
           <label>ID Pelanggan</label>
           <input type="text" class="form-control" name="id_plg" value="<?php echo $pecah ['id_pelanggan']; ?>" readonly>
         </div>
       </div>

       <div class="col-sm-7">
         <div class="form-group">
           <label>Nama Lengkap</label>
           <input type="text" class="form-control" name="nm_plg" value="<?php echo $pecah ['nama_lengkap']; ?>" required>
         </div>
       </div>

       <div class="col-sm-7">
         <div class="form-group">
           <p><b>Jenis Kelamin</b><p>
           <div class="checkbox">
             <label>
               <input type="checkbox" name="jk" value="Laki-Laki" <?php if($pecah ['jk'] == "Laki-Laki"){echo "checked='true'";} ?>>
               Laki-Laki
             </label>
             <label>
               <input type="checkbox" name="jk" value="Perempuan" <?php if($pecah ['jk'] == "Perempuan"){echo "checked='true'";} ?>>
               Perempuan
             </label>
           </div>
         </div>
       </div>

       <div class="col-sm-7">
         <div class="form-group">
           <label for="comment">Alamat</label>
           <textarea class="form-control" rows="5" name="alamat"><?php echo $pecah ['alamat']; ?>      </textarea>
         </div>
       </div>

       <div class="col-sm-7">
         <div class="form-group">
           <label>No Telepon</label>
           <input type="number" class="form-control" name="no_telp" value="<?php echo $pecah ['no_telp']; ?>" required>
         </div>
       </div>

       <div class="col-sm-7">
         <div class="form-group">
           <label>Pekerjaan</label>
           <input type="text" class="form-control" name="pekerjaan" value="<?php echo $pecah ['pekerjaan']; ?>"required>
         </div>
       </div>

    </div>



     <div class="box-footer">
         <button type="submit" name="simpan" class="btn btn-success" ><i class="fa fa-save"></i> Simpan</button>
         <a href="admin.php?page=pelanggan" class="btn btn-danger btn-reset"><i class="fa fa-close"></i> Batal</a>
     </div>


     <!-- /.row -->
   </form>

 <?php }} ?>

   </div>


   <!-- /.box-body -->
 </div>

 </section>
