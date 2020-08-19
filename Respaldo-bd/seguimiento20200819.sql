-- MySQL dump 10.13  Distrib 5.6.24, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: seguimiento_egresados
-- ------------------------------------------------------
-- Server version	5.7.24

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

use seguimiento;
--
-- Table structure for table `academic_advisers`
--

DROP TABLE IF EXISTS `academic_advisers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `academic_advisers` (
  `academicAdvisor_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nameAcademicAdvisor` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `academicPosition` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `academicAdvisorEmail` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `advisorPhone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`academicAdvisor_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `academic_advisers`
--

LOCK TABLES `academic_advisers` WRITE;
/*!40000 ALTER TABLE `academic_advisers` DISABLE KEYS */;
INSERT INTO `academic_advisers` VALUES (1,'M.D.I.S. Eliezer Samuel Castillo Ruiz','ASESOR ACADÉMICO','eliezer.castillo@utchetumal.edu.mx','9831402065','2020-08-11 22:07:17','2020-08-12 09:54:00',NULL);
/*!40000 ALTER TABLE `academic_advisers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `academic_directors`
--

DROP TABLE IF EXISTS `academic_directors`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `academic_directors` (
  `academicDirector_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `academicDivision_id` int(10) unsigned NOT NULL,
  `nameDirector` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender_id` int(10) unsigned NOT NULL,
  `nameEmail` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `directorPhone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`academicDirector_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `academic_directors`
--

LOCK TABLES `academic_directors` WRITE;
/*!40000 ALTER TABLE `academic_directors` DISABLE KEYS */;
INSERT INTO `academic_directors` VALUES (1,2,'M.A.N. ERWIN ADAME GÓMEZ',1,'conocido@utchetumal.edu.mx','9831402065','2020-08-11 22:03:28','2020-08-11 22:03:28',NULL),(2,1,'M.T. MARTÍN ANTONIO SANTOS ROMERO',1,'conocido@utchetumal.edu.mx','9831402065','2020-08-11 22:04:12','2020-08-11 22:04:12',NULL),(3,3,'M.E. VANESA DEL ROCÍO CABALLERO CERÓN',2,'conocido@utchetumal.edu.mx','9831402065','2020-08-11 22:05:03','2020-08-11 22:05:03',NULL),(4,4,'LIC. GUILLERMO AZCORRA CHAN',1,'conocido@utchetumal.edu.mx','9831402065','2020-08-11 22:06:00','2020-08-12 07:10:56',NULL);
/*!40000 ALTER TABLE `academic_directors` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `academic_divisions`
--

DROP TABLE IF EXISTS `academic_divisions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `academic_divisions` (
  `academicDivision_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nameDivision` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`academicDivision_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `academic_divisions`
--

LOCK TABLES `academic_divisions` WRITE;
/*!40000 ALTER TABLE `academic_divisions` DISABLE KEYS */;
INSERT INTO `academic_divisions` VALUES (1,'TECNOLOGÍAS DE LA INFORMACIÓN Y COMUNICACIÓN','2020-08-11 21:57:49','2020-08-11 21:57:49',NULL),(2,'DESARROLLO E INNOVACIÓN EMPRESARIAL','2020-08-11 21:58:13','2020-08-11 21:58:13',NULL),(3,'MECATRÓNICA','2020-08-11 21:58:29','2020-08-11 21:58:29',NULL),(4,'GASTRONOMÍA','2020-08-11 21:58:41','2020-08-12 09:23:27',NULL);
/*!40000 ALTER TABLE `academic_divisions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `academic_levels`
--

DROP TABLE IF EXISTS `academic_levels`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `academic_levels` (
  `academicLevel_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `acronym` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shortName` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `displayName` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`academicLevel_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `academic_levels`
--

LOCK TABLES `academic_levels` WRITE;
/*!40000 ALTER TABLE `academic_levels` DISABLE KEYS */;
/*!40000 ALTER TABLE `academic_levels` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `apply_surveys`
--

DROP TABLE IF EXISTS `apply_surveys`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `apply_surveys` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `survey_id` int(10) unsigned NOT NULL,
  `student_id` int(10) unsigned NOT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `apply_surveys`
--

LOCK TABLES `apply_surveys` WRITE;
/*!40000 ALTER TABLE `apply_surveys` DISABLE KEYS */;
/*!40000 ALTER TABLE `apply_surveys` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `colors`
--

DROP TABLE IF EXISTS `colors`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `colors` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `colors`
--

LOCK TABLES `colors` WRITE;
/*!40000 ALTER TABLE `colors` DISABLE KEYS */;
INSERT INTO `colors` VALUES (1,'text-red','#f56954',NULL,NULL),(2,'text-green','#00a65a',NULL,NULL),(3,'text-yellow','#f39c12',NULL,NULL),(4,'text-aqua','#00c0ef',NULL,NULL),(5,'text-light-blue','#3c8dbc',NULL,NULL),(6,'text-gray','#d2d6de',NULL,NULL),(7,'text-orange','#ff851b',NULL,NULL),(8,'text-purple','#f012be',NULL,NULL),(9,'text-blue','#0073b7',NULL,NULL),(10,'text-teal','#39cccc',NULL,NULL);
/*!40000 ALTER TABLE `colors` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `contact_students`
--

DROP TABLE IF EXISTS `contact_students`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `contact_students` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `student_id` int(10) unsigned NOT NULL,
  `homePhone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state_id` int(10) unsigned DEFAULT NULL,
  `township` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zip_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kinship_id` int(10) unsigned DEFAULT NULL,
  `name_family` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `homePhone_family` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cellPhone_family` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_family` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contact_students`
--

LOCK TABLES `contact_students` WRITE;
/*!40000 ALTER TABLE `contact_students` DISABLE KEYS */;
/*!40000 ALTER TABLE `contact_students` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `degrees`
--

DROP TABLE IF EXISTS `degrees`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `degrees` (
  `degree_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `degreeName` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`degree_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `degrees`
--

LOCK TABLES `degrees` WRITE;
/*!40000 ALTER TABLE `degrees` DISABLE KEYS */;
INSERT INTO `degrees` VALUES (1,'TIC','Tecnologías de la Información y Comunicación área Sistemas Informáticos','2020-08-11 21:50:04','2020-08-11 21:50:04',NULL),(2,'ITI','Tecnologías de la Información y Comunicación','2020-08-11 21:50:25','2020-08-11 21:50:25',NULL),(3,'IDE','Desarrollo e Innovación Empresarial','2020-08-11 21:51:24','2020-08-11 21:51:24',NULL),(4,'IMECA','Mecatrónica','2020-08-11 21:51:45','2020-08-11 21:51:45',NULL),(5,'DNM','Desarrollo de Negocios área Mercadotecnia','2020-08-11 21:52:06','2020-08-11 21:52:06',NULL),(6,'MECA','Mecatrónica área Sistemas de Manufactura Flexible','2020-08-11 21:52:26','2020-08-11 21:52:26',NULL),(7,'GAS','Gastronomía','2020-08-11 21:52:57','2020-08-11 21:52:57',NULL),(8,'TI','Tecnologías de la Información área Desarrollo de Software Multiplataforma','2020-08-11 21:53:30','2020-08-11 21:53:30',NULL),(9,'INM','Innovación de Negocios y Mercadotecnia','2020-08-11 21:53:53','2020-08-12 08:13:54',NULL);
/*!40000 ALTER TABLE `degrees` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `editorial_stylies`
--

DROP TABLE IF EXISTS `editorial_stylies`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `editorial_stylies` (
  `editorialAdvisor_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nameEditorialAdvisor` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `editorialPosition` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `editorialAdvisorEmail` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `editorialAdvisorPhone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`editorialAdvisor_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `editorial_stylies`
--

LOCK TABLES `editorial_stylies` WRITE;
/*!40000 ALTER TABLE `editorial_stylies` DISABLE KEYS */;
INSERT INTO `editorial_stylies` VALUES (1,'Lic. Daniel Herve Alonzo Medina','ASESOR DE REDACCIÓN Y ESTILO','daniel.hierve@utchetumal.edu.mx','9831402065','2020-08-11 22:12:04','2020-08-12 10:12:15',NULL);
/*!40000 ALTER TABLE `editorial_stylies` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `educative_institutions`
--

DROP TABLE IF EXISTS `educative_institutions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `educative_institutions` (
  `institution_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`institution_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `educative_institutions`
--

LOCK TABLES `educative_institutions` WRITE;
/*!40000 ALTER TABLE `educative_institutions` DISABLE KEYS */;
INSERT INTO `educative_institutions` VALUES (1,'Universidad Tecnológica de Chetumal','2020-08-11 20:36:11','2020-08-13 18:18:54',NULL);
/*!40000 ALTER TABLE `educative_institutions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `educative_programs`
--

DROP TABLE IF EXISTS `educative_programs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `educative_programs` (
  `educativeProgram_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `shortName` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `displayName` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `color_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`educativeProgram_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `educative_programs`
--

LOCK TABLES `educative_programs` WRITE;
/*!40000 ALTER TABLE `educative_programs` DISABLE KEYS */;
INSERT INTO `educative_programs` VALUES (1,'TSU TI','Técnico Superior Universitario en Tecnologías de la Información',1,'2020-08-11 22:00:05','2020-08-11 22:00:05',NULL),(2,'ING TI','Ingeniería en Tecnologías de la Información y Comunicación',2,'2020-08-11 22:00:24','2020-08-11 22:00:24',NULL),(3,'TSU MECATRÓNICA','Técnico Superior Universitario en Mecatrónica',3,'2020-08-11 22:00:46','2020-08-11 22:00:46',NULL),(4,'ING MECATRÓNICA','Ingeniería en Mecatrónica',4,'2020-08-11 22:01:01','2020-08-11 22:01:01',NULL),(5,'TSU MERCADOTECNIA','Técnico Superior Universitario en Desarrollo de Negocios',5,'2020-08-11 22:01:15','2020-08-11 22:01:15',NULL),(6,'ING MERCADOTECNIA','Ingeniería en Desarrollo e Innovación Empresarial',6,'2020-08-11 22:01:27','2020-08-11 22:01:27',NULL),(7,'TSU GASTRONOMÍA','Técnico Superior Universitario en Gastronomía',7,'2020-08-11 22:01:41','2020-08-12 09:42:55',NULL),(8,'ING GASTRONOMÍA','Licenciatura en Gastronomía',8,'2020-08-11 22:01:55','2020-08-12 09:43:37',NULL);
/*!40000 ALTER TABLE `educative_programs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `enterprises`
--

DROP TABLE IF EXISTS `enterprises`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `enterprises` (
  `enterprise_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `companyName` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `businessName` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `companyPhone` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `representativeName` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `representativePosition` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `businessAdvisorName` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `businessAdvisorEmail` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `businessAdvisorPhone` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `businessContactName` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `businessContactEmail` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `businessContactPhone` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `importDate` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`enterprise_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `enterprises`
--

LOCK TABLES `enterprises` WRITE;
/*!40000 ALTER TABLE `enterprises` DISABLE KEYS */;
INSERT INTO `enterprises` VALUES (1,'Universidad Tecnológica de Chetumal','Universidad Tecnológica de Chetumal','9831291765','LIC. OCTAVIO CHÁVEZ GABALDÓN','RECTOR','Lic. Andrei Jesús Pérez Cetina','andrei.perez@utchetumal.edu.mx','9831291765','Ing. Carlos Suriel','carlos.suriel@utchetumal.edu.mx','9831291765','2020-11-08','2020-08-11 20:40:55','2020-08-12 06:59:34',NULL);
/*!40000 ALTER TABLE `enterprises` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `genders`
--

DROP TABLE IF EXISTS `genders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `genders` (
  `gender_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`gender_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `genders`
--

LOCK TABLES `genders` WRITE;
/*!40000 ALTER TABLE `genders` DISABLE KEYS */;
INSERT INTO `genders` VALUES (1,'MASCULINO','2020-08-11 21:55:24','2020-08-14 20:57:00',NULL),(2,'FEMENINO','2020-08-11 21:55:32','2020-08-12 08:35:48',NULL);
/*!40000 ALTER TABLE `genders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `groups`
--

DROP TABLE IF EXISTS `groups`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `groups` (
  `group_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `generation` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`group_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `groups`
--

LOCK TABLES `groups` WRITE;
/*!40000 ALTER TABLE `groups` DISABLE KEYS */;
INSERT INTO `groups` VALUES (1,'6TIAM20','2018-2020','2020-08-11 21:55:58','2020-08-13 01:37:01',NULL);
/*!40000 ALTER TABLE `groups` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jobs`
--

DROP TABLE IF EXISTS `jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `queue` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint(3) unsigned NOT NULL,
  `reserved_at` int(10) unsigned DEFAULT NULL,
  `available_at` int(10) unsigned NOT NULL,
  `created_at` int(10) unsigned NOT NULL,
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
-- Table structure for table `kinships`
--

DROP TABLE IF EXISTS `kinships`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `kinships` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kinships`
--

LOCK TABLES `kinships` WRITE;
/*!40000 ALTER TABLE `kinships` DISABLE KEYS */;
INSERT INTO `kinships` VALUES (2,'Madre','2020-07-17 11:42:55','2020-07-18 09:53:33'),(3,'Padre','2020-07-18 10:34:07','2020-07-18 10:34:07'),(4,'Tia','2020-07-30 08:34:38','2020-07-30 08:34:38'),(5,'Tio','2020-07-30 08:34:44','2020-07-30 08:34:44'),(6,'Abuelo','2020-07-30 08:34:51','2020-07-30 08:34:51'),(7,'Abuela','2020-07-30 08:34:57','2020-07-30 08:34:57'),(8,'Esposo','2020-07-30 08:35:08','2020-07-30 08:35:08'),(9,'Esposa','2020-07-30 08:35:16','2020-07-30 08:35:16'),(10,'Hermano','2020-07-30 08:35:28','2020-07-30 08:35:28'),(12,'Hermano','2020-08-08 06:45:43','2020-08-08 06:46:05');
/*!40000 ALTER TABLE `kinships` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2018_12_20_154425_create_roles_table',1),(3,'2018_12_20_154732_create_role_user_table',1),(4,'2020_05_26_154109_create_students_table',1),(5,'2020_05_26_154229_create_surveys_table',1),(6,'2020_07_08_200200_create_kinships_table',1),(7,'2020_07_14_164303_create_survey_questions_table',1),(8,'2020_07_14_170245_create_question_options_table',1),(9,'2020_07_15_062240_crear_enterprise',1),(10,'2020_07_21_020221_create_shift',1),(11,'2020_07_22_211308_create_educative_program',1),(12,'2020_07_22_211946_create_academic_level',1),(13,'2020_07_23_022403_create_responsible_linking',1),(14,'2020_07_23_031211_create_academic_advisor',1),(15,'2020_07_23_031839_create_editorial_style_advisor',1),(16,'2020_07_23_034006_create_academic_division',1),(17,'2020_07_23_035032_create_academic_director',1),(18,'2020_07_23_041152_create_oficial_document',1),(19,'2020_07_24_012155_create_period',1),(20,'2020_07_24_014838_create_quarter',1),(21,'2020_07_24_020009_create_institution',1),(22,'2020_07_24_020627_create_modality',1),(23,'2020_07_24_021051_create_school_origin',1),(24,'2020_07_25_092105_create_apply_survey_table',1),(25,'2020_07_25_092127_create_survey_responses_table',1),(26,'2020_07_26_052003_create_group',1),(27,'2020_07_28_235345_contact_student_table',1),(28,'2020_07_29_173918_state_table',1),(29,'2020_07_30_192109_create_genders',1),(30,'2020_08_04_115243_create_degree',1),(31,'2020_08_06_160810_create_jobs_table',1),(32,'2020_08_08_113827_create_color_table',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `modalities`
--

DROP TABLE IF EXISTS `modalities`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `modalities` (
  `modality_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `modalityName` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`modality_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `modalities`
--

LOCK TABLES `modalities` WRITE;
/*!40000 ALTER TABLE `modalities` DISABLE KEYS */;
INSERT INTO `modalities` VALUES (1,'BIS','2020-08-11 20:50:32','2020-08-13 18:14:01',NULL),(2,'TRADICIONAL','2020-08-11 20:50:40','2020-08-12 07:44:09',NULL);
/*!40000 ALTER TABLE `modalities` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `official_documents`
--

DROP TABLE IF EXISTS `official_documents`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `official_documents` (
  `oficialDocument_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `student_id` int(10) unsigned NOT NULL,
  `enterprise_id` int(10) unsigned NOT NULL,
  `representativeName` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `representativePosition` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `companyName` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `businessAdvisor` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nameRectorUniversity` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `presentationDate` date NOT NULL,
  `releaseDate` date NOT NULL,
  `startDate` date NOT NULL,
  `endDate` date NOT NULL,
  `hoursStay` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `academicDirector_id` int(10) unsigned NOT NULL,
  `academicAdvisor_id` int(10) unsigned NOT NULL,
  `editorialAdvisor_id` int(10) unsigned NOT NULL,
  `responsibleLinking_id` int(10) unsigned NOT NULL,
  `project` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`oficialDocument_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `official_documents`
--

LOCK TABLES `official_documents` WRITE;
/*!40000 ALTER TABLE `official_documents` DISABLE KEYS */;
INSERT INTO `official_documents` VALUES (1,1,1,'LIC. OCTAVIO CHÁVEZ GABALDÓN','RECTOR','Universidad Tecnológica de Chetumal','Lic. Andrei Jesús Pérez Cetina','LIC. OCTAVIO CHÁVEZ GABALDÓN','2020-05-11','2020-07-27','2020-05-11','2020-08-07','480',2,1,1,1,NULL,'2020-08-13 20:13:21','2020-08-13 20:13:21'),(2,2,1,'LIC. OCTAVIO CHÁVEZ GABALDÓN','RECTOR','Universidad Tecnológica de Chetumal','Lic. Andrei Jesús Pérez Cetina','LIC. OCTAVIO CHÁVEZ GABALDÓN','2020-05-11','2020-07-27','2020-05-11','2020-08-07','480',2,1,1,1,NULL,'2020-08-13 20:13:23','2020-08-13 20:13:23'),(3,3,1,'LIC. OCTAVIO CHÁVEZ GABALDÓN','RECTOR','Universidad Tecnológica de Chetumal','Lic. Andrei Jesús Pérez Cetina','LIC. OCTAVIO CHÁVEZ GABALDÓN','2020-05-11','2020-07-27','2020-05-11','2020-08-07','480',2,1,1,1,NULL,'2020-08-13 20:19:09','2020-08-13 20:19:09'),(4,4,1,'LIC. OCTAVIO CHÁVEZ GABALDÓN','RECTOR','Universidad Tecnológica de Chetumal','Lic. Andrei Jesús Pérez Cetina','LIC. OCTAVIO CHÁVEZ GABALDÓN','2020-05-11','2020-07-27','2020-05-11','2020-08-07','480',2,1,1,1,NULL,'2020-08-13 20:19:09','2020-08-13 20:19:09'),(5,5,1,'LIC. OCTAVIO CHÁVEZ GABALDÓN','RECTOR','Universidad Tecnológica de Chetumal','Lic. Andrei Jesús Pérez Cetina','LIC. OCTAVIO CHÁVEZ GABALDÓN','2020-05-11','2020-07-27','2020-05-11','2020-08-07','480',2,1,1,1,NULL,'2020-08-13 20:19:09','2020-08-13 20:19:09');
/*!40000 ALTER TABLE `official_documents` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `periods`
--

DROP TABLE IF EXISTS `periods`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `periods` (
  `period_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `year` year(4) NOT NULL,
  `firstDay` date NOT NULL,
  `lastDay` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`period_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `periods`
--

LOCK TABLES `periods` WRITE;
/*!40000 ALTER TABLE `periods` DISABLE KEYS */;
INSERT INTO `periods` VALUES (1,'Mayo-Agosto',2020,'2020-05-11','2020-08-07','2020-08-11 21:55:04','2020-08-12 09:10:37',NULL);
/*!40000 ALTER TABLE `periods` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `quarters`
--

DROP TABLE IF EXISTS `quarters`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `quarters` (
  `quarter_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quarterName` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`quarter_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `quarters`
--

LOCK TABLES `quarters` WRITE;
/*!40000 ALTER TABLE `quarters` DISABLE KEYS */;
INSERT INTO `quarters` VALUES (1,'1','Primer cuatrimestre','2020-08-11 20:33:26','2020-08-11 20:33:26',NULL),(2,'2','Segundo cuatrimestre','2020-08-11 20:33:41','2020-08-11 20:33:41',NULL),(3,'3','Tercer cuatrimestre','2020-08-11 20:33:55','2020-08-11 20:33:55',NULL),(4,'4','Cuarto cuatrimestre','2020-08-11 20:34:17','2020-08-11 20:34:17',NULL),(5,'5','Quinto cuatrimestre','2020-08-11 20:34:37','2020-08-11 20:34:37',NULL),(6,'6','Sexto cuatrimestre','2020-08-11 20:34:59','2020-08-13 01:33:06',NULL);
/*!40000 ALTER TABLE `quarters` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `question_options`
--

DROP TABLE IF EXISTS `question_options`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `question_options` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `content` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `survey_question_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `question_options_survey_question_id_foreign` (`survey_question_id`),
  CONSTRAINT `question_options_survey_question_id_foreign` FOREIGN KEY (`survey_question_id`) REFERENCES `survey_questions` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=124 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `question_options`
--

LOCK TABLES `question_options` WRITE;
/*!40000 ALTER TABLE `question_options` DISABLE KEYS */;
INSERT INTO `question_options` VALUES (1,'1',1,NULL,NULL),(2,'2',1,NULL,NULL),(3,'3',1,NULL,NULL),(4,'4',1,NULL,NULL),(5,'5',1,NULL,NULL),(8,'1',2,NULL,NULL),(9,'2',2,NULL,NULL),(10,'3',2,NULL,NULL),(11,'4',2,NULL,NULL),(12,'5',2,NULL,NULL),(15,'1',3,NULL,NULL),(16,'2',3,NULL,NULL),(17,'3',3,NULL,NULL),(18,'4',3,NULL,NULL),(19,'5',3,NULL,NULL),(22,'1',4,NULL,NULL),(23,'2',4,NULL,NULL),(24,'3',4,NULL,NULL),(25,'4',4,NULL,NULL),(26,'5',4,NULL,NULL),(29,'1',5,NULL,NULL),(30,'2',5,NULL,NULL),(31,'3',5,NULL,NULL),(32,'4',5,NULL,NULL),(33,'5',5,NULL,NULL),(36,'1',7,NULL,NULL),(37,'2',7,NULL,NULL),(38,'3',7,NULL,NULL),(39,'4',7,NULL,NULL),(40,'5',7,NULL,NULL),(43,'1',8,NULL,NULL),(44,'2',8,NULL,NULL),(45,'3',8,NULL,NULL),(46,'4',8,NULL,NULL),(47,'5',8,NULL,NULL),(50,'1',9,NULL,NULL),(51,'2',9,NULL,NULL),(52,'3',9,NULL,NULL),(53,'4',9,NULL,NULL),(54,'5',9,NULL,NULL),(57,'Soltero (Incluye divorciado y viudo)',16,NULL,NULL),(58,'Casado o unión libre',16,NULL,NULL),(60,'TSU',17,NULL,NULL),(61,'Licenciatura en alguna UT',17,NULL,NULL),(62,'Posgrado',17,NULL,NULL),(63,'Alguna otra universidad',17,NULL,NULL),(67,'Si',18,NULL,NULL),(68,'No',18,NULL,NULL),(70,'UNA UNIVERSIDAD TECNOLÓGICA (DISTINTA A DONDE ESTUDIASTE TSU)',19,NULL,NULL),(71,'UNIVERSIDAD PÚBLICA',19,NULL,NULL),(72,'UNIVERSIDAD PRIVADA',19,NULL,NULL),(73,'INSTITUTO TECNOLÓGICO',19,NULL,NULL),(74,'UNIVERSIDAD POLITÉCNICA',19,NULL,NULL),(75,'UNAD: UNIVERSIDAD ABIERTA A DISTANCIA',19,NULL,NULL),(76,'UNIVERSIDAD EN EL EXTRANJERO',19,NULL,NULL),(77,'UNIVERSIDAD TECNOLÓGICA DE CHETUMAL',19,NULL,NULL),(78,'OTRO',19,NULL,NULL),(85,'Si',20,NULL,NULL),(86,'No',20,NULL,NULL),(88,'YA ESTABAS TRABAJANDO Y CONTINUASTES HACIÉNDOLO',21,NULL,NULL),(89,'TE CONTRATARON DONDE HICISTE TUS ESTADÍAS',21,NULL,NULL),(90,'NO',21,NULL,NULL),(91,'DE 3 A 6 MESES',21,NULL,NULL),(92,'MÁS DE 6 MESES A UN AÑO',21,NULL,NULL),(93,'MÁS DE UN AÑO',21,NULL,NULL),(94,'NO HAS EMPEZADO A TRABAJAR',21,NULL,NULL),(95,'NO HAS ENCONTRADO EMPLEO CON EL SALARIO QUE PRETENDES',22,NULL,NULL),(96,'NO HAS ENCONTRADO EMPLEO EN EL ÁREA DE TU FORMACIÓN PROFESIONAL',22,NULL,NULL),(97,'NO HAS ENCONTRADO EMPLEO DE NINGÚN TIPO',22,NULL,NULL),(98,'CURSAS LICENCIATURA / INGENIERÍA',22,NULL,NULL),(99,'POR SITUACIONES MÉDICAS',22,NULL,NULL),(100,'TE OCUPAS DE LAS LABORES DEL HOGAR',22,NULL,NULL),(101,'NO HAS BUSCADO EMPLEO',22,NULL,NULL),(102,'RENUNCIASTE A TU EMPLEO PORQUE NO TE CONVENÍA',25,NULL,NULL),(103,'FUISTE DESPEDIDO',25,NULL,NULL),(104,'CERRÓ LA EMPRESA',25,NULL,NULL),(105,'TERMINÓ TU CONTRATO Y NO SE TE RE CONTRATÓ',25,NULL,NULL),(106,'ESTUDIAS ACTUALMENTE',25,NULL,NULL),(107,'SITUACIONES MÉDICAS',25,NULL,NULL),(108,'TE OCUPAS DE LAS LABORES DEL HOGAR',25,NULL,NULL),(109,'NO ESTÁ ACTUALMENTE EN TUS EXPECTATIVAS',25,NULL,NULL),(117,'1',6,NULL,NULL),(118,'2',6,NULL,NULL),(119,'3',6,NULL,NULL),(120,'4',6,NULL,NULL),(121,'5',6,NULL,NULL);
/*!40000 ALTER TABLE `question_options` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `responsible_linkings`
--

DROP TABLE IF EXISTS `responsible_linkings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `responsible_linkings` (
  `responsibleLinking_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nameResponsible` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `responsiblePosition` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `responsibleEmail` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `responsiblePhone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`responsibleLinking_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `responsible_linkings`
--

LOCK TABLES `responsible_linkings` WRITE;
/*!40000 ALTER TABLE `responsible_linkings` DISABLE KEYS */;
INSERT INTO `responsible_linkings` VALUES (1,'Lic. Andrei Jesús Pérez Cetina','DIRECCIÓN DE VINCULACIÓN','andrei.jesus@utchetumal.edu.mx','9831402065','2020-08-11 22:13:07','2020-08-12 10:22:38',NULL);
/*!40000 ALTER TABLE `responsible_linkings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `role_user`
--

DROP TABLE IF EXISTS `role_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `role_user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `role_id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `role_user`
--

LOCK TABLES `role_user` WRITE;
/*!40000 ALTER TABLE `role_user` DISABLE KEYS */;
INSERT INTO `role_user` VALUES (1,1,1,'2020-08-11 15:15:40','2020-08-11 15:15:41');
/*!40000 ALTER TABLE `role_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (1,'admin','Administrador','2020-08-11 15:15:10','2020-08-11 15:15:11'),(2,'alumno','Alumnos','2020-08-11 15:15:12','2020-08-11 15:15:13');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `school_origins`
--

DROP TABLE IF EXISTS `school_origins`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `school_origins` (
  `schoolOrigin_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `schoolName` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shortName` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`schoolOrigin_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `school_origins`
--

LOCK TABLES `school_origins` WRITE;
/*!40000 ALTER TABLE `school_origins` DISABLE KEYS */;
INSERT INTO `school_origins` VALUES (1,'Colegio de Estudios Científicos y Tecnológicos del Estado de Quintana Roo','CECYTE','2020-08-11 21:42:29','2020-08-11 21:42:29',NULL),(2,'Colegio de Bachilleres del Estado de Quintana Roo plantel Chetumal Uno','COBACH','2020-08-11 21:45:53','2020-08-12 07:58:44',NULL);
/*!40000 ALTER TABLE `school_origins` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `shifts`
--

DROP TABLE IF EXISTS `shifts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `shifts` (
  `shift_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`shift_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `shifts`
--

LOCK TABLES `shifts` WRITE;
/*!40000 ALTER TABLE `shifts` DISABLE KEYS */;
INSERT INTO `shifts` VALUES (1,'MATUTINO','2020-08-11 20:45:42','2020-08-11 20:45:42',NULL),(2,'VESPERTINO','2020-08-11 20:45:50','2020-08-13 01:25:23',NULL);
/*!40000 ALTER TABLE `shifts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `states`
--

DROP TABLE IF EXISTS `states`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `states` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `states`
--

LOCK TABLES `states` WRITE;
/*!40000 ALTER TABLE `states` DISABLE KEYS */;
INSERT INTO `states` VALUES (1,'AGUASCALIENTES',NULL,NULL),(2,'BAJA CALIFORNIA',NULL,NULL),(3,'BAJA CALIFORNIA SUR',NULL,NULL),(4,'CAMPECHE',NULL,NULL),(5,'COAHUILA DE ZARAGOZA',NULL,NULL),(6,'COLIMA',NULL,NULL),(7,'CHIAPAS',NULL,NULL),(8,'CHIHUAHUA',NULL,NULL),(9,'DISTRITO FEDERAL',NULL,NULL),(10,'DURANGO',NULL,NULL),(11,'GUANAJUATO',NULL,NULL),(12,'GUERRERO',NULL,NULL),(13,'HIDALGO',NULL,NULL),(14,'JALISCO',NULL,NULL),(15,'MEXICO',NULL,NULL),(16,'MICHOACAN DE OCAMPO',NULL,NULL),(17,'MORELOS',NULL,NULL),(18,'NAYARIT',NULL,NULL),(19,'NUEVO LEON',NULL,NULL),(20,'OAXACA',NULL,NULL),(21,'PUEBLA',NULL,NULL),(22,'QUERETARO DE ARTEAGA',NULL,NULL),(23,'QUINTANA ROO',NULL,NULL),(24,'SAN LUIS POTOSI',NULL,NULL),(25,'SINALOA',NULL,NULL),(26,'SONORA',NULL,NULL),(27,'TABASCO',NULL,NULL),(28,'TAMAULIPAS',NULL,NULL),(29,'TLAXCALA',NULL,NULL),(30,'VERACRUZ',NULL,NULL),(31,'YUCATAN',NULL,NULL),(32,'ZACATECAS',NULL,NULL),(33,'EXTRANJERO',NULL,NULL);
/*!40000 ALTER TABLE `states` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `students`
--

DROP TABLE IF EXISTS `students`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `students` (
  `student_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id` int(10) unsigned NOT NULL,
  `institution_id` int(10) unsigned NOT NULL,
  `period_id` int(10) unsigned NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastName` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `motherLastNames` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender_id` int(10) unsigned NOT NULL,
  `dateOfBirth` date NOT NULL,
  `enrollment` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quarter_id` int(10) unsigned NOT NULL,
  `group_id` int(10) unsigned NOT NULL,
  `shift_id` int(10) unsigned NOT NULL,
  `socialSecurityNumber` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `accidentInsurance` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `educativeProgram_id` int(10) unsigned NOT NULL,
  `outOfTime` varchar(2) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `schoolOrigin_id` int(10) unsigned NOT NULL,
  `curp` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `institutionalEmail` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `incomeYear` year(4) NOT NULL,
  `degree_id` int(10) unsigned NOT NULL,
  `modality_id` int(10) unsigned NOT NULL,
  `officePhone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cellPhone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `personalEmail` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `verified` tinyint(1) DEFAULT NULL,
  `data` text COLLATE utf8mb4_unicode_ci,
  `code` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `importDate` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`student_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `students`
--

LOCK TABLES `students` WRITE;
/*!40000 ALTER TABLE `students` DISABLE KEYS */;
/*!40000 ALTER TABLE `students` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `survey_questions`
--

DROP TABLE IF EXISTS `survey_questions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `survey_questions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `type_question` enum('1','2','3','4') COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `complement` text COLLATE utf8mb4_unicode_ci,
  `required` tinyint(1) NOT NULL,
  `survey_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `survey_questions_survey_id_foreign` (`survey_id`),
  CONSTRAINT `survey_questions_survey_id_foreign` FOREIGN KEY (`survey_id`) REFERENCES `surveys` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `survey_questions`
--

LOCK TABLES `survey_questions` WRITE;
/*!40000 ALTER TABLE `survey_questions` DISABLE KEYS */;
INSERT INTO `survey_questions` VALUES (1,'1','Pregunta 1 Satisfacción','<p>&iquest;La infraestructura f&iacute;sica con que fue dotada la universidad, le pareci&oacute;?</p>','<p>Favor de responder una de las siguientes opciones</p>',1,1,NULL,NULL),(2,'1','Pregunta 2 Satisfacción','<p>&iquest;El equipamiento de los laboratorios y talleres le pareci&oacute;?</p>','<p>Favor de responder una de las siguientes opciones</p>',1,1,NULL,NULL),(3,'1','Pregunta 3 Satisfacción','<p>&iquest;Los servicios prestados en la Bolsa de Trabajo de la universidad como los considera?</p>','<p>Favor de responder una de las siguientes opciones</p>',1,1,NULL,NULL),(4,'1','Pregunta 4 Satisfacción','<p>&iquest;El nivel de conocimiento y dominio de los temas mostrado por sus profesores al momento de impartirle la c&aacute;tedra le pareci&oacute;?</p>','<p>Favor de responder una de las siguientes opciones</p>',1,1,NULL,NULL),(5,'1','Pregunta 5 Satisfacción','<p>&iquest;El nivel de conocimiento y dominio por parte de los profesores en el manejo de los equipos que se encuentran en los laboratorios y talleres al momento de realizar las pr&aacute;cticas que su carrera requiere, lo considera?</p>','<p>Favor de responder una de las siguientes opciones</p>',1,1,NULL,NULL),(6,'1','Pregunta 6 Satisfacción','<p>&nbsp;&iquest;La experiencia pr&aacute;ctica adquirida por parte suya, derivado de las visitas, pr&aacute;cticas en las empresas, las considera?</p>','<p>Favor de responder una de las siguientes opciones</p>',1,1,NULL,NULL),(7,'1','Pregunta 7 Satisfacción','<p>&nbsp;&iquest;C&oacute;mo considera la preparaci&oacute;n acad&eacute;mica adquirida?</p>','<p>Favor de responder una de las siguientes opciones</p>',1,1,NULL,NULL),(8,'1','Pregunta 8 Satisfacción','<p>&iquest;Considera que la estad&iacute;a complement&oacute; su preparaci&oacute;n para el mercado laboral?</p>','<p>Favor de responder una de las siguientes opciones</p>',1,1,NULL,NULL),(9,'1','Pregunta 9 Satisfacción','<p>&iquest;C&oacute;mo califica la Continuidad de Estudios de Licenciatura o Ingenier&iacute;a?</p>','<p>Favor de responder una de las siguientes opciones</p>',1,1,NULL,NULL),(10,'3','Pregunta 10 Satisfacción','<p>Comentarios para mejorar los servicios:</p>','<p>Tu opinion es importante para mejorar los servicios.</p>',0,1,NULL,NULL),(16,'1','Pregunta 1 Seguimiento','<p>Estado civil</p>','<p>Favor de responder una de las siguientes opciones</p>',0,2,NULL,NULL),(17,'1','Pregunta 2 Seguimiento','<p>&Uacute;ltimo nivel de escolaridad completo:</p>','<p>Favor de responder una de las siguientes opciones</p>',0,2,NULL,NULL),(18,'1','Pregunta 3 Seguimiento','<p>&iquest;Estudias actualmente?</p>','<p>Favor de responder una de las siguientes opciones</p>',0,2,NULL,NULL),(19,'1','Pregunta 4 Seguimiento','<p>En que tipo de instituci&oacute;n estudias</p>',NULL,0,2,NULL,NULL),(20,'1','Pregunta 5 Seguimiento','<p>HAS TRABAJADO ANTERIORMENTE O TRABAJAS ACTUALMENTE.</p>',NULL,0,2,NULL,NULL),(21,'1','Pregunta 6 Seguimiento','<p>AL CONCLUIR TUS ESTUDIOS EN LA UT &iquest;CU&Aacute;NTO TIEMPO TARDASTE EN ENCONTRAR TU PRIMER EMPLEO, EN EMPEZAR A TRABAJAR &nbsp;POR TU CUENTA O EN UN NEGOCIO FAMILIAR O PROPIO?</p>',NULL,0,2,NULL,NULL),(22,'1','Pregunta 7 Seguimiento','<p>DADO QUE NO HAS EMPEZADO A TRABAJAR MARCA LA RAZ&Oacute;N PRINCIPAL PARA ELLO EN LA SIGUIENTE LISTA: (SOLO PARA LOS QUE NO EST&Aacute;N TRABAJANDO)</p>',NULL,0,2,NULL,NULL),(23,'3','Pregunta 8 Seguimiento','<p>&iquest;CU&Aacute;NTOS TRABAJOS HAS TENIDO DESDE QUE EGRESASTE DE LA UT?</p>',NULL,0,2,NULL,NULL),(24,'4','Pregunta 9 Seguimiento','<p>SI ACTUALMENTE NO TE ENCUENTRAS TRABAJANDO &iquest;CU&Aacute;L FUE EL &Uacute;LTIMO MES Y A&Ntilde;O QUE LABORASTE?</p>',NULL,0,2,NULL,NULL),(25,'1','pregunta 10 Seguimiento','<p>MARCA, DE LA SIGUIENTE LISTA, LA RAZ&Oacute;N PRINCIPAL POR LA QUE DEJASTE DE TRABAJAR.</p>',NULL,0,2,NULL,NULL);
/*!40000 ALTER TABLE `survey_questions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `survey_responses`
--

DROP TABLE IF EXISTS `survey_responses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `survey_responses` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `apply_survey_id` int(10) unsigned NOT NULL,
  `survey_question_id` int(10) unsigned NOT NULL,
  `response_string` text COLLATE utf8mb4_unicode_ci,
  `response_date` date DEFAULT NULL,
  `question_option_id` int(10) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `survey_responses`
--

LOCK TABLES `survey_responses` WRITE;
/*!40000 ALTER TABLE `survey_responses` DISABLE KEYS */;
/*!40000 ALTER TABLE `survey_responses` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `surveys`
--

DROP TABLE IF EXISTS `surveys`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `surveys` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `period_id` int(10) unsigned NOT NULL,
  `displayName` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `validation` tinyint(1) NOT NULL,
  `open` tinyint(1) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `active` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `surveys`
--

LOCK TABLES `surveys` WRITE;
/*!40000 ALTER TABLE `surveys` DISABLE KEYS */;
INSERT INTO `surveys` VALUES (1,1,'CUESTIONARIO PARA MEDIR LA SATISFACCIÓN DE LOS EGRESADOS DE LA UNIVERSIDAD ','Con el propósito de conocer la opinión de los egresados de Licenciatura o Ingeniería de la Universidad acerca de la atención, servicios y preparación académica que recibieron a lo largo de su permanencia en la institución.',0,NULL,NULL,NULL,1,NULL,'2020-08-11 20:08:21'),(2,1,'ENCUESTA DE SEGUIMIENTO DE EGRESADOS.','<p><strong>Este cuestio</strong>nario tiene por objeto recabar informaci&oacute;n sobre la experiencia laboral y escolar de los egresados de la UT. Su prop&oacute;sito es llevar a cabo un proceso permanente de revisi&oacute;n de la pertinencia de los planes y programas de estudio respecto a las demandas y requerimientos del mercado laboral. Las respuestas que t&uacute; proporciones son fundamentales para que esta tarea pueda cumplirse sobre la base de un conocimiento de la realidad educativa y ocupacional a la que el egresado se enfrenta.</p>',1,NULL,NULL,NULL,1,NULL,'2020-08-19 14:34:40');
/*!40000 ALTER TABLE `surveys` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Admin','admin@example.com','$2y$10$jNBwyQ0qPSBlI6G8KPlYNuPuxx/EHMaGzuwFOmpKdbqHiNeZ0OisG','QfxE8VUf8fqIl9t9DdXWTCFeFDdtbJPP0aaKNysTcC76Dyr69XSMMqesH1qJ','2020-08-11 20:09:08','2020-08-11 20:09:08');
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

-- Dump completed on 2020-08-19 11:39:03
