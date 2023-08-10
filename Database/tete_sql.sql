CREATE DATABASE  IF NOT EXISTS `tete_sql` /*!40100 DEFAULT CHARACTER SET utf8mb3 */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `tete_sql`;
-- MySQL dump 10.13  Distrib 8.0.32, for Win64 (x86_64)
--
-- Host: localhost    Database: tete_sql
-- ------------------------------------------------------
-- Server version	8.0.31

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
-- Table structure for table `adminposts`
--

DROP TABLE IF EXISTS `adminposts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `adminposts` (
  `id` char(2) NOT NULL,
  `pa_` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `adminposts`
--

LOCK TABLES `adminposts` WRITE;
/*!40000 ALTER TABLE `adminposts` DISABLE KEYS */;
INSERT INTO `adminposts` VALUES ('01','Josina Machel'),('02','Francisco Manyanga'),('03','Filipe Samuel Magaia'),('04','Mateus Sansão Mutemb'),('05','Samora Machel'),('06','Matundo'),('07','Chingodzi'),('08','Mpadwe'),('09','Degue');
/*!40000 ALTER TABLE `adminposts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `age_category`
--

DROP TABLE IF EXISTS `age_category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `age_category` (
  `id` char(2) NOT NULL,
  `cat` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `age_category`
--

LOCK TABLES `age_category` WRITE;
/*!40000 ALTER TABLE `age_category` DISABLE KEYS */;
INSERT INTO `age_category` VALUES ('01','Elderly - 70 years and Above'),('04','Child Headed'),('05','None');
/*!40000 ALTER TABLE `age_category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `app_parameters`
--

