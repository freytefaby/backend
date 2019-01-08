-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 07-01-2019 a las 18:10:47
-- Versión del servidor: 5.6.41
-- Versión de PHP: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `hhfarmbi_amorypoder`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permiso`
--

CREATE TABLE `permiso` (
  `idpermiso` int(11) NOT NULL,
  `idrecurso` int(11) NOT NULL,
  `idrol` int(11) NOT NULL,
  `leer` int(11) NOT NULL,
  `crear` int(11) NOT NULL,
  `eliminar` int(11) NOT NULL,
  `modificar` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `permiso`
--

INSERT INTO `permiso` (`idpermiso`, `idrecurso`, `idrol`, `leer`, `crear`, `eliminar`, `modificar`) VALUES
(1, 21, 1, 1, 1, 0, 1),
(2, 1, 1, 1, 1, 0, 0),
(3, 2, 1, 1, 0, 0, 1),
(4, 3, 1, 1, 1, 1, 1),
(5, 4, 1, 1, 1, 0, 0),
(6, 5, 1, 1, 1, 0, 1),
(7, 6, 1, 1, 1, 0, 0),
(8, 7, 1, 1, 1, 0, 0),
(9, 8, 1, 1, 1, 0, 1),
(10, 9, 1, 1, 1, 0, 0),
(11, 10, 1, 1, 1, 0, 0),
(12, 11, 1, 1, 1, 0, 0),
(13, 12, 1, 1, 1, 0, 1),
(14, 13, 1, 1, 0, 0, 0),
(15, 14, 1, 1, 0, 0, 1),
(16, 15, 1, 1, 1, 0, 1),
(17, 16, 1, 1, 0, 0, 0),
(18, 17, 1, 1, 1, 0, 0),
(19, 18, 1, 1, 0, 0, 0),
(20, 19, 1, 1, 0, 0, 0),
(21, 20, 1, 1, 0, 0, 0),
(22, 22, 1, 1, 1, 1, 1),
(23, 23, 1, 1, 1, 0, 1),
(24, 24, 1, 1, 1, 1, 1),
(25, 1, 2, 1, 1, 0, 0),
(26, 16, 2, 1, 0, 0, 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `permiso`
--
ALTER TABLE `permiso`
  ADD PRIMARY KEY (`idpermiso`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `permiso`
--
ALTER TABLE `permiso`
  MODIFY `idpermiso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
