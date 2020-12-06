/*
SQLyog Ultimate v11.11 (64 bit)
MySQL - 5.7.24 : Database - tiendita
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`tiendita` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `tiendita`;

/*Table structure for table `categorias` */

DROP TABLE IF EXISTS `categorias`;

CREATE TABLE `categorias` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `categoria` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `categorias` */

insert  into `categorias`(`id`,`categoria`,`icon`,`created_at`,`updated_at`) values (1,'Celulares y Telefonia','fas fa-mobile-alt','2020-09-08 19:19:42','2020-09-08 19:19:42'),(2,'Computacion','fas fa-desktop','2020-09-08 19:19:42','2020-09-08 19:19:42'),(3,'Belleza y Cuidado Personal','fas fa-hand-holding-medical','2020-09-08 19:19:42','2020-09-08 19:19:42'),(4,'Autos, Motos y Otros','fas fa-car','2020-09-08 19:19:42','2020-09-08 19:19:42'),(5,'Consolas y Videojuegos','fas fa-gamepad','2020-09-08 19:19:42','2020-09-08 19:19:42'),(6,'Electrodomesticos','fas fa-blender','2020-09-08 19:19:42','2020-09-08 19:19:42'),(7,'Camaras y Accesorios','fas fa-camera-retro','2020-09-08 19:19:42','2020-09-08 19:19:42'),(8,'Agro','fas fa-tractor','2020-09-08 19:19:42','2020-09-08 19:19:42'),(9,'Animales y Mascotas','fas fa-paw','2020-09-08 19:19:42','2020-09-08 19:19:42'),(10,'Arte','far fa-hourglass','2020-09-08 19:19:42','2020-09-08 19:19:42'),(11,'Accesorios para Vehiculos','fas fa-tachometer-alt','2020-09-08 19:19:42','2020-09-08 19:19:42'),(12,'Alimentos y Bebidas','fas fa-utensils','2020-09-08 19:19:42','2020-09-08 19:19:42');

/*Table structure for table `compras` */

DROP TABLE IF EXISTS `compras`;

CREATE TABLE `compras` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `producto_id` bigint(20) unsigned NOT NULL,
  `user_id` bigint(20) unsigned NOT NULL,
  `cantidad` int(3) NOT NULL,
  `precio_envio` double(8,3) NOT NULL,
  `tot_compra` double(10,3) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `compras_producto_id_index` (`producto_id`),
  KEY `compras_user_id_index` (`user_id`),
  CONSTRAINT `compras_producto_id_foreign` FOREIGN KEY (`producto_id`) REFERENCES `productos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `compras_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=8778736 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `compras` */

insert  into `compras`(`id`,`producto_id`,`user_id`,`cantidad`,`precio_envio`,`tot_compra`,`created_at`,`updated_at`) values (1,2,2,0,0.000,0.000,NULL,NULL),(2,2441883,1,0,0.000,0.000,NULL,NULL),(4001953,5,1,1,5.000,195.220,'2020-11-29 02:55:03','2020-11-29 02:55:03'),(6877002,5,1,1,5.000,195.220,'2020-11-28 01:45:37','2020-11-28 01:45:37'),(8778735,5,1,2,5.000,385.440,'2020-11-28 01:42:38','2020-11-28 01:42:38');

/*Table structure for table `encuestas` */

DROP TABLE IF EXISTS `encuestas`;

CREATE TABLE `encuestas` (
  `id` bigint(15) unsigned NOT NULL AUTO_INCREMENT,
  `respuesta` enum('si','no') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `encuestas` */

/*Table structure for table `envio_users` */

DROP TABLE IF EXISTS `envio_users`;

CREATE TABLE `envio_users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `envio_users` */

/*Table structure for table `envios` */

DROP TABLE IF EXISTS `envios`;

CREATE TABLE `envios` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `metodo` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `envios` */

insert  into `envios`(`id`,`metodo`,`created_at`,`updated_at`) values (1,'a convenir con el vendedor',NULL,NULL),(2,'a domicilio',NULL,NULL),(3,'local comercial',NULL,NULL),(4,'gratis',NULL,NULL);

/*Table structure for table `failed_jobs` */

DROP TABLE IF EXISTS `failed_jobs`;

CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `failed_jobs` */

/*Table structure for table `favoritos` */

DROP TABLE IF EXISTS `favoritos`;

CREATE TABLE `favoritos` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `producto_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `favoritos_user_id_index` (`user_id`),
  KEY `favoritos_producto_id_foreign` (`producto_id`),
  CONSTRAINT `favoritos_producto_id_foreign` FOREIGN KEY (`producto_id`) REFERENCES `productos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `favoritos_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `favoritos` */

insert  into `favoritos`(`id`,`user_id`,`producto_id`,`created_at`,`updated_at`) values (4,2,3,NULL,NULL),(6,2,2,'2020-10-24 23:03:44','2020-10-24 23:03:44'),(48,1,2,'2020-11-04 02:08:48','2020-11-04 02:08:48'),(49,1,495560,'2020-11-27 15:30:50','2020-11-27 15:30:50'),(51,1,4,'2020-12-05 18:17:36','2020-12-05 18:17:36');

/*Table structure for table `images` */

DROP TABLE IF EXISTS `images`;

CREATE TABLE `images` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `url` varchar(300) DEFAULT NULL,
  `producto_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `images_productos_id_foreign` (`producto_id`),
  CONSTRAINT `images_productos_id_foreign` FOREIGN KEY (`producto_id`) REFERENCES `productos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=419 DEFAULT CHARSET=latin1;

/*Data for the table `images` */

insert  into `images`(`id`,`url`,`producto_id`,`created_at`,`updated_at`) values (149,'/storage/imagenes/pItq8nwBVLsAo0SdVbjRs76x2elu3lLLPDNR7uIO.jpeg',1,'2020-11-04 01:49:14','2020-11-04 01:49:14'),(157,'/storage/imagenes/BO5XuYPbvZuISBSL5u13qFLQMspuQMmMc0z0zmPn.png',2,'2020-11-04 01:57:21','2020-11-04 01:57:21'),(158,'/storage/imagenes/8dCuIA1kZ4TVHAw2xmqpki9lL8xAasv9tvQ2wUqv.png',2,'2020-11-04 01:57:29','2020-11-04 01:57:29'),(159,'/storage/imagenes/Oe10mJ4p7SkskFY84RDWi9dV7lW7J0Mtmsmjwcz8.jpeg',3,'2020-11-04 01:59:55','2020-11-04 01:59:55'),(160,'/storage/imagenes/y88ujGeBaJtSmrAeg82wv19odMxBNxRjj55WJkM4.jpeg',3,'2020-11-04 02:00:06','2020-11-04 02:00:06'),(161,'/storage/imagenes/pOpyWIM8K7VLARUK4sTC9Psh4EDAqaCrhhqsghcd.jpeg',4,'2020-11-04 02:02:12','2020-11-04 02:02:12'),(162,'/storage/imagenes/Mtc88SuRElMAGLqjOeZPi3GqWz1rTY5brFPjUY55.jpeg',4,'2020-11-04 02:02:17','2020-11-04 02:02:17'),(163,'/storage/imagenes/what4efjLAZqxMagsjezMO1hae09S4Hdc0SqMN3T.jpeg',4,'2020-11-04 02:02:17','2020-11-04 02:02:17'),(164,'/storage/imagenes/mVO6D14GOqA740zzeQV9DWqW1lf4Plrp2God0FmJ.jpeg',5,'2020-11-04 02:03:22','2020-11-04 02:03:22'),(165,'/storage/imagenes/n3CcaL3N2gWRYoVSCxpEYwxjSP4gMeNloK3GXLZE.png',2441883,'2020-11-04 02:12:36','2020-11-04 02:12:36'),(166,'/storage/imagenes/8CLxK3pg4zXEOzMmO0r7s3mIrwCNK8tTywvG9krH.jpeg',8541576,'2020-11-04 02:29:10','2020-11-04 02:29:10'),(410,'/storage/imagenes/2Wn1fxVd5pM8z7X7qArd30z4a1zvHFCIIsi64WCe.png',495560,'2020-11-27 15:23:00','2020-11-27 15:23:00'),(411,'/storage/imagenes/Ztc89j9mUO9kNl4kl4NaqlWBpY7dy9XwdZMpwORH.png',495560,'2020-11-27 15:23:00','2020-11-27 15:23:00'),(413,'/storage/imagenes/O3G1W1bIbJTcvibdITPPOdFEfawQD2LOR8JJXnRV.png',495560,'2020-11-27 15:23:08','2020-11-27 15:23:08'),(415,'/storage/imagenes/rcnsypkYlaM7VcMyT4Fr9ofbAe509jzH86ZjLtX8.png',1430989,'2020-11-28 22:22:17','2020-11-28 22:22:17'),(416,'/storage/imagenes/TFmBRXcxwHNjNVi78OjkKCqAQbd2gylfieJodcZb.png',1430989,'2020-11-28 22:22:17','2020-11-28 22:22:17'),(417,'/storage/imagenes/5sl6tyMVKcmnfbufjddfJuJVTyN2aiVo2uh3mQy7.png',1430989,'2020-11-28 22:22:17','2020-11-28 22:22:17'),(418,'/storage/imagenes/R8580djCpiAQwnKqWdny2ylkBqLJcfKIApT7ubta.png',1430989,'2020-11-28 22:22:32','2020-11-28 22:22:32');

/*Table structure for table `migrations` */

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `migrations` */

insert  into `migrations`(`id`,`migration`,`batch`) values (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1),(3,'2019_08_19_000000_create_failed_jobs_table',1),(4,'2020_08_17_174531_create_compras_table',1),(5,'2020_08_17_175300_create_ventas_table',1),(6,'2020_08_17_175432_create_transaccions_table',1),(7,'2020_08_17_180107_create_opinions_table',1),(8,'2020_08_17_182320_create_productos_table',1),(9,'2020_08_17_184244_create_categorias_table',1),(10,'2020_08_17_184421_create_preguntas_table',1),(11,'2020_08_17_185147_create_respuestas_table',1),(12,'2020_08_17_195701_create_pagos_table',1),(13,'2020_08_17_200116_create_envios_table',1),(14,'2020_08_17_200439_create_favoritos_table',1),(15,'2020_08_17_202628_create_provincias_table',1),(16,'2020_08_17_214807_create_permission_tables',1),(17,'2016_06_01_000001_create_oauth_auth_codes_table',2),(18,'2016_06_01_000002_create_oauth_access_tokens_table',2),(19,'2016_06_01_000003_create_oauth_refresh_tokens_table',2),(20,'2016_06_01_000004_create_oauth_clients_table',2),(21,'2016_06_01_000005_create_oauth_personal_access_clients_table',2),(22,'2020_09_11_024306_create_pago_users_table',2),(23,'2020_09_11_024507_create_envio_users_table',2);

/*Table structure for table `model_has_permissions` */

DROP TABLE IF EXISTS `model_has_permissions`;

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) unsigned NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `model_has_permissions` */

