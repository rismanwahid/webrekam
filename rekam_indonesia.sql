-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 13, 2020 at 05:39 PM
-- Server version: 10.1.10-MariaDB
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rekam_indonesia`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `kd_barang` varchar(10) NOT NULL,
  `kd_kategori` varchar(10) NOT NULL,
  `nama_barang` varchar(80) NOT NULL,
  `gambar` varchar(300) NOT NULL,
  `harga` int(11) NOT NULL,
  `stok` int(11) NOT NULL,
  `status` enum('on','off') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`kd_barang`, `kd_kategori`, `nama_barang`, `gambar`, `harga`, `stok`, `status`) VALUES
('BRG-0001', 'KTGR-0001', 'Canon 6D Mark II', '29042019195646canon 6d.jpg', 325000, 2, 'on'),
('BRG-0003', 'KTGR-0009', 'DJI Phantom 3 Pro', '10042019174019dji phantom-3-pro.jpg', 750000, 2, 'on'),
('BRG-0004', 'KTGR-0001', 'Canon 1100D', '22042019194820canon 1100d.jpg', 80000, 2, 'on'),
('BRG-0005', 'KTGR-0001', 'Canon 1200D', '22042019194928Canon_EOS_1200D.jpg', 90000, 2, 'on'),
('BRG-0006', 'KTGR-0001', 'Canon 1300D', '22042019195054canon 1300.jpg', 100000, 2, 'on'),
('BRG-0007', 'KTGR-0001', 'Canon 550D', '22042019195304kamera-canon-550d.jpg', 100000, 2, 'on'),
('BRG-0008', 'KTGR-0001', 'Canon 600D', '22042019195439Canon_EOS_600D.jpg', 110000, 2, 'on'),
('BRG-0009', 'KTGR-0001', 'Canon 650D', '22042019195522canon-650d.jpg', 140000, 2, 'on'),
('BRG-0010', 'KTGR-0001', 'Canon 60D', '22042019195606Kamera Canon EOS 60D.JPG', 135000, 2, 'on'),
('BRG-0011', 'KTGR-0001', 'Canon 6D', '22042019195643canon 6d.jpg', 275000, 2, 'on'),
('BRG-0012', 'KTGR-0002', 'Canon M10', '22042019195946canon m10.jpg', 125000, 2, 'on'),
('BRG-0013', 'KTGR-0002', 'FujiFilm X-A10', '22042019200027fuji xa10.jpg', 120000, 2, 'on'),
('BRG-0014', 'KTGR-0002', 'FujiFilm X-A2', '22042019200103Fujifilm-X-A2.jpg', 125000, 2, 'on'),
('BRG-0015', 'KTGR-0002', 'FujiFilm X-A3', '22042019200153FujiFilm-XA3.jpg', 150000, 1, 'on'),
('BRG-0016', 'KTGR-0002', 'Sony A6000', '22042019200235Sony-A6000.jpg', 150000, 2, 'on'),
('BRG-0017', 'KTGR-0002', 'Sony A7S', '22042019200307sonny a7s.jpg', 325000, 2, 'on'),
('BRG-0018', 'KTGR-0003', 'Yi Cam', '22042019200349Yi Cam.jpg', 35000, 2, 'on'),
('BRG-0019', 'KTGR-0003', 'Go Pro Hero 4', '22042019200424gupro h4.jpg', 100000, 2, 'on'),
('BRG-0020', 'KTGR-0008', 'DJI Osmo', '22042019200500DJI-OSMO.jpg', 150000, 2, 'on'),
('BRG-0021', 'KTGR-0004', 'Lensa Canon 16-35mm F/2.8 L II USM', '22042019201043Canon-EF-35mm-f2-IS-USM-b.jpg', 175000, 3, 'on'),
('BRG-0022', 'KTGR-0004', 'Lensa Canon 10-18mm F/4.5 ', '22042019201256Canon EF-S 10-18mm.jpg', 75000, 3, 'on'),
('BRG-0023', 'KTGR-0004', 'Lensa Canon 17-40mm F/4.0 L', '22042019201452Canon_EF_17-40mm_f4L_USM.jpg', 110000, 3, 'on'),
('BRG-0024', 'KTGR-0004', 'Lensa Canon 24-70mm F/2.8 L USM', '22042019202104Canon_EF_24_70mm_f_2_8.jpg', 170000, 3, 'on'),
('BRG-0025', 'KTGR-0004', 'Lensa Canon 35mm F1.4 L', '22042019202226Canon-EF-35mm.jpg', 160000, 3, 'on'),
('BRG-0026', 'KTGR-0004', 'Lensa Canon 50mm F 1.8 STM', '22042019202405Canon-EF-50mm-f1.8-STM-Lensa-a.jpg', 50000, 3, 'on'),
('BRG-0027', 'KTGR-0004', 'Lensa Canon 50mm F 1.4 USM', '22042019202516canon ef 50mm f1.4.jpg', 75000, 3, 'on'),
('BRG-0028', 'KTGR-0004', 'Lensa Canon 50mm F 1.2 L', '22042019202643Canon-EF-50mm-f1.2-L-USM-b.jpg', 175000, 3, 'on'),
('BRG-0029', 'KTGR-0004', 'Lensa Canon 85mm F/1.2 L', '22042019202812Canon_EF_85mm_f_1_2L_II_.jpg', 150000, 3, 'on'),
('BRG-0030', 'KTGR-0004', 'Lensa Canon 85mm F/1.8 USM', '22042019202916Canon-EF-85mm-f1.8-USM-a.jpg', 85000, 3, 'on'),
('BRG-0031', 'KTGR-0004', 'Lensa Canon 100mm F/2.8 L Macro IS USM', '220420192030311000 mm f2.8 l macro is usm.jpg', 135000, 3, 'on'),
('BRG-0032', 'KTGR-0004', 'Lensa Canon 70-200mm F/2.8 L USM', '22042019203127Canon-EF-70-200mm-f2.8L-USM-c.jpg', 170000, 3, 'on'),
('BRG-0033', 'KTGR-0004', 'Lensa Canon 70-200mm F/2.8 L  IS USM', '2204201920322370-200mm f2.8 l is ii usm.jpg', 225000, 3, 'on'),
('BRG-0034', 'KTGR-0005', 'Lensa Sigma 18-35mm F/1.8 DC ART HSM ', '22042019203357Sigma 18-35mm F1.8 DC HSM ART.jpg', 150000, 3, 'on'),
('BRG-0035', 'KTGR-0005', 'Lensa Sigma 24-35mm F/2.0 ART ', '2204201920364024-35mm f2.0 art.jpg', 175000, 3, 'on'),
('BRG-0036', 'KTGR-0005', 'Lensa Sigma 24mm F/1.4 DG ART ', '2204201920373624 mm f1.4 dg art.jpg', 175000, 3, 'on'),
('BRG-0037', 'KTGR-0005', 'Lensa Sigma 35mm F/1.4 DG ART ', '22042019203845Sigma-35mm-F1.4-DG-HSM-Art.jpg', 160000, 3, 'on'),
('BRG-0038', 'KTGR-0005', 'Lensa Sigma 50mm F/1.4 DG ART ', '2204201920393050 mm f1.4 dg art.jpg', 160000, 3, 'on'),
('BRG-0039', 'KTGR-0005', 'Lensa Sigma 85mm F/1.4 DG ART ', '2204201920401385 mm ft1.4 dg art.jpg', 175000, 3, 'on'),
('BRG-0040', 'KTGR-0006', 'Lensa Sony FE 24-70mm F/4 2A', '22042019204118zeiss fe24-70mm f4 za.jpg', 170000, 3, 'on'),
('BRG-0041', 'KTGR-0006', 'Lensa Sony FE 50mm F/1.8', '22042019204204Sony-FE-50mm-f1.8-Lens-b.jpg', 75000, 3, 'on'),
('BRG-0042', 'KTGR-0007', 'Lensa Tokina AF 11-16mm F/2.8 DX', '22042019204541lensa tokina af11-16mm f2.8dx.jpg', 110000, 3, 'on'),
('BRG-0043', 'KTGR-0007', 'Lensa Tokina Fish Eye 10-17 DX', '22042019204626lensa tokina fisheye 10-17 dx.jpg', 100000, 3, 'on'),
('BRG-0044', 'KTGR-0008', 'Slider Konova K2-60', '22042019204745konova_k2_60.jpg', 75000, 3, 'on'),
('BRG-0045', 'KTGR-0008', 'Slider e-images es35', '22042019204847slider_e_image.jpg', 50000, 3, 'on'),
('BRG-0046', 'KTGR-0008', 'Zoom H1', '22042019204934zoom h1.jpg', 50000, 3, 'on'),
('BRG-0047', 'KTGR-0008', 'Zoom H4N', '22042019205025zoom h4an.jpg', 100000, 3, 'on'),
('BRG-0048', 'KTGR-0008', 'Clip-on Senheisser ew 100 q3', '22042019205123clip on senheiser ew100 q3.jpg', 150000, 3, 'on'),
('BRG-0049', 'KTGR-0008', 'Rode Videolink Clip On', '22042019205209rode videolink clipon.png', 125000, 3, 'on'),
('BRG-0050', 'KTGR-0008', 'Rode Videomic Go', '22042019205303rode_video_mic_go.jpg', 50000, 3, 'on'),
('BRG-0051', 'KTGR-0008', 'Rode Videomic Pro', '22042019205545rode pro.jpg', 100000, 3, 'on'),
('BRG-0052', 'KTGR-0008', 'Rode NTG-2', '22042019205625rode ntg-2.jpg', 100000, 3, 'on'),
('BRG-0053', 'KTGR-0008', 'Tronic Photo Studio Lighting Set', '22042019205723tronic_tronic-extreme-kit-plus-flash.jpg', 250000, 2, 'on'),
('BRG-0054', 'KTGR-0008', 'TV LED 42', '22042019205802tv led 42 inch.jpg', 250000, 3, 'on'),
('BRG-0055', 'KTGR-0008', 'Misty Fan (kipas uap)', '22042019205843kipas uap.jpg', 200000, 3, 'on'),
('BRG-0056', 'KTGR-0008', 'Trigger Lampu', '22042019210117Trigger_lampu.jpg', 40000, 3, 'on'),
('BRG-0057', 'KTGR-0008', 'Trigger Set OTT-04one', '22042019210159Trigger se oot 04one.jpg', 70000, 3, 'on'),
('BRG-0058', 'KTGR-0008', 'Trigger set Pixel King', '22042019210250pixel-king-wireless.jpg', 85000, 3, 'on'),
('BRG-0059', 'KTGR-0008', 'Tripod e-image', '22042019210325tripod e-image.jpg', 50000, 3, 'on'),
('BRG-0060', 'KTGR-0008', 'Tripod libec TH-650HD', '22042019210415tripod th-650 hd.jpg', 50000, 3, 'on'),
('BRG-0061', 'KTGR-0008', 'Tripod Vanguard 263AB', '22042019210514Vanguard_tripod.jpg', 50000, 3, 'on'),
('BRG-0062', 'KTGR-0008', 'LED A-list 1280', '22042019210554led a-list 1280.jpg', 200000, 3, 'on'),
('BRG-0063', 'KTGR-0008', 'LED AC 1000', '22042019210631led ac 1000.jpg', 175000, 3, 'on'),
('BRG-0064', 'KTGR-0008', 'LED Starlite 1500B', '22042019210719Lampu_Studio_Starlite_LED_1500B.jpg', 175000, 3, 'on'),
('BRG-0065', 'KTGR-0008', 'LED Amaran AL-H198', '22042019210813led amaran al h198.jpg', 50000, 3, 'on'),
('BRG-0066', 'KTGR-0008', 'LED Amaran AL-H199c', '22042019210925led amaran al-h199c.jpg', 75000, 3, 'on'),
('BRG-0067', 'KTGR-0008', 'LED Video Sevenoak 160B', '22042019211016led video sevenoak 160b.jpg', 50000, 3, 'on'),
('BRG-0068', 'KTGR-0008', 'Godox DE 300', '22042019211106godox de300.jpg', 250000, 3, 'on'),
('BRG-0069', 'KTGR-0008', 'Flash YN 560 II', '22042019211145flash yn 560 ii.jpg', 50000, 3, 'on'),
('BRG-0070', 'KTGR-0008', 'Mongopod iFootage', '22042019211245iFootage MogoPod.jpg', 50000, 3, 'on'),
('BRG-0071', 'KTGR-0008', 'Mongopod Benro', '22042019211327Benro-Monopod.jpg', 50000, 3, 'on'),
('BRG-0072', 'KTGR-0008', 'Benholder DS-1', '22042019211409beholder ds-1.png', 200000, 3, 'on'),
('BRG-0073', 'KTGR-0008', 'Zhiyun Crane Plus ', '22042019211550zhiyun_tech_crane_plus.jpg', 200000, 3, 'on'),
('BRG-0074', 'KTGR-0008', 'Zhiyun Crane 2', '22042019211637zhiyun_tech_crane_2.jpg', 225000, 3, 'on'),
('BRG-0075', 'KTGR-0008', 'DJI Ronin', '22042019211736dji ronin.jpg', 450000, 3, 'on'),
('BRG-0076', 'KTGR-0008', 'Fly DSLR Nano', '22042019211836fly dslr_nano.jpg', 50000, 3, 'on'),
('BRG-0077', 'KTGR-0008', 'Flycam HD5000', '22042019211914FLYCAM-HD-5000.jpg', 75000, 3, 'on');

-- --------------------------------------------------------

--
-- Table structure for table `denda`
--

CREATE TABLE `denda` (
  `id_denda` int(11) NOT NULL,
  `id_sewa` varchar(50) DEFAULT NULL,
  `keterlambatan` int(11) DEFAULT '0',
  `kerusakan` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `denda`
--

INSERT INTO `denda` (`id_denda`, `id_sewa`, `keterlambatan`, `kerusakan`) VALUES
(2, 'SW-000219052019095514', 186000, 250000),
(3, 'SW-000220052019072436', 7336000, 0),
(4, 'SW-000625062019085537', 1548000, 0),
(5, 'SW-001415072019005242', 126000, 0),
(6, 'SW-001516072019235559', 1455000, 0),
(7, 'SW-001618072019121533', 13530000, 0),
(8, 'SW-001822072019151215', 14775000, 0),
(9, 'SW-001722072019134233', 18750000, 0),
(10, 'SW-001909082019024954', 28000, 300000),
(11, 'SW-002009082019025733', 2121000, 0);

-- --------------------------------------------------------

--
-- Table structure for table `det_sewa`
--

CREATE TABLE `det_sewa` (
  `id_det_sewa` varchar(11) NOT NULL,
  `id_sewa` varchar(30) NOT NULL,
  `kd_barang` varchar(10) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `lama` float NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `det_sewa`
--

INSERT INTO `det_sewa` (`id_det_sewa`, `id_sewa`, `kd_barang`, `jumlah`, `lama`) VALUES
('52', 'SW-001617072019225712', 'BRG-0014', 1, 1),
('53', 'SW-001618072019121533', 'BRG-0011', 1, 1),
('54', 'SW-001722072019134233', 'BRG-0014', 1, 5),
('55', 'SW-001822072019151215', 'BRG-0012', 1, 1),
('56', 'SW-001822072019151215', 'BRG-0054', 1, 1),
('57', 'SW-001909082019024954', 'BRG-0009', 1, 1),
('58', 'SW-002009082019025733', 'BRG-0018', 1, 3),
('59', 'SW-002109082019222939', 'BRG-0021', 1, 2),
('60', 'SW-002210082019115507', 'BRG-0001', 1, 2),
('61', 'SW-002310082019115727', 'BRG-0004', 2, 1),
('64', 'SW-002420082019205414', 'BRG-0004', 2, 2),
('65', 'SW-002520082019223521', 'BRG-0001', 2, 3),
('66', 'SW-002621082019092521', 'BRG-0004', 1, 2),
('67', 'SW-002723082019092349', 'BRG-0001', 1, 2),
('68', 'SW-002823082019094008', 'BRG-0001', 1, 2),
('73', 'SW-002903062020173409', 'BRG-0012', 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `kd_kategori` varchar(10) NOT NULL,
  `nama_kategori` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`kd_kategori`, `nama_kategori`) VALUES
('KTGR-0001', 'Kamera DSLR'),
('KTGR-0002', 'Kamera Miroless'),
('KTGR-0003', 'Action Cam'),
('KTGR-0004', 'Lensa Canon'),
('KTGR-0005', 'Lensa Sigma'),
('KTGR-0006', 'Lensa Sony'),
('KTGR-0007', 'Lensa Tokina (EF-S Canon)'),
('KTGR-0008', 'Asesoris');

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` varchar(10) NOT NULL,
  `nama_lengkap` varchar(40) NOT NULL,
  `jk` enum('Laki-Laki','Perempuan') NOT NULL,
  `alamat` text NOT NULL,
  `no_telp` char(12) NOT NULL,
  `pekerjaan` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `nama_lengkap`, `jk`, `alamat`, `no_telp`, `pekerjaan`) VALUES
