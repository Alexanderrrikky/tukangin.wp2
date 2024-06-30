-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 30, 2024 at 07:48 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 5.6.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tukangin`
--

-- --------------------------------------------------------

--
-- Table structure for table `metode_bayar`
--

CREATE TABLE `metode_bayar` (
  `id` int(11) NOT NULL,
  `m_bayar` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `metode_bayar`
--

INSERT INTO `metode_bayar` (`id`, `m_bayar`) VALUES
(1, 'dana 0813466990801'),
(2, 'ovo  081346699080'),
(3, 'bca 123446756'),
(6, 'bri 12345678');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id` int(11) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `jam` int(128) NOT NULL,
  `total_bayar` int(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `metode` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `nomor` varchar(128) NOT NULL,
  `image` varchar(255) NOT NULL DEFAULT 'transaksi.jpg',
  `tgl` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id`, `nama`, `jam`, `total_bayar`, `email`, `metode`, `alamat`, `nomor`, `image`, `tgl`) VALUES
(15, 'mural & cat', 4, 120000, 'alexanderrikky@gmail.com', '3', 'desa lunsa', '1234560987654', 'cabai4.jpg', '1719082423'),
(16, 'Renovasi', 1, 35000, 'alexanderrikky@gmail.com', '2', 'desa lunsa', '12345678901234', 'usecase.jpg', '1719634556'),
(17, 'Renovasi', 4, 140000, 'alexanderrikky123@gmail.com', '1', 'desa lunsa', '125334263432236453463224', 'clas_diagram.png', '1719650123');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `image` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `image`, `password`, `role_id`, `is_active`, `date_created`) VALUES
(1, 'ALEXANDER RIKKY', 'alexanderrikky@gmail.com', 'alex.jpg', '$2y$10$FtW9rS5U3lXxw6HZhaiv5.HcUcS/BKYlS4DAzZuwVRMOCLlgefnkq', 1, 1, 1717772018),
(3, 'rikky', 'alexanderrikky001@gmail.com', 'default.jpg', '$2y$10$Qi5b742aQYVlawHTWzpZIeMLZ4Def7ezJoIkpsZ2RNoIJm2bCZbU2', 2, 1, 1717833813),
(4, 'ALEXANDER RIKKY', 'alexanderrikky123@gmail.com', 'arikky-fotor-20240530215944.jpg', '$2y$10$icdRjmFmQ5jkJIq/Wll1we67D4RQwXNTZfefOkwXbxGMGvBOUDObm', 2, 1, 1718353936),
(5, 'ALES', 'ales@gmail.com', 'ales.jpg', '$2y$10$DfeKHoEqwu7cdSa/8xt7KO3oQjzhmE5a1HELMSsMKucnejLDu4VVa', 2, 1, 1718758301),
(6, 'RIZKI', 'rizkydarmawan@gmail.com', 'rizky.jpg', '$2y$10$I.uGIHRxnrFWSTDmDeJJVe/GJzPYjp188betsaanN/t1f.iP9mTm2', 2, 1, 1718758629);

-- --------------------------------------------------------

--
-- Table structure for table `user_access_menu`
--

CREATE TABLE `user_access_menu` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_access_menu`
--

INSERT INTO `user_access_menu` (`id`, `role_id`, `menu_id`) VALUES
(1, 1, 1),
(3, 2, 2),
(4, 1, 3),
(9, 1, 9),
(10, 1, 10),
(11, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `user_menu`
--

CREATE TABLE `user_menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_menu`
--

INSERT INTO `user_menu` (`id`, `menu`) VALUES
(1, 'Admin'),
(2, 'User'),
(3, 'Menu ');

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'Administrator'),
(2, 'Member');

-- --------------------------------------------------------

--
-- Table structure for table `user_sub_menu`
--

CREATE TABLE `user_sub_menu` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `url` varchar(128) NOT NULL,
  `icon` varchar(128) NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_sub_menu`
--

INSERT INTO `user_sub_menu` (`id`, `menu_id`, `title`, `url`, `icon`, `is_active`) VALUES
(1, 1, 'Dashboard', 'admin', 'fas fa-tachometer-alt', 1),
(2, 2, 'My Profile', 'tukangin/profile', 'fas fa-user', 1),
(3, 2, 'Edit Profile', 'tukangin/edit', 'fas fa-user-edit', 1),
(4, 3, 'Menu Management', 'menu', 'fas fa-folder', 1),
(5, 3, 'SubMenu Management', 'menu/submenu', 'fas fa-folder-open', 1),
(12, 1, 'Role', 'admin/role', 'fas fa-user-tie', 1),
(13, 2, 'Change password', 'tukangin/changepassword', 'fas fa-key', 1),
(14, 1, 'Metode bayar', 'tukangin/metodebayar', 'fas fa-shopping-cart', 1),
(16, 1, 'Data Transaksi', 'admin/transaksi', 'fas fa-book ', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `metode_bayar`
--
ALTER TABLE `metode_bayar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_menu`
--
ALTER TABLE `user_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `metode_bayar`
--
ALTER TABLE `metode_bayar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
