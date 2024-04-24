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
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `account` */

insert  into `account`(`account_id`,`user_type`,`user`,`pass`,`fname`,`lname`,`mname`,`email`,`department`,`number`) values 
(1,'FAE','jc','moralba','claude','','','jcmoralba@gmail.com','',0),
(4,'','','junmar','junmmma','rrriosa','','junmarpogi@gmail.com','FAE',91232312),
(5,'','','1234','dwqeqw','wadadaw','','test@gmail.com','FAE',9823423),
(6,'','','123','asd','asd','','qwecqwe2@yahoo.com','FAE',3123123),
(7,'','','123123','qwe','123','','qwecqwe2@yahoo.com','qwe',12123123),
(8,'','','1234','junmar','Rosario','','qwe@yahoo.com','FAE',9823423),
(9,'','','1234','junmar','Rosario','','qwe@yahoo.com','FAE',9823423),
(10,'','','junmar','Junmar','Rosario','','junmar@gmail.com','IT',2147483647);

/*Table structure for table `calendar_event_master` */

DROP TABLE IF EXISTS `calendar_event_master`;

CREATE TABLE `calendar_event_master` (
  `event_id` int(11) NOT NULL AUTO_INCREMENT,
  `event_name` varchar(255) DEFAULT NULL,
  `event_start_date` date DEFAULT NULL,
  `event_end_date` date DEFAULT NULL,
  PRIMARY KEY (`event_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

/*Data for the table `calendar_event_master` */

insert  into `calendar_event_master`(`event_id`,`event_name`,`event_start_date`,`event_end_date`) values 
(1,'party','2024-03-31','2024-04-01');

/*Table structure for table `client_list` */

DROP TABLE IF EXISTS `client_list`;

CREATE TABLE `client_list` (
  `client_id` int(11) NOT NULL AUTO_INCREMENT,
  `company_name` varchar(255) NOT NULL,
  `pdf` varchar(255) NOT NULL,
  `last_contacted` varchar(255) NOT NULL,
  `remark` varchar(255) NOT NULL,
  `total_sales` varchar(255) NOT NULL,
  PRIMARY KEY (`client_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `client_list` */

insert  into `client_list`(`client_id`,`company_name`,`pdf`,`last_contacted`,`remark`,`total_sales`) values 
(1,'zzz Company','002_PDF','11/2/2020','remarks2','50,000'),
(2,'1235646','1324345','','246576',''),
(3,'asdasd','asdasd','asdasd','asdsad','asdsadas');

/*Table structure for table `clients` */

DROP TABLE IF EXISTS `clients`;

CREATE TABLE `clients` (
  `client_ID` int(50) NOT NULL AUTO_INCREMENT,
  `cName` varchar(255) DEFAULT NULL,
  `cNum` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `company` varchar(255) DEFAULT NULL,
  `deleted` int(50) DEFAULT NULL,
  PRIMARY KEY (`client_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `clients` */

insert  into `clients`(`client_ID`,`cName`,`cNum`,`email`,`company`,`deleted`) values 
(1,'test','1234','test@gmail.com','testcompany',0),
(2,'Asd','123456789','123@123.com','123company',1);

/*Table structure for table `deals` */

DROP TABLE IF EXISTS `deals`;

CREATE TABLE `deals` (
  `dealID` int(50) NOT NULL AUTO_INCREMENT,
  `dName` varchar(255) NOT NULL,
  `dValue` int(50) NOT NULL,
  `dStage` varchar(255) NOT NULL,
  `datee` date DEFAULT NULL,
  `contacts_ID` int(50) NOT NULL,
  `isDeleted` int(50) NOT NULL,
  `contacts` varchar(255) NOT NULL,
  `orders` varchar(255) NOT NULL,
  `client_ID` int(50) DEFAULT NULL,
  PRIMARY KEY (`dealID`),
  KEY `contacts_ID` (`contacts_ID`),
  CONSTRAINT `deals_ibfk_1` FOREIGN KEY (`contacts_ID`) REFERENCES `contacts` (`contacts_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=58 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `deals` */

insert  into `deals`(`dealID`,`dName`,`dValue`,`dStage`,`datee`,`contacts_ID`,`isDeleted`,`contacts`,`orders`,`client_ID`) values 
(3,'CRM',100,'Negotation','2024-04-01',29,0,'21','cdo',1),
(4,'sda',131,'Qualification',NULL,29,1,'22','cdo',2),
(5,'asdaaaaaaa',132,'Qualified','2024-03-22',29,0,'23','cdo',1),
(6,'adsa',123,'Qualification',NULL,29,0,'24','cdo',2),
(7,'nice',1231,'New',NULL,29,0,'25','toyota',1),
(8,'dsa',12,'New','1970-01-01',29,0,'26','cdo',2),
(9,'asd',123,'New','1970-01-01',29,0,'27','cdo',1),
(10,'CRMMM',100,'Existing','1970-01-01',30,0,'28','cdo',2),
(11,'qeq',123,'New','2024-03-21',29,0,'29','cdo',1),
(12,'xx',1232,'New','2024-03-21',29,0,'30','cdo',2),
(13,'x1',1111,'Qualification','2024-03-22',29,0,'31','v',1),
(14,'QWEQW',1231,'New','2024-03-21',29,0,'32','v',2),
(15,'QEQWE',123,'New','2024-03-21',29,0,'33','v',1),
(16,'LAST',44,'New','2024-03-21',29,0,'34','cdo',2),
(17,'ngek',100,'Negotiation','2024-03-23',29,0,'35','cdo',1),
(21,'sir',1231,'Negotiation','2024-03-22',29,0,'36','cdo',2),
(23,'add',3424,'Negotiation','2024-03-23',29,0,'37','cdo',1),
(25,'mark',12,'Qualified','2024-03-22',29,0,'38','cdo',2),
(26,'sda',1231,'Qualified','2024-03-22',29,0,'39','cdo',1),
(28,'iiii',123,'Qualified','2024-03-22',29,0,'40','cdo',2),
(32,'asdas',123,'Qualified','2024-03-22',29,0,'41','cdo',1),
(33,'opop',88,'Qualified','2024-03-22',29,0,'42','cdo',2),
(36,'crmmmmmm',123333,'Negotiation','2024-03-22',31,0,'43','v',1),
(37,'asddd',1222,'Negotiation','2024-03-23',31,0,'44','v',2),
(38,'make',12344,'Negotiation','2024-03-23',31,0,'45','v',1),
(39,'yyyy',889,'In - Negotiation','2024-03-29',30,0,'46','v',1),
(53,'test',2,'Existing','2024-03-13',31,0,'2','wrench',1);

/*Table structure for table `events` */

DROP TABLE IF EXISTS `events`;

CREATE TABLE `events` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(500) NOT NULL,
  `description` varchar(500) NOT NULL,
  `deleted` int(1) NOT NULL DEFAULT 0,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `created_on` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `events` */

insert  into `events`(`id`,`title`,`description`,`deleted`,`start_date`,`end_date`,`created_on`) values 
(1,'Title 1','This the Description of title 1',1,'2024-03-12','2024-03-14',NULL),
(2,'sdkfj','ksdgjfskdf',1,'2024-03-12','2024-03-14',NULL),
(3,'asdas','asdasdasd',1,'2024-03-13','2024-03-21',NULL),
(4,'BLACK FRIDAY','Nigga',1,'2024-02-26','2024-03-22',NULL),
(5,'Title 1cfdf','askdjgashdihi',1,'2024-03-22','2024-03-26',NULL),
(6,'Event title 1123','Description of title event 1',1,'2024-03-22','2024-03-26',NULL),
(7,'asdas','hdajsda',1,'2024-03-01','2024-03-23',NULL),
(8,'asdasd','asdasd',1,'2024-03-01','2024-03-21',NULL);

/*Table structure for table `item_deals` */

DROP TABLE IF EXISTS `item_deals`;

CREATE TABLE `item_deals` (
  `item_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `prospect_id` int(11) NOT NULL,
  `account_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`item_id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `item_deals` */

insert  into `item_deals`(`item_id`,`name`,`prospect_id`,`account_id`) values 
(5,'test1',12,NULL),
(6,'test2',12,NULL),
(7,'test3',12,NULL),
(8,'aaaaaa',12,NULL),
(9,'zzzzzzzzzzz',13,NULL),
(10,'mmmm',13,NULL),
(11,'1111',13,NULL),
(12,'1111',12,NULL),
(13,'deals1',14,1),
(14,'deals2',14,1),
(15,'deals1',14,1),
(16,'deals2',14,1),
(17,'qqqq',15,1),
(18,'wwww',15,1),
(19,'eee',15,1),
(20,'qqqq',15,1),
(21,'wwww',15,1),
(22,'eee',15,1);

/*Table structure for table `new_prospect` */

DROP TABLE IF EXISTS `new_prospect`;

CREATE TABLE `new_prospect` (
  `prospect_id` int(11) NOT NULL AUTO_INCREMENT,
  `company_name` varchar(255) NOT NULL,
  `item_deals` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `remark` varchar(255) NOT NULL,
  `pdf` varchar(255) NOT NULL,
  `total_sales` varchar(255) NOT NULL,
  `last_contacted` datetime NOT NULL DEFAULT current_timestamp(),
  `date_added` date DEFAULT NULL,
  `account_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`prospect_id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `new_prospect` */

insert  into `new_prospect`(`prospect_id`,`company_name`,`item_deals`,`status`,`remark`,`pdf`,`total_sales`,`last_contacted`,`date_added`,`account_id`) values 
(4,'ZZZ Company','deals2','Close Deals','Remarks3','','40000','2024-04-05 07:11:58','2024-04-20',NULL),
(11,'ZZZ Company','deals2','Close Deals','Remarks3','google.com','20000','2024-04-11 21:45:52','2024-04-20',NULL),
(12,'ibm','','Meeting','pogi','','10000','2024-04-24 12:59:54','2024-04-21',0),
(13,'ABC Company','Deals1234','Close Deals','remarks 555','facebook.com','1000000.00','2024-04-11 21:48:30','2024-04-21',NULL),
(14,'ABC Company','     ','Contacted','remarks 555','google.com','50000.00','2024-04-23 20:43:05','2024-04-22',0),
(15,'zzz Company',' ','Contacted','remarks 555','google.com','50000.00','2024-04-23 18:35:12','2024-04-23',0);

/*Table structure for table `schedule_list` */

DROP TABLE IF EXISTS `schedule_list`;

CREATE TABLE `schedule_list` (
  `id` int(30) NOT NULL AUTO_INCREMENT,
  `title` text NOT NULL,
  `description` text NOT NULL,
  `start_datetime` datetime NOT NULL,
  `end_datetime` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `schedule_list` */

insert  into `schedule_list`(`id`,`title`,`description`,`start_datetime`,`end_datetime`) values 
(3,'aa','aa','2024-04-22 09:42:00','2024-04-27 09:42:00');

/*Table structure for table `status` */

DROP TABLE IF EXISTS `status`;

CREATE TABLE `status` (
  `status_id` int(11) NOT NULL AUTO_INCREMENT,
  `status_name` varchar(255) NOT NULL,
  PRIMARY KEY (`status_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `status` */

insert  into `status`(`status_id`,`status_name`) values 
(1,'Contacted'),
(2,'Meeting'),
(3,'Sent Quotations'),
(5,'In Negotiation'),
(6,'Close Deals');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
