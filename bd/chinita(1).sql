-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 28-10-2025 a las 23:29:00
-- Versión del servidor: 8.0.30
-- Versión de PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `chinita`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bitacora`
--

CREATE TABLE `bitacora` (
  `id` int NOT NULL,
  `fecha_hora` datetime NOT NULL,
  `accion` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NOT NULL,
  `mensaje` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NOT NULL,
  `id_usuario` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `bitacora`
--

INSERT INTO `bitacora` (`id`, `fecha_hora`, `accion`, `mensaje`, `id_usuario`) VALUES
(1, '2025-10-17 16:12:24', 'Actualización exitosa de la tasa del dolar.', 'Se actualizó la tasa del dolar de manera automática. <br><br>\r\n    <b>****** Información de la tasa del dolar:   ******</b><br>\r\n    Precio anterior: <b>N/A bs </b><br>\r\n    Fecha anterior: <b>31-12-1969 / 08:00:pm </b><br><br>\r\n\r\n    <b>****** Información de la tasa del dolar actual:   ******</b><br>\r\n    Precio actual: <b>203.74 bs </b><br>\r\n    Fecha actual: <b>17-10-2025 / 04:12:pm </b><br>\r\n    ', 2),
(2, '2025-10-17 16:13:43', 'Actualización exitosa de la tasa del dolar.', 'Se actualizó la tasa del dolar de manera automática. <br><br>\r\n    <b>****** Información de la tasa del dolar:   ******</b><br>\r\n    Precio anterior: <b>N/A bs </b><br>\r\n    Fecha anterior: <b>31-12-1969 / 08:00:pm </b><br><br>\r\n\r\n    <b>****** Información de la tasa del dolar actual:   ******</b><br>\r\n    Precio actual: <b>203.74 bs </b><br>\r\n    Fecha actual: <b>17-10-2025 / 04:13:pm </b><br>\r\n    ', 2),
(3, '2025-10-17 16:23:20', 'Actualización exitosa de la tasa del dolar.', 'Se actualizó la tasa del dolar de manera manual. <br><br>\r\n    <b>****** Información de la tasa del dolar:   ******</b><br>\r\n    Precio anterior: <b>203.74 bs </b><br>\r\n    Fecha anterior: <b>17-10-2025 / 04:13:pm </b><br><br>\r\n\r\n    <b>****** Información de la tasa del dolar actual:   ******</b><br>\r\n    Precio actual: <b>203.75 bs </b><br>\r\n    Fecha actual: <b>17-10-2025 / 04:23:pm </b><br>\r\n    ', 2),
(4, '2025-10-17 16:47:50', 'Cierre de sesión exitoso', 'El usuario ha cerrado sesión correctamente en el sistema.', 2),
(5, '2025-10-17 16:48:19', 'Inicio de sesión exitoso', 'El usuario ha iniciado sesión correctamente en el sistema.', 2),
(6, '2025-10-17 19:13:01', 'Registro exitoso de una Marca.', 'Se registro una Marca con la siguiente informacón: <br><br>\r\n        <b>****** Información de la presentación:   ******</b><br><br>\r\n        Nombre: <b>Malta </b><br>\r\n        ', 2),
(7, '2025-10-17 19:51:30', 'Registro exitoso de una presentación.', 'Se registro una presentación con la siguiente informacón: <br><br>\r\n        <b>****** Información de la presentación:   ******</b><br><br>\r\n        Nombre: <b> </b><br>\r\n        Descripción: <b> </b><br>\r\n        Estado: <b>Activo </b><br>\r\n        ', 2),
(8, '2025-10-17 19:54:48', 'Cierre de sesión exitoso', 'El usuario ha cerrado sesión correctamente en el sistema.', 2),
(9, '2025-10-18 19:34:34', 'Inicio de sesión exitoso', 'El usuario ha iniciado sesión correctamente en el sistema.', 2),
(10, '2025-10-18 20:59:52', 'Cierre de sesión exitoso', 'El usuario ha cerrado sesión correctamente en el sistema.', 2),
(11, '2025-10-18 21:00:16', 'Inicio de sesión exitoso', 'El usuario ha iniciado sesión correctamente en el sistema.', 2),
(12, '2025-10-18 21:04:01', 'Actualización exitosa de la tasa del dolar.', 'Se actualizó la tasa del dolar de manera automática. <br><br>\r\n    <b>****** Información de la tasa del dolar:   ******</b><br>\r\n    Precio anterior: <b>203.75 bs </b><br>\r\n    Fecha anterior: <b>17-10-2025 / 04:23:pm </b><br><br>\r\n\r\n    <b>****** Información de la tasa del dolar actual:   ******</b><br>\r\n    Precio actual: <b>205.67 bs </b><br>\r\n    Fecha actual: <b>18-10-2025 / 09:04:pm </b><br>\r\n    ', 2),
(13, '2025-10-18 21:19:04', 'Cierre de sesión exitoso', 'El usuario ha cerrado sesión correctamente en el sistema.', 2),
(14, '2025-10-18 21:20:05', 'Inicio de sesión exitoso', 'El usuario ha iniciado sesión correctamente en el sistema.', 2),
(15, '2025-10-19 10:07:27', 'Inicio de sesión exitoso', 'El usuario ha iniciado sesión correctamente en el sistema.', 2),
(16, '2025-10-19 10:13:46', 'Cierre de sesión exitoso', 'El usuario ha cerrado sesión correctamente en el sistema.', 2),
(17, '2025-10-19 10:15:35', 'Inicio de sesión exitoso', 'El usuario ha iniciado sesión correctamente en el sistema.', 2),
(18, '2025-10-19 10:24:49', 'Cierre de sesión exitoso', 'El usuario ha cerrado sesión correctamente en el sistema.', 2),
(19, '2025-10-19 10:27:03', 'Inicio de sesión exitoso', 'El usuario ha iniciado sesión correctamente en el sistema.', 2),
(20, '2025-10-19 10:33:50', 'Cierre de sesión exitoso', 'El usuario ha cerrado sesión correctamente en el sistema.', 2),
(21, '2025-10-19 12:09:04', 'Inicio de sesión exitoso', 'El usuario ha iniciado sesión correctamente en el sistema.', 2),
(22, '2025-10-19 12:22:34', 'Cierre de sesión exitoso', 'El usuario ha cerrado sesión correctamente en el sistema.', 2),
(23, '2025-10-19 16:07:38', 'Inicio de sesión exitoso', 'El usuario ha iniciado sesión correctamente en el sistema.', 2),
(24, '2025-10-19 17:43:31', 'Registro exitoso de una presentación.', 'Se registro una presentación con la siguiente informacón: <br><br>\r\n        <b>****** Información de la presentación:   ******</b><br><br>\r\n        Nombre: <b> </b><br>\r\n        Descripción: <b> </b><br>\r\n        Estado: <b>Activo </b><br>\r\n        ', 2),
(25, '2025-10-19 17:45:58', 'Registro exitoso de una presentación.', 'Se registro una presentación con la siguiente informacón: <br><br>\r\n        <b>****** Información de la presentación:   ******</b><br><br>\r\n        Nombre: <b> </b><br>\r\n        Descripción: <b> </b><br>\r\n        Estado: <b>Activo </b><br>\r\n        ', 2),
(26, '2025-10-19 17:46:29', 'Registro exitoso de una presentación.', 'Se registro una presentación con la siguiente informacón: <br><br>\r\n        <b>****** Información de la presentación:   ******</b><br><br>\r\n        Nombre: <b> </b><br>\r\n        Descripción: <b> </b><br>\r\n        Estado: <b>Activo </b><br>\r\n        ', 2),
(27, '2025-10-19 18:48:55', 'Cierre de sesión exitoso', 'El usuario ha cerrado sesión correctamente en el sistema.', 2),
(28, '2025-10-19 18:49:32', 'Inicio de sesión exitoso', 'El usuario ha iniciado sesión correctamente en el sistema.', 2),
(29, '2025-10-19 18:49:43', 'Actualización exitosa de la tasa del dolar.', 'Se actualizó la tasa del dolar de manera automática. <br><br>\r\n    <b>****** Información de la tasa del dolar:   ******</b><br>\r\n    Precio anterior: <b>205.67 bs </b><br>\r\n    Fecha anterior: <b>18-10-2025 / 09:04:pm </b><br><br>\r\n\r\n    <b>****** Información de la tasa del dolar actual:   ******</b><br>\r\n    Precio actual: <b>205.67 bs </b><br>\r\n    Fecha actual: <b>19-10-2025 / 06:49:pm </b><br>\r\n    ', 2),
(30, '2025-10-19 18:56:45', 'Inicio de sesión exitoso', 'El usuario ha iniciado sesión correctamente en el sistema.', 2),
(31, '2025-10-19 19:46:53', 'Registro exitoso de una Marca.', 'Se registro una Marca con la siguiente información: <br><br>\r\n                <b>****** Información de la Marca:   ******</b><br><br>\r\n                Nombre: <b>Zyqa </b><br>\r\n                    Estado: <b>Activo </b><br><br>\r\n                    <b>*********************************************</b><br><br>', 2),
(32, '2025-10-19 20:42:43', 'Cierre de sesión exitoso', 'El usuario ha cerrado sesión correctamente en el sistema.', 2),
(33, '2025-10-20 18:52:43', 'Inicio de sesión exitoso', 'El usuario ha iniciado sesión correctamente en el sistema.', 2),
(34, '2025-10-20 18:58:05', 'Cierre de sesión exitoso', 'El usuario ha cerrado sesión correctamente en el sistema.', 2),
(35, '2025-10-20 18:59:03', 'Inicio de sesión exitoso', 'El usuario ha iniciado sesión correctamente en el sistema.', 2),
(36, '2025-10-20 19:11:38', 'Inicio de sesión exitoso', 'El usuario ha iniciado sesión correctamente en el sistema.', 2),
(37, '2025-10-20 19:16:09', 'Registro exitoso de una presentación.', 'Se registro una presentación con la siguiente informacón: <br><br>\r\n        <b>****** Información de la presentación:   ******</b><br><br>\r\n        Nombre: <b> </b><br>\r\n        Descripción: <b> </b><br>\r\n        Estado: <b>Activo </b><br>\r\n        ', 2),
(38, '2025-10-20 21:05:46', 'Registro Exitoso de uno o más Productos.', 'Se Registraron uno o más Productos con la Siguiente Información: <br><br>\r\n                    <b>****** Información de los productos:   ******</b><br><br>\r\n                    Nombre: <b>Polar Light </b><br>\r\n                Presentación: <b>295 Mililitro (ml) </b><br>\r\n                Categoría: <b>Bebidas Y Refrescos </b><br>\r\n                Marca: <b>Polar </b><br>\r\n                Porcentaje de IVA: <b>16%</b><br><br>\r\n                <b>*********************************************</b><br><br>\r\n        ', 2),
(39, '2025-10-20 22:25:06', 'Registro exitoso de una entrada.', 'Se Registro una Entrada con la Siguiente Informacón: <br><br>\r\n            <b>****** Información del Proveedor:   ******</b><br>\r\n                Cédula: <b>V-28587583</b><br>\r\n                Nombre y Apellido: <b>DANIEL JOSE BARRUETA</b><br>\r\n                Correo: <b>dbarrueta42@gmail.com</b><br>\r\n                Teléfono: <b>04125238909 </b><br>\r\n                Dirección: <b>SECTOR E GUASDUAL CALLE 1 </b><br><br>\r\n\r\n            <b>****** Información de la Entrada:   ******</b><br>\r\n            Total de la Compra ($): <b>50 $ </b><br>\r\n            Total de la Compra (Bs): <b>10187 bs</b><br>\r\n            Fecha y Hora: <b>20-10-2025 / 09:51:pm </b><br>\r\n            Tasa del dolar: <b>203.74 Bs </b><br>\r\n            <b>Para más detalles sobre la entrada, Ve a La Lista de Entradas </b><br>\r\n            ', 2),
(40, '2025-10-20 22:40:56', 'Registro exitoso de una entrada.', 'Se Registro una Entrada con la Siguiente Informacón: <br><br>\r\n            <b>****** Información del Proveedor:   ******</b><br>\r\n                Cédula / RIF: <b>V-16934956 </b><br>\r\n                Nombre: <b>EL CORRALITO </b><br>\r\n                Correo: <b>Corral@pollera.com </b><br>\r\n                Teléfono: <b>04122343443 </b><br>\r\n                Dirección: <b>ACARIGUA CALLE 3 AVENIDA 5 Y 7 </b><br><br>\r\n\r\n            <b>****** Información de la Entrada:   ******</b><br>\r\n            Total de la Compra ($): <b>75 $ </b><br>\r\n            Total de la Compra (Bs): <b>15280.5 bs</b><br>\r\n            Fecha y Hora: <b>20-10-2025 / 10:34:pm </b><br>\r\n            Tasa del dolar: <b>203.74 Bs </b><br>\r\n            <b>Para más detalles sobre la entrada, Ve a La Lista de Entradas </b><br>\r\n            ', 2),
(41, '2025-10-20 23:36:39', 'Cierre de sesión exitoso', 'El usuario ha cerrado sesión correctamente en el sistema.', 2),
(42, '2025-10-21 15:49:21', 'Inicio de sesión exitoso', 'El usuario ha iniciado sesión correctamente en el sistema.', 2),
(43, '2025-10-21 16:36:14', 'Actualización exitosa de la tasa del dolar.', 'Se actualizó la tasa del dolar de manera automática. <br><br>\r\n    <b>****** Información de la tasa del dolar:   ******</b><br>\r\n    Precio anterior: <b>205.67 bs </b><br>\r\n    Fecha anterior: <b>19-10-2025 / 06:49:pm </b><br><br>\r\n\r\n    <b>****** Información de la tasa del dolar actual:   ******</b><br>\r\n    Precio actual: <b>207.89 bs </b><br>\r\n    Fecha actual: <b>21-10-2025 / 04:36:pm </b><br>\r\n    ', 2),
(44, '2025-10-21 17:23:04', 'Registro exitoso de una Marca.', 'Se registro una Marca con la siguiente informacón: <br><br>\r\n        <b>****** Información de la presentación:   ******</b><br><br>\r\n        Nombre: <b>Nike </b><br>\r\n        ', 2),
(45, '2025-10-21 19:07:12', 'Cierre de sesión exitoso', 'El usuario ha cerrado sesión correctamente en el sistema.', 2),
(46, '2025-10-21 19:41:30', 'Inicio de sesión exitoso', 'El usuario ha iniciado sesión correctamente en el sistema.', 2),
(47, '2025-10-21 20:51:53', 'Cierre de sesión exitoso', 'El usuario ha cerrado sesión correctamente en el sistema.', 2),
(48, '2025-10-22 19:06:20', 'Inicio de sesión exitoso', 'El usuario ha iniciado sesión correctamente en el sistema.', 2),
(49, '2025-10-22 19:19:29', 'Actualización Exitosa de la Tasa del Dolar.', 'Se Actualizó la Tasa del Dolar de Manera automática.<br><br>\r\n        <b>****** Información de la Tasa del Dolar:   ******</b><br>\r\n        Precio anterior: <b>207.89 bs </b><br>\r\n        Fecha anterior: <b>21-10-2025 / 04:36:pm </b><br><br>\r\n\r\n        <b>****** Información de la Tasa del Dolar Actual:   ******</b><br>\r\n        Precio actual: <b>212.48 bs </b><br>\r\n        Fecha actual: <b>22-10-2025 / 07:19:pm</b><br>\r\n    ', 2),
(50, '2025-10-22 20:10:16', 'Registro exitoso de una entrada.', 'Se Registro una Entrada con la Siguiente Informacón: <br><br>\r\n            <b>****** Información del Usuario:   ******</b><br>\r\n                Cédula: <b>V-28587583</b><br>\r\n                Nombre y Apellido: <b>DANIEL JOSE BARRUETA</b><br>\r\n                Correo: <b>dbarrueta42@gmail.com</b><br>\r\n                Teléfono: <b>04125238909 </b><br>\r\n                Dirección: <b>SECTOR E GUASDUAL CALLE 1 </b><br><br>\r\n\r\n            <b>****** Información de la Entrada:   ******</b><br>\r\n            Total de la Compra ($): <b>20 $ </b><br>\r\n            Total de la Compra (Bs): <b>4240 bs</b><br>\r\n            Fecha y Hora: <b>22-10-2025 / 08:07:pm </b><br>\r\n            Tasa del dolar: <b>212.48 Bs </b><br>\r\n            <b>Para más detalles sobre la entrada, Ve a La Lista de Entradas </b><br>\r\n            ', 2),
(51, '2025-10-22 20:58:17', 'Modificación exitosa de un proveedor.', 'Se modificó un proveedor con la siguiente informacón: <br><br>\r\n        <b>****** Información original del proveedor:   ******</b><br><br>\r\n        Cédula / RIF: <b>V-16934956 </b><br>\r\n        Nombre: <b>EL CORRALITO </b><br>\r\n        Correo: <b>Corral@pollera.com </b><br>\r\n        Teléfono: <b>04122343443 </b><br>\r\n        Dirección: <b>ACARIGUA CALLE 3 AVENIDA 5 Y 7 </b><br><br>\r\n        <b>****** Información actual del proveedor:   ******</b><br><br>\r\n        Cédula / RIF: <b>R-16934956 </b><br>\r\n        Nombre: <b>EL CORRALITO </b><br>\r\n        Correo: <b>Corral@pollera.com </b><br>\r\n        Teléfono: <b>04122343443 </b><br>\r\n        Dirección: <b>ACARIGUA CALLE 3 AVENIDA 5 Y 7 </b><br>\r\n\r\n        ', 2),
(52, '2025-10-22 20:58:29', 'Modificación exitosa de un proveedor.', 'Se modificó un proveedor con la siguiente informacón: <br><br>\r\n        <b>****** Información original del proveedor:   ******</b><br><br>\r\n        Cédula / RIF: <b>R-16934956 </b><br>\r\n        Nombre: <b>EL CORRALITO </b><br>\r\n        Correo: <b>Corral@pollera.com </b><br>\r\n        Teléfono: <b>04122343443 </b><br>\r\n        Dirección: <b>ACARIGUA CALLE 3 AVENIDA 5 Y 7 </b><br><br>\r\n        <b>****** Información actual del proveedor:   ******</b><br><br>\r\n        Cédula / RIF: <b>J-16934956 </b><br>\r\n        Nombre: <b>EL CORRALITO </b><br>\r\n        Correo: <b>Corral@pollera.com </b><br>\r\n        Teléfono: <b>04122343443 </b><br>\r\n        Dirección: <b>ACARIGUA CALLE 3 AVENIDA 5 Y 7 </b><br>\r\n\r\n        ', 2),
(53, '2025-10-22 21:18:34', 'Cierre de sesión exitoso', 'El usuario ha cerrado sesión correctamente en el sistema.', 2),
(54, '2025-10-23 10:12:21', 'Inicio de sesión exitoso', 'El usuario ha iniciado sesión correctamente en el sistema.', 2),
(55, '2025-10-23 14:33:16', 'Cierre de sesión exitoso', 'El usuario ha cerrado sesión correctamente en el sistema.', 2),
(56, '2025-10-24 12:23:40', 'Inicio de sesión exitoso', 'El usuario ha iniciado sesión correctamente en el sistema.', 2),
(57, '2025-10-24 12:24:48', 'Inicio de sesión exitoso', 'El usuario ha iniciado sesión correctamente en el sistema.', 2),
(58, '2025-10-24 14:29:09', 'Registro Exitoso de una Presentación.', 'Se Registro una Presentación con la Siguiente Informacón: <br><br>\r\n                <b>****** Información de la Presentación:   ******</b><br><br>\r\n                Descripción: <b> Unidad (Und.)</b><br>\r\n                Estado: <b>Activo </b><br>\r\n            ', 2),
(59, '2025-10-24 14:30:05', 'Registro Exitoso de una Presentación.', 'Se Registro una Presentación con la Siguiente Informacón: <br><br>\r\n                <b>****** Información de la Presentación:   ******</b><br><br>\r\n                Descripción: <b>6 Unidad (Und.)</b><br>\r\n                Estado: <b>Activo </b><br>\r\n            ', 2),
(60, '2025-10-24 14:31:04', 'Registro exitoso de una Marca.', 'Se registro una Marca con la siguiente informacón: <br><br>\r\n                <b>****** Información de la Marca:   ******</b><br><br>\r\n                Nombre: <b>Puma </b><br>\r\n            ', 2),
(61, '2025-10-24 14:33:48', 'Registro Exitoso de uno o más Productos.', 'Se Registraron uno o más Productos con la Siguiente Información: <br><br>\r\n                    <b>****** Información de los productos:   ******</b><br><br>\r\n                    Nombre: <b>Polar Pilsen </b><br>\r\n                Presentación: <b>295 Mililitro (ml) </b><br>\r\n                Categoría: <b>Bebidas Y Refrescos </b><br>\r\n                Marca: <b>Polar </b><br>\r\n                Porcentaje de IVA: <b>16%</b><br><br>\r\n                <b>*********************************************</b><br><br>Nombre: <b>Malta </b><br>\r\n                Presentación: <b>400 Mililitro (ml) </b><br>\r\n                Categoría: <b>Bebidas Y Refrescos </b><br>\r\n                Marca: <b>Polar </b><br>\r\n                Porcentaje de IVA: <b>16%</b><br><br>\r\n                <b>*********************************************</b><br><br>\r\n        ', 2),
(62, '2025-10-24 14:36:37', 'Cierre de sesión exitoso', 'El usuario ha cerrado sesión correctamente en el sistema.', 2),
(63, '2025-10-24 15:42:23', 'Inicio de sesión exitoso', 'El usuario ha iniciado sesión correctamente en el sistema.', 2),
(64, '2025-10-24 19:16:18', 'Modificación exitosa de un proveedor.', 'Se modificó un proveedor con la siguiente informacón: <br><br>\r\n        <b>****** Información original del proveedor:   ******</b><br><br>\r\n        Cédula / RIF: <b>J-21065945 </b><br>\r\n        Nombre: <b>PROVEEDOR DE PRUEBA </b><br>\r\n        Correo: <b>proveedor@gmail.com </b><br>\r\n        Teléfono: <b>04123456789 </b><br>\r\n        Dirección: <b>PROVEEDOR AVENIDA 45 </b><br><br>\r\n        <b>****** Información actual del proveedor:   ******</b><br><br>\r\n        Cédula / RIF: <b>J-21065945 </b><br>\r\n        Nombre: <b>PROVEEDOR </b><br>\r\n        Correo: <b>proveedor@gmail.com </b><br>\r\n        Teléfono: <b>04123456789 </b><br>\r\n        Dirección: <b>PROVEEDOR AVENIDA 45 </b><br>\r\n\r\n        ', 2),
(65, '2025-10-24 20:05:54', 'Cierre de sesión exitoso', 'El usuario ha cerrado sesión correctamente en el sistema.', 2),
(66, '2025-10-25 11:29:42', 'Inicio de sesión exitoso', 'El usuario ha iniciado sesión correctamente en el sistema.', 2),
(67, '2025-10-25 11:45:53', 'Cierre de sesión exitoso', 'El usuario ha cerrado sesión correctamente en el sistema.', 2),
(68, '2025-10-25 17:54:00', 'Inicio de sesión exitoso', 'El usuario ha iniciado sesión correctamente en el sistema.', 2),
(69, '2025-10-25 17:54:28', 'Cierre de sesión exitoso', 'El usuario ha cerrado sesión correctamente en el sistema.', 2),
(70, '2025-10-25 17:55:27', 'Inicio de sesión exitoso', 'El usuario ha iniciado sesión correctamente en el sistema.', 2),
(71, '2025-10-25 18:09:42', 'Registro exitoso de un nuevo servicio.', 'Se registro un servicio con la siguiente informacón: <br><br>\r\n                <b>****** Información del servicio:   ******</b><br>\r\n                Nombre: <b>TRIO ICE </b><br>\r\n                Descripción: <b>COMBO DE POLAR ICE </b><br>\r\n                Precio ($): <b>6 $</b><br>\r\n                Estado: <b> Activo </b><br><br>\r\n\r\n            <label><b>Detalles del Servicio: </b></label><br><br>\r\n            <table class=\"table table-striped\">\r\n                <thead>\r\n                    <tr>\r\n                        <th class=\"col text-center\" scope=\"col\">Producto</th>\r\n                        <th class=\"col text-center\" scope=\"col\">Cantidad</th>\r\n                    </tr>\r\n                </thead>\r\n                <tbody>\r\n                    <tr>\r\n                            <td class=\"col text-start \" scope=\"col\">\r\n                                <p class=\"text-secondary fw-bold mb-1\">\r\n                                    Código: \r\n                                </p>\r\n                                <p class=\"text-primary fw-bold mb-1\">\r\n                                     - \r\n                                </p>\r\n                                <small class=\"d-block text-muted\">\r\n                                    Formato:  / \r\n                                </small>\r\n                                <small class=\"d-block text-muted\">\r\n                                    Categoría: \r\n                                </small>\r\n                            </td>\r\n                            <td class=\"text-center\">3</td>\r\n                        </tr>\r\n                </tbody>\r\n            </table>\r\n            <br><br>\r\n        ', 2),
(72, '2025-10-25 21:19:59', 'Modificación de un Servicio', 'El usuario actualizó la información de un servicio: <br><br>\r\n            <b>****** Información Original del Servicio:   ******</b><br>\r\n            Nombre del platillo: <b> TRIO ICE </b><br> \r\n            Precio en dolares: <b> 6$ </b><br> \r\n            Descripción: <b> COMBO DE POLAR ICE. </b><br> \r\n            Estado: <b> activo </b><br><br> \r\n\r\n            <b>*****************************************************</b><br> <br> \r\n            <b>********** Productos del Servicio Original: *********</b><br> \r\n            Código: <b>7590006700018</b><br>\r\n            Nombre: <b>Polar Ice Polar 295 Mililitro (ml)</b><br>\r\n            Cantidad: <b>3</b><br><br>\r\n\r\n            <b>*********************************************</b><br><br>\r\n\r\n            <b>****** Información del servicio actualizado:   ******</b><br> \r\n            Nombre del platillo: <b> TRIO ICE </b><br> \r\n            Precio en dolares:  <b> 6 $ </b><br> \r\n            Descripción:  <b> COMBO DE POLAR ICE </b><br> \r\n            Estado:  <b> activo </b><br> <br> \r\n\r\n            <b>*****************************************************</b><br> <br> \r\n            <b>********** Productos del servicio actualizado: *********</b><br> \r\n            Nombre: <b>Malta Polar 400 </b><br>\r\n                Cantidad: <b>3</b><br><br>\r\n                <b>*********************************************</b><br><br>\r\n            ', 2),
(73, '2025-10-25 21:33:33', 'Modificación de un Servicio', 'El usuario actualizó la información de un servicio: <br><br>\r\n\r\n            <b> Información Original del Servicio: </b><br>\r\n            Nombre del platillo: <b> TRIO ICE </b><br> \r\n            Precio en dolares: <b> 6$ </b><br> \r\n            Descripción: <b> COMBO DE POLAR ICE. </b><br> \r\n            Estado: <b> activo </b><br><br> \r\n            \r\n            <b>*****************************************************</b><br> <br> \r\n            <b>********** Productos del Servicio Original: *********</b><br> \r\n            Código: <b>7590006700020</b><br>\r\n            Nombre: <b>Malta</b><br>\r\n            Marca: <b>Polar</b><br>\r\n            Presentación: <b>400 Mililitro (ml)</b><br>\r\n            Categoría: <b>Bebidas y Refrescos</b><br>\r\n            Cantidad: <b>3</b><br><br>\r\n\r\n            <b>*********************************************</b><br><br>\r\n\r\n            <b>****** Información del servicio actualizado:   ******</b><br> \r\n            Nombre del platillo: <b> TRIO ICE </b><br> \r\n            Precio en dolares:  <b> 6 $ </b><br> \r\n            Descripción:  <b> COMBO DE POLAR ICE </b><br> \r\n            Estado:  <b> activo </b><br> <br> \r\n\r\n            <b>*****************************************************</b><br> <br> \r\n            <b>********** Productos del servicio actualizado: *********</b><br> \r\n            <p class=\"text-secondary fw-bold mb-1\">\r\n                    Código: 7590006700018\r\n                </p>\r\n                <p class=\"text-primary fw-bold mb-1\">\r\n                    Polar Ice - Polar\r\n                </p>\r\n                <small class=\"d-block text-muted\">\r\n                    Formato: 295 / Mililitro (ml)\r\n                </small>\r\n                <small class=\"d-block text-muted\">\r\n                    Categoría: Bebidas y Refrescos\r\n                </small>\r\n                <p class=\"text-primary fw-bold mb-1\">\r\n                    Cantidad: 3\r\n                </p>\r\n                <hr></hr><br>\r\n            ', 2),
(74, '2025-10-25 21:56:42', 'Modificación de un Servicio', '<p class=\"mb-3 text-primary-emphasis\"><i class=\"bi bi-exclamation-circle-fill\"></i>El usuario actualizó la información de un servicio: </p> \n\n            <h4 class=\"text-center card-title\"><b> Información Original del Servicio: </b></h4>\n            <p> Nombre del platillo: <b> TRIO ICE </b> </p> \n            <p> Precio en dolares: <b> 6 $ </b> </p>\n            <p> Descripción: <b> COMBO DE POLAR ICE. </b> </p> \n            <p> Estado: <b> activo </b> </p>\n            \n\n            <p class=\"card-title\">Productos del Servicio Original:</p>\n            <p class=\"text-secondary fw-bold mb-1\">\n                Código: 7590006700020\n            </p>\n            <p class=\"text-secondary fw-bold mb-1\">\n                Nombre: <span class=\"text-primary fw-bold mb-1\">Malta - Polar</span>\n            </p>\n            <p class=\"text-secondary fw-bold mb-1\">\n                Marca: Polar\n            </p>\n            <small class=\"d-block text-muted\">\n                Formato: 400 Mililitro (ml)\n            </small>\n            <small class=\"d-block text-muted\">\n                Categoría: Bebidas y Refrescos\n            </small>\n            <p class=\"text-primary fw-bold mb-1\">\n                Cantidad: 3\n            </p>\n            <hr></hr><br>\n\n            <h4 class=\"text-center card-title\"> <b> Información del Servicio Actualizado:  </b> </h4>\n            <p> Nombre del platillo: <b> TRIO ICE </b> </p> \n            <p> Precio en dolares: <b> 6 $ </b> </p>\n            <p> Descripción: <b> COMBO DE POLAR ICE. </b> </p> \n            <p> Estado: <b> activo </b> </p>\n\n            <p class=\"card-title\">Productos del servicio actualizado:</p>\n\n            <p class=\"text-secondary fw-bold mb-1\">\n                    Código: 7590006700020\n                </p>\n                <p class=\"text-secondary fw-bold mb-1\">\n                    Nombre: <span class=\"text-primary fw-bold mb-1\">Malta - Polar</span>\n                </p>\n                <p class=\"text-secondary fw-bold mb-1\">\n                    Marca: Polar\n                </p>\n                <small class=\"d-block text-muted\">\n                    Formato: 400 Mililitro (ml)\n                </small>\n                <small class=\"d-block text-muted\">\n                    Categoría: Bebidas y Refrescos\n                </small>\n                <p class=\"text-primary fw-bold mb-1\">\n                    Cantidad: 3\n                </p>\n                <hr></hr><br>\n\n            ', 2),
(75, '2025-10-25 22:01:28', 'Cierre de sesión exitoso', 'El usuario ha cerrado sesión correctamente en el sistema.', 2),
(76, '2025-10-26 10:58:02', 'Inicio de sesión exitoso', 'El usuario ha iniciado sesión correctamente en el sistema.', 2),
(77, '2025-10-26 10:59:15', 'Actualización Exitosa de la Tasa del Dolar.', 'Se Actualizó la Tasa del Dolar de Manera automática.<br><br>\r\n        <b>****** Información de la Tasa del Dolar:   ******</b><br>\r\n        Precio anterior: <b>212.48 bs </b><br>\r\n        Fecha anterior: <b>22-10-2025 / 07:19:pm </b><br><br>\r\n\r\n        <b>****** Información de la Tasa del Dolar Actual:   ******</b><br>\r\n        Precio actual: <b>216.37 bs </b><br>\r\n        Fecha actual: <b>26-10-2025 / 10:59:am</b><br>\r\n    ', 2),
(78, '2025-10-26 11:23:38', 'Venta realizada exitosamente.', 'Se registro una venta con la siguiente informacón: <br><br>\r\n        <b>****** Información del cliente:   ******</b><br>\r\n        Cédula: <b>V-28587583 </b><br>\r\n        Nombre: <b>DANIEL PICHARDO </b><br>\r\n        Teléfono: <b>04125238909 </b><br><br>\r\n\r\n        <b>****** Información de la Venta:   ******</b><br>\r\n        Subtotal ($): <b>20 $ </b><br>\r\n        Subtotal (Bs): <b>4327.4 bs</b><br>\r\n        Total de la compra en $ + IVA (16%): <b>23.2 $ </b><br>\r\n        Total de la compra en bs + IVA (16%): <b>5019.78 bs</b><br>\r\n        Fecha y hora: <b>26-10-2025 | 11:23:am </b><br>\r\n        Tasa de Cambio: <b>216.37 bs </b><br><br>\r\n\r\n        <b>****** Información del Usuario que realizó la venta:   ******</b><br>\r\n        Cédula: <b>V-28587583 </b><br>\r\n        Nombre: <b>DANIEL JOSE BARRUETA </b><br>\r\n        Correo: <b>dbarrueta42@gmail.com </b><br>\r\n        Teléfono: <b>04125238909 </b><br>\r\n    ', 2),
(79, '2025-10-26 13:21:02', 'Cierre de sesión exitoso', 'Se cerró la sesión del usuario debido a que se cumplío el tiempo de inactividad dentro del sistema.', 2),
(80, '2025-10-26 13:39:28', 'Inicio de sesión exitoso', 'El usuario ha iniciado sesión correctamente en el sistema.', 2),
(81, '2025-10-26 13:40:04', 'Cierre de sesión exitoso', 'El usuario ha cerrado sesión correctamente en el sistema.', 2),
(82, '2025-10-26 13:40:33', 'Inicio de sesión exitoso', 'El usuario ha iniciado sesión correctamente en el sistema.', 2),
(83, '2025-10-26 13:45:11', 'Cierre de sesión exitoso', 'El usuario ha cerrado sesión correctamente en el sistema.', 2),
(84, '2025-10-26 15:28:03', 'Inicio de sesión exitoso', 'El usuario ha iniciado sesión correctamente en el sistema.', 2),
(85, '2025-10-26 17:14:57', 'Modificación exitosa de un cliente.', 'Se modificó un cliente con la siguiente informacón: <br><br>\r\n        <b>****** Información original del cliente modificado:   ******</b><br><br>\r\n        Cédula: <b>V-15214817 </b><br>\r\n        Nombre: <b>JHOAN TORREZ </b><br>\r\n        Teléfono: <b>04128053290 </b><br><br>\r\n        <b>****** Información actualizada del cliente modificado:   ******</b><br><br>\r\n        Cédula: <b>E-15214817 </b><br>\r\n        Nombre: <b>JHOAN TORREZ </b><br>\r\n        Teléfono: <b>04128053290 </b><br>\r\n        ', 2),
(86, '2025-10-26 17:15:10', 'Modificación exitosa de un cliente.', 'Se modificó un cliente con la siguiente informacón: <br><br>\r\n        <b>****** Información original del cliente modificado:   ******</b><br><br>\r\n        Cédula: <b>E-15214817 </b><br>\r\n        Nombre: <b>JHOAN TORREZ </b><br>\r\n        Teléfono: <b>04128053290 </b><br><br>\r\n        <b>****** Información actualizada del cliente modificado:   ******</b><br><br>\r\n        Cédula: <b>V-15214817 </b><br>\r\n        Nombre: <b>JHOAN TORREZ </b><br>\r\n        Teléfono: <b>04128053290 </b><br>\r\n        ', 2),
(87, '2025-10-26 18:25:37', 'Cierre de sesión exitoso', 'El usuario ha cerrado sesión correctamente en el sistema.', 2),
(88, '2025-10-27 13:15:38', 'Inicio de sesión exitoso', 'El usuario ha iniciado sesión correctamente en el sistema.', 2),
(89, '2025-10-27 13:55:16', 'Cierre de sesión exitoso', 'El usuario ha cerrado sesión correctamente en el sistema.', 2),
(90, '2025-10-27 14:38:36', 'Inicio de sesión exitoso', 'El usuario ha iniciado sesión correctamente en el sistema.', 2),
(91, '2025-10-27 15:05:24', 'Modificación exitosa de las características de acceso de un usuario', '<p class=\"mb-3\"> Se Restableció el Acceso al Sistema del Usuario con la Siguiente Información: </p> \r\n            <h4 class=\"text-center card-title\"><b> Información del Usuario Modificado: </b></h4>\r\n            <p> Cédula: <b>V-30400015</b> </p> \r\n            <p> Nombre: <b>ANGEL ALIBARDI</b> </p>\r\n            <p> Apellido: <b>.</b> </p>             \r\n            <p class=\"card-title\">Información original:</p>\r\n            <p> Estado: <b>Activo</b></p> \r\n            <p> Rol asignado: <b>EMPLEADO</b></p>\r\n            <p> Bloqueado: <b>No.</b></p> \r\n            <p class=\"card-title\">Información Actual:</p>\r\n            <p> Estado: <b> Inactivo</b></p> \r\n            <p> Rol asignado: <b> EMPLEADO</b></p>\r\n            <p> Bloqueado: <b> No.</b></p>', 2),
(92, '2025-10-27 15:21:06', 'Modificación exitosa de las características de acceso de un usuario', '<p class=\"mb-3 text-primary-emphasis\"><i class=\"bi bi-exclamation-circle-fill\"></i>&nbsp;Se Restableció el Acceso al Sistema del Usuario con la Siguiente Información: </p> \r\n            <h4 class=\"text-center card-title\"><b> Información del Usuario Modificado: </b></h4>\r\n            <p> Cédula: <b>V-30400015</b> </p> \r\n            <p> Nombre y Apellido: <b>ANGEL ALIBARDI</b> </p>          \r\n            <p class=\"card-title\">Información original:</p>\r\n            <p> Estado: <span class=\"badge-text-bg-1\"><b>Inactivo</b></span></p> \r\n            <p> Rol asignado: <b>EMPLEADO</b></p>\r\n            <p> Bloqueado: <b>No</b></p> \r\n            <p class=\"card-title\">Información Actual:</p>\r\n            <p> Estado: <span class=\"badge-text-bg-1\"><b>Activo</b></span></p>\r\n            <p> Rol asignado: <b> EMPLEADO</b></p>\r\n            <p> Bloqueado: <b> No</b></p>', 2),
(93, '2025-10-27 15:21:54', 'Modificación exitosa de las características de acceso de un usuario', '<p class=\"mb-3 text-primary-emphasis\"><i class=\"bi bi-exclamation-circle-fill\"></i>&nbsp;Se Restableció el Acceso al Sistema del Usuario con la Siguiente Información: </p> \r\n            <h4 class=\"text-center card-title\"><b> Información del Usuario Modificado: </b></h4>\r\n            <p> Cédula: <b>V-30400015</b> </p> \r\n            <p> Nombre y Apellido: <b>ANGEL ALIBARDI</b> </p>          \r\n            <p class=\"card-title\">Información original:</p>\r\n            <p> Estado: <span class=\"badge-text-bg-success\"><b>Activo</b></span></p> \r\n            <p> Rol asignado: <b>EMPLEADO</b></p>\r\n            <p> Bloqueado: <b>No</b></p> \r\n            <p class=\"card-title\">Información Actual:</p>\r\n            <p> Estado: <span class=\"badge-text-bg-danger\"><b>Inactivo</b></span></p>\r\n            <p> Rol asignado: <b> EMPLEADO</b></p>\r\n            <p> Bloqueado: <b> No</b></p>', 2),
(94, '2025-10-27 15:22:54', 'Modificación exitosa de las características de acceso de un usuario', '<p class=\"mb-3 text-primary-emphasis\"><i class=\"bi bi-exclamation-circle-fill\"></i>&nbsp;Se Restableció el Acceso al Sistema del Usuario con la Siguiente Información: </p> \r\n            <h4 class=\"text-center card-title\"><b> Información del Usuario Modificado: </b></h4>\r\n            <p> Cédula: <b>V-30400015</b> </p> \r\n            <p> Nombre y Apellido: <b>ANGEL ALIBARDI</b> </p>          \r\n            <p class=\"card-title\">Información original:</p>\r\n            <p> Estado: <span class=\"badge text-bg-danger\"><b>Inactivo</b></span></p> \r\n            <p> Rol asignado: <b>EMPLEADO</b></p>\r\n            <p> Bloqueado: <b>No</b></p> \r\n            <p class=\"card-title\">Información Actual:</p>\r\n            <p> Estado: <span class=\"badge text-bg-success\"><b>Activo</b></span></p>\r\n            <p> Rol asignado: <b> EMPLEADO</b></p>\r\n            <p> Bloqueado: <b> No</b></p>', 2),
(95, '2025-10-27 15:23:27', 'Modificación exitosa del acceso de un usuario.', '<p class=\"mb-3 text-primary-emphasis\"><i class=\"bi bi-exclamation-circle-fill\"></i>&nbsp;Se Restableció el Acceso al Sistema del Usuario con la Siguiente Información: </p> \r\n            <h4 class=\"text-center card-title\"><b> Información del Usuario Modificado: </b></h4>\r\n            <p> Cédula: <b>V-30400015</b> </p> \r\n            <p> Nombre: <b>ANGEL</b> </p>\r\n            <p> Apellido: <b>ALIBARDI</b> </p>             \r\n            <p class=\"card-title\">Información original:</p>\r\n            <p> Estado: <span class=\"badge text-bg-success\"><b>Activo</b></span></p> \r\n            <p> Rol asignado: <b>EMPLEADO</b></p>\r\n            <p> Bloqueado: <b>No</b></p> \r\n            <p class=\"card-title\">Información Actual:</p>\r\n            <p> Estado: <span class=\"badge text-bg-success\"><b>Activo</b></span></p>\r\n            <p> Rol asignado: <b> EMPLEADO</b></p>\r\n            <p> Bloqueado: <b> No</b></p>', 2),
(96, '2025-10-27 15:36:45', 'Cambio exitoso del estado de un rol', 'El usuario cambió el estado del rol con la siguiente información: <br><br>\r\n        <b>***** Información del rol original: *****</b><br><br>\r\n        Nombre del rol:  <b>PASDASU </b><br><br>\r\n        Estado: <b>Activo</b> <br><br>\r\n        <b>***** Información del rol actualizada: *****</b><br><br>\r\n        Nombre del rol:  <b>PASDASU </b><br>\r\n        Estado: <b>Inactivo</b>', 2),
(97, '2025-10-27 16:23:58', 'Actualización Exitosa de la Tasa del Dolar.', 'Se Actualizó la Tasa del Dolar de Manera automática.<br><br>\r\n        <b>****** Información de la Tasa del Dolar:   ******</b><br>\r\n        Precio anterior: <b>216.37 bs </b><br>\r\n        Fecha anterior: <b>26-10-2025 / 10:59:am </b><br><br>\r\n\r\n        <b>****** Información de la Tasa del Dolar Actual:   ******</b><br>\r\n        Precio actual: <b>216.37 bs </b><br>\r\n        Fecha actual: <b>27-10-2025 / 04:23:pm</b><br>\r\n    ', 2),
(98, '2025-10-27 16:24:15', 'Cierre de sesión exitoso', 'El usuario ha cerrado sesión correctamente en el sistema.', 2),
(99, '2025-10-27 18:07:10', 'Inicio de sesión exitoso', 'El usuario ha iniciado sesión correctamente en el sistema.', 2),
(100, '2025-10-27 19:43:10', 'Actualización Exitosa de la Tasa del Dolar.', 'Se Actualizó la Tasa del Dolar de Manera automática.<br><br>\r\n        <b>****** Información de la Tasa del Dolar:   ******</b><br>\r\n        Precio anterior: <b>216.37 bs </b><br>\r\n        Fecha anterior: <b>27-10-2025 / 04:23:pm </b><br><br>\r\n\r\n        <b>****** Información de la Tasa del Dolar Actual:   ******</b><br>\r\n        Precio actual: <b>218.17 bs </b><br>\r\n        Fecha actual: <b>27-10-2025 / 07:43:pm</b><br>\r\n    ', 2),
(101, '2025-10-27 19:43:34', 'Cierre de sesión exitoso', 'El usuario ha cerrado sesión correctamente en el sistema.', 2),
(102, '2025-10-28 12:05:35', 'Inicio de sesión exitoso', 'El usuario ha iniciado sesión correctamente en el sistema.', 2),
(103, '2025-10-28 15:35:34', 'Intento de acceso no autorizado a la pantalla lista de roles.', 'Se ha registrado un intento de acceso incorrecto a la pantalla lista de roles por parte de un usuario sin los permisos necesarios. Por motivos de seguridad, el usuario fue redirigido a la pantalla de inicio.', 2),
(104, '2025-10-28 15:38:17', 'Intento de acceso no autorizado a la pantalla registro de roles.', 'Se ha registrado un intento de acceso incorrecto a la pantalla registro de roles por parte de un usuario sin los permisos necesarios. Por motivos de seguridad, el usuario fue redirigido a la pantalla de inicio.', 2),
(105, '2025-10-28 15:40:06', 'Intento de acceso no autorizado a la pantalla lista de roles.', 'Se ha registrado un intento de acceso incorrecto a la pantalla lista de roles por parte de un usuario sin los permisos necesarios. Por motivos de seguridad, el usuario fue redirigido a la pantalla de inicio.', 2),
(106, '2025-10-28 15:40:27', 'Intento de acceso no autorizado a la pantalla lista de roles.', 'Se ha registrado un intento de acceso incorrecto a la pantalla lista de roles por parte de un usuario sin los permisos necesarios. Por motivos de seguridad, el usuario fue redirigido a la pantalla de inicio.', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `id_categoria` int NOT NULL,
  `nombre` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NOT NULL,
  `descripcion` varchar(200) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `estado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`id_categoria`, `nombre`, `descripcion`, `estado`) VALUES
