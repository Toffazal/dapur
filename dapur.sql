-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 01, 2022 at 06:08 PM
-- Server version: 10.3.35-MariaDB-cll-lve
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dapurma3_dapur`
--

-- --------------------------------------------------------

--
-- Table structure for table `balasan`
--

CREATE TABLE `balasan` (
  `id` int(11) NOT NULL,
  `kategori` varchar(100) NOT NULL,
  `gambar` varchar(200) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `balasan` varchar(500) NOT NULL,
  `tanggal` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `id` int(11) NOT NULL,
  `slug` varchar(100) NOT NULL,
  `galeri` varchar(200) NOT NULL,
  `kategori` varchar(100) NOT NULL,
  `alt` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`id`, `slug`, `galeri`, `kategori`, `alt`) VALUES
(1, 'bolu-ulang-tahun', 'bolu-ulang-tahun.jpg', 'bolu ulang tahun', 'bolu ulang tahun dapur mama ain'),
(2, 'bolu-ulang-tahun', 'bolu-ulang-tahun2.jpg', 'bolu ulang tahun', 'bolu ulang tahun dapur mama ain'),
(3, 'bolu-ulang-tahun', 'bolu-ulang-tahun3.jpg', 'bolu ulang tahun', 'bolu ulang tahun dapur mama ain'),
(4, 'bolu-ulang-tahun', 'bolu-ulang-tahun4.jpg', 'bolu ulang tahun', 'bolu ulang tahun dapur mama ain'),
(5, 'bolu-ulang-tahun', 'bolu-ulang-tahun5.jpg', 'bolu ulang tahun', 'bolu ulang tahun dapur mama ain'),
(6, 'bolu-ulang-tahun', 'IMG-20210710-WA0003.jpg', 'Bolu ulang tahun', 'Bolu ulang tahun mama ain'),
(7, 'bolu-ulang-tahun', 'IMG-20210710-WA0005.jpg', 'Bolu ulang tahun', 'Bolu ulang tahun mama ain'),
(8, 'bolu-ulang-tahun', 'IMG-20210707-WA0006.jpg', 'Bolu ulang tahun', 'Bolu ulang tahun mama ain'),
(9, 'bolu-ulang-tahun', 'IMG-20210706-WA0002.jpg', 'Bolu ulang tahun', 'Bolu ulang tahun mama ain'),
(10, 'bolu-ulang-tahun', 'IMG-20210706-WA0023.jpg', 'Bolu ulang tahun', 'Bolu ulang tahun mama ain'),
(11, 'bolu-ulang-tahun', 'IMG-20210702-WA0016.jpg', 'Bolu ulang tahun', 'Bolu ulang tahun mama ain'),
(12, 'bolu-ulang-tahun', 'IMG_20210702_170514.JPG', 'Bolu ulang tahun', 'Bolu ulang tahun mama ain'),
(13, 'bolu-ulang-tahun', 'IMG-20210628-WA0007.jpg', 'Bolu ulang tahun', 'Bolu ulang tahun mama ain'),
(14, 'bolu-ulang-tahun', 'IMG-20210620-WA0010.jpg', 'Bolu ulang tahun', 'Bolu ulang tahun mama ain'),
(15, 'bolu-ulang-tahun', 'IMG-20210615-WA0006.jpg', 'Bolu ulang tahun', 'Bolu ulang tahun mama ain'),
(16, 'bolu-ulang-tahun', 'IMG-20210222-WA0007.jpg', 'Bolu ulang tahun', 'Bolu ulang tahun mama ain'),
(17, 'bolu-ulang-tahun', 'IMG-20201213-WA0005.jpg', 'Bolu ulang tahun', 'Bolu ulang tahun mama ain'),
(18, 'bolu-ulang-tahun', 'IMG-20201113-WA0003.jpg', 'Bolu ulang tahun', 'Bolu ulang tahun mama ain'),
(19, 'bolu-ulang-tahun', 'IMG-20201108-WA0004.jpg', 'Bolu ulang tahun', 'Bolu ulang tahun mama ain'),
(20, 'bolu-ulang-tahun', 'IMG-20201108-WA0003.jpg', 'Bolu ulang tahun', 'Bolu ulang tahun mama ain'),
(21, 'bolu-ulang-tahun', 'IMG-20201011-WA0005.jpg', 'Bolu ulang tahun', 'Bolu ulang tahun mama ain'),
(22, 'bolu-ulang-tahun', 'IMG-20200912-WA0004.jpg', 'Bolu ulang tahun', 'Bolu ulang tahun mama ain'),
(23, 'brownis-mini', 'IMG-20210712-WA0007.jpg', 'Brownis mini', 'Brownis mini'),
(24, 'brownis-mini', 'IMG-20210712-WA0003.jpg', 'Brownis mini', 'Brownis mini'),
(25, 'brownis-mini', 'IMG-20210712-WA0004.jpg', 'Brownis mini', 'Brownis mini'),
(26, 'brownis-mini', 'IMG-20210712-WA0002.jpg', 'Brownis mini', 'Brownis mini'),
(27, 'brownis-mini', 'IMG-20210712-WA0001.jpg', 'Brownis mini', 'Brownis mini'),
(28, 'kue-sepit', '1648910016_e30693d3bbda2bccd75c.png', 'Kue Sepit', 'Gambar Kue Sepit Original'),
(29, 'kue-sepit', '1648910074_4474f7ae6a8db67d7023.png', 'Kue Sepit', 'Gambar Kue Sepit Coklat'),
(30, 'kue-sepit', '1648910127_c5b7e39c7cd3916d778e.jpg', 'Kue Sepit', 'Gambar Kue Sepit Durian');

-- --------------------------------------------------------

--
-- Table structure for table `komentar`
--

CREATE TABLE `komentar` (
  `id` int(11) NOT NULL,
  `kategori` varchar(100) NOT NULL,
  `foto` varchar(200) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `tanggapan` varchar(100) NOT NULL,
  `komentar` varchar(500) NOT NULL,
  `tanggal` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `langganan`
--

CREATE TABLE `langganan` (
  `id` int(11) NOT NULL,
  `email` varchar(200) NOT NULL,
  `tanggal` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `langganan`
--

INSERT INTO `langganan` (`id`, `email`, `tanggal`) VALUES
(1, 'muhammad.toffazal@gmail.com', '06-07-2021'),
(2, 'muhammad.toffazal00@gmail.com', '09-07-2021');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `slug` varchar(100) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `kategory` varchar(200) NOT NULL,
  `harga` varchar(100) NOT NULL,
  `keterangan` varchar(100) NOT NULL,
  `deskripsi` varchar(500) NOT NULL,
  `gambar` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `slug`, `nama`, `kategory`, `harga`, `keterangan`, `deskripsi`, `gambar`) VALUES
(1, 'bolu-ulang-tahun', 'Bolu Ulang Tahun', 'Bolu', '50.000~200.000', 'TERLARIS', 'Gambar yang anda lihat di preview & gallery adalah hasil yang sudah pernah dibuat sebelumnya, Jika ingin bolu yang seperti di gambar silakan simpan gambar bolu yang anda inginkan dengan cara: tekan dan tahan gambar yang anda inginkan lalu klik \"simpan gambar\". Jika punya request bentuk/tema lain silakan kirim foto bolu yang anda inginkan (tingkat kemiripan 90%).', 'bolu-ulang-tahun.jpg'),
(3, 'bolu-tape', 'Bolu Tape', 'Bolu', '35.000~45.000', '', 'Bolu nya lembut ya', 'IMG-20210708-WA0003.jpg'),
(4, 'bolu-pisang', 'Bolu Pisang', 'Bolu', '35.000~40.000', '', 'Bolu nya lembut di terasa pisang nya', 'IMG-20210707-WA0009.jpg'),
(5, 'bolu-mangga', 'Bolu Mangga', 'Bolu', '35.000', '', 'Bolu lembut ', 'IMG-20210520-WA0003.jpg'),
(6, 'bolu-pandan', 'Bolu Pandan', 'Bolu', '30.000~35.000', '', 'Bolu lembut asli wrna daun pandan', 'IMG-20210701-WA0005.jpg'),
(7, 'bolu-pandan-bertingkat', 'Bolu Pandan Bertingkat', 'Bolu', '30.000', '', 'Bolu nya lembut ya', 'IMG-20210701-WA0011.jpg'),
(9, 'pulut-mangga-thai', 'Pulut Mangga Thai', 'Cemilan', '12.000', '', 'Pulut nya lemak mangga nya manis ya', 'IMG-20210603-WA0004.jpg'),
(10, 'bolu-pelangi', 'Bolu pelangi', 'Bolu', '1.000~10.000', '', 'Pesan 1 box isi 8 =10000, Beli 50+ pcs di hitung 1.000 /pcs', 'IMG-20210107-WA0011.jpg'),
(12, 'tenteng-jahe', 'Tenteng Jahe', 'Kue kering', '75.000 /kg', '', 'Terasa jahe nya, rapuh di sedap', 'IMG-20210224-WA0016.jpg'),
(13, 'tenteng-kacang', 'Tenteng Kacang', 'Kue kering', '75.000 /kg', '', 'Sedap ful kacang', 'IMG-20210319-WA0010.jpg'),
(14, 'brownis-mini', 'Brownis Mini', 'Bolu', '25.000', '', '1 box 3pcs 25000,bronis nya nyoklat banget', 'IMG-20210712-WA0005.jpg'),
(15, 'sagon-kelapa', 'Sagon Kelapa', 'Kue raya', '80.000', 'TERBATAS', 'Rapuh di lemak kelapa nya', 'IMG-20210421-WA0009.jpg'),
(16, 'bingka-pandan', 'Bingka Pandan', 'Kue basah', '22.000~30.000', '', 'Sedap kue nya asli daun pandan', 'IMG-20210413-WA0063.jpg'),
(17, 'wingko-babat', 'Wingko Babat', 'Kue basah', '25.000', '', 'Lemak,sedap kue nya', 'IMG-20210617-WA0010.jpg'),
(19, 'bolu-gulung', 'Bolu Gulung', 'Bolu', '35.000', '', 'Bolu lembut', 'IMG-20210531-WA0003.jpg'),
(20, 'donat-toping-coklat-leleh-ceres', 'Donat Toping Coklat Leleh Ceres', 'Cemilan', '10.000 /box', '', '1 box isi 7 pcs', 'IMG-20210630-WA0007.jpg'),
(21, 'boboloni-srikaya', 'Boboloni Srikaya', 'Cemilan', '10.000 /box', '', '1box isi 5 pcs,lembut di enak terasa srikaya nya', 'IMG-20210608-WA0001.jpg'),
(22, 'risol', 'Risol', 'Cemilan', '10.000 /box', '', '1box isi 8 pcs 10000', 'IMG-20210107-WA0009.jpg'),
(24, 'kue-sepit', 'Kue Sepit', 'Kue raya', '80.000~100.000', 'TERLARIS', 'Kue Sepit Original : Rp80.000 (Tahan Selama 1 bulan) - Sepit Coklat : Rp100.000 (Tahan 3 hari) - Sepit Durian : Rp100.000 (Tahan 1 bulan). Semuanya tanpa pengawet ya', 'approved-quality-designify-removebg-preview.png'),
(25, 'telur-gabus', 'Telur Gabus', 'Kue raya', '105.000', 'TERBATAS', 'Telur gabus keju menggunakan keju craft, dan pastinya rapuh', 'plain-designify.png'),
(26, 'kue-nastar', 'Kue Nastar', 'Kue raya', '100.000', 'TERBATAS', 'Tersedia Varian : Nanas &amp; Coklat', '276174210_1302396850242265_1337209716971234024_n (1).jpg'),
(27, 'kue-skipi', 'Kue Skipi', 'Kue raya', '110.000', 'TERBATAS', 'Kue Skipi Dapur Mama Ain', '276151254_1302396736908943_4962515038478535037_n.jpg'),
(28, 'kue-bangkit-kampung', 'Kue Bangkit Kampung', 'Kue raya', '100.000', 'TERBATAS', 'Kue Bangkit Kampung Dapur Mama Ain', '2021-03-23.jpg'),
(29, 'kembang-loyang', 'Kembang Loyang', 'Kue raya', '85.000', 'TERBATAS', 'Kembang Loyang Dapur Mama Ain', '2021-03-23 (1).jpg'),
(30, 'kue-marke', 'Kue Marke', 'Kue raya', '85.000', 'TERBATAS', 'Kue Marke Dapur Mama Ain', '2021-03-23 (3).jpg'),
(31, 'keripik-pisang', 'Keripik Pisang', 'Kue raya', '65.000', 'TERBATAS', 'Keripik Pisang Rapuh Dapur Mama Ain', '276174692_1302396760242274_3941967596110936035_n.jpg'),
(32, 'kue-bawang', 'Kue Bawang', 'Kue raya', '75.000', 'TERBATAS', 'Kue Bawang Dapur Mama Ain', '2021-03-23 (2).jpg'),
(33, 'tenteng-kacang', 'Tenteng Kacang', 'Cemilan', '75.000', 'TERBATAS', 'Tenteng kacang rapuh, dan 100% menggunakan gula asli tanpa sari gula', '276013901_1302396700242280_6227819810636010715_n (1).jpg'),
(34, 'tenteng-jahe', 'Tenteng Jahe', 'Kue raya', '75.000', 'TERBATAS', 'Tenteng Jahe Dapur Mama Ain', 'tenteng jahe.jpg'),
(35, 'wajik-bandung', 'Wajik Bandung', 'Kue raya', '70.000', 'TERBATAS', 'Wajik bandung Dapur Mama Ain', '276125490_1302396633575620_5334046646115024988_n.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `pin`
--

CREATE TABLE `pin` (
  `id` int(11) NOT NULL,
  `pin` varchar(10) NOT NULL,
  `kategori` varchar(100) NOT NULL,
  `foto` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `terbatas`
--

CREATE TABLE `terbatas` (
  `id` int(11) NOT NULL,
  `slug` varchar(100) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `kategory` varchar(100) NOT NULL,
  `harga` varchar(100) NOT NULL,
  `stok` varchar(100) NOT NULL,
  `deskripsi` varchar(500) NOT NULL,
  `pengiriman` varchar(100) NOT NULL,
  `gambar` varchar(200) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(300) NOT NULL,
  `gambar` varchar(100) NOT NULL,
  `role` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `email`, `password`, `gambar`, `role`) VALUES
(1, 'dapurmamaain@gmail.com', '$2y$10$pob62e9OZ810cspqofvk/eixFEQNUVeYg1spKh3mKlMmX9Pw2hYXe', 'logo.jpg', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `balasan`
--
ALTER TABLE `balasan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `komentar`
--
ALTER TABLE `komentar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `langganan`
--
ALTER TABLE `langganan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pin`
--
ALTER TABLE `pin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `terbatas`
--
ALTER TABLE `terbatas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `balasan`
--
ALTER TABLE `balasan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `komentar`
--
ALTER TABLE `komentar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `langganan`
--
ALTER TABLE `langganan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `pin`
--
ALTER TABLE `pin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `terbatas`
--
ALTER TABLE `terbatas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
