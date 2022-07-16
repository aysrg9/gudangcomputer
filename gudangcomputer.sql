-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 16, 2022 at 04:43 PM
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
(5, 'admingc', '$2y$10$jOivimRE2zQF1jKMiV.kKOctj6g0HLdGLxxfd1AQgjo4yswkc3m.a'),
(6, 'admin', '$2y$10$OL20Of8P7QP0cYHeD2QL.e4QIBSrukoptn4tMUsHDPOJP12MxBXfq');

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
(89, 17, 12, 'GTX 1660 Super', '5999999', '62bc18e6e5998.png', 1),
(90, 18, 12, 'GTX 1660 Super', '5999999', '62bc18e6e5998.png', 5);

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
(1, '62c30b2fc5371.png', 'aysrg9', 'Egiditya', 'gmail@egyditya.com', '$2y$10$91scUU2f.DHS0JabcQAkYexRVfE9IGlvquOZALGEd5LNtFYnkMhQm'),
(17, 'person.png', 'ujangboi', 'Ujang', 'gmail@ujang.com', '$2y$10$99Ozn2W4vbiwG9fzj/s1Suq24uemrz3DiDDts/UieR49EZKWPNz7O'),
(18, 'person.png', 'lewy', 'Ridwan Lewangoalski', 'gmail@rl9.com', '$2y$10$wO6N.sV/VImVkMA99OT3B.NDj6c8DUW3RKcrsmZ8MEZ.LzVQ8qHIO');

-- --------------------------------------------------------

--
-- Table structure for table `detailorder`
--

CREATE TABLE `detailorder` (
  `id` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(256) NOT NULL,
  `alamat` varchar(256) NOT NULL,
  `quantity` int(100) NOT NULL,
  `price` varchar(256) NOT NULL,
  `status` varchar(100) NOT NULL DEFAULT 'Waiting'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `detailorder`
--

INSERT INTO `detailorder` (`id`, `id_product`, `user_id`, `name`, `alamat`, `quantity`, `price`, `status`) VALUES
(34, 7, 1, 'Prosesor Intel® Core™ i3-12100F', 'Jakarta, Indonesia', 1, '1900000', 'Confirm'),
(35, 8, 1, 'V-GeN SSD M.2 NVMe', 'Jakarta, Indonesia', 1, '1500000', 'Confirm'),
(38, 6, 1, 'MSI RTX 3090 TI', 'Jakarta, Indonesia', 1, '10000000', 'Confirm'),
(39, 18, 1, 'ROG Strix XG27AQM', 'Jakarta, Indonesia', 1, '5999999', 'Confirm'),
(40, 14, 1, 'AMD Ryzen™ 9 5950X Desktop Processors', 'Jakarta, Indonesia', 1, '12299000', 'Confirm');

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
(6, 'MSI RTX 3090 TI', 'https://www.nvidia.com/id-id/geforce/graphics-cards/30-series/rtx-3090-3090ti/', '5', '10000000', '62bb3e8ee71d9.png'),
(7, 'Prosesor Intel® Core™ i3-12100F', 'https://ark.intel.com/content/www/id/id/ark/products/132223/intel-core-i312100f-processor-12m-cache-up-to-4-30-ghz.html', '22', '1900000', '62bb3f4a6be9a.png'),
(8, 'V-GeN SSD M.2 NVMe', 'https://v-gen.co.id/ssd/v-gen-ssd-m-2-nvme/', '44', '1500000', '62bb40052e5c0.png'),
(12, 'GTX 1660 Super', 'https://www.techpowerup.com/gpu-specs/geforce-gtx-1660-super.c3458', '19', '5999999', '62bc18e6e5998.png'),
(14, 'AMD Ryzen™ 9 5950X Desktop Processors', 'https://www.amd.com/en/products/cpu/amd-ryzen-9-5950x', '4', '12299000', '62bc1cb0c5097.png'),
(18, 'ROG Strix XG27AQM', 'https://rog.asus.com/id/monitors/27-to-31-5-inches/rog-strix-xg27aqm-model/', '2', '5999999', '62c07259e84b0.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
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
-- Indexes for table `detailorder`
--
ALTER TABLE `detailorder`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `detailorder`
--
ALTER TABLE `detailorder`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
