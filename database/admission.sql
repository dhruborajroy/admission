-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 05, 2025 at 10:28 AM
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
('NPKKGSC0B81', '1', '34', '252554', '1', '34', '23', '34', '23', '01705927243', 'wij', 'sdkm', '30/11/2023', 'Male', 'Hinduism', '234', 'N/A', 'A+', '252554', '5', 'sf', 'sf', '412852', '32423@dmc.c56', '855606', '1751702243.jpg', 0, '', 1),
('NPKKGSC3B0F', '1', '34', '257112', '1', '34', '23', '34', '23', '01705927283', 'wij', 'sdkm', '30/11/2023', 'Male', 'Hinduism', '234', 'N/A', 'A+', '257112', '6', 'sf', 'sf', '414070', '32423@dmc.c61', '153601', '1737100457.jpg', 0, '', 1),
('NPKKGSC7F6E', '1', '34', '248643', '1', '34', '23', '34', '23', '01705927268', 'wij', 'sdkm', '30/11/2023', 'Male', 'Hinduism', '234', 'N/A', 'A+', '248643', '4', 'sf', 'sf', '233649', '32423@dmc.c93', '546537', '1721926420.jpg', 1, '', 1),
('NPKKGSC8664', 'Dhrubo', 'Raj Roy', '241272', '1', '34', '23', '34', '23', '01705927257', 'Bhola Barishal Highway', 'Durgapur', '30/11/2023', 'Male', 'Hinduism', '234', 'N/A', 'A+', '241272', '2', 'sf', 'sf', '287184', 'Dhruborajroy3@gmail.com', '594871', '1711440357.jpg', 0, '', 1),
('NPKKGSC8665', 'Dhrubo', 'Raj Roy', '241271', '1', '34', '23', '34', '23', '01705927258', 'Bhola Barishal Highway', 'Durgapur', '30/11/2023', 'Male', 'Hinduism', '234', 'N/A', 'A+', '241271', '3', 'sf', 'sf', '287184', 'Dhruborajroy3@gmail.com', '594871', '1711440357.jpg', 1, '', 1),
('NPKKGSC8BC8', '1', '34', '247996', '1', '34', '23', '34', '23', '01705927224', 'wij', 'sdkm', '30/11/2023', 'Male', 'Hinduism', '234', 'N/A', 'A+', '247996', '1', 'sf', 'sf', '401652', '32423@dmc.c78', '890144', '1711805581.jpg', 1, '', 1),
('NPKKGSCEA99', '1', '34', '255285', '1', '34', '23', '34', '23', '01705927298', 'wij', 'sdkm', '30/11/2023', 'Male', 'Hinduism', '234', 'N/A', 'A+', '255285', '7', 'sf', 'sf', '348128', '32423@dmc.c77', '329175', '1751702123.jpg', 1, '', 1),
('NPKKGSCFEB3', '1', '34', '252335', '1', '34', '23', '34', '23', '01705927259', 'wij', 'sdkm', '30/11/2023', 'Male', 'Hinduism', '234', 'N/A', 'A+', '252335', '', 'sf', 'sf', '481975', '32423@dmc.c85', '963772', '1751702596.jpg', 0, '', 1);

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
(1, '4f6o0cjiki2rfm34kfdadl1eqq', '2is7hdktrekvrbljjh44ll3d9l1dtjo4pasmjvs5vl5qr3fug4b', 'sandboxTokenizedUser02', 'sandboxTokenizedUser02@12345', 'https://tokenized.sandbox.bka.sh/v1.2.0-beta', 'eyJraWQiOiJvTVJzNU9ZY0wrUnRXQ2o3ZEJtdlc5VDBEcytrckw5M1NzY0VqUzlERXVzPSIsImFsZyI6IlJTMjU2In0.eyJzdWIiOiJlODNlMDkwMC1jY2ZmLTQzYTctODhiNy0wNjE5NDJkMTVmOTYiLCJhdWQiOiI2cDdhcWVzZmljZTAxazltNWdxZTJhMGlhaCIsImV2ZW50X2lkIjoiYjMxZmU1NDEtNTU1OC00MWRjLWE3OWQtMTFjNDAwYjkxYWNkIiwidG9rZW5fdXNlIjoiaWQiLCJhdXRoX3RpbWUiOjE3NTE3MDIwNjAsImlzcyI6Imh0dHBzOlwvXC9jb2duaXRvLWlkcC5hcC1zb3V0aGVhc3QtMS5hbWF6b25hd3MuY29tXC9hcC1zb3V0aGVhc3QtMV9yYTNuUFkzSlMiLCJjb2duaXRvOnVzZXJuYW1lIjoic2FuZGJveFRva2VuaXplZFVzZXIwMiIsImV4cCI6MTc1MTcwNTY2MCwiaWF0IjoxNzUxNzAyMDYwfQ.UwwGGhn4y6Qf--3qmyvWgte12n2bgt3-XTI-TQLsyccxcMNahq3q4RkkHll4Vex4ztqc2fHoQEKGRmhs-4xga7HhKRdhAAf3F3H-vwHQekfeU6u6DPzRJkSxrhYtxNkv5rhRlKXhJo-Jioo8EI-2w4Yh529WMN1QU_P0py9W5aVEfpHdaObrXRimFiR0L2-Z6zKs7XNJNIy4BDbbR6TH9fteTxXKoqS_ArAF_2NTac-_DxVQosNl8xpG-frDTLqWvsffKuV6IB6lEbrkzrw1oor6HOoOHI6OnTw9R04LgX8tvwY4Jsu87W_ox4jlyJjEhfNOpFag_txGEVuXqsLUVg', 'eyJjdHkiOiJKV1QiLCJlbmMiOiJBMjU2R0NNIiwiYWxnIjoiUlNBLU9BRVAifQ.RbgNYpQUMNgAFiw6Rtv_vjUAODS3slZs5N3vOVu5dKZoyU3_P07Kd8ZgDuUisKI-zNp-v7-XHOeAT-WOACnm-HVjjij8LFWB_R6c-b9iCmO-ku9XCkOJRlZC5Uyiz3WA6NNi6DMnkG-ZXYDVA_6sNj74y8EBClu5zsqDUrFKjr2bxKYMIvzdAy94KWftx0QXfW_HcDDimtPQF7lphuDB5M88kggUs7-QF3_AP3M4uCHJvSeQUQDMrWC3ySSefDpRyM8L9zQSlcledwQnc7etauRPki3N3HaSHzBKxUnf2sWzzSazeMSv0owpp2ipVcWteUE459lWHUgiMPqcNKZhOw.Qk86eNRK9BeVN1m2.hncRo55sDAunbAh5cNtm3iPotpp3y2Gu8xQ1tmeeuU8AAQmqd0nHqgLWCOJ6OzE3FWeclGQfht8K8-Yh_6YgmkP_B60Gt01h-zO7EPTbBrQuEVO6elixVG-FacZ83vcKqcNSSOwsdw-Rt7F1PR9iinhQCIB3V_wZG3loToL_LfTO6A1o0G0NRutSoTBQTlDFRvEbCUx3HnFwrbtx59eKrql21vLINL8R21oh0S9nnhlpZtUx-qusEFf_DvVSGBAoVXEOoVYGNnXeoaggfnrFjo1noNrVFJEzRzCk8jFUt-O6J8ZqNvnk7txLXzY8fbuOPYtOtWySbO3AsXkpxqb3gL9zPM4jEndo_afYek26JzcKbkMZ9ThB_8ynxvs3yj4DPFY1L1ItXM4uRoK8TZdssffMjVOWAEOeiCclhVzeoC_w5fjOBbGmHGOh4kqMP13sRQzE3eZ6I4VF5QKEEF-5E7vMbmGTe_CWNmX9CE9PCS6bebSnbHj2hfyEtNz1kMXbv7fci2a8O6YBfKHHgKSAnGXgsFTp9mW1O0-cMnsO6yNqBYlb9RE1-VMdG91VZ0KbeeuzNusfbgK4jZDWj9_VLIyH9jE9eaSezgTJMLuEoGtVnDkoHzDCIHle_iubsiJxipcdWgq2cEAMJ5rAVKCp6h_A9XIc1hRceSXGI3VoYwy8x0KX8DTyEyjJW4zSAALfz5ea748cIn5ijWui758-VIhiDol2bdVSUxBulgYhk8OVQTjSBdGkxNhHp6N8uKDMhfTEFyBl2IY9VbT4WyNcBXw5slpOSuiz8YhM8pYCtu5s4Ajnyw3bBQVQwDIJ3iKUrild3CjueabtJt8hptboJc2LSyj08hqWgY_AtB-HgOOQyP81YdSv9Fn38YZRODnGevD7YY2AH4Uv43H0AgcRiMis4R5WKA_qBp8IcvNFA5gxbva-z6FEHeOLPyIm2iP4qBen1cE5BUQajgYNp5Ud-8xiSWRH09qMi8bDBCjELU7q802WHnUSOYVjfjFK9L6S7B4ANumhoOOYi3ypuvjnz-8bLBYaerOD7LKO785TPs3jshetceSTBf9azhUZ3p_wIXCcMBvxJhblu9JT2a7JnlAThGgMuu475_gBH3v5DesEQdGak8w-CPRZ4_ElqIdA4dvPzTeJy1SnCRMiMU5siC4Vtfez6qzeOXy9Sl1eP2jJaO-yM6ritBM028TNVXgN5VlZCK_65VIre4uPoLh_yrvQ343jRQseUt839erRXidUlcpAA2-xIkPVRUDNmLWFysGfI7JuMdnDprPoX-_TGRrYOytFPYGpQ5GAHDAsaH-kY-aiVgs.haM6a1UbsMWpgXCXtS-9iA', '1751702153');

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
(7, 'admission_678a0cc75af64', 'NPKKGSC3B0F', 'TR0011PyZFoi61737100407058', '', '', 320, 'OTP was not valid', '2025-01-17T13:53:27:058 GMT+0600', '1737100505', 'failure'),
(8, 'admission_6868da8aa98b9', 'NPKKGSCEA99', 'TR0011LS7d0dg1751702060707', '', '', 320, 'OTP was not valid', '2025-07-05T13:54:20:707 GMT+0600', '1751702175', 'failure'),
(9, 'admission_6868db335cec5', 'NPKKGSC0B81', 'TR0011CfiGxX01751702229397', '', '', 320, 'OTP was not valid', '2025-07-05T13:57:09:397 GMT+0600', '1751702333', 'failure'),
(10, 'admission_6868dc5a8cffe', 'NPKKGSCFEB3', 'TR0011l7QdIs21751702524716', '', '', 320, 'OTP was not valid', '2025-07-05T14:02:04:716 GMT+0600', '1751702657', 'failure'),
(11, 'admission_6868df6aea908', 'NPKKGSCEA99', 'TR0011022jPhe1751703308999', '01770618575', 'CG500N2OI8', 320, 'Successful', '2025-07-05T14:15:08:999 GMT+0600', '1751703428', 'Completed');

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
(12, '4', '248643', '1', '55', '1', '2023', '1721926739', '', 1),
(13, '1', '255285', '1', '44', '1', '2023', '1751702449', '', 1),
(14, '1', '257112', '1', '44', '1', '2023', '1751702449', '', 1),
(15, '1', '252554', '1', '44', '1', '2023', '1751702449', '', 1),
(16, '3', '255285', '1', '34', '1', '2023', '1751702457', '', 1),
(17, '3', '257112', '1', '34', '1', '2023', '1751702457', '', 1),
(18, '3', '252554', '1', '32', '1', '2023', '1751702457', '', 1),
(19, '4', '255285', '1', '21', '1', '2023', '1751702466', '', 1),
(20, '4', '257112', '1', '32', '1', '2023', '1751702466', '', 1),
(21, '4', '252554', '1', '43', '1', '2023', '1751702466', '', 1);

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

--
-- Dumping data for table `notice`
--

INSERT INTO `notice` (`id`, `title`, `details`, `reference`, `added_on`, `updated_on`, `user_id`, `status`) VALUES
('6868e0b149f09', 'সদফ', '<p>সদফকঙ্ক&nbsp;</p>', 'test', '1751703729', '', '1', 1);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

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
