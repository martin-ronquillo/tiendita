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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `compras_producto_id_index` (`producto_id`),
  KEY `compras_user_id_index` (`user_id`),
  CONSTRAINT `compras_producto_id_foreign` FOREIGN KEY (`producto_id`) REFERENCES `productos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `compras_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `compras` */

insert  into `compras`(`id`,`producto_id`,`user_id`,`created_at`,`updated_at`) values (1,2,2,NULL,NULL),(2,2441883,3,NULL,NULL);

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
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `favoritos` */

insert  into `favoritos`(`id`,`user_id`,`producto_id`,`created_at`,`updated_at`) values (4,2,3,NULL,NULL),(6,2,2,'2020-10-24 23:03:44','2020-10-24 23:03:44'),(47,1,4,'2020-11-04 02:06:04','2020-11-04 02:06:04'),(48,1,2,'2020-11-04 02:08:48','2020-11-04 02:08:48');

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
) ENGINE=InnoDB AUTO_INCREMENT=167 DEFAULT CHARSET=latin1;

/*Data for the table `images` */

insert  into `images`(`id`,`url`,`producto_id`,`created_at`,`updated_at`) values (145,'/storage/imagenes/VhrTWoUh16ggtmrM6O8S8AFIm1gDuPU5J41U0yXV.png',495560,'2020-11-04 01:24:17','2020-11-04 01:24:17'),(146,'/storage/imagenes/zrIlHqbZMLmNH8OfxG9KF5NQXsg2hKBZ1IG1H5fA.png',495560,'2020-11-04 01:24:18','2020-11-04 01:24:18'),(147,'/storage/imagenes/87z0OVSwOwrzeMYybZaAbthc3AZWDQnvvEl4RV69.png',495560,'2020-11-04 01:24:18','2020-11-04 01:24:18'),(149,'/storage/imagenes/pItq8nwBVLsAo0SdVbjRs76x2elu3lLLPDNR7uIO.jpeg',1,'2020-11-04 01:49:14','2020-11-04 01:49:14'),(157,'/storage/imagenes/BO5XuYPbvZuISBSL5u13qFLQMspuQMmMc0z0zmPn.png',2,'2020-11-04 01:57:21','2020-11-04 01:57:21'),(158,'/storage/imagenes/8dCuIA1kZ4TVHAw2xmqpki9lL8xAasv9tvQ2wUqv.png',2,'2020-11-04 01:57:29','2020-11-04 01:57:29'),(159,'/storage/imagenes/Oe10mJ4p7SkskFY84RDWi9dV7lW7J0Mtmsmjwcz8.jpeg',3,'2020-11-04 01:59:55','2020-11-04 01:59:55'),(160,'/storage/imagenes/y88ujGeBaJtSmrAeg82wv19odMxBNxRjj55WJkM4.jpeg',3,'2020-11-04 02:00:06','2020-11-04 02:00:06'),(161,'/storage/imagenes/pOpyWIM8K7VLARUK4sTC9Psh4EDAqaCrhhqsghcd.jpeg',4,'2020-11-04 02:02:12','2020-11-04 02:02:12'),(162,'/storage/imagenes/Mtc88SuRElMAGLqjOeZPi3GqWz1rTY5brFPjUY55.jpeg',4,'2020-11-04 02:02:17','2020-11-04 02:02:17'),(163,'/storage/imagenes/what4efjLAZqxMagsjezMO1hae09S4Hdc0SqMN3T.jpeg',4,'2020-11-04 02:02:17','2020-11-04 02:02:17'),(164,'/storage/imagenes/mVO6D14GOqA740zzeQV9DWqW1lf4Plrp2God0FmJ.jpeg',5,'2020-11-04 02:03:22','2020-11-04 02:03:22'),(165,'/storage/imagenes/n3CcaL3N2gWRYoVSCxpEYwxjSP4gMeNloK3GXLZE.png',2441883,'2020-11-04 02:12:36','2020-11-04 02:12:36'),(166,'/storage/imagenes/8CLxK3pg4zXEOzMmO0r7s3mIrwCNK8tTywvG9krH.jpeg',8541576,'2020-11-04 02:29:10','2020-11-04 02:29:10');

/*Table structure for table `migrations` */

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `migrations` */

