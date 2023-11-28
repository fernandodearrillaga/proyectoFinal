-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 28-11-2023 a las 19:34:48
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
-- Estructura de tabla para la tabla `historial`
--

CREATE TABLE `historial` (
  `id` int(11) NOT NULL,
  `origen` varchar(11) DEFAULT NULL,
  `destino` varchar(11) DEFAULT NULL,
  `ruta` int(11) DEFAULT NULL,
  `parada` varchar(20) DEFAULT NULL,
  `fecha` date NOT NULL,
  `autobus` varchar(10) DEFAULT NULL,
  `tren` varchar(10) DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `historial`
--

INSERT INTO `historial` (`id`, `origen`, `destino`, `ruta`, `parada`, `fecha`, `autobus`, `tren`, `id_usuario`) VALUES
(3, 'MADRID', 'BARCELONA', NULL, NULL, '2023-11-28', NULL, NULL, 1),
(8, 'BARCELONA', 'MADRID', NULL, NULL, '2023-11-28', NULL, NULL, 13),
(10, 'BARCELONA', 'MADRID', NULL, NULL, '2023-11-28', NULL, NULL, 13),
(11, NULL, 'destino', NULL, 'GIRONA', '2023-11-30', NULL, NULL, 13),
(12, NULL, NULL, 3, NULL, '2023-12-02', NULL, NULL, 13),
(13, 'BARCELONA', 'GIRONA', NULL, NULL, '2023-11-28', 'AUTOBUS', 'TREN', 13),
(14, 'BARCELONA', 'GIRONA', NULL, NULL, '2023-11-28', 'AUTOBUS', 'TREN', 13);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `operadores`
--

CREATE TABLE `operadores` (
  `id` int(11) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `web` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `operadores`
--

INSERT INTO `operadores` (`id`, `nombre`, `web`) VALUES
(1, 'RENFE', 'https://www.renfe.com/es/es'),
(2, 'ALSA', 'https://www.alsa.es/'),
(3, 'SAGALÉS', 'https://www.sagales.com/sale/?sgLang=es&');

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
(19, 6, 'BARCELONA', '12:00:00'),
(20, 7, 'MADRID', '11:00:00'),
(22, 7, 'BARCELONA', '14:00:00'),
(23, 8, 'BARCELONA', '11:00:00'),
(24, 8, 'MADRID', '14:00:00');

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
  `dias_semana` varchar(7) NOT NULL,
  `medio` varchar(20) NOT NULL,
  `operador` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `rutas`
--

INSERT INTO `rutas` (`id`, `id_ruta`, `lugar_salida`, `lugar_llegada`, `hora_salida`, `hora_llegada`, `dias_semana`, `medio`, `operador`) VALUES
(1, 1, 'MADRID', 'BARCELONA', '10:00:00', '16:00:00', '0123456', 'AUTOBUS', 'ALSA'),
(2, 2, 'BARCELONA', 'MADRID', '10:00:00', '16:00:00', '0123456', 'AUTOBUS', 'ALSA'),
(3, 3, 'BARCELONA', 'GIRONA', '17:00:00', '19:00:00', '0123456', 'AUTOBUS', 'SAGALÉS'),
(4, 4, 'GIRONA', 'BARCELONA', '07:00:00', '09:00:00', '0123456', 'AUTOBUS', 'SAGALÉS'),
(5, 1, 'MADRID', 'BARCELONA', '12:00:00', '18:00:00', '012345', 'AUTOBUS', 'ALSA'),
(6, 2, 'BARCELONA', 'MADRID', '12:00:00', '18:00:00', '012345', 'AUTOBUS', 'ALSA'),
(7, 5, 'MADRID', 'BARCELONA', '11:00:00', '14:00:00', '0123456', 'TREN', 'RENFE'),
(8, 6, 'BARCELONA', 'MADRID', '11:00:00', '14:00:00', '0123456', 'TREN', 'RENFE');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `correo` varchar(50) NOT NULL,
  `contraseña` varchar(20) NOT NULL,
  `Tipo` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `correo`, `contraseña`, `Tipo`) VALUES
(8, '', '', '', 'usuario'),
(11, 'Fer', 'fer@fer.com', 'a1234', 'usuario'),
(12, 'Pepito', 'pepito@cat.com', 's234', 'usuario'),
(13, 'Usuario', 'usuario@gmail.com', 'user', 'usuario'),
(14, 'Admin', 'admin@admin.com', 'admin1234', 'admin');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `historial`
--
ALTER TABLE `historial`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `operadores`
--
ALTER TABLE `operadores`
  ADD PRIMARY KEY (`id`);

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
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `correo` (`correo`),
  ADD UNIQUE KEY `nombre` (`nombre`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `historial`
--
ALTER TABLE `historial`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `operadores`
--
ALTER TABLE `operadores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `paradas`
--
ALTER TABLE `paradas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de la tabla `rutas`
--
ALTER TABLE `rutas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
