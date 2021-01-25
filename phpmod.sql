-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 25-01-2021 a las 17:53:44
-- Versión del servidor: 10.4.17-MariaDB
-- Versión de PHP: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `phpmod`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `Rol_id` int(11) NOT NULL,
  `Rol_nombre` varchar(25) CHARACTER SET utf8mb4 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`Rol_id`, `Rol_nombre`) VALUES
(0, 'Indefinido'),
(1, 'Admin'),
(2, ' Usuario');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `Usu_id` int(11) NOT NULL,
  `Usu_alias` varchar(25) CHARACTER SET utf8mb4 DEFAULT NULL,
  `Usu_nombres` varchar(25) CHARACTER SET utf8mb4 NOT NULL,
  `Usu_apellidos` varchar(25) CHARACTER SET utf8mb4 NOT NULL,
  `Usu_email` varchar(250) CHARACTER SET utf8mb4 NOT NULL,
  `Usu_password` varchar(32) CHARACTER SET utf8mb4 NOT NULL,
  `Usu_token` varchar(250) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `Usu_rol` int(11) NOT NULL,
  `Usu_acceso` int(1) NOT NULL DEFAULT 1,
  `Usu_eliminado` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`Usu_id`, `Usu_alias`, `Usu_nombres`, `Usu_apellidos`, `Usu_email`, `Usu_password`, `Usu_token`, `Usu_rol`, `Usu_acceso`, `Usu_eliminado`) VALUES
(0, 'Indefinido', '', '', '', '', NULL, 0, 0, 0),
(1, 'Admin', 'Edwin', 'Bautista', 'edwinbz@outlook.com', 'e10adc3949ba59abbe56e057f20f883e', NULL, 1, 1, 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`Rol_id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`Usu_id`),
  ADD KEY `Usu_rol` (`Usu_rol`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `rol`
--
ALTER TABLE `rol`
  MODIFY `Rol_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `Usu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`Usu_rol`) REFERENCES `rol` (`Rol_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