/*Table structure for table `model_has_roles` */

DROP TABLE IF EXISTS `model_has_roles`;

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) unsigned NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `model_has_roles` */

insert  into `model_has_roles`(`role_id`,`model_type`,`model_id`) values (1,'App\\User',1),(4,'App\\User',2);

/*Table structure for table `oauth_access_tokens` */

DROP TABLE IF EXISTS `oauth_access_tokens`;

CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `client_id` bigint(20) unsigned NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_access_tokens_user_id_index` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `oauth_access_tokens` */

insert  into `oauth_access_tokens`(`id`,`user_id`,`client_id`,`name`,`scopes`,`revoked`,`created_at`,`updated_at`,`expires_at`) values ('0206a4c49b094686e52eee904959e678f7a1c81ea520b8adb765d0321c4443b658031f28243b76d0',18,1,'Personal Access Token','[]',0,'2020-11-21 23:39:38','2020-11-21 23:39:38','2021-11-21 23:39:38'),('0a80c0568b6dde4fe662bf15b8e1f8ce7ee494a035518d5b8d7f9b8f4cd35a2a554678f93d421195',18,1,'Personal Access Token','[]',0,'2020-11-26 01:59:27','2020-11-26 01:59:27','2021-11-26 01:59:27'),('0ac2d5db9b95f4004d00f4d0be24074bcb87abc8ccd4b7fdd3a7a68f91d03252d4705448c473594a',18,1,'Personal Access Token','[]',0,'2020-11-26 01:25:28','2020-11-26 01:25:28','2021-11-26 01:25:28'),('0ca99a08e821549740883e7eab425728e46c653f8dff4105b24bf29c9478a521f8967a4c4d144da0',18,1,'Personal Access Token','[]',0,'2020-11-22 21:24:32','2020-11-22 21:24:32','2021-11-22 21:24:32'),('0ccfe1912d468ee617b9c39a00f594ef92367fcb594120b4a8983c4cf9a2b25ac2e85b7628a3fcf4',18,1,'Personal Access Token','[]',0,'2020-11-22 16:01:17','2020-11-22 16:01:17','2021-11-22 16:01:17'),('167062560fbe71408eb1aba52733d1b182a1fe8ba4b3d3152cdaa8599ccc502befe94e58d9f27abe',18,1,'Personal Access Token','[]',0,'2020-11-22 21:22:05','2020-11-22 21:22:05','2021-11-22 21:22:05'),('22ce068e601d195c5ac8e757b71cab4dbcc74c40c37f57fa63ba2ea52e8bee0ad819ad22897ede72',18,1,'Personal Access Token','[]',0,'2020-11-22 15:54:10','2020-11-22 15:54:10','2021-11-22 15:54:10'),('264befcb5eae61e2f73cbf49cda2b1630542c39ef24b7ab6aa32947281f147e2f663795c1e1358f4',18,1,'Personal Access Token','[]',0,'2020-11-26 01:29:49','2020-11-26 01:29:49','2021-11-26 01:29:49'),('2a94c90e9f871173694b983ad8dbb411d2c000137c7844245e7ab32836fe6e558de2d9a4bf9506fe',18,1,'Personal Access Token','[]',0,'2020-11-22 21:22:05','2020-11-22 21:22:05','2021-11-22 21:22:05'),('2db9a131263f19a6fea5952639fc9428c6d9d449fd444919c9ec67543fcb20e0009d6f059bda80c0',18,1,'Personal Access Token','[]',0,'2020-11-22 16:09:16','2020-11-22 16:09:16','2021-11-22 16:09:16'),('33ccea268c9123322c0a1ee2e0478f8aef2952c5298c1941aaa8a28cb96d78ff572b414024fa674f',18,1,'Personal Access Token','[]',0,'2020-11-22 16:05:35','2020-11-22 16:05:35','2021-11-22 16:05:35'),('444822a90fea116260ee4b10363710c747cd877aff17e5310b6eb88bb2ee16435397e2ecb3cd64fe',18,1,'Personal Access Token','[]',0,'2020-11-22 21:22:05','2020-11-22 21:22:05','2021-11-22 21:22:05'),('4c844314d8c02f8430a820f9638119ed4ab01c250c29feef661a1885e1fb1cb8eeb28bae80192cbc',18,1,'Personal Access Token','[]',0,'2020-11-22 16:08:50','2020-11-22 16:08:50','2021-11-22 16:08:50'),('55a8ae3384325ecfb62c19f020106b3af3392e8d8a202b37c17d9725e1db4b92c03212b3be3713fc',18,1,'Personal Access Token','[]',0,'2020-11-26 01:56:59','2020-11-26 01:56:59','2021-11-26 01:56:59'),('58c76135ce5666da8461d5b532f939f65d84257d42be45d40259c01d00cd74a60083b347f54909d3',18,1,'Personal Access Token','[]',0,'2020-11-15 23:06:03','2020-11-15 23:06:03','2021-11-15 23:06:03'),('6694766f917fe68cf9787ea27b189552d24c64522eb97ceab89ea18f776c84defe565d2f81dcd9d1',18,1,'Personal Access Token','[]',0,'2020-11-22 15:55:28','2020-11-22 15:55:28','2021-11-22 15:55:28'),('689fe503ca4a645cb3dbdf52e8e4e450570ec4c8f6e8da6773a067f17e9e074c9f411ce266d98585',18,1,'Personal Access Token','[]',0,'2020-11-21 23:36:35','2020-11-21 23:36:35','2021-11-21 23:36:35'),('68b15c4c00084a21388a2639f5c6aac8077cd9191cda40639eddfdd7ae089eb1393ce28ac1f2ae09',18,1,'Personal Access Token','[]',0,'2020-11-22 16:06:45','2020-11-22 16:06:45','2021-11-22 16:06:45'),('6f13130c416bf3321f527815007ea7d934d47ec055e5b0d559aa8063d288dca7b93acf4ee76cd988',18,1,'Personal Access Token','[]',0,'2020-11-22 21:22:05','2020-11-22 21:22:05','2021-11-22 21:22:05'),('70cf215967c2d4e0912f8b90904fcfbcc0ffc12b3bae469a2afba275a5ed027b242f1ef1e3aae195',18,1,'Personal Access Token','[]',0,'2020-11-27 15:12:23','2020-11-27 15:12:23','2021-11-27 15:12:23'),('7657ebfc6280b981e6960bb9250ce275b0894d29298ae40670da6c04cf228a7e586f2a404dcf341a',18,1,'Personal Access Token','[]',0,'2020-11-22 21:22:07','2020-11-22 21:22:07','2021-11-22 21:22:07'),('77df5bee3c37246745bc02b44661413dcc7b9b8a487c5474f800bfdac09df8346b20bb588756b151',18,1,'Personal Access Token','[]',0,'2020-11-22 01:26:49','2020-11-22 01:26:49','2021-11-22 01:26:49'),('782c813dd1dbdcce3cb01ba44643bb4afd555b0d287ad0e3285ed319ab378e88d46e027748402735',18,1,'Personal Access Token','[]',0,'2020-11-22 23:51:58','2020-11-22 23:51:58','2021-11-22 23:51:58'),('868b9c2bd55ca50b757248bdf47f28200c640ceaf68fa1e7f83e06de732e3678ce128bf307946893',18,1,'Personal Access Token','[]',0,'2020-11-21 23:40:52','2020-11-21 23:40:52','2021-11-21 23:40:52'),('9010aa19eb7974e3882594d9733a8bd0518b512356e3a22b5d2e17b7dd23ec3d26d18d83a23ac47f',18,1,'Personal Access Token','[]',0,'2020-11-22 19:24:23','2020-11-22 19:24:23','2021-11-22 19:24:23'),('91d631392c4898eb10052e482424a2ce9109355bcb566b149f6cdfc1dc915cbda8ad4b8ad26ad98a',18,1,'Personal Access Token','[]',0,'2020-11-22 22:49:13','2020-11-22 22:49:13','2021-11-22 22:49:13'),('924c61d0074a32986506ca1bb3077f5873c5215a366ba43fa793b360ca6186e732c9e95e3bf4fce4',18,1,'Personal Access Token','[]',0,'2020-11-22 23:55:54','2020-11-22 23:55:54','2021-11-22 23:55:54'),('94cf499e37f2a7ed24c194496bbb0c7d79c826e493db3541720e66fe0f3f3d81ff3c611bf7c4e84c',18,1,'Personal Access Token','[]',0,'2020-11-15 23:06:46','2020-11-15 23:06:46','2021-11-15 23:06:46'),('9e66774aad77733cf4e713607aaa4f3c4b76758b8afc115966409ed7100f38d07e490bfa293579c8',18,1,'Personal Access Token','[]',0,'2020-11-26 01:31:41','2020-11-26 01:31:41','2021-11-26 01:31:41'),('9fdf34c26b1d5a0daa8d435825c347ca01e228f7b6a3f0927eeb42168e420d52555c3703acd277a5',18,1,'Personal Access Token','[]',0,'2020-11-22 16:10:56','2020-11-22 16:10:56','2021-11-22 16:10:56'),('a0f771699d499f5c551d89cbf4f31a1569a7ffbc9b88fba25696197961a26897cc4375f117f1e7da',18,1,'Personal Access Token','[]',0,'2020-11-22 19:18:50','2020-11-22 19:18:50','2021-11-22 19:18:50'),('a7d0d9ec3dbf3b40311b796aff12e35339f79b21a56376290d46d0c5e3f50e93a69501980d78b15c',18,1,'Personal Access Token','[]',0,'2020-11-22 15:49:30','2020-11-22 15:49:30','2021-11-22 15:49:30'),('a7d4463fd4058eb217e10bd8dcf911b8f1d16cc3a1725aad726e5fe9587f160ae86cf8f07bb1e8b2',18,1,'Personal Access Token','[]',0,'2020-11-23 00:58:34','2020-11-23 00:58:34','2021-11-23 00:58:34'),('aa21eb1eaf16330b61265626b2d43ea80c1fdf3943b21186867d9c70a6c67bb5e3007d8808a085d3',18,1,'Personal Access Token','[]',0,'2020-11-26 02:03:07','2020-11-26 02:03:07','2021-11-26 02:03:07'),('b78a3dca12d5f1f392e42e2c4d82445a39197e4a945ea84b920439e75bcafde12ffad43cf35ff1f3',18,1,'Personal Access Token','[]',0,'2020-11-15 23:10:03','2020-11-15 23:10:03','2021-11-15 23:10:03'),('b870942f5002add54ba89e5b9a64bd8ced3195f15b98f79a4b3557b9435775c75c505f362e6e1ab7',18,1,'Personal Access Token','[]',0,'2020-11-22 16:02:25','2020-11-22 16:02:25','2021-11-22 16:02:25'),('b9ea746a75f25ffa98ad1fbc22c0104eae849a884ac8555563aebfb8e7ef5c4cc79268d99d39abd3',18,1,'Personal Access Token','[]',0,'2020-11-22 21:22:07','2020-11-22 21:22:07','2021-11-22 21:22:07'),('bb262c3efe28b4d6a2a54f961c0d98fd44bd3539406b4744ceac1c2f5ae8ac6f8e50709caf6bb524',18,1,'Personal Access Token','[]',0,'2020-11-22 21:22:05','2020-11-22 21:22:05','2021-11-22 21:22:05'),('bdc05be38642d12f1d996e8fe03bbfc4ee7cb7fccbf4c875cff389a9e60792fca4068edb752ddb7a',18,1,'Personal Access Token','[]',0,'2020-11-22 21:22:05','2020-11-22 21:22:05','2021-11-22 21:22:05'),('c6e7e0f817c42f0c58dc19229427fb863ac23591fbf6cc353518543e1475a7d74ada7fe4c5fb4c28',18,1,'Personal Access Token','[]',0,'2020-11-27 15:12:22','2020-11-27 15:12:22','2021-11-27 15:12:22'),('c77f29788a38801d8fb1b1cd9c8dce16876913995fd1b5d2577b25e85db8ccf17b540d96e63f9c89',18,1,'Personal Access Token','[]',0,'2020-11-22 15:54:38','2020-11-22 15:54:38','2021-11-22 15:54:38'),('c9be3a26beaf55df3c87b236e89849662aa58640d8d20b028b90faf56ac312cef7bfea9b7e619246',18,1,'Personal Access Token','[]',0,'2020-11-15 23:17:47','2020-11-15 23:17:47','2021-11-15 23:17:47'),('d4064e41a1f3d6458ebe28a0ed89d4dcaf4be86a8c39d11867f795e869dea270727d169e602ffb52',1,1,'Personal Access Token','[]',0,'2020-11-16 01:55:30','2020-11-16 01:55:30','2021-11-16 01:55:30'),('d49f9f8988e6bf99ff808e5b4d89db643e05a566560eeff06b4d97fcd4368704ee8680f365ca908f',18,1,'Personal Access Token','[]',0,'2020-11-21 23:32:07','2020-11-21 23:32:07','2021-11-21 23:32:07'),('d64be9e1a5cbc74f77a7471db3cabaf694b9309d3afcfd93bb1ae19175c1106121115795c3a6cf89',18,1,'Personal Access Token','[]',0,'2020-11-22 19:20:09','2020-11-22 19:20:09','2021-11-22 19:20:09'),('d74d5102f05fbba247598d322ca406ead67255667e94b6acafe1e2c43c2c20cd9d469c5b5cb385bd',1,1,'Personal Access Token','[]',0,'2020-11-15 23:10:42','2020-11-15 23:10:42','2021-11-15 23:10:42'),('d81cc3821aef8e96e65435391282b6f2a96446624b82202ee6f3c43ef468a604873baf5ebc39d2ba',18,1,'Personal Access Token','[]',0,'2020-11-15 23:13:25','2020-11-15 23:13:25','2021-11-15 23:13:25'),('d86cc58534646f22e04aa2cedb9902c5da022f1b1c5450d79b83309443802bd6bb6160fd200b8d98',18,1,'Personal Access Token','[]',0,'2020-11-26 01:39:19','2020-11-26 01:39:19','2021-11-26 01:39:19'),('da9af33baebb43f0035ff6984f8a400c61216d877e349318f3d39b14792f3a1c60567d8f2d7797c8',18,1,'Personal Access Token','[]',0,'2020-11-15 23:10:02','2020-11-15 23:10:02','2021-11-15 23:10:02'),('e4cd9437affeb267881a2e15b466492a6d7884aa26bbc31b2190ab8d194929707b19760d58a55213',18,1,'Personal Access Token','[]',0,'2020-11-15 23:10:02','2020-11-15 23:10:02','2021-11-15 23:10:02'),('e5ceea1f71310aa3bde627bdef3be4c06d7455df7aec7bad78f8672bfcbbcedcdbefd9aaa690db5c',18,1,'Personal Access Token','[]',0,'2020-11-22 19:21:37','2020-11-22 19:21:37','2021-11-22 19:21:37'),('e88dcc8f590c29e04bd20eaf8becf93a82c7fc642eff4dbda17080b5d94ab15928570b4dac4406c4',18,1,'Personal Access Token','[]',0,'2020-11-22 19:18:07','2020-11-22 19:18:07','2021-11-22 19:18:07'),('f2947032b76183b50a94955e7d33185aee123e58a312105f3c566edfc25528241e2cd0484b25f7b5',18,1,'Personal Access Token','[]',0,'2020-11-23 00:57:01','2020-11-23 00:57:01','2021-11-23 00:57:01'),('f38a0715f4613695cc45420d0169bf5a5caadc35740a2d07c8de751c9f22c06868bd91c626d61e7f',18,1,'Personal Access Token','[]',0,'2020-11-22 21:25:00','2020-11-22 21:25:00','2021-11-22 21:25:00'),('f3fd5372ad1fc4dd9b398e00e7513b1b8f556610776eb6c9dca5d5cd34364a8c4e56e0f61d6411fe',18,1,'Personal Access Token','[]',0,'2020-11-15 23:09:57','2020-11-15 23:09:57','2021-11-15 23:09:57'),('f5853f2e3dfc4fc6bd610d3110e01cf4e3ee58c6e7c4b3b07ae4df9df104994dff9b026d60db1580',18,1,'Personal Access Token','[]',0,'2020-11-22 02:11:51','2020-11-22 02:11:51','2021-11-22 02:11:51'),('f6ef0dfd9209bbbe075e07ac35488c4f4a2cf1a3c4875c7498e7da467a839aa3fee4ef04e269727b',18,1,'Personal Access Token','[]',0,'2020-11-23 00:09:46','2020-11-23 00:09:46','2021-11-23 00:09:46'),('fa046d774454fd664d81f972ccc9e876a1d5e16a01bd3a1c7d63f6d56cdbb8e94847d13c41286af5',18,1,'Personal Access Token','[]',0,'2020-11-23 00:56:34','2020-11-23 00:56:34','2021-11-23 00:56:34');

/*Table structure for table `oauth_auth_codes` */

DROP TABLE IF EXISTS `oauth_auth_codes`;

CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) unsigned NOT NULL,
  `client_id` bigint(20) unsigned NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_auth_codes_user_id_index` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `oauth_auth_codes` */

