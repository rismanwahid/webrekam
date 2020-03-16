<?php

include '../../database.php';
function rupiah($angka){
  $hasil_rupiah="Rp.".number_format($angka,0,'.','.');
  return $hasil_rupiah;
}


  include '../../fpdf/fpdf.php';

  $pdf = new FPDF();
  $pdf -> AddPage();

  $pdf -> Image('../../images/lognew.png',65);
  $pdf -> SetFont('Arial','i',8);
  $pdf -> Cell(0,5,'Alamat:Jl.Tegal Melati No.82, Sinduadi, Mlati, Kabupaten Sleman, Daerah Istimewa Yogyakarta 55284, Yogyakarta','0','1','C',false);
  $pdf -> Cell(190,0.6,'','0','1','C',true);
  $pdf -> Ln(3);

  $pdf -> SetFont('Arial','B',9);
  $pdf -> Cell(0,5,'Laporan Penyewaan','0','1','C',false);
  $pdf -> Ln(3);
  $pdf -> SetFont('Arial','B',9);

  $no = 1;
  $mintgl = $_SESSION['mintgl']." 00:00:00";
  $maxtgl = $_SESSION['maxtgl']." 23:59:59";
  $query  = mysqli_query($db, "SELECT sewa.id_sewa,sewa.tgl_pinjam,pelanggan.nama_lengkap,barang.nama_barang,barang.harga,det_sewa.jumlah,det_sewa.lama,
barang.harga*det_sewa.jumlah*det_sewa.lama AS subtotal FROM sewa JOIN det_sewa ON det_sewa.id_sewa=sewa.id_sewa JOIN barang ON
barang.kd_barang=det_sewa.kd_barang JOIN pelanggan ON sewa.id_pelanggan=pelanggan.id_pelanggan WHERE sewa.tgl_pinjam BETWEEN '$mintgl' AND '$maxtgl' AND sewa.keterangan='barang_diambil' ORDER BY sewa.tgl_pinjam ASC");

  $hitung = mysqli_num_rows($query);



  $pdf -> Cell(0,5,'Periode:'.date("d.m.Y",strtotime($_SESSION['mintgl']))." - ".date("d.m.Y",strtotime($_SESSION['maxtgl'])),'0','1','L',false);

  $pdf -> SetFont('Arial','B',7);
  $pdf -> Cell(8,6,'No',1,0,'C');
  $pdf -> Cell(35,6,'ID Sewa',1,0,'C');
  $pdf -> Cell(25,6,'Tanggal Sewa',1,0,'C');
  $pdf -> Cell(25,6,'Nama Pelanggan',1,0,'C');
  $pdf -> Cell(35,6,'Nama Barang',1,0,'C');
  $pdf -> Cell(20,6,'Harga Sewa',1,0,'C');
  $pdf -> Cell(10,6,'Jumlah',1,0,'C');
  $pdf -> Cell(10,6,'Lama',1,0,'C');
  $pdf -> Cell(20,6,'SubTotal',1,0,'C');
  $pdf -> Ln(2);

    if ($hitung>0) {
    while ($pecah = mysqli_fetch_assoc($query)) {
      if ($pecah['lama']=='0.5'){$lama1="12 Jam";}else{$lama1=$pecah['lama']." Hari";}

  $pdf -> Ln(4);
  $pdf -> SetFont('Arial','',7);
  $pdf -> Cell(8,4,$no.".",1,0,'c');
  $pdf -> Cell(35,4,$pecah['id_sewa'],1,0,'L');
  $pdf -> Cell(25,4,date("d-m-Y",strtotime($pecah['tgl_pinjam'])),1,0,'L');
  $pdf -> Cell(25,4,$pecah['nama_lengkap'],1,0,'L');
  $pdf -> Cell(35,4,$pecah['nama_barang'],1,0,'L');
  $pdf -> Cell(20,4,rupiah($pecah['harga']),1,0,'c');
  $pdf -> Cell(10,4,$pecah['jumlah'],1,0,'c');
  $pdf -> Cell(10,4,$lama1,1,0,'c');
  $pdf -> Cell(20,4,rupiah($pecah['subtotal']),1,0,'c');

$no++;}}
$pdf -> Ln(4);

  $pdf -> SetFont('Arial','B',7);
  $pdf -> Cell(168,6,'Total',1,0,'R');
  $query1 =mysqli_query($db,"SELECT SUM(barang.harga*det_sewa.jumlah*det_sewa.lama) AS total FROM sewa JOIN det_sewa ON det_sewa.id_sewa=sewa.id_sewa JOIN barang ON barang.kd_barang=det_sewa.kd_barang WHERE sewa.tgl_pinjam BETWEEN
  '$mintgl' AND '$maxtgl' AND sewa.keterangan='barang_diambil' ORDER BY sewa.tgl_pinjam ASC");
  $pecah1 = mysqli_fetch_assoc($query1);

  $pdf -> SetFont('Arial','B',7);
  $pdf -> Cell(20,6,rupiah($pecah1['total']),1,0,'C');

  $pdf->Output("laporan_penyewaan.pdf","I");
 ?>
