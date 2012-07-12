# ************************************************************
# Sequel Pro SQL dump
# Version 3408
#
# http://www.sequelpro.com/
# http://code.google.com/p/sequel-pro/
#
# Host: localhost (MySQL 5.5.8)
# Database: contest_production
# Generation Time: 2012-02-20 14:04:30 +0800
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table contests
# ------------------------------------------------------------

DROP TABLE IF EXISTS `contests`;

CREATE TABLE `contests` (
  `contest_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `contest_name` char(255) NOT NULL DEFAULT '',
  `contest_description` text,
  `contest_created_on` date DEFAULT NULL,
  PRIMARY KEY (`contest_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

LOCK TABLES `contests` WRITE;
/*!40000 ALTER TABLE `contests` DISABLE KEYS */;

INSERT INTO `contests` (`contest_id`, `contest_name`, `contest_description`, `contest_created_on`)
VALUES
	(2,'CakePHP Contest','Competition for CakePHP','2012-03-01');

INSERT INTO `contests` (`contest_id`, `contest_name`, `contest_description`, `contest_created_on`)
VALUES
	(3,'PHP CodeFest 2012','Code in PHP','2012-02-18');

INSERT INTO `contests` (`contest_id`, `contest_name`, `contest_description`, `contest_created_on`)
VALUES
	(4,'This is a super long name of the contest to test the string length','test','2012-02-18');

/*!40000 ALTER TABLE `contests` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table contests_participants
# ------------------------------------------------------------

DROP TABLE IF EXISTS `contests_participants`;

CREATE TABLE `contests_participants` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `contest_id` bigint(20) unsigned NOT NULL,
  `participant_id` bigint(20) unsigned NOT NULL,
  `entry_date` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `idx_cp` (`contest_id`,`participant_id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

LOCK TABLES `contests_participants` WRITE;
/*!40000 ALTER TABLE `contests_participants` DISABLE KEYS */;

INSERT INTO `contests_participants` (`id`, `contest_id`, `participant_id`, `entry_date`)
VALUES
	(6,2,2,'2012-02-17');

INSERT INTO `contests_participants` (`id`, `contest_id`, `participant_id`, `entry_date`)
VALUES
	(12,2,3,'2012-02-17');

INSERT INTO `contests_participants` (`id`, `contest_id`, `participant_id`, `entry_date`)
VALUES
	(13,2,4,'2012-02-17');

INSERT INTO `contests_participants` (`id`, `contest_id`, `participant_id`, `entry_date`)
VALUES
	(16,4,4,'2012-02-18');

INSERT INTO `contests_participants` (`id`, `contest_id`, `participant_id`, `entry_date`)
VALUES
	(25,2,5,'2012-02-19');

/*!40000 ALTER TABLE `contests_participants` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table participants
# ------------------------------------------------------------

DROP TABLE IF EXISTS `participants`;

CREATE TABLE `participants` (
  `participant_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `participant_name` char(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`participant_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

LOCK TABLES `participants` WRITE;
/*!40000 ALTER TABLE `participants` DISABLE KEYS */;

INSERT INTO `participants` (`participant_id`, `participant_name`)
VALUES
	(3,'John Smith');

INSERT INTO `participants` (`participant_id`, `participant_name`)
VALUES
	(4,'Amelia Smith');

INSERT INTO `participants` (`participant_id`, `participant_name`)
VALUES
	(5,'Scott Williams');

INSERT INTO `participants` (`participant_id`, `participant_name`)
VALUES
	(6,'Randolph Ledesma');

/*!40000 ALTER TABLE `participants` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