/*Table structure for table `oauth_clients` */

DROP TABLE IF EXISTS `oauth_clients`;

CREATE TABLE `oauth_clients` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `redirect` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_clients_user_id_index` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `oauth_clients` */

insert  into `oauth_clients`(`id`,`user_id`,`name`,`secret`,`provider`,`redirect`,`personal_access_client`,`password_client`,`revoked`,`created_at`,`updated_at`) values (1,NULL,'Tiendita Personal Access Client','dYHDsB2RZ1i6yW1UHJAeSZqv230pKH23S1l9hLmL',NULL,'http://localhost',1,0,0,'2020-11-15 23:04:57','2020-11-15 23:04:57'),(2,NULL,'Tiendita Password Grant Client','YwO5ddsj4Ur8zf70C46Jy4QzRUBICdeLRL5rNIbO','users','http://localhost',0,1,0,'2020-11-15 23:04:57','2020-11-15 23:04:57');

/*Table structure for table `oauth_personal_access_clients` */

DROP TABLE IF EXISTS `oauth_personal_access_clients`;

CREATE TABLE `oauth_personal_access_clients` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `client_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `oauth_personal_access_clients` */

insert  into `oauth_personal_access_clients`(`id`,`client_id`,`created_at`,`updated_at`) values (1,1,'2020-11-15 23:04:57','2020-11-15 23:04:57');

