CREATE DATABASE  IF NOT EXISTS `admin_pet` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `admin_pet`;
-- MySQL dump 10.13  Distrib 8.0.35, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: admin_pet
-- ------------------------------------------------------
-- Server version	8.0.35

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `consultas`
--

DROP TABLE IF EXISTS `consultas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `consultas` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `pet_id` bigint unsigned NOT NULL,
  `realizada` date NOT NULL,
  `clinica` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profissional` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `motivo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `diagnostico` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `conduta` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `consultas_pet_id_foreign` (`pet_id`),
  CONSTRAINT `consultas_pet_id_foreign` FOREIGN KEY (`pet_id`) REFERENCES `pets` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `consultas`
--

LOCK TABLES `consultas` WRITE;
/*!40000 ALTER TABLE `consultas` DISABLE KEYS */;
INSERT INTO `consultas` VALUES (1,2,'2024-01-04','Daldeia','Deise G. Fritsch','Dor de ouvido, ouvido com bastante secreção marrom','Otite - Sarna Otodécica','Medicamento, Limpeza diária, Ração Hipoalergênica',NULL,'2024-03-23 21:32:57','2024-03-23 21:40:45'),(2,1,'2022-08-03','AnimalCenter','Geraldo Arnt Correa','Dor de ouvido, ouvido com bastante secreção marrom','Otite - Sarna Otodécica','Medicamento, Limpeza diária',NULL,'2024-03-24 01:09:14','2024-03-24 01:09:14'),(3,1,'2023-03-27','Anivet','Deise G. Fritsch','Dor de ouvido, ouvido com bastante secreção marrom','Otite - Sarna Otodécica','Medicamento, Limpeza diária, Ração Hipoalergênica',NULL,'2024-03-24 01:12:00','2024-03-24 01:12:00');
/*!40000 ALTER TABLE `consultas` ENABLE KEYS */;
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
-- Table structure for table `medicamentos`
--

DROP TABLE IF EXISTS `medicamentos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `medicamentos` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `pet_id` bigint unsigned NOT NULL,
  `categoria` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nome` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dosagem` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `uso` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `obs` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `aplicado` date DEFAULT NULL,
  `repetir` int DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `medicamentos_pet_id_foreign` (`pet_id`),
  CONSTRAINT `medicamentos_pet_id_foreign` FOREIGN KEY (`pet_id`) REFERENCES `pets` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `medicamentos`
--

