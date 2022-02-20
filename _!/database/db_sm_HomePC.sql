-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 19, 2022 at 12:59 PM
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
(0, '-- BAN-PT --'),
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
  `atas_nama_bayar` text NOT NULL,
  `no_bayar` text NOT NULL,
  `melalui_bayar` text NOT NULL,
  `tgl_input_bayar` date NOT NULL,
  `file_bayar` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_bayar`
--

INSERT INTO `tb_bayar` (`id_bayar`, `id_mou`, `id_praktik`, `atas_nama_bayar`, `no_bayar`, `melalui_bayar`, `tgl_input_bayar`, `file_bayar`) VALUES
(1, NULL, 2, 'asd', 'asd', 'asd', '2022-02-14', './_file/bayar/bayar_1_2-2022-02-14.pdf'),
(2, NULL, 1, 'Fajar ', '890123901123', 'Bank BJB', '2022-02-15', './_file/bayar/bayar_2_1-2022-02-15.pdf'),
(3, NULL, 1, 'Fajar', '0089283239', 'Bank BJB', '2022-02-15', './_file/bayar/bayar_3_1-2022-02-15.pdf');

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
(1, 'AKADEMI PEREKEM MEDIS DAN INFORMATIKA KESEHATAN BANDUNG', 'APIKES', '', '', ''),
(2, 'AKPER AL-MA\'ARIF BATURAJA', '', '', '', ''),
(3, 'AKPER BHAKTI KENCANA BANDUNG', '', '', '', ''),
(4, 'AKPER BIDARA MUKTI GARUT', '', '', '', ''),
(5, 'AKPER BUNTET PESANTREN CIREBON', '', '', '', ''),
(6, 'AKPER DUSTIRA CIMAHI', '', '', '', ''),
(7, 'AKPER KEBONJATI', '', '', '', ''),
(8, 'AKPER LUWUK', '', '', '', ''),
(9, 'AKPER PEMBINA PALEMBANG', '', '', '', ''),
(10, 'AKPER PEMDA KOLAKA', '', '', '', ''),
(11, 'AKPER PEMERINTAH KABUPATEN CIANJUR', '', '', '', ''),
(12, 'AKPER PEMKAB LAHAT', '', '', '', ''),
(13, 'AKPER RS. EFARINA PURWAKARTA', '', '', '', ''),
(14, 'AKPER SAIFUDDIN ZUHRI INDRAMAYU', '', '', '', ''),
(15, 'AKPER SAWERIGADING PEMDA LUWU RAYA PALOPO', '', '', '', ''),
(16, 'AKPER SINTANG', '', '', '', ''),
(17, 'AKPER TOLITOLI', '', '', '', ''),
(18, 'AKPER YPDR JAKARTA', '', '', '', ''),
(19, 'AKPER YPIB MAJALENGKA', '', '', '', ''),
(20, 'POLITEKNIK NEGERI INDRAMAYU', '', '', '', ''),
(21, 'POLITEKNIK NEGERI SUBANG', 'POLSUB', './_img/logo_institusi/21.png', '', ''),
(22, 'POLITEKNIK TEDC BANDUNG', '', '', '', ''),
(23, 'POLTEKKES BANTEN', '', '', '', ''),
(24, 'POLTEKKES KEMENKES BANDUNG', '', './_img/logo_institusi/24.png', '', ''),
(25, 'POLTEKKES KEMENKES JAYAPURA', '', '', '', ''),
(26, 'POLTEKKES KEMENKES MAKASSAR', '', '', '', ''),
(27, 'POLTEKKES TNI AU CIUMBULEUIT BANDUNG', '', '', '', ''),
(28, 'POLTEKKES YAPKESBI SUKABUMI', '', '', '', ''),
(29, 'RS JIWA PROVINSI JAWA BARAT', '\"RS JIWA\"', './_img/logo_institusi/29.png', '', ''),
(30, 'STIKES INDONESIA MAJU', '', '', '', ''),
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
(52, 'STIKES PERMATA NUSANTARA CIANJUR', '', '', '', ''),
(53, 'STIKES PPNI JAWA BARAT', 'STIKES PPNI', './_img/logo_institusi/53.png', '', ''),
(54, 'STIKES RAJAWALI', '', '', '', ''),
(55, 'STIKES SANTO BORROMEUS', '', '', '', ''),
(56, 'STIKES SEBELAS APRIL SUMEDANG', '', '', '', ''),
(57, 'STIKES SYEDZA SAINTIKA PADANG', '', '', '', ''),
(58, 'STIKES TANA TORAJA', '', '', '', ''),
(59, 'STIKES YARSI BUKIT TINGGI', '', '', '', ''),
(60, 'STIKES YARSI PONTIANAK', '', '', '', ''),
(61, 'STIKES YPIB MAJALENGKA', '', '', '', ''),
(62, 'UNIVERSITAS ADVENT INDONESIA BANDUNG', '', '', '', ''),
(63, 'UNIVERSITAS BALE BANDUNG', '', '', '', ''),
(64, 'UNIVERSITAS BHAKTI KENCANA', 'UBK', './_img/logo_institusi/64.png', '', ''),
(65, 'UNIVERSITAS BSI BANDUNG', '', '', '', ''),
(66, 'UNIVERSITAS GALUH CIAMIS', '', '', '', ''),
(67, 'UNIVERSITAS ISLAM BANDUNG', 'UNISBA', './_img/logo_institusi/67.png', '', ''),
(68, 'UNIVERSITAS JENDERAL AHMAD YANI', 'UNJANI', './_img/logo_institusi/68.png', '', ''),
(69, 'UNIVERSITAS KOMPUTER INDONESIA', 'UNIKOM', './_img/logo_institusi/69.png', '', ''),
(70, 'UNIVERSITAS KRISTEN KRIDA WACANA', 'UKRIDA', './_img/logo_institusi/70.png', '', ''),
(71, 'UNIVERSITAS KRISTEN MARANATHA', 'UKM', './_img/logo_institusi/71.png', '', ''),
(72, 'UNIVERSITAS KRISTEN SATYA WACANA SALATIGA', '', '', '', ''),
(73, 'UNIVERSITAS MUHAMMADIYAH SUKABUMI', '', '', '', ''),
(74, 'UNIVERSITAS MUHAMMADIYAH TASIKMALAYA', '', '', '', ''),
(75, 'UNIVERSITAS NEGERI GORONTALO', '', '', '', ''),
(76, 'UNIVERSITAS PADJADJARAN', 'UNPAD', './_img/logo_institusi/76.png', '', ''),
(77, 'UNIVERSITAS PELITA HARAPAN', '', '', '', ''),
(78, 'UNIVERSITAS PENDIDIKAN INDONESIA SETIABUDI', 'UPI SETIABUDI', './_img/logo_institusi/78.png', '', ''),
(79, 'UNIVERSITAS PENDIDIKAN INDONESIA SUMEDANG', 'UPI SUMEDANG', './_img/logo_institusi/79.png', '', ''),
(80, 'UNIVERSITAS RESPATI INDONESIA', '', '', '', ''),
(81, 'UNIVERSITAS SAMRATULANGI', '', '', '', ''),
(82, 'UNIVERSITAS SULTAN AGENG TIRTAYASA ', 'UNTIRTA', './_img/logo_institusi/82.png', '', ''),
(83, 'POLITEKNIK KESEJAHTERAAN SOSIAL BANDUNG', 'POLTEKESOS', './_img/logo_institusi/83.png', '', ''),
(84, 'POLITEKNIK PIKSI GANESHA BANDUNG', 'PIKSI GANESHA', './_img/logo_institusi/84.png', '', ''),
(85, 'UNIVERSITAS PERSADA INDONESIA Y.A.I', 'UPI Y.A.I', './_img/logo_institusi/85.png', '', ''),
(86, 'UNIVERSITAS MUHAMMADIYAH CIREBON', 'UMC', '', '', ''),
(87, 'STIKES A', '', '', '', '');

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
(9, 'S2'),
(10, 'Profesi'),
(11, 'Magang');

-- --------------------------------------------------------

--
-- Table structure for table `tb_jurusan_pdd`
--

CREATE TABLE `tb_jurusan_pdd` (
  `id_jurusan_pdd` int(11) NOT NULL,
  `nama_jurusan_pdd` text NOT NULL,
  `akronim_jurusan_pdd` text DEFAULT NULL,
  `id_jurusan_pdd_jenis` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_jurusan_pdd`
