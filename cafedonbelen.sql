-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 04-12-2024 a las 19:29:15
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
  `id` varchar(36) NOT NULL DEFAULT uuid(),
  `objeto` varchar(30) NOT NULL,
  `estado` varchar(15) NOT NULL DEFAULT 'En buen estado',
  `precio_unidad` float NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci;
-- --------------------------------------------------------
--
-- Estructura de tabla para la tabla `almacenes`
--

CREATE TABLE `almacenes` (
  `id` varchar(36) NOT NULL DEFAULT uuid(),
  `sucursal` varchar(36) NOT NULL,
  `direccion` varchar(100) NOT NULL,
  `estado` varchar(15) NOT NULL DEFAULT 'En buen estado'
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci;
-- --------------------------------------------------------
--
-- Estructura de tabla para la tabla `almacen_activos`
--

CREATE TABLE `almacen_activos` (
  `id` varchar(36) NOT NULL DEFAULT uuid(),
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
  `id` varchar(36) NOT NULL DEFAULT uuid(),
  `mercancia` varchar(36) NOT NULL,
  `almacen` varchar(36) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `fecha_adquisicion` date NOT NULL DEFAULT curdate(),
  `monto` float NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci;
-- --------------------------------------------------------
--
-- Estructura de tabla para la tabla `compañias`
--

CREATE TABLE `compañias` (
  `id` varchar(36) NOT NULL DEFAULT uuid(),
  `usuario` varchar(36) NOT NULL,
  `contrato` varchar(36) NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci;
-- --------------------------------------------------------
--
-- Estructura de tabla para la tabla `contratos`
--

CREATE TABLE `contratos` (
  `id` varchar(36) NOT NULL DEFAULT uuid(),
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
  `id` varchar(36) NOT NULL DEFAULT uuid(),
  `trabajo` varchar(36) NOT NULL,
  `empleado` varchar(36) NOT NULL,
  `numero_sacos` float NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci;
-- --------------------------------------------------------
--
-- Estructura de tabla para la tabla `detalle_mantenimiento`
--

CREATE TABLE `detalle_mantenimiento` (
  `id` varchar(36) NOT NULL DEFAULT uuid(),
  `trabajo` varchar(36) NOT NULL,
  `objeto` varchar(36) NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci;
-- --------------------------------------------------------
--
-- Estructura de tabla para la tabla `detalle_pedido`
--

CREATE TABLE `detalle_pedido` (
  `id` varchar(36) NOT NULL DEFAULT uuid(),
  `pedido` varchar(36) NOT NULL,
  `cantidad` int(11) NOT NULL DEFAULT 1,
  `monto` float NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci;
-- --------------------------------------------------------
--
-- Estructura de tabla para la tabla `distribuidores`
--

CREATE TABLE `distribuidores` (
  `id` varchar(36) NOT NULL DEFAULT uuid(),
  `empleado` varchar(36) NOT NULL,
  `usuario` varchar(36) NOT NULL,
  `comision` float NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci;
-- --------------------------------------------------------
--
-- Estructura de tabla para la tabla `empleados`
--

CREATE TABLE `empleados` (
  `id` varchar(36) NOT NULL DEFAULT uuid(),
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
  `id` varchar(36) NOT NULL DEFAULT uuid(),
  `trabajo` varchar(36) NOT NULL,
  `empleado` varchar(36) NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci;
-- --------------------------------------------------------
--
-- Estructura de tabla para la tabla `mercancias`
--

CREATE TABLE `mercancias` (
  `id` varchar(36) NOT NULL DEFAULT uuid(),
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
  `id` varchar(36) NOT NULL DEFAULT uuid(),
  `empleado` varchar(36) NOT NULL,
  `sueldo` float NOT NULL,
  `estado` varchar(15) NOT NULL DEFAULT 'Por pagar'
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci;
-- --------------------------------------------------------
--
-- Estructura de tabla para la tabla `pedidos`
--

CREATE TABLE `pedidos` (
  `id` varchar(36) NOT NULL DEFAULT uuid(),
  `cliente` varchar(36) NOT NULL,
  `distribuidor` varchar(36) NOT NULL,
  `destino` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `fecha_pedido` date NOT NULL DEFAULT curdate(),
  `monto` float NOT NULL,
  `estado` varchar(15) NOT NULL DEFAULT 'Pendiente'
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci;
-- --------------------------------------------------------
--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` varchar(36) NOT NULL DEFAULT uuid(),
  `rol` varchar(15) NOT NULL,
  `permisos` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`permisos`))
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci;
--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `rol`, `permisos`)
VALUES (
    '92b84cff-b254-11ef-96b5-84a93ea1a4c5',
    'Distribuidor',
    NULL
  ),
  (
    'b7ce58d1-b19c-11ef-96b5-84a93ea1a4c5',
    'Administrador',
    NULL
  ),
  (
    'b7d0736c-b19c-11ef-96b5-84a93ea1a4c5',
    'Cliente',
    NULL
  );
-- --------------------------------------------------------
--
-- Estructura de tabla para la tabla `sucursales`
--

CREATE TABLE `sucursales` (
  `id` varchar(36) NOT NULL DEFAULT uuid(),
  `direccion` varchar(100) NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci;
-- --------------------------------------------------------
--
-- Estructura de tabla para la tabla `trabajos`
--

CREATE TABLE `trabajos` (
  `id` varchar(36) NOT NULL DEFAULT uuid(),
  `fecha_trabajo` date NOT NULL DEFAULT curdate(),
  `estado` varchar(15) NOT NULL DEFAULT 'En Proceso',
  `tipo` varchar(12) NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci;
-- --------------------------------------------------------
--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` varchar(36) NOT NULL DEFAULT uuid(),
  `rol` varchar(36) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `contraseña` varchar(1024) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `avatar` varchar(50) NOT NULL DEFAULT 'STAND.webp',
  `estado` varchar(15) NOT NULL DEFAULT 'Habilitado'
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci;
--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (
    `id`,
    `rol`,
    `nombre`,
    `contraseña`,
    `correo`,
    `avatar`,
    `estado`
  )
VALUES (
    '01204c2a-b19e-11ef-96b5-84a93ea1a4c5',
    'b7ce58d1-b19c-11ef-96b5-84a93ea1a4c5',
    'DavidP',
    '$2y$10$StSylAhzPaCxlVqO8R8l6..0T4XfpHSMtIHrS6FG9U8nxAyFZiqku',
    'davidxparra0608@gmail.com',
    'STAND.webp',
    'Habilitado'
  ),
  (
    'dffefe2e-b19d-11ef-96b5-84a93ea1a4c5',
    'b7ce58d1-b19c-11ef-96b5-84a93ea1a4c5',
    'WacheDP',
    '$2y$10$7XA/tb1kljcNxuLGTj0yuOp1dZSfum.VwlhEaHpkI3pDJuX/FubaG',
    'wacheparra21@gmail.com',
    'STAND.webp',
    'Habilitado'
  );
-- --------------------------------------------------------
--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `id` varchar(36) NOT NULL DEFAULT uuid(),
  `pedido` varchar(36) NOT NULL,
  `fecha_compra` date NOT NULL,
  `monto` float NOT NULL
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
-- Indices de la tabla `detalle_mantenimiento`
--
ALTER TABLE `detalle_mantenimiento`
ADD PRIMARY KEY (`id`),
  ADD KEY `objeto` (`objeto`),
  ADD KEY `trabajo` (`trabajo`);
--
-- Indices de la tabla `detalle_pedido`
--
ALTER TABLE `detalle_pedido`
ADD PRIMARY KEY (`id`),
  ADD KEY `pedido` (`pedido`);
--
-- Indices de la tabla `distribuidores`
--
ALTER TABLE `distribuidores`
ADD PRIMARY KEY (`id`),
  ADD KEY `empleado` (`empleado`),
  ADD KEY `usuario` (`usuario`);
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
-- Indices de la tabla `pedidos`
--
ALTER TABLE `pedidos`
ADD PRIMARY KEY (`id`),
  ADD KEY `cliente` (`cliente`),
  ADD KEY `distribuidor` (`distribuidor`);
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
  ADD KEY `pedido` (`pedido`);
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
-- Filtros para la tabla `detalle_mantenimiento`
--
ALTER TABLE `detalle_mantenimiento`
ADD CONSTRAINT `detalle_mantenimiento_ibfk_1` FOREIGN KEY (`objeto`) REFERENCES `activos` (`id`),
  ADD CONSTRAINT `detalle_mantenimiento_ibfk_2` FOREIGN KEY (`trabajo`) REFERENCES `trabajos` (`id`);
--
-- Filtros para la tabla `detalle_pedido`
--
ALTER TABLE `detalle_pedido`
ADD CONSTRAINT `detalle_pedido_ibfk_1` FOREIGN KEY (`pedido`) REFERENCES `pedidos` (`id`);
--
-- Filtros para la tabla `distribuidores`
--
ALTER TABLE `distribuidores`
ADD CONSTRAINT `distribuidores_ibfk_1` FOREIGN KEY (`empleado`) REFERENCES `empleados` (`id`),
  ADD CONSTRAINT `distribuidores_ibfk_2` FOREIGN KEY (`usuario`) REFERENCES `usuarios` (`id`);
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
-- Filtros para la tabla `pedidos`
--
ALTER TABLE `pedidos`
ADD CONSTRAINT `pedidos_ibfk_1` FOREIGN KEY (`cliente`) REFERENCES `compañias` (`id`),
  ADD CONSTRAINT `pedidos_ibfk_2` FOREIGN KEY (`distribuidor`) REFERENCES `distribuidores` (`id`);
--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`rol`) REFERENCES `roles` (`id`);
--
-- Filtros para la tabla `ventas`
--
ALTER TABLE `ventas`
ADD CONSTRAINT `ventas_ibfk_1` FOREIGN KEY (`pedido`) REFERENCES `pedidos` (`id`);
COMMIT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */
;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */
;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */
;