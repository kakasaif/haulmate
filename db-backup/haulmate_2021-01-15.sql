# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.5.5-10.2.10-MariaDB)
# Database: haulmate
# Generation Time: 2021-01-14 22:13:58 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table administrator
# ------------------------------------------------------------

DROP TABLE IF EXISTS `administrator`;

CREATE TABLE `administrator` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` enum('Super','Admin','Housing','Partner','Both') COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `administrator_email_unique` (`email`),
  KEY `name` (`name`),
  KEY `email_verified_at` (`email_verified_at`),
  KEY `password` (`password`),
  KEY `remember_token` (`remember_token`),
  KEY `created_at` (`created_at`),
  KEY `updated_at` (`updated_at`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `administrator` WRITE;
/*!40000 ALTER TABLE `administrator` DISABLE KEYS */;

INSERT INTO `administrator` (`id`, `name`, `email`, `email_verified_at`, `password`, `role`, `remember_token`, `is_active`, `created_at`, `updated_at`)
VALUES
	(1,'administrator','admin@admin.com','2020-04-19 03:10:57','$2y$10$hx6m.1pMzjUS8k.TJ0Mss.PLsaOqiS6sxLWAfzLHYCzrxJz9H.wuO','Super',NULL,1,'2020-04-19 03:10:57','2020-04-19 03:10:57'),
	(2,'housing','housing@housing.com',NULL,'$2y$10$UYqTMgaFzbRmqvxvNhbnpupNHI8iYlwgkh/8FbsawBiw3INcK.8Qm','Housing',NULL,1,'2020-07-31 04:32:25','2020-07-31 04:34:04'),
	(3,'partner','partner@partner.com',NULL,'$2y$10$9kyTAcxtBVBb.aOWmXSCMeAtcLi03zmzIuIe4bjpPcplYZjFM2D1O','Partner',NULL,1,'2020-07-31 04:32:51','2020-07-31 04:32:51'),
	(4,'both','both@both.com',NULL,'$2y$10$iKh8.FpO08D3h9tWUm2WG.fdCLFRhhgXkgt67WbSoF/6GPVD8NcKS','Both',NULL,1,'2020-07-31 04:33:07','2020-07-31 05:07:30'),
	(5,'Partner Test','partner@test.com',NULL,'$2y$10$t.Zgr0M8Ov38lQfFYClVfOg6t/0B7QWeIKRP.BF35c4R1SyopTQkq','Partner',NULL,1,'2020-08-30 06:33:15','2020-08-30 06:33:15');

/*!40000 ALTER TABLE `administrator` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table categories
# ------------------------------------------------------------

DROP TABLE IF EXISTS `categories`;

CREATE TABLE `categories` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `seo_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `category` (`category`),
  KEY `seo_name` (`seo_name`),
  KEY `is_active` (`is_active`),
  KEY `created_at` (`created_at`),
  KEY `updated_at` (`updated_at`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;

INSERT INTO `categories` (`id`, `category`, `seo_name`, `is_active`, `created_at`, `updated_at`)
VALUES
	(1,'General','general',1,'2020-04-19 03:33:07','2020-04-19 05:00:00'),
	(2,'Meet-ups','meet-ups',1,'2020-04-19 03:33:07','2020-04-26 04:38:00'),
	(3,'Areas to Live','areas-to-live',1,'2020-04-19 03:33:07','2020-04-26 04:38:10'),
	(4,'Parenting & Schools','parenting-and-schools',1,'2020-04-19 03:33:07','2020-04-26 04:38:29'),
	(5,'Jobs','jobs',1,'2020-04-19 03:33:07','2020-04-26 04:38:41'),
	(6,'Visa','visa',1,'2020-04-19 03:33:07','2020-04-26 04:38:45'),
	(8,'Other','other',1,'2020-04-19 03:33:07','2020-04-19 03:33:07');

/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table contactus
# ------------------------------------------------------------

DROP TABLE IF EXISTS `contactus`;

CREATE TABLE `contactus` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `name` (`name`),
  KEY `email` (`email`),
  KEY `created_at` (`created_at`),
  KEY `updated_at` (`updated_at`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `contactus` WRITE;
/*!40000 ALTER TABLE `contactus` DISABLE KEYS */;

INSERT INTO `contactus` (`id`, `name`, `email`, `message`, `created_at`, `updated_at`)
VALUES
	(1,'test contact person','test@mail.com','this is the test message','2020-05-06 04:50:05','2020-05-06 04:50:05'),
	(2,'Hey','Hey','Hey','2020-05-09 07:42:37','2020-05-09 07:42:37'),
	(3,'New Name','Some Email','This is cymessage here.','2020-05-09 09:30:16','2020-05-09 09:30:16'),
	(4,'Knox Newton','jafyc@mailinator.net','A enim ut iure in de','2020-05-22 12:33:23','2020-05-22 12:33:23'),
	(5,'ZAP','ZAP','c:/Windows/system.ini','2020-11-12 10:27:23','2020-11-12 10:27:23'),
	(6,'ZAP','ZAP','../../../../../../../../../../../../../../../../Windows/system.ini','2020-11-12 10:27:24','2020-11-12 10:27:24'),
	(7,'ZAP','ZAP','c:\\Windows\\system.ini','2020-11-12 10:27:25','2020-11-12 10:27:25'),
	(8,'ZAP','ZAP','..\\..\\..\\..\\..\\..\\..\\..\\..\\..\\..\\..\\..\\..\\..\\..\\Windows\\system.ini','2020-11-12 10:27:26','2020-11-12 10:27:26'),
	(9,'ZAP','ZAP','/etc/passwd','2020-11-12 10:27:27','2020-11-12 10:27:27'),
	(10,'ZAP','ZAP','../../../../../../../../../../../../../../../../etc/passwd','2020-11-12 10:27:28','2020-11-12 10:27:28'),
	(11,'ZAP','ZAP','c:/','2020-11-12 10:27:28','2020-11-12 10:27:28'),
	(12,'ZAP','ZAP','/','2020-11-12 10:27:29','2020-11-12 10:27:29'),
	(13,'ZAP','ZAP','c:\\','2020-11-12 10:27:30','2020-11-12 10:27:30'),
	(14,'ZAP','ZAP','../../../../../../../../../../../../../../../../','2020-11-12 10:27:31','2020-11-12 10:27:31'),
	(15,'ZAP','ZAP','WEB-INF/web.xml','2020-11-12 10:27:32','2020-11-12 10:27:32'),
	(16,'ZAP','ZAP','WEB-INF\\web.xml','2020-11-12 10:27:33','2020-11-12 10:27:33'),
	(17,'ZAP','ZAP','/WEB-INF/web.xml','2020-11-12 10:27:34','2020-11-12 10:27:34'),
	(18,'ZAP','ZAP','\\WEB-INF\\web.xml','2020-11-12 10:27:35','2020-11-12 10:27:35'),
	(19,'ZAP','ZAP','thishouldnotexistandhopefullyitwillnot','2020-11-12 10:27:36','2020-11-12 10:27:36'),
	(20,'ZAP','ZAP','c:/Windows/system.ini','2020-11-12 10:31:19','2020-11-12 10:31:19'),
	(21,'ZAP','ZAP','../../../../../../../../../../../../../../../../Windows/system.ini','2020-11-12 10:31:20','2020-11-12 10:31:20'),
	(22,'ZAP','ZAP','c:\\Windows\\system.ini','2020-11-12 10:31:21','2020-11-12 10:31:21'),
	(23,'ZAP','ZAP','..\\..\\..\\..\\..\\..\\..\\..\\..\\..\\..\\..\\..\\..\\..\\..\\Windows\\system.ini','2020-11-12 10:31:22','2020-11-12 10:31:22'),
	(24,'ZAP','ZAP','/etc/passwd','2020-11-12 10:31:23','2020-11-12 10:31:23'),
	(25,'ZAP','ZAP','../../../../../../../../../../../../../../../../etc/passwd','2020-11-12 10:31:24','2020-11-12 10:31:24'),
	(26,'ZAP','ZAP','c:/','2020-11-12 10:31:24','2020-11-12 10:31:24'),
	(27,'ZAP','ZAP','/','2020-11-12 10:31:25','2020-11-12 10:31:25'),
	(28,'ZAP','ZAP','c:\\','2020-11-12 10:31:26','2020-11-12 10:31:26'),
	(29,'ZAP','ZAP','../../../../../../../../../../../../../../../../','2020-11-12 10:31:27','2020-11-12 10:31:27'),
	(30,'ZAP','ZAP','WEB-INF/web.xml','2020-11-12 10:31:28','2020-11-12 10:31:28'),
	(31,'ZAP','ZAP','WEB-INF\\web.xml','2020-11-12 10:31:28','2020-11-12 10:31:28'),
	(32,'ZAP','ZAP','/WEB-INF/web.xml','2020-11-12 10:31:29','2020-11-12 10:31:29'),
	(33,'ZAP','ZAP','\\WEB-INF\\web.xml','2020-11-12 10:31:30','2020-11-12 10:31:30'),
	(34,'ZAP','ZAP','thishouldnotexistandhopefullyitwillnot','2020-11-12 10:31:31','2020-11-12 10:31:31'),
	(35,'arachni_name\"\'`--','arachni@email.gr','1','2020-12-14 09:45:31','2020-12-14 09:45:31'),
	(36,'arachni_name','arachni@email.gr','1)','2020-12-14 09:45:31','2020-12-14 09:45:31'),
	(37,'arachni_name)','arachni@email.gr','1','2020-12-14 09:45:31','2020-12-14 09:45:31'),
	(38,'arachni_name','arachni@email.gr)','1','2020-12-14 09:45:31','2020-12-14 09:45:31'),
	(39,'arachni_name','arachni@email.gr','1','2020-12-14 09:45:31','2020-12-14 09:45:31'),
	(40,'arachni_name','arachni@email.gr\"\'`--','1','2020-12-14 09:45:32','2020-12-14 09:45:32'),
	(41,'arachni_name','arachni@email.gr','1\"\'`--','2020-12-14 09:45:32','2020-12-14 09:45:32'),
	(42,'arachni_name','arachni@email.gr','1','2020-12-16 02:29:16','2020-12-16 02:29:16'),
	(43,'arachni_name','arachni@email.gr\"\'`--','1','2020-12-16 02:29:18','2020-12-16 02:29:18'),
	(44,'arachni_name\"\'`--','arachni@email.gr','1','2020-12-16 02:29:18','2020-12-16 02:29:18'),
	(45,'arachni_name','arachni@email.gr)','1','2020-12-16 02:29:19','2020-12-16 02:29:19'),
	(46,'arachni_name','arachni@email.gr','1)','2020-12-16 02:29:19','2020-12-16 02:29:19'),
	(47,'arachni_name)','arachni@email.gr','1','2020-12-16 02:29:19','2020-12-16 02:29:19'),
	(48,'arachni_name','arachni@email.gr','1\"\'`--','2020-12-16 02:29:19','2020-12-16 02:29:19'),
	(49,'arachni_name','arachni@email.gr\"\'`--','1','2020-12-17 02:13:20','2020-12-17 02:13:20'),
	(50,'arachni_name','arachni@email.gr','1\"\'`--','2020-12-17 02:13:20','2020-12-17 02:13:20'),
	(51,'arachni_name\"\'`--','arachni@email.gr','1','2020-12-17 02:13:20','2020-12-17 02:13:20'),
	(52,'arachni_name','arachni@email.gr)','1','2020-12-17 02:13:20','2020-12-17 02:13:20'),
	(53,'arachni_name','arachni@email.gr','1)','2020-12-17 02:13:20','2020-12-17 02:13:20'),
	(54,'arachni_name)','arachni@email.gr','1','2020-12-17 02:13:20','2020-12-17 02:13:20'),
	(55,'arachni_name','arachni@email.gr','1','2020-12-17 02:13:21','2020-12-17 02:13:21'),
	(56,'arachni_name\"\'`--','arachni@email.gr','1','2020-12-19 16:37:19','2020-12-19 16:37:19'),
	(57,'arachni_name','arachni@email.gr','1)','2020-12-19 16:37:19','2020-12-19 16:37:19'),
	(58,'arachni_name','arachni@email.gr','1\"\'`--','2020-12-19 16:37:19','2020-12-19 16:37:19'),
	(59,'arachni_name','arachni@email.gr','1','2020-12-19 16:37:21','2020-12-19 16:37:21'),
	(60,'arachni_name)','arachni@email.gr','1','2020-12-19 16:37:21','2020-12-19 16:37:21'),
	(61,'arachni_name','arachni@email.gr)','1','2020-12-19 16:37:21','2020-12-19 16:37:21'),
	(62,'arachni_name','arachni@email.gr\"\'`--','1','2020-12-19 16:37:21','2020-12-19 16:37:21'),
	(63,'arachni_name)','arachni@email.gr','1','2020-12-21 07:17:16','2020-12-21 07:17:16'),
	(64,'arachni_name','arachni@email.gr','1\"\'`--','2020-12-21 07:17:16','2020-12-21 07:17:16'),
	(65,'arachni_name','arachni@email.gr\"\'`--','1','2020-12-21 07:17:16','2020-12-21 07:17:16'),
	(66,'arachni_name\"\'`--','arachni@email.gr','1','2020-12-21 07:17:17','2020-12-21 07:17:17'),
	(67,'arachni_name','arachni@email.gr','1','2020-12-21 07:17:17','2020-12-21 07:17:17'),
	(68,'arachni_name','arachni@email.gr)','1','2020-12-21 07:17:17','2020-12-21 07:17:17'),
	(69,'arachni_name','arachni@email.gr','1)','2020-12-21 07:17:18','2020-12-21 07:17:18'),
	(70,'arachni_name)','arachni@email.gr','1','2020-12-22 18:23:41','2020-12-22 18:23:41'),
	(71,'arachni_name\"\'`--','arachni@email.gr','1','2020-12-22 18:23:42','2020-12-22 18:23:42'),
	(72,'arachni_name','arachni@email.gr\"\'`--','1','2020-12-22 18:23:42','2020-12-22 18:23:42'),
	(73,'arachni_name','arachni@email.gr','1\"\'`--','2020-12-22 18:23:43','2020-12-22 18:23:43'),
	(74,'arachni_name','arachni@email.gr','1','2020-12-22 18:23:43','2020-12-22 18:23:43'),
	(75,'arachni_name','arachni@email.gr','1)','2020-12-22 18:23:43','2020-12-22 18:23:43'),
	(76,'arachni_name','arachni@email.gr)','1','2020-12-22 18:23:43','2020-12-22 18:23:43'),
	(77,'arachni_name','arachni@email.gr','1)','2020-12-24 05:24:51','2020-12-24 05:24:51'),
	(78,'arachni_name\"\'`--','arachni@email.gr','1','2020-12-24 05:24:51','2020-12-24 05:24:51'),
	(79,'arachni_name','arachni@email.gr','1\"\'`--','2020-12-24 05:24:52','2020-12-24 05:24:52'),
	(80,'arachni_name','arachni@email.gr','1','2020-12-24 05:24:52','2020-12-24 05:24:52'),
	(81,'arachni_name','arachni@email.gr\"\'`--','1','2020-12-24 05:24:52','2020-12-24 05:24:52'),
	(82,'arachni_name)','arachni@email.gr','1','2020-12-24 05:24:52','2020-12-24 05:24:52'),
	(83,'arachni_name','arachni@email.gr)','1','2020-12-24 05:24:52','2020-12-24 05:24:52'),
	(84,'arachni_name','arachni@email.gr','1\"\'`--','2020-12-25 11:58:07','2020-12-25 11:58:07'),
	(85,'arachni_name','arachni@email.gr','1)','2020-12-25 11:58:07','2020-12-25 11:58:07'),
	(86,'arachni_name','arachni@email.gr\"\'`--','1','2020-12-25 11:58:07','2020-12-25 11:58:07'),
	(87,'arachni_name','arachni@email.gr','1','2020-12-25 11:58:08','2020-12-25 11:58:08'),
	(88,'arachni_name)','arachni@email.gr','1','2020-12-25 11:58:08','2020-12-25 11:58:08'),
	(89,'arachni_name\"\'`--','arachni@email.gr','1','2020-12-25 11:58:08','2020-12-25 11:58:08'),
	(90,'arachni_name','arachni@email.gr)','1','2020-12-25 11:58:08','2020-12-25 11:58:08'),
	(91,'arachni_name','arachni@email.gr)','1','2020-12-25 12:45:20','2020-12-25 12:45:20'),
	(92,'arachni_name','arachni@email.gr','1\"\'`--','2020-12-25 12:45:20','2020-12-25 12:45:20'),
	(93,'arachni_name','arachni@email.gr','1','2020-12-25 12:45:20','2020-12-25 12:45:20'),
	(94,'arachni_name','arachni@email.gr\"\'`--','1','2020-12-25 12:45:20','2020-12-25 12:45:20'),
	(95,'arachni_name)','arachni@email.gr','1','2020-12-25 12:45:20','2020-12-25 12:45:20'),
	(96,'arachni_name\"\'`--','arachni@email.gr','1','2020-12-25 12:45:21','2020-12-25 12:45:21'),
	(97,'arachni_name','arachni@email.gr','1)','2020-12-25 12:45:21','2020-12-25 12:45:21'),
	(98,'arachni_name','arachni@email.gr','1\"\'`--','2020-12-26 08:15:30','2020-12-26 08:15:30'),
	(99,'arachni_name\"\'`--','arachni@email.gr','1','2020-12-26 08:15:30','2020-12-26 08:15:30'),
	(100,'arachni_name','arachni@email.gr)','1','2020-12-26 08:15:30','2020-12-26 08:15:30'),
	(101,'arachni_name','arachni@email.gr\"\'`--','1','2020-12-26 08:15:30','2020-12-26 08:15:30'),
	(102,'arachni_name)','arachni@email.gr','1','2020-12-26 08:15:30','2020-12-26 08:15:30'),
	(103,'arachni_name','arachni@email.gr','1','2020-12-26 08:15:30','2020-12-26 08:15:30'),
	(104,'arachni_name','arachni@email.gr','1)','2020-12-26 08:15:31','2020-12-26 08:15:31'),
	(105,'arachni_name','arachni@email.gr','1','2020-12-26 08:35:50','2020-12-26 08:35:50'),
	(106,'arachni_name','arachni@email.gr\"\'`--','1','2020-12-26 08:35:52','2020-12-26 08:35:52'),
	(107,'arachni_name','arachni@email.gr','1)','2020-12-26 08:35:52','2020-12-26 08:35:52'),
	(108,'arachni_name','arachni@email.gr','1\"\'`--','2020-12-26 08:35:52','2020-12-26 08:35:52'),
	(109,'arachni_name)','arachni@email.gr','1','2020-12-26 08:35:52','2020-12-26 08:35:52'),
	(110,'arachni_name','arachni@email.gr)','1','2020-12-26 08:35:53','2020-12-26 08:35:53'),
	(111,'arachni_name\"\'`--','arachni@email.gr','1','2020-12-26 08:35:53','2020-12-26 08:35:53'),
	(112,'arachni_name','arachni@email.gr)','1','2020-12-26 09:46:44','2020-12-26 09:46:44'),
	(113,'arachni_name','arachni@email.gr','1)','2020-12-26 09:46:44','2020-12-26 09:46:44'),
	(114,'arachni_name','arachni@email.gr\"\'`--','1','2020-12-26 09:46:44','2020-12-26 09:46:44'),
	(115,'arachni_name','arachni@email.gr','1\"\'`--','2020-12-26 09:46:44','2020-12-26 09:46:44'),
	(116,'arachni_name)','arachni@email.gr','1','2020-12-26 09:46:44','2020-12-26 09:46:44'),
	(117,'arachni_name','arachni@email.gr','1','2020-12-26 09:46:44','2020-12-26 09:46:44'),
	(118,'arachni_name\"\'`--','arachni@email.gr','1','2020-12-26 09:46:44','2020-12-26 09:46:44'),
	(119,'arachni_name\"\'`--','arachni@email.gr','1','2020-12-27 08:15:17','2020-12-27 08:15:17'),
	(120,'arachni_name)','arachni@email.gr','1','2020-12-27 08:15:17','2020-12-27 08:15:17'),
	(121,'arachni_name','arachni@email.gr\"\'`--','1','2020-12-27 08:15:17','2020-12-27 08:15:17'),
	(122,'arachni_name','arachni@email.gr','1\"\'`--','2020-12-27 08:15:17','2020-12-27 08:15:17'),
	(123,'arachni_name','arachni@email.gr','1','2020-12-27 08:15:18','2020-12-27 08:15:18'),
	(124,'arachni_name','arachni@email.gr)','1','2020-12-27 08:15:18','2020-12-27 08:15:18'),
	(125,'arachni_name','arachni@email.gr','1)','2020-12-27 08:15:18','2020-12-27 08:15:18'),
	(126,'arachni_name','arachni@email.gr\"\'`--','1','2020-12-28 22:14:37','2020-12-28 22:14:37'),
	(127,'arachni_name','arachni@email.gr','1)','2020-12-28 22:14:38','2020-12-28 22:14:38'),
	(128,'arachni_name\"\'`--','arachni@email.gr','1','2020-12-28 22:14:39','2020-12-28 22:14:39'),
	(129,'arachni_name','arachni@email.gr','1','2020-12-28 22:14:39','2020-12-28 22:14:39'),
	(130,'arachni_name','arachni@email.gr)','1','2020-12-28 22:14:39','2020-12-28 22:14:39'),
	(131,'arachni_name','arachni@email.gr','1\"\'`--','2020-12-28 22:14:39','2020-12-28 22:14:39'),
	(132,'arachni_name)','arachni@email.gr','1','2020-12-28 22:14:39','2020-12-28 22:14:39'),
	(133,'belamodusss','ingryd_victoria@hotmail.com','par cê bom','2020-12-30 16:21:51','2020-12-30 16:21:51'),
	(134,'belamodusss','ingryd_victoria@hotmail.com','par cê bom','2020-12-30 16:21:53','2020-12-30 16:21:53'),
	(135,'arachni_name','arachni@email.gr','1)','2020-12-30 17:04:33','2020-12-30 17:04:33'),
	(136,'arachni_name\"\'`--','arachni@email.gr','1','2020-12-30 17:04:34','2020-12-30 17:04:34'),
	(137,'arachni_name','arachni@email.gr)','1','2020-12-30 17:04:34','2020-12-30 17:04:34'),
	(138,'arachni_name','arachni@email.gr','1','2020-12-30 17:04:34','2020-12-30 17:04:34'),
	(139,'arachni_name','arachni@email.gr\"\'`--','1','2020-12-30 17:04:34','2020-12-30 17:04:34'),
	(140,'arachni_name)','arachni@email.gr','1','2020-12-30 17:04:34','2020-12-30 17:04:34'),
	(141,'arachni_name','arachni@email.gr','1\"\'`--','2020-12-30 17:04:34','2020-12-30 17:04:34'),
	(142,'arachni_name','arachni@email.gr)','1','2021-01-02 05:01:44','2021-01-02 05:01:44'),
	(143,'arachni_name\"\'`--','arachni@email.gr','1','2021-01-02 05:01:44','2021-01-02 05:01:44'),
	(144,'arachni_name','arachni@email.gr','1\"\'`--','2021-01-02 05:01:44','2021-01-02 05:01:44'),
	(145,'arachni_name','arachni@email.gr\"\'`--','1','2021-01-02 05:01:44','2021-01-02 05:01:44'),
	(146,'arachni_name','arachni@email.gr','1','2021-01-02 05:01:45','2021-01-02 05:01:45'),
	(147,'arachni_name','arachni@email.gr','1)','2021-01-02 05:01:45','2021-01-02 05:01:45'),
	(148,'arachni_name)','arachni@email.gr','1','2021-01-02 05:01:45','2021-01-02 05:01:45'),
	(149,'arachni_name\"\'`--','arachni@email.gr','1','2021-01-03 10:56:54','2021-01-03 10:56:54'),
	(150,'arachni_name','arachni@email.gr\"\'`--','1','2021-01-03 10:56:54','2021-01-03 10:56:54'),
	(151,'arachni_name)','arachni@email.gr','1','2021-01-03 10:56:54','2021-01-03 10:56:54'),
	(152,'arachni_name','arachni@email.gr','1)','2021-01-03 10:56:54','2021-01-03 10:56:54'),
	(153,'arachni_name','arachni@email.gr)','1','2021-01-03 10:56:54','2021-01-03 10:56:54'),
	(154,'arachni_name','arachni@email.gr','1\"\'`--','2021-01-03 10:56:54','2021-01-03 10:56:54'),
	(155,'arachni_name','arachni@email.gr','1','2021-01-03 10:56:55','2021-01-03 10:56:55');

/*!40000 ALTER TABLE `contactus` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table countries
# ------------------------------------------------------------

DROP TABLE IF EXISTS `countries`;

CREATE TABLE `countries` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `flag_url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `latitude` decimal(10,8) NOT NULL,
  `longitude` decimal(11,8) NOT NULL,
  `is_active` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `code` (`code`),
  KEY `country` (`country`),
  KEY `flag_url` (`flag_url`),
  KEY `is_active` (`is_active`),
  KEY `created_at` (`created_at`),
  KEY `updated_at` (`updated_at`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `countries` WRITE;
/*!40000 ALTER TABLE `countries` DISABLE KEYS */;

INSERT INTO `countries` (`id`, `code`, `country`, `flag_url`, `latitude`, `longitude`, `is_active`, `created_at`, `updated_at`)
VALUES
	(1,'AU','Australia','https://upload.wikimedia.org/wikipedia/commons/8/88/Flag_of_Australia_%28converted%29.svg',-25.27439800,133.77513600,1,'2020-05-13 07:10:28','2020-06-17 10:55:08'),
	(2,'US','United States of America ','https://upload.wikimedia.org/wikipedia/en/a/a4/Flag_of_the_United_States.svg',37.09024000,-95.71289100,1,'2020-05-13 07:10:28','2020-06-17 10:55:08'),
	(3,'GB','United Kingdom','https://upload.wikimedia.org/wikipedia/en/a/ae/Flag_of_the_United_Kingdom.svg',55.37805100,-3.43597300,1,'2020-05-13 07:10:28','2020-06-17 10:55:08'),
	(4,'AE','United Arab Emirates ','https://upload.wikimedia.org/wikipedia/commons/c/cb/Flag_of_the_United_Arab_Emirates.svg',23.42407600,53.84781800,1,'2020-05-13 07:10:28','2020-06-17 10:55:08'),
	(5,'AF','Afghanistan','https://upload.wikimedia.org/wikipedia/commons/9/9a/Flag_of_Afghanistan.svg',33.93911000,67.70995300,1,'2020-05-13 07:10:28','2020-06-17 10:55:08'),
	(6,'AL','Albania','https://upload.wikimedia.org/wikipedia/commons/3/36/Flag_of_Albania.svg',41.15333200,20.16833100,1,'2020-05-13 07:10:28','2020-06-17 10:55:08'),
	(7,'DZ','Algeria','https://upload.wikimedia.org/wikipedia/commons/7/77/Flag_of_Algeria.svg',28.03388600,1.65962600,1,'2020-05-13 07:10:28','2020-06-17 10:55:08'),
	(8,'AS','American Samoa','https://upload.wikimedia.org/wikipedia/commons/thumb/8/87/Flag_of_American_Samoa.svg/1280px-Flag_of_American_Samoa.svg.png',-14.27097200,-170.13221700,1,'2020-05-13 07:10:28','2020-06-17 10:55:08'),
	(9,'AD','Andorra','https://upload.wikimedia.org/wikipedia/commons/1/19/Flag_of_Andorra.svg',42.54624500,1.60155400,1,'2020-05-13 07:10:28','2020-06-17 10:55:08'),
	(10,'AO','Angola','https://upload.wikimedia.org/wikipedia/commons/9/9d/Flag_of_Angola.svg',-11.20269200,17.87388700,1,'2020-05-13 07:10:28','2020-06-17 10:55:08'),
	(11,'AI','Anguilla','https://upload.wikimedia.org/wikipedia/commons/thumb/b/b4/Flag_of_Anguilla.svg/1280px-Flag_of_Anguilla.svg.png',18.22055400,-63.06861500,1,'2020-05-13 07:10:28','2020-06-17 10:55:08'),
	(12,'AQ','Antarctica','https://upload.wikimedia.org/wikipedia/commons/thumb/f/f2/Antarctica_%28orthographic_projection%29.svg/800px-Antarctica_%28orthographic_projection%29.svg.png',-75.25097300,-0.07138900,1,'2020-05-13 07:10:28','2020-06-17 10:55:08'),
	(13,'AG','Antigua and Barbuda','https://upload.wikimedia.org/wikipedia/commons/8/89/Flag_of_Antigua_and_Barbuda.svg',17.06081600,-61.79642800,1,'2020-05-13 07:10:28','2020-06-17 10:55:08'),
	(14,'AR','Argentina','https://upload.wikimedia.org/wikipedia/commons/1/1a/Flag_of_Argentina.svg',-38.41609700,-63.61667200,1,'2020-05-13 07:10:28','2020-06-17 10:55:08'),
	(15,'AM','Armenia','https://upload.wikimedia.org/wikipedia/commons/2/2f/Flag_of_Armenia.svg',40.06909900,45.03818900,1,'2020-05-13 07:10:28','2020-06-17 10:55:08'),
	(16,'AW','Aruba','https://upload.wikimedia.org/wikipedia/commons/thumb/f/f6/Flag_of_Aruba.svg/1024px-Flag_of_Aruba.svg.png',12.52111000,-69.96833800,1,'2020-05-13 07:10:28','2020-06-17 10:55:08'),
	(17,'AT','Austria','https://upload.wikimedia.org/wikipedia/commons/4/41/Flag_of_Austria.svg',47.51623100,14.55007200,1,'2020-05-13 07:10:28','2020-06-17 10:55:08'),
	(18,'AZ','Azerbaijan','https://upload.wikimedia.org/wikipedia/commons/d/dd/Flag_of_Azerbaijan.svg',40.14310500,47.57692700,1,'2020-05-13 07:10:28','2020-06-17 10:55:08'),
	(19,'BS','Bahamas','https://upload.wikimedia.org/wikipedia/commons/9/93/Flag_of_the_Bahamas.svg',25.03428000,-77.39628000,1,'2020-05-13 07:10:28','2020-06-17 10:55:08'),
	(20,'BH','Bahrain','https://upload.wikimedia.org/wikipedia/commons/2/2c/Flag_of_Bahrain.svg',25.93041400,50.63777200,1,'2020-05-13 07:10:28','2020-06-17 10:55:08'),
	(21,'BD','Bangladesh','https://upload.wikimedia.org/wikipedia/commons/f/f9/Flag_of_Bangladesh.svg',23.68499400,90.35633100,1,'2020-05-13 07:10:28','2020-06-17 10:55:08'),
	(22,'BB','Barbados','https://upload.wikimedia.org/wikipedia/commons/e/ef/Flag_of_Barbados.svg',13.19388700,-59.54319800,1,'2020-05-13 07:10:28','2020-06-17 10:55:08'),
	(23,'BY','Belarus','https://upload.wikimedia.org/wikipedia/commons/8/85/Flag_of_Belarus.svg',53.70980700,27.95338900,1,'2020-05-13 07:10:28','2020-06-17 10:55:08'),
	(24,'BE','Belgium','https://upload.wikimedia.org/wikipedia/commons/9/92/Flag_of_Belgium_%28civil%29.svg',50.50388700,4.46993600,1,'2020-05-13 07:10:28','2020-06-17 10:55:08'),
	(25,'BZ','Belize','https://upload.wikimedia.org/wikipedia/commons/e/e7/Flag_of_Belize.svg',17.18987700,-88.49765000,1,'2020-05-13 07:10:28','2020-06-17 10:55:08'),
	(26,'BJ','Benin','https://upload.wikimedia.org/wikipedia/commons/0/0a/Flag_of_Benin.svg',9.30769000,2.31583400,1,'2020-05-13 07:10:28','2020-06-17 10:55:08'),
	(27,'BM','Bermuda','https://upload.wikimedia.org/wikipedia/commons/thumb/b/bf/Flag_of_Bermuda.svg/1280px-Flag_of_Bermuda.svg.png',32.32138400,-64.75737000,1,'2020-05-13 07:10:28','2020-06-17 10:55:08'),
	(28,'BT','Bhutan','https://upload.wikimedia.org/wikipedia/commons/9/91/Flag_of_Bhutan.svg',27.51416200,90.43360100,1,'2020-05-13 07:10:28','2020-06-17 10:55:08'),
	(29,'BO','Bolivia','https://upload.wikimedia.org/wikipedia/commons/4/48/Flag_of_Bolivia.svg',-16.29015400,-63.58865300,1,'2020-05-13 07:10:28','2020-06-17 10:55:08'),
	(31,'BA','Bosnia and Herzegovina','https://upload.wikimedia.org/wikipedia/commons/b/bf/Flag_of_Bosnia_and_Herzegovina.svg',43.91588600,17.67907600,1,'2020-05-13 07:10:28','2020-06-17 10:55:08'),
	(32,'BW','Botswana','https://upload.wikimedia.org/wikipedia/commons/f/fa/Flag_of_Botswana.svg',-22.32847400,24.68486600,1,'2020-05-13 07:10:28','2020-06-17 10:55:08'),
	(33,'BV','Bouvet Island','https://upload.wikimedia.org/wikipedia/commons/thumb/d/d9/Flag_of_Norway.svg/1024px-Flag_of_Norway.svg.png',-54.42319900,3.41319400,1,'2020-05-13 07:10:28','2020-06-17 10:55:08'),
	(34,'BR','Brazil','https://upload.wikimedia.org/wikipedia/en/0/05/Flag_of_Brazil.svg',-14.23500400,-51.92528000,1,'2020-05-13 07:10:28','2020-06-17 10:55:08'),
	(35,'IO','British Indian Ocean Territory ','https://upload.wikimedia.org/wikipedia/commons/thumb/6/6e/Flag_of_the_British_Indian_Ocean_Territory.svg/1280px-Flag_of_the_British_Indian_Ocean_Territory.svg.png',-6.34319400,71.87651900,1,'2020-05-13 07:10:28','2020-06-17 10:55:08'),
	(36,'BN','Brunei Darussalam','https://upload.wikimedia.org/wikipedia/commons/9/9c/Flag_of_Brunei.svg',4.53527700,114.72766900,1,'2020-05-13 07:10:28','2020-06-17 10:55:08'),
	(37,'BG','Bulgaria','https://upload.wikimedia.org/wikipedia/commons/9/9a/Flag_of_Bulgaria.svg',42.73388300,25.48583000,1,'2020-05-13 07:10:28','2020-06-17 10:55:08'),
	(38,'BF','Burkina Faso','https://upload.wikimedia.org/wikipedia/commons/3/31/Flag_of_Burkina_Faso.svg',12.23833300,-1.56159300,1,'2020-05-13 07:10:28','2020-06-17 10:55:08'),
	(39,'BI','Burundi','https://upload.wikimedia.org/wikipedia/commons/5/50/Flag_of_Burundi.svg',-3.37305600,29.91888600,1,'2020-05-13 07:10:28','2020-06-17 10:55:08'),
	(40,'CV','Cabo Verde','https://upload.wikimedia.org/wikipedia/commons/3/38/Flag_of_Cape_Verde.svg',16.00208200,-24.01319700,1,'2020-05-13 07:10:28','2020-06-17 10:55:08'),
	(41,'KH','Cambodia','https://upload.wikimedia.org/wikipedia/commons/8/83/Flag_of_Cambodia.svg',12.56567900,104.99096300,1,'2020-05-13 07:10:28','2020-06-17 10:55:08'),
	(42,'CM','Cameroon','https://upload.wikimedia.org/wikipedia/commons/4/4f/Flag_of_Cameroon.svg',7.36972200,12.35472200,1,'2020-05-13 07:10:28','2020-06-17 10:55:08'),
	(43,'CA','Canada','https://upload.wikimedia.org/wikipedia/en/c/cf/Flag_of_Canada.svg',56.13036600,-106.34677100,1,'2020-05-13 07:10:28','2020-06-17 10:55:08'),
	(44,'KY','Cayman Islands','https://upload.wikimedia.org/wikipedia/commons/thumb/0/0f/Flag_of_the_Cayman_Islands.svg/1280px-Flag_of_the_Cayman_Islands.svg.png',19.51346900,-80.56695600,1,'2020-05-13 07:10:28','2020-06-17 10:55:08'),
	(45,'CF','Central African Republic ','https://upload.wikimedia.org/wikipedia/commons/6/6f/Flag_of_the_Central_African_Republic.svg',6.61111100,20.93944400,1,'2020-05-13 07:10:28','2020-06-17 10:55:08'),
	(46,'TD','Chad','https://upload.wikimedia.org/wikipedia/commons/4/4b/Flag_of_Chad.svg',15.45416600,18.73220700,1,'2020-05-13 07:10:28','2020-06-17 10:55:08'),
	(47,'CL','Chile','https://upload.wikimedia.org/wikipedia/commons/7/78/Flag_of_Chile.svg',-35.67514700,-71.54296900,1,'2020-05-13 07:10:28','2020-06-17 10:55:08'),
	(48,'CN','China','https://upload.wikimedia.org/wikipedia/commons/f/fa/Flag_of_the_People%27s_Republic_of_China.svg',35.86166000,104.19539700,1,'2020-05-13 07:10:28','2020-06-17 10:55:08'),
	(49,'CX','Christmas Island','https://upload.wikimedia.org/wikipedia/commons/thumb/6/67/Flag_of_Christmas_Island.svg/1280px-Flag_of_Christmas_Island.svg.png',-10.44752500,105.69044900,1,'2020-05-13 07:10:28','2020-06-17 10:55:08'),
	(50,'CC','Cocos (Keeling) Islands ','https://upload.wikimedia.org/wikipedia/commons/thumb/7/74/Flag_of_the_Cocos_%28Keeling%29_Islands.svg/1280px-Flag_of_the_Cocos_%28Keeling%29_Islands.svg.png',-12.16416500,96.87095600,1,'2020-05-13 07:10:28','2020-06-17 10:55:08'),
	(51,'CO','Colombia','https://upload.wikimedia.org/wikipedia/commons/2/21/Flag_of_Colombia.svg',4.57086800,-74.29733300,1,'2020-05-13 07:10:28','2020-06-17 10:55:08'),
	(52,'KM','Comoros ','https://upload.wikimedia.org/wikipedia/commons/9/94/Flag_of_the_Comoros.svg',-11.87500100,43.87221900,1,'2020-05-13 07:10:28','2020-06-17 10:55:08'),
	(53,'CD','Congo ','https://upload.wikimedia.org/wikipedia/commons/6/6f/Flag_of_the_Democratic_Republic_of_the_Congo.svg',-4.03833300,21.75866400,1,'2020-05-13 07:10:28','2020-06-17 10:55:08'),
	(54,'CG','Congo ','https://upload.wikimedia.org/wikipedia/commons/9/92/Flag_of_the_Republic_of_the_Congo.svg',-0.22802100,15.82765900,1,'2020-05-13 07:10:28','2020-06-17 10:55:08'),
	(55,'CK','Cook Islands ','https://upload.wikimedia.org/wikipedia/commons/3/35/Flag_of_the_Cook_Islands.svg',-21.23673600,-159.77767100,1,'2020-05-13 07:10:28','2020-06-17 10:55:08'),
	(56,'CR','Costa Rica','https://upload.wikimedia.org/wikipedia/commons/f/f2/Flag_of_Costa_Rica.svg',9.74891700,-83.75342800,1,'2020-05-13 07:10:28','2020-06-17 10:55:08'),
	(57,'HR','Croatia','https://upload.wikimedia.org/wikipedia/commons/1/1b/Flag_of_Croatia.svg',45.10000000,15.20000000,1,'2020-05-13 07:10:28','2020-06-17 10:55:08'),
	(58,'CU','Cuba','https://upload.wikimedia.org/wikipedia/commons/b/bd/Flag_of_Cuba.svg',21.52175700,-77.78116700,1,'2020-05-13 07:10:28','2020-06-17 10:55:08'),
	(60,'CY','Cyprus','https://upload.wikimedia.org/wikipedia/commons/d/d4/Flag_of_Cyprus.svg',35.12641300,33.42985900,1,'2020-05-13 07:10:28','2020-06-17 10:55:08'),
	(61,'CZ','Czechia','https://upload.wikimedia.org/wikipedia/commons/c/cb/Flag_of_the_Czech_Republic.svg',49.81749200,15.47296200,1,'2020-05-13 07:10:28','2020-06-17 10:55:08'),
	(62,'CI','Côte d\'Ivoire','https://upload.wikimedia.org/wikipedia/commons/thumb/f/fe/Flag_of_C%C3%B4te_d%27Ivoire.svg/1024px-Flag_of_C%C3%B4te_d%27Ivoire.svg.png',7.53998900,-5.54708000,1,'2020-05-13 07:10:28','2020-06-17 10:55:08'),
	(63,'DK','Denmark','https://upload.wikimedia.org/wikipedia/commons/9/9c/Flag_of_Denmark.svg',56.26392000,9.50178500,1,'2020-05-13 07:10:28','2020-06-17 10:55:08'),
	(64,'DJ','Djibouti','https://upload.wikimedia.org/wikipedia/commons/3/34/Flag_of_Djibouti.svg',11.82513800,42.59027500,1,'2020-05-13 07:10:28','2020-06-17 10:55:08'),
	(65,'DM','Dominica','https://upload.wikimedia.org/wikipedia/commons/c/c4/Flag_of_Dominica.svg',15.41499900,-61.37097600,1,'2020-05-13 07:10:28','2020-06-17 10:55:08'),
	(66,'DO','Dominican Republic (the)','https://upload.wikimedia.org/wikipedia/commons/9/9f/Flag_of_the_Dominican_Republic.svg',18.73569300,-70.16265100,1,'2020-05-13 07:10:28','2020-06-17 10:55:08'),
	(67,'EC','Ecuador','https://upload.wikimedia.org/wikipedia/commons/e/e8/Flag_of_Ecuador.svg',-1.83123900,-78.18340600,1,'2020-05-13 07:10:28','2020-06-17 10:55:08'),
	(68,'EG','Egypt','https://upload.wikimedia.org/wikipedia/commons/f/fe/Flag_of_Egypt.svg',26.82055300,30.80249800,1,'2020-05-13 07:10:28','2020-06-17 10:55:08'),
	(69,'SV','El Salvador','https://upload.wikimedia.org/wikipedia/commons/3/34/Flag_of_El_Salvador.svg',13.79418500,-88.89653000,1,'2020-05-13 07:10:28','2020-06-17 10:55:08'),
	(70,'GQ','Equatorial Guinea','https://upload.wikimedia.org/wikipedia/commons/3/31/Flag_of_Equatorial_Guinea.svg',1.65080100,10.26789500,1,'2020-05-13 07:10:28','2020-06-17 10:55:08'),
	(71,'ER','Eritrea','https://upload.wikimedia.org/wikipedia/commons/2/29/Flag_of_Eritrea.svg',15.17938400,39.78233400,1,'2020-05-13 07:10:28','2020-06-17 10:55:08'),
	(72,'EE','Estonia','https://upload.wikimedia.org/wikipedia/commons/8/8f/Flag_of_Estonia.svg',58.59527200,25.01360700,1,'2020-05-13 07:10:28','2020-06-17 10:55:08'),
	(73,'SZ','Eswatini','https://upload.wikimedia.org/wikipedia/commons/thumb/f/fb/Flag_of_Eswatini.svg/1024px-Flag_of_Eswatini.svg.png',-26.52250300,31.46586600,1,'2020-05-13 07:10:28','2020-06-17 10:55:08'),
	(74,'ET','Ethiopia','https://upload.wikimedia.org/wikipedia/commons/7/71/Flag_of_Ethiopia.svg',9.14500000,40.48967300,1,'2020-05-13 07:10:28','2020-06-17 10:55:08'),
	(75,'FK','Falkland Islands ','https://upload.wikimedia.org/wikipedia/commons/thumb/8/83/Flag_of_the_Falkland_Islands.svg/1280px-Flag_of_the_Falkland_Islands.svg.png',-51.79625300,-59.52361300,1,'2020-05-13 07:10:28','2020-06-17 10:55:08'),
	(76,'FO','Faroe Islands','https://upload.wikimedia.org/wikipedia/commons/thumb/3/3c/Flag_of_the_Faroe_Islands.svg/1024px-Flag_of_the_Faroe_Islands.svg.png',61.89263500,-6.91180600,1,'2020-05-13 07:10:28','2020-06-17 10:55:08'),
	(77,'FJ','Fiji','https://upload.wikimedia.org/wikipedia/commons/b/ba/Flag_of_Fiji.svg',-16.57819300,179.41441300,1,'2020-05-13 07:10:28','2020-06-17 10:55:08'),
	(78,'FI','Finland','https://upload.wikimedia.org/wikipedia/commons/b/bc/Flag_of_Finland.svg',61.92411000,25.74815100,1,'2020-05-13 07:10:28','2020-06-17 10:55:08'),
	(79,'FR','France','https://upload.wikimedia.org/wikipedia/en/c/c3/Flag_of_France.svg',46.22763800,2.21374900,1,'2020-05-13 07:10:28','2020-06-17 10:55:08'),
	(80,'GF','French Guiana','https://upload.wikimedia.org/wikipedia/en/thumb/c/c3/Flag_of_France.svg/1024px-Flag_of_France.svg.png',3.93388900,-53.12578200,1,'2020-05-13 07:10:28','2020-06-17 10:55:08'),
	(81,'PF','French Polynesia','https://upload.wikimedia.org/wikipedia/commons/thumb/d/db/Flag_of_French_Polynesia.svg/1024px-Flag_of_French_Polynesia.svg.png',-17.67974200,-149.40684300,1,'2020-05-13 07:10:28','2020-06-17 10:55:08'),
	(82,'TF','French Southern Territories ','https://upload.wikimedia.org/wikipedia/commons/thumb/a/a7/Flag_of_the_French_Southern_and_Antarctic_Lands.svg/1024px-Flag_of_the_French_Southern_and_Antarctic_Lands.svg.png',-49.28036600,69.34855700,1,'2020-05-13 07:10:28','2020-06-17 10:55:08'),
	(83,'GA','Gabon','https://upload.wikimedia.org/wikipedia/commons/0/04/Flag_of_Gabon.svg',-0.80368900,11.60944400,1,'2020-05-13 07:10:28','2020-06-17 10:55:08'),
	(84,'GM','Gambia ','https://upload.wikimedia.org/wikipedia/commons/7/77/Flag_of_The_Gambia.svg',13.44318200,-15.31013900,1,'2020-05-13 07:10:28','2020-06-17 10:55:08'),
	(85,'GE','Georgia','https://upload.wikimedia.org/wikipedia/commons/0/0f/Flag_of_Georgia.svg',42.31540700,43.35689200,1,'2020-05-13 07:10:28','2020-06-17 10:55:08'),
	(86,'DE','Germany','https://upload.wikimedia.org/wikipedia/en/b/ba/Flag_of_Germany.svg',51.16569100,10.45152600,1,'2020-05-13 07:10:28','2020-06-17 10:55:08'),
	(87,'GH','Ghana','https://upload.wikimedia.org/wikipedia/commons/1/19/Flag_of_Ghana.svg',7.94652700,-1.02319400,1,'2020-05-13 07:10:28','2020-06-17 10:55:08'),
	(88,'GI','Gibraltar','https://upload.wikimedia.org/wikipedia/commons/thumb/0/02/Flag_of_Gibraltar.svg/1280px-Flag_of_Gibraltar.svg.png',36.13774100,-5.34537400,1,'2020-05-13 07:10:28','2020-06-17 10:55:08'),
	(89,'GR','Greece','https://upload.wikimedia.org/wikipedia/commons/5/5c/Flag_of_Greece.svg',39.07420800,21.82431200,1,'2020-05-13 07:10:28','2020-06-17 10:55:08'),
	(90,'GL','Greenland','https://upload.wikimedia.org/wikipedia/commons/thumb/0/09/Flag_of_Greenland.svg/1024px-Flag_of_Greenland.svg.png',71.70693600,-42.60430300,1,'2020-05-13 07:10:28','2020-06-17 10:55:08'),
	(91,'GD','Grenada','https://upload.wikimedia.org/wikipedia/commons/b/bc/Flag_of_Grenada.svg',12.26277600,-61.60417100,1,'2020-05-13 07:10:28','2020-06-17 10:55:08'),
	(92,'GP','Guadeloupe','https://upload.wikimedia.org/wikipedia/en/thumb/c/c3/Flag_of_France.svg/1024px-Flag_of_France.svg.png',16.99597100,-62.06764100,1,'2020-05-13 07:10:28','2020-06-17 10:55:08'),
	(93,'GU','Guam','https://upload.wikimedia.org/wikipedia/commons/thumb/0/07/Flag_of_Guam.svg/1280px-Flag_of_Guam.svg.png',13.44430400,144.79373100,1,'2020-05-13 07:10:28','2020-06-17 10:55:08'),
	(94,'GT','Guatemala','https://upload.wikimedia.org/wikipedia/commons/e/ec/Flag_of_Guatemala.svg',15.78347100,-90.23075900,1,'2020-05-13 07:10:28','2020-06-17 10:55:08'),
	(95,'GG','Guernsey','https://upload.wikimedia.org/wikipedia/commons/thumb/f/fa/Flag_of_Guernsey.svg/1024px-Flag_of_Guernsey.svg.png',49.46569100,-2.58527800,1,'2020-05-13 07:10:28','2020-06-17 10:55:08'),
	(96,'GN','Guinea','https://upload.wikimedia.org/wikipedia/commons/e/ed/Flag_of_Guinea.svg',9.94558700,-9.69664500,1,'2020-05-13 07:10:28','2020-06-17 10:55:08'),
	(97,'GW','Guinea-Bissau','https://upload.wikimedia.org/wikipedia/commons/0/01/Flag_of_Guinea-Bissau.svg',11.80374900,-15.18041300,1,'2020-05-13 07:10:28','2020-06-17 10:55:08'),
	(98,'GY','Guyana','https://upload.wikimedia.org/wikipedia/commons/9/99/Flag_of_Guyana.svg',4.86041600,-58.93018000,1,'2020-05-13 07:10:28','2020-06-17 10:55:08'),
	(99,'HT','Haiti','https://upload.wikimedia.org/wikipedia/commons/5/56/Flag_of_Haiti.svg',18.97118700,-72.28521500,1,'2020-05-13 07:10:28','2020-06-17 10:55:08'),
	(100,'HM','Heard Island and McDonald Islands','https://upload.wikimedia.org/wikipedia/commons/thumb/8/8e/ISS018-E-038182_lrg.jpg/1024px-ISS018-E-038182_lrg.jpg',-53.08181000,73.50415800,1,'2020-05-13 07:10:28','2020-06-17 10:55:08'),
	(101,'VA','Holy See','https://upload.wikimedia.org/wikipedia/commons/thumb/0/00/Flag_of_the_Vatican_City.svg/800px-Flag_of_the_Vatican_City.svg.png',41.90291600,12.45338900,1,'2020-05-13 07:10:28','2020-06-17 10:55:08'),
	(102,'HN','Honduras','https://upload.wikimedia.org/wikipedia/commons/8/82/Flag_of_Honduras.svg',15.19999900,-86.24190500,1,'2020-05-13 07:10:28','2020-06-17 10:55:08'),
	(103,'HK','Hong Kong','https://upload.wikimedia.org/wikipedia/commons/thumb/5/5b/Flag_of_Hong_Kong.svg/1024px-Flag_of_Hong_Kong.svg.png',22.39642800,114.10949700,1,'2020-05-13 07:10:28','2020-06-17 10:55:08'),
	(104,'HU','Hungary','https://upload.wikimedia.org/wikipedia/commons/c/c1/Flag_of_Hungary.svg',47.16249400,19.50330400,1,'2020-05-13 07:10:28','2020-06-17 10:55:08'),
	(105,'IS','Iceland','https://upload.wikimedia.org/wikipedia/commons/c/ce/Flag_of_Iceland.svg',64.96305100,-19.02083500,1,'2020-05-13 07:10:28','2020-06-17 10:55:08'),
	(106,'IN','India','https://upload.wikimedia.org/wikipedia/en/4/41/Flag_of_India.svg',20.59368400,78.96288000,1,'2020-05-13 07:10:28','2020-06-17 10:55:08'),
	(107,'ID','Indonesia','https://upload.wikimedia.org/wikipedia/commons/9/9f/Flag_of_Indonesia.svg',-0.78927500,113.92132700,1,'2020-05-13 07:10:28','2020-06-17 10:55:08'),
	(108,'IR','Iran ','https://upload.wikimedia.org/wikipedia/commons/c/ca/Flag_of_Iran.svg',32.42790800,53.68804600,1,'2020-05-13 07:10:28','2020-06-17 10:55:08'),
	(109,'IQ','Iraq','https://upload.wikimedia.org/wikipedia/commons/f/f6/Flag_of_Iraq.svg',33.22319100,43.67929100,1,'2020-05-13 07:10:28','2020-06-17 10:55:08'),
	(110,'IE','Ireland','https://upload.wikimedia.org/wikipedia/commons/4/45/Flag_of_Ireland.svg',53.41291000,-8.24389000,1,'2020-05-13 07:10:28','2020-06-17 10:55:08'),
	(111,'IM','Isle of Man','https://upload.wikimedia.org/wikipedia/commons/thumb/5/5d/Flag_of_the_Isle_of_Mann.svg/1280px-Flag_of_the_Isle_of_Mann.svg.png',54.23610700,-4.54805600,1,'2020-05-13 07:10:28','2020-06-17 10:55:08'),
	(112,'IL','Israel','https://upload.wikimedia.org/wikipedia/commons/d/d4/Flag_of_Israel.svg',31.04605100,34.85161200,1,'2020-05-13 07:10:28','2020-06-17 10:55:08'),
	(113,'IT','Italy','https://upload.wikimedia.org/wikipedia/en/0/03/Flag_of_Italy.svg',41.87194000,12.56738000,1,'2020-05-13 07:10:28','2020-06-17 10:55:08'),
	(114,'JM','Jamaica','https://upload.wikimedia.org/wikipedia/commons/0/0a/Flag_of_Jamaica.svg',18.10958100,-77.29750800,1,'2020-05-13 07:10:28','2020-06-17 10:55:08'),
	(115,'JP','Japan','https://upload.wikimedia.org/wikipedia/en/9/9e/Flag_of_Japan.svg',36.20482400,138.25292400,1,'2020-05-13 07:10:28','2020-06-17 10:55:08'),
	(116,'JE','Jersey','https://upload.wikimedia.org/wikipedia/commons/thumb/1/1c/Flag_of_Jersey.svg/1024px-Flag_of_Jersey.svg.png',49.21443900,-2.13125000,1,'2020-05-13 07:10:28','2020-06-17 10:55:08'),
	(117,'JO','Jordan','https://upload.wikimedia.org/wikipedia/commons/c/c0/Flag_of_Jordan.svg',30.58516400,36.23841400,1,'2020-05-13 07:10:28','2020-06-17 10:55:08'),
	(118,'KZ','Kazakhstan','https://upload.wikimedia.org/wikipedia/commons/d/d3/Flag_of_Kazakhstan.svg',48.01957300,66.92368400,1,'2020-05-13 07:10:28','2020-06-17 10:55:08'),
	(119,'KE','Kenya','https://upload.wikimedia.org/wikipedia/commons/4/49/Flag_of_Kenya.svg',-0.02355900,37.90619300,1,'2020-05-13 07:10:28','2020-06-17 10:55:08'),
	(120,'KI','Kiribati','https://upload.wikimedia.org/wikipedia/commons/d/d3/Flag_of_Kiribati.svg',-3.37041700,-168.73403900,1,'2020-05-13 07:10:28','2020-06-17 10:55:08'),
	(121,'KP','North Korea','https://upload.wikimedia.org/wikipedia/commons/5/51/Flag_of_North_Korea.svg',40.33985200,127.51009300,1,'2020-05-13 07:10:28','2020-06-17 10:55:08'),
	(122,'KR','South Korea','https://upload.wikimedia.org/wikipedia/commons/0/09/Flag_of_South_Korea.svg',35.90775700,127.76692200,1,'2020-05-13 07:10:28','2020-06-17 10:55:08'),
	(123,'KW','Kuwait','https://upload.wikimedia.org/wikipedia/commons/a/aa/Flag_of_Kuwait.svg',29.31166000,47.48176600,1,'2020-05-13 07:10:28','2020-06-17 10:55:08'),
	(124,'KG','Kyrgyzstan','https://upload.wikimedia.org/wikipedia/commons/c/c7/Flag_of_Kyrgyzstan.svg',41.20438000,74.76609800,1,'2020-05-13 07:10:28','2020-06-17 10:55:08'),
	(125,'LA','Lao People\'s Democratic Republic ','https://upload.wikimedia.org/wikipedia/commons/5/56/Flag_of_Laos.svg',19.85627000,102.49549600,1,'2020-05-13 07:10:28','2020-06-17 10:55:08'),
	(126,'LV','Latvia','https://upload.wikimedia.org/wikipedia/commons/8/84/Flag_of_Latvia.svg',56.87963500,24.60318900,1,'2020-05-13 07:10:28','2020-06-17 10:55:08'),
	(127,'LB','Lebanon','https://upload.wikimedia.org/wikipedia/commons/5/59/Flag_of_Lebanon.svg',33.85472100,35.86228500,1,'2020-05-13 07:10:28','2020-06-17 10:55:08'),
	(128,'LS','Lesotho','https://upload.wikimedia.org/wikipedia/commons/4/4a/Flag_of_Lesotho.svg',-29.60998800,28.23360800,1,'2020-05-13 07:10:28','2020-06-17 10:55:08'),
	(129,'LR','Liberia','https://upload.wikimedia.org/wikipedia/commons/b/b8/Flag_of_Liberia.svg',6.42805500,-9.42949900,1,'2020-05-13 07:10:28','2020-06-17 10:55:08'),
	(130,'LY','Libya','https://upload.wikimedia.org/wikipedia/commons/0/05/Flag_of_Libya.svg',26.33510000,17.22833100,1,'2020-05-13 07:10:28','2020-06-17 10:55:08'),
	(131,'LI','Liechtenstein','https://upload.wikimedia.org/wikipedia/commons/4/47/Flag_of_Liechtenstein.svg',47.16600000,9.55537300,1,'2020-05-13 07:10:28','2020-06-17 10:55:08'),
	(132,'LT','Lithuania','https://upload.wikimedia.org/wikipedia/commons/1/11/Flag_of_Lithuania.svg',55.16943800,23.88127500,1,'2020-05-13 07:10:28','2020-06-17 10:55:08'),
	(133,'LU','Luxembourg','https://upload.wikimedia.org/wikipedia/commons/d/da/Flag_of_Luxembourg.svg',49.81527300,6.12958300,1,'2020-05-13 07:10:28','2020-06-17 10:55:08'),
	(134,'MO','Macao','https://upload.wikimedia.org/wikipedia/commons/thumb/6/63/Flag_of_Macau.svg/1024px-Flag_of_Macau.svg.png',22.19874500,113.54387300,1,'2020-05-13 07:10:28','2020-06-17 10:55:08'),
	(135,'MG','Madagascar','https://upload.wikimedia.org/wikipedia/commons/b/bc/Flag_of_Madagascar.svg',-18.76694700,46.86910700,1,'2020-05-13 07:10:28','2020-06-17 10:55:08'),
	(136,'MW','Malawi','https://upload.wikimedia.org/wikipedia/commons/d/d1/Flag_of_Malawi.svg',-13.25430800,34.30152500,1,'2020-05-13 07:10:28','2020-06-17 10:55:08'),
	(137,'MY','Malaysia','https://upload.wikimedia.org/wikipedia/commons/6/66/Flag_of_Malaysia.svg',4.21048400,101.97576600,1,'2020-05-13 07:10:28','2020-06-17 10:55:08'),
	(138,'MV','Maldives','https://upload.wikimedia.org/wikipedia/commons/0/0f/Flag_of_Maldives.svg',3.20277800,73.22068000,1,'2020-05-13 07:10:28','2020-06-17 10:55:08'),
	(139,'ML','Mali','https://upload.wikimedia.org/wikipedia/commons/9/92/Flag_of_Mali.svg',17.57069200,-3.99616600,1,'2020-05-13 07:10:28','2020-06-17 10:55:08'),
	(140,'MT','Malta','https://upload.wikimedia.org/wikipedia/commons/7/73/Flag_of_Malta.svg',35.93749600,14.37541600,1,'2020-05-13 07:10:28','2020-06-17 10:55:08'),
	(141,'MH','Marshall Islands (the)','https://upload.wikimedia.org/wikipedia/commons/2/2e/Flag_of_the_Marshall_Islands.svg',7.13147400,171.18447800,1,'2020-05-13 07:10:28','2020-06-17 10:55:08'),
	(142,'MR','Mauritania','https://upload.wikimedia.org/wikipedia/commons/4/43/Flag_of_Mauritania.svg',21.00789000,-10.94083500,1,'2020-05-13 07:10:28','2020-06-17 10:55:08'),
	(143,'MU','Mauritius','https://upload.wikimedia.org/wikipedia/commons/7/77/Flag_of_Mauritius.svg',-20.34840400,57.55215200,1,'2020-05-13 07:10:28','2020-06-17 10:55:08'),
	(144,'MX','Mexico','https://upload.wikimedia.org/wikipedia/commons/f/fc/Flag_of_Mexico.svg',23.63450100,-102.55278400,1,'2020-05-13 07:10:28','2020-06-17 10:55:08'),
	(145,'FM','Micronesia (Federated States of)','https://upload.wikimedia.org/wikipedia/commons/e/e4/Flag_of_the_Federated_States_of_Micronesia.svg',7.42555400,150.55081200,1,'2020-05-13 07:10:28','2020-06-17 10:55:08'),
	(146,'MD','Moldova (the Republic of)','https://upload.wikimedia.org/wikipedia/commons/2/27/Flag_of_Moldova.svg',47.41163100,28.36988500,1,'2020-05-13 07:10:28','2020-06-17 10:55:08'),
	(147,'MC','Monaco','https://upload.wikimedia.org/wikipedia/commons/e/ea/Flag_of_Monaco.svg',43.75029800,7.41284100,1,'2020-05-13 07:10:28','2020-06-17 10:55:08'),
	(148,'MN','Mongolia','https://upload.wikimedia.org/wikipedia/commons/4/4c/Flag_of_Mongolia.svg',46.86249600,103.84665600,1,'2020-05-13 07:10:28','2020-06-17 10:55:08'),
	(149,'ME','Montenegro','https://upload.wikimedia.org/wikipedia/commons/6/64/Flag_of_Montenegro.svg',42.70867800,19.37439000,1,'2020-05-13 07:10:28','2020-06-17 10:55:08'),
	(150,'MA','Morocco','https://upload.wikimedia.org/wikipedia/commons/2/2c/Flag_of_Morocco.svg',31.79170200,-7.09262000,1,'2020-05-13 07:10:28','2020-06-17 10:55:08'),
	(151,'MZ','Mozambique','https://upload.wikimedia.org/wikipedia/commons/d/d0/Flag_of_Mozambique.svg',-18.66569500,35.52956200,1,'2020-05-13 07:10:28','2020-06-17 10:55:08'),
	(152,'MM','Myanmar','https://upload.wikimedia.org/wikipedia/commons/8/8c/Flag_of_Myanmar.svg',21.91396500,95.95622300,1,'2020-05-13 07:10:28','2020-06-17 10:55:08'),
	(153,'NA','Namibia','https://upload.wikimedia.org/wikipedia/commons/0/00/Flag_of_Namibia.svg',-22.95764000,18.49041000,1,'2020-05-13 07:10:28','2020-06-17 10:55:08'),
	(154,'NR','Nauru','https://upload.wikimedia.org/wikipedia/commons/3/30/Flag_of_Nauru.svg',-0.52277800,166.93150300,1,'2020-05-13 07:10:28','2020-06-17 10:55:08'),
	(155,'NP','Nepal','https://upload.wikimedia.org/wikipedia/commons/9/9b/Flag_of_Nepal.svg',28.39485700,84.12400800,1,'2020-05-13 07:10:28','2020-06-17 10:55:08'),
	(156,'NL','Netherlands','https://upload.wikimedia.org/wikipedia/commons/2/20/Flag_of_the_Netherlands.svg',52.13263300,5.29126600,1,'2020-05-13 07:10:28','2020-06-17 10:55:08'),
	(157,'NZ','New Zealand','https://upload.wikimedia.org/wikipedia/commons/3/3e/Flag_of_New_Zealand.svg',-40.90055700,174.88597100,1,'2020-05-13 07:10:28','2020-06-17 10:55:08'),
	(158,'NI','Nicaragua','https://upload.wikimedia.org/wikipedia/commons/1/19/Flag_of_Nicaragua.svg',12.86541600,-85.20722900,1,'2020-05-13 07:10:28','2020-06-17 10:55:08'),
	(159,'NE','Niger ','https://upload.wikimedia.org/wikipedia/commons/f/f4/Flag_of_Niger.svg',17.60778900,8.08166600,1,'2020-05-13 07:10:28','2020-06-17 10:55:08'),
	(160,'NG','Nigeria','https://upload.wikimedia.org/wikipedia/commons/7/79/Flag_of_Nigeria.svg',9.08199900,8.67527700,1,'2020-05-13 07:10:28','2020-06-17 10:55:08'),
	(161,'NU','Niue','https://upload.wikimedia.org/wikipedia/commons/0/01/Flag_of_Niue.svg',-19.05444500,-169.86723300,1,'2020-05-13 07:10:28','2020-06-17 10:55:08'),
	(162,'NO','Norway','https://upload.wikimedia.org/wikipedia/commons/d/d9/Flag_of_Norway.svg',60.47202400,8.46894600,1,'2020-05-13 07:10:28','2020-06-17 10:55:08'),
	(163,'OM','Oman','https://upload.wikimedia.org/wikipedia/commons/thumb/d/dd/Flag_of_Oman.svg/1280px-Flag_of_Oman.svg.png',21.51258300,55.92325500,1,'2020-05-13 07:10:28','2020-06-17 10:55:08'),
	(164,'PK','Pakistan','https://upload.wikimedia.org/wikipedia/commons/3/32/Flag_of_Pakistan.svg',30.37532100,69.34511600,1,'2020-05-13 07:10:28','2020-06-17 10:55:08'),
	(165,'PW','Palau','https://upload.wikimedia.org/wikipedia/commons/4/48/Flag_of_Palau.svg',7.51498000,134.58252000,1,'2020-05-13 07:10:28','2020-06-17 10:55:08'),
	(166,'PS','Palestine','https://upload.wikimedia.org/wikipedia/commons/0/00/Flag_of_Palestine.svg',31.95216200,35.23315400,1,'2020-05-13 07:10:28','2020-06-17 10:55:08'),
	(167,'PA','Panama','https://upload.wikimedia.org/wikipedia/commons/a/ab/Flag_of_Panama.svg',8.53798100,-80.78212700,1,'2020-05-13 07:10:28','2020-06-17 10:55:08'),
	(168,'PG','Papua New Guinea','https://upload.wikimedia.org/wikipedia/commons/e/e3/Flag_of_Papua_New_Guinea.svg',-6.31499300,143.95555000,1,'2020-05-13 07:10:28','2020-06-17 10:55:08'),
	(169,'PY','Paraguay','https://upload.wikimedia.org/wikipedia/commons/2/27/Flag_of_Paraguay.svg',-23.44250300,-58.44383200,1,'2020-05-13 07:10:28','2020-06-17 10:55:08'),
	(170,'PE','Peru','https://upload.wikimedia.org/wikipedia/commons/c/cf/Flag_of_Peru.svg',-9.18996700,-75.01515200,1,'2020-05-13 07:10:28','2020-06-17 10:55:08'),
	(171,'PH','Philippines','https://upload.wikimedia.org/wikipedia/commons/9/99/Flag_of_the_Philippines.svg',12.87972100,121.77401700,1,'2020-05-13 07:10:28','2020-06-17 10:55:08'),
	(172,'PN','Pitcairn','https://upload.wikimedia.org/wikipedia/en/1/12/Flag_of_Poland.svg',-24.70361500,-127.43930800,1,'2020-05-13 07:10:28','2020-06-17 10:55:08'),
	(173,'PL','Poland','https://upload.wikimedia.org/wikipedia/commons/5/5c/Flag_of_Portugal.svg',51.91943800,19.14513600,1,'2020-05-13 07:10:28','2020-06-17 10:55:08'),
	(174,'PT','Portugal','https://upload.wikimedia.org/wikipedia/commons/thumb/5/5c/Flag_of_Portugal.svg/600px-Flag_of_Portugal.svg.png',39.39987200,-8.22445400,1,'2020-05-13 07:10:28','2020-06-17 10:55:08'),
	(175,'PR','Puerto Rico','https://upload.wikimedia.org/wikipedia/commons/thumb/2/28/Flag_of_Puerto_Rico.svg/1024px-Flag_of_Puerto_Rico.svg.png',18.22083300,-66.59014900,1,'2020-05-13 07:10:28','2020-06-17 10:55:08'),
	(176,'QA','Qatar','https://upload.wikimedia.org/wikipedia/commons/6/65/Flag_of_Qatar.svg',25.35482600,51.18388400,1,'2020-05-13 07:10:28','2020-06-17 10:55:08'),
	(177,'RO','Romania','https://upload.wikimedia.org/wikipedia/commons/7/73/Flag_of_Romania.svg',45.94316100,24.96676000,1,'2020-05-13 07:10:28','2020-06-17 10:55:08'),
	(178,'RU','Russian Federation (the)','https://upload.wikimedia.org/wikipedia/en/f/f3/Flag_of_Russia.svg',61.52401000,105.31875600,1,'2020-05-13 07:10:28','2020-06-17 10:55:08'),
	(179,'RW','Rwanda','https://upload.wikimedia.org/wikipedia/commons/1/17/Flag_of_Rwanda.svg',-1.94027800,29.87388800,1,'2020-05-13 07:10:28','2020-06-17 10:55:08'),
	(180,'KN','Saint Kitts and Nevis','https://upload.wikimedia.org/wikipedia/commons/f/fe/Flag_of_Saint_Kitts_and_Nevis.svg',17.35782200,-62.78299800,1,'2020-05-13 07:10:28','2020-06-17 10:55:08'),
	(181,'LC','Saint Lucia','https://upload.wikimedia.org/wikipedia/commons/9/9f/Flag_of_Saint_Lucia.svg',13.90944400,-60.97889300,1,'2020-05-13 07:10:28','2020-06-17 10:55:08'),
	(182,'VC','Saint Vincent and the Grenadines','https://upload.wikimedia.org/wikipedia/commons/6/6d/Flag_of_Saint_Vincent_and_the_Grenadines.svg',12.98430500,-61.28722800,1,'2020-05-13 07:10:28','2020-06-17 10:55:08'),
	(183,'WS','Samoa','https://upload.wikimedia.org/wikipedia/commons/3/31/Flag_of_Samoa.svg',-13.75902900,-172.10462900,1,'2020-05-13 07:10:28','2020-06-17 10:55:08'),
	(184,'SM','San Marino','https://upload.wikimedia.org/wikipedia/commons/b/b1/Flag_of_San_Marino.svg',43.94236000,12.45777700,1,'2020-05-13 07:10:28','2020-06-17 10:55:08'),
	(185,'ST','Sao Tome and Principe','https://upload.wikimedia.org/wikipedia/commons/4/4f/Flag_of_Sao_Tome_and_Principe.svg',0.18636000,6.61308100,1,'2020-05-13 07:10:28','2020-06-17 10:55:08'),
	(186,'SA','Saudi Arabia','https://upload.wikimedia.org/wikipedia/commons/0/0d/Flag_of_Saudi_Arabia.svg',23.88594200,45.07916200,1,'2020-05-13 07:10:28','2020-06-17 10:55:08'),
	(187,'SN','Senegal','https://upload.wikimedia.org/wikipedia/commons/f/fd/Flag_of_Senegal.svg',14.49740100,-14.45236200,1,'2020-05-13 07:10:28','2020-06-17 10:55:08'),
	(188,'RS','Serbia','https://upload.wikimedia.org/wikipedia/commons/f/ff/Flag_of_Serbia.svg',44.01652100,21.00585900,1,'2020-05-13 07:10:28','2020-06-17 10:55:08'),
	(189,'SC','Seychelles','https://upload.wikimedia.org/wikipedia/commons/f/fc/Flag_of_Seychelles.svg',-4.67957400,55.49197700,1,'2020-05-13 07:10:28','2020-06-17 10:55:08'),
	(190,'SL','Sierra Leone','https://upload.wikimedia.org/wikipedia/commons/1/17/Flag_of_Sierra_Leone.svg',8.46055500,-11.77988900,1,'2020-05-13 07:10:28','2020-06-17 10:55:08'),
	(191,'SG','Singapore','https://upload.wikimedia.org/wikipedia/commons/4/48/Flag_of_Singapore.svg',1.35208300,103.81983600,1,'2020-05-13 07:10:28','2020-06-17 10:55:08'),
	(192,'SK','Slovakia','https://upload.wikimedia.org/wikipedia/commons/e/e6/Flag_of_Slovakia.svg',48.66902600,19.69902400,1,'2020-05-13 07:10:28','2020-06-17 10:55:08'),
	(193,'SI','Slovenia','https://upload.wikimedia.org/wikipedia/commons/f/f0/Flag_of_Slovenia.svg',46.15124100,14.99546300,1,'2020-05-13 07:10:28','2020-06-17 10:55:08'),
	(194,'SB','Solomon Islands','https://upload.wikimedia.org/wikipedia/commons/7/74/Flag_of_the_Solomon_Islands.svg',-9.64571000,160.15619400,1,'2020-05-13 07:10:28','2020-06-17 10:55:08'),
	(195,'SO','Somalia','https://upload.wikimedia.org/wikipedia/commons/a/a0/Flag_of_Somalia.svg',5.15214900,46.19961600,1,'2020-05-13 07:10:28','2020-06-17 10:55:08'),
	(196,'ZA','South Africa','https://upload.wikimedia.org/wikipedia/commons/a/af/Flag_of_South_Africa.svg',-30.55948200,22.93750600,1,'2020-05-13 07:10:28','2020-06-17 10:55:08'),
	(197,'SS','South Sudan','https://upload.wikimedia.org/wikipedia/commons/7/7a/Flag_of_South_Sudan.svg',0.00000000,0.00000000,1,'2020-05-13 07:10:28','2020-06-17 10:55:08'),
	(198,'ES','Spain','https://upload.wikimedia.org/wikipedia/en/9/9a/Flag_of_Spain.svg',40.46366700,-3.74922000,1,'2020-05-13 07:10:28','2020-06-17 10:55:08'),
	(199,'LK','Sri Lanka','https://upload.wikimedia.org/wikipedia/commons/1/11/Flag_of_Sri_Lanka.svg',7.87305400,80.77179700,1,'2020-05-13 07:10:28','2020-06-17 10:55:08'),
	(200,'SD','Sudan ','https://upload.wikimedia.org/wikipedia/commons/0/01/Flag_of_Sudan.svg',12.86280700,30.21763600,1,'2020-05-13 07:10:28','2020-06-17 10:55:08'),
	(201,'SR','Suriname','https://upload.wikimedia.org/wikipedia/commons/6/60/Flag_of_Suriname.svg',3.91930500,-56.02778300,1,'2020-05-13 07:10:28','2020-06-17 10:55:08'),
	(202,'SE','Sweden','https://upload.wikimedia.org/wikipedia/en/4/4c/Flag_of_Sweden.svg',60.12816100,18.64350100,1,'2020-05-13 07:10:28','2020-06-17 10:55:08'),
	(203,'CH','Switzerland','https://upload.wikimedia.org/wikipedia/commons/0/08/Flag_of_Switzerland_%28Pantone%29.svg',46.81818800,8.22751200,1,'2020-05-13 07:10:28','2020-06-17 10:55:08'),
	(204,'SY','Syrian Arab Republic','https://upload.wikimedia.org/wikipedia/commons/5/53/Flag_of_Syria.svg',34.80207500,38.99681500,1,'2020-05-13 07:10:28','2020-06-17 10:55:08'),
	(205,'TW','Taiwan','https://upload.wikimedia.org/wikipedia/commons/thumb/7/72/Flag_of_the_Republic_of_China.svg/1024px-Flag_of_the_Republic_of_China.svg.png',23.69781000,120.96051500,1,'2020-05-13 07:10:28','2020-06-17 10:55:08'),
	(206,'TJ','Tajikistan','https://upload.wikimedia.org/wikipedia/commons/d/d0/Flag_of_Tajikistan.svg',38.86103400,71.27609300,1,'2020-05-13 07:10:28','2020-06-17 10:55:08'),
	(207,'TZ','Tanzania, United Republic of','https://upload.wikimedia.org/wikipedia/commons/3/38/Flag_of_Tanzania.svg',-6.36902800,34.88882200,1,'2020-05-13 07:10:28','2020-06-17 10:55:08'),
	(208,'TH','Thailand','https://upload.wikimedia.org/wikipedia/commons/a/a9/Flag_of_Thailand.svg',15.87003200,100.99254100,1,'2020-05-13 07:10:28','2020-06-17 10:55:08'),
	(209,'TL','Timor-Leste','https://upload.wikimedia.org/wikipedia/commons/thumb/2/26/Flag_of_East_Timor.svg/1280px-Flag_of_East_Timor.svg.png',-8.87421700,125.72753900,1,'2020-05-13 07:10:28','2020-06-17 10:55:08'),
	(210,'TG','Togo','https://upload.wikimedia.org/wikipedia/commons/6/68/Flag_of_Togo.svg',8.61954300,0.82478200,1,'2020-05-13 07:10:28','2020-06-17 10:55:08'),
	(211,'TK','Tokelau','https://upload.wikimedia.org/wikipedia/commons/thumb/8/8e/Flag_of_Tokelau.svg/1280px-Flag_of_Tokelau.svg.png',-8.96736300,-171.85588100,1,'2020-05-13 07:10:28','2020-06-17 10:55:08'),
	(212,'TO','Tonga','https://upload.wikimedia.org/wikipedia/commons/9/9a/Flag_of_Tonga.svg',-21.17898600,-175.19824200,1,'2020-05-13 07:10:28','2020-06-17 10:55:08'),
	(213,'TT','Trinidad and Tobago','https://upload.wikimedia.org/wikipedia/commons/6/64/Flag_of_Trinidad_and_Tobago.svg',10.69180300,-61.22250300,1,'2020-05-13 07:10:28','2020-06-17 10:55:08'),
	(214,'TN','Tunisia','https://upload.wikimedia.org/wikipedia/commons/c/ce/Flag_of_Tunisia.svg',33.88691700,9.53749900,1,'2020-05-13 07:10:28','2020-06-17 10:55:08'),
	(215,'TR','Turkey','https://upload.wikimedia.org/wikipedia/commons/b/b4/Flag_of_Turkey.svg',38.96374500,35.24332200,1,'2020-05-13 07:10:28','2020-06-17 10:55:08'),
	(216,'TM','Turkmenistan','https://upload.wikimedia.org/wikipedia/commons/1/1b/Flag_of_Turkmenistan.svg',38.96971900,59.55627800,1,'2020-05-13 07:10:28','2020-06-17 10:55:08'),
	(217,'TC','Turks and Caicos Islands ','https://upload.wikimedia.org/wikipedia/commons/1/1e/Flag_of_the_Turkish_Republic_of_Northern_Cyprus.svg',21.69402500,-71.79792800,1,'2020-05-13 07:10:28','2020-06-17 10:55:08'),
	(218,'TV','Tuvalu','https://upload.wikimedia.org/wikipedia/commons/3/38/Flag_of_Tuvalu.svg',-7.10953500,177.64933000,1,'2020-05-13 07:10:28','2020-06-17 10:55:08'),
	(219,'UG','Uganda','https://upload.wikimedia.org/wikipedia/commons/4/4e/Flag_of_Uganda.svg',1.37333300,32.29027500,1,'2020-05-13 07:10:28','2020-06-17 10:55:08'),
	(220,'UA','Ukraine','https://upload.wikimedia.org/wikipedia/commons/4/49/Flag_of_Ukraine.svg',48.37943300,31.16558000,1,'2020-05-13 07:10:28','2020-06-17 10:55:08'),
	(221,'UY','Uruguay','https://upload.wikimedia.org/wikipedia/commons/f/fe/Flag_of_Uruguay.svg',-32.52277900,-55.76583500,1,'2020-05-13 07:10:28','2020-06-17 10:55:08'),
	(222,'UZ','Uzbekistan','https://upload.wikimedia.org/wikipedia/commons/8/84/Flag_of_Uzbekistan.svg',41.37749100,64.58526200,1,'2020-05-13 07:10:28','2020-06-17 10:55:08'),
	(223,'VU','Vanuatu','https://upload.wikimedia.org/wikipedia/commons/b/bc/Flag_of_Vanuatu.svg',-15.37670600,166.95915800,1,'2020-05-13 07:10:28','2020-06-17 10:55:08'),
	(224,'VE','Venezuela (Bolivarian Republic of)','https://upload.wikimedia.org/wikipedia/commons/0/06/Flag_of_Venezuela.svg',6.42375000,-66.58973000,1,'2020-05-13 07:10:28','2020-06-17 10:55:08'),
	(225,'VN','Vietnam','https://upload.wikimedia.org/wikipedia/commons/2/21/Flag_of_Vietnam.svg',14.05832400,108.27719900,1,'2020-05-13 07:10:28','2020-06-17 10:55:08'),
	(226,'YE','Yemen','https://upload.wikimedia.org/wikipedia/commons/8/89/Flag_of_Yemen.svg',15.55272700,48.51638800,1,'2020-05-13 07:10:28','2020-06-17 10:55:08'),
	(227,'ZM','Zambia','https://upload.wikimedia.org/wikipedia/commons/0/06/Flag_of_Zambia.svg',-13.13389700,27.84933200,1,'2020-05-13 07:10:28','2020-06-17 10:55:08'),
	(228,'ZW','Zimbabwe','https://upload.wikimedia.org/wikipedia/commons/6/6a/Flag_of_Zimbabwe.svg',-19.01543800,29.15485700,1,'2020-05-13 07:10:28','2020-06-17 10:55:08');

/*!40000 ALTER TABLE `countries` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table dashboard_links
# ------------------------------------------------------------

DROP TABLE IF EXISTS `dashboard_links`;

CREATE TABLE `dashboard_links` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `target` enum('Same Window','New Tab','New Window') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Same Window',
  `is_active` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `title` (`title`),
  KEY `url` (`url`),
  KEY `target` (`target`),
  KEY `is_active` (`is_active`),
  KEY `created_at` (`created_at`),
  KEY `updated_at` (`updated_at`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `dashboard_links` WRITE;
/*!40000 ALTER TABLE `dashboard_links` DISABLE KEYS */;

INSERT INTO `dashboard_links` (`id`, `title`, `url`, `target`, `is_active`, `created_at`, `updated_at`)
VALUES
	(1,'Tips for anyone relocating from India','https://www.google.com','New Tab',1,'2020-10-13 14:24:54','2020-10-13 14:24:54'),
	(3,'Visa process & timing post Covid','https://www.google.com','New Tab',1,'2020-10-13 14:24:30','2020-10-13 14:24:30'),
	(4,'What to bring when moving to Singapore','https://www.haulmate.co/blog/what-to-bring-when-moving-to-singapore/','New Tab',1,'2020-11-19 10:47:32','2020-11-19 10:47:32');

/*!40000 ALTER TABLE `dashboard_links` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table housing
# ------------------------------------------------------------

DROP TABLE IF EXISTS `housing`;

CREATE TABLE `housing` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type_id` bigint(20) NOT NULL DEFAULT 1,
  `rate` decimal(16,2) NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_keyword` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `location_id` bigint(20) NOT NULL,
  `bedrooms` int(11) NOT NULL,
  `persons` int(11) NOT NULL,
  `showers` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `area` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `postal_code` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `latitude` decimal(10,8) DEFAULT NULL,
  `longitude` decimal(11,8) DEFAULT NULL,
  `listed_date` date NOT NULL,
  `source_url` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `partner_id` bigint(20) DEFAULT NULL,
  `is_active` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `title` (`title`),
  KEY `rate` (`rate`),
  KEY `location_id` (`location_id`),
  KEY `bedrooms` (`bedrooms`),
  KEY `persons` (`persons`),
  KEY `showers` (`showers`),
  KEY `area` (`area`),
  KEY `postal_code` (`postal_code`),
  KEY `latitude` (`latitude`),
  KEY `longitude` (`longitude`),
  KEY `listed_date` (`listed_date`),
  KEY `source_url` (`source_url`),
  KEY `is_active` (`is_active`),
  KEY `created_at` (`created_at`),
  KEY `updated_at` (`updated_at`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `housing` WRITE;
/*!40000 ALTER TABLE `housing` DISABLE KEYS */;

INSERT INTO `housing` (`id`, `title`, `type_id`, `rate`, `description`, `meta_title`, `meta_description`, `meta_keyword`, `location_id`, `bedrooms`, `persons`, `showers`, `area`, `postal_code`, `latitude`, `longitude`, `listed_date`, `source_url`, `partner_id`, `is_active`, `created_at`, `updated_at`)
VALUES
	(17,'Concourse Skyline',1,4199.00,'<p>3 mins walk (rain or shine, sheltered all the way) to Nicoll Highway MRT (circle line), or 7 mins to Bugis MRT (downtown line)<br />-Restaurants, shopping and entertainment are just around in the corner in Duo Galleria, Bugis Junction, Suntec City and more<br />-Well connected to the CBD and Orchard Shopping District<br /><br />Lease Terms<br />- Ready to move in Mid Dec 2020<br />- Fully Furnished<br />-Minimum 1 year<br />-Pool view<br /><br />About Concourse Skyline<br />Concourse Skyline development located at Beach Road in District 07. It comprises 360 units. This towering development offers a majestic view of the city skyline and embraces luxurious living with city conveniences.<br /><br />Condo Facilities at Concourse Skyline<br />Concourse Skyline has full facilities, which includes a 50m lap pool, BBQ pits, gym, spa pool, Jacuzzi, clubhouse, and a lounge.</p>',NULL,NULL,NULL,13,1,2,'1','861 sqft','199599',NULL,NULL,'2020-04-19','https://www.propertyguru.com.sg/listing/23251794/for-rent-concourse-skyline',NULL,1,'2020-04-19 03:10:56','2020-11-19 05:09:41'),
	(26,'2 rooms flat with soft interior',1,715.00,'Quo architecto magni qui. Ducimus omnis et quas nesciunt sequi magni vel. In ut fuga libero eaque deleniti qui et.',NULL,'','',6,2,4,'2','400 square feet',NULL,NULL,NULL,'2020-04-19','',NULL,1,'2020-04-19 03:10:56','2020-04-19 03:10:56');

/*!40000 ALTER TABLE `housing` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table housing_images
# ------------------------------------------------------------

DROP TABLE IF EXISTS `housing_images`;

CREATE TABLE `housing_images` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `housing_id` bigint(20) NOT NULL,
  `image_url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `housing_id` (`housing_id`),
  KEY `image_url` (`image_url`),
  KEY `order` (`order`),
  KEY `created_at` (`created_at`),
  KEY `updated_at` (`updated_at`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `housing_images` WRITE;
/*!40000 ALTER TABLE `housing_images` DISABLE KEYS */;

INSERT INTO `housing_images` (`id`, `housing_id`, `image_url`, `order`, `created_at`, `updated_at`)
VALUES
	(1,1,'https://www.haulmate.co/assets/img/property1.png',1,'2020-04-19 03:10:56','2020-11-13 10:49:08'),
	(2,1,'https://www.haulmate.co/assets/img/property2.png',2,'2020-04-19 03:10:56','2020-11-13 10:49:08'),
	(3,1,'https://www.haulmate.co/assets/img/property3.png',3,'2020-04-19 03:10:56','2020-11-13 10:49:08'),
	(4,1,'https://www.haulmate.co/assets/img/property4.png',4,'2020-04-19 03:10:56','2020-11-13 10:49:08'),
	(5,2,'https://www.haulmate.co/assets/img/property1.png',1,'2020-04-19 03:10:56','2020-11-13 10:49:08'),
	(6,2,'https://www.haulmate.co/assets/img/property2.png',2,'2020-04-19 03:10:56','2020-11-13 10:49:08'),
	(7,2,'https://www.haulmate.co/assets/img/property3.png',3,'2020-04-19 03:10:56','2020-11-13 10:49:08'),
	(8,3,'https://www.haulmate.co/assets/img/property1.png',1,'2020-04-19 03:10:56','2020-11-13 10:49:08'),
	(9,3,'https://www.haulmate.co/assets/img/property2.png',2,'2020-04-19 03:10:56','2020-11-13 10:49:08'),
	(10,4,'https://www.haulmate.co/assets/img/property1.png',1,'2020-04-19 03:10:56','2020-11-13 10:49:08'),
	(11,4,'https://www.haulmate.co/assets/img/property2.png',2,'2020-04-19 03:10:56','2020-11-13 10:49:08'),
	(12,4,'https://www.haulmate.co/assets/img/property3.png',3,'2020-04-19 03:10:56','2020-11-13 10:49:08'),
	(13,4,'https://www.haulmate.co/assets/img/property4.png',4,'2020-04-19 03:10:56','2020-11-13 10:49:08'),
	(14,5,'https://www.haulmate.co/assets/img/property1.png',1,'2020-04-19 03:10:56','2020-11-13 10:49:08'),
	(15,5,'https://www.haulmate.co/assets/img/property2.png',2,'2020-04-19 03:10:56','2020-11-13 10:49:08'),
	(16,6,'https://www.haulmate.co/assets/img/property1.png',1,'2020-04-19 03:10:56','2020-11-13 10:49:08'),
	(17,6,'https://www.haulmate.co/assets/img/property2.png',2,'2020-04-19 03:10:56','2020-11-13 10:49:08'),
	(18,7,'https://www.haulmate.co/assets/img/property1.png',1,'2020-04-19 03:10:56','2020-11-13 10:49:08'),
	(19,7,'https://www.haulmate.co/assets/img/property2.png',2,'2020-04-19 03:10:56','2020-11-13 10:49:08'),
	(20,8,'https://www.haulmate.co/assets/img/property1.png',1,'2020-04-19 03:10:56','2020-11-13 10:49:08'),
	(21,8,'https://www.haulmate.co/assets/img/property2.png',2,'2020-04-19 03:10:56','2020-11-13 10:49:08'),
	(22,8,'https://www.haulmate.co/assets/img/property3.png',3,'2020-04-19 03:10:56','2020-11-13 10:49:08'),
	(23,9,'https://www.haulmate.co/assets/img/property1.png',1,'2020-04-19 03:10:56','2020-11-13 10:49:08'),
	(24,9,'https://www.haulmate.co/assets/img/property2.png',2,'2020-04-19 03:10:56','2020-11-13 10:49:08'),
	(25,9,'https://www.haulmate.co/assets/img/property3.png',3,'2020-04-19 03:10:56','2020-11-13 10:49:08'),
	(26,9,'https://www.haulmate.co/assets/img/property4.png',4,'2020-04-19 03:10:56','2020-11-13 10:49:08'),
	(27,10,'https://www.haulmate.co/assets/img/property1.png',1,'2020-04-19 03:10:56','2020-11-13 10:49:09'),
	(28,10,'https://www.haulmate.co/assets/img/property2.png',2,'2020-04-19 03:10:56','2020-11-13 10:49:09'),
	(29,10,'https://www.haulmate.co/assets/img/property3.png',3,'2020-04-19 03:10:56','2020-11-13 10:49:09'),
	(30,11,'https://www.haulmate.co/assets/img/property1.png',1,'2020-04-19 03:10:56','2020-11-13 10:49:09'),
	(31,11,'https://www.haulmate.co/assets/img/property2.png',2,'2020-04-19 03:10:56','2020-11-13 10:49:09'),
	(32,12,'https://www.haulmate.co/assets/img/property1.png',1,'2020-04-19 03:10:56','2020-11-13 10:49:09'),
	(33,12,'https://www.haulmate.co/assets/img/property2.png',2,'2020-04-19 03:10:56','2020-11-13 10:49:09'),
	(34,12,'https://www.haulmate.co/assets/img/property3.png',3,'2020-04-19 03:10:56','2020-11-13 10:49:09'),
	(35,12,'https://www.haulmate.co/assets/img/property4.png',4,'2020-04-19 03:10:56','2020-11-13 10:49:09'),
	(36,13,'https://www.haulmate.co/assets/img/property1.png',1,'2020-04-19 03:10:56','2020-11-13 10:49:09'),
	(37,13,'https://www.haulmate.co/assets/img/property2.png',2,'2020-04-19 03:10:56','2020-11-13 10:49:09'),
	(38,13,'https://www.haulmate.co/assets/img/property3.png',3,'2020-04-19 03:10:56','2020-11-13 10:49:09'),
	(39,14,'https://www.haulmate.co/assets/img/property1.png',1,'2020-04-19 03:10:56','2020-11-13 10:49:09'),
	(40,14,'https://www.haulmate.co/assets/img/property2.png',2,'2020-04-19 03:10:56','2020-11-13 10:49:09'),
	(41,14,'https://www.haulmate.co/assets/img/property3.png',3,'2020-04-19 03:10:56','2020-11-13 10:49:09'),
	(42,15,'https://www.haulmate.co/assets/img/property1.png',1,'2020-04-19 03:10:56','2020-11-13 10:49:09'),
	(43,15,'https://www.haulmate.co/assets/img/property2.png',2,'2020-04-19 03:10:56','2020-11-13 10:49:09'),
	(44,15,'https://www.haulmate.co/assets/img/property3.png',3,'2020-04-19 03:10:56','2020-11-13 10:49:09'),
	(45,16,'https://www.haulmate.co/assets/img/property1.png',1,'2020-04-19 03:10:56','2020-11-13 10:49:09'),
	(46,16,'https://www.haulmate.co/assets/img/property2.png',2,'2020-04-19 03:10:56','2020-11-13 10:49:09'),
	(47,16,'https://www.haulmate.co/assets/img/property3.png',3,'2020-04-19 03:10:56','2020-11-13 10:49:09'),
	(48,17,'https://www.haulmate.co/assets/img/property1.png',1,'2020-04-19 03:10:56','2020-11-13 10:49:09'),
	(49,17,'https://www.haulmate.co/assets/img/property2.png',2,'2020-04-19 03:10:56','2020-11-13 10:49:09'),
	(50,18,'https://www.haulmate.co/assets/img/property1.png',1,'2020-04-19 03:10:56','2020-11-13 10:49:09'),
	(51,18,'https://www.haulmate.co/assets/img/property2.png',2,'2020-04-19 03:10:56','2020-11-13 10:49:09'),
	(52,18,'https://www.haulmate.co/assets/img/property3.png',3,'2020-04-19 03:10:56','2020-11-13 10:49:09'),
	(53,18,'https://www.haulmate.co/assets/img/property4.png',4,'2020-04-19 03:10:56','2020-11-13 10:49:09'),
	(54,19,'https://www.haulmate.co/assets/img/property1.png',1,'2020-04-19 03:10:56','2020-11-13 10:49:09'),
	(55,19,'https://www.haulmate.co/assets/img/property2.png',2,'2020-04-19 03:10:56','2020-11-13 10:49:09'),
	(56,19,'https://www.haulmate.co/assets/img/property3.png',3,'2020-04-19 03:10:56','2020-11-13 10:49:09'),
	(57,20,'https://www.haulmate.co/assets/img/property1.png',1,'2020-04-19 03:10:56','2020-11-13 10:49:09'),
	(58,20,'https://www.haulmate.co/assets/img/property2.png',2,'2020-04-19 03:10:56','2020-11-13 10:49:09'),
	(59,20,'https://www.haulmate.co/assets/img/property3.png',3,'2020-04-19 03:10:56','2020-11-13 10:49:09'),
	(60,20,'https://www.haulmate.co/assets/img/property4.png',4,'2020-04-19 03:10:56','2020-11-13 10:49:09'),
	(61,21,'https://www.haulmate.co/assets/img/property1.png',1,'2020-04-19 03:10:56','2020-11-13 10:49:09'),
	(62,21,'https://www.haulmate.co/assets/img/property2.png',2,'2020-04-19 03:10:56','2020-11-13 10:49:09'),
	(63,21,'https://www.haulmate.co/assets/img/property3.png',3,'2020-04-19 03:10:56','2020-11-13 10:49:09'),
	(64,22,'https://www.haulmate.co/assets/img/property1.png',1,'2020-04-19 03:10:56','2020-11-13 10:49:09'),
	(65,22,'https://www.haulmate.co/assets/img/property2.png',2,'2020-04-19 03:10:56','2020-11-13 10:49:09'),
	(66,22,'https://www.haulmate.co/assets/img/property3.png',3,'2020-04-19 03:10:56','2020-11-13 10:49:09'),
	(67,23,'https://www.haulmate.co/assets/img/property1.png',1,'2020-04-19 03:10:56','2020-11-13 10:49:09'),
	(68,23,'https://www.haulmate.co/assets/img/property2.png',2,'2020-04-19 03:10:56','2020-11-13 10:49:09'),
	(69,23,'https://www.haulmate.co/assets/img/property3.png',3,'2020-04-19 03:10:56','2020-11-13 10:49:09'),
	(70,24,'https://www.haulmate.co/assets/img/property1.png',1,'2020-04-19 03:10:56','2020-11-13 10:49:09'),
	(71,24,'https://www.haulmate.co/assets/img/property2.png',2,'2020-04-19 03:10:56','2020-11-13 10:49:09'),
	(72,24,'https://www.haulmate.co/assets/img/property3.png',3,'2020-04-19 03:10:56','2020-11-13 10:49:09'),
	(73,25,'https://www.haulmate.co/assets/img/property1.png',1,'2020-04-19 03:10:56','2020-11-13 10:49:09'),
	(74,25,'https://www.haulmate.co/assets/img/property2.png',2,'2020-04-19 03:10:56','2020-11-13 10:49:09'),
	(75,26,'https://www.haulmate.co/assets/img/property1.png',1,'2020-04-19 03:10:57','2020-11-13 10:49:09'),
	(76,26,'https://www.haulmate.co/assets/img/property2.png',2,'2020-04-19 03:10:57','2020-11-13 10:49:09'),
	(77,26,'https://www.haulmate.co/assets/img/property3.png',3,'2020-04-19 03:10:57','2020-11-13 10:49:09'),
	(78,26,'https://www.haulmate.co/assets/img/property4.png',4,'2020-04-19 03:10:57','2020-11-13 10:49:09'),
	(79,27,'https://www.haulmate.co/assets/img/property1.png',1,'2020-04-19 03:10:57','2020-11-13 10:49:09'),
	(80,27,'https://www.haulmate.co/assets/img/property2.png',2,'2020-04-19 03:10:57','2020-11-13 10:49:09'),
	(81,27,'https://www.haulmate.co/assets/img/property3.png',3,'2020-04-19 03:10:57','2020-11-13 10:49:09'),
	(82,27,'https://www.haulmate.co/assets/img/property4.png',4,'2020-04-19 03:10:57','2020-11-13 10:49:09'),
	(83,28,'https://www.haulmate.co/assets/img/property1.png',1,'2020-04-19 03:10:57','2020-11-13 10:49:09'),
	(84,28,'https://www.haulmate.co/assets/img/property2.png',2,'2020-04-19 03:10:57','2020-11-13 10:49:09'),
	(85,28,'https://www.haulmate.co/assets/img/property3.png',3,'2020-04-19 03:10:57','2020-11-13 10:49:09'),
	(86,28,'https://www.haulmate.co/assets/img/property4.png',4,'2020-04-19 03:10:57','2020-11-13 10:49:09'),
	(87,29,'https://www.haulmate.co/assets/img/property1.png',1,'2020-04-19 03:10:57','2020-11-13 10:49:09'),
	(88,29,'https://www.haulmate.co/assets/img/property2.png',2,'2020-04-19 03:10:57','2020-11-13 10:49:09'),
	(89,29,'https://www.haulmate.co/assets/img/property3.png',3,'2020-04-19 03:10:57','2020-11-13 10:49:09'),
	(90,30,'https://www.haulmate.co/assets/img/property1.png',1,'2020-04-19 03:10:57','2020-11-13 10:49:09'),
	(91,30,'https://www.haulmate.co/assets/img/property2.png',2,'2020-04-19 03:10:57','2020-11-13 10:49:09'),
	(92,31,'https://www.haulmate.co/assets/img/property1.png',1,'2020-04-19 03:10:57','2020-11-13 10:49:09'),
	(93,31,'https://www.haulmate.co/assets/img/property2.png',2,'2020-04-19 03:10:57','2020-11-13 10:49:09'),
	(94,31,'https://www.haulmate.co/assets/img/property3.png',3,'2020-04-19 03:10:57','2020-11-13 10:49:09'),
	(95,32,'https://www.haulmate.co/assets/img/property1.png',1,'2020-04-19 03:10:57','2020-11-13 10:49:09'),
	(96,32,'https://www.haulmate.co/assets/img/property2.png',2,'2020-04-19 03:10:57','2020-11-13 10:49:09'),
	(97,33,'https://www.haulmate.co/assets/img/property1.png',1,'2020-04-19 03:10:57','2020-11-13 10:49:09'),
	(98,33,'https://www.haulmate.co/assets/img/property2.png',2,'2020-04-19 03:10:57','2020-11-13 10:49:09'),
	(99,33,'https://www.haulmate.co/assets/img/property3.png',3,'2020-04-19 03:10:57','2020-11-13 10:49:09'),
	(100,34,'https://www.haulmate.co/assets/img/property1.png',1,'2020-04-19 03:10:57','2020-11-13 10:49:09'),
	(101,34,'https://www.haulmate.co/assets/img/property2.png',2,'2020-04-19 03:10:57','2020-11-13 10:49:09'),
	(102,34,'https://www.haulmate.co/assets/img/property3.png',3,'2020-04-19 03:10:57','2020-11-13 10:49:09'),
	(105,37,'https://www.haulmate.co/storage/housing_images/YLlP5UkpvSp6RsTLGH1zYKBYXHAxGLTk2jgA047Z.png',1,'2020-07-31 05:54:38','2020-11-13 10:49:09'),
	(106,38,'https://www.haulmate.co/storage/housing_images/POpMO5wf0Z6fRWiZk2BILf6Zxzq5KrIBJg2GZc6Q.jpeg',0,'2020-10-05 13:55:20','2020-11-13 10:49:09'),
	(107,38,'https://www.haulmate.co/storage/housing_images/JUil2Bmcht3u5BqC1eoFLT7ncO4dD1HIbOAvtdOi.jpeg',0,'2020-10-05 13:55:20','2020-11-13 10:49:09'),
	(108,17,'https://www.haulmate.co/storage/housing_images/rjVremuXesj5HUP5U0Ba0OtuqeMRlH2WFtW9slZ3.jpeg',0,'2020-11-19 05:09:41','2020-11-19 05:09:41'),
	(109,17,'https://www.haulmate.co/storage/housing_images/HY3rZaarfNbkYYj6Q7AsNN3038SEGRVqKEJskjtn.jpeg',0,'2020-11-19 05:09:41','2020-11-19 05:09:41'),
	(110,17,'https://www.haulmate.co/storage/housing_images/KyYaOJfWvxDegG761F5DF5zFxxu6kj69QJOm8dtr.jpeg',0,'2020-11-19 05:09:41','2020-11-19 05:09:41');

/*!40000 ALTER TABLE `housing_images` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table housing_type
# ------------------------------------------------------------

DROP TABLE IF EXISTS `housing_type`;

CREATE TABLE `housing_type` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `type` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `housing_type` WRITE;
/*!40000 ALTER TABLE `housing_type` DISABLE KEYS */;

INSERT INTO `housing_type` (`id`, `type`, `is_active`, `created_at`, `updated_at`)
VALUES
	(1,'Rental',1,'2020-09-29 11:58:08','2020-09-29 11:58:08'),
	(2,'Co-living',1,'2020-09-29 11:58:08','2020-09-29 11:58:08'),
	(3,'Service apartment',1,'2020-09-29 11:58:08','2020-10-23 10:33:11');

/*!40000 ALTER TABLE `housing_type` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table leads
# ------------------------------------------------------------

DROP TABLE IF EXISTS `leads`;

CREATE TABLE `leads` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) NOT NULL,
  `partner_id` bigint(20) DEFAULT NULL,
  `property_id` bigint(20) DEFAULT NULL,
  `street` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `postal_code` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `move_size` tinyint(4) DEFAULT NULL,
  `items` enum('full','furniture','box') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `moving_on` date DEFAULT NULL,
  `mobile_phone` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `leads` WRITE;
/*!40000 ALTER TABLE `leads` DISABLE KEYS */;

INSERT INTO `leads` (`id`, `user_id`, `partner_id`, `property_id`, `street`, `postal_code`, `move_size`, `items`, `moving_on`, `mobile_phone`, `created_at`, `updated_at`)
VALUES
	(1,3,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2020-06-29 10:02:25','2020-06-29 10:02:25'),
	(2,2,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2020-06-29 10:32:56','2020-06-29 10:32:56'),
	(3,2,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2020-06-29 10:35:26','2020-06-29 10:35:26'),
	(4,2,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2020-06-29 10:42:16','2020-06-29 10:42:16'),
	(5,2,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2020-06-30 14:40:17','2020-06-30 14:40:17'),
	(6,2,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2020-07-01 02:08:27','2020-07-01 02:08:27'),
	(7,2,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2020-07-02 10:08:26','2020-07-02 10:08:26'),
	(8,3,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2020-07-20 23:32:19','2020-07-20 23:32:19'),
	(9,2,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'914234567','2020-08-09 09:03:43','2020-08-09 09:03:43'),
	(10,2,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'9123456789','2020-08-09 09:06:28','2020-08-09 09:06:28'),
	(11,2,NULL,NULL,NULL,'169208',1,'full','2020-10-02','91234567','2020-09-27 22:44:33','2020-09-27 22:44:33'),
	(12,3,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2020-09-28 23:56:02','2020-09-28 23:56:02'),
	(13,37,NULL,23,NULL,NULL,NULL,NULL,NULL,NULL,'2020-09-29 06:08:11','2020-09-29 06:08:11'),
	(14,37,NULL,23,NULL,NULL,NULL,NULL,NULL,NULL,'2020-09-29 10:58:04','2020-09-29 10:58:04'),
	(15,3,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2020-09-30 01:22:52','2020-09-30 01:22:52'),
	(16,37,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2020-10-01 09:33:49','2020-10-01 09:33:49'),
	(17,2,NULL,NULL,NULL,NULL,4,'box',NULL,NULL,'2020-10-02 13:58:56','2020-10-02 13:58:56'),
	(18,3,NULL,NULL,NULL,NULL,2,'furniture',NULL,NULL,'2020-10-03 05:56:54','2020-10-03 05:56:54'),
	(19,3,NULL,NULL,NULL,NULL,2,'furniture',NULL,NULL,'2020-10-05 06:20:58','2020-10-05 06:20:58'),
	(20,51,NULL,3,NULL,NULL,NULL,NULL,NULL,'8899282','2020-10-06 05:03:57','2020-10-06 05:03:57'),
	(21,1,NULL,NULL,NULL,'169208',3,'furniture','2020-10-22','+1 (352) 241-2015','2020-10-12 09:28:23','2020-10-12 09:28:23'),
	(22,1,NULL,7,NULL,NULL,NULL,NULL,'2020-11-01','1234567890','2020-10-12 09:30:01','2020-10-12 09:30:01'),
	(23,51,NULL,3,NULL,NULL,NULL,NULL,'2020-10-01','1234566456','2020-10-13 07:16:31','2020-10-13 07:16:31'),
	(24,51,NULL,NULL,NULL,'268076',3,'furniture','2020-10-26','+628899282','2020-10-16 07:31:34','2020-10-16 07:31:34'),
	(25,2,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,'2020-10-23 11:27:02','2020-10-23 11:27:02'),
	(26,3,NULL,38,NULL,NULL,NULL,NULL,NULL,NULL,'2020-11-10 13:33:55','2020-11-10 13:33:55'),
	(27,3,NULL,38,NULL,NULL,NULL,NULL,'2020-11-01',NULL,'2020-11-10 13:34:12','2020-11-10 13:34:12'),
	(28,3,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2020-11-10 13:34:25','2020-11-10 13:34:25'),
	(29,26,NULL,NULL,NULL,'123',1,'full','2020-11-17','123','2020-11-12 06:32:18','2020-11-12 06:32:18'),
	(30,26,NULL,1,NULL,NULL,NULL,NULL,'2020-11-01','123','2020-11-12 07:24:19','2020-11-12 07:24:19'),
	(31,26,NULL,NULL,NULL,'123',1,'full',NULL,'123','2020-11-12 10:44:39','2020-11-12 10:44:39'),
	(32,26,NULL,14,NULL,NULL,NULL,NULL,'2020-11-01','123','2020-11-12 10:44:52','2020-11-12 10:44:52'),
	(33,61,NULL,NULL,NULL,'398371',2,'furniture',NULL,'+6587790305','2020-11-22 14:27:21','2020-11-22 14:27:21');

/*!40000 ALTER TABLE `leads` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table location_images
# ------------------------------------------------------------

DROP TABLE IF EXISTS `location_images`;

CREATE TABLE `location_images` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `location_id` bigint(20) NOT NULL,
  `image_url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `location_id` (`location_id`),
  KEY `image_url` (`image_url`),
  KEY `order` (`order`),
  KEY `created_at` (`created_at`),
  KEY `updated_at` (`updated_at`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `location_images` WRITE;
/*!40000 ALTER TABLE `location_images` DISABLE KEYS */;

INSERT INTO `location_images` (`id`, `location_id`, `image_url`, `order`, `created_at`, `updated_at`)
VALUES
	(995,3,'https://www.haulmate.co/storage/location/LP0UPqoEJlV1jm9HJhvxtQFGUCuhOytFmCC4WZVm.jpg',5,'2020-05-30 03:42:58','2020-11-13 10:49:09'),
	(1021,8,'https://www.haulmate.co/storage/location/nDtfYTkm8MLrko7JytjjAoLiyjMIDkIUijr2mOsO.jpg',6,'2020-05-30 03:43:20','2020-11-13 10:49:09'),
	(1022,8,'https://www.haulmate.co/storage/location/zzJQcUpQOmrpgb6ojjqL5DLRzEYPq2QbUO3PtTeY.jpg',7,'2020-05-30 03:43:20','2020-11-13 10:49:09'),
	(1038,14,'https://www.haulmate.co/storage/location/bvrUVqz18XcJEs6jb85xcGdWCb3DRQQv3gvR6Tzq.jpg',3,'2020-05-30 03:43:33','2020-11-13 10:49:09'),
	(1040,14,'https://www.haulmate.co/storage/location/lzy2y06LS4Oa5OV3B5RZZGEoPIEbO0YfjxkWupEu.jpg',5,'2020-05-30 03:43:33','2020-11-13 10:49:09'),
	(1041,14,'https://www.haulmate.co/storage/location/mdjwQAURfwSnJU9LpoDxUcJqwT6J4cdlhXzCSDxC.jpg',4,'2020-05-30 03:43:33','2020-11-13 10:49:09'),
	(1042,14,'https://www.haulmate.co/storage/location/2UWppkA8uz0WnZYCfBviwsr3XqbmQfokW9AF62v1.jpg',6,'2020-05-30 03:43:33','2020-11-13 10:49:09'),
	(1044,14,'https://www.haulmate.co/storage/location/K1Fj95bKDJ1FJXKUGUNjvNCnblCGHOgYpOT1uE7C.jpg',7,'2020-05-30 03:43:33','2020-11-13 10:49:09'),
	(1045,14,'https://www.haulmate.co/storage/location/EkdLrOgPbJuxyxFKTXkmkO638XTK9cM1aKNyxqjL.jpg',8,'2020-05-30 03:43:33','2020-11-13 10:49:09'),
	(1069,28,'https://www.haulmate.co/storage/location/5Nad7mDFTtzSs7iO2G7lYcSYSGlWy8d1YIqrO4xV.jpg',1,'2020-05-30 03:43:53','2020-11-13 10:49:09'),
	(1070,28,'https://www.haulmate.co/storage/location/UVxjeKDjwlsqJ6jG0nUN8zO9oj7LgassSPigoizB.jpg',8,'2020-05-30 03:43:53','2020-11-13 10:49:09'),
	(1072,28,'https://www.haulmate.co/storage/location/atkNYAaYBck8kmKuM00cBm8FwSQnNiULPE3nNeYS.jpg',7,'2020-05-30 03:43:53','2020-11-13 10:49:09'),
	(1074,28,'https://www.haulmate.co/storage/location/AlLYR5pdXiOFUaGU8hjcVMHByDJuvqx1k8DkPVMY.jpg',10,'2020-05-30 03:43:53','2020-11-13 10:49:09'),
	(1096,35,'https://www.haulmate.co/storage/location/7PfjWEwauDRJnUgL2PbDQBqnCHvVcEkszwFsOOFm.jpg',1,'2020-05-30 03:44:15','2020-11-13 10:49:09'),
	(1097,35,'https://www.haulmate.co/storage/location/ZbLxwm3gZmDAviI7m13m9SELdcK0LYYsXCy1eKEc.jpg',2,'2020-05-30 03:44:15','2020-11-13 10:49:09'),
	(1098,35,'https://www.haulmate.co/storage/location/mHpbeA1e9S1zxy63hyysknw2TAEAMzZpxQVxjMk3.jpg',3,'2020-05-30 03:44:15','2020-11-13 10:49:09'),
	(1099,35,'https://www.haulmate.co/storage/location/YQQ76nK5UlnwpUvnChpImx18DAsPIiV34BVLjVR8.jpg',4,'2020-05-30 03:44:15','2020-11-13 10:49:09'),
	(1100,35,'https://www.haulmate.co/storage/location/umd7LADwL8QmrnNzwMcvCE9lzfxQDorRPk2zna87.jpg',5,'2020-05-30 03:44:15','2020-11-13 10:49:09'),
	(1101,35,'https://www.haulmate.co/storage/location/kDnuvwulQYUmLMMQZRmCkNpSo3I7xXryUaUkcQhV.jpg',6,'2020-05-30 03:44:15','2020-11-13 10:49:09'),
	(1102,35,'https://www.haulmate.co/storage/location/OWNAnTIUHqnXfzGxOWc9oZSiqls1voCh5KT79jrU.jpg',7,'2020-05-30 03:44:15','2020-11-13 10:49:09'),
	(1103,35,'https://www.haulmate.co/storage/location/AzdjcB04E3D8UxQX2UO2UynNV28KGlIJGfeROK7H.jpg',8,'2020-05-30 03:44:15','2020-11-13 10:49:09'),
	(1104,35,'https://www.haulmate.co/storage/location/s2z8I6SrWHidZg07xC6OJ6pgvldKFgh040MquS7o.jpg',9,'2020-05-30 03:44:15','2020-11-13 10:49:09'),
	(1105,35,'https://www.haulmate.co/storage/location/yoWWUvVUZ3rgi2brCYBqYNxiF73pdpmKBpwhdSiF.jpg',10,'2020-05-30 03:44:15','2020-11-13 10:49:09'),
	(1108,36,'https://www.haulmate.co/storage/location/fj0VLWlnoykMQattKsLg0bdhvprZJpWLwelymckt.jpg',4,'2020-05-30 03:44:20','2020-11-13 10:49:09'),
	(1109,36,'https://www.haulmate.co/storage/location/Xa9mpIf3grmzJ6dxbxHDExYuIoA3gGJXMB8Koa9h.jpg',5,'2020-05-30 03:44:20','2020-11-13 10:49:09'),
	(1111,36,'https://www.haulmate.co/storage/location/Pjks98ghyY6BJxpIWnVm7dc1rCfX5G57XQR56Too.jpg',7,'2020-05-30 03:44:20','2020-11-13 10:49:09'),
	(1112,36,'https://www.haulmate.co/storage/location/j484mQlRg7r4jsQ9l7SzDCPtDwsONJVKnc3zSX58.jpg',1,'2020-05-30 03:44:20','2020-11-13 10:49:09'),
	(1113,36,'https://www.haulmate.co/storage/location/COU4cReakCUybWdbmCHakuw5EPXiqG6nfI3fppfp.jpg',8,'2020-05-30 03:44:20','2020-11-13 10:49:09'),
	(1127,40,'https://www.haulmate.co/storage/location/TNhVHqEPZbvdbnQj3QIAighWhI7BHlni7dXFQi9Z.jpg',6,'2020-05-30 03:44:32','2020-11-13 10:49:09'),
	(1128,40,'https://www.haulmate.co/storage/location/7SoQeuQnEg2O0GdoEaQBdLRsgbxweOeUuZmdhndu.jpg',7,'2020-05-30 03:44:32','2020-11-13 10:49:09'),
	(1136,43,'https://www.haulmate.co/storage/location/B73UlNjOfpO6NaSyfoI47M3k903wNOiWISkzRgAo.jpg',5,'2020-05-30 03:44:38','2020-11-13 10:49:09'),
	(1137,43,'https://www.haulmate.co/storage/location/Q0ARBZJ17K6vOCy5HBP29kwKk2FgVyM0HL3OBqLX.jpg',4,'2020-05-30 03:44:38','2020-11-13 10:49:09'),
	(1138,43,'https://www.haulmate.co/storage/location/t7DwsD0NTcKkNpNErILnK1u7WDWEcI0rNWUSfDGT.jpg',2,'2020-05-30 03:44:38','2020-11-13 10:49:09'),
	(1139,43,'https://www.haulmate.co/storage/location/yTP61gMCwpxdRjVKWfhHwZ1yOr65sMEaLe9AZAhn.jpg',3,'2020-05-30 03:44:38','2020-11-13 10:49:09'),
	(1143,43,'https://www.haulmate.co/storage/location/R0dVvkiT9Hm1sIzRxPPTz5X0HgguV3wqgsw9nYbJ.jpg',6,'2020-05-30 03:44:38','2020-11-13 10:49:09'),
	(1144,43,'https://www.haulmate.co/storage/location/BfKYVUuuwXZcPxkxU0D5HLA4xoXpavgVUtCQ5Yfd.jpg',8,'2020-05-30 03:44:38','2020-11-13 10:49:09'),
	(1145,43,'https://www.haulmate.co/storage/location/mQJpMSahKlZyap1yQbQTxBVNGHqLGszG69g1fXik.jpg',7,'2020-05-30 03:44:38','2020-11-13 10:49:09'),
	(1146,16,'https://www.haulmate.co/storage/location/M4pJtK881OiWqtVw8EjMbdjfSaOtigoQLBQdojPP.jpeg',2,'2020-06-09 22:44:59','2020-11-13 10:49:09'),
	(1151,43,'https://www.haulmate.co/storage/location/ZVR2ss00PuHC6EugXfaobOJGlAkKvmUKCvJc1ywl.jpeg',1,'2020-06-12 22:37:11','2020-11-13 10:49:09'),
	(1152,2,'https://www.haulmate.co/storage/location/M5HN9axpOXhGatQn5oN20vi2y7Gwc84H7ecfO5Zl.jpeg',5,'2020-06-12 22:43:54','2020-11-13 10:49:09'),
	(1153,2,'https://www.haulmate.co/storage/location/QllKdmWthkbrELSihft3lOBnaaoQxTOx7OoHjcG8.jpeg',1,'2020-06-12 22:43:54','2020-11-13 10:49:09'),
	(1154,2,'https://www.haulmate.co/storage/location/36mjawjxFJCFcNmbawcqFR33SV4hylaiuQ0VTOwc.jpeg',4,'2020-06-12 22:43:54','2020-11-13 10:49:09'),
	(1155,2,'https://www.haulmate.co/storage/location/dLr44CuXVlDNtTCgAlsUFtw6QVHB7IFfb8m0JLxF.webp',3,'2020-06-12 22:43:54','2020-11-13 10:49:09'),
	(1156,2,'https://www.haulmate.co/storage/location/VcAZHSde7bC3URq4PRaTyJcfgNdZWMsCt3fI9uq6.jpeg',2,'2020-06-12 22:43:54','2020-11-13 10:49:09'),
	(1157,18,'https://www.haulmate.co/storage/location/CII3azJxn1JgMXJo4Dbp9pm9m1pmFuAXOATcXkxi.jpeg',3,'2020-06-12 22:51:35','2020-11-13 10:49:09'),
	(1158,18,'https://www.haulmate.co/storage/location/o1iu6QoCqNpj1b6TfF0dH5yF6KyWZ7bwltdfyjRk.jpeg',1,'2020-06-12 22:51:35','2020-11-13 10:49:09'),
	(1160,18,'https://www.haulmate.co/storage/location/nVD6yazGCpR7GtqBfuO9hegvXTraFrIza6i1pmht.jpeg',6,'2020-06-12 22:51:35','2020-11-13 10:49:09'),
	(1161,18,'https://www.haulmate.co/storage/location/2HVYXiSOUrzFJWtAD6gKq3ioD0meDRVpdflgtJ4x.jpeg',5,'2020-06-12 23:03:07','2020-11-13 10:49:09'),
	(1165,18,'https://www.haulmate.co/storage/location/fDo0K7FlDivAtR6sNbdMpZv2sX1PUNBtFDhjaroX.jpeg',2,'2020-06-12 23:07:47','2020-11-13 10:49:09'),
	(1166,18,'https://www.haulmate.co/storage/location/irWF5jvwYe4nLqDce4hqHrIIrCvZm10eAw01kikF.jpeg',4,'2020-06-12 23:07:47','2020-11-13 10:49:09'),
	(1169,13,'https://www.haulmate.co/storage/location/8I3kR4zBn5nvXMYV8wMEdBDrYPrvkQREEuk4viys.jpeg',6,'2020-06-12 23:12:40','2020-11-13 10:49:09'),
	(1170,13,'https://www.haulmate.co/storage/location/LOEfDRfZf1ExFHBKMNjxnE6owtgjo81HkK0FzVuU.jpeg',2,'2020-06-12 23:12:40','2020-11-13 10:49:09'),
	(1171,13,'https://www.haulmate.co/storage/location/uKoapIJb3PwkucWE8aJxwwPDvyXPi28UtFKmq9ng.jpeg',1,'2020-06-12 23:12:40','2020-11-13 10:49:09'),
	(1172,13,'https://www.haulmate.co/storage/location/dO2gIDwXevZe07BtRfpw1zEfClUQqV8CUam1aydK.jpeg',3,'2020-06-12 23:13:53','2020-11-13 10:49:09'),
	(1173,3,'https://www.haulmate.co/storage/location/FXc9DK0IdctPJf7of3Mi6Mg1j7eDI3be4x3r3ZVB.jpeg',4,'2020-06-12 23:19:37','2020-11-13 10:49:09'),
	(1174,3,'https://www.haulmate.co/storage/location/eLRHTOpHttOIKno3qylUiBW7ixlX3MaqOy7WvzSi.jpeg',1,'2020-06-12 23:19:37','2020-11-13 10:49:09'),
	(1175,3,'https://www.haulmate.co/storage/location/Wg5C4IaWCI5TGGEuDUPFCMnaqAMzgmpVkT9cRTX1.jpeg',2,'2020-06-12 23:19:37','2020-11-13 10:49:09'),
	(1176,3,'https://www.haulmate.co/storage/location/GAHRzhPM1ouzegU0B1NQ4RYm2f7bX5GLhYDyqAUy.jpeg',3,'2020-06-12 23:19:37','2020-11-13 10:49:09'),
	(1177,8,'https://www.haulmate.co/storage/location/rOduUOBPqSff2FERRmG88EXjjv0BJEZcVFvXowIM.jpeg',2,'2020-06-12 23:26:15','2020-11-13 10:49:09'),
	(1178,8,'https://www.haulmate.co/storage/location/YUefoJNGn9wu2KLMSOsVoUCgJ39lF3oNqm2YMI5L.jpeg',3,'2020-06-12 23:26:15','2020-11-13 10:49:09'),
	(1179,8,'https://www.haulmate.co/storage/location/eqcc8YKjg3QCyyb5xQGAA6KQkcTWAORkut0Hvu1R.jpeg',4,'2020-06-12 23:26:15','2020-11-13 10:49:09'),
	(1180,8,'https://www.haulmate.co/storage/location/jR1bii5WtzerH5EIZL5VkWYyINEl0R6vcJSFXoBg.jpeg',1,'2020-06-12 23:26:15','2020-11-13 10:49:09'),
	(1182,25,'https://www.haulmate.co/storage/location/yyct16W4TGwn2HpIyWEnYrzP6uQ0gazRR4nfWIYN.jpeg',3,'2020-06-12 23:31:36','2020-11-13 10:49:09'),
	(1183,25,'https://www.haulmate.co/storage/location/d0QE41Ci7fiIVOL2TS3H8Pe4ewRcHDCMq0wJanSt.jpeg',4,'2020-06-12 23:31:36','2020-11-13 10:49:09'),
	(1184,25,'https://www.haulmate.co/storage/location/1lxuIMV5SiG2EfiBVKp9JU4pelZkGAaIeIX5yXr6.jpeg',1,'2020-06-12 23:31:36','2020-11-13 10:49:09'),
	(1185,25,'https://www.haulmate.co/storage/location/n3wAncJqIJrOuUwbYHONdG7ORObXUlQqxGpwjdGW.jpeg',5,'2020-06-12 23:31:36','2020-11-13 10:49:09'),
	(1186,25,'https://www.haulmate.co/storage/location/CaxmgEoCBoDGRgHUhD0ABVghMBkVbMDNVf1buDpH.jpeg',2,'2020-06-12 23:31:36','2020-11-13 10:49:09'),
	(1188,22,'https://www.haulmate.co/storage/location/pcFi1K4ZCPClhA6wdPLCvvNQcWWumbsggvejxUk4.png',1,'2020-06-12 23:38:13','2020-11-13 10:49:09'),
	(1189,22,'https://www.haulmate.co/storage/location/badUfjWqUSHPhU6p8j6pyOMRH1sXWhb1jyBxGB2D.jpeg',3,'2020-06-12 23:38:13','2020-11-13 10:49:09'),
	(1190,22,'https://www.haulmate.co/storage/location/mOaMPYM7BXd7bhBS8ZH2eISUONhhzwHKweQmlTjZ.jpeg',2,'2020-06-12 23:38:13','2020-11-13 10:49:09'),
	(1191,22,'https://www.haulmate.co/storage/location/zFGVP1bTOmtRWkYFeyvIyqR1sNdEijj45yCkWvcD.jpeg',4,'2020-06-12 23:38:13','2020-11-13 10:49:09'),
	(1192,38,'https://www.haulmate.co/storage/location/5ZzZzGp6T4CikDvFFdXMHbAyjFNwkxkKtJWbYeS4.jpeg',2,'2020-06-12 23:42:35','2020-11-13 10:49:09'),
	(1193,38,'https://www.haulmate.co/storage/location/OX9cq0zPJ0zMb1p2SDr4ttpl879MREOXonia1T1H.png',3,'2020-06-12 23:42:35','2020-11-13 10:49:09'),
	(1194,38,'https://www.haulmate.co/storage/location/c8myniTFQaGJkeE780yYnUGNZ7DqUvuSSKxnQSqM.jpeg',1,'2020-06-12 23:42:35','2020-11-13 10:49:09'),
	(1195,38,'https://www.haulmate.co/storage/location/KBGJTEqPZGvbBE47LLIdGb4koPiFJ9uKiBIdm2Ca.jpeg',4,'2020-06-12 23:42:35','2020-11-13 10:49:09'),
	(1196,38,'https://www.haulmate.co/storage/location/qr4XfCYPZDYrnh1TkdFOkvuXiKym7xN70zt12OC9.jpeg',5,'2020-06-12 23:42:35','2020-11-13 10:49:09'),
	(1198,5,'https://www.haulmate.co/storage/location/4GX5FD9OOaFBZN7x10r0AMERTQqEdmpfx601cXFX.jpeg',3,'2020-06-12 23:50:05','2020-11-13 10:49:09'),
	(1199,5,'https://www.haulmate.co/storage/location/NQyXaQV5uo2RqtXiDd0S9l6fw3iwIM8Di4ZyEQaX.jpeg',2,'2020-06-12 23:50:05','2020-11-13 10:49:09'),
	(1200,5,'https://www.haulmate.co/storage/location/pGW3TgFBZn3kEkb9mqNxj8pyjBNp0WbtY8Sinfui.jpeg',4,'2020-06-12 23:50:05','2020-11-13 10:49:09'),
	(1201,5,'https://www.haulmate.co/storage/location/Qtw1OunbB2tmack3cSK3iKAZpyZlE10SmWsuLIqk.jpeg',5,'2020-06-12 23:50:05','2020-11-13 10:49:09'),
	(1202,5,'https://www.haulmate.co/storage/location/ChZ5lnycMy7eKlhyiWIJTeR4extD8gv6VoiLkV1x.jpeg',1,'2020-06-12 23:50:05','2020-11-13 10:49:09'),
	(1204,19,'https://www.haulmate.co/storage/location/8vLAGSJDSYrifom3QfUXGLAVyRiN5TzfzVVBkn1X.jpeg',3,'2020-06-12 23:54:36','2020-11-13 10:49:09'),
	(1205,19,'https://www.haulmate.co/storage/location/lU0s0UJHnQpEBkfpbX2LT6BGakXJN0VlnP5BNu3y.jpeg',4,'2020-06-12 23:54:36','2020-11-13 10:49:09'),
	(1206,19,'https://www.haulmate.co/storage/location/P4dzl71iHWA201Muy9iSs7xNl6aKw4fU7BQ3nQQd.jpeg',1,'2020-06-12 23:54:36','2020-11-13 10:49:09'),
	(1207,19,'https://www.haulmate.co/storage/location/KNKTKDUdsTRoBq8SP10QizY0EN7cBUbtvker1q18.jpeg',2,'2020-06-12 23:54:36','2020-11-13 10:49:09'),
	(1208,19,'https://www.haulmate.co/storage/location/zbxmySIm8Df9otM0aUWKOPeDm49d2zhK4CclJixQ.jpeg',5,'2020-06-12 23:54:36','2020-11-13 10:49:09'),
	(1209,19,'https://www.haulmate.co/storage/location/wyzDDt69P4Zt9pZ3H8GQHM9EmIwuQKHR5fOTVmAc.jpeg',6,'2020-06-12 23:54:36','2020-11-13 10:49:09'),
	(1211,32,'https://www.haulmate.co/storage/location/NVagkuM3pq80WlsJoOusoKNF7H56gWDKCrPSaEBf.jpeg',1,'2020-06-12 23:59:40','2020-11-13 10:49:09'),
	(1212,32,'https://www.haulmate.co/storage/location/QSGNHbib9KvmjWnGjaGRu5n6Pee3oQ4FnQkX9GjP.jpeg',4,'2020-06-12 23:59:40','2020-11-13 10:49:09'),
	(1213,32,'https://www.haulmate.co/storage/location/flNnthyhqEU0EqNKdgiF9NaKk83oQPRzHOr4T8W8.jpeg',3,'2020-06-12 23:59:40','2020-11-13 10:49:09'),
	(1214,32,'https://www.haulmate.co/storage/location/1n0AjStbZTbEfDFUUHu31BW1bhtlrz440z4xBG8c.jpeg',2,'2020-06-12 23:59:40','2020-11-13 10:49:09'),
	(1216,4,'https://www.haulmate.co/storage/location/SYZv2a1ihOnSczXzT5NPiOmYTZ0iBwsH4U5NcZq9.jpeg',4,'2020-06-13 00:04:59','2020-11-13 10:49:09'),
	(1217,4,'https://www.haulmate.co/storage/location/kIRJ0APlDmgHHW5GmnjjkymndCwJWdOdrhosnuPJ.jpeg',1,'2020-06-13 00:04:59','2020-11-13 10:49:09'),
	(1218,4,'https://www.haulmate.co/storage/location/8nCFfUgBYuSKUceyHep5VAEdlbzahoNQQ1gNuUcL.jpeg',2,'2020-06-13 00:04:59','2020-11-13 10:49:09'),
	(1219,23,'https://www.haulmate.co/storage/location/5LpLCrGK56bUvfWfIuBV48yqnYsGgmqgSC4wBT1u.jpeg',3,'2020-06-13 00:09:27','2020-11-13 10:49:09'),
	(1220,23,'https://www.haulmate.co/storage/location/XOlcOQSS94qlEstEgAjVDKyHzvGowHWKGiYTlCcm.jpeg',4,'2020-06-13 00:09:27','2020-11-13 10:49:09'),
	(1221,23,'https://www.haulmate.co/storage/location/EddFByqB9VyG0flPFhIlrOVehHCg3m4eug6yJaZH.jpeg',1,'2020-06-13 00:09:27','2020-11-13 10:49:09'),
	(1222,23,'https://www.haulmate.co/storage/location/REhmt7BCPHyFonQeeXW0RGKPY3wBIMO0vgn89Wra.jpeg',2,'2020-06-13 00:09:27','2020-11-13 10:49:09'),
	(1223,23,'https://www.haulmate.co/storage/location/mPOrJd8EtOKcW4KVgCaMc3ELVZ8Hz2nAV7V1Ub1p.jpeg',5,'2020-06-13 00:09:27','2020-11-13 10:49:09'),
	(1224,23,'https://www.haulmate.co/storage/location/ZNxp7rjOhR15bmFVYFTCrVlQw7dWdeX2WtoUP5pe.jpeg',6,'2020-06-13 00:09:27','2020-11-13 10:49:09'),
	(1225,6,'https://www.haulmate.co/storage/location/PauSFVFOsxAS0K5AYYia4brZ7tvihJUqzrC5xWiN.jpeg',1,'2020-06-13 03:32:41','2020-11-13 10:49:09'),
	(1227,6,'https://www.haulmate.co/storage/location/TMCWvo2H4QXhgi4w5gcUmuLCkfaqzpoUnGxJjpG6.jpeg',2,'2020-06-13 03:32:41','2020-11-13 10:49:09'),
	(1228,6,'https://www.haulmate.co/storage/location/aiFfJTwMMPz8qkRf9ijizvHLhFH1q6UIjKeOA0x7.jpeg',3,'2020-06-13 03:32:41','2020-11-13 10:49:09'),
	(1229,6,'https://www.haulmate.co/storage/location/UXkjuRxDqHHdQPhH5jKVMpSFTQRcmvb3bbZi2nbE.jpeg',4,'2020-06-13 03:32:41','2020-11-13 10:49:09'),
	(1230,6,'https://www.haulmate.co/storage/location/mnwGg7qNtkJTHEnCogR2zVCgMuhwJV2tbrvCBfdh.jpeg',5,'2020-06-13 03:32:41','2020-11-13 10:49:09'),
	(1231,17,'https://www.haulmate.co/storage/location/bYsp7X5lliZleVHDPqnipHce4GogU8vVqhYPO7nb.jpeg',5,'2020-06-13 03:36:11','2020-11-13 10:49:09'),
	(1232,17,'https://www.haulmate.co/storage/location/q4PuSUK5NdN2QgIONmTPywlKtieITyURV1XFALxp.jpeg',2,'2020-06-13 03:36:11','2020-11-13 10:49:09'),
	(1233,17,'https://www.haulmate.co/storage/location/FhoDTgUhITfOYPwpGuO7QKfGqkeiegFLXw9su8lk.jpeg',3,'2020-06-13 03:36:11','2020-11-13 10:49:09'),
	(1234,17,'https://www.haulmate.co/storage/location/7tWyqfyyjABN7Qb1tVPMchvKersImJAmYr3JW1BM.jpeg',4,'2020-06-13 03:36:11','2020-11-13 10:49:09'),
	(1235,17,'https://www.haulmate.co/storage/location/Tm4oVuy9Yc9IhSb1y7uSV5crBxUJDYNDsytZr0A5.jpeg',1,'2020-06-13 03:36:11','2020-11-13 10:49:09'),
	(1237,24,'https://www.haulmate.co/storage/location/pRFmAa4gwcEln9ZPjSwWbxtxTgH4yj7LnXM6md0e.jpeg',4,'2020-06-13 03:44:26','2020-11-13 10:49:09'),
	(1238,24,'https://www.haulmate.co/storage/location/eUvCDEEvoYSXPY6lUd1UlfFSuqvXM549eGUy7M89.jpeg',1,'2020-06-13 03:44:26','2020-11-13 10:49:09'),
	(1239,24,'https://www.haulmate.co/storage/location/seUZ8TcjpenbP8YWtozQH3AtnHDN8B6VA8WJvp4X.jpeg',2,'2020-06-13 03:44:26','2020-11-13 10:49:09'),
	(1241,24,'https://www.haulmate.co/storage/location/IiR53ezYBhdWZlnT8yfWWyKBXrE0s9LLOwjYtNhl.jpeg',5,'2020-06-13 03:45:25','2020-11-13 10:49:09'),
	(1242,34,'https://www.haulmate.co/storage/location/EszO6LMNS3ccWnz5oPzvoTDm9VxjayptACiSpwOn.jpeg',2,'2020-06-13 03:49:31','2020-11-13 10:49:09'),
	(1243,34,'https://www.haulmate.co/storage/location/cEv755396dpr84yn5eMHcunPx4hm0NkNVQF4xZ54.jpeg',3,'2020-06-13 03:49:31','2020-11-13 10:49:09'),
	(1244,34,'https://www.haulmate.co/storage/location/ewv6024NjEjq6sFEuzVBZ02CLkkykxufIPSRRCVD.webp',1,'2020-06-13 03:49:31','2020-11-13 10:49:09'),
	(1245,34,'https://www.haulmate.co/storage/location/AjkIv5AmkAMAxGN95g387PNYhHc9lGAQt979u8UP.jpeg',4,'2020-06-13 03:49:31','2020-11-13 10:49:09'),
	(1247,34,'https://www.haulmate.co/storage/location/YR60GNithRt0pNarj4rAdciqEiZLkzzQNixkIK0A.jpeg',5,'2020-06-13 03:49:31','2020-11-13 10:49:09'),
	(1248,15,'https://www.haulmate.co/storage/location/jukRgWag8VAjNgIiBKefveU7yTPBehJvJkwgNC9Q.jpeg',2,'2020-06-13 03:51:41','2020-11-13 10:49:09'),
	(1249,15,'https://www.haulmate.co/storage/location/49oiprxa7yw4wQpPQFIq3Lb6MXIJW0c7N8iaLKCe.jpeg',3,'2020-06-13 03:51:41','2020-11-13 10:49:09'),
	(1250,15,'https://www.haulmate.co/storage/location/5qFCNCML5VRQmh7qzJ3ctUvswY8rEtuylpJOph11.jpeg',4,'2020-06-13 03:51:41','2020-11-13 10:49:09'),
	(1251,15,'https://www.haulmate.co/storage/location/98e6HOxiRZOTVqWxkkMTlLcM9gzyTUxwefuNe65Q.jpeg',5,'2020-06-13 03:51:41','2020-11-13 10:49:09'),
	(1252,15,'https://www.haulmate.co/storage/location/lqZP0ML9oOAsUiIXQ79Oa9Bht4cwFMcOsLqVjCKs.jpeg',1,'2020-06-13 03:52:12','2020-11-13 10:49:09'),
	(1254,7,'https://www.haulmate.co/storage/location/xwLdpmxgS8pvKYMVrVdyULKWIdvKqBmu9YzqYwqH.jpeg',3,'2020-06-13 03:57:39','2020-11-13 10:49:09'),
	(1255,7,'https://www.haulmate.co/storage/location/yrglzftcoPFVsCZi53a2chbOpKrEOKlUITDXwOjI.jpeg',1,'2020-06-13 03:57:39','2020-11-13 10:49:09'),
	(1256,7,'https://www.haulmate.co/storage/location/M6XDGZXJqUUWeBroDwF6LUCGV0JjuzTUutt3L7Ny.jpeg',4,'2020-06-13 03:57:39','2020-11-13 10:49:09'),
	(1259,29,'https://www.haulmate.co/storage/location/Dthe3uAbmQMTeXEVppBdd5AVnKaxgqkE7Hy2Mw4G.jpeg',1,'2020-06-13 04:01:57','2020-11-13 10:49:09'),
	(1263,29,'https://www.haulmate.co/storage/location/dKaosilmjsTkHUg7GduhEuqmTsUoMq2gl4d6m3od.jpeg',4,'2020-06-13 04:03:17','2020-11-13 10:49:09'),
	(1264,31,'https://www.haulmate.co/storage/location/DNCK06bnuL1weciGyHbQdIIESQbXnUP83QdgGDr9.jpeg',2,'2020-06-13 04:08:12','2020-11-13 10:49:09'),
	(1265,31,'https://www.haulmate.co/storage/location/erkJO93qksyMWhKBmeiYGzrTNzOyadquDfaTGEX1.jpeg',1,'2020-06-13 04:08:12','2020-11-13 10:49:09'),
	(1266,31,'https://www.haulmate.co/storage/location/3RtlmjgAKJMGVPJ6FSPMQfP1hKI7CCh0UjoWoNjY.jpeg',3,'2020-06-13 04:08:12','2020-11-13 10:49:09'),
	(1267,31,'https://www.haulmate.co/storage/location/4utSMZ5DV2VRSA2TjfFmf9Til8eeREcyFHRW8lB1.jpeg',4,'2020-06-13 04:08:12','2020-11-13 10:49:09'),
	(1268,39,'https://www.haulmate.co/storage/location/TSEEguBklmOHDzSMTGOiZlBKQNoWdkFEeIMQH0Hu.jpeg',2,'2020-06-13 04:12:22','2020-11-13 10:49:09'),
	(1269,39,'https://www.haulmate.co/storage/location/RJj6JDIYlT5ZgQkgkk9faM3zjakpL3QCGbfB8ThI.jpeg',3,'2020-06-13 04:12:22','2020-11-13 10:49:09'),
	(1270,39,'https://www.haulmate.co/storage/location/ZVO6z2Fj4fjizAseMC35ThKz88R88YkPgiodqrLX.jpeg',4,'2020-06-13 04:12:22','2020-11-13 10:49:09'),
	(1271,39,'https://www.haulmate.co/storage/location/YLRgFnJyXQKb9Pxd0tTA86e6SkhMwZHlECKi00h8.jpeg',5,'2020-06-13 04:12:22','2020-11-13 10:49:09'),
	(1272,39,'https://www.haulmate.co/storage/location/jgqBP9b9pqUnbpVkrajji8q9rAqgagQYwXvtmvFu.jpeg',1,'2020-06-13 04:12:22','2020-11-13 10:49:09'),
	(1276,41,'https://www.haulmate.co/storage/location/T23psorI65QzpXfmexILMqDTx7q9pZOnfl94TIql.png',2,'2020-06-13 04:18:46','2020-11-13 10:49:09'),
	(1277,41,'https://www.haulmate.co/storage/location/Btq7eSgXl4WmRdDJN79QuSdJ43AVbpCi1QSF4oma.jpeg',3,'2020-06-13 04:18:46','2020-11-13 10:49:09'),
	(1278,41,'https://www.haulmate.co/storage/location/HDH9vfdOaBIIwhzFRedbeFUBxGzYDxH4PB9cXKkc.jpeg',1,'2020-06-13 04:18:46','2020-11-13 10:49:09'),
	(1279,40,'https://www.haulmate.co/storage/location/RQwMHTZYoo6O74JRf6lb2IQWpunqFVP96m0mOJWd.jpeg',5,'2020-06-13 04:22:40','2020-11-13 10:49:09'),
	(1280,40,'https://www.haulmate.co/storage/location/e5eBMXCUMH1OIMXdmhipsKi9mAZAvtXpBY8nVLQk.jpeg',2,'2020-06-13 04:22:40','2020-11-13 10:49:09'),
	(1281,40,'https://www.haulmate.co/storage/location/abXcVrVcYvQWu9AiBBq2JOcJzbUoMhlbKiT5klkz.jpeg',1,'2020-06-13 04:22:40','2020-11-13 10:49:09'),
	(1282,40,'https://www.haulmate.co/storage/location/o01prizQ5bGo1LpTOtXp6kG4HkvG773gSgPNWlQw.jpeg',3,'2020-06-13 04:22:40','2020-11-13 10:49:09'),
	(1283,40,'https://www.haulmate.co/storage/location/1mdHmeHY1Ir692AQHHsesbFh9dLPTIClXWIUBF5L.jpeg',4,'2020-06-13 04:22:40','2020-11-13 10:49:09'),
	(1284,42,'https://www.haulmate.co/storage/location/oTDPrDDDJZg24X4jSqFO2fOGJ4Vrctxb9cgr9Hti.jpeg',2,'2020-06-15 23:55:24','2020-11-13 10:49:09'),
	(1285,42,'https://www.haulmate.co/storage/location/MvpAvKKF6xsEhAMYmthiNwnQIxclPFRcxmUcsLza.jpeg',3,'2020-06-15 23:55:24','2020-11-13 10:49:09'),
	(1286,42,'https://www.haulmate.co/storage/location/OS7KDwDVyKdmrlImX4aym3qyO1CGvrvXPWXxUcip.jpeg',4,'2020-06-15 23:55:24','2020-11-13 10:49:09'),
	(1287,42,'https://www.haulmate.co/storage/location/FdrjzkgEVh8re6j15FUdAfpOggwGnvdyXKNC11fu.webp',5,'2020-06-15 23:55:24','2020-11-13 10:49:09'),
	(1288,42,'https://www.haulmate.co/storage/location/ObkPUqObtzl4nK9xi0ffeiMCSEoyPLftzO5GY2Rq.jpeg',1,'2020-06-15 23:55:24','2020-11-13 10:49:09'),
	(1289,26,'https://www.haulmate.co/storage/location/3JC9Ql6F7OHV7w4RdHWmgE5Tir1XfSpLmse0LtQh.jpeg',2,'2020-06-15 23:59:00','2020-11-13 10:49:09'),
	(1290,26,'https://www.haulmate.co/storage/location/A2ZcwjgUnIpPylqJsE4JMnByDkKimfcNJqKc10iH.jpeg',1,'2020-06-15 23:59:00','2020-11-13 10:49:09'),
	(1294,21,'https://www.haulmate.co/storage/location/pVdHa1O6lTMLj5C4JVmvCtUYyj0V2tvOdL6OpPhR.jpeg',1,'2020-06-16 00:04:19','2020-11-13 10:49:09'),
	(1295,21,'https://www.haulmate.co/storage/location/oFjaLosBw1WFpA5Dz7k2f96fKt9K5inxa1MPfq0n.jpeg',3,'2020-06-16 00:04:19','2020-11-13 10:49:09'),
	(1296,21,'https://www.haulmate.co/storage/location/tl1qNHZrodHH6aUoMkwTX1fBRAkCVCdOzwZ1azoI.jpeg',4,'2020-06-16 00:04:19','2020-11-13 10:49:09'),
	(1297,33,'https://www.haulmate.co/storage/location/MW0AJ946bfD56nXPlb2r70XiihqzjZ7KMWo7ECfL.jpeg',0,'2020-06-16 00:07:17','2020-11-13 10:49:09'),
	(1298,33,'https://www.haulmate.co/storage/location/bw5VqiVAd5NdfSbx3NvECBjbMDWbt0STC27YwHtP.jpeg',0,'2020-06-16 00:07:17','2020-11-13 10:49:09'),
	(1299,33,'https://www.haulmate.co/storage/location/5zYxYTKEKruS0iF4WC9XwrkI5o5uhdqeRbcl0TCq.jpeg',0,'2020-06-16 00:07:17','2020-11-13 10:49:09'),
	(1300,33,'https://www.haulmate.co/storage/location/xQpSuKSQq1CvEucJ0Mt10KZdpYOVAuxHlhsfBKR9.jpeg',0,'2020-06-16 00:07:17','2020-11-13 10:49:09'),
	(1301,33,'https://www.haulmate.co/storage/location/EHhDW4RRHgy0Di9v2wB1l6FUkbBhLpxq5fWnWqsP.jpeg',0,'2020-06-16 00:07:17','2020-11-13 10:49:09'),
	(1303,37,'https://www.haulmate.co/storage/location/DgblaD7a66pSLdjZ6qUCGR8LK9iIWuR6o5wzMUUp.jpeg',3,'2020-06-16 00:12:00','2020-11-13 10:49:09'),
	(1304,37,'https://www.haulmate.co/storage/location/sN9kqBwZqLB4joU76LFu7DrrAk26FovTzS5haSPz.png',4,'2020-06-16 00:12:00','2020-11-13 10:49:09'),
	(1305,37,'https://www.haulmate.co/storage/location/tPi4Dpe5LTZr4N1FLcBer6BBtBTK50r8saMihkEJ.jpeg',5,'2020-06-16 00:12:00','2020-11-13 10:49:09'),
	(1306,37,'https://www.haulmate.co/storage/location/vaWl85IEtpF3yh5dEBY2A4BViFgumHL9LyNshXie.jpeg',1,'2020-06-16 00:13:29','2020-11-13 10:49:09'),
	(1307,27,'https://www.haulmate.co/storage/location/SXiuBd0cqN4fkaskbqatToOl58iypiHJcxuxDSwp.jpeg',0,'2020-06-16 00:17:37','2020-11-13 10:49:09'),
	(1308,27,'https://www.haulmate.co/storage/location/JHe7yKHV1Xtjrc7OUMjyqaknr2maIk0HoU9kkxLM.jpeg',0,'2020-06-16 00:17:37','2020-11-13 10:49:09'),
	(1309,27,'https://www.haulmate.co/storage/location/HAYLl84h71rIhgMEWw2mh1IAGxma9RCJv4vl2AgC.jpeg',0,'2020-06-16 00:18:33','2020-11-13 10:49:09'),
	(1310,27,'https://www.haulmate.co/storage/location/og6b3a6iAI30Xp8FuxvAlNWgTYPoCr00Um1XI3BJ.jpeg',0,'2020-06-16 00:18:33','2020-11-13 10:49:09'),
	(1311,14,'https://www.haulmate.co/storage/location/HwOb8QeWoMUxTBuSg29pWDvvXkTUbxiBafnn2fpZ.jpeg',2,'2020-06-16 00:21:55','2020-11-13 10:49:09'),
	(1313,14,'https://www.haulmate.co/storage/location/2aFTAY0efSGTLFGQZxiIIupJzOhW589Zk9ZhLHSq.jpeg',1,'2020-06-16 00:22:23','2020-11-13 10:49:09'),
	(1314,28,'https://www.haulmate.co/storage/location/rXpo9JTgo3q9p7OhJcBDWy9hxS2j78iv7MQX5ak6.jpeg',3,'2020-10-23 03:52:31','2020-11-13 10:49:09'),
	(1315,28,'https://www.haulmate.co/storage/location/gOK6c7mcNeMPdGsE0EaAipVY8DSwzZTsA0FVm5hN.jpeg',2,'2020-10-23 03:52:31','2020-11-13 10:49:09'),
	(1316,28,'https://www.haulmate.co/storage/location/TBddjm3mo5zI4yhfIXjGuNev9R4w72kcEJsIYi2k.jpeg',4,'2020-10-23 03:52:31','2020-11-13 10:49:09'),
	(1317,28,'https://www.haulmate.co/storage/location/2FXO9qnML1ELGWEhbbv7XJuJGalfFU8x1QvcVX9L.jpeg',5,'2020-10-23 03:52:31','2020-11-13 10:49:09'),
	(1319,16,'https://www.haulmate.co/storage/location/yN1o7Rfp7gzB4U2DEkxgCIzCMuOdSvuV2khzWHAx.jpeg',1,'2020-10-23 09:22:21','2020-11-13 10:49:09'),
	(1320,16,'https://www.haulmate.co/storage/location/cYtCYKzCD4t5yySYu9mDW0gCPc89ZfD681jsrlMv.webp',0,'2020-10-23 09:27:32','2020-11-13 10:49:09'),
	(1321,16,'https://www.haulmate.co/storage/location/plYjFmxAek7EsSbGdPAU5xQpexIOmAaUbntHvOcw.jpeg',0,'2020-10-23 09:27:32','2020-11-13 10:49:09'),
	(1322,16,'https://www.haulmate.co/storage/location/caBMoavlZB9WztpSdqU1kSlIvOnZwYeYuFYBrY4I.jpeg',0,'2020-10-23 09:27:32','2020-11-13 10:49:09'),
	(1323,13,'https://www.haulmate.co/storage/location/mZVxe2yjYq8f4uZawJLao4TAMR2Q7wAw15XH87LD.jpeg',0,'2020-10-23 09:54:25','2020-11-13 10:49:09'),
	(1324,31,'https://www.haulmate.co/storage/location/VbWCp1cveqE6sAeJWa93czA0deaBNOql0MbYeHvn.jpeg',0,'2020-10-23 10:02:44','2020-11-13 10:49:09'),
	(1325,29,'https://www.haulmate.co/storage/location/BzF08tsGiwUGA8iUriJ7FvTqoBuF2YBjBkvMfL8U.jpeg',3,'2020-10-23 10:23:19','2020-11-13 10:49:09'),
	(1326,29,'https://www.haulmate.co/storage/location/tGutejUuzqztGalLBALyH2MyMHT7Pjf5xDTC3NvS.jpeg',0,'2020-10-23 10:27:16','2020-11-13 10:49:09'),
	(1327,29,'https://www.haulmate.co/storage/location/TymnKRgU8FjciM82otUARbGf7AIgN6ybkO5pjgyT.jpeg',0,'2020-10-23 10:27:16','2020-11-13 10:49:09'),
	(1328,26,'https://www.haulmate.co/storage/location/c01fNs1DNPseOZUxwt6pmtZRGNA94edIt2RINTo2.jpeg',0,'2020-10-23 12:20:22','2020-11-13 10:49:09'),
	(1329,26,'https://www.haulmate.co/storage/location/FXTPfMOPsy75DdUaEB7rbISN1TKn3LdHgsHeVM7R.jpeg',0,'2020-10-23 12:20:22','2020-11-13 10:49:09'),
	(1332,26,'https://www.haulmate.co/storage/location/8qU7raIOWtM8WFr4UfQBh31lh0Zc4ApyWh2WI46L.jpeg',0,'2020-10-23 12:25:28','2020-11-13 10:49:09'),
	(1333,4,'https://www.haulmate.co/storage/location/1DOyeXEtCqoIt3jW7MZEwEaGWfPzuezSPjv0At63.jpeg',0,'2020-10-23 12:33:30','2020-11-13 10:49:09'),
	(1334,4,'https://www.haulmate.co/storage/location/w5u1mZAaD5na4kd9lFxJM2dJ0saDy4d63fKu8rxq.jpeg',0,'2020-10-23 12:34:46','2020-11-13 10:49:09'),
	(1335,21,'https://www.haulmate.co/storage/location/cDQQoMiCywOx7r8tnGUYgHgAWgcmXnZtGorB0Ld4.jpeg',2,'2020-10-23 12:41:18','2020-11-13 10:49:09'),
	(1336,21,'https://www.haulmate.co/storage/location/Y3x8ZPwD7JhzlKJoSmRahnNZf1fjnAc7LxUXfVN9.jpeg',0,'2020-10-23 12:43:50','2020-11-13 10:49:09'),
	(1337,24,'https://www.haulmate.co/storage/location/BXdu0aIoOPNPBu0McskEIUo7hSKkE0Yh8xu12ufk.jpeg',0,'2020-10-23 12:57:52','2020-11-13 10:49:09'),
	(1338,37,'https://www.haulmate.co/storage/location/sDl2bVFsUfDuxZEt8tOif7qo09kRuHXJp7QCYB2R.png',0,'2020-10-23 13:04:58','2020-11-13 10:49:09'),
	(1339,22,'https://www.haulmate.co/storage/location/Bo32cu7VxzVZu7rb2LVkpBn5SapW25EsFH1kmtkn.jpeg',0,'2020-10-23 13:26:20','2020-11-13 10:49:09'),
	(1340,32,'https://www.haulmate.co/storage/location/kpe50iejAJ4S4CP0YTQ8DN3fx5gr6ZIiEUNZd1un.jpeg',0,'2020-10-23 13:36:56','2020-11-13 10:49:09'),
	(1341,7,'https://www.haulmate.co/storage/location/GcY4qpuVFy9Gk7eLcKeCejKZ2R2vRtYGVfcdWuqw.jpeg',2,'2020-10-23 13:40:51','2020-11-13 10:49:09'),
	(1342,7,'https://www.haulmate.co/storage/location/l3rLeiPAF6EatUjoPQcxym9CCVWdQ5Q6lvbH9EgG.jpeg',0,'2020-10-23 13:44:13','2020-11-13 10:49:09');

/*!40000 ALTER TABLE `location_images` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table location_prefs
# ------------------------------------------------------------

DROP TABLE IF EXISTS `location_prefs`;

CREATE TABLE `location_prefs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `location_id` bigint(20) NOT NULL,
  `pref_id` bigint(20) NOT NULL,
  `score` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `location_id` (`location_id`),
  KEY `pref_id` (`pref_id`),
  KEY `score` (`score`),
  KEY `created_at` (`created_at`),
  KEY `updated_at` (`updated_at`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `location_prefs` WRITE;
/*!40000 ALTER TABLE `location_prefs` DISABLE KEYS */;

INSERT INTO `location_prefs` (`id`, `location_id`, `pref_id`, `score`, `created_at`, `updated_at`)
VALUES
	(12,43,22,3,'2020-05-13 09:41:50','2020-05-13 09:41:50'),
	(13,43,23,3,'2020-05-05 10:12:40','2020-05-05 10:12:40'),
	(14,28,25,4,'2020-05-13 07:27:05','2020-05-13 07:27:05'),
	(15,28,27,4,'2020-05-13 07:27:20','2020-05-13 07:27:20'),
	(16,28,34,2,'2020-05-13 07:30:53','2020-05-13 07:30:53'),
	(17,28,30,1,'2020-05-13 07:31:15','2020-05-13 07:31:15'),
	(18,28,37,2,'2020-05-13 07:31:38','2020-05-13 07:31:38'),
	(19,28,32,2,'2020-05-13 07:31:49','2020-05-13 07:31:49'),
	(20,28,23,4,'2020-05-13 07:31:55','2020-05-13 07:31:55'),
	(21,28,33,2,'2020-05-13 07:32:08','2020-05-13 07:32:08'),
	(22,28,28,4,'2020-05-13 07:32:19','2020-05-13 07:32:19'),
	(23,28,39,5,'2020-05-13 07:32:35','2020-05-13 07:32:35'),
	(24,28,26,4,'2020-05-13 07:32:48','2020-05-13 07:32:48'),
	(25,28,36,1,'2020-05-13 07:32:59','2020-05-13 07:32:59'),
	(26,28,31,2,'2020-05-13 07:33:15','2020-05-13 07:33:15'),
	(27,28,35,1,'2020-05-13 07:33:29','2020-05-13 07:33:29'),
	(28,28,29,2,'2020-05-13 07:33:45','2020-05-13 07:33:45'),
	(29,28,22,2,'2020-05-13 07:33:55','2020-05-13 07:33:55'),
	(30,16,25,1,'2020-05-13 07:35:22','2020-05-13 07:35:22'),
	(31,16,27,3,'2020-05-13 07:35:29','2020-05-13 07:35:29'),
	(32,16,34,1,'2020-05-13 07:35:42','2020-05-13 07:35:42'),
	(33,16,30,4,'2020-05-13 07:35:51','2020-05-13 07:35:51'),
	(34,16,37,2,'2020-05-13 07:37:38','2020-05-13 07:37:38'),
	(35,16,32,5,'2020-05-13 07:37:49','2020-05-13 07:37:49'),
	(36,16,23,1,'2020-05-13 07:39:01','2020-05-13 07:39:01'),
	(37,16,33,4,'2020-05-13 07:39:11','2020-05-13 07:39:11'),
	(38,16,28,4,'2020-05-13 07:39:22','2020-05-13 07:39:22'),
	(39,16,39,1,'2020-05-13 07:39:34','2020-05-13 07:39:34'),
	(40,16,26,2,'2020-05-13 07:39:51','2020-05-13 07:39:51'),
	(41,16,36,2,'2020-05-13 07:40:02','2020-05-13 07:40:02'),
	(42,16,31,1,'2020-05-13 07:40:11','2020-05-13 07:40:11'),
	(43,16,35,1,'2020-05-13 07:40:22','2020-05-13 07:40:22'),
	(44,16,29,2,'2020-05-13 07:40:35','2020-05-13 07:40:35'),
	(45,16,22,3,'2020-05-13 07:40:50','2020-05-13 07:40:50'),
	(46,13,25,3,'2020-05-13 07:50:27','2020-05-13 07:50:27'),
	(47,13,27,5,'2020-05-13 07:50:35','2020-05-13 07:50:35'),
	(48,13,34,1,'2020-05-13 07:50:55','2020-05-13 07:50:55'),
	(49,13,30,5,'2020-05-13 07:51:04','2020-05-13 07:51:04'),
	(50,13,37,5,'2020-05-13 07:51:32','2020-05-13 07:51:32'),
	(51,13,32,5,'2020-05-13 07:52:06','2020-05-13 07:52:06'),
	(52,13,23,1,'2020-05-13 07:52:14','2020-05-13 07:52:14'),
	(53,13,33,4,'2020-05-13 07:52:24','2020-05-13 07:52:24'),
	(54,13,28,5,'2020-05-13 07:52:35','2020-05-13 07:52:35'),
	(55,13,39,3,'2020-05-13 07:52:49','2020-05-13 07:52:49'),
	(56,13,26,1,'2020-05-13 07:53:06','2020-05-13 07:53:06'),
	(57,13,36,1,'2020-05-13 07:53:17','2020-05-13 07:53:17'),
	(58,13,31,1,'2020-05-13 07:53:37','2020-05-13 07:53:37'),
	(59,13,35,3,'2020-05-13 07:53:49','2020-05-13 07:53:49'),
	(60,13,29,3,'2020-05-13 07:54:02','2020-05-13 07:54:02'),
	(61,13,22,3,'2020-05-13 07:54:32','2020-05-13 07:54:32'),
	(62,41,25,3,'2020-05-13 07:55:44','2020-05-13 07:55:44'),
	(63,41,27,1,'2020-05-13 07:55:52','2020-05-13 07:55:52'),
	(64,41,34,1,'2020-05-13 07:56:11','2020-05-13 07:56:11'),
	(65,41,30,1,'2020-05-13 07:56:22','2020-05-13 07:56:22'),
	(66,41,37,1,'2020-05-13 07:56:38','2020-05-13 07:56:38'),
	(67,41,37,1,'2020-05-13 07:56:38','2020-05-13 07:56:38'),
	(68,41,32,1,'2020-05-13 07:56:51','2020-05-13 07:56:51'),
	(69,41,23,1,'2020-05-13 07:56:58','2020-05-13 07:56:58'),
	(70,41,33,1,'2020-05-13 07:57:47','2020-05-13 07:57:47'),
	(71,41,28,1,'2020-05-13 07:57:59','2020-05-13 07:57:59'),
	(72,41,39,3,'2020-05-13 07:58:15','2020-05-13 07:58:15'),
	(73,41,26,1,'2020-05-13 08:00:44','2020-05-13 08:00:44'),
	(74,41,36,1,'2020-05-13 08:01:01','2020-05-13 08:01:01'),
	(75,41,31,1,'2020-05-13 08:01:10','2020-05-13 08:01:10'),
	(76,41,35,1,'2020-05-13 08:01:20','2020-05-13 08:01:20'),
	(77,41,29,1,'2020-05-13 08:01:26','2020-05-13 08:01:26'),
	(78,41,22,3,'2020-05-13 08:01:32','2020-05-13 08:01:32'),
	(79,31,25,3,'2020-05-13 08:02:11','2020-05-13 08:02:11'),
	(80,31,27,1,'2020-05-13 08:02:18','2020-05-13 08:02:18'),
	(81,31,34,1,'2020-05-13 08:02:30','2020-05-13 08:02:30'),
	(82,31,30,3,'2020-05-13 08:03:14','2020-05-13 08:03:14'),
	(83,31,37,2,'2020-05-13 08:03:27','2020-05-13 08:03:27'),
	(84,31,32,1,'2020-05-13 08:03:35','2020-05-13 08:03:35'),
	(85,31,23,1,'2020-05-13 08:03:43','2020-05-13 08:03:43'),
	(86,31,33,2,'2020-05-13 08:03:49','2020-05-13 08:03:49'),
	(87,31,28,1,'2020-05-13 08:03:55','2020-05-13 08:03:55'),
	(88,31,39,2,'2020-05-13 08:04:03','2020-05-13 08:04:03'),
	(89,31,26,1,'2020-05-13 08:04:08','2020-05-13 08:04:08'),
	(90,31,36,1,'2020-05-13 08:04:25','2020-05-13 08:04:25'),
	(91,31,31,1,'2020-05-13 08:04:31','2020-05-13 08:04:31'),
	(92,31,35,1,'2020-05-13 08:04:38','2020-05-13 08:04:38'),
	(93,31,29,1,'2020-05-13 08:04:45','2020-05-13 08:04:45'),
	(94,31,22,2,'2020-05-13 08:04:53','2020-05-13 08:04:53'),
	(95,39,25,4,'2020-05-13 08:05:40','2020-05-13 08:05:40'),
	(96,39,27,2,'2020-05-13 08:05:47','2020-05-13 08:05:47'),
	(97,39,34,1,'2020-05-13 08:06:00','2020-05-13 08:06:00'),
	(98,39,30,2,'2020-05-13 08:06:14','2020-05-13 08:06:14'),
	(99,39,37,2,'2020-05-13 08:06:23','2020-05-13 08:06:23'),
	(100,39,32,2,'2020-05-13 08:06:34','2020-05-13 08:06:34'),
	(101,39,23,2,'2020-05-13 08:06:41','2020-05-13 08:06:41'),
	(102,39,33,2,'2020-05-13 08:07:23','2020-05-13 08:07:23'),
	(103,39,28,1,'2020-05-13 08:07:31','2020-05-13 08:07:31'),
	(104,39,39,2,'2020-05-13 08:07:40','2020-05-13 08:07:40'),
	(105,39,26,3,'2020-05-13 08:07:48','2020-05-13 08:07:48'),
	(106,39,36,2,'2020-05-13 08:07:55','2020-05-13 08:07:55'),
	(107,39,31,2,'2020-05-13 08:08:10','2020-05-13 08:08:10'),
	(108,39,35,2,'2020-05-13 08:08:19','2020-05-13 08:08:19'),
	(109,39,29,1,'2020-05-13 08:08:33','2020-05-13 08:08:33'),
	(110,39,22,2,'2020-05-13 08:08:41','2020-05-13 08:08:41'),
	(111,29,25,4,'2020-05-13 08:14:50','2020-05-13 08:14:50'),
	(112,29,27,2,'2020-05-13 08:14:58','2020-05-13 08:14:58'),
	(113,29,34,2,'2020-05-13 08:15:18','2020-05-13 08:15:18'),
	(114,29,30,1,'2020-05-13 08:15:25','2020-05-13 08:15:25'),
	(115,29,37,2,'2020-05-13 08:15:35','2020-05-13 08:15:35'),
	(116,29,32,2,'2020-05-13 08:15:46','2020-05-13 08:15:46'),
	(117,29,23,4,'2020-05-13 08:15:54','2020-05-13 08:15:54'),
	(118,29,33,2,'2020-05-13 08:16:02','2020-05-13 08:16:02'),
	(119,29,28,4,'2020-05-13 08:16:09','2020-05-13 08:16:09'),
	(120,29,39,5,'2020-05-13 08:16:14','2020-05-13 08:16:14'),
	(121,29,26,4,'2020-05-13 08:16:29','2020-05-13 08:16:29'),
	(122,29,36,1,'2020-05-13 08:16:38','2020-05-13 08:16:38'),
	(123,29,31,2,'2020-05-13 08:16:43','2020-05-13 08:16:43'),
	(124,29,35,1,'2020-05-13 08:16:49','2020-05-13 08:16:49'),
	(125,29,29,2,'2020-05-13 08:16:55','2020-05-13 08:16:55'),
	(126,29,22,2,'2020-05-13 08:17:00','2020-05-13 08:17:00'),
	(127,23,25,1,'2020-05-13 08:18:02','2020-05-13 08:18:02'),
	(128,23,27,4,'2020-05-13 08:18:21','2020-05-13 08:18:21'),
	(129,23,34,1,'2020-05-13 08:18:29','2020-05-13 08:18:29'),
	(130,23,30,3,'2020-05-13 08:18:35','2020-05-13 08:18:35'),
	(131,23,37,1,'2020-05-13 08:18:45','2020-05-13 08:18:45'),
	(132,23,32,2,'2020-05-13 08:18:51','2020-05-13 08:18:51'),
	(133,23,23,1,'2020-05-13 08:18:57','2020-05-13 08:18:57'),
	(134,23,33,5,'2020-05-13 08:19:03','2020-05-13 08:19:03'),
	(135,23,28,5,'2020-05-13 08:19:10','2020-05-13 08:19:10'),
	(136,23,39,1,'2020-05-13 08:19:17','2020-05-13 08:19:17'),
	(137,23,26,1,'2020-05-13 08:19:23','2020-05-13 08:19:23'),
	(138,23,36,1,'2020-05-13 08:19:29','2020-05-13 08:19:29'),
	(139,23,31,1,'2020-05-13 08:19:35','2020-05-13 08:19:35'),
	(140,23,35,1,'2020-05-13 08:19:42','2020-05-13 08:19:42'),
	(141,23,29,2,'2020-05-13 08:19:47','2020-05-13 08:19:47'),
	(142,23,22,1,'2020-05-13 08:19:53','2020-05-13 08:19:53'),
	(143,40,25,5,'2020-05-13 08:20:17','2020-05-13 08:20:17'),
	(144,40,27,3,'2020-05-13 08:20:24','2020-05-13 08:20:24'),
	(145,40,34,3,'2020-05-13 08:20:33','2020-05-13 08:20:33'),
	(146,40,30,1,'2020-05-13 08:20:39','2020-05-13 08:20:39'),
	(147,40,37,5,'2020-05-13 08:20:46','2020-05-13 08:20:46'),
	(148,40,32,3,'2020-05-13 08:20:51','2020-05-13 08:20:51'),
	(149,40,23,1,'2020-05-13 08:20:58','2020-05-13 08:20:58'),
	(150,40,33,1,'2020-05-13 08:21:05','2020-05-13 08:21:05'),
	(151,40,28,1,'2020-05-13 08:21:11','2020-05-13 08:21:11'),
	(152,40,39,5,'2020-05-13 08:21:19','2020-05-13 08:21:19'),
	(153,40,26,1,'2020-05-13 08:21:26','2020-05-13 08:21:26'),
	(154,40,36,1,'2020-05-13 08:21:32','2020-05-13 08:21:32'),
	(155,40,31,1,'2020-05-13 08:21:38','2020-05-13 08:21:38'),
	(156,40,35,1,'2020-05-13 08:21:45','2020-05-13 08:21:45'),
	(157,40,29,1,'2020-05-13 08:21:51','2020-05-13 08:21:51'),
	(158,40,22,3,'2020-05-13 08:21:58','2020-05-13 08:21:58'),
	(159,8,25,3,'2020-05-13 08:22:27','2020-05-13 08:22:27'),
	(160,8,27,3,'2020-05-13 08:22:34','2020-05-13 08:22:34'),
	(161,8,34,3,'2020-05-13 08:22:41','2020-05-13 08:22:41'),
	(162,8,30,3,'2020-05-13 08:22:51','2020-05-13 08:22:51'),
	(163,8,37,3,'2020-05-13 08:22:58','2020-05-13 08:22:58'),
	(165,8,23,1,'2020-05-13 08:23:12','2020-05-13 08:23:12'),
	(166,8,33,2,'2020-05-13 08:23:18','2020-05-13 08:23:18'),
	(167,8,28,2,'2020-05-13 08:23:24','2020-05-13 08:23:24'),
	(168,8,39,3,'2020-05-13 08:23:35','2020-05-13 08:23:35'),
	(169,8,26,1,'2020-05-13 08:23:44','2020-05-13 08:23:44'),
	(170,8,36,1,'2020-05-13 08:23:51','2020-05-13 08:23:51'),
	(171,8,31,1,'2020-05-13 08:23:59','2020-05-13 08:23:59'),
	(172,8,35,3,'2020-05-13 08:24:06','2020-05-13 08:24:06'),
	(173,8,29,1,'2020-05-13 08:24:15','2020-05-13 08:24:15'),
	(174,8,22,1,'2020-05-13 08:24:23','2020-05-13 08:24:23'),
	(175,35,25,3,'2020-05-13 08:24:50','2020-05-13 08:24:50'),
	(176,35,27,4,'2020-05-13 08:24:57','2020-05-13 08:24:57'),
	(177,35,34,1,'2020-05-13 08:25:10','2020-05-13 08:25:10'),
	(178,35,30,2,'2020-05-13 08:25:15','2020-05-13 08:25:15'),
	(179,35,37,2,'2020-05-13 08:25:25','2020-05-13 08:25:25'),
	(180,35,32,1,'2020-05-13 08:25:31','2020-05-13 08:25:31'),
	(181,35,23,4,'2020-05-13 08:25:40','2020-05-13 08:25:40'),
	(182,35,33,2,'2020-05-13 08:25:46','2020-05-13 08:25:46'),
	(183,35,28,2,'2020-05-13 08:25:51','2020-05-13 08:25:51'),
	(184,35,39,1,'2020-05-13 08:25:57','2020-05-13 08:25:57'),
	(185,35,26,4,'2020-05-13 08:26:04','2020-05-13 08:26:04'),
	(186,35,36,2,'2020-05-13 08:26:12','2020-05-13 08:26:12'),
	(187,35,31,2,'2020-05-13 08:26:18','2020-05-13 08:26:18'),
	(188,35,35,1,'2020-05-13 08:26:24','2020-05-13 08:26:24'),
	(189,35,29,2,'2020-05-13 08:26:30','2020-05-13 08:26:30'),
	(190,35,22,1,'2020-05-13 08:26:44','2020-05-13 08:26:44'),
	(191,38,25,5,'2020-05-13 08:28:00','2020-05-13 08:28:00'),
	(192,38,27,3,'2020-05-13 08:28:09','2020-05-13 08:28:09'),
	(193,38,34,2,'2020-05-13 08:28:28','2020-05-13 08:28:28'),
	(194,38,30,5,'2020-05-13 08:30:53','2020-05-13 08:30:53'),
	(195,38,37,4,'2020-05-13 08:31:00','2020-05-13 08:31:00'),
	(196,38,32,3,'2020-05-13 08:31:06','2020-05-13 08:31:06'),
	(197,38,23,2,'2020-05-13 08:31:14','2020-05-13 08:31:14'),
	(198,38,33,5,'2020-05-13 08:31:21','2020-05-13 08:31:21'),
	(199,38,28,5,'2020-05-13 08:31:26','2020-05-13 08:31:26'),
	(200,38,39,5,'2020-05-13 08:31:31','2020-05-13 08:31:31'),
	(201,38,26,1,'2020-05-13 08:31:37','2020-05-13 08:31:37'),
	(202,38,36,3,'2020-05-13 08:31:43','2020-05-13 08:31:43'),
	(203,38,31,4,'2020-05-13 08:31:52','2020-05-13 08:31:52'),
	(204,38,35,1,'2020-05-13 08:32:00','2020-05-13 08:32:00'),
	(205,38,29,2,'2020-05-13 08:32:06','2020-05-13 08:32:06'),
	(206,38,22,4,'2020-05-13 08:32:11','2020-05-13 08:32:11'),
	(207,42,25,5,'2020-05-13 08:32:39','2020-05-13 08:32:39'),
	(208,42,27,1,'2020-05-13 08:32:52','2020-05-13 08:32:52'),
	(209,42,34,1,'2020-05-13 08:33:02','2020-05-13 08:33:02'),
	(210,42,30,1,'2020-05-13 08:33:08','2020-05-13 08:33:08'),
	(211,42,37,3,'2020-05-13 08:33:15','2020-05-13 08:33:15'),
	(212,42,32,3,'2020-05-13 08:33:19','2020-05-13 08:33:19'),
	(213,42,23,1,'2020-05-13 08:33:26','2020-05-13 08:33:26'),
	(214,42,33,1,'2020-05-13 08:33:32','2020-05-13 08:33:32'),
	(215,42,28,1,'2020-05-13 08:33:37','2020-05-13 08:33:37'),
	(216,42,39,5,'2020-05-13 08:33:42','2020-05-13 08:33:42'),
	(217,42,26,1,'2020-05-13 08:33:47','2020-05-13 08:33:47'),
	(218,42,36,1,'2020-05-13 08:33:52','2020-05-13 08:33:52'),
	(219,42,31,1,'2020-05-13 08:33:58','2020-05-13 08:33:58'),
	(220,42,35,1,'2020-05-13 08:34:03','2020-05-13 08:34:03'),
	(221,42,29,1,'2020-05-13 08:34:12','2020-05-13 08:34:12'),
	(222,42,22,3,'2020-05-13 08:34:17','2020-05-13 08:34:17'),
	(223,42,22,3,'2020-05-13 08:34:18','2020-05-13 08:34:18'),
	(224,3,25,4,'2020-05-13 08:35:00','2020-05-13 08:35:00'),
	(225,3,34,1,'2020-05-13 08:35:22','2020-05-13 08:35:22'),
	(226,3,27,3,'2020-05-13 08:35:18','2020-05-13 08:35:18'),
	(227,3,30,3,'2020-05-13 08:35:40','2020-05-13 08:35:40'),
	(228,3,37,4,'2020-05-13 08:35:46','2020-05-13 08:35:46'),
	(229,3,32,1,'2020-05-13 08:35:51','2020-05-13 08:35:51'),
	(230,3,23,3,'2020-05-13 08:35:57','2020-05-13 08:35:57'),
	(231,3,33,1,'2020-05-13 08:36:03','2020-05-13 08:36:03'),
	(232,3,28,1,'2020-05-13 08:36:08','2020-05-13 08:36:08'),
	(233,3,39,3,'2020-05-13 08:36:14','2020-05-13 08:36:14'),
	(234,3,26,3,'2020-05-13 08:36:21','2020-05-13 08:36:21'),
	(235,3,36,1,'2020-05-13 08:36:26','2020-05-13 08:36:26'),
	(236,3,31,1,'2020-05-13 08:36:31','2020-05-13 08:36:31'),
	(237,3,35,3,'2020-05-13 08:36:38','2020-05-13 08:36:38'),
	(238,3,29,1,'2020-05-13 08:36:50','2020-05-13 08:36:50'),
	(239,3,22,1,'2020-05-13 08:36:56','2020-05-13 08:36:56'),
	(240,25,25,4,'2020-05-13 08:37:21','2020-05-13 08:37:21'),
	(241,25,27,5,'2020-05-13 08:37:31','2020-05-13 08:37:31'),
	(242,25,34,2,'2020-05-13 08:37:39','2020-05-13 08:37:39'),
	(243,25,30,4,'2020-05-13 08:37:45','2020-05-13 08:37:45'),
	(244,25,37,2,'2020-05-13 08:37:52','2020-05-13 08:37:52'),
	(245,25,32,4,'2020-05-13 08:37:57','2020-05-13 08:37:57'),
	(246,25,23,1,'2020-05-13 08:38:02','2020-05-13 08:38:02'),
	(247,25,33,5,'2020-05-13 08:38:07','2020-05-13 08:38:07'),
	(248,25,28,5,'2020-05-13 08:38:13','2020-05-13 08:38:13'),
	(249,25,39,2,'2020-05-13 08:38:20','2020-05-13 08:38:20'),
	(250,25,26,2,'2020-05-13 08:38:25','2020-05-13 08:38:25'),
	(251,25,36,4,'2020-05-13 08:38:31','2020-05-13 08:38:31'),
	(252,25,31,2,'2020-05-13 08:38:38','2020-05-13 08:38:38'),
	(253,25,35,2,'2020-05-13 08:38:46','2020-05-13 08:38:46'),
	(254,25,29,2,'2020-05-13 08:38:51','2020-05-13 08:38:51'),
	(255,25,22,4,'2020-05-13 08:38:59','2020-05-13 08:38:59'),
	(256,15,25,3,'2020-05-13 08:39:26','2020-05-13 08:39:26'),
	(257,15,27,2,'2020-05-13 08:39:33','2020-05-13 08:39:33'),
	(258,15,34,2,'2020-05-13 08:39:40','2020-05-13 08:39:40'),
	(259,15,30,3,'2020-05-13 08:39:54','2020-05-13 08:39:54'),
	(260,15,37,2,'2020-05-13 08:40:01','2020-05-13 08:40:01'),
	(261,15,32,3,'2020-05-13 08:40:07','2020-05-13 08:40:07'),
	(262,15,23,1,'2020-05-13 08:40:13','2020-05-13 08:40:13'),
	(263,15,33,2,'2020-05-13 08:40:19','2020-05-13 08:40:19'),
	(264,15,28,3,'2020-05-13 08:40:23','2020-05-13 08:40:23'),
	(265,15,39,3,'2020-05-13 08:40:32','2020-05-13 08:40:32'),
	(266,15,26,1,'2020-05-13 08:40:41','2020-05-13 08:40:41'),
	(267,15,36,1,'2020-05-13 08:40:55','2020-05-13 08:40:55'),
	(268,15,31,1,'2020-05-13 08:41:01','2020-05-13 08:41:01'),
	(269,15,35,2,'2020-05-13 08:41:09','2020-05-13 08:41:09'),
	(270,15,29,1,'2020-05-13 08:41:17','2020-05-13 08:41:17'),
	(271,15,22,2,'2020-05-13 08:41:23','2020-05-13 08:41:23'),
	(272,26,25,5,'2020-05-13 08:41:46','2020-05-13 08:41:46'),
	(273,26,27,2,'2020-05-13 08:41:53','2020-05-13 08:41:53'),
	(274,26,34,2,'2020-05-13 08:41:59','2020-05-13 08:41:59'),
	(275,26,30,2,'2020-05-13 08:42:05','2020-05-13 08:42:05'),
	(276,26,37,2,'2020-05-13 08:42:12','2020-05-13 08:42:12'),
	(277,26,32,4,'2020-05-13 08:42:18','2020-05-13 08:42:18'),
	(278,26,23,2,'2020-05-13 08:42:24','2020-05-13 08:42:24'),
	(279,26,33,1,'2020-05-13 08:42:30','2020-05-13 08:42:30'),
	(280,26,28,1,'2020-05-13 08:42:36','2020-05-13 08:42:36'),
	(281,26,39,5,'2020-05-13 08:42:44','2020-05-13 08:42:44'),
	(282,26,26,4,'2020-05-13 08:42:57','2020-05-13 08:42:57'),
	(283,26,36,1,'2020-05-13 08:43:04','2020-05-13 08:43:04'),
	(284,26,31,2,'2020-05-13 08:43:08','2020-05-13 08:43:08'),
	(285,26,35,1,'2020-05-13 08:43:16','2020-05-13 08:43:16'),
	(286,26,35,1,'2020-05-13 08:43:16','2020-05-13 08:43:16'),
	(287,26,29,2,'2020-05-13 08:43:25','2020-05-13 08:43:25'),
	(288,26,22,4,'2020-05-13 08:43:31','2020-05-13 08:43:31'),
	(289,34,25,3,'2020-05-13 08:43:59','2020-05-13 08:43:59'),
	(290,34,27,4,'2020-05-13 08:44:09','2020-05-13 08:44:09'),
	(291,34,34,1,'2020-05-13 08:44:14','2020-05-13 08:44:14'),
	(292,34,30,4,'2020-05-13 08:44:18','2020-05-13 08:44:18'),
	(293,34,37,1,'2020-05-13 08:44:34','2020-05-13 08:44:34'),
	(294,34,32,1,'2020-05-13 08:44:41','2020-05-13 08:44:41'),
	(295,34,23,4,'2020-05-13 08:44:49','2020-05-13 08:44:49'),
	(296,34,33,2,'2020-05-13 08:44:57','2020-05-13 08:44:57'),
	(297,34,28,2,'2020-05-13 08:45:01','2020-05-13 08:45:01'),
	(298,34,39,1,'2020-05-13 08:45:07','2020-05-13 08:45:07'),
	(299,34,26,4,'2020-05-13 08:45:13','2020-05-13 08:45:13'),
	(300,34,36,2,'2020-05-13 08:45:20','2020-05-13 08:45:20'),
	(301,34,31,2,'2020-05-13 08:45:26','2020-05-13 08:45:26'),
	(302,34,35,1,'2020-05-13 08:45:32','2020-05-13 08:45:32'),
	(303,34,29,2,'2020-05-13 08:45:37','2020-05-13 08:45:37'),
	(304,34,22,1,'2020-05-13 08:45:44','2020-05-13 08:45:44'),
	(305,4,25,4,'2020-05-13 08:46:06','2020-05-13 08:46:06'),
	(306,4,27,3,'2020-05-13 08:46:18','2020-05-13 08:46:18'),
	(307,4,34,1,'2020-05-13 08:46:34','2020-05-13 08:46:34'),
	(308,4,30,4,'2020-05-13 08:46:41','2020-05-13 08:46:41'),
	(309,4,37,3,'2020-05-13 08:46:50','2020-05-13 08:46:50'),
	(310,4,32,5,'2020-05-13 08:47:00','2020-05-13 08:47:00'),
	(311,4,23,2,'2020-05-13 08:47:08','2020-05-13 08:47:08'),
	(312,4,33,3,'2020-05-13 08:47:17','2020-05-13 08:47:17'),
	(313,4,28,1,'2020-05-13 08:47:24','2020-05-13 08:47:24'),
	(314,4,39,3,'2020-05-13 08:47:31','2020-05-13 08:47:31'),
	(315,4,26,1,'2020-05-13 08:47:41','2020-05-13 08:47:41'),
	(316,4,36,1,'2020-05-13 08:47:46','2020-05-13 08:47:46'),
	(317,4,31,2,'2020-05-13 08:47:57','2020-05-13 08:47:57'),
	(318,4,35,1,'2020-05-13 08:48:04','2020-05-13 08:48:04'),
	(319,4,29,2,'2020-05-13 08:48:13','2020-05-13 08:48:13'),
	(320,4,22,2,'2020-05-13 08:48:17','2020-05-13 08:48:17'),
	(321,21,25,4,'2020-05-13 08:48:41','2020-05-13 08:48:41'),
	(322,21,27,3,'2020-05-13 08:48:49','2020-05-13 08:48:49'),
	(323,21,34,1,'2020-05-13 08:48:54','2020-05-13 08:48:54'),
	(324,21,30,4,'2020-05-13 08:49:02','2020-05-13 08:49:02'),
	(325,21,37,3,'2020-05-13 08:49:14','2020-05-13 08:49:14'),
	(326,21,32,2,'2020-05-13 08:49:20','2020-05-13 08:49:20'),
	(327,21,23,2,'2020-05-13 08:49:26','2020-05-13 08:49:26'),
	(328,21,33,3,'2020-05-13 08:49:32','2020-05-13 08:49:32'),
	(329,21,28,1,'2020-05-13 08:49:38','2020-05-13 08:49:38'),
	(330,21,39,2,'2020-05-13 08:49:49','2020-05-13 08:49:49'),
	(331,21,26,2,'2020-05-13 08:49:54','2020-05-13 08:49:54'),
	(332,21,36,2,'2020-05-13 08:50:00','2020-05-13 08:50:00'),
	(333,21,31,1,'2020-05-13 08:50:05','2020-05-13 08:50:05'),
	(334,21,35,1,'2020-05-13 08:50:10','2020-05-13 08:50:10'),
	(335,21,29,2,'2020-05-13 08:50:20','2020-05-13 08:50:20'),
	(336,21,22,1,'2020-05-13 08:50:25','2020-05-13 08:50:25'),
	(337,5,25,4,'2020-05-13 08:50:49','2020-05-13 08:50:49'),
	(338,5,27,3,'2020-05-13 08:50:56','2020-05-13 08:50:56'),
	(339,5,34,1,'2020-05-13 08:51:05','2020-05-13 08:51:05'),
	(340,5,30,4,'2020-05-13 08:51:11','2020-05-13 08:51:11'),
	(341,5,37,4,'2020-05-13 08:51:22','2020-05-13 08:51:22'),
	(342,5,32,3,'2020-05-13 08:51:27','2020-05-13 08:51:27'),
	(343,5,23,1,'2020-05-13 08:51:38','2020-05-13 08:51:38'),
	(344,5,33,5,'2020-05-13 08:51:44','2020-05-13 08:51:44'),
	(345,5,28,4,'2020-05-13 08:51:49','2020-05-13 08:51:49'),
	(346,5,39,2,'2020-05-13 08:51:55','2020-05-13 08:51:55'),
	(347,5,26,1,'2020-05-13 08:52:13','2020-05-13 08:52:13'),
	(348,5,36,2,'2020-05-13 08:52:18','2020-05-13 08:52:18'),
	(349,5,31,1,'2020-05-13 08:52:26','2020-05-13 08:52:26'),
	(350,5,35,1,'2020-05-13 08:52:32','2020-05-13 08:52:32'),
	(351,5,29,5,'2020-05-13 08:52:39','2020-05-13 08:52:39'),
	(352,5,22,1,'2020-05-13 08:52:44','2020-05-13 08:52:44'),
	(353,33,25,2,'2020-05-13 08:53:13','2020-05-13 08:53:13'),
	(354,33,27,4,'2020-05-13 08:53:21','2020-05-13 08:53:21'),
	(355,33,34,1,'2020-05-13 08:53:27','2020-05-13 08:53:27'),
	(356,33,30,4,'2020-05-13 08:53:33','2020-05-13 08:53:33'),
	(357,33,37,3,'2020-05-13 08:53:42','2020-05-13 08:53:42'),
	(358,33,32,3,'2020-05-13 08:53:47','2020-05-13 08:53:47'),
	(359,33,23,1,'2020-05-13 08:53:54','2020-05-13 08:53:54'),
	(360,33,33,2,'2020-05-13 08:53:59','2020-05-13 08:53:59'),
	(361,33,28,3,'2020-05-13 08:54:05','2020-05-13 08:54:05'),
	(362,33,39,2,'2020-05-13 08:54:19','2020-05-13 08:54:19'),
	(363,33,26,1,'2020-05-13 08:54:29','2020-05-13 08:54:29'),
	(364,33,36,1,'2020-05-13 08:54:34','2020-05-13 08:54:34'),
	(365,33,31,1,'2020-05-13 08:54:42','2020-05-13 08:54:42'),
	(366,33,35,1,'2020-05-13 08:54:47','2020-05-13 08:54:47'),
	(367,33,29,1,'2020-05-13 08:54:55','2020-05-13 08:54:55'),
	(368,33,22,1,'2020-05-13 08:54:59','2020-05-13 08:54:59'),
	(369,30,25,2,'2020-05-13 08:55:38','2020-05-13 08:55:38'),
	(370,30,27,1,'2020-05-13 08:55:45','2020-05-13 08:55:45'),
	(371,30,34,2,'2020-05-13 08:55:51','2020-05-13 08:55:51'),
	(372,30,30,1,'2020-05-13 08:56:03','2020-05-13 08:56:03'),
	(373,30,37,2,'2020-05-13 08:56:11','2020-05-13 08:56:11'),
	(374,30,32,1,'2020-05-13 08:56:16','2020-05-13 08:56:16'),
	(375,30,23,4,'2020-05-13 08:56:23','2020-05-13 08:56:23'),
	(376,30,33,2,'2020-05-13 08:56:29','2020-05-13 08:56:29'),
	(377,30,28,4,'2020-05-13 08:56:38','2020-05-13 08:56:38'),
	(378,30,39,4,'2020-05-13 08:56:44','2020-05-13 08:56:44'),
	(379,30,26,4,'2020-05-13 08:56:50','2020-05-13 08:56:50'),
	(380,30,26,4,'2020-05-13 08:56:51','2020-05-13 08:56:51'),
	(381,30,36,2,'2020-05-13 08:56:56','2020-05-13 08:56:56'),
	(382,30,31,4,'2020-05-13 08:57:04','2020-05-13 08:57:04'),
	(383,30,35,4,'2020-05-13 08:57:11','2020-05-13 08:57:11'),
	(384,30,29,1,'2020-05-13 08:57:19','2020-05-13 08:57:19'),
	(385,30,22,4,'2020-05-13 08:57:24','2020-05-13 08:57:24'),
	(386,24,25,3,'2020-05-13 08:57:50','2020-05-13 08:57:50'),
	(387,24,27,2,'2020-05-13 08:57:55','2020-05-13 08:57:55'),
	(388,24,34,1,'2020-05-13 08:58:02','2020-05-13 08:58:02'),
	(389,24,30,2,'2020-05-13 08:58:10','2020-05-13 08:58:10'),
	(390,24,37,4,'2020-05-13 08:58:17','2020-05-13 08:58:17'),
	(391,24,32,1,'2020-05-13 08:58:21','2020-05-13 08:58:21'),
	(392,24,23,1,'2020-05-13 08:58:27','2020-05-13 08:58:27'),
	(393,24,33,4,'2020-05-13 08:58:33','2020-05-13 08:58:33'),
	(394,24,28,3,'2020-05-13 08:58:39','2020-05-13 08:58:39'),
	(395,24,39,1,'2020-05-13 08:58:45','2020-05-13 08:58:45'),
	(396,24,26,1,'2020-05-13 08:58:50','2020-05-13 08:58:50'),
	(397,24,36,1,'2020-05-13 08:58:55','2020-05-13 08:58:55'),
	(398,24,31,1,'2020-05-13 08:59:00','2020-05-13 08:59:00'),
	(399,24,35,1,'2020-05-13 08:59:05','2020-05-13 08:59:05'),
	(400,24,29,1,'2020-05-13 08:59:12','2020-05-13 08:59:12'),
	(401,24,22,1,'2020-05-13 08:59:16','2020-05-13 08:59:16'),
	(402,37,25,3,'2020-05-13 09:06:27','2020-05-13 09:06:27'),
	(403,37,27,1,'2020-05-13 09:06:31','2020-05-13 09:06:31'),
	(404,37,34,1,'2020-05-13 09:06:38','2020-05-13 09:06:38'),
	(405,37,30,1,'2020-05-13 09:06:43','2020-05-13 09:06:43'),
	(406,37,37,2,'2020-05-13 09:06:52','2020-05-13 09:06:52'),
	(407,37,32,1,'2020-05-13 09:06:58','2020-05-13 09:06:58'),
	(408,37,23,1,'2020-05-13 09:07:03','2020-05-13 09:07:03'),
	(409,37,33,1,'2020-05-13 09:07:08','2020-05-13 09:07:08'),
	(410,37,28,1,'2020-05-13 09:07:13','2020-05-13 09:07:13'),
	(411,37,39,3,'2020-05-13 09:07:20','2020-05-13 09:07:20'),
	(412,37,26,1,'2020-05-13 09:10:00','2020-05-13 09:10:00'),
	(413,37,36,1,'2020-05-13 09:10:04','2020-05-13 09:10:04'),
	(414,37,31,1,'2020-05-13 09:10:13','2020-05-13 09:10:13'),
	(415,37,35,1,'2020-05-13 09:10:18','2020-05-13 09:10:18'),
	(416,37,29,2,'2020-05-13 09:10:25','2020-05-13 09:10:25'),
	(417,37,22,2,'2020-05-13 09:10:29','2020-05-13 09:10:29'),
	(418,17,25,2,'2020-05-13 09:11:15','2020-05-13 09:11:15'),
	(419,17,27,2,'2020-05-13 09:11:20','2020-05-13 09:11:20'),
	(420,17,34,1,'2020-05-13 09:11:25','2020-05-13 09:11:25'),
	(421,17,30,4,'2020-05-13 09:12:10','2020-05-13 09:12:10'),
	(422,17,37,4,'2020-05-13 09:12:20','2020-05-13 09:12:20'),
	(423,17,32,4,'2020-05-13 09:13:52','2020-05-13 09:13:52'),
	(424,17,23,1,'2020-05-13 09:13:59','2020-05-13 09:13:59'),
	(425,17,33,5,'2020-05-13 09:14:04','2020-05-13 09:14:04'),
	(426,17,28,5,'2020-05-13 09:14:08','2020-05-13 09:14:08'),
	(427,17,39,1,'2020-05-13 09:14:14','2020-05-13 09:14:14'),
	(428,17,26,1,'2020-05-13 09:14:19','2020-05-13 09:14:19'),
	(429,17,36,2,'2020-05-13 09:14:26','2020-05-13 09:14:26'),
	(430,17,31,1,'2020-05-13 09:14:30','2020-05-13 09:14:30'),
	(431,17,35,1,'2020-05-13 09:14:35','2020-05-13 09:14:35'),
	(432,17,29,3,'2020-05-13 09:14:39','2020-05-13 09:14:39'),
	(433,17,22,1,'2020-05-13 09:14:43','2020-05-13 09:14:43'),
	(434,6,25,4,'2020-05-13 09:15:57','2020-05-13 09:15:57'),
	(435,6,27,5,'2020-05-13 09:16:02','2020-05-13 09:16:02'),
	(436,6,34,1,'2020-05-13 09:16:07','2020-05-13 09:16:07'),
	(437,6,30,5,'2020-05-13 09:16:14','2020-05-13 09:16:14'),
	(438,6,37,2,'2020-05-13 09:16:22','2020-05-13 09:16:22'),
	(439,6,32,2,'2020-05-13 09:16:27','2020-05-13 09:16:27'),
	(440,6,23,2,'2020-05-13 09:16:32','2020-05-13 09:16:32'),
	(441,6,33,3,'2020-05-13 09:16:39','2020-05-13 09:16:39'),
	(442,6,28,3,'2020-05-13 09:16:43','2020-05-13 09:16:43'),
	(443,6,39,1,'2020-05-13 09:17:10','2020-05-13 09:17:10'),
	(444,6,26,2,'2020-05-13 09:17:14','2020-05-13 09:17:14'),
	(445,6,36,2,'2020-05-13 09:17:20','2020-05-13 09:17:20'),
	(446,6,31,3,'2020-05-13 09:17:25','2020-05-13 09:17:25'),
	(447,6,35,1,'2020-05-13 09:17:30','2020-05-13 09:17:30'),
	(448,6,29,3,'2020-05-13 09:17:34','2020-05-13 09:17:34'),
	(449,6,22,2,'2020-05-13 09:17:39','2020-05-13 09:17:39'),
	(450,22,25,3,'2020-05-13 09:17:59','2020-05-13 09:17:59'),
	(451,22,27,5,'2020-05-13 09:18:04','2020-05-13 09:18:04'),
	(452,22,34,1,'2020-05-13 09:18:10','2020-05-13 09:18:10'),
	(453,22,30,5,'2020-05-13 09:18:19','2020-05-13 09:18:19'),
	(454,22,37,1,'2020-05-13 09:18:50','2020-05-13 09:18:50'),
	(455,22,32,2,'2020-05-13 09:18:55','2020-05-13 09:18:55'),
	(456,22,23,1,'2020-05-13 09:19:01','2020-05-13 09:19:01'),
	(457,22,33,5,'2020-05-13 09:19:06','2020-05-13 09:19:06'),
	(458,22,28,5,'2020-05-13 09:19:11','2020-05-13 09:19:11'),
	(459,22,39,1,'2020-05-13 09:19:17','2020-05-13 09:19:17'),
	(460,22,26,1,'2020-05-13 09:19:25','2020-05-13 09:19:25'),
	(461,22,36,1,'2020-05-13 09:19:33','2020-05-13 09:19:33'),
	(462,22,31,3,'2020-05-13 09:19:41','2020-05-13 09:19:41'),
	(463,22,35,1,'2020-05-13 09:19:47','2020-05-13 09:19:47'),
	(464,22,29,3,'2020-05-13 09:19:54','2020-05-13 09:19:54'),
	(465,22,22,1,'2020-05-13 09:19:58','2020-05-13 09:19:58'),
	(466,14,25,3,'2020-05-13 09:21:03','2020-05-13 09:21:03'),
	(467,14,27,3,'2020-05-13 09:21:09','2020-05-13 09:21:09'),
	(468,14,34,2,'2020-05-13 09:21:14','2020-05-13 09:21:14'),
	(469,14,30,2,'2020-05-13 09:21:19','2020-05-13 09:21:19'),
	(470,14,37,2,'2020-05-13 09:21:25','2020-05-13 09:21:25'),
	(471,14,32,3,'2020-05-13 09:21:32','2020-05-13 09:21:32'),
	(472,14,23,1,'2020-05-13 09:21:38','2020-05-13 09:21:38'),
	(473,14,33,1,'2020-05-13 09:21:43','2020-05-13 09:21:43'),
	(474,14,28,2,'2020-05-13 09:21:47','2020-05-13 09:21:47'),
	(475,14,39,2,'2020-05-13 09:21:52','2020-05-13 09:21:52'),
	(476,14,26,1,'2020-05-13 09:22:00','2020-05-13 09:22:00'),
	(477,14,36,2,'2020-05-13 09:22:04','2020-05-13 09:22:04'),
	(478,14,31,1,'2020-05-13 09:22:09','2020-05-13 09:22:09'),
	(479,14,35,1,'2020-05-13 09:22:15','2020-05-13 09:22:15'),
	(480,14,29,1,'2020-05-13 09:22:20','2020-05-13 09:22:20'),
	(481,14,22,1,'2020-05-13 09:22:27','2020-05-13 09:22:27'),
	(482,36,25,4,'2020-05-13 09:24:01','2020-05-13 09:24:01'),
	(483,36,27,2,'2020-05-13 09:24:05','2020-05-13 09:24:05'),
	(484,36,34,1,'2020-05-13 09:24:11','2020-05-13 09:24:11'),
	(485,36,30,2,'2020-05-13 09:24:26','2020-05-13 09:24:26'),
	(486,36,37,1,'2020-05-13 09:26:26','2020-05-13 09:26:26'),
	(487,36,32,1,'2020-05-13 09:26:31','2020-05-13 09:26:31'),
	(488,36,23,4,'2020-05-13 09:26:38','2020-05-13 09:26:38'),
	(489,36,33,2,'2020-05-13 09:26:43','2020-05-13 09:26:43'),
	(490,36,28,2,'2020-05-13 09:26:49','2020-05-13 09:26:49'),
	(491,36,39,1,'2020-05-13 09:26:55','2020-05-13 09:26:55'),
	(492,36,26,4,'2020-05-13 09:27:02','2020-05-13 09:27:02'),
	(493,36,36,2,'2020-05-13 09:27:09','2020-05-13 09:27:09'),
	(494,36,31,2,'2020-05-13 09:27:14','2020-05-13 09:27:14'),
	(495,36,35,1,'2020-05-13 09:27:19','2020-05-13 09:27:19'),
	(496,36,29,2,'2020-05-13 09:27:27','2020-05-13 09:27:27'),
	(497,36,22,1,'2020-05-13 09:27:33','2020-05-13 09:27:33'),
	(498,27,25,2,'2020-05-13 09:28:12','2020-05-13 09:28:12'),
	(499,27,27,2,'2020-05-13 09:28:30','2020-05-13 09:28:30'),
	(500,27,34,1,'2020-05-13 09:28:36','2020-05-13 09:28:36'),
	(501,27,30,1,'2020-05-13 09:28:41','2020-05-13 09:28:41'),
	(502,27,37,1,'2020-05-13 09:28:54','2020-05-13 09:28:54'),
	(503,27,32,2,'2020-05-13 09:29:01','2020-05-13 09:29:01'),
	(504,27,23,2,'2020-05-13 09:29:06','2020-05-13 09:29:06'),
	(505,27,33,2,'2020-05-13 09:29:13','2020-05-13 09:29:13'),
	(506,27,28,1,'2020-05-13 09:29:17','2020-05-13 09:29:17'),
	(507,27,39,1,'2020-05-13 09:29:28','2020-05-13 09:29:28'),
	(508,27,26,2,'2020-05-13 09:29:33','2020-05-13 09:29:33'),
	(509,27,36,1,'2020-05-13 09:29:38','2020-05-13 09:29:38'),
	(510,27,31,2,'2020-05-13 09:29:42','2020-05-13 09:29:42'),
	(511,27,35,1,'2020-05-13 09:29:47','2020-05-13 09:29:47'),
	(512,27,29,4,'2020-05-13 09:29:53','2020-05-13 09:29:53'),
	(513,27,22,1,'2020-05-13 09:29:57','2020-05-13 09:29:57'),
	(514,32,25,2,'2020-05-13 09:30:27','2020-05-13 09:30:27'),
	(515,32,27,5,'2020-05-13 09:30:33','2020-05-13 09:30:33'),
	(516,32,34,1,'2020-05-13 09:30:40','2020-05-13 09:30:40'),
	(517,32,30,5,'2020-05-13 09:30:46','2020-05-13 09:30:46'),
	(518,32,37,1,'2020-05-13 09:30:56','2020-05-13 09:30:56'),
	(519,32,32,1,'2020-05-13 09:31:01','2020-05-13 09:31:01'),
	(520,32,23,2,'2020-05-13 09:31:05','2020-05-13 09:31:05'),
	(521,32,33,2,'2020-05-13 09:31:13','2020-05-13 09:31:13'),
	(522,32,28,2,'2020-05-13 09:31:18','2020-05-13 09:31:18'),
	(523,32,39,1,'2020-05-13 09:31:25','2020-05-13 09:31:25'),
	(524,32,26,1,'2020-05-13 09:31:30','2020-05-13 09:31:30'),
	(525,32,36,1,'2020-05-13 09:31:34','2020-05-13 09:31:34'),
	(526,32,31,2,'2020-05-13 09:31:41','2020-05-13 09:31:41'),
	(527,32,35,1,'2020-05-13 09:31:45','2020-05-13 09:31:45'),
	(528,32,29,1,'2020-05-13 09:31:58','2020-05-13 09:31:58'),
	(529,32,22,1,'2020-05-13 09:32:12','2020-05-13 09:32:12'),
	(530,7,25,5,'2020-05-13 09:32:36','2020-05-13 09:32:36'),
	(531,7,27,4,'2020-05-13 09:32:44','2020-05-13 09:32:44'),
	(532,7,34,1,'2020-05-13 09:32:50','2020-05-13 09:32:50'),
	(533,7,30,3,'2020-05-13 09:33:00','2020-05-13 09:33:00'),
	(534,7,37,2,'2020-05-13 09:33:07','2020-05-13 09:33:07'),
	(535,7,32,2,'2020-05-13 09:33:11','2020-05-13 09:33:11'),
	(536,7,23,2,'2020-05-13 09:33:15','2020-05-13 09:33:15'),
	(537,7,33,4,'2020-05-13 09:33:20','2020-05-13 09:33:20'),
	(538,7,28,3,'2020-05-13 09:33:25','2020-05-13 09:33:25'),
	(539,7,39,1,'2020-05-13 09:33:31','2020-05-13 09:33:31'),
	(540,7,26,2,'2020-05-13 09:33:36','2020-05-13 09:33:36'),
	(541,7,36,1,'2020-05-13 09:33:40','2020-05-13 09:33:40'),
	(542,7,31,2,'2020-05-13 09:33:45','2020-05-13 09:33:45'),
	(543,7,35,1,'2020-05-13 09:33:50','2020-05-13 09:33:50'),
	(544,7,29,2,'2020-05-13 09:33:59','2020-05-13 09:33:59'),
	(545,7,22,1,'2020-05-13 09:34:04','2020-05-13 09:34:04'),
	(546,19,25,3,'2020-05-13 09:34:29','2020-05-13 09:34:29'),
	(547,19,27,5,'2020-05-13 09:34:32','2020-05-13 09:34:32'),
	(548,19,34,1,'2020-05-13 09:34:38','2020-05-13 09:34:38'),
	(549,19,30,5,'2020-05-13 09:34:47','2020-05-13 09:34:47'),
	(550,19,37,3,'2020-05-13 09:34:56','2020-05-13 09:34:56'),
	(551,19,32,3,'2020-05-13 09:35:02','2020-05-13 09:35:02'),
	(552,19,23,1,'2020-05-13 09:35:08','2020-05-13 09:35:08'),
	(553,19,33,5,'2020-05-13 09:35:12','2020-05-13 09:35:12'),
	(554,19,28,5,'2020-05-13 09:35:20','2020-05-13 09:35:20'),
	(555,19,39,3,'2020-05-13 09:35:26','2020-05-13 09:35:26'),
	(556,19,26,1,'2020-05-13 09:35:32','2020-05-13 09:35:32'),
	(557,19,36,3,'2020-05-13 09:35:36','2020-05-13 09:35:36'),
	(558,19,31,1,'2020-05-13 09:35:43','2020-05-13 09:35:43'),
	(559,19,35,1,'2020-05-13 09:35:51','2020-05-13 09:35:51'),
	(560,19,29,2,'2020-05-13 09:35:57','2020-05-13 09:35:57'),
	(561,19,22,2,'2020-05-13 09:36:02','2020-05-13 09:36:02'),
	(562,18,25,3,'2020-05-13 09:36:23','2020-05-13 09:36:23'),
	(563,18,27,4,'2020-05-13 09:36:28','2020-05-13 09:36:28'),
	(564,18,34,1,'2020-05-13 09:36:33','2020-05-13 09:36:33'),
	(565,18,30,5,'2020-05-13 09:36:38','2020-05-13 09:36:38'),
	(566,18,37,2,'2020-05-13 09:36:44','2020-05-13 09:36:44'),
	(567,18,32,1,'2020-05-13 09:36:49','2020-05-13 09:36:49'),
	(568,18,23,1,'2020-05-13 09:36:55','2020-05-13 09:36:55'),
	(569,18,33,5,'2020-05-13 09:37:00','2020-05-13 09:37:00'),
	(570,18,28,5,'2020-05-13 09:37:05','2020-05-13 09:37:05'),
	(571,18,39,1,'2020-05-13 09:37:10','2020-05-13 09:37:10'),
	(572,18,26,1,'2020-05-13 09:37:15','2020-05-13 09:37:15'),
	(573,18,36,1,'2020-05-13 09:37:20','2020-05-13 09:37:20'),
	(574,18,31,1,'2020-05-13 09:37:26','2020-05-13 09:37:26'),
	(575,18,31,1,'2020-05-13 09:37:26','2020-05-13 09:37:26'),
	(576,18,31,1,'2020-05-13 09:37:27','2020-05-13 09:37:27'),
	(577,18,35,1,'2020-05-13 09:37:35','2020-05-13 09:37:35'),
	(578,18,29,1,'2020-05-13 09:37:42','2020-05-13 09:37:42'),
	(579,18,22,1,'2020-05-13 09:37:48','2020-05-13 09:37:48'),
	(580,2,25,4,'2020-05-13 09:38:10','2020-05-13 09:38:10'),
	(581,2,27,5,'2020-05-13 09:38:16','2020-05-13 09:38:16'),
	(582,2,34,1,'2020-05-13 09:38:21','2020-05-13 09:38:21'),
	(583,2,30,5,'2020-05-13 09:38:28','2020-05-13 09:38:28'),
	(584,2,37,3,'2020-05-13 09:38:35','2020-05-13 09:38:35'),
	(585,2,32,3,'2020-05-13 09:38:43','2020-05-13 09:38:43'),
	(586,2,23,2,'2020-05-13 09:38:50','2020-05-13 09:38:50'),
	(587,2,33,5,'2020-05-13 09:38:56','2020-05-13 09:38:56'),
	(588,2,28,3,'2020-05-13 09:39:01','2020-05-13 09:39:01'),
	(589,2,39,4,'2020-05-13 09:39:08','2020-05-13 09:39:08'),
	(590,2,26,1,'2020-05-13 09:39:13','2020-05-13 09:39:13'),
	(591,2,36,2,'2020-05-13 09:39:20','2020-05-13 09:39:20'),
	(592,2,31,1,'2020-05-13 09:39:25','2020-05-13 09:39:25'),
	(593,2,35,1,'2020-05-13 09:39:31','2020-05-13 09:39:31'),
	(594,2,29,1,'2020-05-13 09:39:37','2020-05-13 09:39:37'),
	(595,2,22,4,'2020-05-13 09:39:47','2020-05-13 09:39:47'),
	(596,43,25,3,'2020-05-13 09:40:14','2020-05-13 09:40:14'),
	(597,43,27,1,'2020-05-13 09:40:20','2020-05-13 09:40:20'),
	(598,43,34,3,'2020-05-13 09:40:27','2020-05-13 09:40:27'),
	(599,43,30,1,'2020-05-13 09:40:32','2020-05-13 09:40:32'),
	(600,43,37,1,'2020-05-13 09:40:38','2020-05-13 09:40:38'),
	(601,43,32,1,'2020-05-13 09:40:45','2020-05-13 09:40:45'),
	(602,43,33,1,'2020-05-13 09:41:01','2020-05-13 09:41:01'),
	(603,43,28,1,'2020-05-13 09:41:05','2020-05-13 09:41:05'),
	(604,43,39,3,'2020-05-13 09:41:11','2020-05-13 09:41:11'),
	(605,43,26,3,'2020-05-13 09:41:17','2020-05-13 09:41:17'),
	(606,43,36,1,'2020-05-13 09:41:22','2020-05-13 09:41:22'),
	(607,43,31,3,'2020-05-13 09:41:29','2020-05-13 09:41:29'),
	(608,43,35,3,'2020-05-13 09:41:34','2020-05-13 09:41:34'),
	(609,43,29,1,'2020-05-13 09:41:41','2020-05-13 09:41:41'),
	(610,28,24,4,'2020-05-23 08:56:39','2020-05-23 08:56:39'),
	(611,16,24,2,'2020-05-23 08:56:39','2020-05-23 08:56:39'),
	(612,13,24,2,'2020-05-23 08:56:39','2020-05-23 08:56:39'),
	(613,41,24,5,'2020-05-23 08:56:39','2020-05-23 08:56:39'),
	(614,31,24,3,'2020-05-23 08:56:39','2020-05-23 08:56:39'),
	(615,39,24,4,'2020-05-23 08:56:39','2020-05-23 08:56:39'),
	(616,29,24,5,'2020-05-23 08:56:39','2020-05-23 08:56:39'),
	(617,23,24,3,'2020-05-23 08:56:39','2020-05-23 08:56:39'),
	(618,40,24,4,'2020-05-23 08:56:39','2020-05-23 08:56:39'),
	(619,8,24,4,'2020-05-23 08:56:39','2020-05-23 08:56:39'),
	(620,35,24,3,'2020-05-23 08:56:39','2020-05-23 08:56:39'),
	(621,38,24,4,'2020-05-23 08:56:39','2020-05-23 08:56:39'),
	(622,42,24,4,'2020-05-23 08:56:39','2020-05-23 08:56:39'),
	(623,3,24,4,'2020-05-23 08:56:39','2020-05-23 08:56:39'),
	(624,25,24,4,'2020-05-23 08:56:39','2020-05-23 08:56:39'),
	(625,15,24,3,'2020-05-23 08:56:39','2020-05-23 08:56:39'),
	(626,26,24,4,'2020-05-23 08:56:39','2020-05-23 08:56:39'),
	(627,34,24,3,'2020-05-23 08:56:39','2020-05-23 08:56:39'),
	(628,4,24,3,'2020-05-23 08:56:39','2020-05-23 08:56:39'),
	(629,21,24,4,'2020-05-23 08:56:39','2020-05-23 08:56:39'),
	(630,5,24,1,'2020-05-23 08:56:39','2020-05-23 08:56:39'),
	(631,33,24,3,'2020-05-23 08:56:39','2020-05-23 08:56:39'),
	(632,30,24,5,'2020-05-23 08:56:39','2020-05-23 08:56:39'),
	(633,24,24,4,'2020-05-23 08:56:39','2020-05-23 08:56:39'),
	(634,37,24,4,'2020-05-23 08:56:39','2020-05-23 08:56:39'),
	(635,17,24,2,'2020-05-23 08:56:39','2020-05-23 08:56:39'),
	(636,6,24,3,'2020-05-23 08:56:39','2020-05-23 08:56:39'),
	(637,22,24,3,'2020-05-23 08:56:39','2020-05-23 08:56:39'),
	(638,14,24,3,'2020-05-23 08:56:39','2020-05-23 08:56:39'),
	(639,36,24,3,'2020-05-23 08:56:39','2020-05-23 08:56:39'),
	(640,27,24,4,'2020-05-23 08:56:39','2020-05-23 08:56:39'),
	(641,32,24,3,'2020-05-23 08:56:39','2020-05-23 08:56:39'),
	(642,7,24,3,'2020-05-23 08:56:39','2020-05-23 08:56:39'),
	(643,19,24,3,'2020-05-23 08:56:39','2020-05-23 08:56:39'),
	(644,18,24,3,'2020-05-23 08:56:39','2020-05-23 08:56:39'),
	(645,2,24,4,'2020-05-23 08:56:39','2020-05-23 08:56:39'),
	(646,43,24,5,'2020-05-23 08:56:39','2020-05-23 08:56:39');

/*!40000 ALTER TABLE `location_prefs` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table locations
# ------------------------------------------------------------

DROP TABLE IF EXISTS `locations`;

CREATE TABLE `locations` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `seo_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_keyword` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `latitude` decimal(10,8) NOT NULL,
  `longitude` decimal(11,8) NOT NULL,
  `schools` int(11) NOT NULL DEFAULT 0,
  `supermarkets` int(11) NOT NULL DEFAULT 0,
  `restaurants` int(11) NOT NULL DEFAULT 0,
  `parks` int(11) NOT NULL DEFAULT 0,
  `distance_from_center` int(11) NOT NULL,
  `area` decimal(16,2) NOT NULL,
  `avg_rent` decimal(16,2) NOT NULL,
  `source_url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` tinyint(4) NOT NULL DEFAULT 1,
  `views` int(11) NOT NULL,
  `impression` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `distance_in_km` decimal(10,8) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `location` (`location`),
  KEY `seo_name` (`seo_name`),
  KEY `title` (`title`),
  KEY `latitude` (`latitude`),
  KEY `longitude` (`longitude`),
  KEY `schools` (`schools`),
  KEY `supermarkets` (`supermarkets`),
  KEY `restaurants` (`restaurants`),
  KEY `parks` (`parks`),
  KEY `distance_from_center` (`distance_from_center`),
  KEY `area` (`area`),
  KEY `avg_rent` (`avg_rent`),
  KEY `source_url` (`source_url`),
  KEY `is_active` (`is_active`),
  KEY `views` (`views`),
  KEY `impression` (`impression`),
  KEY `created_at` (`created_at`),
  KEY `updated_at` (`updated_at`),
  KEY `distance_in_km` (`distance_in_km`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `locations` WRITE;
/*!40000 ALTER TABLE `locations` DISABLE KEYS */;

INSERT INTO `locations` (`id`, `location`, `seo_name`, `title`, `short_description`, `description`, `meta_title`, `meta_description`, `meta_keyword`, `latitude`, `longitude`, `schools`, `supermarkets`, `restaurants`, `parks`, `distance_from_center`, `area`, `avg_rent`, `source_url`, `is_active`, `views`, `impression`, `created_at`, `updated_at`, `distance_in_km`)
VALUES
	(2,'Tiong Bahru','tiong-bahru','Tiong Bahru','<p><span style=\"font-weight: 400;\">Tiong Bahru offers a peaceful suburban setting with occasional discoveries that will keep you in love with the neighbourhood. Typically referred to as Singapore&rsquo;s hipster area, this is a paradise for foodies and coffee lovers with many quaint bakeries, cafes and eateries. Living in Tiong Bahru you&rsquo;ll find many picturesque spots with a great mix of old and new worlds coming together. Though many of the residences are in the form of HDBs, many of them have been renovated to appeal to expats who want an authentic Singaporean slice of life. If you are moving to Singapore and looking for something a little more modern, Tiong Bahru has some newer condos such as &lsquo;The Highline&rsquo; which includes a huge swimming pool and a rooftop gym that has sweeping views of Singapore.&nbsp;</span></p>\r\n<p><span style=\"font-weight: 400;\">TIong Bahru is especially popular amongst French expats as the neighbourhood has a number of french bakeries and restaurants. Expats from other parts of the world are also drawn to this peaceful, eclectic neighbourhood.</span></p>','<p><strong>Distance from the CBD<br /></strong><span style=\"font-weight: 400;\">The commute from Tiong Bahru to the CBD is about 20 minutes. You could take the MRT which is connected to Tiong Bahru Plaza or take a bus, many of which pass by the mall as well. You could also opt for a Grab or taxi which would save you about 5 to 10 minutes on your commuting time.</span></p>\r\n<p><strong>Living in Tiong Bahru: Morning, day and night<br /></strong><span style=\"font-weight: 400;\">Tiong Bahru has one of the best wet markets in Singapore. It is big, and it has a popular hawker centre right above the market. The hawker center offers a wide variety of local delights, some of which are famous. If you prefer something more familiar to expats, there are many cafes serving variations of Western-style breakfast and brunch items. There will never be a shortage of visitors flocking to the many cafes for meals and top-notch coffee. Forty Hands is a popular spot for brunch, so try and make reservations if you can.</span></p>\r\n<p><span style=\"font-weight: 400;\">A major appeal of Tiong Bahru is its historical charm. Some of its buildings are close to a century old. There are many small businesses that have taken over the old shop lots, take a closer look and you&rsquo;ll find hints of olden day Singapore in its architecture. Those who are looking to populate their Instagram feed will be spending hours here, as there are many spots for stunning snaps.</span></p>\r\n<p><span style=\"font-weight: 400;\">Dinnertime in Tiong Bahru is always an occasion. There are plenty of choices, with many of the eateries being operated by expats. French, Greek and English cuisine can be found around the vicinity. Try to make reservations if you can as these restaurants can draw a crowd at times. If you are the active sort, you could wind down with some after work yoga at one of the many yoga studios around.</span></p>\r\n<p><strong>Shop&nbsp;<br /></strong><span style=\"font-weight: 400;\">For household needs and groceries, most residents of Tiong Bahru head to Tiong Bahru Plaza. As it is connected to the MRT station, those on the way home tend to stop by the supermarket before heading home. Alternatively, fresh meats, seafood and produce is available at the Tiong Bahru market.&nbsp;</span></p>\r\n<p><span style=\"font-weight: 400;\">If you&rsquo;re looking for art, clothes and gift items, there&rsquo;s a plethora of independently owned shops around the neighbourhood. Many of the items you&rsquo;ll find are handcrafted and unique.&nbsp;&nbsp;</span></p>\r\n<p><strong>Eat&nbsp;<br /></strong><span style=\"font-weight: 400;\">Tiong Bahru is a paradise for small eats to extravagant meals. Some of the establishments are decades old, well-known around the island. Tiong Bahru bakery is one of the more famous ones. Try their scrumptious croissants and Breton round crusty cake, also known as kouign amann.</span></p>\r\n<p><strong>See&nbsp;<br /></strong><span style=\"font-weight: 400;\">Walking around Tiong Bahru gives you a peek into olden day Singapore. Despite being a tourist hotspot, the streets are a lot quieter than areas in the CBD. The buildings here have a distinctive look known as Streamline Moderne, which was introduced in the 1930s. You could also visit the Qi Tian Gong Temple which occasionally holds religious ceremonies. Even though Tiong Bahru attracts many visitors, most of the neighbourhood is relatively quiet, so you can roam around with ease.</span></p>\r\n<p><strong>The downside<br /></strong><span style=\"font-weight: 400;\">Some of the most popular eateries and cafes can be jam packed during weekends. If you do not have a reservation, you may find yourself hopping from one place to another, just to secure a seat. The mall and wet market can be crowded as well during the weekends, so try to do your groceries during the weekdays if you can.&nbsp;</span></p>\r\n<p><span style=\"font-weight: 400;\">Tiong Bahru can also be on the pricier side in terms of rent, mainly for the location. Expats who live here tend to houseshare to cut costs. If you&rsquo;re moving as a single or a couple, you&rsquo;ll find that rooms may be available to you.&nbsp;<br /></span></p>\r\n<p><strong>Making the most of your move to Singapore&nbsp;<br /></strong><span style=\"font-weight: 400;\">If you are in the process of planning your move, make sure you read our comprehensive and refreshed <a href=\"../../../blog/your-step-by-step-2021-moving-to-singapore-guide/\">2021 Moving to Singapore Guide</a> to learn more about the real cost of living in Singapore, what you need to prepare for and insights on family and work-life as an expat. <br /><br />You can also use our free <a href=\"https://www.haulmate.co/\">relocation dashboard </a>to discover other areas to live, chat with a community of likeminded people and begin setting up for your new life in Singapore... all before you land.&nbsp;&nbsp;</span><span style=\"font-weight: 400;\">&nbsp;</span></p>\r\n<p><span style=\"font-weight: 400;\">&nbsp;</span></p>\r\n<p>&nbsp;</p>','Moving to Singapore: An expats guide to living in Tiong Bahru','A detailed and personalised guide to living in Tiong Bahru. Plan your move to Singapore by finding the right neighbourhood for you.','Moving to Singapore, Living in Tiong Bahru, Living in Singapore, Expat',1.28575300,103.82995600,34,11,6,4,4,5.00,3000.00,'-',1,3,19,'2020-04-19 03:10:56','2020-10-23 13:52:37',2.57634595),
	(3,'Kallang','kallang','Kallang','<p><span style=\"font-weight: 400;\">Living in Kallang is a dream for any athlete moving to Singapore. It is located near the Singapore Sports hub that includes multiple sports facilities, including Olympic sized pools, running tracks, basketball courts, and more.&nbsp;</span></p>\r\n<p><span style=\"font-weight: 400;\">Within view of many of the residences is the Kallang Basin, a vast waterside that reflects the breathtaking skyline at night - a big draw for many expats in Singapore. Additionally, Kallang is not just about sports. It is closely connected to a number of well-known eateries, most notably the Old Airport Road food centre.</span></p>','<p><strong>Distance from the CBD<br /></strong><span style=\"font-weight: 400;\">Kallang is situated in the eastern edge of central Singapore. </span><span style=\"font-weight: 400;\">Getting to the city takes about 20 minutes and is easily accessible via MRT. Depending on where you stay, you can easily access the green, blue or yellow lines. This is also a neighbourhood that is particularly popular amongst expats working in and around Suntec City.<br /><br /></span><strong>Living in Kallang: Morning, day and night<br /></strong><span style=\"font-weight: 400;\">Mornings near Kallang are breezy. If you enjoy a morning jog, living in Kallang will inspire you to put on your jogging shoes before the day breaks. After a satisfying jog, you&rsquo;ll want to replenish your body. A popular brunch spot is Brawns &amp; Brains, which brews some of the best coffee in&nbsp; Singapore.&nbsp;</span></p>\r\n<p><span style=\"font-weight: 400;\">During the day, when the sun is too much to deal with, you can try some of the indoor activities like rock-climbing or swimming. If you take the MRT to Stadium, you can access a sports library and Kallang wave mall, which has arcades, eateries, shopping and spas.</span></p>\r\n<p><span style=\"font-weight: 400;\">A major attraction is the Sports Hub itself as it plays host to sports events, concerts and more. Live close enough and you could be sampling the echoes of international acts. For late night shopping, Singapore&rsquo;s biggest 24-hour Decathlon store is situated near the Mountbatten MRT station. There is also a 24-hour McDonalds for those who are famished after a day filled with activity.</span></p>\r\n<p><strong>Shop&nbsp;<br /></strong><span style=\"font-weight: 400;\">Kallang may not be known for its shopping, but it will definitely be sufficient. Some of the more popular shopping spots include Kallang Wave Mall, Leisure Park and recently, Decathlon. Kallang Wave Mall has a fair selection of fashion labels that include H&amp;M, Uniqlo and Cotton On. There&rsquo;s also plenty of sports and electronic stores and eateries. Groceries are available at the FairPrice Xtra, and you could even score some S$2 buys from Daiso.</span></p>\r\n<p><strong>Eat&nbsp;<br /></strong><span style=\"font-weight: 400;\">The most notable place to eat near Kallang is the Old Airport Road food centre. Some of its hawkers are famous, and may have been featured in the Michelin guides. A good indicator of culinary excellence is the snaking queues that make each meal even more worthwhile.&nbsp;</span></p>\r\n<p><span style=\"font-weight: 400;\">For a truly local experience, Kallang is home to one of the most famous Frog Porridge eateries in Singapore. If you can stomach the thought of eating frogs then you&rsquo;ll find out just how delightful frog porridge can be.&nbsp;</span></p>\r\n<p><strong>See&nbsp;<br /></strong><span style=\"font-weight: 400;\">The Singapore Sports Hub is known to be the nation&rsquo;s most ideal host for international events. Sporting events, musical acts and more are often held here. You&rsquo;ll always know when something is going on when you take the MRT and it starts to crowd as you near the Stadium MRT station. Most evenings however, are quiet. Taking a walk along the Kallang Basin is a great way to get some exercise and admire the Singaporean skyline.</span></p>\r\n<p><strong>The downside<br /></strong><span style=\"font-weight: 400;\">While Kallang has plenty of the essentials, it is not exactly a place for shopaholics. The malls are not the most exciting. Expats looking for the exciting city vibe may want to think twice about moving to this serene, sports town.&nbsp;<br /></span></p>\r\n<p><strong>Making the most of your move to Singapore&nbsp;<br /></strong><span style=\"font-weight: 400;\">If you are in the process of planning your move, make sure you read our comprehensive and refreshed <a href=\"../../../blog/your-step-by-step-2021-moving-to-singapore-guide/\">2021 Moving to Singapore Guide</a> to learn more about the real cost of living in Singapore, what you need to prepare for and insights on family and work-life as an expat. <br /><br />You can also use our free <a href=\"https://www.haulmate.co/\">relocation dashboard </a>to discover other areas to live, chat with a community of likeminded people and begin setting up for your new life in Singapore... all before you land.&nbsp;&nbsp;<br /></span></p>\r\n<p>&nbsp;</p>\r\n<p><span style=\"font-weight: 400;\">&nbsp;</span></p>','Moving to Singapore: An expats guide to living in Kallang','A detailed and personalised guide to living in Kallang. Plan your move to Singapore by finding the right neighbourhood for you.','Moving to Singapore, Living in Kallang, Living in Singapore, Expat, Relocation',1.30996600,103.86908200,90,10,3,1,4,9.00,3100.00,'-',1,8,19,'2020-04-19 03:10:56','2020-10-23 11:03:23',2.67011204),
	(4,'Newton','newton','Newton','<p><span style=\"font-family: -apple-system, BlinkMacSystemFont, \'Segoe UI\', Roboto, Oxygen, Ubuntu, Cantarell, \'Open Sans\', \'Helvetica Neue\', sans-serif;\">Living in Newton means that you&rsquo;re in a sleepy little residential enclave of condominium complexes that&rsquo;s in a convenient location. While it&rsquo;s quiet, it doesn&rsquo;t have the same hectic bustle and vibrancy as some of the other neighborhoods. With a plethora of preschools and kindergartens in this area however, it&rsquo;s great for families looking to begin their Singapore expat life. It&rsquo;s also suited to couples and single professionals that prefer a quieter neighborhood that&rsquo;s in close proximity to the CBD.&nbsp;</span></p>\r\n<p><span style=\"font-weight: 400;\">Housing in the Newton area consists of private property from terraces to semi-detached houses. There are also apartments along with a plethora of condominiums. If you&rsquo;re looking to stay in a central neighborhood that isn&rsquo;t quite as bustling as Orchard Road, Newton is a great choice.&nbsp;</span></p>','<p><strong>Distance from the CBD<br /><span style=\"font-weight: 400;\">Newton is situated in the Central Region of Singapore and is conveniently located to both the Downtown and North-South MRT Lines. From Newton, it&rsquo;ll only take about 10-20 minutes to get to the CBD area by MRT, and 10-minutes by car.</span><br /><br />Living in Newton: Morning, day and night<br /></strong><span style=\"font-weight: 400;\">Since Newton is a more residential area, there isn&rsquo;t a whole lot to do in the neighborhood. You can start your morning by working out at TMP Fitness or heading to FIT Singapore for some personal training. Thereafter, drop by Rush-Me-Not Art Studio to explore a variety of art-making processes through creative modalities.&nbsp;</span></p>\r\n<p><span style=\"font-weight: 400;\">If you&rsquo;ve always wanted to learn a new language, Alliance Fran&ccedil;aise de Singapour teaches French in well-equipped classrooms. You can opt for private tuition, or choose to take classes in groups. Before the day ends, stroll past Gilstead Road to check out some eclectic architectural styles from Art Deco to Edwardian Baroque movements. There&rsquo;s also a couple of cafes that you can sit and unwind at in the afternoon with a book.</span></p>\r\n<p><span style=\"font-weight: 400;\">In the evening, head to Newton Food Centre to grab some delicious local food, or take the train into Orchard Road for a comfortable evening stroll.&nbsp;</span></p>\r\n<p><strong>Shop&nbsp;<br /></strong><span style=\"font-weight: 400;\">There aren&rsquo;t any major shopping malls in the Newton area. To do your shopping, you&rsquo;d need to travel to either the Orchard or Novena area.&nbsp;</span></p>\r\n<p><strong>Eat&nbsp;<br /></strong><span style=\"font-weight: 400;\">The best spot to grab food in Newton is at the <a href=\"https://www.misstamchiak.com/newton-food-centre-singapore/\">Newton Food Centre</a>. It was recently renovated in 2006 and is usually open to the wee hours of the morning. Some of the best dishes that you can get here include Hup Lee&rsquo;s Oyster Omelettes, chicken satay, and durian. Don&rsquo;t forget to wash down your food with some freshly made sugar cane juice that&rsquo;s naturally sweet and light.&nbsp;</span></p>\r\n<p><span style=\"font-weight: 400;\">For other food options, you&rsquo;d need to head to either the Novena or Orchard area. The Novena area has quite a few dining options such as The Clueless Goat for some delicious coffee and brunch, to Nickeldime Drafthouse for its freshly made bread and refreshing craft beers.&nbsp;</span></p>\r\n<p><strong>See<br /></strong><span style=\"font-weight: 400;\">At the cusp of both Newton and Orchard is Emerald Hill. It&rsquo;s a conserved area with gorgeous old-styled buildings and is gorgeous to photograph. There are also a few bars and delicious food in the area at reasonable prices. As Newton&rsquo;s a residential area, there&rsquo;s not much to see, instead, you can visit neighbouring Orchard Road to enjoy the modern architecture and shopping opportunities.&nbsp;</span></p>\r\n<p><strong>The downside<br /></strong><span style=\"font-weight: 400;\">There&rsquo;s not much to do in the Newton area because it&rsquo;s mainly residential. Perhaps the only highlight of Newton either than its plentiful housing and schools is its proximity to Newton Food Centre.&nbsp;</span></p>\r\n<p><strong>Making the most of your move to Singapore&nbsp;<br /></strong><span style=\"font-weight: 400;\">If you are in the process of planning your move, make sure you read our comprehensive and refreshed <a href=\"../../../blog/your-step-by-step-2021-moving-to-singapore-guide/\">2021 Moving to Singapore Guide</a> to learn more about the real cost of living in Singapore, what you need to prepare for and insights on family and work-life as an expat. <br /><br />You can also use our free <a href=\"https://www.haulmate.co/\">relocation dashboard </a>to discover other areas to live, chat with a community of likeminded people and begin setting up for your new life in Singapore... all before you land.&nbsp;&nbsp;<br /></span></p>\r\n<p>&nbsp;</p>','Moving to Singapore: An expats guide to living in Newton','A detailed and personalised guide to living in Newton. Plan your move to Singapore by finding the right neighbourhood for you.','Moving to Singapore, Living in Newton, Living in Singapore, Expat',1.30871900,103.83965700,3,7,1,5,4,8.00,3900.00,'-',1,0,19,'2020-04-19 03:10:56','2020-10-23 12:31:37',2.20759877),
	(5,'Orchard','orchard','Orchard','<p><span style=\"font-weight: 400;\">Living in Orchard means that you&rsquo;re staying in the heart of all the action. Orchard Road is both bustling and busy, and you&rsquo;ll be able to find everything you need in this area. At Orchard Road, you&rsquo;ll have access to all the malls, loads of shops, plenty of recreational activities, and socialisation spots. With everything you need at your fingertips, Orchard is well-suited to all, but especially those that want to begin their Singapore expat life in a busy and buzzing area.&nbsp;</span></p>\r\n<p><span style=\"font-weight: 400;\"><a href=\"https://www.visitsingapore.com/see-do-singapore/places-to-see/orchard/\">Orchard Road</a> is Singapore\'s main shopping belt, but there&rsquo;s also some stunning architecture and great views. The condominiums in this area have gorgeous exteriors and modern interiors. Hence, the rent is pricier than other neighbourhoods &ndash; be prepared to fork out at least double the price in rent if you&rsquo;re planning on residing in Orchard.&nbsp;</span></p>','<p><strong>Distance from the CBD<br /></strong><span style=\"font-weight: 400;\">Orchard is pretty much in the centre of Singapore, so just about any place is equidistant. From Orchard MRT, you can get to the CBD in 15-20 minutes by public transportation. By car, it&rsquo;ll take about 10 minutes.</span></p>\r\n<p><strong>Living in Orchard: Morning, day and night<br /></strong><span style=\"font-weight: 400;\">With a bunch of malls around the area, you can spend your morning having brunch at any one of the cafes peppered along Orchard Road before going shopping. While the Botanic Gardens is situated in the Tanglin area, it&rsquo;s still considered near the Orchard vicinity and is a great place to go for a stroll at any time of the day. It&rsquo;s a UNESCO World Heritage Site with a 161-year old gorgeous tropical garden that&rsquo;ll temporarily make you feel like you&rsquo;ve been transported away from the city.&nbsp;</span></p>\r\n<p><span style=\"font-weight: 400;\">There&rsquo;s also plenty of gyms and studios around the Orchard area to satisfy all your fitness needs from Pure Fitness to F45 Training Orchard. Yoga Movement is also a great studio to head to if you fancy some stretching in a beautiful space.&nbsp;</span></p>\r\n<p><span style=\"font-weight: 400;\">In the evening, grab dinner at any one of the restaurants while admiring the sparkling lights of Orchard Road. You can also belt out some tunes at K.STAR Karaoke or head to KPO for some amazing bar grub and drinks. Be sure to go early as the place fills up quickly or you&rsquo;ll have to end up drinking al fresco.&nbsp;</span></p>\r\n<p><strong>Shop&nbsp;<br /></strong><span style=\"font-weight: 400;\">Shopping options are aplenty at Orchard Road. You&rsquo;ve got an eclectic mix of local and global brands with each of the shopping centres having their own personalities. Head to Ion &ndash; a glass-covered mall with plenty of luxurious options or Far East Plaza for inexpensive items sold by independent vendors. Most of these shopping malls also have supermarkets and are connected underground so you can easily cross over from one to the other.&nbsp;</span></p>\r\n<p><strong>Eat <br /></strong><span style=\"font-weight: 400;\">There are a plethora of dining options at Orchard so you&rsquo;ll be spoilt for choice. Wasabi Tei is a hidden gem nestled on the 5th floor of Far East Plaza and is a tiny casual Japanese restaurant that serves fresh sashimi. There&rsquo;s also burgers at Omakase burger in Wisma Atria, fine dining at Salt Grill &amp; Sky Bar, and The Horse&rsquo;s Mouth for delicious cocktails and Japanese cuisine. There aren&rsquo;t any outdoor hawker centres in Singapore but you&rsquo;ll find plenty of local food options in the food courts within the shopping malls.&nbsp;</span></p>\r\n<p><strong>See<br /></strong><span style=\"font-weight: 400;\">For the best view of Singapore, head to ION Sky &ndash; a glass-windowed observatory that&rsquo;s situated on the 56th storey of Ion. From there, you&rsquo;ll get to see some gorgeous panoramic views of Singapore. Don&rsquo;t forget to also head to the ION art gallery to check out the contemporary works on display. For a more unique part of Orchard, Emerald Hill is a conservation area that has plenty of unique terrace houses that are currently being taken up by commercial businesses. Fancy some reading? The library@orchard is beautifully designed and has a vast array of reading choices to offer its visitors. Along Orchard Road is also the official residence and office of the President of Singapore, also known as the Istana. While you can&rsquo;t enter the building, you can admire the heritage building from the outside.&nbsp;</span></p>\r\n<p><strong>The downside<br /></strong><span style=\"font-weight: 400;\">Traffic can be a killer at Orchard Road, and expect hordes of people during the weekends and on most weekdays. If you come from a dense urban area then you&rsquo;ll find the crowd tolerable, however, a peaceful stroll is not something you can find outside your condominium or estate grounds as Orchard Road is not only in a central location but also a prime tourist spot.&nbsp;</span></p>\r\n<p><span style=\"font-weight: 400;\">Noise pollution is another thing you&rsquo;d need to consider in Orchard Road, and there aren&rsquo;t that many HDB flats in the area. Prices here are also exorbitant and you won&rsquo;t find many schools in the area.&nbsp;&nbsp;</span></p>\r\n<p><strong>Making the most of your move to Singapore&nbsp;<br /></strong><span style=\"font-weight: 400;\">If you are in the process of planning your move, make sure you read our comprehensive and refreshed <a href=\"../../../blog/your-step-by-step-2021-moving-to-singapore-guide/\">2021 Moving to Singapore Guide</a> to learn more about the real cost of living in Singapore, what you need to prepare for and insights on family and work-life as an expat. <br /><br />You can also use our free <a href=\"https://www.haulmate.co/\">relocation dashboard </a>to discover other areas to live, chat with a community of likeminded people and begin setting up for your new life in Singapore... all before you land.&nbsp;&nbsp;<br /></span></p>\r\n<p>&nbsp;</p>','Moving to Singapore: An expats guide to living in Orchard','A detailed and personalised guide to living in Orchard. Plan your move to Singapore by finding the right neighbourhood for you.','Moving to Singapore, Living in Orchard, Living in Singapore, Expat',1.30424800,103.83193500,26,11,0,1,4,8.00,6400.00,'-',1,5,19,'2020-04-19 03:10:56','2020-10-23 12:49:38',2.54472375),
	(6,'River Valley','river-valley','River Valley','<p><span style=\"font-weight: 400;\">Those living in River Valley enjoy the best of both worlds: closeness to the CBD and the serenity of an upscale neighbourhood. The neighbourhood is teeming with expats, mainly young families who are setting up their lives in Singapore. Many of the residences are comfortably designed with plenty of amenities.&nbsp;</span></p>\r\n<p><span style=\"font-weight: 400;\">The area is surrounded by a few major roads, which include Grange Road, Mohamed Sultan Road and Kim Yan Road. If you&rsquo;re newly moving to Singapore, you&rsquo;ll appreciate the accessibility to many of the popular spots surrounding the area. You could also walk along the Singapore river, which has stretches of restaurants, bars and shops.</span></p>','<p><strong>Distance from the CBD<br /></strong><span style=\"font-weight: 400;\">To get to the CBD by car only takes about 10 to 15 minutes. Traffic is usually light around River Valley, but starts to get congested as you approach the CBD. Public transportation is something you definitely want to consider as some of the busses can get you to the city in under 10 stops.&nbsp;</span></p>\r\n<p><span style=\"font-weight: 400;\">The closest MRT station would be Fort Canning which is part of the Blue line, or walk a little further to get to Dhoby Ghaut station, which gives you access to the Red, Purple and Yellow lines.<br /></span><strong><br />Living in River Valley: Morning, day and night<br /></strong><span style=\"font-weight: 400;\">Mornings at River Valley begin with breakfast. With so many great choices, there is no excuse to skip the most important meal of the day. A popular breakfast spot is Common Man Coffee, which offers excellent coffee and an extensive menu of classic and fusion food.</span></p>\r\n<p><span style=\"font-weight: 400;\">As the day progresses, you&rsquo;ll continue to see many expats working remotely at some of these cafes. If you have the time and it is too hot for a walk along the Singapore River, many of the malls have learning institutions for kids and adults.</span></p>\r\n<p><span style=\"font-weight: 400;\">Evenings are best spent along the Singapore River. But if you&rsquo;re looking for alternatives, there are plenty of great restaurants away from the river. The English House by Gordan Ramsay&rsquo;s past mentor Marco Pierre White is one of them. You&rsquo;ll also find quality Japanese dining around Robertson Walk, some of them very reasonably priced.</span></p>\r\n<p><strong>Shop&nbsp;<br /></strong><span style=\"font-weight: 400;\">There are a number of shopping malls around River Valley, but the malls seem to cater more to service-related businesses, and not so much on retail. If you want a better shopping experience, you can check out Central mall or head to Orchard which is only a few minutes away.</span></p>\r\n<p><strong>Eat&nbsp;<br /></strong><span style=\"font-weight: 400;\">There is no shortage of <a href=\"https://expatliving.sg/roberston-quay-boat-quay-clarke-quay-singapore-restaurants/\">great food in River Valley</a>. Because of the diverse expat community, you&rsquo;ll find exceptional international dining, prepared authentically. This is also a great location for adventurous chefs who are looking to showcase their culinary creativity. For such experiences you can try In Bad Company or 8picure.</span></p>\r\n<p><strong>See&nbsp;<br /></strong><span style=\"font-weight: 400;\">Walking along the Singapore River is a pastime for many of the residents of River Valley. Cutting off from the common pathway is not unusual as doing so will lead you to many interesting discoveries. You may stumble upon The Singapore Buddhist Lodge which is founded in 1934, and is one of the oldest charities in Singapore. The establishment was recently renovated and is quite a sight to behold.</span></p>\r\n<p><strong>The downside<br /></strong><span style=\"font-weight: 400;\">To stay at River Valley is not cheap, especially if you are moving to this neighbourhood with your family. While it is an ideal place for families, rental and living costs can escalate quickly. Access to the MRT station is also limited. From the residential area to the MRT station is a bit of a walk.<br /></span></p>\r\n<p><strong>Making the most of your move to Singapore&nbsp;<br /></strong><span style=\"font-weight: 400;\">If you are in the process of planning your move, make sure you read our comprehensive and refreshed <a href=\"../../../blog/your-step-by-step-2021-moving-to-singapore-guide/\">2021 Moving to Singapore Guide</a> to learn more about the real cost of living in Singapore, what you need to prepare for and insights on family and work-life as an expat. <br /><br />You can also use our free <a href=\"https://www.haulmate.co/\">relocation dashboard </a>to discover other areas to live, chat with a community of likeminded people and begin setting up for your new life in Singapore... all before you land.&nbsp;&nbsp;<br /></span></p>\r\n<p>&nbsp;</p>\r\n<p><span style=\"font-weight: 400;\">&nbsp;</span></p>','Moving to Singapore: An expats guide to living in River Valley','A detailed and personalised guide to living in River Valley. Plan your move to Singapore by finding the right neighbourhood for you.','Moving to Singapore, Living in River Valley, Living in Singapore, Expat',1.29727100,103.83388200,79,10,1,4,4,5.00,4250.00,'-',1,4,19,'2020-04-19 03:10:56','2020-10-23 13:12:20',2.05975850),
	(7,'Tanglin','tanglin','Tanglin','<p><span style=\"font-weight: 400;\">Located in central Singapore and mere minutes away from the CBD, Tanglin is a quaint and upscale neighbourhood that is home to many affluent expats and locals. With many educational, religious and medical institutions around, living in Tanglin is an ideal choice for expats moving to Singapore with their families. A nearby IKEA is an added convenience for those looking to set up their new homes.&nbsp;</span></p>\r\n<p><span style=\"font-weight: 400;\">For a Singaporean neighbourhood, Tanglin is considered large. The area is also widely known for its greenery and restaurants. While it may be on the pricier end of town, there are plenty of expats around and no shortage of things to do on weekends when in Tanglin.</span></p>','<p><strong>Distance from the CBD<br /></strong><span style=\"font-weight: 400;\">Tanglin is about 10 minutes from the CBD by car. Getting to the city by public transport may be a little trickier. This is because Tanglin does not have a specific MRT station. Those commuting to and from Tanglin often make MRT to bus transfers via Orchard MRT station, or they just take the bus.</span></p>\r\n<p><strong>Living in Tanglin: Morning, day and night<br /></strong><span style=\"font-weight: 400;\">Most Tanglin mornings begin at home. This is because many of the residents do not rely on public transport and would rather have breakfast at home, or closer to work. Early risers who have time to spare, can be found in one of the many Yoga studios around.</span></p>\r\n<p><span style=\"font-weight: 400;\">On leisurely days, you may want to explore the lush greenery of the Botanic Gardens. This vast garden features over 10,000 species of flora and is spread across 82 hectares of land. The wide plains of neatly curated plants will be a much welcome sight for those who are starting to feel claustrophobic in Singapore.&nbsp;</span></p>\r\n<p><span style=\"font-weight: 400;\">After an exhilarating day at the garden, you&rsquo;ll want to treat yourself to a delicious meal. Right at the Botanic Gardens you&rsquo;ll find a number of restaurants that will provide you with a dining experience close to nature. The ones to note include The Halia, and Fusion Spoon, which is closer to Tanglin. You can also find a variety of international dining closer to town or perhaps head to Dempsey Hill for more options.</span></p>\r\n<p><strong>Shop&nbsp;<br /></strong><span style=\"font-weight: 400;\">Shopping around Tanglin may not be as flashy as what you&rsquo;ll find along Orchard Road, but it can be satisfying. Along Alexandra Road are a number of specialty malls, notably IKEA and Queensway Shopping Centre. Queensway Shopping Centre on the other hand, is a paradise for sports junkies. Here you&rsquo;ll find sports gear at affordable prices. If you&rsquo;re serious about your shopping, you&rsquo;ll be pleased to know that Orchard is right next to Tanglin, so you&rsquo;ll never be far from all the action.</span></p>\r\n<p><strong>Eat&nbsp;<br /></strong><span style=\"font-weight: 400;\">Around Tanglin, you&rsquo;ll find a concentration of lavish dining spots. Many of them can be found in and around the Regent. Adventurous diners can seek out more choices around Dempsey Hill, which is within walking distance. You&rsquo;ll want to try Candlenut, which serves peranakan cuisine and the Dempsey Cookhouse for fusion food. If you&rsquo;re still feeling peckish after a meal, Brunetti is an excellent place for italian baked goods and desserts.&nbsp;</span></p>\r\n<p><strong>See&nbsp;<br /></strong><span style=\"font-weight: 400;\">An alternative to the Botanic Gardens is the Mount Faber park which features the iconic Henderson Waves Bridge. In the morning or early evenings you&rsquo;ll come across many locals and expats, jogging around this scenic park.</span></p>\r\n<p><strong>The downside<br /></strong><span style=\"font-weight: 400;\">Aside from its closeness to the CBD, Tanglin&rsquo;s public transportation is not as complete as what you will find in other neighbourhoods. Many of the residents live in landed property or condos and own cars. As an expat, you may be at a disadvantage as you will likely have to depend on taxis which will add to your living costs.<br /></span></p>\r\n<p><strong>Making the most of your move to Singapore&nbsp;<br /></strong><span style=\"font-weight: 400;\">If you are in the process of planning your move, make sure you read our comprehensive and refreshed <a href=\"../../../blog/your-step-by-step-2021-moving-to-singapore-guide/\">2021 Moving to Singapore Guide</a> to learn more about the real cost of living in Singapore, what you need to prepare for and insights on family and work-life as an expat. <br /><br />You can also use our free <a href=\"https://www.haulmate.co/\">relocation dashboard </a>to discover other areas to live, chat with a community of likeminded people and begin setting up for your new life in Singapore... all before you land.&nbsp;&nbsp;<br /></span></p>\r\n<p>&nbsp;</p>\r\n<p><span style=\"font-weight: 400;\">&nbsp;</span></p>','Moving to Singapore: An expats guide to living in Tanglin','A detailed and personalised guide to living in Tanglin. Plan your move to Singapore by finding the right neighbourhood for you.','Moving to Singapore, Living in Tanglin, Living in Singapore, Expat,',1.31158100,103.81534900,54,1,0,2,3,9.00,3500.00,'-',1,2,19,'2020-04-19 03:10:57','2020-10-23 13:39:33',4.55453963),
	(8,'Geylang','geylang','Geylang','<p>Living in Geylang</p>','<p>Illum omnis nisi ratione ullam qui quia. Quas quos voluptatibus vel placeat qui. Voluptas cum ducimus nemo sit in fuga.</p>',NULL,NULL,NULL,1.31790400,103.88624200,98,13,4,3,3,8.00,2700.00,'-',1,2,19,'2020-04-19 03:10:57','2020-10-15 13:15:25',4.70102042),
	(13,'Bugis','bugis','Bugis','<p>For those living in Bugis, every waking moment is an adventure. From the moment you exit your residence, you are greeted by a spectrum of history and culture. Bugis is very well-connected, with a number of very new residences being built over the last few years. It is a major expat hotspot for those seeking modern living, with many living in <a href=\"https://www.propertyguru.com.sg/project/duo-residences-21779#condo-available-units\" target=\"_blank\" rel=\"noopener\">Duo Residence </a>condo. Bugis offers an authentic sampling of the world and is undoubtedly the place for those with a thirst for new experiences. Living here will definitely make your Singapore expat life a lot more colourful.</p>','<p><span style=\"font-weight: 400;\">For those living in Bugis, every waking moment is an adventure. From the moment you exit your residence, you are greeted by a spectrum of history and culture. Bugis is very well-connected, with a number of very new residences being built over the last few years. It is a major expat hotspot for those seeking modern living.</span></p>\r\n<p><span style=\"font-weight: 400;\">Bugis offers an authentic sampling of the world and is undoubtedly the place for those with a thirst for new experiences. Living here will definitely make your Singapore expat life a lot more colourful.</span></p>\r\n<p><strong>Distance from the CBD<br /></strong><span style=\"font-weight: 400;\">The Bugis MRT station is connected to both the blue and green lines which makes it easier for you to commute to more places, including the CBD. To get to the CBD takes about 20 minutes by MRT and about 15 minutes by car.</span></p>\r\n<p><strong>Living in Bugis: Morning, day and night<br /></strong><span style=\"font-weight: 400;\">Depending on where you&rsquo;re headed, your commute begins at one of the many bus stops, or the Bugis MRT station that is attached to Bugis Junction mall. Some of the food stalls are open and offer coffee and light breakfast items to kickstart your day.&nbsp;</span></p>\r\n<p><span style=\"font-weight: 400;\">For some daytime exploration, <a href=\"https://thehoneycombers.com/singapore/guide-to-haji-lane-singapore/\">Haji Lane</a> is a great place to go. Around every corner, you&rsquo;ll find colourful graffiti art along every corner. You&rsquo;ll also hear the serenading of musical performers from one of the many live music bars. After an exhilarating journey along Haji Lane, head over the National Library for some air conditioning and reading. The establishment features over 7 floors of books, resources and more.</span></p>\r\n<p><span style=\"font-weight: 400;\">Some of the best bars in Singapore can be found in Bugis. If you&rsquo;re looking to impress your company, there is no shortage of upscale bars. For casual evenings, you could also enjoy cheaper beers at the coffeeshops.<br /></span></p>\r\n<p><strong>Shop&nbsp;<br /></strong><span style=\"font-weight: 400;\">The malls at Bugis are unlike most of the malls you&rsquo;ll find in sunny Singapore. Bugis Junction for example is a mall that is inspired by colonial times. Tall ceilings and wide stretches of windows introduce the feeling of space and light to the shopping experience.&nbsp;</span></p>\r\n<p><span style=\"font-weight: 400;\">Across from Bugis Junction is Bugis Village, a bazaar that takes you back to the street markets of olden day Singapore. What&rsquo;s on sale, however, is anything but out of date. Clothing, phone accessories, souvenirs and street food are commonly found; a nice contrast from the internationally known brands you&rsquo;ll find at the surrounding malls.<br /></span></p>\r\n<p><strong>Eat&nbsp;<br /></strong><span style=\"font-weight: 400;\">From a small Hainanese community that birthed some of Singapore&rsquo;s most favourite dishes, Bugis has come a long way. Today, It is a melting pot that welcomes culinary delights from all sorts of communities. You can go from authentic middle eastern dining to scorching Sichuan hot pot just by crossing the street. If you\'re after some amazing views of Singapore and well-made cocktail, <a href=\"https://sgmagazine.com/nightlife/bar-club/mr-stork\">Mr Stork</a> is our personal favourite<br /><br /></span><strong>See&nbsp;<br /></strong><span style=\"font-weight: 400;\">A 15-minute taxi ride around the neighbourhood is more than enough to pique the curiosity of any visitor. The shophouses, hotels, religious establishments and more, may just entice you to halt your ride midway. A better idea is to utilise Singapore&rsquo;s ultra-efficient bus system which promises something new at every stop.</span></p>\r\n<p><strong>The downside<br /></strong><span style=\"font-weight: 400;\">Bugis can sometimes be very busy and because of its central location, it\'s a more expensive area. Expect crowded MRT rides as the neighbourhood draws in professionals, tourists and visitors by the masses. If you&rsquo;re looking for some peace and quiet, this may not be the neighbourhood for you.</span></p>\r\n<p><strong>Making the most of your move to Singapore&nbsp;<br /></strong><span style=\"font-weight: 400;\">If you are in the process of planning your move, make sure you read our comprehensive and refreshed <a href=\"../../../blog/your-step-by-step-2021-moving-to-singapore-guide/\">2021 Moving to Singapore Guide</a> to learn more about the real cost of living in Singapore, what you need to prepare for and insights on family and work-life as an expat. <br /><br />You can also use our free <a href=\"https://www.haulmate.co/\">relocation dashboard </a>to discover other areas to live, chat with a community of likeminded people and begin setting up for your new life in Singapore... all before you land.&nbsp;&nbsp;<br /></span></p>\r\n<p>&nbsp;</p>','Moving to Singapore: An expats guide to living in Bugis','A detailed and personalised guide to living in Bedok. Plan your move to Singapore by finding the right neighbourhood for you.','Moving to Singapore, Living in Bugis, Living in Singapore, Expat, Haji Lane',1.29916700,103.85579200,0,6,4,6,5,5.00,5000.00,'-',1,13,19,'2020-05-05 08:03:49','2020-10-23 10:13:45',0.79698416),
	(14,'Rochor','rochor','Rochor','<p><span style=\"font-weight: 400;\">Living in Rochor means that you&rsquo;re living in the cultural centre of Singapore with spice-scented streets, colourful temples, churches, and mosques as well as a multitude of restaurants in the neighbourhood. With plenty of HDB estates and uniquely designed shophouses, this neighbourhood is great for anyone that wants to reside in a cultural neighbourhood and begin their Singapore expat life.&nbsp;</span></p>\r\n<p><span style=\"font-weight: 400;\">There are 10 sub-zones in Rochor and they comprise numerous locations from Kampong Glam to Little India, Farrer Park, and Selegie. What&rsquo;s great about this area is that it&rsquo;s architecturally rich with interesting old buildings, and showcases a different part of Singapore.&nbsp;</span></p>','<p><strong>Distance from the CBD<br /></strong><span style=\"font-weight: 400;\">Rochor has its own MRT station on the Downtown Line, and you can easily take the MRT to the CBD area. From Rochor, it&rsquo;ll take you about 25-minutes to get to the CBD and about 10-20 minutes by car.&nbsp;<br /><br /></span><strong>Living in Rochor: Morning, day and night<br /></strong><span style=\"font-weight: 400;\">There&rsquo;s so much to explore in the Rochor area because of how distinctive it is from all the other neighbourhoods in Singapore. Kampong Glam, for example, is a sub-zone of Rochor and is an ethnic district steeped in Malay-Arab history. There&rsquo;s plenty of historic shophouses in this area that are now home to a plethora of modern businesses. Spend your day wandering around the shops before grabbing some food at one of the hipster cafes in the area. An interesting cafe to head to is Why Cafe &ndash; a New York-inspired cafe that&rsquo;s one coffee spot that you wouldn&rsquo;t want to miss at Kampong Glam.&nbsp;</span></p>\r\n<p><span style=\"font-weight: 400;\">For those looking for a great workout, head to F45 Rochor for your daily dose of adrenaline. The Loft Gym is another great place to head to as it&rsquo;s open 24 hours a day and has a comprehensive range of equipment with numerous workout areas and designated zones. If you like dance classes, Physical Abuse teaches Zumba, Korean Pop, and even a Dirty Dancing class.&nbsp;</span></p>\r\n<p><span style=\"font-weight: 400;\">In the evening, take your pick from the multitude of clubs and bars in the area. There&rsquo;s a vibrant nightlife in Rochor, with interesting bars serving up unique cocktails. If you&rsquo;re a fan of live music, Blu Jaz is a great live music bar with a great ambience. Usually packed on the weekends, there&rsquo;s a wide array of music events every month from Jazz bands to DJs.&nbsp;</span></p>\r\n<p><strong>Shop&nbsp;<br /></strong><span style=\"font-weight: 400;\">The Verge Singapore is the first and largest modern shopping mall within Little India &ndash; one of the sub-zones in Rochor. At The Verge, there&rsquo;s everything you could need from beauty salons to cafes, and a supermarket. Another place on the list is Mustafa Centre &ndash; a 24-hour mall that has everything under the sun from fruits and vegetables to technology and more.&nbsp;</span></p>\r\n<p><span style=\"font-weight: 400;\">Another mall is Golden Mile Complex which is situated on Beach Road. It&rsquo;s known as the &ldquo;Little Thailand&rdquo; of Singapore as it has numerous Thai eateries, authentic Thai produce, and dishes to satisfy your cravings. A popular area in Rochor is Bugis Junction &ndash; a modern fashion destination mall that&rsquo;s also flanked by charming historic shophouses. While you&rsquo;re there, don&rsquo;t miss checking out Bugis Street for the latest and trendiest fashion options at affordable prices.&nbsp;</span></p>\r\n<p><strong>Eat&nbsp;<br /></strong><span style=\"font-weight: 400;\">Similar to all other neighbourhoods in Singapore, food is aplenty in the Rochor area. There&rsquo;s a couple of local hawker centres from Golden Mile Food Centre to Berseh Food Centre. Each district within the Rochor area has its own food delights from authentic Indonesian-style dishes to Mexican cuisine at Kampong Glam, and some of the best Indian food in Singapore at Little India.&nbsp;</span></p>\r\n<p><strong>See<br /></strong><span style=\"font-weight: 400;\">There&rsquo;s so much to explore and see in this neighborhood that you&rsquo;re always going to find something new. Situated in Kampong Glam, Haji Lane is Singapore&rsquo;s original indie neighbourhood with plenty of shops, cafes, and gorgeous murals that&rsquo;ll keep you coming back. Don&rsquo;t forget to also check out the Sultan Mosque, and visit the Sungei Road Thieves Market for some vintage purchases.&nbsp;</span></p>\r\n<p><strong>The downside<br /></strong><span style=\"font-weight: 400;\">Since Rochor is such a cultural area, it&rsquo;s teeming with boutiques, cafes, and restaurants, hence, there isn&rsquo;t that much housing available in this area. There&rsquo;s also a limited choice of international schools at Rochor, so you&rsquo;ll need to be okay with your child travelling a little further out.&nbsp;<br /></span></p>\r\n<p><strong>Making the most of your move to Singapore&nbsp;<br /></strong><span style=\"font-weight: 400;\">If you are in the process of planning your move, make sure you read our comprehensive and refreshed <a href=\"../../../blog/your-step-by-step-2021-moving-to-singapore-guide/\">2021 Moving to Singapore Guide</a> to learn more about the real cost of living in Singapore, what you need to prepare for and insights on family and work-life as an expat. <br /><br />You can also use our free <a href=\"https://www.haulmate.co/\">relocation dashboard </a>to discover other areas to live, chat with a community of likeminded people and begin setting up for your new life in Singapore... all before you land.&nbsp;&nbsp;<br /></span></p>\r\n<p>&nbsp;</p>\r\n<p><span style=\"font-weight: 400;\">&nbsp;</span></p>\r\n<p>&nbsp;</p>','Moving to Singapore: An expats guide to living in Rochor','A detailed and personalised guide to living in Rochor. Plan your move to Singapore by finding the right neighbourhood for you.','Moving to Singapore, Living in Rochor, Living in Singapore, Expat,',1.30369000,103.85255500,0,8,3,7,5,8.00,4000.00,'-',1,1,19,'2020-05-05 08:10:33','2020-10-23 13:28:35',1.17762959),
	(15,'Little India','little-india','Little India','<p><span style=\"font-weight: 400;\">Living in Little India means that you&rsquo;re in the heart of an ethnic district in Singapore. This area is popular for its vibrancy, convenient location, and choice of condominium complexes. It&rsquo;s well-suited to everyone from families to couples and young professionals that are looking to begin their Singapore expat life. The area is a melting pot of various multicultural ethnic communities which makes this neighbourhood one of the most vibrant in Singapore.&nbsp;</span></p>\r\n<p><span style=\"font-weight: 400;\">Staying at Little India gives you a window into a different side of Singapore and reveals the beating heart and soul of the city. The area has a great dose of culture, unique shopping experiences, and amazing culinary adventures. There are both HDB flats and private condominiums in the area with a mix of both older and newer housing.</span></p>','<p><strong>Distance from the CBD<br /></strong><span style=\"font-weight: 400;\">Located just at the fringe of Singapore&rsquo;s bustling CBD, Little India provides great accessibility to the central region of the city. Transportation is a breeze with the multitude of bus services along with MRT stations. The closest MRT in the area is Little India, but there&rsquo;s also Farrer Park and Lavender MRT. It&rsquo;ll take about 15 minutes to get to the CBD area by public transportation, and about 10 minutes by car.</span></p>\r\n<p><strong>Living in Little India: Morning, day and night<br /></strong><span style=\"font-weight: 400;\">Start your morning going on the Little India Heritage Trail and filling your belly with some authentic thosai (rice pancake) and teh tarik (hot milk tea) in the morning. Thereafter, wander through the quaint shops selling a variety of items from flowers to Indian sweets and more. You&rsquo;ll also pass some cultural icons including Tan Teng Niah house along with Sri Veeramakaliamman Temple.&nbsp;</span></p>\r\n<p><span style=\"font-weight: 400;\">If you fancy a workout, there are a couple of gyms in the area from Dennis Gym Farrer Park that offers quality fitness coaching services to Actualize CrossFit. If you&rsquo;re a fan of F45, you&rsquo;d be happy to know that there&rsquo;s an F45 Training Farrer Park that&rsquo;ll challenge you both physically and mentally.&nbsp;</span></p>\r\n<p><span style=\"font-weight: 400;\">Then, wander through the Little Arcade &ndash; a maze of storefronts in a 1920s shophouse building before heading to the India Heritage Centre to learn more about the multifaceted history of Indians in Singapore. As the day draws to a close, dine at one of the many eateries in the area before heading to Mustafa Centre that&rsquo;s open 24 hours. The range of products available in Mustafa is insane, and you&rsquo;ve got everything from food to electronics and more.&nbsp;</span></p>\r\n<p><strong>Shop&nbsp;<br /></strong><span style=\"font-weight: 400;\">Shopping is aplenty in the Little India area from Mustafa Centre to City Square Mall and more. There&rsquo;s also The Verge Shopping Mall, Serangoon Plaza, Little India Arcade, and Tekka Centre. Shopaholics can also satisfy their shopping fix at the little stores that are peppered across the Little India neighbourhood. For some grocery shopping, Tekka Market houses the largest wet market in Singapore and has some of the freshest produce and meats that you&rsquo;ll find.&nbsp;</span></p>\r\n<p><strong>Eat&nbsp;<br /></strong><span style=\"font-weight: 400;\">It&rsquo;s of no surprise that Little India has some of the best Indian food in Singapore. Tekka Centre houses numerous food stalls offering various dishes from mutton biryani ( a rice dish) to curries and more. Other delicious places to dine at include Mavalli Tiffin Rooms for its South Indian vegetarian cuisine, Khansama for its North Indian food, and The Banana Leaf for its tantalising dishes served on banana leaves. While there&rsquo;s plenty of Indian food in the area, there&rsquo;s also a range of other cuisines from a fried oyster omelette at Berseh Food Centre to Hainanese-style curry rice at Scissors Cut Curry Rice. You&rsquo;ll be spoiled for choice in the Little India neighbourhood as there&rsquo;s just so much incredible food to choose from.&nbsp;</span></p>\r\n<p><strong>See<br /></strong><span style=\"font-weight: 400;\">There are many streets to wander around in the Little India neighbourhood, and every time you head there you&rsquo;ll feel like you&rsquo;re discovering something new. Head to Buffalo Road and you&rsquo;ll discover stores selling Indian vegetables, along with a wide range of ingredients that would be featured in an Indian recipe. There&rsquo;s also plenty of gorgeous Hindu temples such as Srinivasa Perumal Temple along with a few other temples and mosques that are worth checking out. Don&rsquo;t forget to also keep your eyes peeled for creative murals around the area that are also complemented by other artworks.&nbsp;</span></p>\r\n<p><strong>The downside<br /></strong><span style=\"font-weight: 400;\">There aren&rsquo;t that many kid-friendly places in the Little India area and there&rsquo;s also a lack of educational institutions. Rent and property prices are also moderately high in this area.&nbsp;</span></p>\r\n<p><strong>Making the most of your move to Singapore&nbsp;<br /></strong><span style=\"font-weight: 400;\">If you are in the process of planning your move, make sure you read our comprehensive and refreshed <a href=\"../../../blog/your-step-by-step-2021-moving-to-singapore-guide/\">2021 Moving to Singapore Guide</a> to learn more about the real cost of living in Singapore, what you need to prepare for and insights on family and work-life as an expat. <br /><br />You can also use our free <a href=\"https://www.haulmate.co/\">relocation dashboard </a>to discover other areas to live, chat with a community of likeminded people and begin setting up for your new life in Singapore... all before you land.&nbsp;&nbsp;</span></p>','Moving to Singapore: An expats guide to living in Little India','A detailed and personalised guide to living in Little India. Plan your move to Singapore by finding the right neighbourhood for you.','Moving to Singapore, Living in Little India, Living in Singapore, Expat, Relocation',1.30714600,103.85097100,0,9,3,6,5,5.00,4000.00,'-',1,1,19,'2020-05-05 08:12:38','2020-10-23 11:13:56',1.56351213),
	(16,'Boat Quay','boat-quay','Boat Quay','<p><span style=\"font-weight: 400;\">Living in Boat Quay means that you&rsquo;re in a neighbourhood that&rsquo;s full of cafes, bars, and plenty of nightlife. With gorgeous luxurious condominiums and modern serviced apartments, this area is great for couples or professional young expats looking to begin their Singapore expat life.&nbsp;</span></p>\r\n<p><span style=\"font-weight: 400;\">Located on the south bank of the Singapore River, Boat Quay is one of the oldest and most historical areas in Singapore&rsquo;s central region. Many of the buildings in Boat Quay have been preserved from historical times and have now been converted to places of entertainment. The neighbourhood is a gorgeous area since it&rsquo;s right by the river, and has a great balance between relaxing afternoon strolls and an exciting night scene.&nbsp;</span></p>','<p><strong>Distance from the CBD<br /><span style=\"font-weight: 400;\">Boat Quay is in very close proximity to Singapore&rsquo;s CBD. If you fancy a walk, just a short 12-minute stroll will get you to the heart of the city. Taking a bus will get you there in 11 minutes and driving will only take a mere 3 minutes. There&rsquo;s no train station in the Boat Quay area and the nearest train station is Clarke Quay. While you can take the train to the city, it&rsquo;ll take a longer time than walking or taking a bus.</span><br /><br />Living in Boat Quay: Morning, day and night<br /></strong><span style=\"font-weight: 400;\">If you like being close to the CBD, you can spend your morning taking a leisurely stroll to the office while stopping along the way for some coffee or a light breakfast. Alternatively, go for a walk or a run along the Singapore River and pass by both Clarke Quay and Robertson Quay before doing a loop back.&nbsp;</span></p>\r\n<p><span style=\"font-weight: 400;\">In the afternoon, grab some local food at <a href=\"https://www.timeout.com/singapore/restaurants/bk-eating-house\">BK Eating House</a> or have lunch with a view at any one of the cafes or restaurants situated along the river. Just a short distance away in the Chinatown area is also Hong Lim Market and Food Centre &ndash; one of the best hawker centres in Singapore serving up local delights like kaya toast and curry chicken noodles.&nbsp;</span></p>\r\n<p><span style=\"font-weight: 400;\">When the sun goes down, the Boat Quay area truly comes alive. With numerous bars and restaurants around the area, it&rsquo;s a popular hangout spot for both locals and expats alike. It&rsquo;s also in close proximity to Clarke Quay &ndash; one of the most famous nightlife spots in Singapore. Even on weeknights, some of the restaurants and bars are open till late so you won&rsquo;t have to worry about going hungry or thirsty.&nbsp;</span></p>\r\n<p><span style=\"font-weight: 400;\">If you&rsquo;re a fitness buff, you&rsquo;d be happy to know that there are plenty of fitness studios around the Boat Quay area. This includes F45, Gold&rsquo;s Gym, Yoga Movement, boxing studios, and more. These gyms are usually packed during the weekdays and are much quieter during the weekends.&nbsp;</span></p>\r\n<p><strong>Shop <br /></strong><span style=\"font-family: -apple-system, BlinkMacSystemFont, \'Segoe UI\', Roboto, Oxygen, Ubuntu, Cantarell, \'Open Sans\', \'Helvetica Neue\', sans-serif;\">Boat Quay is in close proximity to a number of malls. Riverside Point is hard to miss as it&rsquo;s got a red sign that&rsquo;s lit up at night. It&rsquo;s home to numerous independent stores, a great range of dining options, and sometimes there are even street performers that entertain the crowds.&nbsp;</span></p>\r\n<p><span style=\"font-weight: 400;\">For more shopping, you&rsquo;d need to cross over to the Clarke Quay area. Wander around the pushcarts selling knick-knacks jewellery and more or head to Central at Clarke Quay for both food and fashion-related merchandise and services.&nbsp;</span></p>\r\n<p><span style=\"font-weight: 400;\">There aren&rsquo;t many supermarkets in the surrounding Boat Quay area. The nearest supermarket is Don Don Donki (a Japanese supermarket) located at Clarke Quay&rsquo;s central mall while the nearest wet market is the Chinatown wet market.&nbsp;</span></p>\r\n<p><strong>Eat&nbsp;<br /></strong><span style=\"font-weight: 400;\">There are plenty of food options available in Boat Quay from local fare to Indian and more. If you fancy some tacos, Hombre Cantina is open till midnight and serves up some delicious authentic meals. Alternatively, head to <a href=\"https://suzuki.frp.sg/\">Ramen Bar Suzuki </a>for a solid steaming bowl of ramen. During lunchtime, they even offer a free flow of eggs, mashed potatoes, and bean sprouts for all diners.&nbsp;</span></p>\r\n<p><strong>See&nbsp;<br /></strong><span style=\"font-weight: 400;\">Wander around Boat Quay and admire the multi-coloured houses around the area that ooze personality. Head to Elgin Bridge for a great vantage point as you&rsquo;ll have a picturesque view of the CBD skyline as the buildings tower over the waterside houses. The Singapore River itself is also an attraction that you wouldn&rsquo;t want to miss, take a leisurely bumboat cruise or turn the experience into something special with dinner and drinks. For a relaxing afternoon, head to Neko no Niwa &ndash; a cat cafe that also serves up delicious drinks and desserts.&nbsp;</span></p>\r\n<p><strong>The downside<br /></strong><span style=\"font-weight: 400;\">Since Boat Quay is relatively close to the CBD it can be quite an expensive neighbourhood. It&rsquo;s also more of an expat area so if you&rsquo;re looking to have a more local experience you might want to consider living further out. The area is also not particularly family-friendly as there aren&rsquo;t that many schools nearby, and it can get slightly rowdy with the bars and nightlife in the evenings.&nbsp;</span></p>\r\n<p><strong>Making the most of your move to Singapore&nbsp;<br /></strong><span style=\"font-weight: 400;\">If you in the process of planning your move, make sure you read our comprehensive and refreshed <a href=\"../../../blog/your-step-by-step-2021-moving-to-singapore-guide/\">2021 Moving to Singapore Guide</a> to learn more about the real cost of living in Singapore, what you need to prepare for and insights on family and work-life as an expat. <br /><br />You can also use our free <a href=\"https://www.haulmate.co/\">relocation dashboard </a>to discover other areas to live, chat with a community of likeminded people and begin setting up for your new life in Singapore... all before you land.&nbsp;&nbsp;<br /></span></p>\r\n<p>&nbsp;</p>','Moving to Singapore: An expats guide to living in Boat Quay','A detailed and personalised guide to living in Boat Quay. Plan your move to Singapore by finding the right neighbourhood for you.','Moving to Singapore, Boat Quay, Living in Singapore, Expat',1.28621100,103.85048800,0,12,6,12,5,5.00,5000.00,'-',1,4,24,'2020-05-05 08:14:10','2020-10-23 09:50:15',0.78343529),
	(17,'Raffles Place','raffles-place','Raffles Place','<p><span style=\"font-weight: 400;\">Living in Raffles Place means that you&rsquo;re in an area that&rsquo;s right in the main financial and business hub of the country. While the concentration of residential properties may be lower in the area due to its commercial nature, there are still quite a few swanky condominiums in the area. With office, retail, and entertainment options at your doorstep, Raffles Place is great for professionals and young couples looking to begin their Singapore expat life.&nbsp;</span></p>\r\n<p><span style=\"font-weight: 400;\">Raffles Place has it all from spectacular skylines to dazzling waterfront views and a slew of A-list clubs. It&rsquo;s the financial heart of Singapore and is home to a large concentration of both local and international businesses. If you choose to live in the Raffles Place area you&rsquo;ll have no shortage of both dining and entertainment options. Be prepared to also deal with the crowds during the weekdays as bars and restaurants are generally crowded. During the weekends, however, the Raffles Place area is relatively quiet as most restaurants and cafes are closed.&nbsp;</span></p>','<p><strong>Distance from the CBD<br /></strong><span style=\"font-weight: 400;\">Raffles Place is in the CBD area so there&rsquo;s no need to take public transportation. If you&rsquo;d like to head to another part of Singapore, you can head to Raffles Place MRT Station or take any one of the many bus services that run along Raffles Place.<br /><br /></span><strong>Living in Raffles Place: Morning, day and night<br /></strong><span style=\"font-weight: 400;\">Spend your morning strolling along the waterfront and taking in the incredible views of the Singapore skyline. Quite a number of Singaporeans also enjoy biking along the waterfront. There&rsquo;s also a plethora of gyms in the Raffles Place area to cater to different audiences. There&rsquo;s Platinum Fitness for those that are looking for a premium gym experience that doesn&rsquo;t break the bank, and Ritual Gym &ndash; a 30-minute gym that&rsquo;s perfect for exercise newbies that have a packed schedule.&nbsp;</span></p>\r\n<p><span style=\"font-weight: 400;\">In the afternoon, head to one of the many cafes in the area or push through the crowds during the weekdays to grab your favourite local dish from one of the many hawker centres in the area. If you&rsquo;re looking for leisure activities, there&rsquo;s the Boeing 737 Flight Experience to learn how to fly a plane with a high-tech flight simulation or theNERF Action Xperience for its capture the flag battle that&rsquo;s complete with obstacles.&nbsp;</span></p>\r\n<p><span style=\"font-weight: 400;\">If you&rsquo;re at Raffles Place on a weekend, the best thing to do is head to a bar or a pub &ndash; especially if you enjoy mingling with people. There&rsquo;s plenty of bars in this area from 1-Altitude Gallery &amp; Bar, the world&rsquo;s highest al-fresco bar that&rsquo;ll give you a 360-degree view of Singapore to the Empire, an upscale rooftop bar and lounge that also has panoramic views. You&rsquo;ll be able to watch the cityscape light up amidst plush surrounds. Another bar to hit up is the Lantern Rooftop Bar that&rsquo;s stylish with sensual beats and serves refreshing cocktails and gourmet snacks.&nbsp;</span></p>\r\n<p><strong>Shop&nbsp;<br /></strong><span style=\"font-weight: 400;\">There are a couple of shopping malls at Raffles Place from One Raffles Place that&rsquo;s located above Raffles Place MRT to Raffles City Mall. Each of these malls comes with a wide range of dining, shopping, and leisure options. Raffles City Mall also has a supermarket to satisfy all your grocery needs and is linked directly to the City Hall MRT interchange station and the Esplanade MRT station along with the Circle Line.&nbsp;</span></p>\r\n<p><strong>Eat&nbsp;<br /></strong><span style=\"font-weight: 400;\">There are a plethora of dining options at Raffles Place. Lau Pa Sat Food Court is one of the most popular hawker centres amongst locals and tourists alike. There&rsquo;s plenty of authentic Singaporean food here and you&rsquo;ll want to try some delicious sticks of satay (grilled sticks of meat) from one of the many vendors. Other places to eat include Kinki Restaurant + Bar for its modern Japanese dishes, Salmon Samurai for its fresh salmon donburi, and Hans Im Gl&uuml;ck for healthy, nutritious vegetarian burgers. The Raffles Place area also has several salad and sandwich options for the health-conscious.&nbsp;</span></p>\r\n<p><strong>See<br /></strong><span style=\"font-weight: 400;\">Most of the Raffles Place area is dominated by skyscrapers, and the view here is incredible. As you walk along the Raffles Place area, however, you&rsquo;ll spot the Esplanade along with Fullerton Hotel, a luxurious five-star hotel that has stunning neoclassical architecture. For those that love all things artsy, check out The Art House for its extensive range of film, music, theatre, and more. The UOB Art Gallery also provides a creative respite and you can appreciate the works in the UOB Art Collection.&nbsp;</span></p>\r\n<p><strong>The downside<br /></strong><span style=\"font-weight: 400;\">This area is more of a commercial and financial area so there aren&rsquo;t that many residential buildings and you won&rsquo;t get the whole homely neighbourhood feel. Since it&rsquo;s in the heart of the financial district, rental prices don&rsquo;t come cheap. It can also be crowded during the weekdays, and traffic can be insane.&nbsp;</span></p>\r\n<p><strong>Making the most of your move to Singapore&nbsp;<br /></strong><span style=\"font-weight: 400;\">If you are in the process of planning your move, make sure you read our comprehensive and refreshed <a href=\"../../../blog/your-step-by-step-2021-moving-to-singapore-guide/\">2021 Moving to Singapore Guide</a> to learn more about the real cost of living in Singapore, what you need to prepare for and insights on family and work-life as an expat. <br /><br />You can also use our free <a href=\"https://www.haulmate.co/\">relocation dashboard </a>to discover other areas to live, chat with a community of likeminded people and begin setting up for your new life in Singapore... all before you land.&nbsp;&nbsp;<br /></span></p>\r\n<p>&nbsp;</p>','Moving to Singapore: An expats guide to living in Raffles Place','A detailed and personalised guide to living in Raffles Place. Plan your move to Singapore by finding the right neighbourhood for you.','Moving to Singapore, Living in Raffles Place, Living in Singapore, Expat, Relocation',1.28392600,103.85100100,0,10,6,9,5,5.00,5000.00,'-',1,0,24,'2020-05-05 08:16:02','2020-10-23 13:07:16',1.02572453),
	(18,'Telok Ayer','telok-ayer','Telok Ayer','<p><span style=\"font-weight: 400;\">Telok Ayer is a thriving hotspot that draws in locals and expats alike. Living in Telok Ayer puts you within the reaches of Chinatown. The neighbourhood is home to some of Singapore&rsquo;s best food and hippest nightspots - making it an ideal place for young expats moving to Singapore. It is especially popular among singles and couples as you&rsquo;ll never round out of ideas for a date.</span></p>\r\n<p><span style=\"font-weight: 400;\">The neighbourhood is steeped in history, being one of the earliest commercial laneways in Singapore. Many of the shophouses here have been restored and are under conservation to preserve the unique architecture of the area that is influenced by Chinese and colonial English design. This is a major draw for expats who love a bit of new and old.</span></p>','<p><strong>Distance from the CBD<br /></strong><span style=\"font-weight: 400;\">Telok Ayer is right at the heart of central Singapore. If you&rsquo;re not already walking to work, you can take the MRT. Telok Ayer is part of the blue line. Head over to the nearby Chinatown MRT to access the purple and blue lines. You could also easily head to Outram Park Station which gives you access to the green, purple and brown lines - or simply catch a car ride which will take you about 10 to 15 minutes to get to the city.<br /></span><strong><br />Living in Telok Ayer: Morning, day and night<br /></strong><span style=\"font-weight: 400;\">If you value closeness to the CBD and popular gathering spots, Telok Ayer may be the neighbourhood for you. Mornings generally begin with a leisurely stroll to the office, stopping by for coffee and some light bites along the way. While the location is often reflected in the rental that you pay, remember that you&rsquo;re hardly forking out anything for transportation costs.</span></p>\r\n<p><span style=\"font-weight: 400;\"><a href=\"https://thehoneycombers.com/singapore/lau-pa-sat-singapore/\" target=\"_blank\" rel=\"noopener\">Lau Pa Sat</a> or Telok Ayer Market is a haven for foodies and is one of the oldest markets and most known markets in Singapore. This octagonal establishment houses some of Singapore&rsquo;s most acclaimed hawker delights. Resist the urge to eat everything in sight and take some time to appreciate the Victorian influenced architecture.</span></p>\r\n<p><span style=\"font-weight: 400;\">Just as you would expect, Telok Ayer truly comes alive as the sun goes down. With all the bars and restaurants around the area, it is one of the most popular hangout spots for expats after clocking out from work. Even on mellower weeknights, many of the eateries are open till late. You&rsquo;ll never have to worry about going hungry or thirsty again.</span></p>\r\n<p><span style=\"font-weight: 400;\">There are a number of gyms and fitness studios around the area. This includes an F45 gym, independently owned yoga studios, as well as chain gyms like Fitness First and Anytime Fitness. Weekends can be surprisingly quiet as many white-collar workers prefer to retreat to suburban life when they can.&nbsp;&nbsp;</span></p>\r\n<p><strong>Shop&nbsp;<br /></strong><span style=\"font-weight: 400;\">Telok Ayer is within the vicinity of a number of malls. Notable ones include Cross Street Exchange and Far East Square. For a more unique shopping experience, some of the shoplots function as boutiques, salons and gifts shops.&nbsp;</span></p>\r\n<p><strong>Eat&nbsp;<br /></strong><span style=\"font-weight: 400;\">Food from every corner of the world can be found at Telok Ayer. Many of the bars and eateries are owned by expats, so you know you&rsquo;re getting the real deal. As for Singaporean food, you&rsquo;ll find some of the best on Amoy Street and Telok Ayer Rd. Soon you&rsquo;ll be able to distinguish the so-so from the truly outstanding local food.&nbsp;</span></p>\r\n<p><strong>See&nbsp;<br /></strong><span style=\"font-weight: 400;\">Telok Ayer is not just about eating and partying. You&rsquo;ll come across temples, a church and a mosque. The Thian Hock Kheng temple is the oldest Hokkien temple in Singapore and definitely worth visiting while you&rsquo;re exploring the area.</span></p>\r\n<p><strong>The downside<br /></strong><span style=\"font-weight: 400;\">Living close to the CBD has its perks although you may end up being too comfortable in the neighbourhood. There are plenty of opportunities to socialise here, making the need to travel a hassle. If you intend to explore more of Singapore, then consider living further out.<br /></span></p>\r\n<p><strong>Making the most of your move to Singapore&nbsp;<br /></strong><span style=\"font-weight: 400;\">If you are in the process of planning your move, make sure you read our comprehensive and refreshed <a href=\"../../../blog/your-step-by-step-2021-moving-to-singapore-guide/\">2021 Moving to Singapore Guide</a> to learn more about the real cost of living in Singapore, what you need to prepare for and insights on family and work-life as an expat. <br /><br />You can also use our free <a href=\"https://www.haulmate.co/\">relocation dashboard </a>to discover other areas to live, chat with a community of likeminded people and begin setting up for your new life in Singapore... all before you land.&nbsp;&nbsp;</span></p>','Moving to Singapore: An expats guide to living in Telok Ayer','A detailed and personalised guide to living in Telok Ayer. Plan your move to Singapore by finding the right neighbourhood for you.','Moving to Singapore, Living in Telok Ayer, Living in Singapore, Expat',1.28102100,103.84765100,0,15,7,9,5,5.00,4250.00,'-',1,3,19,'2020-05-05 08:17:11','2020-10-23 13:50:06',1.42547222),
	(19,'Tanjong Pagar','tanjong-pagar','Tanjong Pagar','<p><span style=\"font-weight: 400;\">Living in Tanjong Pagar means that you&rsquo;re situated right in the CBD and surrounded by both charming historic shophouses and the tall glass towers of Raffles Place. In this area, there&rsquo;s a mix of both HDB flats along with condominiums and landed housing. The Tanjong Pagar area is suited to everyone, but especially couples and single professionals looking to begin their expat life in Singapore.&nbsp;</span></p>\r\n<p><span style=\"font-weight: 400;\">There are loads of eating and drinking options at Tanjong Pagar along with independent boutique shopping. You&rsquo;ve got access to everything you need from retail malls to cafes, entertainment options to gyms, and more. It&rsquo;s no wonder that this area has soared in popularity in recent years and plenty of expats have made the Tanjong Pagar area their base.&nbsp;</span></p>','<p><strong>Distance from the CBD<br /></strong><span style=\"font-weight: 400;\">Tanjong Pagar is part of the CBD, and since it&rsquo;s in a central location it&rsquo;s one of the most convenient places in Singapore. Transportation is convenient and highly accessible since it&rsquo;s near major roads. Some MRT stations near Tanjong Pagar include Tanjong Pagar MRT, Raffles Place MRT, Telok Ayer MRT, and Outram Park MRT.<br /></span><strong><br />Living in Tanjong Pagar: Morning, day and night<br /></strong><span style=\"font-weight: 400;\">Since Tanjong Pagar area is an urban area that&rsquo;s rich in cultural and built heritage, there&rsquo;s plenty to do in this area. Start your morning at one of the many coffee shops to enjoy a hearty brunch. Then, take your time to explore the heritage streets of the neighbourhood that&rsquo;s scattered with boutiques, charming galleries, and more. Pop into the Huggs-Epigram Coffee Bookshop to pick up a book that&rsquo;s written by a local Singapore author. Thereafter, walk down Telok Ayer Street to find Al-Abrar Mosque, Nagore Dargah, and Thian Hock Keng Temple that&rsquo;s all lined up next to each other.&nbsp;</span></p>\r\n<p><span style=\"font-weight: 400;\">Tanjong Pagar is a great place to work up a sweat as there are lots of boutique gyms in the area. Head for a quick session of Pilates at Pilates Bodytree or go to Gold&rsquo;s Gym at Tanjong Pagar Road for a quality no-frills experience. If you&rsquo;d like to workout at a larger gym, there are also two Fitness First outlets in the vicinity along with a Virgin Active Gym that has a 30m outdoor pool with gorgeous views. Since Tanjong Pagar is also colloquially known as Little Korea, dine at one of the many Korean restaurants and eateries in the area after your workout.&nbsp;</span></p>\r\n<p><span style=\"font-weight: 400;\">In the evening, Tanjong Pagar comes alive with its vibrant night scene. The nightlife here is vastly different from Clarke Quay however, as the focus is less on clubs and a little more on pubs and bars. One particularly interesting bar bistro is Ding Dong which serves up locally inspired cocktails that are delicious. If you like to dance, Kilo Lounge is one of the coolest underground clubs in Singapore and is worth checking out. Just nearby the Tanjong Pagar Area is Ann Siang Hill which also has a slew of pubs, bars, and clubs.&nbsp;</span></p>\r\n<p><strong>Shop&nbsp;<br /></strong><span style=\"font-weight: 400;\">There are many shopping centres at the Tanjong Pagar area &ndash; each with its distinct mix of shops. First up you&rsquo;ve got Tanjong Pagar Centre that has a range of restaurants along with premium grocer Little Farms. Then, you&rsquo;ve also got 100 AM that has both a local supermarket and a Japanese supermarket along with a Watsons pharmacy. For a more traditional heartland experience, head over to Tanjong Pagar Plaza that has a supermarket on the first floor. Finally, you&rsquo;ve got International Plaza for less mainstream shops and boutiques.&nbsp;</span></p>\r\n<p><strong>Eat&nbsp;<br /></strong><span style=\"font-weight: 400;\">Like most of the neighbourhoods in Singapore, you&rsquo;ll never run out of food options at Tanjong Pagar. There are so many eateries, cafes, and restaurants littered around the area that you won&rsquo;t even know where to begin. Tanjong Pagar also has one of the most popular hawker centres in Singapore &ndash; Maxwell Food Centre. Locals and tourists alike queue up for the chicken rice from Tian Tian Hainanese Chicken Rice or grab other local delights at Maxwell Fuzhou Oyster Cake and Zhen Zhen Porridge.&nbsp;</span></p>\r\n<p><strong>See<br /></strong><span style=\"font-weight: 400;\">You can spend a few days just wandering around the entire Tanjong Pagar area as there&rsquo;s so much to see. You can head into Baba House &ndash; a traditional Peranakan terrace house that showcases Peranakan history and heritage. The Red Dot Design Museum is also a great space for design fanatics to visit. If you&rsquo;re looking for a bit of greenery, the 50th-storey Skybridge and Sky Garden at Pinnacle@Duxton houses the longest sky garden in the world. There are also some parks scattered around the area such as The Duxton Plain Park and the Pioneers trail that runs through Telok Ayer Green and Ann Siang Hill Park.&nbsp;</span></p>\r\n<p><strong>The downside<br /></strong><span style=\"font-weight: 400;\">Since it&rsquo;s situated right in the CBD, prices here are generally more expensive than the rest of the city. There are also only a couple of schools within the area, and there are no hospitals or polyclinics within the Tanjong Pagar area, only private clinics.&nbsp;<br /><br /></span><strong>Making the most of your move to Singapore&nbsp;<br /></strong><span style=\"font-weight: 400;\">If you are in the process of planning your move, make sure you read our comprehensive and refreshed <a href=\"../../../blog/your-step-by-step-2021-moving-to-singapore-guide/\">2021 Moving to Singapore Guide</a> to learn more about the real cost of living in Singapore, what you need to prepare for and insights on family and work-life as an expat. <br /><br />You can also use our free <a href=\"https://www.haulmate.co/\">relocation dashboard </a>to discover other areas to live, chat with a community of likeminded people and begin setting up for your new life in Singapore... all before you land.&nbsp;&nbsp;<br /></span></p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p><span style=\"font-weight: 400;\"><br /><br /><br /></span></p>','Moving to Singapore: An expats guide to living in Tanjong Pagar','A detailed and personalised guide to living in Tanjong Pagar. Plan your move to Singapore by finding the right neighbourhood for you.','Moving to Singapore, Living in Tanjong Pagar, Living in Singapore, Expat,',1.27786900,103.84272700,0,11,7,5,5,8.00,4250.00,'-',1,2,19,'2020-05-05 08:19:40','2020-10-23 13:47:48',1.97916284),
	(21,'Novena','novena','Novena','<p><span style=\"font-weight: 400;\">Novena with its educational institutions, large malls, medical facilities and religious establishments makes it one of the most wholesome neighbourhoods for families moving to Singapore. Its closeness to the CBD and mix of new and relatively larger condos also makes it a huge draw for expats and locals alike.</span></p>\r\n<p><span style=\"font-weight: 400;\">You&rsquo;ll also find a wide variety of housing options in Novena. HDBs and condos are popular choices for young couples, while bigger families may even consider landed property. </span></p>','<p><strong>Distance from the CBD<br /></strong><span style=\"font-weight: 400;\">If you drive, it only takes about 10 to 20 minutes to get to the CBD. Novena is part of the red line, which can quickly get you to Orchard and other central locations. Aside from work, most of what you need can be found if you&rsquo;re living in Novena, minimising the need for frequent travel.</span></p>\r\n<p><strong>Living in Novena: Morning, day and night<br /></strong><span style=\"font-weight: 400;\">If you&rsquo;re not driving to work and have some time to spare, you&rsquo;ll want to start your day at the <a href=\"http://www.twomenbagels.com/\" target=\"_blank\" rel=\"noopener\">Two Men Bagel House</a>. Outlet opens at 8am on weekdays and you won&rsquo;t miss the line of early commuters queuing up for a wholesome breakfast of freshly baked bagels and aromatic coffee.</span></p>\r\n<p><span style=\"font-weight: 400;\">If you&rsquo;re in the mood for a daytime adventure, Novena is conveniently located close to the Botanical Gardens and Macritchie park. Too much of city life can be overwhelming and these nature-filled trails can offer a much needed change of scenery.</span></p>\r\n<p><span style=\"font-weight: 400;\">As the evening approaches, you&rsquo;ll start to see families spending time at the public parks. There are many trails you can take for some light cycling or a jog. End your day by treating yourself at one of the many local or western restaurants around.</span></p>\r\n<p><strong>Shop&nbsp;<br /></strong><span style=\"font-weight: 400;\">Novena is a suburban shopper&rsquo;s paradise. Though the malls may not be as flashy as the ones you&rsquo;ll find along Orchard Road, many of the malls in Novena are charming and provide enough options to satisfy those in need of retail therapy.&nbsp;</span></p>\r\n<p><span style=\"font-weight: 400;\">Those looking for sports-related goods can easily find them at Velocity and Decathlon. Don Don Donki was recently opened up at Square 2, giving you access to affordable Japanese items and food.&nbsp;</span></p>\r\n<p><strong>Eat&nbsp;<br /></strong><span style=\"font-weight: 400;\">The malls around Novena offer a fair selection of mid-range priced meals, these are the safer options. But along the shop lots and shophouses, are hidden gems that will surely make an impression. Chye Kee Chicken Rice is a popular lunchtime spot for its beautifully seasoned meats. Another local favourite is 328 Katong Laksa, which offers the perfect comfort food, day or night. For a more international fare, look out for Baan Ying, which offers exceptional Thai food or De Luca Restaurant for authentic Italian food.</span></p>\r\n<p><strong>See&nbsp;<br /></strong><span style=\"font-weight: 400;\">Novena is a neighbourhood of tall, shiny buildings and intricately designed churches. Make it a point to step inside some of these establishments as they are just as astounding on the outside as they are inside.&nbsp;</span></p>\r\n<p><span style=\"font-weight: 400;\">Now that you have worked up an appetite for impressive architecture. You may want to include the housing areas around Novena as part of your tour. Along the way, you&rsquo;ll come across multi-million dollar properties, giving you a peek at the lives of Singapore&rsquo;s crazy rich-types.&nbsp;</span></p>\r\n<p><strong>The downside<br /></strong><span style=\"font-weight: 400;\">Living in Novena can be costly. Rental aside, dining, shopping and club memberships can add up quickly. While it is close to the CBD some travelling is still required, which means you would still have to commute via taxi, MRT or bus. This adds to your cost of living. If you&rsquo;re moving to Singapore as a single person, many of the nearby conveniences may not be relevant to you. It may be wiser to live in a more affordable neighbourhood.<br /><br /></span></p>\r\n<p><strong>Making the most of your move to Singapore&nbsp;<br /></strong><span style=\"font-weight: 400;\">If you are in the process of planning your move, make sure you read our comprehensive and refreshed <a href=\"../../../blog/your-step-by-step-2021-moving-to-singapore-guide/\">2021 Moving to Singapore Guide</a> to learn more about the real cost of living in Singapore, what you need to prepare for and insights on family and work-life as an expat. <br /><br />You can also use our free <a href=\"https://www.haulmate.co/\">relocation dashboard </a>to discover other areas to live, chat with a community of likeminded people and begin setting up for your new life in Singapore... all before you land.&nbsp;&nbsp;</span></p>\r\n<p><span style=\"font-weight: 400;\"><br /><br /><br /></span></p>','Moving to Singapore: An expats guide to living in Novena','A detailed and personalised guide to living in Novena. Plan your move to Singapore by finding the right neighbourhood for you.','Moving to Singapore, Living in Novena, Living in Singapore, Expat,',1.32264400,103.83715900,0,6,0,4,3,8.00,3400.00,'-',1,2,19,'2020-05-05 08:26:14','2020-10-23 12:41:18',3.67008907),
	(22,'Robertson Quay','robertson-quay','Robertson Quay','<p>Situated along the Singapore river, Robertson Quay is one of the most popular residential spots for expats living in Singapore. The air here seems breezier, especially when the sun goes down and the night scene comes to life. Live music, busy restaurants and expertly mixed drinks are easy to find.&nbsp; Living in Robertson Quay is ideal for those who love spectacular views, day and night. Expats also love that there is never a shortage of dining options around the area. The residential properties you&rsquo;ll find at Robertson Quay consists mainly of condos, many of which are beautifully designed to match this upscale neighbourhood.</p>','<p><strong>Distance from the CBD:<br /></strong><span style=\"font-weight: 400;\">The closest MRT station to Robertson Quay is Fort Canning. Getting here is a bit of a hike so you may want to consider taking a bus. The fastest and most convenient option will be to take a taxi which will take about 10 minutes to get you to the CBD.<br /></span></p>\r\n<p><strong>Living in </strong><strong>Robertson Quay</strong><strong>: Morning, day and night<br /></strong><span style=\"font-weight: 400;\">On weekend mornings, expats and locals flock to the cafes along the Singapore River for brunch. The fresh air, coupled with the aroma of freshly baked pastry and coffee is simply too much to resist, especially if you are a resident of the area. Morning joggers along the river are a common sight.</span></p>\r\n<p><span style=\"font-weight: 400;\">If you&rsquo;re feeling adventurous, you could visit the nearby Fort Canning park. This large park consists of 9 historical gardens, with a wide variety of neatly manicured flora. If you would rather avoid the sun, you could visit the Asian Civilizations Museum for an interactive lesson on historical Asian art.</span></p>\r\n<p><span style=\"font-weight: 400;\">Evenings are something to look forward to in this neighbourhood. Even on weeknights, many of the restaurants and pubs are busy. Dinnertime becomes an occasion as there are always musical performances within earshot. A stroll along the river is also the best way to walk off a satisfying meal and catch the evening breeze.</span></p>\r\n<p><strong>Shop&nbsp;<br /></strong><span style=\"font-weight: 400;\">Many of the residences go to UE Square for their groceries. Alternatively, there are a number of FairPrice supermarkets close by. You can also walk to Central Mall which has a Don Donki for Japanese groceries, or head to Chinatown Point. If you&rsquo;re serious about your shopping, Orchard road is merely 10 minutes away.&nbsp;&nbsp;</span></p>\r\n<p><strong>Eat&nbsp;<br /></strong><span style=\"font-weight: 400;\">The experience of <a href=\"https://thehoneycombers.com/singapore/robertson-quay-singapore-guide/\" target=\"_blank\" rel=\"noopener\">dining around Robertson Quay</a> is further enhanced by its riverside appeal. For beach vibes and Mediterranean soul food, you can check out Summerlong. Sports lovers can head over to Boomerang, an Australian pub that plays every sport imaginable on its screens. Other international choices include Shunjuu Izakaya, Super Loco or Wolfgang&rsquo;s Steakhouse.&nbsp;</span></p>\r\n<p><strong>See&nbsp;<br /></strong><span style=\"font-weight: 400;\">For a serene day along the river, there is a Singapore River Cruise that will provide you with many beautiful snapshots of Downtown, all the way to Marina Bay. You can also conduct your own tour on foot, as the path leads you all the way to the iconic Marina Bay Sands.</span></p>\r\n<p><strong>The downside<br /></strong><span style=\"font-weight: 400;\">Robertson Quay is an upscale neighbourhood that is situated within minutes of some of Singapore&rsquo;s most busiest business districts. Many of the residents are wealthy as reflected in the price range of meals around the vicinity. You&rsquo;ll also want to factor in transportation costs as the MRT stations are quite a distance away from the residential area. Before deciding to move to this area, consider how much you can afford as costs can escalate quickly.</span></p>\r\n<p><strong>Making the most of your move to Singapore&nbsp;<br /></strong><span style=\"font-weight: 400;\">If you are in the process of planning your move, make sure you read our comprehensive and refreshed <a href=\"../../../blog/your-step-by-step-2021-moving-to-singapore-guide/\">2021 Moving to Singapore Guide</a> to learn more about the real cost of living in Singapore, what you need to prepare for and insights on family and work-life as an expat. <br /><br />You can also use our free <a href=\"https://www.haulmate.co/\">relocation dashboard </a>to discover other areas to live, chat with a community of likeminded people and begin setting up for your new life in Singapore... all before you land.&nbsp;&nbsp;</span></p>','Moving to Singapore: An expats guide to living in Robertson Quay','A detailed and personalised guide to living in Roberston Quay. Plan your move to Singapore by finding the right neighbourhood for you.','Moving to Singapore, Living in Robertson Quay, Living in Singapore, Expat,',1.29202700,103.83841600,0,6,3,6,5,8.00,4250.00,'-',1,4,24,'2020-05-05 08:28:26','2020-10-23 13:24:47',1.50831055),
	(23,'Clarke Quay','clarke-quay','Clarke Quay','<p><strong>Clarke Quay&nbsp;<br /></strong><span style=\"font-weight: 400;\">Pronounced as Clarke &lsquo;Key&rsquo; and not &lsquo;kueh&rsquo;, living in Clarke Quay means that you&rsquo;re located in the city&rsquo;s traditional centre on the banks of the Singapore River with plenty of nightlife. With several condominium complexes available in this area along with residential properties, this is the perfect area for young couples or single professionals looking to begin their Singapore expat life.&nbsp;</span></p>\r\n<p><span style=\"font-weight: 400;\">Clarke Quay is one of Singapore&rsquo;s uniquely conserved historical landmarks that&rsquo;s gorgeous during the day with beautiful colonial-era architecture. In the evenings, the area comes alive as it houses some of Singapore&rsquo;s most famous bars and nightclubs. Both locals and tourists alike consider Clarke Quay to be the ultimate destination for an exciting night scene.&nbsp;<br /></span></p>','<p><strong>Distance from the CBD<br /></strong><span style=\"font-weight: 400;\">Clarke Quay is situated at the fringe of Singapore&rsquo;s CBD. To get to the CBD, you can either take the MRT from Clarke Quay MRT Station or the newly opened Fort Canning MRT Station and it&rsquo;ll take about 20 minutes. Alternatively, it&rsquo;ll only take about 5-10 minutes by car, or 20 minutes on foot if you fancy a walk.&nbsp;<br /><br /></span><strong>Living in Clarke Quay: Morning, day and night<br /></strong><span style=\"font-weight: 400;\">Since <a href=\"https://www.timeout.com/singapore/things-to-do/a-ultimate-guide-to-clarke-quay\" target=\"_blank\" rel=\"noopener\">Clarke Quay</a> is situated right by the Singapore River, it&rsquo;s a great spot to go for a light jog in the morning. You&rsquo;ll get to run past all the restored shophouses and warehouses with funky art-deco structures. There&rsquo;s also plenty of exercise options at Clarke Quay from Fitness First One George &ndash; a gorgeous gym that has breathtaking views of the Singapore River, boutique private gym Energia and popular US-based gym, Orangetheory.&nbsp;</span></p>\r\n<p><span style=\"font-weight: 400;\">In the afternoon, go for a wander around the area by riding on one of the bumboats situated along the Singapore River to get a good tour of Singapore&rsquo;s various landmarks. There&rsquo;s also plenty of dining options in the Clarke Quay area so you can head to one of the cafes or restaurants peppered along the river.&nbsp;</span></p>\r\n<p><span style=\"font-weight: 400;\">In the evening, Clarke Quay transforms into an area with boisterous nightlife. Two of Singapore&rsquo;s biggest nightclubs, Zouk and Atttica, are both located within this vicinity and F. Club is another popular venue that&rsquo;s worth exploring for its interesting interiors. There&rsquo;s also plenty of other clubs in the area for an electrifying good time along with bars such as Chupitos Shots Bar, Crazy Elephant, and Level Up, Singapore&rsquo;s first-ever arcade bar.&nbsp;</span></p>\r\n<p><span style=\"font-weight: 400;\">Dining options in this area are also open till late so you&rsquo;ll have plenty of food options if you&rsquo;re feeling peckish after a night out.&nbsp;</span></p>\r\n<p><strong>Shop&nbsp;<br /></strong><span style=\"font-weight: 400;\">Clarke Quay has access to plenty of amenities and local shopping options. Some nearby malls include Japanese-themed Liang Court, Valley Point, and Riverside Point. Just right above Clarke Quay MRT Station is Clarke Quay Central, a large shopping mall with plenty of independent retail outlets, restaurants, and waterfront dining options.&nbsp;</span></p>\r\n<p><span style=\"font-weight: 400;\">Just a short walk up from Clarke Quay Station is Funan DigitalLife Mall, a great place to head to if you&rsquo;re looking for reasonably priced electrical gadgets from cameras to computers and more. There&rsquo;s also plenty of retail shops along the streets of Clarke Quay so feel free to immerse yourself in the bustling market atmosphere as you take a walk through the quaint shophouses and pushcarts. While slightly outside of the Clarke Quay vicinity, there are also other malls such as UE Shopping Mall, and Great World City &ndash; a six-story complex that has a six-screen cinema along with two supermarkets to satisfy all your grocery needs.&nbsp;</span></p>\r\n<p><strong>Eat&nbsp;<br /></strong><span style=\"font-weight: 400;\">While food options are aplenty at Clarke Quay, it&rsquo;s mostly restaurants and there aren&rsquo;t that many hawker centres in the area. That being said, there&rsquo;s a variety of flavours to choose from in Clarke Quay from seafood restaurants to Chinese, Indian, and even British pub food. If you&rsquo;re looking to dine close to the river, Tongkang Riverboat Dining has a bumboat docked to the side and serves fresh seafood prepared by professional Chefs. Don&rsquo;t miss the ramen at Ramen Keisuke Lobster King as their Lobster Broth Ramen is incredibly delicious.&nbsp;</span></p>\r\n<p><strong>See<br /></strong><span style=\"font-weight: 400;\">Clarke Quay&rsquo;s an area bursting with history so there&rsquo;s plenty to see. Go on a Singapore River Cruise to see Singapore in its sparkling light, and soak in the dazzling sights of this metropolis. If you&rsquo;re looking for something thrilling to do in Clarke Quay, take the GX-5 extreme swing that&rsquo;ll fall from 50 meters and reach some blistering fast speeds, or try the G-Max Adrenaline Bungy that falls from 80 meters. There&rsquo;s also plenty to see around the Clarke Quay area from the nearby Fort Canning Park to the Old Hill Street Police Station with its rainbow-painted windows.&nbsp;</span></p>\r\n<p><strong>The downside<br /></strong><span style=\"font-weight: 400;\">This neighbourhood can be relatively pricey as it&rsquo;s a rather touristy area. It can also get crowded and noisy during the weekends due to its close proximity to several international hotel chains and nightlife. It&rsquo;s generally not a great neighbourhood for families since it&rsquo;s a nightlife-centric area, and there aren&rsquo;t that many schools in the vicinity.&nbsp;<br /><br /></span><strong>Making the most of your move to Singapore&nbsp;<br /></strong><span style=\"font-weight: 400;\">If you are in the process of planning your move, make sure you read our comprehensive and refreshed <a href=\"../../../blog/your-step-by-step-2021-moving-to-singapore-guide/\">2021 Moving to Singapore Guide</a> to learn more about the real cost of living in Singapore, what you need to prepare for and insights on family and work-life as an expat. <br /><br />You can also use our free <a href=\"https://www.haulmate.co/\">relocation dashboard </a>to discover other areas to live, chat with a community of likeminded people and begin setting up for your new life in Singapore... all before you land.&nbsp;&nbsp;<br /></span></p>\r\n<p>&nbsp;</p>\r\n<p><span style=\"font-weight: 400;\"><br /><br /><br /></span></p>','Moving to Singapore: An expats guide to living in Clarke Quay','A detailed and personalised guide to living in Clarke Quay. Plan your move to Singapore by finding the right neighbourhood for you.','Moving to Singapore, Living in Clarke Quay, Living in Singapore, Expat,',1.29086300,103.84671400,0,8,3,13,5,5.00,4250.00,'-',1,4,24,'2020-05-05 08:29:57','2020-10-23 10:32:54',0.63299823),
	(24,'Paya Lebar','paya-lebar','Paya Lebar','<p><span style=\"font-weight: 400;\">Living in Paya Lebar means that you&rsquo;re nestled between the bustling CBD and the charming East Coast. It&rsquo;s an eclectic neighbourhood that&rsquo;s the perfect starting point for all sorts of adventures. Paya Lebar is great for anyone that&rsquo;s looking to begin their Singapore expat life, but it&rsquo;s particularly suited to those that want to immerse themselves in the real local flavours of living in a Singaporean community.&nbsp;</span></p>\r\n<p><span style=\"font-weight: 400;\">You&rsquo;ve got everything in Paya Lebar from heritage shophouses to cool cafes. The area exudes local charm and nostalgia, and it&rsquo;s strikingly different from the glitz and glamor of other neighbourhoods in Singapore. While there might be a lack of schools in the neighbourhood, convenient school bus shuttles operate nearby. Most of the housing in the Paya Lebar area consists of older HDB estates, but there are also condominiums peppered around the area.&nbsp;</span></p>','<p><strong>Distance from the CBD<br /><span style=\"font-weight: 400;\">Paya Lebar is situated in the Eastern region of Singapore and the nearest MRT station is Paya Lebar MRT. You&rsquo;ll be able to get to the CBD in 30-40 minutes by MRT or bus, and in about 15-25 minutes by car.&nbsp;</span><br /><br />Living in Paya Lebar: Morning, day and night<br /></strong><span style=\"font-weight: 400;\">Start your morning at Paya Lebar by exploring the distinctive shophouses, hawker centers, and religious landmarks. With its rich and diverse history, Paya Lebar is a dream come true for heritage lovers. If you&rsquo;d like to get a workout in, there are plenty of options for you in this area. The Singapore Sports Hub houses an Olympic-sized swimming pool and even a water adventure park where you can take surfing lessons.&nbsp;</span></p>\r\n<p><span style=\"font-weight: 400;\">Once you&rsquo;re done head to Onsight Climbing Gym that has over 100 different climbing routes and surfaces for bouldering. Other gyms in the area include Fitness First Paya Lebar that has cutting-edge gym equipment and Genesis Gym with its uniquely curated PT programs that utilise science-based methods and a holistic approach.&nbsp;</span></p>\r\n<p><span style=\"font-weight: 400;\">In the afternoon, hop on your bike and enjoy a breezy ride along the Geylang River. Stop by at some riverside eateries or continue along the trail that will take you all the way down to the Marina Barrage. Cycling around the Paya Lebar area is now incredibly convenient thanks to the construction of the Paya Lebar Quarter that has a wide cycle trail that links you directly to park connectors.&nbsp;</span></p>\r\n<p><span style=\"font-weight: 400;\">In the evening, watch a movie at Shaw Theatres at Paya Lebar Quarter that also houses an IMAX theatre. While there isn&rsquo;t much nightlife or bars in the Paya Lebar area, you can grab a drink at Merdandy Bar &amp; Cafe&nbsp;&nbsp;</span></p>\r\n<p><strong>Shop&nbsp;<br /></strong><span style=\"font-weight: 400;\">There are a couple of malls in the Paya Lebar area. The most famous one is just a short walk from Paya Lebar MRT and is also known as KINEX. There&rsquo;s a range of stores in this mall from fashion to electronics. There&rsquo;s also Paya Lebar Square with retail and dining options, City Plaza on Geylang Road and Tanjong Katong Complex. Unlike the other malls, Paya Lebar Quarter Mall is linked to Paya Lebar MRT Station and can be easily accessed. Supermarkets such as Cold Storage and NTUC can also be found dotted along the area.&nbsp;</span></p>\r\n<p><strong>Eat&nbsp;<br /></strong><span style=\"font-weight: 400;\">Start your food adventure at Haig Road Market &amp; Food Centre. It&rsquo;s divided into two halves with the first half selling Chinese food and the other half mainly selling Malay and Indian food. The food here is inexpensive and incredibly delicious. Other food options include Arnold&rsquo;s Fried Chicken along with plenty of other tantalising heritage dishes that you can find along the Geylang Serai food trail.&nbsp;</span></p>\r\n<p><span style=\"font-weight: 400;\">If you prefer cafes, walk down the shophouse-lined Tanjong Katong Road and choose from a wide variety of cafes from Laneway Market to amazing pastries at Do. Main Bakery. Around the area, you&rsquo;ve also got a few Western pubs, restaurants, and cafes. For a romantic date spot, Knots Cafe and Living has an artisan furniture showroom and florist if you&rsquo;d like to also pick up some home accessories.&nbsp;</span></p>\r\n<p><strong>See<br /></strong><span style=\"font-weight: 400;\">There aren&rsquo;t a whole lot of attractions in the Paya Lebar area, but you can take a relaxing stroll. Walk down the Geylang River and settle down in one of the many gazebos, or head to PLQ mall for its rustic shopfronts and stunning picture spots. In between PLQ Mall and PLQ1, there&rsquo;s also a water fountain that&rsquo;s surrounded by eateries and tables. Paya Lebar also has the Lifelong Learning Institute that promotes adult-learning and skill training. There&rsquo;s also a cosy outdoor lounge in this building where you can relax and catch up on a book.&nbsp;</span></p>\r\n<p><strong>The downside<br /></strong><span style=\"font-weight: 400;\">Prices of housing around the area are set to increase, and there aren&rsquo;t a lot of nightlife options in this vicinity.&nbsp;</span></p>\r\n<p><strong>Making the most of your move to Singapore&nbsp;<br /></strong><span style=\"font-weight: 400;\">If you are in the process of planning your move, make sure you read our comprehensive and refreshed <a href=\"../../../blog/your-step-by-step-2021-moving-to-singapore-guide/\">2021 Moving to Singapore Guide</a> to learn more about the real cost of living in Singapore, what you need to prepare for and insights on family and work-life as an expat. <br /><br />You can also use our free <a href=\"https://www.haulmate.co/\">relocation dashboard </a>to discover other areas to live, chat with a community of likeminded people and begin setting up for your new life in Singapore... all before you land.&nbsp;&nbsp;<br /></span></p>\r\n<p>&nbsp;</p>','Moving to Singapore: An expats guide to living in Paya Lebar','A detailed and personalised guide to living in Paya Lebar. Plan your move to Singapore by finding the right neighbourhood for you.','Moving to Singapore, Living in Paya Lebar, Living in Singapore, Expat,',1.31900100,103.89299700,0,11,4,3,3,5.00,3000.00,'-',1,2,19,'2020-05-05 08:33:16','2020-10-23 12:55:40',5.39124318),
	(25,'Katong','katong','Katong','<p><span style=\"font-weight: 400;\">Living in Katong means that you&rsquo;re in a reasonably priced area with spacious housing. If you&rsquo;ve always wanted to be close to sandy beaches, sea breezes, and stay in a condominium with an ocean view, Katong is perfect for you. With a relaxed and friendly neighbourhood feel, Katong is great for everyone &ndash; especially families and couples that are looking to begin their Singapore expat life.&nbsp;</span></p>\r\n<p><span style=\"font-weight: 400;\">While it might be further out of the city, Katong has everything from shophouse lined streets to fascinating shops, a rich heritage, and a great array of local food. There are plenty of kid-friendly spots and schools around the area so this residential district is particularly popular with families. While there are residential terraces in the area, there are also modern high-rise buildings along with apartments and landed properties. Since it&rsquo;s a more laidback area, Katong is great for those that are looking to get away from the busyness of the CBD.&nbsp;<br /></span></p>','<p><strong>Distance from the CBD<br /></strong><span style=\"font-weight: 400;\">Katong is situated in the East Coast area of Singapore. Transportation options are aplenty as there are a few bus services and MRT stations in the area. Some MRT stations include Dakota, Paya Lebar, and Eunos. There&rsquo;s also a new Marine Terrace MRT Station that&rsquo;s currently being constructed. With public transportation, it&rsquo;ll take about 30-40 minutes to get to the CBD. If you&rsquo;ve got a car, it&rsquo;ll take you a speedy 12-15 minutes to get to the CBD.&nbsp;<br /><br /></span><strong>Living in Katong: Morning, day and night<br /></strong><span style=\"font-weight: 400;\">Start your morning wandering through the interesting shops in Katong. There are rows and rows of picturesque Peranakan homes with traditional cuisine and products that you can purchase. The Katong Antique House is worth a visit to sneak a peek at colorful Peranakan costumes and furniture.&nbsp;</span></p>\r\n<p><span style=\"font-weight: 400;\">In the afternoon, take a walk or cycle along East Coast Park for some quiet time. There&rsquo;s also plenty of barbecue and picnic tables as well as children\'s playgrounds to entertain the entire family. If you love swimming, there are plenty of pools around the area from Katong Swimming Complex to the Singapore Swimming Club. You can also spend the afternoon at Big Splash &ndash; a family-friendly establishment with an assortment of dining experiences and recreational activities.&nbsp;</span></p>\r\n<p><span style=\"font-weight: 400;\">In the evening, go for a stroll at East Coast Park and dine at one of the eateries or enjoy some late night karaoke at Teo Heng KTV Studio that&rsquo;s nestled in Katong Shopping Centre. You can sing to your heart&rsquo;s content until about 1 or even 2 am. If you fancy a drink, there are some bars around the area such as <a href=\"https://www.rabbit-carrot-gun.com/\" target=\"_blank\" rel=\"noopener\">Rabbit Carrot Gun</a> for its beers and pub grub, and Burp Kitchen and Bar for their happy hour.&nbsp;</span></p>\r\n<p><strong>Shop&nbsp;<br /></strong><span style=\"font-weight: 400;\">There are numerous malls in the Katong area that you can shop at from Tanjong Katong Complex to Joo Chiat Complex. There&rsquo;s also 112 Katong with a myriad of lifestyle and fashion outlets along with Parkway Parade. Other places include Siglap Shopping Centre, Katong Plaza, Roxy Square, and Katvong V. There are plenty of supermarkets in these shopping centres along with a vibrant blend of shops, lifestyle stores, and dining options.&nbsp;</span></p>\r\n<p><strong>Eat&nbsp;<br /></strong><span style=\"font-weight: 400;\">If you&rsquo;re a fan of local hawker food, head to Dunman Food Centre for wonton noodles, duck porridge, and more. There are also some other hawker centres nearby from Marine Terrace Market and Food Centre to Haig Road Market and Food Centre. While there are plenty of local food options here, there are also lots of dining options within the shopping malls. Get some quality fresh sashimi at Tomi Sushi in Katong V, or grab a plate of delicious chicken rice at Wee Nam Kee. For a relaxing chillout spot, head to Bar Bar Black Sheep or grab a refreshing German beer at Brotzeit. If you&rsquo;ve got a sweet tooth, Toothsome Cafe has artisan desserts and bespoke cakes that&rsquo;ll satisfy your cravings.&nbsp;</span></p>\r\n<p><strong>See<br /></strong><span style=\"font-weight: 400;\">You can spend the entire day at Katong learning more about its vibrant and rich Peranakan culture. If you fancy participating in community activities, there&rsquo;s also the Katong Community Centre that&rsquo;s a great way to interact and meet new friends. Since there&rsquo;s also a sizable expat community in Katong, the Eurasian Association is also nestled in this area. Other places that you can visit include Goodman Arts Centre to experience arts intimately along with the National Arts Council of Singapore that has a black box theatre along with galleries and rehearsal studios.&nbsp;</span></p>\r\n<p><strong>The downside<br /></strong><span style=\"font-weight: 400;\">The lack of MRT stations can mean you rely a little more on Grabs. That said, there are direct busses into the city, however Singapore wide connectivity is not as good as other areas.<br /><br /></span><strong>Making the most of your move to Singapore&nbsp;<br /></strong><span style=\"font-weight: 400;\">If you are in the process of planning your move, make sure you read our comprehensive and refreshed <a href=\"../../../blog/your-step-by-step-2021-moving-to-singapore-guide/\">2021 Moving to Singapore Guide</a> to learn more about the real cost of living in Singapore, what you need to prepare for and insights on family and work-life as an expat. <br /><br />You can also use our free <a href=\"https://www.haulmate.co/\">relocation dashboard </a>to discover other areas to live, chat with a community of likeminded people and begin setting up for your new life in Singapore... all before you land.&nbsp;&nbsp;<br /></span></p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p><span style=\"font-weight: 400;\"><br /><br /><br /></span></p>','Moving to Singapore: An expats guide to living in Katong','A detailed and personalised guide to living in Katong. Plan your move to Singapore by finding the right neighbourhood for you.','Moving to Singapore, Living in Katong, Living in Singapore, Expat, Relocation',1.30548700,103.90481000,0,13,2,3,2,8.00,3200.00,'-',1,8,18,'2020-05-05 08:34:12','2020-10-23 11:10:29',6.03062888),
	(26,'Marine Parade','marine-parade','Marine Parade','<p><span style=\"font-weight: 400;\">Living in Marine Parade means that you&rsquo;re situated close to East Coast beach, with a mix of residential and entertainment outlets for a laidback feel. There&rsquo;s plenty of housing options here from modern condominium complexes to large bungalow homes as well as a wide variety of schools. Marine Parade is great for families and those looking to live away from the hectic city as they begin their Singapore expat life.&nbsp;</span></p>\r\n<p><span style=\"font-weight: 400;\">What&rsquo;s great about Marine Parade is that you&rsquo;ve got some of the best views in the city, and there are lots of opportunities for outdoor activities at East Coast Park. From relaxing Sunday bike rides to picnics, there&rsquo;s plenty to do. Restaurants, cafes, and other local amenities are also aplenty at Marine Parade.&nbsp;</span></p>','<p><strong>Distance from the CBD<br /></strong><span style=\"font-weight: 400;\">It&rsquo;ll take about 50 minutes to an hour to get to the CBD area from Marine Parade. The nearest MRT stations to Marine Parade are Dakota and Mountbatten MRT stations (though they are situated slightly on the outskirts of this neighbourhood). Alternatively, you can catch a bus from Marine Parade to the nearby Paya Lebar MRT station. If you&rsquo;ve got a car, it&rsquo;ll take you about 15-35 minutes to get to the CBD.&nbsp;<br /><br /></span><strong>Living in Marine Parade: Morning, day and night<br /></strong><span style=\"font-weight: 400;\">You&rsquo;ll probably start your morning heading to East Coast Park for a morning stroll. Children will also absolutely adore the East Coast Park playground that has a play tower and three different slides. There&rsquo;s also dedicated cycling and walking paths, bicycle and rollerblade hire stalls, a skate park, and even camping areas to make the most of your day.&nbsp;</span></p>\r\n<p><span style=\"font-weight: 400;\">Spend your afternoon going for a spot of fishing at the jetty, or wander around East Coast Park practising your photography skills. Find respite from the crowds at Raintree Cove while enjoying gorgeous vistas of the sea. Raintree Cove is the only pavilion with a green roof and provides spaces for family and friends to enjoy a quiet moment.&nbsp;</span></p>\r\n<p><span style=\"font-weight: 400;\">If you&rsquo;d prefer to workout at the gym, head into Marine Parade&rsquo;s Anytime Fitness that&rsquo;s open at all hours of the day or drop by Oompf! Fitness for individually customised programs designed to optimise the performance of your body.&nbsp;</span></p>\r\n<p><span style=\"font-weight: 400;\">In the evenings, invite your friends over for a barbecue at East Coast Park with its 80 BBQ pits scattered across the entire park. If you&rsquo;d like, you can even set up a tent temporarily or overnight at the park &ndash; you&rsquo;d just need to apply for a camping permit first. Alternatively, indulge in sumptuous cuisine at the nearby hawker centres or restaurants while enjoying the cool sea breeze.&nbsp;</span></p>\r\n<p><strong>Shop&nbsp;<br /></strong><span style=\"font-weight: 400;\">There are a couple of shops at the Marine Parade area from Siglap Centre that has a supermarket, restaurants, cafes and even a barber to Parkway Parade, one of Singapore&rsquo;s biggest suburban malls. It has over 250 stores from a movie theatre to a food court, and you&rsquo;re sure to find everything you need.&nbsp;</span></p>\r\n<p><span style=\"font-weight: 400;\">112 Katong is another seven-storey shopping mall situated near Marine Parade and also has more than 150 speciality shops, a cinema, and a gourmet supermarket. There&rsquo;s even a wet and dry playground on the 4th floor of this mall to cater to children. Other malls include Parkway Parade that&rsquo;s perfect for a grocery run as it houses two supermarkets and Roxy Square 1.&nbsp;</span></p>\r\n<p><strong>Eat&nbsp;<br /></strong><span style=\"font-weight: 400;\">Food is aplenty at Marine Parade, especially at <a href=\"https://www.timeout.com/singapore/restaurants/marine-parade-central-market-and-food-centre\" target=\"_blank\" rel=\"noopener\">Marine Parade Food Centre</a>. The food there is fantastic, though prices are a little higher than what you&rsquo;d usually find in other hawker centres. Indulge in a bowl of beef noodles, char kway teow (fried flat noodles), or get a curry puff. Don&rsquo;t forget to get a bowl of Katong Laksa at Marine Parade as well as this neighbourhood is famous for its thick rice vermicelli noodles in a coconut-rich gravy. Either than hawker centres and local food, there&rsquo;s also plenty of restaurants and cafes in each of the shopping malls, and you&rsquo;re sure to find something that will satisfy your tastebuds.&nbsp;</span></p>\r\n<p><strong>See<br /></strong><span style=\"font-weight: 400;\">The Marine Parade area doesn&rsquo;t have a whole lot of attractions either than East Coast Park, so you&rsquo;d need to head to the nearby neighbourhoods such as Bedok or Katong. Not too far away from East Coast is Bedok Reservoir &ndash; another popular destination for both water sport enthusiasts and joggers. At Bedok Reservoir you can kayak, wakeboard, and there are also plenty of public benches and restaurants dotted along the area. Katong is also a great cultural neighbourhood to visit for its vintage houses and unique architecture.&nbsp;</span></p>\r\n<p><strong>The downside<br /></strong><span style=\"font-weight: 400;\">There aren&rsquo;t that many public transportation options in the Marine Parade area, and it doesn&rsquo;t have a lot of modern entertainment and attractions. So, if you&rsquo;re looking for an area with plenty of nightlife, Marine Parade isn&rsquo;t the area for you. However, it&rsquo;s great for those looking for a bit more of a laidback lifestyle while enjoying outdoor activities.&nbsp;</span></p>\r\n<p><strong>Making the most of your move to Singapore&nbsp;<br /></strong><span style=\"font-weight: 400;\">If you are in the process of planning your move, make sure you read our comprehensive and refreshed <a href=\"../../../blog/your-step-by-step-2021-moving-to-singapore-guide/\">2021 Moving to Singapore Guide</a> to learn more about the real cost of living in Singapore, what you need to prepare for and insights on family and work-life as an expat. <br /><br />You can also use our free <a href=\"https://www.haulmate.co/\">relocation dashboard </a>to discover other areas to live, chat with a community of likeminded people and begin setting up for your new life in Singapore... all before you land.&nbsp;&nbsp;</span></p>','Moving to Singapore: An expats guide to living in Marine Parade','A detailed and personalised guide to living in Marine Parade. Plan your move to Singapore by finding the right neighbourhood for you.','Moving to Singapore, Living in Marine Parade, Living in Singapore, Expat, Relocation',1.30002000,103.89091400,0,3,1,5,3,8.00,3200.00,'-',1,1,19,'2020-05-05 08:38:50','2020-10-23 12:24:22',4.39569873),
	(27,'Siglap','siglap','Siglap','<p>Living in Siglap</p>','<p>Living in Siglap</p>',NULL,NULL,NULL,1.31409700,103.93374800,0,5,2,4,2,5.00,2700.00,'-',1,0,11,'2020-05-05 08:39:32','2020-10-15 13:06:02',9.38068105),
	(28,'Bedok','bedok','Bedok','<p><span style=\"font-weight: 400;\">Living in Bedok can feel like a daily getaway from the bustling city with its long stretches of beach, cycle paths, running tracks and fishing spots, Bedok is probably one of the best neighbourhoods for outdoor living. Many people who live in the East boast that Bedok has cleaner air, lower rents and plenty of historical charm</span><span style=\"font-weight: 400;\">.<br /></span><span style=\"font-weight: 400;\"><br /></span><span style=\"font-weight: 400;\">With lot&rsquo;s of nature and popular running spots, Bedok is a popular place to live amongst many locals and families who want to live in a relaxing neighbourhood.&nbsp;</span></p>','<p><span style=\"font-weight: 400;\">Living in Bedok can feel like a daily getaway from the bustling city with its long stretches of beach, cycle paths, running tracks and fishing spots, Bedok is probably one of the best neighbourhoods for outdoor living. Many people who live in the East boast that Bedok has cleaner air, lower rents and plenty of historical charm</span><span style=\"font-weight: 400;\">.<br /></span><span style=\"font-weight: 400;\"><br /></span><span style=\"font-weight: 400;\">With lot&rsquo;s of nature and popular running spots, Bedok is a popular place to live amongst many locals and families who want to live in a relaxing neighbourhood.&nbsp;</span></p>\r\n<p><strong>Distance from the CBD<br /></strong><span style=\"font-weight: 400;\">While Singapore is small, Bedok can feel a little far away from the CDB and depending on where you live in Bedok, a 30-minute straight bus or MRT ride will take you to Singapore&rsquo;s centre. Driving will cut that travel down by half to around 17 minutes. </span><span style=\"font-weight: 400;\"><br /></span></p>\r\n<p><strong>Shop&nbsp;<br /></strong><span style=\"font-weight: 400;\">Like most areas in Singapore, Bedok boasts a number of shopping malls. While it won&rsquo;t be the designer shops you might get on Orchard Road, shopping malls such as The Bedok Shopping Complex, Bedok Marketplace, Bedok Point and upmarket Bedok Mall cover most basic shopping needs.&nbsp;</span></p>\r\n<p><span style=\"font-weight: 400;\">A short drive or bus trip away, you&rsquo;ll also find the popular Parkway Parade and Eastpoint Mall which are also popular one-stop-shops.&nbsp;</span></p>\r\n<p><strong>Eat&nbsp;<br /></strong><span style=\"font-weight: 400;\">You\'re spoilt for choice with a fantastic offering of hawker food at Bedok Marketplace and Fengshan Market and Food Centre</span></p>\r\n<p><strong>See&nbsp;<br /></strong><span style=\"font-weight: 400;\">East Coast Park and Bedok Reservoir are the neighbourhood&rsquo;s two biggest natural attractions; you can enjoy free activities such as swimming and running, or pay for kayaking, yoga classes, the Forest Adventure aerial park and much more. There are also a number of golf and country clubs in the vicinity</span><span style=\"font-weight: 400;\">.</span></p>\r\n<p><strong>The downside<br /></strong><span style=\"font-weight: 400;\">As a popular area for nature and outdoor lovers, Bedok does lack a thriving nightlife and also has a limited number of schools.&nbsp;<br /><br /></span><strong>Making the most of your move to Singapore&nbsp;<br /></strong><span style=\"font-weight: 400;\">If you are in the process of planning your move, make sure you read our comprehensive and refreshed <a href=\"../../../blog/your-step-by-step-2021-moving-to-singapore-guide/\">2021 Moving to Singapore Guide</a> to learn more about the real cost of living in Singapore, what you need to prepare for and insights on family and work-life as an expat. <br /><br />You can also use our free <a href=\"https://www.haulmate.co/\">relocation dashboard </a>to discover other areas to live, chat with a community of likeminded people and begin setting up for your new life in Singapore... all before you land.&nbsp;&nbsp;<br /></span></p>\r\n<p>&nbsp;</p>\r\n<p><span style=\"font-weight: 400;\">&nbsp;</span></p>','Moving to Singapore: An expat guide to living in Bedok','A detailed and personalised guide to living in Bedok. Plan your move to Singapore by finding the right neighbourhood for you.','Moving to Singapore, Living in Bedok, Living in Singapore, Expat',1.33096900,103.91978500,0,10,2,5,2,8.00,2550.00,'-',1,0,11,'2020-05-05 08:41:48','2020-10-23 10:15:31',8.62985646),
	(29,'Changi / Tampines','changi-tampines','Changi / Tampines','<p><strong>Changi/Tampines&nbsp;<br /></strong><span style=\"font-weight: 400;\">Living in the Changi and Tampines area means that you&rsquo;ll be far away from the hustle and bustle of the city, but still have all the amenities you need from shopping malls to dining options and more. As this neighbourhood is relatively close to the coast and has an abundance of schools, it&rsquo;s ideal for both families and couples looking to start their Singapore expat life.&nbsp;</span></p>\r\n<p><span style=\"font-weight: 400;\">There&rsquo;s a relatively good range of residential housing available in the area from HDB flats to condominiums and landed properties. Families also flock to this area as there are plenty of Primary, Secondary and Tertiary schools available &ndash; including one international school. Most individuals living in the area love to spend the weekend escaping to the nearby island of Pulau Ubin on a Changi Ferry or having a picnic or BBQ by Changi beach. While Changi and Tampines might be further away from the city, you&rsquo;ve got access to a tranquil beachside neighbourhood along with pockets of greenery that&rsquo;s a haven for nature seekers and those looking for some peace.&nbsp;</span></p>','<p><strong>Distance from the CBD<br /></strong><span style=\"font-weight: 400;\">Both the Changi and Tampines area is located in the Eastern region of Singapore. It&rsquo;ll take about 30-40 minutes to get to the city centre by car, and about 35-50 minutes by public transportation. From Changi, you can get to the CBD from either Expo, Tampines or Pasir Ris MRT Station. From Tampines, the closest public transportation options are either Tampines MRT or the Tampines bus interchange which are adjacent to each other.<br /><br /></span><strong>Living in Changi/Tampines: Morning, day and night<br /></strong><span style=\"font-weight: 400;\">Since you&rsquo;re right by Changi Beach Park, most residents living in Singapore love to start their morning going for a stroll by the beach to enjoy the sandy white sand, tall coconut palms, and gentle waves. The Tampines area also houses Tampines Eco Green &ndash; a park with open grasslands, freshwater wetlands, and a rainforest.&nbsp;</span></p>\r\n<p><span style=\"font-weight: 400;\">Those looking to get a workout at the gym, can head to Fitness First Changi and attend a wide range of classes or drop by Tampines Sports Centre that boasts one of the largest ClubFITT gyms in the whole of Singapore.&nbsp;</span></p>\r\n<p><span style=\"font-weight: 400;\">In the afternoon, head to Singapore Changi Airport to explore its newest development &ndash; Jewel. This stunning modern mall integrates nature with plenty of attractions, retail, and dining. Shops and restaurants here open late into the night so if you&rsquo;re feeling peckish in the evening, feel free to head to Jewel to grab some food. At Tampines, there&rsquo;s the Tampines Hub which has a range of facilities from a regional library to a hawker centre and retail shops.&nbsp;</span></p>\r\n<p><span style=\"font-weight: 400;\">In the evening, drop by the Changi Boardwalk to catch a glimpse of the sunset and a stunning coastal view. Due to its serene location, you won&rsquo;t even feel like you&rsquo;re still in the metropolitan city of Singapore. Here, you can also head to one of the many small seaside restaurants or walk to Changi Village to feast on some delicious local food.&nbsp;</span></p>\r\n<p><strong>Shop&nbsp;<br /></strong><span style=\"font-weight: 400;\">There are a plethora of shopping options at the Changi and Tampines area. You&rsquo;ve got Tampines 1, an iconic retail landmark that has over 5 floors of retail and dining options which also includes a supermarket. Just adjacent to Tampines 1 is Century Square and Tampines Mall so shopping options are aplenty. Living in Tampines will also place you near IKEA &ndash; the perfect place to purchase some inexpensive furniture while enjoying delicious Swedish meatballs. For the Changi area, there&rsquo;s Changi City Point which has a landscaped rooftop garden, interactive art installations, and even a treehouse trail for children.&nbsp;</span></p>\r\n<p><strong>Eat&nbsp;<br /></strong><span style=\"font-weight: 400;\">One of Singapore&rsquo;s most popular foodie destinations is Changi Village. It&rsquo;s known for serving up some of Singapore&rsquo;s best Malay food such as Nasi Lemak. Some other local dishes that you wouldn&rsquo;t want to miss include Ipoh hor fun (flat rice noodles), goreng pisang (fried bananas), and Ayam Penyet (smashed fried chicken). Tampines Round Market &amp; Food Centre is another great hawker centre to head to that also has a wet market. There&rsquo;s plenty of inexpensive food in this centre, and for the freshest pick of seafood and meats, you&rsquo;ll want to get there early in the morning.&nbsp;<br /><br />For a relaxing afternoon session, our favourite place in the area (maybe Singapore) is <a href=\"http://libc.co/\">Little Island Brewing Co</a>, a must-visit.</span></p>\r\n<p><span style=\"font-weight: 400;\">Both areas also have plenty of other cuisines from Korean to Japanese and more. The Coastal Settlement in Changi is a great spot to find grub like pasta, burgers, and chicken wings.&nbsp; For a cheeky drink, head to Little Island Brewing Co. for some craft beer and house-brewed beers while overlooking the sea.&nbsp;</span></p>\r\n<p><strong>See<br /></strong><span style=\"font-weight: 400;\">The Changi Museum is a solemn reminder of Singapore&rsquo;s past and is a historical place that&rsquo;s worth visiting to learn more about Singapore&rsquo;s time under the Japanese occupation. If you fancy sailing away for the weekend, Pulau Ubin can be easily accessed by a bumboat off the Changi Ferry Terminal and is a fantastic place to head to for a day out, or to camp overnight.&nbsp;</span></p>\r\n<p><span style=\"font-weight: 400;\">At Tampines, the Tampines Regional Library is popular with individuals that want to grab a good book and soak up some knowledge. It houses over 200,000 books and has online resources for all of its users. Adventure junkies can head to HomeTeamNs to participate in activities ranging from laser tag to rock climbing.&nbsp;</span></p>\r\n<p><strong>The downside<br /></strong><span style=\"font-weight: 400;\">Compared to other neighbourhoods in Singapore, Changi has an above-average crime rate. Both Changi and Tampines are also further away from the city centre so it&rsquo;s not as convenient as some of the other areas in Singapore. Since it&rsquo;s one of the more mature neighbourhoods, you won&rsquo;t be finding the hippest or fanciest properties here. The proximity to the airport also means that you have to get used to the sounds of planes landing and taking off, and nightlife isn&rsquo;t as prominent in this area.&nbsp;</span></p>\r\n<p><strong>Making the most of your move to Singapore&nbsp;<br /></strong><span style=\"font-weight: 400;\">If you are in the process of planning your move, make sure you read our comprehensive and refreshed <a href=\"../../../blog/your-step-by-step-2021-moving-to-singapore-guide/\">2021 Moving to Singapore Guide</a> to learn more about the real cost of living in Singapore, what you need to prepare for and insights on family and work-life as an expat. <br /><br />You can also use our free <a href=\"https://www.haulmate.co/\">relocation dashboard </a>to discover other areas to live, chat with a community of likeminded people and begin setting up for your new life in Singapore... all before you land.&nbsp;&nbsp;<br /></span></p>\r\n<p>&nbsp;</p>','Moving to Singapore: An expats guide to living in Changi','A detailed and personalised guide to living in Changi. Plan your move to Singapore by finding the right neighbourhood for you.','Moving to Singapore, Living in Changi, Living in Singapore, Expat, Tampines',1.35380000,103.96169600,0,4,0,4,1,10.00,2350.00,'-',1,3,11,'2020-05-05 08:44:08','2020-10-23 10:28:03',13.93146355),
	(30,'Pasir Ris','pasir-ris','Pasir Ris','<p>-</p>','<p>-</p>',NULL,NULL,NULL,1.37523900,103.94957200,0,4,1,3,1,10.00,2250.00,'-',1,0,4,'2020-05-05 08:46:26','2020-10-15 13:14:55',14.17267984),
	(31,'Bukit Merah','bukit-merah','Bukit Merah','<p><span style=\"font-weight: 400;\">Living in Bukit Merah means that you&rsquo;ll have access to neighbourhoods that have both a touch of heritage and are close to the city centre &ndash; which is exceedingly rare. With sprinklings of historical housing along with generous offers of convenience around the corner, Bukit Merah is a great place for couples and families to begin their Singapore expat life.&nbsp;</span></p>\r\n<p><span style=\"font-weight: 400;\">Located in the central region of Singapore, Bukit Merah comprises 17 sub-zones and is named after the red soil that was uncovered when the area was excavated in the 1950s. Bukit Merah essentially means &ldquo;Red Hill&rdquo;, and is a modern neighbourhood that&rsquo;s a fantastic place to live at when moving to Singapore with IKEA right around the corner along with close proximity to plenty of hipster cafes and bars.<br /></span></p>','<p><strong><span style=\"font-weight: 400;\"><strong>Distance from the CBD</strong><br />Bukit Merah is situated in the southernmost part of Singapore. Due to the extensive network of MRT lines, you can travel to the city in just about 10 minutes by taking the train from the Redhill Station (EW19.) Just a few steps away from the MRT Station is Bukit Merah Bus Interchange that&rsquo;ll take you to the CBD in about 20 minutes. Given the size of Bukit Merah, it&rsquo;s best to stay near the MRT station, otherwise you can take a taxi or drive your own car to get to the city in about 6 minutes.&nbsp;</span><br /><br />Living in Bukit Merah: Morning, day and night<br /></strong><span style=\"font-weight: 400;\">Start off your morning with a hike or a light jog around the many parks surrounding Bukit Merah. Begin at Telok Blangah Hill Park before ending off at <a href=\"https://www.visitsingapore.com/see-do-singapore/nature-wildlife/parks-gardens/mount-faber/\">Mount Faber Park</a>. For lunch, wander to one of the many hawker centers such as Redhill Lane Block 85 Food Centre, Redhill Market, Bukit Merah View Market, and more for some tantalising local delights. If you prefer to drop by a cafe, Carrara cafe is a good place to head to for some gelato waffles.&nbsp;</span></p>\r\n<p><span style=\"font-weight: 400;\">In the afternoon, head to Alexandra Central Mall and take a look at the local boutiques. Alternatively, a short bus ride will take you to VivoCity &ndash; the largest shopping mall in Singapore that&rsquo;s also the gateway to Sentosa. Before the day draws to a close, take the train (or walk) to Tiong Bahru &ndash; the neighbourhood that&rsquo;s right next to Bukit Merah. There, visit some of Tiong Bahru&rsquo;s quirky shops from bookstores like Woods in the Books to chic homeware at Maisson Home. In the evening, head to any one of the great variety of outdoor bars that&rsquo;s perfect for sipping a refreshing beer at. Coq &amp; Balls (yes, you read that right) is a good place to check out if you&rsquo;re not sure where to start.&nbsp;</span></p>\r\n<p><strong>Shop <br /></strong><span style=\"font-family: -apple-system, BlinkMacSystemFont, \'Segoe UI\', Roboto, Oxygen, Ubuntu, Cantarell, \'Open Sans\', \'Helvetica Neue\', sans-serif;\">In the Bukit Merah area, there&rsquo;s Alexandra Central Mall along with plenty of shops situated below the HDB flats. Apart from the Block 112 Market where you can buy fresh produce, there&rsquo;s also an NTUC Fairprice supermarket at Bukit Merah Central. Just nearby is Tiong Bahru Plaza which has over 160 stores, including both a movie theatre and a supermarket. Further down is Anchorpoint Mall that has a niche collection of premium boutiques and choice eateries along with IKEA.&nbsp;<br /><br /></span><strong>Eat&nbsp;<br /></strong><span style=\"font-weight: 400;\">When moving to Singapore, one thing you&rsquo;ll realise is that every single neighbourhood is a food paradise &ndash; Bukit Merah included. There&rsquo;s plenty of delicious spots around the Bukit Merah area from fishball noodles at Redhill Lane Block 85 Food Centre to a steaming bowl of soup noodles at ABC Brickworks Market and Food Centre.&nbsp;</span></p>\r\n<p><span style=\"font-weight: 400;\">Other food options include Good Chance Popiah Eating House for some savoury cuisine and&nbsp;</span><span style=\"font-weight: 400;\">The Bakery Chef and Butterscotch for their delectable range of pastries and desserts. Outlets of crowd favourites such as Domino&rsquo;s, KFC, and McDonald&rsquo;s can also be easily found.&nbsp;</span></p>\r\n<p><strong>See<br /></strong><span style=\"font-weight: 400;\">Bukit Merah is in close proximity to Mount Faber Park that gives visitors a view from 105m above ground. You can also take the cable car from Mount Faber to Sentosa where you can soak in some aerial views of Harbourfront and Sentosa Island. At Sentosa, spend the day lazing on the beach, going on thrill rides at Universal Studios, or ziplining at Mega Adventure Park.&nbsp;</span></p>\r\n<p><span style=\"font-weight: 400;\">If you prefer a relaxing day walking around Bukit Merah, the Henderson Waves Bridge is a great spot to head to as it&rsquo;s the highest pedestrian bridge in Singapore and has gorgeous LED lights in the evening.&nbsp;<br /></span></p>\r\n<p><strong>The downside<br /></strong><span style=\"font-weight: 400;\">The area has some great amenities, but it can be a little expensive as it&rsquo;s relatively close to the CBD. There&rsquo;s also no immediate MRT station in the Bukit Merah area, and the closest station is either Redhill MRT or Outram Park MRT station.&nbsp;</span></p>\r\n<p><span style=\"font-weight: 400;\">It&rsquo;s also more of a family neighbourhood with plenty of schools and housing estates so if you&rsquo;re looking for an area that&rsquo;s more exciting, this may not be the best area for you.&nbsp;<br /></span><strong><br />Making the most of your move to Singapore&nbsp;<br /><span style=\"font-weight: 400;\">If you are in the process of planning your move, make sure you read our comprehensive and refreshed <a href=\"../../../blog/your-step-by-step-2021-moving-to-singapore-guide/\">2021 Moving to Singapore Guide</a> to learn more about the real cost of living in Singapore, what you need to prepare for and insights on family and work-life as an expat. <br /><br />You can also use our free <a href=\"https://www.haulmate.co/\">relocation dashboard </a>to discover other areas to live, chat with a community of likeminded people and begin setting up for your new life in Singapore... all before you land.&nbsp;&nbsp;</span><br /></strong></p>','Moving to Singapore: An expats guide to living in Bukit Merah','A detailed and personalised guide to living in Bukit Merah. Plan your move to Singapore by finding the right neighbourhood for you.','Moving to Singapore, Living in Bukit Merah, Living in Singapore, Expat',1.28314100,103.81884000,0,6,6,2,3,8.00,4000.00,'-',1,1,19,'2020-05-05 08:50:31','2020-10-23 10:16:08',3.84120001),
	(32,'Spottiswoode','spottiswoode','Spottiswoode','<p>Expats moving to Singapore will tell you that discovering Spottiswoode is like finding a secret neighbourhood tucked away on the doorstep of Singapore\'s CBD. With rows of charming shophouses that come in various shades of pastel colours, it&rsquo;s unique architecture and modern condos is a major attraction for tourists and locals looking to populate their Instagram feed. Living in Spottiswoode puts you within walking distance from Tanjong Pagar, where there are a number of busy bars, restaurants and businesses. With plenty of renowned schools and a medical centre around the area, Spottiswoode is especially popular amongst expats with families.</p>','<p><strong>Distance from the CBD<br /></strong><span style=\"font-weight: 400;\">Spottiswoode is a popular location for those working around Tanjong Pagar as the walking commute to work is pleasant. The Outram Park MRT station is under a kilometre away from most of the residences so depending on where you reside, this may be a convenient option. This gives you access to the Green, Purple and Brown lines. Travelling by car to the CBD takes merely 10-15 minutes.&nbsp;</span></p>\r\n<p><strong>Living in Spottiswoode: Morning, day and night<br /></strong><span style=\"font-weight: 400;\">As you leave your residence, you are greeted by rows of colourful shophouses. There are a number of breakfast spots as you walk along Spottiswoode Park Road. Even if you&rsquo;re short on time, there are many grab-and-go options that will make your commute more enjoyable.</span></p>\r\n<p><span style=\"font-weight: 400;\">During the day, Chinatown is an absolute delight for sightseeing and eating. There are a number of Buddhist and Hindu temples worth checking out, such as the Buddha Tooth Relic temple and Sri Mariamman Temple. The street market sells all sorts of souvenirs, snacks and decorations that you may want to consider for your home.</span></p>\r\n<p><span style=\"font-weight: 400;\">End the day at one of the many bars around Spottiswoode or Tanjong Pagar. The drinking spots around here are especially popular among professionals who work close by. Even on the weekends, the bars continue to draw in young audiences as drink prices are considerably cheap for such a central location.<br /><br /></span><strong>Shop&nbsp;<br /></strong><span style=\"font-weight: 400;\">Shopping in Spottiswoode is more of an adventure and not so much of buy, buy, buy. Along the stretch of shophouses you&rsquo;ll come across specialty stores that sell gifts, snacks and more. For a more familiar shopping experience, the 100AM mall is popular among residents. It has a newly opened Don Donki for all your Japanese groceries.</span></p>\r\n<p><strong>Eat&nbsp;<br /></strong><span style=\"font-weight: 400;\">Whatever you&rsquo;re craving, you&rsquo;ll find it within walking distance. For cheap local eats, you&rsquo;ll want to check out the Maxwell Food Centre and Lau Pa Sat. For excellent Japanese and Korean food, head to Tanjong Pagar. If you like something to eat along with your drink, the Public Izakaya offers really good Japanese snacks, but first you&rsquo;ll have to find a seat.&nbsp;<br /><br /></span><strong>See&nbsp;<br /></strong><span style=\"font-weight: 400;\">From the iconic Duxton residences to the vine-covered Oasia hotel. Buildings around Spottiswoode come in all shapes and sizes. Even the religious establishments are unique. Nowhere else will you find such an inspiring mix of eras and cultures.&nbsp;<br /><br /></span><strong>The downside<br /></strong><span style=\"font-weight: 400;\">Many of the residences are new. Which also means that rental will not be cheap and condos are smaller in size. Spottiswoode may be more affordable than many of the affluent neighbourhoods around Singapore, but costs can quickly escalate. Most of it will come from eating out and night activities. For an alternative that costs less, you could check out the surrounding HDBs.&nbsp;<br /></span></p>\r\n<p><strong>Making the most of your move to Singapore&nbsp;<br /></strong><span style=\"font-weight: 400;\">If you are in the process of planning your move, make sure you read our comprehensive and refreshed <a href=\"../../../blog/your-step-by-step-2021-moving-to-singapore-guide/\">2021 Moving to Singapore Guide</a> to learn more about the real cost of living in Singapore, what you need to prepare for and insights on family and work-life as an expat. <br /><br />You can also use our free <a href=\"https://www.haulmate.co/\">relocation dashboard </a>to discover other areas to live, chat with a community of likeminded people and begin setting up for your new life in Singapore... all before you land.&nbsp;</span></p>','Moving to Singapore: An expats guide to living in Spottiswoode','A detailed and personalised guide to living in Spottiswoode. Plan your move to Singapore by finding the right neighbourhood for you.','Moving to Singapore, Living in Spottiswoode, Living in Singapore, Expat',1.27567900,103.83682500,0,10,2,2,4,5.00,4250.00,'-',1,3,19,'2020-05-05 08:52:25','2020-10-23 13:36:07',2.56392711),
	(33,'Outram','outram','Outram','<p><span style=\"font-weight: 400;\">Living in Outram puts you near Chinatown, a cultural area filled with eclectic shops and street food. It&rsquo;s especially popular with professionals that want to be close to other parts of Singapore but also affordably experience the culture and food. If you&rsquo;re into culture and eclectic and historical streetscapes, this is the perfect area for you to begin your Singapore expat life.&nbsp;</span></p>\r\n<p><span style=\"font-weight: 400;\">There are a few serviced apartments, ultra-modern HDBs, and skyscrapers along this area. With its newer condominium complexes, you&rsquo;ll have a touch of comfort while being in the vicinity of a vibrant Chinese neighbourhood. There&rsquo;s also no shortage of food options as there are a plethora of food-focused streets lined with restaurants. Popular trendy nightspots are also just a few minutes away from the area. All in all, Outram is a great neighbourhood that seamlessly melds together both the old and the new.&nbsp;</span></p>','<p><strong>Distance from the CBD<br /></strong><span style=\"font-weight: 400;\">Outram is situated within the Central Area of the Central Region of Singapore. The nearest MRT Station is Outram Park MRT, and it takes just minutes (two stops to be exact), to reach the CBD. Outram Park MRT will also eventually be linked to the upcoming Thomson-East Coast Line which will connect Outram to Orchard Road, Marina Bay, and Gardens by the Bay. If you&rsquo;ve got a car, it&rsquo;s about a 5-minute drive to the CBD area.<br /></span><strong><br />Living in Outram: Morning, day and night<br /></strong><span style=\"font-weight: 400;\">Spend your morning hitting up one of the gyms in the Outram area. There&rsquo;s Cut Gym &ndash; a 2,000 square feet boutique personal training gym, CrossFit Urban Edge, and Outram&rsquo;s Anytime Fitness. Just a short distance away is Chinatown&rsquo;s Fitness First with its stunning heated swimming pool and group exercise and cycling studio. In the future, Outram will also be located on the Central Area cycling network which will connect the neighbourhood to Queenstown, Bishan, and Marina Bay.&nbsp;</span></p>\r\n<p><span style=\"font-weight: 400;\">In the afternoon, spend your day wandering around the streets of Chinatown. There&rsquo;s so much to see from the hawker stalls to the souvenir shops. If you&rsquo;ve got a bit more time, Outram is also nearby to Tiong Bahru &ndash; one of the trendiest neighbourhoods in Singapore, along with Tanjong Pagar.&nbsp;</span></p>\r\n<p><span style=\"font-weight: 400;\">In the evening, there&rsquo;s plenty of nightlife around the area, especially in Bukit Pasoh, Club Street, and Keong Saik road. The popular Potato Head Singapore is situated in this neighbourhood, along with Neon Pigeon &ndash; a modern Izakaya serving up some delicious cocktails.&nbsp;</span></p>\r\n<p><strong>Shop&nbsp;<br /></strong><span style=\"font-weight: 400;\">Most of all your shopping needs will be in the Chinatown area. There&rsquo;s Chinatown Point that&rsquo;s located in the heart of Chinatown with specialty shops and dining outlets. Other malls include Chinatown Complex, Concorde Shopping Centre, and the Tan Boon Liat Building that&rsquo;s a treasure trove for unique home accessories. Outram MRT Station itself is also a great spot for you to pick up some basic food items and household needs. While there are supermarkets in the Outram area, head to the Chinatown Complex Wet Market to purchase everything you need from fresh seafood to a range of meats and vegetables.&nbsp;</span></p>\r\n<p><strong>Eat&nbsp;<br /></strong><span style=\"font-weight: 400;\">Chinatown Complex Food Centre is one of the best places to eat in the Outram area with local traditional dishes with varied menus. You&rsquo;ll also need to head to Chinatown Food Street for some cheap, tasty, and authentic local food in Singapore. If you&rsquo;re looking for a delectable cup of coffee, head to Highlander Coffee Espresso Bar and Nylon Coffee Roasters for a great cuppa. Other places around the Outram area include Spanish restaurant Binomio, Fong Kee Coffee Shop, and Restaurant Andre for fine French cuisine. There are all sorts of dining options in the Outram area with different price points so you&rsquo;re completely spoiled for choice.&nbsp;</span></p>\r\n<p><strong>See<br /></strong><span style=\"font-weight: 400;\">The Outram area is brimming with culture so there\'s plenty to see. Start at Pearl&rsquo;s Hill City Park to take a breather from busy city life before going about your day. The Buddha Tooth Relic Temple and Museum is a great spot to learn about the history and background of Buddhism before heading to Chinatown Heritage Centre to learn more about what life was like in Singapore in the 1950s. Then, head to the oldest mosque in Singapore, James Mosque, before visiting the oldest Hindu temple in Singapore, Sri Mariammam Temple.&nbsp;</span></p>\r\n<p><strong>The downside<br /></strong><span style=\"font-weight: 400;\">Buildings in this area are much older than other neighbourhoods though there are some up and coming new developments. The area is also more commercial than residential, and it can be quite touristy due to its close proximity to Chinatown.&nbsp;</span></p>\r\n<p><strong>Making the most of your move to Singapore&nbsp;<br /></strong><span style=\"font-weight: 400;\">If you are in the process of planning your move, make sure you read our comprehensive and refreshed <a href=\"../../../blog/your-step-by-step-2021-moving-to-singapore-guide/\">2021 Moving to Singapore Guide</a> to learn more about the real cost of living in Singapore, what you need to prepare for and insights on family and work-life as an expat. <br /><br />You can also use our free <a href=\"https://www.haulmate.co/\">relocation dashboard </a>to discover other areas to live, chat with a community of likeminded people and begin setting up for your new life in Singapore... all before you land.&nbsp;&nbsp;<br /></span></p>\r\n<p>&nbsp;</p>','Moving to Singapore: An expats guide to living in Outram','A detailed and personalised guide to living in Outram. Plan your move to Singapore by finding the right neighbourhood for you.','Moving to Singapore, Living in Outram, Living in Singapore, Expat,',1.28205300,103.84209100,0,12,8,6,5,8.00,3700.00,'-',1,2,19,'2020-05-05 08:53:35','2020-10-23 12:52:05',1.64578344),
	(34,'Mount Faber','mount-faber','Mount Faber','<p><span style=\"font-weight: 400;\">Living in Mount Faber means that you&rsquo;re situated beside the sea on mainland Singapore. It&rsquo;s a pleasantly spacious area and is particularly popular with expats. With its suburban feel, and a large, friendly expat community, this area is great for couples and young professionals looking to begin their Singapore expat life. Since there aren&rsquo;t that many schools in this area, it may not be as suited for families.&nbsp;</span></p>\r\n<p><span style=\"font-weight: 400;\">Mount Faber is located in the Bukit Merah area in the central region of Singapore and is 106 meters above sea level. It was formerly known as Telok Blangah Hill, and the summit can be reached by Mount Faber Road or Mount Faber Loop via Morse Road. Living at Mount Faber means you&rsquo;ll have access to panoramic views and gorgeous nature, but shopping and food options are more limited in this area.&nbsp;</span></p>','<p><strong>Distance from the CBD<br /></strong><span style=\"font-weight: 400;\">There aren&rsquo;t any MRT stations in the immediate area so you&rsquo;d need to walk down Marang Trail to get to HarbourFront MRT. From there, it&rsquo;ll take you about 30-40 minutes to get to the CBD via MRT or bus. If you&rsquo;ve got a car, it&rsquo;ll only take you about 10-15 minutes.<br /><br /></span><strong>Living in Mount Faber: Morning, day and night<br /></strong><span style=\"font-weight: 400;\">Mount Faber is a picturesque area that&rsquo;s most popular for its Singapore cable car experience. Start your morning by taking the cable car from Mount Faber to Sentosa Island and back, and spend your time wandering through the dining and entertainment complex that occupies Mount Faber&rsquo;s peak. This is one of the places to grab a drink or enjoy some food while taking in some of the best views in the country.&nbsp;</span></p>\r\n<p><span style=\"font-weight: 400;\">If you&rsquo;d prefer, you can also trek upwards from the foot of Mount Faber. During this trek, you&rsquo;ll get to see some gorgeous flora and fauna along with bits and pieces of Singapore&rsquo;s history. The Marang Trail is what will connect you from the base of Mount Faber to Faber Point &ndash; where the cable car station resides. Other places to explore around Mount Faber include the Singing Forest and Forest Walk where you&rsquo;ll be able to spot some wild monkeys along with over 43 species of birds.&nbsp;</span></p>\r\n<p><span style=\"font-weight: 400;\">In the evening, you can head to Mount Faber&rsquo;s peak for a delicious meal, or head towards the Telok Blangah area for drinks at Bob&rsquo;s Bar or The World of Whisky.&nbsp;</span></p>\r\n<p><strong>Shop<br /></strong><span style=\"font-weight: 400;\">There aren&rsquo;t any malls in the Mount Faber area, you&rsquo;ll have to head to nearby neighbourhoods like Bukit Merah or HarbourFront for a spot of shopping. There&rsquo;s Alexandra Central Mall nearby along with the popular VivoCity. At VivoCity you&rsquo;ve got access to a supermarket, or you can head to Bukit Merah View Market or Telok Blangah Drive Wet Market to pick up some fresh produce and other items.&nbsp;</span></p>\r\n<p><strong>Eat<br /></strong><span style=\"font-weight: 400;\">There are only a couple of eateries around the Mount Faber area. There&rsquo;s Fuel Plus + for some foods and spirits to delight your senses after a hike. Feast on soft shell crab curry and Thai beef salad or have a delicious rosti breakfast. Other restaurants include Arbora that&rsquo;s perched atop the lush greenery of Mount Faber Park, and serves Western classics, along with Dusk Restaurant &amp; Bar for European tapas and specially curated wine and cocktails. For other dining options such as local hawker centres, you&rsquo;ll need to venture to the surrounding neighbourhoods.&nbsp;</span></p>\r\n<p><strong>See<br /></strong><span style=\"font-weight: 400;\">The main attraction around the Mount Faber area is Mount Faber itself. While hiking Mount Faber, you can ring a ship&rsquo;s bell known as a Bell of Happiness. Legend has it that if two people ring it together, they will be blessed with everlasting happiness, peace, and harmony. Other things to see on your hike up include a mural wall that depicts the story of Singapore along with a &ldquo;baby&rdquo; Merlion at the highest point of Mount Faber.&nbsp;</span></p>\r\n<p><span style=\"font-weight: 400;\">Not too far from Mount Faber are the Southern Ridges with Henderson Waves bridge linking both Mount Faber and Telok Blangah Hill Park. The bridge itself is a sight to behold, but hiking buffs should walk the 10km trail that&rsquo;ll take you through a range of green open spaces from Mount Faber Park to Kent Ridge Park and more.&nbsp;</span></p>\r\n<p><strong>The downside<br /></strong><span style=\"font-weight: 400;\">There aren&rsquo;t that many residential options in Mount Faber in general as they&rsquo;re mostly private housing. Prices are also generally steep due to the close proximity to tourist attractions. There also aren&rsquo;t many food or shopping options within the area so you&rsquo;d need to head to nearby neighbourhoods.&nbsp;<br /><br /></span><strong>Making the most of your move to Singapore&nbsp;<br /></strong><span style=\"font-weight: 400;\">If you are in the process of planning your move, make sure you read our comprehensive and refreshed <a href=\"../../../blog/your-step-by-step-2021-moving-to-singapore-guide/\">2021 Moving to Singapore Guide</a> to learn more about the real cost of living in Singapore, what you need to prepare for and insights on family and work-life as an expat. <br /><br />You can also use our free <a href=\"https://www.haulmate.co/\">relocation dashboard </a>to discover other areas to live, chat with a community of likeminded people and begin setting up for your new life in Singapore... all before you land.&nbsp;&nbsp;<br /></span></p>\r\n<p>&nbsp;</p>\r\n<p><span style=\"font-weight: 400;\">&nbsp;</span></p>','Moving to Singapore: An expats guide to living in Mount Faber','A detailed and personalised guide to living in Mount Faber. Plan your move to Singapore by finding the right neighbourhood for you.','Moving to Singapore, Living in Mount Faber, Living in Singapore, Expat',1.27404400,103.81748400,0,3,2,2,3,5.00,4000.00,'-',1,5,18,'2020-05-05 08:54:52','2020-10-23 13:55:53',4.37563141),
	(35,'Harbourfront','harbourfront','Harbourfront','<p><span style=\"font-weight: 400;\">Living in HarbourFront means that you&rsquo;re situated along Singapore&rsquo;s southern coast with close proximity to the sea. With plenty of private housing and condominiums, this area is great for anyone that loves being close to the beach &ndash; especially single professionals and couples that are looking to begin their Singapore expat life.&nbsp;</span></p>\r\n<p><span style=\"font-weight: 400;\">What&rsquo;s great about HarbourFront is that it isn&rsquo;t too far from central Singapore, but is a huge contrast from the hustle and bustle of the city. While you&rsquo;ve still got access to cafes, restaurants, shopping malls, and plenty of food, it&rsquo;s considered a waterfront district and is great for those looking for an area that&rsquo;s a little quieter.&nbsp;</span></p>','<p><strong>Distance from the CBD<br /></strong><span style=\"font-weight: 400;\">The closest train station to the HarbourFront area is HarbourFront MRT station. From the station, you can take the Circle Line and North-East Line to the CBD and it&rsquo;ll take you about 20-30 minutes. Alternatively, you can get to the CBD by car in about 10-minutes.<br /><br /></span><strong>Living in HarbourFront: Morning, day and night<br /></strong><span style=\"font-weight: 400;\">Start your morning taking a stroll along the boardwalk to bask in the gorgeous sea view. Nearly every weekend there&rsquo;s also bazaars held along the 670-meter stretch, making it a great spot to pick up some gifts and souvenirs. If you fancy a workout, the new HarbourFront Centre club has an incredible view of Sentosa Island with all the equipment you&rsquo;d need for a good workout. They&rsquo;ve also got over 100 classes a week from dance to hot yoga.&nbsp;</span></p>\r\n<p><span style=\"font-weight: 400;\">In the afternoon, head to the library at HarbourFront for a splendid view of Sentosa while reading a good book. This unique space even has a Children&rsquo;s Zone for young children to learn through Augmented Reality books that help bring stories to life. With Sentosa being so close to HarbourFront, you can take the monorail there and spend your afternoon tanning on the beach.&nbsp;</span></p>\r\n<p><span style=\"font-weight: 400;\">While there are some bars in HarbourFront to head to in the evenings, they&rsquo;re generally scant. HarbourFront isn&rsquo;t exactly a nightlife scene area, but Propeller Bar &ndash; a rooftop bar facing Sentosa and Keppel Harbour is a great place to catch up with friends. There&rsquo;s also Harry&rsquo;s at HarbourFront centre that has delicious pastas, appetisers and drinks.&nbsp;</span></p>\r\n<p><strong>Shop&nbsp;<br /></strong><span style=\"font-weight: 400;\">The nearest mall to HarbourFront is VivoCity which is also Singapore&rsquo;s largest shopping mall. There&rsquo;s plenty of retail stores in this mall along with a supermarket. Another mall is HarbourFront Centre that&rsquo;s conveniently linked to VivoCity. This 3-story retail destination has everything from dining to electronic goods, fashion, and more.&nbsp;</span></p>\r\n<p><strong>Eat&nbsp;<br /></strong><span style=\"font-weight: 400;\">For local food, Seah Im Food Centre is situated in the HarbourFront area and has loads of cheap and good food. Some of the foods that you can&rsquo;t miss include the boneless duck porridge and smashed fried chicken on rice.&nbsp;</span></p>\r\n<p><span style=\"font-weight: 400;\">There are also plenty of eateries inside VivoCity, and some of them are peppered along the boardwalk with amazing views of Sentosa and the nightly fireworks. Whether you crave Thai, Japanese, or Western food, there&rsquo;s something available for everyone. Some great restaurants include Thai Thai Nitta for its affordable and delicious Thai fare, along with San Laksa Steamboat for a tantalising hotpot experience.&nbsp;</span></p>\r\n<p><strong>See<br /></strong><span style=\"font-weight: 400;\">As you walk along the HarbourFront boardwalk, look out for a 6-metre tall spherical bouquet of colourful flowers blooms created by Choi Jeong Hawa. VivoCity also has several interesting sculptures scattered around from Vivo Punch to Aphrodite\'s Roses. Since HarbourFront is close to the ferry terminal, you&rsquo;ll also be able to hop on a ferry somewhere else &ndash; even if it&rsquo;s only for a day trip. In the vicinity, you can also walk to Mount Faber Park, and even the Henderson Waves bridge if you&rsquo;re looking to go for a bit of an outdoor hike.&nbsp;</span></p>\r\n<p><strong>The downside<br /></strong><span style=\"font-weight: 400;\">Since it&rsquo;s close to Sentosa and popular tourist attractions, prices are generally more expensive than other parts of Singapore. If you&rsquo;re a family looking to move to the HarbourFront area, just take note that there aren&rsquo;t that many schools in the immediate vicinity.&nbsp;<br /></span></p>\r\n<p><strong>Making the most of your move to Singapore&nbsp;<br /></strong><span style=\"font-weight: 400;\">If you are in the process of planning your move, make sure you read our comprehensive and refreshed <a href=\"../../../blog/your-step-by-step-2021-moving-to-singapore-guide/\">2021 Moving to Singapore Guide</a> to learn more about the real cost of living in Singapore, what you need to prepare for and insights on family and work-life as an expat. <br /><br />You can also use our free <a href=\"https://www.haulmate.co/\">relocation dashboard </a>to discover other areas to live, chat with a community of likeminded people and begin setting up for your new life in Singapore... all before you land.&nbsp;&nbsp;<br /></span></p>\r\n<p>&nbsp;</p>\r\n<p><span style=\"font-weight: 400;\">&nbsp;</span></p>','Moving to Singapore: An expats guide to living in Harbourfront','A detailed and personalised guide to living in Harbourfront. Plan your move to Singapore by finding the right neighbourhood for you.','Moving to Singapore, Living in Harbourfront, Living in Singapore, Expat',1.26498800,103.81874500,0,2,1,0,3,5.00,4000.00,'-',1,0,18,'2020-05-05 08:55:55','2020-10-23 10:37:40',4.83410753),
	(36,'Sentosa','sentosa','Sentosa','<p><span style=\"font-weight: 400;\">Living in Sentosa puts you right in the hotspot for lovers of luxury and the seaside. With plenty of high-end condominiums and lavish waterfront bungalows with unique oceanfront views to choose from. It&rsquo;s especially popular with single professionals and couples looking to embark on their new Singapore expat life.&nbsp;</span></p>\r\n<p><span style=\"font-weight: 400;\">If you decide to move to Sentosa, you&rsquo;ll feel like you&rsquo;re constantly on holiday. Since it&rsquo;s essentially another island on its own, it&rsquo;s like living in a resort. You&rsquo;ll also get to know your neighbours and see familiar faces all around as Sentosa Cove is the only residential area on Sentosa Island. Most residents on Sentosa are also expatriates as it&rsquo;s the only place in Singapore where foreigners are allowed to purchase landed property.&nbsp;</span></p>','<p><strong>Distance from the CBD<br /></strong><span style=\"font-weight: 400;\">To get to the CBD, it&rsquo;ll take about 15-30 minutes by car. There aren\'t any public transportation options in Sentosa so you&rsquo;ll need to take the monorail from Sentosa into Vivocity before either taking a train from HarbourFront MRT station or a bus from HarbourFront bus interchange. All in all, it&rsquo;ll take you about 50 minutes to get to the CBD by public transportation.<br /></span><strong><br />Living in Sentosa: Morning, day and night<br /></strong><span style=\"font-weight: 400;\">While in Sentosa, you&rsquo;ll perpetually feel like you&rsquo;re on vacation. In the morning, go for a relaxed walk on the pristine beaches, or play a game of beach volleyball on Siloso Beach. In the afternoon, take your pick from walking down a 44-meter high vertical wall to sitting on some thrilling rides at Universal Studios or walking on glass panels at the Skybridge. The casino at Resorts World Sentosa is also brimming with activity and a place to test your luck, or you can opt for a relaxing massage at any of the spas within the Sentosa hotels.&nbsp;</span></p>\r\n<p><span style=\"font-weight: 400;\">While there aren&rsquo;t any public gyms available in Sentosa, there is a fitness centre at ONE 15 Marina in Sentosa Cove that has stunning views of the marina along with a wide range of equipment.&nbsp;</span></p>\r\n<p><span style=\"font-weight: 400;\">In the evening, admire the sunset and head to any one of the beach bars situated in Sentosa. There&rsquo;s the Hawaiian-themed Ola Beach Club with Tiki cocktails, FOC Sentosa with Spanish gin and tonics, along with Tanjong Beach Club for its chilled-out selections. There&rsquo;s also live music at The Rock Bar at Hard Rock Hotel along with vibrant Cuban nights at Bob&rsquo;s Bar at Capella Singapore.&nbsp;</span></p>\r\n<p><strong>Shop&nbsp;<br /></strong><span style=\"font-weight: 400;\">The main shopping mall located near Sentosa Cove is Quayside Isle. It&rsquo;s tucked away in a quiet corner of Singapore and has plenty of restaurants and shops. It also houses a Jason&rsquo;s supermarket that\'ll have all the groceries that you need. There&rsquo;s also a Cold Storage supermarket located right in Sentosa Cove.&nbsp;</span></p>\r\n<p><span style=\"font-weight: 400;\">Another shopping area includes Resorts World Sentosa &ndash; a popular spot that you could spend the entire day at. Festive Walk in particular is a haven for shoppers with a multitude of dining options and attractions to keep you occupied.&nbsp;</span></p>\r\n<p><strong>Eat&nbsp;<br /></strong><span style=\"font-weight: 400;\">While there aren&rsquo;t any local hawker centres in Sentosa Cove, there is a Malaysian Food Street at Resorts World Sentosa for those that are looking for some local delights. At Sentosa Cove, most of the dining options are a little more expensive but serve incredible food. SKIRT for example is a great restaurant for meat lovers craving delicious food with a great variety. Other dining options include The Knolls that&rsquo;s located right inside the Capella hotel and The Cliff for some of the best Italian that&rsquo;ll leave you satiated and ready to return for more.&nbsp;</span></p>\r\n<p><strong>See<br /></strong><span style=\"font-weight: 400;\">Since Sentosa is a tourist spot, most of the attractions you&rsquo;ll see in Sentosa are also a tad more touristy. There&rsquo;s the Trick Eye museum that allows you to play with perspective photography along with Mega Adventure &ndash; a giant zip line that zips across the sea to a strip of shore at Siloso Beach. Other sights at Sentosa include The Royal Albatross, a tall pirate ship that&rsquo;s housed behind the SEA Aquarium, along with Butterfly Park and Insect Kingdom, 4D Adventureland, and more. Fort Siloso is also situated on Sentosa island and is a well-preserved fort that was built by the British in the 1880s.&nbsp;</span></p>\r\n<p><strong>The downside<br /></strong><span style=\"font-weight: 400;\">Since Sentosa is such a tourist-centric area, you&rsquo;ll feel more like a tourist and less like a local from living in this area. Rental is also one of the highest in Singapore and it&rsquo;ll take longer to commute to the city in comparison to other areas. It&rsquo;s also hard to book a taxi to get out of the island as there are booking surcharges and other surcharges you&rsquo;d need to pay just from the taxi entering the island. There&rsquo;s also only one prep school in Sentosa, and it&rsquo;s not easy to head in and out of the island unless you&rsquo;ve got a car.&nbsp;</span></p>\r\n<p><strong>Making the most of your move to Singapore&nbsp;<br /></strong><span style=\"font-weight: 400;\">If you are in the process of planning your move, make sure you read our comprehensive and refreshed <a href=\"../../../blog/your-step-by-step-2021-moving-to-singapore-guide/\">2021 Moving to Singapore Guide</a> to learn more about the real cost of living in Singapore, what you need to prepare for and insights on family and work-life as an expat. <br /><br />You can also use our free <a href=\"https://www.haulmate.co/\">relocation dashboard </a>to discover other areas to live, chat with a community of likeminded people and begin setting up for your new life in Singapore... all before you land.&nbsp;&nbsp;</span></p>','Moving to Singapore: An expats guide to living in Sentosa','A detailed and personalised guide to living in Sentosa. Plan your move to Singapore by finding the right neighbourhood for you.','Moving to Singapore, Living in Sentosa, Living in Singapore, Expat',1.24908300,103.82748400,0,0,0,0,3,10.00,4250.00,'-',1,2,18,'2020-05-05 09:01:14','2020-10-23 13:32:08',5.59605996),
	(37,'Queenstown','queenstown','Queenstown','<p><span style=\"font-weight: 400;\">Living in Queenstown means that you&rsquo;re living in a neighbourhood that houses some of the oldest housing estates in the area. You&rsquo;ll find a good range of HDB flats and private condominiums here, and this particular area is well-suited to couples or families that are looking to begin their Singapore expat life. The majority of the individuals that reside in this area belong to the older demographic though Queenstown has been reinvigorated with trendier hang-out spots, quaint cafes, and restaurants.&nbsp;</span></p>\r\n<p><span style=\"font-weight: 400;\">The main housing areas within Queenstown consist of Princess Estate, Duchess Estate, Tanglin Halt, Commonwealth Estate, Queen&rsquo;s Close, and Mei Ling/Mei Chin. While this neighbourhood may have some older buildings, it has recently been given facelifts and makeovers that enable it to compete with Singapore&rsquo;s most indie streets. Since there are numerous schools within this area, it&rsquo;s also particularly popular with families.&nbsp;</span></p>','<p><strong>Distance from the CBD<br /></strong><span style=\"font-weight: 400;\">There are numerous MRT stations &ndash; 9 in particular, within this area. Some of the more popular MRT lines include Commonwealth, Buona Vista, Holland Village, and Queenstown MRT. There are also a total of three bus terminals within the area that&rsquo;ll easily connect you to the rest of the city. Heading to the CBD will take about 35-40 minutes by public transportation and 15-minutes by car.&nbsp;<br /><br /></span><strong>Living in Queenstown: Morning, day and night<br /></strong><span style=\"font-weight: 400;\">Start your morning walking along the My Queenstown Heritage Trail &ndash; a walking trail in Singapore that tells you about the evolution of public housing in Singapore through the personal stories of older residents. In the afternoon, head to the Queenstown Sports Complex for its variety of facilities from swimming pools to a fully-equipped gym. If you fancy a good book, there&rsquo;s also the Queenstown Public Library that&rsquo;s a great spot to spend a quiet afternoon.&nbsp;</span></p>\r\n<p><span style=\"font-weight: 400;\">Other spots to visit around the Queenstown area include Wessex Estate with its black and white colonial-style buildings and the famous Colonial Bar that was once a canteen for the British Army. You&rsquo;ve got the store facade from the outside that still maintains its old-school decor along walls adorned with vintage photographs. While you&rsquo;re here, sip on a cup of coffee while soaking in the historical significance.&nbsp;</span></p>\r\n<p><span style=\"font-weight: 400;\">While there isn&rsquo;t a lot of nightlife in the area, there are a couple of bars that you can head to when evening hits. Head to The Good Beer Company for some refreshing craft beer or drop by sixty40 for a delicious meal accompanied by live music.&nbsp;</span></p>\r\n<p><strong>Shop&nbsp;<br /></strong><span style=\"font-weight: 400;\">There are a couple of malls dotting the area from Queensway Shopping Centre &ndash; one of Singapore&rsquo;s first multi-purpose shopping complexes along with Anchorpoint Shopping Centre, a two-storey shopping centre that also has a Japanese fish mart selling fresh sashimi. There&rsquo;s a couple of Fairprice supermarkets along the Queenstown area, along with a few traditional shops that you may not normally find in other neighbourhoods. From shave shops, there&rsquo;s also provision shops and some stationery shops such as the Long Hwee Store that sells vintage wares such as tape writers and even typewriter correction paper.&nbsp;</span></p>\r\n<p><strong>Eat&nbsp;<br /></strong><span style=\"font-weight: 400;\">There are plenty of delicious eats in the Queenstown Area from chicken rice at Commonwealth Crescent Food Centre to dim sum at Mei Ling Food Centre and a delicious pancake at Tanglin Halt Market. There&rsquo;s also Alexandar Hawker Centre and other food options which include Ristorante Takada for those looking for Japanese-Italian food without breaking the bank, and Keng Eng Kee Seafood for some traditional Singaporean seafood dishes.&nbsp;</span></p>\r\n<p><strong>See<br /></strong><span style=\"font-weight: 400;\">Head to SkyVille@Dawson to marvel at its award-winning design where views of and from the building are absolute spectacles. The rooftop garden can provide an incredible photo opportunity, and the Dawson estate itself is also a great place to walk through with over 50 wall murals lining around the estate. Just a minute away is SkyTerrace@Dawson, it has lush greenery with interconnecting bridges and evokes a futuristic vibe. At Forfar Heights, you&rsquo;ll spot an English-themed garden complete with an angelic statue, and is a lovely place to visit. Amidst all the new high rise buildings, there&rsquo;s also untouched vegetation at Kay Siang Road that&rsquo;s cocooned by vines and roots &ndash; definitely worth a visit to temporarily get away from the Singapore metropolis.&nbsp;</span></p>\r\n<p><strong>The downside<br /></strong><span style=\"font-weight: 400;\">There are only a few new properties in this district, so you&rsquo;d need to be okay with staying in some older housing estates.&nbsp;</span></p>\r\n<p><strong>Making the most of your move to Singapore&nbsp;<br /></strong><span style=\"font-weight: 400;\">If you are in the process of planning your move, make sure you read our comprehensive and refreshed <a href=\"../../../blog/your-step-by-step-2021-moving-to-singapore-guide/\">2021 Moving to Singapore Guide</a> to learn more about the real cost of living in Singapore, what you need to prepare for and insights on family and work-life as an expat. <br /><br />You can also use our free <a href=\"https://www.haulmate.co/\">relocation dashboard </a>to discover other areas to live, chat with a community of likeminded people and begin setting up for your new life in Singapore... all before you land.&nbsp;&nbsp;<br /></span></p>\r\n<p>&nbsp;</p>','Moving to Singapore: An expats guide to living in Queenstown','A detailed and personalised guide to living in Queenstown. Plan your move to Singapore by finding the right neighbourhood for you.','Moving to Singapore, Living in Queenstown, Living in Singapore, Expat',1.29254700,103.78643600,0,2,0,2,2,8.00,3000.00,'-',1,2,18,'2020-05-05 09:02:50','2020-10-23 13:02:56',7.27786268),
	(38,'Holland Village','holland-village','Holland Village','<p>With many landed properties and low-rise buildings, those living in Holland Village enjoy more space as compared to many Singaporean neighbourhoods. This makes it a popular area amongst expats, especially ones with families.&nbsp;</p>\r\n<p>In the heart of Holland Village is a bustling drinking spot with a stretch of trendy bars and bistros. Though many of the buildings have gone through renovations, you can still see the European influences in parts of its design. The subtle familiarities will make your expat life in Singapore, a tad easier.</p>','<p><strong>Distance from the CBD<br /></strong><span style=\"font-weight: 400;\">While Holland Village is considered semi-central, it is zoned as part of the western region. Getting to the CBD directly by MRT alone may take approximately 35 to 40 minutes. You could go to Buona Vista and access the Green line, but expect a few more transfers ahead. Alternatively, taxis offer a more efficient commute as it only takes 15 to 20 minutes to get to the CBD by car.</span></p>\r\n<p><strong>Living in Holland Village: Morning, day and night<br /></strong><span style=\"font-weight: 400;\">A day in <a href=\"https://thehoneycombers.com/singapore/guide-to-holland-village-singapore-the-coolest-restaurants-bars-and-shops-in-this-lively-neighbourhood/\" target=\"_blank\" rel=\"noopener\">Holland Village</a> begins around Chip Bee Garden, where you can have a hearty breakfast at any of the alfresco type eateries. Fresh baked goods and ready-to-eat sandwiches are on display, drawing in early crowds on their way to work.&nbsp;</span></p>\r\n<p><span style=\"font-weight: 400;\">During the day, you can visit the Holland Road Shopping Centre, which features boutiques, antique shops, salons and more. The experience will give you a glimpse of Singapore in the 90s, as some of the tenants have been situated there for many years. If you&rsquo;re starting to feel peckish, you could enjoy some afternoon Dim Sum at the Crystal Jade restaurant situated close by.&nbsp;&nbsp;</span></p>\r\n<p><span style=\"font-weight: 400;\">In the evenings, you&rsquo;ll find many expats jogging around the housing estate. Because there are many low-rise residences, Holland Village offers one of the more interesting jogging routes in Singapore. End the day by inviting a few friends to any of the bars and eateries that continue to operate till late.&nbsp;<br /></span></p>\r\n<p><strong>Shop&nbsp;<br /></strong><span style=\"font-weight: 400;\">Holland Village may not be a shopper&rsquo;s paradise, but what you will find are unique wares found in the Holland V Shopping Mall and Holland Road Shopping Centre. You&rsquo;ll also want to check out the Thambi Magazine Store, which has been in existence since the 40s.&nbsp;&nbsp;</span></p>\r\n<p><span style=\"font-weight: 400;\">For fresh produce, seafood and meat, go to the Holland Drive Market and Food Centre. Aside from groceries, you&rsquo;ll also find a treasure trove of mouth-watering local dishes.</span></p>\r\n<p><strong>Eat&nbsp;<br /></strong><span style=\"font-weight: 400;\">Casual. Fancy. International. Local. Holland Village has it all. For an authentic Chinese dining experience, you can either dine at Soup Restaurant or Crystal Jade. For a more affordable experience, many of the coffee shops offer wok-fried dishes to go with rice.&nbsp;</span></p>\r\n<p><span style=\"font-weight: 400;\">If you&rsquo;re keen on exotic flavours, there is Qasr for Middle-eastern or Ginza Soba Kamo Kydaime Keisuke that specialises in Duck Ramen.</span></p>\r\n<p><strong>See&nbsp;<br /></strong><span style=\"font-weight: 400;\">Like many of the more affluent neighbourhoods in Singapore, there is no shortage of landed properties in Holland Village. Exploring the neighbourhood to appreciate the impressively designed houses would be a treat for anyone with an interest in architecture and interior design.&nbsp;<br /><br /></span><strong>The downside<br /></strong><span style=\"font-weight: 400;\">Although Holland Village may be a sufficient neighbourhood that covers most of your needs, it does not fully showcase the diversity of Singapore. To really immerse yourself in Singaporean living, you&rsquo;ll want to explore neighbourhoods like Bugis or Tanjong Pagar.&nbsp;&nbsp;<br /></span></p>\r\n<p><strong>Making the most of your move to Singapore&nbsp;<br /></strong><span style=\"font-weight: 400;\">If you are in the process of planning your move, make sure you read our comprehensive and refreshed <a href=\"../../../blog/your-step-by-step-2021-moving-to-singapore-guide/\">2021 Moving to Singapore Guide</a> to learn more about the real cost of living in Singapore, what you need to prepare for and insights on family and work-life as an expat. <br /><br />You can also use our free <a href=\"https://www.haulmate.co/\">relocation dashboard </a>to discover other areas to live, chat with a community of likeminded people and begin setting up for your new life in Singapore... all before you land.&nbsp;&nbsp;</span></p>','Moving to Singapore: An expats guide to living in Holland Village','A detailed and personalised guide to living in Holland Village. Plan your move to Singapore by finding the right neighbourhood for you.','Moving to Singapore, Living in Holland Village, Living in Singapore, Expat, Relocation',1.31112200,103.79817400,0,5,3,1,2,8.00,3000.00,'-',1,9,18,'2020-05-05 09:03:46','2020-10-23 10:58:00',6.30007019),
	(39,'Bukit Timah','bukit-timah','Bukit Timah','<p><strong>Bukit Timah<br /></strong><span style=\"font-weight: 400;\">Living in Bukit Timah means that you&rsquo;re living in a gorgeous green neighbourhood that&rsquo;s close to plenty of international schools, socialising spots, and excellent restaurants. With plenty of landed private properties as well as high-end condominiums, this area is well-suited to families that are looking to begin their Singapore expat life.&nbsp;</span></p>\r\n<p><span style=\"font-weight: 400;\">Moving to Singapore can be an overwhelming process &ndash; especially if you&rsquo;ve got a family, but living in Bukit Timah will make the moving process more seamless. It&rsquo;s one of the most sought-after places to live in Singapore with premier residential estates, and luxury housing. It&rsquo;s a prime spot for expats that are looking to rent out an entire house or live near the CBD without having to deal with the busyness. It&rsquo;s the perfect balance of lush greenery, and privacy while still having a Singapore charm.&nbsp;</span></p>','<p><strong>Distance from the CBD<br /></strong><span style=\"font-weight: 400;\">Bukit Timah is located in Singapore&rsquo;s central region and isn&rsquo;t too far from the CBD. You&rsquo;ll get there in about 15-20 minutes by car and about 40-50 minutes by public transportation. There&rsquo;s a total of 6 MRT stations within the vicinity along with a total of two lines &ndash; the Downtown Line and Circle Line. Since Bukit Timah may not be the most convenient when it comes to taking public transportation, most residents that reside in this area have a car to help them get around conveniently in Singapore.<br /><br /></span><strong>Living in Bukit Merah: Morning, day and night<br /></strong><span style=\"font-weight: 400;\">Start your morning at any one of the long lists of popular brunch spots and hipster cafes in the area. It&rsquo;ll satisfy the most particular caffeine addicts, and there are plenty of independent concepts and small artisanal businesses with lots of character that you can pop into.&nbsp;</span></p>\r\n<p><span style=\"font-weight: 400;\">If you&rsquo;re a fitness buff, you can head into CrossFit Bukit Timah &ndash; it&rsquo;s one of the largest and only outdoor CrossFit with Personal Training facilities. With experienced coaches, you&rsquo;ll feel more than ready to conquer your next workout. If you prefer to workout on your own, Anytime Fitness is a gym that&rsquo;s open 24-hours so you can do a workout at any time of the day.&nbsp;</span></p>\r\n<p><span style=\"font-weight: 400;\">Bukit Timah houses some of the best bakeries so you wouldn&rsquo;t want to miss heading to Crown Bakery &amp; Cafe to check out some of the freshest bakes. Everything baked here is only made with the finest ingredients from French mill wheat flour to Hokkaido Kitanokaori flour. If you&rsquo;re a cake person, head to Vicky&rsquo;s Cakes&rsquo; and grab a slide of carrot, dark velvet or try a unique flavor like the banana gula melaka butterscotch.&nbsp;</span></p>\r\n<p><span style=\"font-weight: 400;\">In the evening, head to The Grandstand which houses some of Singapore&rsquo;s best and most famous restaurants. Ristorante Da Valentino is a great spot to have delicious Italian food that&rsquo;s served up by Chef Valentino and his family. Then, grab a drink at Bojangles, a casual neighbourhood pub that&rsquo;s a great place to gather with friends and enjoy some draft beers on tap.&nbsp;</span></p>\r\n<p><strong>Shop&nbsp;<br /></strong><span style=\"font-weight: 400;\">The Bukit Timah area has several malls to cater to different needs. The Bukit Timah Shopping Centre is the most prominent mall in the Bukit Timah area as it&rsquo;s a 22-level commercial centre that houses plenty of shops, restaurants, and a large supermarket. Right across from Bukit Timah Shopping Centre is Bukit Timah Plaza, another mall that has specialty shops, educational services, dining, and a supermarket.&nbsp;</span></p>\r\n<p><span style=\"font-weight: 400;\">Located along Upper Bukit Timah Road, The Rail Mall is a strip mall that looks very different from the other malls you&rsquo;d usually see in Singapore. It has an eclectic mix of tenants from dining to enrichment centres and a Cold Storage supermarket.&nbsp;</span></p>\r\n<p><strong>Eat&nbsp;<br /></strong><span style=\"font-weight: 400;\">There&rsquo;s plenty of food options available at Bukit Timah from Pasarbella &ndash; a community based open-concept market with international and local traders to Greenwood Fish Market &amp; Bistro that sells and serves some of the freshest seafood in the neighbourhood. For local eats, Kampong Chicken Rice Chicken House is a good one to try, and you wouldn&rsquo;t want to miss slurping on Jo Seng&rsquo;s Teochew Porridge in Beauty World mall. While there aren&rsquo;t any large hawker centres in the area, Good Good Eating House does have a variety of food to satisfy all palates.&nbsp;</span></p>\r\n<p><strong>See<br /></strong><span style=\"font-weight: 400;\">Living in Bukit Timah means that you&rsquo;ll have access to a high concentration of Singapore&rsquo;s native tropical greenery and rainforests. Bukit Timah Nature Reserve is a popular spot to visit as its home to Bukit Timah Hill &ndash; the tallest natural standing point in Singapore. Head there in the morning, and you&rsquo;ll most likely catch plenty of eager runners sprinting up the hill. From the reserve, you can also hike through the forest and head to the Tree Top Walk to traverse the canopy.&nbsp;</span></p>\r\n<p><span style=\"font-weight: 400;\">Alongside the nature trails, Bukit Timah also has a saddle club that&rsquo;s great for learners of all ages and levels to experience horse riding in a casual or competitive setting.&nbsp;</span></p>\r\n<p><strong>The downside<br /></strong><span style=\"font-weight: 400;\">With its premium housing options, Bukit Timah is an expensive area compared to other neighbourhoods on the outskirts of Singapore&rsquo;s city center. There&rsquo;s very few public housing in the area, and most of the residences here are either luxury condominiums or landed properties. Compared to other areas of Singapore, it&rsquo;s also not the most accessible.&nbsp;<br /><br /></span><strong>Making the most of your move to Singapore&nbsp;<br /></strong><span style=\"font-weight: 400;\">If you are in the process of planning your move, make sure you read our comprehensive and refreshed <a href=\"../../../blog/your-step-by-step-2021-moving-to-singapore-guide/\">2021 Moving to Singapore Guide</a> to learn more about the real cost of living in Singapore, what you need to prepare for and insights on family and work-life as an expat. <br /><br />You can also use our free <a href=\"https://www.haulmate.co/\">relocation dashboard </a>to discover other areas to live, chat with a community of likeminded people and begin setting up for your new life in Singapore... all before you land.&nbsp;&nbsp;<br /></span></p>\r\n<p>&nbsp;</p>\r\n<p><span style=\"font-weight: 400;\">&nbsp;</span></p>\r\n<p>&nbsp;</p>','Moving to Singapore: An expat guide to living in Bukit Timah','A detailed and personalised guide to living in Bukit Timah. Plan your move to Singapore by finding the right neighbourhood for you.','Moving to Singapore, Living in Bukit Timah, Living in Singapore, Expat',1.33362600,103.79790500,0,4,0,2,2,10.00,3000.00,'-',1,4,11,'2020-05-05 09:04:31','2020-10-23 10:16:59',7.50399257),
	(40,'Clementi','clementi','Clementi','<p>Living in Clementi</p>','<p>Living in Clementi</p>',NULL,NULL,NULL,1.31488100,103.76486300,0,8,4,6,2,8.00,2800.00,'-',1,1,11,'2020-05-05 09:06:04','2020-10-15 13:01:52',9.97183285),
	(41,'Bukit Batok','bukit-batok','Bukit Batok','<p>Living in Bukit Batok</p>','<p>Living in Bukit Batok</p>',NULL,NULL,NULL,1.35283400,103.75584200,0,7,0,5,1,8.00,2300.00,'-',1,0,11,'2020-05-05 09:06:39','2020-10-15 13:01:40',12.57036501),
	(42,'Jurong East/West','jurong-eastwest','Jurong East/West','<p>Living in Jurong East/West</p>','<p>Living in Jurong East/West</p>',NULL,NULL,NULL,1.32968600,103.72379200,0,4,1,0,1,10.00,2800.00,'-',1,0,4,'2020-05-05 09:12:43','2020-10-15 13:01:22',14.80491535),
	(43,'Woodlands','woodlands','Woodlands','<p><span style=\"font-weight: 400;\">Living in Woodlands means that you get to experience a typical Singaporean neighbourhood with the addition of unique experiences that can only be found in this locality. There&rsquo;s a range of affordable properties here and since it&rsquo;s closed to a few schools, including the Singapore American School, it&rsquo;s perfect for families that are looking to begin their Singapore expat life.&nbsp;</span></p>\r\n<p><span style=\"font-weight: 400;\">Woodlands is an interesting area as it&rsquo;s close to the Johor-Singapore Causeway, making Johor Bahru only a couple of hours away. It&rsquo;s also an area with plenty of large open spaces, recreational facilities, and communal gardens. It&rsquo;s one of the few neighborhoods in Singapore that&rsquo;s integrated nature into the modern landscape for tranquil spaces that&rsquo;s well-suited for family walks and relaxation.&nbsp;</span></p>','<p><strong>Distance from the CBD<br /></strong><span style=\"font-weight: 400;\">Situated in the North Region of Singapore, those living in Woodlands will have access to five MRT stations &ndash; Woodlands, Woodlands North, Woodlands South, Marsiling, and Admiralty. It&rsquo;ll take about 40-50 minutes to get to the CBD by public transportation, and about 30-40 minutes by car.&nbsp;</span></p>\r\n<p><strong>Living in Woodlands: Morning, day and night<br /></strong><span style=\"font-weight: 400;\">Woodlands is an area that&rsquo;s buzzing with activity so there&rsquo;s plenty to do throughout the day. Start your morning heading to the Senoko Fishery Port, a wholesale fish market that supplies the freshest seafood to restaurants and supermarkets in Singapore. Alternatively, drop by one of the many wet markets to get some fresh produce and goods.&nbsp;</span></p>\r\n<p><span style=\"font-weight: 400;\">Then, take a stroll at one of the many parks and gardens around the area. There&rsquo;s Marsiling Park, Admiralty Park, and Woodlands Waterfront Park. The waterfront park has a 400-meter long jetty &ndash; the longest in Singapore, which you&rsquo;re welcome to fish at. Besides fishing, you can also picnic, fly kites and take some photographs. It&rsquo;s a great space to unwind at with an unobstructed view of the sea and Johor Straits. If you&rsquo;re lucky, you might even catch a glimpse of some monkeys playing on the grounds. Children will love playing at Fu Shan Garden as it has a mini Jurassic Park themed playground with tunnels and slides.&nbsp;</span></p>\r\n<p><span style=\"font-weight: 400;\">For those that want to work up a sweat, there are plenty of gyms in Woodlands from Anytime Fitness to ActiveSG that has an indoor gym, Olympic-sized swimming pool, and even a Jacuzzi. For an affordable neighbourhood gym, SwoleFit Garage is a great place as there are no long-term membership requirements.&nbsp;</span></p>\r\n<p><span style=\"font-weight: 400;\">In the evenings, head to North Shore Park for a BBQ while admiring the sunset. While there aren&rsquo;t that many bars as nightlife isn&rsquo;t prevalent in the Woodlands area, there&rsquo;s still a couple of spots you can head to. Grab a drink at Woody Family Pub Cafe or head to 301 Bar &amp; Kitchen that also has a pool table and KTV corner.&nbsp;</span></p>\r\n<p><strong>Shop&nbsp;<br /></strong><span style=\"font-weight: 400;\">The largest suburban shopping mall in Woodlands is Causeway Point. It has over 250 retail outlets spread across 7 floors. You&rsquo;ve got entertainment facilities, dining options and more. Woodlands Mart is another place to shop at with high-quality outlet stores, its clean and spacious atmosphere will make your shopping experience a pleasant one. There&rsquo;s also Woodlands North Plaza that houses a supermarket along with a broad range of goods and services.&nbsp;</span></p>\r\n<p><strong>Eat&nbsp;<br /></strong><span style=\"font-weight: 400;\">There&rsquo;s plenty of places to eat in the Woodlands area. Rasa Istimewa Waterfront Restaurant is a unique eatery situated on an existing jetty with incredible views of both the Johor and Singapore skylines. You&rsquo;ll get to have your seafood fix on the water and enjoy a range of tantalising dishes from barbecue stingray to the famous Singapore chilli crab. Other places to enjoy include Citrus By The Pool for some refreshing milkshakes, and Black &amp; White Rojak for a delicious Singapore-style salad. For your fix of local dishes, you can head to Woodlands Street 12 Hawker Centre and Marsiling Lane Food Centre for some yummy local eats.&nbsp;</span></p>\r\n<p><strong>See<br /></strong><span style=\"font-weight: 400;\">There aren&rsquo;t that many attractions around the Woodlands area as it&rsquo;s mainly a residential and nature-focused neighbourhood. If you&rsquo;re wandering around the area, however, feel free to pop into Woodlands Regional Library &ndash; the largest neighbourhood library in Singapore that has plenty of books for all ages. There&rsquo;s also the Republic Cultural Centre that has dance studios, black box theatres, as well as a cafe. If you&rsquo;d like to check out some stars, the Woodlands Galaxy Community Club has an Andromeda Observatory that features a telescope that&rsquo;ll give you the best views into space.&nbsp;</span></p>\r\n<p><strong>The downside<br /></strong><span style=\"font-weight: 400;\">Being one of the neighbourhoods that&rsquo;s further out, there&rsquo;s quite a long commute into the CBD area. If you&rsquo;re staying at Woodlands you can also feel slightly remote and isolated from the rest of Singapore. The area also lacks any major attractions and there isn&rsquo;t much nightlife in the area.&nbsp;</span></p>\r\n<p><strong>Making the most of your move to Singapore&nbsp;<br /></strong><span style=\"font-weight: 400;\">If you are in the process of planning your move, make sure you read our comprehensive and refreshed <a href=\"../../../blog/your-step-by-step-2021-moving-to-singapore-guide/\">2021 Moving to Singapore Guide</a> to learn more about the real cost of living in Singapore, what you need to prepare for and insights on family and work-life as an expat. <br /><br />You can also use our free <a href=\"https://www.haulmate.co/\">relocation dashboard </a>to discover other areas to live, chat with a community of likeminded people and begin setting up for your new life in Singapore... all before you land.&nbsp;</span></p>','Moving to Singapore: An expats guide to living in Woodlands','A detailed and personalised guide to living in Woodlands. Plan your move to Singapore by finding the right neighbourhood for you.','Moving to Singapore, Living in Woodlands, Living in Singapore, Expat',1.43701600,103.78628000,0,6,1,2,1,8.00,2100.00,'-',1,0,4,'2020-05-05 09:15:53','2020-10-23 13:55:33',17.57507797);

/*!40000 ALTER TABLE `locations` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table moving_list
# ------------------------------------------------------------

DROP TABLE IF EXISTS `moving_list`;

CREATE TABLE `moving_list` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `moving_from` int(11) NOT NULL,
  `moving_to` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `moving_list` WRITE;
/*!40000 ALTER TABLE `moving_list` DISABLE KEYS */;

INSERT INTO `moving_list` (`id`, `name`, `email`, `moving_from`, `moving_to`, `created_at`, `updated_at`)
VALUES
	(1,'wickey','wickey@mailinator.com',1,1,'2020-07-08 02:41:31','2020-07-08 02:41:31'),
	(2,'wickey','wickey@mailinator.com',191,1,'2020-07-08 03:00:00','2020-07-08 03:00:00'),
	(3,'Katell Cherry','trester@mailinator.com',3,1,'2020-10-12 08:07:53','2020-10-12 08:07:53'),
	(4,'mohammed_fadel@yatdew.com','mohammed_fadel@yatdew.com',2,2,'2020-12-05 11:56:43','2020-12-05 11:56:43'),
	(5,'tiana.rowe57@gmxxail.com','tiana.rowe57@gmxxail.com',2,2,'2020-12-08 23:18:43','2020-12-08 23:18:43'),
	(6,'imani.witting93@banglemail.com','imani.witting93@banglemail.com',2,2,'2020-12-12 02:30:02','2020-12-12 02:30:02'),
	(7,'nikki72@devaza.id','nikki72@devaza.id',2,2,'2020-12-12 23:27:14','2020-12-12 23:27:14'),
	(8,'arachni_name)','arachni@email.gr',1,1,'2020-12-14 09:47:25','2020-12-14 09:47:25'),
	(9,'arachni_name\"\'`--','arachni@email.gr',1,1,'2020-12-14 09:47:26','2020-12-14 09:47:26'),
	(10,'arachni_name','arachni@email.gr',1,1,'2020-12-14 09:47:26','2020-12-14 09:47:26'),
	(11,'arachni_name\"\'`--','arachni@email.gr',1,1,'2020-12-16 02:26:47','2020-12-16 02:26:47'),
	(12,'arachni_name','arachni@email.gr',1,1,'2020-12-16 02:26:48','2020-12-16 02:26:48'),
	(13,'arachni_name)','arachni@email.gr',1,1,'2020-12-16 02:26:48','2020-12-16 02:26:48'),
	(14,'arachni_name','arachni@email.gr',1,1,'2020-12-17 02:12:49','2020-12-17 02:12:49'),
	(15,'arachni_name)','arachni@email.gr',1,1,'2020-12-17 02:12:49','2020-12-17 02:12:49'),
	(16,'arachni_name\"\'`--','arachni@email.gr',1,1,'2020-12-17 02:12:50','2020-12-17 02:12:50'),
	(17,'maggie_bogan@tooolz.com','maggie_bogan@tooolz.com',2,2,'2020-12-17 08:33:04','2020-12-17 08:33:04'),
	(18,'arachni_name\"\'`--','arachni@email.gr',1,1,'2020-12-17 19:08:32','2020-12-17 19:08:32'),
	(19,'arachni_name)','arachni@email.gr',1,1,'2020-12-17 19:08:32','2020-12-17 19:08:32'),
	(20,'arachni_name','arachni@email.gr',1,1,'2020-12-17 19:08:33','2020-12-17 19:08:33'),
	(21,'isobel72@hotmail.com','concepcion69@mdhmx.com',2,2,'2020-12-19 12:43:21','2020-12-19 12:43:21'),
	(22,'arachni_name\"\'`--','arachni@email.gr',1,1,'2020-12-19 16:34:54','2020-12-19 16:34:54'),
	(23,'arachni_name','arachni@email.gr',1,1,'2020-12-19 16:34:54','2020-12-19 16:34:54'),
	(24,'arachni_name)','arachni@email.gr',1,1,'2020-12-19 16:34:54','2020-12-19 16:34:54'),
	(25,'arachni_name','arachni@email.gr',1,1,'2020-12-21 07:15:01','2020-12-21 07:15:01'),
	(26,'arachni_name)','arachni@email.gr',1,1,'2020-12-21 07:15:02','2020-12-21 07:15:02'),
	(27,'arachni_name\"\'`--','arachni@email.gr',1,1,'2020-12-21 07:15:02','2020-12-21 07:15:02'),
	(28,'arachni_name','arachni@email.gr',1,1,'2020-12-22 18:20:47','2020-12-22 18:20:47'),
	(29,'arachni_name\"\'`--','arachni@email.gr',1,1,'2020-12-22 18:20:49','2020-12-22 18:20:49'),
	(30,'arachni_name)','arachni@email.gr',1,1,'2020-12-22 18:20:49','2020-12-22 18:20:49'),
	(31,'arachni_name\"\'`--','arachni@email.gr',1,1,'2020-12-24 05:22:33','2020-12-24 05:22:33'),
	(32,'arachni_name','arachni@email.gr',1,1,'2020-12-24 05:22:34','2020-12-24 05:22:34'),
	(33,'arachni_name)','arachni@email.gr',1,1,'2020-12-24 05:22:35','2020-12-24 05:22:35'),
	(34,'Cik yah','cikyahcikyah09@gmail.com',137,137,'2020-12-24 21:30:26','2020-12-24 21:30:26'),
	(35,'arachni_name)','arachni@email.gr',1,1,'2020-12-25 11:59:01','2020-12-25 11:59:01'),
	(36,'arachni_name\"\'`--','arachni@email.gr',1,1,'2020-12-25 11:59:01','2020-12-25 11:59:01'),
	(37,'arachni_name','arachni@email.gr',1,1,'2020-12-25 11:59:01','2020-12-25 11:59:01'),
	(38,'arachni_name','arachni@email.gr',1,1,'2020-12-25 12:08:56','2020-12-25 12:08:56'),
	(39,'arachni_name\"\'`--','arachni@email.gr',1,1,'2020-12-25 12:08:56','2020-12-25 12:08:56'),
	(40,'arachni_name)','arachni@email.gr',1,1,'2020-12-25 12:08:56','2020-12-25 12:08:56'),
	(41,'arachni_name','arachni@email.gr',1,1,'2020-12-25 12:48:12','2020-12-25 12:48:12'),
	(42,'arachni_name\"\'`--','arachni@email.gr',1,1,'2020-12-25 12:48:12','2020-12-25 12:48:12'),
	(43,'arachni_name)','arachni@email.gr',1,1,'2020-12-25 12:48:13','2020-12-25 12:48:13'),
	(44,'arachni_name\"\'`--','arachni@email.gr',1,1,'2020-12-26 08:17:54','2020-12-26 08:17:54'),
	(45,'arachni_name)','arachni@email.gr',1,1,'2020-12-26 08:17:54','2020-12-26 08:17:54'),
	(46,'arachni_name','arachni@email.gr',1,1,'2020-12-26 08:17:54','2020-12-26 08:17:54'),
	(47,'arachni_name','arachni@email.gr',1,1,'2020-12-26 09:46:06','2020-12-26 09:46:06'),
	(48,'arachni_name)','arachni@email.gr',1,1,'2020-12-26 09:46:06','2020-12-26 09:46:06'),
	(49,'arachni_name\"\'`--','arachni@email.gr',1,1,'2020-12-26 09:46:07','2020-12-26 09:46:07'),
	(50,'arachni_name)','arachni@email.gr',1,1,'2020-12-26 12:15:46','2020-12-26 12:15:46'),
	(51,'arachni_name','arachni@email.gr',1,1,'2020-12-26 12:15:48','2020-12-26 12:15:48'),
	(52,'arachni_name\"\'`--','arachni@email.gr',1,1,'2020-12-26 12:15:48','2020-12-26 12:15:48'),
	(53,'arachni_name\"\'`--','arachni@email.gr',1,1,'2020-12-27 08:15:07','2020-12-27 08:15:07'),
	(54,'arachni_name)','arachni@email.gr',1,1,'2020-12-27 08:15:07','2020-12-27 08:15:07'),
	(55,'arachni_name','arachni@email.gr',1,1,'2020-12-27 08:15:08','2020-12-27 08:15:08'),
	(56,'emilyweimann92@outlook.com','hermina.hoeger@mteen.net',2,2,'2020-12-27 12:27:51','2020-12-27 12:27:51'),
	(57,'Kryst2008','parkercatherine622@gmail.com',2,2,'2020-12-27 14:09:53','2020-12-27 14:09:53'),
	(58,'Geofrey Simumba','Simumbageofrey3@gmail.com',1,34,'2020-12-28 20:46:27','2020-12-28 20:46:27'),
	(59,'arachni_name\"\'`--','arachni@email.gr',1,1,'2020-12-28 22:15:01','2020-12-28 22:15:01'),
	(60,'arachni_name','arachni@email.gr',1,1,'2020-12-28 22:15:03','2020-12-28 22:15:03'),
	(61,'arachni_name)','arachni@email.gr',1,1,'2020-12-28 22:15:03','2020-12-28 22:15:03'),
	(62,'arachni_name\"\'`--','arachni@email.gr',1,1,'2020-12-30 17:03:40','2020-12-30 17:03:40'),
	(63,'arachni_name)','arachni@email.gr',1,1,'2020-12-30 17:03:40','2020-12-30 17:03:40'),
	(64,'arachni_name','arachni@email.gr',1,1,'2020-12-30 17:03:41','2020-12-30 17:03:41'),
	(65,'arachni_name)','arachni@email.gr',1,1,'2020-12-30 21:17:07','2020-12-30 21:17:07'),
	(66,'arachni_name','arachni@email.gr',1,1,'2020-12-30 21:17:07','2020-12-30 21:17:07'),
	(67,'arachni_name\"\'`--','arachni@email.gr',1,1,'2020-12-30 21:17:08','2020-12-30 21:17:08'),
	(68,'arachni_name)','arachni@email.gr',1,1,'2020-12-31 03:57:11','2020-12-31 03:57:11'),
	(69,'arachni_name','arachni@email.gr',1,1,'2020-12-31 03:57:13','2020-12-31 03:57:13'),
	(70,'arachni_name\"\'`--','arachni@email.gr',1,1,'2020-12-31 03:57:13','2020-12-31 03:57:13'),
	(71,'arachni_name','arachni@email.gr',1,1,'2020-12-31 17:07:27','2020-12-31 17:07:27'),
	(72,'arachni_name\"\'`--','arachni@email.gr',1,1,'2020-12-31 17:07:27','2020-12-31 17:07:27'),
	(73,'arachni_name)','arachni@email.gr',1,1,'2020-12-31 17:07:29','2020-12-31 17:07:29'),
	(74,'arachni_name)','arachni@email.gr',1,1,'2020-12-31 17:47:22','2020-12-31 17:47:22'),
	(75,'arachni_name','arachni@email.gr',1,1,'2020-12-31 17:47:22','2020-12-31 17:47:22'),
	(76,'arachni_name\"\'`--','arachni@email.gr',1,1,'2020-12-31 17:47:22','2020-12-31 17:47:22'),
	(77,'arachni_name\"\'`--','arachni@email.gr',1,1,'2020-12-31 18:15:04','2020-12-31 18:15:04'),
	(78,'arachni_name','arachni@email.gr',1,1,'2020-12-31 18:15:04','2020-12-31 18:15:04'),
	(79,'arachni_name)','arachni@email.gr',1,1,'2020-12-31 18:15:05','2020-12-31 18:15:05'),
	(80,'arachni_name','arachni@email.gr',1,1,'2020-12-31 23:04:53','2020-12-31 23:04:53'),
	(81,'arachni_name\"\'`--','arachni@email.gr',1,1,'2020-12-31 23:04:53','2020-12-31 23:04:53'),
	(82,'arachni_name)','arachni@email.gr',1,1,'2020-12-31 23:04:54','2020-12-31 23:04:54'),
	(83,'arachni_name','arachni@email.gr',1,1,'2021-01-01 01:34:50','2021-01-01 01:34:50'),
	(84,'arachni_name)','arachni@email.gr',1,1,'2021-01-01 01:34:50','2021-01-01 01:34:50'),
	(85,'arachni_name\"\'`--','arachni@email.gr',1,1,'2021-01-01 01:34:51','2021-01-01 01:34:51'),
	(86,'Lonzo1939','isobel72@hotmail.com',2,2,'2021-01-01 06:46:48','2021-01-01 06:46:48'),
	(87,'isobel72@hotmail.com','simone1@clientcaf.info',2,2,'2021-01-01 07:08:01','2021-01-01 07:08:01'),
	(88,'giovanny.cummerata@gmxxail.com','giovanny.cummerata@gmxxail.com',2,2,'2021-01-01 19:20:20','2021-01-01 19:20:20'),
	(89,'alberto.stroman84@hotmail.com','cheyanne5@gmxxail.com',2,2,'2021-01-01 23:28:45','2021-01-01 23:28:45'),
	(90,'emilyweimann92@outlook.com','rebekah96@banlamail.com',2,2,'2021-01-02 01:55:48','2021-01-02 01:55:48'),
	(91,'Camre1988','emilyweimann92@outlook.com',2,2,'2021-01-02 02:47:09','2021-01-02 02:47:09'),
	(92,'arachni_name\"\'`--','arachni@email.gr',1,1,'2021-01-02 04:59:34','2021-01-02 04:59:34'),
	(93,'arachni_name)','arachni@email.gr',1,1,'2021-01-02 04:59:34','2021-01-02 04:59:34'),
	(94,'arachni_name','arachni@email.gr',1,1,'2021-01-02 04:59:34','2021-01-02 04:59:34'),
	(95,'amiya73@projectmy.net','amiya73@projectmy.net',2,2,'2021-01-02 05:22:30','2021-01-02 05:22:30'),
	(96,'Conor1951','emilyweimann92@outlook.com',2,2,'2021-01-02 15:33:26','2021-01-02 15:33:26'),
	(97,'arachni_name)','arachni@email.gr',1,1,'2021-01-03 10:53:22','2021-01-03 10:53:22'),
	(98,'arachni_name\"\'`--','arachni@email.gr',1,1,'2021-01-03 10:53:23','2021-01-03 10:53:23'),
	(99,'arachni_name','arachni@email.gr',1,1,'2021-01-03 10:53:23','2021-01-03 10:53:23'),
	(100,'arachni_name\"\'`--','arachni@email.gr',1,1,'2021-01-03 16:56:30','2021-01-03 16:56:30'),
	(101,'arachni_name)','arachni@email.gr',1,1,'2021-01-03 16:56:30','2021-01-03 16:56:30'),
	(102,'arachni_name','arachni@email.gr',1,1,'2021-01-03 16:56:32','2021-01-03 16:56:32'),
	(103,'keara51@slclogin.com','keara51@slclogin.com',2,2,'2021-01-03 21:22:13','2021-01-03 21:22:13'),
	(104,'brandyn_olson@orimi.co','brandyn_olson@orimi.co',2,2,'2021-01-03 22:16:22','2021-01-03 22:16:22'),
	(105,'randi43@twinbash.co','randi43@twinbash.co',2,2,'2021-01-03 22:19:58','2021-01-03 22:19:58'),
	(106,'Carol1943!','emilyweimann92@outlook.com',2,2,'2021-01-04 01:40:21','2021-01-04 01:40:21'),
	(107,'Brans1932','ghowell00@yahoo.com',2,2,'2021-01-04 01:45:04','2021-01-04 01:45:04'),
	(108,'jordon.labadie@mailrez.com','jordon.labadie@mailrez.com',2,2,'2021-01-04 05:12:07','2021-01-04 05:12:07'),
	(109,'isobel72@hotmail.com','alana.bernhard62@webmai.co',2,2,'2021-01-04 05:17:54','2021-01-04 05:17:54'),
	(110,'tracey.deckow31@xindex.org','tracey.deckow31@xindex.org',2,2,'2021-01-05 11:15:10','2021-01-05 11:15:10'),
	(111,'einar_hammes@goodpostman.com','einar_hammes@goodpostman.com',2,2,'2021-01-05 11:26:30','2021-01-05 11:26:30'),
	(112,'ryan.ritchie@clientcaf.info','ryan.ritchie@clientcaf.info',2,2,'2021-01-06 18:38:13','2021-01-06 18:38:13'),
	(113,'Chris1924','casey.swiftt@aol.com',2,2,'2021-01-12 00:31:45','2021-01-12 00:31:45'),
	(114,'belle.ratke@mteen.net','belle.ratke@mteen.net',2,2,'2021-01-12 07:42:56','2021-01-12 07:42:56'),
	(115,'isobel72@hotmail.com','era_mayer@goldenmarine.net',2,2,'2021-01-12 08:05:29','2021-01-12 08:05:29'),
	(116,'arlie_walter@mdhmx.com','arlie_walter@mdhmx.com',2,2,'2021-01-12 12:31:23','2021-01-12 12:31:23'),
	(117,'raphaelle_ondricka@xindex.org','raphaelle_ondricka@xindex.org',2,2,'2021-01-12 14:42:27','2021-01-12 14:42:27'),
	(118,'emilyweimann92@outlook.com','roy.mann2@jephy-webmail.com',2,2,'2021-01-12 16:51:46','2021-01-12 16:51:46'),
	(119,'bethany.rice0@zebyinbox.com','bethany.rice0@zebyinbox.com',2,2,'2021-01-13 14:53:23','2021-01-13 14:53:23');

/*!40000 ALTER TABLE `moving_list` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table partner
# ------------------------------------------------------------

DROP TABLE IF EXISTS `partner`;

CREATE TABLE `partner` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subtitle` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon_url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `banner_url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `banner_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `banner_subtitle` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `banner_button` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `banner_action` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `button_text` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `action` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` enum('affiliate','relocation') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'relocation',
  `meta_description` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_keyword` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `views` int(11) NOT NULL DEFAULT 0,
  `order` int(11) NOT NULL,
  `partner_id` bigint(20) DEFAULT NULL,
  `is_active` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `partner` WRITE;
/*!40000 ALTER TABLE `partner` DISABLE KEYS */;

INSERT INTO `partner` (`id`, `title`, `subtitle`, `category`, `icon_url`, `banner_url`, `banner_title`, `banner_subtitle`, `banner_button`, `banner_action`, `body`, `button_text`, `action`, `type`, `meta_description`, `meta_keyword`, `views`, `order`, `partner_id`, `is_active`, `created_at`, `updated_at`)
VALUES
	(1,'10% off international Affiliate','Attend a property inspection and film it','Some Category','https://www.haulmate.co/assets/img/task1.svg','https://www.haulmate.co/assets/img/partner_bg.png','A PERFECT PLAN<br/>JUST FOR YOU','20GB FOR $18/MO','GET STARTED','dashboard-guest','<h2>A plan that\'s not complicated</h2>\r\n<p><span class=\"promo\">We make it easy for you.</span></p>\r\n<div class=\"row justify-content-center\">\r\n<div class=\"col-md-6 col-lg-4\">\r\n<div class=\"partner-plans__item\"><span class=\"partner-plans__item--label\">20GB FOR $18/MO</span>\r\n<div class=\"partner-plans__item--content\"><span>Some option here</span> <span>Some option here</span> <span>Some option here</span> <span>Some option here</span> <span>Some option here</span> <span>Some option here</span></div>\r\n</div>\r\n</div>\r\n</div>','Learn More','affiliate','affiliate','Meta description Affiliate 1','Affiliate 1',9,1,NULL,0,'2020-06-30 12:40:19','2020-11-13 10:49:09'),
	(2,'10% off international Relocation','Attend a property inspection and film it','Category','https://www.haulmate.co/assets/img/task1.svg','https://www.haulmate.co/assets/img/partner_bg.png','Banner Title','Banner Subtitle','Banner Button','relocation','Facilis est omnis dolore ex occaecati est minima aliquam. Sed in et cumque est perspiciatis et. Laudantium aperiam ut dolorem id.','Learn More','relocation','relocation',NULL,NULL,17,1,NULL,1,'2020-07-02 00:38:13','2020-11-13 10:49:09'),
	(3,'10% off international Affiliate','Conduct a video tour of areas I’m interested in','Category','https://www.haulmate.co/assets/img/task2.svg','https://www.haulmate.co/assets/img/partner_bg.png','A PERFECT PLAN<br/>JUST FOR YOU','20GB FOR $18/MO','GET STARTED','affiliate','<h2>A plan that\'s not complicated</h2>\n                <span class=\"promo\">We make it easy for you.</span>\n                <div class=\"row justify-content-center\">\n                    <div class=\"col-md-6 col-lg-4\">\n                        <div class=\"partner-plans__item\">\n                            <span class=\"partner-plans__item--label\">20GB FOR $18/MO</span>\n                            <div class=\"partner-plans__item--content\">\n                                <span>Some option here</span>\n                                <span>Some option here</span>\n                                <span>Some option here</span>\n                                <span>Some option here</span>\n                                <span>Some option here</span>\n                                <span>Some option here</span>\n                            </div>\n                        </div>\n                    </div>\n                </div>','Learn More','affiliate','affiliate',NULL,NULL,22,2,NULL,1,'2020-07-02 00:38:13','2020-11-13 10:49:09'),
	(4,'10% off international Relocation','Shortlist the best 5 rentals in my top areas','Category','https://www.haulmate.co/assets/img/task3.svg','https://www.haulmate.co/assets/img/partner_bg.png','Banner Title','Banner Subtitle','Banner Button','relocation','Quia sed autem occaecati accusantium animi doloremque non quaerat. Et iusto sed inventore id ut reprehenderit. Hic eos non at.','Learn More','relocation','relocation',NULL,NULL,7,3,NULL,1,'2020-07-02 00:38:13','2020-11-13 10:49:09'),
	(5,'10% off international Affiliate','Attend a property inspection and film it','Category','https://www.haulmate.co/assets/img/task4.svg','https://www.haulmate.co/assets/img/partner_bg.png','A PERFECT PLAN<br/>JUST FOR YOUR BUSINESS','30GB FOR $21/MO','GET STARTED','affiliate','<h2>A plan that\'s not complicated</h2>\n                <span class=\"promo\">We make it easy for you.</span>\n                <div class=\"row justify-content-center\">\n                    <div class=\"col-md-6 col-lg-4\">\n                        <div class=\"partner-plans__item\">\n                            <span class=\"partner-plans__item--label\">20GB FOR $18/MO</span>\n                            <div class=\"partner-plans__item--content\">\n                                <span>Some option here</span>\n                                <span>Some option here</span>\n                                <span>Some option here</span>\n                                <span>Some option here</span>\n                                <span>Some option here</span>\n                                <span>Some option here</span>\n                            </div>\n                        </div>\n                    </div>\n                </div>','Learn More','affiliate','affiliate',NULL,NULL,6,4,NULL,1,'2020-07-02 00:38:13','2020-11-13 10:49:09'),
	(6,'10% off international Relocation','Create your own tasks','Category','https://www.haulmate.co/assets/img/task2.svg','https://www.haulmate.co/assets/img/partner_bg.png','Banner Title','Banner Subtitle','Banner Button','relocation','Exercitationem et vel quisquam temporibus repellat. Sapiente qui ut quisquam quis molestias ea nulla. Nesciunt voluptatem consequuntur maxime ut eum nemo mollitia.','Learn More','relocation','relocation',NULL,NULL,4,5,NULL,1,'2020-07-02 00:38:13','2020-11-13 10:49:09'),
	(8,'Culpa odit ipsum po','Consequuntur magni v','Dolorum reprehenderi','https://www.haulmate.co/storage/partner/mfiwlOaOQo4T4kAkSxyhkHzHC1KNYCf56MtaVHun.png','https://www.haulmate.co/storage/partner/bzog2MRFeIz3ls3KrBz0cXJ5OGOxPjGqMow338ZP.png','Laboriosam non cill','Et praesentium non v','Culpa et minima sint','At ullamco praesenti','<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum molestie purus est, a dignissim ipsum tempus a. Suspendisse potenti. Praesent sed imperdiet neque, in volutpat felis. Interdum et malesuada fames ac ante ipsum primis in faucibus. Quisque tristique magna sed enim imperdiet, non tristique arcu elementum. Aenean sodales eros sit amet orci laoreet, sit amet elementum elit pulvinar. In sed sem sed velit gravida fringilla nec id nisl. Vivamus non convallis dolor, in fringilla tortor.</p>\r\n<p>Maecenas hendrerit cursus erat non porta. Donec luctus pharetra urna vel auctor. Pellentesque justo dui, consequat eu luctus efficitur, venenatis sed dui. Fusce mollis consequat nibh vel interdum. Sed non leo nisi. Vestibulum non vehicula magna. Fusce sagittis lorem eget elit interdum ornare. Nullam porta felis sit amet turpis volutpat varius. Ut metus orci, fringilla vel feugiat sed, consectetur ac felis. Suspendisse accumsan risus eget nisi ullamcorper dapibus. Praesent venenatis eget urna ut consequat. Nullam non lorem porttitor, congue purus eu, molestie felis. Nullam tincidunt nisi eget auctor semper. Integer convallis eu orci non maximus. Nunc sodales consectetur porta. Nam non consequat sem.</p>\r\n<p>Fusce vestibulum quam a augue pulvinar, vel lobortis justo luctus. Etiam tempor quis magna sed viverra. Ut accumsan quam elit, et sollicitudin arcu vehicula eu. Nam magna dui, convallis nec ullamcorper quis, accumsan sit amet ante. Sed nec vestibulum ex. Suspendisse potenti. Praesent id ligula et purus elementum ornare.</p>\r\n<p>Sed nec felis ac mi posuere blandit. Cras tincidunt commodo urna a accumsan. Sed sed libero velit. Nulla a bibendum ex. Nunc ex mauris, convallis eu bibendum ac, vehicula quis urna. Nunc commodo quis libero at pulvinar. Aliquam lobortis pretium lorem, ut lobortis libero varius pulvinar. In ac magna at orci vestibulum pellentesque eget non urna. Donec commodo venenatis mauris a viverra. Sed viverra id dolor ornare commodo.</p>\r\n<p>Proin dolor nulla, pulvinar sed interdum non, fringilla quis nunc. Nunc ex sem, convallis eget malesuada viverra, sagittis quis mauris. Sed et tortor rhoncus, hendrerit felis in, porta dolor. Cras ullamcorper semper orci, non dictum turpis cursus ut. Aliquam non urna ac sapien lobortis aliquet ac in lacus. Sed in urna at nibh semper euismod quis a turpis. Fusce id ornare est. Ut ut justo placerat, mattis dui et, venenatis quam. Praesent pulvinar tellus in nisl luctus ultrices. Suspendisse leo tellus, gravida et rutrum non, egestas eget neque. Nunc aliquam venenatis sodales. Aliquam at egestas dolor, in consequat tortor.</p>','Doloribus dignissimo','Consectetur dolor p','relocation',NULL,NULL,0,28,3,0,'2020-07-31 05:03:25','2020-11-13 10:49:09'),
	(9,'Perspiciatis elit','Ut commodo maiores i','Et hic Nam incidunt','https://www.haulmate.co/storage/partner/m4Jur14Xm9qHA4712pFuburtkXj6HAGe4sfB7Jnj.png','https://www.haulmate.co/storage/partner/iZOPG6kP0ZduGsw3stzmaG3r9LVdwuEIEiFcQXME.png','Eu rerum velit expe','Est aliquam odio do','Pariatur Esse accu','Unde enim quae conse','<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum molestie purus est, a dignissim ipsum tempus a. Suspendisse potenti. Praesent sed imperdiet neque, in volutpat felis. Interdum et malesuada fames ac ante ipsum primis in faucibus. Quisque tristique magna sed enim imperdiet, non tristique arcu elementum. Aenean sodales eros sit amet orci laoreet, sit amet elementum elit pulvinar. In sed sem sed velit gravida fringilla nec id nisl. Vivamus non convallis dolor, in fringilla tortor.</p>\r\n<p>Maecenas hendrerit cursus erat non porta. Donec luctus pharetra urna vel auctor. Pellentesque justo dui, consequat eu luctus efficitur, venenatis sed dui. Fusce mollis consequat nibh vel interdum. Sed non leo nisi. Vestibulum non vehicula magna. Fusce sagittis lorem eget elit interdum ornare. Nullam porta felis sit amet turpis volutpat varius. Ut metus orci, fringilla vel feugiat sed, consectetur ac felis. Suspendisse accumsan risus eget nisi ullamcorper dapibus. Praesent venenatis eget urna ut consequat. Nullam non lorem porttitor, congue purus eu, molestie felis. Nullam tincidunt nisi eget auctor semper. Integer convallis eu orci non maximus. Nunc sodales consectetur porta. Nam non consequat sem.</p>\r\n<p>Fusce vestibulum quam a augue pulvinar, vel lobortis justo luctus. Etiam tempor quis magna sed viverra. Ut accumsan quam elit, et sollicitudin arcu vehicula eu. Nam magna dui, convallis nec ullamcorper quis, accumsan sit amet ante. Sed nec vestibulum ex. Suspendisse potenti. Praesent id ligula et purus elementum ornare.</p>\r\n<p>Sed nec felis ac mi posuere blandit. Cras tincidunt commodo urna a accumsan. Sed sed libero velit. Nulla a bibendum ex. Nunc ex mauris, convallis eu bibendum ac, vehicula quis urna. Nunc commodo quis libero at pulvinar. Aliquam lobortis pretium lorem, ut lobortis libero varius pulvinar. In ac magna at orci vestibulum pellentesque eget non urna. Donec commodo venenatis mauris a viverra. Sed viverra id dolor ornare commodo.</p>\r\n<p>Proin dolor nulla, pulvinar sed interdum non, fringilla quis nunc. Nunc ex sem, convallis eget malesuada viverra, sagittis quis mauris. Sed et tortor rhoncus, hendrerit felis in, porta dolor. Cras ullamcorper semper orci, non dictum turpis cursus ut. Aliquam non urna ac sapien lobortis aliquet ac in lacus. Sed in urna at nibh semper euismod quis a turpis. Fusce id ornare est. Ut ut justo placerat, mattis dui et, venenatis quam. Praesent pulvinar tellus in nisl luctus ultrices. Suspendisse leo tellus, gravida et rutrum non, egestas eget neque. Nunc aliquam venenatis sodales. Aliquam at egestas dolor, in consequat tortor.</p>','Sapiente tenetur rei','Labore laboriosam l','relocation',NULL,NULL,0,8,3,1,'2020-07-31 05:04:29','2020-11-13 10:49:09'),
	(10,'Qui culpa numquam o','Necessitatibus ea re','Rerum aut ut sit cu','https://www.haulmate.co/storage/partner/U87mQXRKRCBe79icXHbkPhQagFKmfC5sTCSGkAW4.png','https://www.haulmate.co/storage/partner/wuh9pWt8BaA35QW7O2AZej35skjUbirCKSwdsxTq.png','Saepe sed quis error','Anim suscipit modi p','Deserunt aut facilis','Ex porro in dolor qu','<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum molestie purus est, a dignissim ipsum tempus a. Suspendisse potenti. Praesent sed imperdiet neque, in volutpat felis. Interdum et malesuada fames ac ante ipsum primis in faucibus. Quisque tristique magna sed enim imperdiet, non tristique arcu elementum. Aenean sodales eros sit amet orci laoreet, sit amet elementum elit pulvinar. In sed sem sed velit gravida fringilla nec id nisl. Vivamus non convallis dolor, in fringilla tortor.</p>\r\n<p>Maecenas hendrerit cursus erat non porta. Donec luctus pharetra urna vel auctor. Pellentesque justo dui, consequat eu luctus efficitur, venenatis sed dui. Fusce mollis consequat nibh vel interdum. Sed non leo nisi. Vestibulum non vehicula magna. Fusce sagittis lorem eget elit interdum ornare. Nullam porta felis sit amet turpis volutpat varius. Ut metus orci, fringilla vel feugiat sed, consectetur ac felis. Suspendisse accumsan risus eget nisi ullamcorper dapibus. Praesent venenatis eget urna ut consequat. Nullam non lorem porttitor, congue purus eu, molestie felis. Nullam tincidunt nisi eget auctor semper. Integer convallis eu orci non maximus. Nunc sodales consectetur porta. Nam non consequat sem.</p>\r\n<p>Fusce vestibulum quam a augue pulvinar, vel lobortis justo luctus. Etiam tempor quis magna sed viverra. Ut accumsan quam elit, et sollicitudin arcu vehicula eu. Nam magna dui, convallis nec ullamcorper quis, accumsan sit amet ante. Sed nec vestibulum ex. Suspendisse potenti. Praesent id ligula et purus elementum ornare.</p>\r\n<p>Sed nec felis ac mi posuere blandit. Cras tincidunt commodo urna a accumsan. Sed sed libero velit. Nulla a bibendum ex. Nunc ex mauris, convallis eu bibendum ac, vehicula quis urna. Nunc commodo quis libero at pulvinar. Aliquam lobortis pretium lorem, ut lobortis libero varius pulvinar. In ac magna at orci vestibulum pellentesque eget non urna. Donec commodo venenatis mauris a viverra. Sed viverra id dolor ornare commodo.</p>\r\n<p>Proin dolor nulla, pulvinar sed interdum non, fringilla quis nunc. Nunc ex sem, convallis eget malesuada viverra, sagittis quis mauris. Sed et tortor rhoncus, hendrerit felis in, porta dolor. Cras ullamcorper semper orci, non dictum turpis cursus ut. Aliquam non urna ac sapien lobortis aliquet ac in lacus. Sed in urna at nibh semper euismod quis a turpis. Fusce id ornare est. Ut ut justo placerat, mattis dui et, venenatis quam. Praesent pulvinar tellus in nisl luctus ultrices. Suspendisse leo tellus, gravida et rutrum non, egestas eget neque. Nunc aliquam venenatis sodales. Aliquam at egestas dolor, in consequat tortor.</p>','Est est recusandae','Quos dicta natus eos','relocation',NULL,NULL,0,8,4,1,'2020-07-31 05:06:58','2020-11-13 10:49:09'),
	(11,'Expat Insurance','The best insurance for expats','Insurance','https://www.haulmate.co/storage/partner/B0c983yfpe4Ri280L81a4vKJSNwia5BnnaLKyGL1.jpeg','https://www.haulmate.co/storage/partner/phFBBg24QCG81INARppXQBpz091Yy5TA7ifAtySv.jpeg',NULL,NULL,NULL,NULL,'<p>Buy your insurance today&nbsp;</p>','Buy','Go','affiliate',NULL,NULL,11,0,3,1,'2020-08-30 06:02:30','2020-11-13 10:49:09');

/*!40000 ALTER TABLE `partner` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table password_resets
# ------------------------------------------------------------

DROP TABLE IF EXISTS `password_resets`;

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`token`),
  KEY `password_resets_email_index` (`email`),
  KEY `created_at` (`created_at`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



# Dump of table pref_options
# ------------------------------------------------------------

DROP TABLE IF EXISTS `pref_options`;

CREATE TABLE `pref_options` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `preference` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon_url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `search` int(11) NOT NULL DEFAULT 0,
  `order` int(11) NOT NULL DEFAULT 0,
  `is_active` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `preference` (`preference`),
  KEY `icon_url` (`icon_url`),
  KEY `search` (`search`),
  KEY `order` (`order`),
  KEY `is_active` (`is_active`),
  KEY `created_at` (`created_at`),
  KEY `updated_at` (`updated_at`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `pref_options` WRITE;
/*!40000 ALTER TABLE `pref_options` DISABLE KEYS */;

INSERT INTO `pref_options` (`id`, `preference`, `icon_url`, `search`, `order`, `is_active`, `created_at`, `updated_at`)
VALUES
	(22,'Local Charm','https://www.haulmate.co/storage/icon/Q2miBuSxGynL9VP3nlGHQM5RZieLWHtbTdHNbLNi.png',0,17,1,'2020-05-01 10:31:05','2020-11-13 10:49:09'),
	(23,'Quiet','https://www.haulmate.co/storage/icon/PHbNBvT5kADVCwQc45wXLa552FO1bowCvikPkvqD.png',0,8,1,'2020-05-01 10:31:05','2020-11-13 10:49:09'),
	(24,'Affordable rent','https://www.haulmate.co/assets/img/icons/icon3.png',0,5,1,'2020-05-01 10:31:05','2020-11-13 10:49:09'),
	(25,'Families','https://www.haulmate.co/assets/img/icons/icon4.png',0,1,1,'2020-05-01 10:31:05','2020-11-13 10:49:09'),
	(26,'Nature / Running Spots','https://www.haulmate.co/storage/icon/vlKxc8sJIVmHbahFTf36F1NvHOKNrTczOB5FS7jv.png',0,12,1,'2020-05-01 10:31:05','2020-11-13 10:49:09'),
	(27,'Singles / Couples','https://www.haulmate.co/assets/img/icons/icon7.png',0,2,1,'2020-05-01 10:31:05','2020-11-13 10:49:09'),
	(28,'Bars','https://www.haulmate.co/assets/img/icons/icon8.png',0,10,1,'2020-05-01 10:31:05','2020-11-13 10:49:09'),
	(29,'Modern Feel','https://www.haulmate.co/storage/icon/VjiMRKd2kZImhO0W1zhGIKOiGKh1TXO3ri2NR7R3.png',0,16,1,'2020-05-01 10:31:05','2020-11-13 10:49:09'),
	(30,'Expat hotspot','https://www.haulmate.co/assets/img/icons/icon10.png',0,4,1,'2020-05-01 10:31:05','2020-11-13 10:49:09'),
	(31,'Pet friendly','https://www.haulmate.co/storage/icon/DOwj1yIJUjg5m2hELZGx3NVaSSM0wHf6lsdBEQx9.png',0,14,1,'2020-05-01 10:31:05','2020-11-13 10:49:09'),
	(32,'Low traffic','https://www.haulmate.co/storage/icon/I4HP9FI4gQxUE1PbjVxbzNjYb8bPi3JZeRxQwhId.png',0,7,1,'2020-05-01 10:31:05','2020-11-13 10:49:09'),
	(33,'Cafes','https://www.haulmate.co/assets/img/icons/icon13.png',0,9,1,'2020-05-01 10:31:05','2020-11-13 10:49:09'),
	(34,'Students','https://www.haulmate.co/assets/img/icons/icon14.png',0,3,1,'2020-05-01 10:31:05','2020-11-13 10:49:09'),
	(35,'Religious centres','https://www.haulmate.co/storage/icon/ATUu5N3dYkLu52bkib9oyVocIUmc5oDeUmAHJ49X.png',0,15,1,'2020-05-01 10:31:05','2020-11-13 10:49:09'),
	(36,'Yoga / Fitness spots','https://www.haulmate.co/assets/img/icons/icon17.png',0,13,1,'2020-05-01 10:31:05','2020-11-13 10:49:09'),
	(37,'Public transport','https://www.haulmate.co/assets/img/icons/icon18.png',0,6,1,'2020-05-01 10:31:05','2020-11-13 10:49:09'),
	(38,'Moving Origin','https://www.haulmate.co/assets/img/icons/icon19.png',0,18,0,'2020-05-01 10:31:05','2020-11-13 10:49:09'),
	(39,'Local Eats','https://www.haulmate.co/storage/icon/9wgCv9D7jdG4JhK6ON82KJ4QgYVIKn2EYx7jEFWY.png',0,11,1,'2020-05-01 10:31:05','2020-11-13 10:49:09');

/*!40000 ALTER TABLE `pref_options` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table product
# ------------------------------------------------------------

DROP TABLE IF EXISTS `product`;

CREATE TABLE `product` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `category_id` bigint(20) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subtitle` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `action_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `selected_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order` int(11) DEFAULT NULL,
  `is_active` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `product` WRITE;
/*!40000 ALTER TABLE `product` DISABLE KEYS */;

INSERT INTO `product` (`id`, `category_id`, `name`, `subtitle`, `action_url`, `image`, `selected_image`, `order`, `is_active`, `created_at`, `updated_at`)
VALUES
	(5,2,'Ultra 1 Gbps Broadband with router','MyRepublic','https://myrepublic.net/sg/broadband-promotions/1gbps-fibre-broadband-tp-link-ec330/','https://www.haulmate.co/storage/product/h0vKnkSWbFQB13QoWrgKQxpoiaJuPJNvgQhOdkyY.png','https://www.haulmate.co/storage/product/MXMIozoplvbDLLaIRRMECCYtgLAyGOgGL0vllb9t.png',1,1,'2020-10-25 12:31:25','2020-11-13 10:49:09'),
	(13,2,'1 Gbps Broadband with router','Starhub','https://www.starhub.com/personal/store/broadband/browse/products/1gbps-fibre-broadband--3990month_1000mbps-fibre-broadband.html','https://www.haulmate.co/storage/product/6PtFguznSYr6mcxaheLuSitzWc3c2IO8ry5shvTI.png','https://www.haulmate.co/storage/product/vU1DspRGrWqetILqMz2wayv248rIxGOcUckOwPCp.png',0,0,'2020-10-31 01:34:46','2020-11-13 10:49:09'),
	(14,2,'500 Mbps Broadband','M1','https://www.m1.com.sg/EShop/Fbb/Plans?planId=2-13-FBBPKG206393','https://www.haulmate.co/storage/product/L7CRYq3oFNOiX8rvWSbT5eECXAxgRWMBickOGqDp.png','https://www.haulmate.co/storage/product/SMulQYM1SmiuCC5ZXERuiFYOS5dbN0g5OcZoWkbI.png',3,1,'2020-10-31 01:53:35','2020-11-13 10:49:09'),
	(16,1,'20GB SIM only base plan','Circles.Life','https://activate-shop.circles.life/activate/sa_delivery?reset=true&code=SUPER38','https://www.haulmate.co/storage/product/BDtfpoZYf7VoYeP05Wd4sOvZIs8phx129IUjafjB.png','https://www.haulmate.co/storage/product/PVWCm9vqyxoISB7uRkinsMnyx0BrU4zD9q60ctLp.png',0,0,'2020-10-31 03:27:20','2020-11-13 10:49:09'),
	(17,1,'100G SIM only plan','Circles.Life','https://activate-shop.circles.life/activate/sa_delivery?reset=true&code=SUPER38&da=%5B%22Unlimited+Data%22%5D','https://www.haulmate.co/storage/product/5XozEP69MHdPX29cyD2ob0819bwU7yFkUxrwxmdZ.png','https://www.haulmate.co/storage/product/aaiVXv7wNvcx02Z3D55nf37wOYqi9DeDqQtRDGNP.png',0,0,'2020-10-31 03:43:13','2020-11-13 10:49:09'),
	(18,1,'Unlimited data plan','MyRepublic','https://mobile.myrepublic.com.sg/plans','https://www.haulmate.co/storage/product/PpK70mXB79SD1sN5CriqIhosOmVnOZDmhnDSG106.png','https://www.haulmate.co/storage/product/JWqC7HWhDvUsUFFqr6gKapOhX5FwOZC0yhds2pLl.png',0,0,'2020-10-31 03:56:10','2020-11-13 10:49:09'),
	(20,1,'40GB plus iPhone 12','M1','https://www.m1.comsg/EShop/Gsm/Phones/Plans/Builder','https://www.haulmate.co/storage/product/kNowl2ixvy7eqaKqElbKlVIMyfh7ZOUiXV3E6YAe.png','https://www.haulmate.co/storage/product/T6mcDDykY5B0Sg647SCA1O06quUs4hNotioU9LAV.png',0,0,'2020-10-31 04:12:32','2020-11-13 10:49:09'),
	(21,8,'DBS','Expat Programme','https://www.dbs.com.sg/personal/deposits/for-expats/expat-programme-benefits?pid=sg-dbs-pweb-article-expart-guide-creditcard-textlink-dbs-expart-programme','https://www.haulmate.co/storage/product/VGcfnrp3nxRLsgTAEaK2vfYw80576oXXjnNRHsfK.png','https://www.haulmate.co/storage/product/muu5jwwuHqLDlXPFfJXDHEAf1mD2tWcIDITAloF6.png',0,0,'2020-10-31 04:25:45','2020-11-13 10:49:09'),
	(22,8,'Standard Chartered','Bonus$aver account','https://www.sc.com/sg/save/current-accounts/bonussaver/?subChanCode=IB04&gclid=CjwKCAjw8-78BRA0EiwAFUw8LGt5lZwbX3fwv2TXUQwzS5Iac1vUPcrs-NsO3crk_u4ETj2YasyowBoCtcIQAvD_BwE&gclsrc=aw.ds','https://www.haulmate.co/storage/product/WKibE4FhMqSL5bug77eH8AH6sk8EJoQlwtVy33w7.webp','https://www.haulmate.co/storage/product/CTkx4mdb29Pi7Y8exfvuQ5N1Gq5dym15KtdJPBPD.webp',0,0,'2020-10-31 04:52:35','2020-11-13 10:49:09'),
	(23,8,'UOB','Stash Account','https://www.uob.com.sg/personal/save/savings/stash.page','https://www.haulmate.co/storage/product/DQKTQTJvyjona3qf1ARh9T4QSsGPjwbCVGmr2ENn.png','https://www.haulmate.co/storage/product/KBTAcrPPW7NBpRoipjko8T5GnTR0QZ44fGkroBhJ.png',0,0,'2020-10-31 04:58:01','2020-11-13 10:49:09'),
	(24,5,'Essential Home','Chubb','https://ap.studio-uat.chubb.com/sg/sph/pweb/essentialhome/en/home','https://www.haulmate.co/storage/product/IhcJ1qqFElNKq9g8mrDRFiWSpyduPbTL9eBGCw9E.png','https://www.haulmate.co/storage/product/SmXJmcgOgIVPa99VTCoucCSDpDjp0qlaluDnnocT.png',0,0,'2020-11-20 00:45:08','2020-11-20 01:17:16'),
	(25,5,'Premium Home','Chubb','https://ap.studio-uat.chubb.com/sg/sph/pweb/essentialhome/en/home','https://www.haulmate.co/storage/product/tirimlbGAl3Khg3ZL6ZpGug6nFulgT9XqJiTzMnA.png','https://www.haulmate.co/storage/product/g1PluhctoBm6xaxYFCELxv8iFcmd7tOYYw2SFo2t.png',0,0,'2020-11-20 00:53:43','2020-11-20 01:16:23'),
	(26,5,'Rental Home','FWD','https://www.fwd.com.sg/home-insurance/online-quote/quickQuestions','https://www.haulmate.co/storage/product/WvozRsIxX5CyZhLxtmgL94oazrHnfJB2CoRSnr7O.jpeg','https://www.haulmate.co/storage/product/oU2gWX1eBqSM1vgqVFRwuMAAz6Ig588xY9dzEg86.jpeg',0,0,'2020-11-20 00:58:36','2020-11-20 01:09:13'),
	(27,6,'Essential','FWD','https://www.fwd.com.sg/maid-insurance','https://www.haulmate.co/storage/product/NmQlKJdnVWe2sCMSHpB4tKhMEHMd6SzF1ZofkEb6.jpeg','https://www.haulmate.co/storage/product/SyeLKKsWa8CtSgvHjG1YJHDwJzSRuZvj9Fjp0jp1.jpeg',0,0,'2020-11-20 01:53:13','2020-11-20 02:17:00'),
	(28,6,'MaidPlus','MSIG','https://www.msig.com.sg/personal-insurance/maidplus','https://www.haulmate.co/storage/product/oU8mY3T7p603MpS9IGGpc0qQZy6hQslYXyd1T6Zu.png','https://www.haulmate.co/storage/product/vEcERcc84va6l7wWWfPrcaJh0M0Vw7FqyKB0Ko57.png',0,0,'2020-11-20 02:07:03','2020-11-20 02:17:52'),
	(29,6,'Maid Protect360','HL Assurance','https://app.hlas.com.sg/maid-protect360/quote','https://www.haulmate.co/storage/product/gvRtwUp0GyDzWWsIEH8wWV3akIsSryIFtXNM3aIe.png','https://www.haulmate.co/storage/product/xmoIjNMzYHoU0FyLPHTP5eu3XJhOaJsW6GYUtsjx.png',0,1,'2020-11-20 02:19:48','2020-11-21 04:06:31'),
	(30,4,'Essential','Chubb','https://ap.studio-uat.chubb.com/sg/grab/pweb/pa/en/home','https://www.haulmate.co/storage/product/LLbndzSEL5jBIQiVHYykHJ7Z1EIiCXGGu6fI8mij.jpeg','https://www.haulmate.co/storage/product/kdmdg8efMmtA8yYfbaqcpkdFXi5WYhnRydc60AZ2.jpeg',0,1,'2020-11-21 03:58:31','2020-11-21 03:58:31'),
	(31,4,'Premium','Chubb','https://ap.studio-uat.chubb.com/sg/grab/pweb/pa/en/home','https://www.haulmate.co/storage/product/8eG3Hc2fMM9pYehIXY6a9s37FMfTwaEDwysZJdCN.jpeg','https://www.haulmate.co/storage/product/QCqoFpQzV2gjU3aI7leVpO5kkRW8A4sWtursCc5M.jpeg',0,1,'2020-11-21 04:01:37','2020-11-21 04:01:37'),
	(32,4,'Platinum','Chubb','https://ap.studio-uat.chubb.com/sg/grab/pweb/pa/en/home','https://www.haulmate.co/storage/product/peqDT9OTcpoLat7KfBHgW345X2Zi2uWemtNAuQaF.jpeg','https://www.haulmate.co/storage/product/r1ZoncGxFsMH4qHHdPS5rWeOTK1RWa3ZsYtF51FJ.jpeg',0,1,'2020-11-21 04:03:23','2020-11-21 04:03:23'),
	(33,3,'HomeHub +1G','Starhub','https://www.starhub.com/personal/store/homehub/browse/products/homehub_-1g---netflix-on-us-for-12-months.html','https://www.haulmate.co/storage/product/9hA4ikH7YwFpQ7bejtpYVIZ7lY7y27IHkp8Scy1a.png','https://www.haulmate.co/storage/product/dcdNyMltChqom2P7k03T70gTQezd9DwRk5CJr8j4.png',0,0,'2020-11-28 05:28:19','2020-11-28 05:30:27'),
	(34,3,'Fibre + TV','Singtel','https://www.singtel.com/personal/products-services/broadband/eform/fibretvbundle','https://www.haulmate.co/storage/product/BLSc4jQOPTNdeIC36gSYz0xI5ILyrHbGH6ymSpmu.png','https://www.haulmate.co/storage/product/eEtrpKuW3s1LhEwm9eRcIQ5d4jnDyEHwfE4aD8To.png',0,0,'2020-11-28 05:33:09','2020-11-28 05:33:09');

/*!40000 ALTER TABLE `product` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table product_category
# ------------------------------------------------------------

DROP TABLE IF EXISTS `product_category`;

CREATE TABLE `product_category` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `type_id` bigint(20) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subtitle` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `selected_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order` int(11) DEFAULT NULL,
  `is_active` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `product_category` WRITE;
/*!40000 ALTER TABLE `product_category` DISABLE KEYS */;

INSERT INTO `product_category` (`id`, `type_id`, `name`, `title`, `subtitle`, `image`, `selected_image`, `order`, `is_active`, `created_at`, `updated_at`)
VALUES
	(1,2,'Mobile','Circles.Life, MyRepublic','Starting from $18','https://www.haulmate.co/assets/img/telco.svg',NULL,1,1,'2020-10-01 06:36:02','2020-11-13 10:49:09'),
	(2,2,'Internet','MyRepublic','Starting from $49','https://www.haulmate.co/assets/img/internet.svg',NULL,2,1,'2020-10-01 06:36:02','2020-11-13 10:49:09'),
	(4,1,'Personal Accident','Chubb, FWD','Starting from $200','https://www.haulmate.co/assets/img/health.svg',NULL,1,1,'2020-10-01 06:36:02','2020-11-20 01:34:26'),
	(5,1,'Home','Chubb, FWD','Starting from $102','https://www.haulmate.co/assets/img/home.svg',NULL,8,1,'2020-10-01 06:36:02','2020-11-28 05:23:50'),
	(6,1,'Maid','FWD, MSIG','Starting from $188','https://www.haulmate.co/assets/img/travel.svg',NULL,3,1,'2020-10-01 06:36:02','2020-11-20 02:13:44'),
	(8,3,'Open a bank account','Open a bank account','Start the process of opening a bank account with DBS and other popular banks even before you land',NULL,NULL,1,1,'2020-10-01 06:36:02','2020-10-31 05:20:09');

/*!40000 ALTER TABLE `product_category` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table product_detail
# ------------------------------------------------------------

DROP TABLE IF EXISTS `product_detail`;

CREATE TABLE `product_detail` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `product_id` bigint(20) NOT NULL,
  `section_item_id` bigint(20) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `product_detail` WRITE;
/*!40000 ALTER TABLE `product_detail` DISABLE KEYS */;

INSERT INTO `product_detail` (`id`, `product_id`, `section_item_id`, `name`, `is_active`, `created_at`, `updated_at`)
VALUES
	(1,2,25,'Lorem ipsum',1,'2020-10-01 06:36:04','2020-10-06 08:18:24'),
	(2,1,26,'$21 / month',1,'2020-10-01 06:36:04','2020-10-01 10:10:44'),
	(3,1,27,'<span class=\"ok\"></span>',1,'2020-10-01 06:36:04','2020-10-01 10:12:05'),
	(4,1,28,'Ne quo reque debet changed',1,'2020-10-01 06:36:04','2020-10-01 10:23:25'),
	(5,1,29,'Ne quo reque debet',1,'2020-10-01 06:36:04','2020-10-01 06:36:04'),
	(6,1,30,'<span class=\"cancel\"></span>',1,'2020-10-01 06:36:04','2020-10-01 06:36:04'),
	(7,1,31,'<span class=\"ok\"></span>',1,'2020-10-01 06:36:04','2020-10-01 06:36:04'),
	(8,1,32,'<span class=\"ok\"></span>',1,'2020-10-01 06:36:04','2020-10-01 06:36:04'),
	(9,2,25,'Ne quo reque debet',1,'2020-10-01 06:36:04','2020-10-01 06:36:04'),
	(10,2,26,'$20 / month',1,'2020-10-01 06:36:04','2020-10-01 06:36:04'),
	(11,2,27,'<span class=\"cancel\"></span>',1,'2020-10-01 06:36:04','2020-10-01 06:36:04'),
	(12,2,28,'Ne quo reque debet',1,'2020-10-01 06:36:04','2020-10-01 06:36:04'),
	(13,2,29,'Ne quo reque debet',1,'2020-10-01 06:36:04','2020-10-01 06:36:04'),
	(14,2,30,'<span class=\"cancel\"></span>',1,'2020-10-01 06:36:04','2020-10-01 06:36:04'),
	(15,2,31,'<span class=\"ok\"></span>',1,'2020-10-01 06:36:04','2020-10-01 06:36:04'),
	(16,2,32,'<span class=\"ok\"></span>',1,'2020-10-01 06:36:04','2020-10-01 06:36:04'),
	(17,7,65,'$150',1,'2020-10-25 12:38:53','2020-10-25 12:38:53'),
	(18,7,66,'Everything',1,'2020-10-25 12:38:53','2020-10-25 12:38:53'),
	(19,7,67,'Lots',1,'2020-10-25 12:38:53','2020-10-25 12:38:53'),
	(20,7,68,'Free',1,'2020-10-25 12:38:53','2020-10-25 12:38:53'),
	(21,7,69,'Family',1,'2020-10-25 12:38:53','2020-10-25 12:38:53'),
	(22,7,70,'Dogs',1,'2020-10-25 12:38:53','2020-10-25 12:38:53'),
	(23,4,71,'123',1,'2020-10-27 14:30:35','2020-10-27 14:30:35'),
	(24,4,72,'456',1,'2020-10-27 14:30:35','2020-10-27 14:30:35'),
	(25,4,73,'789',1,'2020-10-27 14:30:35','2020-10-27 14:30:35'),
	(26,4,74,'101112',1,'2020-10-27 14:30:35','2020-10-27 14:30:35'),
	(27,10,71,'Coverage',1,'2020-10-27 14:34:00','2020-10-27 14:34:00'),
	(28,10,72,'Available',1,'2020-10-27 14:34:00','2020-10-27 14:34:00'),
	(29,10,73,'All Day',1,'2020-10-27 14:34:00','2020-10-27 14:34:00'),
	(30,10,74,'Everyday',1,'2020-10-27 14:34:00','2020-10-27 14:34:00'),
	(38,5,75,'$41.99/month',1,'2020-10-31 01:10:53','2020-10-31 01:47:25'),
	(39,5,76,'24 months',1,'2020-10-31 01:10:53','2020-10-31 01:10:53'),
	(40,5,77,'1Gbps Fibre Broadband',1,'2020-10-31 01:10:53','2020-10-31 01:10:53'),
	(41,5,78,'<span class=\"ok\"></span>',1,'2020-10-31 01:10:53','2020-10-31 01:10:53'),
	(42,5,79,'TP-Link EC330 AC1900',1,'2020-10-31 01:10:53','2020-10-31 01:10:53'),
	(45,5,82,'4.4 / 5',1,'2020-10-31 01:10:53','2020-10-31 01:10:53'),
	(46,5,83,'4.0 / 5',1,'2020-10-31 01:10:53','2020-10-31 01:10:53'),
	(47,5,84,'Termination Point installation (worth up to $160.50) for new customers',1,'2020-10-31 01:31:35','2020-10-31 01:31:35'),
	(48,5,85,'Home phone line with unlimited calls',1,'2020-10-31 01:31:35','2020-10-31 01:31:35'),
	(51,13,75,'$39.90/month',1,'2020-10-31 01:40:39','2020-10-31 01:40:39'),
	(52,13,76,'24 months',1,'2020-10-31 01:40:39','2020-10-31 01:40:39'),
	(53,13,77,'1 Gbps Fibre Broadband',1,'2020-10-31 01:40:39','2020-10-31 01:45:26'),
	(54,13,78,'<span class=\"ok\"></span>',1,'2020-10-31 01:40:39','2020-10-31 01:40:39'),
	(55,13,79,'StarHub Smart WiFi',1,'2020-10-31 01:40:39','2020-10-31 01:40:39'),
	(56,13,84,'Service installation worth $90',1,'2020-10-31 01:40:39','2020-10-31 01:40:39'),
	(57,13,85,'6 months JuniorProtect Basic to keep your child safe online',1,'2020-10-31 01:40:39','2020-10-31 01:40:39'),
	(60,13,82,'3.5 / 5',1,'2020-10-31 01:40:39','2020-10-31 01:40:39'),
	(61,13,83,'3.1 / 5',1,'2020-10-31 01:40:39','2020-10-31 01:40:39'),
	(62,14,75,'$29.90/month',1,'2020-10-31 01:57:18','2020-10-31 01:57:18'),
	(63,14,76,'24 months',1,'2020-10-31 01:57:18','2020-10-31 01:57:18'),
	(64,14,77,'500 Mbps',1,'2020-10-31 01:57:18','2020-10-31 01:57:18'),
	(65,14,78,'<span class=\"ok\"></span>',1,'2020-10-31 01:57:18','2020-10-31 01:57:18'),
	(66,14,79,'<span class=\"cancel\"></span>',1,'2020-10-31 01:57:18','2020-10-31 01:57:18'),
	(67,14,84,'Up to $90 waived for weekday activation',1,'2020-10-31 01:57:18','2020-10-31 01:57:18'),
	(68,14,85,'<span class=\"cancel\"></span>',1,'2020-10-31 01:57:18','2020-10-31 01:57:18'),
	(69,14,82,'4.0 / 5',1,'2020-10-31 01:57:18','2020-10-31 01:57:18'),
	(70,14,83,'No score',1,'2020-10-31 01:57:18','2020-10-31 01:57:18'),
	(71,16,88,'$28/month',1,'2020-10-31 03:34:02','2020-10-31 03:34:02'),
	(72,16,89,'20GB',1,'2020-10-31 03:34:02','2020-10-31 03:34:02'),
	(73,16,90,'100 mins',1,'2020-10-31 03:34:02','2020-10-31 03:34:02'),
	(74,16,91,'No contract',1,'2020-10-31 03:34:02','2020-10-31 03:34:02'),
	(75,16,92,'4.4 / 5',1,'2020-10-31 03:34:02','2020-10-31 03:34:02'),
	(77,17,88,'$48/month',1,'2020-10-31 03:53:20','2020-10-31 03:53:20'),
	(78,17,89,'100GB',1,'2020-10-31 03:53:20','2020-10-31 03:53:20'),
	(79,17,90,'100 mins',1,'2020-10-31 03:53:20','2020-10-31 03:53:20'),
	(80,17,91,'Unlimited',1,'2020-10-31 03:53:20','2020-10-31 03:53:20'),
	(81,17,92,'4.4 / 5',1,'2020-10-31 03:53:20','2020-10-31 03:53:20'),
	(82,18,88,'$39/month',1,'2020-10-31 03:58:13','2020-10-31 03:58:13'),
	(83,18,89,'Unlimited',1,'2020-10-31 03:58:13','2020-10-31 03:58:13'),
	(84,18,90,'1000 mins',1,'2020-10-31 03:58:13','2020-10-31 03:58:13'),
	(85,18,91,'No contract',1,'2020-10-31 03:58:13','2020-10-31 03:58:13'),
	(86,18,92,'4.3 / 5',1,'2020-10-31 03:58:13','2020-10-31 03:58:13'),
	(87,18,94,'<span class=\"cancel\"></span>',1,'2020-10-31 04:02:18','2020-10-31 04:02:18'),
	(88,17,94,'<span class=\"ok\"></span>',1,'2020-10-31 04:02:28','2020-10-31 04:02:28'),
	(89,16,94,'<span class=\"ok\"></span>',1,'2020-10-31 04:02:39','2020-10-31 04:02:39'),
	(90,18,95,'<span class=\"cancel\"></span>',1,'2020-10-31 04:09:59','2020-10-31 04:09:59'),
	(91,17,95,'<span class=\"cancel\"></span>',1,'2020-10-31 04:10:07','2020-10-31 04:10:07'),
	(92,16,95,'<span class=\"cancel\"></span>',1,'2020-10-31 04:10:24','2020-10-31 04:10:24'),
	(93,20,88,'$78/month',1,'2020-10-31 04:14:19','2020-10-31 04:14:19'),
	(94,20,89,'40GB',1,'2020-10-31 04:14:19','2020-10-31 04:14:19'),
	(95,20,90,'300 mins',1,'2020-10-31 04:14:19','2020-10-31 04:14:19'),
	(96,20,91,'24 months',1,'2020-10-31 04:14:19','2020-10-31 04:14:19'),
	(97,20,94,'<span class=\"cancel\"></span>',1,'2020-10-31 04:14:19','2020-10-31 04:14:19'),
	(98,20,95,'<span class=\"ok\"></span>',1,'2020-10-31 04:14:19','2020-10-31 04:14:19'),
	(99,20,92,'3.7 / 5',1,'2020-10-31 04:14:19','2020-10-31 04:14:19'),
	(103,21,99,'<span class=\"ok\"></span>',1,'2020-10-31 04:45:00','2020-10-31 04:45:00'),
	(105,21,101,'$0',1,'2020-10-31 04:50:26','2020-10-31 04:50:26'),
	(106,21,102,'3.60% (up to $100k)',1,'2020-10-31 04:50:26','2020-10-31 04:50:26'),
	(107,21,103,'0.65%',1,'2020-10-31 04:50:26','2020-10-31 04:50:26'),
	(108,21,104,'Yes at zero or lower transfer fees',1,'2020-10-31 04:50:26','2020-10-31 04:50:26'),
	(109,21,105,'Most popular amongst expats',1,'2020-10-31 04:50:26','2020-10-31 04:50:26'),
	(110,22,101,'$0',1,'2020-10-31 04:55:04','2020-10-31 04:55:04'),
	(111,22,102,'2.88%',1,'2020-10-31 04:55:04','2020-10-31 04:55:04'),
	(112,22,103,'0.03%',1,'2020-10-31 04:55:04','2020-10-31 04:55:04'),
	(113,22,104,'Multi-currency with $0 overseas transaction fees',1,'2020-10-31 04:55:04','2020-10-31 04:55:04'),
	(114,22,99,'<span class=\"ok\"></span>',1,'2020-10-31 04:55:04','2020-10-31 04:55:04'),
	(115,22,105,'$218 cashback',1,'2020-10-31 04:55:04','2020-10-31 04:55:04'),
	(116,23,101,'$1000',1,'2020-10-31 05:00:48','2020-10-31 05:00:48'),
	(117,23,102,'1%',1,'2020-10-31 05:00:48','2020-10-31 05:00:48'),
	(118,23,103,'0.05%',1,'2020-10-31 05:00:48','2020-10-31 05:00:48'),
	(119,23,104,'<span class=\"cancel\"></span>',1,'2020-10-31 05:00:48','2020-10-31 05:00:48'),
	(120,23,99,'<span class=\"ok\"></span>',1,'2020-10-31 05:00:48','2020-10-31 05:00:48'),
	(121,23,105,'Redeem up to $200 cash credit',1,'2020-10-31 05:00:48','2020-10-31 05:00:48'),
	(123,24,106,'$100,000',1,'2020-11-20 00:52:25','2020-11-20 00:52:25'),
	(124,24,107,'$35,000',1,'2020-11-20 00:52:25','2020-11-20 00:52:25'),
	(125,24,108,'<span class=\"cancel\"></span>',1,'2020-11-20 00:52:25','2020-11-20 00:52:25'),
	(126,24,109,'$2,500',1,'2020-11-20 00:52:25','2020-11-20 00:52:25'),
	(127,24,110,'$65,000',1,'2020-11-20 00:52:25','2020-11-20 00:52:25'),
	(128,24,111,'$500',1,'2020-11-20 00:52:25','2020-11-20 00:52:25'),
	(129,24,112,'$250,000',1,'2020-11-20 00:52:25','2020-11-20 00:52:25'),
	(130,24,113,'<span class=\"ok\"></span>',1,'2020-11-20 00:52:25','2020-11-20 00:52:25'),
	(132,25,106,'$150,000',1,'2020-11-20 00:54:35','2020-11-20 00:54:35'),
	(133,25,107,'$70,000',1,'2020-11-20 00:54:35','2020-11-20 00:54:35'),
	(134,25,108,'<span class=\"cancel\"></span>',1,'2020-11-20 00:54:35','2020-11-20 00:54:35'),
	(135,25,109,'$2,500',1,'2020-11-20 00:54:35','2020-11-20 00:54:35'),
	(136,25,110,'$80,000',1,'2020-11-20 00:54:35','2020-11-20 00:54:35'),
	(137,25,111,'$1,000',1,'2020-11-20 00:54:35','2020-11-20 00:54:35'),
	(138,25,112,'$250,000',1,'2020-11-20 00:54:35','2020-11-20 00:54:35'),
	(139,25,113,'<span class=\"ok\"></span>',1,'2020-11-20 00:54:35','2020-11-20 00:54:35'),
	(140,26,114,'$107',1,'2020-11-20 01:03:36','2020-11-20 01:03:36'),
	(141,26,106,'$60,000',1,'2020-11-20 01:03:36','2020-11-20 01:03:36'),
	(142,26,107,'$5,000',1,'2020-11-20 01:03:36','2020-11-20 01:03:36'),
	(143,26,108,'<span class=\"cancel\"></span>',1,'2020-11-20 01:03:36','2020-11-20 01:03:36'),
	(144,26,109,'$1,000',1,'2020-11-20 01:03:36','2020-11-20 01:03:36'),
	(145,26,110,'<span class=\"cancel\"></span>',1,'2020-11-20 01:03:36','2020-11-20 01:03:36'),
	(146,26,111,'$35,000',1,'2020-11-20 01:03:36','2020-11-20 01:03:36'),
	(147,26,112,'$500,000',1,'2020-11-20 01:03:36','2020-11-20 01:03:36'),
	(148,26,113,'<span class=\"cancel\"></span>',1,'2020-11-20 01:03:36','2020-11-20 01:03:36'),
	(149,25,115,'$126',1,'2020-11-20 01:15:10','2020-11-20 01:16:34'),
	(150,24,115,'101',1,'2020-11-20 01:17:25','2020-11-20 01:17:25'),
	(152,27,125,'$1,000',1,'2020-11-20 01:54:41','2020-11-20 01:54:41'),
	(153,27,126,'$15,000',1,'2020-11-20 01:54:41','2020-11-20 01:54:41'),
	(156,27,129,'<span class=\"ok\"></span> (within 3 months)',1,'2020-11-20 01:54:41','2020-11-20 02:17:36'),
	(157,27,130,'$224.27',1,'2020-11-20 02:06:22','2020-11-20 02:17:36'),
	(158,28,130,'$214',1,'2020-11-20 02:08:09','2020-11-20 02:16:37'),
	(160,28,125,'$1,000',1,'2020-11-20 02:08:09','2020-11-20 02:16:37'),
	(161,28,126,'$15,000',1,'2020-11-20 02:08:09','2020-11-20 02:16:37'),
	(164,28,129,'<span class=\"cancel\"></span>',1,'2020-11-20 02:08:09','2020-11-20 02:18:04'),
	(165,28,131,'$5,000',1,'2020-11-20 02:16:37','2020-11-20 02:16:37'),
	(166,27,131,'$3,000',1,'2020-11-20 02:17:36','2020-11-20 02:17:36'),
	(167,29,130,'$239',1,'2020-11-20 02:20:52','2020-11-20 02:20:52'),
	(168,29,125,'$1,000',1,'2020-11-20 02:20:52','2020-11-20 02:20:52'),
	(169,29,126,'$15,000',1,'2020-11-20 02:20:52','2020-11-20 02:20:52'),
	(170,29,131,'$0',1,'2020-11-20 02:20:52','2020-11-20 02:20:52'),
	(171,29,129,'<span class=\"cancel\"></span>',1,'2020-11-20 02:20:52','2020-11-20 02:20:52'),
	(172,30,116,'$10.99 p/m',1,'2020-11-21 04:00:47','2020-11-21 04:00:47'),
	(173,30,117,'$100,000',1,'2020-11-21 04:00:47','2020-11-21 04:00:47'),
	(174,30,118,'$100,000',1,'2020-11-21 04:00:47','2020-11-21 04:00:47'),
	(175,30,119,'$1,000',1,'2020-11-21 04:00:47','2020-11-21 04:00:47'),
	(176,30,120,'$1,000',1,'2020-11-21 04:00:47','2020-11-21 04:00:47'),
	(177,30,121,'$100',1,'2020-11-21 04:00:47','2020-11-21 04:00:47'),
	(178,30,122,'$1,500',1,'2020-11-21 04:00:47','2020-11-21 04:00:47'),
	(179,30,123,'$20,000',1,'2020-11-21 04:00:47','2020-11-21 04:00:47'),
	(180,31,116,'$16.49 p/m',1,'2020-11-21 04:02:46','2020-11-21 04:02:46'),
	(181,31,117,'$150,000',1,'2020-11-21 04:02:46','2020-11-21 04:02:46'),
	(182,31,118,'$150,000',1,'2020-11-21 04:02:46','2020-11-21 04:02:46'),
	(183,31,119,'$2,000',1,'2020-11-21 04:02:46','2020-11-21 04:02:46'),
	(184,31,120,'$2,000',1,'2020-11-21 04:02:46','2020-11-21 04:02:46'),
	(185,31,121,'$150',1,'2020-11-21 04:02:46','2020-11-21 04:02:46'),
	(186,31,122,'$2,000',1,'2020-11-21 04:02:46','2020-11-21 04:02:46'),
	(187,31,123,'$30,000',1,'2020-11-21 04:02:46','2020-11-21 04:02:46'),
	(188,32,116,'$21.60 p/m',1,'2020-11-21 04:04:39','2020-11-21 04:04:39'),
	(189,32,117,'$200,000',1,'2020-11-21 04:04:39','2020-11-21 04:04:39'),
	(190,32,118,'$200,000',1,'2020-11-21 04:04:39','2020-11-21 04:04:39'),
	(191,32,119,'$3,000',1,'2020-11-21 04:04:39','2020-11-21 04:04:39'),
	(192,32,120,'$3,000',1,'2020-11-21 04:04:39','2020-11-21 04:04:39'),
	(193,32,121,'$200',1,'2020-11-21 04:04:39','2020-11-21 04:04:39'),
	(194,32,122,'$3,000',1,'2020-11-21 04:04:39','2020-11-21 04:04:39'),
	(195,32,123,'$50,000',1,'2020-11-21 04:04:39','2020-11-21 04:04:39'),
	(196,33,132,'$57.90 p/m',1,'2020-11-28 05:31:20','2020-11-28 05:31:20'),
	(197,33,133,'Free Netflix for 12 months',1,'2020-11-28 05:31:20','2020-11-28 05:31:20'),
	(198,33,134,'24 months',1,'2020-11-28 05:31:20','2020-11-28 05:31:20');

/*!40000 ALTER TABLE `product_detail` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table product_section
# ------------------------------------------------------------

DROP TABLE IF EXISTS `product_section`;

CREATE TABLE `product_section` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `category_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order` int(11) DEFAULT NULL,
  `is_active` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `category_id` (`category_id`),
  CONSTRAINT `product_section_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `product_category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `product_section` WRITE;
/*!40000 ALTER TABLE `product_section` DISABLE KEYS */;

INSERT INTO `product_section` (`id`, `category_id`, `name`, `order`, `is_active`, `created_at`, `updated_at`)
VALUES
	(1,1,'Lorem Ipsum Dolor imit 1',1,0,'2020-10-01 06:36:03','2020-10-31 04:09:29'),
	(2,1,'Mucius Intellegebat te ius iriure',2,0,'2020-10-01 06:36:03','2020-10-31 04:02:04'),
	(3,2,'Lorem Ipsum Dolor imit',1,0,'2020-10-01 06:36:03','2020-10-31 03:37:54'),
	(4,2,'Mucius Intellegebat te ius iriure',2,0,'2020-10-01 06:36:03','2020-10-31 03:37:54'),
	(7,4,'General Details',2,0,'2020-10-01 06:36:03','2020-11-20 01:37:50'),
	(8,4,'Fine Print',1,0,'2020-10-01 06:36:03','2020-11-20 01:37:50'),
	(9,5,'Benefits',1,1,'2020-10-01 06:36:03','2020-10-18 02:37:33'),
	(11,6,'Lorem Ipsum Dolor imit',1,0,'2020-10-01 06:36:03','2020-11-20 02:14:07'),
	(12,6,'Mucius Intellegebat te ius iriure',2,0,'2020-10-01 06:36:03','2020-11-20 02:14:07'),
	(15,8,'Lorem Ipsum Dolor imit',1,0,'2020-10-01 06:36:03','2020-10-31 04:48:18'),
	(16,8,'Mucius Intellegebat te ius iriure',2,0,'2020-10-01 06:36:03','2020-10-31 04:48:18'),
	(17,4,'Exclusions',2,0,'2020-10-25 12:34:17','2020-11-20 01:37:50'),
	(18,2,'Overview',1,1,'2020-10-31 01:06:37','2020-10-31 01:06:37'),
	(19,2,'Additional info',2,0,'2020-10-31 01:06:38','2020-10-31 01:41:06'),
	(20,2,'Reviews',3,1,'2020-10-31 01:06:38','2020-10-31 03:37:54'),
	(21,1,'Whay you get',1,1,'2020-10-31 03:17:26','2020-10-31 03:17:26'),
	(22,1,'Reviews',3,1,'2020-10-31 03:17:26','2020-10-31 04:09:29'),
	(23,8,'What you get',1,1,'2020-10-31 04:23:38','2020-10-31 04:23:38'),
	(24,8,'Reviews',2,0,'2020-10-31 04:23:38','2020-10-31 04:48:18'),
	(25,8,'Additional info',2,1,'2020-10-31 04:48:18','2020-10-31 04:48:18'),
	(26,4,'Benefits',1,1,'2020-11-20 01:37:49','2020-11-20 01:37:49'),
	(27,6,'Benefits',1,1,'2020-11-20 01:52:00','2020-11-20 01:52:00');

/*!40000 ALTER TABLE `product_section` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table product_section_item
# ------------------------------------------------------------

DROP TABLE IF EXISTS `product_section_item`;

CREATE TABLE `product_section_item` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `section_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order` int(11) DEFAULT NULL,
  `is_active` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `section_id` (`section_id`),
  CONSTRAINT `product_section_item_ibfk_1` FOREIGN KEY (`section_id`) REFERENCES `product_section` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `product_section_item` WRITE;
/*!40000 ALTER TABLE `product_section_item` DISABLE KEYS */;

INSERT INTO `product_section_item` (`id`, `section_id`, `name`, `order`, `is_active`, `created_at`, `updated_at`)
VALUES
	(2,1,'Et incidunt omnis eos.',2,1,'2020-10-01 06:36:03','2020-10-01 06:36:03'),
	(3,1,'Aut deleniti unde facilis sed.',3,1,'2020-10-01 06:36:03','2020-10-01 06:36:03'),
	(4,1,'Amet quos aperiam beatae facere.',4,1,'2020-10-01 06:36:03','2020-10-01 06:36:03'),
	(6,2,'Qui minima blanditiis qui.',1,1,'2020-10-01 06:36:03','2020-10-31 04:09:29'),
	(7,2,'Ab numquam est aspernatur voluptas.',2,1,'2020-10-01 06:36:03','2020-10-31 04:09:29'),
	(8,2,'Quidem ut consequatur.',3,1,'2020-10-01 06:36:03','2020-10-31 04:09:29'),
	(10,3,'Id voluptate error maxime reiciendis consectetur.',2,1,'2020-10-01 06:36:03','2020-10-01 06:36:03'),
	(11,3,'At quibusdam officia et corporis in.',3,1,'2020-10-01 06:36:03','2020-10-01 06:36:03'),
	(12,3,'Eaque totam vero et voluptatem repellat.',4,1,'2020-10-01 06:36:03','2020-10-01 06:36:03'),
	(13,4,'Voluptates modi illo.',1,1,'2020-10-01 06:36:03','2020-10-01 06:36:03'),
	(14,4,'Dolor quis assumenda tempore temporibus placeat.',2,1,'2020-10-01 06:36:03','2020-10-01 06:36:03'),
	(15,4,'Quia quae libero similique dolor necessitatibus.',3,1,'2020-10-01 06:36:03','2020-10-01 06:36:03'),
	(16,4,'Explicabo at laboriosam in neque.',4,1,'2020-10-01 06:36:03','2020-10-01 06:36:03'),
	(25,7,'Illum aliquid placeat incidunt non.',1,1,'2020-10-01 06:36:03','2020-10-01 06:36:03'),
	(26,7,'Temporibus voluptatem deleniti.',2,1,'2020-10-01 06:36:03','2020-10-01 06:36:03'),
	(27,7,'Repellat fuga minima voluptatum nam.',3,1,'2020-10-01 06:36:03','2020-10-01 06:36:03'),
	(28,7,'Quo molestias sunt consequatur dicta.',4,1,'2020-10-01 06:36:03','2020-10-01 06:36:03'),
	(29,8,'A enim consequuntur qui.',1,0,'2020-10-01 06:36:03','2020-10-25 12:34:17'),
	(30,8,'Est quis eveniet quis.',2,0,'2020-10-01 06:36:03','2020-10-25 12:34:17'),
	(31,8,'Sit repellat sed voluptate suscipit sit.',3,0,'2020-10-01 06:36:03','2020-10-25 12:34:17'),
	(32,8,'Quia perferendis consequatur velit accusantium.',4,0,'2020-10-01 06:36:03','2020-10-25 12:34:17'),
	(33,9,'Provident consequatur deleniti sapiente dolor aut.',1,0,'2020-10-01 06:36:03','2020-11-20 01:12:04'),
	(34,9,'Rerum hic aut.',2,0,'2020-10-01 06:36:03','2020-11-20 01:12:04'),
	(35,9,'Atque et quia.',3,0,'2020-10-01 06:36:03','2020-11-20 01:12:04'),
	(36,9,'Dolore omnis omnis ut.',4,0,'2020-10-01 06:36:03','2020-11-20 01:12:04'),
	(41,11,'Aut et et porro.',1,1,'2020-10-01 06:36:03','2020-10-01 06:36:03'),
	(42,11,'Ipsam odit magnam ratione in deserunt.',2,1,'2020-10-01 06:36:03','2020-10-01 06:36:03'),
	(43,11,'Nemo modi iusto occaecati dolorem.',3,1,'2020-10-01 06:36:03','2020-10-01 06:36:03'),
	(44,11,'Deleniti laboriosam pariatur reiciendis.',4,1,'2020-10-01 06:36:03','2020-10-01 06:36:03'),
	(45,12,'Voluptate delectus rerum id quis.',1,1,'2020-10-01 06:36:03','2020-10-01 06:36:03'),
	(46,12,'Repellat sed sint voluptates.',2,1,'2020-10-01 06:36:03','2020-10-01 06:36:03'),
	(47,12,'Nesciunt est perferendis natus.',3,1,'2020-10-01 06:36:03','2020-10-01 06:36:03'),
	(48,12,'Alias omnis cum sit perspiciatis ut.',4,1,'2020-10-01 06:36:03','2020-10-01 06:36:03'),
	(57,15,'Tempora eveniet voluptatem quaerat deserunt.',1,1,'2020-10-01 06:36:03','2020-10-01 06:36:03'),
	(58,15,'Voluptas iure eum non optio ut.',2,1,'2020-10-01 06:36:03','2020-10-01 06:36:03'),
	(59,15,'Dolorem quae aut libero dignissimos.',3,1,'2020-10-01 06:36:03','2020-10-01 06:36:03'),
	(60,15,'Earum corporis esse et repellendus.',4,1,'2020-10-01 06:36:03','2020-10-01 06:36:03'),
	(61,16,'Quod deleniti perferendis aliquam.',1,1,'2020-10-01 06:36:03','2020-10-01 06:36:03'),
	(62,16,'Qui id nihil voluptatem.',2,1,'2020-10-01 06:36:03','2020-10-01 06:36:03'),
	(63,16,'Quo voluptas porro architecto.',3,1,'2020-10-01 06:36:03','2020-10-01 06:36:03'),
	(64,16,'Quia est sequi et.',4,1,'2020-10-01 06:36:03','2020-10-01 06:36:03'),
	(65,8,'Cost',1,1,'2020-10-25 12:34:17','2020-10-25 12:34:17'),
	(66,8,'Coverage',2,1,'2020-10-25 12:34:17','2020-10-25 12:34:17'),
	(67,8,'Inclusions',3,1,'2020-10-25 12:34:17','2020-10-25 12:34:17'),
	(68,8,'Claim type',4,1,'2020-10-25 12:34:17','2020-10-25 12:34:17'),
	(69,8,'Benefits',5,1,'2020-10-25 12:34:17','2020-10-25 12:34:17'),
	(70,17,'Does not cover',1,1,'2020-10-25 12:34:18','2020-10-25 12:34:18'),
	(71,9,'ABC',1,0,'2020-10-27 14:21:05','2020-11-20 01:12:04'),
	(72,9,'DEF',2,0,'2020-10-27 14:21:05','2020-11-20 01:12:04'),
	(73,9,'GHI',3,0,'2020-10-27 14:21:05','2020-11-20 01:12:04'),
	(74,9,'JKL',4,0,'2020-10-27 14:21:05','2020-11-20 01:12:04'),
	(75,18,'Price',1,1,'2020-10-31 01:06:37','2020-10-31 01:06:37'),
	(76,18,'Contract Length',2,1,'2020-10-31 01:06:37','2020-10-31 01:06:37'),
	(77,18,'Speed',3,1,'2020-10-31 01:06:37','2020-10-31 01:06:37'),
	(78,18,'Router included',4,1,'2020-10-31 01:06:37','2020-10-31 01:06:37'),
	(79,18,'Router type',5,1,'2020-10-31 01:06:38','2020-10-31 01:06:38'),
	(80,18,'Inclusions',6,0,'2020-10-31 01:06:38','2020-10-31 03:37:54'),
	(81,19,'Costs',1,0,'2020-10-31 01:06:38','2020-10-31 03:37:54'),
	(82,20,'Seedly Reviews',1,1,'2020-10-31 01:06:38','2020-10-31 01:06:38'),
	(83,20,'Trustpilot Score',2,0,'2020-10-31 01:06:38','2020-10-31 03:37:54'),
	(84,18,'Inclusion 1',6,1,'2020-10-31 01:29:25','2020-10-31 01:29:25'),
	(85,18,'Inclusions 2',7,1,'2020-10-31 01:29:25','2020-10-31 01:29:25'),
	(86,19,'Installation cost',1,1,'2020-10-31 01:29:25','2020-10-31 01:29:25'),
	(87,19,'Activation cost',2,1,'2020-10-31 01:29:25','2020-10-31 01:29:25'),
	(88,21,'Price',1,1,'2020-10-31 03:17:26','2020-10-31 03:17:26'),
	(89,21,'Data',2,1,'2020-10-31 03:17:26','2020-10-31 03:17:26'),
	(90,21,'Talktime',3,1,'2020-10-31 03:17:26','2020-10-31 03:17:26'),
	(91,21,'Contract Length',4,1,'2020-10-31 03:17:26','2020-10-31 03:17:26'),
	(92,22,'Seedly Reviews',1,1,'2020-10-31 03:17:26','2020-10-31 03:17:26'),
	(93,22,'What customers are saying',2,0,'2020-10-31 03:17:26','2020-10-31 04:09:29'),
	(94,21,'eSIM (activate without a SIM card)',5,1,'2020-10-31 04:02:04','2020-10-31 04:02:04'),
	(95,21,'Device included',6,1,'2020-10-31 04:09:29','2020-10-31 04:09:29'),
	(96,23,'Feature 1',1,0,'2020-10-31 04:23:38','2020-10-31 04:48:18'),
	(97,23,'Feature 2',2,0,'2020-10-31 04:23:38','2020-10-31 04:48:18'),
	(98,23,'Feature 3',3,0,'2020-10-31 04:23:38','2020-10-31 04:48:18'),
	(99,23,'Banking app',5,1,'2020-10-31 04:23:38','2020-10-31 04:48:18'),
	(100,24,'Seedly Reviews',1,1,'2020-10-31 04:23:38','2020-10-31 04:23:38'),
	(101,23,'Min. Initial Deposit',1,1,'2020-10-31 04:48:18','2020-10-31 04:48:18'),
	(102,23,'Max. Annual Interest Rate',2,1,'2020-10-31 04:48:18','2020-10-31 04:48:18'),
	(103,23,'Min. Annual Interst Rate',3,1,'2020-10-31 04:48:18','2020-10-31 04:48:18'),
	(104,23,'International transfers',4,1,'2020-10-31 04:48:18','2020-10-31 04:48:18'),
	(105,25,'Highlight',1,1,'2020-10-31 04:48:18','2020-10-31 04:48:18'),
	(106,9,'Contents',2,1,'2020-11-20 00:38:04','2020-11-20 00:46:54'),
	(107,9,'Loss or Accidental Damage to contents',3,1,'2020-11-20 00:38:04','2020-11-20 00:46:54'),
	(108,9,'Burglary',4,1,'2020-11-20 00:38:04','2020-11-20 00:46:54'),
	(109,9,'Accidental breakage of mirrors and glass',5,1,'2020-11-20 00:38:04','2020-11-20 00:46:54'),
	(110,9,'Loss or Accidental Damage to Renovations',6,1,'2020-11-20 00:38:04','2020-11-20 00:46:54'),
	(111,9,'Alternative accomodation',7,1,'2020-11-20 00:38:04','2020-11-20 00:46:54'),
	(112,9,'Worldwide Personal Liability for whole family',8,1,'2020-11-20 00:38:04','2020-11-20 00:46:54'),
	(113,9,'24hr Emergency Home Assistance Services',9,1,'2020-11-20 00:38:04','2020-11-20 00:46:54'),
	(114,9,'Monthly price',1,0,'2020-11-20 00:46:54','2020-11-20 01:12:04'),
	(115,9,'Annual Price',1,1,'2020-11-20 01:12:04','2020-11-20 01:12:04'),
	(116,26,'Price',1,1,'2020-11-20 01:37:50','2020-11-20 01:37:50'),
	(117,26,'Accidental Death',2,1,'2020-11-20 01:37:50','2020-11-20 01:37:50'),
	(118,26,'Permanent Disablement',3,1,'2020-11-20 01:37:50','2020-11-20 01:37:50'),
	(119,26,'Accidental Medical Expenses Reimbursement',4,1,'2020-11-20 01:37:50','2020-11-20 01:37:50'),
	(120,26,'Fractured  Bones',5,1,'2020-11-20 01:37:50','2020-11-20 01:37:50'),
	(121,26,'Accidental Hospital Income (per day)',6,1,'2020-11-20 01:37:50','2020-11-20 01:37:50'),
	(122,26,'Household Bill Relief',7,1,'2020-11-20 01:37:50','2020-11-20 01:37:50'),
	(123,26,'Long-term Household Bill Relief',8,1,'2020-11-20 01:37:50','2020-11-20 01:37:50'),
	(124,27,'Security bond plus',2,0,'2020-11-20 01:52:00','2020-11-20 02:14:07'),
	(125,27,'Outpatient expenses due to accident',2,1,'2020-11-20 01:52:00','2020-11-20 02:12:40'),
	(126,27,'Hospitalisation and surgical expenses',3,1,'2020-11-20 01:52:00','2020-11-20 02:12:40'),
	(127,27,'Ambulance fees',5,0,'2020-11-20 01:52:00','2020-11-20 02:14:07'),
	(128,27,'Repatriation expenses',6,0,'2020-11-20 01:52:00','2020-11-20 02:14:07'),
	(129,27,'Cancelation refund',5,1,'2020-11-20 01:52:00','2020-11-20 02:14:07'),
	(130,27,'Price',1,1,'2020-11-20 01:56:13','2020-11-20 01:56:13'),
	(131,27,'Third party liability',4,1,'2020-11-20 02:14:07','2020-11-20 02:14:07');

/*!40000 ALTER TABLE `product_section_item` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table product_types
# ------------------------------------------------------------

DROP TABLE IF EXISTS `product_types`;

CREATE TABLE `product_types` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `product_types` WRITE;
/*!40000 ALTER TABLE `product_types` DISABLE KEYS */;

INSERT INTO `product_types` (`id`, `name`, `is_active`, `created_at`, `updated_at`)
VALUES
	(1,'Insurance',1,'2020-10-01 06:36:02','2020-10-01 06:36:02'),
	(2,'Mobile & Internet',1,'2020-10-01 06:36:02','2020-10-09 07:19:10'),
	(3,'Banks',1,'2020-10-01 06:36:02','2020-10-01 06:36:02');

/*!40000 ALTER TABLE `product_types` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table services
# ------------------------------------------------------------

DROP TABLE IF EXISTS `services`;

CREATE TABLE `services` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `default_icon_url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `active_icon_url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order` int(11) NOT NULL DEFAULT 0,
  `is_active` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `name` (`name`),
  KEY `default_icon_url` (`default_icon_url`),
  KEY `active_icon_url` (`active_icon_url`),
  KEY `order` (`order`),
  KEY `is_active` (`is_active`),
  KEY `created_at` (`created_at`),
  KEY `updated_at` (`updated_at`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `services` WRITE;
/*!40000 ALTER TABLE `services` DISABLE KEYS */;

INSERT INTO `services` (`id`, `name`, `description`, `default_icon_url`, `active_icon_url`, `order`, `is_active`, `created_at`, `updated_at`)
VALUES
	(1,'Property','Instantly view rentals and co-living spaces','https://www.haulmate.co/assets/img/organise/icon1.png','https://www.haulmate.co/assets/img/organise/icon1_w.png',1,1,'2020-04-26 04:12:32','2020-11-13 10:49:09'),
	(2,'Movers','Receive quotes from trusted international movers','https://www.haulmate.co/assets/img/organise/icon2.png','https://www.haulmate.co/assets/img/organise/icon2_w.png',2,1,'2020-04-26 04:12:32','2020-11-13 10:49:09'),
	(3,'Insurance','Protect the things and people you love during and after your move','https://www.haulmate.co/assets/img/organise/insurance.png','https://www.haulmate.co/assets/img/organise/insurance_w.png',3,1,'2020-04-26 04:12:32','2020-11-13 10:49:09'),
	(4,'Bank Account','Start the process of setting up your new local bank account','https://www.haulmate.co/assets/img/organise/icon4.png','https://www.haulmate.co/assets/img/organise/icon4_w.png',4,1,'2020-04-26 04:12:32','2020-11-13 10:49:09'),
	(6,'Mobile Plan','Connect to a local mobile plan from the moment you land','https://www.haulmate.co/assets/img/organise/mobile.png','https://www.haulmate.co/assets/img/organise/mobile_w.png',5,1,'2020-04-26 04:12:32','2020-11-13 10:49:09'),
	(7,'Internet','Get set up with the best internet & utilities providers for you','https://www.haulmate.co/assets/img/organise/icon5.png','https://www.haulmate.co/assets/img/organise/icon5_w.png',6,1,'2020-04-26 04:12:32','2020-11-13 10:49:09');

/*!40000 ALTER TABLE `services` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table testimonials
# ------------------------------------------------------------

DROP TABLE IF EXISTS `testimonials`;

CREATE TABLE `testimonials` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country_id` int(11) NOT NULL,
  `testimonial` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `object_type` enum('home','partner','property') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'home',
  `object_id` int(11) DEFAULT NULL,
  `order` int(11) NOT NULL,
  `is_active` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `name` (`name`),
  KEY `country_id` (`country_id`),
  KEY `image_url` (`image_url`),
  KEY `order` (`order`),
  KEY `is_active` (`is_active`),
  KEY `created_at` (`created_at`),
  KEY `updated_at` (`updated_at`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `testimonials` WRITE;
/*!40000 ALTER TABLE `testimonials` DISABLE KEYS */;

INSERT INTO `testimonials` (`id`, `name`, `country_id`, `testimonial`, `image_url`, `object_type`, `object_id`, `order`, `is_active`, `created_at`, `updated_at`)
VALUES
	(2,'Eduard Bardakov',220,'Having moved to Singapore with my family, Haulmate saved us months of guesswork and confidence at every step','https://www.haulmate.co/storage/testimonial/8GIkbchItQdeeHZ5hMn6r0Kscu2q1qKTs5LXTF8Y.jpeg','home',NULL,1,1,'2020-05-09 07:48:06','2020-11-13 10:49:09'),
	(4,'Gretel & Addam',1,'This saved us so much time rather than trying to figure everything out ourselves','https://www.haulmate.co/storage/testimonial/4vZ4cFocDwhPRMj2RMBf75Cs3nNrOPjZSglwGFRp.jpeg','home',NULL,3,1,'2020-05-09 07:48:06','2020-11-13 10:49:09'),
	(5,'Saanvi Sai',191,'Being new to Singapore, I’ve had trouble piecing together the information on banks, residential areas etc across multiple blogs and articles online. Through this one platform I’ve learnt so much with much less effort. Thank you!','https://www.haulmate.co/storage/testimonial/aC37hwOHAvg1KeXWRkvhXGMrNgW1UZMzxyHWYslh.png','home',NULL,4,1,'2020-05-09 07:48:06','2020-11-13 10:49:09');

/*!40000 ALTER TABLE `testimonials` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table topic_category
# ------------------------------------------------------------

DROP TABLE IF EXISTS `topic_category`;

CREATE TABLE `topic_category` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `topic_id` bigint(20) NOT NULL,
  `category_id` bigint(20) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `topic_id` (`topic_id`),
  KEY `category_id` (`category_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `topic_category` WRITE;
/*!40000 ALTER TABLE `topic_category` DISABLE KEYS */;

INSERT INTO `topic_category` (`id`, `topic_id`, `category_id`)
VALUES
	(1,1,3),
	(2,1,8),
	(3,2,2),
	(4,2,8),
	(5,3,3),
	(6,4,1),
	(7,4,3),
	(8,5,2),
	(9,5,6),
	(10,6,5),
	(11,7,3),
	(12,8,6),
	(13,9,6),
	(14,10,1),
	(15,10,2),
	(16,11,1),
	(17,12,1),
	(18,13,1),
	(19,14,2),
	(20,15,1),
	(21,16,1),
	(22,17,2),
	(23,18,6),
	(24,19,1),
	(25,20,3),
	(26,21,1),
	(27,22,1),
	(28,23,1),
	(29,24,1),
	(30,25,1),
	(31,26,1),
	(32,27,1),
	(33,28,6),
	(34,29,3),
	(35,30,1),
	(36,31,1),
	(37,32,1),
	(38,33,1),
	(39,34,1),
	(40,35,1),
	(41,36,1),
	(42,37,2),
	(43,38,8),
	(44,39,8),
	(45,40,4),
	(46,41,1);

/*!40000 ALTER TABLE `topic_category` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table topic_questions
# ------------------------------------------------------------

DROP TABLE IF EXISTS `topic_questions`;

CREATE TABLE `topic_questions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `topic_id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `question` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `initial` tinyint(4) NOT NULL DEFAULT 0,
  `votes` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `topic_id` (`topic_id`),
  KEY `user_id` (`user_id`),
  KEY `votes` (`votes`),
  KEY `created_at` (`created_at`),
  KEY `updated_at` (`updated_at`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `topic_questions` WRITE;
/*!40000 ALTER TABLE `topic_questions` DISABLE KEYS */;

INSERT INTO `topic_questions` (`id`, `topic_id`, `user_id`, `question`, `initial`, `votes`, `created_at`, `updated_at`)
VALUES
	(1,1,5,'Quidem sit veniam nobis. Velit aut sed voluptate. Officia assumenda in consequatur fugiat ea illo. Quo culpa at sit et. Placeat expedita possimus fugiat ratione consequatur. Iure ex ad sed expedita rem cupiditate?',1,2,'2020-04-19 03:33:09','2020-11-12 10:37:56'),
	(2,2,6,'Vel aspernatur in facere sequi ducimus laborum. Vel beatae velit distinctio cumque ut. Hic quia consequuntur dolorem ea. Officia sunt architecto eligendi magnam id esse. Aut qui commodi porro nemo voluptatum. Fugit quia beatae a. Qui qui ex cum voluptas ducimus?',1,1,'2020-04-19 03:33:09','2020-10-15 12:19:09'),
	(3,3,7,'Porro tempora et voluptatem modi maiores. Tenetur rerum molestiae aliquid commodi maxime. Nihil voluptas magni enim autem voluptatem eligendi tempore. Cumque sunt voluptate quo et. Ducimus qui quo eligendi quod adipisci repellendus?',1,0,'2020-04-19 03:33:09','2020-10-15 12:19:09'),
	(4,4,7,'Sed aut officia vel doloremque illum. In enim omnis nihil ut ut alias quia. Occaecati enim saepe omnis natus perferendis cumque. Quis laudantium nesciunt dolores fugit inventore soluta voluptatem incidunt?',1,1,'2020-04-19 03:33:09','2020-10-15 12:19:09'),
	(5,5,8,'Rerum consequatur autem corporis assumenda. Tenetur occaecati debitis aut praesentium nesciunt blanditiis rerum incidunt. Sint voluptate eum laborum ut voluptates repudiandae. Velit suscipit dolores aliquid. Ut fuga eligendi doloremque nihil nisi autem dolorum velit?',1,3,'2020-04-19 03:33:09','2020-10-20 07:52:01'),
	(6,6,9,'Repellat et voluptatum tempora quo sunt non qui. Ut voluptatibus maiores quidem et. Ut asperiores ullam asperiores assumenda sequi omnis amet. Voluptate odit et molestiae harum quisquam. Aspernatur dolor non veniam quidem sapiente maiores magni dolorum. Hic culpa iusto molestiae amet repellendus. Ad animi laborum enim?',1,1,'2020-04-19 03:33:09','2020-10-15 12:19:09'),
	(7,7,2,'Can I really walk out to a food court in the middle of the night and buy food?',1,1,'2020-04-19 05:45:01','2020-10-15 12:19:09'),
	(8,8,2,'I am new, trying to migrate to Singapore. What is the Visa process like there?',1,0,'2020-05-09 09:25:55','2020-10-15 12:19:09'),
	(9,4,1,'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et cetera?',0,1,'2020-05-10 14:03:38','2020-05-19 09:30:26'),
	(10,1,2,'This is how a Response to the topic looks like',0,3,'2020-05-11 02:40:18','2020-11-12 10:37:50'),
	(11,1,2,'This is how a Response to the topic looks like',0,2,'2020-05-11 02:40:22','2020-11-12 10:37:52'),
	(12,1,2,'Hey',0,2,'2020-05-11 10:13:34','2020-11-12 10:37:49'),
	(13,1,2,'Test',0,3,'2020-05-11 10:13:50','2020-10-03 08:22:41'),
	(14,8,3,'mkm',0,1,'2020-05-16 00:48:30','2020-05-23 10:16:56'),
	(15,8,3,'hkjds',0,1,'2020-05-16 01:29:49','2020-05-23 10:16:55'),
	(16,6,3,'nfjdslfkds',0,2,'2020-05-19 05:01:25','2020-10-01 09:24:05'),
	(17,2,3,'nsndsk',0,2,'2020-05-21 00:00:00','2020-11-19 10:04:06'),
	(18,9,10,'everything is gone',1,0,'2020-05-27 08:13:16','2020-10-15 12:19:09'),
	(19,2,3,'Thanks for that! Awesome',0,2,'2020-05-31 00:50:18','2020-11-19 10:04:14'),
	(20,10,38,'How do I get let back in the country post Covid',1,1,'2020-06-14 14:08:30','2020-10-15 12:19:09'),
	(21,5,37,'Question Answer',0,0,'2020-09-29 06:52:34','2020-09-29 06:52:34'),
	(22,5,37,'test',0,1,'2020-09-29 07:19:00','2020-10-16 07:25:05'),
	(23,5,37,'test',0,1,'2020-09-29 07:19:03','2020-10-02 14:01:53'),
	(24,11,37,'question',1,0,'2020-09-29 10:03:27','2020-10-15 12:19:09'),
	(25,11,37,'answer',0,0,'2020-09-29 10:05:17','2020-09-29 10:05:17'),
	(26,11,37,'answer',0,0,'2020-09-29 10:05:23','2020-09-29 10:05:23'),
	(27,10,37,'answer',0,0,'2020-09-30 03:15:59','2020-09-30 03:15:59'),
	(28,10,37,'test',0,0,'2020-10-01 09:03:00','2020-10-01 09:03:00'),
	(29,12,37,'enter question',1,0,'2020-10-01 09:24:48','2020-10-15 12:19:09'),
	(30,13,37,'Ask The Community',1,0,'2020-10-02 07:08:44','2020-10-15 12:19:09'),
	(31,14,37,'Post Topic',1,0,'2020-10-02 07:31:05','2020-10-15 12:19:09'),
	(32,15,37,'question',1,0,'2020-10-02 07:57:15','2020-10-15 12:19:09'),
	(33,16,37,'Voluptatem deserunt',1,0,'2020-10-02 08:06:18','2020-10-15 12:19:09'),
	(34,17,37,'test',1,1,'2020-10-02 08:06:46','2020-11-19 10:04:54'),
	(35,18,1,'How long does it take to get a visa once I get my job?',1,0,'2020-10-03 07:55:55','2020-10-15 12:19:09'),
	(36,4,1,'My second answer',0,0,'2020-10-03 08:23:35','2020-10-03 08:23:35'),
	(37,4,1,'My second answer',0,0,'2020-10-03 08:23:35','2020-10-03 08:23:35'),
	(38,4,1,'Another one',0,0,'2020-10-03 08:23:52','2020-10-03 08:23:52'),
	(39,19,3,'Me and my family are planning to move to India but want to understand when we can start to move?',1,1,'2020-10-05 23:14:57','2020-10-15 12:19:09'),
	(40,18,51,'new test anwer',0,0,'2020-10-06 05:02:01','2020-10-06 05:02:01'),
	(41,20,1,'Harum voluptas ut as',1,0,'2020-10-12 08:09:52','2020-10-15 12:19:09'),
	(42,19,1,'Hi. Try Delhi at first.',0,0,'2020-10-12 08:10:55','2020-10-12 08:10:55'),
	(43,5,51,'comment test',0,0,'2020-10-16 07:24:59','2020-10-16 07:24:59'),
	(44,1,26,'test',0,0,'2020-11-12 10:37:46','2020-11-12 10:37:46'),
	(45,21,26,'question',1,0,'2020-11-12 10:41:04','2020-11-12 10:41:04'),
	(46,2,26,'okay',0,0,'2020-11-19 10:04:23','2020-11-19 10:04:23'),
	(47,17,26,'okay',0,0,'2020-11-19 10:04:37','2020-11-19 10:04:37'),
	(48,22,3,'I\'m looking forward to my move to Singapore, but want to know if anyone else knows when it may open up again for expats? Or are they allowing people to relocate already?',1,0,'2020-11-20 02:31:31','2020-11-20 02:31:31'),
	(49,23,3,'Can I really walk out to a food court in the middle of the night and buy food? Does anyone have any good recommendations?',1,0,'2020-11-20 02:45:56','2020-11-20 02:45:56'),
	(50,24,3,'Does anyone have any recommendations are areas to potentially live in? \n\nI\'m moving with my family and budget is about $3.5k per month for accommodation.',1,0,'2020-11-20 02:50:35','2020-11-20 02:50:35'),
	(51,25,3,'I am moving to Singapore this January, and I am arranging every to bring my cat with me. Does anyone know for sure that if my cat is registered as an emotional support animal it needs to stay in lock down for the mandatory 30 days or we can scape from that? Or does anyone know a way to avoid the quarantine for my cat ? \nThanks a lot in advance!',1,0,'2020-11-20 02:52:49','2020-11-20 02:52:49'),
	(52,26,3,'I am moving to Singapore this January, and I am arranging every to bring my cat with me. Does anyone know for sure that if my cat is registered as an emotional support animal it needs to stay in lock down for the mandatory 30 days or we can scape from that? Or does anyone know a way to avoid the quarantine for my cat ? \nThanks a lot in advance!',1,0,'2020-11-20 02:53:09','2020-11-20 02:53:09'),
	(53,27,3,'I am moving to Singapore this January, and I am arranging every to bring my cat with me. Does anyone know for sure that if my cat is registered as an emotional support animal it needs to stay in lock down for the mandatory 30 days or we can scape from that? Or does anyone know a way to avoid the quarantine for my cat ? \nThanks a lot in advance!',1,0,'2020-11-20 02:53:12','2020-11-20 02:53:12'),
	(54,28,3,'Hi all, any Indian Passport holders/travellers from India who were able to secure pre-entry approval in the last two months? I am trying to secure an approval for my parents based in India (both of whom have an LTVP) but have been advised against applying by my employer\'s immigration agency since MoM is not approving anyone from India at the moment (per the agency). Grateful for any advice!',1,0,'2020-11-20 02:57:58','2020-11-20 02:57:58'),
	(55,29,61,'Can anyone recommend great condos to live? Ideally, one that is 10 - 15 mins from the city centre and has a pool, gym and relatively modern',1,1,'2020-11-20 03:26:49','2020-11-20 06:06:18'),
	(56,30,61,'dddd',1,0,'2020-11-20 03:35:14','2020-11-20 03:35:14'),
	(57,31,62,'test',1,0,'2020-11-20 05:45:29','2020-11-20 05:45:29'),
	(58,32,62,'hello',1,0,'2020-11-20 05:45:45','2020-11-20 05:45:45'),
	(59,33,62,'Question',1,0,'2020-11-20 05:46:45','2020-11-20 05:46:45'),
	(60,34,67,'I\'m in the final stages of securing a job in Singapore and just want to understand more about how easy to process is to get my EP approved?\n\nDoes it need to be approved before I land?',1,0,'2020-11-28 04:55:07','2020-11-28 04:55:07'),
	(61,35,67,'Hi everyone! My partner and I are moving from Sydney, Australia to Singapore in January. We are looking to ship our bed, mattress and a few other household items. Can anyone recommend a good, reliable and easy to work with shipping company?',1,0,'2020-11-28 04:57:26','2020-11-28 04:57:26'),
	(62,36,67,'Any insight into what the day-to-day life is like pls',1,0,'2020-11-28 04:59:48','2020-11-28 04:59:48'),
	(63,37,67,'Can anyone recommend a really great pet (cat) relocation service? She needs a week of boarding first so boarding recommendations welcome too.',1,0,'2020-11-28 05:05:56','2020-11-28 05:05:56'),
	(64,37,67,'Dr Gerry’s relocation services: http://www.petexportvet.com',0,0,'2020-11-28 05:06:36','2020-11-28 05:06:36'),
	(65,38,72,'Trik Mudah Mendapatkan Kuota Gratis MBS99. Ada kembali nih bro 40 kode rahasia yang mesti diingat untuk meraih paket kuota gratis berasal dari telkomsel. Bikers menjadi semakin nyaman kerja di tempat tinggal (WFH) atau studi berasal dari rumah. Pernahkah kamu mendengar tentang beberapa cara trik meraih paket internet gratis dengan pakai kode rahasia dari dial up pada provider telkomsel indonesia? Dan bagaimana caranya ?  Begini Cara Aktivasinya\n	Hal itu memang benar dan kerap terjadi, akan tapi biasanya tersedia beberapa kode rahasia paket internet gratis telkomsel yang mesti atau diharuskan terdaftar bersama program telkomsel.\nBiasanya mesti terdaftar program telkomsel seperti brand hp android dan tipe simcard tertentu.\nNamun termasuk tersedia kode rahasia paket internet gratis telkomsel secara cuma-cuma tanpa terdapatnya syarat tertentu. Memang kode kuota gratis telkomsel rahasia ini terlampau jarang tersedia yang mengetahuinya karena memang sesuai namanya yaitu Slot Online.\n	Ada dua cara enteng yang sanggup kamu terapkan untuk dapatkan kuota internet gratis sebanyak 50GB berasal dari Telkomsel. Karena pandemi Covid-19 masih belum sanggup dikendalikan bersama baik, aktivitas belajar mengajar masih dikerjakan secara jarak jauh atau PJJ. Tentunya aktivitas belajar mengajar jarak jauh ini memerlukan ketersediaan kuota internet yang memadai. Untuk itu pemerintah melalui Kementerian Pendidikan dan Kebudayaan membawa dampak program bantuan langsung didalam wujud kuota internet gratis. Program ini ditujukan bagi pelajar, guru untuk pendidikan dasar dan menengah, dan juga dosen dan mahasiswa perguruan tinggi.\n	\n	Sekarang kamu tak usah kuatir kehabisan kuota dikarenakan sistem pembelajaran online, lantaran pemerintah dapat memberikannya gratis! Bagaimana langkah memperolehnya? Berikut ini dapat dipaparkan langkah beroleh kuota gratis berasal dari Kemendikbud. Pembelajaran jarak jauh via online, menyebabkan lebih dari satu peserta didik menjadi berat.\n	Pasalnya, kuota yang dihabiskan tiap-tiap harinya sangatlah banyak, supaya duwit untuk membeli kuota terkuras memadai dalam. Tak cuma dirasakan oleh jenjang pendidikan dasar dan menengah, tetapi kamu yang telah berada di tingkat perguruan tinggi pun merasakan hal yang sama.\nMendengar banyaknya keluhan soal kuota, pemerintah lewat Kemendikbud lalu merancang program kuota gratis.\n	Tak main-main, anggaran yang disiapkan sebesar Rp7,2 triliun. Dana itu sepenuhnya untuk dukungan subsidi kuota internet kepada peserta didik dan para pengajarnya. Kuota gratis dapat diberikan selama empat bulan, yaitu berasal dari September sampai Desember 2020. Tentu kabar ini bagaikan angin fresh bagi kamu yang butuh kuota internet untuk sistem belajar mengajar',1,0,'2021-01-08 14:43:21','2021-01-08 14:43:21'),
	(66,39,72,'Trik Mudah Mendapatkan Kuota Gratis MBS99. Ada kembali nih bro 40 kode rahasia yang mesti diingat untuk meraih paket kuota gratis berasal dari telkomsel. Bikers menjadi semakin nyaman kerja di tempat tinggal (WFH) atau studi berasal dari rumah. Pernahkah kamu mendengar tentang beberapa cara trik meraih paket internet gratis dengan pakai kode rahasia dari dial up pada provider telkomsel indonesia? Dan bagaimana caranya ?  Begini Cara Aktivasinya\n	Hal itu memang benar dan kerap terjadi, akan tapi biasanya tersedia beberapa kode rahasia paket internet gratis telkomsel yang mesti atau diharuskan terdaftar bersama program telkomsel.\nBiasanya mesti terdaftar program telkomsel seperti brand hp android dan tipe simcard tertentu.\nNamun termasuk tersedia kode rahasia paket internet gratis telkomsel secara cuma-cuma tanpa terdapatnya syarat tertentu. Memang kode kuota gratis telkomsel rahasia ini terlampau jarang tersedia yang mengetahuinya karena memang sesuai namanya yaitu Slot Online.\n	Ada dua cara enteng yang sanggup kamu terapkan untuk dapatkan kuota internet gratis sebanyak 50GB berasal dari Telkomsel. Karena pandemi Covid-19 masih belum sanggup dikendalikan bersama baik, aktivitas belajar mengajar masih dikerjakan secara jarak jauh atau PJJ. Tentunya aktivitas belajar mengajar jarak jauh ini memerlukan ketersediaan kuota internet yang memadai. Untuk itu pemerintah melalui Kementerian Pendidikan dan Kebudayaan membawa dampak program bantuan langsung didalam wujud kuota internet gratis. Program ini ditujukan bagi pelajar, guru untuk pendidikan dasar dan menengah, dan juga dosen dan mahasiswa perguruan tinggi.\n	\n	Sekarang kamu tak usah kuatir kehabisan kuota dikarenakan sistem pembelajaran online, lantaran pemerintah dapat memberikannya gratis! Bagaimana langkah memperolehnya? Berikut ini dapat dipaparkan langkah beroleh kuota gratis berasal dari Kemendikbud. Pembelajaran jarak jauh via online, menyebabkan lebih dari satu peserta didik menjadi berat.\n	Pasalnya, kuota yang dihabiskan tiap-tiap harinya sangatlah banyak, supaya duwit untuk membeli kuota terkuras memadai dalam. Tak cuma dirasakan oleh jenjang pendidikan dasar dan menengah, tetapi kamu yang telah berada di tingkat perguruan tinggi pun merasakan hal yang sama.\nMendengar banyaknya keluhan soal kuota, pemerintah lewat Kemendikbud lalu merancang program kuota gratis.\n	Tak main-main, anggaran yang disiapkan sebesar Rp7,2 triliun. Dana itu sepenuhnya untuk dukungan subsidi kuota internet kepada peserta didik dan para pengajarnya. Kuota gratis dapat diberikan selama empat bulan, yaitu berasal dari September sampai Desember 2020. Tentu kabar ini bagaikan angin fresh bagi kamu yang butuh kuota internet untuk sistem belajar mengajar',1,0,'2021-01-08 14:43:45','2021-01-08 14:43:45'),
	(67,40,72,'Trik Mudah Mendapatkan Kuota Gratis MBS99. Ada kembali nih bro 40 kode rahasia yang mesti diingat untuk meraih paket kuota gratis berasal dari telkomsel. Bikers menjadi semakin nyaman kerja di tempat tinggal (WFH) atau studi berasal dari rumah. Pernahkah kamu mendengar tentang beberapa cara trik meraih paket internet gratis dengan pakai kode rahasia dari dial up pada provider telkomsel indonesia? Dan bagaimana caranya ?  Begini Cara Aktivasinya\n	Hal itu memang benar dan kerap terjadi, akan tapi biasanya tersedia beberapa kode rahasia paket internet gratis telkomsel yang mesti atau diharuskan terdaftar bersama program telkomsel.\nBiasanya mesti terdaftar program telkomsel seperti brand hp android dan tipe simcard tertentu.\nNamun termasuk tersedia kode rahasia paket internet gratis telkomsel secara cuma-cuma tanpa terdapatnya syarat tertentu. Memang kode kuota gratis telkomsel rahasia ini terlampau jarang tersedia yang mengetahuinya karena memang sesuai namanya yaitu [url=https://mbs88.net/] slot online[/url]\n	Ada dua cara enteng yang sanggup kamu terapkan untuk dapatkan kuota internet gratis sebanyak 50GB berasal dari Telkomsel. Karena pandemi Covid-19 masih belum sanggup dikendalikan bersama baik, aktivitas belajar mengajar masih dikerjakan secara jarak jauh atau PJJ. Tentunya aktivitas belajar mengajar jarak jauh ini memerlukan ketersediaan kuota internet yang memadai. Untuk itu pemerintah melalui Kementerian Pendidikan dan Kebudayaan membawa dampak program bantuan langsung didalam wujud kuota internet gratis. Program ini ditujukan bagi pelajar, guru untuk pendidikan dasar dan menengah, dan juga dosen dan mahasiswa perguruan tinggi.\n	\n	Sekarang kamu tak usah kuatir kehabisan kuota dikarenakan sistem pembelajaran online, lantaran pemerintah dapat memberikannya gratis! Bagaimana langkah memperolehnya? Berikut ini dapat dipaparkan langkah beroleh kuota gratis berasal dari Kemendikbud. Pembelajaran jarak jauh via online, menyebabkan lebih dari satu peserta didik menjadi berat.\n	Pasalnya, kuota yang dihabiskan tiap-tiap harinya sangatlah banyak, supaya duwit untuk membeli kuota terkuras memadai dalam. Tak cuma dirasakan oleh jenjang pendidikan dasar dan menengah, tetapi kamu yang telah berada di tingkat perguruan tinggi pun merasakan hal yang sama.\nMendengar banyaknya keluhan soal kuota, pemerintah lewat Kemendikbud lalu merancang program kuota gratis.\n	Tak main-main, anggaran yang disiapkan sebesar Rp7,2 triliun. Dana itu sepenuhnya untuk dukungan subsidi kuota internet kepada peserta didik dan para pengajarnya. Kuota gratis dapat diberikan selama empat bulan, yaitu berasal dari September sampai Desember 2020. Tentu kabar ini bagaikan angin fresh bagi kamu yang butuh kuota internet untuk sistem belajar mengajar',1,0,'2021-01-08 14:46:09','2021-01-08 14:46:09'),
	(68,41,73,'Mahasiswa Kupu-Kupu Lebih Unggul! Kenapa??\n\nAda berbagai istilah yang diberikan untuk menyebutkan model mahasiswa diamati dari kegiatan yang dilaksanakan sehari-hari. Sebelumnya, sudah diulas nama mahasiswa “kura-kura” yang adalah kependekan dari kuliah-rapat kuliah-rapat.\n\nSelain kuliah, mahasiswa model ini biasanya ikuti berbagai kegiatan dan rapat organisasi, baik di didalam maupun luar kampus. Bahkan dia duduki posisi mutlak di organisasi itu.\n\nNah, kali ini kami bakal mengkaji hal yang berlawanan, yaitu mahasiswa \" kupu-kupu\", yang merupakan singkatan dari kuliah-pulang kuliah-pulang. Kebanyakan orang beranggapan bahwa mahasiswa model ini kurang berkembang gara-gara aktivitasnya condong monoton dan kurang bersosialisasi bersama dengan kawan di kampus ataupun luar kampus.\n\nNamun, ternyata mahasiswa kupu-kupu terhitung mempunyai kelebihan. Seperti dilansir di Rencanamu.id, selanjutnya ini lima manfaatnya:\n\n1. Lebih fokus kuliah\nSesuai sebutannya, mahasiswa kupu-kupu menggunakan sebagian besar waktunya bersama dengan hal-hal yang berbau kuliah. Dia bakal lebih fokus untuk mengerjakan tugas-tugas kuliah, seperti memicu bahan presentasi, makalah ilmiah, dan jurnal.\nPasti saja beliau lebih fokus pada kewajiban kuliah gara-gara kegiatannya di luar kuliah tidak sedemikian itu banyak agar memiliki lebih banyak tepat buat mengatasi tugas kuliah.\nTidak cukup itu, mahasiswa kupu-kupu terbilang condong dapat ikuti agenda kuliah bersama dengan bagus dan rutin, tanpa harus sering membolos. Sebab, dia tidak membawa kegiatan lain di luar kuliah yang sanggup menjadi waktunya sejalan bersama dengan perkuliahan.\n\n2. Cepat lulus\nSudah lazim diketahui bahwa seorang mahasiswa sanggup lulus bersama dengan cepat kecuali studi dan mengerjakan tugas kuliah bersama dengan baik, jarang bolos, dan juga fokus pada kegiatan kuliah.\nDengan menjadi mahasiswa kupu-kupu, tentu saja anda mempunyai peluang lebih besar untuk melakukan hal-hal selanjutnya gara-gara sebagian besar waktumu cuma digunakan untuk kegiatan kuliah.\nOtomatis rancangan untuk menyelesaikan kuliah di setiap semester bakal lebih cepat tercapai hingga selanjutnya anda terhitung sanggup lulus kuliah cocok tujuan atau lebih-lebih lebih cepat dari pas yang diperkirakan.\n\n3. Mengembangkan hobi\nMahasiswa kupu-kupu membawa lebih banyak pas luang supaya dia sanggup mengembangkan diri bersama dengan melakukan kegiatan lain. Bentuknya yaitu menekuni hobi yang disukai selama ini, jikalau memancing, melukis, dan memasak. Ada juga mahasiswa kupu-kupu yang pulang cepat demi memainkan game taruhan online, memainkan game tersebut dapat menambah uang saku untuk kuliah bahkan lebih dari itu memainkan game judi online sangat mudah dan akan membuat kalian merasakan sensasi taruhan yang menarik dan banyak sekali jackpot besar-besaran.\n\nArtinya, mahasiswa kupu-kupu pun mempunyai peluang untuk mengembangkan diri didalam kegiatan di didalam atau luar kampus.\n\nBila dibandingkan bersama dengan mahasiswa kura-kura yang repot bersama dengan berbagai kegiatan rapat dan organisasi, mahasiswa kupu-kupu terhitung sanggup berkembang bersama dengan caranya sendiri, lebih-lebih tidak menutup barangkali sanggup memperoleh penghasilan tambahan dari hobinya itu.\n\n4. Menambah IPK\nSatu hal mutlak yang sanggup diperoleh bersama dengan menjadi mahasiswa kupu-kupu yaitu lebih besar peluang untuk menambah Indeks Prestasi Kumulatif (IPK). Sebab, dia mempunyai lebih banyak pas untuk belajar, melacak referensi materi kuliah, dan membaca handouts dari dosen atau yang dibuat sendiri. Bila sudah mempunyai bahan bacaan sendiri, anda bakal lebih ringan menyadari dan mengingat lagi materi yang sudah dipelajari. Dengan begitu, anda bakal lebih ringan mengerjakan soal-soal ujian, lantas memperoleh hasil yang lebih bagus, dan ujung-ujungnya IPK terhitung bakal naik.\n\n5. Ada pas mengawali bisnis\nAda saatnya seorang mahasiswa terasa jemu bersama dengan kegiatan kuliah. Salah satu langkah mengatasi hal itu yaitu bersama dengan mengawali usaha kecil-kecilan. Ada sebagian kegunaan yang diperoleh, jikalau menyadari langkah sesuaikan pemasukan dan pengeluaran. Kamu terhitung bakal menyadari langkah mengelola usaha supaya sanggup berkembang dan menghasilkan omzet yang jadi besar. Apalagi kecuali usaha itu sanggup terjadi lancar dan memberi keuntungan finansial cocok harapan, anda sanggup menggunakannya untuk membayar kepentingan kuliah, atau paling tidak bikin menambah uang jajan sehari-hari. Jadi, ternyata seorang mahasiswa kupu-kupu pun mempunyai banyak manfaat, bukan? \nKini saatnya anda menentukan pilihan menjadi mahasiswa kupu-kupu atau kura-kura. Masing-masing mempunyai kelebihan dan kekurangan, tetapi yang paling penting adalah anda sanggup mengelola pas supaya kuliahmu beres cocok tujuan dan kegiatan lain terhitung sanggup terjadi tanpa gangguan. \n\n\nSumber : http://blog.umy.ac.id/putrikartika/mahasiswa-kupu-kupu-lebih-unggul-kenapa/',1,0,'2021-01-11 17:45:10','2021-01-11 17:45:10');

/*!40000 ALTER TABLE `topic_questions` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table topic_user_votes
# ------------------------------------------------------------

DROP TABLE IF EXISTS `topic_user_votes`;

CREATE TABLE `topic_user_votes` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `topic_id` bigint(20) NOT NULL,
  `question_id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `topic_id` (`topic_id`),
  KEY `question_id` (`question_id`),
  KEY `user_id` (`user_id`),
  KEY `created_at` (`created_at`),
  KEY `updated_at` (`updated_at`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `topic_user_votes` WRITE;
/*!40000 ALTER TABLE `topic_user_votes` DISABLE KEYS */;

INSERT INTO `topic_user_votes` (`id`, `topic_id`, `question_id`, `user_id`, `created_at`, `updated_at`)
VALUES
	(2,1,10,22,'2020-05-19 09:29:56','2020-05-19 09:29:56'),
	(3,1,13,22,'2020-05-19 09:29:57','2020-05-19 09:29:57'),
	(4,4,9,22,'2020-05-19 09:30:26','2020-05-19 09:30:26'),
	(5,7,7,22,'2020-05-19 09:30:59','2020-05-19 09:30:59'),
	(8,6,16,10,'2020-05-20 01:41:12','2020-05-20 01:41:12'),
	(16,8,14,10,'2020-05-20 01:42:10','2020-05-20 01:42:10'),
	(18,8,15,10,'2020-05-20 01:42:14','2020-05-20 01:42:14'),
	(38,1,10,37,'2020-09-29 10:38:05','2020-09-29 10:38:05'),
	(40,1,11,37,'2020-09-29 10:38:10','2020-09-29 10:38:10'),
	(41,1,1,37,'2020-09-29 10:38:16','2020-09-29 10:38:16'),
	(42,1,12,37,'2020-09-29 10:38:34','2020-09-29 10:38:34'),
	(43,5,5,37,'2020-09-30 03:05:31','2020-09-30 03:05:31'),
	(45,2,17,37,'2020-09-30 03:05:49','2020-09-30 03:05:49'),
	(46,2,2,37,'2020-09-30 03:05:52','2020-09-30 03:05:52'),
	(47,2,19,37,'2020-09-30 03:05:57','2020-09-30 03:05:57'),
	(49,10,20,37,'2020-09-30 03:15:53','2020-09-30 03:15:53'),
	(52,6,16,37,'2020-10-01 09:24:05','2020-10-01 09:24:05'),
	(53,6,6,37,'2020-10-01 09:24:07','2020-10-01 09:24:07'),
	(54,1,13,37,'2020-10-01 09:24:16','2020-10-01 09:24:16'),
	(56,5,5,2,'2020-10-02 14:01:50','2020-10-02 14:01:50'),
	(57,5,23,2,'2020-10-02 14:01:53','2020-10-02 14:01:53'),
	(60,1,13,1,'2020-10-03 08:22:41','2020-10-03 08:22:41'),
	(62,4,4,3,'2020-10-05 23:22:20','2020-10-05 23:22:20'),
	(63,19,39,1,'2020-10-12 08:10:09','2020-10-12 08:10:09'),
	(64,5,22,51,'2020-10-16 07:25:05','2020-10-16 07:25:05'),
	(65,5,5,52,'2020-10-20 07:52:01','2020-10-20 07:52:01'),
	(66,1,12,26,'2020-11-12 10:37:49','2020-11-12 10:37:49'),
	(67,1,10,26,'2020-11-12 10:37:50','2020-11-12 10:37:50'),
	(68,1,11,26,'2020-11-12 10:37:52','2020-11-12 10:37:52'),
	(69,1,1,26,'2020-11-12 10:37:56','2020-11-12 10:37:56'),
	(70,2,17,26,'2020-11-19 10:04:06','2020-11-19 10:04:06'),
	(71,2,19,26,'2020-11-19 10:04:14','2020-11-19 10:04:14'),
	(72,17,34,26,'2020-11-19 10:04:54','2020-11-19 10:04:54'),
	(74,29,55,63,'2020-11-20 06:06:18','2020-11-20 06:06:18');

/*!40000 ALTER TABLE `topic_user_votes` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table topics
# ------------------------------------------------------------

DROP TABLE IF EXISTS `topics`;

CREATE TABLE `topics` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `topic` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner_id` bigint(20) NOT NULL,
  `last_response` datetime NOT NULL,
  `is_active` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `topic` (`topic`),
  KEY `owner_id` (`owner_id`),
  KEY `last_response` (`last_response`),
  KEY `is_active` (`is_active`),
  KEY `created_at` (`created_at`),
  KEY `updated_at` (`updated_at`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `topics` WRITE;
/*!40000 ALTER TABLE `topics` DISABLE KEYS */;

INSERT INTO `topics` (`id`, `topic`, `owner_id`, `last_response`, `is_active`, `created_at`, `updated_at`)
VALUES
	(34,'Securing pre-entry approval from India',48,'2020-11-28 05:00:20',1,'2020-11-28 04:55:07','2020-11-28 05:00:26'),
	(35,'Shipping company recommendations...any tips welcome!',66,'2020-11-28 05:07:24',0,'2020-11-28 04:57:26','2020-11-28 05:08:00'),
	(36,'What restrictions are in place with Covid?',67,'2020-11-28 04:59:48',1,'2020-11-28 04:59:48','2020-11-28 04:59:48'),
	(37,'Pet relocation',22,'2020-11-28 05:06:46',1,'2020-11-28 05:05:56','2020-11-28 05:06:57'),
	(38,'Trik Mudah Mendapatkan Kuota Gratis MBS88',72,'2021-01-08 14:43:21',1,'2021-01-08 14:43:21','2021-01-08 14:43:21'),
	(39,'Trik Mudah Mendapatkan Kuota Gratis MBS88',72,'2021-01-08 14:43:45',1,'2021-01-08 14:43:45','2021-01-08 14:43:45'),
	(40,'Trik Mudah Mendapatkan Kuota Gratis MBS88',72,'2021-01-08 14:46:09',1,'2021-01-08 14:46:09','2021-01-08 14:46:09'),
	(41,'Mahasiswa Kupu-Kupu Lebih Unggul! Kenapa??',73,'2021-01-11 17:45:10',1,'2021-01-11 17:45:10','2021-01-11 17:45:10');

/*!40000 ALTER TABLE `topics` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table user_blacklist
# ------------------------------------------------------------

DROP TABLE IF EXISTS `user_blacklist`;

CREATE TABLE `user_blacklist` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) NOT NULL,
  `location_id` bigint(20) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `location_id` (`location_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `user_blacklist` WRITE;
/*!40000 ALTER TABLE `user_blacklist` DISABLE KEYS */;

INSERT INTO `user_blacklist` (`id`, `user_id`, `location_id`)
VALUES
	(4,3,21),
	(5,3,7),
	(7,3,13),
	(8,3,4),
	(9,3,28),
	(10,3,33),
	(11,3,35),
	(12,3,3),
	(13,3,32),
	(14,3,40),
	(15,3,8),
	(17,3,36),
	(18,3,43),
	(19,3,13),
	(20,3,4),
	(21,3,28),
	(22,3,13),
	(23,3,4),
	(24,3,28),
	(25,3,33),
	(26,3,35),
	(27,3,3),
	(28,3,32),
	(29,3,40),
	(30,3,8),
	(32,3,36),
	(34,3,37),
	(35,3,14),
	(36,3,5);

/*!40000 ALTER TABLE `user_blacklist` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table user_fave
# ------------------------------------------------------------

DROP TABLE IF EXISTS `user_fave`;

CREATE TABLE `user_fave` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) NOT NULL,
  `location_id` bigint(20) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `location_id` (`location_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `user_fave` WRITE;
/*!40000 ALTER TABLE `user_fave` DISABLE KEYS */;

INSERT INTO `user_fave` (`id`, `user_id`, `location_id`)
VALUES
	(5,24,2),
	(7,26,3),
	(8,26,4),
	(12,29,11),
	(15,1,32),
	(16,29,3),
	(17,29,4),
	(19,1,35),
	(29,33,24),
	(30,33,29),
	(31,33,25),
	(32,33,3),
	(64,41,26),
	(65,41,26),
	(66,41,3),
	(67,42,26),
	(68,43,34),
	(70,45,5),
	(77,37,3),
	(78,55,22),
	(79,55,17),
	(80,55,23),
	(81,55,16),
	(85,56,3),
	(88,3,2),
	(99,51,16),
	(100,51,38),
	(101,51,13),
	(102,50,38),
	(104,26,38);

/*!40000 ALTER TABLE `user_fave` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table user_housing
# ------------------------------------------------------------

DROP TABLE IF EXISTS `user_housing`;

CREATE TABLE `user_housing` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) NOT NULL,
  `housing_id` bigint(20) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `housing_id` (`housing_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `user_housing` WRITE;
/*!40000 ALTER TABLE `user_housing` DISABLE KEYS */;

INSERT INTO `user_housing` (`id`, `user_id`, `housing_id`)
VALUES
	(14,29,11),
	(15,29,12),
	(19,37,5),
	(20,37,9),
	(21,37,17),
	(23,2,3),
	(24,3,1),
	(25,26,9),
	(26,26,5),
	(27,26,13),
	(30,45,2),
	(32,37,12),
	(33,56,11),
	(34,51,1),
	(35,51,2),
	(38,1,7),
	(39,60,17);

/*!40000 ALTER TABLE `user_housing` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table user_prefs
# ------------------------------------------------------------

DROP TABLE IF EXISTS `user_prefs`;

CREATE TABLE `user_prefs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) NOT NULL,
  `pref_id` bigint(20) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `pref_id` (`pref_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `user_prefs` WRITE;
/*!40000 ALTER TABLE `user_prefs` DISABLE KEYS */;

INSERT INTO `user_prefs` (`id`, `user_id`, `pref_id`)
VALUES
	(50,14,27),
	(51,14,28),
	(52,14,29),
	(53,15,25),
	(54,15,27),
	(55,15,30),
	(56,15,23),
	(57,16,23),
	(95,20,22),
	(96,20,23),
	(97,20,24),
	(98,20,26),
	(99,20,27),
	(100,20,28),
	(101,20,29),
	(102,20,31),
	(103,20,33),
	(104,20,34),
	(105,20,35),
	(106,20,36),
	(107,20,37),
	(108,20,38),
	(109,20,39),
	(564,29,25),
	(565,29,39),
	(1090,34,22),
	(1091,35,24),
	(1092,35,39),
	(1151,33,27),
	(1152,33,34),
	(1153,33,30),
	(1154,33,24),
	(1155,33,37),
	(1156,33,32),
	(1157,33,23),
	(1158,33,28),
	(1159,33,31),
	(1386,38,24),
	(1387,38,23),
	(1388,38,22),
	(1530,40,23),
	(1531,40,39),
	(1532,41,24),
	(1533,41,39),
	(1534,42,39),
	(1535,42,31),
	(1545,43,23),
	(1546,43,31),
	(1560,45,25),
	(1561,45,30),
	(1562,45,37),
	(1563,45,32),
	(1564,45,33),
	(1565,45,36),
	(1566,45,29),
	(1575,46,27),
	(1576,46,30),
	(1577,46,24),
	(1578,46,37),
	(1579,46,33),
	(1580,46,28),
	(1581,46,39),
	(1582,46,26),
	(1583,46,29),
	(1797,53,27),
	(1798,54,25),
	(1799,55,25),
	(1800,55,27),
	(1801,55,24),
	(1802,55,37),
	(1803,55,33),
	(1804,55,28),
	(1815,56,24),
	(1816,56,37),
	(1827,1,27),
	(1828,1,37),
	(1833,52,27),
	(1898,2,27),
	(1899,2,30),
	(1900,2,37),
	(1901,2,32),
	(1902,2,33),
	(1903,2,28),
	(1907,3,27),
	(1908,3,23),
	(1909,3,33),
	(1910,3,28),
	(1911,3,39),
	(1912,26,25),
	(1913,26,27),
	(1914,26,34),
	(1915,61,27),
	(1916,61,24),
	(1917,61,32),
	(1918,61,36),
	(1919,64,25),
	(1920,64,37),
	(1921,64,32),
	(1922,64,23),
	(1923,64,28),
	(1924,64,39),
	(1929,66,27),
	(1930,66,30),
	(1931,66,28),
	(1932,66,39);

/*!40000 ALTER TABLE `user_prefs` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table user_services
# ------------------------------------------------------------

DROP TABLE IF EXISTS `user_services`;

CREATE TABLE `user_services` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) NOT NULL,
  `service_id` bigint(20) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `service_id` (`service_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `user_services` WRITE;
/*!40000 ALTER TABLE `user_services` DISABLE KEYS */;

INSERT INTO `user_services` (`id`, `user_id`, `service_id`)
VALUES
	(3,15,1),
	(4,15,2),
	(5,15,3),
	(6,16,2),
	(9,20,2),
	(10,20,7),
	(14,10,2),
	(15,29,1),
	(16,29,7),
	(20,33,1),
	(21,33,2),
	(22,34,3),
	(23,34,6),
	(24,35,2),
	(25,35,4),
	(26,36,6),
	(27,38,2),
	(28,38,6),
	(29,40,2),
	(30,41,2),
	(31,41,6),
	(35,42,1),
	(36,42,2),
	(37,42,7),
	(38,43,2),
	(39,43,6),
	(40,45,1),
	(41,45,3),
	(42,45,4),
	(43,45,6),
	(44,46,1),
	(45,46,4),
	(46,46,6),
	(47,46,7),
	(98,53,3),
	(105,55,1),
	(106,55,2),
	(107,55,3),
	(108,55,4),
	(109,55,6),
	(110,55,7),
	(113,56,3),
	(114,56,4),
	(123,52,1),
	(124,52,2),
	(155,2,1),
	(156,2,3),
	(157,2,6),
	(160,26,1),
	(161,61,1),
	(162,61,3),
	(166,66,1),
	(167,66,4),
	(168,66,6),
	(170,63,2);

/*!40000 ALTER TABLE `user_services` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `salt` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` enum('male','female') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `nationality` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `moving_from` varchar(2) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `moving_to` varchar(2) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `live_close` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `live_latitude` decimal(10,8) DEFAULT NULL,
  `live_longitude` decimal(11,8) DEFAULT NULL,
  `remoteness` int(11) DEFAULT NULL,
  `transport` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `property_type` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `moving_with` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `moving_on` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `google_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `google_avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `google_avatar_original` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_visited` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  KEY `first_name` (`first_name`),
  KEY `last_name` (`last_name`),
  KEY `password` (`password`),
  KEY `salt` (`salt`),
  KEY `username` (`username`),
  KEY `phone` (`phone`),
  KEY `photo_url` (`photo_url`),
  KEY `gender` (`gender`),
  KEY `birthday` (`birthday`),
  KEY `moving_from` (`moving_from`),
  KEY `moving_to` (`moving_to`),
  KEY `live_close` (`live_close`),
  KEY `live_latitude` (`live_latitude`),
  KEY `live_longitude` (`live_longitude`),
  KEY `remoteness` (`remoteness`),
  KEY `transport` (`transport`),
  KEY `status` (`status`),
  KEY `email_verified_at` (`email_verified_at`),
  KEY `remember_token` (`remember_token`),
  KEY `google_id` (`google_id`),
  KEY `google_avatar` (`google_avatar`),
  KEY `google_avatar_original` (`google_avatar_original`),
  KEY `facebook_id` (`facebook_id`),
  KEY `last_visited` (`last_visited`),
  KEY `created_at` (`created_at`),
  KEY `updated_at` (`updated_at`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `password`, `salt`, `username`, `phone`, `photo_url`, `gender`, `birthday`, `nationality`, `moving_from`, `moving_to`, `live_close`, `live_latitude`, `live_longitude`, `remoteness`, `transport`, `property_type`, `moving_with`, `moving_on`, `status`, `email_verified_at`, `remember_token`, `google_id`, `google_avatar`, `google_avatar_original`, `facebook_id`, `last_visited`, `created_at`, `updated_at`)
VALUES
	(21,'Sudhan Raj','','sudhan03raj@gmail.com',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'AU','SG',NULL,0.00000000,0.00000000,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'gys5mPXoT8OvFBxUh8g2VhgC9xp3mKsEXzQFozeQ6mp2y0RuCsLUFTcH7sCh','114453818524520014987','https://lh3.googleusercontent.com/a-/AOh14Gh-4ZSv6xQICjVYq2J80efHcOZR229HzM1vPZDr9w','https://lh3.googleusercontent.com/a-/AOh14Gh-4ZSv6xQICjVYq2J80efHcOZR229HzM1vPZDr9w',NULL,'2020-05-19 02:57:21','2020-05-19 02:56:48','2020-05-19 02:56:48'),
	(22,'Sudhan Raj','','sudh0003@e.ntu.edu.sg',NULL,NULL,NULL,NULL,'https://www.haulmate.co/storage/user/iGdq7xXgDBP1TY5O0SitghykFLbD8UnnLs4eKTbM.jpg',NULL,NULL,NULL,'AU','SG',NULL,0.00000000,0.00000000,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'PEG7cBNyh2MuMTl5Ux5x8r25Ep70KPChib9PPtjaDhcMn7h1xsUV7jizKQoi',NULL,NULL,NULL,'10158082759796066','2020-11-21 06:40:30','2020-05-19 07:08:20','2020-05-19 08:51:13'),
	(44,'Avik','Ashar','insane.freak.call911@gmail.com',NULL,NULL,NULL,NULL,'https://www.haulmate.co/storage/user/JikTgmW9hTT81hpG1bSPVXxrpOD9aWWHyF5c8GjA.jpg',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'RV0LEYLT5eWiZb2YzWvd877HCNbW3XLizASnXQvxowy1hhwGErzVjGJ2W1Hk','111398126831047122018','https://lh3.googleusercontent.com/a-/AOh14Gh9P7O3zpDRktrp0AjVD9gS3XPdTOjEUdh88QAd','https://lh3.googleusercontent.com/a-/AOh14Gh9P7O3zpDRktrp0AjVD9gS3XPdTOjEUdh88QAd',NULL,'2020-08-06 12:07:06','2020-08-06 11:45:44','2020-08-06 11:45:44'),
	(48,'Aayush','Garg','gargaayush1122@gmail.com',NULL,NULL,NULL,NULL,'https://www.haulmate.co/storage/user/RrrDhvbGcJS7kXK9DWDtOvWEV2S8tuRxV2lhgPVg.jpg',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'ZwI98i2m228exCbV6XHPeeAcCyYxVR8CnWKmfiKR9gDpbGerZYbTRtbl2wET','107306064116442751504','https://lh3.googleusercontent.com/a-/AOh14GgOfvf7Wfa6lBcYh_lZkkQupjiCjlwIeeb2fwJ8fQ','https://lh3.googleusercontent.com/a-/AOh14GgOfvf7Wfa6lBcYh_lZkkQupjiCjlwIeeb2fwJ8fQ',NULL,'2020-08-12 13:33:19','2020-08-12 13:33:08','2020-08-12 13:33:08'),
	(62,'Roary','Petersen','qobasok@mailinator.com','$2y$10$xamcifol80uzsAB/2uiit.6J4bKlk8z.haC0ZTwemz2owGCynnEki',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2020-11-20 05:52:58','2020-11-20 05:45:10','2020-11-20 05:45:10'),
	(63,'Bobby','Test','bobby@appreneurs.co','$2y$10$plYtKxv6r7A0nKAUSTo5Wew6sm7RBX2EQCVETRuJeAC13ZC/91rKq',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'AU','SG',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2020-12-17 05:41:02','2020-11-20 05:59:53','2020-12-15 04:47:44'),
	(64,'Sudhan','Raj','mail@sudhanraj.com',NULL,NULL,NULL,NULL,'https://www.haulmate.co/storage/user/IaJy8AQQn6GDgtov6YofXqM8JteFIyuwzt8q9hTd.jpg',NULL,NULL,NULL,'AU','SG',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'uJPjISdyVGTbFagnmPUbaPf0VsxL2L6t9w2HVxYsCWKkb46NHzxzNGZZvrsq','105944193330383441296','https://lh5.googleusercontent.com/-RG67rKWPvK8/AAAAAAAAAAI/AAAAAAAAAAA/AMZuuclKRgw2IViCyfD4IqejovUEGdeXGg/s96-c/photo.jpg','https://lh5.googleusercontent.com/-RG67rKWPvK8/AAAAAAAAAAI/AAAAAAAAAAA/AMZuuclKRgw2IViCyfD4IqejovUEGdeXGg/s96-c/photo.jpg',NULL,'2021-01-13 01:58:05','2020-11-21 06:42:07','2020-11-21 06:42:41'),
	(66,'Joleen','Teo','joleen.teo@gmail.com',NULL,NULL,NULL,'85004693','https://www.haulmate.co/storage/user/dRodGlulg7vzcLWHon4X0gs29rneVOBH9wOa90tU.jpg',NULL,NULL,NULL,'AU','SG','7 STRAITS VIEW MARINA ONE EAST TOWER SINGAPORE 018936',1.27803242,103.85288320,30,'public','1','My partner','In 6 months',NULL,NULL,'fYPY6usAeirZeWGCPBFXTfW1IuuEJ4hDzG61UwDW9GjEZOWaiHSQYoPekxNJ',NULL,NULL,NULL,'10164333944575183','2020-12-02 13:22:24','2020-11-28 04:20:20','2020-11-28 04:27:21'),
	(67,'Mike','Male','mikemale1@gmail.com',NULL,NULL,NULL,NULL,'https://www.haulmate.co/storage/user/ppv1AOrvrAzMocYQvmxZHCP9jhx02PUvDoil1kmi.jpg',NULL,NULL,NULL,'AU','SG',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'c27HFEUlgIVupJOYlPBHO7affIbSlzF5SneHuTbXp7PJvdK5yok8E0MFoMhe',NULL,NULL,NULL,'10158415028155667','2021-01-12 14:27:16','2020-11-28 04:52:30','2020-11-28 04:52:38'),
	(68,'Yogaasri','T','yogaasri.t@gmail.com',NULL,NULL,NULL,NULL,'https://www.haulmate.co/storage/user/psjVmZYvoa1yGgCh6qFwXQK1LImXfzuTMIy1P91n.jpg',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'oKg9Td7mUXvBwU3fJFGahanwBTqtMZwQgdI9VM4t5piwJKoltfLBpABvOMBt','117109212425458583006','https://lh3.googleusercontent.com/a-/AOh14GhNIvaUTDNIzJzrIRAr6HRI_wgoFK6LYzNVCa8hyQ=s96-c','https://lh3.googleusercontent.com/a-/AOh14GhNIvaUTDNIzJzrIRAr6HRI_wgoFK6LYzNVCa8hyQ=s96-c',NULL,'2020-11-28 11:22:16','2020-11-28 11:21:52','2020-11-28 11:21:52'),
	(69,'arachni_name','arachni_name','arachni@email.gr','$2y$10$C.3VmUwXJpORPY3tH5338ehk9ZvFb2MiGHgW8Q8JnsEqMLSzAyk1y',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2020-12-27 08:15:42','2020-12-14 09:43:14','2020-12-14 09:43:14'),
	(70,'Saad','Naeem','saad@spiderbc.com',NULL,NULL,NULL,NULL,'https://www.haulmate.co/storage/user/kHxEp63vct8mA3cBAeoshmlWgZyZIKZCylY3Ei2T.jpg',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'sk9v56OFzdB13TKA6X9RkcZ9jxuMQbAjMEGCTmBX78Z8UEEYJzdtCEeN57Ac','101845370909060452025','https://lh3.googleusercontent.com/a-/AOh14Giw68mads7S_flFtYAHzu1hFCJNgrh-K7lKoVnK=s96-c','https://lh3.googleusercontent.com/a-/AOh14Giw68mads7S_flFtYAHzu1hFCJNgrh-K7lKoVnK=s96-c',NULL,'2020-12-22 11:35:23','2020-12-22 11:34:37','2020-12-22 11:34:37'),
	(71,'Imran','Aslam','umairmahmood457@gmail.com',NULL,NULL,NULL,NULL,'https://www.haulmate.co/storage/user/y5WFWYcWSadwVhlymz2FyDxBReddQYKKl8Z5l1eh.jpg',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'t5Ub9PFfqTtCb1sTNFudkQJnbrXuIC1yQOkuVb45PGSLIWAhVsGK4VWacWOM',NULL,NULL,NULL,'445663140137039','2021-01-02 05:32:47','2021-01-02 05:32:30','2021-01-02 05:32:30'),
	(72,'ozumi','films','ozumifilms@gmail.com',NULL,NULL,NULL,NULL,'https://www.haulmate.co/storage/user/Lg4JAVqGIHqob20kgTKjHaMQyo5iLjhkKDI34R2w.jpg',NULL,NULL,NULL,'ID','SG',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'xPDztyWZeLyaOMNBrsbAyZL21dWAEJBifUnTrRFHxKNxOjVhTLOzwFpjgi3Q','110515474801148377711','https://lh3.googleusercontent.com/-wV3tM_dki_U/AAAAAAAAAAI/AAAAAAAAAAA/AMZuucnkiK6SsZ7jPN1CR0Xy0SXdW3VRFQ/s96-c/photo.jpg','https://lh3.googleusercontent.com/-wV3tM_dki_U/AAAAAAAAAAI/AAAAAAAAAAA/AMZuucnkiK6SsZ7jPN1CR0Xy0SXdW3VRFQ/s96-c/photo.jpg',NULL,'2021-01-08 14:46:16','2021-01-08 14:42:10','2021-01-08 14:42:43'),
	(73,'daya','dreams','dreamsdaya429@gmail.com',NULL,NULL,NULL,NULL,'https://www.haulmate.co/storage/user/wmtesWurJ3s0wNd0Wv1avrcy1FStlbnWtDqq2pbd.jpg',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'oxoeplakBMiylbA0lDxx6GD61OYVIn9TlzQA7RaECVc590lFQ6N8OhW7k68T','101448883020453363564','https://lh3.googleusercontent.com/a-/AOh14GhIcMYtcgEkJFbQo7g4Ou-aHSflWSGl0spCUSYp=s96-c','https://lh3.googleusercontent.com/a-/AOh14GhIcMYtcgEkJFbQo7g4Ou-aHSflWSGl0spCUSYp=s96-c',NULL,'2021-01-11 17:45:48','2021-01-11 17:44:04','2021-01-11 17:44:04');

/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
