-- MySQL dump 10.17  Distrib 10.3.11-MariaDB, for osx10.14 (x86_64)
--
-- Host: 192.168.10.10    Database: laravel-shop
-- ------------------------------------------------------
-- Server version	5.7.24-0ubuntu0.18.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Dumping data for table `admin_menu`
--

LOCK TABLES `admin_menu` WRITE;
/*!40000 ALTER TABLE `admin_menu` DISABLE KEYS */;
INSERT INTO `admin_menu` VALUES (1,0,1,'首页','fa-bar-chart','/',NULL,NULL,'2019-01-11 18:58:41'),(2,0,7,'系统管理','fa-tasks',NULL,NULL,NULL,'2019-01-17 16:20:59'),(3,2,8,'管理员','fa-users','auth/users',NULL,NULL,'2019-01-17 16:20:59'),(4,2,9,'角色','fa-user','auth/roles',NULL,NULL,'2019-01-17 16:20:59'),(5,2,10,'权限','fa-ban','auth/permissions',NULL,NULL,'2019-01-17 16:20:59'),(6,2,11,'菜单','fa-bars','auth/menu',NULL,NULL,'2019-01-17 16:20:59'),(7,2,12,'操作日志','fa-history','auth/logs',NULL,NULL,'2019-01-17 16:20:59'),(8,0,2,'用户管理','fa-users','/users',NULL,'2019-01-11 19:09:19','2019-01-11 19:09:55'),(10,0,3,'商品管理','fa-cubes','/products',NULL,'2019-01-11 19:30:35','2019-01-11 19:30:49'),(11,0,5,'订单管理','fa-rmb','/orders',NULL,'2019-01-14 09:56:06','2019-01-17 16:20:59'),(12,0,6,'优惠卷管理','fa-tags','/coupon_codes',NULL,'2019-01-14 16:55:58','2019-01-17 16:20:59'),(13,0,4,'类目管理','fa-bars','/categories',NULL,'2019-01-17 16:20:49','2019-01-17 16:20:59');
/*!40000 ALTER TABLE `admin_menu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `admin_permissions`
--

LOCK TABLES `admin_permissions` WRITE;
/*!40000 ALTER TABLE `admin_permissions` DISABLE KEYS */;
INSERT INTO `admin_permissions` VALUES (1,'All permission','*','','*',NULL,NULL),(2,'Dashboard','dashboard','GET','/',NULL,NULL),(3,'Login','auth.login','','/auth/login\r\n/auth/logout',NULL,NULL),(4,'User setting','auth.setting','GET,PUT','/auth/setting',NULL,NULL),(5,'Auth management','auth.management','','/auth/roles\r\n/auth/permissions\r\n/auth/menu\r\n/auth/logs',NULL,NULL),(6,'用户管理','users','','/users*','2019-01-11 19:11:47','2019-01-15 10:30:59'),(7,'商品管理','products','','/products*','2019-01-15 10:00:32','2019-01-15 10:00:32'),(8,'优惠卷管理','coupon_codes','','/coupon_codes*','2019-01-15 10:01:53','2019-01-15 10:01:53'),(9,'订单管理','orders','','/orders*','2019-01-15 10:02:23','2019-01-15 10:02:23');
/*!40000 ALTER TABLE `admin_permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `admin_role_menu`
--

LOCK TABLES `admin_role_menu` WRITE;
/*!40000 ALTER TABLE `admin_role_menu` DISABLE KEYS */;
INSERT INTO `admin_role_menu` VALUES (1,2,NULL,NULL);
/*!40000 ALTER TABLE `admin_role_menu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `admin_role_permissions`
--

LOCK TABLES `admin_role_permissions` WRITE;
/*!40000 ALTER TABLE `admin_role_permissions` DISABLE KEYS */;
INSERT INTO `admin_role_permissions` VALUES (1,1,NULL,NULL),(2,2,NULL,NULL),(2,3,NULL,NULL),(2,4,NULL,NULL),(2,7,NULL,NULL),(2,8,NULL,NULL),(2,9,NULL,NULL),(2,6,NULL,NULL);
/*!40000 ALTER TABLE `admin_role_permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `admin_role_users`
--

LOCK TABLES `admin_role_users` WRITE;
/*!40000 ALTER TABLE `admin_role_users` DISABLE KEYS */;
INSERT INTO `admin_role_users` VALUES (1,1,NULL,NULL),(2,2,NULL,NULL);
/*!40000 ALTER TABLE `admin_role_users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `admin_roles`
--

LOCK TABLES `admin_roles` WRITE;
/*!40000 ALTER TABLE `admin_roles` DISABLE KEYS */;
INSERT INTO `admin_roles` VALUES (1,'Administrator','administrator','2019-01-11 18:55:23','2019-01-11 18:55:23'),(2,'运营','operator','2019-01-11 19:13:14','2019-01-11 19:13:14');
/*!40000 ALTER TABLE `admin_roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `admin_user_permissions`
--

LOCK TABLES `admin_user_permissions` WRITE;
/*!40000 ALTER TABLE `admin_user_permissions` DISABLE KEYS */;
/*!40000 ALTER TABLE `admin_user_permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `admin_users`
--

LOCK TABLES `admin_users` WRITE;
/*!40000 ALTER TABLE `admin_users` DISABLE KEYS */;
INSERT INTO `admin_users` VALUES (1,'admin','$2y$10$p5fIuY8h.8TJkcZI3iodjuPJtGlg9GyhNgotwrUCxaU9PlB1sYkTa','Administrator',NULL,'gv0D0NiC1uz6M127FkaWMe0F4mqyAtqEcCMvnONRxkuflRedYXI3lovK9fVF','2019-01-11 18:55:23','2019-01-11 18:55:23'),(2,'operator','$2y$10$rLCsLaEbXd7iLGOhV6bvj.JFsnmhnJ6mcI2STAt0JgTFerhGtbOMG','运营',NULL,'bC0TB6cJk3nFcjoCu61NaJGWiT1h8Hs7M3ZbBijZojFE6EQk1KWsU8oyvGyf','2019-01-11 19:14:15','2019-01-11 19:14:15');
/*!40000 ALTER TABLE `admin_users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-01-18  0:29:15
