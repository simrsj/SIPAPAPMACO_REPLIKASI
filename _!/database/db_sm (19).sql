-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 11 Jan 2022 pada 10.42
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
  `atas_nama_bayar` text NOT NULL,
  `no_bayar` text NOT NULL,
  `melalui_bayar` text NOT NULL,
  `tgl_input_bayar` date NOT NULL,
  `file_bayar` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_harga`
--

CREATE TABLE `tb_harga` (
  `id_harga` int(11) NOT NULL,
  `nama_harga` text NOT NULL,
  `id_harga_satuan` int(11) NOT NULL,
  `ket_harga` int(11) DEFAULT NULL,
  `jumlah_harga` float NOT NULL,
  `tipe_harga` text NOT NULL,
  `id_jurusan_pdd_jenis` int(11) NOT NULL,
  `id_jurusan_pdd` int(11) NOT NULL,
  `id_jenjang_pdd` int(11) DEFAULT NULL,
  `id_spesifikasi_pdd` int(11) DEFAULT NULL,
  `id_harga_jenis` int(11) NOT NULL,
  `pilih_harga` int(11) NOT NULL,
  `tgl_harga` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_harga`
--

INSERT INTO `tb_harga` (`id_harga`, `nama_harga`, `id_harga_satuan`, `ket_harga`, `jumlah_harga`, `tipe_harga`, `id_jurusan_pdd_jenis`, `id_jurusan_pdd`, `id_jenjang_pdd`, `id_spesifikasi_pdd`, `id_harga_jenis`, `pilih_harga`, `tgl_harga`) VALUES
(1, 'Institusional Fee', 1, NULL, 50000, 'SEKALI', 1, 1, 0, 0, 1, 1, NULL),
(2, 'Management Fee', 1, NULL, 75000, 'SEKALI', 1, 1, 0, 0, 1, 1, NULL),
(3, 'Alat Tulis Kantor', 1, NULL, 5000, 'SEKALI', 1, 1, 0, 0, 1, 1, NULL),
(4, 'Untuk Keselamatan Kerja (Handrub, tisue, sabun)', 1, NULL, 5000, 'SEKALI', 1, 1, 0, 0, 2, 1, NULL),
(5, 'Orientasi Keselamatan Pasien', 1, NULL, 10000, 'SEKALI', 1, 1, 0, 0, 3, 1, NULL),
(6, 'Log Book (dibayar 1 kali)', 1, NULL, 20000, 'SEKALI', 1, 1, 0, 0, 3, 1, NULL),
(7, 'Name Tag (dibayar 1 kali)', 1, NULL, 5000, 'SEKALI', 1, 1, 0, 0, 3, 1, NULL),
(8, 'Clinical science session (CSS)', 2, NULL, 37500, 'SEKALI', 1, 1, 0, 0, 4, 1, NULL),
(9, 'Case report session (CRS)', 2, NULL, 37500, 'SEKALI', 1, 1, 0, 0, 4, 1, NULL),
(10, 'Case base Discusion (CBD)', 2, NULL, 37500, 'SEKALI', 1, 1, 0, 0, 4, 1, NULL),
(11, 'Pengayaan - Observasi', 2, NULL, 37500, 'SEKALI', 1, 1, 0, 0, 4, 1, NULL),
(12, 'RPS (Resource Person Session)', 2, NULL, 37500, 'SEKALI', 1, 1, 0, 0, 4, 1, NULL),
(13, 'Bed side teaching (BST)- Visite Besar-Role Model - Pembimbingan Kedokteran Umum di IGD', 2, NULL, 37500, 'SEKALI', 1, 1, 0, 0, 4, 1, NULL),
(14, 'Mini Clinical Examination  Evaluation (Mini CeX)', 2, NULL, 150000, 'SEKALI', 0, 1, 0, 0, 6, 1, NULL),
(15, 'Ujian', 2, NULL, 150000, 'SEKALI', 1, 1, 0, 0, 6, 1, NULL),
(16, 'Makan Pembimbing Ujian', 2, NULL, 20000, 'SEKALI', 1, 1, 0, 0, 6, 1, NULL),
(17, 'Standar Pasien', 2, NULL, 100000, 'SEKALI', 1, 1, 0, 0, 6, 1, NULL),
(18, 'Institusional Fee', 1, NULL, 50000, 'SEKALI', 2, 2, 0, 0, 1, 1, NULL),
(19, 'Management Fee', 1, NULL, 75000, 'SEKALI', 2, 2, 0, 0, 1, 1, NULL),
(20, 'Untuk Keselamatan Kerja (Handrub, tisue, sabun)', 1, NULL, 20000, 'SEKALI', 2, 2, 0, 0, 2, 1, NULL),
(21, 'Orientasi ', 3, NULL, 75000, 'SEKALI', 2, 2, 0, 0, 3, 1, NULL),
(22, 'Keselamatan Pasien', 3, NULL, 150000, 'SEKALI', 2, 2, 0, 0, 3, 1, NULL),
(23, 'Log Book (dibayar 1 kali)', 1, NULL, 20000, 'SEKALI', 2, 2, 0, 0, 3, 1, NULL),
(24, 'Name Tag (dibayar 1 kali)', 1, NULL, 10000, 'SEKALI', 2, 2, 0, 0, 3, 1, NULL),
(25, 'RPS (Resource Person Session)', 3, NULL, 150000, 'SEKALI', 2, 2, 0, 0, 4, 1, NULL),
(26, 'Materi (TAK, Komunikasi Terapeutik, Dokumentasi Keperawatanan) ', 3, 0, 150000, 'SEKALI', 2, 2, 0, 0, 4, 1, '2022-01-11'),
(27, 'Ujian', 4, NULL, 150000, 'SEKALI', 2, 2, 0, 0, 6, 1, NULL),
(28, 'Makan dan Snack Penguji', 5, NULL, 20000, 'SEKALI', 2, 2, 0, 0, 6, 1, NULL),
(29, 'Bahan Habis Pakai Ujian', 2, NULL, 100000, 'SEKALI', 2, 2, 0, 0, 6, 1, NULL),
(30, 'Institusional Fee Ujian', 6, NULL, 150000, 'SEKALI', 2, 2, 0, 0, 6, 1, NULL),
(31, 'Management Fee Ujian', 6, NULL, 20000, 'SEKALI', 2, 2, 0, 0, 6, 1, NULL),
(32, 'Institusional Fee', 1, NULL, 20000, 'SEKALI', 3, 3, 0, 0, 1, 2, NULL),
(33, 'Management Fee', 1, NULL, 20000, 'SEKALI', 3, 3, 0, 0, 1, 2, NULL),
(34, 'Untuk Keselamatan Kerja (Handrub, tisue, sabun)', 1, NULL, 20000, 'SEKALI', 3, 3, 0, 0, 2, 1, NULL),
(35, 'Orientasi ', 3, NULL, 75000, 'SEKALI', 3, 3, 0, 0, 3, 1, NULL),
(36, 'Keselamatan Pasien', 3, NULL, 150000, 'SEKALI', 3, 3, 0, 0, 3, 1, NULL),
(37, 'Log Book (dibayar 1 kali)', 1, NULL, 20000, 'SEKALI', 3, 3, 0, 0, 3, 1, NULL),
(38, 'Name Tag (dibayar 1 kali)', 1, NULL, 10000, 'SEKALI', 3, 3, 0, 0, 3, 1, NULL),
(39, 'RPS (Resource Person Session)', 3, NULL, 150000, 'SEKALI', 3, 3, 0, 0, 4, 1, NULL),
(40, 'Materi (TAK, Komunikasi Terapeutik, Dokumentasi Keperawatanan) ', 3, 0, 150000, 'SEKALI', 3, 3, 0, 0, 4, 1, '2022-01-11'),
(41, 'Ujian', 4, NULL, 150000, 'SEKALI', 3, 3, 0, 0, 6, 1, NULL),
(42, 'Makan dan Snack Penguji', 5, NULL, 20000, 'SEKALI', 3, 3, 0, 0, 6, 1, NULL),
(43, 'Bahan Habis Pakai Ujian', 2, NULL, 100000, 'SEKALI', 3, 3, 0, 0, 6, 1, NULL),
(44, 'Institusional Fee Ujian', 6, NULL, 150000, 'SEKALI', 3, 3, 0, 0, 6, 1, NULL),
(45, 'Management Fee Ujian', 6, NULL, 20000, 'SEKALI', 3, 3, 0, 0, 6, 1, NULL),
(46, 'Institusional Fee', 1, NULL, 50000, 'SEKALI', 4, 0, 0, 0, 1, 1, NULL),
(47, 'Management Fee', 1, NULL, 75000, 'SEKALI', 4, 0, 0, 0, 1, 1, NULL),
(48, 'Untuk Keselamatan Kerja (Handrub, tisue, sabun)', 1, NULL, 20000, 'SEKALI', 4, 0, 0, 0, 2, 1, NULL),
(49, 'Orientasi ', 3, NULL, 75000, 'SEKALI', 4, 0, 0, 0, 3, 1, NULL),
(50, 'Keselamatan Pasien', 3, NULL, 150000, 'SEKALI', 4, 0, 0, 0, 3, 1, NULL),
(51, 'Log Book (dibayar 1 kali)', 1, NULL, 20000, 'SEKALI', 4, 0, 0, 0, 3, 1, NULL),
(52, 'Name Tag (dibayar 1 kali)', 1, NULL, 10000, 'SEKALI', 4, 0, 0, 0, 3, 1, NULL),
(53, 'RPS (Resource Person Session)', 3, NULL, 150000, 'SEKALI', 4, 0, 0, 0, 4, 1, NULL),
(54, 'Materi (TAK, Komunikasi Terapeutik, Dokumentasi Keperawatanan) ', 3, 0, 150000, 'SEKALI', 4, 0, 0, 0, 4, 1, '2022-01-11'),
(55, 'Ujian', 4, NULL, 150000, 'SEKALI', 4, 0, 0, 0, 6, 1, NULL),
(56, 'Makan dan Snack Penguji', 5, NULL, 20000, 'SEKALI', 4, 0, 0, 0, 6, 1, NULL),
(57, 'Bahan Habis Pakai Ujian', 2, NULL, 100000, 'SEKALI', 4, 0, 0, 0, 6, 1, NULL),
(58, 'Institusional Fee Ujian', 6, NULL, 150000, 'SEKALI', 4, 0, 0, 0, 6, 1, NULL),
(59, 'Management Fee Ujian', 6, NULL, 20000, 'SEKALI', 4, 0, 0, 0, 6, 1, NULL),
(60, 'Bed side teaching (BST)', 2, NULL, 50000, 'MINGGUAN', 0, 0, 6, 0, 4, 2, NULL),
(61, 'Bed side teaching (BST)', 2, NULL, 75000, 'MINGGUAN', 0, 0, 7, 0, 4, 2, NULL),
(62, 'Bed side teaching (BST)', 2, NULL, 75000, 'MINGGUAN', 0, 0, 8, 0, 4, 2, NULL),
(63, 'Bed side teaching (BST)', 2, NULL, 75000, 'MINGGUAN', 0, 0, 10, 0, 4, 2, NULL),
(66, 'Ruang R. Komite Medik', 7, NULL, 750000, 'HARI-', 1, 1, 0, 0, 7, 2, NULL),
(67, 'Ruang SPI', 7, NULL, 500000, 'SEKALI', 0, 0, 0, 0, 7, 2, NULL),
(68, 'Ruang Kelas / Ruang Diskusi', 4, NULL, 30000, 'HARI-', 1, 1, 0, 0, 7, 1, NULL),
(69, 'Aula NAPZA', 7, NULL, 750000, 'SEKALI', 0, 0, 0, 0, 7, 2, NULL),
(70, 'Aula Utama', 7, NULL, 1000000, 'SEKALI', 0, 0, 0, 0, 7, 2, NULL),
(71, 'Praktik Kerja Lapangan (PKL)', 8, NULL, 100000, 'SEKALI', 0, 0, 1, 0, 9, 1, NULL),
(72, 'Praktik Kerja Lapangan (PKL)', 8, NULL, 100000, 'SEKALI', 0, 0, 2, 0, 9, 1, NULL),
(73, 'Praktik Kerja Lapangan (PKL)', 8, NULL, 100000, 'SEKALI', 0, 0, 3, 0, 9, 1, NULL),
(74, 'Praktik Kerja Lapangan (PKL)', 8, NULL, 200000, 'SEKALI', 0, 0, 4, 0, 9, 1, NULL),
(75, 'Praktik Kerja Lapangan (PKL)', 8, NULL, 200000, 'SEKALI', 0, 0, 5, 0, 9, 1, NULL),
(76, 'Praktik Kerja Lapangan (PKL)', 8, NULL, 200000, 'SEKALI', 0, 0, 6, 0, 9, 1, NULL),
(77, 'Praktik Kerja Lapangan (PKL)', 8, NULL, 250000, 'SEKALI', 0, 0, 7, 0, 9, 1, NULL),
(78, 'Praktik Kerja Lapangan (PKL)', 8, NULL, 250000, 'SEKALI', 0, 0, 8, 0, 9, 1, NULL),
(79, 'Praktik Kerja Lapangan (PKL)', 8, NULL, 350000, 'SEKALI', 0, 0, 9, 0, 9, 1, NULL),
(80, 'Praktik Kerja Lapangan (PKL)', 8, NULL, 350000, 'SEKALI', 0, 0, 10, 0, 9, 1, NULL),
(81, 'Praktik Kerja Lapangan (PKL)', 8, NULL, 250000, 'SEKALI', 0, 0, 11, 0, 9, 1, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_harga_jenis`
--

CREATE TABLE `tb_harga_jenis` (
  `id_harga_jenis` int(11) NOT NULL,
  `nama_harga_jenis` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_harga_jenis`
--

INSERT INTO `tb_harga_jenis` (`id_harga_jenis`, `nama_harga_jenis`) VALUES
(0, '-- Lainnya --'),
(1, 'Administrasi'),
(2, 'Barang Habis Pakai'),
(3, 'Overhead Operational'),
(4, 'Pembelajaran'),
(5, 'UAP'),
(6, 'Ujian'),
(7, 'Tempat'),
(8, 'MESS'),
(9, 'Praktik Kerja Lapangan (PKL)');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_harga_pilih`
--

CREATE TABLE `tb_harga_pilih` (
  `id_harga_pilih` int(11) NOT NULL,
  `id_praktik` int(11) DEFAULT NULL,
  `id_harga` int(11) DEFAULT NULL,
  `tgl_input_harga_pilih` date DEFAULT NULL,
  `tgl_ubah_harga_pilih` date DEFAULT NULL,
  `frekuensi_harga_pilih` int(11) NOT NULL,
  `kuantitas_harga_pilih` int(11) NOT NULL,
  `jumlah_harga_pilih` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_harga_satuan`
--

CREATE TABLE `tb_harga_satuan` (
  `id_harga_satuan` int(11) NOT NULL,
  `nama_harga_satuan` text NOT NULL,
  `ket_harga_satuan` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_harga_satuan`
--

INSERT INTO `tb_harga_satuan` (`id_harga_satuan`, `nama_harga_satuan`, `ket_harga_satuan`) VALUES
(1, 'Per siswa/periode', NULL),
(2, 'Per siswa/kali', NULL),
(3, 'Per periode/kali', NULL),
(4, 'Per siswa/hari', NULL),
(5, 'Per penguji/kali', NULL),
(6, 'Per siswa/periode ujian', NULL),
(7, 'Per hari/keg', NULL),
(8, 'Per minggu/orang', 'Mingguan dikali jumlah praktik');

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
(1, 'AKADEMI PEREKEM MEDIS DAN INFORMATIKA KESEHATAN BANDUNG', 'APIKES ', '', '', ''),
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
(85, 'UNIVERSITAS PERSADA INDONESIA Y.A.I', 'UPI Y.A.I', './_img/logo_institusi/85.png', '', '');

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
  `akronim_jurusan_pdd` text DEFAULT NULL,
  `id_jurusan_pdd_jenis` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_jurusan_pdd`
--

INSERT INTO `tb_jurusan_pdd` (`id_jurusan_pdd`, `nama_jurusan_pdd`, `akronim_jurusan_pdd`, `id_jurusan_pdd_jenis`) VALUES
(0, '-- Lainnya --', NULL, 0),
(1, 'Kedokteran', NULL, 1),
(2, 'Keperawatan', NULL, 2),
(3, 'Psikologi', NULL, 3),
(4, 'Farmasi', NULL, 3),
(5, 'Pekerja Sosial', 'PEKSOS', 3),
(6, 'Rekam Medis', 'RM', 3),
(7, 'Informasi Teknologi', 'IT', 4),
(8, 'Kesehatan Lingkungan', 'KESLING', 3),
(15, 'SMA/SMK/MA Sederajat', 'SMA Sederajat', 4);

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
(3, 'Data Harga', 'Data Harga Tidak Sesuai jurusan', 'sedang', '2022-01-03', 'CEK', 'Rani Riffani', '192.168.7.88/sm/?trk&dtl=1', './_file/lapor/lapor_3_2022-01-03.png');

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
(4, 'PPDS');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_mess`
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
  `kapasitas_terisi_mess` int(11) NOT NULL,
  `ket_mess` text DEFAULT NULL,
  `status_mess` enum('Aktif','Tidak Aktif') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_mess`
--

INSERT INTO `tb_mess` (`id_mess`, `nama_mess`, `kapasitas_l_mess`, `kapasitas_p_mess`, `kapasitas_t_mess`, `alamat_mess`, `nama_pemilik_mess`, `no_pemilik_mess`, `email_pemilik_mess`, `harga_tanpa_makan_mess`, `harga_dengan_makan_mess`, `kapasitas_terisi_mess`, `ket_mess`, `status_mess`) VALUES
(1, 'Mess RSJ 1 Lama', 0, 0, 20, 'Jl. Kolonel Maturi KM.7, Desa Jambudipa, Kec. Cisarua, Kab. Bandung Barat, 40551', 'RS Jiwa Provinsi Jawa Barat', '081321329101', '', 20000, 100000, 0, 'Makan 3x Sehari', 'Aktif'),
(2, 'Mess RSJ 2 Baru', 0, 0, 92, 'Jl. Kolonel Maturi KM.7, Desa Jambudipa, Kec. Cisarua, Kab. Bandung Barat, 40551', 'RS Jiwa Provinsi Jawa Barat', '081321329101', '', 20000, 100000, 23, '', 'Aktif'),
(3, 'Asrama Rifa Corporate', 0, 0, 100, 'Kp. Panyandaan RT. 01 RW. 14 Desa Jambudipa Kecamatan Cisarua Kab. Bandung Barat', 'Ibu Ai', '081322629909', '', 20000, 80000, 53, 'Dengan Makan 3x Sehari', 'Aktif'),
(4, 'Pondokan H. Ating', 0, 0, 100, 'Kp. Barukai Timur RT. 04 RW. 13 Desa Jambudipa Kecamatan Cisarua Kab. Bandung Barat', 'H. Ating / Hj. Siti Sutiah', '0', '', 20000, 80000, 0, '', 'Aktif'),
(5, 'Wisma Anugrah Ibu Nanik', 0, 0, 70, 'Kp. Panyandaan RT. 01 RW. 14 Desa Jambudipa Kecamatan Cisarua Kab. Bandung Barat', 'Hj. Nanik Susiani', '081320719652', '', 15000, 70000, 0, '', 'Aktif'),
(6, 'Pondokan dr. Hj. Meutia Laksminingrum', 0, 0, 0, '-', 'dr. Hj. Meutia Laksminingrum', '0', '', 0, 0, 0, '', 'Tidak Aktif'),
(7, 'Galuh Pakuan', 0, 0, 70, 'Kp. Panyandaan RT. 01 RW. 14 Desa Jambudipa Kecamatan Cisarua Kab. Bandung Barat', 'Oyo Suharya', '081320113399', '', 20000, 80000, 0, '', 'Aktif'),
(8, 'Pondokan Tatang', 0, 0, 30, 'Kp. Panyandaan RT. 01 RW. 14 Desa Jambudipa Kecamatan Cisarua Kab. Bandung Barat', 'Tatang', '089531804825', '', 20000, 80000, 0, 'Dengan Makan 3x Sehari', 'Aktif');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_mess_detail`
--

CREATE TABLE `tb_mess_detail` (
  `id_mess_detail` int(11) NOT NULL,
  `id_mess` int(11) NOT NULL,
  `harga_mess_detail` int(11) DEFAULT NULL,
  `ket_mess_detail` text DEFAULT NULL,
  `jumlah_mess_detail` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_mess_detail`
--

INSERT INTO `tb_mess_detail` (`id_mess_detail`, `id_mess`, `harga_mess_detail`, `ket_mess_detail`, `jumlah_mess_detail`) VALUES
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
  `makan_mess_pilih` enum('Ya','Tidak') NOT NULL,
  `jumlah_praktik_mess_pilih` int(11) NOT NULL,
  `jumlah_hari_mess_pilih` int(11) NOT NULL,
  `total_harga_mess_pilih` int(11) NOT NULL
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
(1, '1', '2016-01-05', '2019-01-04', '', '', 6, 0, 0, 0, NULL, NULL, 'Y'),
(2, '2', '2014-02-13', '2017-02-12', '', '', 2, 0, 0, 2, NULL, NULL, 'Y'),
(3, '3', '2018-08-20', '2021-08-19', '', '', 2, 0, 0, 0, NULL, NULL, 'Y'),
(4, '4', '2017-12-22', '2020-12-21', '', '', 2, 0, 0, 0, NULL, NULL, 'Y'),
(5, '5', '2019-06-19', '2022-06-18', '', '', 2, 0, 0, 0, NULL, NULL, 'Y'),
(6, '6', '2021-09-27', '2024-09-26', '', '', 2, 0, 0, 2, NULL, NULL, 'Y'),
(7, '7', '2015-01-02', '2018-01-01', '', '', 2, 0, 0, 2, NULL, NULL, 'Y'),
(8, '8', '2019-02-06', '2022-02-05', '', '', 2, 0, 0, 0, NULL, NULL, 'Y'),
(9, '9', '2013-06-12', '2016-06-11', '', '', 2, 0, 0, 0, NULL, NULL, 'Y'),
(10, '10', '2014-07-17', '2017-07-16', '', '', 2, 0, 0, 3, NULL, NULL, 'Y'),
(11, '11', '2018-11-12', '2021-11-11', '', '', 2, 0, 0, 0, NULL, NULL, 'Y'),
(12, '12', '2014-01-21', '2017-01-20', '', '', 2, 0, 0, 0, NULL, NULL, 'Y'),
(13, '13', '2014-03-28', '2017-03-27', '', '', 2, 0, 0, 3, NULL, NULL, 'Y'),
(14, '14', '2018-09-12', '2021-09-11', '', '', 2, 0, 0, 2, NULL, NULL, 'Y'),
(15, '15', '2014-05-14', '2017-05-13', '', '', 2, 0, 0, 3, NULL, NULL, 'Y'),
(16, '16', '2011-06-13', '2014-06-12', '', '', 2, 0, 0, 0, NULL, NULL, 'Y'),
(17, '17', '2014-01-01', '2016-12-31', '', '', 2, 0, 0, 0, NULL, NULL, 'Y'),
(18, '18', '2014-10-21', '2017-10-20', '', '', 2, 0, 0, 0, NULL, NULL, 'Y'),
(19, '19', '2021-11-09', '2024-11-08', '', '', 2, 0, 0, 0, NULL, NULL, 'Y'),
(20, '68', '2019-07-01', '2022-06-30', '', '', 4, 0, 0, 2, NULL, NULL, 'Y'),
(21, '71', '2019-08-01', '2022-07-31', '', '', 1, 0, 0, 2, NULL, NULL, 'Y'),
(22, '70', '2019-05-29', '2022-05-28', '', '', 1, 0, 0, 2, NULL, NULL, 'Y'),
(23, '67', '2019-09-17', '2022-09-16', '', '', 1, 0, 0, 1, NULL, NULL, 'Y'),
(24, '68', '2015-10-29', '2018-10-28', '', '', 1, 0, 0, 2, NULL, NULL, 'Y'),
(25, '81', '2021-10-05', '2024-10-04', '', '', 1, 0, 0, 2, NULL, NULL, 'Y'),
(26, '76', '2020-07-01', '2023-07-01', '', '', 1, 0, 0, 1, NULL, NULL, 'Y'),
(27, '76', '2021-12-06', '2024-12-05', '', '5196/UN6.L/TU.00/2021', 2, 0, 0, 1, NULL, NULL, 'Y'),
(28, '71', '2020-11-02', '2023-11-02', '', '', 3, 0, 0, 2, NULL, NULL, 'Y'),
(29, '71', '2014-03-10', '2017-03-09', '', '', 3, 0, 0, 2, NULL, NULL, 'Y'),
(30, '67', '2021-09-20', '2024-09-19', '', '637/PPs./Ak./XI/2021', 3, 0, 0, 2, NULL, NULL, 'Y'),
(31, '20', '2020-07-30', '2023-07-30', '', '', 2, 0, 0, 2, NULL, NULL, 'Y'),
(32, '21', '2021-10-12', '2024-10-11', '', '1388/PL41/HK.02.06/2021', 2, 0, 0, 2, NULL, NULL, 'Y'),
(33, '22', '2019-02-01', '2022-01-31', '', '', 2, 0, 0, 3, NULL, NULL, 'Y'),
(34, '23', '2012-06-04', '2015-06-04', '', '', 2, 0, 0, 2, NULL, NULL, 'Y'),
(35, '24', '2021-08-18', '2024-08-17', '', '', 4, 0, 0, 2, NULL, NULL, 'Y'),
(36, '24', '2021-08-18', '2024-08-17', '', '', 2, 0, 0, 2, NULL, NULL, 'Y'),
(37, '24', '2021-03-10', '2024-03-09', '', '', 8, 0, 0, 2, NULL, NULL, 'Y'),
(38, '25', '2019-12-16', '2022-12-15', '', '', 2, 0, 0, 2, NULL, NULL, 'Y'),
(39, '26', '2014-12-12', '2017-12-11', '', '', 2, 0, 0, 2, NULL, NULL, 'Y'),
(40, '27', '2020-01-08', '2023-01-07', '', '', 2, 0, 0, 2, NULL, NULL, 'Y'),
(41, '28', '2019-02-04', '2022-02-03', '', '', 2, 0, 0, 2, NULL, NULL, 'Y'),
(42, '67', '2021-09-20', '2024-09-19', '', '', 3, 0, 0, 1, NULL, NULL, 'Y'),
(43, '30', '2019-04-26', '2022-04-25', '', '', 2, 0, 0, 2, NULL, NULL, 'Y'),
(44, '31', '2019-04-08', '2022-04-07', '', '', 2, 0, 0, 2, NULL, NULL, 'Y'),
(45, '32', '2014-01-30', '2017-01-29', '', '', 2, 0, 0, 2, NULL, NULL, 'Y'),
(46, '33', '2012-09-07', '2015-09-07', '', '', 2, 0, 0, 3, NULL, NULL, 'Y'),
(47, '34', '2011-07-26', '2014-07-25', '', '', 2, 0, 0, 2, NULL, NULL, 'Y'),
(48, '35', '2012-05-03', '2015-05-03', '', '', 2, 0, 0, 2, NULL, NULL, 'Y'),
(49, '36', '2021-10-11', '2024-10-10', '', '756/D/BAHUK-STIKes/IX/2021', 2, 0, 0, 2, NULL, NULL, 'Y'),
(50, '37', '2020-11-02', '2023-11-02', '', '', 2, 0, 0, 0, NULL, NULL, 'Y'),
(51, '38', '2014-01-01', '2016-12-31', '', '', 2, 0, 0, 2, NULL, NULL, 'Y'),
(52, '39', '2021-08-08', '2024-08-07', '', '', 2, 0, 0, 2, NULL, NULL, 'Y'),
(53, '40', '2018-07-13', '2021-07-12', '', '', 2, 0, 0, 2, NULL, NULL, 'Y'),
(54, '41', '2018-09-29', '2021-09-28', '', '', 2, 0, 0, 2, NULL, NULL, 'Y'),
(55, '42', '2019-10-29', '2022-10-28', '', '', 2, 0, 0, 2, NULL, NULL, 'Y'),
(56, '43', '2019-03-26', '2022-03-25', '', '', 2, 0, 0, 2, NULL, NULL, 'Y'),
(57, '44', '2018-04-30', '2021-04-29', '', '', 2, 0, 0, 2, NULL, NULL, 'Y'),
(58, '45', '2020-12-01', '2023-12-01', '', '', 2, 0, 0, 2, NULL, NULL, 'Y'),
(59, '46', '2019-04-15', '2022-04-14', '', '', 2, 0, 0, 2, NULL, NULL, 'Y'),
(60, '47', '2011-03-21', '2014-03-20', '', '', 2, 0, 0, 2, NULL, NULL, 'Y'),
(61, '48', '2014-01-01', '2016-12-31', '', '', 2, 0, 0, 2, NULL, NULL, 'Y'),
(62, '49', '2019-01-04', '2022-01-03', '', '', 2, 0, 0, 0, NULL, NULL, 'Y'),
(63, '50', '2019-12-14', '2022-12-13', '', '', 2, 0, 0, 2, NULL, NULL, 'Y'),
(64, '51', '2015-04-06', '2018-04-05', '', '', 2, 0, 0, 3, NULL, NULL, 'Y'),
(65, '52', '2018-09-14', '2021-09-13', '', '', 2, 0, 0, 3, NULL, NULL, 'Y'),
(66, '53', '2021-09-08', '2024-09-07', '', '', 2, 0, 0, 3, NULL, NULL, 'Y'),
(67, '54', '2020-06-26', '2023-06-26', '', '', 2, 0, 0, 2, NULL, NULL, 'Y'),
(68, '55', '2020-12-15', '2023-12-15', '', '', 2, 0, 0, 2, NULL, NULL, 'Y'),
(69, '56', '2015-02-12', '2018-02-11', '', '', 2, 0, 0, 0, NULL, NULL, 'Y'),
(70, '57', '2014-01-01', '2016-12-31', '', '', 2, 0, 0, 2, NULL, NULL, 'Y'),
(71, '58', '2015-01-26', '2018-01-25', '', '', 2, 0, 0, 3, NULL, NULL, 'Y'),
(72, '59', '2014-03-03', '2017-03-02', '', '', 2, 0, 0, 2, NULL, NULL, 'Y'),
(73, '60', '2016-05-02', '2019-05-02', '', '', 2, 0, 0, 2, NULL, NULL, 'Y'),
(74, '61', '2020-12-21', '2023-12-21', '', '', 2, 0, 0, 3, NULL, NULL, 'Y'),
(75, '62', '2021-09-24', '2024-09-23', '', '', 2, 0, 0, 2, NULL, NULL, 'Y'),
(76, '63', '2018-11-26', '2021-11-25', '', '', 2, 0, 0, 0, NULL, NULL, 'Y'),
(77, '64', '2019-09-26', '2022-09-25', '', '', 2, 0, 0, 3, NULL, NULL, 'Y'),
(78, '65', '2012-02-15', '2015-02-14', '', '', 2, 0, 0, 2, NULL, NULL, 'Y'),
(79, '66', '2021-10-07', '2024-10-06', '', '', 2, 0, 0, 2, NULL, NULL, 'Y'),
(80, '72', '2020-11-18', '2023-11-18', '', '', 3, 0, 0, 1, NULL, NULL, 'Y'),
(81, '73', '2019-02-20', '2022-02-19', '', '', 2, 0, 0, 2, NULL, NULL, 'Y'),
(82, '74', '2019-03-11', '2022-03-10', '', '', 2, 0, 0, 2, NULL, NULL, 'Y'),
(83, '75', '2018-10-15', '2021-10-14', '', '', 2, 0, 0, 2, NULL, NULL, 'Y'),
(84, '77', '2019-03-28', '2022-03-27', '', '', 2, 0, 0, 2, NULL, NULL, 'Y'),
(85, '78', '2019-01-21', '2022-01-20', '', '', 2, 0, 0, 1, NULL, NULL, 'Y'),
(86, '79', '2020-11-12', '2023-11-12', '', '', 2, 0, 0, 1, NULL, NULL, 'Y'),
(87, '80', '2014-09-04', '2017-09-03', '', '', 2, 0, 0, 2, NULL, NULL, 'Y'),
(88, '81', '2014-01-01', '2016-12-31', '', '', 2, 0, 0, 1, NULL, NULL, 'Y'),
(89, '82', '2019-04-16', '2022-04-15', '', '', 2, 0, 0, 1, NULL, NULL, 'Y'),
(90, '85', '2021-11-22', '2024-11-21', '', '491/SKM/SSC-UPI Y.A.I/X/2021', 3, 0, 0, 2, NULL, NULL, 'Y');

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
  `nama_mentor_praktik` text NOT NULL,
  `email_mentor_praktik` text NOT NULL,
  `telp_mentor_praktik` text NOT NULL,
  `status_cek_praktik` text NOT NULL,
  `status_praktik` enum('Y','T') NOT NULL,
  `ket_tolak_praktik` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(1, 0, 0, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'ADMIN DIKLAT RS JIWA', 'admin@admin', '1', '08123145645', NULL, '2022-01-11', '2021-03-29', '2022-01-02', 'Y'),
(15, 1, 87, 'user', 'ee11cbb19052e40b07aac0ca060c23ee', 'USER INSTITUSI', 'asd@asd', '2', '091273', NULL, '2022-01-11', '2021-12-31', '2022-01-10', 'Y'),
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
-- Indeks untuk tabel `tb_harga`
--
ALTER TABLE `tb_harga`
  ADD PRIMARY KEY (`id_harga`);

--
-- Indeks untuk tabel `tb_harga_jenis`
--
ALTER TABLE `tb_harga_jenis`
  ADD PRIMARY KEY (`id_harga_jenis`);

--
-- Indeks untuk tabel `tb_harga_pilih`
--
ALTER TABLE `tb_harga_pilih`
  ADD PRIMARY KEY (`id_harga_pilih`);

--
-- Indeks untuk tabel `tb_harga_satuan`
--
ALTER TABLE `tb_harga_satuan`
  ADD PRIMARY KEY (`id_harga_satuan`);

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
  MODIFY `id_bayar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `tb_harga`
--
ALTER TABLE `tb_harga`
  MODIFY `id_harga` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT untuk tabel `tb_harga_jenis`
--
ALTER TABLE `tb_harga_jenis`
  MODIFY `id_harga_jenis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `tb_harga_pilih`
--
ALTER TABLE `tb_harga_pilih`
  MODIFY `id_harga_pilih` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tb_harga_satuan`
--
ALTER TABLE `tb_harga_satuan`
  MODIFY `id_harga_satuan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

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
  MODIFY `id_mou` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

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
  MODIFY `id_praktik` int(11) NOT NULL AUTO_INCREMENT;

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
-- AUTO_INCREMENT untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
