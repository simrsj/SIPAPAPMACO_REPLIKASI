-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 11, 2021 at 09:36 AM
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
-- Table structure for table `tb_harga`
--

CREATE TABLE `tb_harga` (
  `id_harga` int(11) NOT NULL,
  `nama_harga` text NOT NULL,
  `jenis_harga` text NOT NULL,
  `ket_harga` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
-- Table structure for table `tb_mess`
--

CREATE TABLE `tb_mess` (
  `id_mess` int(11) NOT NULL,
  `nama_mess` text NOT NULL,
  `jml_lk_mess` int(11) NOT NULL,
  `jml_pr_mess` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `jurusan_mou` text NOT NULL,
  `spek_pendidikan_mou` text NOT NULL,
  `jenjang_pendidikan_mou` text NOT NULL,
  `akreditasi_mou` text NOT NULL,
  `ket_mou` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_mou`
--

INSERT INTO `tb_mou` (`id_mou`, `institute_mou`, `start_date_mou`, `end_date_mou`, `no_rsj_mou`, `no_institute_mou`, `jurusan_mou`, `spek_pendidikan_mou`, `jenjang_pendidikan_mou`, `akreditasi_mou`, `ket_mou`) VALUES
(4, 'AKPER BIDARA MUKTI GARUT', '2017-12-22', '2020-12-21', '119/19834/RSJ', '355/PKS/AKBM/XII/2017', '', '', '', '', ''),
(5, 'AKPER BUNTET PESANTREN CIREBON', '2019-06-19', '2022-06-18', '073/10582/RSJ', 'B. 167/AKPER BPC/VI/2019', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_practice`
--

CREATE TABLE `tb_practice` (
  `id_practice` int(11) NOT NULL,
  `id_mou` int(11) NOT NULL,
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

INSERT INTO `tb_practice` (`id_practice`, `id_mou`, `institute_practice`, `name_practice`, `start_practice`, `end_practice`, `email_practice`, `telp_cp_practice`, `name_cp_practice`, `specialist_practice`, `level_practice`, `major_practice`, `mentor_practice`, `status_practice`) VALUES
(3, 4, 'UNIKOM', 'Kelompok 1', '2021-11-12', '2021-11-18', 'asdasd@gmail.com', '098989079323', 'fajar', 'Kedokteran', '2', 'Keperawatan', '-', 'Y');

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
  `id_user` int(11) NOT NULL,
  `username_user` text NOT NULL,
  `password_user` varchar(18) NOT NULL,
  `name_user` varchar(20) NOT NULL,
  `email_user` text NOT NULL,
  `level_user` int(11) NOT NULL,
  `last_login_user` date NOT NULL,
  `create_user` date NOT NULL,
  `id_mou` int(11) NOT NULL,
  `status_user` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `username_user`, `password_user`, `name_user`, `email_user`, `level_user`, `last_login_user`, `create_user`, `id_mou`, `status_user`) VALUES
(1, 'fajar', '1234', 'Fajar Rachmat H.', 'fajar.rachmat.h@gmail.com', 1, '0000-00-00', '2021-03-29', 0, 'Y'),
(2, 'adi_h', '1234', 'Adi Hardiansyah', '-', 1, '0000-00-00', '2021-09-02', 0, 'Y'),
(7, 'fajar.rachmat.h@gmail.com', '1234', 'Fajar Rachmat Herman', 'fajar.rachmat.h@gmail.com', 2, '0000-00-00', '2021-11-09', 73, 'N'),
(8, 'fajar.rachmat.h@gmail.com', '1234', 'fajar', 'fajar.rachmat.h@gmail.com', 2, '0000-00-00', '2021-11-11', 6, 'Y'),
(9, 'fajar.rachmat.h@gmail.com', 'simrs', 'Fajar', 'fajar.rachmat.h@gmail.com', 2, '0000-00-00', '2021-11-11', 92, 'Y');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_accreditation`
--
ALTER TABLE `tb_accreditation`
  ADD PRIMARY KEY (`id_accreditation`);

--
-- Indexes for table `tb_harga`
--
ALTER TABLE `tb_harga`
  ADD PRIMARY KEY (`id_harga`);

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
-- Indexes for table `tb_mess`
--
ALTER TABLE `tb_mess`
  ADD PRIMARY KEY (`id_mess`);

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
-- AUTO_INCREMENT for table `tb_harga`
--
ALTER TABLE `tb_harga`
  MODIFY `id_harga` int(11) NOT NULL AUTO_INCREMENT;

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
-- AUTO_INCREMENT for table `tb_mess`
--
ALTER TABLE `tb_mess`
  MODIFY `id_mess` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_mou`
--
ALTER TABLE `tb_mou`
  MODIFY `id_mou` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- AUTO_INCREMENT for table `tb_practice`
--
ALTER TABLE `tb_practice`
  MODIFY `id_practice` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_specialist`
--
ALTER TABLE `tb_specialist`
  MODIFY `id_specialist` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
