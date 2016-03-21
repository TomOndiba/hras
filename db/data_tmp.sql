-- phpMyAdmin SQL Dump
-- version 4.4.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 17, 2016 at 02:14 PM
-- Server version: 5.6.25
-- PHP Version: 5.6.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `data`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity_log`
--

CREATE TABLE IF NOT EXISTS `activity_log` (
  `log_id` int(11) NOT NULL,
  `log_date` timestamp NULL DEFAULT NULL,
  `log_action` varchar(45) DEFAULT NULL,
  `log_module` varchar(45) DEFAULT NULL,
  `log_info` text,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `bank`
--

CREATE TABLE IF NOT EXISTS `bank` (
  `bank_id` int(11) NOT NULL,
  `bank_name` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

CREATE TABLE IF NOT EXISTS `ci_sessions` (
  `id` varchar(40) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) unsigned NOT NULL DEFAULT '0',
  `data` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `contract`
--

CREATE TABLE IF NOT EXISTS `contract` (
  `contract_id` int(11) NOT NULL,
  `contract_employe_nik` varchar(8) DEFAULT NULL,
  `contract_employe_name` varchar(255) DEFAULT NULL,
  `contract_employe_position` varchar(100) DEFAULT NULL,
  `contract_number` varchar(45) DEFAULT NULL,
  `contract_ke` decimal(10,0) DEFAULT NULL,
  `contract_date` date DEFAULT NULL,
  `user_user_id` int(11) DEFAULT NULL,
  `contract_input_date` timestamp NULL DEFAULT NULL,
  `contract_last_update` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `employe`
--

CREATE TABLE IF NOT EXISTS `employe` (
  `employe_id` int(11) NOT NULL,
  `employe_nik` varchar(100) DEFAULT NULL,
  `employe_name` varchar(255) DEFAULT NULL,
  `employe_address` text,
  `employe_date_register` date DEFAULT NULL,
  `employe_position` varchar(100) DEFAULT NULL,
  `employe_divisi` varchar(255) DEFAULT NULL,
  `employe_departement` varchar(255) DEFAULT NULL,
  `employe_phone` varchar(45) DEFAULT NULL,
  `employe_file` longblob,
  `employe_filename` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `mediamanager`
--

CREATE TABLE IF NOT EXISTS `mediamanager` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `type` varchar(45) DEFAULT NULL,
  `isfile` tinyint(1) DEFAULT '0',
  `label` text,
  `info` text,
  `upload_at` datetime DEFAULT NULL,
  `album_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `mediamanager_album`
--

