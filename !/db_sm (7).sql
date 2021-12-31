-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 31 Des 2021 pada 11.17
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
(8, 'Clinical science session (CSS)', 2, NULL, 37500, 'INPUT', 1, 1, 0, 0, 4, 1, NULL),
(9, 'Case report session (CRS)', 2, NULL, 37500, 'INPUT', 1, 1, 0, 0, 4, 1, NULL),
(10, 'Case base Discusion (CBD)', 2, NULL, 37500, 'INPUT', 1, 1, 0, 0, 4, 1, NULL),
(11, 'Pengayaan - Observasi', 2, NULL, 37500, 'INPUT', 1, 1, 0, 0, 4, 1, NULL),
(12, 'RPS (Resource Person Session)', 2, NULL, 37500, 'SEKALI', 1, 1, 0, 0, 4, 1, NULL),
(13, 'Bed side teaching (BST)- Visite Besar-Role Model - Pembimbingan Kedokteran Umum di IGD', 2, NULL, 37500, 'HARI-', 1, 1, 0, 0, 4, 1, NULL),
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
(26, 'Materi (TAK, Komunikasi Terapeutik, Dokumentasi Keperawatanan) ', 3, NULL, 150000, '3', 2, 2, 0, 0, 4, 1, NULL),
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
(40, 'Materi (TAK, Komunikasi Terapeutik, Dokumentasi Keperawatanan) ', 3, NULL, 150000, '3', 3, 3, 0, 0, 4, 1, NULL),
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
(54, 'Materi (TAK, Komunikasi Terapeutik, Dokumentasi Keperawatanan) ', 3, NULL, 150000, '3', 4, 0, 0, 0, 4, 1, NULL),
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

--
-- Dumping data untuk tabel `tb_harga_pilih`
--

INSERT INTO `tb_harga_pilih` (`id_harga_pilih`, `id_praktik`, `id_harga`, `tgl_input_harga_pilih`, `tgl_ubah_harga_pilih`, `frekuensi_harga_pilih`, `kuantitas_harga_pilih`, `jumlah_harga_pilih`) VALUES
(73, 7, 32, '2021-12-30', NULL, 1, 2, 40000),
(74, 7, 33, '2021-12-30', NULL, 1, 2, 40000),
(75, 7, 34, '2021-12-30', NULL, 1, 2, 40000),
(76, 7, 36, '2021-12-30', NULL, 1, 2, 300000),
(77, 7, 37, '2021-12-30', NULL, 1, 2, 40000),
(78, 7, 38, '2021-12-30', NULL, 1, 2, 20000),
(79, 7, 35, '2021-12-30', NULL, 1, 2, 150000),
(80, 7, 40, '2021-12-30', NULL, 3, 2, 900000),
(81, 7, 39, '2021-12-30', NULL, 1, 2, 300000),
(82, 7, 62, '2021-12-30', NULL, 1, 2, 150000),
(83, 7, 70, '2021-12-30', NULL, 1, 1, 1000000);

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
  `logo_institusi` text NOT NULL,
  `alamat_institusi` text NOT NULL,
  `ket_institusi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_institusi`
--

