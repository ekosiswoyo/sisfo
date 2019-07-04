-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 02 Jul 2019 pada 08.14
-- Versi server: 10.1.37-MariaDB
-- Versi PHP: 7.3.1

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
-- Struktur dari tabel `tbl_nilai_keterampilan`
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
-- Dumping data untuk tabel `tbl_nilai_keterampilan`
--

INSERT INTO `tbl_nilai_keterampilan` (`kd_nilai_ketrampilan`, `kd_mapel`, `nis`, `tema1`, `tema2`, `tema3`, `tema4`, `tema5`, `deskripsi`) VALUES
(1, 'MP2', '324', 11, 12, 13, 14, 15, 'LANJUT'),
(2, 'MP2', '443', 16, 17, 18, 19, 20, 'OKE'),
(4, 'MP1', '443', 2, 3, 4, 5, 6, '7'),
(5, 'MP1', '876', 2, 3, 4, 5, 6, '7'),
(6, 'MP2', '324', 15, 4, 3, 2, 10, 'OKEE'),
(7, 'MP1', '324', 11, 12, 13, 14, 15, ''),
(8, 'MP2', '9987', 90, 80, 75, 80, 90, 'ok');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_nilai_pengetahuan`
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
-- Dumping data untuk tabel `tbl_nilai_pengetahuan`
--

INSERT INTO `tbl_nilai_pengetahuan` (`kd_nilai_pengetahuan`, `kd_mapel`, `nis`, `tema1`, `tema2`, `tema3`, `tema4`, `tema5`, `deskripsi`) VALUES
(1, 'MP1', '324', 90, 80, 70, 60, 50, '40'),
(2, 'MP1', '324', 10, 20, 30, 40, 50, '6'),
(3, 'MP1', '443', 70, 80, 90, 100, 10, '20'),
(4, 'MP1', '876', 30, 40, 50, 60, 70, '80'),
(5, 'MP1', '9987', 90, 100, 85, 80, 95, 'ok');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_ekstrakurikuler`
--

