-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-05-2016 a las 17:34:06
-- Versión del servidor: 5.6.20
-- Versión de PHP: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `sillonball`
--
CREATE DATABASE IF NOT EXISTS `sillonball` DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish2_ci;
USE `sillonball`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `capitulo`
--

CREATE TABLE IF NOT EXISTS `capitulo` (
`id_capitulo` int(10) NOT NULL,
  `id_temporada` int(10) NOT NULL,
  `nombre` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `puntuacion` int(2) DEFAULT NULL,
  `num_capitulo` int(2) NOT NULL,
  `duracion` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentario`
--

CREATE TABLE IF NOT EXISTS `comentario` (
  `id_capitulo` int(10) NOT NULL,
  `email_usuario` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
`id_comentario` int(10) NOT NULL,
  `contenido` varchar(540) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lista`
--

CREATE TABLE IF NOT EXISTS `lista` (
`id_lista` int(10) NOT NULL,
  `nombre` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `email_usuario` varchar(10) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lista_serie`
--

CREATE TABLE IF NOT EXISTS `lista_serie` (
  `id_lista` int(10) NOT NULL,
  `id_serie` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `serie`
--

CREATE TABLE IF NOT EXISTS `serie` (
`id_serie` int(10) NOT NULL,
  `nombre` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `caratula` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `puntuacion_media` int(2) DEFAULT NULL,
  `numero_temp` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `temporada`
--

CREATE TABLE IF NOT EXISTS `temporada` (
  `id_serie` int(10) NOT NULL,
`id_temporada` int(10) NOT NULL,
  `numero_temp` int(2) NOT NULL,
  `numero_caps` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user_capitulo`
--

CREATE TABLE IF NOT EXISTS `user_capitulo` (
  `email_usuario` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `id_capitulo` int(10) NOT NULL,
  `puntuacion` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `nombre` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `apellidos` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `descripcion` varchar(540) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `avatar` varchar(255) COLLATE utf8_spanish2_ci DEFAULT 'iconoUsuario2.png',
  `role` varchar(50) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `capitulo`
--
ALTER TABLE `capitulo`
 ADD PRIMARY KEY (`id_capitulo`), ADD UNIQUE KEY `id_temporada` (`id_temporada`);

--
-- Indices de la tabla `comentario`
--
ALTER TABLE `comentario`
 ADD PRIMARY KEY (`id_comentario`), ADD UNIQUE KEY `id_capitulo` (`id_capitulo`), ADD UNIQUE KEY `email_usuario` (`email_usuario`);

--
-- Indices de la tabla `lista`
--
ALTER TABLE `lista`
 ADD PRIMARY KEY (`id_lista`), ADD UNIQUE KEY `email_usuario` (`email_usuario`);

--
-- Indices de la tabla `lista_serie`
--
ALTER TABLE `lista_serie`
 ADD PRIMARY KEY (`id_lista`,`id_serie`), ADD KEY `id_serie` (`id_serie`);

--
-- Indices de la tabla `serie`
--
ALTER TABLE `serie`
 ADD PRIMARY KEY (`id_serie`);

--
-- Indices de la tabla `temporada`
--
ALTER TABLE `temporada`
 ADD PRIMARY KEY (`id_temporada`), ADD UNIQUE KEY `id_serie` (`id_serie`), ADD UNIQUE KEY `id_temporada` (`id_temporada`);

--
-- Indices de la tabla `user_capitulo`
--
ALTER TABLE `user_capitulo`
 ADD PRIMARY KEY (`email_usuario`,`id_capitulo`), ADD KEY `id_capitulo` (`id_capitulo`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
 ADD PRIMARY KEY (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `capitulo`
--
ALTER TABLE `capitulo`
MODIFY `id_capitulo` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `comentario`
--
ALTER TABLE `comentario`
MODIFY `id_comentario` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `lista`
--
ALTER TABLE `lista`
MODIFY `id_lista` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `serie`
--
ALTER TABLE `serie`
MODIFY `id_serie` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `temporada`
--
ALTER TABLE `temporada`
MODIFY `id_temporada` int(10) NOT NULL AUTO_INCREMENT;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `capitulo`
--
ALTER TABLE `capitulo`
ADD CONSTRAINT `capitulo_ibfk_1` FOREIGN KEY (`id_temporada`) REFERENCES `temporada` (`id_temporada`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `comentario`
--
ALTER TABLE `comentario`
ADD CONSTRAINT `comentario_ibfk_1` FOREIGN KEY (`id_capitulo`) REFERENCES `capitulo` (`id_capitulo`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `comentario_ibfk_2` FOREIGN KEY (`email_usuario`) REFERENCES `usuarios` (`email`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `lista`
--
ALTER TABLE `lista`
ADD CONSTRAINT `lista_ibfk_1` FOREIGN KEY (`email_usuario`) REFERENCES `usuarios` (`email`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `lista_serie`
--
ALTER TABLE `lista_serie`
ADD CONSTRAINT `lista_serie_ibfk_1` FOREIGN KEY (`id_lista`) REFERENCES `lista` (`id_lista`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `lista_serie_ibfk_2` FOREIGN KEY (`id_serie`) REFERENCES `serie` (`id_serie`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `temporada`
--
ALTER TABLE `temporada`
ADD CONSTRAINT `temporada_ibfk_1` FOREIGN KEY (`id_serie`) REFERENCES `serie` (`id_serie`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `user_capitulo`
--
ALTER TABLE `user_capitulo`
ADD CONSTRAINT `user_capitulo_ibfk_1` FOREIGN KEY (`email_usuario`) REFERENCES `usuarios` (`email`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `user_capitulo_ibfk_2` FOREIGN KEY (`id_capitulo`) REFERENCES `capitulo` (`id_capitulo`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
