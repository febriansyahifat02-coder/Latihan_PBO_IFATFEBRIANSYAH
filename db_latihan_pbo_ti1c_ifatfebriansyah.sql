-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 15, 2026 at 08:40 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_latihan_pbo_ti1c_ifatfebriansyah`
--

-- --------------------------------------------------------

--
-- Table structure for table `tabel_tiket`
--

CREATE TABLE `tabel_tiket` (
  `id_tiket` int(11) NOT NULL,
  `nama_film` varchar(150) NOT NULL,
  `jadwal_tayang` datetime NOT NULL,
  `jumlah_kursi` int(11) NOT NULL,
  `harga_dasar_tiket` decimal(10,2) NOT NULL,
  `jenis_studio` enum('Regular','IMAX','Velvet') NOT NULL,
  `tipe_audio` varchar(50) DEFAULT NULL,
  `lokasi_baris` varchar(10) DEFAULT NULL,
  `kacamata_3d_id` varchar(50) DEFAULT NULL,
  `efek_gerak_fitur` varchar(100) DEFAULT NULL,
  `bantal_selimut_pack` varchar(50) DEFAULT NULL,
  `layanan_butler` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tabel_tiket`
--

INSERT INTO `tabel_tiket` (`id_tiket`, `nama_film`, `jadwal_tayang`, `jumlah_kursi`, `harga_dasar_tiket`, `jenis_studio`, `tipe_audio`, `lokasi_baris`, `kacamata_3d_id`, `efek_gerak_fitur`, `bantal_selimut_pack`, `layanan_butler`) VALUES
(1, 'Avatar: The Way of Water', '2026-06-20 13:00:00', 1, 45000.00, 'Regular', 'Dolby Digital 5.1', 'Row G', NULL, NULL, NULL, NULL),
(2, 'Avatar: The Way of Water', '2026-06-20 13:00:00', 1, 45000.00, 'Regular', 'Dolby Digital 5.1', 'Row G', NULL, NULL, NULL, NULL),
(3, 'The Batman Part II', '2026-06-20 15:45:00', 1, 45000.00, 'Regular', 'Standard Stereo', 'Row E', NULL, NULL, NULL, NULL),
(4, 'The Batman Part II', '2026-06-20 15:45:00', 1, 45000.00, 'Regular', 'Standard Stereo', 'Row E', NULL, NULL, NULL, NULL),
(5, 'Spiderman: Beyond', '2026-06-21 10:00:00', 1, 40000.00, 'Regular', 'Dolby Digital 5.1', 'Row F', NULL, NULL, NULL, NULL),
(6, 'Spiderman: Beyond', '2026-06-21 10:00:00', 1, 40000.00, 'Regular', 'Dolby Digital 5.1', 'Row F', NULL, NULL, NULL, NULL),
(7, 'Inception Re-release', '2026-06-21 19:00:00', 1, 50000.00, 'Regular', 'Standard Stereo', 'Row C', NULL, NULL, NULL, NULL),
(8, 'Interstellar 10th Anniv', '2026-06-20 14:00:00', 1, 75000.00, 'IMAX', 'IMAX 6-Track', 'Row A', 'GLASSES-IMAX-01', 'Subwoofer Shaker', NULL, NULL),
(9, 'Interstellar 10th Anniv', '2026-06-20 14:00:00', 1, 75000.00, 'IMAX', 'IMAX 6-Track', 'Row A', 'GLASSES-IMAX-02', 'Subwoofer Shaker', NULL, NULL),
(10, 'Dune: Part Three', '2026-06-20 18:30:00', 1, 85000.00, 'IMAX', 'IMAX 12-Track', 'Row B', 'GLASSES-IMAX-03', 'None', NULL, NULL),
(11, 'Dune: Part Three', '2026-06-20 18:30:00', 1, 85000.00, 'IMAX', 'IMAX 12-Track', 'Row B', 'GLASSES-IMAX-04', 'None', NULL, NULL),
(12, 'Avengers: Secret Wars', '2026-06-22 11:00:00', 1, 90000.00, 'IMAX', 'IMAX 12-Track', 'Row C', 'GLASSES-IMAX-05', 'Subwoofer Shaker', NULL, NULL),
(13, 'Avengers: Secret Wars', '2026-06-22 11:00:00', 1, 90000.00, 'IMAX', 'IMAX 12-Track', 'Row C', 'GLASSES-IMAX-06', 'Subwoofer Shaker', NULL, NULL),
(14, 'Star Wars: New Order', '2026-06-22 15:00:00', 1, 80000.00, 'IMAX', 'IMAX 6-Track', 'Row D', 'GLASSES-IMAX-07', 'None', NULL, NULL),
(15, 'Titanic: Remastered', '2026-06-20 20:00:00', 2, 250000.00, 'Velvet', 'Dolby Atmos', 'Sofa 01', NULL, NULL, 'Premium Pack A', 'Personal Butler Ani'),
(16, 'Titanic: Remastered', '2026-06-20 20:00:00', 2, 250000.00, 'Velvet', 'Dolby Atmos', 'Sofa 02', NULL, NULL, 'Premium Pack A', 'Personal Butler Budi'),
(17, 'La La Land', '2026-06-21 16:00:00', 2, 200000.00, 'Velvet', 'Dolby Atmos', 'Sofa 05', NULL, NULL, 'Standard Pack', 'Call-Button Service'),
(18, 'La La Land', '2026-06-21 16:00:00', 2, 200000.00, 'Velvet', 'Dolby Atmos', 'Sofa 06', NULL, NULL, 'Standard Pack', 'Call-Button Service'),
(19, 'The Matrix Resurrections', '2026-06-23 21:00:00', 2, 220000.00, 'Velvet', 'DTS:X Xperience', 'Sofa 03', NULL, NULL, 'Premium Pack B', 'Personal Butler Citra'),
(20, 'The Matrix Resurrections', '2026-06-23 21:00:00', 2, 220000.00, 'Velvet', 'DTS:X Xperience', 'Sofa 04', NULL, NULL, 'Premium Pack B', 'Personal Butler Citra'),
(21, 'Gladiator II', '2026-06-23 18:00:00', 2, 250000.00, 'Velvet', 'Dolby Atmos', 'Sofa 07', NULL, NULL, 'Premium Pack A', 'Personal Butler Dedi');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tabel_tiket`
--
ALTER TABLE `tabel_tiket`
  ADD PRIMARY KEY (`id_tiket`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tabel_tiket`
--
ALTER TABLE `tabel_tiket`
  MODIFY `id_tiket` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
