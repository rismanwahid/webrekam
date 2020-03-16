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

                $query  = mysqli_query($db,"SELECT sewa.id_sewa,sewa.tgl_transaksi,sewa.tgl_pinjam, sewa.tgl_kembali, sewa.total, sewa.gambar_resi,sewa.lama, pelanggan.nama_lengkap FROM sewa
                JOIN pelanggan ON sewa.id_pelanggan =pelanggan.id_pelanggan WHERE sewa.id_pelanggan='$id_plg' ORDER BY sewa.id_sewa DESC");
                $hitung = mysqli_num_rows($query);
                if ($hitung>0) {
                while ($pecah = mysqli_fetch_array($query)) {

             ?>
                <tr>
                  <td><?php echo $no; ?></td>
                  <td><?php if($pecah['lama']=='0.5'){echo "12 Jam";}else{echo $pecah['lama']." Hari";} ?></td>
                  <td><?php echo date('d-m-Y H:i:s',strtotime($pecah['tgl_pinjam'])); ?></td>
                  <td><?php echo date('d-m-Y H:i:s',strtotime($pecah['tgl_kembali'])); ?></td>
				          <td><?php echo rupiah($pecah ['total']); ?></td>
                  <td><button data-toggle="modal" id="aksigambar" data-target="#gambar" data-gambar="<?php echo $pecah ['gambar_resi']; ?>" > <img src="images/resi-pembayaran/<?php echo $pecah ['gambar_resi']; ?>"  style="width:70px;"> </button></td>
                  <td>
                    <a id="aksi_resi" class="btn btn-xs btn-success" href="#upload_resi" role="button" data-toggle="modal" data-id="<?php echo $pecah['id_sewa']; ?>"> Upload Resi</a>
                    <a class="btn btn-xs btn-success" data-toggle="modal" href="index.php?page=details&id_sewa=<?php echo $pecah['id_sewa']; ?>">
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
      <input id="id_sewa" type="hidden" class="form-control" name="id_sewa" required>
      </div>
      <br>
      <button type="submit" name="upload_resi" class="btn btn-success">Upload Resi</button>
    </form>
    </div>
   </div>


   <div class="modal fade" id="gambar">
     <div class="modal-dialog">
       <div class="modal-content">
         <div class="modal-header">
           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
             <span aria-hidden="true">&times;</span></button>
           <h4 class="modal-title"> Gambar Resi Pembayaran</h4>
         </div>

           <div class="modal-body">
             <div id="gambarresi">

             </div>

           </div>
           <div class="modal-footer">
             <a class="btn  btn-danger" href="index.php?page=riwayat_sewa">Kembali</a>
           </div>

       </div>
       <!-- /.modal-content -->
     </div>
     <!-- /.modal-dialog -->
   </div>
