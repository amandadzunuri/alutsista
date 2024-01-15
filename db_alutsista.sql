-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 15, 2024 at 06:53 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_alutsista`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_admin`
--

CREATE TABLE `tb_admin` (
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_admin`
--

INSERT INTO `tb_admin` (`username`, `password`) VALUES
('admin', 'amancantik');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kendaraan`
--

CREATE TABLE `tb_kendaraan` (
  `nama` varchar(255) NOT NULL,
  `kode` varchar(255) NOT NULL,
  `merk` varchar(255) NOT NULL,
  `model` varchar(255) NOT NULL,
  `jenis` varchar(255) NOT NULL,
  `berat` varchar(255) NOT NULL,
  `ukuran` varchar(255) NOT NULL,
  `awak` varchar(255) NOT NULL,
  `senjata_utama` varchar(255) NOT NULL,
  `kecepatan` varchar(255) NOT NULL,
  `sistem_navigasi` varchar(255) NOT NULL,
  `tanggal_pembelian` date NOT NULL,
  `lokasi` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `tanggal_perbaikan` date NOT NULL,
  `jenis_perbaikan` varchar(255) NOT NULL,
  `gambar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_kendaraan`
--

INSERT INTO `tb_kendaraan` (`nama`, `kode`, `merk`, `model`, `jenis`, `berat`, `ukuran`, `awak`, `senjata_utama`, `kecepatan`, `sistem_navigasi`, `tanggal_pembelian`, `lokasi`, `status`, `tanggal_perbaikan`, `jenis_perbaikan`, `gambar`) VALUES
('Kapal Perang Kelas Arleigh Burke', 'KP-002', 'Ingalls Shipbuilding', 'DDG-51', 'Kapal Perang Penghancur', '9.800 ton', '155m x 20m x 9.4m', '380 orang', 'Meriam Mark 45 Mod 4 127mm, Sistem Rudal Vertical Launch (VLS) untuk rudal Tomahawk dan SM-6', '30+ knot', 'Radar AN/SPY-1D, Sonar AN/SQS-53C, Sistem Pengindera Radar AN/SPY-6', '2018-03-15', 'Markas Besar Angkatan Laut', 'Aktif', '2022-06-05', 'Perbaikan kerusakan pada sistem elektronik', '../uploads/Kapal Perang Kelas Arleigh Burke.jpg'),
('Kapal Selam Kelas Virginia', 'KS-003', 'General Dynamics Electric Boat', 'SSN-774 ', 'Kapal Selam Serang', '7.800 ton', '115m x 10m x 7m', '135 orang', 'Torpedo Anti-Kapal, Rudal Pemandu, Sistem Rudal Vertical Launch System (VLS)', '25+ knot', 'Sonar Aktif dan Pasif, Sistem Pemetaan Bawah Air, Sistem Navigasi Inersia', '2017-02-10', 'Markas Besar Angkatan Laut', 'Aktif', '2022-08-23', 'Penggantian suku cadang sistem transmisi', '../uploads/Kapal Selam Kelas Virginia.jpeg'),
('Pesawat Tempur Sukhoi Su-35', 'PT-002', 'Sukhoi', 'Su-35S', 'Pesawat Tempur Serang', '34 ton', '21.9m x 15.3m x 5.9m', '1-2 orang (pilot)', 'Meriam GSh-30-1 30mm, Rudal Udara-ke-Udara R-77, R-27, Rudal Udara-ke-Darat Kh-59, Kh-31', 'Mach 2.25 (2.400 km/jam)', 'Radar PESA (Passive Electronically Scanned Array), Sistem Navigasi Inersia (INS), GPS/GLONASS', '2022-04-06', 'Markas Besar Angkatan Udara', 'Aktif', '2023-02-23', 'Perbaikan sistem pendingin', '../uploads/Pesawat Tempur Sukhoi Su-35.jpeg'),
('Pesawat Tempur Multifungsi F-35 Lightning II', 'PT-35', 'Lockheed Martin', 'F-35A', 'Pesawat Tempur', '13 ton', '10.7m x 13.1m x 4.3m', '1 orang (pilot)', 'Meriam GAU-22/A 25mm cannon', 'Mach 1.6 (1,960 km/jam)', 'Sistem navigasi inersia terpadu, GPS, radar pencarian dan pelacakan', '2021-05-15', 'Markas Besar Angkatan Udara', 'Aktif', '2023-05-01', 'Pemeliharaan Rutin - Penggantian Suku Cadang yang Aus', '../uploads/Pesawat Tempur Multifungsi F-35 Lightning II.jpg'),
('Tank Tempur Main Battle MBT-2000', 'TMBT-001', 'Norinco', 'MBT-2000', 'Kendaraan Tempur Darat', '48 ton', '7.2m x 3.4m x 2.2m', '3 orang (kru)', 'Meriam Gl 125mm', '70 km/jam di jalan 45 km/jam di tanah tidak beraspal', 'GPS Terintegrasi', '2019-05-15', 'Markas Besar Angkatan Darat', 'Aktif', '2022-12-12', 'Perbaikan Kerusakan Struktural', '../uploads/Tank Tempur Main Battle MBT-2000.jpg'),
('Tank Leopard 2A7', 'TNK-002', 'Krauss-Maffei Wegmann (KMW)', 'Leopard 2A7', 'Tank Tempur Utama', '62 ton', '10.97m x 3.75m x 3m', '4 orang', 'Meriam L55 120mm smoothbore, dengan sistem pemuat otomatis', '70 km/jam di jalan, 45 km/jam di medan berat', 'Sistem Navigasi Inersia, GPS, Sistem Pengamatan dan Penargetan Termal', '2021-07-20', 'Markas Besar Angkatan Darat', 'Aktif', '2022-09-15', 'Perbaikan Keamanan - Pembaruan Sistem Proteksi', '../uploads/Tank Leopard 2A7.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tb_senjata`
--

CREATE TABLE `tb_senjata` (
  `nama` varchar(255) NOT NULL,
  `kode` varchar(255) NOT NULL,
  `merk` varchar(255) NOT NULL,
  `model` varchar(255) NOT NULL,
  `jenis` varchar(255) NOT NULL,
  `kaliber` varchar(255) NOT NULL,
  `kapasitas` varchar(255) NOT NULL,
  `panjang` varchar(255) NOT NULL,
  `bahan` varchar(255) NOT NULL,
  `bobot` varchar(255) NOT NULL,
  `kecepatan` varchar(255) NOT NULL,
  `tanggal_pembelian` date NOT NULL,
  `lokasi` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `tanggal_perbaikan` date NOT NULL,
  `jenis_perbaikan` varchar(255) NOT NULL,
  `gambar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_senjata`
--

INSERT INTO `tb_senjata` (`nama`, `kode`, `merk`, `model`, `jenis`, `kaliber`, `kapasitas`, `panjang`, `bahan`, `bobot`, `kecepatan`, `tanggal_pembelian`, `lokasi`, `status`, `tanggal_perbaikan`, `jenis_perbaikan`, `gambar`) VALUES
('Carbine-X MK-IV', 'CX-001', 'TechArm Solutions', 'MK-IV', 'Karabin Serbu', '7.62x39mm', '30 peluru', '16 inci', 'Campuran Baja Kekuatan Tinggi dan Polimer', '3.8 kg', '800 meter/detik', '2018-06-02', 'Markas Besar Angkatan Laut', 'Aktif', '2022-06-05', 'Overhaul sistem operasional dan kalibrasi ulang', '../uploads/Carbine-X MK-IV.jpeg'),
('Pistol Serbu FN SCAR', 'PS-001', 'FN Herstal', 'FN SCAR-L (Light)', 'Pistol Serbu', '12mm', '30 peluru', '365mm', 'Baja ', '3.3 kg', '900 meter/detik', '2022-10-15', 'Markas Besar Angkatan Udara', 'Aktif', '2023-02-23', ' Penggantian komponen pemicu yang aus', '../uploads/FN-SCAR-L.jpg'),
('Pistol Seri XZ-2000', 'PTL-4567', 'TechArm Solutions', 'Defender Pro', 'Semi-otomatis', '10mm', '15 peluru', '115mm', 'Logam ', '800 gram', '350 meter/detik', '2021-07-17', 'Markas Besar Angkatan Udara', 'Aktif', '2023-05-01', 'Penggantian komponen pemicu', '../uploads/Pistol Seri XZ-2000 Defender Pro.jpg'),
('Pistol M9', 'PX-12345', 'Beretta', 'Beretta M9', 'Semi-otomatis', '9mm ', '15 peluru', '125 mm', 'Baja', '964 gram ', '350 meter/detik', '2019-02-15', 'Markas Besar Angkatan Darat', 'Aktif', '2022-12-12', 'Pembersihan dan pengecekan umum', '../uploads/Beretta M9.jpg'),
('Senapan Serbu XYZ-100', 'SG-001', 'Beretta', 'XYZ-100A', 'Senapan Serbu', '5.56x45mm', '30 peluru', '16 inci', 'Baja Karbon Tinggi', '3.5 kg', '850 meter/detik', '2021-09-10', 'Markas Besar Angkatan Darat', 'Aktif', '2022-09-15', ' Perbaikan Keamanan - Pembaruan Sistem Proteksi', '../uploads/Senapan Serbu XYZ-100.jpg'),
('Senapan Serbu Standar', 'SS-001', 'Fabrique Nationale (FN)', 'FAL 50.63', 'Senapan Serbu', '7.62x51mm', '20 peluru', '21 inci', 'Baja Tahan Karat, Kayu untuk Bagian Stok', '4.1 kg', '840 meter/detik', '2017-05-26', 'Markas Besar Angkatan Laut', 'Aktif', '2022-08-23', 'Penggantian suku cadang sistem transmisi', '../uploads/FAL 50.63.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_kendaraan`
--
ALTER TABLE `tb_kendaraan`
  ADD PRIMARY KEY (`kode`);

--
-- Indexes for table `tb_senjata`
--
ALTER TABLE `tb_senjata`
  ADD PRIMARY KEY (`kode`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
