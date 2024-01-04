-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 04, 2024 at 02:33 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `multiuser`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `login_id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`login_id`, `username`, `password`) VALUES
(1, 'admin', '0192023a7bbd73250516f069df18b500'),
(2, 'guru', '9310f83135f238b04af729fec041cca8'),
(3, 'siswa', '3afa0d81296a4f17d477ec823261b1ec');

-- --------------------------------------------------------

--
-- Table structure for table `admin_akses`
--

CREATE TABLE `admin_akses` (
  `login_id` int(10) NOT NULL,
  `akses_id` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_akses`
--

INSERT INTO `admin_akses` (`login_id`, `akses_id`) VALUES
(1, 'guru'),
(1, 'siswa'),
(1, 'spp'),
(2, 'guru'),
(2, 'siswa'),
(3, 'siswa'),
(1, 'spp');

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `id` int(11) NOT NULL,
  `nama` varchar(64) NOT NULL,
  `email` varchar(64) NOT NULL,
  `jurusan` varchar(64) NOT NULL,
  `universitas` varchar(64) NOT NULL,
  `gambar` varchar(64) NOT NULL,
  `idbuku` varchar(50) NOT NULL,
  `jumlahalaman` varchar(50) NOT NULL,
  `penerbit` varchar(55) NOT NULL,
  `penulis` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`id`, `nama`, `email`, `jurusan`, `universitas`, `gambar`, `idbuku`, `jumlahalaman`, `penerbit`, `penulis`) VALUES
(13, 'NON FIKSI', 'HTML 5', 'DIMAS LINDRA', '2010', '6596b0c1cc31f.jpg', '112218', '234', 'NABILA', 'JAMAL'),
(14, 'FIKSI', 'CSS', 'ROFI', '1999', '6596b0d691e08.jpg', '123453', '166', 'NISSA', 'OPIK'),
(15, 'FIKSI', 'PHP', 'RIZKI', '2008', '6596b0ea877e3.jpg', '123451', '224', 'QIANA', 'ULLA'),
(16, 'NOVEL', 'JAVA', 'YOGI', '2003', '6596b1249420f.jpg', '123452', '333', 'NOPITA', 'ZIKIR'),
(17, 'NON FIKSI', 'LARAVEL', 'RASYID', '1967', '6596b114391c3.png', '123453', '135', 'DINDA', 'BAGAS'),
(18, 'NOVEL', 'JAVASCRIPT', 'NISSA', '2020', '6596b1577dae0.jpg', '123454', '122', 'MUNA', 'ALI'),
(19, 'FIKSI', 'IMPLEMENTASI', 'HAIKAL', '2000', '6596b17a7af7b.jpg', '123456', '89', 'SYAFIRA', 'JUNAIDI'),
(20, 'KAMUS', 'ALGORITMA', 'ANDRE', '1530', '6596b18a6f896.jpg', '132321', '400', 'JAMAL', 'IWAN'),
(21, 'KAMUS', 'DART', 'HERI', '2009', '6596b19976586.jpg', '302030', '99', 'LESTARI', 'EWIN'),
(22, 'MAJALAH', 'PYTHON', 'GALIH', '1930', '6596b1ac3c468.jpg', '234211', '276', 'SANDIKA', 'UNPAS'),
(25, 'MAJALAH', 'CSS', 'BAMBANG', '1999', '6596b1bba1eaa.jpg', '123409', '200', 'LADES', 'ACOK'),
(28, 'KAMUS', 'HTML', 'SEPRIANO', '2010', '6596b16bad8aa.jpg', '353939', '100', 'TAHANG', 'EPI');

-- --------------------------------------------------------

--
-- Table structure for table `master_akses`
--

CREATE TABLE `master_akses` (
  `akses_id` varchar(15) NOT NULL,
  `nama` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `master_akses`
--

INSERT INTO `master_akses` (`akses_id`, `nama`) VALUES
('guru', 'Guru'),
('siswa', 'ini untuk siswa'),
('spp', 'Halaman SPP');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`login_id`);

--
-- Indexes for table `admin_akses`
--
ALTER TABLE `admin_akses`
  ADD KEY `akses_id` (`akses_id`),
  ADD KEY `login_id` (`login_id`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `master_akses`
--
ALTER TABLE `master_akses`
  ADD PRIMARY KEY (`akses_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `login_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin_akses`
--
ALTER TABLE `admin_akses`
  ADD CONSTRAINT `admin_akses_ibfk_1` FOREIGN KEY (`akses_id`) REFERENCES `master_akses` (`akses_id`),
  ADD CONSTRAINT `admin_akses_ibfk_2` FOREIGN KEY (`login_id`) REFERENCES `admin` (`login_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