/*Table structure for table `oauth_refresh_tokens` */

DROP TABLE IF EXISTS `oauth_refresh_tokens`;

CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `oauth_refresh_tokens` */

/*Table structure for table `opinions` */

DROP TABLE IF EXISTS `opinions`;

CREATE TABLE `opinions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `opinion` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipo` enum('Positivo','Neutral','Negativo') COLLATE utf8mb4_unicode_ci NOT NULL,
  `aporta_id` bigint(20) unsigned NOT NULL COMMENT 'Usuario que dio la opinion',
  `user_id` bigint(20) unsigned NOT NULL COMMENT 'Usuario que recibe la opinion',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `opinions_aporta_id_index` (`aporta_id`),
  KEY `opinions_user_id_index` (`user_id`),
  CONSTRAINT `opinions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `opinions` */

insert  into `opinions`(`id`,`opinion`,`tipo`,`aporta_id`,`user_id`,`created_at`,`updated_at`) values (1,'Grande crack, maquina','Positivo',2,1,NULL,NULL),(2,'vales 3 atados bro, F por ti','Negativo',2,1,NULL,NULL),(3,'Ni ni','Positivo',2,1,NULL,NULL),(4,'asco este karnal :V','Negativo',1,2,'2020-11-29 21:47:37','2020-11-29 21:47:37'),(5,'asco este karnal :V','Negativo',1,2,'2020-11-29 21:48:29','2020-11-29 21:48:29'),(6,'Te adoro brooou','Positivo',1,2,'2020-11-29 21:51:00','2020-11-29 21:51:00'),(8,'Me engaño con la foto, esta mierda es un polistation, bueno, en parte fue culpa mía por no leer la descripción :V','Neutral',1,4,'2020-11-29 21:57:00','2020-11-29 21:57:00'),(9,'Vale vrg este man','Negativo',1,4,'2020-11-29 22:09:46','2020-11-29 22:09:46'),(10,'ai loviu bb','Positivo',1,4,'2020-11-29 22:11:34','2020-11-29 22:11:34');

/*Table structure for table `pago_users` */

DROP TABLE IF EXISTS `pago_users`;

CREATE TABLE `pago_users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `pago_users` */

/*Table structure for table `pagos` */

DROP TABLE IF EXISTS `pagos`;

CREATE TABLE `pagos` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `metodo` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `pagos` */

insert  into `pagos`(`id`,`metodo`,`created_at`,`updated_at`) values (1,'a convenir con el vendedor',NULL,NULL),(2,'tarjeta de Credito',NULL,NULL),(3,'tarjeta de Debito',NULL,NULL),(4,'contado',NULL,NULL);

/*Table structure for table `password_resets` */

DROP TABLE IF EXISTS `password_resets`;

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `password_resets` */

/*Table structure for table `permissions` */

DROP TABLE IF EXISTS `permissions`;

