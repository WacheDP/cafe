-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 03-12-2024 a las 01:23:11
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `cafedonbelen`
--
CREATE DATABASE IF NOT EXISTS `cafedonbelen` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `cafedonbelen`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `activos`
--

CREATE TABLE IF NOT EXISTS `activos` (
  `id` varchar(36) NOT NULL DEFAULT uuid(),
  `objeto` varchar(30) NOT NULL,
  `estado` varchar(15) NOT NULL DEFAULT 'En buen estado',
  `precio_unidad` float NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Truncar tablas antes de insertar `activos`
--

TRUNCATE TABLE `activos`;
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `almacenes`
--

CREATE TABLE IF NOT EXISTS `almacenes` (
  `id` varchar(36) NOT NULL DEFAULT uuid(),
  `sucursal` varchar(36) NOT NULL,
  `direccion` varchar(100) NOT NULL,
  `estado` varchar(15) NOT NULL DEFAULT 'En buen estado',
  PRIMARY KEY (`id`),
  KEY `sucursal` (`sucursal`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Truncar tablas antes de insertar `almacenes`
--

TRUNCATE TABLE `almacenes`;
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `almacen_activos`
--

CREATE TABLE IF NOT EXISTS `almacen_activos` (
  `id` varchar(36) NOT NULL DEFAULT uuid(),
  `objeto` varchar(36) NOT NULL,
  `almacen` varchar(36) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `fecha_adquisicion` date NOT NULL DEFAULT curdate(),
  PRIMARY KEY (`id`),
  KEY `objeto` (`objeto`),
  KEY `almacen` (`almacen`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Truncar tablas antes de insertar `almacen_activos`
--

TRUNCATE TABLE `almacen_activos`;
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `almacen_mercancia`
--

CREATE TABLE IF NOT EXISTS `almacen_mercancia` (
  `id` varchar(36) NOT NULL DEFAULT uuid(),
  `mercancia` varchar(36) NOT NULL,
  `almacen` varchar(36) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `fecha_adquisicion` date NOT NULL DEFAULT curdate(),
  PRIMARY KEY (`id`),
  KEY `mercancia` (`mercancia`),
  KEY `almacen` (`almacen`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Truncar tablas antes de insertar `almacen_mercancia`
--

TRUNCATE TABLE `almacen_mercancia`;
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contratos`
--

CREATE TABLE IF NOT EXISTS `contratos` (
  `id` varchar(36) NOT NULL DEFAULT uuid(),
  `cliente` varchar(50) NOT NULL,
  `fecha_inicio` date NOT NULL,
  `fecha_fin` date NOT NULL,
  `estado` varchar(15) NOT NULL DEFAULT 'Vigente',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Truncar tablas antes de insertar `contratos`
--

TRUNCATE TABLE `contratos`;
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cosecha_empleado`
--

CREATE TABLE IF NOT EXISTS `cosecha_empleado` (
  `id` varchar(36) NOT NULL DEFAULT uuid(),
  `trabajo` varchar(36) NOT NULL,
  `empleado` varchar(36) NOT NULL,
  `numero_sacos` float NOT NULL,
  PRIMARY KEY (`id`),
  KEY `trabajo` (`trabajo`),
  KEY `empleado` (`empleado`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Truncar tablas antes de insertar `cosecha_empleado`
--

TRUNCATE TABLE `cosecha_empleado`;
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalles_venta`
--

CREATE TABLE IF NOT EXISTS `detalles_venta` (
  `id` varchar(36) NOT NULL DEFAULT uuid(),
  `venta` varchar(36) NOT NULL,
  `producto` varchar(36) NOT NULL,
  `cantidad` int(11) NOT NULL DEFAULT 1,
  `monto` float NOT NULL,
  PRIMARY KEY (`id`),
  KEY `venta` (`venta`),
  KEY `producto` (`producto`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Truncar tablas antes de insertar `detalles_venta`
--

TRUNCATE TABLE `detalles_venta`;
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_mantenimiento`
--

CREATE TABLE IF NOT EXISTS `detalle_mantenimiento` (
  `id` varchar(36) NOT NULL DEFAULT uuid(),
  `trabajo` varchar(36) NOT NULL,
  `objeto` varchar(36) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `objeto` (`objeto`),
  KEY `trabajo` (`trabajo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Truncar tablas antes de insertar `detalle_mantenimiento`
--

TRUNCATE TABLE `detalle_mantenimiento`;
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleados`
--

CREATE TABLE IF NOT EXISTS `empleados` (
  `id` varchar(36) NOT NULL DEFAULT uuid(),
  `cedula` varchar(15) NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `sexo` varchar(1) NOT NULL,
  `nombre` varchar(12) NOT NULL,
  `apellido` varchar(12) NOT NULL,
  `estado` varchar(15) NOT NULL DEFAULT 'Contratado',
  PRIMARY KEY (`id`),
  UNIQUE KEY `cedula` (`cedula`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Truncar tablas antes de insertar `empleados`
--

TRUNCATE TABLE `empleados`;
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mantenimiento_empleado`
--

CREATE TABLE IF NOT EXISTS `mantenimiento_empleado` (
  `id` varchar(36) NOT NULL DEFAULT uuid(),
  `trabajo` varchar(36) NOT NULL,
  `empleado` varchar(36) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `trabajo` (`trabajo`),
  KEY `empleado` (`empleado`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Truncar tablas antes de insertar `mantenimiento_empleado`
--

TRUNCATE TABLE `mantenimiento_empleado`;
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mercancias`
--

CREATE TABLE IF NOT EXISTS `mercancias` (
  `id` varchar(36) NOT NULL DEFAULT uuid(),
  `producto` varchar(30) NOT NULL,
  `estado` varchar(15) NOT NULL DEFAULT 'En buen estado',
  `condicion` varchar(15) NOT NULL,
  `precio_unidad` float NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Truncar tablas antes de insertar `mercancias`
--

TRUNCATE TABLE `mercancias`;
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pagos`
--

CREATE TABLE IF NOT EXISTS `pagos` (
  `id` varchar(36) NOT NULL DEFAULT uuid(),
  `empleado` varchar(36) NOT NULL,
  `sueldo` float NOT NULL,
  `estado` varchar(15) NOT NULL DEFAULT 'Por pagar',
  PRIMARY KEY (`id`),
  KEY `empleado` (`empleado`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Truncar tablas antes de insertar `pagos`
--

TRUNCATE TABLE `pagos`;
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sucursales`
--

CREATE TABLE IF NOT EXISTS `sucursales` (
  `id` varchar(36) NOT NULL DEFAULT uuid(),
  `direccion` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Truncar tablas antes de insertar `sucursales`
--

TRUNCATE TABLE `sucursales`;
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `trabajos`
--

CREATE TABLE IF NOT EXISTS `trabajos` (
  `id` varchar(36) NOT NULL DEFAULT uuid(),
  `fecha_trabajo` date NOT NULL DEFAULT curdate(),
  `estado` varchar(15) NOT NULL DEFAULT 'En Proceso',
  `tipo` varchar(12) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Truncar tablas antes de insertar `trabajos`
--

TRUNCATE TABLE `trabajos`;
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE IF NOT EXISTS `ventas` (
  `id` varchar(36) NOT NULL DEFAULT uuid(),
  `cliente` varchar(36) NOT NULL,
  `fecha_compra` date NOT NULL DEFAULT curdate(),
  `monto_total` float NOT NULL,
  PRIMARY KEY (`id`),
  KEY `cliente` (`cliente`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Truncar tablas antes de insertar `ventas`
--

TRUNCATE TABLE `ventas`;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `almacenes`
--
ALTER TABLE `almacenes`
  ADD CONSTRAINT `almacenes_ibfk_1` FOREIGN KEY (`sucursal`) REFERENCES `sucursales` (`id`);

--
-- Filtros para la tabla `almacen_activos`
--
ALTER TABLE `almacen_activos`
  ADD CONSTRAINT `almacen_activos_ibfk_1` FOREIGN KEY (`objeto`) REFERENCES `activos` (`id`),
  ADD CONSTRAINT `almacen_activos_ibfk_2` FOREIGN KEY (`almacen`) REFERENCES `almacenes` (`id`);

--
-- Filtros para la tabla `almacen_mercancia`
--
ALTER TABLE `almacen_mercancia`
  ADD CONSTRAINT `almacen_mercancia_ibfk_1` FOREIGN KEY (`mercancia`) REFERENCES `mercancias` (`id`),
  ADD CONSTRAINT `almacen_mercancia_ibfk_2` FOREIGN KEY (`almacen`) REFERENCES `almacenes` (`id`);

--
-- Filtros para la tabla `cosecha_empleado`
--
ALTER TABLE `cosecha_empleado`
  ADD CONSTRAINT `cosecha_empleado_ibfk_1` FOREIGN KEY (`trabajo`) REFERENCES `trabajos` (`id`),
  ADD CONSTRAINT `cosecha_empleado_ibfk_2` FOREIGN KEY (`empleado`) REFERENCES `empleados` (`id`);

--
-- Filtros para la tabla `detalles_venta`
--
ALTER TABLE `detalles_venta`
  ADD CONSTRAINT `detalles_venta_ibfk_1` FOREIGN KEY (`venta`) REFERENCES `ventas` (`id`),
  ADD CONSTRAINT `detalles_venta_ibfk_2` FOREIGN KEY (`producto`) REFERENCES `almacen_mercancia` (`id`);

--
-- Filtros para la tabla `detalle_mantenimiento`
--
ALTER TABLE `detalle_mantenimiento`
  ADD CONSTRAINT `detalle_mantenimiento_ibfk_1` FOREIGN KEY (`objeto`) REFERENCES `activos` (`id`),
  ADD CONSTRAINT `detalle_mantenimiento_ibfk_2` FOREIGN KEY (`trabajo`) REFERENCES `trabajos` (`id`);

--
-- Filtros para la tabla `mantenimiento_empleado`
--
ALTER TABLE `mantenimiento_empleado`
  ADD CONSTRAINT `mantenimiento_empleado_ibfk_1` FOREIGN KEY (`trabajo`) REFERENCES `trabajos` (`id`),
  ADD CONSTRAINT `mantenimiento_empleado_ibfk_2` FOREIGN KEY (`empleado`) REFERENCES `empleados` (`id`);

--
-- Filtros para la tabla `pagos`
--
ALTER TABLE `pagos`
  ADD CONSTRAINT `pagos_ibfk_1` FOREIGN KEY (`empleado`) REFERENCES `empleados` (`id`);

--
-- Filtros para la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD CONSTRAINT `ventas_ibfk_1` FOREIGN KEY (`cliente`) REFERENCES `contratos` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
