-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 17, 2025 at 08:55 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `admission`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phoneNumber` varchar(15) NOT NULL,
  `password` varchar(100) NOT NULL,
  `last_notification` varchar(10) NOT NULL,
  `image` varchar(255) NOT NULL,
  `status` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `phoneNumber`, `password`, `last_notification`, `image`, `status`) VALUES
(1, 'Dhrubo Raj Roy', 'Dhruborajroy3@gmail.com', '01705927257', '$2y$10$3xSV8g1xd.7b6leqDI08MOZS6CMMiYKfsL32wzasO7Sp9BqqF92im', '', '1682409648.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `applicants`
--

CREATE TABLE `applicants` (
  `id` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `first_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `roll` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `class` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `fName` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `fNid` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `mName` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `mNid` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `phoneNumber` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `presentAddress` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `permanentAddress` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `dob` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `gender` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `religion` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `birthId` text COLLATE utf8_unicode_ci NOT NULL,
  `quota` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `bloodGroup` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `examRoll` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `merit` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `localGuardianName` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `localGuardianNid` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `code` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `final_submit` int(2) NOT NULL,
  `last_notification` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `status` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `applicants`
--

INSERT INTO `applicants` (`id`, `first_name`, `last_name`, `roll`, `class`, `fName`, `fNid`, `mName`, `mNid`, `phoneNumber`, `presentAddress`, `permanentAddress`, `dob`, `gender`, `religion`, `birthId`, `quota`, `bloodGroup`, `examRoll`, `merit`, `localGuardianName`, `localGuardianNid`, `password`, `email`, `code`, `image`, `final_submit`, `last_notification`, `status`) VALUES
('NPKKGSC3B0F', '1', '34', '257112', '1', '34', '23', '34', '23', '01705927283', 'wij', 'sdkm', '30/11/2023', 'Male', 'Hinduism', '234', 'N/A', 'A+', '257112', '', 'sf', 'sf', '414070', '32423@dmc.c61', '153601', '1737100457.jpg', 0, '', 1),
('NPKKGSC7F6E', '1', '34', '248643', '1', '34', '23', '34', '23', '01705927268', 'wij', 'sdkm', '30/11/2023', 'Male', 'Hinduism', '234', 'N/A', 'A+', '248643', '4', 'sf', 'sf', '233649', '32423@dmc.c93', '546537', '1721926420.jpg', 1, '', 1),
('NPKKGSC8664', 'Dhrubo', 'Raj Roy', '241272', '1', '34', '23', '34', '23', '01705927257', 'Bhola Barishal Highway', 'Durgapur', '30/11/2023', 'Male', 'Hinduism', '234', 'N/A', 'A+', '241272', '2', 'sf', 'sf', '287184', 'Dhruborajroy3@gmail.com', '594871', '1711440357.jpg', 0, '', 1),
('NPKKGSC8665', 'Dhrubo', 'Raj Roy', '241271', '1', '34', '23', '34', '23', '01705927258', 'Bhola Barishal Highway', 'Durgapur', '30/11/2023', 'Male', 'Hinduism', '234', 'N/A', 'A+', '241271', '3', 'sf', 'sf', '287184', 'Dhruborajroy3@gmail.com', '594871', '1711440357.jpg', 1, '', 1),
('NPKKGSC8BC8', '1', '34', '247996', '1', '34', '23', '34', '23', '01705927224', 'wij', 'sdkm', '30/11/2023', 'Male', 'Hinduism', '234', 'N/A', 'A+', '247996', '1', 'sf', 'sf', '401652', '32423@dmc.c78', '890144', '1711805581.jpg', 1, '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `bkash_credentials`
--

CREATE TABLE `bkash_credentials` (
  `id` int(11) NOT NULL,
  `app_key` text NOT NULL,
  `app_secret` text NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `base_url` text NOT NULL,
  `id_token` text NOT NULL,
  `refresh_token` text NOT NULL,
  `time` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bkash_credentials`
--

INSERT INTO `bkash_credentials` (`id`, `app_key`, `app_secret`, `username`, `password`, `base_url`, `id_token`, `refresh_token`, `time`) VALUES
(1, '4f6o0cjiki2rfm34kfdadl1eqq', '2is7hdktrekvrbljjh44ll3d9l1dtjo4pasmjvs5vl5qr3fug4b', 'sandboxTokenizedUser02', 'sandboxTokenizedUser02@12345', 'https://tokenized.sandbox.bka.sh/v1.2.0-beta', 'eyJraWQiOiJvTVJzNU9ZY0wrUnRXQ2o3ZEJtdlc5VDBEcytrckw5M1NzY0VqUzlERXVzPSIsImFsZyI6IlJTMjU2In0.eyJzdWIiOiJlODNlMDkwMC1jY2ZmLTQzYTctODhiNy0wNjE5NDJkMTVmOTYiLCJhdWQiOiI2cDdhcWVzZmljZTAxazltNWdxZTJhMGlhaCIsImV2ZW50X2lkIjoiYzljZTM4NzAtOTM4YS00ZTk2LWE4NzEtMGE5ZTdmYjI3MGI4IiwidG9rZW5fdXNlIjoiaWQiLCJhdXRoX3RpbWUiOjE3MzcxMDA0MDYsImlzcyI6Imh0dHBzOlwvXC9jb2duaXRvLWlkcC5hcC1zb3V0aGVhc3QtMS5hbWF6b25hd3MuY29tXC9hcC1zb3V0aGVhc3QtMV9yYTNuUFkzSlMiLCJjb2duaXRvOnVzZXJuYW1lIjoic2FuZGJveFRva2VuaXplZFVzZXIwMiIsImV4cCI6MTczNzEwNDAwNiwiaWF0IjoxNzM3MTAwNDA2fQ.VBDUO11f1Ko7ecHQJasElp8Y2KlSvtV8O-Uj9cB3CMTgYmnRTLIaL44cLwIJWk0ZEAOmavY22FIaneCHasQLEDqbpPB-DhFxpQycb8omnzRiIIzHjSk0Kw-YpPIPj0I9TzEEoqFBS1ONIjgE3-FJhIdLIPw-awi8423U8F7o8_13a-Sk7ODUbkPHlwd0q6AXeCnt0DsffWaRQGvZj8NwWgboXzGMorwvaCglsa9c1b5DaocYWs_j-4zBuPbMNhnsmZul0A8zwh7iuhPL5T4HV1sLITRKh7_dd_Z8zp1Y-N5Hz7Lg9G_V3rJ5Nv0Npa1LuY0CMJsuyZAhDIv44WbRNA', 'eyJjdHkiOiJKV1QiLCJlbmMiOiJBMjU2R0NNIiwiYWxnIjoiUlNBLU9BRVAifQ.G0iIbWXm27HyxJy_FuTlCs1dOF4kYN4OMJdmob663wkzFbeRF7wneSVk0yEVawDhIKeonYHisTWeS_ysHLWfC0CMpKr31JD1gYIBYfCH6QLWygvJp8L62OB_lKXZHjozaAYZFFDBo2bXdhRVOXWdUU6JFJFSuFmfd9dJO6R_BByenOpSdlUFzBeFsCryYLiurWjbhmo8TVb29BquOWc57W-0Ro8mC_olTzWUadF7USPAZ7ZYmrRJ-LKzvRuGWGT3LCydMCcFeKe9SKxpKESCUYdORAANLbQKrqfxGRciVubLRdjnv-SrvWvn3ec--2GQjb-RoVZ4tc0YNIdpLBjsgQ.hbAnoFJUXmP10fki.PsN45Cmb51iA2jdNByO0uK2qCgMYKU6If2_aFJfkgnAYD781jpYJDWsixICfPzCiR7KXlyKsx96e8jE976T_TXfGOF7NsHrAUocCWqzPpnlX_pBWz8_r349sat_cBQRKiq7jp6w2DgDT0QD_9WRXHfVKVH54MBsov7Mh8b_py1l3xxNHA7jms4i2SYcOuCknh8hoRx7faVKB6nARFQzN0MNX7YcwZwPgzuE1CysHe6UdhG7QJMy5b2GFiumVR9hKq0C4z2XwesVtn5m59BJ6Lpe9firtniHzkBwUZXN0rjcXgkOTHPB8c04KhKFawna6tm_Z7ktymV1h25mtkfNpfK3PNx6c_rqpFmCCo-yrqiZ2aXfcR3osNRjoZYkk4nDtOvKahHY76hJrZ2PpzdH_qvStoqRpbESR6sKZtHeHVFC8jHCrcNALj8OYYfi33x0WtPgk4_MMu0rEC-uQkCAebJEiE-EP9naGVGFk5vLnPGWsKWCJgWPSG09ci-CyH1DO0TEskbqIexjam1GAur7xoIN6g_EcgAH4iGeDWrfC_XQXFo4bjijadoEUNj6X4nfkPRsfpJgGVvc37d4VaUqVIgO5J7m2qKK382DOxKHf3Ydd7KALq6z3_Ujz4MY1emLFAH3UkdAtWjEjWZt-rbKKLQyjNGfWuyUQ8tGx4NzjMYsM_d_JS1TVHt0ROa4wlizYbBYXLcoaIQ6MsdyQYnCUGO3vd2uNCpJDBQMWvClats8xV3kWTyzIKDANu746f0zqE36HhYfOeWLZdx8WRIo_dMkbK-H6oLaI1sVa9bKkrL-VcUcZrjWCPxeSbiHPn44Vxf4kNJpusSsLZ7fGV2aJoTylJgBs8fC39su0nmc0GTyfSrT86RvB4zJyXvXrtislFmC0um_7lRGHk65BCHFEHNS1hShHQVPtsdjhzsVa5eRqYCfgJXWkfcYy3-27NxJbdQGwfaqyficq_wW1260l3C2ZKYjGXK2h7yutdvhv0xc1RunnJA2ukV4NHqB65gRJXnkjuLqaxYilCoXplXWK0pNsv0UQHsp8skF75AsCYqpYo5WRqqZclzvXqMzrnohLZwfKA3oAvtM3RJI_ebqtaXh7lxvzu0dx8zgJZyP1rH7a18dvz4lqCCxRAJDGf9iumDyB4Om7Lzk2zuKMBlZygUtNbahDooqYlH7oAS6QqHU5VN9zz7c0yMrJlW0GsZ6-T6Zlji13AXMir98N19nnzyTvGYwd2nrLsvgfr5cXm2tXtlG1wMnZXGeJmXpvndcvuq6BU2GkSOKqRCQRZsGU7j859tTrVK6mdMrTZoTPR2r9h1ThkCA.5lNzy0CJL_Yj99mNe-5-SA', '1737100485');

-- --------------------------------------------------------

--
-- Table structure for table `bkash_online_payment`
--

CREATE TABLE `bkash_online_payment` (
  `id` int(11) NOT NULL,
  `tran_id` varchar(50) NOT NULL,
  `user_id` varchar(20) NOT NULL,
  `bkash_payment_id` varchar(100) NOT NULL,
  `customerMsisdn` varchar(20) NOT NULL,
  `trxID` varchar(20) NOT NULL,
  `amount` int(11) NOT NULL,
  `statusMessage` varchar(50) NOT NULL,
  `added_on` varchar(50) NOT NULL,
  `updated_on` varchar(20) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bkash_online_payment`
--

INSERT INTO `bkash_online_payment` (`id`, `tran_id`, `user_id`, `bkash_payment_id`, `customerMsisdn`, `trxID`, `amount`, `statusMessage`, `added_on`, `updated_on`, `status`) VALUES
(1, 'admission_6602822298b18', 'NPKKGSC8664', 'TR0011oxziQgG1711440370601', '', '', 320, 'OTP was not valid', '2024-03-26T14:06:10:601 GMT+0600', '1711440432', 'failure'),
(2, 'admission_6602825ce3da3', 'NPKKGSC8664', 'TR0011bgcszlz1711440429074', '01619777283', 'BCQ10I64MB', 320, 'The payment has already been completed', '2024-03-26T14:07:09:074 GMT+0600', '1711440514', 'success'),
(3, 'admission_6602cb8f45384', 'NPKKGSC8665', 'TR00112yUq9Nr1711459166959', '01619777283', 'BCQ60I65AW', 320, 'Duplicate for All Transactions', '2024-03-26T19:19:26:959 GMT+0600', '1711459227', 'Duplicate'),
(4, 'admission_6603a8e4bbae2', 'NPKKGSC8664', 'TR0011DDR5j3s1711515826480', '', '', 320, '', '2024-03-27T11:03:46:480 GMT+0600', '', 'pending'),
(5, 'admission_660814c6dc309', 'NPKKGSC8BC8', 'TR0011ifkwfRK1711805638739', '01619777283', 'BCU80IBDSI', 320, 'Successful', '2024-03-30T19:33:58:739 GMT+0600', '1711805662', 'Completed'),
(6, 'admission_66a2836954429', 'NPKKGSC7F6E', 'TR0011c1IAX8m1721926343903', '01619777283', 'BGP40JZRXA', 320, 'Successful', '2024-07-25T22:52:23:903 GMT+0600', '1721926526', 'Completed'),
(7, 'admission_678a0cc75af64', 'NPKKGSC3B0F', 'TR0011PyZFoi61737100407058', '', '', 320, 'OTP was not valid', '2025-01-17T13:53:27:058 GMT+0600', '1737100505', 'failure');

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE `class` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`id`, `name`, `status`) VALUES
(1, 'Seven', '1');

-- --------------------------------------------------------

--
-- Table structure for table `exam`
--

CREATE TABLE `exam` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `status` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `exam`
--

INSERT INTO `exam` (`id`, `name`, `status`) VALUES
(1, 'Admission Test 2022', 1);

-- --------------------------------------------------------

--
-- Table structure for table `mark`
--

CREATE TABLE `mark` (
  `id` int(11) NOT NULL,
  `sub_id` varchar(20) NOT NULL,
  `exam_roll` varchar(20) NOT NULL,
  `class_id` varchar(20) NOT NULL,
  `mark` varchar(10) NOT NULL,
  `exam_id` varchar(20) NOT NULL,
  `year` varchar(10) NOT NULL,
  `added_on` varchar(20) NOT NULL,
  `updated_on` varchar(20) NOT NULL,
  `status` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mark`
--

INSERT INTO `mark` (`id`, `sub_id`, `exam_roll`, `class_id`, `mark`, `exam_id`, `year`, `added_on`, `updated_on`, `status`) VALUES
(1, '1', '241271', '1', '57', '1', '2023', '1711442862', '', 1),
(2, '1', '241272', '1', '65', '1', '2023', '1711442862', '', 1),
(3, '1', '247996', '1', '66', '1', '2023', '1711805830', '', 1),
(4, '3', '247996', '1', '77', '1', '2023', '1711805842', '', 1),
(5, '3', '241271', '1', '65', '1', '2023', '1711805842', '', 1),
(6, '3', '241272', '1', '78', '1', '2023', '1711805842', '', 1),
(7, '4', '247996', '1', '88', '1', '2023', '1711805853', '', 1),
(8, '4', '241271', '1', '76', '1', '2023', '1711805853', '', 1),
(9, '4', '241272', '1', '56', '1', '2023', '1711805853', '', 1),
(10, '1', '248643', '1', '77', '1', '2023', '1721926723', '', 1),
(11, '3', '248643', '1', '7', '1', '2023', '1721926730', '', 1),
(12, '4', '248643', '1', '55', '1', '2023', '1721926739', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `notice`
--

CREATE TABLE `notice` (
  `id` varchar(20) NOT NULL,
  `title` varchar(255) NOT NULL,
  `details` text NOT NULL,
  `reference` text NOT NULL,
  `added_on` varchar(20) NOT NULL,
  `updated_on` varchar(20) NOT NULL,
  `user_id` varchar(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `online_payment`
--

CREATE TABLE `online_payment` (
  `id` varchar(50) NOT NULL,
  `user_id` varchar(20) NOT NULL,
  `tran_id` varchar(30) NOT NULL,
  `val_id` varchar(50) NOT NULL,
  `amount` varchar(10) NOT NULL,
  `card_type` varchar(50) NOT NULL,
  `tran_date` varchar(20) NOT NULL,
  `card_issuer` varchar(50) NOT NULL,
  `card_no` varchar(80) NOT NULL,
  `error` varchar(255) NOT NULL,
  `added_on` varchar(11) NOT NULL,
  `updated_on` varchar(11) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `refund_payment`
--

CREATE TABLE `refund_payment` (
  `id` int(11) NOT NULL,
  `statusMessage` varchar(20) NOT NULL,
  `user_id` varchar(50) NOT NULL,
  `tran_id` varchar(50) NOT NULL,
  `originalTrxID` varchar(20) NOT NULL,
  `refundTrxID` varchar(20) NOT NULL,
  `transactionStatus` varchar(20) NOT NULL,
  `amount` varchar(20) NOT NULL,
  `completedTime` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `site_details`
--

CREATE TABLE `site_details` (
  `id` varchar(20) NOT NULL,
  `name` text NOT NULL,
  `email` text NOT NULL,
  `address` text NOT NULL,
  `phone` varchar(20) NOT NULL,
  `facebook_link` text NOT NULL,
  `twitter_link` text NOT NULL,
  `youtube_link` text NOT NULL,
  `instagram_link` text NOT NULL,
  `short_details` varchar(255) NOT NULL,
  `updated_on` varchar(20) NOT NULL,
  `status` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `site_details`
--

INSERT INTO `site_details` (`id`, `name`, `email`, `address`, `phone`, `facebook_link`, `twitter_link`, `youtube_link`, `instagram_link`, `short_details`, `updated_on`, `status`) VALUES
('1', 'Edu Global', 'info@sitename.com', 'Califonia Street san Francisco, CA', '+ 457 789 789 65', '#', '#', '#', '#', 'Phasellus blandit massa enim. elit id varius nunc. Lorem ipsum dolor sit amet, consectetur industry.', '1', 1);

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `sub_code` varchar(50) NOT NULL,
  `full_mark` varchar(50) NOT NULL,
  `status` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `name`, `sub_code`, `full_mark`, `status`) VALUES
(1, 'Bangla', 'BAN 101', '100', 1),
(3, 'English', 'EN 101', '100', 1),
(4, 'Physics', 'PHY 202', '100', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `applicants`
--
ALTER TABLE `applicants`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bkash_credentials`
--
ALTER TABLE `bkash_credentials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bkash_online_payment`
--
ALTER TABLE `bkash_online_payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exam`
--
ALTER TABLE `exam`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mark`
--
ALTER TABLE `mark`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notice`
--
ALTER TABLE `notice`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `refund_payment`
--
ALTER TABLE `refund_payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `site_details`
--
ALTER TABLE `site_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
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
-- AUTO_INCREMENT for table `bkash_credentials`
--
ALTER TABLE `bkash_credentials`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `bkash_online_payment`
--
ALTER TABLE `bkash_online_payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `class`
--
ALTER TABLE `class`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `exam`
--
ALTER TABLE `exam`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `mark`
--
ALTER TABLE `mark`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `refund_payment`
--
ALTER TABLE `refund_payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
