<section class="content">
     <div class="row">
       <div class="col-md-12">
         <div class="box box-info">
           <div class="box-header">
             <center><h3 class="box-title"> Detail Sewa </h3></center>
             <!-- tools box -->
             <div class="pull-right box-tools">
               <a type="button" class="btn btn-info btn-sm" title="Kembali" href="admin.php?page=daftarsewa">
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
             <table class="table">
            <tr>
                <td>ID Sewa</td>
                <td>:</td>
                <td><?php echo $pecah['id_sewa']; ?></td>
            </tr>
            <tr>
                <td>Tangal Transaksi</td>
                <td>:</td>
                <td><?php echo date('d-m-Y',strtotime($pecah['tgl_transaksi'])); ?></td>
            </tr>
            <tr>
                <td>ID Pelanggan</td>
                <td>:</td>
                <td><?php echo $pecah['id_pelanggan']; ?></td>
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
                <td>Gambar Resi</td>
                <td>:</td>
                <td><img src="images/resi-pembayaran/<?php echo $pecah ['gambar_resi']; ?>" width="70px"; height="70px";></td>
            </tr>
            <tr>
                <td>keterangan</td>
                <td>:</td>
                <td><?php echo $pecah['keterangan']; ?></td>
            </tr>
        </table>
           </div>
         <?php }} ?>
         <table class="table table-bordered table-hover">

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
               $query1    = mysqli_query($db, "SELECT barang.nama_barang,det_sewa.jumlah,barang.harga,det_sewa.lama,barang.harga*det_sewa.jumlah*det_sewa.lama AS subtotal FROM det_sewa JOIN barang ON det_sewa.kd_barang=barang.kd_barang WHERE id_sewa='$id_sewa'");
               $hitung1   = mysqli_num_rows($query1);
               if ($hitung1>0) {
               while ($pecah1 = mysqli_fetch_array($query1)) {
              ?>
             <tr>
               <td><?php echo $pecah1['nama_barang'] ?></td>
               <td><?php echo $pecah1['jumlah']; ?></td>
               <td><?php echo $pecah1['harga']; ?></td>
               <td><?php echo $pecah1['subtotal']; ?></td>
             </tr>
           <?php }} ?>
             <tr>
               <?php
                 $query2    = mysqli_query($db, "SELECT SUM(barang.harga*det_sewa.jumlah*det_sewa.lama)  AS Total FROM det_sewa JOIN barang ON det_sewa.kd_barang=barang.kd_barang WHERE id_sewa='$id_sewa'");
                 $pecah2 = mysqli_fetch_assoc($query2);
                ?>
               <td colspan="3" style="text-align:right">
                 <strong>Total</strong>
               </td>
               <td colspan="1" style="background-color:#e65954; color:white; ">

                 <center><strong><?php echo rupiah($pecah2['Total']) ?></strong><input type="hidden" class="form-control" name="total" </center>

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
