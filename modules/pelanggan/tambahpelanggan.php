<?php
  if (isset($_POST['simpan'])) {
    $id_pelanggan    = $_POST['id_plg'];
    $nama_lengkap  = $_POST['nm_plg'];
    $jk    = $_POST['jk'];
    $alamat    = $_POST['alamat'];
    $no_telp    = $_POST['no_telp'];
    $pekerjaan    = $_POST['pekerjaan'];

    mysqli_query($db, "INSERT INTO pelanggan(id_pelanggan,nama_lengkap,jk,alamat,no_telp,pekerjaan) VALUES ('$id_pelanggan','$nama_lengkap','$jk','$alamat','$no_telp','$pekerjaan')");

    echo "<script>alert('Data Berhasil Tersimpan')</script>";
    echo "<script>window.location='admin.php?page=pelanggan'</script>";


  }
 ?>
 <section class="content">
 <div class="box box-default">
   <div class="box-header with-border">
     <h3 class="box-title"> <i class="fa fa-pencil-square-o"></i> Tambah Pelanggan</h3>
   </div>
   <!-- /.box-header -->
   <div class="box-body">
     <form method="post" enctype="multipart/form-data">

     <div class="row">
       <div class="col-sm-7">
         <div class="form-group">
           <label>ID Pelanggan</label>
           <?php
             $sql  = "SELECT max(id_pelanggan) AS terakhir FROM pelanggan";
             $hasil  = mysqli_query($db, $sql);
             $data   = mysqli_fetch_assoc($hasil);
             $lastid = $data['terakhir'];
             $lastnourut = (int)substr($lastid,4,4);
             $nexturut   = $lastnourut+1;
             $nextid     = "PLG-".sprintf("%04s",$nexturut);


            ?>
             <input type="text" class="form-control" name="id_plg" value="<?php echo $nextid ; ?>"readonly>
         </div>
       </div>

       <div class="col-sm-7">
         <div class="form-group">
           <label>Nama Lengkap</label>
           <input type="text" class="form-control" name="nm_plg" required>
         </div>
       </div>

       <div class="col-sm-7">
         <div class="form-group">
           <p><b>Jenis Kelamin</b><p>
           <div class="checkbox">
             <label>
               <input type="checkbox" name="jk" value="Laki-Laki">
               Laki-Laki
             </label>
             <label>
               <input type="checkbox" name="jk" value="Perempuan">
               Perempuan
             </label>
           </div>
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
           <label>No Telepon</label>
           <input type="number" class="form-control" name="no_telp" required>
         </div>
       </div>

       <div class="col-sm-7">
         <div class="form-group">
           <label>Pekerjaan</label>
           <input type="text" class="form-control" name="pekerjaan" required>
         </div>
       </div>



     </div>

     <div class="box-footer">
         <button type="submit" name="simpan" class="btn btn-success" ><i class="fa fa-save"></i> Simpan</button>
         <a href="admin.php?page=pelanggan" class="btn btn-danger btn-reset"><i class="fa fa-close"></i> Batal</a>
     </div>
     <!-- /.row -->
   </form>
   </div>


   <!-- /.box-body -->
 </div>

 </section>
