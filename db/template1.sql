-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3307
-- Waktu pembuatan: 12 Mar 2021 pada 14.48
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `template1`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `kode_admin` char(16) NOT NULL,
  `nama` varchar(225) NOT NULL,
  `email` varchar(225) NOT NULL,
  `pass` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id`, `kode_admin`, `nama`, `email`, `pass`) VALUES
(1, 'AD1', 'Admin', 'admin@gmail.com', '202cb962ac59075b964b07152d234b70');

--
-- Trigger `admin`
--
DELIMITER $$
CREATE TRIGGER `Before_Insert_User` BEFORE INSERT ON `admin` FOR EACH ROW BEGIN
        IF(
            EXISTS(
            SELECT
                *
            FROM
                admin
            WHERE
               email = NEW.email
        )
        ) THEN SIGNAL SQLSTATE
    VALUE
        '45000'
    SET MESSAGE_TEXT
        = 'Duplicate email found' ;
    END IF ;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `Delete_Forbidd` BEFORE DELETE ON `admin` FOR EACH ROW SIGNAL SQLSTATE '45000'
SET MESSAGE_TEXT
    = 'table t1 does not support deletion'
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `anggota`
--

CREATE TABLE `anggota` (
  `no` int(11) NOT NULL,
  `no_peserta` char(16) NOT NULL,
  `nama_peserta` varchar(50) NOT NULL,
  `jenis_kelamin` char(10) NOT NULL,
  `tempat_lahir` varchar(20) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `agama` char(12) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `telp` char(12) NOT NULL,
  `email` char(50) NOT NULL,
  `pass` char(225) NOT NULL,
  `foto` varchar(20) NOT NULL,
  `ijazah` char(3) NOT NULL,
  `path` varchar(100) NOT NULL,
  `status_berkas` char(16) NOT NULL,
  `score` int(10) NOT NULL,
  `keterangan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `anggota`
--

