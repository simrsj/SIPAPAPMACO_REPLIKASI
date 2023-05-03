-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 27, 2023 at 11:11 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_sm`
--
CREATE DATABASE IF NOT EXISTS `db_sm` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `db_sm`;

-- --------------------------------------------------------

--
-- Table structure for table `tb_akreditasi`
--

DROP TABLE IF EXISTS `tb_akreditasi`;
CREATE TABLE `tb_akreditasi` (
  `id_akreditasi` int(11) NOT NULL,
  `nama_akreditasi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_akreditasi`
--

INSERT INTO `tb_akreditasi` (`id_akreditasi`, `nama_akreditasi`) VALUES
(0, '-- Lainnya --'),
(1, 'A'),
(2, 'B'),
(3, 'C');

-- --------------------------------------------------------

--
-- Table structure for table `tb_bayar`
--

DROP TABLE IF EXISTS `tb_bayar`;
CREATE TABLE `tb_bayar` (
  `id_bayar` int(11) NOT NULL,
  `id_mou` int(11) DEFAULT NULL,
  `id_praktik` int(11) NOT NULL,
  `kode_bayar` text NOT NULL,
  `atas_nama_bayar` text NOT NULL,
  `noRek_bayar` text NOT NULL,
  `melalui_bayar` text NOT NULL,
  `tgl_transfer_bayar` date NOT NULL,
  `tgl_input_bayar` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `file_bayar` text NOT NULL,
  `ket_bayar` text NOT NULL,
  `status_bayar` enum('T','TERIMA','TOLAK') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_institusi`
--

DROP TABLE IF EXISTS `tb_institusi`;
CREATE TABLE `tb_institusi` (
  `id_institusi` int(11) NOT NULL,
  `tgl_tambah_institusi` text DEFAULT NULL,
  `tgl_ubah_institusi` text DEFAULT NULL,
  `nama_institusi` text NOT NULL,
  `akronim_institusi` varchar(10) DEFAULT NULL,
  `logo_institusi` text DEFAULT NULL,
  `alamat_institusi` text DEFAULT NULL,
  `akred_institusi` text DEFAULT NULL,
  `tglAkhirAkred_institusi` date DEFAULT NULL,
  `fileAkred_institusi` text DEFAULT NULL,
  `ket_institusi` text NOT NULL,
  `messOpsional_institusi` enum('Y','T') DEFAULT NULL,
  `tempAkronim_institusi` text DEFAULT NULL,
  `tempLogo_institusi` text DEFAULT NULL,
  `tempAlamat_institusi` text DEFAULT NULL,
  `tempAkred_institusi` text DEFAULT NULL,
  `tempTglAkhirAkred_institusi` date DEFAULT NULL,
  `tempFileAkred_institusi` text DEFAULT NULL,
  `tempStatus_institusi` text NOT NULL,
  `tempKet_institusi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_institusi`
--

INSERT INTO `tb_institusi` (`id_institusi`, `tgl_tambah_institusi`, `tgl_ubah_institusi`, `nama_institusi`, `akronim_institusi`, `logo_institusi`, `alamat_institusi`, `akred_institusi`, `tglAkhirAkred_institusi`, `fileAkred_institusi`, `ket_institusi`, `messOpsional_institusi`, `tempAkronim_institusi`, `tempLogo_institusi`, `tempAlamat_institusi`, `tempAkred_institusi`, `tempTglAkhirAkred_institusi`, `tempFileAkred_institusi`, `tempStatus_institusi`, `tempKet_institusi`) VALUES
(1, NULL, NULL, 'AKADEMI PEREKAM MEDIS DAN INFORMATIKA KESEHATAN BANDUNG', 'APIKES BDG', './_img/logo_institusi/1.png', '', NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', ''),
(2, NULL, NULL, 'AKPER AL-MA\'ARIF BATURAJA', '', '', '', NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', ''),
(3, NULL, NULL, 'AKPER BHAKTI KENCANA BANDUNG', '', '', '', NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', ''),
(4, NULL, NULL, 'AKPER BIDARA MUKTI GARUT', '', '', '', NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', ''),
(5, NULL, NULL, 'AKPER BUNTET PESANTREN CIREBON', '', '', '', NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', ''),
(6, NULL, NULL, 'AKPER DUSTIRA CIMAHI', '', '', '', NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', ''),
(7, NULL, NULL, 'AKPER PEMERINTAH KABUPATEN CIANJUR', '', '', '', NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', ''),
(8, NULL, NULL, 'AKPER KEBONJATI', '', '', '', NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', ''),
(9, NULL, NULL, 'AKPER LUWUK', '', '', '', NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', ''),
(10, NULL, NULL, 'AKPER PEMBINA PALEMBANG', '', '', '', NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', ''),
(11, NULL, NULL, 'AKPER PEMDA KOLAKA', '', '', '', NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', ''),
(12, NULL, NULL, 'AKPER PEMKAB LAHAT', '', '', '', NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', ''),
(13, NULL, NULL, 'AKPER RS. EFARINA PURWAKARTA', '', '', '', NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', ''),
(14, NULL, NULL, 'AKPER SAIFUDDIN ZUHRI INDRAMAYU', '', '', '', NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', ''),
(15, NULL, NULL, 'AKPER SAWERIGADING PEMDA LUWU RAYA PALOPO', '', '', '', NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', ''),
(16, NULL, NULL, 'AKPER SINTANG', '', '', '', NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', ''),
(17, NULL, NULL, 'AKPER TOLITOLI', '', '', '', NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', ''),
(18, NULL, NULL, 'AKPER YPDR JAKARTA', '', '', '', NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', ''),
(19, NULL, NULL, 'UNIVERSITAS KRISTEN MARANATHA', NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, 'Soluta ad incidunt ', './_img/logo_institusi/temp/19.png', 'Dolor sint enim quia', 'C', '1979-10-28', './_file/akred/akred_19_2022-03-17.pdf', 'pengajuan', ''),
(20, NULL, NULL, 'UNIVERSITAS KRISTEN KRIDA WACANA', 'UKRIDA', './_img/logo_institusi/20.png', '', NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', ''),
(21, NULL, NULL, 'UNIVERSITAS ISLAM BANDUNG', 'UNISBA', './_img/logo_institusi/21.png', '', NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', ''),
(23, NULL, NULL, 'UNIVERSITAS PADJADJARAN', 'UNPAD', './_img/logo_institusi/23.png', '', NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', ''),
(25, NULL, NULL, 'UNIVERSITAS JENDERAL ACHMAD YANI', 'UNJANI', './_img/logo_institusi/25.png', '', NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', ''),
(26, NULL, NULL, 'POLTEKKES KEMENKES BANDUNG', '', '', '', NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', ''),
(27, NULL, NULL, 'POLTEKKES TNI AU CIUMBULEUIT BANDUNG', '', '', '', NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', ''),
(28, NULL, NULL, 'POLTEKKES BANTEN', '', '', '', NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', ''),
(29, NULL, NULL, 'POLTEKKES KEMENKES MAKASSAR', '', '', '', NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', ''),
(31, NULL, NULL, 'STIKES AISYIYAH BANDUNG', '', '', '', NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', ''),
(32, NULL, NULL, 'STIKES BANI SALEH', '', '', '', NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', ''),
(33, NULL, NULL, 'STIKES BHAKTI PERTIWI LUWU RAYA PALOPO', '', '', '', NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', ''),
(34, NULL, NULL, 'STIKES BINA PUTERA BANJAR', '', '', '', NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', ''),
(35, NULL, NULL, 'STIKES BORNEO TARAKAN', '', '', '', NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', ''),
(36, NULL, NULL, 'STIKES BUDILUHUR CIMAHI', '', '', '', NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', ''),
(37, NULL, NULL, 'STIKES CIREBON', '', '', '', NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', ''),
(38, NULL, NULL, 'STIKES DEHASEN BENGKULU', '', '', '', NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', ''),
(39, NULL, NULL, 'STIKES DHARMA HUSADA BANDUNG', '', '', '', NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', ''),
(40, NULL, NULL, 'STIKES FALETEHAN', '', '', '', NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', ''),
(41, NULL, NULL, 'STIKES FORT DE KOCK', '', '', '', NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', ''),
(42, NULL, NULL, 'STIKES IMMANUEL BANDUNG', '', '', '', NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', ''),
(43, NULL, NULL, 'STIKES JENDERAL AHMAD YANI', '', '', '', NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', ''),
(44, NULL, NULL, 'STIKES KARSA HUSADA GARUT', '', '', '', NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', ''),
(45, NULL, NULL, 'STIKES KOTA SUKABUMI', '', '', '', NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', ''),
(46, NULL, NULL, 'STIKES KUNINGAN', '', '', '', NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', ''),
(47, NULL, NULL, 'STIKES MAHARDIKA CIREBON', '', '', '', NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', ''),
(48, NULL, NULL, 'STIKES MEDIKA CIKARANG / IMDS', '', '', '', NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', ''),
(49, NULL, NULL, 'STIKES MITRA KENCANA TASIKMALAYA', '', '', '', NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', ''),
(50, NULL, NULL, 'STIKES MUHAMADIYAH CIAMIS', '', '', '', NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', ''),
(51, NULL, NULL, 'STIKES NAN TONGGA LUBUK ALUNG', '', '', '', NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', ''),
(52, NULL, NULL, 'STIKES PPNI JAWA BARAT', '', '', '', NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', ''),
(53, NULL, NULL, 'STIKES RAJAWALI', '', '', '', NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', ''),
(54, NULL, NULL, 'STIKES SANTO BORROMEUS', '', '', '', NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', ''),
(55, NULL, NULL, 'UNIVERSITAS SEBELAS APRIL SUMEDANG', '', '', '', NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', ''),
(56, NULL, NULL, 'STIKES SYEDZA SAINTIKA PADANG', '', '', '', NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', ''),
(57, NULL, NULL, 'STIKES TANA TORAJA', '', '', '', NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', ''),
(58, NULL, NULL, 'STIKES YARSI BUKIT TINGGI', '', '', '', NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', ''),
(59, NULL, NULL, 'STIKES YARSI PONTIANAK', '', '', '', NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', ''),
(60, NULL, NULL, 'STIKES YPIB MAJALENGKA', '', '', '', NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', ''),
(61, NULL, NULL, 'UNIVERSITAS ADVENT INDONESIA', '', '', '', NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', ''),
(62, NULL, NULL, 'UNIVERSITAS BALE BANDUNG', '', '', '', NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', ''),
(63, NULL, NULL, 'UNIVERSITAS BINA SARANA INFORMATIKA', 'BSI', '', '', NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', ''),
(64, NULL, NULL, 'UNIVERSITAS GALUH CIAMIS', '', '', '', NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', ''),
(65, NULL, NULL, 'UNIVERSITAS MUHAMMADIYAH SUKABUMI', '', '', '', NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', ''),
(66, NULL, NULL, 'UNIVERSITAS NEGERI GORONTALO', '', '', '', NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', ''),
(68, NULL, NULL, 'UNIVERSITAS PENDIDIKAN INDONESIA', 'UPI', './_img/logo_institusi/68.png', '', NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', ''),
(69, NULL, NULL, 'UNIVERSITAS RESPATI INDONESIA', '', '', '', NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', ''),
(70, NULL, NULL, 'UNIVERSITAS SAMRATULANGI', '', '', '', NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', ''),
(71, NULL, NULL, 'UNIVERSITAS SULTAN AGENG TIRTAYASA', 'UNTIRTA', '', '', NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', ''),
(72, NULL, NULL, 'POLITEKNIK TEDC BANDUNG', '', '', '', NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', ''),
(73, NULL, NULL, 'UNIVERSITAS PELITA HARAPAN', '', '', '', NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', ''),
(74, NULL, NULL, 'POLTEKKES YAPKESBI SUKABUMI', '', '', '', NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', ''),
(75, NULL, NULL, 'AKPER YPIB MAJALENGKA', '', '', '', NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', ''),
(76, NULL, NULL, 'UNIVERSITAS MUHAMMADIYAH TASIKMALAYA', '', '', '', NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', ''),
(78, NULL, NULL, 'POLITEKNIK NEGERI SUBANG', 'POLSUB', './_img/logo_institusi/78.png', '', NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', ''),
(81, NULL, NULL, 'SEKOLAH TINGGI ILMU KESEHATAN INDONESIA MAJU', '', '', '', NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', ''),
(82, NULL, NULL, 'UNIVERSITAS BHAKTI KENCANA', 'UBK', './_img/logo_institusi/82.png', '', NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', ''),
(83, NULL, NULL, 'POLTEKKES KEMENKES JAYAPURA', '', '', '', NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', ''),
(84, NULL, NULL, 'POLITEKNIK NEGERI INDRAMAYU', '', '', '', NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', ''),
(85, NULL, NULL, 'UNIVERSITAS KRISTEN SATYA WACANA SALATIGA', '', '', '', NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', ''),
(87, '2022-05-11', NULL, 'RS JIWA PROVINSI JAWA BARAT', 'RSJ*', './_img/logo_institusi/87.png', 'Jl. Kolonel Maturi KM.7, Desa Jambudipa, Kec. Cisarua, Kab. Bandung Barat, 40551', '-- Lainnya --', '3000-01-01', './_file/akred/akred_87_2023-03-09.pdf', '', 'T', NULL, NULL, NULL, NULL, NULL, NULL, '', ''),
(88, NULL, NULL, 'UNIVERSITAS KOMPUTER INDONESIA', 'UNIKOM', './_img/logo_institusi/88.png', '', NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', ''),
(89, '2023-03-09', NULL, 'STIKES RS DUSTIRA', NULL, '', '', NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', ''),
(90, '2023-03-14', NULL, 'POLTEKKES TASIKMALAYA', NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_jenjang_pdd`
--

DROP TABLE IF EXISTS `tb_jenjang_pdd`;
CREATE TABLE `tb_jenjang_pdd` (
  `id_jenjang_pdd` int(11) NOT NULL,
  `nama_jenjang_pdd` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_jenjang_pdd`
--

INSERT INTO `tb_jenjang_pdd` (`id_jenjang_pdd`, `nama_jenjang_pdd`) VALUES
(0, '-- Lainnya --'),
(1, 'SMA'),
(2, 'SMK'),
(3, 'MA'),
(4, 'D1'),
(5, 'D2'),
(6, 'D3'),
(7, 'D4'),
(8, 'S1'),
(9, 'Profesi'),
(10, 'S2');

-- --------------------------------------------------------

--
-- Table structure for table `tb_jurusan_pdd`
--

DROP TABLE IF EXISTS `tb_jurusan_pdd`;
CREATE TABLE `tb_jurusan_pdd` (
  `id_jurusan_pdd` int(11) NOT NULL,
  `nama_jurusan_pdd` text NOT NULL,
  `akronim_jurusan_pdd` text DEFAULT NULL,
  `id_jurusan_pdd_jenis` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_jurusan_pdd`
--

INSERT INTO `tb_jurusan_pdd` (`id_jurusan_pdd`, `nama_jurusan_pdd`, `akronim_jurusan_pdd`, `id_jurusan_pdd_jenis`) VALUES
(0, '-- Lainnya --', NULL, NULL),
(1, 'Kedokteran', NULL, 1),
(2, 'Keperawatan', NULL, 2),
(3, 'Psikologi', NULL, 3),
(4, 'Informasi Teknologi', 'IT', 4),
(5, 'Farmasi', NULL, 3),
(6, 'Pekerja Sosial', 'PEKSOS', 4),
(7, 'Kesehatan Lingkungan', 'KESLING', 3),
(8, 'Rekam Medis', 'RM', 3);

-- --------------------------------------------------------

--
-- Table structure for table `tb_jurusan_pdd_jenis`
--

DROP TABLE IF EXISTS `tb_jurusan_pdd_jenis`;
CREATE TABLE `tb_jurusan_pdd_jenis` (
  `id_jurusan_pdd_jenis` int(11) NOT NULL,
  `nama_jurusan_pdd_jenis` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_jurusan_pdd_jenis`
--

INSERT INTO `tb_jurusan_pdd_jenis` (`id_jurusan_pdd_jenis`, `nama_jurusan_pdd_jenis`) VALUES
(0, '-- Lainnya --'),
(1, 'Kedokteran'),
(2, 'Keperawatan'),
(3, 'Nakes Lainnya'),
(4, 'Non Nakes');

-- --------------------------------------------------------

--
-- Table structure for table `tb_jurusan_pdd_jenjang`
--

DROP TABLE IF EXISTS `tb_jurusan_pdd_jenjang`;
CREATE TABLE `tb_jurusan_pdd_jenjang` (
  `id_jurusan_pdd_jenjang` int(11) NOT NULL,
  `id_jurusan_pdd` int(11) NOT NULL,
  `id_jenjang_pdd` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_jurusan_pdd_jenjang`
--

INSERT INTO `tb_jurusan_pdd_jenjang` (`id_jurusan_pdd_jenjang`, `id_jurusan_pdd`, `id_jenjang_pdd`) VALUES
(1, 1, 9),
(2, 1, 9),
(3, 2, 6),
(4, 2, 7),
(5, 2, 8),
(6, 2, 9),
(7, 3, 6),
(8, 3, 7),
(9, 3, 8),
(10, 3, 9),
(11, 4, 6),
(12, 4, 7),
(13, 4, 8),
(14, 5, 9),
(15, 5, 6),
(16, 5, 7),
(17, 5, 8),
(18, 6, 6),
(19, 6, 7),
(20, 6, 8),
(21, 7, 8),
(22, 7, 7),
(23, 7, 10),
(24, 8, 7),
(25, 8, 8),
(26, 8, 10),
(27, 7, 6),
(28, 8, 6);

-- --------------------------------------------------------

--
-- Table structure for table `tb_jurusan_pdd_jenjang_profesi`
--

DROP TABLE IF EXISTS `tb_jurusan_pdd_jenjang_profesi`;
CREATE TABLE `tb_jurusan_pdd_jenjang_profesi` (
  `id_jurusan_pdd_jenjang` int(11) NOT NULL,
  `id_jurusan_pdd` int(11) NOT NULL,
  `id_jenjang_pdd` int(11) NOT NULL,
  `id_profesi_pdd` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_jurusan_pdd_jenjang_profesi`
--

INSERT INTO `tb_jurusan_pdd_jenjang_profesi` (`id_jurusan_pdd_jenjang`, `id_jurusan_pdd`, `id_jenjang_pdd`, `id_profesi_pdd`) VALUES
(1, 1, 9, 1),
(2, 1, 9, 2),
(3, 2, 6, 0),
(4, 2, 7, 0),
(5, 2, 8, 0),
(6, 2, 9, 5),
(7, 3, 6, 0),
(8, 3, 7, 0),
(9, 3, 8, 0),
(10, 3, 9, 4),
(11, 4, 6, 0),
(12, 4, 7, 0),
(13, 4, 8, 0),
(14, 5, 9, 3),
(15, 5, 6, 0),
(16, 5, 7, 0),
(17, 5, 8, 0),
(18, 6, 6, 0),
(19, 6, 7, 0),
(20, 6, 8, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_kep_nilai`
--

DROP TABLE IF EXISTS `tb_kep_nilai`;
CREATE TABLE `tb_kep_nilai` (
  `id` int(11) NOT NULL,
  `jenis_nilai` text NOT NULL,
  `judul1` text NOT NULL,
  `judul2` text NOT NULL,
  `aspek_nilai` text NOT NULL,
  `var_code` text NOT NULL,
  `tipe_data` text NOT NULL,
  `isi_data` text NOT NULL,
  `status` text NOT NULL COMMENT 'belum digunakan'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_kep_nilai`
--

INSERT INTO `tb_kep_nilai` (`id`, `jenis_nilai`, `judul1`, `judul2`, `aspek_nilai`, `var_code`, `tipe_data`, `isi_data`, `status`) VALUES
(1, 'LAPORAN PENDAHULUAN', 'ISI', '-', 'Sistematika Benar', 'A1', 'radio', '1,2,3,4', ''),
(2, 'LAPORAN PENDAHULUAN', 'ISI', '-', 'Lengkap', 'A2', 'radio', '1,2,3,4', ''),
(3, 'LAPORAN PENDAHULUAN', 'ISI', '-', 'Waktu Pengumpulan Tepat', 'A3', 'radio', '1,2,3,4', ''),
(4, 'LAPORAN PENDAHULUAN', 'ISI', '-', 'Bukan Repetisi dan Plagiasi', 'A4', 'radio', '1,2,3,4', ''),
(5, 'LAPORAN PENDAHULUAN', 'RESPONSI LP', '-', 'Mampu menguraikan pengertian', 'B1', 'radio', '1,2,3,4', ''),
(6, 'LAPORAN PENDAHULUAN', 'RESPONSI LP', '-', 'Mampu menguraikan factor penyebab', 'B2', 'radio', '1,2,3,4', ''),
(7, 'LAPORAN PENDAHULUAN', 'RESPONSI LP', '-', 'Mampu menjelaskan proses terjadinya masalah', 'B3', 'radio', '1,2,3,4', ''),
(8, 'LAPORAN PENDAHULUAN', 'RESPONSI LP', '-', 'Mampu menyebutkan masalah keperawatan jiwa yang Muncul', 'B4', 'radio', '1,2,3,4', ''),
(9, 'LAPORAN PENDAHULUAN', 'RESPONSI LP', '-', 'Mampu menjelaskan tindakan keperawatan jiwa', 'B5', 'radio', '1,2,3,4', ''),
(10, 'LAPORAN PENDAHULUAN', 'RESPONSI LP', '-', 'Mampu menyebutkan tindakan dalam aplikasi (contoh kalimat langsung)', 'B6', 'radio', '1,2,3,4', ''),
(11, 'LAPORAN PENDAHULUAN', 'REFERENSI', '-', 'Pustaka yang digunakan 10 tahun terakhir', 'C1', 'radio', '1,2,3,4', ''),
(12, 'LAPORAN PENDAHULUAN', 'REFERENSI', '-', 'Pustaka relevan dengan keperawatan jiwa', 'C2', 'radio', '1,2,3,4', ''),
(13, 'LAPORAN PENDAHULUAN', 'REFERENSI', '-', 'Menggunakan lebih dari 3 referensi text book', 'C3', 'radio', '1,2,3,4', ''),
(14, 'STRATEGI PELAKSANAAN TINDAKAN KEPERAWATAN', 'FORMAT SP', '-', 'Sesuai kaidah kalimat langsung', 'A1', 'radio', '1,2,3,4', ''),
(15, 'STRATEGI PELAKSANAAN TINDAKAN KEPERAWATAN', 'FORMAT SP', '-', 'Format SP Terisi Lengkap', 'A2', 'radio', '1,2,3,4', ''),
(16, 'STRATEGI PELAKSANAAN TINDAKAN KEPERAWATAN', 'FORMAT SP', '-', 'Fase Kerja lengkap', 'A3', 'radio', '1,2,3,4', ''),
(17, 'STRATEGI PELAKSANAAN TINDAKAN KEPERAWATAN', 'FORMAT SP', '-', 'Kesesuaian antara SP dengan Komter', 'A4', 'radio', '1,2,3,4', ''),
(18, 'STRATEGI PELAKSANAAN TINDAKAN KEPERAWATAN', 'ORIENTASI', '-', 'Melakukan salam terapeutik', 'B1', 'radio', '1,2,3,4', ''),
(19, 'STRATEGI PELAKSANAAN TINDAKAN KEPERAWATAN', 'ORIENTASI', '-', 'Melakukan evaluasi/validasi', 'B2', 'radio', '1,2,3,4', ''),
(20, 'STRATEGI PELAKSANAAN TINDAKAN KEPERAWATAN', 'ORIENTASI', '-', 'Kontrak (Topik, waktu, tempat)', 'B3', 'radio', '1,2,3,4', ''),
(21, 'STRATEGI PELAKSANAAN TINDAKAN KEPERAWATAN', 'ORIENTASI', '-', 'Tujuan tindakan/pembicaraan', 'B4', 'radio', '1,2,3,4', ''),
(22, 'STRATEGI PELAKSANAAN TINDAKAN KEPERAWATAN', 'KERJA', '-', 'Posisi, Sikap, dan teknik komter sesuai', 'C1', 'radio', '1,2,3,4', ''),
(23, 'STRATEGI PELAKSANAAN TINDAKAN KEPERAWATAN', 'KERJA', '-', 'Bersikap empati dan memperhatikan KDM Klien', 'C2', 'radio', '1,2,3,4', ''),
(24, 'STRATEGI PELAKSANAAN TINDAKAN KEPERAWATAN', 'KERJA', '-', 'Pernyataan/pertanyaan sesuai dengan tujuan yang akan Dicapai', 'C3', 'radio', '1,2,3,4', ''),
(25, 'STRATEGI PELAKSANAAN TINDAKAN KEPERAWATAN', 'KERJA', '-', 'Bersikap respek (menghargai klien)', 'C4', 'radio', '1,2,3,4', ''),
(26, 'STRATEGI PELAKSANAAN TINDAKAN KEPERAWATAN', 'KERJA', '-', 'Berfokus kepada klien dengan teknik listening', 'C5', 'radio', '1,2,3,4', ''),
(27, 'STRATEGI PELAKSANAAN TINDAKAN KEPERAWATAN', 'KERJA', '-', 'Melakukan respon non verbal yang tepat', 'C6', 'radio', '1,2,3,4', ''),
(28, 'STRATEGI PELAKSANAAN TINDAKAN KEPERAWATAN', 'TERMINASI', '-', 'Melakukan evaluasi objektif dan subjektif', 'D1', 'radio', '1,2,3,4', ''),
(29, 'STRATEGI PELAKSANAAN TINDAKAN KEPERAWATAN', 'TERMINASI', '-', 'Menyebutkan tindak lanjut', 'D2', 'radio', '1,2,3,4', ''),
(30, 'STRATEGI PELAKSANAAN TINDAKAN KEPERAWATAN', 'TERMINASI', '-', 'Melakukan kontrak yang akan datang (topik, tempat, waktu) berorientasi pada TIK', 'D3', 'radio', '1,2,3,4', ''),
(31, 'DOKUMENTASI ASUHAN KEPERAWATAN JIWA', '-', '-', 'Mengumpulkan data yang komprehensif dan akurat', 'A1', 'radio', '1,2,3,4', ''),
(32, 'DOKUMENTASI ASUHAN KEPERAWATAN JIWA', '-', '-', 'Mengidentifikasi masalah klien yang actual dan resiko', 'A2', 'radio', '1,2,3,4', ''),
(33, 'DOKUMENTASI ASUHAN KEPERAWATAN JIWA', '-', '-', 'Memprioritaskan masalah klien', 'A3', 'radio', '1,2,3,4', ''),
(34, 'DOKUMENTASI ASUHAN KEPERAWATAN JIWA', '-', '-', 'Merumuskan diagnosis berdasarkan masalah yang ditemukan sesuai dengan kebutuhan pasien', 'A4', 'radio', '1,2,3,4', ''),
(35, 'DOKUMENTASI ASUHAN KEPERAWATAN JIWA', '-', '-', 'Menetapkan tujuan tindakan sesuai dengan diagnosis', 'A5', 'radio', '1,2,3,4', ''),
(36, 'DOKUMENTASI ASUHAN KEPERAWATAN JIWA', '-', '-', 'Membuat kriteria evaluasi dengan prinsip SMART', 'A6', 'radio', '1,2,3,4', ''),
(37, 'DOKUMENTASI ASUHAN KEPERAWATAN JIWA', '-', '-', 'Menetapkan tindakan untuk mencapai tujuan', 'A7', 'radio', '1,2,3,4', ''),
(38, 'DOKUMENTASI ASUHAN KEPERAWATAN JIWA', '-', '-', 'Merencanakan kunjungan rumah', 'A8', 'radio', '1,2,3,4', ''),
(39, 'DOKUMENTASI ASUHAN KEPERAWATAN JIWA', '-', '-', 'Membuat rasional secara teoritis terhadap rencana tindakan', 'A9', 'radio', '1,2,3,4', ''),
(40, 'DOKUMENTASI ASUHAN KEPERAWATAN JIWA', '-', '-', 'Mengimplementasikan tindakan sesuai rencana', 'A10', 'radio', '1,2,3,4', ''),
(41, 'DOKUMENTASI ASUHAN KEPERAWATAN JIWA', '-', '-', 'Mencatat semua perilaku klien setelah implementasi dan melakukan penilaian keberhasilan rencana tindakan', 'A11', 'radio', '1,2,3,4', ''),
(42, 'DOKUMENTASI ASUHAN KEPERAWATAN JIWA', '-', '-', 'Mengevaluasi pencapaian kemampuan klien untuk tiap diagnosa', 'A12', 'radio', '1,2,3,4', ''),
(43, 'TERAPI AKTIVITAS KELOMPOK', 'PERENCANAAN', 'Persiapan', 'Materi', 'A1', 'radio', '1,2,3,4', ''),
(44, 'TERAPI AKTIVITAS KELOMPOK', 'PERENCANAAN', 'Persiapan', 'Alat yang digunakan', 'A2', 'radio', '1,2,3,4', ''),
(45, 'TERAPI AKTIVITAS KELOMPOK', 'PERENCANAAN', 'Persiapan', 'Setting terapis/peserta', 'A3', 'radio', '1,2,3,4', ''),
(46, 'TERAPI AKTIVITAS KELOMPOK', 'PERENCANAAN', 'Persiapan', 'Pembagian tugas terapis', 'A4', 'radio', '1,2,3,4', ''),
(47, 'TERAPI AKTIVITAS KELOMPOK', 'PELAKSANAAN', 'Sambutan', 'Salam terapeutik', 'B1', 'radio', '1,2,3,4', ''),
(48, 'TERAPI AKTIVITAS KELOMPOK', 'PELAKSANAAN', 'Sambutan', 'Memperkenalkan diri dan terapis lainnya', 'B2', 'radio', '1,2,3,4', ''),
(49, 'TERAPI AKTIVITAS KELOMPOK', 'PELAKSANAAN', 'Sambutan', 'Kontrak (waktu, tujuan, kegiatan)', 'B3', 'radio', '1,2,3,4', ''),
(50, 'TERAPI AKTIVITAS KELOMPOK', 'PELAKSANAAN', 'Sambutan', 'Menjelaskan aturan permainan TAK', 'B4', 'radio', '1,2,3,4', ''),
(51, 'TERAPI AKTIVITAS KELOMPOK', 'PELAKSANAAN', 'Pelaksanaan', 'Memodivikasi klien (peserta TAK) untuk aktif melakukan kegiatan', 'C1', 'radio', '1,2,3,4', ''),
(52, 'TERAPI AKTIVITAS KELOMPOK', 'PELAKSANAAN', 'Pelaksanaan', 'Melakukan antisipasi masalah , pada klien yang tidak aktif, meninggalkan permainan tanpa pamit,bila ada klien lain yang ingin ikut.', 'C2', 'radio', '1,2,3,4', ''),
(53, 'TERAPI AKTIVITAS KELOMPOK', 'PELAKSANAAN', 'Terminasi', 'Memotivasi klien secara kontinyu melakukan TAK', 'D1', 'radio', '1,2,3,4', ''),
(54, 'TERAPI AKTIVITAS KELOMPOK', 'PELAKSANAAN', 'Terminasi', 'Menjelaskan pencapaian tujuan', 'D2', 'radio', '1,2,3,4', ''),
(55, 'TERAPI AKTIVITAS KELOMPOK', 'PELAKSANAAN', 'Terminasi', 'Menutup kegiatan', 'D3', 'radio', '1,2,3,4', ''),
(56, 'TERAPI AKTIVITAS KELOMPOK', 'EVALUASI', '-', 'Mendokumentasikan hasil kegiatan', 'E1', 'radio', '1,2,3,4', ''),
(57, 'Terhadap Sikap Dan Perilaku Selama Melakukan Kegiatan Praktek', '-', '-', 'Kedisiplinan (tepat waktu, mengikutitata tertib)', 'A1', 'select', '10,20,30,40,50,60,70,80,90,100', ''),
(58, 'Terhadap Sikap Dan Perilaku Selama Melakukan Kegiatan Praktek', '-', '-', 'Kerjasama (dengan teman, instruktur, dan tenaga lain)', 'A2', 'select', '10,20,30,40,50,60,70,80,90,100', ''),
(59, 'Terhadap Sikap Dan Perilaku Selama Melakukan Kegiatan Praktek', '-', '-', 'Ketelitian (dalam perhitungan,analisis, evaluasi)', 'A3', 'select', '10,20,30,40,50,60,70,80,90,100', ''),
(60, 'Terhadap Sikap Dan Perilaku Selama Melakukan Kegiatan Praktek', '-', '-', 'Inisiatif (mengambil keputusan,menyelesaikan masalah)', 'A4', 'select', '10,20,30,40,50,60,70,80,90,100', ''),
(61, 'Terhadap Sikap Dan Perilaku Selama Melakukan Kegiatan Praktek', '-', '-', 'Kreativitas menyelesaikan tugas/laporan', 'A5', 'select', '10,20,30,40,50,60,70,80,90,100', ''),
(62, 'Terhadap Sikap Dan Perilaku Selama Melakukan Kegiatan Praktek', '-', '-', 'Sopan santun (dengan pasien, instruktur, pengunjung RS, dantenaga lainnya)', 'A6', 'select', '10,20,30,40,50,60,70,80,90,100', ''),
(63, 'Terhadap Sikap Dan Perilaku Selama Melakukan Kegiatan Praktek', '-', '-', 'Tanggung jawab (menyelesaikantugas individu/kelompok)', 'A7', 'select', '10,20,30,40,50,60,70,80,90,100', ''),
(64, 'Terhadap Sikap Dan Perilaku Selama Melakukan Kegiatan Praktek', '-', '-', 'Keramahan (dengan pasien, instruktur, pengunjung RS, dan tenaga lainnya)', 'A8', 'select', '10,20,30,40,50,60,70,80,90,100', '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kep_nilai_data`
--

DROP TABLE IF EXISTS `tb_kep_nilai_data`;
CREATE TABLE `tb_kep_nilai_data` (
  `id` int(11) NOT NULL,
  `id_praktikan` int(11) NOT NULL,
  `tgl_tambah` date NOT NULL,
  `tgl_ubah` date NOT NULL,
  `jenis_nilai` int(11) NOT NULL,
  `judul1` int(11) NOT NULL,
  `judul2` int(11) NOT NULL,
  `aspek_nilai` text NOT NULL,
  `nilai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_kep_nil_dokaskep`
--

DROP TABLE IF EXISTS `tb_kep_nil_dokaskep`;
CREATE TABLE `tb_kep_nil_dokaskep` (
  `id` int(11) NOT NULL,
  `tgl_input` date DEFAULT NULL,
  `tgl_ubah` date DEFAULT NULL,
  `id_praktikan` int(11) NOT NULL,
  `1` int(11) NOT NULL,
  `2` int(11) DEFAULT NULL,
  `3` int(11) DEFAULT NULL,
  `4` int(11) DEFAULT NULL,
  `5` int(11) DEFAULT NULL,
  `6` int(11) DEFAULT NULL,
  `7` int(11) DEFAULT NULL,
  `8` int(11) DEFAULT NULL,
  `9` int(11) DEFAULT NULL,
  `10` int(11) DEFAULT NULL,
  `11` int(11) DEFAULT NULL,
  `12` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_kep_nil_lap_pen`
--

DROP TABLE IF EXISTS `tb_kep_nil_lap_pen`;
CREATE TABLE `tb_kep_nil_lap_pen` (
  `id` int(11) NOT NULL,
  `tgl_input` date NOT NULL,
  `tgl_ubah` date DEFAULT NULL,
  `id_praktikan` int(11) NOT NULL,
  `A1` int(11) DEFAULT NULL,
  `A2` int(11) DEFAULT NULL,
  `A3` int(11) DEFAULT NULL,
  `A4` int(11) DEFAULT NULL,
  `B1` int(11) DEFAULT NULL,
  `B2` int(11) DEFAULT NULL,
  `B3` int(11) DEFAULT NULL,
  `B4` int(11) DEFAULT NULL,
  `B5` int(11) DEFAULT NULL,
  `B6` int(11) DEFAULT NULL,
  `C1` int(11) DEFAULT NULL,
  `C2` int(11) DEFAULT NULL,
  `C3` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_kep_nil_lap_pen`
--

INSERT INTO `tb_kep_nil_lap_pen` (`id`, `tgl_input`, `tgl_ubah`, `id_praktikan`, `A1`, `A2`, `A3`, `A4`, `B1`, `B2`, `B3`, `B4`, `B5`, `B6`, `C1`, `C2`, `C3`) VALUES
(7, '2023-03-08', NULL, 3, 1, 1, 4, 1, 3, 2, 1, 4, 1, 3, 2, 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `tb_kep_nil_sikapprilaku`
--

DROP TABLE IF EXISTS `tb_kep_nil_sikapprilaku`;
CREATE TABLE `tb_kep_nil_sikapprilaku` (
  `id` int(11) NOT NULL,
  `tgl_input` date NOT NULL,
  `tgl_ubah` date DEFAULT NULL,
  `id_praktikan` int(11) NOT NULL,
  `1` int(11) DEFAULT NULL,
  `2` int(11) DEFAULT NULL,
  `3` int(11) DEFAULT NULL,
  `4` int(11) DEFAULT NULL,
  `5` int(11) DEFAULT NULL,
  `6` int(11) DEFAULT NULL,
  `7` int(11) DEFAULT NULL,
  `8` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_kep_nil_sptk`
--

DROP TABLE IF EXISTS `tb_kep_nil_sptk`;
CREATE TABLE `tb_kep_nil_sptk` (
  `id` int(11) NOT NULL,
  `tgl_input` date NOT NULL,
  `tgl_ubah` date DEFAULT NULL,
  `id_praktikan` int(11) NOT NULL,
  `A1` int(11) NOT NULL,
  `A2` int(11) DEFAULT NULL,
  `A3` int(11) DEFAULT NULL,
  `A4` int(11) DEFAULT NULL,
  `B1` int(11) DEFAULT NULL,
  `B2` int(11) DEFAULT NULL,
  `B3` int(11) DEFAULT NULL,
  `B4` int(11) DEFAULT NULL,
  `C1` int(11) DEFAULT NULL,
  `C2` int(11) DEFAULT NULL,
  `C3` int(11) DEFAULT NULL,
  `C4` int(11) DEFAULT NULL,
  `C5` int(11) DEFAULT NULL,
  `C6` int(11) DEFAULT NULL,
  `D1` int(11) DEFAULT NULL,
  `D2` int(11) DEFAULT NULL,
  `D3` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_kep_nil_terakkel`
--

DROP TABLE IF EXISTS `tb_kep_nil_terakkel`;
CREATE TABLE `tb_kep_nil_terakkel` (
  `id` int(11) NOT NULL,
  `tgl_input` int(11) NOT NULL,
  `tgl_ubah` int(11) DEFAULT NULL,
  `id_praktikan` int(11) NOT NULL,
  `1-1` int(11) DEFAULT NULL,
  `1-2` int(11) DEFAULT NULL,
  `1-3` int(11) DEFAULT NULL,
  `1-4` int(11) DEFAULT NULL,
  `2A1` int(11) DEFAULT NULL,
  `2A2` int(11) DEFAULT NULL,
  `2A3` int(11) DEFAULT NULL,
  `2A4` int(11) DEFAULT NULL,
  `2B1` int(11) DEFAULT NULL,
  `2B2` int(11) DEFAULT NULL,
  `2C1` int(11) DEFAULT NULL,
  `2C2` int(11) DEFAULT NULL,
  `2C3` int(11) DEFAULT NULL,
  `3-1` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_kerjasama`
--

DROP TABLE IF EXISTS `tb_kerjasama`;
CREATE TABLE `tb_kerjasama` (
  `id` int(11) NOT NULL,
  `id_institusi` text NOT NULL,
  `tgl_input_mou` date DEFAULT NULL,
  `tgl_ubah_mou` date DEFAULT NULL,
  `tgl_mulai_mou` date DEFAULT NULL,
  `tgl_selesai_mou` date DEFAULT NULL,
  `no_pks_rsj` text NOT NULL,
  `no_pks_institusi` text NOT NULL,
  `id_jurusan_pdd` int(11) NOT NULL,
  `id_profesi_pdd` int(11) NOT NULL,
  `id_jenjang_pdd` int(11) NOT NULL,
  `file_mou` text DEFAULT NULL,
  `file_pks` text DEFAULT NULL,
  `arsip` enum('T','Y') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_kerjasama`
--

INSERT INTO `tb_kerjasama` (`id`, `id_institusi`, `tgl_input_mou`, `tgl_ubah_mou`, `tgl_mulai_mou`, `tgl_selesai_mou`, `no_pks_rsj`, `no_pks_institusi`, `id_jurusan_pdd`, `id_profesi_pdd`, `id_jenjang_pdd`, `file_mou`, `file_pks`, `arsip`) VALUES
(1, '87', NULL, NULL, '2022-01-05', '2023-08-18', '-', '-', 0, 0, 0, NULL, NULL, NULL),
(2, '2', NULL, NULL, '2014-02-13', '2022-01-05', '- ', '-', 0, 0, 0, NULL, NULL, NULL),
(3, '3', NULL, NULL, '2018-08-20', '2021-08-19', '119/14858/RSJ', '036/AKP/BK-A/VIII/2018', 0, 0, 0, NULL, NULL, NULL),
(4, '4', NULL, NULL, '2017-12-22', '2020-12-21', '119/19834/RSJ', '355/PKS/AKBM/XII/2017', 0, 0, 0, NULL, NULL, NULL),
(5, '5', NULL, NULL, '2019-06-19', '2022-06-18', '073/10582/RSJ', 'B. 167/AKPER BPC/VI/2019', 0, 0, 0, NULL, NULL, NULL),
(6, '6', NULL, NULL, '2018-07-06', '2021-07-05', '119/11581/RSJ', 'PKS/008/AKPER RSD/VII/2018', 0, 0, 0, NULL, NULL, NULL),
(7, '7', NULL, NULL, '2018-11-12', '2021-11-11', '119/20549A/RSJ', '420/526/AKPER/2018', 0, 0, 0, NULL, NULL, NULL),
(8, '8', NULL, NULL, '2015-01-02', '2018-01-01', '-', 'YK/AKTI/PKS/01/01/2015', 0, 0, 0, NULL, NULL, NULL),
(9, '9', NULL, NULL, '2019-02-06', '2022-02-05', '119/2418/RSJ', '032/AL.A/SKS.01/II/2019', 0, 0, 0, NULL, NULL, NULL),
(10, '10', NULL, NULL, '2013-06-12', '2016-06-11', '-', '-', 0, 0, 0, NULL, NULL, NULL),
(11, '11', NULL, NULL, '2014-07-17', '2017-07-16', '-', '-', 0, 0, 0, NULL, NULL, NULL),
(12, '12', NULL, NULL, '2014-01-21', '2017-01-20', '-', '-', 0, 0, 0, NULL, NULL, NULL),
(13, '13', NULL, NULL, '2014-03-28', '2017-03-27', '-', '-', 0, 0, 0, NULL, NULL, NULL),
(14, '14', NULL, NULL, '2018-09-12', '2021-09-11', '119/16344/RSJ', '007 KS/AKSARI/IX/2018', 0, 0, 0, NULL, NULL, NULL),
(15, '15', NULL, NULL, '2014-05-14', '2017-05-13', '-', '-', 0, 0, 0, NULL, NULL, NULL),
(16, '16', NULL, NULL, '2011-06-13', '2014-06-12', '-', '-', 0, 0, 0, NULL, NULL, NULL),
(17, '17', NULL, NULL, '2014-01-01', '2016-12-31', '-', '-', 0, 0, 0, NULL, NULL, NULL),
(18, '18', NULL, NULL, '2014-10-21', '2017-10-20', '-', '-', 0, 0, 0, NULL, NULL, NULL),
(19, '19', NULL, NULL, '2019-08-01', '2022-07-31', '119/12968/RSJ', '087/DIR/PKS-RSI/VIII/2019\nDan\n038/PKS/DN/FUKM/VIII/2019', 0, 0, 0, NULL, NULL, NULL),
(20, '20', NULL, NULL, '2019-05-29', '2022-05-28', '119/1458/RSJ', '551A/UKKW/FK/D/V/2019\nDan\n173/072-26/2019', 0, 0, 0, NULL, NULL, NULL),
(21, '21', NULL, NULL, '2019-09-17', '2022-09-16', '119/15675/RSJ', '445/1318/UHP-RS Ihsan\nDan\n108/Dek/FK/IX/2019', 0, 0, 0, NULL, NULL, NULL),
(22, '22', NULL, NULL, '2015-10-29', '2018-10-28', '07313324/RSJ/2015', '005/KS-FK UNJANI/X/2015', 0, 0, 0, NULL, NULL, NULL),
(23, '23', NULL, NULL, '2020-07-01', '2023-07-01', '119/10058/RSJ', 'HK.03.01/X.4.2.1/14120/2020\ndan 677/UN6.C/PKS/2020', 0, 0, 0, NULL, NULL, NULL),
(24, '24', NULL, NULL, '2021-12-06', '2024-12-05', '119/16520/RSJ', '1358/UN6.L/PKS/2021', 2, 2, 10, NULL, NULL, NULL),
(25, '25', NULL, NULL, '2014-03-10', '2017-03-09', '-', '-', 0, 0, 0, NULL, NULL, NULL),
(26, '26', NULL, NULL, '2018-11-19', '2021-11-18', '119/209634/RSJ', 'HK.05.01/1.6/5004/2018', 0, 0, 0, NULL, NULL, NULL),
(27, '27', NULL, NULL, '2020-01-08', '2023-01-07', '075/0409/RSJ/I/2020', '016/POLTEKKES/I/2020', 0, 0, 0, NULL, NULL, NULL),
(28, '28', NULL, NULL, '2012-06-04', '2015-06-04', '-', '-', 0, 0, 0, NULL, NULL, NULL),
(29, '29', NULL, NULL, '2014-12-12', '2017-12-11', '-', '-', 0, 0, 0, NULL, NULL, NULL),
(30, '30', NULL, NULL, '2014-09-26', '2017-09-25', '-', '-', 0, 0, 0, NULL, NULL, NULL),
(31, '31', NULL, NULL, '2019-04-08', '2022-04-07', '073/6519/RSJ', '808/MOU.02/STIKES-AB/IV/2019', 0, 0, 0, NULL, NULL, NULL),
(32, '32', NULL, NULL, '2014-01-30', '2017-01-29', '-', '-', 0, 0, 0, NULL, NULL, NULL),
(33, '33', NULL, NULL, '2012-09-07', '2015-09-07', '-', '-', 0, 0, 0, NULL, NULL, NULL),
(34, '34', NULL, NULL, '2011-07-26', '2014-07-25', '-', '-', 0, 0, 0, NULL, NULL, NULL),
(35, '35', NULL, NULL, '2012-05-03', '2015-05-03', '-', '-', 0, 0, 0, NULL, NULL, NULL),
(36, '36', NULL, NULL, '2018-07-03', '2021-07-02', '073/11261/RSJ', '505/D/BAHUK-STIKES/VII/2018', 0, 0, 0, NULL, NULL, NULL),
(37, '37', NULL, NULL, '2020-11-02', '2023-11-02', '073/0090/RSJ', '672/B/STIKESCRB/I/2018', 0, 0, 0, NULL, NULL, NULL),
(38, '38', NULL, NULL, '2014-01-01', '2016-12-31', '-', '-', 0, 0, 0, NULL, NULL, NULL),
(39, '39', NULL, NULL, '2018-07-23', '2021-07-22', '119/12949/RSJ', '120/SDHB/PKS/TU/VII/2018', 0, 0, 0, NULL, NULL, NULL),
(40, '40', NULL, NULL, '2018-07-13', '2021-07-12', '073/12321/RSJ', '810/STIKES-FA/MOU/VII/2018', 0, 0, 0, NULL, NULL, NULL),
(41, '41', NULL, NULL, '2018-09-29', '2021-09-28', '119/17531/RSJ', '1138/K/STIKES.DK/IX/2018', 0, 0, 0, NULL, NULL, NULL),
(42, '42', NULL, NULL, '2019-10-29', '2022-10-28', '073/18015/RSJ/X/2019', '270/STIKI/WK.III/X/2019', 0, 0, 0, NULL, NULL, NULL),
(43, '43', NULL, NULL, '2019-03-26', '2022-03-25', '075/4422/RSJ', 'PKS/018/STIKES/III/2019', 0, 0, 0, NULL, NULL, NULL),
(44, '44', NULL, NULL, '2018-04-30', '2021-04-29', '-', '0324/STIKES-KHG-MOU-IV/2018', 0, 0, 0, NULL, NULL, NULL),
(45, '45', NULL, NULL, '2020-12-01', '2023-12-01', '073/19852/RSJ/XII/2020', '67/HO.00.03/TU-STIKESMI/XII/2020', 0, 0, 0, NULL, NULL, NULL),
(46, '46', NULL, NULL, '2019-04-15', '2022-04-14', '073/8115/RSJ', 'B.010/STIKKU/MoU/IV/2019', 0, 0, 0, NULL, NULL, NULL),
(47, '47', NULL, NULL, '2011-03-21', '2014-03-20', '-', '-', 0, 0, 0, NULL, NULL, NULL),
(48, '48', NULL, NULL, '2014-01-01', '2016-12-31', '-', '-', 0, 0, 0, NULL, NULL, NULL),
(49, '49', NULL, NULL, '2019-01-04', '2022-01-03', '075/0239/RSJ', '057/STIKES-MK/MOU/I/2019', 0, 0, 0, NULL, NULL, NULL),
(50, '50', NULL, NULL, '2019-12-14', '2022-12-13', '073/DIKLIT-5632/III/2016', '028/III.3,AU/B/2016', 0, 0, 0, NULL, NULL, NULL),
(51, '51', NULL, NULL, '2015-04-06', '2018-04-05', '073/1965/TSJ', 'DL.02.02.1965.04.2015', 0, 0, 0, NULL, NULL, NULL),
(52, '52', NULL, NULL, '2018-09-14', '2021-09-13', '119/16549/RSJ', 'III/884.1/STIKEP/PPNI/JBR/IX/2018', 0, 0, 0, NULL, NULL, NULL),
(53, '53', NULL, NULL, '2020-06-26', '2023-06-26', '119/9816/RSJ', 'PKS.032/IKR-I/R/VI/2020', 0, 0, 0, NULL, NULL, NULL),
(54, '54', NULL, NULL, '2020-12-15', '2023-12-15', '073/20903/RSJ', '017/STIKes-SB/SP-KS/XII/2020', 0, 0, 0, NULL, NULL, NULL),
(55, '55', NULL, '2023-03-21', '2022-08-26', '2025-08-25', '1447/HK.03/RSJ/2022', '125/MoU/FIKes/UNSAP/VII/2022', 2, 5, 9, '', './_file/mou-pks/pks_bf442fce05c2641c4f67727019ee73c6.pdf', NULL),
(56, '56', NULL, NULL, '2014-01-01', '2016-12-31', '', '', 0, 0, 0, NULL, NULL, NULL),
(57, '57', NULL, NULL, '2015-01-26', '2018-01-25', '073/0428/RSJ', '?/STIKES-TT/I/2015', 0, 0, 0, NULL, NULL, NULL),
(58, '58', NULL, NULL, '2014-03-03', '2017-03-02', '', '', 0, 0, 0, NULL, NULL, NULL),
(59, '59', NULL, NULL, '2016-05-02', '2019-05-02', '073/7945/RSJ/2016', '168/STIKES.YSI/V/2016', 0, 0, 0, NULL, NULL, NULL),
(60, '60', NULL, NULL, '2020-12-21', '2023-12-21', '119/21223/RSJ', 'A-46/MoU/LPPM-STIKesYPIB/XII/2020', 0, 0, 0, NULL, NULL, NULL),
(61, '61', NULL, '2023-03-27', '2021-09-24', '2024-09-23', '-073/11988/RSJ', '-134/REK/UNAI/EXT/IX/2021', 2, 3, 9, './_file/mou-pks/mou_8d898f592745bb607d591753d71d4480.pdf', './_file/mou-pks/pks_8d898f592745bb607d591753d71d4480.pdf', NULL),
(62, '62', NULL, NULL, '2018-11-26', '2021-11-25', '119/20217A/RSJ', '06/FIKES/UNIBA/01/XI/2018', 0, 0, 0, NULL, NULL, NULL),
(63, '63', NULL, NULL, '2012-02-15', '2015-02-14', '-', '-', 0, 0, 0, NULL, NULL, NULL),
(64, '64', NULL, NULL, '2018-09-12', '2021-09-11', '119/16531/RSJ', '13/4123/AK/KS/R/IX/2018', 0, 0, 0, NULL, NULL, NULL),
(65, '65', NULL, NULL, '2019-02-20', '2022-02-19', '119/3413/RSJ', '128/I.0/F/2019', 0, 0, 0, NULL, NULL, NULL),
(66, '66', NULL, NULL, '2018-10-15', '2021-10-14', '119/1864/RSJ', '1767/UN47.B7.5.5/F/2018', 0, 0, 0, NULL, NULL, NULL),
(67, '67', NULL, NULL, '2020-11-12', '2023-11-12', '445/18685/RSJ', '1621/UN40.C2/HK/2020', 0, 0, 0, NULL, NULL, NULL),
(68, '68', NULL, NULL, '2019-01-21', '2022-01-20', '119/1332/RSJ', '0223/UN40.A6/DN/2019', 0, 0, 0, NULL, NULL, NULL),
(69, '69', NULL, NULL, '2014-09-04', '2017-09-03', '-', '-', 0, 0, 0, NULL, NULL, NULL),
(70, '70', NULL, NULL, '2014-01-01', '2016-12-31', '-', '-', 0, 0, 0, NULL, NULL, NULL),
(71, '71', NULL, NULL, '2019-04-16', '2022-04-15', '119/6207/RSJ', 'T/5/UN43.2/HK.07.00/2019', 0, 0, 0, NULL, NULL, NULL),
(72, '72', NULL, NULL, '2019-02-01', '2022-01-31', '073/4052/RSJ', '003.01/TEDC/MOU-DIR/II/2019', 0, 0, 0, NULL, NULL, NULL),
(73, '73', NULL, NULL, '2019-03-28', '2022-03-27', '073/5921/RSJ', '002/FOM-UPH/PKS/III/2019', 0, 0, 0, NULL, NULL, NULL),
(74, '74', NULL, NULL, '2019-02-04', '2022-02-03', '119/2307/RSJ', '0098/Q/P.Y.SMI/II/2019', 0, 0, 0, NULL, NULL, NULL),
(75, '75', NULL, NULL, '2018-11-09', '2021-11-08', '119/20494/RSJ', '168/AKPER/B-MOU/IX/2018', 0, 0, 0, NULL, NULL, NULL),
(76, '76', NULL, NULL, '2019-03-11', '2022-03-10', '073/4623/RSJ', '700/FIKES-UMTAS/III/2019', 0, 0, 0, NULL, NULL, NULL),
(77, '77', NULL, NULL, '2018-07-04', '2021-07-03', '073/11279/RSJ', 'HK.05.01/1.6/2460/2018', 0, 0, 0, NULL, NULL, NULL),
(78, '78', NULL, NULL, '2019-07-10', '2022-07-09', '073/10034/RSJ', 'B/13/PL41/HL.04.03/2019', 0, 0, 0, NULL, NULL, NULL),
(79, '79', NULL, NULL, '2014-01-01', '2016-12-31', '-', '-', 0, 0, 0, NULL, NULL, NULL),
(80, '80', NULL, NULL, '2019-07-01', '2022-06-30', '073/11145/RSJ', 'PKS-  /Ffa-UNJANI/VIII/2019', 0, 0, 0, NULL, NULL, NULL),
(81, '81', NULL, NULL, '2019-04-26', '2022-04-25', '070/7441/RSJ', '1932/MOU/K/Ka./STIKIM/VI/2019', 0, 0, 0, NULL, NULL, NULL),
(82, '82', NULL, NULL, '2019-09-26', '2022-09-25', '073/16246/RSJ/IX/2019', '04/14/UBK/IX/2019', 0, 0, 0, NULL, NULL, NULL),
(83, '83', NULL, NULL, '2019-12-16', '2022-12-15', '073/21320/RSJ/XII/2019', 'HK.03.01/1.6/0012/2019', 0, 0, 0, NULL, NULL, NULL),
(84, '84', NULL, NULL, '2020-07-30', '2023-07-30', '073/11662/RSJ', '888/PL42/KS/2020', 0, 0, 0, NULL, NULL, NULL),
(85, '85', NULL, NULL, '2020-11-18', '2023-11-18', '073/18973/RSJ', '247/PKS/UKSW/XI/2020', 0, 0, 0, NULL, NULL, NULL),
(86, '86', NULL, NULL, '2020-11-02', '2023-11-02', '073/16336/RSJ', '037/PKS/DN/FKUKMXI/2020', 0, 0, 0, NULL, NULL, NULL),
(87, '29', NULL, NULL, '1984-04-12', '1987-04-12', 'Occaecat ut obcaecat', 'Cumque voluptatem A', 7, 3, 10, NULL, NULL, NULL),
(88, '1', NULL, '2022-04-24', '2010-10-20', '2013-10-20', '-', '-', 0, 0, 0, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_kuota`
--

DROP TABLE IF EXISTS `tb_kuota`;
CREATE TABLE `tb_kuota` (
  `id_kuota` int(11) NOT NULL,
  `id_jurusan_pdd` int(11) NOT NULL,
  `tgl_tambah_kuota` date DEFAULT NULL,
  `nama_kuota` text NOT NULL,
  `jumlah_kuota` int(11) NOT NULL,
  `ket_kuota` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_kuota`
--

INSERT INTO `tb_kuota` (`id_kuota`, `id_jurusan_pdd`, `tgl_tambah_kuota`, `nama_kuota`, `jumlah_kuota`, `ket_kuota`) VALUES
(1, 1, NULL, 'Kedokteran-Keperawatan (KED-KEP)', 250, '2 Jurusan digabungkan'),
(2, 5, NULL, 'Farmasi (FAR)', 14, '-.'),
(3, 7, NULL, 'Kesehatan Lingkungan (KESLING)', 7, ''),
(4, 3, NULL, 'Psikologi (PSI)', 14, ''),
(5, 8, NULL, 'Rekam Medis (RM)', 14, ''),
(6, 4, NULL, 'Informasi Teknologi (IT)', 7, ''),
(7, 6, NULL, 'Pekerja Sosial (PEKSOS)', 7, '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_lapor`
--

DROP TABLE IF EXISTS `tb_lapor`;
CREATE TABLE `tb_lapor` (
  `id_lapor` int(11) NOT NULL,
  `judul_lapor` text NOT NULL,
  `deskripsi_lapor` text NOT NULL,
  `level_lapor` text NOT NULL,
  `tgl_lapor` date DEFAULT NULL,
  `status_lapor` text NOT NULL,
  `nama_lapor` text NOT NULL,
  `link_lapor` text NOT NULL,
  `file_lapor` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_lapor`
--

INSERT INTO `tb_lapor` (`id_lapor`, `judul_lapor`, `deskripsi_lapor`, `level_lapor`, `tgl_lapor`, `status_lapor`, `nama_lapor`, `link_lapor`, `file_lapor`) VALUES
(1, 'Data Institusi', 'Data Institusi berbeda saat pendaftaran', 'tinggi', '2022-01-02', 'PROSES', 'Ade Ihsan', '192.168.7.89/sm/?prk', './_file/lapor/lapor_1_2022-01-03.png'),
(3, 'Data tarif', 'Data tarif Tidak Sesuai jurusan', 'sedang', '2022-01-03', 'CEK', 'Rani Riffani', '192.168.7.88/sm/?trk&dtl=1', './_file/lapor/lapor_3_2022-01-03.png');

-- --------------------------------------------------------

--
-- Table structure for table `tb_logbook_kep_kompetensi`
--

DROP TABLE IF EXISTS `tb_logbook_kep_kompetensi`;
CREATE TABLE `tb_logbook_kep_kompetensi` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_praktikan` int(11) NOT NULL,
  `tgl_input` date NOT NULL,
  `jam_input` time NOT NULL,
  `nama` text NOT NULL,
  `tgl_pel` date NOT NULL,
  `paraf` enum('-','T','Y') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_logbook_kep_kompetensi`
--

INSERT INTO `tb_logbook_kep_kompetensi` (`id`, `id_user`, `id_praktikan`, `tgl_input`, `jam_input`, `nama`, `tgl_pel`, `paraf`) VALUES
(2, 3, 2, '2023-03-01', '04:21:39', 'Mempersiapkan Klien ECT ', '1995-10-01', NULL),
(3, 3, 2, '2023-03-01', '04:21:55', 'Komunikasi Terapeutik ', '1999-04-25', NULL),
(4, 3, 2, '2023-03-01', '04:22:04', 'Strategi Pelaksanaan Tindakan Keperawatan dengan Menggunakan Teknik Komunikasi Terapeutik ', '2022-01-19', NULL),
(5, 3, 2, '2023-03-01', '04:22:58', 'Mempersiapkan Klien ECT ', '2021-04-27', NULL),
(6, 3, 2, '2023-03-01', '04:23:38', 'Presentasi Literatur Review ', '1984-02-04', NULL),
(7, 3, 2, '2023-03-01', '04:24:17', 'Menyiapkan/ Membantu Klien Makan ', '1976-04-20', NULL),
(8, 3, 2, '2023-03-01', '04:25:15', 'Pre Conference ', '2006-06-13', NULL),
(9, 3, 2, '2023-03-01', '04:25:23', 'Laporan Pendahuluan ', '2023-03-09', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_logbook_kep_kompetensi_nama`
--

DROP TABLE IF EXISTS `tb_logbook_kep_kompetensi_nama`;
CREATE TABLE `tb_logbook_kep_kompetensi_nama` (
  `id` int(11) NOT NULL,
  `nama` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_logbook_kep_kompetensi_nama`
--

INSERT INTO `tb_logbook_kep_kompetensi_nama` (`id`, `nama`) VALUES
(1, 'Pre Conference'),
(2, 'Laporan Pendahuluan'),
(3, 'Komunikasi Terapeutik'),
(4, 'Post Confrence'),
(5, 'Melakukan Pengkajian pada Klien Jiwa dengan Menggunakan Teknik Komunikasi Terapeutik'),
(6, 'Strategi Pelaksanaan Tindakan Keperawatan dengan Menggunakan Teknik Komunikasi Terapeutik'),
(7, 'Menyusun Asuhan Keperawatan'),
(8, 'Melaksanakan Tindakan Keperawatan'),
(9, 'Melaksanakan Terapi Aktifitas Kelompok'),
(10, 'Menyiapkan/ Membantu Klien Makan'),
(11, 'Memberi Obat pada Klien'),
(12, 'Membimbing Kegiatan Olahraga/Senam'),
(13, 'Melaksanakan/Mengikuti Terapi Musik'),
(14, 'Melakukan/Membimbing Personal Hygiene Klien'),
(15, 'Mempersiapkan Klien ECT'),
(16, 'Melakukan Tindakan Keamanan pada Klien/Pasien'),
(17, 'Presentasi Kasus'),
(18, 'Presentasi Literatur Review');

-- --------------------------------------------------------

--
-- Table structure for table `tb_mess`
--

DROP TABLE IF EXISTS `tb_mess`;
CREATE TABLE `tb_mess` (
  `id_mess` int(11) NOT NULL,
  `tgl_input_mess` date DEFAULT NULL,
  `tgl_ubah_mess` date DEFAULT NULL,
  `nama_mess` text DEFAULT NULL,
  `kapasitas_t_mess` int(11) NOT NULL,
  `alamat_mess` text DEFAULT NULL,
  `nama_pemilik_mess` text DEFAULT NULL,
  `telp_pemilik_mess` text DEFAULT NULL,
  `email_pemilik_mess` text DEFAULT NULL,
  `tarif_tanpa_makan_mess` int(11) NOT NULL,
  `tarif_dengan_makan_mess` int(11) NOT NULL,
  `kepemilikan_mess` enum('dalam','luar') NOT NULL,
  `id_tarif_satuan` int(11) NOT NULL,
  `id_tarif_jenis` int(11) NOT NULL,
  `fasilitas_mess` text DEFAULT NULL,
  `status_mess` enum('Y','T') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_mess`
--

INSERT INTO `tb_mess` (`id_mess`, `tgl_input_mess`, `tgl_ubah_mess`, `nama_mess`, `kapasitas_t_mess`, `alamat_mess`, `nama_pemilik_mess`, `telp_pemilik_mess`, `email_pemilik_mess`, `tarif_tanpa_makan_mess`, `tarif_dengan_makan_mess`, `kepemilikan_mess`, `id_tarif_satuan`, `id_tarif_jenis`, `fasilitas_mess`, `status_mess`) VALUES
(1, NULL, NULL, 'Mess RSJ 1 Lama', 20, 'Jl. Kolonel Maturi KM.7, Desa Jambudipa, Kec. Cisarua, Kab. Bandung Barat, 40551', 'RS Jiwa Provinsi Jawa Barat', 'Frislin Maria Agustina (PJ MESS RSJ) 081321329101', '', 20000, 100000, 'dalam', 4, 7, 'Makan 3x Sehari', 'Y'),
(2, NULL, NULL, 'Mess RSJ 2 Baru', 92, 'Jl. Kolonel Maturi KM.7, Desa Jambudipa, Kec. Cisarua, Kab. Bandung Barat, 40551', 'RS Jiwa Provinsi Jawa Barat', 'Frislin Maria Agustina (PJ MESS RSJ) 081321329101', '', 20000, 100000, 'dalam', 4, 7, '', 'Y'),
(3, NULL, '2022-10-07', 'Asrama Rifa Corporate', 100, 'Kp. Panyandaan RT. 01 RW. 14 Desa Jambudipa Kecamatan Cisarua Kab. Bandung Barat', 'Ibu Ai', '081322629909', '', 20000, 80000, 'luar', 4, 7, 'Dengan Makan 3x Sehari', 'Y'),
(4, NULL, '2022-10-07', 'Pondokan H. Ating', 100, 'Kp. Barukai Timur RT. 04 RW. 13 Desa Jambudipa Kecamatan Cisarua Kab. Bandung Barat', 'H. Ating / Hj. Siti Sutiah', '0', '', 20000, 80000, 'luar', 4, 7, '', 'Y'),
(5, NULL, '2022-10-07', 'Wisma Anugrah Ibu Nanik', 70, 'Kp. Panyandaan RT. 01 RW. 14 Desa Jambudipa Kecamatan Cisarua Kab. Bandung Barat', 'Hj. Nanik Susiani', '081320719652', '', 15000, 70000, 'luar', 4, 7, '', 'Y'),
(6, NULL, NULL, 'Pondokan dr. Hj. Meutia Laksminingrum', 0, '-', 'dr. Hj. Meutia Laksminingrum', '0', '', 0, 0, 'luar', 4, 7, '', 'Y'),
(7, NULL, '2022-10-07', 'Galuh Pakuan', 70, 'Kp. Panyandaan RT. 01 RW. 14 Desa Jambudipa Kecamatan Cisarua Kab. Bandung Barat', 'Oyo Suharya', '081320113399', '', 20000, 80000, 'luar', 4, 7, '', 'Y'),
(8, NULL, '2022-10-07', 'Pondokan Tatang', 30, 'Kp. Panyandaan RT. 01 RW. 14 Desa Jambudipa Kecamatan Cisarua Kab. Bandung Barat', 'Tatang', '089531804825', '', 20000, 80000, 'luar', 4, 7, '', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `tb_mess_pilih`
--

DROP TABLE IF EXISTS `tb_mess_pilih`;
CREATE TABLE `tb_mess_pilih` (
  `id_mess_pilih` int(11) NOT NULL,
  `id_praktik` int(11) NOT NULL,
  `id_mess` int(11) NOT NULL,
  `id_tarif_pilih` int(11) NOT NULL,
  `tgl_input_mess_pilih` date DEFAULT NULL,
  `tgl_ubah_mess_pilih` date DEFAULT NULL,
  `makan_mess_pilih` enum('T','Y') DEFAULT NULL COMMENT 'memilih mess makan (tidak digunakan)',
  `jumlah_hari_mess_pilih` int(11) NOT NULL,
  `total_tarif_mess_pilih` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_mess_tgl`
--

DROP TABLE IF EXISTS `tb_mess_tgl`;
CREATE TABLE `tb_mess_tgl` (
  `id_mess_tgl` int(11) NOT NULL,
  `mess_tgl` date NOT NULL,
  `id_mess` int(11) NOT NULL,
  `id_praktik` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_nilai_kep`
--

DROP TABLE IF EXISTS `tb_nilai_kep`;
CREATE TABLE `tb_nilai_kep` (
  `id_nilai_kep` int(100) NOT NULL,
  `id_pembimbing` int(11) NOT NULL,
  `id_praktik` int(11) NOT NULL,
  `id_praktikan` int(11) NOT NULL,
  `id_unit` int(11) NOT NULL,
  `lp` text NOT NULL,
  `prepost` text NOT NULL,
  `sptk` text NOT NULL,
  `penkes` text NOT NULL,
  `dokep` text NOT NULL,
  `komter` text NOT NULL,
  `tak` text NOT NULL,
  `kasus` text NOT NULL,
  `ujian` text NOT NULL,
  `sikap` text NOT NULL,
  `ket_nilai` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_nilai_upload`
--

DROP TABLE IF EXISTS `tb_nilai_upload`;
CREATE TABLE `tb_nilai_upload` (
  `id_nilai_upload` int(11) NOT NULL,
  `id_pembimbing` int(11) NOT NULL,
  `id_unit` int(11) NOT NULL,
  `id_praktik` int(11) NOT NULL,
  `tgl_tambah_nilai_upload` date DEFAULT NULL,
  `tgl_ubah_nilai_upload` date DEFAULT NULL,
  `file_nilai_upload` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_pembimbing`
--

DROP TABLE IF EXISTS `tb_pembimbing`;
CREATE TABLE `tb_pembimbing` (
  `id_pembimbing` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `tgl_tambah_pembimbing` date DEFAULT NULL,
  `tgl_ubah_pembimbing` date DEFAULT NULL,
  `no_id_pembimbing` text NOT NULL,
  `nama_pembimbing` text NOT NULL,
  `id_pembimbing_jenis` int(11) NOT NULL COMMENT '(sementara tidak digunakan)',
  `id_jurusan_pdd` int(11) NOT NULL,
  `id_jenjang_pdd` int(11) NOT NULL,
  `id_profesi_pdd` int(11) NOT NULL,
  `kali_pembimbing` int(11) NOT NULL,
  `status_pembimbing` enum('Y','T') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_pembimbing`
--

INSERT INTO `tb_pembimbing` (`id_pembimbing`, `id_user`, `tgl_tambah_pembimbing`, `tgl_ubah_pembimbing`, `no_id_pembimbing`, `nama_pembimbing`, `id_pembimbing_jenis`, `id_jurusan_pdd`, `id_jenjang_pdd`, `id_profesi_pdd`, `kali_pembimbing`, `status_pembimbing`) VALUES
(1, NULL, NULL, NULL, '198302142015031001', 'dr. Ade Kurnia Surawijawa, Sp.KJ.', 9, 1, 9, 2, 0, 'Y'),
(2, NULL, NULL, NULL, '197707272006042026', 'dr. Dhian Indriasari, Sp.KJ.', 9, 1, 9, 2, 0, 'Y'),
(3, NULL, NULL, NULL, '198305162010012016', 'dr. Dini Indriany, Sp.KJ.', 9, 1, 9, 2, 0, 'Y'),
(4, NULL, NULL, NULL, '196312011990031004', 'dr. H. Encep Supriandi, Sp.KJ. M.Kes., M.KM.', 9, 1, 9, 2, 0, 'Y'),
(5, NULL, NULL, NULL, '196208081990011001', 'dr. H. Riza Putra, Sp.KJ.', 9, 1, 9, 2, 0, 'Y'),
(6, NULL, NULL, NULL, '198601052020122005', 'dr. Hilda Puspa Indah, Sp.KJ.', 9, 1, 9, 2, 0, 'Y'),
(7, NULL, NULL, NULL, '196608141991022004', 'dr. Hj. Elly Marliyani, Sp.KJ., M.K.M', 9, 1, 9, 2, 0, 'Y'),
(8, NULL, NULL, NULL, '196607132007012005', 'dr. Hj. Meutia Laksaminingrum, Sp.KJ.', 9, 1, 9, 2, 0, 'Y'),
(9, NULL, NULL, NULL, '196805271998032004', 'dr. Lenny Irawati Yohosua, Sp.KJ.', 9, 1, 9, 2, 0, 'Y'),
(10, NULL, NULL, NULL, '197507072005012006', 'dr. Lina Budiyanti, Sp.KJ. (K)', 9, 1, 9, 2, 0, 'Y'),
(11, NULL, NULL, NULL, '197506082006041013', 'dr. Yunyun Setiawan, Sp.KJ.', 9, 1, 9, 2, 0, 'Y'),
(12, NULL, NULL, NULL, '197902192011012001', 'dr. Indah KusumaDewi, Sp.KJ.', 9, 1, 9, 2, 0, 'Y'),
(13, NULL, NULL, NULL, '198302142015031001', 'Ade Kurnia Surawijaya, dr. Sp.KJ.', 8, 1, 9, 1, 0, 'Y'),
(14, NULL, NULL, NULL, '197707272006042026', 'Dhian Indriasari, dr. Sp.KJ.', 8, 1, 9, 1, 0, 'Y'),
(15, NULL, NULL, NULL, '202101228', 'Hasrini Rowawi, dr., Sp.KJ (K)., MHA', 8, 1, 9, 1, 0, 'Y'),
(16, NULL, NULL, NULL, '196805271998032004', 'Lenny Irawati Yohosua, dr. Sp.KJ.', 8, 1, 9, 1, 0, 'Y'),
(17, NULL, NULL, NULL, '197507072005012006', 'Lina Budiyanti, dr. Sp.KJ (K)', 8, 1, 9, 1, 0, 'Y'),
(18, NULL, NULL, NULL, '198601082010012013', 'Ema Marlina, S.Tr.T', 7, 8, 8, 0, 0, 'Y'),
(19, NULL, NULL, NULL, '198102122005012013', 'Yeni Susanti, Amd. RMIK', 7, 8, 6, 0, 0, 'Y'),
(20, NULL, NULL, NULL, '197105071997032005', 'Dra. Lismaniar, Psi., M.Psi', 6, 9, 10, 4, 0, 'Y'),
(21, NULL, NULL, NULL, '196508051995022002', 'Dra. Resmi Prasetyani, Psi', 6, 9, 10, 4, 0, 'Y'),
(22, NULL, NULL, NULL, '197308081999032005', 'Yuyum Rohmulyanawati, S.Sos, MPSSp', 5, 9, 10, 0, 0, 'Y'),
(23, NULL, NULL, NULL, '198805212011011003', 'Irfan Arief Sulistyawan, Amd', 3, 9, 6, 0, 0, 'Y'),
(24, NULL, NULL, '2023-01-24', '197301072005011007', 'Abdul Aziz, AMK', 4, 2, 6, 0, 0, 'Y'),
(25, 4, NULL, NULL, '197812182006042017', 'Adah Saadah, S.Kep., Ners', 4, 2, 9, 5, 0, 'Y'),
(26, NULL, NULL, NULL, '197405121997032004', 'Ade Carnisem, S.Kep., Ners', 4, 2, 9, 5, 0, 'Y'),
(27, NULL, NULL, NULL, '196607161991032004', 'Hj. Ade Saromah, S.Kep., Ners', 4, 2, 9, 5, 0, 'Y'),
(28, NULL, NULL, NULL, '197211201991031001', 'Agus Krisno, AMK', 4, 2, 6, 0, 0, 'Y'),
(29, NULL, NULL, NULL, '198109282005011007', 'Agus Kusnandar, S.Kep., Ners', 4, 2, 9, 5, 0, 'Y'),
(30, NULL, NULL, NULL, '197503081997032002', 'Ai Sriyati, S.Kep., Ners', 4, 2, 9, 5, 0, 'Y'),
(31, NULL, NULL, NULL, '198110272006042014', 'Butet Berlina, S.Kep., Ners', 4, 2, 9, 5, 0, 'Y'),
(32, NULL, NULL, NULL, '197610012005011010', 'Dedi Nurhasan, S.Kep., Ners', 4, 2, 9, 5, 0, 'Y'),
(33, NULL, NULL, NULL, '196705161991031004', 'Dedi Suhaedi, AMK', 4, 2, 6, 0, 0, 'Y'),
(34, NULL, NULL, NULL, '196904071993032008', 'Dewi Shinta Maria, AMK', 4, 2, 6, 0, 0, 'Y'),
(35, NULL, NULL, NULL, '197507041999032005', 'Dian Ratnaningsih, S.Kep., Ners', 4, 2, 9, 5, 0, 'Y'),
(36, NULL, NULL, NULL, '197609212000032001', 'Elsie Rodini, AMK', 4, 2, 6, 0, 0, 'Y'),
(37, NULL, NULL, NULL, '196411011998032001', 'Eny Budiasih, S.Kep., Ners', 4, 2, 9, 5, 0, 'Y'),
(38, NULL, NULL, NULL, '196901062000122001', 'Eri Suciati, S.Kep., Ners', 4, 2, 9, 5, 0, 'Y'),
(39, NULL, NULL, NULL, '197901212005012013', 'Ester Suryani Tampubolon, S.Kep., Ners', 4, 2, 9, 5, 0, 'Y'),
(40, NULL, NULL, NULL, '197303291999032002', 'Ettie Hikmawati, S.Kep., Ners', 4, 2, 9, 5, 0, 'Y'),
(41, NULL, NULL, NULL, '197601311999031001', 'H. Dedi Rahmadi, S.Kep.Ners', 4, 2, 9, 5, 0, 'Y'),
(42, NULL, NULL, NULL, '197612242000031004', 'H. Moch. Jimi Dirgantara, S.Kep.Ners', 4, 2, 9, 5, 0, 'Y'),
(43, NULL, NULL, NULL, '197212271996031003', 'H. Zaenurohman, S.Kep.Ners', 4, 2, 9, 5, 0, 'Y'),
(44, NULL, NULL, NULL, '197911152000032004', 'Hj. Arimbi Nurwiyanti P, S.Kep.Ners', 4, 2, 9, 5, 0, 'Y'),
(45, NULL, NULL, NULL, '197909052006042016', 'Hj. Devie Fitriyani, S.Kep.Ners', 4, 2, 9, 5, 0, 'Y'),
(46, NULL, NULL, NULL, '197807042009022004', 'Hj. Icih Susanti, S.Kep.Ners', 4, 2, 9, 5, 0, 'Y'),
(47, NULL, NULL, NULL, '196812261996032001', 'Hj. Nenti Siti Kuraesin, S.Kep., Ners', 4, 2, 9, 5, 0, 'Y'),
(48, NULL, NULL, NULL, '197902112006042015', 'Kokom Komalasari, S.Kep., Ners', 4, 2, 9, 5, 0, 'Y'),
(49, NULL, NULL, NULL, '196607151990032013', 'Komaryati, S.Kep., Ners', 4, 2, 9, 5, 0, 'Y'),
(50, NULL, NULL, NULL, '198307172009022001', 'Neng Goniah, S.Kep., Ners', 4, 2, 9, 5, 0, 'Y'),
(51, NULL, NULL, NULL, '197608072005012005', 'Nenih Nuraenih, S.Kep., Ners', 4, 2, 9, 5, 0, 'Y'),
(52, NULL, NULL, NULL, '197011111996032003', 'Ni Luh Nyoman S Puspowati, S.Kep., Ners', 4, 2, 9, 5, 0, 'Y'),
(53, NULL, NULL, NULL, '197004221998032004', 'Nirna Julaeha, S.Kep., Ners', 4, 2, 9, 5, 0, 'Y'),
(54, NULL, NULL, NULL, '197911232005012017', 'Novita Sari, S.Kep., Ners', 4, 2, 9, 5, 0, 'Y'),
(55, NULL, NULL, NULL, '198010212005012011', 'Siti Romlah, S.Kep., Ners', 4, 2, 9, 5, 0, 'Y'),
(56, NULL, NULL, NULL, '196908311998032005', 'Sri Kurniyati, S.Kep., Ners', 4, 2, 9, 5, 0, 'Y'),
(57, NULL, NULL, NULL, '196805271992032004', 'Sri Yani, S.Kep., Ners', 4, 2, 9, 5, 0, 'Y'),
(58, NULL, NULL, NULL, '198103082005012006', 'Winda Ratna Wulan, S.Kep. Ners., M.Kep.,Sp.Kep.J  ', 4, 2, 10, 5, 0, 'Y'),
(59, NULL, NULL, NULL, '197707041997031004', 'Yulforman Rotua Manalu, S.Kep., Ners', 4, 2, 9, 5, 0, 'Y'),
(60, NULL, NULL, NULL, '196707151987032002', 'Yusi Yustiah, AMK', 4, 2, 6, 0, 0, 'Y'),
(61, NULL, NULL, NULL, '196712151990032007', 'Yuyun Yunara, S.Kep., Ners', 4, 2, 9, 5, 0, 'Y'),
(62, NULL, NULL, '2022-10-07', '199409102020121008', 'Rizki Egi Purnama, S.Pd', 2, 8, 8, 0, 0, 'Y'),
(63, NULL, NULL, NULL, '196409251992031006', 'Drs. Tavip Budiawan, Apt', 1, 9, 9, 9, 0, 'Y'),
(64, NULL, NULL, NULL, '198103252011012004', 'Ekaprasetyawati, S.Si, Apt', 1, 9, 9, 9, 0, 'Y'),
(65, NULL, NULL, NULL, '197801101999032002', 'Ice Laila Nur, S.Si., Apt., M.Farm', 1, 9, 10, 9, 0, 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pembimbing_jenis`
--

DROP TABLE IF EXISTS `tb_pembimbing_jenis`;
CREATE TABLE `tb_pembimbing_jenis` (
  `id_pembimbing_jenis` int(11) NOT NULL,
  `nama_pembimbing_jenis` text NOT NULL,
  `akronim_pembimbing_jenis` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_pembimbing_jenis`
--

INSERT INTO `tb_pembimbing_jenis` (`id_pembimbing_jenis`, `nama_pembimbing_jenis`, `akronim_pembimbing_jenis`) VALUES
(1, 'Clinical Instructor Farmasi', 'CI FAR'),
(2, 'Clinical Instructor Informasi Teknologi', 'CI IT'),
(3, 'Clinical Instructor Kesehatan Lingkungan', 'CI KESLING'),
(4, 'Clinical Instructor Keperawatan', 'CI KEP'),
(5, 'Clinical Instructor Pekerja Sosial', 'CI PEKSOS'),
(6, 'Clinical Instructor Psikologi', 'CI PSI'),
(7, 'Clinical Instructor Rekam Medik', 'CI RM'),
(8, 'Program Pendidikan Dokter Spesialis', 'PPDS'),
(9, 'Program Studi Profesi Dokter', 'PSPD');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pembimbing_pilih`
--

DROP TABLE IF EXISTS `tb_pembimbing_pilih`;
CREATE TABLE `tb_pembimbing_pilih` (
  `id_pembimbing_pilih` int(11) NOT NULL,
  `id_praktik` int(11) NOT NULL,
  `id_pembimbing` int(11) NOT NULL,
  `id_unit` int(11) NOT NULL,
  `id_praktikan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_pkd`
--

DROP TABLE IF EXISTS `tb_pkd`;
CREATE TABLE `tb_pkd` (
  `id_pkd` int(11) NOT NULL,
  `tgl_tambah_pkd` date NOT NULL,
  `tgl_ubah_pkd` date DEFAULT NULL,
  `nama_pemohon_pkd` text NOT NULL,
  `rincian_pkd` text NOT NULL,
  `tgl_pel_pkd` date NOT NULL,
  `nama_kor_pkd` text NOT NULL,
  `email_kor_pkd` text NOT NULL,
  `telp_kor_pkd` text NOT NULL,
  `file_surat_pkd` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_pkd`
--

INSERT INTO `tb_pkd` (`id_pkd`, `tgl_tambah_pkd`, `tgl_ubah_pkd`, `nama_pemohon_pkd`, `rincian_pkd`, `tgl_pel_pkd`, `nama_kor_pkd`, `email_kor_pkd`, `telp_kor_pkd`, `file_surat_pkd`) VALUES
(1, '2023-01-24', '2023-03-03', 'PT NOVELL PHARMACEUTICAL LABORATORIES', 'RTD Obat', '2023-02-23', 'Ade Thuto', '-', '0227208379', './_file/pkd/file_surat_pkd01b83921dd55f16e27037cda3e872ede.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pkd_tarif`
--

DROP TABLE IF EXISTS `tb_pkd_tarif`;
CREATE TABLE `tb_pkd_tarif` (
  `id_pkd_tarif` int(11) NOT NULL,
  `id_pkd` int(11) NOT NULL,
  `tgl_tambah_pkd_tarif` date DEFAULT NULL,
  `tgl_ubah_pkd_tarif` date DEFAULT NULL,
  `nama_pkd_tarif` text NOT NULL,
  `frekuensi_pkd_tarif` int(11) NOT NULL,
  `satuan_pkd_tarif` text NOT NULL,
  `jumlah_pkd_tarif` bigint(20) NOT NULL,
  `total_pkd_tarif` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_pkd_tarif`
--

INSERT INTO `tb_pkd_tarif` (`id_pkd_tarif`, `id_pkd`, `tgl_tambah_pkd_tarif`, `tgl_ubah_pkd_tarif`, `nama_pkd_tarif`, `frekuensi_pkd_tarif`, `satuan_pkd_tarif`, `jumlah_pkd_tarif`, `total_pkd_tarif`) VALUES
(1, 1, '2023-01-24', NULL, 'Sewa Aula', 1, 'per-hari / kegiatan', 1000000, 1000000);

-- --------------------------------------------------------

--
-- Table structure for table `tb_praktik`
--

DROP TABLE IF EXISTS `tb_praktik`;
CREATE TABLE `tb_praktik` (
  `id_praktik` int(11) NOT NULL,
  `id_user` text NOT NULL,
  `id_mou` int(11) NOT NULL COMMENT 'data mou dari tb_mou (sementara tidak digunakan)',
  `id_institusi` int(11) NOT NULL,
  `id_jurusan_pdd_jenis` int(11) NOT NULL,
  `id_jurusan_pdd` text DEFAULT NULL,
  `id_jenjang_pdd` text DEFAULT NULL,
  `id_profesi_pdd` text DEFAULT NULL,
  `nama_praktik` text NOT NULL COMMENT 'nama kelompok/gelombang',
  `tgl_input_praktik` text DEFAULT NULL,
  `tgl_ubah_praktik` text DEFAULT NULL,
  `tgl_mulai_praktik` date DEFAULT NULL,
  `tgl_selesai_praktik` date DEFAULT NULL,
  `jumlah_praktik` int(11) NOT NULL,
  `no_surat_praktik` text NOT NULL,
  `tgl_surat_praktik` date DEFAULT NULL,
  `surat_praktik` text DEFAULT NULL,
  `akred_institusi_praktik` text NOT NULL,
  `akred_jurusan_praktik` text NOT NULL,
  `data_praktik` text DEFAULT NULL,
  `nama_koordinator_praktik` text NOT NULL,
  `email_koordinator_praktik` text NOT NULL,
  `telp_koordinator_praktik` text NOT NULL,
  `kode_bayar_praktik` text DEFAULT NULL,
  `status_praktik` enum('Y','ARSIP') NOT NULL COMMENT 'Status Aktif/Arsip Praktik',
  `status_mess_praktik` enum('T','Y') NOT NULL COMMENT 'stasus pakai mess ',
  `status_nilai_praktik` enum('T','Y') NOT NULL COMMENT 'status nilai yang uploadkan atau diinputkan',
  `makan_mess_praktik` enum('T','Y') DEFAULT NULL COMMENT 'status memakai makan mess (sementara tidak digunakan)',
  `materi_upip_praktik` text DEFAULT NULL,
  `materi_napza_praktik` text DEFAULT NULL,
  `fileInv_praktik` text DEFAULT NULL,
  `fileNilKep_praktik` text DEFAULT NULL,
  `alasan_institusi` text DEFAULT NULL,
  `alasan_admin` text DEFAULT NULL,
  `status_alasan` enum('Y','T') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_praktik`
--

INSERT INTO `tb_praktik` (`id_praktik`, `id_user`, `id_mou`, `id_institusi`, `id_jurusan_pdd_jenis`, `id_jurusan_pdd`, `id_jenjang_pdd`, `id_profesi_pdd`, `nama_praktik`, `tgl_input_praktik`, `tgl_ubah_praktik`, `tgl_mulai_praktik`, `tgl_selesai_praktik`, `jumlah_praktik`, `no_surat_praktik`, `tgl_surat_praktik`, `surat_praktik`, `akred_institusi_praktik`, `akred_jurusan_praktik`, `data_praktik`, `nama_koordinator_praktik`, `email_koordinator_praktik`, `telp_koordinator_praktik`, `kode_bayar_praktik`, `status_praktik`, `status_mess_praktik`, `status_nilai_praktik`, `makan_mess_praktik`, `materi_upip_praktik`, `materi_napza_praktik`, `fileInv_praktik`, `fileNilKep_praktik`, `alasan_institusi`, `alasan_admin`, `status_alasan`) VALUES
(3, '36', 0, 89, 2, '2', '6', '', 'Gelombang I', '2023-03-09', NULL, '2023-05-08', '2023-05-20', 48, 'B / 164 / IX / 2022', '2022-09-22', NULL, '', '', NULL, 'H. Tantan Hadiansyah, S.Kep., Ners., M.Kep', 'tantan.hadiansyah78@gmail.com', '082240867327', '23030917', 'Y', 'T', 'T', NULL, NULL, NULL, NULL, NULL, '', '', NULL),
(4, '36', 0, 89, 2, '2', '6', '', 'Gelombang II', '2023-03-09', NULL, '2023-05-22', '2023-06-03', 48, 'B / 164 / IX / 2022', '2022-09-22', NULL, '', '', NULL, 'H. Tantan Hadiansyah, S.Kep., Ners., M.Kep', 'tantan.hadiansyah78@gmail.com', '082240867327', '23030921', 'Y', 'T', 'T', NULL, NULL, NULL, NULL, NULL, '', '', NULL),
(5, '36', 0, 89, 2, '2', '6', '', 'Gelombang III', '2023-03-09', NULL, '2023-06-12', '2023-06-24', 50, 'B / 164 / IX / 2022', '2022-09-22', NULL, '', '', NULL, 'H. Tantan Hadiansyah, S.Kep., Ners., M.Kep', 'tantan.hadiansyah78@gmail.com', '082240867327', '23030936', 'Y', 'T', 'T', NULL, NULL, NULL, NULL, NULL, '', '', NULL),
(6, '49', 0, 76, 2, '2', '9', '5', '1 ', '2023-03-14', NULL, '2023-05-01', '2023-05-13', 87, '634/FIKes-UMTAS/F/XI/2022', '2022-11-27', NULL, '', '', NULL, 'Nia Restiana', 'ners.umtas@gmail.com', '081322958323', '23031406', 'Y', 'Y', 'T', NULL, NULL, NULL, NULL, NULL, '', '', NULL),
(7, '49', 0, 76, 2, '2', '6', '', '2', '2023-03-14', NULL, '2023-06-26', '2023-07-22', 72, '678/FIKES-Umtas/F/XII/2022', '2022-12-20', './_file/praktik/file_surat_3314f8f7c2049f2e012925276458ba74.pdf', './_file/praktik/file_akred_institusibe3bf17beec8bf36c42cb9c5e0227cb3.pdf', './_file/praktik/file_akred_jurusanba8accd531f2a9365425ebae8564f849.pdf', NULL, 'Nia Restiana', 'ners.umtas@gmail.com', '081322958323', '23031421', 'Y', 'Y', 'T', NULL, NULL, NULL, NULL, NULL, '', '', NULL),
(8, '46', 0, 23, 2, '2', '9', '5', 'Gelombang 1', '2023-03-14', NULL, '2023-04-03', '2023-04-18', 53, ' 1418/UN6.L.1/PK.01.04/2023   ', '2023-03-14', './_file/praktik/file_surat_3d9bfd086732e4bf6a5726a9e0842e44.pdf', './_file/praktik/file_akred_institusie6bf8ab601211fccbbbcd77c7d1f12f6.pdf', './_file/praktik/file_akred_jurusane6bf8ab601211fccbbbcd77c7d1f12f6.pdf', NULL, 'Indra Maulana', 'indra.maulana@unpad.ac.id', '081220039110', '23031406', 'Y', 'T', 'T', NULL, NULL, NULL, NULL, NULL, '', '', NULL),
(9, '48', 0, 55, 2, '2', '9', '5', '1', '2023-03-18', NULL, '2023-06-12', '2023-06-24', 6, '063/A-FIKES-UNSAP/II/2023', '2023-02-15', './_file/praktik/file_surat_ab38bb081ecd6c1ec7a890062a9bd899.pdf', './_file/praktik/file_akred_institusiacc77a37cf6e9283a8b98bf81dd12794.pdf', './_file/praktik/file_akred_jurusanc361cf4bfb2b0ef8b38fbd317e84e04d.pdf', NULL, 'Karwati.S.Kep.,Ners.,M.Kep', 'karwatiwati626@gmail.com', '081320745577', '23031847', 'Y', 'Y', 'T', NULL, NULL, NULL, NULL, NULL, '', '', NULL),
(10, '57', 0, 19, 1, '1', '9', '2', 'Group 16 (2023)', '2023-03-27', NULL, '2023-03-27', '2023-04-22', 6, '563/ DIRUT/II/2023', '2023-02-28', './_file/praktik/file_surat_a9c45bcc13744cd780d68cb2f037abb7.pdf', './_file/praktik/file_akred_institusifced6cb49ef93727d740aac6be840465.pdf', './_file/praktik/file_akred_jurusanfced6cb49ef93727d740aac6be840465.pdf', NULL, 'Fayola Sandricka Ahas', 'fayolasa16@gmail.com', '082127646090', '23032758', 'Y', 'T', 'T', NULL, NULL, NULL, NULL, NULL, '', '', NULL),
(11, '1', 0, 29, 3, '3', '', '0', 'Eligendi ipsum face', '2023-04-11', NULL, '1989-10-20', '2000-03-12', 13, 'Nulla sed consequunt', '1970-09-18', './_file/praktik/file_surat_9b4f5435b4ab280ad40c99649d9889de.pdf', './_file/praktik/file_akred_institusi9b4f5435b4ab280ad40c99649d9889de.pdf', './_file/praktik/file_akred_jurusan9b4f5435b4ab280ad40c99649d9889de.pdf', NULL, 'Beatae eius reprehen', 'dyfojudyvu@mailinator.com', '9', '23041125', 'Y', 'T', 'T', NULL, NULL, NULL, NULL, NULL, '', '', NULL),
(12, '1', 0, 40, 2, '2', '9', '5', 'At nesciunt aut com', '2023-04-11', NULL, '1998-08-05', '1999-01-25', 19, 'Possimus quaerat es', '2013-12-07', './_file/praktik/file_surat_9cb570340418967baec87f4e45570f2d.pdf', './_file/praktik/file_akred_institusi9cb570340418967baec87f4e45570f2d.pdf', './_file/praktik/file_akred_jurusan9cb570340418967baec87f4e45570f2d.pdf', NULL, 'Aut cupiditate sed i', 'toxuwu@mailinator.com', '6', '23041130', 'Y', 'T', 'T', NULL, NULL, NULL, NULL, NULL, '', '', NULL),
(13, '1', 0, 41, 2, '2', '9', '5', 'Accusamus sequi nihi', '2023-04-11', NULL, '1984-05-15', '1985-05-12', 92, 'Minima in nisi cum d', '1999-09-18', './_file/praktik/file_surat_f07cdcc57c3af3a7847b4f1c557b223f.pdf', './_file/praktik/file_akred_institusif07cdcc57c3af3a7847b4f1c557b223f.pdf', './_file/praktik/file_akred_jurusanf07cdcc57c3af3a7847b4f1c557b223f.pdf', NULL, 'Consectetur cupidata', 'madokaroba@mailinator.com', '33', '23041132', 'Y', 'T', 'T', NULL, NULL, NULL, NULL, NULL, '', '', NULL),
(14, '1', 0, 2, 1, '1', '9', '2', '123', '2023-04-11', NULL, '2023-04-11', '2023-04-14', 12, '123123', '2023-04-11', './_file/praktik/file_surat_3491fec829847cb608c0d9289d738ca2.pdf', './_file/praktik/file_akred_institusi3491fec829847cb608c0d9289d738ca2.pdf', './_file/praktik/file_akred_jurusan3491fec829847cb608c0d9289d738ca2.pdf', NULL, 'ADMIN DIKLAT RS JIWA', 'admin@admin', '08123145645', '23041140', 'Y', 'T', 'T', NULL, NULL, NULL, NULL, NULL, '', '', NULL),
(15, '1', 0, 61, 2, '2', '9', '5', 'Quam voluptatem Lau', '2023-04-11', NULL, '1985-05-16', '1985-06-06', 47, 'Odit labore atque to', '2018-04-07', './_file/praktik/file_surat_d7ba87bfe29aedd198c8aac54fa0dfac.pdf', './_file/praktik/file_akred_institusid7ba87bfe29aedd198c8aac54fa0dfac.pdf', './_file/praktik/file_akred_jurusand7ba87bfe29aedd198c8aac54fa0dfac.pdf', NULL, 'Voluptatem Est qui', 'hyfykobuky@mailinator.com', '99', '23041142', 'Y', 'T', 'T', NULL, NULL, NULL, NULL, NULL, '', '', NULL),
(16, '1', 0, 34, 1, '1', '9', '1', 'Autem quis autem dol', '2023-04-27', NULL, '2020-11-09', '2021-09-13', 1, 'Sint velit magnam as', '2005-04-13', './_file/praktik/file_surat_17af40de620d292e8a3a342991c5c72d.pdf', './_file/praktik/file_akred_institusi17af40de620d292e8a3a342991c5c72d.pdf', './_file/praktik/file_akred_jurusan17af40de620d292e8a3a342991c5c72d.pdf', NULL, 'Qui culpa et saepe ', 'zegejumasy@mailinator.com', '74', '23042713', 'Y', 'T', 'T', NULL, NULL, NULL, NULL, NULL, 'asddddddddddddddddddddddddasddddddddddddddddddddddddasddddddddddddddddddddddddasdddddddddddddddddddddddd', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_praktikan`
--

DROP TABLE IF EXISTS `tb_praktikan`;
CREATE TABLE `tb_praktikan` (
  `id_praktikan` int(11) NOT NULL,
  `id_praktik` int(11) NOT NULL,
  `id_pembimbing_pilih` int(11) NOT NULL,
  `tgl_tambah_praktikan` date DEFAULT NULL,
  `tgl_ubah_praktikan` date DEFAULT NULL,
  `foto_praktikan` text DEFAULT NULL,
  `no_id_praktikan` text NOT NULL,
  `nama_praktikan` text NOT NULL,
  `tgl_lahir_praktikan` date NOT NULL,
  `telp_praktikan` text NOT NULL,
  `wa_praktikan` text NOT NULL,
  `email_praktikan` text NOT NULL,
  `alamat_praktikan` text NOT NULL,
  `file_ijazah_praktikan` text NOT NULL,
  `file_swab_praktikan` text NOT NULL,
  `status_praktikan` enum('Y','T') NOT NULL,
  `pernyataan_praktikan` enum('T','Y') NOT NULL,
  `tgl_pernyataan` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_praktikan`
--

INSERT INTO `tb_praktikan` (`id_praktikan`, `id_praktik`, `id_pembimbing_pilih`, `tgl_tambah_praktikan`, `tgl_ubah_praktikan`, `foto_praktikan`, `no_id_praktikan`, `nama_praktikan`, `tgl_lahir_praktikan`, `telp_praktikan`, `wa_praktikan`, `email_praktikan`, `alamat_praktikan`, `file_ijazah_praktikan`, `file_swab_praktikan`, `status_praktikan`, `pernyataan_praktikan`, `tgl_pernyataan`) VALUES
(20, 3, 0, '2023-03-10', NULL, './_file/praktik/praktikan/41ab3322f627a023f05b5112374e8ad0.jpg', '21.007', 'DENY MAHESA PUTRA', '2002-06-03', '085171740909', '085282239942', 'denimahesa1225@gmail.com', 'Jalan Margaluyu No 45 RT 1/ 02 Cimahi tengah', './_file/praktik/praktikan/286ed6cdb59e12d191f23ff3b119473c.pdf', './_file/praktik/praktikan/3ec64041154de95cee223401b1695d35.pdf', 'Y', 'T', NULL),
(21, 4, 0, '2023-03-10', NULL, './_file/praktik/praktikan/d06eaa0272a6293d91770be0e7775ddd.jpg', '21068', 'inal lutfiansyah', '1986-09-22', '081248630204', '081248630204', 'inallutfiansyah1986@gmail.com', 'kp cukang kawung desa tanimulya kec ngamprah kabupaten bandung baat', './_file/praktik/praktikan/07da9a023d902d8de3ce25a2c672ff8a.pdf', './_file/praktik/praktikan/1849cc509559d9e69abc879fa5ccbcf0.pdf', 'Y', 'T', NULL),
(22, 4, 0, '2023-03-10', NULL, './_file/praktik/praktikan/66814971cc4e0d400b3b079a46f1d629.jpg', '21.060', 'Dewi Tifa Putri Gunasyah', '2002-10-12', '085846208460', '085846208460', 'tifagunasyah@gmail.com', 'Kp. cikuya, Rt. 04 Rw.05, desa. Kembang kuning, Kec. Jatiluhur, Kab. Purwakarta', './_file/praktik/praktikan/ba12642f16500fa5e09506045ce66737.pdf', './_file/praktik/praktikan/0af6aff9aff05193c1ec8a812d71cfd8.pdf', 'Y', 'T', NULL),
(23, 4, 0, '2023-03-10', NULL, './_file/praktik/praktikan/5d19fefd92ad7a454cf39b0c887d4b50.jpg', '21075', 'Meilani Nur Haqiqi Kamal', '2003-05-04', '081220910725', '083137322073', 'meilaninurhaqiqinurhaqiqi@gmail.com', 'Kp.Cangkuang Rt.06 Rw.11 Kec.Cangkuang Kab.Bandung', './_file/praktik/praktikan/0c349ed23c72fe01934282eee88453f4.pdf', './_file/praktik/praktikan/c9ad0fa168c77747b36ce28523ca19f4.pdf', 'Y', 'T', NULL),
(24, 4, 0, '2023-03-10', NULL, './_file/praktik/praktikan/b2ccd8aef4b7548cb7cdf0ac94f73368.jpg', '21.085', 'Putri Nurul Oktaviani', '2002-10-24', '089652251728', '089652251728', 'putrioktaviani509@gmail.com', 'Jln tembokan,KP cipeundeuy rt02/02 Desa cipeundeuy,Kec padalarang,Kab bandung barat', './_file/praktik/praktikan/48c5aa38aa920319beed314378360873.pdf', './_file/praktik/praktikan/d9fbdbaaa7f22142ad11337124694ccd.pdf', 'Y', 'T', NULL),
(25, 3, 0, '2023-03-10', NULL, './_file/praktik/praktikan/2881bd99e1cf72cb82348701a41b7c2d.jpg', '21.041', 'RIKA RAHMAWATI', '2003-06-26', '083195863909', '083195863909', 'sayarika909@gmail.com', 'Kampung Sukarasa Desa Tanggulun Timur Kecamatan Kalijati Kabupaten Subang', './_file/praktik/praktikan/edaf6c0af80dcaef9cbbe920de042d8f.pdf', './_file/praktik/praktikan/4e756cbadeb45448027ec878aa637cc8.pdf', 'Y', 'T', NULL),
(26, 3, 0, '2023-03-10', NULL, './_file/praktik/praktikan/099ce8ce7cb2ba6fc28d4191d9d670bf.jpg', '21.049', 'TASA ANNISA SALSABILA ', '2003-03-23', '081211360195', '081211360195', 'tasaasalsabila96@gmail.com', 'Jalan Babakan Anyar Rt 01/ RW 10, Desa/ Kec. Pangalengan, Kabupaten Bandung, Jawa Barat ', './_file/praktik/praktikan/60db4edf4fed0cfb47d83897dc3dc4e9.pdf', './_file/praktik/praktikan/1b3f70848b790b588f81eaa53658a259.pdf', 'Y', 'T', NULL),
(27, 3, 0, '2023-03-10', NULL, './_file/praktik/praktikan/7544b0f162252d478b294e118391af3f.jpg', '21034', 'NURIMA', '2002-07-10', '0895703057435', '0895703057435', 'nurimaaja86@gmail.com', 'Kp.cipatat ri 01 rw 11', './_file/praktik/praktikan/08d9c097d403bc1e60a4861e42c68b2e.pdf', './_file/praktik/praktikan/7e49c23465c0566b4451ffcc708890f6.pdf', 'Y', 'T', NULL),
(28, 5, 0, '2023-03-10', NULL, './_file/praktik/praktikan/853eebf0234db8f02c433738e840bf09.jpg', '21112', 'Dila Rosmawati ', '2002-10-16', '083817230182', '083817230182', 'rosmawatidila89@gmail.com', 'Kp. Nambo RT 06 RW 02 desa batukarut kecamatan arjasari kabupaten Bandung ', './_file/praktik/praktikan/59c5994de9b8b71fe447f650f9ef687c.pdf', './_file/praktik/praktikan/48b5c9e918de62089a1e75b0e0346ea5.pdf', 'Y', 'T', NULL),
(29, 3, 0, '2023-03-10', NULL, './_file/praktik/praktikan/ddf4e3f51b5091398ee907ca9fd772b3.jpg', '21.026', 'Muhamad Edi Saputro ', '1993-05-24', '087873370014', '081318325392', 'edi907614@gmail.com', 'Asmil yonif 303 ssm RT 003 RW 008 Kel sukawargi Kec Cisurupan ', './_file/praktik/praktikan/a52d7a5ab18e080a569b339e108c6f49.pdf', './_file/praktik/praktikan/46426f054d7977a7e315d650eebe295c.pdf', 'Y', 'T', NULL),
(30, 5, 0, '2023-03-10', NULL, './_file/praktik/praktikan/d95ab18ca2afeee3d3c91b6629e72d71.jpg', '21115', 'Dyani Berkah Utami ', '2003-09-09', '088971957913', '088971957913', 'dyani7878910@gmail.com', 'Kp.Neglasari Rt 02 Rw 13, Desa Galanggang, Kecamatan Batujajar', './_file/praktik/praktikan/32ae15db8d3d210384f9e01c3c81ded5.pdf', './_file/praktik/praktikan/874b3cddca5dc341fe6f2d6c6067b720.pdf', 'Y', 'T', NULL),
(31, 3, 0, '2023-03-10', NULL, './_file/praktik/praktikan/0634777b810f7dc23c8aceddb6387a6d.jpg', '21023', 'Martambah ', '1986-04-14', '085864424369', '082318193363', 'martambah3108@gmail.com', 'Taman Cileunyi Blok IIA No.4 Rt.005 Rw.022 kel.Cileunyi kulon', './_file/praktik/praktikan/02f956bbdbceecbc128c97e0a833a211.pdf', './_file/praktik/praktikan/490d596bebb0191e66e034fa29ee7281.pdf', 'Y', 'T', NULL),
(32, 3, 0, '2023-03-10', NULL, './_file/praktik/praktikan/f2e9ccb538dc3b928b6ef3f0ca1a2e5c.jpg', '21.043', 'Salwa Cikalifa Desty Hadi', '2003-12-01', '089654234911', '089654234911', 'salwaadesty@gmail.com', 'Jl. Talun Ds. Jelegong Rt.03 Rw.03 No.62 Kec. Rancaekek Kab. Bandung, Jawa Barat', './_file/praktik/praktikan/00c3279f842c8e7cb7c9c0b97f9cd413.pdf', './_file/praktik/praktikan/49647cbf97bce98076a31f490af3b2fb.pdf', 'Y', 'T', NULL),
(33, 3, 0, '2023-03-10', NULL, './_file/praktik/praktikan/26fa94859f278bbf9a022fde0af3bafb.jpg', '21.009', 'DEVI RISMALIANA', '2002-12-22', '0895334735378', '0895334735378', 'devirismaliana81@gmail.com', 'Kp. Citamiang RT.20/RW.08 Desa.Sukatani Kec.Darangdan Kab.Purwakarta', './_file/praktik/praktikan/7059dcd96c02401346dd06eba158c77a.pdf', './_file/praktik/praktikan/d8616138265887733d8420f8bfe7f181.pdf', 'Y', 'T', NULL),
(34, 3, 0, '2023-03-10', NULL, './_file/praktik/praktikan/8fa110df8eb6104e5772117434f1c85f.jpg', '21.024', 'MEISI MAULINA ', '2003-04-27', '083804541212', '083804541212', 'meisimaulinaaa27@gmail.com', 'JL.RAYA GUNUNG SALAK ENDAH KP. PASIR PUTIH RT 06 RW 02 DESA GUNUNG BUNDER 2 KECAMATAN PAMIJAHAN KABUPATEN BOGOR', './_file/praktik/praktikan/03c5b9e979d97a388799850b4e782d81.pdf', './_file/praktik/praktikan/be54f6503e4b2d78d950c37ca4c5690f.pdf', 'Y', 'T', NULL),
(35, 4, 0, '2023-03-10', NULL, './_file/praktik/praktikan/d56bcf394f301121215bfa5daf690005.jpg', '21052', 'Amelia Fitriara Retno', '2003-11-13', '085846960534', '085846960534', 'ameliafr1234@gmail.com', 'Kp. Cikuda no.34 Rt. 02/04 desa nyalindung kec. Cipata kab. Bandung barat', './_file/praktik/praktikan/812064b94ddf9f4b3ac7e192e75d20bd.pdf', './_file/praktik/praktikan/6daa96862a065866c14483b6f1e3ed26.pdf', 'Y', 'T', NULL),
(36, 3, 0, '2023-03-10', NULL, './_file/praktik/praktikan/7c4c05ed5087d8f091aa1b3df3b1a920.jpg', '21.022', 'LULU MAULIDYA', '2002-06-05', '089656455518', '089656455518', 'lulumaulidiya05@gmail.com', 'kp. Cimareme desa cimerang rt02/rw01 kec. padalarang kab. Bandung Barat', './_file/praktik/praktikan/0f5a4884bc185b331f9dee062b1651ea.pdf', './_file/praktik/praktikan/2b251bdc98481b8ef6ae696b2c722be6.pdf', 'Y', 'T', NULL),
(37, 3, 0, '2023-03-10', NULL, './_file/praktik/praktikan/b0670d22a0058d4bc4c64739b7ecd9da.jpg', '21.008', 'DESI FITRIANI', '2002-12-06', '087721011484', '087721011484', 'fitrianiidesi23@gmail.com', 'Jl. Hj Gofur Perumahan Pondok Mas Lestari Blok D No.1, RT 002/RW 013 Kel. Pakuhaji Kec. Ngamprah Kabupaten Bandung Barat ', './_file/praktik/praktikan/2248ccf3992ad41132109e39642a7312.pdf', './_file/praktik/praktikan/56ef61e717e9761e59e301d41eb8b417.pdf', 'Y', 'T', NULL),
(38, 5, 0, '2023-03-10', NULL, './_file/praktik/praktikan/21ed5f9b5969ee189fe5db95e85e2082.jpg', '21110', 'Delila Nisya Fadilla ', '2002-09-30', '085932904445', '081321481931', 'delilanisya@gmail.com', 'Kp.Lio No.54 Rt.06 Rw.01 Kel.Cipamokolan Kec.Rancasari Kota Bandung', './_file/praktik/praktikan/3e3604dcdc4952d8b0666a94b9a61089.pdf', './_file/praktik/praktikan/27b060a9fb088cee0454d8e791bf918a.pdf', 'Y', 'T', NULL),
(39, 3, 0, '2023-03-10', NULL, './_file/praktik/praktikan/9d2f946452ff56e2d14c22c480fe55e9.jpg', '21.027', 'MUHAMAD MIFTAHUDIN', '1999-06-09', '085894985856', '085894985856', 'farmmiftah321@gmail.com', 'kp. karni, Rt02/04, Desa jonggol, kec jonggol, kab Bogor', './_file/praktik/praktikan/214ce72c287fb699c1ba4570fc030c3e.pdf', './_file/praktik/praktikan/98a52e986a98038fac5dac75cd2a1ed1.pdf', 'Y', 'T', NULL),
(40, 5, 0, '2023-03-10', NULL, './_file/praktik/praktikan/3f279989bc69342c39b236f1196f0996.jpg', '21129', 'Lastri Nuraeni ', '2002-02-24', '0895414747756', '0895414747756', 'lastrinuraeni186@gmail.com', 'Kp. Sukamaju Rt04/02, Kel. Cigugur Tengah, Kec. Cimahi Tengah, Kota Cimahi, 40522', './_file/praktik/praktikan/cee48106e3a38005c00e8c40e85c3c90.pdf', './_file/praktik/praktikan/9d253ae3ec8c9a8ab1818388d1ad0768.pdf', 'Y', 'T', NULL),
(41, 4, 0, '2023-03-10', NULL, './_file/praktik/praktikan/c0c5e91cc4cf6ad4a1e8c801b0dc1555.jpg', '21.054', 'Budi Susanto', '1990-07-09', '081321562190', '081321562190', 'budi36236@gmail.com', 'Kp. Cimariuk Rt. 001 Rw. 018 Desa. Manggungharja Kecamatan Ciparay Kabupaten Bandung', './_file/praktik/praktikan/6d0e8897e916194410b7efd17fc9ed30.pdf', './_file/praktik/praktikan/92f88124a65f8f884c6af59e4940c8d5.pdf', 'Y', 'T', NULL),
(42, 3, 0, '2023-03-10', NULL, './_file/praktik/praktikan/7208cfb541c3ea08f9963d11d5f91596.jpg', '21.018', 'Iqbal Alif Nurwahyudi', '2001-05-25', '08882012939', '08882012939', 'ialif007.ia@gmail.com', 'Gg.kasuari 2 Rt02 Rw09 Kec.Andir Kel.Maleber', './_file/praktik/praktikan/8f15ea45a3f07a58668756da5cc1f29d.pdf', './_file/praktik/praktikan/e09f161e5a037bf6f846ab706797a471.pdf', 'Y', 'T', NULL),
(43, 3, 0, '2023-03-10', NULL, './_file/praktik/praktikan/963155ac7e4185afc557b6b3144b8479.jpg', '21.021', 'LIANA PERMATASARI', '2002-11-27', '089609168297', '089609168297', 'sliana076@gmail.com', 'Jl. Paledang No.57 RT 03/06  Kec. Ujungberung Kel. Pasanggrahan Kota Bandung', './_file/praktik/praktikan/2e376c3ee9b8d340a94e4266250e9cf4.pdf', './_file/praktik/praktikan/0874af4635f64ee0236ebd7ca6e9c547.pdf', 'Y', 'T', NULL),
(44, 3, 0, '2023-03-10', NULL, './_file/praktik/praktikan/8b9d286f838842e9bd2e0d7de0fed326.jpg', '21.016', 'Hikmat Heryadipio', '1999-10-21', '085846435432', '085846435432', 'uwowcoyoy@gmail.com', 'Kp.Pinggirsari 02/02 Ds.Pinggirsari Kec.Arjasari Kab.Bandung', './_file/praktik/praktikan/3153fce0b595d9d38c5a4f78852f7b14.pdf', './_file/praktik/praktikan/5b24cac0d3e4ffb5478d7a125473cf13.pdf', 'Y', 'T', NULL),
(45, 3, 0, '2023-03-10', NULL, './_file/praktik/praktikan/053f32b7728d7314de07b22f58813063.jpg', '21030', 'NASHWA TATIANA PUTRI', '2003-02-23', '6289503255353', '6289503255353', 'nashwatatiana@gmail.com', 'Jl.PASIR KUMELI NO.2B. RT01/RW 21, KELURAHAN BAROS, KECAMATAN CIMAHI TENGAH, KOTA CIMAHI ', './_file/praktik/praktikan/d8357b78227131aa3bc2212c11b9679b.pdf', './_file/praktik/praktikan/3a06f3db254176ca507a94604081ac3b.pdf', 'Y', 'T', NULL),
(46, 3, 0, '2023-03-10', NULL, './_file/praktik/praktikan/1f9e00f4e86c17b880b07c11edf6cbfe.jpg', '21.031', 'NAWAL', '2002-11-03', '085861240151', '085524708447', 'nawalastian7@gmail.com', 'Kp. Warung RT.004/005 desa. Citalem kecamatan. Cipongkor', './_file/praktik/praktikan/5ab4f921b2129d617914dba179fb944c.pdf', './_file/praktik/praktikan/403fd5549884ff556dc89d6272e4b747.pdf', 'Y', 'T', NULL),
(47, 5, 0, '2023-03-10', NULL, './_file/praktik/praktikan/ccdf48ae8f685619bb7977d7fc702436.jpg', '21111', 'Dewi Rahmawati', '2003-01-01', '085224147243', '085224147243', 'dewirahmawati390@gmail.com', 'JL. RS DUSTIRA NO. 104 RT. 04 RW. 20', './_file/praktik/praktikan/12a49678a34b88a66f00742041082d1b.pdf', './_file/praktik/praktikan/547826c07ba405def62273a58886ccaa.pdf', 'Y', 'T', NULL),
(48, 5, 0, '2023-03-10', NULL, './_file/praktik/praktikan/2839578fd157545aa3cff2e0db332823.jpg', '21.141', 'Pebi Pebrian ', '2003-02-17', '083174654034', '083174654034', 'pebipebrian13@gmail.com', 'Kp. Dangdeur Rt02/Rw09, Desa Cikalong, Kec. Cikalong Wetan, Kab. Bandung barat, Provinsi. Jawa Barat', './_file/praktik/praktikan/746353fbf0c56adddf2581f6cfa95db9.pdf', './_file/praktik/praktikan/8ae6a4217fa5b5d29ae28941165ceca3.pdf', 'Y', 'T', NULL),
(49, 3, 0, '2023-03-10', NULL, './_file/praktik/praktikan/1877554efde7153d071e02c3a0c38cd2.jpg', '21.050', 'TRIA BESTARY GUNAWAN', '2002-10-16', '082117040639', '082117040639', 'tribestary16@gmail.com', 'Kp. Simpen Desa tenjolaya Rt 02/05 Kecamatan Cicalengka Kabupaten Bandung', './_file/praktik/praktikan/6e49d585aac88488d8533a818f610f70.pdf', './_file/praktik/praktikan/6c2da082b42d24960882892beade1029.pdf', 'Y', 'T', NULL),
(50, 3, 0, '2023-03-10', NULL, './_file/praktik/praktikan/dc20f668e51dd7e57d9d63e9aebddc52.jpg', '21.015', 'HASNA ROIHAANAH', '2003-09-21', '089501061360', '089501061360', 'hasna21roihaanah@gmail.com', 'Jl. Remaja III RT 06 RW 07 Pulogadung Jakarta Timur\r\n', './_file/praktik/praktikan/eb48c14db0cbef718468fd8f3169255f.pdf', './_file/praktik/praktikan/043d153f7d67f3e95c1ff8df42dacb87.pdf', 'Y', 'T', NULL),
(52, 3, 0, '2023-03-10', NULL, './_file/praktik/praktikan/82199465b8f167685d0fd7ded12e4bff.jpg', '21.045', 'SITI ALFIKA NURJANAH', '2003-01-29', '085724324378', '085724324378', 'alfikanurjanah1@gmail.com', 'Ds. Lengkong Rt01/01 No. 16 kec. Bojongsoang, kab. Bandung, Jawa Barat', './_file/praktik/praktikan/af86ff89c53252296289a9a8dca72e85.pdf', './_file/praktik/praktikan/846d9494d3980c8cbdc7d9cd4cc2bd9b.pdf', 'Y', 'T', NULL),
(53, 3, 0, '2023-03-10', NULL, './_file/praktik/praktikan/44ee9e022cfed75fc0b9dc92d0f23e7d.jpg', '21.011', 'Eva Asti Ayundia ', '2003-02-16', '081223748009', '081223748009', 'evaastia@gmail.com', 'Kp.cicau RT 06 RW 13 Kelurahan Padasuka ', './_file/praktik/praktikan/c7feb14a9e65ad9a034e35cc939fc9e5.pdf', './_file/praktik/praktikan/6ab154dae9722616f3dbfbe4f9a9f016.pdf', 'Y', 'T', NULL),
(54, 3, 0, '2023-03-10', NULL, './_file/praktik/praktikan/bf9ff6d68b3707c762b2c068bcc71b41.jpg', '21.014', 'FAKHRURRAZI', '1998-10-05', '0895701874727', '0895701874727', 'fakhrurrazi.fr68@gmail.com', 'ASMIL KIKAV 4/THC JL. SALAK NO 2 KEC. LENGKONG KEL. LINGKAR SELATAN', './_file/praktik/praktikan/19607562f149a0769162cb61f681c7d0.pdf', './_file/praktik/praktikan/9472db772b7f5b0a3a179f7c368eba2f.pdf', 'Y', 'T', NULL),
(55, 5, 0, '2023-03-10', NULL, './_file/praktik/praktikan/2a8873ec475d3f6e3e24ffb5b9c012d4.jpg', '21.131', 'Lilik Azizah ', '2001-03-06', '082324259272', '082324259272', 'lilikazizah02@gmail.com', 'Jl.manunggal No.7 Rt.04 Rw.08 Kec.sukasari Bandung', './_file/praktik/praktikan/9da14e95dfd2acd893d3c10f73941948.pdf', './_file/praktik/praktikan/415bcf2e9705d6b5c945879c64e71a15.pdf', 'Y', 'T', NULL),
(56, 3, 0, '2023-03-10', NULL, './_file/praktik/praktikan/dc88d4fb80794e3911664333fe6133bc.jpg', '21.010', 'ENDAH APRILIA', '2003-04-15', '083183795139', '083183795139', 'endahaprilia3@gmail.com', 'kp. pasir tulang ds. padajaya kec. cikalong kulon kab. cianjur', './_file/praktik/praktikan/a4dc450b8e843013144e20f92aa0281f.pdf', './_file/praktik/praktikan/3a91429f9954aa83c1239e17d3456509.pdf', 'Y', 'T', NULL),
(57, 5, 0, '2023-03-10', NULL, './_file/praktik/praktikan/5825af76706ad51a91f9951c49555cbe.jpg', '21126', 'Jia Sri Anjani', '2001-11-19', '081394780726', '085962363269', 'jiasanjani@gmail.com', 'Kp. Cibihbul Rt02/Rw06 Desa Bojongpicung Kec. Bojongpicung Kab. Cianjur ', './_file/praktik/praktikan/958c5ece31a6f13375c13e38a8aa6200.pdf', './_file/praktik/praktikan/076a06c7ba2e1681364bc356746aa7af.pdf', 'Y', 'T', NULL),
(58, 3, 0, '2023-03-10', NULL, './_file/praktik/praktikan/2edf4e3b69e5148852ecb65117ae8dc1.jpg', '21.012', 'FADILA PEBRIA ANANDA RAHMAWATI', '2002-02-23', '0895344328426', '0895344328426', 'fadilapebria@gmail.com', 'Cibihbul Rt 01 Rw 06 Desa Mangunarga Kecamatan cimanggung Kabupaten Sumedang ', './_file/praktik/praktikan/518d5dda44b9c4c5815c05cda08d555a.pdf', './_file/praktik/praktikan/f7db8dd8f6fe4eba4035487681f8de36.pdf', 'Y', 'T', NULL),
(60, 4, 0, '2023-03-10', NULL, './_file/praktik/praktikan/f122074a601eaa564ba839a589ee8979.jpg', '21.093', 'Sani Latifah', '2002-10-01', '081221549330', '081221549330', 'saniltfh102@gmail.com', 'kp.jatinunggal rt.02/06 ds.cipedes kec.paseh kab.bandung ', './_file/praktik/praktikan/95a6d7a14daacf069bf111ebbc258f7b.pdf', './_file/praktik/praktikan/63a67cbf8423ff24fa97954b6fbb0593.pdf', 'Y', 'T', NULL),
(61, 5, 0, '2023-03-10', NULL, './_file/praktik/praktikan/d12a33bcac767ac5cac8c098ec0e0db1.jpg', '21148', 'Santi Wulandari ', '2002-03-02', '083829204566', '085780502225', 'santiwulandari896@gmail.com', 'kp. Parigi mekar. RT 02/21, Ds. Tagog Apu, Kec. Padalarang, kab. Bandung barat ', './_file/praktik/praktikan/49c383ee8673de09162fc403abd13f56.pdf', './_file/praktik/praktikan/9f9938ea039b396abf187fff9ad59f94.pdf', 'Y', 'T', NULL),
(62, 3, 0, '2023-03-10', NULL, './_file/praktik/praktikan/fe8f4d52537e08ea44d44a701978adea.jpg', '21.003', 'ALISA NURSYABANA', '2003-10-25', '087708892150', '087708892150', 'Alisya.Nursyabana.25@gmail.com', 'Kp. Babakan sukamulya rt/rw 02/13 kec.Cileunyi kab.Bandung', './_file/praktik/praktikan/a6e0cc4335020f7c3817c944b03eec0f.pdf', './_file/praktik/praktikan/e6535178a1ad63d6b397c5cd4271a19b.pdf', 'Y', 'T', NULL),
(63, 3, 0, '2023-03-10', NULL, './_file/praktik/praktikan/1d9f422c20e71a6850927b2e1f7330f1.jpg', '21.004', 'AMELIA AURANI ANDINI ', '2003-10-09', '082121065569', '082121065569', 'ameliaaurani03@gmail.com', 'Kp. sukarendah RT/RW 02/06 Ds. Sirnagalih Kec. Cipeundeuy Kab. Bandung Barat ', './_file/praktik/praktikan/137e7cb8959b503a3eb557acad68c6cb.pdf', './_file/praktik/praktikan/f1fd338e38f3a66d5a5c0b45d8562e42.pdf', 'Y', 'T', NULL),
(64, 5, 0, '2023-03-10', NULL, './_file/praktik/praktikan/90c9b8d52c200fdee7c911428db04c5d.jpg', '21137', 'Najla Shidqia Khairunnisa', '2003-06-03', '081511673834', '081511673834', 'najla.sidqia@gmail.com', 'Cihampelas No.63 RT 04/02, Kec. Cihampelas, Kab. Bandung Barat', './_file/praktik/praktikan/9f6118dedbfa8d60da944f3741d5f38f.pdf', './_file/praktik/praktikan/b8b5b5d6cac4fee637c08b62e9a842d9.pdf', 'Y', 'T', NULL),
(65, 4, 0, '2023-03-10', NULL, './_file/praktik/praktikan/6646e38e3a9ac1984ca0bbbcf3d77a1d.jpg', '21066', 'Fitri Nur Azizah ', '2002-12-17', '085721235790', '085721235790', 'fitriazzh21@gmail.com', 'Ds Selacau, Jalan Selacau, RT.1/RW.8, Selacau, Batujajar KAB. BANDUNG BARAT, BATUJAJAR, JAWA BARAT, ID, 40561', './_file/praktik/praktikan/1bd313ec1d6875571caa2d782170081d.pdf', './_file/praktik/praktikan/77dfbfe6c366c7287f9fe0790c668e25.pdf', 'Y', 'T', NULL),
(66, 3, 0, '2023-03-10', NULL, './_file/praktik/praktikan/dc83c985795a97e9977e30048e7b9d6b.jpg', '21.033', 'NUR KHAODAH SYAHWAL ARUM', '2002-12-19', '081221412638', '081221412638', 'nurarum1912@gmail.com', 'Jl. Encep Kartawiria Rt 01 Rw 06 Gg. Permana A1 No. 04 Citeureup, Cimahi Utara, Kota Cimahi', './_file/praktik/praktikan/7b514d4b8e5ca297ef5edf3a0b523caf.pdf', './_file/praktik/praktikan/17c2defa7d12c3d49eaf9120313197f9.pdf', 'Y', 'T', NULL),
(67, 5, 0, '2023-03-10', NULL, './_file/praktik/praktikan/419c7f2f256ce6b00cbad8d8d96c84c0.jpg', '21142', 'Rahayu pidia keumala', '2000-12-21', '085315082130', '085315082130', 'rahayukeumala21@gmail.com', 'indramayu', './_file/praktik/praktikan/83b7dd071028552e3a4586acb1b0ff12.pdf', './_file/praktik/praktikan/e521afeb24461e712e747ba6e5a7c273.pdf', 'Y', 'T', NULL),
(68, 4, 0, '2023-03-10', NULL, './_file/praktik/praktikan/414b350b382bb5ebeaab4fd52d6cdb7c.jpg', '21057', 'Dede Muhamad Ikhsanuddin', '2002-12-26', '083822526723', '083822526723', 'ikhsandede159@gmail.com', 'Kp cibungur desa margaluyu kec.cipeundeuy kab.bandung barat', './_file/praktik/praktikan/0f82d8443c6f09060bdb9d1e8171e6f6.pdf', './_file/praktik/praktikan/3c8eb922e568b1dbd86a5a99caff6f47.pdf', 'Y', 'T', NULL),
(69, 3, 0, '2023-03-10', NULL, './_file/praktik/praktikan/57730eaf985c2f3301cdc75d2f57024d.jpg', '21.020', 'JESIKA HANDAYANI', '2002-12-13', '0895352940263', '0895352940263', 'jesikaa2019@gmail.com', 'jl. jend amir machmud Gg.sirnagalih no. 23 Rt. 01/06 cibabat, kota cimahi', './_file/praktik/praktikan/4382734cb79d1183b950b1547e36f222.pdf', './_file/praktik/praktikan/5741be42e842077491f2ae20ff260575.pdf', 'Y', 'T', NULL),
(70, 5, 0, '2023-03-10', NULL, './_file/praktik/praktikan/938504344cc30c8b8be243ddb670c03b.jpg', '21114', 'Dini Maryani ', '2003-02-02', '082320086656', '082320086656', 'dmaryani599@gmail.com', 'Blok. Kilalawang rt 02 rw 06 desa. Heuleut, kec. Leuwimunding kab. Majalengka ', './_file/praktik/praktikan/0fb7b733ff08a41481b4ed280fe2f535.pdf', './_file/praktik/praktikan/905163dd7bf72599fba7f08ed7255f62.pdf', 'Y', 'T', NULL),
(71, 3, 0, '2023-03-10', NULL, './_file/praktik/praktikan/d2f2e0707c962fd88e40a71b6719bc01.jpg', '21.013', 'Fajar Sidik Sopyan', '2002-12-09', '083877051905', '085724166457', 'fajarSsopyan08@gmail.com', 'Kp.Boncel Rt 01 Rw 11 Des. Bojong Emas Kec. Solokan Jeruk Kab. Bandung', './_file/praktik/praktikan/01c2d33219d3bfabc966ba5610a26106.pdf', './_file/praktik/praktikan/9eb3d59920cab8313a0d2b11411d6383.pdf', 'Y', 'T', NULL),
(72, 4, 0, '2023-03-10', NULL, './_file/praktik/praktikan/52f7ed6e74cf62c37c449ed743bd6e70.jpg', '21.096', 'Siti nuraliya ', '2002-10-17', '082116045709', '082116045709', 'sitinuraliya1710@gmail.com', 'Kp.cimega,jln plta Saguling Rt1/RW\r\n6sarinagen Cipongkor KBB Bandung barat ', './_file/praktik/praktikan/a3c230e5c4e1548df46e08e21c5d3cf3.pdf', './_file/praktik/praktikan/8e05efa564700596e9378954157b46cf.pdf', 'Y', 'T', NULL),
(73, 3, 0, '2023-03-10', NULL, './_file/praktik/praktikan/e914e1818848c927f4a9d3e90b77d992.jpg', '21.005', 'DAVIN ARYA MEDYANTARA PRATAMA', '2003-11-28', '085603525169', '085603525169', 'davinarya27@gmail.com', 'jl. ciloa rt05 rw03, pasirhalang, cisarua, bandung barat', './_file/praktik/praktikan/e026a21df271f633106d496c0f61ba27.pdf', './_file/praktik/praktikan/6ef7eb530ed60fbf79d807dd2492ae7a.pdf', 'Y', 'T', NULL),
(74, 3, 0, '2023-03-10', NULL, './_file/praktik/praktikan/29613f3e3504d665afe0afa0578c1513.jpg', '21.017', 'IDA AYU KARTIKA DEWI', '2003-11-09', '081247160735', '081247160735', 'idaayukartikad9@gmail.com', 'Komp. BMI blok E.2 no.55 Rt.03/Rw.17 Desa:BojongMalaka, Kec:Baleendah, Kab:Bandung', './_file/praktik/praktikan/112f31ddf70576a1c5b42feece814133.pdf', './_file/praktik/praktikan/fa4010567f599c51feeb010b8987cef6.pdf', 'Y', 'T', NULL),
(75, 3, 0, '2023-03-10', NULL, './_file/praktik/praktikan/659c0995bd7e8e18515a367e3c70363f.jpg', '21.036', 'RADITA ANGGRAINI', '2003-04-12', '085797462797', '085797462797', 'rereradita@gmail.com', 'Dsn. Sirah Cikandang Ds. Cinanjung RT/RW 02/04  Kec. Tanjungsari Kab. Sumedang Prov. Jawa Barat', './_file/praktik/praktikan/75a1fa6db3981d57e5ff2cda71b925b1.pdf', './_file/praktik/praktikan/89669f3648eea153abe3cfc94e9d2ef9.pdf', 'Y', 'T', NULL),
(76, 4, 0, '2023-03-10', NULL, './_file/praktik/praktikan/9bca3593939933c10aa48efbcdc16787.jpg', '21083', 'Novita Tabah Wiranti', '2002-11-18', '081224162259', '081224162259', 'novitatabahwiranti18@gmail.com', 'Pesona Permata Permai', './_file/praktik/praktikan/258253a135d88dc2de713e1c68452ef0.pdf', './_file/praktik/praktikan/bd33582abe62f12cc524bf548fcc5168.pdf', 'Y', 'T', NULL),
(77, 3, 0, '2023-03-10', NULL, './_file/praktik/praktikan/414c716cda3e5376256a464344f144f8.jpg', '21038', 'RENA AYU', '2023-03-20', '082116850601', '082116850601', 'renaayu2021@gmail.com', 'Jl. Sukarasa II No 41 rt 002 rw 011 kel. Citeureup kec. Cimahi utara Kota Cimahi', './_file/praktik/praktikan/62a4ce29fc79e07dc99d79452afb4000.pdf', './_file/praktik/praktikan/d7c3550aeee15bf344f55c3b76a31e0f.pdf', 'Y', 'T', NULL),
(78, 3, 0, '2023-03-10', NULL, './_file/praktik/praktikan/2a7a1daad6046370db2f065794ca9ec2.jpg', '21.035', 'Puji Bunga Restayanie Kirana ', '2003-01-07', '085776418543', '085776418543', 'bungapuji450@gmail.com', 'Kp.Palasari 2 RT 09 RW 03 Ds.Palasari Kec.Ciater Kab.Subang', './_file/praktik/praktikan/0b0519ca86c6b9de43c305cfbc4da736.pdf', './_file/praktik/praktikan/f3c931829e6bfbd035208a4b8e5642c4.pdf', 'Y', 'T', NULL),
(79, 4, 0, '2023-03-10', NULL, './_file/praktik/praktikan/e649ec3c6875bf51a0d0d6462032c9d4.jpg', '21092', 'Salva Adhi Putri Maharani', '2003-07-05', '082119304167', '082110394167', 'salvaadhi123@gmail.com', 'Komp.Pusdiktop Jl.Sariwangi No.69 RT/RW 01/02 ', './_file/praktik/praktikan/6603c8a2948e4f3dc6e6c8b273f65ed5.pdf', './_file/praktik/praktikan/23387d6cea48c9a3897f5fe9bf9b763c.pdf', 'Y', 'T', NULL),
(80, 4, 0, '2023-03-10', NULL, './_file/praktik/praktikan/8056049bc39ed2ae5ad5a047c423ffbc.jpg', '21.082', 'Neng Nurhayati', '2002-02-02', '082120346937', '', 'nengn1417@gmail.com', 'Kp.dangdeur rt02/rw14 desa rendeh ,kecamatan cikalong wetan kab bandung barat', './_file/praktik/praktikan/117fad3b65b31396c85892bdead16309.pdf', './_file/praktik/praktikan/b4de506a608ad5dbdd7a27d70e5b8979.pdf', 'Y', 'T', NULL),
(81, 3, 0, '2023-03-10', NULL, './_file/praktik/praktikan/f98343d3033d8e2a612022a50a8565b3.jpg', '21.032', 'NUFIKHA DEWI AZIZAH', '2002-11-08', '083195511348', '083195511348', 'nufikhadewiazizah@gmail.com', 'Jln manggahang 2 rt 03 Rw 06', './_file/praktik/praktikan/52897098d4fedbcd0aaa98eca40502d7.pdf', './_file/praktik/praktikan/da0eb5f2a629c44eb37b93ba31353007.pdf', 'Y', 'T', NULL),
(82, 3, 0, '2023-03-10', NULL, './_file/praktik/praktikan/791072a5d3be8e932d73f0c4ed3d9de7.jpg', '21.039', 'RESMA ARFIANI', '2003-06-02', '081252795514', '081252795514', 'resmaarfiani68453@gmail.com', 'Kp. Lebakleungsir Rt.01/Rw.10 Des.Mekarjaya Kec.Cikalong wetan', './_file/praktik/praktikan/ea6a94ca284c69021e60b7997158f0f2.pdf', './_file/praktik/praktikan/21870d220a3d9d4cc5a2c2cba35360d0.pdf', 'Y', 'T', NULL),
(83, 3, 0, '2023-03-10', NULL, './_file/praktik/praktikan/1074ad50744f3b61768bc0ce460ace5c.jpg', '21.029', 'MUHAMMAD RIZA KURNIAWAN', '2002-10-05', '081280197589', '081280197589', 'frosh15riza@gmail.com', 'PERUM GPI JALAN MERAH DELIMA NO35', './_file/praktik/praktikan/97d256f62ef320faf241872bcb274364.pdf', './_file/praktik/praktikan/a5e1950f5b7a06a83f9617bafb36c341.pdf', 'Y', 'T', NULL),
(84, 5, 0, '2023-03-10', NULL, './_file/praktik/praktikan/8bd2deed4770635885ae80eff2847211.jpg', '21119', 'Eva Hanifa', '2002-12-28', '0882001436584', '0882001436584', 'evahanifa22@gmail.com', 'kp citeureup 01/11, neglasari, banjaran, kab. bandung', './_file/praktik/praktikan/6026ae2a731b7e07d4a1b7415984edae.pdf', './_file/praktik/praktikan/bb5ebebb833ad1212dd09a6d0e614f4e.pdf', 'Y', 'T', NULL),
(85, 4, 0, '2023-03-10', NULL, './_file/praktik/praktikan/6d4172146a9e441200b4a2607da5dc9c.jpg', '21088', 'Reghina Marchela Putri', '2003-03-09', '085703234816', '085703234816', 'reghinamarchela7@gmail.com', 'Padasuka Indah II RT 08/09 Desa Gadobangkong Kecamatan Ngamprah Kabupaten Bandung Barat', './_file/praktik/praktikan/3e2f4685a3694b3ef827eb85202d9e42.pdf', './_file/praktik/praktikan/4ad7f6b54e6f898fde42e1888576ce82.pdf', 'Y', 'T', NULL),
(86, 5, 0, '2023-03-10', NULL, './_file/praktik/praktikan/07799013413760816372d8100efd29f2.jpg', '21125', 'Indri Novianti ', '2002-11-08', '08987120564', '08987120564', 'indrivvianti812@gmail.con', 'Jl Hajigofur, DS Cilame, Kec Ngamprah, Kp Cibuntu, RT 02 RW 09 kode pos 40552', './_file/praktik/praktikan/13169f7bc8a36b19fc1a7f9306f3ffbd.pdf', './_file/praktik/praktikan/5d1241143962ac90686684eb5e04d7a8.pdf', 'Y', 'T', NULL),
(87, 5, 0, '2023-03-10', NULL, './_file/praktik/praktikan/7af48601132e47b877b035a29ba8ac3c.jpg', '21153', 'Vina Naella Zulva', '2002-12-25', '082217256859', '082217256859', 'vinanaellazv25@gmail.com', 'Asrama Yonif Para Raider 330, RT001/RW006, Desa Mandalawangi, Kecamatan Nagreg, Kabupaten Bandung', './_file/praktik/praktikan/cbf013f65aae72b55f0adf26161efc8f.pdf', './_file/praktik/praktikan/2f8ceb9d3383904436d6de41acd687dd.pdf', 'Y', 'T', NULL),
(88, 5, 0, '2023-03-10', NULL, './_file/praktik/praktikan/9cbceec9bc2c182c8c30aa9199007356.jpg', '21127', 'Jihan Salsabilila ', '2003-03-08', '081311979011', '081311979011', 'jihansalsabilila@gmail.com', 'Kampung panyandaan no 10, RT 001 RW 014, Desa Jambudipa, Kec. Cisarua', './_file/praktik/praktikan/e6a5e180184f2ef93b94315e852bef11.pdf', './_file/praktik/praktikan/6a908313311b465edce06b75df1c5688.pdf', 'Y', 'T', NULL),
(89, 3, 0, '2023-03-10', NULL, './_file/praktik/praktikan/a4eef47fe0427d02bc465779e5f1f387.jpg', '21.047', 'SUPRON', '1984-04-04', '081389685315', '083189685315', 'supron3106@gmail.com', 'Asrama yonif 312/KH subang, kel dangder, kec subang, kab subang', './_file/praktik/praktikan/93a6fd98d74d2521543c94fac4ca7f52.pdf', './_file/praktik/praktikan/8f86860bbe73d85a8ad432a9e1f9c778.pdf', 'Y', 'T', NULL),
(90, 5, 0, '2023-03-10', NULL, './_file/praktik/praktikan/42589d0829c9fa09319b83aae7d4e2d1.jpg', '21146', 'Salma Agnif Qoriah ', '2003-11-17', '085221593337', '085703558446', 'agnifsalma@gmail.com', 'Kp. Babakan 04/06 Ds.Nanjung Mekar Kec. Rancaekek Kab.Bandung', './_file/praktik/praktikan/e056a34a15d130ec1e2db71794be3049.pdf', './_file/praktik/praktikan/140516e9b1e343cb6fa6ed78b976eb04.pdf', 'Y', 'T', NULL),
(91, 5, 0, '2023-03-10', NULL, './_file/praktik/praktikan/afe195decf6c93d5d74ba50205e2c388.jpg', '21106', 'Annisa Nur IndahSari', '2003-03-11', '085524954935', '085524954935', 'annisanurindah1123@gmail.com', 'Jl Ibu Ganirah Rt 05/05 No.56 Kel Cibeber Kec Cimahi Selatan', './_file/praktik/praktikan/d54ab4ddf7b1aba638282a3be40ae6e3.pdf', './_file/praktik/praktikan/c5d7ee8638dd6c3fb76fd6c322bedcde.pdf', 'Y', 'T', NULL),
(92, 3, 0, '2023-03-10', NULL, './_file/praktik/praktikan/21efe2e80cf6654df2aa516728ee69a0.jpg', '21.006', 'DELIA SELVI OKTAVIANI', '2002-01-01', '081224394811', '081224394811', 'deliaoktaviani002@gmail.com', 'Jln radio rt 02 Rw 01', './_file/praktik/praktikan/828f100b2870732edbb74380c14d09aa.pdf', './_file/praktik/praktikan/4c49452f296fcadb24bf79f9bf4a0d3e.pdf', 'Y', 'T', NULL),
(93, 5, 0, '2023-03-10', NULL, './_file/praktik/praktikan/edcd27dacab949cff8535497e5fa4d07.jpg', '21151', 'Suhendra Purnama ', '1997-03-18', '085314805536', '085314802536', 'Suhendrapurnama121@gmail.com', 'asmil yonif R 303 garut', './_file/praktik/praktikan/707263a6a723350f28dce79912c5833b.pdf', './_file/praktik/praktikan/386096c9fc936f92f9cc696cc24675af.pdf', 'Y', 'T', NULL),
(94, 5, 0, '2023-03-10', NULL, './_file/praktik/praktikan/1c39714c0fbaec10f8a037bc752f0a88.jpg', '21116', 'Ellya Jane sevty', '2003-01-05', '085892953715', '081224071925', 'ellyajanes5@gmail.com', 'KMP.ciburial barat rt02/05 Des.soreang kec.soreang kab.bandung', './_file/praktik/praktikan/54fe9b0234e65b12e7caf7f2c72a0190.pdf', './_file/praktik/praktikan/c2e0e5fc567c76beedbb85981935ceb4.pdf', 'Y', 'T', NULL),
(95, 3, 0, '2023-03-10', NULL, './_file/praktik/praktikan/94a76ceffcdb5c00f30162e619232b5f.jpg', '21.044', 'SEPHIA INDAH NURLANI ', '2002-12-18', '081271490325', '087776235322', 'sephiaindahnurlani18@gmail.com', 'Lk.Bujung tenuk menggala selatan rt02 rw03 ', './_file/praktik/praktikan/4cafccc0310093f6ad963f4ed3ee6133.pdf', './_file/praktik/praktikan/72e47c5d54d8820d40059a6929918c5d.pdf', 'Y', 'T', NULL),
(96, 4, 0, '2023-03-10', NULL, './_file/praktik/praktikan/d790c1873a8eaa330d967834294be979.jpg', '21.086', 'Putri Rosmawati Suparmin', '2002-01-21', '081320019873', '081320019873', 'putri.eres21@gmail.com', 'Jl.RH.Abdul Halim , RT.02/07 , no.137 , Kel.cigugur tengah , kec.cimahi tengah , kota cimahi', './_file/praktik/praktikan/2a9547bf2792dab5a6d70db16e5e999c.pdf', './_file/praktik/praktikan/910c8e2caf7e641ac8006eb33a550217.pdf', 'Y', 'T', NULL),
(98, 3, 0, '2023-03-10', NULL, './_file/praktik/praktikan/7daf83886d96d1dd98d39f70371fb179.jpg', '21.042', 'Riski Regina ', '2003-08-24', '081383924739', '081383924739', 'riskiregina24@gmail.com', 'Kp Sukabaru Rt 01 Rw 01 Desa Cihideung Kec Parongpong kab Bandung Barat ', './_file/praktik/praktikan/f1b4c71fefd6c964d04920bb2a77b558.pdf', './_file/praktik/praktikan/2fa7f7e5f0996d2668dd0f22376cf5c0.pdf', 'Y', 'T', NULL),
(99, 4, 0, '2023-03-10', NULL, './_file/praktik/praktikan/0743a242b68bd64d375f87bc271f6bcc.jpg', '21061', 'Dona Kurnianingsih', '2002-11-15', '081325412995', '081325412995', 'donapgr02@gmail.com', 'DSN SIDAURIP, DESA SIDAURIP, RT 006 RW 004 KEC. GANDRUNGMANGU, CILACAP - JAWA TENGAH', './_file/praktik/praktikan/eccc512d1d2dfc67adffea7e34872faf.pdf', './_file/praktik/praktikan/c2fd6a940563f3191dda547c32ae9008.pdf', 'Y', 'T', NULL),
(100, 5, 0, '2023-03-10', NULL, './_file/praktik/praktikan/f82ca24bfc18691668566c5ea58bfe96.jpg', '21104', 'Alvionita Isnaeni Sudestri', '2002-04-01', '085795053090', '085795053090', 'alvionitaisnaenis01@gmail.com', 'Dano 004/011, ds. kotakaler, kec.sumedang utara. kab. sumedang', './_file/praktik/praktikan/132aa05a4f200ca3eab1233690fe8345.pdf', './_file/praktik/praktikan/fc91cfdd9202f633da1bd681235b1aa5.pdf', 'Y', 'T', NULL),
(101, 5, 0, '2023-03-10', NULL, './_file/praktik/praktikan/c73b0a428f1cf34551a24f8540ad54f3.jpg', '21130', 'Lianie Heliani Aprian ', '2003-04-10', '081383078990', '081383078990', 'lianiehapn@gmail.com', 'Ds. Cilengkong RT/RW 01/01 kel.cijati kec. Situraja kab. Sumedang ', './_file/praktik/praktikan/91b580fc7327baa14fed3ddba6bd4927.pdf', './_file/praktik/praktikan/949dbe1823acc0d99e420cd9c7f12552.pdf', 'Y', 'T', NULL),
(102, 4, 0, '2023-03-10', NULL, './_file/praktik/praktikan/9327f3b7886b551ba703468344a92c84.jpg', '21053', 'Ane Mulyati', '2002-05-31', '081223879387', '089668922775', 'anemulyati5@gmail.com', 'Kp panyadap rt04/rw13, Desa Panyadap, Kecamatan Solokan Jeruk, Kabupaten Bandung ', './_file/praktik/praktikan/3321835a3c66349356b421776946e593.pdf', './_file/praktik/praktikan/5f8bdb621c206b4ab59c3359b811f89d.pdf', 'Y', 'T', NULL),
(103, 5, 0, '2023-03-10', NULL, './_file/praktik/praktikan/203ce7264bc88b86ffdc5245953333b2.jpg', '21144', 'Ratu Cita Pujiawan', '2003-01-17', '081310813061', '081310813061', 'ratucitapujiawan@gmail.com', 'Kp. Krajan Desa Lebak Anyar Kec. Pasawahan Kab. Purwakarta', './_file/praktik/praktikan/581d75acbaa0d185f19a83819b8f74ac.pdf', './_file/praktik/praktikan/cc27dba87d368e18cfb3aff8952a47e6.pdf', 'Y', 'T', NULL),
(104, 4, 0, '2023-03-10', NULL, './_file/praktik/praktikan/05904569adb141f5911c4dc715da7947.jpg', '21.065', 'Ferdy Gustami', '1995-01-06', '082113642330', '082113642330', 'ferdygustamiakper@gmail.com', 'Cimahi', './_file/praktik/praktikan/bc8110a18db12f74888e90c77797807d.pdf', './_file/praktik/praktikan/9b60ae1930c69ded4f62388c252e766d.pdf', 'Y', 'T', NULL),
(105, 4, 0, '2023-03-10', NULL, './_file/praktik/praktikan/55d76c619222286604f84b593212bea7.jpg', '21091', 'Rizka Kharisma', '2002-04-26', '085829338718', '085829338718', 'kharismarizka4@gmail.com', 'Jl. Pasirkumeli Atas No.27 RT 001 RW 022 Kel. Baros Kec. Cimahi Tengah', './_file/praktik/praktikan/0d407a534db882b06debe4b10a8aeb6e.pdf', './_file/praktik/praktikan/1b1a2d764729a911a4af77c141825b36.pdf', 'Y', 'T', NULL),
(106, 5, 0, '2023-03-10', NULL, './_file/praktik/praktikan/b8410b654e188b4d67d61182f5e66718.jpg', '21118', 'Ermavina Ayuningsih', '2002-12-25', '085892953734', '087780864946', 'ermavinaayuningsih@gmail.com', 'Perum Pondok Sukamantri Blok G no 2 Rt. 04/Rw.16 Desa. Cinunuk Kec. Cileunyi', './_file/praktik/praktikan/521e00c2cd63d968565f9f3ff4e6e686.pdf', './_file/praktik/praktikan/aa220e12fb1837495913e9617b58e030.pdf', 'Y', 'T', NULL),
(107, 3, 0, '2023-03-10', NULL, './_file/praktik/praktikan/38334865d51d21211cf773bb7f5a8a15.jpg', '21.048', 'Syifa Rahma Shaadilah', '2002-08-08', '085862771363', '085862771363', 'syifarahma953@gmail.com', 'Jln Panembakan No.15 Rt02/Rw05 Kec. Cimahi Tengah Kel Padasuka', './_file/praktik/praktikan/46143a210541afcc8fcc4a81fff38e68.pdf', './_file/praktik/praktikan/e0e7884a8cbaed17aaf1d659dc179a9c.pdf', 'Y', 'T', NULL),
(108, 5, 0, '2023-03-10', NULL, './_file/praktik/praktikan/7b0f18164d6f988e0e5e3d996978606c.jpg', '21105', 'Amelya Fazhira Wulandari ', '2003-07-23', '081223492393', '081223492393', 'amelyafazhira2@gmail.com', 'Perum Permata Hijau C64 RT 03 RW 16 Desa Jelegong Kecamatan Rancaekek Kabupaten Bandung ', './_file/praktik/praktikan/d8ee0481bda03087562d785d31b112ad.pdf', './_file/praktik/praktikan/6f23b16e881ee5c52767fc1d94828b0d.pdf', 'Y', 'T', NULL),
(109, 5, 0, '2023-03-10', NULL, './_file/praktik/praktikan/bfba6532656bdaa12dd7baa1de6dba1b.jpg', '21139', 'Novi Rahmawati ', '2002-11-20', '085891028319', '085891028319', 'novianovirahmawati@gmail.com', 'Kp sudimampir hilir,RT01/ RW17, Desa Kertajaya, Kecamatan Padalay, Kabupaten Bandung Barat', './_file/praktik/praktikan/ce2482eccf73e0a0305b08d5d90ca899.pdf', './_file/praktik/praktikan/21085ee3823f8eb1818113d14cb6cfc6.pdf', 'Y', 'T', NULL),
(110, 3, 0, '2023-03-10', NULL, './_file/praktik/praktikan/3fc2e8f1018519c9ec6a5561aafaddf4.jpg', '21.028', 'MUHAMMAD DIFA DWI PURNAMA', '2002-12-18', '082217863685', '082217863685', 'mdifadp@gmail.com', 'KP.PAWENANG RT 03 RW 04 DESA KADEMANGAN KECAMATAN MANDE KABUPATEN CIANJUR ', './_file/praktik/praktikan/eb149dc52c5e8ccecc9c584613919669.pdf', './_file/praktik/praktikan/4a04f3c66f4912f73a4815c3a0f479e7.pdf', 'Y', 'T', NULL),
(111, 5, 0, '2023-03-10', NULL, './_file/praktik/praktikan/e5d350680d209c41bea9171b6cc54eae.jpg', '21103', 'Aisha Seftiani Azzahra', '2003-09-07', '085762920750', '085762920750', 'aishaseftiania@gmail.com', 'Kp. Kepuh Kec. Padalarang Kab. Bandung Barat', './_file/praktik/praktikan/60f3be2d0c2173dba58a7ee25a802778.pdf', './_file/praktik/praktikan/6b0ac4086140c46086d8e0ce6ebac07e.pdf', 'Y', 'T', NULL),
(112, 5, 0, '2023-03-10', NULL, './_file/praktik/praktikan/ff2f199734d97b1a3c5f3a0b41042c78.jpg', '21140', 'Nur leyli badri ', '2001-09-12', '082120346798', '082120346798', 'nurleyli1209@gmail.com', 'Jln raya pemucatan no 401 rt 02 rw 19 desa Padalarang kec padalarang keb bandung barat', './_file/praktik/praktikan/222a4754daa52e8fd131f3c7381a910c.pdf', './_file/praktik/praktikan/73a14a093ec2d761156e74618ea90148.pdf', 'Y', 'T', NULL),
(113, 3, 0, '2023-03-10', NULL, './_file/praktik/praktikan/7104bea90b84f7bb5ccad68f142cee75.jpg', '21.051', 'YULIANTI NURHALIZAH', '2004-07-28', '08886038177', '08886038177', 'yuliantinurhalizah66@gmail.com', 'Jl.Adipati Kertamanah Dalam RT.03 RW.16 Baleendah ', './_file/praktik/praktikan/2da0d4c9d8e9e66dc89f3c7e25b7be37.pdf', './_file/praktik/praktikan/7842a4552a31b14edb533d4889fb4bb8.pdf', 'Y', 'T', NULL),
(114, 4, 0, '2023-03-10', NULL, './_file/praktik/praktikan/c209c408fe4699af672f62bb29646546.jpg', '21.094', 'Siti Fatimah ', '2004-03-07', '083141440386', '083141440386', 'sitifatimah070304@gmail.com', 'Jl. Kolonel masturi, Rt.03/Rw.4, ds. Karyawangi, kec. Parongpong, kab. Bandung barat', './_file/praktik/praktikan/db608b414262dc0c7216baf377130a2a.pdf', './_file/praktik/praktikan/ea92485a9d460aacbda1fff5fd1270de.pdf', 'Y', 'T', NULL),
(115, 4, 0, '2023-03-10', NULL, './_file/praktik/praktikan/1fde44f67e901c493f76c65233d37da6.jpg', '21067', 'Hendi Hanova Rizki Nur Tisna ', '1999-05-27', '081221549562', '081221549562', 'hendihanova27@gmail.com', 'Kp.Parongpong Rt.003 Rw.011 Desa.Karyawangi Kec.Parongpong Kan.Bandung Barat', './_file/praktik/praktikan/8616f9e96546e3188504e51ff962a69e.pdf', './_file/praktik/praktikan/2d85b1f3c9855d540fbb2434b38f30ce.pdf', 'Y', 'T', NULL),
(116, 5, 0, '2023-03-10', NULL, './_file/praktik/praktikan/a15bbdd3d2b5187f3da4536f737c0822.jpg', '21149', 'Selvya Oktavia', '2002-10-21', '081383571465', '081383571465', 'selvyaoktavia3@gmail.com', 'Perumahan Griya Pasundan kertajaya, jalan sodong hilir ', './_file/praktik/praktikan/bbf10cbdbabe2fda5e49dc5991a2806c.pdf', './_file/praktik/praktikan/68c01edf4c7b475da4a7f82aafe6043f.pdf', 'Y', 'T', NULL),
(117, 4, 0, '2023-03-10', NULL, './_file/praktik/praktikan/cd368de49f7053ba6c58f5ad97c36334.jpg', '21.080', 'Nasywa Anandita', '2003-11-16', '081213985931', '081213985931', 'nasywaanndt@gmail.com', 'Perumahan griya jatinangor 1 jln. Cempaka 3 no. 28A Desa. Sukarapih Kec. Sukasari Kab. Sumedang', './_file/praktik/praktikan/9f206526b40d66b5ec818a4e5b9387fd.pdf', './_file/praktik/praktikan/f823ed463aaa8fdde43c5142985795c3.pdf', 'Y', 'T', NULL),
(118, 4, 0, '2023-03-10', NULL, './_file/praktik/praktikan/4553ebdb0a5c19c92b240ecb90b0376f.jpg', '21.087', 'Rahman Rama Maulidin Kurniatisna', '2003-05-19', '081809470923', '081809470923', 'rahmanrama2003@gmail.com', 'Jl. Karang Tineung Indah RT. 07 RW. 01 kelurahan Cipedes Kecamatan Sukajadi ', './_file/praktik/praktikan/d6146f0f1d52ee76c11d857d90677f4a.pdf', './_file/praktik/praktikan/9f99f8c736350b053e91aadd7dd5e339.pdf', 'Y', 'T', NULL),
(119, 4, 0, '2023-03-10', NULL, './_file/praktik/praktikan/c016738750657e3b3dd0e662aca9be7a.jpg', '21098', 'Syafa Aldila Meizha Rachma ', '2002-05-02', '081395458309', '081395458309', 'sfmeizha@gmail.com', 'Asrama Swadaya Pusdikpal No.20 RT.001/RW.014 Kel.KARANGMEKAR Kec.Cimahi Tengah, Kota Cimahi', './_file/praktik/praktikan/aa3bb06c540de4f5b015e76c3f09864d.pdf', './_file/praktik/praktikan/096ca113b5675df59bcb80a87cb7555c.pdf', 'Y', 'T', NULL),
(120, 4, 0, '2023-03-10', NULL, './_file/praktik/praktikan/3625d55cc1bd272527c443c61e4ca835.jpg', '21055', 'Dani Purba Yusuf', '2002-07-21', '081369940721', '081369940721', 'pubadani12@gmail.com', 'Sinar Harapan,MuaraJaya1,Kec.Kebun Tebu,Kab.Lampung Barat,Lampung', './_file/praktik/praktikan/c97a5ca1f0363be3049673c866f6bf22.pdf', './_file/praktik/praktikan/24c409d8777086f8fdded8c463a33d7a.pdf', 'Y', 'T', NULL),
(122, 4, 0, '2023-03-10', NULL, './_file/praktik/praktikan/9834a829fe109fb9080b1ec980d474b3.jpg', '21.074', 'Meidy Michelle Fitria Wawondatu', '2002-06-12', '087848755530', '087848755530', 'meidymfw@gmail.com', 'Jl. Sadarmanah No.98 Rt/Rw. 03/02, Kel. Leuwigajah', './_file/praktik/praktikan/1bca06b1042c217d83c8777952b127b0.pdf', './_file/praktik/praktikan/21bc3fc6a8b112d01778eb64abf5ae5c.pdf', 'Y', 'T', NULL),
(123, 3, 0, '2023-03-10', NULL, './_file/praktik/praktikan/07d91b4b5affe902ba2d5d4548f9ddfc.jpg', '21.025', 'MOHAMAD DWIKY AMARULLOH', '1999-09-03', '081292961123', '083808122220', 'Mdwiky261@gmail.com', 'Asrama Yonif 320/BP Rt.003 Rw.002 Kel. CADASARI Kec. CADASARI Kab. Pandeglang Prov. Banten', './_file/praktik/praktikan/38080468d069a96c98cbac0ac1dfae3b.pdf', './_file/praktik/praktikan/4589298c702870db3f673f5a18dd10e8.pdf', 'Y', 'T', NULL),
(124, 3, 0, '2023-03-10', NULL, './_file/praktik/praktikan/8d3d9eb0991345b2fe261edb306f7ea0.jpg', '21.046', 'SUCI AMELIA PUTRI', '2002-10-08', '085722565622', '085722565622', 'ameliaanandaputri@gmail.com', 'KP.CIBANTENG RT 04 RW 04 DESA CITALEM KECAMATAN CIPONGKOR', './_file/praktik/praktikan/2f26c05d3c097ab7d64b91581d48f9a6.pdf', './_file/praktik/praktikan/2c3c8d8a828efa0eb4c58dcdc51a3ec0.pdf', 'Y', 'T', NULL),
(125, 4, 0, '2023-03-10', NULL, './_file/praktik/praktikan/53d05fb403d9fd3b046781c7b76fafd6.jpg', '21070', 'Ismi kartika solehah', '2003-02-11', '087730636973', '087730636973', 'ismikartika72@gmail.com', 'kp.pasarsenen rt/rw 020/008 desa.cintajaya kec.tanjungjaya kab.tasikmalaya', './_file/praktik/praktikan/da14cade9bf61510f3a920eb0a4e533c.pdf', './_file/praktik/praktikan/8b6ac61baca49884eff2be095696819b.pdf', 'Y', 'T', NULL),
(126, 4, 0, '2023-03-10', NULL, './_file/praktik/praktikan/79d302f300e68542f0b2dde780fa4aff.jpg', '21.071', 'Ivan Adzani', '2002-01-22', '085865230828', '085865230828', 'Ivnadzani@gmail.com', 'Jl, Pramuka 15 / B-28 RT/RW 013?013 Kelurahan Cicadas, Kecamatan Cibeunying Kidul', './_file/praktik/praktikan/efc77126475917aeef6ddcf56bf712b0.pdf', './_file/praktik/praktikan/ca3125280309efe7678efbe37f0516e5.pdf', 'Y', 'T', NULL),
(127, 4, 0, '2023-03-10', NULL, './_file/praktik/praktikan/52f883cdfd004d28f3b1e671143b16ce.jpg', '21097', 'Suryati Nurul Anggraeni ', '2002-11-22', '085811460870', '085811460870', 'suryatiinurul23@gmail.com', 'Jl.warung selikur 3km. Kp.pasepatan ds.teras kec.carenang kab.serang-banten', './_file/praktik/praktikan/87fe86b099148ffc83f15023d6697a6d.pdf', './_file/praktik/praktikan/00264ea20064efdd2cbe33524e578110.pdf', 'Y', 'T', NULL),
(128, 4, 0, '2023-03-10', NULL, './_file/praktik/praktikan/acba7a7c5f224afcd486bc85adb26432.jpg', '21100', 'Tarisa Fadilah Dina Lestari', '2003-03-04', '082126647515', '082126647515', 'tarisafdl@gmail.com', 'Kp. Legok RT/RW 01/08 Ds. Sukarame Kec. Leles Kab. Garut Prov. Jawa Barat', './_file/praktik/praktikan/b6152dedef5c88d49b585cafd956c67d.pdf', './_file/praktik/praktikan/633fe271e8a7edb92ffc8c4fd7ac199a.pdf', 'Y', 'T', NULL),
(129, 4, 0, '2023-03-10', NULL, './_file/praktik/praktikan/e0ccddeb3159078f33ad8d58c19afc1c.jpg', '21095', 'Siti Latifah', '2001-10-13', '085641134405', '085641134405', 'sitilatiffah123@gmail.com', 'Kp. Cisurili RT 001 RW 012 Des. Margamulya Kec. Pangalengan Kab. Bandung', './_file/praktik/praktikan/b98b9484131a36c73fc27d48c9e7a90d.pdf', './_file/praktik/praktikan/c6b68026fe5d87b9871ba3e84b6d83bc.pdf', 'Y', 'T', NULL),
(130, 4, 0, '2023-03-10', NULL, './_file/praktik/praktikan/6a2d01c71b60f5d7702e5e4c5b90cba2.jpg', '21.102', 'Yayan Nuryana ', '1992-12-22', '081295875902', '081295875902', 'armedyayan66@gmail.com', 'Komplek gumil Secapa ad RT 04 04 Desa Sariwangi Kec Parongpong kab Bandung barat ', './_file/praktik/praktikan/d263daac509be99b2a7ecb4e66dec6bb.pdf', './_file/praktik/praktikan/94317f2e1410ac163267fbf0138b9d79.pdf', 'Y', 'T', NULL),
(131, 3, 0, '2023-03-10', NULL, './_file/praktik/praktikan/c585b542ecafd535d3f29d5fd4e97232.jpg', '21.002', 'ALIFFIA ZAHRA PUTRI NUR AINI', '2004-01-14', '081313558011', '081313558011', 'aliffiazhrp@gmail.com', 'jl.cibangkong rt 05 rw 11 Bandung', './_file/praktik/praktikan/48417abd27d082e5eda269c6107d5a33.pdf', './_file/praktik/praktikan/2758f3832488f50650a791a76e84a14d.pdf', 'Y', 'T', NULL),
(132, 4, 0, '2023-03-10', NULL, './_file/praktik/praktikan/009d5c6647d59ab02b6fb6622b92185f.jpg', '21.089', 'Rena Aprilita', '2003-04-25', '0895368564089', '0895368564089', 'renaprilita2504@gmail.com', 'jln. Maharmartanegara . Kp cimuncang rt01/08', './_file/praktik/praktikan/4cce6880d43d48e1d6b00c3044aadab3.pdf', './_file/praktik/praktikan/20901a5caf570cd5d7a3dacf39e2b8c4.pdf', 'Y', 'T', NULL),
(133, 4, 0, '2023-03-10', NULL, './_file/praktik/praktikan/fffe06177d614018d51ca445ccab0666.jpg', '21079', 'Nahdiah Amala', '2003-04-07', '081223620120', '', 'nahdiahamalaa1@gmail.com', 'Jl Turangga Timur 41 a', './_file/praktik/praktikan/a6a25491473a645f636647b1c337b4f3.pdf', './_file/praktik/praktikan/7c396263adb0b34650f7c00c2faf9649.pdf', 'Y', 'T', NULL),
(134, 5, 0, '2023-03-10', NULL, './_file/praktik/praktikan/1efd7e9dd034c79a81cf1d7bc78e44e4.jpg', '21147', 'Sandi', '2003-03-13', '082112109190', '082116614559', 'isansandi605@gmail.com', 'Kp. Paratag Rt.01/02 Desa. Cipada Kec. Cisarua Kab. Bandung Barat', './_file/praktik/praktikan/e75a2f2a35dd9ad6ba9f8505a50ebaff.pdf', './_file/praktik/praktikan/9800180372fa28e6f3176a0879f330ea.pdf', 'Y', 'T', NULL),
(136, 5, 0, '2023-03-10', NULL, './_file/praktik/praktikan/27be35f83d763b9c116962fba67043a1.jpg', '21145', 'Rizal Fauzi Afidin', '1996-11-26', '081395575050', '081395575050', 'rizalfauzi26111996@gmail.com', 'Asrama Yonzipur 3/YW kp.kramat desa.margamekar kec pangalengan kab.Bandung', './_file/praktik/praktikan/f7dee02782d894511e3c7aef3d9d581f.pdf', './_file/praktik/praktikan/5fc0039db0712dbc33470f639f97e950.pdf', 'Y', 'T', NULL),
(137, 4, 0, '2023-03-10', NULL, './_file/praktik/praktikan/ae26c0aa55bf5903caac2afbad310b20.jpg', '21.069', 'Irda Ryanita', '2002-08-21', '088218270539', '088218270539', 'Irdaryanita303@gmail.com', 'Kp. Babakan Cianjur Rt/Rw 02/04 Desa Cihampelas Kec. Cihampelas Kab. Bandung Barat 40767', './_file/praktik/praktikan/b20109be3e23b93ffaf23114eee35301.pdf', './_file/praktik/praktikan/3e844bcc14aa70d2e9914a04d10deda3.pdf', 'Y', 'T', NULL),
(138, 4, 0, '2023-03-10', NULL, './_file/praktik/praktikan/97d553f3edcfa13bb3a7ef89f9b8ccfd.jpg', '21.099', 'SYAHIRA MEILANI PUTRI ', '2003-05-06', '0895360456476', '', 'syahiramp234@gmail.com', 'Jalan ciganitri gang kenari no 19 rt03 rw07 kec bojong soang kab bandung kel cipagalo ', './_file/praktik/praktikan/f7f8844d7a0dc9367d46da4073b3cf65.pdf', './_file/praktik/praktikan/c0daf05eed2fd34cc906b60fda9f21de.pdf', 'Y', 'T', NULL),
(139, 5, 0, '2023-03-10', NULL, './_file/praktik/praktikan/494bb7ac6348e835ff09e93764736006.jpg', '21117', 'Erik Setiawan ', '2003-02-18', '085871325049', '085871325049', 'eriksetiawan182003@gmail.com', 'Jln. Purwakarta no 07 kp. Campaka 07 Rt 01 Rw 05 Desa Campaka Kec. Padalarang Kab. Bandung barat', './_file/praktik/praktikan/1f53acc2c18d90fd3335f2a0978a2e35.pdf', './_file/praktik/praktikan/6784fd040e268bfd408b9c7362f1b9f2.pdf', 'Y', 'T', NULL),
(140, 4, 0, '2023-03-10', NULL, './_file/praktik/praktikan/8205ad916fc9958c6b32dbc5f7bc74fe.jpg', '21.090', 'Resi Nuryani', '2002-06-10', '085161739983', '081903364200', 'resinuryani28@gmail.com', 'Kp.Campaka Rt 06 / Rw 05 Des. Campakamekar Kec. Padalarang kab.Bandung Barat ', './_file/praktik/praktikan/ae44626177202565be2eb9d4d8972f7c.pdf', './_file/praktik/praktikan/2df1795d773fdd9a040484348c930849.pdf', 'Y', 'T', NULL),
(141, 5, 0, '2023-03-10', NULL, './_file/praktik/praktikan/1d310c75241805577cd6eb3d53b23894.jpg', '21107', 'Aziiz Yan Joyo ', '1998-06-06', '082130238080', '082130238080', 'azizyanjoyo@gmail.com', 'Jl ibu ganirah RT 04 RW 05 Kel Cibeber Kec Cimahi Selatan kota Cimahi ', './_file/praktik/praktikan/3b3d84fb1c77a16bdd7acc8f22f30825.pdf', './_file/praktik/praktikan/810565d492668359361dd3b957a9dabc.pdf', 'Y', 'T', NULL),
(142, 4, 0, '2023-03-10', NULL, './_file/praktik/praktikan/544b1a54789177e88e27bf74ce1cac63.jpg', '21058', 'Delis Sri Hadianti ', '2004-03-24', '0882001299088', '0882001299088', 'sridelis14@gmail.com', 'Kp. Sarongge rt 04 rw 06 Desa Sukasari kec gununghalu kab Bandung barat prov Jawa barat', './_file/praktik/praktikan/5665e36dc6eedf221e4081c92799a083.pdf', './_file/praktik/praktikan/605b3cac1cac143db390a10c5d2e0431.pdf', 'Y', 'T', NULL);
INSERT INTO `tb_praktikan` (`id_praktikan`, `id_praktik`, `id_pembimbing_pilih`, `tgl_tambah_praktikan`, `tgl_ubah_praktikan`, `foto_praktikan`, `no_id_praktikan`, `nama_praktikan`, `tgl_lahir_praktikan`, `telp_praktikan`, `wa_praktikan`, `email_praktikan`, `alamat_praktikan`, `file_ijazah_praktikan`, `file_swab_praktikan`, `status_praktikan`, `pernyataan_praktikan`, `tgl_pernyataan`) VALUES
(143, 5, 0, '2023-03-10', NULL, './_file/praktik/praktikan/d3bcff7e82da96311c2f1ab4c433829a.jpg', '21019', 'Irna Yuniati', '2003-06-17', '0895635433709', '0895635433709', 'Irnayuniati17@gmail.com', 'Perumahan Lembah Teratai Blok A No 10 Rt 01 Rw 12 Kel. Gadobangkong Kec. Ngamprah Kab. Bandung Barat 40552', './_file/praktik/praktikan/2523e926465fa01ffbc14985e9c133b7.pdf', './_file/praktik/praktikan/af07bb0362a8a80ef325c84eb0d62513.pdf', 'Y', 'T', NULL),
(144, 5, 0, '2023-03-10', NULL, './_file/praktik/praktikan/2381c58345f77b90620a1535febd4e6e.jpg', '21113', 'Dinda Amelia Kusuma', '2003-05-19', '082320086656', '082120346790', 'dindaamelia269@gmail.com', 'Jl. Kebon Kembang rt01/02 No. 116 Kota Cimahi, Kec. Cimahi tengah, Kel. Karang Mekar', './_file/praktik/praktikan/ec38bde1eac2119b6b4e2ca2120528e5.pdf', './_file/praktik/praktikan/1e15aa7556acb2c90824018d68a15a80.pdf', 'Y', 'T', NULL),
(145, 4, 0, '2023-03-10', NULL, './_file/praktik/praktikan/a9439e94df10e6adda990d436a5a7645.jpg', '21.078', 'Muhammad Iqbal Fauzi', '2001-07-01', '089692573714', '089692573714', '27muhammad.iqbal.fauzi@gmail.com', 'Komp. Griya Cempaka Arum B7/61 RT 01 RW 08, Kel. Rancanumpang, Kec. Gedebage, Kota Bandung', './_file/praktik/praktikan/600c6359c9ca43daa018f855c71a020b.pdf', './_file/praktik/praktikan/9274830a0214e3d9cd8502af705fe3e8.pdf', 'Y', 'T', NULL),
(146, 5, 0, '2023-03-10', NULL, './_file/praktik/praktikan/25a4b15a0d7aa26b4e546dbc09b393c9.jpg', '21121', 'Fitri Isni Nurbaity ', '2003-01-24', '081572564653', '081572564653', 'fitriisni2401@gmail.com', 'Kp. Beor rt01 rw09 Desa Babakan peuteuy Kecamatan Cicalengka Kabupaten Bandung ', './_file/praktik/praktikan/f2511dee0fd7bf3d671115d5e3200416.pdf', './_file/praktik/praktikan/242900f2b5b8084cdd0eac450c798db2.pdf', 'Y', 'T', NULL),
(147, 5, 0, '2023-03-10', NULL, './_file/praktik/praktikan/154fc9fca822e13d8dea60dc95ef4f37.jpg', '21121', 'Fitri Isni Nurbaity ', '2003-01-24', '081572564653', '081572564653', 'fitriisni2401@gmail.com', 'Kp. Beor rt01 rw09 Desa Babakan peuteuy Kecamatan Cicalengka Kabupaten Bandung ', './_file/praktik/praktikan/faad7bba766d2fa0aac429189bc909c1.pdf', './_file/praktik/praktikan/d495f2be9d4c4eddf68d6eb1b2dd405b.pdf', 'Y', 'T', NULL),
(148, 5, 0, '2023-03-10', NULL, './_file/praktik/praktikan/6bfe826ffa7b3819ca3a0b0a25c7ce7d.jpg', '21108', 'Cepi Irawan', '1989-03-28', '082115430344', '082115430344', 'Cepii3373@gmail.com', 'kp. Asmil 303/kostrad rt 002/008 desa sukawargi, kec cisurupan', './_file/praktik/praktikan/3242177612514ae05eeaddde5e8101c0.pdf', './_file/praktik/praktikan/6f94c1d4520a74bc0299b2b9c44677f6.pdf', 'Y', 'T', NULL),
(149, 5, 0, '2023-03-10', NULL, './_file/praktik/praktikan/0239d628a419fe659b863a50ebf85331.jpg', '21123', 'Iis Nuryanti ', '2002-08-18', '083820425529', '08997726418', 'iisnuryanti209@gmail.com', 'Kp cempaka RT 04 RW 05 desa cempaka mekar kecamatan Padalarang kan Bandung barat', './_file/praktik/praktikan/86ee9c7fdbb001a6178ba8378f3fe644.pdf', './_file/praktik/praktikan/429f447112e4de7043ca602c462decc4.pdf', 'Y', 'T', NULL),
(150, 5, 0, '2023-03-10', NULL, './_file/praktik/praktikan/cf80dc7625a045641925a90c49631602.jpg', '21143', 'Raihan Wahabi', '2003-06-16', '089517020729', '089517020729', 'raihanwahabi35@gmail.com', 'Kp. Panembong,Ds. Panembong, Kec. Cianjur', './_file/praktik/praktikan/55cece666fe29c173615f93badbc7737.pdf', './_file/praktik/praktikan/6e4fbe9a0d0559a07dc5d3ceee2f8718.pdf', 'Y', 'T', NULL),
(151, 4, 0, '2023-03-10', NULL, './_file/praktik/praktikan/12c9a75e47ed4dbc87148fdc5d912872.jpg', '21084', 'Nuraeni Agustiani', '2003-09-05', '08996180847', '08996180847', 'nuraeniagustiani62@gmail.com', 'Kp cukang lemah rt 01/rw 10 kec Cicalengka desa tenjolaya kab Bandung provinsi Jawa barat', './_file/praktik/praktikan/47c10684682f194e8c6c524dc5df6e33.pdf', './_file/praktik/praktikan/b3536421de5b4b7acd67f093c9f4427f.pdf', 'Y', 'T', NULL),
(152, 5, 0, '2023-03-10', NULL, './_file/praktik/praktikan/1f5283a0846a762b718eac05680c9cdf.jpg', '21.134', 'Muhamad Agum Gumilar ', '1999-05-05', '085863508254', '085703215161', 'gmuhamadagum@gmail.com', 'Jalan Nakula RT.02/05 kel.tanjung baru kec.cikarang timur kab Bekasi', './_file/praktik/praktikan/3193b6adc3806a9bc95dca961d7c63a4.pdf', './_file/praktik/praktikan/473282a82bbfa339fa3a3f5b70aa917c.pdf', 'Y', 'T', NULL),
(153, 5, 0, '2023-03-10', NULL, './_file/praktik/praktikan/3ceebd357730af9db1dcf7065ff001b6.jpg', '21.109', 'Danus Sumana ', '2000-02-27', '089673395479', '089673395479', 'sumanadanus2@gmail.com', 'Komplek Graha Bukit Raya 3 Blok C6 No 72 Rt 006 Rw 025 Desa Cilame Kecamatan Ngamprah Kabupaten Bandung Barat ', './_file/praktik/praktikan/1bd395ae3616c62b68c4bf82c87a9e4f.pdf', './_file/praktik/praktikan/29aa97c798fa53629a55d2d48d6f1d93.pdf', 'Y', 'T', NULL),
(154, 5, 0, '2023-03-10', NULL, './_file/praktik/praktikan/b030599e518632522cd09a934036e722.jpg', '21132', 'Mahdiyah Khansa Salsabila Tanjung', '2003-05-12', '081283052958', '081283052958', 'anchaancha.1205@gmail.com', 'Perum. Bumi pasundan Kav.58 RT/RW: 001/008, kec : mandalajati kel : pasir impun kota bandung ', './_file/praktik/praktikan/e95bfdb2f98f697e927f8962417bca30.pdf', './_file/praktik/praktikan/158cd6d94eb55d45520f96bdab2cb72d.pdf', 'Y', 'T', NULL),
(155, 5, 0, '2023-03-10', NULL, './_file/praktik/praktikan/6d746e2c2b88a1baceadd24b3791dac3.jpg', '21133', 'Meyliana Syifafauziyah', '2002-05-10', '085694286779', '085694286779', 'mey80462@gmail.com', 'Kp. Asem Kragilan Serang - Banten', './_file/praktik/praktikan/ef3f8c1d8f8ddd4ecb3b00f3e63b0957.pdf', './_file/praktik/praktikan/52e45b09176f1fc62841da62ba0ff27a.pdf', 'Y', 'T', NULL),
(156, 5, 0, '2023-03-10', NULL, './_file/praktik/praktikan/54ed08b3e9c8d6d69124d0f2830068df.jpg', '21124', 'Ilhamakbarabadi', '2000-11-04', '085795724695', '085795724695', 'ilhamakbarabadi@gmail.com', 'Desa karyawangi 004/006 kec parongpong kab bandung barat', './_file/praktik/praktikan/709cac114c3e571f0fbd8b5463530e0e.pdf', './_file/praktik/praktikan/ac87e918a35be30547120cea9b6f3ce5.pdf', 'Y', 'T', NULL),
(157, 4, 0, '2023-03-10', NULL, './_file/praktik/praktikan/e25b66a51e188f7ed510155ce7bb37e1.jpg', '21073', 'Karisha syahwanigia Gunawan', '2003-03-02', '081321540969', '081321540969', 'karisha.gunawan@gmail.com', 'Kp.Surade Kidul rt 07 rw 03 Kecamatan Surade sukabumi jawabarat', './_file/praktik/praktikan/d6ee5eee7105092b860993273b5bae7f.pdf', './_file/praktik/praktikan/624eeaa46a4a7b6431843ff3200a0275.pdf', 'Y', 'T', NULL),
(159, 4, 0, '2023-03-10', NULL, './_file/praktik/praktikan/6ec916861ad13e578bad83693bcc1b76.jpg', '21101', 'Yanti Susanti ', '2003-01-05', '083106901388', '082119122820', 'ysusanti514@gmail.com', 'Kp. Calingcing, RT/RW 02/07, des. Sindangjaya, kec. Ciranjang, kab. Cianjur, ', './_file/praktik/praktikan/a82a42294bf33c92e845ebea0db8c77d.pdf', './_file/praktik/praktikan/24314165e1cf7ffdd9753747d0a5fb4a.pdf', 'Y', 'T', NULL),
(160, 4, 0, '2023-03-10', NULL, './_file/praktik/praktikan/358a86ad9886ccb43e709b56796764de.jpg', '21077', 'MUHAMAD ADITIA NURMAN', '2003-01-31', '085647164152', '085647164152', 'maditia848@gmail.com', 'Kp.Santiong Rt04/Rw01,Desa cicalengka kulon,kec cicalengka', './_file/praktik/praktikan/985bf12b766a02f9e54c2c9f6721a46d.pdf', './_file/praktik/praktikan/aeea59f1cfe03fec4b954ff209d4e898.pdf', 'Y', 'T', NULL),
(161, 5, 0, '2023-03-10', NULL, './_file/praktik/praktikan/41fefd47d4c6a100d1a41108f7210806.jpg', '21128', 'kusmarwan', '2003-12-15', '085720323342', '085720323342', 'kusmarwan412@gmail.com', 'Kp. Cisasarap Ds. Sukajaya kec. Leles Kab. Cianjur', './_file/praktik/praktikan/b5dbb07bfd4baf46eb35a8670bd56ac2.pdf', './_file/praktik/praktikan/9419344f84e8a34e4c7b4071a56c8725.pdf', 'Y', 'T', NULL),
(162, 4, 0, '2023-03-10', NULL, './_file/praktik/praktikan/f4ceb7b59dacc6798a019d2a8302600d.jpg', '21072', 'Kania Desiana', '2002-12-15', '089603252019', '089603252019', 'kaniadesiana02@gmail.com', 'Dsn Bungursari rt 02 rw 06 Ds Sindangherang Kec Panumbangan Kab Ciamis', './_file/praktik/praktikan/623398c370b5b9626cd107862366c903.pdf', './_file/praktik/praktikan/89f45d5d0be47f2c60380998ee78e5e0.pdf', 'Y', 'T', NULL),
(163, 4, 0, '2023-03-10', NULL, './_file/praktik/praktikan/ee7cbb594d616db6da52e8e76158cab8.jpg', '21062', 'Fadila Ameliani', '2002-05-30', '089503488020', '089503488020', 'fadilaameliani@gmail.com', 'Kp. Sukaresmi No.01 Rt.04/02 Kelurahan Citeureup Kecamatan Cimahi Utara Kota Cimahi 40512', './_file/praktik/praktikan/8c4cae84a84d22f9c3e79368e3971d17.pdf', './_file/praktik/praktikan/5a62708bd7dae6ca822fc97bbfb06279.pdf', 'Y', 'T', NULL),
(164, 4, 0, '2023-03-10', NULL, './_file/praktik/praktikan/860d1713acf2fe8d31fa820fddc238d8.jpg', '21064', 'Fasikha Panca Fitriani', '2000-11-26', '085265619928', '085265619928', 'fskpanca@gmail.com', 'Dsn.Salamdarma RT/RT 003/001 Ds.Bugistua Kec.Anjatan Kab.Indramayu', './_file/praktik/praktikan/a8483375d6e499959008474d03e643ff.pdf', './_file/praktik/praktikan/dccd4626bb0db445bfc647bf0453d697.pdf', 'Y', 'T', NULL),
(165, 4, 0, '2023-03-10', NULL, './_file/praktik/praktikan/520b97f97cf4da8af2f13661a0da6a06.jpg', '21063', 'Fanisya Meliana', '2002-05-03', '6285864427321', '6285864427321', 'Fanisyameliana02@gmail.com', 'Kp cikadu Rt 01 Rw 13 Desa. Ciburuy kec. Padalarang kab. Bandung barat', './_file/praktik/praktikan/b684a0c2b343e82502061d939d3988af.pdf', './_file/praktik/praktikan/63eb406f7a1639f96d4317d6c8203ddf.pdf', 'Y', 'T', NULL),
(166, 5, 0, '2023-03-10', NULL, './_file/praktik/praktikan/879b6b56ef078a78ef2cc45995d7385c.jpg', '21152', 'Teni Irawati', '2002-03-12', '085171641235', '085171641235', 'teniiiraawaatiiii12@gmail.com', 'Jl. Kb. Sari No 153E, Baros, Cimahi Tengah', './_file/praktik/praktikan/f9317fea758064e052d998b8f2151d16.pdf', './_file/praktik/praktikan/5cfd9bca332f954e9170392949c66da0.pdf', 'Y', 'T', NULL),
(167, 5, 0, '2023-03-10', NULL, './_file/praktik/praktikan/e49fb81a96659a68f7bd5e36ed4fb330.jpg', '21.122', 'Guntur rizki arisandi', '2002-12-19', '081220348270', '081220348270', 'gunsbang26@gmail.com', 'Jalan awiligar rt 05 rw 10 no 15', './_file/praktik/praktikan/a3261521471b48918f49974844ce201a.pdf', './_file/praktik/praktikan/5131e57712261bbeda20525b81458f84.pdf', 'Y', 'T', NULL),
(168, 4, 0, '2023-03-10', NULL, './_file/praktik/praktikan/99214e0fb28807c05fd637d34ffce038.jpg', '21.056', 'David Chavalera ', '1998-12-05', '081945080219', '081945080219', 'davidchavalera1@gmail.com', 'Perum Taman Bunga Cilame blok A1 No. 06 RT/RW 05/23 Ds. Cilame Kec. Ngamprah Kab. Bandung Barat', './_file/praktik/praktikan/6f8385299e538e11eba53a82ebc31491.pdf', './_file/praktik/praktikan/0c7ab38048d46a3cb041f98af2795115.pdf', 'Y', 'T', NULL),
(169, 5, 0, '2023-03-10', NULL, './_file/praktik/praktikan/1eed9f0b7d8ee826d8e276726db1c4b8.jpg', '21135', 'Muhammad kurnia ramadhan ', '2000-12-10', '082121019851', '082121019851', 'kurniarama100@gmail.com', 'Perumahan Bumi Ciranjang Asri Blok F no 2', './_file/praktik/praktikan/a373c38078277efa511f075354db0a57.pdf', './_file/praktik/praktikan/af3e774ed5e9ca77683caf59a395c852.pdf', 'Y', 'T', NULL),
(170, 5, 0, '2023-03-10', NULL, './_file/praktik/praktikan/a2829d7bfcd4f481e6d9be1bf6272fb0.jpg', '21154', 'Yasmin Maulidina Putri', '2003-05-09', '081214735203', '081214735203', 'yaazmeanptr@gmail.com', 'jl.junaedi no.22/143-G kota Bandung', './_file/praktik/praktikan/fa21e8e0ef29e05664ada3f94f06292d.pdf', './_file/praktik/praktikan/4f46d6a2a57d6f7a1ef67fe278da6b3d.pdf', 'Y', 'T', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_praktik_tgl`
--

DROP TABLE IF EXISTS `tb_praktik_tgl`;
CREATE TABLE `tb_praktik_tgl` (
  `id_praktik_tgl` int(11) NOT NULL,
  `id_praktik` int(11) NOT NULL,
  `praktik_tgl` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_praktik_tgl`
--

INSERT INTO `tb_praktik_tgl` (`id_praktik_tgl`, `id_praktik`, `praktik_tgl`) VALUES
(1, 0, '2022-12-12'),
(2, 0, '2022-12-13'),
(3, 0, '2022-12-14'),
(4, 0, '2022-12-15'),
(5, 0, '2022-12-16'),
(6, 0, '2022-12-17'),
(7, 0, '2023-01-02'),
(8, 0, '2023-01-03'),
(9, 0, '2023-01-04'),
(10, 0, '2023-01-05'),
(11, 0, '2023-01-06'),
(12, 0, '2023-01-07'),
(13, 0, '2023-01-08'),
(14, 0, '2023-01-09'),
(15, 0, '2023-01-10'),
(16, 0, '2023-01-11'),
(17, 0, '2023-01-12'),
(18, 0, '2023-01-13'),
(19, 0, '2023-01-14'),
(20, 0, '2023-01-15'),
(21, 0, '2023-01-16'),
(22, 0, '2023-01-17'),
(23, 0, '2023-01-18'),
(24, 0, '2023-01-19'),
(25, 0, '2023-01-20'),
(26, 0, '2023-01-21'),
(27, 3, '2023-05-08'),
(28, 3, '2023-05-09'),
(29, 3, '2023-05-10'),
(30, 3, '2023-05-11'),
(31, 3, '2023-05-12'),
(32, 3, '2023-05-13'),
(33, 3, '2023-05-14'),
(34, 3, '2023-05-15'),
(35, 3, '2023-05-16'),
(36, 3, '2023-05-17'),
(37, 3, '2023-05-18'),
(38, 3, '2023-05-19'),
(39, 3, '2023-05-20'),
(40, 4, '2023-05-22'),
(41, 4, '2023-05-23'),
(42, 4, '2023-05-24'),
(43, 4, '2023-05-25'),
(44, 4, '2023-05-26'),
(45, 4, '2023-05-27'),
(46, 4, '2023-05-28'),
(47, 4, '2023-05-29'),
(48, 4, '2023-05-30'),
(49, 4, '2023-05-31'),
(50, 4, '2023-06-01'),
(51, 4, '2023-06-02'),
(52, 4, '2023-06-03'),
(53, 5, '2023-06-12'),
(54, 5, '2023-06-13'),
(55, 5, '2023-06-14'),
(56, 5, '2023-06-15'),
(57, 5, '2023-06-16'),
(58, 5, '2023-06-17'),
(59, 5, '2023-06-18'),
(60, 5, '2023-06-19'),
(61, 5, '2023-06-20'),
(62, 5, '2023-06-21'),
(63, 5, '2023-06-22'),
(64, 5, '2023-06-23'),
(65, 5, '2023-06-24'),
(66, 6, '2023-05-01'),
(67, 6, '2023-05-02'),
(68, 6, '2023-05-03'),
(69, 6, '2023-05-04'),
(70, 6, '2023-05-05'),
(71, 6, '2023-05-06'),
(72, 6, '2023-05-07'),
(73, 6, '2023-05-08'),
(74, 6, '2023-05-09'),
(75, 6, '2023-05-10'),
(76, 6, '2023-05-11'),
(77, 6, '2023-05-12'),
(78, 6, '2023-05-13'),
(79, 7, '2023-06-26'),
(80, 7, '2023-06-27'),
(81, 7, '2023-06-28'),
(82, 7, '2023-06-29'),
(83, 7, '2023-06-30'),
(84, 7, '2023-07-01'),
(85, 7, '2023-07-02'),
(86, 7, '2023-07-03'),
(87, 7, '2023-07-04'),
(88, 7, '2023-07-05'),
(89, 7, '2023-07-06'),
(90, 7, '2023-07-07'),
(91, 7, '2023-07-08'),
(92, 7, '2023-07-09'),
(93, 7, '2023-07-10'),
(94, 7, '2023-07-11'),
(95, 7, '2023-07-12'),
(96, 7, '2023-07-13'),
(97, 7, '2023-07-14'),
(98, 7, '2023-07-15'),
(99, 7, '2023-07-16'),
(100, 7, '2023-07-17'),
(101, 7, '2023-07-18'),
(102, 7, '2023-07-19'),
(103, 7, '2023-07-20'),
(104, 7, '2023-07-21'),
(105, 7, '2023-07-22'),
(106, 8, '2023-04-03'),
(107, 8, '2023-04-04'),
(108, 8, '2023-04-05'),
(109, 8, '2023-04-06'),
(110, 8, '2023-04-07'),
(111, 8, '2023-04-08'),
(112, 8, '2023-04-09'),
(113, 8, '2023-04-10'),
(114, 8, '2023-04-11'),
(115, 8, '2023-04-12'),
(116, 8, '2023-04-13'),
(117, 8, '2023-04-14'),
(118, 8, '2023-04-15'),
(119, 8, '2023-04-16'),
(120, 8, '2023-04-17'),
(121, 8, '2023-04-18'),
(122, 9, '2023-06-12'),
(123, 9, '2023-06-13'),
(124, 9, '2023-06-14'),
(125, 9, '2023-06-15'),
(126, 9, '2023-06-16'),
(127, 9, '2023-06-17'),
(128, 9, '2023-06-18'),
(129, 9, '2023-06-19'),
(130, 9, '2023-06-20'),
(131, 9, '2023-06-21'),
(132, 9, '2023-06-22'),
(133, 9, '2023-06-23'),
(134, 9, '2023-06-24'),
(135, 10, '2023-03-27'),
(136, 10, '2023-03-28'),
(137, 10, '2023-03-29'),
(138, 10, '2023-03-30'),
(139, 10, '2023-03-31'),
(140, 10, '2023-04-01'),
(141, 10, '2023-04-02'),
(142, 10, '2023-04-03'),
(143, 10, '2023-04-04'),
(144, 10, '2023-04-05'),
(145, 10, '2023-04-06'),
(146, 10, '2023-04-07'),
(147, 10, '2023-04-08'),
(148, 10, '2023-04-09'),
(149, 10, '2023-04-10'),
(150, 10, '2023-04-11'),
(151, 10, '2023-04-12'),
(152, 10, '2023-04-13'),
(153, 10, '2023-04-14'),
(154, 10, '2023-04-15'),
(155, 10, '2023-04-16'),
(156, 10, '2023-04-17'),
(157, 10, '2023-04-18'),
(158, 10, '2023-04-19'),
(159, 10, '2023-04-20'),
(160, 10, '2023-04-21'),
(161, 10, '2023-04-22'),
(162, 12, '1998-08-05'),
(163, 12, '1998-08-06'),
(164, 12, '1998-08-07'),
(165, 12, '1998-08-08'),
(166, 12, '1998-08-09'),
(167, 12, '1998-08-10'),
(168, 12, '1998-08-11'),
(169, 12, '1998-08-12'),
(170, 12, '1998-08-13'),
(171, 12, '1998-08-14'),
(172, 12, '1998-08-15'),
(173, 12, '1998-08-16'),
(174, 12, '1998-08-17'),
(175, 12, '1998-08-18'),
(176, 12, '1998-08-19'),
(177, 12, '1998-08-20'),
(178, 12, '1998-08-21'),
(179, 12, '1998-08-22'),
(180, 12, '1998-08-23'),
(181, 12, '1998-08-24'),
(182, 12, '1998-08-25'),
(183, 12, '1998-08-26'),
(184, 12, '1998-08-27'),
(185, 12, '1998-08-28'),
(186, 12, '1998-08-29'),
(187, 12, '1998-08-30'),
(188, 12, '1998-08-31'),
(189, 12, '1998-09-01'),
(190, 12, '1998-09-02'),
(191, 12, '1998-09-03'),
(192, 12, '1998-09-04'),
(193, 12, '1998-09-05'),
(194, 12, '1998-09-06'),
(195, 12, '1998-09-07'),
(196, 12, '1998-09-08'),
(197, 12, '1998-09-09'),
(198, 12, '1998-09-10'),
(199, 12, '1998-09-11'),
(200, 12, '1998-09-12'),
(201, 12, '1998-09-13'),
(202, 12, '1998-09-14'),
(203, 12, '1998-09-15'),
(204, 12, '1998-09-16'),
(205, 12, '1998-09-17'),
(206, 12, '1998-09-18'),
(207, 12, '1998-09-19'),
(208, 12, '1998-09-20'),
(209, 12, '1998-09-21'),
(210, 12, '1998-09-22'),
(211, 12, '1998-09-23'),
(212, 12, '1998-09-24'),
(213, 12, '1998-09-25'),
(214, 12, '1998-09-26'),
(215, 12, '1998-09-27'),
(216, 12, '1998-09-28'),
(217, 12, '1998-09-29'),
(218, 12, '1998-09-30'),
(219, 12, '1998-10-01'),
(220, 12, '1998-10-02'),
(221, 12, '1998-10-03'),
(222, 12, '1998-10-04'),
(223, 12, '1998-10-05'),
(224, 12, '1998-10-06'),
(225, 12, '1998-10-07'),
(226, 12, '1998-10-08'),
(227, 12, '1998-10-09'),
(228, 12, '1998-10-10'),
(229, 12, '1998-10-11'),
(230, 12, '1998-10-12'),
(231, 12, '1998-10-13'),
(232, 12, '1998-10-14'),
(233, 12, '1998-10-15'),
(234, 12, '1998-10-16'),
(235, 12, '1998-10-17'),
(236, 12, '1998-10-18'),
(237, 12, '1998-10-19'),
(238, 12, '1998-10-20'),
(239, 12, '1998-10-21'),
(240, 12, '1998-10-22'),
(241, 12, '1998-10-23'),
(242, 12, '1998-10-24'),
(243, 12, '1998-10-25'),
(244, 12, '1998-10-26'),
(245, 12, '1998-10-27'),
(246, 12, '1998-10-28'),
(247, 12, '1998-10-29'),
(248, 12, '1998-10-30'),
(249, 12, '1998-10-31'),
(250, 12, '1998-11-01'),
(251, 12, '1998-11-02'),
(252, 12, '1998-11-03'),
(253, 12, '1998-11-04'),
(254, 12, '1998-11-05'),
(255, 12, '1998-11-06'),
(256, 12, '1998-11-07'),
(257, 12, '1998-11-08'),
(258, 12, '1998-11-09'),
(259, 12, '1998-11-10'),
(260, 12, '1998-11-11'),
(261, 12, '1998-11-12'),
(262, 12, '1998-11-13'),
(263, 12, '1998-11-14'),
(264, 12, '1998-11-15'),
(265, 12, '1998-11-16'),
(266, 12, '1998-11-17'),
(267, 12, '1998-11-18'),
(268, 12, '1998-11-19'),
(269, 12, '1998-11-20'),
(270, 12, '1998-11-21'),
(271, 12, '1998-11-22'),
(272, 12, '1998-11-23'),
(273, 12, '1998-11-24'),
(274, 12, '1998-11-25'),
(275, 12, '1998-11-26'),
(276, 12, '1998-11-27'),
(277, 12, '1998-11-28'),
(278, 12, '1998-11-29'),
(279, 12, '1998-11-30'),
(280, 12, '1998-12-01'),
(281, 12, '1998-12-02'),
(282, 12, '1998-12-03'),
(283, 12, '1998-12-04'),
(284, 12, '1998-12-05'),
(285, 12, '1998-12-06'),
(286, 12, '1998-12-07'),
(287, 12, '1998-12-08'),
(288, 12, '1998-12-09'),
(289, 12, '1998-12-10'),
(290, 12, '1998-12-11'),
(291, 12, '1998-12-12'),
(292, 12, '1998-12-13'),
(293, 12, '1998-12-14'),
(294, 12, '1998-12-15'),
(295, 12, '1998-12-16'),
(296, 12, '1998-12-17'),
(297, 12, '1998-12-18'),
(298, 12, '1998-12-19'),
(299, 12, '1998-12-20'),
(300, 12, '1998-12-21'),
(301, 12, '1998-12-22'),
(302, 12, '1998-12-23'),
(303, 12, '1998-12-24'),
(304, 12, '1998-12-25'),
(305, 12, '1998-12-26'),
(306, 12, '1998-12-27'),
(307, 12, '1998-12-28'),
(308, 12, '1998-12-29'),
(309, 12, '1998-12-30'),
(310, 12, '1998-12-31'),
(311, 12, '1999-01-01'),
(312, 12, '1999-01-02'),
(313, 12, '1999-01-03'),
(314, 12, '1999-01-04'),
(315, 12, '1999-01-05'),
(316, 12, '1999-01-06'),
(317, 12, '1999-01-07'),
(318, 12, '1999-01-08'),
(319, 12, '1999-01-09'),
(320, 12, '1999-01-10'),
(321, 12, '1999-01-11'),
(322, 12, '1999-01-12'),
(323, 12, '1999-01-13'),
(324, 12, '1999-01-14'),
(325, 12, '1999-01-15'),
(326, 12, '1999-01-16'),
(327, 12, '1999-01-17'),
(328, 12, '1999-01-18'),
(329, 12, '1999-01-19'),
(330, 12, '1999-01-20'),
(331, 12, '1999-01-21'),
(332, 12, '1999-01-22'),
(333, 12, '1999-01-23'),
(334, 12, '1999-01-24'),
(335, 12, '1999-01-25'),
(336, 13, '1984-05-15'),
(337, 13, '1984-05-16'),
(338, 13, '1984-05-17'),
(339, 13, '1984-05-18'),
(340, 13, '1984-05-19'),
(341, 13, '1984-05-20'),
(342, 13, '1984-05-21'),
(343, 13, '1984-05-22'),
(344, 13, '1984-05-23'),
(345, 13, '1984-05-24'),
(346, 13, '1984-05-25'),
(347, 13, '1984-05-26'),
(348, 13, '1984-05-27'),
(349, 13, '1984-05-28'),
(350, 13, '1984-05-29'),
(351, 13, '1984-05-30'),
(352, 13, '1984-05-31'),
(353, 13, '1984-06-01'),
(354, 13, '1984-06-02'),
(355, 13, '1984-06-03'),
(356, 13, '1984-06-04'),
(357, 13, '1984-06-05'),
(358, 13, '1984-06-06'),
(359, 13, '1984-06-07'),
(360, 13, '1984-06-08'),
(361, 13, '1984-06-09'),
(362, 13, '1984-06-10'),
(363, 13, '1984-06-11'),
(364, 13, '1984-06-12'),
(365, 13, '1984-06-13'),
(366, 13, '1984-06-14'),
(367, 13, '1984-06-15'),
(368, 13, '1984-06-16'),
(369, 13, '1984-06-17'),
(370, 13, '1984-06-18'),
(371, 13, '1984-06-19'),
(372, 13, '1984-06-20'),
(373, 13, '1984-06-21'),
(374, 13, '1984-06-22'),
(375, 13, '1984-06-23'),
(376, 13, '1984-06-24'),
(377, 13, '1984-06-25'),
(378, 13, '1984-06-26'),
(379, 13, '1984-06-27'),
(380, 13, '1984-06-28'),
(381, 13, '1984-06-29'),
(382, 13, '1984-06-30'),
(383, 13, '1984-07-01'),
(384, 13, '1984-07-02'),
(385, 13, '1984-07-03'),
(386, 13, '1984-07-04'),
(387, 13, '1984-07-05'),
(388, 13, '1984-07-06'),
(389, 13, '1984-07-07'),
(390, 13, '1984-07-08'),
(391, 13, '1984-07-09'),
(392, 13, '1984-07-10'),
(393, 13, '1984-07-11'),
(394, 13, '1984-07-12'),
(395, 13, '1984-07-13'),
(396, 13, '1984-07-14'),
(397, 13, '1984-07-15'),
(398, 13, '1984-07-16'),
(399, 13, '1984-07-17'),
(400, 13, '1984-07-18'),
(401, 13, '1984-07-19'),
(402, 13, '1984-07-20'),
(403, 13, '1984-07-21'),
(404, 13, '1984-07-22'),
(405, 13, '1984-07-23'),
(406, 13, '1984-07-24'),
(407, 13, '1984-07-25'),
(408, 13, '1984-07-26'),
(409, 13, '1984-07-27'),
(410, 13, '1984-07-28'),
(411, 13, '1984-07-29'),
(412, 13, '1984-07-30'),
(413, 13, '1984-07-31'),
(414, 13, '1984-08-01'),
(415, 13, '1984-08-02'),
(416, 13, '1984-08-03'),
(417, 13, '1984-08-04'),
(418, 13, '1984-08-05'),
(419, 13, '1984-08-06'),
(420, 13, '1984-08-07'),
(421, 13, '1984-08-08'),
(422, 13, '1984-08-09'),
(423, 13, '1984-08-10'),
(424, 13, '1984-08-11'),
(425, 13, '1984-08-12'),
(426, 13, '1984-08-13'),
(427, 13, '1984-08-14'),
(428, 13, '1984-08-15'),
(429, 13, '1984-08-16'),
(430, 13, '1984-08-17'),
(431, 13, '1984-08-18'),
(432, 13, '1984-08-19'),
(433, 13, '1984-08-20'),
(434, 13, '1984-08-21'),
(435, 13, '1984-08-22'),
(436, 13, '1984-08-23'),
(437, 13, '1984-08-24'),
(438, 13, '1984-08-25'),
(439, 13, '1984-08-26'),
(440, 13, '1984-08-27'),
(441, 13, '1984-08-28'),
(442, 13, '1984-08-29'),
(443, 13, '1984-08-30'),
(444, 13, '1984-08-31'),
(445, 13, '1984-09-01'),
(446, 13, '1984-09-02'),
(447, 13, '1984-09-03'),
(448, 13, '1984-09-04'),
(449, 13, '1984-09-05'),
(450, 13, '1984-09-06'),
(451, 13, '1984-09-07'),
(452, 13, '1984-09-08'),
(453, 13, '1984-09-09'),
(454, 13, '1984-09-10'),
(455, 13, '1984-09-11'),
(456, 13, '1984-09-12'),
(457, 13, '1984-09-13'),
(458, 13, '1984-09-14'),
(459, 13, '1984-09-15'),
(460, 13, '1984-09-16'),
(461, 13, '1984-09-17'),
(462, 13, '1984-09-18'),
(463, 13, '1984-09-19'),
(464, 13, '1984-09-20'),
(465, 13, '1984-09-21'),
(466, 13, '1984-09-22'),
(467, 13, '1984-09-23'),
(468, 13, '1984-09-24'),
(469, 13, '1984-09-25'),
(470, 13, '1984-09-26'),
(471, 13, '1984-09-27'),
(472, 13, '1984-09-28'),
(473, 13, '1984-09-29'),
(474, 13, '1984-09-30'),
(475, 13, '1984-10-01'),
(476, 13, '1984-10-02'),
(477, 13, '1984-10-03'),
(478, 13, '1984-10-04'),
(479, 13, '1984-10-05'),
(480, 13, '1984-10-06'),
(481, 13, '1984-10-07'),
(482, 13, '1984-10-08'),
(483, 13, '1984-10-09'),
(484, 13, '1984-10-10'),
(485, 13, '1984-10-11'),
(486, 13, '1984-10-12'),
(487, 13, '1984-10-13'),
(488, 13, '1984-10-14'),
(489, 13, '1984-10-15'),
(490, 13, '1984-10-16'),
(491, 13, '1984-10-17'),
(492, 13, '1984-10-18'),
(493, 13, '1984-10-19'),
(494, 13, '1984-10-20'),
(495, 13, '1984-10-21'),
(496, 13, '1984-10-22'),
(497, 13, '1984-10-23'),
(498, 13, '1984-10-24'),
(499, 13, '1984-10-25'),
(500, 13, '1984-10-26'),
(501, 13, '1984-10-27'),
(502, 13, '1984-10-28'),
(503, 13, '1984-10-29'),
(504, 13, '1984-10-30'),
(505, 13, '1984-10-31'),
(506, 13, '1984-11-01'),
(507, 13, '1984-11-02'),
(508, 13, '1984-11-03'),
(509, 13, '1984-11-04'),
(510, 13, '1984-11-05'),
(511, 13, '1984-11-06'),
(512, 13, '1984-11-07'),
(513, 13, '1984-11-08'),
(514, 13, '1984-11-09'),
(515, 13, '1984-11-10'),
(516, 13, '1984-11-11'),
(517, 13, '1984-11-12'),
(518, 13, '1984-11-13'),
(519, 13, '1984-11-14'),
(520, 13, '1984-11-15'),
(521, 13, '1984-11-16'),
(522, 13, '1984-11-17'),
(523, 13, '1984-11-18'),
(524, 13, '1984-11-19'),
(525, 13, '1984-11-20'),
(526, 13, '1984-11-21'),
(527, 13, '1984-11-22'),
(528, 13, '1984-11-23'),
(529, 13, '1984-11-24'),
(530, 13, '1984-11-25'),
(531, 13, '1984-11-26'),
(532, 13, '1984-11-27'),
(533, 13, '1984-11-28'),
(534, 13, '1984-11-29'),
(535, 13, '1984-11-30'),
(536, 13, '1984-12-01'),
(537, 13, '1984-12-02'),
(538, 13, '1984-12-03'),
(539, 13, '1984-12-04'),
(540, 13, '1984-12-05'),
(541, 13, '1984-12-06'),
(542, 13, '1984-12-07'),
(543, 13, '1984-12-08'),
(544, 13, '1984-12-09'),
(545, 13, '1984-12-10'),
(546, 13, '1984-12-11'),
(547, 13, '1984-12-12'),
(548, 13, '1984-12-13'),
(549, 13, '1984-12-14'),
(550, 13, '1984-12-15'),
(551, 13, '1984-12-16'),
(552, 13, '1984-12-17'),
(553, 13, '1984-12-18'),
(554, 13, '1984-12-19'),
(555, 13, '1984-12-20'),
(556, 13, '1984-12-21'),
(557, 13, '1984-12-22'),
(558, 13, '1984-12-23'),
(559, 13, '1984-12-24'),
(560, 13, '1984-12-25'),
(561, 13, '1984-12-26'),
(562, 13, '1984-12-27'),
(563, 13, '1984-12-28'),
(564, 13, '1984-12-29'),
(565, 13, '1984-12-30'),
(566, 13, '1984-12-31'),
(567, 13, '1985-01-01'),
(568, 13, '1985-01-02'),
(569, 13, '1985-01-03'),
(570, 13, '1985-01-04'),
(571, 13, '1985-01-05'),
(572, 13, '1985-01-06'),
(573, 13, '1985-01-07'),
(574, 13, '1985-01-08'),
(575, 13, '1985-01-09'),
(576, 13, '1985-01-10'),
(577, 13, '1985-01-11'),
(578, 13, '1985-01-12'),
(579, 13, '1985-01-13'),
(580, 13, '1985-01-14'),
(581, 13, '1985-01-15'),
(582, 13, '1985-01-16'),
(583, 13, '1985-01-17'),
(584, 13, '1985-01-18'),
(585, 13, '1985-01-19'),
(586, 13, '1985-01-20'),
(587, 13, '1985-01-21'),
(588, 13, '1985-01-22'),
(589, 13, '1985-01-23'),
(590, 13, '1985-01-24'),
(591, 13, '1985-01-25'),
(592, 13, '1985-01-26'),
(593, 13, '1985-01-27'),
(594, 13, '1985-01-28'),
(595, 13, '1985-01-29'),
(596, 13, '1985-01-30'),
(597, 13, '1985-01-31'),
(598, 13, '1985-02-01'),
(599, 13, '1985-02-02'),
(600, 13, '1985-02-03'),
(601, 13, '1985-02-04'),
(602, 13, '1985-02-05'),
(603, 13, '1985-02-06'),
(604, 13, '1985-02-07'),
(605, 13, '1985-02-08'),
(606, 13, '1985-02-09'),
(607, 13, '1985-02-10'),
(608, 13, '1985-02-11'),
(609, 13, '1985-02-12'),
(610, 13, '1985-02-13'),
(611, 13, '1985-02-14'),
(612, 13, '1985-02-15'),
(613, 13, '1985-02-16'),
(614, 13, '1985-02-17'),
(615, 13, '1985-02-18'),
(616, 13, '1985-02-19'),
(617, 13, '1985-02-20'),
(618, 13, '1985-02-21'),
(619, 13, '1985-02-22'),
(620, 13, '1985-02-23'),
(621, 13, '1985-02-24'),
(622, 13, '1985-02-25'),
(623, 13, '1985-02-26'),
(624, 13, '1985-02-27'),
(625, 13, '1985-02-28'),
(626, 13, '1985-03-01'),
(627, 13, '1985-03-02'),
(628, 13, '1985-03-03'),
(629, 13, '1985-03-04'),
(630, 13, '1985-03-05'),
(631, 13, '1985-03-06'),
(632, 13, '1985-03-07'),
(633, 13, '1985-03-08'),
(634, 13, '1985-03-09'),
(635, 13, '1985-03-10'),
(636, 13, '1985-03-11'),
(637, 13, '1985-03-12'),
(638, 13, '1985-03-13'),
(639, 13, '1985-03-14'),
(640, 13, '1985-03-15'),
(641, 13, '1985-03-16'),
(642, 13, '1985-03-17'),
(643, 13, '1985-03-18'),
(644, 13, '1985-03-19'),
(645, 13, '1985-03-20'),
(646, 13, '1985-03-21'),
(647, 13, '1985-03-22'),
(648, 13, '1985-03-23'),
(649, 13, '1985-03-24'),
(650, 13, '1985-03-25'),
(651, 13, '1985-03-26'),
(652, 13, '1985-03-27'),
(653, 13, '1985-03-28'),
(654, 13, '1985-03-29'),
(655, 13, '1985-03-30'),
(656, 13, '1985-03-31'),
(657, 13, '1985-04-01'),
(658, 13, '1985-04-02'),
(659, 13, '1985-04-03'),
(660, 13, '1985-04-04'),
(661, 13, '1985-04-05'),
(662, 13, '1985-04-06'),
(663, 13, '1985-04-07'),
(664, 13, '1985-04-08'),
(665, 13, '1985-04-09'),
(666, 13, '1985-04-10'),
(667, 13, '1985-04-11'),
(668, 13, '1985-04-12'),
(669, 13, '1985-04-13'),
(670, 13, '1985-04-14'),
(671, 13, '1985-04-15'),
(672, 13, '1985-04-16'),
(673, 13, '1985-04-17'),
(674, 13, '1985-04-18'),
(675, 13, '1985-04-19'),
(676, 13, '1985-04-20'),
(677, 13, '1985-04-21'),
(678, 13, '1985-04-22'),
(679, 13, '1985-04-23'),
(680, 13, '1985-04-24'),
(681, 13, '1985-04-25'),
(682, 13, '1985-04-26'),
(683, 13, '1985-04-27'),
(684, 13, '1985-04-28'),
(685, 13, '1985-04-29'),
(686, 13, '1985-04-30'),
(687, 13, '1985-05-01'),
(688, 13, '1985-05-02'),
(689, 13, '1985-05-03'),
(690, 13, '1985-05-04'),
(691, 13, '1985-05-05'),
(692, 13, '1985-05-06'),
(693, 13, '1985-05-07'),
(694, 13, '1985-05-08'),
(695, 13, '1985-05-09'),
(696, 13, '1985-05-10'),
(697, 13, '1985-05-11'),
(698, 13, '1985-05-12'),
(699, 14, '2023-04-11'),
(700, 14, '2023-04-12'),
(701, 14, '2023-04-13'),
(702, 14, '2023-04-14'),
(703, 15, '1985-05-16'),
(704, 15, '1985-05-17'),
(705, 15, '1985-05-18'),
(706, 15, '1985-05-19'),
(707, 15, '1985-05-20'),
(708, 15, '1985-05-21'),
(709, 15, '1985-05-22'),
(710, 15, '1985-05-23'),
(711, 15, '1985-05-24'),
(712, 15, '1985-05-25'),
(713, 15, '1985-05-26'),
(714, 15, '1985-05-27'),
(715, 15, '1985-05-28'),
(716, 15, '1985-05-29'),
(717, 15, '1985-05-30'),
(718, 15, '1985-05-31'),
(719, 15, '1985-06-01'),
(720, 15, '1985-06-02'),
(721, 15, '1985-06-03'),
(722, 15, '1985-06-04'),
(723, 15, '1985-06-05'),
(724, 15, '1985-06-06'),
(725, 16, '2020-11-09'),
(726, 16, '2020-11-10'),
(727, 16, '2020-11-11'),
(728, 16, '2020-11-12'),
(729, 16, '2020-11-13'),
(730, 16, '2020-11-14'),
(731, 16, '2020-11-15'),
(732, 16, '2020-11-16'),
(733, 16, '2020-11-17'),
(734, 16, '2020-11-18'),
(735, 16, '2020-11-19'),
(736, 16, '2020-11-20'),
(737, 16, '2020-11-21'),
(738, 16, '2020-11-22'),
(739, 16, '2020-11-23'),
(740, 16, '2020-11-24'),
(741, 16, '2020-11-25'),
(742, 16, '2020-11-26'),
(743, 16, '2020-11-27'),
(744, 16, '2020-11-28'),
(745, 16, '2020-11-29'),
(746, 16, '2020-11-30'),
(747, 16, '2020-12-01'),
(748, 16, '2020-12-02'),
(749, 16, '2020-12-03'),
(750, 16, '2020-12-04'),
(751, 16, '2020-12-05'),
(752, 16, '2020-12-06'),
(753, 16, '2020-12-07'),
(754, 16, '2020-12-08'),
(755, 16, '2020-12-09'),
(756, 16, '2020-12-10'),
(757, 16, '2020-12-11'),
(758, 16, '2020-12-12'),
(759, 16, '2020-12-13'),
(760, 16, '2020-12-14'),
(761, 16, '2020-12-15'),
(762, 16, '2020-12-16'),
(763, 16, '2020-12-17'),
(764, 16, '2020-12-18'),
(765, 16, '2020-12-19'),
(766, 16, '2020-12-20'),
(767, 16, '2020-12-21'),
(768, 16, '2020-12-22'),
(769, 16, '2020-12-23'),
(770, 16, '2020-12-24'),
(771, 16, '2020-12-25'),
(772, 16, '2020-12-26'),
(773, 16, '2020-12-27'),
(774, 16, '2020-12-28'),
(775, 16, '2020-12-29'),
(776, 16, '2020-12-30'),
(777, 16, '2020-12-31'),
(778, 16, '2021-01-01'),
(779, 16, '2021-01-02'),
(780, 16, '2021-01-03'),
(781, 16, '2021-01-04'),
(782, 16, '2021-01-05'),
(783, 16, '2021-01-06'),
(784, 16, '2021-01-07'),
(785, 16, '2021-01-08'),
(786, 16, '2021-01-09'),
(787, 16, '2021-01-10'),
(788, 16, '2021-01-11'),
(789, 16, '2021-01-12'),
(790, 16, '2021-01-13'),
(791, 16, '2021-01-14'),
(792, 16, '2021-01-15'),
(793, 16, '2021-01-16'),
(794, 16, '2021-01-17'),
(795, 16, '2021-01-18'),
(796, 16, '2021-01-19'),
(797, 16, '2021-01-20'),
(798, 16, '2021-01-21'),
(799, 16, '2021-01-22'),
(800, 16, '2021-01-23'),
(801, 16, '2021-01-24'),
(802, 16, '2021-01-25'),
(803, 16, '2021-01-26'),
(804, 16, '2021-01-27'),
(805, 16, '2021-01-28'),
(806, 16, '2021-01-29'),
(807, 16, '2021-01-30'),
(808, 16, '2021-01-31'),
(809, 16, '2021-02-01'),
(810, 16, '2021-02-02'),
(811, 16, '2021-02-03'),
(812, 16, '2021-02-04'),
(813, 16, '2021-02-05'),
(814, 16, '2021-02-06'),
(815, 16, '2021-02-07'),
(816, 16, '2021-02-08'),
(817, 16, '2021-02-09'),
(818, 16, '2021-02-10'),
(819, 16, '2021-02-11'),
(820, 16, '2021-02-12'),
(821, 16, '2021-02-13'),
(822, 16, '2021-02-14'),
(823, 16, '2021-02-15'),
(824, 16, '2021-02-16'),
(825, 16, '2021-02-17'),
(826, 16, '2021-02-18'),
(827, 16, '2021-02-19'),
(828, 16, '2021-02-20'),
(829, 16, '2021-02-21'),
(830, 16, '2021-02-22'),
(831, 16, '2021-02-23'),
(832, 16, '2021-02-24'),
(833, 16, '2021-02-25'),
(834, 16, '2021-02-26'),
(835, 16, '2021-02-27'),
(836, 16, '2021-02-28'),
(837, 16, '2021-03-01'),
(838, 16, '2021-03-02'),
(839, 16, '2021-03-03'),
(840, 16, '2021-03-04'),
(841, 16, '2021-03-05'),
(842, 16, '2021-03-06'),
(843, 16, '2021-03-07'),
(844, 16, '2021-03-08'),
(845, 16, '2021-03-09'),
(846, 16, '2021-03-10'),
(847, 16, '2021-03-11'),
(848, 16, '2021-03-12'),
(849, 16, '2021-03-13'),
(850, 16, '2021-03-14'),
(851, 16, '2021-03-15'),
(852, 16, '2021-03-16'),
(853, 16, '2021-03-17'),
(854, 16, '2021-03-18'),
(855, 16, '2021-03-19'),
(856, 16, '2021-03-20'),
(857, 16, '2021-03-21'),
(858, 16, '2021-03-22'),
(859, 16, '2021-03-23'),
(860, 16, '2021-03-24'),
(861, 16, '2021-03-25'),
(862, 16, '2021-03-26'),
(863, 16, '2021-03-27'),
(864, 16, '2021-03-28'),
(865, 16, '2021-03-29'),
(866, 16, '2021-03-30'),
(867, 16, '2021-03-31'),
(868, 16, '2021-04-01'),
(869, 16, '2021-04-02'),
(870, 16, '2021-04-03'),
(871, 16, '2021-04-04'),
(872, 16, '2021-04-05'),
(873, 16, '2021-04-06'),
(874, 16, '2021-04-07'),
(875, 16, '2021-04-08'),
(876, 16, '2021-04-09'),
(877, 16, '2021-04-10'),
(878, 16, '2021-04-11'),
(879, 16, '2021-04-12'),
(880, 16, '2021-04-13'),
(881, 16, '2021-04-14'),
(882, 16, '2021-04-15'),
(883, 16, '2021-04-16'),
(884, 16, '2021-04-17'),
(885, 16, '2021-04-18'),
(886, 16, '2021-04-19'),
(887, 16, '2021-04-20'),
(888, 16, '2021-04-21'),
(889, 16, '2021-04-22'),
(890, 16, '2021-04-23'),
(891, 16, '2021-04-24'),
(892, 16, '2021-04-25'),
(893, 16, '2021-04-26'),
(894, 16, '2021-04-27'),
(895, 16, '2021-04-28'),
(896, 16, '2021-04-29'),
(897, 16, '2021-04-30'),
(898, 16, '2021-05-01'),
(899, 16, '2021-05-02'),
(900, 16, '2021-05-03'),
(901, 16, '2021-05-04'),
(902, 16, '2021-05-05'),
(903, 16, '2021-05-06'),
(904, 16, '2021-05-07'),
(905, 16, '2021-05-08'),
(906, 16, '2021-05-09'),
(907, 16, '2021-05-10'),
(908, 16, '2021-05-11'),
(909, 16, '2021-05-12'),
(910, 16, '2021-05-13'),
(911, 16, '2021-05-14'),
(912, 16, '2021-05-15'),
(913, 16, '2021-05-16'),
(914, 16, '2021-05-17'),
(915, 16, '2021-05-18'),
(916, 16, '2021-05-19'),
(917, 16, '2021-05-20'),
(918, 16, '2021-05-21'),
(919, 16, '2021-05-22'),
(920, 16, '2021-05-23'),
(921, 16, '2021-05-24'),
(922, 16, '2021-05-25'),
(923, 16, '2021-05-26'),
(924, 16, '2021-05-27'),
(925, 16, '2021-05-28'),
(926, 16, '2021-05-29'),
(927, 16, '2021-05-30'),
(928, 16, '2021-05-31'),
(929, 16, '2021-06-01'),
(930, 16, '2021-06-02'),
(931, 16, '2021-06-03'),
(932, 16, '2021-06-04'),
(933, 16, '2021-06-05'),
(934, 16, '2021-06-06'),
(935, 16, '2021-06-07'),
(936, 16, '2021-06-08'),
(937, 16, '2021-06-09'),
(938, 16, '2021-06-10'),
(939, 16, '2021-06-11'),
(940, 16, '2021-06-12'),
(941, 16, '2021-06-13'),
(942, 16, '2021-06-14'),
(943, 16, '2021-06-15'),
(944, 16, '2021-06-16'),
(945, 16, '2021-06-17'),
(946, 16, '2021-06-18'),
(947, 16, '2021-06-19'),
(948, 16, '2021-06-20'),
(949, 16, '2021-06-21'),
(950, 16, '2021-06-22'),
(951, 16, '2021-06-23'),
(952, 16, '2021-06-24'),
(953, 16, '2021-06-25'),
(954, 16, '2021-06-26'),
(955, 16, '2021-06-27'),
(956, 16, '2021-06-28'),
(957, 16, '2021-06-29'),
(958, 16, '2021-06-30'),
(959, 16, '2021-07-01'),
(960, 16, '2021-07-02'),
(961, 16, '2021-07-03'),
(962, 16, '2021-07-04'),
(963, 16, '2021-07-05'),
(964, 16, '2021-07-06'),
(965, 16, '2021-07-07'),
(966, 16, '2021-07-08'),
(967, 16, '2021-07-09'),
(968, 16, '2021-07-10'),
(969, 16, '2021-07-11'),
(970, 16, '2021-07-12'),
(971, 16, '2021-07-13'),
(972, 16, '2021-07-14'),
(973, 16, '2021-07-15'),
(974, 16, '2021-07-16'),
(975, 16, '2021-07-17'),
(976, 16, '2021-07-18'),
(977, 16, '2021-07-19'),
(978, 16, '2021-07-20'),
(979, 16, '2021-07-21'),
(980, 16, '2021-07-22'),
(981, 16, '2021-07-23'),
(982, 16, '2021-07-24'),
(983, 16, '2021-07-25'),
(984, 16, '2021-07-26'),
(985, 16, '2021-07-27'),
(986, 16, '2021-07-28'),
(987, 16, '2021-07-29'),
(988, 16, '2021-07-30'),
(989, 16, '2021-07-31'),
(990, 16, '2021-08-01'),
(991, 16, '2021-08-02'),
(992, 16, '2021-08-03'),
(993, 16, '2021-08-04'),
(994, 16, '2021-08-05'),
(995, 16, '2021-08-06'),
(996, 16, '2021-08-07'),
(997, 16, '2021-08-08'),
(998, 16, '2021-08-09'),
(999, 16, '2021-08-10'),
(1000, 16, '2021-08-11'),
(1001, 16, '2021-08-12'),
(1002, 16, '2021-08-13'),
(1003, 16, '2021-08-14'),
(1004, 16, '2021-08-15'),
(1005, 16, '2021-08-16'),
(1006, 16, '2021-08-17'),
(1007, 16, '2021-08-18'),
(1008, 16, '2021-08-19'),
(1009, 16, '2021-08-20'),
(1010, 16, '2021-08-21'),
(1011, 16, '2021-08-22'),
(1012, 16, '2021-08-23'),
(1013, 16, '2021-08-24'),
(1014, 16, '2021-08-25'),
(1015, 16, '2021-08-26'),
(1016, 16, '2021-08-27'),
(1017, 16, '2021-08-28'),
(1018, 16, '2021-08-29'),
(1019, 16, '2021-08-30'),
(1020, 16, '2021-08-31'),
(1021, 16, '2021-09-01'),
(1022, 16, '2021-09-02'),
(1023, 16, '2021-09-03'),
(1024, 16, '2021-09-04'),
(1025, 16, '2021-09-05'),
(1026, 16, '2021-09-06'),
(1027, 16, '2021-09-07'),
(1028, 16, '2021-09-08'),
(1029, 16, '2021-09-09'),
(1030, 16, '2021-09-10'),
(1031, 16, '2021-09-11'),
(1032, 16, '2021-09-12'),
(1033, 16, '2021-09-13');

-- --------------------------------------------------------

--
-- Table structure for table `tb_profesi_pdd`
--

DROP TABLE IF EXISTS `tb_profesi_pdd`;
CREATE TABLE `tb_profesi_pdd` (
  `id_profesi_pdd` int(11) NOT NULL,
  `id_jurusan_pdd` int(11) NOT NULL,
  `nama_profesi_pdd` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_profesi_pdd`
--

INSERT INTO `tb_profesi_pdd` (`id_profesi_pdd`, `id_jurusan_pdd`, `nama_profesi_pdd`) VALUES
(0, 0, '-- Lainnya --'),
(1, 1, 'Program Pendidikan Dokter Spesialis (PPDS)/Residence'),
(2, 1, 'Program Studi Pendidikan Dokter (PSPD)/Co-ass'),
(3, 5, 'Apoteker'),
(4, 3, 'Psikolog Klinik'),
(5, 2, 'Ners');

-- --------------------------------------------------------

--
-- Table structure for table `tb_tarif`
--

DROP TABLE IF EXISTS `tb_tarif`;
CREATE TABLE `tb_tarif` (
  `id_tarif` int(11) NOT NULL,
  `tgl_tambah_tarif` date DEFAULT NULL,
  `tgl_ubah_tarif` date DEFAULT NULL,
  `nama_tarif` text NOT NULL,
  `id_tarif_satuan` int(11) NOT NULL,
  `ket_tarif` text DEFAULT NULL,
  `jumlah_tarif` float NOT NULL,
  `tipe_tarif` text NOT NULL,
  `frekuensi_tarif` int(11) NOT NULL,
  `kuantitas_tarif` int(11) NOT NULL,
  `id_jurusan_pdd` int(11) NOT NULL,
  `id_jenjang_pdd` int(11) DEFAULT NULL,
  `id_spesifikasi_pdd` int(11) DEFAULT NULL,
  `id_tarif_jenis` int(11) NOT NULL,
  `pilih_tarif` int(11) NOT NULL,
  `status_tarif` enum('y','t') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_tarif`
--

INSERT INTO `tb_tarif` (`id_tarif`, `tgl_tambah_tarif`, `tgl_ubah_tarif`, `nama_tarif`, `id_tarif_satuan`, `ket_tarif`, `jumlah_tarif`, `tipe_tarif`, `frekuensi_tarif`, `kuantitas_tarif`, `id_jurusan_pdd`, `id_jenjang_pdd`, `id_spesifikasi_pdd`, `id_tarif_jenis`, `pilih_tarif`, `status_tarif`) VALUES
(1, NULL, NULL, 'Institusional Fee', 1, NULL, 50000, 'SEKALI', 0, 0, 1, 0, 0, 1, 1, 'y'),
(2, NULL, NULL, 'Management Fee', 1, NULL, 75000, 'SEKALI', 0, 0, 1, 0, 0, 1, 1, 'y'),
(3, NULL, NULL, 'Alat Tulis Kantor', 1, NULL, 5000, 'SEKALI', 0, 0, 1, 0, 0, 1, 1, 'y'),
(4, NULL, NULL, 'Untuk Keselamatan Kerja (Handrub, tisue, sabun)', 1, NULL, 5000, 'SEKALI', 0, 0, 1, 0, 0, 2, 1, 'y'),
(5, NULL, NULL, 'Orientasi Keselamatan Pasien', 1, NULL, 10000, 'SEKALI', 0, 0, 1, 0, 0, 3, 1, 'y'),
(6, NULL, NULL, 'Log Book (dibayar 1 kali)', 1, NULL, 20000, 'SEKALI', 0, 0, 1, 0, 0, 3, 1, 'y'),
(7, NULL, NULL, 'Name Tag (dibayar 1 kali)', 1, NULL, 5000, 'SEKALI', 0, 0, 1, 0, 0, 3, 1, 'y'),
(8, NULL, NULL, 'Clinical science session (CSS)', 2, NULL, 37500, 'SEKALI', 0, 0, 1, 0, 0, 4, 1, 'y'),
(9, NULL, NULL, 'Case report session (CRS)', 2, NULL, 37500, 'SEKALI', 0, 0, 1, 0, 0, 4, 1, 'y'),
(10, NULL, NULL, 'Case base Discusion (CBD)', 2, NULL, 37500, 'SEKALI', 0, 0, 1, 0, 0, 4, 1, 'y'),
(11, NULL, NULL, 'Pengayaan - Observasi', 2, NULL, 37500, 'SEKALI', 0, 0, 1, 0, 0, 4, 1, 'y'),
(13, NULL, NULL, 'Bed side teaching (BST)- Visite Besar-Role Model - Pembimbingan Kedokteran Umum di IGD', 2, NULL, 37500, 'SEKALI', 0, 0, 1, 0, 0, 4, 1, 'y'),
(14, NULL, NULL, 'Mini Clinical Examination  Evaluation (Mini CeX)', 2, NULL, 150000, 'SEKALI', 0, 0, 1, 0, 0, 6, 1, 'y'),
(15, NULL, NULL, 'Ujian', 2, NULL, 150000, 'SEKALI', 0, 0, 1, 0, 0, 6, 1, 'y'),
(16, NULL, NULL, 'Makan Pembimbing Ujian', 2, NULL, 20000, 'SEKALI', 0, 0, 1, 0, 0, 6, 1, 'y'),
(17, NULL, NULL, 'Standar Pasien', 2, NULL, 100000, 'SEKALI', 0, 0, 1, 0, 0, 6, 1, 'y'),
(18, NULL, NULL, 'Institusional Fee', 1, NULL, 20000, 'SEKALI', 0, 0, 2, 0, 0, 1, 1, 'y'),
(19, NULL, NULL, 'Management Fee', 1, NULL, 20000, 'SEKALI', 0, 0, 2, 0, 0, 1, 1, 'y'),
(20, NULL, NULL, 'Untuk Keselamatan Kerja (Handrub, tisue, sabun)', 1, NULL, 20000, 'SEKALI', 0, 0, 2, 0, 0, 2, 1, 'y'),
(21, NULL, NULL, 'Orientasi ', 3, NULL, 75000, 'SEKALI', 1, 1, 2, 0, 0, 3, 1, 'y'),
(22, NULL, NULL, 'Keselamatan Pasien', 3, NULL, 150000, 'SEKALI', 0, 0, 2, 0, 0, 3, 1, 't'),
(23, NULL, NULL, 'Log Book (dibayar 1 kali)', 1, NULL, 20000, 'SEKALI', 0, 0, 2, 0, 0, 3, 1, 't'),
(24, NULL, NULL, 'Name Tag (dibayar 1 kali)', 1, NULL, 10000, 'SEKALI', 0, 0, 2, 0, 0, 3, 1, 'y'),
(26, NULL, NULL, 'Materi', 3, 'TAK, Komunikasi Terapeutik, Dokumentasi Keperawatanan', 150000, '-- LAINNYA --', 3, 1, 2, 0, 0, 4, 1, 'y'),
(27, NULL, NULL, 'Ujian', 4, NULL, 150000, 'SEKALI', 0, 0, 2, 0, 0, 6, 1, 'y'),
(28, NULL, NULL, 'Makan dan Snack Penguji', 5, NULL, 20000, 'SEKALI', 0, 0, 2, 0, 0, 6, 1, 'y'),
(29, NULL, NULL, 'Bahan Habis Pakai Ujian', 2, NULL, 100000, 'SEKALI', 0, 0, 2, 0, 0, 6, 1, 'y'),
(30, NULL, NULL, 'Institusional Fee Ujian', 6, NULL, 150000, 'SEKALI', 0, 0, 2, 0, 0, 6, 1, 'y'),
(31, NULL, NULL, 'Management Fee Ujian', 6, NULL, 20000, 'SEKALI', 0, 0, 2, 0, 0, 6, 1, 'y'),
(32, NULL, NULL, 'Bed side teaching (BST) / Bimbingan', 13, NULL, 50000, 'MINGGUAN', 0, 0, 2, 6, 0, 4, 2, 'y'),
(33, NULL, NULL, 'Bed side teaching (BST) / Bimbingan', 13, NULL, 75000, 'MINGGUAN', 0, 0, 2, 7, 0, 4, 2, 'y'),
(34, NULL, NULL, 'Bed side teaching (BST) / Bimbingan', 13, NULL, 75000, 'MINGGUAN', 0, 0, 2, 8, 0, 4, 2, 'y'),
(35, NULL, NULL, 'Bed side teaching (BST) / Bimbingan', 13, NULL, 75000, 'MINGGUAN', 0, 0, 2, 9, 0, 4, 2, 'y'),
(36, NULL, NULL, 'Institusional Fee', 1, NULL, 20000, 'SEKALI', 0, 0, 3, 0, 0, 1, 1, 'y'),
(37, NULL, NULL, 'Management Fee', 1, NULL, 20000, 'SEKALI', 0, 0, 3, 0, 0, 1, 1, 'y'),
(38, NULL, NULL, 'Untuk Keselamatan Kerja (Handrub, tisue, sabun)', 1, NULL, 20000, 'SEKALI', 0, 0, 3, 0, 0, 2, 1, 'y'),
(39, NULL, NULL, 'Orientasi ', 3, NULL, 75000, 'SEKALI', 1, 1, 3, 0, 0, 3, 1, 'y'),
(40, NULL, NULL, 'Keselamatan Pasien', 3, NULL, 150000, 'SEKALI', 0, 0, 3, 0, 0, 3, 1, 't'),
(41, NULL, NULL, 'Log Book (dibayar 1 kali)', 1, NULL, 20000, 'SEKALI', 0, 0, 3, 0, 0, 3, 1, 't'),
(42, NULL, NULL, 'Name Tag (dibayar 1 kali)', 1, NULL, 10000, 'SEKALI', 0, 0, 3, 0, 0, 3, 1, 'y'),
(45, NULL, NULL, 'Ujian', 4, NULL, 150000, 'SEKALI', 0, 0, 3, 0, 0, 6, 1, 'y'),
(46, NULL, NULL, 'Makan dan Snack Penguji', 5, NULL, 20000, 'SEKALI', 0, 0, 3, 0, 0, 6, 1, 'y'),
(47, NULL, NULL, 'Bahan Habis Pakai Ujian', 2, NULL, 100000, 'SEKALI', 0, 0, 3, 0, 0, 6, 1, 'y'),
(48, NULL, NULL, 'Institusional Fee Ujian', 6, NULL, 150000, 'SEKALI', 0, 0, 3, 0, 0, 6, 1, 'y'),
(49, NULL, NULL, 'Management Fee Ujian', 6, NULL, 20000, 'SEKALI', 0, 0, 3, 0, 0, 6, 1, 'y'),
(50, NULL, NULL, 'Bed side teaching (BST) / Bimbingan', 13, NULL, 50000, 'MINGGUAN', 0, 0, 3, 6, 0, 4, 2, 'y'),
(51, NULL, NULL, 'Bed side teaching (BST) / Bimbingan', 13, NULL, 75000, 'MINGGUAN', 0, 0, 3, 7, 0, 4, 2, 'y'),
(52, NULL, NULL, 'Bed side teaching (BST) / Bimbingan', 13, NULL, 75000, 'MINGGUAN', 0, 0, 3, 8, 0, 4, 2, 'y'),
(53, NULL, NULL, 'Bed side teaching (BST) / Bimbingan', 13, NULL, 75000, 'MINGGUAN', 0, 0, 3, 9, 0, 4, 2, 'y'),
(54, NULL, NULL, 'Institusional Fee', 1, NULL, 20000, 'SEKALI', 0, 0, 4, 0, 0, 1, 1, 'y'),
(55, NULL, NULL, 'Management Fee', 1, NULL, 20000, 'SEKALI', 0, 0, 4, 0, 0, 1, 1, 'y'),
(56, NULL, NULL, 'Untuk Keselamatan Kerja (Handrub, tisue, sabun)', 1, NULL, 20000, 'SEKALI', 0, 0, 4, 0, 0, 2, 1, 'y'),
(57, NULL, NULL, 'Orientasi ', 3, NULL, 75000, 'SEKALI', 1, 1, 4, 0, 0, 3, 1, 'y'),
(58, NULL, NULL, 'Keselamatan Pasien', 3, NULL, 150000, 'SEKALI', 0, 0, 4, 0, 0, 3, 1, 't'),
(59, NULL, NULL, 'Log Book (dibayar 1 kali)', 1, NULL, 20000, 'SEKALI', 0, 0, 4, 0, 0, 3, 1, 't'),
(60, NULL, NULL, 'Name Tag (dibayar 1 kali)', 1, NULL, 10000, 'SEKALI', 0, 0, 4, 0, 0, 3, 1, 'y'),
(63, NULL, NULL, 'Ujian', 4, NULL, 150000, 'SEKALI', 0, 0, 4, 0, 0, 6, 1, 'y'),
(64, NULL, NULL, 'Makan dan Snack Penguji', 5, NULL, 20000, 'SEKALI', 0, 0, 4, 0, 0, 6, 1, 'y'),
(65, NULL, NULL, 'Bahan Habis Pakai Ujian', 2, NULL, 100000, 'SEKALI', 0, 0, 4, 0, 0, 6, 1, 'y'),
(66, NULL, NULL, 'Institusional Fee Ujian', 6, NULL, 150000, 'SEKALI', 0, 0, 4, 0, 0, 6, 1, 'y'),
(67, NULL, NULL, 'Management Fee Ujian', 6, NULL, 20000, 'SEKALI', 0, 0, 4, 0, 0, 6, 1, 'y'),
(68, NULL, NULL, 'Bed side teaching (BST) / Bimbingan', 13, NULL, 50000, 'MINGGUAN', 0, 0, 4, 6, 0, 4, 2, 'y'),
(69, NULL, NULL, 'Bed side teaching (BST) / Bimbingan', 13, NULL, 75000, 'MINGGUAN', 0, 0, 4, 7, 0, 4, 2, 'y'),
(70, NULL, NULL, 'Bed side teaching (BST) / Bimbingan', 13, NULL, 75000, 'MINGGUAN', 0, 0, 4, 8, 0, 4, 2, 'y'),
(71, NULL, NULL, 'Bed side teaching (BST) / Bimbingan', 13, NULL, 75000, 'MINGGUAN', 0, 0, 4, 9, 0, 4, 2, 'y'),
(72, NULL, NULL, 'Institusional Fee', 1, NULL, 20000, 'SEKALI', 0, 0, 5, 0, 0, 1, 1, 'y'),
(73, NULL, NULL, 'Management Fee', 1, NULL, 20000, 'SEKALI', 0, 0, 5, 0, 0, 1, 1, 'y'),
(74, NULL, NULL, 'Untuk Keselamatan Kerja (Handrub, tisue, sabun)', 1, NULL, 20000, 'SEKALI', 0, 0, 5, 0, 0, 2, 1, 'y'),
(75, NULL, NULL, 'Orientasi ', 3, NULL, 75000, 'SEKALI', 1, 1, 5, 0, 0, 3, 1, 'y'),
(76, NULL, NULL, 'Keselamatan Pasien', 3, NULL, 150000, 'SEKALI', 0, 0, 5, 0, 0, 3, 1, 't'),
(77, NULL, NULL, 'Log Book (dibayar 1 kali)', 1, NULL, 20000, 'SEKALI', 0, 0, 5, 0, 0, 3, 1, 't'),
(78, NULL, NULL, 'Name Tag (dibayar 1 kali)', 1, NULL, 10000, 'SEKALI', 0, 0, 5, 0, 0, 3, 1, 'y'),
(80, NULL, NULL, 'Ujian', 4, NULL, 150000, 'SEKALI', 0, 0, 5, 0, 0, 6, 1, 'y'),
(81, NULL, NULL, 'Makan dan Snack Penguji', 5, NULL, 20000, 'SEKALI', 0, 0, 5, 0, 0, 6, 1, 'y'),
(82, NULL, NULL, 'Bahan Habis Pakai Ujian', 2, NULL, 100000, 'SEKALI', 0, 0, 5, 0, 0, 6, 1, 'y'),
(83, NULL, NULL, 'Institusional Fee Ujian', 6, NULL, 150000, 'SEKALI', 0, 0, 5, 0, 0, 6, 1, 'y'),
(84, NULL, NULL, 'Management Fee Ujian', 6, NULL, 20000, 'SEKALI', 0, 0, 5, 0, 0, 6, 1, 'y'),
(85, NULL, NULL, 'Bed side teaching (BST) / Bimbingan', 13, NULL, 50000, 'MINGGUAN', 0, 0, 5, 6, 0, 4, 2, 'y'),
(86, NULL, NULL, 'Bed side teaching (BST) / Bimbingan', 13, NULL, 75000, 'MINGGUAN', 0, 0, 5, 7, 0, 4, 2, 'y'),
(87, NULL, NULL, 'Bed side teaching (BST) / Bimbingan', 13, NULL, 75000, 'MINGGUAN', 0, 0, 5, 8, 0, 4, 2, 'y'),
(88, NULL, NULL, 'Bed side teaching (BST) / Bimbingan', 13, NULL, 75000, 'MINGGUAN', 0, 0, 5, 9, 0, 4, 2, 'y'),
(89, NULL, NULL, 'Institusional Fee', 1, NULL, 20000, 'SEKALI', 0, 0, 6, 0, 0, 1, 1, 'y'),
(90, NULL, NULL, 'Management Fee', 1, NULL, 20000, 'SEKALI', 0, 0, 6, 0, 0, 1, 1, 'y'),
(91, NULL, NULL, 'Untuk Keselamatan Kerja (Handrub, tisue, sabun)', 1, NULL, 20000, 'SEKALI', 0, 0, 6, 0, 0, 2, 1, 'y'),
(92, NULL, NULL, 'Orientasi ', 3, NULL, 75000, 'SEKALI', 1, 1, 6, 0, 0, 3, 1, 'y'),
(93, NULL, NULL, 'Keselamatan Pasien', 3, NULL, 150000, 'SEKALI', 0, 0, 6, 0, 0, 3, 1, 't'),
(94, NULL, NULL, 'Log Book (dibayar 1 kali)', 1, NULL, 20000, 'SEKALI', 0, 0, 6, 0, 0, 3, 1, 't'),
(95, NULL, NULL, 'Name Tag (dibayar 1 kali)', 1, NULL, 10000, 'SEKALI', 0, 0, 6, 0, 0, 3, 1, 'y'),
(97, NULL, NULL, 'Ujian', 4, NULL, 150000, 'SEKALI', 0, 0, 6, 0, 0, 6, 1, 'y'),
(98, NULL, NULL, 'Makan dan Snack Penguji', 5, NULL, 20000, 'SEKALI', 0, 0, 6, 0, 0, 6, 1, 'y'),
(99, NULL, NULL, 'Bahan Habis Pakai Ujian', 2, NULL, 100000, 'SEKALI', 0, 0, 6, 0, 0, 6, 1, 'y'),
(100, NULL, NULL, 'Institusional Fee Ujian', 6, NULL, 150000, 'SEKALI', 0, 0, 6, 0, 0, 6, 1, 'y'),
(101, NULL, NULL, 'Management Fee Ujian', 6, NULL, 20000, 'SEKALI', 0, 0, 6, 0, 0, 6, 1, 'y'),
(102, NULL, NULL, 'Bed side teaching (BST)  / Bimbingan', 13, NULL, 50000, 'MINGGUAN', 0, 0, 6, 6, 0, 4, 2, 'y'),
(103, NULL, NULL, 'Bed side teaching (BST)  / Bimbingan', 13, NULL, 75000, 'MINGGUAN', 0, 0, 6, 7, 0, 4, 2, 'y'),
(104, NULL, NULL, 'Bed side teaching (BST) / Bimbingan', 13, NULL, 75000, 'MINGGUAN', 0, 0, 6, 8, 0, 4, 2, 'y'),
(105, NULL, NULL, 'Bed side teaching (BST) / Bimbingan', 13, NULL, 75000, 'MINGGUAN', 0, 0, 6, 9, 0, 4, 2, 'y'),
(106, NULL, NULL, 'Institusional Fee', 1, NULL, 20000, 'SEKALI', 0, 0, 7, 0, 0, 1, 1, 'y'),
(107, NULL, NULL, 'Management Fee', 1, NULL, 20000, 'SEKALI', 0, 0, 7, 0, 0, 1, 1, 'y'),
(108, NULL, NULL, 'Untuk Keselamatan Kerja (Handrub, tisue, sabun)', 1, NULL, 20000, 'SEKALI', 0, 0, 7, 0, 0, 2, 1, 'y'),
(109, NULL, NULL, 'Orientasi ', 3, NULL, 75000, 'SEKALI', 1, 1, 7, 0, 0, 3, 1, 'y'),
(110, NULL, NULL, 'Keselamatan Pasien', 3, NULL, 150000, 'SEKALI', 0, 0, 7, 0, 0, 3, 1, 't'),
(111, NULL, NULL, 'Log Book (dibayar 1 kali)', 1, NULL, 20000, 'SEKALI', 0, 0, 7, 0, 0, 3, 1, 't'),
(112, NULL, NULL, 'Name Tag (dibayar 1 kali)', 1, NULL, 10000, 'SEKALI', 0, 0, 7, 0, 0, 3, 1, 'y'),
(113, NULL, NULL, 'Ujian', 4, NULL, 150000, 'SEKALI', 0, 0, 7, 0, 0, 6, 1, 'y'),
(114, NULL, NULL, 'Makan dan Snack Penguji', 5, NULL, 20000, 'SEKALI', 0, 0, 7, 0, 0, 6, 1, 'y'),
(115, NULL, NULL, 'Bahan Habis Pakai Ujian', 2, NULL, 100000, 'SEKALI', 0, 0, 7, 0, 0, 6, 1, 'y'),
(116, NULL, NULL, 'Institusional Fee Ujian', 6, NULL, 150000, 'SEKALI', 0, 0, 7, 0, 0, 6, 1, 'y'),
(117, NULL, NULL, 'Management Fee Ujian', 6, NULL, 20000, 'SEKALI', 0, 0, 7, 0, 0, 6, 1, 'y'),
(118, NULL, NULL, 'Bed side teaching (BST) / Bimbingan', 13, NULL, 50000, 'MINGGUAN', 0, 0, 7, 6, 0, 4, 2, 'y'),
(119, NULL, NULL, 'Bed side teaching (BST) / Bimbingan', 13, NULL, 75000, 'MINGGUAN', 0, 0, 7, 7, 0, 4, 2, 'y'),
(120, NULL, NULL, 'Bed side teaching (BST) / Bimbingan', 13, NULL, 75000, 'MINGGUAN', 0, 0, 7, 8, 0, 4, 2, 'y'),
(121, NULL, NULL, 'Bed side teaching (BST) / Bimbingan', 13, NULL, 75000, 'MINGGUAN', 0, 0, 7, 9, 0, 4, 2, 'y'),
(122, NULL, NULL, 'Management Fee', 1, NULL, 20000, 'SEKALI', 0, 0, 8, 0, 0, 1, 1, 'y'),
(123, NULL, NULL, 'Untuk Keselamatan Kerja (Handrub, tisue, sabun)', 1, NULL, 20000, 'SEKALI', 0, 0, 8, 0, 0, 2, 1, 'y'),
(124, NULL, NULL, 'Orientasi ', 3, NULL, 75000, 'SEKALI', 1, 1, 8, 0, 0, 3, 1, 'y'),
(125, NULL, NULL, 'Keselamatan Pasien', 3, NULL, 150000, 'SEKALI', 0, 0, 8, 0, 0, 3, 1, 't'),
(126, NULL, NULL, 'Log Book (dibayar 1 kali)', 1, NULL, 20000, 'SEKALI', 0, 0, 8, 0, 0, 3, 1, 't'),
(127, NULL, NULL, 'Name Tag (dibayar 1 kali)', 1, NULL, 10000, 'SEKALI', 0, 0, 8, 0, 0, 3, 1, 'y'),
(128, NULL, NULL, 'Ujian', 4, NULL, 150000, 'SEKALI', 0, 0, 8, 0, 0, 6, 1, 'y'),
(129, NULL, NULL, 'Makan dan Snack Penguji', 5, NULL, 20000, 'SEKALI', 0, 0, 8, 0, 0, 6, 1, 'y'),
(130, NULL, NULL, 'Bahan Habis Pakai Ujian', 2, NULL, 100000, 'SEKALI', 0, 0, 8, 0, 0, 6, 1, 'y'),
(131, NULL, NULL, 'Institusional Fee Ujian', 6, NULL, 150000, 'SEKALI', 0, 0, 8, 0, 0, 6, 1, 'y'),
(132, NULL, NULL, 'Management Fee Ujian', 6, NULL, 20000, 'SEKALI', 0, 0, 8, 0, 0, 6, 1, 'y'),
(133, NULL, NULL, 'Bed side teaching (BST)', 13, NULL, 50000, 'MINGGUAN', 0, 0, 8, 6, 0, 4, 2, 'y'),
(134, NULL, NULL, 'Bed side teaching (BST)', 13, NULL, 75000, 'MINGGUAN', 0, 0, 8, 7, 0, 4, 2, 'y'),
(135, NULL, NULL, 'Bed side teaching (BST)', 13, NULL, 75000, 'MINGGUAN', 0, 0, 8, 8, 0, 4, 2, 'y'),
(136, NULL, NULL, 'Bed side teaching (BST)', 13, NULL, 75000, 'MINGGUAN', 0, 0, 8, 9, 0, 4, 2, 'y');

-- --------------------------------------------------------

--
-- Table structure for table `tb_tarif_jenis`
--

DROP TABLE IF EXISTS `tb_tarif_jenis`;
CREATE TABLE `tb_tarif_jenis` (
  `id_tarif_jenis` int(11) NOT NULL,
  `nama_tarif_jenis` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_tarif_jenis`
--

INSERT INTO `tb_tarif_jenis` (`id_tarif_jenis`, `nama_tarif_jenis`) VALUES
(0, '-- Lainnya --'),
(1, 'BIAYA ADMINISTRASI'),
(2, 'BIAYA HABIS PAKAI'),
(3, 'BIAYA OVERHEAD OPERASIONAL'),
(4, 'BIAYA PEMBELAJARAN'),
(5, 'UAP'),
(6, 'BIAYA UJIAN'),
(7, 'PEMAKAIAN KEKAYAAN DAERAH'),
(8, 'MESS / PEMONDOKAN'),
(13, 'PRAKTIK KERJA'),
(14, 'BARANG HABIS PAKAI');

-- --------------------------------------------------------

--
-- Table structure for table `tb_tarif_pilih`
--

DROP TABLE IF EXISTS `tb_tarif_pilih`;
CREATE TABLE `tb_tarif_pilih` (
  `id_tarif_pilih` int(11) NOT NULL,
  `id_praktik` int(11) DEFAULT NULL,
  `tgl_tambah_tarif_pilih` date DEFAULT NULL,
  `tgl_ubah_tarif_pilih` date DEFAULT NULL,
  `nama_jenis_tarif_pilih` text NOT NULL,
  `nama_tarif_pilih` text NOT NULL,
  `nominal_tarif_pilih` int(11) NOT NULL,
  `nama_satuan_tarif_pilih` text NOT NULL,
  `frekuensi_tarif_pilih` int(11) NOT NULL,
  `kuantitas_tarif_pilih` int(11) NOT NULL,
  `jumlah_tarif_pilih` bigint(20) NOT NULL,
  `ujian_tarif_pilih` text DEFAULT NULL COMMENT '(sementara tidak digunakan)	',
  `mess_tarif_pilih` text DEFAULT NULL COMMENT '(sementara tidak digunakan)',
  `status_tarif_pilih` enum('T','Y') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_tarif_pilih`
--

INSERT INTO `tb_tarif_pilih` (`id_tarif_pilih`, `id_praktik`, `tgl_tambah_tarif_pilih`, `tgl_ubah_tarif_pilih`, `nama_jenis_tarif_pilih`, `nama_tarif_pilih`, `nominal_tarif_pilih`, `nama_satuan_tarif_pilih`, `frekuensi_tarif_pilih`, `kuantitas_tarif_pilih`, `jumlah_tarif_pilih`, `ujian_tarif_pilih`, `mess_tarif_pilih`, `status_tarif_pilih`) VALUES
(1, 2, '2022-12-31', NULL, 'UAP', 'Qui quas qui sed cup', 73, 'per-jam', 1, 53, 3869, NULL, NULL, 'T'),
(2, 2, '2022-12-31', '2022-12-31', 'Biaya Overhead Operational', 'Ut blanditiis impedi', 5, 'per-orang / penguji', 53, 69, 18285, NULL, NULL, 'T'),
(3, 1, '2023-01-04', '2023-01-04', 'Biaya Administrasi', 'Institusional Fee', 20000, 'per-siswa / periode', 1, 19, 380000, NULL, NULL, 'T'),
(4, 1, '2023-01-04', '2023-01-04', 'Biaya Administrasi', 'Managemen Fee', 20000, 'per-siswa / periode', 1, 19, 380000, NULL, NULL, 'T'),
(5, 1, '2023-01-04', '2023-01-04', 'Biaya Habis Pakai', 'Handrub, sabun, tisu', 20000, 'per-siswa / periode', 1, 19, 380000, NULL, NULL, 'T'),
(6, 1, '2023-01-04', '2023-01-04', 'Biaya Overhead Operational', 'Orientasi', 75000, 'per-periode / kali', 1, 1, 75000, NULL, NULL, 'T'),
(7, 1, '2023-01-04', '2023-01-05', 'Biaya Overhead Operational', 'Name Tag', 10000, 'per-siswa', 1, 19, 190000, NULL, NULL, 'T'),
(8, 1, '2023-01-04', '2023-01-05', 'Pemakaian Kekayaan Daerah', 'Aula Utama', 750000, 'per-periode', 1, 1, 750000, NULL, NULL, 'T'),
(9, 1, '2023-01-04', '2023-01-04', 'Biaya Pembelajaran', 'BST/Bimbingan', 75000, 'persiswa / minggu', 4, 19, 5700000, NULL, NULL, 'T'),
(10, 1, '2023-01-04', '2023-01-04', 'Biaya Pembelajaran', 'Materi (TAK, Komter, Dokep)', 150000, 'per-periode / kali', 3, 1, 450000, NULL, NULL, 'T'),
(11, 3, '2023-03-09', NULL, 'BIAYA ADMINISTRASI', 'Institusional Fee', 20000, 'per-siswa / periode', 1, 48, 960000, NULL, NULL, 'T'),
(12, 3, '2023-03-09', NULL, 'BIAYA ADMINISTRASI', 'Management Fee', 20000, 'per-siswa / periode', 1, 48, 960000, NULL, NULL, 'T'),
(13, 3, '2023-03-09', NULL, 'BIAYA HABIS PAKAI', '(Handrub,tisue,sabun)', 20000, 'per-siswa / periode', 1, 48, 960000, NULL, NULL, 'T'),
(14, 3, '2023-03-09', NULL, 'BIAYA OVERHEAD OPERASIONAL', 'Orientasi', 75000, 'per-siswa / kali', 1, 1, 3600000, NULL, NULL, 'T'),
(15, 3, '2023-03-09', NULL, 'BIAYA OVERHEAD OPERASIONAL', 'Name Tag', 10000, 'per-siswa', 1, 48, 480000, NULL, NULL, 'T'),
(16, 3, '2023-03-09', NULL, 'PEMAKAIAN KEKAYAAN DAERAH', 'Aula', 1000000, 'per-periode', 1, 1, 1000000, NULL, NULL, 'T'),
(17, 3, '2023-03-09', NULL, 'BIAYA PEMBELAJARAN', 'BST / Bimbingan', 75000, 'per-siswa / minggu', 0, 48, 0, NULL, NULL, 'T'),
(18, 3, '2023-03-09', NULL, 'BIAYA PEMBELAJARAN', 'Materi (TAK, Komter, Dokep)', 150000, 'per-periode / materi', 0, 1, 0, NULL, NULL, 'T'),
(19, 4, '2023-03-09', NULL, 'BIAYA ADMINISTRASI', 'Institusional Fee', 20000, 'per-siswa / periode', 1, 48, 960000, NULL, NULL, 'T'),
(20, 4, '2023-03-09', NULL, 'BIAYA ADMINISTRASI', 'Management Fee', 20000, 'per-siswa / periode', 1, 48, 960000, NULL, NULL, 'T'),
(21, 4, '2023-03-09', NULL, 'BIAYA HABIS PAKAI', '(Handrub,tisue,sabun)', 20000, 'per-siswa / periode', 1, 48, 960000, NULL, NULL, 'T'),
(22, 4, '2023-03-09', NULL, 'BIAYA OVERHEAD OPERASIONAL', 'Orientasi', 75000, 'per-siswa / kali', 1, 1, 3600000, NULL, NULL, 'T'),
(23, 4, '2023-03-09', NULL, 'BIAYA OVERHEAD OPERASIONAL', 'Name Tag', 10000, 'per-siswa', 1, 48, 480000, NULL, NULL, 'T'),
(24, 4, '2023-03-09', NULL, 'PEMAKAIAN KEKAYAAN DAERAH', 'Aula', 1000000, 'per-periode', 1, 1, 1000000, NULL, NULL, 'T'),
(25, 4, '2023-03-09', NULL, 'BIAYA PEMBELAJARAN', 'BST / Bimbingan', 75000, 'per-siswa / minggu', 0, 48, 0, NULL, NULL, 'T'),
(26, 4, '2023-03-09', NULL, 'BIAYA PEMBELAJARAN', 'Materi (TAK, Komter, Dokep)', 150000, 'per-periode / materi', 0, 1, 0, NULL, NULL, 'T'),
(27, 5, '2023-03-09', NULL, 'BIAYA ADMINISTRASI', 'Institusional Fee', 20000, 'per-siswa / periode', 1, 50, 1000000, NULL, NULL, 'T'),
(28, 5, '2023-03-09', NULL, 'BIAYA ADMINISTRASI', 'Management Fee', 20000, 'per-siswa / periode', 1, 50, 1000000, NULL, NULL, 'T'),
(29, 5, '2023-03-09', NULL, 'BIAYA HABIS PAKAI', '(Handrub,tisue,sabun)', 20000, 'per-siswa / periode', 1, 50, 1000000, NULL, NULL, 'T'),
(30, 5, '2023-03-09', NULL, 'BIAYA OVERHEAD OPERASIONAL', 'Orientasi', 75000, 'per-siswa / kali', 1, 1, 3750000, NULL, NULL, 'T'),
(31, 5, '2023-03-09', NULL, 'BIAYA OVERHEAD OPERASIONAL', 'Name Tag', 10000, 'per-siswa', 1, 50, 500000, NULL, NULL, 'T'),
(32, 5, '2023-03-09', NULL, 'PEMAKAIAN KEKAYAAN DAERAH', 'Aula', 1000000, 'per-periode', 1, 1, 1000000, NULL, NULL, 'T'),
(33, 5, '2023-03-09', NULL, 'BIAYA PEMBELAJARAN', 'BST / Bimbingan', 75000, 'per-siswa / minggu', 0, 50, 0, NULL, NULL, 'T'),
(34, 5, '2023-03-09', NULL, 'BIAYA PEMBELAJARAN', 'Materi (TAK, Komter, Dokep)', 150000, 'per-periode / materi', 0, 1, 0, NULL, NULL, 'T'),
(35, 6, '2023-03-14', NULL, 'BIAYA ADMINISTRASI', 'Institusional Fee', 20000, 'per-siswa / periode', 1, 87, 1740000, NULL, NULL, 'T'),
(36, 6, '2023-03-14', NULL, 'BIAYA ADMINISTRASI', 'Management Fee', 20000, 'per-siswa / periode', 1, 87, 1740000, NULL, NULL, 'T'),
(37, 6, '2023-03-14', NULL, 'BIAYA HABIS PAKAI', '(Handrub,tisue,sabun)', 20000, 'per-siswa / periode', 1, 87, 1740000, NULL, NULL, 'T'),
(38, 6, '2023-03-14', NULL, 'BIAYA OVERHEAD OPERASIONAL', 'Orientasi', 75000, 'per-siswa / kali', 1, 1, 6525000, NULL, NULL, 'T'),
(39, 6, '2023-03-14', NULL, 'BIAYA OVERHEAD OPERASIONAL', 'Name Tag', 10000, 'per-siswa', 1, 87, 870000, NULL, NULL, 'T'),
(40, 6, '2023-03-14', NULL, 'PEMAKAIAN KEKAYAAN DAERAH', 'Aula', 1000000, 'per-periode', 1, 1, 1000000, NULL, NULL, 'T'),
(41, 6, '2023-03-14', NULL, 'BIAYA PEMBELAJARAN', 'BST / Bimbingan', 75000, 'per-siswa / minggu', 0, 87, 0, NULL, NULL, 'T'),
(42, 6, '2023-03-14', NULL, 'BIAYA PEMBELAJARAN', 'Materi (TAK, Komter, Dokep)', 150000, 'per-periode / materi', 0, 1, 0, NULL, NULL, 'T'),
(43, 7, '2023-03-14', NULL, 'BIAYA ADMINISTRASI', 'Institusional Fee', 20000, 'per-siswa / periode', 1, 72, 1440000, NULL, NULL, 'T'),
(44, 7, '2023-03-14', NULL, 'BIAYA ADMINISTRASI', 'Management Fee', 20000, 'per-siswa / periode', 1, 72, 1440000, NULL, NULL, 'T'),
(45, 7, '2023-03-14', NULL, 'BIAYA HABIS PAKAI', '(Handrub,tisue,sabun)', 20000, 'per-siswa / periode', 1, 72, 1440000, NULL, NULL, 'T'),
(46, 7, '2023-03-14', NULL, 'BIAYA OVERHEAD OPERASIONAL', 'Orientasi', 75000, 'per-siswa / kali', 1, 1, 5400000, NULL, NULL, 'T'),
(47, 7, '2023-03-14', NULL, 'BIAYA OVERHEAD OPERASIONAL', 'Name Tag', 10000, 'per-siswa', 1, 72, 720000, NULL, NULL, 'T'),
(48, 7, '2023-03-14', NULL, 'PEMAKAIAN KEKAYAAN DAERAH', 'Aula', 1000000, 'per-periode', 1, 1, 1000000, NULL, NULL, 'T'),
(49, 7, '2023-03-14', NULL, 'BIAYA PEMBELAJARAN', 'BST / Bimbingan', 75000, 'per-siswa / minggu', 0, 72, 0, NULL, NULL, 'T'),
(50, 7, '2023-03-14', NULL, 'BIAYA PEMBELAJARAN', 'Materi (TAK, Komter, Dokep)', 150000, 'per-periode / materi', 0, 1, 0, NULL, NULL, 'T'),
(51, 8, '2023-03-14', NULL, 'BIAYA ADMINISTRASI', 'Institusional Fee', 20000, 'per-siswa / periode', 1, 53, 1060000, NULL, NULL, 'T'),
(52, 8, '2023-03-14', NULL, 'BIAYA ADMINISTRASI', 'Management Fee', 20000, 'per-siswa / periode', 1, 53, 1060000, NULL, NULL, 'T'),
(53, 8, '2023-03-14', NULL, 'BIAYA HABIS PAKAI', '(Handrub,tisue,sabun)', 20000, 'per-siswa / periode', 1, 53, 1060000, NULL, NULL, 'T'),
(54, 8, '2023-03-14', NULL, 'BIAYA OVERHEAD OPERASIONAL', 'Orientasi', 75000, 'per-siswa / kali', 1, 1, 3975000, NULL, NULL, 'T'),
(55, 8, '2023-03-14', NULL, 'BIAYA OVERHEAD OPERASIONAL', 'Name Tag', 10000, 'per-siswa', 1, 53, 530000, NULL, NULL, 'T'),
(56, 8, '2023-03-14', NULL, 'PEMAKAIAN KEKAYAAN DAERAH', 'Aula', 1000000, 'per-periode', 1, 1, 1000000, NULL, NULL, 'T'),
(57, 8, '2023-03-14', NULL, 'BIAYA PEMBELAJARAN', 'BST / Bimbingan', 75000, 'per-siswa / minggu', 0, 53, 0, NULL, NULL, 'T'),
(58, 8, '2023-03-14', NULL, 'BIAYA PEMBELAJARAN', 'Materi (TAK, Komter, Dokep)', 150000, 'per-periode / materi', 0, 1, 0, NULL, NULL, 'T'),
(59, 9, '2023-03-18', NULL, 'BIAYA ADMINISTRASI', 'Institusional Fee', 20000, 'per-siswa / periode', 1, 6, 120000, NULL, NULL, 'T'),
(60, 9, '2023-03-18', NULL, 'BIAYA ADMINISTRASI', 'Management Fee', 20000, 'per-siswa / periode', 1, 6, 120000, NULL, NULL, 'T'),
(61, 9, '2023-03-18', NULL, 'BIAYA HABIS PAKAI', '(Handrub,tisue,sabun)', 20000, 'per-siswa / periode', 1, 6, 120000, NULL, NULL, 'T'),
(62, 9, '2023-03-18', NULL, 'BIAYA OVERHEAD OPERASIONAL', 'Orientasi', 75000, 'per-siswa / kali', 1, 1, 450000, NULL, NULL, 'T'),
(63, 9, '2023-03-18', NULL, 'BIAYA OVERHEAD OPERASIONAL', 'Name Tag', 10000, 'per-siswa', 1, 6, 60000, NULL, NULL, 'T'),
(64, 9, '2023-03-18', NULL, 'PEMAKAIAN KEKAYAAN DAERAH', 'Aula', 1000000, 'per-periode', 1, 1, 1000000, NULL, NULL, 'T'),
(65, 9, '2023-03-18', NULL, 'BIAYA PEMBELAJARAN', 'BST / Bimbingan', 75000, 'per-siswa / minggu', 0, 6, 0, NULL, NULL, 'T'),
(66, 9, '2023-03-18', NULL, 'BIAYA PEMBELAJARAN', 'Materi (TAK, Komter, Dokep)', 150000, 'per-periode / materi', 0, 1, 0, NULL, NULL, 'T'),
(67, 10, '2023-03-27', NULL, 'BIAYA ADMINISTRASI', 'Institusional Fee', 50000, 'per-siswa / periode', 1, 6, 300000, NULL, NULL, 'T'),
(68, 10, '2023-03-27', NULL, 'BIAYA ADMINISTRASI', 'Management Fee', 75000, 'per-siswa / periode', 1, 6, 450000, NULL, NULL, 'T'),
(69, 10, '2023-03-27', NULL, 'BIAYA ADMINISTRASI', 'Alat tulis Kantor Fee', 5000, 'per-siswa / periode', 1, 6, 30000, NULL, NULL, 'T'),
(70, 10, '2023-03-27', NULL, 'BIAYA HABIS PAKAI', '(Handrub,tisue,sabun)', 5000, 'per-siswa / periode', 1, 6, 30000, NULL, NULL, 'T'),
(71, 10, '2023-03-27', NULL, 'BIAYA OVERHEAD OPERASIONAL', 'Log Book', 20000, 'per-siswa / periode', 1, 6, 120000, NULL, NULL, 'T'),
(72, 10, '2023-03-27', NULL, 'PEMAKAIAN KEKAYAAN DAERAH', 'Kelas', 30000, 'per-siswa / periode', 0, 6, 0, NULL, NULL, 'T'),
(73, 10, '2023-03-27', NULL, 'BIAYA PEMBELAJARAN', 'CSS', 37500, 'per-siswa / kali', 0, 6, 0, NULL, NULL, 'T'),
(74, 10, '2023-03-27', NULL, 'BIAYA PEMBELAJARAN', 'CRS', 37500, 'per-siswa / kali', 0, 6, 0, NULL, NULL, 'T'),
(75, 10, '2023-03-27', NULL, 'BIAYA PEMBELAJARAN', 'CBD', 37500, 'per-siswa / kali', 0, 6, 0, NULL, NULL, 'T'),
(76, 10, '2023-03-27', NULL, 'BIAYA PEMBELAJARAN', 'Pengayaan', 37500, 'per-siswa / kali', 0, 6, 0, NULL, NULL, 'T'),
(77, 10, '2023-03-27', NULL, 'BIAYA PEMBELAJARAN', 'Bimbingan', 37500, 'per-siswa / kali', 0, 6, 0, NULL, NULL, 'T'),
(78, 10, '2023-03-27', NULL, 'BIAYA PEMBELAJARAN', 'BST', 37500, 'per-siswa / kali', 0, 6, 0, NULL, NULL, 'T'),
(79, 10, '2023-03-27', NULL, 'BIAYA UJIAN', 'Mini Cex', 150000, 'per-siswa / kali', 0, 6, 0, NULL, NULL, 'T'),
(80, 10, '2023-03-27', NULL, 'BIAYA UJIAN', 'Ujian', 150000, 'per-siswa / kali', 0, 6, 0, NULL, NULL, 'T'),
(81, 10, '2023-03-27', NULL, 'BIAYA UJIAN', 'Makan Pembimbing', 20000, 'per-siswa / kali', 0, 6, 0, NULL, NULL, 'T'),
(82, 10, '2023-03-27', NULL, 'BIAYA UJIAN', 'Standar Pasien', 100000, 'per-siswa / kali', 0, 6, 0, NULL, NULL, 'T'),
(83, 12, '2023-04-11', NULL, 'BIAYA ADMINISTRASI', 'Institusional Fee', 20000, 'per-siswa / periode', 1, 19, 380000, NULL, NULL, 'T'),
(84, 12, '2023-04-11', NULL, 'BIAYA ADMINISTRASI', 'Management Fee', 20000, 'per-siswa / periode', 1, 19, 380000, NULL, NULL, 'T'),
(85, 12, '2023-04-11', NULL, 'BIAYA HABIS PAKAI', '(Handrub,tisue,sabun)', 20000, 'per-siswa / periode', 1, 19, 380000, NULL, NULL, 'T'),
(86, 12, '2023-04-11', NULL, 'BIAYA OVERHEAD OPERASIONAL', 'Orientasi', 75000, 'per-siswa / kali', 1, 1, 1425000, NULL, NULL, 'T'),
(87, 12, '2023-04-11', NULL, 'BIAYA OVERHEAD OPERASIONAL', 'Name Tag', 10000, 'per-siswa', 1, 19, 190000, NULL, NULL, 'T'),
(88, 12, '2023-04-11', NULL, 'PEMAKAIAN KEKAYAAN DAERAH', 'Aula', 1000000, 'per-periode', 1, 1, 1000000, NULL, NULL, 'T'),
(89, 12, '2023-04-11', NULL, 'BIAYA PEMBELAJARAN', 'BST / Bimbingan', 75000, 'per-siswa / minggu', 0, 19, 0, NULL, NULL, 'T'),
(90, 12, '2023-04-11', NULL, 'BIAYA PEMBELAJARAN', 'Materi (TAK, Komter, Dokep)', 150000, 'per-periode / materi', 0, 1, 0, NULL, NULL, 'T'),
(91, 13, '2023-04-11', NULL, 'BIAYA ADMINISTRASI', 'Institusional Fee', 20000, 'per-siswa / periode', 1, 92, 1840000, NULL, NULL, 'T'),
(92, 13, '2023-04-11', NULL, 'BIAYA ADMINISTRASI', 'Management Fee', 20000, 'per-siswa / periode', 1, 92, 1840000, NULL, NULL, 'T'),
(93, 13, '2023-04-11', NULL, 'BIAYA HABIS PAKAI', '(Handrub,tisue,sabun)', 20000, 'per-siswa / periode', 1, 92, 1840000, NULL, NULL, 'T'),
(94, 13, '2023-04-11', NULL, 'BIAYA OVERHEAD OPERASIONAL', 'Orientasi', 75000, 'per-siswa / kali', 1, 1, 6900000, NULL, NULL, 'T'),
(95, 13, '2023-04-11', NULL, 'BIAYA OVERHEAD OPERASIONAL', 'Name Tag', 10000, 'per-siswa', 1, 92, 920000, NULL, NULL, 'T'),
(96, 13, '2023-04-11', NULL, 'PEMAKAIAN KEKAYAAN DAERAH', 'Aula', 1000000, 'per-periode', 1, 1, 1000000, NULL, NULL, 'T'),
(97, 13, '2023-04-11', NULL, 'BIAYA PEMBELAJARAN', 'BST / Bimbingan', 75000, 'per-siswa / minggu', 0, 92, 0, NULL, NULL, 'T'),
(98, 13, '2023-04-11', NULL, 'BIAYA PEMBELAJARAN', 'Materi (TAK, Komter, Dokep)', 150000, 'per-periode / materi', 0, 1, 0, NULL, NULL, 'T'),
(99, 14, '2023-04-11', NULL, 'BIAYA ADMINISTRASI', 'Institusional Fee', 50000, 'per-siswa / periode', 1, 12, 600000, NULL, NULL, 'T'),
(100, 14, '2023-04-11', NULL, 'BIAYA ADMINISTRASI', 'Management Fee', 75000, 'per-siswa / periode', 1, 12, 900000, NULL, NULL, 'T'),
(101, 14, '2023-04-11', NULL, 'BIAYA ADMINISTRASI', 'Alat tulis Kantor Fee', 5000, 'per-siswa / periode', 1, 12, 60000, NULL, NULL, 'T'),
(102, 14, '2023-04-11', NULL, 'BIAYA HABIS PAKAI', '(Handrub,tisue,sabun)', 5000, 'per-siswa / periode', 1, 12, 60000, NULL, NULL, 'T'),
(103, 14, '2023-04-11', NULL, 'BIAYA OVERHEAD OPERASIONAL', 'Log Book', 20000, 'per-siswa / periode', 1, 12, 240000, NULL, NULL, 'T'),
(104, 14, '2023-04-11', NULL, 'PEMAKAIAN KEKAYAAN DAERAH', 'Kelas', 30000, 'per-siswa / periode', 0, 12, 0, NULL, NULL, 'T'),
(105, 14, '2023-04-11', NULL, 'BIAYA PEMBELAJARAN', 'CSS', 37500, 'per-siswa / kali', 0, 12, 0, NULL, NULL, 'T'),
(106, 14, '2023-04-11', NULL, 'BIAYA PEMBELAJARAN', 'CRS', 37500, 'per-siswa / kali', 0, 12, 0, NULL, NULL, 'T'),
(107, 14, '2023-04-11', NULL, 'BIAYA PEMBELAJARAN', 'CBD', 37500, 'per-siswa / kali', 0, 12, 0, NULL, NULL, 'T'),
(108, 14, '2023-04-11', NULL, 'BIAYA PEMBELAJARAN', 'Pengayaan', 37500, 'per-siswa / kali', 0, 12, 0, NULL, NULL, 'T'),
(109, 14, '2023-04-11', NULL, 'BIAYA PEMBELAJARAN', 'Bimbingan', 37500, 'per-siswa / kali', 0, 12, 0, NULL, NULL, 'T'),
(110, 14, '2023-04-11', NULL, 'BIAYA PEMBELAJARAN', 'BST', 37500, 'per-siswa / kali', 0, 12, 0, NULL, NULL, 'T'),
(111, 14, '2023-04-11', NULL, 'BIAYA UJIAN', 'Mini Cex', 150000, 'per-siswa / kali', 0, 12, 0, NULL, NULL, 'T'),
(112, 14, '2023-04-11', NULL, 'BIAYA UJIAN', 'Ujian', 150000, 'per-siswa / kali', 0, 12, 0, NULL, NULL, 'T'),
(113, 14, '2023-04-11', NULL, 'BIAYA UJIAN', 'Makan Pembimbing', 20000, 'per-siswa / kali', 0, 12, 0, NULL, NULL, 'T'),
(114, 14, '2023-04-11', NULL, 'BIAYA UJIAN', 'Standar Pasien', 100000, 'per-siswa / kali', 0, 12, 0, NULL, NULL, 'T'),
(115, 15, '2023-04-11', NULL, 'BIAYA ADMINISTRASI', 'Institusional Fee', 20000, 'per-siswa / periode', 1, 47, 940000, NULL, NULL, 'T'),
(116, 15, '2023-04-11', NULL, 'BIAYA ADMINISTRASI', 'Management Fee', 20000, 'per-siswa / periode', 1, 47, 940000, NULL, NULL, 'T'),
(117, 15, '2023-04-11', NULL, 'BIAYA HABIS PAKAI', '(Handrub,tisue,sabun)', 20000, 'per-siswa / periode', 1, 47, 940000, NULL, NULL, 'T'),
(118, 15, '2023-04-11', NULL, 'BIAYA OVERHEAD OPERASIONAL', 'Orientasi', 75000, 'per-siswa / kali', 1, 1, 3525000, NULL, NULL, 'T'),
(119, 15, '2023-04-11', NULL, 'BIAYA OVERHEAD OPERASIONAL', 'Name Tag', 10000, 'per-siswa', 1, 47, 470000, NULL, NULL, 'T'),
(120, 15, '2023-04-11', NULL, 'PEMAKAIAN KEKAYAAN DAERAH', 'Aula', 1000000, 'per-periode', 1, 1, 1000000, NULL, NULL, 'T'),
(121, 15, '2023-04-11', NULL, 'BIAYA PEMBELAJARAN', 'BST / Bimbingan', 75000, 'per-siswa / minggu', 0, 47, 0, NULL, NULL, 'T'),
(122, 15, '2023-04-11', NULL, 'BIAYA PEMBELAJARAN', 'Materi (TAK, Komter, Dokep)', 150000, 'per-periode / materi', 0, 1, 0, NULL, NULL, 'T'),
(123, 16, '2023-04-27', NULL, 'BIAYA ADMINISTRASI', 'Institusional Fee', 50000, 'per-siswa / periode', 1, 1, 50000, NULL, NULL, 'T'),
(124, 16, '2023-04-27', NULL, 'BIAYA ADMINISTRASI', 'Management Fee', 75000, 'per-siswa / periode', 1, 1, 75000, NULL, NULL, 'T'),
(125, 16, '2023-04-27', NULL, 'BIAYA ADMINISTRASI', 'Alat tulis Kantor Fee', 5000, 'per-siswa / periode', 1, 1, 5000, NULL, NULL, 'T'),
(126, 16, '2023-04-27', NULL, 'BIAYA HABIS PAKAI', '(Handrub,tisue,sabun)', 5000, 'per-siswa / periode', 1, 1, 5000, NULL, NULL, 'T'),
(127, 16, '2023-04-27', NULL, 'BIAYA OVERHEAD OPERASIONAL', 'Log Book', 20000, 'per-siswa / periode', 1, 1, 20000, NULL, NULL, 'T'),
(128, 16, '2023-04-27', NULL, 'PEMAKAIAN KEKAYAAN DAERAH', 'Kelas', 30000, 'per-siswa / periode', 0, 1, 0, NULL, NULL, 'T'),
(129, 16, '2023-04-27', NULL, 'BIAYA PEMBELAJARAN', 'CSS', 37500, 'per-siswa / kali', 0, 1, 0, NULL, NULL, 'T'),
(130, 16, '2023-04-27', NULL, 'BIAYA PEMBELAJARAN', 'CRS', 37500, 'per-siswa / kali', 0, 1, 0, NULL, NULL, 'T'),
(131, 16, '2023-04-27', NULL, 'BIAYA PEMBELAJARAN', 'CBD', 37500, 'per-siswa / kali', 0, 1, 0, NULL, NULL, 'T'),
(132, 16, '2023-04-27', NULL, 'BIAYA PEMBELAJARAN', 'Pengayaan', 37500, 'per-siswa / kali', 0, 1, 0, NULL, NULL, 'T'),
(133, 16, '2023-04-27', NULL, 'BIAYA PEMBELAJARAN', 'Bimbingan', 37500, 'per-siswa / kali', 0, 1, 0, NULL, NULL, 'T'),
(134, 16, '2023-04-27', NULL, 'BIAYA PEMBELAJARAN', 'BST', 37500, 'per-siswa / kali', 0, 1, 0, NULL, NULL, 'T'),
(135, 16, '2023-04-27', NULL, 'BIAYA UJIAN', 'Mini Cex', 150000, 'per-siswa / kali', 0, 1, 0, NULL, NULL, 'T'),
(136, 16, '2023-04-27', NULL, 'BIAYA UJIAN', 'Ujian', 150000, 'per-siswa / kali', 0, 1, 0, NULL, NULL, 'T'),
(137, 16, '2023-04-27', NULL, 'BIAYA UJIAN', 'Makan Pembimbing', 20000, 'per-siswa / kali', 0, 1, 0, NULL, NULL, 'T'),
(138, 16, '2023-04-27', NULL, 'BIAYA UJIAN', 'Standar Pasien', 100000, 'per-siswa / kali', 0, 1, 0, NULL, NULL, 'T');

-- --------------------------------------------------------

--
-- Table structure for table `tb_tarif_satuan`
--

DROP TABLE IF EXISTS `tb_tarif_satuan`;
CREATE TABLE `tb_tarif_satuan` (
  `id_tarif_satuan` int(11) NOT NULL,
  `nama_tarif_satuan` text NOT NULL,
  `ket_tarif_satuan` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_tarif_satuan`
--

INSERT INTO `tb_tarif_satuan` (`id_tarif_satuan`, `nama_tarif_satuan`, `ket_tarif_satuan`) VALUES
(1, 'per-siswa / periode', NULL),
(2, 'per-siswa / kali', NULL),
(3, 'per-periode / kali', NULL),
(4, 'per-siswa / hari', NULL),
(5, 'per-penguji / kali', NULL),
(6, 'per-siswa / periode ujian', NULL),
(7, 'per-hari / kegiatan', NULL),
(8, 'per-minggu / orang', 'Mingguan dikali jumlah praktik'),
(9, 'per-orang', NULL),
(10, 'per-orang / penguji', NULL),
(11, 'per-hari / orang', NULL),
(12, 'per-hari', 'Maksimal 8 Jam'),
(13, 'persiswa / minggu', NULL),
(14, 'per-jam', NULL),
(15, 'per-periode', NULL),
(16, 'per-siswa', NULL),
(17, 'per-periode / materi', NULL),
(18, '-', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_tempat`
--

DROP TABLE IF EXISTS `tb_tempat`;
CREATE TABLE `tb_tempat` (
  `id_tempat` int(11) NOT NULL,
  `tgl_input_tempat` date NOT NULL,
  `tgl_ubah_tempat` date DEFAULT NULL,
  `id_tarif_jenis` int(11) NOT NULL,
  `nama_tempat` text NOT NULL,
  `kapasitas_tempat` int(11) NOT NULL,
  `id_jurusan_pdd_jenis` int(11) DEFAULT NULL,
  `tarif_tempat` int(11) NOT NULL,
  `id_tarif_satuan` int(11) NOT NULL,
  `ket_tempat` text DEFAULT NULL,
  `status_tempat` enum('Y','T') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_tempat`
--

INSERT INTO `tb_tempat` (`id_tempat`, `tgl_input_tempat`, `tgl_ubah_tempat`, `id_tarif_jenis`, `nama_tempat`, `kapasitas_tempat`, `id_jurusan_pdd_jenis`, `tarif_tempat`, `id_tarif_satuan`, `ket_tempat`, `status_tempat`) VALUES
(3, '2022-02-13', NULL, 7, 'Aula Utama', 120, 0, 1000000, 7, '-', 'Y'),
(6, '2022-02-13', NULL, 7, 'Aula Napza', 45, 0, 750000, 7, '-', 'Y'),
(9, '2022-02-13', NULL, 7, 'Ruang SPI', 45, 0, 500000, 7, '-', 'Y'),
(10, '2022-02-15', NULL, 7, 'Ruang Kelas/Ruang Diskusi', 10, 1, 30000, 4, 'Kapasitas Menyesuaikan', 'Y'),
(16, '2022-02-13', NULL, 7, 'Ruang Komite Medik', 22, 0, 750000, 7, '-', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `tb_tempat_pilih`
--

DROP TABLE IF EXISTS `tb_tempat_pilih`;
CREATE TABLE `tb_tempat_pilih` (
  `id_tempat_pilih` int(11) NOT NULL,
  `id_tempat` int(11) NOT NULL,
  `id_praktik` int(11) NOT NULL,
  `frek_tempat_pilih` int(11) NOT NULL,
  `kuan_tempat_pilih` int(11) NOT NULL,
  `total_tarif_tempat_pilih` int(11) NOT NULL,
  `tgl_input_tempat_pilih` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_unit`
--

DROP TABLE IF EXISTS `tb_unit`;
CREATE TABLE `tb_unit` (
  `id_unit` int(11) NOT NULL,
  `nama_unit` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_unit`
--

INSERT INTO `tb_unit` (`id_unit`, `nama_unit`) VALUES
(0, '-- Lainnya --'),
(2, 'Instalasi Farmasi'),
(3, 'Instalasi Gawat Darurat'),
(4, 'Instalasi Rawat Jalan'),
(5, 'Instalasi Rehabilitasi Psikososial'),
(6, 'Instalasi SIMRS'),
(7, 'Kesehatan Lingkungan (Kesling)'),
(8, 'Klinik Graha Atma (GA)'),
(10, 'Poli Psikologi'),
(11, 'Rekam Medik'),
(12, 'Ruang Garuda'),
(13, 'Ruang Gelatik'),
(14, 'Ruang Kasuari Atas'),
(15, 'Ruang Kasuari Bawah'),
(16, 'Ruang Keswara'),
(17, 'Ruang Merak'),
(18, 'Ruang Merpati'),
(19, 'Ruang Murai'),
(20, 'Ruang Napza'),
(21, 'Ruang Nuri'),
(22, 'Ruang Perkutut'),
(23, 'Ruang Rajawali'),
(24, 'Kesehatan Jiwa Masyarakat (KESWAMAS)'),
(25, 'Kedokteran');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

DROP TABLE IF EXISTS `tb_user`;
CREATE TABLE `tb_user` (
  `id_user` int(11) NOT NULL,
  `id_mou` int(11) NOT NULL,
  `id_institusi` int(11) NOT NULL,
  `username_user` text NOT NULL,
  `password_user` varchar(255) NOT NULL,
  `hash_password_user` text NOT NULL,
  `nama_user` text NOT NULL,
  `email_user` text NOT NULL,
  `level_user` int(2) NOT NULL COMMENT '1 admin, 2 ip, 3 pkd',
  `no_telp_user` text NOT NULL,
  `foto_user` text DEFAULT NULL,
  `terakhir_login_user` timestamp NULL DEFAULT NULL,
  `tgl_buat_user` text NOT NULL,
  `tgl_ubah_user` text DEFAULT NULL,
  `kode_aktivasi_user` text NOT NULL,
  `status_aktivasi_user` enum('T','Y') NOT NULL,
  `status_user` enum('T','Y') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `id_mou`, `id_institusi`, `username_user`, `password_user`, `hash_password_user`, `nama_user`, `email_user`, `level_user`, `no_telp_user`, `foto_user`, `terakhir_login_user`, `tgl_buat_user`, `tgl_ubah_user`, `kode_aktivasi_user`, `status_aktivasi_user`, `status_user`) VALUES
(1, 0, 0, 'admin', 'e1d5be1c7f2f456670de3d53c7b54f4a', '', 'ADMIN DIKLAT RS JIWA', 'admin@admin', 1, '08123145645', NULL, '2023-04-27 00:59:05', '2021-03-29', '2022-02-22', '', 'Y', 'Y'),
(2, 0, 87, 'praktikan', 'e10adc3949ba59abbe56e057f20f883e', '', 'Praktikan', 'praktikan@praktikan', 5, '022123456789', NULL, '2023-03-29 01:39:05', '2023-02-13', NULL, 'MjAyMzAyMTNfNGU0MTI1MzM0NDI1MzM0NF9yc2ppd2FqYWJhckBnbWFpbC5jb21fQWRtaW4gUlMgSml3YSI%3D', 'Y', 'Y'),
(3, 0, 87, 'rsjiwajabar@gmail.com', 'e1d5be1c7f2f456670de3d53c7b54f4a', 'MjAyMzAxMTFfM19mYWphci5yYWNobWF0LmhAZ21haWwuY29tX1JTSiI%3D', 'RSJ', 'fajar.rachmat.h@gmail.com', 2, '0', NULL, '2023-03-14 11:44:52', '2023-01-11', NULL, 'MjAyMzAxMTFfM19mYWphci5yYWNobWF0LmhAZ21haWwuY29tX1JTSiI%3D', 'Y', 'Y'),
(4, 0, 0, 'pembimbing', 'e10adc3949ba59abbe56e057f20f883e', '', 'Pembimbing', 'pembimbing@pembimbing', 4, '022123456789', NULL, '2023-03-29 02:34:14', '2023-03-02', NULL, '-', 'Y', 'Y'),
(34, 0, 0, 'adminpkd', 'e1d5be1c7f2f456670de3d53c7b54f4a', '', 'ADMIN PKD RS JIWA', 'adminpkd@admin', 3, '-', NULL, '2023-02-20 01:13:37', '2023-01-13', '2022-02-22', '', 'Y', 'Y'),
(35, 0, 50, 'skepmucis@gmail.com', 'bc5b622884fe801414cbc526f618b5f6', '', 'Elis Noviati, M.Kep.', 'skepmucis@gmail.com', 2, '081322447488', NULL, '2023-03-09 06:09:02', '2023-03-09', NULL, 'MjAyMzAzMDlfNGQ3YTU1MjUzMzQ0X3NrZXBtdWNpc0BnbWFpbC5jb21fRWxpcyBOb3ZpYXRpLCBNLktlcC4i', 'Y', 'Y'),
(36, 0, 89, 'tantan.hadiansyah78@gmail.com', '6745c96021b5144183dfa64387fc85c0', '', 'H. Tantan Hadiansyah, S.Kep., Ners., M.Kep', 'tantan.hadiansyah78@gmail.com', 2, '082240867327', NULL, '2023-03-16 12:42:08', '2023-03-09', NULL, 'MjAyMzAzMDlfNGQ3YTU5MjUzMzQ0X3RhbnRhbi5oYWRpYW5zeWFoNzhAZ21haWwuY29tX0guIFRhbnRhbiBIYWRpYW5zeWFoLCBTLktlcC4sIE5lcnMuLCBNLktlcCI%3D', 'Y', 'Y'),
(37, 0, 76, 'nia.restiana@umtas.ac.id', 'cb7ff8cddb3d8d7f9df923adfbb1d1aa', '', 'Nia Restiana', 'nia.restiana@umtas.ac.id', 2, '081322958323', NULL, '2023-03-14 00:57:53', '2023-03-09', NULL, 'MjAyMzAzMDlfNGQ3YTYzMjUzMzQ0X25pYS5yZXN0aWFuYUB1bXRhcy5hYy5pZF9OaWEgUmVzdGlhbmEi', 'T', 'Y'),
(38, 0, 90, 'ridwankustiawan755@gmail.com', 'cf5662f7c20d80811877e97887ffc0c3', '', 'Ridwan Kustiawan', 'ridwankustiawan755@gmail.com', 2, '089518067932', NULL, '2023-03-14 04:17:59', '2023-03-09', NULL, 'MjAyMzAzMDlfNGQ3YTY3MjUzMzQ0X3JpZHdhbmt1c3RpYXdhbjc1NUBnbWFpbC5jb21fUmlkd2FuIEt1c3RpYXdhbiI%3D', 'Y', 'Y'),
(39, 0, 90, 'ridwan.kustiawan@dosen.poltekkestasikmalaya.ac.id', 'cf5662f7c20d80811877e97887ffc0c3', '', 'Ridwan Kustiawan', 'ridwan.kustiawan@dosen.poltekkestasikmalaya.ac.id', 2, '089518067932', NULL, NULL, '2023-03-09', NULL, 'MjAyMzAzMDlfNGQ3YTZiMjUzMzQ0X3JpZHdhbi5rdXN0aWF3YW5AZG9zZW4ucG9sdGVra2VzdGFzaWttYWxheWEuYWMuaWRfUmlkd2FuIEt1c3RpYXdhbiI%3D', 'T', 'Y'),
(40, 0, 76, 'niarestiana96@gmail.com', 'ef8316d19f865e31c0dbd3b2db591704', '', 'Nia Restiana', 'niarestiana96@gmail.com', 2, '081322958323', NULL, '2023-03-09 16:18:16', '2023-03-09', NULL, 'MjAyMzAzMDlfNGU0NDQxMjUzMzQ0X25pYXJlc3RpYW5hOTZAZ21haWwuY29tX05pYSBSZXN0aWFuYSI%3D', 'T', 'Y'),
(41, 0, 65, 'hadiabdillah91@ummi.ac.id', '52a2d0952b13dc89c459edb6a60e2487', '', 'Hadi Abdillah', 'hadiabdillah91@ummi.ac.id', 2, '085861516959', NULL, '2023-03-27 03:04:09', '2023-03-10', NULL, 'MjAyMzAzMTBfNGU0NDQ1MjUzMzQ0X2hhZGlhYmRpbGxhaDkxQHVtbWkuYWMuaWRfSGFkaSBBYmRpbGxhaCI%3D', 'T', 'Y'),
(42, 0, 6, 'selvyaoktavia3@gmail.com', 'df838efe32666b5a9f9c353a8871d1df', 'MjAyMzAzMTBfNDJfc2Vsdnlhb2t0YXZpYTNAZ21haWwuY29tX0VuZGFoIFNhcndlbmRhaCBTLmtlcCBOZXJzIE0uLEtlcCI%3D', 'Endah Sarwendah S.kep Ners M.,Kep', 'selvyaoktavia3@gmail.com', 2, '081383571465', NULL, '2023-03-10 07:40:21', '2023-03-10', NULL, 'MjAyMzAzMTBfNGU0NDQ5MjUzMzQ0X3NlbHZ5YW9rdGF2aWEzQGdtYWlsLmNvbV9FbmRhaCBTYXJ3ZW5kYWggUy5rZXAgTmVycyBNLixLZXAi', 'Y', 'Y'),
(43, 0, 89, 'riskiregina24@gmail.com', '7dca9c2dbfe8ed850ba44910ba353e3d', '', 'Riski Regina ', 'riskiregina24@gmail.com', 2, '081383924739', NULL, '2023-03-10 04:16:55', '2023-03-10', NULL, 'MjAyMzAzMTBfNGU0NDRkMjUzMzQ0X3Jpc2tpcmVnaW5hMjRAZ21haWwuY29tX1Jpc2tpIFJlZ2luYSAi', 'T', 'Y'),
(44, 0, 6, 'selvyaoktavia8@gamil.com', '588e343066cf54ec3db5132231df7d68', '', 'Selvya Oktavia', 'selvyaoktavia8@gamil.com', 2, '081383571465', NULL, NULL, '2023-03-10', NULL, 'MjAyMzAzMTBfNGU0NDUxMjUzMzQ0X3NlbHZ5YW9rdGF2aWE4QGdhbWlsLmNvbV9TZWx2eWEgT2t0YXZpYSI%3D', 'T', 'Y'),
(45, 0, 89, 'riskiregina18@gmail.com', '5369b93efba782b1abb8c5cd703448ca', '', 'Riski Regina ', 'riskiregina18@gmail.com', 2, '081383924739', NULL, '2023-03-10 04:19:10', '2023-03-10', NULL, 'MjAyMzAzMTBfNGU0NDU1MjUzMzQ0X3Jpc2tpcmVnaW5hMThAZ21haWwuY29tX1Jpc2tpIFJlZ2luYSAi', 'Y', 'Y'),
(46, 0, 23, 'indra.maulana@unpad.ac.id', '25d55ad283aa400af464c76d713c07ad', '', 'Indra Maulana', 'indra.maulana@unpad.ac.id', 2, '081220039110', NULL, '2023-03-14 01:37:39', '2023-03-10', NULL, 'MjAyMzAzMTBfNGU0NDU5MjUzMzQ0X2luZHJhLm1hdWxhbmFAdW5wYWQuYWMuaWRfSW5kcmEgTWF1bGFuYSI%3D', 'Y', 'Y'),
(47, 0, 46, 'ners.ariap79@gmail.com', 'cf25092c96ee7d6df6620f8849503c17', '', 'Aria Pranatha ', 'ners.ariap79@gmail.com', 2, '081802396622', NULL, NULL, '2023-03-11', NULL, 'MjAyMzAzMTFfNGU0NDYzMjUzMzQ0X25lcnMuYXJpYXA3OUBnbWFpbC5jb21fQXJpYSBQcmFuYXRoYSAi', 'Y', 'Y'),
(48, 0, 55, 'karwatiwati626@gmail.com', '1f406f7ea9f67e2b813d3d2224bb07e0', '', 'Karwati.S.Kep.,Ners.,M.Kep', 'karwatiwati626@gmail.com', 2, '081320745577', NULL, '2023-03-18 08:24:25', '2023-03-13', NULL, 'MjAyMzAzMTNfNGU0NDY3MjUzMzQ0X2thcndhdGl3YXRpNjI2QGdtYWlsLmNvbV9LYXJ3YXRpLlMuS2VwLixOZXJzLixNLktlcCI%3D', 'Y', 'Y'),
(49, 0, 76, 'ners.umtas@gmail.com', '03668d1bdba7ca7ceebe47588a2ca5f1', '', 'Nia Restiana', 'ners.umtas@gmail.com', 2, '081322958323', NULL, '2023-03-14 06:14:17', '2023-03-14', NULL, 'MjAyMzAzMTRfNGU0NDZiMjUzMzQ0X25lcnMudW10YXNAZ21haWwuY29tX05pYSBSZXN0aWFuYSI%3D', 'Y', 'Y'),
(50, 0, 20, 'dea.102019019@civitas.ukrida.ac.id', '0744ec8e0b539ff995ecf231aba5394a', '', 'Dea Amelia Glorie', 'dea.102019019@civitas.ukrida.ac.id', 2, '082253381851', NULL, '2023-03-14 07:58:08', '2023-03-14', NULL, 'MjAyMzAzMTRfNGU1NDQxMjUzMzQ0X2RlYS4xMDIwMTkwMTlAY2l2aXRhcy51a3JpZGEuYWMuaWRfRGVhIEFtZWxpYSBHbG9yaWUi', 'Y', 'Y'),
(51, 0, 20, 'dr.shannet18@gmail.com', '40dacd8d47cdd23cd618c6ed8ff29360', '', 'Shania Audrianisa', 'dr.shannet18@gmail.com', 2, '087776450538', NULL, '2023-03-14 07:57:19', '2023-03-14', NULL, 'MjAyMzAzMTRfNGU1NDQ1MjUzMzQ0X2RyLnNoYW5uZXQxOEBnbWFpbC5jb21fU2hhbmlhIEF1ZHJpYW5pc2Ei', 'T', 'Y'),
(52, 0, 42, 'widawdwt@gmail.com', 'c63bfab8c7be4c8bc1bbf9da4ff76ca4', '', 'Widawati', 'widawdwt@gmail.com', 2, '081318671200', NULL, '2023-03-16 06:44:03', '2023-03-16', NULL, 'MjAyMzAzMTZfNGU1NDQ5MjUzMzQ0X3dpZGF3ZHd0QGdtYWlsLmNvbV9XaWRhd2F0aSI%3D', 'T', 'Y'),
(53, 0, 61, 'ners.fik@unai.edu', 'd88336652622c151fe341bfd5744f1c8', '', 'Denny Paul Ricky', 'ners.fik@unai.edu', 2, '08112280917', NULL, '2023-03-23 04:26:31', '2023-03-23', NULL, 'MjAyMzAzMjNfNGU1NDRkMjUzMzQ0X25lcnMuZmlrQHVuYWkuZWR1X0Rlbm55IFBhdWwgUmlja3ki', 'Y', 'Y'),
(54, 0, 61, 'd3.fik@unai.edu', 'ba7f7cf7c63024e98a399a68309a87df', '', 'Imanuel Sri Mei Wulandari ', 'd3.fik@unai.edu', 2, '081320273202', NULL, '2023-03-23 04:40:41', '2023-03-23', NULL, 'MjAyMzAzMjNfNGU1NDUxMjUzMzQ0X2QzLmZpa0B1bmFpLmVkdV9JbWFudWVsIFNyaSBNZWkgV3VsYW5kYXJpICI%3D', 'Y', 'Y'),
(55, 0, 19, 'lysndrtania@gmail.com', '603c7118c47358b6b672e25831b7c1cf', '', 'Tania Lysandra Sukarman', 'lysndrtania@gmail.com', 2, '081293119000', NULL, '2023-03-27 01:26:07', '2023-03-27', NULL, 'MjAyMzAzMjdfNGU1NDU1MjUzMzQ0X2x5c25kcnRhbmlhQGdtYWlsLmNvbV9UYW5pYSBMeXNhbmRyYSBTdWthcm1hbiI%3D', 'Y', 'Y'),
(56, 0, 19, 'pasaribuwillwp@gmail.com', '06b5ff6d78b161388a65be2841332d97', '', 'William Elias Pandapotan', 'pasaribuwillwp@gmail.com', 2, '087859796979', NULL, '2023-03-27 01:24:46', '2023-03-27', NULL, 'MjAyMzAzMjdfNGU1NDU5MjUzMzQ0X3Bhc2FyaWJ1d2lsbHdwQGdtYWlsLmNvbV9XaWxsaWFtIEVsaWFzIFBhbmRhcG90YW4i', 'Y', 'Y'),
(57, 0, 19, 'fayolasa16@gmail.com', 'ac738e976da163d80dc4df312787daa0', '', 'Fayola Sandricka Ahas', 'fayolasa16@gmail.com', 2, '082127646090', NULL, '2023-03-27 01:25:50', '2023-03-27', NULL, 'MjAyMzAzMjdfNGU1NDYzMjUzMzQ0X2ZheW9sYXNhMTZAZ21haWwuY29tX0ZheW9sYSBTYW5kcmlja2EgQWhhcyI%3D', 'Y', 'Y'),
(58, 0, 19, 'octaviena.zakaria@gmail.com', 'facfa79984c9ff9b32a4b23f76ebfec1', '', 'octaviena ', 'octaviena.zakaria@gmail.com', 2, '087738808218', NULL, '2023-03-27 01:25:15', '2023-03-27', NULL, 'MjAyMzAzMjdfNGU1NDY3MjUzMzQ0X29jdGF2aWVuYS56YWthcmlhQGdtYWlsLmNvbV9vY3RhdmllbmEgIg%3D%3D', 'Y', 'Y'),
(59, 0, 19, 'trinita.yos@gmail.com', 'd37f3ff8b5220a990be3909154e09d90', '', 'Trinita Yosephine', 'trinita.yos@gmail.com', 2, '082117498355', NULL, '2023-03-27 01:26:00', '2023-03-27', NULL, 'MjAyMzAzMjdfNGU1NDZiMjUzMzQ0X3RyaW5pdGEueW9zQGdtYWlsLmNvbV9UcmluaXRhIFlvc2VwaGluZSI%3D', 'Y', 'Y'),
(60, 0, 19, 'kasandraveronica5@gmail.com', 'dbf8653165b6590f7310c9bb5b8d4ea4', '', 'Kasandra indriani veronica', 'kasandraveronica5@gmail.com', 2, '081351985681', NULL, '2023-03-27 01:26:14', '2023-03-27', NULL, 'MjAyMzAzMjdfNGU2YTQxMjUzMzQ0X2thc2FuZHJhdmVyb25pY2E1QGdtYWlsLmNvbV9LYXNhbmRyYSBpbmRyaWFuaSB2ZXJvbmljYSI%3D', 'Y', 'Y'),
(61, 0, 13, 'baak.akperrse@gmail.com', '3e49c9f98f4cbff83929eb71ab3f1034', '', 'Widya Ningsih', 'baak.akperrse@gmail.com', 2, '083815201031', NULL, '2023-03-27 04:15:28', '2023-03-27', NULL, 'MjAyMzAzMjdfNGU2YTQ1MjUzMzQ0X2JhYWsuYWtwZXJyc2VAZ21haWwuY29tX1dpZHlhIE5pbmdzaWgi', 'T', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user_privileges`
--

DROP TABLE IF EXISTS `tb_user_privileges`;
CREATE TABLE `tb_user_privileges` (
  `id_user` int(11) NOT NULL,
  `c_kuota` enum('T','Y') NOT NULL,
  `r_kuota` enum('T','Y') NOT NULL,
  `u_kuota` enum('T','Y') NOT NULL,
  `d_kuota` enum('T','Y') NOT NULL,
  `c_akun` enum('T','Y') NOT NULL,
  `r_akun` enum('T','Y') NOT NULL,
  `u_akun` enum('T','Y') NOT NULL,
  `d_akun` enum('T','Y') NOT NULL,
  `c_praktik` enum('T','Y') NOT NULL,
  `r_praktik` enum('T','Y') NOT NULL,
  `u_praktik` enum('T','Y') NOT NULL,
  `d_praktik` enum('T','Y') NOT NULL,
  `c_praktikan` enum('T','Y') NOT NULL,
  `r_praktikan` enum('T','Y') NOT NULL,
  `u_praktikan` enum('T','Y') NOT NULL,
  `d_praktikan` enum('T','Y') NOT NULL,
  `c_praktik_mess` enum('T','Y') NOT NULL,
  `r_praktik_mess` enum('T','Y') NOT NULL,
  `u_praktik_mess` enum('T','Y') NOT NULL,
  `d_praktik_mess` enum('T','Y') NOT NULL,
  `c_praktik_pembimbing` enum('T','Y') NOT NULL,
  `r_praktik_pembimbing` enum('T','Y') NOT NULL,
  `u_praktik_pembimbing` enum('T','Y') NOT NULL,
  `d_praktik_pembimbing` enum('T','Y') NOT NULL,
  `c_praktik_tarif` enum('T','Y') NOT NULL,
  `r_praktik_tarif` enum('T','Y') NOT NULL,
  `u_praktik_tarif` enum('T','Y') NOT NULL,
  `d_praktik_tarif` enum('T','Y') NOT NULL,
  `c_praktik_bayar` enum('T','Y') NOT NULL,
  `r_praktik_bayar` enum('T','Y') NOT NULL,
  `u_praktik_bayar` enum('T','Y') NOT NULL,
  `d_praktik_bayar` enum('T','Y') NOT NULL,
  `c_narsum` enum('T','Y') NOT NULL,
  `r_narsum` enum('T','Y') NOT NULL,
  `u_narsum` enum('T','Y') NOT NULL,
  `d_narsum` enum('T','Y') NOT NULL,
  `c_daftar_pembimbing` enum('T','Y') NOT NULL,
  `r_daftar_pembimbing` enum('T','Y') NOT NULL,
  `u_daftar_pembimbing` enum('T','Y') NOT NULL,
  `d_daftar_pembimbing` enum('T','Y') NOT NULL,
  `c_praktik_nilai` enum('T','Y') NOT NULL,
  `r_praktik_nilai` enum('T','Y') NOT NULL,
  `u_praktik_nilai` enum('T','Y') NOT NULL,
  `d_praktik_nilai` enum('T','Y') NOT NULL,
  `c_arsip_praktik` enum('T','Y') NOT NULL,
  `r_arsip_praktik` enum('T','Y') NOT NULL,
  `u_arsip_praktik` enum('T','Y') NOT NULL,
  `d_arsip_praktik` enum('T','Y') NOT NULL,
  `c_pkd` enum('T','Y') NOT NULL,
  `r_pkd` enum('T','Y') NOT NULL,
  `u_pkd` enum('T','Y') NOT NULL,
  `d_pkd` enum('T','Y') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_user_privileges`
--

INSERT INTO `tb_user_privileges` (`id_user`, `c_kuota`, `r_kuota`, `u_kuota`, `d_kuota`, `c_akun`, `r_akun`, `u_akun`, `d_akun`, `c_praktik`, `r_praktik`, `u_praktik`, `d_praktik`, `c_praktikan`, `r_praktikan`, `u_praktikan`, `d_praktikan`, `c_praktik_mess`, `r_praktik_mess`, `u_praktik_mess`, `d_praktik_mess`, `c_praktik_pembimbing`, `r_praktik_pembimbing`, `u_praktik_pembimbing`, `d_praktik_pembimbing`, `c_praktik_tarif`, `r_praktik_tarif`, `u_praktik_tarif`, `d_praktik_tarif`, `c_praktik_bayar`, `r_praktik_bayar`, `u_praktik_bayar`, `d_praktik_bayar`, `c_narsum`, `r_narsum`, `u_narsum`, `d_narsum`, `c_daftar_pembimbing`, `r_daftar_pembimbing`, `u_daftar_pembimbing`, `d_daftar_pembimbing`, `c_praktik_nilai`, `r_praktik_nilai`, `u_praktik_nilai`, `d_praktik_nilai`, `c_arsip_praktik`, `r_arsip_praktik`, `u_arsip_praktik`, `d_arsip_praktik`, `c_pkd`, `r_pkd`, `u_pkd`, `d_pkd`) VALUES
(1, 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y'),
(2, 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', '', '', '', '', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T'),
(3, 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'Y', 'Y', 'T', 'T', 'Y', 'Y', 'Y', 'Y', 'T', 'Y', 'T', 'T', 'T', 'Y', 'T', 'T', 'T', 'T', 'T', 'T', 'Y', 'Y', 'Y', 'Y', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'Y', 'T', 'T', 'Y', 'Y', 'T', 'T', 'T', 'T', 'T', 'T'),
(34, 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'Y', 'Y', 'Y', 'Y'),
(35, 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'Y', 'Y', 'T', 'T', 'Y', 'Y', 'Y', 'Y', 'T', 'Y', 'T', 'T', 'T', 'Y', 'T', 'T', 'T', 'T', 'T', 'T', 'Y', 'Y', 'Y', 'Y', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'Y', 'T', 'T', 'Y', 'Y', 'T', 'T', 'T', 'T', 'T', 'T'),
(36, 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'Y', 'Y', 'T', 'T', 'Y', 'Y', 'Y', 'Y', 'T', 'Y', 'T', 'T', 'T', 'Y', 'T', 'T', 'T', 'T', 'T', 'T', 'Y', 'Y', 'Y', 'Y', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'Y', 'T', 'T', 'Y', 'Y', 'T', 'T', 'T', 'T', 'T', 'T'),
(37, 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T'),
(38, 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'Y', 'Y', 'T', 'T', 'Y', 'Y', 'Y', 'Y', 'T', 'Y', 'T', 'T', 'T', 'Y', 'T', 'T', 'T', 'T', 'T', 'T', 'Y', 'Y', 'Y', 'Y', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'Y', 'T', 'T', 'Y', 'Y', 'T', 'T', 'T', 'T', 'T', 'T'),
(39, 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T'),
(40, 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T'),
(41, 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T'),
(42, 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'Y', 'Y', 'T', 'T', 'Y', 'Y', 'Y', 'Y', 'T', 'Y', 'T', 'T', 'T', 'Y', 'T', 'T', 'T', 'T', 'T', 'T', 'Y', 'Y', 'Y', 'Y', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'Y', 'T', 'T', 'Y', 'Y', 'T', 'T', 'T', 'T', 'T', 'T'),
(43, 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T'),
(44, 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T'),
(45, 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'Y', 'Y', 'T', 'T', 'Y', 'Y', 'Y', 'Y', 'T', 'Y', 'T', 'T', 'T', 'Y', 'T', 'T', 'T', 'T', 'T', 'T', 'Y', 'Y', 'Y', 'Y', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'Y', 'T', 'T', 'Y', 'Y', 'T', 'T', 'T', 'T', 'T', 'T'),
(46, 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'Y', 'Y', 'T', 'T', 'Y', 'Y', 'Y', 'Y', 'T', 'Y', 'T', 'T', 'T', 'Y', 'T', 'T', 'T', 'T', 'T', 'T', 'Y', 'Y', 'Y', 'Y', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'Y', 'T', 'T', 'Y', 'Y', 'T', 'T', 'T', 'T', 'T', 'T'),
(47, 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'Y', 'Y', 'T', 'T', 'Y', 'Y', 'Y', 'Y', 'T', 'Y', 'T', 'T', 'T', 'Y', 'T', 'T', 'T', 'T', 'T', 'T', 'Y', 'Y', 'Y', 'Y', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'Y', 'T', 'T', 'Y', 'Y', 'T', 'T', 'T', 'T', 'T', 'T'),
(48, 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'Y', 'Y', 'T', 'T', 'Y', 'Y', 'Y', 'Y', 'T', 'Y', 'T', 'T', 'T', 'Y', 'T', 'T', 'T', 'T', 'T', 'T', 'Y', 'Y', 'Y', 'Y', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'Y', 'T', 'T', 'Y', 'Y', 'T', 'T', 'T', 'T', 'T', 'T'),
(49, 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'Y', 'Y', 'T', 'T', 'Y', 'Y', 'Y', 'Y', 'T', 'Y', 'T', 'T', 'T', 'Y', 'T', 'T', 'T', 'T', 'T', 'T', 'Y', 'Y', 'Y', 'Y', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'Y', 'T', 'T', 'Y', 'Y', 'T', 'T', 'T', 'T', 'T', 'T'),
(50, 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'Y', 'Y', 'T', 'T', 'Y', 'Y', 'Y', 'Y', 'T', 'Y', 'T', 'T', 'T', 'Y', 'T', 'T', 'T', 'T', 'T', 'T', 'Y', 'Y', 'Y', 'Y', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'Y', 'T', 'T', 'Y', 'Y', 'T', 'T', 'T', 'T', 'T', 'T'),
(51, 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T'),
(52, 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T'),
(53, 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'Y', 'Y', 'T', 'T', 'Y', 'Y', 'Y', 'Y', 'T', 'Y', 'T', 'T', 'T', 'Y', 'T', 'T', 'T', 'T', 'T', 'T', 'Y', 'Y', 'Y', 'Y', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'Y', 'T', 'T', 'Y', 'Y', 'T', 'T', 'T', 'T', 'T', 'T'),
(54, 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'Y', 'Y', 'T', 'T', 'Y', 'Y', 'Y', 'Y', 'T', 'Y', 'T', 'T', 'T', 'Y', 'T', 'T', 'T', 'T', 'T', 'T', 'Y', 'Y', 'Y', 'Y', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'Y', 'T', 'T', 'Y', 'Y', 'T', 'T', 'T', 'T', 'T', 'T'),
(55, 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'Y', 'Y', 'T', 'T', 'Y', 'Y', 'Y', 'Y', 'T', 'Y', 'T', 'T', 'T', 'Y', 'T', 'T', 'T', 'T', 'T', 'T', 'Y', 'Y', 'Y', 'Y', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'Y', 'T', 'T', 'Y', 'Y', 'T', 'T', 'T', 'T', 'T', 'T'),
(56, 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'Y', 'Y', 'T', 'T', 'Y', 'Y', 'Y', 'Y', 'T', 'Y', 'T', 'T', 'T', 'Y', 'T', 'T', 'T', 'T', 'T', 'T', 'Y', 'Y', 'Y', 'Y', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'Y', 'T', 'T', 'Y', 'Y', 'T', 'T', 'T', 'T', 'T', 'T'),
(57, 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'Y', 'Y', 'T', 'T', 'Y', 'Y', 'Y', 'Y', 'T', 'Y', 'T', 'T', 'T', 'Y', 'T', 'T', 'T', 'T', 'T', 'T', 'Y', 'Y', 'Y', 'Y', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'Y', 'T', 'T', 'Y', 'Y', 'T', 'T', 'T', 'T', 'T', 'T'),
(58, 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'Y', 'Y', 'T', 'T', 'Y', 'Y', 'Y', 'Y', 'T', 'Y', 'T', 'T', 'T', 'Y', 'T', 'T', 'T', 'T', 'T', 'T', 'Y', 'Y', 'Y', 'Y', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'Y', 'T', 'T', 'Y', 'Y', 'T', 'T', 'T', 'T', 'T', 'T'),
(59, 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'Y', 'Y', 'T', 'T', 'Y', 'Y', 'Y', 'Y', 'T', 'Y', 'T', 'T', 'T', 'Y', 'T', 'T', 'T', 'T', 'T', 'T', 'Y', 'Y', 'Y', 'Y', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'Y', 'T', 'T', 'Y', 'Y', 'T', 'T', 'T', 'T', 'T', 'T'),
(60, 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'Y', 'Y', 'T', 'T', 'Y', 'Y', 'Y', 'Y', 'T', 'Y', 'T', 'T', 'T', 'Y', 'T', 'T', 'T', 'T', 'T', 'T', 'Y', 'Y', 'Y', 'Y', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'Y', 'T', 'T', 'Y', 'Y', 'T', 'T', 'T', 'T', 'T', 'T'),
(61, 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T');

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

DROP TABLE IF EXISTS `test`;
CREATE TABLE `test` (
  `id` int(11) NOT NULL,
  `varchart` varchar(10) NOT NULL,
  `text` text NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `test`
--

INSERT INTO `test` (`id`, `varchart`, `text`, `date`) VALUES
(7, 'd1d12', '', '2022-03-05');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_akreditasi`
--
ALTER TABLE `tb_akreditasi`
  ADD PRIMARY KEY (`id_akreditasi`);

--
-- Indexes for table `tb_bayar`
--
ALTER TABLE `tb_bayar`
  ADD PRIMARY KEY (`id_bayar`);

--
-- Indexes for table `tb_institusi`
--
ALTER TABLE `tb_institusi`
  ADD PRIMARY KEY (`id_institusi`);

--
-- Indexes for table `tb_jenjang_pdd`
--
ALTER TABLE `tb_jenjang_pdd`
  ADD PRIMARY KEY (`id_jenjang_pdd`);

--
-- Indexes for table `tb_jurusan_pdd`
--
ALTER TABLE `tb_jurusan_pdd`
  ADD PRIMARY KEY (`id_jurusan_pdd`);

--
-- Indexes for table `tb_jurusan_pdd_jenis`
--
ALTER TABLE `tb_jurusan_pdd_jenis`
  ADD PRIMARY KEY (`id_jurusan_pdd_jenis`);

--
-- Indexes for table `tb_jurusan_pdd_jenjang`
--
ALTER TABLE `tb_jurusan_pdd_jenjang`
  ADD PRIMARY KEY (`id_jurusan_pdd_jenjang`);

--
-- Indexes for table `tb_jurusan_pdd_jenjang_profesi`
--
ALTER TABLE `tb_jurusan_pdd_jenjang_profesi`
  ADD PRIMARY KEY (`id_jurusan_pdd_jenjang`);

--
-- Indexes for table `tb_kep_nilai`
--
ALTER TABLE `tb_kep_nilai`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_kep_nilai_data`
--
ALTER TABLE `tb_kep_nilai_data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_kep_nil_dokaskep`
--
ALTER TABLE `tb_kep_nil_dokaskep`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_kep_nil_lap_pen`
--
ALTER TABLE `tb_kep_nil_lap_pen`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_kep_nil_sikapprilaku`
--
ALTER TABLE `tb_kep_nil_sikapprilaku`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_kep_nil_sptk`
--
ALTER TABLE `tb_kep_nil_sptk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_kep_nil_terakkel`
--
ALTER TABLE `tb_kep_nil_terakkel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_kerjasama`
--
ALTER TABLE `tb_kerjasama`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_kuota`
--
ALTER TABLE `tb_kuota`
  ADD PRIMARY KEY (`id_kuota`);

--
-- Indexes for table `tb_lapor`
--
ALTER TABLE `tb_lapor`
  ADD PRIMARY KEY (`id_lapor`);

--
-- Indexes for table `tb_logbook_kep_kompetensi`
--
ALTER TABLE `tb_logbook_kep_kompetensi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_logbook_kep_kompetensi_nama`
--
ALTER TABLE `tb_logbook_kep_kompetensi_nama`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_mess`
--
ALTER TABLE `tb_mess`
  ADD PRIMARY KEY (`id_mess`);

--
-- Indexes for table `tb_mess_pilih`
--
ALTER TABLE `tb_mess_pilih`
  ADD PRIMARY KEY (`id_mess_pilih`);

--
-- Indexes for table `tb_mess_tgl`
--
ALTER TABLE `tb_mess_tgl`
  ADD PRIMARY KEY (`id_mess_tgl`);

--
-- Indexes for table `tb_nilai_kep`
--
ALTER TABLE `tb_nilai_kep`
  ADD PRIMARY KEY (`id_nilai_kep`);

--
-- Indexes for table `tb_nilai_upload`
--
ALTER TABLE `tb_nilai_upload`
  ADD PRIMARY KEY (`id_nilai_upload`);

--
-- Indexes for table `tb_pembimbing`
--
ALTER TABLE `tb_pembimbing`
  ADD PRIMARY KEY (`id_pembimbing`);

--
-- Indexes for table `tb_pembimbing_jenis`
--
ALTER TABLE `tb_pembimbing_jenis`
  ADD PRIMARY KEY (`id_pembimbing_jenis`);

--
-- Indexes for table `tb_pembimbing_pilih`
--
ALTER TABLE `tb_pembimbing_pilih`
  ADD PRIMARY KEY (`id_pembimbing_pilih`);

--
-- Indexes for table `tb_pkd`
--
ALTER TABLE `tb_pkd`
  ADD PRIMARY KEY (`id_pkd`);

--
-- Indexes for table `tb_pkd_tarif`
--
ALTER TABLE `tb_pkd_tarif`
  ADD PRIMARY KEY (`id_pkd_tarif`);

--
-- Indexes for table `tb_praktik`
--
ALTER TABLE `tb_praktik`
  ADD PRIMARY KEY (`id_praktik`);

--
-- Indexes for table `tb_praktikan`
--
ALTER TABLE `tb_praktikan`
  ADD PRIMARY KEY (`id_praktikan`);

--
-- Indexes for table `tb_praktik_tgl`
--
ALTER TABLE `tb_praktik_tgl`
  ADD PRIMARY KEY (`id_praktik_tgl`);

--
-- Indexes for table `tb_profesi_pdd`
--
ALTER TABLE `tb_profesi_pdd`
  ADD PRIMARY KEY (`id_profesi_pdd`);

--
-- Indexes for table `tb_tarif`
--
ALTER TABLE `tb_tarif`
  ADD PRIMARY KEY (`id_tarif`);

--
-- Indexes for table `tb_tarif_jenis`
--
ALTER TABLE `tb_tarif_jenis`
  ADD PRIMARY KEY (`id_tarif_jenis`);

--
-- Indexes for table `tb_tarif_pilih`
--
ALTER TABLE `tb_tarif_pilih`
  ADD PRIMARY KEY (`id_tarif_pilih`);

--
-- Indexes for table `tb_tarif_satuan`
--
ALTER TABLE `tb_tarif_satuan`
  ADD PRIMARY KEY (`id_tarif_satuan`);

--
-- Indexes for table `tb_tempat`
--
ALTER TABLE `tb_tempat`
  ADD PRIMARY KEY (`id_tempat`);

--
-- Indexes for table `tb_tempat_pilih`
--
ALTER TABLE `tb_tempat_pilih`
  ADD PRIMARY KEY (`id_tempat_pilih`);

--
-- Indexes for table `tb_unit`
--
ALTER TABLE `tb_unit`
  ADD PRIMARY KEY (`id_unit`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `tb_user_privileges`
--
ALTER TABLE `tb_user_privileges`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `test`
--
ALTER TABLE `test`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_akreditasi`
--
ALTER TABLE `tb_akreditasi`
  MODIFY `id_akreditasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_bayar`
--
ALTER TABLE `tb_bayar`
  MODIFY `id_bayar` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_institusi`
--
ALTER TABLE `tb_institusi`
  MODIFY `id_institusi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT for table `tb_jenjang_pdd`
--
ALTER TABLE `tb_jenjang_pdd`
  MODIFY `id_jenjang_pdd` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tb_jurusan_pdd`
--
ALTER TABLE `tb_jurusan_pdd`
  MODIFY `id_jurusan_pdd` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tb_jurusan_pdd_jenis`
--
ALTER TABLE `tb_jurusan_pdd_jenis`
  MODIFY `id_jurusan_pdd_jenis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_jurusan_pdd_jenjang`
--
ALTER TABLE `tb_jurusan_pdd_jenjang`
  MODIFY `id_jurusan_pdd_jenjang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `tb_kep_nilai`
--
ALTER TABLE `tb_kep_nilai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `tb_kep_nilai_data`
--
ALTER TABLE `tb_kep_nilai_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_kep_nil_dokaskep`
--
ALTER TABLE `tb_kep_nil_dokaskep`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_kep_nil_lap_pen`
--
ALTER TABLE `tb_kep_nil_lap_pen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tb_kep_nil_sikapprilaku`
--
ALTER TABLE `tb_kep_nil_sikapprilaku`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_kep_nil_sptk`
--
ALTER TABLE `tb_kep_nil_sptk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_kep_nil_terakkel`
--
ALTER TABLE `tb_kep_nil_terakkel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_kerjasama`
--
ALTER TABLE `tb_kerjasama`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- AUTO_INCREMENT for table `tb_kuota`
--
ALTER TABLE `tb_kuota`
  MODIFY `id_kuota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tb_lapor`
--
ALTER TABLE `tb_lapor`
  MODIFY `id_lapor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_logbook_kep_kompetensi`
--
ALTER TABLE `tb_logbook_kep_kompetensi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tb_logbook_kep_kompetensi_nama`
--
ALTER TABLE `tb_logbook_kep_kompetensi_nama`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tb_mess`
--
ALTER TABLE `tb_mess`
  MODIFY `id_mess` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tb_mess_pilih`
--
ALTER TABLE `tb_mess_pilih`
  MODIFY `id_mess_pilih` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_mess_tgl`
--
ALTER TABLE `tb_mess_tgl`
  MODIFY `id_mess_tgl` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_nilai_kep`
--
ALTER TABLE `tb_nilai_kep`
  MODIFY `id_nilai_kep` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_nilai_upload`
--
ALTER TABLE `tb_nilai_upload`
  MODIFY `id_nilai_upload` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_pembimbing`
--
ALTER TABLE `tb_pembimbing`
  MODIFY `id_pembimbing` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `tb_pembimbing_jenis`
--
ALTER TABLE `tb_pembimbing_jenis`
  MODIFY `id_pembimbing_jenis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tb_pembimbing_pilih`
--
ALTER TABLE `tb_pembimbing_pilih`
  MODIFY `id_pembimbing_pilih` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_pkd`
--
ALTER TABLE `tb_pkd`
  MODIFY `id_pkd` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_pkd_tarif`
--
ALTER TABLE `tb_pkd_tarif`
  MODIFY `id_pkd_tarif` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_praktik`
--
ALTER TABLE `tb_praktik`
  MODIFY `id_praktik` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tb_praktikan`
--
ALTER TABLE `tb_praktikan`
  MODIFY `id_praktikan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=171;

--
-- AUTO_INCREMENT for table `tb_praktik_tgl`
--
ALTER TABLE `tb_praktik_tgl`
  MODIFY `id_praktik_tgl` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1034;

--
-- AUTO_INCREMENT for table `tb_profesi_pdd`
--
ALTER TABLE `tb_profesi_pdd`
  MODIFY `id_profesi_pdd` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_tarif`
--
ALTER TABLE `tb_tarif`
  MODIFY `id_tarif` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=137;

--
-- AUTO_INCREMENT for table `tb_tarif_jenis`
--
ALTER TABLE `tb_tarif_jenis`
  MODIFY `id_tarif_jenis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tb_tarif_pilih`
--
ALTER TABLE `tb_tarif_pilih`
  MODIFY `id_tarif_pilih` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=139;

--
-- AUTO_INCREMENT for table `tb_tarif_satuan`
--
ALTER TABLE `tb_tarif_satuan`
  MODIFY `id_tarif_satuan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tb_tempat`
--
ALTER TABLE `tb_tempat`
  MODIFY `id_tempat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tb_tempat_pilih`
--
ALTER TABLE `tb_tempat_pilih`
  MODIFY `id_tempat_pilih` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `test`
--
ALTER TABLE `test`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