(6, 'Abarrotes y Despensa', 'Arroz, azúcar, café, enlatados, aceites, pastas.', 1),
(7, 'Lácteos y Refrigerados', 'Leche, yogur, queso, mantequilla, huevos, postres fríos.', 1),
(8, 'Carnes, Pescados y Aves', 'Pollo (fresco o congelado), res, cerdo, pescado (fileteado, entero).', 1),
(9, 'Frutas, Verduras y Hortalizas', 'Productos frescos, perecederos.', 1),
(10, 'Bebidas y Refrescos', 'Gaseosas, jugos, agua embotellada, cervezas, licores.', 1),
(11, 'Panadería y Repostería', 'Pan fresco, galletas, pasteles, bollería.', 1),
(12, 'Golosinas y Snacks', 'Caramelos, chicles, chocolates, papas fritas, helados.', 1),
(13, 'Alimentos Preparados/Servicios', 'Menús a la carta, delivery, comidas listas para llevar (ej. pollo asado).', 1),
(14, 'Congelados', 'Vegetales congelados, helados, pizzas, precocidos.', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `id_cliente` int NOT NULL,
  `cedula` varchar(11) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NOT NULL,
  `nombre` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NOT NULL,
  `telefono` varchar(11) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`id_cliente`, `cedula`, `nombre`, `telefono`) VALUES
