-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 10, 2024 at 08:42 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `phpmvc`
--

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id_kelas` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id_kelas`, `nama`) VALUES
(5, '2 RPL 1'),
(6, '2 RPL 2'),
(7, '2 RPL 3'),
(17, '3 RPL 1'),
(19, '3 RPL 2');

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `nrp` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `jurusan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`id`, `nama`, `nrp`, `email`, `jurusan`) VALUES
(17, 'Moh Rifaldi A Way', '5720117024', 'mohrifaldiway@gmail.com', 'Teknik Informatika'),
(18, 'ummul', '5720117002', 'ummul@gmail.com', 'Sistem Informasi'),
(19, 'Fifi', '4353454', 'fafacantik@gmail.com', 'Teknik Informatika');

-- --------------------------------------------------------

--
-- Table structure for table `mapel`
--

CREATE TABLE `mapel` (
  `id_mapel` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mapel`
--

INSERT INTO `mapel` (`id_mapel`, `nama`) VALUES
(1, 'PKW'),
(2, 'Pemograman Web');

-- --------------------------------------------------------

--
-- Table structure for table `nilai`
--

CREATE TABLE `nilai` (
  `id_nilai` int(11) NOT NULL,
  `kelas_id` int(11) NOT NULL,
  `siswa_id` int(11) NOT NULL,
  `praktek_harian` int(11) NOT NULL,
  `praktek_semester` int(11) NOT NULL,
  `praktek_akhir` int(11) NOT NULL,
  `nilai_akhir` int(11) NOT NULL,
  `keterangan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `nilai`
--

INSERT INTO `nilai` (`id_nilai`, `kelas_id`, `siswa_id`, `praktek_harian`, `praktek_semester`, `praktek_akhir`, `nilai_akhir`, `keterangan`) VALUES
(5, 17, 5, 85, 90, 0, 0, ''),
(6, 17, 6, 85, 90, 0, 0, ''),
(7, 17, 7, 85, 95, 0, 0, ''),
(8, 17, 8, 80, 90, 0, 0, ''),
(9, 17, 9, 80, 90, 0, 0, ''),
(10, 17, 10, 80, 90, 0, 0, ''),
(11, 17, 11, 95, 95, 0, 0, ''),
(12, 17, 12, 95, 95, 0, 0, ''),
(13, 17, 13, 80, 90, 0, 0, ''),
(14, 17, 14, 85, 90, 0, 0, ''),
(15, 17, 15, 95, 95, 0, 0, ''),
(16, 17, 16, 85, 90, 0, 0, ''),
(17, 17, 17, 85, 90, 0, 0, ''),
(18, 17, 19, 85, 95, 0, 0, ''),
(19, 17, 20, 80, 90, 0, 0, ''),
(20, 17, 21, 85, 90, 0, 0, ''),
(21, 17, 22, 85, 90, 0, 0, ''),
(22, 17, 24, 95, 95, 0, 0, ''),
(23, 17, 25, 95, 90, 0, 0, ''),
(24, 17, 26, 85, 90, 0, 0, ''),
(25, 17, 27, 85, 90, 0, 0, ''),
(26, 17, 28, 80, 85, 0, 0, ''),
(27, 17, 29, 85, 90, 0, 0, ''),
(28, 17, 30, 95, 95, 0, 0, ''),
(29, 17, 31, 95, 90, 0, 0, ''),
(30, 17, 32, 90, 90, 0, 0, ''),
(31, 17, 33, 95, 90, 0, 0, ''),
(32, 17, 34, 80, 90, 0, 0, ''),
(33, 19, 35, 80, 90, 0, 0, ''),
(34, 19, 36, 80, 90, 0, 0, ''),
(35, 19, 37, 80, 80, 0, 0, ''),
(36, 19, 38, 90, 90, 0, 0, ''),
(37, 19, 39, 95, 95, 0, 0, ''),
(38, 19, 40, 85, 95, 0, 0, ''),
(39, 19, 41, 85, 90, 0, 0, ''),
(40, 19, 42, 90, 90, 0, 0, ''),
(41, 19, 43, 85, 95, 0, 0, ''),
(42, 19, 44, 85, 95, 0, 0, ''),
(43, 19, 45, 85, 90, 0, 0, ''),
(44, 19, 46, 85, 90, 0, 0, ''),
(45, 19, 47, 85, 90, 0, 0, ''),
(46, 19, 48, 80, 90, 0, 0, ''),
(47, 19, 49, 90, 90, 0, 0, ''),
(48, 19, 50, 85, 90, 0, 0, ''),
(49, 19, 51, 85, 90, 0, 0, ''),
(50, 19, 52, 85, 90, 0, 0, ''),
(51, 19, 53, 80, 90, 0, 0, ''),
(52, 19, 54, 95, 95, 0, 0, ''),
(53, 19, 55, 85, 90, 0, 0, ''),
(54, 19, 56, 80, 90, 0, 0, ''),
(55, 19, 57, 85, 90, 0, 0, ''),
(56, 19, 58, 95, 95, 0, 0, ''),
(57, 19, 59, 85, 90, 0, 0, ''),
(58, 19, 60, 95, 90, 0, 0, ''),
(59, 6, 70, 90, 95, 0, 0, ''),
(60, 6, 71, 90, 95, 0, 0, ''),
(61, 6, 91, 90, 90, 0, 0, ''),
(62, 6, 67, 90, 90, 0, 0, ''),
(63, 6, 88, 90, 90, 0, 0, ''),
(64, 6, 68, 90, 90, 0, 0, ''),
(65, 6, 80, 90, 90, 0, 0, ''),
(66, 6, 73, 95, 95, 0, 0, ''),
(67, 6, 82, 90, 90, 0, 0, ''),
(68, 6, 61, 90, 95, 0, 0, ''),
(69, 6, 62, 90, 95, 0, 0, ''),
(70, 6, 79, 90, 90, 0, 0, ''),
(71, 6, 63, 85, 70, 0, 0, ''),
(72, 6, 69, 90, 90, 0, 0, ''),
(73, 6, 84, 80, 85, 0, 0, ''),
(74, 6, 65, 85, 70, 0, 0, ''),
(75, 6, 81, 85, 90, 0, 0, ''),
(76, 6, 85, 80, 90, 0, 0, ''),
(77, 6, 66, 90, 90, 0, 0, ''),
(78, 6, 92, 80, 90, 0, 0, ''),
(79, 6, 77, 85, 90, 0, 0, ''),
(80, 6, 83, 85, 90, 0, 0, ''),
(81, 6, 74, 90, 90, 0, 0, ''),
(82, 6, 86, 80, 90, 0, 0, ''),
(83, 6, 89, 80, 0, 0, 0, ''),
(84, 6, 72, 85, 90, 0, 0, ''),
(85, 6, 90, 85, 90, 0, 0, ''),
(86, 6, 78, 85, 80, 0, 0, ''),
(90, 7, 113, 80, 90, 0, 0, ''),
(91, 7, 121, 85, 90, 0, 0, ''),
(92, 7, 124, 80, 90, 0, 0, ''),
(93, 7, 94, 90, 90, 0, 0, ''),
(94, 7, 116, 80, 90, 0, 0, ''),
(95, 6, 76, 80, 90, 0, 0, ''),
(96, 6, 127, 80, 90, 0, 0, ''),
(97, 6, 75, 85, 90, 0, 0, ''),
(98, 6, 64, 80, 85, 0, 0, ''),
(100, 6, 87, 80, 90, 0, 0, ''),
(104, 7, 93, 90, 95, 0, 0, ''),
(105, 7, 97, 80, 90, 0, 0, ''),
(106, 7, 100, 80, 90, 0, 0, ''),
(107, 7, 106, 80, 90, 0, 0, ''),
(108, 7, 96, 90, 95, 0, 0, ''),
(109, 7, 98, 85, 90, 0, 0, ''),
(110, 7, 101, 85, 90, 0, 0, ''),
(111, 7, 126, 85, 90, 0, 0, ''),
(112, 7, 118, 85, 90, 0, 0, ''),
(113, 7, 95, 85, 80, 0, 0, ''),
(114, 7, 102, 85, 90, 0, 0, ''),
(115, 7, 103, 85, 75, 0, 0, ''),
(116, 19, 128, 95, 95, 0, 0, ''),
(117, 7, 105, 80, 90, 0, 0, ''),
(118, 7, 104, 80, 90, 0, 0, ''),
(119, 7, 108, 80, 90, 0, 0, ''),
(120, 7, 102, 80, 90, 0, 0, ''),
(121, 7, 107, 80, 90, 0, 0, ''),
(122, 7, 111, 95, 95, 0, 0, ''),
(123, 7, 109, 80, 80, 0, 0, ''),
(124, 7, 110, 90, 90, 0, 0, ''),
(125, 7, 112, 80, 80, 0, 0, ''),
(126, 7, 114, 85, 90, 0, 0, ''),
(127, 7, 117, 85, 90, 0, 0, ''),
(128, 7, 115, 90, 90, 0, 0, ''),
(129, 7, 119, 85, 85, 0, 0, ''),
(130, 7, 120, 75, 85, 0, 0, ''),
(131, 7, 122, 90, 95, 0, 0, ''),
(132, 7, 123, 85, 90, 0, 0, ''),
(133, 7, 125, 95, 90, 0, 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `id_siswa` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `kelas_id` int(11) NOT NULL,
  `jenis_kelamin` varchar(50) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `telepon` varchar(50) NOT NULL,
  `keterangan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`id_siswa`, `nama`, `kelas_id`, `jenis_kelamin`, `alamat`, `telepon`, `keterangan`) VALUES