CREATE TABLE `permissions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=77 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `permissions` */

insert  into `permissions`(`id`,`name`,`guard_name`,`created_at`,`updated_at`) values (1,'roles.index','web','2020-09-08 19:19:42','2020-09-08 19:19:42'),(2,'roles.edit','web','2020-09-08 19:19:42','2020-09-08 19:19:42'),(3,'roles.show','web','2020-09-08 19:19:42','2020-09-08 19:19:42'),(4,'roles.create','web','2020-09-08 19:19:42','2020-09-08 19:19:42'),(5,'roles.destroy','web','2020-09-08 19:19:42','2020-09-08 19:19:42'),(6,'users.index','web','2020-09-08 19:19:42','2020-09-08 19:19:42'),(7,'users.edit','web','2020-09-08 19:19:42','2020-09-08 19:19:42'),(8,'users.show','web','2020-09-08 19:19:42','2020-09-08 19:19:42'),(9,'users.create','web','2020-09-08 19:19:42','2020-09-08 19:19:42'),(10,'users.destroy','web','2020-09-08 19:19:42','2020-09-08 19:19:42'),(11,'clientes.index','web','2020-09-08 19:19:42','2020-09-08 19:19:42'),(12,'clientes.edit','web','2020-09-08 19:19:42','2020-09-08 19:19:42'),(13,'clientes.show','web','2020-09-08 19:19:42','2020-09-08 19:19:42'),(14,'clientes.create','web','2020-09-08 19:19:42','2020-09-08 19:19:42'),(15,'clientes.destroy','web','2020-09-08 19:19:42','2020-09-08 19:19:42'),(16,'solicitudes.index','web','2020-09-08 19:19:42','2020-09-08 19:19:42'),(17,'solicitudes.edit','web','2020-09-08 19:19:42','2020-09-08 19:19:42'),(18,'solicitudes.revision','web','2020-09-08 19:19:42','2020-09-08 19:19:42'),(19,'solicitudes.show','web','2020-09-08 19:19:42','2020-09-08 19:19:42'),(20,'solicitudes.create','web','2020-09-08 19:19:42','2020-09-08 19:19:42'),(21,'solicitudes.destroy','web','2020-09-08 19:19:42','2020-09-08 19:19:42'),(22,'tareas.index','web','2020-09-08 19:19:42','2020-09-08 19:19:42'),(23,'tareas.edit','web','2020-09-08 19:19:42','2020-09-08 19:19:42'),(24,'tareas.revision','web','2020-09-08 19:19:42','2020-09-08 19:19:42'),(25,'tareas.show','web','2020-09-08 19:19:42','2020-09-08 19:19:42'),(26,'tareas.create','web','2020-09-08 19:19:42','2020-09-08 19:19:42'),(27,'tareas.destroy','web','2020-09-08 19:19:42','2020-09-08 19:19:42'),(28,'maquinarias.index','web','2020-09-08 19:19:42','2020-09-08 19:19:42'),(29,'maquinarias.edit','web','2020-09-08 19:19:42','2020-09-08 19:19:42'),(30,'maquinarias.show','web','2020-09-08 19:19:42','2020-09-08 19:19:42'),(31,'maquinarias.create','web','2020-09-08 19:19:42','2020-09-08 19:19:42'),(32,'maquinarias.destroy','web','2020-09-08 19:19:42','2020-09-08 19:19:42'),(33,'operarios.index','web','2020-09-08 19:19:42','2020-09-08 19:19:42'),(34,'operarios.edit','web','2020-09-08 19:19:42','2020-09-08 19:19:42'),(35,'operarios.show','web','2020-09-08 19:19:42','2020-09-08 19:19:42'),(36,'operarios.create','web','2020-09-08 19:19:42','2020-09-08 19:19:42'),(37,'operarios.destroy','web','2020-09-08 19:19:42','2020-09-08 19:19:42'),(38,'mantenimientos.index','web','2020-09-08 19:19:42','2020-09-08 19:19:42'),(39,'mantenimientos.edit','web','2020-09-08 19:19:42','2020-09-08 19:19:42'),(40,'mantenimientos.revision','web','2020-09-08 19:19:42','2020-09-08 19:19:42'),(41,'mantenimientos.show','web','2020-09-08 19:19:42','2020-09-08 19:19:42'),(42,'mantenimientos.create','web','2020-09-08 19:19:42','2020-09-08 19:19:42'),(43,'mantenimientos.destroy','web','2020-09-08 19:19:42','2020-09-08 19:19:42'),(44,'trabajos.index','web','2020-09-08 19:19:42','2020-09-08 19:19:42'),(45,'trabajos.edit','web','2020-09-08 19:19:42','2020-09-08 19:19:42'),(46,'trabajos.revision','web','2020-09-08 19:19:42','2020-09-08 19:19:42'),(47,'trabajos.show','web','2020-09-08 19:19:42','2020-09-08 19:19:42'),(48,'trabajos.create','web','2020-09-08 19:19:42','2020-09-08 19:19:42'),(49,'trabajos.destroy','web','2020-09-08 19:19:42','2020-09-08 19:19:42'),(50,'marcas.index','web','2020-09-08 19:19:42','2020-09-08 19:19:42'),(51,'marcas.edit','web','2020-09-08 19:19:42','2020-09-08 19:19:42'),(52,'marcas.show','web','2020-09-08 19:19:42','2020-09-08 19:19:42'),(53,'marcas.create','web','2020-09-08 19:19:42','2020-09-08 19:19:42'),(54,'marcas.destroy','web','2020-09-08 19:19:42','2020-09-08 19:19:42'),(55,'actividades','web','2020-09-08 19:19:42','2020-09-08 19:19:42'),(56,'actividades.encargos','web','2020-09-08 19:19:42','2020-09-08 19:19:42'),(57,'actividades.encargos.general','web','2020-09-08 19:19:42','2020-09-08 19:19:42'),(58,'actividades.encargos.general.solicitudes','web','2020-09-08 19:19:42','2020-09-08 19:19:42'),(59,'actividades.encargos.general.tareas','web','2020-09-08 19:19:42','2020-09-08 19:19:42'),(60,'actividades.encargos.asignaciones','web','2020-09-08 19:19:42','2020-09-08 19:19:42'),(61,'actividades.mantenimientos','web','2020-09-08 19:19:42','2020-09-08 19:19:42'),(62,'actividades.mantenimientos.general','web','2020-09-08 19:19:42','2020-09-08 19:19:42'),(63,'actividades.mantenimientos.general.mantenimientos','web','2020-09-08 19:19:42','2020-09-08 19:19:42'),(64,'actividades.mantenimientos.general.trabajos','web','2020-09-08 19:19:42','2020-09-08 19:19:42'),(65,'admin','web','2020-09-08 19:19:42','2020-09-08 19:19:42'),(66,'admin.personas','web','2020-09-08 19:19:42','2020-09-08 19:19:42'),(67,'admin.personas.administrativo','web','2020-09-08 19:19:42','2020-09-08 19:19:42'),(68,'admin.personas.administrativo.funcionarios','web','2020-09-08 19:19:42','2020-09-08 19:19:42'),(69,'admin.personas.administrativo.operarios','web','2020-09-08 19:19:42','2020-09-08 19:19:42'),(70,'admin.personas.general','web','2020-09-08 19:19:42','2020-09-08 19:19:42'),(71,'admin.personas.general.clientes','web','2020-09-08 19:19:42','2020-09-08 19:19:42'),(72,'admin.vehiculos','web','2020-09-08 19:19:42','2020-09-08 19:19:42'),(73,'admin.vehiculos.administrativo','web','2020-09-08 19:19:42','2020-09-08 19:19:42'),(74,'admin.vehiculos.administrativo.maquinarias','web','2020-09-08 19:19:42','2020-09-08 19:19:42'),(75,'admin.vehiculos.general','web','2020-09-08 19:19:42','2020-09-08 19:19:42'),(76,'admin.vehiculos.general.marcas','web','2020-09-08 19:19:42','2020-09-08 19:19:42');

/*Table structure for table `preguntas` */

DROP TABLE IF EXISTS `preguntas`;

CREATE TABLE `preguntas` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `pregunta` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `producto_id` bigint(20) unsigned NOT NULL,
  `user_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `preguntas_producto_id_index` (`producto_id`),
  KEY `preguntas_user_id_index` (`user_id`),
  CONSTRAINT `preguntas_producto_id_foreign` FOREIGN KEY (`producto_id`) REFERENCES `productos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `preguntas_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `preguntas` */

insert  into `preguntas`(`id`,`pregunta`,`producto_id`,`user_id`,`created_at`,`updated_at`) values (1,'Aun tiene disponible?',2,2,'2020-09-11 21:20:35',NULL),(2,'Cuanto con envio a babahoyo karnal',2,3,'2020-09-11 21:20:36',NULL),(37,'Necesito unos 400 de estos para trabajar al por mayor, crees que puedas conseguirlos?',2,1,'2020-09-12 03:55:44','2020-09-12 03:55:44'),(38,'ola porsicaso zbe si tiene blutu',2,1,'2020-09-12 04:03:56','2020-09-12 04:03:56'),(39,'jeremito es geysisisisisimo jeje xd',3,2,'2020-10-13 16:12:01','2020-10-13 16:12:01'),(40,'jeremito esta enamorado de luchito duermen abrazados',3,2,'2020-10-13 16:12:24','2020-10-13 16:12:24'),(41,'a jeremito le gusta cara de ano, le va a regalar una vaca',3,2,'2020-10-13 16:12:48','2020-10-13 16:12:48'),(42,'luchito es gay',2,2,'2020-10-16 02:33:44','2020-10-16 02:33:44'),(43,'dgsdhdfhtth\n',1,1,'2020-10-30 21:15:11','2020-10-30 21:15:11'),(44,'tienes local?, acepta tc?',5,1,'2020-11-29 02:30:28','2020-11-29 02:30:28');

/*Table structure for table `productos` */

DROP TABLE IF EXISTS `productos`;

