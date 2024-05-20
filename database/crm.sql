/*
SQLyog Community v13.2.1 (64 bit)
MySQL - 10.4.32-MariaDB : Database - crm
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`crm` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;

USE `crm`;

/*Table structure for table `account` */

DROP TABLE IF EXISTS `account`;

CREATE TABLE `account` (
  `account_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_type` varchar(255) NOT NULL,
  `user` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `mname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `department` varchar(255) NOT NULL,
  `number` int(11) NOT NULL,
  PRIMARY KEY (`account_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `account` */

insert  into `account`(`account_id`,`user_type`,`user`,`pass`,`fname`,`lname`,`mname`,`email`,`department`,`number`) values 
(1,'FAE','jc','moralba','claude','moralba','','jcmoralba@gmail.com','',0),
(4,'IT','','junmar','junmar','rosario','test','junmarpogi@gmail.com','FAE',91232312),
(5,'FAE','','1234','jaspher','tanghal','','jaspher@gmail.com','FAE',9823423),
(6,'IT','','1234','ferry','ruedas','','ferry@gmail.com','FAE',3123123),
(7,'FAE','','1234','sirjohn','quibol','','sirjohn@gmail.com','qwe',12123123),
(8,'FAE','','1234','spencer','samar','','spencer@gmail.com','FAE',9823423),
(9,'IT','','1234','yves','surname','','yves@gmail.com','FAE',9823423),
(10,'IT','','1234','adrian','reyes','','adrian@gmail.com','IT',2147483647),
(11,'IT','','1234','Mark','Doblon','','markdoblon946@gmail.com','IT',2147483647);

/*Table structure for table `admini` */

DROP TABLE IF EXISTS `admini`;

CREATE TABLE `admini` (
  `admin_id` int(50) NOT NULL AUTO_INCREMENT,
  `fullname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `role` varbinary(255) NOT NULL,
  `psswrd` varchar(255) NOT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `admini` */

insert  into `admini`(`admin_id`,`fullname`,`email`,`role`,`psswrd`) values 
(1,'TSM','hytec.tsm@gmail.com','TSM','3bfc7b35d1ee40e54c67cf658a826299a708bfa55fbe64fec8eb502ad3d59f49'),
(2,'ADMIN','hytec.admin@gmail.com','ADMIN','ac9689e2272427085e35b9d3e3e8bed88cb3434828b43b86fc0596cad4c6e270'),
(3,'FAE','hytec.fae@gmail.com','FAE','43abb860dd862cf140b1be33e010575a786fde0747727c3213c229bf711cbee9');

/*Table structure for table `attendance` */

DROP TABLE IF EXISTS `attendance`;

CREATE TABLE `attendance` (
  `attendance_id` int(11) NOT NULL AUTO_INCREMENT,
  `account_name` varchar(255) NOT NULL,
  `timein_datetime` date DEFAULT NULL,
  `timeout_datetime` date DEFAULT NULL,
  PRIMARY KEY (`attendance_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `attendance` */

insert  into `attendance`(`attendance_id`,`account_name`,`timein_datetime`,`timeout_datetime`) values 
(1,'claude','2024-05-17','2024-05-17'),
(2,'claude','2024-05-18','2024-05-18'),
(3,'claude','2024-05-18','2024-05-18'),
(4,'claude','2024-05-18',NULL);

/*Table structure for table `item_deals` */

DROP TABLE IF EXISTS `item_deals`;

CREATE TABLE `item_deals` (
  `item_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `prospect_id` int(11) NOT NULL,
  `account_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`item_id`)
) ENGINE=InnoDB AUTO_INCREMENT=225 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `item_deals` */

insert  into `item_deals`(`item_id`,`name`,`prospect_id`,`account_id`) values 
(5,'test1',12,NULL),
(6,'test2',12,NULL),
(7,'test3',12,NULL),
(8,'aaaaaa',12,NULL),
(12,'1111',12,NULL),
(50,'deals2',3,1),
(51,'deals1',3,1),
(52,'deals2',3,1),
(183,'honey',35,NULL),
(184,'bee',35,NULL),
(185,'tree house',35,NULL),
(195,'aircon',36,NULL),
(196,'tv',36,NULL),
(197,'window',36,NULL),
(200,'chair',33,NULL),
(207,'desk',4,NULL),
(208,'aircon',34,NULL),
(209,'monitor',38,1),
(210,'mouse',38,1),
(211,'lan cable',38,1),
(212,'chair',40,1),
(213,'aircon',40,1),
(214,'monitor',40,1),
(215,'chair',41,1),
(216,'aircon',41,1),
(217,'monitor',41,1),
(218,'chair',41,1),
(219,'aircon',41,1),
(220,'monitor',41,1),
(221,'chair',42,1),
(222,'aircon',42,1),
(223,'chair',37,NULL),
(224,'monitor',37,NULL);

/*Table structure for table `new_prospect` */

DROP TABLE IF EXISTS `new_prospect`;

CREATE TABLE `new_prospect` (
  `prospect_id` int(11) NOT NULL AUTO_INCREMENT,
  `company_name` varchar(255) NOT NULL,
  `item_deals` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `remark` varchar(255) NOT NULL,
  `pdf` varchar(255) NOT NULL,
  `quotation` blob NOT NULL DEFAULT 'Upon Request',
  `total_sales` varchar(255) NOT NULL,
  `last_contacted` datetime NOT NULL DEFAULT current_timestamp(),
  `date_added` date DEFAULT NULL,
  `account_id` int(11) DEFAULT NULL,
  `stat_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`prospect_id`)
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `new_prospect` */

insert  into `new_prospect`(`prospect_id`,`company_name`,`item_deals`,`status`,`remark`,`pdf`,`quotation`,`total_sales`,`last_contacted`,`date_added`,`account_id`,`stat_id`) values 
(4,'ISU','','PROSPECTING','','','REYES_MART_ADRIAN RESUME.pdf','40000','2024-05-16 16:21:53','2024-04-20',1,2),
(11,'ISU','deals2','Close Deals','Remarks3','google.com','REYES_MART_ADRIAN RESUME.pdf','20000','2024-04-11 21:45:52','2024-04-20',1,2),
(33,'HTU','','PRODUCT PRESENTATION','finished by the end of april','pdf','REYES_MART_ADRIAN RESUME.pdf','500000.00','2024-05-02 14:56:16','2024-05-01',1,2),
(34,'HTU','','SURVEY','','www.friendster.com','','1.00','2024-05-16 16:34:54','2024-05-01',1,2),
(35,'Hytec Power Inc. (HPI)','','SURVEY','pagkain','www.facebook.com','','500000.00','2024-05-02 09:20:58','2024-05-01',1,1),
(36,'DLSU','','PROSPECTING','CRUSHES','www.facebook.com','','10.00','2024-05-02 09:31:59','2024-05-01',1,3),
(37,'BSU','','PROSPECTING','','junmar','','1.00','2024-05-19 01:39:38','2024-05-14',4,2),
(38,'Quezon City University','','PROSPECTING','','google.com','Upon Request','50000.00','2024-05-16 16:36:11','2024-05-16',1,2),
(41,'CSTA','','PROSPECTING','','google.com','Upon Request','80000.00','2024-05-16 16:44:41','2024-05-16',1,1),
(42,'QCU','','PROPOSAL','','google.com','Upon Request','90000.00','2024-05-16 16:47:46','2024-05-16',1,1);

/*Table structure for table `notif_fae` */

DROP TABLE IF EXISTS `notif_fae`;

CREATE TABLE `notif_fae` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `details` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `notif_fae` */

insert  into `notif_fae`(`id`,`title`,`details`) values 
(1,'request','claude approved your request'),
(2,'request','jc rejected your request');

/*Table structure for table `remarks_history` */

DROP TABLE IF EXISTS `remarks_history`;

CREATE TABLE `remarks_history` (
  `remarks_id` int(11) NOT NULL AUTO_INCREMENT,
  `remarks_desc` varchar(255) DEFAULT NULL,
  `prospect_id` int(11) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `account_id` int(11) NOT NULL,
  PRIMARY KEY (`remarks_id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `remarks_history` */

insert  into `remarks_history`(`remarks_id`,`remarks_desc`,`prospect_id`,`date`,`account_id`) values 
(1,'meeting the client',36,'2024-05-02 15:33:31',1),
(2,'presenting equipment to BSU',34,'2024-05-01 16:00:54',1),
(3,'to be presented tomorrow at bulacan',34,'2024-05-02 16:00:54',1),
(4,'product presentation',35,'2024-05-07 13:45:16',4),
(5,'contact the prospect and present the equipment',36,'2024-05-07 14:33:18',5),
(6,'contact the client',37,'2024-05-14 09:57:14',6),
(7,'presenting deals in HPI',4,'2024-05-16 16:34:39',7),
(8,'contact boss for confirmation',38,'2024-05-16 16:36:11',1),
(9,'contact the client',40,'2024-05-16 16:44:38',1),
(10,'contact the client',41,'2024-05-16 16:44:39',1),
(11,'contact the client',41,'2024-05-16 16:44:41',1),
(12,'contact the client',42,'2024-05-16 16:47:46',1),
(20,'review quotation',33,'2024-05-19 01:18:12',1);

/*Table structure for table `schedule_list` */

DROP TABLE IF EXISTS `schedule_list`;

CREATE TABLE `schedule_list` (
  `id` int(30) NOT NULL AUTO_INCREMENT,
  `title` text NOT NULL,
  `description` text NOT NULL,
  `start_datetime` datetime NOT NULL,
  `end_datetime` datetime DEFAULT NULL,
  `employee_ID` int(50) DEFAULT NULL,
  `comments` varchar(255) DEFAULT NULL,
  `deleted` int(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `schedule_list` */

insert  into `schedule_list`(`id`,`title`,`description`,`start_datetime`,`end_datetime`,`employee_ID`,`comments`,`deleted`) values 
(4,'party','caloocan north','2024-04-26 15:20:00','2024-04-27 15:20:00',0,'',0),
(5,'Trail blazer ','Meeting for NCR Clients','2024-04-25 08:23:00','2024-04-25 10:23:00',1,'',0),
(6,'title','desc','2024-05-07 14:14:00','2024-05-09 14:14:00',1,'asd',0),
(7,'test2','test2','2024-05-07 14:36:00','2024-05-08 14:36:00',7,'',0),
(8,'Schneider Presentation','Bring all the ojts','2024-05-05 21:34:00','2024-05-05 00:37:00',0,'',0);

/*Table structure for table `status` */

DROP TABLE IF EXISTS `status`;

CREATE TABLE `status` (
  `status_id` int(11) NOT NULL AUTO_INCREMENT,
  `status_name` varchar(255) NOT NULL,
  PRIMARY KEY (`status_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `status` */

insert  into `status`(`status_id`,`status_name`) values 
(1,'PROSPECTING'),
(2,'PRODUCT PRESENTATION'),
(3,'SURVEY'),
(5,'PROPOSAL'),
(6,'NEGOTIATION CLOSING'),
(7,'DELIVERY'),
(8,'COLLECTION'),
(9,'AFTER SALES TRAINING AND SUPPORT'),
(10,'COMMISSIONING');

/*Table structure for table `status_approval` */

DROP TABLE IF EXISTS `status_approval`;

CREATE TABLE `status_approval` (
  `stat_id` int(11) NOT NULL AUTO_INCREMENT,
  `stat_name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`stat_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `status_approval` */

insert  into `status_approval`(`stat_id`,`stat_name`) values 
(1,'Pending'),
(2,'Approved'),
(3,'Rejected'),
(4,'Request');

/*Table structure for table `vw_newprospect` */

DROP TABLE IF EXISTS `vw_newprospect`;

/*!50001 DROP VIEW IF EXISTS `vw_newprospect` */;
/*!50001 DROP TABLE IF EXISTS `vw_newprospect` */;

/*!50001 CREATE TABLE  `vw_newprospect`(
 `prospect_id` int(11) ,
 `company_name` varchar(255) ,
 `item_deals` varchar(255) ,
 `status` varchar(255) ,
 `remark` varchar(255) ,
 `pdf` varchar(255) ,
 `quotation` blob ,
 `stat_name` varchar(255) 
)*/;

/*Table structure for table `vw_remarks` */

DROP TABLE IF EXISTS `vw_remarks`;

/*!50001 DROP VIEW IF EXISTS `vw_remarks` */;
/*!50001 DROP TABLE IF EXISTS `vw_remarks` */;

/*!50001 CREATE TABLE  `vw_remarks`(
 `remarks_id` int(11) ,
 `remarks_desc` varchar(255) ,
 `prospect_id` int(11) ,
 `date` datetime ,
 `account_id` int(11) ,
 `fname` varchar(255) ,
 `lname` varchar(255) ,
 `user_type` varchar(255) 
)*/;

/*View structure for view vw_newprospect */

/*!50001 DROP TABLE IF EXISTS `vw_newprospect` */;
/*!50001 DROP VIEW IF EXISTS `vw_newprospect` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`admin`@`%` SQL SECURITY DEFINER VIEW `vw_newprospect` AS select `new_prospect`.`prospect_id` AS `prospect_id`,`new_prospect`.`company_name` AS `company_name`,`new_prospect`.`item_deals` AS `item_deals`,`new_prospect`.`status` AS `status`,`new_prospect`.`remark` AS `remark`,`new_prospect`.`pdf` AS `pdf`,`new_prospect`.`quotation` AS `quotation`,`status_approval`.`stat_name` AS `stat_name` from (`new_prospect` join `status_approval` on(`status_approval`.`stat_id` = `new_prospect`.`stat_id`)) */;

/*View structure for view vw_remarks */

/*!50001 DROP TABLE IF EXISTS `vw_remarks` */;
/*!50001 DROP VIEW IF EXISTS `vw_remarks` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_remarks` AS select `e`.`remarks_id` AS `remarks_id`,`e`.`remarks_desc` AS `remarks_desc`,`e`.`prospect_id` AS `prospect_id`,`e`.`date` AS `date`,`e`.`account_id` AS `account_id`,`a`.`fname` AS `fname`,`a`.`lname` AS `lname`,`a`.`user_type` AS `user_type` from (`remarks_history` `e` join `account` `a` on(`e`.`account_id` = `a`.`account_id`)) */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