insert  into `migrations`(`id`,`migration`,`batch`) values (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1),(3,'2019_08_19_000000_create_failed_jobs_table',1),(4,'2020_08_17_174531_create_compras_table',1),(5,'2020_08_17_175300_create_ventas_table',1),(6,'2020_08_17_175432_create_transaccions_table',1),(7,'2020_08_17_180107_create_opinions_table',1),(8,'2020_08_17_182320_create_productos_table',1),(9,'2020_08_17_184244_create_categorias_table',1),(10,'2020_08_17_184421_create_preguntas_table',1),(11,'2020_08_17_185147_create_respuestas_table',1),(12,'2020_08_17_195701_create_pagos_table',1),(13,'2020_08_17_200116_create_envios_table',1),(14,'2020_08_17_200439_create_favoritos_table',1),(15,'2020_08_17_202628_create_provincias_table',1),(16,'2020_08_17_214807_create_permission_tables',1);

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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `opinions` */

insert  into `opinions`(`id`,`opinion`,`tipo`,`aporta_id`,`user_id`,`created_at`,`updated_at`) values (1,'Grande crack, maquina','Positivo',2,1,NULL,NULL),(2,'vales 3 atados bro, F por ti','Negativo',2,1,NULL,NULL),(3,'Ni ni','Positivo',2,1,NULL,NULL);

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
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `preguntas` */

insert  into `preguntas`(`id`,`pregunta`,`producto_id`,`user_id`,`created_at`,`updated_at`) values (1,'Aun tiene disponible?',2,2,'2020-09-11 21:20:35',NULL),(2,'Cuanto con envio a babahoyo karnal',2,3,'2020-09-11 21:20:36',NULL),(37,'Necesito unos 400 de estos para trabajar al por mayor, crees que puedas conseguirlos?',2,1,'2020-09-12 03:55:44','2020-09-12 03:55:44'),(38,'ola porsicaso zbe si tiene blutu',2,1,'2020-09-12 04:03:56','2020-09-12 04:03:56'),(39,'jeremito es geysisisisisimo jeje xd',3,2,'2020-10-13 16:12:01','2020-10-13 16:12:01'),(40,'jeremito esta enamorado de luchito duermen abrazados',3,2,'2020-10-13 16:12:24','2020-10-13 16:12:24'),(41,'a jeremito le gusta cara de ano, le va a regalar una vaca',3,2,'2020-10-13 16:12:48','2020-10-13 16:12:48'),(42,'luchito es gay',2,2,'2020-10-16 02:33:44','2020-10-16 02:33:44'),(43,'dgsdhdfhtth\n',1,1,'2020-10-30 21:15:11','2020-10-30 21:15:11');

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

