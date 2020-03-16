<div class="span9">

  <ul class="breadcrumb">
    <li><a href="index.php">Home</a> <span class="divider">/</span></li>
    <li class="active">Pemesanan</li>
  </ul>

<div class="well">

  <?php
  $kd_brg = $_GET['kd_barang'];
  $query  = mysqli_query($db,"SELECT * FROM barang WHERE kd_barang='$kd_brg'");
  $hitung = mysqli_num_rows($query);
  if ($hitung>0) {
    while ($pecah = mysqli_fetch_assoc($query)) {

?>


<form class="form-horizontal" method="post">

  <center><h4>Sewa</h4></center><br>

  <div class="control-group">
    <div class="controls">
      <input type="hidden" name="id_sewa" value="<?php echo $_SESSION['ss_sewa']; ?>" readonly>
    </div>
   </div>

  <div class="control-group">
    <label class="control-label" for="inputFname1">Nama Barang </label>
    <div class="controls">
      <input type="text" name="nama_barang" value="<?php echo $pecah ['nama_barang']; ?>" readonly>
    </div>
   </div>

   <div class="control-group">
     <label class="control-label" for="inputFname1">Gambar </label>
    <div class="controls">
     <img src="images/barang/<?php echo $pecah ['gambar']; ?> " width="70px" ></td>
    </div>
    </div>

    <div class="control-group">
      <label class="control-label" for="inputFname1">Harga </label>
      <div class="controls">
        <input type="text" id="inputFname1" name="harga" value="<?php echo $pecah ['harga']; ?>" readonly> /hari
      </div>
     </div>

     <div class="control-group">
       <label class="control-label" for="inputFname1">jumlah </label>
       <div class="controls">
         <input type="number" id="inputFname1" name="jumlah" required>
       </div>
      </div>

  <div class="control-group">
			<div class="controls">
				<button class="btn btn-medium btn-success" type="submit" name="sewa">Sewa</button>
        <a class="btn btn-medium btn-danger" href="index.php">Batal</a>
			</div>
		</div>


</form>

<?php }} ?>

</div>

</div>

<?php

  $barang_id= $_GET['kd_barang'];
  if (isset($_POST['sewa']))
  {
    $id_sewa  = $_POST['id_sewa'];
    $jumlah  = $_POST['jumlah'];
    $lama  = $_SESSION['sslamasewa'];

    mysqli_query($db, "INSERT INTO tmp_detsewa(id_sewa,kd_barang,jumlah,lama) VALUES ('$id_sewa','$barang_id','$jumlah','$lama')");

    echo "<script>alert('Data Berhasil Tersimpan')</script>";
    echo "<script>window.location='index.php'</script>";

  }
 ?>
