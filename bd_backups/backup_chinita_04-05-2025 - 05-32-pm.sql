-- MySQL dump 10.13  Distrib 8.0.30, for Win64 (x86_64)
--
-- Host: localhost    Database: chinita
-- ------------------------------------------------------
-- Server version	8.0.30

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `bitacora`
--

DROP TABLE IF EXISTS `bitacora`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `bitacora` (
  `id` int NOT NULL AUTO_INCREMENT,
  `fecha_hora` datetime NOT NULL,
  `accion` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NOT NULL,
  `mensaje` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NOT NULL,
  `id_usuario` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_usuario` (`id_usuario`),
  CONSTRAINT `bitacora_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=358 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bitacora`
--

LOCK TABLES `bitacora` WRITE;
/*!40000 ALTER TABLE `bitacora` DISABLE KEYS */;
INSERT INTO `bitacora` VALUES (1,'2025-03-16 13:19:00','Intento de acceso sin permisos','El usuario intentó accedera a la pantalla roles sin permiso.',2),(2,'2025-03-16 13:19:51','Cierre de sesión','El usuario acaba de cerrar sesión.',2),(3,'2025-03-16 13:21:14','Inicio de sesión','El usuario inicio sesión.',2),(4,'2025-03-16 13:32:27','Intento de acceso sin permisos','El usuario intentó acceder a la pantalla roles sin permiso.',2),(5,'2025-03-16 13:32:27','Cierre de sesión','El usuario cerró sesión.',2),(6,'2025-03-16 13:35:57','Inicio de sesión','El usuario accedio al sistema.',2),(7,'2025-03-16 13:36:03','Intento de acceso a la pantalla roles sin permiso','La sesion del usuario fué cerrada por seguridad.',2),(8,'2025-03-16 13:36:04','Cierre de sesión','El usuario cerró sesión.',2),(9,'2025-03-16 13:36:09','Inicio de sesión','El usuario accedio al sistema.',2),(10,'2025-03-16 14:10:26','Intentó acceder a la pantalla roles sin permisos.','La sesion del usuario fué cerrada por seguridad.',2),(11,'2025-03-16 14:10:26','Cierre de sesión','El usuario cerró sesión.',2),(12,'2025-03-16 14:11:13','Inicio de sesión','El usuario accedio al sistema.',2),(13,'2025-03-16 15:40:15','Intentó acceder a la pantalla roles sin permisos.','La sesion del usuario fué cerrada por seguridad.',2),(14,'2025-03-16 15:40:15','Cierre de sesión','El usuario cerró sesión.',2),(15,'2025-03-16 15:49:38','Inicio de sesión','El usuario accedio al sistema.',2),(16,'2025-03-16 16:13:43','Cierre de sesión','El usuario cerró sesión.',2),(17,'2025-03-17 17:55:47','Inicio de sesión','El usuario accedio al sistema.',2),(18,'2025-03-17 21:20:18','Cierre de sesión','El usuario cerró sesión.',2),(19,'2025-03-18 07:50:13','Inicio de sesión','El usuario accedio al sistema.',2),(20,'2025-03-18 08:04:06','Cierre de sesión','El usuario cerró sesión.',2),(21,'2025-03-18 08:05:45','Inicio de sesión','El usuario accedio al sistema.',2),(22,'2025-03-18 08:21:20','Cierre de sesión','El usuario cerró sesión.',2),(23,'2025-03-18 16:13:47','Inicio de sesión','El usuario accedio al sistema.',2),(24,'2025-03-19 19:52:58','Cierre de sesión','El usuario cerró sesión.',2),(25,'2025-03-22 12:47:33','Inicio de sesión','El usuario accedio al sistema.',2),(26,'2025-03-22 13:51:59','Cierre de sesión','El usuario cerró sesión.',2),(27,'2025-03-23 17:35:56','Inicio de sesión','El usuario accedio al sistema.',2),(28,'2025-03-23 18:14:48','Modificación de un rol','El usuario modificó la información del rol ( ) la actualizó a: ( ).',2),(29,'2025-03-23 19:53:57','Modificación de un rol','El usuario modificó la información del rol () la actualizó a: ( ).',2),(30,'2025-03-25 16:39:08','Cierre de sesión','El usuario cerró sesión.',2),(31,'2025-03-25 18:22:15','Inicio de sesión','El usuario accedio al sistema.',2),(32,'2025-03-25 18:27:48','Modificación de un rol','Modificación de la información del rol (0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0) la actualizó a ( )',2),(33,'2025-03-25 18:48:37','Modificación de un rol','Modificación de la información del rol () la actualizó a ( )',2),(34,'2025-03-25 18:58:37','Cierre de sesión','El usuario cerró sesión.',2),(35,'2025-03-27 15:29:45','Inicio de sesión','El usuario accedio al sistema.',2),(36,'2025-03-27 16:17:50','Cierre de sesión','El usuario cerró sesión.',2),(37,'2025-03-29 16:47:24','Inicio de sesión','El usuario accedio al sistema.',8),(38,'2025-03-29 16:54:53','Cierre de sesión','El usuario cerró sesión.',8),(39,'2025-03-29 16:54:57','Inicio de sesión','El usuario accedio al sistema.',2),(40,'2025-03-30 15:19:41','Inicio de sesión','El usuario accedio al sistema.',2),(41,'2025-03-30 17:57:27','Modificación de un servicio','El usuario actualizó la información de un servicio de: (nombre del platillo: existe_platillo_nombre_platillo, precio en dolares: existe_platillo_precio_dolar, descripción: existe_platillo_descripcion, estado: existe_platillo_estatus) a: (nombre del platillo: nombre_platillo, precio en dolares: precio_dolar, descripción: descripcion, estado: estado_menu).',2),(42,'2025-03-30 18:01:08','Modificación de un servicio','El usuario actualizó la información de un servicio de: (nombre del platillo: GLUPS \n  precio en dolares: 10 \n , descripción:  COMBO DE REFRESCOS \n , estado: existe_platillo_estatus) a: (nombre del platillo: nombre_platillo, precio en dolares: precio_dolar, descripción: descripcion, estado: estado_menu).',2),(43,'2025-03-30 18:08:10','Modificación de un servicio','El usuario actualizó la información de un servicio\n \n  \n        Información del servicio:\n \n \n        Nombre del platillo: GLUPS \n \n        Precio en dolares: 10$ \n \n        Descripción: COMBO DE REFRESCOS. \n \n        Estado: activo \n\n\n\n\n        Información del servicio actualizada \n \n \n        Nombre del platillo: GLUPS \n \n        Precio en dolares: 15$ \n \n        Descripción: COMBO DE REFRESCOS \n \n        Estado: activo',2),(44,'2025-03-30 18:10:29','Modificación de un servicio','El usuario actualizó la información de un servicio: \n\nInformación del servicio:\n\nNombre del platillo: GLUPS \nPrecio en dolares: 15$ \nDescripción: COMBO DE REFRESCOS. \nEstado: activo \n\n\nInformación del servicio actualizada \n\nNombre del platillo: GLUPS \nPrecio en dolares: 16$ \nDescripción: COMBO DE REFRESCOS \nEstado: activo',2),(45,'2025-03-30 18:17:49','Registro de un servicio','El usuario registro un servicio con la siguiente información: \n\nNombre del platillo: SERVICIO PRUEBA \nPrecio en dolares: 10$ \nDescripción: POLLO Y REFRESCO \nEstado: activo',2),(46,'2025-03-30 18:27:56','Cambio de estado a un servicio','El usuario cambió el estado del servicio con la siguiente información: \n\nNombre del platillo: GLUPS \nEstado: activo',2),(47,'2025-03-30 18:31:23','Cambio de estado de un servicio','El usuario cambió el estado del servicio con la siguiente información: \n\nNombre del platillo: GLUPS \nPrecio en dolares: $ \nDescripción: . \nEstado: Activo \n\n\nInformación del servicio actualizada: \n\nNombre del platillo: GLUPS \nPrecio en dolares: $ \nDescripción: . \nEstado: Inactivo',2),(48,'2025-03-30 18:32:46','Cambio de estado de un servicio','El usuario cambió el estado del servicio con la siguiente información: \n\nNombre del platillo: GLUPS \nPrecio en dolares: 16$ \nDescripción: COMBO DE REFRESCOS. \nEstado: Inactivo \n\n\nInformación del servicio actualizada: \n\nNombre del platillo: GLUPS \nPrecio en dolares: 16$ \nDescripción: COMBO DE REFRESCOS. \nEstado: Activo',2),(49,'2025-03-30 18:35:59','Modificación de un servicio','El usuario actualizó la información de un servicio: \n\nInformación del servicio:\n\nNombre del platillo: POLLO ESPECIAL \nPrecio en dolares: 10$ \nDescripción: POLLO + 3 GLUP. \nEstado: activo \n\n\nInformación del servicio actualizada: \n\nNombre del platillo: POLLO ESPECIAL \nPrecio en dolares: 15$ \nDescripción: POLLO + 3 GLUP \nEstado: activo',2),(50,'2025-03-30 21:05:40','Intentó acceder sin permisos a la pantalla registro de roles.','El usuario fue redirigido al inicio por seguridad.',2),(51,'2025-03-30 21:10:35','Intentó acceder sin permisos a la pantalla registro de roles.','El usuario intentó acceder de manera incorracta a la pantalla sin tener los permisos correspondientes, luego fue redirigido al inicio por seguridad.',2),(52,'2025-03-30 21:12:06','Intentó acceder sin permisos a la pantalla registro de roles.','El usuario intentó acceder de manera incorracta a la pantalla y sin tener los permisos correspondientes, luego fue redirigido al inicio por seguridad.',2),(53,'2025-03-30 21:16:32','Intentó acceder sin permisos a la pantalla lista de roles.','El usuario intentó acceder de manera incorracta a la pantalla y sin tener los permisos correspondientes, luego fue redirigido al inicio por seguridad.',2),(54,'2025-03-30 21:27:01','Cambio de estado de un rol','El usuario cambió el estado del rol con la siguiente información: \n\nNombre del rol: PASANTE \nEstado: Inactivo \n\n\nInformación del servicio actualizada: \n\nNombre del rol: PASANTE \nEstado: Activo',2),(55,'2025-03-30 21:49:50','Cambio de estado de un rol','El usuario cambió el estado del rol con la siguiente información: \n\nNombre del rol: PASANTE \nEstado: Activo \n\n\nInformación del servicio actualizada: \n\nNombre del rol: PASANTE \nEstado: Inactivo',2),(56,'2025-03-30 21:49:56','Cambio de estado de un rol','El usuario cambió el estado del rol con la siguiente información: \n\nNombre del rol: FULL ACCESS \nEstado: Activo \n\n\nInformación del servicio actualizada: \n\nNombre del rol: FULL ACCESS \nEstado: Inactivo',2),(57,'2025-03-30 21:50:06','Cambio de estado de un rol','El usuario cambió el estado del rol con la siguiente información: \n\nNombre del rol: PASANTE \nEstado: Inactivo \n\n\nInformación del servicio actualizada: \n\nNombre del rol: PASANTE \nEstado: Activo',2),(58,'2025-03-30 22:32:22','Cierre de sesión','El usuario cerró sesión.',2),(59,'2025-03-31 17:30:00','Inicio de sesión','El usuario accedio al sistema.',2),(60,'2025-03-31 18:56:17','Inicio de sesión','El usuario accedio al sistema.',2),(61,'2025-03-31 19:01:03','Cambio de estado de un rol','El usuario cambió el estado del rol con la siguiente información: \n\nNombre del rol: EMPLEADO \nEstado: Inactivo \n\n\nInformación del servicio actualizada: \n\nNombre del rol: EMPLEADO \nEstado: Activo',2),(62,'2025-03-31 19:04:11','Inicio de sesión','El usuario accedio al sistema.',2),(63,'2025-03-31 19:04:31','Modificación de un servicio','El usuario actualizó la información de un servicio: \n\nInformación del servicio:\n\nNombre del platillo: GLUPS \nPrecio en dolares: 16$ \nDescripción: COMBO DE REFRESCOS. \nEstado: activo \n\n\nInformación del servicio actualizada: \n\nNombre del platillo: GLUPS \nPrecio en dolares: 12$ \nDescripción: COMBO DE REFRESCOS \nEstado: activo',2),(64,'2025-03-31 19:18:26','Cierre de sesión','El usuario cerró sesión.',2),(65,'2025-03-31 19:18:33','Inicio de sesión','El usuario accedio al sistema.',2),(66,'2025-03-31 19:18:36','Inicio de sesión','El usuario accedio al sistema.',2),(67,'2025-03-31 19:18:37','Inicio de sesión','El usuario accedio al sistema.',2),(68,'2025-03-31 19:18:37','Inicio de sesión','El usuario accedio al sistema.',2),(69,'2025-03-31 19:18:37','Inicio de sesión','El usuario accedio al sistema.',2),(70,'2025-03-31 19:18:42','Inicio de sesión','El usuario accedio al sistema.',2),(71,'2025-03-31 19:18:42','Inicio de sesión','El usuario accedio al sistema.',2),(72,'2025-03-31 19:18:42','Inicio de sesión','El usuario accedio al sistema.',2),(73,'2025-03-31 19:18:43','Inicio de sesión','El usuario accedio al sistema.',2),(74,'2025-03-31 19:24:16','Inicio de sesión','El usuario accedió al sistema.',2),(75,'2025-03-31 19:25:03','Inicio de sesión','El usuario accedió al sistema.',2),(76,'2025-03-31 19:31:56','Inicio de sesión','El usuario accedió al sistema.',2),(77,'2025-03-31 19:33:38','Inicio de sesión','El usuario accedió al sistema.',2),(78,'2025-03-31 20:00:56','Modificación de un rol','El usuario hizo el registro de un rol DenegadoDenegadoDenegadoDenegadoDenegadoDenegadoDenegadoDenegadoDenegadoDenegadoDenegado',2),(79,'2025-03-31 20:08:43','Modificación de un rol','El usuario hizo el registro de un rol DenegadoDenegadoDenegadoDenegadoDenegadoDenegadoDenegadoDenegadoDenegadoDenegadoDenegado',2),(80,'2025-03-31 21:32:38','Cambio de estado de un rol','El usuario cambió el estado del rol con la siguiente información: \n\nNombre del rol: FULL ACCESS \nEstado: Inactivo \n\n\nInformación del servicio actualizada: \n\nNombre del rol: FULL ACCESS \nEstado: Activo',2),(81,'2025-03-31 22:09:12','Modificación de un rol','El usuario modificó el rol con la siguiente información:\n\n\r\n        Nombre del rol: Denegado \n\r\n        -- Modulo Inventario --\n\r\n        Vistas de Proveedores:\r\n        Registro de Proveedores: Permitido \n\r\n        Modificación de Proveedores: Permitido \n\r\n        Lista de Proveedores registrados: Permitido\n\r\n        Historial de compras a Proveedores: Permitido\n\n\r\n        Vistas de Productos:\r\n        Registro de Categorías: Permitido \n\r\n        Registro de Presentación: Permitido \n\r\n        Registro de Productos: Permitido \n\r\n        Lista de Productos: Permitido \n\r\n        Registro de Entrada de Productos: Denegado\n\r\n        Lista de Entradas registradas: Denegado\n\n\r\n        Información del servicio actualizada:\r\n        \n\n\r\n        Nombre del rol: Denegado \n\r\n        Estado: Activo.',2),(82,'2025-03-31 22:11:50','Modificación de un rol','El usuario modificó el rol con la siguiente información:\n\n\r\n        Nombre del rol: Denegado \n\r\n        -- Modulo Inventario --\n\r\n        Vistas de Proveedores:\r\n        Registro de Proveedores: Permitido \n\r\n        Modificación de Proveedores: Permitido \n\r\n        Lista de Proveedores registrados: Permitido\n\r\n        Historial de compras a Proveedores: Permitido\n\n\r\n        Vistas de Productos:\r\n        Registro de Categorías: Denegado \n\r\n        Registro de Presentación: Denegado \n\r\n        Registro de Productos: Denegado \n\r\n        Lista de Productos: Denegado \n\r\n        Registro de Entrada de Productos: Denegado\n\r\n        Lista de Entradas registradas: Denegado\n\n\r\n        Información del servicio actualizada:\r\n        \n\n\r\n        Nombre del rol: Denegado \n\r\n        Estado: Activo.',2),(83,'2025-03-31 22:13:43','Modificación de un rol','El usuario modificó el rol con la siguiente información:\n\r\n        Nombre del rol: Denegado\n\r\n        -- Modulo Inventario --\n\r\n        Vistas de Proveedores:\r\n        Registro de Proveedores: Permitido\n\r\n        Modificación de Proveedores: Permitido\n\r\n        Lista de Proveedores registrados: Permitido\n\r\n        Historial de compras a Proveedores: Permitido\n\n\r\n        Vistas de Productos:\r\n        Registro de Categorías: Permitido\n\r\n        Registro de Presentación: Permitido\n\r\n        Registro de Productos: Permitido\n\r\n        Lista de Productos: Permitido\n\r\n        Registro de Entrada de Productos: Permitido\n\r\n        Lista de Entradas registradas: Permitido\n\n\r\n        Información del servicio actualizada:\r\n        \n\n\r\n        Nombre del rol: Denegado\n\r\n        Estado: Activo.',2),(84,'2025-03-31 22:16:00','Modificación de un rol','El usuario modificó el rol con la siguiente información:\n\r\n        Nombre del rol: Denegado\n\r\n        -- Modulo Inventario --\n\r\n        Vistas de Proveedores:\r\n        Registro de Proveedores: Permitido\n\r\n        Modificación de Proveedores: Permitido\n\r\n        Lista de Proveedores registrados: Permitido\n\r\n        Historial de compras a Proveedores: Permitido\n\n\r\n        Vistas de Productos:\r\n        Registro de Categorías: Denegado\n\r\n        Registro de Presentación: Denegado\n\r\n        Registro de Productos: Denegado\n\r\n        Lista de Productos: Denegado\n\r\n        Registro de Entrada de Productos: Permitido\n\r\n        Lista de Entradas registradas: Permitido\n\n\r\n        Información del servicio actualizada:\r\n        \n\n\r\n        Nombre del rol: Denegado\n\r\n        Estado: Activo.',2),(85,'2025-03-31 22:18:29','Modificación de un rol','El usuario modificó el rol con la siguiente información:\n\r\n        Nombre del rol: FULL COUNTE\n\r\n        -- Modulo Inventario --\n\r\n        Vistas de Proveedores:\r\n        Registro de Proveedores: Permitido\n\r\n        Modificación de Proveedores: Permitido\n\r\n        Lista de Proveedores registrados: Permitido\n\r\n        Historial de compras a Proveedores: Permitido\n\n\r\n        Vistas de Productos:\r\n        Registro de Categorías: Permitido\n\r\n        Registro de Presentación: Permitido\n\r\n        Registro de Productos: Permitido\n\r\n        Lista de Productos: Permitido\n\r\n        Registro de Entrada de Productos: Denegado\n\r\n        Lista de Entradas registradas: Denegado\n\n\r\n        Información del servicio actualizada:\r\n        \n\n\r\n        Nombre del rol: FULL COUNTE\n\r\n        Estado: Activo.',2),(86,'2025-03-31 23:33:55','Modificación de un servicio','El usuario actualizó la información de un servicio: \n\nInformación del servicio:\n\nNombre del platillo: POLLO COREANO \nPrecio en dolares: 4$ \nDescripción: POLLO FRITO COREANO. \nEstado: activo \n\n\nInformación del servicio actualizada: \n\nNombre del platillo: POLLO COREANO \nPrecio en dolares: 14$ \nDescripción: POLLO FRITO COREANO \nEstado: activo',2),(87,'2025-03-31 23:37:29','Intentó acceder sin permisos a la pantalla registro de servicios.','El usuario intentó acceder de manera incorracta a la pantalla y sin tener los permisos correspondientes, este fué redirigido a la pantalla de inicio por seguridad.',2),(88,'2025-04-01 00:07:12','Intentó acceder sin permisos a la pantalla lista de proveedores.','El usuario intentó acceder de manera incorracta a la pantalla y sin tener los permisos correspondientes, este fué redirigido a la pantalla de inicio por seguridad.',2),(89,'2025-04-01 00:21:03','Intentó acceder sin permisos a la pantalla lista de productos.','El usuario intentó acceder de manera incorracta a la pantalla y sin tener los permisos correspondientes, este fué redirigido a la pantalla de inicio por seguridad.',2),(90,'2025-04-01 00:26:09','Intentó acceder sin permisos a la pantalla lista de entradas.','El usuario intentó acceder de manera incorracta a la pantalla y sin tener los permisos correspondientes, este fué redirigido a la pantalla de inicio por seguridad.',2),(91,'2025-04-01 00:27:54','Cierre de sesión','El usuario cerró sesión.',2),(92,'2025-04-01 07:43:51','Inicio de sesión','El usuario accedió al sistema.',2),(93,'2025-04-01 07:44:34','Cambio de estado de un rol','El usuario cambió el estado del rol con la siguiente información: \n\nNombre del rol: PASANTE \nEstado: Activo \n\n\nInformación del servicio actualizada: \n\nNombre del rol: PASANTE \nEstado: Inactivo',2),(94,'2025-04-01 07:44:42','Cambio de estado de un rol','El usuario cambió el estado del rol con la siguiente información: \n\nNombre del rol: EMPLEADO \nEstado: Activo \n\n\nInformación del servicio actualizada: \n\nNombre del rol: EMPLEADO \nEstado: Inactivo',2),(95,'2025-04-01 07:47:39','Cierre de sesión','El usuario cerró sesión.',2),(96,'2025-04-01 07:48:24','Inicio de sesión','El usuario accedió al sistema.',8),(97,'2025-04-01 07:49:55','Cierre de sesión','El usuario cerró sesión.',8),(98,'2025-04-01 07:50:02','Inicio de sesión','El usuario accedió al sistema.',2),(99,'2025-04-01 07:50:44','Modificación de un rol','El usuario modificó el rol con la siguiente información:\n\r\n        Nombre del rol: PASANTE\n\r\n        -- Modulo Inventario --\n\r\n        Vistas de Proveedores:\r\n        Registro de Proveedores: Denegado\n\r\n        Modificación de Proveedores: Denegado\n\r\n        Lista de Proveedores registrados: Denegado\n\r\n        Historial de compras a Proveedores: Denegado\n\n\r\n        Vistas de Productos:\r\n        Registro de Categorías: Denegado\n\r\n        Registro de Presentación: Permitido\n\r\n        Registro de Productos: Denegado\n\r\n        Lista de Productos: Denegado\n\r\n        Registro de Entrada de Productos: Denegado\n\r\n        Lista de Entradas registradas: Denegado\n\n\r\n        Información del servicio actualizada:\r\n        \n\n\r\n        Nombre del rol: PASANTE\n\r\n        Estado: Activo.',2),(100,'2025-04-01 07:51:05','Cierre de sesión','El usuario cerró sesión.',2),(101,'2025-04-01 07:51:12','Inicio de sesión','El usuario accedió al sistema.',8),(102,'2025-04-01 07:52:01','Cierre de sesión','El usuario cerró sesión.',8),(103,'2025-04-01 07:52:09','Inicio de sesión','El usuario accedió al sistema.',2),(104,'2025-04-01 08:07:38','Inicio de sesión','El usuario accedió al sistema.',8),(105,'2025-04-01 08:07:51','Inicio de sesión','El usuario accedió al sistema.',8),(106,'2025-04-01 08:09:45','Cierre de sesión','El usuario cerró sesión.',8),(107,'2025-04-01 08:10:05','Inicio de sesión','El usuario accedió al sistema.',8),(108,'2025-04-01 08:10:16','Inicio de sesión','El usuario accedió al sistema.',8),(109,'2025-04-01 08:16:41','Cierre de sesión','El usuario cerró sesión.',8),(110,'2025-04-03 19:00:27','El usuario inició sesión','El usuario accedió al sistema.',2),(111,'2025-04-03 19:00:28','El usuario inició sesión','El usuario accedió al sistema.',2),(112,'2025-04-03 19:00:28','El usuario inició sesión','El usuario accedió al sistema.',2),(113,'2025-04-03 19:00:29','El usuario inició sesión','El usuario accedió al sistema.',2),(114,'2025-04-03 19:00:29','El usuario inició sesión','El usuario accedió al sistema.',2),(115,'2025-04-03 19:00:55','El usuario inició sesión','El usuario accedió al sistema.',2),(116,'2025-04-03 19:00:55','El usuario inició sesión','El usuario accedió al sistema.',2),(117,'2025-04-03 19:01:07','El usuario inició sesión','El usuario accedió al sistema.',2),(118,'2025-04-03 19:01:13','El usuario inició sesión','El usuario accedió al sistema.',2),(119,'2025-04-03 19:01:14','El usuario inició sesión','El usuario accedió al sistema.',2),(120,'2025-04-03 19:01:14','El usuario inició sesión','El usuario accedió al sistema.',2),(121,'2025-04-03 19:01:14','El usuario inició sesión','El usuario accedió al sistema.',2),(122,'2025-04-03 19:01:14','El usuario inició sesión','El usuario accedió al sistema.',2),(123,'2025-04-03 19:01:15','El usuario inició sesión','El usuario accedió al sistema.',2),(124,'2025-04-03 19:01:15','El usuario inició sesión','El usuario accedió al sistema.',2),(125,'2025-04-03 19:01:15','El usuario inició sesión','El usuario accedió al sistema.',2),(126,'2025-04-03 19:03:41','El usuario inició sesión','El usuario accedió al sistema.',2),(127,'2025-04-03 19:03:43','El usuario inició sesión','El usuario accedió al sistema.',2),(128,'2025-04-03 19:03:43','El usuario inició sesión','El usuario accedió al sistema.',2),(129,'2025-04-03 19:03:43','El usuario inició sesión','El usuario accedió al sistema.',2),(130,'2025-04-03 19:03:43','El usuario inició sesión','El usuario accedió al sistema.',2),(131,'2025-04-03 19:03:44','El usuario inició sesión','El usuario accedió al sistema.',2),(132,'2025-04-03 19:11:48','El usuario inició sesión','El usuario accedió al sistema.',2),(133,'2025-04-03 19:11:52','El usuario inició sesión','El usuario accedió al sistema.',2),(134,'2025-04-03 19:11:52','El usuario inició sesión','El usuario accedió al sistema.',2),(135,'2025-04-03 19:11:52','El usuario inició sesión','El usuario accedió al sistema.',2),(136,'2025-04-03 19:11:53','El usuario inició sesión','El usuario accedió al sistema.',2),(137,'2025-04-03 19:12:26','El usuario inició sesión','El usuario accedió al sistema.',2),(138,'2025-04-03 19:12:27','El usuario inició sesión','El usuario accedió al sistema.',2),(139,'2025-04-03 19:12:27','El usuario inició sesión','El usuario accedió al sistema.',2),(140,'2025-04-03 19:12:27','El usuario inició sesión','El usuario accedió al sistema.',2),(141,'2025-04-03 19:12:28','El usuario inició sesión','El usuario accedió al sistema.',2),(142,'2025-04-03 19:14:30','El usuario inició sesión','El usuario accedió al sistema.',2),(143,'2025-04-03 19:16:05','El usuario inició sesión','El usuario accedió al sistema.',2),(144,'2025-04-03 19:16:52','El usuario inició sesión','El usuario accedió al sistema.',8),(145,'2025-04-03 19:34:40','Cierre de sesión','El usuario cerró sesión.',8),(146,'2025-04-06 15:06:06','El usuario inició sesión','El usuario accedió al sistema.',2),(147,'2025-04-06 15:06:22','El usuario inició sesión','El usuario accedió al sistema.',2),(148,'2025-04-06 15:07:10','El usuario inició sesión','El usuario accedió al sistema.',2),(149,'2025-04-06 15:07:56','El usuario inició sesión','El usuario accedió al sistema.',2),(150,'2025-04-06 15:09:06','El usuario inició sesión','El usuario accedió al sistema.',2),(151,'2025-04-06 15:11:31','El usuario inició sesión','El usuario accedió al sistema.',2),(152,'2025-04-06 15:12:00','El usuario inició sesión','El usuario accedió al sistema.',2),(153,'2025-04-06 15:13:59','El usuario inició sesión','El usuario accedió al sistema.',2),(154,'2025-04-06 15:14:26','El usuario inició sesión','El usuario accedió al sistema.',2),(155,'2025-04-06 15:15:18','El usuario inició sesión','El usuario accedió al sistema.',2),(156,'2025-04-06 15:15:25','El usuario inició sesión','El usuario accedió al sistema.',2),(157,'2025-04-06 15:18:23','El usuario inició sesión','El usuario accedió al sistema.',2),(158,'2025-04-06 18:48:19','El usuario inició sesión','El usuario accedió al sistema.',2),(159,'2025-04-06 18:49:16','El usuario inició sesión','El usuario accedió al sistema.',2),(160,'2025-04-06 18:49:33','El usuario inició sesión','El usuario accedió al sistema.',2),(161,'2025-04-06 19:00:17','El usuario inició sesión','El usuario accedió al sistema.',2),(162,'2025-04-06 19:03:08','El usuario inició sesión','El usuario accedió al sistema.',2),(163,'2025-04-06 19:03:44','El usuario inició sesión','El usuario accedió al sistema.',2),(164,'2025-04-06 19:04:40','El usuario inició sesión','El usuario accedió al sistema.',8),(165,'2025-04-06 19:04:51','El usuario inició sesión','El usuario accedió al sistema.',8),(166,'2025-04-06 19:05:52','El usuario inició sesión','El usuario accedió al sistema.',8),(167,'2025-04-06 19:06:57','El usuario inició sesión','El usuario accedió al sistema.',2),(168,'2025-04-06 19:09:24','Cierre de sesión','El usuario cerró sesión.',2),(169,'2025-04-06 19:09:47','El usuario inició sesión','El usuario accedió al sistema.',8),(170,'2025-04-06 19:15:01','El usuario inició sesión','El usuario accedió al sistema.',2),(171,'2025-04-06 19:15:24','El usuario inició sesión','El usuario accedió al sistema.',8),(172,'2025-04-06 19:16:21','El usuario inició sesión','El usuario accedió al sistema.',2),(173,'2025-04-06 19:22:34','Cierre de sesión','El usuario cerró sesión.',2),(174,'2025-04-06 19:25:19','El usuario inició sesión','El usuario accedió al sistema.',2),(175,'2025-04-06 19:25:27','El usuario inició sesión','El usuario accedió al sistema.',2),(176,'2025-04-06 19:25:38','El usuario inició sesión','El usuario accedió al sistema.',2),(177,'2025-04-06 19:26:27','El usuario inició sesión','El usuario accedió al sistema.',2),(178,'2025-04-06 19:27:43','El usuario inició sesión','El usuario accedió al sistema.',2),(179,'2025-04-06 19:28:54','El usuario inició sesión','El usuario accedió al sistema.',2),(180,'2025-04-06 19:29:31','Cierre de sesión','El usuario cerró sesión.',2),(181,'2025-04-06 19:29:37','El usuario inició sesión','El usuario accedió al sistema.',2),(182,'2025-04-06 19:30:13','El usuario inició sesión','El usuario accedió al sistema.',2),(183,'2025-04-06 19:30:20','Cierre de sesión','El usuario cerró sesión.',2),(184,'2025-04-06 19:30:27','El usuario inició sesión','El usuario accedió al sistema.',2),(185,'2025-04-06 19:34:58','Cambio de estado de un rol','El usuario cambió el estado del rol con la siguiente información: \n\nNombre del rol: FULL ACCESS \nEstado: Activo \n\n\nInformación del servicio actualizada: \n\nNombre del rol: FULL ACCESS \nEstado: Inactivo',2),(186,'2025-04-06 19:39:34','Cierre de sesión','El usuario cerró sesión.',2),(187,'2025-04-10 19:24:29','El usuario inició sesión','El usuario accedió al sistema.',2),(188,'2025-04-10 21:03:42','Intento de acceso al sistema sin autenticación previa.','Se ha registrado un intento de acceso al sistema sin autenticación previa. Un usuario ha intentado acceder de manera no autorizada.',2),(189,'2025-04-11 10:05:03','El usuario inició sesión','El usuario accedió al sistema.',2),(190,'2025-04-11 10:32:02','Registro de un rol','El usuario Registró el rol con la siguiente información:\n\n\r\n        Nombre del rol:  \n\r\n        -- Modulo Inventario --\n\r\n        Vistas de Proveedores:\r\n        Registro de Proveedores:  \n\r\n        Modificación de Proveedores:  \n\r\n        Lista de Proveedores registrados: \n\r\n        Historial de compras a Proveedores: \n\n\r\n        Vistas de Productos:\r\n        Registro de Categorías:  \n\r\n        Registro de Presentación:  \n\r\n        Registro de Productos:  \n\r\n        Lista de Productos:  \n\r\n        Registro de Entrada de Productos: \n\r\n        Lista de Entradas registradas: \n\n\r\n        Información del servicio actualizada:\r\n        \n\n\r\n        Nombre del rol:  \n\r\n        Estado: Activo.',2),(191,'2025-04-11 11:14:07','Modificación de un rol','El usuario modificó el rol con la siguiente información:\n\r\n        Nombre del rol: ROL\n\r\n        -- Modulo Inventario --\n\r\n        Vistas de Proveedores:\r\n        Registro de Proveedores: Denegado\n\r\n        Modificación de Proveedores: Denegado\n\r\n        Lista de Proveedores registrados: Denegado\n\r\n        Historial de compras a Proveedores: Denegado\n\n\r\n        Vistas de Productos:\r\n        Registro de Categorías: Denegado\n\r\n        Registro de Presentación: Denegado\n\r\n        Registro de Productos: Denegado\n\r\n        Lista de Productos: Denegado\n\r\n        Registro de Entrada de Productos: Denegado\n\r\n        Lista de Entradas registradas: Denegado\n\n\r\n        Información del servicio actualizada:\r\n        \n\n\r\n        Nombre del rol: ROL\n\r\n        Estado: Activo.',2),(192,'2025-04-11 16:12:05','Cierre de sesión','El usuario cerró sesión.',2),(193,'2025-04-11 16:13:07','El usuario inició sesión','El usuario accedió al sistema.',8),(194,'2025-04-11 16:13:43','El usuario inició sesión','El usuario accedió al sistema.',8),(195,'2025-04-11 16:14:53','El usuario inició sesión','El usuario accedió al sistema.',2),(196,'2025-04-11 16:15:42','Cierre de sesión','El usuario cerró sesión.',2),(197,'2025-04-11 16:15:54','El usuario inició sesión','El usuario accedió al sistema.',2),(198,'2025-04-11 16:16:44','Modificación de un rol','El usuario modificó el rol con la siguiente información:\n\r\n        Nombre del rol: ROL\n\r\n        -- Modulo Inventario --\n\r\n        Vistas de Proveedores:\r\n        Registro de Proveedores: Denegado\n\r\n        Modificación de Proveedores: Denegado\n\r\n        Lista de Proveedores registrados: Denegado\n\r\n        Historial de compras a Proveedores: Permitido\n\n\r\n        Vistas de Productos:\r\n        Registro de Categorías: Denegado\n\r\n        Registro de Presentación: Permitido\n\r\n        Registro de Productos: Denegado\n\r\n        Lista de Productos: Denegado\n\r\n        Registro de Entrada de Productos: Denegado\n\r\n        Lista de Entradas registradas: Denegado\n\n\r\n        Información del servicio actualizada:\r\n        \n\n\r\n        Nombre del rol: ROL\n\r\n        Estado: Activo.',2),(199,'2025-04-11 16:17:02','Cambio de estado de un rol','El usuario cambió el estado del rol con la siguiente información: \n\nNombre del rol: FULL ACCESS \nEstado: Inactivo \n\n\nInformación del servicio actualizada: \n\nNombre del rol: FULL ACCESS \nEstado: Activo',2),(200,'2025-04-11 16:17:12','Cierre de sesión','El usuario cerró sesión.',8),(201,'2025-04-11 16:17:34','Cierre de sesión','El usuario cerró sesión.',2),(202,'2025-04-12 11:04:00','El usuario inició sesión','El usuario accedió al sistema.',2),(203,'2025-04-12 12:45:47','Cierre de sesión','El usuario cerró sesión.',2),(204,'2025-04-12 13:02:13','El usuario inició sesión','El usuario accedió al sistema.',2),(205,'2025-04-12 13:03:12','Cierre de sesión','El usuario cerró sesión.',2),(206,'2025-04-12 13:03:19','El usuario inició sesión','El usuario accedió al sistema.',2),(207,'2025-04-12 13:03:49','Cierre de sesión','El usuario cerró sesión.',2),(208,'2025-04-12 13:03:55','El usuario inició sesión','El usuario accedió al sistema.',2),(209,'2025-04-12 13:05:08','Cierre de sesión','El usuario cerró sesión.',2),(210,'2025-04-12 13:05:13','El usuario inició sesión','El usuario accedió al sistema.',2),(211,'2025-04-12 13:07:53','El usuario inició sesión','El usuario accedió al sistema.',2),(212,'2025-04-12 13:09:11','El usuario inició sesión','El usuario accedió al sistema.',2),(213,'2025-04-12 13:14:58','Modificación de un rol','El usuario modificó el rol con la siguiente información:\n\r\n        Nombre del rol: ROL\n\r\n        -- Modulo Inventario --\n\r\n        Vistas de Proveedores:\r\n        Registro de Proveedores: Permitido\n\r\n        Modificación de Proveedores: Permitido\n\r\n        Lista de Proveedores registrados: Permitido\n\r\n        Historial de compras a Proveedores: Permitido\n\n\r\n        Vistas de Productos:\r\n        Registro de Categorías: Denegado\n\r\n        Registro de Presentación: Denegado\n\r\n        Registro de Productos: Denegado\n\r\n        Lista de Productos: Denegado\n\r\n        Registro de Entrada de Productos: Denegado\n\r\n        Lista de Entradas registradas: Denegado\n\n\r\n        Información del servicio actualizada:\r\n        \n\n\r\n        Nombre del rol: ROL\n\r\n        Estado: Activo.',2),(214,'2025-04-12 13:26:11','Modificación de un rol','El usuario modificó el rol con la siguiente información:\n\r\n        Nombre del rol: FULL COUNTE\n\r\n        -- Modulo Inventario --\n\r\n        Vistas de Proveedores:\r\n        Registro de Proveedores: Permitido\n\r\n        Modificación de Proveedores: Permitido\n\r\n        Lista de Proveedores registrados: Permitido\n\r\n        Historial de compras a Proveedores: Permitido\n\n\r\n        Vistas de Productos:\r\n        Registro de Categorías: Denegado\n\r\n        Registro de Presentación: Denegado\n\r\n        Registro de Productos: Denegado\n\r\n        Lista de Productos: Denegado\n\r\n        Registro de Entrada de Productos: Denegado\n\r\n        Lista de Entradas registradas: Denegado\n\n\r\n        Información del servicio actualizada:\r\n        \n\n\r\n        Nombre del rol: FULL COUNTE\n\r\n        Estado: Activo.',2),(215,'2025-04-12 14:15:27','Modificación de un rol','El usuario modificó el rol con la siguiente información:\n\r\n        Nombre del rol: PASANTE\n\r\n        -- Modulo Inventario --\n\r\n        Vistas de Proveedores:\r\n        Registro de Proveedores: Permitido\n\r\n        Modificación de Proveedores: Permitido\n\r\n        Lista de Proveedores registrados: Permitido\n\r\n        Historial de compras a Proveedores: Permitido\n\n\r\n        Vistas de Productos:\r\n        Registro de Categorías: Denegado\n\r\n        Registro de Presentación: Denegado\n\r\n        Registro de Productos: Denegado\n\r\n        Lista de Productos: Denegado\n\r\n        Registro de Entrada de Productos: Denegado\n\r\n        Lista de Entradas registradas: Denegado\n\n\r\n        Información del servicio actualizada:\r\n        \n\n\r\n        Nombre del rol: PASANTE\n\r\n        Estado: Activo.',2),(216,'2025-04-12 14:35:39','Modificación de un rol','El usuario modificó el rol con la siguiente información:\n\r\n        Nombre del rol: ROL\n\r\n        -- Modulo Inventario --\n\r\n        Vistas de Proveedores:\r\n        Registro de Proveedores: Permitido\n\r\n        Modificación de Proveedores: Permitido\n\r\n        Lista de Proveedores registrados: Permitido\n\r\n        Historial de compras a Proveedores: Permitido\n\n\r\n        Vistas de Productos:\r\n        Registro de Categorías: Permitido\n\r\n        Registro de Presentación: Permitido\n\r\n        Registro de Productos: Permitido\n\r\n        Lista de Productos: Permitido\n\r\n        Registro de Entrada de Productos: Permitido\n\r\n        Lista de Entradas registradas: Permitido\n\n\r\n        Información del servicio actualizada:\r\n        \n\n\r\n        Nombre del rol: ROL\n\r\n        Estado: Activo.',2),(217,'2025-04-12 14:35:59','Modificación de un rol','El usuario modificó el rol con la siguiente información:\n\r\n        Nombre del rol: ADIMINISTRADOR\n\r\n        -- Modulo Inventario --\n\r\n        Vistas de Proveedores:\r\n        Registro de Proveedores: Permitido\n\r\n        Modificación de Proveedores: Permitido\n\r\n        Lista de Proveedores registrados: Permitido\n\r\n        Historial de compras a Proveedores: Permitido\n\n\r\n        Vistas de Productos:\r\n        Registro de Categorías: Permitido\n\r\n        Registro de Presentación: Permitido\n\r\n        Registro de Productos: Permitido\n\r\n        Lista de Productos: Permitido\n\r\n        Registro de Entrada de Productos: Permitido\n\r\n        Lista de Entradas registradas: Permitido\n\n\r\n        Información del servicio actualizada:\r\n        \n\n\r\n        Nombre del rol: ADIMINISTRADOR\n\r\n        Estado: Activo.',2),(218,'2025-04-12 15:03:08','Modificación de un rol','El usuario modificó el rol con la siguiente información:\n\r\n        Nombre del rol: ADIMINISTRADOR\n\r\n        -- Modulo Inventario --\n\r\n        Vistas de Proveedores:\r\n        Registro de Proveedores: Permitido\n\r\n        Modificación de Proveedores: Permitido\n\r\n        Lista de Proveedores registrados: Permitido\n\r\n        Historial de compras a Proveedores: Permitido\n\n\r\n        Vistas de Productos:\r\n        Registro de Categorías: Permitido\n\r\n        Registro de Presentación: Permitido\n\r\n        Registro de Productos: Permitido\n\r\n        Lista de Productos: Permitido\n\r\n        Registro de Entrada de Productos: Permitido\n\r\n        Lista de Entradas registradas: Permitido\n\n\r\n        Información del servicio actualizada:\r\n        \n\n\r\n        Nombre del rol: ADIMINISTRADOR\n\r\n        Estado: Activo.',2),(219,'2025-04-15 12:59:17','El usuario inició sesión','El usuario accedió al sistema.',2),(220,'2025-04-15 13:01:46','Cierre de sesión','El usuario cerró sesión.',2),(221,'2025-04-22 18:54:57','El usuario inició sesión','El usuario accedió al sistema.',2),(222,'2025-04-22 20:26:09','Modificación de un rol','El usuario modificó el rol con la siguiente información:\n\r\n        Nombre del rol: ADIMINISTRADOR\n\r\n        -- Modulo Inventario --\n\r\n        Vistas de Proveedores:\r\n        Registro de Proveedores: Permitido\n\r\n        Modificación de Proveedores: Permitido\n\r\n        Lista de Proveedores registrados: Permitido\n\r\n        Historial de compras a Proveedores: Permitido\n\n\r\n        Vistas de Productos:\r\n        Registro de Categorías: Permitido\n\r\n        Registro de Presentación: Permitido\n\r\n        Registro de Productos: Permitido\n\r\n        Lista de Productos: Permitido\n\r\n        Registro de Entrada de Productos: Permitido\n\r\n        Lista de Entradas registradas: Permitido\n\n\r\n        Información del servicio actualizada:\r\n        \n\n\r\n        Nombre del rol: ADIMINISTRADOR\n\r\n        Estado: Activo.',2),(223,'2025-04-22 20:33:51','Modificación de un rol','El usuario modificó el rol con la siguiente información:\n\r\n        Nombre del rol: ADIMINISTRADOR\n\r\n        -- Modulo Inventario --\n\r\n        Vistas de Proveedores:\r\n        Registro de Proveedores: Permitido\n\r\n        Modificación de Proveedores: Permitido\n\r\n        Lista de Proveedores registrados: Permitido\n\r\n        Historial de compras a Proveedores: Permitido\n\n\r\n        Vistas de Productos:\r\n        Registro de Categorías: Permitido\n\r\n        Registro de Presentación: Permitido\n\r\n        Registro de Productos: Permitido\n\r\n        Lista de Productos: Permitido\n\r\n        Registro de Entrada de Productos: Permitido\n\r\n        Lista de Entradas registradas: Permitido\n\n\r\n        Información del servicio actualizada:\r\n        \n\n\r\n        Nombre del rol: ADIMINISTRADOR\n\r\n        Estado: Activo.',2),(224,'2025-04-22 20:34:18','Modificación de un rol','El usuario modificó el rol con la siguiente información:\n\r\n        Nombre del rol: PASANTE\n\r\n        -- Modulo Inventario --\n\r\n        Vistas de Proveedores:\r\n        Registro de Proveedores: Permitido\n\r\n        Modificación de Proveedores: Permitido\n\r\n        Lista de Proveedores registrados: Permitido\n\r\n        Historial de compras a Proveedores: Permitido\n\n\r\n        Vistas de Productos:\r\n        Registro de Categorías: Permitido\n\r\n        Registro de Presentación: Permitido\n\r\n        Registro de Productos: Denegado\n\r\n        Lista de Productos: Denegado\n\r\n        Registro de Entrada de Productos: Denegado\n\r\n        Lista de Entradas registradas: Denegado\n\n\r\n        Información del servicio actualizada:\r\n        \n\n\r\n        Nombre del rol: PASANTE\n\r\n        Estado: Activo.',2),(225,'2025-04-22 20:46:24','Cierre de sesión','El usuario cerró sesión.',2),(226,'2025-04-24 20:02:09','El usuario inició sesión','El usuario accedió al sistema.',2),(227,'2025-04-24 21:05:37','Modificación de un rol','El usuario modificó el rol con la siguiente información:\n\r\n        Nombre del rol: ADIMINISTRADOR\n\r\n        -- Modulo Inventario --\n\r\n        Vistas de Proveedores:\r\n        Registro de Proveedores: Permitido\n\r\n        Modificación de Proveedores: Permitido\n\r\n        Lista de Proveedores registrados: Permitido\n\r\n        Historial de compras a Proveedores: Permitido\n\n\r\n        Vistas de Productos:\r\n        Registro de Categorías: Permitido\n\r\n        Registro de Presentación: Permitido\n\r\n        Registro de Productos: Permitido\n\r\n        Lista de Productos: Permitido\n\r\n        Registro de Entrada de Productos: Permitido\n\r\n        Lista de Entradas registradas: Permitido\n\n\r\n        Información del servicio actualizada:\r\n        \n\n\r\n        Nombre del rol: ADIMINISTRADOR\n\r\n        Estado: Activo.',2),(228,'2025-04-24 21:11:08','Modificación de un rol','El usuario modificó el rol con la siguiente información:\n\r\n        Nombre del rol: ADIMINISTRADOR\n\r\n        -- Modulo Inventario --\n\r\n        Vistas de Proveedores:\r\n        Registro de Proveedores: Permitido\n\r\n        Modificación de Proveedores: Permitido\n\r\n        Lista de Proveedores registrados: Permitido\n\r\n        Historial de compras a Proveedores: Permitido\n\n\r\n        Vistas de Productos:\r\n        Registro de Categorías: Permitido\n\r\n        Registro de Presentación: Permitido\n\r\n        Registro de Productos: Permitido\n\r\n        Lista de Productos: Permitido\n\r\n        Registro de Entrada de Productos: Permitido\n\r\n        Lista de Entradas registradas: Permitido\n\n\r\n        Información del servicio actualizada:\r\n        \n\n\r\n        Nombre del rol: ADIMINISTRADOR\n\r\n        Estado: Activo.',2),(229,'2025-04-24 21:12:31','Cambio de estado de un rol','El usuario cambió el estado del rol con la siguiente información: \n\nNombre del rol: ROL \nEstado: Inactivo \n\n\nInformación del servicio actualizada: \n\nNombre del rol: ROL \nEstado: Activo',2),(230,'2025-04-24 21:26:41','Intento de acceso al sistema sin autenticación previa.','Un usuario intento acceder al sistema de manera incorrecta.',2),(231,'2025-04-24 21:27:09','El usuario inició sesión','El usuario accedió al sistema.',2),(232,'2025-04-24 22:04:42','Cierre de sesión','El usuario cerró sesión.',2),(233,'2025-04-24 23:55:40','Inicio de sesión','El usuario ha iniciado sesión en el sistema.',2),(234,'2025-04-24 23:56:48','Cierre de sesión','El usuario cerró sesión.',2),(235,'2025-04-25 13:48:45','Inicio de sesión','El usuario ha iniciado sesión en el sistema.',2),(236,'2025-04-25 22:53:50','Cierre de sesión','El usuario cerró sesión.',2),(237,'2025-04-26 09:31:51','Inicio de sesión','El usuario ha iniciado sesión en el sistema.',2),(238,'2025-04-26 13:05:28','Modificación de un rol','El usuario modificó el rol con la siguiente información:\n\r\n        Nombre del rol: FULL COUNTE\n\r\n        -- Modulo Inventario --\n\r\n        Vistas de Proveedores:\r\n        Registro de Proveedores: Permitido\n\r\n        Modificación de Proveedores: Permitido\n\r\n        Lista de Proveedores registrados: Permitido\n\r\n        Historial de compras a Proveedores: Permitido\n\n\r\n        Vistas de Productos:\r\n        Registro de Categorías: Permitido\n\r\n        Registro de Presentación: Permitido\n\r\n        Registro de Productos: Permitido\n\r\n        Lista de Productos: Permitido\n\r\n        Registro de Entrada de Productos: Permitido\n\r\n        Lista de Entradas registradas: Permitido\n\n\r\n        Información del servicio actualizada:\r\n        \n\n\r\n        Nombre del rol: FULL COUNTE\n\r\n        Estado: Activo.',2),(239,'2025-04-26 13:16:29','Modificación del perfil de usuario','El usuario actualizó su información personal \n\r\n        Información original:\n Cédula: E-28587583 \n\r\n        Nombre: DANIEL JosÉ \n\r\n        Apellido: BARRUETA \n\r\n        Correo: Ddbarrueta42@gmai.com \n\n\r\n        Información Actual:\n\r\n        Cédula: V-28587583\n\r\n        Nombre: DANIEL JOSÉ\n\r\n        Apellido: BARRUETA\n\r\n        Correo: Ddbarrueta42@gmai.com',2),(240,'2025-04-26 13:16:53','Modificación del perfil de usuario','El usuario actualizó su información personal \n\r\n        Información original:\n Cédula: V-28587583 \n\r\n        Nombre: DANIEL JOSÉ \n\r\n        Apellido: BARRUETA \n\r\n        Correo: Ddbarrueta42@gmai.com \n\n\r\n        Información Actual:\n\r\n        Cédula: E-28587583\n\r\n        Nombre: DANIEL JOSÉ\n\r\n        Apellido: BARRUETA PICHARDO\n\r\n        Correo: dbarrueta42@gmai.com',2),(241,'2025-04-26 13:19:33','Modificación del perfil de usuario','El usuario actualizó su información personal \n\r\n        Información original:\n Cédula: E-28587583 \n\r\n        Nombre: DANIEL JOSÉ \n\r\n        Apellido: BARRUETA PICHARDO \n\r\n        Correo: dbarrueta42@gmai.com \n\n\r\n        Información Actual:\n\r\n        Cédula: V-28587583\n\r\n        Nombre: DANIEL JOSÉ\n\r\n        Apellido: BARRUETA PICHARDO\n\r\n        Correo: dbarrueta42@gmai.com',2),(242,'2025-04-26 13:30:11','Modificación del perfil de usuario','El usuario actualizó su información personal\n\r\n        Información original:\n\r\n        Cédula: V-28587583\n\r\n        Nombre: DANIEL JOSÉ\n\r\n        Apellido: BARRUETA PICHARDO\n\r\n        Correo: dbarrueta42@gmai.com\n\n\r\n        Información Actual:\n\r\n        Cédula: V-28587583\n\r\n        Nombre: DANIEL\n\r\n        Apellido: BARRUETA\n\r\n        Correo: dbarrueta42@gmai.com',2),(243,'2025-04-26 15:07:36','Modificación del perfil de usuario','El usuario actualizó su información personal\n\r\n        Información original:\n\r\n        Cédula: V-28587583\n\r\n        Nombre: DANIEL\n\r\n        Apellido: BARRUETA\n\r\n        Correo: dbarrueta42@gmai.com\n\n\r\n        Información Actual:\n\r\n        Cédula: V-28587583\n\r\n        Nombre: DANIEL\n\r\n        Apellido: BARRUETA\n\r\n        Correo: ppprrueta42@gmai.com',2),(244,'2025-04-26 15:07:54','Modificación del perfil de usuario','El usuario actualizó su información personal\n\r\n        Información original:\n\r\n        Cédula: V-28587583\n\r\n        Nombre: DANIEL\n\r\n        Apellido: BARRUETA\n\r\n        Correo: ppprrueta42@gmai.com\n\n\r\n        Información Actual:\n\r\n        Cédula: V-28587583\n\r\n        Nombre: DANIEL\n\r\n        Apellido: BARRUETA\n\r\n        Correo: dbarrueta42@gmai.com',2),(245,'2025-04-26 15:39:51','Modificación del perfil de usuario','El usuario actualizó su información personal\n\r\n        Información original:\n\r\n        Cédula: V-28587583\n\r\n        Nombre: DANIEL\n\r\n        Apellido: BARRUETA\n\r\n        Correo: dbarrueta42@gmai.com\n\n\r\n        Información Actual:\n\r\n        Cédula: V-28587583\n\r\n        Nombre: DANIEL\n\r\n        Apellido: BARRUETA\n\r\n        Correo: dbarrueta42@gmail.com',2),(246,'2025-04-26 17:28:00','Inicio de sesión','El usuario ha iniciado sesión en el sistema.',2),(247,'2025-04-26 19:52:54','Cierre de sesión','El usuario cerró sesión.',2),(248,'2025-04-26 20:02:43','Inicio de sesión','El usuario ha iniciado sesión en el sistema.',2),(249,'2025-04-26 20:04:11','Cierre de sesión','El usuario cerró sesión.',2),(250,'2025-04-26 20:04:44','Intento de acceso al sistema sin autenticación previa.','Se ha registrado un intento de acceso al sistema de manera incorrecta por parte de un usuario no autenticado.',2),(251,'2025-04-26 20:06:20','Inicio de sesión','El usuario ha iniciado sesión en el sistema.',2),(252,'2025-04-26 20:06:25','Inicio de sesión','El usuario ha iniciado sesión en el sistema.',2),(253,'2025-04-26 20:06:26','Inicio de sesión','El usuario ha iniciado sesión en el sistema.',2),(254,'2025-04-26 20:06:26','Inicio de sesión','El usuario ha iniciado sesión en el sistema.',2),(255,'2025-04-26 20:08:32','Inicio de sesión','El usuario ha iniciado sesión en el sistema.',11),(256,'2025-04-26 20:09:24','Cierre de sesión','El usuario cerró sesión.',11),(257,'2025-04-27 11:50:23','Inicio de sesión','El usuario ha iniciado sesión en el sistema.',11),(258,'2025-04-28 00:13:02','Modificación de las preguntas de seguridad del usuario','El usuario actualizó su(s) pregunta(s) de seguridad\n Información original:\n Pregunta nº1:******************************.\nRespuesta nº1:******.\n\nPregunta nº2:******************************.\nRespuesta nº2:******.\n\nPregunta nº3:******************************.\nRespuesta nº3:******.\n\n Información Actual:\n Pregunta nº1:******************************.\nRespuesta nº1:******.\n\nPregunta nº2:*******************************************.\nRespuesta nº2:******.\n\nPregunta nº3:***********************************************.\nRespuesta nº3:*******.\n\n',11),(259,'2025-04-28 00:13:03','Modificación de las preguntas de seguridad del usuario','El usuario actualizó su(s) pregunta(s) de seguridad\n Información original:\n Pregunta nº1:******************************.\nRespuesta nº1:******.\n\nPregunta nº2:******************************.\nRespuesta nº2:******.\n\nPregunta nº3:******************************.\nRespuesta nº3:******.\n\n Información Actual:\n Pregunta nº1:******************************.\nRespuesta nº1:******.\n\nPregunta nº2:*******************************************.\nRespuesta nº2:******.\n\nPregunta nº3:***********************************************.\nRespuesta nº3:*******.\n\n',11),(260,'2025-04-28 19:49:38','Cierre de sesión exitoso','El usuario ha cerrado sesión correctamente y su estado ha sido actualizado en el sistema.',11),(261,'2025-04-28 19:53:55','Inicio de sesión exitoso','El usuario ha iniciado sesión correctamente en el sistema y su estado ha sido actualizado.',11),(262,'2025-04-28 20:03:55','Modificación de la contraseña del usuario','El usuario actualizó su contraseña\n\r\n        Contraseña original: ************\n\r\n        \r\n        Contraseña Actual: ************ ',11),(263,'2025-04-28 20:07:33','Modificación de la contraseña del usuario','El usuario actualizó su contraseña\n\n        Contraseña original: ************\n\n        \n        Contraseña Actual: ************ ',11),(264,'2025-04-28 20:36:16','Modificación de las preguntas de seguridad','El usuario actualizó su(s) pregunta(s) de seguridad',11),(265,'2025-04-28 20:36:17','Modificación de las preguntas de seguridad','El usuario actualizó su(s) pregunta(s) de seguridad',11),(266,'2025-04-28 20:36:17','Modificación de las preguntas de seguridad','El usuario actualizó su(s) pregunta(s) de seguridad',11),(267,'2025-04-28 20:46:16','Modificación de las preguntas de seguridad','El usuario actualizó su(s) pregunta(s) de seguridad',11),(268,'2025-04-28 20:46:16','Modificación de las preguntas de seguridad','El usuario actualizó su(s) pregunta(s) de seguridad',11),(269,'2025-04-28 20:46:16','Modificación de las preguntas de seguridad','El usuario actualizó su(s) pregunta(s) de seguridad',11),(270,'2025-04-28 20:47:17','Modificación de las preguntas de seguridad','El usuario actualizó su(s) pregunta(s) de seguridad',11),(271,'2025-04-28 20:47:17','Modificación de las preguntas de seguridad','El usuario actualizó su(s) pregunta(s) de seguridad',11),(272,'2025-04-28 20:47:17','Modificación de las preguntas de seguridad','El usuario actualizó su(s) pregunta(s) de seguridad',11),(273,'2025-04-28 20:52:27','Modificación de las preguntas de seguridad','El usuario actualizó su(s) pregunta(s) de seguridad',11),(274,'2025-04-28 20:52:28','Modificación de las preguntas de seguridad','El usuario actualizó su(s) pregunta(s) de seguridad',11),(275,'2025-04-28 20:52:28','Modificación de las preguntas de seguridad','El usuario actualizó su(s) pregunta(s) de seguridad',11),(276,'2025-04-28 21:29:05','Modificación de las preguntas de seguridad','El usuario actualizó su(s) pregunta(s) de seguridad',11),(277,'2025-04-28 21:29:05','Modificación de las preguntas de seguridad','El usuario actualizó su(s) pregunta(s) de seguridad',11),(278,'2025-04-28 21:29:05','Modificación de las preguntas de seguridad','El usuario actualizó su(s) pregunta(s) de seguridad',11),(279,'2025-04-28 21:30:58','Modificación del perfil de usuario','El usuario actualizó su información personal\n\r\n        Información original:\n\r\n        Cédula: E-14257869\n\r\n        Nombre: JOSE\n\r\n        Apellido: PERALTA\n\r\n        Correo: josepe@gmail.com\n\r\n        Dirección: BARRIO LOS GUAJIROS XD\n\r\n        Teléfono: 04122541256\n\r\n\r\n        Información Actual:\n\r\n        Cédula: E-14257869\n\r\n        Nombre: JOSE\n\r\n        Apellido: PERALTA\n\r\n        Correo: josepe@gmail.com\n\r\n        Dirección: BARRIO LOS GUAJIROS\n\r\n        Teléfono: 04122541278\r\n        ',11),(280,'2025-04-28 22:32:15','Modificación de las preguntas de seguridad','El usuario actualizó su(s) pregunta(s) de seguridad',11),(281,'2025-04-28 22:32:15','Modificación de las preguntas de seguridad','El usuario actualizó su(s) pregunta(s) de seguridad',11),(282,'2025-04-28 22:32:15','Modificación de las preguntas de seguridad','El usuario actualizó su(s) pregunta(s) de seguridad',11),(283,'2025-04-28 22:38:22','Modificación de las preguntas de seguridad','El usuario actualizó su(s) pregunta(s) de seguridad',11),(284,'2025-04-28 22:38:23','Modificación de las preguntas de seguridad','El usuario actualizó su(s) pregunta(s) de seguridad',11),(285,'2025-04-28 22:38:23','Modificación de las preguntas de seguridad','El usuario actualizó su(s) pregunta(s) de seguridad',11),(286,'2025-04-28 22:51:24','Modificación de las preguntas de seguridad','El usuario actualizó su(s) pregunta(s) de seguridad',11),(287,'2025-04-28 22:51:24','Modificación de las preguntas de seguridad','El usuario actualizó su(s) pregunta(s) de seguridad',11),(288,'2025-04-28 22:51:24','Modificación de las preguntas de seguridad','El usuario actualizó su(s) pregunta(s) de seguridad',11),(289,'2025-04-28 22:59:32','Modificación exitosa de las preguntas de seguridad','El usuario actualizó su(s) pregunta(s) de seguridad',11),(290,'2025-04-28 23:01:10','Modificación exitosa de las preguntas de seguridad','El usuario actualizó su(s) pregunta(s) de seguridad',11),(291,'2025-04-28 23:03:05','Modificación exitosa de las preguntas de seguridad','El usuario actualizó su(s) pregunta(s) de seguridad',11),(292,'2025-04-28 23:30:04','Modificación exitosa de las preguntas de seguridad','El usuario actualizó su(s) pregunta(s) de seguridad',11),(293,'2025-04-28 23:41:25','Cierre de sesión exitoso','El usuario ha cerrado sesión correctamente y su estado ha sido actualizado en el sistema.',11),(294,'2025-04-29 07:43:13','Inicio de sesión exitoso','El usuario ha iniciado sesión correctamente en el sistema y su estado ha sido actualizado.',11),(295,'2025-04-29 08:12:02','Cierre de sesión exitoso','El usuario ha cerrado sesión correctamente y su estado ha sido actualizado en el sistema.',11),(296,'2025-04-29 08:12:09','Inicio de sesión exitoso','El usuario ha iniciado sesión correctamente en el sistema y su estado ha sido actualizado.',2),(297,'2025-04-29 08:16:24','Cierre de sesión exitoso','El usuario ha cerrado sesión correctamente y su estado ha sido actualizado en el sistema.',2),(298,'2025-04-29 08:16:37','Inicio de sesión exitoso','El usuario ha iniciado sesión correctamente en el sistema y su estado ha sido actualizado.',11),(299,'2025-04-29 08:30:22','Modificación exitosa de las preguntas de seguridad','El usuario actualizó su(s) pregunta(s) de seguridad',11),(300,'2025-04-29 08:49:46','Cierre de sesión exitoso','El usuario ha cerrado sesión correctamente y su estado ha sido actualizado en el sistema.',11),(301,'2025-04-29 08:50:40','Inicio de sesión exitoso','El usuario ha iniciado sesión correctamente en el sistema y su estado ha sido actualizado.',2),(302,'2025-04-29 08:50:56','Cierre de sesión exitoso','El usuario ha cerrado sesión correctamente y su estado ha sido actualizado en el sistema.',2),(303,'2025-04-29 08:53:06','Inicio de sesión exitoso','El usuario ha iniciado sesión correctamente en el sistema y su estado ha sido actualizado.',2),(304,'2025-04-29 08:58:08','Cierre de sesión exitoso','El usuario ha cerrado sesión correctamente y su estado ha sido actualizado en el sistema.',2),(305,'2025-04-29 08:58:22','Inicio de sesión exitoso','El usuario ha iniciado sesión correctamente en el sistema y su estado ha sido actualizado.',2),(306,'2025-04-29 10:02:01','Cierre de sesión exitoso','El usuario ha cerrado sesión correctamente y su estado ha sido actualizado en el sistema.',2),(307,'2025-04-30 12:17:34','Inicio de sesión exitoso','El usuario ha iniciado sesión correctamente en el sistema y su estado ha sido actualizado.',2),(308,'2025-04-30 12:44:19','Modificación del perfil de usuario','El usuario actualizó su información personal\n\r\n        Información original:\n\r\n        Cédula: V-28587583\n\r\n        Nombre: DANIEL\n\r\n        Apellido: BARRUETA\n\r\n        Correo: dbarrueta42@gmail.com\n\r\n        Dirección: SECTOR E GUASDUAL CALLE 1\n\r\n        Teléfono: 04125238909\n\r\n\r\n        Información Actual:\n\r\n        Cédula: V-28587583\n\r\n        Nombre: DANIEL\n\r\n        Apellido: BARRUETA PICHARDO\n\r\n        Correo: dbarrueta42@gmail.com\n\r\n        Dirección: SECTOR E GUASDUAL CALLE 1\n\r\n        Teléfono: 04125238909\r\n        ',2),(309,'2025-04-30 12:48:38','Modificación del perfil de usuario','El usuario actualizó su información personal\n\n        Información original:<br>\n        Cédula: V-28587583<br>\n        Nombre: DANIEL<br>\n        Apellido: BARRUETA PICHARDO<br>\n        Correo: dbarrueta42@gmail.com<br>\n        Dirección: SECTOR E GUASDUAL CALLE 1<br>\n        Teléfono: 04125238909<br><br>\n        Información Actual:<br>\n        Cédula: V-28587583<br>\n        Nombre: DANIEL JOSÉ<br>\n        Apellido: BARRUETA PICHARDO<br>\n        Correo: dbarrueta42@gmail.com<br>\n        Dirección: SECTOR E GUASDUAL CALLE 1<br>\n        Teléfono: 04125238909\n        ',2),(310,'2025-04-30 13:05:51','Modificación exitosa del perfil de usuario','El usuario actualizó su información personal <br>\r\n        Información original:<br>\r\n        Cédula: V-28587583<br>\r\n        Nombre: DANIEL JOSÉ<br>\r\n        Apellido: BARRUETA PICHARDO<br>\r\n        Correo: dbarrueta42@gmail.com<br>\r\n        Dirección: SECTOR E GUASDUAL CALLE 1<br>\r\n        Teléfono: 04125238909<br><br>\r\n        Información Actual:<br>\r\n        Cédula: V-28587583<br>\r\n        Nombre: DANIEL JOSÉ<br>\r\n        Apellido: BARRUETA PICHARDO<br>\r\n        Correo: dbarrueta42@gmail.com<br>\r\n        Dirección: SECTOR E GUASDUAL CALLE 1 CASA 4 39<br>\r\n        Teléfono: 04125238909\r\n        ',2),(311,'2025-04-30 13:06:44','Modificación exitosa del perfil de usuario','El usuario actualizó su información personal <br><br>\r\n        Información original:<br>\r\n        Cédula: V-28587583<br>\r\n        Nombre: DANIEL JOSÉ<br>\r\n        Apellido: BARRUETA PICHARDO<br>\r\n        Correo: dbarrueta42@gmail.com<br>\r\n        Dirección: SECTOR E GUASDUAL CALLE 1 CASA 4 39<br>\r\n        Teléfono: 04125238909<br><br>\r\n        Información Actual:<br>\r\n        Cédula: V-28587583<br>\r\n        Nombre: DANIEL<br>\r\n        Apellido: BARRUETA<br>\r\n        Correo: dbarrueta42@gmail.com<br>\r\n        Dirección: SECTOR E GUASDUAL CALLE 1<br>\r\n        Teléfono: 04125238909\r\n        ',2),(312,'2025-04-30 13:38:41','Modificación de la contraseña.','El usuario actualizó su contraseña.',2),(313,'2025-04-30 13:46:46','Modificación exitosa del perfil del usuario.','El usuario actualizó su contraseña.',2),(314,'2025-04-30 16:54:40','Cierre de sesión exitoso','El usuario ha cerrado sesión correctamente y su estado ha sido actualizado en el sistema.',2),(315,'2025-04-30 18:48:26','Inicio de sesión exitoso','El usuario ha iniciado sesión correctamente en el sistema y su estado ha sido actualizado.',7),(316,'2025-04-30 19:01:01','Modificación exitosa del perfil de usuario.','El usuario actualizó su contraseña.',7),(317,'2025-04-30 19:08:11','Modificación exitosa del perfil de usuario','El usuario actualizó su(s) pregunta(s) de seguridad',7),(318,'2025-05-02 16:37:18','Registro exitoso de un nuevo usuario','Se ha registrado correctamente un nuevo usuario: PEPE PEREZ. en el sistema.',7),(319,'2025-05-02 16:47:21','Registro exitoso de un nuevo usuario','Se ha registrado correctamente un nuevo usuario: DIEGO FERNANDEZ. en el sistema.',7),(320,'2025-05-02 16:49:37','Registro exitoso de un nuevo usuario','Se ha registrado correctamente un nuevo usuario: PEPE GUEDEZ. en el sistema.',7),(321,'2025-05-02 17:29:21','Modificación exitosa de características de acceso de un usuario','El usuario modificó las características de acceso de un usuario: <br><br>\r\n        Información del usuario modificado:<br>\r\n        Cédula: V-28587583<br>\r\n        Nombre: DANIEL BARRUETA<br>\r\n        Teléfono: 04154785965<br><br>\r\n        Información original:<br>\r\n        Estado: Activo<br>\r\n        Permiso de inicio de sesión: Denegado<br>\r\n        Rol asignado: ADIMINISTRADOR<br><br>\r\n        Información Actual:<br>\r\n        Estado: Activo<br>\r\n        Permiso de inicio de sesión: Denegado<br>\r\n        Rol asignado: ADIMINISTRADOR\r\n        ',7),(322,'2025-05-02 18:28:55','Modificación exitosa del acceso de un usuario.','El usuario restableció el acceso al sistema del usuario con la siguiente información: <br><br>\r\n        Información del usuario modificado:<br>\r\n        Cédula: V-28587583<br>\r\n        Nombre: DANIEL<br>\r\n        Apellido: BARRUETA<br><br>\r\n        Información original:<br>\r\n        Estado: Activo<br>\r\n        Permiso de inicio de sesión: Denegado<br>\r\n        Rol asignado: ADIMINISTRADOR<br><br>\r\n        Bloqueado: <br><br>\r\n        Información Actual:<br>\r\n        Estado: Activo<br>\r\n        Permiso de inicio de sesión: Denegado<br>\r\n        Rol asignado: ADIMINISTRADOR\r\n        Bloqueado: Sí\r\n        ',7),(323,'2025-05-02 18:41:21','Modificación exitosa del acceso de un usuario.','El usuario restableció el acceso al sistema del usuario con la siguiente información: <br><br>\r\n        Información del usuario modificado:<br>\r\n        Cédula: V-28587583<br>\r\n        Nombre: DANIEL<br>\r\n        Apellido: BARRUETA<br><br>\r\n        Información original:<br>\r\n        Estado: Activo<br>\r\n        Permiso de inicio de sesión: Denegado<br>\r\n        Rol asignado: ADIMINISTRADOR<br>\r\n        Bloqueado: Sí<br><br>\r\n        Información Actual:<br>\r\n        Estado: Activo<br>\r\n        Permiso de inicio de sesión: Denegado<br>\r\n        Rol asignado: ADIMINISTRADOR<br>\r\n        Bloqueado: No\r\n        ',7),(324,'2025-05-02 18:49:58','Cierre de sesión exitoso','El usuario ha cerrado sesión correctamente y su estado ha sido actualizado en el sistema.',7),(325,'2025-05-02 19:34:58','Inicio de sesión exitoso','El usuario ha iniciado sesión correctamente en el sistema y su estado ha sido actualizado.',2),(326,'2025-05-02 21:49:33','Inicio de sesión exitoso','El usuario ha iniciado sesión correctamente en el sistema y su estado ha sido actualizado.',2),(327,'2025-05-02 21:56:34','Modificación exitosa del perfil de usuario.','El usuario actualizó su contraseña.',2),(328,'2025-05-02 21:59:08','Modificación exitosa del perfil de usuario','El usuario actualizó su(s) pregunta(s) de seguridad',2),(329,'2025-05-02 22:22:12','Cierre de sesión exitoso','El usuario ha cerrado sesión correctamente y su estado ha sido actualizado en el sistema.',2),(330,'2025-05-03 12:46:30','Inicio de sesión exitoso','El usuario ha iniciado sesión correctamente en el sistema y su estado ha sido actualizado.',2),(331,'2025-05-03 16:30:54','Modificación exitosa de la configuración del sistema.','El usuario actualizó la configuración del sistema <br><br>\r\n        Información del usuario que realizo la modificación:<br>\r\n        Cédula: V-28587583<br>\r\n        Nombre: DANIEL<br>\r\n        Apellido: BARRUETA<br>\r\n        Teléfono: 04125238909<br>\r\n        Rol asignado: ADIMINISTRADOR<br><br>\r\n        Información original:<br>\r\n        Cantidad de preguntas de seguridad: 3<br>\r\n        Tiempo de inactividad de sesión: 2 minutos<br>\r\n        Intentos de inicio de sesión para los usuarios: 3<br>\r\n        Cantidad de caracteres: 8<br>\r\n        Cantidad de símbolos: 2<br>\r\n        Cantidad de números: 1<br><br>\r\n        Información Actual:<br>\r\n        Cantidad de preguntas de seguridad: 3<br>\r\n        Tiempo de inactividad de sesión: 2 minutos<br>\r\n        Intentos de inicio de sesión para los usuarios: 3<br>\r\n        Cantidad de caracteres: 8<br>\r\n        Cantidad de símbolos: 1<br>\r\n        Cantidad de números: 1\r\n        ',2),(332,'2025-05-03 16:31:10','Modificación exitosa de la configuración del sistema.','El usuario actualizó la configuración del sistema <br><br>\r\n        Información del usuario que realizo la modificación:<br>\r\n        Cédula: V-28587583<br>\r\n        Nombre: DANIEL<br>\r\n        Apellido: BARRUETA<br>\r\n        Teléfono: 04125238909<br>\r\n        Rol asignado: ADIMINISTRADOR<br><br>\r\n        Información original:<br>\r\n        Cantidad de preguntas de seguridad: 3<br>\r\n        Tiempo de inactividad de sesión: 2 minutos<br>\r\n        Intentos de inicio de sesión para los usuarios: 3<br>\r\n        Cantidad de caracteres: 8<br>\r\n        Cantidad de símbolos: 1<br>\r\n        Cantidad de números: 1<br><br>\r\n        Información Actual:<br>\r\n        Cantidad de preguntas de seguridad: 3<br>\r\n        Tiempo de inactividad de sesión: 2 minutos<br>\r\n        Intentos de inicio de sesión para los usuarios: 3<br>\r\n        Cantidad de caracteres: 8<br>\r\n        Cantidad de símbolos: 1<br>\r\n        Cantidad de números: 3\r\n        ',2),(333,'2025-05-03 17:24:29','Modificación exitosa de la configuración del sistema.','El usuario actualizó la configuración del sistema <br><br>\r\n        Información del usuario que realizo la modificación:<br>\r\n        Cédula: V-28587583<br>\r\n        Nombre: DANIEL<br>\r\n        Apellido: BARRUETA<br>\r\n        Teléfono: 04125238909<br>\r\n        Rol asignado: ADIMINISTRADOR<br><br>\r\n        Información original:<br>\r\n        Cantidad de preguntas de seguridad: 3<br>\r\n        Tiempo de inactividad de sesión: 2 minutos<br>\r\n        Intentos de inicio de sesión para los usuarios: 3<br>\r\n        Cantidad de caracteres: 8<br>\r\n        Cantidad de símbolos: 1<br>\r\n        Cantidad de números: 3<br><br>\r\n        Información Actual:<br>\r\n        Cantidad de preguntas de seguridad: 3<br>\r\n        Tiempo de inactividad de sesión: 2 minutos<br>\r\n        Intentos de inicio de sesión para los usuarios: 3<br>\r\n        Cantidad de caracteres: 9<br>\r\n        Cantidad de símbolos: 1<br>\r\n        Cantidad de números: 3\r\n        ',2),(334,'2025-05-03 17:27:18','Modificación exitosa de la configuración del sistema.','El usuario actualizó la configuración del sistema <br><br>\r\n        Información del usuario que realizo la modificación:<br>\r\n        Cédula: V-28587583<br>\r\n        Nombre: DANIEL<br>\r\n        Apellido: BARRUETA<br>\r\n        Teléfono: 04125238909<br>\r\n        Rol asignado: ADIMINISTRADOR<br><br>\r\n        Información original:<br>\r\n        Cantidad de preguntas de seguridad: 3<br>\r\n        Tiempo de inactividad de sesión: 2 minutos<br>\r\n        Intentos de inicio de sesión para los usuarios: 3<br>\r\n        Cantidad de caracteres: 9<br>\r\n        Cantidad de símbolos: 1<br>\r\n        Cantidad de números: 3<br><br>\r\n        Información Actual:<br>\r\n        Cantidad de preguntas de seguridad: 3<br>\r\n        Tiempo de inactividad de sesión: 2 minutos<br>\r\n        Intentos de inicio de sesión para los usuarios: 3<br>\r\n        Cantidad de caracteres: 10<br>\r\n        Cantidad de símbolos: 1<br>\r\n        Cantidad de números: 3\r\n        ',2),(335,'2025-05-03 17:38:35','Modificación exitosa de la configuración del sistema.','El usuario actualizó la configuración del sistema <br><br>\r\n        Información del usuario que realizo la modificación:<br>\r\n        Cédula: V-28587583<br>\r\n        Nombre: DANIEL<br>\r\n        Apellido: BARRUETA<br>\r\n        Teléfono: 04125238909<br>\r\n        Rol asignado: ADIMINISTRADOR<br><br>\r\n        Información original:<br>\r\n        Cantidad de preguntas de seguridad: 3<br>\r\n        Tiempo de inactividad de sesión: 2 minutos<br>\r\n        Intentos de inicio de sesión para los usuarios: 3<br>\r\n        Cantidad de caracteres: 10<br>\r\n        Cantidad de símbolos: 1<br>\r\n        Cantidad de números: 3<br><br>\r\n        Información Actual:<br>\r\n        Cantidad de preguntas de seguridad: 4<br>\r\n        Tiempo de inactividad de sesión: 2 minutos<br>\r\n        Intentos de inicio de sesión para los usuarios: 3<br>\r\n        Cantidad de caracteres: 10<br>\r\n        Cantidad de símbolos: 1<br>\r\n        Cantidad de números: 3\r\n        ',2),(336,'2025-05-03 17:38:57','Modificación exitosa de la configuración del sistema.','El usuario actualizó la configuración del sistema <br><br>\r\n        Información del usuario que realizo la modificación:<br>\r\n        Cédula: V-28587583<br>\r\n        Nombre: DANIEL<br>\r\n        Apellido: BARRUETA<br>\r\n        Teléfono: 04125238909<br>\r\n        Rol asignado: ADIMINISTRADOR<br><br>\r\n        Información original:<br>\r\n        Cantidad de preguntas de seguridad: 4<br>\r\n        Tiempo de inactividad de sesión: 2 minutos<br>\r\n        Intentos de inicio de sesión para los usuarios: 3<br>\r\n        Cantidad de caracteres: 10<br>\r\n        Cantidad de símbolos: 1<br>\r\n        Cantidad de números: 3<br><br>\r\n        Información Actual:<br>\r\n        Cantidad de preguntas de seguridad: 4<br>\r\n        Tiempo de inactividad de sesión: 2 minutos<br>\r\n        Intentos de inicio de sesión para los usuarios: 3<br>\r\n        Cantidad de caracteres: 9<br>\r\n        Cantidad de símbolos: 1<br>\r\n        Cantidad de números: 3\r\n        ',2),(337,'2025-05-03 17:39:58','Modificación exitosa de la configuración del sistema.','El usuario actualizó la configuración del sistema <br><br>\r\n        Información del usuario que realizo la modificación:<br>\r\n        Cédula: V-28587583<br>\r\n        Nombre: DANIEL<br>\r\n        Apellido: BARRUETA<br>\r\n        Teléfono: 04125238909<br>\r\n        Rol asignado: ADIMINISTRADOR<br><br>\r\n        Información original:<br>\r\n        Cantidad de preguntas de seguridad: 4<br>\r\n        Tiempo de inactividad de sesión: 2 minutos<br>\r\n        Intentos de inicio de sesión para los usuarios: 3<br>\r\n        Cantidad de caracteres: 9<br>\r\n        Cantidad de símbolos: 1<br>\r\n        Cantidad de números: 3<br><br>\r\n        Información Actual:<br>\r\n        Cantidad de preguntas de seguridad: 4<br>\r\n        Tiempo de inactividad de sesión: 2 minutos<br>\r\n        Intentos de inicio de sesión para los usuarios: 3<br>\r\n        Cantidad de caracteres: 9<br>\r\n        Cantidad de símbolos: 1<br>\r\n        Cantidad de números: 3\r\n        ',2),(338,'2025-05-03 18:36:46','Modificación exitosa de la configuración del sistema.','El usuario actualizó la configuración del sistema <br><br>\r\n        Información del usuario que realizo la modificación:<br>\r\n        Cédula: V-28587583<br>\r\n        Nombre: DANIEL<br>\r\n        Apellido: BARRUETA<br>\r\n        Teléfono: 04125238909<br>\r\n        Rol asignado: ADIMINISTRADOR<br><br>\r\n        Información original:<br>\r\n        Cantidad de preguntas de seguridad: 3<br>\r\n        Tiempo de inactividad de sesión: 2 minutos<br>\r\n        Intentos de inicio de sesión para los usuarios: 3<br>\r\n        Cantidad de caracteres: 9<br>\r\n        Cantidad de símbolos: 1<br>\r\n        Cantidad de números: 3<br><br>\r\n        Información Actual:<br>\r\n        Cantidad de preguntas de seguridad: 3<br>\r\n        Tiempo de inactividad de sesión: 2 minutos<br>\r\n        Intentos de inicio de sesión para los usuarios: 3<br>\r\n        Cantidad de caracteres: 16<br>\r\n        Cantidad de símbolos: 1<br>\r\n        Cantidad de números: 3\r\n        ',2),(339,'2025-05-03 18:58:57','Modificación exitosa de la configuración del sistema.','El usuario actualizó la configuración del sistema <br><br>\r\n        Información del usuario que realizo la modificación:<br>\r\n        Cédula: V-28587583<br>\r\n        Nombre: DANIEL<br>\r\n        Apellido: BARRUETA<br>\r\n        Teléfono: 04125238909<br>\r\n        Rol asignado: ADIMINISTRADOR<br><br>\r\n        Información original:<br>\r\n        Cantidad de preguntas de seguridad: 3<br>\r\n        Tiempo de inactividad de sesión: 2 minutos<br>\r\n        Intentos de inicio de sesión para los usuarios: 3<br>\r\n        Cantidad de caracteres: 9<br>\r\n        Cantidad de símbolos: 1<br>\r\n        Cantidad de números: 3<br><br>\r\n        Información Actual:<br>\r\n        Cantidad de preguntas de seguridad: 3<br>\r\n        Tiempo de inactividad de sesión: 2 minutos<br>\r\n        Intentos de inicio de sesión para los usuarios: 3<br>\r\n        Cantidad de caracteres: 16<br>\r\n        Cantidad de símbolos: 1<br>\r\n        Cantidad de números: 3\r\n        ',2),(340,'2025-05-03 19:56:24','Cierre de sesión exitoso','El usuario ha cerrado sesión correctamente en el sistema.',2),(341,'2025-05-04 13:56:17','Inicio de sesión exitoso','El usuario ha iniciado sesión correctamente en el sistema.',2),(342,'2025-05-04 14:01:14','Inicio de sesión exitoso','El usuario ha iniciado sesión correctamente en el sistema.',2),(343,'2025-05-04 14:03:23','Modificación exitosa del perfil de usuario','El usuario actualizó su información personal <br><br>\r\n        Información original:<br>\r\n        Cédula: V-28587583<br>\r\n        Nombre: DANIEL<br>\r\n        Apellido: BARRUETA<br>\r\n        Correo: dbarrueta42@gmail.com<br>\r\n        Dirección: SECTOR E GUASDUAL CALLE 1<br>\r\n        Teléfono: 04125238909<br><br>\r\n        Información Actual:<br>\r\n        Cédula: E-28587583<br>\r\n        Nombre: DANIEL<br>\r\n        Apellido: BARRUETA<br>\r\n        Correo: dbarrueta42@gmail.com<br>\r\n        Dirección: SECTOR E GUASDUAL CALLE 1<br>\r\n        Teléfono: 04125238909\r\n        ',2),(344,'2025-05-04 14:09:06','Cierre de sesión exitoso','El usuario ha cerrado sesión correctamente en el sistema.',2),(345,'2025-05-04 14:19:57','Inicio de sesión exitoso','El usuario ha iniciado sesión correctamente en el sistema.',2),(346,'2025-05-04 14:20:28','Cierre de sesión exitoso','El usuario ha cerrado sesión correctamente en el sistema.',2),(347,'2025-05-04 14:21:32','Inicio de sesión exitoso','El usuario ha iniciado sesión correctamente en el sistema.',2),(348,'2025-05-04 14:21:40','Cierre de sesión exitoso','El usuario ha cerrado sesión correctamente en el sistema.',2),(349,'2025-05-04 14:22:09','Inicio de sesión exitoso','El usuario ha iniciado sesión correctamente en el sistema.',2),(350,'2025-05-04 14:35:12','Cierre de sesión exitoso','El usuario ha cerrado sesión correctamente en el sistema.',2),(351,'2025-05-04 14:35:54','Inicio de sesión exitoso','El usuario ha iniciado sesión correctamente en el sistema.',2),(352,'2025-05-04 14:36:25','Cierre de sesión exitoso','El usuario ha cerrado sesión correctamente en el sistema.',2),(353,'2025-05-04 14:38:45','Inicio de sesión exitoso','El usuario ha iniciado sesión correctamente en el sistema.',2),(354,'2025-05-04 14:39:24','Cierre de sesión exitoso','El usuario ha cerrado sesión correctamente en el sistema.',2),(355,'2025-05-04 14:41:04','Inicio de sesión exitoso','El usuario ha iniciado sesión correctamente en el sistema.',2),(356,'2025-05-04 14:42:47','Cierre de sesión exitoso','El usuario ha cerrado sesión correctamente en el sistema.',2),(357,'2025-05-04 14:43:38','Inicio de sesión exitoso','El usuario ha iniciado sesión correctamente en el sistema.',2);
/*!40000 ALTER TABLE `bitacora` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categoria`
--

DROP TABLE IF EXISTS `categoria`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `categoria` (
  `id_categoria` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NOT NULL,
  `estado` tinyint(1) NOT NULL,
  PRIMARY KEY (`id_categoria`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categoria`
--

LOCK TABLES `categoria` WRITE;
/*!40000 ALTER TABLE `categoria` DISABLE KEYS */;
INSERT INTO `categoria` VALUES (1,'COMESTIBLE',1),(2,'BEBIDAS',1),(3,'FRITURAS',1),(7,'GOOBIE',1);
/*!40000 ALTER TABLE `categoria` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cliente`
--

DROP TABLE IF EXISTS `cliente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cliente` (
  `id_cliente` int NOT NULL AUTO_INCREMENT,
  `cedula` varchar(11) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NOT NULL,
  `nombre` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NOT NULL,
  `telefono` varchar(11) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NOT NULL,
  PRIMARY KEY (`id_cliente`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cliente`
--

LOCK TABLES `cliente` WRITE;
/*!40000 ALTER TABLE `cliente` DISABLE KEYS */;
INSERT INTO `cliente` VALUES (1,'V-15214817','Jhoan Torrez','04128053290'),(2,'V-28587583','daniel barrueta','04125238909'),(7,'V-14540481','maría gimenez','04245494211'),(8,'V-30887827','KATTY RONDON','04242344312'),(9,'V-29775798','LUISA','04123456789');
/*!40000 ALTER TABLE `cliente` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `configuracion`
--

DROP TABLE IF EXISTS `configuracion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `configuracion` (
  `id` int NOT NULL AUTO_INCREMENT,
  `c_preguntas` int NOT NULL,
  `c_caracteres` int NOT NULL,
  `c_numeros` int NOT NULL,
  `c_simbolos` int NOT NULL,
  `tiempo_inactividad` int NOT NULL,
  `intentos_inicio_sesion` tinyint NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `configuracion`
--

LOCK TABLES `configuracion` WRITE;
/*!40000 ALTER TABLE `configuracion` DISABLE KEYS */;
INSERT INTO `configuracion` VALUES (1,3,9,3,1,2,3);
/*!40000 ALTER TABLE `configuracion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `detalles_menu`
--

DROP TABLE IF EXISTS `detalles_menu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `detalles_menu` (
  `id_detalles_menu` int NOT NULL AUTO_INCREMENT,
  `id_producto` int NOT NULL,
  `cantidad` int NOT NULL,
  `numero_detalles_menu` int NOT NULL,
  `id_menu` int NOT NULL,
  PRIMARY KEY (`id_detalles_menu`),
  KEY `id_producto` (`id_producto`),
  KEY `id_menu` (`id_menu`),
  CONSTRAINT `detalles_menu_ibfk_1` FOREIGN KEY (`id_menu`) REFERENCES `menu` (`id_menu`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `detalles_menu_ibfk_2` FOREIGN KEY (`id_producto`) REFERENCES `producto` (`id_producto`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `detalles_menu`
--

LOCK TABLES `detalles_menu` WRITE;
/*!40000 ALTER TABLE `detalles_menu` DISABLE KEYS */;
INSERT INTO `detalles_menu` VALUES (1,1,2,1,1),(2,4,1,1,1),(5,1,5,1,4),(6,1,2,1,5),(7,1,1,1,6),(8,4,1,2,6),(9,1,3,1,7),(10,4,1,2,7),(11,2,1,1,9),(12,4,1,2,9);
/*!40000 ALTER TABLE `detalles_menu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `detalles_pago`
--

DROP TABLE IF EXISTS `detalles_pago`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `detalles_pago` (
  `id_detalle_pago` int NOT NULL AUTO_INCREMENT,
  `id_venta` int NOT NULL,
  `metodo_pago` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NOT NULL,
  `referencia` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  `cantidad_abonada_dolares` float NOT NULL,
  `cantidad_abonada_bolivares` float NOT NULL,
  PRIMARY KEY (`id_detalle_pago`),
  KEY `id_venta` (`id_venta`),
  CONSTRAINT `detalles_pago_ibfk_1` FOREIGN KEY (`id_venta`) REFERENCES `venta` (`id_venta`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=89 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `detalles_pago`
--

LOCK TABLES `detalles_pago` WRITE;
/*!40000 ALTER TABLE `detalles_pago` DISABLE KEYS */;
INSERT INTO `detalles_pago` VALUES (1,4,'Divisa',NULL,24,0),(2,6,'Transferencia / Pago movíl','1234567890',21,1005.48),(3,26,'Divisa',NULL,5,239.4),(4,28,'Divisa',NULL,25,1197),(5,30,'Punto de Venta',NULL,33,1580.04),(6,31,'Divisa',NULL,45,2154.6),(7,32,'Divisa',NULL,42,2010.96),(8,33,'Divisa',NULL,30,1436.4),(9,33,'Punto de Venta',NULL,35,1675.8),(10,34,'Divisa',NULL,9,430.92),(11,35,'Punto de Venta',NULL,36,1723.68),(12,36,'Divisa',NULL,30,1436.4),(13,36,'Punto de Venta',NULL,1,47.88),(14,37,'Divisa',NULL,30,1436.4),(15,37,'Punto de Venta',NULL,6,287.28),(16,38,'Divisa',NULL,30,1436.4),(17,39,'Divisa',NULL,15,718.2),(18,67,'Divisa',NULL,15,718.2),(19,73,'Punto de Venta',NULL,30,1436.4),(20,74,'Transferencia / Pago movíl','875647382',45,2154.6),(21,84,'Divisa',NULL,1,47.88),(22,89,'Transferencia / Pago movíl','23232166',1,47.88),(23,93,'Divisa','1233333333',2,95.76),(24,93,'Transferencia / Pago movíl','1233333333',3,143.64),(25,97,'Divisa',NULL,1,47.88),(26,97,'Transferencia / Pago movíl','234534323',1,47.88),(27,99,'Divisa',NULL,10,478.8),(28,101,'Divisa',NULL,10,478.8),(29,102,'Divisa',NULL,10,478.8),(30,103,'Divisa',NULL,3,143.64),(31,104,'Divisa',NULL,3,143.64),(32,107,'Divisa',NULL,3,143.64),(33,108,'Divisa',NULL,3,143.64),(34,109,'Divisa',NULL,3,143.64),(35,110,'Divisa',NULL,3,143.64),(36,111,'Divisa',NULL,3,143.64),(37,112,'Divisa',NULL,3,143.64),(38,113,'Divisa',NULL,3,143.64),(39,115,'0','0',3,143.64),(40,116,'0','0',3,143.64),(41,118,'Divisa',NULL,3,143.64),(42,119,'Divisa',NULL,3,143.64),(43,120,'Divisa',NULL,3,143.64),(44,121,'Divisa',NULL,3,143.64),(45,122,'Divisa',NULL,3,143.64),(46,124,'Divisa',NULL,3,143.64),(47,132,'Divisa',NULL,15,718.2),(48,132,'Transferencia / Pago movíl','1233442342',15,718.2),(49,133,'Divisa',NULL,1,47.88),(50,134,'Divisa',NULL,4,191.52),(51,135,'Divisa',NULL,4,191.52),(52,136,'Divisa',NULL,2,95.76),(53,137,'Divisa',NULL,2,95.76),(54,138,'Divisa',NULL,2,95.76),(55,139,'Divisa',NULL,15,718.2),(56,140,'Divisa',NULL,15,718.2),(57,140,'Transferencia / Pago movíl','6564467835',15,718.2),(58,141,'Divisa',NULL,15,718.2),(59,141,'Transferencia / Pago movíl','587463874655',15,718.2),(60,142,'Divisa',NULL,3,143.64),(61,142,'Transferencia / Pago movíl','235346765445',3,143.64),(62,143,'Divisa',NULL,30,1436.4),(63,143,'Transferencia / Pago movíl','9477563738475',4,191.52),(64,144,'Divisa',NULL,25,1197),(65,144,'Transferencia / Pago movíl','7676454334588',15,718.2),(66,145,'Divisa',NULL,6,287.28),(67,145,'Transferencia / Pago movíl','5463425785',6,287.28),(68,146,'Divisa',NULL,5,239.4),(69,146,'Transferencia / Pago movíl','3456634764',5,239.4),(70,147,'Divisa',NULL,10,478.8),(71,148,'Divisa',NULL,1,47.88),(72,149,'Divisa',NULL,20,957.6),(73,150,'Divisa',NULL,30,1436.4),(74,151,'Punto de Venta',NULL,15,718.2),(75,151,'Transferencia / Pago movíl','73651236653',19.8,948.024),(76,152,'Punto de Venta',NULL,11.6,555.408),(77,153,'Divisa',NULL,108,5171.04),(78,154,'Punto de Venta',NULL,39.44,1839.48),(79,155,'Punto de Venta',NULL,23.2,1082.05),(80,156,'Divisa',NULL,15,699.6),(81,156,'Punto de Venta',NULL,1.24,57.8336),(82,157,'Punto de Venta',NULL,19.72,919.741),(83,158,'Divisa',NULL,50,2332),(84,158,'Punto de Venta',NULL,5.68,264.915),(85,159,'Punto de Venta',NULL,34.8,1623.07),(86,160,'Transferencia / Pago movíl','85746534253647564536',34.8,1623.07),(87,161,'Divisa',NULL,40,1865.6),(88,161,'Punto de Venta',NULL,1.76,82.0864);
/*!40000 ALTER TABLE `detalles_pago` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `detalles_venta`
--

DROP TABLE IF EXISTS `detalles_venta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `detalles_venta` (
  `id_detalles_venta` int NOT NULL AUTO_INCREMENT,
  `id_servicio` int DEFAULT NULL,
  `cantidad_servicio` int DEFAULT NULL,
  `precio_servicio_dolares` float DEFAULT NULL,
  `precio_servicio_bolivares` float DEFAULT NULL,
  `id_producto` int DEFAULT NULL,
  `cantidad` int DEFAULT NULL,
  `precio_unidad_dolares` float DEFAULT NULL,
  `precio_unidad_bolivares` float DEFAULT NULL,
  `id_venta` int NOT NULL,
  PRIMARY KEY (`id_detalles_venta`),
  KEY `id_producto` (`id_producto`),
  KEY `id_venta` (`id_venta`),
  KEY `id_servicio` (`id_servicio`),
  CONSTRAINT `detalles_venta_ibfk_1` FOREIGN KEY (`id_venta`) REFERENCES `venta` (`id_venta`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `detalles_venta_ibfk_2` FOREIGN KEY (`id_servicio`) REFERENCES `menu` (`id_menu`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `detalles_venta_ibfk_3` FOREIGN KEY (`id_producto`) REFERENCES `producto` (`id_producto`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `detalles_venta`
--

LOCK TABLES `detalles_venta` WRITE;
/*!40000 ALTER TABLE `detalles_venta` DISABLE KEYS */;
/*!40000 ALTER TABLE `detalles_venta` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `dolar`
--

DROP TABLE IF EXISTS `dolar`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `dolar` (
  `id_dolar` int NOT NULL AUTO_INCREMENT,
  `dolar` float NOT NULL,
  `fecha_precio` datetime NOT NULL,
  PRIMARY KEY (`id_dolar`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dolar`
--

LOCK TABLES `dolar` WRITE;
/*!40000 ALTER TABLE `dolar` DISABLE KEYS */;
INSERT INTO `dolar` VALUES (1,40.4,'2024-09-17 09:00:00'),(2,40,'2024-09-17 13:00:00'),(3,47.88,'2024-10-13 21:49:03'),(4,34,'2024-11-26 16:37:20'),(5,46.64,'2024-11-26 16:39:13'),(6,62.18,'2025-02-19 17:23:58'),(7,62.18,'2025-02-19 17:24:12'),(8,62.18,'2025-02-19 17:26:24'),(9,63,'2025-02-19 17:33:15'),(10,66.79,'2025-03-18 07:51:52'),(11,70,'2025-03-30 18:36:41');
/*!40000 ALTER TABLE `dolar` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `entrada`
--

DROP TABLE IF EXISTS `entrada`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `entrada` (
  `id_entrada` int NOT NULL AUTO_INCREMENT,
  `id_producto` int NOT NULL,
  `id_proveedor` int NOT NULL,
  `precio_compra_dolar` float NOT NULL,
  `precio_compra_bs` float NOT NULL,
  `stock_comprado` int NOT NULL,
  `fecha_entrada` datetime NOT NULL,
  `id_dolar` int DEFAULT NULL,
  PRIMARY KEY (`id_entrada`),
  KEY `id_producto` (`id_producto`),
  KEY `id_proveedor` (`id_proveedor`),
  KEY `id_dolar` (`id_dolar`),
  CONSTRAINT `entrada_ibfk_1` FOREIGN KEY (`id_proveedor`) REFERENCES `proveedor` (`id_proveedor`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `entrada_ibfk_2` FOREIGN KEY (`id_dolar`) REFERENCES `dolar` (`id_dolar`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `entrada_ibfk_3` FOREIGN KEY (`id_producto`) REFERENCES `producto` (`id_producto`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `entrada`
--

LOCK TABLES `entrada` WRITE;
/*!40000 ALTER TABLE `entrada` DISABLE KEYS */;
INSERT INTO `entrada` VALUES (1,1,1,3,0,3,'2024-09-25 11:37:54',1),(2,2,1,4,0,4,'2024-09-25 11:37:54',1),(13,3,1,2,95.76,30,'2024-11-15 11:20:25',1),(14,4,1,4,191.52,20,'2024-11-15 11:48:18',1);
/*!40000 ALTER TABLE `entrada` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `menu`
--

DROP TABLE IF EXISTS `menu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `menu` (
  `id_menu` int NOT NULL AUTO_INCREMENT,
  `nombre_platillo` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NOT NULL,
  `precio_dolar` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NOT NULL,
  `descripcion` varchar(70) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NOT NULL,
  `estatus` int NOT NULL,
  PRIMARY KEY (`id_menu`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `menu`
--

LOCK TABLES `menu` WRITE;
/*!40000 ALTER TABLE `menu` DISABLE KEYS */;
INSERT INTO `menu` VALUES (1,'POLLO ASADO COMPLETO','15','pollo asado completo con ensalada y yuca',1),(4,'GLUPS','12','COMBO DE REFRESCOS',1),(5,'POLLO COREANO','14','POLLO FRITO COREANO',1),(6,'MEDIO POLLO CON FRESCO','10','MEDIO POLLON ASADO CON GLUP',1),(7,'POLLO ESPECIAL','15','POLLO + 3 GLUP',1),(8,'PABELLON','7','ARROZ Y CARAOTA',1),(9,'SERVICIO PRUEBA','10','POLLO Y REFRESCO',1);
/*!40000 ALTER TABLE `menu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `preguntas_secretas`
--

DROP TABLE IF EXISTS `preguntas_secretas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `preguntas_secretas` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_pregunta` int NOT NULL,
  `respuesta` varchar(80) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NOT NULL,
  `numero_pregunta` int NOT NULL,
  `id_usuario` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_usuario` (`id_usuario`),
  KEY `id_pregunta` (`id_pregunta`),
  CONSTRAINT `preguntas_secretas_ibfk_1` FOREIGN KEY (`id_pregunta`) REFERENCES `seguridad` (`id_seguridad`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `preguntas_secretas_ibfk_2` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `preguntas_secretas`
--

LOCK TABLES `preguntas_secretas` WRITE;
/*!40000 ALTER TABLE `preguntas_secretas` DISABLE KEYS */;
INSERT INTO `preguntas_secretas` VALUES (1,1,'d6KUjQ==',1,1),(2,1,'l7TCuai0oQ==',1,2),(3,2,'prjDwbG3',2,2),(4,4,'prjDsLK7',3,2),(5,1,'ioCCgXd/amlnbA==',1,10),(6,4,'ioCCgXd/amlnbA==',2,10),(7,2,'ioCCgXd/amlnbA==',3,10),(8,2,'prjDwbG3',1,11),(9,3,'prjDwLWtpQ==',2,11),(10,4,'l7TCuai0oQ==',3,11),(11,2,'l7TCuai0oQ==',1,7),(12,1,'l7TCuai0oQ==',2,7),(13,4,'l7TCuai0oQ==',3,7),(14,3,'ioCBfnZ8Z2ZpbQ==',1,12),(15,4,'ioCBfnZ8Z2ZpbQ==',2,12),(16,2,'ioCBfnZ8Z2ZpbQ==',3,12),(17,1,'ioCDfnR8Z2dpaQ==',1,13),(18,4,'ioCDfnR8Z2dpaQ==',2,13),(19,3,'ioCDfnR8Z2dpaQ==',3,13),(20,2,'ioCDfXd9aGdnag==',1,14),(21,3,'ioCDfXd9aGdnag==',2,14),(22,1,'ioCDfXd9aGdnag==',3,14);
/*!40000 ALTER TABLE `preguntas_secretas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `presentacion`
--

DROP TABLE IF EXISTS `presentacion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `presentacion` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `presentacion`
--

LOCK TABLES `presentacion` WRITE;
/*!40000 ALTER TABLE `presentacion` DISABLE KEYS */;
INSERT INTO `presentacion` VALUES (1,'1 L'),(2,'1.5 L'),(3,'2 L'),(4,'3 L'),(5,'1/2 KG'),(6,'1 KG'),(7,'500ML'),(8,'200GR');
/*!40000 ALTER TABLE `presentacion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `producto`
--

DROP TABLE IF EXISTS `producto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `producto` (
  `id_producto` int NOT NULL AUTO_INCREMENT,
  `id_categoria` int NOT NULL,
  `codigo` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NOT NULL,
  `nombre_producto` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NOT NULL,
  `id_presentacion` int NOT NULL,
  `precio_compra_dolar` float NOT NULL,
  `precio_compra_bs` float NOT NULL,
  `stock` int NOT NULL,
  `estatus` int NOT NULL,
  PRIMARY KEY (`id_producto`),
  KEY `id_categoria` (`id_categoria`),
  KEY `id_presentacion` (`id_presentacion`),
  CONSTRAINT `producto_ibfk_1` FOREIGN KEY (`id_categoria`) REFERENCES `categoria` (`id_categoria`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `producto_ibfk_2` FOREIGN KEY (`id_presentacion`) REFERENCES `presentacion` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `producto`
--

LOCK TABLES `producto` WRITE;
/*!40000 ALTER TABLE `producto` DISABLE KEYS */;
INSERT INTO `producto` VALUES (1,2,'00000001','GLUP',1,2,95.76,-4,1),(2,2,'00000002','Pepsi 1.5 LT',2,5,239.4,0,1),(3,2,'00000003','LIGHT',2,2,95.76,2,1),(4,1,'00000004','POLLO',6,5,239.4,9,1),(7,2,'00000005','COCA COLA',3,3,143.64,-1,1),(15,1,'00000006','ALITAS',6,0,0,0,0),(19,2,'00000007','PIÑA COLADA',7,0,0,0,0);
/*!40000 ALTER TABLE `producto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `proveedor`
--

DROP TABLE IF EXISTS `proveedor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `proveedor` (
  `id_proveedor` int NOT NULL AUTO_INCREMENT,
  `cedula_rif` varchar(11) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NOT NULL,
  `nombre` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NOT NULL,
  `correo` varchar(70) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NOT NULL,
  `direccion` varchar(70) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NOT NULL,
  `telefono` varchar(11) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NOT NULL,
  PRIMARY KEY (`id_proveedor`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `proveedor`
--

LOCK TABLES `proveedor` WRITE;
/*!40000 ALTER TABLE `proveedor` DISABLE KEYS */;
INSERT INTO `proveedor` VALUES (1,'V-16934956','EL CORRALITO','Corral@pollera.com','ACARIGUA CALLE 3 AVENIDA 5 Y 6','04122343443');
/*!40000 ALTER TABLE `proveedor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rol`
--

DROP TABLE IF EXISTS `rol`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `rol` (
  `id_rol` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NOT NULL,
  `estado` tinyint NOT NULL,
  `r_proveedores` tinyint NOT NULL,
  `m_proveedores` tinyint NOT NULL,
  `l_proveedores` tinyint NOT NULL,
  `h_proveedores` tinyint NOT NULL,
  `r_categoria` tinyint NOT NULL,
  `r_presentacion` tinyint(1) NOT NULL,
  `r_productos` tinyint NOT NULL,
  `l_productos` tinyint NOT NULL,
  `r_entrada` tinyint NOT NULL,
  `l_entrada` tinyint DEFAULT NULL,
  `g_venta` tinyint(1) NOT NULL,
  `d_venta` tinyint(1) NOT NULL,
  `l_venta` tinyint(1) NOT NULL,
  `f_venta` tinyint(1) NOT NULL,
  `est_venta` tinyint(1) NOT NULL,
  `r_servicio` tinyint(1) NOT NULL,
  `m_servicio` tinyint(1) NOT NULL,
  `l_servicio` tinyint(1) NOT NULL,
  `r_cliente` tinyint(1) NOT NULL,
  `m_cliente` tinyint(1) NOT NULL,
  `l_cliente` tinyint(1) NOT NULL,
  `h_cliente` tinyint(1) NOT NULL,
  `f_cliente` tinyint(1) NOT NULL,
  `r_empleado` tinyint(1) NOT NULL,
  `m_empleado` tinyint(1) NOT NULL,
  `l_empleado` tinyint(1) NOT NULL,
  `r_rol` tinyint(1) NOT NULL,
  `m_rol` tinyint(1) NOT NULL,
  `l_rol` tinyint(1) NOT NULL,
  `m_cant_pregunta_seguridad` tinyint(1) NOT NULL,
  `m_tiempo_sesion` tinyint(1) NOT NULL,
  `m_cant_caracteres` tinyint(1) NOT NULL,
  `m_cant_simbolos` tinyint(1) NOT NULL,
  `m_cant_num` tinyint(1) NOT NULL,
  `intentos_inicio_sesion` tinyint(1) NOT NULL,
  `v_bitacora` tinyint(1) NOT NULL,
  PRIMARY KEY (`id_rol`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rol`
--

LOCK TABLES `rol` WRITE;
/*!40000 ALTER TABLE `rol` DISABLE KEYS */;
INSERT INTO `rol` VALUES (1,'DESARROLLADOR',1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,0,1),(2,'ADIMINISTRADOR',1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1),(3,'EMPLEADO',1,0,0,1,0,0,0,0,1,1,0,1,1,1,1,1,1,1,1,0,0,0,1,0,1,1,0,0,0,0,0,0,0,0,0,0,0),(4,'PROVEEDOR',1,0,0,0,0,0,0,0,0,0,0,0,1,1,1,1,1,1,1,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0),(5,'SUSCRIPTOR',1,1,1,1,1,1,1,1,0,0,0,0,1,1,1,1,1,1,1,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0),(6,'FULL ACCESS',0,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,0,1),(7,'PASANTE',1,1,1,1,1,1,1,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0),(8,'FULL COUNTER',1,1,1,1,1,1,1,1,1,1,1,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0),(9,'FULL COUNTE',1,1,1,1,1,1,1,1,1,1,1,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0),(10,'ROL',0,1,1,1,1,1,1,1,1,1,1,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0);
/*!40000 ALTER TABLE `rol` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `seguridad`
--

DROP TABLE IF EXISTS `seguridad`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `seguridad` (
  `id_seguridad` int NOT NULL AUTO_INCREMENT,
  `pregunta` varchar(80) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NOT NULL,
  PRIMARY KEY (`id_seguridad`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `seguridad`
--

LOCK TABLES `seguridad` WRITE;
/*!40000 ALTER TABLE `seguridad` DISABLE KEYS */;
INSERT INTO `seguridad` VALUES (1,'9hKToYSUUnWEdXOVmGOWgX10hphwkIhohoVShKWZmYiac1B/daaTm5eJcQ=='),(2,'9hKVmmOZh3VSgKiXjZVogHF1faJwoJhof3F2hpiP'),(3,'9hKem5CKhHVSeJhwoJhof3V8g6VwjZCReX9SeJhwmIRoe354daGTlYSH'),(4,'9hKToYSUUnWFVJicbJGXf3KEeXOUkWOUc1B1faiUjYdodn+AeJhwmoSLe4OGeZI=');
/*!40000 ALTER TABLE `seguridad` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `usuario` (
  `id_usuario` int NOT NULL AUTO_INCREMENT,
  `cedula` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NOT NULL,
  `nombre` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NOT NULL,
  `apellido` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NOT NULL,
  `correo` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NOT NULL,
  `contraseña` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NOT NULL,
  `telefono` varchar(11) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NOT NULL,
  `direccion` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NOT NULL,
  `ultima_sesion` datetime DEFAULT NULL,
  `sesion_activa` tinyint NOT NULL,
  `bloqueado` tinyint NOT NULL,
  `suspender` tinyint NOT NULL,
  `primer_inicio` tinyint(1) NOT NULL,
  `id_rol` int NOT NULL,
  `estado` int NOT NULL,
  PRIMARY KEY (`id_usuario`),
  KEY `id_rol` (`id_rol`),
  CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`id_rol`) REFERENCES `rol` (`id_rol`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` VALUES (1,'V-30270578','MANUEL','TORREZ','SHAUDITONUEL@GMAIL.COM','h7uxwaexpp9jZoY=','04128053240','TURÉN LINDA',NULL,0,0,0,1,2,1),(2,'E-28587583','DANIEL','BARRUETA','dbarrueta42@gmail.com','eLS+tai0nGJi','04125238909','SECTOR E GUASDUAL CALLE 1','2025-05-04 14:43:38',1,0,0,0,2,1),(5,'V-30400015','ANGEL','ALIBARDI','angeldaniel231041@gmail.com','eLS+tai0nGJi','04122343434','BARRIO EL PAEZ',NULL,0,0,0,1,3,1),(6,'E-10642121','DANNY JOSÉ','BARRUETA','danny@gmail.com','eLS+tai0nGJi','04145196488','CALLE 1 VARRIO EL GUASDUAL',NULL,0,0,0,1,3,1),(7,'V-12345678','ADMIN','PRUEBA','admin@gmail.com','dbe9tbF5ZGM=','04123456548','ANDRES ELOY NEGRO','2025-04-30 18:48:26',0,0,0,0,2,1),(8,'V-11077810','ROSIRIS','PICHARDO','rosiris@gmail.com','ZYWDgHh+aWg=','04124567898','BARRIO EL ANDRES ELOY BLANCO','2025-04-11 16:13:43',0,0,0,1,7,1),(9,'V-30774582','CARMEN','PEREZ','carmen@gmai.com','ioCDfHp/ZmVqZg==','04145896325','BARRIO PAÉZ',NULL,0,0,0,1,3,1),(10,'V-25478958','JULIO','BAEZ','jbaez@gmai.com','ioCCgXd/amlnbA==','04165874523','URB LAS MARIAS',NULL,0,0,0,1,4,1),(11,'E-14257869','JOSE','PERALTA','josepe@gmail.com','ZYyIg3l9ZmNk','04122541278','BARRIO LOS GUAJIROS','2025-04-29 08:16:37',0,0,0,0,3,1),(12,'V-12345679','PEPE','PEREZ','pepe@gmail.com','ZYWDgHh+aWk=','04164569812','BARIIO YA NI',NULL,0,0,0,1,3,1),(13,'V-32145775','DIEGO','FERNANDEZ','difer@gmail.com','Z4WBgHh/aWU=','04127544589','BARRIO YANI',NULL,0,0,0,1,3,1),(14,'V-31456756','PEPE','GUEDEZ','pegue@gmail.com','Z4SEgXl/Z2Y=','04124567899','BARRIO YANI',NULL,0,0,0,1,3,1);
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `venta`
--

DROP TABLE IF EXISTS `venta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `venta` (
  `id_venta` int NOT NULL AUTO_INCREMENT,
  `fecha_venta` datetime NOT NULL,
  `sub_total_dolares` float NOT NULL,
  `sub_total_bs` float NOT NULL,
  `monto_total_dolares` float NOT NULL,
  `monto_total_bolivares` float NOT NULL,
  `id_usuario` int NOT NULL,
  `id_cliente` int NOT NULL,
  PRIMARY KEY (`id_venta`),
  KEY `id_cliente` (`id_cliente`),
  KEY `id_usuario` (`id_usuario`),
  CONSTRAINT `venta_ibfk_1` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`id_cliente`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `venta_ibfk_2` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=162 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `venta`
--

LOCK TABLES `venta` WRITE;
/*!40000 ALTER TABLE `venta` DISABLE KEYS */;
INSERT INTO `venta` VALUES (1,'2024-10-17 08:34:03',0,0,30,1436.4,2,2),(2,'2024-10-17 08:52:41',0,0,24,1125.48,2,2),(3,'2024-10-17 08:53:40',0,0,24,1125.48,2,2),(4,'2024-10-17 09:03:02',0,0,24,1125.48,2,2),(5,'2024-10-17 09:06:34',0,0,5,200,2,2),(6,'2024-10-17 09:09:49',0,0,21,1005.48,2,2),(7,'2024-10-17 09:11:00',0,0,5,200,2,2),(8,'2024-10-17 09:11:34',0,0,5,200,2,2),(9,'2024-10-17 09:13:15',0,0,5,200,2,2),(10,'2024-10-17 09:55:19',0,0,5,200,2,2),(11,'2024-10-17 09:56:12',0,0,5,200,2,2),(12,'2024-10-17 10:00:25',0,0,5,200,2,2),(13,'2024-10-17 10:01:24',0,0,5,200,2,2),(14,'2024-10-17 10:01:41',0,0,5,200,2,2),(15,'2024-10-17 10:02:30',0,0,5,200,2,2),(16,'2024-10-17 10:02:42',0,0,5,200,2,2),(17,'2024-10-17 10:02:51',0,0,5,200,2,2),(18,'2024-10-17 10:04:04',0,0,15,600,2,2),(19,'2024-10-17 10:07:03',0,0,15,600,2,2),(20,'2024-10-17 10:07:11',0,0,15,600,2,2),(21,'2024-10-17 10:14:51',0,0,15,600,2,2),(22,'2024-10-17 10:14:56',0,0,15,600,2,2),(23,'2024-10-17 10:15:19',0,0,5,200,2,2),(24,'2024-10-17 10:26:07',0,0,5,200,2,2),(25,'2024-10-17 10:29:27',0,0,5,200,2,2),(26,'2024-10-17 10:35:34',0,0,5,200,2,2),(27,'2024-10-17 10:37:25',0,0,25,1165.48,2,2),(28,'2024-10-17 10:38:57',0,0,25,1165.48,2,2),(29,'2024-10-17 10:40:50',0,0,33,1556.4,2,2),(30,'2024-10-17 10:41:10',0,0,36,1676.4,2,2),(31,'2024-10-21 09:01:56',0,0,45,2154.6,2,2),(32,'2024-10-22 09:05:28',0,0,42,2010.96,2,2),(33,'2024-10-24 11:21:52',0,0,65,3072.8,2,2),(34,'2024-10-24 11:25:16',0,0,9,360,2,7),(35,'2024-10-24 11:26:01',0,0,36,1440,2,7),(36,'2024-10-25 10:58:11',0,0,31,1484.28,2,2),(37,'2024-10-25 11:23:48',0,0,36,1723.68,2,2),(38,'2024-10-28 03:44:24',0,0,30,1436.4,2,8),(39,'2024-10-28 03:54:34',0,0,15,718.2,2,8),(40,'2024-10-28 04:06:49',0,0,15,718.2,2,8),(41,'2024-10-28 04:11:36',0,0,15,718.2,2,8),(42,'2024-10-28 04:16:14',0,0,15,718.2,2,8),(43,'2024-10-28 04:17:27',0,0,15,718.2,2,8),(44,'2024-10-28 04:18:08',0,0,15,718.2,2,8),(45,'2024-10-28 04:18:30',0,0,15,718.2,2,8),(46,'2024-10-28 04:19:48',0,0,15,718.2,2,8),(47,'2024-10-28 04:20:00',0,0,15,718.2,2,8),(48,'2024-10-28 04:20:54',0,0,15,718.2,2,8),(49,'2024-10-28 04:21:08',0,0,15,718.2,2,8),(50,'2024-10-28 04:21:48',0,0,15,718.2,2,8),(51,'2024-10-28 04:23:42',0,0,15,718.2,2,8),(52,'2024-10-28 04:24:05',0,0,15,718.2,2,8),(53,'2024-10-28 04:34:52',0,0,15,718.2,2,8),(54,'2024-10-28 04:35:06',0,0,15,718.2,2,8),(55,'2024-10-28 04:35:17',0,0,15,718.2,2,8),(56,'2024-10-28 04:35:31',0,0,15,718.2,2,8),(57,'2024-10-28 04:39:22',0,0,15,718.2,2,8),(58,'2024-10-28 04:41:30',0,0,15,718.2,2,8),(59,'2024-10-28 04:41:51',0,0,15,718.2,2,8),(60,'2024-10-28 04:53:18',0,0,15,718.2,2,8),(61,'2024-10-28 04:54:09',0,0,15,718.2,2,8),(62,'2024-10-28 04:56:01',0,0,15,718.2,2,8),(63,'2024-10-28 04:56:23',0,0,15,718.2,2,8),(64,'2024-10-28 04:59:41',0,0,15,718.2,2,8),(65,'2024-10-28 05:00:34',0,0,15,718.2,2,8),(66,'2024-10-28 05:00:46',0,0,15,718.2,2,8),(67,'2024-10-28 05:01:06',0,0,15,718.2,2,8),(68,'2024-10-28 05:03:43',0,0,30,1436.4,2,8),(69,'2024-10-28 05:06:01',0,0,30,1436.4,2,8),(70,'2024-10-28 05:08:53',0,0,30,1436.4,2,8),(71,'2024-10-28 05:14:54',0,0,30,1436.4,2,8),(72,'2024-10-28 05:14:58',0,0,30,1436.4,2,8),(73,'2024-10-28 05:15:05',0,0,30,1436.4,2,8),(74,'2024-10-28 05:16:44',0,0,45,2154.6,2,2),(75,'2024-10-28 05:18:27',0,0,50,2000,2,2),(76,'2024-10-28 05:19:27',0,0,20,800,2,2),(77,'2024-10-28 05:22:00',0,0,20,800,2,2),(78,'2024-10-28 05:29:38',0,0,20,800,2,2),(79,'2024-10-28 05:29:43',0,0,20,800,2,2),(80,'2024-10-28 05:30:00',0,0,5,200,2,2),(81,'2024-10-28 05:31:09',0,0,5,200,2,2),(82,'2024-10-28 05:33:13',0,0,5,200,2,2),(83,'2024-10-28 05:33:29',0,0,1,40,2,2),(84,'2024-10-28 05:33:36',0,0,1,40,2,2),(85,'2024-10-28 05:36:25',0,0,1,40,2,2),(86,'2024-10-28 05:37:48',0,0,1,40,2,2),(87,'2024-10-28 05:38:54',0,0,1,40,2,2),(88,'2024-10-28 05:39:24',0,0,1,40,2,2),(89,'2024-10-28 05:39:37',0,0,1,40,2,2),(90,'2024-10-28 05:46:25',0,0,10,400,2,8),(91,'2024-10-28 05:48:39',0,0,10,400,2,8),(92,'2024-10-28 06:32:53',0,0,2,80,2,2),(93,'2024-10-28 07:05:24',0,0,5,200,2,2),(94,'2024-10-28 07:13:32',0,0,2,80,2,2),(95,'2024-10-28 07:15:30',0,0,2,80,2,2),(96,'2024-10-28 07:15:49',0,0,2,80,2,2),(97,'2024-10-28 07:17:08',0,0,2,80,2,2),(98,'2024-10-28 07:18:46',0,0,45,2154.6,2,8),(99,'2024-10-28 07:19:01',0,0,15,718.2,2,8),(100,'2024-10-28 07:19:08',0,0,15,718.2,2,8),(101,'2024-10-28 07:20:45',0,0,15,718.2,2,8),(102,'2024-10-28 07:22:39',0,0,15,718.2,2,8),(103,'2024-10-28 07:23:02',0,0,6,240,2,8),(104,'2024-10-28 07:24:03',0,0,6,240,2,8),(105,'2024-10-28 07:24:28',0,0,6,240,2,8),(106,'2024-10-28 07:24:41',0,0,6,240,2,8),(107,'2024-10-28 07:25:18',0,0,6,240,2,8),(108,'2024-10-28 07:25:59',0,0,6,240,2,8),(109,'2024-10-28 07:26:52',0,0,6,240,2,8),(110,'2024-10-28 07:27:05',0,0,6,240,2,8),(111,'2024-10-28 07:30:51',0,0,6,240,2,8),(112,'2024-10-28 07:31:55',0,0,6,240,2,8),(113,'2024-10-28 07:32:20',0,0,6,240,2,8),(114,'2024-10-28 07:34:59',0,0,6,240,2,8),(115,'2024-10-28 07:36:09',0,0,6,240,2,8),(116,'2024-10-28 07:36:36',0,0,6,240,2,8),(117,'2024-10-28 07:37:06',0,0,6,240,2,8),(118,'2024-10-28 07:37:31',0,0,6,240,2,8),(119,'2024-10-28 07:38:15',0,0,6,240,2,8),(120,'2024-10-28 07:38:23',0,0,6,240,2,8),(121,'2024-10-28 07:38:48',0,0,6,240,2,8),(122,'2024-10-28 07:38:53',0,0,6,240,2,8),(123,'2024-10-28 07:40:47',0,0,6,240,2,8),(124,'2024-10-28 07:41:39',0,0,6,240,2,8),(125,'2024-10-28 07:42:35',0,0,6,240,2,8),(126,'2024-10-30 05:28:59',0,0,5,200,2,2),(127,'2024-10-30 06:51:50',0,0,5,200,2,2),(128,'2024-10-30 06:56:08',0,0,300,14364,2,2),(129,'2024-10-30 07:07:42',0,0,30,1436.4,2,2),(130,'2024-10-30 07:07:55',0,0,30,1436.4,2,2),(131,'2024-10-30 07:27:56',0,0,30,1436.4,2,2),(132,'2024-10-30 07:30:49',0,0,30,1436.4,2,8),(133,'2024-10-30 07:35:32',0,0,1,40,2,2),(134,'2024-10-30 07:37:21',0,0,4,160,2,2),(135,'2024-10-30 07:37:42',0,0,4,160,2,2),(136,'2024-10-30 07:40:06',0,0,4,160,2,2),(137,'2024-10-30 07:40:11',0,0,4,160,2,2),(138,'2024-10-30 07:42:38',0,0,4,160,2,2),(139,'2024-10-30 07:43:25',0,0,30,1436.4,2,8),(140,'2024-10-30 07:44:39',0,0,30,1436.4,2,8),(141,'2024-10-30 07:45:29',0,0,30,1436.4,2,2),(142,'2024-10-30 07:46:11',0,0,6,240,2,2),(143,'2024-10-30 07:47:20',0,0,34,1596.4,2,2),(144,'2024-10-30 07:54:10',0,0,40,1836.4,2,2),(145,'2024-11-05 06:22:53',0,0,12,543.04,2,2),(146,'2024-11-06 04:51:09',0,0,10,463.04,2,2),(147,'2024-11-09 09:19:41',0,0,10,478.8,2,8),(148,'2024-11-13 09:51:54',0,0,2,80,2,2),(149,'2024-11-14 09:29:26',0,0,20,957.6,1,9),(150,'2024-11-14 10:45:50',0,0,30,1436.4,1,2),(151,'2024-11-15 12:10:27',0,0,30,1318.2,2,7),(152,'2024-11-15 12:18:59',0,0,10,478.8,2,7),(153,'2024-11-22 11:42:54',0,0,108,5171.04,2,8),(154,'2024-11-26 09:44:21',34,1590.72,39.44,1845.24,5,2),(155,'2024-11-26 10:22:39',0,0,23.2,1110.82,5,8),(156,'2024-11-27 04:52:23',0,0,16.24,766.06,2,8),(157,'2024-11-28 12:54:02',17,804.04,19.72,932.69,5,8),(158,'2024-11-28 03:09:53',63,2997.84,73.08,3477.49,2,8),(159,'2024-11-28 03:23:34',30,1399.2,34.8,1623.07,2,8),(160,'2024-11-28 03:30:05',30,1399.2,34.8,1623.07,2,8),(161,'2025-02-18 08:42:08',36,1686.48,41.76,1956.32,2,2);
/*!40000 ALTER TABLE `venta` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-05-04 17:32:34
