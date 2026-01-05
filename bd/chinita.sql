-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 05-01-2026 a las 21:17:40
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
(481, '2026-01-04 16:12:14', 'Inicio de sesión exitoso', '<p class=\"h2 mb-3 text-primary-emphasis text-center\"><i class=\"bi bi-exclamation-circle-fill\"></i>&nbsp;El usuario Inició sesión correctamente.</p> ', 2),
(482, '2026-01-04 16:13:30', 'Actualización Exitosa de la Tasa del Dolar.', '<p class=\"mb-3 text-primary-emphasis text-center\"><i class=\"bi bi-exclamation-circle-fill\"></i>&nbsp;El usuario actualizó la Tasa del Dolar de Manera automática</p> \r\n                <h4 class=\"text-center card-title\"><b> Información de la Tasa de cotización </b></h4>\r\n                <div class=\"d-flex justify-content-between border-bottom\">\r\n                    <p> Tasa de cotización</p>\r\n                    <span>De <b class=\"text-danger\">267.74 bs</b> a <b class=\"text-success\">304.67 bs</b></span>\r\n                </div>\r\n                <div class=\"d-flex justify-content-between border-bottom\">\r\n                    <p> Fecha y Hora</p>\r\n                    <span>De <b class=\"text-danger\">11-12-2025 / 06:11:pm</b> a <b class=\"text-success\">04-01-2026 / 04:13:pm</b></span>\r\n                </div>', 2),
(483, '2026-01-04 16:46:52', 'Modificación Exitosa de un Producto.', '<p class=\"mb-3 text-primary-emphasis text-center\"><i class=\"bi bi-exclamation-circle-fill\"></i>&nbsp;El usuario modificó el siguiente producto.</p><h4 class=\"text-center card-title\"><b> Información del producto 7590006700018</b></h4>\r\n            <div class=\"d-flex justify-content-between border-bottom mb-2\"> <p> Código</p> <span>7590006700018</span> </div>\r\n            <div class=\"d-flex justify-content-between border-bottom mb-2\"> <p> Nombre</p> <span>Polar Ice</span> </div>\r\n            <div class=\"d-flex justify-content-between border-bottom mb-2\"> <p> Marca</p> <span>Polar</span> </div>\r\n            <div class=\"d-flex justify-content-between border-bottom mb-2\"> <p> Formato</p> <span>295 Mililitro(s) (ml)</span> </div>\r\n            <div class=\"d-flex justify-content-between border-bottom mb-2\"> <p> Categoría</p> <span>Bebidas y Refrescos</span> </div>\r\n            <div class=\"d-flex justify-content-between border-bottom mb-2\"> <p> Precio ($)</p> <span>De <b class=\"text-danger\">2.92 $</b> a <b class=\"text-success\">3 $</b></span> </div>\r\n            <div class=\"d-flex justify-content-between border-bottom mb-2\"> <p> Fecha y Hora de la Actualizacion</p> <span>De <b class=\"text-danger\">22-10-2025 08:07:pm</b> a <b class=\"text-success\">04-01-2026 04:46:pm</b></span> </div>\r\n            <div class=\"d-flex justify-content-between border-bottom mb-2\"> <p> Estado</p> <span>Activo</span> </div>', 2),
(484, '2026-01-04 16:49:44', 'Modificación exitosa del estado de una categoría.', '<p class=\"mb-3 text-primary-emphasis text-center\"><i class=\"bi bi-exclamation-circle-fill\"></i>&nbsp; Se modificó el estado de una categoría con la siguiente informacón.</p> \r\n            <h4 class=\"text-center card-title\"><b> Información de la categoría </b></h4>\r\n            <div class=\"d-flex justify-content-between border-bottom\"> <p> Nombre</p> <span>Lácteos y Refrigerados</span> </div>\r\n            <div class=\"d-flex justify-content-between border-bottom\"> <p> Descripción</p> <span>Leche, yogur, queso, mantequilla, huevos, postres fríos.</span> </div>\r\n            <div class=\"d-flex justify-content-between border-bottom\"> <p> Estado</p> <span>De <b class=\"text-danger\">Inactivo</b> a <b class=\"text-success\">Activo</b></span> </div>', 2),
(485, '2026-01-04 16:50:27', 'Modificación exitosa del estado de una Presentación.', '<p class=\"mb-3 text-primary-emphasis text-center\"><i class=\"bi bi-exclamation-circle-fill\"></i>&nbsp; Se modificó el estado de una Presentación con la siguiente informacón.</p> \r\n            <h4 class=\"text-center card-title\"><b> Información de la Presentación </b></h4>\r\n            <div class=\"d-flex justify-content-between border-bottom\"> <p> Descripción</p> <span>1.5 Litro(s) (Lt)</span> </div>\r\n            <div class=\"d-flex justify-content-between border-bottom\"> <p> Estado</p> <span>De <b class=\"text-danger\">Inactivo</b> a <b class=\"text-success\">Activo</b></span> </div>', 2),
(486, '2026-01-04 16:50:38', 'Modificación exitosa del estado de una Marca.', '<p class=\"mb-3 text-primary-emphasis text-center\"><i class=\"bi bi-exclamation-circle-fill\"></i>&nbsp; Se modificó el estado de una Marca con la siguiente informacón.</p> \r\n            <h4 class=\"text-center card-title\"><b> Información de la Marca </b></h4>\r\n            <div class=\"d-flex justify-content-between border-bottom\"> <p> Nombre</p> <span>Pepsi</span> </div>\r\n            <div class=\"d-flex justify-content-between border-bottom\"> <p> Estado</p> <span>De <b class=\"text-danger\">Inactivo</b> a <b class=\"text-success\">Activa</b></span> </div>', 2),
(487, '2026-01-04 17:23:30', 'Modificación exitosa de un proveedor.', '<p class=\"mb-3 text-primary-emphasis text-center\"><i class=\"bi bi-exclamation-circle-fill\"></i>&nbsp;El usuario modificó un Proveedor con la Siguiente Información.</p>\r\n            <h4 class=\"text-center card-title\"><b> Información del Proveedor </b></h4>\r\n            <div class=\"d-flex justify-content-between border-bottom mb-2\"> <p> Cédula / RIF</p> <span><span>J-16934956</span></span> </div>\r\n            <div class=\"d-flex justify-content-between border-bottom mb-2\"> <p> Nombre</p> <span><span>De <b class=\"text-danger\">EL CORRALIT</b> a <b class=\"text-success\">EL CORRALITO</b></span></span> </div>\r\n            <div class=\"d-flex justify-content-between border-bottom mb-2\"> <p> Correo</p> <span><span>Corral@pollera.com</span></span> </div>\r\n            <div class=\"d-flex justify-content-between border-bottom mb-2\"> <p> Dirección</p> <span><span>ACARIGUA CALLE 3 AVENIDA 5 Y 7</span></span> </div>\r\n            <div class=\"d-flex justify-content-between border-bottom mb-2\"> <p> Teléfono</p> <span><span>04122343443</span></span> </div>', 2),
(488, '2026-01-04 17:27:51', 'Registro exitoso de una entrada.', '<p class=\"mb-3 text-primary-emphasis text-center\"><i class=\"bi bi-exclamation-circle-fill\"></i>&nbsp;El usuario registró una Entrada con la Siguiente Información.</p>\r\n                <h4 class=\"text-center card-title\"><b> Información del Proveedor </b></h4>\r\n                <div class=\"d-flex justify-content-between border-bottom mb-2\"> <p> Cédula / RIF</p> <span>J-16934956</span> </div>\r\n                <div class=\"d-flex justify-content-between border-bottom mb-2\"> <p> Nombre</p>\r\n                    <span>El Corralito </span>\r\n                </div>\r\n                <div class=\"d-flex justify-content-between border-bottom mb-2\"> <p> Correo</p> <span>Corral@pollera.com</span> </div>\r\n                <div class=\"d-flex justify-content-between border-bottom mb-2\"> <p> Dirección</p> <span>ACARIGUA CALLE 3 AVENIDA 5 Y 7</span> </div>\r\n                <div class=\"d-flex justify-content-between border-bottom mb-2\"> <p> Teléfono</p> <span>04122343443</span> </div>\r\n                <h4 class=\"text-center card-title\"><b> Información de la Entrada </b></h4>\r\n                <div class=\"d-flex justify-content-between border-bottom\">\r\n                    <p> Total ($)</p>\r\n                    <span>7.5 $</span>\r\n                </div>\r\n                <div class=\"d-flex justify-content-between border-bottom\">\r\n                    <p> Total (Bs)</p>\r\n                    <span>2280 Bs</span>\r\n                </div>\r\n                <div class=\"d-flex justify-content-between border-bottom\">\r\n                    <p> Fecha y Hora</p>\r\n                    <span>04-01-2026 | 05:25:pm</span>\r\n                </div>\r\n                <div class=\"d-flex justify-content-between border-bottom\">\r\n                    <p> Tasa de Cambio</p>\r\n                    <span>304.67 Bs</span>\r\n                </div>\r\n                <p><b>Para más detalles sobre la entrada, Ve a La Lista de Entradas </b></p>\r\n        ', 2),
(489, '2026-01-04 17:31:34', 'Registro exitoso de una entrada.', '<p class=\"mb-3 text-primary-emphasis text-center\"><i class=\"bi bi-exclamation-circle-fill\"></i>&nbsp;El usuario registró una Entrada con la Siguiente Información.</p>\r\n                <h4 class=\"text-center card-title\"><b> Información del Proveedor </b></h4>\r\n                <div class=\"d-flex justify-content-between border-bottom mb-2\"> <p> Cédula / RIF</p> <span>J-16934956</span> </div>\r\n                <div class=\"d-flex justify-content-between border-bottom mb-2\"> <p> Nombre</p>\r\n                    <span>El Corralito </span>\r\n                </div>\r\n                <div class=\"d-flex justify-content-between border-bottom mb-2\"> <p> Correo</p> <span>Corral@pollera.com</span> </div>\r\n                <div class=\"d-flex justify-content-between border-bottom mb-2\"> <p> Dirección</p> <span>ACARIGUA CALLE 3 AVENIDA 5 Y 7</span> </div>\r\n                <div class=\"d-flex justify-content-between border-bottom mb-2\"> <p> Teléfono</p> <span>04122343443</span> </div>\r\n                <h4 class=\"text-center card-title\"><b> Información de la Entrada </b></h4>\r\n                <div class=\"d-flex justify-content-between border-bottom\">\r\n                    <p> Total ($)</p>\r\n                    <span>132 $</span>\r\n                </div>\r\n                <div class=\"d-flex justify-content-between border-bottom\">\r\n                    <p> Total (Bs)</p>\r\n                    <span>40128 Bs</span>\r\n                </div>\r\n                <div class=\"d-flex justify-content-between border-bottom\">\r\n                    <p> Fecha y Hora</p>\r\n                    <span>04-01-2026 | 05:27:pm</span>\r\n                </div>\r\n                <div class=\"d-flex justify-content-between border-bottom\">\r\n                    <p> Tasa de Cambio</p>\r\n                    <span>304.67 Bs</span>\r\n                </div>\r\n                <p><b>Para más detalles sobre la entrada, Ve a La Lista de Entradas </b></p>\r\n        ', 2),
(490, '2026-01-04 17:32:13', 'Modificación Exitosa de un Producto.', '<p class=\"mb-3 text-primary-emphasis text-center\"><i class=\"bi bi-exclamation-circle-fill\"></i>&nbsp;El usuario modificó el siguiente producto.</p><h4 class=\"text-center card-title\"><b> Información del producto 7590006700018</b></h4>\r\n            <div class=\"d-flex justify-content-between border-bottom mb-2\"> <p> Código</p> <span>7590006700018</span> </div>\r\n            <div class=\"d-flex justify-content-between border-bottom mb-2\"> <p> Nombre</p> <span>Polar Ice</span> </div>\r\n            <div class=\"d-flex justify-content-between border-bottom mb-2\"> <p> Marca</p> <span>Polar</span> </div>\r\n            <div class=\"d-flex justify-content-between border-bottom mb-2\"> <p> Formato</p> <span>295 Mililitro(s) (ml)</span> </div>\r\n            <div class=\"d-flex justify-content-between border-bottom mb-2\"> <p> Categoría</p> <span>Bebidas y Refrescos</span> </div>\r\n            <div class=\"d-flex justify-content-between border-bottom mb-2\"> <p> Precio ($)</p> <span>De <b class=\"text-danger\">0.73 $</b> a <b class=\"text-success\">2.73 $</b></span> </div>\r\n            <div class=\"d-flex justify-content-between border-bottom mb-2\"> <p> Fecha y Hora de la Actualizacion</p> <span>De <b class=\"text-danger\">04-01-2026 05:25:pm</b> a <b class=\"text-success\">04-01-2026 05:32:pm</b></span> </div>\r\n            <div class=\"d-flex justify-content-between border-bottom mb-2\"> <p> Estado</p> <span>Activo</span> </div>', 2),
(491, '2026-01-04 18:42:35', 'Cierre de sesión exitoso', 'Se cerró la sesión del usuario debido a que se cumplío el tiempo de inactividad dentro del sistema.', 2),
(492, '2026-01-04 18:42:49', 'Inicio de sesión exitoso', '<p class=\"h2 mb-3 text-primary-emphasis text-center\"><i class=\"bi bi-exclamation-circle-fill\"></i>&nbsp;El usuario Inició sesión correctamente.</p> ', 2),
(493, '2026-01-04 18:43:10', 'Cierre de sesión exitoso', '<p class=\"h2 mb-3 text-primary-emphasis text-center\"><i class=\"bi bi-exclamation-circle-fill\"></i>&nbsp;El usuario ha cerrado sesión correctamente.</p>', 2),
(494, '2026-01-05 11:54:13', 'Inicio de sesión exitoso', '<p class=\"h2 mb-3 text-primary-emphasis text-center\"><i class=\"bi bi-exclamation-circle-fill\"></i>&nbsp;El usuario Inició sesión correctamente.</p> ', 2),
(495, '2026-01-05 11:54:52', 'Actualización Exitosa de la Tasa del Dolar.', '<p class=\"mb-3 text-primary-emphasis text-center\"><i class=\"bi bi-exclamation-circle-fill\"></i>&nbsp;El usuario actualizó la Tasa del Dolar de Manera automática</p> \r\n                <h4 class=\"text-center card-title\"><b> Información de la Tasa de cotización </b></h4>\r\n                <div class=\"d-flex justify-content-between border-bottom\">\r\n                    <p> Tasa de cotización</p>\r\n                    <span>304.67 bs</span>\r\n                </div>\r\n                <div class=\"d-flex justify-content-between border-bottom\">\r\n                    <p> Fecha y Hora</p>\r\n                    <span>De <b class=\"text-danger\">04-01-2026 / 04:13:pm</b> a <b class=\"text-success\">05-01-2026 / 11:54:am</b></span>\r\n                </div>', 2),
(496, '2026-01-05 12:43:25', 'Cierre de sesión exitoso', '<p class=\"h2 mb-3 text-primary-emphasis text-center\"><i class=\"bi bi-exclamation-circle-fill\"></i>&nbsp;El usuario ha cerrado sesión correctamente.</p>', 2),
(497, '2026-01-05 15:00:46', 'Inicio de sesión exitoso', '<p class=\"h2 mb-3 text-primary-emphasis text-center\"><i class=\"bi bi-exclamation-circle-fill\"></i>&nbsp;El usuario Inició sesión correctamente.</p> ', 2),
(498, '2026-01-05 16:36:18', 'Registro exitoso de un nuevo servicio.', '<p class=\"mb-3 text-primary-emphasis\"><i class=\"bi bi-exclamation-circle-fill\"></i>&nbsp;El usuario registró un servicio con la información</p> \r\n            <h4 class=\"text-center card-title\"><b> Información del Servicio </b></h4>\r\n            <div class=\"d-flex justify-content-between border-bottom\"> <p> Nombre del platilllo</p> <span>COMBO DE ALITAS</span> </div>\r\n            <div class=\"d-flex justify-content-between border-bottom\"> <p> Precio ($)</p> <span>11.5 $ </span> </div>\r\n            <div class=\"d-flex justify-content-between border-bottom\"> <p> Descripción</p> <span>COMBO DE 6 UNIDADES DE ALITAS DE POLLO</span> </div>\r\n            <div class=\"d-flex justify-content-between border-bottom\"> <p> Estado</p> <span>Activo</span> </div>\r\n\r\n            <h4 class=\"text-center card-title\"><b> Detalles del Servicio </b></h4>\r\n            \r\n            <p class=\"text-secondary fw-bold mb-1\"> Código: 759000670034 </p>\r\n                <p class=\"text-secondary fw-bold mb-1\"> Nombre: <span class=\"text-primary fw-bold mb-1\">Alitas</span> </p>\r\n                <p class=\"text-secondary fw-bold mb-1\"> Marca: Pollo Don Pollo </p>\r\n                <small class=\"d-block text-muted\"> Formato: 1 Kilogramo(s) (Kg) </small>\r\n                <small class=\"d-block text-muted\"> Categoría: Carnes, Pescados y Aves </small>\r\n                <p class=\"fw-bold mb-1 text-success\"> Cantidad: <span>6</span> </p>\r\n        ', 2),
(499, '2026-01-05 16:48:04', 'Venta realizada exitosamente.', '<p class=\"mb-3 text-primary-emphasis text-center\"><i class=\"bi bi-exclamation-circle-fill\"></i>&nbsp; Se registró una venta con la siguiente informacón.</p> \r\n        <h4 class=\"text-center card-title\"><b> Información del cliente </b></h4>\r\n        <div class=\"d-flex justify-content-between border-bottom\"> <p> Cédula</p> <span>V-14540481</span> </div>\r\n        <div class=\"d-flex justify-content-between border-bottom\"> <p> Nombre y Apellido</p> <span>MARÍA JOSÉ GIMENEZ</span> </div>\r\n        <div class=\"d-flex justify-content-between border-bottom\"> <p> Teléfono</p> <span>04245494211</span> </div>\r\n\r\n        <h4 class=\"text-center card-title\"><b> Información de la Venta </b></h4>\r\n        <div class=\"d-flex justify-content-between border-bottom\"> <p> Subtotal ($)</p> <span>16 $</span> </div>\r\n        <div class=\"d-flex justify-content-between border-bottom\"> <p> Subtotal (Bs)</p> <span>4874.72 Bs</span> </div>\r\n\r\n        <div class=\"d-flex justify-content-between border-bottom\"> <p> Total ($) + IVA (16%)</p> <span>18.56 $</span> </div>\r\n        <div class=\"d-flex justify-content-between border-bottom\"> <p> Total (Bs) + IVA (16%)</p> <span>5654.68 Bs</span> </div>\r\n\r\n        <div class=\"d-flex justify-content-between border-bottom\"> <p> Fecha y Hora</p> <span>05-01-2026 | 04:48:am</span> </div>\r\n        <div class=\"d-flex justify-content-between border-bottom\"><p> Tasa de Cambio</p> <span>304.67 Bs</span> </div>\r\n\r\n        <h4 class=\"text-center card-title\"><b> Información del Usuario que realizó la venta </b></h4>\r\n        <div class=\"d-flex justify-content-between border-bottom\"> <p> Cédula</p> V-28587583 </div>\r\n        <div class=\"d-flex justify-content-between border-bottom\"> <p> Nombre y Apellido</p>DANIEL BARRUETA </div>\r\n        <div class=\"d-flex justify-content-between border-bottom\"> <p> Correo</p> dbarrueta42@gmail.com </div>\r\n        <div class=\"d-flex justify-content-between border-bottom\"> <p> Teléfono</p> 04125238909 </div>', 2),
(500, '2026-01-05 17:02:30', 'Modificación exitosa de las características de acceso de un usuario', '<p class=\"mb-3 text-primary-emphasis\"><i class=\"bi bi-exclamation-circle-fill\"></i>&nbsp;Se Restableció el Acceso al Sistema del Usuario con la Siguiente Información: </p> \r\n            <h4 class=\"text-center card-title\"><b> Información del Usuario Modificado: </b></h4>\r\n            <div class=\"d-flex justify-content-between border-bottom\">\r\n                <p> Cédula</p>\r\n                V-12345678\r\n            </div>\r\n            <div class=\"d-flex justify-content-between border-bottom\">\r\n                <p> Nombre y Apellido</p>\r\n                ADMIN PRUEBA\r\n            </div>\r\n            <div class=\"d-flex justify-content-between border-bottom\">\r\n                <p> Teléfono</p>\r\n                04123456548\r\n            </div>\r\n            <div class=\"d-flex justify-content-between border-bottom\">\r\n                <p> Estado</p>\r\n                <span>Activo</span>\r\n            </div>\r\n            <div class=\"d-flex justify-content-between border-bottom\">\r\n                <p> Rol asignado</p>\r\n                <span>De <b class=\"text-danger\">Administrador</b> a <b class=\"text-success\">Pasante</b></span>\r\n            </div>\r\n            <div class=\"d-flex justify-content-between border-bottom\">\r\n                <p> Bloqueado</p>\r\n                <span>No</span>\r\n            </div>', 2),
(501, '2026-01-05 17:02:44', 'Modificación exitosa de las características de acceso de un usuario', '<p class=\"mb-3 text-primary-emphasis\"><i class=\"bi bi-exclamation-circle-fill\"></i>&nbsp;Se Restableció el Acceso al Sistema del Usuario con la Siguiente Información: </p> \r\n            <h4 class=\"text-center card-title\"><b> Información del Usuario Modificado: </b></h4>\r\n            <div class=\"d-flex justify-content-between border-bottom\">\r\n                <p> Cédula</p>\r\n                V-12345678\r\n            </div>\r\n            <div class=\"d-flex justify-content-between border-bottom\">\r\n                <p> Nombre y Apellido</p>\r\n                ADMIN PRUEBA\r\n            </div>\r\n            <div class=\"d-flex justify-content-between border-bottom\">\r\n                <p> Teléfono</p>\r\n                04123456548\r\n            </div>\r\n            <div class=\"d-flex justify-content-between border-bottom\">\r\n                <p> Estado</p>\r\n                <span>De <b class=\"text-danger\">Activo</b> a <b class=\"text-success\">Inactivo</b></span>\r\n            </div>\r\n            <div class=\"d-flex justify-content-between border-bottom\">\r\n                <p> Rol asignado</p>\r\n                <span>De <b class=\"text-danger\">Pasante</b> a <b class=\"text-success\">Administrador</b></span>\r\n            </div>\r\n            <div class=\"d-flex justify-content-between border-bottom\">\r\n                <p> Bloqueado</p>\r\n                <span>No</span>\r\n            </div>', 2),
(502, '2026-01-05 17:03:57', 'Cambio exitoso del estado de un rol', '<p class=\"mb-3 text-primary-emphasis\"><i class=\"bi bi-exclamation-circle-fill\"></i>&nbsp;El usuario cambió el estado del rol con la siguiente información:</p>\r\n            <h4 class=\"text-center card-title\"><b> Información del Servicio: </b></h4>\r\n            <div class=\"d-flex justify-content-between border-bottom\"> <p> Nombre</p> <span>Pasante</span> </div>\r\n            <div class=\"d-flex justify-content-between border-bottom\"> <p> Estado</p> <span><span>De <b class=\"text-danger\">Activo</b> a <b class=\"text-success\">Inactivo</b></span></span> </div>\r\n            ', 2),
(503, '2026-01-05 17:05:04', 'Cierre de sesión exitoso', '<p class=\"h2 mb-3 text-primary-emphasis text-center\"><i class=\"bi bi-exclamation-circle-fill\"></i>&nbsp;El usuario ha cerrado sesión correctamente.</p>', 2),
(504, '2026-01-05 17:05:45', 'Inicio de sesión exitoso', '<p class=\"h2 mb-3 text-primary-emphasis text-center\"><i class=\"bi bi-exclamation-circle-fill\"></i>&nbsp;El usuario Inició sesión correctamente.</p> ', 2),
(505, '2026-01-05 17:07:22', 'Registro exitoso de un nuevo servicio.', '<p class=\"mb-3 text-primary-emphasis\"><i class=\"bi bi-exclamation-circle-fill\"></i>&nbsp;El usuario registró un servicio con la información</p> \r\n            <h4 class=\"text-center card-title\"><b> Información del Servicio </b></h4>\r\n            <div class=\"d-flex justify-content-between border-bottom\"> <p> Nombre del platilllo</p> <span>ALMUERZO EJECUTIVO</span> </div>\r\n            <div class=\"d-flex justify-content-between border-bottom\"> <p> Precio ($)</p> <span>9.99 $ </span> </div>\r\n            <div class=\"d-flex justify-content-between border-bottom\"> <p> Descripción</p> <span>ARROZ, POLLO Y ENSALADA CESAR</span> </div>\r\n            <div class=\"d-flex justify-content-between border-bottom\"> <p> Estado</p> <span>Activo</span> </div>\r\n\r\n            <h4 class=\"text-center card-title\"><b> Detalles del Servicio </b></h4>\r\n            \r\n            <p class=\"text-secondary fw-bold mb-1\"> Código: 759000670034 </p>\r\n                <p class=\"text-secondary fw-bold mb-1\"> Nombre: <span class=\"text-primary fw-bold mb-1\">Alitas</span> </p>\r\n                <p class=\"text-secondary fw-bold mb-1\"> Marca: Pollo Don Pollo </p>\r\n                <small class=\"d-block text-muted\"> Formato: 1 Kilogramo(s) (Kg) </small>\r\n                <small class=\"d-block text-muted\"> Categoría: Carnes, Pescados y Aves </small>\r\n                <p class=\"fw-bold mb-1 text-success\"> Cantidad: <span>5</span> </p>\r\n        ', 2),
(506, '2026-01-05 17:08:01', 'Cierre de sesión exitoso', '<p class=\"h2 mb-3 text-primary-emphasis text-center\"><i class=\"bi bi-exclamation-circle-fill\"></i>&nbsp;El usuario ha cerrado sesión correctamente.</p>', 2),
(507, '2026-01-05 17:13:46', 'Inicio de sesión exitoso', '<p class=\"h2 mb-3 text-primary-emphasis text-center\"><i class=\"bi bi-exclamation-circle-fill\"></i>&nbsp;El usuario Inició sesión correctamente.</p> ', 2),
(508, '2026-01-05 17:14:03', 'Modificación Exitosa del Acceso de un Usuario.', '<p class=\"mb-3 text-primary-emphasis text-center\"><i class=\"bi bi-exclamation-circle-fill\"></i>&nbsp;Se Restableció el Acceso al Sistema del Usuario con la Siguiente Información </p> \r\n            <h4 class=\"text-center card-title\"><b> Información del Usuario Modificado: </b></h4>\r\n            <div class=\"d-flex justify-content-between border-bottom\">\r\n                <p> Cédula</p>\r\n                V-12345678\r\n            </div>\r\n            <div class=\"d-flex justify-content-between border-bottom\">\r\n                <p> Nombre y Apellido</p>\r\n                ADMIN PRUEBA\r\n            </div>\r\n            <div class=\"d-flex justify-content-between border-bottom\">\r\n                <p> Teléfono</p>\r\n                04123456548\r\n            </div>\r\n            <div class=\"d-flex justify-content-between border-bottom\">\r\n                <p> Estado</p>\r\n                <span>De <b class=\"text-danger\">Inactivo</b> a <b class=\"text-success\">Activo</b></span>\r\n            </div>\r\n            <div class=\"d-flex justify-content-between border-bottom\">\r\n                <p> Rol asignado</p>\r\n                <span>Administrador</span>\r\n            </div>\r\n            <div class=\"d-flex justify-content-between border-bottom\">\r\n                <p> Bloqueado</p>\r\n                <span>No</span>\r\n            </div>', 2),
(509, '2026-01-05 17:14:10', 'Modificación Exitosa del Acceso de un Usuario.', '<p class=\"mb-3 text-primary-emphasis text-center\"><i class=\"bi bi-exclamation-circle-fill\"></i>&nbsp;Se Restableció el Acceso al Sistema del Usuario con la Siguiente Información </p> \r\n            <h4 class=\"text-center card-title\"><b> Información del Usuario Modificado: </b></h4>\r\n            <div class=\"d-flex justify-content-between border-bottom\">\r\n                <p> Cédula</p>\r\n                V-30270578\r\n            </div>\r\n            <div class=\"d-flex justify-content-between border-bottom\">\r\n                <p> Nombre y Apellido</p>\r\n                MANUEL TORRE\r\n            </div>\r\n            <div class=\"d-flex justify-content-between border-bottom\">\r\n                <p> Teléfono</p>\r\n                04128053240\r\n            </div>\r\n            <div class=\"d-flex justify-content-between border-bottom\">\r\n                <p> Estado</p>\r\n                <span>Activo</span>\r\n            </div>\r\n            <div class=\"d-flex justify-content-between border-bottom\">\r\n                <p> Rol asignado</p>\r\n                <span>Administrador</span>\r\n            </div>\r\n            <div class=\"d-flex justify-content-between border-bottom\">\r\n                <p> Bloqueado</p>\r\n                <span>No</span>\r\n            </div>', 2),
(510, '2026-01-05 17:15:31', 'Modificación Exitosa del Acceso de un Usuario.', '<p class=\"mb-3 text-primary-emphasis text-center\"><i class=\"bi bi-exclamation-circle-fill\"></i>&nbsp;Se Restableció el Acceso al Sistema del Usuario con la Siguiente Información </p> \r\n            <h4 class=\"text-center card-title\"><b> Información del Usuario Modificado: </b></h4>\r\n            <div class=\"d-flex justify-content-between border-bottom\">\r\n                <p> Cédula</p>\r\n                V-12365484\r\n            </div>\r\n            <div class=\"d-flex justify-content-between border-bottom\">\r\n                <p> Nombre y Apellido</p>\r\n                CARLOS PEREZ\r\n            </div>\r\n            <div class=\"d-flex justify-content-between border-bottom\">\r\n                <p> Teléfono</p>\r\n                04123654879\r\n            </div>\r\n            <div class=\"d-flex justify-content-between border-bottom\">\r\n                <p> Estado</p>\r\n                <span>Activo</span>\r\n            </div>\r\n            <div class=\"d-flex justify-content-between border-bottom\">\r\n                <p> Rol asignado</p>\r\n                <span>Empleado</span>\r\n            </div>\r\n            <div class=\"d-flex justify-content-between border-bottom\">\r\n                <p> Bloqueado</p>\r\n                <span>No</span>\r\n            </div>', 2),
(511, '2026-01-05 17:15:52', 'Cierre de sesión exitoso', '<p class=\"h2 mb-3 text-primary-emphasis text-center\"><i class=\"bi bi-exclamation-circle-fill\"></i>&nbsp;El usuario ha cerrado sesión correctamente.</p>', 2);

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
(4, 'V-14540481', 'MARÍA JOSÉ GIMENEZ', '04245494211');

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
(28, 39, 1, 10, 2, 424, 20, 4249.6),
(29, 40, 11, 5, 1, 227, 5, 1137.75),
(32, 42, 12, 2, 4, 1016, 8, 2038.96),
(33, 43, 12, 5, 4, 1016, 20, 5097.4),
(35, 1, 1, 15, 0.5, 152, 7.5, 2285.02),
(36, 2, 12, 10, 1, 304, 10, 3046.7),
(37, 2, 13, 10, 1.2, 364.8, 12, 3656.04),
(38, 2, 21, 15, 2, 608, 30, 9140.1),
(39, 2, 20, 25, 3.2, 972.8, 80, 24373.6);

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
(67, 12, 6, 30),
(68, 21, 6, 31),
(69, 21, 5, 32);

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
(176, 9, 'Divisa', NULL, 17, 5179.39),
(177, 9, 'Punto de Venta', NULL, 1.56, 475.29);

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
(7, 30, 2, 8, 2437.36, NULL, NULL, NULL, NULL, 9);

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
(10, 218.17, '2025-10-27 19:43:10'),
(11, 221.74, '2025-10-30 10:45:23'),
(12, 223.64, '2025-10-31 15:48:18'),
(13, 224.37, '2025-11-04 08:21:29'),
(14, 224.37, '2025-11-04 10:46:05'),
(15, 227.55, '2025-11-05 21:15:19'),
(16, 231.09, '2025-11-11 09:56:30'),
(17, 233.04, '2025-11-12 15:49:13'),
(18, 234.87, '2025-11-14 11:49:20'),
(19, 236.46, '2025-11-14 16:25:25'),
(20, 236.46, '2025-11-14 21:27:24'),
(21, 243.11, '2025-11-24 11:47:54'),
(22, 247.3, '2025-11-30 15:13:48'),
(23, 251.88, '2025-12-04 13:37:15'),
(24, 254.87, '2025-12-04 18:18:53'),
(25, 262.1, '2025-12-10 14:04:03'),
(26, 267.74, '2025-12-11 18:11:17'),
(27, 304.67, '2026-01-04 16:13:30'),
(28, 304.67, '2026-01-05 11:54:51');

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
(1, 0, 1, 7.5, 2280, '2026-01-04 17:25:59', 27, 2),
(2, 0, 1, 132, 40128, '2026-01-04 17:27:52', 27, 2);

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
(148, 30, 15, '2025-11-08 09:47:16'),
(149, 30, 20, '2025-11-08 09:47:16'),
(150, 30, 28, '2025-11-08 09:47:16'),
(896, 24, 3, '2025-11-12 15:43:26'),
(897, 24, 5, '2025-11-12 15:43:26'),
(898, 24, 6, '2025-11-12 15:43:26'),
(899, 24, 7, '2025-11-12 15:43:26'),
(900, 24, 8, '2025-11-12 15:43:26'),
(901, 24, 9, '2025-11-12 15:43:27'),
(902, 24, 10, '2025-11-12 15:43:27'),
(903, 24, 11, '2025-11-12 15:43:27'),
(904, 24, 12, '2025-11-12 15:43:27'),
(905, 24, 13, '2025-11-12 15:43:27'),
(906, 24, 14, '2025-11-12 15:43:27'),
(907, 24, 15, '2025-11-12 15:43:27'),
(908, 24, 16, '2025-11-12 15:43:27'),
(909, 24, 17, '2025-11-12 15:43:27'),
(910, 24, 19, '2025-11-12 15:43:27'),
(911, 24, 25, '2025-11-12 15:43:27'),
(1150, 2, 1, '2025-11-30 15:11:12'),
(1151, 2, 2, '2025-11-30 15:11:12'),
(1152, 2, 3, '2025-11-30 15:11:12'),
(1153, 2, 4, '2025-11-30 15:11:12'),
(1154, 2, 5, '2025-11-30 15:11:12'),
(1155, 2, 6, '2025-11-30 15:11:12'),
(1156, 2, 7, '2025-11-30 15:11:12'),
(1157, 2, 8, '2025-11-30 15:11:13'),
(1158, 2, 9, '2025-11-30 15:11:13'),
(1159, 2, 10, '2025-11-30 15:11:13'),
(1160, 2, 11, '2025-11-30 15:11:13'),
(1161, 2, 12, '2025-11-30 15:11:13'),
(1162, 2, 13, '2025-11-30 15:11:13'),
(1163, 2, 14, '2025-11-30 15:11:13'),
(1164, 2, 15, '2025-11-30 15:11:13'),
(1165, 2, 16, '2025-11-30 15:11:13'),
(1166, 2, 17, '2025-11-30 15:11:13'),
(1167, 2, 18, '2025-11-30 15:11:13'),
(1168, 2, 20, '2025-11-30 15:11:13'),
(1169, 2, 21, '2025-11-30 15:11:13'),
(1170, 2, 19, '2025-11-30 15:11:13'),
(1171, 2, 22, '2025-11-30 15:11:13'),
(1172, 2, 23, '2025-11-30 15:11:13'),
(1173, 2, 25, '2025-11-30 15:11:13'),
(1174, 2, 24, '2025-11-30 15:11:13'),
(1175, 2, 26, '2025-11-30 15:11:13'),
(1176, 2, 27, '2025-11-30 15:11:13'),
(1177, 2, 28, '2025-11-30 15:11:14'),
(1178, 2, 29, '2025-11-30 15:11:14'),
(1179, 2, 30, '2025-11-30 15:11:14'),
(1180, 2, 31, '2025-11-30 15:11:14'),
(1181, 2, 32, '2025-11-30 15:11:14'),
(1182, 2, 33, '2025-11-30 15:11:14'),
(1183, 2, 34, '2025-11-30 15:11:14'),
(1184, 2, 35, '2025-11-30 15:11:14'),
(1185, 2, 36, '2025-11-30 15:11:14'),
(1186, 2, 37, '2025-11-30 15:11:14'),
(1187, 2, 38, '2025-11-30 15:11:14'),
(1188, 2, 39, '2025-11-30 15:11:14'),
(1189, 2, 40, '2025-11-30 15:11:14'),
(1190, 2, 41, '2025-11-30 15:11:14'),
(1191, 2, 42, '2025-11-30 15:11:14'),
(1192, 2, 43, '2025-11-30 15:11:14'),
(1193, 2, 44, '2025-11-30 15:11:14');

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
(41, 'Hit', 1),
(43, 'Smirnoff', 1);

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
(30, 'COMBO SMIRNOFF', '8', 'COMBO DE 6 UNIDADES DE SMIRNOFF', 1),
(31, 'COMBO DE ALITAS', '11.5', 'COMBO DE 6 UNIDADES DE ALITAS DE POLLO', 1),
(32, 'ALMUERZO EJECUTIVO', '9.99', 'ARROZ, POLLO Y ENSALADA CESAR', 1);

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
(45, 1, 'hqiWoZY=', 1, 2),
(46, 2, 'hqKamw==', 2, 2),
(47, 4, 'ipiikIg=', 3, 2),
(48, 3, 'da2lmA==', 4, 2),
(49, 4, '$2y$10$ehR/uTSISsb7yckmgFGJJ.YI2UYGFwy4DH0axIU/urOCSePOV1Hm6', 1, 29),
(50, 1, '$2y$10$ehR/uTSISsb7yckmgFGJJ.YI2UYGFwy4DH0axIU/urOCSePOV1Hm6', 2, 29),
(51, 2, '$2y$10$ehR/uTSISsb7yckmgFGJJ.YI2UYGFwy4DH0axIU/urOCSePOV1Hm6', 3, 29),
(52, 3, '$2y$10$ehR/uTSISsb7yckmgFGJJ.YI2UYGFwy4DH0axIU/urOCSePOV1Hm6', 4, 29),
(53, 1, '$2y$10$ux4SKQpfEkJe4a4lsKLR.ePwJPOA0sC1wks8FPIAVs5QuNoYLYCKa', 1, 7),
(54, 2, '$2y$10$ux4SKQpfEkJe4a4lsKLR.ePwJPOA0sC1wks8FPIAVs5QuNoYLYCKa', 2, 7),
(55, 3, '$2y$10$ux4SKQpfEkJe4a4lsKLR.ePwJPOA0sC1wks8FPIAVs5QuNoYLYCKa', 3, 7),
(56, 4, '$2y$10$ux4SKQpfEkJe4a4lsKLR.ePwJPOA0sC1wks8FPIAVs5QuNoYLYCKa', 4, 7);

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
(49, '6', 1, 1),
(50, '500', 2, 1),
(51, '750', 4, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `id_producto` int NOT NULL,
  `codigo` varchar(20) COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
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
(1, '7590006700018', 'Polar Ice', 3, 20, 10, 20, 2.73, '2026-01-04 17:32:13', 1),
(11, '7590006700021', 'Maltín', 3, 24, 10, 2, 1.46, '2025-11-11 08:53:18', 1),
(12, '7590006700024', 'Light', 43, 21, 10, 8, 1.46, '2026-01-04 17:27:52', 1),
(13, '7590006700028', 'Light', 2, 1, 10, 10, 1.75, '2026-01-04 17:27:52', 1),
(20, '7590006706034', 'Muslos', 23, 46, 8, 25, 4.67, '2026-01-04 17:27:52', 1),
(21, '759000670034', 'Alitas', 23, 46, 8, 15, 2.92, '2026-01-04 17:27:52', 1);

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
(1, 'J-16934956', 'EL CORRALITO', 'Corral@pollera.com', 'ACARIGUA CALLE 3 AVENIDA 5 Y 7', '04122343443');

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
(2, 'Gramo(s) (gr)', 'Productos a granel, carnes, quesos, embutidos.'),
(3, 'Kilogramo(s) (Kg)', 'Productos a granel, carnes, quesos, embutidos.'),
(4, 'Mililitro(s) (ml)', 'Refrescos, jugos, leche, aceite, salsas.'),
(5, 'Litro(s) (Lt)', 'Refrescos, jugos, leche, aceite, salsas.'),
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
(2, 'Administrador', 1),
(24, 'Empleado', 1),
(30, 'Pasante', 0);

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
(1, 'V-30270578', 'MANUEL', 'TORRE', 'SHAUDITONUEL@GMAIL.COM', '$2y$10$TCm3sbWN.LlUsnCLbdlJwuQak/.aZLVv6IhDAnDDTDaXEXgN30IUO', '04128053240', 'TURÉN LINDA', '2025-11-08 17:43:24', 0, 0, 1, 2, 1),
(2, 'V-28587583', 'DANIEL', 'BARRUETA', 'dbarrueta42@gmail.com', '$2y$10$UiPYZurJDc541Ua0x8.tB.qwQwlJJsG5wZIdQkR8ycvBeRCyJpOsO', '04125238909', 'SECTOR E GUASDUAL CALLE 1', '2026-01-05 17:13:46', 0, 0, 0, 2, 1),
(7, 'V-12345678', 'ADMIN', 'PRUEBA', 'admin@gmail.com', '$2y$10$ux4SKQpfEkJe4a4lsKLR.ePwJPOA0sC1wks8FPIAVs5QuNoYLYCKa', '04123456548', 'ANDRES ELOY NEGRO', '2025-12-04 16:50:08', 0, 0, 1, 2, 1),
(29, 'V-12365484', 'CARLOS', 'PEREZ', 'carlos@gmail.com', '$2y$10$ehR/uTSISsb7yckmgFGJJ.YI2UYGFwy4DH0axIU/urOCSePOV1Hm6', '04123654879', 'ANDRES ELOY', NULL, 0, 0, 1, 24, 1);

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
(9, '2026-01-05 04:48:03', 16, 4874.72, 18.56, 5654.68, 2, 4);

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
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=512;

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id_categoria` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id_cliente` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `configuracion`
--
ALTER TABLE `configuracion`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `detalles_entrada`
--
ALTER TABLE `detalles_entrada`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT de la tabla `detalles_menu`
--
ALTER TABLE `detalles_menu`
  MODIFY `id_detalles_menu` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT de la tabla `detalles_pago`
--
ALTER TABLE `detalles_pago`
  MODIFY `id_detalle_pago` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=178;

--
-- AUTO_INCREMENT de la tabla `detalles_venta`
--
ALTER TABLE `detalles_venta`
  MODIFY `id_detalles_venta` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `dolar`
--
ALTER TABLE `dolar`
  MODIFY `id_dolar` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT de la tabla `entrada`
--
ALTER TABLE `entrada`
  MODIFY `id_entrada` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `funcion`
--
ALTER TABLE `funcion`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT de la tabla `funciones_rol`
--
ALTER TABLE `funciones_rol`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1194;

--
-- AUTO_INCREMENT de la tabla `marca`
--
ALTER TABLE `marca`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT de la tabla `menu`
--
ALTER TABLE `menu`
  MODIFY `id_menu` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT de la tabla `preguntas_secretas`
--
ALTER TABLE `preguntas_secretas`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT de la tabla `presentacion`
--
ALTER TABLE `presentacion`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `id_producto` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  MODIFY `id_proveedor` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT de la tabla `representacion`
--
ALTER TABLE `representacion`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `rol`
--
ALTER TABLE `rol`
  MODIFY `id_rol` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT de la tabla `seguridad`
--
ALTER TABLE `seguridad`
  MODIFY `id_seguridad` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT de la tabla `venta`
--
ALTER TABLE `venta`
  MODIFY `id_venta` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

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
