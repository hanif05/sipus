-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 05 Agu 2018 pada 13.32
-- Versi Server: 10.1.10-MariaDB
-- PHP Version: 5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_perpus`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengaturan`
--

CREATE TABLE `pengaturan` (
  `id_pengaturan` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` varchar(150) NOT NULL,
  `logo` text NOT NULL,
  `denda` int(11) NOT NULL,
  `maks_buku` int(11) NOT NULL,
  `maks_hari` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pengaturan`
--

INSERT INTO `pengaturan` (`id_pengaturan`, `nama`, `alamat`, `logo`, `denda`, `maks_buku`, `maks_hari`) VALUES
(1, 'Perpustakaan Sekolah Dasar Negeri Langensari Cimaung', 'Kp. Pasirhuni RT/RW 05/02 Desa Pasirhuni Kec. Cimaung Kab. Bandung', '', 500, 5, 7);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL,
  `foto_user` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_admin`
--

INSERT INTO `tbl_admin` (`id_admin`, `username`, `password`, `foto_user`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'avatar.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_anggota`
--

CREATE TABLE `tbl_anggota` (
  `id_anggota` int(11) NOT NULL,
  `id_admin` int(11) NOT NULL,
  `nama` varchar(70) NOT NULL,
  `kelas` enum('1-A','1-B','2-A','2-B','3-A','3-B','4-A','4-B','5-A','5-B','6-A','6-B') NOT NULL,
  `alamat` varchar(250) NOT NULL,
  `jk` enum('Laki-laki','Perempuan') NOT NULL,
  `tmpt_lahir` varchar(100) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `foto` text NOT NULL,
  `tgl_daftar` date NOT NULL,
  `status` enum('0','1') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_anggota`
--

INSERT INTO `tbl_anggota` (`id_anggota`, `id_admin`, `nama`, `kelas`, `alamat`, `jk`, `tmpt_lahir`, `tgl_lahir`, `foto`, `tgl_daftar`, `status`) VALUES
(4, 0, 'amsndmadna', '1-B', 'mnd,nfs', 'Perempuan', 'masndad', '2018-07-12', '', '2018-07-18', '1'),
(5, 0, 'Kurnia Setiawan', '6-B', 'jl mawar', 'Laki-laki', 'Bandung', '2004-06-25', '', '2018-07-02', '1'),
(6, 0, 'tes', '2-A', 'jl jauh', 'Laki-laki', 'malang', '2005-07-08', '', '2018-07-03', '1'),
(7, 0, 'Udin', '6-A', 'Bandung', 'Laki-laki', 'Bandung', '2004-04-17', '', '2018-07-26', '1'),
(8, 0, 'aminah', '6-A', 'jl. seokarno no.15 ', 'Perempuan', 'Jakarta', '2003-11-19', '', '2018-07-27', '1'),
(9, 0, 'testing', '5-A', 'jl. tes', 'Laki-laki', 'Bali', '2000-11-17', '', '2018-08-03', '0');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_buku`
--

CREATE TABLE `tbl_buku` (
  `id_buku` int(11) NOT NULL,
  `id_admin` int(11) NOT NULL,
  `judul` varchar(250) NOT NULL,
  `pengarang` varchar(250) NOT NULL,
  `penerbit` varchar(50) NOT NULL,
  `tahun` year(4) NOT NULL,
  `isbn` int(11) NOT NULL,
  `rak` enum('R01','R02','R03','R04','R05') NOT NULL,
  `tgl_input` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_buku`
--

INSERT INTO `tbl_buku` (`id_buku`, `id_admin`, `judul`, `pengarang`, `penerbit`, `tahun`, `isbn`, `rak`, `tgl_input`) VALUES
(1, 0, 'Buku Agama', 'Yusuf', 'Yudistira', 2011, 123841023, 'R04', '0000-00-00 00:00:00'),
(2, 0, 'Belajar Mudah Belajar Matematika', 'Andi', 'Gramedia', 2012, 219308121, 'R01', '0000-00-00 00:00:00'),
(3, 0, 'aklsdj', 'aksljdsla', 'asdjkla', 2011, 123131, 'R01', '0000-00-00 00:00:00'),
(4, 0, 'akldjsaldj', 'skajdlajd', 'sajldaslkdja', 2012, 231091823, 'R01', '0000-00-00 00:00:00'),
(5, 0, 'aslkjdaldj', 'skajlkja', 'skaldlasdj', 2011, 2131314, 'R01', '0000-00-00 00:00:00'),
(6, 0, 'sdadhjkadha', 'ksajdhkahsd', 'sjadhkahska', 2010, 23190231, 'R01', '0000-00-00 00:00:00'),
(7, 0, 'jkasdhahdlah', 'hslhfaljhfa', 'hdasdkjh', 2009, 123890183, 'R01', '0000-00-00 00:00:00'),
(9, 0, 'Buku tes', 'tes', 'tes', 2001, 192381412, 'R03', '2018-07-25 13:53:13'),
(10, 0, 'Contoh', 'contoh', 'contoh', 2000, 12384141, 'R02', '2018-07-25 14:40:58'),
(11, 0, 'dasd', 'sada', 'fafsa', 2005, 12398413, 'R05', '2018-07-25 14:45:26'),
(12, 0, 'ajdak', 'jskadha', 'sajkdha', 2001, 2173614, 'R01', '2018-07-25 14:59:29'),
(13, 0, 'sadhjj', 'sajlkfha', 'sajkdh', 2009, 21376141, 'R01', '2018-07-25 15:07:00'),
(14, 0, 'jaskda', 'oihdla', 'oihdalsd', 2013, 123141, 'R01', '2018-07-25 15:32:59'),
(15, 0, 'Buku Agama', 'Saefudin', 'Gramedia', 2009, 12321894, 'R03', '2018-08-03 07:54:46');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_peminjaman`
--

CREATE TABLE `tbl_peminjaman` (
  `id_peminjam` int(11) NOT NULL,
  `id_admin` int(11) NOT NULL,
  `id_buku` int(11) NOT NULL,
  `id_anggota` int(11) NOT NULL,
  `tgl_pinjam` date NOT NULL,
  `tgl_kembali` date NOT NULL,
  `status` enum('P','K') NOT NULL,
  `keterangan` varchar(150) NOT NULL,
  `telat` int(11) NOT NULL,
  `denda` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_peminjaman`
--

INSERT INTO `tbl_peminjaman` (`id_peminjam`, `id_admin`, `id_buku`, `id_anggota`, `tgl_pinjam`, `tgl_kembali`, `status`, `keterangan`, `telat`, `denda`) VALUES
(1, 0, 1, 4, '2018-08-01', '2018-08-07', 'P', '', 0, '0.00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pengaturan`
--
ALTER TABLE `pengaturan`
  ADD PRIMARY KEY (`id_pengaturan`);

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `tbl_anggota`
--
ALTER TABLE `tbl_anggota`
  ADD PRIMARY KEY (`id_anggota`);

--
-- Indexes for table `tbl_buku`
--
ALTER TABLE `tbl_buku`
  ADD PRIMARY KEY (`id_buku`);

--
-- Indexes for table `tbl_peminjaman`
--
ALTER TABLE `tbl_peminjaman`
  ADD PRIMARY KEY (`id_peminjam`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pengaturan`
--
ALTER TABLE `pengaturan`
  MODIFY `id_pengaturan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_anggota`
--
ALTER TABLE `tbl_anggota`
  MODIFY `id_anggota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `tbl_buku`
--
ALTER TABLE `tbl_buku`
  MODIFY `id_buku` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `tbl_peminjaman`
--
ALTER TABLE `tbl_peminjaman`
  MODIFY `id_peminjam` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