LOCK TABLES `medicamentos` WRITE;
/*!40000 ALTER TABLE `medicamentos` DISABLE KEYS */;
INSERT INTO `medicamentos` VALUES (1,2,'Desparasitação','Canis Full Spot','11 a 25 Kg','Externo','Combate a sarna otodécica','2024-03-18',35,NULL,'2024-03-22 17:45:04','2024-03-23 15:17:18'),(2,3,'Desparasitação','Symparic','40.00','Interno','Combate a sarna otodécica','2024-03-12',35,NULL,'2024-03-22 20:22:23','2024-03-22 20:56:17'),(3,1,'Vermífugo','Top Dog','250 Mg','Interno',NULL,'2019-03-11',15,NULL,'2024-03-23 01:23:38','2024-03-23 01:53:44'),(4,1,'Vermífugo','Top Dog','250 Mg','Interno',NULL,'2019-03-26',30,NULL,'2024-03-23 01:36:05','2024-03-23 01:55:18'),(5,1,'Vermífugo','Top Dog','500 Mg','Interno',NULL,'2019-06-11',15,NULL,'2024-03-23 01:43:37','2024-03-23 01:55:31'),(6,1,'Vermífugo','Top Dog','500 Mg','Interno',NULL,'2019-06-26',180,NULL,'2024-03-23 01:44:28','2024-03-23 01:55:53'),(7,1,'Desparasitação','Canis Full Spot','11 a 25 Kg','Externo','Pipeta - combate sarna otodécica','2024-01-27',30,NULL,'2024-03-23 01:53:17','2024-03-23 01:53:17'),(8,1,'Desparasitação','Symparic','40 Mg','Interno','Combate a sarna otodécica, Pulgas, Carrapatos...','2024-03-19',35,NULL,'2024-03-23 02:02:05','2024-03-23 02:02:05'),(9,1,'Medicação','Natalene',NULL,'Externo','Aplicar 3 gotas em cada ouvido 2x ao dias, por 21 dias','2022-08-03',NULL,NULL,'2024-03-24 01:10:41','2024-03-24 01:10:41'),(10,1,'Medicação','Posatex Gotas','17,5 ml / 15 g','Externo','Aplicar 4 gotas a cada 24 horas por 14 dias','2023-03-27',NULL,NULL,'2024-03-24 01:13:40','2024-03-24 01:13:40');
/*!40000 ALTER TABLE `medicamentos` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_reset_tokens_table',1),(3,'2019_08_19_000000_create_failed_jobs_table',1),(4,'2019_12_14_000001_create_personal_access_tokens_table',1),(5,'2024_03_17_124505_create_pets_table',1),(6,'2024_03_19_185812_create_pet_photos_table',1),(7,'2024_03_20_142710_create_vacinas_table',1),(8,'2024_03_21_235258_create_medicamentos_table',2),(9,'2024_03_23_124214_create_consultas_table',3);
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
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `personal_access_tokens`
--

LOCK TABLES `personal_access_tokens` WRITE;
/*!40000 ALTER TABLE `personal_access_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `personal_access_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pet_photos`
--

DROP TABLE IF EXISTS `pet_photos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `pet_photos` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `pet_id` bigint unsigned NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `pet_photos_pet_id_foreign` (`pet_id`),
  CONSTRAINT `pet_photos_pet_id_foreign` FOREIGN KEY (`pet_id`) REFERENCES `pets` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pet_photos`
--

LOCK TABLES `pet_photos` WRITE;
/*!40000 ALTER TABLE `pet_photos` DISABLE KEYS */;
/*!40000 ALTER TABLE `pet_photos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pets`
--

DROP TABLE IF EXISTS `pets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `pets` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `especie` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `raca` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cor` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sexo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nascimento` date DEFAULT NULL,
  `tutor` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` bigint unsigned NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `pets_user_id_foreign` (`user_id`),
  CONSTRAINT `pets_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pets`
--

LOCK TABLES `pets` WRITE;
/*!40000 ALTER TABLE `pets` DISABLE KEYS */;
INSERT INTO `pets` VALUES (1,'Marshall','cão','Pug','Abrico','M','2019-01-27','Maria Livia Silva Machado',1,NULL,'2024-03-21 02:02:32','2024-03-23 01:12:37'),(2,'Frederico','pássaro','Calopsita','Cinza e Amarelo','M','2022-01-01','Usuário Teste',2,NULL,'2024-03-21 02:03:52','2024-03-21 02:09:04'),(3,'Romeu','gato','SRD','Preto','M','2021-04-21','Usuário Teste',2,NULL,'2024-03-21 02:04:34','2024-03-21 02:04:34');
/*!40000 ALTER TABLE `pets` ENABLE KEYS */;
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
  `level` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Joy Luiz Gomes da Silva','joyluiz63@gmail.com','user',NULL,'$2y$10$uIK3QcUU5yTDvixQSGiq7O8sQc2pYqHT3W.FKI7dMmjMG2OaXjZIm','tkv8OZ75yEg0UxA6jI0REYyQXxsvcjVZswPEAInlWbuHEqvpMhRtzgEQKxyN','2024-03-21 02:01:57','2024-03-21 02:10:52'),(2,'Usuario Teste','usuario@teste.com','user',NULL,'$2y$10$r6IRK10/BjYSsSiUqDOlGuOPMhuB6UQcsf6tnU5jtfpBoNm5PAQey',NULL,'2024-03-21 02:03:06','2024-03-21 02:03:06'),(3,'Administrador','admin@teste.com','admin',NULL,'$2y$10$tn0NOxtyZW.EeR5czaxy0OwdhcoU0NFc2s4rhtXSxiYoLJf.Ms4MG',NULL,'2024-03-21 02:04:59','2024-03-21 02:04:59');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `vacinas`
