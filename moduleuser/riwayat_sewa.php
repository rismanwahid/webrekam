<?php

  if (isset($_POST['upload_resi'])) {

    $id_sewa =  $_POST['id_sewa'];
    $gambar_resi = $_FILES['gmbr_resi']['name'];
    $gambar_new    = date('dmYHis').$gambar_resi;
    move_uploaded_file($_FILES['gmbr_resi']['tmp_name'],"images/resi-pembayaran/".$gambar_new);

      mysqli_query($db, "UPDATE sewa SET gambar_resi= '$gambar_new' WHERE id_sewa='$id_sewa'");

  }



 ?>

<div class="span9">
    <ul class="breadcrumb">
		<li><a href="index.php">Home</a> <span class="divider">/</span></li>
		<li class="active"> Riwayat Sewa</li>
    </ul>

<table class="table table-bordered">
              <thead>



                <tr>
                  <th>No</th>
                  <th>Lama Sewa</th>
                  <th>Tanggal Pinjam</th>
                  <th>Tanggal Kembali</th>
                  <th>Total</th>
                  <th>Gambar</th>
                  <th>Aksi</th>
				        </tr>
              </thead>
              <tbody>
                <?php

                $id_plg = $_SESSION['id_user_member'];
                $no     = 1;

                $query  = mysqli_query($db,"SELECT sewa.id_sewa, det_sewa.id_sewa,sewa.tgl_transaksi,sewa.tgl_pinjam, sewa.tgl_kembali, sewa.total, sewa.gambar_resi,sewa.lama, pelanggan.nama_lengkap,barang.nama_barang,
barang.harga,det_sewa.jumlah,det_sewa.jumlah*barang.harga*det_sewa.lama AS Total FROM sewa
JOIN det_sewa ON det_sewa.id_sewa=sewa.id_sewa
JOIN barang ON det_sewa.kd_barang=barang.kd_barang
JOIN pelanggan ON sewa.id_pelanggan =pelanggan.id_pelanggan WHERE sewa.id_pelanggan='$id_plg'");
                $hitung = mysqli_num_rows($query);
                if ($hitung>0) {
                while ($pecah = mysqli_fetch_array($query)) {



             ?>
                <tr>
                  <td><?php echo $no; ?></td>
                  <td><?php if($pecah['lama']=='0.5'){echo "12 Jam";}else{echo $pecah['lama']." Hari";} ?></td>
                  <td><?php echo $pecah ['tgl_pinjam']; ?></td>
                  <td><?php echo $pecah ['tgl_kembali']; ?></td>
				          <td><?php echo rupiah($pecah ['total']); ?></td>
                  <td><img src="images/resi-pembayaran/<?php echo $pecah ['gambar_resi']; ?>" width="70px";></td>

                  <td>
                    <a id="aksi_resi" class="btn btn-xs btn-success" href="#upload_resi" role="button" data-toggle="modal" data-id="<?php echo $pecah['id_sewa']; ?>"> Upload Resi</a>

                    <a id="aksi_detail" class="btn btn-xs btn-success" data-toggle="modal" href="index.php?page=details&id_sewa=<?php echo $pecah['id_sewa']; ?>" data-detail="<?php echo $pecah['id_sewa']; ?>" data-pinjam="<?php echo $pecah['tgl_pinjam']; ?>" data-pelanggan="<?php echo $pecah['nama_lengkap']; ?>" data-tgltransaksi="<?php echo $pecah['tgl_transaksi']; ?>" data-tgl_pinjam="<?php echo $pecah['tgl_pinjam']; ?>" data-tgl_kembali="<?php echo $pecah['tgl_kembali']; ?>" data-lama="<?php  if($pecah['lama']=='0.5'){echo "12 Jam";}else{echo $pecah['lama']." Hari";} ?>" data-barang="<?php echo $pecah['nama_barang']; ?>" data-harga="<?php echo $pecah['harga']; ?>" data-jumlah="<?php echo $pecah['jumlah']; ?>" data-subtotal="<?php echo $pecah['Total']; ?>">
                      Detail Sewa</a>
                  </td>
                </tr>
                <?php $no++; }} ?>

				</tbody>
            </table>



    </div>

    <div id="upload_resi" class="modal hide fade in" tabindex="-1" role="dialog" aria-labelledby="login" aria-hidden="false" >

    <div class="modal-header">
         <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <center><h3>Upload Bukti Resi Pembayaran</h3></center>
    </div>

    <div class="modal-body" align="center" >
      <br>
    <form class="form-horizontal loginFrm" method="post" enctype="multipart/form-data">
      <div class="control-group">
      <input type="file" class="form-control" name="gmbr_resi" required>
      </div>

      <div class="control-group">
      <input id="id_sewa" type="text" class="form-control" name="id_sewa" required>
      </div>
      <br>
      <button type="submit" name="upload_resi" class="btn btn-success">Upload Resi</button>
    </form>
    </div>
   </div>

   <div id="detail_sewa" class="modal hide fade in" tabindex="-1" role="dialog" aria-labelledby="login" aria-hidden="false" style="width:900px;">

   <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
           <center><h3>Detail Sewa</h3></center>
   </div>


   <div class="modal-body" >
     <div class="span9">

         <table>
               <tr>
                   <td>ID Sewa</td>
                   <td>:</td>
                   <td id="id_sewa1"></td>
               </tr>
               <tr>
                   <td>ID Pelanggan</td>
                   <td>:</td>
                   <td id="namapelanggan"></td>
               </tr>
               <tr>
                   <td>Tangal Transaksi</td>
                   <td>:</td>
                   <td id="tgl_transaksi1"></td>
               </tr>
               <tr>
                   <td>Tanggal Pinjam</td>
                   <td>:</td>
                   <td id="tgl_pinjam1"></td>
               </tr><br>
               <tr>
                   <td>Tanggal Kembali</td>
                   <td>:</td>
                   <td id="tgl_kembali1"></td>
               </tr>
               <tr>
                   <td>Lama Sewa</td>
                   <td>:</td>
                   <td id="lama1"></td>
               </tr>
       </table>

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

      $id_plg1 = isset($_GET['id_sewa'])?$_GET['id_sewa']*1:0;;
      $no1     = 1;

      $query1  = mysqli_query($db,"SELECT sewa.id_sewa, det_sewa.id_sewa,sewa.tgl_transaksi,sewa.tgl_pinjam, sewa.tgl_kembali, sewa.total, sewa.gambar_resi,sewa.lama, pelanggan.nama_lengkap,barang.nama_barang,
barang.harga,det_sewa.jumlah,det_sewa.jumlah*barang.harga*det_sewa.lama AS Total FROM sewa
JOIN det_sewa ON det_sewa.id_sewa=sewa.id_sewa
JOIN barang ON det_sewa.kd_barang=barang.kd_barang
JOIN pelanggan ON sewa.id_pelanggan =pelanggan.id_pelanggan WHERE sewa.id_sewa='$id_plg1'");
      $hitung1 = mysqli_num_rows($query1);
      if ($hitung1>0) {
      while ($pecah1 = mysqli_fetch_array($query1)) {
        print_r($query1);die;
?>
      <tr>
        <td id="nama"><?php echo $pecah1['nama_barang']; ?></td>
        <td><?php echo $pecah1['jumlah']; ?></td>
        <td></td>
        <td></td>
      </tr>
    <?php }} ?>
      <tr>
			  <td colspan="3" style="text-align:right">
			    <strong>Total</strong>
			  </td>
			  <td colspan="1" style="background-color:#e65954; color:white; ">

			    <center><strong></strong><input type="hidden" class="form-control" name="total" </center>

			  </td>
			</tr>

</tbody>
  </table>

         </div>

   </div>
  </div>
