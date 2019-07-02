<div class="span9">



  <?php

    $kode = $_GET['kd_kategori'];
    $query1  = mysqli_query($db,"SELECT * FROM kategori WHERE kd_kategori='$kode'");
    $hitung1 = mysqli_num_rows($query1);

    $pecah1 = mysqli_fetch_assoc($query1)

   ?>

   <ul class="breadcrumb">
     <li><a href="index.php">Home</a> <span class="divider">/</span></li>
     <li class="active"><?php echo $pecah1['nama_kategori']; ?></li>
   </ul>

  <h4><?php echo $pecah1['nama_kategori']; ?></h4>



    <ul class="thumbnails">
      <?php

        $query  = mysqli_query($db,"SELECT barang.*, kategori.nama_kategori FROM barang JOIN kategori ON barang.kd_kategori=kategori.kd_kategori WHERE status='on' AND barang.kd_kategori='$kode' ORDER BY rand() ASC LIMIT 9");
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
              <p style="text-align:center">Stok: <?php echo $pecah['stok']; ?></p>
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
        </div>

      </div>
    </li>

  <?php }} ?>

    </ul>

</div>
