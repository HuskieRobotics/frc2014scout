# ************************************************************
# Sequel Pro SQL dump
# Version 4096
#
# http://www.sequelpro.com/
# http://code.google.com/p/sequel-pro/
#
# Host: 127.0.0.1 (MySQL 5.6.15)
# Database: yes
# Generation Time: 2014-03-08 19:07:54 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table alliance_table
# ------------------------------------------------------------

DROP TABLE IF EXISTS `alliance_table`;

CREATE TABLE `alliance_table` (
  `MATCH_NUM` int(11) NOT NULL,
  `NAME_OF_SCOUT` text NOT NULL,
  `ALLIANCE_COLOR` text NOT NULL,
  `HASH` int(11) NOT NULL,
  `preBallsOnField` int(11) NOT NULL,
  `allianceBallEndTime` text NOT NULL,
  `lateAutoReason` text NOT NULL,
  `allianceAutoPoints` int(11) NOT NULL,
  `allianceTeleopPoints` int(11) NOT NULL,
  `allianceFoulPoints` int(11) NOT NULL,
  `allianceTotalPoints` int(11) NOT NULL,
  `foulDescription` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `alliance_table` WRITE;
/*!40000 ALTER TABLE `alliance_table` DISABLE KEYS */;

INSERT INTO `alliance_table` (`MATCH_NUM`, `NAME_OF_SCOUT`, `ALLIANCE_COLOR`, `HASH`, `preBallsOnField`, `allianceBallEndTime`, `lateAutoReason`, `allianceAutoPoints`, `allianceTeleopPoints`, `allianceFoulPoints`, `allianceTotalPoints`, `foulDescription`)
VALUES
	(2,'sdf','blue',21,3,'9','',60,70,70,200,'1 technical 1 regular'),
	(71,'Kim','red',710,3,'23','',21,22,0,43,''),
	(71,'Adam','blue',711,1,'40','Robettes veered to side',15,40,0,55,''),
	(71,'Adam','blue',711,1,'40','Robettes veered to side',15,40,0,55,''),
	(72,'Adam','blue',721,3,'7','',65,30,0,95,''),
	(72,'Kim','red',720,3,'6','',65,71,0,136,'WE ARE AWESOME'),
	(73,'Adam','blue',731,1,'0','',5,52,0,57,'No balls at start'),
	(73,'Kim','red',730,2,'20','3883',25,22,0,47,'4986 almost pinned 3883'),
	(74,'Kim','red',740,1,'4','',30,30,0,60,''),
	(74,'Kim','red',740,1,'4','',30,30,0,60,''),
	(74,'Kim','red',740,1,'4','',30,30,0,60,''),
	(74,'Kim','red',740,1,'4','',30,30,0,60,''),
	(74,'Kim','red',740,1,'4','',30,30,0,60,''),
	(74,'Kim','red',740,1,'4','',30,30,0,60,''),
	(74,'Adam','blue',741,2,'12','Rolling rectangle tried auto',35,71,50,156,''),
	(74,'Adam','blue',741,2,'12','Rolling rectangle tried auto',35,71,50,156,''),
	(74,'Adam','blue',741,2,'12','Rolling rectangle tried auto',35,71,50,156,''),
	(74,'Adam','blue',741,2,'12','Rolling rectangle tried auto',35,71,50,156,''),
	(74,'Adam','blue',741,2,'12','Rolling rectangle tried auto',35,71,50,156,''),
	(76,'Adam','red',760,1,'5','',30,71,0,101,''),
	(76,'Kim','blue',761,2,'0','',30,71,0,101,'Last auto ball scored at 20. Estimated average cycle time 20-30 sec. '),
	(77,'Kim','red',770,2,'24','4207 missed high',30,71,50,151,'3755 possessed red alliance ball'),
	(77,'Adam','blue',771,2,'6','',50,40,50,140,'Red reached into field'),
	(78,'Kim','blue',781,1,'6','',30,80,0,110,''),
	(79,'Kim','blue',791,3,'0','',51,31,0,82,''),
	(80,'Yasha','blue',801,3,'31','',36,13,0,49,''),
	(80,'Yasha','blue',801,3,'31','',36,13,0,49,''),
	(80,'Kim','red',800,2,'66','3217 and 3883 missed high',15,23,0,38,''),
	(81,'Kim','red',810,3,'58','',10,61,0,71,''),
	(81,'Adam','blue',811,1,'39','',10,40,0,50,''),
	(82,'Kim','red',820,2,'4','',37,0,20,37,''),
	(82,'Kim','blue',821,3,'26','3054 missed high',45,40,0,105,''),
	(82,'Kim','blue',821,3,'26','3054 missed high',45,40,0,105,''),
	(83,'Adam','blue',831,2,'76','Rolling rectangle 5299 attempted auto',30,1,0,51,''),
	(83,'Kim','red',830,3,'104','',15,12,20,27,'Robot outside the safety zone'),
	(84,'Adam','blue',841,2,'88','Both screwed auto',10,2,0,12,''),
	(84,'Kim','red',840,1,'8','',30,30,0,60,''),
	(84,'Kim','red',840,1,'8','',30,30,0,60,''),
	(85,'Kim','blue',851,2,'5','',45,60,0,105,''),
	(85,'Adam','red',850,3,'8','',65,10,0,75,''),
	(86,'Adam','red',860,1,'42','3313 had awful  driving/shooting',15,30,0,95,''),
	(86,'Kim','blue',861,2,'5','',50,21,50,71,'Trapped a red ball in the corner'),
	(87,'Kim','red',870,1,'5','',30,70,0,100,''),
	(87,'Kim','red',870,1,'5','',30,70,0,100,''),
	(89,'Adam','red',890,3,'95','2 missed balls and awful shooting',35,12,0,47,''),
	(89,'Kim','blue',891,2,'54','',16,10,0,26,''),
	(90,'Adam','blue',901,2,'6','',45,61,0,106,''),
	(90,'Kim','red',900,3,'5','',47,62,0,109,''),
	(90,'Kim','red',900,3,'5','',47,62,0,109,''),
	(91,'Kim','red',910,2,'44','',30,1,50,31,'Human player reached into safety zone'),
	(92,'Adam','red',920,3,'22','Missed shots',30,61,0,91,''),
	(92,'Kim','blue',921,3,'7','',75,90,0,165,''),
	(93,'Kim','red',930,1,'0','',26,1,0,77,''),
	(93,'Adam','blue',931,3,'7','',51,60,50,111,'Inside frame perimeter of opposing bot'),
	(94,'Adam','red',940,2,'72','',30,10,20,60,''),
	(94,'Kim','blue',941,3,'23','',55,21,20,96,''),
	(95,'Adam','red',950,1,'0','No balls',15,3,0,18,''),
	(95,'Kim','blue',951,1,'0','',30,30,0,60,'No auto balls. ');

/*!40000 ALTER TABLE `alliance_table` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
