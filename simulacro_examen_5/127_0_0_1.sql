-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 08-09-2026 a las 19:55:27
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `fruta_temporada`
--
CREATE DATABASE IF NOT EXISTS `fruta_temporada` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `fruta_temporada`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fruta`
--

CREATE TABLE `fruta` (
  `id` int(11) NOT NULL,
  `nombre` varchar(150) NOT NULL,
  `calidad` varchar(100) NOT NULL,
  `precio` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `fruta`
--

INSERT INTO `fruta` (`id`, `nombre`, `calidad`, `precio`) VALUES
(1, 'Melon', '10', '2€/kg'),
(2, 'Sandia', '10', '3€/kg'),
(4, 'Pera', '8', '1€/kg');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `fruta`
--
ALTER TABLE `fruta`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `fruta`
--
ALTER TABLE `fruta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
