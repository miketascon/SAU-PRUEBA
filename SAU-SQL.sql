-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 11-08-2015 a las 23:34:27
-- Versión del servidor: 5.6.24
-- Versión de PHP: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `pdo`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentarios`
--

CREATE TABLE IF NOT EXISTS `comentarios` (
  `idcomment` int(11) NOT NULL,
  `comentario` varchar(150) DEFAULT NULL,
  `publicacion` int(11) DEFAULT NULL,
  `usuario` int(11) DEFAULT NULL,
  `fechacomment` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `comentarios`
--

INSERT INTO `comentarios` (`idcomment`, `comentario`, `publicacion`, `usuario`, `fechacomment`) VALUES
(18, 'Hola, esto también es una prueba :D', 11, 3, '2015-08-11 04:11:31'),
(19, 'y esta es otra demostración :D', 11, 1, '2015-08-11 04:13:24'),
(20, 'Este es un comentario normal :) en la publicación.', 12, 1, '2015-08-11 04:13:48'),
(21, 'y estos son unos cuantos iconos :O :) :D  3:) :P', 13, 1, '2015-08-11 04:15:19'),
(22, 'y aquí pondré algunos otros :/ ;) 8) o.O', 13, 3, '2015-08-11 04:17:59');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `timeline`
--

CREATE TABLE IF NOT EXISTS `timeline` (
  `idtimeline` int(11) NOT NULL,
  `estatus` varchar(250) DEFAULT NULL,
  `usuario` int(11) DEFAULT NULL,
  `fecha` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `timeline`
--

INSERT INTO `timeline` (`idtimeline`, `estatus`, `usuario`, `fecha`) VALUES
(11, 'Hola a todos, esto es una prueba :)', 1, '2015-08-11 04:10:44'),
(12, 'Esto es solo una publicación :3', 3, '2015-08-11 04:11:51'),
(13, 'Esta es otra publicación de prueba :O', 3, '2015-08-11 04:12:09');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `iduser` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`iduser`, `name`, `password`, `email`) VALUES
(1, 'Jesus Herrera', 'c745a3e52001f928b3f4436bd68fdd27ee20a909', 'jesuxherrera@jhcodes.com'),
(3, 'Demo JHCodes', 'cbdbe4936ce8be63184d9f2e13fc249234371b9a', 'demo@jhcodes.com');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD PRIMARY KEY (`idcomment`);

--
-- Indices de la tabla `timeline`
--
ALTER TABLE `timeline`
  ADD PRIMARY KEY (`idtimeline`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`iduser`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  MODIFY `idcomment` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT de la tabla `timeline`
--
ALTER TABLE `timeline`
  MODIFY `idtimeline` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `iduser` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
