-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 11 Okt 2017 pada 08.54
-- Versi Server: 5.6.26
-- PHP Version: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_tiket2`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id_admin` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `no_telp` varchar(20) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_admin`, `email`, `password`, `no_telp`, `nama_lengkap`) VALUES
(1, 'test@team2travel.net', 'TheOne123@', '85766667009', 'Mohammad Aziz Fikri'),
(2, 'selamatriady@team2travel.net', '126sg1', '7868698129', 'Selamat Riady'),
(3, 'ochifeb@team2travel.net', 'polinela123', '089876542321', 'Ochi Febrianti'),
(4, 'lubna@team2travel.net', 'lubna0990', '0980970709', 'Lubna Abidah'),
(5, 'test@localhost', 'qwerty123', '75689709', 'Test Aja');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jadwal`
--

CREATE TABLE IF NOT EXISTS `jadwal` (
  `id_jadwal` int(11) NOT NULL,
  `id_kota_asal` int(11) NOT NULL,
  `id_kota_tujuan` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `tgl_berangkat` date NOT NULL,
  `jam_berangkat` time NOT NULL,
  `id_mobil` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jadwal`
--

INSERT INTO `jadwal` (`id_jadwal`, `id_kota_asal`, `id_kota_tujuan`, `harga`, `tgl_berangkat`, `jam_berangkat`, `id_mobil`) VALUES
(1, 1, 2, 60000, '2017-01-07', '08:21:00', 2),
(2, 1, 3, 50000, '2017-01-15', '06:31:00', 1),
(3, 1, 9, 70000, '2017-01-16', '08:00:00', 1),
(4, 1, 5, 40000, '2017-01-17', '01:01:00', 2),
(5, 1, 7, 50000, '2017-01-06', '02:01:00', 1),
(6, 1, 6, 80000, '2017-01-31', '10:00:00', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `keluhan`
--

CREATE TABLE IF NOT EXISTS `keluhan` (
  `id_keluhan` int(11) NOT NULL,
  `id_member` int(11) NOT NULL,
  `j_keluhan` varchar(20) NOT NULL,
  `d_keluhan` varchar(200) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `keluhan`
--

INSERT INTO `keluhan` (`id_keluhan`, `id_member`, `j_keluhan`, `d_keluhan`) VALUES
(9, 4, 'akun saya', 'diblokir loh'),
(10, 25, 'akun saya', 'diblokir loh');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kendaraan`
--

CREATE TABLE IF NOT EXISTS `kendaraan` (
  `id_mobil` int(11) NOT NULL,
  `jenis_mobil` varchar(20) NOT NULL,
  `nomor_polisi` varchar(20) NOT NULL,
  `warna_mobil` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kendaraan`
--

INSERT INTO `kendaraan` (`id_mobil`, `jenis_mobil`, `nomor_polisi`, `warna_mobil`) VALUES
(1, 'Toyota Avanza', 'BE 1212 AT', 'Hitam'),
(2, 'Daihatsu Xenia', 'BE 4677 DT', 'Biru');

-- --------------------------------------------------------

--
-- Struktur dari tabel `konfirmasi_pesan`
--

CREATE TABLE IF NOT EXISTS `konfirmasi_pesan` (
  `no_resi` varchar(20) NOT NULL,
  `no_rek` int(20) NOT NULL,
  `tgl_transfer` date NOT NULL,
  `jam_transfer` time NOT NULL,
  `id_pesan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `konfirmasi_pesan`
--

INSERT INTO `konfirmasi_pesan` (`no_resi`, `no_rek`, `tgl_transfer`, `jam_transfer`, `id_pesan`) VALUES
('041422680263', 0, '2017-01-06', '17:38:00', 115),
('2147483647', 2147483647, '2017-01-04', '13:40:00', 108),
('35666777', 234556677, '2017-01-02', '04:02:00', 107),
('4344546687768', 0, '2017-04-13', '01:02:00', 117),
('532334545', 2147483647, '2017-01-01', '20:25:00', 4),
('675485944', 757484859, '2017-01-02', '09:04:00', 106),
('7487384', 7457585, '2017-01-02', '03:03:00', 109),
('769785858555555', 0, '2017-01-09', '11:00:00', 116);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kota_asal`
--

CREATE TABLE IF NOT EXISTS `kota_asal` (
  `id_kota_asal` int(11) NOT NULL,
  `nm_kota_asal` varchar(27) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kota_asal`
--

INSERT INTO `kota_asal` (`id_kota_asal`, `nm_kota_asal`) VALUES
(1, 'Bandar Lampung'),
(2, 'Metro'),
(3, 'Lampung Tengah'),
(4, 'Lampung Timur'),
(5, 'Lampung Selatan'),
(6, 'Tanggamus'),
(7, 'Pringsewu'),
(8, 'Pesawaran'),
(9, 'Lampung Barat'),
(10, 'Lampung Utara'),
(11, 'Mesuji'),
(12, 'Tulang Bawang'),
(13, 'Tulang Bawang Barat'),
(14, 'Way Kanan'),
(15, 'Gunung Sugih'),
(16, 'Kotabumi'),
(17, 'Kalianda'),
(18, 'Liwa'),
(19, 'Sukadana'),
(20, 'Wiralaga Mulya'),
(22, 'Gedong Tataan'),
(23, 'Krui'),
(24, 'Pringsewu'),
(25, 'Menggala'),
(26, 'Tulang Bawang Tengah'),
(27, 'Kota Agung'),
(28, 'Blambangan Umpu'),
(29, 'Tanjung Karang');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kota_tujuan`
--

CREATE TABLE IF NOT EXISTS `kota_tujuan` (
  `id_kota_tujuan` int(11) NOT NULL,
  `nm_kota_tujuan` varchar(26) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kota_tujuan`
--

INSERT INTO `kota_tujuan` (`id_kota_tujuan`, `nm_kota_tujuan`) VALUES
(1, 'Bandar Lampung'),
(2, 'Metro'),
(3, 'Lampung Tengah'),
(4, 'Lampung Timur'),
(5, 'Lampung Selatan'),
(6, 'Tanggamus'),
(7, 'Pringsewu'),
(8, 'Pesawaran'),
(9, 'Lampung Barat'),
(10, 'Lampung Utara'),
(11, 'Mesuji'),
(12, 'Tulang Bawang'),
(13, 'Tulang Bawang Barat'),
(14, 'Way Kanan'),
(15, 'Gunung Sugih'),
(16, 'Kotabumi'),
(17, 'Kalianda'),
(18, 'Liwa'),
(19, 'Sukadana'),
(20, 'Wiralaga Mulya'),
(21, 'Gedong Tataan'),
(22, 'Krui'),
(23, 'Menggala'),
(24, 'Tulang Bawang Tengah'),
(25, 'Kota Agung'),
(26, 'Blambangan Umpu'),
(27, 'Tanjung Karang');

-- --------------------------------------------------------

--
-- Struktur dari tabel `member`
--

CREATE TABLE IF NOT EXISTS `member` (
  `id_member` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `telepon` varchar(20) NOT NULL,
  `jen_kelamin` enum('L','P') NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `member`
--

INSERT INTO `member` (`id_member`, `nama`, `alamat`, `telepon`, `jen_kelamin`, `username`, `password`) VALUES
(1, 'aziz@localhost', 'Rajabasa', '085745509897', 'L', 'aziz', '42066c'),
(2, 'selamat@localhost', 'Samping Poltek', '13254565', 'L', 'selamat', 'riady'),
(3, 'ochi@localhost', 'bandar lampung', '4343', 'P', 'ochi', '3f6fa433d4'),
(4, 'lubna@localhost', 'liwa', '085768039510', 'P', 'Lubna', '4ad0af'),
(20, 'aqin@localhost', 'bataranila', '08977849549', 'L', 'aqinnn', 'aqin123'),
(22, 'shinta12@gmail.com', 'Rajabasa', '085647354611', 'P', 'Shinta Anisa', '123'),
(25, 'doni@localhost', 'Way Halim', '08566747488', 'L', 'doni', '123');

-- --------------------------------------------------------

--
-- Struktur dari tabel `operator_loket`
--

CREATE TABLE IF NOT EXISTS `operator_loket` (
  `id_opr` int(11) NOT NULL,
  `user` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nama` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `operator_loket`
--

INSERT INTO `operator_loket` (`id_opr`, `user`, `password`, `nama`) VALUES
(1, 'operatortiket@localhost', 'qwerty', 'Loket');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pesan`
--

CREATE TABLE IF NOT EXISTS `pesan` (
  `id_pesan` int(11) NOT NULL,
  `nomor_kursi` enum('1','2','3','4','5') NOT NULL,
  `status` varchar(100) NOT NULL,
  `id_jadwal` int(11) NOT NULL,
  `id_member` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=119 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pesan`
--

INSERT INTO `pesan` (`id_pesan`, `nomor_kursi`, `status`, `id_jadwal`, `id_member`) VALUES
(4, '3', 'Lunas', 1, 4),
(106, '1', 'Dalam Proses', 1, 3),
(108, '5', 'Lunas', 2, 1),
(109, '2', 'Lunas', 1, 17),
(115, '4', 'Lunas', 2, 20),
(116, '3', 'Dalam Proses', 2, 22),
(117, '3', 'Lunas', 3, 4),
(118, '4', 'Belum Bayar', 3, 25);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`),
  ADD UNIQUE KEY `id_admin` (`id_admin`);

--
-- Indexes for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`id_jadwal`);

--
-- Indexes for table `keluhan`
--
ALTER TABLE `keluhan`
  ADD PRIMARY KEY (`id_keluhan`);

--
-- Indexes for table `kendaraan`
--
ALTER TABLE `kendaraan`
  ADD PRIMARY KEY (`id_mobil`);

--
-- Indexes for table `konfirmasi_pesan`
--
ALTER TABLE `konfirmasi_pesan`
  ADD PRIMARY KEY (`no_resi`);

--
-- Indexes for table `kota_asal`
--
ALTER TABLE `kota_asal`
  ADD PRIMARY KEY (`id_kota_asal`);

--
-- Indexes for table `kota_tujuan`
--
ALTER TABLE `kota_tujuan`
  ADD PRIMARY KEY (`id_kota_tujuan`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`id_member`);

--
-- Indexes for table `operator_loket`
--
ALTER TABLE `operator_loket`
  ADD PRIMARY KEY (`id_opr`);

--
-- Indexes for table `pesan`
--
ALTER TABLE `pesan`
  ADD PRIMARY KEY (`id_pesan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `jadwal`
--
ALTER TABLE `jadwal`
  MODIFY `id_jadwal` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `keluhan`
--
ALTER TABLE `keluhan`
  MODIFY `id_keluhan` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `kendaraan`
--
ALTER TABLE `kendaraan`
  MODIFY `id_mobil` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `kota_asal`
--
ALTER TABLE `kota_asal`
  MODIFY `id_kota_asal` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT for table `kota_tujuan`
--
ALTER TABLE `kota_tujuan`
  MODIFY `id_kota_tujuan` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `id_member` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `operator_loket`
--
ALTER TABLE `operator_loket`
  MODIFY `id_opr` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `pesan`
--
ALTER TABLE `pesan`
  MODIFY `id_pesan` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=119;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
