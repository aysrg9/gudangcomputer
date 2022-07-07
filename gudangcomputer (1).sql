-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 07, 2022 at 09:37 PM
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
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(8) NOT NULL,
  `password` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(5, 'admingc', '$2y$10$jOivimRE2zQF1jKMiV.kKOctj6g0HLdGLxxfd1AQgjo4yswkc3m.a');

-- --------------------------------------------------------

--
-- Table structure for table `buy`
--

CREATE TABLE `buy` (
  `id` int(11) NOT NULL,
  `orderid` varchar(100) NOT NULL,
  `userid` int(11) NOT NULL,
  `alamat` varchar(256) NOT NULL,
  `status` varchar(100) DEFAULT 'waiting for confirmation'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `user_id` int(100) NOT NULL,
  `id_product` int(11) NOT NULL,
  `name` varchar(256) NOT NULL,
  `price` varchar(256) NOT NULL,
  `image` varchar(256) NOT NULL,
  `quantity` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `user_id`, `id_product`, `name`, `price`, `image`, `quantity`) VALUES
(82, 1, 8, 'V-GeN SSD M.2 NVMe', '1500000', '62bb40052e5c0.png', 1),
(85, 1, 18, 'ROG Strix XG27AQM', '5999999', '62c07259e84b0.png', 5);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `picture` varchar(256) NOT NULL,
  `username` varchar(8) NOT NULL,
  `nama` varchar(256) NOT NULL,
  `email` varchar(256) NOT NULL,
  `password` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `picture`, `username`, `nama`, `email`, `password`) VALUES
(1, '62c30b2fc5371.png', 'aysrg9', 'Egyditya', 'gmail@egyditya.com', '$2y$10$91scUU2f.DHS0JabcQAkYexRVfE9IGlvquOZALGEd5LNtFYnkMhQm'),
(15, 'person.png', 'egyditya', 'Egyditya', 'gmail@egy.com', '$2y$10$WxaOQYZ7YrbCFyf5rORnS.H2wionk0CpY0DF3.xcZWNkNtv.8f/G.');

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
(6, 'MSI RTX 3090 TI', 'https://www.nvidia.com/id-id/geforce/graphics-cards/30-series/rtx-3090-3090ti/', '10', '10000000', '62bb3e8ee71d9.png'),
(7, 'Prosesor Intel® Core™ i3-12100F', 'https://ark.intel.com/content/www/id/id/ark/products/132223/intel-core-i312100f-processor-12m-cache-up-to-4-30-ghz.html', '30', '1900000', '62bb3f4a6be9a.png'),
(8, 'V-GeN SSD M.2 NVMe', 'https://v-gen.co.id/ssd/v-gen-ssd-m-2-nvme/', '50', '1500000', '62bb40052e5c0.png'),
(12, 'GTX 1660 Super', 'https://www.techpowerup.com/gpu-specs/geforce-gtx-1660-super.c3458', '5', '5999999', '62bc18e6e5998.png'),
(14, 'AMD Ryzen™ 9 5950X Desktop Processors', 'https://www.amd.com/en/products/cpu/amd-ryzen-9-5950x', '5', '12299000', '62bc1cb0c5097.png'),
(18, 'ROG Strix XG27AQM', 'https://rog.asus.com/id/monitors/27-to-31-5-inches/rog-strix-xg27aqm-model/', '5', '5999999', '62c07259e84b0.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `buy`
--
ALTER TABLE `buy`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `buy`
--
ALTER TABLE `buy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
