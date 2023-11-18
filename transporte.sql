-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 19-11-2023 a las 00:50:35
-- Versión del servidor: 10.4.25-MariaDB
-- Versión de PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `transporte`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paradas`
--

CREATE TABLE `paradas` (
  `id` int(11) NOT NULL,
  `id_ruta` int(11) NOT NULL,
  `parada` varchar(20) NOT NULL,
  `hora` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `paradas`
--

INSERT INTO `paradas` (`id`, `id_ruta`, `parada`, `hora`) VALUES
(1, 1, 'MADRID', '10:00:00'),
(2, 2, 'BARCELONA', '10:00:00'),
(3, 3, 'BARCELONA', '17:00:00'),
(4, 4, 'GIRONA', '07:00:00'),
(8, 1, 'BARCELONA', '16:00:00'),
(9, 2, 'MADRID', '16:00:00'),
(10, 3, 'GIRONA', '19:00:00'),
(11, 4, 'BARCELONA', '09:00:00'),
(12, 1, 'ZARAGOZA', '13:00:00'),
(13, 2, 'ZARAGOZA', '13:00:00'),
(14, 5, 'MADRID', '12:00:00'),
(15, 5, 'ZARAGOZA', '15:00:00'),
(16, 5, 'BARCELONA', '18:00:00'),
(17, 6, 'MADRID', '18:00:00'),
(18, 6, 'ZARAGOZA', '15:00:00'),
(19, 6, 'BARCELONA', '12:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rutas`
--

CREATE TABLE `rutas` (
  `id` int(11) NOT NULL,
  `id_ruta` int(11) NOT NULL,
  `lugar_salida` varchar(20) NOT NULL,
  `lugar_llegada` varchar(20) NOT NULL,
  `hora_salida` time NOT NULL,
  `hora_llegada` time NOT NULL,
  `dias_semana` varchar(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `rutas`
--

INSERT INTO `rutas` (`id`, `id_ruta`, `lugar_salida`, `lugar_llegada`, `hora_salida`, `hora_llegada`, `dias_semana`) VALUES
(1, 1, 'MADRID', 'BARCELONA', '10:00:00', '16:00:00', '0123456'),
(2, 2, 'BARCELONA', 'MADRID', '10:00:00', '16:00:00', '0123456'),
(3, 3, 'BARCELONA', 'GIRONA', '17:00:00', '19:00:00', '0123456'),
(4, 4, 'GIRONA', 'BARCELONA', '07:00:00', '09:00:00', '0123456'),
(5, 1, 'MADRID', 'BARCELONA', '12:00:00', '18:00:00', '012345'),
(6, 2, 'BARCELONA', 'MADRID', '12:00:00', '18:00:00', '012345');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `paradas`
--
ALTER TABLE `paradas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `rutas`
--
ALTER TABLE `rutas`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `paradas`
--
ALTER TABLE `paradas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `rutas`
--
ALTER TABLE `rutas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
