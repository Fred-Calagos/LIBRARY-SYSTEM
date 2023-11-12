-- MySQL dump 10.13  Distrib 8.0.32, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: library
-- ------------------------------------------------------
-- Server version	8.0.32

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
-- Table structure for table `add-books`
--

DROP TABLE IF EXISTS `add-books`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `add-books` (
  `id` int NOT NULL AUTO_INCREMENT,
  `books_name` varchar(45) NOT NULL,
  `books_image` varchar(5000) NOT NULL,
  `books_author_name` varchar(50) NOT NULL,
  `books_publication_name` varchar(45) NOT NULL,
  `books_purchase_date` varchar(20) NOT NULL,
  `books_price` varchar(10) NOT NULL,
  `books_availability` varchar(20) NOT NULL,
  `books_file` varchar(5000) NOT NULL,
  `books_publication_date` varchar(45) NOT NULL,
  `category` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=58 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `add-books`
--

LOCK TABLES `add-books` WRITE;
/*!40000 ALTER TABLE `add-books` DISABLE KEYS */;
INSERT INTO `add-books` VALUES (48,'Anti-virus Hacker','../../library/books-image/1682993011.png','David Kim and Michael G. Solomon','Jones and Bartlett Learning','2020-01-01','420','195','../../library/books-file/1682993011.pdf','2020-01-01','Programming'),(49,'Cracking Code With Python','../../library/books-image/1682993119.png','David Kim and Michael G. Solomon','Jones and Bartlett Learning','2020-01-01','420','195','../../library/books-file/1682993119.pdf','2020-01-01','Programming'),(50,'Arduino for Beginners','../../library/books-image/1682993734.png','David Kim and Michael G. Solomon','Jones and Bartlett Learning','2020-01-01','420','196','../../library/books-file/1682993734.pdf','2020-01-01','Programming'),(51,'Computer Hardware','../../library/books-image/1683133649.png','David Kim and Michael G. Solomon','Jones and Bartlett Learningads','2020-01-01','420','197','../../library/books-file/1683133649.pdf','2020-01-01','Programming'),(53,'Art','../../library/books-image/1683279207.jpg','Frederick','asddasdas','2020-01-01','430','198','../../library/books-file/1683279207.pdf','2020-01-01','Art'),(56,'INFORMATION ASSURANCE AND SECURITY','../../library/books-image/1684462828.png','David Kim and Michael G. Solomona','Jones and Bartlett Learningads','2023-01-01','430','200','../../library/books-file/1684462828.pdf','2016-05-01','Programming'),(57,'PYTHON','../../library/books-image/1684463321.png','Unknown','Jones and Bartlett Learningads','2020-01-01','420','200','../../library/books-file/1684463321.pdf','2020-01-08','Programming');
/*!40000 ALTER TABLE `add-books` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `admin` (
  `id` int NOT NULL AUTO_INCREMENT,
  `FullName` varchar(100) NOT NULL,
  `AdminEmail` varchar(100) DEFAULT NULL,
  `UserName` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `reset_link_token` varchar(255) NOT NULL,
  `exp_date` varchar(255) NOT NULL,
  `updationDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `admin_profile` varchar(500) DEFAULT NULL,
  `role` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `AdminEmail_UNIQUE` (`AdminEmail`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin`
--

LOCK TABLES `admin` WRITE;
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
INSERT INTO `admin` VALUES (1,'Fredericksdfsd','frederickcalagos7@gmail.com','admin','admin','','','2023-07-24 17:14:08','../../image/image-admin/1683271635.jpg','admin');
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `book_cart`
--

DROP TABLE IF EXISTS `book_cart`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `book_cart` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_name` varchar(505) NOT NULL,
  `book_name` varchar(105) NOT NULL,
  `price` varchar(45) NOT NULL,
  `image` varchar(505) NOT NULL,
  `quantity` varchar(55) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=206 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `book_cart`
--

LOCK TABLES `book_cart` WRITE;
/*!40000 ALTER TABLE `book_cart` DISABLE KEYS */;
INSERT INTO `book_cart` VALUES (202,'Fred','Arduino for Beginners','420','../../library/books-image/1682993734.png','1'),(203,'admin','Art','430','../../library/books-image/1683279207.jpg','1'),(204,'admin','Arduino for Beginners','420','../../library/books-image/1682993734.png','1'),(205,'Fred','Cracking Code With Python','420','../../library/books-image/1682993119.png','1');
/*!40000 ALTER TABLE `book_cart` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `buy-books`
--

DROP TABLE IF EXISTS `buy-books`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `buy-books` (
  `id` int NOT NULL AUTO_INCREMENT,
  `book-image` varchar(5000) NOT NULL,
  `book-name` varchar(45) NOT NULL,
  `quantity` varchar(45) NOT NULL,
  `check_out_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `book-price` int NOT NULL,
  `shop` varchar(100) NOT NULL,
  `seller-name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `buy-books`
--

LOCK TABLES `buy-books` WRITE;
/*!40000 ALTER TABLE `buy-books` DISABLE KEYS */;
/*!40000 ALTER TABLE `buy-books` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `category` (
  `id` int NOT NULL AUTO_INCREMENT,
  `category` varchar(75) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `category`
--

LOCK TABLES `category` WRITE;
/*!40000 ALTER TABLE `category` DISABLE KEYS */;
INSERT INTO `category` VALUES (3,'Programming'),(4,'ROMANCE'),(5,'SCI-FI'),(6,'HISTORY'),(7,'ART'),(8,'CSS');
/*!40000 ALTER TABLE `category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `requested-books`
--

DROP TABLE IF EXISTS `requested-books`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `requested-books` (
  `id` int NOT NULL AUTO_INCREMENT,
  `requestor` varchar(105) NOT NULL,
  `username` varchar(105) NOT NULL,
  `email` varchar(75) NOT NULL,
  `request-bookname` varchar(105) NOT NULL,
  `book-url` varchar(500) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `requested-books`
--

LOCK TABLES `requested-books` WRITE;
/*!40000 ALTER TABLE `requested-books` DISABLE KEYS */;
INSERT INTO `requested-books` VALUES (18,'Frederick Dadap Ansale','Fred','fred@gmail.com ','The Labyrinth of Sage','https://www.pdfdrive.com');
/*!40000 ALTER TABLE `requested-books` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `role`
--

DROP TABLE IF EXISTS `role`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `role` (
  `role_id` int NOT NULL AUTO_INCREMENT,
  `role` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`role_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `role`
--

LOCK TABLES `role` WRITE;
/*!40000 ALTER TABLE `role` DISABLE KEYS */;
INSERT INTO `role` VALUES (1,'admin'),(2,'user'),(3,'teacher');
/*!40000 ALTER TABLE `role` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sales`
--

DROP TABLE IF EXISTS `sales`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sales` (
  `id` int NOT NULL AUTO_INCREMENT,
  `product_name` varchar(105) NOT NULL,
  `quantity` varchar(45) NOT NULL,
  `price` varchar(45) NOT NULL,
  `total` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=110 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sales`
--

LOCK TABLES `sales` WRITE;
/*!40000 ALTER TABLE `sales` DISABLE KEYS */;
INSERT INTO `sales` VALUES (99,'INFORMATION ASSURANCE AND SECURITY','22','5460','120120'),(100,' Black Hat Python','6','2520','15120'),(101,' Anti-virus Hacker','3','1260','3780'),(102,' Cracking Code With Python','4','1680','6720'),(103,' Arduino for Beginners','4','1680','6720'),(104,' Computer Hardware','3','1260','3780'),(105,' Art','2','860','1720'),(106,' PYTHON','2','860','1720'),(107,'Cracking Code With Python','1','420','420'),(108,' INFORMATION ASSURANCE AND SECURITY','1','420','420'),(109,'Anti-virus Hacker','2','420','840');
/*!40000 ALTER TABLE `sales` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user` (
  `id` int NOT NULL AUTO_INCREMENT,
  `fname` varchar(100) NOT NULL,
  `mname` varchar(100) NOT NULL,
  `lname` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `contact` varchar(100) NOT NULL,
  `user-profile` varchar(500) NOT NULL,
  `street` varchar(250) NOT NULL,
  `city` varchar(250) NOT NULL,
  `country` varchar(250) NOT NULL,
  `role` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email_UNIQUE` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (7,'Frederick','Dadap','calagos ','asdasd','12312','f@southernleytestateu.edu.ph ','asdad','../../image/image-user/1683605190.jpg','dasd','asdas ','asdad','user'),(8,'Frederick','Dadap','Ansale','Fred','Fred','fred@gmail.com ','213124123','../../image/image-user/1684132914.JPG','Brgy. Ambacon','Hinunangan ','Philippines','user');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user-order`
--

DROP TABLE IF EXISTS `user-order`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user-order` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(105) NOT NULL,
  `number` varchar(45) NOT NULL,
  `email` varchar(75) NOT NULL,
  `method` varchar(75) NOT NULL,
  `street` varchar(250) NOT NULL,
  `city` varchar(250) NOT NULL,
  `country` varchar(250) NOT NULL,
  `pin_code` varchar(25) NOT NULL,
  `total_products` varchar(500) NOT NULL,
  `total_price` varchar(500) NOT NULL,
  `status` varchar(45) NOT NULL,
  `updationDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=111 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user-order`
--

LOCK TABLES `user-order` WRITE;
/*!40000 ALTER TABLE `user-order` DISABLE KEYS */;
INSERT INTO `user-order` VALUES (96,'Frederick Calagos Dadap','09169134593','frederickcalagos7@gmail.com','cash on delivery','Brgy. Tawog','Hinunangan','Philippines','554875206310865665','INFORMATION ASSURANCE AND SECURITY(4)(420), Black Hat Python(1)(420), Anti-virus Hacker(1)(420), Cracking Code With Python(1)(420), Arduino for Beginners(1)(420), Computer Hardware(1)(420), Art(1)(430), PYTHON(1)(430)','2961','Pending','2023-05-17 19:59:59'),(97,'Frederick sdadasdadas  Dadap','213124123','fred@gmail.com','cash on delivery','Brgy. Ambacon','Hinunangan ','Philippines','886984832287992790','INFORMATION ASSURANCE AND SECURITY(1)(420), Black Hat Python(1)(420), Anti-virus Hacker(1)(420), Cracking Code With Python(1)(420), Arduino for Beginners(1)(420), Computer Hardware(1)(420), Art(1)(430), PYTHON(1)(430)','3380','Pending','2023-05-17 20:01:11'),(98,'Frederick sdadasdadas  Dadap','213124123','fred@gmail.com','cash on delivery','Brgy. Ambacon','Hinunangan ','Philippines','647938392920213642','INFORMATION ASSURANCE AND SECURITY(1)(420), Black Hat Python(1)(420), Anti-virus Hacker(1)(420), Cracking Code With Python(1)(420), Arduino for Beginners(1)(420), Computer Hardware(1)(420)','2520','Pending','2023-05-17 20:10:37'),(99,'Frederick sdadasdadas  Dadap','213124123','fred@gmail.com','cash on delivery','Brgy. Ambacon','Hinunangan ','Philippines','970400829005856471','INFORMATION ASSURANCE AND SECURITY(1)(420), Black Hat Python(1)(420)','840','Pending','2023-05-17 20:13:26'),(100,'Frederick sdadasdadas  Dadap','213124123','fred@gmail.com','cash on delivery','Brgy. Ambacon','Hinunangan ','Philippines','543655683322729255','INFORMATION ASSURANCE AND SECURITY(4)(420)','1','Pending','2023-05-17 20:19:43'),(101,'Frederick sdadasdadas  Dadap','213124123','fred@gmail.com','cash on delivery','Brgy. Ambacon','Hinunangan ','Philippines','810751822448630768','INFORMATION ASSURANCE AND SECURITY(1)(420), Black Hat Python(1)(420)','840','Pending','2023-05-17 20:23:41'),(102,'Frederick sdadasdadas  Dadap','213124123','fred@gmail.com','cash on delivery','Brgy. Ambacon','Hinunangan ','Philippines','771329552072772959','INFORMATION ASSURANCE AND SECURITY(1)(420)','420','Pending','2023-05-17 20:23:59'),(103,'Frederick sdadasdadas  Dadap','213124123','fred@gmail.com','cash on delivery','Brgy. Ambacon','Hinunangan ','Philippines','969634693317931755','INFORMATION ASSURANCE AND SECURITY(1)(420), Black Hat Python(1)(420)','840','Pending','2023-05-17 20:28:45'),(104,'Frederick sdadasdadas  Dadap','213124123','fred@gmail.com','cash on delivery','Brgy. Ambacon','Hinunangan ','Philippines','496160783591145811','INFORMATION ASSURANCE AND SECURITY(4)(420)','1','Pending','2023-05-17 20:29:23'),(105,'Frederick sdadasdadas  Dadap','213124123','fred@gmail.com','cash on delivery','Brgy. Ambacon','Hinunangan ','Philippines','433419717970947950','Cracking Code With Python(1)(420), INFORMATION ASSURANCE AND SECURITY(1)(420)','840','Pending','2023-05-17 20:37:34'),(106,'Frederick sdadasdadas  Dadap','213124123','fred@gmail.com','cash on delivery','Brgy. Ambacon','Hinunangan ','Philippines','867416896970414881','INFORMATION ASSURANCE AND SECURITY(1)(420)','420','Pending','2023-05-17 20:39:44'),(107,'Frederick sdadasdadas  Dadap','213124123','fred@gmail.com','cash on delivery','Brgy. Ambacon','Hinunangan ','Philippines','185901708404872801','INFORMATION ASSURANCE AND SECURITY(1)(420)','420','Pending','2023-05-17 20:42:25'),(108,'Frederick sdadasdadas  Dadap','213124123','fred@gmail.com','cash on delivery','Brgy. Ambacon','Hinunangan ','Philippines','855821578014780905','INFORMATION ASSURANCE AND SECURITY(1)(420)','420','Pending','2023-05-17 20:44:26'),(109,'Frederick sdadasdadas  Dadap','213124123','fred@gmail.com','cash on delivery','Brgy. Ambacon','Hinunangan ','Philippines','280860521597151488','INFORMATION ASSURANCE AND SECURITY(1)(420)','420','Pending','2023-05-17 20:44:47'),(110,'Frederick Ansale Dadap','213124123','fred@gmail.com','cash on delivery','Brgy. Ambacon','Hinunangan ','Philippines','939213612991235708','Anti-virus Hacker(2)(420), Cracking Code With Python(1)(420), Arduino for Beginners(1)(420)','1680','Pending','2023-05-19 02:24:51');
/*!40000 ALTER TABLE `user-order` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-07-25  2:24:30
