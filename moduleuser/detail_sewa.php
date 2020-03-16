<div class="span9">
    <ul class="breadcrumb">
		<li><a href="index.php">Home</a> <span class="divider">/</span></li>
		<li><a href=" class="index.php?page=riwayat_sewa.php""> Riwayat Sewa</a> <span class="divider">/</span></li>
    <li class="active"> Detail Sewa</li>
    </ul>
	<h3>  Detail Sewa<a href="index.php?page=riwayat_sewa" class="btn btn-large pull-right"><i class="icon-arrow-left"></i> Kembali  </a></h3>
	<hr class="soft"/>

  <table>
    <?php

      $id_sewa  = $_GET['id_sewa'];
      $query    = mysqli_query($db, "SELECT sewa.* , pelanggan.nama_lengkap FROM pelanggan JOIN sewa ON sewa.id_pelanggan=pelanggan.id_pelanggan WHERE id_sewa='$id_sewa'");
      $hitung   = mysqli_num_rows($query);
      if ($hitung>0) {
      while ($pecah = mysqli_fetch_array($query)) {

     ?>
        <tr>
            <td>ID Sewa</td>
            <td>:</td>
            <td><?php echo $pecah['id_sewa']; ?></td>
        </tr>
        <tr>
            <td>ID Pelanggan</td>
            <td>:</td>
            <td><?php echo $pecah['nama_lengkap']; ?></td>
        </tr>
        <tr>
            <td>Tangal Transaksi</td>
            <td>:</td>
            <td><?php echo date('d-m-Y',strtotime($pecah['tgl_transaksi'])); ?></td>
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
            <td><?php echo $pecah['lama']; ?></td>
        </tr>
        <tr>
            <td>Status</td>
            <td>:</td>
            <td><?php echo $pecah['keterangan']; ?></td>
        </tr>
      <?php }} ?>
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
