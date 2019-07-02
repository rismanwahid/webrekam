<div class="span9">



  <?php
    if (isset($_GET['cek'])) {
      $semuadata=array();
      $kode1 = $_GET['ceknama'];
      $kode2 = $_GET['cektanggal'];

      $query  = mysqli_query($db,"SELECT * FROM barang WHERE nama_barang LIKE %.$kode1.%");

      while ($pecah = mysqli_fetch_assoc($query1)){
        $semuadata[]=$pecah;
      }
    }

    echo "<pre>";
    print_r($semuadata);
    echo "</pre>";



   ?>

   <ul class="breadcrumb">
     <li><a href="index.php">Home</a> <span class="divider">/</span></li>
     <li class="active">Hasil Pencarian</li>
   </ul>

  <h4>Hasil Pencarian</h4>



    <ul class="thumbnails">

    <li class="span3">
      <div class="thumbnail" style="max-height:345px;">


            <h5 class="pull-right"></h5>
            <img src="images/barang" alt=""/>


        <div class="caption">
          <hr class="lessspace" />
            <h5></h5>
            <span>
              <p style="text-align:center"></p>
            </span>
            <h4 style="text-align:center">



              <a class="btn" href="index.php?page=pemesanan&kd_barang=<?php echo $pecah['kd_barang']; ?>">
                Sewa
              </a>

            </h4>
        </div>

      </div>
    </li>



    </ul>

</div>
