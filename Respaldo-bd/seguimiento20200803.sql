-- MySQL dump 10.13  Distrib 5.6.24, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: seguimiento
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

--
-- Table structure for table `academicadvisers`
--

DROP TABLE IF EXISTS `academicadvisers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `academicadvisers` (
  `academicAdvisor_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nameAcademicAdvisor` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `academicAdvisorEmail` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `advisorPhone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`academicAdvisor_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `academicadvisers`
--

LOCK TABLES `academicadvisers` WRITE;
/*!40000 ALTER TABLE `academicadvisers` DISABLE KEYS */;
INSERT INTO `academicadvisers` VALUES (1,'MTRO. ELIEZER SAMUEL CASTILLO RUIZ','ecastillosam@gmail.com','9831402065','2020-07-23 05:24:33','2020-07-23 05:24:34',NULL);
/*!40000 ALTER TABLE `academicadvisers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `academicdirectors`
--

DROP TABLE IF EXISTS `academicdirectors`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `academicdirectors` (
  `academicDirector_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `academicDivision_id` int(10) unsigned NOT NULL,
  `nameDirector` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nameEmail` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `directorPhone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`academicDirector_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `academicdirectors`
--

LOCK TABLES `academicdirectors` WRITE;
/*!40000 ALTER TABLE `academicdirectors` DISABLE KEYS */;
INSERT INTO `academicdirectors` VALUES (1,1,'MTRO. MARTIN SANTOS','martin@utchetumal.edu.mx','9831402069','2020-07-23 05:23:20','2020-07-23 05:23:21',NULL);
/*!40000 ALTER TABLE `academicdirectors` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `academicdivisions`
--

DROP TABLE IF EXISTS `academicdivisions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `academicdivisions` (
  `academicDivision_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nameDivision` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`academicDivision_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `academicdivisions`
--

LOCK TABLES `academicdivisions` WRITE;
/*!40000 ALTER TABLE `academicdivisions` DISABLE KEYS */;
INSERT INTO `academicdivisions` VALUES (1,'TECNOLOGÍAS DE LA INFORMACIÓN','2020-07-23 05:22:02','2020-07-23 05:22:03',NULL);
/*!40000 ALTER TABLE `academicdivisions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `academiclevels`
--

DROP TABLE IF EXISTS `academiclevels`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `academiclevels` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `acronym` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shortName` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `displayName` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `academiclevels`
--

LOCK TABLES `academiclevels` WRITE;
/*!40000 ALTER TABLE `academiclevels` DISABLE KEYS */;
/*!40000 ALTER TABLE `academiclevels` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `apply_surveys`
--

LOCK TABLES `apply_surveys` WRITE;
/*!40000 ALTER TABLE `apply_surveys` DISABLE KEYS */;
INSERT INTO `apply_surveys` VALUES (1,4,2,NULL,'2020-07-30 20:49:41','2020-07-30 20:49:41');
/*!40000 ALTER TABLE `apply_surveys` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contact_students`
--

LOCK TABLES `contact_students` WRITE;
/*!40000 ALTER TABLE `contact_students` DISABLE KEYS */;
INSERT INTO `contact_students` VALUES (1,2,NULL,NULL,0,NULL,NULL,0,NULL,NULL,NULL,NULL,'2020-07-31 02:02:44','2020-07-31 02:03:11');
/*!40000 ALTER TABLE `contact_students` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `editorialstyles`
--

DROP TABLE IF EXISTS `editorialstyles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `editorialstyles` (
  `editorialAdvisor_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nameEditorialAdvisor` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `editorialAdvisorEmail` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `editorialAdvisorPhone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`editorialAdvisor_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `editorialstyles`
--

LOCK TABLES `editorialstyles` WRITE;
/*!40000 ALTER TABLE `editorialstyles` DISABLE KEYS */;
INSERT INTO `editorialstyles` VALUES (1,'LIC. DANIEL HIERVE','daniel.hierve@utchetumal.edu.mx','9831402059','2020-07-23 05:25:41','2020-07-23 05:25:43',NULL);
/*!40000 ALTER TABLE `editorialstyles` ENABLE KEYS */;
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
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `educative_institutions`
--

LOCK TABLES `educative_institutions` WRITE;
/*!40000 ALTER TABLE `educative_institutions` DISABLE KEYS */;
INSERT INTO `educative_institutions` VALUES (1,'Universidad Tecnológica Chetumal','2020-07-24 02:03:53','2020-07-24 02:03:54',NULL);
/*!40000 ALTER TABLE `educative_institutions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `educativeprogram`
--

DROP TABLE IF EXISTS `educativeprogram`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `educativeprogram` (
  `educativeProgram_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `shortName` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `displayName` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `area` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`educativeProgram_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `educativeprogram`
--

LOCK TABLES `educativeprogram` WRITE;
/*!40000 ALTER TABLE `educativeprogram` DISABLE KEYS */;
INSERT INTO `educativeprogram` VALUES (1,'TSU TI','Técnico Superior Universitario en Tecnologías de la Información y Comunicación','Desarrollo de software multiplataforma y sistemas informáticos',NULL,'2020-07-22 21:36:28','2020-07-22 21:36:29'),(2,'ING TIC','Ingeniería en Tecnologías de la Información y Comunicación','Desarrollo de software multiplataforma y sistemas informáticos',NULL,'2020-07-22 21:36:30','2020-07-22 21:36:32');
/*!40000 ALTER TABLE `educativeprogram` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `enterprises`
--

DROP TABLE IF EXISTS `enterprises`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `enterprises` (
  `enterprise_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `companyName` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `businessName` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `companyPhone` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `representativeName` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `representativePosition` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `businessAdvisorName` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `businessAdvisorEmail` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `businessAdvisorPhone` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `businessContactName` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `businessContactEmail` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `businessContactPhone` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`enterprise_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `enterprises`
--

LOCK TABLES `enterprises` WRITE;
/*!40000 ALTER TABLE `enterprises` DISABLE KEYS */;
INSERT INTO `enterprises` VALUES (1,'SECRETARÍA DE LA CONTRALORÍA','SECRETARÍA DE LA CONTRALORÍA','8350800','RAFAEL DEL POZO DERGAL','SECRETARIO DE LA CONTRALORÍA','LIC. EDUARDO VAZQUEZ SALAZAR','eduardo.vazque@gmail.com','9831402066','MTRO. ELIEZER SAMUEL CASTILLO RUIZ','ecastillosam@gmail.com','9831402065',NULL,'2020-07-21 18:22:53','2020-07-21 18:22:53');
/*!40000 ALTER TABLE `enterprises` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `kinships`
--

DROP TABLE IF EXISTS `kinships`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `kinships` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kinships`
--

LOCK TABLES `kinships` WRITE;
/*!40000 ALTER TABLE `kinships` DISABLE KEYS */;
INSERT INTO `kinships` VALUES (2,'Madre','2020-07-17 06:42:55','2020-07-18 04:53:33'),(3,'Padre','2020-07-18 05:34:07','2020-07-18 05:34:07'),(4,'Tia','2020-07-30 03:34:38','2020-07-30 03:34:38'),(5,'Tio','2020-07-30 03:34:44','2020-07-30 03:34:44'),(6,'Abuelo','2020-07-30 03:34:51','2020-07-30 03:34:51'),(7,'Abuela','2020-07-30 03:34:57','2020-07-30 03:34:57'),(8,'Esposo','2020-07-30 03:35:08','2020-07-30 03:35:08'),(9,'Esposa','2020-07-30 03:35:16','2020-07-30 03:35:16'),(10,'Hermano','2020-07-30 03:35:28','2020-07-30 03:35:28'),(11,'Hermana','2020-07-30 03:35:34','2020-07-30 03:35:34');
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
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2018_12_20_154425_create_roles_table',1),(3,'2018_12_20_154732_create_role_user_table',1),(4,'2020_05_26_154109_create_students_table',1),(5,'2020_05_26_154229_create_surveys_table',1),(6,'2020_07_08_200200_create_kinships_table',1),(7,'2020_07_14_164303_create_survey_questions_table',1),(8,'2020_07_14_170245_create_question_options_table',1),(9,'2020_07_15_062240_crear_enterprise',2),(10,'2020_07_21_020221_create_shift',2),(13,'2020_07_25_092105_create_apply_survey_table',3),(14,'2020_07_25_092127_create_survey_responses_table',4),(18,'2020_07_28_235345_contact_student_table',5),(19,'2020_07_29_173918_state_table',5);
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
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `modalities`
--

LOCK TABLES `modalities` WRITE;
/*!40000 ALTER TABLE `modalities` DISABLE KEYS */;
INSERT INTO `modalities` VALUES (1,'TRADICIONAL','2020-07-24 02:08:44','2020-07-24 02:08:45',NULL);
/*!40000 ALTER TABLE `modalities` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `periods`
--

DROP TABLE IF EXISTS `periods`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `periods` (
  `period_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `firstDay` date DEFAULT NULL,
  `lastDay` date DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`period_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `periods`
--

LOCK TABLES `periods` WRITE;
/*!40000 ALTER TABLE `periods` DISABLE KEYS */;
INSERT INTO `periods` VALUES (4,'enero-abril','2020-01-08','2020-04-16',NULL,NULL),(5,'mayo-agosto','2020-05-02','2020-08-16',NULL,NULL);
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
  `quarterName` tinytext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`quarter_id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `quarters`
--

LOCK TABLES `quarters` WRITE;
/*!40000 ALTER TABLE `quarters` DISABLE KEYS */;
INSERT INTO `quarters` VALUES (1,'1','Primer cuatrimestre','2020-07-24 01:54:48','2020-07-24 01:54:49',NULL),(2,'2','Segundo cuatrimestre','2020-07-24 02:55:01','2020-07-24 02:55:05',NULL),(3,'3','Tercer cuatrimestre','2020-07-24 02:55:01','2020-07-24 02:55:05',NULL),(4,'4','Cuarto cuatrimestre','2020-07-24 02:55:02','2020-07-24 02:55:06',NULL),(5,'5','Quinto cuatrimestre','2020-07-24 02:55:03','2020-07-24 02:55:07',NULL),(6,'6','Sexto cuatrimestre','2020-07-24 02:55:04','2020-07-24 02:55:07',NULL);
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
  `content` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `survey_question_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `question_options_survey_question_id_foreign` (`survey_question_id`),
  CONSTRAINT `question_options_survey_question_id_foreign` FOREIGN KEY (`survey_question_id`) REFERENCES `survey_questions` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=218 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `question_options`
--

LOCK TABLES `question_options` WRITE;
/*!40000 ALTER TABLE `question_options` DISABLE KEYS */;
INSERT INTO `question_options` VALUES (1,'1',NULL,NULL,1),(2,'2',NULL,NULL,1),(3,'3',NULL,NULL,1),(4,'4',NULL,NULL,1),(5,'5',NULL,NULL,1),(6,'1',NULL,NULL,2),(7,'2',NULL,NULL,2),(8,'3',NULL,NULL,2),(9,'4',NULL,NULL,2),(10,'5',NULL,NULL,2),(11,'1',NULL,NULL,3),(12,'2',NULL,NULL,3),(13,'3',NULL,NULL,3),(14,'4',NULL,NULL,3),(15,'5',NULL,NULL,3),(16,'1',NULL,NULL,4),(17,'2',NULL,NULL,4),(18,'3',NULL,NULL,4),(19,'4',NULL,NULL,4),(20,'5',NULL,NULL,4),(21,'1',NULL,NULL,5),(22,'2',NULL,NULL,5),(23,'3',NULL,NULL,5),(24,'4',NULL,NULL,5),(25,'5',NULL,NULL,5),(26,'1',NULL,NULL,6),(27,'2',NULL,NULL,6),(28,'3',NULL,NULL,6),(29,'4',NULL,NULL,6),(30,'5',NULL,NULL,6),(31,'Si',NULL,NULL,7),(32,'Soltero (Incluye divorciado y viudo)',NULL,'2020-07-29 01:54:24',10),(33,'No',NULL,NULL,7),(35,'UNA UNIVERSIDAD TECNOLÓGICA (DISTINTA A DONDE ESTUDIASTE TSU)',NULL,NULL,8),(36,'UNA UNIVERSIDAD TECNOLÓGICA (DISTINTA A DONDE ESTUDIASTE TSU)',NULL,NULL,8),(37,'UNIVERSIDAD PÚBLICA',NULL,NULL,8),(38,'INSTITUTO TECNOLÓGICO',NULL,NULL,8),(39,'UNIVERSIDAD POLITÉCNICA',NULL,NULL,8),(40,'UNAD: UNIVERSIDAD ABIERTA A DISTANCIA',NULL,NULL,8),(41,'UNIVERSIDAD EN EL EXTRANJERO',NULL,NULL,8),(42,'UNIVERSIDAD EN EL EXTRANJERO',NULL,NULL,8),(43,'OTRA',NULL,NULL,8),(107,'Si',NULL,NULL,9),(108,'No',NULL,NULL,9),(110,'Si',NULL,NULL,12),(111,'No',NULL,NULL,12),(150,'1','2020-07-29 00:55:05','2020-07-29 00:55:05',26),(151,'2','2020-07-29 00:55:05','2020-07-29 00:55:05',26),(152,'3','2020-07-29 00:55:05','2020-07-29 00:55:05',26),(153,'4','2020-07-29 00:55:05','2020-07-29 00:55:05',26),(154,'5','2020-07-29 00:55:05','2020-07-29 00:55:05',26),(155,'1','2020-07-29 00:57:49','2020-07-29 00:57:49',27),(156,'2','2020-07-29 00:57:49','2020-07-29 00:57:49',27),(157,'3','2020-07-29 00:57:49','2020-07-29 00:57:49',27),(158,'4','2020-07-29 00:57:49','2020-07-29 00:57:49',27),(159,'5','2020-07-29 00:57:49','2020-07-29 00:57:49',27),(160,'1','2020-07-29 00:58:50','2020-07-29 00:58:50',28),(161,'2','2020-07-29 00:58:50','2020-07-29 00:58:50',28),(162,'3','2020-07-29 00:58:50','2020-07-29 00:58:50',28),(163,'4','2020-07-29 00:58:50','2020-07-29 00:58:50',28),(164,'5','2020-07-29 00:58:50','2020-07-29 00:58:50',28),(165,'1','2020-07-29 01:00:30','2020-07-29 01:00:30',29),(166,'2','2020-07-29 01:00:30','2020-07-29 01:00:30',29),(167,'3','2020-07-29 01:00:30','2020-07-29 01:00:30',29),(168,'4','2020-07-29 01:00:30','2020-07-29 01:00:30',29),(169,'5','2020-07-29 01:00:30','2020-07-29 01:00:30',29),(170,'1','2020-07-29 01:01:09','2020-07-29 01:01:09',30),(171,'2','2020-07-29 01:01:09','2020-07-29 01:01:09',30),(172,'3','2020-07-29 01:01:09','2020-07-29 01:01:09',30),(173,'4','2020-07-29 01:01:10','2020-07-29 01:01:10',30),(174,'5','2020-07-29 01:01:10','2020-07-29 01:01:10',30),(175,'1','2020-07-29 01:01:41','2020-07-29 01:01:41',31),(176,'2','2020-07-29 01:01:41','2020-07-29 01:01:41',31),(177,'3','2020-07-29 01:01:41','2020-07-29 01:01:41',31),(178,'4','2020-07-29 01:01:41','2020-07-29 01:01:41',31),(179,'5','2020-07-29 01:01:41','2020-07-29 01:01:41',31),(180,'Casado o unión libre','2020-07-29 01:54:42','2020-07-29 01:54:42',10),(181,'TSU','2020-07-29 01:56:50','2020-07-29 01:56:50',11),(182,'Licenciatura en alguna UT','2020-07-29 01:57:03','2020-07-29 01:57:03',11),(183,'Posgrado','2020-07-29 01:57:14','2020-07-29 01:57:14',11),(184,'Alguna otra universidad','2020-07-29 01:57:30','2020-07-29 01:57:30',11),(185,'UNA UNIVERSIDAD TECNOLÓGICA (DISTINTA A DONDE ESTUDIASTE TSU)','2020-07-29 02:00:08','2020-07-29 02:00:08',34),(186,'UNIVERSIDAD PÚBLICA','2020-07-29 02:00:18','2020-07-29 02:00:18',34),(187,'UNIVERSIDAD PRIVADA','2020-07-29 02:00:28','2020-07-29 02:00:28',34),(188,'INSTITUTO TECNOLÓGICO','2020-07-29 02:00:35','2020-07-29 02:00:35',34),(189,'UNIVERSIDAD POLITÉCNICA','2020-07-29 02:00:43','2020-07-29 02:00:43',34),(190,'UNAD: UNIVERSIDAD ABIERTA A DISTANCIA','2020-07-29 02:00:53','2020-07-29 02:00:53',34),(191,'UNIVERSIDAD EN EL EXTRANJERO','2020-07-29 02:01:01','2020-07-29 02:01:01',34),(192,'UNIVERSIDAD TECNOLÓGICA DE CHETUMAL','2020-07-29 02:01:10','2020-07-29 02:01:10',34),(193,'OTRO','2020-07-29 02:01:18','2020-07-29 02:01:18',34),(194,'Si','2020-07-29 02:02:25','2020-07-29 02:02:25',35),(195,'No','2020-07-29 02:02:46','2020-07-29 02:02:46',35),(196,'YA ESTABAS TRABAJANDO Y CONTINUASTES HACIÉNDOLO','2020-07-29 02:03:57','2020-07-29 02:03:57',36),(197,'TE CONTRATARON DONDE HICISTE TUS ESTADÍAS','2020-07-29 02:04:07','2020-07-29 02:04:07',36),(198,'NO','2020-07-29 02:04:21','2020-07-29 02:04:21',36),(199,'DE 3 A 6 MESES','2020-07-29 02:04:34','2020-07-29 02:04:34',36),(200,'MÁS DE 6 MESES A UN AÑO','2020-07-29 02:04:42','2020-07-29 02:04:42',36),(201,'MÁS DE UN AÑO','2020-07-29 02:04:57','2020-07-29 02:04:57',36),(202,'NO HAS EMPEZADO A TRABAJAR','2020-07-29 02:05:04','2020-07-29 02:05:04',36),(203,'NO HAS ENCONTRADO EMPLEO CON EL SALARIO QUE PRETENDES','2020-07-29 02:06:04','2020-07-29 02:06:04',37),(204,'NO HAS ENCONTRADO EMPLEO EN EL ÁREA DE TU FORMACIÓN PROFESIONAL','2020-07-29 02:06:11','2020-07-29 02:06:11',37),(205,'NO HAS ENCONTRADO EMPLEO DE NINGÚN TIPO','2020-07-29 02:06:25','2020-07-29 02:06:25',37),(206,'CURSAS LICENCIATURA / INGENIERÍA','2020-07-29 02:06:34','2020-07-29 02:06:34',37),(207,'POR SITUACIONES MÉDICAS','2020-07-29 02:06:43','2020-07-29 02:06:43',37),(208,'TE OCUPAS DE LAS LABORES DEL HOGAR','2020-07-29 02:06:53','2020-07-29 02:06:53',37),(209,'NO HAS BUSCADO EMPLEO','2020-07-29 02:07:01','2020-07-29 02:07:01',37),(210,'RENUNCIASTE A TU EMPLEO PORQUE NO TE CONVENÍA','2020-07-29 02:11:30','2020-07-29 02:11:30',40),(211,'FUISTE DESPEDIDO','2020-07-29 02:11:38','2020-07-29 02:11:38',40),(212,'CERRÓ LA EMPRESA','2020-07-29 02:11:54','2020-07-29 02:11:54',40),(213,'TERMINÓ TU CONTRATO Y NO SE TE RE CONTRATÓ','2020-07-29 02:12:04','2020-07-29 02:12:04',40),(214,'ESTUDIAS ACTUALMENTE','2020-07-29 02:12:22','2020-07-29 02:12:22',40),(215,'SITUACIONES MÉDICAS','2020-07-29 02:12:30','2020-07-29 02:12:30',40),(216,'TE OCUPAS DE LAS LABORES DEL HOGAR','2020-07-29 02:12:39','2020-07-29 02:12:39',40),(217,'NO ESTÁ ACTUALMENTE EN TUS EXPECTATIVAS','2020-07-29 02:12:47','2020-07-29 02:12:47',40);
/*!40000 ALTER TABLE `question_options` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `responsiblelinkings`
--

DROP TABLE IF EXISTS `responsiblelinkings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `responsiblelinkings` (
  `responsibleLinking_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nameResponsible` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `responsiblePosition` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `responsibleEmail` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `responsiblePhone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`responsibleLinking_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `responsiblelinkings`
--

LOCK TABLES `responsiblelinkings` WRITE;
/*!40000 ALTER TABLE `responsiblelinkings` DISABLE KEYS */;
INSERT INTO `responsiblelinkings` VALUES (1,'LIC. ANDREI PEREZ','ENCARGO DE DIRECCIÓN DE VINCULACIÓN','andrei.perez@utchetumal.edu.mx','983142065','2020-07-23 05:27:00','2020-07-23 05:27:01',NULL);
/*!40000 ALTER TABLE `responsiblelinkings` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `role_user`
--

LOCK TABLES `role_user` WRITE;
/*!40000 ALTER TABLE `role_user` DISABLE KEYS */;
INSERT INTO `role_user` VALUES (1,1,1,'2020-06-30 02:27:34','2020-06-30 02:27:34'),(2,2,2,'2020-06-30 02:30:33','2020-06-30 02:30:33'),(3,2,3,NULL,NULL),(4,2,4,NULL,NULL);
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
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
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
INSERT INTO `roles` VALUES (1,'admin','Rol de admnistrador','2020-06-30 02:22:49','2020-06-30 02:22:49'),(2,'alumno','Rol de alumno','2020-06-30 02:23:23','2020-06-30 02:23:23');
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
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `school_origins`
--

LOCK TABLES `school_origins` WRITE;
/*!40000 ALTER TABLE `school_origins` DISABLE KEYS */;
INSERT INTO `school_origins` VALUES (1,'COLEGIO DE BACHILLERES UNO','COBACH UNO','2020-07-24 02:14:25','2020-07-24 02:14:26',NULL);
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
  `displayName` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`shift_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `shifts`
--

LOCK TABLES `shifts` WRITE;
/*!40000 ALTER TABLE `shifts` DISABLE KEYS */;
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `states`
--

LOCK TABLES `states` WRITE;
/*!40000 ALTER TABLE `states` DISABLE KEYS */;
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
  `user_id` int(10) unsigned NOT NULL,
  `institution_id` int(10) unsigned NOT NULL,
  `period_id` int(10) unsigned NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastName` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `motherLastNames` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dateOfBirth` date NOT NULL,
  `enrollment` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quarter_id` int(10) unsigned NOT NULL,
  `socialSecurityNumber` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `accidentInsurance` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `educativeProgram_id` int(10) unsigned NOT NULL,
  `outOfTime` varchar(2) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `schoolOrigin_id` int(10) unsigned NOT NULL,
  `curp` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `institutionalEmail` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `incomeYear` year(4) NOT NULL,
  `modality_id` int(10) unsigned NOT NULL,
  `officePhone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cellPhone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `personalEmail` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`student_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `students`
--

LOCK TABLES `students` WRITE;
/*!40000 ALTER TABLE `students` DISABLE KEYS */;
INSERT INTO `students` VALUES (1,3,1,5,'LUIS EDUARDO','LOPEZ','AKE','1990-06-20','8118110124',6,'23561252585841',NULL,1,'NO',1,'LOPL200820HQRSZL17','8118110124@utchetumal.edu.mx',2016,1,NULL,'9381071605','wsanchez7012@yahoo.com.mx','William Sanchez','2020-07-24 18:22:13','2020-07-29 23:33:27'),(2,4,1,5,'ELIEZER SAMUEL','CASTILLO','RUIZ','1990-06-20','8118110124',6,'23561252585841',NULL,1,'NO',1,'LOPL200820HQRSZL17','8118110125@utchetumal.edu.mx',2016,1,NULL,'9831071605','william.sanchez@utchetumal.edu.mx','William Sanchez','2020-07-24 18:22:13','2020-07-31 02:03:11');
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
  `type_question` smallint(2) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `complement` text CHARACTER SET utf8mb4,
  `required` tinyint(1) NOT NULL,
  `survey_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `survey_questions_survey_id_foreign` (`survey_id`),
  CONSTRAINT `survey_questions_survey_id_foreign` FOREIGN KEY (`survey_id`) REFERENCES `surveys` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `survey_questions`
--

LOCK TABLES `survey_questions` WRITE;
/*!40000 ALTER TABLE `survey_questions` DISABLE KEYS */;
INSERT INTO `survey_questions` VALUES (1,1,'Pregunta 1 Satisfacción','¿La infraestructura física con que fue dotada la universidad, le pareció?','Favor de responder una de las siguientes opciones',0,1,NULL,NULL),(2,1,'Pregunta 2 Satisfacción','¿El equipamiento de los laboratorios y talleres le pareció?','Favor de responder una de las siguientes opciones',0,1,NULL,NULL),(3,1,'Pregunta 3 Satisfacción','¿Los servicios prestados en la Bolsa de Trabajo de la universidad como los considera?','Favor de responder una de las siguientes opciones',0,1,NULL,NULL),(4,1,'Pregunta 1 Satisfacción','¿La infraestructura física con que fue dotada la universidad, le pareció?','Favor de responder una de las siguientes opciones',0,3,NULL,NULL),(5,1,'Pregunta 2 Satisfacción','¿El equipamiento de los laboratorios y talleres le pareció?','Favor de responder una de las siguientes opciones',0,3,NULL,NULL),(6,1,'Pregunta 3 Satisfacción','¿Los servicios prestados en la Bolsa de Trabajo de la universidad como los considera?','Favor de responder una de las siguientes opciones',0,3,NULL,NULL),(7,1,'Pregunta 1 Seguimiento','¿ESTUDIAS ACTUALMENTE?','Favor de responder una de las siguientes opciones',0,2,NULL,NULL),(8,1,'Pregunta 2 Seguimiento','EN QUÉ TIPO DE INSTITUCIÓN ESTUDIAS ACTUALMENTE','Favor de responder una de las siguientes opciones',0,2,NULL,NULL),(9,1,'Pregunta 3 Seguimiento','HAS TRABAJADO ANTERIORMENTE O TRABAJAS ACTUALMENTE.','Favor de responder una de las siguientes opciones',0,2,NULL,NULL),(10,1,'Pregunta 1 Seguimiento','<p>Estado civil</p>','<p>Favor de responder una de las siguientes opciones</p>',0,4,NULL,'2020-07-29 01:55:07'),(11,1,'Pregunta 2 Seguimiento','<p>&Uacute;ltimo nivel de escolaridad completo:</p>','<p>Favor de responder una de las siguientes opciones</p>',0,4,NULL,'2020-07-29 01:58:18'),(12,1,'Pregunta 3 Seguimiento','<p>&iquest;Estudias actualmente?</p>','<p>Favor de responder una de las siguientes opciones</p>',0,4,NULL,'2020-07-29 01:58:57'),(26,1,'Pregunta 4 Satisfacción','<p>&iquest;El nivel de conocimiento y dominio de los temas mostrado por sus profesores al momento de impartirle la c&aacute;tedra le pareci&oacute;?</p>','<p>Favor de responder una de las siguientes opciones</p>',1,3,'2020-07-29 00:55:05','2020-07-29 00:57:17'),(27,1,'Pregunta 5 Satisfacción','<p>&iquest;El nivel de conocimiento y dominio por parte de los profesores en el manejo de los equipos que se encuentran en los laboratorios y talleres al momento de realizar las pr&aacute;cticas que su carrera requiere, lo considera?</p>','<p>Favor de responder una de las siguientes opciones</p>',1,3,'2020-07-29 00:57:49','2020-07-29 00:58:44'),(28,1,'Pregunta 6 Satisfacción','<p>&nbsp;&iquest;La experiencia pr&aacute;ctica adquirida por parte suya, derivado de las visitas, pr&aacute;cticas en las empresas, las considera?</p>','<p>Favor de responder una de las siguientes opciones</p>',1,3,'2020-07-29 00:58:50','2020-07-29 00:59:20'),(29,1,'Pregunta 7 Satisfacción','<p>&nbsp;&iquest;C&oacute;mo considera la preparaci&oacute;n acad&eacute;mica adquirida?</p>','<p>Favor de responder una de las siguientes opciones</p>',1,3,'2020-07-29 01:00:30','2020-07-29 01:01:00'),(30,1,'Pregunta 8 Satisfacción','<p>&iquest;Considera que la estad&iacute;a complement&oacute; su preparaci&oacute;n para el mercado laboral?</p>','<p>Favor de responder una de las siguientes opciones</p>',1,3,'2020-07-29 01:01:09','2020-07-29 01:01:33'),(31,1,'Pregunta 9 Satisfacción','<p>&iquest;C&oacute;mo califica la Continuidad de Estudios de Licenciatura o Ingenier&iacute;a?</p>','<p>Favor de responder una de las siguientes opciones</p>',1,3,'2020-07-29 01:01:41','2020-07-29 01:02:19'),(33,3,'Pregunta 10 Satisfacción','<p>Comentarios para mejorar los servicios:</p>','<p>Tu opinion es importante para mejorar los servicios.</p>',0,3,'2020-07-29 01:05:06','2020-07-29 01:05:06'),(34,1,'Pregunta 4 Seguimiento','<p>En que tipo de instituci&oacute;n estudias</p>',NULL,0,4,'2020-07-29 01:59:51','2020-07-29 01:59:51'),(35,1,'Pregunta 5 Seguimiento','<p>HAS TRABAJADO ANTERIORMENTE O TRABAJAS ACTUALMENTE.</p>',NULL,0,4,'2020-07-29 02:02:16','2020-07-29 02:03:20'),(36,1,'Pregunta 6 Seguimiento','<p>AL CONCLUIR TUS ESTUDIOS EN LA UT &iquest;CU&Aacute;NTO TIEMPO TARDASTE EN ENCONTRAR TU PRIMER EMPLEO, EN EMPEZAR A TRABAJAR &nbsp;POR TU CUENTA O EN UN NEGOCIO FAMILIAR O PROPIO?</p>',NULL,0,4,'2020-07-29 02:03:48','2020-07-29 02:03:48'),(37,1,'Pregunta 7 Seguimiento','<p>DADO QUE NO HAS EMPEZADO A TRABAJAR MARCA LA RAZ&Oacute;N PRINCIPAL PARA ELLO EN LA SIGUIENTE LISTA: (SOLO PARA LOS QUE NO EST&Aacute;N TRABAJANDO)</p>',NULL,0,4,'2020-07-29 02:05:40','2020-07-29 02:05:40'),(38,3,'Pregunta 8 Seguimiento','<p>&iquest;CU&Aacute;NTOS TRABAJOS HAS TENIDO DESDE QUE EGRESASTE DE LA UT?</p>',NULL,0,4,'2020-07-29 02:07:55','2020-07-29 02:07:55'),(39,4,'Pregunta 9 Seguimiento','<p>SI ACTUALMENTE NO TE ENCUENTRAS TRABAJANDO &iquest;CU&Aacute;L FUE EL &Uacute;LTIMO MES Y A&Ntilde;O QUE LABORASTE?</p>',NULL,0,4,'2020-07-29 02:10:11','2020-07-29 02:10:11'),(40,2,'pregunta 10 Seguimiento','<p>MARCA, DE LA SIGUIENTE LISTA, LA RAZ&Oacute;N PRINCIPAL POR LA QUE DEJASTE DE TRABAJAR.</p>',NULL,0,4,'2020-07-29 02:11:03','2020-07-29 02:11:03');
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
  `survey_question_id` int(10) unsigned NOT NULL,
  `response_string` text COLLATE utf8mb4_unicode_ci,
  `response_date` date DEFAULT NULL,
  `question_option_id` int(10) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `survey_responses`
--

LOCK TABLES `survey_responses` WRITE;
/*!40000 ALTER TABLE `survey_responses` DISABLE KEYS */;
INSERT INTO `survey_responses` VALUES (1,10,NULL,NULL,NULL,'2020-07-31 02:03:11','2020-07-31 02:03:11'),(2,11,NULL,NULL,NULL,'2020-07-31 02:03:11','2020-07-31 02:03:11'),(3,12,NULL,NULL,NULL,'2020-07-31 02:03:11','2020-07-31 02:03:11'),(4,34,NULL,NULL,NULL,'2020-07-31 02:03:11','2020-07-31 02:03:11'),(5,35,NULL,NULL,NULL,'2020-07-31 02:03:11','2020-07-31 02:03:11'),(6,36,NULL,NULL,NULL,'2020-07-31 02:03:11','2020-07-31 02:03:11'),(7,37,NULL,NULL,NULL,'2020-07-31 02:03:11','2020-07-31 02:03:11'),(8,38,NULL,NULL,NULL,'2020-07-31 02:03:11','2020-07-31 02:03:11'),(9,39,'1970-01-01',NULL,NULL,'2020-07-31 02:03:11','2020-07-31 02:03:11'),(10,10,NULL,NULL,NULL,'2020-07-31 02:11:21','2020-07-31 02:11:21'),(11,11,NULL,NULL,NULL,'2020-07-31 02:11:21','2020-07-31 02:11:21'),(12,12,NULL,NULL,NULL,'2020-07-31 02:11:21','2020-07-31 02:11:21'),(13,34,NULL,NULL,NULL,'2020-07-31 02:11:21','2020-07-31 02:11:21'),(14,35,NULL,NULL,NULL,'2020-07-31 02:11:21','2020-07-31 02:11:21'),(15,36,NULL,NULL,NULL,'2020-07-31 02:11:21','2020-07-31 02:11:21'),(16,37,NULL,NULL,NULL,'2020-07-31 02:11:21','2020-07-31 02:11:21'),(17,38,NULL,NULL,NULL,'2020-07-31 02:11:21','2020-07-31 02:11:21'),(18,39,'1970-01-01',NULL,NULL,'2020-07-31 02:11:21','2020-07-31 02:11:21');
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
  `displayName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `validation` tinyint(1) NOT NULL,
  `open` tinyint(1) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `active` tinyint(1) DEFAULT '1',
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
INSERT INTO `surveys` VALUES (1,4,'CUESTIONARIO PARA MEDIR LA SATISFACCIÓN DE LOS EGRESADOS DE LA UNIVERSIDAD ','Con el propósito de conocer la opinión de los egresados de Licenciatura o Ingeniería de la Universidad acerca de la atención, servicios y preparación académica que recibieron a lo largo de su permanencia en la institución.',0,NULL,NULL,NULL,1,NULL,NULL),(2,4,'ENCUESTA DE SEGUIMIENTO DE EGRESADOS.','Este cuestionario tiene por objeto recabar información sobre la experiencia laboral y escolar de los egresados de la UT. \n\nSu propósito es llevar a cabo un proceso permanente de revisión de la pertinencia de los planes y programas de estudio respecto a las demandas y requerimientos del mercado laboral. \n\nLas respuestas que tú proporciones son fundamentales para que esta tarea pueda cumplirse sobre la base de un conocimiento de la realidad educativa y ocupacional a la que el egresado se enfrenta. ',1,NULL,NULL,NULL,1,NULL,NULL),(3,5,'CUESTIONARIO PARA MEDIR LA SATISFACCIÓN DE LOS EGRESADOS DE LA UNIVERSIDAD ','Con el propósito de conocer la opinión de los egresados de Licenciatura o Ingeniería de la Universidad acerca de la atención, servicios y preparación académica que recibieron a lo largo de su permanencia en la institución.',0,NULL,NULL,NULL,1,NULL,'2020-07-30 05:11:14'),(4,5,'ENCUESTA DE SEGUIMIENTO DE EGRESADOS.','<p><strong>Este cuestio</strong>nario tiene por objeto recabar informaci&oacute;n sobre la experiencia laboral y escolar de los egresados de la UT. Su prop&oacute;sito es llevar a cabo un proceso permanente de revisi&oacute;n de la pertinencia de los planes y programas de estudio respecto a las demandas y requerimientos del mercado laboral. Las respuestas que t&uacute; proporciones son fundamentales para que esta tarea pueda cumplirse sobre la base de un conocimiento de la realidad educativa y ocupacional a la que el egresado se enfrenta.</p>',1,1,'2020-07-28','2020-08-08',1,NULL,'2020-07-30 20:49:41');
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
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Admin','admin@example.com','$2y$10$6K3lFA.d/nHr0wlrOMZlMuu9.0EmCL9Otc780/tNzkgGGCLQanq9i','cGBQdOVnqHg7WwD7Zni1OVDKrQvhi1sdKjLQlAnh1oJc0okRJcJUQ0v664h7','2020-06-30 07:27:21','2020-06-30 07:27:21'),(2,'Alumno','alumno@example.com','$2y$10$YNId7X8/r9FuUFV5LWus9.IgKziXn8XB3Orsm/K7uRLnH6A9WMkh2','fIpNOsj0UEtkeJY4li5FOzj6KJ3R35zdESQzQMVZ1q3Ov0eowfG9QCMJDUrK','2020-06-30 07:30:21','2020-06-30 07:30:21'),(3,'LUIS EDUARDO LOPEZ AKE','8118110124.TSUTI@utchetumal.edu.mx','$2y$10$fzP3qEKcU8IGg92lBVXhDOOK9PyEaAZk8ALVB8WE3vK9AvDhEOPn.','AWghO1Owmvn5Jzu86VtisTh20ZKfw1jTqLte66EDcBO5B7Oqx7HESB57nkqD','2020-07-24 18:22:13','2020-07-24 18:22:13'),(4,'ELIEZER SAMUEL CASTILLO RUIZ','8118110125.TSUTI@utchetumal.edu.mx','$2y$10$WH6AAtRoRk/7Ep2K7oSDte7X7pjbMnPyV.THt0S4pxGz95kcwHmdW','gOJohRDqrdSwieKncg3Dwx5JhoWilWSe0874FWE6oqXdltxfxNavcpiDycws','2020-07-24 18:22:13','2020-07-24 18:22:13');
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

-- Dump completed on 2020-08-03 10:16:24