CREATE TABLE IF NOT EXISTS `mediamanager_album` (
  `id` int(11) NOT NULL,
  `label` varchar(255) DEFAULT NULL,
  `upload_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `memorandum1`
--

CREATE TABLE IF NOT EXISTS `memorandum1` (
  `memorandum_id` int(11) NOT NULL,
  `memorandum_employe_nik` varchar(8) DEFAULT NULL,
  `memorandum_employe_name` varchar(255) DEFAULT NULL,
  `memorandum_employe_position` varchar(100) DEFAULT NULL,
  `memorandum_employe_address` text,
  `memorandum_employe_phone` varchar(45) DEFAULT NULL,
  `memorandum_number` varchar(45) DEFAULT NULL,
  `memorandum_email_date` date DEFAULT NULL,
  `memorandum_absent_date` date DEFAULT NULL,
  `memorandum_date_sent` date DEFAULT NULL,
  `memorandum_call_date` date DEFAULT NULL,
  `user_user_id` int(11) DEFAULT NULL,
  `memorandum_is_present` tinyint(1) DEFAULT '0',
  `memorandum_finished_desc` text,
  `memorandum_input_date` timestamp NULL DEFAULT NULL,
  `memorandum_last_update` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `memorandum2`
--

CREATE TABLE IF NOT EXISTS `memorandum2` (
  `memorandum_id` int(11) NOT NULL,
  `memorandum_number` varchar(45) DEFAULT NULL,
  `memorandum_date_sent` date DEFAULT NULL,
  `memorandum_call_date` date DEFAULT NULL,
  `memorandum1_memorandum_id` int(11) DEFAULT NULL,
  `user_user_id` int(11) DEFAULT NULL,
  `memorandum_is_present` tinyint(1) DEFAULT '0',
  `memorandum_input_date` timestamp NULL DEFAULT NULL,
  `memorandum_last_update` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `memorandum3`
--

CREATE TABLE IF NOT EXISTS `memorandum3` (
  `memorandum_id` int(11) NOT NULL,
  `memorandum_number` varchar(45) DEFAULT NULL,
  `memorandum_date_sent` date DEFAULT NULL,
  `memorandum_call_date` date DEFAULT NULL,
  `memorandum2_memorandum_id` int(11) DEFAULT NULL,
  `user_user_id` int(11) DEFAULT NULL,
  `memorandum_is_present` tinyint(1) DEFAULT '0',
  `memorandum_input_date` timestamp NULL DEFAULT NULL,
  `memorandum_last_update` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE IF NOT EXISTS `posts` (
  `posts_id` int(11) NOT NULL,
  `posts_title` varchar(255) DEFAULT NULL,
  `posts_description` text,
  `posts_image` varchar(255) DEFAULT NULL,
  `posts_published_date` timestamp NULL DEFAULT NULL,
  `posts_is_published` tinyint(1) DEFAULT '0',
  `posts_category_category_id` int(11) DEFAULT NULL,
  `user_user_id` int(11) DEFAULT NULL,
  `posts_input_date` timestamp NULL DEFAULT NULL,
  `posts_last_update` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `posts_category`
--

CREATE TABLE IF NOT EXISTS `posts_category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sk`
--

CREATE TABLE IF NOT EXISTS `sk` (
  `sk_id` int(11) NOT NULL,
  `sk_employe_nik` varchar(8) DEFAULT NULL,
  `sk_employe_name` varchar(255) DEFAULT NULL,
  `sk_employe_position` varchar(100) DEFAULT NULL,
  `sk_employe_date_register` date DEFAULT NULL,
  `sk_number` varchar(45) DEFAULT NULL,
  `sk_description` text,
  `sk_date` date DEFAULT NULL,
  `user_user_id` int(11) DEFAULT NULL,
  `sk_input_date` timestamp NULL DEFAULT NULL,
  `sk_last_update` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `spb`
--

CREATE TABLE IF NOT EXISTS `spb` (
  `spb_id` int(11) NOT NULL,
  `spb_number` varchar(45) DEFAULT NULL,
  `spb_date` date DEFAULT NULL,
  `bank_bank_id` int(11) DEFAULT NULL,
  `user_user_id` int(11) DEFAULT NULL,
  `spb_name1` varchar(255) DEFAULT NULL,
  `spb_nik1` varchar(16) DEFAULT NULL,
  `spb_name2` varchar(255) DEFAULT NULL,
  `spb_nik2` varchar(16) DEFAULT NULL,
  `spb_name3` varchar(255) DEFAULT NULL,
  `spb_nik3` varchar(16) DEFAULT NULL,
  `spb_name4` varchar(255) DEFAULT NULL,
  `spb_nik4` varchar(16) DEFAULT NULL,
  `spb_name5` varchar(255) DEFAULT NULL,
  `spb_nik5` varchar(16) DEFAULT NULL,
  `spb_name6` varchar(255) DEFAULT NULL,
  `spb_nik6` varchar(16) DEFAULT NULL,
  `spb_name7` varchar(255) DEFAULT NULL,
  `spb_nik7` varchar(16) DEFAULT NULL,
  `spb_name8` varchar(255) DEFAULT NULL,
  `spb_nik8` varchar(16) DEFAULT NULL,
  `spb_name9` varchar(255) DEFAULT NULL,
  `spb_nik9` varchar(16) DEFAULT NULL,
  `spb_name10` varchar(255) DEFAULT NULL,
  `spb_nik10` varchar(16) DEFAULT NULL,
  `spb_input_date` timestamp NULL DEFAULT NULL,
  `spb_last_update` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `stl`
--

CREATE TABLE IF NOT EXISTS `stl` (
  `stl_id` int(11) NOT NULL,
  `stl_employe_nik` varchar(8) DEFAULT NULL,
  `stl_employe_name` varchar(255) DEFAULT NULL,
  `stl_employe_position` varchar(100) DEFAULT NULL,
  `stl_number` varchar(45) DEFAULT NULL,
  `stl_date` date DEFAULT NULL,
  `stl_batch` decimal(10,0) DEFAULT NULL,
  `stl_ipk` varchar(45) DEFAULT NULL,
  `stl_desc` varchar(45) DEFAULT NULL,
  `user_user_id` int(11) DEFAULT NULL,
  `stl_input_date` timestamp NULL DEFAULT NULL,
  `stl_last_update` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(100) DEFAULT NULL,
  `user_full_name` varchar(255) DEFAULT NULL,
  `user_password` varchar(45) DEFAULT NULL,
  `user_email` varchar(45) DEFAULT NULL,
  `user_image` varchar(255) DEFAULT NULL,
  `user_description` text,
  `user_role_role_id` int(11) DEFAULT NULL,
  `user_is_deleted` tinyint(1) DEFAULT '0',
  `user_input_date` timestamp NULL DEFAULT NULL,
  `user_last_update` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE IF NOT EXISTS `user_role` (
  `role_id` int(11) NOT NULL,
  `role_name` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity_log`
--
ALTER TABLE `activity_log`
  ADD PRIMARY KEY (`log_id`),
  ADD KEY `fk_g_activity_log_g_user1_idx` (`user_id`);

--
-- Indexes for table `bank`
--
ALTER TABLE `bank`
  ADD PRIMARY KEY (`bank_id`);

--
-- Indexes for table `ci_sessions`
--
ALTER TABLE `ci_sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ci_sessions_timestamp` (`timestamp`);

--
-- Indexes for table `contract`
--
ALTER TABLE `contract`
  ADD PRIMARY KEY (`contract_id`);

--
-- Indexes for table `employe`
--
ALTER TABLE `employe`
  ADD PRIMARY KEY (`employe_id`);

--
-- Indexes for table `mediamanager`
--
ALTER TABLE `mediamanager`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mediamanager_album`
--
ALTER TABLE `mediamanager_album`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `memorandum1`
--
ALTER TABLE `memorandum1`
  ADD PRIMARY KEY (`memorandum_id`);

--
-- Indexes for table `memorandum2`
--
ALTER TABLE `memorandum2`
  ADD PRIMARY KEY (`memorandum_id`),
  ADD KEY `fk_memorandum2_memorandum11_idx` (`memorandum1_memorandum_id`);

--
-- Indexes for table `memorandum3`
--
ALTER TABLE `memorandum3`
  ADD PRIMARY KEY (`memorandum_id`),
  ADD KEY `fk_memorandum2_memorandum21_idx` (`memorandum2_memorandum_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`posts_id`),
  ADD KEY `fk_posts_posts_category1_idx` (`posts_category_category_id`),
  ADD KEY `fk_posts_user1_idx` (`user_user_id`);

