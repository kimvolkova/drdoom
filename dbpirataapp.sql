-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3307
-- Tiempo de generación: 19-10-2024 a las 00:41:47
-- Versión del servidor: 11.3.2-MariaDB
-- Versión de PHP: 8.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `dbpirataapp`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tclientes`
--

DROP TABLE IF EXISTS `tclientes`;
CREATE TABLE IF NOT EXISTS `tclientes` (
  `nClienteID` int(11) NOT NULL AUTO_INCREMENT,
  `cNombre` varchar(45) NOT NULL,
  `cApellido` varchar(45) NOT NULL,
  `cCel` varchar(45) NOT NULL,
  `cTipo` varchar(8) NOT NULL,
  `estado` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`nClienteID`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tclientes`
--

INSERT INTO `tclientes` (`nClienteID`, `cNombre`, `cApellido`, `cCel`, `cTipo`, `estado`) VALUES
(1, 'Juan David', 'Cuadros Vega', '3222392164', 'VIP', 1),
(2, 'Juan Pablo', 'Galvan Varela', '3547995478', 'PLATINUM', 1),
(3, 'El Pepe', 'Grillo', '3222392164', 'START', 0),
(4, 'Josefina', 'Vega Acevedo', '3138259322', 'START', 0),
(5, 'El Bicho', 'Siu', '3008745896', 'PLATINUM', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tdriver`
--

DROP TABLE IF EXISTS `tdriver`;
CREATE TABLE IF NOT EXISTS `tdriver` (
  `nDriverID` int(11) NOT NULL AUTO_INCREMENT,
  `cNombre` varchar(45) NOT NULL,
  `cApellido` varchar(45) NOT NULL,
  `cCc` varchar(10) NOT NULL,
  `dNacimiento` date DEFAULT NULL,
  `cCel` varchar(45) DEFAULT NULL,
  `lEstado` tinyint(4) DEFAULT 1,
  PRIMARY KEY (`nDriverID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tdriver`
--

INSERT INTO `tdriver` (`nDriverID`, `cNombre`, `cApellido`, `cCc`, `dNacimiento`, `cCel`, `lEstado`) VALUES
(1, 'Will', 'Duran', '104786478', '2024-10-01', '3478458796', 1),
(2, 'El Pepe', 'Grillo', '147846987', '2024-10-07', '3222147856', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tlogin`
--

DROP TABLE IF EXISTS `tlogin`;
CREATE TABLE IF NOT EXISTS `tlogin` (
  `nLoginID` int(11) NOT NULL AUTO_INCREMENT,
  `cUser` varchar(20) NOT NULL,
  `cPassword` varchar(256) NOT NULL,
  `lEstado` tinyint(1) DEFAULT 1,
  `nUserID` int(11) NOT NULL,
  PRIMARY KEY (`nLoginID`),
  UNIQUE KEY `cUser` (`cUser`),
  KEY `nUserID` (`nUserID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ttipo`
--

DROP TABLE IF EXISTS `ttipo`;
CREATE TABLE IF NOT EXISTS `ttipo` (
  `nTipoID` int(11) NOT NULL AUTO_INCREMENT,
  `ctipo` varchar(45) NOT NULL,
  PRIMARY KEY (`nTipoID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `ttipo`
--

INSERT INTO `ttipo` (`nTipoID`, `ctipo`) VALUES
(1, 'Admin'),
(2, 'guest'),
(3, 'operador');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tusers`
--

DROP TABLE IF EXISTS `tusers`;
CREATE TABLE IF NOT EXISTS `tusers` (
  `nUserID` int(11) NOT NULL AUTO_INCREMENT,
  `cNombre` varchar(35) NOT NULL,
  `cApellido` varchar(35) NOT NULL,
  `cCc` varchar(10) NOT NULL,
  `lEstado` tinyint(1) DEFAULT 1,
  `dCreacion` date DEFAULT current_timestamp(),
  `nTipoID` int(11) NOT NULL,
  PRIMARY KEY (`nUserID`),
  UNIQUE KEY `cCc` (`cCc`),
  KEY `nTipoID` (`nTipoID`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tusers`
--

INSERT INTO `tusers` (`nUserID`, `cNombre`, `cApellido`, `cCc`, `lEstado`, `dCreacion`, `nTipoID`) VALUES
(1, 'will', 'duran', '1000', 1, '2024-10-14', 1),
(2, 'oscar', 'rojas', '2000', 1, '2024-10-14', 1),
(3, 'mayra', 'calderon', '3000', 1, '2024-10-14', 2),
(4, 'angela', 'caldero', '4000', 1, '2024-10-14', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tvehiculo`
--

DROP TABLE IF EXISTS `tvehiculo`;
CREATE TABLE IF NOT EXISTS `tvehiculo` (
  `nVehiculoID` int(11) NOT NULL AUTO_INCREMENT,
  `cPlaca` varchar(10) NOT NULL,
  `cCc` varchar(10) NOT NULL,
  `cMarca` varchar(45) NOT NULL,
  `cModelo` varchar(10) NOT NULL,
  `nDriverFK` int(11) NOT NULL,
  PRIMARY KEY (`nVehiculoID`),
  KEY `nDriverFK` (`nDriverFK`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `vclientes`
-- (Véase abajo para la vista actual)
--
DROP VIEW IF EXISTS `vclientes`;
CREATE TABLE IF NOT EXISTS `vclientes` (
`codigo` int(11)
,`nombre` varchar(45)
,`apellido` varchar(45)
,`celular` varchar(45)
,`tipo` varchar(8)
,`estado` tinyint(1)
);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `vdrivers`
-- (Véase abajo para la vista actual)
--
DROP VIEW IF EXISTS `vdrivers`;
CREATE TABLE IF NOT EXISTS `vdrivers` (
`codigo` int(11)
,`nombre` varchar(45)
,`apellido` varchar(45)
,`cc` varchar(10)
,`estado` tinyint(4)
,`marca` varchar(45)
,`modelo` varchar(10)
);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `vusers`
-- (Véase abajo para la vista actual)
--
DROP VIEW IF EXISTS `vusers`;
CREATE TABLE IF NOT EXISTS `vusers` (
`codigo` int(11)
,`nombres` varchar(35)
,`apellidos` varchar(35)
,`cc` varchar(10)
,`tipo` varchar(45)
);

-- --------------------------------------------------------

--
-- Estructura para la vista `vclientes`
--
DROP TABLE IF EXISTS `vclientes`;

DROP VIEW IF EXISTS `vclientes`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vclientes`  AS SELECT `tclientes`.`nClienteID` AS `codigo`, `tclientes`.`cNombre` AS `nombre`, `tclientes`.`cApellido` AS `apellido`, `tclientes`.`cCel` AS `celular`, `tclientes`.`cTipo` AS `tipo`, `tclientes`.`estado` AS `estado` FROM `tclientes` WHERE 1 ;

-- --------------------------------------------------------

--
-- Estructura para la vista `vdrivers`
--
DROP TABLE IF EXISTS `vdrivers`;

DROP VIEW IF EXISTS `vdrivers`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vdrivers`  AS SELECT `d`.`nDriverID` AS `codigo`, `d`.`cNombre` AS `nombre`, `d`.`cApellido` AS `apellido`, `d`.`cCc` AS `cc`, `d`.`lEstado` AS `estado`, `v`.`cMarca` AS `marca`, `v`.`cModelo` AS `modelo` FROM (`tdriver` `d` join `tvehiculo` `v` on(`d`.`nDriverID` = `v`.`nDriverFK`)) ;

-- --------------------------------------------------------

--
-- Estructura para la vista `vusers`
--
DROP TABLE IF EXISTS `vusers`;

DROP VIEW IF EXISTS `vusers`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vusers`  AS SELECT `u`.`nUserID` AS `codigo`, `u`.`cNombre` AS `nombres`, `u`.`cApellido` AS `apellidos`, `u`.`cCc` AS `cc`, (select `t`.`ctipo` from `ttipo` `t` where `t`.`nTipoID` = `u`.`nTipoID`) AS `tipo` FROM `tusers` AS `u` ;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tlogin`
--
ALTER TABLE `tlogin`
  ADD CONSTRAINT `tlogin_ibfk_1` FOREIGN KEY (`nUserID`) REFERENCES `tusers` (`nUserID`);

--
-- Filtros para la tabla `tusers`
--
ALTER TABLE `tusers`
  ADD CONSTRAINT `tusers_ibfk_1` FOREIGN KEY (`nTipoID`) REFERENCES `ttipo` (`nTipoID`);

--
-- Filtros para la tabla `tvehiculo`
--
ALTER TABLE `tvehiculo`
  ADD CONSTRAINT `tvehiculo_ibfk_1` FOREIGN KEY (`nDriverFK`) REFERENCES `tdriver` (`nDriverID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
