<div class="span9">



  <?php

    $kode = $_GET['kd_kategori'];
    $tglcari = $_GET['tglcari'];
    $tglmax = $_GET['tglmax'];
    $query1  = mysqli_query($db,"SELECT * FROM kategori WHERE kd_kategori='$kode'");
    $hitung1 = mysqli_num_rows($query1);

    $pecah1 = mysqli_fetch_assoc($query1);

   ?>

   <ul class="breadcrumb">
     <li><a href="index.php">Home</a> <span class="divider">/</span></li>
     <li class="active"><?php echo $pecah1['nama_kategori']; ?></li>
   </ul>

  <h4><?php echo $pecah1['nama_kategori']; ?></h4>



    <ul class="thumbnails">
      <?php

        $query  = mysqli_query($db,"SELECT barang.kd_barang,barang.nama_barang,barang.stok,barang.gambar,barang.harga, kategori.nama_kategori FROM barang JOIN kategori ON barang.kd_kategori=kategori.kd_kategori WHERE status='on' AND barang.kd_kategori='$kode'");
        $hitung = mysqli_num_rows($query);
        if ($hitung>0) {
          while ($pecah = mysqli_fetch_assoc($query)) {


       ?>

    <li class="span3">
      <div class="thumbnail" style="max-height:345px;">


            <h5 class="pull-right"><?php echo rupiah($pecah['harga']); ?></h5>
            <img src="images/barang/<?php echo $pecah ['gambar']; ?>" style="width:65%; height:175px" alt=""/>


        <div class="caption">
          <hr class="lessspace" />
            <h5><?php echo $pecah ['nama_barang']; ?></h5>
            <span>

              <?php

                $query1  = mysqli_query($db,"SELECT * FROM (SELECT sewa.*,det_sewa.jumlah,det_sewa.kd_barang FROM det_sewa JOIN sewa ON det_sewa.id_sewa=sewa.id_sewa WHERE sewa.keterangan ='barang_diambil' OR sewa.keterangan='lunas') AS tb WHERE tgl_pinjam <= '$tglcari'
                AND tgl_kembali >= '$tglcari' AND kd_barang ='".$pecah['kd_barang']."'");
                $hitung1 = mysqli_num_rows($query1);
                if ($hitung1>0) {
                   $pecah1 = mysqli_fetch_assoc($query1);
                   $cek=$pecah['stok']-$pecah1['jumlah'];
               ?>

              <p style="text-align:center">Ketersediaan Toko: <?php echo $pecah['stok']-$pecah1['jumlah']; ?></p>
            </span>
            <h4 style="text-align:center">
              <?php
                if(isset($_SESSION['id_user_member'])){
                  if ($cek==0) {
                    echo "";
                  }else {

                ?>


              <a class="btn" href="index.php?page=pemesanan&kd_barang=<?php echo $pecah['kd_barang']; ?>">
                Sewa
              </a>
              <a class="btn btn-xs btn-primary" href="index.php?page=ketersediaan&kd_barang=<?php echo $pecah['kd_barang']; ?>"><i class="fa fa-search"></i> Cek Ketersediaan</a>
            <?php
                  }
              }else {
                echo "Silahkan Login";
              }
            ?>
            </h4>
              <?php
            }else{
              $query2  = mysqli_query($db,"SELECT * FROM (SELECT sewa.*,det_sewa.jumlah,det_sewa.kd_barang FROM det_sewa JOIN sewa ON det_sewa.id_sewa=sewa.id_sewa WHERE sewa.keterangan ='barang_diambil' OR sewa.keterangan='lunas') AS tb WHERE tgl_pinjam <= '$tglmax'
              AND tgl_kembali >= '$tglmax' AND kd_barang ='".$pecah['kd_barang']."'");
              $hitung2 = mysqli_num_rows($query2);
              if ($hitung2>0) {
                 $pecah2 = mysqli_fetch_assoc($query2);
                 $cek2=$pecah['stok']-$pecah2['jumlah'];
               ?>
               <p style="text-align:center">Ketersediaan Toko: <?php echo $pecah['stok']-$pecah2['jumlah']; ?></p>
             </span>
             <h4 style="text-align:center">
               <?php
                 if(isset($_SESSION['id_user_member'])){
                   if ($cek2==0) {
                     echo "";
                   }else {

                 ?>


               <a class="btn" href="index.php?page=pemesanan&kd_barang=<?php echo $pecah['kd_barang']; ?>">
                 Sewa
               </a>               
             <?php
                   }
               }else {
                 echo "Silahkan Login";
               }
             ?>
             </h4>
               <?php
             }else{
                ?>
               <p style="text-align:center">Ketersediaan Toko: <?php echo $pecah['stok']; ?></p>
             </span>
             <h4 style="text-align:center">
               <?php if(isset($_SESSION['id_user_member'])){ ?>


               <a class="btn" href="index.php?page=pemesanan&kd_barang=<?php echo $pecah['kd_barang']; ?>">
                 Sewa
               </a>

             <?php
             }else {
               echo "Silahkan Login";
             }
             ?>
             </h4>
           <?php } }?>

        </div>

      </div>
    </li>

  <?php }} ?>

    </ul>

</div>
