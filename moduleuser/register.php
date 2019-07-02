<?php

if (isset($_POST['simpan'])){

  $level	      = "pelanggan";
  $status	      = "on";
  $id_pelanggan = $_POST['id_pelanggan'];
  $nama 		    = $_POST['nama'];
  $username		  = $_POST['username'];
  $jk 	        = $_POST['jk'];
  $alamat	      = $_POST['alamat'];
  $notelp	      = $_POST['notelp'];
  $pekerjaan	  = $_POST['pekerjaan'];
  $password	    = $_POST['password'];


  mysqli_query($db, "INSERT INTO pelanggan(id_pelanggan,nama_lengkap,jk,alamat,no_telp,pekerjaan) VALUES ('$id_pelanggan','$nama','$jk','$alamat','$notelp','$pekerjaan')");


  mysqli_query($db, "INSERT INTO user(id_user,username,password,level,status) VALUES  ('$id_pelanggan','$username','$password','$level','$status')");

  echo "<script>alert('Data Berhasil Tersimpan')</script>";
  echo "<script>window.location='index.php'</script>";

}



 ?>



<div class="span9">

  <ul class="breadcrumb">
		<li><a href="index.php">Home</a> <span class="divider">/</span></li>
		<li class="active"> Register</li>
    </ul>


	<table class="table table-bordered">
		<tr><th> Form Register  </th></tr>
		 <tr>
		 <td>
			<form class="form-horizontal" method="post">

        <div class="control-group">
				  <label class="control-label">ID User </label>
				  <div class="controls">
            <?php
              $sql  = "SELECT max(id_pelanggan) AS terakhir FROM pelanggan";
              $hasil  = mysqli_query($db, $sql);
              $data   = mysqli_fetch_assoc($hasil);
              $lastid = $data['terakhir'];
              $lastnourut = (int)substr($lastid,4,4);
              $nexturut   = $lastnourut+1;
              $nextid     = "PLG-".sprintf("%04s",$nexturut);


             ?>
					<input type="text" name="id_pelanggan" value="<?php echo $nextid; ?>"required>
				  </div>
				</div>

        <div class="control-group">
				  <label class="control-label">Nama Lengkap </label>
				  <div class="controls">
					<input type="text" name="nama" required>
				  </div>
				</div>

        <div class="control-group">
				  <label class="control-label">Username</label>
				  <div class="controls">
					<input type="text" name="username" required>
				  </div>
				</div>

				<div class="control-group">
				  <label class="control-label">Jenis Kelamin</label>
				  <div class="controls">
            <div class="radio">
              <label>
                <input type="radio" name="jk" value="Laki-Laki" required>
                Laki-Laki
              </label>
              <label>
                <input type="radio" name="jk" value="Perempuan" required>
                Perempuan
              </label>
            </div>
				  </div>
				</div>

        <div class="control-group">
				  <label class="control-label" for="inputPassword1">Alamat</label>
				  <div class="controls">
					<textarea class="form-control" rows="5" name="alamat" required></textarea>
				  </div>
				</div>

        <div class="control-group">
				  <label class="control-label">No Telepon</label>
				  <div class="controls">
					<input type="number" name="notelp" required>
				  </div>
				</div>

        <div class="control-group">
				  <label class="control-label">Pekerjaan</label>
				  <div class="controls">
					<input type="text" name="pekerjaan" required>
				  </div>
				</div>

        <div class="control-group">
				  <label class="control-label">Password</label>
				  <div class="controls">
					<input type="password" name="password" required>
				  </div>
				</div>

				<div class="control-group">
				  <div class="controls">
					<button type="submit" name="simpan" class="btn"> Register</button>
				  </div>
				</div>

			</form>
		  </td>
		  </tr>
	</table>


</div>
