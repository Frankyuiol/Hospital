-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 22-09-2023 a las 13:21:50
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `database`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `Id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `dni` int(8) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `apellido` varchar(255) NOT NULL,
  `telefono` int(10) NOT NULL,
  `genero` varchar(255) NOT NULL,
  `tipo_usuario` enum('normal','admin') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`Id`, `email`, `password`, `dni`, `nombre`, `apellido`, `telefono`, `genero`, `tipo_usuario`) VALUES
(16, 'Canoliliana359@gmail.co', '$2y$10$W2xP15V9jgYMX3o1PQfX5e9fLt/L2fCZ755GwabOdr7MdqWS3Nj0C', 46583401, 'Franco', 'Martinez', 1127184175, 'Hombre', 'normal'),
(17, 'Canoliliana359@gmail.c', '$2y$10$k2uA8brOQgv376COw6iJmukO3sIknsl20AOahcA0hlv79QQ2FLGYC', 46583401, 'Franco', 'Martinez', 1127184175, 'Hombre', 'normal'),
(18, 'Canoliliana359@gmail.com', '$2y$10$8pbM401bSMcTcudm/fXn0eigDg310Imo9OS.AGPZ4SylheEam7MQS', 46583401, 'Franco', 'Martinez', 1127184175, 'Hombre', 'normal'),
(19, 'Canoliliana359@', '$2y$10$lrMKRzj9LzMIfYjKJOpCPulEUaba4zP/W3OU9NGfrKHxrVQCfEApu', 46583401, 'Franco', 'Martinez', 1127184175, 'Hombre', 'admin');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