CREATE TABLE `productos` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `caracteristicas` text COLLATE utf8mb4_unicode_ci,
  `descripcion` text COLLATE utf8mb4_unicode_ci,
  `precio` double(8,3) NOT NULL,
  `stock` int(11) NOT NULL,
  `estado` enum('Nuevo','Usado','Reacondicionado') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `categoria_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `productos_categoria_id_index` (`categoria_id`),
  CONSTRAINT `productos_categoria_id_foreign` FOREIGN KEY (`categoria_id`) REFERENCES `categorias` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=8541577 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `productos` */

insert  into `productos`(`id`,`name`,`caracteristicas`,`descripcion`,`precio`,`stock`,`estado`,`categoria_id`,`created_at`,`updated_at`) values (1,'smartphone prron','jsjjsjjj un celular bien bonito krnal la dvd compralo 100x100 recomendado jjjj','kk',200.000,3,'Usado',1,NULL,NULL),(2,'Xiaomi Mi Note 10 / Mi Note 10 Lite 64gb $355 Acpt Tarjet','celular de alta gama y ultima generacion','***************************************************************************************************\r\nContamos con servicio de Data Móvil que te permite pagar con tarjeta de crédito o débito en el \r\nlugar que te encuentres; aplica para Quito y Valles. Paga on-line desde nuestra página web, \r\naceptamos PAYCLUB, BDP WALLET, transferencia, efectivo o depósito. Servicio contra entrega.\r\n\r\nIMPORTANTE PARA TI.\r\nEnviamos TODO EL PAÍS, INCLUIDO GALÁPAGOS mediante Servientrega. Cuando hayas verificado la \r\nguía de envío procedes hacer el depósito o pago electrónico, NO ANTES.\r\n***************************************************************************************************\r\nEquipos nuevos con año de garantía.\r\n\r\nXiaomi Mi Note 10, pantalla Super AMOLED Full HD+ de 6.47, Snapdragon 730G 6RAM y 128GB, cámara\r\n de 108 MP + 12 MP + 20 MP + 5 MP + 2 MP, selfies 32 MP, alojada en el frente con un notch, \r\nbatería de 5260 mAh, carga rápida 30W, USB-C, sonido HiFi, lector de huellas, MIUI 11 basado en \r\nAndroid 9.0 Pie.\r\n\r\nXiaomi Mi Note 10 Lite: pantalla AMOLED, 6.47 pulgadas Full HD+, Snapdragon 730G, 6RAM y 64GB, \r\ncámara cuádruple 64 MP, 8 MP, 2 MP y 5 MP, frontal de 16 MP, batería 5260 mAh, carga rápida, \r\naudio HiFi, lector de huellas, MIUI 11 basado en Android 10.\r\n\r\n\r\nHorarios de atención:\r\nLunes a Sábado (10h00 a 18h00)\r\nDomingos y feriados previa cita.\r\n\r\nSomos MercadoLíder Gold. Revisa nuestra reputación como vendedores.',410.230,100,'Nuevo',1,NULL,NULL),(3,'Samsung Galaxi note 10','Dispositivo de alta gama de samsung de ultima generacion ya esta aqui. celular','SAMSUNG NOTE10 LITE 128GB DUOS\r\n\r\n**********************************************************************************************************************\r\n\r\nEN THE CELL DEPOT PENSAMOS EN LA SEGURIDAD DE NUESTROS CLIENTES, POR LO TANTO, CUMPLIMOS CON TODAS LAS NORMAS DE SEGURIDAD Y SANIDAD EN NUESTRA\r\nOFICINA COMERCIAL\r\n\r\n*********************************************************************************************************************\r\n\r\nTHE CELL DEPOT PRESENTA:\r\n\r\n\r\nSAMSUNG NOTE10 LITE\r\n\r\n\r\nLISTO PARA ENTREGA INMEDIATA!!!!!!!\r\n\r\n\r\nTODOS NUESTROS EQUIPOS SON NUEVOS CON GARANTÍA EN ECUADOR.\r\n\r\n*********************************************************************************************************************\r\n\r\nEspecificaciones\r\n\r\nModelo: NOTE 10 LITE\r\nPantalla: 6.7 Pulgadas\r\nProcesador: Exynos 9810 Octa - Core 4x2.7Ghz\r\nRedes: GSM, 3G, 3.5G, HSPDA, LTE, 4G\r\nMemoria: 128GB, Expandible Micro SD card, 8GB RAM\r\nCámara Trasera: Triple, 12 MP (f/1.7, PDAF Dual Pixel, OIS, wide) + 12 MP (f/2.2, ultrawide) + 12 MP (f/2.4, PDAF, OIS, telefoto)\r\nCamara delantera: 32 MP, f/2.2, wide, HDR\r\nSensores: lector de huella (bajo pantalla), Desbloqueo Facial GPS, Acelerómetro, Giroscopio, Proximidad, Luz ambiental\r\nBatería: Fija de 4500 mAh\r\nColores: Negro, Rojo, Aura Glow\r\nIncluye: Caja Original, Celular, Cargador, Cable de Datos, Manos Libre, Manual\r\n\r\n*********************************************************************************************************************\r\n\r\nGarantía: 90 días por cualquier desperfecto de fabrica\r\n\r\nFormas de Pago: Efectivo, Trasferencias Bancarias, Tarjetas de Crédito, Criptomonedas\r\n\r\nEnvíos a todo el país a través de SERVIENTREGA\r\n\r\n*********************************************************************************************************************\r\n\r\nCELULARES DISPONIBLES EN NUESTRA TIENDA COMERCIAL\r\n\r\nXiaomi Redmi Note 8 Pro 128Gb en $255\r\n\r\nSamsung A31 64GB en $250\r\nSamsung A51 128GB en $305\r\nSamsung A71 128GB en $405\r\nSamsung S10 Lite 128GB en $540\r\nSamsung S10 128GB en $680\r\nSamsung S10 Plus 128GB en $765\r\nSamsung S20 128GB en $780\r\nSamsung S20 Plus 128GB en $825\r\nSamsung Note 10 Lite 128GB en $525\r\nSamsung Note 10 256GB en $790\r\nSamsung Note 10 Plus 256GB en $935\r\n\r\niPhone SE 2020 64GB en $530\r\niPhone SE 2020 128GB en $585\r\niPhone 11 128GB en $950\r\niPhone 11 Pro 256GB en $1435\r\niPhone 11 Pro Max 256GB en $1535\r\n\r\nAirPods Pro en $310\r\nAirPods 2da Generacion $195\r\nSamsung Galaxy Buds Plus $145\r\n\r\n\r\n\r\n*********************************************************************************************************************\r\n\r\nREVISE NUESTROS DEMÁS ARTÍCULOS PUBLICADOS EN MERCADO LIBRE.\r\n\r\nDE CLICK EN COMPRAR SIN COMPROMISO Y CON MUCHO GUSTO LES ENVIAREMOS NUESTRAS OFERTAS Y ESPECIALES.\r\n\r\nMUCHAS GRACIAS POR TOMAR EL TIEMPO DE VER NUESTRO PRODUCTO.\r\n\r\n\r\nTHE CELL DEPOT\r\n\r\n\r\nSAMSUNG NOTE10 LITE',600.500,25,'Usado',1,NULL,NULL),(4,'celular viejito','el telefono viejito mas rapido de totte italie fiauuuuuuuuuuuu','$20 cada uno\r\nSOLO POR MAYOR. No vendemos por unidad.\r\n* Tenemos en todos los colores\r\n* Venta mínima de una docena\r\n* Realizamos envíos a todo el Ecuador\r\n- Doble Chip\r\n- Cámara\r\n- Bluetooth\r\n- Radio\r\n- Linterna\r\n- Ranura tarjeta de Memoria',40.000,1,'Nuevo',1,NULL,NULL),(5,'playstation 5','Nuevo PlayStatio 5 ya esta aqui brrooooou unete a la aventura con mario y sus \r\namikos','*****Esta consola es una replica de la original playStation 5*****\r\nPolistation con forma de playstation 5',190.220,8,'Nuevo',5,NULL,'2020-11-29 02:55:03'),(495560,'Consola Xbox One S 1 Tb 4k','Marca\r\nXbox\r\nModelo\r\nOne','Consola Xbox One S de 1Tb + 2 controles + HDMI + 4K\r\n\r\nLo mejor en entretenimiento en 4K\r\nStreaming en 4K\r\nHaz streaming de video Ultra HD 4K en Netflix y más.\r\nBlu-ray 4K\r\nDisfruta de las películas con lujo de detalle gracias al Blu-ray™ 4K Ultra HD.\r\nSonido espacial\r\nHaz que tus juegos y películas cobren vida con el sonido envolvente Dolby Atmos y DTS:X.5\r\nAplicaciones de entretenimiento interminables\r\nDisfruta de tus aplicaciones favoritas, como YouTube, Spotify y muchas más\r\n\r\nGarantía:',500.000,7,'Reacondicionado',5,'2020-11-03 22:30:05','2020-11-03 22:30:05'),(1430989,'celular','asgqwe sd gsradg aerg efghherhefh dfsh','asgqwe sd gsradg aerg efghherhefh dfsh',206.300,1,'Reacondicionado',1,'2020-11-28 22:19:29','2020-11-28 22:19:29'),(2090983,'celular','erwgedrsfgsdasdgasd gsrg ewr gewrhg ewrhgergh','erw ghwerhgwerh ewfherw hethetwhetw',1.000,1,'Nuevo',10,'2020-11-28 01:49:26','2020-11-28 01:49:26'),(2441883,'Laptop hp 15-au018wm','Marca\r\nHP\r\nProcesador\r\nIntel Core i5\r\nDisco duro\r\n1000 GB','Descripción\r\nComputador Todo En Uno Hp Core i5 1000gb + 8gb Ram All In One Aio\r\n\r\nPrecio Incluye IVA y Factura\r\n\r\n===================Computador Incluye=====================\r\n\r\n-Procesador Intel core i5\r\n-Memoria Ram 8GB\r\n-Disco Duro 1TB\r\n-Teclado USB\r\n-Mouse óptico USB\r\n-Cámara web\r\n\r\n\r\n***No Compre a Vendedores que no le dan FACTURA y sus precios NO son incluido IVA, OJO puede que su mercadería no sea LEGAL en Ecuador y no tenga garantía local, no arriesgue su Inversión por comprar más barato***\r\n\r\n\r\n==========ENTREGA INMEDIATA A DOMICILIO (QUITO)=========\r\n-Entrega Totalmente Gratuita en Quito (Perímetro Urbano)\r\n-Resto del País por Servientrega (Costo 20 Dólares Adicionales)\r\n\r\n====================Formas de Pago========================\r\n-Efectivo\r\n-Cheques a Efectivizar\r\n-Depósitos\r\n-Transferencias\r\n-Aceptamos Todas las Tarjetas de Crédito (Precio Publicado + Costo de la Tarjeta + Respectivos Intereses del Diferido)\r\n-Tarjeta de Débito (Precio Publicado + Costo de la Tarjeta)\r\n\r\nCobramos Con Tarjeta de Crédito a Domicilio (Quito)\r\n\r\n======================Garantía==============================\r\n-1 Año contra defectos de fábrica en el CPU y Monitor\r\n-Periféricos 90 Días (Parlante, Teclado, Mouse)\r\n-La garantía no cubre Golpes, Presencia de elementos nocivos como: Líquidos, Ácidos, Fuego, Intemperie, Variaciones de Voltaje, Quemado\r\n-PD: El Trámite de Garantía no es a Domicilio\r\n\r\n=================Horarios de Atención=======================\r\n-Lunes a Sábado de 9 AM a 7 PM\r\n-Domingos y Feriados de 10 AM a 5 PM\r\n\r\n\r\n***OJO no reciba Notas de Venta que no respalde su compra y no tienen garantía, exija su FACTURA autorizada por el SRI***\r\n\r\n\r\n***Compre en empresas reconocidas que tienen Locales Físicos, tenemos más de 10 locales en la ciudad de Quito y Sangolqui, con Ventas concretadas en Mercado Libre y somos reconocidos como Mercado Líder GOLD Distinción que se da a las empresas serias y confiables con excelente reputación, su compra es 100% segura con nosotros, no pierda su inversión con otros vendedores que no le dan garantía***',899.000,26,'Nuevo',2,'2020-11-04 02:11:16','2020-11-04 02:11:16'),(8541576,'prueba google','gbcxcgnfhhmghmghmg','vbcvghmgfmgfmfgmfgm',52.000,100,'Nuevo',2,'2020-11-04 02:28:58','2020-11-04 02:28:58');

/*Table structure for table `provincias` */

DROP TABLE IF EXISTS `provincias`;

CREATE TABLE `provincias` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `provincias` */

insert  into `provincias`(`id`,`name`,`created_at`,`updated_at`) values (1,'Los Rios','2020-09-08 19:19:42','2020-09-08 19:19:42'),(2,'Guayas',NULL,NULL),(3,'Pichincha',NULL,NULL),(4,'Azuay',NULL,NULL),(5,'El Oro',NULL,NULL),(6,'Imbabura',NULL,NULL),(7,'Manabi',NULL,NULL),(8,'Chimborazo',NULL,NULL),(9,'Tungurahua',NULL,NULL);

/*Table structure for table `respuestas` */

DROP TABLE IF EXISTS `respuestas`;

CREATE TABLE `respuestas` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `respuesta` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `pregunta_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `respuestas_pregunta_id_index` (`pregunta_id`),
  CONSTRAINT `respuestas_pregunta_id_foreign` FOREIGN KEY (`pregunta_id`) REFERENCES `preguntas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `respuestas` */

insert  into `respuestas`(`id`,`respuesta`,`pregunta_id`,`created_at`,`updated_at`) values (1,'simon pues. Vas a comprar o andas de sapo?',1,'2020-09-08 19:19:42',NULL),(2,'5 latas adicionales, brou',2,'2020-09-08 13:57:26',NULL);

/*Table structure for table `role_has_permissions` */

DROP TABLE IF EXISTS `role_has_permissions`;

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) unsigned NOT NULL,
  `role_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `role_has_permissions_role_id_foreign` (`role_id`),
  CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `role_has_permissions` */

