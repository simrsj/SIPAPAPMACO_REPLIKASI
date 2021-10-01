-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 01, 2021 at 04:59 AM
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
-- Table structure for table `tb_accreditation`
--

CREATE TABLE `tb_accreditation` (
  `id_accreditation` int(11) NOT NULL,
  `name_accreditation` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_accreditation`
--

INSERT INTO `tb_accreditation` (`id_accreditation`, `name_accreditation`) VALUES
(1, 'A'),
(2, 'B'),
(3, 'C'),
(4, 'BAN-PT');

-- --------------------------------------------------------

--
-- Table structure for table `tb_institute`
--

CREATE TABLE `tb_institute` (
  `id_institute` int(11) NOT NULL,
  `name_institute` int(11) NOT NULL,
  `logo_institute` int(11) NOT NULL,
  `address_institute` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_level`
--

CREATE TABLE `tb_level` (
  `id_level` int(11) NOT NULL,
  `name_level` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_level`
--

INSERT INTO `tb_level` (`id_level`, `name_level`) VALUES
(1, 'SMA'),
(2, 'SMK'),
(3, 'D3'),
(4, 'D4'),
(5, 'S1'),
(6, 'S2');

-- --------------------------------------------------------

--
-- Table structure for table `tb_major`
--

CREATE TABLE `tb_major` (
  `id_major` int(11) NOT NULL,
  `name_major` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_major`
--

INSERT INTO `tb_major` (`id_major`, `name_major`) VALUES
(1, 'Kedokteran'),
(2, 'Keperawatan'),
(3, 'Psikologi'),
(4, 'Farmasi'),
(5, 'Pekerja Sosial'),
(6, 'Akuntansi'),
(7, 'Rekam Medis'),
(8, 'Pendidikan Lainnya');

-- --------------------------------------------------------

--
-- Table structure for table `tb_mentor_edu`
--

CREATE TABLE `tb_mentor_edu` (
  `id_mentor_edu` int(11) NOT NULL,
  `name_mentor_edu` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_mentor_edu`
--

INSERT INTO `tb_mentor_edu` (`id_mentor_edu`, `name_mentor_edu`) VALUES
(1, 'D3'),
(2, 'S1'),
(3, 'S2'),
(4, 'S3');

-- --------------------------------------------------------

--
-- Table structure for table `tb_mentor_kind`
--

CREATE TABLE `tb_mentor_kind` (
  `id_mentor_kind` int(11) NOT NULL,
  `name_mentor_kind` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_mentor_kind`
--

INSERT INTO `tb_mentor_kind` (`id_mentor_kind`, `name_mentor_kind`) VALUES
(1, 'CI'),
(2, 'CIL'),
(3, 'PPDS'),
(4, 'PSPD');

-- --------------------------------------------------------

--
-- Table structure for table `tb_mentor_rsj`
--

CREATE TABLE `tb_mentor_rsj` (
  `id_mentor_rsj` int(11) NOT NULL,
  `nip_nipk_mentor_rsj` text NOT NULL,
  `name_mentor_rsj` text NOT NULL,
  `unit_mentor_rsj` text NOT NULL,
  `info_mentor_rsj` text NOT NULL,
  `min_mentor_rsj` varchar(3) NOT NULL,
  `status_mentor_rsj` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_mentor_rsj`
--

INSERT INTO `tb_mentor_rsj` (`id_mentor_rsj`, `nip_nipk_mentor_rsj`, `name_mentor_rsj`, `unit_mentor_rsj`, `info_mentor_rsj`, `min_mentor_rsj`, `status_mentor_rsj`) VALUES
(1, '197905022005012012', 'Aam Amalia, S.Kep., Ners', '-', 'CI', 'S1', 0),
(2, '197905022005012012', 'Aam Amalia, S.Kep., Ners (Struktural)', '-', 'CI', 'S1', 0),
(3, '197301072005011007', 'Abdul Aziz, AMK', 'RUANG KASUARI ATAS', 'CI', 'D3', 1),
(4, '197812182006042017', 'Adah Saadah, S.Kep., Ners', 'INSTALASI REHABILITASI PSIKOSOSIAL', 'CI', 'S1', 1),
(5, '197405121997032004', 'Ade Carnisem, S.Kep., Ners', 'RUANG MURAI', 'CI', 'S1', 1),
(6, '196607161991032004', 'Ade Saromah, S.Kep., Ners', '-', 'CI', 'S1', 0),
(7, '197211201991031001', 'Agus Krisno, AMK', 'INSTALASI RAWAT JALAN', 'CI', 'D3', 1),
(8, '198109282005011007', 'Agus Kusnandar, S.Kep., Ners', 'INSTALASI REHABILITASI PSIKOSOSIAL', 'CI', 'S1', 1),
(9, '197503081997032002', 'Ai Sriyati, S.Kep., Ners', 'RUANG NAPZA', 'CI', 'S1', 1),
(10, '197911152000032004', 'Hj. Arimbi Nurwiyanti P, S.Kep.Ners', 'RUANG KESWARA', 'CI', 'S1', 1),
(11, '198107202006042020', 'Ani Maryani, S.Kep., Ners', 'RUANG MERPATI', 'CI', 'S1', 1),
(12, '198110272006042014', 'Butet Berlina, S.Kep., Ners', 'INSTALASI RAWAT JALAN', 'CI', 'S1', 1),
(13, '197610012005011010', 'Dedi Nurhasan, S.Kep., Ners', '-', 'CI', 'S1', 0),
(14, '197601311999031001', 'H. Dedi Rahmadi, S.Kep.Ners', 'RUANG MERAK', 'CI', 'S1', 1),
(15, '196705161991031004', 'Dedi Suhaedi, AMK', 'RUANG RAJAWALI', 'CI', 'D3', 1),
(16, '197909052006042016', 'Hj. Devie Fitriyani, S.Kep.Ners', 'RUANG RAJAWALI', 'CI', 'S1', 1),
(17, '196904071993032008', 'Dewi Shinta Maria, AMK', 'INSTALASI RAWAT JALAN', 'CI', 'D3', 1),
(18, '197507041999032005', 'Dian Ratnaningsih, S.Kep., Ners', 'RUANG MURAI', 'CI', 'S1', 1),
(19, '197209081998031009', 'Edi Junaedi, AMK', 'RUANG KASUARI ATAS', 'CI', 'D3', 1),
(20, '197609212000032001', 'Elsie Rodini, AMK', 'RUANG GARUDA', 'CI', 'D3', 1),
(21, '196411011998032001', 'Eny Budiasih, S.Kep., Ners', '-', 'CI', 'S1', 0),
(22, '196901062000122001', 'Eri Suciati, S.Kep., Ners', 'INSTALASI RAWAT JALAN', 'CI', 'S1', 1),
(23, '197901212005012013', 'Ester Suryani Tampubolon, S.Kep., Ners', 'RUANG KASUARI BAWAH', 'CI', 'S1', 1),
(24, '197303291999032002', 'Ettie Hikmawati, S.Kep., Ners', 'KLINIK GRHA ATMA', 'CI', 'S1', 1),
(25, '196812261996032001', 'Hj. Nenti Siti Kuraesin, S.Kep., Ners', 'RUANG NURI', 'CI', 'S1', 1),
(26, '197807042009022004', 'Hj. Icih Susanti, S.Kep.Ners', 'RUANG GELATIK', 'CI', 'S1', 1),
(27, '197612242000031004', 'H. Moch. Jimi Dirgantara, S.Kep.Ners', 'INSTALASI GAWAT DARURAT', 'CI', 'S1', 1),
(28, '197707041997031004', 'Yulforman Rotua Manalu, S.Kep., Ners', 'INSTALASI RAWAT JALAN', 'CI', 'S1', 1),
(29, '197902112006042015', 'Kokom Komalasari, S.Kep., Ners', 'RUANG PERKUTUT', 'CI', 'S1', 1),
(30, '196607151990032013', 'Komaryati, S.Kep., Ners', '-', 'CI', 'S1', 0),
(31, '198307172009022001', 'Neng Goniah, S.Kep., Ners', 'RUANG NURI', 'CI', 'S1', 1),
(32, '197608072005012005', 'Nenih Nuraenih, S.Kep., Ners', 'RUANG NURI', 'CI', 'S1', 1),
(33, '197011111996032003', 'Ni Luh Nyoman S Puspowati, S.Kep., Ners', 'RUANG MERPATI', 'CI', 'S1', 1),
(34, '197004221998032004', 'Nirna Julaeha, S.Kep., Ners', 'INSTALASI RAWAT JALAN', 'CI', 'S1', 1),
(35, '197911232005012017', 'Novita Sari, S.Kep., Ners', 'RUANG KASUARI ATAS', 'CI', 'S1', 1),
(36, '198010212005012011', 'Siti Romlah, S.Kep., Ners', 'RUANG MERAK', 'CI', 'S1', 1),
(37, '196908311998032005', 'Sri Kurniyati, S.Kep., Ners', '-', 'CI', 'S1', 0),
(38, '196805271992032004', 'Sri Yani, S.Kep., Ners', '-', 'CI', 'S1', 0),
(39, '198212302006042015', 'Tanti Heryani, S.Kep., Ners', 'RUANG MERPATI', 'CI', 'S1', 1),
(40, '198103082005012006', 'Winda Ratna Wulan, S.Kep. Ners., M.Kep.,Sp.Kep.J  ', '-', 'CI', 'S1', 0),
(41, '196707151987032002', 'Yusi Yustiah, AMK', 'INSTALASI REHABILITASI PSIKOSOSIAL', 'CI', 'D3', 1),
(42, '196712151990032007', 'Yuyun Yunara, S.Kep., Ners', 'RUANG GELATIK', 'CI', 'S1', 1),
(43, '197212271996031003', 'H. Zaenurohman, S.Kep.Ners', 'RUANG RAJAWALI', 'CI', 'S1', 1),
(44, '196608141991022004', 'dr. Hj. Elly Marliyani, Sp.KJ., M.K.M', '-', 'PSPD', '-', 1),
(45, '196805271998032004', 'dr. Lenny Irawati Yohosua, Sp.KJ.', '-', 'PSPD', '-', 1),
(46, '196607132007012005', 'dr. Hj. Meutia Laksaminingrum, Sp.KJ.', '-', 'PSPD', '-', 1),
(47, '198302142015031001', 'dr. Ade Kurnia Surawijawa, Sp.KJ.', '-', 'PSPD', '-', 1),
(48, '197507072005012006', 'dr. Lina Budiyanti, Sp.KJ. (K)', '-', 'PSPD', '-', 1),
(49, '197707272006042026', 'dr. Dhian Indriasari, Sp.KJ.', '-', 'PSPD', '-', 1),
(50, '197506082006041013', 'dr. Yunyun Setiawan, Sp.KJ.', '-', 'PSPD', '-', 1),
(51, '196208081990011001', 'dr. H. Riza Putra, Sp.KJ.', '-', 'PSPD', '-', 1),
(52, '201401065', 'dr. Hj. Lelly Resna N, Sp.KJ. (K)', '-', 'PSPD', '-', 1),
(53, '198601052020122005', 'dr. Hilda Puspa Indah, Sp.KJ.', '-', 'PSPD', '-', 1),
(54, '202101228', 'Hasrini Rowawi, dr., Sp.KJ (K)., MHA', '-', 'PPDS', '-', 1),
(55, '197507072005012006', 'Lina Budiyanti, dr. Sp.KJ (K)', '-', 'PPDS', '-', 1),
(56, '196805271998032004', 'Lenny Irawati Yohosua, dr. Sp.KJ.', '-', 'PPDS', '-', 1),
(57, '198302142015031001', 'Ade Kurnia Surawijaya, dr. Sp.KJ.', '-', 'PPDS', '-', 1),
(58, '197707272006042026', 'Dhian Indriasari, dr. Sp.KJ.', '-', 'PPDS', '-', 1),
(59, '198103252011012004', 'Ekaprasetyawati, S.Si, Apt', 'FARMASI', 'CIL', '-', 1),
(60, '196409251992031006', 'Drs. Tavip Budiawan, Apt', 'FARMASI', 'CIL', '-', 1),
(61, '198601082010012013', 'Ema Marlina, Amd. PK', 'REKAM MEDIK', 'CIL', '-', 1),
(62, '198102122005012013', 'Yeni Susanti, Amd. PK', 'REKAM MEDIK', 'CIL', '-', 1),
(63, '196508051995022002', 'Dra. Resmi Prasetyani, Psi', 'PSIKOLOGI', 'CIL', '-', 1),
(64, '197105071997032005', 'Dra. Lismaniar, Psi., M.Psi', 'PSIKOLOGI', 'CIL', '-', 1),
(65, '198805212011011003', 'Irfan Arief Sulistyawan, Amd', 'KESLING', 'CIL', '-', 1),
(66, '197308081999032005', 'Yuyum Rohmulyanawati, S.Sos, MPSSp', 'PEKSOS', 'CIL', '-', 1),
(67, '198010022006042015', 'Ani Kartini, ST', 'IT', 'CIL', '-', 1),
(68, '197902192011012001', 'Indah Kusuma Dewi, dr., SpKJ', '-', 'PSPD', '-', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_mou`
--

CREATE TABLE `tb_mou` (
  `id_mou` int(11) NOT NULL,
  `institute_mou` text NOT NULL,
  `start_date_mou` date NOT NULL,
  `end_date_mou` date NOT NULL,
  `no_rsj_mou` text NOT NULL,
  `no_institute_mou` text NOT NULL,
  `contact_mou` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_mou`
--

INSERT INTO `tb_mou` (`id_mou`, `institute_mou`, `start_date_mou`, `end_date_mou`, `no_rsj_mou`, `no_institute_mou`, `contact_mou`) VALUES
(1, 'AKADEMI PEREKEM MEDIS DAN INFORMATIKA KESEHATAN (APIKES) BANDUNG', '2016-01-05', '2019-01-04', '-', '-', ''),
(2, 'AKPER AL-MA\'ARIF BATURAJA', '2014-02-13', '2017-02-12', '- ', '-', ''),
(3, 'AKPER BHAKTI KENCANA BANDUNG', '2018-08-20', '2021-08-19', '119/14858/RSJ', '036/AKP/BK-A/VIII/2018', ''),
(4, 'AKPER BIDARA MUKTI GARUT', '2017-12-22', '2020-12-21', '119/19834/RSJ', '355/PKS/AKBM/XII/2017', '81323188828'),
(5, 'AKPER BUNTET PESANTREN CIREBON', '2019-06-19', '2022-06-18', '073/10582/RSJ', 'B. 167/AKPER BPC/VI/2019', '89671894075'),
(6, 'AKPER DUSTIRA CIMAHI', '2018-07-06', '2021-07-05', '119/11581/RSJ', 'PKS/008/AKPER RSD/VII/2018', '81322480192'),
(7, 'AKPER PEMERINTAH KABUPATEN CIANJUR', '2018-11-12', '2021-11-11', '119/20549A/RSJ', '420/526/AKPER/2018', '81806274395'),
(8, 'AKPER KEBONJATI', '2015-01-02', '2018-01-01', '-', 'YK/AKTI/PKS/01/01/2015', ''),
(9, 'AKPER LUWUK', '2019-02-06', '2022-02-05', '119/2418/RSJ', '032/AL.A/SKS.01/II/2019', '85240208533'),
(10, 'AKPER PEMBINA PALEMBANG', '2013-06-12', '2016-06-11', '-', '-', ''),
(11, 'AKPER PEMDA KOLAKA', '2014-07-17', '2017-07-16', '-', '-', ''),
(12, 'AKPER PEMKAB LAHAT', '2014-01-21', '2017-01-20', '-', '-', ''),
(13, 'AKPER RS. EFARINA PURWAKARTA', '2014-03-28', '2017-03-27', '-', '-', ''),
(14, 'AKPER SAIFUDDIN ZUHRI INDRAMAYU', '2018-09-12', '2021-09-11', '119/16344/RSJ', '007 KS/AKSARI/IX/2018', '82128682855'),
(15, 'AKPER SAWERIGADING PEMDA LUWU RAYA PALOPO', '2014-05-14', '2017-05-13', '-', '-', ''),
(16, 'AKPER SINTANG', '2011-06-13', '2014-06-12', '-', '-', ''),
(17, 'AKPER TOLITOLI', '2014-01-01', '2016-12-31', '-', '-', ''),
(18, 'AKPER YPDR JAKARTA', '2014-10-21', '2017-10-20', '-', '-', ''),
(19, 'FAKULTAS KEDOKTERAN MARANATHA', '2019-08-01', '2022-07-31', '119/12968/RSJ', '087/DIR/PKS-RSI/VIII/2019\nDan\n038/PKS/DN/FUKM/VIII/2019', '85871405088'),
(20, 'FAKULTAS KEDOKTERAN UKRIDA', '2019-05-29', '2022-05-28', '119/1458/RSJ', '551A/UKKW/FK/D/V/2019\nDan\n173/072-26/2019', '81291390704'),
(21, 'FAKULTAS KEDOKTERAN UNIVERSITAS ISLAM BANDUNG', '2019-09-17', '2022-09-16', '119/15675/RSJ', '445/1318/UHP-RS Ihsan\nDan\n108/Dek/FK/IX/2019', '8156234763'),
(22, 'FAKULTAS KEDOKTERAN UNIVERSITAS JENDERAL AHMAD YANI CIMAHI', '2015-10-29', '2018-10-28', '07313324/RSJ/2015', '005/KS-FK UNJANI/X/2015', ''),
(23, 'FAKULTAS KEDOKTERAN UNPAD', '2020-07-01', '2023-07-01', '119/10058/RSJ', 'HK.03.01/X.4.2.1/14120/2020\ndan 677/UN6.C/PKS/2020', '81394378880'),
(24, 'FAKULTAS KEPERAWATAN UNPAD', '2014-11-14', '2017-11-13', '-', '-', ''),
(25, 'FAKULTAS PSIKOLOGI UNJANI', '2014-03-10', '2017-03-09', '-', '-', ''),
(26, 'POLTEKKES KEMENKES BANDUNG KEPERAWATAN', '2018-11-19', '2021-11-18', '119/209634/RSJ', 'HK.05.01/1.6/5004/2018', '81291756190'),
(27, 'POLTEKKES TNI AU CIUMBULEUIT BANDUNG', '2020-01-08', '2023-01-07', '075/0409/RSJ/I/2020', '016/POLTEKKES/I/2020', '81327206706'),
(28, 'POLTEKKES BANTEN', '2012-06-04', '2015-06-04', '-', '-', ''),
(29, 'POLTEKKES KEMENKES MAKASSAR', '2014-12-12', '2017-12-11', '-', '-', '81343774889'),
(30, 'PROGRAM PASCA SARJANA UNIVERSITAS ISLAM BANDUNG', '2014-09-26', '2017-09-25', '-', '-', ''),
(31, 'STIKES AISYIYAH BANDUNG', '2019-04-08', '2022-04-07', '073/6519/RSJ', '808/MOU.02/STIKES-AB/IV/2019', '8112006840'),
(32, 'STIKES BANI SALEH', '2014-01-30', '2017-01-29', '-', '-', ''),
(33, 'STIKES BHAKTI PERTIWI LUWU RAYA PALOPO', '2012-09-07', '2015-09-07', '-', '-', ''),
(34, 'STIKES BINA PUTERA BANJAR', '2011-07-26', '2014-07-25', '-', '-', ''),
(35, 'STIKES BORNEO TARAKAN', '2012-05-03', '2015-05-03', '-', '-', ''),
(36, 'STIKES BUDILUHUR CIMAHI', '2018-07-03', '2021-07-02', '073/11261/RSJ', '505/D/BAHUK-STIKES/VII/2018', '85946739250'),
(37, 'STIKES CIREBON', '2020-11-02', '2023-11-02', '073/0090/RSJ', '672/B/STIKESCRB/I/2018', '81312197909'),
(38, 'STIKES DEHASEN BENGKULU', '2014-01-01', '2016-12-31', '-', '-', ''),
(39, 'STIKES DHARMA HUSADA BANDUNG', '2018-07-23', '2021-07-22', '119/12949/RSJ', '120/SDHB/PKS/TU/VII/2018', ''),
(40, 'STIKES FALETEHAN', '2018-07-13', '2021-07-12', '073/12321/RSJ', '810/STIKES-FA/MOU/VII/2018', '87773770545'),
(41, 'STIKES FORT DE KOCK', '2018-09-29', '2021-09-28', '119/17531/RSJ', '1138/K/STIKES.DK/IX/2018', ''),
(42, 'STIKES IMMANUEL BANDUNG', '2019-10-29', '2022-10-28', '073/18015/RSJ/X/2019', '270/STIKI/WK.III/X/2019', '85317286118'),
(43, 'STIKES JENDERAL AHMAD YANI', '2019-03-26', '2022-03-25', '075/4422/RSJ', 'PKS/018/STIKES/III/2019', '82115038484'),
(44, 'STIKES KARSA HUSADA GARUT', '2018-04-30', '2021-04-29', '-', '0324/STIKES-KHG-MOU-IV/2018', '8122334864'),
(45, 'STIKES KOTA SUKABUMI', '2020-12-01', '2023-12-01', '073/19852/RSJ/XII/2020', '67/HO.00.03/TU-STIKESMI/XII/2020', '85759469191'),
(46, 'STIKES KUNINGAN', '2019-04-15', '2022-04-14', '073/8115/RSJ', 'B.010/STIKKU/MoU/IV/2019', '82126591463'),
(47, 'STIKES MAHARDIKA CIREBON', '2011-03-21', '2014-03-20', '-', '-', '85293035718'),
(48, 'STIKES MEDIKA CIKARANG / IMDS', '2014-01-01', '2016-12-31', '-', '-', ''),
(49, 'STIKES MITRA KENCANA TASIKMALAYA', '2019-01-04', '2022-01-03', '075/0239/RSJ', '057/STIKES-MK/MOU/I/2019', ''),
(50, 'STIKES MUHAMADIYAH CIAMIS', '2019-12-14', '2022-12-13', '073/DIKLIT-5632/III/2016', '028/III.3,AU/B/2016', '82240964192'),
(51, 'STIKES NAN TONGGA LUBUK ALUNG', '2015-04-06', '2018-04-05', '073/1965/TSJ', 'DL.02.02.1965.04.2015', ''),
(52, 'STIKES PPNI JAWA BARAT', '2018-09-14', '2021-09-13', '119/16549/RSJ', 'III/884.1/STIKEP/PPNI/JBR/IX/2018', '85659095260'),
(53, 'STIKES RAJAWALI', '2020-06-26', '2023-06-26', '119/9816/RSJ', 'PKS.032/IKR-I/R/VI/2020', '8122173789'),
(54, 'STIKES SANTO BORROMEUS', '2020-12-15', '2023-12-15', '073/20903/RSJ', '017/STIKes-SB/SP-KS/XII/2020', '81320390854'),
(55, 'STIKES SEBELAS APRIL SUMEDANG', '2015-02-12', '2018-02-11', '073/0954/RSJ', '022/D-STIK/UN/II/2015', ''),
(56, 'STIKES SYEDZA SAINTIKA PADANG', '2014-01-01', '2016-12-31', '', '', ''),
(57, 'STIKES TANA TORAJA', '2015-01-26', '2018-01-25', '073/0428/RSJ', '?/STIKES-TT/I/2015', ''),
(58, 'STIKES YARSI BUKIT TINGGI', '2014-03-03', '2017-03-02', '', '', ''),
(59, 'STIKES YARSI PONTIANAK', '2016-05-02', '2019-05-02', '073/7945/RSJ/2016', '168/STIKES.YSI/V/2016', ''),
(60, 'STIKES YPIB MAJALENGKA', '2020-12-21', '2023-12-21', '119/21223/RSJ', 'A-46/MoU/LPPM-STIKesYPIB/XII/2020', '082125930277 - 081312409906'),
(61, 'UNIVERSITAS ADVENT INDONESIA BANDUNG', '2014-09-12', '2017-09-11', '-', '-', ''),
(62, 'UNIVERSITAS BALE BANDUNG', '2018-11-26', '2021-11-25', '119/20217A/RSJ', '06/FIKES/UNIBA/01/XI/2018', '87825585265'),
(63, 'UNIVERSITAS BSI BANDUNG', '2012-02-15', '2015-02-14', '-', '-', '82262353084'),
(64, 'UNIVERSITAS GALUH CIAMIS', '2018-09-12', '2021-09-11', '119/16531/RSJ', '13/4123/AK/KS/R/IX/2018', '85223230428'),
(65, 'UNIVERSITAS MUHAMMADIYAH SUKABUMI', '2019-02-20', '2022-02-19', '119/3413/RSJ', '128/I.0/F/2019', '85794199243'),
(66, 'UNIVERSITAS NEGERI GORONTALO', '2018-10-15', '2021-10-14', '119/1864/RSJ', '1767/UN47.B7.5.5/F/2018', ''),
(67, 'UNIVERSITAS PENDIDIKAN INDONESIA KAMPUS SUMEDANG', '2020-11-12', '2023-11-12', '445/18685/RSJ', '1621/UN40.C2/HK/2020', '81394322442'),
(68, 'UNIVERSITAS PENDIDIKAN INDONESIA KAMPUS SETIABUDI', '2019-01-21', '2022-01-20', '119/1332/RSJ', '0223/UN40.A6/DN/2019', '81220996363'),
(69, 'UNIVERSITAS RESPATI INDONESIA', '2014-09-04', '2017-09-03', '-', '-', ''),
(70, 'UNIVERSITAS SAMRATULANGI', '2014-01-01', '2016-12-31', '-', '-', '82348402239'),
(71, 'UNIVERSITAS SULTAN AGENG TIRTAYASA (UNTIRTA)', '2019-04-16', '2022-04-15', '119/6207/RSJ', 'T/5/UN43.2/HK.07.00/2019', '087771304963 - 087887807447'),
(72, 'POLITEKNIK TEDC BANDUNG', '2019-02-01', '2022-01-31', '073/4052/RSJ', '003.01/TEDC/MOU-DIR/II/2019', '81394589311'),
(73, 'UNIVERSITAS PELITA HARAPAN', '2019-03-28', '2022-03-27', '073/5921/RSJ', '002/FOM-UPH/PKS/III/2019', ''),
(74, 'POLTEKKES YAPKESBI SUKABUMI', '2019-02-04', '2022-02-03', '119/2307/RSJ', '0098/Q/P.Y.SMI/II/2019', '81220713094'),
(75, 'AKPER YPIB MAJALENGKA', '2018-11-09', '2021-11-08', '119/20494/RSJ', '168/AKPER/B-MOU/IX/2018', '85221806899'),
(76, 'UNIVERSITAS MUHAMMADIYAH TASIKMALAYA', '2019-03-11', '2022-03-10', '073/4623/RSJ', '700/FIKES-UMTAS/III/2019', ''),
(77, 'POLTEKKES KEMENKES BANDUNG FARMASI', '2018-07-04', '2021-07-03', '073/11279/RSJ', 'HK.05.01/1.6/2460/2018', ''),
(78, 'POLITEKNIK NEGERI SUBANG', '2019-07-10', '2022-07-09', '073/10034/RSJ', 'B/13/PL41/HL.04.03/2019', ''),
(79, 'MAGISTER PSIKOLOGI PROFESI UNISBA', '2014-01-01', '2016-12-31', '-', '-', ''),
(80, 'FAKULTAS FARMASI UNIVERSITAS JENDERAL AHMAD YANI', '2019-07-01', '2022-06-30', '073/11145/RSJ', 'PKS-  /Ffa-UNJANI/VIII/2019', ''),
(81, 'SEKOLAH TINGGI ILMU KESEHATAN INDONESIA MAJU', '2019-04-26', '2022-04-25', '070/7441/RSJ', '1932/MOU/K/Ka./STIKIM/VI/2019', '81931205715'),
(82, 'UNIVERSITAS BHAKTI KENCANA (UBK)', '2019-09-26', '2022-09-25', '073/16246/RSJ/IX/2019', '04/14/UBK/IX/2019', '82126665209'),
(83, 'POLTEKKES KEMENKES JAYAPURA', '2019-12-16', '2022-12-15', '073/21320/RSJ/XII/2019', 'HK.03.01/1.6/0012/2019', '85244246216'),
(84, 'POLITEKNIK NEGERI INDRAMAYU', '2020-07-30', '2023-07-30', '073/11662/RSJ', '888/PL42/KS/2020', '82130456607'),
(85, 'UNIVERSITAS KRISTEN SATYA WACANA SALATIGA (PSIKOLOGI)', '2020-11-18', '2023-11-18', '073/18973/RSJ', '247/PKS/UKSW/XI/2020', '82133017413'),
(86, 'FAKULTAS PSIKOLOGI MARANATHA', '2020-11-02', '2023-11-02', '073/16336/RSJ', '037/PKS/DN/FKUKMXI/2020', '87722602015');

-- --------------------------------------------------------

--
-- Table structure for table `tb_practice`
--

CREATE TABLE `tb_practice` (
  `id_practice` int(11) NOT NULL,
  `institute_practice` text NOT NULL,
  `name_practice` text NOT NULL,
  `start_practice` date NOT NULL,
  `end_practice` date NOT NULL,
  `email_practice` text NOT NULL,
  `telp_cp_practice` text NOT NULL,
  `name_cp_practice` text NOT NULL,
  `specialist_practice` text NOT NULL,
  `level_practice` text NOT NULL,
  `major_practice` text NOT NULL,
  `mentor_practice` text NOT NULL,
  `status_practice` enum('Y','N') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_practice`
--

INSERT INTO `tb_practice` (`id_practice`, `institute_practice`, `name_practice`, `start_practice`, `end_practice`, `email_practice`, `telp_cp_practice`, `name_cp_practice`, `specialist_practice`, `level_practice`, `major_practice`, `mentor_practice`, `status_practice`) VALUES
(1, 'STIKER MUHAMMADIAYAH', 'KELOMPOK 4 Tahun ajaran 2021', '2021-05-20', '2021-05-27', 'asdas', 'asd', 'asd', 'sd', 'asd', 'asd', 'asd', 'Y'),
(2, 'dxxx', '', '2021-04-29', '2021-05-03', 'qew', 'aqwesd', 'asqwed', 'sqwed', 'aqwesd', 'asqwed', 'asqwe', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `tb_specialist`
--

CREATE TABLE `tb_specialist` (
  `id_specialist` int(11) NOT NULL,
  `name_specialist` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_specialist`
--

INSERT INTO `tb_specialist` (`id_specialist`, `name_specialist`) VALUES
(1, ' Pendidikan Dokter Spesialis'),
(3, ' Praktik Belajar Lapangan'),
(4, 'Praktik Kerja Lapangan'),
(5, 'Profesi Farmasi'),
(8, 'Profesi Ners');

-- --------------------------------------------------------

--
-- Table structure for table `tb_unit`
--

CREATE TABLE `tb_unit` (
  `id_unit` int(11) NOT NULL,
  `name_unit` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_unit`
--

INSERT INTO `tb_unit` (`id_unit`, `name_unit`) VALUES
(1, '-'),
(2, 'Farmasi'),
(3, 'Instalasi Gawat Darurat'),
(4, 'Instalasi Rawat Jalan'),
(5, 'Instalasi Rehabilitasi Psikososial'),
(6, 'IT'),
(7, 'Kesling'),
(8, 'Klinik Graha Atma'),
(9, 'Peksos'),
(10, 'Psikologi'),
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
(23, 'Ruang Rajawali');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` varchar(5) NOT NULL,
  `username_user` varchar(18) NOT NULL,
  `password_user` varchar(18) NOT NULL,
  `name_user` varchar(20) NOT NULL,
  `email_user` text NOT NULL,
  `level_user` int(11) NOT NULL,
  `last_login_user` date NOT NULL,
  `create_user` date NOT NULL,
  `status_user` enum('Y','N') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `username_user`, `password_user`, `name_user`, `email_user`, `level_user`, `last_login_user`, `create_user`, `status_user`) VALUES
('U2101', 'fajar', '1234', 'Fajar Rachmat H.', 'fajar.rachmat.h@gmail.com', 1, '0000-00-00', '2021-03-29', 'Y'),
('U2102', 'adi_h', '1234', 'Adi Hardiansyah', '-', 1, '0000-00-00', '2021-09-02', 'Y');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_accreditation`
--
ALTER TABLE `tb_accreditation`
  ADD PRIMARY KEY (`id_accreditation`);

--
-- Indexes for table `tb_institute`
--
ALTER TABLE `tb_institute`
  ADD PRIMARY KEY (`id_institute`);

--
-- Indexes for table `tb_level`
--
ALTER TABLE `tb_level`
  ADD PRIMARY KEY (`id_level`);

--
-- Indexes for table `tb_major`
--
ALTER TABLE `tb_major`
  ADD PRIMARY KEY (`id_major`);

--
-- Indexes for table `tb_mentor_edu`
--
ALTER TABLE `tb_mentor_edu`
  ADD PRIMARY KEY (`id_mentor_edu`);

--
-- Indexes for table `tb_mentor_kind`
--
ALTER TABLE `tb_mentor_kind`
  ADD PRIMARY KEY (`id_mentor_kind`);

--
-- Indexes for table `tb_mentor_rsj`
--
ALTER TABLE `tb_mentor_rsj`
  ADD PRIMARY KEY (`id_mentor_rsj`);

--
-- Indexes for table `tb_mou`
--
ALTER TABLE `tb_mou`
  ADD PRIMARY KEY (`id_mou`);

--
-- Indexes for table `tb_practice`
--
ALTER TABLE `tb_practice`
  ADD PRIMARY KEY (`id_practice`);

--
-- Indexes for table `tb_specialist`
--
ALTER TABLE `tb_specialist`
  ADD PRIMARY KEY (`id_specialist`);

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
-- AUTO_INCREMENT for table `tb_accreditation`
--
ALTER TABLE `tb_accreditation`
  MODIFY `id_accreditation` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_level`
--
ALTER TABLE `tb_level`
  MODIFY `id_level` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tb_major`
--
ALTER TABLE `tb_major`
  MODIFY `id_major` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tb_mou`
--
ALTER TABLE `tb_mou`
  MODIFY `id_mou` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT for table `tb_practice`
--
ALTER TABLE `tb_practice`
  MODIFY `id_practice` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_specialist`
--
ALTER TABLE `tb_specialist`
  MODIFY `id_specialist` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
