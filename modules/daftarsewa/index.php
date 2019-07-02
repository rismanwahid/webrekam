<?php

  if (isset($_GET['aksi'])) {
    if ($_GET['aksi'] == 'hapus') {
      $id_sewa2= $_SESSION['ss_sewa'];
      mysqli_query($db, "DELETE FROM sewa WHERE id_sewa='$id_sewa2'");

      echo "<script>alert('Data Berhasil Dihapus')</script>";
      echo "<script>window.location='admin.php?page=daftarsewa'</script>";
    }
  }

 ?>
<section class="content-header">
  <h1>
    <i class="fa fa-folder-o"></i> Sewa
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Beranda</a></li>
    <li class="active">Sewa</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Sewa</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <a href="admin.php?page=tambahbarang" class="btn btn-info"><i class="fa fa-plus"></i> Tambah</a> <br> <br>
          <table id="example1" class="table table-bordered table-hover">
            <thead>
            <tr>
              <th>No</th>
              <th>ID Sewa</th>
              <th>ID Pelanggan</th>
              <th>Tanggal Pinjam</th>
              <th>Tanggal Kembali</th>
              <th>Total</th>
              <th>Gambar</th>
              <th>Keterangan</th>
              <th style="width:15%;">Aksi</th>
            </tr>
            </thead>
            <tbody>
              <?php
                $no     = 1;
                $query  = mysqli_query($db,"SELECT sewa.*, pelanggan.nama_lengkap FROM sewa JOIN pelanggan ON sewa.id_pelanggan=pelanggan.id_pelanggan ORDER BY tgl_transaksi DESC");
                $hitung = mysqli_num_rows($query);
                if ($hitung>0) {
                  while ($pecah = mysqli_fetch_assoc($query)) {

               ?>
            <tr>
              <td><?php echo $no; ?></td>
              <td><?php echo $pecah['id_sewa']; ?></td>
              <td><?php echo $pecah['id_pelanggan']; ?></td>
              <td><?php echo $pecah['tgl_pinjam'] ?></td>
              <td><?php echo $pecah['tgl_kembali']; ?></td>
              <td><?php echo $pecah['total']; ?></td>
              <td><button data-toggle="modal" id="aksigambar" data-target="#gambar" data-gambar="<?php echo $pecah ['gambar_resi']; ?>"><img src="images/resi-pembayaran/<?php echo $pecah ['gambar_resi']; ?>"  class="img-responsive"> </button></td>
              <td><?php echo $pecah ['keterangan']; ?></td>
              <td>
              <button type="button" id="ubahstatus" class="btn btn-xs btn-info" data-toggle="modal" data-target="#updatesewa" data-id="<?php echo $pecah['id_sewa']; ?>" data-status="<?php echo $pecah['keterangan']; ?>">
                Ubah Status
              </button>
                <a id="details" class="btn btn-xs btn-info" href="admin.php?page=detail&id_sewa=<?php echo $pecah['id_sewa']; ?>"><i class="fa fa-search"></i> </a>
                <a onclick="return confirm('Anda Yakin Ingin Menghapus?')" class="btn btn-xs btn-danger" href="admin.php?page=daftarsewa&aksi=hapus&id_sw=<?php echo $pecah['id_sewa']; ?>">
                  <i class="fa fa-trash"></i></a>
              </td>
            </tr>
          <?php $no++; }} ?>
            </tbody>
          </table>
        </div>

      </div>


    </div>

  </div>

</section>




        <div class="modal fade" id="updatesewa">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Ubah Status</h4>
              </div>
              <form method="post">
                <div class="modal-body">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>ID Sewa</label>

                        <input type="text" class="form-control" name="id_sewa1" value="<?php echo $pecah['id_sewa'] ; ?>"readonly>

                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Status</label>

                        <select class="form-control" name="keterangan" required>
                          <option name="keterangan" value="belum_lunas" >Belum Lunas</option>
                          <option  name="keterangan" value="dp">DP</option>
                          <option name="keterangan" value="lunas">Lunas</option>
                          <option name="keterangan" value="barang_diambil">Barang Diambil</option>
                        </select>

                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                  <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
                </div>
              </form>

            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
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
                  <button type="submit" name="simpan" class="btn btn-danger">Kembali</button>
                </div>


            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>

        <?php
          if(isset($_POST['simpan'])) {
            $id_sewa2  = $_POST['id_sewa1'];
            $status  = $_POST['keterangan'];

            mysqli_query($db, "UPDATE sewa SET keterangan='$status' WHERE id_sewa='$id_sewa2'");

            echo "<script>alert('Data Berhasil Tersimpan')</script>";
            echo "<script>window.location='admin.php?page=daftarsewa'</script>";


          }
         ?>
