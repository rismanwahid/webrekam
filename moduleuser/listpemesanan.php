			<?php


			if (isset($_POST['bayar'])){

			$id_sewa 		= $_SESSION['ss_sewa'];
			$id_user		= $_SESSION['id_user_member'];
			$tgl_sewa 	= $_POST['tgl_sewa'];
			$lama_sewa	= $_POST['lamasewa'];
			$jaminan		= $_POST['jaminan'];
			$total			= $_POST['total'];
			$_SESSION['sstotal'] = $total;
			$jam_s			= $_POST['jam_sewa'];

			date_default_timezone_set('Asia/Jakarta');
			$tgl_sekarang 		= date("Y-m-d H:i:s");
			$tgl_pinjam				= $tgl_sewa." ".$jam_s.":00";


			if ($lama_sewa == '0.5') {
			$tambah = '12 HOUR';
			}else {
			$tambah = $lama_sewa." DAY";
			}



			mysqli_query($db, "INSERT INTO sewa(id_sewa,tgl_transaksi,id_pelanggan,tgl_pinjam,tgl_kembali,jaminan,total,lama) VALUES ('$id_sewa','$tgl_sekarang','$id_user','$tgl_pinjam',DATE_ADD('$tgl_pinjam', INTERVAL $tambah ),'$jaminan','$total','$lama_sewa')");


			mysqli_query($db, "INSERT INTO det_sewa(id_det_sewa,id_sewa,kd_barang,jumlah,lama) SELECT id_det_sewa,id_sewa,kd_barang,jumlah,lama FROM tmp_detsewa WHERE id_sewa = '$id_sewa'");

			$sql  = "SELECT max(id_sewa) AS terakhir FROM sewa";
			$hasil  = mysqli_query($db, $sql);
			$data   = mysqli_fetch_assoc($hasil);
			$lastid = $data['terakhir'];
			$lastnourut = (int)substr($lastid,3,4);
			$nexturut   = $lastnourut+1;
			$nextid     = "SW-".sprintf("%04s",$nexturut);

			$_SESSION['ss_sewa'] =  $nextid.date('dmYHis');

			echo "<script>alert('Data Berhasil Tersimpan')</script>";
			echo "<script>window.location='index.php?page=bayar'</script>";



			}


			?>

			<div class="span9">
			<table class="table table-bordered" >
			<tr><th> List Pemesanan  </th></tr>
			<tr>
			<td>
				<form class="form-horizontal" method="post">
					<br>

						<div class="span3">
							<div class="control-group">
								<div class="controls">
									<label>Id Sewa</label>
								<input type="text" name="idsewa"  value="<?php echo $_SESSION['ss_sewa']; ?>" readonly>
								</div>
							</div>
						</div>

						<div class="span3">
							<div class="control-group">
						<div class="controls">
							<label>Lama Sewa </label>
							<select name="lamasewa" id="lamasewa">
								<?php
									if ($_SESSION['lamasewass']=='0.5') {
										$waktu = 'selected';
									}else{
										$waktu='';
									}

									if ($_SESSION['lamasewass']=='1') {
										$waktu1 = 'selected';
									}else{
										$waktu1='';
									}

									if ($_SESSION['lamasewass']=='2') {
										$waktu2 = 'selected';
									}else{
										$waktu2='';
									}

									if ($_SESSION['lamasewass']=='3') {
										$waktu3 = 'selected';
									}else{
										$waktu3='';
									}
									if ($_SESSION['lamasewass']=='4') {
										$waktu4 = 'selected';
									}else{
										$waktu4='';
									}
									if ($_SESSION['lamasewass']=='5') {
										$waktu5 = 'selected';
									}else{
										$waktu5='';
									}
									if ($_SESSION['lamasewass']=='6') {
										$waktu6 = 'selected';
									}else{
										$waktu6='';
									}
									if ($_SESSION['lamasewass']=='7') {
										$waktu7 = 'selected';
									}else{
										$waktu7='';
									}

								 ?>
								<option value="">--pilih lama sewa--</option>
								<option class="class-x"  value="0.5" <?php echo $waktu; ?>>12jam</option>
								<option class="class-x"  value="1" <?php echo $waktu1; ?>>1 Hari</option>
								<option class="class-x"  value="2" <?php echo $waktu2; ?>>2 Hari</option>
								<option class="class-x"  value="3" <?php echo $waktu3; ?>>3 Hari</option>
								<option class="class-x"  value="4" <?php echo $waktu4; ?>>4 Hari</option>
								<option class="class-x"  value="5" <?php echo $waktu5; ?>>5 Hari</option>
								<option class="class-x"  value="6" <?php echo $waktu6; ?>>6 Hari</option>
								<option class="class-x"  value="7" <?php echo $waktu7; ?>>1 Minggu</option>
							</select>
						</div>
							</div>
						</div>

						<div class="span3">
							<div class="control-group">
							  <div class="controls">
								<!-- <label>Tanggal Sewa</label>
								<input type="date" name="tgl_sewa"> -->
							  </div>
							</div>
						</div>
						<div class="span3">
							<div class="control-group">
							  <div class="controls">
								<label>Tanggal Sewa</label>
								<input type="date" name="tgl_sewa">
							  </div>
							</div>
						</div>


						<div class="span3">
							<div class="control-group">
							<div class="controls">
								<label>Jaminan</label>
								<select name="jaminan">
									<option value="ktp">KTP</option>
									<option value="ktm">KTM</option>
									<option value="sim">SIM</option>
									<option value="kartu_keluarga">Kartu Keluarga</option>
									</select>
								</div>
							</div>
						</div>


						<div class="span3">
							<div class="control-group">
							  <div class="controls">
								<label>Jam Sewa</label>
								<input type="time" name="jam_sewa">
							  </div>
							</div>
						</div>







			</td>
			</tr>

			</table>

			<table class="table table-bordered">

			<thead>

			<tr>
				<th>No</th>
			  <th>Gambar</th>
			  <th>Nama Barang</th>
			  <th>Jumlah</th>
			  <th>Harga</th>
			  <th>SubTotal</th>
				<th>Aksi</th>
			</tr>
			</thead>

			<tbody>
			<?php

					$id_s = $_SESSION['ss_sewa'];
					$no     = 1;

					$query  = mysqli_query($db,"SELECT tmp_detsewa.*, barang.gambar, barang.nama_barang, barang.harga, tmp_detsewa.jumlah*barang.harga*tmp_detsewa.lama AS Total FROM tmp_detsewa JOIN barang ON tmp_detsewa.kd_barang=barang.kd_barang WHERE tmp_detsewa.id_sewa ='$id_s' ");
					$hitung = mysqli_num_rows($query);
					if ($hitung>0) {
					while ($pecah = mysqli_fetch_assoc($query)) {


			 ?>
			<tr>
				<td><?php echo $no; ?></td>
			  <td>
			    <img src="images/barang/<?php echo $pecah ['gambar']; ?> " width="75px">
			  </td>
				<td><?php echo $pecah ['nama_barang']; ?></td>
			  <td>
					<?php echo $pecah ['jumlah']; ?>
				</td>
			  <td>
			    <?php echo rupiah($pecah['harga']) ?>
			  </td>
			  <td>
			    <?php echo rupiah($pecah['Total']) ?>
			  </td>
				<td><a onclick="return confirm('Anda Yakin Ingin Menghapus?')" class="btn btn-xs btn-danger" href="index.php?page=listpemesanan&aksi=hapus&id_sewa=<?php echo $_SESSION['ss_sewa']; ?>"><i class="fa fa-trash"></i> Batal</a></td>
			<tr>


			</tr>
			<?php $no++; }} ?>
			<tr>

			  <td colspan="5" style="text-align:right">
			    <strong>Total</strong>
			  </td>
			  <td colspan="2" style="background-color:#e65954; color:white; ">
					<?php
					 $query2	= mysqli_query($db, "SELECT SUM(tmp_detsewa.jumlah*barang.harga*tmp_detsewa.lama) AS Totalall
					FROM tmp_detsewa JOIN barang ON tmp_detsewa.kd_barang=barang.kd_barang
					WHERE tmp_detsewa.id_sewa ='$id_s' ");
					$pecah1 = mysqli_fetch_assoc($query2);
					 ?>
			    <center><strong><?php echo rupiah($pecah1['Totalall']) ?></strong><input type="hidden" class="form-control" name="total"  value="<?php echo ($pecah1['Totalall']) ?>" required></center>

			  </td>
			</tr>

			</tbody>
			</table>

			<a href="index.php" class="btn btn-large btn-success "><i class="icon-arrow-left"></i>  Lanjut Sewa</a>
			<button type="submit" name="bayar" class="btn btn-large btn-success pull-right">Bayar <i class="icon-arrow-right">    </i></button>
			</form>
			</div>
			<script type="text/javascript">

			$(document).ready(function()  {
			$('#lamasewa').change(function(e){
			e.preventDefault();
			 var datalist = $('body').find("select[name='lamasewa']").val();
			 //$('body').find("select[name='lamasewa']").val(datalist);

			 $.ajax({
				 	dataType:"json",
					 type: "POST",
					 url: "http://localhost:8080/rekam/moduleuser/updatekeranjang.php",
					 data:{datalist:datalist},
			      success: function(response) {
							$("#lamasewa option[value='"+response+"']").attr("selected","selected");
			                  location.reload();


			      }
			 });

			 return false;

			});

			});
			</script>

			<?php

			  if (isset($_GET ['aksi'])) {
			    if ($_GET ['aksi'] == 'hapus') {
			      $id_sewa1 = $_SESSION['ss_sewa'];
			      unset($id_sewa1);

			      echo "<script>alert('Data Berhasil Dihapus')</script>";
			      echo "<script>window.location='index.php'</script>";
			    }
			  }

			 ?>
