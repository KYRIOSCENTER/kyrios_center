-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 02-07-2022 a las 21:03:56
-- Versión del servidor: 10.4.21-MariaDB
-- Versión de PHP: 7.3.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `kyriosdb`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ordenes`
--

CREATE TABLE `ordenes` (
  `codigo` int(255) NOT NULL,
  `fecha` varchar(10) CHARACTER SET utf8 NOT NULL,
  `tecnico` varchar(60) CHARACTER SET utf8 NOT NULL,
  `nomcliente` varchar(60) CHARACTER SET utf8 NOT NULL,
  `celcliente` varchar(20) CHARACTER SET utf8 DEFAULT NULL,
  `equipo` varchar(30) CHARACTER SET utf8 NOT NULL,
  `marca` varchar(30) CHARACTER SET utf8 NOT NULL,
  `modelo` varchar(30) CHARACTER SET utf8 NOT NULL,
  `serial` varchar(30) CHARACTER SET utf8 NOT NULL,
  `notacliente` varchar(255) CHARACTER SET utf8 NOT NULL,
  `observaciones` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `notatecnico` varchar(255) CHARACTER SET utf8 NOT NULL,
  `valor` varchar(20) CHARACTER SET utf8 DEFAULT NULL,
  `estado` varchar(10) CHARACTER SET utf8 DEFAULT NULL,
  `fechafin` varchar(10) CHARACTER SET utf8 DEFAULT NULL,
  `horainicio` varchar(12) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `perfiles`
--

CREATE TABLE `perfiles` (
  `codigo` int(255) NOT NULL,
  `nombre` varchar(255) CHARACTER SET utf8 NOT NULL,
  `correo` varchar(255) CHARACTER SET utf8 NOT NULL,
  `telefono` varchar(255) COLLATE latin1_spanish_ci NOT NULL,
  `pass` varchar(255) CHARACTER SET utf8 NOT NULL,
  `rol` varchar(255) CHARACTER SET utf8 NOT NULL,
  `estado` varchar(255) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci ROW_FORMAT=COMPACT;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `ordenes`
--
ALTER TABLE `ordenes`
  ADD PRIMARY KEY (`codigo`) USING BTREE;

--
-- Indices de la tabla `perfiles`
--
ALTER TABLE `perfiles`
  ADD PRIMARY KEY (`codigo`) USING BTREE;

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `ordenes`
--
ALTER TABLE `ordenes`
  MODIFY `codigo` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `perfiles`
--
ALTER TABLE `perfiles`
  MODIFY `codigo` int(255) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
