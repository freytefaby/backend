-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 19-01-2019 a las 11:37:41
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
-- Estructura de tabla para la tabla `infoempresa`
--

CREATE TABLE `infoempresa` (
  `idinfoempresa` int(11) NOT NULL,
  `telefonoempresa` varchar(200) COLLATE utf8_spanish2_ci NOT NULL,
  `direccionempresa` varchar(200) COLLATE utf8_spanish2_ci NOT NULL,
  `nombrepropietario` varchar(200) COLLATE utf8_spanish2_ci NOT NULL,
  `apellidopropietario` varchar(200) COLLATE utf8_spanish2_ci NOT NULL,
  `telefonopropietario` varchar(200) COLLATE utf8_spanish2_ci NOT NULL,
  `nitempresa` varchar(200) COLLATE utf8_spanish2_ci NOT NULL,
  `nombrecomercialempresa` varchar(200) COLLATE utf8_spanish2_ci NOT NULL,
  `ciudadempresa` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `correo` varchar(200) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `infoempresa`
--

INSERT INTO `infoempresa` (`idinfoempresa`, `telefonoempresa`, `direccionempresa`, `nombrepropietario`, `apellidopropietario`, `telefonopropietario`, `nitempresa`, `nombrecomercialempresa`, `ciudadempresa`, `correo`) VALUES
(1, '6419785', 'CRA 83 N-4-16', 'CINDY PAOLA ', 'VELASQUEZ MERLANO ', '6419785', '1001968486-5', 'DROGUERIA AMOR Y PODER ', 'CARTAGENA/BOLIVAR', 'droamorypoder@outlook.es');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `infoempresa`
--
ALTER TABLE `infoempresa`
  ADD PRIMARY KEY (`idinfoempresa`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `infoempresa`
--
ALTER TABLE `infoempresa`
  MODIFY `idinfoempresa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