insert  into `role_has_permissions`(`permission_id`,`role_id`) values (1,1),(2,1),(3,1),(4,1),(5,1),(6,1),(7,1),(8,1),(9,1),(10,1),(11,1),(12,1),(13,1),(14,1),(15,1),(16,1),(17,1),(18,1),(19,1),(20,1),(21,1),(22,1),(23,1),(24,1),(25,1),(26,1),(27,1),(28,1),(29,1),(30,1),(31,1),(32,1),(33,1),(34,1),(35,1),(36,1),(37,1),(38,1),(39,1),(40,1),(41,1),(42,1),(43,1),(44,1),(45,1),(46,1),(47,1),(48,1),(49,1),(50,1),(51,1),(52,1),(53,1),(54,1),(55,1),(56,1),(57,1),(58,1),(59,1),(60,1),(61,1),(62,1),(63,1),(64,1),(65,1),(66,1),(67,1),(68,1),(69,1),(70,1),(71,1),(72,1),(73,1),(74,1),(75,1),(76,1),(1,2),(3,2),(6,2),(8,2),(11,2),(13,2),(16,2),(19,2),(22,2),(25,2),(28,2),(30,2),(33,2),(35,2),(38,2),(41,2),(44,2),(47,2),(50,2),(52,2),(55,2),(56,2),(57,2),(58,2),(59,2),(60,2),(61,2),(62,2),(63,2),(64,2),(65,2),(66,2),(67,2),(68,2),(69,2),(70,2),(71,2),(72,2),(73,2),(74,2),(75,2),(76,2),(11,3),(12,3),(13,3),(14,3),(16,3),(17,3),(19,3),(20,3),(22,3),(23,3),(25,3),(26,3),(28,3),(30,3),(33,3),(35,3),(38,3),(39,3),(41,3),(42,3),(44,3),(45,3),(47,3),(48,3),(55,3),(56,3),(57,3),(58,3),(59,3),(60,3),(61,3),(62,3),(63,3),(64,3),(65,3),(66,3),(67,3),(69,3),(70,3),(71,3),(72,3),(73,3),(74,3),(6,4),(8,4),(9,4),(11,4),(12,4),(13,4),(14,4),(16,4),(17,4),(18,4),(19,4),(20,4),(22,4),(23,4),(24,4),(25,4),(26,4),(28,4),(29,4),(30,4),(31,4),(33,4),(34,4),(35,4),(36,4),(38,4),(39,4),(40,4),(41,4),(42,4),(44,4),(45,4),(46,4),(47,4),(48,4),(49,4),(55,4),(56,4),(57,4),(58,4),(59,4),(60,4),(61,4),(62,4),(63,4),(64,4),(65,4),(66,4),(67,4),(69,4),(70,4),(71,4),(72,4),(73,4),(74,4);

/*Table structure for table `roles` */

DROP TABLE IF EXISTS `roles`;

CREATE TABLE `roles` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `roles` */

insert  into `roles`(`id`,`name`,`guard_name`,`created_at`,`updated_at`) values (1,'Acceso Total','web','2020-09-08 19:19:42','2020-09-08 19:19:42'),(2,'Auditor','web','2020-09-08 19:19:43','2020-09-08 19:19:43'),(3,'Funcionario','web','2020-09-08 19:19:43','2020-09-08 19:19:43'),(4,'Supervisor','web','2020-09-08 19:19:43','2020-09-08 19:19:43');

/*Table structure for table `transaccions` */

DROP TABLE IF EXISTS `transaccions`;

CREATE TABLE `transaccions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `compra_id` bigint(20) unsigned NOT NULL,
  `venta_id` bigint(20) unsigned NOT NULL,
  `pago_id` bigint(20) unsigned NOT NULL,
  `envio_id` bigint(20) unsigned NOT NULL,
  `estado` enum('concretada','no concretada','problema') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `confirmacion` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `transaccions_compra_id_index` (`compra_id`),
  KEY `transaccions_venta_id_index` (`venta_id`),
  KEY `transaccions_pago_id_index` (`pago_id`),
  KEY `transaccions_envio_id_index` (`envio_id`),
  CONSTRAINT `transaccions_compra_id_foreign` FOREIGN KEY (`compra_id`) REFERENCES `compras` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `transaccions_envio_id_foreign` FOREIGN KEY (`envio_id`) REFERENCES `envios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `transaccions_pago_id_foreign` FOREIGN KEY (`pago_id`) REFERENCES `pagos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `transaccions_venta_id_foreign` FOREIGN KEY (`venta_id`) REFERENCES `ventas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=7871620 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `transaccions` */

