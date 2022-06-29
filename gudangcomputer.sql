-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 29, 2022 at 12:11 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gudangcomputer`
--

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `nama` varchar(256) NOT NULL,
  `spesifikasi` varchar(256) NOT NULL,
  `stock` varchar(256) NOT NULL,
  `price` varchar(256) NOT NULL,
  `gambar` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `nama`, `spesifikasi`, `stock`, `price`, `gambar`) VALUES
(6, 'MSI RTX 3090 TI', 'https://www.nvidia.com/id-id/geforce/graphics-cards/30-series/rtx-3090-3090ti/', '10', 'Rp 10.000.000', '62bb3e8ee71d9.png'),
(7, 'Prosesor Intel® Core™ i3-12100F', 'https://ark.intel.com/content/www/id/id/ark/products/132223/intel-core-i312100f-processor-12m-cache-up-to-4-30-ghz.html', '30', 'Rp 1.900.000', '62bb3f4a6be9a.png'),
(8, 'V-GeN SSD M.2 NVMe', 'https://v-gen.co.id/ssd/v-gen-ssd-m-2-nvme/', '50', 'Rp 1.500.000', '62bb40052e5c0.png'),
(12, 'GTX 1660 Super', 'https://www.techpowerup.com/gpu-specs/geforce-gtx-1660-super.c3458', '5', 'Rp 5.999.999', '62bc18e6e5998.png'),
(14, 'AMD Ryzen™ 9 5950X Desktop Processors', 'https://www.amd.com/en/products/cpu/amd-ryzen-9-5950x', '5', 'Rp 12.299.000', '62bc1cb0c5097.png');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(8) NOT NULL,
  `password` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`) VALUES
(1, 'admin', '$2y$10$57791uZkaXsjCYBzihV3Reqlphr0WvL.Hldli9IaWzVN0DaqCdSDm');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `product`
--
ALTER TABLE `product`
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
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
