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
  $pdf -> Cell(0,5,'Laporan Pengembalian','0','1','C',false);
  $pdf -> Ln(3);
  $pdf -> SetFont('Arial','B',9);

  $no = 1;
  $mintgl = $_SESSION['mintgl1']." 00:00:00";
  $maxtgl = $_SESSION['maxtgl1']." 23:59:59";
  $query  = mysqli_query($db, "SELECT sewa.id_sewa,sewa.tgl_kembali,sewa.total,pelanggan.nama_lengkap,denda.keterlambatan,denda.kerusakan,pengembalian.status
FROM sewa JOIN pengembalian ON pengembalian.id_sewa=sewa.id_sewa JOIN denda ON denda.id_sewa=sewa.id_sewa JOIN pelanggan ON sewa.id_pelanggan=pelanggan.id_pelanggan
WHERE pengembalian.jam_pengembalian BETWEEN '$mintgl' AND '$maxtgl' AND pengembalian.status='barang telah dikembalikan'
ORDER BY sewa.tgl_kembali ASC");

  $hitung = mysqli_num_rows($query);



  $pdf -> Cell(0,5,'Periode:'.date("d.m.Y",strtotime($_SESSION['mintgl1']))." - ".date("d.m.Y",strtotime($_SESSION['maxtgl1'])),'0','1','L',false);

  $pdf -> SetFont('Arial','B',7);
  $pdf -> Cell(8,6,'No',1,0,'C');
  $pdf -> Cell(35,6,'ID Sewa',1,0,'C');
  $pdf -> Cell(30,6,'Tanggal Pengembalian',1,0,'C');
  $pdf -> Cell(25,6,'Nama Pelanggan',1,0,'C');
  $pdf -> Cell(27,6,'Denda keterlambatan',1,0,'C');
  $pdf -> Cell(25,6,'Denda Kerusakan',1,0,'C');
  $pdf -> Cell(27,6,'Harga Sewa',1,0,'C');

  $pdf -> Ln(2);

    if ($hitung>0) {
    while ($pecah = mysqli_fetch_assoc($query)) {

  $pdf -> Ln(4);
  $pdf -> SetFont('Arial','',7);
  $pdf -> Cell(8,4,$no.".",1,0,'c');
  $pdf -> Cell(35,4,$pecah['id_sewa'],1,0,'L');
  $pdf -> Cell(30,4,date("d-m-Y",strtotime($pecah['tgl_kembali'])),1,0,'L');
  $pdf -> Cell(25,4,$pecah['nama_lengkap'],1,0,'L');
  $pdf -> Cell(27,4,rupiah($pecah['keterlambatan']),1,0,'c');
  $pdf -> Cell(25,4,rupiah($pecah['kerusakan']),1,0,'c');
  $pdf -> Cell(27,4,rupiah($pecah['total']),1,0,'c');

$no++;}}
$pdf -> Ln(4);

  $pdf -> SetFont('Arial','B',7);
  $pdf -> Cell(150,6,'Jumlah Harga Sewa',1,0,'R');
  $query1 =mysqli_query($db," SELECT SUM(total) AS total FROM sewa JOIN pengembalian ON pengembalian.id_sewa=sewa.id_sewa  WHERE pengembalian.jam_pengembalian BETWEEN '$mintgl' AND '$maxtgl' AND pengembalian.status='barang telah dikembalikan' ORDER BY pengembalian.jam_pengembalian ASC");
  $pecah1 = mysqli_fetch_assoc($query1);

  $pdf -> SetFont('Arial','B',7);
  $pdf -> Cell(27,6,rupiah($pecah1['total']),1,0,'C');

  $pdf -> Ln();

  $pdf -> SetFont('Arial','B',7);
  $pdf -> Cell(150,6,'Jumlah Denda Keterlambatan',1,0,'R');
  $query2 =mysqli_query($db," SELECT SUM(keterlambatan) AS totalketer FROM denda JOIN pengembalian ON pengembalian.id_sewa=denda.id_sewa  WHERE pengembalian.jam_pengembalian BETWEEN '$mintgl' AND '$maxtgl' AND pengembalian.status='barang telah dikembalikan' ORDER BY pengembalian.jam_pengembalian ASC");
  $pecah2 = mysqli_fetch_assoc($query2);

  $pdf -> SetFont('Arial','B',7);
  $pdf -> Cell(27,6,rupiah($pecah2['totalketer']),1,0,'C');

  $pdf -> Ln();

  $pdf -> SetFont('Arial','B',7);
  $pdf -> Cell(150,6,'Jumlah Denda Kerusakan',1,0,'R');
  $query3 =mysqli_query($db," SELECT SUM(kerusakan) AS totalkeru FROM denda JOIN pengembalian ON pengembalian.id_sewa=denda.id_sewa  WHERE pengembalian.jam_pengembalian BETWEEN '$mintgl' AND '$maxtgl' AND pengembalian.status='barang telah dikembalikan' ORDER BY pengembalian.jam_pengembalian ASC");
  $pecah3 = mysqli_fetch_assoc($query3);

  $pdf -> SetFont('Arial','B',7);
  $pdf -> Cell(27,6,rupiah($pecah3['totalkeru']),1,0,'C');

  $pdf -> Ln();

  $pdf -> SetFont('Arial','B',7);
  $pdf -> Cell(150,6,'Total',1,0,'R');
  $query3 =mysqli_query($db," SELECT SUM(denda.keterlambatan+denda.kerusakan+sewa.total) AS totalseluruh FROM denda JOIN sewa ON denda.id_sewa=sewa.id_sewa JOIN pengembalian ON pengembalian.id_sewa=denda.id_sewa  WHERE pengembalian.jam_pengembalian BETWEEN '$mintgl' AND '$maxtgl' AND pengembalian.status='barang telah dikembalikan' ORDER BY pengembalian.jam_pengembalian ASC");
  $pecah3 = mysqli_fetch_assoc($query3);

  $pdf -> SetFont('Arial','B',7);
  $pdf -> Cell(27,6,rupiah($pecah3['totalseluruh']),1,0,'C');

  $pdf->Output("laporan_penyewaan.pdf","I");
 ?>