--
-- Indexes for table `posts_category`
--
ALTER TABLE `posts_category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `sk`
--
ALTER TABLE `sk`
  ADD PRIMARY KEY (`sk_id`);

--
-- Indexes for table `spb`
--
ALTER TABLE `spb`
  ADD PRIMARY KEY (`spb_id`),
  ADD KEY `fk_spb_bank1_idx` (`bank_bank_id`);

--
-- Indexes for table `stl`
--
ALTER TABLE `stl`
  ADD PRIMARY KEY (`stl_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `fk_user_user_role1_idx` (`user_role_role_id`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activity_log`
--
ALTER TABLE `activity_log`
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `bank`
--
ALTER TABLE `bank`
  MODIFY `bank_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `contract`
--
ALTER TABLE `contract`
  MODIFY `contract_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `employe`
--
ALTER TABLE `employe`
  MODIFY `employe_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `mediamanager`
--
ALTER TABLE `mediamanager`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `mediamanager_album`
--
ALTER TABLE `mediamanager_album`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `memorandum1`
--
ALTER TABLE `memorandum1`
  MODIFY `memorandum_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `memorandum2`
--
ALTER TABLE `memorandum2`
  MODIFY `memorandum_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `memorandum3`
--
ALTER TABLE `memorandum3`
  MODIFY `memorandum_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `posts_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `posts_category`
--
ALTER TABLE `posts_category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `sk`
--
ALTER TABLE `sk`
  MODIFY `sk_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `spb`
--
ALTER TABLE `spb`
  MODIFY `spb_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `stl`
--
ALTER TABLE `stl`
  MODIFY `stl_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `activity_log`
--
ALTER TABLE `activity_log`
  ADD CONSTRAINT `fk_g_activity_log_g_user1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Constraints for table `memorandum2`
--
ALTER TABLE `memorandum2`
  ADD CONSTRAINT `fk_memorandum2_memorandum11` FOREIGN KEY (`memorandum1_memorandum_id`) REFERENCES `memorandum1` (`memorandum_id`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Constraints for table `memorandum3`
--
ALTER TABLE `memorandum3`
  ADD CONSTRAINT `fk_memorandum2_memorandum21` FOREIGN KEY (`memorandum2_memorandum_id`) REFERENCES `memorandum2` (`memorandum_id`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `fk_posts_posts_category1` FOREIGN KEY (`posts_category_category_id`) REFERENCES `posts_category` (`category_id`) ON DELETE SET NULL ON UPDATE SET NULL,
  ADD CONSTRAINT `fk_posts_user1` FOREIGN KEY (`user_user_id`) REFERENCES `user` (`user_id`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Constraints for table `spb`
--
ALTER TABLE `spb`
  ADD CONSTRAINT `fk_spb_bank1` FOREIGN KEY (`bank_bank_id`) REFERENCES `bank` (`bank_id`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `fk_user_user_role1` FOREIGN KEY (`user_role_role_id`) REFERENCES `user_role` (`role_id`) ON DELETE SET NULL ON UPDATE SET NULL;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
