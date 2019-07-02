<?php


  if (isset($_SESSION['ss_sewa']))
  {
    $id_s = $_SESSION['ss_sewa'];
    $query1  = mysqli_query($db,"SELECT SUM(a.jumlah) AS jumlah, SUM(a.jumlah*b.harga) as total FROM tmp_detsewa a JOIN barang b ON a.kd_barang = b.kd_barang WHERE a.id_sewa='$id_s'");

    $pecah1 = mysqli_fetch_assoc($query1);
  }

 ?>


<div id="sidebar" class="span3">
  <?php if(isset($_SESSION['id_user_member'])){ ?>
  <div class="well well-small">

    <a id="myCart" href="index.php?page=listpemesanan">
      <img src="asetuser/themes/images/ico-cart.png" alt="cart"> <?php if(isset($_SESSION['ss_sewa'])){ echo $pecah1['jumlah'];}else{ echo "0";} ?> <span class="badge badge-warning pull-right"><?php if(isset($_SESSION['ss_sewa'])){ echo rupiah($pecah1['total']);}
      else{ echo "0";} ?> </span>
    </a>

  </div>

<?php } ?>

  <ul id="sideManu" class="nav nav-tabs nav-stacked">

    <?php

      $query  = mysqli_query($db,"SELECT * FROM kategori");
      $hitung = mysqli_num_rows($query);
      if ($hitung>0) {
        while ($pecah = mysqli_fetch_assoc($query)) {


     ?>


    <li><a href="index.php?page=kategori&kd_kategori=<?php echo $pecah['kd_kategori']; ?>"><?php echo $pecah['nama_kategori']; ?></a></li>


    <?php }} ?>

  </ul>
  <br/>


    <!-- <div class="thumbnail">
      <img src="images/logo4.jpg" ><br>
      <img src="images/logo4.jpg" >

      <div class="caption">
        <h5>Payment Methods</h5>
      </div>
      </div> -->
</div>
