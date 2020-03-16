<?php

if (isset($_POST['simpan'])){

  $id_sewa 		          = $_POST['id_sewa'];
  $keterlambatan		    = $_POST['dendaterlambat'];
  $dendakerusakan 	          = $_POST['dendakerusakan'];
  $tanggal_pengembalian	= $_POST['tanggalpengembalian'];



  date_default_timezone_set('Asia/Jakarta');

  mysqli_query($db, "INSERT INTO denda(id_sewa,keterlambatan,kerusakan) VALUES ('$id_sewa','$keterlambatan','$dendakerusakan')");


  mysqli_query($db, "INSERT INTO pengembalian(id_sewa,jam_pengembalian,status) VALUES  ('$id_sewa','$tanggal_pengembalian','barang telah dikembalikan')");

  mysqli_query($db, "UPDATE sewa SET keterangan='barang telah dikembalikan' WHERE id_sewa='$id_sewa'");

  echo "<script>alert('Data Berhasil Tersimpan')</script>";
  echo "<script>window.location='admin.php?page=pengembalian'</script>";

}
 ?>
<section class="content">
     <div class="row">
       <div class="col-md-12">
         <div class="box box-info">
           <div class="box-header">
             <center><h3 class="box-title"> Pengembalian </h3></center>
             <!-- tools box -->
             <div class="pull-right box-tools">
               <a type="button" class="btn btn-info btn-sm" title="Kembali" href="admin.php?page=pengembalian">
                 <i class="fa fa-times"></i></a>
             </div>
             <!-- /. tools -->
           </div>

           <?php

            $id_sewa = $_GET['id_sewa'];
            $query  = mysqli_query($db,"SELECT sewa.*, pelanggan.nama_lengkap FROM sewa JOIN pelanggan ON sewa.id_pelanggan=pelanggan.id_pelanggan WHERE id_sewa='$id_sewa'");
            $hitung = mysqli_num_rows($query);
            if ($hitung>0) {
              while ($pecah = mysqli_fetch_assoc($query)) {

             ?>
           <!-- /.box-header -->
           <div class="box-body pad">
             <form method="post">


             <table class="table">
            <tr>
                <td>ID Sewa</td>
                <td>:</td>
                <td><?php echo $pecah['id_sewa']; ?> <input type="hidden" name="id_sewa" value="<?php  echo $pecah['id_sewa'];?>"></td>
            </tr>
            <tr>
                <td>Tangal Transaksi</td>
                <td>:</td>
                <td><?php echo date('d-m-Y',strtotime($pecah['tgl_transaksi'])); ?></td>
            </tr>
            <tr>
                <td>Nama Pelanggan</td>
                <td>:</td>
                <td><?php echo $pecah['nama_lengkap']; ?></td>
            </tr>
            <tr>
                <td>Tanggal Pinjam</td>
                <td>:</td>
                <td><?php echo date('d-m-Y H:i:s',strtotime($pecah['tgl_pinjam'])); ?></td>
            </tr>
            <tr>
                <td>Tanggal Kembali</td>
                <td>:</td>
                <td><?php echo date('d-m-Y H:i:s',strtotime($pecah['tgl_kembali'])); ?></td>
            </tr>
            <tr>
                <td>Lama Sewa</td>
                <td>:</td>
                <td><?php if($pecah['lama']=='0.5'){echo "12 Jam";}else{echo $pecah['lama']." Hari";} ?></td>
            </tr>
            <tr>
                <td>Jaminan</td>
                <td>:</td>
                <td><?php echo $pecah['jaminan']; ?></td>
            </tr>
            <tr>
                <td>Tanggal Pengembalian</td>
                <td>:</td>
                <td><b>
                <?php echo date('d-m-Y H:i:s'); ?></b>
                <input type="hidden" name="tanggalpengembalian" value="<?php  echo date('Y-m-d  H:i:s');?>">
              </td>
            </tr>
            <tr>
                <td>Lama Telat</td>
                <td>:</td>
                <td><b>
                <?php
                  $awal   = date_create($pecah['tgl_kembali']);
                  $akhir   = date_create(date('d-m-Y H:i:s'));
                  $diff  = date_diff($awal, $akhir);
                  if (strtotime($pecah['tgl_kembali'])>strtotime(date('Y-m-d H:i:s'))) {
                    echo "Belum Waktu Kembali";
                  }else{
                  echo $diff->d.' hari '.$diff->h.' Jam';
                  }
                ?>
                 </b></td>
            </tr>
            <tr>
                <td>Denda Terlambat</td>
                <td>:</td>
                <td><b>

                  <?php
                    $hasil= (($diff->d*24) + $diff->h)*10/100*intval($pecah['total']);
                    if (strtotime($pecah['tgl_kembali'])>strtotime(date('Y-m-d H:i:s'))) {
                      echo "Belum Waktu Kembali";
                    }else{
                  echo rupiah($hasil);
                }
                  ?>
                </b> <input type="hidden" name="dendaterlambat" value="<?php  echo $hasil;?>"></td>
            </tr>

            <tr>
                <td>Denda Kerusakan</td>
                <td>:</td>
                <td><input type="text" name="dendakerusakan"></td>
            </tr>



        </table>
           </div>
         <?php }} ?>

         <table class="table table-bordered">

           <thead>
             <tr>
               <th>Nama Barang</th>
               <th style="width:5%;">Jumlah</th>
               <th>Harga</th>
               <th style="width:25%;">SubTotal</th>
              </tr>
           </thead>

           <tbody>
             <?php
               $query3    = mysqli_query($db, "SELECT barang.nama_barang,det_sewa.jumlah,barang.harga,det_sewa.lama,barang.harga*det_sewa.jumlah*det_sewa.lama AS subtotal FROM det_sewa JOIN barang ON det_sewa.kd_barang=barang.kd_barang WHERE id_sewa='$id_sewa'");
               $hitung3   = mysqli_num_rows($query3);
               if ($hitung3>0) {
               while ($pecah4 = mysqli_fetch_array($query3)) {
              ?>
             <tr>
               <td><?php echo $pecah4['nama_barang'] ?></td>
               <td><?php echo $pecah4['jumlah']; ?></td>
               <td><?php echo rupiah($pecah4['harga']); ?></td>
               <td><?php echo rupiah($pecah4['subtotal']); ?></td>
             </tr>
           <?php }} ?>

           <tr>

               <td colspan="3" style="text-align:right">
                 <strong>Total</strong>
               </td>

               <td colspan="1" style="background-color:#e65954; color:white; ">
                 <?php
                   $query4    = mysqli_query($db, "SELECT * FROM sewa WHERE id_sewa='$id_sewa';");
                   $pecah5 = mysqli_fetch_assoc($query4);
                  ?>

                 <center><strong><?php echo rupiah($pecah5['total']) ?></strong><input type="hidden" class="form-control" name="total" </center>
               </td>

            </tr>

         </tbody>
         </table>

         <div class="modal-footer">
           <?php
           $query6  = mysqli_query($db,"SELECT sewa.*, pelanggan.nama_lengkap FROM sewa JOIN pelanggan ON sewa.id_pelanggan=pelanggan.id_pelanggan WHERE id_sewa='$id_sewa'");
           $hitung6 = mysqli_num_rows($query6);

             $pecah6 = mysqli_fetch_assoc($query6);
             if (strtotime($pecah6['tgl_kembali'])>strtotime(date('Y-m-d H:i:s'))) {
               echo "";
             }else{
            ?>
           <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
         <?php } ?>
         </div>
         </form>
         </div>
         <!-- /.box -->


       </div>
       <!-- /.col-->
     </div>
     <!-- ./row -->
   </section>
