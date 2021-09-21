-- MySQL dump 10.13  Distrib 8.0.21, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: tocamadera
-- ------------------------------------------------------
-- Server version	5.5.5-10.5.8-MariaDB

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
-- Dumping data for table `categoria`
--

LOCK TABLES `categoria` WRITE;
/*!40000 ALTER TABLE `categoria` DISABLE KEYS */;
INSERT INTO `categoria` VALUES (2,'Salon','foto_categoria_6102ed148e5a5.png'),(4,'Cocina','foto_producto_61040a298b22c.png'),(5,'Iluminacion','foto_categoria_6104484a45ba1.png'),(6,'Dormitorios','foto_categoria_610448c812e1a.png');
/*!40000 ALTER TABLE `categoria` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `cliente`
--

LOCK TABLES `cliente` WRITE;
/*!40000 ALTER TABLE `cliente` DISABLE KEYS */;
INSERT INTO `cliente` VALUES (1,_binary 'Maria',_binary 'Martinez Sanz',636162341,_binary 'Madrid',_binary 'Biarritz 7',28028,4,_binary 'cliente1@cliente1.com',6),(2,_binary 'cliente',_binary 'cc',643215789,_binary 'Madrid',_binary 'Alfonso XIII',28001,3,_binary 'cliente@cliente.com',2),(3,_binary 'Maria',_binary 'Martinez',636162341,_binary 'Madrid',_binary 'Alfonso XIII',28150,3,_binary 'marysanz97@gmail.com',3),(4,_binary 'Pedro',_binary 'Fidalgo',656789008,_binary 'Madrid',_binary 'Rio Jucar',28100,11,_binary 'pfidalgo1@gmail.com',4);
/*!40000 ALTER TABLE `cliente` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `doctrine_migration_versions`
--

LOCK TABLES `doctrine_migration_versions` WRITE;
/*!40000 ALTER TABLE `doctrine_migration_versions` DISABLE KEYS */;
INSERT INTO `doctrine_migration_versions` VALUES (_binary 'DoctrineMigrations\\Version20210721173129','2021-07-21 19:31:42',569),(_binary 'DoctrineMigrations\\Version20210722104514','2021-07-22 12:45:24',71),(_binary 'DoctrineMigrations\\Version20210723110846','2021-07-23 13:08:52',184),(_binary 'DoctrineMigrations\\Version20210723184930','2021-07-23 20:49:35',216),(_binary 'DoctrineMigrations\\Version20210723185710','2021-07-23 20:57:15',192),(_binary 'DoctrineMigrations\\Version20210723190029','2021-07-23 21:00:35',178),(_binary 'DoctrineMigrations\\Version20210726181437','2021-07-26 20:14:42',46),(_binary 'DoctrineMigrations\\Version20210726182147','2021-07-26 20:22:01',45),(_binary 'DoctrineMigrations\\Version20210728181041','2021-07-28 20:10:54',90),(_binary 'DoctrineMigrations\\Version20210728185806','2021-07-28 20:58:10',104),(_binary 'DoctrineMigrations\\Version20210729175326','2021-07-29 19:53:32',205),(_binary 'DoctrineMigrations\\Version20210729180907','2021-07-29 20:09:12',142),(_binary 'DoctrineMigrations\\Version20210729181102','2021-07-29 20:11:07',61),(_binary 'DoctrineMigrations\\Version20210729181148','2021-07-29 20:11:51',112),(_binary 'DoctrineMigrations\\Version20210730145050','2021-07-30 16:50:54',144),(_binary 'DoctrineMigrations\\Version20210820085829','2021-08-20 10:58:35',284),(_binary 'DoctrineMigrations\\Version20210901155030','2021-09-01 17:50:37',253),(_binary 'DoctrineMigrations\\Version20210921134933','2021-09-21 15:49:50',304),(_binary 'DoctrineMigrations\\Version20210921141027','2021-09-21 16:10:32',60);
/*!40000 ALTER TABLE `doctrine_migration_versions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `entrega`
--

LOCK TABLES `entrega` WRITE;
/*!40000 ALTER TABLE `entrega` DISABLE KEYS */;
/*!40000 ALTER TABLE `entrega` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `factura`
--

LOCK TABLES `factura` WRITE;
/*!40000 ALTER TABLE `factura` DISABLE KEYS */;
INSERT INTO `factura` VALUES (2,3),(3,4),(4,5);
/*!40000 ALTER TABLE `factura` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `modo_pago`
--

LOCK TABLES `modo_pago` WRITE;
/*!40000 ALTER TABLE `modo_pago` DISABLE KEYS */;
INSERT INTO `modo_pago` VALUES (1,1,12341,343,_binary 'Maria Martinez Sanz',12,2020);
/*!40000 ALTER TABLE `modo_pago` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `pedido`
--

LOCK TABLES `pedido` WRITE;
/*!40000 ALTER TABLE `pedido` DISABLE KEYS */;
INSERT INTO `pedido` VALUES (3,1,'2021-09-01 19:47:00',1),(4,1,'2021-09-01 20:14:00',3),(5,2,'2021-09-02 16:08:00',3),(6,1,'2021-09-08 16:35:00',2),(7,1,'2021-09-10 17:04:00',2);
/*!40000 ALTER TABLE `pedido` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `pedido_productos`
--

LOCK TABLES `pedido_productos` WRITE;
/*!40000 ALTER TABLE `pedido_productos` DISABLE KEYS */;
INSERT INTO `pedido_productos` VALUES (3,9),(4,11),(4,12),(5,9),(6,11),(7,11);
/*!40000 ALTER TABLE `pedido_productos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `productos`
--

LOCK TABLES `productos` WRITE;
/*!40000 ALTER TABLE `productos` DISABLE KEYS */;
INSERT INTO `productos` VALUES (9,_binary 'Mesa Milka',5,_binary '2m x 1m',_binary 'marron',1.00,_binary 'foto_producto_6104196563de7.png',1),(10,_binary 'Mesa Like',3,_binary '2m x 2m',_binary 'negro',400.00,_binary 'foto_producto_61043921d48f3.png',3),(11,_binary 'Mesa Salon',12,_binary '2m x 2m',_binary 'negro',100.00,_binary 'foto_producto_61043c696eaaf.png',1),(12,_binary 'Mesa',2,_binary '2m x 2m',_binary 'negro',100.00,_binary 'foto_producto_610440f879546.png',3),(13,_binary 'Mesa',2,_binary '2m x 2m',_binary 'negro',100.00,_binary 'foto_producto_610441d13bf39.png',3),(14,_binary 'Mesa',2,_binary '2m x 2m',_binary 'negro',100.00,_binary 'foto_producto_610441db5082b.png',3),(15,_binary 'Consola be like',4,_binary '1m x 30cm x 1m',_binary 'blanco',30.00,_binary 'foto_producto_610446e669d72.png',5),(16,_binary 'Savy',20,_binary 'L: 0,81 x A: 0,80 (distancia techo lampara: 0,35) grosor lampara: 5 cm',_binary 'marron',100.00,_binary 'foto_producto_6149f9345f2a2.jpg',6),(17,_binary 'Ratán Satu',20,_binary 'Alto: 182 cm Diametro: 40 cm Peso: 1,45 kg Alto Pantalla: 43 cm Largo cable: 1,5 m',_binary 'Beige Lino',120.00,_binary 'foto_producto_6149fcc935f1f.jpg',6),(18,_binary 'Vasil',20,_binary 'Alto: 52,5 cm Ancho: 35 cm Profundidad: 35 cm Diametro: 34 cm Peso: 1 kg Alto Pantalla: 21,7 Largo cable: ~150 cm',_binary 'Marrón Natural',90.00,_binary 'foto_producto_6149fdb6bacb8.jpg',8),(19,_binary 'TELA SAEK',30,_binary 'Alto: 30,5 cm Ancho: 21 cm Profundidad: 21 cm Diametro: 18 cm Peso: 0,67kg Altura Patas: 8,5 cm Ancho Patas: 15 cm Largo Cable: ~150cm',_binary 'Beige Crema',85.00,_binary 'foto_producto_6149fe69dba12.jpg',8),(20,_binary 'QEPIS',20,_binary 'Alto: 161 cm Ancho: 30 cm Profundidad: 30 cm Diametro: 23 cm Peso: 5,55 Kg Alto Pantalla: 38,2 cm Largo cable: 326 cm Grosor del Tablero: 1,3 cm',_binary 'Natural',130.00,_binary 'foto_producto_614a0625a55b6.jpg',9),(21,_binary 'YNEH',20,_binary '2m x 2m',_binary 'Beige Crema',300.00,_binary 'foto_producto_614a074386c47.png',10);
/*!40000 ALTER TABLE `productos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `proveedor`
--

LOCK TABLES `proveedor` WRITE;
/*!40000 ALTER TABLE `proveedor` DISABLE KEYS */;
INSERT INTO `proveedor` VALUES (1,_binary 'Banni',638263258,_binary 'banni@gmail.com',_binary 'Madrid');
/*!40000 ALTER TABLE `proveedor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `proveedor_productos`
--

LOCK TABLES `proveedor_productos` WRITE;
/*!40000 ALTER TABLE `proveedor_productos` DISABLE KEYS */;
INSERT INTO `proveedor_productos` VALUES (1,9),(1,13),(1,14),(1,15),(1,16),(1,19),(1,20),(1,21);
/*!40000 ALTER TABLE `proveedor_productos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `subcategoria`
--

LOCK TABLES `subcategoria` WRITE;
/*!40000 ALTER TABLE `subcategoria` DISABLE KEYS */;
INSERT INTO `subcategoria` VALUES (1,_binary 'Mesas de Centro',_binary 'foto_subcategoria_61040abb4c162.png',2),(3,_binary 'Mesas de Centro',_binary 'foto_subcategoria_61040ba641481.png',4),(5,_binary 'consolas',_binary 'foto_subcategoria_6104467a6b237.png',2),(6,_binary 'Lamparas de techo',_binary 'foto_subcategoria_6149f7ab71870.png',5),(8,_binary 'Lamparas de mesa',_binary 'foto_subcategoria_6149f7f3ee228.png',5),(9,_binary 'lamparas de Pie',_binary 'foto_subcategoria_614a057944228.png',5),(10,_binary 'Escritorio',_binary 'foto_subcategoria_614a0669cef6d.png',6),(11,_binary 'mesitas de noche',_binary 'foto_subcategoria_614a06956f0e2.png',6),(12,_binary 'Sillas',_binary 'foto_subcategoria_614a06c3d0dac.png',6),(13,_binary 'estanterias',_binary 'foto_subcategoria_614a06eeb4f77.png',6);
/*!40000 ALTER TABLE `subcategoria` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,_binary 'admin@admin.com',_binary '[\"ROLE_ADMIN\"]',_binary '$2y$13$KI/2bbjTMVrEmc.wtVe7dOelSDPyNaoiDl.zfwKZAqe82rz0yJDiW',0),(2,_binary 'cliente@cliente.com',_binary '[\"ROLE_CLIENTE\"]',_binary '$2y$13$KI/2bbjTMVrEmc.wtVe7dOelSDPyNaoiDl.zfwKZAqe82rz0yJDiW',0),(3,_binary 'marysanz97@gmail.com',_binary '[\"ROLE_CLIENTE\"]',_binary '$2y$13$bsU.CiipiUilHWEHDadkSeQJIWJwo7SV3OyFtaN0ZFvA6z14TeZg2',0),(4,_binary 'pfidalgo1@gmail.com',_binary '[\"ROLE_CLIENTE\"]',_binary '$2y$13$WjEHfWO7U9.92Nx9vQiAF.nlC2wPg.PJSdJP23KkLI./P4lT28o9O',0),(6,_binary 'cliente1@cliente1.com',_binary '[\"ROLE_CLIENTE\"]',_binary '$2y$13$lyNrWWpELtgV1IWe1Wf2W.diI2da1D9AhAbDS4XLzowUKxlCYWyaC',0);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-09-21 19:08:22
