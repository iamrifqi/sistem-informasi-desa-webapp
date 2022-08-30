-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 23, 2022 at 08:28 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `suta`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `username` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `image` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `username`, `password`, `email`, `image`) VALUES
(1, 'Sutapranan', 'admin123', '$2y$10$/tZsav0/eDqa2nC8yPXDYeFbQiXLUu1GzncrBAAWVO/s8ZTDBCNX6', 'desasutapranan@gmail.com', 'default1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `artikeldanberita`
--

CREATE TABLE `artikeldanberita` (
  `id` int(11) NOT NULL,
  `judul` text NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `gambar` varchar(128) NOT NULL,
  `tanggal` int(11) NOT NULL,
  `isi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `artikeldanberita`
--

INSERT INTO `artikeldanberita` (`id`, `judul`, `id_kategori`, `gambar`, `tanggal`, `isi`) VALUES
(3, 'Pelatihan Bimtek Web Desa untuk meningkatkan kreadibilitas Perangkat Desa', 2, '20220726_220515.jpg', 1658852803, 'Slawi- Beberapa Perangkat desa kecamatan dukuhturi dan pangkah mengikuti Pelatihan bimtek web desa yang diselenggarakan oleh Diskominfo Kabupaten Tegal (16/10). \r\n<br><br>\r\nTujuan diadakannya bimtek tersebut ialah untuk memfasilitasi dan memberikan ilmu untuk desa agar dapat membuat web. karna sistem informasi di era global ini harusnya meningkat. untuk membuat suatu web agar bisa dinikmati oleh kalangan luas tidaklah hanya satu hari kelar, maka dari itu Diskominfo kabupaten tegal memfasilitasi agar nantinya bisa terbentuk web yang baik, dan selanjutnya diharapkan dengan ilmu yang telah didapat perangkat desa tersebut mampu mengeksplore dan menjalankan web tersebut dengan baik.'),
(4, 'Sosialisasi dan Pelatihan Jurnalistik untuk Website Desa SeKabupaten Tegal', 2, '20220726_220446.jpg', 1658853229, 'Slawi, Sejumlah perangkat desa Sekabupaten tegal hari ini (22/11) mengikuti sosialisasi dan pelatihan tentang jurnalistik yang terbagi dalam 3 Ruangan. Salah satu ruangan yang diisi oleh perangkat desa sekecamatan dukuhturi adalah di Aula pertemuan gedung Candra Kirana Kabupaten Tegal.\r\n<br><br>\r\nKegiatan ini bertujuan agar perangkat desa yang mengikuti kegiatan ini mampu menulis berita dengan baik dan benar serta dapat menginformasikan berita yang dibuat kepada masyarakat melalui website yang telah dimiliki oleh desa.\r\n<br><br>\r\nSelanjutnya, kegiatan ini seharusnya mampu dan bisa memajukan kinerja perangkat desa dalam hal IT agar tidak tertinggal oleh kemajuan teknologi yang sangat pesat ini.\r\n<br><br>\r\nMaka dari itu, dari dinas pemberdayaan masyarakat desa kabupaten tegal mau memfasilitasi kegiatan ini.'),
(46, 'dqwdqw', 1, '750x500xbrickpile_jpg_pagespeed_ic_9in6q3Rpj-.jpg', 1659517901, 'dqwdqwdqwdq'),
(47, 'Karang Taruna', 6, '20220726_220141.jpg', 1659529216, 'Rapat Karang Taruna');

-- --------------------------------------------------------

--
-- Table structure for table `bumdes`
--

CREATE TABLE `bumdes` (
  `id` int(11) NOT NULL,
  `simbol` varchar(128) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `isi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bumdes`
--

INSERT INTO `bumdes` (`id`, `simbol`, `nama`, `isi`) VALUES
(1, 'bi bi-book', 'Sejarah BUMDes', 'Halaman ini berisi sejarah dari BUMDes.'),
(2, 'bi bi-filter-square', 'Visi dan Misi BUMDes', 'Halaman ini berisi Visi dan Misi BUMDes.');

-- --------------------------------------------------------

--
-- Table structure for table `filter`
--

CREATE TABLE `filter` (
  `id` int(11) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `filter` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `filter`
--

INSERT INTO `filter` (`id`, `nama`, `filter`) VALUES
(1, 'Kegiatan Desa', 'kegiatandesa'),
(2, 'Lembaga Desa', 'lembagadesa'),
(3, 'Program Kerja', 'programkerja');

-- --------------------------------------------------------

--
-- Table structure for table `galeri`
--

CREATE TABLE `galeri` (
  `id` int(11) NOT NULL,
  `judul` varchar(128) NOT NULL,
  `gambar` varchar(128) NOT NULL,
  `filter` varchar(128) NOT NULL,
  `tanggal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `galeri`
--

INSERT INTO `galeri` (`id`, `judul`, `gambar`, `filter`, `tanggal`) VALUES
(26, 'Gerbang Desa Sutapranan', '20220726_221342.jpg', 'kegiatandesa', 1658905643),
(27, 'Balai Desa Sutapranan', '20220726_220515.jpg', 'kegiatandesa', 1658905673),
(28, 'Potensi Desa Sutapranan', '20220726_221000.jpg', 'kegiatandesa', 1658905705),
(29, 'Karang Taruna', '20220726_220306.jpg', 'lembagadesa', 1658905746),
(30, 'Kegiatan Karang Taruna', '20220726_220141.jpg', 'lembagadesa', 1658905773),
(31, 'Rapat Karang Taruna', '20220726_220403.jpg', 'lembagadesa', 1658905797),
(32, 'Kunjungan KODIM-0712', '20220726_221103.jpg', 'programkerja', 1658905970),
(33, 'Bantuan dari KODIM-0712', '20220726_221138.jpg', 'programkerja', 1658906072),
(34, 'Rapat PKK', '20220726_220446.jpg', 'programkerja', 1658906149);

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id` int(11) NOT NULL,
  `kategori` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id`, `kategori`) VALUES
(1, 'Artikel'),
(2, 'Berita'),
(6, 'Desa');

-- --------------------------------------------------------

--
-- Table structure for table `kepaladesa`
--

CREATE TABLE `kepaladesa` (
  `id` int(11) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `jabatan` varchar(128) NOT NULL,
  `gambar` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kepaladesa`
--

INSERT INTO `kepaladesa` (`id`, `nama`, `jabatan`, `gambar`) VALUES
(1, 'Alip Indrajati', 'Kepala Desa', 'kades1.png');

-- --------------------------------------------------------

--
-- Table structure for table `kontak`
--

CREATE TABLE `kontak` (
  `id` int(11) NOT NULL,
  `simbol` varchar(128) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `isi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kontak`
--

INSERT INTO `kontak` (`id`, `simbol`, `nama`, `isi`) VALUES
(1, 'bi bi-geo-alt', 'Lokasi', 'Jl. KH Abu Suud No.1 Dukuhturi 52192 Tegal Jawa Tengah'),
(2, 'bi bi-envelope', 'Email', 'desasutapranan12@gmail.com'),
(3, 'bi bi-phone', 'Telepon', '087844503322');

-- --------------------------------------------------------

--
-- Table structure for table `papaninformasi`
--

CREATE TABLE `papaninformasi` (
  `id` int(11) NOT NULL,
  `simbol` varchar(128) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `isi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `papaninformasi`
--

INSERT INTO `papaninformasi` (`id`, `simbol`, `nama`, `isi`) VALUES
(1, 'bi bi-bank', 'Informasi Desa', 'Ini adalah contoh informasi desa yang diberikan ke warga desa sutapranan saja.'),
(2, 'bi bi-plus-square', 'Informasi Kesehatan', 'Ini adalah contoh informasi kesehatan yang memberikan informasi mengenai kegiatan posyandu dan vaksinasi.'),
(3, 'bi bi-globe2', 'Informasi Umum', 'Ini adalah contoh informasi umum yang diberikan kepada masyarakat umum diluar desa sutapranan.');

-- --------------------------------------------------------

--
-- Table structure for table `pengurus`
--

CREATE TABLE `pengurus` (
  `id` int(11) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `jabatan` varchar(128) NOT NULL,
  `gambar` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pengurus`
--

INSERT INTO `pengurus` (`id`, `nama`, `jabatan`, `gambar`) VALUES
(5, 'Puji Sulistyaningsih', 'Sekretaris BUMDes', 'mbatia.png');

-- --------------------------------------------------------

--
-- Table structure for table `perangkatdesa`
--

CREATE TABLE `perangkatdesa` (
  `id` int(11) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `jabatan` varchar(128) NOT NULL,
  `deskripsi` text NOT NULL,
  `gambar` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `perangkatdesa`
--

INSERT INTO `perangkatdesa` (`id`, `nama`, `jabatan`, `deskripsi`, `gambar`) VALUES
(34, 'Sri Rahayuningsih', 'Kepala Seksi Pemerintahan', 'Bertugas sebagai palaksana teknik yang membantu Kepala Desa di bidang pemerintahan, menyusun dan mengevaluasi data di bidang pemerintahan desa, mengumpulkan bahan dalam rangka pembinaan wilayah dan masyarakat dan pelaksanakan kegiatan pelayanan administrasi pertahanan dan administrasi perlindungan masyarakat.', 'kaper.png'),
(35, 'Moh. Ali', 'Kepala Seksi Kesejahteraan dan Pelayanan', '', 'lebe.png'),
(36, 'Faisol, S.Th.I', 'Sekretaris Desa', '', 'sekdes.png'),
(37, 'Puji Sulistyaningsih', 'Staff Desa', '', 'mbatia.png'),
(38, 'Puji Rakhmawati', 'Kepala Urusan Keuangan', '', 'bupuji.png'),
(39, 'Bulyamin', 'Kepala Urusan Pembangunan dan Perencanaan', '', 'umbul.png');

-- --------------------------------------------------------

--
-- Table structure for table `perdes`
--

CREATE TABLE `perdes` (
  `id` int(11) NOT NULL,
  `tahun` varchar(128) NOT NULL,
  `link` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `perdes`
--

INSERT INTO `perdes` (`id`, `tahun`, `link`) VALUES
(1, '2019', 'https://drive.google.com/drive/folders/1qveMtmsx_JbzHvMmVxiTKyvtDU0Sxh08?usp=sharing'),
(2, '2020', 'https://drive.google.com/drive/folders/1iDvJ_B5dndv0YiztxqgYclXcTVXgjY0F?usp=sharing'),
(3, '2021', 'https://drive.google.com/drive/folders/1iDvJ_B5dndv0YiztxqgYclXcTVXgjY0F?usp=sharing');

-- --------------------------------------------------------

--
-- Table structure for table `perkades`
--

CREATE TABLE `perkades` (
  `id` int(11) NOT NULL,
  `tahun` varchar(16) NOT NULL,
  `link` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pesan`
--

CREATE TABLE `pesan` (
  `id` int(11) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `alamat` text NOT NULL,
  `tanggal` int(11) NOT NULL,
  `isi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pesan`
--

INSERT INTO `pesan` (`id`, `nama`, `alamat`, `tanggal`, `isi`) VALUES
(7, 'Muhamad Rifqi', 'Desa Sutapranan RT.04 RW.02 No.24 Kecamatan Dukuhturi Kabupaten Tegal', 1659734057, 'Contoh pesan layanan aduan masyarakat');

-- --------------------------------------------------------

--
-- Table structure for table `potensi`
--

CREATE TABLE `potensi` (
  `id` int(11) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `gambar` varchar(128) NOT NULL,
  `isi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `potensi`
--

INSERT INTO `potensi` (`id`, `nama`, `gambar`, `isi`) VALUES
(3, 'Batu Bata Merah', '750x500xbrickpile_jpg_pagespeed_ic_9in6q3Rpj-.jpg', '&nbsp; &nbsp; &nbsp; Desa Sutapranan merupakan wilayah paling potensial untuk usaha home industry pengrajin batu bata merah dan pertanian. Hal tersebut didukung oleh kondisi geografis, dan daerah industri serta keadaan yang berbatasan dengan wilayah kota Tegal.\r\n                                        <br>\r\n                                        &nbsp; &nbsp; &nbsp; Dukungan pemerintah daerah untuk pengembangan potensi desa yang ada diwujudkan dengan menetapkan wilayah Desa Sutapranan sebagai bagian Kawasan Daerah industry batu bata merah.');

-- --------------------------------------------------------

--
-- Table structure for table `tokens`
--

CREATE TABLE `tokens` (
  `id` int(11) NOT NULL,
  `token` varchar(256) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tokens`
--

INSERT INTO `tokens` (`id`, `token`, `user_id`, `created`) VALUES
(20, 'bc1fb9329bdb48902b501745b8a56a', 1, '2022-08-02'),
(21, 'bd0134a8f7eb2a264997203b13bde0', 1, '2022-08-02'),
(22, 'ec668eafbe30929a7b480cbf34b4ec', 1, '2022-08-02'),
(23, '4d06337a7c066c05eb8a1b10851e7c', 1, '2022-08-02'),
(24, 'bb8b50e77d9b3363aae33c6e7c1d7c', 1, '2022-08-02'),
(25, '66ccd7ca8ac08d35fbfa5da671e098', 1, '2022-08-02'),
(26, '9ce74f872942d2a307804c836ad7d2', 1, '2022-08-02'),
(27, 'f4cfdb940a4caee4a4b6e7db03a6d5', 1, '2022-08-02'),
(28, 'c439391b7f24c522b3a588631332c2', 1, '2022-08-02'),
(29, '068b6b3e9278d01cb7ddff61436401', 1, '2022-08-02'),
(30, '7490971a80930a08b1a14416a36035', 1, '2022-08-02'),
(31, 'f73819b644f05e4bfd68721360ad75', 1, '2022-08-02'),
(32, 'acdf46c869bf5015d169b277f76f9c', 1, '2022-08-02'),
(33, 'a0f58f5a712d06a7411df903074682', 1, '2022-08-02'),
(34, '048d813f854a009d7f5108601aae0e', 1, '2022-08-02'),
(35, '3d6f4d3235cce355fd450f20f88989', 1, '2022-08-02'),
(36, '1a9fb196fa1424aa87ab7a26391745', 1, '2022-08-02'),
(37, '8e0bdc7908a8917128072be56c2577', 1, '2022-08-02'),
(38, 'aadaabebf233b1f255b206bd71980a', 1, '2022-08-02'),
(39, '1ae46d9a3ccffa02444b6eb5321cec', 1, '2022-08-02'),
(40, '0cf6f24f4891914a7491f058d069dc', 1, '2022-08-02'),
(41, '4bedb65c9088e995178a90a929a2ac', 1, '2022-08-02'),
(42, 'd2115ad155439a65f3223beb8206d5', 1, '2022-08-02'),
(43, '9a3c3d0f7d6090e39e5ac64ad9385c', 1, '2022-08-02'),
(44, '11a4db389e93543cc01ff84624ef62', 1, '2022-08-02'),
(45, '7a7a9a3f7dbe299870550de656895c', 1, '2022-08-02'),
(46, 'ec9fdd77e928bd203d62634dada951', 1, '2022-08-02'),
(47, 'a9e89d1d3ce065034e0be56f092dfe', 1, '2022-08-02'),
(48, 'dc2b61e9f01b5f3f45367bf1833906', 1, '2022-08-02'),
(49, '9e868c69f0a4c387d025aaf8d835a1', 1, '2022-08-02'),
(50, '3c0c1760e8cf3606273ad1d1ccc8e7', 1, '2022-08-02'),
(51, 'ff70fdd8a12b4951a6f3a8d60d465e', 1, '2022-08-02'),
(52, '98ca233fdbc84b5dc6f62f0c348973', 1, '2022-08-02'),
(53, '0abe96c859361fa9830c66437320e6', 1, '2022-08-02'),
(54, '9f5776f490606d167933ed97689458', 1, '2022-08-02'),
(55, 'c678028c46bc5926289e8ff74bdc27', 1, '2022-08-02'),
(56, 'fa481239af16bdcb82d83e2b14c968', 1, '2022-08-02'),
(57, '681b3cd670bd27434f58b2e75849ae', 1, '2022-08-02'),
(58, 'f640c4841dd6fb820f8ff3589d00cb', 1, '2022-08-02'),
(59, '85e530a6a00ac656656ccc2636aa92', 1, '2022-08-02'),
(60, '8844758d073dacc5fc56ae081444eb', 1, '2022-08-02'),
(61, '362517230c036a80f9a89aea4e6122', 1, '2022-08-02'),
(62, 'bfcb3fad97f77f3adc03a9cad00e15', 1, '2022-08-02'),
(63, 'b427b97799f4728901b3a55f38bb17', 1, '2022-08-02'),
(64, '9517191f0ce6e85d4daf5849a006dc', 1, '2022-08-02'),
(65, '606cd85ae37f04b9c70770dea6b599', 1, '2022-08-04');

-- --------------------------------------------------------

--
-- Table structure for table `unitusaha`
--

CREATE TABLE `unitusaha` (
  `id` int(11) NOT NULL,
  `nama` text NOT NULL,
  `isi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `unitusaha`
--

INSERT INTO `unitusaha` (`id`, `nama`, `isi`) VALUES
(2, 'Pengelolaan Sampah', 'Contoh saja.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `artikeldanberita`
--
ALTER TABLE `artikeldanberita`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bumdes`
--
ALTER TABLE `bumdes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `filter`
--
ALTER TABLE `filter`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `galeri`
--
ALTER TABLE `galeri`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kepaladesa`
--
ALTER TABLE `kepaladesa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kontak`
--
ALTER TABLE `kontak`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `papaninformasi`
--
ALTER TABLE `papaninformasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pengurus`
--
ALTER TABLE `pengurus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `perangkatdesa`
--
ALTER TABLE `perangkatdesa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `perdes`
--
ALTER TABLE `perdes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `perkades`
--
ALTER TABLE `perkades`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pesan`
--
ALTER TABLE `pesan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `potensi`
--
ALTER TABLE `potensi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tokens`
--
ALTER TABLE `tokens`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `unitusaha`
--
ALTER TABLE `unitusaha`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `artikeldanberita`
--
ALTER TABLE `artikeldanberita`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `bumdes`
--
ALTER TABLE `bumdes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `filter`
--
ALTER TABLE `filter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `galeri`
--
ALTER TABLE `galeri`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `kepaladesa`
--
ALTER TABLE `kepaladesa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `kontak`
--
ALTER TABLE `kontak`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `papaninformasi`
--
ALTER TABLE `papaninformasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pengurus`
--
ALTER TABLE `pengurus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `perangkatdesa`
--
ALTER TABLE `perangkatdesa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `perdes`
--
ALTER TABLE `perdes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `perkades`
--
ALTER TABLE `perkades`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pesan`
--
ALTER TABLE `pesan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `potensi`
--
ALTER TABLE `potensi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tokens`
--
ALTER TABLE `tokens`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `unitusaha`
--
ALTER TABLE `unitusaha`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
