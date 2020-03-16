<section class="content">
     <div class="row">
       <div class="col-md-12">
         <div class="box box-info">
           <div class="box-header">
             <center><h3 class="box-title"> Detail Pengembalian </h3></center>
             <!-- tools box -->
             <div class="pull-right box-tools">
               <a type="button" class="btn btn-info btn-sm" title="Kembali" href="admin.php?page=pengembalian">
                 <i class="fa fa-times"></i></a>
             </div>
             <!-- /. tools -->
           </div>

           <?php

            $id_sewa = $_GET['id_sewa'];
            $query  = mysqli_query($db,"SELECT * FROM pengembalian WHERE id_sewa='$id_sewa'");
            $query1  = mysqli_query($db,"SELECT * FROM denda WHERE id_sewa='$id_sewa'");
            $query2  = mysqli_query($db,"SELECT sewa.*, pelanggan.nama_lengkap FROM sewa JOIN pelanggan ON sewa.id_pelanggan=pelanggan.id_pelanggan WHERE id_sewa='$id_sewa'");
            $hitung = mysqli_num_rows($query2);
            $hitung1 = mysqli_num_rows($query);
            $hitung2 = mysqli_num_rows($query1);
            if ($hitung>0) {
              while ($pecah = mysqli_fetch_assoc($query2)) {

             ?>
           <!-- /.box-header -->
           <div class="box-body pad">
             <table class="table">
            <tr>
                <td>ID Sewa</td>
                <td>:</td>
                <td><?php echo $pecah['id_sewa']; ?></td>
            </tr>
            <tr>
                <td>Nama Pelanggan</td>
                <td>:</td>
                <td><?php echo $pecah['nama_lengkap']; ?></td>
            </tr>
            <tr>
                <td>Lama Sewa</td>
                <td>:</td>
                <td><?php if($pecah['lama']=='0.5'){echo "12 Jam";}else{echo $pecah['lama']." Hari";} ?></td>
            </tr>
            <tr>
                <td>Tanggal Pinjam</td>
                <td>:</td>
                <td><?php echo date('d-m-Y H:i:s',strtotime($pecah['tgl_pinjam'])); ?></td>
            </tr>
            <tr>
                <td>Tanggal Pengembalian</td>
                <td>:</td>
                <td><?php echo date('d-m-Y H:i:s',strtotime($pecah['tgl_kembali'])); ?></td>
            </tr>
            <?php
            if ($hitung1>0) {
              while ($pecah = mysqli_fetch_assoc($query)) {
             ?>
            <tr>
                <td>Status</td>
                <td>:</td>
                <td><?php echo $pecah['status']; ?></td>
            </tr>
        </table>
           </div>
         <?php }}}} ?>
         <table class="table table-bordered">

           <thead>
             <tr>
               <th>Nama Barang</th>
               <th style="width:5%;">Jumlah</th>
               <th>Harga</th>
               <th>SubTotal</th>
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
           <?php
           if ($hitung1>0) {
           while ($pecah1 = mysqli_fetch_assoc($query1)) {
            ?>
           <tr>

             <td colspan="3" style="text-align:right">
               <strong>Denda Keterlambatan</strong>
             </td>

             <td colspan="1" style="background-color:#e65954; color:white; ">

               <center><strong><?php echo rupiah($pecah1['keterlambatan']); ?></strong><input type="hidden" class="form-control" name="total" </center>

             </td>

           </tr>

           <tr>
             <td colspan="3" style="text-align:right">
               <strong>Denda Kerusakan</strong>
             </td>
             <td colspan="1" style="background-color:#e65954; color:white; ">

               <center><strong><?php echo rupiah($pecah1['kerusakan']) ?></strong><input type="hidden" class="form-control" name="total" </center>

             </td>
           </tr>
<?php }} ?>

           <tr>

               <td colspan="3" style="text-align:right">
                 <strong>Total</strong>
               </td>

               <td colspan="1" style="background-color:#e65954; color:white; ">
                 <?php
                   $query4    = mysqli_query($db, "SELECT SUM(sewa.total+denda.keterlambatan+denda.kerusakan)  AS Total FROM sewa JOIN denda ON sewa.id_sewa=denda.id_sewa WHERE sewa.id_sewa='$id_sewa';");
                   $pecah5 = mysqli_fetch_assoc($query4);
                  ?>

                 <center><strong><?php echo rupiah($pecah5['Total']) ?></strong><input type="hidden" class="form-control" name="total" </center>
               </td>

            </tr>

         </tbody>
         </table>
         </div>
         <!-- /.box -->


       </div>
       <!-- /.col-->
     </div>
     <!-- ./row -->
   </section>