insert  into `transaccions`(`id`,`compra_id`,`venta_id`,`pago_id`,`envio_id`,`estado`,`confirmacion`,`created_at`,`updated_at`) values (1,1,1,1,1,'concretada',NULL,NULL,NULL),(2,2,162850,1,1,NULL,NULL,NULL,'2020-11-29 21:51:00'),(292259,4001953,5,2,1,NULL,NULL,'2020-11-29 02:55:03','2020-11-29 22:11:34'),(1391214,8778735,5,2,1,'no concretada',NULL,'2020-11-28 01:42:38','2020-11-28 01:42:38'),(7871619,6877002,5,2,1,'problema','2020-11-28','2020-11-28 01:45:37','2020-11-28 01:45:37');

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `cedula` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `apellido_pater` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `apellido_mater` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `direc` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provincia_id` bigint(20) unsigned NOT NULL,
  `tlf` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `picture` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `api_token` varchar(80) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_cedula_unique` (`cedula`),
  UNIQUE KEY `users_email_unique` (`email`),
  UNIQUE KEY `api_token` (`api_token`),
  KEY `users_provincia_id_index` (`provincia_id`),
  CONSTRAINT `users_provincia_id_foreign` FOREIGN KEY (`provincia_id`) REFERENCES `provincias` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `users` */

insert  into `users`(`id`,`cedula`,`name`,`apellido_pater`,`apellido_mater`,`direc`,`provincia_id`,`tlf`,`picture`,`email`,`email_verified_at`,`password`,`api_token`,`remember_token`,`created_at`,`updated_at`) values (1,'1206855593','Martin','Ronquillo','Vargas','Pedro Carbo',1,'2735416',NULL,'marticarcel@hotmail.com',NULL,'$2y$10$9B9lRGWCnVpZW772Rscn8e8fiRRPd/5KdmxEw/KZ0qU77pc7d.sb.',NULL,NULL,'2020-09-08 19:19:42','2020-09-08 19:19:42'),(2,'1206855594','Mariana','Quisirumbay','Armijo','Las Naves',3,'2735417',NULL,'mariana@gmail.com',NULL,'$2y$10$qnGNRW9sXjZGglRWKiwRZOT2sGpuDd3g3jvmFZgLRPTuE06dxB832',NULL,NULL,'2020-09-08 19:19:42','2020-09-08 19:19:42'),(3,'gRlq28kjLp','Pansy Bayer','Sporer','Collins','Voluptatem dolore sunt voluptatum quia.',2,'+14219091314',NULL,'ckoch@example.com','2020-09-08 19:19:42','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',NULL,'iyIqoPxUZ7','2020-09-08 19:19:42','2020-09-08 19:19:42'),(4,'PPbsuu43Au','Matt Kihn','Bernhard','Ortiz','Sit sit rerum veritatis qui libero.',4,'725-366-1712',NULL,'wuckert.mariela@example.net','2020-09-08 19:19:42','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',NULL,'053YX7ULr7','2020-09-08 19:19:42','2020-09-08 19:19:42'),(5,'BtolvOXZHv','Santiago Mayert Sr.','Volkman','Runolfsson','Cumque eos necessitatibus consequatur eius ut optio.',1,'+1-530-872-9460',NULL,'candice.hudson@example.com','2020-09-08 19:19:42','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',NULL,'XxcdDFmZ1b','2020-09-08 19:19:42','2020-09-08 19:19:42'),(6,'6aDyv6o3gT','Ena Conroy PhD','McKenzie','Halvorson','Odio veritatis voluptatibus molestiae non eius qui.',2,'765-496-3190',NULL,'camden08@example.com','2020-09-08 19:19:42','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',NULL,'oyPvSBpsH2','2020-09-08 19:19:42','2020-09-08 19:19:42'),(7,'w70p1sRKak','Jean Kshlerin','Jerde','Cummerata','Accusantium reprehenderit asperiores ut natus.',5,'(209) 483-6449',NULL,'abagail.quitzon@example.net','2020-09-08 19:19:42','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',NULL,'s5fnGVd1u7','2020-09-08 19:19:42','2020-09-08 19:19:42'),(8,'QdbeK9fFEC','Elvie Rosenbaum PhD','Rippin','Lowe','Quas repellendus iste totam assumenda ut odio.',6,'341-661-7959 x77748',NULL,'katharina.christiansen@example.net','2020-09-08 19:19:42','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',NULL,'MNkwm0I9vb','2020-09-08 19:19:42','2020-09-08 19:19:42'),(9,'zRBNRnpcIg','Laron DuBuque','Hegmann','Bailey','Sapiente voluptates et consequatur quia.',1,'424-780-4445',NULL,'cristina10@example.com','2020-09-08 19:19:42','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',NULL,'ExzKIX4Xpp','2020-09-08 19:19:42','2020-09-08 19:19:42'),(10,'LVWXDzSI8X','Carey Nitzsche','McLaughlin','Schimmel','Quibusdam et impedit sunt temporibus tenetur facere.',1,'+1-918-871-7547',NULL,'casandra71@example.net','2020-09-08 19:19:42','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',NULL,'7CzFSkNzIu','2020-09-08 19:19:42','2020-09-08 19:19:42'),(11,'m2dfbPzT9r','Prof. Alison Kris II','Gerlach','Strosin','Placeat ut et modi distinctio accusamus tempora.',1,'1-989-573-5770',NULL,'fleuschke@example.com','2020-09-08 19:19:42','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',NULL,'rxpFwvf8ln','2020-09-08 19:19:42','2020-09-08 19:19:42'),(12,'qYY7BLUazG','Lee Muller','Cassin','Shanahan','Enim et perspiciatis minima incidunt consequuntur qui necessitatibus nemo.',1,'576-592-0697',NULL,'sporer.juston@example.com','2020-09-08 19:19:42','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',NULL,'qxZgs0DrWj','2020-09-08 19:19:42','2020-09-08 19:19:42'),(13,'cZXfCLS3Sp','Ena Rohan DVM','Ullrich','Lueilwitz','Fugit temporibus beatae non excepturi quae veritatis aliquid.',1,'+1.542.821.0289',NULL,'will95@example.com','2020-09-08 19:19:42','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',NULL,'6ZPAoWBbau','2020-09-08 19:19:42','2020-09-08 19:19:42'),(14,'LaqAIKr7Uw','Kelsie Murphy','Konopelski','Macejkovic','Veniam sit animi autem eius.',1,'+1-231-438-5660',NULL,'mosciski.daisha@example.net','2020-09-08 19:19:42','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',NULL,'ksiImkaTzE','2020-09-08 19:19:42','2020-09-08 19:19:42'),(18,'1206855595','Luddy','Salazar','Santillan','San Juan',7,'0958648512',NULL,'lulu@gmail.com',NULL,'$2y$10$/X5k1WGebKWGtkExxx6VXuGSPuOEy8SqQYjFSdn/5FQekNsHBVChS','214cb4bdc8b0006fe2d0aa0e9478ea3b6fcf3c7cd043bb09251ba07a3083793c',NULL,'2020-11-15 19:46:10','2020-11-15 19:46:10');

/*Table structure for table `ventas` */

DROP TABLE IF EXISTS `ventas`;

CREATE TABLE `ventas` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `estado` enum('activo','finalizado','vendido','suspendido') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'activo',
  `producto_id` bigint(20) unsigned NOT NULL,
  `user_id` bigint(20) unsigned NOT NULL,
  `pago_id` bigint(20) unsigned NOT NULL,
  `envio_id` bigint(20) unsigned NOT NULL,
  `precio_envio` float(8,3) NOT NULL,
  `venta_fin` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `ventas_producto_id_index` (`producto_id`),
  KEY `ventas_user_id_index` (`user_id`),
  KEY `ventas_pago_id_foreign` (`pago_id`),
  KEY `ventas_envio_id_foreign` (`envio_id`),
  CONSTRAINT `ventas_envio_id_foreign` FOREIGN KEY (`envio_id`) REFERENCES `envios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `ventas_pago_id_foreign` FOREIGN KEY (`pago_id`) REFERENCES `pagos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `ventas_producto_id_foreign` FOREIGN KEY (`producto_id`) REFERENCES `productos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `ventas_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=9127924 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `ventas` */

insert  into `ventas`(`id`,`estado`,`producto_id`,`user_id`,`pago_id`,`envio_id`,`precio_envio`,`venta_fin`,`created_at`,`updated_at`) values (1,'finalizado',2,1,1,4,0.000,'2020-12-04',NULL,NULL),(2,'activo',1,2,1,1,0.000,NULL,NULL,NULL),(3,'activo',3,2,2,3,0.000,NULL,NULL,NULL),(4,'activo',4,3,3,2,0.000,NULL,NULL,NULL),(5,'activo',5,4,2,1,5.000,NULL,NULL,'2020-11-28 01:45:37'),(162850,'activo',2441883,1,1,1,0.000,NULL,'2020-11-04 02:11:16','2020-11-04 02:11:16'),(3233131,'activo',1430989,1,1,2,4.990,NULL,'2020-11-28 22:19:29','2020-11-28 22:19:29'),(4151741,'activo',495560,1,1,1,0.000,NULL,'2020-11-03 22:30:05','2020-11-27 16:29:52'),(9127923,'activo',8541576,1,1,2,0.000,NULL,'2020-11-04 02:28:58','2020-11-04 02:28:58');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