CREATE TABLE `tb_ekstrakurikuler` (
  `kd_ekskul` int(5) NOT NULL,
  `nm_ekskul` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_ekstrakurikuler`
--

INSERT INTO `tb_ekstrakurikuler` (`kd_ekskul`, `nm_ekskul`) VALUES
(0, 'basket'),
(12, 'Silat (IPSI)');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_guru`
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
-- Dumping data untuk tabel `tb_guru`
--

INSERT INTO `tb_guru` (`nip`, `nm_guru`, `jns_kel`, `alamat`, `pend_terakhir`, `jabatan`, `status`) VALUES
('197702282008012', 'Menik Rhismiarti, S.Pd', 'P', 'Pantianom', 'S1', 'Wali Kelas 5', 'Aktif'),
('19980326', 'Kepala Sekolah SD', 'L', 'Pekalongan', 'S2', 'Kepala Sekolah', 'Aktif'),
('789643', 'elina', 'P', 'pekalongan', 'S1', 'Tata Usaha', 'AKTIF');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kehadiran`
--

CREATE TABLE `tb_kehadiran` (
  `id_kehadiran` int(11) NOT NULL,
  `nis` char(5) NOT NULL,
  `sakit` int(3) NOT NULL,
  `ijin` int(3) NOT NULL,
  `alpha` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_kehadiran`
--

INSERT INTO `tb_kehadiran` (`id_kehadiran`, `nis`, `sakit`, `ijin`, `alpha`) VALUES
(1, '2836', 10, 20, 30),
(2, '2838', 4, 5, 6);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kelas`
--

CREATE TABLE `tb_kelas` (
  `kd_kelas` varchar(10) NOT NULL,
  `nm_kelas` varchar(60) NOT NULL,
  `nip` char(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_kelas`
--

INSERT INTO `tb_kelas` (`kd_kelas`, `nm_kelas`, `nip`) VALUES
('01', 'KELAS 1', '789643'),
('015', 'Kelas 5', '197702282008012');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kesehatan`
--

CREATE TABLE `tb_kesehatan` (
  `id_aspek` int(5) NOT NULL,
  `nis` char(5) NOT NULL,
  `aspek` varchar(25) NOT NULL,
  `keterangan` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_kesehatan`
--

INSERT INTO `tb_kesehatan` (`id_aspek`, `nis`, `aspek`, `keterangan`) VALUES
(2, '443', 'c', 'd'),
(3, '876', 'e', 'f'),
(4, '9987', 'pendengaran baik', 'ok');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_mapel`
--

CREATE TABLE `tb_mapel` (
  `kd_mapel` varchar(15) NOT NULL,
  `nm_mapel` varchar(60) NOT NULL,
  `aktif` enum('Ya','Tidak') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_mapel`
--

INSERT INTO `tb_mapel` (`kd_mapel`, `nm_mapel`, `aktif`) VALUES
('MP1', 'BHS', 'Ya'),
('MP2', 'MTK', 'Ya');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_nilai`
--

CREATE TABLE `tb_nilai` (
  `id_pengumuman` int(5) NOT NULL,
  `file` varchar(50) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `isi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_nilai`
--

INSERT INTO `tb_nilai` (`id_pengumuman`, `file`, `judul`, `isi`) VALUES
(1, '', 'hjhfdj', 'sdjsn\r\n');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_nilai_ekskul`
--

CREATE TABLE `tb_nilai_ekskul` (
  `kd_nilai_ekskul` int(5) NOT NULL,
  `nis` char(5) NOT NULL,
  `kd_ekskul` int(5) NOT NULL,
  `kegiatan` text NOT NULL,
  `nilai` float NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_nilai_ekskul`
--

INSERT INTO `tb_nilai_ekskul` (`kd_nilai_ekskul`, `nis`, `kd_ekskul`, `kegiatan`, `nilai`, `deskripsi`) VALUES
(22, '324', 0, 'a', 1, 'b'),
(23, '443', 12, 'ca', 32, 'dsa'),
(24, '324', 12, 'sad', 12, 'ad'),
(26, '876', 12, 'hgj', 89, 'ds'),
(27, '324', 0, '1', 1, '1'),
(28, '9987', 0, 'baik', 90, '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_nilai_prestasi`
--

CREATE TABLE `tb_nilai_prestasi` (
  `kd_nilai_prestasi` int(15) NOT NULL,
  `nis` char(5) NOT NULL,
  `jns_kegiatan` varchar(10) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_nilai_prestasi`
--

INSERT INTO `tb_nilai_prestasi` (`kd_nilai_prestasi`, `nis`, `jns_kegiatan`, `keterangan`) VALUES
(2, '443', '', '4'),
(3, '876', '', '6'),
(4, '324', '4', '5'),
(5, '443', '6', '7'),
(6, '876', '8', '9'),
(7, '9987', 'kesenian', 'siip');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_nilai_sikap`
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
-- Dumping data untuk tabel `tb_nilai_sikap`
--

INSERT INTO `tb_nilai_sikap` (`kd_nilai_sikap`, `nis`, `positif`, `negatif`, `status`, `keterangan`) VALUES
(2, '443', 'd', 'e', 'spiritual', 'f'),
(3, '876', 'g', 'h', 'spiritual', 'j'),
(5, '443', 'u', 'y', 'sosial', 't'),
(6, '876', 'r', 'e', 'sosial', 'w'),
(7, '9987', 'positif', 'negatif', 'spiritual', 'oke'),
(8, '9987', 'positif', 'negatif', 'sosial', 'baikkk');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_nilai_uts`
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
-- Dumping data untuk tabel `tb_nilai_uts`
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
(13, 'MP1', '876', 9, '10', 11, '12');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_predikat`
--

CREATE TABLE `tb_predikat` (
  `kd_predikat` int(10) NOT NULL,
  `nilai_a` int(5) NOT NULL,
  `nilai_b` int(5) NOT NULL,
  `grade` varchar(5) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_predikat`
--

INSERT INTO `tb_predikat` (`kd_predikat`, `nilai_a`, `nilai_b`, `grade`, `keterangan`) VALUES
(2, 90, 100, 'A', 'sangat baik'),
(3, 80, 89, 'B', 'baik'),
(4, 70, 79, 'C', 'kurang'),
(5, 50, 69, 'D', 'buruk'),
(6, 30, 39, 'E', 'Sangat kurang');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_semester`
--

CREATE TABLE `tb_semester` (
  `kd_semester` varchar(15) NOT NULL,
  `semester` enum('Ganjil','Genap') NOT NULL,
  `th_pelajaran` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_semester`
--

INSERT INTO `tb_semester` (`kd_semester`, `semester`, `th_pelajaran`) VALUES
('X11', 'Genap', '2012');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_siswa`
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
-- Dumping data untuk tabel `tb_siswa`
--

INSERT INTO `tb_siswa` (`nis`, `nm_siswa`, `kd_kelas`, `tmp_lahir`, `jns_kel`, `agama`, `pend_terakhir`, `alamat`) VALUES
('2836', 'Chika Helgi Nafeza123', '015', 'Pekalongan', 'P', 'Islam', 'TK', 'Ds Randumuktiwaren'),
('2838', 'Dicky Khaliman Yusuf', '015', 'Pekalongan', 'L', 'Islam', 'TK', 'Ds Randumuktiwaren');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_user`
--

CREATE TABLE `tb_user` (
  `username` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `level` varchar(50) NOT NULL,
  `nis` char(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_user`
--

INSERT INTO `tb_user` (`username`, `password`, `nama`, `level`, `nis`) VALUES
('197702282008012', '21232f297a57a5a743894a0e4a801fc3', 'Menik Rhismiarti, S.Pd.SD', 'Wali Kelas', NULL),
('2836', '73acd9a5972130b75066c82595a1fae3', 'Chika Helgi Nafeza', 'Siswa', NULL),
('2838', '21232f297a57a5a743894a0e4a801fc3', 'Dicky Khaliman Yusuf', 'Siswa', NULL),
('789643', '21232f297a57a5a743894a0e4a801fc3', 'elina', 'Tata Usaha', NULL),
('admin', '21232f297a57a5a743894a0e4a801fc3', 'Administrator', 'admin', NULL),
('kepsek', '8561863b55faf85b9ad67c52b3b851ac', 'KEPSEK', 'Kepala Sekolah', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_wali_murid`
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
-- Dumping data untuk tabel `tb_wali_murid`
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
(11, '2838', 'Casmudi', 'Sri Haryanti', 'Buruh', 'Ibu Rumah Tangga', 'Ds randumuktiwaren', '08973765837');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tbl_nilai_keterampilan`
--
ALTER TABLE `tbl_nilai_keterampilan`
  ADD PRIMARY KEY (`kd_nilai_ketrampilan`);

--
-- Indeks untuk tabel `tbl_nilai_pengetahuan`
--
ALTER TABLE `tbl_nilai_pengetahuan`
  ADD PRIMARY KEY (`kd_nilai_pengetahuan`);

--
-- Indeks untuk tabel `tb_ekstrakurikuler`
--
ALTER TABLE `tb_ekstrakurikuler`
  ADD PRIMARY KEY (`kd_ekskul`);

--
-- Indeks untuk tabel `tb_guru`
--
ALTER TABLE `tb_guru`
  ADD PRIMARY KEY (`nip`);

--
-- Indeks untuk tabel `tb_kehadiran`
--
ALTER TABLE `tb_kehadiran`
  ADD PRIMARY KEY (`id_kehadiran`);

--
-- Indeks untuk tabel `tb_kelas`
--
ALTER TABLE `tb_kelas`
  ADD PRIMARY KEY (`kd_kelas`);

--
-- Indeks untuk tabel `tb_kesehatan`
--
ALTER TABLE `tb_kesehatan`
  ADD PRIMARY KEY (`id_aspek`);

--
-- Indeks untuk tabel `tb_nilai`
--
ALTER TABLE `tb_nilai`
  ADD PRIMARY KEY (`id_pengumuman`);

--
-- Indeks untuk tabel `tb_nilai_ekskul`
--
ALTER TABLE `tb_nilai_ekskul`
  ADD PRIMARY KEY (`kd_nilai_ekskul`);

--
-- Indeks untuk tabel `tb_nilai_prestasi`
--
ALTER TABLE `tb_nilai_prestasi`
  ADD PRIMARY KEY (`kd_nilai_prestasi`);

--
-- Indeks untuk tabel `tb_nilai_sikap`
--
ALTER TABLE `tb_nilai_sikap`
  ADD PRIMARY KEY (`kd_nilai_sikap`);

--
-- Indeks untuk tabel `tb_nilai_uts`
--
ALTER TABLE `tb_nilai_uts`
  ADD PRIMARY KEY (`id_nilai_uts`);

--
-- Indeks untuk tabel `tb_predikat`
--
ALTER TABLE `tb_predikat`
  ADD PRIMARY KEY (`kd_predikat`);

--
-- Indeks untuk tabel `tb_semester`
--
ALTER TABLE `tb_semester`
  ADD PRIMARY KEY (`kd_semester`);

--
-- Indeks untuk tabel `tb_siswa`
--
ALTER TABLE `tb_siswa`
  ADD PRIMARY KEY (`nis`);

--
-- Indeks untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`username`);

--
-- Indeks untuk tabel `tb_wali_murid`
--
ALTER TABLE `tb_wali_murid`
  ADD PRIMARY KEY (`id_wali`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tbl_nilai_keterampilan`
--
ALTER TABLE `tbl_nilai_keterampilan`
  MODIFY `kd_nilai_ketrampilan` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `tbl_nilai_pengetahuan`
--
ALTER TABLE `tbl_nilai_pengetahuan`
  MODIFY `kd_nilai_pengetahuan` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tb_kehadiran`
--
ALTER TABLE `tb_kehadiran`
  MODIFY `id_kehadiran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tb_kesehatan`
--
ALTER TABLE `tb_kesehatan`
  MODIFY `id_aspek` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tb_nilai`
--
ALTER TABLE `tb_nilai`
  MODIFY `id_pengumuman` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tb_nilai_ekskul`
--
ALTER TABLE `tb_nilai_ekskul`
  MODIFY `kd_nilai_ekskul` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT untuk tabel `tb_nilai_prestasi`
--
ALTER TABLE `tb_nilai_prestasi`
  MODIFY `kd_nilai_prestasi` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `tb_nilai_sikap`
--
ALTER TABLE `tb_nilai_sikap`
  MODIFY `kd_nilai_sikap` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `tb_nilai_uts`
--
ALTER TABLE `tb_nilai_uts`
  MODIFY `id_nilai_uts` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `tb_predikat`
--
ALTER TABLE `tb_predikat`
  MODIFY `kd_predikat` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `tb_wali_murid`
--
ALTER TABLE `tb_wali_murid`
  MODIFY `id_wali` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