('PLG-0001', 'Risman', 'Laki-Laki', 'Karangjati      ', '0878219012', 'Mahasiswa'),
('PLG-0002', 'Erin', 'Perempuan', 'Trini', '08901212', 'Mahasiswa'),
('PLG-0003', 'Rika', 'Perempuan', 'Sleman', '08125690', 'Mahasiswa'),
('PLG-0004', 'syarif', 'Laki-Laki', 'palagan', '89988', 'Mahasiswa');

-- --------------------------------------------------------

--
-- Table structure for table `pembatalan`
--

CREATE TABLE `pembatalan` (
  `id_pembatalan` varchar(10) NOT NULL,
  `id_sewa` varchar(10) DEFAULT NULL,
  `nama_pembatalan` varchar(100) DEFAULT NULL,
  `jumlah` int(20) DEFAULT NULL,
  `tgl_masuk` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pengembalian`
--

CREATE TABLE `pengembalian` (
  `id_pengembalian` int(11) NOT NULL,
  `id_sewa` varchar(50) NOT NULL,
  `jam_pengembalian` datetime NOT NULL,
  `status` varchar(50) NOT NULL DEFAULT '-'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengembalian`
--

INSERT INTO `pengembalian` (`id_pengembalian`, `id_sewa`, `jam_pengembalian`, `status`) VALUES
(2, 'SW-000219052019095514', '2019-06-24 14:12:25', 'barang telah dikembalikan'),
(3, 'SW-000220052019072436', '2019-07-01 22:24:31', 'barang telah dikembalikan'),
(4, 'SW-000625062019085537', '2019-07-02 03:36:16', 'barang telah dikembalikan'),
(5, 'SW-001415072019005242', '2019-07-16 23:54:45', 'barang telah dikembalikan'),
(6, 'SW-001516072019235559', '2019-07-22 14:46:21', 'barang telah dikembalikan'),
(7, 'SW-001618072019121533', '2019-08-09 02:55:28', 'barang telah dikembalikan'),
(8, 'SW-001822072019151215', '2019-08-09 02:55:37', 'barang telah dikembalikan'),
(9, 'SW-001722072019134233', '2019-08-09 02:55:44', 'barang telah dikembalikan'),
(10, 'SW-001909082019024954', '2019-08-10 11:59:48', 'barang telah dikembalikan'),
(11, 'SW-002009082019025733', '2019-08-20 22:42:02', 'barang telah dikembalikan');

-- --------------------------------------------------------

--
-- Table structure for table `petugas`
--

CREATE TABLE `petugas` (
  `id_petugas` varchar(10) NOT NULL,
  `nama_lengkap` varchar(40) NOT NULL,
  `alamat` text NOT NULL,
  `email` varchar(30) NOT NULL,
  `no_telp` char(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `petugas`
--

INSERT INTO `petugas` (`id_petugas`, `nama_lengkap`, `alamat`, `email`, `no_telp`) VALUES
('PTGS-0001', 'Gilang', 'Karangjati', 'gilang@rekam.com', '098912109'),
('PTGS-0002', 'Yuyun', 'Trini', 'yuyun@rekam.com', '089122121');

-- --------------------------------------------------------

--
-- Table structure for table `sewa`
--

CREATE TABLE `sewa` (
  `id_sewa` varchar(50) NOT NULL,
  `tgl_transaksi` date NOT NULL,
  `id_pelanggan` varchar(10) NOT NULL,
  `tgl_pinjam` datetime NOT NULL,
  `tgl_kembali` datetime NOT NULL,
  `lama` float DEFAULT NULL,
  `jaminan` varchar(30) NOT NULL,
  `total` int(11) NOT NULL,
  `gambar_resi` varchar(450) DEFAULT NULL,
  `keterangan` enum('lunas','barang_diambil','dp','belum_lunas','barang telah dikembalikan') NOT NULL DEFAULT 'belum_lunas'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sewa`
--

INSERT INTO `sewa` (`id_sewa`, `tgl_transaksi`, `id_pelanggan`, `tgl_pinjam`, `tgl_kembali`, `lama`, `jaminan`, `total`, `gambar_resi`, `keterangan`) VALUES
('SW-001618072019121533', '2019-07-18', 'PLG-0001', '2019-07-18 14:00:00', '2019-07-19 14:00:00', 1, 'ktp', 275000, '18072019181846Capture.PNG', 'barang telah dikembalikan'),
('SW-001722072019134233', '2019-07-22', 'PLG-0001', '2019-07-22 14:00:00', '2019-07-27 14:00:00', 5, 'ktp', 625000, '22072019135155pel.png', 'barang telah dikembalikan'),
('SW-001822072019151215', '2019-07-22', 'PLG-0004', '2019-07-22 16:00:00', '2019-07-23 16:00:00', 1, 'ktp', 375000, '22072019152656bar.png', 'barang telah dikembalikan'),
('SW-001909082019024954', '2019-08-09', 'PLG-0001', '2019-08-09 09:00:00', '2019-08-10 09:00:00', 1, 'ktp', 140000, '09082019025354Annotation 2019-07-01 154055.png', 'barang telah dikembalikan'),
('SW-002009082019025733', '2019-08-09', 'PLG-0004', '2019-08-09 12:00:00', '2019-08-12 12:00:00', 3, 'ktp', 105000, '09082019025912bar.png', 'barang telah dikembalikan'),
('SW-002109082019222939', '2019-08-09', 'PLG-0001', '2019-08-09 09:00:00', '2019-08-11 09:00:00', 2, 'ktp', 350000, '090820192245565619C909-51B8-4413-A2EF-48814BA517CD.JPG', 'belum_lunas'),
('SW-002210082019115507', '2019-08-10', 'PLG-0001', '2019-08-10 13:00:00', '2019-08-12 13:00:00', 2, 'ktp', 650000, '100820191158175619C909-51B8-4413-A2EF-48814BA517CD.JPG', 'barang_diambil'),
('SW-002310082019115727', '2019-08-10', 'PLG-0001', '2019-08-13 13:00:00', '2019-08-15 13:00:00', 2, 'ktp', 160000, NULL, 'belum_lunas'),
('SW-002420082019205414', '2019-08-20', 'PLG-0001', '2019-08-20 13:00:00', '2019-08-22 00:00:00', 2, 'ktp', 320000, NULL, 'belum_lunas'),
('SW-002520082019223521', '2019-08-20', 'PLG-0001', '2019-08-20 13:00:00', '2019-08-23 13:00:00', 3, 'ktp', 1950000, '200820192240275619C909-51B8-4413-A2EF-48814BA517CD (1).JPG', 'belum_lunas'),
('SW-002621082019092521', '2019-08-21', 'PLG-0001', '2019-08-22 13:00:00', '2019-08-24 13:00:00', 2, 'ktp', 160000, '210820190926455619C909-51B8-4413-A2EF-48814BA517CD.JPG', 'belum_lunas'),
('SW-002723082019092349', '2019-08-23', 'PLG-0001', '2019-08-23 13:00:00', '2019-08-25 13:00:00', 2, 'ktp', 650000, NULL, 'belum_lunas'),
('SW-002823082019094008', '2019-08-23', 'PLG-0001', '2019-08-23 13:00:00', '2019-08-25 13:00:00', 2, 'ktp', 650000, NULL, 'dp'),
('SW-002903062020173409', '2020-06-03', 'PLG-0002', '2020-06-03 12:00:00', '2020-06-05 12:00:00', 2, 'ktp', 250000, NULL, 'belum_lunas');

-- --------------------------------------------------------

--
-- Table structure for table `tmp_detsewa`
--

CREATE TABLE `tmp_detsewa` (
  `id_det_sewa` int(11) NOT NULL,
  `id_sewa` varchar(30) DEFAULT NULL,
  `kd_barang` varchar(10) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `lama` float DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tmp_detsewa`
--

INSERT INTO `tmp_detsewa` (`id_det_sewa`, `id_sewa`, `kd_barang`, `jumlah`, `lama`) VALUES
(5, 'SW-000201052019183529', 'BRG-0003', 1, 1),
(6, 'SW-000203052019163510', 'BRG-0066', 1, 1),
(7, 'SW-000203052019164303', 'BRG-0035', 1, 1),
(8, 'SW-000203052019172009', 'BRG-0045', 1, 1),
(9, 'SW-000203052019172009', 'BRG-0019', 1, 1),
(11, 'SW-000214052019125911', 'BRG-0023', 1, 1),
(12, 'SW-000214052019125911', 'BRG-0074', 1, 1),
(14, 'SW-000217052019225415', 'BRG-0067', 1, 1),
(15, 'SW-000219052019095514', 'BRG-0008', 1, 3),
(16, 'SW-000219052019095514', 'BRG-0055', 1, 3),
(17, 'SW-000220052019111721', 'BRG-0007', 1, 0.5),
(18, 'SW-000220052019112429', 'BRG-0035', 1, 3),
(19, 'SW-000220052019114057', 'BRG-0013', 1, 1),
(20, 'SW-000220052019072436', 'BRG-0009', 1, 4),
(21, 'SW-000326052019222608', 'BRG-0059', 1, 1),
(22, '<br />\r\n<b>Notice</b>:  Undefi', 'BRG-0050', 1, 1),
(23, 'SW-000308062019105401', 'BRG-0014', 1, 2),
(24, 'SW-000425062019025700', 'BRG-0077', 1, 2),
(25, 'SW-000525062019082436', 'BRG-0032', 1, 3),
(26, 'SW-000525062019083059', 'BRG-0048', 1, 1),
(27, 'SW-000625062019034908', 'BRG-0034', 1, 1),
(28, 'SW-000625062019035410', 'BRG-0035', 1, 1),
(29, 'SW-000625062019085537', 'BRG-0005', 1, 2),
(30, 'SW-000725062019050014', 'BRG-0070', 1, 2),
(31, 'SW-000725062019050014', 'BRG-0034', 1, 2),
(32, 'SW-000825062019100638', 'BRG-0070', 1, 3),
(33, 'SW-000928062019185221', 'BRG-0008', 1, 1),
(34, 'SW-000929062019184942', 'BRG-0072', 2, 1),
(35, 'SW-000929062019184942', 'BRG-0013', 1, 1),
(36, 'SW-000901072019212858', 'BRG-0008', 1, 2),
(37, 'SW-001002072019225238', 'BRG-0067', 1, 6),
(38, 'SW-001103072019194638', 'BRG-0048', 1, 1),
(41, 'SW-001103072019200106', 'BRG-0007', 1, 2),
(44, 'SW-001105072019044921', 'BRG-0055', 1, 1),
(45, 'SW-001208072019225956', 'BRG-0028', 1, 1),
(46, 'SW-001312072019205014', 'BRG-0073', 1, 1),
(47, 'SW-001412072019223259', 'BRG-0035', 1, 1),
(48, 'SW-001412072019223259', 'BRG-0063', 1, 1),
(49, 'SW-001412072019224316', 'BRG-0036', 1, 1),
(50, 'SW-001415072019005242', 'BRG-0005', 1, 1),
(51, 'SW-001516072019235559', 'BRG-0015', 1, 1),
(52, 'SW-001617072019225712', 'BRG-0014', 1, 1),
(53, 'SW-001618072019121533', 'BRG-0011', 1, 1),
(54, 'SW-001722072019134233', 'BRG-0014', 1, 5),
(55, 'SW-001822072019151215', 'BRG-0012', 1, 1),
(56, 'SW-001822072019151215', 'BRG-0054', 1, 1),
(57, 'SW-001909082019024954', 'BRG-0009', 1, 1),
(58, 'SW-002009082019025733', 'BRG-0018', 1, 3),
(59, 'SW-002109082019222939', 'BRG-0021', 1, 2),
(60, 'SW-002210082019115507', 'BRG-0001', 1, 2),
(61, 'SW-002310082019115727', 'BRG-0004', 2, 1),
(64, 'SW-002420082019205414', 'BRG-0004', 2, 2),
(65, 'SW-002520082019223521', 'BRG-0001', 2, 3),
(66, 'SW-002621082019092521', 'BRG-0004', 1, 2),
(67, 'SW-002723082019092349', 'BRG-0001', 1, 2),
(68, 'SW-002823082019094008', 'BRG-0001', 1, 2),
(69, 'SW-002912022020221652', 'BRG-0021', 1, 1),
(70, 'SW-002922022020004019', 'BRG-0001', 1, 1),
(71, 'SW-002904042020145641', 'BRG-0012', 1, 1),
(72, 'SW-002904042020145641', 'BRG-0018', 1, 8),
(73, 'SW-002903062020173409', 'BRG-0012', 1, 2),
(74, 'SW-003016062020233013', 'BRG-0018', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` varchar(10) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(100) NOT NULL,
  `level` enum('petugas','owner','pelanggan') DEFAULT NULL,
  `status` enum('on','off') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `level`, `status`) VALUES
('owner', 'owner', '123', 'owner', 'on'),
('PLG-0001', 'pelanggan', '123', 'pelanggan', 'on'),
('PLG-0002', 'erin', '123', 'pelanggan', 'on'),
('PLG-0003', 'rika', '123', 'pelanggan', 'on'),
('PLG-0004', 'syarif', '123', 'pelanggan', 'on'),
('PTGS-0001', 'admin', '123', 'petugas', 'on'),
('PTGS-0002', 'yuyun', '123', 'petugas', 'on');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`kd_barang`),
  ADD KEY `FK_barang` (`kd_kategori`);

--
-- Indexes for table `denda`
--
ALTER TABLE `denda`
  ADD PRIMARY KEY (`id_denda`),
  ADD KEY `FK_denda` (`id_sewa`);

--
-- Indexes for table `det_sewa`
--
ALTER TABLE `det_sewa`
  ADD PRIMARY KEY (`id_det_sewa`),
  ADD KEY `FK_det_sewa` (`id_sewa`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`kd_kategori`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indexes for table `pembatalan`
--
ALTER TABLE `pembatalan`
  ADD PRIMARY KEY (`id_pembatalan`),
  ADD KEY `FK_pembatalan` (`id_sewa`);

--
-- Indexes for table `pengembalian`
--
ALTER TABLE `pengembalian`
  ADD PRIMARY KEY (`id_pengembalian`),
  ADD KEY `FK_pengembalian` (`id_sewa`);

--
-- Indexes for table `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`id_petugas`);

--
-- Indexes for table `sewa`
--
ALTER TABLE `sewa`
  ADD PRIMARY KEY (`id_sewa`),
  ADD KEY `kode_produk` (`tgl_transaksi`),
  ADD KEY `FK_sewa_idpelanggan` (`id_pelanggan`);

--
-- Indexes for table `tmp_detsewa`
--
ALTER TABLE `tmp_detsewa`
  ADD PRIMARY KEY (`id_det_sewa`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `denda`
--
ALTER TABLE `denda`
  MODIFY `id_denda` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `pengembalian`
--
ALTER TABLE `pengembalian`
  MODIFY `id_pengembalian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `tmp_detsewa`
--
ALTER TABLE `tmp_detsewa`
  MODIFY `id_det_sewa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `pembatalan`
--
ALTER TABLE `pembatalan`
  ADD CONSTRAINT `FK_pembatalan` FOREIGN KEY (`id_sewa`) REFERENCES `sewa` (`id_sewa`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