insert  into `productos`(`id`,`name`,`caracteristicas`,`descripcion`,`precio`,`stock`,`estado`,`categoria_id`,`created_at`,`updated_at`) values (1,'smartphone prron','jsjjsjjj un celular bien bonito krnal la dvd compralo 100x100 recomendado jjjj','kk',200.000,3,'Usado',1,NULL,NULL),(2,'Xiaomi Mi Note 10 / Mi Note 10 Lite 64gb $355 Acpt Tarjet','celular de alta gama y ultima generacion','***************************************************************************************************\r\nContamos con servicio de Data Móvil que te permite pagar con tarjeta de crédito o débito en el \r\nlugar que te encuentres; aplica para Quito y Valles. Paga on-line desde nuestra página web, \r\naceptamos PAYCLUB, BDP WALLET, transferencia, efectivo o depósito. Servicio contra entrega.\r\n\r\nIMPORTANTE PARA TI.\r\nEnviamos TODO EL PAÍS, INCLUIDO GALÁPAGOS mediante Servientrega. Cuando hayas verificado la \r\nguía de envío procedes hacer el depósito o pago electrónico, NO ANTES.\r\n***************************************************************************************************\r\nEquipos nuevos con año de garantía.\r\n\r\nXiaomi Mi Note 10, pantalla Super AMOLED Full HD+ de 6.47, Snapdragon 730G 6RAM y 128GB, cámara\r\n de 108 MP + 12 MP + 20 MP + 5 MP + 2 MP, selfies 32 MP, alojada en el frente con un notch, \r\nbatería de 5260 mAh, carga rápida 30W, USB-C, sonido HiFi, lector de huellas, MIUI 11 basado en \r\nAndroid 9.0 Pie.\r\n\r\nXiaomi Mi Note 10 Lite: pantalla AMOLED, 6.47 pulgadas Full HD+, Snapdragon 730G, 6RAM y 64GB, \r\ncámara cuádruple 64 MP, 8 MP, 2 MP y 5 MP, frontal de 16 MP, batería 5260 mAh, carga rápida, \r\naudio HiFi, lector de huellas, MIUI 11 basado en Android 10.\r\n\r\n\r\nHorarios de atención:\r\nLunes a Sábado (10h00 a 18h00)\r\nDomingos y feriados previa cita.\r\n\r\nSomos MercadoLíder Gold. Revisa nuestra reputación como vendedores.',410.230,100,'Nuevo',1,NULL,NULL),(3,'Samsung Galaxi note 10','Dispositivo de alta gama de samsung de ultima generacion ya esta aqui. celular','SAMSUNG NOTE10 LITE 128GB DUOS\r\n\r\n**********************************************************************************************************************\r\n\r\nEN THE CELL DEPOT PENSAMOS EN LA SEGURIDAD DE NUESTROS CLIENTES, POR LO TANTO, CUMPLIMOS CON TODAS LAS NORMAS DE SEGURIDAD Y SANIDAD EN NUESTRA\r\nOFICINA COMERCIAL\r\n\r\n*********************************************************************************************************************\r\n\r\nTHE CELL DEPOT PRESENTA:\r\n\r\n\r\nSAMSUNG NOTE10 LITE\r\n\r\n\r\nLISTO PARA ENTREGA INMEDIATA!!!!!!!\r\n\r\n\r\nTODOS NUESTROS EQUIPOS SON NUEVOS CON GARANTÍA EN ECUADOR.\r\n\r\n*********************************************************************************************************************\r\n\r\nEspecificaciones\r\n\r\nModelo: NOTE 10 LITE\r\nPantalla: 6.7 Pulgadas\r\nProcesador: Exynos 9810 Octa - Core 4x2.7Ghz\r\nRedes: GSM, 3G, 3.5G, HSPDA, LTE, 4G\r\nMemoria: 128GB, Expandible Micro SD card, 8GB RAM\r\nCámara Trasera: Triple, 12 MP (f/1.7, PDAF Dual Pixel, OIS, wide) + 12 MP (f/2.2, ultrawide) + 12 MP (f/2.4, PDAF, OIS, telefoto)\r\nCamara delantera: 32 MP, f/2.2, wide, HDR\r\nSensores: lector de huella (bajo pantalla), Desbloqueo Facial GPS, Acelerómetro, Giroscopio, Proximidad, Luz ambiental\r\nBatería: Fija de 4500 mAh\r\nColores: Negro, Rojo, Aura Glow\r\nIncluye: Caja Original, Celular, Cargador, Cable de Datos, Manos Libre, Manual\r\n\r\n*********************************************************************************************************************\r\n\r\nGarantía: 90 días por cualquier desperfecto de fabrica\r\n\r\nFormas de Pago: Efectivo, Trasferencias Bancarias, Tarjetas de Crédito, Criptomonedas\r\n\r\nEnvíos a todo el país a través de SERVIENTREGA\r\n\r\n*********************************************************************************************************************\r\n\r\nCELULARES DISPONIBLES EN NUESTRA TIENDA COMERCIAL\r\n\r\nXiaomi Redmi Note 8 Pro 128Gb en $255\r\n\r\nSamsung A31 64GB en $250\r\nSamsung A51 128GB en $305\r\nSamsung A71 128GB en $405\r\nSamsung S10 Lite 128GB en $540\r\nSamsung S10 128GB en $680\r\nSamsung S10 Plus 128GB en $765\r\nSamsung S20 128GB en $780\r\nSamsung S20 Plus 128GB en $825\r\nSamsung Note 10 Lite 128GB en $525\r\nSamsung Note 10 256GB en $790\r\nSamsung Note 10 Plus 256GB en $935\r\n\r\niPhone SE 2020 64GB en $530\r\niPhone SE 2020 128GB en $585\r\niPhone 11 128GB en $950\r\niPhone 11 Pro 256GB en $1435\r\niPhone 11 Pro Max 256GB en $1535\r\n\r\nAirPods Pro en $310\r\nAirPods 2da Generacion $195\r\nSamsung Galaxy Buds Plus $145\r\n\r\n\r\n\r\n*********************************************************************************************************************\r\n\r\nREVISE NUESTROS DEMÁS ARTÍCULOS PUBLICADOS EN MERCADO LIBRE.\r\n\r\nDE CLICK EN COMPRAR SIN COMPROMISO Y CON MUCHO GUSTO LES ENVIAREMOS NUESTRAS OFERTAS Y ESPECIALES.\r\n\r\nMUCHAS GRACIAS POR TOMAR EL TIEMPO DE VER NUESTRO PRODUCTO.\r\n\r\n\r\nTHE CELL DEPOT\r\n\r\n\r\nSAMSUNG NOTE10 LITE',600.500,25,'Usado',1,NULL,NULL),(4,'celular viejito','el telefono viejito mas rapido de totte italie fiauuuuuuuuuuuu','$20 cada uno\r\nSOLO POR MAYOR. No vendemos por unidad.\r\n* Tenemos en todos los colores\r\n* Venta mínima de una docena\r\n* Realizamos envíos a todo el Ecuador\r\n- Doble Chip\r\n- Cámara\r\n- Bluetooth\r\n- Radio\r\n- Linterna\r\n- Ranura tarjeta de Memoria',40.000,1,'Nuevo',1,NULL,NULL),(5,'playstation 5','Nuevo PlayStatio 5 ya esta aqui brrooooou unete a la aventura con mario y sus \r\namikos','*****Esta consola es una replica de la original playStation 5*****\r\nPolistation con forma de playstation 5',190.220,3,'Nuevo',5,NULL,NULL),(495560,'Consola Xbox One S 1 Tb 4k','Marca\r\nXbox\r\nModelo\r\nOne','Consola Xbox One S de 1Tb + 2 controles + HDMI + 4K\r\n\r\nLo mejor en entretenimiento en 4K\r\nStreaming en 4K\r\nHaz streaming de video Ultra HD 4K en Netflix y más.\r\nBlu-ray 4K\r\nDisfruta de las películas con lujo de detalle gracias al Blu-ray™ 4K Ultra HD.\r\nSonido espacial\r\nHaz que tus juegos y películas cobren vida con el sonido envolvente Dolby Atmos y DTS:X.5\r\nAplicaciones de entretenimiento interminables\r\nDisfruta de tus aplicaciones favoritas, como YouTube, Spotify y muchas más\r\n\r\nGarantía:',500.000,7,'Nuevo',5,'2020-11-03 22:30:05','2020-11-03 22:30:05'),(2441883,'Laptop hp 15-au018wm','Marca\r\nHP\r\nProcesador\r\nIntel Core i5\r\nDisco duro\r\n1000 GB','Descripción\r\nComputador Todo En Uno Hp Core i5 1000gb + 8gb Ram All In One Aio\r\n\r\nPrecio Incluye IVA y Factura\r\n\r\n===================Computador Incluye=====================\r\n\r\n-Procesador Intel core i5\r\n-Memoria Ram 8GB\r\n-Disco Duro 1TB\r\n-Teclado USB\r\n-Mouse óptico USB\r\n-Cámara web\r\n\r\n\r\n***No Compre a Vendedores que no le dan FACTURA y sus precios NO son incluido IVA, OJO puede que su mercadería no sea LEGAL en Ecuador y no tenga garantía local, no arriesgue su Inversión por comprar más barato***\r\n\r\n\r\n==========ENTREGA INMEDIATA A DOMICILIO (QUITO)=========\r\n-Entrega Totalmente Gratuita en Quito (Perímetro Urbano)\r\n-Resto del País por Servientrega (Costo 20 Dólares Adicionales)\r\n\r\n====================Formas de Pago========================\r\n-Efectivo\r\n-Cheques a Efectivizar\r\n-Depósitos\r\n-Transferencias\r\n-Aceptamos Todas las Tarjetas de Crédito (Precio Publicado + Costo de la Tarjeta + Respectivos Intereses del Diferido)\r\n-Tarjeta de Débito (Precio Publicado + Costo de la Tarjeta)\r\n\r\nCobramos Con Tarjeta de Crédito a Domicilio (Quito)\r\n\r\n======================Garantía==============================\r\n-1 Año contra defectos de fábrica en el CPU y Monitor\r\n-Periféricos 90 Días (Parlante, Teclado, Mouse)\r\n-La garantía no cubre Golpes, Presencia de elementos nocivos como: Líquidos, Ácidos, Fuego, Intemperie, Variaciones de Voltaje, Quemado\r\n-PD: El Trámite de Garantía no es a Domicilio\r\n\r\n=================Horarios de Atención=======================\r\n-Lunes a Sábado de 9 AM a 7 PM\r\n-Domingos y Feriados de 10 AM a 5 PM\r\n\r\n\r\n***OJO no reciba Notas de Venta que no respalde su compra y no tienen garantía, exija su FACTURA autorizada por el SRI***\r\n\r\n\r\n***Compre en empresas reconocidas que tienen Locales Físicos, tenemos más de 10 locales en la ciudad de Quito y Sangolqui, con Ventas concretadas en Mercado Libre y somos reconocidos como Mercado Líder GOLD Distinción que se da a las empresas serias y confiables con excelente reputación, su compra es 100% segura con nosotros, no pierda su inversión con otros vendedores que no le dan garantía***',899.000,26,'Usado',2,'2020-11-04 02:11:16','2020-11-04 02:11:16'),(8541576,'prueba google','gbcxcgnfhhmghmghmg','vbcvghmgfmgfmfgmfgm',52.000,100,'Nuevo',2,'2020-11-04 02:28:58','2020-11-04 02:28:58');

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `transaccions` */