(5, 'AHMAD MUARIF', 17, 'Laki-Laki', 'BAILO', '082260526453', ''),
(6, 'ARIS RISKI', 17, 'Laki-Laki', 'BONERATO', '082290563933', ''),
(7, 'AISYA U. TONDU', 17, 'Perempuan', 'UEMALINGKU', '082259041684', ''),
(8, 'ALYA ROHALYA', 17, 'Perempuan', 'JL. DELIMA', '082259241054', ''),
(9, 'ANGGARAINI APRIANI', 17, 'Perempuan', 'BAILO', '085282460925', ''),
(10, 'ASMA S. ABDULLAH', 17, 'Perempuan', 'JL. LAPASERE', '082211811963', ''),
(11, 'AULIA PASHA RAMADHANI', 17, 'Perempuan', 'BUNTONGI', '085756006501', ''),
(12, 'BURHAN N.R ABAS', 17, 'Laki-Laki', 'SANSARINO', '081242897166', ''),
(13, 'CANTIKA ADINDA', 17, 'Perempuan', 'JL. DELIMA', '082293246135', ''),
(14, 'DIANA GANTELE', 17, 'Perempuan', 'TOMBO', '081354556397', ''),
(15, 'FARHAN', 17, 'Laki-Laki', 'TOMBO', '085823878914', ''),
(16, 'FERDY PRANACHITRA KADOENA', 17, 'Laki-Laki', 'SANSARINO', '081342004231', ''),
(17, 'FATIMA AL ZAHRA', 17, 'Perempuan', 'TOMBO', '081242209405', ''),
(19, 'FATMAWATI A. MANGANTJO', 17, 'Perempuan', 'PANDELENGI', '085757074643', ''),
(20, 'GIT KURNIAWAN NANGA', 17, 'Laki-Laki', 'SANSARINO', '082260051573', ''),
(21, 'IRHAM S. DAMOPOLII', 17, 'Laki-Laki', 'MALOTONG', '081289307248', ''),
(22, 'JABAL NUR', 17, 'Laki-Laki', 'BAILO', '082188693700', ''),
(24, 'JIHAN CAHYANI UMAR', 17, 'Perempuan', 'BAILO', '082348984131', ''),
(25, 'JUNAEDA', 17, 'Perempuan', 'TOMBO', '085823271658', ''),
(26, 'LUTFIA A.SOMAI', 17, 'Perempuan', 'PANDELENGI', '085880611964', ''),
(27, 'MUGNIA ALIFA PANDALA', 17, 'Perempuan', 'DONDO', '082192108310', ''),
(28, 'NABILA SULJANA', 17, 'Perempuan', 'TOMBO', '081288621969', ''),
(29, 'NAILA A.F PUO', 17, 'Perempuan', 'PANDELENGI', '082259140128', ''),
(30, 'NENENG FADILA I LAHAY', 17, 'Perempuan', 'LABIABAE', '081387711808', ''),
(31, 'NUR AINI', 17, 'Perempuan', 'BUNTONGI', '082259236855', ''),
(32, 'NURALIFA PESU', 17, 'Perempuan', 'PANDELENGI', '082292494395', ''),
(33, 'NURJANA UMAR H DAPU', 17, 'Perempuan', 'TOMBO', '082259662508', ''),
(34, 'NURMASITA PARALINO', 17, 'Perempuan', 'DONDO BARU', '082259968409', ''),
(35, 'ABD. MALIK TAPO', 19, 'Laki-Laki', 'UENGGURI', '082348948939', ''),
(36, 'ASTRIA LAHASA', 19, 'Perempuan', 'TOMBO', '087828008653', ''),
(37, 'MOH. ARIF', 19, 'Laki-Laki', 'BAILO', '08', ''),
(38, 'MUHAMAD FADLI BAHAR', 19, 'Laki-Laki', 'TOBA ROBIN', '081241900748', ''),
(39, 'RIFKY AFANDI', 19, 'Laki-Laki', 'DELIMA', '', ''),
(40, 'RAHAYU WULAN SUCI', 19, 'Perempuan', 'PANDELENGI', '082290124901', ''),
(41, 'REGITA ANGRAINI', 19, 'Perempuan', 'SS', '22', ''),
(42, 'SAMSUL HIDAYAH MOH. ALI A. TAMPO', 19, 'Laki-Laki', 'SANSARINO', '085756871756', ''),
(43, 'SAFIRA', 19, 'Perempuan', 'SMOLI', '081543106207', ''),
(44, 'SAFIRA SAHRANI', 19, 'Perempuan', 'TOMBO', '082271337781', ''),
(45, 'SAHIRA AFDAL', 19, 'Perempuan', 'PANDELENGI', '085756250341', ''),
(46, 'SELVI HERMAN', 19, 'Perempuan', 'BAILO BARU', '085299711179', ''),
(47, 'SILVANA A MAWEI', 19, 'Perempuan', 'BAILO BARU', '082296934901', ''),
(48, 'SITI AISAH K JUDE', 19, 'Perempuan', 'SABO', '082296704578', ''),
(49, 'SITI RAMLA S LASANTU ', 19, 'Perempuan', 'PANDELENGI', '082296029133', ''),
(50, 'SITI SULISTIANI SAPUTRI', 19, 'Perempuan', 'UEMALINGKU', '087831169266', ''),
(51, 'SOFYA I. AGAMAN', 19, 'Perempuan', 'PANDELENGI', '081770694986', ''),
(52, 'SRI DEVI MOHA', 19, 'Perempuan', 'TOMBO', '082246426016', ''),
(53, 'SRIAUDI S. WOLI ', 19, 'Perempuan', 'SALUABA', '082293051619', ''),
(54, 'SUCI RAMADANI', 19, 'Perempuan', 'BAILO', '082250714595', ''),
(55, 'SAHRA MAHMUD', 19, 'Perempuan', 'BAILO', '082210231310', ''),
(56, 'WINDA AHMAD RATO', 19, 'Perempuan', 'SALUABA', '082293050355', ''),
(57, 'WIRNA AM. MAJADI', 19, 'Perempuan', 'UEBAE', '082228687673', ''),
(58, 'WIWIN SUSANTI', 19, 'Perempuan', 'PANDELENGI', '082213201577', ''),
(59, 'YULDITYA CAHYA SALSABILA', 19, 'Perempuan', 'SMOLI ATAS', '082189149971', ''),
(60, 'YUSUF MAHAPUTRA MUKTI', 19, 'Laki-Laki', 'PANDELENGI', '083851059582', ''),
(61, 'ABD JALIL. H. KARAU', 6, 'Laki-Laki', 'TOMBO', '', ''),
(62, 'ALTHAF NUURUL HAADI', 6, 'Laki-Laki', '', '', ''),
(63, 'ALIZA LAKORO', 6, 'Perempuan', '', '', ''),
(64, 'ANDRI I DASI', 6, 'Laki-Laki', '', '', ''),
(65, 'ARSINTA A. TADEO', 6, 'Perempuan', '', '', ''),
(66, 'ASEP GUNAWAN S KARTOMI', 6, 'Laki-Laki', '', '', ''),
(67, 'EKA SALVIA AMELIA', 6, 'Perempuan', '', '', ''),
(68, 'FADELIA ', 6, 'Perempuan', '', '', ''),
(69, 'FADIL FAISAL S', 6, 'Laki-Laki', '', '', ''),
(70, 'FARHAN FATHNUL MUBIN', 6, 'Laki-Laki', '', '', ''),
(71, 'FIKAR I KARAU', 6, 'Laki-Laki', '', '', ''),
(72, 'FITRIANI JUMPAI ', 6, 'Perempuan', '', '', ''),
(73, 'JUNIYENTI', 6, 'Perempuan', '', '', ''),
(74, 'KHAIRUL LABANU', 6, 'Laki-Laki', '', '', ''),
(75, 'MASYITA SALMAN PALLU', 6, 'Perempuan', '', '', ''),
(76, 'MOH JULKIFLI NURSIN', 6, 'Laki-Laki', '', '', ''),
(77, 'MOH. IQBAL HATIBI', 6, 'Laki-Laki', '', '', ''),
(78, 'MUHLISUN T', 6, 'Laki-Laki', '', '', ''),
(79, 'NABILA ABDILLAH', 6, 'Perempuan', '', '', ''),
(80, 'NUR INTAN', 6, 'Perempuan', '', '', ''),
(81, 'NURHALISA CHABRAN', 6, 'Perempuan', '', '', ''),
(82, 'NURUL ANNISFA', 6, 'Perempuan', '', '', ''),
(83, 'RAHMATIA', 6, 'Perempuan', '', '', ''),
(84, 'RANDY AFRIANSYAH', 6, 'Laki-Laki', '', '', ''),
(85, 'SITI KARTIKA ', 6, 'Perempuan', '', '', ''),
(86, 'SITTI SALWA A WAGU', 6, 'Perempuan', '', '', ''),
(87, 'SOGA RESMADINATA', 6, 'Laki-Laki', '', '', ''),
(88, 'SULISTIAWATI RATO', 6, 'Perempuan', '', '', ''),
(89, 'TRYBUANA SINADOPAN', 6, 'Perempuan', '', '', ''),
(90, 'WARDA S LADOE', 6, 'Perempuan', '', '', ''),
(91, 'ZILVANI BAFADAL', 6, 'Perempuan', '', '', ''),
(92, 'ZULKARNAIN', 6, 'Laki-Laki', '', '', ''),
(93, 'ABDUL GAFUR A RANSI', 7, '', '', '', ''),
(94, 'AISA S AGE', 7, '', '', '', ''),
(95, 'ALAN A VERA', 7, '', '', '', ''),
(96, 'ALVIRA', 7, '', '', '', ''),
(97, 'ARINI R KALUBE', 7, '', '', '', ''),
(98, 'ASLAN J NONE', 7, '', '', '', ''),
(100, 'ASTI ANANTA A BADAR', 7, '', '', '', ''),
(101, 'FADILA M RATOLI', 7, '', '', '', ''),
(102, 'FAHTURRAZI', 7, '', '', '', ''),
(103, 'FEBRIYANTO KANDUSU', 7, '', '', '', ''),
(104, 'FITRIANI UMUHU', 7, '', '', '', ''),
(105, 'HASRIAWAN A DJANANTU', 7, '', '', '', ''),
(106, 'HIJA SAFRUN', 7, '', '', '', ''),
(107, 'ISRAWATI NABITO', 7, '', '', '', ''),
(108, 'JURIA A IBRAHIM', 7, '', '', '', ''),
(109, 'MASJIDAN MAMONTO ', 7, '', '', '', ''),
(110, 'MOH RAFLI', 7, '', '', '', ''),
(111, 'MOH FAUZAN', 7, '', '', '', ''),
(112, 'MOH NUR I LONGKU', 7, '', '', '', ''),
(113, 'MUNIFA', 7, '', '', '', ''),
(114, 'NAGITA AZZAHRA U LOBA', 7, '', '', '', ''),
(115, 'NUR MARYANI', 7, '', '', '', ''),
(116, 'NURHASFIDA L SANDI ', 7, '', '', '', ''),
(117, 'NURUL HIDAYANI K KARIM', 7, '', '', '', ''),
(118, 'QAWY FATHIR I KANALI', 7, '', '', '', ''),
(119, 'RATNA S LEBA', 7, '', '', '', ''),
(120, 'RENALDI', 7, '', '', '', ''),
(121, 'SHINTIA BELLA LUATO', 7, '', '', '', ''),
(122, 'SITI MASTURA A NGGAI', 7, '', '', '', ''),
(123, 'SOFFIYAH', 7, '', '', '', ''),
(124, 'VIDYA MAULIDYA GIMAN', 7, '', '', '', ''),
(125, 'WINDRA', 7, '', '', '', ''),
(126, 'ZIKRAN UBAIDILLA', 7, '', '', '', ''),
(127, 'NADIVA M TAHER', 6, 'Perempuan', '', '', ''),
(128, 'SILVANI N LIHAWA', 19, 'Perempuan', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `email`, `password`) VALUES
(10, 'RifaldiAWay', 'mohrifaldiway@gmail.com', 'zxcvb');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mapel`
--
ALTER TABLE `mapel`
  ADD PRIMARY KEY (`id_mapel`);

--
-- Indexes for table `nilai`
--
ALTER TABLE `nilai`
  ADD PRIMARY KEY (`id_nilai`),
  ADD KEY `siswa_id` (`siswa_id`),
  ADD KEY `kelas_id` (`kelas_id`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id_siswa`),
  ADD KEY `kelas_id` (`kelas_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `mapel`
--
ALTER TABLE `mapel`
  MODIFY `id_mapel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `nilai`
--
ALTER TABLE `nilai`
  MODIFY `id_nilai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=134;

--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id_siswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=129;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `nilai`
--
ALTER TABLE `nilai`
  ADD CONSTRAINT `nilai_ibfk_1` FOREIGN KEY (`siswa_id`) REFERENCES `siswa` (`id_siswa`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `nilai_ibfk_2` FOREIGN KEY (`kelas_id`) REFERENCES `kelas` (`id_kelas`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `siswa`
--
ALTER TABLE `siswa`
  ADD CONSTRAINT `siswa_ibfk_1` FOREIGN KEY (`kelas_id`) REFERENCES `kelas` (`id_kelas`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
