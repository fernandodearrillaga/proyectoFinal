-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 30-11-2023 a las 00:43:39
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
  `ruta` varchar(100) DEFAULT NULL,
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
(56, 'BARCELONA', 'GIRONA', NULL, NULL, '2023-11-29', 'AUTOBUS', 'TREN', 0),
(57, 'BARCELONA', 'GIRONA', NULL, NULL, '2023-11-29', 'AUTOBUS', 'TREN', 19),
(59, 'BARCELONA', 'MURCIA', NULL, NULL, '2023-11-29', 'AUTOBUS', 'TREN', 14),
(60, 'BARCELONA', 'MURCIA', NULL, NULL, '2023-11-29', 'AUTOBUS', 'TREN', 14),
(61, 'origen', NULL, NULL, 'MURCIA', '2023-11-29', 'AUTOBUS', 'TREN', 14),
(62, NULL, 'destino', NULL, 'MURCIA', '2023-11-29', 'AUTOBUS', 'TREN', 14),
(63, NULL, NULL, '3', NULL, '2023-11-29', NULL, NULL, 14),
(64, NULL, NULL, '1', NULL, '2023-11-29', NULL, NULL, 14),
(65, NULL, NULL, '1', NULL, '2023-11-29', NULL, NULL, 14),
(66, NULL, NULL, '1', NULL, '2023-11-29', NULL, NULL, 14),
(67, NULL, NULL, '9', NULL, '2023-11-29', NULL, NULL, 14),
(68, NULL, NULL, '9', NULL, '2023-11-29', NULL, NULL, 14),
(69, NULL, NULL, '7', NULL, '2023-11-29', NULL, NULL, 14),
(70, NULL, NULL, '7', NULL, '2023-11-29', NULL, NULL, 14),
(71, NULL, NULL, '2', NULL, '2023-11-29', NULL, NULL, 14),
(72, NULL, NULL, '2', NULL, '2023-11-29', NULL, NULL, 14),
(73, NULL, NULL, '2', NULL, '2023-11-29', NULL, NULL, 14),
(74, NULL, NULL, '2', NULL, '2023-11-29', NULL, NULL, 14),
(75, NULL, NULL, '2', NULL, '2023-11-29', NULL, NULL, 14),
(76, NULL, NULL, '2', NULL, '2023-11-29', NULL, NULL, 14),
(77, NULL, NULL, '2', NULL, '2023-11-29', NULL, NULL, 14),
(78, NULL, NULL, '2', NULL, '2023-11-29', NULL, NULL, 14),
(79, NULL, NULL, '3', NULL, '2023-11-29', NULL, NULL, 14),
(80, NULL, NULL, '2', NULL, '2023-11-29', NULL, NULL, 14),
(81, NULL, NULL, '9', NULL, '2023-11-29', NULL, NULL, 14),
(82, NULL, NULL, '3', NULL, '2023-11-29', NULL, NULL, 14),
(83, NULL, NULL, '3', NULL, '2023-11-29', NULL, NULL, 14),
(84, NULL, NULL, '2', NULL, '2023-11-29', NULL, NULL, 14),
(85, NULL, NULL, '3', NULL, '2023-11-29', NULL, NULL, 14),
(86, NULL, NULL, '3', NULL, '2023-11-29', NULL, NULL, 14),
(87, NULL, NULL, '3', NULL, '2023-11-29', NULL, NULL, 14),
(88, NULL, NULL, '3', NULL, '2023-11-29', NULL, NULL, 14),
(89, NULL, NULL, '2', NULL, '2023-11-29', NULL, NULL, 14),
(90, NULL, NULL, '2', NULL, '2023-11-29', NULL, NULL, 14),
(91, NULL, NULL, '2', NULL, '2023-11-29', NULL, NULL, 14),
(92, NULL, NULL, '2', NULL, '2023-11-29', NULL, NULL, 14),
(93, NULL, NULL, '2', NULL, '2023-11-29', NULL, NULL, 14),
(94, NULL, NULL, '2', NULL, '2023-11-29', NULL, NULL, 14),
(95, NULL, NULL, '2', NULL, '2023-11-29', NULL, NULL, 14),
(96, NULL, NULL, '2', NULL, '2023-11-29', NULL, NULL, 14),
(97, NULL, NULL, '2', NULL, '2023-11-29', NULL, NULL, 14),
(98, NULL, NULL, '2', NULL, '2023-11-29', NULL, NULL, 14),
(99, NULL, NULL, '2', NULL, '2023-11-29', NULL, NULL, 14),
(100, NULL, NULL, '2', NULL, '2023-11-29', NULL, NULL, 14),
(101, NULL, NULL, '2', NULL, '2023-11-29', NULL, NULL, 14),
(102, NULL, NULL, '2', NULL, '2023-11-29', NULL, NULL, 14),
(103, NULL, NULL, '2', NULL, '2023-11-29', NULL, NULL, 14),
(104, NULL, NULL, '2', NULL, '2023-11-29', NULL, NULL, 14),
(105, NULL, NULL, '2', NULL, '2023-11-29', NULL, NULL, 14),
(106, NULL, NULL, '3', NULL, '2023-11-29', NULL, NULL, 14),
(107, NULL, NULL, '3', NULL, '2023-11-29', NULL, NULL, 14),
(108, NULL, NULL, '1', NULL, '2023-11-29', NULL, NULL, 14),
(109, NULL, NULL, '1', NULL, '2023-11-29', NULL, NULL, 14),
(110, NULL, NULL, '1', NULL, '2023-11-29', NULL, NULL, 14),
(111, NULL, NULL, '1', NULL, '2023-11-29', NULL, NULL, 14),
(112, NULL, NULL, '1', NULL, '2023-11-29', NULL, NULL, 14),
(113, NULL, NULL, '1', NULL, '2023-11-29', NULL, NULL, 14),
(114, NULL, NULL, '1', NULL, '2023-11-29', NULL, NULL, 14),
(115, NULL, NULL, '3', NULL, '2023-11-29', NULL, NULL, 14),
(116, NULL, 'destino', NULL, 'GRANADA', '2023-11-29', 'AUTOBUS', 'TREN', 0),
(117, 'BARCELONA', 'MADRID', NULL, NULL, '2023-11-29', 'AUTOBUS', 'TREN', 0),
(118, NULL, NULL, '5', NULL, '2023-11-29', NULL, NULL, 0),
(119, NULL, NULL, '2', NULL, '2023-11-29', NULL, NULL, 14),
(120, NULL, NULL, '2', NULL, '2023-11-29', NULL, NULL, 14),
(121, NULL, NULL, '2', NULL, '2023-11-29', NULL, NULL, 14),
(122, NULL, NULL, '2', NULL, '2023-11-29', NULL, NULL, 14),
(123, NULL, NULL, '2', NULL, '2023-11-29', NULL, NULL, 14),
(124, NULL, NULL, '2', NULL, '2023-11-29', NULL, NULL, 14),
(125, NULL, NULL, '2', NULL, '2023-11-29', NULL, NULL, 14),
(126, NULL, NULL, '2', NULL, '2023-11-29', NULL, NULL, 14),
(127, NULL, NULL, '2', NULL, '2023-11-29', NULL, NULL, 14),
(128, NULL, NULL, '2', NULL, '2023-11-29', NULL, NULL, 14),
(129, NULL, NULL, '2', NULL, '2023-11-29', NULL, NULL, 14),
(130, NULL, NULL, '2', NULL, '2023-11-29', NULL, NULL, 14),
(131, NULL, NULL, '2', NULL, '2023-11-29', NULL, NULL, 14),
(132, NULL, NULL, '2', NULL, '2023-11-29', NULL, NULL, 14),
(133, NULL, NULL, '2', NULL, '2023-11-29', NULL, NULL, 14),
(134, NULL, NULL, '2', NULL, '2023-11-29', NULL, NULL, 14),
(135, NULL, NULL, '2', NULL, '2023-11-29', NULL, NULL, 14),
(136, NULL, NULL, '2', NULL, '2023-11-29', NULL, NULL, 14),
(137, NULL, NULL, '2', NULL, '2023-11-29', NULL, NULL, 14),
(138, NULL, NULL, '1', NULL, '2023-11-29', NULL, NULL, 14),
(139, NULL, NULL, '11', NULL, '2023-11-30', NULL, NULL, 14),
(141, NULL, NULL, '1', NULL, '2023-11-30', NULL, NULL, 14),
(142, NULL, NULL, '3', NULL, '2023-11-30', NULL, NULL, 14),
(143, NULL, NULL, '3', NULL, '2023-11-30', NULL, NULL, 14),
(144, NULL, NULL, '1', NULL, '2023-11-30', NULL, NULL, 14),
(145, 'MADRID', 'GIRONA', NULL, NULL, '2023-11-30', 'AUTOBUS', 'TREN', 14),
(146, 'MADRID', 'GIRONA', NULL, NULL, '2023-11-30', 'AUTOBUS', 'TREN', 14);

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
(24, 8, 'MADRID', '14:00:00'),
(25, 15, 'MADRID', '08:00:00'),
(26, 15, 'MURCIA', '14:00:00'),
(27, 16, 'MURCIA', '08:00:00'),
(28, 16, 'MADRID', '14:00:00'),
(29, 17, 'GRANADA', '08:00:00'),
(30, 17, 'MADRID', '14:00:00'),
(31, 18, 'MADRID', '08:00:00'),
(32, 18, 'GRANADA', '14:00:00'),
(37, 2, 'LLEIDA', '11:30:00'),
(38, 6, 'LLEIDA', '13:30:00'),
(41, 21, 'MADRID', '16:00:00'),
(42, 21, 'BARCELONA', '22:00:00'),
(43, 22, 'MADRID', '14:00:00'),
(44, 22, 'BARCELONA', '20:00:00'),
(45, 23, 'MADRID', '14:00:00'),
(46, 23, 'ALICANTE', '20:00:00'),
(47, 21, 'ZARAGOZA', '19:00:00'),
(48, 24, 'BARCELONA', '12:00:00'),
(49, 24, 'GIRONA', '14:00:00');

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
(8, 6, 'BARCELONA', 'MADRID', '11:00:00', '14:00:00', '0123456', 'TREN', 'RENFE'),
(15, 7, 'MADRID', 'MURCIA', '08:00:00', '14:00:00', '0123456', 'AUTOBUS', 'ALSA'),
(16, 8, 'MURCIA', 'MADRID', '08:00:00', '14:00:00', '0123456', 'AUTOBUS', 'ALSA'),
(17, 9, 'GRANADA', 'MADRID', '08:00:00', '14:00:00', '0123456', 'AUTOBUS', 'ALSA'),
(18, 10, 'MADRID', 'GRANADA', '08:00:00', '14:00:00', '0123456', 'AUTOBUS', 'ALSA'),
(21, 1, 'MADRID', 'BARCELONA', '16:00:00', '22:00:00', '0123456', 'AUTOBUS', 'ALSA'),
(22, 1, 'MADRID', 'BARCELONA', '14:00:00', '20:00:00', '0123456', 'AUTOBUS', 'ALSA'),
(23, 11, 'MADRID', 'ALICANTE', '14:00:00', '20:00:00', '0123456', 'AUTOBUS', 'ALSA'),
(24, 3, 'BARCELONA', 'GIRONA', '12:00:00', '14:00:00', '01234', 'AUTOBUS', 'ALSA');

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
(14, 'Admin', 'admin@admin.com', 'admin1234', 'admin'),
(15, 'Usuario2', 'usuario2@gmail.com', 'user2', 'usuario'),
(16, 'Usuario3', 'usuario3@gmail.com', 'Usuario3', 'usuario'),
(19, 'Usuario4', 'usuario4@gmail.com', 'usuario444', 'usuario');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=147;

--
-- AUTO_INCREMENT de la tabla `operadores`
--
ALTER TABLE `operadores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `paradas`
--
ALTER TABLE `paradas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT de la tabla `rutas`
--
ALTER TABLE `rutas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