DROP TABLE IF EXISTS `app_parameters`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `app_parameters` (
  `id` char(2) NOT NULL,
  `pname` varchar(20) DEFAULT NULL,
  `pvalue` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `app_parameters`
--

LOCK TABLES `app_parameters` WRITE;
/*!40000 ALTER TABLE `app_parameters` DISABLE KEYS */;
INSERT INTO `app_parameters` VALUES ('01','Application  Name','Tete Sanitation Project'),('02','Application Footer','Tete Municipal Council'),('03','City','Tete'),('04','Project Target','16000'),('05','Admin Mail','wkabango@gmail.com');
/*!40000 ALTER TABLE `app_parameters` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bairros`
--

DROP TABLE IF EXISTS `bairros`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `bairros` (
  `id` char(3) NOT NULL,
  `admin_post` char(2) DEFAULT NULL,
  `bairro` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bairros`
--

LOCK TABLES `bairros` WRITE;
/*!40000 ALTER TABLE `bairros` DISABLE KEYS */;
INSERT INTO `bairros` VALUES ('057','06','19 de Outubro'),('056','06','Cambinde'),('055','05','Castro Teófilo'),('054','05','Graça Machel'),('053','05','4 de Outubro'),('052','05','21 de Março'),('051','05','25 de Junho'),('050','05','3 de Fevereiro'),('049','05','Canongola'),('048','05','7 de Setembro'),('047','05','Caloera'),('046','05','Luciano Guiraze'),('045','05','Sacambuera'),('044','04','Mphanda Potepote'),('043','04','Eduardo Mondlane'),('042','04','Chimadzi B'),('041','04','Chimadzi A'),('040','04','Graça Machel'),('039','04','José Moiane'),('038','04','Chicolodwe'),('037','04','21 de Março'),('036','04','Wisky Provera'),('035','04','Nelson Mandela'),('034','04','Maria da Luz Guebuza'),('033','04','Marcelino dos Santos'),('032','04','Luisa Diogo'),('031','04','Mateus Sansão Mutemba'),('030','04','Lázaro Vinho'),('029','04','Julius Nyerere'),('028','04','Fernando Matavel'),('027','04','Nhantsato'),('026','04','Paulo Samuel Kamkhomba'),('025','04','Nhachulule'),('024','04','César de Carvalho'),('023','04','António Amatai'),('022','04','Alberto Chipande'),('021','04','Acordos de Lusaka'),('020','03','Massingir B'),('019','03','Massingir A'),('018','03','Cheque Banda'),('017','03','Nhamabira'),('016','03','Mulambe Ndachira'),('015','02','Popular'),('014','02','Sérgio Vieira'),('013','02','Chingale'),('012','02','Dimaca'),('011','02','Fumbe'),('010','02','Mariano Matsinhe'),('009','02','Armando Tivane'),('008','02','Cândido Aurélio'),('007','02','Emília Daússe'),('006','01','Moisés de Carvalho'),('005','01','Chipsuede'),('004','01','Eduardo Mulembwe'),('003','01','João Bacacheza'),('002','01','Elias Tembe'),('001','01','João Amaral'),('058','06','Canhungue'),('059','06','Castro Teófilo'),('060','06','Nsonha'),('061','06','Alberto Vaquina'),('062','06','7 de Abril'),('063','06','1 de Maio'),('064','06','Luala'),('065','06','Nhakhombe'),('066','06','Nhamatica'),('067','06','Julius Nyerere'),('068','06','Isaura Nyusi'),('069','06','Mulungudzi'),('070','06','Chimbonde'),('071','06','Nhaufa'),('072','06','Caphaia'),('073','07','7 de Abril'),('074','07','Cesar de Carvalho'),('075','07','8 de Março'),('076','07','3 de Janeiro'),('077','07','Juventude'),('078','07','Nhacumbe'),('079','07','Chirowa'),('080','07','Armando Guebuza'),('081','07','Albano'),('082','07','Aeroporto'),('083','07','21 de Março'),('084','07','Joaquim Chissano'),('085','07','Gungunhana'),('086','07','25 de setembro'),('087','07','Filipe Jacinto Nyusi'),('088','08','Vila Nova'),('089','08','Acordo de Roma'),('090','08','Nhacadeche'),('091','08','21 de Março'),('092','08','Chivule'),('093','08','Cambriguinho'),('094','08','Chimulambe'),('095','08','Mafilipa'),('096','08','Congolongondo'),('097','08','Massacre de Wiriamu'),('098','09','Degue-sede'),('099','09','Cesar de Carvalho'),('100','09','Mufa'),('101','09','Chiringa'),('102','09','Cassica-Tchaca'),('103','09','Macoa'),('104','09','Nhausa'),('105','09','Casseta'),('106','09','Nhankalanguewa'),('107','09','Chigamanda'),('108','09','Changhdhue'),('109','09','Mithanha');
/*!40000 ALTER TABLE `bairros` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `contractors`
--

DROP TABLE IF EXISTS `contractors`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `contractors` (
  `id` int NOT NULL AUTO_INCREMENT,
  `fullname` varchar(30) DEFAULT NULL,
  `username` varchar(30) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `address` varchar(30) DEFAULT NULL,
  `phone` varchar(10) DEFAULT NULL,
  `status` char(1) DEFAULT NULL,
  `noprojects` int DEFAULT NULL,
  `code` char(4) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contractors`
--

LOCK TABLES `contractors` WRITE;
/*!40000 ALTER TABLE `contractors` DISABLE KEYS */;
/*!40000 ALTER TABLE `contractors` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `hh_latrine`
--

DROP TABLE IF EXISTS `hh_latrine`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `hh_latrine` (
  `id` char(2) NOT NULL,
  `type_` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hh_latrine`
--

LOCK TABLES `hh_latrine` WRITE;
/*!40000 ALTER TABLE `hh_latrine` DISABLE KEYS */;
INSERT INTO `hh_latrine` VALUES ('01','Unlined Pit Latrine'),('02','Semi-lined Pit Latrine'),('03','Fully Lined Pit Latrine'),('04','None');
/*!40000 ALTER TABLE `hh_latrine` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `hh_project_status`
--

DROP TABLE IF EXISTS `hh_project_status`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `hh_project_status` (
  `id` char(2) NOT NULL,
  `status` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hh_project_status`
--

LOCK TABLES `hh_project_status` WRITE;
/*!40000 ALTER TABLE `hh_project_status` DISABLE KEYS */;
INSERT INTO `hh_project_status` VALUES ('00','Not Registered'),('01','Registered'),('02','Verified and Accepted'),('03','Selected Product'),('04','Product Selection Approved'),('05','Payment Received'),('06','Payment Approved'),('07','Contractor Allocated'),('08','Works Started'),('09','Works Completed'),('10','Completion Certificated');
/*!40000 ALTER TABLE `hh_project_status` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `home_status`
--

DROP TABLE IF EXISTS `home_status`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `home_status` (
  `id` char(2) NOT NULL,
  `status_` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `home_status`
--

LOCK TABLES `home_status` WRITE;
/*!40000 ALTER TABLE `home_status` DISABLE KEYS */;
INSERT INTO `home_status` VALUES ('01','Home Owner'),('02','Resident Landlord'),('03','Absent Landlord');
/*!40000 ALTER TABLE `home_status` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `household_status`
--

DROP TABLE IF EXISTS `household_status`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `household_status` (
  `id` char(2) NOT NULL,
  `status_` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `household_status`
--

LOCK TABLES `household_status` WRITE;
/*!40000 ALTER TABLE `household_status` DISABLE KEYS */;
INSERT INTO `household_status` VALUES ('01','Male Headed'),('02','Female Headed'),('03','Child Headed');
/*!40000 ALTER TABLE `household_status` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `households`
--

DROP TABLE IF EXISTS `households`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `households` (
  `hhcode` varchar(15) NOT NULL,
  `hhname` varchar(45) NOT NULL,
  `hh_gender` char(2) DEFAULT '01',
  `blno` varchar(13) DEFAULT NULL,
  `plot` varchar(45) NOT NULL,
  `pa` char(2) DEFAULT NULL,
  `locality` char(3) DEFAULT NULL,
  `landmark` varchar(45) DEFAULT NULL,
  `homestatus` char(2) NOT NULL DEFAULT '06',
  `hh_status` char(2) DEFAULT '00',
  `phone1` varchar(14) NOT NULL DEFAULT '0999999999',
  `phone2` varchar(14) DEFAULT NULL,
  `pstatus` char(1) NOT NULL DEFAULT '0',
  `pOption` char(2) DEFAULT '00',
  `enrolled` char(1) NOT NULL DEFAULT '0',
  `hh_checked_products` char(1) NOT NULL DEFAULT '0',
  `agree_tcs` char(1) NOT NULL DEFAULT '0',
  `need_tg` char(1) NOT NULL DEFAULT '0',
  `ready_selection` char(1) NOT NULL DEFAULT '0',
  `total_ordered` int DEFAULT '0',
  `supestructure` char(2) DEFAULT '00',
  `prompted_by` char(2) DEFAULT '00',
  `product_approved` char(1) DEFAULT '0',
  `contractor_identified` char(1) DEFAULT '0',
  `contractor_allocated` char(1) DEFAULT '0',
  `contractor` varchar(7) DEFAULT NULL,
  `proj_started` char(1) DEFAULT '0',
  `current_status` char(2) DEFAULT '00',
  `rooms_rented` int DEFAULT '0',
  `no_pple_premises` int DEFAULT '0',
  `no_pple_premises_a_males` int DEFAULT '0',
  `no_pple_premises_a_females` int DEFAULT '0',
  `no_pple_premises_children` int DEFAULT '0',
  `current_toilet` char(2) DEFAULT '00',
  `selected_product` char(2) DEFAULT '00',
  `amount_owing` double DEFAULT '0',
  `tamount_paid` double DEFAULT '0',
  `water_connect` char(1) DEFAULT '0',
  `lat` float DEFAULT '0',
  `longi` float DEFAULT '0',
  `email` varchar(30) DEFAULT NULL,
  `deleted` char(1) DEFAULT '0',
  PRIMARY KEY (`hhcode`)
) ENGINE=MyISAM AUTO_INCREMENT=34 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `households`
--

LOCK TABLES `households` WRITE;
/*!40000 ALTER TABLE `households` DISABLE KEYS */;
/*!40000 ALTER TABLE `households` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `location_zone`
--

DROP TABLE IF EXISTS `location_zone`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `location_zone` (
  `id` char(2) NOT NULL,
  `l_zone` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `location_zone`
--

LOCK TABLES `location_zone` WRITE;
/*!40000 ALTER TABLE `location_zone` DISABLE KEYS */;
INSERT INTO `location_zone` VALUES ('01','On land Zoned as Residential Area'),('02','Within a Flood prone area'),('03','Within River Buffer'),('04','On Marginal Land'),('05','On Reserve Land');
/*!40000 ALTER TABLE `location_zone` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `main_livelihood`
--

DROP TABLE IF EXISTS `main_livelihood`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `main_livelihood` (
  `id` char(2) NOT NULL,
  `livelihood` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `main_livelihood`
--

LOCK TABLES `main_livelihood` WRITE;
/*!40000 ALTER TABLE `main_livelihood` DISABLE KEYS */;
INSERT INTO `main_livelihood` VALUES ('01','Begging'),('02','Ganyu'),('03','Petty Trading'),('04','Formal Employment'),('05','Informal Employement'),('06','Remittances'),('07','Pension'),('08','Subsistence Farming');
/*!40000 ALTER TABLE `main_livelihood` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `month_income`
--

DROP TABLE IF EXISTS `month_income`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `month_income` (
  `id` char(2) NOT NULL,
  `income` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `month_income`
--

LOCK TABLES `month_income` WRITE;
/*!40000 ALTER TABLE `month_income` DISABLE KEYS */;
INSERT INTO `month_income` VALUES ('01','At most MK 10,000.00'),('02','At most MK 30,000.00'),('03','At most MK 50,000.00'),('04','At most MK 100,000.00'),('05','Above MK 100,000.00');
/*!40000 ALTER TABLE `month_income` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `payment_options`
--

DROP TABLE IF EXISTS `payment_options`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `payment_options` (
  `oID` char(2) NOT NULL,
  `oName` varchar(15) DEFAULT NULL,
  `oDescription` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`oID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `payment_options`
--

LOCK TABLES `payment_options` WRITE;
/*!40000 ALTER TABLE `payment_options` DISABLE KEYS */;
INSERT INTO `payment_options` VALUES ('01','Airtel Money','Airtel Money'),('02','Mpamba','Mpamba'),('03','Mo626','Mo626'),('04','Bank Deposit','Bank deposit'),('05','Direct Transfer','Direct Transfer'),('06','EFT','Eletronic Funds Transfer');
/*!40000 ALTER TABLE `payment_options` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `superstruct`
--

DROP TABLE IF EXISTS `superstruct`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `superstruct` (
  `id` char(2) NOT NULL,
  `struct` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `superstruct`
--

LOCK TABLES `superstruct` WRITE;
/*!40000 ALTER TABLE `superstruct` DISABLE KEYS */;
INSERT INTO `superstruct` VALUES ('01','Blocks'),('02','Bricks'),('03','prefab');
/*!40000 ALTER TABLE `superstruct` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `t_pay_full`
--

DROP TABLE IF EXISTS `t_pay_full`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `t_pay_full` (
  `id` int NOT NULL,
  `payfull` char(3) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `t_pay_full`
--

LOCK TABLES `t_pay_full` WRITE;
/*!40000 ALTER TABLE `t_pay_full` DISABLE KEYS */;
INSERT INTO `t_pay_full` VALUES (1,'yes'),(2,'no');
/*!40000 ALTER TABLE `t_pay_full` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `t_poor`
--

DROP TABLE IF EXISTS `t_poor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `t_poor` (
  `id` int NOT NULL,
  `poor` char(3) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `t_poor`
--

LOCK TABLES `t_poor` WRITE;
/*!40000 ALTER TABLE `t_poor` DISABLE KEYS */;
INSERT INTO `t_poor` VALUES (1,'yes'),(2,'no');
/*!40000 ALTER TABLE `t_poor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `t_vulnerable`
--

DROP TABLE IF EXISTS `t_vulnerable`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `t_vulnerable` (
  `id` int NOT NULL,
  `vulnerable` char(3) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `t_vulnerable`
--

LOCK TABLES `t_vulnerable` WRITE;
/*!40000 ALTER TABLE `t_vulnerable` DISABLE KEYS */;
INSERT INTO `t_vulnerable` VALUES (1,'yes'),(2,'no');
/*!40000 ALTER TABLE `t_vulnerable` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tconfig`
--

DROP TABLE IF EXISTS `tconfig`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tconfig` (
  `id` int NOT NULL AUTO_INCREMENT,
  `cmail` varchar(17) NOT NULL,
  `chost` varchar(21) NOT NULL,
  `cpass` varchar(8) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tconfig`
--

LOCK TABLES `tconfig` WRITE;
/*!40000 ALTER TABLE `tconfig` DISABLE KEYS */;
INSERT INTO `tconfig` VALUES (1,'lwsp@oss-lwsp.net','mail5019.site4now.com','lwsp-123');
/*!40000 ALTER TABLE `tconfig` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tcontractor`
--

DROP TABLE IF EXISTS `tcontractor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tcontractor` (
  `id` varchar(7) NOT NULL,
  `cemail` varchar(255) NOT NULL,
  `cname` varchar(50) NOT NULL,
  `caddress` varchar(255) NOT NULL,
  `phone` varchar(10) DEFAULT NULL,
  `token` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `cemail` (`cemail`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tcontractor`
--

LOCK TABLES `tcontractor` WRITE;
/*!40000 ALTER TABLE `tcontractor` DISABLE KEYS */;
/*!40000 ALTER TABLE `tcontractor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tgender`
--

DROP TABLE IF EXISTS `tgender`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tgender` (
  `id` char(2) NOT NULL,
  `gender` char(6) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tgender`
--

LOCK TABLES `tgender` WRITE;
/*!40000 ALTER TABLE `tgender` DISABLE KEYS */;
INSERT INTO `tgender` VALUES ('01','Male'),('02','Female');
/*!40000 ALTER TABLE `tgender` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tpayments`
--

DROP TABLE IF EXISTS `tpayments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tpayments` (
  `pID` int NOT NULL AUTO_INCREMENT,
  `hhCode` varchar(15) NOT NULL,
  `amount_paid` double DEFAULT '0',
  `pReference` varchar(45) DEFAULT NULL,
  `pDate` date DEFAULT NULL,
  `pApproved` char(1) DEFAULT '0',
  PRIMARY KEY (`pID`)
) ENGINE=MyISAM AUTO_INCREMENT=615 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tpayments`
--

LOCK TABLES `tpayments` WRITE;
/*!40000 ALTER TABLE `tpayments` DISABLE KEYS */;
/*!40000 ALTER TABLE `tpayments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tproducts`
--

DROP TABLE IF EXISTS `tproducts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tproducts` (
  `pID` char(2) NOT NULL,
  `pname` varchar(45) DEFAULT NULL,
  `pCost` double DEFAULT NULL,
  `pdescription` varchar(45) DEFAULT NULL,
  `filename_` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`pID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tproducts`
--

LOCK TABLES `tproducts` WRITE;
/*!40000 ALTER TABLE `tproducts` DISABLE KEYS */;
INSERT INTO `tproducts` VALUES ('01','VIP',45000.5,'SVIP','toilet1.jpg'),('02','Pour Flush + S',150000,'PFS','toilet2.png'),('03','Flush Flush + S',150000,'FFS',NULL);
/*!40000 ALTER TABLE `tproducts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tproject_progress`
--

DROP TABLE IF EXISTS `tproject_progress`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tproject_progress` (
  `recID` int NOT NULL AUTO_INCREMENT,
  `projID` varchar(15) NOT NULL,
  `status_date` date NOT NULL,
  `proj_status` char(2) DEFAULT '00',
  `filename_` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`recID`)
) ENGINE=MyISAM AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tproject_progress`
--

LOCK TABLES `tproject_progress` WRITE;
/*!40000 ALTER TABLE `tproject_progress` DISABLE KEYS */;
INSERT INTO `tproject_progress` VALUES (14,'2023/LWS/000003','2023-02-01','01',NULL),(13,'2023/LWS/000002','2023-01-09','05',NULL),(12,'2023/LWS/000003','2023-01-09','00',NULL),(11,'2023/LWS/000002','2023-01-10','01',NULL),(10,'2022/LWS/000001','2022-12-23','06',NULL),(9,'2022/LWS/000001','2022-12-29','05',NULL),(8,'2022/LWS/000001','2022-12-18','01',NULL),(15,'2023/LWS/000003','2023-02-01','01',NULL),(16,'2023/LWS/000003','2023-02-01','01',NULL),(17,'2023/TSP/000002','2023-04-12','02','Image 2023-04-05 at 14.00.38.jpg'),(18,'2023/TSP/000002','2023-04-12','04',NULL),(19,'2023/TSP/000003','2023-04-19','02',NULL),(20,'2023/TSP/000002','2023-04-19','05',NULL),(21,'2023/TSP/000002','2023-04-19','06',NULL),(22,'2023/TSP/000003','0000-00-00','00',NULL),(23,'2023/TSP/000003','0000-00-00','01',NULL),(24,'2023/TSP/000003','0000-00-00','01',NULL),(25,'2023/TSP/000003','0000-00-00','02',NULL),(26,'2023/TSP/000003','2023-05-15','02',NULL),(27,'2023/TSP/000003','0000-00-00','01',NULL),(28,'2023/TSP/000003','0000-00-00','01',NULL),(29,'2023/TSP/000003','2023-05-15','05',NULL);
/*!40000 ALTER TABLE `tproject_progress` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tproject_status`
--

DROP TABLE IF EXISTS `tproject_status`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tproject_status` (
  `id` char(2) NOT NULL,
  `status` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tproject_status`
--

LOCK TABLES `tproject_status` WRITE;
/*!40000 ALTER TABLE `tproject_status` DISABLE KEYS */;
INSERT INTO `tproject_status` VALUES ('00','Not Started'),('01','Works Started'),('02','Foundation '),('03','Slab'),('04','Super Structure'),('05','Works Completed'),('06','Completed Works Verified');
/*!40000 ALTER TABLE `tproject_status` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tprojects`
--

DROP TABLE IF EXISTS `tprojects`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tprojects` (
  `pID` varchar(15) NOT NULL,
  `phhcode` varchar(15) DEFAULT NULL,
  `pcontractorID` varchar(7) NOT NULL,
  `pCost` double NOT NULL,
  `pstartdate` date NOT NULL,
  `pfinishdate` date NOT NULL,
  `pcompletiondate` varchar(15) DEFAULT NULL,
  `pstatus` char(2) DEFAULT '00',
  `pstatus_approved` char(1) DEFAULT '0',
  `pCompletenessVerified` char(1) DEFAULT '0',
  `pCertificateProduced` char(1) DEFAULT '0',
  `pHandedOverHH` char(1) DEFAULT '0',
  `pHandedOverContractor` char(1) DEFAULT '0',
  `pdeleted` char(1) DEFAULT '0',
  PRIMARY KEY (`pID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tprojects`
--

LOCK TABLES `tprojects` WRITE;
/*!40000 ALTER TABLE `tprojects` DISABLE KEYS */;
/*!40000 ALTER TABLE `tprojects` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ttechnical_guide`
--

DROP TABLE IF EXISTS `ttechnical_guide`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ttechnical_guide` (
  `rec_id` varchar(8) NOT NULL,
  `hhcode` varchar(15) NOT NULL,
  `tg` varchar(255) NOT NULL,
  `tguider` varchar(45) NOT NULL,
  `tdate` date NOT NULL,
  PRIMARY KEY (`rec_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ttechnical_guide`
--

LOCK TABLES `ttechnical_guide` WRITE;
/*!40000 ALTER TABLE `ttechnical_guide` DISABLE KEYS */;
/*!40000 ALTER TABLE `ttechnical_guide` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `userroles`
--

DROP TABLE IF EXISTS `userroles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `userroles` (
  `roleid` char(2) NOT NULL,
  `rolename` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`roleid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `userroles`
--

LOCK TABLES `userroles` WRITE;
/*!40000 ALTER TABLE `userroles` DISABLE KEYS */;
INSERT INTO `userroles` VALUES ('00','guest'),('01','admin'),('02','pofficer'),('03','supervisor'),('04','contractor'),('05','household');
/*!40000 ALTER TABLE `userroles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `useremail` varchar(150) NOT NULL,
  `username` varchar(50) NOT NULL,
  `ustatus` char(1) DEFAULT '0',
  `password` varchar(255) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `userrole` char(2) DEFAULT '00',
  `usercon` varchar(15) DEFAULT '00',
  `userward` char(5) DEFAULT '00000',
  `userarea` char(4) DEFAULT '0000',
  `deleted` char(1) DEFAULT '0',
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `useremail` (`useremail`)
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (12,'wkabango@gmail.com','wkabango','1','$2y$10$QKL9khCGSQAMeGnSCiXPfekP7VfhWeADFcX0IKwllN382KAPl1gRW','5f115453f1e2d5820fa273c8020bc897675bc9aeff23f2ddbffdfc7f0f5062fed717db0cd8fde7ed68eceff733689530a209','01','00','00','00','0','2021-09-07 00:20:09'),(13,'guest@guest.com','guest3','1','$2y$10$Epash/iQGc9tsSukc0XSbOcr.6Xlg1V/sbtFE0ytN3OfC/CjLs6Tq',NULL,'00','00','00','00','0','2021-09-07 00:20:09'),(48,'admin@tete-itp.net','admin','1','$2y$10$r/S5MlVsq64GFyfT4wO.d.qq3iqUxWglm/Hv7w3R0xuFebpU8cx9G','4b95fe911618b6430e0c0aca0fb8294df03b24e04d8915f2d56d953585fe2344b5d9d2aef709a48ea0c7ef322c77549fb565','01','00','00','00','0','2023-08-10 04:15:48');
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

-- Dump completed on 2023-08-10  4:38:21
