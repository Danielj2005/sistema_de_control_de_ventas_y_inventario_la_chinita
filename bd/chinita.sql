-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 09-06-2025 a las 00:01:10
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
(1, '2025-03-16 13:19:00', 'Intento de acceso sin permisos', 'El usuario intentó accedera a la pantalla roles sin permiso.', 2),
(2, '2025-03-16 13:19:51', 'Cierre de sesión', 'El usuario acaba de cerrar sesión.', 2),
(3, '2025-03-16 13:21:14', 'Inicio de sesión', 'El usuario inicio sesión.', 2),
(4, '2025-03-16 13:32:27', 'Intento de acceso sin permisos', 'El usuario intentó acceder a la pantalla roles sin permiso.', 2),
(5, '2025-03-16 13:32:27', 'Cierre de sesión', 'El usuario cerró sesión.', 2),
(6, '2025-03-16 13:35:57', 'Inicio de sesión', 'El usuario accedio al sistema.', 2),
(7, '2025-03-16 13:36:03', 'Intento de acceso a la pantalla roles sin permiso', 'La sesion del usuario fué cerrada por seguridad.', 2),
(8, '2025-03-16 13:36:04', 'Cierre de sesión', 'El usuario cerró sesión.', 2),
(9, '2025-03-16 13:36:09', 'Inicio de sesión', 'El usuario accedio al sistema.', 2),
(10, '2025-03-16 14:10:26', 'Intentó acceder a la pantalla roles sin permisos.', 'La sesion del usuario fué cerrada por seguridad.', 2),
(11, '2025-03-16 14:10:26', 'Cierre de sesión', 'El usuario cerró sesión.', 2),
(12, '2025-03-16 14:11:13', 'Inicio de sesión', 'El usuario accedio al sistema.', 2),
(13, '2025-03-16 15:40:15', 'Intentó acceder a la pantalla roles sin permisos.', 'La sesion del usuario fué cerrada por seguridad.', 2),
(14, '2025-03-16 15:40:15', 'Cierre de sesión', 'El usuario cerró sesión.', 2),
(15, '2025-03-16 15:49:38', 'Inicio de sesión', 'El usuario accedio al sistema.', 2),
(16, '2025-03-16 16:13:43', 'Cierre de sesión', 'El usuario cerró sesión.', 2),
(17, '2025-03-17 17:55:47', 'Inicio de sesión', 'El usuario accedio al sistema.', 2),
(18, '2025-03-17 21:20:18', 'Cierre de sesión', 'El usuario cerró sesión.', 2),
(19, '2025-03-18 07:50:13', 'Inicio de sesión', 'El usuario accedio al sistema.', 2),
(20, '2025-03-18 08:04:06', 'Cierre de sesión', 'El usuario cerró sesión.', 2),
(21, '2025-03-18 08:05:45', 'Inicio de sesión', 'El usuario accedio al sistema.', 2),
(22, '2025-03-18 08:21:20', 'Cierre de sesión', 'El usuario cerró sesión.', 2),
(23, '2025-03-18 16:13:47', 'Inicio de sesión', 'El usuario accedio al sistema.', 2),
(24, '2025-03-19 19:52:58', 'Cierre de sesión', 'El usuario cerró sesión.', 2),
(25, '2025-03-22 12:47:33', 'Inicio de sesión', 'El usuario accedio al sistema.', 2),
(26, '2025-03-22 13:51:59', 'Cierre de sesión', 'El usuario cerró sesión.', 2),
(27, '2025-03-23 17:35:56', 'Inicio de sesión', 'El usuario accedio al sistema.', 2),
(28, '2025-03-23 18:14:48', 'Modificación de un rol', 'El usuario modificó la información del rol ( ) la actualizó a: ( ).', 2),
(29, '2025-03-23 19:53:57', 'Modificación de un rol', 'El usuario modificó la información del rol () la actualizó a: ( ).', 2),
(30, '2025-03-25 16:39:08', 'Cierre de sesión', 'El usuario cerró sesión.', 2),
(31, '2025-03-25 18:22:15', 'Inicio de sesión', 'El usuario accedio al sistema.', 2),
(32, '2025-03-25 18:27:48', 'Modificación de un rol', 'Modificación de la información del rol (0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0) la actualizó a ( )', 2),
(33, '2025-03-25 18:48:37', 'Modificación de un rol', 'Modificación de la información del rol () la actualizó a ( )', 2),
(34, '2025-03-25 18:58:37', 'Cierre de sesión', 'El usuario cerró sesión.', 2),
(35, '2025-03-27 15:29:45', 'Inicio de sesión', 'El usuario accedio al sistema.', 2),
(36, '2025-03-27 16:17:50', 'Cierre de sesión', 'El usuario cerró sesión.', 2),
(37, '2025-03-29 16:47:24', 'Inicio de sesión', 'El usuario accedio al sistema.', 8),
(38, '2025-03-29 16:54:53', 'Cierre de sesión', 'El usuario cerró sesión.', 8),
(39, '2025-03-29 16:54:57', 'Inicio de sesión', 'El usuario accedio al sistema.', 2),
(40, '2025-03-30 15:19:41', 'Inicio de sesión', 'El usuario accedio al sistema.', 2),
(41, '2025-03-30 17:57:27', 'Modificación de un servicio', 'El usuario actualizó la información de un servicio de: (nombre del platillo: existe_platillo_nombre_platillo, precio en dolares: existe_platillo_precio_dolar, descripción: existe_platillo_descripcion, estado: existe_platillo_estatus) a: (nombre del platillo: nombre_platillo, precio en dolares: precio_dolar, descripción: descripcion, estado: estado_menu).', 2),
(42, '2025-03-30 18:01:08', 'Modificación de un servicio', 'El usuario actualizó la información de un servicio de: (nombre del platillo: GLUPS \n  precio en dolares: 10 \n , descripción:  COMBO DE REFRESCOS \n , estado: existe_platillo_estatus) a: (nombre del platillo: nombre_platillo, precio en dolares: precio_dolar, descripción: descripcion, estado: estado_menu).', 2),
(43, '2025-03-30 18:08:10', 'Modificación de un servicio', 'El usuario actualizó la información de un servicio\n \n  \n        Información del servicio:\n \n \n        Nombre del platillo: GLUPS \n \n        Precio en dolares: 10$ \n \n        Descripción: COMBO DE REFRESCOS. \n \n        Estado: activo \n\n\n\n\n        Información del servicio actualizada \n \n \n        Nombre del platillo: GLUPS \n \n        Precio en dolares: 15$ \n \n        Descripción: COMBO DE REFRESCOS \n \n        Estado: activo', 2),
(44, '2025-03-30 18:10:29', 'Modificación de un servicio', 'El usuario actualizó la información de un servicio: \n\nInformación del servicio:\n\nNombre del platillo: GLUPS \nPrecio en dolares: 15$ \nDescripción: COMBO DE REFRESCOS. \nEstado: activo \n\n\nInformación del servicio actualizada \n\nNombre del platillo: GLUPS \nPrecio en dolares: 16$ \nDescripción: COMBO DE REFRESCOS \nEstado: activo', 2),
(45, '2025-03-30 18:17:49', 'Registro de un servicio', 'El usuario registro un servicio con la siguiente información: \n\nNombre del platillo: SERVICIO PRUEBA \nPrecio en dolares: 10$ \nDescripción: POLLO Y REFRESCO \nEstado: activo', 2),
(46, '2025-03-30 18:27:56', 'Cambio de estado a un servicio', 'El usuario cambió el estado del servicio con la siguiente información: \n\nNombre del platillo: GLUPS \nEstado: activo', 2),
(47, '2025-03-30 18:31:23', 'Cambio de estado de un servicio', 'El usuario cambió el estado del servicio con la siguiente información: \n\nNombre del platillo: GLUPS \nPrecio en dolares: $ \nDescripción: . \nEstado: Activo \n\n\nInformación del servicio actualizada: \n\nNombre del platillo: GLUPS \nPrecio en dolares: $ \nDescripción: . \nEstado: Inactivo', 2),
(48, '2025-03-30 18:32:46', 'Cambio de estado de un servicio', 'El usuario cambió el estado del servicio con la siguiente información: \n\nNombre del platillo: GLUPS \nPrecio en dolares: 16$ \nDescripción: COMBO DE REFRESCOS. \nEstado: Inactivo \n\n\nInformación del servicio actualizada: \n\nNombre del platillo: GLUPS \nPrecio en dolares: 16$ \nDescripción: COMBO DE REFRESCOS. \nEstado: Activo', 2),
(49, '2025-03-30 18:35:59', 'Modificación de un servicio', 'El usuario actualizó la información de un servicio: \n\nInformación del servicio:\n\nNombre del platillo: POLLO ESPECIAL \nPrecio en dolares: 10$ \nDescripción: POLLO + 3 GLUP. \nEstado: activo \n\n\nInformación del servicio actualizada: \n\nNombre del platillo: POLLO ESPECIAL \nPrecio en dolares: 15$ \nDescripción: POLLO + 3 GLUP \nEstado: activo', 2),
(50, '2025-03-30 21:05:40', 'Intentó acceder sin permisos a la pantalla registro de roles.', 'El usuario fue redirigido al inicio por seguridad.', 2),
(51, '2025-03-30 21:10:35', 'Intentó acceder sin permisos a la pantalla registro de roles.', 'El usuario intentó acceder de manera incorracta a la pantalla sin tener los permisos correspondientes, luego fue redirigido al inicio por seguridad.', 2),
(52, '2025-03-30 21:12:06', 'Intentó acceder sin permisos a la pantalla registro de roles.', 'El usuario intentó acceder de manera incorracta a la pantalla y sin tener los permisos correspondientes, luego fue redirigido al inicio por seguridad.', 2),
(53, '2025-03-30 21:16:32', 'Intentó acceder sin permisos a la pantalla lista de roles.', 'El usuario intentó acceder de manera incorracta a la pantalla y sin tener los permisos correspondientes, luego fue redirigido al inicio por seguridad.', 2),
(54, '2025-03-30 21:27:01', 'Cambio de estado de un rol', 'El usuario cambió el estado del rol con la siguiente información: \n\nNombre del rol: PASANTE \nEstado: Inactivo \n\n\nInformación del servicio actualizada: \n\nNombre del rol: PASANTE \nEstado: Activo', 2),
(55, '2025-03-30 21:49:50', 'Cambio de estado de un rol', 'El usuario cambió el estado del rol con la siguiente información: \n\nNombre del rol: PASANTE \nEstado: Activo \n\n\nInformación del servicio actualizada: \n\nNombre del rol: PASANTE \nEstado: Inactivo', 2),
(56, '2025-03-30 21:49:56', 'Cambio de estado de un rol', 'El usuario cambió el estado del rol con la siguiente información: \n\nNombre del rol: FULL ACCESS \nEstado: Activo \n\n\nInformación del servicio actualizada: \n\nNombre del rol: FULL ACCESS \nEstado: Inactivo', 2),
(57, '2025-03-30 21:50:06', 'Cambio de estado de un rol', 'El usuario cambió el estado del rol con la siguiente información: \n\nNombre del rol: PASANTE \nEstado: Inactivo \n\n\nInformación del servicio actualizada: \n\nNombre del rol: PASANTE \nEstado: Activo', 2),
(58, '2025-03-30 22:32:22', 'Cierre de sesión', 'El usuario cerró sesión.', 2),
(59, '2025-03-31 17:30:00', 'Inicio de sesión', 'El usuario accedio al sistema.', 2),
(60, '2025-03-31 18:56:17', 'Inicio de sesión', 'El usuario accedio al sistema.', 2),
(61, '2025-03-31 19:01:03', 'Cambio de estado de un rol', 'El usuario cambió el estado del rol con la siguiente información: \n\nNombre del rol: EMPLEADO \nEstado: Inactivo \n\n\nInformación del servicio actualizada: \n\nNombre del rol: EMPLEADO \nEstado: Activo', 2),
(62, '2025-03-31 19:04:11', 'Inicio de sesión', 'El usuario accedio al sistema.', 2),
(63, '2025-03-31 19:04:31', 'Modificación de un servicio', 'El usuario actualizó la información de un servicio: \n\nInformación del servicio:\n\nNombre del platillo: GLUPS \nPrecio en dolares: 16$ \nDescripción: COMBO DE REFRESCOS. \nEstado: activo \n\n\nInformación del servicio actualizada: \n\nNombre del platillo: GLUPS \nPrecio en dolares: 12$ \nDescripción: COMBO DE REFRESCOS \nEstado: activo', 2),
(64, '2025-03-31 19:18:26', 'Cierre de sesión', 'El usuario cerró sesión.', 2),
(65, '2025-03-31 19:18:33', 'Inicio de sesión', 'El usuario accedio al sistema.', 2),
(66, '2025-03-31 19:18:36', 'Inicio de sesión', 'El usuario accedio al sistema.', 2),
(67, '2025-03-31 19:18:37', 'Inicio de sesión', 'El usuario accedio al sistema.', 2),
(68, '2025-03-31 19:18:37', 'Inicio de sesión', 'El usuario accedio al sistema.', 2),
(69, '2025-03-31 19:18:37', 'Inicio de sesión', 'El usuario accedio al sistema.', 2),
(70, '2025-03-31 19:18:42', 'Inicio de sesión', 'El usuario accedio al sistema.', 2),
(71, '2025-03-31 19:18:42', 'Inicio de sesión', 'El usuario accedio al sistema.', 2),
(72, '2025-03-31 19:18:42', 'Inicio de sesión', 'El usuario accedio al sistema.', 2),
(73, '2025-03-31 19:18:43', 'Inicio de sesión', 'El usuario accedio al sistema.', 2),
(74, '2025-03-31 19:24:16', 'Inicio de sesión', 'El usuario accedió al sistema.', 2),
(75, '2025-03-31 19:25:03', 'Inicio de sesión', 'El usuario accedió al sistema.', 2),
(76, '2025-03-31 19:31:56', 'Inicio de sesión', 'El usuario accedió al sistema.', 2),
(77, '2025-03-31 19:33:38', 'Inicio de sesión', 'El usuario accedió al sistema.', 2),
(78, '2025-03-31 20:00:56', 'Modificación de un rol', 'El usuario hizo el registro de un rol DenegadoDenegadoDenegadoDenegadoDenegadoDenegadoDenegadoDenegadoDenegadoDenegadoDenegado', 2),
(79, '2025-03-31 20:08:43', 'Modificación de un rol', 'El usuario hizo el registro de un rol DenegadoDenegadoDenegadoDenegadoDenegadoDenegadoDenegadoDenegadoDenegadoDenegadoDenegado', 2),
(80, '2025-03-31 21:32:38', 'Cambio de estado de un rol', 'El usuario cambió el estado del rol con la siguiente información: \n\nNombre del rol: FULL ACCESS \nEstado: Inactivo \n\n\nInformación del servicio actualizada: \n\nNombre del rol: FULL ACCESS \nEstado: Activo', 2),
(81, '2025-03-31 22:09:12', 'Modificación de un rol', 'El usuario modificó el rol con la siguiente información:\n\n\r\n        Nombre del rol: Denegado \n\r\n        -- Modulo Inventario --\n\r\n        Vistas de Proveedores:\r\n        Registro de Proveedores: Permitido \n\r\n        Modificación de Proveedores: Permitido \n\r\n        Lista de Proveedores registrados: Permitido\n\r\n        Historial de compras a Proveedores: Permitido\n\n\r\n        Vistas de Productos:\r\n        Registro de Categorías: Permitido \n\r\n        Registro de Presentación: Permitido \n\r\n        Registro de Productos: Permitido \n\r\n        Lista de Productos: Permitido \n\r\n        Registro de Entrada de Productos: Denegado\n\r\n        Lista de Entradas registradas: Denegado\n\n\r\n        Información del servicio actualizada:\r\n        \n\n\r\n        Nombre del rol: Denegado \n\r\n        Estado: Activo.', 2),
(82, '2025-03-31 22:11:50', 'Modificación de un rol', 'El usuario modificó el rol con la siguiente información:\n\n\r\n        Nombre del rol: Denegado \n\r\n        -- Modulo Inventario --\n\r\n        Vistas de Proveedores:\r\n        Registro de Proveedores: Permitido \n\r\n        Modificación de Proveedores: Permitido \n\r\n        Lista de Proveedores registrados: Permitido\n\r\n        Historial de compras a Proveedores: Permitido\n\n\r\n        Vistas de Productos:\r\n        Registro de Categorías: Denegado \n\r\n        Registro de Presentación: Denegado \n\r\n        Registro de Productos: Denegado \n\r\n        Lista de Productos: Denegado \n\r\n        Registro de Entrada de Productos: Denegado\n\r\n        Lista de Entradas registradas: Denegado\n\n\r\n        Información del servicio actualizada:\r\n        \n\n\r\n        Nombre del rol: Denegado \n\r\n        Estado: Activo.', 2),
(83, '2025-03-31 22:13:43', 'Modificación de un rol', 'El usuario modificó el rol con la siguiente información:\n\r\n        Nombre del rol: Denegado\n\r\n        -- Modulo Inventario --\n\r\n        Vistas de Proveedores:\r\n        Registro de Proveedores: Permitido\n\r\n        Modificación de Proveedores: Permitido\n\r\n        Lista de Proveedores registrados: Permitido\n\r\n        Historial de compras a Proveedores: Permitido\n\n\r\n        Vistas de Productos:\r\n        Registro de Categorías: Permitido\n\r\n        Registro de Presentación: Permitido\n\r\n        Registro de Productos: Permitido\n\r\n        Lista de Productos: Permitido\n\r\n        Registro de Entrada de Productos: Permitido\n\r\n        Lista de Entradas registradas: Permitido\n\n\r\n        Información del servicio actualizada:\r\n        \n\n\r\n        Nombre del rol: Denegado\n\r\n        Estado: Activo.', 2),
(84, '2025-03-31 22:16:00', 'Modificación de un rol', 'El usuario modificó el rol con la siguiente información:\n\r\n        Nombre del rol: Denegado\n\r\n        -- Modulo Inventario --\n\r\n        Vistas de Proveedores:\r\n        Registro de Proveedores: Permitido\n\r\n        Modificación de Proveedores: Permitido\n\r\n        Lista de Proveedores registrados: Permitido\n\r\n        Historial de compras a Proveedores: Permitido\n\n\r\n        Vistas de Productos:\r\n        Registro de Categorías: Denegado\n\r\n        Registro de Presentación: Denegado\n\r\n        Registro de Productos: Denegado\n\r\n        Lista de Productos: Denegado\n\r\n        Registro de Entrada de Productos: Permitido\n\r\n        Lista de Entradas registradas: Permitido\n\n\r\n        Información del servicio actualizada:\r\n        \n\n\r\n        Nombre del rol: Denegado\n\r\n        Estado: Activo.', 2),
(85, '2025-03-31 22:18:29', 'Modificación de un rol', 'El usuario modificó el rol con la siguiente información:\n\r\n        Nombre del rol: FULL COUNTE\n\r\n        -- Modulo Inventario --\n\r\n        Vistas de Proveedores:\r\n        Registro de Proveedores: Permitido\n\r\n        Modificación de Proveedores: Permitido\n\r\n        Lista de Proveedores registrados: Permitido\n\r\n        Historial de compras a Proveedores: Permitido\n\n\r\n        Vistas de Productos:\r\n        Registro de Categorías: Permitido\n\r\n        Registro de Presentación: Permitido\n\r\n        Registro de Productos: Permitido\n\r\n        Lista de Productos: Permitido\n\r\n        Registro de Entrada de Productos: Denegado\n\r\n        Lista de Entradas registradas: Denegado\n\n\r\n        Información del servicio actualizada:\r\n        \n\n\r\n        Nombre del rol: FULL COUNTE\n\r\n        Estado: Activo.', 2),
(86, '2025-03-31 23:33:55', 'Modificación de un servicio', 'El usuario actualizó la información de un servicio: \n\nInformación del servicio:\n\nNombre del platillo: POLLO COREANO \nPrecio en dolares: 4$ \nDescripción: POLLO FRITO COREANO. \nEstado: activo \n\n\nInformación del servicio actualizada: \n\nNombre del platillo: POLLO COREANO \nPrecio en dolares: 14$ \nDescripción: POLLO FRITO COREANO \nEstado: activo', 2),
(87, '2025-03-31 23:37:29', 'Intentó acceder sin permisos a la pantalla registro de servicios.', 'El usuario intentó acceder de manera incorracta a la pantalla y sin tener los permisos correspondientes, este fué redirigido a la pantalla de inicio por seguridad.', 2),
(88, '2025-04-01 00:07:12', 'Intentó acceder sin permisos a la pantalla lista de proveedores.', 'El usuario intentó acceder de manera incorracta a la pantalla y sin tener los permisos correspondientes, este fué redirigido a la pantalla de inicio por seguridad.', 2),
(89, '2025-04-01 00:21:03', 'Intentó acceder sin permisos a la pantalla lista de productos.', 'El usuario intentó acceder de manera incorracta a la pantalla y sin tener los permisos correspondientes, este fué redirigido a la pantalla de inicio por seguridad.', 2),
(90, '2025-04-01 00:26:09', 'Intentó acceder sin permisos a la pantalla lista de entradas.', 'El usuario intentó acceder de manera incorracta a la pantalla y sin tener los permisos correspondientes, este fué redirigido a la pantalla de inicio por seguridad.', 2),
(91, '2025-04-01 00:27:54', 'Cierre de sesión', 'El usuario cerró sesión.', 2),
(92, '2025-04-01 07:43:51', 'Inicio de sesión', 'El usuario accedió al sistema.', 2),
(93, '2025-04-01 07:44:34', 'Cambio de estado de un rol', 'El usuario cambió el estado del rol con la siguiente información: \n\nNombre del rol: PASANTE \nEstado: Activo \n\n\nInformación del servicio actualizada: \n\nNombre del rol: PASANTE \nEstado: Inactivo', 2),
(94, '2025-04-01 07:44:42', 'Cambio de estado de un rol', 'El usuario cambió el estado del rol con la siguiente información: \n\nNombre del rol: EMPLEADO \nEstado: Activo \n\n\nInformación del servicio actualizada: \n\nNombre del rol: EMPLEADO \nEstado: Inactivo', 2),
(95, '2025-04-01 07:47:39', 'Cierre de sesión', 'El usuario cerró sesión.', 2),
(96, '2025-04-01 07:48:24', 'Inicio de sesión', 'El usuario accedió al sistema.', 8),
(97, '2025-04-01 07:49:55', 'Cierre de sesión', 'El usuario cerró sesión.', 8),
(98, '2025-04-01 07:50:02', 'Inicio de sesión', 'El usuario accedió al sistema.', 2),
(99, '2025-04-01 07:50:44', 'Modificación de un rol', 'El usuario modificó el rol con la siguiente información:\n\r\n        Nombre del rol: PASANTE\n\r\n        -- Modulo Inventario --\n\r\n        Vistas de Proveedores:\r\n        Registro de Proveedores: Denegado\n\r\n        Modificación de Proveedores: Denegado\n\r\n        Lista de Proveedores registrados: Denegado\n\r\n        Historial de compras a Proveedores: Denegado\n\n\r\n        Vistas de Productos:\r\n        Registro de Categorías: Denegado\n\r\n        Registro de Presentación: Permitido\n\r\n        Registro de Productos: Denegado\n\r\n        Lista de Productos: Denegado\n\r\n        Registro de Entrada de Productos: Denegado\n\r\n        Lista de Entradas registradas: Denegado\n\n\r\n        Información del servicio actualizada:\r\n        \n\n\r\n        Nombre del rol: PASANTE\n\r\n        Estado: Activo.', 2),
(100, '2025-04-01 07:51:05', 'Cierre de sesión', 'El usuario cerró sesión.', 2),
(101, '2025-04-01 07:51:12', 'Inicio de sesión', 'El usuario accedió al sistema.', 8),
(102, '2025-04-01 07:52:01', 'Cierre de sesión', 'El usuario cerró sesión.', 8),
(103, '2025-04-01 07:52:09', 'Inicio de sesión', 'El usuario accedió al sistema.', 2),
(104, '2025-04-01 08:07:38', 'Inicio de sesión', 'El usuario accedió al sistema.', 8),
(105, '2025-04-01 08:07:51', 'Inicio de sesión', 'El usuario accedió al sistema.', 8),
(106, '2025-04-01 08:09:45', 'Cierre de sesión', 'El usuario cerró sesión.', 8),
(107, '2025-04-01 08:10:05', 'Inicio de sesión', 'El usuario accedió al sistema.', 8),
(108, '2025-04-01 08:10:16', 'Inicio de sesión', 'El usuario accedió al sistema.', 8),
(109, '2025-04-01 08:16:41', 'Cierre de sesión', 'El usuario cerró sesión.', 8),
(110, '2025-04-03 19:00:27', 'El usuario inició sesión', 'El usuario accedió al sistema.', 2),
(111, '2025-04-03 19:00:28', 'El usuario inició sesión', 'El usuario accedió al sistema.', 2),
(112, '2025-04-03 19:00:28', 'El usuario inició sesión', 'El usuario accedió al sistema.', 2),
(113, '2025-04-03 19:00:29', 'El usuario inició sesión', 'El usuario accedió al sistema.', 2),
(114, '2025-04-03 19:00:29', 'El usuario inició sesión', 'El usuario accedió al sistema.', 2),
(115, '2025-04-03 19:00:55', 'El usuario inició sesión', 'El usuario accedió al sistema.', 2),
(116, '2025-04-03 19:00:55', 'El usuario inició sesión', 'El usuario accedió al sistema.', 2),
(117, '2025-04-03 19:01:07', 'El usuario inició sesión', 'El usuario accedió al sistema.', 2),
(118, '2025-04-03 19:01:13', 'El usuario inició sesión', 'El usuario accedió al sistema.', 2),
(119, '2025-04-03 19:01:14', 'El usuario inició sesión', 'El usuario accedió al sistema.', 2),
(120, '2025-04-03 19:01:14', 'El usuario inició sesión', 'El usuario accedió al sistema.', 2),
(121, '2025-04-03 19:01:14', 'El usuario inició sesión', 'El usuario accedió al sistema.', 2),
(122, '2025-04-03 19:01:14', 'El usuario inició sesión', 'El usuario accedió al sistema.', 2),
(123, '2025-04-03 19:01:15', 'El usuario inició sesión', 'El usuario accedió al sistema.', 2),
(124, '2025-04-03 19:01:15', 'El usuario inició sesión', 'El usuario accedió al sistema.', 2),
(125, '2025-04-03 19:01:15', 'El usuario inició sesión', 'El usuario accedió al sistema.', 2),
(126, '2025-04-03 19:03:41', 'El usuario inició sesión', 'El usuario accedió al sistema.', 2),
(127, '2025-04-03 19:03:43', 'El usuario inició sesión', 'El usuario accedió al sistema.', 2),
(128, '2025-04-03 19:03:43', 'El usuario inició sesión', 'El usuario accedió al sistema.', 2),
(129, '2025-04-03 19:03:43', 'El usuario inició sesión', 'El usuario accedió al sistema.', 2),
(130, '2025-04-03 19:03:43', 'El usuario inició sesión', 'El usuario accedió al sistema.', 2),
(131, '2025-04-03 19:03:44', 'El usuario inició sesión', 'El usuario accedió al sistema.', 2),
(132, '2025-04-03 19:11:48', 'El usuario inició sesión', 'El usuario accedió al sistema.', 2),
(133, '2025-04-03 19:11:52', 'El usuario inició sesión', 'El usuario accedió al sistema.', 2),
(134, '2025-04-03 19:11:52', 'El usuario inició sesión', 'El usuario accedió al sistema.', 2),
(135, '2025-04-03 19:11:52', 'El usuario inició sesión', 'El usuario accedió al sistema.', 2),
(136, '2025-04-03 19:11:53', 'El usuario inició sesión', 'El usuario accedió al sistema.', 2),
(137, '2025-04-03 19:12:26', 'El usuario inició sesión', 'El usuario accedió al sistema.', 2),
(138, '2025-04-03 19:12:27', 'El usuario inició sesión', 'El usuario accedió al sistema.', 2),
(139, '2025-04-03 19:12:27', 'El usuario inició sesión', 'El usuario accedió al sistema.', 2),
(140, '2025-04-03 19:12:27', 'El usuario inició sesión', 'El usuario accedió al sistema.', 2),
(141, '2025-04-03 19:12:28', 'El usuario inició sesión', 'El usuario accedió al sistema.', 2),
(142, '2025-04-03 19:14:30', 'El usuario inició sesión', 'El usuario accedió al sistema.', 2),
(143, '2025-04-03 19:16:05', 'El usuario inició sesión', 'El usuario accedió al sistema.', 2),
(144, '2025-04-03 19:16:52', 'El usuario inició sesión', 'El usuario accedió al sistema.', 8),
(145, '2025-04-03 19:34:40', 'Cierre de sesión', 'El usuario cerró sesión.', 8),
(146, '2025-04-06 15:06:06', 'El usuario inició sesión', 'El usuario accedió al sistema.', 2),
(147, '2025-04-06 15:06:22', 'El usuario inició sesión', 'El usuario accedió al sistema.', 2),
(148, '2025-04-06 15:07:10', 'El usuario inició sesión', 'El usuario accedió al sistema.', 2),
(149, '2025-04-06 15:07:56', 'El usuario inició sesión', 'El usuario accedió al sistema.', 2),
(150, '2025-04-06 15:09:06', 'El usuario inició sesión', 'El usuario accedió al sistema.', 2),
(151, '2025-04-06 15:11:31', 'El usuario inició sesión', 'El usuario accedió al sistema.', 2),
(152, '2025-04-06 15:12:00', 'El usuario inició sesión', 'El usuario accedió al sistema.', 2),
(153, '2025-04-06 15:13:59', 'El usuario inició sesión', 'El usuario accedió al sistema.', 2),
(154, '2025-04-06 15:14:26', 'El usuario inició sesión', 'El usuario accedió al sistema.', 2),
(155, '2025-04-06 15:15:18', 'El usuario inició sesión', 'El usuario accedió al sistema.', 2),
(156, '2025-04-06 15:15:25', 'El usuario inició sesión', 'El usuario accedió al sistema.', 2),
(157, '2025-04-06 15:18:23', 'El usuario inició sesión', 'El usuario accedió al sistema.', 2),
(158, '2025-04-06 18:48:19', 'El usuario inició sesión', 'El usuario accedió al sistema.', 2),
(159, '2025-04-06 18:49:16', 'El usuario inició sesión', 'El usuario accedió al sistema.', 2),
(160, '2025-04-06 18:49:33', 'El usuario inició sesión', 'El usuario accedió al sistema.', 2),
(161, '2025-04-06 19:00:17', 'El usuario inició sesión', 'El usuario accedió al sistema.', 2),
(162, '2025-04-06 19:03:08', 'El usuario inició sesión', 'El usuario accedió al sistema.', 2),
(163, '2025-04-06 19:03:44', 'El usuario inició sesión', 'El usuario accedió al sistema.', 2),
(164, '2025-04-06 19:04:40', 'El usuario inició sesión', 'El usuario accedió al sistema.', 8),
(165, '2025-04-06 19:04:51', 'El usuario inició sesión', 'El usuario accedió al sistema.', 8),
(166, '2025-04-06 19:05:52', 'El usuario inició sesión', 'El usuario accedió al sistema.', 8),
(167, '2025-04-06 19:06:57', 'El usuario inició sesión', 'El usuario accedió al sistema.', 2),
(168, '2025-04-06 19:09:24', 'Cierre de sesión', 'El usuario cerró sesión.', 2),
(169, '2025-04-06 19:09:47', 'El usuario inició sesión', 'El usuario accedió al sistema.', 8),
(170, '2025-04-06 19:15:01', 'El usuario inició sesión', 'El usuario accedió al sistema.', 2),
(171, '2025-04-06 19:15:24', 'El usuario inició sesión', 'El usuario accedió al sistema.', 8),
(172, '2025-04-06 19:16:21', 'El usuario inició sesión', 'El usuario accedió al sistema.', 2),
(173, '2025-04-06 19:22:34', 'Cierre de sesión', 'El usuario cerró sesión.', 2),
(174, '2025-04-06 19:25:19', 'El usuario inició sesión', 'El usuario accedió al sistema.', 2),
(175, '2025-04-06 19:25:27', 'El usuario inició sesión', 'El usuario accedió al sistema.', 2),
(176, '2025-04-06 19:25:38', 'El usuario inició sesión', 'El usuario accedió al sistema.', 2),
(177, '2025-04-06 19:26:27', 'El usuario inició sesión', 'El usuario accedió al sistema.', 2),
(178, '2025-04-06 19:27:43', 'El usuario inició sesión', 'El usuario accedió al sistema.', 2),
(179, '2025-04-06 19:28:54', 'El usuario inició sesión', 'El usuario accedió al sistema.', 2),
(180, '2025-04-06 19:29:31', 'Cierre de sesión', 'El usuario cerró sesión.', 2),
(181, '2025-04-06 19:29:37', 'El usuario inició sesión', 'El usuario accedió al sistema.', 2),
(182, '2025-04-06 19:30:13', 'El usuario inició sesión', 'El usuario accedió al sistema.', 2),
(183, '2025-04-06 19:30:20', 'Cierre de sesión', 'El usuario cerró sesión.', 2),
(184, '2025-04-06 19:30:27', 'El usuario inició sesión', 'El usuario accedió al sistema.', 2),
(185, '2025-04-06 19:34:58', 'Cambio de estado de un rol', 'El usuario cambió el estado del rol con la siguiente información: \n\nNombre del rol: FULL ACCESS \nEstado: Activo \n\n\nInformación del servicio actualizada: \n\nNombre del rol: FULL ACCESS \nEstado: Inactivo', 2),
(186, '2025-04-06 19:39:34', 'Cierre de sesión', 'El usuario cerró sesión.', 2),
(187, '2025-04-10 19:24:29', 'El usuario inició sesión', 'El usuario accedió al sistema.', 2),
(188, '2025-04-10 21:03:42', 'Intento de acceso al sistema sin autenticación previa.', 'Se ha registrado un intento de acceso al sistema sin autenticación previa. Un usuario ha intentado acceder de manera no autorizada.', 2),
(189, '2025-04-11 10:05:03', 'El usuario inició sesión', 'El usuario accedió al sistema.', 2),
(190, '2025-04-11 10:32:02', 'Registro de un rol', 'El usuario Registró el rol con la siguiente información:\n\n\r\n        Nombre del rol:  \n\r\n        -- Modulo Inventario --\n\r\n        Vistas de Proveedores:\r\n        Registro de Proveedores:  \n\r\n        Modificación de Proveedores:  \n\r\n        Lista de Proveedores registrados: \n\r\n        Historial de compras a Proveedores: \n\n\r\n        Vistas de Productos:\r\n        Registro de Categorías:  \n\r\n        Registro de Presentación:  \n\r\n        Registro de Productos:  \n\r\n        Lista de Productos:  \n\r\n        Registro de Entrada de Productos: \n\r\n        Lista de Entradas registradas: \n\n\r\n        Información del servicio actualizada:\r\n        \n\n\r\n        Nombre del rol:  \n\r\n        Estado: Activo.', 2),
(191, '2025-04-11 11:14:07', 'Modificación de un rol', 'El usuario modificó el rol con la siguiente información:\n\r\n        Nombre del rol: ROL\n\r\n        -- Modulo Inventario --\n\r\n        Vistas de Proveedores:\r\n        Registro de Proveedores: Denegado\n\r\n        Modificación de Proveedores: Denegado\n\r\n        Lista de Proveedores registrados: Denegado\n\r\n        Historial de compras a Proveedores: Denegado\n\n\r\n        Vistas de Productos:\r\n        Registro de Categorías: Denegado\n\r\n        Registro de Presentación: Denegado\n\r\n        Registro de Productos: Denegado\n\r\n        Lista de Productos: Denegado\n\r\n        Registro de Entrada de Productos: Denegado\n\r\n        Lista de Entradas registradas: Denegado\n\n\r\n        Información del servicio actualizada:\r\n        \n\n\r\n        Nombre del rol: ROL\n\r\n        Estado: Activo.', 2),
(192, '2025-04-11 16:12:05', 'Cierre de sesión', 'El usuario cerró sesión.', 2),
(193, '2025-04-11 16:13:07', 'El usuario inició sesión', 'El usuario accedió al sistema.', 8),
(194, '2025-04-11 16:13:43', 'El usuario inició sesión', 'El usuario accedió al sistema.', 8),
(195, '2025-04-11 16:14:53', 'El usuario inició sesión', 'El usuario accedió al sistema.', 2),
(196, '2025-04-11 16:15:42', 'Cierre de sesión', 'El usuario cerró sesión.', 2),
(197, '2025-04-11 16:15:54', 'El usuario inició sesión', 'El usuario accedió al sistema.', 2),
(198, '2025-04-11 16:16:44', 'Modificación de un rol', 'El usuario modificó el rol con la siguiente información:\n\r\n        Nombre del rol: ROL\n\r\n        -- Modulo Inventario --\n\r\n        Vistas de Proveedores:\r\n        Registro de Proveedores: Denegado\n\r\n        Modificación de Proveedores: Denegado\n\r\n        Lista de Proveedores registrados: Denegado\n\r\n        Historial de compras a Proveedores: Permitido\n\n\r\n        Vistas de Productos:\r\n        Registro de Categorías: Denegado\n\r\n        Registro de Presentación: Permitido\n\r\n        Registro de Productos: Denegado\n\r\n        Lista de Productos: Denegado\n\r\n        Registro de Entrada de Productos: Denegado\n\r\n        Lista de Entradas registradas: Denegado\n\n\r\n        Información del servicio actualizada:\r\n        \n\n\r\n        Nombre del rol: ROL\n\r\n        Estado: Activo.', 2),
(199, '2025-04-11 16:17:02', 'Cambio de estado de un rol', 'El usuario cambió el estado del rol con la siguiente información: \n\nNombre del rol: FULL ACCESS \nEstado: Inactivo \n\n\nInformación del servicio actualizada: \n\nNombre del rol: FULL ACCESS \nEstado: Activo', 2),
(200, '2025-04-11 16:17:12', 'Cierre de sesión', 'El usuario cerró sesión.', 8),
(201, '2025-04-11 16:17:34', 'Cierre de sesión', 'El usuario cerró sesión.', 2),
(202, '2025-04-12 11:04:00', 'El usuario inició sesión', 'El usuario accedió al sistema.', 2),
(203, '2025-04-12 12:45:47', 'Cierre de sesión', 'El usuario cerró sesión.', 2),
(204, '2025-04-12 13:02:13', 'El usuario inició sesión', 'El usuario accedió al sistema.', 2),
(205, '2025-04-12 13:03:12', 'Cierre de sesión', 'El usuario cerró sesión.', 2),
(206, '2025-04-12 13:03:19', 'El usuario inició sesión', 'El usuario accedió al sistema.', 2),
(207, '2025-04-12 13:03:49', 'Cierre de sesión', 'El usuario cerró sesión.', 2),
(208, '2025-04-12 13:03:55', 'El usuario inició sesión', 'El usuario accedió al sistema.', 2),
(209, '2025-04-12 13:05:08', 'Cierre de sesión', 'El usuario cerró sesión.', 2),
(210, '2025-04-12 13:05:13', 'El usuario inició sesión', 'El usuario accedió al sistema.', 2),
(211, '2025-04-12 13:07:53', 'El usuario inició sesión', 'El usuario accedió al sistema.', 2),
(212, '2025-04-12 13:09:11', 'El usuario inició sesión', 'El usuario accedió al sistema.', 2),
(213, '2025-04-12 13:14:58', 'Modificación de un rol', 'El usuario modificó el rol con la siguiente información:\n\r\n        Nombre del rol: ROL\n\r\n        -- Modulo Inventario --\n\r\n        Vistas de Proveedores:\r\n        Registro de Proveedores: Permitido\n\r\n        Modificación de Proveedores: Permitido\n\r\n        Lista de Proveedores registrados: Permitido\n\r\n        Historial de compras a Proveedores: Permitido\n\n\r\n        Vistas de Productos:\r\n        Registro de Categorías: Denegado\n\r\n        Registro de Presentación: Denegado\n\r\n        Registro de Productos: Denegado\n\r\n        Lista de Productos: Denegado\n\r\n        Registro de Entrada de Productos: Denegado\n\r\n        Lista de Entradas registradas: Denegado\n\n\r\n        Información del servicio actualizada:\r\n        \n\n\r\n        Nombre del rol: ROL\n\r\n        Estado: Activo.', 2),
(214, '2025-04-12 13:26:11', 'Modificación de un rol', 'El usuario modificó el rol con la siguiente información:\n\r\n        Nombre del rol: FULL COUNTE\n\r\n        -- Modulo Inventario --\n\r\n        Vistas de Proveedores:\r\n        Registro de Proveedores: Permitido\n\r\n        Modificación de Proveedores: Permitido\n\r\n        Lista de Proveedores registrados: Permitido\n\r\n        Historial de compras a Proveedores: Permitido\n\n\r\n        Vistas de Productos:\r\n        Registro de Categorías: Denegado\n\r\n        Registro de Presentación: Denegado\n\r\n        Registro de Productos: Denegado\n\r\n        Lista de Productos: Denegado\n\r\n        Registro de Entrada de Productos: Denegado\n\r\n        Lista de Entradas registradas: Denegado\n\n\r\n        Información del servicio actualizada:\r\n        \n\n\r\n        Nombre del rol: FULL COUNTE\n\r\n        Estado: Activo.', 2),
(215, '2025-04-12 14:15:27', 'Modificación de un rol', 'El usuario modificó el rol con la siguiente información:\n\r\n        Nombre del rol: PASANTE\n\r\n        -- Modulo Inventario --\n\r\n        Vistas de Proveedores:\r\n        Registro de Proveedores: Permitido\n\r\n        Modificación de Proveedores: Permitido\n\r\n        Lista de Proveedores registrados: Permitido\n\r\n        Historial de compras a Proveedores: Permitido\n\n\r\n        Vistas de Productos:\r\n        Registro de Categorías: Denegado\n\r\n        Registro de Presentación: Denegado\n\r\n        Registro de Productos: Denegado\n\r\n        Lista de Productos: Denegado\n\r\n        Registro de Entrada de Productos: Denegado\n\r\n        Lista de Entradas registradas: Denegado\n\n\r\n        Información del servicio actualizada:\r\n        \n\n\r\n        Nombre del rol: PASANTE\n\r\n        Estado: Activo.', 2),
(216, '2025-04-12 14:35:39', 'Modificación de un rol', 'El usuario modificó el rol con la siguiente información:\n\r\n        Nombre del rol: ROL\n\r\n        -- Modulo Inventario --\n\r\n        Vistas de Proveedores:\r\n        Registro de Proveedores: Permitido\n\r\n        Modificación de Proveedores: Permitido\n\r\n        Lista de Proveedores registrados: Permitido\n\r\n        Historial de compras a Proveedores: Permitido\n\n\r\n        Vistas de Productos:\r\n        Registro de Categorías: Permitido\n\r\n        Registro de Presentación: Permitido\n\r\n        Registro de Productos: Permitido\n\r\n        Lista de Productos: Permitido\n\r\n        Registro de Entrada de Productos: Permitido\n\r\n        Lista de Entradas registradas: Permitido\n\n\r\n        Información del servicio actualizada:\r\n        \n\n\r\n        Nombre del rol: ROL\n\r\n        Estado: Activo.', 2),
(217, '2025-04-12 14:35:59', 'Modificación de un rol', 'El usuario modificó el rol con la siguiente información:\n\r\n        Nombre del rol: ADIMINISTRADOR\n\r\n        -- Modulo Inventario --\n\r\n        Vistas de Proveedores:\r\n        Registro de Proveedores: Permitido\n\r\n        Modificación de Proveedores: Permitido\n\r\n        Lista de Proveedores registrados: Permitido\n\r\n        Historial de compras a Proveedores: Permitido\n\n\r\n        Vistas de Productos:\r\n        Registro de Categorías: Permitido\n\r\n        Registro de Presentación: Permitido\n\r\n        Registro de Productos: Permitido\n\r\n        Lista de Productos: Permitido\n\r\n        Registro de Entrada de Productos: Permitido\n\r\n        Lista de Entradas registradas: Permitido\n\n\r\n        Información del servicio actualizada:\r\n        \n\n\r\n        Nombre del rol: ADIMINISTRADOR\n\r\n        Estado: Activo.', 2),
(218, '2025-04-12 15:03:08', 'Modificación de un rol', 'El usuario modificó el rol con la siguiente información:\n\r\n        Nombre del rol: ADIMINISTRADOR\n\r\n        -- Modulo Inventario --\n\r\n        Vistas de Proveedores:\r\n        Registro de Proveedores: Permitido\n\r\n        Modificación de Proveedores: Permitido\n\r\n        Lista de Proveedores registrados: Permitido\n\r\n        Historial de compras a Proveedores: Permitido\n\n\r\n        Vistas de Productos:\r\n        Registro de Categorías: Permitido\n\r\n        Registro de Presentación: Permitido\n\r\n        Registro de Productos: Permitido\n\r\n        Lista de Productos: Permitido\n\r\n        Registro de Entrada de Productos: Permitido\n\r\n        Lista de Entradas registradas: Permitido\n\n\r\n        Información del servicio actualizada:\r\n        \n\n\r\n        Nombre del rol: ADIMINISTRADOR\n\r\n        Estado: Activo.', 2),
(219, '2025-04-15 12:59:17', 'El usuario inició sesión', 'El usuario accedió al sistema.', 2),
(220, '2025-04-15 13:01:46', 'Cierre de sesión', 'El usuario cerró sesión.', 2),
(221, '2025-04-22 18:54:57', 'El usuario inició sesión', 'El usuario accedió al sistema.', 2),
(222, '2025-04-22 20:26:09', 'Modificación de un rol', 'El usuario modificó el rol con la siguiente información:\n\r\n        Nombre del rol: ADIMINISTRADOR\n\r\n        -- Modulo Inventario --\n\r\n        Vistas de Proveedores:\r\n        Registro de Proveedores: Permitido\n\r\n        Modificación de Proveedores: Permitido\n\r\n        Lista de Proveedores registrados: Permitido\n\r\n        Historial de compras a Proveedores: Permitido\n\n\r\n        Vistas de Productos:\r\n        Registro de Categorías: Permitido\n\r\n        Registro de Presentación: Permitido\n\r\n        Registro de Productos: Permitido\n\r\n        Lista de Productos: Permitido\n\r\n        Registro de Entrada de Productos: Permitido\n\r\n        Lista de Entradas registradas: Permitido\n\n\r\n        Información del servicio actualizada:\r\n        \n\n\r\n        Nombre del rol: ADIMINISTRADOR\n\r\n        Estado: Activo.', 2),
(223, '2025-04-22 20:33:51', 'Modificación de un rol', 'El usuario modificó el rol con la siguiente información:\n\r\n        Nombre del rol: ADIMINISTRADOR\n\r\n        -- Modulo Inventario --\n\r\n        Vistas de Proveedores:\r\n        Registro de Proveedores: Permitido\n\r\n        Modificación de Proveedores: Permitido\n\r\n        Lista de Proveedores registrados: Permitido\n\r\n        Historial de compras a Proveedores: Permitido\n\n\r\n        Vistas de Productos:\r\n        Registro de Categorías: Permitido\n\r\n        Registro de Presentación: Permitido\n\r\n        Registro de Productos: Permitido\n\r\n        Lista de Productos: Permitido\n\r\n        Registro de Entrada de Productos: Permitido\n\r\n        Lista de Entradas registradas: Permitido\n\n\r\n        Información del servicio actualizada:\r\n        \n\n\r\n        Nombre del rol: ADIMINISTRADOR\n\r\n        Estado: Activo.', 2),
(224, '2025-04-22 20:34:18', 'Modificación de un rol', 'El usuario modificó el rol con la siguiente información:\n\r\n        Nombre del rol: PASANTE\n\r\n        -- Modulo Inventario --\n\r\n        Vistas de Proveedores:\r\n        Registro de Proveedores: Permitido\n\r\n        Modificación de Proveedores: Permitido\n\r\n        Lista de Proveedores registrados: Permitido\n\r\n        Historial de compras a Proveedores: Permitido\n\n\r\n        Vistas de Productos:\r\n        Registro de Categorías: Permitido\n\r\n        Registro de Presentación: Permitido\n\r\n        Registro de Productos: Denegado\n\r\n        Lista de Productos: Denegado\n\r\n        Registro de Entrada de Productos: Denegado\n\r\n        Lista de Entradas registradas: Denegado\n\n\r\n        Información del servicio actualizada:\r\n        \n\n\r\n        Nombre del rol: PASANTE\n\r\n        Estado: Activo.', 2),
(225, '2025-04-22 20:46:24', 'Cierre de sesión', 'El usuario cerró sesión.', 2),
(226, '2025-04-24 20:02:09', 'El usuario inició sesión', 'El usuario accedió al sistema.', 2),
(227, '2025-04-24 21:05:37', 'Modificación de un rol', 'El usuario modificó el rol con la siguiente información:\n\r\n        Nombre del rol: ADIMINISTRADOR\n\r\n        -- Modulo Inventario --\n\r\n        Vistas de Proveedores:\r\n        Registro de Proveedores: Permitido\n\r\n        Modificación de Proveedores: Permitido\n\r\n        Lista de Proveedores registrados: Permitido\n\r\n        Historial de compras a Proveedores: Permitido\n\n\r\n        Vistas de Productos:\r\n        Registro de Categorías: Permitido\n\r\n        Registro de Presentación: Permitido\n\r\n        Registro de Productos: Permitido\n\r\n        Lista de Productos: Permitido\n\r\n        Registro de Entrada de Productos: Permitido\n\r\n        Lista de Entradas registradas: Permitido\n\n\r\n        Información del servicio actualizada:\r\n        \n\n\r\n        Nombre del rol: ADIMINISTRADOR\n\r\n        Estado: Activo.', 2),
(228, '2025-04-24 21:11:08', 'Modificación de un rol', 'El usuario modificó el rol con la siguiente información:\n\r\n        Nombre del rol: ADIMINISTRADOR\n\r\n        -- Modulo Inventario --\n\r\n        Vistas de Proveedores:\r\n        Registro de Proveedores: Permitido\n\r\n        Modificación de Proveedores: Permitido\n\r\n        Lista de Proveedores registrados: Permitido\n\r\n        Historial de compras a Proveedores: Permitido\n\n\r\n        Vistas de Productos:\r\n        Registro de Categorías: Permitido\n\r\n        Registro de Presentación: Permitido\n\r\n        Registro de Productos: Permitido\n\r\n        Lista de Productos: Permitido\n\r\n        Registro de Entrada de Productos: Permitido\n\r\n        Lista de Entradas registradas: Permitido\n\n\r\n        Información del servicio actualizada:\r\n        \n\n\r\n        Nombre del rol: ADIMINISTRADOR\n\r\n        Estado: Activo.', 2),
(229, '2025-04-24 21:12:31', 'Cambio de estado de un rol', 'El usuario cambió el estado del rol con la siguiente información: \n\nNombre del rol: ROL \nEstado: Inactivo \n\n\nInformación del servicio actualizada: \n\nNombre del rol: ROL \nEstado: Activo', 2),
(230, '2025-04-24 21:26:41', 'Intento de acceso al sistema sin autenticación previa.', 'Un usuario intento acceder al sistema de manera incorrecta.', 2),
(231, '2025-04-24 21:27:09', 'El usuario inició sesión', 'El usuario accedió al sistema.', 2),
(232, '2025-04-24 22:04:42', 'Cierre de sesión', 'El usuario cerró sesión.', 2),
(233, '2025-04-24 23:55:40', 'Inicio de sesión', 'El usuario ha iniciado sesión en el sistema.', 2),
(234, '2025-04-24 23:56:48', 'Cierre de sesión', 'El usuario cerró sesión.', 2),
(235, '2025-04-25 13:48:45', 'Inicio de sesión', 'El usuario ha iniciado sesión en el sistema.', 2),
(236, '2025-04-25 22:53:50', 'Cierre de sesión', 'El usuario cerró sesión.', 2),
(237, '2025-04-26 09:31:51', 'Inicio de sesión', 'El usuario ha iniciado sesión en el sistema.', 2),
(238, '2025-04-26 13:05:28', 'Modificación de un rol', 'El usuario modificó el rol con la siguiente información:\n\r\n        Nombre del rol: FULL COUNTE\n\r\n        -- Modulo Inventario --\n\r\n        Vistas de Proveedores:\r\n        Registro de Proveedores: Permitido\n\r\n        Modificación de Proveedores: Permitido\n\r\n        Lista de Proveedores registrados: Permitido\n\r\n        Historial de compras a Proveedores: Permitido\n\n\r\n        Vistas de Productos:\r\n        Registro de Categorías: Permitido\n\r\n        Registro de Presentación: Permitido\n\r\n        Registro de Productos: Permitido\n\r\n        Lista de Productos: Permitido\n\r\n        Registro de Entrada de Productos: Permitido\n\r\n        Lista de Entradas registradas: Permitido\n\n\r\n        Información del servicio actualizada:\r\n        \n\n\r\n        Nombre del rol: FULL COUNTE\n\r\n        Estado: Activo.', 2),
(239, '2025-04-26 13:16:29', 'Modificación del perfil de usuario', 'El usuario actualizó su información personal \n\r\n        Información original:\n Cédula: E-28587583 \n\r\n        Nombre: DANIEL JosÉ \n\r\n        Apellido: BARRUETA \n\r\n        Correo: Ddbarrueta42@gmai.com \n\n\r\n        Información Actual:\n\r\n        Cédula: V-28587583\n\r\n        Nombre: DANIEL JOSÉ\n\r\n        Apellido: BARRUETA\n\r\n        Correo: Ddbarrueta42@gmai.com', 2),
(240, '2025-04-26 13:16:53', 'Modificación del perfil de usuario', 'El usuario actualizó su información personal \n\r\n        Información original:\n Cédula: V-28587583 \n\r\n        Nombre: DANIEL JOSÉ \n\r\n        Apellido: BARRUETA \n\r\n        Correo: Ddbarrueta42@gmai.com \n\n\r\n        Información Actual:\n\r\n        Cédula: E-28587583\n\r\n        Nombre: DANIEL JOSÉ\n\r\n        Apellido: BARRUETA PICHARDO\n\r\n        Correo: dbarrueta42@gmai.com', 2),
(241, '2025-04-26 13:19:33', 'Modificación del perfil de usuario', 'El usuario actualizó su información personal \n\r\n        Información original:\n Cédula: E-28587583 \n\r\n        Nombre: DANIEL JOSÉ \n\r\n        Apellido: BARRUETA PICHARDO \n\r\n        Correo: dbarrueta42@gmai.com \n\n\r\n        Información Actual:\n\r\n        Cédula: V-28587583\n\r\n        Nombre: DANIEL JOSÉ\n\r\n        Apellido: BARRUETA PICHARDO\n\r\n        Correo: dbarrueta42@gmai.com', 2),
(242, '2025-04-26 13:30:11', 'Modificación del perfil de usuario', 'El usuario actualizó su información personal\n\r\n        Información original:\n\r\n        Cédula: V-28587583\n\r\n        Nombre: DANIEL JOSÉ\n\r\n        Apellido: BARRUETA PICHARDO\n\r\n        Correo: dbarrueta42@gmai.com\n\n\r\n        Información Actual:\n\r\n        Cédula: V-28587583\n\r\n        Nombre: DANIEL\n\r\n        Apellido: BARRUETA\n\r\n        Correo: dbarrueta42@gmai.com', 2),
(243, '2025-04-26 15:07:36', 'Modificación del perfil de usuario', 'El usuario actualizó su información personal\n\r\n        Información original:\n\r\n        Cédula: V-28587583\n\r\n        Nombre: DANIEL\n\r\n        Apellido: BARRUETA\n\r\n        Correo: dbarrueta42@gmai.com\n\n\r\n        Información Actual:\n\r\n        Cédula: V-28587583\n\r\n        Nombre: DANIEL\n\r\n        Apellido: BARRUETA\n\r\n        Correo: ppprrueta42@gmai.com', 2),
(244, '2025-04-26 15:07:54', 'Modificación del perfil de usuario', 'El usuario actualizó su información personal\n\r\n        Información original:\n\r\n        Cédula: V-28587583\n\r\n        Nombre: DANIEL\n\r\n        Apellido: BARRUETA\n\r\n        Correo: ppprrueta42@gmai.com\n\n\r\n        Información Actual:\n\r\n        Cédula: V-28587583\n\r\n        Nombre: DANIEL\n\r\n        Apellido: BARRUETA\n\r\n        Correo: dbarrueta42@gmai.com', 2),
(245, '2025-04-26 15:39:51', 'Modificación del perfil de usuario', 'El usuario actualizó su información personal\n\r\n        Información original:\n\r\n        Cédula: V-28587583\n\r\n        Nombre: DANIEL\n\r\n        Apellido: BARRUETA\n\r\n        Correo: dbarrueta42@gmai.com\n\n\r\n        Información Actual:\n\r\n        Cédula: V-28587583\n\r\n        Nombre: DANIEL\n\r\n        Apellido: BARRUETA\n\r\n        Correo: dbarrueta42@gmail.com', 2),
(246, '2025-04-26 17:28:00', 'Inicio de sesión', 'El usuario ha iniciado sesión en el sistema.', 2),
(247, '2025-04-26 19:52:54', 'Cierre de sesión', 'El usuario cerró sesión.', 2),
(248, '2025-04-26 20:02:43', 'Inicio de sesión', 'El usuario ha iniciado sesión en el sistema.', 2),
(249, '2025-04-26 20:04:11', 'Cierre de sesión', 'El usuario cerró sesión.', 2),
(250, '2025-04-26 20:04:44', 'Intento de acceso al sistema sin autenticación previa.', 'Se ha registrado un intento de acceso al sistema de manera incorrecta por parte de un usuario no autenticado.', 2),
(251, '2025-04-26 20:06:20', 'Inicio de sesión', 'El usuario ha iniciado sesión en el sistema.', 2),
(252, '2025-04-26 20:06:25', 'Inicio de sesión', 'El usuario ha iniciado sesión en el sistema.', 2),
(253, '2025-04-26 20:06:26', 'Inicio de sesión', 'El usuario ha iniciado sesión en el sistema.', 2),
(254, '2025-04-26 20:06:26', 'Inicio de sesión', 'El usuario ha iniciado sesión en el sistema.', 2),
(255, '2025-04-26 20:08:32', 'Inicio de sesión', 'El usuario ha iniciado sesión en el sistema.', 11),
(256, '2025-04-26 20:09:24', 'Cierre de sesión', 'El usuario cerró sesión.', 11),
(257, '2025-04-27 11:50:23', 'Inicio de sesión', 'El usuario ha iniciado sesión en el sistema.', 11);
INSERT INTO `bitacora` (`id`, `fecha_hora`, `accion`, `mensaje`, `id_usuario`) VALUES
(258, '2025-04-28 00:13:02', 'Modificación de las preguntas de seguridad del usuario', 'El usuario actualizó su(s) pregunta(s) de seguridad\n Información original:\n Pregunta nº1:******************************.\nRespuesta nº1:******.\n\nPregunta nº2:******************************.\nRespuesta nº2:******.\n\nPregunta nº3:******************************.\nRespuesta nº3:******.\n\n Información Actual:\n Pregunta nº1:******************************.\nRespuesta nº1:******.\n\nPregunta nº2:*******************************************.\nRespuesta nº2:******.\n\nPregunta nº3:***********************************************.\nRespuesta nº3:*******.\n\n', 11),
(259, '2025-04-28 00:13:03', 'Modificación de las preguntas de seguridad del usuario', 'El usuario actualizó su(s) pregunta(s) de seguridad\n Información original:\n Pregunta nº1:******************************.\nRespuesta nº1:******.\n\nPregunta nº2:******************************.\nRespuesta nº2:******.\n\nPregunta nº3:******************************.\nRespuesta nº3:******.\n\n Información Actual:\n Pregunta nº1:******************************.\nRespuesta nº1:******.\n\nPregunta nº2:*******************************************.\nRespuesta nº2:******.\n\nPregunta nº3:***********************************************.\nRespuesta nº3:*******.\n\n', 11),
(260, '2025-04-28 19:49:38', 'Cierre de sesión exitoso', 'El usuario ha cerrado sesión correctamente y su estado ha sido actualizado en el sistema.', 11),
(261, '2025-04-28 19:53:55', 'Inicio de sesión exitoso', 'El usuario ha iniciado sesión correctamente en el sistema y su estado ha sido actualizado.', 11),
(262, '2025-04-28 20:03:55', 'Modificación de la contraseña del usuario', 'El usuario actualizó su contraseña\n\r\n        Contraseña original: ************\n\r\n        \r\n        Contraseña Actual: ************ ', 11),
(263, '2025-04-28 20:07:33', 'Modificación de la contraseña del usuario', 'El usuario actualizó su contraseña\n\n        Contraseña original: ************\n\n        \n        Contraseña Actual: ************ ', 11),
(264, '2025-04-28 20:36:16', 'Modificación de las preguntas de seguridad', 'El usuario actualizó su(s) pregunta(s) de seguridad', 11),
(265, '2025-04-28 20:36:17', 'Modificación de las preguntas de seguridad', 'El usuario actualizó su(s) pregunta(s) de seguridad', 11),
(266, '2025-04-28 20:36:17', 'Modificación de las preguntas de seguridad', 'El usuario actualizó su(s) pregunta(s) de seguridad', 11),
(267, '2025-04-28 20:46:16', 'Modificación de las preguntas de seguridad', 'El usuario actualizó su(s) pregunta(s) de seguridad', 11),
(268, '2025-04-28 20:46:16', 'Modificación de las preguntas de seguridad', 'El usuario actualizó su(s) pregunta(s) de seguridad', 11),
(269, '2025-04-28 20:46:16', 'Modificación de las preguntas de seguridad', 'El usuario actualizó su(s) pregunta(s) de seguridad', 11),
(270, '2025-04-28 20:47:17', 'Modificación de las preguntas de seguridad', 'El usuario actualizó su(s) pregunta(s) de seguridad', 11),
(271, '2025-04-28 20:47:17', 'Modificación de las preguntas de seguridad', 'El usuario actualizó su(s) pregunta(s) de seguridad', 11),
(272, '2025-04-28 20:47:17', 'Modificación de las preguntas de seguridad', 'El usuario actualizó su(s) pregunta(s) de seguridad', 11),
(273, '2025-04-28 20:52:27', 'Modificación de las preguntas de seguridad', 'El usuario actualizó su(s) pregunta(s) de seguridad', 11),
(274, '2025-04-28 20:52:28', 'Modificación de las preguntas de seguridad', 'El usuario actualizó su(s) pregunta(s) de seguridad', 11),
(275, '2025-04-28 20:52:28', 'Modificación de las preguntas de seguridad', 'El usuario actualizó su(s) pregunta(s) de seguridad', 11),
(276, '2025-04-28 21:29:05', 'Modificación de las preguntas de seguridad', 'El usuario actualizó su(s) pregunta(s) de seguridad', 11),
(277, '2025-04-28 21:29:05', 'Modificación de las preguntas de seguridad', 'El usuario actualizó su(s) pregunta(s) de seguridad', 11),
(278, '2025-04-28 21:29:05', 'Modificación de las preguntas de seguridad', 'El usuario actualizó su(s) pregunta(s) de seguridad', 11),
(279, '2025-04-28 21:30:58', 'Modificación del perfil de usuario', 'El usuario actualizó su información personal\n\r\n        Información original:\n\r\n        Cédula: E-14257869\n\r\n        Nombre: JOSE\n\r\n        Apellido: PERALTA\n\r\n        Correo: josepe@gmail.com\n\r\n        Dirección: BARRIO LOS GUAJIROS XD\n\r\n        Teléfono: 04122541256\n\r\n\r\n        Información Actual:\n\r\n        Cédula: E-14257869\n\r\n        Nombre: JOSE\n\r\n        Apellido: PERALTA\n\r\n        Correo: josepe@gmail.com\n\r\n        Dirección: BARRIO LOS GUAJIROS\n\r\n        Teléfono: 04122541278\r\n        ', 11),
(280, '2025-04-28 22:32:15', 'Modificación de las preguntas de seguridad', 'El usuario actualizó su(s) pregunta(s) de seguridad', 11),
(281, '2025-04-28 22:32:15', 'Modificación de las preguntas de seguridad', 'El usuario actualizó su(s) pregunta(s) de seguridad', 11),
(282, '2025-04-28 22:32:15', 'Modificación de las preguntas de seguridad', 'El usuario actualizó su(s) pregunta(s) de seguridad', 11),
(283, '2025-04-28 22:38:22', 'Modificación de las preguntas de seguridad', 'El usuario actualizó su(s) pregunta(s) de seguridad', 11),
(284, '2025-04-28 22:38:23', 'Modificación de las preguntas de seguridad', 'El usuario actualizó su(s) pregunta(s) de seguridad', 11),
(285, '2025-04-28 22:38:23', 'Modificación de las preguntas de seguridad', 'El usuario actualizó su(s) pregunta(s) de seguridad', 11),
(286, '2025-04-28 22:51:24', 'Modificación de las preguntas de seguridad', 'El usuario actualizó su(s) pregunta(s) de seguridad', 11),
(287, '2025-04-28 22:51:24', 'Modificación de las preguntas de seguridad', 'El usuario actualizó su(s) pregunta(s) de seguridad', 11),
(288, '2025-04-28 22:51:24', 'Modificación de las preguntas de seguridad', 'El usuario actualizó su(s) pregunta(s) de seguridad', 11),
(289, '2025-04-28 22:59:32', 'Modificación exitosa de las preguntas de seguridad', 'El usuario actualizó su(s) pregunta(s) de seguridad', 11),
(290, '2025-04-28 23:01:10', 'Modificación exitosa de las preguntas de seguridad', 'El usuario actualizó su(s) pregunta(s) de seguridad', 11),
(291, '2025-04-28 23:03:05', 'Modificación exitosa de las preguntas de seguridad', 'El usuario actualizó su(s) pregunta(s) de seguridad', 11),
(292, '2025-04-28 23:30:04', 'Modificación exitosa de las preguntas de seguridad', 'El usuario actualizó su(s) pregunta(s) de seguridad', 11),
(293, '2025-04-28 23:41:25', 'Cierre de sesión exitoso', 'El usuario ha cerrado sesión correctamente y su estado ha sido actualizado en el sistema.', 11),
(294, '2025-04-29 07:43:13', 'Inicio de sesión exitoso', 'El usuario ha iniciado sesión correctamente en el sistema y su estado ha sido actualizado.', 11),
(295, '2025-04-29 08:12:02', 'Cierre de sesión exitoso', 'El usuario ha cerrado sesión correctamente y su estado ha sido actualizado en el sistema.', 11),
(296, '2025-04-29 08:12:09', 'Inicio de sesión exitoso', 'El usuario ha iniciado sesión correctamente en el sistema y su estado ha sido actualizado.', 2),
(297, '2025-04-29 08:16:24', 'Cierre de sesión exitoso', 'El usuario ha cerrado sesión correctamente y su estado ha sido actualizado en el sistema.', 2),
(298, '2025-04-29 08:16:37', 'Inicio de sesión exitoso', 'El usuario ha iniciado sesión correctamente en el sistema y su estado ha sido actualizado.', 11),
(299, '2025-04-29 08:30:22', 'Modificación exitosa de las preguntas de seguridad', 'El usuario actualizó su(s) pregunta(s) de seguridad', 11),
(300, '2025-04-29 08:49:46', 'Cierre de sesión exitoso', 'El usuario ha cerrado sesión correctamente y su estado ha sido actualizado en el sistema.', 11),
(301, '2025-04-29 08:50:40', 'Inicio de sesión exitoso', 'El usuario ha iniciado sesión correctamente en el sistema y su estado ha sido actualizado.', 2),
(302, '2025-04-29 08:50:56', 'Cierre de sesión exitoso', 'El usuario ha cerrado sesión correctamente y su estado ha sido actualizado en el sistema.', 2),
(303, '2025-04-29 08:53:06', 'Inicio de sesión exitoso', 'El usuario ha iniciado sesión correctamente en el sistema y su estado ha sido actualizado.', 2),
(304, '2025-04-29 08:58:08', 'Cierre de sesión exitoso', 'El usuario ha cerrado sesión correctamente y su estado ha sido actualizado en el sistema.', 2),
(305, '2025-04-29 08:58:22', 'Inicio de sesión exitoso', 'El usuario ha iniciado sesión correctamente en el sistema y su estado ha sido actualizado.', 2),
(306, '2025-04-29 10:02:01', 'Cierre de sesión exitoso', 'El usuario ha cerrado sesión correctamente y su estado ha sido actualizado en el sistema.', 2),
(307, '2025-04-30 12:17:34', 'Inicio de sesión exitoso', 'El usuario ha iniciado sesión correctamente en el sistema y su estado ha sido actualizado.', 2),
(308, '2025-04-30 12:44:19', 'Modificación del perfil de usuario', 'El usuario actualizó su información personal\n\r\n        Información original:\n\r\n        Cédula: V-28587583\n\r\n        Nombre: DANIEL\n\r\n        Apellido: BARRUETA\n\r\n        Correo: dbarrueta42@gmail.com\n\r\n        Dirección: SECTOR E GUASDUAL CALLE 1\n\r\n        Teléfono: 04125238909\n\r\n\r\n        Información Actual:\n\r\n        Cédula: V-28587583\n\r\n        Nombre: DANIEL\n\r\n        Apellido: BARRUETA PICHARDO\n\r\n        Correo: dbarrueta42@gmail.com\n\r\n        Dirección: SECTOR E GUASDUAL CALLE 1\n\r\n        Teléfono: 04125238909\r\n        ', 2),
(309, '2025-04-30 12:48:38', 'Modificación del perfil de usuario', 'El usuario actualizó su información personal\n\n        Información original:<br>\n        Cédula: V-28587583<br>\n        Nombre: DANIEL<br>\n        Apellido: BARRUETA PICHARDO<br>\n        Correo: dbarrueta42@gmail.com<br>\n        Dirección: SECTOR E GUASDUAL CALLE 1<br>\n        Teléfono: 04125238909<br><br>\n        Información Actual:<br>\n        Cédula: V-28587583<br>\n        Nombre: DANIEL JOSÉ<br>\n        Apellido: BARRUETA PICHARDO<br>\n        Correo: dbarrueta42@gmail.com<br>\n        Dirección: SECTOR E GUASDUAL CALLE 1<br>\n        Teléfono: 04125238909\n        ', 2),
(310, '2025-04-30 13:05:51', 'Modificación exitosa del perfil de usuario', 'El usuario actualizó su información personal <br>\r\n        Información original:<br>\r\n        Cédula: V-28587583<br>\r\n        Nombre: DANIEL JOSÉ<br>\r\n        Apellido: BARRUETA PICHARDO<br>\r\n        Correo: dbarrueta42@gmail.com<br>\r\n        Dirección: SECTOR E GUASDUAL CALLE 1<br>\r\n        Teléfono: 04125238909<br><br>\r\n        Información Actual:<br>\r\n        Cédula: V-28587583<br>\r\n        Nombre: DANIEL JOSÉ<br>\r\n        Apellido: BARRUETA PICHARDO<br>\r\n        Correo: dbarrueta42@gmail.com<br>\r\n        Dirección: SECTOR E GUASDUAL CALLE 1 CASA 4 39<br>\r\n        Teléfono: 04125238909\r\n        ', 2),
(311, '2025-04-30 13:06:44', 'Modificación exitosa del perfil de usuario', 'El usuario actualizó su información personal <br><br>\r\n        Información original:<br>\r\n        Cédula: V-28587583<br>\r\n        Nombre: DANIEL JOSÉ<br>\r\n        Apellido: BARRUETA PICHARDO<br>\r\n        Correo: dbarrueta42@gmail.com<br>\r\n        Dirección: SECTOR E GUASDUAL CALLE 1 CASA 4 39<br>\r\n        Teléfono: 04125238909<br><br>\r\n        Información Actual:<br>\r\n        Cédula: V-28587583<br>\r\n        Nombre: DANIEL<br>\r\n        Apellido: BARRUETA<br>\r\n        Correo: dbarrueta42@gmail.com<br>\r\n        Dirección: SECTOR E GUASDUAL CALLE 1<br>\r\n        Teléfono: 04125238909\r\n        ', 2),
(312, '2025-04-30 13:38:41', 'Modificación de la contraseña.', 'El usuario actualizó su contraseña.', 2),
(313, '2025-04-30 13:46:46', 'Modificación exitosa del perfil del usuario.', 'El usuario actualizó su contraseña.', 2),
(314, '2025-04-30 16:54:40', 'Cierre de sesión exitoso', 'El usuario ha cerrado sesión correctamente y su estado ha sido actualizado en el sistema.', 2),
(315, '2025-04-30 18:48:26', 'Inicio de sesión exitoso', 'El usuario ha iniciado sesión correctamente en el sistema y su estado ha sido actualizado.', 7),
(316, '2025-04-30 19:01:01', 'Modificación exitosa del perfil de usuario.', 'El usuario actualizó su contraseña.', 7),
(317, '2025-04-30 19:08:11', 'Modificación exitosa del perfil de usuario', 'El usuario actualizó su(s) pregunta(s) de seguridad', 7),
(318, '2025-05-02 16:37:18', 'Registro exitoso de un nuevo usuario', 'Se ha registrado correctamente un nuevo usuario: PEPE PEREZ. en el sistema.', 7),
(319, '2025-05-02 16:47:21', 'Registro exitoso de un nuevo usuario', 'Se ha registrado correctamente un nuevo usuario: DIEGO FERNANDEZ. en el sistema.', 7),
(320, '2025-05-02 16:49:37', 'Registro exitoso de un nuevo usuario', 'Se ha registrado correctamente un nuevo usuario: PEPE GUEDEZ. en el sistema.', 7),
(321, '2025-05-02 17:29:21', 'Modificación exitosa de características de acceso de un usuario', 'El usuario modificó las características de acceso de un usuario: <br><br>\r\n        Información del usuario modificado:<br>\r\n        Cédula: V-28587583<br>\r\n        Nombre: DANIEL BARRUETA<br>\r\n        Teléfono: 04154785965<br><br>\r\n        Información original:<br>\r\n        Estado: Activo<br>\r\n        Permiso de inicio de sesión: Denegado<br>\r\n        Rol asignado: ADIMINISTRADOR<br><br>\r\n        Información Actual:<br>\r\n        Estado: Activo<br>\r\n        Permiso de inicio de sesión: Denegado<br>\r\n        Rol asignado: ADIMINISTRADOR\r\n        ', 7),
(322, '2025-05-02 18:28:55', 'Modificación exitosa del acceso de un usuario.', 'El usuario restableció el acceso al sistema del usuario con la siguiente información: <br><br>\r\n        Información del usuario modificado:<br>\r\n        Cédula: V-28587583<br>\r\n        Nombre: DANIEL<br>\r\n        Apellido: BARRUETA<br><br>\r\n        Información original:<br>\r\n        Estado: Activo<br>\r\n        Permiso de inicio de sesión: Denegado<br>\r\n        Rol asignado: ADIMINISTRADOR<br><br>\r\n        Bloqueado: <br><br>\r\n        Información Actual:<br>\r\n        Estado: Activo<br>\r\n        Permiso de inicio de sesión: Denegado<br>\r\n        Rol asignado: ADIMINISTRADOR\r\n        Bloqueado: Sí\r\n        ', 7),
(323, '2025-05-02 18:41:21', 'Modificación exitosa del acceso de un usuario.', 'El usuario restableció el acceso al sistema del usuario con la siguiente información: <br><br>\r\n        Información del usuario modificado:<br>\r\n        Cédula: V-28587583<br>\r\n        Nombre: DANIEL<br>\r\n        Apellido: BARRUETA<br><br>\r\n        Información original:<br>\r\n        Estado: Activo<br>\r\n        Permiso de inicio de sesión: Denegado<br>\r\n        Rol asignado: ADIMINISTRADOR<br>\r\n        Bloqueado: Sí<br><br>\r\n        Información Actual:<br>\r\n        Estado: Activo<br>\r\n        Permiso de inicio de sesión: Denegado<br>\r\n        Rol asignado: ADIMINISTRADOR<br>\r\n        Bloqueado: No\r\n        ', 7),
(324, '2025-05-02 18:49:58', 'Cierre de sesión exitoso', 'El usuario ha cerrado sesión correctamente y su estado ha sido actualizado en el sistema.', 7),
(325, '2025-05-02 19:34:58', 'Inicio de sesión exitoso', 'El usuario ha iniciado sesión correctamente en el sistema y su estado ha sido actualizado.', 2),
(326, '2025-05-02 21:49:33', 'Inicio de sesión exitoso', 'El usuario ha iniciado sesión correctamente en el sistema y su estado ha sido actualizado.', 2),
(327, '2025-05-02 21:56:34', 'Modificación exitosa del perfil de usuario.', 'El usuario actualizó su contraseña.', 2),
(328, '2025-05-02 21:59:08', 'Modificación exitosa del perfil de usuario', 'El usuario actualizó su(s) pregunta(s) de seguridad', 2),
(329, '2025-05-02 22:22:12', 'Cierre de sesión exitoso', 'El usuario ha cerrado sesión correctamente y su estado ha sido actualizado en el sistema.', 2),
(330, '2025-05-03 12:46:30', 'Inicio de sesión exitoso', 'El usuario ha iniciado sesión correctamente en el sistema y su estado ha sido actualizado.', 2),
(331, '2025-05-03 16:30:54', 'Modificación exitosa de la configuración del sistema.', 'El usuario actualizó la configuración del sistema <br><br>\r\n        Información del usuario que realizo la modificación:<br>\r\n        Cédula: V-28587583<br>\r\n        Nombre: DANIEL<br>\r\n        Apellido: BARRUETA<br>\r\n        Teléfono: 04125238909<br>\r\n        Rol asignado: ADIMINISTRADOR<br><br>\r\n        Información original:<br>\r\n        Cantidad de preguntas de seguridad: 3<br>\r\n        Tiempo de inactividad de sesión: 2 minutos<br>\r\n        Intentos de inicio de sesión para los usuarios: 3<br>\r\n        Cantidad de caracteres: 8<br>\r\n        Cantidad de símbolos: 2<br>\r\n        Cantidad de números: 1<br><br>\r\n        Información Actual:<br>\r\n        Cantidad de preguntas de seguridad: 3<br>\r\n        Tiempo de inactividad de sesión: 2 minutos<br>\r\n        Intentos de inicio de sesión para los usuarios: 3<br>\r\n        Cantidad de caracteres: 8<br>\r\n        Cantidad de símbolos: 1<br>\r\n        Cantidad de números: 1\r\n        ', 2),
(332, '2025-05-03 16:31:10', 'Modificación exitosa de la configuración del sistema.', 'El usuario actualizó la configuración del sistema <br><br>\r\n        Información del usuario que realizo la modificación:<br>\r\n        Cédula: V-28587583<br>\r\n        Nombre: DANIEL<br>\r\n        Apellido: BARRUETA<br>\r\n        Teléfono: 04125238909<br>\r\n        Rol asignado: ADIMINISTRADOR<br><br>\r\n        Información original:<br>\r\n        Cantidad de preguntas de seguridad: 3<br>\r\n        Tiempo de inactividad de sesión: 2 minutos<br>\r\n        Intentos de inicio de sesión para los usuarios: 3<br>\r\n        Cantidad de caracteres: 8<br>\r\n        Cantidad de símbolos: 1<br>\r\n        Cantidad de números: 1<br><br>\r\n        Información Actual:<br>\r\n        Cantidad de preguntas de seguridad: 3<br>\r\n        Tiempo de inactividad de sesión: 2 minutos<br>\r\n        Intentos de inicio de sesión para los usuarios: 3<br>\r\n        Cantidad de caracteres: 8<br>\r\n        Cantidad de símbolos: 1<br>\r\n        Cantidad de números: 3\r\n        ', 2),
(333, '2025-05-03 17:24:29', 'Modificación exitosa de la configuración del sistema.', 'El usuario actualizó la configuración del sistema <br><br>\r\n        Información del usuario que realizo la modificación:<br>\r\n        Cédula: V-28587583<br>\r\n        Nombre: DANIEL<br>\r\n        Apellido: BARRUETA<br>\r\n        Teléfono: 04125238909<br>\r\n        Rol asignado: ADIMINISTRADOR<br><br>\r\n        Información original:<br>\r\n        Cantidad de preguntas de seguridad: 3<br>\r\n        Tiempo de inactividad de sesión: 2 minutos<br>\r\n        Intentos de inicio de sesión para los usuarios: 3<br>\r\n        Cantidad de caracteres: 8<br>\r\n        Cantidad de símbolos: 1<br>\r\n        Cantidad de números: 3<br><br>\r\n        Información Actual:<br>\r\n        Cantidad de preguntas de seguridad: 3<br>\r\n        Tiempo de inactividad de sesión: 2 minutos<br>\r\n        Intentos de inicio de sesión para los usuarios: 3<br>\r\n        Cantidad de caracteres: 9<br>\r\n        Cantidad de símbolos: 1<br>\r\n        Cantidad de números: 3\r\n        ', 2),
(334, '2025-05-03 17:27:18', 'Modificación exitosa de la configuración del sistema.', 'El usuario actualizó la configuración del sistema <br><br>\r\n        Información del usuario que realizo la modificación:<br>\r\n        Cédula: V-28587583<br>\r\n        Nombre: DANIEL<br>\r\n        Apellido: BARRUETA<br>\r\n        Teléfono: 04125238909<br>\r\n        Rol asignado: ADIMINISTRADOR<br><br>\r\n        Información original:<br>\r\n        Cantidad de preguntas de seguridad: 3<br>\r\n        Tiempo de inactividad de sesión: 2 minutos<br>\r\n        Intentos de inicio de sesión para los usuarios: 3<br>\r\n        Cantidad de caracteres: 9<br>\r\n        Cantidad de símbolos: 1<br>\r\n        Cantidad de números: 3<br><br>\r\n        Información Actual:<br>\r\n        Cantidad de preguntas de seguridad: 3<br>\r\n        Tiempo de inactividad de sesión: 2 minutos<br>\r\n        Intentos de inicio de sesión para los usuarios: 3<br>\r\n        Cantidad de caracteres: 10<br>\r\n        Cantidad de símbolos: 1<br>\r\n        Cantidad de números: 3\r\n        ', 2),
(335, '2025-05-03 17:38:35', 'Modificación exitosa de la configuración del sistema.', 'El usuario actualizó la configuración del sistema <br><br>\r\n        Información del usuario que realizo la modificación:<br>\r\n        Cédula: V-28587583<br>\r\n        Nombre: DANIEL<br>\r\n        Apellido: BARRUETA<br>\r\n        Teléfono: 04125238909<br>\r\n        Rol asignado: ADIMINISTRADOR<br><br>\r\n        Información original:<br>\r\n        Cantidad de preguntas de seguridad: 3<br>\r\n        Tiempo de inactividad de sesión: 2 minutos<br>\r\n        Intentos de inicio de sesión para los usuarios: 3<br>\r\n        Cantidad de caracteres: 10<br>\r\n        Cantidad de símbolos: 1<br>\r\n        Cantidad de números: 3<br><br>\r\n        Información Actual:<br>\r\n        Cantidad de preguntas de seguridad: 4<br>\r\n        Tiempo de inactividad de sesión: 2 minutos<br>\r\n        Intentos de inicio de sesión para los usuarios: 3<br>\r\n        Cantidad de caracteres: 10<br>\r\n        Cantidad de símbolos: 1<br>\r\n        Cantidad de números: 3\r\n        ', 2),
(336, '2025-05-03 17:38:57', 'Modificación exitosa de la configuración del sistema.', 'El usuario actualizó la configuración del sistema <br><br>\r\n        Información del usuario que realizo la modificación:<br>\r\n        Cédula: V-28587583<br>\r\n        Nombre: DANIEL<br>\r\n        Apellido: BARRUETA<br>\r\n        Teléfono: 04125238909<br>\r\n        Rol asignado: ADIMINISTRADOR<br><br>\r\n        Información original:<br>\r\n        Cantidad de preguntas de seguridad: 4<br>\r\n        Tiempo de inactividad de sesión: 2 minutos<br>\r\n        Intentos de inicio de sesión para los usuarios: 3<br>\r\n        Cantidad de caracteres: 10<br>\r\n        Cantidad de símbolos: 1<br>\r\n        Cantidad de números: 3<br><br>\r\n        Información Actual:<br>\r\n        Cantidad de preguntas de seguridad: 4<br>\r\n        Tiempo de inactividad de sesión: 2 minutos<br>\r\n        Intentos de inicio de sesión para los usuarios: 3<br>\r\n        Cantidad de caracteres: 9<br>\r\n        Cantidad de símbolos: 1<br>\r\n        Cantidad de números: 3\r\n        ', 2),
(337, '2025-05-03 17:39:58', 'Modificación exitosa de la configuración del sistema.', 'El usuario actualizó la configuración del sistema <br><br>\r\n        Información del usuario que realizo la modificación:<br>\r\n        Cédula: V-28587583<br>\r\n        Nombre: DANIEL<br>\r\n        Apellido: BARRUETA<br>\r\n        Teléfono: 04125238909<br>\r\n        Rol asignado: ADIMINISTRADOR<br><br>\r\n        Información original:<br>\r\n        Cantidad de preguntas de seguridad: 4<br>\r\n        Tiempo de inactividad de sesión: 2 minutos<br>\r\n        Intentos de inicio de sesión para los usuarios: 3<br>\r\n        Cantidad de caracteres: 9<br>\r\n        Cantidad de símbolos: 1<br>\r\n        Cantidad de números: 3<br><br>\r\n        Información Actual:<br>\r\n        Cantidad de preguntas de seguridad: 4<br>\r\n        Tiempo de inactividad de sesión: 2 minutos<br>\r\n        Intentos de inicio de sesión para los usuarios: 3<br>\r\n        Cantidad de caracteres: 9<br>\r\n        Cantidad de símbolos: 1<br>\r\n        Cantidad de números: 3\r\n        ', 2),
(338, '2025-05-03 18:36:46', 'Modificación exitosa de la configuración del sistema.', 'El usuario actualizó la configuración del sistema <br><br>\r\n        Información del usuario que realizo la modificación:<br>\r\n        Cédula: V-28587583<br>\r\n        Nombre: DANIEL<br>\r\n        Apellido: BARRUETA<br>\r\n        Teléfono: 04125238909<br>\r\n        Rol asignado: ADIMINISTRADOR<br><br>\r\n        Información original:<br>\r\n        Cantidad de preguntas de seguridad: 3<br>\r\n        Tiempo de inactividad de sesión: 2 minutos<br>\r\n        Intentos de inicio de sesión para los usuarios: 3<br>\r\n        Cantidad de caracteres: 9<br>\r\n        Cantidad de símbolos: 1<br>\r\n        Cantidad de números: 3<br><br>\r\n        Información Actual:<br>\r\n        Cantidad de preguntas de seguridad: 3<br>\r\n        Tiempo de inactividad de sesión: 2 minutos<br>\r\n        Intentos de inicio de sesión para los usuarios: 3<br>\r\n        Cantidad de caracteres: 16<br>\r\n        Cantidad de símbolos: 1<br>\r\n        Cantidad de números: 3\r\n        ', 2),
(339, '2025-05-03 18:58:57', 'Modificación exitosa de la configuración del sistema.', 'El usuario actualizó la configuración del sistema <br><br>\r\n        Información del usuario que realizo la modificación:<br>\r\n        Cédula: V-28587583<br>\r\n        Nombre: DANIEL<br>\r\n        Apellido: BARRUETA<br>\r\n        Teléfono: 04125238909<br>\r\n        Rol asignado: ADIMINISTRADOR<br><br>\r\n        Información original:<br>\r\n        Cantidad de preguntas de seguridad: 3<br>\r\n        Tiempo de inactividad de sesión: 2 minutos<br>\r\n        Intentos de inicio de sesión para los usuarios: 3<br>\r\n        Cantidad de caracteres: 9<br>\r\n        Cantidad de símbolos: 1<br>\r\n        Cantidad de números: 3<br><br>\r\n        Información Actual:<br>\r\n        Cantidad de preguntas de seguridad: 3<br>\r\n        Tiempo de inactividad de sesión: 2 minutos<br>\r\n        Intentos de inicio de sesión para los usuarios: 3<br>\r\n        Cantidad de caracteres: 16<br>\r\n        Cantidad de símbolos: 1<br>\r\n        Cantidad de números: 3\r\n        ', 2),
(340, '2025-05-03 19:56:24', 'Cierre de sesión exitoso', 'El usuario ha cerrado sesión correctamente en el sistema.', 2),
(341, '2025-05-04 13:56:17', 'Inicio de sesión exitoso', 'El usuario ha iniciado sesión correctamente en el sistema.', 2),
(342, '2025-05-04 14:01:14', 'Inicio de sesión exitoso', 'El usuario ha iniciado sesión correctamente en el sistema.', 2),
(343, '2025-05-04 14:03:23', 'Modificación exitosa del perfil de usuario', 'El usuario actualizó su información personal <br><br>\r\n        Información original:<br>\r\n        Cédula: V-28587583<br>\r\n        Nombre: DANIEL<br>\r\n        Apellido: BARRUETA<br>\r\n        Correo: dbarrueta42@gmail.com<br>\r\n        Dirección: SECTOR E GUASDUAL CALLE 1<br>\r\n        Teléfono: 04125238909<br><br>\r\n        Información Actual:<br>\r\n        Cédula: E-28587583<br>\r\n        Nombre: DANIEL<br>\r\n        Apellido: BARRUETA<br>\r\n        Correo: dbarrueta42@gmail.com<br>\r\n        Dirección: SECTOR E GUASDUAL CALLE 1<br>\r\n        Teléfono: 04125238909\r\n        ', 2),
(344, '2025-05-04 14:09:06', 'Cierre de sesión exitoso', 'El usuario ha cerrado sesión correctamente en el sistema.', 2),
(345, '2025-05-04 14:19:57', 'Inicio de sesión exitoso', 'El usuario ha iniciado sesión correctamente en el sistema.', 2),
(346, '2025-05-04 14:20:28', 'Cierre de sesión exitoso', 'El usuario ha cerrado sesión correctamente en el sistema.', 2),
(347, '2025-05-04 14:21:32', 'Inicio de sesión exitoso', 'El usuario ha iniciado sesión correctamente en el sistema.', 2),
(348, '2025-05-04 14:21:40', 'Cierre de sesión exitoso', 'El usuario ha cerrado sesión correctamente en el sistema.', 2),
(349, '2025-05-04 14:22:09', 'Inicio de sesión exitoso', 'El usuario ha iniciado sesión correctamente en el sistema.', 2),
(350, '2025-05-04 14:35:12', 'Cierre de sesión exitoso', 'El usuario ha cerrado sesión correctamente en el sistema.', 2),
(351, '2025-05-04 14:35:54', 'Inicio de sesión exitoso', 'El usuario ha iniciado sesión correctamente en el sistema.', 2),
(352, '2025-05-04 14:36:25', 'Cierre de sesión exitoso', 'El usuario ha cerrado sesión correctamente en el sistema.', 2),
(353, '2025-05-04 14:38:45', 'Inicio de sesión exitoso', 'El usuario ha iniciado sesión correctamente en el sistema.', 2),
(354, '2025-05-04 14:39:24', 'Cierre de sesión exitoso', 'El usuario ha cerrado sesión correctamente en el sistema.', 2),
(355, '2025-05-04 14:41:04', 'Inicio de sesión exitoso', 'El usuario ha iniciado sesión correctamente en el sistema.', 2),
(356, '2025-05-04 14:42:47', 'Cierre de sesión exitoso', 'El usuario ha cerrado sesión correctamente en el sistema.', 2),
(357, '2025-05-04 14:43:38', 'Inicio de sesión exitoso', 'El usuario ha iniciado sesión correctamente en el sistema.', 2),
(358, '2025-05-04 17:39:52', 'Copia de seguridad creada exitosamente', 'El usuario a creado una copia de segurida del sistema.', 2),
(359, '2025-05-04 17:48:55', 'Modificación exitosa de la configuración del sistema.', 'El usuario actualizó la configuración del sistema <br><br>\r\n        Información del usuario que realizo la modificación:<br>\r\n        Cédula: E-28587583<br>\r\n        Nombre: DANIEL<br>\r\n        Apellido: BARRUETA<br>\r\n        Teléfono: 04125238909<br>\r\n        Rol asignado: ADIMINISTRADOR<br><br>\r\n        Información original:<br>\r\n        Cantidad de preguntas de seguridad: 3<br>\r\n        Tiempo de inactividad de sesión: 2 minutos<br>\r\n        Intentos de inicio de sesión para los usuarios: 3<br>\r\n        Cantidad de caracteres: 9<br>\r\n        Cantidad de símbolos: 1<br>\r\n        Cantidad de números: 3<br><br>\r\n        Información Actual:<br>\r\n        Cantidad de preguntas de seguridad: 3<br>\r\n        Tiempo de inactividad de sesión: 3 minutos<br>\r\n        Intentos de inicio de sesión para los usuarios: 3<br>\r\n        Cantidad de caracteres: 9<br>\r\n        Cantidad de símbolos: 1<br>\r\n        Cantidad de números: 3\r\n        ', 2),
(360, '2025-05-04 18:28:52', 'Modificación exitosa del perfil de usuario', 'El usuario actualizó su información personal <br><br>\r\n        Información original:<br>\r\n        Cédula: E-28587583<br>\r\n        Nombre: DANIEL<br>\r\n        Apellido: BARRUETA<br>\r\n        Correo: dbarrueta42@gmail.com<br>\r\n        Dirección: SECTOR E GUASDUAL CALLE 1<br>\r\n        Teléfono: 04125238909<br><br>\r\n        Información Actual:<br>\r\n        Cédula: V-28587583<br>\r\n        Nombre: DANIEL<br>\r\n        Apellido: BARRUETA<br>\r\n        Correo: dbarrueta42@gmail.com<br>\r\n        Dirección: SECTOR E GUASDUAL CALLE 1<br>\r\n        Teléfono: 04125238909\r\n        ', 2),
(361, '2025-05-04 18:29:58', 'Modificación exitosa del perfil de usuario.', 'El usuario actualizó su contraseña.', 2),
(362, '2025-05-04 18:30:29', 'Modificación exitosa del perfil de usuario', 'El usuario actualizó su(s) pregunta(s) de seguridad', 2),
(363, '2025-05-04 18:30:46', 'Copia de seguridad creada exitosamente', 'El usuario a creado una copia de segurida de la base de datos del sistema.', 2),
(364, '2025-05-04 18:31:34', 'Modificación exitosa de características de acceso de un usuario', 'Se modificaron las características de acceso de un usuario: <br><br>\r\n        Información del usuario modificado:<br>\r\n        Cédula: E-10642121<br>\r\n        Nombre: DANNY JOSÉ BARRUETA<br>\r\n        Teléfono: 04154785965<br><br>\r\n        Información original:<br>\r\n        Estado: Activo<br>\r\n        Permiso de inicio de sesión: Denegado<br>\r\n        Rol asignado: ADIMINISTRADOR<br><br>\r\n        Información Actual:<br>\r\n        Estado: Inactivo<br>\r\n        Permiso de inicio de sesión: Denegado<br>\r\n        Rol asignado: ADIMINISTRADOR\r\n        ', 2),
(365, '2025-05-04 18:39:05', 'Modificación exitosa de características de acceso de un usuario', 'Se modificaron las características de acceso de un usuario: <br><br>\r\n        Información del usuario modificado:<br>\r\n        Cédula: E-10642121<br>\r\n        Nombre: DANNY JOSÉ BARRUETA<br>\r\n        Teléfono: 04154785965<br><br>\r\n        Información original:<br>\r\n        Estado: Inactivo<br>\r\n        Permiso de inicio de sesión: Denegado<br>\r\n        Rol asignado: ADIMINISTRADOR<br><br>\r\n        Información Actual:<br>\r\n        Estado: Activo<br>\r\n        Permiso de inicio de sesión: Denegado<br>\r\n        Rol asignado: ADIMINISTRADOR\r\n        ', 2),
(366, '2025-05-04 18:41:29', 'Modificación exitosa de características de acceso de un usuario', 'Se modificaron las características de acceso de un usuario: <br><br>\r\n        Información del usuario modificado:<br>\r\n        Cédula: V-32145775<br>\r\n        Nombre: DIEGO FERNANDEZ<br>\r\n        Teléfono: 04154785965<br><br>\r\n        Información original:<br>\r\n        Estado: Activo<br>\r\n        Permiso de inicio de sesión: Denegado<br>\r\n        Rol asignado: ADIMINISTRADOR<br><br>\r\n        Información Actual:<br>\r\n        Estado: Inactivo<br>\r\n        Permiso de inicio de sesión: Denegado<br>\r\n        Rol asignado: ADIMINISTRADOR\r\n        ', 2),
(367, '2025-05-04 19:19:21', 'Modificación exitosa de un rol', 'El usuario modificó el rol con la siguiente infromación <br>\r\n        Nombre del rol: \'<br>\r\n        Estado: Activo.', 2),
(368, '2025-05-05 02:32:51', 'Modificación exitosa de un rol', 'El usuario modificó el rol con la siguiente información:\r\nInformación del rol:\r\nNombre del rol: \'SUSCRIPTOR\'\r\nEstado: Activo\r\n\r\n************* Información original: *************\r\n\r\n****** Módulo Proveedores ******\r\nAcceso al módulo de Proveedores: Sin Acceso\r\nRegistrar Nuevos Proveedores: Denegado\r\nModificar Información de Proveedores: Denegado\r\nConsultar Lista de Proveedores Registrados: Denegado\r\nVisualizar Historial de Compras: Denegado\r\n\r\n****** Módulo Productos ******\r\nAcceso al módulo de Productos: Sin Acceso\r\nRegistrar Nuevas Categorías: Denegado\r\nRegistrar Nuevas Presentaciones: Denegado\r\nRegistrar Nuevos Productos: Denegado\r\nConsultar Lista de Productos Registrados: Denegado\r\nRegistrar Entrada de Productos: Denegado\r\nConsultar Lista de Entradas de Productos: Denegado\r\n\r\n****** Módulo Ventas ******\r\nAcceso al módulo de Ventas: Sin Acceso\r\nGenerar Nuevas Ventas: Denegado\r\nConsultar Lista de Ventas Realizadas: Denegado\r\nVisualizar Detalles de Ventas: Denegado\r\nAcceder a Facturas de Ventas: Denegado\r\nConsultar Estadísticas de Ventas: Denegado\r\n\r\n****** Módulo Menú ******\r\nAcceso al módulo de Servicios: Sin Acceso\r\nRegistrar Nuevos Servicios: Denegado\r\nModificar Información de Servicios: Denegado\r\nConsultar Lista de Servicios Registrados: Denegado\r\n\r\n****** Módulo Clientes ******\r\nAcceso al módulo de Clientes: Sin Acceso\r\nRegistrar Nuevos Clientes: Denegado\r\nModificar Información de Clientes: Denegado\r\nConsultar Lista de Clientes Reg: Denegado\r\nVisualizar Historial de Clientes: Denegado\r\nAcceder a Facturas de Clientes: Denegado\r\n\r\n****** Módulo Empleados ******\r\nAcceso al módulo de Empleados: Sin Acceso\r\nRegistrar Nuevos Empleados: Denegado\r\nModificar Información de Empleados: Denegado\r\nConsultar Lista de Empleados Registrados: Denegado\r\n\r\n****** Módulo Roles ******\r\nAcceso al módulo de Roles: Sin Acceso\r\nRegistrar Nuevos Roles: Denegado\r\nModificar Información de Roles: Denegado\r\nConsultar Lista de Roles Registrados: Denegado\r\n\r\n****** Módulo Configuración del sistema ******\r\nAcceso al módulo los Ajustes del Sistema: Sin Acceso\r\nModificar Cantidad de Preguntas de Seguridad: Denegado\r\nModificar Tiempo de Inactividad de Sesión: Denegado\r\nModificar Cantidad de Caracteres Permitidos: Denegado\r\nModificar Cantidad de Símbolos Permitidos: Denegado\r\nModificar Cantidad de Números Permitidos: Denegado\r\nModificar Intentos de Inicio de Sesión: Denegado\r\n\r\n****** Módulo Bitátora ******\r\nAcceso al módulo la Bitácora: Sin Acceso\r\nConsultar Registros de la Bitácora: Denegado\r\n\r\n\r\n************* Información actualizada: *************\r\n\r\n****** Módulo Proveedores ******\r\nAcceso al módulo de Proveedores: Sin Acceso\r\nRegistrar Nuevos Proveedores: Denegado\r\nModificar Información de Proveedores: Denegado\r\nConsultar Lista de Proveedores Registrados: Denegado\r\nVisualizar Historial de Compras: Denegado\r\n\r\n****** Módulo Productos ******\r\nAcceso al módulo de Productos: Sin Acceso\r\nRegistrar Nuevas Categorías: Denegado\r\nRegistrar Nuevas Presentaciones: Denegado\r\nRegistrar Nuevos Productos: Denegado\r\nConsultar Lista de Productos Registrados: Denegado\r\nRegistrar Entrada de Productos: Denegado\r\nConsultar Lista de Entradas de Productos: Denegado\r\n\r\n****** Módulo Ventas ******\r\nAcceso al módulo de Ventas: Sin Acceso\r\nGenerar Nuevas Ventas: Denegado\r\nConsultar Lista de Ventas Realizadas: Denegado\r\nVisualizar Detalles de Ventas: Denegado\r\nAcceder a Facturas de Ventas: Denegado\r\nConsultar Estadísticas de Ventas: Denegado\r\n\r\n****** Módulo Menú ******\r\nAcceso al módulo de Servicios: Sin Acceso\r\nRegistrar Nuevos Servicios: Denegado\r\nModificar Información de Servicios: Denegado\r\nConsultar Lista de Servicios Registrados: Denegado\r\n\r\n****** Módulo Clientes ******\r\nAcceso al módulo de Clientes: Sin Acceso\r\nRegistrar Nuevos Clientes: Denegado\r\nModificar Información de Clientes: Denegado\r\nConsultar Lista de Clientes Reg: Denegado\r\nVisualizar Historial de Clientes: Denegado\r\nAcceder a Facturas de Clientes: Denegado\r\n\r\n****** Módulo Empleados ******\r\nAcceso al módulo de Empleados: Sin Acceso\r\nRegistrar Nuevos Empleados: Denegado\r\nModificar Información de Empleados: Denegado\r\nConsultar Lista de Empleados Registrados: Denegado\r\n\r\n****** Módulo Roles ******\r\nAcceso al módulo de Roles: Sin Acceso\r\nRegistrar Nuevos Roles: Denegado\r\nModificar Información de Roles: Denegado\r\nConsultar Lista de Roles Registrados: Denegado\r\n\r\n****** Módulo Configuración del sistema ******\r\nAcceso al módulo los Ajustes del Sistema: Sin Acceso\r\nModificar Cantidad de Preguntas de Seguridad: Denegado\r\nModificar Tiempo de Inactividad de Sesión: Denegado\r\nModificar Cantidad de Caracteres Permitidos: Denegado\r\nModificar Cantidad de Símbolos Permitidos: Denegado\r\nModificar Cantidad de Números Permitidos: Denegado\r\nModificar Intentos de Inicio de Sesión: Denegado\r\n\r\n****** Módulo Bitátora ******\r\nAcceso al módulo la Bitácora: Sin Acceso\r\nConsultar Registros de la Bitácora: Denegado\r\n\r\n\r\n', 2),
(369, '2025-05-04 22:53:42', 'Modificación exitosa de un rol', 'El usuario modificó el rol con la siguiente información', 2),
(371, '2025-05-04 22:56:10', 'Modificación exitosa de un rol', 'El usuario modificó el rol con la siguiente información:<br>', 2),
(372, '2025-05-04 22:57:42', 'Modificación exitosa de un rol', 'El usuario modificó el rol con la siguiente información:<br> \r\n        Información del rol:<br>\r\n        Nombre del rol: SUSCRIPTOR<br>\r\n        Estado: Activo <br><br>\r\n        ************* Información original: ************* <br><br>\r\n        ****** Módulo Proveedores   ******<br>\r\n        Acceso al módulo de Proveedores: Acceso Total<br>\r\n        Registrar Nuevos Proveedores: Permitido <br>\r\n        Modificar Información de Proveedores: Permitido <br>\r\n        Consultar Lista de Proveedores Registrados: Permitido <br>\r\n        Visualizar Historial de Compras: Permitido <br><br>\r\n\r\n        ****** Módulo Productos     ******<br>\r\n        Acceso al módulo de Productos: Acceso Parcial <br>\r\n        Registrar Nuevas Categorías: Permitido <br>\r\n        Registrar Nuevas Presentaciones: Denegado <br>\r\n        Registrar Nuevos Productos: Denegado <br>\r\n        Consultar Lista de Productos Registrados: Denegado <br>\r\n        Registrar Entrada de Productos: Denegado <br>\r\n        Consultar Lista de Entradas de Productos: Denegado <br><br>\r\n        \r\n        ****** Módulo Ventas        ******<br>\r\n        Acceso al módulo de Ventas: Sin Acceso <br>\r\n        Generar Nuevas Ventas: Denegado <br>\r\n        Consultar Lista de Ventas Realizadas: Denegado <br>\r\n        Visualizar Detalles de Ventas: Denegado <br>\r\n        Acceder a Facturas de Ventas: Denegado <br>\r\n        Consultar Estadísticas de Ventas: Denegado <br><br>\r\n\r\n        ****** Módulo Menú          ******<br>\r\n        Acceso al módulo de Servicios: Sin Acceso <br>\r\n        Registrar Nuevos Servicios: Denegado <br>\r\n        Modificar Información de Servicios: Denegado <br>\r\n        Consultar Lista de Servicios Registrados: Denegado <br><br>\r\n\r\n        ****** Módulo Clientes      ******<br>\r\n        Acceso al módulo de Clientes: Sin Acceso <br>\r\n        Registrar Nuevos Clientes: Denegado <br>\r\n        Modificar Información de Clientes: Denegado <br>\r\n        Consultar Lista de Clientes Regitrados: Denegado <br>\r\n        Visualizar Historial de Clientes: Denegado <br>\r\n        Acceder a Facturas de Clientes: Denegado <br><br>\r\n\r\n        ****** Módulo Empleados          ******<br>\r\n        Acceso al módulo de Empleados: Sin Acceso <br>\r\n        Registrar Nuevos Empleados: Denegado <br>\r\n        Modificar Información de Empleados: Denegado <br>\r\n        Consultar Lista de Empleados Registrados: Denegado <br><br>\r\n\r\n        ****** Módulo Roles  ******<br>\r\n        Acceso al módulo de Roles: Sin Acceso <br>\r\n        Registrar Nuevos Roles: Denegado <br>\r\n        Modificar Información de Roles: Denegado <br>\r\n        Consultar Lista de Roles Registrados: Denegado <br>\r\n\r\n        ****** Módulo Configuración del sistema  ******<br>\r\n        Acceso al módulo los Ajustes del Sistema: Sin Acceso <br>\r\n        Modificar Cantidad de Preguntas de Seguridad: Denegado <br>\r\n        Modificar Tiempo de Inactividad de Sesión: Denegado <br>\r\n        Modificar Cantidad de Caracteres Permitidos: Denegado <br>\r\n        Modificar Cantidad de Símbolos Permitidos: Denegado <br>\r\n        Modificar Cantidad de Números Permitidos: Denegado <br>\r\n        Modificar Intentos de Inicio de Sesión: Denegado <br><br>\r\n\r\n        ****** Módulo Bitátora      ******<br>\r\n        Acceso al módulo la Bitácora: Sin Acceso <br>\r\n        Consultar Registros de la Bitácora: Denegado <br><br><br>\r\n\r\n\r\n        ************* Información original: ************* <br><br>\r\n        ****** Módulo Proveedores   ******<br>\r\n        Acceso al módulo de Proveedores: Acceso Total<br>\r\n        Registrar Nuevos Proveedores: Permitido <br>\r\n        Modificar Información de Proveedores: Permitido <br>\r\n        Consultar Lista de Proveedores Registrados: Permitido <br>\r\n        Visualizar Historial de Compras: Permitido <br><br>\r\n\r\n        ****** Módulo Productos     ******<br>\r\n        Acceso al módulo de Productos: Acceso Parcial <br>\r\n        Registrar Nuevas Categorías: Permitido <br>\r\n        Registrar Nuevas Presentaciones: Denegado <br>\r\n        Registrar Nuevos Productos: Denegado <br>\r\n        Consultar Lista de Productos Registrados: Denegado <br>\r\n        Registrar Entrada de Productos: Denegado <br>\r\n        Consultar Lista de Entradas de Productos: Denegado <br><br>\r\n        \r\n        ****** Módulo Ventas        ******<br>\r\n        Acceso al módulo de Ventas: Sin Acceso <br>\r\n        Generar Nuevas Ventas: Denegado <br>\r\n        Consultar Lista de Ventas Realizadas: Denegado <br>\r\n        Visualizar Detalles de Ventas: Denegado <br>\r\n        Acceder a Facturas de Ventas: Denegado <br>\r\n        Consultar Estadísticas de Ventas: Denegado <br><br>\r\n\r\n        ****** Módulo Menú          ******<br>\r\n        Acceso al módulo de Servicios: Sin Acceso <br>\r\n        Registrar Nuevos Servicios: Denegado <br>\r\n        Modificar Información de Servicios: Denegado <br>\r\n        Consultar Lista de Servicios Registrados: Denegado <br><br>\r\n\r\n        ****** Módulo Clientes      ******<br>\r\n        Acceso al módulo de Clientes: Sin Acceso <br>\r\n        Registrar Nuevos Clientes: Denegado <br>\r\n        Modificar Información de Clientes: Denegado <br>\r\n        Consultar Lista de Clientes Registrados: Denegado <br>\r\n        Visualizar Historial de Clientes: Denegado <br>\r\n        Acceder a Facturas de Clientes: Denegado <br><br>\r\n\r\n        ****** Módulo Empleados          ******<br>\r\n        Acceso al módulo de Empleados: Sin Acceso <br>\r\n        Registrar Nuevos Empleados: Denegado <br>\r\n        Modificar Información de Empleados: Denegado <br>\r\n        Consultar Lista de Empleados Registrados: Denegado <br><br>\r\n\r\n        ****** Módulo Roles  ******<br>\r\n        Acceso al módulo de Roles: Sin Acceso <br>\r\n        Registrar Nuevos Roles: Denegado <br>\r\n        Modificar Información de Roles: Denegado <br>\r\n        Consultar Lista de Roles Registrados: Denegado <br>\r\n\r\n        ****** Módulo Configuración del sistema  ******<br>\r\n        Acceso al módulo los Ajustes del Sistema: Sin Acceso <br>\r\n        Modificar Cantidad de Preguntas de Seguridad: Denegado <br>\r\n        Modificar Tiempo de Inactividad de Sesión: Denegado <br>\r\n        Modificar Cantidad de Caracteres Permitidos: Denegado <br>\r\n        Modificar Cantidad de Símbolos Permitidos: Denegado <br>\r\n        Modificar Cantidad de Números Permitidos: Denegado <br>\r\n        Modificar Intentos de Inicio de Sesión: Denegado <br><br>\r\n\r\n        ****** Módulo Bitátora      ******<br>\r\n        Acceso al módulo la Bitácora: Sin Acceso <br>\r\n        Consultar Registros de la Bitácora: Denegado\r\n        ', 2),
(373, '2025-05-04 23:01:22', 'Cierre de sesión exitoso', 'El usuario ha cerrado sesión correctamente en el sistema.', 2),
(374, '2025-05-05 09:49:54', 'Inicio de sesión exitoso', 'El usuario ha iniciado sesión correctamente en el sistema.', 2),
(375, '2025-05-05 09:52:31', 'Copia de seguridad creada exitosamente', 'El usuario a creado una copia de segurida de la base de datos del sistema.', 2),
(376, '2025-05-05 09:52:37', 'Modificación exitosa de la configuración del sistema.', 'El usuario actualizó la configuración del sistema <br><br>\r\n        Información del usuario que realizo la modificación:<br>\r\n        Cédula: V-28587583<br>\r\n        Nombre: DANIEL<br>\r\n        Apellido: BARRUETA<br>\r\n        Teléfono: 04125238909<br>\r\n        Rol asignado: ADIMINISTRADOR<br><br>\r\n        Información original:<br>\r\n        Cantidad de preguntas de seguridad: 3<br>\r\n        Tiempo de inactividad de sesión: 3 minutos<br>\r\n        Intentos de inicio de sesión para los usuarios: 3<br>\r\n        Cantidad de caracteres: 9<br>\r\n        Cantidad de símbolos: 1<br>\r\n        Cantidad de números: 3<br><br>\r\n        Información Actual:<br>\r\n        Cantidad de preguntas de seguridad: 3<br>\r\n        Tiempo de inactividad de sesión: 4 minutos<br>\r\n        Intentos de inicio de sesión para los usuarios: 3<br>\r\n        Cantidad de caracteres: 9<br>\r\n        Cantidad de símbolos: 1<br>\r\n        Cantidad de números: 3\r\n        ', 2);
INSERT INTO `bitacora` (`id`, `fecha_hora`, `accion`, `mensaje`, `id_usuario`) VALUES
(377, '2025-05-05 09:54:32', 'Modificación exitosa de un rol', 'El usuario modificó el rol con la siguiente información:<br> \r\n        Información del rol:<br>\r\n        Nombre del rol: SUSCRIPTOR<br>\r\n        Estado: Activo <br><br>\r\n        ************* Información original: ************* <br><br>\r\n        ****** Módulo Proveedores   ******<br>\r\n        Acceso al módulo de Proveedores: Acceso Total<br>\r\n        Registrar Nuevos Proveedores: Permitido <br>\r\n        Modificar Información de Proveedores: Permitido <br>\r\n        Consultar Lista de Proveedores Registrados: Permitido <br>\r\n        Visualizar Historial de Compras: Permitido <br><br>\r\n\r\n        ****** Módulo Productos     ******<br>\r\n        Acceso al módulo de Productos: Acceso Parcial <br>\r\n        Registrar Nuevas Categorías: Permitido <br>\r\n        Registrar Nuevas Presentaciones: Denegado <br>\r\n        Registrar Nuevos Productos: Denegado <br>\r\n        Consultar Lista de Productos Registrados: Denegado <br>\r\n        Registrar Entrada de Productos: Denegado <br>\r\n        Consultar Lista de Entradas de Productos: Denegado <br><br>\r\n        \r\n        ****** Módulo Ventas        ******<br>\r\n        Acceso al módulo de Ventas: Sin Acceso <br>\r\n        Generar Nuevas Ventas: Denegado <br>\r\n        Consultar Lista de Ventas Realizadas: Denegado <br>\r\n        Visualizar Detalles de Ventas: Denegado <br>\r\n        Acceder a Facturas de Ventas: Denegado <br>\r\n        Consultar Estadísticas de Ventas: Denegado <br><br>\r\n\r\n        ****** Módulo Menú          ******<br>\r\n        Acceso al módulo de Servicios: Sin Acceso <br>\r\n        Registrar Nuevos Servicios: Denegado <br>\r\n        Modificar Información de Servicios: Denegado <br>\r\n        Consultar Lista de Servicios Registrados: Denegado <br><br>\r\n\r\n        ****** Módulo Clientes      ******<br>\r\n        Acceso al módulo de Clientes: Sin Acceso <br>\r\n        Registrar Nuevos Clientes: Denegado <br>\r\n        Modificar Información de Clientes: Denegado <br>\r\n        Consultar Lista de Clientes Regitrados: Denegado <br>\r\n        Visualizar Historial de Clientes: Denegado <br>\r\n        Acceder a Facturas de Clientes: Denegado <br><br>\r\n\r\n        ****** Módulo Empleados          ******<br>\r\n        Acceso al módulo de Empleados: Sin Acceso <br>\r\n        Registrar Nuevos Empleados: Denegado <br>\r\n        Modificar Información de Empleados: Denegado <br>\r\n        Consultar Lista de Empleados Registrados: Denegado <br><br>\r\n\r\n        ****** Módulo Roles  ******<br>\r\n        Acceso al módulo de Roles: Sin Acceso <br>\r\n        Registrar Nuevos Roles: Denegado <br>\r\n        Modificar Información de Roles: Denegado <br>\r\n        Consultar Lista de Roles Registrados: Denegado <br>\r\n\r\n        ****** Módulo Configuración del sistema  ******<br>\r\n        Acceso al módulo los Ajustes del Sistema: Sin Acceso <br>\r\n        Modificar Cantidad de Preguntas de Seguridad: Denegado <br>\r\n        Modificar Tiempo de Inactividad de Sesión: Denegado <br>\r\n        Modificar Cantidad de Caracteres Permitidos: Denegado <br>\r\n        Modificar Cantidad de Símbolos Permitidos: Denegado <br>\r\n        Modificar Cantidad de Números Permitidos: Denegado <br>\r\n        Modificar Intentos de Inicio de Sesión: Denegado <br><br>\r\n\r\n        ****** Módulo Bitátora      ******<br>\r\n        Acceso al módulo la Bitácora: Sin Acceso <br>\r\n        Consultar Registros de la Bitácora: Denegado <br><br><br>\r\n\r\n\r\n        ************* Información original: ************* <br><br>\r\n        ****** Módulo Proveedores   ******<br>\r\n        Acceso al módulo de Proveedores: Acceso Total<br>\r\n        Registrar Nuevos Proveedores: Permitido <br>\r\n        Modificar Información de Proveedores: Permitido <br>\r\n        Consultar Lista de Proveedores Registrados: Permitido <br>\r\n        Visualizar Historial de Compras: Permitido <br><br>\r\n\r\n        ****** Módulo Productos     ******<br>\r\n        Acceso al módulo de Productos: Acceso Parcial <br>\r\n        Registrar Nuevas Categorías: Permitido <br>\r\n        Registrar Nuevas Presentaciones: Permitido <br>\r\n        Registrar Nuevos Productos: Permitido <br>\r\n        Consultar Lista de Productos Registrados: Denegado <br>\r\n        Registrar Entrada de Productos: Denegado <br>\r\n        Consultar Lista de Entradas de Productos: Denegado <br><br>\r\n        \r\n        ****** Módulo Ventas        ******<br>\r\n        Acceso al módulo de Ventas: Sin Acceso <br>\r\n        Generar Nuevas Ventas: Denegado <br>\r\n        Consultar Lista de Ventas Realizadas: Denegado <br>\r\n        Visualizar Detalles de Ventas: Denegado <br>\r\n        Acceder a Facturas de Ventas: Denegado <br>\r\n        Consultar Estadísticas de Ventas: Denegado <br><br>\r\n\r\n        ****** Módulo Menú          ******<br>\r\n        Acceso al módulo de Servicios: Sin Acceso <br>\r\n        Registrar Nuevos Servicios: Denegado <br>\r\n        Modificar Información de Servicios: Denegado <br>\r\n        Consultar Lista de Servicios Registrados: Denegado <br><br>\r\n\r\n        ****** Módulo Clientes      ******<br>\r\n        Acceso al módulo de Clientes: Sin Acceso <br>\r\n        Registrar Nuevos Clientes: Denegado <br>\r\n        Modificar Información de Clientes: Denegado <br>\r\n        Consultar Lista de Clientes Registrados: Denegado <br>\r\n        Visualizar Historial de Clientes: Denegado <br>\r\n        Acceder a Facturas de Clientes: Denegado <br><br>\r\n\r\n        ****** Módulo Empleados          ******<br>\r\n        Acceso al módulo de Empleados: Sin Acceso <br>\r\n        Registrar Nuevos Empleados: Denegado <br>\r\n        Modificar Información de Empleados: Denegado <br>\r\n        Consultar Lista de Empleados Registrados: Denegado <br><br>\r\n\r\n        ****** Módulo Roles  ******<br>\r\n        Acceso al módulo de Roles: Sin Acceso <br>\r\n        Registrar Nuevos Roles: Denegado <br>\r\n        Modificar Información de Roles: Denegado <br>\r\n        Consultar Lista de Roles Registrados: Denegado <br>\r\n\r\n        ****** Módulo Configuración del sistema  ******<br>\r\n        Acceso al módulo los Ajustes del Sistema: Sin Acceso <br>\r\n        Modificar Cantidad de Preguntas de Seguridad: Denegado <br>\r\n        Modificar Tiempo de Inactividad de Sesión: Denegado <br>\r\n        Modificar Cantidad de Caracteres Permitidos: Denegado <br>\r\n        Modificar Cantidad de Símbolos Permitidos: Denegado <br>\r\n        Modificar Cantidad de Números Permitidos: Denegado <br>\r\n        Modificar Intentos de Inicio de Sesión: Denegado <br><br>\r\n\r\n        ****** Módulo Bitátora      ******<br>\r\n        Acceso al módulo la Bitácora: Sin Acceso <br>\r\n        Consultar Registros de la Bitácora: Denegado\r\n        ', 2),
(378, '2025-05-05 10:01:44', 'Modificación exitosa de un rol', 'El usuario modificó el rol con la siguiente información:<br> \r\n        Información del rol:<br>\r\n        Nombre del rol: SUSCRIPTOR<br>\r\n        Estado: Activo <br><br>\r\n        ************* Información original: ************* <br><br>\r\n        ****** Módulo Proveedores   ******<br>\r\n        Acceso al módulo de Proveedores:___Acceso Total<br>\r\n        Registrar Nuevos Proveedores:___Permitido <br>\r\n        Modificar Información de Proveedores:___Permitido <br>\r\n        Consultar Lista de Proveedores Registrados:___Permitido <br>\r\n        Visualizar Historial de Compras:___Permitido <br><br>\r\n\r\n        ****** Módulo Productos     ******<br>\r\n        Acceso al módulo de Productos: Acceso Parcial <br>\r\n        Registrar Nuevas Categorías: Permitido <br>\r\n        Registrar Nuevas Presentaciones: Permitido <br>\r\n        Registrar Nuevos Productos: Permitido <br>\r\n        Consultar Lista de Productos Registrados: Denegado <br>\r\n        Registrar Entrada de Productos: Denegado <br>\r\n        Consultar Lista de Entradas de Productos: Denegado <br><br>\r\n        \r\n        ****** Módulo Ventas        ******<br>\r\n        Acceso al módulo de Ventas: Sin Acceso <br>\r\n        Generar Nuevas Ventas: Denegado <br>\r\n        Consultar Lista de Ventas Realizadas: Denegado <br>\r\n        Visualizar Detalles de Ventas: Denegado <br>\r\n        Acceder a Facturas de Ventas: Denegado <br>\r\n        Consultar Estadísticas de Ventas: Denegado <br><br>\r\n\r\n        ****** Módulo Menú          ******<br>\r\n        Acceso al módulo de Servicios: Sin Acceso <br>\r\n        Registrar Nuevos Servicios: Denegado <br>\r\n        Modificar Información de Servicios: Denegado <br>\r\n        Consultar Lista de Servicios Registrados: Denegado <br><br>\r\n\r\n        ****** Módulo Clientes      ******<br>\r\n        Acceso al módulo de Clientes: Sin Acceso <br>\r\n        Registrar Nuevos Clientes: Denegado <br>\r\n        Modificar Información de Clientes: Denegado <br>\r\n        Consultar Lista de Clientes Regitrados: Denegado <br>\r\n        Visualizar Historial de Clientes: Denegado <br>\r\n        Acceder a Facturas de Clientes: Denegado <br><br>\r\n\r\n        ****** Módulo Empleados          ******<br>\r\n        Acceso al módulo de Empleados: Sin Acceso <br>\r\n        Registrar Nuevos Empleados: Denegado <br>\r\n        Modificar Información de Empleados: Denegado <br>\r\n        Consultar Lista de Empleados Registrados: Denegado <br><br>\r\n\r\n        ****** Módulo Roles  ******<br>\r\n        Acceso al módulo de Roles: Sin Acceso <br>\r\n        Registrar Nuevos Roles: Denegado <br>\r\n        Modificar Información de Roles: Denegado <br>\r\n        Consultar Lista de Roles Registrados: Denegado  <br><br>\r\n\r\n        ****** Módulo Configuración del sistema  ******<br>\r\n        Acceso al módulo los Ajustes del Sistema: Sin Acceso <br>\r\n        Modificar Cantidad de Preguntas de Seguridad: Denegado <br>\r\n        Modificar Tiempo de Inactividad de Sesión: Denegado <br>\r\n        Modificar Cantidad de Caracteres Permitidos: Denegado <br>\r\n        Modificar Cantidad de Símbolos Permitidos: Denegado <br>\r\n        Modificar Cantidad de Números Permitidos: Denegado <br>\r\n        Modificar Intentos de Inicio de Sesión: Denegado <br><br>\r\n\r\n        ****** Módulo Bitátora      ******<br>\r\n        Acceso al módulo la Bitácora: Sin Acceso <br>\r\n        Consultar Registros de la Bitácora: Denegado <br><br><br>\r\n\r\n\r\n        ************* Información actualizada: ************* <br><br>\r\n        ****** Módulo Proveedores   ******<br>\r\n        Acceso al módulo de Proveedores: Acceso Total<br>\r\n        Registrar Nuevos Proveedores: Permitido <br>\r\n        Modificar Información de Proveedores: Permitido <br>\r\n        Consultar Lista de Proveedores Registrados: Permitido <br>\r\n        Visualizar Historial de Compras: Permitido <br><br>\r\n\r\n        ****** Módulo Productos     ******<br>\r\n        Acceso al módulo de Productos: Sin Acceso <br>\r\n        Registrar Nuevas Categorías: Denegado <br>\r\n        Registrar Nuevas Presentaciones: Denegado <br>\r\n        Registrar Nuevos Productos: Denegado <br>\r\n        Consultar Lista de Productos Registrados: Denegado <br>\r\n        Registrar Entrada de Productos: Denegado <br>\r\n        Consultar Lista de Entradas de Productos: Denegado <br><br>\r\n        \r\n        ****** Módulo Ventas        ******<br>\r\n        Acceso al módulo de Ventas: Sin Acceso <br>\r\n        Generar Nuevas Ventas: Denegado <br>\r\n        Consultar Lista de Ventas Realizadas: Denegado <br>\r\n        Visualizar Detalles de Ventas: Denegado <br>\r\n        Acceder a Facturas de Ventas: Denegado <br>\r\n        Consultar Estadísticas de Ventas: Denegado <br><br>\r\n\r\n        ****** Módulo Menú          ******<br>\r\n        Acceso al módulo de Servicios: Sin Acceso <br>\r\n        Registrar Nuevos Servicios: Denegado <br>\r\n        Modificar Información de Servicios: Denegado <br>\r\n        Consultar Lista de Servicios Registrados: Denegado <br><br>\r\n\r\n        ****** Módulo Clientes      ******<br>\r\n        Acceso al módulo de Clientes: Sin Acceso <br>\r\n        Registrar Nuevos Clientes: Denegado <br>\r\n        Modificar Información de Clientes: Denegado <br>\r\n        Consultar Lista de Clientes Registrados: Denegado <br>\r\n        Visualizar Historial de Clientes: Denegado <br>\r\n        Acceder a Facturas de Clientes: Denegado <br><br>\r\n\r\n        ****** Módulo Empleados          ******<br>\r\n        Acceso al módulo de Empleados: Sin Acceso <br>\r\n        Registrar Nuevos Empleados: Denegado <br>\r\n        Modificar Información de Empleados: Denegado <br>\r\n        Consultar Lista de Empleados Registrados: Denegado <br><br>\r\n\r\n        ****** Módulo Roles  ******<br>\r\n        Acceso al módulo de Roles: Sin Acceso <br>\r\n        Registrar Nuevos Roles: Denegado <br>\r\n        Modificar Información de Roles: Denegado <br>\r\n        Consultar Lista de Roles Registrados: Denegado  <br><br>\r\n\r\n        ****** Módulo Configuración del sistema  ******<br>\r\n        Acceso al módulo los Ajustes del Sistema: Sin Acceso <br>\r\n        Modificar Cantidad de Preguntas de Seguridad: Denegado <br>\r\n        Modificar Tiempo de Inactividad de Sesión: Denegado <br>\r\n        Modificar Cantidad de Caracteres Permitidos: Denegado <br>\r\n        Modificar Cantidad de Símbolos Permitidos: Denegado <br>\r\n        Modificar Cantidad de Números Permitidos: Denegado <br>\r\n        Modificar Intentos de Inicio de Sesión: Denegado <br><br>\r\n\r\n        ****** Módulo Bitátora      ******<br>\r\n        Acceso al módulo la Bitácora: Sin Acceso <br>\r\n        Consultar Registros de la Bitácora: Denegado\r\n        ', 2),
(379, '2025-05-05 10:03:37', 'Modificación exitosa de un rol', 'El usuario modificó el rol con la siguiente información:<br> \r\n        Información del rol:<br>\r\n        Nombre del rol: SUSCRIPTOR<br>\r\n        Estado: Activo <br><br>\r\n        ************* Información original: ************* <br><br>\r\n        ****** Módulo Proveedores   ******<br>\r\n        Acceso al módulo de Proveedores:__________________Acceso Total<br>\r\n        Registrar Nuevos Proveedores:_____________________Permitido <br>\r\n        Modificar Información de Proveedores:_____________Permitido <br>\r\n        Consultar Lista de Proveedores Registrados:_______Permitido <br>\r\n        Visualizar Historial de Compras:__________________Permitido <br><br>\r\n\r\n        ****** Módulo Productos     ******<br>\r\n        Acceso al módulo de Productos: Sin Acceso <br>\r\n        Registrar Nuevas Categorías: Denegado <br>\r\n        Registrar Nuevas Presentaciones: Denegado <br>\r\n        Registrar Nuevos Productos: Denegado <br>\r\n        Consultar Lista de Productos Registrados: Denegado <br>\r\n        Registrar Entrada de Productos: Denegado <br>\r\n        Consultar Lista de Entradas de Productos: Denegado <br><br>\r\n        \r\n        ****** Módulo Ventas        ******<br>\r\n        Acceso al módulo de Ventas: Sin Acceso <br>\r\n        Generar Nuevas Ventas: Denegado <br>\r\n        Consultar Lista de Ventas Realizadas: Denegado <br>\r\n        Visualizar Detalles de Ventas: Denegado <br>\r\n        Acceder a Facturas de Ventas: Denegado <br>\r\n        Consultar Estadísticas de Ventas: Denegado <br><br>\r\n\r\n        ****** Módulo Menú          ******<br>\r\n        Acceso al módulo de Servicios: Sin Acceso <br>\r\n        Registrar Nuevos Servicios: Denegado <br>\r\n        Modificar Información de Servicios: Denegado <br>\r\n        Consultar Lista de Servicios Registrados: Denegado <br><br>\r\n\r\n        ****** Módulo Clientes      ******<br>\r\n        Acceso al módulo de Clientes: Sin Acceso <br>\r\n        Registrar Nuevos Clientes: Denegado <br>\r\n        Modificar Información de Clientes: Denegado <br>\r\n        Consultar Lista de Clientes Regitrados: Denegado <br>\r\n        Visualizar Historial de Clientes: Denegado <br>\r\n        Acceder a Facturas de Clientes: Denegado <br><br>\r\n\r\n        ****** Módulo Empleados          ******<br>\r\n        Acceso al módulo de Empleados: Sin Acceso <br>\r\n        Registrar Nuevos Empleados: Denegado <br>\r\n        Modificar Información de Empleados: Denegado <br>\r\n        Consultar Lista de Empleados Registrados: Denegado <br><br>\r\n\r\n        ****** Módulo Roles  ******<br>\r\n        Acceso al módulo de Roles: Sin Acceso <br>\r\n        Registrar Nuevos Roles: Denegado <br>\r\n        Modificar Información de Roles: Denegado <br>\r\n        Consultar Lista de Roles Registrados: Denegado  <br><br>\r\n\r\n        ****** Módulo Configuración del sistema  ******<br>\r\n        Acceso al módulo los Ajustes del Sistema: Sin Acceso <br>\r\n        Modificar Cantidad de Preguntas de Seguridad: Denegado <br>\r\n        Modificar Tiempo de Inactividad de Sesión: Denegado <br>\r\n        Modificar Cantidad de Caracteres Permitidos: Denegado <br>\r\n        Modificar Cantidad de Símbolos Permitidos: Denegado <br>\r\n        Modificar Cantidad de Números Permitidos: Denegado <br>\r\n        Modificar Intentos de Inicio de Sesión: Denegado <br><br>\r\n\r\n        ****** Módulo Bitátora      ******<br>\r\n        Acceso al módulo la Bitácora: Sin Acceso <br>\r\n        Consultar Registros de la Bitácora: Denegado <br><br><br>\r\n\r\n\r\n        ************* Información actualizada: ************* <br><br>\r\n        ****** Módulo Proveedores   ******<br>\r\n        Acceso al módulo de Proveedores: Acceso Total<br>\r\n        Registrar Nuevos Proveedores: Permitido <br>\r\n        Modificar Información de Proveedores: Permitido <br>\r\n        Consultar Lista de Proveedores Registrados: Permitido <br>\r\n        Visualizar Historial de Compras: Permitido <br><br>\r\n\r\n        ****** Módulo Productos     ******<br>\r\n        Acceso al módulo de Productos: Acceso Parcial <br>\r\n        Registrar Nuevas Categorías: Permitido <br>\r\n        Registrar Nuevas Presentaciones: Denegado <br>\r\n        Registrar Nuevos Productos: Denegado <br>\r\n        Consultar Lista de Productos Registrados: Denegado <br>\r\n        Registrar Entrada de Productos: Denegado <br>\r\n        Consultar Lista de Entradas de Productos: Denegado <br><br>\r\n        \r\n        ****** Módulo Ventas        ******<br>\r\n        Acceso al módulo de Ventas: Sin Acceso <br>\r\n        Generar Nuevas Ventas: Denegado <br>\r\n        Consultar Lista de Ventas Realizadas: Denegado <br>\r\n        Visualizar Detalles de Ventas: Denegado <br>\r\n        Acceder a Facturas de Ventas: Denegado <br>\r\n        Consultar Estadísticas de Ventas: Denegado <br><br>\r\n\r\n        ****** Módulo Menú          ******<br>\r\n        Acceso al módulo de Servicios: Sin Acceso <br>\r\n        Registrar Nuevos Servicios: Denegado <br>\r\n        Modificar Información de Servicios: Denegado <br>\r\n        Consultar Lista de Servicios Registrados: Denegado <br><br>\r\n\r\n        ****** Módulo Clientes      ******<br>\r\n        Acceso al módulo de Clientes: Sin Acceso <br>\r\n        Registrar Nuevos Clientes: Denegado <br>\r\n        Modificar Información de Clientes: Denegado <br>\r\n        Consultar Lista de Clientes Registrados: Denegado <br>\r\n        Visualizar Historial de Clientes: Denegado <br>\r\n        Acceder a Facturas de Clientes: Denegado <br><br>\r\n\r\n        ****** Módulo Empleados          ******<br>\r\n        Acceso al módulo de Empleados: Sin Acceso <br>\r\n        Registrar Nuevos Empleados: Denegado <br>\r\n        Modificar Información de Empleados: Denegado <br>\r\n        Consultar Lista de Empleados Registrados: Denegado <br><br>\r\n\r\n        ****** Módulo Roles  ******<br>\r\n        Acceso al módulo de Roles: Sin Acceso <br>\r\n        Registrar Nuevos Roles: Denegado <br>\r\n        Modificar Información de Roles: Denegado <br>\r\n        Consultar Lista de Roles Registrados: Denegado  <br><br>\r\n\r\n        ****** Módulo Configuración del sistema  ******<br>\r\n        Acceso al módulo los Ajustes del Sistema: Sin Acceso <br>\r\n        Modificar Cantidad de Preguntas de Seguridad: Denegado <br>\r\n        Modificar Tiempo de Inactividad de Sesión: Denegado <br>\r\n        Modificar Cantidad de Caracteres Permitidos: Denegado <br>\r\n        Modificar Cantidad de Símbolos Permitidos: Denegado <br>\r\n        Modificar Cantidad de Números Permitidos: Denegado <br>\r\n        Modificar Intentos de Inicio de Sesión: Denegado <br><br>\r\n\r\n        ****** Módulo Bitátora      ******<br>\r\n        Acceso al módulo la Bitácora: Sin Acceso <br>\r\n        Consultar Registros de la Bitácora: Denegado\r\n        ', 2),
(380, '2025-05-05 10:04:23', 'Modificación exitosa de un rol', 'El usuario modificó el rol con la siguiente información:<br> \r\n        Información del rol:<br>\r\n        Nombre del rol: SUSCRIPTOR<br>\r\n        Estado: Activo <br><br>\r\n        ************* Información original: ************* <br><br>\r\n        ****** Módulo Proveedores   ******<br>\r\n        Acceso al módulo de Proveedores:_____________Acceso Total<br>\r\n        Registrar Nuevos Proveedores:________________Permitido <br>\r\n        Modificar Información de Proveedores:________Permitido <br>\r\n        Consultar Lista de Proveedores Registrados:__Permitido <br>\r\n        Visualizar Historial de Compras:_____________Permitido <br><br>\r\n\r\n        ****** Módulo Productos     ******<br>\r\n        Acceso al módulo de Productos: Acceso Parcial <br>\r\n        Registrar Nuevas Categorías: Permitido <br>\r\n        Registrar Nuevas Presentaciones: Denegado <br>\r\n        Registrar Nuevos Productos: Denegado <br>\r\n        Consultar Lista de Productos Registrados: Denegado <br>\r\n        Registrar Entrada de Productos: Denegado <br>\r\n        Consultar Lista de Entradas de Productos: Denegado <br><br>\r\n        \r\n        ****** Módulo Ventas        ******<br>\r\n        Acceso al módulo de Ventas: Sin Acceso <br>\r\n        Generar Nuevas Ventas: Denegado <br>\r\n        Consultar Lista de Ventas Realizadas: Denegado <br>\r\n        Visualizar Detalles de Ventas: Denegado <br>\r\n        Acceder a Facturas de Ventas: Denegado <br>\r\n        Consultar Estadísticas de Ventas: Denegado <br><br>\r\n\r\n        ****** Módulo Menú          ******<br>\r\n        Acceso al módulo de Servicios: Sin Acceso <br>\r\n        Registrar Nuevos Servicios: Denegado <br>\r\n        Modificar Información de Servicios: Denegado <br>\r\n        Consultar Lista de Servicios Registrados: Denegado <br><br>\r\n\r\n        ****** Módulo Clientes      ******<br>\r\n        Acceso al módulo de Clientes: Sin Acceso <br>\r\n        Registrar Nuevos Clientes: Denegado <br>\r\n        Modificar Información de Clientes: Denegado <br>\r\n        Consultar Lista de Clientes Regitrados: Denegado <br>\r\n        Visualizar Historial de Clientes: Denegado <br>\r\n        Acceder a Facturas de Clientes: Denegado <br><br>\r\n\r\n        ****** Módulo Empleados          ******<br>\r\n        Acceso al módulo de Empleados: Sin Acceso <br>\r\n        Registrar Nuevos Empleados: Denegado <br>\r\n        Modificar Información de Empleados: Denegado <br>\r\n        Consultar Lista de Empleados Registrados: Denegado <br><br>\r\n\r\n        ****** Módulo Roles  ******<br>\r\n        Acceso al módulo de Roles: Sin Acceso <br>\r\n        Registrar Nuevos Roles: Denegado <br>\r\n        Modificar Información de Roles: Denegado <br>\r\n        Consultar Lista de Roles Registrados: Denegado  <br><br>\r\n\r\n        ****** Módulo Configuración del sistema  ******<br>\r\n        Acceso al módulo los Ajustes del Sistema: Sin Acceso <br>\r\n        Modificar Cantidad de Preguntas de Seguridad: Denegado <br>\r\n        Modificar Tiempo de Inactividad de Sesión: Denegado <br>\r\n        Modificar Cantidad de Caracteres Permitidos: Denegado <br>\r\n        Modificar Cantidad de Símbolos Permitidos: Denegado <br>\r\n        Modificar Cantidad de Números Permitidos: Denegado <br>\r\n        Modificar Intentos de Inicio de Sesión: Denegado <br><br>\r\n\r\n        ****** Módulo Bitátora      ******<br>\r\n        Acceso al módulo la Bitácora: Sin Acceso <br>\r\n        Consultar Registros de la Bitácora: Denegado <br><br><br>\r\n\r\n\r\n        ************* Información actualizada: ************* <br><br>\r\n        ****** Módulo Proveedores   ******<br>\r\n        Acceso al módulo de Proveedores: Acceso Total<br>\r\n        Registrar Nuevos Proveedores: Permitido <br>\r\n        Modificar Información de Proveedores: Permitido <br>\r\n        Consultar Lista de Proveedores Registrados: Permitido <br>\r\n        Visualizar Historial de Compras: Permitido <br><br>\r\n\r\n        ****** Módulo Productos     ******<br>\r\n        Acceso al módulo de Productos: Acceso Parcial <br>\r\n        Registrar Nuevas Categorías: Permitido <br>\r\n        Registrar Nuevas Presentaciones: Permitido <br>\r\n        Registrar Nuevos Productos: Denegado <br>\r\n        Consultar Lista de Productos Registrados: Denegado <br>\r\n        Registrar Entrada de Productos: Denegado <br>\r\n        Consultar Lista de Entradas de Productos: Denegado <br><br>\r\n        \r\n        ****** Módulo Ventas        ******<br>\r\n        Acceso al módulo de Ventas: Sin Acceso <br>\r\n        Generar Nuevas Ventas: Denegado <br>\r\n        Consultar Lista de Ventas Realizadas: Denegado <br>\r\n        Visualizar Detalles de Ventas: Denegado <br>\r\n        Acceder a Facturas de Ventas: Denegado <br>\r\n        Consultar Estadísticas de Ventas: Denegado <br><br>\r\n\r\n        ****** Módulo Menú          ******<br>\r\n        Acceso al módulo de Servicios: Sin Acceso <br>\r\n        Registrar Nuevos Servicios: Denegado <br>\r\n        Modificar Información de Servicios: Denegado <br>\r\n        Consultar Lista de Servicios Registrados: Denegado <br><br>\r\n\r\n        ****** Módulo Clientes      ******<br>\r\n        Acceso al módulo de Clientes: Sin Acceso <br>\r\n        Registrar Nuevos Clientes: Denegado <br>\r\n        Modificar Información de Clientes: Denegado <br>\r\n        Consultar Lista de Clientes Registrados: Denegado <br>\r\n        Visualizar Historial de Clientes: Denegado <br>\r\n        Acceder a Facturas de Clientes: Denegado <br><br>\r\n\r\n        ****** Módulo Empleados          ******<br>\r\n        Acceso al módulo de Empleados: Sin Acceso <br>\r\n        Registrar Nuevos Empleados: Denegado <br>\r\n        Modificar Información de Empleados: Denegado <br>\r\n        Consultar Lista de Empleados Registrados: Denegado <br><br>\r\n\r\n        ****** Módulo Roles  ******<br>\r\n        Acceso al módulo de Roles: Sin Acceso <br>\r\n        Registrar Nuevos Roles: Denegado <br>\r\n        Modificar Información de Roles: Denegado <br>\r\n        Consultar Lista de Roles Registrados: Denegado  <br><br>\r\n\r\n        ****** Módulo Configuración del sistema  ******<br>\r\n        Acceso al módulo los Ajustes del Sistema: Sin Acceso <br>\r\n        Modificar Cantidad de Preguntas de Seguridad: Denegado <br>\r\n        Modificar Tiempo de Inactividad de Sesión: Denegado <br>\r\n        Modificar Cantidad de Caracteres Permitidos: Denegado <br>\r\n        Modificar Cantidad de Símbolos Permitidos: Denegado <br>\r\n        Modificar Cantidad de Números Permitidos: Denegado <br>\r\n        Modificar Intentos de Inicio de Sesión: Denegado <br><br>\r\n\r\n        ****** Módulo Bitátora      ******<br>\r\n        Acceso al módulo la Bitácora: Sin Acceso <br>\r\n        Consultar Registros de la Bitácora: Denegado\r\n        ', 2),
(381, '2025-05-05 10:06:35', 'Modificación exitosa de un rol', 'El usuario modificó el rol con la siguiente información:<br> \r\n        Información del rol:<br>\r\n        Nombre del rol: SUSCRIPTOR<br>\r\n        Estado: Activo <br><br>\r\n        ************* Información original: ************* <br><br>\r\n        ****** Módulo Proveedores   ******<br>\r\n        Acceso al módulo de Proveedores: <b>Acceso Total</b><br>\r\n        Registrar Nuevos Proveedores: <b>Permitido</b> <br>\r\n        Modificar Información de Proveedores: <b>Permitido</b> <br>\r\n        Consultar Lista de Proveedores Registrados: <b>Permitido</b> <br>\r\n        Visualizar Historial de Compras: <b>Permitido</b> <br><br>\r\n\r\n        ****** Módulo Productos     ******<br>\r\n        Acceso al módulo de Productos: Acceso Parcial <br>\r\n        Registrar Nuevas Categorías: Permitido <br>\r\n        Registrar Nuevas Presentaciones: Permitido <br>\r\n        Registrar Nuevos Productos: Denegado <br>\r\n        Consultar Lista de Productos Registrados: Denegado <br>\r\n        Registrar Entrada de Productos: Denegado <br>\r\n        Consultar Lista de Entradas de Productos: Denegado <br><br>\r\n        \r\n        ****** Módulo Ventas        ******<br>\r\n        Acceso al módulo de Ventas: Sin Acceso <br>\r\n        Generar Nuevas Ventas: Denegado <br>\r\n        Consultar Lista de Ventas Realizadas: Denegado <br>\r\n        Visualizar Detalles de Ventas: Denegado <br>\r\n        Acceder a Facturas de Ventas: Denegado <br>\r\n        Consultar Estadísticas de Ventas: Denegado <br><br>\r\n\r\n        ****** Módulo Menú          ******<br>\r\n        Acceso al módulo de Servicios: Sin Acceso <br>\r\n        Registrar Nuevos Servicios: Denegado <br>\r\n        Modificar Información de Servicios: Denegado <br>\r\n        Consultar Lista de Servicios Registrados: Denegado <br><br>\r\n\r\n        ****** Módulo Clientes      ******<br>\r\n        Acceso al módulo de Clientes: Sin Acceso <br>\r\n        Registrar Nuevos Clientes: Denegado <br>\r\n        Modificar Información de Clientes: Denegado <br>\r\n        Consultar Lista de Clientes Regitrados: Denegado <br>\r\n        Visualizar Historial de Clientes: Denegado <br>\r\n        Acceder a Facturas de Clientes: Denegado <br><br>\r\n\r\n        ****** Módulo Empleados          ******<br>\r\n        Acceso al módulo de Empleados: Sin Acceso <br>\r\n        Registrar Nuevos Empleados: Denegado <br>\r\n        Modificar Información de Empleados: Denegado <br>\r\n        Consultar Lista de Empleados Registrados: Denegado <br><br>\r\n\r\n        ****** Módulo Roles  ******<br>\r\n        Acceso al módulo de Roles: Sin Acceso <br>\r\n        Registrar Nuevos Roles: Denegado <br>\r\n        Modificar Información de Roles: Denegado <br>\r\n        Consultar Lista de Roles Registrados: Denegado  <br><br>\r\n\r\n        ****** Módulo Configuración del sistema  ******<br>\r\n        Acceso al módulo los Ajustes del Sistema: Sin Acceso <br>\r\n        Modificar Cantidad de Preguntas de Seguridad: Denegado <br>\r\n        Modificar Tiempo de Inactividad de Sesión: Denegado <br>\r\n        Modificar Cantidad de Caracteres Permitidos: Denegado <br>\r\n        Modificar Cantidad de Símbolos Permitidos: Denegado <br>\r\n        Modificar Cantidad de Números Permitidos: Denegado <br>\r\n        Modificar Intentos de Inicio de Sesión: Denegado <br><br>\r\n\r\n        ****** Módulo Bitátora      ******<br>\r\n        Acceso al módulo la Bitácora: Sin Acceso <br>\r\n        Consultar Registros de la Bitácora: Denegado <br><br><br>\r\n\r\n\r\n        ************* Información actualizada: ************* <br><br>\r\n        ****** Módulo Proveedores   ******<br>\r\n        Acceso al módulo de Proveedores: Acceso Total<br>\r\n        Registrar Nuevos Proveedores: Permitido <br>\r\n        Modificar Información de Proveedores: Permitido <br>\r\n        Consultar Lista de Proveedores Registrados: Permitido <br>\r\n        Visualizar Historial de Compras: Permitido <br><br>\r\n\r\n        ****** Módulo Productos     ******<br>\r\n        Acceso al módulo de Productos: Acceso Parcial <br>\r\n        Registrar Nuevas Categorías: Permitido <br>\r\n        Registrar Nuevas Presentaciones: Permitido <br>\r\n        Registrar Nuevos Productos: Permitido <br>\r\n        Consultar Lista de Productos Registrados: Denegado <br>\r\n        Registrar Entrada de Productos: Denegado <br>\r\n        Consultar Lista de Entradas de Productos: Denegado <br><br>\r\n        \r\n        ****** Módulo Ventas        ******<br>\r\n        Acceso al módulo de Ventas: Sin Acceso <br>\r\n        Generar Nuevas Ventas: Denegado <br>\r\n        Consultar Lista de Ventas Realizadas: Denegado <br>\r\n        Visualizar Detalles de Ventas: Denegado <br>\r\n        Acceder a Facturas de Ventas: Denegado <br>\r\n        Consultar Estadísticas de Ventas: Denegado <br><br>\r\n\r\n        ****** Módulo Menú          ******<br>\r\n        Acceso al módulo de Servicios: Sin Acceso <br>\r\n        Registrar Nuevos Servicios: Denegado <br>\r\n        Modificar Información de Servicios: Denegado <br>\r\n        Consultar Lista de Servicios Registrados: Denegado <br><br>\r\n\r\n        ****** Módulo Clientes      ******<br>\r\n        Acceso al módulo de Clientes: Sin Acceso <br>\r\n        Registrar Nuevos Clientes: Denegado <br>\r\n        Modificar Información de Clientes: Denegado <br>\r\n        Consultar Lista de Clientes Registrados: Denegado <br>\r\n        Visualizar Historial de Clientes: Denegado <br>\r\n        Acceder a Facturas de Clientes: Denegado <br><br>\r\n\r\n        ****** Módulo Empleados          ******<br>\r\n        Acceso al módulo de Empleados: Sin Acceso <br>\r\n        Registrar Nuevos Empleados: Denegado <br>\r\n        Modificar Información de Empleados: Denegado <br>\r\n        Consultar Lista de Empleados Registrados: Denegado <br><br>\r\n\r\n        ****** Módulo Roles  ******<br>\r\n        Acceso al módulo de Roles: Sin Acceso <br>\r\n        Registrar Nuevos Roles: Denegado <br>\r\n        Modificar Información de Roles: Denegado <br>\r\n        Consultar Lista de Roles Registrados: Denegado  <br><br>\r\n\r\n        ****** Módulo Configuración del sistema  ******<br>\r\n        Acceso al módulo los Ajustes del Sistema: Sin Acceso <br>\r\n        Modificar Cantidad de Preguntas de Seguridad: Denegado <br>\r\n        Modificar Tiempo de Inactividad de Sesión: Denegado <br>\r\n        Modificar Cantidad de Caracteres Permitidos: Denegado <br>\r\n        Modificar Cantidad de Símbolos Permitidos: Denegado <br>\r\n        Modificar Cantidad de Números Permitidos: Denegado <br>\r\n        Modificar Intentos de Inicio de Sesión: Denegado <br><br>\r\n\r\n        ****** Módulo Bitátora      ******<br>\r\n        Acceso al módulo la Bitácora: Sin Acceso <br>\r\n        Consultar Registros de la Bitácora: Denegado\r\n        ', 2),
(382, '2025-05-05 10:13:38', 'Modificación exitosa de un rol', 'El usuario modificó el rol con la siguiente información:<br> \r\n        Nombre del rol: <b>SUSCRIPTOR</b><br>\r\n        Estado: <b>Activo</b> <br><br>\r\n        ************* Información original: ************* <br><br>\r\n        ****** Módulo Proveedores   ******<br>\r\n        Acceso al módulo de Proveedores: <b>Acceso Total</b><br>\r\n        Registrar Nuevos Proveedores: <b><b>Permitido</b> <br>\r\n        Modificar Información de Proveedores: <b><b>Permitido</b> <br>\r\n        Consultar Lista de Proveedores Registrados: <b><b>Permitido</b> <br>\r\n        Visualizar Historial de Compras: <b><b>Permitido</b> <br><br>\r\n\r\n        ****** Módulo Productos     ******<br>\r\n        Acceso al módulo de Productos: <b>Acceso Parcial</b> <br>\r\n        Registrar Nuevas Categorías: <b>Permitido </b><br>\r\n        Registrar Nuevas Presentaciones: <b>Permitido </b><br>\r\n        Registrar Nuevos Productos: <b>Permitido </b><br>\r\n        Consultar Lista de Productos Registrados: <b>Denegado </b><br>\r\n        Registrar Entrada de Productos: <b>Denegado </b><br>\r\n        Consultar Lista de Entradas de Productos: <b>Denegado </b><br><br>\r\n        \r\n        ****** Módulo Ventas        ******<br>\r\n        Acceso al módulo de Ventas:  <b>Sin Acceso </b> <br>\r\n        Generar Nuevas Ventas: <b>Denegado </b><br>\r\n        Consultar Lista de Ventas Realizadas: <b>Denegado </b><br>\r\n        Visualizar Detalles de Ventas: <b>Denegado </b><br>\r\n        Acceder a Facturas de Ventas: <b>Denegado </b><br>\r\n        Consultar Estadísticas de Ventas: <b>Denegado </b><br><br>\r\n\r\n        ****** Módulo Menú          ******<br>\r\n        Acceso al módulo de Servicios:  <b>Sin Acceso </b><br>\r\n        Registrar Nuevos Servicios: <b>Denegado </b><br>\r\n        Modificar Información de Servicios: <b>Denegado </b><br>\r\n        Consultar Lista de Servicios Registrados: <b>Denegado </b><br><br>\r\n\r\n        ****** Módulo Clientes      ******<br>\r\n        Acceso al módulo de Clientes:  <b>Sin Acceso </b><br>\r\n        Registrar Nuevos Clientes: <b>Denegado </b><br>\r\n        Modificar Información de Clientes: <b>Denegado </b><br>\r\n        Consultar Lista de Clientes Regitrados: <b>Denegado </b><br>\r\n        Visualizar Historial de Clientes: <b>Denegado </b><br>\r\n        Acceder a Facturas de Clientes: <b>Denegado </b><br><br>\r\n\r\n        ****** Módulo Empleados          ******<br>\r\n        Acceso al módulo de Empleados:  <b>Sin Acceso </b><br>\r\n        Registrar Nuevos Empleados: <b>Denegado </b><br>\r\n        Modificar Información de Empleados: <b>Denegado </b><br>\r\n        Consultar Lista de Empleados Registrados: <b>Denegado </b><br><br>\r\n\r\n        ****** Módulo Roles  ******<br>\r\n        Acceso al módulo de Roles:  <b>Sin Acceso </b><br>\r\n        Registrar Nuevos Roles: <b>Denegado </b><br>\r\n        Modificar Información de Roles: <b>Denegado </b><br>\r\n        Consultar Lista de Roles Registrados: <b>Denegado </b> <br><br>\r\n\r\n        ****** Módulo Configuración del sistema  ******<br>\r\n        Acceso al módulo los Ajustes del Sistema:  <b>Sin Acceso </b><br>\r\n        Modificar Cantidad de Preguntas de Seguridad: <b>Denegado </b><br>\r\n        Modificar Tiempo de Inactividad de Sesión: <b>Denegado </b><br>\r\n        Modificar Cantidad de Caracteres Permitidos: <b>Denegado </b><br>\r\n        Modificar Cantidad de Símbolos Permitidos: <b>Denegado </b><br>\r\n        Modificar Cantidad de Números Permitidos: <b>Denegado </b><br>\r\n        Modificar Intentos de Inicio de Sesión: <b>Denegado </b><br><br>\r\n\r\n        ****** Módulo Bitátora      ******<br>\r\n        Acceso al módulo la Bitácora: <b>Sin Acceso </b><br>\r\n        Consultar Registros de la Bitácora: <b>Denegado </b><br><br><br>\r\n\r\n\r\n        ************* Información actualizada: ************* <br><br>\r\n        ****** Módulo Proveedores   ******<br>\r\n        Acceso al módulo de Proveedores:  <b>Acceso Total</b><br>\r\n        Registrar Nuevos Proveedores: <b>Permitido </b><br>\r\n        Modificar Información de Proveedores: <b>Permitido </b><br>\r\n        Consultar Lista de Proveedores Registrados: <b>Permitido </b><br>\r\n        Visualizar Historial de Compras: <b>Permitido </b><br><br>\r\n\r\n        ****** Módulo Productos     ******<br>\r\n        Acceso al módulo de Productos:  <b>Acceso Parcial </b><br>\r\n        Registrar Nuevas Categorías: <b>Permitido </b><br>\r\n        Registrar Nuevas Presentaciones: <b>Permitido </b><br>\r\n        Registrar Nuevos Productos: <b>Permitido </b><br>\r\n        Consultar Lista de Productos Registrados: <b>Denegado </b><br>\r\n        Registrar Entrada de Productos: <b>Denegado </b><br>\r\n        Consultar Lista de Entradas de Productos: <b>Denegado </b><br><br>\r\n        \r\n        ****** Módulo Ventas        ******<br>\r\n        Acceso al módulo de Ventas:  <b>Sin Acceso </b><br>\r\n        Generar Nuevas Ventas: <b>Denegado </b><br>\r\n        Consultar Lista de Ventas Realizadas: <b>Denegado </b><br>\r\n        Visualizar Detalles de Ventas: <b>Denegado </b><br>\r\n        Acceder a Facturas de Ventas: <b>Denegado </b><br>\r\n        Consultar Estadísticas de Ventas: <b>Denegado </b><br><br>\r\n\r\n        ****** Módulo Menú          ******<br>\r\n        Acceso al módulo de Servicios:  <b>Acceso Parcial </b><br>\r\n        Registrar Nuevos Servicios: <b>Permitido </b><br>\r\n        Modificar Información de Servicios: <b>Denegado </b><br>\r\n        Consultar Lista de Servicios Registrados: <b>Denegado </b><br><br>\r\n\r\n        ****** Módulo Clientes      ******<br>\r\n        Acceso al módulo de Clientes:  <b>Sin Acceso </b><br>\r\n        Registrar Nuevos Clientes: <b>Denegado </b><br>\r\n        Modificar Información de Clientes: <b>Denegado </b><br>\r\n        Consultar Lista de Clientes Registrados: <b>Denegado </b><br>\r\n        Visualizar Historial de Clientes: <b>Denegado </b><br>\r\n        Acceder a Facturas de Clientes: <b>Denegado </b><br><br>\r\n\r\n        ****** Módulo Empleados          ******<br>\r\n        Acceso al módulo de Empleados:  <b>Sin Acceso </b><br>\r\n        Registrar Nuevos Empleados: <b>Denegado </b><br>\r\n        Modificar Información de Empleados: <b>Denegado </b><br>\r\n        Consultar Lista de Empleados Registrados: <b>Denegado </b><br><br>\r\n\r\n        ****** Módulo Roles  ******<br>\r\n        Acceso al módulo de Roles:  <b>Sin Acceso </b><br>\r\n        Registrar Nuevos Roles: <b>Denegado </b><br>\r\n        Modificar Información de Roles: <b>Denegado </b><br>\r\n        Consultar Lista de Roles Registrados: <b>Denegado </b> <br><br>\r\n\r\n        ****** Módulo Configuración del sistema  ******<br>\r\n        Acceso al módulo los Ajustes del Sistema:  <b>Sin Acceso </b><br>\r\n        Modificar Cantidad de Preguntas de Seguridad: <b>Denegado </b><br>\r\n        Modificar Tiempo de Inactividad de Sesión: <b>Denegado </b><br>\r\n        Modificar Cantidad de Caracteres Permitidos: <b>Denegado </b><br>\r\n        Modificar Cantidad de Símbolos Permitidos: <b>Denegado </b><br>\r\n        Modificar Cantidad de Números Permitidos: <b>Denegado </b><br>\r\n        Modificar Intentos de Inicio de Sesión: <b>Denegado </b><br><br>\r\n\r\n        ****** Módulo Bitátora      ******<br>\r\n        Acceso al módulo la Bitácora: <b>Sin Acceso </b><br>\r\n        Consultar Registros de la Bitácora: <b>Denegado</b>\r\n        ', 2),
(383, '2025-05-05 10:14:56', 'Modificación exitosa de un rol', 'El usuario modificó el rol con la siguiente información:<br> \r\n        Nombre del rol: <b>SUSCRIPTOR</b><br>\r\n        Estado: <b>Activo</b> <br><br>\r\n        ************* Información original: ************* <br><br>\r\n        ****** Módulo Proveedores   ******<br>\r\n        Acceso al módulo de Proveedores: <b>Acceso Total</b><br>\r\n        Registrar Nuevos Proveedores: <b>Permitido</b> <br>\r\n        Modificar Información de Proveedores: <b>Permitido</> <br>\r\n        Consultar Lista de Proveedores Registrados: <b>Permitido</b> <br>\r\n        Visualizar Historial de Compras: <b>Permitido</b> <br><br>\r\n\r\n        ****** Módulo Productos     ******<br>\r\n        Acceso al módulo de Productos: <b>Acceso Parcial</b> <br>\r\n        Registrar Nuevas Categorías: <b>Permitido </b><br>\r\n        Registrar Nuevas Presentaciones: <b>Permitido </b><br>\r\n        Registrar Nuevos Productos: <b>Permitido </b><br>\r\n        Consultar Lista de Productos Registrados: <b>Denegado </b><br>\r\n        Registrar Entrada de Productos: <b>Denegado </b><br>\r\n        Consultar Lista de Entradas de Productos: <b>Denegado </b><br><br>\r\n        \r\n        ****** Módulo Ventas        ******<br>\r\n        Acceso al módulo de Ventas:  <b>Sin Acceso </b> <br>\r\n        Generar Nuevas Ventas: <b>Denegado </b><br>\r\n        Consultar Lista de Ventas Realizadas: <b>Denegado </b><br>\r\n        Visualizar Detalles de Ventas: <b>Denegado </b><br>\r\n        Acceder a Facturas de Ventas: <b>Denegado </b><br>\r\n        Consultar Estadísticas de Ventas: <b>Denegado </b><br><br>\r\n\r\n        ****** Módulo Menú          ******<br>\r\n        Acceso al módulo de Servicios:  <b>Acceso Parcial </b><br>\r\n        Registrar Nuevos Servicios: <b>Permitido </b><br>\r\n        Modificar Información de Servicios: <b>Denegado </b><br>\r\n        Consultar Lista de Servicios Registrados: <b>Denegado </b><br><br>\r\n\r\n        ****** Módulo Clientes      ******<br>\r\n        Acceso al módulo de Clientes:  <b>Sin Acceso </b><br>\r\n        Registrar Nuevos Clientes: <b>Denegado </b><br>\r\n        Modificar Información de Clientes: <b>Denegado </b><br>\r\n        Consultar Lista de Clientes Regitrados: <b>Denegado </b><br>\r\n        Visualizar Historial de Clientes: <b>Denegado </b><br>\r\n        Acceder a Facturas de Clientes: <b>Denegado </b><br><br>\r\n\r\n        ****** Módulo Empleados          ******<br>\r\n        Acceso al módulo de Empleados:  <b>Sin Acceso </b><br>\r\n        Registrar Nuevos Empleados: <b>Denegado </b><br>\r\n        Modificar Información de Empleados: <b>Denegado </b><br>\r\n        Consultar Lista de Empleados Registrados: <b>Denegado </b><br><br>\r\n\r\n        ****** Módulo Roles  ******<br>\r\n        Acceso al módulo de Roles:  <b>Sin Acceso </b><br>\r\n        Registrar Nuevos Roles: <b>Denegado </b><br>\r\n        Modificar Información de Roles: <b>Denegado </b><br>\r\n        Consultar Lista de Roles Registrados: <b>Denegado </b> <br><br>\r\n\r\n        ****** Módulo Configuración del sistema  ******<br>\r\n        Acceso al módulo los Ajustes del Sistema:  <b>Sin Acceso </b><br>\r\n        Modificar Cantidad de Preguntas de Seguridad: <b>Denegado </b><br>\r\n        Modificar Tiempo de Inactividad de Sesión: <b>Denegado </b><br>\r\n        Modificar Cantidad de Caracteres Permitidos: <b>Denegado </b><br>\r\n        Modificar Cantidad de Símbolos Permitidos: <b>Denegado </b><br>\r\n        Modificar Cantidad de Números Permitidos: <b>Denegado </b><br>\r\n        Modificar Intentos de Inicio de Sesión: <b>Denegado </b><br><br>\r\n\r\n        ****** Módulo Bitátora      ******<br>\r\n        Acceso al módulo la Bitácora: <b>Sin Acceso </b><br>\r\n        Consultar Registros de la Bitácora: <b>Denegado </b><br><br><br>\r\n\r\n\r\n        ************* Información actualizada: ************* <br><br>\r\n        ****** Módulo Proveedores   ******<br>\r\n        Acceso al módulo de Proveedores:  <b>Acceso Total</b><br>\r\n        Registrar Nuevos Proveedores: <b>Permitido </b><br>\r\n        Modificar Información de Proveedores: <b>Permitido </b><br>\r\n        Consultar Lista de Proveedores Registrados: <b>Permitido </b><br>\r\n        Visualizar Historial de Compras: <b>Permitido </b><br><br>\r\n\r\n        ****** Módulo Productos     ******<br>\r\n        Acceso al módulo de Productos:  <b>Acceso Total </b><br>\r\n        Registrar Nuevas Categorías: <b>Permitido </b><br>\r\n        Registrar Nuevas Presentaciones: <b>Permitido </b><br>\r\n        Registrar Nuevos Productos: <b>Permitido </b><br>\r\n        Consultar Lista de Productos Registrados: <b>Permitido </b><br>\r\n        Registrar Entrada de Productos: <b>Permitido </b><br>\r\n        Consultar Lista de Entradas de Productos: <b>Permitido </b><br><br>\r\n        \r\n        ****** Módulo Ventas        ******<br>\r\n        Acceso al módulo de Ventas:  <b>Sin Acceso </b><br>\r\n        Generar Nuevas Ventas: <b>Denegado </b><br>\r\n        Consultar Lista de Ventas Realizadas: <b>Denegado </b><br>\r\n        Visualizar Detalles de Ventas: <b>Denegado </b><br>\r\n        Acceder a Facturas de Ventas: <b>Denegado </b><br>\r\n        Consultar Estadísticas de Ventas: <b>Denegado </b><br><br>\r\n\r\n        ****** Módulo Menú          ******<br>\r\n        Acceso al módulo de Servicios:  <b>Acceso Parcial </b><br>\r\n        Registrar Nuevos Servicios: <b>Permitido </b><br>\r\n        Modificar Información de Servicios: <b>Denegado </b><br>\r\n        Consultar Lista de Servicios Registrados: <b>Denegado </b><br><br>\r\n\r\n        ****** Módulo Clientes      ******<br>\r\n        Acceso al módulo de Clientes:  <b>Sin Acceso </b><br>\r\n        Registrar Nuevos Clientes: <b>Denegado </b><br>\r\n        Modificar Información de Clientes: <b>Denegado </b><br>\r\n        Consultar Lista de Clientes Registrados: <b>Denegado </b><br>\r\n        Visualizar Historial de Clientes: <b>Denegado </b><br>\r\n        Acceder a Facturas de Clientes: <b>Denegado </b><br><br>\r\n\r\n        ****** Módulo Empleados          ******<br>\r\n        Acceso al módulo de Empleados:  <b>Sin Acceso </b><br>\r\n        Registrar Nuevos Empleados: <b>Denegado </b><br>\r\n        Modificar Información de Empleados: <b>Denegado </b><br>\r\n        Consultar Lista de Empleados Registrados: <b>Denegado </b><br><br>\r\n\r\n        ****** Módulo Roles  ******<br>\r\n        Acceso al módulo de Roles:  <b>Sin Acceso </b><br>\r\n        Registrar Nuevos Roles: <b>Denegado </b><br>\r\n        Modificar Información de Roles: <b>Denegado </b><br>\r\n        Consultar Lista de Roles Registrados: <b>Denegado </b> <br><br>\r\n\r\n        ****** Módulo Configuración del sistema  ******<br>\r\n        Acceso al módulo los Ajustes del Sistema:  <b>Sin Acceso </b><br>\r\n        Modificar Cantidad de Preguntas de Seguridad: <b>Denegado </b><br>\r\n        Modificar Tiempo de Inactividad de Sesión: <b>Denegado </b><br>\r\n        Modificar Cantidad de Caracteres Permitidos: <b>Denegado </b><br>\r\n        Modificar Cantidad de Símbolos Permitidos: <b>Denegado </b><br>\r\n        Modificar Cantidad de Números Permitidos: <b>Denegado </b><br>\r\n        Modificar Intentos de Inicio de Sesión: <b>Denegado </b><br><br>\r\n\r\n        ****** Módulo Bitátora      ******<br>\r\n        Acceso al módulo la Bitácora: <b>Sin Acceso </b><br>\r\n        Consultar Registros de la Bitácora: <b>Denegado</b>\r\n        ', 2);
INSERT INTO `bitacora` (`id`, `fecha_hora`, `accion`, `mensaje`, `id_usuario`) VALUES
(384, '2025-05-05 10:15:59', 'Modificación exitosa de un rol', 'El usuario modificó el rol con la siguiente información:<br> \r\n        Nombre del rol: <b>SUSCRIPTOR</b><br>\r\n        Estado: <b>Activo</b> <br><br>\r\n        ************* Información original: ************* <br><br>\r\n        ****** Módulo Proveedores   ******<br>\r\n        Acceso al módulo de Proveedores: <b>Acceso Total</b><br>\r\n        Registrar Nuevos Proveedores: <b>Permitido</b> <br>\r\n        Modificar Información de Proveedores: <b>Permitido</b> <br>\r\n        Consultar Lista de Proveedores Registrados: <b>Permitido</b> <br>\r\n        Visualizar Historial de Compras: <b>Permitido</b> <br><br>\r\n\r\n        ****** Módulo Productos     ******<br>\r\n        Acceso al módulo de Productos: <b>Acceso Total</b> <br>\r\n        Registrar Nuevas Categorías: <b>Permitido </b><br>\r\n        Registrar Nuevas Presentaciones: <b>Permitido </b><br>\r\n        Registrar Nuevos Productos: <b>Permitido </b><br>\r\n        Consultar Lista de Productos Registrados: <b>Permitido </b><br>\r\n        Registrar Entrada de Productos: <b>Permitido </b><br>\r\n        Consultar Lista de Entradas de Productos: <b>Permitido </b><br><br>\r\n        \r\n        ****** Módulo Ventas        ******<br>\r\n        Acceso al módulo de Ventas:  <b>Sin Acceso </b> <br>\r\n        Generar Nuevas Ventas: <b>Denegado </b><br>\r\n        Consultar Lista de Ventas Realizadas: <b>Denegado </b><br>\r\n        Visualizar Detalles de Ventas: <b>Denegado </b><br>\r\n        Acceder a Facturas de Ventas: <b>Denegado </b><br>\r\n        Consultar Estadísticas de Ventas: <b>Denegado </b><br><br>\r\n\r\n        ****** Módulo Menú          ******<br>\r\n        Acceso al módulo de Servicios:  <b>Acceso Parcial </b><br>\r\n        Registrar Nuevos Servicios: <b>Permitido </b><br>\r\n        Modificar Información de Servicios: <b>Denegado </b><br>\r\n        Consultar Lista de Servicios Registrados: <b>Denegado </b><br><br>\r\n\r\n        ****** Módulo Clientes      ******<br>\r\n        Acceso al módulo de Clientes:  <b>Sin Acceso </b><br>\r\n        Registrar Nuevos Clientes: <b>Denegado </b><br>\r\n        Modificar Información de Clientes: <b>Denegado </b><br>\r\n        Consultar Lista de Clientes Regitrados: <b>Denegado </b><br>\r\n        Visualizar Historial de Clientes: <b>Denegado </b><br>\r\n        Acceder a Facturas de Clientes: <b>Denegado </b><br><br>\r\n\r\n        ****** Módulo Empleados          ******<br>\r\n        Acceso al módulo de Empleados:  <b>Sin Acceso </b><br>\r\n        Registrar Nuevos Empleados: <b>Denegado </b><br>\r\n        Modificar Información de Empleados: <b>Denegado </b><br>\r\n        Consultar Lista de Empleados Registrados: <b>Denegado </b><br><br>\r\n\r\n        ****** Módulo Roles  ******<br>\r\n        Acceso al módulo de Roles:  <b>Sin Acceso </b><br>\r\n        Registrar Nuevos Roles: <b>Denegado </b><br>\r\n        Modificar Información de Roles: <b>Denegado </b><br>\r\n        Consultar Lista de Roles Registrados: <b>Denegado </b> <br><br>\r\n\r\n        ****** Módulo Configuración del sistema  ******<br>\r\n        Acceso al módulo los Ajustes del Sistema:  <b>Sin Acceso </b><br>\r\n        Modificar Cantidad de Preguntas de Seguridad: <b>Denegado </b><br>\r\n        Modificar Tiempo de Inactividad de Sesión: <b>Denegado </b><br>\r\n        Modificar Cantidad de Caracteres Permitidos: <b>Denegado </b><br>\r\n        Modificar Cantidad de Símbolos Permitidos: <b>Denegado </b><br>\r\n        Modificar Cantidad de Números Permitidos: <b>Denegado </b><br>\r\n        Modificar Intentos de Inicio de Sesión: <b>Denegado </b><br><br>\r\n\r\n        ****** Módulo Bitátora      ******<br>\r\n        Acceso al módulo la Bitácora: <b>Sin Acceso </b><br>\r\n        Consultar Registros de la Bitácora: <b>Denegado </b><br><br><br>\r\n\r\n\r\n        ************* Información actualizada: ************* <br><br>\r\n        ****** Módulo Proveedores   ******<br>\r\n        Acceso al módulo de Proveedores:  <b>Acceso Total</b><br>\r\n        Registrar Nuevos Proveedores: <b>Permitido </b><br>\r\n        Modificar Información de Proveedores: <b>Permitido </b><br>\r\n        Consultar Lista de Proveedores Registrados: <b>Permitido </b><br>\r\n        Visualizar Historial de Compras: <b>Permitido </b><br><br>\r\n\r\n        ****** Módulo Productos     ******<br>\r\n        Acceso al módulo de Productos:  <b>Acceso Total </b><br>\r\n        Registrar Nuevas Categorías: <b>Permitido </b><br>\r\n        Registrar Nuevas Presentaciones: <b>Permitido </b><br>\r\n        Registrar Nuevos Productos: <b>Permitido </b><br>\r\n        Consultar Lista de Productos Registrados: <b>Permitido </b><br>\r\n        Registrar Entrada de Productos: <b>Permitido </b><br>\r\n        Consultar Lista de Entradas de Productos: <b>Permitido </b><br><br>\r\n        \r\n        ****** Módulo Ventas        ******<br>\r\n        Acceso al módulo de Ventas:  <b>Sin Acceso </b><br>\r\n        Generar Nuevas Ventas: <b>Denegado </b><br>\r\n        Consultar Lista de Ventas Realizadas: <b>Denegado </b><br>\r\n        Visualizar Detalles de Ventas: <b>Denegado </b><br>\r\n        Acceder a Facturas de Ventas: <b>Denegado </b><br>\r\n        Consultar Estadísticas de Ventas: <b>Denegado </b><br><br>\r\n\r\n        ****** Módulo Menú          ******<br>\r\n        Acceso al módulo de Servicios:  <b>Acceso Parcial </b><br>\r\n        Registrar Nuevos Servicios: <b>Permitido </b><br>\r\n        Modificar Información de Servicios: <b>Denegado </b><br>\r\n        Consultar Lista de Servicios Registrados: <b>Denegado </b><br><br>\r\n\r\n        ****** Módulo Clientes      ******<br>\r\n        Acceso al módulo de Clientes:  <b>Sin Acceso </b><br>\r\n        Registrar Nuevos Clientes: <b>Denegado </b><br>\r\n        Modificar Información de Clientes: <b>Denegado </b><br>\r\n        Consultar Lista de Clientes Registrados: <b>Denegado </b><br>\r\n        Visualizar Historial de Clientes: <b>Denegado </b><br>\r\n        Acceder a Facturas de Clientes: <b>Denegado </b><br><br>\r\n\r\n        ****** Módulo Empleados          ******<br>\r\n        Acceso al módulo de Empleados:  <b>Acceso Parcial </b><br>\r\n        Registrar Nuevos Empleados: <b>Permitido </b><br>\r\n        Modificar Información de Empleados: <b>Denegado </b><br>\r\n        Consultar Lista de Empleados Registrados: <b>Denegado </b><br><br>\r\n\r\n        ****** Módulo Roles  ******<br>\r\n        Acceso al módulo de Roles:  <b>Sin Acceso </b><br>\r\n        Registrar Nuevos Roles: <b>Denegado </b><br>\r\n        Modificar Información de Roles: <b>Denegado </b><br>\r\n        Consultar Lista de Roles Registrados: <b>Denegado </b> <br><br>\r\n\r\n        ****** Módulo Configuración del sistema  ******<br>\r\n        Acceso al módulo los Ajustes del Sistema:  <b>Sin Acceso </b><br>\r\n        Modificar Cantidad de Preguntas de Seguridad: <b>Denegado </b><br>\r\n        Modificar Tiempo de Inactividad de Sesión: <b>Denegado </b><br>\r\n        Modificar Cantidad de Caracteres Permitidos: <b>Denegado </b><br>\r\n        Modificar Cantidad de Símbolos Permitidos: <b>Denegado </b><br>\r\n        Modificar Cantidad de Números Permitidos: <b>Denegado </b><br>\r\n        Modificar Intentos de Inicio de Sesión: <b>Denegado </b><br><br>\r\n\r\n        ****** Módulo Bitátora      ******<br>\r\n        Acceso al módulo la Bitácora: <b>Sin Acceso </b><br>\r\n        Consultar Registros de la Bitácora: <b>Denegado</b>\r\n        ', 2),
(385, '2025-05-05 10:17:37', 'Modificación exitosa de un rol', 'El usuario modificó el rol con la siguiente información:<br> \r\n        Nombre del rol: <b>SUSCRIPTOR</b><br>\r\n        Estado: <b>Activo</b> <br><br>\r\n        ************* Información original: ************* <br><br>\r\n         <b>****** Módulo Proveedores   ******</b><br>\r\n        Acceso al módulo de Proveedores: <b>Acceso Total</b><br>\r\n        Registrar Nuevos Proveedores: <b>Permitido</b> <br>\r\n        Modificar Información de Proveedores: <b>Permitido</b> <br>\r\n        Consultar Lista de Proveedores Registrados: <b>Permitido</b> <br>\r\n        Visualizar Historial de Compras: <b>Permitido</b> <br><br>\r\n\r\n         <b>****** Módulo Productos     ******</b><br>\r\n        Acceso al módulo de Productos: <b>Acceso Total</b> <br>\r\n        Registrar Nuevas Categorías: <b>Permitido </b><br>\r\n        Registrar Nuevas Presentaciones: <b>Permitido </b><br>\r\n        Registrar Nuevos Productos: <b>Permitido </b><br>\r\n        Consultar Lista de Productos Registrados: <b>Permitido </b><br>\r\n        Registrar Entrada de Productos: <b>Permitido </b><br>\r\n        Consultar Lista de Entradas de Productos: <b>Permitido </b><br><br>\r\n        \r\n         <b>****** Módulo Ventas        ******</b><br>\r\n        Acceso al módulo de Ventas:  <b>Sin Acceso </b> <br>\r\n        Generar Nuevas Ventas: <b>Denegado </b><br>\r\n        Consultar Lista de Ventas Realizadas: <b>Denegado </b><br>\r\n        Visualizar Detalles de Ventas: <b>Denegado </b><br>\r\n        Acceder a Facturas de Ventas: <b>Denegado </b><br>\r\n        Consultar Estadísticas de Ventas: <b>Denegado </b><br><br>\r\n\r\n         <b>****** Módulo Menú          ******</b><br>\r\n        Acceso al módulo de Servicios:  <b>Acceso Parcial </b><br>\r\n        Registrar Nuevos Servicios: <b>Permitido </b><br>\r\n        Modificar Información de Servicios: <b>Denegado </b><br>\r\n        Consultar Lista de Servicios Registrados: <b>Denegado </b><br><br>\r\n\r\n         <b>****** Módulo Clientes      ******</b><br>\r\n        Acceso al módulo de Clientes:  <b>Sin Acceso </b><br>\r\n        Registrar Nuevos Clientes: <b>Denegado </b><br>\r\n        Modificar Información de Clientes: <b>Denegado </b><br>\r\n        Consultar Lista de Clientes Regitrados: <b>Denegado </b><br>\r\n        Visualizar Historial de Clientes: <b>Denegado </b><br>\r\n        Acceder a Facturas de Clientes: <b>Denegado </b><br><br>\r\n\r\n         <b>****** Módulo Empleados          ******</b><br>\r\n        Acceso al módulo de Empleados:  <b>Acceso Parcial </b><br>\r\n        Registrar Nuevos Empleados: <b>Permitido </b><br>\r\n        Modificar Información de Empleados: <b>Denegado </b><br>\r\n        Consultar Lista de Empleados Registrados: <b>Denegado </b><br><br>\r\n\r\n         <b>****** Módulo Roles  ******</b><br>\r\n        Acceso al módulo de Roles:  <b>Sin Acceso </b><br>\r\n        Registrar Nuevos Roles: <b>Denegado </b><br>\r\n        Modificar Información de Roles: <b>Denegado </b><br>\r\n        Consultar Lista de Roles Registrados: <b>Denegado </b> <br><br>\r\n\r\n         <b>****** Módulo Configuración del sistema  ******</b><br>\r\n        Acceso al módulo los Ajustes del Sistema:  <b>Sin Acceso </b><br>\r\n        Modificar Cantidad de Preguntas de Seguridad: <b>Denegado </b><br>\r\n        Modificar Tiempo de Inactividad de Sesión: <b>Denegado </b><br>\r\n        Modificar Cantidad de Caracteres Permitidos: <b>Denegado </b><br>\r\n        Modificar Cantidad de Símbolos Permitidos: <b>Denegado </b><br>\r\n        Modificar Cantidad de Números Permitidos: <b>Denegado </b><br>\r\n        Modificar Intentos de Inicio de Sesión: <b>Denegado </b><br><br>\r\n\r\n         <b>****** Módulo Bitátora      ******</b><br>\r\n        Acceso al módulo la Bitácora: <b>Sin Acceso </b><br>\r\n        Consultar Registros de la Bitácora: <b>Denegado </b><br><br><br>\r\n\r\n\r\n        ************* Información actualizada: ************* <br><br>\r\n         <b>****** Módulo Proveedores   ******</b><br>\r\n        Acceso al módulo de Proveedores:  <b>Acceso Total</b><br>\r\n        Registrar Nuevos Proveedores: <b>Permitido </b><br>\r\n        Modificar Información de Proveedores: <b>Permitido </b><br>\r\n        Consultar Lista de Proveedores Registrados: <b>Permitido </b><br>\r\n        Visualizar Historial de Compras: <b>Permitido </b><br><br>\r\n\r\n         <b>****** Módulo Productos     ******</b><br>\r\n        Acceso al módulo de Productos:  <b>Acceso Total </b><br>\r\n        Registrar Nuevas Categorías: <b>Permitido </b><br>\r\n        Registrar Nuevas Presentaciones: <b>Permitido </b><br>\r\n        Registrar Nuevos Productos: <b>Permitido </b><br>\r\n        Consultar Lista de Productos Registrados: <b>Permitido </b><br>\r\n        Registrar Entrada de Productos: <b>Permitido </b><br>\r\n        Consultar Lista de Entradas de Productos: <b>Permitido </b><br><br>\r\n        \r\n         <b>****** Módulo Ventas        ******</b><br>\r\n        Acceso al módulo de Ventas:  <b>Acceso Parcial </b><br>\r\n        Generar Nuevas Ventas: <b>Denegado </b><br>\r\n        Consultar Lista de Ventas Realizadas: <b>Permitido </b><br>\r\n        Visualizar Detalles de Ventas: <b>Denegado </b><br>\r\n        Acceder a Facturas de Ventas: <b>Denegado </b><br>\r\n        Consultar Estadísticas de Ventas: <b>Denegado </b><br><br>\r\n\r\n         <b>****** Módulo Menú          ******</b><br>\r\n        Acceso al módulo de Servicios:  <b>Acceso Parcial </b><br>\r\n        Registrar Nuevos Servicios: <b>Permitido </b><br>\r\n        Modificar Información de Servicios: <b>Denegado </b><br>\r\n        Consultar Lista de Servicios Registrados: <b>Denegado </b><br><br>\r\n\r\n         <b>****** Módulo Clientes      ******</b><br>\r\n        Acceso al módulo de Clientes:  <b>Sin Acceso </b><br>\r\n        Registrar Nuevos Clientes: <b>Denegado </b><br>\r\n        Modificar Información de Clientes: <b>Denegado </b><br>\r\n        Consultar Lista de Clientes Registrados: <b>Denegado </b><br>\r\n        Visualizar Historial de Clientes: <b>Denegado </b><br>\r\n        Acceder a Facturas de Clientes: <b>Denegado </b><br><br>\r\n\r\n         <b>****** Módulo Empleados          ******</b><br>\r\n        Acceso al módulo de Empleados:  <b>Acceso Parcial </b><br>\r\n        Registrar Nuevos Empleados: <b>Permitido </b><br>\r\n        Modificar Información de Empleados: <b>Denegado </b><br>\r\n        Consultar Lista de Empleados Registrados: <b>Denegado </b><br><br>\r\n\r\n         <b>****** Módulo Roles  ******</b><br>\r\n        Acceso al módulo de Roles:  <b>Sin Acceso </b><br>\r\n        Registrar Nuevos Roles: <b>Denegado </b><br>\r\n        Modificar Información de Roles: <b>Denegado </b><br>\r\n        Consultar Lista de Roles Registrados: <b>Denegado </b> <br><br>\r\n\r\n         <b>****** Módulo Configuración del sistema  ******</b><br>\r\n        Acceso al módulo los Ajustes del Sistema:  <b>Sin Acceso </b><br>\r\n        Modificar Cantidad de Preguntas de Seguridad: <b>Denegado </b><br>\r\n        Modificar Tiempo de Inactividad de Sesión: <b>Denegado </b><br>\r\n        Modificar Cantidad de Caracteres Permitidos: <b>Denegado </b><br>\r\n        Modificar Cantidad de Símbolos Permitidos: <b>Denegado </b><br>\r\n        Modificar Cantidad de Números Permitidos: <b>Denegado </b><br>\r\n        Modificar Intentos de Inicio de Sesión: <b>Denegado </b><br><br>\r\n\r\n         <b>****** Módulo Bitátora      ******</b><br>\r\n        Acceso al módulo la Bitácora: <b>Sin Acceso </b><br>\r\n        Consultar Registros de la Bitácora: <b>Denegado</b>\r\n        ', 2),
(386, '2025-05-05 10:19:58', 'Modificación exitosa de un rol', 'El usuario modificó el rol con la siguiente información:<br> \r\n        Nombre del rol: <b>SUSCRIPTOR</b><br>\r\n        Estado: <b>Activo</b> <br><br>\r\n        <b>************* Información original: ************* </b><br><br>\r\n         <b>****** Módulo Proveedores   ******</b><br>\r\n        Acceso al módulo de Proveedores: <b>Acceso Total</b><br>\r\n        Registrar Nuevos Proveedores: <b>Permitido</b> <br>\r\n        Modificar Información de Proveedores: <b>Permitido</b> <br>\r\n        Consultar Lista de Proveedores Registrados: <b>Permitido</b> <br>\r\n        Visualizar Historial de Compras: <b>Permitido</b> <br><br>\r\n\r\n         <b>****** Módulo Productos     ******</b><br>\r\n        Acceso al módulo de Productos: <b>Acceso Total</b> <br>\r\n        Registrar Nuevas Categorías: <b>Permitido </b><br>\r\n        Registrar Nuevas Presentaciones: <b>Permitido </b><br>\r\n        Registrar Nuevos Productos: <b>Permitido </b><br>\r\n        Consultar Lista de Productos Registrados: <b>Permitido </b><br>\r\n        Registrar Entrada de Productos: <b>Permitido </b><br>\r\n        Consultar Lista de Entradas de Productos: <b>Permitido </b><br><br>\r\n        \r\n         <b>****** Módulo Ventas        ******</b><br>\r\n        Acceso al módulo de Ventas:  <b>Acceso Parcial </b> <br>\r\n        Generar Nuevas Ventas: <b>Denegado </b><br>\r\n        Consultar Lista de Ventas Realizadas: <b>Permitido </b><br>\r\n        Visualizar Detalles de Ventas: <b>Denegado </b><br>\r\n        Acceder a Facturas de Ventas: <b>Denegado </b><br>\r\n        Consultar Estadísticas de Ventas: <b>Denegado </b><br><br>\r\n\r\n         <b>****** Módulo Menú          ******</b><br>\r\n        Acceso al módulo de Servicios:  <b>Acceso Parcial </b><br>\r\n        Registrar Nuevos Servicios: <b>Permitido </b><br>\r\n        Modificar Información de Servicios: <b>Denegado </b><br>\r\n        Consultar Lista de Servicios Registrados: <b>Denegado </b><br><br>\r\n\r\n         <b>****** Módulo Clientes      ******</b><br>\r\n        Acceso al módulo de Clientes:  <b>Sin Acceso </b><br>\r\n        Registrar Nuevos Clientes: <b>Denegado </b><br>\r\n        Modificar Información de Clientes: <b>Denegado </b><br>\r\n        Consultar Lista de Clientes Regitrados: <b>Denegado </b><br>\r\n        Visualizar Historial de Clientes: <b>Denegado </b><br>\r\n        Acceder a Facturas de Clientes: <b>Denegado </b><br><br>\r\n\r\n         <b>****** Módulo Empleados          ******</b><br>\r\n        Acceso al módulo de Empleados:  <b>Acceso Parcial </b><br>\r\n        Registrar Nuevos Empleados: <b>Permitido </b><br>\r\n        Modificar Información de Empleados: <b>Denegado </b><br>\r\n        Consultar Lista de Empleados Registrados: <b>Denegado </b><br><br>\r\n\r\n         <b>****** Módulo Roles  ******</b><br>\r\n        Acceso al módulo de Roles:  <b>Sin Acceso </b><br>\r\n        Registrar Nuevos Roles: <b>Denegado </b><br>\r\n        Modificar Información de Roles: <b>Denegado </b><br>\r\n        Consultar Lista de Roles Registrados: <b>Denegado </b> <br><br>\r\n\r\n         <b>****** Módulo Configuración del sistema  ******</b><br>\r\n        Acceso al módulo los Ajustes del Sistema:  <b>Sin Acceso </b><br>\r\n        Modificar Cantidad de Preguntas de Seguridad: <b>Denegado </b><br>\r\n        Modificar Tiempo de Inactividad de Sesión: <b>Denegado </b><br>\r\n        Modificar Cantidad de Caracteres Permitidos: <b>Denegado </b><br>\r\n        Modificar Cantidad de Símbolos Permitidos: <b>Denegado </b><br>\r\n        Modificar Cantidad de Números Permitidos: <b>Denegado </b><br>\r\n        Modificar Intentos de Inicio de Sesión: <b>Denegado </b><br><br>\r\n\r\n         <b>****** Módulo Bitátora      ******</b><br>\r\n        Acceso al módulo la Bitácora: <b>Sin Acceso </b><br>\r\n        Consultar Registros de la Bitácora: <b>Denegado </b><br><br><br>\r\n\r\n\r\n        <b>************* Información actualizada: ************* </b><br><br>\r\n         <b>****** Módulo Proveedores   ******</b><br>\r\n        Acceso al módulo de Proveedores:  <b>Acceso Total</b><br>\r\n        Registrar Nuevos Proveedores: <b>Permitido </b><br>\r\n        Modificar Información de Proveedores: <b>Permitido </b><br>\r\n        Consultar Lista de Proveedores Registrados: <b>Permitido </b><br>\r\n        Visualizar Historial de Compras: <b>Permitido </b><br><br>\r\n\r\n         <b>****** Módulo Productos     ******</b><br>\r\n        Acceso al módulo de Productos:  <b>Sin Acceso </b><br>\r\n        Registrar Nuevas Categorías: <b>Denegado </b><br>\r\n        Registrar Nuevas Presentaciones: <b>Denegado </b><br>\r\n        Registrar Nuevos Productos: <b>Denegado </b><br>\r\n        Consultar Lista de Productos Registrados: <b>Denegado </b><br>\r\n        Registrar Entrada de Productos: <b>Denegado </b><br>\r\n        Consultar Lista de Entradas de Productos: <b>Denegado </b><br><br>\r\n        \r\n         <b>****** Módulo Ventas        ******</b><br>\r\n        Acceso al módulo de Ventas:  <b>Acceso Parcial </b><br>\r\n        Generar Nuevas Ventas: <b>Denegado </b><br>\r\n        Consultar Lista de Ventas Realizadas: <b>Permitido </b><br>\r\n        Visualizar Detalles de Ventas: <b>Denegado </b><br>\r\n        Acceder a Facturas de Ventas: <b>Denegado </b><br>\r\n        Consultar Estadísticas de Ventas: <b>Denegado </b><br><br>\r\n\r\n         <b>****** Módulo Menú          ******</b><br>\r\n        Acceso al módulo de Servicios:  <b>Acceso Parcial </b><br>\r\n        Registrar Nuevos Servicios: <b>Permitido </b><br>\r\n        Modificar Información de Servicios: <b>Denegado </b><br>\r\n        Consultar Lista de Servicios Registrados: <b>Denegado </b><br><br>\r\n\r\n         <b>****** Módulo Clientes      ******</b><br>\r\n        Acceso al módulo de Clientes:  <b>Sin Acceso </b><br>\r\n        Registrar Nuevos Clientes: <b>Denegado </b><br>\r\n        Modificar Información de Clientes: <b>Denegado </b><br>\r\n        Consultar Lista de Clientes Registrados: <b>Denegado </b><br>\r\n        Visualizar Historial de Clientes: <b>Denegado </b><br>\r\n        Acceder a Facturas de Clientes: <b>Denegado </b><br><br>\r\n\r\n         <b>****** Módulo Empleados          ******</b><br>\r\n        Acceso al módulo de Empleados:  <b>Acceso Parcial </b><br>\r\n        Registrar Nuevos Empleados: <b>Permitido </b><br>\r\n        Modificar Información de Empleados: <b>Denegado </b><br>\r\n        Consultar Lista de Empleados Registrados: <b>Denegado </b><br><br>\r\n\r\n         <b>****** Módulo Roles  ******</b><br>\r\n        Acceso al módulo de Roles:  <b>Sin Acceso </b><br>\r\n        Registrar Nuevos Roles: <b>Denegado </b><br>\r\n        Modificar Información de Roles: <b>Denegado </b><br>\r\n        Consultar Lista de Roles Registrados: <b>Denegado </b> <br><br>\r\n\r\n         <b>****** Módulo Configuración del sistema  ******</b><br>\r\n        Acceso al módulo los Ajustes del Sistema:  <b>Sin Acceso </b><br>\r\n        Modificar Cantidad de Preguntas de Seguridad: <b>Denegado </b><br>\r\n        Modificar Tiempo de Inactividad de Sesión: <b>Denegado </b><br>\r\n        Modificar Cantidad de Caracteres Permitidos: <b>Denegado </b><br>\r\n        Modificar Cantidad de Símbolos Permitidos: <b>Denegado </b><br>\r\n        Modificar Cantidad de Números Permitidos: <b>Denegado </b><br>\r\n        Modificar Intentos de Inicio de Sesión: <b>Denegado </b><br><br>\r\n\r\n         <b>****** Módulo Bitátora      ******</b><br>\r\n        Acceso al módulo la Bitácora: <b>Sin Acceso </b><br>\r\n        Consultar Registros de la Bitácora: <b>Denegado</b>\r\n        ', 2),
(387, '2025-05-05 10:20:24', 'Cambio de estado de un rol', 'El usuario cambió el estado del rol con la siguiente información: \n\nNombre del rol:  <b>FULL COUNTER \nEstado: Inactivo \n\n\nInformación del servicio actualizada: \n\nNombre del rol:  <b>FULL COUNTER \nEstado: Activo', 2),
(388, '2025-05-05 10:23:39', 'Cambio de estado de un rol', 'El usuario cambió el estado del rol con la siguiente información: \n\nNombre del rol:  <b>FULL COUNTE \nEstado: Inactivo \n\n\nInformación del servicio actualizada: \n\nNombre del rol:  <b>FULL COUNTE \nEstado: Activo', 2),
(389, '2025-05-05 10:28:06', 'Cambio exitoso del estado de un rol', 'El usuario cambió el estado del rol con la siguiente información: <br><br>\r\n        Información del rol original: <br><br>\r\n        Nombre del rol:  <b>SUSCRIPTOR </b><br><br>\r\n        Estado: Activo <br><br><br>\r\n        Información del rol actualizada: <br><br>\r\n        Nombre del rol:  <b>SUSCRIPTOR </b><br>\r\n        Estado: Inactivo', 2),
(390, '2025-05-05 10:29:50', 'Cambio exitoso del estado de un rol', 'El usuario cambió el estado del rol con la siguiente información: <br><br>\r\n        ***** Información del rol original: *****<br><br>\r\n        Nombre del rol:  <b>PROVEEDOR </b><br><br>\r\n        Estado: <b>Activo</b> <br><br>\r\n        ***** Información del rol actualizada: *****<br><br>\r\n        Nombre del rol:  <b>PROVEEDOR </b><br>\r\n        Estado: <b>Inactivo</b>', 2),
(391, '2025-05-05 10:30:48', 'Cambio exitoso del estado de un rol', 'El usuario cambió el estado del rol con la siguiente información: <br><br>\r\n        <b>***** Información del rol original: *****</b><br><br>\r\n        Nombre del rol:  <b>PROVEEDOR </b><br><br>\r\n        Estado: <b>Activo</b> <br><br>\r\n        <b>***** Información del rol actualizada: *****</b><br><br>\r\n        Nombre del rol:  <b>PROVEEDOR </b><br>\r\n        Estado: <b>Inactivo</b>', 2),
(392, '2025-05-05 10:33:19', 'Cambio exitoso del estado de un rol', 'El usuario cambió el estado del rol con la siguiente información: <br><br>\r\n        <b>***** Información del rol original: *****</b><br><br>\r\n        Nombre del rol:  <b>ROL </b><br><br>\r\n        Estado: <b>Inactivo</b> <br><br>\r\n        <b>***** Información del rol actualizada: *****</b><br><br>\r\n        Nombre del rol:  <b>ROL </b><br>\r\n        Estado: <b>Activo</b>', 2),
(393, '2025-05-05 10:44:55', 'Registro exitoso de un rol', 'El usuario Registró el rol con la siguiente infromación: <br>\r\n        Nombre del rol: <b>GERENTE</b><br>\r\n        Estado: <b>Activo</b>', 2),
(394, '2025-05-05 10:47:09', 'Modificación exitosa de características de acceso de un usuario', 'Se modificaron las características de acceso de un usuario: <br><br>\r\n        Información del usuario modificado:<br>\r\n        Cédula: V-32145775<br>\r\n        Nombre: DIEGO FERNANDEZ<br>\r\n        Teléfono: 04154785965<br><br>\r\n        Información original:<br>\r\n        Estado: Inactivo<br>\r\n        Permiso de inicio de sesión: Denegado<br>\r\n        Rol asignado: ADIMINISTRADOR<br><br>\r\n        Información Actual:<br>\r\n        Estado: Activo<br>\r\n        Permiso de inicio de sesión: Permitido<br>\r\n        Rol asignado: ADIMINISTRADOR\r\n        ', 2),
(395, '2025-05-05 11:14:31', 'Modificación exitosa de las características de acceso de un usuario', 'El usuario modificó las características de acceso de un usuario: <br><br>\r\n         <b>****** Información del usuario modificado:   ******</b><br>\r\n        Cédula: <b>V-12345679</b><br>\r\n        Nombre: <b>PEPE PEREZ</b><br>\r\n        Teléfono: <b>04154785965</b><br><br>\r\n\r\n         <b>****** Información original:   ******</b><br>\r\n        Estado: <b>Activo</b><br>\r\n        Permiso de inicio de sesión: <b>Denegado</b><br>\r\n        Rol asignado: <b>EMPLEADO</b><br><br>\r\n\r\n         <b>****** Información Actual:   ******</b><br>\r\n        Estado: <b>Inactivo</b><br>\r\n        Permiso de inicio de sesión: <b>Permitido</b><br>\r\n        Rol asignado: <b>PASANTE</b>\r\n        ', 2),
(396, '2025-05-05 11:15:27', 'Modificación exitosa de las características de acceso de un usuario', 'El usuario modificó las características de acceso de un usuario: <br><br>\r\n         <b>****** Información del usuario modificado:   ******</b><br>\r\n        Cédula: <b>V-12345679</b><br>\r\n        Nombre: <b>PEPE PEREZ</b><br>\r\n        Teléfono: <b>04154785965</b><br><br>\r\n\r\n         <b>****** Información original:   ******</b><br>\r\n        Estado: <b>Inactivo</b><br>\r\n        Permiso de inicio de sesión: <b>Permitido</b><br>\r\n        Rol asignado: <b>PASANTE</b><br><br>\r\n\r\n         <b>****** Información Actual:   ******</b><br>\r\n        Estado: <b>Inactivo</b><br>\r\n        Permiso de inicio de sesión: <b>Denegado</b><br>\r\n        Rol asignado: <b>PASANTE</b>\r\n        ', 2),
(397, '2025-05-05 11:17:20', 'Modificación exitosa de las características de acceso de un usuario', 'El usuario modificó las características de acceso de un usuario: <br><br>\r\n         <b>****** Información del usuario modificado:   ******</b><br>\r\n        Cédula: <b>V-12345679</b><br>\r\n        Nombre: <b>PEPE PEREZ</b><br>\r\n        Teléfono: <b>04154785965</b><br><br>\r\n\r\n         <b>****** Información original:   ******</b><br>\r\n        Estado: <b>Inactivo</b><br>\r\n        Permiso de inicio de sesión: <b>Denegado</b><br>\r\n        Rol asignado: <b>PASANTE</b><br><br>\r\n\r\n         <b>****** Información Actualizada:   ******</b><br>\r\n        Estado: <b>Activo</b><br>\r\n        Permiso de inicio de sesión: <b>Denegado</b><br>\r\n        Rol asignado: <b>PASANTE</b>\r\n        ', 2),
(398, '2025-05-05 11:18:40', 'Modificación exitosa de las características de acceso de un usuario', 'El usuario modificó las características de acceso de un usuario: <br><br>\r\n         <b>****** Información del usuario modificado:   ******</b><br>\r\n        Cédula: <b>V-25478958</b><br>\r\n        Nombre: <b>JULIO BAEZ</b><br>\r\n        Teléfono: <b>04154785965</b><br><br>\r\n\r\n         <b>****** Información original:   ******</b><br>\r\n        Estado: <b>Activo</b><br>\r\n        Permiso de inicio de sesión: <b>Permitido</b><br>\r\n        Rol asignado: <b>PROVEEDOR</b><br><br>\r\n\r\n         <b>****** Información Actualizada:   ******</b><br>\r\n        Estado: <b>Inactivo</b><br>\r\n        Permiso de inicio de sesión: <b>Denegado</b><br>\r\n        Rol asignado: <b>PASANTE</b>\r\n        ', 2),
(399, '2025-05-05 11:19:09', 'Modificación exitosa del acceso de un usuario.', 'Se restableció el acceso al sistema del usuario con la siguiente información: <br><br>\r\n        Información del usuario modificado:<br>\r\n        Cédula: V-25478958<br>\r\n        Nombre: JULIO<br>\r\n        Apellido: BAEZ<br><br>\r\n        Información original:<br>\r\n        Estado: Inactivo<br>\r\n        Permiso de inicio de sesión: Permitido<br>\r\n        Rol asignado: ADIMINISTRADOR<br>\r\n        Bloqueado: No<br><br>\r\n        Información Actual:<br>\r\n        Estado: Activo<br>\r\n        Permiso de inicio de sesión: Denegado<br>\r\n        Rol asignado: ADIMINISTRADOR<br>\r\n        Bloqueado: No\r\n        ', 2),
(400, '2025-05-05 11:28:41', 'Modificación exitosa de las características de acceso de un usuario', 'El usuario modificó las características de acceso de un usuario: <br><br>\r\n         <b>****** Información del usuario modificado:   ******</b><br>\r\n        Cédula: <b>E-14257869</b><br>\r\n        Nombre: <b>JOSE PERALTA</b><br>\r\n        Teléfono: <b>04154785965</b><br><br>\r\n\r\n         <b>****** Información original:   ******</b><br>\r\n        Estado: <b>Activo</b><br>\r\n        Permiso de inicio de sesión: <b>Permitido</b><br>\r\n        Rol asignado: <b>EMPLEADO</b><br><br>\r\n\r\n         <b>****** Información Actualizada:   ******</b><br>\r\n        Estado: <b>Inactivo</b><br>\r\n        Permiso de inicio de sesión: <b>Denegado</b><br>\r\n        Rol asignado: <b>PASANTE</b>\r\n        ', 2),
(401, '2025-05-05 11:29:15', 'Modificación exitosa del acceso de un usuario.', 'Se restableció el acceso al sistema del usuario con la siguiente información: <br><br>\r\n         <b>****** Información del usuario modificado:   ******</b><br><br>\r\n        Cédula: <b>E-14257869</b><br>\r\n        Nombre: <b>JOSE</b><br>\r\n        Apellido: <b>PERALTA</b><br><br>\r\n         <b>****** Información original:   ******</b><br><br>\r\n        Estado: <b>Inactivo</b><br>\r\n        Permiso de inicio de sesión: <b>Denegado</b><br>\r\n        Rol asignado: <b>ADIMINISTRADOR</b><br>\r\n        Bloqueado: <b>No</b><br><br>\r\n         <b>****** Información Actual:   ******</b><br><br>\r\n        Estado:  <b>Activo</b><br>\r\n        Permiso de inicio de sesión: <b>Permitido</b><br>\r\n        Rol asignado: <b>ADIMINISTRADOR</b><br>\r\n        Bloqueado: <b>No</b>\r\n        ', 2),
(402, '2025-05-05 11:31:36', 'Modificación exitosa del acceso de un usuario.', 'Se restableció el acceso al sistema del usuario con la siguiente información: <br><br>\r\n         <b>****** Información del usuario modificado:   ******</b><br><br>\r\n        Cédula: <b>E-14257869</b><br>\r\n        Nombre: <b>JOSE</b><br>\r\n        Apellido: <b>PERALTA</b><br><br>\r\n         <b>****** Información original:   ******</b><br><br>\r\n        Estado: <b>Activo</b><br>\r\n        Permiso de inicio de sesión: <b>Permitido</b><br>\r\n        Rol asignado: <b>PASANTE</b><br>\r\n        Bloqueado: <b>Sí</b><br><br>\r\n         <b>****** Información Actual:   ******</b><br><br>\r\n        Estado:  <b>Activo</b><br>\r\n        Permiso de inicio de sesión: <b>Permitido</b><br>\r\n        Rol asignado: <b>PASANTE</b><br>\r\n        Bloqueado: <b>No</b>\r\n        ', 2),
(403, '2025-05-05 11:52:47', 'Registro exitoso del nuevo usuario.', 'El usuario registro a un nuevo usuario con la siguiente informacón: <br><br>\r\n        <b>****** Información del usuario registrado:   ******</b><br><br>\r\n        Cédula: <b>V-12348465 </b><br>\r\n        Nombre: <b>CARLOS </b><br>\r\n        Apellido: <b>COLMENAREZ </b><br>\r\n        Correo: <b>ccolmena@gmail.com </b><br>\r\n        Teléfono: <b>04164567865 </b><br>\r\n        Dirección: <b>URB LA LAGUNA </b><br>\r\n        Rol asignado: <b>GERENTE </b>\r\n        ', 2),
(404, '2025-05-05 11:54:43', 'Cierre de sesión exitoso', 'El usuario ha cerrado sesión correctamente en el sistema.', 2),
(405, '2025-05-05 19:59:33', 'Inicio de sesión exitoso', 'El usuario ha iniciado sesión correctamente en el sistema.', 2),
(406, '2025-05-05 20:01:45', 'Modificación exitosa del perfil de usuario', 'El usuario actualizó su(s) pregunta(s) de seguridad', 2),
(407, '2025-05-05 21:07:44', 'Inicio de sesión exitoso', 'El usuario ha iniciado sesión correctamente en el sistema.', 2),
(408, '2025-05-05 21:09:03', 'Registro exitoso de un nuevo usuario.', 'Se registró un nuevo usuario con la siguiente informacón: <br><br>\r\n        <b>****** Información del usuario registrado:   ******</b><br><br>\r\n        Cédula: <b>V-34234234 </b><br>\r\n        Nombre: <b>MIGUEL </b><br>\r\n        Apellido: <b>SANCHEZ </b><br>\r\n        Correo: <b>sanchez@gmail.com </b><br>\r\n        Teléfono: <b>04144567545 </b><br>\r\n        Dirección: <b>URB LAS MARIAS </b><br>\r\n        Rol asignado: <b>PASANTE </b>\r\n        ', 2),
(409, '2025-05-05 21:12:28', 'Modificación exitosa del acceso de un usuario.', 'Se restableció el acceso al sistema del usuario con la siguiente información: <br><br>\r\n         <b>****** Información del usuario modificado:   ******</b><br><br>\r\n        Cédula: <b>V-34234234</b><br>\r\n        Nombre: <b>MIGUEL</b><br>\r\n        Apellido: <b>SANCHEZ</b><br><br>\r\n         <b>****** Información original:   ******</b><br><br>\r\n        Estado: <b>Activo</b><br>\r\n        Permiso de inicio de sesión: <b>Permitido</b><br>\r\n        Rol asignado: <b>PASANTE</b><br>\r\n        Bloqueado: <b>No</b><br><br>\r\n         <b>****** Información Actual:   ******</b><br><br>\r\n        Estado:  <b>Activo</b><br>\r\n        Permiso de inicio de sesión: <b>Permitido</b><br>\r\n        Rol asignado: <b>PASANTE</b><br>\r\n        Bloqueado: <b>No</b>\r\n        ', 2),
(410, '2025-05-05 21:17:36', 'Registro exitoso de un nuevo usuario.', 'Se registró un nuevo usuario con la siguiente informacón: <br><br>\r\n        <b>****** Información del usuario registrado:   ******</b><br><br>\r\n        Cédula: <b>V-33543345 </b><br>\r\n        Nombre: <b>FERNANDO </b><br>\r\n        Apellido: <b>ALMEIDA </b><br>\r\n        Correo: <b>feralme@gmail.com </b><br>\r\n        Teléfono: <b>04125463535 </b><br>\r\n        Dirección: <b>BARRIO LOS ACOSTADOS </b><br>\r\n        Rol asignado: <b>PASANTE </b>\r\n        ', 2),
(411, '2025-05-06 07:48:24', 'Cierre de sesión exitoso', 'El usuario ha cerrado sesión correctamente en el sistema.', 2),
(412, '2025-05-06 07:52:45', 'Inicio de sesión exitoso', 'El usuario ha iniciado sesión correctamente en el sistema.', 2),
(413, '2025-05-06 07:59:12', 'Inicio de sesión exitoso', 'El usuario ha iniciado sesión correctamente en el sistema.', 2),
(414, '2025-05-06 07:59:45', 'Cierre de sesión exitoso', 'El usuario ha cerrado sesión correctamente en el sistema.', 2),
(415, '2025-05-06 08:03:09', 'Inicio de sesión exitoso', 'El usuario ha iniciado sesión correctamente en el sistema.', 2),
(416, '2025-05-06 08:03:56', 'Copia de seguridad creada exitosamente', 'El usuario a creado una copia de segurida de la base de datos del sistema.', 2),
(417, '2025-05-06 10:02:57', 'Cierre de sesión exitoso', 'El usuario ha cerrado sesión correctamente en el sistema.', 2),
(418, '2025-05-06 12:07:12', 'Inicio de sesión exitoso', 'El usuario ha iniciado sesión correctamente en el sistema.', 2),
(419, '2025-05-06 13:55:03', 'Modificación exitosa de un cliente.', 'Se modificó un cliente con la siguiente informacón: <br><br>\r\n        <b>****** Información original del cliente modificado:   ******</b><br><br>\r\n        Cédula: <b>V-29775798 </b><br>\r\n        Nombre: <b>LUISA </b><br>\r\n        Teléfono: <b>04123456789 </b><br><br>\r\n        <b>****** Información actualizada del cliente modificado:   ******</b><br><br>\r\n        Cédula: <b>V-29775798 </b><br>\r\n        Nombre: <b>LUISA SALAS </b><br>\r\n        Teléfono: <b>04123456789 </b><br>\r\n        ', 2),
(420, '2025-05-06 14:06:52', 'Modificación exitosa de un cliente.', 'Se modificó un cliente con la siguiente informacón: <br><br>\r\n        <b>****** Información original del cliente modificado:   ******</b><br><br>\r\n        Cédula: <b>V-30887827 </b><br>\r\n        Nombre: <b>KATTY RONDON </b><br>\r\n        Teléfono: <b>04242344312 </b><br><br>\r\n        <b>****** Información actualizada del cliente modificado:   ******</b><br><br>\r\n        Cédula: <b>V-30887827 </b><br>\r\n        Nombre: <b>KATTY DEL CARMEN RONDON </b><br>\r\n        Teléfono: <b>04242344312 </b><br>\r\n        ', 2),
(421, '2025-05-06 15:03:41', 'Inicio de sesión exitoso', 'El usuario ha iniciado sesión correctamente en el sistema.', 2),
(422, '2025-05-06 15:04:09', 'Inicio de sesión exitoso', 'El usuario ha iniciado sesión correctamente en el sistema.', 2),
(423, '2025-05-06 16:01:32', 'Modificación exitosa de un cliente.', 'Se modificó un cliente con la siguiente informacón: <br><br>\r\n        <b>****** Información original del cliente modificado:   ******</b><br><br>\r\n        Cédula: <b>V-14540481 </b><br>\r\n        Nombre: <b>MARÍA GIMENEZ </b><br>\r\n        Teléfono: <b>04245494211 </b><br><br>\r\n        <b>****** Información actualizada del cliente modificado:   ******</b><br><br>\r\n        Cédula: <b>V-14540481 </b><br>\r\n        Nombre: <b>MARÍA JOSÉ GIMENEZ </b><br>\r\n        Teléfono: <b>04245494211 </b><br>\r\n        ', 2),
(424, '2025-05-06 16:41:46', 'Cierre de sesión exitoso', 'El usuario ha cerrado sesión correctamente en el sistema.', 2),
(425, '2025-05-08 18:39:19', 'Inicio de sesión exitoso', 'El usuario ha iniciado sesión correctamente en el sistema.', 2),
(426, '2025-05-08 18:39:30', 'Inicio de sesión exitoso', 'El usuario ha iniciado sesión correctamente en el sistema.', 2),
(427, '2025-05-08 22:04:37', 'Modificación exitosa del perfil de usuario.', 'El usuario actualizó su contraseña.', 2),
(428, '2025-05-08 22:40:15', 'Cierre de sesión exitoso', 'El usuario ha cerrado sesión correctamente en el sistema.', 2),
(429, '2025-05-10 10:09:21', 'Inicio de sesión exitoso', 'El usuario ha iniciado sesión correctamente en el sistema.', 2),
(430, '2025-05-10 10:09:34', 'Inicio de sesión exitoso', 'El usuario ha iniciado sesión correctamente en el sistema.', 2),
(431, '2025-05-10 11:53:40', 'Cambio exitoso del estado de un rol', 'El usuario cambió el estado del rol con la siguiente información: <br><br>\r\n        <b>***** Información del rol original: *****</b><br><br>\r\n        Nombre del rol:  <b>PASANTE </b><br><br>\r\n        Estado: <b>Activo</b> <br><br>\r\n        <b>***** Información del rol actualizada: *****</b><br><br>\r\n        Nombre del rol:  <b>PASANTE </b><br>\r\n        Estado: <b>Inactivo</b>', 2),
(432, '2025-05-10 12:25:13', 'Modificación exitosa de un rol', 'El usuario modificó el rol con la siguiente información:<br> \r\n        Nombre del rol: <b>PROVEEDOR</b><br>\r\n        Estado: <b>Activo</b> <br><br>\r\n        <b>************* Información original: ************* </b><br><br>\r\n         <b>****** Módulo Proveedores   ******</b><br>\r\n        Acceso al módulo de Proveedores: <b>Sin Acceso</b><br>\r\n        Registrar Nuevos Proveedores: <b>Denegado</b> <br>\r\n        Modificar Información de Proveedores: <b>Denegado</b> <br>\r\n        Consultar Lista de Proveedores Registrados: <b>Denegado</b> <br>\r\n        Visualizar Historial de Compras: <b>Denegado</b> <br><br>\r\n\r\n         <b>****** Módulo Productos     ******</b><br>\r\n        Acceso al módulo de Productos: <b>Sin Acceso</b> <br>\r\n        Registrar Nuevas Categorías: <b>Denegado </b><br>\r\n        Registrar Nuevas Presentaciones: <b>Denegado </b><br>\r\n        Registrar Nuevos Productos: <b>Denegado </b><br>\r\n        Consultar Lista de Productos Registrados: <b>Denegado </b><br>\r\n        Registrar Entrada de Productos: <b>Denegado </b><br>\r\n        Consultar Lista de Entradas de Productos: <b>Denegado </b><br><br>\r\n        \r\n         <b>****** Módulo Ventas        ******</b><br>\r\n        Acceso al módulo de Ventas:  <b>Acceso Parcial </b> <br>\r\n        Generar Nuevas Ventas: <b>Denegado </b><br>\r\n        Consultar Lista de Ventas Realizadas: <b>Permitido </b><br>\r\n        Visualizar Detalles de Ventas: <b>Permitido </b><br>\r\n        Acceder a Facturas de Ventas: <b>Permitido </b><br>\r\n        Consultar Estadísticas de Ventas: <b>Permitido </b><br><br>\r\n\r\n         <b>****** Módulo Menú          ******</b><br>\r\n        Acceso al módulo de Servicios:  <b>Acceso Total </b><br>\r\n        Registrar Nuevos Servicios: <b>Permitido </b><br>\r\n        Modificar Información de Servicios: <b>Permitido </b><br>\r\n        Consultar Lista de Servicios Registrados: <b>Permitido </b><br><br>\r\n\r\n         <b>****** Módulo Clientes      ******</b><br>\r\n        Acceso al módulo de Clientes:  <b>Sin Acceso </b><br>\r\n        Registrar Nuevos Clientes: <b>Denegado </b><br>\r\n        Modificar Información de Clientes: <b>Denegado </b><br>\r\n        Consultar Lista de Clientes Regitrados: <b>Denegado </b><br>\r\n        Visualizar Historial de Clientes: <b>Denegado </b><br>\r\n        Acceder a Facturas de Clientes: <b>Denegado </b><br><br>\r\n\r\n         <b>****** Módulo Empleados          ******</b><br>\r\n        Acceso al módulo de Empleados:  <b>Sin Acceso </b><br>\r\n        Registrar Nuevos Empleados: <b>Denegado </b><br>\r\n        Modificar Información de Empleados: <b>Denegado </b><br>\r\n        Consultar Lista de Empleados Registrados: <b>Denegado </b><br><br>\r\n\r\n         <b>****** Módulo Roles  ******</b><br>\r\n        Acceso al módulo de Roles:  <b>Sin Acceso </b><br>\r\n        Registrar Nuevos Roles: <b>Denegado </b><br>\r\n        Modificar Información de Roles: <b>Denegado </b><br>\r\n        Consultar Lista de Roles Registrados: <b>Denegado </b> <br><br>\r\n\r\n         <b>****** Módulo Configuración del sistema  ******</b><br>\r\n        Acceso al módulo los Ajustes del Sistema:  <b>Sin Acceso </b><br>\r\n        Modificar Cantidad de Preguntas de Seguridad: <b>Denegado </b><br>\r\n        Modificar Tiempo de Inactividad de Sesión: <b>Denegado </b><br>\r\n        Modificar Cantidad de Caracteres Permitidos: <b>Denegado </b><br>\r\n        Modificar Cantidad de Símbolos Permitidos: <b>Denegado </b><br>\r\n        Modificar Cantidad de Números Permitidos: <b>Denegado </b><br>\r\n        Modificar Intentos de Inicio de Sesión: <b>Denegado </b><br><br>\r\n\r\n         <b>****** Módulo Bitátora      ******</b><br>\r\n        Acceso al módulo la Bitácora: <b>Sin Acceso </b><br>\r\n        Consultar Registros de la Bitácora: <b>Denegado </b><br><br><br>\r\n\r\n\r\n        <b>************* Información actualizada: ************* </b><br><br>\r\n         <b>****** Módulo Proveedores   ******</b><br>\r\n        Acceso al módulo de Proveedores:  <b>Sin Acceso</b><br>\r\n        Registrar Nuevos Proveedores: <b>Denegado </b><br>\r\n        Modificar Información de Proveedores: <b>Denegado </b><br>\r\n        Consultar Lista de Proveedores Registrados: <b>Denegado </b><br>\r\n        Visualizar Historial de Compras: <b>Denegado </b><br><br>\r\n\r\n         <b>****** Módulo Productos     ******</b><br>\r\n        Acceso al módulo de Productos:  <b>Sin Acceso </b><br>\r\n        Registrar Nuevas Categorías: <b>Denegado </b><br>\r\n        Registrar Nuevas Presentaciones: <b>Denegado </b><br>\r\n        Registrar Nuevos Productos: <b>Denegado </b><br>\r\n        Consultar Lista de Productos Registrados: <b>Denegado </b><br>\r\n        Registrar Entrada de Productos: <b>Denegado </b><br>\r\n        Consultar Lista de Entradas de Productos: <b>Denegado </b><br><br>\r\n        \r\n         <b>****** Módulo Ventas        ******</b><br>\r\n        Acceso al módulo de Ventas:  <b>Acceso Parcial </b><br>\r\n        Generar Nuevas Ventas: <b>Denegado </b><br>\r\n        Consultar Lista de Ventas Realizadas: <b>Permitido </b><br>\r\n        Visualizar Detalles de Ventas: <b>Permitido </b><br>\r\n        Acceder a Facturas de Ventas: <b>Permitido </b><br>\r\n        Consultar Estadísticas de Ventas: <b>Denegado </b><br><br>\r\n\r\n         <b>****** Módulo Menú          ******</b><br>\r\n        Acceso al módulo de Servicios:  <b>Acceso Parcial </b><br>\r\n        Registrar Nuevos Servicios: <b>Denegado </b><br>\r\n        Modificar Información de Servicios: <b>Permitido </b><br>\r\n        Consultar Lista de Servicios Registrados: <b>Denegado </b><br><br>\r\n\r\n         <b>****** Módulo Clientes      ******</b><br>\r\n        Acceso al módulo de Clientes:  <b>Sin Acceso </b><br>\r\n        Registrar Nuevos Clientes: <b>Denegado </b><br>\r\n        Modificar Información de Clientes: <b>Denegado </b><br>\r\n        Consultar Lista de Clientes Registrados: <b>Denegado </b><br>\r\n        Visualizar Historial de Clientes: <b>Denegado </b><br>\r\n        Acceder a Facturas de Clientes: <b>Denegado </b><br><br>\r\n\r\n         <b>****** Módulo Empleados          ******</b><br>\r\n        Acceso al módulo de Empleados:  <b>Sin Acceso </b><br>\r\n        Registrar Nuevos Empleados: <b>Denegado </b><br>\r\n        Modificar Información de Empleados: <b>Denegado </b><br>\r\n        Consultar Lista de Empleados Registrados: <b>Denegado </b><br><br>\r\n\r\n         <b>****** Módulo Roles  ******</b><br>\r\n        Acceso al módulo de Roles:  <b>Sin Acceso </b><br>\r\n        Registrar Nuevos Roles: <b>Denegado </b><br>\r\n        Modificar Información de Roles: <b>Denegado </b><br>\r\n        Consultar Lista de Roles Registrados: <b>Denegado </b> <br><br>\r\n\r\n         <b>****** Módulo Configuración del sistema  ******</b><br>\r\n        Acceso al módulo los Ajustes del Sistema:  <b>Sin Acceso </b><br>\r\n        Modificar Cantidad de Preguntas de Seguridad: <b>Denegado </b><br>\r\n        Modificar Tiempo de Inactividad de Sesión: <b>Denegado </b><br>\r\n        Modificar Cantidad de Caracteres Permitidos: <b>Denegado </b><br>\r\n        Modificar Cantidad de Símbolos Permitidos: <b>Denegado </b><br>\r\n        Modificar Cantidad de Números Permitidos: <b>Denegado </b><br>\r\n        Modificar Intentos de Inicio de Sesión: <b>Denegado </b><br><br>\r\n\r\n         <b>****** Módulo Bitátora      ******</b><br>\r\n        Acceso al módulo la Bitácora: <b>Sin Acceso </b><br>\r\n        Consultar Registros de la Bitácora: <b>Denegado</b>\r\n        ', 2),
(433, '2025-05-10 12:31:07', 'Modificación exitosa del perfil de usuario', 'El usuario actualizó su información personal <br><br>\r\n        Información original:<br>\r\n        Cédula: V-28587583<br>\r\n        Nombre: DANIEL<br>\r\n        Apellido: BARRUETA<br>\r\n        Correo: dbarrueta42@gmail.com<br>\r\n        Dirección: SECTOR E GUASDUAL CALLE 1<br>\r\n        Teléfono: 04125238909<br><br>\r\n        Información Actual:<br>\r\n        Cédula: V-28587583<br>\r\n        Nombre: DANIEL JOSÉ<br>\r\n        Apellido: BARRUETA<br>\r\n        Correo: dbarrueta42@gmail.com<br>\r\n        Dirección: SECTOR E GUASDUAL CALLE 1<br>\r\n        Teléfono: 04125238909\r\n        ', 2),
(434, '2025-05-10 12:45:40', 'Modificación exitosa del perfil de usuario', 'El usuario actualizó su información personal <br><br>\r\n        Información original:<br>\r\n        Cédula: V-28587583<br>\r\n        Nombre: DANIEL JOSÉ<br>\r\n        Apellido: BARRUETA<br>\r\n        Correo: dbarrueta42@gmail.com<br>\r\n        Dirección: SECTOR E GUASDUAL CALLE 1<br>\r\n        Teléfono: 04125238909<br><br>\r\n        Información Actual:<br>\r\n        Cédula: V-28587583<br>\r\n        Nombre: DANIEL<br>\r\n        Apellido: BARRUETA<br>\r\n        Correo: dbarrueta42@gmail.com<br>\r\n        Dirección: SECTOR E GUASDUAL CALLE 1<br>\r\n        Teléfono: 04125238909\r\n        ', 2),
(435, '2025-05-10 12:46:17', 'Modificación exitosa del perfil de usuario.', 'El usuario actualizó su contraseña.', 2),
(436, '2025-05-10 12:46:41', 'Modificación exitosa del perfil de usuario', 'El usuario actualizó su(s) pregunta(s) de seguridad', 2);
INSERT INTO `bitacora` (`id`, `fecha_hora`, `accion`, `mensaje`, `id_usuario`) VALUES
(437, '2025-05-10 12:53:21', 'Modificación exitosa de las características de acceso de un usuario', 'El usuario modificó las características de acceso de un usuario: <br><br>\r\n         <b>****** Información del usuario modificado:   ******</b><br>\r\n        Cédula: <b>V-30400015</b><br>\r\n        Nombre: <b>ANGEL ALIBARDI</b><br>\r\n        Teléfono: <b>04154785965</b><br><br>\r\n\r\n         <b>****** Información original:   ******</b><br>\r\n        Estado: <b>Activo</b><br>\r\n        Permiso de inicio de sesión: <b>Permitido</b><br>\r\n        Rol asignado: <b>EMPLEADO</b><br><br>\r\n\r\n         <b>****** Información Actualizada:   ******</b><br>\r\n        Estado: <b>Inactivo</b><br>\r\n        Permiso de inicio de sesión: <b>Denegado</b><br>\r\n        Rol asignado: <b>EMPLEADO</b>\r\n        ', 2),
(438, '2025-05-10 12:56:22', 'Modificación exitosa de un cliente.', 'Se modificó un cliente con la siguiente informacón: <br><br>\r\n        <b>****** Información original del cliente modificado:   ******</b><br><br>\r\n        Cédula: <b>V-14540481 </b><br>\r\n        Nombre: <b>MARÍA JOSÉ GIMENEZ </b><br>\r\n        Teléfono: <b>04245494211 </b><br><br>\r\n        <b>****** Información actualizada del cliente modificado:   ******</b><br><br>\r\n        Cédula: <b>V-14540481 </b><br>\r\n        Nombre: <b>MARÍA GIMENEZ </b><br>\r\n        Teléfono: <b>04245494211 </b><br>\r\n        ', 2),
(439, '2025-05-10 12:59:14', 'Modificación exitosa de un cliente.', 'Se modificó un cliente con la siguiente informacón: <br><br>\r\n        <b>****** Información original del cliente modificado:   ******</b><br><br>\r\n        Cédula: <b>V-30887827 </b><br>\r\n        Nombre: <b>KATTY DEL CARMEN RONDON </b><br>\r\n        Teléfono: <b>04242344312 </b><br><br>\r\n        <b>****** Información actualizada del cliente modificado:   ******</b><br><br>\r\n        Cédula: <b>V-30887827 </b><br>\r\n        Nombre: <b>KATTY RONDON </b><br>\r\n        Teléfono: <b>04242344312 </b><br>\r\n        ', 2),
(440, '2025-05-10 13:00:16', 'Modificación exitosa del acceso de un usuario.', 'Se restableció el acceso al sistema del usuario con la siguiente información: <br><br>\r\n         <b>****** Información del usuario modificado:   ******</b><br><br>\r\n        Cédula: <b>V-30400015</b><br>\r\n        Nombre: <b>ANGEL</b><br>\r\n        Apellido: <b>ALIBARDI</b><br><br>\r\n         <b>****** Información original:   ******</b><br><br>\r\n        Estado: <b>Inactivo</b><br>\r\n        Permiso de inicio de sesión: <b>Denegado</b><br>\r\n        Rol asignado: <b>EMPLEADO</b><br>\r\n        Bloqueado: <b>No</b><br><br>\r\n         <b>****** Información Actual:   ******</b><br><br>\r\n        Estado:  <b>Activo</b><br>\r\n        Permiso de inicio de sesión: <b>Permitido</b><br>\r\n        Rol asignado: <b>EMPLEADO</b><br>\r\n        Bloqueado: <b>No</b>\r\n        ', 2),
(441, '2025-05-10 13:02:04', 'Modificación exitosa del perfil de usuario', 'El usuario actualizó su información personal <br><br>\r\n        <b>****** Información original del usuario:   ******</b><br><br>\r\n        Cédula: <b>V-28587583</b><br>\r\n        Nombre: <b>DANIEL</b><br>\r\n        Apellido: <b>BARRUETA</b><br>\r\n        Correo: <b>dbarrueta42@gmail.com</b><br>\r\n        Dirección: <b>SECTOR E GUASDUAL CALLE 1</b><br>\r\n        Teléfono: <b>04125238909</b><br><br>\r\n        <b>****** Información Actual del usuario:   ******</b><br><br>\r\n        Cédula: <b>V-28587583</b><br>\r\n        Nombre: <b>DANIEL JOSÉ</b><br>\r\n        Apellido: <b>BARRUETA</b><br>\r\n        Correo: <b>dbarrueta42@gmail.com</b><br>\r\n        Dirección: <b>SECTOR E GUASDUAL CALLE 1</b><br>\r\n        Teléfono: <b>04125238909</b>\r\n        ', 2),
(442, '2025-05-10 13:16:50', 'Modificación exitosa de un cliente.', 'Se modificó un cliente con la siguiente informacón: <br><br>\r\n        <b>****** Información original del cliente modificado:   ******</b><br><br>\r\n        Cédula: <b>V-14540481 </b><br>\r\n        Nombre: <b>MARÍA GIMENEZ </b><br>\r\n        Teléfono: <b>04245494211 </b><br><br>\r\n        <b>****** Información actualizada del cliente modificado:   ******</b><br><br>\r\n        Cédula: <b>V-14540481 </b><br>\r\n        Nombre: <b>MARÍA JOSÉ GIMENEZ </b><br>\r\n        Teléfono: <b>04245494211 </b><br>\r\n        ', 2),
(443, '2025-05-10 14:40:57', 'Modificación exitosa de un rol', 'El usuario modificó el rol con la siguiente información:<br> \r\n        Nombre del rol: <b>ADIMINISTRADOR</b><br>\r\n        Estado: <b>Activo</b> <br><br>\r\n        <b>************* Información original: ************* </b><br><br>\r\n         <b>****** Módulo Proveedores   ******</b><br>\r\n        Acceso al módulo de Proveedores: <b>Acceso Total</b><br>\r\n        Registrar Nuevos Proveedores: <b>Permitido</b> <br>\r\n        Modificar Información de Proveedores: <b>Permitido</b> <br>\r\n        Consultar Lista de Proveedores Registrados: <b>Permitido</b> <br>\r\n        Visualizar Historial de Compras: <b>Permitido</b> <br><br>\r\n\r\n         <b>****** Módulo Productos     ******</b><br>\r\n        Acceso al módulo de Productos: <b>Acceso Total</b> <br>\r\n        Registrar Nuevas Categorías: <b>Permitido </b><br>\r\n        Registrar Nuevas Presentaciones: <b>Permitido </b><br>\r\n        Registrar Nuevos Productos: <b>Permitido </b><br>\r\n        Consultar Lista de Productos Registrados: <b>Permitido </b><br>\r\n        Registrar Entrada de Productos: <b>Permitido </b><br>\r\n        Consultar Lista de Entradas de Productos: <b>Permitido </b><br><br>\r\n        \r\n         <b>****** Módulo Ventas        ******</b><br>\r\n        Acceso al módulo de Ventas:  <b>Acceso Parcial </b> <br>\r\n        Generar Nuevas Ventas: <b>Permitido </b><br>\r\n        Consultar Lista de Ventas Realizadas: <b>Permitido </b><br>\r\n        Visualizar Detalles de Ventas: <b>Permitido </b><br>\r\n        Acceder a Facturas de Ventas: <b>Permitido </b><br>\r\n        Consultar Estadísticas de Ventas: <b>Permitido </b><br><br>\r\n\r\n         <b>****** Módulo Menú          ******</b><br>\r\n        Acceso al módulo de Servicios:  <b>Acceso Total </b><br>\r\n        Registrar Nuevos Servicios: <b>Permitido </b><br>\r\n        Modificar Información de Servicios: <b>Permitido </b><br>\r\n        Consultar Lista de Servicios Registrados: <b>Permitido </b><br><br>\r\n\r\n         <b>****** Módulo Clientes      ******</b><br>\r\n        Acceso al módulo de Clientes:  <b>Acceso Total </b><br>\r\n        Registrar Nuevos Clientes: <b>Permitido </b><br>\r\n        Modificar Información de Clientes: <b>Permitido </b><br>\r\n        Consultar Lista de Clientes Regitrados: <b>Permitido </b><br>\r\n        Visualizar Historial de Clientes: <b>Permitido </b><br>\r\n        Acceder a Facturas de Clientes: <b>Permitido </b><br><br>\r\n\r\n         <b>****** Módulo Empleados          ******</b><br>\r\n        Acceso al módulo de Empleados:  <b>Acceso Total </b><br>\r\n        Registrar Nuevos Empleados: <b>Permitido </b><br>\r\n        Modificar Información de Empleados: <b>Permitido </b><br>\r\n        Consultar Lista de Empleados Registrados: <b>Permitido </b><br><br>\r\n\r\n         <b>****** Módulo Roles  ******</b><br>\r\n        Acceso al módulo de Roles:  <b>Acceso Total </b><br>\r\n        Registrar Nuevos Roles: <b>Permitido </b><br>\r\n        Modificar Información de Roles: <b>Permitido </b><br>\r\n        Consultar Lista de Roles Registrados: <b>Permitido </b> <br><br>\r\n\r\n         <b>****** Módulo Configuración del sistema  ******</b><br>\r\n        Acceso al módulo los Ajustes del Sistema:  <b>Acceso Total </b><br>\r\n        Modificar Cantidad de Preguntas de Seguridad: <b>Permitido </b><br>\r\n        Modificar Tiempo de Inactividad de Sesión: <b>Permitido </b><br>\r\n        Modificar Cantidad de Caracteres Permitidos: <b>Permitido </b><br>\r\n        Modificar Cantidad de Símbolos Permitidos: <b>Permitido </b><br>\r\n        Modificar Cantidad de Números Permitidos: <b>Permitido </b><br>\r\n        Modificar Intentos de Inicio de Sesión: <b>Permitido </b><br><br>\r\n\r\n         <b>****** Módulo Bitátora      ******</b><br>\r\n        Acceso al módulo la Bitácora: <b>Acceso Total </b><br>\r\n        Consultar Registros de la Bitácora: <b>Permitido </b><br><br><br>\r\n\r\n\r\n        <b>************* Información actualizada: ************* </b><br><br>\r\n         <b>****** Módulo Proveedores   ******</b><br>\r\n        Acceso al módulo de Proveedores:  <b>Acceso Parcial</b><br>\r\n        Registrar Nuevos Proveedores: <b>Permitido </b><br>\r\n        Modificar Información de Proveedores: <b>Denegado </b><br>\r\n        Consultar Lista de Proveedores Registrados: <b>Permitido </b><br>\r\n        Visualizar Historial de Compras: <b>Permitido </b><br><br>\r\n\r\n         <b>****** Módulo Productos     ******</b><br>\r\n        Acceso al módulo de Productos:  <b>Acceso Total </b><br>\r\n        Registrar Nuevas Categorías: <b>Permitido </b><br>\r\n        Registrar Nuevas Presentaciones: <b>Permitido </b><br>\r\n        Registrar Nuevos Productos: <b>Permitido </b><br>\r\n        Consultar Lista de Productos Registrados: <b>Permitido </b><br>\r\n        Registrar Entrada de Productos: <b>Permitido </b><br>\r\n        Consultar Lista de Entradas de Productos: <b>Permitido </b><br><br>\r\n        \r\n         <b>****** Módulo Ventas        ******</b><br>\r\n        Acceso al módulo de Ventas:  <b>Acceso Parcial </b><br>\r\n        Generar Nuevas Ventas: <b>Permitido </b><br>\r\n        Consultar Lista de Ventas Realizadas: <b>Permitido </b><br>\r\n        Visualizar Detalles de Ventas: <b>Permitido </b><br>\r\n        Acceder a Facturas de Ventas: <b>Permitido </b><br>\r\n        Consultar Estadísticas de Ventas: <b>Permitido </b><br><br>\r\n\r\n         <b>****** Módulo Menú          ******</b><br>\r\n        Acceso al módulo de Servicios:  <b>Acceso Total </b><br>\r\n        Registrar Nuevos Servicios: <b>Permitido </b><br>\r\n        Modificar Información de Servicios: <b>Permitido </b><br>\r\n        Consultar Lista de Servicios Registrados: <b>Permitido </b><br><br>\r\n\r\n         <b>****** Módulo Clientes      ******</b><br>\r\n        Acceso al módulo de Clientes:  <b>Acceso Total </b><br>\r\n        Registrar Nuevos Clientes: <b>Permitido </b><br>\r\n        Modificar Información de Clientes: <b>Permitido </b><br>\r\n        Consultar Lista de Clientes Registrados: <b>Permitido </b><br>\r\n        Visualizar Historial de Clientes: <b>Permitido </b><br>\r\n        Acceder a Facturas de Clientes: <b>Permitido </b><br><br>\r\n\r\n         <b>****** Módulo Empleados          ******</b><br>\r\n        Acceso al módulo de Empleados:  <b>Acceso Total </b><br>\r\n        Registrar Nuevos Empleados: <b>Permitido </b><br>\r\n        Modificar Información de Empleados: <b>Permitido </b><br>\r\n        Consultar Lista de Empleados Registrados: <b>Permitido </b><br><br>\r\n\r\n         <b>****** Módulo Roles  ******</b><br>\r\n        Acceso al módulo de Roles:  <b>Acceso Total </b><br>\r\n        Registrar Nuevos Roles: <b>Permitido </b><br>\r\n        Modificar Información de Roles: <b>Permitido </b><br>\r\n        Consultar Lista de Roles Registrados: <b>Permitido </b> <br><br>\r\n\r\n         <b>****** Módulo Configuración del sistema  ******</b><br>\r\n        Acceso al módulo los Ajustes del Sistema:  <b>Acceso Total </b><br>\r\n        Modificar Cantidad de Preguntas de Seguridad: <b>Permitido </b><br>\r\n        Modificar Tiempo de Inactividad de Sesión: <b>Permitido </b><br>\r\n        Modificar Cantidad de Caracteres Permitidos: <b>Permitido </b><br>\r\n        Modificar Cantidad de Símbolos Permitidos: <b>Permitido </b><br>\r\n        Modificar Cantidad de Números Permitidos: <b>Permitido </b><br>\r\n        Modificar Intentos de Inicio de Sesión: <b>Permitido </b><br><br>\r\n\r\n         <b>****** Módulo Bitátora      ******</b><br>\r\n        Acceso al módulo la Bitácora: <b>Acceso Total </b><br>\r\n        Consultar Registros de la Bitácora: <b>Permitido</b>\r\n        ', 2),
(444, '2025-05-10 14:41:35', 'Modificación exitosa de un rol', 'El usuario modificó el rol con la siguiente información:<br> \r\n        Nombre del rol: <b>ADIMINISTRADOR</b><br>\r\n        Estado: <b>Activo</b> <br><br>\r\n        <b>************* Información original: ************* </b><br><br>\r\n         <b>****** Módulo Proveedores   ******</b><br>\r\n        Acceso al módulo de Proveedores: <b>Acceso Parcial</b><br>\r\n        Registrar Nuevos Proveedores: <b>Permitido</b> <br>\r\n        Modificar Información de Proveedores: <b>Denegado</b> <br>\r\n        Consultar Lista de Proveedores Registrados: <b>Permitido</b> <br>\r\n        Visualizar Historial de Compras: <b>Permitido</b> <br><br>\r\n\r\n         <b>****** Módulo Productos     ******</b><br>\r\n        Acceso al módulo de Productos: <b>Acceso Total</b> <br>\r\n        Registrar Nuevas Categorías: <b>Permitido </b><br>\r\n        Registrar Nuevas Presentaciones: <b>Permitido </b><br>\r\n        Registrar Nuevos Productos: <b>Permitido </b><br>\r\n        Consultar Lista de Productos Registrados: <b>Permitido </b><br>\r\n        Registrar Entrada de Productos: <b>Permitido </b><br>\r\n        Consultar Lista de Entradas de Productos: <b>Permitido </b><br><br>\r\n        \r\n         <b>****** Módulo Ventas        ******</b><br>\r\n        Acceso al módulo de Ventas:  <b>Acceso Parcial </b> <br>\r\n        Generar Nuevas Ventas: <b>Permitido </b><br>\r\n        Consultar Lista de Ventas Realizadas: <b>Permitido </b><br>\r\n        Visualizar Detalles de Ventas: <b>Permitido </b><br>\r\n        Acceder a Facturas de Ventas: <b>Permitido </b><br>\r\n        Consultar Estadísticas de Ventas: <b>Permitido </b><br><br>\r\n\r\n         <b>****** Módulo Menú          ******</b><br>\r\n        Acceso al módulo de Servicios:  <b>Acceso Total </b><br>\r\n        Registrar Nuevos Servicios: <b>Permitido </b><br>\r\n        Modificar Información de Servicios: <b>Permitido </b><br>\r\n        Consultar Lista de Servicios Registrados: <b>Permitido </b><br><br>\r\n\r\n         <b>****** Módulo Clientes      ******</b><br>\r\n        Acceso al módulo de Clientes:  <b>Acceso Total </b><br>\r\n        Registrar Nuevos Clientes: <b>Permitido </b><br>\r\n        Modificar Información de Clientes: <b>Permitido </b><br>\r\n        Consultar Lista de Clientes Regitrados: <b>Permitido </b><br>\r\n        Visualizar Historial de Clientes: <b>Permitido </b><br>\r\n        Acceder a Facturas de Clientes: <b>Permitido </b><br><br>\r\n\r\n         <b>****** Módulo Empleados          ******</b><br>\r\n        Acceso al módulo de Empleados:  <b>Acceso Total </b><br>\r\n        Registrar Nuevos Empleados: <b>Permitido </b><br>\r\n        Modificar Información de Empleados: <b>Permitido </b><br>\r\n        Consultar Lista de Empleados Registrados: <b>Permitido </b><br><br>\r\n\r\n         <b>****** Módulo Roles  ******</b><br>\r\n        Acceso al módulo de Roles:  <b>Acceso Total </b><br>\r\n        Registrar Nuevos Roles: <b>Permitido </b><br>\r\n        Modificar Información de Roles: <b>Permitido </b><br>\r\n        Consultar Lista de Roles Registrados: <b>Permitido </b> <br><br>\r\n\r\n         <b>****** Módulo Configuración del sistema  ******</b><br>\r\n        Acceso al módulo los Ajustes del Sistema:  <b>Acceso Total </b><br>\r\n        Modificar Cantidad de Preguntas de Seguridad: <b>Permitido </b><br>\r\n        Modificar Tiempo de Inactividad de Sesión: <b>Permitido </b><br>\r\n        Modificar Cantidad de Caracteres Permitidos: <b>Permitido </b><br>\r\n        Modificar Cantidad de Símbolos Permitidos: <b>Permitido </b><br>\r\n        Modificar Cantidad de Números Permitidos: <b>Permitido </b><br>\r\n        Modificar Intentos de Inicio de Sesión: <b>Permitido </b><br><br>\r\n\r\n         <b>****** Módulo Bitátora      ******</b><br>\r\n        Acceso al módulo la Bitácora: <b>Acceso Total </b><br>\r\n        Consultar Registros de la Bitácora: <b>Permitido </b><br><br><br>\r\n\r\n\r\n        <b>************* Información actualizada: ************* </b><br><br>\r\n         <b>****** Módulo Proveedores   ******</b><br>\r\n        Acceso al módulo de Proveedores:  <b>Acceso Total</b><br>\r\n        Registrar Nuevos Proveedores: <b>Permitido </b><br>\r\n        Modificar Información de Proveedores: <b>Permitido </b><br>\r\n        Consultar Lista de Proveedores Registrados: <b>Permitido </b><br>\r\n        Visualizar Historial de Compras: <b>Permitido </b><br><br>\r\n\r\n         <b>****** Módulo Productos     ******</b><br>\r\n        Acceso al módulo de Productos:  <b>Acceso Total </b><br>\r\n        Registrar Nuevas Categorías: <b>Permitido </b><br>\r\n        Registrar Nuevas Presentaciones: <b>Permitido </b><br>\r\n        Registrar Nuevos Productos: <b>Permitido </b><br>\r\n        Consultar Lista de Productos Registrados: <b>Permitido </b><br>\r\n        Registrar Entrada de Productos: <b>Permitido </b><br>\r\n        Consultar Lista de Entradas de Productos: <b>Permitido </b><br><br>\r\n        \r\n         <b>****** Módulo Ventas        ******</b><br>\r\n        Acceso al módulo de Ventas:  <b>Acceso Parcial </b><br>\r\n        Generar Nuevas Ventas: <b>Permitido </b><br>\r\n        Consultar Lista de Ventas Realizadas: <b>Permitido </b><br>\r\n        Visualizar Detalles de Ventas: <b>Permitido </b><br>\r\n        Acceder a Facturas de Ventas: <b>Permitido </b><br>\r\n        Consultar Estadísticas de Ventas: <b>Permitido </b><br><br>\r\n\r\n         <b>****** Módulo Menú          ******</b><br>\r\n        Acceso al módulo de Servicios:  <b>Acceso Total </b><br>\r\n        Registrar Nuevos Servicios: <b>Permitido </b><br>\r\n        Modificar Información de Servicios: <b>Permitido </b><br>\r\n        Consultar Lista de Servicios Registrados: <b>Permitido </b><br><br>\r\n\r\n         <b>****** Módulo Clientes      ******</b><br>\r\n        Acceso al módulo de Clientes:  <b>Acceso Total </b><br>\r\n        Registrar Nuevos Clientes: <b>Permitido </b><br>\r\n        Modificar Información de Clientes: <b>Permitido </b><br>\r\n        Consultar Lista de Clientes Registrados: <b>Permitido </b><br>\r\n        Visualizar Historial de Clientes: <b>Permitido </b><br>\r\n        Acceder a Facturas de Clientes: <b>Permitido </b><br><br>\r\n\r\n         <b>****** Módulo Empleados          ******</b><br>\r\n        Acceso al módulo de Empleados:  <b>Acceso Total </b><br>\r\n        Registrar Nuevos Empleados: <b>Permitido </b><br>\r\n        Modificar Información de Empleados: <b>Permitido </b><br>\r\n        Consultar Lista de Empleados Registrados: <b>Permitido </b><br><br>\r\n\r\n         <b>****** Módulo Roles  ******</b><br>\r\n        Acceso al módulo de Roles:  <b>Acceso Total </b><br>\r\n        Registrar Nuevos Roles: <b>Permitido </b><br>\r\n        Modificar Información de Roles: <b>Permitido </b><br>\r\n        Consultar Lista de Roles Registrados: <b>Permitido </b> <br><br>\r\n\r\n         <b>****** Módulo Configuración del sistema  ******</b><br>\r\n        Acceso al módulo los Ajustes del Sistema:  <b>Acceso Total </b><br>\r\n        Modificar Cantidad de Preguntas de Seguridad: <b>Permitido </b><br>\r\n        Modificar Tiempo de Inactividad de Sesión: <b>Permitido </b><br>\r\n        Modificar Cantidad de Caracteres Permitidos: <b>Permitido </b><br>\r\n        Modificar Cantidad de Símbolos Permitidos: <b>Permitido </b><br>\r\n        Modificar Cantidad de Números Permitidos: <b>Permitido </b><br>\r\n        Modificar Intentos de Inicio de Sesión: <b>Permitido </b><br><br>\r\n\r\n         <b>****** Módulo Bitátora      ******</b><br>\r\n        Acceso al módulo la Bitácora: <b>Acceso Total </b><br>\r\n        Consultar Registros de la Bitácora: <b>Permitido</b>\r\n        ', 2),
(445, '2025-05-10 15:23:01', 'Modificación exitosa de un proveedor.', 'Se modificó un proveedor con la siguiente informacón: <br><br>\r\n        <b>****** Información original del proveedor modificado:   ******</b><br><br>\r\n        Cédula / RIF: <b>V-10642121 </b><br>\r\n        Nombre: <b>EL PATRONCITO </b><br>\r\n        Correo: <b>patroncito@gmail.com </b><br>\r\n        Teléfono: <b>04123455434 </b><br>\r\n        Dirección: <b>BARQUISIMETO CALLE 33 </b><br><br>\r\n        <b>****** Información original del proveedor modificado:   ******</b><br><br>\r\n        Cédula / RIF: <b>V-10642121 </b><br>\r\n        Nombre: <b>EL PATRON </b><br>\r\n        Correo: <b>patroncito@gmail.com </b><br>\r\n        Teléfono: <b>04123455434 </b><br>\r\n        Dirección: <b>BARQUISIMETO CALLE 33 </b><br>\r\n\r\n        ', 2),
(446, '2025-05-10 16:50:32', 'Registro exitoso de un proveedor.', 'Se registro un proveedor con la siguiente informacón: <br><br>\r\n        <b>****** Información del proveedor:   ******</b><br><br>\r\n        Cédula / RIF: <b>J-11077810 </b><br>\r\n        Nombre: <b>MORTADELAS CARACAS </b><br>\r\n        Correo: <b>motadela_caracas@gmail.com </b><br>\r\n        Teléfono: <b>04124567898 </b><br>\r\n        Dirección: <b>ACARIGUA CITY </b><br><br>\r\n        ', 2),
(447, '2025-05-10 19:40:30', 'Registro exitoso de una categoría.', 'Se registro una categoría con la siguiente informacón: <br><br>\r\n        <b>****** Información de la categoría:   ******</b><br><br>\r\n        Nombre: <b>COMESTIBLES </b><br>\r\n        Estado: <b>1 </b>\r\n        ', 2),
(448, '2025-05-10 20:01:24', 'Registro exitoso de una categoría.', 'Se registro una categoría con la siguiente informacón: <br><br>\r\n        <b>****** Información de la categoría:   ******</b><br><br>\r\n        Nombre: <b>CEREALES </b><br>\r\n        Estado: <b>Activo </b>\r\n        ', 2),
(449, '2025-05-10 20:03:03', 'Modificación exitosa de una categoría.', 'Se modificó una categoría con la siguiente informacón: <br><br>\r\n        <b>****** Información original de la categoría:   ******</b><br><br>\r\n        Nombre: <b>GOOBIE </b><br>\r\n        Estado: <b>Activo </b>\r\n        <b>****** Información actual de la categoría:   ******</b><br><br>\r\n        Nombre: <b>GOOBIE </b><br>\r\n        Estado: <b>Inactivo </b>\r\n        ', 2),
(450, '2025-05-10 20:03:58', 'Modificación exitosa de una categoría.', 'Se modificó una categoría con la siguiente informacón: <br><br>\r\n        <b>****** Información original de la categoría:   ******</b><br><br>\r\n        Nombre: <b>GOOBIE </b><br>\r\n        Estado: <b>Inactivo </b><br><br>\r\n        <b>****** Información actual de la categoría:   ******</b><br><br>\r\n        Nombre: <b>GOOBIE </b><br>\r\n        Estado: <b>Activo </b>\r\n        ', 2),
(451, '2025-05-10 20:07:02', 'Cierre de sesión exitoso', 'El usuario ha cerrado sesión correctamente en el sistema.', 2),
(452, '2025-05-11 14:08:48', 'Inicio de sesión exitoso', 'El usuario ha iniciado sesión correctamente en el sistema.', 2),
(453, '2025-05-11 14:10:21', 'Registro exitoso de una categoría.', 'Se registro una categoría con la siguiente informacón: <br><br>\r\n        <b>****** Información de la categoría:   ******</b><br><br>\r\n        Nombre: <b>POLLOS </b><br>\r\n        Estado: <b>Activo </b>\r\n        ', 2),
(454, '2025-05-11 14:10:36', 'Registro exitoso de una categoría.', 'Se registro una categoría con la siguiente informacón: <br><br>\r\n        <b>****** Información de la categoría:   ******</b><br><br>\r\n        Nombre: <b>ENSALADAS </b><br>\r\n        Estado: <b>Activo </b>\r\n        ', 2),
(455, '2025-05-11 14:10:51', 'Registro exitoso de una categoría.', 'Se registro una categoría con la siguiente informacón: <br><br>\r\n        <b>****** Información de la categoría:   ******</b><br><br>\r\n        Nombre: <b>ADICIONALES </b><br>\r\n        Estado: <b>Activo </b>\r\n        ', 2),
(456, '2025-05-11 14:11:06', 'Registro exitoso de una categoría.', 'Se registro una categoría con la siguiente informacón: <br><br>\r\n        <b>****** Información de la categoría:   ******</b><br><br>\r\n        Nombre: <b>POSTRES </b><br>\r\n        Estado: <b>Activo </b>\r\n        ', 2),
(457, '2025-05-11 14:11:19', 'Modificación exitosa del estado de una categoría.', 'Se modificó el estado de una categoría con la siguiente informacón: <br><br>\r\n        <b>****** Información original de la categoría:   ******</b><br><br>\r\n        Nombre: <b>CEREALES </b><br>\r\n        Estado: <b>Activo </b><br><br>\r\n        <b>****** Información actual de la categoría:   ******</b><br><br>\r\n        Nombre: <b>CEREALES </b><br>\r\n        Estado: <b>Inactivo </b>\r\n        ', 2),
(458, '2025-05-11 14:12:06', 'Modificación exitosa del estado de una categoría.', 'Se modificó el estado de una categoría con la siguiente informacón: <br><br>\r\n        <b>****** Información original de la categoría:   ******</b><br><br>\r\n        Nombre: <b>GOOBIE </b><br>\r\n        Estado: <b>Activo </b><br><br>\r\n        <b>****** Información actual de la categoría:   ******</b><br><br>\r\n        Nombre: <b>GOOBIE </b><br>\r\n        Estado: <b>Inactivo </b>\r\n        ', 2),
(459, '2025-05-11 14:12:15', 'Modificación exitosa del estado de una categoría.', 'Se modificó el estado de una categoría con la siguiente informacón: <br><br>\r\n        <b>****** Información original de la categoría:   ******</b><br><br>\r\n        Nombre: <b>FRITURAS </b><br>\r\n        Estado: <b>Activo </b><br><br>\r\n        <b>****** Información actual de la categoría:   ******</b><br><br>\r\n        Nombre: <b>FRITURAS </b><br>\r\n        Estado: <b>Inactivo </b>\r\n        ', 2),
(460, '2025-05-11 14:12:26', 'Modificación exitosa del estado de una categoría.', 'Se modificó el estado de una categoría con la siguiente informacón: <br><br>\r\n        <b>****** Información original de la categoría:   ******</b><br><br>\r\n        Nombre: <b>COMESTIBLES </b><br>\r\n        Estado: <b>Activo </b><br><br>\r\n        <b>****** Información actual de la categoría:   ******</b><br><br>\r\n        Nombre: <b>COMESTIBLES </b><br>\r\n        Estado: <b>Inactivo </b>\r\n        ', 2),
(461, '2025-05-11 14:12:35', 'Modificación exitosa del estado de una categoría.', 'Se modificó el estado de una categoría con la siguiente informacón: <br><br>\r\n        <b>****** Información original de la categoría:   ******</b><br><br>\r\n        Nombre: <b>COMESTIBLE </b><br>\r\n        Estado: <b>Activo </b><br><br>\r\n        <b>****** Información actual de la categoría:   ******</b><br><br>\r\n        Nombre: <b>COMESTIBLE </b><br>\r\n        Estado: <b>Inactivo </b>\r\n        ', 2),
(462, '2025-05-11 17:17:50', 'Registro exitoso de una presentación.', 'Se registro una presentación con la siguiente informacón: <br><br>\r\n        <b>****** Información de la presentación:   ******</b><br><br>\r\n        Nombre: <b>1 KG </b><br>\r\n        Descripción: <b>UN KILOGRAMO </b><br>\r\n        Estado: <b>Activo </b><br>\r\n        ', 2),
(463, '2025-05-11 17:22:09', 'Modificación exitosa del estado de una presentación.', 'Se modificó el estado de una presentación con la siguiente informacón: <br><br>\r\n        <b>****** Información original de la presentación:   ******</b><br><br>\r\n        Nombre: <b>Lata </b><br>\r\n        Descripción: <b>Envase de lata </b><br>\r\n        Estado: <b>Activo </b><br><br>\r\n        <b>****** Información actual de la presentación:   ******</b><br><br>\r\n        Nombre: <b>Lata </b><br>\r\n        Descripción: <b>Envase de lata </b><br>\r\n        Estado: <b>Activo </b><br>\r\n        ', 2),
(464, '2025-05-11 17:23:08', 'Modificación exitosa del estado de una presentación.', 'Se modificó el estado de una presentación con la siguiente informacón: <br><br>\r\n        <b>****** Información original de la presentación:   ******</b><br><br>\r\n        Nombre: <b>Lata </b><br>\r\n        Descripción: <b>Envase de lata </b><br>\r\n        Estado: <b>Activo </b><br><br>\r\n        <b>****** Información actual de la presentación:   ******</b><br><br>\r\n        Nombre: <b>Lata </b><br>\r\n        Descripción: <b>Envase de lata </b><br>\r\n        Estado: <b>Activo </b><br>\r\n        ', 2),
(465, '2025-05-11 17:26:37', 'Modificación exitosa del estado de una presentación.', 'Se modificó el estado de una presentación con la siguiente informacón: <br><br>\r\n        <b>****** Información original de la presentación:   ******</b><br><br>\r\n        Nombre: <b>Lata </b><br>\r\n        Descripción: <b>Envase de lata </b><br>\r\n        Estado: <b>Activo </b><br><br>\r\n        <b>****** Información actual de la presentación:   ******</b><br><br>\r\n        Nombre: <b>Lata </b><br>\r\n        Descripción: <b>Envase de lata </b><br>\r\n        Estado: <b>Inactivo </b><br>\r\n        ', 2),
(466, '2025-05-11 18:42:44', 'Registro exitoso de un producto.', 'Se registro un producto con la siguiente informacón: <br><br>\r\n        <b>****** Información del producto:   ******</b><br><br>\r\n        Código: <b>0000007 </b><br>\r\n        Nombre: <b>CHINOTTO </b><br>\r\n        Presentación: <b>1 Litro </b><br>\r\n        Categoría: <b>BEBIDAS </b><br>\r\n        Precio de venta: <b>0 $</b><br>\r\n        Cantidad: <b>0 </b><br>\r\n        Estado: <b>Inactivo </b><br>\r\n        ', 2),
(467, '2025-05-11 19:05:25', 'Cierre de sesión exitoso', 'El usuario ha cerrado sesión correctamente en el sistema.', 2),
(468, '2025-05-12 16:40:41', 'Inicio de sesión exitoso', 'El usuario ha iniciado sesión correctamente en el sistema.', 2),
(469, '2025-05-12 16:40:53', 'Inicio de sesión exitoso', 'El usuario ha iniciado sesión correctamente en el sistema.', 2),
(470, '2025-05-12 17:43:15', 'Cierre de sesión exitoso', 'El usuario ha cerrado sesión correctamente en el sistema.', 2),
(471, '2025-05-12 17:43:26', 'Inicio de sesión exitoso', 'El usuario ha iniciado sesión correctamente en el sistema.', 2),
(472, '2025-05-12 18:41:41', 'Registro exitoso de una presentación.', 'Se registro una presentación con la siguiente informacón: <br><br>\r\n        <b>****** Información de la presentación:   ******</b><br><br>\r\n        Nombre: <b>500 G </b><br>\r\n        Descripción: <b>MEDIO KILOGRAMO </b><br>\r\n        Estado: <b>Activo </b><br>\r\n        ', 2),
(473, '2025-05-12 18:49:45', 'Registro exitoso de un producto.', 'Se registro un producto con la siguiente informacón: <br><br>\r\n        <b>****** Información del producto:   ******</b><br><br>\r\n        Código: <b>00000004 </b><br>\r\n        Nombre: <b>POLLO </b><br>\r\n        Presentación: <b>Pollo entero </b><br>\r\n        Categoría: <b>POLLOS </b><br>\r\n        Precio de venta: <b>0 $</b><br>\r\n        Cantidad: <b>0 </b><br>\r\n        Estado: <b>Inactivo </b><br>\r\n        ', 2),
(474, '2025-05-12 18:53:42', 'Registro exitoso de un producto.', 'Se registro un producto con la siguiente informacón: <br><br>\r\n        <b>****** Información del producto:   ******</b><br><br>\r\n        Código: <b>00000005 </b><br>\r\n        Nombre: <b>7 UP </b><br>\r\n        Presentación: <b>1 Litro </b><br>\r\n        Categoría: <b>BEBIDAS </b><br>\r\n        Precio de venta: <b>0 $</b><br>\r\n        Cantidad: <b>0 </b><br>\r\n        Estado: <b>Inactivo </b><br>\r\n        ', 2),
(475, '2025-05-12 19:03:52', 'Registro exitoso de un producto.', 'Se registro un producto con la siguiente informacón: <br><br>\r\n        <b>****** Información del producto:   ******</b><br><br>\r\n        Código: <b>00000008 </b><br>\r\n        Nombre: <b>YUCA </b><br>\r\n        Presentación: <b>Unidad </b><br>\r\n        Categoría: <b>ADICIONALES </b><br>\r\n        Precio de venta: <b>0 $</b><br>\r\n        Cantidad: <b>0 </b><br>\r\n        Estado: <b>Inactivo </b><br>\r\n        ', 2),
(476, '2025-05-12 20:56:07', 'Cierre de sesión exitoso', 'El usuario ha cerrado sesión correctamente en el sistema.', 2),
(477, '2025-05-13 07:47:38', 'Inicio de sesión exitoso', 'El usuario ha iniciado sesión correctamente en el sistema.', 2),
(478, '2025-05-13 07:47:53', 'Inicio de sesión exitoso', 'El usuario ha iniciado sesión correctamente en el sistema.', 2),
(479, '2025-05-13 07:49:40', 'Modificación exitosa de un proveedor.', 'Se modificó un proveedor con la siguiente informacón: <br><br>\r\n        <b>****** Información original del proveedor:   ******</b><br><br>\r\n        Cédula / RIF: <b>V-16934956 </b><br>\r\n        Nombre: <b>EL CORRALITO </b><br>\r\n        Correo: <b>Corral@pollera.com </b><br>\r\n        Teléfono: <b>04122343443 </b><br>\r\n        Dirección: <b>ACARIGUA CALLE 3 AVENIDA 5 Y 6 </b><br><br>\r\n        <b>****** Información actual del proveedor:   ******</b><br><br>\r\n        Cédula / RIF: <b>V-16934956 </b><br>\r\n        Nombre: <b>EL CORRALITO </b><br>\r\n        Correo: <b>Corral@pollera.com </b><br>\r\n        Teléfono: <b>04122343443 </b><br>\r\n        Dirección: <b>ACARIGUA CALLE 3 AVENIDA 5 Y 6 </b><br>\r\n\r\n        ', 2),
(480, '2025-05-13 07:53:38', 'Modificación exitosa del estado de una categoría.', 'Se modificó el estado de una categoría con la siguiente informacón: <br><br>\r\n        <b>****** Información original de la categoría:   ******</b><br><br>\r\n        Nombre: <b>COMESTIBLE </b><br>\r\n        Estado: <b>Inactivo </b><br><br>\r\n        <b>****** Información actual de la categoría:   ******</b><br><br>\r\n        Nombre: <b>COMESTIBLE </b><br>\r\n        Estado: <b>Activo </b>\r\n        ', 2),
(481, '2025-05-13 08:17:51', 'Cierre de sesión exitoso', 'El usuario ha cerrado sesión correctamente en el sistema.', 2),
(482, '2025-05-13 08:20:00', 'Inicio de sesión exitoso', 'El usuario ha iniciado sesión correctamente en el sistema.', 2),
(483, '2025-05-13 08:30:01', 'Cierre de sesión exitoso', 'El usuario ha cerrado sesión correctamente en el sistema.', 2),
(484, '2025-05-13 08:31:03', 'Inicio de sesión exitoso', 'El usuario ha iniciado sesión correctamente en el sistema.', 7),
(485, '2025-05-13 08:31:23', 'Modificación exitosa del acceso de un usuario.', 'Se restableció el acceso al sistema del usuario con la siguiente información: <br><br>\r\n         <b>****** Información del usuario modificado:   ******</b><br><br>\r\n        Cédula: <b>V-28587583</b><br>\r\n        Nombre: <b>DANIEL JOSÉ</b><br>\r\n        Apellido: <b>BARRUETA</b><br><br>\r\n         <b>****** Información original:   ******</b><br><br>\r\n        Estado: <b>Activo</b><br>\r\n        Permiso de inicio de sesión: <b>Permitido</b><br>\r\n        Rol asignado: <b>ADIMINISTRADOR</b><br>\r\n        Bloqueado: <b>Sí</b><br><br>\r\n         <b>****** Información Actual:   ******</b><br><br>\r\n        Estado:  <b>Activo</b><br>\r\n        Permiso de inicio de sesión: <b>Permitido</b><br>\r\n        Rol asignado: <b>ADIMINISTRADOR</b><br>\r\n        Bloqueado: <b>No</b>\r\n        ', 7),
(486, '2025-05-13 08:31:34', 'Cierre de sesión exitoso', 'El usuario ha cerrado sesión correctamente en el sistema.', 7),
(487, '2025-05-13 08:31:45', 'Inicio de sesión exitoso', 'El usuario ha iniciado sesión correctamente en el sistema.', 2),
(488, '2025-05-13 08:32:42', 'Modificación exitosa del perfil de usuario.', 'El usuario actualizó su contraseña.', 2),
(489, '2025-05-13 08:33:56', 'Modificación exitosa del perfil de usuario', 'El usuario actualizó su(s) pregunta(s) de seguridad', 2),
(490, '2025-05-13 08:36:58', 'Modificación exitosa de un rol', 'El usuario modificó el rol con la siguiente información:<br> \r\n        Nombre del rol: <b>EMPLEADO</b><br>\r\n        Estado: <b>Activo</b> <br><br>\r\n        <b>************* Información original: ************* </b><br><br>\r\n         <b>****** Módulo Proveedores   ******</b><br>\r\n        Acceso al módulo de Proveedores: <b>Acceso Parcial</b><br>\r\n        Registrar Nuevos Proveedores: <b>Denegado</b> <br>\r\n        Modificar Información de Proveedores: <b>Denegado</b> <br>\r\n        Consultar Lista de Proveedores Registrados: <b>Permitido</b> <br>\r\n        Visualizar Historial de Compras: <b>Denegado</b> <br><br>\r\n\r\n         <b>****** Módulo Productos     ******</b><br>\r\n        Acceso al módulo de Productos: <b>Acceso Parcial</b> <br>\r\n        Registrar Nuevas Categorías: <b>Denegado </b><br>\r\n        Registrar Nuevas Presentaciones: <b>Denegado </b><br>\r\n        Registrar Nuevos Productos: <b>Denegado </b><br>\r\n        Consultar Lista de Productos Registrados: <b>Permitido </b><br>\r\n        Registrar Entrada de Productos: <b>Permitido </b><br>\r\n        Consultar Lista de Entradas de Productos: <b>Denegado </b><br><br>\r\n        \r\n         <b>****** Módulo Ventas        ******</b><br>\r\n        Acceso al módulo de Ventas:  <b>Acceso Parcial </b> <br>\r\n        Generar Nuevas Ventas: <b>Permitido </b><br>\r\n        Consultar Lista de Ventas Realizadas: <b>Permitido </b><br>\r\n        Visualizar Detalles de Ventas: <b>Permitido </b><br>\r\n        Acceder a Facturas de Ventas: <b>Permitido </b><br>\r\n        Consultar Estadísticas de Ventas: <b>Permitido </b><br><br>\r\n\r\n         <b>****** Módulo Menú          ******</b><br>\r\n        Acceso al módulo de Servicios:  <b>Acceso Total </b><br>\r\n        Registrar Nuevos Servicios: <b>Permitido </b><br>\r\n        Modificar Información de Servicios: <b>Permitido </b><br>\r\n        Consultar Lista de Servicios Registrados: <b>Permitido </b><br><br>\r\n\r\n         <b>****** Módulo Clientes      ******</b><br>\r\n        Acceso al módulo de Clientes:  <b>Acceso Parcial </b><br>\r\n        Registrar Nuevos Clientes: <b>Denegado </b><br>\r\n        Modificar Información de Clientes: <b>Denegado </b><br>\r\n        Consultar Lista de Clientes Regitrados: <b>Denegado </b><br>\r\n        Visualizar Historial de Clientes: <b>Permitido </b><br>\r\n        Acceder a Facturas de Clientes: <b>Denegado </b><br><br>\r\n\r\n         <b>****** Módulo Empleados          ******</b><br>\r\n        Acceso al módulo de Empleados:  <b>Acceso Parcial </b><br>\r\n        Registrar Nuevos Empleados: <b>Permitido </b><br>\r\n        Modificar Información de Empleados: <b>Permitido </b><br>\r\n        Consultar Lista de Empleados Registrados: <b>Denegado </b><br><br>\r\n\r\n         <b>****** Módulo Roles  ******</b><br>\r\n        Acceso al módulo de Roles:  <b>Sin Acceso </b><br>\r\n        Registrar Nuevos Roles: <b>Denegado </b><br>\r\n        Modificar Información de Roles: <b>Denegado </b><br>\r\n        Consultar Lista de Roles Registrados: <b>Denegado </b> <br><br>\r\n\r\n         <b>****** Módulo Configuración del sistema  ******</b><br>\r\n        Acceso al módulo los Ajustes del Sistema:  <b>Sin Acceso </b><br>\r\n        Modificar Cantidad de Preguntas de Seguridad: <b>Denegado </b><br>\r\n        Modificar Tiempo de Inactividad de Sesión: <b>Denegado </b><br>\r\n        Modificar Cantidad de Caracteres Permitidos: <b>Denegado </b><br>\r\n        Modificar Cantidad de Símbolos Permitidos: <b>Denegado </b><br>\r\n        Modificar Cantidad de Números Permitidos: <b>Denegado </b><br>\r\n        Modificar Intentos de Inicio de Sesión: <b>Denegado </b><br><br>\r\n\r\n         <b>****** Módulo Bitátora      ******</b><br>\r\n        Acceso al módulo la Bitácora: <b>Sin Acceso </b><br>\r\n        Consultar Registros de la Bitácora: <b>Denegado </b><br><br><br>\r\n\r\n\r\n        <b>************* Información actualizada: ************* </b><br><br>\r\n         <b>****** Módulo Proveedores   ******</b><br>\r\n        Acceso al módulo de Proveedores:  <b>Acceso Parcial</b><br>\r\n        Registrar Nuevos Proveedores: <b>Denegado </b><br>\r\n        Modificar Información de Proveedores: <b>Denegado </b><br>\r\n        Consultar Lista de Proveedores Registrados: <b>Permitido </b><br>\r\n        Visualizar Historial de Compras: <b>Denegado </b><br><br>\r\n\r\n         <b>****** Módulo Productos     ******</b><br>\r\n        Acceso al módulo de Productos:  <b>Acceso Parcial </b><br>\r\n        Registrar Nuevas Categorías: <b>Denegado </b><br>\r\n        Registrar Nuevas Presentaciones: <b>Denegado </b><br>\r\n        Registrar Nuevos Productos: <b>Denegado </b><br>\r\n        Consultar Lista de Productos Registrados: <b>Permitido </b><br>\r\n        Registrar Entrada de Productos: <b>Permitido </b><br>\r\n        Consultar Lista de Entradas de Productos: <b>Denegado </b><br><br>\r\n        \r\n         <b>****** Módulo Ventas        ******</b><br>\r\n        Acceso al módulo de Ventas:  <b>Acceso Parcial </b><br>\r\n        Generar Nuevas Ventas: <b>Permitido </b><br>\r\n        Consultar Lista de Ventas Realizadas: <b>Permitido </b><br>\r\n        Visualizar Detalles de Ventas: <b>Permitido </b><br>\r\n        Acceder a Facturas de Ventas: <b>Permitido </b><br>\r\n        Consultar Estadísticas de Ventas: <b>Permitido </b><br><br>\r\n\r\n         <b>****** Módulo Menú          ******</b><br>\r\n        Acceso al módulo de Servicios:  <b>Acceso Total </b><br>\r\n        Registrar Nuevos Servicios: <b>Permitido </b><br>\r\n        Modificar Información de Servicios: <b>Permitido </b><br>\r\n        Consultar Lista de Servicios Registrados: <b>Permitido </b><br><br>\r\n\r\n         <b>****** Módulo Clientes      ******</b><br>\r\n        Acceso al módulo de Clientes:  <b>Acceso Parcial </b><br>\r\n        Registrar Nuevos Clientes: <b>Denegado </b><br>\r\n        Modificar Información de Clientes: <b>Denegado </b><br>\r\n        Consultar Lista de Clientes Registrados: <b>Denegado </b><br>\r\n        Visualizar Historial de Clientes: <b>Permitido </b><br>\r\n        Acceder a Facturas de Clientes: <b>Denegado </b><br><br>\r\n\r\n         <b>****** Módulo Empleados          ******</b><br>\r\n        Acceso al módulo de Empleados:  <b>Acceso Total </b><br>\r\n        Registrar Nuevos Empleados: <b>Permitido </b><br>\r\n        Modificar Información de Empleados: <b>Permitido </b><br>\r\n        Consultar Lista de Empleados Registrados: <b>Permitido </b><br><br>\r\n\r\n         <b>****** Módulo Roles  ******</b><br>\r\n        Acceso al módulo de Roles:  <b>Acceso Parcial </b><br>\r\n        Registrar Nuevos Roles: <b>Permitido </b><br>\r\n        Modificar Información de Roles: <b>Denegado </b><br>\r\n        Consultar Lista de Roles Registrados: <b>Denegado </b> <br><br>\r\n\r\n         <b>****** Módulo Configuración del sistema  ******</b><br>\r\n        Acceso al módulo los Ajustes del Sistema:  <b>Sin Acceso </b><br>\r\n        Modificar Cantidad de Preguntas de Seguridad: <b>Denegado </b><br>\r\n        Modificar Tiempo de Inactividad de Sesión: <b>Denegado </b><br>\r\n        Modificar Cantidad de Caracteres Permitidos: <b>Denegado </b><br>\r\n        Modificar Cantidad de Símbolos Permitidos: <b>Denegado </b><br>\r\n        Modificar Cantidad de Números Permitidos: <b>Denegado </b><br>\r\n        Modificar Intentos de Inicio de Sesión: <b>Denegado </b><br><br>\r\n\r\n         <b>****** Módulo Bitátora      ******</b><br>\r\n        Acceso al módulo la Bitácora: <b>Sin Acceso </b><br>\r\n        Consultar Registros de la Bitácora: <b>Denegado</b>\r\n        ', 2),
(491, '2025-05-13 08:37:14', 'Cambio exitoso del estado de un rol', 'El usuario cambió el estado del rol con la siguiente información: <br><br>\r\n        <b>***** Información del rol original: *****</b><br><br>\r\n        Nombre del rol:  <b>ROL </b><br><br>\r\n        Estado: <b>Activo</b> <br><br>\r\n        <b>***** Información del rol actualizada: *****</b><br><br>\r\n        Nombre del rol:  <b>ROL </b><br>\r\n        Estado: <b>Inactivo</b>', 2),
(492, '2025-05-13 08:38:34', 'Copia de seguridad creada exitosamente', 'El usuario a creado una copia de segurida de la base de datos del sistema.', 2),
(493, '2025-05-13 08:39:23', 'Modificación exitosa de la configuración del sistema.', 'El usuario actualizó la configuración del sistema <br><br>\r\n        Información del usuario que realizo la modificación:<br>\r\n        Cédula: V-28587583<br>\r\n        Nombre: DANIEL JOSÉ<br>\r\n        Apellido: BARRUETA<br>\r\n        Teléfono: 04125238909<br>\r\n        Rol asignado: ADIMINISTRADOR<br><br>\r\n        Información original:<br>\r\n        Cantidad de preguntas de seguridad: 3<br>\r\n        Tiempo de inactividad de sesión: 4 minutos<br>\r\n        Intentos de inicio de sesión para los usuarios: 3<br>\r\n        Cantidad de caracteres: 9<br>\r\n        Cantidad de símbolos: 1<br>\r\n        Cantidad de números: 3<br><br>\r\n        Información Actual:<br>\r\n        Cantidad de preguntas de seguridad: 4<br>\r\n        Tiempo de inactividad de sesión: 4 minutos<br>\r\n        Intentos de inicio de sesión para los usuarios: 3<br>\r\n        Cantidad de caracteres: 9<br>\r\n        Cantidad de símbolos: 1<br>\r\n        Cantidad de números: 3\r\n        ', 2),
(494, '2025-05-13 08:41:18', 'Modificación exitosa de la configuración del sistema.', 'El usuario actualizó la configuración del sistema <br><br>\r\n        Información del usuario que realizo la modificación:<br>\r\n        Cédula: V-28587583<br>\r\n        Nombre: DANIEL JOSÉ<br>\r\n        Apellido: BARRUETA<br>\r\n        Teléfono: 04125238909<br>\r\n        Rol asignado: ADIMINISTRADOR<br><br>\r\n        Información original:<br>\r\n        Cantidad de preguntas de seguridad: 4<br>\r\n        Tiempo de inactividad de sesión: 4 minutos<br>\r\n        Intentos de inicio de sesión para los usuarios: 3<br>\r\n        Cantidad de caracteres: 9<br>\r\n        Cantidad de símbolos: 1<br>\r\n        Cantidad de números: 3<br><br>\r\n        Información Actual:<br>\r\n        Cantidad de preguntas de seguridad: 4<br>\r\n        Tiempo de inactividad de sesión: 4 minutos<br>\r\n        Intentos de inicio de sesión para los usuarios: 3<br>\r\n        Cantidad de caracteres: 10<br>\r\n        Cantidad de símbolos: 1<br>\r\n        Cantidad de números: 3\r\n        ', 2),
(495, '2025-05-13 08:41:41', 'Modificación exitosa de la configuración del sistema.', 'El usuario actualizó la configuración del sistema <br><br>\r\n        Información del usuario que realizo la modificación:<br>\r\n        Cédula: V-28587583<br>\r\n        Nombre: DANIEL JOSÉ<br>\r\n        Apellido: BARRUETA<br>\r\n        Teléfono: 04125238909<br>\r\n        Rol asignado: ADIMINISTRADOR<br><br>\r\n        Información original:<br>\r\n        Cantidad de preguntas de seguridad: 4<br>\r\n        Tiempo de inactividad de sesión: 4 minutos<br>\r\n        Intentos de inicio de sesión para los usuarios: 3<br>\r\n        Cantidad de caracteres: 10<br>\r\n        Cantidad de símbolos: 1<br>\r\n        Cantidad de números: 3<br><br>\r\n        Información Actual:<br>\r\n        Cantidad de preguntas de seguridad: 4<br>\r\n        Tiempo de inactividad de sesión: 4 minutos<br>\r\n        Intentos de inicio de sesión para los usuarios: 3<br>\r\n        Cantidad de caracteres: 10<br>\r\n        Cantidad de símbolos: 1<br>\r\n        Cantidad de números: 3\r\n        ', 2),
(496, '2025-05-13 08:50:51', 'Modificación exitosa de la configuración del sistema.', 'El usuario actualizó la configuración del sistema <br><br>\r\n        Información del usuario que realizo la modificación:<br>\r\n        Cédula: V-28587583<br>\r\n        Nombre: DANIEL JOSÉ<br>\r\n        Apellido: BARRUETA<br>\r\n        Teléfono: 04125238909<br>\r\n        Rol asignado: ADIMINISTRADOR<br><br>\r\n        Información original:<br>\r\n        Cantidad de preguntas de seguridad: 4<br>\r\n        Tiempo de inactividad de sesión: 4 minutos<br>\r\n        Intentos de inicio de sesión para los usuarios: 3<br>\r\n        Cantidad de caracteres: 10<br>\r\n        Cantidad de símbolos: 1<br>\r\n        Cantidad de números: 3<br><br>\r\n        Información Actual:<br>\r\n        Cantidad de preguntas de seguridad: 4<br>\r\n        Tiempo de inactividad de sesión: 4 minutos<br>\r\n        Intentos de inicio de sesión para los usuarios: 3<br>\r\n        Cantidad de caracteres: 9<br>\r\n        Cantidad de símbolos: 1<br>\r\n        Cantidad de números: 3\r\n        ', 2),
(497, '2025-05-13 09:08:21', 'Cierre de sesión exitoso', 'El usuario ha cerrado sesión correctamente en el sistema.', 2),
(498, '2025-05-14 15:14:49', 'Inicio de sesión exitoso', 'El usuario ha iniciado sesión correctamente en el sistema.', 2),
(499, '2025-05-14 18:32:11', 'Inicio de sesión exitoso', 'El usuario ha iniciado sesión correctamente en el sistema.', 7),
(500, '2025-05-14 18:33:18', 'Modificación exitosa del perfil de usuario.', 'El usuario actualizó su contraseña.', 7),
(501, '2025-05-14 22:11:16', 'Cierre de sesión exitoso', 'El usuario ha cerrado sesión correctamente en el sistema.', 2),
(502, '2025-05-15 19:22:32', 'Inicio de sesión exitoso', 'El usuario ha iniciado sesión correctamente en el sistema.', 2),
(503, '2025-05-16 15:56:38', 'Inicio de sesión exitoso', 'El usuario ha iniciado sesión correctamente en el sistema.', 2),
(504, '2025-05-16 20:31:12', 'Registro exitoso de una entrada.', 'Se registro una entrada con la siguiente informacón: <br><br>\r\n        <b>********* Información de la entrada:   *********</b><br><br>\r\n        <b>****** Información del proveedor:   ******</b><br>\r\n        Cédula / RIF: <b>J-11077810 </b><br>\r\n        Nombre: <b>MORTADELAS CARACAS </b><br>\r\n        Correo: <b>motadela_caracas@gmail.com </b><br>\r\n        Teléfono: <b>04124567898 </b><br>\r\n        Dirección: <b>ACARIGUA CITY </b><br><br><br>\r\n\r\n        <b>****** Información de la entrada:   ******</b><br>\r\n        Total de la compra en $: <b>8 </b><br>\r\n        Total de la compra en bs: <b>744 </b><br>\r\n        Fecha / hora: <b>16-05-2025 / 07:45:pm </b><br>\r\n        Tasa del dolar: <b>93 bs </b><br>\r\n        <b>****** para más detalles sobre la entrada ir a la lista de entradas ******</b><br>\r\n        ', 2);
INSERT INTO `bitacora` (`id`, `fecha_hora`, `accion`, `mensaje`, `id_usuario`) VALUES
(505, '2025-05-16 20:39:28', 'Registro exitoso de una entrada.', 'Se registro una entrada con la siguiente informacón: <br><br>\r\n        <b>****** Información del proveedor:   ******</b><br>\r\n        Cédula / RIF: <b>J-11077810 </b><br>\r\n        Nombre: <b>MORTADELAS CARACAS </b><br>\r\n        Correo: <b>motadela_caracas@gmail.com </b><br>\r\n        Teléfono: <b>04124567898 </b><br>\r\n        Dirección: <b>ACARIGUA CITY </b><br><br>\r\n\r\n        <b>****** Información de la entrada:   ******</b><br>\r\n        Total de la compra en $: <b>28 $ </b><br>\r\n        Total de la compra en bs: <b>2604 bs</b><br>\r\n        Fecha / hora: <b>16-05-2025 / 08:40:pm </b><br>\r\n        Tasa del dolar: <b>93 bs </b><br>\r\n        <b>** Para más detalles sobre la entrada ir a la lista de entradas **b><br>\r\n        ', 2),
(506, '2025-05-16 20:50:02', 'Registro exitoso de un proveedor.', 'Se registro un proveedor con la siguiente informacón: <br><br>\r\n            <b>****** Información del proveedor:   ******</b><br><br>\r\n            Cédula / RIF: <b>J-28587583 </b><br>\r\n            Nombre: <b>TODO CARNES </b><br>\r\n            Correo: <b>TodoCarnes@gmail.com </b><br>\r\n            Teléfono: <b>04124567823 </b><br>\r\n            Dirección: <b>BARQUISIMETO CITY </b><br><br>\r\n            ', 2),
(507, '2025-05-16 21:12:44', 'Registro exitoso de una entrada.', 'Se registro una entrada con la siguiente informacón: <br><br>\r\n        <b>****** Información del proveedor:   ******</b><br>\r\n        Cédula / RIF: <b>J-28587583 </b><br>\r\n        Nombre: <b>TODO CARNES </b><br>\r\n        Correo: <b>TodoCarnes@gmail.com </b><br>\r\n        Teléfono: <b>04124567823 </b><br>\r\n        Dirección: <b>BARQUISIMETO CITY </b><br><br>\r\n\r\n        <b>****** Información de la entrada:   ******</b><br>\r\n        Total de la compra en $: <b>80 $ </b><br>\r\n        Total de la compra en bs: <b>7440 bs</b><br>\r\n        Fecha / hora: <b>16-05-2025 / 08:50:pm </b><br>\r\n        Tasa del dolar: <b>93 bs </b><br>\r\n        <b>Para más detalles sobre la entrada, ve a la lista de entradas </b><br>\r\n        ', 2),
(508, '2025-05-16 21:16:49', 'Registro exitoso de un proveedor.', 'Se registro un proveedor con la siguiente informacón: <br><br>\r\n            <b>****** Información del proveedor:   ******</b><br><br>\r\n            Cédula / RIF: <b>J-21393076 </b><br>\r\n            Nombre: <b>TODO LOMO </b><br>\r\n            Correo: <b>lomo@gmail.com </b><br>\r\n            Teléfono: <b>04124895432 </b><br>\r\n            Dirección: <b>VALENCIA COUNTRY </b><br><br>\r\n            ', 2),
(509, '2025-05-16 21:16:50', 'Registro exitoso de una entrada.', 'Se registro una entrada con la siguiente informacón: <br><br>\r\n        <b>****** Información del proveedor:   ******</b><br>\r\n        Cédula / RIF: <b>J-21393076 </b><br>\r\n        Nombre: <b>TODO LOMO </b><br>\r\n        Correo: <b>lomo@gmail.com </b><br>\r\n        Teléfono: <b>04124895432 </b><br>\r\n        Dirección: <b>VALENCIA COUNTRY </b><br><br>\r\n\r\n        <b>****** Información de la entrada:   ******</b><br>\r\n        Total de la compra en $: <b>20 $ </b><br>\r\n        Total de la compra en bs: <b>1860 bs</b><br>\r\n        Fecha / hora: <b>16-05-2025 / 09:17:pm </b><br>\r\n        Tasa del dolar: <b>93 bs </b><br>\r\n        <b>Para más detalles sobre la entrada, ve a la lista de entradas </b><br>\r\n        ', 2),
(510, '2025-05-16 21:20:29', 'Cierre de sesión exitoso', 'El usuario ha cerrado sesión correctamente en el sistema.', 2),
(511, '2025-05-18 10:53:52', 'Inicio de sesión exitoso', 'El usuario ha iniciado sesión correctamente en el sistema.', 2),
(512, '2025-05-18 12:43:21', 'Actualización exitosa de la tasa del dolar.', 'Se actualizó la tasa del dolar. <br><br>\r\n    <b>****** Información de la tasa del dolar:   ******</b><br><br>\r\n    Precio anterior: <b>40.4 </b><br>\r\n    Fecha anterior: <b>2024-09-17 09:00:00 </b><br>\r\n\r\n    <b>****** Información de la tasa del dolar actual:   ******</b><br><br>\r\n    Precio actual: <b>94.76 </b><br>\r\n    Fecha actual: <b>2025-05-18 12:43:21 </b><br>\r\n    ', 2),
(513, '2025-05-18 12:49:42', 'Actualización exitosa de la tasa del dolar.', 'Se actualizó la tasa del dolar de manera manual. <br><br>\r\n    <b>****** Información de la tasa del dolar:   ******</b><br><br>\r\n    Precio anterior: <b>94.76 </b><br>\r\n    Fecha anterior: <b>2025-05-18 12:43:21 </b><br>\r\n\r\n    <b>****** Información de la tasa del dolar actual:   ******</b><br><br>\r\n    Precio actual: <b>93.89 </b><br>\r\n    Fecha actual: <b>2025-05-18 12:49:42 </b><br>\r\n    ', 2),
(514, '2025-05-18 12:52:07', 'Actualización exitosa de la tasa del dolar.', 'Se actualizó la tasa del dolar de manera automática. <br><br>\r\n    <b>****** Información de la tasa del dolar:   ******</b><br><br>\r\n    Precio anterior: <b>93.89 bs </b><br>\r\n    Fecha anterior: <b>18-05-2025 / 12:49:pm </b><br>\r\n\r\n    <b>****** Información de la tasa del dolar actual:   ******</b><br><br>\r\n    Precio actual: <b>94.76 bs </b><br>\r\n    Fecha actual: <b>18-05-2025 / 12:52:pm </b><br>\r\n    ', 2),
(515, '2025-05-18 12:54:00', 'Actualización exitosa de la tasa del dolar.', 'Se actualizó la tasa del dolar de manera manual. <br><br>\r\n    <b>****** Información de la tasa del dolar:   ******</b><br>\r\n    Precio anterior: <b>94.76 bs </b><br>\r\n    Fecha anterior: <b>18-05-2025 / 12:52:pm </b><br><br>\r\n\r\n    <b>****** Información de la tasa del dolar actual:   ******</b><br>\r\n    Precio actual: <b>94 bs </b><br>\r\n    Fecha actual: <b>18-05-2025 / 12:54:pm </b><br>\r\n    ', 2),
(516, '2025-05-18 12:55:14', 'Actualización exitosa de la tasa del dolar.', 'Se actualizó la tasa del dolar de manera automática. <br><br>\r\n    <b>****** Información de la tasa del dolar:   ******</b><br>\r\n    Precio anterior: <b>94 bs </b><br>\r\n    Fecha anterior: <b>18-05-2025 / 12:54:pm </b><br><br>\r\n\r\n    <b>****** Información de la tasa del dolar actual:   ******</b><br>\r\n    Precio actual: <b>94 bs </b><br>\r\n    Fecha actual: <b>18-05-2025 / 12:55:pm </b><br>\r\n    ', 2),
(517, '2025-05-18 12:56:16', 'Actualización exitosa de la tasa del dolar.', 'Se actualizó la tasa del dolar de manera automática. <br><br>\r\n    <b>****** Información de la tasa del dolar:   ******</b><br>\r\n    Precio anterior: <b>94 bs </b><br>\r\n    Fecha anterior: <b>18-05-2025 / 12:55:pm </b><br><br>\r\n\r\n    <b>****** Información de la tasa del dolar actual:   ******</b><br>\r\n    Precio actual: <b>94.76 bs </b><br>\r\n    Fecha actual: <b>18-05-2025 / 12:56:pm </b><br>\r\n    ', 2),
(518, '2025-05-18 12:59:41', 'Actualización exitosa de la tasa del dolar.', 'Se actualizó la tasa del dolar de manera manual. <br><br>\r\n    <b>****** Información de la tasa del dolar:   ******</b><br>\r\n    Precio anterior: <b>94.76 bs </b><br>\r\n    Fecha anterior: <b>18-05-2025 / 12:56:pm </b><br><br>\r\n\r\n    <b>****** Información de la tasa del dolar actual:   ******</b><br>\r\n    Precio actual: <b>93.89 bs </b><br>\r\n    Fecha actual: <b>18-05-2025 / 12:59:pm </b><br>\r\n    ', 2),
(519, '2025-05-18 13:00:04', 'Actualización exitosa de la tasa del dolar.', 'Se actualizó la tasa del dolar de manera automática. <br><br>\r\n    <b>****** Información de la tasa del dolar:   ******</b><br>\r\n    Precio anterior: <b>93.89 bs </b><br>\r\n    Fecha anterior: <b>18-05-2025 / 12:59:pm </b><br><br>\r\n\r\n    <b>****** Información de la tasa del dolar actual:   ******</b><br>\r\n    Precio actual: <b>94.76 bs </b><br>\r\n    Fecha actual: <b>18-05-2025 / 01:00:pm </b><br>\r\n    ', 2),
(520, '2025-05-18 13:22:00', 'Modificación exitosa de las características de acceso de un usuario', 'El usuario modificó las características de acceso de un usuario: <br><br>\r\n         <b>****** Información del usuario modificado:   ******</b><br>\r\n        Cédula: <b>V-30400015</b><br>\r\n        Nombre: <b>ANGEL ALIBARDI</b><br>\r\n        Teléfono: <b>04154785965</b><br><br>\r\n\r\n         <b>****** Información original:   ******</b><br>\r\n        Estado: <b>Activo</b><br>\r\n        Permiso de inicio de sesión: <b>Permitido</b><br>\r\n        Rol asignado: <b>EMPLEADO</b><br><br>\r\n\r\n         <b>****** Información Actualizada:   ******</b><br>\r\n        Estado: <b>Inactivo</b><br>\r\n        Permiso de inicio de sesión: <b>Denegado</b><br>\r\n        Rol asignado: <b>EMPLEADO</b>\r\n        ', 2),
(521, '2025-05-18 15:03:19', 'Registro de un servicio', 'El usuario registró un servicio con la siguiente información: \n\nNombre del platillo: SERVICE PRUBE \nPrecio en dolares: 5$ \nDescripción: SER VICIO TEST \nEstado: activo', 2),
(522, '2025-05-18 15:03:19', 'Registro exitoso de un nuevo servicio.', 'Se registro un servicio con la siguiente informacón: <br><br>\r\n        <b>****** Información del servicio:   ******</b><br><br>\r\n        Nombre: <b>500 G </b><br>\r\n        Descripción: <b>MEDIO KILOGRAMO </b><br>\r\n        Estado: <b>Activo </b><br>\r\n        ', 2),
(523, '2025-05-18 15:38:27', 'Registro exitoso de un nuevo servicio.', 'Se registro un servicio con la siguiente informacón: <br><br>\r\n        <b>****** Información del servicio:   ******</b><br>\r\n        Nombre: <b> </b><br>\r\n        Descripción: <b>TASTING </b><br>\r\n        Precio en $: <b>10 $</b><br>\r\n        Estado: <b>Activo </b><br><br><br>\r\n\r\n        <b>****** Detalles del servicio:   ******</b><br><br>\r\n        <b>Producto | Categoría | Cantidad</b><br>\r\n        <b>Pepsi 1.5 Litros</b> | BEBIDAS | 2<br><b>LIGHT 1.5 Litros</b> | BEBIDAS | 3<br><b>POLLO Pollo entero</b> | POLLOS | 2<br>\r\n        <br><br>\r\n        ', 2),
(524, '2025-05-18 15:41:26', 'Registro exitoso de un nuevo servicio.', 'Se registro un servicio con la siguiente informacón: <br><br>\r\n        <b>****** Información del servicio:   ******</b><br>\r\n        Nombre: <b> </b><br>\r\n        Descripción: <b>DESCRIPCION </b><br>\r\n        Precio en $: <b>4 $</b><br>\r\n        Estado: <b>Activo </b><br><br><br>\r\n\r\n        <b>****** Detalles del servicio:   ******</b><br><br>\r\n        <b>Producto         |       Categoría         | Cantidad</b><br>\r\n        <b>LIGHT 1.5 Litros</b>         |       BEBIDAS         | 2<br>\r\n        <br><br>\r\n        ', 2),
(525, '2025-05-18 15:44:50', 'Registro exitoso de un nuevo servicio.', 'Se registro un servicio con la siguiente informacón: <br><br>\r\n        <b>****** Información del servicio:   ******</b><br>\r\n        Nombre: <b> </b><br>\r\n        Descripción: <b>ASDASDA </b><br>\r\n        Precio en $: <b>20 $</b><br>\r\n        Estado: <b>Activo </b><br><br><br>\r\n\r\n        <b>****** Detalles del servicio:   ******</b><br><br>\r\n        <b>***** Producto  *****|*****   Categoría    *****|***** Cantidad *****</b><br>\r\n        <b>***** Pepsi 1.5 Litros</b>  *****|*****   BEBIDAS    *****|***** 3 *****<br><b>***** LIGHT 1.5 Litros</b>  *****|*****   BEBIDAS    *****|***** 4 *****<br><b>***** POLLO Pollo entero</b>  *****|*****   POLLOS    *****|***** 4 *****<br>\r\n        <br><br>\r\n        ', 2),
(526, '2025-05-18 15:52:09', 'Registro exitoso de un nuevo servicio.', 'Se registro un servicio con la siguiente informacón: <br><br>\r\n        <b>****** Información del servicio:   ******</b><br>\r\n        Nombre: <b> </b><br>\r\n        Descripción: <b>POLLO ASADO COMPLETO CON ENSALADA Y YUCA </b><br>\r\n        Precio en $: <b>5 $</b><br>\r\n        Estado: <b>Activo </b><br><br><br>\r\n\r\n        <b>****** Detalles del servicio: ******</b><br><br>\r\n        <table class=\"table table-striped\">\r\n            <thead>\r\n            <tr>\r\n                <th class=\"col text-center\" scope=\"col\">PRODUCTO</th>\r\n                <th class=\"col text-center\" scope=\"col\">CATEGORÍA</th>\r\n                <th class=\"col text-center\" scope=\"col\">CANTIDAD</th>\r\n            </tr>\r\n            </thead>\r\n            <tbody>\r\n                <tr>\r\n                            <td class=\"text-center\">POLLO Pollo entero</td>\r\n                            <td class=\"text-center\">POLLOS</td>\r\n                            <td class=\"text-center\">2</td>\r\n                        </tr>\r\n            </tbody>\r\n        </table>\r\n        <br><br>\r\n        ', 2),
(527, '2025-05-18 15:56:19', 'Registro exitoso de un nuevo servicio.', 'Se registro un servicio con la siguiente informacón: <br><br>\r\n        <b>****** Información del servicio:   ******</b><br>\r\n        Nombre: <b>POLLO CON FRESCO </b><br>\r\n        Descripción: <b>UN POLLO ENTERO CON UN REFRESCO </b><br>\r\n        Precio en $: <b>5 $</b><br>\r\n        Estado: <b>Activo </b><br><br><br>\r\n\r\n        <label><b>****** Detalles del servicio: ******</b></label><br><br>\r\n        <table class=\"table table-striped\">\r\n            <thead>\r\n            <tr>\r\n                <th class=\"col text-center\" scope=\"col\">PRODUCTO</th>\r\n                <th class=\"col text-center\" scope=\"col\">CATEGORÍA</th>\r\n                <th class=\"col text-center\" scope=\"col\">CANTIDAD</th>\r\n            </tr>\r\n            </thead>\r\n            <tbody>\r\n                <tr>\r\n                            <td class=\"text-center\">LIGHT 1.5 Litros</td>\r\n                            <td class=\"text-center\">BEBIDAS</td>\r\n                            <td class=\"text-center\">1</td>\r\n                        </tr><tr>\r\n                            <td class=\"text-center\">POLLO Entero</td>\r\n                            <td class=\"text-center\">POLLOS</td>\r\n                            <td class=\"text-center\">1</td>\r\n                        </tr>\r\n            </tbody>\r\n        </table>\r\n        <br><br>\r\n        ', 2),
(528, '2025-05-18 17:09:01', 'Cierre de sesión exitoso', 'El usuario ha cerrado sesión correctamente en el sistema.', 2),
(529, '2025-05-18 18:23:48', 'Inicio de sesión exitoso', 'El usuario ha iniciado sesión correctamente en el sistema.', 2),
(530, '2025-05-18 18:54:10', 'Modificación de un servicio', 'El usuario actualizó la información de un servicio: \n\nInformación del servicio:\n\nNombre del platillo: POLLO CON FRESCO \nPrecio en dolares: 5$ \nDescripción: UN POLLO ENTERO CON UN REFRESCO. \nEstado: activo \n\n\nInformación del servicio actualizada: \n\nNombre del platillo: 7 \nPrecio en dolares: $ \nDescripción: UN POLLO ENTERO CON UN REFRESCO \nEstado: activo', 2),
(531, '2025-05-18 18:57:32', 'Modificación de un servicio', 'El usuario actualizó la información de un servicio: \n\nInformación del servicio:\n\nNombre del platillo: 7 \nPrecio en dolares: $ \nDescripción: UN POLLO ENTERO CON UN REFRESCO. \nEstado: activo \n\n\nInformación del servicio actualizada: \n\nNombre del platillo: POLLO Y FRESCO \nPrecio en dolares: 7$ \nDescripción: UN POLLO ENTERO CON UN REFRESCO \nEstado: activo', 2),
(532, '2025-05-18 18:59:33', 'Modificación de un servicio', 'El usuario actualizó la información de un servicio: \n\nInformación del servicio:\n\nNombre del platillo: POLLO Y FRESCO \nPrecio en dolares: 7$ \nDescripción: UN POLLO ENTERO CON UN REFRESCO. \nEstado: activo \n\n\nInformación del servicio actualizada: \n\nNombre del platillo: POLLO Y FRESCO \nPrecio en dolares: 7$ \nDescripción: UN POLLO ENTERO CON UN REFRESCO \nEstado: activo', 2),
(533, '2025-05-18 19:01:14', 'Modificación de un servicio', 'El usuario actualizó la información de un servicio: \n\nInformación del servicio:\n\nNombre del platillo: POLLO Y FRESCO \nPrecio en dolares: 7$ \nDescripción: UN POLLO ENTERO CON UN REFRESCO. \nEstado: activo \n\n\nInformación del servicio actualizada: \n\nNombre del platillo: POLLO Y FRESCO \nPrecio en dolares: 7$ \nDescripción: UN POLLO ENTERO CON UN REFRESCO \nEstado: inactivo', 2),
(534, '2025-05-18 19:49:31', 'Inicio de sesión exitoso', 'El usuario ha iniciado sesión correctamente en el sistema.', 2),
(535, '2025-05-18 19:58:36', 'Cierre de sesión exitoso', 'El usuario ha cerrado sesión correctamente en el sistema.', 2),
(536, '2025-05-20 08:10:34', 'Inicio de sesión exitoso', 'El usuario ha iniciado sesión correctamente en el sistema.', 2),
(537, '2025-05-20 09:08:50', 'Cierre de sesión exitoso', 'El usuario ha cerrado sesión correctamente en el sistema.', 2),
(538, '2025-05-25 16:37:30', 'Inicio de sesión exitoso', 'El usuario ha iniciado sesión correctamente en el sistema.', 2),
(539, '2025-05-25 17:48:24', 'Actualización exitosa de la tasa del dolar.', 'Se actualizó la tasa del dolar de manera automática. <br><br>\r\n    <b>****** Información de la tasa del dolar:   ******</b><br>\r\n    Precio anterior: <b>94.76 bs </b><br>\r\n    Fecha anterior: <b>18-05-2025 / 01:00:pm </b><br><br>\r\n\r\n    <b>****** Información de la tasa del dolar actual:   ******</b><br>\r\n    Precio actual: <b>95.08 bs </b><br>\r\n    Fecha actual: <b>25-05-2025 / 05:48:pm </b><br>\r\n    ', 2),
(540, '2025-05-25 17:56:26', 'Actualización exitosa de la tasa del dolar.', 'Se actualizó la tasa del dolar de manera automática. <br><br>\r\n    <b>****** Información de la tasa del dolar:   ******</b><br>\r\n    Precio anterior: <b>95.08 bs </b><br>\r\n    Fecha anterior: <b>25-05-2025 / 05:48:pm </b><br><br>\r\n\r\n    <b>****** Información de la tasa del dolar actual:   ******</b><br>\r\n    Precio actual: <b>95.08 bs </b><br>\r\n    Fecha actual: <b>25-05-2025 / 05:56:pm </b><br>\r\n    ', 2),
(541, '2025-05-25 17:57:59', 'Actualización exitosa de la tasa del dolar.', 'Se actualizó la tasa del dolar de manera automática. <br><br>\r\n    <b>****** Información de la tasa del dolar:   ******</b><br>\r\n    Precio anterior: <b>95.08 bs </b><br>\r\n    Fecha anterior: <b>25-05-2025 / 05:56:pm </b><br><br>\r\n\r\n    <b>****** Información de la tasa del dolar actual:   ******</b><br>\r\n    Precio actual: <b>95.08 bs </b><br>\r\n    Fecha actual: <b>25-05-2025 / 05:57:pm </b><br>\r\n    ', 2),
(542, '2025-05-25 18:00:32', 'Actualización exitosa de la tasa del dolar.', 'Se actualizó la tasa del dolar de manera automática. <br><br>\r\n    <b>****** Información de la tasa del dolar:   ******</b><br>\r\n    Precio anterior: <b>95.08 bs </b><br>\r\n    Fecha anterior: <b>25-05-2025 / 05:57:pm </b><br><br>\r\n\r\n    <b>****** Información de la tasa del dolar actual:   ******</b><br>\r\n    Precio actual: <b>95.08 bs </b><br>\r\n    Fecha actual: <b>25-05-2025 / 06:00:pm </b><br>\r\n    ', 2),
(543, '2025-05-25 18:06:21', 'Actualización exitosa de la tasa del dolar.', 'Se actualizó la tasa del dolar de manera manual. <br><br>\r\n    <b>****** Información de la tasa del dolar:   ******</b><br>\r\n    Precio anterior: <b>95.08 bs </b><br>\r\n    Fecha anterior: <b>25-05-2025 / 06:00:pm </b><br><br>\r\n\r\n    <b>****** Información de la tasa del dolar actual:   ******</b><br>\r\n    Precio actual: <b>94 bs </b><br>\r\n    Fecha actual: <b>25-05-2025 / 06:06:pm </b><br>\r\n    ', 2),
(544, '2025-05-25 18:06:36', 'Actualización exitosa de la tasa del dolar.', 'Se actualizó la tasa del dolar de manera automática. <br><br>\r\n    <b>****** Información de la tasa del dolar:   ******</b><br>\r\n    Precio anterior: <b>94 bs </b><br>\r\n    Fecha anterior: <b>25-05-2025 / 06:06:pm </b><br><br>\r\n\r\n    <b>****** Información de la tasa del dolar actual:   ******</b><br>\r\n    Precio actual: <b>95.08 bs </b><br>\r\n    Fecha actual: <b>25-05-2025 / 06:06:pm </b><br>\r\n    ', 2),
(545, '2025-05-25 18:08:09', 'Actualización exitosa de la tasa del dolar.', 'Se actualizó la tasa del dolar de manera automática. <br><br>\r\n    <b>****** Información de la tasa del dolar:   ******</b><br>\r\n    Precio anterior: <b>95.08 bs </b><br>\r\n    Fecha anterior: <b>25-05-2025 / 06:06:pm </b><br><br>\r\n\r\n    <b>****** Información de la tasa del dolar actual:   ******</b><br>\r\n    Precio actual: <b>95.08 bs </b><br>\r\n    Fecha actual: <b>25-05-2025 / 06:08:pm </b><br>\r\n    ', 2),
(546, '2025-05-25 18:12:03', 'Actualización exitosa de la tasa del dolar.', 'Se actualizó la tasa del dolar de manera manual. <br><br>\r\n    <b>****** Información de la tasa del dolar:   ******</b><br>\r\n    Precio anterior: <b>95.08 bs </b><br>\r\n    Fecha anterior: <b>25-05-2025 / 06:08:pm </b><br><br>\r\n\r\n    <b>****** Información de la tasa del dolar actual:   ******</b><br>\r\n    Precio actual: <b>93 bs </b><br>\r\n    Fecha actual: <b>25-05-2025 / 06:12:pm </b><br>\r\n    ', 2),
(547, '2025-05-25 18:23:44', 'Actualización exitosa de la tasa del dolar.', 'Se actualizó la tasa del dolar de manera automática. <br><br>\r\n    <b>****** Información de la tasa del dolar:   ******</b><br>\r\n    Precio anterior: <b>93 bs </b><br>\r\n    Fecha anterior: <b>25-05-2025 / 06:12:pm </b><br><br>\r\n\r\n    <b>****** Información de la tasa del dolar actual:   ******</b><br>\r\n    Precio actual: <b>95.08 bs </b><br>\r\n    Fecha actual: <b>25-05-2025 / 06:23:pm </b><br>\r\n    ', 2),
(548, '2025-05-25 19:16:18', 'Cierre de sesión exitoso', 'El usuario ha cerrado sesión correctamente en el sistema.', 2),
(549, '2025-05-27 13:25:15', 'Inicio de sesión exitoso', 'El usuario ha iniciado sesión correctamente en el sistema.', 2),
(550, '2025-05-27 21:48:51', 'Cierre de sesión exitoso', 'El usuario ha cerrado sesión correctamente en el sistema.', 2),
(551, '2025-05-29 16:54:55', 'Inicio de sesión exitoso', 'El usuario ha iniciado sesión correctamente en el sistema.', 2),
(552, '2025-05-29 19:51:53', 'Cierre de sesión exitoso', 'El usuario ha cerrado sesión correctamente en el sistema.', 2),
(553, '2025-05-31 19:19:56', 'Inicio de sesión exitoso', 'El usuario ha iniciado sesión correctamente en el sistema.', 2),
(554, '2025-05-31 19:27:31', 'Inicio de sesión exitoso', 'El usuario ha iniciado sesión correctamente en el sistema.', 2),
(555, '2025-06-01 15:42:55', 'Registro exitoso de un cliente.', 'Se registro un cliente con la siguiente informacón: <br><br>\r\n            <b>****** Información del cliente:   ******</b><br><br>\r\n            Cédula: <b>V-29775798 </b><br>\r\n            Nombre: <b>LUISA SALAS </b><br>\r\n            Teléfono: <b>04123456789 </b><br><br>\r\n            ', 2),
(556, '2025-06-01 15:48:35', 'Registro exitoso de un cliente.', 'Se registro un cliente con la siguiente informacón: <br><br>\r\n            <b>****** Información del cliente:   ******</b><br><br>\r\n            Cédula: <b>V-28587506 </b><br>\r\n            Nombre: <b>ANTONIO </b><br>\r\n            Teléfono: <b>04125231254 </b><br><br>\r\n            ', 2),
(557, '2025-06-02 21:33:57', 'Actualización exitosa de la tasa del dolar.', 'Se actualizó la tasa del dolar de manera automática. <br><br>\r\n    <b>****** Información de la tasa del dolar:   ******</b><br>\r\n    Precio anterior: <b>95.08 bs </b><br>\r\n    Fecha anterior: <b>25-05-2025 / 06:23:pm </b><br><br>\r\n\r\n    <b>****** Información de la tasa del dolar actual:   ******</b><br>\r\n    Precio actual: <b>97 bs </b><br>\r\n    Fecha actual: <b>02-06-2025 / 09:33:pm </b><br>\r\n    ', 2),
(558, '2025-06-02 21:35:35', 'Actualización exitosa de la tasa del dolar.', 'Se actualizó la tasa del dolar de manera automática. <br><br>\r\n    <b>****** Información de la tasa del dolar:   ******</b><br>\r\n    Precio anterior: <b>97 bs </b><br>\r\n    Fecha anterior: <b>02-06-2025 / 09:33:pm </b><br><br>\r\n\r\n    <b>****** Información de la tasa del dolar actual:   ******</b><br>\r\n    Precio actual: <b>97.31 bs </b><br>\r\n    Fecha actual: <b>02-06-2025 / 09:35:pm </b><br>\r\n    ', 2),
(559, '2025-06-02 21:37:08', 'Venta realizada exitosamente.', 'Se registro una venta con la siguiente informacón: <br><br>\r\n    <b>****** Información del cliente:   ******</b><br>\r\n    Cédula: <b>V-28587586 </b><br>\r\n    Nombre: <b>GABRIEL </b><br>\r\n    Teléfono: <b>04125234587 </b><br><br>\r\n\r\n    <b>****** Información de la Venta:   ******</b><br>\r\n    Subtotal de la compra en $: <b>32 $ </b><br>\r\n    Subtotal de la compra en bs: <b>3042.56 bs</b><br>\r\n    Total de la compra en $ + IVA (16%): <b>37.12 $ </b><br>\r\n    Total de la compra en bs + IVA (16%): <b>3529.37 bs</b><br>\r\n    Fecha / hora: <b>02-06-2025 / 09:37:am </b><br>\r\n    Tasa del dolar: <b>97.31 bs </b><br><br><br>\r\n\r\n    <b>****** Información del Usuario que realizó la venta:   ******</b><br>\r\n    Cédula: <b>V-28587586 </b><br>\r\n    Nombre: <b>GABRIEL BARRUETA </b><br>\r\n    Correo: <b>dbarrueta42@gmail.com </b><br>\r\n    Teléfono: <b>04125234587 </b><br>\r\n    ', 2),
(560, '2025-06-02 22:35:40', 'Cierre de sesión exitoso', 'El usuario ha cerrado sesión correctamente en el sistema.', 2),
(561, '2025-06-03 08:00:48', 'Inicio de sesión exitoso', 'El usuario ha iniciado sesión correctamente en el sistema.', 2),
(562, '2025-06-03 08:01:03', 'Inicio de sesión exitoso', 'El usuario ha iniciado sesión correctamente en el sistema.', 2),
(563, '2025-06-03 08:28:25', 'Venta realizada exitosamente.', 'Se registro una venta con la siguiente informacón: <br><br>\r\n    <b>****** Información del cliente:   ******</b><br>\r\n    Cédula: <b>V-28587583 </b><br>\r\n    Nombre: <b>DANIEL BARRUETA </b><br>\r\n    Teléfono: <b>04125238909 </b><br><br>\r\n\r\n    <b>****** Información de la Venta:   ******</b><br>\r\n    Subtotal de la compra en $: <b>19 $ </b><br>\r\n    Subtotal de la compra en bs: <b>1848.89 bs</b><br>\r\n    Total de la compra en $ + IVA (16%): <b>22.04 $ </b><br>\r\n    Total de la compra en bs + IVA (16%): <b>2144.71 bs</b><br>\r\n    Fecha / hora: <b>03-06-2025 / 08:28:am </b><br>\r\n    Tasa del dolar: <b>97.31 bs </b><br><br>\r\n\r\n    <b>****** Información del Usuario que realizó la venta:   ******</b><br>\r\n    Cédula: <b>V-28587583 </b><br>\r\n    Nombre: <b>DANIEL BARRUETA BARRUETA </b><br>\r\n    Correo: <b>dbarrueta42@gmail.com </b><br>\r\n    Teléfono: <b>04125238909 </b><br>\r\n    ', 2),
(564, '2025-06-03 17:25:59', 'Modificación de un servicio', 'El usuario actualizó la información de un servicio: \r\n            \n\nInformación del servicio:\n\nNombre del platillo: POLLO Y FRESCO \nPrecio en dolares: 7$ \nDescripción: UN POLLO ENTERO CON UN REFRESCO. \nEstado: inactivo \n\n\nInformación del servicio actualizada: \n\nNombre del platillo: POLLO Y FRESCO \nPrecio en dolares: 7$ \nDescripción: UN POLLO ENTERO CON UN REFRESCO \nEstado: activo', 2),
(565, '2025-06-03 18:47:19', 'Cierre de sesión exitoso', 'El usuario ha cerrado sesión correctamente en el sistema.', 2),
(566, '2025-06-04 13:05:53', 'Inicio de sesión exitoso', 'El usuario ha iniciado sesión correctamente en el sistema.', 2),
(567, '2025-06-04 13:06:03', 'Inicio de sesión exitoso', 'El usuario ha iniciado sesión correctamente en el sistema.', 2),
(568, '2025-06-04 13:20:45', 'Modificación de un servicio', 'El usuario actualizó la información de un servicio: \r\n            <b>****** Información del proveedor:   ******</b><br>\r\n            Nombre del platillo: <b> PRUBA </b><br> \r\n            Precio en dolares: <b> 4$ </b><br> \r\n            Descripción: <b> DESCRIPCION. </b><br> \r\n            Estado: <b> activo </b><br><br> \r\n            \r\n            <b>****** Información del servicio actualizada:   ******</b><br> \r\n            Nombre del platillo: <b> PRUBAS </b><br> \r\n            Precio en dolares:  <b> 2$ </b><br> \r\n            Descripción:  <b> DESCRIPCION </b><br> \r\n            Estado:  <b> inactivo </b><br> \r\n            ', 2),
(569, '2025-06-04 13:33:49', 'Modificación de un servicio', 'El usuario actualizó la información de un servicio: <br><br>\r\n            <b>****** Información original del servicio:   ******</b><br>\r\n            Nombre del platillo: <b> PRUBAS </b><br> \r\n            Precio en dolares: <b> 2$ </b><br> \r\n            Descripción: <b> DESCRIPCION. </b><br> \r\n            Estado: <b> inactivo </b><br><br> \r\n            \r\n            <b>****** Información del servicio actualizada:   ******</b><br> \r\n            Nombre del platillo: <b> PRUBAS </b><br> \r\n            Precio en dolares:  <b> 2$ </b><br> \r\n            Descripción:  <b> DESCRIPCION </b><br> \r\n            Estado:  <b> activo </b><br> \r\n            ', 2),
(570, '2025-06-04 16:36:21', 'Registro exitoso de un producto.', 'Se registro un producto con la siguiente informacón: <br><br>\r\n        <b>****** Información del producto:   ******</b><br><br>\r\n        Código: <b>00000011 </b><br>\r\n        Nombre: <b>PESCADO </b><br>\r\n        Presentación: <b>Porción individual </b><br>\r\n        Categoría: <b>COMESTIBLE </b><br>\r\n        Precio de venta: <b>0 $</b><br>\r\n        Cantidad: <b>0 </b><br>\r\n        Estado: <b>Inactivo </b><br>\r\n        ', 2),
(571, '2025-06-04 17:13:16', 'Registro exitoso de un producto.', 'Se registro un producto con la siguiente informacón: <br><br>\r\n        <b>****** Información del producto:   ******</b><br><br>\r\n        Código: <b>69720369 </b><br>\r\n        Nombre: <b>GOLDEN COLITA </b><br>\r\n        Presentación: <b>1.5 Litros </b><br>\r\n        Categoría: <b>BEBIDAS </b><br>\r\n        Precio de venta: <b>0 $</b><br>\r\n        Porcentaje de IVA: <b>16 %</b><br>\r\n        Cantidad: <b>0 </b><br>\r\n        Estado: <b>Inactivo </b><br>\r\n        ', 2),
(572, '2025-06-04 17:24:10', 'Registro exitoso de una categoría.', 'Se registro una categoría con la siguiente informacón: <br><br>\r\n        <b>****** Información de la categoría:   ******</b><br><br>\r\n        Nombre: <b>Prueba categoría </b><br>\r\n        Estado: <b>Activo </b>\r\n        ', 2),
(573, '2025-06-04 18:11:59', 'Cierre de sesión exitoso', 'El usuario ha cerrado sesión correctamente en el sistema.', 2),
(574, '2025-06-06 12:04:46', 'Inicio de sesión exitoso', 'El usuario ha iniciado sesión correctamente en el sistema.', 2),
(575, '2025-06-06 17:11:27', 'Inicio de sesión exitoso', 'El usuario ha iniciado sesión correctamente en el sistema.', 2),
(576, '2025-06-06 18:13:43', 'Inicio de sesión exitoso', 'El usuario ha iniciado sesión correctamente en el sistema.', 2),
(577, '2025-06-06 20:06:26', 'Cierre de sesión exitoso', 'El usuario ha cerrado sesión correctamente en el sistema.', 2),
(578, '2025-06-07 10:09:50', 'Inicio de sesión exitoso', 'El usuario ha iniciado sesión correctamente en el sistema.', 2),
(579, '2025-06-07 12:23:49', 'Actualización exitosa de la tasa del dolar.', 'Se actualizó la tasa del dolar de manera automática. <br><br>\r\n    <b>****** Información de la tasa del dolar:   ******</b><br>\r\n    Precio anterior: <b>97.31 bs </b><br>\r\n    Fecha anterior: <b>02-06-2025 / 09:35:pm </b><br><br>\r\n\r\n    <b>****** Información de la tasa del dolar actual:   ******</b><br>\r\n    Precio actual: <b>99.09 bs </b><br>\r\n    Fecha actual: <b>07-06-2025 / 12:23:pm </b><br>\r\n    ', 2),
(580, '2025-06-07 13:21:50', 'Modificación exitosa de la configuración del sistema.', 'El usuario actualizó la configuración del sistema <br><br>\r\n        Información del usuario que realizo la modificación:<br>\r\n        Cédula: V-28587583<br>\r\n        Nombre: DANIEL JOSÉ<br>\r\n        Apellido: BARRUETA<br>\r\n        Teléfono: 04125238909<br>\r\n        Rol asignado: ADIMINISTRADOR<br><br>\r\n        Información original:<br>\r\n        Cantidad de preguntas de seguridad: 3<br>\r\n        Tiempo de inactividad de sesión: 4 minutos<br>\r\n        Intentos de inicio de sesión para los usuarios: 3<br>\r\n        Cantidad de caracteres: 9<br>\r\n        Cantidad de símbolos: 1<br>\r\n        Cantidad de números: 3<br><br>\r\n        Información Actual:<br>\r\n        Cantidad de preguntas de seguridad: 3<br>\r\n        Tiempo de inactividad de sesión: 1 minutos<br>\r\n        Intentos de inicio de sesión para los usuarios: 3<br>\r\n        Cantidad de caracteres: 9<br>\r\n        Cantidad de símbolos: 1<br>\r\n        Cantidad de números: 3\r\n        ', 2),
(581, '2025-06-07 15:28:10', 'Cierre de sesión exitoso', 'El usuario ha cerrado sesión correctamente en el sistema.', 2),
(582, '2025-06-07 15:29:12', 'Inicio de sesión exitoso', 'El usuario ha iniciado sesión correctamente en el sistema.', 2),
(583, '2025-06-07 15:30:19', 'Cierre de sesión exitoso', 'El usuario ha cerrado sesión correctamente en el sistema.', 2),
(584, '2025-06-07 15:40:05', 'Inicio de sesión exitoso', 'El usuario ha iniciado sesión correctamente en el sistema.', 2),
(585, '2025-06-07 15:41:12', 'Cierre de sesión exitoso', 'El usuario ha cerrado sesión correctamente en el sistema.', 2),
(586, '2025-06-07 15:46:57', 'Inicio de sesión exitoso', 'El usuario ha iniciado sesión correctamente en el sistema.', 2),
(587, '2025-06-07 16:30:19', 'Cierre de sesión exitoso', 'El usuario ha cerrado sesión correctamente en el sistema.', 2),
(588, '2025-06-07 16:30:29', 'Inicio de sesión exitoso', 'El usuario ha iniciado sesión correctamente en el sistema.', 2),
(589, '2025-06-07 17:21:06', 'Modificación exitosa de la configuración del sistema.', 'El usuario actualizó la configuración del sistema <br><br>\r\n        Información del usuario que realizo la modificación:<br>\r\n        Cédula: V-28587583<br>\r\n        Nombre: DANIEL JOSÉ<br>\r\n        Apellido: BARRUETA<br>\r\n        Teléfono: 04125238909<br>\r\n        Rol asignado: ADIMINISTRADOR<br><br>\r\n        Información original:<br>\r\n        Cantidad de preguntas de seguridad: 3<br>\r\n        Tiempo de inactividad de sesión: 1 minutos<br>\r\n        Intentos de inicio de sesión para los usuarios: 3<br>\r\n        Cantidad de caracteres: 9<br>\r\n        Cantidad de símbolos: 1<br>\r\n        Cantidad de números: 3<br><br>\r\n        Información Actual:<br>\r\n        Cantidad de preguntas de seguridad: 3<br>\r\n        Tiempo de inactividad de sesión: 10 minutos<br>\r\n        Intentos de inicio de sesión para los usuarios: 3<br>\r\n        Cantidad de caracteres: 9<br>\r\n        Cantidad de símbolos: 1<br>\r\n        Cantidad de números: 3\r\n        ', 2),
(590, '2025-06-07 19:58:59', 'Venta realizada exitosamente.', 'Se registro una venta con la siguiente informacón: <br><br>\r\n    <b>****** Información del cliente:   ******</b><br>\r\n    Cédula: <b>V-28587586 </b><br>\r\n    Nombre: <b>GABRIEL </b><br>\r\n    Teléfono: <b>04125234587 </b><br><br>\r\n\r\n    <b>****** Información de la Venta:   ******</b><br>\r\n    Subtotal de la compra en $: <b>18 $ </b><br>\r\n    Subtotal de la compra en bs: <b>1783.62 bs</b><br>\r\n    Total de la compra en $ + IVA (16%): <b>20.88 $ </b><br>\r\n    Total de la compra en bs + IVA (16%): <b>2069 bs</b><br>\r\n    Fecha / hora: <b>07-06-2025 / 07:58:am </b><br>\r\n    Tasa del dolar: <b>99.09 bs </b><br><br>\r\n\r\n    <b>****** Información del Usuario que realizó la venta:   ******</b><br>\r\n    Cédula: <b>V-28587586 </b><br>\r\n    Nombre: <b>GABRIEL BARRUETA </b><br>\r\n    Correo: <b>dbarrueta42@gmail.com </b><br>\r\n    Teléfono: <b>04125234587 </b><br>\r\n    ', 2),
(591, '2025-06-07 20:00:43', 'Cierre de sesión exitoso', 'El usuario ha cerrado sesión correctamente en el sistema.', 2),
(592, '2025-06-08 12:08:45', 'Inicio de sesión exitoso', 'El usuario ha iniciado sesión correctamente en el sistema.', 2),
(593, '2025-06-08 14:40:28', 'Cierre de sesión exitoso', 'El usuario ha cerrado sesión correctamente en el sistema.', 2),
(594, '2025-06-08 16:24:55', 'Inicio de sesión exitoso', 'El usuario ha iniciado sesión correctamente en el sistema.', 2),
(595, '2025-06-08 16:54:27', 'Venta realizada exitosamente.', 'Se registro una venta con la siguiente informacón: <br><br>\r\n    <b>****** Información del cliente:   ******</b><br>\r\n    Cédula: <b>V-28587586 </b><br>\r\n    Nombre: <b>GABRIEL </b><br>\r\n    Teléfono: <b>04125234587 </b><br><br>\r\n\r\n    <b>****** Información de la Venta:   ******</b><br>\r\n    Subtotal de la compra en $: <b>10 $ </b><br>\r\n    Subtotal de la compra en bs: <b>990.9 bs</b><br>\r\n    Total de la compra en $ + IVA (16%): <b>11.6 $ </b><br>\r\n    Total de la compra en bs + IVA (16%): <b>1149.44 bs</b><br>\r\n    Fecha / hora: <b>08-06-2025 / 04:54:am </b><br>\r\n    Tasa del dolar: <b>99.09 bs </b><br><br>\r\n\r\n    <b>****** Información del Usuario que realizó la venta:   ******</b><br>\r\n    Cédula: <b>V-28587586 </b><br>\r\n    Nombre: <b>GABRIEL BARRUETA </b><br>\r\n    Correo: <b>dbarrueta42@gmail.com </b><br>\r\n    Teléfono: <b>04125234587 </b><br>\r\n    ', 2),
(596, '2025-06-08 17:01:30', 'Venta realizada exitosamente.', 'Se registro una venta con la siguiente informacón: <br><br>\r\n    <b>****** Información del cliente:   ******</b><br>\r\n    Cédula: <b>V-28587586 </b><br>\r\n    Nombre: <b>GABRIEL </b><br>\r\n    Teléfono: <b>04125234587 </b><br><br>\r\n\r\n    <b>****** Información de la Venta:   ******</b><br>\r\n    Subtotal de la compra en $: <b>16 $ </b><br>\r\n    Subtotal de la compra en bs: <b>1585.44 bs</b><br>\r\n    Total de la compra en $ + IVA (16%): <b>18.56 $ </b><br>\r\n    Total de la compra en bs + IVA (16%): <b>1839.11 bs</b><br>\r\n    Fecha / hora: <b>08-06-2025 / 05:01:am </b><br>\r\n    Tasa del dolar: <b>99.09 bs </b><br><br>\r\n\r\n    <b>****** Información del Usuario que realizó la venta:   ******</b><br>\r\n    Cédula: <b>V-28587586 </b><br>\r\n    Nombre: <b>GABRIEL BARRUETA </b><br>\r\n    Correo: <b>dbarrueta42@gmail.com </b><br>\r\n    Teléfono: <b>04125234587 </b><br>\r\n    ', 2),
(597, '2025-06-08 17:56:44', 'Venta realizada exitosamente.', 'Se registro una venta con la siguiente informacón: <br><br>\r\n    <b>****** Información del cliente:   ******</b><br>\r\n    Cédula: <b>V-28587586 </b><br>\r\n    Nombre: <b>GABRIEL </b><br>\r\n    Teléfono: <b>04125234587 </b><br><br>\r\n\r\n    <b>****** Información de la Venta:   ******</b><br>\r\n    Subtotal de la compra en $: <b>8 $ </b><br>\r\n    Subtotal de la compra en bs: <b>792.72 bs</b><br>\r\n    Total de la compra en $ + IVA (16%): <b>9.28 $ </b><br>\r\n    Total de la compra en bs + IVA (16%): <b>919.56 bs</b><br>\r\n    Fecha / hora: <b>08-06-2025 / 05:56:am </b><br>\r\n    Tasa del dolar: <b>99.09 bs </b><br><br>\r\n\r\n    <b>****** Información del Usuario que realizó la venta:   ******</b><br>\r\n    Cédula: <b>V-28587586 </b><br>\r\n    Nombre: <b>GABRIEL BARRUETA </b><br>\r\n    Correo: <b>dbarrueta42@gmail.com </b><br>\r\n    Teléfono: <b>04125234587 </b><br>\r\n    ', 2),
(598, '2025-06-08 17:59:35', 'Venta realizada exitosamente.', 'Se registro una venta con la siguiente informacón: <br><br>\r\n    <b>****** Información del cliente:   ******</b><br>\r\n    Cédula: <b>V-28587586 </b><br>\r\n    Nombre: <b>GABRIEL </b><br>\r\n    Teléfono: <b>04125234587 </b><br><br>\r\n\r\n    <b>****** Información de la Venta:   ******</b><br>\r\n    Subtotal de la compra en $: <b>10 $ </b><br>\r\n    Subtotal de la compra en bs: <b>990.9 bs</b><br>\r\n    Total de la compra en $ + IVA (16%): <b>11.6 $ </b><br>\r\n    Total de la compra en bs + IVA (16%): <b>1149.44 bs</b><br>\r\n    Fecha / hora: <b>08-06-2025 / 05:59:am </b><br>\r\n    Tasa del dolar: <b>99.09 bs </b><br><br>\r\n\r\n    <b>****** Información del Usuario que realizó la venta:   ******</b><br>\r\n    Cédula: <b>V-28587586 </b><br>\r\n    Nombre: <b>GABRIEL BARRUETA </b><br>\r\n    Correo: <b>dbarrueta42@gmail.com </b><br>\r\n    Teléfono: <b>04125234587 </b><br>\r\n    ', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `id_categoria` int NOT NULL,
  `nombre` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NOT NULL,
  `estado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`id_categoria`, `nombre`, `estado`) VALUES
(1, 'COMESTIBLE', 1),
(2, 'BEBIDAS', 1),
(10, 'POLLOS', 1),
(11, 'ENSALADAS', 1),
(12, 'ADICIONALES', 1),
(13, 'POSTRES', 1),
(14, 'Prueba categoría', 1);

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
(2, 'V-28587583', 'DANIEL BARRUETA', '04125238909'),
(3, 'V-28587586', 'GABRIEL', '04125234587'),
(4, 'V-14540481', 'MARÍA JOSÉ GIMENEZ', '04245494211'),
(5, 'V-30887827', 'KATTY RONDON', '04242344312'),
(6, 'V-29775798', 'LUISA SALAS', '04123456789'),
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
  `intentos_inicio_sesion` tinyint NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `configuracion`
--

INSERT INTO `configuracion` (`id`, `c_preguntas`, `c_caracteres`, `c_numeros`, `c_simbolos`, `tiempo_inactividad`, `intentos_inicio_sesion`) VALUES
(1, 3, 9, 3, 1, 10, 3);

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
(1, 10, 3, 2, 1, 93, 2, 186),
(2, 17, 3, 2, 1, 93, 2, 186),
(3, 17, 2, 2, 1, 93, 2, 186),
(4, 18, 2, 2, 3, 279, 6, 558),
(5, 18, 3, 2, 4, 372, 8, 744),
(6, 19, 24, 20, 4, 372, 80, 7440),
(7, 20, 24, 10, 2, 186, 20, 1860);

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
(19, 3, 2, 13),
(23, 24, 2, 15),
(24, 3, 1, 16),
(25, 24, 1, 16);

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
(1, 4, 'Divisa', NULL, 24, 0),
(2, 6, 'Transferencia / Pago movíl', '1234567890', 21, 1005.48),
(3, 26, 'Divisa', NULL, 5, 239.4),
(4, 28, 'Divisa', NULL, 25, 1197),
(5, 30, 'Punto de Venta', NULL, 33, 1580.04),
(6, 31, 'Divisa', NULL, 45, 2154.6),
(7, 32, 'Divisa', NULL, 42, 2010.96),
(8, 33, 'Divisa', NULL, 30, 1436.4),
(9, 33, 'Punto de Venta', NULL, 35, 1675.8),
(10, 34, 'Divisa', NULL, 9, 430.92),
(11, 35, 'Punto de Venta', NULL, 36, 1723.68),
(12, 36, 'Divisa', NULL, 30, 1436.4),
(13, 36, 'Punto de Venta', NULL, 1, 47.88),
(14, 37, 'Divisa', NULL, 30, 1436.4),
(15, 37, 'Punto de Venta', NULL, 6, 287.28),
(16, 38, 'Divisa', NULL, 30, 1436.4),
(17, 39, 'Divisa', NULL, 15, 718.2),
(18, 67, 'Divisa', NULL, 15, 718.2),
(19, 73, 'Punto de Venta', NULL, 30, 1436.4),
(20, 74, 'Transferencia / Pago movíl', '875647382', 45, 2154.6),
(21, 84, 'Divisa', NULL, 1, 47.88),
(22, 89, 'Transferencia / Pago movíl', '23232166', 1, 47.88),
(23, 93, 'Divisa', '1233333333', 2, 95.76),
(24, 93, 'Transferencia / Pago movíl', '1233333344', 3, 143.64),
(25, 97, 'Divisa', NULL, 1, 47.88),
(26, 97, 'Transferencia / Pago movíl', '234534323', 1, 47.88),
(27, 99, 'Divisa', NULL, 10, 478.8),
(28, 101, 'Divisa', NULL, 10, 478.8),
(29, 102, 'Divisa', NULL, 10, 478.8),
(30, 103, 'Divisa', NULL, 3, 143.64),
(31, 104, 'Divisa', NULL, 3, 143.64),
(32, 107, 'Divisa', NULL, 3, 143.64),
(33, 108, 'Divisa', NULL, 3, 143.64),
(34, 109, 'Divisa', NULL, 3, 143.64),
(35, 110, 'Divisa', NULL, 3, 143.64),
(36, 111, 'Divisa', NULL, 3, 143.64),
(37, 112, 'Divisa', NULL, 3, 143.64),
(38, 113, 'Divisa', NULL, 3, 143.64),
(39, 115, '0', NULL, 3, 143.64),
(40, 116, '0', NULL, 3, 143.64),
(41, 118, 'Divisa', NULL, 3, 143.64),
(42, 119, 'Divisa', NULL, 3, 143.64),
(43, 120, 'Divisa', NULL, 3, 143.64),
(44, 121, 'Divisa', NULL, 3, 143.64),
(45, 122, 'Divisa', NULL, 3, 143.64),
(46, 124, 'Divisa', NULL, 3, 143.64),
(47, 132, 'Divisa', NULL, 15, 718.2),
(48, 132, 'Transferencia / Pago movíl', '1233442342', 15, 718.2),
(49, 133, 'Divisa', NULL, 1, 47.88),
(50, 134, 'Divisa', NULL, 4, 191.52),
(51, 135, 'Divisa', NULL, 4, 191.52),
(52, 136, 'Divisa', NULL, 2, 95.76),
(53, 137, 'Divisa', NULL, 2, 95.76),
(54, 138, 'Divisa', NULL, 2, 95.76),
(55, 139, 'Divisa', NULL, 15, 718.2),
(56, 140, 'Divisa', NULL, 15, 718.2),
(57, 140, 'Transferencia / Pago movíl', '6564467835', 15, 718.2),
(58, 141, 'Divisa', NULL, 15, 718.2),
(59, 141, 'Transferencia / Pago movíl', '587463874655', 15, 718.2),
(60, 142, 'Divisa', NULL, 3, 143.64),
(61, 142, 'Transferencia / Pago movíl', '235346765445', 3, 143.64),
(62, 143, 'Divisa', NULL, 30, 1436.4),
(63, 143, 'Transferencia / Pago movíl', '9477563738475', 4, 191.52),
(64, 144, 'Divisa', NULL, 25, 1197),
(65, 144, 'Transferencia / Pago movíl', '7676454334588', 15, 718.2),
(66, 145, 'Divisa', NULL, 6, 287.28),
(67, 145, 'Transferencia / Pago movíl', '5463425785', 6, 287.28),
(68, 146, 'Divisa', NULL, 5, 239.4),
(69, 146, 'Transferencia / Pago movíl', '3456634764', 5, 239.4),
(70, 147, 'Divisa', NULL, 10, 478.8),
(71, 148, 'Divisa', NULL, 1, 47.88),
(72, 149, 'Divisa', NULL, 20, 957.6),
(73, 150, 'Divisa', NULL, 30, 1436.4),
(74, 151, 'Punto de Venta', NULL, 15, 718.2),
(75, 151, 'Transferencia / Pago movíl', '73651236653', 19.8, 948.024),
(76, 152, 'Punto de Venta', NULL, 11.6, 555.408),
(77, 153, 'Divisa', NULL, 108, 5171.04),
(78, 154, 'Punto de Venta', NULL, 39.44, 1839.48),
(79, 155, 'Punto de Venta', NULL, 23.2, 1082.05),
(80, 156, 'Divisa', NULL, 15, 699.6),
(81, 156, 'Punto de Venta', NULL, 1.24, 57.8336),
(82, 157, 'Punto de Venta', NULL, 19.72, 919.741),
(83, 158, 'Divisa', NULL, 50, 2332),
(84, 158, 'Punto de Venta', NULL, 5.68, 264.915),
(85, 159, 'Punto de Venta', NULL, 34.8, 1623.07),
(86, 160, 'Transferencia / Pago movíl', '85746534253647564536', 34.8, 1623.07),
(87, 161, 'Divisa', NULL, 40, 1865.6),
(88, 161, 'Punto de Venta', NULL, 1.76, 82.0864),
(89, 164, 'Divisa', NULL, 30, 2852.4),
(90, 164, 'Punto de Venta', NULL, 8.28, 787.262),
(91, 165, 'Divisa', NULL, 30, 2852.4),
(92, 165, 'Punto de Venta', NULL, 8.28, 787.262),
(93, 166, 'Divisa', NULL, 30, 2852.4),
(94, 166, 'Punto de Venta', NULL, 8.28, 787.262),
(95, 167, 'Divisa', NULL, 30, 2852.4),
(96, 167, 'Punto de Venta', NULL, 8.28, 787.262),
(97, 168, 'Divisa', NULL, 30, 2852.4),
(98, 168, 'Punto de Venta', NULL, 8.28, 787.262),
(99, 169, 'Divisa', NULL, 30, 2852.4),
(100, 169, 'Punto de Venta', NULL, 8.28, 787.262),
(101, 170, 'Divisa', NULL, 30, 2852.4),
(102, 170, 'Punto de Venta', NULL, 8.28, 787.262),
(103, 171, 'Divisa', NULL, 30, 2852.4),
(104, 171, 'Punto de Venta', NULL, 8.28, 787.262),
(105, 172, 'Divisa', NULL, 30, 2852.4),
(106, 172, 'Punto de Venta', NULL, 8.28, 787.262),
(107, 173, 'Divisa', NULL, 32, 3042.56),
(108, 174, 'Divisa', NULL, 32, 3042.56),
(109, 175, 'Divisa', NULL, 32, 3042.56),
(110, 176, 'Divisa', NULL, 32, 3042.56),
(111, 177, 'Divisa', NULL, 37, 3517.96),
(112, 177, 'Punto de Venta', NULL, 0.12, 11.4096),
(113, 179, 'Divisa', NULL, 37, 3517.96),
(114, 179, 'Punto de Venta', NULL, 0.12, 11.41),
(115, 180, 'Divisa', NULL, 37, 3517.96),
(116, 180, 'Punto de Venta', NULL, 0.12, 11.41),
(117, 181, 'Divisa', NULL, 20, 1946.2),
(118, 181, 'Punto de Venta', NULL, 2.04, 198.51),
(119, 182, 'Divisa', NULL, 20, 1981.8),
(120, 182, 'Punto de Venta', NULL, 0.88, 87.2),
(121, 183, 'Divisa', NULL, 11, 1089.99),
(122, 183, 'Punto de Venta', NULL, 0.6, 59.45),
(123, 184, 'Punto de Venta', NULL, 0.56, 55.49),
(124, 184, 'Divisa', NULL, 18, 1783.62),
(125, 185, 'Divisa', NULL, 9, 891.81),
(126, 185, 'Punto de Venta', NULL, 0.28, 27.75),
(127, 186, 'Divisa', NULL, 11, 1089.99),
(128, 186, 'Punto de Venta', NULL, 0.6, 59.45);

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
(13, NULL, NULL, NULL, NULL, 2, 0, 0, 0, 162),
(14, NULL, NULL, NULL, NULL, 2, 0, 0, 0, 163),
(16, NULL, NULL, NULL, NULL, 3, 1, 5, 475.4, 171),
(18, NULL, NULL, NULL, NULL, 3, 1, 5, 475.4, 171),
(20, NULL, NULL, NULL, NULL, 3, 1, 5, 475.4, 171),
(36, 15, 2, 5, 495.45, 24, 2, 4, 396.36, 182),
(37, 15, 2, 5, 495.45, NULL, NULL, NULL, NULL, 183),
(38, NULL, NULL, NULL, NULL, 24, 4, 4, 396.36, 184),
(39, NULL, NULL, NULL, NULL, 24, 2, 4, 396.36, 185),
(40, 15, 2, 5, 495.45, NULL, NULL, NULL, NULL, 186);

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
(1, 40.4, '2024-09-17 09:00:00'),
(2, 40, '2024-09-17 13:00:00'),
(3, 47.88, '2024-10-13 21:49:03'),
(4, 34, '2024-11-26 16:37:20'),
(5, 46.64, '2024-11-26 16:39:13'),
(6, 62.18, '2025-02-19 17:23:58'),
(7, 62.18, '2025-02-19 17:24:12'),
(8, 62.18, '2025-02-19 17:26:24'),
(9, 63, '2025-02-19 17:33:15'),
(10, 66.79, '2025-03-18 07:51:52'),
(11, 70, '2025-03-30 18:36:41'),
(12, 93, '2025-05-10 17:42:01'),
(13, 94, '2025-05-18 12:02:59'),
(14, 94.76, '2025-05-18 12:19:20'),
(15, 94.76, '2025-05-18 12:21:27'),
(16, 95, '2025-05-18 12:22:18'),
(17, 94.76, '2025-05-18 12:43:21'),
(18, 93.89, '2025-05-18 12:49:42'),
(19, 94.76, '2025-05-18 12:52:07'),
(20, 94, '2025-05-18 12:54:00'),
(21, 94, '2025-05-18 12:55:13'),
(22, 94.76, '2025-05-18 12:56:16'),
(23, 93.89, '2025-05-18 12:59:41'),
(24, 94.76, '2025-05-18 13:00:04'),
(25, 95.08, '2025-05-25 17:48:23'),
(26, 95.08, '2025-05-25 17:56:26'),
(27, 95.08, '2025-05-25 17:57:59'),
(28, 95.08, '2025-05-25 18:00:32'),
(29, 94, '2025-05-25 18:06:21'),
(30, 95.08, '2025-05-25 18:06:36'),
(31, 95.08, '2025-05-25 18:08:09'),
(32, 93, '2025-05-25 18:12:03'),
(33, 95.08, '2025-05-25 18:23:44'),
(34, 97, '2025-06-02 21:33:56'),
(35, 97.31, '2025-06-02 21:35:34'),
(36, 99.09, '2025-06-07 12:23:49');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `entrada`
--

CREATE TABLE `entrada` (
  `id_entrada` int NOT NULL,
  `id_proveedor` int NOT NULL,
  `total_dolar` float NOT NULL,
  `total_bs` float NOT NULL,
  `fecha_entrada` datetime NOT NULL,
  `id_dolar` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `entrada`
--

INSERT INTO `entrada` (`id_entrada`, `id_proveedor`, `total_dolar`, `total_bs`, `fecha_entrada`, `id_dolar`) VALUES
(1, 3, 8, 744, '2025-05-16 19:13:00', 12),
(2, 3, 8, 744, '2025-05-16 19:13:00', 12),
(3, 3, 8, 744, '2025-05-16 19:45:00', 12),
(4, 3, 8, 744, '2025-05-16 19:45:00', 12),
(5, 3, 8, 744, '2025-05-16 19:45:00', 12),
(6, 3, 8, 744, '2025-05-16 19:45:00', 12),
(7, 3, 8, 744, '2025-05-16 19:45:00', 12),
(8, 3, 8, 744, '2025-05-16 19:45:00', 12),
(9, 3, 8, 744, '2025-05-16 19:45:00', 12),
(10, 3, 8, 744, '2025-05-16 19:45:00', 12),
(11, 3, 8, 744, '2025-05-16 19:45:00', 12),
(12, 3, 8, 744, '2025-05-16 19:45:00', 12),
(13, 3, 8, 744, '2025-05-16 19:45:00', 12),
(14, 3, 8, 744, '2025-05-16 19:45:00', 12),
(15, 3, 8, 744, '2025-05-16 19:45:00', 12),
(16, 3, 8, 744, '2025-05-16 19:45:00', 12),
(17, 3, 8, 744, '2025-05-16 19:45:00', 12),
(18, 3, 28, 2604, '2025-05-16 20:40:00', 12),
(19, 4, 80, 7440, '2025-05-16 20:50:00', 12),
(20, 18, 20, 1860, '2025-05-16 21:17:00', 12);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `iva`
--

CREATE TABLE `iva` (
  `id` int NOT NULL,
  `porcentaje` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `iva`
--

INSERT INTO `iva` (`id`, `porcentaje`) VALUES
(1, 0.01),
(2, 0.02),
(3, 0.03),
(4, 0.04),
(5, 0.05),
(6, 0.06),
(7, 0.07),
(8, 0.08),
(9, 0.09),
(10, 0.1),
(11, 0.11),
(12, 0.12),
(13, 0.13),
(14, 0.14),
(15, 0.15),
(16, 0.16),
(17, 0.17),
(18, 0.18),
(19, 0.19),
(20, 0.2),
(21, 0.21),
(22, 0.22),
(23, 0.23),
(24, 0.24),
(25, 0.25),
(26, 0.26),
(27, 0.27),
(28, 0.28),
(29, 0.29),
(30, 0.3),
(31, 0.31),
(32, 0.32),
(33, 0.33),
(34, 0.34),
(35, 0.35),
(36, 0.36),
(37, 0.37),
(38, 0.38),
(39, 0.39),
(40, 0.4),
(41, 0.41),
(42, 0.42),
(43, 0.43),
(44, 0.44),
(45, 0.45),
(46, 0.46),
(47, 0.47),
(48, 0.48),
(49, 0.49),
(50, 0.5),
(51, 0.51),
(52, 0.52),
(53, 0.53),
(54, 0.54),
(55, 0.55),
(56, 0.56),
(57, 0.57),
(58, 0.58),
(59, 0.59),
(60, 0.6),
(61, 0.61),
(62, 0.62),
(63, 0.63),
(64, 0.64),
(65, 0.65),
(66, 0.66),
(67, 0.67),
(68, 0.68),
(69, 0.69),
(70, 0.7),
(71, 0.71),
(72, 0.72),
(73, 0.73),
(74, 0.74),
(75, 0.75),
(76, 0.76),
(77, 0.77),
(78, 0.78),
(79, 0.79),
(80, 0.8),
(81, 0.81),
(82, 0.82),
(83, 0.83),
(84, 0.84),
(85, 0.85),
(86, 0.86),
(87, 0.87),
(88, 0.88),
(89, 0.89),
(90, 0.9),
(91, 0.91),
(92, 0.92),
(93, 0.93),
(94, 0.94),
(95, 0.95),
(96, 0.96),
(97, 0.97),
(98, 0.98),
(99, 0.99),
(100, 1);

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
(13, 'PRUBAS', '2', 'DESCRIPCION', 1),
(15, 'POLLO ENTERO ASADO', '5', 'POLLO ASADO COMPLETO CON ENSALADA Y YUCA', 1),
(16, 'POLLO Y FRESCO', '7', 'UN POLLO ENTERO CON UN REFRESCO', 1);

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
(5, 1, 'ZoiEg3uBZ2g=', 1, 10),
(6, 4, 'ZoiEg3uBZ2g=', 2, 10),
(7, 2, 'ZoiEg3uBZ2g=', 3, 10),
(8, 2, 'ZYeCgXqAaGk=', 1, 11),
(9, 3, 'ZYeCgXqAaGk=', 2, 11),
(10, 4, 'ZYeCgXqAaGk=', 3, 11),
(11, 2, 'l7TCuai0oQ==', 1, 7),
(12, 1, 'l7TCuai0oQ==', 2, 7),
(13, 4, 'l7TCuai0oQ==', 3, 7),
(14, 3, 'ioCBfnZ8Z2ZpbQ==', 1, 12),
(15, 4, 'ioCBfnZ8Z2ZpbQ==', 2, 12),
(16, 2, 'ioCBfnZ8Z2ZpbQ==', 3, 12),
(17, 1, 'ioCDfnR8Z2dpaQ==', 1, 13),
(18, 4, 'ioCDfnR8Z2dpaQ==', 2, 13),
(19, 3, 'ioCDfnR8Z2dpaQ==', 3, 13),
(20, 2, 'ioCDfXd9aGdnag==', 1, 14),
(21, 3, 'ioCDfXd9aGdnag==', 2, 14),
(22, 1, 'ioCDfXd9aGdnag==', 3, 14),
(23, 2, 'Z4eCf3d6ZWQ=', 1, 16),
(24, 3, 'Z4eCf3d6ZWQ=', 2, 16),
(25, 1, 'Z4eCf3d6ZWQ=', 3, 16),
(26, 2, 'Z4aFgHZ7ZmU=', 1, 17),
(27, 4, 'Z4aFgHZ7ZmU=', 2, 17),
(28, 3, 'Z4aFgHZ7ZmU=', 3, 17);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `presentacion`
--

CREATE TABLE `presentacion` (
  `id` int NOT NULL,
  `nombre` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NOT NULL,
  `descripcion` varchar(250) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `estado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `presentacion`
--

INSERT INTO `presentacion` (`id`, `nombre`, `descripcion`, `estado`) VALUES
(2, '1.5 Litros', 'Envase de un litro y medio', 1),
(4, '3 Litros', 'Envase de tres litros', 1),
(9, 'Entero', 'Entero', 1),
(10, 'Medio', 'Medio (1/2)', 1),
(11, 'Cuarto', 'Un cuarto (1/4)', 1),
(12, 'Porción individual', 'Para una persona', 1),
(13, 'Porción Familiar', 'Para compartir', 1),
(14, '1 Litro', 'Envase de un litro', 1),
(15, '2 Litros', 'Envase de dos litro', 1),
(16, 'Lata', 'Envase de lata', 0),
(17, 'Unidad', 'Artículo individual', 1),
(18, 'Bandeja', 'Presentación en bandeja', 1),
(24, '1 KG', 'Un kilogramo', 1),
(25, '500 G', 'Medio kilogramo', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `id_producto` int NOT NULL,
  `id_categoria` int NOT NULL,
  `codigo` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NOT NULL,
  `nombre_producto` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NOT NULL,
  `id_presentacion` int NOT NULL,
  `precio_venta_dolar` float NOT NULL,
  `stock` int NOT NULL,
  `estatus` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`id_producto`, `id_categoria`, `codigo`, `nombre_producto`, `id_presentacion`, `precio_venta_dolar`, `stock`, `estatus`) VALUES
(2, 2, '00000002', 'Pepsi', 2, 4, 0, 0),
(3, 2, '00000003', 'LIGHT', 2, 5, 0, 0),
(20, 2, '00000001', 'COCA COLA', 15, 0, 0, 1),
(21, 2, '00000006', 'GLUP', 14, 0, 0, 1),
(23, 2, '0000007', 'CHINOTTO', 14, 0, 0, 0),
(24, 10, '00000004', 'POLLO', 9, 4, 5, 1),
(25, 2, '00000005', '7 UP', 14, 0, 0, 0),
(26, 12, '00000008', 'YUCA', 17, 0, 2, 1),
(27, 1, '00000011', 'PESCADO', 12, 0, 5, 1),
(28, 2, '69720369', 'GOLDEN COLITA', 2, 0, 8, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto_iva`
--

CREATE TABLE `producto_iva` (
  `id` int NOT NULL,
  `id_producto` int NOT NULL,
  `id_iva` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `producto_iva`
--

INSERT INTO `producto_iva` (`id`, `id_producto`, `id_iva`) VALUES
(1, 27, 16),
(2, 28, 16);

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
(1, 'V-16934956', 'EL CORRALITO', 'Corral@pollera.com', 'ACARIGUA CALLE 3 AVENIDA 5 Y 6', '04122343443'),
(2, 'V-10642121', 'EL PATRON', 'patroncito@gmail.com', 'BARQUISIMETO CALLE 33', '04123455434'),
(3, 'J-11077810', 'MORTADELAS CARACAS', 'motadela_caracas@gmail.com', 'ACARIGUA CITY', '04124567898'),
(4, 'J-28587583', 'TODO CARNES', 'TodoCarnes@gmail.com', 'BARQUISIMETO CITY', '04124567823'),
(18, 'J-21393076', 'TODO LOMO', 'lomo@gmail.com', 'VALENCIA COUNTRY', '04124895432');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `id_rol` int NOT NULL,
  `nombre` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NOT NULL,
  `estado` tinyint NOT NULL,
  `r_proveedores` tinyint NOT NULL,
  `m_proveedores` tinyint NOT NULL,
  `l_proveedores` tinyint NOT NULL,
  `h_proveedores` tinyint NOT NULL,
  `r_categoria` tinyint NOT NULL,
  `m_categoria` tinyint(1) NOT NULL,
  `l_categoria` tinyint(1) NOT NULL,
  `r_presentacion` tinyint(1) NOT NULL,
  `m_presentacion` tinyint(1) NOT NULL,
  `l_presentacion` tinyint(1) NOT NULL,
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
  `v_bitacora` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`id_rol`, `nombre`, `estado`, `r_proveedores`, `m_proveedores`, `l_proveedores`, `h_proveedores`, `r_categoria`, `m_categoria`, `l_categoria`, `r_presentacion`, `m_presentacion`, `l_presentacion`, `r_productos`, `l_productos`, `r_entrada`, `l_entrada`, `g_venta`, `d_venta`, `l_venta`, `f_venta`, `est_venta`, `r_servicio`, `m_servicio`, `l_servicio`, `r_cliente`, `m_cliente`, `l_cliente`, `h_cliente`, `f_cliente`, `r_empleado`, `m_empleado`, `l_empleado`, `r_rol`, `m_rol`, `l_rol`, `m_cant_pregunta_seguridad`, `m_tiempo_sesion`, `m_cant_caracteres`, `m_cant_simbolos`, `m_cant_num`, `intentos_inicio_sesion`, `v_bitacora`) VALUES
(1, 'DESARROLLADOR', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0, 1),
(2, 'ADIMINISTRADOR', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1),
(3, 'EMPLEADO', 1, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 0, 1, 1, 1, 1, 1, 1, 1, 1, 0, 0, 0, 1, 0, 1, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(4, 'PROVEEDOR', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 1, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(5, 'SUSCRIPTOR', 0, 1, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(6, 'FULL ACCESS', 0, 1, 1, 1, 1, 1, 0, 0, 1, 0, 0, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0, 1),
(7, 'PASANTE', 0, 1, 1, 1, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(8, 'FULL COUNTER', 0, 1, 1, 1, 1, 1, 0, 0, 1, 0, 0, 1, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(9, 'FULL COUNTE', 0, 1, 1, 1, 1, 1, 0, 0, 1, 0, 0, 1, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(10, 'ROL', 0, 1, 1, 1, 1, 1, 0, 0, 1, 0, 0, 1, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(11, 'GERENTE', 1, 1, 1, 1, 1, 1, 0, 0, 1, 0, 0, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);

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
  `contraseña` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NOT NULL,
  `telefono` varchar(11) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NOT NULL,
  `direccion` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NOT NULL,
  `ultima_sesion` datetime DEFAULT NULL,
  `sesion_activa` tinyint NOT NULL,
  `bloqueado` tinyint NOT NULL,
  `suspender` tinyint NOT NULL,
  `primer_inicio` tinyint(1) NOT NULL,
  `id_rol` int NOT NULL,
  `estado` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `cedula`, `nombre`, `apellido`, `correo`, `contraseña`, `telefono`, `direccion`, `ultima_sesion`, `sesion_activa`, `bloqueado`, `suspender`, `primer_inicio`, `id_rol`, `estado`) VALUES
(1, 'V-30270578', 'MANUEL', 'TORREZ', 'SHAUDITONUEL@GMAIL.COM', 'h7uxwaexpp9jZoY=', '04128053240', 'TURÉN LINDA', NULL, 0, 0, 0, 1, 2, 1),
(2, 'V-28587583', 'DANIEL JOSÉ', 'BARRUETA', 'dbarrueta42@gmail.com', 'eLS+tai0nGJi', '04125238909', 'SECTOR E GUASDUAL CALLE 1', '2025-06-08 16:24:55', 1, 0, 0, 0, 2, 1),
(5, 'V-30400015', 'ANGEL', 'ALIBARDI', 'angeldaniel231041@gmail.com', 'Z4OEfHN4Y2U=', '04122343434', 'BARRIO EL PAEZ', NULL, 0, 0, 1, 1, 3, 0),
(6, 'E-10642121', 'DANNY JOSÉ', 'BARRUETA', 'danny@gmail.com', 'eLS+tai0nGJi', '04145196488', 'CALLE 1 VARRIO EL GUASDUAL', NULL, 0, 0, 0, 1, 3, 1),
(7, 'V-12345678', 'ADMIN', 'PRUEBA', 'admin@gmail.com', 'dbe9tbF5ZGNm', '04123456548', 'ANDRES ELOY NEGRO', '2025-05-14 18:32:11', 0, 0, 0, 0, 2, 1),
(8, 'V-11077810', 'ROSIRIS', 'PICHARDO', 'rosiris@gmail.com', 'ZYWDgHh+aWg=', '04124567898', 'BARRIO EL ANDRES ELOY BLANCO', '2025-04-11 16:13:43', 0, 0, 0, 1, 7, 1),
(9, 'V-30774582', 'CARMEN', 'PEREZ', 'carmen@gmai.com', 'ioCDfHp/ZmVqZg==', '04145896325', 'BARRIO PAÉZ', NULL, 0, 0, 0, 1, 3, 1),
(10, 'V-25478958', 'JULIO', 'BAEZ', 'jbaez@gmai.com', 'ZoiEg3uBZ2g=', '04165874523', 'URB LAS MARIAS', NULL, 0, 0, 0, 1, 7, 1),
(11, 'E-14257869', 'JOSE', 'PERALTA', 'josepe@gmail.com', 'ZYeCgXqAaGk=', '04122541278', 'BARRIO LOS GUAJIROS', '2025-04-29 08:16:37', 0, 0, 0, 1, 7, 1),
(12, 'V-12345679', 'PEPE', 'PEREZ', 'pepe@gmail.com', 'ZYWDgHh+aWk=', '04164569812', 'BARIIO YA NI', NULL, 0, 0, 1, 1, 7, 1),
(13, 'V-32145775', 'DIEGO', 'FERNANDEZ', 'difer@gmail.com', 'Z4WBgHh/aWU=', '04127544589', 'BARRIO YANI', NULL, 0, 0, 1, 1, 7, 1),
(14, 'V-31456756', 'PEPE', 'GUEDEZ', 'pegue@gmail.com', 'Z4SEgXl/Z2Y=', '04124567899', 'BARRIO YANI', NULL, 0, 0, 0, 1, 3, 1),
(15, 'V-12348465', 'CARLOS', 'COLMENAREZ', 'ccolmena@gmail.com', 'ZYWDgHt8aGU=', '04164567865', 'URB LA LAGUNA', NULL, 0, 0, 0, 1, 11, 1),
(16, 'V-34234234', 'MIGUEL', 'SANCHEZ', 'sanchez@gmail.com', 'Z4eCf3d6ZWQ=', '04144567545', 'URB LAS MARIAS', NULL, 0, 0, 0, 1, 7, 1),
(17, 'V-33543345', 'FERNANDO', 'ALMEIDA', 'feralme@gmail.com', 'Z4aFgHZ7ZmU=', '04125463535', 'BARRIO LOS ACOSTADOS', NULL, 0, 0, 0, 1, 7, 1);

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
(1, '2024-10-17 08:34:03', 0, 0, 30, 1436.4, 2, 2),
(2, '2024-10-17 08:52:41', 0, 0, 24, 1125.48, 2, 2),
(3, '2024-10-17 08:53:40', 0, 0, 24, 1125.48, 2, 2),
(4, '2024-10-17 09:03:02', 0, 0, 24, 1125.48, 2, 2),
(5, '2024-10-17 09:06:34', 0, 0, 5, 200, 2, 2),
(6, '2024-10-17 09:09:49', 0, 0, 21, 1005.48, 2, 2),
(7, '2024-10-17 09:11:00', 0, 0, 5, 200, 2, 2),
(8, '2024-10-17 09:11:34', 0, 0, 5, 200, 2, 2),
(9, '2024-10-17 09:13:15', 0, 0, 5, 200, 2, 2),
(10, '2024-10-17 09:55:19', 0, 0, 5, 200, 2, 2),
(11, '2024-10-17 09:56:12', 0, 0, 5, 200, 2, 2),
(12, '2024-10-17 10:00:25', 0, 0, 5, 200, 2, 2),
(13, '2024-10-17 10:01:24', 0, 0, 5, 200, 2, 2),
(14, '2024-10-17 10:01:41', 0, 0, 5, 200, 2, 2),
(15, '2024-10-17 10:02:30', 0, 0, 5, 200, 2, 2),
(16, '2024-10-17 10:02:42', 0, 0, 5, 200, 2, 2),
(17, '2024-10-17 10:02:51', 0, 0, 5, 200, 2, 2),
(18, '2024-10-17 10:04:04', 0, 0, 15, 600, 2, 2),
(19, '2024-10-17 10:07:03', 0, 0, 15, 600, 2, 2),
(20, '2024-10-17 10:07:11', 0, 0, 15, 600, 2, 2),
(21, '2024-10-17 10:14:51', 0, 0, 15, 600, 2, 2),
(22, '2024-10-17 10:14:56', 0, 0, 15, 600, 2, 2),
(23, '2024-10-17 10:15:19', 0, 0, 5, 200, 2, 2),
(24, '2024-10-17 10:26:07', 0, 0, 5, 200, 2, 2),
(25, '2024-10-17 10:29:27', 0, 0, 5, 200, 2, 2),
(26, '2024-10-17 10:35:34', 0, 0, 5, 200, 2, 2),
(27, '2024-10-17 10:37:25', 0, 0, 25, 1165.48, 2, 2),
(28, '2024-10-17 10:38:57', 0, 0, 25, 1165.48, 2, 2),
(29, '2024-10-17 10:40:50', 0, 0, 33, 1556.4, 2, 2),
(30, '2024-10-17 10:41:10', 0, 0, 36, 1676.4, 2, 2),
(31, '2024-10-21 09:01:56', 0, 0, 45, 2154.6, 2, 2),
(32, '2024-10-22 09:05:28', 0, 0, 42, 2010.96, 2, 2),
(33, '2024-10-24 11:21:52', 0, 0, 65, 3072.8, 2, 2),
(34, '2024-10-24 11:25:16', 0, 0, 9, 360, 2, 4),
(35, '2024-10-24 11:26:01', 0, 0, 36, 1440, 2, 4),
(36, '2024-10-25 10:58:11', 0, 0, 31, 1484.28, 2, 2),
(37, '2024-10-25 11:23:48', 0, 0, 36, 1723.68, 2, 2),
(38, '2024-10-28 03:44:24', 0, 0, 30, 1436.4, 2, 5),
(39, '2024-10-28 03:54:34', 0, 0, 15, 718.2, 2, 5),
(40, '2024-10-28 04:06:49', 0, 0, 15, 718.2, 2, 5),
(41, '2024-10-28 04:11:36', 0, 0, 15, 718.2, 2, 5),
(42, '2024-10-28 04:16:14', 0, 0, 15, 718.2, 2, 5),
(43, '2024-10-28 04:17:27', 0, 0, 15, 718.2, 2, 5),
(44, '2024-10-28 04:18:08', 0, 0, 15, 718.2, 2, 5),
(45, '2024-10-28 04:18:30', 0, 0, 15, 718.2, 2, 5),
(46, '2024-10-28 04:19:48', 0, 0, 15, 718.2, 2, 5),
(47, '2024-10-28 04:20:00', 0, 0, 15, 718.2, 2, 5),
(48, '2024-10-28 04:20:54', 0, 0, 15, 718.2, 2, 5),
(49, '2024-10-28 04:21:08', 0, 0, 15, 718.2, 2, 5),
(50, '2024-10-28 04:21:48', 0, 0, 15, 718.2, 2, 5),
(51, '2024-10-28 04:23:42', 0, 0, 15, 718.2, 2, 5),
(52, '2024-10-28 04:24:05', 0, 0, 15, 718.2, 2, 5),
(53, '2024-10-28 04:34:52', 0, 0, 15, 718.2, 2, 5),
(54, '2024-10-28 04:35:06', 0, 0, 15, 718.2, 2, 5),
(55, '2024-10-28 04:35:17', 0, 0, 15, 718.2, 2, 5),
(56, '2024-10-28 04:35:31', 0, 0, 15, 718.2, 2, 5),
(57, '2024-10-28 04:39:22', 0, 0, 15, 718.2, 2, 5),
(58, '2024-10-28 04:41:30', 0, 0, 15, 718.2, 2, 5),
(59, '2024-10-28 04:41:51', 0, 0, 15, 718.2, 2, 5),
(60, '2024-10-28 04:53:18', 0, 0, 15, 718.2, 2, 5),
(61, '2024-10-28 04:54:09', 0, 0, 15, 718.2, 2, 5),
(62, '2024-10-28 04:56:01', 0, 0, 15, 718.2, 2, 5),
(63, '2024-10-28 04:56:23', 0, 0, 15, 718.2, 2, 5),
(64, '2024-10-28 04:59:41', 0, 0, 15, 718.2, 2, 5),
(65, '2024-10-28 05:00:34', 0, 0, 15, 718.2, 2, 5),
(66, '2024-10-28 05:00:46', 0, 0, 15, 718.2, 2, 5),
(67, '2024-10-28 05:01:06', 0, 0, 15, 718.2, 2, 5),
(68, '2024-10-28 05:03:43', 0, 0, 30, 1436.4, 2, 5),
(69, '2024-10-28 05:06:01', 0, 0, 30, 1436.4, 2, 5),
(70, '2024-10-28 05:08:53', 0, 0, 30, 1436.4, 2, 5),
(71, '2024-10-28 05:14:54', 0, 0, 30, 1436.4, 2, 5),
(72, '2024-10-28 05:14:58', 0, 0, 30, 1436.4, 2, 5),
(73, '2024-10-28 05:15:05', 0, 0, 30, 1436.4, 2, 5),
(74, '2024-10-28 05:16:44', 0, 0, 45, 2154.6, 2, 2),
(75, '2024-10-28 05:18:27', 0, 0, 50, 2000, 2, 2),
(76, '2024-10-28 05:19:27', 0, 0, 20, 800, 2, 2),
(77, '2024-10-28 05:22:00', 0, 0, 20, 800, 2, 2),
(78, '2024-10-28 05:29:38', 0, 0, 20, 800, 2, 2),
(79, '2024-10-28 05:29:43', 0, 0, 20, 800, 2, 2),
(80, '2024-10-28 05:30:00', 0, 0, 5, 200, 2, 2),
(81, '2024-10-28 05:31:09', 0, 0, 5, 200, 2, 2),
(82, '2024-10-28 05:33:13', 0, 0, 5, 200, 2, 2),
(83, '2024-10-28 05:33:29', 0, 0, 1, 40, 2, 2),
(84, '2024-10-28 05:33:36', 0, 0, 1, 40, 2, 2),
(85, '2024-10-28 05:36:25', 0, 0, 1, 40, 2, 2),
(86, '2024-10-28 05:37:48', 0, 0, 1, 40, 2, 2),
(87, '2024-10-28 05:38:54', 0, 0, 1, 40, 2, 2),
(88, '2024-10-28 05:39:24', 0, 0, 1, 40, 2, 2),
(89, '2024-10-28 05:39:37', 0, 0, 1, 40, 2, 2),
(90, '2024-10-28 05:46:25', 0, 0, 10, 400, 2, 5),
(91, '2024-10-28 05:48:39', 0, 0, 10, 400, 2, 5),
(92, '2024-10-28 06:32:53', 0, 0, 2, 80, 2, 2),
(93, '2024-10-28 07:05:24', 0, 0, 5, 200, 2, 2),
(94, '2024-10-28 07:13:32', 0, 0, 2, 80, 2, 2),
(95, '2024-10-28 07:15:30', 0, 0, 2, 80, 2, 2),
(96, '2024-10-28 07:15:49', 0, 0, 2, 80, 2, 2),
(97, '2024-10-28 07:17:08', 0, 0, 2, 80, 2, 2),
(98, '2024-10-28 07:18:46', 0, 0, 45, 2154.6, 2, 5),
(99, '2024-10-28 07:19:01', 0, 0, 15, 718.2, 2, 5),
(100, '2024-10-28 07:19:08', 0, 0, 15, 718.2, 2, 5),
(101, '2024-10-28 07:20:45', 0, 0, 15, 718.2, 2, 5),
(102, '2024-10-28 07:22:39', 0, 0, 15, 718.2, 2, 5),
(103, '2024-10-28 07:23:02', 0, 0, 6, 240, 2, 5),
(104, '2024-10-28 07:24:03', 0, 0, 6, 240, 2, 5),
(105, '2024-10-28 07:24:28', 0, 0, 6, 240, 2, 5),
(106, '2024-10-28 07:24:41', 0, 0, 6, 240, 2, 5),
(107, '2024-10-28 07:25:18', 0, 0, 6, 240, 2, 5),
(108, '2024-10-28 07:25:59', 0, 0, 6, 240, 2, 5),
(109, '2024-10-28 07:26:52', 0, 0, 6, 240, 2, 5),
(110, '2024-10-28 07:27:05', 0, 0, 6, 240, 2, 5),
(111, '2024-10-28 07:30:51', 0, 0, 6, 240, 2, 5),
(112, '2024-10-28 07:31:55', 0, 0, 6, 240, 2, 5),
(113, '2024-10-28 07:32:20', 0, 0, 6, 240, 2, 5),
(114, '2024-10-28 07:34:59', 0, 0, 6, 240, 2, 5),
(115, '2024-10-28 07:36:09', 0, 0, 6, 240, 2, 5),
(116, '2024-10-28 07:36:36', 0, 0, 6, 240, 2, 5),
(117, '2024-10-28 07:37:06', 0, 0, 6, 240, 2, 5),
(118, '2024-10-28 07:37:31', 0, 0, 6, 240, 2, 5),
(119, '2024-10-28 07:38:15', 0, 0, 6, 240, 2, 5),
(120, '2024-10-28 07:38:23', 0, 0, 6, 240, 2, 5),
(121, '2024-10-28 07:38:48', 0, 0, 6, 240, 2, 5),
(122, '2024-10-28 07:38:53', 0, 0, 6, 240, 2, 5),
(123, '2024-10-28 07:40:47', 0, 0, 6, 240, 2, 5),
(124, '2024-10-28 07:41:39', 0, 0, 6, 240, 2, 5),
(125, '2024-10-28 07:42:35', 0, 0, 6, 240, 2, 5),
(126, '2024-10-30 05:28:59', 0, 0, 5, 200, 2, 2),
(127, '2024-10-30 06:51:50', 0, 0, 5, 200, 2, 2),
(128, '2024-10-30 06:56:08', 0, 0, 300, 14364, 2, 2),
(129, '2024-10-30 07:07:42', 0, 0, 30, 1436.4, 2, 2),
(130, '2024-10-30 07:07:55', 0, 0, 30, 1436.4, 2, 2),
(131, '2024-10-30 07:27:56', 0, 0, 30, 1436.4, 2, 2),
(132, '2024-10-30 07:30:49', 0, 0, 30, 1436.4, 2, 5),
(133, '2024-10-30 07:35:32', 0, 0, 1, 40, 2, 2),
(134, '2024-10-30 07:37:21', 0, 0, 4, 160, 2, 2),
(135, '2024-10-30 07:37:42', 0, 0, 4, 160, 2, 2),
(136, '2024-10-30 07:40:06', 0, 0, 4, 160, 2, 2),
(137, '2024-10-30 07:40:11', 0, 0, 4, 160, 2, 2),
(138, '2024-10-30 07:42:38', 0, 0, 4, 160, 2, 2),
(139, '2024-10-30 07:43:25', 0, 0, 30, 1436.4, 2, 5),
(140, '2024-10-30 07:44:39', 0, 0, 30, 1436.4, 2, 5),
(141, '2024-10-30 07:45:29', 0, 0, 30, 1436.4, 2, 2),
(142, '2024-10-30 07:46:11', 0, 0, 6, 240, 2, 2),
(143, '2024-10-30 07:47:20', 0, 0, 34, 1596.4, 2, 2),
(144, '2024-10-30 07:54:10', 0, 0, 40, 1836.4, 2, 2),
(145, '2024-11-05 06:22:53', 0, 0, 12, 543.04, 2, 2),
(146, '2024-11-06 04:51:09', 0, 0, 10, 463.04, 2, 2),
(147, '2024-11-09 09:19:41', 0, 0, 10, 478.8, 2, 5),
(148, '2024-11-13 09:51:54', 0, 0, 2, 80, 2, 2),
(149, '2024-11-14 09:29:26', 0, 0, 20, 957.6, 1, 6),
(150, '2024-11-14 10:45:50', 0, 0, 30, 1436.4, 1, 2),
(151, '2024-11-15 12:10:27', 0, 0, 30, 1318.2, 2, 4),
(152, '2024-11-15 12:18:59', 0, 0, 10, 478.8, 2, 4),
(153, '2024-11-22 11:42:54', 0, 0, 108, 5171.04, 2, 5),
(154, '2024-11-26 09:44:21', 34, 1590.72, 39.44, 1845.24, 5, 2),
(155, '2024-11-26 10:22:39', 0, 0, 23.2, 1110.82, 5, 5),
(156, '2024-11-27 04:52:23', 0, 0, 16.24, 766.06, 2, 5),
(157, '2024-11-28 12:54:02', 17, 804.04, 19.72, 932.69, 5, 5),
(158, '2024-11-28 03:09:53', 63, 2997.84, 73.08, 3477.49, 2, 5),
(159, '2024-11-28 03:23:34', 30, 1399.2, 34.8, 1623.07, 2, 5),
(160, '2024-11-28 03:30:05', 30, 1399.2, 34.8, 1623.07, 2, 5),
(161, '2025-02-18 08:42:08', 36, 1686.48, 41.76, 1956.32, 2, 2),
(162, '2025-05-27 06:58:46', 0, 0, 0, 0, 2, 2),
(163, '2025-05-27 07:02:50', 0, 0, 0, 0, 2, 2),
(164, '2025-06-02 08:15:07', 33, 3137.64, 38.28, 3639.66, 2, 3),
(165, '2025-06-02 08:19:09', 33, 3137.64, 38.28, 3639.66, 2, 3),
(166, '2025-06-02 08:21:38', 33, 3137.64, 38.28, 3639.66, 2, 3),
(167, '2025-06-02 08:31:33', 33, 3137.64, 38.28, 3639.66, 2, 3),
(168, '2025-06-02 08:36:20', 33, 3137.64, 38.28, 3639.66, 2, 3),
(169, '2025-06-02 08:56:32', 33, 3137.64, 38.28, 3639.66, 2, 3),
(170, '2025-06-02 08:58:21', 33, 3137.64, 38.28, 3639.66, 2, 3),
(171, '2025-06-02 09:08:00', 33, 3137.64, 38.28, 3639.66, 2, 3),
(172, '2025-06-02 09:10:45', 33, 3137.64, 38.28, 3639.66, 2, 3),
(173, '2025-06-02 09:21:18', 32, 3042.56, 37.12, 3529.37, 2, 3),
(174, '2025-06-02 09:21:27', 32, 3042.56, 37.12, 3529.37, 2, 3),
(175, '2025-06-02 09:21:58', 32, 3042.56, 37.12, 3529.37, 2, 3),
(176, '2025-06-02 09:22:27', 32, 3042.56, 37.12, 3529.37, 2, 3),
(177, '2025-06-02 09:25:24', 32, 3042.56, 37.12, 3529.37, 2, 3),
(178, '2025-06-02 09:27:05', 32, 3042.56, 37.12, 3529.37, 2, 3),
(179, '2025-06-02 09:32:10', 32, 3042.56, 37.12, 3529.37, 2, 3),
(180, '2025-06-02 09:37:08', 32, 3042.56, 37.12, 3529.37, 2, 3),
(181, '2025-06-03 08:28:24', 19, 1848.89, 22.04, 2144.71, 2, 2),
(182, '2025-06-07 07:58:57', 18, 1783.62, 20.88, 2069, 2, 3),
(183, '2025-06-08 04:54:27', 10, 990.9, 11.6, 1149.44, 2, 3),
(184, '2025-06-08 05:01:30', 16, 1585.44, 18.56, 1839.11, 2, 3),
(185, '2025-06-08 05:56:43', 8, 792.72, 9.28, 919.56, 2, 3),
(186, '2025-06-08 05:59:34', 10, 990.9, 11.6, 1149.44, 2, 3);

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
  ADD KEY `id_dolar` (`id_dolar`);

--
-- Indices de la tabla `iva`
--
ALTER TABLE `iva`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `porcentaje` (`porcentaje`);

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
  ADD UNIQUE KEY `nombre` (`nombre`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`id_producto`),
  ADD UNIQUE KEY `codigo` (`codigo`),
  ADD UNIQUE KEY `nombre_producto` (`nombre_producto`),
  ADD KEY `id_categoria` (`id_categoria`),
  ADD KEY `id_presentacion` (`id_presentacion`);

--
-- Indices de la tabla `producto_iva`
--
ALTER TABLE `producto_iva`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_iva` (`id_iva`),
  ADD KEY `id_producto` (`id_producto`);

--
-- Indices de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  ADD PRIMARY KEY (`id_proveedor`),
  ADD UNIQUE KEY `cedula_rif` (`cedula_rif`),
  ADD UNIQUE KEY `correo` (`correo`),
  ADD UNIQUE KEY `telefono` (`telefono`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`id_rol`);

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
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=599;

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
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `detalles_menu`
--
ALTER TABLE `detalles_menu`
  MODIFY `id_detalles_menu` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de la tabla `detalles_pago`
--
ALTER TABLE `detalles_pago`
  MODIFY `id_detalle_pago` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=129;

--
-- AUTO_INCREMENT de la tabla `detalles_venta`
--
ALTER TABLE `detalles_venta`
  MODIFY `id_detalles_venta` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT de la tabla `dolar`
--
ALTER TABLE `dolar`
  MODIFY `id_dolar` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT de la tabla `entrada`
--
ALTER TABLE `entrada`
  MODIFY `id_entrada` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `iva`
--
ALTER TABLE `iva`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT de la tabla `menu`
--
ALTER TABLE `menu`
  MODIFY `id_menu` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `preguntas_secretas`
--
ALTER TABLE `preguntas_secretas`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT de la tabla `presentacion`
--
ALTER TABLE `presentacion`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `id_producto` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT de la tabla `producto_iva`
--
ALTER TABLE `producto_iva`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  MODIFY `id_proveedor` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `rol`
--
ALTER TABLE `rol`
  MODIFY `id_rol` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `seguridad`
--
ALTER TABLE `seguridad`
  MODIFY `id_seguridad` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `venta`
--
ALTER TABLE `venta`
  MODIFY `id_venta` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=187;

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
  ADD CONSTRAINT `entrada_ibfk_2` FOREIGN KEY (`id_dolar`) REFERENCES `dolar` (`id_dolar`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `preguntas_secretas`
--
ALTER TABLE `preguntas_secretas`
  ADD CONSTRAINT `preguntas_secretas_ibfk_1` FOREIGN KEY (`id_pregunta`) REFERENCES `seguridad` (`id_seguridad`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `preguntas_secretas_ibfk_2` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `producto_ibfk_1` FOREIGN KEY (`id_categoria`) REFERENCES `categoria` (`id_categoria`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `producto_ibfk_2` FOREIGN KEY (`id_presentacion`) REFERENCES `presentacion` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `producto_iva`
--
ALTER TABLE `producto_iva`
  ADD CONSTRAINT `producto_iva_ibfk_1` FOREIGN KEY (`id_producto`) REFERENCES `producto` (`id_producto`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `producto_iva_ibfk_2` FOREIGN KEY (`id_iva`) REFERENCES `iva` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

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
