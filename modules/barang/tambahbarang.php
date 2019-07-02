<?php
  if (isset($_POST['simpan'])) {
    $kd_barang    = $_POST['kd_brg'];
    $kd_kategori  = $_POST['kd_kategori'];
    $nama_barang    = $_POST['nm_brg'];
    $harga_barang    = $_POST['hrg_brg'];
    $stok_barang    = $_POST['stok_brg'];
    $status    = $_POST['status'];

    $gambar_barang = $_FILES['gmbr_brg']['name'];
    $gambar_new    = date('dmYHis').$gambar_barang;
    move_uploaded_file($_FILES['gmbr_brg']['tmp_name'],"images/barang/".$gambar_new);


    mysqli_query($db, "INSERT INTO barang(kd_barang,kd_kategori,nama_barang,gambar,harga,stok,status) VALUES ('$kd_barang','$kd_kategori','$nama_barang','$gambar_new','$harga_barang','$stok_barang','$status')");

    echo "<script>alert('Data Berhasil Tersimpan')</script>";
    echo "<script>window.location='admin.php?page=barang'</script>";


  }
 ?>
 <section class="content">
 <div class="box box-default">
   <div class="box-header with-border">
     <h3 class="box-title"> <i class="fa fa-pencil-square-o"></i> Tambah Barang</h3>
   </div>
   <!-- /.box-header -->
   <div class="box-body">
     <form method="post" enctype="multipart/form-data">

     <div class="row">
       <div class="col-sm-7">
         <div class="form-group">
           <label>Kode Barang</label>
           <?php
             $sql  = "SELECT max(kd_barang) AS terakhir FROM barang";
             $hasil  = mysqli_query($db, $sql);
             $data   = mysqli_fetch_assoc($hasil);
             $lastid = $data['terakhir'];
             $lastnourut = (int)substr($lastid,5,4);
             $nexturut   = $lastnourut+1;
             $nextid     = "BRG-".sprintf("%04s",$nexturut);


            ?>
             <input type="text" class="form-control" name="kd_brg" value="<?php echo $nextid ; ?>"readonly>
         </div>
       </div>

       <div class="col-sm-7">
         <div class="form-group">
               <label>Kategori</label>
                 <select class="form-control" name="kd_kategori" required>
                   <?php
                      $query = mysqli_query($db, "SELECT * FROM kategori");
                      while ($row = mysqli_fetch_assoc($query)) {
                        echo "<option value='$row[kd_kategori]'>$row[nama_kategori]</option>";
                      }
                    ?>
                 </select>
               </div>
             </div>

       <div class="col-sm-7">
         <div class="form-group">
           <label>Nama Barang</label>
           <input type="text" class="form-control" name="nm_brg" required>
         </div>
       </div>

       <div class="col-sm-7">
         <div class="form-group">
           <label>Gambar Barang</label>
           <input type="file" class="form-control" name="gmbr_brg" required>
         </div>
       </div>

       <div class="col-sm-7">
         <div class="form-group">
           <label>Harga Barang</label>
           <input type="number" class="form-control" name="hrg_brg" required>
         </div>
       </div>

       <div class="col-sm-7">
         <div class="form-group">
           <label>Stok Barang</label>
           <input type="number" class="form-control" name="stok_brg" required>
         </div>
       </div>

       <div class="col-sm-7">
         <div class="form-group">
           <p><b>Status</b><p>
           <div class="radio">
             <label>
               <input type="radio" name="status" value="on">
               On
             </label>
             <label>
               <input type="radio" name="status" value="off">
               Off
             </label>
           </div>
         </div>
       </div>



     </div>

     <div class="box-footer">
         <button type="submit" name="simpan" class="btn btn-success" ><i class="fa fa-save"></i> Simpan</button>
         <a href="admin.php?page=barang" class="btn btn-danger btn-reset"><i class="fa fa-close"></i> Batal</a>
     </div>
     <!-- /.row -->
   </form>
   </div>


   <!-- /.box-body -->
 </div>

 </section>
