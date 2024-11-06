-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 31-10-2024 a las 04:04:52
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
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `id_categoria` int NOT NULL,
  `nombre` varchar(30) COLLATE utf8mb4_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`id_categoria`, `nombre`) VALUES
(1, 'COMESTIBLE'),
(2, 'BEBIDAS'),
(3, 'FRITURAS'),
(4, 'JODAS'),
(5, 'XDLÑÑ'),
(6, 'KLJKLJLKJ');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria_equipo`
--

CREATE TABLE `categoria_equipo` (
  `id_categoria_equipo` int NOT NULL,
  `nombre` varchar(20) COLLATE utf8mb4_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `id_cliente` int NOT NULL,
  `cedula` varchar(11) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `nombre` varchar(40) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `telefono` varchar(11) COLLATE utf8mb4_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`id_cliente`, `cedula`, `nombre`, `telefono`) VALUES
(1, 'V-15214817', 'Jhoan Torrez', '04128053290'),
(2, 'V-28587583', 'daniel barrueta', '04125238909'),
(7, 'V-14540481', 'maría gimenez', '04245494211'),
(8, 'V-30887827', 'KATTY RONDON', '04242344312');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalles_menu`
--

CREATE TABLE `detalles_menu` (
  `id_detalles_menu` int NOT NULL,
  `id_producto` int NOT NULL,
  `cantidad` int NOT NULL,
  `numero_detalles_menu` int NOT NULL,
  `id_menu` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `detalles_menu`
--

INSERT INTO `detalles_menu` (`id_detalles_menu`, `id_producto`, `cantidad`, `numero_detalles_menu`, `id_menu`) VALUES
(1, 1, 2, 1, 1),
(2, 4, 1, 1, 1),
(3, 2, 1, 0, 3),
(4, 4, 3, 1, 3),
(5, 1, 5, 1, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalles_pago`
--

CREATE TABLE `detalles_pago` (
  `id_detalle_pago` int NOT NULL,
  `id_venta` int NOT NULL,
  `metodo_pago` varchar(50) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `referencia` varchar(30) COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
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
(24, 93, 'Transferencia / Pago movíl', '1233333333', 3, 143.64),
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
(39, 115, '0', '0', 3, 143.64),
(40, 116, '0', '0', 3, 143.64),
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
(65, 144, 'Transferencia / Pago movíl', '7676454334588', 15, 718.2);

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
(1, 1, 2, 15, 718.2, NULL, NULL, NULL, NULL, 1),
(2, 3, 2, 10.5, 502.74, NULL, NULL, NULL, NULL, 2),
(3, 3, 2, 10.5, 502.74, NULL, NULL, NULL, NULL, 3),
(4, 3, 2, 10.5, 502.74, NULL, NULL, NULL, NULL, 4),
(5, 3, 2, 10.5, 502.74, NULL, NULL, NULL, NULL, 6),
(6, NULL, NULL, NULL, NULL, 3, 5, 1, 40, 23),
(7, NULL, NULL, NULL, NULL, 3, 5, 40, 0, 26),
(8, 3, 2, 10.5, 502.74, NULL, NULL, NULL, NULL, 27),
(9, 3, 2, 10.5, 502.74, NULL, NULL, NULL, NULL, 28),
(10, NULL, NULL, NULL, NULL, 3, 4, 40, 0, 28),
(11, 1, 2, 15, 718.2, NULL, NULL, NULL, NULL, 29),
(12, 1, 2, 15, 718.2, NULL, NULL, NULL, NULL, 30),
(13, NULL, NULL, NULL, NULL, 4, 2, 120, 0, 30),
(14, 1, 3, 15, 718.2, NULL, NULL, NULL, NULL, 31),
(15, 3, 4, 10.5, 502.74, NULL, NULL, NULL, NULL, 32),
(16, 1, 4, 15, 718.2, NULL, NULL, NULL, NULL, 33),
(17, NULL, NULL, NULL, NULL, 4, 3, 120, 0, 34),
(18, NULL, NULL, NULL, NULL, 4, 12, 120, 0, 35),
(19, 3, 2, 10.5, 502.74, NULL, NULL, NULL, NULL, 36),
(20, NULL, NULL, NULL, NULL, 5, 2, 239.4, 0, 36),
(21, 3, 2, 10.5, 502.74, 5, 3, 239.4, 0, 37),
(22, 1, 2, 15, 718.2, NULL, NULL, NULL, NULL, 38),
(23, 1, 1, 15, 718.2, NULL, NULL, NULL, NULL, 39),
(24, 1, 1, 15, 718.2, NULL, NULL, NULL, NULL, 40),
(25, 1, 1, 15, 718.2, NULL, NULL, NULL, NULL, 51),
(26, 1, 1, 15, 718.2, NULL, NULL, NULL, NULL, 56),
(27, 1, 1, 15, 718.2, NULL, NULL, NULL, NULL, 59),
(28, 1, 1, 15, 718.2, NULL, NULL, NULL, NULL, 60),
(29, 1, 1, 15, 718.2, NULL, NULL, NULL, NULL, 61),
(30, 1, 1, 15, 718.2, NULL, NULL, NULL, NULL, 62),
(31, 1, 1, 15, 718.2, NULL, NULL, NULL, NULL, 63),
(32, 1, 1, 15, 718.2, NULL, NULL, NULL, NULL, 64),
(33, 1, 1, 15, 718.2, NULL, NULL, NULL, NULL, 65),
(34, 1, 1, 15, 718.2, NULL, NULL, NULL, NULL, 67),
(35, 1, 2, 15, 718.2, NULL, NULL, NULL, NULL, 68),
(36, 1, 2, 15, 718.2, NULL, NULL, NULL, NULL, 69),
(37, 1, 2, 15, 718.2, NULL, NULL, NULL, NULL, 71),
(38, 1, 2, 15, 718.2, NULL, NULL, NULL, NULL, 72),
(39, 1, 2, 15, 718.2, NULL, NULL, NULL, NULL, 73),
(40, 1, 3, 15, 718.2, NULL, NULL, NULL, NULL, 74),
(41, NULL, NULL, NULL, NULL, 1, 20, 1, 40, 76),
(42, NULL, NULL, NULL, NULL, 1, 5, 1, 40, 80),
(43, NULL, NULL, NULL, NULL, 1, 5, 1, 40, 81),
(44, NULL, NULL, NULL, NULL, 1, 5, 1, 40, 82),
(45, NULL, NULL, NULL, NULL, 1, 1, 1, 40, 83),
(46, NULL, NULL, NULL, NULL, 1, 1, 1, 40, 84),
(47, NULL, NULL, NULL, NULL, 1, 1, 1, 40, 85),
(48, NULL, NULL, NULL, NULL, 1, 1, 1, 40, 86),
(49, NULL, NULL, NULL, NULL, 1, 1, 1, 40, 88),
(50, NULL, NULL, NULL, NULL, 1, 1, 1, 40, 89),
(51, NULL, NULL, NULL, NULL, 1, 10, 1, 40, 90),
(52, NULL, NULL, NULL, NULL, 1, 10, 1, 40, 91),
(53, NULL, NULL, NULL, NULL, 1, 2, 1, 40, 92),
(54, NULL, NULL, NULL, NULL, 1, 5, 1, 40, 93),
(55, NULL, NULL, NULL, NULL, 1, 2, 1, 40, 94),
(56, NULL, NULL, NULL, NULL, 1, 2, 1, 40, 95),
(57, NULL, NULL, NULL, NULL, 1, 2, 1, 40, 96),
(58, NULL, NULL, NULL, NULL, 1, 2, 1, 40, 97),
(59, 1, 1, 15, 718.2, NULL, NULL, NULL, NULL, 99),
(60, 1, 1, 15, 718.2, NULL, NULL, NULL, NULL, 101),
(61, 1, 1, 15, 718.2, NULL, NULL, NULL, NULL, 102),
(62, NULL, NULL, NULL, NULL, 1, 6, 1, 40, 103),
(63, NULL, NULL, NULL, NULL, 1, 6, 1, 40, 104),
(64, NULL, NULL, NULL, NULL, 1, 6, 1, 40, 105),
(65, NULL, NULL, NULL, NULL, 1, 6, 1, 40, 106),
(66, NULL, NULL, NULL, NULL, 1, 6, 1, 40, 107),
(67, NULL, NULL, NULL, NULL, 1, 6, 1, 40, 108),
(68, NULL, NULL, NULL, NULL, 1, 6, 1, 40, 109),
(69, NULL, NULL, NULL, NULL, 1, 6, 1, 40, 110),
(70, NULL, NULL, NULL, NULL, 1, 6, 1, 40, 111),
(71, NULL, NULL, NULL, NULL, 1, 6, 1, 40, 112),
(72, NULL, NULL, NULL, NULL, 1, 6, 1, 40, 113),
(73, NULL, NULL, NULL, NULL, 1, 6, 1, 40, 115),
(74, NULL, NULL, NULL, NULL, 1, 6, 1, 40, 116),
(75, NULL, NULL, NULL, NULL, 1, 6, 1, 40, 117),
(76, NULL, NULL, NULL, NULL, 1, 6, 1, 40, 118),
(77, NULL, NULL, NULL, NULL, 1, 6, 1, 40, 119),
(78, NULL, NULL, NULL, NULL, 1, 6, 1, 40, 120),
(79, NULL, NULL, NULL, NULL, 1, 6, 1, 40, 121),
(80, NULL, NULL, NULL, NULL, 1, 6, 1, 40, 122),
(81, NULL, NULL, NULL, NULL, 1, 6, 1, 40, 124),
(82, NULL, NULL, NULL, NULL, 1, 6, 1, 40, 125),
(83, NULL, NULL, NULL, NULL, 1, 5, 1, 40, 126),
(84, NULL, NULL, NULL, NULL, 1, 5, 1, 40, 127),
(85, 1, 20, 15, 718.2, NULL, NULL, NULL, NULL, 128),
(86, 1, 2, 15, 718.2, NULL, NULL, NULL, NULL, 129),
(87, 1, 2, 15, 718.2, NULL, NULL, NULL, NULL, 130),
(88, 1, 2, 15, 718.2, NULL, NULL, NULL, NULL, 131),
(89, 1, 2, 15, 718.2, NULL, NULL, NULL, NULL, 132),
(90, NULL, NULL, NULL, NULL, 3, 1, 1, 40, 133),
(91, NULL, NULL, NULL, NULL, 1, 4, 1, 40, 134),
(92, NULL, NULL, NULL, NULL, 1, 4, 1, 40, 135),
(93, NULL, NULL, NULL, NULL, 1, 4, 1, 40, 136),
(94, NULL, NULL, NULL, NULL, 1, 4, 1, 40, 137),
(95, NULL, NULL, NULL, NULL, 1, 4, 1, 40, 138),
(96, 1, 2, 15, 718.2, NULL, NULL, NULL, NULL, 139),
(97, 1, 2, 15, 718.2, NULL, NULL, NULL, NULL, 140),
(98, 1, 2, 15, 718.2, NULL, NULL, NULL, NULL, 141),
(99, NULL, NULL, NULL, NULL, 4, 2, 3, 120, 142),
(100, 1, 2, 15, 718.2, 1, 4, 1, 40, 143),
(101, 1, 2, 15, 718.2, 1, 10, 1, 40, 144);

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
(3, 47.88, '2024-10-13 21:49:03');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `entrada`
--

CREATE TABLE `entrada` (
  `id_entrada` int NOT NULL,
  `id_producto` int NOT NULL,
  `id_proveedor` int NOT NULL,
  `precio_compra_dolar` float NOT NULL,
  `precio_compra_bs` float NOT NULL,
  `stock_comprado` int NOT NULL,
  `fecha_entrada` datetime NOT NULL,
  `n_compra` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `entrada`
--

INSERT INTO `entrada` (`id_entrada`, `id_producto`, `id_proveedor`, `precio_compra_dolar`, `precio_compra_bs`, `stock_comprado`, `fecha_entrada`, `n_compra`) VALUES
(1, 1, 1, 3, 0, 3, '2024-09-25 11:37:54', 0),
(2, 2, 1, 4, 0, 4, '2024-09-25 11:37:54', 1),
(3, 1, 3, 1, 0, 20, '2024-09-28 08:50:27', 0),
(4, 1, 3, 2, 0, 10, '2024-09-28 09:16:25', 0),
(5, 3, 3, 2, 0, 5, '2024-09-28 09:16:25', 1),
(6, 1, 3, 1, 40, 5, '2024-10-06 04:27:34', 0),
(7, 3, 3, 1, 40, 5, '2024-10-06 04:27:34', 1),
(8, 4, 3, 3, 120, 50, '2024-10-06 04:37:48', 0),
(9, 2, 3, 1.5, 60, 5, '2024-10-06 05:49:11', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `equipo`
--

CREATE TABLE `equipo` (
  `id_equipo` int NOT NULL,
  `codigo` int NOT NULL,
  `nombre` varchar(50) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `id_categoria_equipo` int NOT NULL,
  `id_status_equipo` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `menu`
--

CREATE TABLE `menu` (
  `id_menu` int NOT NULL,
  `nombre_platillo` varchar(40) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `precio_dolar` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NOT NULL,
  `descripcion` varchar(70) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `estatus` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `menu`
--

INSERT INTO `menu` (`id_menu`, `nombre_platillo`, `precio_dolar`, `descripcion`, `estatus`) VALUES
(1, 'POLLO ASADO COMPLETO', '15', 'pollo asado completo con ensalada y yuca', 1),
(2, 'POLOO', '10.5', 'POLOOOOOOOO', 1),
(3, 'POLLOOO', '10.5', 'POLOOOOOOOO', 1),
(4, 'GLUPS', '5', 'COMBO DE REFRESCOS', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `preguntas_secretas`
--

CREATE TABLE `preguntas_secretas` (
  `id` int NOT NULL,
  `id_pregunta` int NOT NULL,
  `respuesta` varchar(80) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `numero_pregunta` int NOT NULL,
  `id_usuario` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `preguntas_secretas`
--

INSERT INTO `preguntas_secretas` (`id`, `id_pregunta`, `respuesta`, `numero_pregunta`, `id_usuario`) VALUES
(1, 1, 'd6KUjQ==', 1, 1),
(2, 1, 'hqiWoZY=', 1, 2),
(3, 2, 'iKiikZE=', 2, 2),
(4, 4, 'dZaRnoyPh3E=', 3, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `id_producto` int NOT NULL,
  `id_categoria` int NOT NULL,
  `nombre_producto` varchar(30) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `precio_compra_dolar` float NOT NULL,
  `precio_compra_bs` float NOT NULL,
  `stock` int NOT NULL,
  `estatus` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`id_producto`, `id_categoria`, `nombre_producto`, `precio_compra_dolar`, `precio_compra_bs`, `stock`, `estatus`) VALUES
(1, 2, 'GLUP', 1, 40, 70, 1),
(2, 2, 'Pepsi 1.5 LT', 1.5, 60, 0, 0),
(3, 2, 'LIGHT', 1, 40, 0, 0),
(4, 1, 'POLLO', 3, 120, 0, 0),
(7, 2, 'COCA COLA', 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedor`
--

CREATE TABLE `proveedor` (
  `id_proveedor` int NOT NULL,
  `cedula_rif` varchar(11) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `nombre` varchar(40) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `correo` varchar(70) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `direccion` varchar(70) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `telefono` varchar(11) COLLATE utf8mb4_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `proveedor`
--

INSERT INTO `proveedor` (`id_proveedor`, `cedula_rif`, `nombre`, `correo`, `direccion`, `telefono`) VALUES
(1, '16934956', 'EL CORRALITO', 'Corral@pollera.com', 'acarigua calle 3 avenida 5 y 6', '04122343443');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `id_rol` int NOT NULL,
  `nombre` varchar(20) COLLATE utf8mb4_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`id_rol`, `nombre`) VALUES
(1, 'ADIMINISTRADOR'),
(2, 'EMPLEADO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `seguridad`
--

CREATE TABLE `seguridad` (
  `id_seguridad` int NOT NULL,
  `pregunta` varchar(80) COLLATE utf8mb4_spanish2_ci NOT NULL
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
-- Estructura de tabla para la tabla `status_equipo`
--

CREATE TABLE `status_equipo` (
  `id_status_equipo` int NOT NULL,
  `nombre` varchar(20) COLLATE utf8mb4_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int NOT NULL,
  `cedula` varchar(10) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `nombre` varchar(50) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `apellido` varchar(50) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `correo` varchar(70) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `contraseña` varchar(20) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `telefono` varchar(11) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `direccion` varchar(70) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `primer_inicio` tinyint(1) NOT NULL,
  `id_rol` int NOT NULL,
  `estado` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `cedula`, `nombre`, `apellido`, `correo`, `contraseña`, `telefono`, `direccion`, `primer_inicio`, `id_rol`, `estado`) VALUES
(1, '30270578', 'MANUEL', 'TORREZ', 'SHAUDITONUEL@GMAIL.COM', 'h7uxwaexpp9jZoY=', '04128053240', 'TURÉN LINDA', 1, 1, 1),
(2, 'V-28587583', 'DANIEL', 'BARRUETA', 'dbarrueta42@gmail.com', 'eLS+tai0nGJi', '04125238909', 'SECTOR E GUASDUAL CALLE 1', 0, 1, 1),
(3, 'V-12345678', 'CARLOS', 'PEREZ', 'carlosp@gmail.com', '', '04122343443', 'AVENIDA 1, ENTRE CALLE 4 Y 5', 1, 2, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `venta`
--

CREATE TABLE `venta` (
  `id_venta` int NOT NULL,
  `fecha_venta` datetime NOT NULL,
  `monto_total_dolares` float NOT NULL,
  `monto_total_bolivares` float NOT NULL,
  `id_usuario` int NOT NULL,
  `id_cliente` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `venta`
--

INSERT INTO `venta` (`id_venta`, `fecha_venta`, `monto_total_dolares`, `monto_total_bolivares`, `id_usuario`, `id_cliente`) VALUES
(1, '2024-10-17 08:34:03', 30, 1436.4, 2, 2),
(2, '2024-10-17 08:52:41', 24, 1125.48, 2, 2),
(3, '2024-10-17 08:53:40', 24, 1125.48, 2, 2),
(4, '2024-10-17 09:03:02', 24, 1125.48, 2, 2),
(5, '2024-10-17 09:06:34', 5, 200, 2, 2),
(6, '2024-10-17 09:09:49', 21, 1005.48, 2, 2),
(7, '2024-10-17 09:11:00', 5, 200, 2, 2),
(8, '2024-10-17 09:11:34', 5, 200, 2, 2),
(9, '2024-10-17 09:13:15', 5, 200, 2, 2),
(10, '2024-10-17 09:55:19', 5, 200, 2, 2),
(11, '2024-10-17 09:56:12', 5, 200, 2, 2),
(12, '2024-10-17 10:00:25', 5, 200, 2, 2),
(13, '2024-10-17 10:01:24', 5, 200, 2, 2),
(14, '2024-10-17 10:01:41', 5, 200, 2, 2),
(15, '2024-10-17 10:02:30', 5, 200, 2, 2),
(16, '2024-10-17 10:02:42', 5, 200, 2, 2),
(17, '2024-10-17 10:02:51', 5, 200, 2, 2),
(18, '2024-10-17 10:04:04', 15, 600, 2, 2),
(19, '2024-10-17 10:07:03', 15, 600, 2, 2),
(20, '2024-10-17 10:07:11', 15, 600, 2, 2),
(21, '2024-10-17 10:14:51', 15, 600, 2, 2),
(22, '2024-10-17 10:14:56', 15, 600, 2, 2),
(23, '2024-10-17 10:15:19', 5, 200, 2, 2),
(24, '2024-10-17 10:26:07', 5, 200, 2, 2),
(25, '2024-10-17 10:29:27', 5, 200, 2, 2),
(26, '2024-10-17 10:35:34', 5, 200, 2, 2),
(27, '2024-10-17 10:37:25', 25, 1165.48, 2, 2),
(28, '2024-10-17 10:38:57', 25, 1165.48, 2, 2),
(29, '2024-10-17 10:40:50', 33, 1556.4, 2, 2),
(30, '2024-10-17 10:41:10', 36, 1676.4, 2, 2),
(31, '2024-10-21 09:01:56', 45, 2154.6, 2, 2),
(32, '2024-10-22 09:05:28', 42, 2010.96, 2, 2),
(33, '2024-10-24 11:21:52', 65, 3072.8, 2, 2),
(34, '2024-10-24 11:25:16', 9, 360, 2, 7),
(35, '2024-10-24 11:26:01', 36, 1440, 2, 7),
(36, '2024-10-25 10:58:11', 31, 1484.28, 2, 2),
(37, '2024-10-25 11:23:48', 36, 1723.68, 2, 2),
(38, '2024-10-28 03:44:24', 30, 1436.4, 2, 8),
(39, '2024-10-28 03:54:34', 15, 718.2, 2, 8),
(40, '2024-10-28 04:06:49', 15, 718.2, 2, 8),
(41, '2024-10-28 04:11:36', 15, 718.2, 2, 8),
(42, '2024-10-28 04:16:14', 15, 718.2, 2, 8),
(43, '2024-10-28 04:17:27', 15, 718.2, 2, 8),
(44, '2024-10-28 04:18:08', 15, 718.2, 2, 8),
(45, '2024-10-28 04:18:30', 15, 718.2, 2, 8),
(46, '2024-10-28 04:19:48', 15, 718.2, 2, 8),
(47, '2024-10-28 04:20:00', 15, 718.2, 2, 8),
(48, '2024-10-28 04:20:54', 15, 718.2, 2, 8),
(49, '2024-10-28 04:21:08', 15, 718.2, 2, 8),
(50, '2024-10-28 04:21:48', 15, 718.2, 2, 8),
(51, '2024-10-28 04:23:42', 15, 718.2, 2, 8),
(52, '2024-10-28 04:24:05', 15, 718.2, 2, 8),
(53, '2024-10-28 04:34:52', 15, 718.2, 2, 8),
(54, '2024-10-28 04:35:06', 15, 718.2, 2, 8),
(55, '2024-10-28 04:35:17', 15, 718.2, 2, 8),
(56, '2024-10-28 04:35:31', 15, 718.2, 2, 8),
(57, '2024-10-28 04:39:22', 15, 718.2, 2, 8),
(58, '2024-10-28 04:41:30', 15, 718.2, 2, 8),
(59, '2024-10-28 04:41:51', 15, 718.2, 2, 8),
(60, '2024-10-28 04:53:18', 15, 718.2, 2, 8),
(61, '2024-10-28 04:54:09', 15, 718.2, 2, 8),
(62, '2024-10-28 04:56:01', 15, 718.2, 2, 8),
(63, '2024-10-28 04:56:23', 15, 718.2, 2, 8),
(64, '2024-10-28 04:59:41', 15, 718.2, 2, 8),
(65, '2024-10-28 05:00:34', 15, 718.2, 2, 8),
(66, '2024-10-28 05:00:46', 15, 718.2, 2, 8),
(67, '2024-10-28 05:01:06', 15, 718.2, 2, 8),
(68, '2024-10-28 05:03:43', 30, 1436.4, 2, 8),
(69, '2024-10-28 05:06:01', 30, 1436.4, 2, 8),
(70, '2024-10-28 05:08:53', 30, 1436.4, 2, 8),
(71, '2024-10-28 05:14:54', 30, 1436.4, 2, 8),
(72, '2024-10-28 05:14:58', 30, 1436.4, 2, 8),
(73, '2024-10-28 05:15:05', 30, 1436.4, 2, 8),
(74, '2024-10-28 05:16:44', 45, 2154.6, 2, 2),
(75, '2024-10-28 05:18:27', 50, 2000, 2, 2),
(76, '2024-10-28 05:19:27', 20, 800, 2, 2),
(77, '2024-10-28 05:22:00', 20, 800, 2, 2),
(78, '2024-10-28 05:29:38', 20, 800, 2, 2),
(79, '2024-10-28 05:29:43', 20, 800, 2, 2),
(80, '2024-10-28 05:30:00', 5, 200, 2, 2),
(81, '2024-10-28 05:31:09', 5, 200, 2, 2),
(82, '2024-10-28 05:33:13', 5, 200, 2, 2),
(83, '2024-10-28 05:33:29', 1, 40, 2, 2),
(84, '2024-10-28 05:33:36', 1, 40, 2, 2),
(85, '2024-10-28 05:36:25', 1, 40, 2, 2),
(86, '2024-10-28 05:37:48', 1, 40, 2, 2),
(87, '2024-10-28 05:38:54', 1, 40, 2, 2),
(88, '2024-10-28 05:39:24', 1, 40, 2, 2),
(89, '2024-10-28 05:39:37', 1, 40, 2, 2),
(90, '2024-10-28 05:46:25', 10, 400, 2, 8),
(91, '2024-10-28 05:48:39', 10, 400, 2, 8),
(92, '2024-10-28 06:32:53', 2, 80, 2, 2),
(93, '2024-10-28 07:05:24', 5, 200, 2, 2),
(94, '2024-10-28 07:13:32', 2, 80, 2, 2),
(95, '2024-10-28 07:15:30', 2, 80, 2, 2),
(96, '2024-10-28 07:15:49', 2, 80, 2, 2),
(97, '2024-10-28 07:17:08', 2, 80, 2, 2),
(98, '2024-10-28 07:18:46', 45, 2154.6, 2, 8),
(99, '2024-10-28 07:19:01', 15, 718.2, 2, 8),
(100, '2024-10-28 07:19:08', 15, 718.2, 2, 8),
(101, '2024-10-28 07:20:45', 15, 718.2, 2, 8),
(102, '2024-10-28 07:22:39', 15, 718.2, 2, 8),
(103, '2024-10-28 07:23:02', 6, 240, 2, 8),
(104, '2024-10-28 07:24:03', 6, 240, 2, 8),
(105, '2024-10-28 07:24:28', 6, 240, 2, 8),
(106, '2024-10-28 07:24:41', 6, 240, 2, 8),
(107, '2024-10-28 07:25:18', 6, 240, 2, 8),
(108, '2024-10-28 07:25:59', 6, 240, 2, 8),
(109, '2024-10-28 07:26:52', 6, 240, 2, 8),
(110, '2024-10-28 07:27:05', 6, 240, 2, 8),
(111, '2024-10-28 07:30:51', 6, 240, 2, 8),
(112, '2024-10-28 07:31:55', 6, 240, 2, 8),
(113, '2024-10-28 07:32:20', 6, 240, 2, 8),
(114, '2024-10-28 07:34:59', 6, 240, 2, 8),
(115, '2024-10-28 07:36:09', 6, 240, 2, 8),
(116, '2024-10-28 07:36:36', 6, 240, 2, 8),
(117, '2024-10-28 07:37:06', 6, 240, 2, 8),
(118, '2024-10-28 07:37:31', 6, 240, 2, 8),
(119, '2024-10-28 07:38:15', 6, 240, 2, 8),
(120, '2024-10-28 07:38:23', 6, 240, 2, 8),
(121, '2024-10-28 07:38:48', 6, 240, 2, 8),
(122, '2024-10-28 07:38:53', 6, 240, 2, 8),
(123, '2024-10-28 07:40:47', 6, 240, 2, 8),
(124, '2024-10-28 07:41:39', 6, 240, 2, 8),
(125, '2024-10-28 07:42:35', 6, 240, 2, 8),
(126, '2024-10-30 05:28:59', 5, 200, 2, 2),
(127, '2024-10-30 06:51:50', 5, 200, 2, 2),
(128, '2024-10-30 06:56:08', 300, 14364, 2, 2),
(129, '2024-10-30 07:07:42', 30, 1436.4, 2, 2),
(130, '2024-10-30 07:07:55', 30, 1436.4, 2, 2),
(131, '2024-10-30 07:27:56', 30, 1436.4, 2, 2),
(132, '2024-10-30 07:30:49', 30, 1436.4, 2, 8),
(133, '2024-10-30 07:35:32', 1, 40, 2, 2),
(134, '2024-10-30 07:37:21', 4, 160, 2, 2),
(135, '2024-10-30 07:37:42', 4, 160, 2, 2),
(136, '2024-10-30 07:40:06', 4, 160, 2, 2),
(137, '2024-10-30 07:40:11', 4, 160, 2, 2),
(138, '2024-10-30 07:42:38', 4, 160, 2, 2),
(139, '2024-10-30 07:43:25', 30, 1436.4, 2, 8),
(140, '2024-10-30 07:44:39', 30, 1436.4, 2, 8),
(141, '2024-10-30 07:45:29', 30, 1436.4, 2, 2),
(142, '2024-10-30 07:46:11', 6, 240, 2, 2),
(143, '2024-10-30 07:47:20', 34, 1596.4, 2, 2),
(144, '2024-10-30 07:54:10', 40, 1836.4, 2, 2);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Indices de la tabla `categoria_equipo`
--
ALTER TABLE `categoria_equipo`
  ADD PRIMARY KEY (`id_categoria_equipo`);

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id_cliente`);

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
  ADD KEY `id_venta` (`id_venta`);

--
-- Indices de la tabla `detalles_venta`
--
ALTER TABLE `detalles_venta`
  ADD PRIMARY KEY (`id_detalles_venta`),
  ADD KEY `id_menu` (`id_venta`),
  ADD KEY `id_producto` (`id_producto`),
  ADD KEY `id_sevicio` (`id_servicio`);

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
  ADD KEY `entrada_producto` (`id_producto`),
  ADD KEY `entrada_proveedor` (`id_proveedor`);

--
-- Indices de la tabla `equipo`
--
ALTER TABLE `equipo`
  ADD PRIMARY KEY (`id_equipo`),
  ADD KEY `id_categoria_equipo` (`id_categoria_equipo`),
  ADD KEY `id_status_equipo` (`id_status_equipo`);

--
-- Indices de la tabla `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id_menu`);

--
-- Indices de la tabla `preguntas_secretas`
--
ALTER TABLE `preguntas_secretas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pregunta_seguridad` (`id_pregunta`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`id_producto`),
  ADD KEY `id_categoria` (`id_categoria`);

--
-- Indices de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  ADD PRIMARY KEY (`id_proveedor`);

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
-- Indices de la tabla `status_equipo`
--
ALTER TABLE `status_equipo`
  ADD PRIMARY KEY (`id_status_equipo`);

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
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id_categoria` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `categoria_equipo`
--
ALTER TABLE `categoria_equipo`
  MODIFY `id_categoria_equipo` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id_cliente` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `detalles_menu`
--
ALTER TABLE `detalles_menu`
  MODIFY `id_detalles_menu` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `detalles_pago`
--
ALTER TABLE `detalles_pago`
  MODIFY `id_detalle_pago` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT de la tabla `detalles_venta`
--
ALTER TABLE `detalles_venta`
  MODIFY `id_detalles_venta` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT de la tabla `dolar`
--
ALTER TABLE `dolar`
  MODIFY `id_dolar` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `entrada`
--
ALTER TABLE `entrada`
  MODIFY `id_entrada` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `equipo`
--
ALTER TABLE `equipo`
  MODIFY `id_equipo` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `menu`
--
ALTER TABLE `menu`
  MODIFY `id_menu` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `preguntas_secretas`
--
ALTER TABLE `preguntas_secretas`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `id_producto` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  MODIFY `id_proveedor` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `rol`
--
ALTER TABLE `rol`
  MODIFY `id_rol` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `seguridad`
--
ALTER TABLE `seguridad`
  MODIFY `id_seguridad` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `status_equipo`
--
ALTER TABLE `status_equipo`
  MODIFY `id_status_equipo` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `venta`
--
ALTER TABLE `venta`
  MODIFY `id_venta` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=145;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `detalles_menu`
--
ALTER TABLE `detalles_menu`
  ADD CONSTRAINT `detalles_menu_ibfk_1` FOREIGN KEY (`id_producto`) REFERENCES `producto` (`id_producto`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detalles_menu_ibfk_2` FOREIGN KEY (`id_menu`) REFERENCES `menu` (`id_menu`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `detalles_pago`
--
ALTER TABLE `detalles_pago`
  ADD CONSTRAINT `detalles_pago_ibfk_1` FOREIGN KEY (`id_venta`) REFERENCES `venta` (`id_venta`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `detalles_venta`
--
ALTER TABLE `detalles_venta`
  ADD CONSTRAINT `detalles_venta_ibfk_2` FOREIGN KEY (`id_producto`) REFERENCES `producto` (`id_producto`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detalles_venta_ibfk_3` FOREIGN KEY (`id_venta`) REFERENCES `venta` (`id_venta`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detalles_venta_ibfk_5` FOREIGN KEY (`id_servicio`) REFERENCES `menu` (`id_menu`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `entrada`
--
ALTER TABLE `entrada`
  ADD CONSTRAINT `entrada_producto` FOREIGN KEY (`id_producto`) REFERENCES `producto` (`id_producto`),
  ADD CONSTRAINT `entrada_proveedor` FOREIGN KEY (`id_proveedor`) REFERENCES `proveedor` (`id_proveedor`);

--
-- Filtros para la tabla `equipo`
--
ALTER TABLE `equipo`
  ADD CONSTRAINT `id_categoria_equipo` FOREIGN KEY (`id_categoria_equipo`) REFERENCES `categoria_equipo` (`id_categoria_equipo`),
  ADD CONSTRAINT `id_status_equipo` FOREIGN KEY (`id_status_equipo`) REFERENCES `status_equipo` (`id_status_equipo`);

--
-- Filtros para la tabla `preguntas_secretas`
--
ALTER TABLE `preguntas_secretas`
  ADD CONSTRAINT `pregunta_seguridad` FOREIGN KEY (`id_pregunta`) REFERENCES `seguridad` (`id_seguridad`),
  ADD CONSTRAINT `preguntas_secretas_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `producto_categoria` FOREIGN KEY (`id_categoria`) REFERENCES `categoria` (`id_categoria`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `id_rol` FOREIGN KEY (`id_rol`) REFERENCES `rol` (`id_rol`),
  ADD CONSTRAINT `tipo_usuario` FOREIGN KEY (`id_rol`) REFERENCES `rol` (`id_rol`);

--
-- Filtros para la tabla `venta`
--
ALTER TABLE `venta`
  ADD CONSTRAINT `id_cliente` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`id_cliente`),
  ADD CONSTRAINT `venta_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
