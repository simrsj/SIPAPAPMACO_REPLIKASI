-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 05, 2022 at 12:39 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.13

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

CREATE TABLE `tb_akreditasi` (
  `id_akreditasi` int(11) NOT NULL,
  `nama_akreditasi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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

CREATE TABLE `tb_bayar` (
  `id_bayar` int(11) NOT NULL,
  `id_mou` int(11) DEFAULT NULL,
  `id_praktik` int(11) NOT NULL,
  `kode_bayar` text NOT NULL,
  `atas_nama_bayar` text NOT NULL,
  `noRek_bayar` text NOT NULL,
  `melalui_bayar` text NOT NULL,
  `tgl_bayar` date NOT NULL,
  `tgl_input_bayar` date NOT NULL,
  `file_bayar` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_institusi`
--

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(55, NULL, NULL, 'STIKES SEBELAS APRIL SUMEDANG', '', '', '', NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', ''),
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
(87, '2022-05-11', NULL, 'RS JIWA PROVINSI JAWA BARAT', 'RSJ*', './_img/logo_institusi/87.png', 'Jl. Kolonel Maturi KM.7, Desa Jambudipa, Kec. Cisarua, Kab. Bandung Barat, 40551', '-- Lainnya --', '3000-01-01', './_file/akred/akred_87_2022-05-11.pdf', '', 'T', NULL, NULL, NULL, NULL, NULL, NULL, '', ''),
(88, NULL, NULL, 'UNIVERSITAS KOMPUTER INDONESIA', 'UNIKOM', './_img/logo_institusi/88.png', '', NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_jenjang_pdd`
--

CREATE TABLE `tb_jenjang_pdd` (
  `id_jenjang_pdd` int(11) NOT NULL,
  `nama_jenjang_pdd` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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

CREATE TABLE `tb_jurusan_pdd` (
  `id_jurusan_pdd` int(11) NOT NULL,
  `nama_jurusan_pdd` text NOT NULL,
  `akronim_jurusan_pdd` text NOT NULL,
  `id_jurusan_pdd_jenis` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_jurusan_pdd`
--

INSERT INTO `tb_jurusan_pdd` (`id_jurusan_pdd`, `nama_jurusan_pdd`, `akronim_jurusan_pdd`, `id_jurusan_pdd_jenis`) VALUES
(1, 'Kedokteran', '', 1),
(2, 'Keperawatan', '', 2),
(3, 'Psikologi', '', 3),
(4, 'Informasi Teknologi', 'IT', 4),
(5, 'Farmasi', '', 3),
(6, 'Pekerja Sosial', 'PEKSOS', 4),
(7, 'Kesehatan Lingkungan', 'KESLING', 3),
(8, 'Rekam Medis', 'RM', 3);

-- --------------------------------------------------------

--
-- Table structure for table `tb_jurusan_pdd_jenis`
--

CREATE TABLE `tb_jurusan_pdd_jenis` (
  `id_jurusan_pdd_jenis` int(11) NOT NULL,
  `nama_jurusan_pdd_jenis` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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

CREATE TABLE `tb_jurusan_pdd_jenjang` (
  `id_jurusan_pdd_jenjang` int(11) NOT NULL,
  `id_jurusan_pdd` int(11) NOT NULL,
  `id_jenjang_pdd` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
-- Table structure for table `tb_kuota`
--

CREATE TABLE `tb_kuota` (
  `id_kuota` int(11) NOT NULL,
  `id_jurusan_pdd` int(11) NOT NULL,
  `tgl_tambah_kuota` date DEFAULT NULL,
  `nama_kuota` text NOT NULL,
  `jumlah_kuota` int(11) NOT NULL,
  `ket_kuota` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_kuota`
--

INSERT INTO `tb_kuota` (`id_kuota`, `id_jurusan_pdd`, `tgl_tambah_kuota`, `nama_kuota`, `jumlah_kuota`, `ket_kuota`) VALUES
(1, 1, NULL, 'Kedokteran-Keperawatan (KED-KEP)', 250, '2 Jurusan digabungkan'),
(2, 5, NULL, 'Farmasi (FAR)', 21, '-'),
(3, 7, NULL, 'Kesehatan Lingkungan (KESLING)', 7, ''),
(4, 3, NULL, 'Psikologi (PSI)', 14, ''),
(5, 8, NULL, 'Rekam Medis (RM)', 14, ''),
(6, 4, NULL, 'Informasi Teknologi (IT)', 7, ''),
(7, 6, NULL, 'Pekerja Sosial (PEKSOS)', 7, ''),
(91, 2, NULL, 'Kedokteran-Keperawatan (KED-KEP)', 250, '2 Jurusan digabungkan');

-- --------------------------------------------------------

--
-- Table structure for table `tb_lapor`
--

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_lapor`
--

INSERT INTO `tb_lapor` (`id_lapor`, `judul_lapor`, `deskripsi_lapor`, `level_lapor`, `tgl_lapor`, `status_lapor`, `nama_lapor`, `link_lapor`, `file_lapor`) VALUES
(1, 'Data Institusi', 'Data Institusi berbeda saat pendaftaran', 'tinggi', '2022-01-02', 'PROSES', 'Ade Ihsan', '192.168.7.89/sm/?prk', './_file/lapor/lapor_1_2022-01-03.png'),
(3, 'Data tarif', 'Data tarif Tidak Sesuai jurusan', 'sedang', '2022-01-03', 'CEK', 'Rani Riffani', '192.168.7.88/sm/?trk&dtl=1', './_file/lapor/lapor_3_2022-01-03.png');

-- --------------------------------------------------------

--
-- Table structure for table `tb_mess`
--

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_mess`
--

INSERT INTO `tb_mess` (`id_mess`, `tgl_input_mess`, `tgl_ubah_mess`, `nama_mess`, `kapasitas_t_mess`, `alamat_mess`, `nama_pemilik_mess`, `telp_pemilik_mess`, `email_pemilik_mess`, `tarif_tanpa_makan_mess`, `tarif_dengan_makan_mess`, `kepemilikan_mess`, `id_tarif_satuan`, `id_tarif_jenis`, `fasilitas_mess`, `status_mess`) VALUES
(1, NULL, NULL, 'Mess RSJ 1 Lama', 20, 'Jl. Kolonel Maturi KM.7, Desa Jambudipa, Kec. Cisarua, Kab. Bandung Barat, 40551', 'RS Jiwa Provinsi Jawa Barat', '081321329101', '', 20000, 100000, 'dalam', 4, 7, 'Makan 3x Sehari', 'Y'),
(2, NULL, NULL, 'Mess RSJ 2 Baru', 92, 'Jl. Kolonel Maturi KM.7, Desa Jambudipa, Kec. Cisarua, Kab. Bandung Barat, 40551', 'RS Jiwa Provinsi Jawa Barat', '081321329101', '', 20000, 100000, 'dalam', 4, 7, '', 'Y'),
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_mess_pilih`
--

INSERT INTO `tb_mess_pilih` (`id_mess_pilih`, `id_praktik`, `id_mess`, `id_tarif_pilih`, `tgl_input_mess_pilih`, `tgl_ubah_mess_pilih`, `makan_mess_pilih`, `jumlah_hari_mess_pilih`, `total_tarif_mess_pilih`) VALUES
(5, 5, 1, 1, '2022-11-24', '2022-11-27', NULL, 6, 1440000),
(6, 1, 1, 2, '2022-11-29', NULL, NULL, 31, 3100000),
(7, 4, 2, 3, '2022-11-29', '2022-11-29', NULL, 2, 120000),
(8, 2, 1, 4, '2022-11-29', NULL, NULL, 31, 1240000);

-- --------------------------------------------------------

--
-- Table structure for table `tb_mess_tgl`
--

CREATE TABLE `tb_mess_tgl` (
  `id_mess_tgl` int(11) NOT NULL,
  `mess_tgl` date NOT NULL,
  `id_mess` int(11) NOT NULL,
  `id_praktik` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_mou`
--

CREATE TABLE `tb_mou` (
  `id_mou` int(11) NOT NULL,
  `id_institusi` text NOT NULL,
  `tgl_input_mou` date DEFAULT NULL,
  `tgl_ubah_mou` date DEFAULT NULL,
  `tgl_mulai_mou` date DEFAULT NULL,
  `tgl_selesai_mou` date DEFAULT NULL,
  `no_rsj_mou` text NOT NULL,
  `no_institusi_mou` text NOT NULL,
  `id_jurusan_pdd` int(11) NOT NULL,
  `id_profesi_pdd` int(11) NOT NULL,
  `id_jenjang_pdd` int(11) NOT NULL,
  `file_mou` text DEFAULT NULL,
  `file_pks` text DEFAULT NULL,
  `arsip_mou` enum('Y') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_mou`
--

INSERT INTO `tb_mou` (`id_mou`, `id_institusi`, `tgl_input_mou`, `tgl_ubah_mou`, `tgl_mulai_mou`, `tgl_selesai_mou`, `no_rsj_mou`, `no_institusi_mou`, `id_jurusan_pdd`, `id_profesi_pdd`, `id_jenjang_pdd`, `file_mou`, `file_pks`, `arsip_mou`) VALUES
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
(55, '55', NULL, NULL, '2015-02-12', '2018-02-11', '073/0954/RSJ', '022/D-STIK/UN/II/2015', 0, 0, 0, NULL, NULL, NULL),
(56, '56', NULL, NULL, '2014-01-01', '2016-12-31', '', '', 0, 0, 0, NULL, NULL, NULL),
(57, '57', NULL, NULL, '2015-01-26', '2018-01-25', '073/0428/RSJ', '?/STIKES-TT/I/2015', 0, 0, 0, NULL, NULL, NULL),
(58, '58', NULL, NULL, '2014-03-03', '2017-03-02', '', '', 0, 0, 0, NULL, NULL, NULL),
(59, '59', NULL, NULL, '2016-05-02', '2019-05-02', '073/7945/RSJ/2016', '168/STIKES.YSI/V/2016', 0, 0, 0, NULL, NULL, NULL),
(60, '60', NULL, NULL, '2020-12-21', '2023-12-21', '119/21223/RSJ', 'A-46/MoU/LPPM-STIKesYPIB/XII/2020', 0, 0, 0, NULL, NULL, NULL),
(61, '61', NULL, NULL, '2014-09-12', '2017-09-11', '-', '-', 0, 0, 0, NULL, NULL, NULL),
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
(88, '1', NULL, '2022-04-24', '2010-10-20', '2013-10-20', '-', '-', 0, 0, 0, './_file/mou-pks/mou_88_2022-04-24.pdf', './_file/mou-pks/pks_88_2022-04-24.pdf', NULL),
(89, '87', '2022-04-24', '2022-04-25', '2022-04-24', '2025-04-24', '2/2/RSJ', '1/1/RSJ', 0, 0, 0, './_file/mou-pks/mou_89_2022-04-25.pdf', './_file/mou-pks/pks_89_2022-04-25.pdf', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_nilai_kep`
--

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_nilai_upload`
--

CREATE TABLE `tb_nilai_upload` (
  `id_nilai_upload` int(11) NOT NULL,
  `id_pembimbing` int(11) NOT NULL,
  `id_unit` int(11) NOT NULL,
  `id_praktik` int(11) NOT NULL,
  `file_nilai_upload` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_pembimbing`
--

CREATE TABLE `tb_pembimbing` (
  `id_pembimbing` int(11) NOT NULL,
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_pembimbing`
--

INSERT INTO `tb_pembimbing` (`id_pembimbing`, `tgl_tambah_pembimbing`, `tgl_ubah_pembimbing`, `no_id_pembimbing`, `nama_pembimbing`, `id_pembimbing_jenis`, `id_jurusan_pdd`, `id_jenjang_pdd`, `id_profesi_pdd`, `kali_pembimbing`, `status_pembimbing`) VALUES
(1, NULL, NULL, '198302142015031001', 'dr. Ade Kurnia Surawijawa, Sp.KJ.', 9, 1, 9, 2, 0, 'Y'),
(2, NULL, NULL, '197707272006042026', 'dr. Dhian Indriasari, Sp.KJ.', 9, 1, 9, 2, 0, 'Y'),
(3, NULL, NULL, '198305162010012016', 'dr. Dini Indriany, Sp.KJ.', 9, 1, 9, 2, 0, 'Y'),
(4, NULL, NULL, '196312011990031004', 'dr. H. Encep Supriandi, Sp.KJ. M.Kes., M.KM.', 9, 1, 9, 2, 0, 'Y'),
(5, NULL, NULL, '196208081990011001', 'dr. H. Riza Putra, Sp.KJ.', 9, 1, 9, 2, 0, 'Y'),
(6, NULL, NULL, '198601052020122005', 'dr. Hilda Puspa Indah, Sp.KJ.', 9, 1, 9, 2, 0, 'Y'),
(7, NULL, NULL, '196608141991022004', 'dr. Hj. Elly Marliyani, Sp.KJ., M.K.M', 9, 1, 9, 2, 0, 'Y'),
(8, NULL, NULL, '196607132007012005', 'dr. Hj. Meutia Laksaminingrum, Sp.KJ.', 9, 1, 9, 2, 0, 'Y'),
(9, NULL, NULL, '196805271998032004', 'dr. Lenny Irawati Yohosua, Sp.KJ.', 9, 1, 9, 2, 0, 'Y'),
(10, NULL, NULL, '197507072005012006', 'dr. Lina Budiyanti, Sp.KJ. (K)', 9, 1, 9, 2, 0, 'Y'),
(11, NULL, NULL, '197506082006041013', 'dr. Yunyun Setiawan, Sp.KJ.', 9, 1, 9, 2, 0, 'Y'),
(12, NULL, NULL, '197902192011012001', 'dr. Indah KusumaDewi, Sp.KJ.', 9, 1, 9, 2, 0, 'Y'),
(13, NULL, NULL, '198302142015031001', 'Ade Kurnia Surawijaya, dr. Sp.KJ.', 8, 1, 9, 1, 0, 'Y'),
(14, NULL, NULL, '197707272006042026', 'Dhian Indriasari, dr. Sp.KJ.', 8, 1, 9, 1, 0, 'Y'),
(15, NULL, NULL, '202101228', 'Hasrini Rowawi, dr., Sp.KJ (K)., MHA', 8, 1, 9, 1, 0, 'Y'),
(16, NULL, NULL, '196805271998032004', 'Lenny Irawati Yohosua, dr. Sp.KJ.', 8, 1, 9, 1, 0, 'Y'),
(17, NULL, NULL, '197507072005012006', 'Lina Budiyanti, dr. Sp.KJ (K)', 8, 1, 9, 1, 0, 'Y'),
(18, NULL, NULL, '198601082010012013', 'Ema Marlina, S.Tr.T', 7, 8, 8, 0, 0, 'Y'),
(19, NULL, NULL, '198102122005012013', 'Yeni Susanti, Amd. RMIK', 7, 8, 6, 0, 0, 'Y'),
(20, NULL, NULL, '197105071997032005', 'Dra. Lismaniar, Psi., M.Psi', 6, 9, 10, 4, 0, 'Y'),
(21, NULL, NULL, '196508051995022002', 'Dra. Resmi Prasetyani, Psi', 6, 9, 10, 4, 0, 'Y'),
(22, NULL, NULL, '197308081999032005', 'Yuyum Rohmulyanawati, S.Sos, MPSSp', 5, 9, 10, 0, 0, 'Y'),
(23, NULL, NULL, '198805212011011003', 'Irfan Arief Sulistyawan, Amd', 3, 9, 6, 0, 0, 'Y'),
(24, NULL, '2022-11-28', '197301072005011007', 'Abdul Aziz, AMK', 4, 2, 6, 0, 0, 'Y'),
(25, NULL, NULL, '197812182006042017', 'Adah Saadah, S.Kep., Ners', 4, 2, 9, 5, 0, 'Y'),
(26, NULL, NULL, '197405121997032004', 'Ade Carnisem, S.Kep., Ners', 4, 2, 9, 5, 0, 'Y'),
(27, NULL, NULL, '196607161991032004', 'Hj. Ade Saromah, S.Kep., Ners', 4, 2, 9, 5, 0, 'Y'),
(28, NULL, NULL, '197211201991031001', 'Agus Krisno, AMK', 4, 2, 6, 0, 0, 'Y'),
(29, NULL, NULL, '198109282005011007', 'Agus Kusnandar, S.Kep., Ners', 4, 2, 9, 5, 0, 'Y'),
(30, NULL, NULL, '197503081997032002', 'Ai Sriyati, S.Kep., Ners', 4, 2, 9, 5, 0, 'Y'),
(31, NULL, NULL, '198110272006042014', 'Butet Berlina, S.Kep., Ners', 4, 2, 9, 5, 0, 'Y'),
(32, NULL, NULL, '197610012005011010', 'Dedi Nurhasan, S.Kep., Ners', 4, 2, 9, 5, 0, 'Y'),
(33, NULL, NULL, '196705161991031004', 'Dedi Suhaedi, AMK', 4, 2, 6, 0, 0, 'Y'),
(34, NULL, NULL, '196904071993032008', 'Dewi Shinta Maria, AMK', 4, 2, 6, 0, 0, 'Y'),
(35, NULL, NULL, '197507041999032005', 'Dian Ratnaningsih, S.Kep., Ners', 4, 2, 9, 5, 0, 'Y'),
(36, NULL, NULL, '197609212000032001', 'Elsie Rodini, AMK', 4, 2, 6, 0, 0, 'Y'),
(37, NULL, NULL, '196411011998032001', 'Eny Budiasih, S.Kep., Ners', 4, 2, 9, 5, 0, 'Y'),
(38, NULL, NULL, '196901062000122001', 'Eri Suciati, S.Kep., Ners', 4, 2, 9, 5, 0, 'Y'),
(39, NULL, NULL, '197901212005012013', 'Ester Suryani Tampubolon, S.Kep., Ners', 4, 2, 9, 5, 0, 'Y'),
(40, NULL, NULL, '197303291999032002', 'Ettie Hikmawati, S.Kep., Ners', 4, 2, 9, 5, 0, 'Y'),
(41, NULL, NULL, '197601311999031001', 'H. Dedi Rahmadi, S.Kep.Ners', 4, 2, 9, 5, 0, 'Y'),
(42, NULL, NULL, '197612242000031004', 'H. Moch. Jimi Dirgantara, S.Kep.Ners', 4, 2, 9, 5, 0, 'Y'),
(43, NULL, NULL, '197212271996031003', 'H. Zaenurohman, S.Kep.Ners', 4, 2, 9, 5, 0, 'Y'),
(44, NULL, NULL, '197911152000032004', 'Hj. Arimbi Nurwiyanti P, S.Kep.Ners', 4, 2, 9, 5, 0, 'Y'),
(45, NULL, NULL, '197909052006042016', 'Hj. Devie Fitriyani, S.Kep.Ners', 4, 2, 9, 5, 0, 'Y'),
(46, NULL, NULL, '197807042009022004', 'Hj. Icih Susanti, S.Kep.Ners', 4, 2, 9, 5, 0, 'Y'),
(47, NULL, NULL, '196812261996032001', 'Hj. Nenti Siti Kuraesin, S.Kep., Ners', 4, 2, 9, 5, 0, 'Y'),
(48, NULL, NULL, '197902112006042015', 'Kokom Komalasari, S.Kep., Ners', 4, 2, 9, 5, 0, 'Y'),
(49, NULL, NULL, '196607151990032013', 'Komaryati, S.Kep., Ners', 4, 2, 9, 5, 0, 'Y'),
(50, NULL, NULL, '198307172009022001', 'Neng Goniah, S.Kep., Ners', 4, 2, 9, 5, 0, 'Y'),
(51, NULL, NULL, '197608072005012005', 'Nenih Nuraenih, S.Kep., Ners', 4, 2, 9, 5, 0, 'Y'),
(52, NULL, NULL, '197011111996032003', 'Ni Luh Nyoman S Puspowati, S.Kep., Ners', 4, 2, 9, 5, 0, 'Y'),
(53, NULL, NULL, '197004221998032004', 'Nirna Julaeha, S.Kep., Ners', 4, 2, 9, 5, 0, 'Y'),
(54, NULL, NULL, '197911232005012017', 'Novita Sari, S.Kep., Ners', 4, 2, 9, 5, 0, 'Y'),
(55, NULL, NULL, '198010212005012011', 'Siti Romlah, S.Kep., Ners', 4, 2, 9, 5, 0, 'Y'),
(56, NULL, NULL, '196908311998032005', 'Sri Kurniyati, S.Kep., Ners', 4, 2, 9, 5, 0, 'Y'),
(57, NULL, NULL, '196805271992032004', 'Sri Yani, S.Kep., Ners', 4, 2, 9, 5, 0, 'Y'),
(58, NULL, NULL, '198103082005012006', 'Winda Ratna Wulan, S.Kep. Ners., M.Kep.,Sp.Kep.J  ', 4, 2, 10, 5, 0, 'Y'),
(59, NULL, NULL, '197707041997031004', 'Yulforman Rotua Manalu, S.Kep., Ners', 4, 2, 9, 5, 0, 'Y'),
(60, NULL, NULL, '196707151987032002', 'Yusi Yustiah, AMK', 4, 2, 6, 0, 0, 'Y'),
(61, NULL, NULL, '196712151990032007', 'Yuyun Yunara, S.Kep., Ners', 4, 2, 9, 5, 0, 'Y'),
(62, NULL, '2022-10-07', '199409102020121008', 'Rizki Egi Purnama, S.Pd', 2, 8, 8, 0, 0, 'Y'),
(63, NULL, NULL, '196409251992031006', 'Drs. Tavip Budiawan, Apt', 1, 9, 9, 9, 0, 'Y'),
(64, NULL, NULL, '198103252011012004', 'Ekaprasetyawati, S.Si, Apt', 1, 9, 9, 9, 0, 'Y'),
(65, NULL, NULL, '197801101999032002', 'Ice Laila Nur, S.Si., Apt., M.Farm', 1, 9, 10, 9, 0, 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pembimbing_jenis`
--

CREATE TABLE `tb_pembimbing_jenis` (
  `id_pembimbing_jenis` int(11) NOT NULL,
  `nama_pembimbing_jenis` text NOT NULL,
  `akronim_pembimbing_jenis` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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

CREATE TABLE `tb_pembimbing_pilih` (
  `id_pembimbing_pilih` int(11) NOT NULL,
  `id_praktik` int(11) NOT NULL,
  `id_pembimbing` int(11) NOT NULL,
  `id_unit` int(11) NOT NULL,
  `id_praktikan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_pembimbing_pilih`
--

INSERT INTO `tb_pembimbing_pilih` (`id_pembimbing_pilih`, `id_praktik`, `id_pembimbing`, `id_unit`, `id_praktikan`) VALUES
(10, 4, 29, 21, 37),
(11, 4, 45, 22, 38),
(12, 4, 56, 7, 39),
(13, 5, 2, 0, 28),
(14, 5, 14, 0, 27),
(15, 5, 14, 0, 33),
(16, 5, 2, 0, 25),
(17, 5, 15, 0, 29),
(18, 5, 13, 0, 30),
(19, 5, 9, 0, 32),
(20, 5, 6, 0, 36),
(21, 5, 14, 0, 26),
(22, 5, 4, 0, 35),
(23, 5, 3, 0, 31),
(24, 5, 3, 0, 34),
(25, 1, 53, 14, 40),
(26, 1, 57, 12, 41),
(27, 1, 35, 13, 44),
(28, 1, 38, 20, 42),
(29, 1, 38, 3, 43);

-- --------------------------------------------------------

--
-- Table structure for table `tb_praktik`
--

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
  `surat_praktik` text DEFAULT NULL,
  `data_praktik` text DEFAULT NULL,
  `nama_koordinator_praktik` text NOT NULL,
  `email_koordinator_praktik` text NOT NULL,
  `telp_koordinator_praktik` text NOT NULL,
  `status_praktik` enum('Y','ARSIP') NOT NULL COMMENT 'Status Aktif/Arsip Praktik',
  `status_mess_praktik` enum('T','Y') NOT NULL COMMENT 'stasus pakai mess ',
  `status_pembimbing_praktik` enum('T','Y') NOT NULL COMMENT 'status pembimbing praktikan',
  `status_tarif_praktik` enum('T','Y') NOT NULL COMMENT 'status  tarif praktik sudah dipilih/tidaknya',
  `status_bayar_praktik` enum('T','Y') NOT NULL COMMENT 'Status Pembayaran Praktik',
  `status_nilai_praktik` enum('T','Y') NOT NULL COMMENT 'status nilai yang uploadkan atau diinputkan',
  `makan_mess_praktik` enum('T','Y') DEFAULT NULL COMMENT 'status memakai makan mess (sementara tidak digunakan)',
  `materi_upip_praktik` text DEFAULT NULL,
  `materi_napza_praktik` text DEFAULT NULL,
  `fileInv_praktik` text DEFAULT NULL,
  `fileNilKep_praktik` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_praktik`
--

INSERT INTO `tb_praktik` (`id_praktik`, `id_user`, `id_mou`, `id_institusi`, `id_jurusan_pdd_jenis`, `id_jurusan_pdd`, `id_jenjang_pdd`, `id_profesi_pdd`, `nama_praktik`, `tgl_input_praktik`, `tgl_ubah_praktik`, `tgl_mulai_praktik`, `tgl_selesai_praktik`, `jumlah_praktik`, `no_surat_praktik`, `surat_praktik`, `data_praktik`, `nama_koordinator_praktik`, `email_koordinator_praktik`, `telp_koordinator_praktik`, `status_praktik`, `status_mess_praktik`, `status_pembimbing_praktik`, `status_tarif_praktik`, `status_bayar_praktik`, `status_nilai_praktik`, `makan_mess_praktik`, `materi_upip_praktik`, `materi_napza_praktik`, `fileInv_praktik`, `fileNilKep_praktik`) VALUES
(1, '1', 0, 85, 2, '2', '8', '0', 'Nisi aliquam beatae ', '2022-11-29', NULL, '2023-01-01', '2023-01-31', 5, 'Qui et sequi nostrum', NULL, NULL, 'Tempor quasi non sun', 'fato@mailinator.com', '100', 'Y', 'Y', 'T', 'T', 'T', 'T', NULL, NULL, NULL, NULL, NULL),
(2, '1', 0, 1, 2, '2', '9', '0', '123', '2022-11-29', NULL, '2023-01-01', '2023-01-31', 2, '12', NULL, NULL, 'ADMIN DIKLAT RS JIWA', 'admin@admin', '08123145645', 'Y', 'Y', 'T', 'T', 'T', 'T', NULL, NULL, NULL, NULL, NULL),
(3, '1', 0, 31, 2, '2', '9', '5', 'Kelompok', '2022-11-29', NULL, '2023-01-01', '2023-01-02', 2, '1', NULL, NULL, 'ADMIN DIKLAT RS JIWA', 'admin@admin', '08123145645', 'Y', 'T', 'T', 'T', 'T', 'T', NULL, NULL, NULL, NULL, NULL),
(4, '1', 0, 31, 2, '2', '8', '0', 'Kelompok 2', '2022-11-29', NULL, '2023-01-01', '2023-01-02', 3, '1', NULL, NULL, 'ADMIN DIKLAT RS JIWA', 'admin@admin', '08123145645', 'Y', 'Y', 'T', 'T', 'T', 'T', NULL, NULL, NULL, NULL, NULL),
(5, '1', 0, 1, 1, '1', '9', '1', 'asd', '2022-11-15', NULL, '2022-11-15', '2022-11-20', 12, '123', './_file/praktik/76b314b346ced2c79aa0d884fa42906c.pdf', NULL, 'ADMIN DIKLAT RS JIWA', 'admin@admin', '08123145645', 'Y', 'Y', 'T', 'T', 'T', 'T', NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_praktikan`
--

CREATE TABLE `tb_praktikan` (
  `id_praktikan` int(11) NOT NULL,
  `id_praktik` int(11) NOT NULL,
  `id_pembimbing_pilih` int(11) NOT NULL,
  `tgl_tambah_praktikan` date DEFAULT NULL,
  `tgl_ubah_praktikan` date DEFAULT NULL,
  `no_id_praktikan` text NOT NULL,
  `nama_praktikan` text NOT NULL,
  `tgl_lahir_praktikan` date NOT NULL,
  `telp_praktikan` text NOT NULL,
  `wa_praktikan` text NOT NULL,
  `email_praktikan` text NOT NULL,
  `alamat_praktikan` text NOT NULL,
  `status_praktikan` enum('Y','T') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_praktikan`
--

INSERT INTO `tb_praktikan` (`id_praktikan`, `id_praktik`, `id_pembimbing_pilih`, `tgl_tambah_praktikan`, `tgl_ubah_praktikan`, `no_id_praktikan`, `nama_praktikan`, `tgl_lahir_praktikan`, `telp_praktikan`, `wa_praktikan`, `email_praktikan`, `alamat_praktikan`, `status_praktikan`) VALUES
(25, 5, 0, '2022-11-28', NULL, 'Qui pariatur Deseru', 'Do ab et quidem aute', '1992-09-26', '73', '93', 'favizyxyg@mailinator.com', 'Voluptatum neque lib', 'Y'),
(26, 5, 0, '2022-11-28', NULL, 'Est pariatur Est a', 'Iure repudiandae quo', '2017-08-28', '87', '92', 'xuwoxit@mailinator.com', 'Itaque omnis vitae o', 'Y'),
(27, 5, 0, '2022-11-28', NULL, 'Aut quasi vero aliqu', 'Autem illo in quia v', '1998-10-14', '17', '13', 'vozy@mailinator.com', 'Laborum laboris reru', 'Y'),
(28, 5, 0, '2022-11-28', NULL, 'Laboris ex assumenda', 'Aut nisi obcaecati a', '1983-04-18', '43', '68', 'licepul@mailinator.com', 'Error quisquam do re', 'Y'),
(29, 5, 0, '2022-11-28', NULL, 'Voluptas odit et nec', 'In voluptate irure d', '2022-07-22', '23', '28', 'dasobase@mailinator.com', 'Sint reprehenderit ', 'Y'),
(30, 5, 0, '2022-11-28', NULL, 'Nisi consequatur co', 'Ipsum enim ut ut non', '2003-07-21', '30', '38', 'mojuq@mailinator.com', 'Harum veniam dolore', 'Y'),
(31, 5, 0, '2022-11-28', NULL, 'Omnis qui necessitat', 'Reiciendis obcaecati', '2003-07-04', '62', '87', 'dapiduwigo@mailinator.com', 'Ut enim eveniet ear', 'Y'),
(32, 5, 0, '2022-11-28', NULL, 'A ut omnis dignissim', 'Irure in molestiae r', '1991-09-26', '69', '43', 'piwihipuki@mailinator.com', 'Dignissimos in est ', 'Y'),
(33, 5, 0, '2022-11-28', NULL, 'Est sed id et provi', 'Commodo aut ut conse', '2020-01-19', '27', '77', 'waneqowot@mailinator.com', 'Et qui autem earum a', 'Y'),
(34, 5, 0, '2022-11-28', NULL, 'In ut dolorum nisi s', 'Rerum enim architect', '2008-08-24', '21', '37', 'dyhylidoju@mailinator.com', 'Sed et non nobis off', 'Y'),
(35, 5, 0, '2022-11-28', NULL, 'Qui necessitatibus r', 'Qui id nihil in vol', '2005-10-08', '44', '30', 'fakicuqyq@mailinator.com', 'Voluptatem est non i', 'Y'),
(36, 5, 0, '2022-11-28', NULL, 'Eos pariatur Nostru', 'Iste magna debitis v', '1991-08-19', '45', '49', 'lucopola@mailinator.com', 'Quis velit cumque es', 'Y'),
(37, 4, 0, '2022-11-28', NULL, 'Quo velit rerum qua', 'Ad nobis incidunt r', '1991-06-01', '4', '38', 'qytovagaxy@mailinator.com', 'Sunt possimus esse', 'Y'),
(38, 4, 0, '2022-11-28', NULL, 'Omnis veniam cupida', 'Dolore qui est esse ', '1971-03-18', '41', '82', 'tenewoxot@mailinator.com', 'Doloribus nihil accu', 'Y'),
(39, 4, 0, '2022-11-28', NULL, 'Et velit ipsam magni', 'Incididunt culpa pa', '2004-05-06', '26', '44', 'fegur@mailinator.com', 'Qui quia totam omnis', 'Y'),
(40, 1, 0, '2022-11-29', NULL, 'Deleniti id iure et ', 'Et nobis minus moles', '2002-08-03', '41', '20', 'dyzy@mailinator.com', 'Incidunt nesciunt ', 'Y'),
(41, 1, 0, '2022-11-29', NULL, 'Explicabo Non neces', 'Excepteur qui et nec', '2016-05-03', '41', '1', 'pagihyjan@mailinator.com', 'Est est velit eiusmo', 'Y'),
(42, 1, 0, '2022-11-29', NULL, 'Est sit hic quia pos', 'Sint inventore repre', '1982-12-25', '6', '17', 'fewuca@mailinator.com', 'In nesciunt consequ', 'Y'),
(43, 1, 0, '2022-11-29', NULL, 'Eius maxime repudian', 'Tempore voluptatem ', '1994-12-12', '14', '13', 'dolalijify@mailinator.com', 'Iste corrupti sit ', 'Y'),
(44, 1, 0, '2022-11-29', NULL, 'Officiis est dolore', 'Neque blanditiis ali', '2005-09-28', '91', '68', 'pivaqacan@mailinator.com', 'Ipsam impedit offic', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `tb_praktik_tgl`
--

CREATE TABLE `tb_praktik_tgl` (
  `id_praktik_tgl` int(11) NOT NULL,
  `id_praktik` int(11) NOT NULL,
  `praktik_tgl` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_praktik_tgl`
--

INSERT INTO `tb_praktik_tgl` (`id_praktik_tgl`, `id_praktik`, `praktik_tgl`) VALUES
(125, 5, '2022-11-15'),
(126, 5, '2022-11-16'),
(127, 5, '2022-11-17'),
(128, 5, '2022-11-18'),
(129, 5, '2022-11-19'),
(130, 5, '2022-11-20'),
(162, 0, '2023-01-01'),
(163, 0, '2023-01-02'),
(164, 0, '2023-01-03'),
(165, 0, '2023-01-04'),
(166, 0, '2023-01-05'),
(167, 0, '2023-01-06'),
(168, 0, '2023-01-07'),
(169, 0, '2023-01-08'),
(170, 0, '2023-01-09'),
(171, 0, '2023-01-10'),
(172, 0, '2023-01-11'),
(173, 0, '2023-01-12'),
(174, 0, '2023-01-13'),
(175, 0, '2023-01-14'),
(176, 0, '2023-01-15'),
(177, 0, '2023-01-16'),
(178, 0, '2023-01-17'),
(179, 0, '2023-01-18'),
(180, 0, '2023-01-19'),
(181, 0, '2023-01-20'),
(182, 0, '2023-01-21'),
(183, 0, '2023-01-22'),
(184, 0, '2023-01-23'),
(185, 0, '2023-01-24'),
(186, 0, '2023-01-25'),
(187, 0, '2023-01-26'),
(188, 0, '2023-01-27'),
(189, 0, '2023-01-28'),
(190, 0, '2023-01-29'),
(191, 0, '2023-01-30'),
(192, 0, '2023-01-31'),
(193, 0, '2023-01-01'),
(194, 0, '2023-01-02'),
(195, 0, '2023-01-03'),
(196, 0, '2023-01-04'),
(197, 0, '2023-01-05'),
(198, 0, '2023-01-06'),
(199, 0, '2023-01-07'),
(200, 0, '2023-01-08'),
(201, 0, '2023-01-09'),
(202, 0, '2023-01-10'),
(203, 0, '2023-01-11'),
(204, 0, '2023-01-12'),
(205, 0, '2023-01-13'),
(206, 0, '2023-01-14'),
(207, 0, '2023-01-15'),
(208, 0, '2023-01-16'),
(209, 0, '2023-01-17'),
(210, 0, '2023-01-18'),
(211, 0, '2023-01-19'),
(212, 0, '2023-01-20'),
(213, 0, '2023-01-21'),
(214, 0, '2023-01-22'),
(215, 0, '2023-01-23'),
(216, 0, '2023-01-24'),
(217, 0, '2023-01-25'),
(218, 0, '2023-01-26'),
(219, 0, '2023-01-27'),
(220, 0, '2023-01-28'),
(221, 0, '2023-01-29'),
(222, 0, '2023-01-30'),
(223, 0, '2023-01-31'),
(224, 0, '2023-01-01'),
(225, 0, '2023-01-02'),
(226, 0, '2023-01-01'),
(227, 0, '2023-01-02'),
(228, 0, '2023-01-01'),
(229, 0, '2023-01-02');

-- --------------------------------------------------------

--
-- Table structure for table `tb_profesi_pdd`
--

CREATE TABLE `tb_profesi_pdd` (
  `id_profesi_pdd` int(11) NOT NULL,
  `id_jurusan_pdd` int(11) NOT NULL,
  `nama_profesi_pdd` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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

CREATE TABLE `tb_tarif_jenis` (
  `id_tarif_jenis` int(11) NOT NULL,
  `nama_tarif_jenis` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_tarif_jenis`
--

INSERT INTO `tb_tarif_jenis` (`id_tarif_jenis`, `nama_tarif_jenis`) VALUES
(0, '-- Lainnya --'),
(1, 'Administrasi'),
(2, 'Barang Habis Pakai'),
(3, 'Overhead Operational'),
(4, 'Pembelajaran'),
(5, 'UAP'),
(6, 'Ujian'),
(7, 'Pemakaian Kekayaan Daerah'),
(8, 'Mess/Pemondokan');

-- --------------------------------------------------------

--
-- Table structure for table `tb_tarif_pilih`
--

CREATE TABLE `tb_tarif_pilih` (
  `id_tarif_pilih` int(11) NOT NULL,
  `id_praktik` int(11) DEFAULT NULL,
  `tgl_input_tarif_pilih` date DEFAULT NULL,
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_tarif_pilih`
--

INSERT INTO `tb_tarif_pilih` (`id_tarif_pilih`, `id_praktik`, `tgl_input_tarif_pilih`, `tgl_ubah_tarif_pilih`, `nama_jenis_tarif_pilih`, `nama_tarif_pilih`, `nominal_tarif_pilih`, `nama_satuan_tarif_pilih`, `frekuensi_tarif_pilih`, `kuantitas_tarif_pilih`, `jumlah_tarif_pilih`, `ujian_tarif_pilih`, `mess_tarif_pilih`, `status_tarif_pilih`) VALUES
(1, 5, '2022-11-24', '2022-11-27', 'Pemakaian Kekayaan Daerah', 'Mess RSJ 1 Lama', 20000, 'per-siswa / hari', 6, 12, 1440000, NULL, NULL, 'T'),
(2, 1, '2022-11-29', NULL, 'Pemakaian Kekayaan Daerah', 'Mess RSJ 1 Lama', 20000, 'per-siswa / hari', 31, 5, 3100000, NULL, NULL, 'T'),
(3, 4, '2022-11-29', '2022-11-29', 'Pemakaian Kekayaan Daerah', 'Mess RSJ 2 Baru', 20000, 'per-siswa / hari', 2, 3, 120000, NULL, NULL, 'T'),
(4, 2, '2022-11-29', NULL, 'Pemakaian Kekayaan Daerah', 'Mess RSJ 1 Lama', 20000, 'per-siswa / hari', 31, 2, 1240000, NULL, NULL, 'T');

-- --------------------------------------------------------

--
-- Table structure for table `tb_tarif_satuan`
--

CREATE TABLE `tb_tarif_satuan` (
  `id_tarif_satuan` int(11) NOT NULL,
  `nama_tarif_satuan` text NOT NULL,
  `ket_tarif_satuan` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(14, 'per-jam', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_tempat`
--

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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

CREATE TABLE `tb_tempat_pilih` (
  `id_tempat_pilih` int(11) NOT NULL,
  `id_tempat` int(11) NOT NULL,
  `id_praktik` int(11) NOT NULL,
  `frek_tempat_pilih` int(11) NOT NULL,
  `kuan_tempat_pilih` int(11) NOT NULL,
  `total_tarif_tempat_pilih` int(11) NOT NULL,
  `tgl_input_tempat_pilih` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_unit`
--

CREATE TABLE `tb_unit` (
  `id_unit` int(11) NOT NULL,
  `nama_unit` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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

CREATE TABLE `tb_user` (
  `id_user` int(11) NOT NULL,
  `id_mou` int(11) NOT NULL,
  `id_institusi` int(11) NOT NULL,
  `username_user` text NOT NULL,
  `password_user` varchar(255) NOT NULL,
  `nama_user` text NOT NULL,
  `email_user` text NOT NULL,
  `level_user` int(2) NOT NULL,
  `no_telp_user` text NOT NULL,
  `foto_user` text DEFAULT NULL,
  `terakhir_login_user` text DEFAULT NULL,
  `tgl_buat_user` text NOT NULL,
  `tgl_ubah_user` text DEFAULT NULL,
  `verifikasi_user` text DEFAULT NULL,
  `status_user` enum('T','Y') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `id_mou`, `id_institusi`, `username_user`, `password_user`, `nama_user`, `email_user`, `level_user`, `no_telp_user`, `foto_user`, `terakhir_login_user`, `tgl_buat_user`, `tgl_ubah_user`, `verifikasi_user`, `status_user`) VALUES
(1, 0, 0, 'admin', 'e1d5be1c7f2f456670de3d53c7b54f4a', 'ADMIN DIKLAT RS JIWA', 'admin@admin', 1, '08123145645', NULL, '2022-12-02 16:02:12', '2021-03-29', '2022-02-22', NULL, 'Y'),
(2, 0, 0, 'tehiluxu', 'f3ed11bbdb94fd9ebdefbaf646ab94d3', 'Et ducimus explicab', 'xufagybipy@mailinator.com', 3, '94', './_img/akun/2.jpeg', NULL, '2022-10-23 17:26:24', '2022-10-23 19:16:55', NULL, 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user_privileges`
--

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
  `c_narsum` enum('T','Y') NOT NULL,
  `r_narsum` enum('T','Y') NOT NULL,
  `u_narsum` enum('T','Y') NOT NULL,
  `d_narsum` enum('T','Y') NOT NULL,
  `c_daftar_pembimbing` enum('T','Y') NOT NULL,
  `r_daftar_pembimbing` enum('T','Y') NOT NULL,
  `u_daftar_pembimbing` enum('T','Y') NOT NULL,
  `d_daftar_pembimbing` enum('T','Y') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_user_privileges`
--

INSERT INTO `tb_user_privileges` (`id_user`, `c_kuota`, `r_kuota`, `u_kuota`, `d_kuota`, `c_akun`, `r_akun`, `u_akun`, `d_akun`, `c_praktik`, `r_praktik`, `u_praktik`, `d_praktik`, `c_praktikan`, `r_praktikan`, `u_praktikan`, `d_praktikan`, `c_praktik_mess`, `r_praktik_mess`, `u_praktik_mess`, `d_praktik_mess`, `c_praktik_pembimbing`, `r_praktik_pembimbing`, `u_praktik_pembimbing`, `d_praktik_pembimbing`, `c_praktik_tarif`, `r_praktik_tarif`, `u_praktik_tarif`, `d_praktik_tarif`, `c_narsum`, `r_narsum`, `u_narsum`, `d_narsum`, `c_daftar_pembimbing`, `r_daftar_pembimbing`, `u_daftar_pembimbing`, `d_daftar_pembimbing`) VALUES
(1, 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y'),
(2, 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T', 'T');

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

CREATE TABLE `test` (
  `id` int(11) NOT NULL,
  `varchart` varchar(10) NOT NULL,
  `text` text NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
-- Indexes for table `tb_mou`
--
ALTER TABLE `tb_mou`
  ADD PRIMARY KEY (`id_mou`);

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
  MODIFY `id_akreditasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tb_bayar`
--
ALTER TABLE `tb_bayar`
  MODIFY `id_bayar` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_jenjang_pdd`
--
ALTER TABLE `tb_jenjang_pdd`
  MODIFY `id_jenjang_pdd` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tb_jurusan_pdd`
--
ALTER TABLE `tb_jurusan_pdd`
  MODIFY `id_jurusan_pdd` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tb_jurusan_pdd_jenis`
--
ALTER TABLE `tb_jurusan_pdd_jenis`
  MODIFY `id_jurusan_pdd_jenis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_jurusan_pdd_jenjang`
--
ALTER TABLE `tb_jurusan_pdd_jenjang`
  MODIFY `id_jurusan_pdd_jenjang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `tb_kuota`
--
ALTER TABLE `tb_kuota`
  MODIFY `id_kuota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

--
-- AUTO_INCREMENT for table `tb_lapor`
--
ALTER TABLE `tb_lapor`
  MODIFY `id_lapor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tb_mess`
--
ALTER TABLE `tb_mess`
  MODIFY `id_mess` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tb_mess_pilih`
--
ALTER TABLE `tb_mess_pilih`
  MODIFY `id_mess_pilih` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tb_mess_tgl`
--
ALTER TABLE `tb_mess_tgl`
  MODIFY `id_mess_tgl` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_mou`
--
ALTER TABLE `tb_mou`
  MODIFY `id_mou` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=902;

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
-- AUTO_INCREMENT for table `tb_pembimbing_jenis`
--
ALTER TABLE `tb_pembimbing_jenis`
  MODIFY `id_pembimbing_jenis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tb_pembimbing_pilih`
--
ALTER TABLE `tb_pembimbing_pilih`
  MODIFY `id_pembimbing_pilih` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `tb_praktik`
--
ALTER TABLE `tb_praktik`
  MODIFY `id_praktik` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tb_praktikan`
--
ALTER TABLE `tb_praktikan`
  MODIFY `id_praktikan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `tb_praktik_tgl`
--
ALTER TABLE `tb_praktik_tgl`
  MODIFY `id_praktik_tgl` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=230;

--
-- AUTO_INCREMENT for table `tb_profesi_pdd`
--
ALTER TABLE `tb_profesi_pdd`
  MODIFY `id_profesi_pdd` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tb_tarif`
--
ALTER TABLE `tb_tarif`
  MODIFY `id_tarif` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=137;

--
-- AUTO_INCREMENT for table `tb_tarif_jenis`
--
ALTER TABLE `tb_tarif_jenis`
  MODIFY `id_tarif_jenis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tb_tarif_pilih`
--
ALTER TABLE `tb_tarif_pilih`
  MODIFY `id_tarif_pilih` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_tarif_satuan`
--
ALTER TABLE `tb_tarif_satuan`
  MODIFY `id_tarif_satuan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tb_tempat`
--
ALTER TABLE `tb_tempat`
  MODIFY `id_tempat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `tb_tempat_pilih`
--
ALTER TABLE `tb_tempat_pilih`
  MODIFY `id_tempat_pilih` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `test`
--
ALTER TABLE `test`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
