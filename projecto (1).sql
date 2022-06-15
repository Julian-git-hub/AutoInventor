-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 18-05-2022 a las 22:58:56
-- Versión del servidor: 10.4.18-MariaDB
-- Versión de PHP: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `projecto`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `forma_de_pago`
--

CREATE TABLE `forma_de_pago` (
  `ID_formapago` int(10) NOT NULL,
  `Descripcion` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `forma_de_pago`
--

INSERT INTO `forma_de_pago` (`ID_formapago`, `Descripcion`) VALUES
(1, 'Tarjeta'),
(2, 'Efectivo'),
(3, 'Nequi');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marca`
--

CREATE TABLE `marca` (
  `ID_marca` int(10) NOT NULL,
  `Modelo` varchar(45) NOT NULL,
  `Descripcion` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `marca`
--

INSERT INTO `marca` (`ID_marca`, `Modelo`, `Descripcion`) VALUES
(1, 'Chevrolet', 'Spark '),
(2, 'Toyota', 'Corolla'),
(3, 'Nissan', 'GT- R');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modulos`
--

CREATE TABLE `modulos` (
  `ID_modulos` int(10) NOT NULL,
  `Descripcion` varchar(45) DEFAULT NULL,
  `ID_permisos` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `modulos`
--

INSERT INTO `modulos` (`ID_modulos`, `Descripcion`, `ID_permisos`) VALUES
(1, 'Resivo', 1),
(2, 'Devolucion', 3),
(3, 'Facturacion', 4),
(4, 'Inventario', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modulos_has_tipo_terceros`
--

CREATE TABLE `modulos_has_tipo_terceros` (
  `modulos_ID_modulos` int(10) DEFAULT NULL,
  `tipo_terceros_ID_tipo_terceros` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `modulos_has_tipo_terceros`
--

INSERT INTO `modulos_has_tipo_terceros` (`modulos_ID_modulos`, `tipo_terceros_ID_tipo_terceros`) VALUES
(1, 4),
(2, 4),
(3, 4),
(4, 4),
(2, 4),
(4, 3),
(4, 1),
(4, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `movimiento_cabecera`
--

CREATE TABLE `movimiento_cabecera` (
  `ID_movcabecera` int(10) NOT NULL,
  `Fecha` date NOT NULL,
  `Num_documento` int(10) DEFAULT NULL,
  `ID_terceros` int(10) DEFAULT NULL,
  `ID_formapago` int(10) DEFAULT NULL,
  `ID_tipodocumento` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `movimiento_cabecera`
--

INSERT INTO `movimiento_cabecera` (`ID_movcabecera`, `Fecha`, `Num_documento`, `ID_terceros`, `ID_formapago`, `ID_tipodocumento`) VALUES
(1, '2021-02-02', 1, 2, 1, 2),
(2, '0000-00-00', 2, 1, 2, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `movimiento_detalle`
--

CREATE TABLE `movimiento_detalle` (
  `ID_movdetalle` int(10) NOT NULL,
  `Cantidad` int(10) NOT NULL,
  `descuento` double NOT NULL,
  `Precio_unitario` double NOT NULL,
  `Precio_total` double NOT NULL,
  `movimiento_cabecera_ID_movcabecera` int(10) DEFAULT NULL,
  `producto_ID_producto` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `movimiento_detalle`
--

INSERT INTO `movimiento_detalle` (`ID_movdetalle`, `Cantidad`, `descuento`, `Precio_unitario`, `Precio_total`, `movimiento_cabecera_ID_movcabecera`, `producto_ID_producto`) VALUES
(5, 2, 0, 1000, 3000, 1, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permisos`
--

CREATE TABLE `permisos` (
  `ID_permisos` int(10) NOT NULL,
  `Descripcion` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `permisos`
--

INSERT INTO `permisos` (`ID_permisos`, `Descripcion`) VALUES
(1, 'Crear'),
(2, 'Eliminar'),
(3, 'Modificar'),
(4, 'Consultar');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `ID_producto` int(10) NOT NULL,
  `Nombre` varchar(45) DEFAULT NULL,
  `Descripcion` text DEFAULT NULL,
  `Costo_producto` int(10) NOT NULL,
  `ID_marca` int(10) DEFAULT NULL,
  `ID_unidadmedida` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`ID_producto`, `Nombre`, `Descripcion`, `Costo_producto`, `ID_marca`, `ID_unidadmedida`) VALUES
(1, 'Capo', 'fibra de vidrio', 150000, 1, 2),
(2, 'Motor', 'V8', 1520000, 2, 2),
(3, 'Espejos', 'fibra de vidrio', 180000, 3, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `resumen_inventario`
--

CREATE TABLE `resumen_inventario` (
  `ID_resumen_inventario` int(10) NOT NULL,
  `Entrada` int(10) DEFAULT NULL,
  `Salida` int(10) DEFAULT NULL,
  `Saldo` int(10) DEFAULT NULL,
  `producto_ID_producto` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `resumen_inventario`
--

INSERT INTO `resumen_inventario` (`ID_resumen_inventario`, `Entrada`, `Salida`, `Saldo`, `producto_ID_producto`) VALUES
(1, 2, 1, 380000, 1),
(2, 2, 2, 1850000, 2),
(3, 3, 0, 1900000, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `terceros`
--

CREATE TABLE `terceros` (
  `ID_terceros` int(10) NOT NULL,
  `Nombre` varchar(45) DEFAULT NULL,
  `Apellidos` varchar(45) DEFAULT NULL,
  `Direccion` varchar(45) DEFAULT NULL,
  `Correo` varchar(45) DEFAULT NULL,
  `Telefono` int(10) DEFAULT NULL,
  `Identificacion` int(10) NOT NULL,
  `Razon_Social` text NOT NULL,
  `Username` varchar(45) NOT NULL,
  `Password` varchar(45) NOT NULL,
  `ID_tipo_Documento` int(10) DEFAULT NULL,
  `ID_tipo_terceros` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `terceros`
--

INSERT INTO `terceros` (`ID_terceros`, `Nombre`, `Apellidos`, `Direccion`, `Correo`, `Telefono`, `Identificacion`, `Razon_Social`, `Username`, `Password`, `ID_tipo_Documento`, `ID_tipo_terceros`) VALUES
(1, 'Cristian', 'Chacon', 'cll 1000', 'Chacon@gmail.com', 322399, 1033809, 'natural', 'chacon10', 'cha10', 1, 4),
(2, 'Cristian', 'Rojas', 'cll 1111', 'Rojas@gmail.com', 322445, 1022852, 'natural', 'rojascr', 'rojas10', 1, 1),
(3, 'Julian', 'Cruz', 'cll 1222', 'Julian@gmail.com', 322888, 1022411, 'natural', 'cruz15', 'cruz05', 3, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_de_documento`
--

CREATE TABLE `tipo_de_documento` (
  `ID_tipo_Documento` int(10) NOT NULL,
  `Descripcion` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tipo_de_documento`
--

INSERT INTO `tipo_de_documento` (`ID_tipo_Documento`, `Descripcion`) VALUES
(1, 'Cedula de Ciudadania'),
(2, 'NIT'),
(3, 'Pasaporte');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_documento_con`
--

CREATE TABLE `tipo_documento_con` (
  `ID_tipodocumento` int(10) NOT NULL,
  `Descripcion` text NOT NULL,
  `ID_tipomovimiento` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tipo_documento_con`
--

INSERT INTO `tipo_documento_con` (`ID_tipodocumento`, `Descripcion`, `ID_tipomovimiento`) VALUES
(1, 'Entrada', 1),
(2, 'Salida', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_movimiento`
--

CREATE TABLE `tipo_movimiento` (
  `ID_tipomovimiento` int(10) NOT NULL,
  `Descripcion` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tipo_movimiento`
--

INSERT INTO `tipo_movimiento` (`ID_tipomovimiento`, `Descripcion`) VALUES
(1, 'Compra'),
(2, 'Venta'),
(3, 'Obsequio'),
(4, 'Merma'),
(5, 'Daños'),
(6, 'ajuste de inventario');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_terceros`
--

CREATE TABLE `tipo_terceros` (
  `ID_tipo_terceros` int(10) NOT NULL,
  `Descripcion` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tipo_terceros`
--

INSERT INTO `tipo_terceros` (`ID_tipo_terceros`, `Descripcion`) VALUES
(1, 'Administrador'),
(2, 'Empleado'),
(3, 'Gerente'),
(4, 'Cliente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `unidad_medida`
--

CREATE TABLE `unidad_medida` (
  `ID_unidadmedida` int(10) NOT NULL,
  `tipo_UND` varchar(45) NOT NULL,
  `descripcion` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `unidad_medida`
--

INSERT INTO `unidad_medida` (`ID_unidadmedida`, `tipo_UND`, `descripcion`) VALUES
(1, 'duo', 'Repuestos'),
(2, 'Trio', 'Repuestos'),
(3, 'sixpack', 'Repuestos'),
(4, 'kit', 'Repuestos');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `forma_de_pago`
--
ALTER TABLE `forma_de_pago`
  ADD PRIMARY KEY (`ID_formapago`);

--
-- Indices de la tabla `marca`
--
ALTER TABLE `marca`
  ADD PRIMARY KEY (`ID_marca`);

--
-- Indices de la tabla `modulos`
--
ALTER TABLE `modulos`
  ADD PRIMARY KEY (`ID_modulos`),
  ADD KEY `fk_permisos_modulos` (`ID_permisos`);

--
-- Indices de la tabla `modulos_has_tipo_terceros`
--
ALTER TABLE `modulos_has_tipo_terceros`
  ADD KEY `fk_modulos_moduloshasterceros` (`modulos_ID_modulos`),
  ADD KEY `fk_tipoterceros_moduloshasterceros` (`tipo_terceros_ID_tipo_terceros`);

--
-- Indices de la tabla `movimiento_cabecera`
--
ALTER TABLE `movimiento_cabecera`
  ADD PRIMARY KEY (`ID_movcabecera`),
  ADD UNIQUE KEY `Num_documento` (`Num_documento`),
  ADD KEY `fk_terceros_movcabecera` (`ID_terceros`),
  ADD KEY `fk_formapago_movcabecera` (`ID_formapago`),
  ADD KEY `fk_tipodocumentocon_movcabecera` (`ID_tipodocumento`);

--
-- Indices de la tabla `movimiento_detalle`
--
ALTER TABLE `movimiento_detalle`
  ADD PRIMARY KEY (`ID_movdetalle`),
  ADD KEY `fk_movcabecera_movdetalle` (`movimiento_cabecera_ID_movcabecera`),
  ADD KEY `fk_producto_movdetalle` (`producto_ID_producto`);

--
-- Indices de la tabla `permisos`
--
ALTER TABLE `permisos`
  ADD PRIMARY KEY (`ID_permisos`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`ID_producto`),
  ADD KEY `fk_marca_producto` (`ID_marca`),
  ADD KEY `fk_unidadmedida_producto` (`ID_unidadmedida`);

--
-- Indices de la tabla `resumen_inventario`
--
ALTER TABLE `resumen_inventario`
  ADD PRIMARY KEY (`ID_resumen_inventario`),
  ADD KEY `fk_producto_resumeninventario` (`producto_ID_producto`);

--
-- Indices de la tabla `terceros`
--
ALTER TABLE `terceros`
  ADD PRIMARY KEY (`ID_terceros`),
  ADD KEY `fk_tipodocumento_terceros` (`ID_tipo_Documento`),
  ADD KEY `fk_tipoterceros_terceros` (`ID_tipo_terceros`);

--
-- Indices de la tabla `tipo_de_documento`
--
ALTER TABLE `tipo_de_documento`
  ADD PRIMARY KEY (`ID_tipo_Documento`);

--
-- Indices de la tabla `tipo_documento_con`
--
ALTER TABLE `tipo_documento_con`
  ADD PRIMARY KEY (`ID_tipodocumento`),
  ADD KEY `fk_tipomovi_tipodocumentocon` (`ID_tipomovimiento`);

--
-- Indices de la tabla `tipo_movimiento`
--
ALTER TABLE `tipo_movimiento`
  ADD PRIMARY KEY (`ID_tipomovimiento`);

--
-- Indices de la tabla `tipo_terceros`
--
ALTER TABLE `tipo_terceros`
  ADD PRIMARY KEY (`ID_tipo_terceros`);

--
-- Indices de la tabla `unidad_medida`
--
ALTER TABLE `unidad_medida`
  ADD PRIMARY KEY (`ID_unidadmedida`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `forma_de_pago`
--
ALTER TABLE `forma_de_pago`
  MODIFY `ID_formapago` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `marca`
--
ALTER TABLE `marca`
  MODIFY `ID_marca` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT de la tabla `modulos`
--
ALTER TABLE `modulos`
  MODIFY `ID_modulos` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `movimiento_cabecera`
--
ALTER TABLE `movimiento_cabecera`
  MODIFY `ID_movcabecera` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `movimiento_detalle`
--
ALTER TABLE `movimiento_detalle`
  MODIFY `ID_movdetalle` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `permisos`
--
ALTER TABLE `permisos`
  MODIFY `ID_permisos` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `ID_producto` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `resumen_inventario`
--
ALTER TABLE `resumen_inventario`
  MODIFY `ID_resumen_inventario` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `terceros`
--
ALTER TABLE `terceros`
  MODIFY `ID_terceros` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `tipo_de_documento`
--
ALTER TABLE `tipo_de_documento`
  MODIFY `ID_tipo_Documento` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `tipo_documento_con`
--
ALTER TABLE `tipo_documento_con`
  MODIFY `ID_tipodocumento` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `tipo_movimiento`
--
ALTER TABLE `tipo_movimiento`
  MODIFY `ID_tipomovimiento` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `tipo_terceros`
--
ALTER TABLE `tipo_terceros`
  MODIFY `ID_tipo_terceros` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `unidad_medida`
--
ALTER TABLE `unidad_medida`
  MODIFY `ID_unidadmedida` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `modulos`
--
ALTER TABLE `modulos`
  ADD CONSTRAINT `fk_permisos_modulos` FOREIGN KEY (`ID_permisos`) REFERENCES `permisos` (`ID_permisos`);

--
-- Filtros para la tabla `modulos_has_tipo_terceros`
--
ALTER TABLE `modulos_has_tipo_terceros`
  ADD CONSTRAINT `fk_modulos_moduloshasterceros` FOREIGN KEY (`modulos_ID_modulos`) REFERENCES `modulos` (`ID_modulos`),
  ADD CONSTRAINT `fk_tipoterceros_moduloshasterceros` FOREIGN KEY (`tipo_terceros_ID_tipo_terceros`) REFERENCES `tipo_terceros` (`ID_tipo_terceros`);

--
-- Filtros para la tabla `movimiento_cabecera`
--
ALTER TABLE `movimiento_cabecera`
  ADD CONSTRAINT `fk_formapago_movcabecera` FOREIGN KEY (`ID_formapago`) REFERENCES `forma_de_pago` (`ID_formapago`),
  ADD CONSTRAINT `fk_terceros_movcabecera` FOREIGN KEY (`ID_terceros`) REFERENCES `terceros` (`ID_terceros`),
  ADD CONSTRAINT `fk_tipodocumentocon_movcabecera` FOREIGN KEY (`ID_tipodocumento`) REFERENCES `tipo_documento_con` (`ID_tipodocumento`);

--
-- Filtros para la tabla `movimiento_detalle`
--
ALTER TABLE `movimiento_detalle`
  ADD CONSTRAINT `fk_movcabecera_movdetalle` FOREIGN KEY (`movimiento_cabecera_ID_movcabecera`) REFERENCES `movimiento_cabecera` (`ID_movcabecera`),
  ADD CONSTRAINT `fk_producto_movdetalle` FOREIGN KEY (`producto_ID_producto`) REFERENCES `producto` (`ID_producto`);

--
-- Filtros para la tabla `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `fk_marca_producto` FOREIGN KEY (`ID_marca`) REFERENCES `marca` (`ID_marca`),
  ADD CONSTRAINT `fk_unidadmedida_producto` FOREIGN KEY (`ID_unidadmedida`) REFERENCES `unidad_medida` (`ID_unidadmedida`);

--
-- Filtros para la tabla `resumen_inventario`
--
ALTER TABLE `resumen_inventario`
  ADD CONSTRAINT `fk_producto_resumeninventario` FOREIGN KEY (`producto_ID_producto`) REFERENCES `producto` (`ID_producto`);

--
-- Filtros para la tabla `terceros`
--
ALTER TABLE `terceros`
  ADD CONSTRAINT `fk_tipodocumento_terceros` FOREIGN KEY (`ID_tipo_Documento`) REFERENCES `tipo_de_documento` (`ID_tipo_Documento`),
  ADD CONSTRAINT `fk_tipoterceros_terceros` FOREIGN KEY (`ID_tipo_terceros`) REFERENCES `tipo_terceros` (`ID_tipo_terceros`);

--
-- Filtros para la tabla `tipo_documento_con`
--
ALTER TABLE `tipo_documento_con`
  ADD CONSTRAINT `fk_tipomovi_tipodocumentocon` FOREIGN KEY (`ID_tipomovimiento`) REFERENCES `tipo_movimiento` (`ID_tipomovimiento`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