(1, 'V-15214817', 'JHOAN TORREZ', '04128053290'),
(2, 'V-28587583', 'DANIEL PICHARDO', '04125238909'),
(4, 'V-14540481', 'MARÍA JOSÉ GIMENEZ', '04245494211'),
(7, 'V-28587506', 'ANTONIO', '04125231254');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `configuracion`
--

CREATE TABLE `configuracion` (
  `id` int NOT NULL,
  `c_preguntas` int NOT NULL,
  `c_caracteres` int NOT NULL,
  `c_numeros` int NOT NULL,
  `c_simbolos` int NOT NULL,
  `tiempo_inactividad` int NOT NULL,
  `intentos_inicio_sesion` tinyint NOT NULL,
  `porcentaje_iva` int NOT NULL,
  `porcentaje_ganancia` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `configuracion`
--

INSERT INTO `configuracion` (`id`, `c_preguntas`, `c_caracteres`, `c_numeros`, `c_simbolos`, `tiempo_inactividad`, `intentos_inicio_sesion`, `porcentaje_iva`, `porcentaje_ganancia`) VALUES
(1, 4, 9, 2, 2, 60, 3, 16, 30);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalles_entrada`
--

CREATE TABLE `detalles_entrada` (
  `id` int NOT NULL,
  `id_entrada` int NOT NULL,
  `id_producto` int NOT NULL,
  `cantidad_comprada` int NOT NULL,
  `precio_unitario_dolar` float NOT NULL,
  `precio_unitario_bs` float NOT NULL,
  `total_dolar` float NOT NULL,
  `total_bs` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `detalles_entrada`
--

INSERT INTO `detalles_entrada` (`id`, `id_entrada`, `id_producto`, `cantidad_comprada`, `precio_unitario_dolar`, `precio_unitario_bs`, `total_dolar`, `total_bs`) VALUES
(24, 35, 1, 10, 5, 1018.7, 50, 10187),
(25, 36, 1, 10, 5, 1018.7, 50, 10187),
(26, 37, 1, 10, 5, 1018.7, 50, 10187),
(27, 38, 1, 15, 5, 1018.7, 75, 15280.5),
(28, 39, 1, 10, 2, 424, 20, 4249.6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalles_menu`
--

CREATE TABLE `detalles_menu` (
  `id_detalles_menu` int NOT NULL,
  `id_producto` int NOT NULL,
  `cantidad` int NOT NULL,
  `id_menu` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `detalles_menu`
--

INSERT INTO `detalles_menu` (`id_detalles_menu`, `id_producto`, `cantidad`, `id_menu`) VALUES
(59, 1, 2, 23),
(60, 1, 2, 24),
(61, 10, 3, 25);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalles_pago`
--

CREATE TABLE `detalles_pago` (
  `id_detalle_pago` int NOT NULL,
  `id_venta` int NOT NULL,
  `metodo_pago` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NOT NULL,
  `referencia` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  `cantidad_abonada_dolares` float NOT NULL,
  `cantidad_abonada_bolivares` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `detalles_pago`
--

INSERT INTO `detalles_pago` (`id_detalle_pago`, `id_venta`, `metodo_pago`, `referencia`, `cantidad_abonada_dolares`, `cantidad_abonada_bolivares`) VALUES
(164, 1, 'Punto de Venta', NULL, 23.2, 5019.78);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalles_venta`
--

CREATE TABLE `detalles_venta` (
  `id_detalles_venta` int NOT NULL,
  `id_servicio` int DEFAULT NULL,
  `cantidad_servicio` int DEFAULT NULL,
  `precio_servicio_dolares` float DEFAULT NULL,
  `precio_servicio_bolivares` float DEFAULT NULL,
  `id_producto` int DEFAULT NULL,
  `cantidad` int DEFAULT NULL,
  `precio_unidad_dolares` float DEFAULT NULL,
  `precio_unidad_bolivares` float DEFAULT NULL,
  `id_venta` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `detalles_venta`
--

INSERT INTO `detalles_venta` (`id_detalles_venta`, `id_servicio`, `cantidad_servicio`, `precio_servicio_dolares`, `precio_servicio_bolivares`, `id_producto`, `cantidad`, `precio_unidad_dolares`, `precio_unidad_bolivares`, `id_venta`) VALUES
(1, 23, 2, 10, 2163.7, NULL, NULL, NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dolar`
--

CREATE TABLE `dolar` (
  `id_dolar` int NOT NULL,
  `dolar` float NOT NULL,
  `fecha_precio` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `dolar`
--

INSERT INTO `dolar` (`id_dolar`, `dolar`, `fecha_precio`) VALUES
(1, 203.74, '2025-10-17 16:12:24'),
(2, 203.74, '2025-10-17 16:13:43'),
(3, 203.75, '2025-10-17 16:23:20'),
(4, 205.67, '2025-10-18 21:04:00'),
(5, 205.67, '2025-10-19 18:49:43'),
(6, 207.89, '2025-10-21 16:36:13'),
(7, 212.48, '2025-10-22 19:19:28'),
(8, 216.37, '2025-10-26 10:59:15'),
(9, 216.37, '2025-10-27 16:23:58'),
(10, 218.17, '2025-10-27 19:43:10');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `entrada`
--

CREATE TABLE `entrada` (
  `id_entrada` int NOT NULL,
  `tipo_compra` tinyint NOT NULL,
  `id_proveedor` int DEFAULT NULL,
  `total_dolar` float NOT NULL,
  `total_bs` float NOT NULL,
  `fecha_entrada` datetime NOT NULL,
  `id_dolar` int DEFAULT NULL,
  `id_usuario` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `entrada`
--

INSERT INTO `entrada` (`id_entrada`, `tipo_compra`, `id_proveedor`, `total_dolar`, `total_bs`, `fecha_entrada`, `id_dolar`, `id_usuario`) VALUES
(35, 1, NULL, 50, 10187, '2025-10-20 21:51:55', 1, 2),
(36, 1, NULL, 50, 10187, '2025-10-20 21:51:55', 1, 2),
(37, 1, NULL, 50, 10187, '2025-10-20 21:51:55', 1, 2),
(38, 0, 1, 75, 15280.5, '2025-10-20 22:34:10', 1, 2),
(39, 1, NULL, 20, 4240, '2025-10-22 20:07:47', 7, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `funcion`
--

CREATE TABLE `funcion` (
  `id` int NOT NULL,
  `codigo` varchar(45) COLLATE utf8mb4_spanish2_ci NOT NULL COMMENT 'Código de la función (Ej: R_PRESENTACION, G_VENTA).',
  `descripcion` varchar(255) COLLATE utf8mb4_spanish2_ci NOT NULL COMMENT 'Descripción legible para la función (Ej: ''Registrar Presentación de Producto'').',
  `modulo` varchar(150) COLLATE utf8mb4_spanish2_ci NOT NULL COMMENT 'Agrupación (Ej: ''Inventario'', ''Ventas'', ''Proveedores'').'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `funcion`
--

INSERT INTO `funcion` (`id`, `codigo`, `descripcion`, `modulo`) VALUES
(1, 'r_proveedores', 'Registrar Nuevo Proveedor', 'Proveedores'),
(2, 'm_proveedores', 'Modificar Proveedor Existente', 'Proveedores'),
(3, 'l_proveedores', 'Listar Proveedores', 'Proveedores'),
(4, 'h_proveedores', 'Historial de Compras al Proveedor', 'Proveedores'),
(5, 'r_categoria', 'Registrar Nueva Categoría', 'Inventario'),
(6, 'm_categoria', 'Modificar Categoría Existente', 'Inventario'),
(7, 'l_categoria', 'Listar Categorías', 'Inventario'),
(8, 'r_presentacion', 'Registrar Nueva Presentación', 'Inventario'),
(9, 'm_presentacion', 'Modificar Presentación Existente', 'Inventario'),
(10, 'l_presentacion', 'Listar Presentaciones', 'Inventario'),
(11, 'r_marca', 'Registrar Nueva Marca', 'Inventario'),
(12, 'm_marca', 'Modificar Marca Existente', 'Inventario'),
(13, 'l_marca', 'Listar Marcas', 'Inventario'),
(14, 'r_productos', 'Registrar Nuevo Producto', 'Inventario'),
(15, 'l_productos', 'Listar Productos', 'Inventario'),
(16, 'r_entrada', 'Registrar Entrada (Compra) de Inventario', 'Inventario'),
(17, 'l_entrada', 'Listar Entradas de Inventario', 'Inventario'),
(18, 'g_venta', 'Generar Nueva Venta', 'Ventas'),
(19, 'd_venta', 'Ver Detalles de Venta', 'Ventas'),
(20, 'l_venta', 'Listar Todas las Ventas', 'Ventas'),
(21, 'f_venta', 'Generar Factura de Venta', 'Ventas'),
(22, 'est_venta', 'Estadísticas de Ventas', 'Ventas'),
(23, 'r_servicio', 'Registrar Nuevo Servicio', 'Servicios'),
(24, 'm_servicio', 'Modificar Servicio Existente', 'Servicios'),
(25, 'l_servicio', 'Listar Servicios', 'Servicios'),
(26, 'r_cliente', 'Registrar Nuevo Cliente', 'Clientes'),
(27, 'm_cliente', 'Modificar Cliente Existente', 'Clientes'),
(28, 'l_cliente', 'Listar Clientes', 'Clientes'),
(29, 'h_cliente', 'Historial de Compras del Cliente', 'Clientes'),
(30, 'f_cliente', 'Factura del Cliente (Acceso Rápido)', 'Clientes'),
(31, 'r_empleado', 'Registrar Nuevo Empleado', 'Recursos Humanos'),
(32, 'm_empleado', 'Modificar Empleado Existente', 'Recursos Humanos'),
(33, 'l_empleado', 'Listar Empleados', 'Recursos Humanos'),
(34, 'r_rol', 'Registrar Nuevo Rol', 'Configuración'),
(35, 'm_rol', 'Modificar Rol Existente', 'Configuración'),
(36, 'l_rol', 'Listar Roles', 'Configuración'),
(37, 'm_cant_pregunta_seguridad', 'Modificar Cantidad de Preguntas de Seguridad', 'Seguridad'),
(38, 'm_tiempo_sesion', 'Modificar Tiempo Máximo de Sesión', 'Seguridad'),
(39, 'm_cant_caracteres', 'Modificar Cantidad Mínima de Caracteres de Contraseña', 'Seguridad'),
(40, 'm_cant_simbolos', 'Modificar Cantidad Mínima de Símbolos en Contraseña', 'Seguridad'),
(41, 'm_cant_num', 'Modificar Cantidad Mínima de Números en Contraseña', 'Seguridad'),
(42, 'intentos_inicio_sesion', 'Modificar Intentos de Inicio de Sesión Fallidos', 'Seguridad'),
(43, 'v_bitacora', 'Ver Bitácora (Registro de Actividad)', 'Auditoría'),
(44, 'm_bitacora', 'Modificar/Limpiar Bitácora', 'Auditoría');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `funciones_rol`
--

CREATE TABLE `funciones_rol` (
  `id` int NOT NULL,
  `id_rol` int NOT NULL,
  `id_funcion` int NOT NULL,
  `fecha_asignacion` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `funciones_rol`
--

INSERT INTO `funciones_rol` (`id`, `id_rol`, `id_funcion`, `fecha_asignacion`) VALUES
(1, 1, 1, '2025-10-28 15:20:33'),
(2, 1, 2, '2025-10-28 15:20:33'),
(3, 1, 3, '2025-10-28 15:20:33'),
(4, 1, 4, '2025-10-28 15:20:33'),
(5, 1, 5, '2025-10-28 15:20:33'),
(6, 1, 6, '2025-10-28 15:20:33'),
(7, 1, 7, '2025-10-28 15:20:33'),
(8, 1, 8, '2025-10-28 15:20:33'),
(9, 1, 9, '2025-10-28 15:20:33'),
(10, 1, 10, '2025-10-28 15:20:33'),
(11, 1, 11, '2025-10-28 15:20:33'),
(12, 1, 12, '2025-10-28 15:20:33'),
(13, 1, 13, '2025-10-28 15:20:33'),
(14, 1, 14, '2025-10-28 15:20:33'),
(15, 1, 15, '2025-10-28 15:20:33'),
(16, 1, 16, '2025-10-28 15:20:33'),
(17, 1, 17, '2025-10-28 15:20:33'),
(18, 1, 18, '2025-10-28 15:20:33'),
(19, 1, 19, '2025-10-28 15:20:33'),
(20, 1, 20, '2025-10-28 15:20:33'),
(21, 1, 21, '2025-10-28 15:20:33'),
(22, 1, 22, '2025-10-28 15:20:33'),
(23, 1, 23, '2025-10-28 15:20:33'),
(24, 1, 24, '2025-10-28 15:20:33'),
(25, 1, 25, '2025-10-28 15:20:33'),
(26, 1, 26, '2025-10-28 15:20:33'),
(27, 1, 27, '2025-10-28 15:20:33'),
(28, 1, 28, '2025-10-28 15:20:33'),
(29, 1, 29, '2025-10-28 15:20:33'),
(30, 1, 30, '2025-10-28 15:20:33'),
(31, 1, 31, '2025-10-28 15:20:33'),
(32, 1, 32, '2025-10-28 15:20:33'),
(33, 1, 33, '2025-10-28 15:20:33'),
(34, 1, 34, '2025-10-28 15:20:33'),
(35, 1, 35, '2025-10-28 15:20:33'),
(36, 1, 36, '2025-10-28 15:20:33'),
(37, 1, 37, '2025-10-28 15:20:33'),
(38, 1, 38, '2025-10-28 15:20:33'),
(39, 1, 39, '2025-10-28 15:20:33'),
(40, 1, 40, '2025-10-28 15:20:33'),
(41, 1, 41, '2025-10-28 15:20:33'),
(42, 1, 42, '2025-10-28 15:20:33'),
(43, 1, 43, '2025-10-28 15:20:33'),
(44, 1, 44, '2025-10-28 15:20:33'),
(64, 2, 1, '2025-10-28 15:21:12'),
(65, 2, 2, '2025-10-28 15:21:12'),
(66, 2, 3, '2025-10-28 15:21:12'),
(67, 2, 4, '2025-10-28 15:21:12'),
(68, 2, 5, '2025-10-28 15:21:12'),
(69, 2, 6, '2025-10-28 15:21:12'),
(70, 2, 7, '2025-10-28 15:21:12'),
(71, 2, 8, '2025-10-28 15:21:12'),
(72, 2, 9, '2025-10-28 15:21:12'),
(73, 2, 10, '2025-10-28 15:21:12'),
(74, 2, 11, '2025-10-28 15:21:12'),
(75, 2, 12, '2025-10-28 15:21:12'),
(76, 2, 13, '2025-10-28 15:21:12'),
(77, 2, 14, '2025-10-28 15:21:12'),
(78, 2, 15, '2025-10-28 15:21:12'),
(79, 2, 16, '2025-10-28 15:21:12'),
(80, 2, 17, '2025-10-28 15:21:12'),
(81, 2, 18, '2025-10-28 15:21:12'),
(82, 2, 19, '2025-10-28 15:21:12'),
(83, 2, 20, '2025-10-28 15:21:12'),
(84, 2, 21, '2025-10-28 15:21:12'),
(85, 2, 22, '2025-10-28 15:21:12'),
(86, 2, 23, '2025-10-28 15:21:12'),
(87, 2, 24, '2025-10-28 15:21:12'),
(88, 2, 25, '2025-10-28 15:21:12'),
(89, 2, 26, '2025-10-28 15:21:12'),
(90, 2, 27, '2025-10-28 15:21:12'),
(91, 2, 28, '2025-10-28 15:21:12'),
(92, 2, 29, '2025-10-28 15:21:12'),
(93, 2, 30, '2025-10-28 15:21:12'),
(94, 2, 31, '2025-10-28 15:21:12'),
(95, 2, 32, '2025-10-28 15:21:12'),
(96, 2, 33, '2025-10-28 15:21:12'),
(97, 2, 34, '2025-10-28 15:21:12'),
(98, 2, 35, '2025-10-28 15:21:12'),
(99, 2, 36, '2025-10-28 15:21:12'),
(100, 2, 37, '2025-10-28 15:21:12'),
(101, 2, 38, '2025-10-28 15:21:12'),
(102, 2, 39, '2025-10-28 15:21:12'),
(103, 2, 40, '2025-10-28 15:21:12'),
(104, 2, 41, '2025-10-28 15:21:12'),
(105, 2, 42, '2025-10-28 15:21:12'),
(106, 2, 43, '2025-10-28 15:21:12'),
(107, 2, 44, '2025-10-28 15:21:12');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marca`
--

CREATE TABLE `marca` (
  `id` int NOT NULL,
  `nombre` varchar(150) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `estado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `marca`
--

INSERT INTO `marca` (`id`, `nombre`, `estado`) VALUES
(1, 'Coca-Cola', 1),
(2, 'Pepsi', 1),
(3, 'Polar', 1),
(4, 'Zulia', 1),
(6, 'Minalba', 1),
(17, 'GLUP', 1),
(18, 'CHINOTTO', 1),
(19, '7 UP', 1),
(20, 'Mary', 1),
(21, 'Pollos Victorias', 1),
(22, 'Pollos Frigoven', 1),
(23, 'Pollo Don Pollo', 1),
(24, 'Pollos Tuti', 1),
(33, 'Sin Marca', 1),
(37, 'Malta', 1),
(39, 'Nike', 1),
(40, 'Puma', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `menu`
--

CREATE TABLE `menu` (
  `id_menu` int NOT NULL,
  `nombre_platillo` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NOT NULL,
  `precio_dolar` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NOT NULL,
  `descripcion` varchar(70) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NOT NULL,
  `estatus` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `menu`
--

INSERT INTO `menu` (`id_menu`, `nombre_platillo`, `precio_dolar`, `descripcion`, `estatus`) VALUES
(23, 'COM REFRESCO', '10', 'REFRESCATE', 1),
(24, 'DUBLA ICE', '4', 'COMBO DE POLAR ICE', 1),
(25, 'TRIO ICE', '6', 'COMBO DE POLAR ICE', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `preguntas_secretas`
--

CREATE TABLE `preguntas_secretas` (
  `id` int NOT NULL,
  `id_pregunta` int NOT NULL,
  `respuesta` varchar(80) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NOT NULL,
  `numero_pregunta` int NOT NULL,
  `id_usuario` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `preguntas_secretas`
--

INSERT INTO `preguntas_secretas` (`id`, `id_pregunta`, `respuesta`, `numero_pregunta`, `id_usuario`) VALUES
(1, 1, 'd6KUjQ==', 1, 1),
(2, 1, 'hqiWoZY=', 1, 2),
(3, 2, 'hqiWoZY=', 2, 2),
(4, 4, 'hqiWoZY=', 3, 2),
(11, 2, 'hqiWoZY=', 1, 7),
(12, 1, 'hqiWoZY=', 2, 7),
(13, 3, 'hqiWoZY=', 3, 7),
(29, 3, 'hqiWoZY=', 4, 2),
(30, 4, 'hqiWoZY=', 3, 2),
(31, 3, 'hqiWoZY=', 3, 7);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `presentacion`
--

CREATE TABLE `presentacion` (
  `id` int NOT NULL,
  `cantidad` varchar(5) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NOT NULL,
  `id_representacion` int NOT NULL,
  `estado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `presentacion`
--

INSERT INTO `presentacion` (`id`, `cantidad`, `id_representacion`, `estado`) VALUES
(1, '1', 5, 1),
(2, '1.5', 5, 1),
(3, '2', 5, 1),
(4, '400', 4, 1),
(5, '25', 2, 1),
(6, '125', 2, 1),
(7, '600', 4, 1),
(19, '1.25', 1, 1),
(20, '295', 4, 1),
(21, '355', 4, 1),
(22, '473', 4, 1),
(23, '222', 4, 1),
(24, '330', 4, 1),
(25, '3', 5, 1),
(45, '2', 3, 1),
(46, '1', 3, 1),
(47, '3', 3, 1),
(48, '12', 1, 1),
(49, '6', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `id_producto` int NOT NULL,
  `codigo` bigint DEFAULT NULL,
  `nombre_producto` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NOT NULL,
  `id_marca` int NOT NULL,
  `id_presentacion` int NOT NULL,
  `id_categoria` int NOT NULL,
  `stock_actual` int DEFAULT NULL,
  `precio_venta` float DEFAULT NULL,
  `fecha_ultima_actualizacion` datetime NOT NULL,
  `estado` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`id_producto`, `codigo`, `nombre_producto`, `id_marca`, `id_presentacion`, `id_categoria`, `stock_actual`, `precio_venta`, `fecha_ultima_actualizacion`, `estado`) VALUES
(1, 7590006700018, 'Polar Ice', 3, 20, 10, 6, 2.92, '2025-10-22 20:07:47', 1),
(8, 7590006700019, 'Polar Light', 3, 20, 10, 0, NULL, '2025-10-20 21:05:46', 0),
(9, 7590006700017, 'Polar Pilsen', 3, 20, 10, 0, NULL, '2025-10-24 14:33:47', 0),
(10, 7590006700020, 'Malta', 3, 4, 10, 0, NULL, '2025-10-24 14:33:48', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedor`
--

CREATE TABLE `proveedor` (
  `id_proveedor` int NOT NULL,
  `cedula_rif` varchar(11) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NOT NULL,
  `nombre` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NOT NULL,
  `correo` varchar(70) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NOT NULL,
  `direccion` varchar(70) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NOT NULL,
  `telefono` varchar(11) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `proveedor`
--

INSERT INTO `proveedor` (`id_proveedor`, `cedula_rif`, `nombre`, `correo`, `direccion`, `telefono`) VALUES
(1, 'J-16934956', 'EL CORRALITO', 'Corral@pollera.com', 'ACARIGUA CALLE 3 AVENIDA 5 Y 7', '04122343443'),
(25, 'J-21065945', 'PROVEEDOR', 'proveedor@gmail.com', 'PROVEEDOR AVENIDA 45', '04123456789');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `representacion`
--

CREATE TABLE `representacion` (
  `id` int NOT NULL,
  `nombre` varchar(100) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `descripcion` varchar(200) COLLATE utf8mb4_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `representacion`
--

INSERT INTO `representacion` (`id`, `nombre`, `descripcion`) VALUES
(1, 'Unidad (Und.)', 'Producto individual (ej. una lata de atún, un yogur).'),
(2, 'Gramo (gr)', 'Productos a granel, carnes, quesos, embutidos.'),
(3, 'Kilogramo (Kg)', 'Productos a granel, carnes, quesos, embutidos.'),
(4, 'Mililitro (ml)', 'Refrescos, jugos, leche, aceite, salsas.'),
(5, 'Litro (Lt)', 'Refrescos, jugos, leche, aceite, salsas.'),
(6, 'Empaque/Bolsa', 'Papas fritas, galletas, granos, café molido.'),
(7, 'Six-pack / Multi-pack', 'Cervezas, gaseosas pequeñas, yogures bebibles.'),
(8, 'Porción / Ración', 'Venta de comidas preparadas (ej. porción de pollo asado).'),
(9, 'Caja', 'Contenedor de varias unidades (ej. caja de 12 latas).'),
(10, 'Bote / Lata', 'Atún, conservas, gaseosas individuales.'),
(11, 'Bandeja', 'Carnes pre-empacadas, huevos.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `id_rol` int NOT NULL,
  `nombre` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NOT NULL,
  `estado` tinyint NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`id_rol`, `nombre`, `estado`) VALUES
(1, 'DESARROLLADOR', 1),
(2, 'ADIMINISTRADOR', 1),
(3, 'EMPLEADO', 1),
(4, 'PROVEEDOR', 1),
(7, 'PASANTE', 0),
(15, 'ROL PRUEBA', 0),
(16, 'PASDASU', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `seguridad`
--

CREATE TABLE `seguridad` (
  `id_seguridad` int NOT NULL,
  `pregunta` varchar(80) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `seguridad`
--

INSERT INTO `seguridad` (`id_seguridad`, `pregunta`) VALUES
(1, '9hKToYSUUnWEdXOVmGOWgX10hphwkIhohoVShKWZmYiac1B/daaTm5eJcQ=='),
(2, '9hKVmmOZh3VSgKiXjZVogHF1faJwoJhof3F2hpiP'),
(3, '9hKem5CKhHVSeJhwoJhof3V8g6VwjZCReX9SeJhwmIRoe354daGTlYSH'),
(4, '9hKToYSUUnWFVJicbJGXf3KEeXOUkWOUc1B1faiUjYdodn+AeJhwmoSLe4OGeZI=');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int NOT NULL,
  `cedula` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NOT NULL,
  `nombre` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NOT NULL,
  `apellido` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NOT NULL,
  `correo` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NOT NULL,
  `contraseña` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NOT NULL,
  `telefono` varchar(11) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NOT NULL,
  `direccion` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NOT NULL,
  `ultima_sesion` datetime DEFAULT NULL,
  `sesion_activa` tinyint NOT NULL,
  `bloqueado` tinyint NOT NULL,
  `primer_inicio` tinyint(1) NOT NULL,
  `id_rol` int NOT NULL,
  `estado` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `cedula`, `nombre`, `apellido`, `correo`, `contraseña`, `telefono`, `direccion`, `ultima_sesion`, `sesion_activa`, `bloqueado`, `primer_inicio`, `id_rol`, `estado`) VALUES
(1, 'V-30270578', 'MANUEL', 'TORREZ', 'SHAUDITONUEL@GMAIL.COM', 'h7uxwaexpp9jZoY=', '04128053240', 'TURÉN LINDA', NULL, 0, 0, 1, 2, 1),
(2, 'V-28587583', 'DANIEL JOSE', 'BARRUETA', 'dbarrueta42@gmail.com', 'f7TEwLx6YnBT', '04125238909', 'SECTOR E GUASDUAL CALLE 1', '2025-10-28 12:05:35', 1, 0, 0, 2, 1),
(5, 'V-30400015', 'ANGEL', 'ALIBARDI', 'angeldaniel231041@gmail.com', 'Z4OEfHN4Y2U=', '04122343434', 'BARRIO EL PAEZ', NULL, 0, 0, 1, 3, 1),
(7, 'V-12345678', 'ADMIN', 'PRUEBA', 'admin@gmail.com', 'dbe9tbF5ZGNm', '04123456548', 'ANDRES ELOY NEGRO', '2025-09-29 08:52:40', 0, 0, 0, 2, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `venta`
--

CREATE TABLE `venta` (
  `id_venta` int NOT NULL,
  `fecha_venta` datetime NOT NULL,
  `sub_total_dolares` float NOT NULL,
  `sub_total_bs` float NOT NULL,
  `monto_total_dolares` float NOT NULL,
  `monto_total_bolivares` float NOT NULL,
  `id_usuario` int NOT NULL,
  `id_cliente` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `venta`
--

INSERT INTO `venta` (`id_venta`, `fecha_venta`, `sub_total_dolares`, `sub_total_bs`, `monto_total_dolares`, `monto_total_bolivares`, `id_usuario`, `id_cliente`) VALUES
(1, '2025-10-26 11:23:37', 20, 4327.4, 23.2, 5019.78, 2, 2);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `bitacora`
--
ALTER TABLE `bitacora`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id_categoria`),
  ADD UNIQUE KEY `nombre` (`nombre`);

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id_cliente`);

--
-- Indices de la tabla `configuracion`
--
ALTER TABLE `configuracion`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `detalles_entrada`
--
ALTER TABLE `detalles_entrada`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_entrada` (`id_entrada`),
  ADD KEY `id_producto` (`id_producto`);

--
-- Indices de la tabla `detalles_menu`
--
ALTER TABLE `detalles_menu`
  ADD PRIMARY KEY (`id_detalles_menu`),
  ADD KEY `id_producto` (`id_producto`),
  ADD KEY `id_menu` (`id_menu`);

--
-- Indices de la tabla `detalles_pago`
--
ALTER TABLE `detalles_pago`
  ADD PRIMARY KEY (`id_detalle_pago`),
  ADD UNIQUE KEY `referencia` (`referencia`),
  ADD KEY `id_venta` (`id_venta`);

--
-- Indices de la tabla `detalles_venta`
--
ALTER TABLE `detalles_venta`
  ADD PRIMARY KEY (`id_detalles_venta`),
  ADD KEY `id_producto` (`id_producto`),
  ADD KEY `id_venta` (`id_venta`),
  ADD KEY `id_servicio` (`id_servicio`);

--
-- Indices de la tabla `dolar`
--
ALTER TABLE `dolar`
  ADD PRIMARY KEY (`id_dolar`);

--
-- Indices de la tabla `entrada`
--
ALTER TABLE `entrada`
  ADD PRIMARY KEY (`id_entrada`),
  ADD KEY `id_proveedor` (`id_proveedor`),
  ADD KEY `id_dolar` (`id_dolar`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `funcion`
--
ALTER TABLE `funcion`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `codigo` (`codigo`);

--
-- Indices de la tabla `funciones_rol`
--
ALTER TABLE `funciones_rol`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_rol` (`id_rol`),
  ADD KEY `id_funcion` (`id_funcion`);

--
-- Indices de la tabla `marca`
--
ALTER TABLE `marca`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD UNIQUE KEY `nombre` (`nombre`);

--
-- Indices de la tabla `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id_menu`),
  ADD UNIQUE KEY `nombre_platillo` (`nombre_platillo`);

--
-- Indices de la tabla `preguntas_secretas`
--
ALTER TABLE `preguntas_secretas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_pregunta` (`id_pregunta`);

--
-- Indices de la tabla `presentacion`
--
ALTER TABLE `presentacion`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_representacion` (`id_representacion`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`id_producto`),
  ADD UNIQUE KEY `codigo` (`codigo`),
  ADD KEY `id_categoria` (`id_categoria`),
  ADD KEY `id_presentacion` (`id_presentacion`),
  ADD KEY `id_marca` (`id_marca`);

--
-- Indices de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  ADD PRIMARY KEY (`id_proveedor`),
  ADD UNIQUE KEY `cedula_rif` (`cedula_rif`),
  ADD UNIQUE KEY `correo` (`correo`),
  ADD UNIQUE KEY `telefono` (`telefono`);

--
-- Indices de la tabla `representacion`
--
ALTER TABLE `representacion`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`id_rol`),
  ADD UNIQUE KEY `nombre` (`nombre`);

--
-- Indices de la tabla `seguridad`
--
ALTER TABLE `seguridad`
  ADD PRIMARY KEY (`id_seguridad`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`),
  ADD UNIQUE KEY `correo` (`correo`),
  ADD UNIQUE KEY `cedula` (`cedula`),
  ADD KEY `id_rol` (`id_rol`);

--
-- Indices de la tabla `venta`
--
ALTER TABLE `venta`
  ADD PRIMARY KEY (`id_venta`),
  ADD KEY `id_cliente` (`id_cliente`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `bitacora`
--
ALTER TABLE `bitacora`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=107;

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id_categoria` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id_cliente` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `configuracion`
--
ALTER TABLE `configuracion`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `detalles_entrada`
--
ALTER TABLE `detalles_entrada`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT de la tabla `detalles_menu`
--
ALTER TABLE `detalles_menu`
  MODIFY `id_detalles_menu` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT de la tabla `detalles_pago`
--
ALTER TABLE `detalles_pago`
  MODIFY `id_detalle_pago` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=165;

--
-- AUTO_INCREMENT de la tabla `detalles_venta`
--
ALTER TABLE `detalles_venta`
  MODIFY `id_detalles_venta` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `dolar`
--
ALTER TABLE `dolar`
  MODIFY `id_dolar` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `entrada`
--
ALTER TABLE `entrada`
  MODIFY `id_entrada` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT de la tabla `funcion`
--
ALTER TABLE `funcion`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT de la tabla `funciones_rol`
--
ALTER TABLE `funciones_rol`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=127;

--
-- AUTO_INCREMENT de la tabla `marca`
--
ALTER TABLE `marca`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT de la tabla `menu`
--
ALTER TABLE `menu`
  MODIFY `id_menu` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de la tabla `preguntas_secretas`
--
ALTER TABLE `preguntas_secretas`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT de la tabla `presentacion`
--
ALTER TABLE `presentacion`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `id_producto` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  MODIFY `id_proveedor` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT de la tabla `representacion`
--
ALTER TABLE `representacion`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `rol`
--
ALTER TABLE `rol`
  MODIFY `id_rol` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `seguridad`
--
ALTER TABLE `seguridad`
  MODIFY `id_seguridad` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `venta`
--
ALTER TABLE `venta`
  MODIFY `id_venta` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `bitacora`
--
ALTER TABLE `bitacora`
  ADD CONSTRAINT `bitacora_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `detalles_entrada`
--
ALTER TABLE `detalles_entrada`
  ADD CONSTRAINT `detalles_entrada_ibfk_1` FOREIGN KEY (`id_producto`) REFERENCES `producto` (`id_producto`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detalles_entrada_ibfk_2` FOREIGN KEY (`id_entrada`) REFERENCES `entrada` (`id_entrada`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `detalles_menu`
--
ALTER TABLE `detalles_menu`
  ADD CONSTRAINT `detalles_menu_ibfk_1` FOREIGN KEY (`id_menu`) REFERENCES `menu` (`id_menu`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detalles_menu_ibfk_2` FOREIGN KEY (`id_producto`) REFERENCES `producto` (`id_producto`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `detalles_pago`
--
ALTER TABLE `detalles_pago`
  ADD CONSTRAINT `detalles_pago_ibfk_1` FOREIGN KEY (`id_venta`) REFERENCES `venta` (`id_venta`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `detalles_venta`
--
ALTER TABLE `detalles_venta`
  ADD CONSTRAINT `detalles_venta_ibfk_1` FOREIGN KEY (`id_venta`) REFERENCES `venta` (`id_venta`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detalles_venta_ibfk_2` FOREIGN KEY (`id_servicio`) REFERENCES `menu` (`id_menu`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detalles_venta_ibfk_3` FOREIGN KEY (`id_producto`) REFERENCES `producto` (`id_producto`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `entrada`
--
ALTER TABLE `entrada`
  ADD CONSTRAINT `entrada_ibfk_1` FOREIGN KEY (`id_proveedor`) REFERENCES `proveedor` (`id_proveedor`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `entrada_ibfk_2` FOREIGN KEY (`id_dolar`) REFERENCES `dolar` (`id_dolar`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `entrada_ibfk_3` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `funciones_rol`
--
ALTER TABLE `funciones_rol`
  ADD CONSTRAINT `funciones_rol_ibfk_1` FOREIGN KEY (`id_funcion`) REFERENCES `funcion` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `funciones_rol_ibfk_2` FOREIGN KEY (`id_rol`) REFERENCES `rol` (`id_rol`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `preguntas_secretas`
--
ALTER TABLE `preguntas_secretas`
  ADD CONSTRAINT `preguntas_secretas_ibfk_1` FOREIGN KEY (`id_pregunta`) REFERENCES `seguridad` (`id_seguridad`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `preguntas_secretas_ibfk_2` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `presentacion`
--
ALTER TABLE `presentacion`
  ADD CONSTRAINT `presentacion_ibfk_1` FOREIGN KEY (`id_representacion`) REFERENCES `representacion` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `producto_ibfk_1` FOREIGN KEY (`id_categoria`) REFERENCES `categoria` (`id_categoria`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `producto_ibfk_2` FOREIGN KEY (`id_presentacion`) REFERENCES `presentacion` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `producto_ibfk_3` FOREIGN KEY (`id_marca`) REFERENCES `marca` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`id_rol`) REFERENCES `rol` (`id_rol`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `venta`
--
ALTER TABLE `venta`
  ADD CONSTRAINT `venta_ibfk_1` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`id_cliente`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `venta_ibfk_2` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