INSERT INTO `anggota` (`no`, `no_peserta`, `nama_peserta`, `jenis_kelamin`, `tempat_lahir`, `tanggal_lahir`, `agama`, `alamat`, `telp`, `email`, `pass`, `foto`, `ijazah`, `path`, `status_berkas`, `score`, `keterangan`) VALUES
(1, '17630974', 'Muhammad Ilham Akbar', 'Laki-Laki', 'Banjarmasin', '1996-02-06', 'Islam', 'Jl. H. Anang Adenansi Gg. Hikmah NO.29 RT.19', '081250949444', 'ilhamakbar79@gmail.com', '202cb962ac59075b964b07152d234b70', '12345.jpg', 'S3', './assets/Berkas/muhammad_ilham_akbar/', 'valid', 100, '3C'),
(2, '16051115', 'Siti Lestari', 'Perempuan', '', '0000-00-00', 'Islam', 'Jl Kembang Mawar No 13', '081355789001', 'siti1@gmail.com', '7cbb3252ba6b7e9c422fac5334d22054', '', '', './assets/Berkas/siti_lestari/', '', 0, 'belum'),
(3, '20200003', 'Adrian', 'Laki-Laki', '', '0000-00-00', 'Islam', 'Jl. Sultan Adam', '081345613466', 'adrian@gmail.com', '76d80224611fc919a5d54f0ff9fba446', '', '', './assets/Berkas/Adrian/', '', 0, 'belum'),
(4, '20200004', 'Maya', 'Perempuan', '', '0000-00-00', 'Islam', 'Jl. Gatot Subroto', '083255578009', 'maya@gmail.com', '22c276a05aa7c90566ae2175bcc2a9b0', '', '', './assets/Berkas/Maya/', '', 0, 'belum'),
(6, '20200005', 'satou', 'Laki-Laki', '', '0000-00-00', 'Islam', 'Jl. sudirman', '083343215432', 'satou@gmail.com', '900150983cd24fb0d6963f7d28e17f72', '', '', './assets/Berkas/satou', '', 0, 'belum'),
(10, '20200007', 'Haris', 'Laki-Laki', '', '0000-00-00', 'Islam', 'Jl. Sultan Adam', '081250888999', 'haris@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '', '', './assets/Berkas/Haris', '', 0, 'belum'),
(11, '20200011', 'Nana', 'Perempuan', '', '0000-00-00', 'Islam', 'Jl. H. Hasan Basri Kayutangi', '085267448012', 'nana@gmail.com', '900150983cd24fb0d6963f7d28e17f72', '', '', './assets/Berkas/Nana', '', 0, 'belum'),
(13, '20200013', 'Eliza Rochiette', 'Perempuan', '', '0000-00-00', 'Katholik', 'Jl. Ahmad Yani KM 4', '087800957813', 'eliza@gmail.com', '900150983cd24fb0d6963f7d28e17f72', '', '', './assets/Berkas/Eliza Rochiette', '', 0, 'belum'),
(22, '20200014', 'Hermawati', 'Perempuan', '', '0000-00-00', 'Islam', 'Jl. Pekapuran Raya', '081356741179', 'hermawati@gmail.com', '900150983cd24fb0d6963f7d28e17f72', '', '', './assets/Berkas/Hermawati', '', 0, 'belum'),
(23, '20200023', 'Ibrahim', 'Laki-Laki', '', '0000-00-00', 'Islam', 'Jl. Rawasari Raya', '081320102020', 'ibrahim@gmail.com', '900150983cd24fb0d6963f7d28e17f72', '', '', './assets/Berkas/Ibrahim', '', 0, 'belum'),
(29, '20200024', 'Pak Budi', 'Laki-Laki', 'Banjarmasin', '2021-01-10', 'islam', 'jl. banjarmasin', '081509402213', 'budi@gmail.com', '202cb962ac59075b964b07152d234b70', '1610337847.jpg', '', './assets/Berkas/Pak_Budi', '', 0, 'belum'),
(30, '20200030', 'Budi Ramadhani', 'Laki-Laki', 'Banjarmasin', '2021-01-10', 'islam', 'jl. banjarmasin', '081509402213', 'budiramadhani@gmail.com', '202cb962ac59075b964b07152d234b70', '1610367859.jpg', '', './assets/Berkas/Budi_Ramadhani', '', 0, 'belum'),
(35, '20200035', 'Pendaftar baru', 'Laki-Laki', 'Banjarmasin', '2021-01-20', 'islam', 'jl. banjarmasin', '081509402213', 'baru@gmail.com', '202cb962ac59075b964b07152d234b70', '5_kecil.jpg', '', './assets/berkas/Pendaftar_baru', '', 0, 'belum'),
(41, '20200036', 'Fitra', 'Perempuan', 'Banjarmasin', '2021-02-06', 'Islam', 'Jl. Banjarmasin', '081349453337', 'Fitra@gmail.com', '202cb962ac59075b964b07152d234b70', 'Biru_Kecil.jpg', '', './assets/berkas/Fitra', '', 0, 'belum'),
(42, '20200042', 'bayu', 'Laki-Laki', 'Banjarmasin', '2021-02-04', 'Islam', 'Jl. Banjarmasin', '081349453337', 'bayu@gmail.com', '202cb962ac59075b964b07152d234b70', 'Biru_Kecil.jpg', '', './assets/berkas/bayu', '', 0, 'belum'),
(47, '20200043', 'Abu', 'Laki-Laki', 'Banjarmasin', '2021-03-10', 'Islam', 'Jl. Banjarmasin', '08150949444', 'Abu@gmail.com', '202cb962ac59075b964b07152d234b70', 'Biru_Kecil.jpg', 'S2', './assets/berkas/Abu', 'valid', 100, '3B');

-- --------------------------------------------------------

--
-- Struktur dari tabel `batas`
--

CREATE TABLE `batas` (
  `no` int(11) NOT NULL,
  `kode_admin` char(16) NOT NULL,
  `nama_admin` varchar(50) NOT NULL,
  `jumlah_peserta` int(100) NOT NULL,
  `batas` int(10) NOT NULL,
  `tanggal_upload` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `batas`
--

INSERT INTO `batas` (`no`, `kode_admin`, `nama_admin`, `jumlah_peserta`, `batas`, `tanggal_upload`) VALUES
(1, 'AD1', 'Admin', 0, 3, '2021-03-08'),
(2, 'AD1', 'Admin', 16, 6, '2021-03-09');

-- --------------------------------------------------------

--
-- Struktur dari tabel `berkas`
--

CREATE TABLE `berkas` (
  `no` int(11) NOT NULL,
  `no_peserta` char(16) NOT NULL,
  `nama_peserta` varchar(50) NOT NULL,
  `no_berkas` char(30) NOT NULL,
  `nama_berkas` varchar(100) NOT NULL,
  `jenis_berkas` char(10) NOT NULL,
  `sarjana` char(3) NOT NULL,
  `fakultas` varchar(50) NOT NULL,
  `kegiatan` varchar(100) NOT NULL,
  `jumlah_sks` int(10) NOT NULL,
  `tempat_berkas` varchar(100) NOT NULL,
  `tanggal_berkas` date NOT NULL,
  `tahun_upload` char(10) NOT NULL,
  `path` varchar(100) NOT NULL,
  `keterangan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `berkas`
--

INSERT INTO `berkas` (`no`, `no_peserta`, `nama_peserta`, `no_berkas`, `nama_berkas`, `jenis_berkas`, `sarjana`, `fakultas`, `kegiatan`, `jumlah_sks`, `tempat_berkas`, `tanggal_berkas`, `tahun_upload`, `path`, `keterangan`) VALUES
(1, '17630974', 'Muhammad Ilham Akbar', '1223eas', '1c4167fda3226ebc5e4d4e727001bd53.pdf', 'ijazah', 'S1', '', '', 0, 'Universitas Brawijaya', '2021-03-01', '2021', './assets/berkas/Muhammad_Ilham_Akbar/2021', 'benar'),
(3, '17630974', 'Muhammad Ilham Akbar', 'ABCDEFG', 'Daftar_Fakultas_6.pdf', 'ijazah', 'S2', '', '', 0, 'Universitas Islam', '2021-02-02', '2021', './assets/berkas/Muhammad_Ilham_Akbar/2021', 'benar'),
(4, '17630974', 'Muhammad Ilham Akbar', '1Q2W3E', 'Daftar_Fakultas_5.pdf', 'sk', '', '', '', 24, 'Universitas Brawijaya', '2021-01-02', '2021', './assets/berkas/Muhammad_Ilham_Akbar/2021', 'belum'),
(5, '17630974', 'Muhammad Ilham Akbar', 'ZZXXCC', 'Daftar_Crips_2.pdf', 'penelitian', '', '', '', 0, 'Universitas Brawijaya', '2021-01-09', '2021', './assets/berkas/Muhammad_Ilham_Akbar/2021', 'belum'),
(6, '17630974', 'Muhammad Ilham Akbar', 'QAZWSX', 'Daftar_Gagal_3.pdf', 'pengabdian', '', '', '', 0, 'Universitas Brawijaya', '2021-02-06', '2021', './assets/berkas/Muhammad_Ilham_Akbar/2021', 'belum'),
(7, '17630974', 'Muhammad Ilham Akbar', '11qqaazz', 'Laporan Jumlah Pendaftar_36.pdf', 'sertifikat', '', '', '', 0, 'Universitas Brawijaya', '2021-02-11', '2021', './assets/berkas/Muhammad_Ilham_Akbar/2021', 'belum'),
(9, '17630974', 'Muhammad Ilham Akbar', 'CAZES', 'Laporan Jumlah Pendaftar_40.pdf', 'ijazah', 'S3', '', '', 0, 'Universitas Brawijaya', '2021-03-07', '2021', './assets/berkas/Muhammad_Ilham_Akbar/2021', 'benar'),
(21, '20200043', 'Abu', '12345', '1c4167fda3226ebc5e4d4e727001bd53.pdf', 'ijazah', 'S1', 'Fakultas Ekonomi', '', 0, 'Universitas Lambung Mangkurat', '2021-02-10', '2021', './assets/berkas/Abu/2021', 'benar'),
(22, '20200043', 'Abu', '54321', 'Daftar_Kriteria_2.pdf', 'ijazah', 'S2', 'Fakultas Ekonomi', '', 0, 'Universitas Lambung Mangkurat', '2021-01-05', '2021', './assets/berkas/Abu/2021', 'benar'),
(23, '20200043', 'Abu', '123', 'Daftar_kinerja.pdf', 'sk', '', '', 'Kuliah S1 : Pendahuluan', 20, 'Universitas Lambung Mangkurat', '2021-03-03', '2021', './assets/berkas/Abu/2021', 'benar'),
(24, '20200043', 'Abu', '4321', 'Daftar_Nilai_2.pdf', 'penelitian', '', '', '', 0, 'Universitas Lambung Mangkurat', '2021-03-03', '2021', './assets/berkas/Abu/2021', 'benar'),
(25, '20200043', 'Abu', '123', 'Daftar_Nilai_5.pdf', 'pengabdian', '', '', '', 0, 'Universitas Lambung Mangkurat', '2021-03-04', '2021', './assets/berkas/Abu/2021', 'benar'),
(26, '20200043', 'Abu', '9876', 'Daftar_Fakultas_9.pdf', 'sertifikat', '', '', '', 0, 'Universitas Lambung Mangkurat', '2021-03-04', '2021', './assets/berkas/Abu/2021', 'benar');

-- --------------------------------------------------------

--
-- Struktur dari tabel `crips`
--

CREATE TABLE `crips` (
  `no` int(11) NOT NULL,
  `nama_kriteria` varchar(50) CHARACTER SET latin1 NOT NULL,
  `nama_crips` varchar(50) CHARACTER SET latin1 NOT NULL,
  `nilai` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `crips`
--

INSERT INTO `crips` (`no`, `nama_kriteria`, `nama_crips`, `nilai`) VALUES
(1, 'Pendidikan Terakhir', 'S2', 5),
(2, 'Pendidikan Terakhir', 'S3', 10),
(3, 'Memiliki Prestasi', 'Tidak', 1),
(4, 'Memiliki Prestasi', 'Ya', 10),
(5, 'Score Kinerja', 'Di bawah 70', 1),
(8, 'Score Kinerja', 'Sama atau Di atas 70', 10),
(9, 'Nilai Akhir', 'Di bawah 250', 1),
(10, 'Nilai Akhir', 'Sama atau Di atas 250 dan Di bawah350', 5),
(11, 'Nilai Akhir', 'Sama atau Di atas 350 Di bawah 450', 7),
(12, 'Nilai Akhir', 'Sama atau Di atas 450', 10),
(13, 'Pendidikan Terakhir', 'S1', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `gagal`
--

CREATE TABLE `gagal` (
  `no` int(11) NOT NULL,
  `no_peserta` char(16) CHARACTER SET latin1 NOT NULL,
  `nama_peserta` varchar(50) CHARACTER SET latin1 NOT NULL,
  `jenis_kelamin` char(10) NOT NULL,
  `keterangan` char(10) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `gagal`
--

INSERT INTO `gagal` (`no`, `no_peserta`, `nama_peserta`, `jenis_kelamin`, `keterangan`) VALUES
(1, '16051115', 'Siti Lestari', 'Perempuan', 'gagal');

-- --------------------------------------------------------

--
-- Struktur dari tabel `identitas`
--

CREATE TABLE `identitas` (
  `no` int(11) NOT NULL,
  `no_peserta` char(16) NOT NULL,
  `nama_peserta` varchar(50) NOT NULL,
  `nik` char(16) NOT NULL,
  `nidn` char(16) NOT NULL,
  `jenis_kelamin` char(10) NOT NULL,
  `ttl` varchar(50) NOT NULL,
  `pangkat` char(10) NOT NULL,
  `jabatan` varchar(20) NOT NULL,
  `ijazah` char(3) NOT NULL,
  `fakultas` varchar(50) NOT NULL,
  `departemen` varchar(50) NOT NULL,
  `berkas` varchar(100) NOT NULL,
  `path` varchar(100) NOT NULL,
  `keterangan` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `identitas`
--

INSERT INTO `identitas` (`no`, `no_peserta`, `nama_peserta`, `nik`, `nidn`, `jenis_kelamin`, `ttl`, `pangkat`, `jabatan`, `ijazah`, `fakultas`, `departemen`, `berkas`, `path`, `keterangan`) VALUES
(1, '20200043', 'Abu', '12345678911', '98765432199', 'Laki-Laki', 'Banjarmasin / 2021-01-10', '3B', '-', 'S2', 'Ekonomi', 'Akuntansi', 'Daftar_Lulus_4.pdf', './assets/berkas/Abu/2021', 'benar');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kinerja`
--

CREATE TABLE `kinerja` (
  `no` int(11) NOT NULL,
  `nama_kinerja` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kinerja`
--

INSERT INTO `kinerja` (`no`, `nama_kinerja`) VALUES
(1, 'Identitas'),
(3, 'kinerja bidang pendidikan'),
(4, 'kenerja bidang penelitian'),
(5, 'kinerja pegabdian kepada masyarkat'),
(6, 'kinerja penunjang lain');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kinerja_peserta`
--

CREATE TABLE `kinerja_peserta` (
  `no` int(11) NOT NULL,
  `no_peserta` char(16) NOT NULL,
  `nama_peserta` varchar(50) NOT NULL,
  `jenis_kelamin` char(10) NOT NULL,
  `nama_kinerja` varchar(50) NOT NULL,
  `score` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kinerja_peserta`
--

INSERT INTO `kinerja_peserta` (`no`, `no_peserta`, `nama_peserta`, `jenis_kelamin`, `nama_kinerja`, `score`) VALUES
(1, '17630974', 'Muhammad Ilham Akbar', 'Laki-Laki', 'Identitas', 100),
(2, '17630974', 'Muhammad Ilham Akbar', 'Laki-Laki', 'kinerja bidang pendidikan', 100),
(3, '17630974', 'Muhammad Ilham Akbar', 'Laki-Laki', 'kenerja bidang penelitian', 100),
(4, '17630974', 'Muhammad Ilham Akbar', 'Laki-Laki', 'kinerja pegabdian kepada masyarkat', 100),
(5, '17630974', 'Muhammad Ilham Akbar', 'Laki-Laki', 'kinerja penunjang lain', 100),
(6, '20200043', 'Abu', 'Laki-Laki', 'Identitas', 100),
(7, '20200043', 'Abu', 'Laki-Laki', 'kinerja bidang pendidikan', 100),
(8, '20200043', 'Abu', 'Laki-Laki', 'kenerja bidang penelitian', 100),
(9, '20200043', 'Abu', 'Laki-Laki', 'kinerja pegabdian kepada masyarkat', 100),
(10, '20200043', 'Abu', 'Laki-Laki', 'kinerja penunjang lain', 100);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kriteria`
--

CREATE TABLE `kriteria` (
  `no` int(11) NOT NULL,
  `kode` char(5) CHARACTER SET latin1 NOT NULL,
  `nama_kriteria` varchar(50) CHARACTER SET latin1 NOT NULL,
  `Tipe` char(3) CHARACTER SET latin1 NOT NULL,
  `bobot` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kriteria`
--

INSERT INTO `kriteria` (`no`, `kode`, `nama_kriteria`, `Tipe`, `bobot`) VALUES
(1, 'C1', 'Pendidikan Terakhir', 'MAX', 0.25),
(2, 'C2', 'Memiliki Prestasi', 'MAX', 0.3),
(3, 'C3', 'Score Kinerja', 'MAX', 0.3),
(4, 'C4', 'Nilai Akhir', 'MAX', 0.15);

-- --------------------------------------------------------

--
-- Struktur dari tabel `lulus`
--

CREATE TABLE `lulus` (
  `no` int(11) NOT NULL,
  `no_peserta` char(16) CHARACTER SET latin1 NOT NULL,
  `nama_peserta` varchar(50) CHARACTER SET latin1 NOT NULL,
  `jenis_kelamin` char(10) NOT NULL,
  `keterangan` char(10) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `lulus`
--

INSERT INTO `lulus` (`no`, `no_peserta`, `nama_peserta`, `jenis_kelamin`, `keterangan`) VALUES
(1, '20200007', 'Haris', 'Laki-Laki', 'lulus'),
(2, '20200003', 'Adrian', 'Laki-Laki', 'lulus'),
(3, '20200043', 'Abu', 'Laki-Laki', 'lulus'),
(4, '20200004', 'Maya', 'Perempuan', 'lulus'),
(5, '17630974', 'Muhammad Ilham Akbar', 'Laki-Laki', 'lulus'),
(6, '20200005', 'satou', 'Laki-Laki', 'lulus');

-- --------------------------------------------------------

--
-- Struktur dari tabel `nilai`
--

CREATE TABLE `nilai` (
  `no` int(11) NOT NULL,
  `peserta` varchar(50) NOT NULL,
  `no_peserta` char(16) NOT NULL,
  `jenis_kelamin` char(10) NOT NULL,
  `nama_kriteria` varchar(50) NOT NULL,
  `nama_crips` varchar(50) NOT NULL,
  `nilai` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `nilai`
--

INSERT INTO `nilai` (`no`, `peserta`, `no_peserta`, `jenis_kelamin`, `nama_kriteria`, `nama_crips`, `nilai`) VALUES
(1, 'Muhammad Ilham Akbar', '17630974', 'Laki-Laki', 'Pendidikan Terakhir', 'S1', 1),
(2, 'Muhammad Ilham Akbar', '17630974', 'Laki-Laki', 'Memiliki Prestasi', 'Ya', 10),
(3, 'Muhammad Ilham Akbar', '17630974', 'Laki-Laki', 'Score Kinerja', 'Sama atau Di atas 100 dan Di bawah200', 5),
(4, 'Muhammad Ilham Akbar', '17630974', 'Laki-Laki', 'Nilai Akhir', 'Sama atau Di atas 350 Di bawah 450', 7),
(5, 'Siti Lestari', '16051115', 'Perempuan', 'Pendidikan Terakhir', 'S1', 1),
(6, 'Siti Lestari', '16051115', 'Perempuan', 'Memiliki Prestasi', 'Tidak', 1),
(7, 'Siti Lestari', '16051115', 'Perempuan', 'Score Kinerja', 'Di bawah 100', 1),
(8, 'Siti Lestari', '16051115', 'Perempuan', 'Nilai Akhir', 'Sama atau Di atas 250 dan Di bawah350', 5),
(9, 'Adrian', '20200003', 'Laki-Laki', 'Pendidikan Terakhir', 'S3', 10),
(10, 'Adrian', '20200003', 'Laki-Laki', 'Memiliki Prestasi', 'Ya', 10),
(11, 'Adrian', '20200003', 'Laki-Laki', 'Score Kinerja', 'Sama atau Di atas 200 Di bawah 300', 7),
(12, 'Adrian', '20200003', 'Laki-Laki', 'Nilai Akhir', 'Sama atau Di atas 450', 10),
(13, 'Maya', '20200004', 'Perempuan', 'Pendidikan Terakhir', 'S2', 5),
(14, 'Maya', '20200004', 'Perempuan', 'Memiliki Prestasi', 'Ya', 10),
(15, 'Maya', '20200004', 'Perempuan', 'Score Kinerja', 'Sama atau Di atas 100 dan Di bawah200', 5),
(16, 'Maya', '20200004', 'Perempuan', 'Nilai Akhir', 'Sama atau Di atas 250 dan Di bawah350', 5),
(17, 'satou', '20200005', 'Laki-Laki', 'Pendidikan Terakhir', 'S1', 1),
(18, 'satou', '20200005', 'Laki-Laki', 'Memiliki Prestasi', 'Tidak', 1),
(19, 'satou', '20200005', 'Laki-Laki', 'Score Kinerja', 'Sama atau Di atas 100 dan Di bawah200', 5),
(20, 'satou', '20200005', 'Laki-Laki', 'Nilai Akhir', 'Sama atau Di atas 250 dan Di bawah350', 5),
(21, 'Haris', '20200007', 'Laki-Laki', 'Pendidikan Terakhir', 'S3', 10),
(22, 'Haris', '20200007', 'Laki-Laki', 'Memiliki Prestasi', 'Ya', 10),
(23, 'Haris', '20200007', 'Laki-Laki', 'Score Kinerja', 'Sama atau Di atas 300', 10),
(24, 'Haris', '20200007', 'Laki-Laki', 'Nilai Akhir', 'Sama atau Di atas 450', 10),
(33, 'Abu', '20200043', 'Laki-Laki', 'Pendidikan Terakhir', 'S2', 5),
(34, 'Abu', '20200043', 'Laki-Laki', 'Memiliki Prestasi', 'Ya', 10),
(35, 'Abu', '20200043', 'Laki-Laki', 'Score Kinerja', 'Sama atau Di atas 70', 10),
(36, 'Abu', '20200043', 'Laki-Laki', 'Nilai Akhir', 'Sama atau Di atas 350 Di bawah 450', 7);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pesan`
--

CREATE TABLE `pesan` (
  `no` int(11) NOT NULL,
  `nama_peserta` varchar(50) NOT NULL,
  `no_peserta` char(16) NOT NULL,
  `no_berkas` char(30) NOT NULL,
  `pesan` varchar(200) NOT NULL,
  `tanggal_pesan` date NOT NULL,
  `keterangan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `temp`
--

CREATE TABLE `temp` (
  `no` int(11) NOT NULL,
  `no_peserta` char(16) CHARACTER SET latin1 NOT NULL,
  `nama_peserta` varchar(50) CHARACTER SET latin1 NOT NULL,
  `jenis_kelamin` char(10) NOT NULL,
  `total` double NOT NULL,
  `keterangan` char(10) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `anggota`
--
ALTER TABLE `anggota`
  ADD PRIMARY KEY (`no`),
  ADD UNIQUE KEY `nip` (`no_peserta`);

--
-- Indeks untuk tabel `batas`
--
ALTER TABLE `batas`
  ADD PRIMARY KEY (`no`),
  ADD KEY `nama_kinerja` (`batas`);

--
-- Indeks untuk tabel `berkas`
--
ALTER TABLE `berkas`
  ADD PRIMARY KEY (`no`),
  ADD KEY `no_berkas` (`no_berkas`);

--
-- Indeks untuk tabel `crips`
--
ALTER TABLE `crips`
  ADD PRIMARY KEY (`no`),
  ADD KEY `nama_kriteria` (`nama_kriteria`);

--
-- Indeks untuk tabel `gagal`
--
ALTER TABLE `gagal`
  ADD PRIMARY KEY (`no`),
  ADD KEY `nip` (`no_peserta`);

--
-- Indeks untuk tabel `identitas`
--
ALTER TABLE `identitas`
  ADD PRIMARY KEY (`no`);

--
-- Indeks untuk tabel `kinerja`
--
ALTER TABLE `kinerja`
  ADD PRIMARY KEY (`no`);

--
-- Indeks untuk tabel `kinerja_peserta`
--
ALTER TABLE `kinerja_peserta`
  ADD PRIMARY KEY (`no`);

--
-- Indeks untuk tabel `kriteria`
--
ALTER TABLE `kriteria`
  ADD PRIMARY KEY (`no`),
  ADD UNIQUE KEY `nama_kriteria` (`nama_kriteria`);

--
-- Indeks untuk tabel `lulus`
--
ALTER TABLE `lulus`
  ADD PRIMARY KEY (`no`),
  ADD KEY `nip` (`no_peserta`);

--
-- Indeks untuk tabel `nilai`
--
ALTER TABLE `nilai`
  ADD PRIMARY KEY (`no`),
  ADD KEY `nip` (`no_peserta`),
  ADD KEY `nama_kriteria` (`nama_kriteria`);

--
-- Indeks untuk tabel `pesan`
--
ALTER TABLE `pesan`
  ADD PRIMARY KEY (`no`);

--
-- Indeks untuk tabel `temp`
--
ALTER TABLE `temp`
  ADD PRIMARY KEY (`no`),
  ADD KEY `nip` (`no_peserta`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `anggota`
--
ALTER TABLE `anggota`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT untuk tabel `batas`
--
ALTER TABLE `batas`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `berkas`
--
ALTER TABLE `berkas`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT untuk tabel `crips`
--
ALTER TABLE `crips`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `gagal`
--
ALTER TABLE `gagal`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `identitas`
--
ALTER TABLE `identitas`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `kinerja`
--
ALTER TABLE `kinerja`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `kinerja_peserta`
--
ALTER TABLE `kinerja_peserta`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `kriteria`
--
ALTER TABLE `kriteria`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `lulus`
--
ALTER TABLE `lulus`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `nilai`
--
ALTER TABLE `nilai`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT untuk tabel `pesan`
--
ALTER TABLE `pesan`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `temp`
--
ALTER TABLE `temp`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `crips`
--
ALTER TABLE `crips`
  ADD CONSTRAINT `crips_ibfk_1` FOREIGN KEY (`nama_kriteria`) REFERENCES `kriteria` (`nama_kriteria`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `gagal`
--
ALTER TABLE `gagal`
  ADD CONSTRAINT `gagal_ibfk_1` FOREIGN KEY (`no_peserta`) REFERENCES `anggota` (`no_peserta`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `lulus`
--
ALTER TABLE `lulus`
  ADD CONSTRAINT `lulus_ibfk_1` FOREIGN KEY (`no_peserta`) REFERENCES `anggota` (`no_peserta`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `nilai`
--
ALTER TABLE `nilai`
  ADD CONSTRAINT `nilai_ibfk_1` FOREIGN KEY (`no_peserta`) REFERENCES `anggota` (`no_peserta`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `nilai_ibfk_2` FOREIGN KEY (`nama_kriteria`) REFERENCES `kriteria` (`nama_kriteria`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `temp`
--
ALTER TABLE `temp`
  ADD CONSTRAINT `temp_ibfk_1` FOREIGN KEY (`no_peserta`) REFERENCES `anggota` (`no_peserta`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