--

DROP TABLE IF EXISTS `vacinas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `vacinas` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `pet_id` bigint unsigned NOT NULL,
  `agendada` date DEFAULT NULL,
  `aplicada` date DEFAULT NULL,
  `clinica` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nome` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dose` int NOT NULL,
  `doenca` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `vacinas_pet_id_foreign` (`pet_id`),
  CONSTRAINT `vacinas_pet_id_foreign` FOREIGN KEY (`pet_id`) REFERENCES `pets` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vacinas`
--

LOCK TABLES `vacinas` WRITE;
/*!40000 ALTER TABLE `vacinas` DISABLE KEYS */;
INSERT INTO `vacinas` VALUES (1,2,'2023-01-20','2023-01-20','D\'aldeia','Vanguard Plus',1,'Parvovirose, Mononucleose, edit',NULL,'2024-03-22 21:08:05','2024-03-21 02:12:26','2024-03-22 21:08:05'),(2,2,'2023-01-20','2023-01-20','D\'aldeia','Vanguard Plus',1,'Parvovirose, Mononucleose',NULL,NULL,'2024-03-21 02:16:55','2024-03-21 02:16:55'),(3,2,'2023-01-20','2023-01-20','D\'aldeia','Vanguard Plus',1,'Parvovirose, Mononucleose',NULL,NULL,'2024-03-21 03:02:44','2024-03-21 21:21:30'),(4,2,'2021-07-21','2021-07-21','AnimalCenter','Vanguard Plus',1,'Parvovirose, Mononucleose',NULL,NULL,'2024-03-21 03:06:54','2024-03-21 21:16:48'),(5,2,'2023-01-01','2023-01-01','AnimalCenter','Raiva',1,'Raiva','coelho.png',NULL,'2024-03-21 03:12:53','2024-03-21 21:55:32'),(6,1,'2019-03-13','2019-03-13','D\'aldeia','Vanguard Plus',1,'Cinomose, Adenovirus tipo 2, Parainfluenza, Parvovirus, Coronavírus, Leptospira-canicula',NULL,NULL,'2024-03-21 17:58:42','2024-03-23 01:13:11'),(7,1,'2019-04-03','2019-04-03','D\'aldeia','Vanguard Plus',2,'Cinomose, Adenovirus tipo 2, Parainfluenza, Parvovirus, Coronavírus, Leptospira-canicula',NULL,NULL,'2024-03-21 20:38:37','2024-03-21 20:38:37'),(8,1,'2019-04-24','2019-04-24','D\'aldeia','Vanguard Plus',3,'Cinomose, Adenovirus tipo 2, Parainfluenza, Parvovirus, Coronavírus, Leptospira-canicula',NULL,NULL,'2024-03-21 20:44:27','2024-03-21 20:44:27'),(9,2,'2024-03-07','2024-03-07','AnimalCenter','Vanguard Plus',3,'Parvovirose, Mononucleose',NULL,'2024-03-22 01:53:10','2024-03-21 21:23:08','2024-03-22 01:53:10'),(10,2,'2024-03-06','2024-03-04','AnimalCenter','Vanguard Plus',3,'Parvovirose, Mononucleose',NULL,'2024-03-22 01:44:17','2024-03-21 21:56:01','2024-03-22 01:44:17'),(13,1,'2019-08-05','2019-08-05','D\'aldeia','Defensor - Raiva',1,'Raiva',NULL,NULL,'2024-03-22 01:57:18','2024-03-22 01:57:18');
/*!40000 ALTER TABLE `vacinas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'admin_pet'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-03-23 19:42:41
