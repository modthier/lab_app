-- Simple Backup SQL Dump
-- Version 1.0.3
-- https://www.github.com/coderatio/simple-backup/
--
-- Host: localhost:3306
-- Generation Time: Jan 08, 2023 at 10:31 AM
-- MYSQL Server Version: 10.4.24-MariaDB
-- PHP Version: 8.0.19
-- Developer: Josiah O. Yahaya
-- Copyright: Coderatio

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00"

--
-- Database: `lab`
-- Total Tables: 21
--

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `accounting`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `accounting` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `price` decimal(10,2) NOT NULL,
  `tab` varchar(255) NOT NULL COMMENT 'ph = pharmacy; sv= service_request; lab = checkup;',
  `item_id` int(11) NOT NULL,
  `service_id` int(11) NOT NULL,
  `status` tinyint(4) DEFAULT 0,
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `service_id` (`service_id`),
  CONSTRAINT `accounting_service_request_forign_id` FOREIGN KEY (`service_id`) REFERENCES `service_request` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `accounting`
--

LOCK TABLES `accounting` WRITE;
/*!40000 ALTER TABLE `accounting` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `accounting` VALUES (1,100.00,'lab',13,1,0,'2022-02-17 10:02:58'),(2,100.00,'lab',8,1,0,'2022-02-17 10:02:58'),(3,100.00,'lab',14,1,0,'2022-02-17 10:02:58'),(4,100.00,'lab',10,2,0,'2022-03-23 15:32:30'),(5,100.00,'lab',14,2,0,'2022-03-23 15:32:30'),(6,100.00,'lab',121,2,0,'2022-03-23 16:31:43'),(7,100.00,'lab',346,2,0,'2022-03-23 16:38:08'),(8,100.00,'lab',11,3,0,'2022-06-06 16:52:22'),(9,100.00,'lab',8,3,0,'2022-06-06 16:52:22'),(10,100.00,'lab',15,3,0,'2022-06-06 16:52:23'),(11,100.00,'lab',13,4,0,'2022-08-02 09:29:21'),(12,100.00,'lab',8,4,0,'2022-08-02 09:29:21'),(13,100.00,'lab',10,4,0,'2022-08-02 09:29:21'),(14,100.00,'lab',8,5,0,'2022-08-22 08:47:19'),(15,100.00,'lab',13,5,0,'2022-08-22 08:47:19'),(16,100.00,'lab',11,5,0,'2022-08-22 08:47:19'),(17,100.00,'lab',8,6,0,'2022-12-15 11:53:29'),(18,100.00,'lab',11,6,0,'2022-12-15 11:53:29'),(19,100.00,'lab',13,6,0,'2022-12-15 11:53:29'),(20,100.00,'lab',14,6,0,'2022-12-15 11:53:29'),(21,100.00,'lab',299,6,0,'2022-12-15 11:55:17'),(22,100.00,'lab',8,7,0,'2022-12-18 08:04:24'),(23,100.00,'lab',11,7,0,'2022-12-18 08:04:24'),(24,100.00,'lab',13,7,0,'2022-12-18 08:04:25'),(25,100.00,'lab',10,8,0,'2022-12-22 03:55:59'),(26,100.00,'lab',13,8,0,'2022-12-22 03:55:59'),(27,100.00,'lab',14,8,0,'2022-12-22 03:55:59'),(28,100.00,'lab',8,9,0,'2022-12-30 17:55:27'),(29,100.00,'lab',11,9,0,'2022-12-30 17:55:27'),(30,100.00,'lab',121,10,0,'2023-01-04 19:47:25'),(31,100.00,'lab',8,11,0,'2023-01-08 09:51:29'),(32,100.00,'lab',11,11,0,'2023-01-08 09:51:29');
/*!40000 ALTER TABLE `accounting` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `accounting` with 32 row(s)
--

--
-- Table structure for table `checkup`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `checkup` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `checkup_name` varchar(255) NOT NULL,
  `checkup_type` varchar(255) NOT NULL,
  `checkup_value` varchar(255) NOT NULL,
  `label` varchar(255) NOT NULL,
  `price` float NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=358 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `checkup`
--

LOCK TABLES `checkup` WRITE;
/*!40000 ALTER TABLE `checkup` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `checkup` VALUES (8,'ICT for malaria','single','selectionApp','60ba227b07ac1',100),(10,'TWBCs','single','number','60ba233870c78',100),(11,'ESR','single','number','60ba27e3a39bc',100),(13,'Hb','single','number','60ba28cf1e6b5',100),(14,'Urine for HCG','single','selectionApp','60ba296676de9',100),(15,'Blood group','single','selectionApp','60ba2a0f56395',100),(17,'Blood Urea','single','number','60ba3699f2c82',100),(18,'Serum Creatinine','single','number','60ba36e0d603f',100),(19,'Creatinine clearance','single','number','60ba372f801d6',100),(21,'BUN (Blood Urea Nitrogen)','single','number','60ba3bdef1740',100),(22,'Calsium/creatinine ratio','single','number','60ba3ce7758a0',100),(23,'Albumin/Creatinine ratio','single','number','60bc616b66dbc',100),(24,'Protein/Creatinine ratio','single','number','60bc64274209e',100),(25,'Serum Urea clearance','single','number','60bc64e29f567',100),(26,'24 hrs Urine Urea clearance','single','number','60bc650f402b4',100),(27,'Serum Uric Acid','single','number','60bc6555758c6',100),(28,'24 hrs Urine Uric Acid','single','number','60bc659159168',100),(29,'Uric Acid/Creatinine Ratio','single','number','60bc6681a4544',100),(30,'Serum Na⁺','single','number','60bc677c88a30',100),(31,'Serum K⁺','single','number','60bc67ade205d',100),(32,'Total Serum Ca⁺²','single','number','60bc680f7e775',100),(33,'Serum Ca⁺² (ionized)','single','number','60bc6868bb0e3',100),(34,'Serum Phosphrous','single','number','60bc68d91f575',100),(35,'24 hrs Urine Na⁺','single','number','60bc6975bbe6d',100),(36,'24 hrs urine K⁺','single','number','60bc6999eb0b8',100),(37,'Total Urine  Ca⁺²','single','number','60bc6a11a3d13',100),(38,'Serum Choloride','single','number','60bc6a379a8fe',100),(39,'24 hrs Urine Choloride','single','number','60bc6a925e10d',100),(40,'Serum Copper','single','number','60bc6ae9d4463',100),(41,'24 hrs Urine Copper','single','number','60bc6b74e436e',100),(42,'Serum Mg⁺² ','single','number','60bc6bde1a1e8',100),(43,'24 hrs Urine Mg⁺²','single','number','60bc6c616698a',100),(44,'Random Urine Mg⁺²','single','number','60bc6cbab3c9a',100),(45,'Serum Zn⁺²','single','number','60bc6d0dd6013',100),(46,'24 hrs Urine Zn⁺²','single','number','60bc6d639b738',100),(48,'Acid Phosaphatase ','single','number','60bc73149172a',100),(49,'Blood Glucose','single','number','60bc73610e23d',100),(50,'2 Hr PPBG','single','number','60bc73a4c3162',100),(51,'Fasting + 2Hrs 75 g Glucose','single','number','60bc73c45118a',100),(52,'HbA1c (glycosylated haemoglobin)','single','number','60bc74046d73a',100),(53,'ADH (Anti-diuretic hormone)','single','number','60bc744782f7f',100),(54,'Morning Urine- Micralbumin','single','number','60bc7477baac8',100),(55,'24 hrs Urine- Micralbumin','single','number','60bc74ab755ff',100),(56,'Serum Cholesterol','single','number','60bc74d479cba',100),(57,'Serum Triglceride','single','number','60bc74ef92b76',100),(58,'Serum HDL-Cholesterol','single','number','60bc75102e65e',100),(59,'Serum LDL-Cholesterol','single','number','60bc752d265cf',100),(60,'Serum VLDL','single','number','60bc754bdf72f',100),(61,'Serum Apolipoprotein A1','single','number','60bc7575525cb',100),(62,'Serum Apolipoprotein B','single','number','60bc75a5c88ed',100),(63,'Troponin-1','single','number','60bc75da3a800',100),(64,'Troponin-T','single','number','60bc75fd415bd',100),(65,'CK-MB','single','number','60bc76553ef8d',100),(66,'Total CPK','single','number','60bc76cb62ace',100),(67,'Serum - LDH','single','number','60bc76fb37bb7',100),(68,'Pro-BNP(pro B-type Natriuretic Peptide)','single','number','60bc774a2538a',100),(69,'Total bilirubin','single','number','60bc777b0fc3d',100),(70,'Direct bilirubin','single','number','60bc77a9f1624',100),(71,'Total Protein','single','number','60bc781445116',100),(72,'Serum Albumin','single','number','60bc785a3ada7',100),(73,'Glolulin','single','number','60bc78e68cf39',100),(74,'Ammonia','single','number','60bc79e68c181',100),(75,'SGPT (ALT)','single','number','60bc7a2004241',100),(76,'SGOT (AST)','single','number','60bc7a5d76302',100),(77,'ALP','single','number','60bc7ab8865a2',100),(78,'γGT','single','number','60bc7ae75aeef',100),(79,'Serum Amylase','single','number','60bc7b1365369',100),(80,'24 hrs Urine Amylase','single','number','60bc7b47d5106',100),(81,'Serum Lipase','single','number','60bc7b751c0a0',100),(82,'Angiotensin Converting Enzyme (ACE)','single','number','60bc7b9a4e5b4',100),(83,'Alcohol in urine or saliva','single','number','60bc7c84a271f',100),(84,'Amphetamines in Urine','single','number','60bc7cc6695ae',100),(85,'Barbiturates in urine','single','number','60bc7d2267ef8',100),(86,'Benzodiazepines in Urine','single','number','60bc7d53ca98e',100),(87,'Cannabinoids in Urine','single','number','60bc7d7c43dad',100),(88,'Cocaine in Urine','single','number','60bc7dca119c3',100),(89,'Opiate in Urine','single','number','60bc7e01085e5',100),(90,'Tramadol in Urine','single','number','60bc7e2e89c98',100),(91,'Serum Procalitonin (PCT)','single','number','60bc7eb467701',100),(92,'Serum Adenosine Deaminase (ADA)','single','number','60bc7f5f5d46e',100),(93,'Serum Vanillylmandelic acid (VAM)','single','number','60bc7f903f85c',100),(94,'Stool for Occult Blood','single','selectionApp','60bc8056a79c4',100),(95,'Serum Lactate','single','number','60bc80b265fd0',100),(96,'Serum Cholinesterase','single','number','60bc80e2e43de',100),(97,'Serum Aldolase','single','number','60bc8295ccfb0',100),(98,'Stool for Reducing Substances','single','selectionApp','60bc82d5c0134',100),(99,'Urine for Reducing Substances','single','selectionApp','60bc831a20afe',100),(100,'Stool PH','single','number','60bc849fa1489',100),(102,'Neutrophils %','appearance','number','60bc9d703eb23',0),(103,'Lymphocytes %','appearance','number','60bc9df4c0a69',0),(104,'Monocytes %','appearance','number','60bc9e241877f',0),(105,'Eosinophil %','appearance','number','60bc9e4c8b7bd',0),(106,'Basophil %','appearance','number','60bc9e7055502',0),(107,'Neutrophils (Abs)','appearance','number','60bc9ea26d444',0),(108,'Lymphocytes (Abs)','appearance','number','60bc9edb96cdd',0),(109,'Monocytes (Abs)','appearance','number','60bc9f1e195a3',0),(110,'Eosinophil (Abs)','appearance','number','60bc9f577eb31',0),(111,'Basophil (Abs)','appearance','number','60bc9f8e547fa',0),(112,'RBCs*','appearance','number','60bc9ff0b1d24',0),(113,'Hb','appearance','number','60bca03fbe8ea',0),(114,'HCT','appearance','number','60bca08147f12',0),(115,'MCV','appearance','number','60bca0b4283ba',0),(116,'MCH','appearance','number','60bca0e0191fc',0),(117,'MCHC','appearance','number','60bca1061d8af',0),(118,'PLT','appearance','number','60bca1318d62c',0),(119,'Comment :','appearance','text','60bca1c5623f7',0),(121,'Complete Blood Count','profile','profile','60bceb456b9d1',100),(124,'Serum Iron','single','number','60c1e65d84292',100),(125,'Serum Ferritin','single','number','60c1e6aa0250c',100),(126,'Total Iorn Binding Capacity (T.I.B.C)','single','number','60c1e6f48d069',100),(127,'Transferrin Saturation','single','number','60c1e72f12fd5',100),(128,'Bleedting Time ( B.T )','single','number','60c1e769dcaef',100),(129,'Prothrombin Time (PT)','single','number','60c21392d9470',100),(130,'Partial Thromboplastin Time (PTT)','single','number','60c213ce7e00c',100),(131,'International Normalised Ratio (INR)','single','number','60c2171de16e4',100),(132,'Anti-thrombin III','single','number','60c218205ef03',100),(133,'Alpha-1-antitrypsin','single','number','60c21845c15ae',100),(134,'EPO (Erythropoietin)','single','number','60c218a5b4b53',100),(135,'Beta2-microglobulin IgG & IgM','single','number','60c218e5f1c81',100),(136,'Ceruloplasmin','single','number','60c2194d228f2',100),(137,'Hemocystine','single','number','60c21a776dab9',100),(138,'Von will brand','single','number','60c21ef87bc23',100),(139,'Factor V','single','number','60c21f2377649',100),(140,'C3 (Complement 3)','single','number','60c21f539e001',100),(141,'C4 (Complement 4)','single','number','60c21f813123f',100),(142,'C1 Esterase Inhibitor','single','number','60c21faad7ab5',100),(143,'D-dimer','single','number','60c22659bafb7',100),(144,'Fibrinogen Level','single','number','60c2269357a70',100),(145,'FDP (Fibrinogen Degradation Products)','single','number','60c226cd0cbdc',100),(146,'Folic Acid','single','number','60c2271c141af',100),(147,'RBCs folate (EDTA)','single','number','60c2274dc65b7',100),(148,'G6PD (EDTA)','single','number','60c227c92aa8b',100),(149,'Hb.Electrophoresis (EDTA)','single','report','60c2283d30921',100),(150,'Serum Immunoglobulin - IgA','single','number','60c228be75bfb',100),(151,'CSF Immunoglobulin - IgA','single','number','60c22914d05e4',100),(152,'Serum Immunoglobulin - IgG','single','number','60c2295c98405',100),(153,'Urine Immunoglobulin - IgG','single','number','60c22a5ed2769',100),(154,'Serum Immunoglobulin - IgM','single','number','60c22aa6b0cfa',100),(155,'CSF Immunoglobulin - IgM','single','number','60c22ace40891',100),(156,'Total- IgE','single','number','60c22b29c0846',100),(157,'Lupus anticoagulant','single','number','60c22badb3eb3',100),(158,'Protein C','single','number','60c22c16a16b0',100),(159,'Protein electrophoresis','single','report','60c22c3e8751e',100),(160,'Protein S','single','number','60c22c63da989',100),(161,'Urine Transferrin','single','number','60c22c957ddaa',100),(162,'Serum Transferrin','single','number','60c22cc7e2f5c',100),(164,'Vitamin D Total','single','number','60c22dfdd1197',100),(165,'Vitamine D-25-OH','single','number','60c22e91c7ec3',100),(166,'Vitamin D3-1.25-OH','single','number','60c22ef9a06c2',100),(167,'Vitamin B12','single','number','60c22f251aa9a',100),(168,'Vitamin C (Ascorbic Acid )','single','number','60c22f4a62772',100),(169,'Serum TSH','single','number','60c230115a409',100),(170,'Serum T3','single','number','60c2309cabe42',100),(171,'Serum T4','single','number','60c23100a8147',100),(172,'FT3','single','number','60c23143a1c5b',100),(173,'FT4','single','number','60c2318d635bf',100),(174,'PTH','single','number','60c231acb8d60',100),(175,'S.anti TPO','single','number','60c231e20435b',100),(176,'Serum.Cortezole (am)','single','number','60c2355eea843',100),(177,'Serum.Cortezole (pm)','single','number','60c2359669a41',100),(178,'24 hrs Urine Cortezole (am)','single','number','60c235c192ee9',100),(179,'ACTH ','single','number','60c2363be38d4',100),(180,'Serum Insulin','single','number','60c23688b3fc2',100),(181,'C.peptide','single','number','60c236b600533',100),(182,'Groth Hormone','single','number','60c236fb58be2',100),(183,'Groth Hormone ( after exercise)','single','number','60c23785c91b8',100),(184,'Serum PCR for HIV (quantitative)','single','number','60c23839aed30',100),(185,'plasma PCR for HIV (EDTA)','single','number','60c23886d89e4',100),(186,'HIV Genotyping','single','report','60c238a36f2bf',100),(187,'Plasma PCR for HIV - 1&2 (EDTA)','single','number','60c238e48f6e5',100),(188,'Carcinoembryonic Antigen (CEA)','single','number','60c2398d450ce',100),(189,'Ca 15.3','single','number','60c239c00f1f1',100),(191,'Ca 125','single','number','60c23aef52387',100),(192,'Ca 19.9','single','number','60c4679fb150a',100),(193,'Total PSA','single','number','60c467df9e4e5',100),(194,'Free PSA','single','number','60c468c8ac96c',100),(195,'α.Feto Protein','single','number','60c46b257fd1c',100),(196,'β-HCG','single','number','60c46b5f6bd54',100),(197,'β-HCG free','single','number','60c46ce25e2c4',100),(198,'Calcitonin','single','number','60c46dcae515a',100),(199,'Thyroid Fuction Test','profile','profile','60c48550d0eed',100),(200,'Sickling test','single','selectionApp','60c8c3817e3ec',100),(201,'Direct Coomb`s Test (EDTA)','single','selectionApp','60c8c3da94425',100),(202,'Indirect Coomb`s Test','single','selectionApp','60c8c42ab9693',100),(203,'Bence Jonce protein in urine','single','selectionApp','60c8c48e8d070',100),(204,'TWBCs with differential','profile','profile','60c8c75522db7',100),(205,'BFFM','single','selectionApp','60c8c86446684',100),(206,'ICT for malaria','single','selectionApp','60c8c8aa0d506',100),(207,'Typhi O','appearance','selectionApp','60c8ca10e3d66',0),(208,'Parayphi B','appearance','selectionApp','60c8ca4c2bc93',0),(209,'Widal test for typhoid ','profile','profile','60c8cab11fa16',100),(211,'Reaction','appearance','selectionApp','60c8cc0c2d404',0),(216,'puss cells','appearance','text','60c918bc6423f',0),(218,'Epithelial cells','appearance','text','60c9191a2ff22',0),(221,'Cast','appearance','textApp','60c9f0b0f3dc9',0),(222,'Ova','appearance','textApp','60c9f0d762604',0),(223,'Parazite','appearance','textApp','60c9f108db3fe',0),(224,'Others','appearance','textApp','60c9f11a6652e',0),(226,'Color','appearance','selectionApp','60c9f36f6892a',0),(227,'sugar','appearance','selectionApp','60c9f3c7dcd56',0),(228,'Acetone','appearance','selectionApp','60c9f418682da',0),(230,'Bile','appearance','selectionApp','60c9f49ab46c5',0),(235,'H.Pylori (Ag) in Stool','single','selectionApp','60c9f8cc0f75a',100),(236,'H.Pylori Urea Breath Test (IgG)','single','number','60c9f9428c851',100),(237,'H.Pylori Urea Breath Test (IgM)','single','number','60c9f96f2e504',100),(238,'H.Pylori Urea Breath Test (IgA)','single','number','60c9f99e17654',100),(241,'Syphilis Ab (ELISA)','single','selection','60c9fd6113660',100),(242,'RPR for syphilis','single','selection','60c9fe384ab4a',100),(243,'TPHA for syphilis','single','selection','60c9fef19e530',100),(248,'ICT for HBV','single','selection','60ca0427012a7',100),(249,'Widal Test for Brucella screaning','single','selection','60ca0657eae8d',100),(250,'Widal Test for Brucella (Tube method)','single','selection','60ca0689715b4',100),(251,'TB Ab','single','selection','60ca06c9aeea6',100),(252,'Dengue fever (flavi viruse)','single','selection','60ca071e47ede',100),(253,'Rota viruse Ag','single','selection','60ca07d4b0044',100),(254,'VDRL','single','selection','60ca08186b366',100),(255,'Schistosomal (Ag) in urine','single','selection','60ca085f94c20',100),(256,'HBs Ag','single','number','60ca174d4f9e1',100),(257,'HBs Ag (quantitative)','single','number','60ca1786177fb',100),(258,'Anti-HBs','single','number','60ca18155bef4',100),(259,'HBe Ag','single','number','60ca18ddccd84',100),(260,'Anti-HBe','single','number','60ca197501de5',100),(261,'HBc Ag','single','number','60ca19c3667f9',100),(262,'Anti-HBc (total)','single','number','60ca1a261a5f7',100),(263,'Anti-HBc (IgM)','single','number','60ca1a563fffe',100),(265,'ICT for HCV','single','selection','60ca1bb413bf2',100),(266,'Anti- HCV','single','number','60ca1be5ef04a',100),(267,'ICT for HIV','single','selection','60ca1c4b9d869',100),(268,'Anti-HIV ( 1+2 ) Abs','single','number','60ca1c9a0151d',100),(269,'ICT HAV ( IgM )','single','selection','60ca1ce009a7c',100),(270,'Anti-HAV ( total )','single','number','60ca1d26cf72e',100),(271,'Anti-HAV ( IgM )','single','number','60ca1d48425ee',100),(272,'Anti-HEV ( total )','single','number','60ca1d643248a',100),(273,'Anti-HEV ( IgM )','single','number','60ca1d81edd17',100),(274,'Anti-HEV ( IgG )','single','number','60ca1da3661b8',100),(275,'EBV - VCA ( IgG)','single','number','60ca1e3776c94',100),(276,'EBV - VCA ( IgM )','single','number','60ca1f1e5924d',100),(277,'CMV IgG','single','number','60ca20827b404',100),(278,'CMV IgM','single','number','60ca20b842a3c',100),(279,'Herpes simplex 1+2 (IgG)','single','number','60ca20e729c3d',100),(280,'Herpes simplex 1+2 (IgM)','single','number','60ca2115e9711',100),(281,'Rubella IgG','single','number','60ca2143494fa',100),(282,'Rubella IgM','single','number','60ca21710a5af',100),(283,'Toxoplasma IgG','single','number','60ca219b2b94f',100),(284,'Toxoplasma IgM','single','number','60ca21cbb8b94',100),(285,'24 hrs Urine Cortezole (pm)','single','number','60ca2212b0f3e',100),(286,'AMH (Anti mullerian Hormone)','single','number','60ca60378e6fb',100),(287,'DHEA (Dehydroepiandrosterone)','single','number','60ca61402e682',100),(288,'DHT (Dihydrotestosterone)','single','number','60ca637e8465c',100),(289,'FSH','single','number','60ca63c79e8ea',100),(290,'Prolactin','single','number','60ca63fdd63f4',100),(291,'LH','single','number','60ca64535daf0',100),(292,'E2','single','number','60ca64a7e8e1b',100),(293,'Testesterone (Total)','single','number','60ca64e08d1e6',100),(294,'Testesterone (Free)','single','number','60ca6515efc87',100),(295,'Progesterone','single','number','60ca6560a9ffb',100),(299,'Liver Profile','profile','profile','60cb4f0806488',100),(300,'Pancreatic Profile','profile','profile','60cb4f90c4c4c',100),(301,'Renal Profile','profile','profile','60cb6e032b4e7',100),(302,'Iron Profile','profile','profile','60cb6f908edc4',100),(303,'Bleeding Profile','profile','profile','60cb6ff45ba3a',100),(304,'Lipid Profile','profile','profile','60cb709b57ce1',100),(305,'Cardiac Profile','profile','profile','60cb7293ddd1f',100),(306,'Diabetic Profile','profile','profile','60cb73906d9ff',100),(307,'1Hr PPBG','single','number','60cb73eed37e0',100),(308,'RFT','profile','profile','60cb9e336f521',100),(309,'Fertility Profile','profile','profile','60ceef1a9677f',100),(310,'liquefaction','appearance','text','60cef04166bf2',0),(311,'Viscosity','appearance','selection','60cef0f8b18a9',0),(312,'Agglutination','appearance','selection','60cef6c2b0523',0),(313,' Volume','appearance','number','60cef70d56852',0),(314,'Sperm concentration','appearance','number','60cefd9a23db4',0),(315,'Progressive motility (PR)','appearance','number','60cefdcdaa29f',0),(316,'Total motility (PR+NP)','appearance','number','60cefe0dd79bb',0),(317,'Vitality (live sperms)','appearance','number','60cefe464a09f',0),(318,'Sperms morphology (NF)','appearance','number','60cefeb9608d4',0),(319,'MAR/Immunobead test','appearance','number','60cefee2cfe79',0),(320,'Seminal Fructose','appearance','number','60ceff08d741e',0),(321,'pH','appearance','number','60ceff4c137ee',0),(322,'Peroxidase - positive Leucocytes','appearance','number','60cf000704ee1',0),(323,'Bacteria','appearance','textApp','60cf0118c37d0',0),(324,'Spot urine for Protein / Creatinine Ratio (P/C ratio)','single','number','60cf0fa9b45f8',100),(325,'Serum Effusion Albumin Gradient (SEAG)','appearance','number','60cf105b4b8be',0),(326,'Serum - Ascitic Albumin Gradient (SAAG)','appearance','number','60cf10dc5b441',0),(327,'General Body Fluid Analysis','profile','profile','60cf115d07568',100),(328,'Opening Pressure','appearance','number','60cf126c019d4',0),(329,'Appearance','appearance','selectionApp','60cf1375183a5',0),(330,'ADA','appearance','number','60cf21e01ad69',0),(331,'Neutrophils ','appearance','number','60cf235e961fa',0),(332,'Cholesterol','appearance','number','60cf243310f0c',0),(333,'Triglceride','appearance','number','60cf24cca0176',0),(334,'Glucose*','appearance','number','60cf257473423',0),(335,'LDH','appearance','number','60cf26560b5ab',0),(336,'Protein','appearance','selectionApp','60cf2d9101ca4',100),(337,'Protein*','appearance','number','60cf2dd97c623',0),(338,'Gram stain','appearance','textApp','60cf2e7de1868',0),(339,'Neutrophis','appearance','number','60cf3c50d7e2a',0),(340,'Magnesium*','appearance','number','60cf42e4edc5f',0),(341,'Amylase','appearance','number','60cf4fc4d3b1b',0),(342,'RF (Latex)','single','selection','60cf50fa2ed69',100),(343,'Crystals','appearance','textApp','60cf583c9b6cd',0),(344,'Crystals*','appearance','selectionApp','60cf58a354aac',0),(345,'Uric Acid*','appearance','number','60cf593a14c7a',0),(346,'Cerebrospinal Fluid Analysis','profile','profile','60cf5d2e48933',100),(347,'Pleural Fluid Analysis','profile','profile','60cf98cac8315',100),(348,'Ascitic Fluid Analysis','profile','profile','60cf998213213',100),(349,'Synovial Fluid Analysis','profile','profile','60cf9a4c29303',100),(350,'Pericardial Fluid Analysis','profile','profile','60cf9b637a5d7',100),(351,'CL','appearance','number','60cf9c2f64fd9',0),(352,'Urine General','profile','profile','60cf9ea2913f1',100),(353,'Deposite Exam :','appearance','selection','60cf9f5c78706',100),(354,'RBCs','appearance','text','60cfa1913a40f',0),(357,'test','appearance','text','63b5d5be811fd',0);
/*!40000 ALTER TABLE `checkup` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `checkup` with 313 row(s)
--

--
-- Table structure for table `checkup_profile_tests`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `checkup_profile_tests` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) NOT NULL,
  `test_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `parent_id` (`parent_id`),
  KEY `test_id` (`test_id`),
  CONSTRAINT `checkup_profile_checkup_type_forign_id` FOREIGN KEY (`test_id`) REFERENCES `checkup` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=241 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `checkup_profile_tests`
--

LOCK TABLES `checkup_profile_tests` WRITE;
/*!40000 ALTER TABLE `checkup_profile_tests` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `checkup_profile_tests` VALUES (25,121,10),(26,121,102),(27,121,103),(28,121,104),(29,121,105),(30,121,106),(31,121,107),(32,121,108),(33,121,109),(34,121,110),(35,121,111),(36,121,112),(37,121,13),(38,121,114),(39,121,115),(40,121,116),(41,121,117),(42,121,118),(43,121,119),(44,199,169),(45,199,170),(46,199,173),(47,199,171),(48,199,172),(49,199,174),(50,199,175),(51,204,102),(52,204,103),(53,204,104),(54,204,105),(55,204,106),(56,204,107),(57,204,108),(58,204,109),(59,204,110),(60,204,111),(61,209,207),(62,209,208),(103,299,69),(104,299,70),(105,299,71),(106,299,72),(107,299,73),(108,299,74),(109,299,75),(110,299,76),(111,299,77),(112,300,79),(113,300,81),(114,300,80),(115,301,17),(116,301,18),(117,301,30),(118,301,31),(119,301,33),(120,301,34),(121,301,27),(122,302,124),(123,302,125),(124,302,126),(125,302,127),(126,303,128),(127,303,129),(128,303,130),(129,303,131),(130,304,56),(131,304,57),(132,304,58),(133,304,59),(134,304,60),(135,304,61),(136,304,62),(137,305,63),(138,305,64),(139,305,65),(140,305,66),(141,305,67),(142,305,143),(143,305,68),(144,306,49),(152,306,307),(153,306,51),(154,306,52),(155,306,53),(156,306,54),(157,306,55),(158,308,17),(159,308,18),(160,309,286),(161,309,287),(162,309,288),(163,309,289),(164,309,290),(165,309,291),(166,309,292),(167,309,293),(168,309,294),(169,309,295),(170,327,324),(171,327,325),(172,327,326),(173,346,328),(174,346,329),(175,346,330),(176,346,10),(177,346,112),(178,346,334),(179,346,335),(180,346,340),(183,347,329),(184,347,330),(185,347,10),(186,347,112),(187,347,332),(188,347,333),(189,347,334),(190,347,335),(191,347,337),(192,347,338),(193,348,329),(194,348,330),(195,348,10),(196,348,112),(197,348,332),(198,348,333),(199,348,334),(200,348,335),(201,348,341),(202,348,337),(203,348,338),(204,349,329),(205,349,10),(206,349,112),(207,349,344),(208,349,334),(209,349,335),(210,349,337),(211,349,342),(212,349,345),(213,349,338),(214,350,330),(215,350,10),(216,350,112),(217,350,334),(218,350,335),(219,350,337),(220,350,338),(221,346,351),(222,346,337),(223,346,338),(224,352,226),(225,352,211),(226,352,227),(227,352,228),(228,352,336),(229,352,230),(230,352,353),(231,352,216),(234,352,354),(235,352,218),(236,352,343),(237,352,221),(238,352,222),(239,352,223),(240,352,224);
/*!40000 ALTER TABLE `checkup_profile_tests` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `checkup_profile_tests` with 165 row(s)
--

--
-- Table structure for table `checkup_ref`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `checkup_ref` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `test_id` int(11) NOT NULL,
  `ref_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `test_id` (`test_id`),
  KEY `ref_id` (`ref_id`),
  CONSTRAINT `checkup_ref_ref_id_forign_id` FOREIGN KEY (`ref_id`) REFERENCES `refs` (`id`),
  CONSTRAINT `checkup_ref_test_id_forign_id` FOREIGN KEY (`test_id`) REFERENCES `checkup` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=317 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `checkup_ref`
--

LOCK TABLES `checkup_ref` WRITE;
/*!40000 ALTER TABLE `checkup_ref` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `checkup_ref` VALUES (9,10,239),(10,11,6),(14,17,6),(15,18,7),(16,19,8),(18,21,10),(19,22,11),(21,23,9),(22,24,12),(23,25,13),(24,26,13),(25,27,14),(26,28,15),(27,29,16),(28,30,241),(29,31,18),(30,32,19),(31,33,20),(32,34,21),(33,35,22),(34,36,23),(35,37,24),(36,38,25),(37,39,26),(38,40,27),(39,41,28),(40,42,29),(41,43,30),(42,44,31),(43,45,32),(44,46,33),(46,48,238),(47,49,34),(48,50,35),(49,51,36),(50,52,37),(51,53,38),(52,54,39),(53,55,9),(54,56,41),(55,57,41),(56,58,42),(57,59,35),(58,60,43),(59,61,44),(60,62,45),(61,63,46),(62,64,47),(63,65,48),(64,66,49),(65,67,50),(66,68,51),(67,69,46),(68,70,52),(69,71,53),(70,72,54),(71,73,55),(72,74,56),(73,75,57),(74,76,58),(75,77,59),(76,78,60),(77,79,61),(78,80,62),(79,81,63),(80,82,64),(81,83,65),(82,84,65),(83,85,65),(84,86,65),(85,87,65),(86,88,65),(87,89,65),(88,90,65),(89,91,66),(90,92,68),(91,93,69),(92,94,70),(93,95,71),(94,96,72),(95,97,73),(96,100,74),(97,13,255),(99,102,244),(100,103,83),(101,104,246),(102,105,247),(103,106,248),(104,107,249),(105,108,250),(106,109,251),(107,110,252),(108,111,248),(109,112,254),(110,113,255),(111,114,256),(112,115,257),(113,116,258),(114,117,259),(115,118,260),(116,119,242),(117,121,242),(119,124,75),(120,125,76),(121,126,77),(122,127,78),(123,128,79),(124,129,80),(125,130,81),(126,131,82),(127,132,83),(128,133,84),(129,134,85),(130,135,86),(131,136,87),(132,137,88),(133,138,89),(134,139,90),(135,140,91),(136,141,92),(137,142,93),(138,143,94),(139,144,96),(140,145,97),(141,146,98),(142,147,99),(143,148,100),(144,150,101),(145,151,102),(146,152,103),(147,153,104),(148,154,105),(149,155,106),(150,156,107),(151,157,108),(152,158,109),(153,160,110),(154,161,111),(155,162,112),(156,127,113),(158,164,114),(159,165,116),(160,166,117),(161,167,118),(162,168,119),(163,169,153),(164,170,154),(165,171,155),(166,172,156),(167,173,157),(168,174,158),(169,175,160),(170,176,161),(171,177,162),(172,178,163),(173,179,164),(174,180,165),(175,181,166),(176,182,167),(177,183,168),(178,184,223),(179,185,224),(180,187,70),(181,188,213),(182,189,214),(184,191,215),(185,192,215),(186,193,217),(187,194,218),(188,195,261),(190,196,220),(191,197,221),(192,198,262),(193,216,263),(195,218,263),(197,236,120),(198,237,120),(199,238,120),(200,241,121),(201,242,122),(202,243,122),(203,248,70),(204,249,70),(205,250,70),(206,251,70),(207,252,70),(208,253,70),(209,254,70),(210,255,70),(211,256,121),(212,257,124),(214,258,265),(215,259,123),(216,260,121),(217,261,121),(218,262,121),(219,263,121),(221,265,70),(222,266,121),(223,267,70),(224,268,121),(225,269,70),(226,270,121),(227,271,121),(228,272,121),(229,273,121),(230,274,121),(232,275,266),(234,276,267),(235,277,125),(236,278,126),(237,279,127),(238,280,128),(239,281,266),(240,282,130),(241,283,131),(242,284,128),(243,285,264),(245,286,268),(247,287,269),(248,288,270),(249,289,271),(250,290,272),(251,291,273),(252,292,274),(253,293,275),(254,294,276),(255,295,277),(256,307,264),(257,310,171),(258,311,174),(260,312,264),(261,313,175),(262,314,177),(263,315,178),(264,316,179),(265,317,180),(266,318,181),(267,319,182),(268,320,183),(269,321,184),(270,322,185),(271,112,248),(273,324,278),(275,325,279),(276,326,280),(277,328,264),(278,330,199),(279,10,281),(280,331,281),(281,112,264),(282,332,201),(283,333,201),(284,334,203),(285,335,204),(286,337,205),(287,10,283),(288,10,192),(289,339,281),(290,339,284),(291,339,264),(292,337,198),(293,337,210),(294,112,193),(295,112,281),(296,112,284),(297,330,285),(298,330,191),(299,334,286),(300,334,287),(301,334,194),(302,334,208),(303,335,195),(304,335,209),(305,340,197),(306,332,288),(307,333,288),(308,341,285),(309,341,289),(310,342,70),(311,345,212),(313,351,290),(314,353,264),(315,354,248),(316,357,242);
/*!40000 ALTER TABLE `checkup_ref` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `checkup_ref` with 285 row(s)
--

--
-- Table structure for table `checkup_select_values`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `checkup_select_values` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `test_id` int(11) NOT NULL,
  `select_value` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `test_id` (`test_id`),
  CONSTRAINT `checkup_select_values_checkup_type_forign_id` FOREIGN KEY (`test_id`) REFERENCES `checkup` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=208 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `checkup_select_values`
--

LOCK TABLES `checkup_select_values` WRITE;
/*!40000 ALTER TABLE `checkup_select_values` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `checkup_select_values` VALUES (17,8,'Positive'),(18,8,' Negative'),(19,14,'Positive'),(20,14,' Negative'),(21,15,'A+ve'),(22,15,' A-ve'),(23,15,' B+ve'),(24,15,' B-ve'),(25,15,' AB+ve'),(26,15,' AB-ve'),(27,15,' O+ve'),(28,15,' O-ve'),(29,94,'Negative'),(30,94,' Positive'),(31,98,'Positive'),(32,98,' Negative'),(33,99,'Positive'),(34,99,' Negative'),(39,200,'Positve'),(40,200,' Negative'),(41,201,'Positive'),(42,201,' Negative'),(43,202,'Positive'),(44,202,' Negative'),(45,203,'Positive'),(46,203,' Negative'),(47,205,'Positive'),(48,205,' Negative'),(49,206,'Positive'),(50,206,' Negative'),(51,207,'1/20'),(52,207,' 1/40'),(53,207,' 1/80'),(54,207,' 1/160'),(55,207,' 1/320'),(56,208,'1/20'),(57,208,' 1/40'),(58,208,' 1/80'),(59,208,' 1/160'),(60,208,' 1/320'),(66,211,'Acidic'),(67,211,' Alkaline'),(94,226,'Yellow'),(95,226,' Red'),(96,226,' Darck'),(97,226,' Darck Red'),(98,226,' Turbid'),(99,227,'Nill'),(100,227,' +'),(101,227,' ++'),(102,227,' +++'),(103,227,' ++++'),(104,227,' +++++'),(105,227,' ++++++'),(106,227,' Trace'),(107,228,'Nill'),(108,228,' +'),(109,228,' ++'),(110,228,' +++'),(111,228,' ++++'),(112,228,' +++++'),(113,228,' ++++++'),(114,228,' Trace'),(123,230,'Nill'),(124,230,' +'),(125,230,' ++'),(126,230,' +++'),(127,230,' ++++'),(128,230,' +++++'),(129,230,' ++++++'),(130,230,' Trace'),(135,235,'Positive'),(136,235,' Negative'),(141,241,'Positive'),(142,241,' Negative'),(143,242,'Positive'),(144,242,' Negative'),(145,243,'Positive'),(146,243,' Negative'),(155,248,'Positive'),(156,248,' Negative'),(157,249,'Positive'),(158,249,' Negative'),(159,250,'Positive'),(160,250,' Negative'),(161,251,'Positive'),(162,251,' Negative'),(163,252,'Positive'),(164,252,' Negative'),(165,253,'Positive'),(166,253,' Negative'),(167,254,'Positive'),(168,254,' Negative'),(169,255,'Positive'),(170,255,' Negative'),(171,265,'Negative'),(172,265,' Positive'),(173,267,'Negative'),(174,267,' Positive'),(175,269,'Positive'),(176,269,' Negative'),(183,226,'White'),(184,226,'Greyish white'),(185,311,'Viscous'),(186,311,'Not Viscous'),(187,312,'Agglutinated'),(188,329,'Normal'),(189,329,'Clear'),(190,329,'Turbid'),(191,329,'Fibrin Web'),(192,329,'Bloody'),(193,329,'Red'),(195,336,'Nil'),(196,336,'+'),(197,336,'++'),(198,336,'+++'),(199,336,'++++'),(200,336,'+++++'),(201,336,'Trace'),(202,342,'Positive'),(203,342,'Negative'),(204,344,'Positive'),(205,344,'Negative'),(206,353,'ـــــــ');
/*!40000 ALTER TABLE `checkup_select_values` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `checkup_select_values` with 124 row(s)
--

--
-- Table structure for table `checkup_types`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `checkup_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `checkup_types`
--

LOCK TABLES `checkup_types` WRITE;
/*!40000 ALTER TABLE `checkup_types` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `checkup_types` VALUES (1,'Routine'),(2,'Clinical Chemistry'),(3,'Haematology'),(4,'Serology'),(5,'Microbiology'),(6,'Histopathology'),(7,'Rdiolgical investigation'),(8,'Nonlaboratory investigation'),(9,'Hormones');
/*!40000 ALTER TABLE `checkup_types` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `checkup_types` with 9 row(s)
--

--
-- Table structure for table `checkup_unit`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `checkup_unit` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `test_id` int(11) NOT NULL,
  `unit_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `test_id` (`test_id`),
  KEY `unit_id` (`unit_id`),
  CONSTRAINT `checkup_unit_checkup_test_id_forign_id` FOREIGN KEY (`test_id`) REFERENCES `checkup` (`id`) ON DELETE CASCADE,
  CONSTRAINT `checkup_unit_units_unit_id_forign_id` FOREIGN KEY (`unit_id`) REFERENCES `units` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=301 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `checkup_unit`
--

LOCK TABLES `checkup_unit` WRITE;
/*!40000 ALTER TABLE `checkup_unit` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `checkup_unit` VALUES (9,10,8),(10,11,5),(13,13,21),(15,17,75),(16,18,75),(17,19,9),(19,21,11),(20,22,12),(21,23,10),(22,24,77),(23,25,9),(24,26,9),(25,27,75),(26,28,11),(27,29,78),(28,30,75),(29,31,75),(30,32,75),(31,33,75),(32,34,14),(33,35,15),(34,36,15),(35,37,15),(36,38,75),(37,39,15),(38,40,16),(39,41,17),(40,42,75),(41,43,15),(42,44,75),(43,45,16),(44,46,17),(46,48,20),(47,49,75),(48,50,75),(49,51,75),(50,52,6),(51,53,18),(52,54,74),(53,55,25),(54,56,75),(55,57,75),(56,58,75),(57,59,75),(58,60,75),(59,61,75),(60,62,75),(61,63,19),(62,64,18),(63,65,19),(64,66,20),(65,67,20),(66,68,18),(67,69,75),(68,70,75),(69,71,21),(70,72,21),(71,73,21),(72,74,16),(73,75,20),(74,76,20),(75,77,20),(76,78,20),(77,79,20),(78,80,22),(79,81,20),(80,82,20),(81,83,75),(82,84,19),(83,85,19),(84,86,19),(85,87,19),(86,88,19),(87,89,19),(88,90,19),(89,91,19),(90,92,20),(91,93,11),(92,95,75),(93,96,26),(94,97,20),(95,100,79),(98,102,6),(99,103,6),(100,104,6),(101,105,6),(102,106,6),(103,107,81),(104,108,81),(105,109,81),(106,109,4),(107,110,81),(108,110,4),(109,111,81),(110,111,4),(112,113,21),(113,114,6),(114,115,69),(115,116,70),(116,117,21),(117,118,81),(118,118,67),(119,119,79),(120,121,79),(122,124,27),(123,125,19),(124,126,27),(125,127,75),(126,128,28),(127,129,29),(128,130,29),(129,131,6),(130,132,75),(131,133,75),(132,134,30),(133,135,75),(134,136,75),(135,137,82),(136,138,6),(137,139,6),(138,140,75),(139,141,75),(140,142,75),(141,143,27),(142,144,75),(143,145,27),(144,146,19),(145,147,19),(146,148,31),(147,150,75),(148,151,74),(149,152,75),(150,153,74),(151,154,75),(152,155,74),(154,156,83),(155,157,29),(156,158,6),(157,160,6),(158,161,74),(159,162,75),(160,127,6),(163,164,84),(164,165,84),(165,166,18),(166,167,18),(167,168,74),(169,169,86),(171,170,87),(172,171,87),(174,172,88),(175,173,88),(176,174,18),(177,175,83),(178,176,38),(179,177,38),(180,178,39),(181,179,18),(182,180,37),(183,181,84),(184,182,84),(185,183,84),(186,184,83),(187,185,83),(188,187,83),(189,188,84),(190,189,26),(192,191,26),(193,192,26),(195,194,84),(196,193,84),(197,195,84),(199,196,7),(200,197,84),(201,198,18),(202,216,89),(204,218,89),(206,236,26),(207,237,26),(208,238,26),(209,241,79),(210,242,79),(211,243,79),(212,248,90),(213,249,90),(214,250,90),(215,251,90),(216,252,90),(217,253,90),(218,254,90),(219,255,90),(220,256,32),(221,257,83),(222,258,7),(223,259,32),(224,260,32),(225,261,32),(226,262,32),(227,263,32),(230,265,90),(231,266,32),(232,267,90),(233,268,32),(234,269,90),(235,270,32),(236,271,32),(237,272,32),(238,273,32),(239,274,32),(240,275,26),(241,276,26),(242,277,83),(243,278,90),(244,279,34),(245,280,90),(246,281,83),(247,282,90),(248,283,90),(249,284,90),(250,285,39),(251,286,84),(252,287,84),(253,288,84),(254,289,91),(255,290,91),(256,291,91),(257,292,18),(258,293,84),(259,294,18),(260,295,84),(261,307,75),(262,310,90),(263,311,90),(264,312,90),(265,313,40),(266,314,6),(267,315,6),(268,316,6),(269,317,6),(270,318,6),(271,319,6),(272,320,75),(273,321,90),(274,322,41),(275,112,92),(276,112,89),(278,324,93),(279,325,21),(280,326,21),(281,328,43),(282,330,20),(283,10,45),(284,331,45),(285,112,45),(286,332,75),(287,333,75),(288,334,75),(289,335,20),(290,337,21),(291,339,45),(292,337,75),(293,340,75),(294,341,20),(295,342,90),(296,345,75),(297,351,94),(298,353,90),(299,354,89),(300,357,79);
/*!40000 ALTER TABLE `checkup_unit` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `checkup_unit` with 269 row(s)
--

--
-- Table structure for table `invoices`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `invoices` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `service_id` int(11) NOT NULL,
  `amount_paid` double DEFAULT NULL,
  `remaining_amount` double DEFAULT NULL,
  `total_price` double NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `service_id` (`service_id`),
  CONSTRAINT `invoices_service_request_forign_id` FOREIGN KEY (`service_id`) REFERENCES `service_request` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `invoices`
--

LOCK TABLES `invoices` WRITE;
/*!40000 ALTER TABLE `invoices` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `invoices` VALUES (1,6,500,0,500,1,'2022-12-15 11:56:20'),(2,5,300,0,300,1,'2022-12-15 17:39:44'),(3,7,200,100,300,1,'2022-12-18 08:06:12'),(4,7,100,0,300,1,'2022-12-18 08:06:43'),(5,4,300,0,300,1,'2022-12-18 08:07:11'),(6,8,100,200,300,1,'2022-12-22 03:56:51'),(7,8,200,0,300,1,'2022-12-22 03:57:14');
/*!40000 ALTER TABLE `invoices` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `invoices` with 7 row(s)
--

--
-- Table structure for table `labrequests`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `labrequests` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `serviceid` int(11) NOT NULL,
  `checkupid` int(11) NOT NULL,
  `uid` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `dateCreated` timestamp NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `serviceid` (`serviceid`),
  KEY `checkupid` (`checkupid`),
  CONSTRAINT `labrequests_checkup_forign_id` FOREIGN KEY (`checkupid`) REFERENCES `checkup` (`id`) ON DELETE CASCADE,
  CONSTRAINT `labrequests_service_forign_id` FOREIGN KEY (`serviceid`) REFERENCES `service_request` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `labrequests`
--

LOCK TABLES `labrequests` WRITE;
/*!40000 ALTER TABLE `labrequests` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `labrequests` VALUES (1,1,13,'620e39727fe61',1,'2022-02-17 10:02:58'),(2,1,8,'620e3972a10c6',1,'2022-02-17 10:02:58'),(3,1,14,'620e3972c31b1',0,'2022-02-17 10:02:58'),(4,2,10,'623b59ae617ee',1,'2022-03-23 15:32:30'),(5,2,14,'623b59ae89377',1,'2022-03-23 15:32:30'),(6,2,121,'623b678fcaa67',1,'2022-03-23 16:31:43'),(7,2,346,'623b69107aada',1,'2022-03-23 16:38:08'),(8,3,11,'629e4ce68652e',1,'2022-06-06 16:52:22'),(9,3,8,'629e4ce6c730c',0,'2022-06-06 16:52:22'),(10,3,15,'629e4ce70a198',0,'2022-06-06 16:52:23'),(11,4,13,'62e90a91a9fe9',1,'2022-08-02 09:29:21'),(12,4,8,'62e90a91d812b',1,'2022-08-02 09:29:21'),(13,4,10,'62e90a91e2e49',1,'2022-08-02 09:29:21'),(14,5,8,'63035eb6ea659',1,'2022-08-22 08:47:18'),(15,5,13,'63035eb73751f',1,'2022-08-22 08:47:19'),(16,5,11,'63035eb748d45',1,'2022-08-22 08:47:19'),(17,6,8,'639b0ab8e80a7',1,'2022-12-15 11:53:28'),(18,6,11,'639b0ab913f6d',1,'2022-12-15 11:53:29'),(19,6,13,'639b0ab9229cf',1,'2022-12-15 11:53:29'),(20,6,14,'639b0ab951e63',1,'2022-12-15 11:53:29'),(21,6,299,'639b0b2545590',1,'2022-12-15 11:55:17'),(22,7,8,'639ec988a726a',1,'2022-12-18 08:04:24'),(23,7,11,'639ec988d4b5c',1,'2022-12-18 08:04:24'),(24,7,13,'639ec98921d21',1,'2022-12-18 08:04:25'),(25,8,10,'63a3d54ee4e5b',1,'2022-12-22 03:55:58'),(26,8,13,'63a3d54f2bbe2',1,'2022-12-22 03:55:59'),(27,8,14,'63a3d54f52021',1,'2022-12-22 03:55:59'),(28,9,8,'63af260f7bb06',1,'2022-12-30 17:55:27'),(29,9,11,'63af260fbd6a3',1,'2022-12-30 17:55:27'),(30,10,121,'63b5d7cceea72',0,'2023-01-04 19:47:24'),(31,11,8,'63ba9221b3f24',1,'2023-01-08 09:51:29'),(32,11,11,'63ba9221da75f',1,'2023-01-08 09:51:29');
/*!40000 ALTER TABLE `labrequests` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `labrequests` with 32 row(s)
--

--
-- Table structure for table `patients`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `patients` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `patient_name` varchar(255) NOT NULL,
  `birthdate` date NOT NULL,
  `gender` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `patients`
--

LOCK TABLES `patients` WRITE;
/*!40000 ALTER TABLE `patients` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `patients` VALUES (1,'مدثر سمير','2022-05-04','Male'),(2,'Mohammed','2009-02-09','Male');
/*!40000 ALTER TABLE `patients` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `patients` with 2 row(s)
--

--
-- Table structure for table `refs`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `refs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `reference` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=291 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `refs`
--

LOCK TABLES `refs` WRITE;
/*!40000 ALTER TABLE `refs` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `refs` VALUES (3,'3.5-5.1 mmol/L'),(4,'0.9-1.3 mg/dL'),(5,'0.8-1.3 mg/dL'),(6,'10 …… 50'),(7,'M:0.7 …… 1.2    #   F: 0.5 …... 0.9'),(8,'M: 0.97 …… 137  #     F: 88 …... 128'),(9,'< 30'),(10,'< 150'),(11,'< 0.15'),(12,'< 0.2'),(13,'40 …….. 65'),(14,'M:3 …… 7   #      F: 2 …... 6'),(15,'250 …… 750'),(16,'0.42 ….. 1.5'),(17,'135 …… 55'),(18,'3.6 ……. 5.5'),(19,'8.1 …… 10.4'),(20,'4.6 ………. 5.2'),(21,'2.5 …….. 5'),(22,'40 ……..220'),(23,'25 ……. 120'),(24,'100 ……. 400'),(25,'98 …… 107'),(26,'110 ……… 250'),(27,'M: 70 ….. 140  #   F:  76 ….. 172    '),(28,'15 ……… 70'),(29,'1.7 …….. 2.7'),(30,'50 ……… 150'),(31,'50 ………. 1200'),(32,'46 ……….. 150'),(33,'300 ……. 800'),(34,'up to 180'),(35,'up to 140'),(36,'70 …… 110'),(37,'Good control : 4.5 ….. 7 # Fair control : 7.1 ….8.4 # Uncotrolled : >=8.5'),(38,'1.3 ……. 4.1'),(39,'<20'),(40,'<30'),(41,'Up to 200'),(42,'> 35'),(43,'Up to 30'),(44,'M: 115 …. 190   #  F: 115 ……220'),(45,'M: 60 …. 138  #  F: 52 ……129'),(46,'up to 1'),(47,'up to 10'),(48,'up to 25'),(49,'M: 25 …. 195  #  F: 24 ……170'),(50,'230 ……460'),(51,'up to 300'),(52,'Up to 0.25'),(53,'6.6 ….. 8.7'),(54,'3.5 ….. 5.4'),(55,'2 ….... 3.8'),(56,'M: 25 …. 94  #  F: 19 ……82'),(57,'M: up to 41   #   F: up to 32'),(58,'M: up to 40   #  F: up to 33'),(59,'M: 40 …. 129   #  F: 35 ……104'),(60,'M: 11 …. 60  #  F: 7 ……40'),(61,'Up to 95'),(62,'Up to 450'),(63,'13 …… 60'),(64,'12 ……. 68'),(65,'Undetectable'),(66,'Normal:<0.5 # moderate bacterial infection: 0.5 ….2 # Severe bacterial infection : 2 …… 10'),(67,'Normal:<0.5 # moderate bacterial infection: 0.5 ….2  # Severe bacterial infection : 2 …… 10'),(68,'up to 15'),(69,'1.9 …….9.8'),(70,'Negative'),(71,'4.8 …… 19.8'),(72,'5.4 ……. 13.2'),(73,'1 ….… 7'),(74,'7 ……… 7.5'),(75,'M: 65 …. 175  F: 50 ……170'),(76,'M: 20 …. 280  F: 10 ……140'),(77,'Infant: 100 …. 400  # Adult: 250 ……425'),(78,'170 …. 370'),(79,'2 ……… 7'),(80,'12 ……… 17'),(81,'up to 41'),(82,'0.9 …….1.2'),(83,'20 …......40'),(84,'90 ……. 200'),(85,'4.3 …...... 32.9'),(86,'Negative : <5 # Equivocal : 5 …. 8  #Positive : >5'),(87,'20 ……. 60'),(88,'5 ……. 15'),(89,'70 …….. 150'),(90,'70 …….. 140'),(91,'90 ………. 180'),(92,'10 …....... 40'),(93,'23 ……. 41'),(94,'< 0.5'),(95,'< 0.5'),(96,'180 …....... 350'),(97,'2.1 ………… 7.7'),(98,'3.1 ……….. 17.5'),(99,'140 ………. 628'),(100,'4.6 ……… 13.5'),(101,'70 ……. 400'),(102,'< 5'),(103,'700 ……. 1600'),(104,'< 8.8'),(105,'40 …....... 230'),(106,'< 1.3'),(107,'28 …….. 140'),(108,'28 …….. 45'),(109,'70 …....… 160'),(110,'60 ……….. 150'),(111,'Up to 1.9'),(112,'200 ……….. 360'),(113,'> 16'),(114,'20 …...... 40'),(115,'20 …..... 40'),(116,'Deficiency : 10 …. 20  # Suboptimal : 20 ….. 30  # Optimal : 30 …. 50 # Upper normal : > 50'),(117,'M : 15 ……. 75  # F : 20 ……. 62.5'),(118,'211 …….. 950'),(119,'21 …...... 57'),(120,'Negative : Up to 20'),(121,'< 0.9 Negative  # 0.9 …. 1.1 Doubtful # > 1.1 Positive'),(122,'< 1/20 Negative'),(123,'< 0.9 Negative .0.9 ….... 1.1 # Doubtful .> 1.1 Positive'),(124,'< 1 Negative'),(125,'Negative up to : 0.55'),(126,'Negative index up to : 0.1.1'),(127,'Negative up to : 5.5'),(128,'Negative index up to : 1.1'),(129,'Negative up to : 10'),(130,'Negative up to : 1.1'),(131,'Negative up to : 33'),(132,'< 1/20 (IFA run)'),(133,'Negative : < 1  #  Doubtful : 1 ……1.2 # Positive : > 1.2'),(134,'Negative (IFA run)'),(135,'Negative : < 5  # posative : > 5'),(136,'Negative : < 20'),(137,'Up to 10'),(138,'Negative : < 1  # Doubtful : 1 ….. 1.2  # Positive > 1.2'),(139,'Negative : < 12  # Equivocal : 12 ….. 16  # Positive > 16'),(140,'Negative : < 11  # Equivocal 11 ….. 18  # Positive > 18'),(141,'Negative : < 200'),(142,'Negative : Up to 50'),(143,'Negative : < 5'),(144,'< 1/5 (IFA run)'),(145,'Negative : Up to 8'),(146,'Negative : < 6'),(147,'Up to 100'),(148,'Negative : < 40 # Equivocal : 40 ….. 60  # Positive > 60'),(149,'1.4 …….. 78'),(150,'< 20'),(151,'Negative : < 1 # Positive > 1'),(152,' Negative :< 1  # Doubtful : 1 ….. 1.2 # Positive >1.2'),(153,'0.27 ……. 4.2'),(154,'1.3 ……… 3'),(155,'66 …….. 181'),(156,'3.1 ………. 6.8'),(157,'12 ………. 22'),(158,'10 ……… 65'),(159,'< 9 ( +ve ,, -ve)'),(160,'< 9 '),(161,'A-171 …… 536 # B- 5 ....… 25'),(162,'A-64 …….. 327'),(163,'A-140 …..... 690'),(164,'7.2 …….. 63.6'),(165,'Fasting : 1.1 …….. 17 # Post prandial : 16 ….. 166 # Randum : 2.6 ……..166'),(166,'1.1 …… 4.4'),(167,'Adult : 0.07 ……… 2.1 # young : < 15 ( 0.1 …… 7.8 )'),(168,'Normal response : > 10 # Abnormal response : < 5 # Equivocal : 5 ……. 10'),(169,'Normal response : > 10 # Abnormal response : < 5 # Equivocal : 5 ……. 10'),(170,'4000 ........ 11000'),(171,'Liquefied after 30 min'),(172,'White or gryish white'),(173,'White or greyish white'),(174,'Viscous'),(175,'1.5 ……. 7.6'),(176,'15 …….. 259'),(177,'39 …… 928'),(178,'31 ……... 34'),(179,'38 ……... 42'),(180,'55 …….....63'),(181,'3 ……… 4'),(182,'< 50'),(183,'200 …… 400'),(184,'≥7.2'),(185,'< 1'),(186,'None'),(187,'None or few'),(188,'Normal'),(189,'Turbid'),(190,'Clear'),(191,'N. up to 6'),(192,'N. Adult : up to 5 # N. Neonates : up to 30'),(193,'Nil'),(194,'N. Adult : 40 …. 70  # Infants & Children : 60 ……. 80'),(195,'N. 10% of blood level'),(196,'N. 10% of blood level'),(197,'2.4 …….. 3.1'),(198,'N.preterm : 15 … 130 # Fullterm : 40 …. 120 #< 1month :20 …… 80 # > 1month : 15 ……. 40'),(199,'up to 47'),(201,'N. Transudate <60 # Exudate : > 60'),(202,'N. Transudate <60 ,, Exudate : >60'),(203,'N. < 60'),(204,'N. Transudate <200 # Exudate : > 200'),(205,'N. Transudate <3 # Exudate : > 3'),(206,'N. Transudate <3 # Exudate : > 3'),(207,'N. up tp 200'),(208,'N. 10mg/dl <blood level'),(209,'up to 460'),(210,'N. 1 ….. 3'),(211,'N. Negative'),(212,'N. 0.5 ….. 0.9'),(213,'≤ 3'),(214,'up to 23'),(215,'up to 37'),(216,'up to50000'),(217,'up to 4'),(218,'up to 0.4'),(219,'M : up to 10 # Non prgnant : up to 10'),(220,'Non pregnant : up to 5 # 1st week : 10 …..30 # 2nd week : 30 ……. 100 # 3rd week : 100 ….. 1000 # 4th week : 1000 …… 10,000 # 2nd & 3rd month : 30,000 ……. 100,000 # 2nd trimester : 10,000 …….. 30,000 # 3rd trimester : 5000 ……. 15000'),(221,'< 0.1'),(222,'M : up to 30 # F : up to 13'),(223,'Negative : Detection limit 5.7 # Very low : < 2000 # Low : 2000 …… 100,000 # Intremediate : 100,000 …….. 1,000,000 #High : 1,0010,000,000 0,000 ……. # Very high : > 10,000,000'),(224,'Negative : Detection limit 10 # Very low : < 10,000 # : 10,000 …… 100,00Low 0 # Intremediate : 100,000 …….. 1,000,000 # High : 1,000,000 ……. 10,000,000 # Very high : > 10,000,000'),(225,'Rep'),(226,'≤ 3'),(227,'up to 23'),(228,'up to 5000'),(231,'M :up to 10 # Non pregnant : up to 10'),(232,'Non pregnant : up to 5 # 1st week : 10 …..30 # 2nd week : 30 ……. 100 # 3rd week : 100 ….. 1000 # 4th week : 1000 …… 10,000 # 2nd & 3rd month : 30,000 ……. 100,000 # 2nd trimester : 10,000 …….. 30,000 # 3rd trimester : 5000 ……. 15000'),(235,'M : up to 30 # F : up to 13'),(236,'Men < 50 yrs : 0 ........15 # Men > 50 yrs : 0 ......... 20 # Men > 50 yrs : 0 ......... 30 #Children : 0 ......... 10'),(237,'Men  :13 ........18 #  Women  : 11 ......... 16 '),(238,'0.13 ……… 0.63'),(239,'4500 .......... 11000'),(241,'135 …… 55'),(242,'No Reference'),(243,'3.8 ....... 10'),(244,'40 ............ 75'),(245,'20 ......... 40'),(246,'2 .......... 10'),(247,'1 ........ 6'),(248,'0 ........... 1'),(249,'2 .......... 7'),(250,'1 ......... 3'),(251,'0.2 ........ 1'),(252,'0.1 ........... 0.5'),(253,'0.02 .......... 0.1'),(254,'M: 4.5 ......... 5.5 # F: 3.8 ....... 4.8'),(255,'M: 15 ........ 17 # F: 12 ....... 14'),(256,'M: 45 ...... 50 # F: 36 ...... 46'),(257,'80 ......... 98'),(258,'27 ........ 32'),(259,'31.5 ....... 34.5'),(260,'150 ........ 450'),(261,'M : up to 10 # Non pregnant : up to 10'),(262,'M : up to 30 #  F : up to 13'),(263,'0 ......... 1'),(264,'ـــــــ'),(265,'< 10 Negative  # > 10 Positive'),(266,'Negative : up to 10'),(267,'Negative: up to 11'),(268,'Reprductive period : > 1.3 ,After menopausal < 0.5 # IVF Treatment Feasible with high dose < 0.7 # IVF Treatment No longer  Adfeasible < 0.13'),(269,'M : 150 …..1250 # F : 130 …. 1000'),(270,'M : 25 …..90 # F :2 …. 20'),(271,'M : 1.5 …….. 12.4 # F: Follicular : 3.5 ……12.5 # Luteal :1.7 …. 7.7 # Menopausal : 25.8 ……… 134.8 # Ovulation : 4.7 …….. 21.5'),(272,'M : 86 …..324 # F : 102 …. 496'),(273,'M : 1.7 …….. 8.6 # F: Follicular : 2.4 ……12.6 # Luteal : 0.5 …. 19.8 # Menopausal : 7.7 ……… 58.5 # Ovulation 14.2 …….. 95.5'),(274,'M : 5 ……..20 # F: Follicular : 12.5 ……166 # Luteal : 43.8 …. 211 #  Ovulation : 85.8 …….. 498'),(275,'M : 2.8 …..8 # F : 0.06 …. 0.82'),(276,'M : 4 …..30 # F : 0.4 …. 7.1'),(277,'M : 0.13 ….1.22 , F :  Folicular phase 0.15 ….1.4 # Luteal phase : 2 ……. 25 # Pregnanat women : First trimester 7.25 …… 90 # second trimester 19.5 …….91 # third trimester 49 …… 422'),(278,'Proteinuria : > 20mg/mmol # Nephrotic : > 350 mg/mmol'),(279,'≥1.1  suggest portal hypertension'),(280,'≥1.2  mostly transudative'),(281,'N. up tp 1000'),(282,'N. 15 ……. 161'),(283,'N. up tp 500'),(284,'N. up tp 100,000'),(285,'N: up to 50'),(286,'N: up to 40'),(287,'Equal to blood level'),(288,'N. Transudate < 20 #  Exudate : > 50'),(289,'up to 285'),(290,'N: 110 ......... 130');
/*!40000 ALTER TABLE `refs` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `refs` with 282 row(s)
--

--
-- Table structure for table `results`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `results` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `test_id` int(11) NOT NULL,
  `result` text NOT NULL,
  `reference_id` int(11) DEFAULT NULL,
  `unit_id` int(11) DEFAULT NULL,
  `service_id` int(11) NOT NULL,
  `request_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `test_id` (`test_id`),
  KEY `reference_id` (`reference_id`),
  KEY `unit_id` (`unit_id`),
  KEY `service_id` (`service_id`),
  KEY `request_id` (`request_id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `results_checkup_forgin_key` FOREIGN KEY (`test_id`) REFERENCES `checkup` (`id`) ON DELETE CASCADE,
  CONSTRAINT `results_labrequest_forgin_key` FOREIGN KEY (`request_id`) REFERENCES `labrequests` (`id`) ON DELETE CASCADE,
  CONSTRAINT `results_refs_forgin_key` FOREIGN KEY (`reference_id`) REFERENCES `refs` (`id`) ON DELETE CASCADE,
  CONSTRAINT `results_service_request_forgin_key` FOREIGN KEY (`service_id`) REFERENCES `service_request` (`id`) ON DELETE CASCADE,
  CONSTRAINT `results_units_forgin_key` FOREIGN KEY (`unit_id`) REFERENCES `units` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=65 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `results`
--

LOCK TABLES `results` WRITE;
/*!40000 ALTER TABLE `results` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `results` VALUES (1,13,'15',255,21,1,1,1,NULL,'2022-02-17 10:03:30'),(2,8,'Positive',NULL,NULL,1,2,1,NULL,'2022-02-17 10:03:55'),(3,10,'44',239,8,2,4,1,NULL,'2022-03-23 15:32:43'),(4,14,'Positive',NULL,NULL,2,5,1,NULL,'2022-03-23 15:32:52'),(5,10,'4',239,8,2,6,1,121,'2022-03-23 16:32:59'),(6,102,'6',244,6,2,6,1,121,'2022-03-23 16:32:59'),(7,103,'3',83,6,2,6,1,121,'2022-03-23 16:32:59'),(8,104,'5',246,6,2,6,1,121,'2022-03-23 16:32:59'),(9,105,'4',247,6,2,6,1,121,'2022-03-23 16:32:59'),(10,106,'4',248,6,2,6,1,121,'2022-03-23 16:32:59'),(11,107,'5',249,81,2,6,1,121,'2022-03-23 16:32:59'),(12,108,'5',250,81,2,6,1,121,'2022-03-23 16:32:59'),(13,109,'5',251,81,2,6,1,121,'2022-03-23 16:32:59'),(14,110,'5',252,81,2,6,1,121,'2022-03-23 16:32:59'),(15,111,'6',248,81,2,6,1,121,'2022-03-23 16:32:59'),(16,112,'9',254,92,2,6,1,121,'2022-03-23 16:32:59'),(17,13,'6',255,21,2,6,1,121,'2022-03-23 16:32:59'),(18,114,'6',256,6,2,6,1,121,'2022-03-23 16:32:59'),(19,115,'7',257,69,2,6,1,121,'2022-03-23 16:32:59'),(20,116,'7',258,70,2,6,1,121,'2022-03-23 16:32:59'),(21,117,'7',259,21,2,6,1,121,'2022-03-23 16:32:59'),(22,118,'7',260,81,2,6,1,121,'2022-03-23 16:32:59'),(23,119,'7',242,79,2,6,1,121,'2022-03-23 16:32:59'),(24,328,'878',264,43,2,7,1,346,'2022-03-23 16:46:04'),(25,329,'Clear',NULL,NULL,2,7,1,346,'2022-03-23 16:46:04'),(26,330,'5',199,20,2,7,1,346,'2022-03-23 16:46:04'),(27,10,'7',239,8,2,7,1,346,'2022-03-23 16:46:04'),(28,112,'45',254,92,2,7,1,346,'2022-03-23 16:46:04'),(29,334,'5',203,75,2,7,1,346,'2022-03-23 16:46:04'),(30,335,'43',204,20,2,7,1,346,'2022-03-23 16:46:04'),(31,340,'2',197,75,2,7,1,346,'2022-03-23 16:46:04'),(32,351,'3',290,94,2,7,1,346,'2022-03-23 16:46:04'),(33,337,'3',205,21,2,7,1,346,'2022-03-23 16:46:04'),(34,338,'e44',NULL,NULL,2,7,1,346,'2022-03-23 16:46:04'),(35,11,'40',6,5,3,8,1,NULL,'2022-06-06 16:52:43'),(36,13,'11',255,21,4,11,1,NULL,'2022-08-02 09:29:51'),(37,8,'Positive',NULL,NULL,4,12,1,NULL,'2022-08-02 09:29:58'),(38,10,'5000',239,8,4,13,1,NULL,'2022-08-02 09:30:11'),(39,8,'Positive',NULL,NULL,5,14,1,NULL,'2022-08-22 08:47:34'),(40,13,'15',255,21,5,15,1,NULL,'2022-08-22 08:47:47'),(41,11,'40',6,5,5,16,1,NULL,'2022-08-22 08:47:58'),(42,8,'Positive',NULL,NULL,6,17,1,NULL,'2022-12-15 11:53:46'),(43,11,'45',6,5,6,18,1,NULL,'2022-12-15 11:54:14'),(44,13,'10',255,21,6,19,1,NULL,'2022-12-15 11:54:27'),(45,14,'Positive',NULL,NULL,6,20,1,NULL,'2022-12-15 11:54:35'),(46,69,'26',46,75,6,21,1,299,'2022-12-15 17:40:13'),(47,70,'78',52,75,6,21,1,299,'2022-12-15 17:40:13'),(48,71,'64',53,21,6,21,1,299,'2022-12-15 17:40:14'),(49,72,'4',54,21,6,21,1,299,'2022-12-15 17:40:14'),(50,73,'89',55,21,6,21,1,299,'2022-12-15 17:40:14'),(51,74,'40',56,16,6,21,1,299,'2022-12-15 17:40:14'),(52,75,'30',57,20,6,21,1,299,'2022-12-15 17:40:14'),(53,76,'58',58,20,6,21,1,299,'2022-12-15 17:40:14'),(54,77,'3',59,20,6,21,1,299,'2022-12-15 17:40:14'),(55,8,'Positive',NULL,NULL,7,22,1,NULL,'2022-12-18 08:04:49'),(56,11,'5',6,5,7,23,1,NULL,'2022-12-18 08:04:59'),(57,13,'14',255,21,7,24,1,NULL,'2022-12-18 08:05:10'),(58,10,'4000',239,8,8,25,1,NULL,'2022-12-22 03:56:14'),(59,13,'15',255,21,8,26,1,NULL,'2022-12-22 03:56:22'),(60,14,'Positive',NULL,NULL,8,27,1,NULL,'2022-12-22 03:56:29'),(61,8,'Positive',NULL,NULL,9,28,1,NULL,'2022-12-30 17:55:56'),(62,11,'40',6,5,9,29,1,NULL,'2022-12-30 17:56:16'),(63,8,' Negative',NULL,NULL,11,31,1,NULL,'2023-01-08 09:51:41'),(64,11,'30',6,5,11,32,1,NULL,'2023-01-08 09:51:58');
/*!40000 ALTER TABLE `results` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `results` with 64 row(s)
--

--
-- Table structure for table `service_request`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `service_request` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `patient_id` int(11) NOT NULL,
  `referral` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `patient_id` (`patient_id`),
  CONSTRAINT `service_patient_forign_id` FOREIGN KEY (`patient_id`) REFERENCES `patients` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `service_request`
--

LOCK TABLES `service_request` WRITE;
/*!40000 ALTER TABLE `service_request` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `service_request` VALUES (1,1,'','2022-02-17 10:02:45'),(2,1,'','2022-03-23 15:32:23'),(3,1,'','2022-06-06 16:51:56'),(4,1,'','2022-08-02 09:29:08'),(5,2,'','2022-08-22 08:47:05'),(6,2,'','2022-12-15 11:53:14'),(7,2,'','2022-12-18 08:04:14'),(8,2,'','2022-12-22 03:55:53'),(9,2,'','2022-12-30 17:55:18'),(10,2,'','2023-01-04 19:47:07'),(11,1,'','2023-01-08 09:51:23');
/*!40000 ALTER TABLE `service_request` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `service_request` with 11 row(s)
--

--
-- Table structure for table `setting`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `setting` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `lab_name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `setting`
--

LOCK TABLES `setting` WRITE;
/*!40000 ALTER TABLE `setting` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `setting` VALUES (1,'ALtra Lab','Bahry - Shamabat','0999435643','altra_one@gmail.com');
/*!40000 ALTER TABLE `setting` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `setting` with 1 row(s)
--

--
-- Table structure for table `units`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `units` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `unit` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=95 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `units`
--

LOCK TABLES `units` WRITE;
/*!40000 ALTER TABLE `units` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `units` VALUES (4,'X10³/μL'),(5,'mm.hr'),(6,'%'),(7,'mIU/ml'),(8,'cell/cmm'),(9,'ml/min'),(10,'mg Albumin/gm Creatinine'),(11,'mg/day'),(12,'mg Ca./mg Creatinine'),(13,'mg protein /mg Creatinine'),(14,'mlEq/L  '),(15,'mlEq/day '),(16,'μg/dl'),(17,'μg/day'),(18,'pg/ml'),(19,'ng/dl'),(20,'U/L'),(21,'g/dl'),(22,'U/day'),(23,'mm Hg'),(24,'mmol/L'),(25,'mg/day'),(26,'U/ml'),(27,' μg/ml'),(28,'min'),(29,'Sec'),(30,'mU/ml'),(31,'U/g Hb'),(32,'Col'),(34,'AU/ml'),(35,'U/l'),(36,'U/ml'),(37,' μU/ml'),(38,' A-nmol/l B-μg/dl'),(39,' A-nmol/day B-μg/day'),(40,'ml/Ejaculate'),(41,'10⁶ /ml'),(42,'10⁶ /Ejaculate'),(43,'cm H₂O'),(45,'Cells/μl'),(48,'Yellow'),(49,'Red'),(50,'Acidic'),(51,'Alkaline'),(52,'Trace'),(53,'uncountable'),(54,'Schistosoma haematopium'),(55,'T.vaginalis'),(56,'+'),(57,'++'),(58,'+++'),(59,'++++'),(60,'Solid'),(61,'Semisolid'),(62,'Watery'),(63,'Brown'),(64,'Black'),(65,'Gardia'),(66,'Amoeba'),(67,'X10³/μL'),(68,'X106/μL'),(69,'fL'),(70,'Pg'),(72,'< 10'),(74,'mg/l'),(75,'mg/dl'),(76,'< 30'),(77,'mg Protein/mg Creatinine'),(78,'mg U.A / mg Creatinine'),(79,'No Unit'),(81,'X〖10〗^3 /μL'),(82,'μmol/l'),(83,'IU/ml'),(84,'ng/ml'),(86,'uIU/l'),(87,'nmol/l'),(88,'pmol/l'),(89,'H.P.F'),(90,'ــــــ'),(91,'mlu/ml'),(92,'X10⁶/μL'),(93,'mg/mmol'),(94,'mEq/l');
/*!40000 ALTER TABLE `units` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `units` with 83 row(s)
--

--
-- Table structure for table `users`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(249) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `username` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(2) unsigned NOT NULL DEFAULT 0,
  `verified` tinyint(1) unsigned NOT NULL DEFAULT 0,
  `resettable` tinyint(1) unsigned NOT NULL DEFAULT 1,
  `roles_mask` int(10) unsigned NOT NULL DEFAULT 0,
  `registered` int(10) unsigned NOT NULL,
  `last_login` int(10) unsigned DEFAULT NULL,
  `force_logout` mediumint(7) unsigned NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `users` VALUES (1,'mod47387@yahoo.com','$2y$10$QaAzFGYmnbBsHfbwydSK1ug6eaW2/YXJcx312o6feuhGOpT6CblyC','mod47387',0,1,1,1,1622394801,1673171466,1),(2,'mod47387@gmail.com','$2y$10$A0eVdYzCCKpi8b9qobbe1ulZBwiPcQ18Wle.LtJMTG1jRp7EIyHHm','moh123',0,1,1,1,1622395297,1622411499,3),(3,'lab@klab.com','$2y$10$gTejFMTAtQwJt1WL8cKXnu6G5tciaDU8HeKOy4LM4ms7p6JStgGri','Lab Tech',0,1,1,2048,1622411580,1642532720,7),(4,'acc@klab.com','$2y$10$OBkXCqnBPxVJGNZfk1qfBOp6ydDGUaxNHhPTvIQyMpHU4BWBjcG9W','accountant',0,1,1,8192,1622840563,1638034592,2);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `users` with 4 row(s)
--

--
-- Table structure for table `users_confirmations`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users_confirmations` (
  `id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `email` varchar(249) COLLATE utf8mb4_unicode_ci NOT NULL,
  `selector` varchar(16) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `token` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `expires` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `selector` (`selector`),
  KEY `email_expires` (`email`,`expires`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users_confirmations`
--

LOCK TABLES `users_confirmations` WRITE;
/*!40000 ALTER TABLE `users_confirmations` DISABLE KEYS */;
SET autocommit=0;
/*!40000 ALTER TABLE `users_confirmations` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `users_confirmations` with 0 row(s)
--

--
-- Table structure for table `users_info`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users_info` (
  `id` int(11) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_type` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_type` (`user_type`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users_info`
--

LOCK TABLES `users_info` WRITE;
/*!40000 ALTER TABLE `users_info` DISABLE KEYS */;
SET autocommit=0;
/*!40000 ALTER TABLE `users_info` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `users_info` with 0 row(s)
--

--
-- Table structure for table `users_remembered`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users_remembered` (
  `id` bigint(20) unsigned NOT NULL,
  `user` int(10) unsigned NOT NULL,
  `selector` varchar(24) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `token` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `expires` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `selector` (`selector`),
  KEY `user` (`user`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users_remembered`
--

LOCK TABLES `users_remembered` WRITE;
/*!40000 ALTER TABLE `users_remembered` DISABLE KEYS */;
SET autocommit=0;
/*!40000 ALTER TABLE `users_remembered` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `users_remembered` with 0 row(s)
--

--
-- Table structure for table `users_resets`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users_resets` (
  `id` bigint(20) unsigned NOT NULL,
  `user` int(10) unsigned NOT NULL,
  `selector` varchar(20) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `token` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `expires` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `selector` (`selector`),
  KEY `user_expires` (`user`,`expires`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users_resets`
--

LOCK TABLES `users_resets` WRITE;
/*!40000 ALTER TABLE `users_resets` DISABLE KEYS */;
SET autocommit=0;
/*!40000 ALTER TABLE `users_resets` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `users_resets` with 0 row(s)
--

--
-- Table structure for table `users_throttling`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users_throttling` (
  `bucket` varchar(44) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `tokens` float unsigned NOT NULL,
  `replenished_at` int(10) unsigned NOT NULL,
  `expires_at` int(10) unsigned NOT NULL,
  PRIMARY KEY (`bucket`),
  KEY `expires_at` (`expires_at`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users_throttling`
--

LOCK TABLES `users_throttling` WRITE;
/*!40000 ALTER TABLE `users_throttling` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `users_throttling` VALUES ('ejWtPDKvxt-q7LZ3mFjzUoIWKJYzu47igC8Jd9mffFk',74,1671105156,1671645156),('CUeQSH1MUnRpuE3Wqv_fI3nADvMpK_cg6VpYK37vgIw',4,1622840563,1623272563),('Jjl8HEbTSJpZBWoyXOajJXqciuUdngUbah061jwhliE',16.0267,1654541482,1654577482),('ywqr3yI2X9ot3ijkNY9Ptz6q92scKGNnG436k9NOcEw',499,1654541482,1654714282),('wdJXUeynPWkRCeYrGUeIx4TYIqArg4e9tTFXHnqOTgc',497.11,1654541477,1654714277),('ff-vH1HZ_YG1zOasne_fmE6E-4PXKnM9ftkT7G26GGk',499,1622891237,1623064037),('QduM75nGblH2CDKFyk0QeukPOwuEVDAUFE54ITnHM38',74,1673171466,1673711466);
/*!40000 ALTER TABLE `users_throttling` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `users_throttling` with 7 row(s)
--

/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on: Sun, 08 Jan 2023 10:54:31 +0100
