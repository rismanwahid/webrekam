<section class="sidebar">
  <!-- sidebar menu: : style can be found in sidebar.less -->
  <ul class="sidebar-menu" data-widget="tree">
    <li class="header">MAIN MENU</li>
    <li>
      <a href="admin.php?page=dashboard">
          <i class="glyphicon glyphicon-home"></i> Beranda
      </a>
    </li>

    <?php
      if ($_SESSION['level'] == 'petugas') {


     ?>
    <li class="treeview">
      <a href="">
        <i class="glyphicon glyphicon-hdd"></i>
        <span>Data Master</span>
        <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
        </span>
      </a>
      <ul class="treeview-menu">
        <li><a href="admin.php?page=kategori"><i class="fa fa-circle-o"></i> Kategori</a></li>
        <li><a href="admin.php?page=barang"><i class="fa fa-circle-o"></i> Barang</a></li>
        <li><a href="admin.php?page=pelanggan"><i class="fa fa-circle-o"></i> Pelanggan</a></li>
        <li><a href="admin.php?page=petugas"><i class="fa fa-circle-o"></i> Petugas</a></li>
      </ul>
    </li>
    <li class="treeview">
      <a href="#">
        <i class="fa fa-laptop"></i>
        <span>Transaksi</span>
        <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
        </span>
      </a>
      <ul class="treeview-menu">
        <li><a href="admin.php?page=daftarsewa"><i class="fa fa-circle-o"></i> Daftar Sewa</a></li>
        <li><a href="admin.php?page=pengembalian"><i class="fa fa-circle-o"></i> Pengembalian</a></li>
      </ul>
    </li>
    <li>
      <a href="admin.php?page=user">
        <i class="glyphicon glyphicon-user"></i> <span>Manajemen User</span>
      </a>
    </li>

    <li class="treeview">
      <a href="#">
        <i class="fa fa-book"></i> <span>Laporan</span>
        <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
        </span>
      </a>
      <ul class="treeview-menu">
        <li><a href="#"><i class="fa fa-circle-o"></i> Laporan Penyewaan</a></li>
        <li class="treeview">
          <a href="#"><i class="fa fa-circle-o"></i> Grafik Penyewaan Barang</a>
          <ul class="treeview-menu">
            <li><a href="#"><i class="fa fa-circle-o"></i> Level Two</a></li>
            <li class="treeview">
              <a href="#"><i class="fa fa-circle-o"></i> Level Two
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="#"><i class="fa fa-circle-o"></i> Level Three</a></li>
                <li><a href="#"><i class="fa fa-circle-o"></i> Level Three</a></li>
              </ul>
            </li>
          </ul>
        </li>
        <li><a href="#"><i class="fa fa-circle-o"></i> Level One</a></li>
      </ul>
    </li>

    <?php } ?>

    <?php
      if ($_SESSION['level']== 'owner' ) {
        // code...

     ?>
    <li class="treeview">
      <a href="#">
        <i class="fa fa-book"></i> <span>Laporan</span>
        <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
        </span>
      </a>
      <ul class="treeview-menu">
        <li><a href="#"><i class="fa fa-circle-o"></i> Laporan Penyewaan</a></li>
        <li class="treeview">
          <a href="#"><i class="fa fa-circle-o"></i> Grafik Penyewaan Barang</a>
          <ul class="treeview-menu">
            <li><a href="#"><i class="fa fa-circle-o"></i> Level Two</a></li>
            <li class="treeview">
              <a href="#"><i class="fa fa-circle-o"></i> Level Two
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="#"><i class="fa fa-circle-o"></i> Level Three</a></li>
                <li><a href="#"><i class="fa fa-circle-o"></i> Level Three</a></li>
              </ul>
            </li>
          </ul>
        </li>
        <li><a href="#"><i class="fa fa-circle-o"></i> Level One</a></li>
      </ul>
    </li>
    <?php } ?>
  </ul>
</section>
