/*
SQLyog Ultimate v13.1.1 (64 bit)
MySQL - 10.4.11-MariaDB : Database - polymorphic_one_to_one
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`polymorphic_one_to_one` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `polymorphic_one_to_one`;

/*Table structure for table `images` */

DROP TABLE IF EXISTS `images`;

CREATE TABLE `images` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `imageable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `imageable_id` bigint(20) unsigned NOT NULL,
  `path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `images_imageable_type_imageable_id_index` (`imageable_type`,`imageable_id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `images` */

insert  into `images`(`id`,`imageable_type`,`imageable_id`,`path`,`created_at`,`updated_at`) values 
(13,'App\\Post',25,'uploads/5f168193cca92.jpg','2020-07-21 05:48:03','2020-07-21 05:48:03'),
(14,'App\\Post',26,'uploads/5f1681a77d9aa.jpg','2020-07-21 05:48:23','2020-07-21 05:48:23'),
(15,'App\\User',23,'uploads/5f1681c713bea.jpg','2020-07-21 05:48:55','2020-07-21 05:48:55'),
(16,'App\\User',24,'uploads/5f1681ecf2a3f.jfif','2020-07-21 05:49:32','2020-07-21 05:49:32'),
(17,'App\\User',25,'uploads/5f16820434c66.jpg','2020-07-21 05:49:56','2020-07-21 05:49:56'),
(18,'App\\User',26,'uploads/5f1682192ddce.jfif','2020-07-21 05:50:17','2020-07-21 05:50:17'),
(19,'App\\Post',27,'uploads/5f1682c41bcfb.jpg','2020-07-21 05:53:08','2020-07-21 05:53:08');

/*Table structure for table `migrations` */

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `migrations` */

insert  into `migrations`(`id`,`migration`,`batch`) values 
(1,'2020_07_21_003705_create_users_table',1),
(2,'2020_07_21_003848_create_posts_table',1),
(3,'2020_07_21_003904_create_images_table',1),
(4,'2020_07_21_014113_add_path_to_images_table',2);

/*Table structure for table `posts` */

DROP TABLE IF EXISTS `posts`;

CREATE TABLE `posts` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `posts` */

insert  into `posts`(`id`,`title`,`created_at`,`updated_at`) values 
(25,'BMW','2020-07-21 05:48:03','2020-07-21 05:48:03'),
(26,'Yamaha','2020-07-21 05:48:23','2020-07-21 05:48:23'),
(27,'Honda','2020-07-21 05:53:08','2020-07-21 05:53:08');

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `users` */

insert  into `users`(`id`,`name`,`email`,`created_at`,`updated_at`) values 
(23,'Mazhar','mazhar_rony@yahoo.com','2020-07-21 05:48:55','2020-07-21 05:48:55'),
(24,'Imran','imran@gmail.com','2020-07-21 05:49:32','2020-07-21 05:49:32'),
(25,'Araf','araf@gmail.com','2020-07-21 05:49:56','2020-07-21 05:49:56'),
(26,'Rony','mazhar_rony@yahoo.com','2020-07-21 05:50:17','2020-07-21 05:50:17');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
