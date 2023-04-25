-- mysqldump-php https://github.com/ifsnop/mysqldump-php
--
-- Host: localhost	Database: admission
-- ------------------------------------------------------
-- Server version 	5.5.5-10.4.21-MariaDB
-- Date: Thu, 20 Apr 2023 12:01:09 +0600

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40101 SET @OLD_AUTOCOMMIT=@@AUTOCOMMIT */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `admin`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phoneNumber` varchar(15) NOT NULL,
  `password` varchar(100) NOT NULL,
  `last_notification` varchar(10) NOT NULL,
  `image` varchar(255) NOT NULL,
  `status` int(3) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin`
--

LOCK TABLES `admin` WRITE;
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `admin` VALUES (1,'Dhrubo Raj Roy','Dhruborajroy3@gmail.com','01705927257','$2y$10$3xSV8g1xd.7b6leqDI08MOZS6CMMiYKfsL32wzasO7Sp9BqqF92im','','',1);
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `admin` with 1 row(s)
--

--
-- Table structure for table `applicants`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `applicants` (
  `id` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `first_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `class_roll` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
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
  `status` int(3) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `applicants`
--

LOCK TABLES `applicants` WRITE;
/*!40000 ALTER TABLE `applicants` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `applicants` VALUES ('643adbc599dc9','D','D','','239544','1','Sd','S','D','S','3','s','d','30/11/2002','Male','Hinduism','','N/A','A+','239544','17','','','$2y$10$YFxLOwSxtRow8uhYfXADF.OlK/pc7hOFLHj8bZDRmLGhC326h2sgG','sd@fm.co831','921360','1681578949.jpg',1,'',0),('643adc1807769','D','D','','235574','1','Sd','S','D','S','334','s','d','30/11/2002','Male','Hinduism','','N/A','A+','235574','1','','','$2y$10$7Q1kRUEl0/lnv9ZOM96.FecXALXZQ3arC431uO4AXOKhlrABT1zAu','sd@fm.co969','111196','1681579032.jpg',1,'',0),('643b8c9de50e9','D','D','','235880','1','D','S','D','S','3389','s','d','30/11/2002','Male','Hinduism','324','N/A','A+','235880','9','','','$2y$10$tGMCDaDq3Jd.5HeZ1R89GuKIQorJEBQAi1xlA6J0xYis5tzGAFXcy','sd@fm.co945','499125','1681624221.jpg',1,'',0),('643b8e32c63d4','Dj','J','','236296','1','D2','S2','D2','S2','35572','s2','d2','05/04/2023','Female','Christian','3242','FF','A-','236296','18','','','$2y$10$bleJP08iHUFyFujr5hpasOIwSIKPbDsdM68I1BMyC.9oD8e5JLIqW','sd@fm.co9452','679747','1681624626.jpg',1,'',0),('643b91f9db489','Dhrubo','Raj Roy','','239928','1','D','S','D','S','01705927257','Asarsopara, Sadar','Asarsopara, Sadar','30/11/2002','Male','Hinduism','2344','N/A','A+','239928','6','','','$2y$10$6PpXaWxJt8LSkU.TbhhvI.P4DdiPJeFnEc.uU/WtCmzRqUHfm0exO','dhruborajroy3@gmail.c','119504','1681625593.jpg',1,'',1),('643bab8cadc8f','D','D','','238384','1','D','S','D','S','3681','s','d','30/11/2002','Male','Hinduism','2344','N/A','A+','238384','2','','','$2y$10$5x.t000OY3SWIv2zQ4xn6.4s./oCJ3laUTIIVSi/OlCHc.uYqdTtu','sd@fm.co931','523392','1681632140.jpg',1,'',0),('643bb248b71f5','D','D','','233834','1','D','S','D','S','3267','s','d','30/11/2002','Male','Hinduism','2344','N/A','A+','233834','10','','','$2y$10$58OAhu3CQ6YmmEpvmNHWTe.YlU9ciJkEmRkHGocXt.kS.ATBi13BO','sd@fm.co411','756181','1681633864.jpg',1,'',0),('643bb48370aa1','D','D','','234954','1','D','S','D','S','3434','s','d','30/11/2002','Male','Hinduism','2344','N/A','A+','234954','14','','','$2y$10$S7QjiFoWfp6e57GJfhjyZOzFRMJtVPi1Pk3ZClGdtybbk0Zt/IOBK','sd@fm.co519','325627','1681634435.jpg',1,'',0),('643bbaa40762c','D','D','','237770','1','D','S','D','S','3831','s','d','30/11/2002','Male','Hinduism','2344','N/A','A+','237770','7','','','$2y$10$HizuV83f6YZNqq/XMJ7z2upKRuQg7uK5JaimuYJ9mM/MZWz7fE06m','sd@fm.co240','811895','1681636004.jpg',2,'',0),('643bbbe5235b8','D','D','','236762','1','D','S','D','S','3548','s','d','30/11/2002','Male','Hinduism','2344','N/A','A+','236762','19','','','$2y$10$Q0o5BfQsA.Bi9yukrCE2FeoAGhtdwSnuR8TE5jWXYeSsUdN8dZO1K','sd@fm.co777','824693','1681636325.jpg',1,'',0),('643bc1013b689','Dhruboraj Roy','Dhrubo','','239510','1','D','S','D','S','3538','s','d','30/11/2002','Male','Hinduism','2344','N/A','A+','239510','11','','','$2y$10$E4wGQ.mPcyc4/GNuen7/f.N/ffBfV1bRqAgYxgvsFx90zni56vf9G','sd@fm.co427','960310','1681637633.jpg',1,'',1),('643cd7353d26b','D','D','','231441','1','D','S','D','S','3433','s','d','30/11/2002','Male','Hinduism','2344','N/A','A+','231441','12','','','$2y$10$zninHSwCLqw.ZeaynKOwseiYFdLGBu.rcMvMUJ.vrSVVQaeXy3xGC','sd@fm.co750','938799','1681708853.jpg',0,'',0),('643cd818e3890','D','D','','239274','1','D','S','D','S','3248','s','d','30/11/2002','Male','Hinduism','2344','N/A','A+','239274','15','','','$2y$10$vtXSRfpiLffs4GOf7S6dV.Zh05oRyhFJM3ptcsqlpVEg.Pl0I61Ji','sd@fm.co381','555722','1681709080.jpg',0,'',0),('643cd8cc15f57','D','D','','238418','1','D','S','D','S','32482','s','d','30/11/2002','Male','Hinduism','2344','N/A','A+','238418','5','','','$2y$10$O396.DgUuoql.Zbg8ubqJuvHbGjnS/ebIOc6Hb90xYo9KQ.KAgYOm','sd@fm.co3812','184016','1681709260.jpg',1,'',0),('643cdaa2342a3','D','D','','235129','1','D','S','D','S','3175','s','d','30/11/2002','Male','Hinduism','2344','N/A','A+','235129','16','','','$2y$10$OXX7HxCBYX7wKayOLY/bG.ObEdDe/LkcAku60xDDspFJBGca7KB/y','dhruborajroy3@gmail.c','576830','1681709730.jpg',0,'',1),('643cdaf599dad','D','D','','237403','1','D','S','D','S','3819','s','d','30/11/2002','Male','Hinduism','2344','N/A','A+','237403','3','','','$2y$10$gcJElsC3lEzbhzBUzYiwReFzR2TUYm1/GlypTS9d/G88EQslLOmeK','dhruborajroy3@gmail.coms','162710','1681709813.jpg',0,'',1),('643d36ffaa1f6','D','D','','234421','1','D','S','D','S','3845','s','d','30/11/2002','Male','Hinduism','2344','N/A','A+','234421','4','','','$2y$10$hYl/LwLHKeYcHwqjBLwwJ.GHnLBLYKbWaIMBFiCjgUyYhsX5qmV3a','thewebdivers.official@gmail.com','737883','1681733375.jpg',0,'',0),('643d39c7f27bb','D','D','','237524','1','D','S','D','S','3532','s','d','30/11/2002','Male','Hinduism','2344','N/A','A+','237524','8','','','$2y$10$8qtUpya4uYgbFGE.NNVwcuk4TK7Kitny/SYks3qX62eySAxtOSL4C','sd@fm.co733sdf','914926','1681734087.jpg',0,'',1),('643d3a04e34da','D','D','','232310','1','D','S','D','S','3252','s','d','30/11/2002','Male','Hinduism','2344','N/A','A+','232310','20','','','$2y$10$VUiKLFDPprIPJFbYHguua.BCCtyBzPbDwKZv2s/aqhG2LvAESyKGG','sd@fm.co127','588619','1681734148.jpg',0,'',0),('643d8120a44fb','D','D','','234236','1','D','S','D','S','3589','s','d','30/11/2002','Male','Hinduism','2344','N/A','A+','234236','13','','','$2y$10$hlo1Rtl.SEC2atDQ0fu7ZO.vmuu9ltkXaTQgXf7yMR3KoAvcDpOQy','dhruborajroy3@gmail.com','827001','1681752352.jpg',1,'',1),('643f823e7cc69','D','D','','233775','1','D','S','D','S','3287','s','d','30/11/2002','Male','Hinduism','2344','N/A','A+','233775','','','','$2y$10$RObz/OdEesuPK0kYh1T0d.vQVKBw/9uSwirQTn/dSL1ISHilo3g5i','sd@fm.co563','488989','1681883710.jpg',0,'',0),('643f8a1ad6a63','D','D','','238507','1','D','S','D','S','3663','s','d','30/11/2002','Male','Hinduism','2344','N/A','A+','238507','','','','$2y$10$RGpkISTnsEiz1J5KhxIGkukSqKI2720ywxGMMKvopmRglmLnfj7gK','sd@fm.co955','878094','1681885722.jpg',1,'',1);
/*!40000 ALTER TABLE `applicants` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `applicants` with 22 row(s)
--

--
-- Table structure for table `bkash_credentials`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bkash_credentials` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `app_key` text NOT NULL,
  `app_secret` text NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `base_url` text NOT NULL,
  `id_token` text NOT NULL,
  `refresh_token` text NOT NULL,
  `time` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bkash_credentials`
--

LOCK TABLES `bkash_credentials` WRITE;
/*!40000 ALTER TABLE `bkash_credentials` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `bkash_credentials` VALUES (1,'4f6o0cjiki2rfm34kfdadl1eqq','2is7hdktrekvrbljjh44ll3d9l1dtjo4pasmjvs5vl5qr3fug4b','sandboxTokenizedUser02','sandboxTokenizedUser02@12345','https://tokenized.sandbox.bka.sh/v1.2.0-beta','eyJraWQiOiJvTVJzNU9ZY0wrUnRXQ2o3ZEJtdlc5VDBEcytrckw5M1NzY0VqUzlERXVzPSIsImFsZyI6IlJTMjU2In0.eyJzdWIiOiJlODNlMDkwMC1jY2ZmLTQzYTctODhiNy0wNjE5NDJkMTVmOTYiLCJhdWQiOiI2cDdhcWVzZmljZTAxazltNWdxZTJhMGlhaCIsImV2ZW50X2lkIjoiMmI2Y2U0MWItNjg4ZC00MzMzLThjYjItNDRhNTM0ODY3Njk0IiwidG9rZW5fdXNlIjoiaWQiLCJhdXRoX3RpbWUiOjE2ODE4ODU3MDgsImlzcyI6Imh0dHBzOlwvXC9jb2duaXRvLWlkcC5hcC1zb3V0aGVhc3QtMS5hbWF6b25hd3MuY29tXC9hcC1zb3V0aGVhc3QtMV9yYTNuUFkzSlMiLCJjb2duaXRvOnVzZXJuYW1lIjoic2FuZGJveFRva2VuaXplZFVzZXIwMiIsImV4cCI6MTY4MTg4OTMwOCwiaWF0IjoxNjgxODg1NzA4fQ.QxvFSvjGFfrqaIqO1i4cL_xO6-KyQJjqevqc6ibX7o-SW6KSiSPmc0PE2Mn69nuz8OTGUlg-3V0ol0tr5okXJWd063u-2YTCm3wAB0CGGX5GQBpkoeKdinvFZUwRk3PiOFhCnHx9YK5bYdie8PnjBrFtXc_Cy3Vu2kChe_bhHtA9chs5dK835jp_9cBqKlXNc-BeVWCQvP8anPyWgbnEZFAz_CExlHINA-UD2WgQar83l2itVLodo5imR-mRnZH8O6Bk34XVGrM7LYOQpbUfRJWMmHjaNXahHcYAR7z2xku-EWGBdOjAD_qG4kutH3Ljl_UeizNOC1SFD1IWA4lqGg','eyJjdHkiOiJKV1QiLCJlbmMiOiJBMjU2R0NNIiwiYWxnIjoiUlNBLU9BRVAifQ.VLiEDvhJm9hxWv9ZjW2Y89iqyRnpCBAKsYbzLGLOzL4pWW-Pu354YT6r86UBnLBbm_VHeEV3Xw5Ci1SV3nwh9pXeQEQ7ObetSGRqd3b0l9OyU1d6WBitmfqK74ygVRZQEk159HnnzaJBWZacV3_y5g3qUKEGvW_vAw6F7Y1aYsM0t7vxWFKmD7MYEgeRIIgMMaW6UNopgZUrKy_byTRsV227qGtzhX5Ov01xDbDUkrwsvPIUAo7xyiYXgJ9JPgsXr6CHnMwwxRy2W9YHME307uQyzllhwp0V-11IbpCe1lVqoI7JjVBe0WEzoMo7wj5efFSwEoUNF1cj50yOgnRFxg.W8U3qyGV-xZR7Brd.E4EYR29lUPWXBjV23tyUFExYyFdDg7m1Qirrz5wgR5QmNYr38Mp_4JxfckJMqL0bK2Jw_5wPLFJbpBNlO9bXQwM9OqSe5cNt8YYa2pvFDW5ItSSuS8Q5kTMOLW57_rzq7Sq412p9STU_kjSktV9xba8Mr5ZvuLe7TcFTBPipnotCRt-TSMkzmF1USc_fBUJDiqfHH4DoDMNjj-0LDmj3Lyq8zHf5tYuF1Jdtv81AUum01dFeRGo1taIZLkO2Pv67nyGgbrXjxuiJ5tAdwdEguQlPqtY0Gw-jXtkH9nfrzavvBX_NUfyOxdxR1hCQPRvooaTEgV0zv2trCswHefNQJtxX8eRe3sjRZ_UHOgMXt-CzvAJpXYeQ_ErdHX8RCSFrDb6KKvMGbB5aN9LDT3PinuC7_P6mzdXz_vVeaQIXUEIgyhlGUzvUq3sr-APklrsF-xRcNQI5ym5NCgglG2GaFogLQZwZpyXjQD-uXIMcX0NcNSy1_8NicWUa-n0n8h_LUtV0ROVTQWUf-IDpdD2mtCSQpqgap4wrZjnYGP-yrbmbmId1UHIXcnmx4AcyQxeQvCn2TmtMSQFLWMXv0Ns-0o1RqaTq3COUByOM7nyPAB5DNu_8135FmWim7XB3ngbZ5smIb2RmfxA7ZHfWDkDQcgMBwFbw-Ff2iindbGQmV3ZF1L9ClVE6ESGGd_Q1-eJTRtQ1jIMwllPVVYtNSlNILFdRGL3YPDvIzFqf62PAhyZ3deNNncE5ELhNe0eUSfBhfytuo5gL_724hQPEBH3O_DnnRbbb-fMCvraf7REn7dRcdqUPZ_QWJW2gu9GpJt-fbI3em-Ht_NCw0xPY9T7ZEwbqgD_IRysBpqmCxJIZkc_1skBnQ4qgwzP_ECM7kIAPjZQyY6CpU2NumXY4Iz7eqM8VU4kaCdY9sH-gD8JmRsyccnyVEyJV81fXU2IcTzZ99tQWK2WYjafTiSLZEQN6JjtL5DixMw4n8Z9ofdBPXQcIUnk3bJgLQCH3o_Kr-fUT7TJ6YWSpVhvnxj5--xgbNXRJ6FFWs2IBWh4XJgjO_0XJJwlhqsY9QMB5G8Ty3ExArMgrlFazlBKd6RDWnGoHqi1_bP-_6MCYarDxHjGpswrxKpV0Pr8LpGSr9HtFjpUVbY4GLT1kUM6-H7PnkkGx-_G7wRcv7wNvvHxpdKyzVBPURkW3lepKemWEKAU5S3ty9YXR3lakwyZqBTh1i8wmV86n37uGp5VsKUUVwaWLT4kNteK7Yyuqnab8C2Ry4IdpOPfsG8ZTB9MzduJ8UnDil8t-_fWByuogdWuDE6xUVlN82Z6_sJ0.qC3pm3avRecWthrlsVDiYg','1681885734');
/*!40000 ALTER TABLE `bkash_credentials` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `bkash_credentials` with 1 row(s)
--

--
-- Table structure for table `bkash_online_payment`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bkash_online_payment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tran_id` varchar(50) NOT NULL,
  `user_id` varchar(20) NOT NULL,
  `bkash_payment_id` varchar(100) NOT NULL,
  `customerMsisdn` varchar(20) NOT NULL,
  `trxID` varchar(20) NOT NULL,
  `amount` int(11) NOT NULL,
  `statusMessage` varchar(50) NOT NULL,
  `added_on` varchar(50) NOT NULL,
  `updated_on` varchar(20) NOT NULL,
  `status` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bkash_online_payment`
--

LOCK TABLES `bkash_online_payment` WRITE;
/*!40000 ALTER TABLE `bkash_online_payment` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `bkash_online_payment` VALUES (1,'admission_643e461a8bcb4','643cd8cc15f57','TR0011IK1681802754341','01770618575','ADI00AURC6',124,'Successful','2023-04-18T13:25:54:408 GMT+0600','1681802849','Completed'),(2,'admission_643f8a275a07b','643f8a1ad6a63','TR0011DV1681885708827','01770618575','ADJ60AUY7A',124,'Successful','2023-04-19T12:28:29:272 GMT+0600','1681885867','Completed');
/*!40000 ALTER TABLE `bkash_online_payment` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `bkash_online_payment` with 2 row(s)
--

--
-- Table structure for table `class`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `class` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `status` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `class`
--

LOCK TABLES `class` WRITE;
/*!40000 ALTER TABLE `class` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `class` VALUES (1,'Seven','1');
/*!40000 ALTER TABLE `class` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `class` with 1 row(s)
--

--
-- Table structure for table `exam`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `exam` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `status` int(2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `exam`
--

LOCK TABLES `exam` WRITE;
/*!40000 ALTER TABLE `exam` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `exam` VALUES (1,'Admission Test 2022',1);
/*!40000 ALTER TABLE `exam` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `exam` with 1 row(s)
--

--
-- Table structure for table `mark`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mark` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sub_id` varchar(20) NOT NULL,
  `exam_roll` varchar(20) NOT NULL,
  `class_id` varchar(20) NOT NULL,
  `mark` varchar(10) NOT NULL,
  `exam_id` varchar(20) NOT NULL,
  `year` varchar(10) NOT NULL,
  `added_on` varchar(20) NOT NULL,
  `updated_on` varchar(20) NOT NULL,
  `status` int(2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mark`
--

LOCK TABLES `mark` WRITE;
/*!40000 ALTER TABLE `mark` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `mark` VALUES (1,'1','234236','1','5','1','2022','1681826135','',1),(2,'1','232310','1','27','1','2022','1681826135','',1),(3,'1','237524','1','33','1','2022','1681826135','',1),(4,'3','234236','1','57','1','2022','1681826152','',1),(5,'3','232310','1','27','1','2022','1681826152','',1),(6,'3','237524','1','33','1','2022','1681826152','',1),(7,'3','234421','1','76','1','2022','','',1),(8,'3','237403','1','76','1','2022','','',1),(9,'3','235129','1','56','1','2022','','',1),(10,'3','238418','1','75','1','2022','','',1),(11,'3','239274','1','56','1','2022','','',1),(12,'3','231441','1','65','1','2022','','',1),(13,'3','239510','1','65','1','2022','','',1),(14,'3','236762','1','55','1','2022','','',1),(15,'3','237770','1','66','1','2022','','',1),(16,'3','234954','1','56','1','2022','','',1),(17,'3','233834','1','65','1','2022','','',1),(18,'3','238384','1','76','1','2022','','',1),(19,'3','239928','1','74','1','2022','','',1),(20,'3','236296','1','55','1','2022','','',1),(21,'3','235880','1','65','1','2022','','',1),(22,'3','235574','1','77','1','2022','','',1),(23,'3','239544','1','55','1','2022','','',1),(24,'3','229898','1','34','1','2022','','',1);
/*!40000 ALTER TABLE `mark` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `mark` with 24 row(s)
--

--
-- Table structure for table `notice`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `notice` (
  `id` varchar(20) NOT NULL,
  `title` varchar(255) NOT NULL,
  `details` text NOT NULL,
  `reference` text NOT NULL,
  `added_on` varchar(20) NOT NULL,
  `updated_on` varchar(20) NOT NULL,
  `user_id` varchar(11) NOT NULL,
  `status` int(11) NOT NULL,
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `notice`
--

LOCK TABLES `notice` WRITE;
/*!40000 ALTER TABLE `notice` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `notice` VALUES ('630078a5ef84d','Vacation!','All activities of Oporajeyo Ekattor Hall will be on hold from 01/10/2022 to 10/10/2022 Due to Durgapuja. From 11/10/2022 , all activities will continue as before.','বইক/ছাত্রাবাস/২০২২-০৯','1660975269','1661542138','1',1),('630079a47c1b9','Appointment of new Meal Manager','<p>New Meal Manager&nbsp;</p><figure class=\"table\"><table><tbody><tr><td>Name</td><td>Roll</td></tr><tr><td>Dhrubo</td><td>200130</td></tr></tbody></table></figure>','বইক/ছাত্রাবাস/২০২২-০৮','1660975524','1661542338','1',1),('63090b99ae3c4','দূর্গাপূজা','আগামী ১ অক্টোবর থেকে ১০অক্টোবর দূর্গাপূজা উপলক্ষে হলের সকল কার্যক্রম বন্ধ থাকবে। ১১ অক্টোবর হতে পুনরায় সকল কার্যক্রম অব্যাহত থাকিবে।\r\n','01','1661537177','1661539974','',1),('63090c3006496','খাবারের নোটিশ  ','আগামী কাল মিলের সময় সূচী\r\nদুপুর _ ২-৩ টা\r\nরাত_৯-১০টা','02','1661537328','','',1),('630927ffd7a88','শীতকালীন অবকাশ ','<ol><li>আগামী ১ ডিসেম্বর থেকে ১২ ডিসেম্বর পর্যন্ত হলের সকল কার্যক্রম বন্ধ থাকবে।</li><li>১৩ ডিসেম্বর থেকে সকল কার্যক্রম পুনরায় অব্যাহত থাকবে।</li></ol>','05','1661544447','','1',1),('630b408d4a4b4','Title','<p>Demo</p>','বইক/ছাত্রাবাস/২০২২-০৮','1661681805','','1',1),('631b45772386f','sdfwekfn','<p>wdfihio</p><ol><li>week</li><li>jwefh</li><li>efvn</li></ol>','sdjbsdj','1662731639','','1',1),('6322f7a195081','ষ','<p><i>গসকসকসকসকসহ</i></p>','হ ০১','1663236001','','1',1);
/*!40000 ALTER TABLE `notice` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `notice` with 8 row(s)
--

--
-- Table structure for table `online_payment`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
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
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `online_payment`
--

LOCK TABLES `online_payment` WRITE;
/*!40000 ALTER TABLE `online_payment` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `online_payment` VALUES ('admission_632723ae57d82','6327203d06a83','admission_632723ae0a037','2209181959201mOHBpYqMI8SLyt','122.00','ABBANKIB-AB Bank','2022-09-18 19:59:14','AB Bank Limited','','','1663509422','1663509433','VALID'),('admission_632723c1df582','6327203d06a83','admission_632723c145331','','122.00','','2022-09-18 19:59:33','Bank Asia Limited','','Invalid expiration date','1663509441','1663509455','FAILED'),('admission_632832a9bbea2','6327203d06a83','admission_632832a97f447','220919151905lwuUsYPWZrbDfbP','122.00','NAGAD-Nagad','2022-09-19 15:15:23','Nagad','','','1663578793','1663579019','VALID'),('admission_632876a9b2db4','6327203d06a83','admission_632876a8c2a81','220919200538eyGYY1fur5hEEID','122.00','ABBANKIB-AB Bank','2022-09-19 20:05:31','AB Bank Limited','','','1663596201','1663596213','VALID'),('admission_63287765887af','6327203d06a83','admission_632877652af55','220919200848VztSSwiu4wv5OOF','122.00','BKASH-BKash','2022-09-19 20:08:39','BKash Mobile Banking','','','1663596389','1663596403','VALID'),('admission_63288ed655b61','6327203d06a83','admission_63288ed61c010','22091921485411Fayd9TCqmrlSK','122.00','BKASH-BKash','2022-09-19 21:48:39','BKash Mobile Banking','','','1663602390','1663602409','VALID'),('admission_632c399e924c1','6327203d06a83','admission_632c399e4f18e','2209221634130lVAX0R6Q96pM7h','122.00','BKASH-BKash','2022-09-22 16:34:01','BKash Mobile Banking','','','1663842718','1663842734','VALID');
/*!40000 ALTER TABLE `online_payment` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `online_payment` with 7 row(s)
--

--
-- Table structure for table `refund_payment`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `refund_payment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `statusMessage` varchar(20) NOT NULL,
  `user_id` varchar(50) NOT NULL,
  `tran_id` varchar(50) NOT NULL,
  `originalTrxID` varchar(20) NOT NULL,
  `refundTrxID` varchar(20) NOT NULL,
  `transactionStatus` varchar(20) NOT NULL,
  `amount` varchar(20) NOT NULL,
  `completedTime` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `refund_payment`
--

LOCK TABLES `refund_payment` WRITE;
/*!40000 ALTER TABLE `refund_payment` DISABLE KEYS */;
SET autocommit=0;
/*!40000 ALTER TABLE `refund_payment` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `refund_payment` with 0 row(s)
--

--
-- Table structure for table `subjects`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `subjects` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `sub_code` varchar(50) NOT NULL,
  `full_mark` varchar(50) NOT NULL,
  `status` int(2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `subjects`
--

LOCK TABLES `subjects` WRITE;
/*!40000 ALTER TABLE `subjects` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `subjects` VALUES (1,'Bangla','BAN 101','100',1),(3,'English','EN 101','100',1),(4,'Physics','PHY 202','100',1);
/*!40000 ALTER TABLE `subjects` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `subjects` with 3 row(s)
--

/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;
/*!40101 SET AUTOCOMMIT=@OLD_AUTOCOMMIT */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on: Thu, 20 Apr 2023 12:01:09 +0600
