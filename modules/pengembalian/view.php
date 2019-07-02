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
            $hitung = mysqli_num_rows($query);
            $hitung1 = mysqli_num_rows($query1);
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
            <?php if ($hitung1>0) {
              while ($pecah2 = mysqli_fetch_assoc($query2)) {
                 ?>
            <tr>
                <td>Nama Pelanggan</td>
                <td>:</td>
                <td><?php echo $pecah2['nama_lengkap']; ?></td>
            </tr>
            <tr>
                <td>Lama Sewa</td>
                <td>:</td>
                <td><?php if($pecah2['lama']=='0.5'){echo "12 Jam";}else{echo $pecah2['lama']." Hari";} ?></td>
            </tr>
            <tr>
                <td>Tanggal Pinjam</td>
                <td>:</td>
                <td><?php echo $pecah2['tgl_pinjam']; ?></td>
            </tr>
            <tr>
                <td>Harga Sewa</td>
                <td>:</td>
                <td><?php echo rupiah($pecah2['total']); ?></td>
            </tr>
            <tr>
                <td>Tanggal Pengembalian</td>
                <td>:</td>
                <td><?php echo $pecah['jam_pengembalian']; ?></td>
            </tr>
            <?php if ($hitung1>0) {
              while ($pecah1 = mysqli_fetch_assoc($query1)) {
                 ?>
            <tr>
                <td>Denda Keterlambatan</td>
                <td>:</td>
                <td><?php echo rupiah($pecah1['keterlambatan']); ?></td>
            </tr>
            <tr>
                <td>Denda Kerusakan</td>
                <td>:</td>
                <td><?php echo rupiah($pecah1['kerusakan']); ?></td>
            </tr>
            <tr>
                <td>Status</td>
                <td>:</td>
                <td><?php echo $pecah['status']; ?></td>
            </tr>
        </table>
           </div>
         <?php }}}}}} ?>
         </div>
         <!-- /.box -->


       </div>
       <!-- /.col-->
     </div>
     <!-- ./row -->
   </section>
