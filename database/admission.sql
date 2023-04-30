-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 30, 2023 at 04:43 AM
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
('', 'J', 'Jn', '231847', '1', 'S', '24', 'Ew', '234', '', 'we', 'we', '30/11/2002', 'Male', 'Hinduism', '', 'N/A', '', '231847', '7', '', '', '$2y$10$jl8wa.198LfqHPL3ISU/bepYRwcTGbV55TtaGIlO5PQga5Z0/c7E6', 'ksdn@ldmv.csk', '', 'd41d8cd98f00b204e9800998ecf8427e_1682498080.jpg', 0, '', 0),
('644788b062d22', 'Dhruboraj 3', 'Roy3', '239900', '1', 'Debendra Nath Roy3', '76667667873', 'Malati Roy3', '76886678673', '017059272573', 'Adarsopara, Sadar, Lalmonirhat', 'Adarsopara, Sadar, Lalmonirhat', '30/11/2002', 'Female', 'Hinduism', '76378632897378763', 'FF', 'A-', '239900', '2', '', '', '$2y$10$9PZqP0NIz1QXOw/mHTXzdOe2v7QHy8clmcIzcrNg0JtOxz3iBIg2S', '3z@ef.f', '778092', 'df5e2c25e8a5930da17ddf3bfb5ecc20_1682498056.jpg', 1, '', 1),
('NPKKGSC4AB0', 'S34', 'S345', '237780', '1', 'S345', '2434543', '3434', '23434', '2343194153', '23435', '23434', '30/11/2002', 'Male', 'Hinduism', '234342', 'N/A', 'A+', '237780', '4', 'Dhrubo', '34190', '$2y$10$5z5tU.ocmy/Hdh2Dr87T7uLjJlwnO4R0I0Id/p0Kk/K/MZW/vM2iO', 'ksdn@ldmv.csk1796', '6389', '494b5007b6b0c8234f8665d177a1d942_1682497839.jpg', 1, '', 0),
('NPKKGSC75D9', 'S', 'S', '239864', '1', 'S', '24', '34', '234', '2343336', '234', '234', '30/11/2002', 'Male', 'Hinduism', '234342', 'N/A', 'A+', '239864', '8', 'Dhrubo', '34391', '$2y$10$2JolLRu1arM7OtJXI5QFB.JZP05KY0gOtx.m7GY6ybt6h7ofQylBC', 'ksdn@ldmv.csk64', '7923', '16768eecd8ba99ac4ecf540e1f115d2d_1682498040.jpg', 0, '', 0),
('NPKKGSC915F', '1', '34', '236351', '1', '34', '23', '34', '23', '01705927257', 'wij', 'sdkm', '30/11/2023', 'Male', 'Hinduism', '234', 'N/A', 'A+', '236351', '1', 'sf', 'sf', '799534', '32423@dmc.c72', '964479', '1682605699.jpg', 1, '', 1),
('NPKKGSCC565', '1', '34', '233990', '1', '34', '23', '34', '23', '01705927246', 'wij', 'sdkm', '30/11/2023', 'Male', 'Hinduism', '234', 'N/A', 'A+', '233990', '6', 'sf', 'sf', '647933', '32423@dmc.c76', '260765', '1682604750.jpg', 0, '', 1),
('NPKKGSCD8DF', '1', '34', '239265', '1', '34', '23', '34', '23', '243416', 'wij', 'sdkm', '30/11/2023', 'Male', 'Hinduism', '234', 'N/A', 'A+', '239265', '5', 'sf', 'sf', '419378', '32423@dmc.c78', '218537', '1682604679.jpg', 0, '', 0),
('NPKKGSCFF17', '1', '34', '234007', '1', '34', '23', '34', '23', '01705927211', 'wij', 'sdkm', '30/11/2023', 'Male', 'Hinduism', '234', 'N/A', 'A+', '234007', '3', 'sf', 'sf', '897632', '32423@dmc.c40', '531669', '1682605520.jpg', 0, '', 0);

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
(1, '4f6o0cjiki2rfm34kfdadl1eqq', '2is7hdktrekvrbljjh44ll3d9l1dtjo4pasmjvs5vl5qr3fug4b', 'sandboxTokenizedUser02', 'sandboxTokenizedUser02@12345', 'https://tokenized.sandbox.bka.sh/v1.2.0-beta', 'eyJraWQiOiJvTVJzNU9ZY0wrUnRXQ2o3ZEJtdlc5VDBEcytrckw5M1NzY0VqUzlERXVzPSIsImFsZyI6IlJTMjU2In0.eyJzdWIiOiJlODNlMDkwMC1jY2ZmLTQzYTctODhiNy0wNjE5NDJkMTVmOTYiLCJhdWQiOiI2cDdhcWVzZmljZTAxazltNWdxZTJhMGlhaCIsImV2ZW50X2lkIjoiMGMwNDU5ZmEtOTc1Ny00MzVlLTlmYmMtYWEyYzhiZDIxODI5IiwidG9rZW5fdXNlIjoiaWQiLCJhdXRoX3RpbWUiOjE2ODI2MDYwMjUsImlzcyI6Imh0dHBzOlwvXC9jb2duaXRvLWlkcC5hcC1zb3V0aGVhc3QtMS5hbWF6b25hd3MuY29tXC9hcC1zb3V0aGVhc3QtMV9yYTNuUFkzSlMiLCJjb2duaXRvOnVzZXJuYW1lIjoic2FuZGJveFRva2VuaXplZFVzZXIwMiIsImV4cCI6MTY4MjYwOTYyNSwiaWF0IjoxNjgyNjA2MDI1fQ.cCbdwURW2y7nizK8zGiIBHxKUt9AWO6UJo3q1aWB-boUu-7iBFxQycrgMOZ_WWqant5u41oUOyDVqgCWGjwJ8V9JWk19n1hPBFdydW4u4QhdZFzK1anzJDGBq6bHGZHemtCFW4KDmPCjL2oHxNGwlTfpOJk_B2-s94zi_2_9UFIA5a-iydqc-6KruJJa2ru18_pS9dkK8X4EwqRM8SC6IhjLCYCVUkN2XCkxUmIbzm5fbKUnzazTX6KSZBjAuG9MX1ePZbrhAiBUFKhr73s6oXmyn169pkfZ0I2Xnzvz5UBZcmP_QyYQjXEJ9NRmFSA2qnuTGR0wOq6mtcn4tkWUoA', 'eyJjdHkiOiJKV1QiLCJlbmMiOiJBMjU2R0NNIiwiYWxnIjoiUlNBLU9BRVAifQ.P4Wtio_ri5oOH2VdZC9mCTVGDzzQQhFeK5TgNeD6SW5OwAdszMpaqAdYU3SupQHKfzmJTr07HwXbrJA_omINYUP5fBRDgiQHXF1ySKpJpDADvgTdfebg6ZWlcwMiUYydxltSkF97cedJpVqntT6NfYChn1d8LQE_B1Ez4e3Zv9qUUHsRWsb2gmY31_T9qKUKXQJRvcj42uiVgJBBBgBhwTXONyrkSr02WH_4x0bBaoRQiBltZX7PG4dW0E4MazYgBjks-IrlWHolIqLx-km5KMZZAAV1nWSTdlDwcspuWvCBA6BsLRYCnl9CFj6FW5UK-pU2Sasqy7UGxYJ5BZdKKQ.h_O2PdiVTOKQb1vU.6X3rqm-h9uZcumvGLAI5Nlv_V5edq5pxe-4bkW5YxO8mK9hvWJSmE5Vq6agc1uOVaXPynYbIvmNdxseg17hErlz-z19pdrzQqrHbr3Df1Y9dj97ueQ6qahwPAAcNX21qyUk-7ByKQI_qKRSraWMQkh4nR7TKZWHSipnaoY_bLlwzfu98JOZaCk8pURBeTeLybFKnIZwGsopuc86H7mTylNoscLWaWH8OJb4M6qCuQwiRSoN1n1r9Zjr7mymFKqCE-MmxDpY1oAjU8jo-e7y7dhtc8ajFV58TbdQU0bliOOzRH7hK2WpCWaEdyECCQiNJAdKl6PCLHSKeaYSqVSS9WScEFs1NmRI038s6fGaLDz8IM5bnBhXgdhqwvyHZz_8-8zHLjbOSeF1z6JBnnrlTbWadmw3_-YmIL6hl9Xx7bHaliluV9v_28UGPTvwMK1wuNROYcR2qOGnzFJDxxL5SQfHk10KDgrt4hSilIw7qNlsQXPjeeiKYCM-sUfYJsOxv3IRI3oOyn5B04W7ZtHy4ZfdwN-RzfF7po89XX8zH5o8Fd-TH5vWUkZEDyNPW2gF0ZzLVEke9Ij4LzKVpLJbUO_umjB_lBatfzB5jH5GRFsXdnG41-f88cTCbY2jWcMVGddBLETL6pSlJjNdanMlR2xdB1AcKP6Ujlk70kwDZoLcbUIvS-FyiHm3qdNjceip-eVIqowUjdrE3fD32dTAFdK0rdId6aliku4JP_bYEe9sXwitfX-DwlkBXergVFwmEQoTqbbWKSGrQfwRkaGqFTBBQ0gAAkikJrr3_R61dCNFS695pfUpfJNNk-uSpRQqj02E0c0jfZJijkrOss7-5vvQRLHEY_mkXAAJhm9HnqgmliRfALc7swmE0KG1ZyKeC5IeZm7QMUR-AArUJMuVUERpauL7lNzJMY3NHZwdygkk4tN0Pqa3N8iEBnXr6qPVXPoRzP7ZR5keouEcPacX7KGndKqasfGJ4dZSWQmByUb9SZATSxCdHix1SVVJRGBn0Vp-vADjN1A0IwKURnXrlhyFTSKEgf8O5_JxnZ0gtSxFJD_MHWCOn9GCMK1DFpxrDNPvKg1p3jgZHuAGLKDS6Ke9aLy2Nn8NOmYeXaZQP6fjdzKRHAGtPA6DA7VRO4vDAAOL8tr63j9dSWls_LbmLkvRQgcS_sbSGVNYt7qHlSWEUJ8RbYD1Op7XRNrpKjMkIq89mWgeV_VYmapn36P7ERccLktZ033Is57W7jEg541D24Crd4HXFE_97AokLtoVnKqrn6koOjTeq_B5avzv5uFw7hQgp2LGFxYf1enQ6oSPuI52wVi8.zK0RcSemcqzM3PqCB68yOw', '1682606072');

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
(1, 'admission_644a209bd8f2b', 'NPKKGSC4AB0', 'TR0011PH1682579565060', '01770618575', 'ADR00AWECM', 320, 'Successful', '2023-04-27T13:12:45:478 GMT+0600', '1682579677', 'Completed'),
(2, 'admission_644a87f90b5f3', 'NPKKGSC915F', 'TR0011HL1682606025482', '01770618575', 'ADR30AWJEX', 320, 'Successful', '2023-04-27T20:33:45:772 GMT+0600', '1682606097', 'Completed');

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
(1, '1', '234007', '1', '76', '1', '2023', '1682688343', '', 1),
(2, '1', '239265', '1', '78', '1', '2023', '1682688343', '', 1),
(3, '1', '233990', '1', '98', '1', '2023', '1682688343', '', 1),
(4, '1', '236351', '1', '98', '1', '2023', '1682688343', '', 1),
(5, '1', '239864', '1', '45', '1', '2023', '1682688343', '', 1),
(6, '1', '237780', '1', '87', '1', '2023', '1682688343', '', 1),
(7, '1', '239900', '1', '56', '1', '2023', '1682688343', '', 1),
(8, '1', '231847', '1', '87', '1', '2023', '1682688343', '', 1),
(9, '3', '234007', '1', '67', '1', '2023', '1682688363', '', 1),
(10, '3', '239265', '1', '87', '1', '2023', '1682688363', '', 1),
(11, '3', '233990', '1', '45', '1', '2023', '1682688363', '', 1),
(12, '3', '236351', '1', '98', '1', '2023', '1682688363', '', 1),
(13, '3', '239864', '1', '54', '1', '2023', '1682688363', '', 1),
(14, '3', '237780', '1', '65', '1', '2023', '1682688363', '', 1),
(15, '3', '239900', '1', '98', '1', '2023', '1682688363', '', 1),
(16, '3', '231847', '1', '45', '1', '2023', '1682688363', '', 1),
(17, '4', '234007', '1', '98', '1', '2023', '1682688378', '', 1),
(18, '4', '239265', '1', '56', '1', '2023', '1682688378', '', 1),
(19, '4', '233990', '1', '45', '1', '2023', '1682688378', '', 1),
(20, '4', '236351', '1', '67', '1', '2023', '1682688378', '', 1),
(21, '4', '239864', '1', '34', '1', '2023', '1682688378', '', 1),
(22, '4', '237780', '1', '76', '1', '2023', '1682688378', '', 1),
(23, '4', '239900', '1', '98', '1', '2023', '1682688378', '', 1),
(24, '4', '231847', '1', '45', '1', '2023', '1682688378', '', 1);

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
('630078a5ef84d', 'Vacation!', 'All activities of Oporajeyo Ekattor Hall will be on hold from 01/10/2022 to 10/10/2022 Due to Durgapuja. From 11/10/2022 , all activities will continue as before.', 'বইক/ছাত্রাবাস/২০২২-০৯', '1660975269', '1661542138', '1', 1),
('630079a47c1b9', 'Appointment of new Meal Manager', '<p>New Meal Manager&nbsp;</p><figure class=\"table\"><table><tbody><tr><td>Name</td><td>Roll</td></tr><tr><td>Dhrubo</td><td>200130</td></tr></tbody></table></figure>', 'বইক/ছাত্রাবাস/২০২২-০৮', '1660975524', '1661542338', '1', 1),
('63090b99ae3c4', 'দূর্গাপূজা', 'আগামী ১ অক্টোবর থেকে ১০অক্টোবর দূর্গাপূজা উপলক্ষে হলের সকল কার্যক্রম বন্ধ থাকবে। ১১ অক্টোবর হতে পুনরায় সকল কার্যক্রম অব্যাহত থাকিবে।\r\n', '01', '1661537177', '1661539974', '', 1),
('63090c3006496', 'খাবারের নোটিশ  ', 'আগামী কাল মিলের সময় সূচী\r\nদুপুর _ ২-৩ টা\r\nরাত_৯-১০টা', '02', '1661537328', '', '', 1),
('630927ffd7a88', 'শীতকালীন অবকাশ ', '<ol><li>আগামী ১ ডিসেম্বর থেকে ১২ ডিসেম্বর পর্যন্ত হলের সকল কার্যক্রম বন্ধ থাকবে।</li><li>১৩ ডিসেম্বর থেকে সকল কার্যক্রম পুনরায় অব্যাহত থাকবে।</li></ol>', '05', '1661544447', '', '1', 1),
('630b408d4a4b4', 'Title', '<p>Demo</p>', 'বইক/ছাত্রাবাস/২০২২-০৮', '1661681805', '', '1', 1),
('631b45772386f', 'sdfwekfn', '<p>wdfihio</p><ol><li>week</li><li>jwefh</li><li>efvn</li></ol>', 'sdjbsdj', '1662731639', '', '1', 1),
('6322f7a195081', 'ষ', '<p><i>গসকসকসকসকসহ</i></p>', 'হ ০১', '1663236001', '', '1', 1);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

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
