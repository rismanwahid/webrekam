        <div class="span9">

          <ul class="breadcrumb">
            <li><a href="index.php">Home</a> <span class="divider">/</span></li>
            <li class="active">Catalog</li>
          </ul>

          <h4>Catalog</h4>

            <ul class="thumbnails">
              <?php

                $query  = mysqli_query($db,"SELECT barang.*, kategori.nama_kategori FROM barang JOIN kategori ON barang.kd_kategori=kategori.kd_kategori WHERE status='on' ORDER BY rand() ASC LIMIT 9");
                $hitung = mysqli_num_rows($query);
                if ($hitung>0) {
                  while ($pecah = mysqli_fetch_assoc($query)) {


               ?>

            <li class="span3">
              <div class="thumbnail" style="max-height:345px;">

                <h5 class="pull-right"><?php echo rupiah($pecah['harga']); ?></h5>
                <img src="images/barang/<?php echo $pecah ['gambar']; ?>" style="width:50%; height:150px" alt="">

                <div class="caption">
                  <hr class="lessspace" />
                    <h5><?php echo $pecah ['nama_barang']; ?></h5>
                    <span>
                      <p style="text-align:center">Ketersediaan Toko: <?php echo $pecah ['stok']; ?></p>
                    </span>
                    <h4 style="text-align:center">
                        <?php if(isset($_SESSION['id_user_member'])){ ?>                      

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
            <center>
              <div class="pagination">
                <ul>
                <li><a href="#">&lsaquo;</a></li>
                <li><a href="#">1</a></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#">4</a></li>
                <li><a href="#">...</a></li>
                <li><a href="#">&rsaquo;</a></li>
                </ul>
                </div>
            </center>

        			<br class="clr"/>
        </div>


        </div>
