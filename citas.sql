-- phpMyAdmin SQL Dump
-- version 3.5.8.2
-- http://www.phpmyadmin.net
--
-- Servidor: sql212.byetcluster.com
-- Tiempo de generación: 19-06-2019 a las 15:49:27
-- Versión del servidor: 5.6.41-84.1
-- Versión de PHP: 5.3.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `epiz_23564343_citas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `eventos`
--

CREATE TABLE IF NOT EXISTS `eventos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` text NOT NULL,
  `color` varchar(20) NOT NULL DEFAULT '#ff0000',
  `start` datetime NOT NULL,
  `end` datetime NOT NULL,
  `idUsu` int(11) NOT NULL,
  `idPro` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `start` (`start`),
  UNIQUE KEY `end` (`end`),
  KEY `idUsu` (`idUsu`),
  KEY `idPro` (`idPro`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=70 ;

--
-- Volcado de datos para la tabla `eventos`
--

INSERT INTO `eventos` (`id`, `title`, `color`, `start`, `end`, `idUsu`, `idPro`) VALUES
(67, 'Esto es una pruaba', '#C7C6C5', '2019-06-21 11:00:00', '2019-06-21 11:30:00', 13, 2),
(66, 'Información para pedir cita con el medico de cabecera', '#C7C6C5', '2019-06-27 12:00:00', '2019-06-27 12:30:00', 11, 1),
(65, 'Inscripción al viaje a Ronda', '#C7C6C5', '2019-06-21 16:00:00', '2019-06-21 16:30:00', 12, 7),
(61, 'Holii', '#C7C6C5', '2019-06-17 16:00:00', '2019-06-17 16:30:00', 9, 4),
(69, 'Información sobre cita medico', '#C7C6C5', '2019-06-21 16:30:00', '2019-06-21 17:00:00', 9, 2),
(57, '1234\r\n', '#C7C6C5', '2019-06-14 13:30:00', '2019-06-14 14:00:00', 1, 2),
(48, 'Holi caraboliiii', '#C7C6C5', '2019-06-12 10:30:00', '2019-06-12 11:00:00', 9, 2),
(52, 'uhgtfr', '#C7C6C5', '2019-06-12 16:00:00', '2019-06-12 16:30:00', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profesor`
--

CREATE TABLE IF NOT EXISTS `profesor` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(20) NOT NULL,
  `apellidos` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Volcado de datos para la tabla `profesor`
--

INSERT INTO `profesor` (`id`, `nombre`, `apellidos`) VALUES
(1, 'Julian', 'Perez Perez'),
(2, 'Raul', 'Moreno Moreno'),
(8, 'Jesus', 'Moreno Montiel'),
(9, 'Cristina', 'Cifuente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proyecto`
--

CREATE TABLE IF NOT EXISTS `proyecto` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  `iduni` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `iduni` (`iduni`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Volcado de datos para la tabla `proyecto`
--

INSERT INTO `proyecto` (`id`, `nombre`, `iduni`) VALUES
(1, 'Cooperación Honduras', 1),
(2, 'Cooperación África', 2),
(3, 'Cooperación Málaga', 0),
(9, 'Cooperación México', 0),
(10, 'Cooperación Madrid', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pro_pro`
--

CREATE TABLE IF NOT EXISTS `pro_pro` (
  `idPro_Pro` int(11) NOT NULL AUTO_INCREMENT,
  `idProyecto` int(11) NOT NULL,
  `idProfesor` int(11) NOT NULL,
  PRIMARY KEY (`idPro_Pro`),
  KEY `idProyecto` (`idProyecto`),
  KEY `idProfesor` (`idProfesor`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Volcado de datos para la tabla `pro_pro`
--

INSERT INTO `pro_pro` (`idPro_Pro`, `idProyecto`, `idProfesor`) VALUES
(1, 2, 1),
(2, 1, 2),
(7, 10, 9);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `idUsu` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(20) NOT NULL,
  `apellidos` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `usu` varchar(20) NOT NULL,
  `contraseña` int(4) NOT NULL,
  `dni` varchar(9) NOT NULL,
  `tipo` int(1) NOT NULL DEFAULT '2',
  PRIMARY KEY (`idUsu`),
  UNIQUE KEY `usuario` (`usu`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `dni` (`dni`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14 ;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idUsu`, `nombre`, `apellidos`, `email`, `usu`, `contraseña`, `dni`, `tipo`) VALUES
(1, 'admin', 'admin', 'admin@gmail.com', 'admin', 1234, '33359077S', 1),
(11, 'Darth', 'Vader', 'star@wars.com', 'darth', 1234, '78981239A', 2),
(12, 'Silvia', 'Fuelle', 'silfuelle@gmail.com', 'silvia', 1234, '45236988D', 2),
(9, 'Aitana', 'Ocaña', 'aitana@gmail.com', 'usuario', 1234, '77182739A', 2);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
