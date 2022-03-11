-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 11, 2022 at 10:43 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.34

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
(1, NULL, 1, 'B1220301', 'Ut error voluptatem ', 'Eius est est molest', 'Aut sunt ullam aliq', '1979-07-15', '2022-03-01', './_file/bayar/bayar_1_1_2022-03-01.pdf'),
(2, NULL, 1, 'B1220301', 'Pariatur In aliquid', 'Magna vero fugiat l', 'Dolore adipisicing l', '2022-10-01', '2022-03-01', './_file/bayar/bayar_2_1_2022-03-01.pdf'),
(3, NULL, 4, 'B4220303', 'Corporis a ad volupt', 'Aliquam irure illum', 'Nisi corporis offici', '2022-03-01', '2022-03-03', './_file/bayar/bayar_3_4_2022-03-03.pdf'),
(4, NULL, 7, 'B7220308', 'Dolores quasi atque ', 'Vel dicta anim volup', 'Saepe et aut dicta n', '2003-06-27', '2022-03-08', './_file/bayar/bayar_4_7_2022-03-08.pdf'),
(5, NULL, 8, 'B8220308', 'Modi dolor voluptate', 'Ut mollit aute et en', 'Cupidatat qui incidi', '1977-03-08', '2022-03-08', './_file/bayar/bayar_5_8_2022-03-08.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `tb_institusi`
--

CREATE TABLE `tb_institusi` (
  `id_institusi` int(11) NOT NULL,
  `nama_institusi` text NOT NULL,
  `akronim_institusi` text NOT NULL,
  `logo_institusi` text NOT NULL,
  `alamat_institusi` text NOT NULL,
  `ket_institusi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_institusi`
--

INSERT INTO `tb_institusi` (`id_institusi`, `nama_institusi`, `akronim_institusi`, `logo_institusi`, `alamat_institusi`, `ket_institusi`) VALUES
(1, 'AKADEMI PEREKAM MEDIS DAN INFORMATIKA KESEHATAN BANDUNG', 'APIKES BDG', './_img/logo_institusi/1.png', '', ''),
(2, 'AKPER AL-MA\'ARIF BATURAJA', '', '', '', ''),
(3, 'AKPER BHAKTI KENCANA BANDUNG', '', '', '', ''),
(4, 'AKPER BIDARA MUKTI GARUT', '', '', '', ''),
(5, 'AKPER BUNTET PESANTREN CIREBON', '', '', '', ''),
(6, 'AKPER DUSTIRA CIMAHI', '', '', '', ''),
(7, 'AKPER PEMERINTAH KABUPATEN CIANJUR', '', '', '', ''),
(8, 'AKPER KEBONJATI', '', '', '', ''),
(9, 'AKPER LUWUK', '', '', '', ''),
(10, 'AKPER PEMBINA PALEMBANG', '', '', '', ''),
(11, 'AKPER PEMDA KOLAKA', '', '', '', ''),
(12, 'AKPER PEMKAB LAHAT', '', '', '', ''),
(13, 'AKPER RS. EFARINA PURWAKARTA', '', '', '', ''),
(14, 'AKPER SAIFUDDIN ZUHRI INDRAMAYU', '', '', '', ''),
(15, 'AKPER SAWERIGADING PEMDA LUWU RAYA PALOPO', '', '', '', ''),
(16, 'AKPER SINTANG', '', '', '', ''),
(17, 'AKPER TOLITOLI', '', '', '', ''),
(18, 'AKPER YPDR JAKARTA', '', '', '', ''),
(19, 'UNIVERSITAS KRISTEN MARANATHA', '', '', '', ''),
(20, 'UNIVERSITAS KRISTEN KRIDA WACANA', 'UKRIDA', './_img/logo_institusi/20.png', '', ''),
(21, 'UNIVERSITAS ISLAM BANDUNG', 'UNISBA', './_img/logo_institusi/21.png', '', ''),
(23, 'UNIVERSITAS PADJADJARAN', 'UNPAD', './_img/logo_institusi/23.png', '', ''),
(25, 'UNIVERSITAS JENDERAL ACHMAD YANI', 'UNJANI', './_img/logo_institusi/25.png', '', ''),
(26, 'POLTEKKES KEMENKES BANDUNG', '', '', '', ''),
(27, 'POLTEKKES TNI AU CIUMBULEUIT BANDUNG', '', '', '', ''),
(28, 'POLTEKKES BANTEN', '', '', '', ''),
(29, 'POLTEKKES KEMENKES MAKASSAR', '', '', '', ''),
(31, 'STIKES AISYIYAH BANDUNG', '', '', '', ''),
(32, 'STIKES BANI SALEH', '', '', '', ''),
(33, 'STIKES BHAKTI PERTIWI LUWU RAYA PALOPO', '', '', '', ''),
(34, 'STIKES BINA PUTERA BANJAR', '', '', '', ''),
(35, 'STIKES BORNEO TARAKAN', '', '', '', ''),
(36, 'STIKES BUDILUHUR CIMAHI', '', '', '', ''),
(37, 'STIKES CIREBON', '', '', '', ''),
(38, 'STIKES DEHASEN BENGKULU', '', '', '', ''),
(39, 'STIKES DHARMA HUSADA BANDUNG', '', '', '', ''),
(40, 'STIKES FALETEHAN', '', '', '', ''),
(41, 'STIKES FORT DE KOCK', '', '', '', ''),
(42, 'STIKES IMMANUEL BANDUNG', '', '', '', ''),
(43, 'STIKES JENDERAL AHMAD YANI', '', '', '', ''),
(44, 'STIKES KARSA HUSADA GARUT', '', '', '', ''),
(45, 'STIKES KOTA SUKABUMI', '', '', '', ''),
(46, 'STIKES KUNINGAN', '', '', '', ''),
(47, 'STIKES MAHARDIKA CIREBON', '', '', '', ''),
(48, 'STIKES MEDIKA CIKARANG / IMDS', '', '', '', ''),
(49, 'STIKES MITRA KENCANA TASIKMALAYA', '', '', '', ''),
(50, 'STIKES MUHAMADIYAH CIAMIS', '', '', '', ''),
(51, 'STIKES NAN TONGGA LUBUK ALUNG', '', '', '', ''),
(52, 'STIKES PPNI JAWA BARAT', '', '', '', ''),
(53, 'STIKES RAJAWALI', '', '', '', ''),
(54, 'STIKES SANTO BORROMEUS', '', '', '', ''),
(55, 'STIKES SEBELAS APRIL SUMEDANG', '', '', '', ''),
(56, 'STIKES SYEDZA SAINTIKA PADANG', '', '', '', ''),
(57, 'STIKES TANA TORAJA', '', '', '', ''),
(58, 'STIKES YARSI BUKIT TINGGI', '', '', '', ''),
(59, 'STIKES YARSI PONTIANAK', '', '', '', ''),
(60, 'STIKES YPIB MAJALENGKA', '', '', '', ''),
(61, 'UNIVERSITAS ADVENT INDONESIA', '', '', '', ''),
(62, 'UNIVERSITAS BALE BANDUNG', '', '', '', ''),
(63, 'UNIVERSITAS BINA SARANA INFORMATIKA', 'BSI', '', '', ''),
(64, 'UNIVERSITAS GALUH CIAMIS', '', '', '', ''),
(65, 'UNIVERSITAS MUHAMMADIYAH SUKABUMI', '', '', '', ''),
(66, 'UNIVERSITAS NEGERI GORONTALO', '', '', '', ''),
(68, 'UNIVERSITAS PENDIDIKAN INDONESIA', 'UPI', './_img/logo_institusi/68.png', '', ''),
(69, 'UNIVERSITAS RESPATI INDONESIA', '', '', '', ''),
(70, 'UNIVERSITAS SAMRATULANGI', '', '', '', ''),
(71, 'UNIVERSITAS SULTAN AGENG TIRTAYASA', 'UNTIRTA', '', '', ''),
(72, 'POLITEKNIK TEDC BANDUNG', '', '', '', ''),
(73, 'UNIVERSITAS PELITA HARAPAN', '', '', '', ''),
(74, 'POLTEKKES YAPKESBI SUKABUMI', '', '', '', ''),
(75, 'AKPER YPIB MAJALENGKA', '', '', '', ''),
(76, 'UNIVERSITAS MUHAMMADIYAH TASIKMALAYA', '', '', '', ''),
(78, 'POLITEKNIK NEGERI SUBANG', 'POLSUB', './_img/logo_institusi/78.png', '', ''),
(81, 'SEKOLAH TINGGI ILMU KESEHATAN INDONESIA MAJU', '', '', '', ''),
(82, 'UNIVERSITAS BHAKTI KENCANA', 'UBK', './_img/logo_institusi/82.png', '', ''),
(83, 'POLTEKKES KEMENKES JAYAPURA', '', '', '', ''),
(84, 'POLITEKNIK NEGERI INDRAMAYU', '', '', '', ''),
(85, 'UNIVERSITAS KRISTEN SATYA WACANA SALATIGA', '', '', '', ''),
(87, 'RS JIWA PROVINSI JAWA BARAT', 'RS JIWA*', './_img/logo_institusi/87.png', '', ''),
(88, 'UNIVERSITAS KOMPUTER INDONESIA', 'UNIKOM', './_img/logo_institusi/88.png', '', '');

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
(1, 'kedKep', 0, ''),
(3, 'far', 0, ''),
(4, 'kesling', 0, ''),
(5, 'psi', 0, ''),
(6, 'rm', 0, ''),
(7, 'it', 0, ''),
(8, 'peksos', 0, '');

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
(1, 'Mess RSJ 1 Lama', 20, 'Jl. Kolonel Maturi KM.7, Desa Jambudipa, Kec. Cisarua, Kab. Bandung Barat, 40551', 'RS Jiwa Provinsi Jawa Barat', '081321329101', '', 20000, 100000, 'dalam', 4, 8, 'Makan 3x Sehari', 'y'),
(2, 'Mess RSJ 2 Baru', 92, 'Jl. Kolonel Maturi KM.7, Desa Jambudipa, Kec. Cisarua, Kab. Bandung Barat, 40551', 'RS Jiwa Provinsi Jawa Barat', '081321329101', '', 20000, 100000, 'dalam', 4, 8, '', 'y'),
(3, 'Asrama Rifa Corporate', 100, 'Kp. Panyandaan RT. 01 RW. 14 Desa Jambudipa Kecamatan Cisarua Kab. Bandung Barat', 'Ibu Ai', '081322629909', '', 20000, 80000, 'luar', 4, 8, 'Dengan Makan 3x Sehari', 'y'),
(4, 'Pondokan H. Ating', 100, 'Kp. Barukai Timur RT. 04 RW. 13 Desa Jambudipa Kecamatan Cisarua Kab. Bandung Barat', 'H. Ating / Hj. Siti Sutiah', '0', '', 20000, 80000, 'luar', 4, 8, '', 'y'),
(5, 'Wisma Anugrah Ibu Nanik', 70, 'Kp. Panyandaan RT. 01 RW. 14 Desa Jambudipa Kecamatan Cisarua Kab. Bandung Barat', 'Hj. Nanik Susiani', '081320719652', '', 15000, 70000, 'luar', 4, 8, '', 'y'),
(6, 'Pondokan dr. Hj. Meutia Laksminingrum', 0, '-', 'dr. Hj. Meutia Laksminingrum', '0', '', 0, 0, 'luar', 4, 8, '', 't'),
(7, 'Galuh Pakuan', 70, 'Kp. Panyandaan RT. 01 RW. 14 Desa Jambudipa Kecamatan Cisarua Kab. Bandung Barat', 'Oyo Suharya', '081320113399', '', 20000, 80000, 'luar', 4, 8, '', 'y'),
(8, 'Pondokan Tatang', 30, 'Kp. Panyandaan RT. 01 RW. 14 Desa Jambudipa Kecamatan Cisarua Kab. Bandung Barat', 'Tatang', '089531804825', '', 20000, 80000, 'luar', 4, 8, '', 'y');

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
(1, 1, 1, '2022-03-01', 'y', 10, 91000000),
(2, 4, 2, '2022-03-03', 'y', 17, 23800000),
(3, 5, 1, '2022-03-07', 'y', 16028, 100976400000),
(4, 7, 1, '2022-03-08', 'y', 642, 2247000000),
(5, 8, 1, '2022-03-08', 'y', 304, 152000000);

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
  `id_jurusan_pdd` int(11) DEFAULT NULL,
  `id_profesi_pdd` int(11) DEFAULT NULL,
  `id_jenjang_pdd` int(11) DEFAULT NULL,
  `id_akreditasi` int(11) DEFAULT NULL,
  `file_mou` text DEFAULT NULL,
  `ket_mou` enum('belum pengajuan','proses pengajuan baru','proses pengajuan perpanjang','aktif') DEFAULT NULL,
  `status_mou` enum('Y','T') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_mou`
--

INSERT INTO `tb_mou` (`id_mou`, `id_institusi`, `tgl_mulai_mou`, `tgl_selesai_mou`, `no_rsj_mou`, `no_institusi_mou`, `id_jurusan_pdd`, `id_profesi_pdd`, `id_jenjang_pdd`, `id_akreditasi`, `file_mou`, `ket_mou`, `status_mou`) VALUES
(1, '87', '2022-01-05', '2023-08-18', '-', '-', NULL, NULL, NULL, NULL, NULL, NULL, ''),
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
(86, '86', '2020-11-02', '2023-11-02', '073/16336/RSJ', '037/PKS/DN/FKUKMXI/2020', 0, 0, 0, 0, NULL, '', ''),
(126, '1', '2022-01-02', '2024-01-02', '-', '-', 1, 1, 8, 1, NULL, '', '');

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
(19, 24, 1, 5, 2, '50', '73', '56', '99', '48', '75', '35', '42', '2', '46', 'Ab in laborum Totam'),
(20, 24, 1, 11, 2, '74', '12', '49', '85', '54', '95', '63', '2', '51', '68', 'Fugiat quis sit est'),
(21, 24, 1, 6, 2, '35', '56', '21', '64', '11', '52', '48', '68', '31', '16', 'Non sint similique '),
(22, 25, 1, 7, 2, '59', '45', '54', '45', '47', '18', '30', '7', '58', '82', 'Praesentium ipsa of'),
(23, 25, 1, 8, 2, '66', '55', '66', '48', '62', '87', '53', '81', '42', '89', 'Facere similique dol');

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

--
-- Dumping data for table `tb_nilai_upload`
--

INSERT INTO `tb_nilai_upload` (`id_nilai_upload`, `id_pembimbing`, `id_unit`, `id_praktik`, `file_nilai_upload`) VALUES
(4, 62, 2, 8, './_file/nilai/nilai_upload_8_62_2022-03-09.pdf');

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
(6, 1, 24, 2, 5),
(7, 1, 24, 2, 11),
(8, 1, 24, 2, 6),
(9, 1, 25, 2, 7),
(10, 1, 25, 2, 8),
(11, 8, 62, 2, 51),
(12, 8, 62, 16, 60),
(13, 8, 62, 0, 62),
(14, 8, 62, 6, 56),
(15, 8, 62, 14, 58);

-- --------------------------------------------------------

--
-- Table structure for table `tb_praktik`
--

CREATE TABLE `tb_praktik` (
  `id_praktik` int(11) NOT NULL,
  `id_mou` int(11) NOT NULL,
  `id_institusi` int(11) NOT NULL,
  `id_mentor` int(11) DEFAULT NULL,
  `id_unit` int(11) DEFAULT NULL,
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
  `id_akreditasi` text NOT NULL,
  `id_user` text NOT NULL,
  `nama_koordinator_praktik` text NOT NULL,
  `email_koordinator_praktik` text NOT NULL,
  `telp_koordinator_praktik` text NOT NULL,
  `status_cek_praktik` text NOT NULL,
  `status_praktik` enum('D','W','Y','S','A') NOT NULL,
  `kurang_tf_praktik` text NOT NULL,
  `ket_tolakPraktikTarif_praktik` text NOT NULL,
  `makan_mess_praktik` enum('y','t') NOT NULL,
  `materi_upip_praktik` enum('y','t') DEFAULT NULL,
  `materi_napza_praktik` enum('y','t') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_praktik`
--

INSERT INTO `tb_praktik` (`id_praktik`, `id_mou`, `id_institusi`, `id_mentor`, `id_unit`, `nama_praktik`, `tgl_input_praktik`, `tgl_ubah_praktik`, `tgl_mulai_praktik`, `tgl_selesai_praktik`, `jumlah_praktik`, `no_surat_praktik`, `surat_praktik`, `data_praktik`, `id_jurusan_pdd_jenis`, `id_jurusan_pdd`, `id_jenjang_pdd`, `id_profesi_pdd`, `id_akreditasi`, `id_user`, `nama_koordinator_praktik`, `email_koordinator_praktik`, `telp_koordinator_praktik`, `status_cek_praktik`, `status_praktik`, `kurang_tf_praktik`, `ket_tolakPraktikTarif_praktik`, `makan_mess_praktik`, `materi_upip_praktik`, `materi_napza_praktik`) VALUES
(1, 0, 9, NULL, NULL, 'Velit omnis exercita', '2022-03-01', NULL, '2022-03-01', '2022-03-10', 5, 'Pariatur Quo rem vo', './_file/praktik/surat_1_2022-03-01.pdf', './_file/praktik/data_praktikan_1_2022-03-01.xlsx', 2, '2', '10', '5', '3', '1', 'Ut cillum obcaecati ', 'sobaqary@mailinator.com', '80', 'SLS', 'A', '901203', '', 'y', 'y', 'y'),
(2, 0, 9, NULL, NULL, 'Quia impedit culpa', '2022-03-03', NULL, '1970-09-01', '1986-08-19', 56, 'Optio cum voluptas ', NULL, NULL, 1, '1', '10', '2', '1', '1', 'Incididunt voluptas ', 'tidepuvom@mailinator.com', '12', 'VPT_T', 'D', '', 'TESTER', 'y', 't', 't'),
(3, 0, 52, NULL, NULL, 'Ipsum quo voluptatem', '2022-03-03', NULL, '1977-11-07', '1999-01-21', 65, 'Cupiditate magnam in', './_file/praktik/surat_3_2022-03-03.pdf', './_file/praktik/data_praktikan_3_2022-03-03.xlsx', 2, '2', '10', '5', '4', '1', 'Possimus ut anim ap', 'mafofimyh@mailinator.com', '41', 'TMP', 'D', '', '', 'y', 'y', 'y'),
(4, 0, 31, NULL, NULL, 'Quo quia ullam ullam', '2022-03-03', NULL, '2022-03-03', '2022-03-19', 14, 'Ex ipsam consequatur', './_file/praktik/surat_4_2022-03-03.pdf', './_file/praktik/data_praktikan_4_2022-03-03.xlsx', 2, '2', '10', '5', '3', '1', 'Quaerat dolorem maio', 'majybabehe@mailinator.com', '33', 'AKV', 'Y', '', '', 'y', 'y', 'y'),
(5, 0, 21, NULL, NULL, 'Esse labore voluptas', '2022-03-07', NULL, '1975-04-28', '2019-03-15', 63, 'Dolorem esse sed re', NULL, NULL, 1, '1', '10', '2', '3', '1', 'Et quam perspiciatis', 'mire@mailinator.com', '40', 'AKV', 'Y', '', '', 'y', 't', 't'),
(6, 0, 1, NULL, NULL, 'Consectetur quasi is', '2022-03-08', NULL, '1971-03-21', '1982-05-03', 61, 'Velit est labore eu', './_file/praktik/surat_6_2022-03-08.pdf', './_file/praktik/data_praktikan_6_2022-03-08.xlsx', 3, '7', '8', '0', '3', '1', 'Sapiente at harum sa', 'xyfu@mailinator.com', '34', 'DPT', 'D', '', '', 'y', 't', 't'),
(7, 0, 81, NULL, NULL, 'Consectetur excepte', '2022-03-08', NULL, '2013-01-17', '2014-10-20', 35, 'In accusamus modi ut', './_file/praktik/surat_7_2022-03-08.pdf', './_file/praktik/data_praktikan_7_2022-03-08.xlsx', 4, '4', '8', '0', '4', '1', 'Excepteur est iure s', 'bisydivyd@mailinator.com', '99', 'AKV', 'Y', '', '', 'y', 't', 't'),
(8, 0, 34, NULL, NULL, 'Voluptatem dolore la', '2022-03-08', NULL, '2019-06-06', '2020-04-04', 5, 'Illo et deleniti est', './_file/praktik/surat_8_2022-03-08.pdf', './_file/praktik/data_praktikan_8_2022-03-08.xlsx', 4, '4', '8', '0', '4', '1', 'Esse tempor reicien', 'suropylub@mailinator.com', '28', 'AKV', 'Y', '', '', 'y', 't', 't'),
(9, 0, 71, NULL, NULL, 'Officia est dolore t', '2022-03-09', NULL, '1980-07-28', '2019-08-09', 10, 'Voluptas itaque in o', './_file/praktik/surat_9_2022-03-09.pdf', './_file/praktik/data_praktikan_9_2022-03-09.xlsx', 2, '2', '6', '0', '2', '1', 'Voluptatem Cupidita', 'jiketet@mailinator.com', '98', 'VPT_Y', 'D', '', '', 't', 'y', 'y'),
(10, 0, 31, NULL, NULL, 'Rerum recusandae Du', '2022-03-09', NULL, '1994-02-22', '1998-06-24', 74, 'Incidunt est et vol', './_file/praktik/surat_10_2022-03-09.pdf', './_file/praktik/data_praktikan_10_2022-03-09.xlsx', 2, '2', '9', '0', '3', '1', 'Aut ipsa veniam id', 'qizuhaxuxy@mailinator.com', '78', 'VPT_Y', 'D', '', '', 'y', 'y', 'y'),
(11, 0, 37, NULL, NULL, 'Consectetur rerum ei', '2022-03-11', NULL, '1979-09-10', '2010-12-03', 13, 'Ut labore quo rerum ', NULL, NULL, 1, '1', '10', '1', '', '1', 'Magna ducimus sequi', 'giget@mailinator.com', '87', 'DPT_KED_PPDS', 'D', '', '', '', 't', 't'),
(12, 0, 20, NULL, NULL, 'Aut dolores et aliqu', '2022-03-11', NULL, '1982-03-24', '2014-10-16', 1, 'Id voluptate et ea ', NULL, NULL, 1, '1', '10', '1', '', '1', 'Reprehenderit et nis', 'rakozutyji@mailinator.com', '35', 'DPT_KED_PPDS', 'D', '', '', '', 't', 't');

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
  `id_pembimbing_pilih` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_praktikan`
--

INSERT INTO `tb_praktikan` (`id_praktikan`, `id_praktik`, `no_id_praktikan`, `nama_praktikan`, `tgl_lahir_praktikan`, `telp_praktikan`, `wa_praktikan`, `email_praktikan`, `kota_kab_praktikan`, `tgl_input_praktikan`, `tgl_ubah_praktikan`, `id_pembimbing_pilih`) VALUES
(5, 1, '1010202205', 'LUKMAN SALEHUDIN', '0000-00-00', '0822113232311', '0898298332323', 'lukman@gmail.com', 'KAB. BANDUNG', '2022-03-01', NULL, 0),
(6, 1, '1010202206', 'RANI asd RIFFANI', '0000-00-00', '0822237001728', '0822237001728', 'raniriff@gmail.com', 'KAB. BANDUNG', '2022-03-01', NULL, 0),
(7, 1, '1010202207', 'RIZKI EGI ', '0000-00-00', '0891278318723', '0892831238723', 'egi.rizki@gmail.com', 'KOTA CIMAHI', '2022-03-01', NULL, 0),
(8, 1, '1010202208', 'SITHA RAMADHANI A.', '0000-00-00', '087623918732', '0891278318723', 'ramasd123@gmail.com', 'KOTA CIMAHI', '2022-03-01', NULL, 0),
(11, 1, '1010202211', 'NANDANG', '0000-00-00', '0898298332323', '0898298332323', 'nandang@gmail.com', 'KAB. BANDUNG BARAT', '2022-03-01', NULL, 0),
(16, 3, '1010202204', 'FERLISTIAN asdasd', '0000-00-00', '0822337031729', '0822337031729', 'ferlis@gmail.com', 'KAB. BANDUNG', '2022-03-03', NULL, 0),
(17, 3, '1010202205', 'LUKMAN sd SALEHUDIN', '0000-00-00', '0822113232311', '0898298332323', 'lukman@gmail.com', 'KAB. BANDUNG', '2022-03-03', NULL, 0),
(18, 3, '1010202206', 'RANI RIFFANI', '0000-00-00', '0822237001728', '0822237001728', 'raniriff@gmail.com', 'KAB. BANDUNG', '2022-03-03', NULL, 0),
(19, 3, '1010202207', 'RIZKI EGI ', '0000-00-00', '0891278318723', '0892831238723', 'egi.rizki@gmail.com', 'KOTA CIMAHI', '2022-03-03', NULL, 0),
(20, 3, '1010202208', 'SITHA RAMADHANI A.', '0000-00-00', '087623918732', '0891278318723', 'ramasd123@gmail.com', 'KOTA CIMAHI', '2022-03-03', NULL, 0),
(21, 3, '1010202209', 'ARIF HAKIM', '0000-00-00', '0822891238911', '0822891238911', 'arif_hakim@gmail.com', 'KOTA CIMAHI', '2022-03-03', NULL, 0),
(22, 3, '1010202210', 'ADI HARDIANSYAH', '0000-00-00', '0889263223683', '0889263223683', 'adihhardianr@gmail.com', 'KAB. BANDUNG BARAT', '2022-03-03', NULL, 0),
(23, 3, '1010202211', 'NANDANG', '0000-00-00', '0898298332323', '0898298332323', 'nandang@gmail.com', 'KAB. BANDUNG BARAT', '2022-03-03', NULL, 0),
(24, 3, '', '', '0000-00-00', '', '', '', '', '2022-03-03', NULL, 0),
(25, 3, '', '', '0000-00-00', '', '', '', '', '2022-03-03', NULL, 0),
(26, 3, '', '', '0000-00-00', '', '', '', '', '2022-03-03', NULL, 0),
(27, 3, '', '', '0000-00-00', '', '', '', '', '2022-03-03', NULL, 0),
(28, 3, '', '', '0000-00-00', '', '', '', '', '2022-03-03', NULL, 0),
(29, 3, '', '', '0000-00-00', '', '', '', '', '2022-03-03', NULL, 0),
(30, 3, '', '', '0000-00-00', '', '', '', '', '2022-03-03', NULL, 0),
(31, 3, '', '', '0000-00-00', '', '', '', '', '2022-03-03', NULL, 0),
(32, 3, '', '', '0000-00-00', '', '', '', '', '2022-03-03', NULL, 0),
(33, 4, '1010202201', 'ADE IHSAN MR.', '0000-00-00', '0811209312322', '0811209312322', 'adeamr@gmail.com', 'KOTA BANDUNG', '2022-03-03', NULL, 0),
(34, 4, '1010202202', 'ASEP SAEPUDIN', '0000-00-00', '0812312329822', '0812312329822', 'asep@gmail.com', 'KOTA BANDUNG', '2022-03-03', NULL, 0),
(35, 4, '1010202203', 'FAJAR RACHMAT HERMANSYAH', '0000-00-00', '0822237891722', '0822113232311', 'fajar@gmail.com', 'KAB. BANDUNG', '2022-03-03', NULL, 0),
(36, 4, '1010202204', 'FERLISTIAN RIZKI', '0000-00-00', '0822337031729', '0822337031729', 'ferlis@gmail.com', 'KAB. BANDUNG', '2022-03-03', NULL, 0),
(37, 4, '1010202205', 'LUKMAN SALEHUDIN', '0000-00-00', '0822113232311', '0898298332323', 'lukman@gmail.com', 'KAB. BANDUNG', '2022-03-03', NULL, 0),
(38, 4, '1010202206', 'RANI RIFFANI', '0000-00-00', '0822237001728', '0822237001728', 'raniriff@gmail.com', 'KAB. BANDUNG', '2022-03-03', NULL, 0),
(39, 4, '1010202207', 'RIZKI EGI ', '0000-00-00', '0891278318723', '0892831238723', 'egi.rizki@gmail.com', 'KOTA CIMAHI', '2022-03-03', NULL, 0),
(40, 4, '1010202208', 'SITHA RAMADHANI A.', '0000-00-00', '087623918732', '0891278318723', 'ramasd123@gmail.com', 'KOTA CIMAHI', '2022-03-03', NULL, 0),
(41, 4, '1010202209', 'ARIF HAKIM', '0000-00-00', '0822891238911', '0822891238911', 'arif_hakim@gmail.com', 'KOTA CIMAHI', '2022-03-03', NULL, 0),
(42, 4, '1010202210', 'ADI HARDIANSYAH', '0000-00-00', '0889263223683', '0889263223683', 'adihhardianr@gmail.com', 'KAB. BANDUNG BARAT', '2022-03-03', NULL, 0),
(43, 4, '1010202211', 'NANDANG', '0000-00-00', '0898298332323', '0898298332323', 'nandang@gmail.com', 'KAB. BANDUNG BARAT', '2022-03-03', NULL, 0),
(49, 1, 'Reprehenderit dicta ', 'Ut facilis occaecat ', '0000-00-00', 'Anim in impedit vol', 'Officia sunt iure a', 'horuw@mailinator.com', 'Dolorem explicabo N', '2022-03-07', NULL, 0),
(50, 1, 'Ea et nulla in error', 'Eum dolor et odit et', '0000-00-00', 'Irure temporibus vol', 'Nostrum labore proid', 'qyfytevo@mailinator.com', 'In cillum consequatu', '2022-03-07', NULL, 0),
(51, 8, '1010202201', 'ADE IHSAN MR.', '0000-00-00', '0811209312322', '0811209312322', 'adeamr@gmail.com', 'KOTA BANDUNG', '2022-03-08', NULL, 0),
(56, 8, '1010202206', 'RANI RIFFANI', '0000-00-00', '0822237001728', '0822237001728', 'raniriff@gmail.com', 'KAB. BANDUNG', '2022-03-08', NULL, 0),
(58, 8, '1010202208', 'SITHA RAMADHANI A.', '0000-00-00', '087623918732', '0891278318723', 'ramasd123@gmail.com', 'KOTA CIMAHI', '2022-03-08', NULL, 0),
(60, 8, '1010202210', 'ADI HARDIANSYAH', '0000-00-00', '0889263223683', '0889263223683', 'adihhardianr@gmail.com', 'KAB. BANDUNG BARAT', '2022-03-08', NULL, 0),
(62, 8, 'Delectus laborum D', 'Minima sed aute veli', '0000-00-00', 'Voluptatem ut blandi', 'Tenetur quia quisqua', 'synibuxeqe@mailinator.com', 'Est ad amet fuga A', '2022-03-08', NULL, 0),
(63, 9, '1010202201', 'ADE IHSAN MR.', '0000-00-00', '0811209312322', '0811209312322', 'adeamr@gmail.com', 'KOTA BANDUNG', '2022-03-09', NULL, 0),
(64, 9, '1010202202', 'ASEP SAEPUDIN', '0000-00-00', '0812312329822', '0812312329822', 'asep@gmail.com', 'KOTA BANDUNG', '2022-03-09', NULL, 0),
(65, 9, '1010202203', 'FAJAR RACHMAT HERMANSYAH', '0000-00-00', '0822237891722', '0822113232311', 'fajar@gmail.com', 'KAB. BANDUNG', '2022-03-09', NULL, 0),
(66, 9, '1010202204', 'FERLISTIAN RIZKI', '0000-00-00', '0822337031729', '0822337031729', 'ferlis@gmail.com', 'KAB. BANDUNG', '2022-03-09', NULL, 0),
(67, 9, '1010202205', 'LUKMAN SALEHUDIN', '0000-00-00', '0822113232311', '0898298332323', 'lukman@gmail.com', 'KAB. BANDUNG', '2022-03-09', NULL, 0),
(68, 9, '1010202206', 'RANI RIFFANI', '0000-00-00', '0822237001728', '0822237001728', 'raniriff@gmail.com', 'KAB. BANDUNG', '2022-03-09', NULL, 0),
(69, 9, '1010202207', 'RIZKI EGI ', '0000-00-00', '0891278318723', '0892831238723', 'egi.rizki@gmail.com', 'KOTA CIMAHI', '2022-03-09', NULL, 0),
(70, 9, '1010202208', 'SITHA RAMADHANI A.', '0000-00-00', '087623918732', '0891278318723', 'ramasd123@gmail.com', 'KOTA CIMAHI', '2022-03-09', NULL, 0),
(71, 9, '1010202209', 'ARIF HAKIM', '0000-00-00', '0822891238911', '0822891238911', 'arif_hakim@gmail.com', 'KOTA CIMAHI', '2022-03-09', NULL, 0),
(72, 9, '1010202210', 'ADI HARDIANSYAH', '0000-00-00', '0889263223683', '0889263223683', 'adihhardianr@gmail.com', 'KAB. BANDUNG BARAT', '2022-03-09', NULL, 0),
(73, 9, '1010202211', 'NANDANG', '0000-00-00', '0898298332323', '0898298332323', 'nandang@gmail.com', 'KAB. BANDUNG BARAT', '2022-03-09', NULL, 0),
(74, 10, '1010202201', 'ADE IHSAN MR.', '0000-00-00', '0811209312322', '0811209312322', 'adeamr@gmail.com', 'KOTA BANDUNG', '2022-03-09', NULL, 0),
(75, 10, '1010202202', 'ASEP SAEPUDIN', '0000-00-00', '0812312329822', '0812312329822', 'asep@gmail.com', 'KOTA BANDUNG', '2022-03-09', NULL, 0),
(76, 10, '1010202203', 'FAJAR RACHMAT HERMANSYAH', '0000-00-00', '0822237891722', '0822113232311', 'fajar@gmail.com', 'KAB. BANDUNG', '2022-03-09', NULL, 0),
(77, 10, '1010202204', 'FERLISTIAN RIZKI', '0000-00-00', '0822337031729', '0822337031729', 'ferlis@gmail.com', 'KAB. BANDUNG', '2022-03-09', NULL, 0),
(78, 10, '1010202205', 'LUKMAN SALEHUDIN', '0000-00-00', '0822113232311', '0898298332323', 'lukman@gmail.com', 'KAB. BANDUNG', '2022-03-09', NULL, 0),
(79, 10, '1010202206', 'RANI RIFFANI', '0000-00-00', '0822237001728', '0822237001728', 'raniriff@gmail.com', 'KAB. BANDUNG', '2022-03-09', NULL, 0),
(80, 10, '1010202207', 'RIZKI EGI ', '0000-00-00', '0891278318723', '0892831238723', 'egi.rizki@gmail.com', 'KOTA CIMAHI', '2022-03-09', NULL, 0),
(81, 10, '1010202208', 'SITHA RAMADHANI A.', '0000-00-00', '087623918732', '0891278318723', 'ramasd123@gmail.com', 'KOTA CIMAHI', '2022-03-09', NULL, 0),
(82, 10, '1010202209', 'ARIF HAKIM', '0000-00-00', '0822891238911', '0822891238911', 'arif_hakim@gmail.com', 'KOTA CIMAHI', '2022-03-09', NULL, 0),
(83, 10, '1010202210', 'ADI HARDIANSYAH', '0000-00-00', '0889263223683', '0889263223683', 'adihhardianr@gmail.com', 'KAB. BANDUNG BARAT', '2022-03-09', NULL, 0),
(84, 10, '1010202211', 'NANDANG', '0000-00-00', '0898298332323', '0898298332323', 'nandang@gmail.com', 'KAB. BANDUNG BARAT', '2022-03-09', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_praktik_tgl`
--

CREATE TABLE `tb_praktik_tgl` (
  `id_praktik_tgl` int(11) NOT NULL,
  `id_praktik` int(11) NOT NULL,
  `praktik_tgl` date NOT NULL,
  `id_kuota` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(32, 'Bed side teaching (BST)', 13, NULL, 50000, 'MINGGUAN', 0, 0, 2, 6, 0, 4, 2, NULL, 'y'),
(33, 'Bed side teaching (BST)', 13, NULL, 75000, 'MINGGUAN', 0, 0, 2, 7, 0, 4, 2, NULL, 'y'),
(34, 'Bed side teaching (BST)', 13, NULL, 75000, 'MINGGUAN', 0, 0, 2, 8, 0, 4, 2, NULL, 'y'),
(35, 'Bed side teaching (BST)', 13, NULL, 75000, 'MINGGUAN', 0, 0, 2, 9, 0, 4, 2, NULL, 'y'),
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
(50, 'Bed side teaching (BST)', 13, NULL, 50000, 'MINGGUAN', 0, 0, 3, 6, 0, 4, 2, NULL, 'y'),
(51, 'Bed side teaching (BST)', 13, NULL, 75000, 'MINGGUAN', 0, 0, 3, 7, 0, 4, 2, NULL, 'y'),
(52, 'Bed side teaching (BST)', 13, NULL, 75000, 'MINGGUAN', 0, 0, 3, 8, 0, 4, 2, NULL, 'y'),
(53, 'Bed side teaching (BST)', 13, NULL, 75000, 'MINGGUAN', 0, 0, 3, 9, 0, 4, 2, NULL, 'y'),
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
(68, 'Bed side teaching (BST)', 13, NULL, 50000, 'MINGGUAN', 0, 0, 4, 6, 0, 4, 2, NULL, 'y'),
(69, 'Bed side teaching (BST)', 13, NULL, 75000, 'MINGGUAN', 0, 0, 4, 7, 0, 4, 2, NULL, 'y'),
(70, 'Bed side teaching (BST)', 13, NULL, 75000, 'MINGGUAN', 0, 0, 4, 8, 0, 4, 2, NULL, 'y'),
(71, 'Bed side teaching (BST)', 13, NULL, 75000, 'MINGGUAN', 0, 0, 4, 9, 0, 4, 2, NULL, 'y'),
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
(85, 'Bed side teaching (BST)', 13, NULL, 50000, 'MINGGUAN', 0, 0, 5, 6, 0, 4, 2, NULL, 'y'),
(86, 'Bed side teaching (BST)', 13, NULL, 75000, 'MINGGUAN', 0, 0, 5, 7, 0, 4, 2, NULL, 'y'),
(87, 'Bed side teaching (BST)', 13, NULL, 75000, 'MINGGUAN', 0, 0, 5, 8, 0, 4, 2, NULL, 'y'),
(88, 'Bed side teaching (BST)', 13, NULL, 75000, 'MINGGUAN', 0, 0, 5, 9, 0, 4, 2, NULL, 'y'),
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
(102, 'Bed side teaching (BST)', 13, NULL, 50000, 'MINGGUAN', 0, 0, 6, 6, 0, 4, 2, NULL, 'y'),
(103, 'Bed side teaching (BST)', 13, NULL, 75000, 'MINGGUAN', 0, 0, 6, 7, 0, 4, 2, NULL, 'y'),
(104, 'Bed side teaching (BST)', 13, NULL, 75000, 'MINGGUAN', 0, 0, 6, 8, 0, 4, 2, NULL, 'y'),
(105, 'Bed side teaching (BST)', 13, NULL, 75000, 'MINGGUAN', 0, 0, 6, 9, 0, 4, 2, NULL, 'y'),
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
(118, 'Bed side teaching (BST)', 13, NULL, 50000, 'MINGGUAN', 0, 0, 7, 6, 0, 4, 2, NULL, 'y'),
(119, 'Bed side teaching (BST)', 13, NULL, 75000, 'MINGGUAN', 0, 0, 7, 7, 0, 4, 2, NULL, 'y'),
(120, 'Bed side teaching (BST)', 13, NULL, 75000, 'MINGGUAN', 0, 0, 7, 8, 0, 4, 2, NULL, 'y'),
(121, 'Bed side teaching (BST)', 13, NULL, 75000, 'MINGGUAN', 0, 0, 7, 9, 0, 4, 2, NULL, 'y'),
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
  `jumlah_tarif_pilih` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_tarif_pilih`
--

INSERT INTO `tb_tarif_pilih` (`id_tarif_pilih`, `id_praktik`, `tgl_input_tarif_pilih`, `tgl_ubah_tarif_pilih`, `nama_jenis_tarif_pilih`, `nama_tarif_pilih`, `nominal_tarif_pilih`, `nama_satuan_tarif_pilih`, `frekuensi_tarif_pilih`, `kuantitas_tarif_pilih`, `jumlah_tarif_pilih`) VALUES
(1, 1, '2022-03-01', NULL, 'Administrasi', 'Institusional Fee', 20000, 'persiswa/periode', 1, 91, 1820000),
(2, 1, '2022-03-01', NULL, 'Administrasi', 'Management Fee', 20000, 'persiswa/periode', 1, 91, 1820000),
(3, 1, '2022-03-01', NULL, 'Barang Habis Pakai', 'Untuk Keselamatan Kerja (Handrub, tisue, sabun)', 20000, 'persiswa/periode', 1, 91, 1820000),
(4, 1, '2022-03-01', NULL, 'Overhead Operational', 'Keselamatan Pasien', 150000, 'perperiode/kali', 1, 91, 13650000),
(5, 1, '2022-03-01', NULL, 'Overhead Operational', 'Log Book (dibayar 1 kali)', 20000, 'persiswa/periode', 1, 91, 1820000),
(6, 1, '2022-03-01', NULL, 'Overhead Operational', 'Name Tag (dibayar 1 kali)', 10000, 'persiswa/periode', 1, 91, 910000),
(7, 1, '2022-03-01', NULL, 'Overhead Operational', 'Orientasi ', 75000, 'perperiode/kali', 1, 1, 75000),
(8, 1, '2022-03-01', NULL, 'Pembelajaran', 'Materi (TAK, Komunikasi Terapeutik, Dokumentasi Keperawatanan, UPIP, NAPZA)', 150000, 'perperiode/kali', 5, 1, 750000),
(9, 1, '2022-03-01', NULL, 'Pembelajaran', 'Bed side teaching (BST)', 75000, 'persiswa/minggu', 2, 91, 13650000),
(10, 1, '2022-03-01', NULL, 'Ujian', 'Ujian', 150000, 'persiswa/hari', 1, 91, 13650000),
(11, 1, '2022-03-01', NULL, 'Ujian', 'Makan dan Snack Penguji', 20000, 'perpenguji/kali', 1, 91, 1820000),
(12, 1, '2022-03-01', NULL, 'Ujian', 'Bahan Habis Pakai Ujian', 100000, 'persiswa/kali', 1, 91, 9100000),
(13, 1, '2022-03-01', NULL, 'Ujian', 'Institusional Fee Ujian', 150000, 'persiswa/periode ujian', 1, 91, 13650000),
(14, 1, '2022-03-01', NULL, 'Ujian', 'Management Fee Ujian', 20000, 'persiswa/periode ujian', 1, 91, 1820000),
(15, 1, '2022-03-01', NULL, 'Pemakaian Kekayaan Daerah', 'Ruang Komite Medik', 750000, 'perperiode/kali', 1, 1, 750000),
(16, 1, '2022-03-01', NULL, 'Mess/Pemondokan', 'Mess RSJ 1 Lama (Dengan Makan 3x Sehari)', 100000, 'persiswa/hari', 10, 91, 91000000),
(17, 3, '2022-03-03', NULL, 'Administrasi', 'Institusional Fee', 20000, 'persiswa/periode', 1, 65, 1300000),
(18, 3, '2022-03-03', NULL, 'Administrasi', 'Management Fee', 20000, 'persiswa/periode', 1, 65, 1300000),
(19, 3, '2022-03-03', NULL, 'Barang Habis Pakai', 'Untuk Keselamatan Kerja (Handrub, tisue, sabun)', 20000, 'persiswa/periode', 1, 65, 1300000),
(20, 3, '2022-03-03', NULL, 'Overhead Operational', 'Keselamatan Pasien', 150000, 'perperiode/kali', 1, 65, 9750000),
(21, 3, '2022-03-03', NULL, 'Overhead Operational', 'Log Book (dibayar 1 kali)', 20000, 'persiswa/periode', 1, 65, 1300000),
(22, 3, '2022-03-03', NULL, 'Overhead Operational', 'Name Tag (dibayar 1 kali)', 10000, 'persiswa/periode', 1, 65, 650000),
(23, 3, '2022-03-03', NULL, 'Overhead Operational', 'Orientasi ', 75000, 'perperiode/kali', 1, 1, 75000),
(24, 3, '2022-03-03', NULL, 'Pembelajaran', 'Materi (TAK, Komunikasi Terapeutik, Dokumentasi Keperawatanan, UPIP, NAPZA)', 150000, 'perperiode/kali', 5, 1, 750000),
(25, 3, '2022-03-03', NULL, 'Pembelajaran', 'Bed side teaching (BST)', 75000, 'persiswa/minggu', 1107, 65, 5396625000),
(26, 3, '2022-03-03', NULL, 'Ujian', 'Ujian', 150000, 'persiswa/hari', 1, 65, 9750000),
(27, 3, '2022-03-03', NULL, 'Ujian', 'Makan dan Snack Penguji', 20000, 'perpenguji/kali', 1, 65, 1300000),
(28, 3, '2022-03-03', NULL, 'Ujian', 'Bahan Habis Pakai Ujian', 100000, 'persiswa/kali', 1, 65, 6500000),
(29, 3, '2022-03-03', NULL, 'Ujian', 'Institusional Fee Ujian', 150000, 'persiswa/periode ujian', 1, 65, 9750000),
(30, 3, '2022-03-03', NULL, 'Ujian', 'Management Fee Ujian', 20000, 'persiswa/periode ujian', 1, 65, 1300000),
(31, 4, '2022-03-03', NULL, 'Administrasi', 'Institusional Fee', 20000, 'persiswa/periode', 1, 14, 280000),
(32, 4, '2022-03-03', NULL, 'Administrasi', 'Management Fee', 20000, 'persiswa/periode', 1, 14, 280000),
(33, 4, '2022-03-03', NULL, 'Barang Habis Pakai', 'Untuk Keselamatan Kerja (Handrub, tisue, sabun)', 20000, 'persiswa/periode', 1, 14, 280000),
(34, 4, '2022-03-03', NULL, 'Overhead Operational', 'Keselamatan Pasien', 150000, 'perperiode/kali', 1, 14, 2100000),
(35, 4, '2022-03-03', NULL, 'Overhead Operational', 'Log Book (dibayar 1 kali)', 20000, 'persiswa/periode', 1, 14, 280000),
(36, 4, '2022-03-03', NULL, 'Overhead Operational', 'Name Tag (dibayar 1 kali)', 10000, 'persiswa/periode', 1, 14, 140000),
(37, 4, '2022-03-03', NULL, 'Overhead Operational', 'Orientasi ', 75000, 'perperiode/kali', 1, 1, 75000),
(38, 4, '2022-03-03', NULL, 'Pembelajaran', 'Materi (TAK, Komunikasi Terapeutik, Dokumentasi Keperawatanan, UPIP, NAPZA)', 150000, 'perperiode/kali', 5, 1, 750000),
(39, 4, '2022-03-03', NULL, 'Pembelajaran', 'Bed side teaching (BST)', 75000, 'persiswa/minggu', 3, 14, 3150000),
(40, 4, '2022-03-03', NULL, 'Ujian', 'Ujian', 150000, 'persiswa/hari', 1, 14, 2100000),
(41, 4, '2022-03-03', NULL, 'Ujian', 'Makan dan Snack Penguji', 20000, 'perpenguji/kali', 1, 14, 280000),
(42, 4, '2022-03-03', NULL, 'Ujian', 'Bahan Habis Pakai Ujian', 100000, 'persiswa/kali', 1, 14, 1400000),
(43, 4, '2022-03-03', NULL, 'Ujian', 'Institusional Fee Ujian', 150000, 'persiswa/periode ujian', 1, 14, 2100000),
(44, 4, '2022-03-03', NULL, 'Ujian', 'Management Fee Ujian', 20000, 'persiswa/periode ujian', 1, 14, 280000),
(45, 4, '2022-03-03', NULL, 'Pemakaian Kekayaan Daerah', 'Aula Utama', 1000000, 'perperiode/kali', 1, 1, 1000000),
(46, 4, '2022-03-03', NULL, 'Mess/Pemondokan', 'Mess RSJ 2 Baru (Dengan Makan 3x Sehari)', 100000, 'persiswa/hari', 17, 14, 23800000),
(47, 5, '2022-03-07', NULL, 'Mess/Pemondokan', 'Mess RSJ 1 Lama (Dengan Makan 3x Sehari)', 100000, 'persiswa/hari', 16028, 63, 100976400000),
(48, 6, '2022-03-08', NULL, 'Administrasi', 'Institusional Fee', 20000, 'persiswa/periode', 1, 61, 1220000),
(49, 6, '2022-03-08', NULL, 'Administrasi', 'Management Fee', 20000, 'persiswa/periode', 1, 61, 1220000),
(50, 6, '2022-03-08', NULL, 'Barang Habis Pakai', 'Untuk Keselamatan Kerja (Handrub, tisue, sabun)', 20000, 'persiswa/periode', 1, 61, 1220000),
(51, 6, '2022-03-08', NULL, 'Overhead Operational', 'Keselamatan Pasien', 150000, 'perperiode/kali', 1, 61, 9150000),
(52, 6, '2022-03-08', NULL, 'Overhead Operational', 'Log Book (dibayar 1 kali)', 20000, 'persiswa/periode', 1, 61, 1220000),
(53, 6, '2022-03-08', NULL, 'Overhead Operational', 'Name Tag (dibayar 1 kali)', 10000, 'persiswa/periode', 1, 61, 610000),
(54, 6, '2022-03-08', NULL, 'Overhead Operational', 'Orientasi ', 75000, 'perperiode/kali', 1, 1, 75000),
(55, 6, '2022-03-08', NULL, 'Pembelajaran', 'Bed side teaching (BST)', 75000, 'persiswa/minggu', 581, 61, 2658075000),
(56, 7, '2022-03-08', NULL, 'Administrasi', 'Institusional Fee', 20000, 'persiswa/periode', 1, 35, 700000),
(57, 7, '2022-03-08', NULL, 'Administrasi', 'Management Fee', 20000, 'persiswa/periode', 1, 35, 700000),
(58, 7, '2022-03-08', NULL, 'Barang Habis Pakai', 'Untuk Keselamatan Kerja (Handrub, tisue, sabun)', 20000, 'persiswa/periode', 1, 35, 700000),
(59, 7, '2022-03-08', NULL, 'Overhead Operational', 'Keselamatan Pasien', 150000, 'perperiode/kali', 1, 35, 5250000),
(60, 7, '2022-03-08', NULL, 'Overhead Operational', 'Log Book (dibayar 1 kali)', 20000, 'persiswa/periode', 1, 35, 700000),
(61, 7, '2022-03-08', NULL, 'Overhead Operational', 'Name Tag (dibayar 1 kali)', 10000, 'persiswa/periode', 1, 35, 350000),
(62, 7, '2022-03-08', NULL, 'Overhead Operational', 'Orientasi ', 75000, 'perperiode/kali', 1, 1, 75000),
(63, 7, '2022-03-08', NULL, 'Pembelajaran', 'Bed side teaching (BST)', 75000, 'persiswa/minggu', 92, 35, 241500000),
(64, 7, '2022-03-08', NULL, 'Ujian', 'Ujian', 150000, 'persiswa/hari', 1, 35, 5250000),
(65, 7, '2022-03-08', NULL, 'Ujian', 'Makan dan Snack Penguji', 20000, 'perpenguji/kali', 1, 35, 700000),
(66, 7, '2022-03-08', NULL, 'Ujian', 'Bahan Habis Pakai Ujian', 100000, 'persiswa/kali', 1, 35, 3500000),
(67, 7, '2022-03-08', NULL, 'Ujian', 'Institusional Fee Ujian', 150000, 'persiswa/periode ujian', 1, 35, 5250000),
(68, 7, '2022-03-08', NULL, 'Ujian', 'Management Fee Ujian', 20000, 'persiswa/periode ujian', 1, 35, 700000),
(69, 7, '2022-03-08', NULL, 'Mess/Pemondokan', 'Mess RSJ 1 Lama (Dengan Makan 3x Sehari)', 100000, 'persiswa/hari', 642, 35, 2247000000),
(70, 8, '2022-03-08', NULL, 'Administrasi', 'Institusional Fee', 20000, 'persiswa/periode', 1, 5, 100000),
(71, 8, '2022-03-08', NULL, 'Administrasi', 'Management Fee', 20000, 'persiswa/periode', 1, 5, 100000),
(72, 8, '2022-03-08', NULL, 'Barang Habis Pakai', 'Untuk Keselamatan Kerja (Handrub, tisue, sabun)', 20000, 'persiswa/periode', 1, 5, 100000),
(73, 8, '2022-03-08', NULL, 'Overhead Operational', 'Keselamatan Pasien', 150000, 'perperiode/kali', 1, 5, 750000),
(74, 8, '2022-03-08', NULL, 'Overhead Operational', 'Log Book (dibayar 1 kali)', 20000, 'persiswa/periode', 1, 5, 100000),
(75, 8, '2022-03-08', NULL, 'Overhead Operational', 'Name Tag (dibayar 1 kali)', 10000, 'persiswa/periode', 1, 5, 50000),
(76, 8, '2022-03-08', NULL, 'Overhead Operational', 'Orientasi ', 75000, 'perperiode/kali', 1, 1, 75000),
(77, 8, '2022-03-08', NULL, 'Pembelajaran', 'Bed side teaching (BST)', 75000, 'persiswa/minggu', 44, 5, 16500000),
(78, 8, '2022-03-08', NULL, 'Ujian', 'Ujian', 150000, 'persiswa/hari', 1, 5, 750000),
(79, 8, '2022-03-08', NULL, 'Ujian', 'Makan dan Snack Penguji', 20000, 'perpenguji/kali', 1, 5, 100000),
(80, 8, '2022-03-08', NULL, 'Ujian', 'Bahan Habis Pakai Ujian', 100000, 'persiswa/kali', 1, 5, 500000),
(81, 8, '2022-03-08', NULL, 'Ujian', 'Institusional Fee Ujian', 150000, 'persiswa/periode ujian', 1, 5, 750000),
(82, 8, '2022-03-08', NULL, 'Ujian', 'Management Fee Ujian', 20000, 'persiswa/periode ujian', 1, 5, 100000),
(83, 8, '2022-03-08', NULL, 'Mess/Pemondokan', 'Mess RSJ 1 Lama (Dengan Makan 3x Sehari)', 100000, 'persiswa/hari', 304, 5, 152000000),
(84, 3, '2022-03-09', NULL, 'Pemakaian Kekayaan Daerah', 'Aula Utama', 1000000, 'perperiode/kali', 1, 1, 1000000),
(85, 9, '2022-03-09', NULL, 'Administrasi', 'Institusional Fee', 20000, 'persiswa/periode', 1, 10, 200000),
(86, 9, '2022-03-09', NULL, 'Administrasi', 'Management Fee', 20000, 'persiswa/periode', 1, 10, 200000),
(87, 9, '2022-03-09', NULL, 'Barang Habis Pakai', 'Untuk Keselamatan Kerja (Handrub, tisue, sabun)', 20000, 'persiswa/periode', 1, 10, 200000),
(88, 9, '2022-03-09', NULL, 'Overhead Operational', 'Keselamatan Pasien', 150000, 'perperiode/kali', 1, 10, 1500000),
(89, 9, '2022-03-09', NULL, 'Overhead Operational', 'Log Book (dibayar 1 kali)', 20000, 'persiswa/periode', 1, 10, 200000),
(90, 9, '2022-03-09', NULL, 'Overhead Operational', 'Name Tag (dibayar 1 kali)', 10000, 'persiswa/periode', 1, 10, 100000),
(91, 9, '2022-03-09', NULL, 'Overhead Operational', 'Orientasi ', 75000, 'perperiode/kali', 1, 1, 75000),
(92, 9, '2022-03-09', NULL, 'Pembelajaran', 'Materi (TAK, Komunikasi Terapeutik, Dokumentasi Keperawatanan, UPIP, NAPZA)', 150000, 'perperiode/kali', 5, 1, 750000),
(93, 9, '2022-03-09', NULL, 'Pembelajaran', 'Bed side teaching (BST)', 50000, 'persiswa/minggu', 2037, 10, 1018500000),
(94, 9, '2022-03-09', NULL, 'Ujian', 'Ujian', 150000, 'persiswa/hari', 1, 10, 1500000),
(95, 9, '2022-03-09', NULL, 'Ujian', 'Makan dan Snack Penguji', 20000, 'perpenguji/kali', 1, 10, 200000),
(96, 9, '2022-03-09', NULL, 'Ujian', 'Bahan Habis Pakai Ujian', 100000, 'persiswa/kali', 1, 10, 1000000),
(97, 9, '2022-03-09', NULL, 'Ujian', 'Institusional Fee Ujian', 150000, 'persiswa/periode ujian', 1, 10, 1500000),
(98, 9, '2022-03-09', NULL, 'Ujian', 'Management Fee Ujian', 20000, 'persiswa/periode ujian', 1, 10, 200000),
(99, 10, '2022-03-09', NULL, 'Administrasi', 'Institusional Fee', 20000, 'persiswa/periode', 1, 74, 1480000),
(100, 10, '2022-03-09', NULL, 'Administrasi', 'Management Fee', 20000, 'persiswa/periode', 1, 74, 1480000),
(101, 10, '2022-03-09', NULL, 'Barang Habis Pakai', 'Untuk Keselamatan Kerja (Handrub, tisue, sabun)', 20000, 'persiswa/periode', 1, 74, 1480000),
(102, 10, '2022-03-09', NULL, 'Overhead Operational', 'Keselamatan Pasien', 150000, 'perperiode/kali', 1, 74, 11100000),
(103, 10, '2022-03-09', NULL, 'Overhead Operational', 'Log Book (dibayar 1 kali)', 20000, 'persiswa/periode', 1, 74, 1480000),
(104, 10, '2022-03-09', NULL, 'Overhead Operational', 'Name Tag (dibayar 1 kali)', 10000, 'persiswa/periode', 1, 74, 740000),
(105, 10, '2022-03-09', NULL, 'Overhead Operational', 'Orientasi ', 75000, 'perperiode/kali', 1, 1, 75000),
(106, 10, '2022-03-09', NULL, 'Pembelajaran', 'Materi (TAK, Komunikasi Terapeutik, Dokumentasi Keperawatanan, UPIP, NAPZA)', 150000, 'perperiode/kali', 5, 1, 750000),
(107, 10, '2022-03-09', NULL, 'Pembelajaran', 'Bed side teaching (BST)', 75000, 'persiswa/minggu', 227, 74, 1259850000);

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
(1, 0, 0, 'admin', 'e1d5be1c7f2f456670de3d53c7b54f4a', 'ADMIN DIKLAT RS JIWA', 'admin@admin', '1', '08123145645', NULL, '2022-03-11', '2021-03-29', '2022-02-22', 'Y'),
(15, 1, 87, 'user', 'ee11cbb19052e40b07aac0ca060c23ee', 'USER INSTITUSI', 'asd@asd', '2', '091273', NULL, '2022-01-10', '2021-12-31', '2022-01-10', 'Y'),
(16, 0, 5, 'asalajah@gmail.com', 'e66ed49f9432f4ef78d0910ab7e31f57', 'Melly', 'asalajah@gmail.com', '2', '081123456789', NULL, '2022-01-05', '2022-01-05', NULL, 'Y'),
(17, 0, 3, 'diklit.rsj.jabarprov@gmail.com', '39b1f688752f9edb7e1283a4649f05a4', 'Rani', 'diklit.rsj.jabarprov@gmail.com', '2', '081320510201', NULL, '2022-01-05', '2022-01-05', NULL, 'Y'),
(18, 0, 1, 'ip', '81dc9bdb52d04dc20036dbd8313ed055', 'ip', 'ip@ip', '2', '012309', NULL, '2022-03-10', '2022-03-10', '2022-03-10', 'Y');

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
  MODIFY `id_bayar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_jenjang_pdd`
--
ALTER TABLE `tb_jenjang_pdd`
  MODIFY `id_jenjang_pdd` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tb_jurusan_pdd`
--
ALTER TABLE `tb_jurusan_pdd`
  MODIFY `id_jurusan_pdd` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tb_jurusan_pdd_jenis`
--
ALTER TABLE `tb_jurusan_pdd_jenis`
  MODIFY `id_jurusan_pdd_jenis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_kuota`
--
ALTER TABLE `tb_kuota`
  MODIFY `id_kuota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

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
  MODIFY `id_mess_pilih` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_mou`
--
ALTER TABLE `tb_mou`
  MODIFY `id_mou` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=127;

--
-- AUTO_INCREMENT for table `tb_nilai_kep`
--
ALTER TABLE `tb_nilai_kep`
  MODIFY `id_nilai_kep` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `tb_nilai_upload`
--
ALTER TABLE `tb_nilai_upload`
  MODIFY `id_nilai_upload` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_pembimbing_pilih`
--
ALTER TABLE `tb_pembimbing_pilih`
  MODIFY `id_pembimbing_pilih` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tb_praktik`
--
ALTER TABLE `tb_praktik`
  MODIFY `id_praktik` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tb_praktikan`
--
ALTER TABLE `tb_praktikan`
  MODIFY `id_praktikan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT for table `tb_praktik_tgl`
--
ALTER TABLE `tb_praktik_tgl`
  MODIFY `id_praktik_tgl` int(11) NOT NULL AUTO_INCREMENT;

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
  MODIFY `id_tarif_pilih` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;

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
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `test`
--
ALTER TABLE `test`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
