<?php


if (isset($_POST['cari'])) {

  $_SESSION['sstanggalcari']  = $_POST['tanggalcari'];
  $_SESSION['sstanggalmax']  = $_POST['tanggalmax'];
  $tglskrg=new DateTime($_POST['tanggalcari']);
  $tglskrgnew=new DateTime($_POST['tanggalmax']);

  $perbedaan = $tglskrg->diff($tglskrgnew);
  $_SESSION['sslamasewa']= $perbedaan->d;


  echo "<script>window.location='index.php?page=kategori&kd_kategori=".$_GET['kd_kategori']."&tglcari=".$_POST['tanggalcari']."&tglmax=".$_POST['tanggalmax']."'</script>";

}

$kode = $_GET['kd_kategori'];
$query1  = mysqli_query($db,"SELECT * FROM kategori WHERE kd_kategori='$kode'");
$hitung1 = mysqli_num_rows($query1);

$pecah1 = mysqli_fetch_assoc($query1);

 ?>

<div class="span9">
    <ul class="breadcrumb">
		<li><a href="index.html">Home</a> <span class="divider">/</span></li>
		<li class="active"> Cek Ketersediaan</li>
    </ul>

    <h4><?php echo $pecah1['nama_kategori']; ?></h4>
	<table class="table table-bordered">
		<tr><th> FORM CEK KETERSEDIAAN  </th></tr>
		 <tr>
		 <td>
			<form class="form-horizontal" method="post">
				<div class="control-group">
				  <label class="control-label" for="inputUsername"> Dari Tanggal</label>
				  <div class="controls">
					<input type="date" name="tanggalcari"  required>
				  </div>
				</div>
        <div class="control-group">
				  <label class="control-label" for="inputUsername"> Sampai Tanggal</label>
				  <div class="controls">
					<input type="date" name="tanggalmax" required>
				  </div>
				</div>
				<div class="control-group">
				  <div class="controls">
					<button type="submit" name="cari" class="btn btn-primary">Cek Ketersediaan</button>
				  </div>
				</div>
			</form>
		  </td>
		  </tr>
	</table>
</div>