insert  into `transaccions`(`id`,`compra_id`,`venta_id`,`pago_id`,`envio_id`,`created_at`,`updated_at`) values (1,1,1,1,1,NULL,NULL),(2,2,162850,1,1,NULL,NULL);

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
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_cedula_unique` (`cedula`),
  UNIQUE KEY `users_email_unique` (`email`),
  KEY `users_provincia_id_index` (`provincia_id`),
  CONSTRAINT `users_provincia_id_foreign` FOREIGN KEY (`provincia_id`) REFERENCES `provincias` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `users` */

insert  into `users`(`id`,`cedula`,`name`,`apellido_pater`,`apellido_mater`,`direc`,`provincia_id`,`tlf`,`picture`,`email`,`email_verified_at`,`password`,`remember_token`,`created_at`,`updated_at`) values (1,'1206855593','Martin','Ronquillo','Vargas','Pedro Carbo',1,'2735416',NULL,'marticarcel@hotmail.com',NULL,'$2y$10$9B9lRGWCnVpZW772Rscn8e8fiRRPd/5KdmxEw/KZ0qU77pc7d.sb.',NULL,'2020-09-08 19:19:42','2020-09-08 19:19:42'),(2,'1206855594','Mariana','Quisirumbay','Armijo','Las Naves',3,'2735417',NULL,'mariana@gmail.com',NULL,'$2y$10$qnGNRW9sXjZGglRWKiwRZOT2sGpuDd3g3jvmFZgLRPTuE06dxB832',NULL,'2020-09-08 19:19:42','2020-09-08 19:19:42'),(3,'gRlq28kjLp','Pansy Bayer','Sporer','Collins','Voluptatem dolore sunt voluptatum quia.',2,'+14219091314',NULL,'ckoch@example.com','2020-09-08 19:19:42','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','iyIqoPxUZ7','2020-09-08 19:19:42','2020-09-08 19:19:42'),(4,'PPbsuu43Au','Matt Kihn','Bernhard','Ortiz','Sit sit rerum veritatis qui libero.',4,'725-366-1712',NULL,'wuckert.mariela@example.net','2020-09-08 19:19:42','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','053YX7ULr7','2020-09-08 19:19:42','2020-09-08 19:19:42'),(5,'BtolvOXZHv','Santiago Mayert Sr.','Volkman','Runolfsson','Cumque eos necessitatibus consequatur eius ut optio.',1,'+1-530-872-9460',NULL,'candice.hudson@example.com','2020-09-08 19:19:42','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','XxcdDFmZ1b','2020-09-08 19:19:42','2020-09-08 19:19:42'),(6,'6aDyv6o3gT','Ena Conroy PhD','McKenzie','Halvorson','Odio veritatis voluptatibus molestiae non eius qui.',2,'765-496-3190',NULL,'camden08@example.com','2020-09-08 19:19:42','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','oyPvSBpsH2','2020-09-08 19:19:42','2020-09-08 19:19:42'),(7,'w70p1sRKak','Jean Kshlerin','Jerde','Cummerata','Accusantium reprehenderit asperiores ut natus.',5,'(209) 483-6449',NULL,'abagail.quitzon@example.net','2020-09-08 19:19:42','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','s5fnGVd1u7','2020-09-08 19:19:42','2020-09-08 19:19:42'),(8,'QdbeK9fFEC','Elvie Rosenbaum PhD','Rippin','Lowe','Quas repellendus iste totam assumenda ut odio.',6,'341-661-7959 x77748',NULL,'katharina.christiansen@example.net','2020-09-08 19:19:42','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','MNkwm0I9vb','2020-09-08 19:19:42','2020-09-08 19:19:42'),(9,'zRBNRnpcIg','Laron DuBuque','Hegmann','Bailey','Sapiente voluptates et consequatur quia.',1,'424-780-4445',NULL,'cristina10@example.com','2020-09-08 19:19:42','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','ExzKIX4Xpp','2020-09-08 19:19:42','2020-09-08 19:19:42'),(10,'LVWXDzSI8X','Carey Nitzsche','McLaughlin','Schimmel','Quibusdam et impedit sunt temporibus tenetur facere.',1,'+1-918-871-7547',NULL,'casandra71@example.net','2020-09-08 19:19:42','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','7CzFSkNzIu','2020-09-08 19:19:42','2020-09-08 19:19:42'),(11,'m2dfbPzT9r','Prof. Alison Kris II','Gerlach','Strosin','Placeat ut et modi distinctio accusamus tempora.',1,'1-989-573-5770',NULL,'fleuschke@example.com','2020-09-08 19:19:42','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','rxpFwvf8ln','2020-09-08 19:19:42','2020-09-08 19:19:42'),(12,'qYY7BLUazG','Lee Muller','Cassin','Shanahan','Enim et perspiciatis minima incidunt consequuntur qui necessitatibus nemo.',1,'576-592-0697',NULL,'sporer.juston@example.com','2020-09-08 19:19:42','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','qxZgs0DrWj','2020-09-08 19:19:42','2020-09-08 19:19:42'),(13,'cZXfCLS3Sp','Ena Rohan DVM','Ullrich','Lueilwitz','Fugit temporibus beatae non excepturi quae veritatis aliquid.',1,'+1.542.821.0289',NULL,'will95@example.com','2020-09-08 19:19:42','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','6ZPAoWBbau','2020-09-08 19:19:42','2020-09-08 19:19:42'),(14,'LaqAIKr7Uw','Kelsie Murphy','Konopelski','Macejkovic','Veniam sit animi autem eius.',1,'+1-231-438-5660',NULL,'mosciski.daisha@example.net','2020-09-08 19:19:42','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','ksiImkaTzE','2020-09-08 19:19:42','2020-09-08 19:19:42');

/*Table structure for table `ventas` */

DROP TABLE IF EXISTS `ventas`;

CREATE TABLE `ventas` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `estado` enum('activo','finalizado','vendido','suspendido') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'activo',
  `producto_id` bigint(20) unsigned NOT NULL,
  `user_id` bigint(20) unsigned NOT NULL,
  `pago_id` bigint(20) unsigned NOT NULL,
  `envio_id` bigint(20) unsigned NOT NULL,
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

insert  into `ventas`(`id`,`estado`,`producto_id`,`user_id`,`pago_id`,`envio_id`,`created_at`,`updated_at`) values (1,'vendido',2,1,1,4,NULL,NULL),(2,'activo',1,2,1,1,NULL,NULL),(3,'vendido',3,2,2,3,NULL,NULL),(4,'activo',4,3,3,2,NULL,NULL),(5,'activo',5,4,1,1,NULL,NULL),(162850,'activo',2441883,1,1,1,'2020-11-04 02:11:16','2020-11-04 02:11:16'),(4151741,'activo',495560,1,1,1,'2020-11-03 22:30:05','2020-11-03 22:30:05'),(9127923,'activo',8541576,1,1,2,'2020-11-04 02:28:58','2020-11-04 02:28:58');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