--

INSERT INTO `tb_jurusan_pdd` (`id_jurusan_pdd`, `nama_jurusan_pdd`, `akronim_jurusan_pdd`, `id_jurusan_pdd_jenis`) VALUES
(0, '-- Lainnya --', NULL, 0),
(1, 'Kedokteran', 'KED', 1),
(2, 'Keperawatan', 'KEP', 2),
(3, 'Psikologi', 'PSI', 3),
(4, 'Farmasi', 'FARM', 3),
(5, 'Pekerja Sosial', 'PEKSOS', 3),
(6, 'Rekam Medis', 'RM', 3),
(7, 'Informasi Teknologi', 'IT', 4),
(8, 'Kesehatan Lingkungan', 'KESLING', 3);

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
(1, 'Data Institusi', 'Data Institusi berbeda saat pendaftaran', 'tinggi', '2022-01-02', 'CEK', 'Ade Ihsan', '192.168.7.89/sm/?prk', './_file/lapor/lapor_1_2022-01-03.png'),
(3, 'Data Harga', 'Data Harga Tidak Sesuai jurusan', 'sedang', '2022-01-03', 'CEK', 'Rani Riffani', '192.168.7.88/sm/?trk&dtl=1', './_file/lapor/lapor_3_2022-01-03.png');

-- --------------------------------------------------------

--
-- Table structure for table `tb_mentor`
--

