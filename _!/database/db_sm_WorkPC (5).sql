-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 24 Feb 2022 pada 08.01
-- Versi server: 10.4.14-MariaDB
-- Versi PHP: 7.2.34

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
-- Struktur dari tabel `tb_akreditasi`
--

CREATE TABLE `tb_akreditasi` (
  `id_akreditasi` int(11) NOT NULL,
  `nama_akreditasi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_akreditasi`
--

INSERT INTO `tb_akreditasi` (`id_akreditasi`, `nama_akreditasi`) VALUES
(0, '-- Lainnya --'),
(1, 'A'),
(2, 'B'),
(3, 'C');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_bayar`
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
-- Dumping data untuk tabel `tb_bayar`
--

INSERT INTO `tb_bayar` (`id_bayar`, `id_mou`, `id_praktik`, `kode_bayar`, `atas_nama_bayar`, `noRek_bayar`, `melalui_bayar`, `tgl_bayar`, `tgl_input_bayar`, `file_bayar`) VALUES
(1, NULL, 1, 'B1220223', 'Fajar Rachmat Hermansyah', '019273901273', 'Bank BJB', '2022-02-20', '2022-02-24', './_file/bayar/bayar_1_1-2022-02-24.pdf');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_institusi`
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
-- Dumping data untuk tabel `tb_institusi`
--

INSERT INTO `tb_institusi` (`id_institusi`, `nama_institusi`, `akronim_institusi`, `logo_institusi`, `alamat_institusi`, `ket_institusi`) VALUES
(1, 'AKADEMI PEREKEM MEDIS DAN INFORMATIKA KESEHATAN (APIKES) BANDUNG', '', '', '', ''),
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
(19, 'FAKULTAS KEDOKTERAN MARANATHA', '', '', '', ''),
(20, 'FAKULTAS KEDOKTERAN UKRIDA', 'FK UKRIDA', './_img/logo_institusi/20.png', '', ''),
(21, 'FAKULTAS KEDOKTERAN UNIVERSITAS ISLAM BANDUNG', 'FK. UNISBA', './_img/logo_institusi/21.png', '', ''),
(22, 'FAKULTAS KEDOKTERAN UNIVERSITAS JENDERAL AHMAD YANI CIMAHI', '', '', '', ''),
(23, 'FAKULTAS KEDOKTERAN UNPAD', 'FK. UNPAD', './_img/logo_institusi/23.png', '', ''),
(24, 'FAKULTAS KEPERAWATAN UNPAD', '', '', '', ''),
(25, 'FAKULTAS PSIKOLOGI UNJANI', '', '', '', ''),
(26, 'POLTEKKES KEMENKES BANDUNG KEPERAWATAN', '', '', '', ''),
(27, 'POLTEKKES TNI AU CIUMBULEUIT BANDUNG', '', '', '', ''),
(28, 'POLTEKKES BANTEN', '', '', '', ''),
(29, 'POLTEKKES KEMENKES MAKASSAR', '', '', '', ''),
(30, 'PROGRAM PASCA SARJANA UNIVERSITAS ISLAM BANDUNG', '', '', '', ''),
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
(61, 'UNIVERSITAS ADVENT INDONESIA BANDUNG', '', '', '', ''),
(62, 'UNIVERSITAS BALE BANDUNG', '', '', '', ''),
(63, 'UNIVERSITAS BSI BANDUNG', '', '', '', ''),
(64, 'UNIVERSITAS GALUH CIAMIS', '', '', '', ''),
(65, 'UNIVERSITAS MUHAMMADIYAH SUKABUMI', '', '', '', ''),
(66, 'UNIVERSITAS NEGERI GORONTALO', '', '', '', ''),
(67, 'UNIVERSITAS PENDIDIKAN INDONESIA KAMPUS SUMEDANG', '', '', '', ''),
(68, 'UNIVERSITAS PENDIDIKAN INDONESIA KAMPUS SETIABUDI', 'UPI STB', './_img/logo_institusi/68.png', '', ''),
(69, 'UNIVERSITAS RESPATI INDONESIA', '', '', '', ''),
(70, 'UNIVERSITAS SAMRATULANGI', '', '', '', ''),
(71, 'UNIVERSITAS SULTAN AGENG TIRTAYASA (UNTIRTA)', '', '', '', ''),
(72, 'POLITEKNIK TEDC BANDUNG', '', '', '', ''),
(73, 'UNIVERSITAS PELITA HARAPAN', '', '', '', ''),
(74, 'POLTEKKES YAPKESBI SUKABUMI', '', '', '', ''),
(75, 'AKPER YPIB MAJALENGKA', '', '', '', ''),
(76, 'UNIVERSITAS MUHAMMADIYAH TASIKMALAYA', '', '', '', ''),
(77, 'POLTEKKES KEMENKES BANDUNG FARMASI', '', '', '', ''),
(78, 'POLITEKNIK NEGERI SUBANG', 'POLSUB', './_img/logo_institusi/78.png', '', ''),
(79, 'MAGISTER PSIKOLOGI PROFESI UNISBA', '', '', '', ''),
(80, 'FAKULTAS FARMASI UNIVERSITAS JENDERAL AHMAD YANI', 'F. Far. UNJANI', './_img/logo_institusi/80.png', '', ''),
(81, 'SEKOLAH TINGGI ILMU KESEHATAN INDONESIA MAJU', '', '', '', ''),
(82, 'UNIVERSITAS BHAKTI KENCANA (UBK)', 'UNV BHAKTI', './_img/logo_institusi/82.png', '', ''),
(83, 'POLTEKKES KEMENKES JAYAPURA', '', '', '', ''),
(84, 'POLITEKNIK NEGERI INDRAMAYU', '', '', '', ''),
(85, 'UNIVERSITAS KRISTEN SATYA WACANA SALATIGA (PSIKOLOGI)', '', '', '', ''),
(86, 'FAKULTAS PSIKOLOGI MARANATHA', 'F. Psi. MARANATHA', '', '', ''),
(87, 'RS JIWA PROVINSI JAWA BARAT', 'RS JIWA*', './_img/logo_institusi/87.png', '', ''),
(88, 'UNIVERSITAS KOMPUTER INDONESIA', 'UNIKOM', './_img/logo_institusi/0.png', '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_jenis_mentor`
--

CREATE TABLE `tb_jenis_mentor` (
  `id_jenis_mentor` int(11) NOT NULL,
  `nama_jenis_mentor` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_jenis_mentor`
--

INSERT INTO `tb_jenis_mentor` (`id_jenis_mentor`, `nama_jenis_mentor`) VALUES
(1, 'CI'),
(2, 'CIL'),
(3, 'PPDS'),
(4, 'PSPD');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_jenjang_pdd`
--

CREATE TABLE `tb_jenjang_pdd` (
  `id_jenjang_pdd` int(11) NOT NULL,
  `nama_jenjang_pdd` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_jenjang_pdd`
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
(10, 'Profesi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_jurusan_pdd`
--

CREATE TABLE `tb_jurusan_pdd` (
  `id_jurusan_pdd` int(11) NOT NULL,
  `nama_jurusan_pdd` text NOT NULL,
  `id_jurusan_pdd_jenis` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_jurusan_pdd`
--

INSERT INTO `tb_jurusan_pdd` (`id_jurusan_pdd`, `nama_jurusan_pdd`, `id_jurusan_pdd_jenis`) VALUES
(1, 'Kedokteran', 1),
(2, 'Keperawatan', 2),
(3, 'Psikologi', 3),
(4, 'IT', 4);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_jurusan_pdd_jenis`
--

CREATE TABLE `tb_jurusan_pdd_jenis` (
  `id_jurusan_pdd_jenis` int(11) NOT NULL,
  `nama_jurusan_pdd_jenis` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_jurusan_pdd_jenis`
--

INSERT INTO `tb_jurusan_pdd_jenis` (`id_jurusan_pdd_jenis`, `nama_jurusan_pdd_jenis`) VALUES
(0, '-- Lainnya --'),
(1, 'Kedokteran'),
(2, 'Keperawatan'),
(3, 'Nakes Lainnya'),
(4, 'Non Nakes');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_lapor`
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
-- Dumping data untuk tabel `tb_lapor`
--

INSERT INTO `tb_lapor` (`id_lapor`, `judul_lapor`, `deskripsi_lapor`, `level_lapor`, `tgl_lapor`, `status_lapor`, `nama_lapor`, `link_lapor`, `file_lapor`) VALUES
(1, 'Data Institusi', 'Data Institusi berbeda saat pendaftaran', 'tinggi', '2022-01-02', 'PROSES', 'Ade Ihsan', '192.168.7.89/sm/?prk', './_file/lapor/lapor_1_2022-01-03.png'),
(3, 'Data tarif', 'Data tarif Tidak Sesuai jurusan', 'sedang', '2022-01-03', 'CEK', 'Rani Riffani', '192.168.7.88/sm/?trk&dtl=1', './_file/lapor/lapor_3_2022-01-03.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_mentor`
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
-- Dumping data untuk tabel `tb_mentor`
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
-- Struktur dari tabel `tb_mentor_jenis`
--

CREATE TABLE `tb_mentor_jenis` (
  `id_mentor_jenis` int(11) NOT NULL,
  `nama_mentor_jenis` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_mentor_jenis`
--

INSERT INTO `tb_mentor_jenis` (`id_mentor_jenis`, `nama_mentor_jenis`) VALUES
(1, 'CI'),
(2, 'CIL'),
(3, 'PSPD'),
(4, 'PPDS'),
(1, 'CI'),
(2, 'CIL'),
(3, 'PSPD'),
(4, 'PPDS'),
(1, 'CI'),
(2, 'CIL'),
(3, 'PSPD'),
(4, 'PPDS');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_mess`
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
  `id_tarif_satuan` int(11) NOT NULL,
  `id_tarif_jenis` int(11) NOT NULL,
  `ket_mess` text DEFAULT NULL,
  `status_mess` enum('y','t') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_mess`
--

INSERT INTO `tb_mess` (`id_mess`, `nama_mess`, `kapasitas_t_mess`, `alamat_mess`, `nama_pemilik_mess`, `no_pemilik_mess`, `email_pemilik_mess`, `tarif_tanpa_makan_mess`, `tarif_dengan_makan_mess`, `id_tarif_satuan`, `id_tarif_jenis`, `ket_mess`, `status_mess`) VALUES
(1, 'Mess RSJ 1 Lama', 20, 'Jl. Kolonel Maturi KM.7, Desa Jambudipa, Kec. Cisarua, Kab. Bandung Barat, 40551', 'RS Jiwa Provinsi Jawa Barat', '081321329101', '', 20000, 100000, 4, 8, 'Makan 3x Sehari', 'y'),
(2, 'Mess RSJ 2 Baru', 92, 'Jl. Kolonel Maturi KM.7, Desa Jambudipa, Kec. Cisarua, Kab. Bandung Barat, 40551', 'RS Jiwa Provinsi Jawa Barat', '081321329101', '', 20000, 100000, 4, 8, '', 'y'),
(3, 'Asrama Rifa Corporate', 100, 'Kp. Panyandaan RT. 01 RW. 14 Desa Jambudipa Kecamatan Cisarua Kab. Bandung Barat', 'Ibu Ai', '081322629909', '', 20000, 80000, 4, 8, 'Dengan Makan 3x Sehari', 'y'),
(4, 'Pondokan H. Ating', 100, 'Kp. Barukai Timur RT. 04 RW. 13 Desa Jambudipa Kecamatan Cisarua Kab. Bandung Barat', 'H. Ating / Hj. Siti Sutiah', '0', '', 20000, 80000, 4, 8, '', 'y'),
(5, 'Wisma Anugrah Ibu Nanik', 70, 'Kp. Panyandaan RT. 01 RW. 14 Desa Jambudipa Kecamatan Cisarua Kab. Bandung Barat', 'Hj. Nanik Susiani', '081320719652', '', 15000, 70000, 4, 8, '', 'y'),
(6, 'Pondokan dr. Hj. Meutia Laksminingrum', 0, '-', 'dr. Hj. Meutia Laksminingrum', '0', '', 0, 0, 4, 8, '', 't'),
(7, 'Galuh Pakuan', 70, 'Kp. Panyandaan RT. 01 RW. 14 Desa Jambudipa Kecamatan Cisarua Kab. Bandung Barat', 'Oyo Suharya', '081320113399', '', 20000, 80000, 4, 8, '', 'y'),
(8, 'Pondokan Tatang', 30, 'Kp. Panyandaan RT. 01 RW. 14 Desa Jambudipa Kecamatan Cisarua Kab. Bandung Barat', 'Tatang', '089531804825', '', 20000, 80000, 4, 8, '', 'y');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_mess_detail`
--

CREATE TABLE `tb_mess_detail` (
  `id_mess_detail` int(11) NOT NULL,
  `id_mess` int(11) NOT NULL,
  `tarif_mess_detail` int(11) DEFAULT NULL,
  `ket_mess_detail` text DEFAULT NULL,
  `jumlah_mess_detail` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_mess_detail`
--

INSERT INTO `tb_mess_detail` (`id_mess_detail`, `id_mess`, `tarif_mess_detail`, `ket_mess_detail`, `jumlah_mess_detail`) VALUES
(1, 1, 20000, 'Tanpa Makan', 0),
(3, 1, 100000, 'Makan 3x Sehari', 0),
(4, 2, 20000, 'Tanpa Makan', 0),
(5, 2, 100000, 'Makan 3x Sehari', 0),
(6, 3, 20000, 'Tanpa Makan', 0),
(8, 3, 20000, 'Tanpa Makan', 0),
(9, 5, 15000, 'Tanpa Makan', 0),
(10, 5, 70000, 'Makan 3x Sehari', 0),
(11, 8, 20000, 'Tanpa Makan', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_mess_pilih`
--

CREATE TABLE `tb_mess_pilih` (
  `id_mess_pilih` int(11) NOT NULL,
  `id_praktik` int(11) NOT NULL,
  `id_mess` int(11) NOT NULL,
  `tgl_input_mess_pilih` date DEFAULT NULL,
  `makan_mess_pilih` enum('y','t') NOT NULL,
  `jumlah_hari_mess_pilih` int(11) NOT NULL,
  `total_tarif_mess_pilih` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_mou`
--

CREATE TABLE `tb_mou` (
  `id_mou` int(11) NOT NULL,
  `id_institusi` text NOT NULL,
  `tgl_mulai_mou` date DEFAULT NULL,
  `tgl_selesai_mou` date DEFAULT NULL,
  `no_rsj_mou` text NOT NULL,
  `no_institusi_mou` text NOT NULL,
  `id_jurusan_pdd` int(11) DEFAULT NULL,
  `id_spesifikasi_pdd` int(11) DEFAULT NULL,
  `id_jenjang_pdd` int(11) DEFAULT NULL,
  `id_akreditasi` int(11) DEFAULT NULL,
  `file_mou` text DEFAULT NULL,
  `ket_mou` enum('belum pengajuan','proses pengajuan baru','proses pengajuan perpanjang','aktif') DEFAULT NULL,
  `status_mou` enum('Y','T') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_mou`
--

INSERT INTO `tb_mou` (`id_mou`, `id_institusi`, `tgl_mulai_mou`, `tgl_selesai_mou`, `no_rsj_mou`, `no_institusi_mou`, `id_jurusan_pdd`, `id_spesifikasi_pdd`, `id_jenjang_pdd`, `id_akreditasi`, `file_mou`, `ket_mou`, `status_mou`) VALUES
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
-- Struktur dari tabel `tb_nilai`
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
-- Struktur dari tabel `tb_nilai_dokter`
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
-- Struktur dari tabel `tb_praktik`
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
  `id_jurusan_pdd_jenis` int(11) NOT NULL,
  `id_jurusan_pdd` text DEFAULT NULL,
  `id_jenjang_pdd` text DEFAULT NULL,
  `id_spesifikasi_pdd` text DEFAULT NULL,
  `id_akreditasi` text NOT NULL,
  `id_user` text NOT NULL,
  `nama_koordinator_praktik` text NOT NULL,
  `email_koordinator_praktik` text NOT NULL,
  `telp_koordinator_praktik` text NOT NULL,
  `status_cek_praktik` text NOT NULL,
  `status_praktik` enum('D','W','Y','A') NOT NULL,
  `ket_tolak_praktik` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_praktik`
--

INSERT INTO `tb_praktik` (`id_praktik`, `id_mou`, `id_institusi`, `id_mentor`, `id_unit`, `nama_praktik`, `tgl_input_praktik`, `tgl_ubah_praktik`, `tgl_mulai_praktik`, `tgl_selesai_praktik`, `jumlah_praktik`, `surat_praktik`, `data_praktik`, `id_jurusan_pdd_jenis`, `id_jurusan_pdd`, `id_jenjang_pdd`, `id_spesifikasi_pdd`, `id_akreditasi`, `id_user`, `nama_koordinator_praktik`, `email_koordinator_praktik`, `telp_koordinator_praktik`, `status_cek_praktik`, `status_praktik`, `ket_tolak_praktik`) VALUES
(1, 0, 85, NULL, NULL, 'Velit porro suscipit', '2022-02-23', NULL, '2014-12-08', '2323-04-08', 46, './_file/praktik/surat_1_2022-02-23.pdf', './_file/praktik/data_praktikan_1_2022-02-23.xlsx', 2, '2', '8', '15', '2', '1', 'Ipsam ipsa sit sed', 'kenypeb@mailinator.com', '95', 'BYR', 'D', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_praktikan`
--

CREATE TABLE `tb_praktikan` (
  `id_praktikan` int(11) NOT NULL,
  `id_praktik` int(11) NOT NULL,
  `status_praktikan` text NOT NULL,
  `status_pemb_temp_praktikan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_praktikan_detail`
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
-- Struktur dari tabel `tb_spesifikasi_pdd`
--

CREATE TABLE `tb_spesifikasi_pdd` (
  `id_spesifikasi_pdd` int(11) NOT NULL,
  `nama_spesifikasi_pdd` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_spesifikasi_pdd`
--

INSERT INTO `tb_spesifikasi_pdd` (`id_spesifikasi_pdd`, `nama_spesifikasi_pdd`) VALUES
(0, '-- Lainnya --'),
(1, 'Program Pendidikan Dokter Spesialis (PPDS)'),
(2, 'Profesi Ners'),
(15, 'Program Studi Pendidikan Dokter (PSPD) / Co-ass');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_tarif`
--

CREATE TABLE `tb_tarif` (
  `id_tarif` int(11) NOT NULL,
  `nama_tarif` text NOT NULL,
  `id_tarif_satuan` int(11) NOT NULL,
  `ket_tarif` int(11) DEFAULT NULL,
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
-- Dumping data untuk tabel `tb_tarif`
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
(12, 'RPS (Resource Person Session)', 2, NULL, 37500, 'SEKALI', 0, 0, 1, 0, 0, 4, 1, NULL, 'y'),
(13, 'Bed side teaching (BST)- Visite Besar-Role Model - Pembimbingan Kedokteran Umum di IGD', 2, NULL, 37500, 'SEKALI', 0, 0, 1, 0, 0, 4, 1, NULL, 'y'),
(14, 'Mini Clinical Examination  Evaluation (Mini CeX)', 2, NULL, 150000, 'SEKALI', 0, 0, 1, 0, 0, 6, 1, NULL, 'y'),
(15, 'Ujian', 2, NULL, 150000, 'SEKALI', 0, 0, 1, 0, 0, 6, 1, NULL, 'y'),
(16, 'Makan Pembimbing Ujian', 2, NULL, 20000, 'SEKALI', 0, 0, 1, 0, 0, 6, 1, NULL, 'y'),
(17, 'Standar Pasien', 2, NULL, 100000, 'SEKALI', 0, 0, 1, 0, 0, 6, 1, NULL, 'y'),
(18, 'Institusional Fee', 1, NULL, 50000, 'SEKALI', 0, 0, 2, 0, 0, 1, 1, NULL, 'y'),
(19, 'Management Fee', 1, NULL, 75000, 'SEKALI', 0, 0, 2, 0, 0, 1, 1, NULL, 'y'),
(20, 'Untuk Keselamatan Kerja (Handrub, tisue, sabun)', 1, NULL, 20000, 'SEKALI', 0, 0, 2, 0, 0, 2, 1, NULL, 'y'),
(21, 'Orientasi ', 3, NULL, 75000, 'SEKALI', 1, 1, 2, 0, 0, 3, 1, NULL, 'y'),
(22, 'Keselamatan Pasien', 3, NULL, 150000, 'SEKALI', 0, 0, 2, 0, 0, 3, 1, NULL, 'y'),
(23, 'Log Book (dibayar 1 kali)', 1, NULL, 20000, 'SEKALI', 0, 0, 2, 0, 0, 3, 1, NULL, 'y'),
(24, 'Name Tag (dibayar 1 kali)', 1, NULL, 10000, 'SEKALI', 0, 0, 2, 0, 0, 3, 1, NULL, 'y'),
(25, 'RPS (Resource Person Session)', 3, NULL, 150000, 'SEKALI', 0, 0, 2, 0, 0, 4, 1, NULL, 'y'),
(26, 'Materi (TAK, Komunikasi Terapeutik, Dokumentasi Keperawatanan) ', 3, NULL, 150000, '-- LAINNYA --', 3, 1, 2, 0, 0, 4, 1, NULL, 'y'),
(27, 'Ujian', 4, NULL, 150000, 'SEKALI', 0, 0, 2, 0, 0, 6, 1, NULL, 'y'),
(28, 'Makan dan Snack Penguji', 5, NULL, 20000, 'SEKALI', 0, 0, 2, 0, 0, 6, 1, NULL, 'y'),
(29, 'Bahan Habis Pakai Ujian', 2, NULL, 100000, 'SEKALI', 0, 0, 2, 0, 0, 6, 1, NULL, 'y'),
(30, 'Institusional Fee Ujian', 6, NULL, 150000, 'SEKALI', 0, 0, 2, 0, 0, 6, 1, NULL, 'y'),
(31, 'Management Fee Ujian', 6, NULL, 20000, 'SEKALI', 0, 0, 2, 0, 0, 6, 1, NULL, 'y'),
(32, 'Bed side teaching (BST)', 13, NULL, 50000, 'MINGGUAN', 0, 0, 2, 6, 0, 4, 2, NULL, 'y'),
(33, 'Bed side teaching (BST)', 13, NULL, 75000, 'MINGGUAN', 0, 0, 2, 7, 0, 4, 2, NULL, 'y'),
(34, 'Bed side teaching (BST)', 13, NULL, 75000, 'MINGGUAN', 0, 0, 2, 8, 0, 4, 2, NULL, 'y'),
(35, 'Bed side teaching (BST)', 13, NULL, 75000, 'MINGGUAN', 0, 0, 2, 10, 0, 4, 2, NULL, 'y'),
(36, 'Institusional Fee', 1, NULL, 50000, 'SEKALI', 0, 0, 3, 0, 0, 1, 1, NULL, 'y'),
(37, 'Management Fee', 1, NULL, 75000, 'SEKALI', 0, 0, 3, 0, 0, 1, 1, NULL, 'y'),
(38, 'Untuk Keselamatan Kerja (Handrub, tisue, sabun)', 1, NULL, 20000, 'SEKALI', 0, 0, 3, 0, 0, 2, 1, NULL, 'y'),
(39, 'Orientasi ', 3, NULL, 75000, 'SEKALI', 1, 1, 3, 0, 0, 3, 1, NULL, 'y'),
(40, 'Keselamatan Pasien', 3, NULL, 150000, 'SEKALI', 0, 0, 3, 0, 0, 3, 1, NULL, 'y'),
(41, 'Log Book (dibayar 1 kali)', 1, NULL, 20000, 'SEKALI', 0, 0, 3, 0, 0, 3, 1, NULL, 'y'),
(42, 'Name Tag (dibayar 1 kali)', 1, NULL, 10000, 'SEKALI', 0, 0, 3, 0, 0, 3, 1, NULL, 'y'),
(43, 'RPS (Resource Person Session)', 3, NULL, 150000, 'SEKALI', 0, 0, 3, 0, 0, 4, 1, NULL, 'y'),
(45, 'Ujian', 4, NULL, 150000, 'SEKALI', 0, 0, 3, 0, 0, 6, 1, NULL, 'y'),
(46, 'Makan dan Snack Penguji', 5, NULL, 20000, 'SEKALI', 0, 0, 3, 0, 0, 6, 1, NULL, 'y'),
(47, 'Bahan Habis Pakai Ujian', 2, NULL, 100000, 'SEKALI', 0, 0, 3, 0, 0, 6, 1, NULL, 'y'),
(48, 'Institusional Fee Ujian', 6, NULL, 150000, 'SEKALI', 0, 0, 3, 0, 0, 6, 1, NULL, 'y'),
(49, 'Management Fee Ujian', 6, NULL, 20000, 'SEKALI', 0, 0, 3, 0, 0, 6, 1, NULL, 'y'),
(50, 'Bed side teaching (BST)', 13, NULL, 50000, 'MINGGUAN', 0, 0, 3, 6, 0, 4, 2, NULL, 'y'),
(51, 'Bed side teaching (BST)', 13, NULL, 75000, 'MINGGUAN', 0, 0, 3, 7, 0, 4, 2, NULL, 'y'),
(52, 'Bed side teaching (BST)', 13, NULL, 75000, 'MINGGUAN', 0, 0, 3, 8, 0, 4, 2, NULL, 'y'),
(53, 'Bed side teaching (BST)', 13, NULL, 75000, 'MINGGUAN', 0, 0, 3, 10, 0, 4, 2, NULL, 'y'),
(54, 'Institusional Fee', 1, NULL, 50000, 'SEKALI', 0, 0, 4, 0, 0, 1, 1, NULL, 'y'),
(55, 'Management Fee', 1, NULL, 75000, 'SEKALI', 0, 0, 4, 0, 0, 1, 1, NULL, 'y'),
(56, 'Untuk Keselamatan Kerja (Handrub, tisue, sabun)', 1, NULL, 20000, 'SEKALI', 0, 0, 4, 0, 0, 2, 1, NULL, 'y'),
(57, 'Orientasi ', 3, NULL, 75000, 'SEKALI', 1, 1, 4, 0, 0, 3, 1, NULL, 'y'),
(58, 'Keselamatan Pasien', 3, NULL, 150000, 'SEKALI', 0, 0, 4, 0, 0, 3, 1, NULL, 'y'),
(59, 'Log Book (dibayar 1 kali)', 1, NULL, 20000, 'SEKALI', 0, 0, 4, 0, 0, 3, 1, NULL, 'y'),
(60, 'Name Tag (dibayar 1 kali)', 1, NULL, 10000, 'SEKALI', 0, 0, 4, 0, 0, 3, 1, NULL, 'y'),
(61, 'RPS (Resource Person Session)', 3, NULL, 150000, 'SEKALI', 0, 0, 4, 0, 0, 4, 1, NULL, 'y'),
(63, 'Ujian', 4, NULL, 150000, 'SEKALI', 0, 0, 4, 0, 0, 6, 1, NULL, 'y'),
(64, 'Makan dan Snack Penguji', 5, NULL, 20000, 'SEKALI', 0, 0, 4, 0, 0, 6, 1, NULL, 'y'),
(65, 'Bahan Habis Pakai Ujian', 2, NULL, 100000, 'SEKALI', 0, 0, 4, 0, 0, 6, 1, NULL, 'y'),
(66, 'Institusional Fee Ujian', 6, NULL, 150000, 'SEKALI', 0, 0, 4, 0, 0, 6, 1, NULL, 'y'),
(67, 'Management Fee Ujian', 6, NULL, 20000, 'SEKALI', 0, 0, 4, 0, 0, 6, 1, NULL, 'y'),
(68, 'Bed side teaching (BST)', 13, NULL, 50000, 'MINGGUAN', 0, 0, 4, 6, 0, 4, 2, NULL, 'y'),
(69, 'Bed side teaching (BST)', 13, NULL, 75000, 'MINGGUAN', 0, 0, 4, 7, 0, 4, 2, NULL, 'y'),
(70, 'Bed side teaching (BST)', 13, NULL, 75000, 'MINGGUAN', 0, 0, 4, 8, 0, 4, 2, NULL, 'y'),
(71, 'Bed side teaching (BST)', 13, NULL, 75000, 'MINGGUAN', 0, 0, 4, 10, 0, 4, 2, NULL, 'y');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_tarif_jenis`
--

CREATE TABLE `tb_tarif_jenis` (
  `id_tarif_jenis` int(11) NOT NULL,
  `nama_tarif_jenis` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_tarif_jenis`
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
-- Struktur dari tabel `tb_tarif_pilih`
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
-- Dumping data untuk tabel `tb_tarif_pilih`
--

INSERT INTO `tb_tarif_pilih` (`id_tarif_pilih`, `id_praktik`, `tgl_input_tarif_pilih`, `tgl_ubah_tarif_pilih`, `nama_jenis_tarif_pilih`, `nama_tarif_pilih`, `nominal_tarif_pilih`, `nama_satuan_tarif_pilih`, `frekuensi_tarif_pilih`, `kuantitas_tarif_pilih`, `jumlah_tarif_pilih`) VALUES
(1, 1, '2022-02-23', NULL, 'Administrasi', 'Institusional Fee', 50000, 'persiswa/periode', 1, 46, 2300000),
(2, 1, '2022-02-23', NULL, 'Administrasi', 'Management Fee', 75000, 'persiswa/periode', 1, 46, 3450000),
(3, 1, '2022-02-23', NULL, 'Barang Habis Pakai', 'Untuk Keselamatan Kerja (Handrub, tisue, sabun)', 20000, 'persiswa/periode', 1, 46, 920000),
(4, 1, '2022-02-23', NULL, 'Overhead Operational', 'Keselamatan Pasien', 150000, 'perperiode/kali', 1, 46, 6900000),
(5, 1, '2022-02-23', NULL, 'Overhead Operational', 'Log Book (dibayar 1 kali)', 20000, 'persiswa/periode', 1, 46, 920000),
(6, 1, '2022-02-23', NULL, 'Overhead Operational', 'Name Tag (dibayar 1 kali)', 10000, 'persiswa/periode', 1, 46, 460000),
(7, 1, '2022-02-23', NULL, 'Overhead Operational', 'Orientasi ', 75000, 'perperiode/kali', 1, 1, 75000),
(8, 1, '2022-02-23', NULL, 'Pembelajaran', 'Materi (TAK, Komunikasi Terapeutik, Dokumentasi Keperawatanan) ', 150000, 'perperiode/kali', 3, 1, 450000),
(9, 1, '2022-02-23', NULL, 'Pembelajaran', 'RPS (Resource Person Session)', 150000, 'perperiode/kali', 1, 46, 6900000),
(10, 1, '2022-02-23', NULL, 'Pembelajaran', 'Bed side teaching (BST)', 75000, 'persiswa/minggu', 16087, 46, 55500150000),
(11, 1, '2022-02-23', NULL, 'Ujian', 'Ujian', 150000, 'persiswa/hari', 1, 46, 6900000),
(12, 1, '2022-02-23', NULL, 'Ujian', 'Makan dan Snack Penguji', 20000, 'perpenguji/kali', 1, 46, 920000),
(13, 1, '2022-02-23', NULL, 'Ujian', 'Bahan Habis Pakai Ujian', 100000, 'persiswa/kali', 1, 46, 4600000),
(14, 1, '2022-02-23', NULL, 'Ujian', 'Institusional Fee Ujian', 150000, 'persiswa/periode ujian', 1, 46, 6900000),
(15, 1, '2022-02-23', NULL, 'Ujian', 'Management Fee Ujian', 20000, 'persiswa/periode ujian', 1, 46, 920000),
(17, 1, '2022-02-24', NULL, 'Pemakaian Kekayaan Daerah', 'Aula Napza', 750000, 'perperiode/kali', 1, 1, 750000),
(18, 1, '2022-02-24', NULL, 'Mess/Pemondokan', 'Mess RSJ 1 Lama (Dengan Makan 3x Sehari)', 100000, 'persiswa/hari', 112616, 46, 518033600000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_tarif_satuan`
--

CREATE TABLE `tb_tarif_satuan` (
  `id_tarif_satuan` int(11) NOT NULL,
  `nama_tarif_satuan` text NOT NULL,
  `ket_tarif_satuan` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_tarif_satuan`
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
-- Struktur dari tabel `tb_tempat`
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
-- Dumping data untuk tabel `tb_tempat`
--

INSERT INTO `tb_tempat` (`id_tempat`, `id_tarif_jenis`, `nama_tempat`, `kapasitas_tempat`, `id_jurusan_pdd_jenis`, `tarif_tempat`, `id_tarif_satuan`, `tgl_input_tempat`, `ket_tempat`, `status_tempat`) VALUES
(3, 7, 'Aula Utama', 40, 0, 1000000, 3, '2022-02-13', '-', 'y'),
(6, 7, 'Aula Napza', 40, 0, 750000, 3, '2022-02-13', '-', 'y'),
(9, 7, 'Ruang SPI', 20, 0, 500000, 3, '2022-02-13', '-', 'y'),
(10, 7, 'Ruang Kelas/Ruang Diskusi', 10, 1, 30000, 4, '2022-02-15', '-', 'y'),
(16, 7, 'Ruang Komite Medik', 15, 0, 750000, 3, '2022-02-13', '-', 'y');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_tempat_pilih`
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
-- Struktur dari tabel `tb_unit`
--

CREATE TABLE `tb_unit` (
  `id_unit` int(11) NOT NULL,
  `nama_unit` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_unit`
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
-- Struktur dari tabel `tb_user`
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
-- Dumping data untuk tabel `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `id_mou`, `id_institusi`, `username_user`, `password_user`, `nama_user`, `email_user`, `level_user`, `no_telp_user`, `foto_user`, `terakhir_login_user`, `tgl_buat_user`, `tgl_ubah_user`, `status_user`) VALUES
(1, 0, 0, 'admin', 'e1d5be1c7f2f456670de3d53c7b54f4a', 'ADMIN DIKLAT RS JIWA', 'admin@admin', '1', '08123145645', NULL, '2022-02-24', '2021-03-29', '2022-02-22', 'Y'),
(15, 1, 87, 'user', 'ee11cbb19052e40b07aac0ca060c23ee', 'USER INSTITUSI', 'asd@asd', '2', '091273', NULL, '2022-01-10', '2021-12-31', '2022-01-10', 'Y'),
(16, 0, 5, 'asalajah@gmail.com', 'e66ed49f9432f4ef78d0910ab7e31f57', 'Melly', 'asalajah@gmail.com', '2', '081123456789', NULL, '2022-01-05', '2022-01-05', NULL, 'Y'),
(17, 0, 3, 'diklit.rsj.jabarprov@gmail.com', '39b1f688752f9edb7e1283a4649f05a4', 'Rani', 'diklit.rsj.jabarprov@gmail.com', '2', '081320510201', NULL, '2022-01-05', '2022-01-05', NULL, 'Y');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_user_detail`
--

CREATE TABLE `tb_user_detail` (
  `id_user` int(11) NOT NULL,
  `id_mou` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_akreditasi`
--
ALTER TABLE `tb_akreditasi`
  ADD PRIMARY KEY (`id_akreditasi`);

--
-- Indeks untuk tabel `tb_bayar`
--
ALTER TABLE `tb_bayar`
  ADD PRIMARY KEY (`id_bayar`);

--
-- Indeks untuk tabel `tb_institusi`
--
ALTER TABLE `tb_institusi`
  ADD PRIMARY KEY (`id_institusi`);

--
-- Indeks untuk tabel `tb_jenis_mentor`
--
ALTER TABLE `tb_jenis_mentor`
  ADD PRIMARY KEY (`id_jenis_mentor`);

--
-- Indeks untuk tabel `tb_jenjang_pdd`
--
ALTER TABLE `tb_jenjang_pdd`
  ADD PRIMARY KEY (`id_jenjang_pdd`);

--
-- Indeks untuk tabel `tb_jurusan_pdd`
--
ALTER TABLE `tb_jurusan_pdd`
  ADD PRIMARY KEY (`id_jurusan_pdd`);

--
-- Indeks untuk tabel `tb_jurusan_pdd_jenis`
--
ALTER TABLE `tb_jurusan_pdd_jenis`
  ADD PRIMARY KEY (`id_jurusan_pdd_jenis`);

--
-- Indeks untuk tabel `tb_lapor`
--
ALTER TABLE `tb_lapor`
  ADD PRIMARY KEY (`id_lapor`);

--
-- Indeks untuk tabel `tb_mentor`
--
ALTER TABLE `tb_mentor`
  ADD PRIMARY KEY (`id_mentor`);

--
-- Indeks untuk tabel `tb_mess`
--
ALTER TABLE `tb_mess`
  ADD PRIMARY KEY (`id_mess`);

--
-- Indeks untuk tabel `tb_mess_detail`
--
ALTER TABLE `tb_mess_detail`
  ADD PRIMARY KEY (`id_mess_detail`);

--
-- Indeks untuk tabel `tb_mess_pilih`
--
ALTER TABLE `tb_mess_pilih`
  ADD PRIMARY KEY (`id_mess_pilih`);

--
-- Indeks untuk tabel `tb_mou`
--
ALTER TABLE `tb_mou`
  ADD PRIMARY KEY (`id_mou`);

--
-- Indeks untuk tabel `tb_nilai`
--
ALTER TABLE `tb_nilai`
  ADD PRIMARY KEY (`id_nilai`);

--
-- Indeks untuk tabel `tb_nilai_dokter`
--
ALTER TABLE `tb_nilai_dokter`
  ADD PRIMARY KEY (`id_nilai_dokter`);

--
-- Indeks untuk tabel `tb_praktik`
--
ALTER TABLE `tb_praktik`
  ADD PRIMARY KEY (`id_praktik`);

--
-- Indeks untuk tabel `tb_praktikan`
--
ALTER TABLE `tb_praktikan`
  ADD PRIMARY KEY (`id_praktikan`);

--
-- Indeks untuk tabel `tb_praktikan_detail`
--
ALTER TABLE `tb_praktikan_detail`
  ADD PRIMARY KEY (`id_praktikan_detail`);

--
-- Indeks untuk tabel `tb_spesifikasi_pdd`
--
ALTER TABLE `tb_spesifikasi_pdd`
  ADD PRIMARY KEY (`id_spesifikasi_pdd`);

--
-- Indeks untuk tabel `tb_tarif`
--
ALTER TABLE `tb_tarif`
  ADD PRIMARY KEY (`id_tarif`);

--
-- Indeks untuk tabel `tb_tarif_jenis`
--
ALTER TABLE `tb_tarif_jenis`
  ADD PRIMARY KEY (`id_tarif_jenis`);

--
-- Indeks untuk tabel `tb_tarif_pilih`
--
ALTER TABLE `tb_tarif_pilih`
  ADD PRIMARY KEY (`id_tarif_pilih`);

--
-- Indeks untuk tabel `tb_tarif_satuan`
--
ALTER TABLE `tb_tarif_satuan`
  ADD PRIMARY KEY (`id_tarif_satuan`);

--
-- Indeks untuk tabel `tb_tempat`
--
ALTER TABLE `tb_tempat`
  ADD PRIMARY KEY (`id_tempat`);

--
-- Indeks untuk tabel `tb_tempat_pilih`
--
ALTER TABLE `tb_tempat_pilih`
  ADD PRIMARY KEY (`id_tempat_pilih`);

--
-- Indeks untuk tabel `tb_unit`
--
ALTER TABLE `tb_unit`
  ADD PRIMARY KEY (`id_unit`);

--
-- Indeks untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_akreditasi`
--
ALTER TABLE `tb_akreditasi`
  MODIFY `id_akreditasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tb_bayar`
--
ALTER TABLE `tb_bayar`
  MODIFY `id_bayar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tb_jenjang_pdd`
--
ALTER TABLE `tb_jenjang_pdd`
  MODIFY `id_jenjang_pdd` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `tb_jurusan_pdd`
--
ALTER TABLE `tb_jurusan_pdd`
  MODIFY `id_jurusan_pdd` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `tb_jurusan_pdd_jenis`
--
ALTER TABLE `tb_jurusan_pdd_jenis`
  MODIFY `id_jurusan_pdd_jenis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tb_lapor`
--
ALTER TABLE `tb_lapor`
  MODIFY `id_lapor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `tb_mess`
--
ALTER TABLE `tb_mess`
  MODIFY `id_mess` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `tb_mess_detail`
--
ALTER TABLE `tb_mess_detail`
  MODIFY `id_mess_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `tb_mess_pilih`
--
ALTER TABLE `tb_mess_pilih`
  MODIFY `id_mess_pilih` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tb_mou`
--
ALTER TABLE `tb_mou`
  MODIFY `id_mou` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=127;

--
-- AUTO_INCREMENT untuk tabel `tb_nilai`
--
ALTER TABLE `tb_nilai`
  MODIFY `id_nilai` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tb_nilai_dokter`
--
ALTER TABLE `tb_nilai_dokter`
  MODIFY `id_nilai_dokter` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tb_praktik`
--
ALTER TABLE `tb_praktik`
  MODIFY `id_praktik` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tb_praktikan`
--
ALTER TABLE `tb_praktikan`
  MODIFY `id_praktikan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tb_praktikan_detail`
--
ALTER TABLE `tb_praktikan_detail`
  MODIFY `id_praktikan_detail` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tb_spesifikasi_pdd`
--
ALTER TABLE `tb_spesifikasi_pdd`
  MODIFY `id_spesifikasi_pdd` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `tb_tarif`
--
ALTER TABLE `tb_tarif`
  MODIFY `id_tarif` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT untuk tabel `tb_tarif_jenis`
--
ALTER TABLE `tb_tarif_jenis`
  MODIFY `id_tarif_jenis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `tb_tarif_pilih`
--
ALTER TABLE `tb_tarif_pilih`
  MODIFY `id_tarif_pilih` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `tb_tarif_satuan`
--
ALTER TABLE `tb_tarif_satuan`
  MODIFY `id_tarif_satuan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `tb_tempat`
--
ALTER TABLE `tb_tempat`
  MODIFY `id_tempat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `tb_tempat_pilih`
--
ALTER TABLE `tb_tempat_pilih`
  MODIFY `id_tempat_pilih` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
