-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 08, 2019 at 08:35 AM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.1.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sisfo_akademik`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_nilai_keterampilan`
--

CREATE TABLE `tbl_nilai_keterampilan` (
  `kd_nilai_ketrampilan` int(15) NOT NULL,
  `kd_mapel` varchar(15) NOT NULL,
  `nis` char(5) NOT NULL,
  `tema1` float NOT NULL,
  `tema2` float NOT NULL,
  `tema3` float NOT NULL,
  `tema4` float NOT NULL,
  `tema5` float NOT NULL,
  `deskripsi` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_nilai_keterampilan`
--

INSERT INTO `tbl_nilai_keterampilan` (`kd_nilai_ketrampilan`, `kd_mapel`, `nis`, `tema1`, `tema2`, `tema3`, `tema4`, `tema5`, `deskripsi`) VALUES
(1, 'MP2', '324', 11, 12, 13, 14, 15, 'LANJUT'),
(2, 'MP2', '443', 16, 17, 18, 19, 20, 'OKE'),
(4, 'MP1', '443', 2, 3, 4, 5, 6, '7'),
(5, 'MP1', '876', 2, 3, 4, 5, 6, '7'),
(6, 'MP2', '324', 15, 4, 3, 2, 10, 'OKEE'),
(7, 'MP1', '324', 11, 12, 13, 14, 15, ''),
(8, 'MP2', '9987', 90, 80, 75, 80, 90, 'ok'),
(9, 'MP1', '2836', 90, 80, 75, 90, 80, ''),
(10, 'MP1', '2838', 80, 80, 80, 75, 90, ''),
(11, 'MP1', '2851', 90, 80, 70, 85, 80, '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_nilai_pengetahuan`
--

CREATE TABLE `tbl_nilai_pengetahuan` (
  `kd_nilai_pengetahuan` int(15) NOT NULL,
  `kd_mapel` varchar(15) DEFAULT NULL,
  `nis` char(5) NOT NULL,
  `tema1` float NOT NULL,
  `tema2` float NOT NULL,
  `tema3` float NOT NULL,
  `tema4` float NOT NULL,
  `tema5` float NOT NULL,
  `deskripsi` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_nilai_pengetahuan`
--

INSERT INTO `tbl_nilai_pengetahuan` (`kd_nilai_pengetahuan`, `kd_mapel`, `nis`, `tema1`, `tema2`, `tema3`, `tema4`, `tema5`, `deskripsi`) VALUES
(1, 'MP1', '324', 90, 80, 70, 60, 50, '40'),
(2, 'MP1', '324', 10, 20, 30, 40, 50, '6'),
(3, 'MP1', '443', 70, 80, 90, 100, 10, '20'),
(4, 'MP1', '876', 30, 40, 50, 60, 70, '80'),
(5, 'MP1', '9987', 90, 100, 85, 80, 95, 'ok'),
(6, 'MP1', '2836', 90, 75, 80, 70, 80, ''),
(7, 'MP1', '2838', 70, 80, 90, 90, 80, ''),
(8, 'MP1', '2851', 80, 90, 60, 80, 75, '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_deskripsi_raport`
--

CREATE TABLE `tb_deskripsi_raport` (
  `id_deskripsi` int(11) NOT NULL,
  `nis` char(5) NOT NULL,
  `kd_mapel` varchar(15) NOT NULL,
  `aspek` varchar(25) NOT NULL,
  `deskripsi_raport` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_deskripsi_raport`
--

INSERT INTO `tb_deskripsi_raport` (`id_deskripsi`, `nis`, `kd_mapel`, `aspek`, `deskripsi_raport`) VALUES
(7, '2836', 'MP1', 'Pengetahuan', 'anada sangat baik dalam'),
(8, '2838', 'MP1', 'Pengetahuan', 'ananda sangat baik dalam'),
(9, '2851', 'MP1', 'Pengetahuan', 'ananda sangat baik');

-- --------------------------------------------------------

--
-- Table structure for table `tb_ekstrakurikuler`
--

CREATE TABLE `tb_ekstrakurikuler` (
  `kd_ekskul` int(5) NOT NULL,
  `nm_ekskul` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_ekstrakurikuler`
--

INSERT INTO `tb_ekstrakurikuler` (`kd_ekskul`, `nm_ekskul`) VALUES
(11, 'Pramuka'),
(12, 'UKS');

-- --------------------------------------------------------

--
-- Table structure for table `tb_guru`
--

CREATE TABLE `tb_guru` (
  `nip` char(20) NOT NULL,
  `nm_guru` varchar(50) NOT NULL,
  `jns_kel` varchar(1) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `pend_terakhir` varchar(10) NOT NULL,
  `jabatan` varchar(30) NOT NULL,
  `status` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_guru`
--

INSERT INTO `tb_guru` (`nip`, `nm_guru`, `jns_kel`, `alamat`, `pend_terakhir`, `jabatan`, `status`) VALUES
('197702282008012', 'Menik Rhismiarti, S.Pd', 'P', 'Pantianom', 'S1', 'Wali Kelas 5', 'Aktif'),
('197908052008012028', 'Fajar Indah Hikmawati, S.Pd. SD ', 'P', 'Desa kalijambe', 'S1', 'Wali Kelas 1', 'Aktif'),
('19980326', 'Kepala Sekolah SD', 'L', 'Pekalongan', 'S2', 'Kepala Sekolah', 'Aktif'),
('789643', 'elina', 'P', 'pekalongan', 'S1', 'Tata Usaha', 'AKTIF');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kehadiran`
--

CREATE TABLE `tb_kehadiran` (
  `id_kehadiran` int(11) NOT NULL,
  `nis` char(5) NOT NULL,
  `sakit` int(3) NOT NULL,
  `ijin` int(3) NOT NULL,
  `alpha` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_kehadiran`
--

INSERT INTO `tb_kehadiran` (`id_kehadiran`, `nis`, `sakit`, `ijin`, `alpha`) VALUES
(1, '2836', 100, 200, 300),
(2, '2838', 4, 5, 6),
(5, '2851', 6, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_kelas`
--

CREATE TABLE `tb_kelas` (
  `kd_kelas` varchar(10) NOT NULL,
  `nm_kelas` varchar(60) NOT NULL,
  `nip` char(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_kelas`
--

INSERT INTO `tb_kelas` (`kd_kelas`, `nm_kelas`, `nip`) VALUES
('011', 'Kelas 1', '197908052008012028'),
('015', 'Kelas 5', '197702282008012');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kesehatan`
--

CREATE TABLE `tb_kesehatan` (
  `id_aspek` int(5) NOT NULL,
  `nis` char(5) NOT NULL,
  `aspek` varchar(25) NOT NULL,
  `keterangan` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_kesehatan`
--

INSERT INTO `tb_kesehatan` (`id_aspek`, `nis`, `aspek`, `keterangan`) VALUES
(2, '443', 'c', 'd'),
(3, '876', 'e', 'f'),
(4, '9987', 'pendengaran baik', 'ok'),
(5, '2836', 'Pendengaran', 'Baik'),
(6, '2838', 'Pendengaran ', 'Baik'),
(7, '2851', 'Pendengaran', 'Baik'),
(8, '2851', 'Pengelihatan', 'Baik'),
(9, '2851', 'Gigi', 'Baik');

-- --------------------------------------------------------

--
-- Table structure for table `tb_mapel`
--

CREATE TABLE `tb_mapel` (
  `kd_mapel` varchar(15) NOT NULL,
  `nm_mapel` varchar(60) NOT NULL,
  `aktif` enum('Ya','Tidak') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_mapel`
--

INSERT INTO `tb_mapel` (`kd_mapel`, `nm_mapel`, `aktif`) VALUES
('MP1', 'BHS', 'Ya'),
('MP2', 'MTK', 'Ya'),
('MP3', 'IPA', 'Ya');

-- --------------------------------------------------------

--
-- Table structure for table `tb_nilai_ekskul`
--

CREATE TABLE `tb_nilai_ekskul` (
  `kd_nilai_ekskul` int(5) NOT NULL,
  `nis` char(5) NOT NULL,
  `kd_ekskul` int(5) NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_nilai_ekskul`
--

INSERT INTO `tb_nilai_ekskul` (`kd_nilai_ekskul`, `nis`, `kd_ekskul`, `deskripsi`) VALUES
(22, '324', 0, 'b'),
(23, '443', 12, 'dsa'),
(24, '324', 12, 'ad'),
(26, '876', 12, 'ds'),
(27, '324', 0, '1'),
(28, '9987', 0, ''),
(29, '2836', 11, 'baguss'),
(30, '2838', 11, 'bagus');

-- --------------------------------------------------------

--
-- Table structure for table `tb_nilai_prestasi`
--

CREATE TABLE `tb_nilai_prestasi` (
  `kd_nilai_prestasi` int(15) NOT NULL,
  `nis` char(5) NOT NULL,
  `jns_kegiatan` varchar(10) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_nilai_prestasi`
--

INSERT INTO `tb_nilai_prestasi` (`kd_nilai_prestasi`, `nis`, `jns_kegiatan`, `keterangan`) VALUES
(2, '443', '', '4'),
(3, '876', '', '6'),
(4, '324', '4', '5'),
(5, '443', '6', '7'),
(6, '876', '8', '9'),
(7, '9987', 'kesenian', 'siip'),
(8, '2851', 'Kesenian', '-'),
(9, '2851', 'Olahraga', '-');

-- --------------------------------------------------------

--
-- Table structure for table `tb_nilai_sikap`
--

CREATE TABLE `tb_nilai_sikap` (
  `kd_nilai_sikap` int(5) NOT NULL,
  `nis` char(5) NOT NULL,
  `positif` text NOT NULL,
  `negatif` text NOT NULL,
  `status` enum('spiritual','sosial') NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_nilai_sikap`
--

INSERT INTO `tb_nilai_sikap` (`kd_nilai_sikap`, `nis`, `positif`, `negatif`, `status`, `keterangan`) VALUES
(2, '443', 'd', 'e', 'spiritual', 'f'),
(3, '876', 'g', 'h', 'spiritual', 'j'),
(5, '443', 'u', 'y', 'sosial', 't'),
(6, '876', 'r', 'e', 'sosial', 'w'),
(7, '9987', 'positif', 'negatif', 'spiritual', 'oke'),
(8, '9987', 'positif', 'negatif', 'sosial', 'baikkk'),
(9, '2836', 'positif', 'negatif', 'spiritual', 'ananda jujur'),
(10, '2838', 'positif', 'negatif', 'spiritual', 'ananda jujur'),
(11, '2851', 'positif', 'negatif', 'spiritual', 'anada elina beribadah'),
(12, '2851', 'postif', 'negatif', 'sosial', 'ananda sangat sopan');

-- --------------------------------------------------------

--
-- Table structure for table `tb_nilai_uts`
--

CREATE TABLE `tb_nilai_uts` (
  `id_nilai_uts` int(5) NOT NULL,
  `kd_mapel` varchar(15) NOT NULL,
  `nis` char(5) NOT NULL,
  `angka_pengetahuan` float NOT NULL,
  `deskripsi_pengetahuan` text NOT NULL,
  `angka_keterampilan` float NOT NULL,
  `deskripsi_keterampilan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_nilai_uts`
--

INSERT INTO `tb_nilai_uts` (`id_nilai_uts`, `kd_mapel`, `nis`, `angka_pengetahuan`, `deskripsi_pengetahuan`, `angka_keterampilan`, `deskripsi_keterampilan`) VALUES
(3, '0', '324', 0, 'kuranh', 95, 'bagus'),
(4, '0', '443', 0, 'bagus', 70, 'kurang'),
(5, 'MP2', '324', 90, 'A', 100, 'AB'),
(6, 'MP1', '443', 100, 'AB', 90, 'A'),
(8, 'MP2', '324', 9, 'q', 8, 'w'),
(9, 'MP2', '324', 1, 'a', 2, 'b3'),
(10, 'MP1', '443', 3, 'c', 4, 'd'),
(11, 'MP2', '324', 1, '2', 3, '4'),
(12, 'MP1', '443', 5, '6', 7, '8'),
(13, 'MP1', '876', 9, '10', 11, '12'),
(14, 'MP1', '2836', 90, 'baik', 80, 'baik'),
(15, 'MP1', '2838', 80, 'baik', 85, 'baik'),
(16, 'MP1', '2851', 90, 'bagus', 80, 'bagus');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pengumuman`
--

CREATE TABLE `tb_pengumuman` (
  `id_pengumuman` int(5) NOT NULL,
  `file` varchar(50) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `isi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pengumuman`
--

INSERT INTO `tb_pengumuman` (`id_pengumuman`, `file`, `judul`, `isi`) VALUES
(2, '', 'pengumuman', 'pengambilan raport pada tanggal 10 agustus 2020\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `tb_predikat`
--

CREATE TABLE `tb_predikat` (
  `kd_predikat` int(10) NOT NULL,
  `nilai_a` int(5) NOT NULL,
  `nilai_b` int(5) NOT NULL,
  `grade` varchar(5) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_predikat`
--

INSERT INTO `tb_predikat` (`kd_predikat`, `nilai_a`, `nilai_b`, `grade`, `keterangan`) VALUES
(2, 90, 100, 'A', 'sangat baik'),
(3, 80, 89, 'B', 'baik'),
(4, 70, 79, 'C', 'kurang'),
(5, 50, 69, 'D', 'buruk'),
(6, 30, 39, 'E', 'Sangat kurang');

-- --------------------------------------------------------

--
-- Table structure for table `tb_saran`
--

CREATE TABLE `tb_saran` (
  `id_saran` int(11) NOT NULL,
  `nis` char(5) NOT NULL,
  `saran` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_saran`
--

INSERT INTO `tb_saran` (`id_saran`, `nis`, `saran`) VALUES
(2, '2838', 'bbbbbbbbbbbbbb'),
(3, '2836', 'sad'),
(4, '2838', 'qqqqq');

-- --------------------------------------------------------

--
-- Table structure for table `tb_semester`
--

CREATE TABLE `tb_semester` (
  `kd_semester` varchar(15) NOT NULL,
  `semester` enum('Ganjil','Genap') NOT NULL,
  `th_pelajaran` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_semester`
--

INSERT INTO `tb_semester` (`kd_semester`, `semester`, `th_pelajaran`) VALUES
('11', 'Ganjil', '2020'),
('12', 'Genap', '2020');

-- --------------------------------------------------------

--
-- Table structure for table `tb_siswa`
--

CREATE TABLE `tb_siswa` (
  `nis` char(5) NOT NULL,
  `nm_siswa` varchar(50) NOT NULL,
  `kd_kelas` varchar(10) NOT NULL,
  `tmp_lahir` varchar(20) NOT NULL,
  `jns_kel` varchar(1) NOT NULL,
  `agama` varchar(10) NOT NULL,
  `pend_terakhir` varchar(10) NOT NULL,
  `alamat` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_siswa`
--

INSERT INTO `tb_siswa` (`nis`, `nm_siswa`, `kd_kelas`, `tmp_lahir`, `jns_kel`, `agama`, `pend_terakhir`, `alamat`) VALUES
('2836', 'Chika Helgi Nafeza123', '015', 'Pekalongan', 'P', 'Islam', 'TK', 'Ds Randumuktiwaren'),
('2838', 'Dicky Khaliman Yusuf', '015', 'Pekalongan', 'L', 'Islam', 'TK', 'Ds Randumuktiwaren'),
('2851', 'Elina Jul Setiyarum', '011', 'pekalongan', 'P', 'Islam', 'TK', 'Desa pantianom');

-- --------------------------------------------------------

--
-- Table structure for table `tb_ukuran`
--

CREATE TABLE `tb_ukuran` (
  `id_ukuran` int(5) NOT NULL,
  `nis` char(5) NOT NULL,
  `aspek` varchar(20) NOT NULL,
  `smt1` int(5) NOT NULL,
  `smt2` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_ukuran`
--

INSERT INTO `tb_ukuran` (`id_ukuran`, `nis`, `aspek`, `smt1`, `smt2`) VALUES
(1, '2836', 'Array', 100, 200),
(2, '2838', 'Tinggi (Cm)', 30, 40),
(3, '2836', 'Berat Badan (Kg', 20, 10),
(4, '2838', 'Berat Badan (Kg', 40, 30),
(7, '2851', 'Tinggi (Cm)', 40, 50);

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `username` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `level` varchar(50) NOT NULL,
  `nis` char(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`username`, `password`, `nama`, `level`, `nis`) VALUES
('197702282008012', '21232f297a57a5a743894a0e4a801fc3', 'Menik Rhismiarti, S.Pd.SD', 'Wali Kelas', NULL),
('197908052008012028', '21232f297a57a5a743894a0e4a801fc3', 'FAJAR INDAH HIKMAWATI, S.Pd. SD ', 'Wali Kelas', NULL),
('2836', '73acd9a5972130b75066c82595a1fae3', 'Chika Helgi Nafeza', 'Wali Murid', NULL),
('2838', '21232f297a57a5a743894a0e4a801fc3', 'Dicky Khaliman Yusuf', 'Wali Murid', NULL),
('2851', '21232f297a57a5a743894a0e4a801fc3', 'Elina Jul Setiyarum', 'Wali Murid', NULL),
('789643', '21232f297a57a5a743894a0e4a801fc3', 'elina', 'Tata Usaha', NULL),
('admin', '21232f297a57a5a743894a0e4a801fc3', 'Administrator', 'admin', NULL),
('kepsek', '8561863b55faf85b9ad67c52b3b851ac', 'KEPSEK', 'Kepala Sekolah', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_wali_murid`
--

CREATE TABLE `tb_wali_murid` (
  `id_wali` int(5) NOT NULL,
  `nis` char(5) NOT NULL,
  `nm_bpk` varchar(50) NOT NULL,
  `nm_ibu` varchar(50) NOT NULL,
  `pekerjaan_bpk` varchar(50) NOT NULL,
  `pekerjaan_ibu` varchar(50) NOT NULL,
  `alamat_ortu` varchar(100) NOT NULL,
  `no_hp` char(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_wali_murid`
--

INSERT INTO `tb_wali_murid` (`id_wali`, `nis`, `nm_bpk`, `nm_ibu`, `pekerjaan_bpk`, `pekerjaan_ibu`, `alamat_ortu`, `no_hp`) VALUES
(2, '64', 'gd', 'gde', 'fgde', 'd', 'ret', '435'),
(3, '324', 'fsd', 'dsf', 'dsf', 'fsd', 'fs', '432'),
(4, '876', 'fs', 'dsf', 'fs', 'sf', 'fs', '2342'),
(5, '7656', 'dasda', 'dasd', 'dsa', 'das', 'dsad', 'das'),
(6, '33260', 'es', 'se', 'sad', 'ds', 'sdsad', '123'),
(7, '9987', 'walibaru', 'walibaru2', 'walipekerjaan', 'asda', 'da', '321'),
(8, '9009', 'eko', 'sri', 'dagang', 'ibu rumah tangga', 'bojong', '08754446788'),
(9, '398', 'hhhhhjjjjjjjjjjk', 'gggg', 'shs', 'fdeg', 'agdg', '8536'),
(10, '2836', 'Sugito', 'Kunimah', 'Dagang', 'Ibu Rumah Tangga', 'Ds Randumuktiwaren', '085678546762'),
(11, '2838', 'Casmudi', 'Sri Haryanti', 'Buruh', 'Ibu Rumah Tangga', 'Ds randumuktiwaren', '08973765837'),
(12, '2851', 'Sadli', 'Menik', 'Dagang', 'Guru', 'Desa Pantianom', '085897245890');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_nilai_keterampilan`
--
ALTER TABLE `tbl_nilai_keterampilan`
  ADD PRIMARY KEY (`kd_nilai_ketrampilan`);

--
-- Indexes for table `tbl_nilai_pengetahuan`
--
ALTER TABLE `tbl_nilai_pengetahuan`
  ADD PRIMARY KEY (`kd_nilai_pengetahuan`);

--
-- Indexes for table `tb_deskripsi_raport`
--
ALTER TABLE `tb_deskripsi_raport`
  ADD PRIMARY KEY (`id_deskripsi`);

--
-- Indexes for table `tb_ekstrakurikuler`
--
ALTER TABLE `tb_ekstrakurikuler`
  ADD PRIMARY KEY (`kd_ekskul`);

--
-- Indexes for table `tb_guru`
--
ALTER TABLE `tb_guru`
  ADD PRIMARY KEY (`nip`);

--
-- Indexes for table `tb_kehadiran`
--
ALTER TABLE `tb_kehadiran`
  ADD PRIMARY KEY (`id_kehadiran`);

--
-- Indexes for table `tb_kelas`
--
ALTER TABLE `tb_kelas`
  ADD PRIMARY KEY (`kd_kelas`);

--
-- Indexes for table `tb_kesehatan`
--
ALTER TABLE `tb_kesehatan`
  ADD PRIMARY KEY (`id_aspek`);

--
-- Indexes for table `tb_nilai_ekskul`
--
ALTER TABLE `tb_nilai_ekskul`
  ADD PRIMARY KEY (`kd_nilai_ekskul`);

--
-- Indexes for table `tb_nilai_prestasi`
--
ALTER TABLE `tb_nilai_prestasi`
  ADD PRIMARY KEY (`kd_nilai_prestasi`);

--
-- Indexes for table `tb_nilai_sikap`
--
ALTER TABLE `tb_nilai_sikap`
  ADD PRIMARY KEY (`kd_nilai_sikap`);

--
-- Indexes for table `tb_nilai_uts`
--
ALTER TABLE `tb_nilai_uts`
  ADD PRIMARY KEY (`id_nilai_uts`);

--
-- Indexes for table `tb_pengumuman`
--
ALTER TABLE `tb_pengumuman`
  ADD PRIMARY KEY (`id_pengumuman`);

--
-- Indexes for table `tb_predikat`
--
ALTER TABLE `tb_predikat`
  ADD PRIMARY KEY (`kd_predikat`);

--
-- Indexes for table `tb_saran`
--
ALTER TABLE `tb_saran`
  ADD PRIMARY KEY (`id_saran`);

--
-- Indexes for table `tb_semester`
--
ALTER TABLE `tb_semester`
  ADD PRIMARY KEY (`kd_semester`);

--
-- Indexes for table `tb_siswa`
--
ALTER TABLE `tb_siswa`
  ADD PRIMARY KEY (`nis`);

--
-- Indexes for table `tb_ukuran`
--
ALTER TABLE `tb_ukuran`
  ADD PRIMARY KEY (`id_ukuran`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `tb_wali_murid`
--
ALTER TABLE `tb_wali_murid`
  ADD PRIMARY KEY (`id_wali`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_nilai_keterampilan`
--
ALTER TABLE `tbl_nilai_keterampilan`
  MODIFY `kd_nilai_ketrampilan` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_nilai_pengetahuan`
--
ALTER TABLE `tbl_nilai_pengetahuan`
  MODIFY `kd_nilai_pengetahuan` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tb_deskripsi_raport`
--
ALTER TABLE `tb_deskripsi_raport`
  MODIFY `id_deskripsi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tb_kehadiran`
--
ALTER TABLE `tb_kehadiran`
  MODIFY `id_kehadiran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_kesehatan`
--
ALTER TABLE `tb_kesehatan`
  MODIFY `id_aspek` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tb_nilai_ekskul`
--
ALTER TABLE `tb_nilai_ekskul`
  MODIFY `kd_nilai_ekskul` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `tb_nilai_prestasi`
--
ALTER TABLE `tb_nilai_prestasi`
  MODIFY `kd_nilai_prestasi` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tb_nilai_sikap`
--
ALTER TABLE `tb_nilai_sikap`
  MODIFY `kd_nilai_sikap` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tb_nilai_uts`
--
ALTER TABLE `tb_nilai_uts`
  MODIFY `id_nilai_uts` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tb_pengumuman`
--
ALTER TABLE `tb_pengumuman`
  MODIFY `id_pengumuman` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_predikat`
--
ALTER TABLE `tb_predikat`
  MODIFY `kd_predikat` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tb_saran`
--
ALTER TABLE `tb_saran`
  MODIFY `id_saran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_ukuran`
--
ALTER TABLE `tb_ukuran`
  MODIFY `id_ukuran` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tb_wali_murid`
--
ALTER TABLE `tb_wali_murid`
  MODIFY `id_wali` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
