-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-11-2023 a las 06:29:18
-- Versión del servidor: 10.1.37-MariaDB
-- Versión de PHP: 5.6.39

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `prueba_doopla`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `codigopostal`
--

CREATE TABLE `codigopostal` (
  `CodigoPostal` int(11) NOT NULL,
  `Poblacion` int(11) NOT NULL,
  `Provincia` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `codigopostal`
--

INSERT INTO `codigopostal` (`CodigoPostal`, `Poblacion`, `Provincia`) VALUES
(54407, 150, 'Chiapas'),
(54408, 140, 'Veracruz'),
(54409, 130, 'Edo. Mexico');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `domicilios`
--

CREATE TABLE `domicilios` (
  `DNI` int(11) NOT NULL,
  `Calle` varchar(30) DEFAULT NULL,
  `CodigoPostal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `domicilios`
--

INSERT INTO `domicilios` (`DNI`, `Calle`, `CodigoPostal`) VALUES
(1234, 'Ceiba', 54407),
(5678, 'Aguacate', 54408),
(9876, 'Av. Via Corta', 54409);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleados`
--

CREATE TABLE `empleados` (
  `Id` int(11) NOT NULL,
  `Nombre` varchar(50) DEFAULT NULL,
  `DNI` int(11) NOT NULL,
  `Sueldo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `empleados`
--

INSERT INTO `empleados` (`Id`, `Nombre`, `DNI`, `Sueldo`) VALUES
(1, 'Roberto Silva', 1234, 500100),
(2, 'Moises Torres', 5678, 400100),
(3, 'Axel Martinez', 9876, 500200);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `telefonos`
--

CREATE TABLE `telefonos` (
  `Id` int(11) NOT NULL,
  `DNI` int(11) NOT NULL,
  `Telefono` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `telefonos`
--

INSERT INTO `telefonos` (`Id`, `DNI`, `Telefono`) VALUES
(1, 1234, '55-11-22-33-44'),
(2, 5678, '56-55-77-88-99'),
(3, 9876, '55-99-88-77-66');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `codigopostal`
--
ALTER TABLE `codigopostal`
  ADD PRIMARY KEY (`CodigoPostal`);

--
-- Indices de la tabla `domicilios`
--
ALTER TABLE `domicilios`
  ADD PRIMARY KEY (`DNI`),
  ADD KEY `CodigoPostal` (`CodigoPostal`);

--
-- Indices de la tabla `empleados`
--
ALTER TABLE `empleados`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `DNI` (`DNI`);

--
-- Indices de la tabla `telefonos`
--
ALTER TABLE `telefonos`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `FK_Telefonos_DNI` (`DNI`);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `domicilios`
--
ALTER TABLE `domicilios`
  ADD CONSTRAINT `CodigoPostal` FOREIGN KEY (`CodigoPostal`) REFERENCES `codigopostal` (`CodigoPostal`);

--
-- Filtros para la tabla `empleados`
--
ALTER TABLE `empleados`
  ADD CONSTRAINT `DNI` FOREIGN KEY (`DNI`) REFERENCES `domicilios` (`DNI`);

--
-- Filtros para la tabla `telefonos`
--
ALTER TABLE `telefonos`
  ADD CONSTRAINT `FK_Telefonos_DNI` FOREIGN KEY (`DNI`) REFERENCES `domicilios` (`DNI`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