CREATE TABLE `tb_mentor` (
  `id_mentor` int(11) NOT NULL,
  `nip_nipk_mentor` text NOT NULL,
  `nama_mentor` text NOT NULL,
  `id_unit` text NOT NULL,
  `id_mentor_jenis` int(11) NOT NULL,
  `id_jenjang_pdd` int(11) NOT NULL,
  `status_mentor` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_mentor`
--

INSERT INTO `tb_mentor` (`id_mentor`, `nip_nipk_mentor`, `nama_mentor`, `id_unit`, `id_mentor_jenis`, `id_jenjang_pdd`, `status_mentor`) VALUES
(1, '199409102020121008', 'Rizki Egi Purnama, S.Pd', '6', 2, 8, 'Aktif'),
(2, '197905022005012012', 'Aam Amalia, S.Kep., Ners (Struktural)', '0', 1, 8, 'Tidak Aktif'),
(3, '197301072005011007', 'Abdul Aziz, AMK', '14', 1, 6, 'Aktif'),
(4, '197812182006042017', 'Adah Saadah, S.Kep., Ners', '5', 1, 8, 'Aktif'),
(5, '197405121997032004', 'Ade Carnisem, S.Kep., Ners', '19', 1, 8, 'Aktif'),
(6, '196607161991032004', 'Ade Saromah, S.Kep., Ners', '0', 1, 8, 'Aktif'),
(7, '197211201991031001', 'Agus Krisno, AMK', '4', 1, 6, 'Tidak Aktif'),
(8, '198109282005011007', 'Agus Kusnandar, S.Kep., Ners', '5', 1, 8, 'Aktif'),
(9, '197503081997032002', 'Ai Sriyati, S.Kep., Ners', '20', 1, 8, 'Aktif'),
(10, '197911152000032004', 'Hj. Arimbi Nurwiyanti P, S.Kep.Ners', '16', 1, 8, 'Tidak Aktif'),
(11, '198107202006042020', 'Ani Maryani, S.Kep., Ners', '18', 1, 8, 'Aktif'),
(12, '198110272006042014', 'Butet Berlina, S.Kep., Ners', '4', 1, 8, 'Aktif'),
(13, '197610012005011010', 'Dedi Nurhasan, S.Kep., Ners', '0', 1, 8, 'Aktif'),
(14, '197601311999031001', 'H. Dedi Rahmadi, S.Kep.Ners', '17', 1, 8, 'Tidak Aktif'),
(15, '196705161991031004', 'Dedi Suhaedi, AMK', '23', 1, 6, 'Aktif'),
(16, '197909052006042016', 'Hj. Devie Fitriyani, S.Kep.Ners', '23', 1, 8, 'Tidak Aktif'),
(17, '196904071993032008', 'Dewi Shinta Maria, AMK', '4', 1, 6, 'Tidak Aktif'),
(18, '197507041999032005', 'Dian Ratnaningsih, S.Kep., Ners', '19', 1, 8, 'Tidak Aktif'),
(19, '197209081998031009', 'Edi Junaedi, AMK', '14', 1, 6, 'Tidak Aktif'),
(20, '197609212000032001', 'Elsie Rodini, AMK', '12', 1, 6, 'Tidak Aktif'),
(21, '196411011998032001', 'Eny Budiasih, S.Kep., Ners', '0', 1, 8, 'Aktif'),
(22, '196901062000122001', 'Eri Suciati, S.Kep., Ners', '4', 1, 8, 'Tidak Aktif'),
(23, '197901212005012013', 'Ester Suryani Tampubolon, S.Kep., Ners', '15', 1, 8, 'Tidak Aktif'),
(24, '197303291999032002', 'Ettie Hikmawati, S.Kep., Ners', '8', 1, 8, 'Tidak Aktif'),
(25, '196812261996032001', 'Hj. Nenti Siti Kuraesin, S.Kep., Ners', '21', 1, 8, 'Tidak Aktif'),
(26, '197807042009022004', 'Hj. Icih Susanti, S.Kep.Ners', '13', 1, 8, 'Tidak Aktif'),
(27, '197612242000031004', 'H. Moch. Jimi Dirgantara, S.Kep.Ners', '3', 1, 8, 'Tidak Aktif'),
(28, '197707041997031004', 'Yulforman Rotua Manalu, S.Kep., Ners', '4', 1, 8, 'Aktif'),
(29, '197902112006042015', 'Kokom Komalasari, S.Kep., Ners', '22', 1, 8, 'Tidak Aktif'),
(30, '196607151990032013', 'Komaryati, S.Kep., Ners', '0', 1, 8, 'Aktif'),
(31, '198307172009022001', 'Neng Goniah, S.Kep., Ners', '21', 1, 8, 'Tidak Aktif'),
(32, '197608072005012005', 'Nenih Nuraenih, S.Kep., Ners', '21', 1, 8, 'Tidak Aktif'),
(33, '197011111996032003', 'Ni Luh Nyoman S Puspowati, S.Kep., Ners', '18', 1, 8, 'Tidak Aktif'),
(34, '197004221998032004', 'Nirna Julaeha, S.Kep., Ners', '4', 1, 8, 'Aktif'),
(35, '197911232005012017', 'Novita Sari, S.Kep., Ners', '14', 1, 8, 'Tidak Aktif'),
(36, '198010212005012011', 'Siti Romlah, S.Kep., Ners', '17', 1, 8, 'Tidak Aktif'),
(37, '196908311998032005', 'Sri Kurniyati, S.Kep., Ners', '0', 1, 8, 'Aktif'),
(38, '196805271992032004', 'Sri Yani, S.Kep., Ners', '0', 1, 8, 'Aktif'),
(39, '198212302006042015', 'Tanti Heryani, S.Kep., Ners', '18', 1, 8, 'Aktif'),
(40, '198103082005012006', 'Winda Ratna Wulan, S.Kep. Ners., M.Kep.,Sp.Kep.J  ', '0', 1, 8, 'Aktif'),
(41, '196707151987032002', 'Yusi Yustiah, AMK', '5', 1, 6, 'Aktif'),
(42, '196712151990032007', 'Yuyun Yunara, S.Kep., Ners', '13', 1, 8, 'Aktif'),
(43, '197212271996031003', 'H. Zaenurohman, S.Kep.Ners', '23', 1, 8, 'Tidak Aktif'),
(44, '196608141991022004', 'dr. Hj. Elly Marliyani, Sp.KJ., M.K.M', '25', 3, 0, 'Aktif'),
(45, '196805271998032004', 'dr. Lenny Irawati Yohosua, Sp.KJ.', '25', 3, 0, 'Tidak Aktif'),
(46, '196607132007012005', 'dr. Hj. Meutia Laksaminingrum, Sp.KJ.', '25', 3, 0, 'Tidak Aktif'),
(47, '198302142015031001', 'dr. Ade Kurnia Surawijawa, Sp.KJ.', '25', 3, 0, 'Tidak Aktif'),
(48, '197507072005012006', 'dr. Lina Budiyanti, Sp.KJ. (K)', '25', 3, 0, 'Tidak Aktif'),
(49, '197707272006042026', 'dr. Dhian Indriasari, Sp.KJ.', '25', 3, 0, 'Tidak Aktif'),
(50, '197506082006041013', 'dr. Yunyun Setiawan, Sp.KJ.', '25', 3, 0, 'Tidak Aktif'),
(51, '196208081990011001', 'dr. H. Riza Putra, Sp.KJ.', '25', 3, 0, 'Tidak Aktif'),
(52, '201401065', 'dr. Hj. Lelly Resna N, Sp.KJ. (K)', '25', 3, 0, 'Tidak Aktif'),
(53, '198601052020122005', 'dr. Hilda Puspa Indah, Sp.KJ.', '25', 3, 0, 'Tidak Aktif'),
(54, '202101228', 'Hasrini Rowawi, dr., Sp.KJ (K)., MHA', '25', 4, 0, 'Tidak Aktif'),
(55, '197507072005012006', 'Lina Budiyanti, dr. Sp.KJ (K)', '25', 4, 0, 'Tidak Aktif'),
(56, '196805271998032004', 'Lenny Irawati Yohosua, dr. Sp.KJ.', '25', 4, 0, 'Tidak Aktif'),
(57, '198302142015031001', 'Ade Kurnia Surawijaya, dr. Sp.KJ.', '25', 4, 0, 'Aktif'),
(58, '197707272006042026', 'Dhian Indriasari, dr. Sp.KJ.', '25', 4, 0, 'Aktif'),
(59, '198103252011012004', 'Ekaprasetyawati, S.Si, Apt', '2', 2, 0, 'Tidak Aktif'),
(60, '196409251992031006', 'Drs. Tavip Budiawan, Apt', '2', 2, 0, 'Tidak Aktif'),
(61, '198601082010012013', 'Ema Marlina, Amd. PK', '11', 2, 0, 'Tidak Aktif'),
(62, '198102122005012013', 'Yeni Susanti, Amd. PK', '11', 2, 0, 'Aktif'),
(63, '196508051995022002', 'Dra. Resmi Prasetyani, Psi', '10', 2, 0, 'Tidak Aktif'),
(64, '197105071997032005', 'Dra. Lismaniar, Psi., M.Psi', '10', 2, 0, 'Tidak Aktif'),
(65, '198805212011011003', 'Irfan Arief Sulistyawan, Amd', '7', 2, 0, 'Tidak Aktif'),
(66, '197308081999032005', 'Yuyum Rohmulyanawati, S.Sos, MPSSp', '24', 2, 9, 'Aktif'),
(67, '198010022006042015', 'Ani Kartini, ST', '6', 2, 0, 'Aktif'),
(68, '197902192011012001', 'Indah Kusuma Dewi, dr., SpKJ', '25', 3, 0, 'Tidak Aktif');

-- --------------------------------------------------------

--
-- Table structure for table `tb_mentor_jenis`
--

CREATE TABLE `tb_mentor_jenis` (
  `id_mentor_jenis` int(11) NOT NULL,
  `nama_mentor_jenis` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_mentor_jenis`
--

INSERT INTO `tb_mentor_jenis` (`id_mentor_jenis`, `nama_mentor_jenis`) VALUES
(1, 'CI'),
(2, 'CIL'),
(3, 'PSPD'),
(4, 'PPDS');

-- --------------------------------------------------------

--
-- Table structure for table `tb_mess`
--

CREATE TABLE `tb_mess` (
  `id_mess` int(11) NOT NULL,
  `nama_mess` text DEFAULT NULL,
  `kapasitas_l_mess` int(11) NOT NULL,
  `kapasitas_p_mess` int(11) NOT NULL,
  `kapasitas_t_mess` int(11) NOT NULL,
  `alamat_mess` text DEFAULT NULL,
  `nama_pemilik_mess` text DEFAULT NULL,
  `no_pemilik_mess` text DEFAULT NULL,
  `email_pemilik_mess` text DEFAULT NULL,
  `harga_tanpa_makan_mess` int(11) NOT NULL,
  `harga_dengan_makan_mess` int(11) NOT NULL,
  `kepemilikan_mess` enum('dalam','luar') NOT NULL,
  `ket_mess` text DEFAULT NULL,
  `status_mess` enum('y','t') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_mess`
--

INSERT INTO `tb_mess` (`id_mess`, `nama_mess`, `kapasitas_l_mess`, `kapasitas_p_mess`, `kapasitas_t_mess`, `alamat_mess`, `nama_pemilik_mess`, `no_pemilik_mess`, `email_pemilik_mess`, `harga_tanpa_makan_mess`, `harga_dengan_makan_mess`, `kepemilikan_mess`, `ket_mess`, `status_mess`) VALUES
(1, 'Mess RSJ 1 Lama', 0, 0, 20, 'Jl. Kolonel Maturi KM.7, Desa Jambudipa, Kec. Cisarua, Kab. Bandung Barat, 40551', 'RS Jiwa Provinsi Jawa Barat', '081321329101', '', 20000, 100000, 'dalam', 'Makan 3x Sehari', 'y'),
(2, 'Mess RSJ 2 Baru', 0, 0, 92, 'Jl. Kolonel Maturi KM.7, Desa Jambudipa, Kec. Cisarua, Kab. Bandung Barat, 40551', 'RS Jiwa Provinsi Jawa Barat', '081321329101', '', 20000, 100000, 'dalam', '', 'y'),
(3, 'Asrama Rifa Corporate', 0, 0, 100, 'Kp. Panyandaan RT. 01 RW. 14 Desa Jambudipa Kecamatan Cisarua Kab. Bandung Barat', 'Ibu Ai', '081322629909', '', 20000, 80000, 'luar', 'Dengan Makan 3x Sehari', 'y'),
(4, 'Pondokan H. Ating', 0, 0, 100, 'Kp. Barukai Timur RT. 04 RW. 13 Desa Jambudipa Kecamatan Cisarua Kab. Bandung Barat', 'H. Ating / Hj. Siti Sutiah', '0', '', 20000, 80000, 'luar', '', 'y'),
(5, 'Wisma Anugrah Ibu Nanik', 0, 0, 70, 'Kp. Panyandaan RT. 01 RW. 14 Desa Jambudipa Kecamatan Cisarua Kab. Bandung Barat', 'Hj. Nanik Susiani', '081320719652', '', 15000, 70000, 'luar', '', 'y'),
(6, 'Pondokan dr. Hj. Meutia Laksminingrum', 0, 0, 0, '-', 'dr. Hj. Meutia Laksminingrum', '0', '', 0, 0, 'luar', '', 't'),
(7, 'Galuh Pakuan', 0, 0, 70, 'Kp. Panyandaan RT. 01 RW. 14 Desa Jambudipa Kecamatan Cisarua Kab. Bandung Barat', 'Oyo Suharya', '081320113399', '', 20000, 80000, 'luar', '', 'y'),
(8, 'Pondokan Tatang', 0, 0, 30, 'Kp. Panyandaan RT. 01 RW. 14 Desa Jambudipa Kecamatan Cisarua Kab. Bandung Barat', 'Tatang', '089531804825', '', 20000, 80000, 'luar', 'Dengan Makan 3x Sehari', 'y');

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
  `total_hari_mess_pilih` int(11) NOT NULL,
  `total_tarif_mess_pilih` int(11) NOT NULL
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
  `no_rsj_mou` text DEFAULT NULL,
  `no_institusi_mou` text DEFAULT NULL,
  `id_jurusan_pdd` int(11) DEFAULT NULL,
  `id_spesifikasi_pdd` int(11) DEFAULT NULL,
  `id_jenjang_pdd` int(11) DEFAULT NULL,
  `id_akreditasi` int(11) DEFAULT NULL,
  `file_surat_pb_mou` text DEFAULT NULL,
  `file_surat_pp_mou` text DEFAULT NULL,
  `file_mou` text DEFAULT NULL,
  `ket_mou` enum('proses pengajuan baru','proses pengajuan perpanjang') DEFAULT NULL,
  `status_mou` enum('Y','T') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_mou`
--

INSERT INTO `tb_mou` (`id_mou`, `id_institusi`, `tgl_mulai_mou`, `tgl_selesai_mou`, `no_rsj_mou`, `no_institusi_mou`, `id_jurusan_pdd`, `id_spesifikasi_pdd`, `id_jenjang_pdd`, `id_akreditasi`, `file_surat_pb_mou`, `file_surat_pp_mou`, `file_mou`, `ket_mou`, `status_mou`) VALUES
(1, '1', '2016-01-05', '2019-01-04', '?./?./RSJ', '?../?../?..', 6, 0, 0, 0, NULL, NULL, NULL, NULL, 'Y'),
(2, '2', '2014-02-13', '2017-02-12', '?./?./RSJ', '?../?../?..', 2, 0, 0, 2, NULL, NULL, NULL, NULL, 'Y'),
(3, '3', '2018-08-20', '2021-08-19', '119/14858/RSJ', '036/AKP/BK-A/VIII/2018', 2, 0, 0, 0, NULL, NULL, NULL, NULL, 'Y'),
(4, '4', '2017-12-22', '2020-12-21', '119/19834/RSJ', '355/PKS/AKBM/XII/2017', 2, 0, 0, 0, NULL, NULL, NULL, NULL, 'Y'),
(5, '5', '2019-06-19', '2022-06-18', '073/10582/RSJ', 'B. 167/AKPER BPC/VI/2019', 2, 0, 0, 0, NULL, NULL, NULL, NULL, 'Y'),
(6, '6', '2021-09-27', '2024-09-26', '119/11581/RSJ', 'PKS/008/AKPER RSD/VII/2018', 2, 0, 0, 2, NULL, NULL, NULL, NULL, 'Y'),
(7, '7', '2015-01-02', '2018-01-01', '119/20549A/RSJ', '420/526/AKPER/2018', 2, 0, 0, 2, NULL, NULL, NULL, NULL, 'Y'),
(8, '8', '2019-02-06', '2022-02-05', '?./?./RSJ', 'YK/AKTI/PKS/01/01/2015', 2, 0, 0, 0, NULL, NULL, NULL, NULL, 'Y'),
(9, '9', '2013-06-12', '2016-06-11', '119/2418/RSJ', '032/AL.A/SKS.01/II/2019', 2, 0, 0, 0, NULL, NULL, NULL, NULL, 'Y'),
(10, '10', '2014-07-17', '2017-07-16', '?./?./RSJ', '?../?../?..', 2, 0, 0, 3, NULL, NULL, NULL, NULL, 'Y'),
(11, '11', '2018-11-12', '2021-11-11', '?./?./RSJ', '?../?../?..', 2, 0, 0, 0, NULL, NULL, NULL, NULL, 'Y'),
(12, '12', '2014-01-21', '2017-01-20', '?./?./RSJ', '?../?../?..', 2, 0, 0, 0, NULL, NULL, NULL, NULL, 'Y'),
(13, '13', '2014-03-28', '2017-03-27', '?./?./RSJ', '?../?../?..', 2, 0, 0, 3, NULL, NULL, NULL, NULL, 'Y'),
(14, '14', '2018-09-12', '2021-09-11', '119/16344/RSJ', '007 KS/AKSARI/IX/2018', 2, 0, 0, 2, NULL, NULL, NULL, NULL, 'Y'),
(15, '15', '2014-05-14', '2017-05-13', '?./?./RSJ', '?../?../?..', 2, 0, 0, 3, NULL, NULL, NULL, NULL, 'Y'),
(16, '16', '2011-06-13', '2014-06-12', '?./?./RSJ', '?../?../?..', 2, 0, 0, 0, NULL, NULL, NULL, NULL, 'Y'),
(17, '17', '2014-01-01', '2016-12-31', '?./?./RSJ', '?../?../?..', 2, 0, 0, 0, NULL, NULL, NULL, NULL, 'Y'),
(18, '18', '2014-10-21', '2017-10-20', '?./?./RSJ', '?../?../?..', 2, 0, 0, 0, NULL, NULL, NULL, NULL, 'Y'),
(19, '19', '2021-11-09', '2024-11-08', '119/12968/RSJ', '087/DIR/PKS-RSI/VIII/2019\nDan\n038/PKS/DN/FUKM/VIII/2019', 2, 0, 0, 0, NULL, NULL, NULL, NULL, 'Y'),
(20, '68', '2019-07-01', '2022-06-30', '119/1458/RSJ', '551A/UKKW/FK/D/V/2019\nDan\n173/072-26/2019', 4, 0, 0, 2, NULL, NULL, NULL, NULL, 'Y'),
(21, '71', '2019-08-01', '2022-07-31', '119/15675/RSJ', '445/1318/UHP-RS Ihsan\nDan\n108/Dek/FK/IX/2019', 1, 0, 0, 2, NULL, NULL, NULL, NULL, 'Y'),
(22, '70', '2019-05-29', '2022-05-28', '07313324/RSJ/2015', '005/KS-FK UNJANI/X/2015', 1, 0, 0, 2, NULL, NULL, NULL, NULL, 'Y'),
(23, '67', '2019-09-17', '2022-09-16', '119/10058/RSJ', 'HK.03.01/X.4.2.1/14120/2020\ndan 677/UN6.C/PKS/2020', 1, 0, 0, 1, NULL, NULL, NULL, NULL, 'Y'),
(24, '68', '2015-10-29', '2018-10-28', '?./?./RSJ', '?../?../?..', 1, 0, 0, 2, NULL, NULL, NULL, NULL, 'Y'),
(25, '82', '2021-10-05', '2024-10-04', '?./?./RSJ', '?../?../?..', 1, 0, 0, 2, NULL, NULL, NULL, NULL, 'Y'),
(26, '76', '2020-07-01', '2023-07-01', '?./?./RSJ', '?../?../?..', 1, 0, 0, 1, NULL, NULL, NULL, NULL, 'Y'),
(27, '76', '2021-12-06', '2024-12-05', '119/209634/RSJ', 'HK.05.01/1.6/5004/2018', 2, 0, 0, 1, NULL, NULL, NULL, NULL, 'Y'),
(28, '71', '2020-11-02', '2023-11-02', '075/0409/RSJ/I/2020', '016/POLTEKKES/I/2020', 3, 0, 0, 2, NULL, NULL, NULL, NULL, 'Y'),
(29, '71', '2014-03-10', '2017-03-09', '?./?./RSJ', '?../?../?..', 3, 0, 0, 2, NULL, NULL, NULL, NULL, 'Y'),
(30, '67', '2021-09-20', '2024-09-19', '?./?./RSJ', '?../?../?..', 3, 0, 9, 2, NULL, NULL, NULL, NULL, 'Y'),
(31, '20', '2020-07-30', '2023-07-30', '?./?./RSJ', '?../?../?..', 2, 0, 0, 2, NULL, NULL, NULL, NULL, 'Y'),
(32, '21', '2021-10-12', '2024-10-11', '073/6519/RSJ', '808/MOU.02/STIKES-AB/IV/2019', 2, 0, 0, 2, NULL, NULL, NULL, NULL, 'Y'),
(33, '22', '2019-02-01', '2022-01-31', '?./?./RSJ', '?../?../?..', 2, 0, 0, 3, NULL, NULL, NULL, NULL, 'Y'),
(34, '23', '2012-06-04', '2015-06-04', '?./?./RSJ', '?../?../?..', 2, 0, 0, 2, NULL, NULL, NULL, NULL, 'Y'),
(35, '24', '2021-08-18', '2024-08-17', '?./?./RSJ', '?../?../?..', 4, 0, 0, 2, NULL, NULL, NULL, NULL, 'Y'),
(36, '24', '2021-08-18', '2024-08-17', '?./?./RSJ', '?../?../?..', 2, 0, 0, 2, NULL, NULL, NULL, NULL, 'Y'),
(37, '24', '2021-03-10', '2024-03-09', '073/11261/RSJ', '505/D/BAHUK-STIKES/VII/2018', 8, 0, 0, 2, NULL, NULL, NULL, NULL, 'Y'),
(38, '25', '2019-12-16', '2022-12-15', '073/0090/RSJ', '672/B/STIKESCRB/I/2018', 2, 0, 0, 2, NULL, NULL, NULL, NULL, 'Y'),
(39, '26', '2014-12-12', '2017-12-11', '?./?./RSJ', '?../?../?..', 2, 0, 0, 2, NULL, NULL, NULL, NULL, 'Y'),
(40, '27', '2020-01-08', '2023-01-07', '119/12949/RSJ', '120/SDHB/PKS/TU/VII/2018', 2, 0, 0, 2, NULL, NULL, NULL, NULL, 'Y'),
(41, '28', '2019-02-04', '2022-02-03', '073/12321/RSJ', '810/STIKES-FA/MOU/VII/2018', 2, 0, 0, 2, NULL, NULL, NULL, NULL, 'Y'),
(42, '67', '2021-09-20', '2024-09-19', '119/17531/RSJ', '1138/K/STIKES.DK/IX/2018', 0, 0, 9, 1, NULL, NULL, NULL, NULL, 'Y'),
(43, '30', '2019-04-26', '2022-04-25', '073/18015/RSJ/X/2019', '270/STIKI/WK.III/X/2019', 2, 0, 0, 2, NULL, NULL, NULL, NULL, 'Y'),
(44, '31', '2019-04-08', '2022-04-07', '075/4422/RSJ', 'PKS/018/STIKES/III/2019', 2, 0, 0, 2, NULL, NULL, NULL, NULL, 'Y'),
(45, '32', '2014-01-30', '2017-01-29', '.?/?./RSJ', '0324/STIKES-KHG-MOU-IV/2018', 2, 0, 0, 2, NULL, NULL, NULL, NULL, 'Y'),
(46, '33', '2012-09-07', '2015-09-07', '073/19852/RSJ/XII/2020', '67/HO.00.03/TU-STIKESMI/XII/2020', 2, 0, 0, 3, NULL, NULL, NULL, NULL, 'Y'),
(47, '34', '2011-07-26', '2014-07-25', '073/8115/RSJ', 'B.010/STIKKU/MoU/IV/2019', 2, 0, 0, 2, NULL, NULL, NULL, NULL, 'Y'),
(48, '35', '2012-05-03', '2015-05-03', '?./?./RSJ', '?../?../?..', 2, 0, 0, 2, NULL, NULL, NULL, NULL, 'Y'),
(49, '36', '2021-10-11', '2024-10-10', '?./?./RSJ', '?../?../?..', 2, 0, 0, 2, NULL, NULL, NULL, NULL, 'Y'),
(50, '37', '2020-11-02', '2023-11-02', '075/0239/RSJ', '057/STIKES-MK/MOU/I/2019', 2, 0, 0, 0, NULL, NULL, NULL, NULL, 'Y'),
(51, '38', '2014-01-01', '2016-12-31', '073/DIKLIT-5632/III/2016', '028/III.3,AU/B/2016', 2, 0, 0, 2, NULL, NULL, NULL, NULL, 'Y'),
(52, '39', '2021-08-08', '2024-08-07', '073/1965/TSJ', 'DL.02.02.1965.04.2015', 2, 0, 0, 2, NULL, NULL, NULL, NULL, 'Y'),
(53, '40', '2018-07-13', '2021-07-12', '119/16549/RSJ', 'III/884.1/STIKEP/PPNI/JBR/IX/2018', 2, 0, 0, 2, NULL, NULL, NULL, NULL, 'Y'),
(54, '41', '2018-09-29', '2021-09-28', '119/9816/RSJ', 'PKS.032/IKR-I/R/VI/2020', 2, 0, 0, 2, NULL, NULL, NULL, NULL, 'Y'),
(55, '42', '2019-10-29', '2022-10-28', '073/20903/RSJ', '017/STIKes-SB/SP-KS/XII/2020', 2, 0, 0, 2, NULL, NULL, NULL, NULL, 'Y'),
(56, '43', '2019-03-26', '2022-03-25', '073/0954/RSJ', '022/D-STIK/UN/II/2015', 2, 0, 0, 2, NULL, NULL, NULL, NULL, 'Y'),
(57, '44', '2018-04-30', '2021-04-29', '', '', 2, 0, 0, 2, NULL, NULL, NULL, NULL, 'Y'),
(58, '45', '2020-12-01', '2023-12-01', '073/0428/RSJ', '?/STIKES-TT/I/2015', 2, 0, 0, 2, NULL, NULL, NULL, NULL, 'Y'),
(59, '46', '2019-04-15', '2022-04-14', '', '', 2, 0, 0, 2, NULL, NULL, NULL, NULL, 'Y'),
(60, '47', '2011-03-21', '2014-03-20', '073/7945/RSJ/2016', '168/STIKES.YSI/V/2016', 2, 0, 0, 2, NULL, NULL, NULL, NULL, 'Y'),
(61, '48', '2014-01-01', '2016-12-31', '119/21223/RSJ', 'A-46/MoU/LPPM-STIKesYPIB/XII/2020', 2, 0, 0, 2, NULL, NULL, NULL, NULL, 'Y'),
(62, '49', '2019-01-04', '2022-01-03', '?./?./RSJ', '?../?../?..', 2, 0, 0, 0, NULL, NULL, NULL, NULL, 'Y'),
(63, '50', '2019-12-14', '2022-12-13', '119/20217A/RSJ', '06/FIKES/UNIBA/01/XI/2018', 2, 0, 0, 2, NULL, NULL, NULL, NULL, 'Y'),
(64, '51', '2015-04-06', '2018-04-05', '?./?./RSJ', '?../?../?..', 2, 0, 0, 3, NULL, NULL, NULL, NULL, 'Y'),
(65, '52', '2018-09-14', '2021-09-13', '119/16531/RSJ', '13/4123/AK/KS/R/IX/2018', 2, 0, 0, 3, NULL, NULL, NULL, NULL, 'Y'),
(66, '53', '2021-09-08', '2024-09-07', '', '', 2, 0, 0, 3, NULL, NULL, NULL, NULL, 'Y'),
(67, '54', '2020-06-26', '2023-06-26', '119/3413/RSJ', '128/I.0/F/2019', 2, 0, 0, 2, NULL, NULL, NULL, NULL, 'Y'),
(68, '55', '2020-12-15', '2023-12-15', '119/1864/RSJ', '1767/UN47.B7.5.5/F/2018', 2, 0, 0, 2, NULL, NULL, NULL, NULL, 'Y'),
(69, '56', '2015-02-12', '2018-02-11', '445/18685/RSJ', '1621/UN40.C2/HK/2020', 2, 0, 0, 0, NULL, NULL, NULL, NULL, 'Y'),
(70, '57', '2014-01-01', '2016-12-31', '119/1332/RSJ', '0223/UN40.A6/DN/2019', 2, 0, 0, 2, NULL, NULL, NULL, NULL, 'Y'),
(71, '58', '2015-01-26', '2018-01-25', '?./?./RSJ', '?../?../?..', 2, 0, 0, 3, NULL, NULL, NULL, NULL, 'Y'),
(72, '59', '2014-03-03', '2017-03-02', '?./?./RSJ', '?../?../?..', 2, 0, 0, 2, NULL, NULL, NULL, NULL, 'Y'),
(73, '60', '2016-05-02', '2019-05-02', '119/6207/RSJ', 'T/5/UN43.2/HK.07.00/2019', 2, 0, 0, 2, NULL, NULL, NULL, NULL, 'Y'),
(74, '61', '2020-12-21', '2023-12-21', '073/4052/RSJ', '003.01/TEDC/MOU-DIR/II/2019', 2, 0, 0, 3, NULL, NULL, NULL, NULL, 'Y'),
(75, '62', '2021-09-24', '2024-09-23', '073/5921/RSJ', '002/FOM-UPH/PKS/III/2019', 2, 0, 0, 2, NULL, NULL, NULL, NULL, 'Y'),
(76, '63', '2018-11-26', '2021-11-25', '119/2307/RSJ', '0098/Q/P.Y.SMI/II/2019', 2, 0, 0, 0, NULL, NULL, NULL, NULL, 'Y'),
(77, '64', '2019-09-26', '2022-09-25', '119/20494/RSJ', '168/AKPER/B-MOU/IX/2018', 2, 0, 0, 3, NULL, NULL, NULL, NULL, 'Y'),
(78, '65', '2012-02-15', '2015-02-14', '073/4623/RSJ', '700/FIKES-UMTAS/III/2019', 2, 0, 0, 2, NULL, NULL, NULL, NULL, 'Y'),
(79, '66', '2021-10-07', '2024-10-06', '073/11279/RSJ', 'HK.05.01/1.6/2460/2018', 2, 0, 0, 2, NULL, NULL, NULL, NULL, 'Y'),
(80, '72', '2020-11-18', '2023-11-18', '073/10034/RSJ', 'B/13/PL41/HL.04.03/2019', 3, 0, 0, 1, NULL, NULL, NULL, NULL, 'Y'),
(81, '73', '2019-02-20', '2022-02-19', '?./?./RSJ', '?../?../?..', 2, 0, 0, 2, NULL, NULL, NULL, NULL, 'Y'),
(82, '74', '2019-03-11', '2022-03-10', '073/11145/RSJ', 'PKS-  /Ffa-UNJANI/VIII/2019', 2, 0, 0, 2, NULL, NULL, NULL, NULL, 'Y'),
(83, '75', '2018-10-15', '2021-10-14', '070/7441/RSJ', '1932/MOU/K/Ka./STIKIM/VI/2019', 2, 0, 0, 2, NULL, NULL, NULL, NULL, 'Y'),
(84, '77', '2019-03-28', '2022-03-27', '073/16246/RSJ/IX/2019', '04/14/UBK/IX/2019', 2, 0, 0, 2, NULL, NULL, NULL, NULL, 'Y'),
(85, '78', '2019-01-21', '2022-01-20', '073/21320/RSJ/XII/2019', 'HK.03.01/1.6/0012/2019', 2, 0, 0, 1, NULL, NULL, NULL, NULL, 'Y'),
(86, '79', '2020-11-12', '2023-11-12', '073/11662/RSJ', '888/PL42/KS/2020', 2, 0, 0, 1, NULL, NULL, NULL, NULL, 'Y'),
(87, '80', '2014-09-04', '2017-09-03', '073/18973/RSJ', '247/PKS/UKSW/XI/2020', 2, 0, 0, 2, NULL, NULL, NULL, NULL, 'Y'),
(88, '81', '2014-01-01', '2016-12-31', '073/16336/RSJ', '037/PKS/DN/FKUKMXI/2020', 2, 0, 0, 1, NULL, NULL, NULL, NULL, 'Y'),
(89, '82', '2019-04-16', '2022-04-15', '073/11279/RSJ', 'HK.05.01/1.6/2460/2018', 2, 0, 0, 1, NULL, NULL, NULL, NULL, 'Y'),
(90, '85', '2021-11-22', '2024-11-21', '073/11279/RSJ', 'HK.05.01/1.6/2460/2018', 3, 0, 0, 2, NULL, NULL, NULL, NULL, 'Y'),
(91, '69', NULL, NULL, NULL, NULL, 7, 0, 8, 2, './_file/mou/pengajuan_baru/pb_mou_91_2022-01-14.pdf', NULL, NULL, 'proses pengajuan baru', NULL),
(92, '69', NULL, NULL, NULL, NULL, 7, 0, 0, 2, './_file/mou/pengajuan_baru/pb_mou_92_2022-01-14.pdf', NULL, NULL, 'proses pengajuan baru', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_nilai`
--

CREATE TABLE `tb_nilai` (
  `id_nilai` int(100) NOT NULL,
  `id_praktikan_detail` int(11) NOT NULL,
  `ip` decimal(10,0) DEFAULT NULL,
  `sptk` decimal(10,0) DEFAULT NULL,
  `prepost` decimal(10,0) DEFAULT NULL,
  `dokep` decimal(10,0) DEFAULT NULL,
  `komter` decimal(10,0) DEFAULT NULL,
  `tak` decimal(10,0) DEFAULT NULL,
  `penyuluhan` decimal(10,0) DEFAULT NULL,
  `presentasi` decimal(10,0) DEFAULT NULL,
  `sikap` decimal(10,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_nilai_dokter`
--

CREATE TABLE `tb_nilai_dokter` (
  `id_nilai_dokter` int(100) NOT NULL,
  `id_praktikan_detail` int(11) NOT NULL,
  `css1` decimal(10,0) DEFAULT NULL,
  `css2` decimal(10,0) DEFAULT NULL,
  `bst1` decimal(10,0) DEFAULT NULL,
  `bst2` decimal(10,0) DEFAULT NULL,
  `bst3` decimal(10,0) DEFAULT NULL,
  `bst4` decimal(10,0) DEFAULT NULL,
  `bst5` decimal(10,0) DEFAULT NULL,
  `bst6` decimal(10,0) DEFAULT NULL,
  `crs1` decimal(10,0) DEFAULT NULL,
  `crs2` decimal(10,0) NOT NULL,
  `minicex` decimal(10,0) NOT NULL,
  `ujian_akhir` decimal(10,0) NOT NULL,
  `keterangan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `surat_praktik` text DEFAULT NULL,
  `data_praktik` text DEFAULT NULL,
  `id_jurusan_pdd` text DEFAULT NULL,
  `id_jenjang_pdd` text DEFAULT NULL,
  `id_spesifikasi_pdd` text DEFAULT NULL,
  `id_akreditasi` text NOT NULL,
  `id_user` text NOT NULL,
  `nama_pembimbing_praktik` text NOT NULL,
  `email_pembimbing_praktik` text NOT NULL,
  `telp_pembimbing_praktik` text NOT NULL,
  `status_cek_praktik` text NOT NULL,
  `status_praktik` enum('D','W','Y','A') NOT NULL,
  `ket_tolakPraktikHarga_praktik` text NOT NULL,
  `ket_tolakPembayaran_praktik` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_praktikan`
--

CREATE TABLE `tb_praktikan` (
  `id_praktikan` int(11) NOT NULL,
  `id_praktik` int(11) NOT NULL,
  `status_praktikan` text NOT NULL,
  `status_pemb_temp_praktikan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_praktikan_detail`
--

CREATE TABLE `tb_praktikan_detail` (
  `id_praktikan_detail` int(11) NOT NULL,
  `id_praktikan` int(11) NOT NULL,
  `no_id_praktikan_detail` text NOT NULL,
  `nama_praktikan_detail` text NOT NULL,
  `tgl_lahir_praktikan_detail` date NOT NULL,
  `telp_praktikan_detail` text NOT NULL,
  `email_praktikan_detail` text NOT NULL,
  `tgl_input_praktikan_detail` date DEFAULT NULL,
  `tgl_ubah_praktikan_detail` date DEFAULT NULL,
  `status_praktikan_detail` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_spesifikasi_pdd`
--

CREATE TABLE `tb_spesifikasi_pdd` (
  `id_spesifikasi_pdd` int(11) NOT NULL,
  `nama_spesifikasi_pdd` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_spesifikasi_pdd`
--

INSERT INTO `tb_spesifikasi_pdd` (`id_spesifikasi_pdd`, `nama_spesifikasi_pdd`) VALUES
(0, '-- Lainnya --'),
(1, 'Program Pendidikan Dokter Spesialis (PPDS)'),
(2, 'Profesi Ners'),
(15, 'Program Studi Pendidikan Dokter (PSPD) / Co-ass');

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
(1, 0, 0, 'admin', 'e1d5be1c7f2f456670de3d53c7b54f4a', 'ADMIN DIKLAT RS JIWA', 'admin@admin', '1', '08123145645', NULL, '2022-02-19', '2021-03-29', '2022-01-17', 'Y'),
(15, 0, 69, 'user', 'ee11cbb19052e40b07aac0ca060c23ee', 'USER', 'user@user', '2', '081273123123', NULL, '2022-01-14', '2021-12-31', '2022-01-13', 'Y'),
(16, 0, 5, 'asalajah@gmail.com', 'e66ed49f9432f4ef78d0910ab7e31f57', 'Melly', 'asalajah@gmail.com', '2', '081123456789', NULL, '2022-01-05', '2022-01-05', NULL, 'Y'),
(17, 0, 3, 'diklit.rsj.jabarprov@gmail.com', '39b1f688752f9edb7e1283a4649f05a4', 'Rani', 'diklit.rsj.jabarprov@gmail.com', '2', '081320510201', NULL, '2022-01-05', '2022-01-05', NULL, 'Y'),
(18, 0, 87, 'adi@nentin.com', '81dc9bdb52d04dc20036dbd8313ed055', 'Adi', 'adi@nentin.com', '2', '0823823', NULL, '2022-02-15', '2022-02-15', NULL, 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user_detail`
--

CREATE TABLE `tb_user_detail` (
  `id_user` int(11) NOT NULL,
  `id_mou` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
-- Indexes for table `tb_lapor`
--
ALTER TABLE `tb_lapor`
  ADD PRIMARY KEY (`id_lapor`);

--
-- Indexes for table `tb_mentor`
--
ALTER TABLE `tb_mentor`
  ADD PRIMARY KEY (`id_mentor`);

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
-- Indexes for table `tb_nilai`
--
ALTER TABLE `tb_nilai`
  ADD PRIMARY KEY (`id_nilai`);

--
-- Indexes for table `tb_nilai_dokter`
--
ALTER TABLE `tb_nilai_dokter`
  ADD PRIMARY KEY (`id_nilai_dokter`);

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
-- Indexes for table `tb_praktikan_detail`
--
ALTER TABLE `tb_praktikan_detail`
  ADD PRIMARY KEY (`id_praktikan_detail`);

--
-- Indexes for table `tb_spesifikasi_pdd`
--
ALTER TABLE `tb_spesifikasi_pdd`
  ADD PRIMARY KEY (`id_spesifikasi_pdd`);

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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_akreditasi`
--
ALTER TABLE `tb_akreditasi`
  MODIFY `id_akreditasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_bayar`
--
ALTER TABLE `tb_bayar`
  MODIFY `id_bayar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tb_jenjang_pdd`
--
ALTER TABLE `tb_jenjang_pdd`
  MODIFY `id_jenjang_pdd` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tb_jurusan_pdd`
--
ALTER TABLE `tb_jurusan_pdd`
  MODIFY `id_jurusan_pdd` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tb_jurusan_pdd_jenis`
--
ALTER TABLE `tb_jurusan_pdd_jenis`
  MODIFY `id_jurusan_pdd_jenis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_lapor`
--
ALTER TABLE `tb_lapor`
  MODIFY `id_lapor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tb_mess`
--
ALTER TABLE `tb_mess`
  MODIFY `id_mess` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tb_mess_pilih`
--
ALTER TABLE `tb_mess_pilih`
  MODIFY `id_mess_pilih` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_mou`
--
ALTER TABLE `tb_mou`
  MODIFY `id_mou` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- AUTO_INCREMENT for table `tb_nilai`
--
ALTER TABLE `tb_nilai`
  MODIFY `id_nilai` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_nilai_dokter`
--
ALTER TABLE `tb_nilai_dokter`
  MODIFY `id_nilai_dokter` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_praktik`
--
ALTER TABLE `tb_praktik`
  MODIFY `id_praktik` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_praktikan`
--
ALTER TABLE `tb_praktikan`
  MODIFY `id_praktikan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_praktikan_detail`
--
ALTER TABLE `tb_praktikan_detail`
  MODIFY `id_praktikan_detail` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_spesifikasi_pdd`
--
ALTER TABLE `tb_spesifikasi_pdd`
  MODIFY `id_spesifikasi_pdd` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
