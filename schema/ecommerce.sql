-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 04-07-2016 a las 04:42:19
-- Versión del servidor: 5.6.21
-- Versión de PHP: 5.5.19

DROP DATABASE IF EXISTS ecommerce;
CREATE DATABASE ecommerce;
use ecommerce;

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `ecommerce`
--

-- --------------------------------------------------------
-- CREATE TABLE IF NOT EXISTS `user_follow` (
--   `id` INT NOT NULL AUTO_INCREMENT,
--   `follower` INT NOT NULL,
--   `following` INT NOT NULL,
--   `subscribed` INT NOT NULL DEFAULT 0000-00-00 00:00:00,
--   PRIMARY KEY (`id`))
--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE IF NOT EXISTS `producto` (
`id` int(11) NOT NULL,
  `titulo` varchar(100) NOT NULL,
  `precio` int(100) NOT NULL,
  `imagen` int(11) DEFAULT NULL,
  `id_categoria` varchar(100) NOT NULL,
  `descripcion` text NOT NULL,
  `idUsuario` int(11) NOT NULL
  FOREIGN KEY (id_categoria) REFERENCES categorias(id)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- CREATE TABLE IF NOT EXISTS `categoria` (
-- `id` int(11) NOT NULL,
--   `nombre` varchar(100) NOT NULL,
-- ) ENGINE=InnoDB  DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`id`, `titulo`, `precio`, `imagen`, `categoria`, `descripcion`, `idUsuario`) VALUES
(1, 'primer remera', 123, NULL, 'Comics', 'es la primer remera', 0),
(2, 'primer remera', 123, NULL, 'Comics', 'es la primer remera', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
`id` int(10) unsigned NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `apellido` varchar(100) NOT NULL,
  `sexo` int(10) unsigned NOT NULL,
  `password` text NOT NULL,
  `mail` varchar(400) NOT NULL

) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `nombre`, `apellido`, `sexo`, `password`, `mail`) VALUES
(1, 'gonzalo', 'vanni', 1, '$2y$10$rqRToow1PTszcaby2i.Jp.TOtfyuwtLFWYnOO0JS9ATlAaRoNJd5O', 'gonza@gmail.com'),
(2, 'euge', 'carlini', 1, '$2y$10$btnWE7TatCdvrRXX.uvyrey5jF8G1JDe.C.hXFPZStxB4fUpyVMsa', 'soyfacil@muy.com'),
(3, 'nestor', 'vanni', 0, '$2y$10$4RGjJKKCI0SkxJ5eb.AndOZq6tmTzVE/mciXpGfixtjjYPLXDFmWi', 'hola@hola.com'),
(4, 'gra', 'vanni', 1, '$2y$10$gmE2C8VSLXhFQqzUpSrC4ubIYInfDTRkiRBlj82nHRt2kFCBKGk9W', 'hola@holaaaaa.com'),
(5, 'euge', 'carlini', 0, '$2y$10$CBb6wFKnk4ADWXPbDyPkRuY0uod8PGHCQkVDBQhYtxV1Zs2EFIrv.', 'eugeniacarlini@gmail.com');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
 ADD PRIMARY KEY (`id`), ADD KEY `idUsuario` (`idUsuario`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
