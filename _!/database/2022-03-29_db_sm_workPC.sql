-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 29, 2022 at 11:33 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

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
(1, '-- Lainnya --'),
(2, 'A'),
(3, 'B'),
(4, 'C');

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

--
-- Dumping data for table `tb_bayar`
--

INSERT INTO `tb_bayar` (`id_bayar`, `id_mou`, `id_praktik`, `kode_bayar`, `atas_nama_bayar`, `noRek_bayar`, `melalui_bayar`, `tgl_bayar`, `tgl_input_bayar`, `file_bayar`) VALUES
(1, NULL, 7, 'B7220326', 'Id qui ut sit irure', 'Aut nemo qui aliqua', 'Lorem et velit dolo', '1987-11-11', '2022-03-27', './_file/bayar/bayar_1_7_2022-03-27.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `tb_institusi`
--

CREATE TABLE `tb_institusi` (
  `id_institusi` int(11) NOT NULL,
  `nama_institusi` text NOT NULL,
  `akronim_institusi` text DEFAULT NULL,
  `logo_institusi` text DEFAULT NULL,
  `alamat_institusi` text DEFAULT NULL,
  `akred_institusi` text DEFAULT NULL,
  `tglAkhirAkred_institusi` date DEFAULT NULL,
  `fileAkred_institusi` text DEFAULT NULL,
  `ket_institusi` text NOT NULL,
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

INSERT INTO `tb_institusi` (`id_institusi`, `nama_institusi`, `akronim_institusi`, `logo_institusi`, `alamat_institusi`, `akred_institusi`, `tglAkhirAkred_institusi`, `fileAkred_institusi`, `ket_institusi`, `tempAkronim_institusi`, `tempLogo_institusi`, `tempAlamat_institusi`, `tempAkred_institusi`, `tempTglAkhirAkred_institusi`, `tempFileAkred_institusi`, `tempStatus_institusi`, `tempKet_institusi`) VALUES
(1, 'AKADEMI PEREKAM MEDIS DAN INFORMATIKA KESEHATAN BANDUNG', 'APIKES BDG', './_img/logo_institusi/1.png', '', NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, '', ''),
(2, 'AKPER AL-MA\'ARIF BATURAJA', '', '', '', NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, '', ''),
(3, 'AKPER BHAKTI KENCANA BANDUNG', '', '', '', NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, '', ''),
(4, 'AKPER BIDARA MUKTI GARUT', '', '', '', NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, '', ''),
(5, 'AKPER BUNTET PESANTREN CIREBON', '', '', '', NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, '', ''),
(6, 'AKPER DUSTIRA CIMAHI', '', '', '', NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, '', ''),
(7, 'AKPER PEMERINTAH KABUPATEN CIANJUR', '', '', '', NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, '', ''),
(8, 'AKPER KEBONJATI', '', '', '', NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, '', ''),
(9, 'AKPER LUWUK', '', '', '', NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, '', ''),
(10, 'AKPER PEMBINA PALEMBANG', '', '', '', NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, '', ''),
(11, 'AKPER PEMDA KOLAKA', '', '', '', NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, '', ''),
(12, 'AKPER PEMKAB LAHAT', '', '', '', NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, '', ''),
(13, 'AKPER RS. EFARINA PURWAKARTA', '', '', '', NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, '', ''),
(14, 'AKPER SAIFUDDIN ZUHRI INDRAMAYU', '', '', '', NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, '', ''),
(15, 'AKPER SAWERIGADING PEMDA LUWU RAYA PALOPO', '', '', '', NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, '', ''),
(16, 'AKPER SINTANG', '', '', '', NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, '', ''),
(17, 'AKPER TOLITOLI', '', '', '', NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, '', ''),
(18, 'AKPER YPDR JAKARTA', '', '', '', NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, '', ''),
(19, 'UNIVERSITAS KRISTEN MARANATHA', NULL, NULL, NULL, NULL, NULL, NULL, '', 'Soluta ad incidunt ', './_img/logo_institusi/temp/19.png', 'Dolor sint enim quia', 'C', '1979-10-28', './_file/akred/akred_19_2022-03-17.pdf', 'pengajuan', ''),
(20, 'UNIVERSITAS KRISTEN KRIDA WACANA', 'UKRIDA', './_img/logo_institusi/20.png', '', NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, '', ''),
(21, 'UNIVERSITAS ISLAM BANDUNG', 'UNISBA', './_img/logo_institusi/21.png', '', NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, '', ''),
(23, 'UNIVERSITAS PADJADJARAN', 'UNPAD', './_img/logo_institusi/23.png', '', NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, '', ''),
(25, 'UNIVERSITAS JENDERAL ACHMAD YANI', 'UNJANI', './_img/logo_institusi/25.png', '', NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, '', ''),
(26, 'POLTEKKES KEMENKES BANDUNG', '', '', '', NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, '', ''),
(27, 'POLTEKKES TNI AU CIUMBULEUIT BANDUNG', '', '', '', NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, '', ''),
(28, 'POLTEKKES BANTEN', '', '', '', NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, '', ''),
(29, 'POLTEKKES KEMENKES MAKASSAR', '', '', '', NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, '', ''),
(31, 'STIKES AISYIYAH BANDUNG', '', '', '', NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, '', ''),
(32, 'STIKES BANI SALEH', '', '', '', NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, '', ''),
(33, 'STIKES BHAKTI PERTIWI LUWU RAYA PALOPO', '', '', '', NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, '', ''),
(34, 'STIKES BINA PUTERA BANJAR', '', '', '', NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, '', ''),
(35, 'STIKES BORNEO TARAKAN', '', '', '', NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, '', ''),
(36, 'STIKES BUDILUHUR CIMAHI', '', '', '', NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, '', ''),
(37, 'STIKES CIREBON', '', '', '', NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, '', ''),
(38, 'STIKES DEHASEN BENGKULU', '', '', '', NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, '', ''),
(39, 'STIKES DHARMA HUSADA BANDUNG', '', '', '', NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, '', ''),
(40, 'STIKES FALETEHAN', '', '', '', NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, '', ''),
(41, 'STIKES FORT DE KOCK', '', '', '', NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, '', ''),
(42, 'STIKES IMMANUEL BANDUNG', '', '', '', NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, '', ''),
(43, 'STIKES JENDERAL AHMAD YANI', '', '', '', NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, '', ''),
(44, 'STIKES KARSA HUSADA GARUT', '', '', '', NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, '', ''),
(45, 'STIKES KOTA SUKABUMI', '', '', '', NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, '', ''),
(46, 'STIKES KUNINGAN', '', '', '', NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, '', ''),
(47, 'STIKES MAHARDIKA CIREBON', '', '', '', NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, '', ''),
(48, 'STIKES MEDIKA CIKARANG / IMDS', '', '', '', NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, '', ''),
(49, 'STIKES MITRA KENCANA TASIKMALAYA', '', '', '', NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, '', ''),
(50, 'STIKES MUHAMADIYAH CIAMIS', '', '', '', NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, '', ''),
(51, 'STIKES NAN TONGGA LUBUK ALUNG', '', '', '', NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, '', ''),
(52, 'STIKES PPNI JAWA BARAT', '', '', '', NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, '', ''),
(53, 'STIKES RAJAWALI', '', '', '', NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, '', ''),
(54, 'STIKES SANTO BORROMEUS', '', '', '', NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, '', ''),
(55, 'STIKES SEBELAS APRIL SUMEDANG', '', '', '', NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, '', ''),
(56, 'STIKES SYEDZA SAINTIKA PADANG', '', '', '', NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, '', ''),
(57, 'STIKES TANA TORAJA', '', '', '', NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, '', ''),
(58, 'STIKES YARSI BUKIT TINGGI', '', '', '', NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, '', ''),
(59, 'STIKES YARSI PONTIANAK', '', '', '', NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, '', ''),
(60, 'STIKES YPIB MAJALENGKA', '', '', '', NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, '', ''),
(61, 'UNIVERSITAS ADVENT INDONESIA', '', '', '', NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, '', ''),
(62, 'UNIVERSITAS BALE BANDUNG', '', '', '', NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, '', ''),
(63, 'UNIVERSITAS BINA SARANA INFORMATIKA', 'BSI', '', '', NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, '', ''),
(64, 'UNIVERSITAS GALUH CIAMIS', '', '', '', NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, '', ''),
(65, 'UNIVERSITAS MUHAMMADIYAH SUKABUMI', '', '', '', NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, '', ''),
(66, 'UNIVERSITAS NEGERI GORONTALO', '', '', '', NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, '', ''),
(68, 'UNIVERSITAS PENDIDIKAN INDONESIA', 'UPI', './_img/logo_institusi/68.png', '', NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, '', ''),
(69, 'UNIVERSITAS RESPATI INDONESIA', '', '', '', NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, '', ''),
(70, 'UNIVERSITAS SAMRATULANGI', '', '', '', NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, '', ''),
(71, 'UNIVERSITAS SULTAN AGENG TIRTAYASA', 'UNTIRTA', '', '', NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, '', ''),
(72, 'POLITEKNIK TEDC BANDUNG', '', '', '', NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, '', ''),
(73, 'UNIVERSITAS PELITA HARAPAN', '', '', '', NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, '', ''),
(74, 'POLTEKKES YAPKESBI SUKABUMI', '', '', '', NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, '', ''),
(75, 'AKPER YPIB MAJALENGKA', '', '', '', NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, '', ''),
(76, 'UNIVERSITAS MUHAMMADIYAH TASIKMALAYA', '', '', '', NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, '', ''),
(78, 'POLITEKNIK NEGERI SUBANG', 'POLSUB', './_img/logo_institusi/78.png', '', NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, '', ''),
(81, 'SEKOLAH TINGGI ILMU KESEHATAN INDONESIA MAJU', '', '', '', NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, '', ''),
(82, 'UNIVERSITAS BHAKTI KENCANA', 'UBK', './_img/logo_institusi/82.png', '', NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, '', ''),
(83, 'POLTEKKES KEMENKES JAYAPURA', '', '', '', NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, '', ''),
(84, 'POLITEKNIK NEGERI INDRAMAYU', '', '', '', NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, '', ''),
(85, 'UNIVERSITAS KRISTEN SATYA WACANA SALATIGA', '', '', '', NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, '', ''),
(87, 'RS JIWA PROVINSI JAWA BARAT', 'RS JIWA*', './_img/logo_institusi/87.png', '', NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, '', ''),
(88, 'UNIVERSITAS KOMPUTER INDONESIA', 'UNIKOM', './_img/logo_institusi/88.png', '', NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_jenis_mentor`
--

CREATE TABLE `tb_jenis_mentor` (
  `id_jenis_mentor` int(11) NOT NULL,
  `nama_jenis_mentor` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_jenis_mentor`
--

INSERT INTO `tb_jenis_mentor` (`id_jenis_mentor`, `nama_jenis_mentor`) VALUES
(1, 'CI'),
(2, 'CIL'),
(3, 'PPDS'),
(4, 'PSPD');

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
(0, '-- Lainnya --', '-- Lainnya --', 0),
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
-- Table structure for table `tb_jurusan_pdd_jenjang_profesi`
--

CREATE TABLE `tb_jurusan_pdd_jenjang_profesi` (
  `id_jurusan_pdd_jenjang` int(11) NOT NULL,
  `id_jurusan_pdd` int(11) NOT NULL,
  `id_jenjang_pdd` int(11) NOT NULL,
  `id_profesi_pdd` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
-- Table structure for table `tb_kuota`
--

CREATE TABLE `tb_kuota` (
  `id_kuota` int(11) NOT NULL,
  `nama_kuota` text NOT NULL,
  `jumlah_kuota` int(11) NOT NULL,
  `ket_kuota` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_kuota`
--

INSERT INTO `tb_kuota` (`id_kuota`, `nama_kuota`, `jumlah_kuota`, `ket_kuota`) VALUES
(1, 'Kedokteran-Keperawatan (KED-KEP)', 250, '2 Jurusan digabungkan'),
(2, 'Farmasi (FAR)', 21, '-'),
(3, 'Kesehatan Lingkungan (KESLING)', 7, ''),
(4, 'Psikologi (PSI)', 14, ''),
(5, 'Rekam Medis (RM)', 14, ''),
(6, 'Informasi Teknologi (IT)', 7, ''),
(7, 'Pekerja Sosial (PEKSOS)', 7, '');

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
  `nama_mess` text DEFAULT NULL,
  `kapasitas_t_mess` int(11) NOT NULL,
  `alamat_mess` text DEFAULT NULL,
  `nama_pemilik_mess` text DEFAULT NULL,
  `no_pemilik_mess` text DEFAULT NULL,
  `email_pemilik_mess` text DEFAULT NULL,
  `tarif_tanpa_makan_mess` int(11) NOT NULL,
  `tarif_dengan_makan_mess` int(11) NOT NULL,
  `kepemilikan_mess` text NOT NULL,
  `id_tarif_satuan` int(11) NOT NULL,
  `id_tarif_jenis` int(11) NOT NULL,
  `ket_mess` text DEFAULT NULL,
  `status_mess` enum('y','t') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_mess`
--

INSERT INTO `tb_mess` (`id_mess`, `nama_mess`, `kapasitas_t_mess`, `alamat_mess`, `nama_pemilik_mess`, `no_pemilik_mess`, `email_pemilik_mess`, `tarif_tanpa_makan_mess`, `tarif_dengan_makan_mess`, `kepemilikan_mess`, `id_tarif_satuan`, `id_tarif_jenis`, `ket_mess`, `status_mess`) VALUES
(1, 'Mess RSJ 1 Lama', 20, 'Jl. Kolonel Maturi KM.7, Desa Jambudipa, Kec. Cisarua, Kab. Bandung Barat, 40551', 'RS Jiwa Provinsi Jawa Barat', '081321329101', '', 20000, 100000, 'dalam', 4, 7, 'Makan 3x Sehari', 'y'),
(2, 'Mess RSJ 2 Baru', 92, 'Jl. Kolonel Maturi KM.7, Desa Jambudipa, Kec. Cisarua, Kab. Bandung Barat, 40551', 'RS Jiwa Provinsi Jawa Barat', '081321329101', '', 20000, 100000, 'dalam', 4, 7, '', 'y'),
(3, 'Asrama Rifa Corporate', 100, 'Kp. Panyandaan RT. 01 RW. 14 Desa Jambudipa Kecamatan Cisarua Kab. Bandung Barat', 'Ibu Ai', '081322629909', '', 20000, 80000, 'luar', 4, 7, 'Dengan Makan 3x Sehari', 'y'),
(4, 'Pondokan H. Ating', 100, 'Kp. Barukai Timur RT. 04 RW. 13 Desa Jambudipa Kecamatan Cisarua Kab. Bandung Barat', 'H. Ating / Hj. Siti Sutiah', '0', '', 20000, 80000, 'luar', 4, 7, '', 'y'),
(5, 'Wisma Anugrah Ibu Nanik', 70, 'Kp. Panyandaan RT. 01 RW. 14 Desa Jambudipa Kecamatan Cisarua Kab. Bandung Barat', 'Hj. Nanik Susiani', '081320719652', '', 15000, 70000, 'luar', 4, 7, '', 'y'),
(6, 'Pondokan dr. Hj. Meutia Laksminingrum', 0, '-', 'dr. Hj. Meutia Laksminingrum', '0', '', 0, 0, 'luar', 4, 7, '', 't'),
(7, 'Galuh Pakuan', 70, 'Kp. Panyandaan RT. 01 RW. 14 Desa Jambudipa Kecamatan Cisarua Kab. Bandung Barat', 'Oyo Suharya', '081320113399', '', 20000, 80000, 'luar', 4, 7, '', 'y'),
(8, 'Pondokan Tatang', 30, 'Kp. Panyandaan RT. 01 RW. 14 Desa Jambudipa Kecamatan Cisarua Kab. Bandung Barat', 'Tatang', '089531804825', '', 20000, 80000, 'luar', 4, 7, '', 'y');

-- --------------------------------------------------------

--
-- Table structure for table `tb_mess_pilih`
--

CREATE TABLE `tb_mess_pilih` (
  `id_mess_pilih` int(11) NOT NULL,
  `id_praktik` int(11) NOT NULL,
  `id_mess` int(11) NOT NULL,
  `tgl_input_mess_pilih` date DEFAULT NULL,
  `makan_mess_pilih` enum('y','t') NOT NULL,
  `jumlah_hari_mess_pilih` int(11) NOT NULL,
  `total_tarif_mess_pilih` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_mess_pilih`
--

INSERT INTO `tb_mess_pilih` (`id_mess_pilih`, `id_praktik`, `id_mess`, `tgl_input_mess_pilih`, `makan_mess_pilih`, `jumlah_hari_mess_pilih`, `total_tarif_mess_pilih`) VALUES
(1, 3, 3, '2022-03-24', 'y', 2, 1120000),
(2, 5, 2, '2022-03-25', 't', 8, 4960000),
(3, 6, 1, '2022-03-25', 'y', 33, 23100000),
(4, 7, 1, '2022-03-26', 'y', 4, 2800000);

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
  `tgl_mulai_mou` date DEFAULT NULL,
  `tgl_selesai_mou` date DEFAULT NULL,
  `no_rsj_mou` text NOT NULL,
  `no_institusi_mou` text NOT NULL,
  `id_jurusan_pdd` int(11) NOT NULL,
  `id_profesi_pdd` int(11) NOT NULL,
  `id_jenjang_pdd` int(11) NOT NULL,
  `id_akreditasi` int(11) NOT NULL,
  `file_mou` text DEFAULT NULL,
  `ket_mou` enum('belum pengajuan','proses pengajuan baru','proses pengajuan perpanjang','aktif') DEFAULT NULL,
  `status_mou` enum('Y','T') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_mou`
--

INSERT INTO `tb_mou` (`id_mou`, `id_institusi`, `tgl_mulai_mou`, `tgl_selesai_mou`, `no_rsj_mou`, `no_institusi_mou`, `id_jurusan_pdd`, `id_profesi_pdd`, `id_jenjang_pdd`, `id_akreditasi`, `file_mou`, `ket_mou`, `status_mou`) VALUES
(1, '87', '2022-01-05', '2023-08-18', '-', '-', 0, 0, 0, 0, NULL, NULL, ''),
(2, '2', '2014-02-13', '2022-01-05', '- ', '-', 0, 0, 0, 0, NULL, '', ''),
(3, '3', '2018-08-20', '2021-08-19', '119/14858/RSJ', '036/AKP/BK-A/VIII/2018', 0, 0, 0, 0, NULL, '', ''),
(4, '4', '2017-12-22', '2020-12-21', '119/19834/RSJ', '355/PKS/AKBM/XII/2017', 0, 0, 0, 0, NULL, '', ''),
(5, '5', '2019-06-19', '2022-06-18', '073/10582/RSJ', 'B. 167/AKPER BPC/VI/2019', 0, 0, 0, 0, NULL, '', ''),
(6, '6', '2018-07-06', '2021-07-05', '119/11581/RSJ', 'PKS/008/AKPER RSD/VII/2018', 0, 0, 0, 0, NULL, '', ''),
(7, '7', '2018-11-12', '2021-11-11', '119/20549A/RSJ', '420/526/AKPER/2018', 0, 0, 0, 0, NULL, '', ''),
(8, '8', '2015-01-02', '2018-01-01', '-', 'YK/AKTI/PKS/01/01/2015', 0, 0, 0, 0, NULL, '', ''),
(9, '9', '2019-02-06', '2022-02-05', '119/2418/RSJ', '032/AL.A/SKS.01/II/2019', 0, 0, 0, 0, NULL, '', ''),
(10, '10', '2013-06-12', '2016-06-11', '-', '-', 0, 0, 0, 0, NULL, '', ''),
(11, '11', '2014-07-17', '2017-07-16', '-', '-', 0, 0, 0, 0, NULL, '', ''),
(12, '12', '2014-01-21', '2017-01-20', '-', '-', 0, 0, 0, 0, NULL, '', ''),
(13, '13', '2014-03-28', '2017-03-27', '-', '-', 0, 0, 0, 0, NULL, '', ''),
(14, '14', '2018-09-12', '2021-09-11', '119/16344/RSJ', '007 KS/AKSARI/IX/2018', 0, 0, 0, 0, NULL, '', ''),
(15, '15', '2014-05-14', '2017-05-13', '-', '-', 0, 0, 0, 0, NULL, '', ''),
(16, '16', '2011-06-13', '2014-06-12', '-', '-', 0, 0, 0, 0, NULL, '', ''),
(17, '17', '2014-01-01', '2016-12-31', '-', '-', 0, 0, 0, 0, NULL, '', ''),
(18, '18', '2014-10-21', '2017-10-20', '-', '-', 0, 0, 0, 0, NULL, '', ''),
(19, '19', '2019-08-01', '2022-07-31', '119/12968/RSJ', '087/DIR/PKS-RSI/VIII/2019\nDan\n038/PKS/DN/FUKM/VIII/2019', 0, 0, 0, 0, NULL, '', ''),
(20, '20', '2019-05-29', '2022-05-28', '119/1458/RSJ', '551A/UKKW/FK/D/V/2019\nDan\n173/072-26/2019', 0, 0, 0, 0, NULL, '', ''),
(21, '21', '2019-09-17', '2022-09-16', '119/15675/RSJ', '445/1318/UHP-RS Ihsan\nDan\n108/Dek/FK/IX/2019', 0, 0, 0, 0, NULL, '', ''),
(22, '22', '2015-10-29', '2018-10-28', '07313324/RSJ/2015', '005/KS-FK UNJANI/X/2015', 0, 0, 0, 0, NULL, '', ''),
(23, '23', '2020-07-01', '2023-07-01', '119/10058/RSJ', 'HK.03.01/X.4.2.1/14120/2020\ndan 677/UN6.C/PKS/2020', 0, 0, 0, 0, NULL, '', ''),
(24, '24', '2021-12-06', '2024-12-05', '119/16520/RSJ', '1358/UN6.L/PKS/2021', 2, 2, 10, 1, NULL, '', ''),
(25, '25', '2014-03-10', '2017-03-09', '-', '-', 0, 0, 0, 0, NULL, '', ''),
(26, '26', '2018-11-19', '2021-11-18', '119/209634/RSJ', 'HK.05.01/1.6/5004/2018', 0, 0, 0, 0, NULL, '', ''),
(27, '27', '2020-01-08', '2023-01-07', '075/0409/RSJ/I/2020', '016/POLTEKKES/I/2020', 0, 0, 0, 0, NULL, '', ''),
(28, '28', '2012-06-04', '2015-06-04', '-', '-', 0, 0, 0, 0, NULL, '', ''),
(29, '29', '2014-12-12', '2017-12-11', '-', '-', 0, 0, 0, 0, NULL, '', ''),
(30, '30', '2014-09-26', '2017-09-25', '-', '-', 0, 0, 0, 0, NULL, '', ''),
(31, '31', '2019-04-08', '2022-04-07', '073/6519/RSJ', '808/MOU.02/STIKES-AB/IV/2019', 0, 0, 0, 0, NULL, '', ''),
(32, '32', '2014-01-30', '2017-01-29', '-', '-', 0, 0, 0, 0, NULL, '', ''),
(33, '33', '2012-09-07', '2015-09-07', '-', '-', 0, 0, 0, 0, NULL, '', ''),
(34, '34', '2011-07-26', '2014-07-25', '-', '-', 0, 0, 0, 0, NULL, '', ''),
(35, '35', '2012-05-03', '2015-05-03', '-', '-', 0, 0, 0, 0, NULL, '', ''),
(36, '36', '2018-07-03', '2021-07-02', '073/11261/RSJ', '505/D/BAHUK-STIKES/VII/2018', 0, 0, 0, 0, NULL, '', ''),
(37, '37', '2020-11-02', '2023-11-02', '073/0090/RSJ', '672/B/STIKESCRB/I/2018', 0, 0, 0, 0, NULL, '', ''),
(38, '38', '2014-01-01', '2016-12-31', '-', '-', 0, 0, 0, 0, NULL, '', ''),
(39, '39', '2018-07-23', '2021-07-22', '119/12949/RSJ', '120/SDHB/PKS/TU/VII/2018', 0, 0, 0, 0, NULL, '', ''),
(40, '40', '2018-07-13', '2021-07-12', '073/12321/RSJ', '810/STIKES-FA/MOU/VII/2018', 0, 0, 0, 0, NULL, '', ''),
(41, '41', '2018-09-29', '2021-09-28', '119/17531/RSJ', '1138/K/STIKES.DK/IX/2018', 0, 0, 0, 0, NULL, '', ''),
(42, '42', '2019-10-29', '2022-10-28', '073/18015/RSJ/X/2019', '270/STIKI/WK.III/X/2019', 0, 0, 0, 0, NULL, '', ''),
(43, '43', '2019-03-26', '2022-03-25', '075/4422/RSJ', 'PKS/018/STIKES/III/2019', 0, 0, 0, 0, NULL, '', ''),
(44, '44', '2018-04-30', '2021-04-29', '-', '0324/STIKES-KHG-MOU-IV/2018', 0, 0, 0, 0, NULL, '', ''),
(45, '45', '2020-12-01', '2023-12-01', '073/19852/RSJ/XII/2020', '67/HO.00.03/TU-STIKESMI/XII/2020', 0, 0, 0, 0, NULL, '', ''),
(46, '46', '2019-04-15', '2022-04-14', '073/8115/RSJ', 'B.010/STIKKU/MoU/IV/2019', 0, 0, 0, 0, NULL, '', ''),
(47, '47', '2011-03-21', '2014-03-20', '-', '-', 0, 0, 0, 0, NULL, '', ''),
(48, '48', '2014-01-01', '2016-12-31', '-', '-', 0, 0, 0, 0, NULL, '', ''),
(49, '49', '2019-01-04', '2022-01-03', '075/0239/RSJ', '057/STIKES-MK/MOU/I/2019', 0, 0, 0, 0, NULL, '', ''),
(50, '50', '2019-12-14', '2022-12-13', '073/DIKLIT-5632/III/2016', '028/III.3,AU/B/2016', 0, 0, 0, 0, NULL, '', ''),
(51, '51', '2015-04-06', '2018-04-05', '073/1965/TSJ', 'DL.02.02.1965.04.2015', 0, 0, 0, 0, NULL, '', ''),
(52, '52', '2018-09-14', '2021-09-13', '119/16549/RSJ', 'III/884.1/STIKEP/PPNI/JBR/IX/2018', 0, 0, 0, 0, NULL, '', ''),
(53, '53', '2020-06-26', '2023-06-26', '119/9816/RSJ', 'PKS.032/IKR-I/R/VI/2020', 0, 0, 0, 0, NULL, '', ''),
(54, '54', '2020-12-15', '2023-12-15', '073/20903/RSJ', '017/STIKes-SB/SP-KS/XII/2020', 0, 0, 0, 0, NULL, '', ''),
(55, '55', '2015-02-12', '2018-02-11', '073/0954/RSJ', '022/D-STIK/UN/II/2015', 0, 0, 0, 0, NULL, '', ''),
(56, '56', '2014-01-01', '2016-12-31', '', '', 0, 0, 0, 0, NULL, '', ''),
(57, '57', '2015-01-26', '2018-01-25', '073/0428/RSJ', '?/STIKES-TT/I/2015', 0, 0, 0, 0, NULL, '', ''),
(58, '58', '2014-03-03', '2017-03-02', '', '', 0, 0, 0, 0, NULL, '', ''),
(59, '59', '2016-05-02', '2019-05-02', '073/7945/RSJ/2016', '168/STIKES.YSI/V/2016', 0, 0, 0, 0, NULL, '', ''),
(60, '60', '2020-12-21', '2023-12-21', '119/21223/RSJ', 'A-46/MoU/LPPM-STIKesYPIB/XII/2020', 0, 0, 0, 0, NULL, '', ''),
(61, '61', '2014-09-12', '2017-09-11', '-', '-', 0, 0, 0, 0, NULL, '', ''),
(62, '62', '2018-11-26', '2021-11-25', '119/20217A/RSJ', '06/FIKES/UNIBA/01/XI/2018', 0, 0, 0, 0, NULL, '', ''),
(63, '63', '2012-02-15', '2015-02-14', '-', '-', 0, 0, 0, 0, NULL, '', ''),
(64, '64', '2018-09-12', '2021-09-11', '119/16531/RSJ', '13/4123/AK/KS/R/IX/2018', 0, 0, 0, 0, NULL, '', ''),
(65, '65', '2019-02-20', '2022-02-19', '119/3413/RSJ', '128/I.0/F/2019', 0, 0, 0, 0, NULL, '', ''),
(66, '66', '2018-10-15', '2021-10-14', '119/1864/RSJ', '1767/UN47.B7.5.5/F/2018', 0, 0, 0, 0, NULL, '', ''),
(67, '67', '2020-11-12', '2023-11-12', '445/18685/RSJ', '1621/UN40.C2/HK/2020', 0, 0, 0, 0, NULL, '', ''),
(68, '68', '2019-01-21', '2022-01-20', '119/1332/RSJ', '0223/UN40.A6/DN/2019', 0, 0, 0, 0, NULL, '', ''),
(69, '69', '2014-09-04', '2017-09-03', '-', '-', 0, 0, 0, 0, NULL, '', ''),
(70, '70', '2014-01-01', '2016-12-31', '-', '-', 0, 0, 0, 0, NULL, '', ''),
(71, '71', '2019-04-16', '2022-04-15', '119/6207/RSJ', 'T/5/UN43.2/HK.07.00/2019', 0, 0, 0, 0, NULL, '', ''),
(72, '72', '2019-02-01', '2022-01-31', '073/4052/RSJ', '003.01/TEDC/MOU-DIR/II/2019', 0, 0, 0, 0, NULL, '', ''),
(73, '73', '2019-03-28', '2022-03-27', '073/5921/RSJ', '002/FOM-UPH/PKS/III/2019', 0, 0, 0, 0, NULL, '', ''),
(74, '74', '2019-02-04', '2022-02-03', '119/2307/RSJ', '0098/Q/P.Y.SMI/II/2019', 0, 0, 0, 0, NULL, '', ''),
(75, '75', '2018-11-09', '2021-11-08', '119/20494/RSJ', '168/AKPER/B-MOU/IX/2018', 0, 0, 0, 0, NULL, '', ''),
(76, '76', '2019-03-11', '2022-03-10', '073/4623/RSJ', '700/FIKES-UMTAS/III/2019', 0, 0, 0, 0, NULL, '', ''),
(77, '77', '2018-07-04', '2021-07-03', '073/11279/RSJ', 'HK.05.01/1.6/2460/2018', 0, 0, 0, 0, NULL, '', ''),
(78, '78', '2019-07-10', '2022-07-09', '073/10034/RSJ', 'B/13/PL41/HL.04.03/2019', 0, 0, 0, 0, NULL, '', ''),
(79, '79', '2014-01-01', '2016-12-31', '-', '-', 0, 0, 0, 0, NULL, '', ''),
(80, '80', '2019-07-01', '2022-06-30', '073/11145/RSJ', 'PKS-  /Ffa-UNJANI/VIII/2019', 0, 0, 0, 0, NULL, '', ''),
(81, '81', '2019-04-26', '2022-04-25', '070/7441/RSJ', '1932/MOU/K/Ka./STIKIM/VI/2019', 0, 0, 0, 0, NULL, '', ''),
(82, '82', '2019-09-26', '2022-09-25', '073/16246/RSJ/IX/2019', '04/14/UBK/IX/2019', 0, 0, 0, 0, NULL, '', ''),
(83, '83', '2019-12-16', '2022-12-15', '073/21320/RSJ/XII/2019', 'HK.03.01/1.6/0012/2019', 0, 0, 0, 0, NULL, '', ''),
(84, '84', '2020-07-30', '2023-07-30', '073/11662/RSJ', '888/PL42/KS/2020', 0, 0, 0, 0, NULL, '', ''),
(85, '85', '2020-11-18', '2023-11-18', '073/18973/RSJ', '247/PKS/UKSW/XI/2020', 0, 0, 0, 0, NULL, '', ''),
(86, '86', '2020-11-02', '2023-11-02', '073/16336/RSJ', '037/PKS/DN/FKUKMXI/2020', 0, 0, 0, 0, NULL, '', '');

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
  `lp` decimal(10,0) NOT NULL,
  `prepost` decimal(10,0) NOT NULL,
  `sptk` decimal(10,0) NOT NULL,
  `penkes` decimal(10,0) NOT NULL,
  `dokep` decimal(10,0) NOT NULL,
  `komter` decimal(10,0) NOT NULL,
  `tak` decimal(10,0) NOT NULL,
  `kasus` decimal(10,0) NOT NULL,
  `ujian` decimal(10,0) NOT NULL,
  `sikap` decimal(10,0) NOT NULL,
  `ket_nilai` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_nilai_kep`
--

INSERT INTO `tb_nilai_kep` (`id_nilai_kep`, `id_pembimbing`, `id_praktik`, `id_praktikan`, `id_unit`, `lp`, `prepost`, `sptk`, `penkes`, `dokep`, `komter`, `tak`, `kasus`, `ujian`, `sikap`, `ket_nilai`) VALUES
(1, 24, 7, 91, 12, '30', '0', '77', '74', '16', '31', '78', '38', '15', '14', 'Numquam nisi aperiam'),
(2, 24, 7, 92, 12, '75', '0', '41', '51', '8', '49', '92', '80', '60', '3', 'Ipsa velit magni vo'),
(3, 24, 7, 93, 12, '63', '0', '36', '33', '34', '4', '5', '96', '58', '94', 'Est sint eu quidem c');

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
  `no_id_pembimbing` text NOT NULL,
  `nama_pembimbing` text NOT NULL,
  `jenis_pembimbing` text NOT NULL,
  `id_jenjang_pdd` int(11) NOT NULL,
  `status_pembimbing` enum('y','t') NOT NULL,
  `kali_pembimbing` int(11) NOT NULL,
  `tgl_input_pembimbing` date DEFAULT NULL,
  `tgl_ubah_pembimbing` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_pembimbing`
--

INSERT INTO `tb_pembimbing` (`id_pembimbing`, `no_id_pembimbing`, `nama_pembimbing`, `jenis_pembimbing`, `id_jenjang_pdd`, `status_pembimbing`, `kali_pembimbing`, `tgl_input_pembimbing`, `tgl_ubah_pembimbing`) VALUES
(1, '198302142015031001', 'dr. Ade Kurnia Surawijawa, Sp.KJ.', 'PSPD', 0, 'y', 0, '0000-00-00', NULL),
(2, '197707272006042026', 'dr. Dhian Indriasari, Sp.KJ.', 'PSPD', 0, 'y', 0, '0000-00-00', NULL),
(3, '198305162010012016', 'dr. Dini Indriany, Sp.KJ.', 'PSPD', 0, 'y', 0, '0000-00-00', NULL),
(4, '196312011990031004', 'dr. H. Encep Supriandi, Sp.KJ. M.Kes., M.KM.', 'PSPD', 0, 'y', 0, '0000-00-00', NULL),
(5, '196208081990011001', 'dr. H. Riza Putra, Sp.KJ.', 'PSPD', 0, 'y', 0, '0000-00-00', NULL),
(6, '198601052020122005', 'dr. Hilda Puspa Indah, Sp.KJ.', 'PSPD', 0, 'y', 0, '0000-00-00', NULL),
(7, '196608141991022004', 'dr. Hj. Elly Marliyani, Sp.KJ., M.K.M', 'PSPD', 0, 'y', 0, '0000-00-00', NULL),
(8, '196607132007012005', 'dr. Hj. Meutia Laksaminingrum, Sp.KJ.', 'PSPD', 0, 'y', 0, '0000-00-00', NULL),
(9, '196805271998032004', 'dr. Lenny Irawati Yohosua, Sp.KJ.', 'PSPD', 0, 'y', 0, '0000-00-00', NULL),
(10, '197507072005012006', 'dr. Lina Budiyanti, Sp.KJ. (K)', 'PSPD', 0, 'y', 0, '0000-00-00', NULL),
(11, '197506082006041013', 'dr. Yunyun Setiawan, Sp.KJ.', 'PSPD', 0, 'y', 0, '0000-00-00', NULL),
(12, '197902192011012001', 'dr. Indah KusumaDewi, Sp.KJ.', 'PSPD', 0, 'y', 0, '0000-00-00', NULL),
(13, '198302142015031001', 'Ade Kurnia Surawijaya, dr. Sp.KJ.', 'PPDS', 0, 'y', 0, '0000-00-00', NULL),
(14, '197707272006042026', 'Dhian Indriasari, dr. Sp.KJ.', 'PPDS', 0, 'y', 0, '0000-00-00', NULL),
(15, '202101228', 'Hasrini Rowawi, dr., Sp.KJ (K)., MHA', 'PPDS', 0, 'y', 0, '0000-00-00', NULL),
(16, '196805271998032004', 'Lenny Irawati Yohosua, dr. Sp.KJ.', 'PPDS', 0, 'y', 0, '0000-00-00', NULL),
(17, '197507072005012006', 'Lina Budiyanti, dr. Sp.KJ (K)', 'PPDS', 0, 'y', 0, '0000-00-00', NULL),
(18, '198601082010012013', 'Ema Marlina, S.Tr.T', 'CI RM', 0, 'y', 0, '0000-00-00', NULL),
(19, '198102122005012013', 'Yeni Susanti, Amd. RMIK', 'CI RM', 0, 'y', 0, '0000-00-00', NULL),
(20, '197105071997032005', 'Dra. Lismaniar, Psi., M.Psi', 'CI PSI', 0, 'y', 0, '0000-00-00', NULL),
(21, '196508051995022002', 'Dra. Resmi Prasetyani, Psi', 'CI PSI', 0, 'y', 0, '0000-00-00', NULL),
(22, '197308081999032005', 'Yuyum Rohmulyanawati, S.Sos, MPSSp', 'CI PEKSOS', 9, 'y', 0, '0000-00-00', NULL),
(23, '198805212011011003', 'Irfan Arief Sulistyawan, Amd', 'CI KESLING', 0, 'y', 0, '0000-00-00', NULL),
(24, '197301072005011007', 'Abdul Aziz, AMK', 'CI KEP', 6, 'y', 0, '0000-00-00', NULL),
(25, '197812182006042017', 'Adah Saadah, S.Kep., Ners', 'CI KEP', 9, 'y', 0, '0000-00-00', NULL),
(26, '197405121997032004', 'Ade Carnisem, S.Kep., Ners', 'CI KEP', 9, 'y', 0, '0000-00-00', NULL),
(27, '196607161991032004', 'Hj. Ade Saromah, S.Kep., Ners', 'CI KEP', 9, 'y', 0, '0000-00-00', NULL),
(28, '197211201991031001', 'Agus Krisno, AMK', 'CI KEP', 6, 'y', 0, '0000-00-00', NULL),
(29, '198109282005011007', 'Agus Kusnandar, S.Kep., Ners', 'CI KEP', 9, 'y', 0, '0000-00-00', NULL),
(30, '197503081997032002', 'Ai Sriyati, S.Kep., Ners', 'CI KEP', 9, 'y', 0, '0000-00-00', NULL),
(31, '198110272006042014', 'Butet Berlina, S.Kep., Ners', 'CI KEP', 9, 'y', 0, '0000-00-00', NULL),
(32, '197610012005011010', 'Dedi Nurhasan, S.Kep., Ners', 'CI KEP', 9, 'y', 0, '0000-00-00', NULL),
(33, '196705161991031004', 'Dedi Suhaedi, AMK', 'CI KEP', 6, 'y', 0, '0000-00-00', NULL),
(34, '196904071993032008', 'Dewi Shinta Maria, AMK', 'CI KEP', 6, 'y', 0, '0000-00-00', NULL),
(35, '197507041999032005', 'Dian Ratnaningsih, S.Kep., Ners', 'CI KEP', 9, 'y', 0, '0000-00-00', NULL),
(36, '197609212000032001', 'Elsie Rodini, AMK', 'CI KEP', 6, 'y', 0, '0000-00-00', NULL),
(37, '196411011998032001', 'Eny Budiasih, S.Kep., Ners', 'CI KEP', 9, 'y', 0, '0000-00-00', NULL),
(38, '196901062000122001', 'Eri Suciati, S.Kep., Ners', 'CI KEP', 9, 'y', 0, '0000-00-00', NULL),
(39, '197901212005012013', 'Ester Suryani Tampubolon, S.Kep., Ners', 'CI KEP', 9, 'y', 0, '0000-00-00', NULL),
(40, '197303291999032002', 'Ettie Hikmawati, S.Kep., Ners', 'CI KEP', 9, 'y', 0, '0000-00-00', NULL),
(41, '197601311999031001', 'H. Dedi Rahmadi, S.Kep.Ners', 'CI KEP', 9, 'y', 0, '0000-00-00', NULL),
(42, '197612242000031004', 'H. Moch. Jimi Dirgantara, S.Kep.Ners', 'CI KEP', 9, 'y', 0, '0000-00-00', NULL),
(43, '197212271996031003', 'H. Zaenurohman, S.Kep.Ners', 'CI KEP', 9, 'y', 0, '0000-00-00', NULL),
(44, '197911152000032004', 'Hj. Arimbi Nurwiyanti P, S.Kep.Ners', 'CI KEP', 9, 'y', 0, '0000-00-00', NULL),
(45, '197909052006042016', 'Hj. Devie Fitriyani, S.Kep.Ners', 'CI KEP', 9, 'y', 0, '0000-00-00', NULL),
(46, '197807042009022004', 'Hj. Icih Susanti, S.Kep.Ners', 'CI KEP', 9, 'y', 0, '0000-00-00', NULL),
(47, '196812261996032001', 'Hj. Nenti Siti Kuraesin, S.Kep., Ners', 'CI KEP', 9, 'y', 0, '0000-00-00', NULL),
(48, '197902112006042015', 'Kokom Komalasari, S.Kep., Ners', 'CI KEP', 9, 'y', 0, '0000-00-00', NULL),
(49, '196607151990032013', 'Komaryati, S.Kep., Ners', 'CI KEP', 9, 'y', 0, '0000-00-00', NULL),
(50, '198307172009022001', 'Neng Goniah, S.Kep., Ners', 'CI KEP', 9, 'y', 0, '0000-00-00', NULL),
(51, '197608072005012005', 'Nenih Nuraenih, S.Kep., Ners', 'CI KEP', 9, 'y', 0, '0000-00-00', NULL),
(52, '197011111996032003', 'Ni Luh Nyoman S Puspowati, S.Kep., Ners', 'CI KEP', 9, 'y', 0, '0000-00-00', NULL),
(53, '197004221998032004', 'Nirna Julaeha, S.Kep., Ners', 'CI KEP', 9, 'y', 0, '0000-00-00', NULL),
(54, '197911232005012017', 'Novita Sari, S.Kep., Ners', 'CI KEP', 9, 'y', 0, '0000-00-00', NULL),
(55, '198010212005012011', 'Siti Romlah, S.Kep., Ners', 'CI KEP', 9, 'y', 0, '0000-00-00', NULL),
(56, '196908311998032005', 'Sri Kurniyati, S.Kep., Ners', 'CI KEP', 9, 'y', 0, '0000-00-00', NULL),
(57, '196805271992032004', 'Sri Yani, S.Kep., Ners', 'CI KEP', 9, 'y', 0, '0000-00-00', NULL),
(58, '198103082005012006', 'Winda Ratna Wulan, S.Kep. Ners., M.Kep.,Sp.Kep.J  ', 'CI KEP', 10, 'y', 0, '0000-00-00', NULL),
(59, '197707041997031004', 'Yulforman Rotua Manalu, S.Kep., Ners', 'CI KEP', 9, 'y', 0, '0000-00-00', NULL),
(60, '196707151987032002', 'Yusi Yustiah, AMK', 'CI KEP', 6, 'y', 0, '0000-00-00', NULL),
(61, '196712151990032007', 'Yuyun Yunara, S.Kep., Ners', 'CI KEP', 9, 'y', 0, '0000-00-00', NULL),
(62, '199409102020121008', 'Rizki Egi Purnama, S.Pd', 'CI IT', 8, 'y', 0, '0000-00-00', NULL),
(63, '196409251992031006', 'Drs. Tavip Budiawan, Apt', 'CI FAR', 9, 'y', 0, '0000-00-00', NULL),
(64, '198103252011012004', 'Ekaprasetyawati, S.Si, Apt', 'CI FAR', 9, 'y', 0, '0000-00-00', NULL),
(65, '197801101999032002', 'Ice Laila Nur, S.Si., Apt., M.Farm', 'CI FAR', 9, 'y', 0, '0000-00-00', NULL);

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
(1, 7, 24, 12, 91),
(2, 7, 24, 12, 92),
(3, 7, 24, 12, 93),
(4, 7, 25, 23, 94),
(5, 7, 25, 23, 95),
(6, 7, 25, 23, 96),
(7, 7, 25, 23, 97);

-- --------------------------------------------------------

--
-- Table structure for table `tb_praktik`
--

CREATE TABLE `tb_praktik` (
  `id_praktik` int(11) NOT NULL,
  `id_mou` int(11) NOT NULL,
  `id_institusi` int(11) NOT NULL,
  `nama_praktik` text NOT NULL,
  `tgl_input_praktik` date DEFAULT NULL,
  `tgl_ubah_praktik` date DEFAULT NULL,
  `tgl_mulai_praktik` date DEFAULT NULL,
  `tgl_selesai_praktik` date DEFAULT NULL,
  `jumlah_praktik` int(11) NOT NULL,
  `no_surat_praktik` text NOT NULL,
  `surat_praktik` text DEFAULT NULL,
  `data_praktik` text DEFAULT NULL,
  `id_jurusan_pdd_jenis` int(11) NOT NULL,
  `id_jurusan_pdd` text DEFAULT NULL,
  `id_jenjang_pdd` text DEFAULT NULL,
  `id_profesi_pdd` text DEFAULT NULL,
  `id_user` text NOT NULL,
  `nama_koordinator_praktik` text NOT NULL,
  `email_koordinator_praktik` text NOT NULL,
  `telp_koordinator_praktik` text NOT NULL,
  `status_cek_praktik` text NOT NULL,
  `status_praktik` enum('D','W','Y','S','A') NOT NULL,
  `kurang_tf_praktik` text NOT NULL,
  `ket_tolakPraktikTarif_praktik` text NOT NULL,
  `makan_mess_praktik` text DEFAULT NULL,
  `materi_upip_praktik` text DEFAULT NULL,
  `materi_napza_praktik` text DEFAULT NULL,
  `fileInv_praktik` text DEFAULT NULL,
  `fileNilKep_praktik` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_praktik`
--

INSERT INTO `tb_praktik` (`id_praktik`, `id_mou`, `id_institusi`, `nama_praktik`, `tgl_input_praktik`, `tgl_ubah_praktik`, `tgl_mulai_praktik`, `tgl_selesai_praktik`, `jumlah_praktik`, `no_surat_praktik`, `surat_praktik`, `data_praktik`, `id_jurusan_pdd_jenis`, `id_jurusan_pdd`, `id_jenjang_pdd`, `id_profesi_pdd`, `id_user`, `nama_koordinator_praktik`, `email_koordinator_praktik`, `telp_koordinator_praktik`, `status_cek_praktik`, `status_praktik`, `kurang_tf_praktik`, `ket_tolakPraktikTarif_praktik`, `makan_mess_praktik`, `materi_upip_praktik`, `materi_napza_praktik`, `fileInv_praktik`, `fileNilKep_praktik`) VALUES
(1, 0, 21, 'Reiciendis commodo n', '2022-03-24', NULL, '2022-03-24', '2022-03-29', 7, 'Eius sit voluptates ', './_file/praktik/surat_1_2022-03-24.pdf', './_file/praktik/data_praktikan_1_2022-03-24.xlsx', 1, '1', '9', '2', '1', 'Minus ut laborum sol', 'burog@mailinator.com', '85', 'DPT_KED', 'D', '', '', 't', '', '', NULL, NULL),
(2, 0, 72, 'Incididunt autem har', '2022-03-24', NULL, '2022-03-24', '2022-03-25', 7, 'Quia elit et culpa ', './_file/praktik/surat_2_2022-03-24.pdf', './_file/praktik/data_praktikan_2_2022-03-24.xlsx', 1, '1', '9', '1', '1', 'Qui at sint repudian', 'cidigita@mailinator.com', '91', 'AKV_PPDS', 'Y', '', '', '', '', '', NULL, NULL),
(3, 0, 68, 'Optio earum repudia', '2022-03-24', NULL, '2022-03-24', '2022-03-25', 7, 'Sunt iste in autem ', './_file/praktik/surat_3_2022-03-24.pdf', './_file/praktik/data_praktikan_3_2022-03-24.xlsx', 1, '1', '9', '2', '1', 'Nihil praesentium po', 'bypus@mailinator.com', '12', 'DTR_KED_INV', 'Y', '', '', 'y', '', '', NULL, NULL),
(4, 0, 21, '2', '2022-03-25', NULL, '2022-03-21', '2022-03-28', 31, '139/Prodi Perawat/XII/2021', './_file/praktik/surat_4_2022-03-25.pdf', './_file/praktik/data_praktikan_4_2022-03-25.xlsx', 1, '1', '9', '1', '1', 'ADMIN DIKLAT RS JIWA', 'admin@admin', '08123145645', 'DPT_KED_PPDS', 'D', '', '', '', '', '', NULL, NULL),
(5, 0, 20, '2', '2022-03-25', NULL, '2022-03-28', '2022-04-04', 31, '139/Prodi Perawat/XII/2021', './_file/praktik/surat_5_2022-03-25.pdf', './_file/praktik/data_praktikan_5_2022-03-25.xlsx', 1, '1', '9', '2', '1', 'ADMIN DIKLAT RS JIWA', 'admin@admin', '08123145645', 'AKV', 'Y', '', '', 't', '', '', NULL, NULL),
(6, 0, 88, 'Kelompok 1', '2022-03-25', NULL, '2022-03-25', '2022-04-26', 7, '54/134/123', './_file/praktik/surat_6_2022-03-25.pdf', './_file/praktik/data_praktikan_6_2022-03-25.xlsx', 4, '4', '8', '0', '1', 'ADMIN DIKLAT RS JIWA', 'admin@admin', '08123145645', 'MESS', 'D', '', '', 'y', 't', 't', NULL, NULL),
(7, 0, 48, 'Harum id praesentiu', '2022-03-26', NULL, '2022-03-26', '2022-03-29', 7, '/123123/123123', './_file/praktik/surat_7_2022-03-26.pdf', './_file/praktik/data_praktikan_7_2022-03-26.xlsx', 2, '2', '9', '5', '1', 'Magni vel dolor offi', 'fily@mailinator.com', '20', 'AKV', 'Y', '', '', 'y', 'y', 'y', './_file/inv/inv_7_2022-03-27.pdf', './_file/nilai/nilai_kep_7_2022-03-28.pdf'),
(8, 0, 47, 'Quod qui explicabo ', '2022-03-29', NULL, '2022-03-29', '2022-04-29', 11, '1237/81723/189273', './_file/praktik/surat_8_2022-03-29.pdf', './_file/praktik/data_praktikan_8_2022-03-29.xlsx', 2, '2', '7', '', '1', 'Nisi sunt culpa qu', 'denyzi@mailinator.com', '23', 'TMP', 'D', '', '', 't', 'y', 'y', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_praktikan`
--

CREATE TABLE `tb_praktikan` (
  `id_praktikan` int(11) NOT NULL,
  `id_praktik` int(11) NOT NULL,
  `no_id_praktikan` text NOT NULL,
  `nama_praktikan` text NOT NULL,
  `tgl_lahir_praktikan` date NOT NULL,
  `telp_praktikan` text NOT NULL,
  `wa_praktikan` text NOT NULL,
  `email_praktikan` text NOT NULL,
  `kota_kab_praktikan` text NOT NULL,
  `tgl_input_praktikan` date DEFAULT NULL,
  `tgl_ubah_praktikan` date DEFAULT NULL,
  `status_praktikan` enum('y','t') NOT NULL,
  `id_pembimbing_pilih` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_praktikan`
--

INSERT INTO `tb_praktikan` (`id_praktikan`, `id_praktik`, `no_id_praktikan`, `nama_praktikan`, `tgl_lahir_praktikan`, `telp_praktikan`, `wa_praktikan`, `email_praktikan`, `kota_kab_praktikan`, `tgl_input_praktikan`, `tgl_ubah_praktikan`, `status_praktikan`, `id_pembimbing_pilih`) VALUES
(1, 1, '1010202201', 'ADE IHSAN MR.', '0000-00-00', '0811209312322', '0811209312322', 'adeamr@gmail.com', 'KOTA BANDUNG', '2022-03-24', NULL, 'y', 0),
(2, 1, '1010202202', 'ASEP SAEPUDIN', '0000-00-00', '0812312329822', '0812312329822', 'asep@gmail.com', 'KOTA BANDUNG', '2022-03-24', NULL, 'y', 0),
(3, 1, '1010202203', 'FAJAR RACHMAT HERMANSYAH', '0000-00-00', '0822237891722', '0822113232311', 'fajar@gmail.com', 'KAB. BANDUNG', '2022-03-24', NULL, 'y', 0),
(4, 1, '1010202204', 'FERLISTIAN RIZKI', '0000-00-00', '0822337031729', '0822337031729', 'ferlis@gmail.com', 'KAB. BANDUNG', '2022-03-24', NULL, 'y', 0),
(5, 1, '1010202205', 'LUKMAN SALEHUDIN', '0000-00-00', '0822113232311', '0898298332323', 'lukman@gmail.com', 'KAB. BANDUNG', '2022-03-24', NULL, 'y', 0),
(6, 1, '1010202206', 'RANI RIFFANI', '0000-00-00', '0822237001728', '0822237001728', 'raniriff@gmail.com', 'KAB. BANDUNG', '2022-03-24', NULL, 'y', 0),
(7, 1, '1010202207', 'RIZKI EGI ', '0000-00-00', '0891278318723', '0892831238723', 'egi.rizki@gmail.com', 'KOTA CIMAHI', '2022-03-24', NULL, 'y', 0),
(8, 2, '1010202201', 'ADE IHSAN MR.', '0000-00-00', '0811209312322', '0811209312322', 'adeamr@gmail.com', 'KOTA BANDUNG', '2022-03-24', NULL, 'y', 0),
(9, 2, '1010202202', 'ASEP SAEPUDIN', '0000-00-00', '0812312329822', '0812312329822', 'asep@gmail.com', 'KOTA BANDUNG', '2022-03-24', NULL, 'y', 0),
(10, 2, '1010202203', 'FAJAR RACHMAT HERMANSYAH', '0000-00-00', '0822237891722', '0822113232311', 'fajar@gmail.com', 'KAB. BANDUNG', '2022-03-24', NULL, 'y', 0),
(11, 2, '1010202204', 'FERLISTIAN RIZKI', '0000-00-00', '0822337031729', '0822337031729', 'ferlis@gmail.com', 'KAB. BANDUNG', '2022-03-24', NULL, 'y', 0),
(12, 2, '1010202205', 'LUKMAN SALEHUDIN', '0000-00-00', '0822113232311', '0898298332323', 'lukman@gmail.com', 'KAB. BANDUNG', '2022-03-24', NULL, 'y', 0),
(13, 2, '1010202206', 'RANI RIFFANI', '0000-00-00', '0822237001728', '0822237001728', 'raniriff@gmail.com', 'KAB. BANDUNG', '2022-03-24', NULL, 'y', 0),
(14, 2, '1010202207', 'RIZKI EGI ', '0000-00-00', '0891278318723', '0892831238723', 'egi.rizki@gmail.com', 'KOTA CIMAHI', '2022-03-24', NULL, 'y', 0),
(15, 3, '1010202201', 'ADE IHSAN MR.', '0000-00-00', '0811209312322', '0811209312322', 'adeamr@gmail.com', 'KOTA BANDUNG', '2022-03-24', NULL, 'y', 0),
(16, 3, '1010202202', 'ASEP SAEPUDIN', '0000-00-00', '0812312329822', '0812312329822', 'asep@gmail.com', 'KOTA BANDUNG', '2022-03-24', NULL, 'y', 0),
(17, 3, '1010202203', 'FAJAR RACHMAT HERMANSYAH', '0000-00-00', '0822237891722', '0822113232311', 'fajar@gmail.com', 'KAB. BANDUNG', '2022-03-24', NULL, 'y', 0),
(18, 3, '1010202204', 'FERLISTIAN RIZKI', '0000-00-00', '0822337031729', '0822337031729', 'ferlis@gmail.com', 'KAB. BANDUNG', '2022-03-24', NULL, 'y', 0),
(19, 3, '1010202205', 'LUKMAN SALEHUDIN', '0000-00-00', '0822113232311', '0898298332323', 'lukman@gmail.com', 'KAB. BANDUNG', '2022-03-24', NULL, 'y', 0),
(20, 3, '1010202206', 'RANI RIFFANI', '0000-00-00', '0822237001728', '0822237001728', 'raniriff@gmail.com', 'KAB. BANDUNG', '2022-03-24', NULL, 'y', 0),
(21, 3, '1010202207', 'RIZKI EGI ', '0000-00-00', '0891278318723', '0892831238723', 'egi.rizki@gmail.com', 'KOTA CIMAHI', '2022-03-24', NULL, 'y', 0),
(22, 4, '10401008', 'Fitri Rindiani', '0000-00-00', '81214133520', '81214133520', 'fitririndiani15@gmail.com', 'SUBANG', '2022-03-25', NULL, 'y', 0),
(23, 4, '10401004', 'Citrabela Maharani', '0000-00-00', '81310319476', '81310319476', 'citrabellamaharani@gmail.com', 'SUBANG', '2022-03-25', NULL, 'y', 0),
(24, 4, '10401027', 'Tita Wahyu Kartika ', '0000-00-00', '8987033641', '8987033641', 'tita.kartika2002@gmail.com', 'SUBANG', '2022-03-25', NULL, 'y', 0),
(25, 4, '10401003', 'Ayu Lethiyana', '0000-00-00', '85798095468', '85798095468', 'ayu.lethiyana@gmail.com', 'SUBANG', '2022-03-25', NULL, 'y', 0),
(26, 4, '10401025', 'Sinta Mulia Rahmawati', '0000-00-00', '82126075544', '82126075544', 'sintamulyaw@gmail.com', 'SUBANG', '2022-03-25', NULL, 'y', 0),
(27, 4, '10401016', 'Megga Putri Kemala Supendi', '0000-00-00', '8817752203', '8817752203', 'meggaputri26@gmail.com', 'SUBANG', '2022-03-25', NULL, 'y', 0),
(28, 4, '10401028', 'Tyas Rizky Anatasya ', '0000-00-00', '881023399164', '85316290899', 'rizkytyas92@gmail.com', 'SUBANG', '2022-03-25', NULL, 'y', 0),
(29, 4, '10401019', 'Muhamad sayuti', '0000-00-00', ' 83816757946', '83816757946', 'muhamadsay123@gmail.com', 'SUBANG', '2022-03-25', NULL, 'y', 0),
(30, 4, '10401023', 'Restu Nadiya Sukardi Putri ', '0000-00-00', ' 82321184423', '82321184423', 'restunadia2254@gmail.com', 'SUBANG', '2022-03-25', NULL, 'y', 0),
(31, 4, '10401014', 'Lisma Rosita', '0000-00-00', '82129962684', '82129962684', 'lismarosita02@gmail.com', 'SUBANG', '2022-03-25', NULL, 'y', 0),
(32, 4, '10401029', 'Ulfa Mardiana', '0000-00-00', '81313026995', '81313026995', 'ulfamardiana339@gmail.com', 'SUBANG', '2022-03-25', NULL, 'y', 0),
(33, 4, '10401031', 'Wiliani Shelina', '0000-00-00', '87733948356', '87733948356', 'wilianishelina6@gmail.com', 'SUBANG', '2022-03-25', NULL, 'y', 0),
(34, 4, '10401032', 'Zahra Annisa Luthfianti', '0000-00-00', '85157016767', '85157016767', 'zahraannisa151@gmail.com', 'SUBANG', '2022-03-25', NULL, 'y', 0),
(35, 4, '10401012', 'Kelvin Westin', '0000-00-00', '81220428580', '81220428580', 'kelvinwestin04@gmail.com ', 'SUBANG', '2022-03-25', NULL, 'y', 0),
(36, 4, '10401002', 'Aulya Alivia Kusumah', '0000-00-00', '89658124756', '89658124756', 'aliviaaulya@gmail.com', 'SUBANG', '2022-03-25', NULL, 'y', 0),
(37, 4, '10401017', 'Melanda Sukmawatty', '0000-00-00', '82118527225', '82118527225', 'melandasukmawaty10@gmail.com', 'SUBANG', '2022-03-25', NULL, 'y', 0),
(38, 4, '10401005', 'Dea Yustika', '0000-00-00', '89639588592', '89639588592', 'deayustika05@gmail.com', 'SUBANG', '2022-03-25', NULL, 'y', 0),
(39, 4, '10401026', 'Tenny Yulistiani Sanjaya', '0000-00-00', '81210274372', '83843750181', 'tennyyulis12@gmail.com', 'SUBANG', '2022-03-25', NULL, 'y', 0),
(40, 4, '10401024', 'Reza Nanda Lesmana', '0000-00-00', '89671347414', '89671347414', 'rezalesamana31@gmail.com', 'SUBANG', '2022-03-25', NULL, 'y', 0),
(41, 4, '10401007', 'Emmyr Annas Indrawan', '0000-00-00', '85603036534', '85603036534', 'emmyrrannas42@gmail.com', 'SUBANG', '2022-03-25', NULL, 'y', 0),
(42, 4, '10401010', ' Irna Monica', '0000-00-00', '85797940327 ', '83821419818', 'irnamonica070@gmail.com', 'SUBANG', '2022-03-25', NULL, 'y', 0),
(43, 4, '10401020', 'Nur aeni sriampeli', '0000-00-00', '82320280416', '82320280416', 'Aenin2603@gmail.com', 'SUBANG', '2022-03-25', NULL, 'y', 0),
(44, 4, '10401009', 'Ghina Mustika Afriliani', '0000-00-00', '85759064577', '82321665256', 'ghinamustika41@gmail.com', 'SUBANG', '2022-03-25', NULL, 'y', 0),
(45, 4, '10401018', ' Muhamad Rivan Ferdiansyah', '0000-00-00', '81295743546', '81295743546', 'ferdiansyahrivan5@gmail.com', 'SUBANG', '2022-03-25', NULL, 'y', 0),
(46, 4, '10401030', 'Wien Ganies Katri', '0000-00-00', '89639588546', '89639588546', 'wienghanies.k25@gmail.com', 'SUBANG', '2022-03-25', NULL, 'y', 0),
(47, 4, '10401015', 'Mariam Nurlatifah Achmad', '0000-00-00', '81321448197', '81321448197', 'maryamnurlatifah403@gmail.com', 'SUBANG', '2022-03-25', NULL, 'y', 0),
(48, 4, '10401006', 'Dede irawan ruswandi', '0000-00-00', '81211812895', '81211812895', 'dedeirawan20000@gmail.com', 'SUBANG', '2022-03-25', NULL, 'y', 0),
(49, 4, '10401001', 'Akhfa Muzaqi Feriansyah', '0000-00-00', '82121495849', '82121495849', 'Akhfamuzaqif@gmail.com', 'SUBANG', '2022-03-25', NULL, 'y', 0),
(50, 4, '10401021', 'Putri Arista Alwander', '0000-00-00', '85591698313', '85591698313', 'putri19arista@gmail.com', 'SUBANG', '2022-03-25', NULL, 'y', 0),
(51, 4, '10401011', ' Ivan fadilah', '0000-00-00', '859130961217', '859130961217', 'ivanfadilah634@gmail.com', 'SUBANG', '2022-03-25', NULL, 'y', 0),
(52, 4, '10401013', 'Lia Nurlaila', '0000-00-00', '85222234394', '85222234394', 'lianurlaila1101@gmail.com', 'SUBANG', '2022-03-25', NULL, 'y', 0),
(53, 5, '10401008', 'Fitri Rindiani', '0000-00-00', '81214133520', '81214133520', 'fitririndiani15@gmail.com', 'SUBANG', '2022-03-25', NULL, 'y', 0),
(54, 5, '10401004', 'Citrabela Maharani', '0000-00-00', '81310319476', '81310319476', 'citrabellamaharani@gmail.com', 'SUBANG', '2022-03-25', NULL, 'y', 0),
(55, 5, '10401027', 'Tita Wahyu Kartika ', '0000-00-00', '8987033641', '8987033641', 'tita.kartika2002@gmail.com', 'SUBANG', '2022-03-25', NULL, 'y', 0),
(56, 5, '10401003', 'Ayu Lethiyana', '0000-00-00', '85798095468', '85798095468', 'ayu.lethiyana@gmail.com', 'SUBANG', '2022-03-25', NULL, 'y', 0),
(57, 5, '10401025', 'Sinta Mulia Rahmawati', '0000-00-00', '82126075544', '82126075544', 'sintamulyaw@gmail.com', 'SUBANG', '2022-03-25', NULL, 'y', 0),
(58, 5, '10401016', 'Megga Putri Kemala Supendi', '0000-00-00', '8817752203', '8817752203', 'meggaputri26@gmail.com', 'SUBANG', '2022-03-25', NULL, 'y', 0),
(59, 5, '10401028', 'Tyas Rizky Anatasya ', '0000-00-00', '881023399164', '85316290899', 'rizkytyas92@gmail.com', 'SUBANG', '2022-03-25', NULL, 'y', 0),
(60, 5, '10401019', 'Muhamad sayuti', '0000-00-00', ' 83816757946', '83816757946', 'muhamadsay123@gmail.com', 'SUBANG', '2022-03-25', NULL, 'y', 0),
(61, 5, '10401023', 'Restu Nadiya Sukardi Putri ', '0000-00-00', ' 82321184423', '82321184423', 'restunadia2254@gmail.com', 'SUBANG', '2022-03-25', NULL, 'y', 0),
(62, 5, '10401014', 'Lisma Rosita', '0000-00-00', '82129962684', '82129962684', 'lismarosita02@gmail.com', 'SUBANG', '2022-03-25', NULL, 'y', 0),
(63, 5, '10401029', 'Ulfa Mardiana', '0000-00-00', '81313026995', '81313026995', 'ulfamardiana339@gmail.com', 'SUBANG', '2022-03-25', NULL, 'y', 0),
(64, 5, '10401031', 'Wiliani Shelina', '0000-00-00', '87733948356', '87733948356', 'wilianishelina6@gmail.com', 'SUBANG', '2022-03-25', NULL, 'y', 0),
(65, 5, '10401032', 'Zahra Annisa Luthfianti', '0000-00-00', '85157016767', '85157016767', 'zahraannisa151@gmail.com', 'SUBANG', '2022-03-25', NULL, 'y', 0),
(66, 5, '10401012', 'Kelvin Westin', '0000-00-00', '81220428580', '81220428580', 'kelvinwestin04@gmail.com ', 'SUBANG', '2022-03-25', NULL, 'y', 0),
(67, 5, '10401002', 'Aulya Alivia Kusumah', '0000-00-00', '89658124756', '89658124756', 'aliviaaulya@gmail.com', 'SUBANG', '2022-03-25', NULL, 'y', 0),
(68, 5, '10401017', 'Melanda Sukmawatty', '0000-00-00', '82118527225', '82118527225', 'melandasukmawaty10@gmail.com', 'SUBANG', '2022-03-25', NULL, 'y', 0),
(69, 5, '10401005', 'Dea Yustika', '0000-00-00', '89639588592', '89639588592', 'deayustika05@gmail.com', 'SUBANG', '2022-03-25', NULL, 'y', 0),
(70, 5, '10401026', 'Tenny Yulistiani Sanjaya', '0000-00-00', '81210274372', '83843750181', 'tennyyulis12@gmail.com', 'SUBANG', '2022-03-25', NULL, 'y', 0),
(71, 5, '10401024', 'Reza Nanda Lesmana', '0000-00-00', '89671347414', '89671347414', 'rezalesamana31@gmail.com', 'SUBANG', '2022-03-25', NULL, 'y', 0),
(72, 5, '10401007', 'Emmyr Annas Indrawan', '0000-00-00', '85603036534', '85603036534', 'emmyrrannas42@gmail.com', 'SUBANG', '2022-03-25', NULL, 'y', 0),
(73, 5, '10401010', ' Irna Monica', '0000-00-00', '85797940327 ', '83821419818', 'irnamonica070@gmail.com', 'SUBANG', '2022-03-25', NULL, 'y', 0),
(74, 5, '10401020', 'Nur aeni sriampeli', '0000-00-00', '82320280416', '82320280416', 'Aenin2603@gmail.com', 'SUBANG', '2022-03-25', NULL, 'y', 0),
(75, 5, '10401009', 'Ghina Mustika Afriliani', '0000-00-00', '85759064577', '82321665256', 'ghinamustika41@gmail.com', 'SUBANG', '2022-03-25', NULL, 'y', 0),
(76, 5, '10401018', ' Muhamad Rivan Ferdiansyah', '0000-00-00', '81295743546', '81295743546', 'ferdiansyahrivan5@gmail.com', 'SUBANG', '2022-03-25', NULL, 'y', 0),
(77, 5, '10401030', 'Wien Ganies Katri', '0000-00-00', '89639588546', '89639588546', 'wienghanies.k25@gmail.com', 'SUBANG', '2022-03-25', NULL, 'y', 0),
(78, 5, '10401015', 'Mariam Nurlatifah Achmad', '0000-00-00', '81321448197', '81321448197', 'maryamnurlatifah403@gmail.com', 'SUBANG', '2022-03-25', NULL, 'y', 0),
(79, 5, '10401006', 'Dede irawan ruswandi', '0000-00-00', '81211812895', '81211812895', 'dedeirawan20000@gmail.com', 'SUBANG', '2022-03-25', NULL, 'y', 0),
(80, 5, '10401001', 'Akhfa Muzaqi Feriansyah', '0000-00-00', '82121495849', '82121495849', 'Akhfamuzaqif@gmail.com', 'SUBANG', '2022-03-25', NULL, 'y', 0),
(81, 5, '10401021', 'Putri Arista Alwander', '0000-00-00', '85591698313', '85591698313', 'putri19arista@gmail.com', 'SUBANG', '2022-03-25', NULL, 'y', 0),
(82, 5, '10401011', ' Ivan fadilah', '0000-00-00', '859130961217', '859130961217', 'ivanfadilah634@gmail.com', 'SUBANG', '2022-03-25', NULL, 'y', 0),
(83, 5, '10401013', 'Lia Nurlaila', '0000-00-00', '85222234394', '85222234394', 'lianurlaila1101@gmail.com', 'SUBANG', '2022-03-25', NULL, 'y', 0),
(84, 6, '1010202201', 'ADE IHSAN MR.', '0000-00-00', '0811209312322', '0811209312322', 'adeamr@gmail.com', 'KOTA BANDUNG', '2022-03-25', NULL, 'y', 0),
(85, 6, '1010202202', 'ASEP SAEPUDIN', '0000-00-00', '0812312329822', '0812312329822', 'asep@gmail.com', 'KOTA BANDUNG', '2022-03-25', NULL, 'y', 0),
(86, 6, '1010202203', 'FAJAR RACHMAT HERMANSYAH', '0000-00-00', '0822237891722', '0822113232311', 'fajar@gmail.com', 'KAB. BANDUNG', '2022-03-25', NULL, 'y', 0),
(87, 6, '1010202204', 'FERLISTIAN RIZKI', '0000-00-00', '0822337031729', '0822337031729', 'ferlis@gmail.com', 'KAB. BANDUNG', '2022-03-25', NULL, 'y', 0),
(88, 6, '1010202205', 'LUKMAN SALEHUDIN', '0000-00-00', '0822113232311', '0898298332323', 'lukman@gmail.com', 'KAB. BANDUNG', '2022-03-25', NULL, 'y', 0),
(89, 6, '1010202206', 'RANI RIFFANI', '0000-00-00', '0822237001728', '0822237001728', 'raniriff@gmail.com', 'KAB. BANDUNG', '2022-03-25', NULL, 'y', 0),
(90, 6, '1010202207', 'RIZKI EGI ', '0000-00-00', '0891278318723', '0892831238723', 'egi.rizki@gmail.com', 'KOTA CIMAHI', '2022-03-25', NULL, 'y', 0),
(91, 7, '1010202201', 'ADE IHSAN MR.', '0000-00-00', '0811209312322', '0811209312322', 'adeamr@gmail.com', 'KOTA BANDUNG', '2022-03-26', NULL, 'y', 0),
(92, 7, '1010202202', 'ASEP SAEPUDIN', '0000-00-00', '0812312329822', '0812312329822', 'asep@gmail.com', 'KOTA BANDUNG', '2022-03-26', NULL, 'y', 0),
(93, 7, '1010202203', 'FAJAR RACHMAT HERMANSYAH', '0000-00-00', '0822237891722', '0822113232311', 'fajar@gmail.com', 'KAB. BANDUNG', '2022-03-26', NULL, 'y', 0),
(94, 7, '1010202204', 'FERLISTIAN RIZKI', '0000-00-00', '0822337031729', '0822337031729', 'ferlis@gmail.com', 'KAB. BANDUNG', '2022-03-26', NULL, 'y', 0),
(95, 7, '1010202205', 'LUKMAN SALEHUDIN', '0000-00-00', '0822113232311', '0898298332323', 'lukman@gmail.com', 'KAB. BANDUNG', '2022-03-26', NULL, 'y', 0),
(96, 7, '1010202206', 'RANI RIFFANI', '0000-00-00', '0822237001728', '0822237001728', 'raniriff@gmail.com', 'KAB. BANDUNG', '2022-03-26', NULL, 'y', 0),
(97, 7, '1010202207', 'RIZKI EGI ', '0000-00-00', '0891278318723', '0892831238723', 'egi.rizki@gmail.com', 'KOTA CIMAHI', '2022-03-26', NULL, 'y', 0),
(98, 8, '1010202201', 'ADE IHSAN MR.', '0000-00-00', '0811209312322', '0811209312322', 'adeamr@gmail.com', 'KOTA BANDUNG', '2022-03-29', NULL, 'y', 0),
(99, 8, '1010202202', 'ASEP SAEPUDIN', '0000-00-00', '0812312329822', '0812312329822', 'asep@gmail.com', 'KOTA BANDUNG', '2022-03-29', NULL, 'y', 0),
(100, 8, '1010202203', 'FAJAR RACHMAT HERMANSYAH', '0000-00-00', '0822237891722', '0822113232311', 'fajar@gmail.com', 'KAB. BANDUNG', '2022-03-29', NULL, 'y', 0),
(101, 8, '1010202204', 'FERLISTIAN RIZKI', '0000-00-00', '0822337031729', '0822337031729', 'ferlis@gmail.com', 'KAB. BANDUNG', '2022-03-29', NULL, 'y', 0),
(102, 8, '1010202205', 'LUKMAN SALEHUDIN', '0000-00-00', '0822113232311', '0898298332323', 'lukman@gmail.com', 'KAB. BANDUNG', '2022-03-29', NULL, 'y', 0),
(103, 8, '1010202206', 'RANI RIFFANI', '0000-00-00', '0822237001728', '0822237001728', 'raniriff@gmail.com', 'KAB. BANDUNG', '2022-03-29', NULL, 'y', 0),
(104, 8, '1010202207', 'RIZKI EGI ', '0000-00-00', '0891278318723', '0892831238723', 'egi.rizki@gmail.com', 'KOTA CIMAHI', '2022-03-29', NULL, 'y', 0),
(105, 8, '1010202208', 'SITHA RAMADHANI A.', '0000-00-00', '087623918732', '0891278318723', 'ramasd123@gmail.com', 'KOTA CIMAHI', '2022-03-29', NULL, 'y', 0),
(106, 8, '1010202209', 'ARIF HAKIM', '0000-00-00', '0822891238911', '0822891238911', 'arif_hakim@gmail.com', 'KOTA CIMAHI', '2022-03-29', NULL, 'y', 0),
(107, 8, '1010202210', 'ADI HARDIANSYAH', '0000-00-00', '0889263223683', '0889263223683', 'adihhardianr@gmail.com', 'KAB. BANDUNG BARAT', '2022-03-29', NULL, 'y', 0),
(108, 8, '1010202211', 'NANDANG', '0000-00-00', '0898298332323', '0898298332323', 'nandang@gmail.com', 'KAB. BANDUNG BARAT', '2022-03-29', NULL, 'y', 0);

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
(1, 1, '2022-03-24'),
(2, 1, '2022-03-25'),
(3, 1, '2022-03-26'),
(4, 1, '2022-03-27'),
(5, 1, '2022-03-28'),
(6, 1, '2022-03-29'),
(7, 2, '2022-03-24'),
(8, 2, '2022-03-25'),
(9, 3, '2022-03-24'),
(10, 3, '2022-03-25'),
(11, 4, '2022-03-21'),
(12, 4, '2022-03-22'),
(13, 4, '2022-03-23'),
(14, 4, '2022-03-24'),
(15, 4, '2022-03-25'),
(16, 4, '2022-03-26'),
(17, 4, '2022-03-27'),
(18, 4, '2022-03-28'),
(19, 5, '2022-03-28'),
(20, 5, '2022-03-29'),
(21, 5, '2022-03-30'),
(22, 5, '2022-03-31'),
(23, 5, '2022-04-01'),
(24, 5, '2022-04-02'),
(25, 5, '2022-04-03'),
(26, 5, '2022-04-04'),
(27, 6, '2022-03-25'),
(28, 6, '2022-03-26'),
(29, 6, '2022-03-27'),
(30, 6, '2022-03-28'),
(31, 6, '2022-03-29'),
(32, 6, '2022-03-30'),
(33, 6, '2022-03-31'),
(34, 6, '2022-04-01'),
(35, 6, '2022-04-02'),
(36, 6, '2022-04-03'),
(37, 6, '2022-04-04'),
(38, 6, '2022-04-05'),
(39, 6, '2022-04-06'),
(40, 6, '2022-04-07'),
(41, 6, '2022-04-08'),
(42, 6, '2022-04-09'),
(43, 6, '2022-04-10'),
(44, 6, '2022-04-11'),
(45, 6, '2022-04-12'),
(46, 6, '2022-04-13'),
(47, 6, '2022-04-14'),
(48, 6, '2022-04-15'),
(49, 6, '2022-04-16'),
(50, 6, '2022-04-17'),
(51, 6, '2022-04-18'),
(52, 6, '2022-04-19'),
(53, 6, '2022-04-20'),
(54, 6, '2022-04-21'),
(55, 6, '2022-04-22'),
(56, 6, '2022-04-23'),
(57, 6, '2022-04-24'),
(58, 6, '2022-04-25'),
(59, 6, '2022-04-26'),
(60, 7, '2022-03-26'),
(61, 7, '2022-03-27'),
(62, 7, '2022-03-28'),
(63, 7, '2022-03-29'),
(64, 8, '2022-03-29'),
(65, 8, '2022-03-30'),
(66, 8, '2022-03-31'),
(67, 8, '2022-04-01'),
(68, 8, '2022-04-02'),
(69, 8, '2022-04-03'),
(70, 8, '2022-04-04'),
(71, 8, '2022-04-05'),
(72, 8, '2022-04-06'),
(73, 8, '2022-04-07'),
(74, 8, '2022-04-08'),
(75, 8, '2022-04-09'),
(76, 8, '2022-04-10'),
(77, 8, '2022-04-11'),
(78, 8, '2022-04-12'),
(79, 8, '2022-04-13'),
(80, 8, '2022-04-14'),
(81, 8, '2022-04-15'),
(82, 8, '2022-04-16'),
(83, 8, '2022-04-17'),
(84, 8, '2022-04-18'),
(85, 8, '2022-04-19'),
(86, 8, '2022-04-20'),
(87, 8, '2022-04-21'),
(88, 8, '2022-04-22'),
(89, 8, '2022-04-23'),
(90, 8, '2022-04-24'),
(91, 8, '2022-04-25'),
(92, 8, '2022-04-26'),
(93, 8, '2022-04-27'),
(94, 8, '2022-04-28'),
(95, 8, '2022-04-29');

-- --------------------------------------------------------

--
-- Table structure for table `tb_profesi_pdd`
--

CREATE TABLE `tb_profesi_pdd` (
  `id_profesi_pdd` int(11) NOT NULL,
  `nama_profesi_pdd` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_profesi_pdd`
--

INSERT INTO `tb_profesi_pdd` (`id_profesi_pdd`, `nama_profesi_pdd`) VALUES
(0, '-- Lainnya --'),
(1, 'Program Pendidikan Dokter Spesialis (PPDS)'),
(2, 'Program Studi Pendidikan Dokter (PSPD) / Co-ass'),
(3, 'Apoteker'),
(4, 'Psikolog Klinik'),
(5, 'Ners');

-- --------------------------------------------------------

--
-- Table structure for table `tb_tarif`
--

CREATE TABLE `tb_tarif` (
  `id_tarif` int(11) NOT NULL,
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
  `tgl_tambah_tarif` date DEFAULT NULL,
  `status_tarif` enum('y','t') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_tarif`
--

INSERT INTO `tb_tarif` (`id_tarif`, `nama_tarif`, `id_tarif_satuan`, `ket_tarif`, `jumlah_tarif`, `tipe_tarif`, `frekuensi_tarif`, `kuantitas_tarif`, `id_jurusan_pdd`, `id_jenjang_pdd`, `id_spesifikasi_pdd`, `id_tarif_jenis`, `pilih_tarif`, `tgl_tambah_tarif`, `status_tarif`) VALUES
(1, 'Institusional Fee', 1, NULL, 50000, 'SEKALI', 0, 0, 1, 0, 0, 1, 1, NULL, 'y'),
(2, 'Management Fee', 1, NULL, 75000, 'SEKALI', 0, 0, 1, 0, 0, 1, 1, NULL, 'y'),
(3, 'Alat Tulis Kantor', 1, NULL, 5000, 'SEKALI', 0, 0, 1, 0, 0, 1, 1, NULL, 'y'),
(4, 'Untuk Keselamatan Kerja (Handrub, tisue, sabun)', 1, NULL, 5000, 'SEKALI', 0, 0, 1, 0, 0, 2, 1, NULL, 'y'),
(5, 'Orientasi Keselamatan Pasien', 1, NULL, 10000, 'SEKALI', 0, 0, 1, 0, 0, 3, 1, NULL, 'y'),
(6, 'Log Book (dibayar 1 kali)', 1, NULL, 20000, 'SEKALI', 0, 0, 1, 0, 0, 3, 1, NULL, 'y'),
(7, 'Name Tag (dibayar 1 kali)', 1, NULL, 5000, 'SEKALI', 0, 0, 1, 0, 0, 3, 1, NULL, 'y'),
(8, 'Clinical science session (CSS)', 2, NULL, 37500, 'SEKALI', 0, 0, 1, 0, 0, 4, 1, NULL, 'y'),
(9, 'Case report session (CRS)', 2, NULL, 37500, 'SEKALI', 0, 0, 1, 0, 0, 4, 1, NULL, 'y'),
(10, 'Case base Discusion (CBD)', 2, NULL, 37500, 'SEKALI', 0, 0, 1, 0, 0, 4, 1, NULL, 'y'),
(11, 'Pengayaan - Observasi', 2, NULL, 37500, 'SEKALI', 0, 0, 1, 0, 0, 4, 1, NULL, 'y'),
(13, 'Bed side teaching (BST)- Visite Besar-Role Model - Pembimbingan Kedokteran Umum di IGD', 2, NULL, 37500, 'SEKALI', 0, 0, 1, 0, 0, 4, 1, NULL, 'y'),
(14, 'Mini Clinical Examination  Evaluation (Mini CeX)', 2, NULL, 150000, 'SEKALI', 0, 0, 1, 0, 0, 6, 1, NULL, 'y'),
(15, 'Ujian', 2, NULL, 150000, 'SEKALI', 0, 0, 1, 0, 0, 6, 1, NULL, 'y'),
(16, 'Makan Pembimbing Ujian', 2, NULL, 20000, 'SEKALI', 0, 0, 1, 0, 0, 6, 1, NULL, 'y'),
(17, 'Standar Pasien', 2, NULL, 100000, 'SEKALI', 0, 0, 1, 0, 0, 6, 1, NULL, 'y'),
(18, 'Institusional Fee', 1, NULL, 20000, 'SEKALI', 0, 0, 2, 0, 0, 1, 1, NULL, 'y'),
(19, 'Management Fee', 1, NULL, 20000, 'SEKALI', 0, 0, 2, 0, 0, 1, 1, NULL, 'y'),
(20, 'Untuk Keselamatan Kerja (Handrub, tisue, sabun)', 1, NULL, 20000, 'SEKALI', 0, 0, 2, 0, 0, 2, 1, NULL, 'y'),
(21, 'Orientasi ', 3, NULL, 75000, 'SEKALI', 1, 1, 2, 0, 0, 3, 1, NULL, 'y'),
(22, 'Keselamatan Pasien', 3, NULL, 150000, 'SEKALI', 0, 0, 2, 0, 0, 3, 1, NULL, 't'),
(23, 'Log Book (dibayar 1 kali)', 1, NULL, 20000, 'SEKALI', 0, 0, 2, 0, 0, 3, 1, NULL, 't'),
(24, 'Name Tag (dibayar 1 kali)', 1, NULL, 10000, 'SEKALI', 0, 0, 2, 0, 0, 3, 1, NULL, 'y'),
(26, 'Materi', 3, 'TAK, Komunikasi Terapeutik, Dokumentasi Keperawatanan', 150000, '-- LAINNYA --', 3, 1, 2, 0, 0, 4, 1, NULL, 'y'),
(27, 'Ujian', 4, NULL, 150000, 'SEKALI', 0, 0, 2, 0, 0, 6, 1, NULL, 'y'),
(28, 'Makan dan Snack Penguji', 5, NULL, 20000, 'SEKALI', 0, 0, 2, 0, 0, 6, 1, NULL, 'y'),
(29, 'Bahan Habis Pakai Ujian', 2, NULL, 100000, 'SEKALI', 0, 0, 2, 0, 0, 6, 1, NULL, 'y'),
(30, 'Institusional Fee Ujian', 6, NULL, 150000, 'SEKALI', 0, 0, 2, 0, 0, 6, 1, NULL, 'y'),
(31, 'Management Fee Ujian', 6, NULL, 20000, 'SEKALI', 0, 0, 2, 0, 0, 6, 1, NULL, 'y'),
(32, 'Bed side teaching (BST) / Bimbingan', 13, NULL, 50000, 'MINGGUAN', 0, 0, 2, 6, 0, 4, 2, NULL, 'y'),
(33, 'Bed side teaching (BST) / Bimbingan', 13, NULL, 75000, 'MINGGUAN', 0, 0, 2, 7, 0, 4, 2, NULL, 'y'),
(34, 'Bed side teaching (BST) / Bimbingan', 13, NULL, 75000, 'MINGGUAN', 0, 0, 2, 8, 0, 4, 2, NULL, 'y'),
(35, 'Bed side teaching (BST) / Bimbingan', 13, NULL, 75000, 'MINGGUAN', 0, 0, 2, 9, 0, 4, 2, NULL, 'y'),
(36, 'Institusional Fee', 1, NULL, 20000, 'SEKALI', 0, 0, 3, 0, 0, 1, 1, NULL, 'y'),
(37, 'Management Fee', 1, NULL, 20000, 'SEKALI', 0, 0, 3, 0, 0, 1, 1, NULL, 'y'),
(38, 'Untuk Keselamatan Kerja (Handrub, tisue, sabun)', 1, NULL, 20000, 'SEKALI', 0, 0, 3, 0, 0, 2, 1, NULL, 'y'),
(39, 'Orientasi ', 3, NULL, 75000, 'SEKALI', 1, 1, 3, 0, 0, 3, 1, NULL, 'y'),
(40, 'Keselamatan Pasien', 3, NULL, 150000, 'SEKALI', 0, 0, 3, 0, 0, 3, 1, NULL, 't'),
(41, 'Log Book (dibayar 1 kali)', 1, NULL, 20000, 'SEKALI', 0, 0, 3, 0, 0, 3, 1, NULL, 't'),
(42, 'Name Tag (dibayar 1 kali)', 1, NULL, 10000, 'SEKALI', 0, 0, 3, 0, 0, 3, 1, NULL, 'y'),
(45, 'Ujian', 4, NULL, 150000, 'SEKALI', 0, 0, 3, 0, 0, 6, 1, NULL, 'y'),
(46, 'Makan dan Snack Penguji', 5, NULL, 20000, 'SEKALI', 0, 0, 3, 0, 0, 6, 1, NULL, 'y'),
(47, 'Bahan Habis Pakai Ujian', 2, NULL, 100000, 'SEKALI', 0, 0, 3, 0, 0, 6, 1, NULL, 'y'),
(48, 'Institusional Fee Ujian', 6, NULL, 150000, 'SEKALI', 0, 0, 3, 0, 0, 6, 1, NULL, 'y'),
(49, 'Management Fee Ujian', 6, NULL, 20000, 'SEKALI', 0, 0, 3, 0, 0, 6, 1, NULL, 'y'),
(50, 'Bed side teaching (BST) / Bimbingan', 13, NULL, 50000, 'MINGGUAN', 0, 0, 3, 6, 0, 4, 2, NULL, 'y'),
(51, 'Bed side teaching (BST) / Bimbingan', 13, NULL, 75000, 'MINGGUAN', 0, 0, 3, 7, 0, 4, 2, NULL, 'y'),
(52, 'Bed side teaching (BST) / Bimbingan', 13, NULL, 75000, 'MINGGUAN', 0, 0, 3, 8, 0, 4, 2, NULL, 'y'),
(53, 'Bed side teaching (BST) / Bimbingan', 13, NULL, 75000, 'MINGGUAN', 0, 0, 3, 9, 0, 4, 2, NULL, 'y'),
(54, 'Institusional Fee', 1, NULL, 20000, 'SEKALI', 0, 0, 4, 0, 0, 1, 1, NULL, 'y'),
(55, 'Management Fee', 1, NULL, 20000, 'SEKALI', 0, 0, 4, 0, 0, 1, 1, NULL, 'y'),
(56, 'Untuk Keselamatan Kerja (Handrub, tisue, sabun)', 1, NULL, 20000, 'SEKALI', 0, 0, 4, 0, 0, 2, 1, NULL, 'y'),
(57, 'Orientasi ', 3, NULL, 75000, 'SEKALI', 1, 1, 4, 0, 0, 3, 1, NULL, 'y'),
(58, 'Keselamatan Pasien', 3, NULL, 150000, 'SEKALI', 0, 0, 4, 0, 0, 3, 1, NULL, 't'),
(59, 'Log Book (dibayar 1 kali)', 1, NULL, 20000, 'SEKALI', 0, 0, 4, 0, 0, 3, 1, NULL, 't'),
(60, 'Name Tag (dibayar 1 kali)', 1, NULL, 10000, 'SEKALI', 0, 0, 4, 0, 0, 3, 1, NULL, 'y'),
(63, 'Ujian', 4, NULL, 150000, 'SEKALI', 0, 0, 4, 0, 0, 6, 1, NULL, 'y'),
(64, 'Makan dan Snack Penguji', 5, NULL, 20000, 'SEKALI', 0, 0, 4, 0, 0, 6, 1, NULL, 'y'),
(65, 'Bahan Habis Pakai Ujian', 2, NULL, 100000, 'SEKALI', 0, 0, 4, 0, 0, 6, 1, NULL, 'y'),
(66, 'Institusional Fee Ujian', 6, NULL, 150000, 'SEKALI', 0, 0, 4, 0, 0, 6, 1, NULL, 'y'),
(67, 'Management Fee Ujian', 6, NULL, 20000, 'SEKALI', 0, 0, 4, 0, 0, 6, 1, NULL, 'y'),
(68, 'Bed side teaching (BST) / Bimbingan', 13, NULL, 50000, 'MINGGUAN', 0, 0, 4, 6, 0, 4, 2, NULL, 'y'),
(69, 'Bed side teaching (BST) / Bimbingan', 13, NULL, 75000, 'MINGGUAN', 0, 0, 4, 7, 0, 4, 2, NULL, 'y'),
(70, 'Bed side teaching (BST) / Bimbingan', 13, NULL, 75000, 'MINGGUAN', 0, 0, 4, 8, 0, 4, 2, NULL, 'y'),
(71, 'Bed side teaching (BST) / Bimbingan', 13, NULL, 75000, 'MINGGUAN', 0, 0, 4, 9, 0, 4, 2, NULL, 'y'),
(72, 'Institusional Fee', 1, NULL, 20000, 'SEKALI', 0, 0, 5, 0, 0, 1, 1, NULL, 'y'),
(73, 'Management Fee', 1, NULL, 20000, 'SEKALI', 0, 0, 5, 0, 0, 1, 1, NULL, 'y'),
(74, 'Untuk Keselamatan Kerja (Handrub, tisue, sabun)', 1, NULL, 20000, 'SEKALI', 0, 0, 5, 0, 0, 2, 1, NULL, 'y'),
(75, 'Orientasi ', 3, NULL, 75000, 'SEKALI', 1, 1, 5, 0, 0, 3, 1, NULL, 'y'),
(76, 'Keselamatan Pasien', 3, NULL, 150000, 'SEKALI', 0, 0, 5, 0, 0, 3, 1, NULL, 't'),
(77, 'Log Book (dibayar 1 kali)', 1, NULL, 20000, 'SEKALI', 0, 0, 5, 0, 0, 3, 1, NULL, 't'),
(78, 'Name Tag (dibayar 1 kali)', 1, NULL, 10000, 'SEKALI', 0, 0, 5, 0, 0, 3, 1, NULL, 'y'),
(80, 'Ujian', 4, NULL, 150000, 'SEKALI', 0, 0, 5, 0, 0, 6, 1, NULL, 'y'),
(81, 'Makan dan Snack Penguji', 5, NULL, 20000, 'SEKALI', 0, 0, 5, 0, 0, 6, 1, NULL, 'y'),
(82, 'Bahan Habis Pakai Ujian', 2, NULL, 100000, 'SEKALI', 0, 0, 5, 0, 0, 6, 1, NULL, 'y'),
(83, 'Institusional Fee Ujian', 6, NULL, 150000, 'SEKALI', 0, 0, 5, 0, 0, 6, 1, NULL, 'y'),
(84, 'Management Fee Ujian', 6, NULL, 20000, 'SEKALI', 0, 0, 5, 0, 0, 6, 1, NULL, 'y'),
(85, 'Bed side teaching (BST) / Bimbingan', 13, NULL, 50000, 'MINGGUAN', 0, 0, 5, 6, 0, 4, 2, NULL, 'y'),
(86, 'Bed side teaching (BST) / Bimbingan', 13, NULL, 75000, 'MINGGUAN', 0, 0, 5, 7, 0, 4, 2, NULL, 'y'),
(87, 'Bed side teaching (BST) / Bimbingan', 13, NULL, 75000, 'MINGGUAN', 0, 0, 5, 8, 0, 4, 2, NULL, 'y'),
(88, 'Bed side teaching (BST) / Bimbingan', 13, NULL, 75000, 'MINGGUAN', 0, 0, 5, 9, 0, 4, 2, NULL, 'y'),
(89, 'Institusional Fee', 1, NULL, 20000, 'SEKALI', 0, 0, 6, 0, 0, 1, 1, NULL, 'y'),
(90, 'Management Fee', 1, NULL, 20000, 'SEKALI', 0, 0, 6, 0, 0, 1, 1, NULL, 'y'),
(91, 'Untuk Keselamatan Kerja (Handrub, tisue, sabun)', 1, NULL, 20000, 'SEKALI', 0, 0, 6, 0, 0, 2, 1, NULL, 'y'),
(92, 'Orientasi ', 3, NULL, 75000, 'SEKALI', 1, 1, 6, 0, 0, 3, 1, NULL, 'y'),
(93, 'Keselamatan Pasien', 3, NULL, 150000, 'SEKALI', 0, 0, 6, 0, 0, 3, 1, NULL, 't'),
(94, 'Log Book (dibayar 1 kali)', 1, NULL, 20000, 'SEKALI', 0, 0, 6, 0, 0, 3, 1, NULL, 't'),
(95, 'Name Tag (dibayar 1 kali)', 1, NULL, 10000, 'SEKALI', 0, 0, 6, 0, 0, 3, 1, NULL, 'y'),
(97, 'Ujian', 4, NULL, 150000, 'SEKALI', 0, 0, 6, 0, 0, 6, 1, NULL, 'y'),
(98, 'Makan dan Snack Penguji', 5, NULL, 20000, 'SEKALI', 0, 0, 6, 0, 0, 6, 1, NULL, 'y'),
(99, 'Bahan Habis Pakai Ujian', 2, NULL, 100000, 'SEKALI', 0, 0, 6, 0, 0, 6, 1, NULL, 'y'),
(100, 'Institusional Fee Ujian', 6, NULL, 150000, 'SEKALI', 0, 0, 6, 0, 0, 6, 1, NULL, 'y'),
(101, 'Management Fee Ujian', 6, NULL, 20000, 'SEKALI', 0, 0, 6, 0, 0, 6, 1, NULL, 'y'),
(102, 'Bed side teaching (BST)  / Bimbingan', 13, NULL, 50000, 'MINGGUAN', 0, 0, 6, 6, 0, 4, 2, NULL, 'y'),
(103, 'Bed side teaching (BST)  / Bimbingan', 13, NULL, 75000, 'MINGGUAN', 0, 0, 6, 7, 0, 4, 2, NULL, 'y'),
(104, 'Bed side teaching (BST) / Bimbingan', 13, NULL, 75000, 'MINGGUAN', 0, 0, 6, 8, 0, 4, 2, NULL, 'y'),
(105, 'Bed side teaching (BST) / Bimbingan', 13, NULL, 75000, 'MINGGUAN', 0, 0, 6, 9, 0, 4, 2, NULL, 'y'),
(106, 'Institusional Fee', 1, NULL, 20000, 'SEKALI', 0, 0, 7, 0, 0, 1, 1, NULL, 'y'),
(107, 'Management Fee', 1, NULL, 20000, 'SEKALI', 0, 0, 7, 0, 0, 1, 1, NULL, 'y'),
(108, 'Untuk Keselamatan Kerja (Handrub, tisue, sabun)', 1, NULL, 20000, 'SEKALI', 0, 0, 7, 0, 0, 2, 1, NULL, 'y'),
(109, 'Orientasi ', 3, NULL, 75000, 'SEKALI', 1, 1, 7, 0, 0, 3, 1, NULL, 'y'),
(110, 'Keselamatan Pasien', 3, NULL, 150000, 'SEKALI', 0, 0, 7, 0, 0, 3, 1, NULL, 't'),
(111, 'Log Book (dibayar 1 kali)', 1, NULL, 20000, 'SEKALI', 0, 0, 7, 0, 0, 3, 1, NULL, 't'),
(112, 'Name Tag (dibayar 1 kali)', 1, NULL, 10000, 'SEKALI', 0, 0, 7, 0, 0, 3, 1, NULL, 'y'),
(113, 'Ujian', 4, NULL, 150000, 'SEKALI', 0, 0, 7, 0, 0, 6, 1, NULL, 'y'),
(114, 'Makan dan Snack Penguji', 5, NULL, 20000, 'SEKALI', 0, 0, 7, 0, 0, 6, 1, NULL, 'y'),
(115, 'Bahan Habis Pakai Ujian', 2, NULL, 100000, 'SEKALI', 0, 0, 7, 0, 0, 6, 1, NULL, 'y'),
(116, 'Institusional Fee Ujian', 6, NULL, 150000, 'SEKALI', 0, 0, 7, 0, 0, 6, 1, NULL, 'y'),
(117, 'Management Fee Ujian', 6, NULL, 20000, 'SEKALI', 0, 0, 7, 0, 0, 6, 1, NULL, 'y'),
(118, 'Bed side teaching (BST) / Bimbingan', 13, NULL, 50000, 'MINGGUAN', 0, 0, 7, 6, 0, 4, 2, NULL, 'y'),
(119, 'Bed side teaching (BST) / Bimbingan', 13, NULL, 75000, 'MINGGUAN', 0, 0, 7, 7, 0, 4, 2, NULL, 'y'),
(120, 'Bed side teaching (BST) / Bimbingan', 13, NULL, 75000, 'MINGGUAN', 0, 0, 7, 8, 0, 4, 2, NULL, 'y'),
(121, 'Bed side teaching (BST) / Bimbingan', 13, NULL, 75000, 'MINGGUAN', 0, 0, 7, 9, 0, 4, 2, NULL, 'y'),
(122, 'Management Fee', 1, NULL, 20000, 'SEKALI', 0, 0, 8, 0, 0, 1, 1, NULL, 'y'),
(123, 'Untuk Keselamatan Kerja (Handrub, tisue, sabun)', 1, NULL, 20000, 'SEKALI', 0, 0, 8, 0, 0, 2, 1, NULL, 'y'),
(124, 'Orientasi ', 3, NULL, 75000, 'SEKALI', 1, 1, 8, 0, 0, 3, 1, NULL, 'y'),
(125, 'Keselamatan Pasien', 3, NULL, 150000, 'SEKALI', 0, 0, 8, 0, 0, 3, 1, NULL, 't'),
(126, 'Log Book (dibayar 1 kali)', 1, NULL, 20000, 'SEKALI', 0, 0, 8, 0, 0, 3, 1, NULL, 't'),
(127, 'Name Tag (dibayar 1 kali)', 1, NULL, 10000, 'SEKALI', 0, 0, 8, 0, 0, 3, 1, NULL, 'y'),
(128, 'Ujian', 4, NULL, 150000, 'SEKALI', 0, 0, 8, 0, 0, 6, 1, NULL, 'y'),
(129, 'Makan dan Snack Penguji', 5, NULL, 20000, 'SEKALI', 0, 0, 8, 0, 0, 6, 1, NULL, 'y'),
(130, 'Bahan Habis Pakai Ujian', 2, NULL, 100000, 'SEKALI', 0, 0, 8, 0, 0, 6, 1, NULL, 'y'),
(131, 'Institusional Fee Ujian', 6, NULL, 150000, 'SEKALI', 0, 0, 8, 0, 0, 6, 1, NULL, 'y'),
(132, 'Management Fee Ujian', 6, NULL, 20000, 'SEKALI', 0, 0, 8, 0, 0, 6, 1, NULL, 'y'),
(133, 'Bed side teaching (BST)', 13, NULL, 50000, 'MINGGUAN', 0, 0, 8, 6, 0, 4, 2, NULL, 'y'),
(134, 'Bed side teaching (BST)', 13, NULL, 75000, 'MINGGUAN', 0, 0, 8, 7, 0, 4, 2, NULL, 'y'),
(135, 'Bed side teaching (BST)', 13, NULL, 75000, 'MINGGUAN', 0, 0, 8, 8, 0, 4, 2, NULL, 'y'),
(136, 'Bed side teaching (BST)', 13, NULL, 75000, 'MINGGUAN', 0, 0, 8, 9, 0, 4, 2, NULL, 'y');

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
  `ujian_tarif_pilih` text DEFAULT NULL,
  `mess_tarif_pilih` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_tarif_pilih`
--

INSERT INTO `tb_tarif_pilih` (`id_tarif_pilih`, `id_praktik`, `tgl_input_tarif_pilih`, `tgl_ubah_tarif_pilih`, `nama_jenis_tarif_pilih`, `nama_tarif_pilih`, `nominal_tarif_pilih`, `nama_satuan_tarif_pilih`, `frekuensi_tarif_pilih`, `kuantitas_tarif_pilih`, `jumlah_tarif_pilih`, `ujian_tarif_pilih`, `mess_tarif_pilih`) VALUES
(1, 3, '2022-03-24', NULL, 'Pemakaian Kekayaan Daerah', 'Asrama Rifa Corporate (Dengan Makan 3x Sehari)', 80000, 'persiswa/hari', 2, 7, 1120000, NULL, NULL),
(2, 3, '2022-03-25', NULL, 'Administrasi', 'Alat Tulis Kantor', 5000, 'persiswa/periode', 6, 37, 1110000, NULL, NULL),
(3, 3, '2022-03-25', NULL, 'Administrasi', 'Institusional Fee', 50000, 'persiswa/periode', 16, 36, 28800000, NULL, NULL),
(4, 3, '2022-03-25', NULL, 'Administrasi', 'Management Fee', 75000, 'persiswa/periode', 52, 5, 19500000, NULL, NULL),
(5, 3, '2022-03-25', NULL, 'Barang Habis Pakai', 'Untuk Keselamatan Kerja (Handrub, tisue, sabun)', 5000, 'persiswa/periode', 2, 87, 870000, NULL, NULL),
(6, 3, '2022-03-25', NULL, 'Overhead Operational', 'Log Book (dibayar 1 kali)', 20000, 'persiswa/periode', 36, 64, 46080000, NULL, NULL),
(7, 3, '2022-03-25', NULL, 'Overhead Operational', 'Name Tag (dibayar 1 kali)', 5000, 'persiswa/periode', 48, 74, 17760000, NULL, NULL),
(8, 3, '2022-03-25', NULL, 'Overhead Operational', 'Orientasi Keselamatan Pasien', 10000, 'persiswa/periode', 89, 84, 74760000, NULL, NULL),
(9, 3, '2022-03-25', NULL, 'Pembelajaran', 'Bed side teaching (BST)- Visite Besar-Role Model - Pembimbingan Kedokteran Umum di IGD', 37500, 'persiswa/kali', 25, 9, 8437500, NULL, NULL),
(10, 3, '2022-03-25', NULL, 'Pembelajaran', 'Case base Discusion (CBD)', 37500, 'persiswa/kali', 59, 29, 64162500, NULL, NULL),
(11, 3, '2022-03-25', NULL, 'Pembelajaran', 'Case report session (CRS)', 37500, 'persiswa/kali', 47, 19, 33487500, NULL, NULL),
(12, 3, '2022-03-25', NULL, 'Pembelajaran', 'Clinical science session (CSS)', 37500, 'persiswa/kali', 22, 89, 73425000, NULL, NULL),
(13, 3, '2022-03-25', NULL, 'Pembelajaran', 'Pengayaan - Observasi', 37500, 'persiswa/kali', 12, 45, 20250000, NULL, NULL),
(14, 3, '2022-03-25', NULL, 'Pemakaian Kekayaan Daerah', 'Ruang Kelas/Ruang Diskusi', 30000, 'persiswa/hari', 59, 29, 51330000, NULL, NULL),
(15, 5, '2022-03-25', NULL, 'Pemakaian Kekayaan Daerah', 'Mess RSJ 2 Baru (Tanpa Makan)', 20000, 'persiswa/hari', 8, 31, 4960000, NULL, NULL),
(16, 6, '2022-03-25', NULL, 'Administrasi', 'Institusional Fee', 20000, 'persiswa/periode', 1, 7, 140000, NULL, NULL),
(17, 6, '2022-03-25', NULL, 'Administrasi', 'Management Fee', 20000, 'persiswa/periode', 1, 7, 140000, NULL, NULL),
(18, 6, '2022-03-25', NULL, 'Barang Habis Pakai', 'Untuk Keselamatan Kerja (Handrub, tisue, sabun)', 20000, 'persiswa/periode', 1, 7, 140000, NULL, NULL),
(19, 6, '2022-03-25', NULL, 'Overhead Operational', 'Name Tag (dibayar 1 kali)', 10000, 'persiswa/periode', 1, 7, 70000, NULL, NULL),
(20, 6, '2022-03-25', NULL, 'Overhead Operational', 'Orientasi ', 75000, 'perperiode/kali', 1, 1, 75000, NULL, NULL),
(21, 6, '2022-03-25', NULL, 'Pembelajaran', 'Bed side teaching (BST) / Bimbingan', 75000, 'persiswa/minggu', 5, 7, 2625000, NULL, NULL),
(22, 6, '2022-03-25', NULL, 'Ujian', 'Ujian', 150000, 'persiswa/hari', 1, 7, 1050000, 'y', NULL),
(23, 6, '2022-03-25', NULL, 'Ujian', 'Makan dan Snack Penguji', 20000, 'perpenguji/kali', 1, 7, 140000, 'y', NULL),
(24, 6, '2022-03-25', NULL, 'Ujian', 'Bahan Habis Pakai Ujian', 100000, 'persiswa/kali', 1, 7, 700000, 'y', NULL),
(25, 6, '2022-03-25', NULL, 'Ujian', 'Institusional Fee Ujian', 150000, 'persiswa/periode ujian', 1, 7, 1050000, 'y', NULL),
(26, 6, '2022-03-25', NULL, 'Ujian', 'Management Fee Ujian', 20000, 'persiswa/periode ujian', 1, 7, 140000, 'y', NULL),
(27, 6, '2022-03-25', NULL, 'Pemakaian Kekayaan Daerah', 'Mess RSJ 1 Lama (Dengan Makan 3x Sehari)', 100000, 'persiswa/hari', 33, 7, 23100000, NULL, 'y'),
(28, 7, '2022-03-26', NULL, 'Administrasi', 'Institusional Fee', 20000, 'persiswa/periode', 1, 7, 140000, NULL, NULL),
(29, 7, '2022-03-26', NULL, 'Administrasi', 'Management Fee', 20000, 'persiswa/periode', 1, 7, 140000, NULL, NULL),
(30, 7, '2022-03-26', NULL, 'Barang Habis Pakai', 'Untuk Keselamatan Kerja (Handrub, tisue, sabun)', 20000, 'persiswa/periode', 1, 7, 140000, NULL, NULL),
(31, 7, '2022-03-26', NULL, 'Overhead Operational', 'Name Tag (dibayar 1 kali)', 10000, 'persiswa/periode', 1, 7, 70000, NULL, NULL),
(32, 7, '2022-03-26', NULL, 'Overhead Operational', 'Orientasi ', 75000, 'perperiode/kali', 1, 1, 75000, NULL, NULL),
(33, 7, '2022-03-26', NULL, 'Pembelajaran', 'Materi (TAK, Komunikasi Terapeutik, Dokumentasi Keperawatanan, UPIP, NAPZA)', 150000, 'perperiode/kali', 5, 1, 750000, NULL, NULL),
(34, 7, '2022-03-26', NULL, 'Pembelajaran', 'Bed side teaching (BST) / Bimbingan', 75000, 'persiswa/minggu', 1, 7, 525000, NULL, NULL),
(35, 7, '2022-03-26', NULL, 'Ujian', 'Ujian', 150000, 'persiswa/hari', 1, 7, 1050000, 'y', NULL),
(36, 7, '2022-03-26', NULL, 'Ujian', 'Makan dan Snack Penguji', 20000, 'perpenguji/kali', 1, 7, 140000, 'y', NULL),
(37, 7, '2022-03-26', NULL, 'Ujian', 'Bahan Habis Pakai Ujian', 100000, 'persiswa/kali', 1, 7, 700000, 'y', NULL),
(38, 7, '2022-03-26', NULL, 'Ujian', 'Institusional Fee Ujian', 150000, 'persiswa/periode ujian', 1, 7, 1050000, 'y', NULL),
(39, 7, '2022-03-26', NULL, 'Ujian', 'Management Fee Ujian', 20000, 'persiswa/periode ujian', 1, 7, 140000, 'y', NULL),
(40, 7, '2022-03-26', NULL, 'Pemakaian Kekayaan Daerah', 'Aula Napza', 750000, 'perperiode/kali', 1, 1, 750000, NULL, NULL),
(41, 7, '2022-03-26', NULL, 'Pemakaian Kekayaan Daerah', 'Mess RSJ 1 Lama (Dengan Makan 3x Sehari)', 100000, 'persiswa/hari', 4, 7, 2800000, NULL, 'y'),
(42, 8, '2022-03-29', NULL, 'Administrasi', 'Institusional Fee', 20000, 'persiswa/periode', 1, 11, 220000, NULL, NULL),
(43, 8, '2022-03-29', NULL, 'Administrasi', 'Management Fee', 20000, 'persiswa/periode', 1, 11, 220000, NULL, NULL),
(44, 8, '2022-03-29', NULL, 'Barang Habis Pakai', 'Untuk Keselamatan Kerja (Handrub, tisue, sabun)', 20000, 'persiswa/periode', 1, 11, 220000, NULL, NULL),
(45, 8, '2022-03-29', NULL, 'Overhead Operational', 'Name Tag (dibayar 1 kali)', 10000, 'persiswa/periode', 1, 11, 110000, NULL, NULL),
(46, 8, '2022-03-29', NULL, 'Overhead Operational', 'Orientasi ', 75000, 'perperiode/kali', 1, 1, 75000, NULL, NULL),
(47, 8, '2022-03-29', NULL, 'Pembelajaran', 'Materi (TAK, Komunikasi Terapeutik, Dokumentasi Keperawatanan, UPIP, NAPZA)', 150000, 'perperiode/kali', 5, 1, 750000, NULL, NULL),
(48, 8, '2022-03-29', NULL, 'Pembelajaran', 'Bed side teaching (BST) / Bimbingan', 75000, 'persiswa/minggu', 5, 11, 4125000, NULL, NULL),
(49, 8, '2022-03-29', NULL, 'Pemakaian Kekayaan Daerah', 'Aula Napza', 750000, 'perperiode/kali', 1, 1, 750000, NULL, NULL);

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
(1, 'persiswa/periode', NULL),
(2, 'persiswa/kali', NULL),
(3, 'perperiode/kali', NULL),
(4, 'persiswa/hari', NULL),
(5, 'perpenguji/kali', NULL),
(6, 'persiswa/periode ujian', NULL),
(7, 'perhari/keg', NULL),
(8, 'perminggu/orang', 'Mingguan dikali jumlah praktik'),
(13, 'persiswa/minggu', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_tempat`
--

CREATE TABLE `tb_tempat` (
  `id_tempat` int(11) NOT NULL,
  `id_tarif_jenis` int(11) NOT NULL,
  `nama_tempat` text NOT NULL,
  `kapasitas_tempat` int(11) NOT NULL,
  `id_jurusan_pdd_jenis` int(11) DEFAULT NULL,
  `tarif_tempat` int(11) NOT NULL,
  `id_tarif_satuan` int(11) NOT NULL,
  `tgl_input_tempat` date NOT NULL,
  `ket_tempat` text DEFAULT NULL,
  `status_tempat` enum('y','t') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_tempat`
--

INSERT INTO `tb_tempat` (`id_tempat`, `id_tarif_jenis`, `nama_tempat`, `kapasitas_tempat`, `id_jurusan_pdd_jenis`, `tarif_tempat`, `id_tarif_satuan`, `tgl_input_tempat`, `ket_tempat`, `status_tempat`) VALUES
(3, 7, 'Aula Utama', 40, 0, 1000000, 3, '2022-02-13', '-', 'y'),
(6, 7, 'Aula Napza', 40, 0, 750000, 3, '2022-02-13', '-', 'y'),
(9, 7, 'Ruang SPI', 20, 0, 500000, 3, '2022-02-13', '-', 'y'),
(10, 7, 'Ruang Kelas/Ruang Diskusi', 10, 1, 30000, 4, '2022-02-15', '-', 'y'),
(16, 7, 'Ruang Komite Medik', 15, 0, 750000, 3, '2022-02-13', '-', 'y');

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
  `nama_user` varchar(20) NOT NULL,
  `email_user` text NOT NULL,
  `level_user` enum('1','2') NOT NULL,
  `no_telp_user` text NOT NULL,
  `foto_user` text DEFAULT NULL,
  `terakhir_login_user` date DEFAULT NULL,
  `tgl_buat_user` date NOT NULL,
  `tgl_ubah_user` date DEFAULT NULL,
  `status_user` enum('Y','T') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `id_mou`, `id_institusi`, `username_user`, `password_user`, `nama_user`, `email_user`, `level_user`, `no_telp_user`, `foto_user`, `terakhir_login_user`, `tgl_buat_user`, `tgl_ubah_user`, `status_user`) VALUES
(1, 0, 0, 'admin', 'e1d5be1c7f2f456670de3d53c7b54f4a', 'ADMIN DIKLAT RS JIWA', 'admin@admin', '1', '08123145645', NULL, '2022-03-29', '2021-03-29', '2022-02-22', 'Y'),
(15, 1, 87, 'user', 'ee11cbb19052e40b07aac0ca060c23ee', 'USER INSTITUSI', 'asd@asd', '2', '091273', NULL, '2022-01-10', '2021-12-31', '2022-01-10', 'Y'),
(16, 0, 5, 'asalajah@gmail.com', 'e66ed49f9432f4ef78d0910ab7e31f57', 'Melly', 'asalajah@gmail.com', '2', '081123456789', NULL, '2022-01-05', '2022-01-05', NULL, 'Y'),
(17, 0, 3, 'diklit.rsj.jabarprov@gmail.com', '39b1f688752f9edb7e1283a4649f05a4', 'Rani', 'diklit.rsj.jabarprov@gmail.com', '2', '081320510201', NULL, '2022-01-05', '2022-01-05', NULL, 'Y'),
(18, 0, 19, 'ip', '81dc9bdb52d04dc20036dbd8313ed055', 'ip', 'ip@ip', '2', '012309', NULL, '2022-03-20', '2022-03-10', '2022-03-10', 'Y'),
(19, 0, 71, 'rr@gmail.com', '0cc175b9c0f1b6a831c399e269772661', 'Rani', 'rr@gmail.com', '2', '12345', NULL, '2022-03-15', '2022-03-15', NULL, 'Y'),
(20, 0, 68, 'r@gmail.com', '0cc175b9c0f1b6a831c399e269772661', 'Riffani', 'r@gmail.com', '2', '123', NULL, '2022-03-15', '2022-03-15', NULL, 'Y'),
(21, 0, 25, 'adeihsanmr@gmail.com', '202cb962ac59075b964b07152d234b70', 'ade', 'adeihsanmr@gmail.com', '2', '0000', NULL, '2022-03-15', '2022-03-15', NULL, 'Y');

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
-- Indexes for table `tb_jenis_mentor`
--
ALTER TABLE `tb_jenis_mentor`
  ADD PRIMARY KEY (`id_jenis_mentor`);

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
-- Indexes for table `tb_jurusan_pdd_jenjang_profesi`
--
ALTER TABLE `tb_jurusan_pdd_jenjang_profesi`
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
  MODIFY `id_bayar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_jenjang_pdd`
--
ALTER TABLE `tb_jenjang_pdd`
  MODIFY `id_jenjang_pdd` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

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
-- AUTO_INCREMENT for table `tb_kuota`
--
ALTER TABLE `tb_kuota`
  MODIFY `id_kuota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT for table `tb_lapor`
--
ALTER TABLE `tb_lapor`
  MODIFY `id_lapor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tb_mess`
--
ALTER TABLE `tb_mess`
  MODIFY `id_mess` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tb_mess_pilih`
--
ALTER TABLE `tb_mess_pilih`
  MODIFY `id_mess_pilih` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_mess_tgl`
--
ALTER TABLE `tb_mess_tgl`
  MODIFY `id_mess_tgl` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_mou`
--
ALTER TABLE `tb_mou`
  MODIFY `id_mou` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=130;

--
-- AUTO_INCREMENT for table `tb_nilai_kep`
--
ALTER TABLE `tb_nilai_kep`
  MODIFY `id_nilai_kep` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_nilai_upload`
--
ALTER TABLE `tb_nilai_upload`
  MODIFY `id_nilai_upload` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_pembimbing_pilih`
--
ALTER TABLE `tb_pembimbing_pilih`
  MODIFY `id_pembimbing_pilih` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tb_praktik`
--
ALTER TABLE `tb_praktik`
  MODIFY `id_praktik` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tb_praktikan`
--
ALTER TABLE `tb_praktikan`
  MODIFY `id_praktikan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;

--
-- AUTO_INCREMENT for table `tb_praktik_tgl`
--
ALTER TABLE `tb_praktik_tgl`
  MODIFY `id_praktik_tgl` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;

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
  MODIFY `id_tarif_pilih` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `tb_tarif_satuan`
--
ALTER TABLE `tb_tarif_satuan`
  MODIFY `id_tarif_satuan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tb_tempat`
--
ALTER TABLE `tb_tempat`
  MODIFY `id_tempat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tb_tempat_pilih`
--
ALTER TABLE `tb_tempat_pilih`
  MODIFY `id_tempat_pilih` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `test`
--
ALTER TABLE `test`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
