-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 30, 2021 at 04:53 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `asetae2`
--

-- --------------------------------------------------------

--
-- Table structure for table `alat`
--

CREATE TABLE `alat` (
  `id_pesan` int(11) NOT NULL,
  `id_lab` varchar(2) NOT NULL,
  `id_jenis` varchar(2) NOT NULL,
  `kode_alat` varchar(2) NOT NULL,
  `no_alat` varchar(12) NOT NULL,
  `nama_alat` varchar(59) NOT NULL,
  `berat_alat` int(11) NOT NULL,
  `harga_alat` double NOT NULL,
  `status_alat` varchar(15) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `alat`
--

INSERT INTO `alat` (`id_pesan`, `id_lab`, `id_jenis`, `kode_alat`, `no_alat`, `nama_alat`, `berat_alat`, `harga_alat`, `status_alat`, `created_date`) VALUES
(1, '07', '01', '01', '07.01.01.001', 'Komputer', 2000, 5000000, 'Ada', '2021-09-28 19:19:31'),
(1, '07', '01', '01', '07.01.01.002', 'Komputer', 2000, 5000000, 'Ada', '2021-09-29 09:01:47'),
(1, '07', '01', '01', '07.01.01.003', 'Komputer', 2000, 5000000, 'Ada', '2021-09-29 09:02:21'),
(5, '07', '01', '01', '07.01.01.004', 'Komputer', 2000, 5200000, 'Ada', '2021-09-29 09:03:09'),
(5, '07', '01', '01', '07.01.01.005', 'Komputer', 2000, 5200000, 'Ada', '2021-09-29 09:05:14'),
(5, '07', '01', '01', '07.01.01.006', 'Komputer', 2000, 5200000, 'Ada', '2021-09-28 17:09:00'),
(20, '07', '01', '01', '07.01.01.007', 'Komputer', 10000, 4500000, 'Ada', '2021-09-29 09:21:25'),
(20, '07', '01', '01', '07.01.01.008', 'Komputer', 10000, 4500000, 'Ada', '2021-09-29 09:21:25'),
(20, '07', '01', '01', '07.01.01.009', 'Komputer', 10000, 4500000, 'Ada', '2021-09-29 09:21:25'),
(21, '07', '01', '01', '07.01.01.010', 'Komputer', 10000, 1250000, 'Ada', '2021-09-29 09:22:00'),
(21, '07', '01', '01', '07.01.01.011', 'Komputer', 10000, 1250000, 'Ada', '2021-09-29 09:22:00'),
(21, '07', '01', '01', '07.01.01.012', 'Komputer', 10000, 1250000, 'Ada', '2021-09-29 09:22:00'),
(21, '07', '01', '01', '07.01.01.013', 'Komputer', 10000, 1250000, 'Ada', '2021-09-29 09:22:00'),
(21, '07', '01', '01', '07.01.01.014', 'Komputer', 10000, 1250000, 'Ada', '2021-09-29 09:22:00'),
(23, '07', '01', '01', '07.01.01.015', 'Komputer', 10000, 0, 'Ada', '2021-09-29 09:23:18'),
(23, '07', '01', '01', '07.01.01.016', 'Komputer', 10000, 0, 'Ada', '2021-09-29 09:23:18'),
(23, '07', '01', '01', '07.01.01.017', 'Komputer', 10000, 0, 'Ada', '2021-09-29 09:23:18'),
(23, '07', '01', '01', '07.01.01.018', 'Komputer', 10000, 0, 'Ada', '2021-09-29 09:23:18'),
(23, '07', '01', '01', '07.01.01.019', 'Komputer', 10000, 0, 'Ada', '2021-09-29 09:23:18'),
(23, '07', '01', '01', '07.01.01.020', 'Komputer', 10000, 0, 'Ada', '2021-09-29 09:23:18'),
(23, '07', '01', '01', '07.01.01.021', 'Komputer', 10000, 0, 'Ada', '2021-09-29 09:23:18'),
(23, '07', '01', '01', '07.01.01.022', 'Komputer', 10000, 0, 'Ada', '2021-09-29 09:23:18'),
(23, '07', '01', '01', '07.01.01.023', 'Komputer', 10000, 0, 'Ada', '2021-09-29 09:23:18'),
(23, '07', '01', '01', '07.01.01.024', 'Komputer', 10000, 0, 'Ada', '2021-09-29 09:23:18'),
(3, '07', '01', '03', '07.01.03.001', 'Keyboard', 400, 250000, 'Ada', '2021-09-28 17:10:16'),
(3, '07', '01', '03', '07.01.03.002', 'Keyboard', 400, 250000, 'Ada', '2021-09-28 17:10:16'),
(3, '07', '01', '03', '07.01.03.003', 'Keyboard', 400, 250000, 'Ada', '2021-09-28 17:10:16'),
(4, '07', '01', '04', '07.01.04.001', 'Mouse dan Receiver', 300, 200000, 'Ada', '2021-09-28 17:10:16'),
(4, '07', '01', '04', '07.01.04.002', 'Mouse dan Receiver', 300, 200000, 'Ada', '2021-09-28 17:10:16'),
(4, '07', '01', '04', '07.01.04.003', 'Mouse dan Receiver', 300, 200000, 'Ada', '2021-09-28 17:10:16'),
(14, '07', '02', '', '07.02..001', '', 1000, 0, 'Ada', '2021-09-29 08:33:36'),
(14, '07', '02', '', '07.02..002', '', 1000, 0, 'Ada', '2021-09-29 08:33:36'),
(14, '07', '02', '', '07.02..003', '', 1000, 0, 'Ada', '2021-09-29 08:33:36'),
(14, '07', '02', '', '07.02..004', '', 1000, 0, 'Ada', '2021-09-29 08:33:36'),
(14, '07', '02', '', '07.02..005', '', 1000, 0, 'Ada', '2021-09-29 08:33:36'),
(2, '07', '02', '01', '07.02.01.001', 'Multimeter', 400, 300000, 'Ada', '2021-09-28 17:10:16'),
(2, '07', '02', '01', '07.02.01.002', 'Multimeter', 400, 300000, 'Ada', '2021-09-28 17:10:16'),
(2, '07', '02', '01', '07.02.01.003', 'Multimeter', 400, 300000, 'Ada', '2021-09-28 17:10:16'),
(2, '07', '02', '01', '07.02.01.004', 'Multimeter', 400, 300000, 'Ada', '2021-09-28 17:10:16'),
(22, '07', '02', '01', '07.02.01.005', 'Multimeter', 1000, 0, 'Ada', '2021-09-29 09:19:28'),
(22, '07', '02', '01', '07.02.01.006', 'Multimeter', 1000, 0, 'Ada', '2021-09-29 09:19:28'),
(22, '07', '02', '01', '07.02.01.007', 'Multimeter', 1000, 0, 'Ada', '2021-09-29 09:19:28'),
(22, '07', '02', '01', '07.02.01.008', 'Multimeter', 1000, 0, 'Ada', '2021-09-29 09:19:28'),
(22, '07', '02', '01', '07.02.01.009', 'Multimeter', 1000, 0, 'Ada', '2021-09-29 09:19:28'),
(18, '', '04', '02', '07.04.02.001', 'Kursi Praktikum', 1000, 0, 'Ada', '2021-09-29 09:10:05'),
(18, '', '04', '02', '07.04.02.002', 'Kursi Praktikum', 1000, 0, 'Ada', '2021-09-29 09:10:05'),
(18, '', '04', '02', '07.04.02.003', 'Kursi Praktikum', 1000, 0, 'Ada', '2021-09-29 09:10:05'),
(18, '', '04', '02', '07.04.02.004', 'Kursi Praktikum', 1000, 0, 'Ada', '2021-09-29 09:10:05'),
(18, '', '04', '02', '07.04.02.005', 'Kursi Praktikum', 1000, 0, 'Ada', '2021-09-29 09:10:05'),
(18, '', '04', '02', '07.04.02.006', 'Kursi Praktikum', 1000, 0, 'Ada', '2021-09-29 09:10:05'),
(18, '', '04', '02', '07.04.02.007', 'Kursi Praktikum', 1000, 0, 'Ada', '2021-09-29 09:10:05'),
(18, '', '04', '02', '07.04.02.008', 'Kursi Praktikum', 1000, 0, 'Ada', '2021-09-29 09:10:05'),
(18, '', '04', '02', '07.04.02.009', 'Kursi Praktikum', 1000, 0, 'Ada', '2021-09-29 09:10:05'),
(18, '', '04', '02', '07.04.02.010', 'Kursi Praktikum', 1000, 0, 'Ada', '2021-09-29 09:10:05'),
(6, '14', '01', '01', '14.01.01.001', 'Meja Praktikum', 10000, 6000000, 'Ada', '2021-09-28 17:10:58'),
(6, '14', '01', '01', '14.01.01.002', 'Meja Praktikum', 10000, 6000000, 'Ada', '2021-09-28 17:10:58'),
(6, '14', '01', '01', '14.01.01.003', 'Meja Praktikum', 10000, 6000000, 'Ada', '2021-09-28 17:10:58'),
(11, '14', '01', '01', '14.01.01.004', 'Meja Praktikum', 10000, 6000000, 'Ada', '2021-09-28 17:25:07'),
(11, '14', '01', '01', '14.01.01.005', 'Meja Praktikum', 10000, 6000000, 'Ada', '2021-09-28 17:25:07'),
(7, '14', '01', '03', '14.01.03.001', 'Rak', 20000, 0, 'Ada', '2021-09-28 17:10:58'),
(7, '14', '01', '03', '14.01.03.002', 'Rak', 20000, 0, 'Ada', '2021-09-28 17:10:58'),
(7, '14', '01', '03', '14.01.03.003', 'Rak', 20000, 0, 'Ada', '2021-09-28 17:10:58');

-- --------------------------------------------------------

--
-- Table structure for table `jenisalat`
--

CREATE TABLE `jenisalat` (
  `kode_jenis` int(11) NOT NULL,
  `id_jenis` varchar(2) NOT NULL,
  `id_lab` varchar(10) NOT NULL,
  `jenis_alat` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jenisalat`
--

INSERT INTO `jenisalat` (`kode_jenis`, `id_jenis`, `id_lab`, `jenis_alat`) VALUES
(1, '01', '14', 'Mebel'),
(2, '02', '14', 'Alat Praktikum'),
(3, '03', '14', 'Alat Elektronik'),
(4, '01', '07', 'Alat Elektronik'),
(5, '02', '07', 'Alat Ukur'),
(6, '03', '07', 'Alat Pendukung'),
(7, '04', '07', 'Mebel'),
(8, '05', '07', 'Tempat Penyimpanan');

-- --------------------------------------------------------

--
-- Table structure for table `jurusan`
--

CREATE TABLE `jurusan` (
  `id_kajur` int(5) NOT NULL,
  `id_user` int(5) NOT NULL,
  `nama_jurusan` varchar(100) NOT NULL,
  `ttd_kajur` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jurusan`
--

INSERT INTO `jurusan` (`id_kajur`, `id_user`, `nama_jurusan`, `ttd_kajur`) VALUES
(1, 2, 'Teknik Otomasi Manufaktur dan Mekatronika', 'kajur.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `laboratorium`
--

CREATE TABLE `laboratorium` (
  `id_lab` varchar(10) NOT NULL,
  `id_kajur` int(5) NOT NULL,
  `id_user` int(5) NOT NULL,
  `nama_lab` varchar(50) NOT NULL,
  `nama_kalab` varchar(50) NOT NULL,
  `nama_plp` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `total_anggaran` int(11) NOT NULL,
  `ttd_kalab` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `laboratorium`
--

INSERT INTO `laboratorium` (`id_lab`, `id_kajur`, `id_user`, `nama_lab`, `nama_kalab`, `nama_plp`, `password`, `total_anggaran`, `ttd_kalab`) VALUES
('01', 1, 6, 'Sistem Tekanan', 'Adhitya Sumardi S.', 'Afaf', 'b9ba49ab433bba7fdf481a7a6f4b4231', 20000000, 'Screenshot (413).png'),
('05', 1, 8, 'Digital', 'Dr. Setiawan Ajie Sukarno, S.ST., M.T.', 'Mahasiswa PPI', 'd08f0e049fcf0d1d0c85fe3808c1d0c3', 20000000, 'Lab. Sistem Digital dan Pengolahan Sinyal.jpg'),
('07', 1, 5, 'Informatika', 'Gun Gun Maulana, S.Pd., M.T.', 'Mahasiswa PPI', 'eae80f5c2e602599f0d92e511fe17142', 80250000, 'Lab. Komputer dan Informatika.jpg'),
('13', 1, 7, 'Elektro Mekanik', 'Ruminto Subekti, SST., MT.', 'Mahasiswa PPI', 'e6fc2a33142be6d40cebca54bd75c494', 30000000, 'Lab. Manufaktur Mekatronika.jpg'),
('14', 1, 5, 'Komputer', 'Gun Gun Maulana, S.Pd., M.T.', 'Mahasiswa PPI', '46aecbb09eb78471bfd9d91886940220', 56600000, 'Lab. Komputer dan Informatika.jpg'),
('15', 1, 6, 'Robotik', 'Adhitya Sumardi S.', 'Mahasiswa PPI', 'e42f0e73303204fb5b4f78a9ea35c4da', 200000000, 'utama.png');

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `nim` varchar(9) NOT NULL,
  `nama_mhs` varchar(50) NOT NULL,
  `no_koin` varchar(6) NOT NULL,
  `kelas` varchar(4) NOT NULL,
  `status` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`nim`, `nama_mhs`, `no_koin`, `kelas`, `status`) VALUES
('220441910', 'Neta Bening Sitoresmi', 'MO410', '4AEE', 'Aktif'),
('220441913', 'Wening Sukma Saraswati', 'MO413', '4AEE', 'Aktif'),
('220441914', 'Zahra Zaafir', 'MO414', '4AEE', 'Aktif'),
('220441915', 'Zulfa Nurfajri Sani', 'MO415', '4AEE', 'Aktif');

-- --------------------------------------------------------

--
-- Table structure for table `masteralat`
--

CREATE TABLE `masteralat` (
  `id_master` int(11) NOT NULL,
  `id_lab` varchar(10) NOT NULL,
  `id_jenis` varchar(2) NOT NULL,
  `kode_alat` varchar(2) NOT NULL,
  `nama_alat` varchar(50) NOT NULL,
  `warna` varchar(50) NOT NULL,
  `ukuran` int(11) NOT NULL,
  `foto` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `masteralat`
--

INSERT INTO `masteralat` (`id_master`, `id_lab`, `id_jenis`, `kode_alat`, `nama_alat`, `warna`, `ukuran`, `foto`) VALUES
(1, '07', '01', '01', 'Komputer', 'Hitam', 50, 'komputer.jpg'),
(2, '07', '02', '01', 'Multimeter', '', 0, ''),
(3, '07', '03', '01', 'TV LED Sony', '', 0, ''),
(4, '05', '', '04', 'USB', '', 0, ''),
(5, '05', '', '05', 'ATMEGA', '', 0, ''),
(6, '05', '', '06', 'AVR', '', 0, ''),
(7, '13', '01', '01', 'Kunci Shock', '', 0, ''),
(8, '13', '01', '02', 'Kuas', '', 0, ''),
(9, '07', '01', '02', 'Kabel Power', '', 0, ''),
(10, '07', '01', '03', 'Keyboard', 'Hitam', 60, 'keyboard.jpeg'),
(11, '07', '01', '04', 'Mouse dan Receiver', 'Hitam', 10, 'mouse.jpg'),
(12, '07', '01', '05', 'Terminal Block', '', 0, ''),
(13, '07', '01', '06', 'Base Komputer', '', 0, ''),
(14, '07', '03', '02', 'Kabel HDMI', '', 0, ''),
(15, '07', '04', '01', 'Meja Praktikum', '', 0, 'mejapraktikum.jpg'),
(16, '07', '04', '02', 'Kursi Praktikum', '', 0, ''),
(17, '07', '05', '01', 'Lemari Dokumen', '', 0, ''),
(18, '14', '01', '01', 'Meja Praktikum', 'Coklat', 150, 'mejapraktikum.jpg'),
(19, '14', '01', '02', 'Meja Full Set', '', 0, ''),
(20, '14', '01', '03', 'Rak', 'Biru', 200, 'rak.png'),
(21, '14', '', '01', 'Kursi Hitam', '', 0, ''),
(22, '14', '', '02', 'Kursi Biru', '', 0, ''),
(23, '14', '', '01', 'Monitor LCD Acer', '', 0, ''),
(24, '14', '', '02', 'Monitor LCD Philips', '', 0, ''),
(25, '14', '', '01', 'Keyboard Acer', '', 0, ''),
(26, '14', '', '02', 'Keyboard Logitech', '', 0, ''),
(27, '14', '', '03', 'Keyboard Compact', '', 0, ''),
(28, '14', '', '01', 'Personal Computer SimX Simbadda', '', 0, ''),
(29, '14', '', '02', 'Personal Komputer Simbadda', '', 0, ''),
(30, '14', '', '03', 'Personal Computer Acer', '', 0, ''),
(31, '14', '', '04', 'Personal Computer Compact', '', 0, ''),
(32, '14', '', '01', 'Mouse Acer', '', 0, ''),
(33, '14', '', '02', 'Mouse Logitech', '', 0, ''),
(34, '14', '', '03', 'Mouse Pad', '', 0, ''),
(35, '14', '', '01', 'AC TLC', '', 0, ''),
(36, '14', '', '02', 'Remote AC TLC', '', 0, ''),
(37, '14', '', '01', 'Proyektor Acer', '', 0, ''),
(38, '14', '', '01', 'Spidol Hitam', '', 0, ''),
(39, '14', '', '02', 'Spidol Hijau', '', 0, ''),
(40, '14', '', '03', 'Spidol Biru', '', 0, ''),
(41, '14', '', '04', 'Spidol Merah', '', 0, ''),
(42, '14', '', '05', 'Papan Tulis', '', 0, ''),
(43, '14', '', '01', 'Terminal', '', 0, ''),
(44, '14', '', '01', 'Kabel LAN', '', 0, ''),
(45, '14', '', '01', 'Allied Telesis', '', 0, ''),
(46, '14', '', '01', 'Sapu', '', 0, ''),
(47, '14', '', '02', 'Lap Pel', '', 0, ''),
(48, '14', '', '01', 'Speaker Acer', '', 0, ''),
(49, '14', '', '01', 'Supreme Cable 100m', '', 0, ''),
(50, '14', '', '01', 'Jam Dinding', '', 0, ''),
(51, '13', '01', '03', 'Sekrap Tangan', '', 0, ''),
(52, '13', '01', '04', 'Palu Plastik', '', 0, ''),
(53, '13', '01', '05', 'Tang Pemotong', '', 0, ''),
(54, '13', '01', '06', 'Kunci Chuck Bor', '', 0, ''),
(55, '13', '01', '07', 'Jangka Sorong', '', 0, ''),
(56, '13', '01', '08', 'Kacamata', '', 0, ''),
(57, '13', '01', '09', 'Kunci Pas', '', 0, ''),
(58, '13', '01', '10', 'Penitik', '', 0, ''),
(59, '07', '04', '03', 'Kursi Kayu', 'Coklat', 50, 'utama.png'),
(60, '07', '04', '04', 'Kursi Biru', 'Biru', 50, 'Screenshot (413).png'),
(61, '07', '02', '03', 'Ampere Meter', 'Hitam', 25, 'Screenshot (412).png'),
(62, '07', '02', '04', 'Ohm Meter', 'Hitam', 25, 'Screenshot (411).png');

-- --------------------------------------------------------

--
-- Table structure for table `pemesanan`
--

CREATE TABLE `pemesanan` (
  `id_pesan` int(11) NOT NULL,
  `id_lab` varchar(10) NOT NULL,
  `jumlah_pesan` int(11) NOT NULL,
  `tgl_pesan` date NOT NULL,
  `total_kisaran_hargapesan` double NOT NULL,
  `jml_total_kisaran_hargapesan` double NOT NULL,
  `disetujui` tinyint(1) NOT NULL,
  `disetujui_kajur` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pemesanan`
--

INSERT INTO `pemesanan` (`id_pesan`, `id_lab`, `jumlah_pesan`, `tgl_pesan`, `total_kisaran_hargapesan`, `jml_total_kisaran_hargapesan`, `disetujui`, `disetujui_kajur`) VALUES
(1, '07', 3, '2021-09-27', 0, 0, 1, 1),
(2, '07', 4, '2021-09-27', 0, 0, 1, 1),
(3, '07', 3, '2021-09-27', 0, 0, 1, 1),
(4, '07', 3, '2021-09-27', 0, 0, 1, 1),
(5, '07', 3, '2021-09-27', 5000000, 15000000, 1, 1),
(6, '14', 3, '2021-09-28', 0, 0, 1, 1),
(7, '14', 3, '2021-09-28', 0, 0, 1, 1),
(11, '14', 2, '2021-09-28', 6000000, 12000000, 1, 1),
(12, '07', 5, '2021-09-29', 250000, 1250000, 0, 0),
(13, '07', 5, '2021-09-29', 300000, 1500000, 0, 0),
(14, '07', 5, '2021-09-29', 0, 0, 0, 0),
(15, '07', 5, '2021-09-29', 5200000, 26000000, 0, 0),
(16, '07', 5, '2021-09-29', 5200000, 26000000, 0, 0),
(17, '07', 5, '2021-09-29', 5200000, 26000000, 0, 0),
(18, '07', 10, '2021-09-29', 0, 0, 0, 0),
(19, '07', 2, '2021-09-29', 0, 0, 0, 0),
(20, '07', 3, '2021-09-29', 5200000, 15600000, 1, 1),
(21, '07', 5, '2021-09-29', 0, 0, 1, 1),
(22, '07', 5, '2021-09-29', 300000, 1500000, 1, 1),
(23, '07', 10, '2021-09-29', 1250000, 12500000, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `peminjaman`
--

CREATE TABLE `peminjaman` (
  `id_pinjam` int(11) NOT NULL,
  `id_lab` varchar(10) NOT NULL,
  `no_alat` varchar(12) NOT NULL,
  `nim` varchar(9) NOT NULL,
  `nama_keperluan` varchar(25) NOT NULL,
  `tgl_pinjam` date NOT NULL,
  `jam_pinjam` time NOT NULL,
  `tgl_seharusnya` date NOT NULL,
  `tgl_selesai` date NOT NULL,
  `jam_selesai` time NOT NULL,
  `kembali` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `peminjaman`
--

INSERT INTO `peminjaman` (`id_pinjam`, `id_lab`, `no_alat`, `nim`, `nama_keperluan`, `tgl_pinjam`, `jam_pinjam`, `tgl_seharusnya`, `tgl_selesai`, `jam_selesai`, `kembali`) VALUES
(1, '07', '07.01.01.001', '220441914', 'Praktikum PGT', '2021-09-28', '02:12:09', '2021-10-03', '2021-09-28', '02:19:31', 1),
(2, '07', '07.01.01.001', '220441914', 'Praktikum PGT', '2021-09-28', '02:12:36', '2021-10-03', '2021-09-28', '02:19:44', 1),
(3, '07', '07.01.01.001', '220441914', 'Praktikum PGT', '2021-09-28', '02:17:14', '2021-10-03', '2021-09-28', '02:20:23', 1),
(4, '07', '07.01.01.002', '220441914', 'Praktikum LPK', '2021-09-28', '02:21:04', '2021-10-03', '2021-09-29', '16:01:47', 1),
(5, '07', '07.01.01.003', '220441915', 'Praktikum LPK', '2021-09-28', '02:23:57', '2021-10-03', '2021-09-29', '16:02:21', 1),
(6, '07', '07.01.01.004', '220441910', 'Praktikum LPK', '2021-09-29', '14:12:02', '2021-10-04', '2021-09-29', '16:03:09', 1),
(7, '07', '07.01.01.005', '220441914', 'Praktikum', '2021-09-29', '16:04:24', '2021-10-04', '2021-09-29', '16:05:14', 1);

-- --------------------------------------------------------

--
-- Table structure for table `simpan`
--

CREATE TABLE `simpan` (
  `id_simpan` int(11) NOT NULL,
  `id_lab` varchar(10) NOT NULL,
  `id_pesan` int(11) NOT NULL,
  `tgl_simpan` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `simpan`
--

INSERT INTO `simpan` (`id_simpan`, `id_lab`, `id_pesan`, `tgl_simpan`) VALUES
(1, '07', 1, '2021-09-27'),
(2, '07', 2, '2021-09-27'),
(3, '07', 3, '2021-09-27'),
(4, '07', 4, '2021-09-27'),
(5, '07', 5, '2021-09-27'),
(6, '14', 6, '2021-09-28'),
(7, '14', 11, '2021-09-28'),
(8, '07', 20, '2021-09-29'),
(9, '07', 21, '2021-09-29');

-- --------------------------------------------------------

--
-- Table structure for table `terima`
--

CREATE TABLE `terima` (
  `id_terima` int(11) NOT NULL,
  `id_pesan` int(11) NOT NULL,
  `nama_penerima` varchar(50) NOT NULL,
  `tgl_terima` date NOT NULL,
  `tgl_pelaporan` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `terima`
--

INSERT INTO `terima` (`id_terima`, `id_pesan`, `nama_penerima`, `tgl_terima`, `tgl_pelaporan`) VALUES
(1, 1, 'zahra', '2021-09-27', '2021-09-27'),
(2, 2, 'zahra', '2021-09-27', '2021-09-27'),
(3, 3, 'zahra', '2021-09-27', '2021-09-27'),
(4, 4, 'zahra', '2021-09-27', '2021-09-27'),
(5, 5, 'zahra z', '2021-09-27', '2021-09-27'),
(6, 6, 'zahra', '2021-09-28', '2021-09-28'),
(7, 11, 'zahra z', '2021-09-28', '2021-09-28'),
(8, 20, 'zahra', '2021-09-29', '2021-09-29'),
(9, 21, 'zahra', '2021-09-29', '2021-09-29');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(5) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `level` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama`, `username`, `password`, `level`) VALUES
(1, 'admin', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin'),
(2, 'Ismail Rokhim', 'kajurae', '884d601b5a94c0b2ca255d4e297ffe8e', 'kajur'),
(4, 'Logistik POLMAN', 'logistik', 'cb1f02561c07f62717a4814c048a6239', 'logistik'),
(5, 'Gun Gun Maulana, S.Pd., M.T.', 'kalabinformatika', 'c96ee9850c601ef49708d4cc1ea296e7', 'kalab'),
(6, 'Adhitya Sumardi S.', 'kalabrobotik', 'b1a11d6674d6eb1de29f8bfe12913ba0', 'kalab'),
(7, 'Ruminto Subekti, SST., MT.', 'kalabelmek', '3f5f760da23ec2daf333599f0e94e723', 'kalab'),
(8, 'Dr. Setiawan Ajie Sukarno, S.ST., M.T.', 'kalabdigital', '0d60b661a2593b9113e5fe7427df0de3', 'kalab'),
(9, 'Afaf Fadhil', 'kalabotomasi', '4714e260949a7ca7c0a73d75ff40899a', 'kalab');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alat`
--
ALTER TABLE `alat`
  ADD PRIMARY KEY (`no_alat`);

--
-- Indexes for table `jenisalat`
--
ALTER TABLE `jenisalat`
  ADD PRIMARY KEY (`kode_jenis`);

--
-- Indexes for table `jurusan`
--
ALTER TABLE `jurusan`
  ADD PRIMARY KEY (`id_kajur`);

--
-- Indexes for table `laboratorium`
--
ALTER TABLE `laboratorium`
  ADD PRIMARY KEY (`id_lab`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`nim`);

--
-- Indexes for table `masteralat`
--
ALTER TABLE `masteralat`
  ADD PRIMARY KEY (`id_master`);

--
-- Indexes for table `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD PRIMARY KEY (`id_pesan`);

--
-- Indexes for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`id_pinjam`);

--
-- Indexes for table `simpan`
--
ALTER TABLE `simpan`
  ADD PRIMARY KEY (`id_simpan`);

--
-- Indexes for table `terima`
--
ALTER TABLE `terima`
  ADD PRIMARY KEY (`id_terima`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jenisalat`
--
ALTER TABLE `jenisalat`
  MODIFY `kode_jenis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `jurusan`
--
ALTER TABLE `jurusan`
  MODIFY `id_kajur` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `masteralat`
--
ALTER TABLE `masteralat`
  MODIFY `id_master` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `pemesanan`
--
ALTER TABLE `pemesanan`
  MODIFY `id_pesan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `peminjaman`
--
ALTER TABLE `peminjaman`
  MODIFY `id_pinjam` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `simpan`
--
ALTER TABLE `simpan`
  MODIFY `id_simpan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `terima`
--
ALTER TABLE `terima`
  MODIFY `id_terima` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
