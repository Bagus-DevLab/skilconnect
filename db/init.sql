-- MySQL dump 10.13  Distrib 8.0.30, for Win64 (x86_64)
--
-- Host: localhost    Database: projectakhirweb
-- ------------------------------------------------------
-- Server version	8.0.30

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `cache`
--

DROP TABLE IF EXISTS `cache`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cache`
--

LOCK TABLES `cache` WRITE;
/*!40000 ALTER TABLE `cache` DISABLE KEYS */;
/*!40000 ALTER TABLE `cache` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cache_locks`
--

DROP TABLE IF EXISTS `cache_locks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cache_locks`
--

LOCK TABLES `cache_locks` WRITE;
/*!40000 ALTER TABLE `cache_locks` DISABLE KEYS */;
/*!40000 ALTER TABLE `cache_locks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `contacts`
--

DROP TABLE IF EXISTS `contacts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `contacts` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('new','read','replied') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'new',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contacts`
--

LOCK TABLES `contacts` WRITE;
/*!40000 ALTER TABLE `contacts` DISABLE KEYS */;
/*!40000 ALTER TABLE `contacts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `courses`
--

DROP TABLE IF EXISTS `courses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `courses` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `duration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `participants` int NOT NULL DEFAULT '0',
  `price` decimal(10,0) NOT NULL,
  `icon_class` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `courses`
--

LOCK TABLES `courses` WRITE;
/*!40000 ALTER TABLE `courses` DISABLE KEYS */;
INSERT INTO `courses` VALUES (1,'Fullstack Web Development','Programming','12 minggu',156,750000,'fa-laptop-code','2025-12-21 05:37:17','2025-12-21 05:37:17'),(2,'UI/UX Design for Beginners','Design','8 minggu',234,500000,'fa-paint-brush','2025-12-21 05:37:17','2025-12-21 05:37:17'),(3,'Digital Marketing Mastery','Marketing','6 minggu',189,450000,'fa-bullhorn','2025-12-21 05:37:17','2025-12-21 05:37:17'),(4,'Data Science & Machine Learning','Data Science','10 minggu',145,900000,'fa-chart-line','2025-12-21 05:37:17','2025-12-21 05:37:17'),(5,'Video Editing for Content Creator','Content Creation','4 minggu',267,350000,'fa-video','2025-12-21 05:37:17','2025-12-21 05:37:17'),(6,'Cyber Security Fundamentals','Security','8 minggu',98,650000,'fa-shield-alt','2025-12-21 05:37:17','2025-12-21 05:37:17'),(7,'Public Speaking & Communication','Soft Skills','3 minggu',312,300000,'fa-microphone','2025-12-21 05:37:17','2025-12-21 05:37:17'),(8,'Microsoft Office Masterclass','Office Skills','2 minggu',445,200000,'fa-file-excel','2025-12-21 05:37:17','2025-12-21 05:37:17'),(9,'Photography & Editing (Lightroom)','Photography','5 minggu',201,400000,'fa-camera','2025-12-21 05:37:17','2025-12-21 05:37:17'),(10,'Analisis Jejaring Sosial','Data Analysis','8 minggu',87,700000,'fa-project-diagram','2025-12-21 05:37:17','2025-12-21 05:37:17'),(11,'Integrasi Sistem','System Integration','10 minggu',76,850000,'fa-cogs','2025-12-21 05:37:17','2025-12-21 05:37:17'),(12,'Pemrograman Perangkat Bergerak','Mobile Development','12 minggu',134,950000,'fa-mobile-alt','2025-12-21 05:37:17','2025-12-21 05:37:17'),(13,'Pemrograman Web Lanjutan','Advanced Web','10 minggu',167,800000,'fa-code','2025-12-21 05:37:17','2025-12-21 05:37:17'),(14,'Rekayasa Perangkat Lunak','Software Engineering','8 minggu',143,750000,'fa-tools','2025-12-21 05:37:18','2025-12-21 05:37:18'),(15,'Teknik Pengambilan Keputusan','Decision Making','6 minggu',198,550000,'fa-brain','2025-12-21 05:37:18','2025-12-21 05:37:18'),(16,'Belajar Digital Marketing','Marketing','8 minggu',289,150000,'fa-bullhorn','2025-12-21 05:37:18','2025-12-21 05:37:18'),(17,'Blockchain & Cryptocurrency Development','Blockchain','10 minggu',92,950000,'fa-bitcoin','2025-12-21 05:37:18','2025-12-21 18:56:14'),(18,'Cloud Computing dengan AWS','Cloud Computing','10 minggu',178,950000,'fa-cloud','2025-12-21 05:37:18','2025-12-21 05:37:18'),(19,'Game Development dengan Unity','Game Development','16 minggu',145,1100000,'fa-gamepad','2025-12-21 05:37:18','2025-12-21 05:37:18'),(20,'Artificial Intelligence & Deep Learning','AI & ML','14 minggu',103,1300000,'fa-robot','2025-12-21 05:37:18','2025-12-21 05:37:18'),(21,'Copywriting & Content Writing','Writing','5 minggu',256,400000,'fa-pen-fancy','2025-12-21 05:37:18','2025-12-21 05:37:18'),(22,'DevOps Engineering Bootcamp','DevOps','12 minggu',87,1050000,'fa-server','2025-12-21 05:37:18','2025-12-21 05:37:18'),(23,'Graphic Design dengan Adobe Illustrator','Design','7 minggu',223,550000,'fa-palette','2025-12-21 05:37:18','2025-12-21 05:37:18'),(24,'SEO & Google Ads Mastery','Digital Marketing','6 minggu',312,500000,'fa-search','2025-12-21 05:37:18','2025-12-21 05:37:18'),(25,'Business Intelligence & Data Visualization','Data Analytics','9 minggu',134,850000,'fa-chart-bar','2025-12-21 05:37:18','2025-12-21 05:37:18'),(27,'Fullstack Web Development','Programming','12 minggu',0,750000,'fa-laptop-code','2025-12-21 05:47:42','2025-12-21 05:48:36'),(28,'Mobile App Development','Programming','10 minggu',0,850000,'fa-mobile-alt','2025-12-21 05:52:06','2025-12-21 05:52:06'),(29,'Mobile App Development','Programming','10 minggu',0,750000,'fa-mobile-alt','2025-12-21 06:01:14','2025-12-21 06:02:59');
/*!40000 ALTER TABLE `courses` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `enrollments`
--

DROP TABLE IF EXISTS `enrollments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `enrollments` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned DEFAULT NULL,
  `course_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `course_price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `course_duration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `full_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `occupation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `goals` text COLLATE utf8mb4_unicode_ci,
  `payment_method` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('pending','approved','rejected') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `enrollments_user_id_foreign` (`user_id`),
  CONSTRAINT `enrollments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `enrollments`
--

LOCK TABLES `enrollments` WRITE;
/*!40000 ALTER TABLE `enrollments` DISABLE KEYS */;
INSERT INTO `enrollments` VALUES (1,NULL,'Pemrograman Web Lanjutan','Rp 800.000','10 minggu','Aficha Lhara Beliandha','kaafii853@gmail.com','083834495352','mahasiswa','g','ewallet','pending','2025-12-21 05:49:23','2025-12-21 05:49:23'),(2,NULL,'Integrasi Sistem','Rp 850.000','10 minggu','Aficha Lhara Beliandha','kaafii853@gmail.com','083834495352','mahasiswa','untuk mengasah kemampuan','ewallet','pending','2025-12-21 19:04:12','2025-12-21 19:04:12');
/*!40000 ALTER TABLE `enrollments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `failed_jobs`
--

LOCK TABLES `failed_jobs` WRITE;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `job_batches`
--

DROP TABLE IF EXISTS `job_batches`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `job_batches`
--

LOCK TABLES `job_batches` WRITE;
/*!40000 ALTER TABLE `job_batches` DISABLE KEYS */;
/*!40000 ALTER TABLE `job_batches` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jobs`
--

DROP TABLE IF EXISTS `jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint unsigned NOT NULL,
  `reserved_at` int unsigned DEFAULT NULL,
  `available_at` int unsigned NOT NULL,
  `created_at` int unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jobs`
--

LOCK TABLES `jobs` WRITE;
/*!40000 ALTER TABLE `jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'0001_01_01_000000_create_users_table',1),(2,'0001_01_01_000001_create_cache_table',1),(3,'0001_01_01_000002_create_jobs_table',1),(4,'2025_11_12_143841_create_contacts_table',1),(5,'2025_11_27_163124_add_profile_fields_to_users_table',1),(6,'2025_12_05_124523_create_courses_table',1),(7,'2025_12_07_111020_create_personal_access_tokens_table',1),(8,'2025_12_14_134108_create_registrations_table',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_reset_tokens`
--

DROP TABLE IF EXISTS `password_reset_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_reset_tokens`
--

LOCK TABLES `password_reset_tokens` WRITE;
/*!40000 ALTER TABLE `password_reset_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_reset_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `personal_access_tokens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint unsigned NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`),
  KEY `personal_access_tokens_expires_at_index` (`expires_at`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `personal_access_tokens`
--

LOCK TABLES `personal_access_tokens` WRITE;
/*!40000 ALTER TABLE `personal_access_tokens` DISABLE KEYS */;
INSERT INTO `personal_access_tokens` VALUES (1,'App\\Models\\User',3,'auth_token','9268992f44ede5fc555f74ef47bcceb6a922908cfaa99ee5649c8c21eb5f8b4c','[\"*\"]','2025-12-21 18:19:05',NULL,'2025-12-21 05:42:08','2025-12-21 18:19:05'),(2,'App\\Models\\User',4,'auth_token','fc3fda2b945e76e314000b32fb45c46ba3a5f211f509625bd75f3cfcac6ff193','[\"*\"]',NULL,NULL,'2025-12-21 05:44:16','2025-12-21 05:44:16'),(3,'App\\Models\\User',4,'auth_token','699c59e437910ea27dc2db1fc9f702a981c1d908fa6a891adc6640b28c324980','[\"*\"]',NULL,NULL,'2025-12-21 05:51:42','2025-12-21 05:51:42'),(4,'App\\Models\\User',4,'auth_token','96fbf608a0a03bf7fffb4324709f8d3880ed6ac65623eef37df7c477801d261e','[\"*\"]',NULL,NULL,'2025-12-21 05:57:29','2025-12-21 05:57:29'),(5,'App\\Models\\User',2,'auth_token','9b85bd4af0fddce3cf424754d8b3ab07650919ff0dc5e53103c9b600e5361661','[\"*\"]',NULL,NULL,'2025-12-21 06:00:50','2025-12-21 06:00:50'),(6,'App\\Models\\User',2,'auth_token','ea6e0bb0f37aebc935d39844be2594fddba0ea50409040752ae91040203ff2ff','[\"*\"]','2025-12-21 18:56:14',NULL,'2025-12-21 18:17:40','2025-12-21 18:56:14'),(7,'App\\Models\\User',5,'auth_token','876fdf5320ebf6f444107c2b78f9b4a8270588bcf4cf87e83653b71e8cd7a7a5','[\"*\"]',NULL,NULL,'2025-12-21 18:37:43','2025-12-21 18:37:43');
/*!40000 ALTER TABLE `personal_access_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sessions`
--

DROP TABLE IF EXISTS `sessions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint unsigned DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sessions`
--

LOCK TABLES `sessions` WRITE;
/*!40000 ALTER TABLE `sessions` DISABLE KEYS */;
INSERT INTO `sessions` VALUES ('dYSADTo4ho4BMcsw1rf1mYTWNMEj8icp7kmBT7gE',1,'127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36 Edg/143.0.0.0','YTo0OntzOjY6Il90b2tlbiI7czo0MDoiZXNXNm9Ka2EzNEdaNzlIa3dXZWJUOTVKRXBobjgzdmVocmtwcGhDRiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJuZXciO2E6MDp7fXM6Mzoib2xkIjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MzM6Imh0dHA6Ly9wcm9qZWN0YWtoaXJ3ZWIudGVzdC9hZG1pbiI7czo1OiJyb3V0ZSI7czoxNToiYWRtaW4uZGFzaGJvYXJkIjt9czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTt9',1768057136),('JKnwIhxjcKA2j2WE3ezS6qS99kEv5imVGNs0JGOL',NULL,'127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36 Edg/143.0.0.0','YTozOntzOjY6Il90b2tlbiI7czo0MDoiRFBDanI4bGdHUjBqdkxKNGtOczNQOXNWQWk2ZXRybHRUV0MyYVJORiI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9sb2dpbiI7czo1OiJyb3V0ZSI7czo1OiJsb2dpbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=',1767692391),('PGz4CldTTftZWfzCCOQZuZX0Jrg7xstfmKeWhjhc',NULL,'127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36 Edg/143.0.0.0','YTozOntzOjY6Il90b2tlbiI7czo0MDoiUldzYzgxckJmM0VXS1NEVTFMR1d4bDl0NHZKWjVDUGowWmhHbTdSRCI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6NDU6Imh0dHA6Ly9wcm9qZWN0YWtoaXJ3ZWIudGVzdC9haS1yZWNvbW1lbmRhdGlvbiI7czo1OiJyb3V0ZSI7czoxNzoiYWkucmVjb21tZW5kYXRpb24iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19',1767852734),('PHjGe0zTPy8Intlb0MLTrIPqpV2KVmniDQ2lCfyD',NULL,'127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36 Edg/143.0.0.0','YTozOntzOjY6Il90b2tlbiI7czo0MDoidUZPdGVQNk80WEhOZGl4Uk43TUtNWEZFUUw2dFdqSUhKQjBYd09heCI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly9wcm9qZWN0YWtoaXJ3ZWIudGVzdCI7czo1OiJyb3V0ZSI7czo0OiJob21lIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==',1768056790),('QBPksw4eKFQKpvSrsrk4nzpyEQqkmzcH90QDHZw1',2,'127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36 Edg/143.0.0.0','YTo0OntzOjY6Il90b2tlbiI7czo0MDoiUUxOUzBWSFkzbGEyMG44a1d0T2RtbEZtNmw1dW5yaFBzMUpzUnBuRSI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MzU6Imh0dHA6Ly9wcm9qZWN0YWtoaXJ3ZWIudGVzdC9jb3Vyc2VzIjtzOjU6InJvdXRlIjtzOjEzOiJjb3Vyc2VzLmluZGV4Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6Mjt9',1768120628),('sUA6PpfFsTMIoyf3nsmG31QBq1LGBumX3iJoSYoV',2,'127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36 Edg/143.0.0.0','YTo0OntzOjY6Il90b2tlbiI7czo0MDoiWVc1Y1hldVY0dk9KMFBrQXA3ZUw5cHNZR3FDVjhQNUdWQnMzdjdnaiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJuZXciO2E6MDp7fXM6Mzoib2xkIjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6NDU6Imh0dHA6Ly9wcm9qZWN0YWtoaXJ3ZWIudGVzdC9haS1yZWNvbW1lbmRhdGlvbiI7czo1OiJyb3V0ZSI7czoxNzoiYWkucmVjb21tZW5kYXRpb24iO31zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToyO30=',1767698385),('tQxnNpfEYVDmDedeiu7UT2lsLwOhJHb3hAnLhy7i',2,'127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36 Edg/143.0.0.0','YTo0OntzOjY6Il90b2tlbiI7czo0MDoiNHA0V0JOYk84U1ozTHZHVnA4NjZTdk00YUdCWU9ZNkthVTZJMzBSUCI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MzU6Imh0dHA6Ly9wcm9qZWN0YWtoaXJ3ZWIudGVzdC9jb3Vyc2VzIjtzOjU6InJvdXRlIjtzOjEzOiJjb3Vyc2VzLmluZGV4Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6Mjt9',1767782110),('XrjuaM4LxNC4pjrsu9hWivkDAIdLiM1j5zfeoxgo',NULL,'127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36 Edg/143.0.0.0','YTozOntzOjY6Il90b2tlbiI7czo0MDoiOXA4MG42MWFrYWRWUHNhTjMxZllhT3FXc09iN2NmWFFHdkJJRWg2NyI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6NDU6Imh0dHA6Ly9wcm9qZWN0YWtoaXJ3ZWIudGVzdC9haS1yZWNvbW1lbmRhdGlvbiI7czo1OiJyb3V0ZSI7czoxNzoiYWkucmVjb21tZW5kYXRpb24iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19',1767852734);
/*!40000 ALTER TABLE `sessions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `profile_photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bio` text COLLATE utf8mb4_unicode_ci,
  `address` text COLLATE utf8mb4_unicode_ci,
  `role` enum('user','admin') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'admin','admin@gmail.com',NULL,NULL,NULL,NULL,'admin',NULL,'$2y$12$KNQMMw3s/2fEhr8BqXZY4OVBm6jPp8N03IIW7AK9b25dcTci2aTSe',NULL,'2025-12-21 05:38:29','2025-12-21 05:38:29'),(2,'aficha lhara beliandha','kaafii853@gmail.com',NULL,NULL,NULL,NULL,'user',NULL,'$2y$12$cDPlY0aszEP/pACU.gm9OeoHvO6UZsQlLHyBqlKPgwFhdyP6JpYuW',NULL,'2025-12-21 05:40:18','2025-12-21 06:00:29'),(4,'usman','usmannago@gmail.com',NULL,NULL,NULL,NULL,'user',NULL,'$2y$12$9Knbju.GuiASnEJjZ85JAeeO68Pp7SzAzuVQ6k3ljSIye1JHdFii.',NULL,'2025-12-21 05:44:01','2025-12-21 05:50:38'),(5,'usman1','usman12@gmail.com',NULL,NULL,NULL,NULL,'user',NULL,'$2y$12$9LMrzwqDVuV7tQPgF1DNC.ZbYVjDzS3pY9vpiaETQazhZZKOD67XO',NULL,'2025-12-21 18:37:42','2025-12-21 18:37:42'),(6,'usman','usman@gmail.com',NULL,NULL,NULL,NULL,'user',NULL,'$2y$12$gNzB5SILm66QPr4ZXPMzreQAbS3kmWx1Pk.cKGq0.NAe7S/fYAEJC',NULL,'2026-01-06 01:46:08','2026-01-06 01:46:08');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2026-01-11 15:41:45
