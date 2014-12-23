-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 23, 2014 at 01:24 AM
-- Server version: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `the_griffin_coffee_shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
`id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `hashed_password` varchar(60) NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=67899 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `hashed_password`) VALUES
(67898, 'admin', '$2y$10$NGU2YTI5MTA0ZWNiYWFhZ.XGPGziZAnCjN9FC2AGKTc3e1NxHIKQy'),
(67896, 'queenzee', '$2y$10$ZjBlMTRlMzdhNTRiZGFhZ.rEgbi9OGiNEubTxp8/s1UrnQcGv9UxW');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE IF NOT EXISTS `contact` (
`contact_id` int(5) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `jenis` int(3) DEFAULT NULL,
  `telepon` int(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `pesan` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`contact_id`, `nama`, `jenis`, `telepon`, `email`, `pesan`) VALUES
(2, '', 0, 0, '', '		 '),
(3, '', 0, 0, '', '		 '),
(4, 'jpwqjdpwq', 0, 1232, '31e21', '	qwdqw	 ');

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE IF NOT EXISTS `gallery` (
`id` int(10) NOT NULL,
  `title` varchar(20) NOT NULL,
  `body` text NOT NULL,
  `file` text NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`id`, `title`, `body`, `file`) VALUES
(1, 'coffee1', 'coffee1', 'images/coffee1.jpg'),
(2, 'coffee2', 'coffee2', 'images/coffee2.jpg'),
(3, 'coffee3', 'coffee3', 'images/coffee3.jpg'),
(4, 'coffee4', 'coffee4', 'images/coffee4.jpg'),
(5, 'coffee5', 'coffee5', 'images/coffee5.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `page`
--

CREATE TABLE IF NOT EXISTS `page` (
`id` int(10) NOT NULL,
  `subject_id` int(20) NOT NULL,
  `menu_name` varchar(50) NOT NULL,
  `position` int(10) NOT NULL,
  `visible` tinyint(1) NOT NULL,
  `content` longtext NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=67910 ;

--
-- Dumping data for table `page`
--

INSERT INTO `page` (`id`, `subject_id`, `menu_name`, `position`, `visible`, `content`) VALUES
(67902, 12351, 'Gallery', 1, 1, '														The Griffin Coffee Shop adalah pabrik kopi yang telah menjalani usaha ini lebih dari 3 tahun. Kami bangga dengan warisan dan reputasi kami dalam memproduksi produk kopi yang inovatif dan bermutu tinggi yang sesuai dengan selera pelanggan kami yang berbeda-beda.														'),
(67903, 12352, 'About Us', 1, 1, 'The Griffin Coffee Shop adalah pabrik kopi yang telah menjalani usaha ini lebih dari 3 tahun. Kami bangga dengan warisan dan reputasi kami dalam memproduksi produk kopi yang inovatif dan bermutu tinggi yang sesuai dengan selera pelanggan kami yang berbeda-beda.'),
(67901, 12350, 'Kopi', 1, 1, '\r\nKopi adalah sejenis minuman yang berasal dari proses pengolahan dan ekstraksi biji tanaman kopi yang dikeringkan kemudian dihaluskan menjadi bubuk.							'),
(67908, 12350, 'Jenis Kopi:', 2, 1, '																																																																																																																																										<table><tr>\r\n<td>\r\n<li>Espresso</li>\r\n<li>Coffee latte</li>\r\n<li>Cappuccino</li>\r\n<li>Frappe</li>\r\n</td>\r\n</tr></table>																																																																																																																																																																									'),
(67907, 12352, 'Selamat datang di website kami!', 2, 1, '<ul>\r\n						<li>Kami harap kami dapat menyediakan informasi tentang\r\n						perusahaan dan produk-produk kami untuk menambah wawasan anda.</li>\r\n						<li>Kami menggunakan peralatan tangan, yang menghasilkan sekitar 50kg kopi bubuk per hari.</li>\r\n						<li>Kita mengirim kopi bubuk tersebut ke toko-toko kecil, kios, dan petani.</li>\r\n					</ul>');

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE IF NOT EXISTS `subject` (
`id` int(10) NOT NULL,
  `menu_name` varchar(50) NOT NULL,
  `position` int(20) NOT NULL,
  `visible` tinyint(1) NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12357 ;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`id`, `menu_name`, `position`, `visible`) VALUES
(12350, 'Home', 1, 1),
(12352, 'About', 3, 1),
(12351, 'Gallery', 2, 1),
(12353, 'Contact', 4, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
 ADD PRIMARY KEY (`contact_id`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `page`
--
ALTER TABLE `page`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=67899;
--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
MODIFY `contact_id` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `page`
--
ALTER TABLE `page`
MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=67910;
--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12357;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