INSERT INTO `tb_institusi` (`id_institusi`, `nama_institusi`, `logo_institusi`, `alamat_institusi`, `ket_institusi`) VALUES
(1, 'AKADEMI PEREKEM MEDIS DAN INFORMATIKA KESEHATAN (APIKES) BANDUNG', '', '', ''),
(2, 'AKPER AL-MA\'ARIF BATURAJA', '', '', ''),
(3, 'AKPER BHAKTI KENCANA BANDUNG', '', '', ''),
(4, 'AKPER BIDARA MUKTI GARUT', '', '', ''),
(5, 'AKPER BUNTET PESANTREN CIREBON', '', '', ''),
(6, 'AKPER DUSTIRA CIMAHI', '', '', ''),
(7, 'AKPER PEMERINTAH KABUPATEN CIANJUR', '', '', ''),
(8, 'AKPER KEBONJATI', '', '', ''),
(9, 'AKPER LUWUK', '', '', ''),
(10, 'AKPER PEMBINA PALEMBANG', '', '', ''),
(11, 'AKPER PEMDA KOLAKA', '', '', ''),
(12, 'AKPER PEMKAB LAHAT', '', '', ''),
(13, 'AKPER RS. EFARINA PURWAKARTA', '', '', ''),
(14, 'AKPER SAIFUDDIN ZUHRI INDRAMAYU', '', '', ''),
(15, 'AKPER SAWERIGADING PEMDA LUWU RAYA PALOPO', '', '', ''),
(16, 'AKPER SINTANG', '', '', ''),
(17, 'AKPER TOLITOLI', '', '', ''),
(18, 'AKPER YPDR JAKARTA', '', '', ''),
(19, 'FAKULTAS KEDOKTERAN MARANATHA', '', '', ''),
(20, 'FAKULTAS KEDOKTERAN UKRIDA', '', '', ''),
(21, 'FAKULTAS KEDOKTERAN UNIVERSITAS ISLAM BANDUNG', '', '', ''),
(22, 'FAKULTAS KEDOKTERAN UNIVERSITAS JENDERAL AHMAD YANI CIMAHI', '', '', ''),
(23, 'FAKULTAS KEDOKTERAN UNPAD', '', '', ''),
(24, 'FAKULTAS KEPERAWATAN UNPAD', '', '', ''),
(25, 'FAKULTAS PSIKOLOGI UNJANI', '', '', ''),
(26, 'POLTEKKES KEMENKES BANDUNG KEPERAWATAN', '', '', ''),
(27, 'POLTEKKES TNI AU CIUMBULEUIT BANDUNG', '', '', ''),
(28, 'POLTEKKES BANTEN', '', '', ''),
(29, 'POLTEKKES KEMENKES MAKASSAR', '', '', ''),
(30, 'PROGRAM PASCA SARJANA UNIVERSITAS ISLAM BANDUNG', '', '', ''),
(31, 'STIKES AISYIYAH BANDUNG', '', '', ''),
(32, 'STIKES BANI SALEH', '', '', ''),
(33, 'STIKES BHAKTI PERTIWI LUWU RAYA PALOPO', '', '', ''),
(34, 'STIKES BINA PUTERA BANJAR', '', '', ''),
(35, 'STIKES BORNEO TARAKAN', '', '', ''),
(36, 'STIKES BUDILUHUR CIMAHI', '', '', ''),
(37, 'STIKES CIREBON', '', '', ''),
(38, 'STIKES DEHASEN BENGKULU', '', '', ''),
(39, 'STIKES DHARMA HUSADA BANDUNG', '', '', ''),
(40, 'STIKES FALETEHAN', '', '', ''),
(41, 'STIKES FORT DE KOCK', '', '', ''),
(42, 'STIKES IMMANUEL BANDUNG', '', '', ''),
(43, 'STIKES JENDERAL AHMAD YANI', '', '', ''),
(44, 'STIKES KARSA HUSADA GARUT', '', '', ''),
(45, 'STIKES KOTA SUKABUMI', '', '', ''),
(46, 'STIKES KUNINGAN', '', '', ''),
(47, 'STIKES MAHARDIKA CIREBON', '', '', ''),
(48, 'STIKES MEDIKA CIKARANG / IMDS', '', '', ''),
(49, 'STIKES MITRA KENCANA TASIKMALAYA', '', '', ''),
(50, 'STIKES MUHAMADIYAH CIAMIS', '', '', ''),
(51, 'STIKES NAN TONGGA LUBUK ALUNG', '', '', ''),
(52, 'STIKES PPNI JAWA BARAT', '', '', ''),
(53, 'STIKES RAJAWALI', '', '', ''),
(54, 'STIKES SANTO BORROMEUS', '', '', ''),
(55, 'STIKES SEBELAS APRIL SUMEDANG', '', '', ''),
(56, 'STIKES SYEDZA SAINTIKA PADANG', '', '', ''),
(57, 'STIKES TANA TORAJA', '', '', ''),
(58, 'STIKES YARSI BUKIT TINGGI', '', '', ''),
(59, 'STIKES YARSI PONTIANAK', '', '', ''),
(60, 'STIKES YPIB MAJALENGKA', '', '', ''),
(61, 'UNIVERSITAS ADVENT INDONESIA BANDUNG', '', '', ''),
(62, 'UNIVERSITAS BALE BANDUNG', '', '', ''),
(63, 'UNIVERSITAS BSI BANDUNG', '', '', ''),
(64, 'UNIVERSITAS GALUH CIAMIS', '', '', ''),
(65, 'UNIVERSITAS MUHAMMADIYAH SUKABUMI', '', '', ''),
(66, 'UNIVERSITAS NEGERI GORONTALO', '', '', ''),
(67, 'UNIVERSITAS PENDIDIKAN INDONESIA KAMPUS SUMEDANG', '', '', ''),
(68, 'UNIVERSITAS PENDIDIKAN INDONESIA KAMPUS SETIABUDI', '', '', ''),
(69, 'UNIVERSITAS RESPATI INDONESIA', '', '', ''),
(70, 'UNIVERSITAS SAMRATULANGI', '', '', ''),
(71, 'UNIVERSITAS SULTAN AGENG TIRTAYASA (UNTIRTA)', '', '', ''),
(72, 'POLITEKNIK TEDC BANDUNG', '', '', ''),
(73, 'UNIVERSITAS PELITA HARAPAN', '', '', ''),
(74, 'POLTEKKES YAPKESBI SUKABUMI', '', '', ''),
(75, 'AKPER YPIB MAJALENGKA', '', '', ''),
(76, 'UNIVERSITAS MUHAMMADIYAH TASIKMALAYA', '', '', ''),
(77, 'POLTEKKES KEMENKES BANDUNG FARMASI', '', '', ''),
(78, 'POLITEKNIK NEGERI SUBANG', '', '', ''),
(79, 'MAGISTER PSIKOLOGI PROFESI UNISBA', '', '', ''),
(80, 'FAKULTAS FARMASI UNIVERSITAS JENDERAL AHMAD YANI', '', '', ''),
(81, 'SEKOLAH TINGGI ILMU KESEHATAN INDONESIA MAJU', '', '', ''),
(82, 'UNIVERSITAS BHAKTI KENCANA (UBK)', '', '', ''),
(83, 'POLTEKKES KEMENKES JAYAPURA', '', '', ''),
(84, 'POLITEKNIK NEGERI INDRAMAYU', '', '', ''),
(85, 'UNIVERSITAS KRISTEN SATYA WACANA SALATIGA (PSIKOLOGI)', '', '', ''),
(86, 'FAKULTAS PSIKOLOGI MARANATHA', '', '', '');

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
(0, '-- Lainnya --', 0),
(1, 'Kedokteran', 1),
(2, 'Keperawatan', 2),
(3, 'Psikologi', 3),
(4, 'Farmasi', 3),
(5, 'Pekerja Sosial', 3),
(6, 'Rekam Medis', 3),
(7, 'IT', 4),
(15, 'SMA/SMK/MA Sederajat', 4);

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
(2, '197905022005012012', 'Aam Amalia, S.Kep., Ners (Struktural)', '0', 1, 8, 'Aktif'),
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
(44, '196608141991022004', 'dr. Hj. Elly Marliyani, Sp.KJ., M.K.M', '0', 3, 0, 'Tidak Aktif'),
(45, '196805271998032004', 'dr. Lenny Irawati Yohosua, Sp.KJ.', '0', 3, 0, 'Tidak Aktif'),
(46, '196607132007012005', 'dr. Hj. Meutia Laksaminingrum, Sp.KJ.', '0', 3, 0, 'Tidak Aktif'),
(47, '198302142015031001', 'dr. Ade Kurnia Surawijawa, Sp.KJ.', '0', 3, 0, 'Tidak Aktif'),
(48, '197507072005012006', 'dr. Lina Budiyanti, Sp.KJ. (K)', '0', 3, 0, 'Tidak Aktif'),
(49, '197707272006042026', 'dr. Dhian Indriasari, Sp.KJ.', '0', 3, 0, 'Tidak Aktif'),
(50, '197506082006041013', 'dr. Yunyun Setiawan, Sp.KJ.', '0', 3, 0, 'Tidak Aktif'),
(51, '196208081990011001', 'dr. H. Riza Putra, Sp.KJ.', '0', 3, 0, 'Tidak Aktif'),
(52, '201401065', 'dr. Hj. Lelly Resna N, Sp.KJ. (K)', '0', 3, 0, 'Tidak Aktif'),
(53, '198601052020122005', 'dr. Hilda Puspa Indah, Sp.KJ.', '0', 3, 0, 'Tidak Aktif'),
(54, '202101228', 'Hasrini Rowawi, dr., Sp.KJ (K)., MHA', '0', 4, 0, 'Tidak Aktif'),
(55, '197507072005012006', 'Lina Budiyanti, dr. Sp.KJ (K)', '0', 4, 0, 'Tidak Aktif'),
(56, '196805271998032004', 'Lenny Irawati Yohosua, dr. Sp.KJ.', '0', 4, 0, 'Tidak Aktif'),
(57, '198302142015031001', 'Ade Kurnia Surawijaya, dr. Sp.KJ.', '0', 4, 0, 'Aktif'),
(58, '197707272006042026', 'Dhian Indriasari, dr. Sp.KJ.', '0', 4, 0, 'Tidak Aktif'),
(59, '198103252011012004', 'Ekaprasetyawati, S.Si, Apt', '2', 2, 0, 'Tidak Aktif'),
(60, '196409251992031006', 'Drs. Tavip Budiawan, Apt', '2', 2, 0, 'Tidak Aktif'),
(61, '198601082010012013', 'Ema Marlina, Amd. PK', '11', 2, 0, 'Tidak Aktif'),
(62, '198102122005012013', 'Yeni Susanti, Amd. PK', '11', 2, 0, 'Aktif'),
(63, '196508051995022002', 'Dra. Resmi Prasetyani, Psi', '10', 2, 0, 'Tidak Aktif'),
(64, '197105071997032005', 'Dra. Lismaniar, Psi., M.Psi', '10', 2, 0, 'Tidak Aktif'),
(65, '198805212011011003', 'Irfan Arief Sulistyawan, Amd', '7', 2, 0, 'Tidak Aktif'),
(66, '197308081999032005', 'Yuyum Rohmulyanawati, S.Sos, MPSSp', '24', 2, 0, 'Aktif'),
(67, '198010022006042015', 'Ani Kartini, ST', '6', 2, 0, 'Aktif'),
(68, '197902192011012001', 'Indah Kusuma Dewi, dr., SpKJ', '0', 3, 0, 'Tidak Aktif');

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
(1, 'Mess RSJ 1 Lama', 0, 0, 16, 'Jl. Kolonel Maturi KM.7, Desa Jambudipa, Kec. Cisarua, Kab. Bandung Barat, 40551', 'RS Jiwa Provinsi Jawa Barat', '081321329101', '', 20000, 100000, 0, 'Makan 3x Sehari', 'Aktif'),
(2, 'Mess RSJ 2 Baru', 0, 0, 16, 'Jl. Kolonel Maturi KM.7, Desa Jambudipa, Kec. Cisarua, Kab. Bandung Barat, 40551', 'RS Jiwa Provinsi Jawa Barat', '081321329101', '', 20000, 100000, 0, '', 'Aktif'),
(3, 'Asrama Rifa Corporate', 0, 0, 100, 'Kp. Panyandaan RT. 01 RW. 14 Desa Jambudipa Kecamatan Cisarua Kab. Bandung Barat', 'Ibu Ai', '081322629909', '', 20000, 80000, 0, 'Dengan Makan 3x Sehari', 'Aktif'),
(4, 'Pondokan H. Ating', 0, 0, 100, 'Kp. Barukai Timur RT. 04 RW. 13 Desa Jambudipa Kecamatan Cisarua Kab. Bandung Barat', 'H. Ating / Hj. Siti Sutiah', '0', '', 0, 0, 0, '', 'Aktif'),
(5, 'Wisma Anugrah Ibu Nanik', 0, 0, 70, 'Kp. Panyandaan RT. 01 RW. 14 Desa Jambudipa Kecamatan Cisarua Kab. Bandung Barat', 'Hj. Nanik Susiani', '081320719652', '', 15000, 70000, 0, '', 'Aktif'),
(6, 'Pondokan dr. Hj. Meutia Laksminingrum', 0, 0, 0, '-', 'dr. Hj. Meutia Laksminingrum', '0', '', 0, 0, 0, '', 'Aktif'),
(7, 'Galuh Pakuan', 0, 0, 70, 'Kp. Panyandaan RT. 01 RW. 14 Desa Jambudipa Kecamatan Cisarua Kab. Bandung Barat', 'Oyo Suharya', '081320113399', '', 20000, 0, 0, '', 'Aktif'),
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
  `jumlah_mess_pilih` int(11) NOT NULL,
  `total_harga_mess_pilih` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_mou`
--

CREATE TABLE `tb_mou` (
  `id_mou` int(11) NOT NULL,
  `id_institusi` text NOT NULL,
  `tgl_mulai_mou` date NOT NULL,
  `tgl_selesai_mou` date NOT NULL,
  `no_rsj_mou` text NOT NULL,
  `no_institusi_mou` text NOT NULL,
  `id_jurusan_pdd` int(11) DEFAULT NULL,
  `id_spesifikasi_pdd` int(11) DEFAULT NULL,
  `id_jenjang_pdd` int(11) DEFAULT NULL,
  `id_akreditasi` int(11) DEFAULT NULL,
  `file_mou` text DEFAULT NULL,
  `ket_mou` text NOT NULL,
  `institusi_mou` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_mou`
