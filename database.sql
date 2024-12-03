-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 03-12-2024 a las 16:44:08
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";
/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */
;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */
;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */
;
/*!40101 SET NAMES utf8mb4 */
;
--
-- Base de datos: `cafedonbelen`
--

-- --------------------------------------------------------
--
-- Estructura de tabla para la tabla `activos`
--

CREATE TABLE `activos` (
  `id` char(36) NOT NULL DEFAULT (UUID()),
  `objeto` varchar(30) NOT NULL,
  `estado` varchar(15) NOT NULL DEFAULT 'En buen estado',
  `precio_unidad` float NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci;
-- --------------------------------------------------------
--
-- Estructura de tabla para la tabla `almacenes`
--

CREATE TABLE `almacenes` (
  `id` char(36) NOT NULL DEFAULT (UUID()),
  `sucursal` varchar(36) NOT NULL,
  `direccion` varchar(100) NOT NULL,
  `estado` varchar(15) NOT NULL DEFAULT 'En buen estado'
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci;
-- --------------------------------------------------------
--
-- Estructura de tabla para la tabla `almacen_activos`
--

CREATE TABLE `almacen_activos` (
  `id` char(36) NOT NULL DEFAULT (UUID()),
  `objeto` varchar(36) NOT NULL,
  `almacen` varchar(36) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `fecha_adquisicion` date NOT NULL DEFAULT curdate()
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci;
-- --------------------------------------------------------
--
-- Estructura de tabla para la tabla `almacen_mercancia`
--

CREATE TABLE `almacen_mercancia` (
  `id` char(36) NOT NULL DEFAULT (UUID()),
  `mercancia` varchar(36) NOT NULL,
  `almacen` varchar(36) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `fecha_adquisicion` date NOT NULL DEFAULT curdate()
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci;
-- --------------------------------------------------------
--
-- Estructura de tabla para la tabla `compañias`
--

CREATE TABLE `compañias` (
  `id` char(36) NOT NULL DEFAULT (UUID()),
  `usuario` varchar(36) NOT NULL,
  `contrato` varchar(36) NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci;
-- --------------------------------------------------------
--
-- Estructura de tabla para la tabla `contratos`
--

CREATE TABLE `contratos` (
  `id` char(36) NOT NULL DEFAULT (UUID()),
  `cliente` varchar(50) NOT NULL,
  `fecha_inicio` date NOT NULL,
  `fecha_fin` date NOT NULL,
  `estado` varchar(15) NOT NULL DEFAULT 'Vigente'
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci;
-- --------------------------------------------------------
--
-- Estructura de tabla para la tabla `cosecha_empleado`
--

CREATE TABLE `cosecha_empleado` (
  `id` char(36) NOT NULL DEFAULT (UUID()),
  `trabajo` varchar(36) NOT NULL,
  `empleado` varchar(36) NOT NULL,
  `numero_sacos` float NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci;
-- --------------------------------------------------------
--
-- Estructura de tabla para la tabla `detalles_venta`
--

CREATE TABLE `detalles_venta` (
  `id` char(36) NOT NULL DEFAULT (UUID()),
  `venta` varchar(36) NOT NULL,
  `producto` varchar(36) NOT NULL,
  `cantidad` int(11) NOT NULL DEFAULT 1,
  `monto` float NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci;
-- --------------------------------------------------------
--
-- Estructura de tabla para la tabla `detalle_mantenimiento`
--

CREATE TABLE `detalle_mantenimiento` (
  `id` char(36) NOT NULL DEFAULT (UUID()),
  `trabajo` varchar(36) NOT NULL,
  `objeto` varchar(36) NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci;
-- --------------------------------------------------------
--
-- Estructura de tabla para la tabla `empleados`
--

CREATE TABLE `empleados` (
  `id` char(36) NOT NULL DEFAULT (UUID()),
  `cedula` varchar(15) NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `sexo` varchar(1) NOT NULL,
  `nombre` varchar(12) NOT NULL,
  `apellido` varchar(12) NOT NULL,
  `estado` varchar(15) NOT NULL DEFAULT 'Contratado'
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci;
-- --------------------------------------------------------
--
-- Estructura de tabla para la tabla `mantenimiento_empleado`
--

CREATE TABLE `mantenimiento_empleado` (
  `id` char(36) NOT NULL DEFAULT (UUID()),
  `trabajo` varchar(36) NOT NULL,
  `empleado` varchar(36) NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci;
-- --------------------------------------------------------
--
-- Estructura de tabla para la tabla `mercancias`
--

CREATE TABLE `mercancias` (
  `id` char(36) NOT NULL DEFAULT (UUID()),
  `producto` varchar(30) NOT NULL,
  `estado` varchar(15) NOT NULL DEFAULT 'En buen estado',
  `condicion` varchar(15) NOT NULL,
  `precio_unidad` float NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci;
-- --------------------------------------------------------
--
-- Estructura de tabla para la tabla `pagos`
--

CREATE TABLE `pagos` (
  `id` char(36) NOT NULL DEFAULT (UUID()),
  `empleado` varchar(36) NOT NULL,
  `sueldo` float NOT NULL,
  `estado` varchar(15) NOT NULL DEFAULT 'Por pagar'
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci;
-- --------------------------------------------------------
--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` char(36) NOT NULL DEFAULT (UUID()),
  `rol` varchar(15) NOT NULL,
  `permisos` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`permisos`))
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci;
-- --------------------------------------------------------
--
-- Estructura de tabla para la tabla `sucursales`
--

CREATE TABLE `sucursales` (
  `id` char(36) NOT NULL DEFAULT (UUID()),
  `direccion` varchar(100) NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci;
-- --------------------------------------------------------
--
-- Estructura de tabla para la tabla `trabajos`
--

CREATE TABLE `trabajos` (
  `id` char(36) NOT NULL DEFAULT (UUID()),
  `fecha_trabajo` date NOT NULL DEFAULT curdate(),
  `estado` varchar(15) NOT NULL DEFAULT 'En Proceso',
  `tipo` varchar(12) NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci;
-- --------------------------------------------------------
--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` char(36) NOT NULL DEFAULT (UUID()),
  `rol` varchar(36) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `contraseña` varchar(1024) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `avatar` varchar(50) NOT NULL,
  `estado` varchar(15) NOT NULL DEFAULT 'Habilitado'
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci;
-- --------------------------------------------------------
--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `id` char(36) NOT NULL DEFAULT (UUID()),
  `cliente` varchar(36) NOT NULL,
  `fecha_compra` date NOT NULL DEFAULT curdate(),
  `monto_total` float NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci;
--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `activos`
--
ALTER TABLE `activos`
ADD PRIMARY KEY (`id`);
--
-- Indices de la tabla `almacenes`
--
ALTER TABLE `almacenes`
ADD PRIMARY KEY (`id`),
  ADD KEY `sucursal` (`sucursal`);
--
-- Indices de la tabla `almacen_activos`
--
ALTER TABLE `almacen_activos`
ADD PRIMARY KEY (`id`),
  ADD KEY `objeto` (`objeto`),
  ADD KEY `almacen` (`almacen`);
--
-- Indices de la tabla `almacen_mercancia`
--
ALTER TABLE `almacen_mercancia`
ADD PRIMARY KEY (`id`),
  ADD KEY `mercancia` (`mercancia`),
  ADD KEY `almacen` (`almacen`);
--
-- Indices de la tabla `compañias`
--
ALTER TABLE `compañias`
ADD PRIMARY KEY (`id`),
  ADD KEY `usuario` (`usuario`),
  ADD KEY `contrato` (`contrato`);
--
-- Indices de la tabla `contratos`
--
ALTER TABLE `contratos`
ADD PRIMARY KEY (`id`);
--
-- Indices de la tabla `cosecha_empleado`
--
ALTER TABLE `cosecha_empleado`
ADD PRIMARY KEY (`id`),
  ADD KEY `trabajo` (`trabajo`),
  ADD KEY `empleado` (`empleado`);
--
-- Indices de la tabla `detalles_venta`
--
ALTER TABLE `detalles_venta`
ADD PRIMARY KEY (`id`),
  ADD KEY `venta` (`venta`),
  ADD KEY `producto` (`producto`);
--
-- Indices de la tabla `detalle_mantenimiento`
--
ALTER TABLE `detalle_mantenimiento`
ADD PRIMARY KEY (`id`),
  ADD KEY `objeto` (`objeto`),
  ADD KEY `trabajo` (`trabajo`);
--
-- Indices de la tabla `empleados`
--
ALTER TABLE `empleados`
ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cedula` (`cedula`);
--
-- Indices de la tabla `mantenimiento_empleado`
--
ALTER TABLE `mantenimiento_empleado`
ADD PRIMARY KEY (`id`),
  ADD KEY `trabajo` (`trabajo`),
  ADD KEY `empleado` (`empleado`);
--
-- Indices de la tabla `mercancias`
--
ALTER TABLE `mercancias`
ADD PRIMARY KEY (`id`);
--
-- Indices de la tabla `pagos`
--
ALTER TABLE `pagos`
ADD PRIMARY KEY (`id`),
  ADD KEY `empleado` (`empleado`);
--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `rol` (`rol`);
--
-- Indices de la tabla `sucursales`
--
ALTER TABLE `sucursales`
ADD PRIMARY KEY (`id`);
--
-- Indices de la tabla `trabajos`
--
ALTER TABLE `trabajos`
ADD PRIMARY KEY (`id`);
--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nombre` (`nombre`),
  ADD UNIQUE KEY `correo` (`correo`),
  ADD KEY `rol` (`rol`);
--
-- Indices de la tabla `ventas`
--
ALTER TABLE `ventas`
ADD PRIMARY KEY (`id`),
  ADD KEY `cliente` (`cliente`);
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
-- Filtros para la tabla `compañias`
--
ALTER TABLE `compañias`
ADD CONSTRAINT `compañias_ibfk_1` FOREIGN KEY (`usuario`) REFERENCES `usuarios` (`id`),
  ADD CONSTRAINT `compañias_ibfk_2` FOREIGN KEY (`contrato`) REFERENCES `contratos` (`id`);
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
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`rol`) REFERENCES `roles` (`id`);
--
-- Filtros para la tabla `ventas`
--
ALTER TABLE `ventas`
ADD CONSTRAINT `ventas_ibfk_1` FOREIGN KEY (`cliente`) REFERENCES `contratos` (`id`);
COMMIT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */
;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */
;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */
;