--

INSERT INTO `tb_mou` (`id_mou`, `id_institusi`, `tgl_mulai_mou`, `tgl_selesai_mou`, `no_rsj_mou`, `no_institusi_mou`, `id_jurusan_pdd`, `id_spesifikasi_pdd`, `id_jenjang_pdd`, `id_akreditasi`, `file_mou`, `ket_mou`, `institusi_mou`) VALUES
(2, '2', '2014-02-13', '2017-02-12', '- ', '-', 0, 0, 0, 0, NULL, '', ''),
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
(24, '24', '2014-11-14', '2017-11-13', '-', '-', 0, 0, 0, 0, NULL, '', ''),
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
(126, '1', '2022-01-02', '2024-01-02', '-', '-', 1, 1, 8, 1, '', '-', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_praktik`
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
  `status_praktik` enum('Y','T') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_praktik`
--

INSERT INTO `tb_praktik` (`id_praktik`, `id_mou`, `id_institusi`, `nama_praktik`, `tgl_input_praktik`, `tgl_ubah_praktik`, `tgl_mulai_praktik`, `tgl_selesai_praktik`, `jumlah_praktik`, `surat_praktik`, `data_praktik`, `id_jurusan_pdd_jenis`, `id_jurusan_pdd`, `id_jenjang_pdd`, `id_spesifikasi_pdd`, `id_akreditasi`, `id_user`, `nama_mentor_praktik`, `email_mentor_praktik`, `telp_mentor_praktik`, `status_cek_praktik`, `status_praktik`) VALUES
(2, 71, 71, 'Vitae nihil libero s', '2021-12-30', '2021-12-30', '1978-10-18', '1996-03-11', 73, './_file/praktikan/surat_praktik_2_2021-12-30.pdf', './_file/praktikan/data_praktik_2_2021-12-30.xlsx', 1, '1', '9', '4', '2', '1', 'Aut ut necessitatibu', 'juduqeca@mailinator.com', '19', 'DAFTAR', 'T'),
(4, 20, 20, 'Kelompok 2 Gelombang III', '2021-12-05', '2021-12-28', '2021-11-24', '2021-12-31', 10, './_file/praktikan/surat_praktik_1_2021-11-23.pdf', './_file/praktikan/data_praktik_1_2021-11-23.xlsx', 1, '1', '0', '1', '1', '1', 'ADMIN', '-', '08123150000', 'DAFTAR', 'Y'),
(5, 80, 80, 'Kelompok 3', '2021-12-05', '2021-12-21', '2021-12-31', '2021-12-31', 20, './_file/praktikan/surat_praktik_1_2021-11-23.pdf', './_file/praktikan/data_praktik_1_2021-11-23.xlsx', 2, '2', '6', '0', '1', '1', 'ADMIN', '-', '08123150000', 'DAFTAR', 'Y'),
(6, 5, 5, 'Kelompok 3 Gel. III', '2021-12-03', NULL, '2021-12-13', '2022-01-13', 25, './_file/praktikan/surat_praktik_1_2021-12-03.pdf', './_file/praktikan/data_praktik_1_2021-12-03.xlsx', 3, '4', '6', '0', '1', '1', 'ADMIN', '-', '08123145645', 'DAFTAR', 'Y'),
(7, 78, 78, 'Grup 2-2020', '2021-12-06', '2021-12-21', '2021-12-02', '2021-12-09', 2, './_file/praktikan/surat_praktik_1_2021-12-06.pdf', './_file/praktikan/data_praktik_1_2021-12-06.xlsx', 3, '3', '8', '0', '2', '1', 'ADMIN', '-', '08123145645', 'HARGA', 'Y');

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
(3, 'Praktek Kerja Lapangan (PKL)'),
(4, 'Magang'),
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
(24, 'Kesehatan Jiwa Masyarakat (KESWAMAS)');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(11) NOT NULL,
  `id_institusi` int(11) NOT NULL,
  `username_user` text NOT NULL,
  `password_user` varchar(255) NOT NULL,
  `nama_user` varchar(20) NOT NULL,
  `email_user` text NOT NULL,
  `level_user` int(11) NOT NULL,
  `no_telp_user` text NOT NULL,
  `terakhir_login_user` date NOT NULL,
  `tgl_buat_user` date NOT NULL,
  `status_user` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `id_institusi`, `username_user`, `password_user`, `nama_user`, `email_user`, `level_user`, `no_telp_user`, `terakhir_login_user`, `tgl_buat_user`, `status_user`) VALUES
(1, 0, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'ADMIN', '-', 1, '08123145645', '0000-00-00', '2021-03-29', 'Y'),
(9, 7, 'fajar', '81dc9bdb52d04dc20036dbd8313ed055', 'Fajar Rachmat H.', 'fajar.rachmat.h@gmail.com', 2, '091273098y123', '0000-00-00', '2021-11-11', 'Y');

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
-- Indeks untuk tabel `tb_praktik`
--
ALTER TABLE `tb_praktik`
  ADD PRIMARY KEY (`id_praktik`);

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
  MODIFY `id_bayar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
  MODIFY `id_harga_pilih` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

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
  MODIFY `id_mess_pilih` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tb_mou`
--
ALTER TABLE `tb_mou`
  MODIFY `id_mou` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=127;

--
-- AUTO_INCREMENT untuk tabel `tb_praktik`
--
ALTER TABLE `tb_praktik`
  MODIFY `id_praktik` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `tb_spesifikasi_pdd`
--
ALTER TABLE `tb_spesifikasi_pdd`
  MODIFY `id_spesifikasi_pdd` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
